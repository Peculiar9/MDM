<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>

<?php
$_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
Confirm_login_for_user();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="aPerfect/bootstrap.css">

    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="js/jquery2.js"></script>
		<script src="main.js"></script>
		
    <title> MDM || Welcome to MDM Home Page </title>
  </head>
  <body class="body"> 
<!-- 
    Navbar starts  -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top whole-nav">
        <a class="navbar-brand" href="#"><img src="images/logo.png" class="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto pl-5 mr-4">

              <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search Products..." size="50">
                  <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                </form>

            <li class="nav-item active ml-3">
              <a class="nav-link" href="index.php" id="home">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown ml-3">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories </i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item  text-decoration-none" href="#shirts-catg" id="shirt-cart-button"> Shirts and Gowns </a>
                <a class="dropdown-item" href="#sneakers-cap-catg"> Sneakers & Cap </a>
                <a class="dropdown-item " href="#Cardigan-catg"> Cardigan </a>
              </div>
            </li>

            <li class="nav-item mr-3">
                <a href="cart.php" class="nav-link">
                 <i class="fas fa-cart-plus"></i> Cart</a>
              </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="logout.php">
                Logout &nbsp;<i class="fa fa-user"></i>
              </a>
              <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-info" href="login.php"><b>Login </b></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-warning" href="register.php"> <b>Create Account</b> </a>
              </div> -->
            </li>
            
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
    <div class="col-md-6 mt-5">
      <h2 class="text-white font-weight-bold"> Buy Best Products From All Of The World</h2>
      <p class="lead text-white mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore vel quasi reprehenderit cum aliquam quod amet eos quia aut suscipit cumque sequi, maxime excepturi, pariatur iste, fugiat obcaecati odit quam?</p>
      <button class="btn btn-light text-warning pr-5 pl-4 Product-btn mt-4"> <b>Products</b></button>
      <a href="register.php" class="btn btn-outline-light text-dark pr-5 pl-5 Product-btn ml-3 mt-3"> <b>Signup</b></a>
    </div>

    <div class="col-md-6 mt-5">
      <img src="images/cart5.png" width="350px" class=" movement">
    </div>

  </div>
</div>


<div class="mt-5 text-center text-white"> 
  <h3>Featu<span class="underline">red Pr</span>oducts </h3>
  </div>

<div>
  <div class="container-fluid mt-5 bg-dark text-center text-white rounded p-1" id="shirts-catg">
    <h5>SHIRTS & GOWNS</h5> 
  </div> 
</div>

<!--item list-->
<div class="container ">
  <div class="row justify-content-center">

        <!-- item One -->
        <?php
                  $sql = "SELECT * FROM category WHERE title='shirtandgowns' ORDER BY id desc";
                  $stmt = $connecting->query($sql);
                  $i = 0;
                  while($data = $stmt->fetch()){
                  $id = $data["id"];
                  $categoryname = $data["title"];
                  $product_name = $data["product_name"];
                  $image = $data["image"];
                  $price = $data['price'];
                  $product_desc = $data['product_description'];
                  $avilable = $data['available'];
                  $i++;
              ?>
    <div class="md-ml-5">
    <div class="col-md-3 mt-5 ml-md-5 ml-lg-0">
        <div class="card" style="width: 15rem;">
            <div class="card-img-top"> 
                <div id="carouselExampleCaptions3" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="upload/<?php echo htmlentities($image);?>" class="d-block w-100 carousel-img carousel-image" alt="carousel 1" style="width: 15rem;">
                      </div>

                      <div class="carousel-item">
                          <img src="upload/<?php echo htmlentities($image);?>" class="d-block w-100 carousel-img carousel-image" alt="carousel 1" style="width: 15rem;">
                      </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions3" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions3" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
            <div class="card-body text-center">
                <h5 class="card-title text-info"><?php echo htmlentities($product_name);?></h5>
                <p class="card-text text-muted lead"><?php echo htmlentities($price);?></p>
              <a href="viewdetails.php?id=<?php echo $id;?>" id="details" class="btn btn-primary pr-5 pl-5">View Details</a>
                  </div>
                    </div>
                      </div> 
                        </div>    
                  </div>  
                  <?php } ?>
                  </div>
                  </div> 
                  
                
  
             <div>
    <div class="container-fluid mt-5 bg-dark text-center text-white rounded p-1" id="Cardigan-catg">
      <h5>CARDIGANS</h5> 
    </div> 
  </div>


  <div class="container">
    <div class="row justify-content-center">
  <!-- item seven-->
                <?php
                  $sql = "SELECT * FROM category WHERE title='cardigan' ORDER BY id desc";
                  $stmt = $connecting->query($sql);
                  $i = 0;
                  while($data = $stmt->fetch()){
                  $id = $data["id"];
                  $categoryname = $data["title"];
                  $product_name = $data["product_name"];
                  $image = $data["image"];
                  $price = $data['price'];
                  $product_desc = $data['product_description'];
                  $avilable = $data['available'];
                  $i++;
              ?>
  <div class="md-ml-5">
  <div class="col-sm-3 mt-5 ml-md-5 ml-lg-0">
      <div class="card" style="width: 15rem;">
          <div class="card-img-top">
              <div id="carouselExampleCaptions7" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img style="height:200px;" src="upload/<?php echo htmlentities($image);?>" class="d-block w-100 carousel-img carousel-image" alt="carousel 1">
                    </div>

                    <div class="carousel-item">
                        <img style="height:200px;" src="upload/<?php echo htmlentities($image);?>" class="d-block w-100 carousel-img carousel-image" alt="carousel 1">
                    </div>

                  <a class="carousel-control-prev" href="#carouselExampleCaptions7" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions7" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
          </div>
          <div class="card-body text-center">
              <h5 class="card-title text-info"><?php echo htmlentities($product_name);?></Canvas></h5>
              <p class="card-text text-muted lead"><?php echo htmlentities($price);?></p>
            <a href="viewdetails.php?id=<?php echo $id;?>" id="details" class="btn btn-primary pr-5 pl-5">View Details</a>
          </div>
        </div>
  </div>
</div>
</div>
                  <?php } ?>
                  </div>
                  </div>

