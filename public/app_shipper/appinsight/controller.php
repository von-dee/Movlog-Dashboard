<?php
$action= "appinsight\\".(($class_call)? $class_call :"lists"); 
$class_int= new $action;
$result= $class_int->Init(); 

include("scripts/js.php");
?>