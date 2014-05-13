<?php
/**
 * Created by PhpStorm.
 * User: loganhenson
 * Date: 5/11/14
 * Time: 10:46 PM
 */
namespace ContactPackage\Database;

abstract class Database{

    private function createtable($table, $fields)
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

    private function inserttable($table, $fields){

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

            } catch(\PDOException $e) {

                die("Exception caught: $e");

            }
        }

    }

    public function store($data){

        $this->createtable('to_contact',
            array(
                'name' => 'CHAR(30) NOT NULL',
                'phone' => 'CHAR(30) NOT NULL',
                'email' => 'CHAR(30) NOT NULL UNIQUE',
                'message' => 'CHAR(225) NOT NULL'
            ));

        $this->createtable('to_notify',
            array(
                'email' => 'CHAR(30) NOT NULL UNIQUE'
            ));

        //update

        $this->inserttable('to_contact',
            array(
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'message' => $this->message
            ));
        //notify Admin
        //Mailer::notifyAdmin();

        die('working');

        if($this->newsletter) {

            inserttable('to_notify',
                array(
                    'email' => $this->email
                ));

        }

    }


}
