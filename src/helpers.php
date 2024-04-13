<?php

session_start();

function redirect(string $path)
{
    header("Location: $path");
    die();
}

function addValidationError(string $fieldname, string $message)
{
    $_SESSION['validation'][$fieldname] = $message;
}

function hasValidationError(string $fieldname): bool
{
    return isset($_SESSION['validation'][$fieldname]);
}

function validationErrorAttr(string $fieldname)
{
    echo isset($_SESSION['validation'][$fieldname]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage(string $fieldname)
{
    $message = $_SESSION['validation'][$fieldname] ?? '';
    unset($_SESSION['validation'][$fieldname]); 
    echo $message; 
}
 

function addOldValue(string $key, mixed $value)
{
    $_SESSION['old'][$key] = $value;
}

function getOldValue(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]); 
    return $value;
}
 
function uploadFile(array $file, string $prefix = ''): string
{
    $uploadPath = __DIR__ . '/../uploads';

    if (!is_dir($uploadPath)){
        mkdir($uploadPath, 0777, true);
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = $prefix . '_' . time() . ".$ext";
 

    if (!move_uploaded_file($file['tmp_name'], "$uploadPath/$fileName")){
        die('Fayl yuklashda xatolik yuz berdi');
    }

    return "uploads/$fileName";
}