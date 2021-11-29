<?php 
  namespace carrshipments;
  class lists_completed extends \setup { 
    public $limit,$usedstatus,$employeeno;
      
      function __construct(){
        parent::__construct(); 
        $this->employeeno = $this->session->get('h20');
      }

      function Init(){
        
        $mongo=$this->mongo;
        $session=$this->session; 
        

        $userid = $session->get("userid");
      

        /////////// COMPLETED /////////////
        $completed_response = [];
        $completed_collection = "app_request";
        $completed_filter = ['REQ_REQUESTOR_CODE'=>$userid,'REQ_STATUS'=>"5"];
        $completed_options = ['sort'=>['REQ_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $completed = $this->mongo->GetAll($completed_collection,$completed_filter,$completed_options);

        if(!empty($completed)){

          foreach ($completed as $val){

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
            
            
            array_push($completed_response, $val);
          }
          
          $engine = new \Engine();
          $evtlog_message = " fetched a list of completed requests ";
          $event_me = $engine->saveEventlog($evtlog_message);

        }



         /////////// COMPLETED HEAVY DUTY REQUESTS /////////////
         $completed_hdv_response = [];
         $completed_collection = "app_request_construction";
         $completed_filter = ['URQ_TYPE'=>"2",'REQ_REQUESTOR_CODE'=>$userid,'REQ_STATUS'=>"5"];
         $completed_options = ['sort'=>['REQ_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
         $completed_hdv = $this->mongo->GetAll($completed_collection,$completed_filter,$completed_options);
 
         if(!empty($completed_hdv)){
 
           foreach ($completed_hdv as $val){
 
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
             
             
             array_push($completed_hdv_response, $val);
           }
 
           $engine = new \Engine();
           $evtlog_message = " fetched all completed list of requests ";
           $event_me = $engine->saveEventlog($evtlog_message);
 
         }
        
        $result = ['request_hdv_completed'=>$completed_hdv_response ,'request_completed'=>$completed_response];
        return $result; 
    }
}
?> 
  