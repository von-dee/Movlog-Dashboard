<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 100;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        margin-top: 10em;
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


    .icon_car {
        height: 3em;
        margin-right: 2em;
    }

    .text_car {
        font-size: 1.2em;
        margin-left: 1.1em;
    }

    .list_item {
        border-bottom: 1.5px solid #eaeaea;
    }

    .radio_style {
        height: 1em;
        width: 1em;
        display: inline;
    }



    ///?///////////////// tabs //////////////////
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        display: none;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /* border: 1px solid #ccc; */
        border-top: none;
    }

    .back_btn {
        background: transparent;
        border: none;
        color: red;
        border: 1px solid red;
        padding: 0em 1em;
        border-radius: 3px;
    }

    .width_input {
        border: none;
        border-bottom: 3px solid #ebebeb;
        width: 10em;
    }

    .text_area {
        height: 100px;
        width: 30em;
        border: none;
        border-bottom: 1px solid #333;
    }

    .cont_container {
        text-align: center;
    }

    .cont_text {
        font-size: 1em;
        background: transparent;
        border: 1px solid #333;
        margin-top: 1em;
        padding: 0.5em 2em;
    }


    .sum_text {
        font-weight: 600;
    }








    /* //////////////////////////// CUSTOM ////////////////////////////////// */

    /* Style the form */
    #regForm {
        background-color: #ffffff;
        /* margin: 100px auto; */
        padding: 10px;
        width: 70%;
        min-width: 300px;
    }

    /* Style the input fields */
    input {
        padding: 10px;
        padding-top: 0;
        width: 100%;
        font-size: 15px;
        border: 1px solid #aaaaaa;
        border: none;
        border-bottom: 1px solid #333;
        width: 20em;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }

    .input_style {
        border: none;
        border-bottom: 1px solid #333;
        width: 20em;
    }

    .lab_text {
        margin-top: 2em;
        margin-bottom: 0.5em;
    }

    .nextbtn {
        background: white;
        border: 1px solid #333 !important;
        border-radius: 5px;
        padding: 0em 2em !important;
        margin-top: 1em;
        font-weight: 600;
    }

    .table_content {
        margin-top: 0em;
    }


    .item_select_h {
        margin-top: 1em;
    }

    .dest_color {
        color: #696ffb;
    }

    .location_msg{
        display: none;
        padding-left: 0.8em;
        color: #e27e7e;
        font-size: 0.8em;
    }
</style>


<input type="hidden" name="add_type" id="add_type" value="add_construction">

<div class="page-content-wrapper-inner">
    <div class="viewport-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
                <li class="breacrumb_"><a href="#" class="grey_color">Requests</a></li>
                <li class="breacrumb_"><a href="#"><i class="mdi mdi-hand-pointing-right link-icon grey_color"></i></a>
                </li>
                <li class="breacrumb_"><a href="#" class="grey_color">Create - Heavy Equipment Request</a></li>
            </ol>
        </nav>
    </div>

    <div class="content-viewport">
        <div class="row">
            <div class="col-lg-12">
                <div class="grid">
                    <div class="grid-body">

                        <div id="regForm" action="">

                            <div class="tab">
                                <h5>What Vehicles do you want?</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6">
                                        <button class="nextbtn" type="button" id="myBtn" style="float: right;margin-right: 4.4em;">
                                            Add Vehicle
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="totalitems" id="totalitems" value="">
                                <input type="hidden" name="totalamount" id="totalamount" value="">
                                <input type="hidden" name="itemsselected" id="itemsselected" value="">


                                <!-- Trigger/Open The Modal -->
                                <div id="tr_div" style="display: none;">
                                    <button type="button" class="nextbtn" id="myBtntruck">Select Truck</button>
                                </div>

                                <br>

                                <div class="table_content">
                                    <div class="item-wrapper">
                                        <div class="table-responsive">
                                            <table class="table info-table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="9">Vehicle</th>
                                                        <th colspan="2">Qty</th>
                                                        <th colspan="2">Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tditems">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="tab">
                                 <h5>Set Location, Date and Time of Work</h5>
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="lab_text" for=""><i class="mdi mdi-arrow-down-bold-hexagon-outline dest_color"></i>
                                            Destination (to)
                                        </label>
                                        <p>
                                            <input class="input_style" id="locationname" name="locationname" placeholder="Accra" onkeyup="geocodeAddress('locationname', 'locationid', this.value)"
                                                oninput="this.className = ''">
                                            <span id="location_to_msg"  class="location_msg">Location Not Known</span>
                                        </p>
                                        <input type="hidden" id="locationid" name="locationid" value="">
                                    </div>
                                </div>

                                <br>

                                <p class="title_p" style="margin-top: 5px;">Set Date and Time of Work</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="lab_text" style="margin-top: 5px;"> <i class="mdi mdi-calendar"></i> Date</p>
                                        <input type="date" name="workdate" id="workdate" value="" />
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="lab_text" style="margin-top: 5px;"> <i class="mdi mdi-clock-fast"></i> Time</p>
                                        <input type="text" name="worktime" id="worktime" value="" class="timepicker" />
                                    </div>
                                </div>     
                                
                                <br>
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="lab_text" for=""><i class="mdi mdi-arrow-down-bold-hexagon-outline dest_color"></i>
                                            Duration Type [Days | Weeks | Months | Years]
                                        </label>
                                        <select class="custom-select" id="duration_type" name="duration_type">
                                            <option selected="selected" value="">Select Type</option>
                                            <option value="Days">Days</option>
                                            <option value="Weeks">Weeks</option>
                                            <option value="Months">Months</option>
                                            <option value="Years">Years</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="lab_text" for=""><i class="mdi mdi-arrow-down-bold-hexagon-outline dest_color"></i>
                                            Number
                                        </label>
                                        <p>
                                            <input type="number" class="input_style" id="duration_number" name="duration_number" placeholder="">
                                        </p>
                                    </div>
                                </div>

                                <br><br>
                                                    
                            </div>


                            <div class="tab">
                                <p class="title_p" style="margin-top: 5px;">Set Date and Time of Site Inspection</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="lab_text" style="margin-top: 5px;"> <i class="mdi mdi-calendar"></i> Date</p>
                                        <input type="date" name="inspectiondate" id="inspectiondate" value="" oninput="this.className = ''"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="lab_text" style="margin-top: 5px;"> <i class="mdi mdi-clock-fast"></i> Time</p>
                                        <input type="text" name="inspectiontime" id="inspectiontime" value="" class="timepicker" oninput="this.className = ''"/>
                                    </div>
                                </div>         
                                
                                <br><br>
                                
                                <p class="title_p" style="margin-top: 5px;">Description of Work</p>
                                <textarea class="text_area" name="description" id="description" cols="300" rows="5">
                                </textarea>
                                    
                            </div>



                            <div style="overflow:auto;">
                                <div style="float:right;margin-right: 4.4em;">
                                    <button class="nextbtn" type="button" id="prevBtn"
                                        onclick="nextPrev(-1)">Previous</button>
                                    <button class="nextbtn" type="button" id="nextBtn"
                                        onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>

                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <!-- <span class="step"></span> -->
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


