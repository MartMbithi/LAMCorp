<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Delete Staff
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $adn = "DELETE FROM  Staff  WHERE  Staff_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=staffs.php");
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
                    <li class="breadcrumb-item active">Staff Records</li>
                </ol>

                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <a class="btn btn-outline-success" href="add_staff.php">
                            <i class="fas fa-user-plus"></i>
                            Add New Staff Record
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>National ID Number</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM  Staff  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($staff = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $staff->Staff_id_no; ?></td>
                                            <td><?php echo $staff->Staff_name; ?></td>
                                            <td><?php echo $staff->Staff_phone_no; ?></td>
                                            <td>
                                                <a href="update_staff.php?update=<?php echo $staff->Staff_id; ?>">
                                                    <span class="badge badge-success"><i class="fas fa-user-edit"></i> Update Staff</span>
                                                </a>
                                                <a href="staffs.php?delete=<?php echo $staff->Staff_id; ?>">
                                                    <span class="badge badge-danger"><i class="fas fa-user-times"></i> Delete Staff</span>
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