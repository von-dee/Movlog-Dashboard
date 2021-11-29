<?php
include SPATH_THEME.DS.'header.php';
include SPATH_THEME.DS.'navbar.php';
$token= generateFormToken();

$currentuser = $session->get('loginuserfulname');
$currentusercode = $session->get('actorid');

// die($currentusercode);
?>

  <div class="d-flex" id="wrapper">
  <?php include SPATH_THEME.DS.'sidebar.php';?>
    
    <!-- Page Content -->
    <div id="page-content-wrapper" class="bg-light">
    <!-- <script src="media/js/jquery.3.2.1.min.js"></script> -->

    <?php include SPATH_THEME.DS.'navbar.php';?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 page-wide" style="padding: 0;">
            <form name="myform" id="myform" method="post" action="#" data-toggle="validator" role="form" enctype="multipart/form-data" autocomplete="off">
                <input id="pg" name="pg" value="" type="hidden" />
                <input id="option" name="option" value="" type="hidden" />
                <input id="view" name="view" value="" type="hidden" />
                <input id="viewpage" name="viewpage" value="" type="hidden" />
                <input id="class_call" name="class_call" value="" type="hidden" />
                <input id="keys" name="keys" value="<?php echo (!empty($keys)?$keys:'') ;?>" type="hidden" />
                <input id="ekeys" name="ekeys" value="<?php echo (!empty($ekeys)?$ekeys:'') ;?>" type="hidden" />
                <input id="newkeys" name="newkeys" value="<?php echo $keys;?>" type="hidden" />
                 <input id="contributiondata" name="contributiondata" value="" type="hidden" />
                 
                <input id="data" name="data" value="" type="hidden" />
                <input id="action_search" name="action_search" value="" type="hidden" />
                <input id="microtime" name="microtime" value="<?php echo md5(microtime()); ?>" type="hidden" /> 
                <input id="token" name="token" value="<?php echo $token ; ?>" type="hidden" />  

                <div class="page-content-wrapper">
                  
                <?php



                  global $session;
                  $usertype = $session->get("usertype");

                  if( $usertype == "4"){

                    switch($pg){

                      case 'appinsight':
                        include ("app_shipper/appinsight/platform.php");
                      break;
  
                      case 'appshipments':
                        include ("app_shipper/appshipments/platform.php");
                      break;
  
                      case 'appprofile':
                        include ("app_shipper/appprofile/platform.php");
                      break;
  
                      case 'appmessages':
                        include ("app_shipper/appmessages/platform.php");
                      break;
  
                      case 'appnotifications':
                        include ("app_shipper/appnotifications/platform.php");
                      break;
  
                      case 'appcontactus':
                        include ("app_shipper/appcontactus/platform.php");
                      break;
  
                      case 'appreport':
                        include ("app_shipper/appreport/platform.php");
                      break;
  
                      default:
                        include ("app_shipper/dashboard/platform.php");
                      break;
  
                    }

                  }elseif( $usertype == "2"){

                    switch($pg){

                      case 'appinsight':
                        include ("app_carrier/carrinsight/platform.php");
                      break;
  
                      case 'appshipments':
                        include ("app_carrier/carrshipments/platform.php");
                      break;
  
                      case 'appprofile':
                        include ("app_carrier/carrprofile/platform.php");
                      break;
  
                      case 'appmessages':
                        include ("app_carrier/carrmessages/platform.php");
                      break;
  
                      case 'appnotifications':
                        include ("app_carrier/carrnotifications/platform.php");
                      break;
  
                      case 'appcontactus':
                        include ("app_carrier/carrcontactus/platform.php");
                      break;

                      case 'appfleetmanagement':
                        include ("app_carrier/carrfleetmanagement/platform.php");
                      break;

                      case 'appdrivers':
                        include ("app_carrier/carrdrivers/platform.php");
                      break;
  
                      case 'appreport':
                        include ("app_carrier/carrreport/platform.php");
                      break;
  
                      default:
                        include ("app_carrier/dashboard/platform.php");
                      break;
  
                    }
                
                  }
                
                ?>

        


                  <!-- partial:partials/_footer.html -->
                  <footer class="footer">
                      <div class="row">
                          <div class="col-sm-6 text-center text-sm-right order-sm-1">
                              <ul class="text-gray">
                                  <li><a href="#">Terms of use</a></li>
                                  <li><a href="#">Privacy Policy</a></li>
                              </ul>
                          </div>
                          <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0"><small
                                  class="text-muted d-block">Copyright © Movlog Inc <?php echo date("Y"); ?> <a href="http://www.uxcandy.co/"
                                      target="_blank">MOVLOG</a>. All rights reserved</small> <small
                                  class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
                          </div>
                      </div>
                  </footer><!-- partial -->
              </div><!-- page content ends -->



            </form>
          </div>
        </div>

      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<?php include SPATH_THEME.DS.'footer.php';?>