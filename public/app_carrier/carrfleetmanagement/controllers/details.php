<?php 
  namespace carrfleetmanagement;
    class details extends \setup { 
        function __construct(){
          parent::__construct(); 
          $this->employeeno = $this->session->get('h20');
        }
        
        function Init(){
        
          
          $mongo=$this->mongo;
          $session=$this->session; 
          
          $userid = $session->get("userid");


          $driver_collection = "app_fleets";
          $driver_filter = ['FLEET_CODE'=>$this->keys];
          $driver_options =  [];
          $driver = $mongo->GetOne($driver_collection,$driver_filter,$driver_options);

          if($driver){
            $engine = new \Engine();
            $evtlog_message = $this->keys." fetched fleet details";
            $event_me = $engine->saveEventlog($evtlog_message);
          }

          return $driver; 

	      }
   } 
  
?>
