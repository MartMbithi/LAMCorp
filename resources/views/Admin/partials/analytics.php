<?php
//Handle all computational logic here

    //1.Total Incomes
    $query ="SELECT SUM(amount) FROM LAMCorp_payments";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($incomes);
    $stmt->fetch();
    $stmt->close();

//================================Salary Expenses================================================//
    /*
        2.Total Expenses
        2.1 Get Salaries
    */
    $query ="SELECT SUM(salary) FROM LAMCorp_payrolls";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($salary);
    $stmt->fetch();
    $stmt->close();
    /*
        2.Total Expenses
        2.2 Get Deductions
    */
    $query ="SELECT SUM(taxation) FROM LAMCorp_payrolls";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($deductions);
    $stmt->fetch();
    $stmt->close();
    /*
        2.Total Expenses
        2.3 Get Allowances
    */
    $query ="SELECT SUM(alw) FROM LAMCorp_payrolls";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($alw);
    $stmt->fetch();
    $stmt->close();

    /*
        2.2 Get Bills Expenses
    */

    $query ="SELECT SUM(exp_amt) FROM LAMCorp_expenses WHERE kiosk_number !=''  ";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($expenses);
    $stmt->fetch();
    $stmt->close();



    //Compute The Net Salary Expenses
    $CumulativeSal = $salary + $alw;
    $netSalary = $CumulativeSal - $deductions;
    $total_expenses = $netSalary+$expenses;
    //====================================================================================//

//3.Total Profit
    //4.Staffs
    $query ="SELECT count(*) FROM LAMCorp_staffs";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($staffs);
    $stmt->fetch();
    $stmt->close();

    //5.Vendors
    $query ="SELECT count(*) FROM LAMCorp_vendors";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($vendors);
    $stmt->fetch();
    $stmt->close();

    //6.Water Points
    $query ="SELECT count(*) FROM LAMCorp_waterPoints";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($waterPoints);
    $stmt->fetch();
    $stmt->close();




//============Profit or loss computations=====================================//
$profit = $incomes - $total_expenses;
$loss =  $incomes - $total_expenses;
$absoluteLoss = abs($loss);
//determine to show a loss or expense
if($incomes > $total_expenses)
{
    $status = 
    "
    <div class='col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing'>
        <div class='widget widget-card-four'>
            <div class='widget-content'>
                <div class='w-content'>
                    <div class='w-info'>
                        <h6 class='value'>KSh $profit</h6>
                        <p class='text-success'>Total Profit</p>
                    </div>
                    <div class=''>
                        <div class='w-icon text-success'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-heart'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg></p>
                        </div>
                    </div>
                </div>
                <!--<div class='progress'>
                    <div class='progress-bar bg-gradient-secondary' role='progressbar' style='width: 57%' aria-valuenow='57' aria-valuemin='0' aria-valuemax='100'></div>
                </div>-->
            </div>
        </div>
    </div>
    ";
}
else
{
    $status =
    "
    <div class='col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing'>
        <div class='widget widget-card-four'>
            <div class='widget-content'>
                <div class='w-content'>
                    <div class='w-info'>
                        <h6 class='value'>KSh $absoluteLoss</h6>
                        <p class='text-danger'>Total Loss</p>
                    </div>
                    <div class=''>
                        <div class='w-icon text-danger'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-heart'><path d='M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z'></path></svg></p>
                        </div>
                    </div>
                </div>
                <!--<div class='progress'>
                    <div class='progress-bar bg-gradient-secondary' role='progressbar' style='width: 57%' aria-valuenow='57' aria-valuemin='0' aria-valuemax='100'></div>
                </div>-->
            </div>
        </div>
    </div>
    ";
}
/*
Cash Flow Computations
1.Get All Till Numbers
2.Get Sum Payment Per Till Numbers
*/
    //Get MPESA Till number
    $saf="SELECT * FROM  LAMCorp_tills WHERE  till_service_provider = 'Safaricom' ";
    $safstmt= $mysqli->prepare($saf);
    $safstmt->execute();
    $safres=$safstmt->get_result();
    while($row=$safres->fetch_object())
    {
        $Safaricom = $row->till_number;
    }

    //Get Airtel Money Till Number
    $airtel="SELECT * FROM  LAMCorp_tills WHERE  till_service_provider = 'Airtel'";
    $airtelstmt = $mysqli->prepare($airtel);
    $airtelstmt->execute();
    $airtelres=$airtelstmt->get_result();
    while($row=$airtelres->fetch_object())
    {
        $Airtel = $row->till_number;
    }

    //Get TKash till number
    $telkom="SELECT * FROM  LAMCorp_tills WHERE  till_service_provider = 'Telkom'";
    $telkomstmt = $mysqli->prepare($telkom);
    $telkomstmt->execute();
    $telkomres=$telkomstmt->get_result();
    while($row=$telkomres->fetch_object())
    {
        $Telkom = $row->till_number;
    }

    //Get amount paid under mpesa
    $query ="SELECT SUM(amount) FROM LAMCorp_payments WHERE till_number = '$Safaricom'";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($SafPayments);
    $stmt->fetch();
    $stmt->close();

    //Get amount  paid under airtel money
    $query ="SELECT SUM(amount) FROM LAMCorp_payments WHERE till_number = '$Airtel'";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($AirtelPayments);
    $stmt->fetch();
    $stmt->close();

    //Get amount paid under tkash
    $query ="SELECT SUM(amount) FROM LAMCorp_payments WHERE till_number = '$Telkom'";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($TelkomPayments);
    $stmt->fetch();
    $stmt->close();

/*
Expenditure and Incomes
*/











    




  
?>