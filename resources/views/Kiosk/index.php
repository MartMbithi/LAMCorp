<?php
    session_start();
    include('config/config.php');
    //handle login
    if(isset($_POST['kioskLogin']))
    {
        $wp_number = $_POST['wp_number'];
        $wp_pass = sha1(md5($_POST['wp_pass']));
        $stmt=$mysqli->prepare("SELECT wp_number, wp_pass, wp_id  FROM LAMCorp_waterPoints  WHERE wp_number=? AND wp_pass=?");//sql to log in user
        $stmt->bind_param('ss',  $wp_number, $wp_pass);//bind fetched parameters
        $stmt->execute();//execute bind 
        $stmt -> bind_result($wp_number, $wp_pass, $wp_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['wp_id'] = $wp_id;
        $_SESSION['wp_number'] = $wp_number;
        if($rs)
            {
                //if its sucessfull
                header("location:dashboard.php");
            }

        else
            {
                $err = "Access Denied Please Check Your Credentials";
            }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<?php include("partials/head.php");?>
<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">LAMCorp Suite Water Point Module</h1>
                        <p class="">Enter your email and password to log in</p>
                        
                        <form method="post" class="text-left">
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="username"> WATER POINT NUMBER </label>
                                    <select  required name="wp_number"  class="form-control">
                                        <?php
                                            $ret="SELECT * FROM  LAMCorp_waterPoints "; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            $cnt=1;
                                            while($row=$res->fetch_object())
                                            {
                                        ?>
                                        <option value="<?php echo $row->wp_number;?>"><?php echo $row->wp_number;?></option>
                                        <?php }?>

                                    </select>
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">WATER POINT PASSWORD</label>
                                        <a href="resetpass.php" class="forgot-pass-link">Forgot Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="wp_pass" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" name="kioskLogin" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>
                                <!--
                                <div class="division">
                                      <span>OR</span>
                                </div>

                                <div class="social">
                                    <a href="javascript:void(0);" class="btn social-fb">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> 
                                        <span class="brand-name">Facebook</span>
                                    </a>
                                   <a href="javascript:void(0);" class="btn social-github">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                        <span class="brand-name">Github</span>
                                    </a>
                                </div>

                                <p class="signup-link">Not registered ? <a href="signup.php">Create an account</a></p>
                                //Uncomment This line to allow your super users to create account
                                -->

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>

</body>

</html>