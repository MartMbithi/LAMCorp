<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    //Generate Staff Password And Staff Number
    $length1 = 3;
    $length2=3;    
    $numericaltariffNo =  substr(str_shuffle('0123456789'),1,$length1);
    $alphbaeticaltariffNo = substr(str_shuffle('QWERTYUIOOPLKJHGFDSAZXCVBNM'),1,$length2);
    
    if(isset($_POST['addTariff']))
    {
            $error = 0;
            if (isset($_POST['t_code']) && !empty($_POST['t_code'])) {
                $t_code=mysqli_real_escape_string($mysqli,trim($_POST['t_code']));
            }else{
                $error = 1;
                $err="Tariff code Cannot be empty.";
            }
            if (isset($_POST['t_name']) && !empty($_POST['t_name'])) {
                $t_name=mysqli_real_escape_string($mysqli,trim($_POST['t_name']));
            }else{
                $error =1;
                $err="Tariff Name Cannot be empty.";
            }

            if(!$error)
            {
                $sql="SELECT * FROM  LAMCorp_waterTariffs WHERE  t_code='$t_code' ";
                $res=mysqli_query($mysqli,$sql);
                if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($t_code==$row['t_code'])
                {
                    $err =  "Tariff Code Exists";
                }
                else
                {
                    $err =  "Tariff Code Exists";
                }
            }
            else
            {
                $t_code = $_POST['t_code'];
                $t_name = $_POST['t_name'];
                $cost_per_litre = $_POST['cost_per_litre'];
                
                //Insert Captured information to a database table
                $query="INSERT INTO LAMCorp_waterTariffs (t_code, t_name, cost_per_litre) VALUES (?,?,?)";
                $stmt = $mysqli->prepare($query);
                //bind paramaters
                $rc=$stmt->bind_param('sss', $t_code, $t_name, $cost_per_litre);
                $stmt->execute();

                //declare a varible which will be passed to alert function
                if($stmt)
                {
                 $success = "Water Tariff Added " && header("refresh:1; url=add_watertariff.php");
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Water Tariffs</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Add Water Tariff</span></li>
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
                                                <label for="inputPassword4">Tariff Code</label>
                                                <input required type="text" readonly name="t_code" value="LAMCorp-<?php echo $alphbaeticaltariffNo;?>-<?php echo $numericaltariffNo;?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Tariff Name</label>
                                                <input required type="text"  name="t_name"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="inputAddress">Tariff Water Price Per Litre in Ksh</label>
                                            <textarea type="text" required name="cost_per_litre" class="form-control" rows="5" ></textarea>
                                        </div>
                                      <button type="submit" name="addTariff" class="btn btn-primary mt-3">Add Water Tariff Details</button>
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