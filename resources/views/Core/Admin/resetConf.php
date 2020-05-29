<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    
    if(isset($_POST['changePassword']))
    {
           
        $email = $_GET['email'];
        $reset_code = sha1(md5($_GET['reset_code']));
        $status = $_GET['status'];
        $reset_id =$_GET['reset_id'];
        //Insert Captured information to a database table
        $query="UPDATE LAMCorp_staffs  SET staff_pwd=? WHERE staff_email=?";
        $stats = "UPDATE LAMCorp_passwordresets SET status=? WHERE reset_id=?";
        $stmt = $mysqli->prepare($query);
        $stmt1= $mysqli->prepare($stats);
        //bind paramaters
        $rc=$stmt->bind_param('ss', $reset_code, $email);
        $rc=$stmt1->bind_param('si', $status, $reset_id);
        $stmt->execute();
        $stmt1->execute();

        //declare a varible which will be passed to alert function
        if($stmt && $stmt1)
        {
            $success = "Password Updated" && header("refresh:1; url=reset.php");
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
<body data-spy="scroll" data-target="#navSection" data-offset="100">
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include("partials/header.php");?>
    </div>
    <!--  END NAVBAR  -->
    <?php
        $email = $_GET['email'];
        $ret="SELECT * FROM  LAMCorp_staffs WHERE staff_email = ?"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('s', $email);
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        $cnt=1;
        while($row=$res->fetch_object())
        {
    ?>
        <!--  BEGIN NAVBAR  -->
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">

                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Password Resets</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Update <?php echo $row->staff_name;?> Password</span></li>
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
                                                    <label for="inputEmail4">Full Names</label>
                                                    <input required readonly type="text" value="<?php echo $row->staff_name;?>" name="staff_name" class="form-control" id="inputEmail4" placeholder="John Doe">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">National ID Number</label>
                                                    <input required  readonly type="text" value="<?php echo $row->staff_idno;?>" name="staff_idno" class="form-control" id="inputPassword4" placeholder="123456789">
                                                </div>
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">Email</label>
                                                    <input required readonly  value="<?php echo $row->staff_email;?>" type="email" name="staff_email" class="form-control" id="inputEmail4" placeholder="martdevelopers254@gmail.com">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Phone Number</label>
                                                    <input  required type="text" readonly value="<?php echo $row->staff_phoneno;?>" name="staff_phoneno" class="form-control" id="inputPassword4" placeholder="+254737229776">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress">Staff Number</label>
                                                    <input type="text" required readonly name="staff_num" value="<?php echo $row->staff_num;?>" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                </div>
                                            </div>                                            
                                        <button type="submit" name="changePassword" class="btn btn-outline-success mt-3">Update <?php echo $row->staff_name;?> Password</button>
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
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
</body>

</html>

