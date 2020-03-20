<?php
require_once('include/functions.php');
require_once('include/session.php');
?>

<?php
 $_SESSION['user_id'] = null;
 $_SESSION['email'] = null;
 $_SESSION['username'] = null;
//  $_SESSION['aname'] = null;
 session_destroy();
 Redirect_to('index.php');
?>
