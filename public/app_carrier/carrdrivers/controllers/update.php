<?php 
  namespace carrdrivers;
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
         
          $driver_collection = "app_drivers";
          $driver_filter = ['DRV_CODE'=>$this->keys];
          $driver_document = ['DRV_FIRSTNAME'=>$this->driver_fname,'DRV_LASTNAME'=>$this->driver_lname,'DRV_PHONE'=>$this->driver_phone,'DRV_ROLE'=>$this->driver_role,'DRV_TRUCK_NAME'=>$this->driver_truckname,
          'DRV_TRUCK_CODE'=>$this->driver_truckcode,'DRV_CARNUMBER'=>$this->driver_carnumber,'DRV_EMAIL'=>$this->driver_email,'DRV_NOTE'=>$this->driver_note,'DRV_LICENSENO'=>$this->driver_licenseno,'DRV_LICENSE_TYPE'=>$this->driver_licensetype,'DRV_TRUCK_TYPE_CODE'=>$this->driver_trucktypecode,'DRV_TRUCK_TYPE_NAME'=>$this->driver_trucktypename,'DRV_TRUCK_TYPE_URL'=>$this->driver_trucktypeurl];       
          
          
          $driver_options =  [];

          $stmt = $mongo->Update($driver_collection, $driver_filter, $driver_document, $driver_options);     

          if($stmt){
            $engine = new \Engine();
            $evtlog_message = " Updated ".$this->driver_fname."'s details";
            $event_me = $engine->saveEventlog($evtlog_message);
          }

        }
  } ?>