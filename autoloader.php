<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/12/14
 * Time: 4:31 PM
 */
function autoload ($pClassName) {
    require_once("config/" . $pClassName . ".php");
    require_once("libs/" . $pClassName . ".php");
}

spl_autoload_register("autoload");