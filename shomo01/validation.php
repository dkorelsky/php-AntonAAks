<?php

$requiredFields = ['firstname', 'email', 'address', 'city'];
$errors = [];

unset($_COOKIE['validationErrors']);
setcookie( 'validationErrors' , '' , time()-3600 , '/' , '' , 0 );

foreach ($requiredFields as $field) {
    if(isset($_POST[$field])) {
        if (empty($_POST[$field])) {
            $errors[$field] = '<label style="color: red;">Обязательное поле</label>';
        }
    }
}

if(!empty($errors)) {
    setcookie('fields', json_encode($_POST, JSON_UNESCAPED_UNICODE));
    setcookie('validationErrors', json_encode($errors, JSON_UNESCAPED_UNICODE));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    unset($_COOKIE['validationErrors']);
    setcookie( 'validationErrors' , '' , time()-3600 , '/' , '' , 0 );

    unset($_COOKIE['fields']);
    setcookie( 'fields' , '' , time()-3600 , '/' , '' , 0 );
}
?>