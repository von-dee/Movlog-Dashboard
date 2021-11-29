<style>
	.shipper_note_bold {
		text-transform: uppercase;
		font-size: 0.8em;
		color: #9e9e9e;
	}


	.shipper_note {
		font-size: 0.8em;
		color: #9e9e9e;
	}

	.det_title {
		margin-bottom: 0.5em;
		color: #2b2b2b;
	}

	.det_container {
		margin-top: 3em;
	}

	.note_marg_top {
		margin-top: 0.5em !important;
	}

	h6{
		font-size: 1.2em;
	}

	.wait_text{
		color: #cb9751;
	}

	.org_color{
		color: #e8755b;
	}

	.back_btn_ {
        float: right;
        background: transparent;
        border: 1.5px solid #ed9d98;
        color: #ed9d98;
        padding: 0.1em 1.2em;
        border-radius: 5px;
    }
</style>

<?php 

	// var_dump($result); 
	
	// var_dump($result['REQ_ITEMS']); 

	// var_dump(json_decode($result['REQ_ITEMS']));
	// die(); 
?>

<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
				<li class="breacrumb_"><a href="#" class="grey_color">Requests</a></li>
				<li class="breacrumb_"><a href="#"><i class="mdi mdi-hand-pointing-right link-icon grey_color"></i></a>
				</li>
				<li class="breacrumb_"><a href="#" class="grey_color">Details</a></li>
			</ol>
		</nav>
	</div>

	<div class="content-viewport">
		<div class="row">
			<div class="col-lg-12">
				<div class="grid">
					<div class="grid-body">
						<div class="row">
							<div class="col-lg-2">
								<h5 class="det_title">Order Details</h5>
							</div>
							<div class="col-lg-6">
							</div>
							<div class="col-lg-3">
								<?php 
									$arr_inner = array("0", $engine->getDataEncrypt($result));
									$implode_data_cancel = implode("@@",$arr_inner);
									
									if($result['REQ_STATUS'] == "0"){		
								?>
									<span style="color: #f00;"> <b class="org_color">Status:</b> <i class="mdi mdi-close-octagon"></i> Request Cancelled</span>
								<?php 
									}elseif($result['REQ_STATUS'] == "1"){
								?>
									<button class="btn btn-rounded social-btn-outlined btn-dribbble"  onclick="$('#pg').val('appshipments');$('#view').val('details');$('#class_call').val('status_update');$('#keys').val('<?php echo $implode_data_cancel; ?>');document.myform.submit();"><i class="mdi mdi-close-octagon"></i> Cancel Request</button>
								<?php 
									}elseif($result['REQ_STATUS'] == "2"){
								?>
									<span><b class="org_color">Status:</b> <i class="mdi mdi-truck-delivery"></i> Driver Assigned</span>
								<?php 
									}elseif($result['REQ_STATUS'] == "3"){
								?>
									<span><b class="org_color">Status:</b> <i class="mdi mdi-road-variant"></i> In Transit</span>
								<?php 
									}elseif($result['REQ_STATUS'] == "4"){
								?>
									<span><b class="org_color">Status:</b> <i class="mdi mdi-home-map-marker"></i> At Destination</span>
								<?php 
									}elseif($result['REQ_STATUS'] == "5"){
								?>
									<button class="btn btn-rounded social-btn-outlined btn-twitter"  onclick="$('#pg').val('appshipments');$('#view').val('details');$('#class_call').val('status_update');$('#keys').val('<?php echo $implode_data_cancel; ?>');document.myform.submit();"><i class="mdi mdi-bookmark-check"></i> Completed </button>
									<!-- <span><b class="org_color">Status:</b> <i class="mdi mdi-bookmark-check"></i> Completed</span> -->
								<?php 
									}
								?>
							</div>

							<div class="col-lg-1">
								<button class="back_btn_" onclick="$('#pg').val('appshipments');$('#view').val('lists');$('#class_call').val('');document.myform.submit();"> Back</button>
							</div>
							
                    
						</div>

						<div class="row det_container">
							<div class="col-lg-5">
								<h6 class="det_title">Shipper Note</h6>
								<p class="shipper_note_bold"> Make sure all your details are correct please do well to
									contact the driver when the request is accepted. </p>
							</div>
							<div class="col-lg-1"></div>
							<div class="col-lg-5">
								<h6 class="det_title">Order Reference</h6>
								<div class="row">
									<div class="col-lg-6">
										<span>Purchase Order #</span> <br>
										<span class="shipper_note"><?php echo $result['REQ_CODE']; ?> </span>
									</div>
									<div class="col-lg-6">
										<span>Pick Up #</span> <br>
										<span class="shipper_note"><?php echo $result['REQ0000000001']; ?> </span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<span>Pickup Locaton (From)</span> <br>
										<span class="shipper_note"><?php echo $result['REQ_LOCATION_FROM']; ?>  </span>
									</div>
									<div class="col-lg-6">
										<span>Destination (To)</span> <br>
										<span class="shipper_note"><?php echo $result['REQ_LOCATION']; ?> </span>
									</div>
								</div>
							</div>
						</div>

						<div class="row det_container">
							<div class="col-lg-5">
								<h6 class="det_title">Commodity</h6>
								<span class="shipper_note"> These are the list of items you are moving.</span>
								<div class="item-wrapper">
									<div class="table-responsive">
										<table class="table info-table">
											<thead>
												<tr>
													<th>Item</th>
													<th>Qty</th>
													<th>Size</th>
													<th>weight</th>
													<th>Note</th>
												</tr>
											</thead>
											<tbody>

												<?php 
													$items = json_decode($result['REQ_ITEMS']);
													
													foreach( $items as $keyd => $value){ 
														// var_dump($value->serv_name); die();
												?>

													<tr>
														<td><?php echo $value->serv_name; ?></td>
														<td><?php echo $value->serv_quantity; ?></td>
														<td><?php echo $value->serv_lenght.' '.$value->serv_breadth.' '.$value->serv_height; ?></td>
														<td><?php echo $value->serv_weight; ?></td>
														<td><?php echo $value->serv_note; ?></td>
													</tr>

												<?php
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-1"></div>
							<div class="col-lg-5">
								<h6 class="det_title">Appointment</h6>
								<div class="row">
									<div class="col-lg-4">
										<span>Date<span> <br>
												<span class="shipper_note"> <?php echo $result['REQ_PICKUP_DATE']; ?> </span>
									</div>
									<div class="col-lg-4">
										<span>Time</span> <br>
										<span class="shipper_note"> <?php echo $result['REQ_PICKUP_TIME']; ?> </span>
									</div>
									<div class="col-lg-4">
										<span>Truck</span> <br>
										<span class="shipper_note"> <?php echo $result['REQ_TRUCK_NAME']; ?> </span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<p class="note_marg_top">
											<span>Description<span> <br>
											<span class="shipper_note"> <?php echo $result['REQ_DESCRIPTION']; ?>. 
											</span>
										</p>

									</div>
								</div>
							</div>
						</div>

						<div class="row det_container">
							<div class="col-lg-5">
								<h6 class="det_title">Contact</h6>
								<p>
									<span>Phone Number</span> <br>
									<span class="shipper_note"> <?php echo $result['REQ_DESCRIPTION']; ?> +233 2323 232 232 </span>
								</p>
							</div>

							<div class="col-lg-1"></div>
							
							<div class="col-lg-6">
								<h6 class="det_title">Driver's Details</h6>

								<?php 
									if( empty($result['REQ_DRIVER_NAME']) && empty($result['REQ_DRIVER_CAR']) && empty($result['REQ_DRIVER_PHONE']) && empty($result['REQ_DRIVER_CARNUMBER']) && empty($result['REQ_ARTISAN_COMP_NAME']) && empty($result['REQ_ARTISAN_COMP_PHONE'])){
								?>

									<div>
										<b class="wait_text">Waiting for a Driver to accept request</b>
									</div>

								<?php 
									}else{
								?>

									<div>

										<div class="row note_marg_top">
											<div class="col-lg-6">
												<span>Name<span> <br>
														<span class="shipper_note"> <?php echo $result['REQ_DRIVER_NAME']; ?> </span>
											</div>
											<div class="col-lg-6">
												<span>Phone</span> <br>
												<span class="shipper_note"> <?php echo $result['REQ_DRIVER_PHONE']; ?> </span>
											</div>
										</div>

										<div class="row note_marg_top">
											<div class="col-lg-6">
												<span>Truck<span> <br>
														<span class="shipper_note"> <?php echo $result['REQ_DRIVER_CAR']; ?>  </span>
											</div>
											<div class="col-lg-6">
												<span>Car Number</span> <br>
												<span class="shipper_note"> <?php echo $result['REQ_DRIVER_CARNUMBER']; ?>  </span>
											</div>
										</div>

										<div class="row note_marg_top">
											<div class="col-lg-6">
												<span>Company Name<span> <br>
														<span class="shipper_note"> <?php echo $result['REQ_ARTISAN_COMP_NAME']; ?> </span>
											</div>
											<div class="col-lg-6">
												<span>Company Number</span> <br>
												<span class="shipper_note"> <?php echo $result['REQ_ARTISAN_COMP_PHONE']; ?>  </span>
											</div>
										</div>
										
									</div>

								<?php 
									}
								?>
								
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>