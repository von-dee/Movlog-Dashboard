<?php 
  namespace carrnotifications;
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
      
        $noti_collection = "app_notification";
        $noti_filter = ['NOTI_RECEIVER'=>"EVB0000000001"];
        $noti_options =  ['sort'=>['NOTI_DATE'=>-1],'limit'=>3,'skip'=>$skipval];
        $noti = $mongo->GetAll($noti_collection,$noti_filter,$noti_options);
        
        if($noti){
          $engine = new \Engine();
          $evtlog_message = " fetched a list of notifications ";
          $event_me = $engine->saveEventlog($evtlog_message);
        }

        return $noti;  
    }
}
?> 
  