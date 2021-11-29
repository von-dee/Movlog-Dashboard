<?php
    //MONGO DB
    $mongo = NewADOConnection($engine);
    $mongo->debug = $config->debug;
    $db = $mongo->Connect($server, $username, $password, $database);
    if(!$db){
        exit('Connection Down');
    }
    
    //SQL DB
	$sql = NewADOConnection($engine_sql);
	$sql->debug = $config->debug;
	// $db2 = $sql->Connect($server_sql, $username_sql, $password_sql, $database_sql);
	$session = new Session();
	// if(!$db2){
	//     exit('Server Two Connection Down');
	// }

    function generateFormToken() { 
		global $session;
	// generate a token from an unique value  
	$token = md5(uniqid(microtime(), true));  

	return $token; 
		
 }
 function validateFormToken() { 
     global $session;
	// check if a session is started and a token is transmitted, if not return an error 
	if(! $_POST){
		return true;
	}
	
	// check if the form is sent with token in it
	if(!isset($_POST['token'])) {
	    return false;
	} 
	
	if(!isset($_SESSION['_token'])) {  
		return false;
	} 

	// compare the tokens against each other if they are still the same
	if ($_SESSION['_token'] !== $_POST['token']) { 
      //  echo 'dd';
		return false;
	} 
	
	return true;
}

/**
 * @desc This function stores log event
 * @param string $eventcode
 * @param string $eventdesc
 * @return true
 */
function setEventLog($eventcode,$eventdesc){
    global $session,$mongo;
    $usercode = $session->get("actorcode");
    $ufullname = $session->get('loginuserfulname');
    $toinsetsession = $session->getSessionID();
    $compname = $session->get('companyname',$companyname);
    $compcode = $session->get('companycode',$companycode);
    $ips = (isset($_SERVER['REMOTE_ADDR']))? $_SERVER['REMOTE_ADDR'] : @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $raw = serialize($_SERVER);
    $rawpost = ($eventcode =='001')?'':serialize($_POST);
    $branchname = $session->get('branch_name');
    $branchcode = $session->get('branch_code');
    $membershipcode  = $session->get('membershipcode');
    //GET EVENT TYPE NAME
    $eventname = "";
    $evobj = $mongo->GetOne("crs_event_types",["EVT_CODE"=>$eventcode]);
    if($evobj){
        $eventname = $evobj->EVT_NAME;
    }
    
    $input = ["EVL_EVT_CODE"=>$eventcode,"EVL_EVT_NAME"=>$eventname,"EVL_COMP_CODE" => $compcode,
        "EVL_COMP_NAME" => $compname,
        "EVL_BRANCH_NAME" => $branchname,
        "EVL_BRANCH_CODE" => $branchcode,
        "EVL_MODERATOR_CODE" =>$usercode ,
        "EVL_MODERATOR_FULLNAME" => $ufullname,
        "EVL_ACTIVITY" => $eventdesc,
        "EVL_IP" => $ips,
        "EVL_RAW_DATA" => $rawpost,
        "EVL_SESSION" => $toinsetsession,
        "EVL_SERVER_DATA" => $raw,
        "EVL_MEMBERSHIP_CODE"=>$membershipcode,
        "EVL_INPUTEDDATE" =>date("Y-m-d H:i:s", time())];
        $mongo->InsertOne("crs_event_logs",$input);
    return TRUE;
}

 

/**
 * @desc This function stores log event
 * @param string $eventcode
 * @param string $eventdesc
 * @return true
 */
function setEventLogweb($eventcode,$eventdesc){
    global $session,$mongo;
    $usercode = $session->get("actorcode");
    $ufullname = $session->get('loginuserfulname');
    $toinsetsession = $session->getSessionID();
    $compname = 'website registration';
    $compcode = '001';
    $ips = (isset($_SERVER['REMOTE_ADDR']))? $_SERVER['REMOTE_ADDR'] : @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $raw = serialize($_SERVER);
    $rawpost = ($eventcode =='001')?'':serialize($_POST);
    $branchname = $session->get('branch_name');
    $branchcode = $session->get('branch_code');
    $membershipcode  = $session->get('membershipcode');
    //GET EVENT TYPE NAME
    $eventname = "";
    $evobj = $mongo->GetOne("crs_event_types",["EVT_CODE"=>$eventcode]);
    if($evobj){
        $eventname = $evobj->EVT_NAME;
    }
    
    $input = ["EVL_EVT_CODE"=>$eventcode,"EVL_EVT_NAME"=>$eventname,"EVL_COMP_CODE" => $compcode,
        "EVL_COMP_NAME" => $compname,
        "EVL_BRANCH_NAME" => $branchname,
        "EVL_BRANCH_CODE" => $branchcode,
        "EVL_MODERATOR_CODE" =>$usercode ,
        "EVL_MODERATOR_FULLNAME" => $ufullname,
        "EVL_ACTIVITY" => $eventdesc,
        "EVL_IP" => $ips,
        "EVL_RAW_DATA" => $rawpost,
        "EVL_SESSION" => $toinsetsession,
        "EVL_SERVER_DATA" => $raw,
        "EVL_MEMBERSHIP_CODE"=>$membershipcode,
        "EVL_INPUTEDDATE" =>date("Y-m-d H:i:s", time())];
        $mongo->InsertOne("crs_event_logs",$input);
    return TRUE;
}

  
	
	

