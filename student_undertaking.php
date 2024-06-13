<?php
session_start();
include 'cors.php';

require('fpdf/fpdf.php');
require_once("db.php");
require('fpdf/makefont/makefont.php');

$appid=$_SESSION['appid'];

$data_sql="select * from student_data where application_id='$appid'";
                $result=mysqli_query($con,$data_sql);
                $data=mysqli_fetch_array($result);


// Retrieve data from database (for the sake of example, I'll use placeholder data)
$student_name = "John Doe"; // Replace with database data
$parent_name = "Jane Doe";  // Replace with database data
$address = "123 ABC Street, Example City, 12345"; // Replace with database data

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(20, 0, 20);


$pdf->SetFont('Times', 'B', 12);
$pdf->Ln(15);
// Title
$pdf->MultiCell(0, 0, 'Annexure-A', 0, 'R');
$pdf->MultiCell(0, 0, '___________', 0, 'R');
$pdf->Ln(5);
// Subtitle
$pdf->SetFont('Times', 'BU', 13);
$pdf->Cell(0, 0, 'UNDERTAKING BY THE HOSTEL INMATES', 0, 1, 'C');
$pdf->Ln(12);

//Content
$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(0, 7, "I, " . $data['name'] . ", son/daughter of Mr./Ms " .$data['father_name']  . ", resident of (home address) " . $data['address'] . " have gone through and understood the guidelines and protocols for staying in the Institute hostels. I understand that if I am found to have given wrong information in the declaration below or not following protocols after onboarding at the institute, I will be liable for disciplinary action.");



// $pdf->SetFont('Times', '', 12);  // Set font to Arial, Regular, and size 12
// $pdf->Write(7, "I, ");

// $pdf->SetFont('Times', 'B', 12);  // Set font to Arial, Bold, and size 12
// $pdf->Write(7, $data['name']);

// $pdf->SetFont('Times', '', 12);  // Back to regular font
// $pdf->Write(7, ", son/daughter of Mr./Ms ");

// $pdf->SetFont('Times', 'B', 12);
// $pdf->Write(7, $data['father_name']);

// $pdf->SetFont('Times', '', 12);
// $pdf->Write(7, ", resident of (home address) ");

// $pdf->SetFont('Times', 'B', 12);
// $pdf->Write(7, $data['address']);

// $pdf->SetFont('Times', '', 12);
// $pdf->Write(7, " have gone through and understood the guidelines and protocols for staying in the Institute hostels. I understand that if I am found to have given wrong information in the declaration below or not following protocols after onboarding at the institute, I will be liable for disciplinary action.");


 $pdf->Ln(5);

 $pdf->MultiCell(0, 10, "I declare that:");



// Bullet points

$pdf->MultiCell(0, 7, "\t\t\t\t\t- I am not suffering from any prolonged physical and mental illness.");
 $pdf->Ln(2);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I also understand that if I am found in violation of any hostel rules, I will be liable for \t\t\t\t\t\t\t\tappropriate disciplinary action");
 $pdf->Ln(2);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I declare that without prior approval from concerned HOD/ Chief Warden/ Hostel Warden, I \t\t\t\t\t\t\t\twill not leave the station in any case.");
 $pdf->Ln(2);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I will inform my parents / guardians, if required, in case of any exigency such as depression, \t\t\t\t\t\t\t\tmental problem, act of indiscipline, etc.");
 $pdf->Ln(2);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I understand that due to limited hostel facility, the inmates have to share the available \t\t\t\t\t\t\t\tresources in the hostel and I have no objection for the same. In case I am not comfortable \t\t\t\t\t\t\t\twith the infrastructure provided to me, I will vacate the hostel and will not involve in any \t\t\t\t\t\t\t\tkind of protest in this regard.");
//$pdf->MultiCell(0, 7, "- I understand that due to limited hostel facility, the inmates have to share the available resources in the hostel and I have no objection for the same. In case I am not comfortable with the infrastructure provided to me, I will vacate the hostel and will not involve in any kind of protest in this regard.");
$pdf->Ln(10);
// Date and Place (left blank for user input)
$pdf->MultiCell(0, 7, "\t\t\t\t\t\t\t\tDate: _________________ ");
$pdf->MultiCell(0, 10, "\t\t\t\t\t\t\t\tPlace:_________________");

$pdf->Ln(25);

$pdf->SetFont('Times', 'IB', 12);
// Signature
$pdf->MultiCell(0, 10, "Name & Signature of the Student\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tName & Signature of the Parent/Guardian");

$pdf->Output();
?>



