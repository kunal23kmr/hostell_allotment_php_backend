<?php
require('fpdf/fpdf.php');
include 'cors.php';

// Assuming you've connected to your database
// Fetch data from database (for the sake of example, I'll use placeholder data)
$name = "John Doe"; // Replace with database data
$roll_no = "123456"; // Replace with database data
$department = "Computer Science"; // Replace with database data
$email_id = "johndoe@example.com"; // Replace with database data

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetMargins(20, 0, 20);

// Title
$pdf->Cell(0, 10, 'Annexure - D', 0, 1, 'C');

// Subtitle
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'DOCUMENT CHECKLIST', 0, 1, 'C');
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '(To be filled by the Student)', 0, 1, 'C');
$pdf->Ln(4);

// Personal Information
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 7, 'Name: ' . $name, 0, 1,'');
$pdf->Cell(0, 7, 'Roll No.: ' . $roll_no, 0, 1,'');
$pdf->Cell(0, 7, 'Department: ' . $department, 0, 1,'');
$pdf->Cell(0, 7, 'Course : B. Tech', 0, 1,'');
$pdf->Cell(0, 7, 'email ID: ' . $email_id, 0, 1,'');
$pdf->Ln(1);

// Date and Time placeholders
$pdf->Cell(0, 10, 'Date and Time of arrival: _______________(Date)', 0, 1,'');
//$pdf->Ln(1);
$pdf->Cell(0, 10, '                                        _______________ (Time)', 0, 1,'');
$pdf->Ln(1);

// Documents Checklist
$pdf->Cell(0, 10, 'I am submitting the following documents to the hostel office:');
$pdf->Ln(10);
$pdf->Cell(0, 10, ' 1. Admission Letter from Institute                           :  _____ (Yes / No)');
$pdf->Ln(10); 
$pdf->Cell(0, 10, ' 2. Institute Fee Receipt (Hosteler)                          : _____ (Yes / No)');
$pdf->Ln(10);
$pdf->Cell(0, 10, ' 3. Mess Advance Fee Receipt (July - Dec 2023)    : _____ (Yes / No)');
$pdf->Ln(10);
$pdf->Cell(0, 10, ' 4. Undertakings by student (Annexure - A & B)      : _____ (Yes / No)');
$pdf->Ln(10);
$pdf->Cell(0, 10, ' 5. Undertaking by Parent (Annexure - C)               : _____ (Yes / No)');
$pdf->Ln(10);
$pdf->Cell(0, 10, ' 6. Aadhaar Card (Self Attested)                             : _____ (Yes / No)');
$pdf->Ln(10);
$pdf->Cell(0, 10, ' 7. Passport Size Photographs (2 Nos.)                 : _____ (Yes / No)');
$pdf->Ln(20);

// Signatures
$pdf->Cell(0, 10, "Student(s) Signature with date: ______");
$pdf->Ln(10);
$pdf->Cell(0, 10, "Mobile No.: ________");
$pdf->Ln(7);
$pdf->Cell(0, 10, "___________________________________________________________________________");
$pdf->Ln(10);
// For office use only
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '(for office use only)', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Signature of Hostel Supervisor 1\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tSignature of Hostel Supervisor 2");
$pdf->Ln(20);
$pdf->Cell(0, 10, "Hostel Clerk");

$pdf->Output();
?>