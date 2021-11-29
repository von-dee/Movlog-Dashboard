<?php 
  namespace carrshipments;
    class add_freight extends \setup { 
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
             
          
            
            $collection = "app_request";
            $document = [
              'REQ_CODE'=>$requestcode,
              'REQ_ITEMS'=>$itemsselected,
              'REQ_REQUESTOR_CODE'=>$requestorcode,
              'REQ_REQUESTER_NAME'=>$requestorname,
              'REQ_LOCATION'=>$this->locationname,
              'REQ_LOCATION_ID' => $this->locationid,
              'REQ_LOCATION_FROM'=>$this->location_fromname,
              'REQ_LOCATION_ID_FROM' => $this->location_fromid,
              'REQ_DESCRIPTION'=>$this->description,
              'REQ_PICKUP_DATE'=>$this->pickupdate,
              'REQ_PICKUP_TIME'=>$this->pickuptime,
              'REQ_TOTAL_ITEMS'=>$this->totalitems,
              'REQ_TOTAL_AMOUNT'=>$this->totalamount,
              'REQ_DATEADDED'=>$addeddate,
              'REQ_TRUCK_TYPE'=>$this->truck_code,
              'REQ_TRUCK_NAME'=>$this->truck_name,
              'REQ_TRUCK_URL'=>$this->truck_url,
              'REQ_REQUESTOR_PHONE'=>$requestorphonenum,
              'REQ_ACCEPT_COUNT'=>0,
              'REQ_COMMENT_COUNT'=>0,
              'REQ_STATUS'=>'1',
              'REQ_STATUS_DATE_UPDATE'=>$addeddate
            ];              

            
            $stmt = $this->mongo->InsertOne($collection,$document);
            
            if($stmt){
              

              $userid = $requestorcode;
              $receiverid = $requestorcode;
              $noti_message = "You placed a request for a ".$this->truck_name." to move items from ".$this->location_fromname." to ".$this->locationname;
              $type = "1";
              $reqcode = $requestcode;
              $reqtitle = "Trip Request";
              $reqtype  = "success";
              $reqicon = "mdi mdi-truck-delivery";
              $noti_me = $engine->saveNotification($userid,$receiverid,$noti_message,$type,$reqcode,$reqtitle,$reqtype,$reqicon);

              $evtlog_message = "placed a request for a ".$this->truck_name." to move items from ".$this->location_fromname." to ".$this->locationname;
              $event_me = $engine->saveEventlog($evtlog_message);
              

              return true;  
            }else{
              
              return false;
            }

        }
      }
?>