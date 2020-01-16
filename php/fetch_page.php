<?php
$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');

echo $_GET['pageid'];

$targetid = $_GET['pageid'];

$query = "SELECT * FROM MyPages WHERE id = '".($targetid)."'";

$result = $link->query($query);
$row = $result->fetch_assoc();

$displayname = $row['uname'];
$displaymail = $row['email'];
$displayprod = $row['prod_days_sql'];
$displayunprod = $row['unprod_days_sql'];
$displaysubbed = $row['submitted_today'];
$displaysubbedprod = $row['submitted_prod_today'];
$displaysubbedunprod = $row['submitted_unprod_today'];

echo $displayname;

$link->close()
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Productivity Tracker</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">

  <script src="js/increment.js"></script>
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <form action="iframe.php" target="my-iframe" method="post">
    <div style="margin: auto; display:block; text-align: center">
      <p>How was today?</p>
      <button onclick="increment('prod-count', d.getDate(), d.getMonth(), d.getYear())" style="width: 10%">Productive</button>
      <button onclick="increment('unprod-count', d.getDate(), d.getMonth(), d.getYear())" style="width: 10%">Unproductive</button>
      <p id="prod-count">Productive Days: <span id='prod_display'> <?php echo $displayprod; ?> </span></p>
      <p id="unprod-count">Unproductive Days: <span id='unprod_display'> <?php echo $displayunprod; ?> </span></p>
    </div>
  </form>


  <iframe name="my-iframe" src="iframe.php"></iframe>

  <p style="hidden:true" id="displaysubbed"><?php echo $displaysubbed; ?></p>
  <p style="hidden:false" id="displaysubbedprod"><?php echo $displaysubbedprod; ?></p>
  <p style="hidden:true" id="displaysubbedunprod"><?php echo $displaysubbedunprod; ?></p>



  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>


</body>

</html>

