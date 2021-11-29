<?php 
  namespace carrfleetmanagement;
    class add extends \setup { 
        function __construct(){
          parent::__construct(); 
        }
        function Init(){
          
                  
          $mongo=$this->mongo;
          $session=$this->session; 


          $userid = $session->get("userid");
          $usercompanycode = $session->get("usercompanycode");  
          $usercompanyname = $session->get("usercompany");  
          $userfullname = $session->get("userfirstname").' '.$session->get("userlastname");  
          
          
          $fleet_truck = explode('@@', $this->fleet_truck);
          $fleet_typecode = $fleet_truck[0];
          $fleet_typename = $fleet_truck[1];
          $fleet_typeurl = $fleet_truck[2];

          $fleet_driver = explode('@@', $this->fleet_drivername);
          $fleet_drivercode = $fleet_driver[0];
          $fleet_drivername = $fleet_driver[1];
          $fleet_driverphone = $fleet_driver[2];
      
          $fleet_code = $this->engine->generateCode('app_fleets','FLT','FLEET_CODE');   
          $addeddate = date("Y-m-d H:s:m" );    

          $collection = "app_fleets";
          $document = ['FLEET_CODE'=>$fleet_code,'FLEET_NAME'=>$this->fleet_name,'FLEET_CARNUM'=>$this->fleet_carnumber,'FLEET_DRIVER_CODE'=>$fleet_drivercode,'FLEET_DRIVER_NAME'=>$fleet_drivername,'FLEET_STATUS'=>'1',
          'FLEET_DATEADDED'=>$addeddate,'FLEET_ACTORID'=>$userid,'FLEET_ACTORNAME'=>$userfullname,'FLEET_COMP_CODE'=>$usercompanycode,'FLEET_COMP_NAME'=>$usercompanyname,'FLEET_TYPE_CODE'=>$fleet_typecode,'FLEET_TYPE_NAME'=>$fleet_typename,'FLEET_TYPE_URL'=>$fleet_typeurl,'FLEET_DRIVER_PHONE'=>$fleet_driverphone];       
          

          $stmt = $mongo->InsertOne($collection,$document);

          $truck_collection = "app_trucktypes";
          $truck_filter = [];
          $truck_options =  ['sort'=>['TRUCK_NAME'=>1]];
          $truck = $mongo->GetAll($truck_collection,$truck_filter,$truck_options);


          $drivers_collection = "app_drivers";
          $drivers_filter = ['DRV_COMP_CODE'=>$usercompanycode];
          $drivers_options =  ['sort'=>['DRV_FIRSTNAME'=>1]];
          $drivers = $mongo->GetAll($drivers_collection,$drivers_filter,$drivers_options);


          $engine = new \Engine();
          $evtlog_message = " added ".$fleet_code." ".$this->fleet_name." of type ".$fleet_typename;
          $event_me = $engine->saveEventlog($evtlog_message);

          return array("truck"=>$truck,"drivers"=>$drivers);  
          
        }
  } ?>