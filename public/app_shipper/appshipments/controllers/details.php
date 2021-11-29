<?php 
  namespace appshipments;
    class details extends \setup { 
        function __construct(){
          parent::__construct(); 
          $this->employeeno = $this->session->get('h20');
        }
        
        function Init(){
      
          $data = $this->engine->getDataDecrypt($this->keys);

          return $data;

	      }
   } 
  
?>
