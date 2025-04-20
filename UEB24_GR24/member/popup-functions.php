<?php

define("MIN_PASSWORD_LENGTH", 8);

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePassword($password) {
    return preg_match("/^(?=.*\d).{" . MIN_PASSWORD_LENGTH . ",}$/", $password);
}

function validateName($name) {
    return preg_match("/^[A-Za-z]+$/", $name);
}

function validateUsername($username) {
    return preg_match("/^[A-Za-z0-9_]{5,15}$/", $username);
}

function formatUsername($username) {
    return ucfirst(strtolower($username));
}
?>