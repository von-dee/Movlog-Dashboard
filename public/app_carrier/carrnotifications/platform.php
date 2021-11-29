<?php
include("controller.php");
    switch($view){
        case "details":
            include "views/details.php";
        break;
        default:
            include "views/list.php";
        break;
    }
?>