<?php 
  namespace appmessages;
    class details extends \setup { 
        function __construct(){
          parent::__construct(); 
          $this->employeeno = $this->session->get('h20');
        }
        
        function Init(){
        
          $vt = explode(',, ', $this->keys);

          $stmt= $this->mongo->GetAll('payslip_deduction_details',
                  ['DEDUCT_ELEMENT_TYPE_ID'=>$vt[7], 'DEDUCT_EMPLOYEE_NUMBER'=>$this->employeeno],
                  
                  ['projection'=>['DEDUCT_ELEMENT_ENTRY_ID'=>1,'DEDUCT_ELEMENT_TYPE_ID'=>1,'DEDUCT_ELEMENT_NAME'=>1,
                  'DEDUCT_PAYMENT_DATE'=>1,'DEDUCT_MONTH'=>1,'DEDUCT_YEAR'=>1,'DEDUCT_MONTHLY_DEDUCTION'=>1,
                  'DEDUCT_BALANCE_FORWARD'=>1,'DEDUCT_DATEADDED'=>1,'DEDUCT_STAGE'=>1]]
              );


          return array($vt, $stmt);
  

	      }
   } 
  
?>
