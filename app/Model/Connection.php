<?php
/*
Data:		23/05/2021
Programa: 	model/Connection.php
Autor:		Alisson Gubert Barbosa
*/
namespace App\model;

use mysqli;


define('HOST','localhost');
define('DBNAME','sinergia');
define('USER','root');
define('PASSWORD','');
define('ROOT_PATH', dirname(__FILE__));

class Connection{
    private static $connection;
    private function __construct(){

    }
    public static function getInstance(){
        if(!isset(self::$connection)){
            self::$connection = new mysqli(HOST, USER, PASSWORD);
            if(self::$connection->connect_error){
                die("Falha na conexão: ".self::$connection->connect_error);
            }
            if(!self::$connection->select_db(DBNAME)){
                $commands = file_get_contents(ROOT_PATH."/sinergia.sql"); 
                self::$connection->multi_query($commands);
            }
        }
        return self::$connection;
    }
}