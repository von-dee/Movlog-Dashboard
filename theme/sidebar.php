<?php 
global $session;
global $mongo;

$userid = $session->get("userid");
$usercompanycode = $session->get("usercompanycode"); 

// if not 5
// $completed_filter = ['URQ_ARTISAN_COMP_CODE'=>$usercompanycode,'REQ_STATUS'=> ["$ne"=>"5"]];

// 1 or 2 or 3
// $completed_filter = ['URQ_ARTISAN_COMP_CODE'=>$usercompanycode,"$or"=>['REQ_STATUS'=>"2", 'REQ_STATUS'=>"1"]];


if($session->get("usertype") == "2"){

    $inprogress_collection = "app_accepted_request";
    $inprogress_filter = ['URQ_DRIVER_COMP_CODE'=>$usercompanycode,'URQ_STATUS'=>['$in'=> ["1", "2","3","4"]]];
    $inprogress_options =  [];
    $inprogress_num = $mongo->getTotalNumberOfRows($inprogress_collection,$inprogress_filter,$inprogress_options);
    

    $completed_collection = "app_accepted_request";
    $completed_filter = ['URQ_DRIVER_COMP_CODE'=>$usercompanycode,'URQ_STATUS'=> "5"];
    $completed_options = [];
    $completed_num = $mongo->getTotalNumberOfRows($completed_collection,$completed_filter,$completed_options);

    $all_collection = "app_accepted_request";
    $all_filter = ['URQ_DRIVER_COMP_CODE'=>$usercompanycode];
    $all_options = [];
    $clients_num = $mongo->getTotalNumberOfRows($all_collection,$all_filter,$all_options);
   

}elseif($session->get("usertype") == "4"){

    $inprogress_collection = "app_request";
    $inprogress_filter = ['REQ_REQUESTOR_CODE'=>$userid,'REQ_STATUS'=>['$in'=> ["1", "2","3","4"]]];
    $inprogress_options =  [];
    $inprogress_num = $mongo->getTotalNumberOfRows($inprogress_collection,$inprogress_filter,$inprogress_options);

    
    $completed_collection = "app_request";
    $completed_filter = ['REQ_REQUESTOR_CODE'=>$userid,'REQ_STATUS'=> "5"];
    $completed_options = [];
    $completed_num = $mongo->getTotalNumberOfRows($completed_collection,$completed_filter,$completed_options);


    $all_collection = "app_request";
    $all_filter = ['REQ_REQUESTOR_CODE'=>$userid];
    $all_options = [];
    $clients_num = $mongo->getTotalNumberOfRows($all_collection,$all_filter,$all_options);

}




?>



