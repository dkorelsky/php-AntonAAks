<?php

$cart = json_decode($_COOKIE['cart'], true);
//var_dump($cart[$_GET['id']]);

unset($cart[$_GET['id']]);
unset($_COOKIE['cart']);
setcookie('cart', json_encode($cart));
unset($_GET);
header("location: /index.php?page=cart");
die();

?>













