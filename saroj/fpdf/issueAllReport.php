

<?php 

require('fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=blood','root','');

class PDF extends FPDF
{
	//page header

function Header()
{
	$this->Image('logo.png',10,6,30);
	$this->SetFont('Arial','B',25);
	$this->Cell(120);
	$this->Cell(30,10,'Issue Blood Report',0,0,'C');
	$this->SetFont('Arial','B',9);
	$this->Cell(90);
	$this->Cell(0,0,'Date: '.$this->currentdate = date("m-d-y"),0,60,'C');
	$this->Ln(10);
	$this->SetFont('Arial','B',17);
	$this->Cell(120);
	$this->Cell(30,10,'Red Bank',0,0,'C');
	$this->Ln(10);
	$this->SetFont('Arial','B',11);
	$this->Cell(120);
	$this->Cell(30,10,'www.redbank.com',0,0,'C');
	
	$this->Ln(20);
	$this->Line(20, 45, 290-20, 45);
	$this->Ln(10);
}

//page Footer

function Footer() {
	$this->SetY(-15);
	$this->SetFont('Arial','B',10);
	$this->Cell(0,10,'www.redbank.com',0,0,'C');
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,60,'C');
}

function headerTable(){
	$this->SetFont('Times','B',9);
	$this->Cell(5);
	$this->Cell(10,7,'ID',1,0,'C');
	$this->Cell(40,7,'Donar_Name',1,0,'C');
	$this->Cell(40,7,'Donar_Email',1,0,'C');
	$this->Cell(35,7,'Donar_Group',1,0,'C');
	$this->Cell(20,7,'Issue_Date',1,0,'C');
	$this->Cell(40,7,'Request_Name',1,0,'C');
	$this->Cell(40,7,'Request_Email',1,0,'C');
	$this->Cell(35,7,'Request_Group',1,0,'C');
	$this->Ln();

}
function viewTable($db) {
	$this->SetFont('Times','',10);
	$stmt = $db->query('select * from issue');
	while($data = $stmt->fetch(PDO::FETCH_OBJ)){
		$this->Cell(5);
		$this->Cell(10,7,$data->issue_id,1,0,'C');
		$this->Cell(40,7,$data->issue_from,1,0,'L');
		$this->Cell(40,7,$data->issue_from_email,1,0,'L');
		$this->Cell(35,7,$data->issue_from_group,1,0,'L');
		$this->Cell(20,7,$data->issue_date,1,0,'L');
		$this->Cell(40,7,$data->issue_to,1,0,'L');
		$this->Cell(40,7,$data->issue_to_email,1,0,'L');
		$this->Cell(35,7,$data->issue_to_group,1,0,'L');
		$this->Ln();
	}
}

}

// Connect to database


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf -> AddPage('L','A4',0);
$pdf -> headerTable();
$pdf -> viewTable($db);
$pdf -> Output();


 ?>