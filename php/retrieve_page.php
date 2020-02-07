<?php
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LfQws8UAAAAAGJ3xlhBZ_q-usUZZ26pTuMGuCHc';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
            $succMsg = 'Your contact request have submitted successfully.';
        }
        else
        {
            die("Robot verification failed, please try again.");
        }
   }else{
    die("Failed to attempt reCAPTCHA. Please try again.");
   }

$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');


if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}


$pagename = filter_var($_POST['pagename'], FILTER_SANITIZE_STRING);

if (!filter_var($_POST['pagemail'], FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format.";
  die($emailErr);
}

$pagemail = filter_var($_POST['pagemail'], FILTER_VALIDATE_EMAIL);


$query = "SELECT * FROM MyPages WHERE uname = '$pagename' AND email='$pagemail'";

$result = $link->query($query);
$row = $result->fetch_assoc();

$id = $row['id'];

//echo $hashedid;

$link->close()
?>


<head>
  <meta http-equiv="refresh" content="0; URL=http://tracker.taliesindemestre.com/fetch_page.php?pageid=<?php echo $id; ?>" />
</head>
