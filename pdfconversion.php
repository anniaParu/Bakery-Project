<?php 
include_once('db_connection.php');
include_once('includes/fpdf/fpdf.php');
 
class PDF extends FPDF
 {
    function myCell($w,$h,$x,$t){
     $height = $h/3;
     $first  = $height+2;
     $second = $height+$height+$height+3;
     $len = strlen($t);
	 
     if($len>10){
       $txt = str_split($t,10);
       $this->SetX($x);
       $this->Cell($w,$first,$txt[0],'','','');
       $this->SetX($x);
       $this->Cell($w,$second,$txt[1],'','','');
       $this->SetX($x);
       $this->Cell($w,$h,'','LTRB',0,'L',0);

    }else{
      $this->SetX($x);
      $this->Cell($w,$h,$t,'LTRB',0,'L',0);
    }
  }
// Page header
function Header()
  {
    $this->SetFont('Arial','B',16);
    // Move to the right
    $this->Cell(75);
    // Title
    $this->Cell(40,11,'List of Goods',1,0,'C');
    // Line break
    $this->Ln(20);
  }
 
// Page footer
function Footer()
 {
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
 }
}
 
  $db = new db_connection();
  $connString =  $db->__construct();
  $display_heading = array('id'=>'ID', 'category'=> 'Category', 'name'=> 'Name','price'=> 'Price ', 'image' => 'Image');
 
  $result = mysqli_query($connString, "SELECT id,category,name,price,image from goods") or die("database error:". mysqli_error($connString));
  $header = mysqli_query($connString, "show columns from goods");
  $pdf = new PDF();
  
//header
 $pdf->AddPage();
//foter page
  $pdf->AliasNbPages();
  $pdf->SetFont('Arial','B',16);
  foreach($header as $key => $heading) {
    $pdf->Cell(38,12,$display_heading[$heading['Field']],1);
  }
  foreach($result as $row) {
   $pdf->Ln();

   foreach($row as $column){
     $x = $pdf->GetX();
     $pdf->myCell(38,50,$x,$column);
   }
 }
  $pdf->Output();

?>