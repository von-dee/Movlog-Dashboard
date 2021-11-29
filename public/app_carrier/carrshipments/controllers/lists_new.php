<?php 
  namespace carrshipments;
  class lists_new extends \setup { 
    public $limit,$usedstatus,$employeeno;
      
      function __construct(){
        parent::__construct(); 
        $this->employeeno = $this->session->get('h20');
      }

      function Init(){
        
        $mongo=$this->mongo;
        $session=$this->session; 
        

        $userid = $session->get("userid");
      
      
        /////////// NEW REQUESTS /////////////
        $newrequest_response = [];
        $newrequests_collection = "app_request";
        $newrequests_filter = ['REQ_STATUS'=>"1"];
        $newrequests_options = ['sort'=>['REQ_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $newrequests = $this->mongo->GetAll($newrequests_collection,$newrequests_filter,$newrequests_options);

        if(!empty($newrequests)){

          foreach ($newrequests as $val){

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


            $requestor_collection = "app_users";
            $requestor_filter = ['USR_CODE'=>$val->REQ_REQUESTOR_CODE];
            $requestor_options =  [];
            $requestor_stmt = $this->mongo->GetOne($requestor_collection,$requestor_filter,$requestor_options);

            
            $val['REQ_REQUESTOR_FIRSTNAME'] = $requestor_stmt['USR_FIRSTNAME'];
            $val['REQ_REQUESTOR_LASTNAME'] = $requestor_stmt['USR_LASTNAME'];
            $val['REQ_REQUESTOR_PHONE'] = $requestor_stmt['USR_PHONE'];
            $val['REQ_REQUESTOR_COMPANY'] = $requestor_stmt['USR_COMPANY'];
            
            
            array_push($newrequest_response, $val);
          }

        }


        $result = ['newrequest_response'=>$newrequest_response];

        return $result; 
    }
}
?> 
  