<?php 
require_once('include/db.php');
require_once('include/session.php');
?>

<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
    exit;
}

function CheckExistingOrNot($email){
    global $connecting;
    $sql = "SELECT email FROM user_entity WHERE email=:emaiL";
    $stmt = $connecting->prepare($sql);
    $stmt->bindValue(':emaiL',$email);
    $stmt->execute();
    $result = $stmt->rowcount();
    if ($result==1){
        return true;
    }else{
        return false;
    }
}

function CheckExisting($username){
    global $connecting;
    $sql = "SELECT username FROM admin_entity WHERE username=:usernamE";
    $stmt = $connecting->prepare($sql);
    $stmt->bindValue(':usernamE',$username);
    $stmt->execute();
    $result = $stmt->rowcount();
    if ($result==1){
        return true;
    }else{
        return false;
    }
}

function CheckExistingProduct($product_name){
    global $connecting;
    $sql = "SELECT product_name FROM category WHERE product_name=:product_namE";
    $stmt = $connecting->prepare($sql);
    $stmt->bindValue(':product_namE',$product_name);
    $stmt->execute();
    $result = $stmt->rowcount();
    if ($result==1){
        return true;
    }else{
        return false;
    }
}

function CheckCategory($title){
    global $connecting;
    $sql = "SELECT title FROM category WHERE title=:titlE";
    $stmt = $connecting->prepare($sql);
    $stmt->bindValue(':titlE',$title);
    $stmt->execute();
    $result = $stmt->rowcount();
    if ($result==1){
        return true;
    }else{
        return false;
    }
}

function Login_attempt($email,$password){
    global $connecting;
    $sql = "SELECT * FROM user_entity WHERE email=:emaiL AND pass_word=:pass_worD LIMIT 1";
    $stmt = $connecting->prepare($sql);
    $stmt->bindValue(':emaiL',$email);
    $stmt->bindValue(':pass_worD',$password);
    $stmt->execute();
    $result = $stmt->rowcount();
    if ($result==1){
        // echo "GOOD";
        return $found_account = $stmt->fetch(); // To be used to fetch, check while loop
    }else{
        // echo "BAD";
        return null;
    }
}

function Login_attempt_for_admin($username,$password){
    global $connecting;
    $sql = "SELECT * FROM admin_entity WHERE username=:usernamE AND pass_word=:pass_worD LIMIT 1";
    $stmt = $connecting->prepare($sql);
    $stmt->bindValue(':usernamE',$username);
    $stmt->bindValue(':pass_worD',$password);
    $stmt->execute();
    $result = $stmt->rowcount();
    if ($result==1){
        // echo "GOOD";
        return $found_account = $stmt->fetch(); // To be used to fetch, check while loop
    }else{
        // echo "BAD";
        return null;
    }
}

function Confirm_login() {
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        $_SESSION['ErrorMessage']='Login Required!';
        Redirect_to('admin_login.php');
    }
}

function Confirm_login_for_user(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        $_SESSION['ErrorMessage']='Login Required!';
        Redirect_to('login.php');
    }
}

// function TotalPost() {
//     global $connecting;
//     $sql = "SELECT COUNT(*) FROM posts";
//     $stmt = $connecting->query($sql);
//     $rows = $stmt->fetch();
//     $total = array_shift($rows);
//     echo $total;
// }

// function TotalCat(){
//     global $connecting;
//     $sql = "SELECT COUNT(*) FROM category";
//     $stmt = $connecting->query($sql);
//     $rows = $stmt->fetch();
//     $total = array_shift($rows);
//     echo $total;
// }

// function TotalAdmin(){
//     global $connecting;
//     $sql = "SELECT COUNT(*) FROM admin_entity";
//     $stmt = $connecting->query($sql);
//     $rows = $stmt->fetch();
//     $total = array_shift($rows);
//     echo $total;
// }

// function TotalComment(){
//     global $connecting; 
//     $sql = "SELECT COUNT(*) FROM comment";
//     $stmt = $connecting->query($sql);
//     $rows = $stmt->fetch();
//     $total = array_shift($rows);
//     echo $total;
// }

// function Fetch_comment($id){
//     global $connecting;
//     $sql_next = "SELECT COUNT(*) FROM comment WHERE post_id='$id' AND status='ON'";
//     $stmt_next = $connecting->query($sql_next);
//     $rows = $stmt_next->fetch();
//     $total = array_shift($rows);
//     return $total;
// }   

// function Fetch_next_comment($id){
//     global $connecting;
//     $sql_move = "SELECT COUNT(*) FROM comment WHERE post_id='$id' AND status='OFF'";
//     $stmt_move = $connecting->query($sql_move);
//     $rows = $stmt_move->fetch();
//     $total = array_shift($rows);
//     return $total;
// }
// ?>