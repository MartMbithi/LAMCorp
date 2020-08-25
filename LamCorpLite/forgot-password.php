<?php
session_start();
include('config/config.php');
require_once('config/code-generator.php');

if (isset($_POST['reset_pwd'])) {

    //exit('This email is already being used');
    //Reset Password
    $reset_code = $_POST['reset_code'];
    $reset_token = sha1(md5($_POST['reset_token']));
    $email = $_POST['email'];
    $reset_id = $_POST['reset_id'];
    $query = "INSERT INTO cfms_password_resets (reset_id, reset_email, reset_code, reset_token) VALUES (?,?,?,?)";
    $reset = $mysqli->prepare($query);
    $rc = $reset->bind_param('ssss', $reset_id, $email, $reset_code, $reset_token);
    $reset->execute();
    if ($reset) {
        $success = "Password Reset Instructions Sent To Your Email";
        // && header("refresh:1; url=index.php");
    } else {
        $err = "Please Try Again Or Try Later";
    }
} else {
    $err = "No account with that email";
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
                    <p>Enter your email address and we will send you instructions on how to reset your password.</p>
                </div>
                <form method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="hidden" id="inputEmail" name="reset_code" value="<?php echo $rc; ?>" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                            <input type="hidden" id="inputEmail" name="reset_token" value="<?php echo $tk; ?>" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                            <input type="hidden" id="inputEmail" name="reset_id" value="<?php echo $rid; ?>" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                            <label for="inputEmail">Select Kiosk Number To Reset Password</label>
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