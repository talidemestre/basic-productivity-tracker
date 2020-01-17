<?php
$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');

$targetid = $_GET['pageid'];

$query = "SELECT * FROM MyPages WHERE id = '".($targetid)."'";

$result = $link->query($query);
$row = $result->fetch_assoc();

$displayname = $row['uname'];
$displaymail = $row['email'];
$displayprod = $row['prod_days_sql'];
$displayunprod = $row['unprod_days_sql'];
$displaysubmitday = $row['submitted_day'];
$displaylastprod = $row['last_prod'];


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

</head>

<body id="body">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <p style="text-align :center"> Welcome to your website <?php echo $displayname;?>.</p>

  <!-- Add your site or application content here -->
    <div style="margin: auto; display:block; text-align: center">
      <p>How was today?</p>
      <button onclick="increment('prod-count', d.getDate(), d.getMonth(), d.getYear())" style="display:inline-block; width: 25%; height: 25vh; font-size:3vw">Productive</button>
      <button onclick="increment('unprod-count', d.getDate(), d.getMonth(), d.getYear())" style="display:inline-block; width: 25%; height: 25vh; font-size:3vw">Unproductive</button>
      <p>Productive Days: <span id='prod-display'> <?php echo $displayprod; ?> </span></p>
      <p>Unproductive Days: <span id='unprod-display'> <?php echo $displayunprod; ?> </span></p>
    </div>


  <iframe name="hidden-iframe" hidden=true></iframe>

  <p hidden=true id="displaysubmitday"><?php echo $displaysubmitday; ?></p>
  <p hidden=true id="displaylastprod"><?php echo $displaylastprod; ?></p>

  <form target='hidden-iframe' action="php/update_entry.php" method="post" hidden>
    <input type="hidden" placeholder="Enter Email" name="pageid" id="pageid" value="<?php echo $targetid; ?>" required>
    <input type="hidden" placeholder="Enter Name" name="displayprod" id="displayprodid" required>
    <input type="hidden" placeholder="Enter Email" name="displayunprod" id="displayunprodid" required>
    <input type="hidden" placeholder="Enter Name" name="displaysubmitday" id="displaysubmitdayid" required>
    <input type="hidden" placeholder="Enter Email" name="displaylastprod" id="displaylastprodid" required>

    <button type="submit" id="hidden-button">Create</button>
  </form>


  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/increment.js"></script>


</body>


</html>

