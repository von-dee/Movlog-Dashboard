<?php 
  namespace carrfleetmanagement;
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

        $fleet_collection = "app_fleets";
        $fleet_filter = ['FLEET_COMP_CODE'=>$usercompanycode];
        $fleet_options =  ['sort'=>['FLEET_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $fleet = $mongo->GetAll($fleet_collection,$fleet_filter,$fleet_options);

        if($fleet){
          $engine = new \Engine();
          $evtlog_message = " fetched a list of fleet ";
          $event_me = $engine->saveEventlog($evtlog_message);
        }

        
        return $fleet; 
    }
}
?> 
  