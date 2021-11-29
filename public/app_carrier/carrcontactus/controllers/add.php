<?php 
  namespace carrcontactus;
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

        

        $contact_code = $this->engine->generateCode('app_contactus','CUS','CONTACT_CODE');   

        $contact_userid = $session->get("userid");
        $contact_fullname = $session->get("userfirstname").' '.$session->get("userlastname");          
        $contact_phone = $session->get("userphone");
        $addeddate = date("Y-m-d H:s:m" );    
        
        

        $collection = "app_contactus";
        $document = ['CONTACT_USERCODE'=>$contact_code,'CONTACT_USERNAME'=>$contact_fullname,'CONTACT_SUBJECT'=>$this->contact_subject,'CONTACT_MESSAGE'=>$this->contact_body,'CONTACT_STATUS'=>"1",'CONTACT_DATEADDED' => $addeddate,'CONTACT_PHONE'=>$contact_phone];       

        $stmt = $mongo->InsertOne($collection,$document);

        if($stmt){
          $engine = new \Engine();
          $evtlog_message = " added ".$this->contact_body." as contacts";
          $event_me = $engine->saveEventlog($evtlog_message);
        }

        
        return $stmt;  

    }
}
?> 
  