<?php 
  namespace carrfleetmanagement;
    class update extends \setup { 
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
         
          

          $fleet_collection = "app_fleets";
          $fleet_filter = ['FLEET_CODE'=>$this->keys];
          $fleet_document = ['FLEET_NAME'=>$this->fleet_name,'FLEET_CARNUM'=>$this->fleet_carnumber,'FLEET_DRIVER_CODE'=>$this->fleet_drivercode,'FLEET_DRIVER_NAME'=>$this->fleet_drivername,'FLEET_TYPE_CODE'=>$this->fleet_typecode,'FLEET_TYPE_NAME'=>$this->fleet_typename,'FLEET_TYPE_URL'=>$this->fleet_typeurl];
          
          $fleet_options =  [];


          $stmt = $mongo->Update($fleet_collection, $fleet_filter, $fleet_document, $fleet_options);     

        }
  } ?>