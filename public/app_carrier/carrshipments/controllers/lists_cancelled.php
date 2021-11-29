<?php 
  namespace carrshipments;
  class lists_cancelled extends \setup { 
    public $limit,$usedstatus,$employeeno;
      
      function __construct(){
        parent::__construct(); 
        $this->employeeno = $this->session->get('h20');
      }

      function Init(){
        
        $mongo=$this->mongo;
        $session=$this->session; 
        

        $userid = $session->get("userid");
      

        /////////// CANCELLED /////////////
        $cancelled_response = [];
        $cancelled_collection = "app_request";
        $cancelled_filter = ['REQ_REQUESTOR_CODE'=>$userid,'REQ_STATUS'=>"0"];
        $cancelled_options = ['sort'=>['REQ_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $cancelled = $this->mongo->GetAll($cancelled_collection,$cancelled_filter,$cancelled_options);

        if(!empty($cancelled)){

          foreach ($cancelled as $val){

            $driver_collection = "app_accepted_request";
            $driver_filter = ['URQ_TYPE'=>"1",'URQ_REQUEST_CODE'=>$val->REQ_CODE];
            $driver_options =  [];
            $driver_stmt = $this->mongo->GetOne($driver_collection,$driver_filter,$driver_options);

            $val['REQ_DRIVER_NAME'] = $driver_stmt['URQ_DRIVERNAME'];
            $val['REQ_DRIVER_CAR'] = $driver_stmt['URQ_TRUCKCARNAME'];
            $val['REQ_DRIVER_PHONE'] = $driver_stmt['URQ_DRIVERPHONE'];
            $val['REQ_DRIVER_CARNUMBER'] = $driver_stmt['URQ_CARNUMBER'];
            $val['REQ_ARTISAN_COMP_NAME'] = $driver_stmt['URQ_DRIVER_COMP_NAME'];
            $val['REQ_ARTISAN_COMP_PHONE'] = $driver_stmt['URQ_DRIVER_COMP_PHONE'];
            
            
            array_push($cancelled_response, $val);
          }

          
          $engine = new \Engine();
          $evtlog_message = " fetched a list of cancelled requests ";
          $event_me = $engine->saveEventlog($evtlog_message);

        }


          
        /////////// CANCELLED HEAVY DUTY REQUESTS /////////////
        $cancelled_hdv_response = [];
        $cancelled_collection = "app_request_construction";
        $cancelled_filter = ['REQ_REQUESTOR_CODE'=>$userid,'REQ_STATUS'=>"0"];
        $cancelled_options = ['sort'=>['REQ_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $cancelled_hdv = $this->mongo->GetAll($cancelled_collection,$cancelled_filter,$cancelled_options);

        if(!empty($cancelled_hdv)){

          foreach ($cancelled_hdv as $val){

            $driver_collection = "app_accepted_request";
            $driver_filter = ['URQ_TYPE'=>"2",'URQ_REQUEST_CODE'=>$val->REQ_CODE];
            $driver_options =  [];
            $driver_stmt = $this->mongo->GetOne($driver_collection,$driver_filter,$driver_options);

            $val['REQ_DRIVER_NAME'] = $driver_stmt['URQ_DRIVERNAME'];
            $val['REQ_DRIVER_CAR'] = $driver_stmt['URQ_TRUCKCARNAME'];
            $val['REQ_DRIVER_PHONE'] = $driver_stmt['URQ_DRIVERPHONE'];
            $val['REQ_DRIVER_CARNUMBER'] = $driver_stmt['URQ_CARNUMBER'];
            $val['REQ_ARTISAN_COMP_NAME'] = $driver_stmt['URQ_DRIVER_COMP_NAME'];
            $val['REQ_ARTISAN_COMP_PHONE'] = $driver_stmt['URQ_DRIVER_COMP_PHONE'];
            
            
            array_push($cancelled_hdv_response, $val);
          }

          $engine = new \Engine();
          $evtlog_message = " fetched a list of cancelled requests ";
          $event_me = $engine->saveEventlog($evtlog_message);
            
        }
    
        $result = ['request_cancelled'=>$cancelled_response ,'request_hdv_cancelled'=>$cancelled_hdv_response];
        return $result; 

  }
}
?> 
  