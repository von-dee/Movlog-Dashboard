

<?php
	$rs= $result->paginate(); 
   	include(SYS_PLUGINS.DS.'phpqrcode/qrlib.php'); 
 ?>

 <div class="page-sample">
     <div class="row">
         <div class="col-sm-5">
             <div class="page-title"><a href="index.php?vw=dashboard" id="backbtn">
                     <i class="fa fa-arrow-circle-left"></i></a> Thrid Party Deductions</div>
         </div>
     </div>
     <div class="row">
         <div class="col-sm-12 border_top" border-top>
             <div class="row">
                 <div class="col-sm-3">
                     <div class="form-group">
                         <div>
                             <?php echo $result->renderFirst('<span class="fa fa-angle-double-left"></span>');?>
                             <?php echo $result->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>');?>
                             <input name="page" size="1" type="text" class="pagedisplay short"
                                 value="<?php echo $result->renderNavNum();?>" readonly />
                             <?php echo $result->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?>
                             <?php echo $result->renderLast('<span class="fa fa-angle-double-right"></span>');?>
                             <?php $result->limitList($class_int->limit,"myform");?>
                         </div>

                     </div>
                 </div>

                 <div class="col-sm-3">
                     <div class="form-group">
                         <div id="pager">
                             <div style="font-size:12px; line-height:2.8em; width: 200px; overflow: hidden;">
                                 <?php echo $result->renderNavNum();?>of <?php echo $result->max_pages; ?> pages
                                 <span class="separator">|</span>
                                 Total <?php  echo $result->total_rows; ?> records
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="input-group col-sm-3">
                     <select class="custom-select input_month search_select" id="usedstatus" name="usedstatus">
                         <option value="">Select Status</option>
                         <option value="1" <?php echo  $class_int->usedstatus == '1' ? 'selected' : ''; ?>>Active
                         </option>
                         <option value="2" <?php echo  $class_int->usedstatus == '2' ? 'selected' : ''; ?>>Inactive</option>
                     </select>
                     <button type="button" onclick="$('#class_call').val('lists');document.myform.submit();"
                         class="btn btn-primary search_btn"><span class="fa fa-search search_icon"></span></button>
                 </div>
                 <div class="col-sm-3">
                     <!-- <input name="activityping" type="hidden" value="ok" /> 
                     <button type="button" onclick="confirm();" class="btn btn-success ">New Mandate
                         Number</button> -->
                 </div>
             </div>
             <div class="table-responsive">
                 <table class="table table-bordered table-striped">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Company Name</th>
                             <th>Element Name</th>
                             <th>First Deduction Date</th>
                             <th>Status</th>
							 <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>


                         <?php 
							$num = 1;
							if($result->total_rows > 0 ){
									
									$page = (empty($page))? 1:$page;
									$num = (isset($page))? ($class_int->limit*($page-1))+1:1;
									foreach ($rs as $key => $obj){

                                    $vt = implode(",, ", (array)$obj);
									
				  		?>
                         <tr>
                             <td><?php echo $num++; ?></td>
                             <td> <?php echo $obj->DEDUCTION_COMP_NAME; ?> </td>
                             <td> <?php echo $obj->DEDUCTION_ELEMENT_NAME; ?>
                             </td>
                             <td> <?php echo $obj->DEDUCTION_FIRST_DEDUCT_DATE;  ?>
                             </td>
                             <td> 
							 	<span class="badge badge-<?php echo ($obj->DEDUCTION_STATUS == NULL) ? 'success' : 'danger'  ; ?>">
									<?php echo ($obj->DEDUCTION_STATUS == "1")   ? 'Active' : 'Not Active'  ; ?>
								</span>
                             </td>
                             <td>
                                 <div class="form-button-action">
                                     <button type="button" class="btn details_btn"										 
                                         onclick="document.getElementById('class_call').value='details';document.getElementById('view').value='details';document.getElementById('keys').value='<?php echo $vt; ?>' ;document.myform.submit();" >
                                         
                                         Details
                                     </button>
                                 </div>
                             </td>
                         </tr>
             </div>
         </div>
         </div>
				<?php 
				 	}  
	
				 }else{ 
				?>
         <tr>
             <td>
                 No Record !
             </td>
         </tr>
         <?php	 } ?>
         </tbody>
         </table>
     </div>
 </div>
 </div>