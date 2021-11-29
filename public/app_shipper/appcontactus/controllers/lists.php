<?php 
  namespace appcontactus;
  class lists extends \setup { 
    public $limit,$usedstatus,$employeeno;
      
      function __construct(){
        parent::__construct(); 
        $this->employeeno = $this->session->get('h20');
      }

      function Init(){
        
        $mongo=$this->mongo;
        $session=$this->session; 
        $query = "payslip_deduction_summary";  
        

        if(!empty($this->fdsearch)){ 
            $input = ['DEDUCTION_STATUS'=>'1','DEDUCTION_EMPLOYEE_NUMBER' => $this->employeeno
            ]; 
        }else { 
            $input = ['DEDUCTION_STATUS'=>'1','DEDUCTION_EMPLOYEE_NUMBER' => $this->employeeno]; 
        }
        
        if( isset($this->usedstatus ) &&  $this->usedstatus ){ 
          if($this->usedstatus == '1' ){  
            $input['DEDUCTION_COMP_ID']= NULL ;
          }else{ 
            $input['DEDUCTION_COMP_ID']= ['$ne'=>NULL] ;
          }
        } 

      
      
        if(!isset($this->limit)){
            $this->limit = $this->session->get("limited");
        }else if(empty($this->limit)){
            $this->limit =10;
        }
        
        global $fdsearch,$usedstatus;
        $session->set("limited",$this->limit);
        $lenght = 10; 
        $paging = new \Pagination($mongo,$query,$this->limit,$lenght,$input,''); 

        return $paging;  
    }
}
?> 
  