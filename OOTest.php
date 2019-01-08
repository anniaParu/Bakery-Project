<?php
class OOTest{
	  public $query;
	  public $test_result;

    public function setQuery($query){
       $this->query = $query;
    }
    public function getQuery(){
	  return $this->query;
    }

    public function check_obj($obj)
    {
    if(!is_object($obj)){
      return false;
    }
    return $obj->goods;

    }
}

include('crud.php');
   $crud = new Crud();
   $test= new OOTest();

   $query  = "select * from goods";

   $test->setQuery($query);

   $result = $crud->getObject($test->getQuery());

   $obj = new stdClass();

   echo "Test Successfull!!! <br>";

   foreach ($result as $key => $value) {
	    $obj->goods = array(
      $value->name

	);

    foreach ( $test->check_obj($obj) as $key => $values) {
	   echo $values . "<br>";
    }

  }
?>

