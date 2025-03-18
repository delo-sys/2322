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
// generatePDF($title,$content,"pop.pdf"); 



// creating a more complex PDF with tables
function generateinvoicePDF($invoice_data){
    $pdf=new mypdf();
    $pdf->aliasnbpages(); // for page numbers
    $pdf->addpage();

    // add invoice header
    $pdf->setfont ('Arial','', 16);
    $pdf->cell (0,10,'invoice' ,0,1,'C');
    $pdf->setfont ('Arial','',12);
    $pdf->cell(0,10,'invoice #'.$invoice_data['invoice_number'],0,1);
    $pdf->cell(0,10,'date:'.$invoice_data['date'],0,1);
    $pdf->cell(0,10,'due_date:'.$invoice_data['due_date'],0,1);

    // add customer information
    $pdf->Ln(10);
    $pdf->cell (0,10,'Bill To' ,0,1,'C');
    $pdf->setfont ('Arial','B',12);
    $pdf->cell (0,10,$invoice_data['customer']['name'],0,1);
    $pdf->cell (0,10,$invoice_data ['customer']['address'],0,1);
    $pdf->cell (0,10,$invoice_data['customer']['city'].', '. $invoice_data['customer']['state'].''. $invoice_data['customer']['zip'],0,1);

    // add item table
    $pdf->Ln(10);
    $pdf->setfont ('Arial','B', 10);
    
    // table header 
    $pdf->cell(90,10,'description',1,0,'C');
    $pdf->cell(30,10,'quantity',1,0,'C');
    $pdf->cell(30,10,'price',1,0,'C');
    $pdf->cell(40,10,'total',1,1,'C');

    $pdf->setfont('Arial','B',12);

    // table data 
    $total_amount = 0;
    foreach ($invoice_data['items'] as $item){
        $total=$item['quantity'] * $item['price'];
        $total_amount+=$total;

        $pdf->cell(90,10,$item['description'],1,0);
        $pdf->cell(30,10,$item['quantity'],1,0,'C');
        $pdf->cell(30,10,'Ksh'. number_format($item['price'],2),1,0,'R' );
        $pdf->cell(40,10,'Ksh'. number_format($total,2),1,1,'R' );
    }

    // total
    $pdf->setfont ('Arial','B', 12);
    $pdf->cell(150,10,'Total Amount',1,0,'R');
    $pdf->cell(40,10,'Ksh'. number_format($item['price'],2),1,1,'R' );

    // Output the PDF 
    $pdf->output ('invoice_'. $invoice_data['invoice_number'].'.pdf','D');
}

// smaple data 
$invoice_data= [
    'invoice_number'=>12345,
    'date'=>date('Y-m-d'),//current data
    'due_date'=>date('Y-m-d', strtotime('+30 days')),//30 days 
    'customer'=>[
        'name'=>'John Doe',
        'address'=>'123 Main street',
        'city'=>'anytown',
        'state'=>'CA',
        'zip'=>'12345'
    ],
    'items'=>[
        [
            'description'=>'product1',
            'quantity'=>'2',
            'price'=>'1999'
        ],
        [
            'description'=>'product2',
            'quantity'=>'1',
            'price'=>'2999'
        ]
    ]

];
generateinvoicePDF ($invoice_data);