
<div class="page-sample">
	<input id="class_call" name="class_call" value="" type="hidden" />

	<div class="row">
        <div class="col-sm-6">
            <div class="page-title"><a href="index.php?vw=oUvVL7UIDGG05UFwZN01Dw%3D%3D" id="backbtn"><i class="fa fa-arrow-circle-left"></i></a> Third Party Deduction Details</div>

        </div>
        <div class="col-sm-6">
            <div class="mb-5 pt-2">
                <input name="activityping" type="hidden" value="ok">
                <button type="button" class="btn btn-info col-sm-2 float-right" id="div_print" title="My Affordability">
                    <i class="fa fa-print fa-1x" aria-hidden="true"></i> Print</button>
            </div>
        </div>
    </div>


	<div class="table_margin" padding-top id="print_area">

		<div class="row">

			<div class="col-sm-12 col-md-12 rightside ">
				<div class="table-responsive">
					<div class="heading_">
						<h5>THIRD PARTY DEDUCTIONS REPORT</h5>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-6 rightside">
				<div class="table-responsive">
					<table class="table-block">
						<tr>
							<th>Company Name</th>
							<td class="padding-right">: &nbsp; <?php echo $result[0][2]; ?></td>
						</tr>

						<tr>
							<th>Element Name</th>
							<td class="padding-right">: &nbsp; <?php echo $result[0][9]; ?></td>
						</tr>
						
						<tr>
							<th>First Deduction Date</th>
							<td class="padding-right">: &nbsp; <?php echo $result[0][3]; ?></td>
						</tr>

					</table>
				</div>
			</div>

			<div class="col-sm-6 col-md-6 rightside">
				<div class="table-responsive ">
					<table class="table-block">
						<tr>
							<th>Print Date</th>
							<td class="padding-right">: &nbsp; <?php echo date("d/m/Y"); ?></td>
						</tr>
						<tr>
							<th>Total Monthly Deduction</th>
							<td class="padding-right">: &nbsp; 
								<?php 
									$total_deduct = 0;
									if (count($result[1]) > 0) {
										
										foreach ($result[1] as $val) {
											$total_deduct = $total_deduct + (float)$val['DEDUCT_MONTHLY_DEDUCTION'];
									
										}

										echo number_format($total_deduct, 2, '.', '');
										
									}

								?>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 bottom-block">
				<div class="table-responsive table_margin">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Payment Date</th>
								<th>Payroll Area</th>
								<th>Month</th>
								<th>Year</th>
								<th>Monthly Deduction</th>
								<th>Balance Forward</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$x = 1;
							if (count($result[1]) > 0) {
								foreach ($result[1] as $val) {

							?>

									<tr>
										<td><?php echo $x; ?></td>
										<td><?php echo $val['DEDUCT_PAYMENT_DATE']; ?></td>
										<td><?php echo $val['DEDUCT_STAGE']; ?></td>
										<td><?php echo $val['DEDUCT_MONTH']; ?></td>
										<td><?php echo $val['DEDUCT_YEAR']; ?></td>
										<td><?php echo number_format($val['DEDUCT_MONTHLY_DEDUCTION'], 2, '.', ''); ?></td>
										<td><?php echo number_format($val['DEDUCT_BALANCE_FORWARD'], 2, '.', ''); ?></td>
									</tr>
								<?php
									$x = 1 + $x;
								}
							} else { ?>
								<tr>
									<td colspan="6" align="center"><strong>No Record(s) Found!</strong></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div>
					<h5 class="total_deduction"> TOTAL MONTHLY DEDUCTION : <?php echo number_format($total_deduct, 2, '.', ''); ?></h5>
				</div>
			</div>
		
		</div>
	</div>

	<iframe id="print_out" name="print_out" frameborder="0" width="0" height="0"></iframe>


</div>