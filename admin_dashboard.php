<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>
<?php 
$_SESSION['TrackingURL'] = $_SERVER['PHP_SELF'];
Confirm_login(); ?>
<?php
if (isset($_POST['submit'])){
    $product_name = $_POST['Product_name'];
    $price = $_POST['Price'];
    $title = $_POST['Title'];
    $image = $_FILES['Image']['name'];
    $target = "upload/".basename($_FILES['Image']['name']);
    $product_desc = $_POST['Product_desc'];
    $avilable =$_POST['Available'];
    // $admin =  $_SESSION['username'];
    // date_default_timezone_set("Africa/Lagos");
    // $currenttime = time();
    // $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);
    if (empty($product_name)||empty($price)){
        $_SESSION["ErrorMessage"] = "All necessary fields must be filled out"; 
        Redirect_to('admin_dashboard.php');
    }elseif(strlen($product_name)<3){
        $_SESSION["ErrorMessage"] = "Product Name should be greater than 3 characters"; 
        Redirect_to('admin_dashboard.php');
    }elseif(strlen($title)<3){
        $_SESSION["ErrorMessage"] = "Category should be greater than 3 characters"; 
        Redirect_to('admin_dashboard.php');
    }elseif(CheckExistingProduct($product_name)){
        $_SESSION["ErrorMessage"] = "Product already exist, try another"; 
        Redirect_to('admin_dashboard.php');
    }else{
        // Query
       // global $connecting;
        $sql = "INSERT INTO category(title,image,product_name,price,product_description,available)";
        $sql .= "VALUES(:titlE,:imagE,:product_namE,:pricE,:product_desC,:availablE)";
        $stmt = $connecting->prepare($sql);
        $stmt->bindValue(':titlE',$title);
        $stmt->bindValue(':imagE',$image);
        $stmt->bindValue(':product_namE',$product_name);
        $stmt->bindValue(':pricE',$price);
        $stmt->bindValue(':product_desC',$product_desc);
        $stmt->bindValue(':availablE',$avilable);
        $execute = $stmt->execute();
        move_uploaded_file($_FILES['Image']['tmp_name'], $target);
        var_dump($execute);
        if ($execute){
            $_SESSION["SuccessMessage"] = "Product Added Successfully"; 
            Redirect_to('admin_dashboard.php');
        }else{
            $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!"; 
            Redirect_to('admin_dashboard.php');
        }
    }
}

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
    <link rel="stylesheet" href="styles.css">


    <title>MDM || Administrator Only </title>
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

              
            <li class="nav-item active ml-3">
              <button class="btn btn-outline-warning"><a class="nav-link" href="logout_admin.php" style="font-size:20px">Logout <span class="sr-only">(current)</span></a></button>
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


<div class="container mt-5">
	
    <marquee><h6> <span class="payment-section-tag px-4 py-1 text-white"> ADMIN IS FREE TO EDIT AND MODIFY THE WEBSITE FROM HERE </span></h6></marquee>
        
    
    
    <div class="border border-dark wrapper">

<!-- Registration nav-bar -->

                    <div class="nav  flex-column flex-md-row ml-4 mr-auto mt-5">

                   <a class="nav-link btn btn-dark text-white active mb-2" href="#section-1" data-toggle="tab"><span class="sections px-2" id="sect-1">ADD NEW PRODUCT</span></a>

                    <a class=" nav-link btn btn-dark ml-3 text-white mb-2" href="#section-2" data-toggle="tab"><span class="sections px-2 " id="sect-2" >PRODUCTS</span></a>

                  <a  class=" nav-link btn btn-dark ml-3 text-white mb-2" href="#section-3" data-toggle="tab"><span class="sections px-2 " id="sect-3">USERS</span></a>

                  <a  class=" nav-link btn btn-dark ml-3 text-white mb-2" href="#section-4" data-toggle="tab"><span class="sections px-2" id="sect-4" >PENDING ORDERS </span></a>

                  <a  class=" nav-link btn btn-dark ml-3 text-white mb-2" href="#section-5" data-toggle="tab"><span class="sections px-2" id="sect-5" > COMPLETED ORDERS </span></a>
                  <a  class=" nav-link btn btn-dark ml-3 text-white mb-2" href="#section-5" data-toggle="tab"><span class="sections px-2" id="sect-5" >SECTION 6</span></a>
                    </div>


<div class="tab-content py-4">

  
<!-- first tab-->
<div class="tab-pane active ml-4 mr-4" id="section-1">

    <h5 class="mt-4 text-dark">  ADD NEW PRODUCT TO THE STOCK </h5>
    <br>
