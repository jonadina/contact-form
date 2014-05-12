<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/11/14
 * Time: 11:12 PM
 */

$dbhost = "localhost";
$dbname = "contact-form_db";
$dbusername = "root";
$dbpassword = "root";

$cfdb = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8","$dbusername","$dbpassword");