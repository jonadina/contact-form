<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/11/14
 * Time: 9:37 PM
 */

//include_once('Submission.php');

error_reporting(E_ALL);
ini_set("display_errors", 1);

$submission = new Submission(
    $_POST['name'],
    $_POST['phone'],
    $_POST['email'],
    $_POST['message'],
    $_POST['newsletter']
);

if($submission->isValid()){
    $submission->store();
    header('Location:success.php');
}else{
    die('bad');
}