<form method="post" action="admin_dashboard.php" enctype="multipart/form-data">
<?php
 echo ErrorMessage();
 echo SuccessMessage();
?>
  <div class="form-row">
  <label for="product_name"> Product Name <span style="color: red;"><b>*</b></span></label>
   <input type="text"class="form-control" id="product_name"  name="Product_name"
         oninvalid="this.setCustomValidity('Please Enter the product name!')"
         oninput="this.setCustomValidity('')"/>
     </div>

     <br>

     <div class="form-row">
  <label for="product_price"> Price <span style="color: red;"><b>*</b></span></label>
   <input type="text"  class="form-control" id="product_price"  name="Price" id="price"
         oninvalid="this.setCustomValidity('Please Enter the product price')"
         oninput="this.setCustomValidity('')"/>
     </div>

     <br>

     <div class="row">
            <div class="col-12">
            <label>Category</label>
              <select class="form-control" name="Title" id="title">
              <?php
                 $connecting;
                  $sql = "SELECT id,title FROM category_list";
                  $stmt = $connecting->query($sql);
                  while($data = $stmt->fetch()){
                  $id = $data["id"];
                  $categoryname = $data["title"];
              ?>
              <option id="title" name="Title"><?php echo $categoryname;?></option>
                <?php }?>
                
              </select>
            </div>
          </div>
          <br>

     <div class="form-row">
      <label for="Product_image"> Upload Product Image <span style="color: red;"><b>*</b></span></label>
       <input type="file" class="form-control"  id="image"  name="Image" 
       oninvalid="this.setCustomValidity('Please upload the product image')"
        oninput="this.setCustomValidity('')">
         </div>
<!-- 
                                       <div class="form-group">
                                            <div class="custom-file">
                                                <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
                                                <lable for="imageSelect" class="custom-file-label">Select Image</label> 
                                        </div>
                                            </div> -->

     <br>

     <div class="form-row">
      <label for="Product_desc">Product Description <span style="color: red;"><b>*</b></span></label>
       <input type="text-box" style="height: 100px" class="form-control"  id="product_desc" name="Product_desc"  required 
       oninvalid="this.setCustomValidity('State the Product description')"
        oninput="this.setCustomValidity('')">
         </div>

         <br>

     <div class="form-row">
  <label for="quantity">Available quantity<span style="color: red;"><b>*</b></span></label>
   <input type="text" class="form-control" id="quantity"  name="Available" id="available"
         oninvalid="this.setCustomValidity('What is the Available quantity?')"
         oninput="this.setCustomValidity('')"/>
     </div>

  <br>
  <br>

<button class="btn btn-outline-dark d-block m-auto" type="submit" name="submit">SUBMIT</button>
</form>
</div>



<!-- second tab-->
<div class="tab-pane ml-4 mr-4" id="section-2">
<h5 class="mt-4 text-dark">  PRODUCTS TABLE  </h5>
<br>

    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"> ID</th>
            <th scope="col">NAME</th>
            <th scope="col">PRICE</th>
            <th scope="col" class="text-center">AVAILABLE QTY</th>
            <th scope="col"> IMAGE</th>
            <th scope="col">CATEGORY</th>
            <th scope="col" >ACTION</th>

          </tr>
        </thead>
                <?php
                  $sql = "SELECT * FROM category ORDER BY id desc";
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
        <tbody>
          <tr>
            <th scope="row"><?php echo htmlentities($i);?></th>
            <td><?php echo htmlentities($product_name);?></td>
            <td><?php echo htmlentities($price);?></td>
            <td class="text-center"><?php echo htmlentities($avilable);?></td>
            <td><img src="upload/<?php echo $image;?>" width=170px; height=100px;></td>
            <td><?php echo htmlentities($categoryname);?></td>
            <td><a href="edit.php?id=<?php echo $id;?>"><span class="btn btn-warning">Edit</span></a>
                <a href="deletepost.php?id=<?php echo $id;?>"><span class="btn btn-danger">Delete</span></a>
                </td>
          </tr>

        </tbody>
        <?php } ?>
      </table>

</div>



