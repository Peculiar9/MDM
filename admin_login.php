<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>
<?php
if(isset($_SESSION['user_id_session'])){
  Redirect_to('admin_dashboard.php');
}

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username)||empty($password)){
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("admin_login.php");
    }else{
        // Call Out Function
        $found_account = Login_attempt_for_admin($username,$password);
        if($found_account){
            $_SESSION['user_id_session'] = $found_account['id'];
            $_SESSION['username'] = $found_account['username'];
            // $_SESSION['aname'] = $found_account['aname'];
            $_SESSION['SuccessMessage']= "Welcome ".$_SESSION['username'];
            //  Redirect_to('admin_dashboard.php');
            if (isset($_SESSION['TrackingURL'])){
                Redirect_to($_SESSION['TrackingURL']);
            }else{
                Redirect_to('admin_dashboard.php');
            }
        }else{
            $_SESSION['ErrorMessage'] = 'Incorrect Username Or Password';
            Redirect_to('admin_login.php');
        }
      }
}
// }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="" href="Login/bootstrap.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title> MDM || Admin Login Page </title>
  </head>
  <body>

<!-- 
    Navbar starts  -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand" href="#"><img src="images/logo.png" class="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto pl-5 mr-4">

              <!-- <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search Products..." size="50">
                  <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                </form> -->

            <!-- <li class="nav-item ml-3">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown ml-3">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories </i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item  text-decoration-none" href="../HomePage/index.html#shirts-catg" id="shirt-cart-button"> Shirts and Gowns </a>
                  <a class="dropdown-item" href="../HomePage/index.html#sneakers-cap-catg"> Sneakers & Cap </a>
                  <a class="dropdown-item " href="../HomePage/index.html#Cardigan-catg"> Cardigan </a>
                </div>
            </li> -->

            <!-- <li class="nav-item dropdown ml-3">
              <a class="nav-link active dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login &nbsp;<i class="fa fa-male"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-info" href="../Login/Login.html"><b>Login </b></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-warning" href="register.php"> <b>Create Account</b> </a>
              </div>
            </li> -->
            <!-- <li class="nav-item ml-3">
              <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Cart <i class="fa fa-shopping-cart"></i></a>
            </li> -->

            <!-- Menu Bar not needed on Login Page -->

          </ul>

        </div>
      </nav>
<br>
<br>
<br>
<br>
<!-- Navbar ends -->
<br>

<div class="container">
    <div class="row">
        <div class="d-flex flex-md-row flex-column">
            <div class="bg-warning col-md-6 round order-2 order-md-1">

                <br>
                <br>
                <br>
                <div class="notePage p-5 ">
                    <p class="lead welcomemdm text-white font-weight-normal" style="font-size: 26px"><b> <span class="underline">  Welco</span>me to MDM</b></p>
                    
                    <br>
                    <br>

                
                    <p class="text-white font-size-lg"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ad necessitatibus error possimus quia earum corporis? Quasi aliquam a odit corporis quisquam facere illo reprehenderit? Repudiandae accusamus cum placeat aspernatur!</p>

                    <br>
                    <br>

                    <button class="btn btn-dark text-white btn-outline-none knowMore"> Know More </button>
                </div>

                <br>
                <br>
            </div>





        <div class="bg-white col-md-6 login-round order-1 order-md-2">
            <div class="p-5 login-box">
                <p class="lead text-center font-weight-normal" style="font-size:20px"><b>Si<span class="underline2">gn i</span>n</b></p>

                
               <form class="text-center" method="post" action="admin_login.php">
                 <?php 
                  echo ErrorMessage();
                  echo SuccessMessage();
                 ?>
                    <div class="form-group">
                        <input type="text" class="form-control form-input" id="exampleInputEmail1" placeholder="Enter Username" name="username" id="username">
                    </div>

                    <br>
                    
                    <div class="form-group">
                        <input type="password" class="form-control form-input" id="exampleInputPassword1" placeholder="Enter Password" name="password" id="password">
                    </div>
                    <div class="form-group form-check" style="text-align: left">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label">Remember me</label>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary btn-warning  text-white login-btn">LOGIN</button>
                    <small> <span class="form-text text-muted">Don't have an Account?</span><span><a href="register.php" class="text-decoration-none">Create Account.</a></span></small>
                    </form>
            </div>
        </div>
        </div>
    </div>
</div>



  </body>


    
  





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>