<div>
  <div class="container-fluid mt-5 bg-dark text-center text-white rounded p-1" id="sneakers-cap-catg">
    <h5>SNEAKERS & CAPS</h5> 
  </div> 
</div>


<div class="container">
  <div class="row justify-content-center">
<!-- item ten -->
               <?php
                  $sql = "SELECT * FROM category WHERE title='sneakersandcaps' ORDER BY id desc";
                  $stmt = $connecting->query($sql);
                  $i = 0;
                  while($data = $stmt->fetch()){
                  $id = $data["id"];
                  $categoryname = $data["title"];
                  $product_name = $data["product_name"];
                  $image = $data["image"];
                  $price = $data['price'];
                  $product_desc = $data['product_description'];
                  $avilable = $data['available'];
                  $i++;
              ?>
<div class="md-ml-5">
  <div class="col-sm-3 mt-5 ml-md-5 ml-lg-0">
    <div class="card" style="width: 15rem;">
        <div class="card-img-top">
            <div id="carouselExampleCaptions11" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img style="height:200px;" src="upload/<?php echo htmlentities($image);?>" class="d-block w-100 carousel-img carousel-image" alt="carousel 1" style="width: 15rem;">
                  </div>

                  <div class="carousel-item">
                      <img style="height:200px;" src="upload/<?php echo htmlentities($image);?>" class="d-block w-100 carousel-img carousel-image" alt="carousel 1" style="width: 15rem;">
                  </div>

                <a class="carousel-control-prev" href="#carouselExampleCaptions11" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions11" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <div class="card-body text-center">
            <h5 class="card-title text-info"><?php echo htmlentities($product_name);?></Canvas></h5>
            <p class="card-text text-muted lead"><?php echo htmlentities($price);?></p>
          <a href="viewdetails.php?id=<?php echo $id;?>" id="details" class="btn btn-primary pr-5 pl-5">View Details</a>
        </div>
      </div>
</div>
</div>
</div>
                  <?php } ?>
  </div>
</div>
</div>
<!-- item Ends -->


 <!-- ##### Newsletter Area Start ##### -->
 <div class="jumbotron jumbotron-fluid bg-dark mt-5 mb-0">
    <div class="container">
        <div class="row align-items-center">
            <!-- Newsletter Text -->
            <div class="col-12 col-lg-6 col-xl-7">
                <div>
                    <h1 class="text-white">Subscribe for a <span class="text-warning">25% Discount</span></h1>
                    <p style="color: gainsboro">Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                </div>
            </div>
            <!-- Newsletter Form -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="border-0 pt-3 pl-3" size="30" placeholder="Your E-mail">
                            <input type="button"  class="text-white pt-3 border-0 bg-warning" value="Subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-0">
            <img src="images/logo.png" class="logo d-block m-auto">
            <br>
           <p class="text-center text-light">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved. </a></p>

        </div>


      </div>
    </div>
  </div>

  </body>

  <div class="modal fade text-dark" id="cart_container">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title lead"><h2>Cart</h2></h5>

                        <button class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
						<div class="col-md-4">S/N</div>
						<div class="col-md-4">Product Name</div>
						<div class="col-md-4">Price in ₦</div>
					</div>
					<hr>
                        <div id="cart_product">
						
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
						</div>
					
						<div class="panel-footer"></div>
						
						<br>
						
                      </div>
                      <hr>
                    </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="aPerfect/bootstrap.js"></script>
</body>
</html>