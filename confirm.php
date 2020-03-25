<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>

<?php
if (isset($_GET['id'])){
    $getParam = $_GET['id'];
    $admin = $_SESSION['username'];
    $sql = "UPDATE shipping_details SET sta_tus='ON' WHERE id='$getParam'";
    $stmt = $connecting->query($sql);
    if ($stmt){
        $_SESSION['SuccessMessage'] = 'Order Confirmed Succesfully';
        Redirect_to('admin_dashboard.php');
    }else{
        $_SESSION['ErrorMessage'] = 'Something Went Wrong';
        Redirect_to('admin_dashboard.php');
    }
}
?>