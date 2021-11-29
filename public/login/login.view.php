<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from uxcandy.co/demo/label-free/preview/demo_1/pages/sample-pages/login_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Apr 2020 23:21:10 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Movlog</title><!-- plugins:css -->
    <link rel="stylesheet" href="./media/vendors/iconfonts/mdi/css/materialdesignicons.css">
    <link rel="stylesheet" href="./media/vendors/css/vendor.addons.css"><!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->

    <link rel="icon" href="./media/img/favicon.png">

    <!-- inject:css -->
    <link rel="stylesheet" href="./media/css/shared/style.css"><!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="./media/css/demo_1/style.css"><!-- Layout style -->
    <link rel="stylesheet" href="./media/css/shared/MaterialDesignWebfont/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./media/css/old/style.css">
    <link rel="stylesheet" href="./media/css/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="https://uxcandy.co/demo/label-free/preview/assets/images/favicon.ico">
</head>

<body>
    <div class="authentication-theme auth-style_1">
        <div class="row">
            <div class="col-12 logo-section"><a href="#" class="logo"><img
                        src="./media/img/logo.png" alt="logo"></a></div>
        </div>
        <div>
            <?php if (isset($attempt_in)) { ?>
            <div class="alert-danger">
                <?php
                    if ($attempt_in < 3) {
                        $msg =  'Invalid user name or password.';
                    } else if ($attempt_in == '11') {
                        $msg = 'Invalid Code entered.';
                    } else if ($attempt_in == '120') {
                        $msg = 'Suspended account.';
                    } else if ($attempt_in == '140') {
                        $msg = 'Locked. Wait for 5min and try again.';
                    } else if ($attempt_in == '110') {
                        $msg = 'User account locked.';
                    }
                    ?>
            </div>
            <?php }
            $token = generateFormToken(); ?>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
                <div class="grid">
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                                <form action="index.php?action=index&pg=1" method="post"
                                    enctype="application/x-www-form-urlencoded" name="loginForm" id="loginForm"
                                    autocomplete="off">
                                    <?php echo (($msg)) ? '<div class="errormsg">' . $msg . '</div>' : ''; ?>
                                    <div class="form-group input-rounded"><input type="text" name="uname"
                                            class="form-control" placeholder="Phone Number"></div>
                                    <div class="form-group input-rounded"><input type="password" name="pwd"
                                            class="form-control" placeholder="SMS Code"></div>
                                    
                                    <!-- <div class="custom-control custom-checkbox mb-3 turing">
                                        <div class="turing row">
                                            <a href="#" class="reload"
                                                onClick="var rightnow = new Date();document.images.turingimg.src='plugins/turing/turing.php?'+ rightnow.getTime();return false;">
                                                <div class="turing reloader"><b>&#x21BA; reload code</b></div>
                                            </a>
                                            <div class="turing col-sm-6">
                                                <img id="turingimg" src="plugins/turing/turing.php"
                                                    style="width:100%;height:50px;margin-bottom:6px; margin-top:3px;background:#E6E6E6;border-radius:50px;padding:5px; margin-left: -20px">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="login" style="width:100%;"
                                                    class="fadeIn second input100" name="txtcaptha"
                                                    placeholder="Enter code">
                                                <span class="focus-input100"></span>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-inline">
                                        <div class="checkbox"><label><input type="checkbox"
                                                    class="form-check-input">Remember me <i
                                                    class="input-frame"></i></label></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" /><br />
                                </form>
                                <div class="signup-link">
                                    <p>Don't have an account yet?</p><a href="#">Sign Up</a>
                                </div>
                                <?php $session->set('1_token', $token);  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth_footer">
            <p class="text-muted text-center">© Movlog Inc <?php echo date("Y"); ?></p>
        </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="./media/vendors/js/core.js"></script>
    <script src="./media/vendors/js/vendor.addons.js"></script><!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <script src="./media/js/script.js"></script>
</body>
<!-- Mirrored from uxcandy.co/demo/label-free/preview/demo_1/pages/sample-pages/login_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Apr 2020 23:21:12 GMT -->

</html>