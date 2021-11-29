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

    .radio_style {
        height: 1em;
        width: 1em;
        display: inline;
    }
</style>



<div class="page-content-wrapper-inner">
    <div class="content-viewport">
        <div class="row">
            <div class="col-12 ">
                <h4>Add Drivers</h4>
                <p class="text-gray">Add a driver or a worker. </p>
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
                        <button class="back_btn_" onclick="$('#pg').val('appdrivers');$('#view').val('lists');$('#class_call').val('');document.myform.submit();"> Back</button>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-12">

            <span class="light_heading">Add Driver</span>

                <div>
                    <div class="grid">
                        <div class="item-wrapper">
                            <div class="item-wrapper">
                                <div class="row mb-3">


                                    <div class="col-md-8 mx-auto">
                                    
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-12 showcase_text_area" style="text-align: center;">
                                                <p class="text-gray" style="margin-left: -14em; margin-top: 1em;">Fill out the drivers details</p>
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_fname">First Name</label></div>
                                            <div class="col-md-9 showcase_content_area"><input type="text"
                                                    class="form-control" id="driver_fname" name="driver_fname" value=""></div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_lname">Last Name</label></div>
                                            <div class="col-md-9 showcase_content_area"><input type="text"
                                                    class="form-control" id="driver_lname" name="driver_lname" value=""></div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_phone">Phone Number</label></div>
                                            <div class="col-md-9 showcase_content_area"><input type="number"
                                                    class="form-control" id="driver_phone" name="driver_phone" value=""></div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_email">Email</label></div>
                                            <div class="col-md-9 showcase_content_area"><input type="email"
                                                    class="form-control" id="driver_email" name="driver_email" value=""></div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_role">Role</label></div>
                                            <div class="col-md-9 showcase_content_area">
                                                <select class="custom-select" id="driver_role" name="driver_role">
                                                    <option selected="selected">Select Role</option>
                                                    <option value="Driver">Driver</option>
                                                    <option value="Conductor">Conductor</option>
                                                    <option value="Driver's Aid">Driver's Aid</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_licensetype">License Type</label></div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input class="radio_style" type="radio" id="driver_licensetype" name="driver_licensetype" value="A">
                                                <label class="label_style_" for="A">A</label>
                                                <input class="radio_style" type="radio" id="driver_licensetype" name="driver_licensetype" value="B">
                                                <label class="label_style_" for="B">B</label>
                                                <input class="radio_style" type="radio" id="driver_licensetype" name="driver_licensetype" value="C">
                                                <label class="label_style_" for="C">C</label>
                                                <input class="radio_style" type="radio" id="driver_licensetype" name="driver_licensetype" value="D">
                                                <label class="label_style_" for="D">D</label>
                                                <input class="radio_style" type="radio" id="driver_licensetype" name="driver_licensetype" value="E">
                                                <label class="label_style_" for="E">E</label>
                                                <input class="radio_style" type="radio" id="driver_licensetype" name="driver_licensetype" value="F">
                                                <label class="label_style_" for="F">F</label>
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_licenseno">License Number</label></div>
                                            <div class="col-md-9 showcase_content_area"><input type="text"
                                                    class="form-control" id="driver_licenseno" name="driver_licenseno" value=""></div>
                                        </div>

                                        <!-- driver_truckcode
                                        driver_carnumber
                                        driver_trucktypecode
                                        driver_trucktypename
                                        driver_trucktypeurl -->

                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_truck">Truck</label></div>
                                            <div class="col-md-9 showcase_content_area">
                                                <select class="custom-select" id="driver_truck" name="driver_truck">
                                                    <option selected="selected">Select Truck from your list of Trucks</option>
                                                    
                                                    <?php
                                                        foreach($result as $keyd => $value){ 
                                                            $truck_arr = array($value['FLEET_CODE'],$value['FLEET_NAME'],$value['FLEET_CARNUM'],$value['FLEET_TYPE_CODE'],$value['FLEET_TYPE_NAME'],$value['FLEET_TYPE_URL']);
                                                    ?>  
                                                        <option value="<?php echo implode("@@",$truck_arr); ?>"><?php echo $value['FLEET_NAME']; ?> - <?php echo $value['FLEET_TYPE_NAME']; ?></option>
                                                    <?php 
                                                        }                                  
                                                    ?>
                                                

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"><label
                                                    for="driver_note">Note</label></div>
                                            <div class="col-md-9 showcase_content_area"><textarea class="form-control"
                                                    id="driver_note" name="driver_note" cols="12" rows="5"></textarea></div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-8 submit_container">
                                        <button type="submit" class="submit_btn" onclick="$('#pg').val('appdrivers');$('#view').val('add');$('#class_call').val('add');document.myform.submit();"> Submit </button>
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