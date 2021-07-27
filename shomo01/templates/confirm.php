<!--<span> информация о заказе</span>-->
<?php
$user = $_GET;
if (isset($_COOKIE['last-order-id'])) {
    $id = $_COOKIE['last-order-id'] + 1;
} else {
    $id = 0;
}

require('validation.php');

$order = [
    'user' => $user,
    'products' => $_COOKIE['cart']
];
if (isset($_COOKIE['orders'])) {
    $orders = json_decode($_COOKIE['orders'], true);
} else {
    $orders = [];
}

$orders[$id] = $order;

setcookie('last-order-id', $id);
setcookie('orders', json_encode($orders));
setcookie( 'cart' , '' , time()-3600 , '/' , '' , 0 );
unset($_COOKIE['cart']);
echo '<pre>';
var_dump($orders);
echo '</pre>'
?>
<div class="done">заказ оформлен <br> номер заказа: <?= $id ?><br><br></div>
<a href="index.php?page" class="btn">на главную</a>