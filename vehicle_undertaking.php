<?php
require_once("db.php");
require('fpdf/fpdf.php');
include 'cors.php';


session_start();



$appid=$_SESSION['appid'];

$data_sql="select * from student_data where application_id='$appid'";
                $result=mysqli_query($con,$data_sql);
                $data=mysqli_fetch_array($result);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times', 'BU', 12);
$pdf->SetMargins(25, 0, 25);



$pdf->Ln(20);
// Title
$pdf->MultiCell(0, 5, 'Annexure-B', 0, 'R');
$pdf->Ln(5);
// Subtitle
$pdf->SetFont('Times', 'BU', 12);
$pdf->MultiCell(0, 7, 'UNDERTAKING BY THE STUDENT FOR NOT OWNING AND/OR USING MOTOR DRIVEN VEHICLES IN THE INSTITUTE CAMPUS',0,'C',0,1);
$pdf->Ln(10);

// Content
$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(0, 7, "I, " . $data['name'] . ", son/daughter of Mr./Ms " . $data['father_name'] . ", resident of (home address) " . $data['address'] . " hereby submit an undertaking that");


// Bullet points
$pdf->Ln(10);
$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I will not own or make use of motor driven vehicle for commuting inside the campus \t\t\t\t\t\t\tduring my stay in the Institute. If in case, I am found to violate the above undertaking \t\t\t\t\t\t\tmy hostel seat will stand automatically cancelled without assigning any reasons.");

$pdf->Ln(2);

$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- Any visitor in my reference bringing a vehicle would follow the guidelines for \t\t\t\t\t\t\tregistering the vehicle at the Institute main gate and the hostel office, if required and I \t\t\t\t\t\t\twould be liable for punishment for any violation on this account.");

$pdf->Ln(10);

// Date and Place (left blank for user input)
$pdf->MultiCell(0, 10, "\t\t\t\t\t\t\tDate: _________________");
$pdf->MultiCell(0, 10, "\t\t\t\t\t\t\tPlace:_________________");

$pdf->Ln(25);

$pdf->SetFont('Times', 'BI', 12);
// Signature
$pdf->MultiCell(0, 10, "Name & Signature of the Student\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tName & Signature of the Parent/Guardian");

$pdf->Output();
?>