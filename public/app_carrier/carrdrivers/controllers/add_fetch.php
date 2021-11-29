<?php 
  namespace carrdrivers;
    class add_fetch extends \setup { 
        function __construct(){
          parent::__construct(); 
        }
        function Init(){
                  
            $mongo=$this->mongo;
            $session=$this->session; 

            $userid = $session->get("userid");
            $usercompanycode = $session->get("usercompanycode");  

            $truck_collection = "app_fleets";
            $truck_filter = ['FLEET_COMP_CODE'=>$usercompanycode];
            $truck_options =  ['sort'=>['FLEET_NAME'=>1]];
            $truck = $mongo->GetAll($truck_collection,$truck_filter,$truck_options);

            if($truck){
              $engine = new \Engine();
              $evtlog_message = " fetched drivers.";
              $event_me = $engine->saveEventlog($evtlog_message);
            }

            
            return $truck;  
        }
  } ?>