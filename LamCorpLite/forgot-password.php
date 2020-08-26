<?php
session_start();
include('config/config.php');
require_once('config/code-generator.php');

if (isset($_POST['reset_pwd'])) {

    //exit('This email is already being used');
    //Reset Password
    $Reset_Wrongpassword_number = $_POST['Reset_Wrongpassword_number'];
    $Reset_Kiosk_id = $_POST['Reset_Kiosk_id'];
    $Reset_code  = $_POST['Reset_code'];
    $Reset_status = $_POST['Reset_status'];
    $query = "INSERT INTO Passwordresets (Reset_Wrongpassword_number, Reset_Kiosk_id, Reset_code, Reset_status) VALUES (?,?,?,?)";
    $reset = $mysqli->prepare($query);
    $rc = $reset->bind_param('ssss', $Reset_Wrongpassword_number, $Reset_Kiosk_id, $reseReset_code, $Reset_status);
    $reset->execute();
    if ($reset) {
        $success = "Password Reset Instructions Sent To Your Email";
        // && header("refresh:1; url=index.php");
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

require_once('partials/_head.php');
?>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Reset Password</div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <h4>Forgot your password?</h4>
                    <p>Select Kiosk Number and the password will be reset</p>
                </div>
                <form method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="hidden" name="Reset_Wrongpassword_number" value="<?php echo $beta;?>">
                            <input type="hidden" name="Reset_code" value="<?php echo $resetcode;?>">
                            <input type="hidden" name="Reset_status" value="Pending">
                            <select  class="form-control" required name="Reset_Kiosk_id" id="kioskNumber">
                                <?php
                                //Fetch all available kiosk numbers
                                $ret = "SELECT * FROM  Water_Kiosk  ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                while ($kiosk = $res->fetch_object()) {
                                ?>
                                    <option><?php echo $kiosk->kiosk_no;?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="reset_pwd" class="btn btn-primary btn-block" value="Reset Password">
                </form>
                <div class="text-center">
                    <a class="d-block small" href="index.php">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>