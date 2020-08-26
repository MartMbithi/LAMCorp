<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
require_once('config/code-generator.php');

check_login();
if (isset($_POST['add'])) {

    $Expense_code  = $_POST['Expense_code'];
    $Expense_date = $_POST['Expense_date'];
    $Expense_type = $_POST['Expense_type'];
    $Expense_amount = $_POST['Expense_amount'];
    $Expense_kiosk_id  = $_POST['Expense_kiosk_id'];
    $Expense_desc  = $_POST['Expense_desc'];

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO Expenses (Expense_code, Expense_date, Expense_type, Expense_amount, Expense_kiosk_id, Expense_desc) VALUES(?,?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssssss', $Expense_code, $Expense_date, $Expense_type, $Expense_amount, $Expense_kiosk_id, $Expense_desc);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
        $success = "Added" && header("refresh:1; url=expenses.php");
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
                        <a href="expenses.php">Expenses</a>
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
                                <div class="col-md-6">
                                    <label>Expense Code</label>
                                    <input type="text " required name="Expense_code" value="<?php echo $alpha; ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Expense Kiosk ID</label>
                                    <select class="form-control" name="Expense_kiosk_id">
                                        <?php
                                        $ret = "SELECT * FROM  Water_Kiosk  ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute();
                                        $res = $stmt->get_result();
                                        while ($k = $res->fetch_object()) {
                                        ?>
                                            <option> <?php echo $k->kiosk_id; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Expense Date</label>
                                    <input type="date" required name="Expense_date" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Expense Type</label>
                                    <input type="text" required name="Expense_type" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Expense Amount</label>
                                    <input type="text" required name="Expense_amount" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>Expense Description</label>
                                    <textarea type="text" rows="5" name="Expense_desc" class="form-control"></textarea>
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