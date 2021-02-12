<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>
<?php

$_SESSION['TrackingURL'] = $_SERVER['PHP_SELF'];
Confirm_login_for_user();

if (isset($_POST['submit'])){
    $fandl = $_POST['Name'];
    $address = $_POST['Address'];
    $postal = $_POST['Pc'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $phone = $_POST['Phone'];
    $status = "OFF";
    if (empty($fandl)||empty($address)||empty($phone)||empty($city)||empty($state)){
        $_SESSION["ErrorMessage"] = "All necessary fields must be filled out"; 
        Redirect_to('checkout.php');
    }else{
        // Query
        global $connecting;
        $sql = "INSERT INTO shipping_details (fandl,add_ress,postal,city,state_city,phone,sta_tus)";
        $sql .= "VALUES(:fandL,:add_resS,:postaL,:citY,:state_citY,:phonE,:sta_tuS)";
        $stmt = $connecting->prepare($sql);
        $stmt->bindValue(':fandL',$fandl);
        $stmt->bindValue(':add_resS',$address);
        $stmt->bindValue(':postaL',$postal);
        $stmt->bindValue(':citY',$city);
        $stmt->bindValue(':state_citY',$state);
        $stmt->bindValue(':phonE',$phone);
        $stmt->bindValue(':sta_tuS',$status);
        $execute = $stmt->execute();
        // var_dump($execute);
        if ($execute){
            $_SESSION["SuccessMessage"] = "Order is being Processed"; 
            Redirect_to('checkout.php');
        }else{
            $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!"; 
            Redirect_to('checkout.php');
        }
    }
}
?>
<?php 
require_once('include/header.php');
?>
<font style="font-size:30px;margin-left:420px">Shipping Details</font>	
			<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                <div class="clr"></div>
				
            </div><!--/ freshdesignweb top bar -->    
            <div class="row">
                  <div class="col-md-6 mb-3">
      <div  class="form">
    		<form method="post" action="checkout.php">
                <?php
                  echo ErrorMessage();
                  echo SuccessMessage();
                  ?>
    			<label>Name</label>
    			<input id="name" class="form-control" name="Name" placeholder="First and last name" tabindex="1" type="text"> 
    			 
    			<label>Address</label>
    			<textarea id="address" class="form-control" name="Address" placeholder="Address"  cols="55" row="10"type="email"> </textarea>
                
                <label>Postal Code</label>
    			<input id="pc" name="Pc" class="form-control" placeholder="201001" tabindex="2" type="number"> 
    			 
                <label>City</label>
                <input type="text" id="city"  class="form-control" name="City" placeholder="Ibadan"> 
                
                <label>State</label>
                <input type="text" id="state"  class="form-control" name="State" placeholder="Oyo State"> 
                
                <label>Mobile phone</label> 
                <input id="phone" name="Phone" class="form-control" placeholder="Phone number" type="number"> <br><br>

                <button class="button btn btn-dark" name="submit" id="submit" tabindex="5">Submit </button> 	 
   </form> 
</div>      
</div>
</div>
</div>


<?php
require_once('include/footer.php');
?>