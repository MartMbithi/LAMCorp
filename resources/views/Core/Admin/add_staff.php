<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    //Generate Staff Password And Staff Number
    $length1 = 3;
    $length2=3;    
    $numericalStaffNo =  substr(str_shuffle('0123456789'),1,$length1);
    $alphbaeticalStaffNo = substr(str_shuffle('QWERTYUIOOPLKJHGFDSAZXCVBNM'),1,$length2);
    $ln = 6;
    $pass = substr(str_shuffle('0123456789QWERTYUIOPLKJHGFDSAZXCVBNM'),1,$ln);


    if(isset($_POST['addStaff']))
    {
            $error = 0;
            if (isset($_POST['staff_name']) && !empty($_POST['staff_name'])) {
                $staff_name=mysqli_real_escape_string($mysqli,trim($_POST['staff_name']));
            }else{
                $error = 1;
                $err="Staff Name Cannot be empty.";
            }
            if (isset($_POST['staff_email']) && !empty($_POST['staff_email'])) {
                $email=mysqli_real_escape_string($mysqli,trim($_POST['staff_email']));
            }else{
                $error =1;
                $err="Email cannot be empty.";
            }

            if (isset($_POST['staff_idno']) && !empty($_POST['staff_idno'])) {
                $staff_idno=mysqli_real_escape_string($mysqli,trim($_POST['staff_idno']));
            }else{
                $error = 1;
                $err="National ID Number cannot be empty";
            }
            
            if(!$error)
            {
                $sql="SELECT * FROM  LAMCorp_staffs WHERE  staff_email='$email' || staff_idno='$staff_idno' ";
                $res=mysqli_query($mysqli,$sql);
                if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($staff_idno==$row['staff_idno'])
                {
                    $err =  "National ID Number Exists";
                }
                else
                {
                    $err =  "Email already exists";
                }
            }
            else
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
                $staff_num  = $_POST['staff_num'];
                $staff_icon = $_FILES["staff_icon"]["name"];
                move_uploaded_file($_FILES["staff_icon"]["tmp_name"],"assets/img/staff/".$_FILES["staff_icon"]["name"]);
                $staff_bio = $_POST['staff_bio'];


                //Insert Captured information to a database table
                $query="INSERT INTO LAMCorp_staffs (staff_name, staff_bio, staff_idno, staff_email, staff_phoneno, staff_adr, staff_dob, staff_pwd, allow_login, staff_num, staff_icon) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $mysqli->prepare($query);
                //bind paramaters
                $rc=$stmt->bind_param('sssssssssss',$staff_name, $staff_bio, $staff_idno, $staff_email, $staff_phoneno, $staff_adr, $staff_dob, $staff_pwd, $allow_login, $staff_num, $staff_icon);
                $stmt->execute();

                //declare a varible which will be passed to alert function
                if($stmt)
                {
                 $success = "Staff Details Added" && header("refresh:1; url=add_staff.php");
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Add Staff</span></li>
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
                                                <input required type="text" name="staff_name" class="form-control" id="inputEmail4" placeholder="John Doe">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">National ID Number</label>
                                                <input required type="text" name="staff_idno" class="form-control" id="inputPassword4" placeholder="123456789">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Email</label>
                                                <input required  type="email" name="staff_email" class="form-control" id="inputEmail4" placeholder="martdevelopers254@gmail.com">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Phone Number</label>
                                                <input  required type="text" name="staff_phoneno" class="form-control" id="inputPassword4" placeholder="+254737229776">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" required name="staff_adr" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Staff Number</label>
                                                    <input type="text" required readonly name="staff_num" value="LAMCorp-<?php echo $alphbaeticalStaffNo;?>-<?php echo $numericalStaffNo;?>" class="form-control" id="inputAddress" placeholder="1234 Main St">
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
                                                <input type="text" required name="staff_dob" class="form-control" id="inputAddress2" placeholder="DD-MM-YYYY">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Passport</label>
                                                <input type="file" class="form-control" name="staff_icon" id="inputZip">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Password</label>
                                                <input type="text" required readonly value="<?php echo $pass;?>" name="staff_pwd" class="form-control" id="inputZip">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="inputAddress">Staff Biography</label>
                                            <textarea type="text" required name="staff_bio" class="form-control" id="inputAddress" rows="10"></textarea>
                                        </div>

                                      <button type="submit" name="addStaff" class="btn btn-primary mt-3">Add Staff</button>
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