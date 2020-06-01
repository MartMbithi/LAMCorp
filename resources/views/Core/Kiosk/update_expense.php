<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    /*
    $length1 = 5;
    $expenseCode =  substr(str_shuffle('0123456789QWERTYUIOPLKJHGFDSAZXCVBNM'),1,$length1);
   */
    if(isset($_POST['updateExpense']))
    {
        /*
            $error = 0;
            if (isset($_POST['exp_code']) && !empty($_POST['exp_code'])) {
                $exp_code=mysqli_real_escape_string($mysqli,trim($_POST['exp_code']));
            }else{
                $error = 1;
                $err="Expense Code cannot Be Empty";
            }
            if(!$error)
            {
                $sql="SELECT * FROM  LAMCorp_expenses WHERE  exp_code='$exp_code' ";
                $res=mysqli_query($mysqli,$sql);
                if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($exp_code==$row['exp_code'])
                {
                    $err =  "Expense Code Exists";
                }
                else
                {
                    $err =  "Expense Code Exists";
                }
            }
            else
            {
        */
                $exp_type = $_POST['exp_type'];
                $exp_id = $_GET['exp_id'];
                //$exp_from = $_POST['exp_from'];
                //$exp_to = $_POST['exp_to'];
                $exp_amt = $_POST['exp_amt'];
                $exp_desc = $_POST['exp_desc'];
                //Insert Captured information to a database table
                $query="UPDATE LAMCorp_expenses SET exp_type=?, exp_amt=?, exp_desc=? WHERE exp_id=?";
                $stmt = $mysqli->prepare($query);
                //bind paramaters
                $rc=$stmt->bind_param('sssi', $exp_type, $exp_amt, $exp_desc, $exp_id);
                $stmt->execute();
                //declare a varible which will be passed to alert function
                if($stmt)
                {
                 $success = "Expense Updated" && header("refresh:1; url=manage_expenses.php");
                }
                else 
                {
                    $err = "Please Try Again Or Try Later";
                } 
            }
        //}    
            
    //}
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
        $exp_id = $_GET['exp_id'];
        $ret="SELECT * FROM  LAMCorp_expenses WHERE exp_id = ? "; 
        $stmt= $mysqli->prepare($ret);
        $stmt->bind_param('i', $exp_id);
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Expenses</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Expense</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Update <?php echo $row->exp_code;?></span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <?php }?>
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
                                                <label for="inputPassword4">Expense Type</label>
                                                <select name="exp_type" class="form-control  basic">
                                                    <option selected="selected">Select Expense Type</option>
                                                    <option>Staff Benefits</option>
                                                    <option>Water Points Expenes</option>
                                                </select>
                                            </div>
                                            <?php
                                                $exp_id = $_GET['exp_id'];
                                                $ret="SELECT * FROM  LAMCorp_expenses WHERE exp_id = ? "; 
                                                $stmt= $mysqli->prepare($ret);
                                                $stmt->bind_param('i', $exp_id);
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Expense Code</label>
                                                <input required type="text"  name="exp_code" readonly value="<?php echo $row->exp_code;?>"  class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Expense Amount</label>
                                                <input required type="text"  name="exp_amt" value="<?php echo $row->exp_amt;?>"  class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Expense Description | Comments</label>
                                                <textarea  type="text" rows="10"  name="exp_desc"  class="form-control"><?php echo $row->exp_desc;?></textarea>
                                            </div>
                                            <?php }?>
                                            
                                        </div>
                                      <button type="submit" name="updateExpense" class="btn btn-primary mt-3">Save</button>
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