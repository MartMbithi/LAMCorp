<?php
//1. Staffs / Employees
$query = "SELECT COUNT(*) FROM `cfms_staffs` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($staff);
$stmt->fetch();
$stmt->close();

//2. Chicken Breeds
$query = "SELECT COUNT(*) FROM `cfms_chicken_breeds` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($breeds);
$stmt->fetch();
$stmt->close();

//3.  Poulty Farms
$query = "SELECT COUNT(*) FROM `cfms_chicken_farm` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($farms);
$stmt->fetch();
$stmt->close();


//4. Total Sales
$query = "SELECT  SUM(sale_amt) FROM `cfms_sales` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();