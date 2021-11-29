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

    .options{
        text-align: center;
        border: 1px solid #d4d4d4;
        border-radius: 5px;
        margin: 1em 2em;
    }

    .anch_btn{
        color: #333 !important; 
        text-decoration: none;
    }

</style>



<div class="page-content-wrapper-inner">
    <div class="viewport-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
                <li class="breacrumb_"><a href="#" class="grey_color">Requests</a></li>
                <li class="breacrumb_"><a href="#"><i class="mdi mdi-hand-pointing-right link-icon grey_color"></i></a>
                </li>
                <li class="breacrumb_"><a href="#" class="grey_color">Create Type</a></li>
            </ol>
        </nav>
    </div>

    <div class="content-viewport">
        <div class="row">
            <div class="col-lg-12">
                <div class="grid">
                    <div class="grid-body">

                        <h5>Which type of Vehicle do you want to request for</h5>
                        <br>
                        <div class="row">
                            <div class="col-lg-5">
                                <a href="javascript:void(0)" class="anch_btn" onclick="$('#pg').val('appshipments');$('#view').val('add_freight');document.myform.submit();">
                                    <div class="options">
                                        <img src="./media/img/carg.png" alt="">
                                        <h5 class="lab_text" for=""><i class="mdi mdi-truck"></i> 
                                            Freight
                                        </h5>
                                        <br>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-5">
                                <a href="javascript:void(0)"  class="anch_btn" onclick="$('#pg').val('appshipments');$('#view').val('add_construction');document.myform.submit();">
                                    <div class="options">
                                        <img src="./media/img/cat.png" alt="">
                                        <h5 class="lab_text" for=""><i class="mdi mdi-subway"></i>
                                            Construction
                                        </h5>
                                        <br>
                                    </div>
                                </a>
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
                    <h1> Select Item </h1>
                </div>
                <div class="col-lg-6">
                    <input class="search" type="text" name="" placeholder="Search Item">
                </div>
            </div>
        </div>

        <div>
            <!-- Tab links -->
            <div  style="display: none;">
                <button type="button" class="tablinks" onclick="openCity(event, 'List')">List</button>
                <button type="button" class="tablinks" onclick="openCity(event, 'Details')">Details</button>
            </div>

            <!-- Tab content -->
            <div id="List" class="tabcontent">


            </div>

            <div id="Details" class="tabcontent">

                <div>
                    <div class="row">
                        <div class="col-lg-2">
                            <button class="back_btn"> <span onclick="openCity(event, 'List')"> &larr; Back</span>
                            </button>
                        </div>
                        <div class="col-lg-6">
                            <h4 id="selected_item_show"> Cement</h4>
                        </div>
                    </div>
                    <input type="hidden" name="serv_code" id="serv_code">
                    <input type="hidden" name="serv_name" id="serv_name">
                </div>


                <h6 class="item_select_h">Number of Items</h6>
                <input class="input_style" type="text" name="serv_quantity" id="serv_quantity">

                <h6 class="item_select_h">Item Size</h6>
                <div class="form-flex">
                    <input class="width_input" type="text" name="serv_lenght" id="serv_lenght" placeholder="Len">
                    <input class="width_input" type="text" name="serv_breadth" id="serv_breadth" placeholder="Bre">
                    <input class="width_input" type="text" name="serv_height" id="serv_height" placeholder="Hei">
                </div>


                <h6 class="item_select_h">Item weight</h6>
                <input class="radio_style" type="radio" id="X" name="serv_weight" value="0Kg - 200Kg">
                <label class="label_style_" for="X">0Kg - 200Kg</label>
                <input class="radio_style" type="radio" id="Y" name="serv_weight" value="201Kg - 300Kg">
                <label class="label_style_" for="Y">201Kg - 300Kg</label>
                <input class="radio_style" type="radio" id="Z" name="serv_weight" value="Over 301Kg">
                <label class="label_style_" for="Z">Over 301Kg</label>

                <h6 class="item_select_h">Note</h6>
                <textarea class="text_area" name="serv_note" id="serv_note" cols="10" rows="5"></textarea>

                <div class="cont_container">
                    <button type="button" class="cont_text" onclick="addservlist()"> Continue </button>
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