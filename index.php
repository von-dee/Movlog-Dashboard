<?php
### Orcons FrameWork 3 Class Edition which is compactible with Orcons Class API.
### Date Created: 19-09-2019.
### Developed By:  Dev.Team @ Orcons Systems Limited.

include "config.php"; 
if(isset($action) && strtolower($action) == 'site'){
	include('web/platform.php');
		die();
}
if(isset($action) && strtolower($action) == 'register'){
	include('public/register/register.view.php');
		die();
}
if(isset($action) && strtolower($action) == 'signup'){
	include('public/site_signup/platform.php');
		die();
}
if(isset($action) && strtolower($action) == 'login'){
include('public/login/login.view.php');
	die();
}
$log = new Login();

if(isset($action) && strtolower($action) == 'logout'){ 
	$log->logout();
}

if(isset($doLogin) && $doLogin == 'systemPingPass'){
	header('Location: index.php?action=index&pg=dashboard');
	
	
	
	die('Please wait...redirecting page');
}

### Inside the system now
$engine = new Engine();
$config = new JConfig();
$nav = new Nav();

$months=array("01"=>"JAN","02"=>"FEB","03"=>"MAR","04"=>"APR","05"=>"MAY","06"=>"JUN","07"=>"JUL","08"=>"AUG","09"=>"SEPT","10"=>"OCT","11"=>"NOV","12"=>"DEC");


### ini_set('display_errors', 1);

include("public/root.platform.php");

?>