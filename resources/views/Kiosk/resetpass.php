<?php
    session_start();
    include('config/config.php');
    include('config/codeGen.php');
    if(isset($_POST['resetPassword']))
    {
        $reset_code = $_POST['reset_code'];
        $token = sha1(md5($_POST['token']));
        $status = $_POST['status'];
        $wp_number = $_POST['wp_number'];
        $query="INSERT INTO LAMCorp_passwordresets (wp_number, reset_code, token, status) VALUES (?,?,?,?)";
        $reset = $mysqli->prepare($query);
        $rc=$reset->bind_param('ssss', $wp_number, $reset_code, $token, $status);
        $reset->execute();
        if($reset)
        {
            $info = "Password Reset Instructions Sent To Your Email";
            // && header("refresh:1; url=index.php");
        }
        else
        {
            $err = "Please Try Again Or Try Later";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include("partials/head.php");?>
<body class="form no-image-content">

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                    <h1 class="">LAMCorp Suite- Water Point Module</h1>
                        <p class="signup-link recovery">Select Water point number in order to request for a password reset</p>
                        <form method="post" class="text-left">
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">WATER POINT NUMBER</label>
                                    </div>
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
                                </div>
                                <div id="email-field" class="field-wrapper input" style="display:none">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">TOKEN</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="text" name="token" value="<?php echo $tk;?>" type="text" class="form-control" value="" placeholder="Email">
                                </div>
                                <div id="email-field" class="field-wrapper input" style="display:none">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">STATUS</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="text" name="status" value="0" type="text" class="form-control" value="" placeholder="Email">
                                </div>
                                <div id="email-field" class="field-wrapper input" style="display:none">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">RESET CODE</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="text" name="reset_code" value="<?php echo $rc;?>" type="text" class="form-control" value="" placeholder="Email">
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <a href="index.php" class="forgot-pass-link">Remembered Password?</a>
                                        <button type="submit" name='resetPassword' class="btn btn-primary" value="">Reset</button>
                                    </div>
                                </div>

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