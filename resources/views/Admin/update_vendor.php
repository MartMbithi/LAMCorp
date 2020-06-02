<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    //Generate Staff Password And Staff Number
    $length1 = 3;
    $length2=3;    
    $numericalVendorNo =  substr(str_shuffle('0123456789'),1,$length1);
    $alphbaeticalVendorNo = substr(str_shuffle('QWERTYUIOOPLKJHGFDSAZXCVBNM'),1,$length2);
    
    if(isset($_POST['updateVendor']))
    {
    
        $v_name = $_POST['v_name'];
        $vendor_number = $_GET['vendor_number'];
        $v_pobox = $_POST['v_pobox'];
        $v_location = $_POST['v_location'];
        $v_email  = $_POST['v_email'];
        $v_phoneno =$_POST['v_phoneno'];
        $v_icon = $_FILES["v_icon"]["name"];
        move_uploaded_file($_FILES["v_icon"]["tmp_name"],"assets/img/vendor/".$_FILES["v_icon"]["name"]);
        $v_items = $_POST['v_items'];

        //Insert Captured information to a database table
        $query="UPDATE LAMCorp_vendors SET v_name=?, v_pobox=?, v_location=?, v_email=?, v_phoneno=?, v_icon=?, v_items=? WHERE v_number=? ";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc=$stmt->bind_param('ssssssss', $v_name, $v_pobox, $v_location, $v_email, $v_phoneno, $v_icon, $v_items, $vendor_number);
        $stmt->execute();

        //declare a varible which will be passed to alert function
        if($stmt)
        {
            $success = "Vendor Details Updated" && header("refresh:1; url=manage_vendor.php");
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

    <!--  BEGIN NAVBAR  -->
    <?php 
        $vendor_number = $_GET['vendor_number'];
        $ret="SELECT * FROM  LAMCorp_vendors WHERE v_number = ?"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('s', $vendor_number);
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Vendors</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Vendors</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Update <?php echo $row->v_name;?></span></li>
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
                                                    <label for="inputEmail4">Vendor Name</label>
                                                    <input required type="text" value="<?php echo $row->v_name;?>" name="v_name" class="form-control" id="inputEmail4" placeholder="John Doe">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Vedor Number</label>
                                                    <input required type="text" readonly name="v_number" value="<?php echo $row->v_number;?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState">Vendor Logo | Profile Picture</label>
                                                    <input type="file" required class="form-control" value="<?php echo $row->v_icon;?>" name="v_icon" id="inputZip">
                                                </div>
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                    <input required  type="email" value="<?php echo $row->v_email;?>" name="v_email" class="form-control" id="inputEmail4" placeholder="martdevelopers254@gmail.com">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Phone Number</label>
                                                    <input  required type="text" value="<?php echo $row->v_phoneno;?>" name="v_phoneno" class="form-control" id="inputPassword4" placeholder="+254737229776">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Address | Location</label>
                                                <textarea type="text" required name="v_location" class="form-control" rows="5" ><?php echo $row->v_location;?></textarea>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Vendor Postal Address</label>
                                                <textarea type="text" required name="v_pobox" class="form-control" rows="5" ><?php echo $row->v_pobox;?></textarea>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Products | Items | Goods | Equipments Offered</label>
                                                <textarea type="text" required name="v_items" class="form-control" rows="10" ><?php echo $row->v_items;?></textarea>
                                            </div>                                        
                                        <button type="submit" name="updateVendor" class="btn btn-primary mt-3">Update <?php echo $row->v_name;?></button>
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