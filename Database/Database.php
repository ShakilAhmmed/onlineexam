<?php
include '../Config/Config.php';
class Database{
    
     protected $host=DB_HOST;
     protected $user=DB_USER;
     protected $pass=DB_PASS;
     protected $name=DB_NAME;

     private $connection;

     public function __construct()
     {
     	$this->Connection();
     }

     protected function Connection()
     {
     	$this->connection=new mysqli($this->host,$this->user,$this->pass,$this->name);
          if($this->connection->connect_errno)
         {
             die($this->connection->connect_error." Connection Fail!");
          }
     }


}
?>
