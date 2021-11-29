<style>
    .grid_inner {
        padding: 10px 25px 10px;
    }

    .input_style {
        border: none;
        border-bottom: 1px solid #333;
        width: 25em;
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
        margin-top: 2em;
        margin-bottom: 1em;
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

    .submit_container{
        text-align: center;
    }
    
    .submit_btn{
        margin: 3em;
        margin-right: 15em;
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
                <h4>Profile</h4>
                <p class="text-gray">View and Edit Your profile Information. </p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <span class="light_heading"></span>

                <div class="grid">
                    <div class="grid-body">
                        <span class="grid-title order_num">Account</span>
                        
                        <h2 class="grid-title order_status">Bio Details</h2>

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="lab_text" for=""><i class="mdi mdi-vector-square dest_color"></i> First Name
                                </label>
                                <p><input class="input_style" id="usrfname"  name="usrfname" value="<?php echo $result["USR_FIRSTNAME"]; ?>" placeholder="First name"
                                        oninput="this.className = ''"></p>
                            </div>
                            <div class="col-lg-6">
                                <label class="lab_text" for=""><i class="mdi mdi-vector-square dest_color"></i>
                                    Last Name</label>
                                <p><input class="input_style" id="usrlname"  name="usrlname" value="<?php echo $result["USR_LASTNAME"]; ?>" placeholder="Last name"
                                        oninput="this.className = ''"></p>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="lab_text" for=""><i class="mdi mdi-gender-male-female dest_color"></i> Gender
                                </label>

                                <p>
                                    <input class="radio_style" type="radio" id="male" name="urs_gender" value="male" <?php if($result["USR_GENDER"] == "male"){ echo "checked"; }  ?> >
                                    <label class="label_style" for="male">Male</label>
                                    <input class="radio_style" type="radio" id="female" name="urs_gender" value="female" <?php if($result["USR_GENDER"] == "female"){ echo "checked"; }  ?>>
                                    <label class="label_style" for="female">Female</label>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <label class="lab_text" for=""><i class="mdi mdi-cellphone-basic dest_color"></i>
                                    Phone Number</label>
                                <p><input class="input_style" id="urs_phone"  name="urs_phone" value="<?php echo $result["USR_PHONE"]; ?>" placeholder="Last name" oninput="this.className = ''"></p>
                            </div>
                        </div>
                        
                        <br>

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="lab_text" for=""><i class="mdi mdi-email-variant dest_color"></i>
                                    Email</label>
                                <p><input class="input_style" id="urs_email"  name="urs_email" value="<?php echo $result["USR_EMAIL"]; ?>" placeholder="Last name" oninput="this.className = ''"></p>
                            </div>
                            <div class="col-lg-6">
                                <label class="lab_text" for=""><i class="mdi mdi-lan dest_color"></i> Organisation Name </label>
                                <p><input class="input_style" id="urs_orgname"  name="urs_orgname" value="<?php echo $result["USR_COMPANY"]; ?>" placeholder="Last name" oninput="this.className = ''"></p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 submit_container">
                                <button type="submit" class="submit_btn" onclick="$('#pg').val('appprofile');$('#view').val('');$('#class_call').val('add');document.myform.submit();"> Update Profile</button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>


    </div>
</div><!-- content viewport ends -->