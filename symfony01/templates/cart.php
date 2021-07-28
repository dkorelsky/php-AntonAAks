<!-- если в куки есть cart то декодирую данные из куки -->
<div>
    <h1>Корзина</h1>

</div>
<?php
unset($_COOKIE['validationErrors']);
setcookie('validationErrors', '', time() - 3600, '/', '', 0);

if (empty($_COOKIE['cart'])) {
    echo "корзина пуста";
}
if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);
}

if (isset($_POST['id'])) {

// если в куки нет cart то помещаю в массив cart массив с ключем $good['id']
// это первый товар с заданым id значит count = 0.
    if (!isset($_COOKIE['cart'])) {
        $cart = [
            $good['id'] => [
                'count' => $_POST['count'],
                'img' => $good['img'],
                'name' => $good['name'],
                'SKU' => $good['SKU'],
                'desc' => $good['desc'],
                'price' => $good['price'],
                'stock' => $good['stock']
            ]
        ];
    }
// если $cart[$good['id']] задан то перебираю массив cart на совпадение $good['id']
// с ключем массива. Если в масив записывается товар который там уже есть
// то переменную caunt увеличиваю на сount
    if (isset($cart[$_POST['id']])) {
        foreach ($cart as $key => $cartitem) {
            if ($_POST['id'] == $key) {
                $cart[$_POST['id']]['count'] = $cart[$good['id']]['count'] + $_POST['count'];
            }
        }
// если не нахожу совпадения то помещаю элемент с заданным id в массив cart
    } else {
        foreach ($goods as $product) {
            if ($product['id'] == $_POST['id']) {
                $good = $product;
            }
        }
        $cart[$_POST['id']] = [
            'count' => $_POST['id'],
            'img' => $good['img'],
            'name' => $good['name'],
            'SKU' => $good['SKU'],
            'desc' => $good['desc'],
            'price' => $good['price'],
            'stock' => $good['stock']

        ];
    }

//записываю cart в куки и кодирую в джейсон для отображения в браузере.(?)
    setcookie('cart', json_encode($cart));
    header('Location: /index.php?page=cart');
}


?>

<?php
foreach ($cart as $key => $item):
    ?>
    <div class="shopUnitCart">
        <div>
            <img src="<?php echo $item['img']; ?>"/>
            <div id="CartUnitName">
                <?php echo $item['name'] . '<br>'; ?>
            </div>

            <div>
                <?php echo 'артикул ' . $item['SKU'] . '<br>' . '<br>'; ?>
            </div>

            <div id="CartUnitDesc">
                <?php echo $item['desc'] . '<br>'; ?>
            </div>

            <div id="CartUnitPrice">
                <?php echo $item['price'] . '$' . '<br>';
                echo $item['stock']; ?>
            </div>


            <form action="cartDeleteItem.php" method="get">
                <input type="hidden" name="id" value="<?= $key ?>">
                <button class="shopUnitDelete">удалить</button>
            </form>

        </div>

        <form action="cartCount.php" method="get">
            <input type="number" name="count" class="count" value="<?= $item['count'] ?>">
            <input type="hidden" name="id" value="<?= $key ?>">
            <button class="shopUnitDelete" style="position: absolute; left: -9999px; width: 1px; height: 1px;"
            ">количество</button>
        </form>
        <!-- --><?php //var_dump($item)
        ?>
    </div>

<?php endforeach; ?>

<?php
$amount = 0;
foreach ($cart as $item):
    $amount += $item['price'] * $item['count'];
endforeach;
?>
<div id="cartTotal">
    <?php echo "сумма заказа " . $amount . " $" ?>
</div>
<a href="index.php?page=order" class="shopUnitOrder">
    оформить заказ
</a>
<script src="scripts/cart.js"></script>