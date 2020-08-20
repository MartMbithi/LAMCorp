<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    //Generate Staff Password And Staff Number
    $length1 = 3;
    $length2=3; 
    $length3=5;   
    $numericalwaterpointNo =  substr(str_shuffle('0123456789'),1,$length1);
    $alphbaeticalwaterpointNo = substr(str_shuffle('QWERTYUIOOPLKJHGFDSAZXCVBNM'),1,$length2);
    $pas=substr(str_shuffle('QWERTYUIOOPLKJHGFDSAZXCVBNM'),1,$length3);

    
    if(isset($_POST['addWaterKiosk']))
    {
        
            $error = 0;
            if (isset($_POST['wp_number']) && !empty($_POST['wp_number'])) {
                $wp_number=mysqli_real_escape_string($mysqli,trim($_POST['wp_number']));
            }else{
                $error = 1;
                $err="Water Point Number Cannot be empty.";
            }
            if (isset($_POST['wp_location']) && !empty($_POST['wp_location'])) {
                $wp_location=mysqli_real_escape_string($mysqli,trim($_POST['wp_location']));
            }else{
                $error =1;
                $err="Water point location  cannot be empty.";
            }

            if(!$error)
            {
                $sql="SELECT * FROM  LAMCorp_waterPoints WHERE  wp_number='$wp_number' ";
                $res=mysqli_query($mysqli,$sql);
                if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($wp_number==$row['wp_number'])
                {
                    $err =  "Water Point With That Number Exists";
                }
                else
                {
                    $err =  "Water Point With That Number Exists";
                }
            }
            else
            {
        
                $wp_number = $_POST['wp_number'];
                $wp_location = $_POST['wp_location'];
                $wp_opening_hrs = $_POST['wp_opening_hrs'];
                $wp_closing_hrs = $_POST['wp_closing_hrs'];
                $wp_staff_on_duty  = $_POST['wp_staff_on_duty'];
                $wp_status = $_POST['wp_status'];
                $wp_phone = $_POST['wp_phone'];
                $wp_pass = sha1(md5($_POST['wp_pass']));
                //Insert Captured information to a database table
                $query="INSERT INTO LAMCorp_waterPoints (wp_phone, wp_location, wp_opening_hrs, wp_closing_hrs, wp_staff_on_duty, wp_status, wp_number, wp_pass) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = $mysqli->prepare($query);
                //bind paramaters
                $rc=$stmt->bind_param('ssssssss', $wp_phone, $wp_location, $wp_opening_hrs, $wp_closing_hrs, $wp_staff_on_duty, $wp_status, $wp_number, $wp_pass);
                $stmt->execute();

                //declare a varible which will be passed to alert function
                if($stmt)
                {
                 $success = "Water Point Added" && header("refresh:1; url=add_waterpoints.php");
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Water Points</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Water Points</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Add Water Point</span></li>
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
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Water Point | Kiosk Number</label>
                                                    <input required type="text" readonly name="wp_number" value="LAMCorp-<?php echo $alphbaeticalwaterpointNo;?>-<?php echo $numericalwaterpointNo;?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Water Point | Kiosk Account Password</label>
                                                    <input required type="text" readonly name="wp_pass" value="<?php echo $pas;?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Water Point | Kiosk Phone Number</label>
                                                    <input required type="text"   name="wp_phone"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Water Point | Kiosk Location</label>
                                                <textarea type="text" required name="wp_location" class="form-control" rows="5" ></textarea>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Water Point | Kiosk Opening  Hours</label>
                                                    <input required type="time"  name="wp_opening_hrs"   class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Water Point | Kiosk Closing Hours</label>
                                                    <input required type="time"  name="wp_closing_hrs"   class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Water Point | Kiosk Pipes Operational Status</label>
                                                    <select name="wp_status" class="form-control  basic">
                                                        <option selected="selected">Operational</option>
                                                        <option>Faulty</option>
                                                        <option>Under Repair</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Water Point | Staff On Duty</label>
                                                    <select name="wp_staff_on_duty" class="form-control  basic">
                                                        <option selected="selected">Select Staff Name | Staff NUmber</option>
                                                        <?php
                                                            //get details of all staffs
                                                            $ret="SELECT * FROM  LAMCorp_staffs "; 
                                                            $stmt= $mysqli->prepare($ret) ;
                                                            $stmt->execute() ;//ok
                                                            $res=$stmt->get_result();
                                                            $cnt=1;
                                                            while($row=$res->fetch_object())
                                                            {
                                                        ?>
                                                            <option value="<?php echo $row->staff_name;?> <?php echo $row->staff_num;?>"><?php echo $row->staff_name;?> <?php echo $row->staff_num;?></option>
                                                        <?php }?>
                                                </select>
                                                </div>
                                            </div>
                                        <button type="submit" name="addWaterKiosk" class="btn btn-primary mt-3">Add Water Point Details</button>
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