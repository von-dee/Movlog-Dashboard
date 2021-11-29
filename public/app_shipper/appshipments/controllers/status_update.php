<?php 
  namespace appshipments;
  class status_update extends \setup { 
    public $limit,$usedstatus,$employeeno;
      
      function __construct(){
        parent::__construct(); 
        $this->employeeno = $this->session->get('h20');
      }

      function Init(){
        
        $mongo=$this->mongo;
        $session=$this->session; 
        $engine = new \Engine();

        $userid = $session->get("userid");

        $exploded_data = explode("@@",$this->keys);
        $status = $exploded_data[0];
        $data = $engine->getDataDecrypt($exploded_data[1]);
        
        $req_code = $data['REQ_CODE']; 

        $request_collection = "app_request";
        $request_filter = ['REQ_CODE'=>$req_code];
        $request_document = ["REQ_STATUS"=> $status];     
        $request_options =  [];

        $stmt = $mongo->Update($request_collection, $request_filter, $request_document, $request_options);     

        if($stmt){

            $data['REQ_STATUS'] = $status;


            $accepted_req_collection = "app_accepted_request";
            $accepted_req_filter = ['URQ_REQUEST_CODE'=>$req_code];
            $accepted_req_document = ["URQ_STATUS"=> $status];     
            $accepted_req_options =  [];

            $stmt = $mongo->Update($accepted_req_collection, $accepted_req_filter, $accepted_req_document, $accepted_req_options);     



            if($status == "0"){
                $status_text = "Request Cancelled";
            }elseif($status == "1"){
                $status_text =  "Cancel Request";
            }elseif($status == "2"){
                $status_text =  "Driver Assigned";
            }elseif($status == "3"){
                $status_text =  "In Transit";
            }elseif($status == "4"){
                $status_text =  "At Destination";
            }elseif($status == "5"){
                $status_text =  "Completed";
            };

        
            $evtlog_message = $userid." updated Request with code ".$req_code." to ".$status." which is ".$status_text;
            
            $event_me = $engine->saveEventlog($evtlog_message);
  
        }

        // $val = []
        // $val['REQ_DRIVER_NAME'] = $data;

        return $data;  

    }
}
?> 
  