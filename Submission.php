<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/11/14
 * Time: 9:34 PM
 */

session_start();

require_once('config/database.php');
require_once('libs/validations.php');
require_once('libs/database.php');

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

    public function isValid(){

        if(!validateName($this->name)){
            $_SESSION['validation']['name'] = "Name is invalid";
        }else{
            unset($_SESSION['validation']['name']);
        }

        if(!validatePhone($this->phone)){
            $_SESSION['validation']['phone'] = "Phone is invalid";
        }else{
            unset($_SESSION['validation']['phone']);
        }

        if(!validateEmail($this->email)){
            $_SESSION['validation']['email'] = "Email is invalid";
        }else{
            unset($_SESSION['validation']['email']);
        }

        if(!validateMessage($this->message)){
            $_SESSION['validation']['message'] = "Message is invalid";
        }else{
            unset($_SESSION['validation']['message']);
        }

        if(count($_SESSION['validation']) == 0){
            $this->store();
            header('Location:success.php');
        }else{
            header('Location:index.php? session = $_SESSION');
        }

    }

    function store(){

        createtable('to_contact',
            array(
                'name' => 'CHAR(30) NOT NULL',
                'phone' => 'CHAR(30) NOT NULL',
                'email' => 'CHAR(30) NOT NULL UNIQUE',
                'message' => 'CHAR(225) NOT NULL'
            ));

        createtable('to_notify',
            array(
                'email' => 'CHAR(30) NOT NULL UNIQUE'
            ));

        inserttable('to_contact',
            array(
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'message' => $this->message
            ));

        if($this->newsletter) {

            inserttable('to_notify',
                array(
                    'email' => $this->email
                ));

        }

        $from = $this->email; // sender
        $subject = "Contact Me!";
        $message = "ip: ".$_SERVER['REMOTE_ADDR'].", Messge: ".$this->message;
        // send mail
        if(!mail("logan@loganhenson.com",$subject,$message,"From: $from\n")){
            die('email error');
        }

    }

} 