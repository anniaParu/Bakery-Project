<?php

class db_connection{

	private $host = 'localhost';
	private $username = 'root';
  private $password = '';
  private $database = 'berry_bakery';
  public $connection;


   public function __construct(){
      if(!isset($this->connection))
      {
        $this->connection  = new mysqli($this->host,$this->username,$this->password,$this->database);
        if(!$this->connection){
          echo "Error in connecting to database server";
             exit;
        }
      }
       return $this->connection;
  }

} 
?>