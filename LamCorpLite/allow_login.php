<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
require_once('config/code-generator.php');

check_login();
//add staff
if (isset($_POST['add'])) {

    $Staff_login_id = $_POST['Staff_login_id'];
    $Staff_id = $_GET['Staff_id'];
    $login_user_name = $_POST['login_user_name'];
    $login_email = $_POST['login_email'];
    $login_password = sha1(md5($_POST['login_password']));
    $login_rank = $_POST['login_rank'];

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO Login  (login_id, login_user_name, login_email, login_password, login_rank) VALUES(?,?,?,?,?)";
    $staff = "UPDATE Staff SET Staff_login_id =? WHERE Staff_id =?";
    $postStmt = $mysqli->prepare($postQuery);
    $StaffStmt = $mysqli->prepare(($staff));
    //bind paramaters
    $rc = $postStmt->bind_param('sssss', $Staff_login_id, $login_user_name, $login_email, $login_password, $login_rank);
    $rc = $StaffStmt->bind_param('ss',  $Staff_login_id, $Staff_id);
    $postStmt->execute();
    $StaffStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt && $StaffStmt) {
        $success = "Added" && header("refresh:1; url=auth_permissions.php");
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
        $Staff_id = $_GET['Staff_id'];
        $ret = "SELECT * FROM  Staff WHERE Staff_login_id ='0' ";
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
                            <a href="auth_permissions.php">Authentication Permissions</a>
                        </li>
                        <li class="breadcrumb-item active">
                            New
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
                                        <label>Staff Login ID</label>
                                        <input type="text" readonly name="Staff_login_id" value="<?php echo $staffid; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Staff Name</label>
                                        <input type="text" value="<?php echo $staff->Staff_name; ?>" required name="login_user_name" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Staff Rank</label>
                                        <select name="login_rank" class="form-control">
                                            <option>Admin</option>
                                            <option>Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Staff Email</label>
                                        <input type="text " required name="login_email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Staff Login Password</label>
                                        <input type="text " required name="login_password" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="submit" name="add" value="Save" class="btn btn-outline-success">
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
        }
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