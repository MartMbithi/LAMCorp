<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
require_once('config/code-generator.php');

check_login();
if (isset($_POST['add'])) {

    $kiosk_name = $_POST['kiosk_name'];
    $kiosk_no = $_POST['kiosk_no'];
    $kiosk_location = $_POST['kiosk_location'];
    $kiosk_opening_hours = $_POST['kiosk_opening_hours'];
    $kiosk_closing_hours = $_POST['kiosk_closing_hours'];
    $kiosk_status = $_POST['kiosk_status'];

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO Water_Kiosk  (kiosk_name, kiosk_no, kiosk_location, kiosk_opening_hours, kiosk_closing_hours, kiosk_status ) VALUES(?,?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssss', $kiosk_name, $kiosk_no, $kiosk_location, $kiosk_opening_hours, $kiosk_closing_hours, $kiosk_status);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
        $success = "Added" && header("refresh:1; url=kiosks.php");
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
        require_once('partials/_sidebar.php')
        ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="kiosks.php">Water Kiosks</a>
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
                                    <label>Kisok Number</label>
                                    <input type="text " required name="kiosk_no" value="<?php echo $beta;?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Kiosk Name</label>
                                    <input type="text" required name="kiosk_name" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Kiosk Location</label>
                                    <input type="text " required name="kiosk_location" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Kisok Opening Hours</label>
                                    <input type="time" required name="kiosk_opening_hours"  class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Kiosk Closing Hours</label>
                                    <input type="time" required name="kiosk_closing_hours" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Kiosk Status</label>
                                    <select class="form-control" name="kiosk_status">
                                        <option>Operational</option>
                                        <option>Faulty</option>
                                    </select>
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