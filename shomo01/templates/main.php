<?php
$user = $_POST;
if (isset($_COOKIE['last-user-id'])) {
    $id = $_COOKIE['last-user-id'] + 1;
} else {
    $id = 0;
}

require('validation.php');

if (isset($_COOKIE['users'])) {
    $users = json_decode($_COOKIE['users'], true);
} else {
    $users = [];
}

$users[$id] = $user;

setcookie('last-user-id', $id);
setcookie('users', json_encode($users));
echo '<pre>';
var_dump($users);
echo '</pre>'
?>

<div id="promo">
        <h1 id="promoText">
            главная страница
</h1>
    </div>

    <div id="mainTextWrap">
        <div id="mainText">
        </div>
    </div>

