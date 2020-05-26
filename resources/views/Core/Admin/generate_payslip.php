<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
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
        $payroll_id = $_GET['payroll_id'];
        $ret="SELECT * FROM  LAMCorp_payrolls WHERE payroll_id = ?"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $payroll_id);
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">HRM</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Payrolls</a></li> 
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Generate <?php echo $row->staff_name;?> Payslip</span></li>
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
                    <div class="row invoice layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="app-hamburger-container">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                            </div>
                            <div class="doc-container">
                                <div class="tab-title">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="search">
                                                <input type="text" class="form-control" placeholder="Search...">
                                            </div>
                                            <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                                <?php 
                                                    $payroll_id = $_GET['payroll_id'];
                                                    $ret="SELECT * FROM  LAMCorp_payrolls WHERE payroll_id = ?"; 
                                                    $stmt= $mysqli->prepare($ret) ;
                                                    $stmt->bind_param('i', $payroll_id);
                                                    $stmt->execute() ;//ok
                                                    $res=$stmt->get_result();
                                                    $cnt=1;
                                                    while($row=$res->fetch_object())
                                                    {
                                                ?>
                                                    <li class="nav-item">
                                                        <div class="nav-link list-actions" id="invoice-00001" data-invoice-id="00001">
                                                            <div class="f-m-body">
                                                                <div class="f-head">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                                </div>
                                                                <div class="f-body">
                                                                    <p class="invoice-number"><?php echo $row->payroll_code;?></p>
                                                                    <p class="invoice-customer-name"><span>To:</span><?php echo $row->staff_name;?></p>
                                                                    <p class="invoice-generated-date">Date: <?php echo date("d-M-Y", strtotime($row->created_at));?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    $payroll_id = $_GET['payroll_id'];
                                    $ret="SELECT * FROM  LAMCorp_payrolls WHERE payroll_id = ?"; 
                                    $stmt= $mysqli->prepare($ret) ;
                                    $stmt->bind_param('i', $payroll_id);
                                    $stmt->execute() ;//ok
                                    $res=$stmt->get_result();
                                    $cnt=1;
                                    while($row=$res->fetch_object())
                                    {
                                        //compute net salary
                                        //$totalSalary = ($row->salary) + ($row->allowances);
                                        //$netSalary = $totalSalary - ($row->taxation);

                                        $salary = $row->salary;
                                        $alw = $row->alw;
                                        $deductions = $row->taxation;

                                        $cumulativeSalary = $salary + $alw;
                                        $netSalary = $cumulativeSalary - $deductions;


                                ?>
                                <div class="invoice-container">
                                    <div class="invoice-inbox">

                                        <div class="inv-not-selected">
                                            <p>Open a payslip from the list.</p>
                                        </div>

                                        <div class="invoice-header-section">
                                            <h4 class="text-success"><?php echo $row->payroll_code;?></h4>
                                            <div class="">
                                                <svg id="print" onclick="printContent('printPayslip');" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Print"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                            </div>
                                        </div>
                                        
                                        <div id="printPayslip" class="">
                                            
                                            <div class="invoice-00001">
                                                <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                    <div class="row inv--head-section">

                                                        <div class="col-sm-6 col-12">
                                                            <h3 class="in-heading">Payslip</h3>
                                                        </div>
                                                        <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                            <div class="company-info">
                                                                <h5 class="inv-brand-name">LAMCorp Inc</h5>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="row inv--detail-section">

                                                        <div class="col-sm-7 align-self-center">
                                                            <p class="inv-to">Payslip To</p>
                                                        </div>
                                                        <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                            <p class="inv-detail-title">From : LAMCorp Inc</p>
                                                        </div>
                                                        
                                                        <div class="col-sm-7 align-self-center">
                                                            <p class="inv-customer-name"><?php echo $row->staff_name;?></p>
                                                            <p class="inv-street-addr"><?php echo $row->staff_number;?></p>
                                                            <p class="inv-email-address"><?php echo $row->staff_email;?></p>
                                                        </div>
                                                        <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                            <p class="inv-list-number"><span class="inv-title">Number : </span> <span class="text-primary"><?php echo $row->payroll_code;?></span></p>
                                                            <p class="inv-created-date"><span class="inv-title">Payslip Date : </span> <span class="inv-date"><?php echo date("d M Y", strtotime($row->created_at));?></span></p>
                                                            <p class="inv-due-date"><span class="inv-title">Pay Month : </span> <span class="inv-date"><?php echo $row->pay_record;?></span></p>
                                                        </div>
                                                    </div>

                                                    <div class="row inv--product-table-section">
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead class="">
                                                                        <tr>
                                                                            <th scope="col">Monthly Salary</th>
                                                                            <th class="text-right" scope="col">Total Monthly Allowances</th>
                                                                            <th class="text-right" scope="col">Total Monthly Deductions</th>
                                                                            <th class="text-right" scope="col">Net Salary</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Ksh <?php echo $row->salary;?></td>
                                                                            <td class="text-right">Ksh <?php echo $row->alw;?></td>
                                                                            <td class="text-right">Ksh <?php echo $row->taxation;?></td>
                                                                            <td class="text-right">Ksh <?php echo $netSalary;?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                            <div class="inv--payment-info">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-12">
                                                                        <h6 class=" inv-title">Payment Info:</h6>
                                                                    </div>
                                                                    <div class="col-sm-4 col-12">
                                                                        <p class=" inv-subtitle">Bank Name: </p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-12">
                                                                        <p class=""><?php echo $row->bank_name;?></p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-12">
                                                                        <p class=" inv-subtitle">Account Number : </p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-12">
                                                                        <p class=""><?php echo $row->bank_acc;?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                            <div class="inv--total-amounts text-sm-right">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Monthly Salary</p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">Ksh <?php echo $row->salary;?></p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Monthly Deductions </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">Ksh <?php echo $row->taxation;?></p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Monthly Allowances </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">Ksh <?php echo $row->alw;?></p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7 grand-total-title">
                                                                        <h4 class="">Net Salary</h4>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5 grand-total-amount">
                                                                        <h4 class="">Ksh <?php echo $netSalary;?></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="inv--thankYou">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <p class="">Thank you for being a LAMCorp Inc loyal employee.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include("partials/footer.php");?>
            </div>
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER -->
    <?php }?>

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
    <script src="assets/js/apps/invoice.js"></script>
    <!--Print-->
    <script>
        function printContent(el)
        {
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
</script>
</body>

</html>