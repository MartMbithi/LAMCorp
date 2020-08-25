<?php
//1. Staffs / Employees
$query = "SELECT COUNT(*) FROM ` Staff ` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($staff);
$stmt->fetch();
$stmt->close();

//2. Water Kiosks
$query = "SELECT COUNT(*) FROM `Water_Kiosk ` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($waterKiosks);
$stmt->fetch();
$stmt->close();

//3.  Sales
$query = "SELECT SUM(Payment_amount) FROM `Payments` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();


//4. Total Expenses
$query = "SELECT  SUM(Expense_amount) FROM `Expenses` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($expenses);
$stmt->fetch();
$stmt->close();