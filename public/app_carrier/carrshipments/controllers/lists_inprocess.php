<?php 
  namespace carrshipments;
  class lists_inprocess extends \setup { 
    public $limit,$usedstatus,$employeeno;
      
      function __construct(){
        parent::__construct(); 
        $this->employeeno = $this->session->get('h20');
      }

      function Init(){
        
        $mongo=$this->mongo;
        $session=$this->session; 
        

        $userid = $session->get("userid");
      
      
        /////////// IN-PROGRESS /////////////
        $inprogress_response = [];
        $inprogress_collection = "app_request";
        $inprogress_filter = ['REQ_REQUESTOR_CODE'=>$userid,'REQ_STATUS'=>['$in'=> ["2","3","4"]]];
        $inprogress_options =  ['sort'=>['REQ_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $inprogress = $this->mongo->GetAll($inprogress_collection,$inprogress_filter,$inprogress_options);

        if(!empty($inprogress)){

            foreach ($inprogress as $val){

              $driver_collection = "app_accepted_request";
              $driver_filter = ['URQ_REQUEST_CODE'=>$val->REQ_CODE];
              $driver_options =  [];
              $driver_stmt = $this->mongo->GetOne($driver_collection,$driver_filter,$driver_options);

              $val['REQ_DRIVER_NAME'] = $driver_stmt['URQ_DRIVERNAME'];
              $val['REQ_DRIVER_CAR'] = $driver_stmt['URQ_TRUCKCARNAME'];
              $val['REQ_DRIVER_PHONE'] = $driver_stmt['URQ_DRIVERPHONE'];
              $val['REQ_DRIVER_CARNUMBER'] = $driver_stmt['URQ_CARNUMBER'];
              $val['REQ_ARTISAN_COMP_NAME'] = $driver_stmt['URQ_DRIVER_COMP_NAME'];
              $val['REQ_ARTISAN_COMP_PHONE'] = $driver_stmt['URQ_DRIVER_COMP_PHONE'];
              
              
              array_push($inprogress_response, $val);
            }

            $engine = new \Engine();
            $evtlog_message = " fetched a list of inprocess requests ";
            $event_me = $engine->saveEventlog($evtlog_message);

        }


        /////////// IN-PROGRESS HEAVY DUTY VEHICLES /////////////
        $inprogress_hdv_response = [];
        $inprogress_collection = "app_request_construction";
        $inprogress_filter = ['REQ_REQUESTOR_CODE'=>$userid,'REQ_STATUS'=>['$in'=> ["2","3","4"]]];
        $inprogress_options =  ['sort'=>['REQ_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $inprogress_hdv = $this->mongo->GetAll($inprogress_collection,$inprogress_filter,$inprogress_options);

        if(!empty($inprogress_hdv)){

            foreach ($inprogress_hdv as $val){

              $driver_collection = "app_accepted_request";
              $driver_filter = ['URQ_REQUEST_CODE'=>$val->REQ_CODE];
              $driver_options =  [];
              $driver_stmt = $this->mongo->GetOne($driver_collection,$driver_filter,$driver_options);

              $val['REQ_DRIVER_NAME'] = $driver_stmt['URQ_NAME'];
              $val['REQ_DRIVER_CAR'] = $driver_stmt['URQ_CARNAME'];
              $val['REQ_DRIVER_PHONE'] = $driver_stmt['URQ_DRVPHONE'];
              $val['REQ_DRIVER_CARNUMBER'] = $driver_stmt['URQ_CARNUMBER'];
              $val['REQ_ARTISAN_COMP_NAME'] = $driver_stmt['URQ_ARTISAN_COMP_NAME'];
              $val['REQ_ARTISAN_COMP_PHONE'] = $driver_stmt['URQ_ARTISAN_COMP_PHONE'];
              
              
              array_push($inprogress_hdv_response, $val);
            }

        }

        $result = ['request_inprogress'=>$inprogress_response,  'request_hdv_inprogress'=>$inprogress_hdv_response];

        return $result; 
    }
}
?> 
  