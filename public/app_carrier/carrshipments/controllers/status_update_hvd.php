<?php 
  namespace carrshipments;
  class status_update_hvd extends \setup { 
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
        $usercompanycode = $session->get("usercompanycode");    
        $usercompany = $session->get("usercompany");    
        $userphone = $session->get("userphone");    
        
        
        $exploded_data = explode("@@",$this->keys);
        $status = $exploded_data[0];
        $data = $engine->getDataDecrypt($exploded_data[1]);

        
        // Drivers Details
        $driverdetails = explode("@@",$this->driverdetails);
        $driver_code = $driverdetails[0];
        $driver_name = $driverdetails[1];
        $driver_phone = $driverdetails[2];


        // Truck Details
        $truckdetails = explode("@@",$this->truckdetails);
        $truck_flt_code = $truckdetails[0];
        $truck_flt_name = $truckdetails[1];
        $truck_flt_number = $truckdetails[2];
        $truck_type_code = $truckdetails[3];
        $truck_type_name = $truckdetails[4];
        $truck_type_url = $truckdetails[5];

        $req_code = $data['REQ_CODE']; 

        $request_collection = "app_request_construction";
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
                

                // Add Request to Accepted Table
                $acceptcode = $engine->generateCode('app_accepted_request','URQ','URQ_CODE'); 
                $addeddate = date("Y-m-d H:s:m" );    
                $collection = "app_accepted_request";
                $document = [
                'URQ_CODE'=>$acceptcode,
                'URQ_REQUEST_CODE'=>$data['REQ_CODE'],
                'URQ_REQUESTORCODE'=> $data['REQ_REQUESTOR_CODE'],
                'URQ_REQUESTORNAME'=> $data['REQ_REQUESTER_NAME'],
                'URQ_DRIVERCODE'=> $driver_code,
                'URQ_DRIVERNAME' => $driver_name,
                'URQ_DRIVERPHONE'=> $driver_phone,
                'URQ_DRIVER_COMP_CODE'=> $usercompanycode,
                'URQ_DRIVER_COMP_NAME'=> $usercompany,
                'URQ_DRIVER_COMP_PHONE'=> $userphone,
                'URQ_TRUCKCARNUMBER'=> $truck_flt_number,
                'URQ_TRUCKTYPECODE' => $truck_flt_code,
                'URQ_TRUCKTYPENAME' => $truck_type_name,
                'URQ_TRUCKTYPEIMG'=> $truck_type_url,
                'URQ_BUDGET'=> $data['REQ_TOTAL_AMOUNT'],
                'URQ_DATE'=> $addeddate,
                'URQ_DRIVERNOTE' => $this->drivernote,
                'URQ_TYPE' => "2",
                'URQ_STATUS' => $status
                ]
                ;    

                $stmt = $mongo->InsertOne($collection,$document);


                // Set Data Text
                $data['URQ_DRIVERNAME'] = $driver_name;
                $data['URQ_TRUCKTYPENAME'] = $truck_type_name;
                $data['URQ_DRIVERPHONE'] = $driver_phone;
                $data['URQ_TRUCKCARNUMBER'] = $truck_flt_number;
                $data['URQ_DRIVER_COMP_NAME'] = $usercompany;
                $data['URQ_DRIVER_COMP_PHONE'] = $driver_phone;

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
        
        $userid = $this->session->get("userid");
        $usercompanycode = $this->session->get("usercompanycode");  

        $drivers_collection = "app_drivers";
        $drivers_filter = ['DRV_COMP_CODE'=>$usercompanycode];
        $drivers_options =  ['sort'=>['DRV_FIRSTNAME'=>1]];
        $drivers = $this->mongo->GetAll($drivers_collection,$drivers_filter,$drivers_options);

        $comp_truck_collection = "app_fleets";
        $comp_truck_filter = ['FLEET_COMP_CODE'=>$usercompanycode];
        $comp_truck_options =  ['sort'=>['FLEET_NAME'=>1]];
        $comp_truck = $this->mongo->GetAll($comp_truck_collection,$comp_truck_filter,$comp_truck_options);

        $response = ['data'=>$data,'comp_truck'=>$comp_truck,'drivers'=>$drivers];

        return $response;  

    }
}
?> 
  