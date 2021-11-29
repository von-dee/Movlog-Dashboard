<?php 
  namespace carrdrivers;
    class add extends \setup { 
        function __construct(){
          parent::__construct(); 
        }
        
        
        function Init(){
        
          $mongo=$this->mongo;
          $session=$this->session; 

          
          $userid = $session->get("userid");
          $usercompanycode = $session->get("usercompanycode");  
          $usercompanyname = $session->get("usercompany");  
          $userfullname = $session->get("userfirstname").' '.$session->get("userlastname");          
      
          $driver_code = $this->engine->generateCode('app_drivers','DRV','DRV_CODE');  
          $usercode_driver = $this->engine->generateCode('app_users','USR','USR_CODE'); 
          $addeddate = date("Y-m-d H:s:m" );    


          $fleet_truck = explode('@@', $this->driver_truck);
          $fleet_code = $fleet_truck[0];
          $fleet_name = $fleet_truck[1];
          $fleet_carnum = $fleet_truck[2];
          $fleet_typecode = $fleet_truck[3];
          $fleet_typename = $fleet_truck[4];
          $fleet_typeurl = $fleet_truck[5];


          $collection = "app_drivers";
          $document = ['DRV_CODE'=>$driver_code,'DRV_FIRSTNAME'=>$this->driver_fname,'DRV_LASTNAME'=>$this->driver_lname,'DRV_PHONE'=>$this->driver_phone,'DRV_ROLE'=>$this->driver_role,'DRV_TRUCK_NAME'=>$fleet_name,'DRV_TRUCK_CODE'=>$fleet_code,'DRV_CARNUMBER'=>$fleet_carnum,'DRV_NUMTRIPS'=>'0','DRV_REVENUE'=>'0','DRV_LASTTRIPDATE'=>'0','DRV_STATUS'=>'1','DRV_DATEADDED'=>$addeddate,'DRV_EMAIL'=>$this->driver_email,'DRV_NOTE'=>$this->driver_note,'DRV_LICENSENO'=>$this->driver_licenseno,'DRV_LICENSE_TYPE'=>$this->driver_licensetype,'DRV_TRUCK_TYPE_CODE'=>$fleet_typecode,'DRV_TRUCK_TYPE_NAME'=>$fleet_typename,'DRV_TRUCK_TYPE_URL'=>$fleet_typeurl,'DRV_COMP_ACTORID'=>$userid,'DRV_COMP_ACTORNAME'=>$userfullname,'DRV_COMP_CODE'=>$usercompanycode,'DRV_COMP_NAME'=>$usercompanyname,'DRV_USR_CODE'=>$usercode_driver];       
          $stmt = $mongo->InsertOne($collection,$document);
          

          // var_dump("Got here Baby"); die();

          if($stmt){

            $engine = new \Engine();
            $crypt = new \Crypt();
            $cipher = $crypt->cipher();                          
             
            $token = $engine->generateApiKey();  
            $user_init_driverid = $engine->generateCode('app_init','USR','INIT_USRCODE');
            $addeddate = date("Y-m-d H:s:m" );
    
            if($token && $user_init_driverid){
              

                $init_document = ['INIT_USRCODE' => $user_init_driverid,'INIT_APIKEY'=>$token,'INIT_DATE_ADDED'=>$addeddate,'INIT_CIPHER'=>'1'];
                $init_collection = "app_init";
                $init_stmt = $mongo->InsertOne($init_collection, $init_document);
                

                if($init_stmt){
       
                    $addeddate = date("Y-m-d H:s:m");
                    $usrstatus = "1";

                    if($token && $usercode_driver){        
                        
                      $collection = "app_users";
                      $usrtype = '2';
                      $document = ['USR_CODE'=>$usercode_driver,'USR_API_KEY'=>$token,'USR_DATE_ADDED'=>$addeddate,'USR_CIPHER'=>$cipher,'USR_PHONE'=>$this->driver_phone,'USR_FIRSTNAME'=>$this->driver_fname,'USR_LASTNAME'=>$this->driver_lname,'USR_GENDER'=>"",'USR_TYPE'=>$usrtype,'USR_LAST_LOGIN'=>$addeddate,'USR_COMPANY'=>$usercompanyname,'USR_EMAIL'=>"",'USR_OTPCODE'=>"",'USR_COMPCODE'=>$usercompanycode,'USR_STATUS'=>$usrstatus]; 
                      
                      $stmt_user = $mongo->InsertOne($collection,$document);

                      
                      if($stmt_user){

                          // init variables
                          $initcollection ="app_init";
                          $initfilter = ['INIT_USRCODE'=>$user_init_driverid];
                          $initupdate =['INIT_CIPHER'=>$cipher,'INIT_USRCODE'=>$usercode_driver,'INIT_APIKEY'=>$token];
                          $option = [];
                          $initupdate = $mongo->Update($initcollection,$initfilter,$initupdate,$option); 
                    
                      }else{
                          // $this->response(array('msg'=>'error','data'=>$mongo->ErrorMsg()),204);
                      }

                    }else{
                        // $this->response(array('msg'=>'error generating token'),404);
                    }
    
                }else{
                    // $this->response(array('msg'=>'error','data'=>$mongo->ErrorMsg()),204);
                }
            }

          }

          $truck_collection = "app_fleets";
          $truck_filter = ['FLEET_COMP_CODE'=>$usercompanycode];
          $truck_options =  ['sort'=>['FLEET_NAME'=>1]];
          $truck = $mongo->GetAll($truck_collection,$truck_filter,$truck_options);

          if($truck){
            $engine = new \Engine();
            $evtlog_message = " added driver.";
            $event_me = $engine->saveEventlog($evtlog_message);
          }

          return $truck;  

    }
}
?> 
  