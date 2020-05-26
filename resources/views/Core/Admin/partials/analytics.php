<?php
//Handle all computational logic here

//1.Total Incomes

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

    //Compute The Net Salary Expenses
    $CumulativeSal = $salary + $alw;
    $netSalary = $CumulativeSal - $deductions;
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

//Cash Flow Computations
  
?>