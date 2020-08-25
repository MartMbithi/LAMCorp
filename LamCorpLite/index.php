<?php
session_start();
include('config/config.php');
//login 
if (isset($_POST['login'])) {
    $login_email = $_POST['login_email'];
    $login_password = sha1(md5($_POST['login_password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT login_email, login_password, login_id  FROM Login  WHERE ( login_email =? AND login_password =?)"); //sql to log in user
    $stmt->bind_param('ss',  $login_email, $login_password); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($login_email, $login_password, $login_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['login_id'] = $login_id;
    if ($rs) {
        //if its sucessfull
        header("location:dashboard.php");
    } else {
        $err = "Incorrect Authentication Credentials ";
    }
}
require_once('partials/_head.php');
?>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Water Management System</div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="login_email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                            <label for="inputEmail">Email address</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" name="login_password" id="inputPassword" name="user_password" class="form-control" placeholder="Password" required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Remember Password
                            </label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Sign In" name="login">
                </form>
                <div class="text-center">
                    <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
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