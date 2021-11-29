<?php 
  namespace appinsight;
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
        
        $eventlog_collection = "app_driveractivity";
        $eventlog_filter = ['ACTIVITY_ADMIN_CODE'=>$userid];
        $eventlog_options =  ['sort'=>['ACTIVITY_DATEADDED'=>-1],'limit'=>10,'skip'=>$skipval];
        $eventlog = $mongo->GetAll($eventlog_collection,$eventlog_filter,$eventlog_options);
        
        if($eventlog){
          $engine = new \Engine();
          $evtlog_message = " fetched his eventlog ";
          $event_me = $engine->saveEventlog($evtlog_message);
        }

        return $eventlog;  
    }
}
?> 
  