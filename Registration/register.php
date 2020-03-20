<? php ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../fontawesome/fontawesome/css/all.css">
    <link rel="stylesheet" href="register.css">


    <title> MDM || Register to get started </title>
  </head>
  <body> 
<!-- 
    Navbar starts  -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand" href="#"><img src="../HomePage/Logo.png" class="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto pl-5 mr-4">

              <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search Products..." size="50">
                  <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                </form>

            <li class="nav-item ml-3">
              <a class="nav-link" href="../HomePage/index.html">Home <span class="sr-only">(current)</span></a>
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

            <li class="nav-item dropdown ml-3">
              <a class="nav-link active dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login &nbsp;<i class="fa fa-male"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-info" href="../Login/Login.html"><b>Login </b></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-warning" href="#"> <b>Create Account</b> </a>
              </div>
            </li>
            <li class="nav-item ml-3">
              <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Cart <i class="fa fa-shopping-cart"></i></a>
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



<div class="container ml-0">
  <h4 class="text-center mt-5 mb-5">Regis<span class="underline">tratio</span>n Form </h4>

  <div class="form-group-input  bg-white d-block m-auto p-4 ">
      <form>

            
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label>Last name</label>
                    <input type="text" class="form-control">
                  </div>
              </div>

                <br>
              
          <div class="row">
            <div class="col-12">
            <label>Sex</label>
              <select class="form-control" required>
                <option selected disabled> Sex </option>
                <option> Male </option>
                <option> Female </option>
              </select>
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-12">
              <label>Email Address</label>
              <input type="email" class="form-control" required>
          </div>
          </div>
          <br>

        
            <div class="row ">
              <div class="col-md-6">
                <label>Password</label>
                <input type="password" id="password1" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label>Confirm Password</label>
                <input type="password" id="password2" class="form-control" required>
              </div>
            </div>
            <p id="alert"></p>
            <br>

            <div class="row">
            <div class="col-12">
                <label>Home Address</label>
                <input type="text" class="form-control" required>
            </div>
            </div>
            <br>

            <div class="row ">
                <div class="col-md-6">
                  <label>Phone Number</label>
                  <input type="number" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label>Zip Code</label>
                  <input type="number" class="form-control" required>
                </div>
              </div>
              <br>
              <br>
              
              <button class="btn btn-warning col-8 d-block m-auto text-white regbtn"> REGISTER </button>
             
        </form>

        <p class="mt-2 text-center"> Already have an Accout? <a href="../Login/Login.html" class="text-decoration-none">Login</a></p>
  </div>
  
</div>


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
            <img src="../HomePage/Logo.png" class="logo d-block m-auto">
            <br>
           <p class="text-center text-light">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved. </a></p>

        </div>

</div>



























  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>