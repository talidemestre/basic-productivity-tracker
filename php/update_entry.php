<?php
$link = mysqli_connect('localhost', 'admin_access', 'F7JC8U^IH&h6vteoAfL');
mysqli_select_db($link, 'users');

$targetid = filter_var($_POST['pageid'], FILTER_SANITIZE_STRING);
echo $targetid;
$prod_days = filter_var($_POST['displayprod'], FILTER_SANITIZE_STRING);
$unprod_days = filter_var($_POST['displayunprod'], FILTER_SANITIZE_STRING);
$submit_day = filter_var($_POST['displaysubmitday'], FILTER_SANITIZE_STRING);
$last_prod = filter_var($_POST['displaylastprod'], FILTER_SANITIZE_STRING);


$sql = "UPDATE MyPages SET prod_days_sql='$prod_days', unprod_days_sql='$unprod_days', submitted_day='$submit_day', last_prod='$last_prod' WHERE id = '$targetid'";

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $link->error;
}

$link->close();


?>
