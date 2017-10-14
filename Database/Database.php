<?php

class Database{
    private $host   =DB_HOST;
    private $user   =DB_USER;
    private $pass   =DB_PASS;
    private $db_name=DB_NAME;

    public $connection;

    public function __construct()
    {
      $this->ConnectDb();
    }

    private function ConnectDb()
    {
      $this->connection=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
      if($this->connection->connect_errno)
      {
        die("Error".$this->connection->error.__LINE__);
      }
       //else
       // {
       // 	echo "Connected";
       // }
    }

  public function insert($table,$values)
  {
     $query="INSERT INTO $table SET $values";
     $insert=$this->connection->query($query) or die($this->connection->error.__LINE__);
     if($this->connection->affected_rows>0)
     {
       return $insert;
     }else {
       return false;
     }
  }

  public function select($table,$cols)
  {
    $query="SELECT $cols FROM $table";
    $select=$this->connection->query($query) or die($this->connection->error.__LINE__);
    if($select->num_rows>0)
    {
       return $select;
    }
    else
    {
      return false;
    }
  }

  public function selectby($table,$cols,$condition)
  {
     $query="SELECT $cols FROM $table WHERE $condition";
     $selectby=$this->connection->query($query) or die($this->connection->error.__LINE__);
    if($selectby->num_rows>0)
    {
       return $selectby;
    }
    else
    {
      return false;
    }
  }


  public function delete($table,$condition)
  {
    $query="DELETE FROM $table WHERE $condition";
    $delete=$this->connection->query($query) or die($this->conenction->error.__LINE__);
    if($this->connection->affected_rows>0)
    { 
      return $delete;
    }else
    {
      return false;
    }
  }

   public function update($table,$values,$condition)
   {
    $query="UPDATE $table SET $values WHERE $condition";
    $update=$this->connection->query($query) or die($this->connection->error.__LINE__);
    if($this->connection->affected_rows>0)
    {
      return $update;
    }else
    {
      return false;
    }
   }





}




 ?>