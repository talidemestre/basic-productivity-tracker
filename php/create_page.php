<?php
$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');


if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
echo "Connected successfully";



$sql = "INSERT INTO MyPages (uname, email, prod_days_sql, unprod_days_sql, submitted_day, last_prod)
VALUES ('$_POST[pagename]', '$_POST[pagemail]', 0, 0, 0, 0)";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$query = "SELECT * FROM MyPages WHERE uname = '".($_POST[pagename])."' AND email='".($_POST[pagemail])."'";

$result = $link->query($query);
$row = $result->fetch_assoc();

$pageid = $row['id'];


$link->close()
?>

<head>
  <meta http-equiv="refresh" content="0; URL=http://tracker.taliesindemestre.com/fetch_page.php?pageid=<?php echo $pageid; ?>" />
</head>
