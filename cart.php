<?php
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');
?>

<?php
require_once('include/header.php');
?>
  <body class="body"> 
      <div class="container">
        <h2> Cart</h2>
<form action="process_cart.php" method="POST">
							<table width="100%" border="0">
								<tr >
									<Td> <b>No
									<td> <b>Product
									<td> <b>Qty
									<td> <b>Rate
									<td> <b>Price
									<td> <b>Delete
								</tr>
								<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
							
								<?php
									$tot = 0;
									$i = 1;
									if(isset($_SESSION['cart']))
									{

									foreach($_SESSION['cart'] as $id=>$x)
									{	
										echo '
											<tr>
											<Td> '.$i.'
											<td> '.$x['product_name'].'
											<td> <input type="text" size="2" value="'.$x['qty'].'" name="'.$id.'">
											<td> '.$x['price'].'
											<td> '.($x['qty']*$x['price']).'
											<td> <a href="process_cart.php?id='.$id.'">Delete</a>
										</tr>
										';
										
										$tot = $tot + ($x['qty']*$x['price']);
										$i++;
									}
									}
								
								?>
							<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
								
							<tr>
							<td colspan="6" align="right">
							<h4>Total:</h4>
							
							</td>
							<td> <h4>N<?php echo $tot; ?> </h4></td>
							</tr>
							<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>
							
							<Br>
								</table>						

								<br><br>
							<center>
							<input type="submit" value=" Re-Calculate " > 
							<a href="checkout.php">CONFIRM & PROCEED<a/>
							</center>
							</form>
							</div>
							
						</div>
						
          </div>
      <?php 
      require_once('include/footer.php');
      ?>