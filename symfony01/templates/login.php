<?php
?>

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
            <form action="index.php" method="POST">
                <input type="hidden" name="page" value="main">
                <div class="row">
                    <div class="col-50">

                        <div class="row">
                            <div class="col-50">
                                <label for="phonenumber"> Номер телефона</label><?php if (isset($errors->phonenumber)) {
                                    echo $errors->phonenumber;
                                } ?>
                                <input type="text" id="pnum" name="phonenumber" placeholder=""
                                       value=" <?php if (isset($fields->phonenumber)) {
                                           echo $fields->phonenumber;
                                       } ?>">
                            </div>
                            <div class="col-50">
                                <label for="email"> Почта </label><?php if (isset($errors->email)) {
                                    echo $errors->email;
                                } ?>
                                <input type="text" id="email" name="email" placeholder=""
                                       value="<?php if (isset($fields->email)) {
                                           echo $fields->email;
                                       } ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-50">
                        <h3>Регистрация/Вход</h3>

                        <label for="firstname">Имя</label><?php if (isset($errors->firstname)) {
                            echo $errors->firstname;
                        } ?>
                        <input type="text" id="fname" name="firstname"
                               placeholder="" value="<?php if (isset($fields->firstname)) {
                            echo $fields->firstname;
                        } ?>">
                        <label for="lastname">Фамилия</label><?php if (isset($errors->lastname)) {
                            echo $errors->lastname;
                        } ?>
                        <input type="text" id="lname" name="lastname" placeholder=""
                               value=" <?php if (isset($fields->lastname)) {
                                   echo $fields->lastname;
                               } ?>">
                        <label for="city"> Город</label><?php if (isset($errors->city)) {
                            echo $errors->city;
                        } ?>
                        <input type="text" id="city" name="city" placeholder=""
                               value=" <?php if (isset($fields->city)) {
                                   echo $fields->city;
                               } ?>">

                        <div class="row">
                            <div class="col-50">
                                <label for="country"> Страна </label><?php if (isset($errors->country)) {
                                    echo $errors->country;
                                } ?>
                                <input type="text" id="country" name="country" placeholder=""
                                       value=" <?php if (isset($fields->country)) {
                                           echo $fields->country;
                                       } ?>">
                            </div>
                        </div>
                    </div>

                </div>
                <!--                <label>-->
                <!--                    <input type="checkbox" checked="checked" name="sameadr"> policy-->
                <!--                </label>-->
                <input type="submit" class="btn" value="подтвердить">
                <!--                <a href="index.php?page=goods" type="submit" class="btn">подтвердить </a>-->

            </form>

        </div>
        <div class=" col-25">
            <div class="container">
            </div>
        </div>
    </div>
</div>
