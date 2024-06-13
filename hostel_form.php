<?php
require('fpdf/fpdf.php');
include 'cors.php';

// Define the table output function
class PDF extends FPDF {
    var $widths;
    var $aligns;

    function SetWidths($w) {
        $this->widths = $w;
    }

    function SetAligns($a) {
        $this->aligns = $a;
    }

    function Row($data) {
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        $this->CheckPageBreak($h);
        for($i=0;$i<count($data);$i++) {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            $x=$this->GetX();
            $y=$this->GetY();
            $this->Rect($x,$y,$w,$h);
            $this->MultiCell($w,5,$data[$i],0,$a);
            $this->SetXY($x+$w,$y);
        }
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt) {
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb) {
            $c=$s[$i];
            if($c=="\n") {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax) {
                if($sep==-1) {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

//$pdf->Image('college_logo.jpg',10,6,30);
$pdf->Cell(0, 10, 'Dr B R AMBEDKAR NATIONAL INSTITUTE OF TECHNOLOGY', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'G T Road Bye Pass, Jalandhar-144011, Punjab (India)', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Mandatory document (check list)', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);

$pdf->SetWidths(array(60, 20, 60, 20));
$pdf->Row(array("For new students:-", "Y/N", "For old students:", "Y/N"));

$documents_new = array(
    "a) Provisional admission letter.",
    "a) Letter of JOSSA/CSAB, CCMT, SS, CCMN etc.",
    "b) Receipt of Institute fee. (with hosteller)",
    "c) Receipt of Mess advance fee.",
    "d) Anti-ragging Undertaking of Students and Parents.",
    "e) Photo Id proof. (Adhar card, Passport etc.)",
    "f) 2 Passport size photo."
);

$documents_old = array(
    "a) Receipt of Institute fee. (with hosteller)",
    "b) Receipt of Mess advance fee.",
    "c) No due from the previous hostel.",
    "d) Anti-ragging Undertaking of Students and Parents.",
    "e) Photo Id proof (Adhar card, Passport etc.)",
    "f) 2 Passport size photo.",
    ""
);

for($i=0; $i<count($documents_new); $i++) {
    $pdf->Row(array($documents_new[$i], "", $documents_old[$i], ""));
}

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Hostel Rules & Regulations:-', 0, 1);

$pdf->SetFont('Arial', '', 12);

$rules = array(
    "Rules and regulations concerning hostels enforced from time to time are to be strictly followed.",
    // You can add more rules here
);

foreach($rules as $index => $rule) {
    $pdf->Cell(10, 7, ($index + 1) . ".", 0, 0);
    $pdf->MultiCell(0, 7, $rule);
}

$pdf->Ln(10);
$pdf->Cell(0, 7, "“Ragging is prohibited as per the decision of the Supreme Court of India in Writ Petition No. (C) 656 /1998”.", 0, 1);

$pdf->Ln(20);
$pdf->Cell(0, 7, "Signature of Parent/Guardians________                                  Signature of Student______", 0, 1);

$pdf->Output();
?>
