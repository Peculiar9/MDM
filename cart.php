<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>
<?php
// session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="css/cartstyle.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="aPerfect/bootstrap.css">

    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
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
				<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
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
</div>
</BODY>

<script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="aPerfect/bootstrap.js"></script>
</HTML>