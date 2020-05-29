<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    include('partials/analytics.php');
    check_login();
 
?>
<!DOCTYPE html>
<html lang="en">
<?php include("partials/head.php");?>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include("partials/header.php");?>
    </div>
    <!--  END NAVBAR  -->

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
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
            <!--
            <ul class="navbar-nav flex-row ml-auto ">
                <li class="nav-item more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a>
                            <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>
                            <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                            <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </li>
            </ul>
            -->
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
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                   <!-- <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-one">
                            <div class="widget-heading">
                                <h6 class="">LAMCorp Statistics</h6>
                            </div>
                            <div class="w-chart">
                                <div class="w-chart-section">
                                    <div class="w-detail">
                                        <p class="w-title">Staffs</p>
                                        <p class="w-stats">423,964</p>
                                    </div>
                                    <div class="w-chart-render-one">
                                        <div id="total-users"></div>
                                    </div> 
                                </div>

                                <div class="w-chart-section">
                                    <div class="w-detail">
                                        <p class="w-title">Vendors</p>
                                        <p class="w-stats">7,929</p>
                                    </div>
                                    <div class="w-chart-render-one">
                                        <div id="paid-visits"></div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <!--Incomes-->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-content">
                                    <div class="w-info">
                                        <h6 class="value">Ksh <?php echo $incomes;?></h6>
                                        <p class="text-primary">Total Incomes</p>
                                    </div>
                                    <div class="">
                                        <div class="w-icon text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>                        
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <!-- ./ Incomes -->

                    <!-- Expenses -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-content">
                                    <div class="w-info">
                                        <h6 class="value">Ksh <?php echo $total_expenses;?></h6>
                                        <p class="text-danger">Total Expenses</p>
                                    </div>
                                    <div class="">
                                        <div class="w-icon text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>                        
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <!-- ./ Expenses -->

                    <!-- Profit | Loss  --> 
                    <?php echo $status;?>
                    <!-- Profit | Loss -->

                    <!-- Staffs -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-content">
                                    <div class="w-info">
                                        <h6 class="value"><?php echo $staffs;?></h6>
                                        <p class="">Staffs</p>
                                    </div>
                                    <div class="">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <!-- ./ Staffs -->

                    <!-- Vendors -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-content">
                                    <div class="w-info">
                                        <h6 class="value"><?php echo $vendors;?></h6>
                                        <p class="">Vendors</p>
                                    </div>
                                    <div class="">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <!-- ./ Vendors -->

                    <!-- Water Points -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-content">
                                    <div class="w-info">
                                        <h6 class="value"><?php echo $waterPoints;?></h6>
                                        <p class="">Water Points (ATMs)</p>
                                    </div>
                                    <div class="">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>                       
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <!-- Water Points -->

                    <!--<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <h5 class="">Pro Plan</h5>
                                        <p class="inv-balance">$10,344</p>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                                        </div>
                                        <a href="javascript:void(0);">Upgrade</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-three">
                            <div class="widget-heading">
                                <div class="">
                                    <h6 class="">Cash Flow Per Till Numbers</h6>
                                </div>
                                <!--
                                <div class="dropdown  custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
                                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                    </div>
                                </div>
                                -->
                            </div>

                            <div class="widget-content">
                                <!--Plot a graph indicating cash flow-->
                                <div id="cashFlow"></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-three">

                            <div class="widget-heading">
                                <h6 class="">Latest Payments Via Till Numbers</h6>
                            </div>

                            <div class="widget-content">

                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <!--Payments Via TILL numbers Sort using timestamp-->
                                        <?php
                                            $ret="SELECT * FROM `LAMCorp_payments` ORDER BY `LAMCorp_payments`.`created_at` DESC "; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            $cnt=1;
                                            while($row=$res->fetch_object())
                                            {
                                        ?>
                                            <div class="item-timeline timeline-new">
                                                <div class="t-dot">
                                                    <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                                </div>
                                                <div class="t-content">
                                                
                                                <div class="t-uppercontent">
                                                    <h5><?php echo $row->transaction_code;?> Confirmed.</h5>
                                                </div>
                                                <p>
                                                    <!--Indicate transaction ID, Customer Phone Number, Customer Name-->
                                                    Received <span class="text-success">Ksh <?php echo $row->amount;?></span> from <span class="text-primary"><?php echo strtoupper($row->client_name);?> <?php echo $row->client_phone;?></span> on 
                                                    <?php echo date("d/M/Y", strtotime($row->created_at));?> at <?php echo date("g:ia", strtotime($row->created_at));?>.

                                                </p>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="chartDonut" class="col-xl-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Incomes And Expenditures</h4> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div id="s-line-area" class=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("partials/footer.php");?>
        </div>
        <!--  END CONTENT PART  -->
    </div>
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

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_2.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <!--<script src="plugins/apex/custom-apexcharts.js"></script>-->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!--Cash flow chart per kiosk js-->
    <script>
    //Cash flow per water kiosk
    var d_1options1 = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
              show: false,
            },
            dropShadow: {
                enabled: true,
                top: 1,
                left: 1,
                blur: 2,
                color: '#acb0c3',
                opacity: 0.7,
            }
        },
        colors: ['#5c1ac3', '#ffbb44'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'  
            },
        },
        dataLabels: {
            enabled: false
        },
        legend: {
              position: 'bottom',
              horizontalAlign: 'center',
              fontSize: '14px',
              markers: {
                width: 10,
                height: 10,
              },
              itemMargin: {
                horizontal: 0,
                vertical: 8
              }
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Amount Paid Ksh',
            data: [<?php echo $SafPayments;?>,<?php echo $AirtelPayments;?>,<?php echo $TelkomPayments;?> ]
        }],
        xaxis: {
            categories: ['MPESA TillNumber <?php echo $Safaricom;?>', 'AirtelMoney TillNumber <?php echo $Airtel;?>', 'TKash TillNumber <?php echo $Telkom;?>'],
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.3,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 0.8,
            stops: [0, 100]
          }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val
                }
            }
        }
      } 
      var d_1C_3 = new ApexCharts(
        document.querySelector("#cashFlow"),
        d_1options1
    );

    d_1C_3.render();

    //INCOMES AGANIST EXPENSES
    var sLineArea = {
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
            show: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        series: [{
            name: 'Incomes In Ksh',
            data: [0,<?php echo $incomes;?>]
        }, {
            name: 'Expenses In Ksh',
            data: [0, <?php echo $total_expenses;?>]
        }],

        xaxis: {
            categories: ["transactions","transactions"],                
        },
    }
    var chart = new ApexCharts(
    document.querySelector("#s-line-area"),
    sLineArea
    );
    chart.render();
</script>

</body>

</html>