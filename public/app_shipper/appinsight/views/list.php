<style>
.hashtag{
    font-size:12px;
}
</style>
        
            <div class="page-content-wrapper-inner">
                <div class="content-viewport">
                    <div class="row">
                        <div class="col-12 py-5">
                            <h4>Insight</h4>
                            <p class="text-gray">Get a preview of all your activities</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-6 equel-grid">
                            <div class="grid">
                                <div class="grid-body text-gray">
                                    <div class="d-flex justify-content-between">
                                        <p><?php echo $inprogress_num + $completed_num; ?></p>
                                        <p>+<?php $total = $inprogress_num + $completed_num;  echo (($completed_num/$total) * 100) ?>%</p>
                                    </div>
                                    <p class="text-black">Total Loads</p>
                                    <div class="wrapper w-50 mt-4"><canvas height="45" id="stat-line_1"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 equel-grid">
                            <div class="grid">
                                <div class="grid-body text-gray">
                                    <div class="d-flex justify-content-between">
                                        <p><?php echo $inprogress_num; ?></p>
                                        <p>+<?php $total = $inprogress_num + $completed_num;  echo (($inprogress_num/$total) * 100) ?>%</p>
                                    </div>
                                    <p class="text-black">In-progress</p>
                                    <div class="wrapper w-50 mt-4"><canvas height="45" id="stat-line_2"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 equel-grid">
                            <div class="grid">
                                <div class="grid-body text-gray">
                                    <div class="d-flex justify-content-between">
                                        <p>98%</p>
                                        <p>+02.7%</p>
                                    </div>
                                    <p class="text-black">Tender Acceptance</p>
                                    <div class="wrapper w-50 mt-4"><canvas height="45" id="stat-line_3"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 equel-grid">
                            <div class="grid">
                                <div class="grid-body text-gray">
                                    <div class="d-flex justify-content-between">
                                        <p>95%</p>
                                        <p>+ 13.34%</p>
                                    </div>
                                    <p class="text-black">On-time Delivery</p>
                                    <div class="wrapper w-50 mt-4"><canvas height="45" id="stat-line_4"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 equel-grid">
                            <div class="grid">
                                <div class="grid-body d-flex flex-column h-100">
                                    <div class="wrapper">
                                        <div class="d-flex justify-content-between">
                                            <div class="split-header"><img class="img-ss mt-1 mb-1 mr-2"
                                                    src="./media/img/favicon.png"
                                                    alt="instagram">
                                                <p class="card-title">Client Growth</p>
                                            </div>
                                            <div class="wrapper"><button
                                                    class="btn action-btn btn-xs component-flat pr-0" type="button"><i
                                                        class="mdi mdi-access-point text-muted mdi-2x"></i></button>
                                                <button class="btn action-btn btn-xs component-flat pr-0"
                                                    type="button"><i
                                                        class="mdi mdi-cloud-download-outline text-muted mdi-2x"></i></button>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end pt-2 mb-4">
                                            <h4><?php echo $drivers_num; ?></h4>
                                            <p class="ml-2 text-muted">Clients Encounted</p>
                                        </div>
                                    </div>
                                    <div class="mt-auto"><canvas class="curved-mode" id="followers-bar-chart"
                                            height="220"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 equel-grid">
                            <div class="grid">
                                <div class="grid-body">
                                    <p class="card-title">Campaign</p>
                                    <div id="radial-chart"></div>
                                    <h4 class="text-center"><?php echo $inprogress_num + $completed_num; ?></h4>
                                    <p class="text-center text-muted">Total Trips Completed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 equel-grid">
                            <div class="grid">
                                <div class="grid-body">
                                    <div class="split-header">
                                        <p class="card-title">Activity Log</p>
                                        <div class="btn-group"><button type="button"
                                                class="btn btn-trasnparent action-btn btn-xs component-flat pr-0"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    class="mdi mdi-dots-vertical"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                    href="#">Expand View</a> <a class="dropdown-item" href="#">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-wrapper">
                                        <div class="timeline-vertical dashboard-timeline">
                                    

                                            <?php
                                            // var_dump($result); die();
                                                foreach($result as $keyd => $value){ 
                                            ?>
                                            
                                            <div class="activity-log">
                                                <p class="log-name"><?php echo $value['ACTIVITY_TITLE']; ?> </p>
                                                <div class="log-details"><?php echo $value['ACTIVITY_MESSAGE']; ?>
                                                <span class="text-primary ml-1 hashtag">#<?php echo $value['ACTIVITY_DRIVER_NAME']; ?></span>
                                                </div>
                                                <small class="log-time"><?php echo $value['ACTIVITY_DATEADDED']; ?></small>
                                            </div>

                                            <?php 
                                                }
                                            ?>
                                            
                                            <!-- <div class="activity-log">
                                                <p class="log-name">Ronald Edwards</p>
                                                <div class="log-details">Report has been updated</div>
                                                <small class="log-time">3 Hours Ago</small>
                                            </div>
                                            <div class="activity-log">
                                                <p class="log-name">Charlie Newton</p>
                                                <div class="log-details">Approved your request<div class="wrapper mt-2">
                                                        <button type="button"
                                                            class="btn btn-xs btn-primary">Approve</button> <button
                                                            type="button"
                                                            class="btn btn-xs btn-inverse-primary">Reject</button></div>
                                                </div><small class="log-time">2 Hours Ago</small>
                                            </div>
                                            <div class="activity-log">
                                                <p class="log-name">Gussie Page</p>
                                                <div class="log-details">Added new task: Slack home page</div><small
                                                    class="log-time">4 Hours Ago</small>
                                            </div>
                                            <div class="activity-log">
                                                <p class="log-name">Ina Mendoza</p>
                                                <div class="log-details">Added new images</div><small class="log-time">8
                                                    Hours Ago</small>
                                            </div> -->
                                        </div>
                                    </div>
                                </div><a class="border-top px-3 py-2 d-block text-gray" href="#"><small
                                        class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i> View
                                        All</small></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div><!-- content viewport ends -->
            
