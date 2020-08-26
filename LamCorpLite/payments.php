<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $adn = "DELETE FROM  Payments  WHERE  Payment_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=payments.php");
    } else {
        $err = "Try Again Later";
    }
}
require_once('partials/_head.php');
?>

<body id="page-top">

    <?php require_once('partials/_nav.php'); ?>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require_once('partials/_sidebar.php')
        ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Payments</li>
                </ol>

                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <a class="btn btn-outline-success" href="add_payment.php">
                            <i class="fas fa-plus"></i>
                            Add New Payment Record
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Till Number</th>
                                        <th>Trn Code</th>
                                        <th>Ref No</th>
                                        <th>Amount</th>
                                        <th>Date Paid</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM  Payments  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($k = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $k->Payment_number; ?></td>
                                            <td><?php echo $k->Payment_till_number; ?></td>
                                            <td><?php echo $k->Payment_transaction_code; ?></td>
                                            <td><?php echo $k->Payment_reference_no;?></td>
                                            <td>Ksh <?php echo $k->Payment_amount;?></td>
                                            <td><?php echo $k->Payment_date;?></td>
                                            <td>
                                                <a href="update_payment.php?update=<?php echo $k->Payment_id; ?>">
                                                    <span class="badge badge-success"><i class="fas fa-edit"></i> Update </span>
                                                </a>
                                                <a href="payments.php?delete=<?php echo $k->Payment_id; ?>">
                                                    <span class="badge badge-danger"><i class="fas fa-trash"></i> Delete </span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated on <?php echo date('d M Y '); ?> at <?php echo date('g:i'); ?></div>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>