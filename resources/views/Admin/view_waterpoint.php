<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
?>
<!DOCTYPE html>
<html lang="en">
<?php include("partials/head.php");?>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include("partials/header.php");?>
    </div>
    <!--  END NAVBAR  -->
    <?php
        $waterpoint_number = $_GET['waterpoint_number'];
        $ret="SELECT * FROM  LAMCorp_waterPoints WHERE wp_number = ? "; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('s', $waterpoint_number);
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        $cnt=1;
        while($row=$res->fetch_object())
        {
    ?>
        <!--  BEGIN NAVBAR  -->
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">

                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Water Points</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Water points</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>View <?php echo $row->wp_number;?></span></li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <!--  BEGIN SIDEBAR  -->
                <?php include("partials/sidebar.php");?>
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="row layout-spacing">

                        <!-- Content -->
                        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                            <div class="user-profile layout-spacing">
                                <div class="widget-content widget-content-area">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="">Water Kiosk Details</h3>
                                        <a href="update_waterpoint.php?waterpoint_number=<?php echo $row->wp_number;?>" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                    </div>
                                    <div class="text-center user-info">
                                        <img src="assets/img/default.jpg" class="img-fluid" alt="avatar">
                                        <p class=""><?php echo $row->wp_number;?></p>
                                    </div>
                                    <div class="user-info-list">

                                        <div class="">
                                            <ul class="contacts-block list-unstyled">
                                                <li class="contacts-block__item">
                                                    <p>Staff On Duty : <br> <?php echo $row->wp_staff_on_duty;?></p>
                                                </li>
                                                <li class="contacts-block__item">
                                                    <p>Kiosk Phone Number: <br> <?php echo $row->wp_phone;?></p>
                                                </li>
                                                <li class="contacts-block__item">
                                                    <p>Kiosk Opening Hours: <br> <?php echo $row->wp_opening_hrs;?></p>
                                                </li>
                                                <li class="contacts-block__item">
                                                    <p>Kiosk Closing Hours: <br> <?php echo $row->wp_closing_hrs;?></p>
                                                </li>
                                                <li class="contacts-block__item">
                                                    <p>Kiosk Water Pipes Status: <br>
                                                        <?php
                                                            if($row->wp_status == 'Operational')
                                                            {
                                                                echo "<span class='badge badge-success'>$row->wp_status</span>";
                                                            }
                                                            elseif($row->wp_status == 'Faulty')
                                                            {
                                                                echo "<span class='badge badge-danger'>$row->wp_status</span>";
                                                            }
                                                            else
                                                            {
                                                                echo "<span class='badge badge-warning'>$row->wp_status</span>";
                                                            }
                                                         ?>
                                                    </p>
                                                </li>
                                                
                                                <!--<li class="contacts-block__item">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <div class="social-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <div class="social-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <div class="social-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                -->
                                            </ul>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>

                            <!--<div class="education layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Education</h3>
                                    <div class="timeline-alter">
                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">04 Mar 2009</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Royal Collage of Art</p>
                                                <p>Designer Illustrator</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">25 Apr 2014</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Massachusetts Institute of Technology (MIT)</p>
                                                <p>Designer Illustrator</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">04 Apr 2018</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>School of Art Institute of Chicago (SAIC)</p>
                                                <p>Designer Illustrator</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="work-experience layout-spacing ">
                                
                                <div class="widget-content widget-content-area">

                                    <h3 class="">Work Experience</h3>
                                    
                                    <div class="timeline-alter">
                                    
                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">04 Mar 2009</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Netfilx Inc.</p>
                                                <p>Designer Illustrator</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">25 Apr 2014</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Google Inc.</p>
                                                <p>Designer Illustrator</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">04 Apr 2018</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Design Reset Inc.</p>
                                                <p>Designer Illustrator</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div> -->

                        </div>

                        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                            <!--<div class="skills layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Skills</h3>
                                    <div class="progress br-30">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>PHP</span> <span>25%</span> </div></div>
                                    </div>
                                    <div class="progress br-30">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Wordpress</span> <span>50%</span> </div></div>
                                    </div>
                                    <div class="progress br-30">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Javascript</span> <span>70%</span> </div></div>
                                    </div>
                                    <div class="progress br-30">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>jQuery</span> <span>60%</span> </div></div>
                                    </div>

                                </div>
                            </div> -->

                            <div class="bio layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Water Kiosk Location</h3>
                                    <p><?php echo $row->wp_location;?></p>
                                    <!--<div class="bio-skill-box">

                                        <div class="row">
                                            
                                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                                
                                                <div class="d-flex b-skills">
                                                    <div>
                                                    </div>
                                                    <div class="">
                                                        <h5>Sass Applications</h5>
                                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                                
                                                <div class="d-flex b-skills">
                                                    <div>
                                                    </div>
                                                    <div class="">
                                                        <h5>Github Countributer</h5>
                                                        <p>Ut enim ad minim veniam, quis nostrud exercitation aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">
                                                
                                                <div class="d-flex b-skills">
                                                    <div>
                                                    </div>
                                                    <div class="">
                                                        <h5>Photograhpy</h5>
                                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia anim id est laborum.</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">
                                                
                                                <div class="d-flex b-skills">
                                                    <div>
                                                    </div>
                                                    <div class="">
                                                        <h5>Mobile Apps</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do et dolore magna aliqua.</p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    -->
                                </div>                                
                            </div>

                        </div>

                    </div>
                </div>
                <?php include("partials/footer.php");?>
            </div>
            <!--  END CONTENT AREA  -->
        </div>

    <?php } ?>    
    <!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>