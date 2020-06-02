<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    /*
    $length1 = 3;
    $length2=3;    
    $numericaltariffNo =  substr(str_shuffle('0123456789'),1,$length1);
    $alphbaeticaltariffNo = substr(str_shuffle('QWERTYUIOOPLKJHGFDSAZXCVBNM'),1,$length2);
    */
    
    if(isset($_POST['updateTillNo']))
    {
        /*
            $error = 0;
            if (isset($_POST['till_number']) && !empty($_POST['till_number'])) {
                $till_number=mysqli_real_escape_string($mysqli,trim($_POST['till_number']));
            }else{
                $error = 1;
                $err="Till number cannot be empty";
            }
            if(!$error)
            {
                $sql="SELECT * FROM  LAMCorp_tills WHERE  till_number='$till_number' ";
                $res=mysqli_query($mysqli,$sql);
                if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($till_number==$row['till_number'])
                {
                    $err =  "Till Number Exists";
                }
                else
                {
                    $err =  "Till Number Exists";
                }
            }
            else
            {
        */
                $till_service_provider = $_POST['till_service_provider'];
                $till_number = $_POST['till_number'];
                $till_id = $_GET['till_id'];
               
                //Insert Captured information to a database table
                $query="UPDATE LAMCorp_tills SET till_service_provider =? , till_number =? WHERE till_id = ?";
                $stmt = $mysqli->prepare($query);
                //bind paramaters
                $rc=$stmt->bind_param('ssi', $till_service_provider, $till_number, $till_id);
                $stmt->execute();

                //declare a varible which will be passed to alert function
                if($stmt)
                {
                 $success = "Till Number Updated" && header("refresh:1; url=manage_tillnumbers.php");
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
        $till_id = $_GET['till_id'];
        $ret="SELECT * FROM  LAMCorp_tills WHERE till_id =? "; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $till_id);
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Payments</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Till Numbers</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Update <?php echo $row->till_number;?></span></li>
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
                                                <label for="inputAddress">Till Number Service Provider</label>
                                                <select value="<?php echo $row->till_service_provider;?>" name="till_service_provider" class="form-control  basic">
                                                    <option selected="selected">Safaricom</option>
                                                    <option>Airtel</option>
                                                    <option>Telkom</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Till Number</label>
                                                <input required type="text" value="<?php echo $row->till_number;?>"  name="till_number"  class="form-control">
                                            </div>
                                        </div>
                                      <button type="submit" name="updateTillNo" class="btn btn-primary mt-3">Update Till Number</button>
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