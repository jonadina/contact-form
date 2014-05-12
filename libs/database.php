<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/11/14
 * Time: 10:46 PM
 */

function createtable($table, $fields)
{
    global $cfdb;

    $sql = "CREATE TABLE IF NOT EXISTS `$table` (id MEDIUMINT NOT NULL AUTO_INCREMENT, ";

    foreach($fields as $field => $type)
    {
        $sql.= "`$field` $type,";
    }

    $sql .= "PRIMARY KEY (id));";

    try{
        $cfdb->exec($sql);
    }catch(PDOException $e){
        die("error: " . $e);
    }

}

function inserttable($table, $fields){

    global $cfdb;

    if($cfdb){

        $sql = "INSERT INTO `$table` (";

        $index = 0;
        foreach($fields as $col => $value)
        {
            $index++;
            if($index==1)
                $sql.= "$col";
            else
                $sql.= ", $col";
        }

        $sql.=") VALUES(";

        $index = 0;
        foreach($fields as $col => $value)
        {
            $index++;
            if($index==1)
                $sql.= "'$value'";
            else
                $sql.= ", '$value'";
        }

        $sql.=")";

        $statement = $cfdb->prepare($sql);

        try {

            $statement->execute($fields);

        } catch(PDOException $e) {

            die("Exception caught: $e");

        }
    }

}
