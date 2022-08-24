<?php
namespace App\Lib;

use PDO;
use PDOException;

class db{

    private $dbHost = "127.0.0.1";   
    private $dbUser = "root";       
    private $dbPass =  "Lunes08122";      
    private $dbName = "examenFinal";      

 
    protected $pdo;
    function __construct(){}
   
    public function conectDB(){
      try {
        $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
        $dbConnecion = new PDO($mysqlConnect, $this->dbUser, $this->dbPass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $dbConnecion;
      }catch (PDOException $e) {
        print "Error! : " . $e->getMessage() . "<br/>";
        die();
      }
      
    }
  }
  