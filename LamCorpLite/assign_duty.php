<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
require_once('config/code-generator.php');

check_login();
//add staff
if (isset($_POST['add'])) {

    $kiosk_staff_duty_start_date = $_POST['kiosk_staff_duty_start_date'];
    $kiosk_staff_duty_end_date = $_POST['kiosk_staff_duty_end_date'];

    $Staff_kiosk_id  = $_POST['Staff_kiosk_id'];
    $Staff_id = $_GET['Staff_id'];


    //Insert Captured information to a database table
    $postQuery = "UPDATE Staff SET Staff_kiosk_id =? WHERE Staff_id =? ";
    $duty = "INSERT INTO Kiosk_Staff_Duty (kiosk_staff_duty_kiosk_id, kiosk_staff_duty_staff_id, kiosk_staff_duty_start_date, kiosk_staff_duty_end_date) VALUES(?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    $dutyStmt = $mysqli->prepare($duty);
    //bind paramaters
    $rc = $postStmt->bind_param('ss', $Staff_kiosk_id, $Staff_id);
    $rc = $dutyStmt->bind_param('isss', $Staff_kiosk_id, $Staff_id, $kiosk_staff_duty_start_date, $kiosk_staff_duty_end_date);
    $postStmt->execute();
    $dutyStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt && $dutyStmt) {
        $success = "Added" && header("refresh:1; url=staff_duties.php");
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
        $ret = "SELECT * FROM  Staff";
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
                            <a href="staffs.php">Staff Duties</a>
                        </li>
                        <li class="breadcrumb-item active">
                            New Duty
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
                                        <label>Staff National ID Number</label>
                                        <input type="text" value="<?php echo $staff->Staff_id_no; ?>" required name="Staff_id_no" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Staff Name</label>
                                        <input type="text" value="<?php echo $staff->Staff_name; ?>" required name="Staff_name" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label>Kiosk ID</label>
                                        <select name="Staff_kiosk_id" class="form-control">
                                            <?php
                                            $ret = "SELECT * FROM  Water_Kiosk  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            while ($k = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $k->kiosk_id; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Duty Start Date</label>
                                        <input type="text" value="<?php echo date('d M Y') ?>" required name="kiosk_staff_duty_start_date" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Duty End Date</label>
                                        <input type="date"  required name="kiosk_staff_duty_end_date" class="form-control">
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