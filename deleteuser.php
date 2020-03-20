<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>
<?php
if (isset($_GET['id'])){
    $getParam = $_GET['id'];
    $sql = "DELETE FROM user_entity WHERE id='$getParam'";
    $stmt = $connecting->query($sql);
    if ($stmt){
        // $target_path = "upload/$imageDelete";
        // unlink($target_path);
        $_SESSION['SuccessMessage'] = 'User Deleted Succesfully';
        Redirect_to('admin_dashboard.php');
    }else{
        $_SESSION['ErrorMessage'] = 'Something Went Wrong';
        Redirect_to('admin_dashboard.php');
    }
}
?>