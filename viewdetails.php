<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>
<?php 
$getid = $_GET['id'];
$sql = "SELECT * FROM category WHERE id='$getid'";
$stmt = $connecting->query($sql);
while ($data = $stmt->fetch()){
    $id = $data['id'];
    $title = $data['title'];
    $product_name = $data['product_name'];
    // $category = $data['category'];
    $image = $data['image'];
    $price = $data['price'];
    $product_desc = $data['product_description'];
    $product_name = $data['product_name'];
}
?>
<?php
$_SESSION['TrackingURL'] = $_SERVER['PHP_SELF'];
Confirm_login_for_user(); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery2.js"></script>
		<script src="main.js"></script>


    <title> MDM || Products Details </title>
  </head>
  <body> 
<!-- 
    Navbar starts  -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo"></a>
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
            </li>

            <li class="nav-item mr-3">
                            <a href="cart.php" class="nav-link">
                                <i class="fas fa-cart-plus"></i> Cart
                            </a>
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

<div class="mt-5 text-center text-white"> 
  <h3>Prod<span class="underline">uct Pr</span>eview </h3>
</div>

<br>
<br>
<br>

 <?php
 $getid = $_GET['id'];
 $sql = "SELECT * FROM category WHERE id='$getid'";
 $stmt = $connecting->query($sql);
 while ($data = $stmt->fetch()){
    $id = $data['id'];
     $title = $data['title'];
    //  $category = $data['category'];
     $image = $data['image'];
     $price = $data['price'];
     $product_name = $data['product_name'];
     $product_desc = $data['product_description'];
 }
 ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
                <div id="carouselExampleCaptions14" class="carousel slide" data-ride="carousel">
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
        
                        <a class="carousel-control-prev" href="#carouselExampleCaptions14" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions14" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
    <form>
                <div class="container">
                  <div class="row justify-content-center">
                <div class=" mt-5">
                <div>
                    <form>
                    <select class="form-control d-block m-auto" style="width: 300px">
                       <option selected disabled> Choose From available Color</option>
                       <option>Red</option>
                       <option>Navy Blue</option>
                       <option>Purple</option>
                    </select>
                    <p id="demo"></p>  
                    </form>
                </div>

<br>
                <div >
                    <input type="number" class="form-control d-block m-auto" style="width:300px" placeholder="Quantity" name="quantity" value="1">
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-md-6 d-block m-auto">
            <div>
            <p style="font-size:34px;" class="lead price text-center mt-3" name="price" >N<?php echo htmlentities($price);?></p>
                <h4 class="text-white font-weight-bold mt-4 text-center" name="product"><?php echo htmlentities($product_name);?></h4>
                <p style="text-align:center;font-size:30px;" class="text-white mt-5"><?php echo htmlentities($product_desc);?></p>
                <!-- <button class="btn btn-light text-warning p-3 Addcart Product-btn mt-3 d-block m-auto" id="add-to-cart"> <b>Add to cart</b></button> <br> -->
                <a style="width:120px;text-align:center;" href="process_cart.php?product_name=<?php echo $product_name?>&price=<?php echo $price;?>" class="btn btn-light p-3 Product-btn mt-3 d-block m-auto mb-2">Add to Cart</a> <br>
                <!-- <button class="btn btn-outline-light text-dark buyNow p-3 Product-btn ml-3 mt-3 d-block m-auto"> <b>Buy Now</b></button> -->
                <a style="width:120px;text-align:center;" class="btn btn-light p-3 Product-btn mt-3 d-block m-auto mb-2" href="checkout.php">CheckOut</a>
            </div>
        </div>


    </div>
</div>
</form>

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
    







  
  



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="script.js"></script>
  <script src="HomePage/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>