<!DOCTYPE html>
<html lang="ru">
<h1>
    Каталог товаров
</h1>
<div>
    <div>
        Сортировка по цене<br>
        <a href="?sort=asc&page=goods">по убыванию<br></a>
        <a href="?sort=desc&page=goods">по возрастанию</a>
    </div>
    <?php
    require('validation.php');
    if (isset($_GET['sort'])) {
        function sortPrice($a, $b)
        {
            if ($a['price'] == $b['price']) {
                return 0;
            }
            if ($_GET['sort'] === 'desc') {
                if ($a['price'] < $b['price']) {
                    return -1;
                } else {
                    return 1;
                }
            } else {
                if ($a['price'] < $b['price']) {
                    return 1;
                } else {
                    return -1;
                }
            }
        }
        usort($goods, "sortPrice");
    }
    ?>
    Сортировка по SKU<br>
    <a href="?sort=asc&page=goods">по убыванию<br></a>
    <a href="?sort=desc&page=goods">по возрастанию</a>
    <?php

    if (isset($_GET['sort'])) {
        function sortSKU($a, $b)
        {
            if ($a['SKU'] == $b['SKU']) {
                return 0;
            }
            if ($_GET['sort'] === 'desc') {
                if ($a['SKU'] < $b['SKU']) {
                    return -1;
                } else {
                    return 1;
                }
            } else {
                if ($a['SKU'] < $b['SKU']) {
                    return 1;
                } else {
                    return -1;
                }
            }

        }

        usort($goods, "sortSKU");
    }
    ?>
    <a href="?sort=asc&page=goods">max<br></a>
    <?php



    foreach ($goods as $good): ?>
        <div class="shopUnit">
            <img src="<?php echo $good['img']; ?>"/>

            <div class="shopUnitName">
                <?php echo $good['name'] ?>
            </div>
            <div class="shopUnitShortDesc">
                <?php echo $good['desc'] ?>
            </div>
            <div class="shopUnitPrice">
                <?php echo $good['price'] . '$' ?>
            </div>
            <a href="index.php?page=product&id=<?php echo $good['id']; ?>" class="shopUnitMore">
                подробнее
            </a>

            <form action="/index.php?page=cart" method="post">
                <input type="hidden" name="page" value="cart">
                <input type="number" name="count" class="goodsCount" value="1">
                <input type="hidden" name="id" value="<?= $good['id'] ?>">
                <button class="shopUnitToCart">в корзину</button>
            </form>

        </div>
    <?php endforeach; ?>
</div>
<script src="scripts/cart.js"></script>
