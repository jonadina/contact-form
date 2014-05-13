<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/11/14
 * Time: 9:34 PM
 */

namespace ContactPackage\Submission;

require_once('Database.php');
require_once('Mailer.php');

class Submission {

    private $name;
    private $phone;
    private $email;
    private $message;
    private $newsletter;

    function __construct($name, $phone, $email, $message, $newsletter){

        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
        $this->newsletter = $newsletter;

    }

    private function validateName($name){
        if(strlen($name)>0){
            return true;
        }else{
            return false;
        }
    }

    private function validatePhone($phone){
        $pattern = '/^[\d]{10}$/';
        if(preg_match($pattern, $phone)){
            return true;
        }else{
            return false;
        }
    }

    private function validateEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    private function validateMessage($message){
        if(strlen($message)>25){
            return true;
        }else{
            return false;
        }
    }

    public function isValid(){

        if(!$this->validateName($this->name)){
            $_SESSION['validation']['name'] = "Name is invalid";
        }else{
            unset($_SESSION['validation']['name']);
        }

        if(!$this->validatePhone($this->phone)){
            $_SESSION['validation']['phone'] = "Phone is invalid";
        }else{
            unset($_SESSION['validation']['phone']);
        }

        if(!$this->validateEmail($this->email)){
            $_SESSION['validation']['email'] = "Email is invalid";
        }else{
            unset($_SESSION['validation']['email']);
        }

        if(!$this->validateMessage($this->message)){
            $_SESSION['validation']['message'] = "Message is invalid";
        }else{
            unset($_SESSION['validation']['message']);
        }

        if(count($_SESSION['validation']) == 0){
            return true;
        }else{
            return false;
            //header('Location:index.php? session = $_SESSION');
        }

    }

} 