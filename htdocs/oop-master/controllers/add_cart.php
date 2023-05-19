<?php
include '../cart.php';
if (isset($_GET['item'])) {
	$cart = new Cart();
	$cart->add('1');
}
?>