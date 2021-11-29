
<?php 
  global $session;
  global $mongo;

  $userid = $session->get("userid");

  $noti_collection = "app_notification";
  $noti_filter = ['NOTI_RECEIVER'=>['$in'=> ["EVB0000000001",$userid]],'NOTI_STATUS'=>"1"];
  $noti_options =  ['sort'=>['NOTI_DATE'=>-1],'limit'=>3,'skip'=>$skipval];
  $noti = $mongo->GetAll($noti_collection,$noti_filter,$noti_options);
  $noti_count = count($noti);
  
  $mesg_collection = "app_messages";
  $mesg_filter = ['MESG_RECEIVER_CODE'=>['$in'=> ["EVB0000000001",$userid]],'MESG_STATUS'=>"1"];
  $mesg_options =  ['sort'=>['MESG_DATEADDED'=>-1],'limit'=>3,'skip'=>$skipval];
  $mesg = $mongo->GetAll($mesg_collection,$mesg_filter,$mesg_options);
  $mesg_count = count($mesg);
  
?>  




<!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper"><a href="index.html"><img class="logo"
            src="./media/img/logoo.png" alt=""> <img class="logo-mini"
            src="./media/img/logoo.png" alt=""></a></div>

      <div class="t-header-content-wrapper">
        <div class="t-header-content"><button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none"><i
              class="mdi mdi-menu"></i></button>
          <form action="#" class="t-header-search-box">
            <div class="input-group"><input type="text" class="form-control" id="inlineFormInputGroup"
                placeholder="Search" autocomplete="off"> <button class="btn btn-primary" style="background-color: #696ffb !important;
    border-color: #696ffb !important;" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button></div>
          </form>
          <ul class="nav ml-auto">
            <li class="nav-item dropdown"><a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown"
                aria-expanded="false"><i class="mdi mdi-bell-outline mdi-1x"></i></a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="notificationDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Notifications</h6>
                  <p class="dropdown-title-text">You have <?php echo $noti_count; ?> unread notification</p>
                </div>
                <div class="dropdown-body">

                <?php
                    foreach($noti as $keyd => $value){ 
                ?>                

                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-<?php echo $value['NOTI_TYPE']; ?> text-<?php echo $value['NOTI_TYPE']; ?>">
                      <i class="<?php echo $value['NOTI_ICON']; ?>"></i>
                    </div>
                    <div class="content-wrapper">
                      <small class="name"><?php echo $value['NOTI_TITLE']; ?></small> 
                      <small class="content-text"><?php echo $value['NOTI_MESSAGE']; ?></small>
                    </div>
                  </div>
                
                <?php 
                    }                                  
                ?>
                
                </div>
                <div class="dropdown-footer"><a href="index.php?pg=appnotifications">View All</a></div>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link" href="#" id="messageDropdown" data-toggle="dropdown"
                aria-expanded="false"><i class="mdi mdi-message-outline mdi-1x"></i>
                <span
                  class="notification-indicator notification-indicator-primary notification-indicator-ripple"></span></a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="messageDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Messages</h6>
                  <p class="dropdown-title-text">You have <?php echo $mesg_count; ?> unread messages</p>
                </div>
                <div class="dropdown-body">

                <?php
                    foreach($mesg as $keyd => $value){ 
                ?>

                  <div class="dropdown-list">
                    <div class="image-wrapper"><img class="profile-img" src="<?php echo $value['MESG_IMG_URL']; ?>"
                        alt="profile image">
                      <div class="status-indicator rounded-indicator bg-success"></div>
                    </div>
                    <div class="content-wrapper"><small class="name"><?php echo $value['MESG_SENDER_NAME']; ?></small> <small
                        class="content-text"><?php echo $value['MESG_BODY']; ?>.</small></div>
                  </div>

                  <?php 
                    }
                  ?>
                  
                </div>
                <div class="dropdown-footer"><a href="index.php?pg=appmessages">View All</a></div>
              </div>
            </li>

            <!-- <li class="nav-item dropdown">
              <a class="nav-link" href="index.php?pg=appprofile" ><i class="mdi mdi-account-box-outline mdi-1x"></i></a>
            </li> -->

            <li class="nav-item dropdown"><a class="nav-link" href="#" id="profileDropdown" data-toggle="dropdown"
                aria-expanded="false"><i class="mdi mdi-account-box-outline mdi-1x"></i></a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="profileDropdown">
                <div class="dropdown-body">
                  <div class="dropdown-list">
                    <a class="nav-link" style="color: #333" href="index.php?pg=appprofile" ><i class="mdi mdi-account mdi-1x"></i> <span style="margin-left: 1em;">Account </span> </a>
                  </div>
                  <div class="dropdown-list">
                    <a class="nav-link" style="color: #333" href="index.php?action=logout" ><i class="mdi mdi-export mdi-1x"></i> <span style="margin-left: 1em;"> Logout </span></a>
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item dropdown"><a class="nav-link" href="#" id="appsDropdown" data-toggle="dropdown"
                aria-expanded="false"><i class="mdi mdi-apps mdi-1x"></i></a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="appsDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Apps</h6>
                  <p class="dropdown-title-text mt-2">Authentication required for 3 apps</p>
                </div>
                <div class="dropdown-body border-top pt-0"><a class="dropdown-grid"><i
                      class="grid-icon mdi mdi-jira mdi-2x"></i> <span class="grid-tittle">Shipper</span>
                  </a><a class="dropdown-grid"><i class="grid-icon mdi mdi-trello mdi-2x"></i> <span
                      class="grid-tittle">Carrier</span> </a><a class="dropdown-grid"><i
                      class="grid-icon mdi mdi-artstation mdi-2x"></i> <span class="grid-tittle">Agent</span>
                  </a><a class="dropdown-grid"><i class="grid-icon mdi mdi-bitbucket mdi-2x"></i> <span
                      class="grid-tittle">Administrator</span></a></div>
                <div class="dropdown-footer"><a href="#">View All</a></div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav><!-- partial -->