<?php
require('fpdf/fpdf.php');
include 'cors.php';


// Create a new PDF document
$pdf = new FPDF();

// Add a new page
$pdf->AddPage();

// Set the font
$pdf->SetFont('Arial', 'B', 12);

// Title
$pdf->Cell(0, 10, 'DOCUMENT CHECKLIST', 0, 0, 'C');

// Subtitle
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Hostel Admission Form', 0, 0, 'C');

// Body
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(0, 5, 'Name', 0, 'L');
$pdf->MultiCell(0, 5, ': ' . $_POST['name'], 0, 'L');
$pdf->Ln(5);
$pdf->MultiCell(0, 5, 'Roll No.', 0, 'L');
$pdf->MultiCell(0, 5, ': ' . $_POST['roll_no'], 0, 'L');
$pdf->Ln(5);
$pdf->MultiCell(0, 5, 'Department', 0, 'L');
$pdf->MultiCell(0, 5, ': ' . $_POST['department'], 0, 'L');
$pdf->Ln(5);
$pdf->MultiCell(0, 5, 'Course', 0, 'L');
$pdf->MultiCell(0, 5, ': ' . $_POST['course'], 0, 'L');
$pdf->Ln(5);
$pdf->MultiCell(0, 5, 'email ID', 0, 'L');
$pdf->MultiCell(0, 5, ': ' . $_POST['email_id'], 0, 'L');
$pdf->Ln(5);
$pdf->MultiCell(0, 5, 'Date and Time of arrival', 0, 'L');
$pdf->MultiCell(0, 5, ': ' . $_POST['date_time_of_arrival'], 0, 'L');

// Footer
$pdf->SetY(-10);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');

// Output the PDF file
$pdf->Output();
?>
