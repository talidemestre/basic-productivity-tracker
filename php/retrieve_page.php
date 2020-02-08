<?php
$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');


if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$genhash = $_POST[pagename].$_POST[pagemail].$_POST[password];

$namehash = substr(md5($genhash), 5, 12);



$pagename = filter_var($_POST['pagename'], FILTER_SANITIZE_STRING);

if (!filter_var($_POST['pagemail'], FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format.";
  die($emailErr);
}

$pagemail = filter_var($_POST['pagemail'], FILTER_VALIDATE_EMAIL);


$query = "SELECT * FROM MyPages WHERE uname = '$pagename' AND email='$pagemail'";

$result = $link->query($query);
$row = $result->fetch_assoc();

$pageid = $row['accessid'];

$hashedid = $namehash.$pageid;

//echo $hashedid;

$link->close()
?>


<head>
  <meta http-equiv="refresh" content="0; URL=http://tracker.taliesindemestre.com/fetch_page.php?pageid=<?php echo $hashedid; ?>" />
</head>
