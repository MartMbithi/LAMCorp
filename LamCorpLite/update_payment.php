<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
require_once('config/code-generator.php');

check_login();
if (isset($_POST['update'])) {

    $Payment_number  = $_POST['Payment_number'];
    $Payment_kiosk_id = $_POST['Payment_kiosk_id'];
    $Payment_till_number = $_POST['Payment_till_number'];
    $Payment_transaction_code = $_POST['Payment_transaction_code'];
    $Payment_amount  = $_POST['Payment_amount'];
    $Payment_date  = $_POST['Payment_date'];
    $Payment_reference_no = $_POST['Payment_reference_no'];
    $Payment_desc = $_POST['Payment_desc'];
    $update = $_GET['update'];

    //Insert Captured information to a database table
    $postQuery = "UPDATE Payments SET Payment_number =?, Payment_kiosk_id =?, Payment_till_number =?, Payment_transaction_code =?, Payment_amount =?, Payment_date =?, Payment_reference_no =?, Payment_desc =? WHERE Payment_id =?";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssssssi', $Payment_number, $Payment_kiosk_id, $Payment_till_number, $Payment_transaction_code, $Payment_amount, $Payment_date, $Payment_reference_no, $Payment_desc, $update);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
        $success = "Updated" && header("refresh:1; url=payments.php");
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
        $ret = "SELECT * FROM  Payments  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($k = $res->fetch_object()) {
        ?>

            <div id="content-wrapper">

                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="payments.php">Payments</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Update Payment
                        </li>
                    </ol>

                    <div class="card mb-3">
                        <div class="card-header">
                            Please Fill All The Fields
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label>Payment Number</label>
                                        <input type="text " value="<?php echo $k->Payment_number; ?>" required name="Payment_number" value="<?php echo $beta; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Kiosk ID</label>
                                        <input type="text" required name="Payment_kiosk_id" value="<?php echo $k->Payment_kiosk_id; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Till Number</label>
                                        <input type="text" required name="Payment_till_number" value="<?php echo $k->Payment_till_number; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Date Paid</label>
                                        <input type="date" required name="Payment_date" value="<?php echo $k->Payment_date; ?>" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label>Transaction Code</label>
                                        <input type="text" required value="<?php echo $k->Payment_transaction_code; ?>" name="Payment_transaction_code" value="<?php echo $mpesaCode; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Refrence Number</label>
                                        <input type="text" value="<?php echo $k->Payment_reference_no; ?>" required name="Payment_reference_no" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Amount Paid</label>
                                        <input type="text" required name="Payment_amount" value="<?php echo $k->Payment_amount; ?>" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Payment Description</label>
                                        <textarea type="text" rows="5" name="Payment_desc" class="form-control"><?php echo $k->Payment_desc; ?></textarea>
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