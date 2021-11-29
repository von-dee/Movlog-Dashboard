<?php 
  namespace carrshipments;
    class add_construction extends \setup { 
        function __construct(){
          parent::__construct(); 
        }
        function Init(){
          $engine = new \Engine();
          $session = $this->session; 

          $requestorcode = $session->get("userid");
          $requestorname = $session->get("userfirstname").' '.$session->get("userlastname");          
          $requestorphonenum = $session->get("userphone");
          
          // var_dump($requestorcode); die();

          $requestcode = $engine->generateCode('app_request','REQ','REQ_CODE');         
          $addeddate = date("Y-m-d H:s:m" );
          $itemsselected = preg_replace('/\\\\/', '', $this->itemsselected);

          

          // if($this->engine->validatePostForm($this->microtime)){
             
          
            
            $collection = "app_request_construction";
            $document = [
              'REQ_CODE'=> $requestcode,
              'REQ_VEHICLES'=> $itemsselected,
              'REQ_REQUESTOR_CODE'=> $requestorcode,
              'REQ_REQUESTER_NAME'=> $requestorname,
              'REQ_LOCATION'=> $this->locationname,
              'REQ_LOCATION_ID'=> $this->locationid,
              'REQ_DESCRIPTION'=> $this->description,
              'REQ_START_DATE'=> $this->workdate,
              'REQ_START_TIME'=> $this->worktime,
              'REQ_INSPECTION_DATE'=>  $this->inspectiondate,
              'REQ_INSPECTION_TIME'=>  $this->inspectiontime,
              'REQ_TOTAL_AMOUNT'=> $this->totalamount,
              'REQ_DURATION_TYPE'=>  $this->duration_type,
              'REQ_DURATION_NUMBER'=>  $this->duration_number,
              'REQ_DATEADDED'=> $addeddate,
              'REQ_REQUESTOR_PHONE'=> $requestorphonenum,
              'REQ_ACCEPT_COUNT'=> 0,
              'REQ_COMMENT_COUNT'=> 0,
              'REQ_STATUS'=>'1',
              'REQ_STATUS_DATE_UPDATE'=> $addeddate
            ];              

            
            $stmt = $this->mongo->InsertOne($collection,$document);
            
            if($stmt){
              

              $userid = $requestorcode;
              $receiverid = $requestorcode;
              $noti_message = "You placed a request for Heavy Duty Vehicles to  ".$this->locationname;
              $type = "1";
              $reqcode = $requestcode;
              $reqtitle = "Trip Request";
              $reqtype  = "success";
              $reqicon = "mdi mdi-truck-delivery";
              $noti_me = $engine->saveNotification($userid,$receiverid,$noti_message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);

              $evtlog_message = "placed a request for Heavy Duty Vehicles to  ".$this->locationname;
              $event_me = $engine->saveEventlog($evtlog_message);
              

              return true;  
            }else{
              
              return false;
            }

        }
      }
?>