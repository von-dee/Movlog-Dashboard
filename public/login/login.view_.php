<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo APP_NAME; ?> : Login</title>

    <link rel="shortcut icon" href="<?php echo APP_FAVICON; ?>" type="image/png">
    <link rel="stylesheet" href="media/css/bootstrap.css">
    <link rel="stylesheet" href="media/css/font-awesome.css">
    <link rel="stylesheet" href="media/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="media/css/style.css">
</head>

<body class="page-login">
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
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto magine-5">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <div class="card-title text-center"><img src="<?php echo  APP_LOGO; ?>" alt="Brand" width="250px"></div>
                        <form class="form-signin" action="index.php?action=index&pg=1" method="post" enctype="application/x-www-form-urlencoded" name="loginForm" id="loginForm" autocomplete="off">
                            <?php echo (($msg)) ? '<div class="errormsg">' . $msg . '</div>' : ''; ?>
                            <div class="form-label-group">
                                <input type="text" id="inputEmployeeno" name="uname" class="form-control" placeholder="Enter Employee No" required autofoc-us>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Enter Password" required>
                            </div>

                            <div class="custom-control custom-checkbox mb-3 turing">
                                <div class="turing row">
                                    <a href="#" class="reload" onClick="var rightnow = new Date();document.images.turingimg.src='plugins/turing/turing.php?'+ rightnow.getTime();return false;">
                                        <div class="turing reloader"><b>&#x21BA; reload code</b></div>
                                    </a>
                                    <div class="turing col-sm-6">
                                        <img id="turingimg" src="plugins/turing/turing.php" style="width:100%;height:50px;margin-bottom:6px; margin-top:3px;background:#E6E6E6;border-radius:50px;padding:5px; margin-left: -20px">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="login" style="width:100%;" class="fadeIn second input100" name="txtcaptha" placeholder="Enter code">
                                        <span class="focus-input100"></span>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                            <input type="hidden" name="doLogin" id="doLogin" value="systemPingPass" /><br />

                            <div class="fog-pass">
                                <a href="#">Forgotten password?</a> <a float-right href="index.php?action=register">Register for E-PaySlip</a>
                            </div>

                        </form>
                        <?php $session->set('1_token', $token);  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="media/js/jquery-3.1.0.min.js"></script>
    <script src="media/js/bootstrap.js"></script>
    <script src="media/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            disclaimer();
        });

        function disclaimer() {
            Swal.fire({
                title: 'Dear GOG Staff,',
                type: 'info',
                html: "Welcome to the Controller & Accountant General's Departments' E-Payslip system. This intelligent system is designed for you to have easy access to your payslip. You can access your payslip from anywhere either on your mobile phone or any computer with internet connection. <br> If you are a new user, kindly register by clicking on REGISTER FOR E-PAYSLIP. You will need a first-time registration code, which can be obtained from your Head of Department. Please follow the instructions thereafter to login for your e-payslip. <br> <br> <b>Note:</b> <br>CAGD is not liable for any financial loss resulting from disclosing your employee details including password to Third Parties.<br><br> Thank You, <br>Controller and Accountant General",
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonText: 'Click here to continue'
            });
        };
    </script>
    <?php
    include "public/root.scripts.php";
    ?>
    <div class="col-sm-12">
        <div class="declartation text-center" style="color: white"><small>© <?php echo date("Y"); ?> Controller & Accountant General. <a href="index.php?action=policy"><b>Privacy & Policy</b></a>.</small></div>

    </div>
</body>

</html>