<div class="page-body">

    <style>
        .grey_color {
            color: #525c5d !important;
        }
    </style>

    <!-- partial:partials/_sidebar.html -->
    <div class="sidebar">

        <div class="user-profile">
            <div class="display-avatar animated-avatar"><img class="profile-img img-lg rounded-circle"
                    src="./media/img/truckbw.png" alt="profile image"></div>
            <div class="info-wrapper">
                <p class="user-name">
                    <?php 
                    if(!empty($session->get("usercompany"))){
                        echo $session->get("usercompany");
                    }else{
                        echo $session->get("userfirstname")." ".$session->get("userlastname");
                    }
                ?>
                </p>

                <?php 
                    if($session->get("usertype") == "2"){

                        
                        $company_amt_collection = "app_accepted_request";
                        $company_amt_filter = ['URQ_DRIVER_COMP_CODE'=>$usercompanycode,'URQ_STATUS'=> "5"];
                        $company_amt_options = [];
                        $company_amt = $mongo->GetAll($company_amt_collection,$company_amt_filter,$company_amt_options);
                        $total_money = "";
                        $total_money_made = 0;
                        $percentage = 90/100;
                        foreach($company_amt as $keyd => $value){ 
                            $total_money = $value['URQ_BUDGET'];
                            // $total_money = $total_money + $value['REQ_TOTAL_AMOUNT'];
                        }
                        // $total_money_made = $total_money * $percentage;
                ?>
                <h6 class="display-income">GHC
                    <?php if(!empty($total_money)){echo $total_money;} else { echo "0.00";} ?></h6>
                <?php
                    }elseif($session->get("usertype") == "4"){
                ?>
                <h6 class="display-income"> <?php echo $inprogress_num + $completed_num; ?> Requests</h6>
                <?php
                        // echo $session->get("userfirstname")." ".$session->get("userlastname");
                    }
                ?>


            </div>
        </div>


        <?php
            
            
            $usertype = $session->get("usertype");
            
            if( $usertype == "4"){
            
        ?>

        <ul class="navigation-menu">
            <li class="nav-category-divider">MAIN</li>

            <li>
                <a href="index.php?pg=dashboard">
                    <span class="link-title grey_color">Dashboard</span> <i class="mdi mdi-gauge link-icon grey_color"></i>
                </a>
            </li>
            <li><a href="index.php?pg=appinsight"><span class="link-title grey_color">Insight
                        Pages</span> <i class="mdi mdi-flask link-icon grey_color"></i></a>
            </li>
            <li><a href="index.php?pg=appshipments&view=add"><span class="link-title grey_color">Create Request
                    </span> <i class="mdi mdi-truck-delivery link-icon grey_color"></i></a>
            </li>
            <li><a href="index.php?pg=appshipments"><span class="link-title grey_color">All Requests</span> <i
                        class="mdi mdi-book-minus link-icon grey_color"></i></a></li>
            <li>
                <a href="index.php?pg=appshipments&view=lists_completed">
                    <span class="link-title grey_color">History</span> 
                    <i class="mdi mdi-history link-icon grey_color"></i>
                </a>
            </li>
            <li class="nav-category-divider">MOVLOG</li>
            <li><a href="index.php?pg=appcontactus">
                    <span class="link-title grey_color">Contact Us</span> <i
                        class="mdi mdi-headset link-icon grey_color"></i></a></li>
        </ul>


        <?php
            
            }elseif( $usertype == "2"){

        ?>

        <ul class="navigation-menu">
            <li class="nav-category-divider">MAIN</li>
            <li><a href="index.php?pg=dashboard"><span class="link-title grey_color">Dashboard</span> <i
                        class="mdi mdi-gauge link-icon grey_color"></i></a>
            </li>
            <li><a href="index.php?pg=appinsight"><span class="link-title grey_color">Insight
                        Pages</span> <i class="mdi mdi-flask link-icon grey_color"></i></a>
            </li>
            <li><a href="index.php?pg=appshipments&view=add"><span class="link-title grey_color">Create Request
                    </span> <i class="mdi mdi-truck-delivery link-icon grey_color"></i></a>
            </li>
            <li><a href="index.php?pg=appshipments"><span class="link-title grey_color">All Requests</span> <i
                        class="mdi mdi-book-minus link-icon grey_color"></i></a></li>
            <li>
                <a href="index.php?pg=appshipments&view=lists_completed&class_call=lists_completed">
                    <span class="link-title grey_color">History</span> 
                    <i class="mdi mdi-history link-icon grey_color"></i>
                </a>
            </li>
            <li><a href="index.php?pg=appfleetmanagement"><span class="link-title grey_color">Fleet Management</span> <i
                        class="mdi mdi-truck link-icon grey_color"></i></a></li>
            <li><a href="index.php?pg=appdrivers"><span class="link-title grey_color">Drivers</span> <i
                        class="mdi mdi-steering link-icon grey_color"></i></a></li>
            

            <li class="nav-category-divider">MOVLOG</li>
            <li><a href="index.php?pg=appcontactus">
                    <span class="link-title grey_color">Contact Us</span> <i
                        class="mdi mdi-headset link-icon grey_color"></i></a></li>
        </ul>
        <?php
            }    
        ?>


    </div><!-- partial -->