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
        margin-left: 10em;
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
                <h4>Contact Us</h4>
                <p class="text-gray">We are ready 24/7 to respond.. </p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <span class="light_heading"></span>

                <div class="grid">
                    <div class="grid-body">
                        <span class="grid-title order_num">Message </span>
                        
                        

                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="grid-title order_status">Subject</h2>
                                
                                <p>
                                    <select style="width: 15em;" id="contact_subject" name="contact_subject">
                                        <option value="">Select Subject</option>
                                        <option value="Customer Issue">Customer Issue</option>
                                        <option value="Order Issue">Order Issue</option>
                                        <option value="System Error">System Error</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </p>

                                <h2 class="grid-title order_status">Body</h2>
                                <p> <textarea id="contact_body" name="contact_body" cols="100" rows="5" placeholder="Enter Message here"></textarea> </p>

                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-lg-12 ">
                                <button type="submit" class="submit_btn"  onclick="$('#pg').val('appcontactus');$('#view').val('');$('#class_call').val('add');document.myform.submit();"> Send Message</button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>


    </div>
</div><!-- content viewport ends -->