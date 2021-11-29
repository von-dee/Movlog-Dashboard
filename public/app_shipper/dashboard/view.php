<style>
    .grid_inner {
        padding: 10px 25px 10px;
    }

    .grid_inner_number {
        float: right;
        padding: 6px 0px;
    }

    .grid_inner_title {
        font-size: 10px;
    }

    .light_heading {
        font-size: 12px;
        color: #aaa9b6;
        font-weight: 400;
    }

    .order_num {
        font-size: 12px;
        font-weight: 600;
        color: #bbbac5;
    }

    .order_num_left{
        font-size: 12px;
        font-weight: 600;
        color: #bbbac5;
        /* margin-left: 1.5em; */
    }

    .order_status {
        margin: 5px 0px;
    }

    .progress_{
        margin-top: 1em;
    }

    .dest_color{
        color: #696ffb;
    }

    .view_btn{
        background: white;
        border: none;
        font-size: 12px;
        width: 8em;
        padding: 6px;
        box-shadow: 0 0 10px -5px rgba(183, 192, 206, .15);
    }

    .float_right{
        box-shadow: 0 0 10px -5px rgba(183, 192, 206, .15);
        float: right;
    }

    .sem_heading{
        margin-bottom: 2em;
    }

    
    .order_num_main{
        font-size: 8.5px;
        font-weight: 600;
        color: #bbbac5;
    }

    .green_color{
        color: #2b9c32;
    }

    .gold_color{
        color: #b37b1b;
    }

    .float_right{
        box-shadow: 0 0 10px -5px rgba(183, 192, 206, .15);
        float: right;
    }

</style>


