<div id="openedProduct-img">
    <img src="<?php echo $good['img']; ?>"/>
</div>
<div id="openedProduct-content">
    <h1 id="openedProduct-name">
        <?php echo $good['name'] . '<br>'; ?>
    </h1>
    <div id="openedProduct-desc">
        <?php echo 'артикул ' . $good['SKU'] . '<br>' . '<br>';
        echo $good['desc'];
        ?>
    </div>
    <div id="openedProduct-price">
        <?php echo $good['price'] . '<br>';
        echo $good['stock']; ?>
    </div>
    <form action="index.php" method="post">
        <input  type="hidden" name="page" value="cart">
        <input  type="number" name="count" class="goodsCount" value="1">
        <input type="hidden" name="id" value="<?= $good['id'] ?>">
        <button class="shopUnitToCart">в корзину</button>
    </form>
</div>