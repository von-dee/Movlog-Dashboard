<?php
include("controller.php");
    switch($view){
		case "add":
		   include "views/add.php";
        break;
        case "add_freight":
            include "views/add_freight.php";
         break;
         case "add_construction":
            include "views/add_construction.php";
         break;
        case "edit":
		   include "views/edit.php";
        break;
        case "details":
            include "views/details.php";
        break;
        case "details_construction":
            include "views/details_construction.php";
        break;
        case "lists_completed":
            include "views/lists_completed.php";
        break;
        case "lists_inprocess":
            include "views/lists_inprocess.php";
        break;
        case "lists_cancelled":
            include "views/lists_cancelled.php";
        break;
        default:
            include "views/list.php";
        break;
    }
    
    include("scripts/js.php");
?>