<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
require_once('config/code-generator.php');

check_login();
if (isset($_POST['update'])) {

    $update = $_GET['update'];
    $Staff_name = $_POST['Staff_name'];
    $Staff_id_no = $_POST['Staff_id_no'];
    $Staff_phone_no = $_POST['Staff_phone_no'];
    $Staff_desc = $_POST['Staff_desc'];

    //Insert Captured information to a database table
    $postQuery = "UPDATE Staff SET Staff_name =?, Staff_id_no =?, Staff_phone_no =?, Staff_desc =? WHERE Staff_id =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('sssss', $Staff_name, $Staff_id_no, $Staff_phone_no, $Staff_desc, $update);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
        $success = "Updated" && header("refresh:1; url=staffs.php");
    } else {
        $err = "Please Try Again Or Try Later";
    }
}


require_once('partials/_head.php');
?>

<body id="page-top">

    <?php require_once('partials/_nav.php'); ?>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require_once('partials/_sidebar.php');
        $update = $_GET['update'];
        $ret = "SELECT * FROM  Staff WHERE Staff_id = '$update'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($staff = $res->fetch_object()) {
        ?>

            <div id="content-wrapper">

                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="staffs.php">Staffs</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Update Staff
                        </li>
                    </ol>

                    <div class="card mb-3">
                        <div class="card-header">
                            Please Fill All The Fields
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label>Staff National ID Number</label>
                                        <input type="text" value="<?php echo $staff->Staff_id_no; ?>" required name="Staff_id_no" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Staff Name</label>
                                        <input type="text" required name="Staff_name" value="<?php echo $staff->Staff_name; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Staff Phone Number</label>
                                        <input type="text " required name="Staff_phone_no" value="<?php echo $staff->Staff_phone_no; ?>" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Staff Bio | Desc | About</label>
                                        <textarea type="text" rows="5" name="Staff_desc" class="form-control"><?php echo $staff->Staff_desc; ?></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="submit" name="update" value="Save" class="btn btn-outline-success">
                                    </div>
                                </div>
                            </form>
                        </div>
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
        }
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