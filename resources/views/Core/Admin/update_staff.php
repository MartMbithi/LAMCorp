<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    //Generate Staff Password And Staff Number
    
    $ln = 6;
    $pass = substr(str_shuffle('0123456789QWERTYUIOPLKJHGFDSAZXCVBNM'),1,$ln);

    if(isset($_POST['updateStaff']))
    {
           
        $staff_name = $_POST['staff_name'];
        $staff_idno = $_POST['staff_idno'];
        $staff_email = $_POST['staff_email'];
        $staff_phoneno = $_POST['staff_phoneno'];
        $staff_adr  = $_POST['staff_adr'];
        $staff_dob =$_POST['staff_dob'];
        $staff_pwd= sha1(md5($_POST['staff_pwd']));
        //$staff_icon
        $allow_login = $_POST['allow_login'];
        $staff_number  = $_GET['staff_number'];
        $staff_icon = $_FILES["staff_icon"]["name"];
        move_uploaded_file($_FILES["staff_icon"]["tmp_name"],"assets/img/staff/".$_FILES["staff_icon"]["name"]);
        $staff_bio = $_POST['staff_bio'];


        //Insert Captured information to a database table
        $query="UPDATE LAMCorp_staffs  SET staff_name=?, staff_bio=?, staff_idno=?, staff_email=?, staff_phoneno=?, staff_adr=?, staff_dob=?, staff_pwd=?, allow_login=?, staff_icon=? WHERE staff_num=?";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc=$stmt->bind_param('sssssssssss',$staff_name, $staff_bio, $staff_idno, $staff_email, $staff_phoneno, $staff_adr, $staff_dob, $staff_pwd, $allow_login, $staff_icon, $staff_number);
        $stmt->execute();

        //declare a varible which will be passed to alert function
        if($stmt)
        {
            $success = "Staff Details Updated" && header("refresh:1; url=manage_staff.php");
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
        $staff_number = $_GET['staff_number'];
        $ret="SELECT * FROM  LAMCorp_staffs WHERE staff_num = ?"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('s', $staff_number);
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">HRM</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Staff</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Update <?php echo $row->staff_name;?></span></li>
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
                                                    <input required type="text" value="<?php echo $row->staff_name;?>" name="staff_name" class="form-control" id="inputEmail4" placeholder="John Doe">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">National ID Number</label>
                                                    <input required type="text" value="<?php echo $row->staff_idno;?>" name="staff_idno" class="form-control" id="inputPassword4" placeholder="123456789">
                                                </div>
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                    <input required  value="<?php echo $row->staff_email;?>" type="email" name="staff_email" class="form-control" id="inputEmail4" placeholder="martdevelopers254@gmail.com">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Phone Number</label>
                                                    <input  required type="text" value="<?php echo $row->staff_phoneno;?>" name="staff_phoneno" class="form-control" id="inputPassword4" placeholder="+254737229776">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Address</label>
                                                <input type="text" value="<?php echo $row->staff_adr;?>" required name="staff_adr" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Staff Number</label>
                                                    <input type="text" required readonly name="staff_num" value="<?php echo $row->staff_num;?>" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Allow Login?</label>
                                                    <select name="allow_login" class="form-control  basic">
                                                    <option value="0" selected="selected">Yes</option>
                                                        <option value="1">No</option>
                                                    </select> 
                                                </div> 
                                            </div>                                   
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">D.O.B</label>
                                                    <input type="text" required name="staff_dob" value="<?php echo $row->staff_dob;?>" class="form-control" id="inputAddress2" placeholder="DD-MM-YYYY">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState">Passport</label>
                                                    <input type="file" class="form-control" value="<?php echo $row->staff_icon;?>" name="staff_icon" id="inputZip">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState">Password</label>
                                                    <input type="text" required readonly value="<?php echo $pass;?>" name="staff_pwd" class="form-control" id="inputZip">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Staff Biography</label>
                                                <textarea type="text" required name="staff_bio" class="form-control" id="inputAddress" rows="10"><?php echo $row->staff_bio;?></textarea>
                                            </div>

                                        <button type="submit" name="updateStaff" class="btn btn-outline-success mt-3">Update <?php echo $row->staff_name;?> Profile</button>
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