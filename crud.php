<?php
include_once 'db_connection.php';
class Crud extends db_connection
{
    public function __construct(){
        parent::__construct();
    }

    public function getData($query) {
        $result = $this->connection->query($query);
        if ($result == false)
        {
            return false;
        }

        $rows = array();
        while ($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }

        return $rows;
    }


    public function getObject($query){
     $result = $this->connection->query($query);

     if($result == false){
       return false;


     }

      $rows = array();

      while($row = mysqli_fetch_object($result)){
       $rows[] = $row;
     }
       return $rows;

   }


   public function execute_single($query)
  {
  $result = $this->connection->query($query);

   return $result;

  }
   public function execute($query){
    $result = $this->connection->query($query);
     if($result == false){
       echo 'Error:cannot execute the command';
         return false;
         }else{
           return true;
          }
  }


  public function delete($id, $table){
    $query = "Delete from $table where id = '$id'";
    $execute = $this->connection->query($query);
    if($execute == false){
     echo "Error: cannot delete id " . $id."from table ".$table;
       return false;
    }
    else{
     return true;
    }
}

public function checkemail($email){
   $sql = "Select * from user where email = '$email'";
   $result = $this->connection->query($sql);
   $num_rows = mysqli_num_rows($result);
    return $num_rows;
}

// public  function esc_string($value){
// return $this->connection->real_escape_string($value);
//     }

public function browse($search){
  $query = "Select * from goods where name  like '%" . $search ."%' or category like '%" . $search ."%'";
  $result = $this->connection->query($query);
  $rows_count  = $result->num_rows;
   if($rows_count >0){
     while($rows = $result->fetch_assoc())
     {
       $this->data[] = $rows;

     }
       return $this->data;
   }
    else{
   
    }
}
}
?>