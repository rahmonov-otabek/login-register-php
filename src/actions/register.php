<?php

require_once __DIR__ . '/../helpers.php';

// Get data
$avatarPath = null;

$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordCofirmation = $_POST['password_confirmation'] ?? null;
$avatar = $_FILES['avatar'] ?? null;

addOldValue('name', $name);
addOldValue('email', $email);

// Validation
if (empty($name)){ 
    addValidationError('name', 'Ism xato');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    addValidationError('email', 'Elektron pochta xato');
}

if (empty($password)){
    addValidationError('password', 'Parol xato');
}

if ($password != $passwordCofirmation){
    addValidationError('password_confirmation', 'Parollar bir xil emas');
}

if (!empty($avatar)){
    $types = ['image/jpeg', 'image/jpg', 'image/png'];

    if (!in_array($avatar['type'], $types)){
        addValidationError('avatar', 'Rasm xato formatda yuklangan. (jpeg, jpg, png formatida emas)');
    }

    if (($avatar['size'] / 1000000) >= 1){
        addValidationError('avatar', 'Rasm hajmi 1 mb dan katta');
    }
    
}


if (!empty($_SESSION['validation'])){
    redirect('/register.php');
}


if (!empty($avatar)){ 
    $avatarPath = uploadFile($avatar, 'avatar');
}

var_dump($avatarPath);
