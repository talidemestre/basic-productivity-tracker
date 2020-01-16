<?php
$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');

echo 'Hello ' . htmlspecialchars($_GET["pagename"]) . '! ';

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
echo "Connected successfully";



$sql = "INSERT INTO MyPages (uname, email, prod_days_sql, unprod_days_sql, submitted_today, submitted_prod_today, submitted_unprod_today)
VALUES ($_GET["pagename"], $_GET["pagemail"], 0, 0, 0, 0, 0)";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}


$link->close()
?>
