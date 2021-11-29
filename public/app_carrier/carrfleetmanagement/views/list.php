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
                <h4>Your Fleet</h4>
                <p class="text-gray">Manage your fleets and other assets here. </p>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="input-group" style="margin: 2em 0em;">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search"
                        autocomplete="off">
                    <button class="btn btn-primary"
                        style="background-color: #696ffb !important;border-color: #696ffb !important; width: 1em; height: 2.8em;"
                        type="submit">
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
                        <button class="add_btn_"  onclick="$('#pg').val('appfleetmanagement');$('#view').val('add');$('#class_call').val('add_fetch');document.myform.submit();" >Add Fleet <i class="mdi mdi-truck-delivery"></i></button>
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
                                            <th>Type</th>
                                            <th>Car Number</th>
                                            <th>Driver</th>
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
                                                        alt="profile image"> <span><?php echo $value['FLEET_NAME']?></span></td>
                                                <td>
                                                    <?php echo $value['FLEET_TYPE_NAME']?>
                                                </td>
                                                <td><?php echo $value['FLEET_CARNUM']?></td>
                                                <td><?php echo $value['FLEET_DRIVER_NAME']?></td>
                                                <td><?php echo $value['FLEET_DATEADDED']?></td>
                                                
                                                <td>
                                                    <?php if($value['FLEET_STATUS'] == "1"){?>
                                                        <label class="badge badge-success">Active</label>
                                                    <?php }elseif($value['FLEET_STATUS'] == "0"){?>
                                                        <label class="badge badge-warning">Not Active</label>
                                                    <?php }?>
                                                </td>

                                                <td class="actions"><button class="edit_btn"  onclick="$('#pg').val('appfleetmanagement');$('#view').val('edit');$('#class_call').val('details');$('#keys').val('<?php echo $value['FLEET_CODE'];?>');document.myform.submit();"> <i class="mdi mdi-dots-vertical"></i> Edit </button></td>
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