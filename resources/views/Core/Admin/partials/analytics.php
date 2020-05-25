<?php
//Handle all computational logic here

//1.Total Incomes
//2.Total Expenses
//3.Total Profit
    //4.Staffs
    $query ="SELECT count(*) FROM LAMCorp_staffs";
    $stmt = $mysqli->prepare($query);
    $stmt ->execute();
    $stmt->bind_result($staffs);
    $stmt->fetch();
    $stmt->close();
//5.Vendors
//6.Water Points

//Cash Flow Computations
  
?>