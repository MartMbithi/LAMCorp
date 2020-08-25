<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
require_once('partials/_analytics.php');
check_login();
require_once('partials/_head.php');
?>

<body id="page-top">

    <?php
    require_once('partials/_nav.php');
    ?>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require_once('partials/_sidebar.php');
        ?>
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-users"></i>
                                </div>
                                <div class="mr-5"><?php echo $staff; ?> Staffs</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="staffs.php">
                                <span class="float-left">View Details </span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-kiwi-bird"></i>
                                </div>
                                <div class="mr-5"><?php echo $waterKiosks; ?> Water Kiosks</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="chicken_breeds.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-tractor"></i>
                                </div>
                                <div class="mr-5"><?php echo $sales; ?> Total Water Sales</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="poultry_farms.php">
                                <span class="float-left"> View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-handshake"></i>
                                </div>
                                <div class="mr-5">Ksh <?php echo $expenses; ?> Total Expenses</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="sales.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>


                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-handshake"></i>
                        Sales Records</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Payment Till Number</th>
                                        <th>Payment Number</th>
                                        <th>Payment Amount</th>
                                        <th>Date Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM  Payments ORDER BY `Payments`.`Payment_date` ASC  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($sales = $res->fetch_object()) {
                                    ?>

                                        <tr>
                                            <td><?php echo $sales->Payment_till_number; ?></td>
                                            <td><?php echo $sales->Payment_number; ?></td>
                                            <td>Ksh <?php echo $sales->Payment_amount; ?></td>
                                            <td><?php echo $Payment_date; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated on <?php echo date('d M Y'); ?> at <?php echo date('g:i'); ?></div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    require_once('partials/_logout.php');
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>