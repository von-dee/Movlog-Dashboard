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

	.act_btn{
		float: right;
	}

</style>


<?php 

	$comp_trucks = $result['comp_truck'];
	$comp_drivers = $result['drivers'];
	$result = $result['data'];

	$requestor_details = $engine->getUsersDetails($result['REQ_REQUESTOR_CODE']);

	$arr_inner = array("2", $engine->getDataEncrypt($result));
	$implode_data_cancel = implode("@@",$arr_inner);

	$arr_intransit = array("3", $engine->getDataEncrypt($result));
	$implode_data_intransit = implode("@@",$arr_intransit);

	$arr_atdestination = array("4", $engine->getDataEncrypt($result));
	$implode_data_atdestination = implode("@@",$arr_atdestination);

	$arr_completed = array("5", $engine->getDataEncrypt($result));
	$implode_data_completed = implode("@@",$arr_completed);


?>

<input type="hidden" name="requesttype" value="1">

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
							<div class="col-lg-6">
								<h5 class="det_title">Order Details</h5>
							</div>
							<div class="col-lg-3">
								<?php 
									if($result['REQ_STATUS'] == "0"){
								?>
									<span> <b class="org_color">Status:</b> <i class="mdi mdi-close-octagon"></i> Request Cancelled</span>
								<?php 
									}elseif($result['REQ_STATUS'] == "1"){
								?>
									<span><b class="org_color">Status:</b> <i class="mdi mdi-truck-delivery"></i> Waiting Driver</span>
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
									<span><b class="org_color">Status:</b> <i class="mdi mdi-bookmark-check"></i> Completed</span>
								<?php 
									}
								?>
							</div>
							<div class="col-lg-3">
								<?php 
									if($result['REQ_STATUS'] == "0"){
								?>
									<span> <b class="org_color">Status:</b> <i class="mdi mdi-close-octagon"></i> Request Cancelled</span>
								<?php 
									}elseif($result['REQ_STATUS'] == "1"){
								?>
									<button type="button" class="btn btn-rounded social-btn-outlined btn-twitter act_btn" data-toggle="modal" data-target="#exampleModal"><i class="mdi mdi-steering"></i> Accept Request</button>
								<?php 
									}elseif($result['REQ_STATUS'] == "2"){
								?>
									<button type="button" class="btn btn-rounded social-btn-outlined btn-github act_btn" onclick="intransit('<?php echo $implode_data_intransit; ?>')"><i class="mdi mdi-steering"></i> In Transit </button>
								<?php 
									}elseif($result['REQ_STATUS'] == "3"){
								?>
									<button type="button" class="btn btn-rounded social-btn-outlined btn-google act_btn" onclick="atdestination('<?php echo $implode_data_atdestination; ?>')"><i class="mdi mdi-steering"></i> At Destination </button>
								<?php 
									}elseif($result['REQ_STATUS'] == "4"){
								?>
									<button type="button" class="btn btn-rounded social-btn-outlined btn-behance act_btn" onclick="completed('<?php echo $implode_data_completed; ?>')"><i class="mdi mdi-steering"></i> Completed </button>
								<?php 
									}elseif($result['REQ_STATUS'] == "5"){
								?>
									
								<?php 
									}
								?>
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
										<span class="shipper_note"><?php echo "Not Set"; ?> </span>
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
														<td>
															<?php 
																if(!empty($value->serv_name)){
																	echo $value->serv_name;
																}elseif(!empty($value->name)){
																	echo $value->name;
																}
															?>
														</td>
														<td>
															<?php 
																if(!empty($value->serv_quantity)){
																	echo $value->serv_quantity;
																}elseif(!empty($value->quantity)){
																	echo $value->quantity;
																}
															?>
															</td>
														<td>
															<?php
															 	if(!empty($value->serv_lenght) && !empty($value->serv_breadth) && !empty($value->serv_height)){
																	echo $value->serv_lenght.'x'.$value->serv_breadth.'x'.$value->serv_height;
																}elseif(!empty($value->length) || !empty($value->breadth) || !empty($value->height)){
																	echo $value->length.'x'.$value->breadth.'x'.$value->height;
																}		
															?>
														</td>
														<td>
															<?php
															 	if(!empty($value->serv_weight)){
																	echo $value->serv_weight;
																}elseif(!empty($value->weight)){
																	echo $value->weight;
																}
															?>
														</td>
														<td>
															<?php 
																if(!empty($value->serv_note)){
																	echo $value->serv_note;
																}elseif(!empty($value->description)){
																	echo $value->description;
																}
															?>
														</td>
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
								<h6 class="det_title">Client's Details</h6>
								<div class="row note_marg_top">
									<div class="col-lg-6">
										<span>Name<span> <br>
												<span class="shipper_note"> <?php echo $result['REQ_REQUESTER_NAME']; ?> </span>
									</div>
									<div class="col-lg-6">
										<span>Phone</span> <br>
										<span class="shipper_note"> +<?php echo $requestor_details['USR_PHONE'] ?> </span>
									</div>
								</div>

								<div class="row note_marg_top">
									<div class="col-lg-6">
										<span>Company Name<span> <br>
												<span class="shipper_note"> <?php if(!empty($requestor_details['USR_COMPANY'])){ echo $requestor_details['USR_COMPANY']; } ?> </span>
									</div>
									<div class="col-lg-6">
										<span>Company Number</span> <br>
										<span class="shipper_note"> <?php echo ""; ?>  </span>
									</div>
								</div>

							</div>

							<div class="col-lg-1"></div>
							
							<div class="col-lg-6">
								<h6 class="det_title">Driver's Details</h6>

								<?php 
									if( empty($result['URQ_DRIVERNAME']) && empty($result['URQ_TRUCKTYPENAME']) && empty($result['URQ_DRIVERPHONE']) && empty($result['URQ_TRUCKCARNUMBER']) && empty($result['URQ_DRIVER_COMP_NAME']) && empty($result['URQ_DRIVER_COMP_PHONE'])){
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
														<span class="shipper_note"> <?php echo $result['URQ_DRIVERNAME']; ?> </span>
											</div>
											<div class="col-lg-6">
												<span>Phone</span> <br>
												<span class="shipper_note"> <?php echo $result['URQ_DRIVERPHONE']; ?> </span>
											</div>
										</div>

										<div class="row note_marg_top">
											<div class="col-lg-6">
												<span>Truck<span> <br>
														<span class="shipper_note"> <?php echo $result['URQ_TRUCKTYPENAME']; ?>  </span>
											</div>
											<div class="col-lg-6">
												<span>Car Number</span> <br>
												<span class="shipper_note"> <?php echo $result['URQ_TRUCKCARNUMBER']; ?>  </span>
											</div>
										</div>

										<div class="row note_marg_top">
											<div class="col-lg-6">
												<span>Company Name<span> <br>
														<span class="shipper_note"> <?php echo $result['URQ_DRIVER_COMP_NAME']; ?> </span>
											</div>
											<div class="col-lg-6">
												<span>Company Number</span> <br>
												<span class="shipper_note"> <?php echo $result['URQ_DRIVER_COMP_PHONE']; ?>  </span>
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





<!-- //////////////////////////////////////////////// MODALS ////////////////////////////////////////////////////////////// -->

<!-- Accept Request Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Select Driver and Truck [:Accept Request]</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div>
				<p class="shipper_note_bold"> Select the Driver and Truck you are selecting for the trip. </p>
			</div>
			<div>
				<div class="form-group row ">
					<div class="col-md-2 "><label
							for="fleet_drivername"><i class="mdi mdi-steering"></i> Driver:</label></div>
					<div class="col-md-10 showcase_content_area">
						<select class="custom-select" id="fleet_drivername" name="driverdetails">
							<option selected="selected" value="">Select Driver</option>
							
							<?php
								foreach($comp_drivers as $keyd => $driver_value){ 
									$driver_arr = array($driver_value['DRV_CODE'],$driver_value['DRV_FIRSTNAME'].' '.$driver_value['DRV_LASTNAME'],$driver_value['DRV_PHONE']);
							?>  
								<option value="<?php echo implode("@@",$driver_arr); ?>"><?php echo $driver_value['DRV_FIRSTNAME'].' '.$driver_value['DRV_LASTNAME']; ?></option>
							<?php 
								}                                  
							?>

						</select>
					</div>
				</div>
			</div>
			<div>
				<div class="form-group row ">
					<div class="col-md-2 "><label
							for="driver_truck"><i class="mdi mdi-truck"></i> Truck&nbsp;:</label></div>
					<div class="col-md-10 showcase_content_area">
						<select class="custom-select" id="driver_truck" name="truckdetails">
							<option selected="selected">Select Truck from your list of Trucks</option>
							
							<?php
								foreach($comp_trucks as $keyd => $truck_value){ 
									$truck_arr = array($truck_value['FLEET_CODE'],$truck_value['FLEET_NAME'],$truck_value['FLEET_CARNUM'],$truck_value['FLEET_TYPE_CODE'],$truck_value['FLEET_TYPE_NAME'],$truck_value['FLEET_TYPE_URL']);
							?>  
								<option value="<?php echo implode("@@",$truck_arr); ?>"><?php echo $truck_value['FLEET_NAME']; ?> - <?php echo $truck_value['FLEET_TYPE_NAME']; ?></option>
							<?php 
								}                                  
							?>

						</select>
					</div>
				</div>
			</div>
			<div>
				<div class="form-group row ">
					<div class="col-md-2 "><label
							for="driver_truck"><i class="mdi mdi-note-text"></i> Note&nbsp;:</label></div>
					<div class="col-md-10 showcase_content_area">
						<textarea name="drivernote" id="drivernote" placeholder="Enter note here" cols="62" rows="4" style="background: #f8f9fb; border: none; border-radius: 5px; padding: 0.5em 1em;"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary" onclick="$('#pg').val('appshipments');$('#view').val('details');$('#class_call').val('status_update');$('#keys').val('<?php echo $implode_data_cancel; ?>');document.myform.submit();">Accept Request</button>
		</div>
		</div>
	</div>
</div>