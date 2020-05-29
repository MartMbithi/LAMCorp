<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    
   
    if(isset($_POST['updateProfile']))
    {
            $error = 0;
            if (isset($_POST['a_name']) && !empty($_POST['a_name'])) {
                $a_name=mysqli_real_escape_string($mysqli,trim($_POST['a_name']));
            }else{
                $error = 1;
                $err="Name Cannot Be Empty";
            }
            if (isset($_POST['a_email']) && !empty($_POST['a_email'])) {
                $a_email=mysqli_real_escape_string($mysqli,trim($_POST['a_email']));
            }else{
                $error = 1;
                $err="Email Cannot Be Empty";
            }
            if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
                $old_password=mysqli_real_escape_string($mysqli,trim(sha1(md5($_POST['old_password']))));
            }else{
                $error = 1;
                $err="Old Password Cannot Be Empty";
            }
            if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
                $new_password=mysqli_real_escape_string($mysqli,trim(sha1(md5($_POST['new_password']))));
            }else{
                $error = 1;
                $err="New Password Cannot Be Empty";
            }
            if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
                $confirm_password=mysqli_real_escape_string($mysqli,trim(sha1(md5($_POST['confirm_password']))));
            }else{
                $error = 1;
                $err="Confirmation Password Cannot Be Empty";
            }

            if(!$error)
            {
                $sql="SELECT * FROM  LAMCorp_admin WHERE  a_pwd !='$old_password' ";
                $res=mysqli_query($mysqli,$sql);
                if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($old_password==$row['a_pwd'])
                {
                    $err =  "Please Enter Correct Old Password";
                }
                elseif($confirm_password != $new_password)
                {
                    $err =  "Confirmation Password Does Not Match";
                }            
                else        
                {
                    $err =  "Confirmation Password Does Not Match";
                }
            }

            else
            {
                
                    $a_id = $_SESSION['a_id'];
                    $a_name = $_POST['a_name'];
                    $a_email = $_POST['a_email'];
                    $new_password = sha1(md5($_POST['new_password']));
                    
                    //Insert Captured information to a database table
                    $query="UPDATE LAMCorp_admin SET a_name=?, a_email=?, a_pwd=? WHERE a_id =?";
                    $stmt = $mysqli->prepare($query);
                    //bind paramaters
                    $rc=$stmt->bind_param('sssi', $a_name, $a_email, $new_password, $a_id);
                    $stmt->execute();

                    //declare a varible which will be passed to alert function
                    if($stmt)
                    {
                    $success = "Profile Updated" && header("refresh:1; url=dashboard.php");
                    }
                    else 
                    {
                        $err = "Please Try Again Or Try Later";
                    } 
                }
            }
        }
  
?>
<!DOCTYPE html>
<html lang="en">
<?php include("partials/head.php");?>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include("partials/header.php");?>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <?php
        $a_id = $_SESSION['a_id'];
        $ret="SELECT * FROM  LAMCorp_admin WHERE a_id = ?  "; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $a_id);
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        $cnt=1;
        while($row=$res->fetch_object())
    {
    ?>
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">
                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Update <?php echo $row->a_name;?> Profile</span></li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <!--  BEGIN SIDEBAR  -->
            <?php include("partials/sidebar.php");?>
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="container">
                    <div class="container">
                        <hr>
                        <div class="row">
                            <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Fill all fields</h4>
                                            </div>                                                                        
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form method="post" enctype="multipart/form-data" >
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Name</label>
                                                    <input required type="text" value="<?php echo $row->a_name;?>"  name="a_name"  class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Email</label>
                                                    <input required type="text" value="<?php echo $row->a_email;?>"  name="a_email"   class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Old Password</label>
                                                    <input required type="password"   name="old_password"  class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">New Password</label>
                                                    <input required type="password"   name="new_password"  class="form-control">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword4">Confirm New Password</label>
                                                    <input required type="password"   name="confirm_password"  class="form-control">
                                                </div>
                                            </div>
                                            <button type="submit" name="updateProfile" class="btn btn-primary mt-3">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
                <?php include("partials/footer.php");?>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
    <?php }?>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });

        var ss = $(".basic").select2({
        tags: true,
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
</body>

</html>