<?php

$cart = json_decode($_COOKIE['cart'], true);
if ($cart[$_GET['id']]['count'] == 0) {
    unset($cart[$_GET['id']]);
}
else {
    $cart[$_GET['id']]['count'] = $_GET['count'];
};
unset($_COOKIE['cart']);
setcookie('cart', json_encode($cart));

/*$cart[$_GET['id']]['count'] = $cart[$good['id']]['count'] + 1;*/
header("location: /index.php?page=cart");
die();

?>
