<?php 
  namespace carrshipments;
    class details extends \setup { 
        function __construct(){
          parent::__construct(); 
          $this->employeeno = $this->session->get('h20');
        }
        
        function Init(){
      
          // $data = $this->engine->getDataDecrypt($this->keys);

          // return $data;

          $data = $this->engine->getDataDecrypt($this->keys);

          $userid = $this->session->get("userid");
          $usercompanycode = $this->session->get("usercompanycode");  

          $drivers_collection = "app_drivers";
          $drivers_filter = ['DRV_COMP_CODE'=>$usercompanycode];
          $drivers_options =  ['sort'=>['DRV_FIRSTNAME'=>1]];
          $drivers = $this->mongo->GetAll($drivers_collection,$drivers_filter,$drivers_options);

          $comp_truck_collection = "app_fleets";
          $comp_truck_filter = ['FLEET_COMP_CODE'=>$usercompanycode];
          $comp_truck_options =  ['sort'=>['FLEET_NAME'=>1]];
          $comp_truck = $this->mongo->GetAll($comp_truck_collection,$comp_truck_filter,$comp_truck_options);

          $response = ['data'=>$data,'comp_truck'=>$comp_truck,'drivers'=>$drivers];

          return $response;


	      }
   } 
  
?>
