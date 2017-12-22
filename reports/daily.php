<?php

/*
$month = @$_GET['month'];
$day = @$_GET['day'];
$year = @$_GET['year'];
$tmonth = @$_GET['tmonth'];
$tday = @$_GET['tday'];
$tyear = @$_GET['tyear'];
*/

$from = $_GET['from'];
$to = $_GET['to'];
$netTotal = 0;

require_once '../potato.env.php';
require('fpdf.php');

//Connect to your database
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//$result=mysqli_query($con,"select rmt_trackno,rmt_sname,rmt_fee,rmt_date from tbl_remittance where (extract(day from rmt_date)) = $day and (extract(month from rmt_date) = $month) and (extract(month from rmt_date) = $year)");
//---$result=mysqli_query($con,"select trackno,sender_name,fee,date from remittance where (date between '$from' and '$to')");
$result=mysqli_query($con,"select trackno,sender_name,fee,date from remittance where (date between DATE_SUB('$from',INTERVAL 1 DAY) and DATE_ADD('$to',INTERVAL 1 DAY))");
#####
$number_of_products = mysqli_num_rows($result);

//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";
$total = 0;

//For each row, add the field to the corresponding column
$column_trackno= "";
$column_destination= "";
$column_expected= "";
$column_name= "";
while($row = mysqli_fetch_assoc($result))
{
	$trackno = "REMITTANCE";//'RM201700'.$row['rmt_trackno'];
	$name = substr($row["sender_name"],0,20);
	$destination = $row["fee"];
	$expected = $row['date']; //number_format($row["Price"],',','.','.');
	$column_trackno = $column_trackno.$trackno."\n";
	$column_name = $column_name.$name."\n";
	$column_destination = $column_destination.$destination."\n";
	$column_expected = $column_expected.$expected."\n";

	$netTotal += $destination;

	//Sum all the Prices (TOTAL)
	//$total = $total+$real_price;
}

######

//$result=mysqli_query($con,"select pkg_trackno,pkg_sname,pkg_fee,pkg_dispatch from tbl_package where (extract(day from pkg_dispatch)) = $day and (extract(month from pkg_dispatch) = $month) and (extract(month from pkg_dispatch) = $year)");
$result=mysqli_query($con,"select trackno,sender_name,fee,dispatch from package where (dispatch between DATE_SUB('$from',INTERVAL 1 DAY) and DATE_ADD('$to',INTERVAL 1 DAY))");
while($row = mysqli_fetch_assoc($result))
{
	$trackno = "PACKAGE";//'RM201700'.$row['rmt_trackno'];
	$name = substr($row["sender_name"],0,20);
	$destination = $row["fee"];
	$expected = $row['dispatch']; //number_format($row["Price"],',','.','.');
	$column_trackno = $column_trackno.$trackno."\n";
	$column_name = $column_name.$name."\n";
	$column_destination = $column_destination.$destination."\n";
	$column_expected = $column_expected.$expected."\n";

	$netTotal += $destination;

	//Sum all the Prices (TOTAL)
	//$total = $total+$real_price;
}

$number_of_products += mysqli_num_rows($result);
mysqli_close($con);

//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
$total = 0.00;//number_format($total,',','.','.');

//Create a new PDF file
class PDF extends FPDF{
	public $from;
	public $to;

	function Footer()
{
		//Position at 1.5 cm from bottom
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//Page number
		$this->Cell(0,10,'Page '.$this->PageNo().' Recieved Money Remittances',0,0,'C');
}

		function Header()
{
		//Logo
		$this->Image('letter.jpg',0,0,217,280);
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//Move to the right
		$this->Cell(80);
		//Title
		$this->SetY(60);
		$this->SetX(90);
		$this->SetTextColor(51, 51, 51);
		$this->Cell(30,10,"Income Report From : $this->from To : $this->to",0,0,'C');
		//Line break
		$this->Ln(20);
	}

	function access_me($from,$to){
		$this->from = $from;
		$this->to = $to;
	}



}

$pdf=new PDF('P','mm',array(215.9 ,279.4));
$pdf->access_me($from,$to);
$pdf->SetFont('helvetica','',12);
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 70;
//Table position, under Fields Name
$Y_Table_Position = 76;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(59, 89, 152);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

//Bold Font for Field Name
$pdf->SetFont('helvetica','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(20);
$pdf->Cell(40,6,'Transaction',1,0,'C',1);
$pdf->SetX(60);
$pdf->Cell(60,6,'Consignor',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'Fee',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(50,6,'Date',1,0,'C',1);

$pdf->Ln();

//Now show the 3 columns
$pdf->SetTextColor(82, 86, 89);
$pdf->SetFont('helvetica','',12);
$pdf->SetY($Y_Table_Position);





$pdf->SetFillColor(233, 235, 238);
$pdf->SetY($Y_Table_Position);
$pdf->SetDrawColor(217, 217, 217);
$pdf->SetX(20);
$pdf->MultiCell(40,6,$column_trackno,1,'C',true);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(60,6,$column_name,1,'C',true);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(30,6,$column_destination,1,'C',true);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(50,6,$column_expected,1,'C',true);

$pdf->SetFont('helvetica','B',12);
$pdf->SetX(20);
$pdf->MultiCell(100,20,'Total Number of Transactions : '.$number_of_products,0,'L');
$pdf->SetX(20);
$pdf->MultiCell(100,20,'Total Income : '.$netTotal,0,'L');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
//drawline

$pdf->SetDrawColor(217, 217, 217);
while ($i < $number_of_products)
{
	$pdf->SetX(20);
	$pdf->MultiCell(180,6,'',1);
	$i = $i +1;
}





$pdf->Output();
?>
