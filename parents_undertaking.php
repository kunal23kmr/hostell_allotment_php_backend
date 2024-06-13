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


$pdf->Ln(15);
$pdf->SetFont('Times', 'BU', 12);

// Title
$pdf->MultiCell(0, 5, 'Annexure-C', 0, 'R');

// Subtitle
$pdf->SetFont('Times', 'BU', 12);
$pdf->MultiCell(0, 7, 'UNDERTAKING BY THE PARENT / GUARDIAN',0,'C',0,1);
$pdf->Ln(5);
$pdf->MultiCell(0, 7, 'REGARDING MENTAL HEALTH OF STUDENTS & AWARENESS OF THE MEDICAL FACILITIES AT INSTITUTE HEALTH CENTRE',0,'C',0,1);
$pdf->Ln(10);

// Content
$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(0, 7, "I, " . $data['father_name'] . ", Father/Mother/Guardian of Mr./Ms " .$data['name']  . ", resident of (home address) " . $data['address'] . " hereby declare the following in respect of my ward for admission at Dr B R Ambedkar, National Institute of Technology Jalandhar.");

$pdf->Ln(5);

$pdf->MultiCell(0, 10, "I am fully aware of the following:");


// Bullet points

$pdf->MultiCell(0, 7, "\t\t\t\t\t- I am fully aware that the educational journey can bring about various challenges and \t\t\t\t\t\t\tpressures, and I understand that my child may experience stress, anxiety or other mental \t\t\t\t\t\t\thealth issues during their time at the institution.");
$pdf->Ln(3);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I recognize the potential impact of academic, social and personal pressures on my childs \t\t\t\t\t\tmental well-being. I understand that these challenges are a part of life and are not solely \t\t\t\t\t\tattributed to the educational institute.");
$pdf->Ln(3);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I acknowledge that Dr B R Ambedkar NIT Jalandhar has taken measures to provide academic \t\t\t\t\t\t\tand emotional support to students, including access to counselling services and other \t\t\t\t\t\t\tresources aimed at addressing mental health concerns.");
$pdf->Ln(3);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I agree not to hold Dr B R Ambedkar NIT Jalandhar, its administrators, teachers, staff \t\t\t\t\t\t\tmembers or any other associated parties responsible or liable for any mental health \t\t\t\t\t\t\tdifficulties, including but not limited to suicide attempts, that my child may experience during \t\t\t\t\t\t\ttheir enrollment at the institution. Despite the best efforts on part of the NIT Jalandhar, if any \t\t\t\t\t\tunforeseen event takes place to my ward, I shall not hold Institute accountable and will not \t\t\t\t\t\t\tseek any financial help or compensation for the same from any court of law.");
$pdf->Ln(3);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- The Institute has a dispensary in the campus for its community and have limited medical \t\t\t\t\t\t\tfacilities, which may not be adequate for treatment of chronic or serious ailments requiring \t\t\t\t\t\t\tspecial medical infrastructure and specialization.");
$pdf->Ln(3);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- In case of any medical emergency, I shall coordinate the well-being of my ward as it is the \t\t\t\t\t\t\tresponsibility of the parents / guardian to take care of their ward for treatment outside the \t\t\t\t\t\t\tInstitute campus.");
$pdf->AddPage();
$pdf->Ln(30);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I authorize the institute authorties as signatory on my behalf if required by the Doctor in the \t\t\t\t\t\t\tempaneled hospital at Jalandhar during any medical emergency or other exigency.");

$pdf->Ln(3);
$pdf->MultiCell(0, 7, "\t\t\t\t\t- I will be present physically as and when the Institute will ask me during his / her stay in case \t\t\t\t\t\t\tof any extreme exigency such as serious health issue, depression, mental problem, act of \t\t\t\t\t\t\tindiscipline, etc. ");
//$pdf->MultiCell(0, 7, "- I understand that due to limited hostel facility, the inmates have to share the available resources in the hostel and I have no objection for the same. In case I am not comfortable with the infrastructure provided to me, I will vacate the hostel and will not involve in any kind of protest in this regard.");

$pdf->Ln(5);

// Date and Place (left blank for user input)
$pdf->MultiCell(0, 10, "\t\t\t\t\t\t\tDate: _____________ ");
$pdf->MultiCell(0, 10, "\t\t\t\t\t\t\tPlace:_____________");

$pdf->Ln(20);

$pdf->SetFont('Times', 'BI', 12);
// Signature
$pdf->MultiCell(0, 10, "Name & Signature of the Parent/Guardian\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tName & Signature of the Student");

$pdf->Output();
?>



