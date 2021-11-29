<?php
    /**
     *@desc this class handles all the client end log in details and methods
     *@desc this depands on the connect.php and Session.class.php
     */
	@define('USER_LOGIN_VAR',$uname);
	@define('USER_PASSW_VAR',$pwd);
	@define('USER_COUNT',$passager);
	@define('HIDDED_PASS',$doLogin);
	@define('HIDDED_PASSVALUE','systemPingPass');
	//@define('USER_CAPTCHA_TXT',$txtcaptha);

//die($usname.'|'.$pwd);
	class Login{
		private $session;
		private $redirect;
		private $hashkey;
		private $md5 = false;
		private $sha2 = false;
		private $remoteip;
		private $useragent;
		private $sessionid;
		private $result;
		private $connect;
		private $crypt;
    	private $jconfig;

		public function __construct(){
			global $mongo,$session;
			$this->redirect ="index.php?action=login";
			$this->hashkey	=$_SERVER['HTTP_HOST'];
			$this->sha2=true;
			$this->remoteip = $_SERVER['REMOTE_ADDR'];
			$this->useragent = $_SERVER['HTTP_USER_AGENT'];
			$this->session	=$session;
			$this->connect =$mongo; // $sql;
			$this->crypt = new Crypt();
     	    $this->sessionid = $this->session->getSessionID();
			$this->signin();

		}
		public function cryptpass($uname,$pass){
			if($this->md5){

			}else if($this->sha2){
			  	$pass = $this->crypt->loginPassword($uname,$pass);
			}else{
				$pass = USER_PASSW_VAR;
			} 
        	return $pass;
      	}


		private function signin(){

			if($this->session->get('hash_key')){
				$this->confirmAuth();
				return;
			}

			if(HIDDED_PASS != HIDDED_PASSVALUE ){
				$this->logout();
			}

			if(USER_LOGIN_VAR=="" || USER_PASSW_VAR == ""){
				$this->logout("empty");
			}
			/*
			if(USER_CAPTCHA_TXT =="" ||($this->session->get('code') != USER_CAPTCHA_TXT)){
				$this->direct("captchax");
			}
			*/			  

			// var_dump(USER_LOGIN_VAR); var_dump(USER_PASSW_VAR); die();
			$passwrd = USER_PASSW_VAR;

			// if($this->md5){

			// }else if($this->sha2){
			//   	$passwrd = $this->crypt->loginPassword(USER_LOGIN_VAR,USER_PASSW_VAR);
			// }else{
			// 	$passwrd = USER_PASSW_VAR;
			// }
			
			

			$filter = ['USR_PHONE'=> USER_LOGIN_VAR,'USR_OTPCODE'=> $passwrd,'USR_STATUS'=>'1'];
			$options = ['projection'=>['USR_CODE'=>1,'USR_FIRSTNAME'=>1,'USR_LASTNAME'=>1,'USR_API_KEY'=>1,'USR_CIPHER'=>1,'USR_PHONE'=>1,'USR_GENDER'=>1,'USR_TYPE'=>1,'USR_EMAIL'=>1,'USR_COMPANY'=>1,'USR_OTPCODE'=>1,'USR_COMPCODE'=>1]];
			$stmt = $this->connect ->GetOne("app_users",$filter,$options);
			print $this->connect->ErrorMsg();

			if($stmt){
					$arr = $stmt;
					$userid = $arr->USR_CODE;
					$userfirstname = $arr->USR_FIRSTNAME;
					$userlastname = $arr->USR_LASTNAME;
					$userapikey = $arr->USR_API_KEY;
					$usercipher = $arr->USR_CIPHER;
					$userphone = $arr->USR_PHONE;
					$usergender = $arr->USR_GENDER;
					$usertype = $arr->USR_TYPE;
					$useremail = $arr->USR_EMAIL;
					$usercompany = $arr->USR_COMPANY;
					$usercompanycode  = $arr->USR_COMPCODE;
					$userotpcode = $arr->USR_OTPCODE;

					$this->storeAuth($userid,$userfirstname,$userlastname,$userapikey,$usercipher,$userphone,$usergender,$usertype,$useremail,$usercompany,$userotpcode,$usercompanycode);
					$this->setLog("1");
					header('Location: ' . $this->redirect);
					
				//	var_dump($userid);die();

					//actions

				}else{
					$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  with USERNAME:".USER_LOGIN_VAR." and PASSWORD:".USER_PASSW_VAR;
					$toinsetsession = $this->session->getSessionID();
					$infullname ='';
					$type ='003';
					$raw = serialize($_SERVER);
					$query = "INSERT INTO framework_eventlog (EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_IP,EVL_SESSION_ID,EVL_BROWSER,EVL_RAW) VALUES (".$this->connect->Param('a').",".$this->connect->Param('b').",".$this->connect->Param('c').",".$this->connect->Param('d').",".$this->connect->Param('e').",".$this->connect->Param('f').",".$this->connect->Param('g').",".$this->connect->Param('h').")";
					$stmt = $this->connect->Execute($query,array($type,'0',$infullname,$activity,$this->remoteip,$toinsetsession,$this->useragent,$raw));

			        print $this->connect->ErrorMsg();
					$this->logout("wrong");
				}


		//	}else{
			//error msg
		//	}

		}//end

	public function direct($direction=''){
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Cache-Control: no-store, no-cache, must-validate');
		header('Cache-Control: post-check=0, pre-check=0',FALSE);
		header('Pragma: no-cache');
		if($direction == 'empty'){
			header('Location: ' . $this->redirect.'&attempt_in=0');
		}else if($direction == 'wrong'){
			header('Location: ' .$this->redirect.'&attempt_in=1');
		}else if($direction == 'subspen'){
			header('Location: ' .$this->redirect.'&attempt_in=120');
		}else if($direction == 'alreadyin'){
			header('Location: ' .$this->redirect.'&attempt_in=140');
		}else if($direction == 'locked'){
			header('Location: ' .$this->redirect.'&attempt_in=110');
		}else if($direction=="out"){
			header('Location: ' .$this->redirect);
		}else if ( $direction =='captchax'){
			header('Location: ' .$this->redirect.'&attempt_in=11');
		}else if ( $direction =='lock'){
			header('Location: ' .$this->lockdirect);
		}else{
			header('Location: ' .$this->redirect);
		}
		exit;
	}

	public function storeAuth($userid,$userfirstname,$userlastname,$userapikey,$usercipher,$userphone,$usergender,$usertype,$useremail,$usercompany,$userotpcode,$usercompanycode){
		// var_dump($usertype); die($usertype);

		$this->session->set('userid',$userid);
		$this->session->set('userfirstname',$userfirstname);
		$this->session->set('userlastname',$userlastname);
		$this->session->set('userapikey',$userapikey);
		$this->session->set('usercipher',$usercipher);
		$this->session->set('userphone',$userphone);
		$this->session->set('usergender',$usergender);
		$this->session->set('usertype',$usertype);
		$this->session->set('useremail',$useremail);
		$this->session->set('usercompany',$usercompany);
		$this->session->set('usercompanycode',$usercompanycode);
		$this->session->set('userotpcode',$userotpcode);
		$this->session->set('random_seed',md5(uniqid(microtime())));
		$hashkey = md5($this->hashkey . $login .$this->remoteip.$this->sessionid.$this->useragent);
		$this->session->set('hash_key',$hashkey);
		$this->session->set("LAST_REQUEST_TIME",time());

	}//end

	public function logout($msg="out"){

		if($msg =="out"){
			//UPDATE THE CURRENCY USER LOGIN DETAILS
			$userid=$this->session->get("actorid");
			$this->connect->Execute("UPDATE framework_users SET USR_LOGIN_STATUS = '0',USR_LASTLOGIN_DATE = ".$this->connect->Param('a')." WHERE USR_ID = ".$this->connect->Param('e'),array(date("Y-m-d H:i:s"),$userid));
			$this->setLog("0");
		}

		$this->session->del('userid');
		$this->session->del('userfirstname');
		$this->session->del('userlastname');
		$this->session->del('userapikey');
		$this->session->del('usercipher');
		$this->session->del('userphone');
		$this->session->del('usergender');
		$this->session->del('usertype');
		$this->session->del('useremail');
		$this->session->del('usercompany');
		$this->session->del('usercompanycode');
		$this->session->del('userotpcode');
		$this->session->del('hash_key');
		$this->direct($msg);
	}//end

	public function confirmAuth(){

		$login = $this->session->get("h1");
		$hashkey = $this->session->get('hash_key');

		if(md5($this->hashkey . $login .$this->remoteip.$this->sessionid.$this->useragent) != $hashkey){
			$this->logout();
		}else{
			//UPDATE SESSION
			$userid=$this->session->get("actorid");
			$this->connect->Execute("UPDATE framework_users SET USR_LASTLOGIN_DATE = ".$this->connect->Param('a')." WHERE USR_ID = ".$this->connect->Param('e'),array(date("Y-m-d H:i:s"),$userid));
		}

	}//end

	private function setLog($act){
		$userid=$this->session->get("actorid");
		$ufullname = $this->session->get('loginuserfulname');
		$toinsetsession = $this->session->getSessionID();
		$raw = serialize($_SERVER);
		$query = "INSERT INTO framework_eventlog (EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_IP,EVL_SESSION_ID,EVL_BROWSER,EVL_RAW) VALUES (".$this->connect->Param('a').",".$this->connect->Param('b').",".$this->connect->Param('c').",".$this->connect->Param('d').",".$this->connect->Param('e').",".$this->connect->Param('f').",".$this->connect->Param('g').",".$this->connect->Param('h').")";
		if($act == "1"){
			$type ='001';
			$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  on SESSION ID:".$this->session->getSessionID();
		}else if($act == "0"){
			$userid = ($userid == "0")?"-1":$userid;
			$type ='002';
			$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  on SESSION ID:".$this->session->getSessionID();
		}

        $this->connect->Execute($query,array($type,$userid,$ufullname,$activity,$this->remoteip,$toinsetsession,$this->useragent,$raw));
          print $this->connect->ErrorMsg();
       }

	}
?>