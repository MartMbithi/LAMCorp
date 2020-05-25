<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    //include('partials/analytics.php');
    check_login();
    //Generate Staff Password And Staff Number
    $length1 = 3;
    $length2=3;    
    $numericalPayrollNo =  substr(str_shuffle('0123456789'),1,$length1);
    $alphbaeticalPayrollNo = substr(str_shuffle('QWERTYUIOOPLKJHGFDSAZXCVBNM'),1,$length2);
    

    if(isset($_POST['updatePayroll']))
    {
        $payroll_code = $_POST['payroll_code'];
        $pay_record = $_POST['pay_record'];
        $salary = $_POST['salary'];
        $taxation = $_POST['taxation'];
        $comments = $_POST['comments'];
        $payroll_id = $_GET['payroll_id'];
      
    

        //Insert Captured information to a database table
        $query="UPDATE  LAMCorp_payrolls SET  payroll_code = ?, pay_record = ?, salary = ?, taxation = ?, comments = ? WHERE payroll_id =?";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc=$stmt->bind_param('sssssi', $payroll_code, $pay_record, $salary, $taxation, $comments, $payroll_id);
        $stmt->execute();
        //declare a varible which will be passed to alert function
        if($stmt)
        {
            $success = "Payroll Updated" && header("refresh:1; url=manage_payrolls.php");
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
        $payroll_id = $_GET['payroll_id'];
        $ret="SELECT * FROM  LAMCorp_payrolls WHERE payroll_id = ?"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $payroll_id);
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Payrolls</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Update <?php echo $row->staff_name;?> Payroll</span></li>
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
                                                    <input required readonly type="text" value="<?php echo $row->staff_idno;?>" name="staff_idno" class="form-control" id="inputPassword4" placeholder="123456789">
                                                </div>
                                            </div>
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Email</label>
                                                    <input required readonly value="<?php echo $row->staff_email;?>"  type="email" name="staff_email" class="form-control" id="inputEmail4" placeholder="martdevelopers254@gmail.com">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Staff Number</label>
                                                    <input  required readonly type="text" name="staff_num" value="<?php echo $row->staff_number;?>" class="form-control" id="inputPassword4" placeholder="+254737229776">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Payroll Code</label>
                                                <input type="text" readonly required name="payroll_code" value="LAMCorpPayroll-<?php echo $alphbaeticalPayrollNo;?>-<?php echo $numericalPayrollNo;?>" class="form-control" id="inputAddress">
                                            </div>
                                            <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Pay  Record (Pay Month)</label>
                                                        <select  required  name="pay_record"  class="form-control">
                                                            <option>January</option>
                                                            <option>February</option>
                                                            <option>March</option>
                                                            <option>April</option>
                                                            <option>May</option>
                                                            <option>June</option>
                                                            <option>July</option>
                                                            <option>August</option>
                                                            <option>September</option>
                                                            <option>Octomber</option>
                                                            <option>November</option>
                                                            <option>December</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAddress">Salary Per Month</label>
                                                        <input type="text" required  value="<?php echo $row->salary;?> " name="salary"  class="form-control" id="inputAddress" >
                                                    </div>
                                                </div>                                   
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputAddress2">Total Monthly Deductions</label>
                                                    <input type="text" required name="taxation" value=<?php echo $row->taxation;?> class="form-control" id="inputAddress2" >
                                                </div>
                                                
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Comments</label>
                                                <textarea type="text"  name="comments" class="form-control" id="inputAddress" rows="10"><?php echo $row->comments;?></textarea>
                                            </div>

                                        <button type="submit" name="updatePayroll" class="btn btn-primary mt-3">Update Payroll</button>
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
    <?php }?>
    
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