<div class="page-content-wrapper-inner">
    <div class="content-viewport">
        <div class="row">
            <div class="col-12 py-5">
                <h4>Dashboard</h4>
                <p class="text-gray">Welcome aboard, <?php echo $session->get("userfirstname"); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2">
                <div class="grid">
                    <div class="grid_inner">
                        <a class="grid-title grid_inner_title">All Requests <span
                                class="grid_inner_number"><?php echo $inprogress_num + $completed_num; ?></span></a>
                    </div>
                </div>
                <div class="grid">
                    <div class="grid_inner">
                        <a class="grid-title grid_inner_title">In-progress <span class="grid_inner_number"><?php echo $inprogress_num; ?></span></a>
                    </div>
                </div>
                <!-- <div class="grid">
                    <div class="grid_inner">
                        <a class="grid-title grid_inner_title">Up Coming <span class="grid_inner_number">1</span></a>
                    </div>
                </div> -->
                <div class="grid">
                    <div class="grid_inner">
                        <a class="grid-title grid_inner_title">Past <span class="grid_inner_number"><?php echo $completed_num; ?></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <span class="light_heading">In-progress [: Freight Vehicles]</span>

                <?php
                    foreach($result['request_inprogress'] as $keyd => $value){ 

                        $data = $engine->getDataEncrypt($value);

                ?>

                <div class="grid">
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <span class="grid-title order_num_main"><?php echo $value['REQ_CODE']; //AC31427?> </span>
                            </div>
                            <div class="col-lg-2">
                                <?php 
									$arr_inner = array("0", $engine->getDataEncrypt($value));
									$implode_data_cancel = implode("@@",$arr_inner);
									
									if($value['REQ_STATUS'] == "0"){		
								?>
									<span class="grid-title order_num_main" style="color: #f00;"> <b class="org_color">Status:</b> <i class="mdi mdi-close-octagon"></i> Request Cancelled</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "1"){
								?>
                                    <span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-adjust"></i> Waiting Driver</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "2"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-truck-delivery"></i> Driver Assigned</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "3"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-road-variant"></i> In Transit</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "4"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-home-map-marker"></i> At Destination</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "5"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-bookmark-check"></i> Completed</span>
								<?php 
									}
								?>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="grid-title order_status">
                                    <?php 
                                        if($value['REQ_STATUS'] == "1"){
                                            echo "Waiting Driver";
                                        }elseif($value['REQ_STATUS'] == "2"){
                                            echo "Driver Assigned";
                                        }elseif($value['REQ_STATUS'] == "3"){
                                            echo "In Transit";
                                        }elseif($value['REQ_STATUS'] == "4"){
                                            echo "At Destination";
                                        }elseif($value['REQ_STATUS'] == "5"){
                                            echo "Completed";
                                        }                                    
                                    ?>
                                </h2>
                                <span class="grid-title order_num"><?php echo $value['REQ_STATUS_DATE_UPDATE']; //July 20th 1:30pm?></span>
                                <span class="grid-title order_num">
                                    <div class="progress progress-slim progress_">
                                        <div class="progress-bar bg-info progress-bar-striped" role="progressbar"
                                            style="width: 
                                            <?php 
                                                if($value['REQ_STATUS'] == "1"){
                                                    echo "20%";
                                                }elseif($value['REQ_STATUS'] == "2"){
                                                    echo "40%";
                                                }elseif($value['REQ_STATUS'] == "3"){
                                                    echo "60%";
                                                }elseif($value['REQ_STATUS'] == "4"){
                                                    echo "80%";
                                                }elseif($value['REQ_STATUS'] == "5"){
                                                    echo "100%";
                                                }                                    
                                            ?>
                                            " aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-2">
                                <h2 class="grid-title order_status"> <i
                                        class="mdi mdi-arrow-up-bold-hexagon-outline gold_color"></i> <?php echo $value['REQ_LOCATION']; //Accra, Ghana ?> </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_TOTAL_ITEMS']; //July 20th?> Items</span> <br>
                                <span class="grid-title order_num_left">GHC <?php echo $value['REQ_TOTAL_AMOUNT']; //1:30pm?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_CAR']; //1:30pm?></span>
                            </div>
                            <div class="col-lg-2">
                                <h2 class="grid-title order_status"> <i
                                        class="mdi mdi-arrow-down-bold-hexagon-outline green_color"></i> <?php echo $value['REQ_LOCATION_FROM']; //Kumasi, Ghana?> 
                                </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_PICKUP_DATE']; //July 20th?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_PICKUP_TIME']; //1:30pm?></span>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_ARTISAN_COMP_PHONE']; //1:30pm?></span>
                            </div>
                            <div class="col-lg-2">
                                <?php 
                                    if($value['REQ_STATUS'] != "1"){
                                ?>
                                
                                <h2 class="grid-title order_status"> 
                                    <i class="mdi mdi-steering dest_color"></i> 
                                    <?php echo $value['REQ_DRIVER_NAME']; //Driver Name?> 
                                </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_PHONE']; //Phone?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_CARNUMBER']; //Phone?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_ARTISAN_COMP_NAME']; //Company?></span>
                                <?php
                                    } 
                                ?>
                                
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="view_btn float_right" onclick="$('#pg').val('appshipments');$('#view').val('details');$('#class_call').val('details');$('#keys').val('<?php echo $data; ?>');document.myform.submit();"> Details <i class="mdi mdi-arrow-right dest_color"></i> </button>
                            </div>
                        </div>
                            
                        <div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>

                <div class="sem_heading">
                    <button type="submit" class="view_btn" onclick="$('#pg').val('appshipments');$('#view').val('lists_inprocess');$('#class_call').val('lists_inprocess');document.myform.submit();">View All <i class="mdi mdi-arrow-right dest_color"></i> </button>
                </div>


                <!-- ///// Heavy Duty Vehicles Requests ///////// -->

                <span class="light_heading">In-progress [: Heavy Duty Vehicles] </span>

                <?php
                    foreach($result['request_hdv_inprogress'] as $keyd => $value){ 
                        $items = json_decode($value['REQ_VEHICLES']);
                        
                        $data = $engine->getDataEncrypt($value);

                ?>

                <div class="grid">
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <span class="grid-title order_num_main"><?php echo $value['REQ_CODE']; //AC31427?> </span>
                            </div>
                            <div class="col-lg-2">
                                <?php 
									$arr_inner = array("0", $engine->getDataEncrypt($value));
									$implode_data_cancel = implode("@@",$arr_inner);
									
									if($value['REQ_STATUS'] == "0"){		
								?>
									<span class="grid-title order_num_main" style="color: #f00;"> <b class="org_color">Status:</b> <i class="mdi mdi-close-octagon"></i> Request Cancelled</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "1"){
								?>
                                    <span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-adjust"></i> Waiting Driver</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "2"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-truck-delivery"></i> Driver Assigned</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "3"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-road-variant"></i> In Transit</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "4"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-home-map-marker"></i> At Destination</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "5"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-bookmark-check"></i> Completed</span>
								<?php 
									}
								?>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="grid-title order_status">
                                    <?php 
                                        if($value['REQ_STATUS'] == "1"){
                                            echo "Waiting Driver";
                                        }elseif($value['REQ_STATUS'] == "2"){
                                            echo "Driver Assigned";
                                        }elseif($value['REQ_STATUS'] == "3"){
                                            echo "In Transit";
                                        }elseif($value['REQ_STATUS'] == "4"){
                                            echo "At Destination";
                                        }elseif($value['REQ_STATUS'] == "5"){
                                            echo "Completed";
                                        }                                    
                                    ?>
                                </h2>
                                <span class="grid-title order_num"><?php echo $value['REQ_STATUS_DATE_UPDATE']; //July 20th 1:30pm?></span>
                                <span class="grid-title order_num">
                                    <div class="progress progress-slim progress_">
                                        <div class="progress-bar bg-info progress-bar-striped" role="progressbar"
                                            style="width: 
                                            <?php 
                                                if($value['REQ_STATUS'] == "1"){
                                                    echo "20%";
                                                }elseif($value['REQ_STATUS'] == "2"){
                                                    echo "40%";
                                                }elseif($value['REQ_STATUS'] == "3"){
                                                    echo "60%";
                                                }elseif($value['REQ_STATUS'] == "4"){
                                                    echo "80%";
                                                }elseif($value['REQ_STATUS'] == "5"){
                                                    echo "100%";
                                                }                                    
                                            ?>
                                            " aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-2">
                                <h2 class="grid-title order_status"> <i
                                        class="mdi mdi-arrow-up-bold-hexagon-outline gold_color"></i> <?php echo $value['REQ_LOCATION']; //Accra, Ghana ?> </h2>
                                <span class="grid-title order_num_left"><?php echo $items[0]->truck_quantity.' '.$items[0]->truck_name.'[s]'; //July 20th?></span> <br>
                                <span class="grid-title order_num_left">Inspection: <?php echo $value['REQ_INSPECTION_DATE'].' '.$value['REQ_INSPECTION_TIME']; //1:30pm?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_CAR']; //1:30pm?></span>
                            </div>
                            <div class="col-lg-2">
                                <h2 class="grid-title order_status">GHS <?php echo $value['REQ_TOTAL_AMOUNT']; //Kumasi, Ghana?> 
                                </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_START_DATE']; //July 20th?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_START_TIME']; //1:30pm?></span>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DURATION_NUMBER'].' '.$value['REQ_DURATION_TYPE'].'[s]'; //1:30pm?></span>
                            </div>
                            <div class="col-lg-2">
                                <?php 
                                    if($value['REQ_STATUS'] != "1"){
                                ?>
                                
                                <h2 class="grid-title order_status"> 
                                    <i class="mdi mdi-steering dest_color"></i> 
                                    <?php echo $value['REQ_DRIVER_NAME']; //Driver Name?> 
                                </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_PHONE']; //Phone?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_CARNUMBER']; //Phone?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_ARTISAN_COMP_NAME']; //Company?></span>
                                <?php
                                    } 
                                ?>
                                
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="view_btn float_right" onclick="$('#pg').val('appshipments');$('#view').val('details_construction');$('#class_call').val('details');$('#keys').val('<?php echo $data; ?>');document.myform.submit();"> Details <i class="mdi mdi-arrow-right dest_color"></i> </button>
                            </div>
                        </div>
                            
                        <div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>

                <div class="sem_heading">
                    <button type="submit" class="view_btn" onclick="$('#pg').val('appshipments');$('#view').val('lists_inprocess');$('#class_call').val('lists_inprocess');document.myform.submit();">View All <i class="mdi mdi-arrow-right dest_color"></i> </button>
                </div>



                <!-- ///// Completed Requests ///////// -->

                <span class="light_heading">Completed Requests</span>

                <?php
                    foreach($result['request_completed'] as $keyd => $value){ 
                ?>

                <div class="grid">
                    <div class="grid-body">
                    <div class="row">
                            <div class="col-lg-10">
                                <span class="grid-title order_num_main"><?php echo $value['REQ_CODE']; //AC31427?> </span>
                            </div>
                            <div class="col-lg-2">
                                <?php 
									$arr_inner = array("0", $engine->getDataEncrypt($value));
									$implode_data_cancel = implode("@@",$arr_inner);
									
									if($value['REQ_STATUS'] == "0"){		
								?>
									<span class="grid-title order_num_main" style="color: #f00;"> <b class="org_color">Status:</b> <i class="mdi mdi-close-octagon"></i> Request Cancelled</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "1"){
								?>
                                    <span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-adjust"></i> Waiting Driver</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "2"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-truck-delivery"></i> Driver Assigned</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "3"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-road-variant"></i> In Transit</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "4"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-home-map-marker"></i> At Destination</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "5"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-bookmark-check"></i> Completed</span>
								<?php 
									}
								?>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="grid-title order_status">
                                    <?php 
                                        if($value['REQ_STATUS'] == "1"){
                                            echo "Waiting Driver";
                                        }elseif($value['REQ_STATUS'] == "2"){
                                            echo "Driver Assigned";
                                        }elseif($value['REQ_STATUS'] == "3"){
                                            echo "In Transit";
                                        }elseif($value['REQ_STATUS'] == "4"){
                                            echo "At Destination";
                                        }elseif($value['REQ_STATUS'] == "5"){
                                            echo "Completed";
                                        }                                    
                                    ?>
                                </h2>
                                <span class="grid-title order_num"><?php echo $value['REQ_STATUS_DATE_UPDATE']; //July 20th 1:30pm?></span>
                                <span class="grid-title order_num">
                                    <div class="progress progress-slim progress_">
                                        <div class="progress-bar bg-info progress-bar-striped" role="progressbar"
                                            style="width: 
                                            <?php 
                                                if($value['REQ_STATUS'] == "1"){
                                                    echo "20%";
                                                }elseif($value['REQ_STATUS'] == "2"){
                                                    echo "40%";
                                                }elseif($value['REQ_STATUS'] == "3"){
                                                    echo "60%";
                                                }elseif($value['REQ_STATUS'] == "4"){
                                                    echo "80%";
                                                }elseif($value['REQ_STATUS'] == "5"){
                                                    echo "100%";
                                                }                                    
                                            ?>
                                            " aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-2">
                                <h2 class="grid-title order_status"> <i
                                        class="mdi mdi-arrow-up-bold-hexagon-outline gold_color"></i> <?php echo $value['REQ_LOCATION']; //Accra, Ghana ?> </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_TOTAL_ITEMS']; //July 20th?> Items</span> <br>
                                <span class="grid-title order_num_left">GHC <?php echo $value['REQ_TOTAL_AMOUNT']; //1:30pm?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_CAR']; //1:30pm?></span>
                            </div>
                            <div class="col-lg-2">
                                <h2 class="grid-title order_status"> <i
                                        class="mdi mdi-arrow-down-bold-hexagon-outline green_color"></i> <?php echo $value['REQ_LOCATION_FROM']; //Kumasi, Ghana?> 
                                </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_PICKUP_DATE']; //July 20th?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_PICKUP_TIME']; //1:30pm?></span>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_ARTISAN_COMP_PHONE']; //1:30pm?></span>
                            </div>
                            <div class="col-lg-2">
                                <?php 
                                    if($value['REQ_STATUS'] != "1"){
                                ?>
                                
                                <h2 class="grid-title order_status"> 
                                    <i class="mdi mdi-steering dest_color"></i> 
                                    <?php echo $value['REQ_DRIVER_NAME']; //Driver Name?> 
                                </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_PHONE']; //Phone?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_CARNUMBER']; //Phone?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_ARTISAN_COMP_NAME']; //Company?></span>
                                <?php
                                    } 
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>

                <div class="sem_heading">
                    <button type="submit" class="view_btn" onclick="$('#pg').val('appshipments');$('#view').val('lists_completed');$('#class_call').val('lists_completed');document.myform.submit();">View All <i class="mdi mdi-arrow-right dest_color"></i> </button>
                </div>


                <div class="col-lg-12">
                <span class="light_heading">Cancelled</span>

                <?php
                    foreach($result['request_cancelled'] as $keyd => $value){ 
                        $data = $engine->getDataEncrypt($value);
                ?>

                <div class="grid">
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <span class="grid-title order_num_main"><?php echo $value['REQ_CODE']; //AC31427?> </span>
                            </div>
                            <div class="col-lg-2">
                                <?php 
									$arr_inner = array("0", $engine->getDataEncrypt($value));
									$implode_data_cancel = implode("@@",$arr_inner);
									
									if($value['REQ_STATUS'] == "0"){		
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"> <b class="org_color">Status:</b> <i class="mdi mdi-close-octagon"></i> Request Cancelled</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "1"){
								?>
                                    <span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-adjust"></i> Waiting Driver</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "2"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-truck-delivery"></i> Driver Assigned</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "3"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-road-variant"></i> In Transit</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "4"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-home-map-marker"></i> At Destination</span>
								<?php 
									}elseif($value['REQ_STATUS'] == "5"){
								?>
									<span class="grid-title order_num_main" style="color: #696ffb;"><b class="org_color">Status:</b> <i class="mdi mdi-bookmark-check"></i> Completed</span>
								<?php 
									}
								?>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="grid-title order_status">
                                    <?php 
                                        if($value['REQ_STATUS'] == "1"){
                                            echo "Waiting Driver";
                                        }elseif($value['REQ_STATUS'] == "2"){
                                            echo "Driver Assigned";
                                        }elseif($value['REQ_STATUS'] == "3"){
                                            echo "In Transit";
                                        }elseif($value['REQ_STATUS'] == "4"){
                                            echo "At Destination";
                                        }elseif($value['REQ_STATUS'] == "5"){
                                            echo "Completed";
                                        }                                    
                                    ?>
                                </h2>
                                <span class="grid-title order_num"><?php echo $value['REQ_STATUS_DATE_UPDATE']; //July 20th 1:30pm?></span>
                                <span class="grid-title order_num">
                                    <div class="progress progress-slim progress_">
                                        <div class="progress-bar bg-info progress-bar-striped" role="progressbar"
                                            style="width: 
                                            <?php 
                                                if($value['REQ_STATUS'] == "1"){
                                                    echo "20%";
                                                }elseif($value['REQ_STATUS'] == "2"){
                                                    echo "40%";
                                                }elseif($value['REQ_STATUS'] == "3"){
                                                    echo "60%";
                                                }elseif($value['REQ_STATUS'] == "4"){
                                                    echo "80%";
                                                }elseif($value['REQ_STATUS'] == "5"){
                                                    echo "100%";
                                                }                                    
                                            ?>
                                            " aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-2">
                                <h2 class="grid-title order_status"> <i
                                        class="mdi mdi-arrow-up-bold-hexagon-outline gold_color"></i> <?php echo $value['REQ_LOCATION']; //Accra, Ghana ?> </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_TOTAL_ITEMS']; //July 20th?> Items</span> <br>
                                <span class="grid-title order_num_left">GHC <?php echo $value['REQ_TOTAL_AMOUNT']; //1:30pm?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_CAR']; //1:30pm?></span>
                            </div>
                            <div class="col-lg-2">
                                <h2 class="grid-title order_status"> <i
                                        class="mdi mdi-arrow-down-bold-hexagon-outline green_color"></i> <?php echo $value['REQ_LOCATION_FROM']; //Kumasi, Ghana?> 
                                </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_PICKUP_DATE']; //July 20th?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_PICKUP_TIME']; //1:30pm?></span>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_ARTISAN_COMP_PHONE']; //1:30pm?></span>
                            </div>
                            <div class="col-lg-2">
                                <?php 
                                    if($value['REQ_STATUS'] != "1"){
                                ?>
                                
                                <h2 class="grid-title order_status"> 
                                    <i class="mdi mdi-steering dest_color"></i> 
                                    <?php echo $value['REQ_DRIVER_NAME']; //Driver Name?> 
                                </h2>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_PHONE']; //Phone?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_DRIVER_CARNUMBER']; //Phone?></span> <br>
                                <span class="grid-title order_num_left"><?php echo $value['REQ_ARTISAN_COMP_NAME']; //Company?></span>
                                <?php
                                    } 
                                ?>
                                
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="view_btn float_right" onclick="$('#pg').val('appshipments');$('#view').val('details');$('#class_call').val('details');$('#keys').val('<?php echo $data; ?>');document.myform.submit();"> Details <i class="mdi mdi-arrow-right dest_color"></i> </button>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <?php
                    }
                ?>

                <div class="sem_heading">
                    <button type="submit" class="view_btn" onclick="$('#pg').val('appshipments');$('#view').val('lists_cancelled');$('#class_call').val('lists_cancelled');document.myform.submit();">View All <i class="mdi mdi-arrow-right dest_color"></i> </button>
                </div>
                
                </div>

            </div>
        </div>
    </div>

</div><!-- content viewport ends -->