</div>




<!-- //////////////////////////////////////////////////////// MODAL ITEMS //////////////////////////////////////////////////////////////////////// -->


<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div>
            <span class="close">&times;</span>
        </div>

        <div>
            <div class="row">
                <div class="col-lg-4">
                    <h1> Select Vehicle </h1>
                </div>
                <div class="col-lg-6">
                    <input class="search" type="text" name="" placeholder="Search Vehicle">
                </div>
            </div>
        </div>

        <div>
            <!-- Tab links -->
            <div  style="display: none;">
                <button type="button" class="tablinks" onclick="openTruckList(event, 'ListHeavyTruck')">List</button>
                <button type="button" class="tablinks" onclick="openTruckList(event, 'Details')">Details</button>
            </div>

            <!-- Tab content -->
            <!-- <div id="List" class="tabcontent">
            </div> -->

            <div id="ListHeavyTruck" class="tabcontent">


            </div>


            <div id="Details" class="tabcontent">

                <div>
                    <div class="row">
                        <div class="col-lg-2">
                            <button class="back_btn" type="button"> <span onclick="openListMain(event, 'ListHeavyTruck')"> &larr; Back</span>
                            </button>
                        </div>
                        <div class="col-lg-6">
                            <h4 id="selected_truck_show"> Truck</h4>
                        </div>
                    </div>
                    <input type="hidden" name="truck_code" id="truck_code">
                    <input type="hidden" name="truck_name" id="truck_name">
                    <input type="hidden" name="truck_url" id="truck_url">
                </div>


                <h6 class="item_select_h">Number of Vehicle</h6>
                <input class="input_style" type="number" name="truck_quantity" id="truck_quantity">

                <h6 class="item_select_h">Type</h6>
                <input class="radio_style" type="radio" id="X" name="truck_type" value="Not Sure">
                <label class="label_style_" for="X">Not Sure</label>
                <input class="radio_style" type="radio" id="X" name="truck_type" value="Small">
                <label class="label_style_" for="X">Small</label>
                <input class="radio_style" type="radio" id="Y" name="truck_type" value="Medium">
                <label class="label_style_" for="Y">Medium</label>
                <input class="radio_style" type="radio" id="Z" name="truck_type" value="Large">
                <label class="label_style_" for="Z">Large</label>
                <input class="radio_style" type="radio" id="Q" name="truck_type" value="Extra Large">
                <label class="label_style_" for="Q">Extra Large</label>

                <h6 class="item_select_h">Note</h6>
                <textarea class="text_area" name="truck_note" id="truck_note" cols="10" rows="5"></textarea>

                <div class="cont_container">
                    <button type="button" class="cont_text" onclick="addTrucklist()"> Continue </button>
                </div>
            </div>



        </div>

    </div>
</div>





<!-- //////////////////////////////////////////////////////// MODAL TRUCKS //////////////////////////////////////////////////////////////////////// -->

<!-- The Modal -->
<div id="myModaltruck" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <div>
            <span class="close">&times;</span>
        </div>

        <div>
            <div class="row">
                <div class="col-lg-4">
                    <h1> Car Type </h1>
                </div>
                <div class="col-lg-6">
                    <input class="search" type="text" name="" placeholder="Search Car">
                </div>
            </div>
        </div>

        <div id="trucklist">

        </div>
    </div>

</div>


</div>