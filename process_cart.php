<?php 
require_once('include/db.php');
require_once('include/functions.php');
require_once('include/session.php');

?>
<?php

	if(isset($_GET['product_name']) and isset($_GET['price'])){
		//add item
		$_SESSION['cart'][] = array("product_name"=>$_GET['product_name'],"price"=>$_GET['price'],"qty"=>"1");
		Redirect_to("cart.php");
	}
	else if(isset($_GET['id']))
	{
		//del a item
		$id = $_GET['id'];
		unset($_SESSION['cart'][$id]);
		header("location: cart.php");
	}
	else if(!empty($_POST))
	{
		//update qty
		foreach($_POST as $id=>$val)
		{
			$_SESSION['cart'][$id]['qty']=$val;
			header("location: cart.php");
		}
	}


?>