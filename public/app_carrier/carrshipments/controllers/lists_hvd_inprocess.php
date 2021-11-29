<?php 
  namespace carrshipments;
  class lists_hvd_inprocess extends \setup { 
    public $limit,$usedstatus,$employeeno;
      
      function __construct(){
        parent::__construct(); 
        $this->employeeno = $this->session->get('h20');
      }

      function Init(){
        
        $mongo=$this->mongo;
        $session=$this->session; 
        

        $userid = $session->get("userid");
      
      
        /////////// IN-PROGRESS HEAVY DUTY VEHICLES /////////////
        $inprogress_hdv_response = [];
        $driver_collection = "app_accepted_request";
        $driver_filter = ['URQ_TYPE'=>"2",'URQ_DRIVER_COMP_CODE'=>$usercompanycode,'URQ_STATUS'=>['$in'=> ["2","3","4"]]];
        $driver_options =  [];
        $driver_stmt = $this->mongo->GetAll($driver_collection,$driver_filter,$driver_options);
        
      
        if(!empty($driver_stmt)){

            foreach ($driver_stmt as $val){
              $requests_collection = "app_request_construction";
              $requests_filter = ['REQ_CODE'=>$val->URQ_REQUEST_CODE];
              $requests_options =  ['sort'=>['REQ_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
              $requests_stmt = $this->mongo->GetOne($requests_collection,$requests_filter,$requests_options);      
              

              $val['REQ_CODE'] = $requests_stmt['REQ_CODE'];
              $val['REQ_VEHICLES'] = $requests_stmt['REQ_VEHICLES'];
              $val['REQ_REQUESTOR_CODE'] = $requests_stmt['REQ_REQUESTOR_CODE'];
              $val['REQ_REQUESTER_NAME'] = $requests_stmt['REQ_REQUESTER_NAME'];
              $val['REQ_LOCATION'] = $requests_stmt['REQ_LOCATION'];
              $val['REQ_LOCATION_ID'] = $requests_stmt['REQ_LOCATION_ID'];
              $val['REQ_START_DATE'] = $requests_stmt['REQ_START_DATE'];
              $val['REQ_START_TIME'] = $requests_stmt['REQ_START_TIME'];
              $val['REQ_DESCRIPTION'] = $requests_stmt['REQ_DESCRIPTION'];
              $val['REQ_INSPECTION_DATE'] = $requests_stmt['REQ_INSPECTION_DATE'];
              $val['REQ_INSPECTION_TIME'] = $requests_stmt['REQ_INSPECTION_TIME'];
              $val['REQ_TOTAL_AMOUNT'] = $requests_stmt['REQ_TOTAL_AMOUNT'];
              $val['REQ_DATEADDED'] = $requests_stmt['REQ_DATEADDED'];
              $val['REQ_REQUESTOR_PHONE'] = $requests_stmt['REQ_REQUESTOR_PHONE'];
              $val['REQ_ACCEPT_COUNT'] = $requests_stmt['REQ_ACCEPT_COUNT'];
              $val['REQ_COMMENT_COUNT'] = $requests_stmt['REQ_COMMENT_COUNT'];
              $val['REQ_STATUS'] = $requests_stmt['REQ_STATUS'];
              $val['REQ_STATUS_DATE_UPDATE'] = $requests_stmt['REQ_STATUS_DATE_UPDATE'];     
              
              
              $requestor_collection = "app_users";
              $requestor_filter = ['USR_CODE'=>$requests_stmt['REQ_REQUESTOR_CODE']];
              $requestor_options =  [];
              $requestor_stmt = $this->mongo->GetOne($requestor_collection,$requestor_filter,$requestor_options);
              
              $val['REQ_REQUESTOR_FIRSTNAME'] = $requestor_stmt['USR_FIRSTNAME'];
              $val['REQ_REQUESTOR_LASTNAME'] = $requestor_stmt['USR_LASTNAME'];
              $val['REQ_REQUESTOR_PHONE'] = $requestor_stmt['USR_PHONE'];
              $val['REQ_REQUESTOR_COMPANY'] = $requestor_stmt['USR_COMPANY'];

              
              
              
              array_push($inprogress_hdv_response, $val);

            }

        }


        $result = ['inprogress_hdv_response'=>$inprogress_hdv_response];

        return $result; 
    }
}
?> 
  