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

    .order_num_left {
        font-size: 12px;
        font-weight: 600;
        color: #bbbac5;
        margin-left: 1.5em;
    }

    .order_status {
        margin: 5px 0px;
    }

    .progress_ {
        margin-top: 1em;
    }

    .dest_color {
        color: #696ffb;
    }

    .view_btn {
        background: white;
        border: none;
        font-size: 12px;
        width: 8em;
        padding: 6px;
        box-shadow: 0 0 10px -5px rgba(183, 192, 206, .15);
    }

    .sem_heading {
        margin-bottom: 2em;
    }

    .edit_btn{
        background: transparent;
        border: none;
    }

    .add_btn_{
        float: right;
        background: transparent;
        border: 1.5px solid #04a613;
        color: #04a613;
        padding: 0.1em 1.2em;
        border-radius: 5px;
    }
</style>



<div class="page-content-wrapper-inner">
    <div class="content-viewport">
        <div class="row">
            <div class="col-12 ">
                <h4>Your Drivers</h4>
                <p class="text-gray">Get info on your drivers and other workers. </p>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="input-group" style="margin: 2em 0em;">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" autocomplete="off"> 
                    <button class="btn btn-primary" style="background-color: #696ffb !important;border-color: #696ffb !important; width: 1em; height: 2.8em;" type="submit">
                        <i class="mdi mdi-arrow-right-thick"></i>
                    </button>
                </div>
            </div>

            <div class="col-7">
                <div class="row showcase_row_area" style="margin: 2em 0em;">
                    <div class="col-md-3 showcase_text_area">
                        <label>Sort Request By</label>
                    </div>
                    <div class="col-md-5 showcase_content_area">
                        <select class="custom-select">
                            <option selected="selected">All</option>
                            <option value="1">Request</option>
                            <option value="2">At Origin</option>
                            <option value="3">Driver Assigned</option>
                            <option value="3">Completed</option>
                        </select>
                    </div>
                    <div class="col-md-4 showcase_content_area">
                        <button class="add_btn_" onclick="$('#pg').val('appdrivers');$('#view').val('add');$('#class_call').val('add_fetch');document.myform.submit();">Add Driver <i class="mdi mdi-account-plus"></i></button>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-12">
                <span class="light_heading">Your Fleet</span>

                <div>
                    <div class="grid">
                        <!-- <p class="grid-header">Image&amp;Components Table</p> -->
                        <div class="item-wrapper">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Truck Assigned</th>
                                            <th>Car No.</th>
                                            <th>No. of Trips</th>
                                            <th>Revenue</th>
                                            <th>Last Trip</th>
                                            <th>Date Added</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        foreach($result as $keyd => $value){ 
                                    ?>

                                        <tr>
                                            <td class="d-flex align-items-center border-top-0"><img
                                                    class="profile-img img-sm img-rounded mr-2"
                                                    src="./media/img/truck.png"
                                                    alt="profile image"> <span><?php echo $value['DRV_FIRSTNAME'].' '.$value['DRV_LASTNAME']; ?></span></td>
                                            <td>
                                                <?php echo $value['DRV_ROLE']?>
                                            </td>
                                            <td><?php echo $value['DRV_PHONE']?></td>
                                            <td><?php if(!empty($value['DRV_TRUCK_NAME'])){echo $value['DRV_TRUCK_NAME'];}else{ echo "None Assigned"; } ?></td>
                                            <td><?php if(!empty($value['DRV_CARNUMBER'])){echo $value['DRV_CARNUMBER'];}else{ echo "Not Set"; } ?></td>
                                            <td><?php echo $value['DRV_NUMTRIPS']?></td>
                                            <td class="text-success"><?php echo $value['DRV_REVENUE']?> <i class="mdi mdi-arrow-up"></i>
                                            </td>
                                            <td><?php echo $value['DRV_LASTTRIPDATE']?></td>
                                            <td><?php echo $value['DRV_DATEADDED']?></td>
                                            <td>
                                                <?php if($value['DRV_STATUS'] == "1"){?>
                                                    <label class="badge badge-success">Active</label>
                                                <?php }elseif($value['DRV_STATUS'] == "0"){?>
                                                    <label class="badge badge-warning">Not Active</label>
                                                <?php }?>
                                            </td>
                                            <td class="actions"><button class="edit_btn" onclick="$('#pg').val('appdrivers');$('#view').val('edit');$('#class_call').val('details');$('#keys').val('<?php echo $value['DRV_CODE'];?>');document.myform.submit();"> <i class="mdi mdi-dots-vertical"></i> Edit </button></td>
                                        </tr>

                                        <?php 
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div><!-- content viewport ends -->