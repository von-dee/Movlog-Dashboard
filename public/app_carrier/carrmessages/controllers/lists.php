<?php 
  namespace carrmessages;
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


        $mesg_collection = "app_messages";
        $mesg_filter = ['MESG_RECEIVER_CODE'=>"EVB0000000001"];
        $mesg_options =  ['sort'=>['MESG_DATEADDED'=>-1],'limit'=>3,'skip'=>$skipval];
        $mesg = $mongo->GetAll($mesg_collection,$mesg_filter,$mesg_options);

        if($mesg){
          $engine = new \Engine();
          $evtlog_message = " fetched messages gotten";
          $event_me = $engine->saveEventlog($evtlog_message);
        }

        return $mesg;  
    }
}
?> 
  