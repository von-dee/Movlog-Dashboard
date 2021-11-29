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
</style>



<div class="page-content-wrapper-inner">
    <div class="content-viewport">
        
        <div class="row">
            <div class="col-12 ">
                <h4>Your Notifications</h4>
                <p class="text-gray">Get a list of all your notifications. </p>
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
                </div>
            </div>

        </div>

        <div class="row">

            <?php
                foreach($noti as $keyd => $value){ 
            ?>  

                <div class="col-lg-10">
                    <div class="grid">
                        <div class="grid-body">
                            <span class="grid-title order_num"><?php echo $value['NOTI_DATE']; ?></span>
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="icon-wrapper rounded-circle bg-inverse-<?php echo $value['NOTI_TYPE']; ?> text-<?php echo $value['NOTI_TYPE']; ?>" style="height: 3em;width: 3em;">
                                        <i class="<?php echo $value['NOTI_ICON']; ?>" style="padding: 0px 0px 0px 9px;height: 0em;font-size: 1.6em;"></i>
                                    </div>
                                </div>
                                <div class="col-lg-11">
                                    <div class="content-wrapper">
                                        <small class="name"><?php echo $value['NOTI_TITLE']; ?></small> 
                                        <small class="content-text"><?php echo $value['NOTI_MESSAGE']; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php 
                }                                  
            ?>

            <!-- <div class="col-lg-10">
                <div class="grid">
                    <div class="grid-body">
                        <span class="grid-title order_num">April 14 2:30pm</span>
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="icon-wrapper rounded-circle bg-inverse-success text-success" style="height: 3em;width: 3em;">
                                    <i class="mdi mdi-cloud-upload" style="padding: 0px 0px 0px 9px;height: 0em;font-size: 1.6em;"></i>
                                </div>
                            </div>
                            <div class="col-lg-11">
                                <div class="content-wrapper"><small class="name">Upload Completed</small> <small class="content-text">3 Files uploded successfully</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-10">
                <div class="grid">
                    <div class="grid-body">
                        <span class="grid-title order_num">April 15 12:30pm</span>
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="icon-wrapper rounded-circle bg-inverse-warning text-warning" style="height: 3em;width: 3em;">
                                    <i class="mdi mdi-security" style="padding: 0px 0px 0px 9px;height: 0em;font-size: 1.6em;"></i>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="content-wrapper"><small class="name">Authentication Required</small> <small class="content-text">Server storage almost full</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>

    </div>
</div><!-- content viewport ends -->