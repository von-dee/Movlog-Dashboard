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

    .edit_btn {
        background: transparent;
        border: none;
    }

    .back_btn_ {
        float: right;
        background: transparent;
        border: 1.5px solid #ed9d98;
        color: #ed9d98;
        padding: 0.1em 1.2em;
        border-radius: 5px;
    }

    
    .submit_container{
        text-align: center;
    }
    
    .submit_btn{
        margin: 3em;
        margin-left: 12em;
        background: transparent;
        padding: 0.6em 2em;
        border: 1px solid #696ffb;
        color: #696ffb;
    }
</style>



<div class="page-content-wrapper-inner">
    <div class="content-viewport">
        <div class="row">
            <div class="col-12 ">
                <h4>Edit Fleet</h4>
                <p class="text-gray">Edit Fleet to your list of fleets. </p>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                
            </div>

            <div class="col-7">
                <div class="row showcase_row_area" style="margin: 2em 0em;">
                    <div class="col-md-3 showcase_text_area">
                    </div>
                    <div class="col-md-5 showcase_content_area">
                    </div>
                    <div class="col-md-4 showcase_content_area">
                        <button class="back_btn_" onclick="$('#pg').val('appfleetmanagement');$('#view').val('lists');$('#class_call').val('');document.myform.submit();"> Back</button>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-12">

            <span class="light_heading">Edit Fleet</span>

                <div>
                    <div class="grid">
                        <div class="item-wrapper">
                            <div class="item-wrapper">
                                <div class="row mb-3">

                                    <div class="col-md-8 mx-auto">
                                    
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-12 showcase_text_area" style="text-align: center;">
                                                <p class="text-gray" style="margin-left: -14em; margin-top: 1em;">Fill out the vehicle's details</p>
                                            </div>
                                        </div>

                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="fleet_drivername">Truck Type</label></div>
                                            <div class="col-md-9 showcase_content_area">
                                                <select class="custom-select" id="fleet_drivername" name="fleet_drivername">
                                                    <option selected="selected">Select Truck</option>
                                                    <option value="Driver">Prick up</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="fleet_carnumber">Car Number</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input type="text" class="form-control" id="fleet_carnumber" name="fleet_carnumber" value="<?php echo $result['FLEET_CARNUM']; ?>">
                                            </div>
                                        </div>

                                        <!--  fleet_drivercode -->


                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="fleet_name">Tracker Code</label></div>
                                            <div class="col-md-9 showcase_content_area"><input type="text"
                                                    class="form-control" id="fleet_name" name="fleet_name" value="<?php echo $result['FLEET_NAME']; ?>"></div>
                                        </div>
                                        <!-- 
                                            fleet_typecode
                                            fleet_typename
                                            fleet_typeurl
                                        -->

                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="fleet_drivername">Driver</label></div>
                                            <div class="col-md-9 showcase_content_area">
                                                <select class="custom-select" id="fleet_drivername" name="fleet_drivername">
                                                    <option selected="selected">Select Driver</option>
                                                    <option value="Driver">Driver</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-8 submit_container">
                                        <button type="submit" class="submit_btn" onclick="$('#pg').val('appfleetmanagement');$('#view').val('');$('#class_call').val('');document.myform.submit();"> Submit </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div><!-- content viewport ends -->