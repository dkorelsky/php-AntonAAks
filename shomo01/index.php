<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/style.css" rel="stylesheet">

    <title>shomo</title>

</head>
<body>
<header>
    <div id="headerInside">
        <div id="companyName">shomo</div>
        <div id="navWrap">
            <a href="/">
                main
            </a>
            <a href="index.php?page=goods">
                goods
            </a>
            <a href="index.php?page=cart">
                cart
            </a>
            <a href="index.php?page=login">
                account
            </a>
        </div>
    </div>
</header>


<div id="content">
    <?php
    require('data.php');
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    if (isset($_POST["page"])) {
        $page = $_POST["page"];
    }
    if (!isset($page)) {
        if (isset($_GET))
            require('templates/main.php');
    }
    elseif ($page == 'goods') {
        require('templates/goods.php');
    }
    elseif ($page == 'product') {
        $id = $_GET['id'];
        $good = [];
        foreach ($goods as $product) {
            if ($product['id'] == $id) {
                $good = $product;
                require('templates/openproduct.php');
            }
        }
    } elseif ($page == 'cart') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            foreach ($goods as $product) {

                if ($product['id'] == $id) {
                    $good = $product;
                    require('templates/cart.php');
                }
            }

        } else {
            require('templates/cart.php');
        }

    } elseif ($page == 'order') {
        require('templates/order.php');
    } elseif ($page == 'confirm') {
        require('templates/confirm.php');
    } elseif ($page == 'main') {
        require('templates/main.php');
    } elseif ($page == 'login') {
        require('templates/login.php');
    }
    ?>

</div>
<footer>
    <div id="footerInside">

        <div id="contacts">
            <div class="contactWrap">
                <img src="images/envelope.svg" class="contactIcon">
                shomo@gmail.com
            </div>
            <div class="contactWrap">
                <img src="images/phone-call.svg" class="contactIcon">
                044 044 44 44
            </div>
            <div class="contactWrap">
                <img src="images/placeholder.svg" class="contactIcon">
                адрес
            </div>
        </div>

        <div id="footerNav">
            <a href="index.php?page=main">Главная</a>
            <a href="index.php?page=goods">Магазин</a>
        </div>

        <div id="social">
            <img class="socialItem" src="images/google-plus-social-logotype.svg">
            <img class="socialItem" src="images/facebook-logo.svg">
        </div>

        <div id="copyrights">&copy; aks</div>
    </div>
</footer>

<script src="libs/jquery-3.6.0.min.js"></script>
<script src="scripts/cart.js"></script>
</body>
</html>