<?php

include("controller.php");
    switch($view){
		case "add":
		   include "views/add.php";
        break;
        default:
            include "views/list.php";
        break;

        // Freight Platform 
        
        case "add_freight":
            include "views/add_freight.php";
        break;
        
        case "details":
            include "views/details.php";
        break;

        case "lists_new":
            include "views/lists_new.php";
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
        
        
        // Heavy Duty Platform 
        case "add_construction":
            include "views/add_construction.php";
        break;

        case "details_construction":
            include "views/details_construction.php";
        break;

        case "lists_new_construction":
            include "views/lists_hvd_new.php";
        break;

        case "lists_completed_construction":
            include "views/lists_hvd_completed.php";
        break;

        case "lists_inprocess_construction":
            include "views/lists_hvd_inprocess.php";
        break;
        
        case "lists_cancelled_construction":
            include "views/lists_hvd_cancelled.php";
        break;
        


       
       


        // Other Platform
        case "edit":
            include "views/edit.php";
        break;

    }
    
    include("scripts/js.php");
?>