<?php 
  namespace carrdrivers;
  class lists extends \setup { 
    public $limit,$usedstatus,$employeeno;
      
      function __construct(){
        parent::__construct(); 
        $this->employeeno = $this->session->get('h20');
      }

      function Init(){
        
        $mongo=$this->mongo;
        $session=$this->session;       
        
        $userid = $session->get("userid");
        $usercompanycode = $session->get("usercompanycode");  

        $drivers_collection = "app_drivers";
        $drivers_filter = ['DRV_COMP_CODE'=>$usercompanycode];
        $drivers_options =  ['sort'=>['DRV_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $drivers = $mongo->GetAll($drivers_collection,$drivers_filter,$drivers_options);

        if($drivers){
          $engine = new \Engine();
          $evtlog_message = " fetched drivers.";
          $event_me = $engine->saveEventlog($evtlog_message);
        }

        return $drivers;
    }
}
?> 
  