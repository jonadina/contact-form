<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/11/14
 * Time: 9:45 PM
 */

function validateName($name){
    if(strlen($name)>0){
        return true;
    }else{
        return false;
    }
}

function validatePhone($phone){
    $pattern = '/^[\d]{10}$/';
    if(preg_match($pattern, $phone)){
        return true;
    }else{
        return false;
    }
}

function validateEmail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function validateMessage($message){
    if(strlen($message)>25){
        return true;
    }else{
        return false;
    }
}