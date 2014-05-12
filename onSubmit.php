<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/11/14
 * Time: 9:37 PM
 */

include_once('Submission.php');

session_start();

$submission = new Submission(
    $_POST['name'],
    $_POST['phone'],
    $_POST['email'],
    $_POST['message'],
    $_POST['newsletter']
);

$submission->isValid();