<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>
<?php
$getParam = $_GET['id'];
$sql = "SELECT * FROM category WHERE id='$$getParam'";
$stmt = $connecting->query($sql);
while ($data = $stmt->fetch()){
    // $title = $data['title'];
    // $category = $data['category'];
    $imageDelete = $data['image'];
    // $post = $data['post'];
}

if (isset($_GET['id'])){
    $getParam = $_GET['id'];
    $sql = "DELETE FROM category WHERE id='$getParam'";
    $stmt = $connecting->query($sql);
    if ($stmt){
        $target_path = "upload/$imageDelete";
        unlink($target_path);
        $_SESSION['SuccessMessage'] = 'Deleted Succesfully';
        Redirect_to('admin_dashboard.php');
    }else{
        $_SESSION['ErrorMessage'] = 'Something Went Wrong';
        Redirect_to('admin_dashboard.php');
    }
}
?>