<?php 
  namespace carrfleetmanagement;
    class add_fetch extends \setup { 
        function __construct(){
          parent::__construct(); 
        }
        function Init(){
                  
            $mongo=$this->mongo;
            $session=$this->session; 

            $userid = $session->get("userid");
            $usercompanycode = $session->get("usercompanycode");  

            $truck_collection = "app_trucktypes";
            $truck_filter = [];
            $truck_options =  ['sort'=>['TRUCK_NAME'=>1]];
            $truck = $mongo->GetAll($truck_collection,$truck_filter,$truck_options);


            $drivers_collection = "app_drivers";
            $drivers_filter = ['DRV_COMP_CODE'=>$usercompanycode];
            $drivers_options =  ['sort'=>['DRV_FIRSTNAME'=>1]];
            $drivers = $mongo->GetAll($drivers_collection,$drivers_filter,$drivers_options);


            if($drivers){
              $engine = new \Engine();
              $evtlog_message = " fetched list fleet";
              $event_me = $engine->saveEventlog($evtlog_message);
            }

            return array("truck"=>$truck,"drivers"=>$drivers);  
        }
  } ?>