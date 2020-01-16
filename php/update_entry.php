<?php
$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');

$targetid = $_POST['pageid'];
echo $targetid;
$prod_days = $_POST['displayprod'];
$unprod_days = $_POST['displayunprod'];
$submit_day = $_POST['displaysubmitday'];
$last_prod = $_POST['displaylastprod'];


$sql = "UPDATE MyPages SET prod_days_sql='$prod_days', unprod_days_sql='$unprod_days', submitted_day='$submit_day', last_prod='$last_prod' WHERE id = '$targetid'";

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $link->error;
}

$link->close();


?>
