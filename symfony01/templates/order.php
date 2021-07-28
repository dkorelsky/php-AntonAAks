<?php
if (isset($_COOKIE['validationErrors'])) {
    $errors = json_decode($_COOKIE['validationErrors']);
} else {
    $errors = [];
}
if (isset($_COOKIE['fields'])) {
    $fields = json_decode($_COOKIE['fields']);
} else {
    $fields = [];
}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <title></title>
    <link rel="stylesheet" href="site.css">
</head>
<body>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="index.php?page=confirm" method="POST">
                <input type="hidden" name="page" value="confirm">
                <div class="row">
                    <div class="col-50">
                        <h3>Платежный адрес</h3>
                        <label for="fname"><i class="fa fa-user"></i>Имя</label><?php if (isset($errors->firstname)) {
                            echo $errors->firstname;
                        } ?>
                        <input type="text" id="fname" name="firstname" placeholder=""
                               value="<?php if (isset($fields->firstname)) {
                                   echo $fields->firstname;
                               } ?>">

                        <label for="email"><i class="fa fa-envelope"></i>
                            Email</label><?php if (isset($errors->email)) {
                            echo $errors->email;
                        } ?>
                        <input type="text" id="email" name="email" placeholder=""
                               value="<?php if (isset($fields->email)) {
                                   echo $fields->email;
                               } ?>">

                        <label for="adr"><i
                                    class="fa fa-address-card-o"></i>Адрес</label><?php if (isset($errors->address)) {
                            echo $errors->address;
                        } ?>
                        <input type="text" id="adr" name="address" placeholder=""
                               value="<?php if (isset($fields->address)) {
                                   echo $fields->address;
                               } ?>">

                        <label for="city"><i
                                    class="fa fa-institution"></i>Город</label><?php if (isset($errors->city)) {
                            echo $errors->city;
                        } ?>
                        <input type="text" id="city" name="city" placeholder="" value="<?php if (isset($fields->city)) {
                            echo $fields->city;
                        } ?>">

                        <div class="row">
                            <div class="col-50">
                                <label for="state">Страна</label><?php if (isset($errors->state)) {
                                    echo $errors->state;
                                } ?>
                                <input type="text" id="state" name="state" placeholder=""
                                       value="<?php if (isset($fields->state)) {
                                           echo $fields->state;
                                       } ?>">
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label><?php if (isset($errors->zip)) {
                                    echo $errors->zip;
                                } ?>
                                <input type="text" id="zip" name="zip" placeholder=""
                                       value="<?php if (isset($fields->zip)) {
                                           echo $fields->zip;
                                       } ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-50">
                        <h3>Платеж</h3>
                        <label for="fname">VISA/MASTERCARD</label>

                        <label for="cname">Имя на карте</label><?php if (isset($errors->cardname)) {
                            echo $errors->cardname;
                        } ?>
                        <input type="text" id="cname" name="cardname" placeholder=""
                               value="<?php if (isset($fields->cardname)) {
                                   echo $fields->cardname;
                               } ?>">
                        <label for="ccnum">Номер кредитной карты</label><?php if (isset($errors->cardnumber)) {
                            echo $errors->cardnumber;
                        } ?>
                        <input type="text" id="ccnum" name="cardnumber" placeholder=""
                               value="<?php if (isset($fields->cardnumber)) {
                                   echo $fields->cardnumber;
                               } ?>">
                        <label for="expmonth">Годен месяц</label><?php if (isset($errors->expmonth)) {
                            echo $errors->expmonth;
                        } ?>
                        <input type="text" id="expmonth" name="expmonth" placeholder=""
                               value="<?php if (isset($fields->expmonth)) {
                                   echo $fields->expmonth;
                               } ?>">

                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Годен год</label><?php if (isset($errors->expyear)) {
                                    echo $errors->expyear;
                                } ?>
                                <input type="text" id="expyear" name="expyear" placeholder=""
                                       value="<?php if (isset($fields->expyear)) {
                                           echo $fields->expyear;
                                       } ?>">
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label><?php if (isset($errors->cvv)) {
                                    echo $errors->cvv;
                                } ?>
                                <input type="text" id="cvv" name="cvv" placeholder=""
                                       value="<?php if (isset($fields->cvv)) {
                                           echo $fields->cvv;
                                       } ?>">
                            </div>
                        </div>
                    </div>
                </div>
<!--                <label>-->
<!--                    <input type="checkbox" checked="checked" name="sameadr"> Адрес дставки совпадает с платежным адресом-->
<!--                </label>-->
                <input type="submit" class="btn" value="подтвердить" ?>
            </form>

        </div>

        <?php $items = json_decode($_COOKIE['cart'], true); ?>

        <?php foreach ($items

        as $item) { ?>
        <div class=" col-25">
            <div class="container">
                <div id="openedProduct-img">
                    <img src="<?php echo $item['img']; ?>">
                </div>
                <div id="openedProduct-content">
                    <h1 id="openedProduct-name">
                        <?php echo $item['name'] . '<br>';
                        echo 'артикул ' . $item['SKU'] . '<br>'; ?>
                    </h1>
                    <div id="openedProduct-desc">
                        <?php echo $item['desc']; ?>
                    </div>
                    <div id="openedProduct-price">
                        <?php echo $item['price'] . "$" . '<br>';
                        echo $item['stock']; ?>
                    </div>
                    <form action="cartCount.php" method="get">
                        <input type="number" name="count" class="count" value="<?= $item['count'] ?>">
                        <input type="hidden" name="id" value="<?= $key ?>">
                        <button class="shopUnitDelete"
                                style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                        ">количество</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

