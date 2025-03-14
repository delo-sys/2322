<?php

// Using FPDF to create a PDP
require('fpdf/fpdf.php');

// create a PDF class extending FPDF
class mypdf extends FPDF{
    // page header
    function header() {
        // logo
        // $this->image ('logo.png'/10,6,30);

        // arial bold 15
        $this->setfont ('Arial','B',15);

        // move to the right 
        $this->cell(80);

        // title
        $this->cell(30,10,'company report',0,0,'C');

        // line break
        $this->ln(20); 
    }

    // page footer
    function footer(){
        // position at 1.5 com from bottom 
        $this->setY(-1.5);

        // arial italic 8
        $this->setfont ('Arial', 'I',8);

        // page number 
        $this->cell(0,10,'page'. $this->pageno());
    }
}
// generate  A PDF document 
function generatePDF($title,$content,$filename='document.pdf'){
    // create a new PDF instance
    $pdf=new mypdf();

    // set document information
    $pdf->SetAuthor('PHP system');
    $pdf->SetTitle($title);

    // set auto page break 
    $pdf->Addpage ();

    // set font
    $pdf->Write(10,$content);

    // output the PDF 
    $pdf->Output($filename,'D');//'D' means download
} 

// example usage 
$title="volt verse";
$content= "this is a sample PDF generated using FPDF libary in PHP./n/n";
$content .= "it demostrates how to create dynamic PDF files from PHP applications";

// call the function to generate and download the PDF
generatePDF($title,$content,"pop.pdf"); 