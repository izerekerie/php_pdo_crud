<?php

class DbConnect{
   private $host="localhost";
   private $user="root";
   private $password="1qa2ws3ed";
   private $dbName="php_revision";
   

   public function connect(){
       $dsn='mysql:host='. $this->host. ';dbname='. $this->dbName;
       $pdo=new PDO($dsn, $this->user,$this->password);
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
       return $pdo;
   }
};
?>