<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
require_once('config/code-generator.php');

check_login();
if (isset($_POST['update'])) {
    
        $login_user_name = $_POST['login_user_name'];
        $login_email = $_POST['login_email'];
        $login_password = sha1(md5($_POST['login_password']));
        $login_id = $_SESSION['login_id'];

        //Insert Captured information to a database table
        $postQuery = "UPDATE Login  SET login_user_name =?, login_email =?, login_password =? WHERE login_id =?";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('ssss', $login_user_name, $login_email, $login_password, $login_id);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Updated" && header("refresh:1; url=dashboard.php");
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
        $login_id = $_SESSION['login_id'];
        $ret = "SELECT * FROM  Login WHERE login_id ='$login_id'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_object()) {
        ?>

            <div id="content-wrapper">

                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Settings
                        </li>
                    </ol>

                    <div class="card mb-3">
                        <div class="card-header">
                            Please Fill All The Fields
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Session ID</label>
                                        <input type="text" readonly value="<?php echo $row->login_id; ?>" required name="login_id" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input type="text" value="<?php echo $row->login_user_name; ?>" required name="login_user_name" class="form-control">
                                    </div>
                                </div>

                                <br>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Email Address</label>
                                        <input type="text" value="<?php echo $row->login_email; ?>" required name="login_email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="password" required name="login_password" class="form-control">
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
                require_once('partials/_footer.php'); ?>

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