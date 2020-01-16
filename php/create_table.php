<?php
$servername = "localhost";
$username = "admin_access";
$password = "F7JC8U^IH&h6vteoAfL";

$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');

// sql to create table
$sql = "CREATE TABLE MyPages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
uname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
prod_days_sql INT(6),
unprod_days_sql INT(6),
submitted_today BOOLEAN,
submitted_prod_today BOOLEAN,
submitted_unprod_today BOOLEAN,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if (!mysqli_query($link, $sql)) {
  echo 'Error creating new contact table: ' . mysqli_error($link);
  exit();
}

echo 'Contact table successfully created.';
?>