<!--third tab-->
<div class="tab-pane ml-4 mr-4" id="section-3">
    <h5 class="mt-4 text-dark">  USERS TABLE  </h5>
    <br>
    
        
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col"> S/N</th>
                <th scope="col">Full Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Home Address</th>
                <th scope="col" class="text-center">ACTION</th>
    
              </tr>
            </thead>
            <?php
                  $sql = "SELECT * FROM user_entity ORDER BY id desc";
                  $stmt = $connecting->query($sql);
                  $i = 0;
                  while($data = $stmt->fetch()){
                  $id = $data["id"];
                  $f_name = $data['f_name'];
                  $l_name =$data['l_name'];
                  $email = $data['email'];
                  $phone = $data['phone'];
                  $home = $data['home_add'];

                  $i++;
              ?>
            <tbody>
              <tr>
                <th scope="row"><?php echo htmlentities($i);?></th>
                <td><?php echo htmlentities($f_name);?></td>
                <td><?php echo htmlentities($l_name);?></td>
                <td><?php echo htmlentities($email);?></td>
                <td class="text-center"><?php echo htmlentities($phone);?></td>
                <td> <?php echo htmlentities($home);?>
                <td><a href="deleteuser.php?id=<?php echo $id?>"><span class="btn btn-danger">Delete User</span></a></td>
              </tr>
    
            </tbody>
                  <?php }?>
          </table>
    
    </div>



    <!--four tab-->
<div class="tab-pane ml-4 mr-4" id="section-4">
  <h5 class="mt-4 text-dark">  PENDING ORDERS TABLE  </h5>
  <br>
  
      
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col"> S/N</th>
              <th scope="col">NAME</th>
              <th scope="col" class="text-center">PHONE NUMBER</th>
              <th scope="col" class="text-center"> DESTINATION ADDRESS</th>
              <th scope="col" class="text-center">CITY </th>
              <th scope="col" class="text-center">STATUS</th>
            </tr>
          </thead>
          <?php
                  $sql = "SELECT * FROM shipping_details WHERE sta_tus='OFF' ORDER BY id desc";
                  $stmt = $connecting->query($sql);
                  $i = 0;
                  while($data = $stmt->fetch()){
                  $id = $data["id"];
                  $fandl = $data['fandl'];
                  $add = $data['add_ress'];
                  $phone = $data['phone'];
                  $city = $data['city'];

                  $i++;
              ?>
          <tbody>
            <tr>
              <th scope="row"><?php echo htmlentities($i);?></th>
              <td><?php echo htmlentities($fandl);?></td>  
              <td class="text-center"><?php echo htmlentities($phone);?></td>
              <td class="text-center"><?php echo htmlentities($add);?></td>
              <td class="text-center"><?php echo htmlentities($city);?></td>
              <td><a href="confirm.php?id=<?php echo $id;?>" class="btn btn-warning"  id="delete"> Confirm</a></td>
            </tr>
            </td>
  
          </tbody>
                  <?php  } ?>
        </table>
  
  </div>


  <!--five tab-->
<div class="tab-pane ml-4 mr-4" id="section-5">
  <h5 class="mt-4 text-dark">  COMPLETED ORDERS TABLE  </h5>
  <br>
  
      
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col"> S/N</th>
              <th scope="col">NAME</th>
              <th scope="col" class="text-center">PHONE NUMBER</th>
              <th scope="col" class="text-center"> DESTINATION ADDRESS</th>
              <th scope="col" class="text-center">CITY </th>
              <th scope="col" class="text-center">STATUS</th>
            </tr>
          </thead>
          <?php
                  $sql = "SELECT * FROM shipping_details WHERE sta_tus='ON' ORDER BY id desc";
                  $stmt = $connecting->query($sql);
                  $i = 0;
                  while($data = $stmt->fetch()){
                  $id = $data["id"];
                  $fandl = $data['fandl'];
                  $add = $data['add_ress'];
                  $phone = $data['phone'];
                  $city = $data['city'];

                  $i++;
              ?>
          <tbody>
            <tr>
            <tr>
              <th scope="row"><?php echo htmlentities($i);?></th>
              <td><?php echo htmlentities($fandl);?></td>  
              <td class="text-center"><?php echo htmlentities($phone);?></td>
              <td class="text-center"><?php echo htmlentities($add);?></td>
              <td class="text-center"><?php echo htmlentities($city);?></td>
              <td><p>Confirmed</p></td>
            </tr>
          </tbody>
                  <?php } ?>
        </table>
  
  </div>
    





</div>
</div>
</div>



<br>
<br>




</body>

<div class="modal fade text-dark" id="delete_container">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title lead"><h2>Delete</h2></h5>
                        <button class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                      <form method="post" action="admin_dashboard.php">
                      <p> Are you sure you want to delete?</p>
                      <button type="button" class="btn btn-block text-red" data-dismiss=modal>Cancel</button>
                       <button type="button" name="delete" class="btn btn-danger btn-block" value="<?php echo $id;?>">Delete</a></button>
                                  </form>


						
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
</body>
</html>