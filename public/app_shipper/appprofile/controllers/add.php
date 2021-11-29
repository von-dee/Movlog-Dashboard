<?php 
  namespace appprofile;
  class add extends \setup { 
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
        $profile_document = ["USR_FIRSTNAME"=> $this->usrfname, "USR_LASTNAME"=> $this->usrlname, "USR_GENDER"=> $this->urs_gender, "USR_PHONE"=> $this->urs_phone, "USR_COMPANY"=> $this->urs_orgname, "USR_EMAIL"=> $this->urs_email];     

        $profile_options =  [];

        $stmt = $mongo->Update($profile_collection, $profile_filter, $profile_document, $profile_options);     

        if($stmt){

            if($session->get("userfirstname") == "" || $session->get("userfirstname") == ""){
                $session->set('userfirstname',$this->usrfname);
            }elseif($session->get("userlastname") == "" || $session->get("userlastname") == ""){
                $session->set('userlastname',$this->usrlname);
            }elseif($session->get("userphone") == "" || $session->get("userphone") == ""){
                $session->set('userphone',$this->urs_phone);
            }elseif($session->get("usergender") == "" || $session->get("usergender") == ""){
                $session->set('usergender',$this->urs_gender);
            }elseif($session->get("useremail") == "" || $session->get("useremail") == ""){
                $session->set('useremail',$this->urs_email);
            }elseif($session->get("usercompany") == "" || $session->get("usercompany") == ""){
                $session->set('usercompany',$this->urs_orgname);
            }

            $engine = new \Engine();
            $evtlog_message = " ".$userid." ".$this->usrfname." ".$this->usrlname." updated profile ";
            $event_me = $engine->saveEventlog($evtlog_message);
  
        }


        $profile = $mongo->GetOne($profile_collection, $profile_filter, $profile_options);

        return $profile;  

    }
}
?> 
  