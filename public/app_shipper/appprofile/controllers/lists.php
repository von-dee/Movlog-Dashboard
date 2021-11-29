<?php 
  namespace appprofile;
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

        $profile_collection = "app_users";
        $profile_filter = ['USR_CODE'=>$userid];
        $profile_options =  [];
        $profile = $mongo->GetOne($profile_collection,$profile_filter,$profile_options);

        if($profile){
          $engine = new \Engine();
          $evtlog_message = $userid." fetched his profile details ";
          $event_me = $engine->saveEventlog($evtlog_message);
        }

        return $profile;  

    }
}
?> 
  