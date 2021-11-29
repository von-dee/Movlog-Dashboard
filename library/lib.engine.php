<?php
class Engine{
	public $sql;
	public $session;
	public $phpmailer;
	
	function  __construct() {
	    global $sql,$session,$phpmailer,$mongo;
		$this->session= $session;
		$this->sql = $sql;
		$this->mongo = $mongo;
		$this->phpmailer = $phpmailer;
	}
	
	public function concatmoney($num){
		if($num>1000000000000) {
			return round(($num/1000000000000),1).' tri';
		}else if($num>1000000000){ return round(($num/1000000000),1).' bil';
		}else if($num>1000000) {return round(($num/1000000),1).' mil';
		}else if($num>1000){ return round(($num/1000),1).' k';
		}
		return number_format($num);
	}// end of money abreviation function 
	
	public function generateNameforClientPhoto($clientname){
        $rand_numb = md5(uniqid(microtime()));
        $neu_name = $rand_numb.$clientname;
        return $neu_name;
	}
	
	// Generate API Key
	public function generateApiKey(){
		$length = '64';
		$token = bin2hex(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,$length));
		return $token;
	}

	// Generate Sequential Codes
	public function generateCode(String $collection,String $prefix,String $base_col){
		$no_prec = 10;#Maximum number of preceding Zeros;
		$filter = [];
		$options = ['projection'=>[$base_col=>1],'sort'=>[$base_col=> -1],'limit'=>1];
		$obj = $this->mongo->GetOne($collection, $filter, $options);
		print $this->mongo->ErrorMsg();
		if($obj){
			$rawcount = substr($obj->$base_col,strlen($prefix),100);
			$rawcount = $rawcount + 1;
			$multiplier = $no_prec - strlen($rawcount);
			$multiplier = $multiplier <=0 ? 0 : $multiplier ;
			$code = str_repeat("0",$multiplier). $rawcount;
		}else{
			$code = str_repeat("0",$no_prec - 1) . 1;
		}
		return $prefix.$code;
	}

	public function generate_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0C2f ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
        );
	}
	
	function slugGenerator($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
	
	public function saveNotification($userid,$receiverid,$message,$type,$reqcode,$reqtitle,$reqtype,$reqicon ){

		// Notification Type
		// 1 : Request Success
		// 2 : Request Warning
		// 3 : System Success
		// 4 : System Warning
		// 5 : Other

		

		$notifydate = date('Y-m-d H:i:s');		
		$notifycode = $this->generateCode('app_notification','NFY','NOTI_CODE');
		$document = ['NOTI_CODE' => $notifycode,'NOTI_SENDER'=>$userid, 'NOTI_RECEIVER'=>$receiverid,'NOTI_MESSAGE'=>$message,'NOTI_TYPE'=>$type,'NOTI_DATE'=>$notifydate,'NOTI_SERVICE'=>$reqcode,'NOTI_TITLE'=>$reqtitle,'NOTI_TYPE'=>$reqtype,'NOTI_ICON'=>$reqicon];
		$collection = "app_notification";
		
		$stmt = $this->mongo->InsertOne($collection, $document);

		// print $mongo->ErrorMsg();
		if($stmt==true){
			$notify = array('code'=>$notifycode,'status'=>'done');
		}else{
			$notify = array('code'=>'null','status'=>'done');
		}
		return $notify ;
	}


	public function saveEventlog($message){

		$requestorcode = $this->session->get("userid");
		$requestorname = $this->session->get("userfirstname").' '.$this->session->get("userlastname");          
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$remoteip = $_SERVER['REMOTE_ADDR'];
	
		$evtdate = date('Y-m-d H:i:s');
		$evtcode = $this->generateCode('app_eventlog','EVT','EVL_EVTCODE');
		$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$requestorcode."  with USERNAME:".$requestorname." ".$message;
		$toinsetsession = $this->session->getSessionID();
		$infullname ='';
		$type ='001';
		$raw = serialize($_SERVER);
		

		$document = ['EVL_EVTCODE' => $evtcode,'EVL_USERID'=>$requestorcode,'EVL_FULLNAME'=>$requestorname,'EVL_ACTIVITIES'=>$activity,'EVL_IP'=>$remoteip,'EVL_SESSION_ID'=>$toinsetsession,'EVL_BROWSER'=>$useragent,'EVL_RAW'=>$raw,'EVL_INPUTEDDATE'=>$evtdate];
		$collection = "app_eventlog";
		$stmt = $this->mongo->InsertOne($collection, $document);
	

		// print $mongo->ErrorMsg();
		if($stmt==true){
			$notify = array('code'=>$notifycode,'status'=>'done');
		}else{
			$notify = array('code'=>'null','status'=>'done');
		}
		return $notify ;
	}





	public function getConpanyDetails(String $compid){
		
		$filter = ['USR_COMPANY'=>$compid];
		$options = ['limit'=>1];
		$collection = "hub_trustee_clients";

		$stmt = $this->mongo->GetOne($collection, $filter, $options);

		if($stmt==true){
			$response = $stmt;
		}else{
			$response = false;
		}
		return $response;

	}



	


	
	public function validatePostForm($microtime){
		$postkey = $this->session->get('postkey');
		if(empty($postkey)){
			$postkey = 2;
		}
		if($postkey != $microtime){
			if($postkey == 2){
				$this->session->set('postkey',$microtime);
			}else{
				$this->session->del('postkey');
				$this->session->set('postkey',$microtime);
			}
			return true;
		}else{
			return false;
		}
   } 
   
   public function getMemberDetails($mcode){
		$collection = "hub_web_members";
		$filter = ['CM_CODE'=>$mcode];

		$stmt = $this->mongo->GetOne($collection, $filter,[]);

		return $stmt;
	}


public function getClientsStaff($staffno){
	$collection = "hub_web_members";
	$filter = ['CM_STAFNUM'=>$staffno];

	$stmt = $this->mongo->GetOne($collection, $filter,[]);

	return $stmt;
}

   public function msgBox($msg,$status){
		if(!empty($status)){
			if($status == "success"){
				echo '<div style="background-color:Green;color:#fff" class="alert alert-success"> '.$msg.'</div>';
			}elseif($status == "warning"){
				echo '<div class="alert alert-info"> '.$msg.'</div>';
			}else{
				echo '<div style="background-color:Red;color:#fff"  class="alert alert-danger"> '.$msg.'</div>';
			}
		}
	}

	
	public function getClientID(String $userid){
		$filter = ['USR_CODE'=>$userid];
		$options = ['limit'=>1];
		$collection = "hub_web_userbasic";
		
		$stmt = $this->mongo->GetOne($collection, $filter, $options);

		if($stmt==true){
			$response = $stmt->CLNT_ID;
		}else{
			$response = $stmt;
		}
		return $response;
	}


	public function getUsersDetails(String $memberid){
		$filter = ['USR_CODE'=>$memberid];
		$options = ['limit'=>1];
		$collection = "app_users";

		$stmt = $this->mongo->GetOne($collection, $filter, $options);

		if($stmt==true){
			$response = $stmt;
		}else{
			$response = false;
		}
		return $response;


	}

	public function getClientMemberDetails(String $memberid){
		$filter = ['CM_CODE'=>$memberid];
		$options = ['limit'=>1];
		$collection = "hub_web_members";

		$stmt = $this->mongo->GetOne($collection, $filter, $options);

		if($stmt==true){
			$response = $stmt;
		}else{
			$response = false;
		}
		return $response;


	}


	public function getServiceDetails(String $serviceid){
		
		$stmt =  $this->mongo->GetOne("hub_company_services",
			["CPSERV_SERVICE.SCHEMEID"	=> new \MongoDB\BSON\ObjectID( $serviceid) ],['projection'=> ['CPSERV_SERVICE.$' => 1]]);
			print $this->mongo->ErrorMsg(); 	
		
		if($stmt==true){
			$response = $stmt;
		}else{
			$response = $stmt;
		}
		return $response;

	}
	
	public function getClientDetails(String $compid){
		
		$filter = ['CLNT_COMP_CODE'=>$compid];
		$options = ['limit'=>1];
		$collection = "hub_trustee_clients";

		$stmt = $this->mongo->GetOne($collection, $filter, $options);

		if($stmt==true){
			$response = $stmt;
		}else{
			$response = false;
		}
		return $response;

	}


	public function getCustodianDetails(String $custodianid){
		
		$filter = ['FACI_CODE'=>$custodianid];
		$options = ['limit'=>1];
		$collection = "hub_companies";

		$stmt = $this->mongo->GetOne($collection, $filter, $options);

		if($stmt==true){
			$response = $stmt;
		}else{
			$response = false;
		}
		return $response;

	}




	

	
	public function getMonthInWords(String $monthnumber){
		
		
		if($monthnumber == "01"){
			$response = "January";
		}else if($monthnumber == "02"){
			$response = "February";
		}else if($monthnumber == "03"){
			$response = "March";
		}else if($monthnumber == "04"){
			$response = "April";
		}else if($monthnumber == "05"){
			$response = "May";
		}else if($monthnumber == "06"){
			$response = "June";
		}else if($monthnumber == "07"){
			$response = "July";
		}else if($monthnumber == "08"){
			$response = "August";
		}else if($monthnumber == "09"){
			$response = "September";
		}else if($monthnumber == "10"){
			$response = "October";
		}else if($monthnumber == "11"){
			$response = "November";
		}else if($monthnumber == "12"){
			$response = "December";
		}

		return $response;

	}
	
	
	public function getClientAmount($clientercode,$schemecode){
			 
		$collection = "hub_web_schemepayment";
		$filter= ['SP_EMPREGNUM'=>$clientercode,'SP_SCHEMECODE'=>$schemecode]; 
		$stmt = $this->mongo->aggregate($collection,$filter,
			[['$group'=>
		['_id'=>null, 'sum'=>
		['$sum'=>'$SP_TOTALAMOUNT']]
		
		]]);
		
		if(!empty($stmt)){
		return $stmt[0]['sum']; 
		}else{
			return 0;
			}

	}

	public function getDataEncrypt($data_array){
		$result_json = json_encode($data_array, true);
		$result = base64_encode($result_json);
		return $result;
	}

	public function getDataDecrypt($data_array){
		$result_base64 = base64_decode($data_array);
		$result = json_decode($result_base64, true);
		return $result;
	}

  
   
}
