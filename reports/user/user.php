<?php
    include('../../src/functions/bill_functions.php');
    // $pdf->Cell(width, height, text, border(0 or 1 or LFTB), ln(0 or 1), align(LCR));
    /*
        $pdf->Cell(family, style, size);
        -family: Courier, Arial, Times
        -style: '', B, I, U  
    */
    require('fpdf/fpdf.php');
    require('qrcode/qrcode.class.php');



    function user($client_name) {

        $arr = find_bills_ids($client_name);

        $pdf=new FPDF('L');
        $pdf->AddPage();
        $pdf->Image("logo.png", 5, 5, 20, 20, 'PNG');
        $pdf->Image("watermark.png", 75, 40, 150, 150, 'PNG');
         
        $pdf->SetFillColor(232,232,232);
        $pdf->Setfont('Arial','B',14);

        $pdf->setTextColor(0, 162, 185);
        $pdf->setXY(25, 5);
        $pdf->Cell(50, 10, 'FARMACIA', 0, 1, 'L');
        $pdf->setXY(25, 12);
        $pdf->Cell(50, 10, 'MULTIMEDIAL', 0, 1,'L');

        $pdf->Setfont('Arial','',7);
        $pdf->setXY(80, 8);
        $pdf->Cell(50, 3, 'COMERCIALIZADORA FARMACEUTICA DE LA PAZ - BOLIVIA', 0, 1, 'L');
        $pdf->setXY(80, 12);
        $pdf->Cell(50, 3, 'DIRECCION', 0, 1, 'L');
        $pdf->setXY(80, 16);
        $pdf->Cell(50, 3, 'Fijo: 2491312 Movil: 79991119', 0, 1, 'L');
        $pdf->setXY(80, 20);
        $pdf->Cell(50, 3, 'farmacia.multimedial@gmail.com', 0, 1, 'L');

        $pdf->setTextColor(0, 0, 0);
        $pdf->Setfont('Arial','B',12);
        $pdf->Cell(76, 3, '', 0, 1, 'C');
        $pdf->Cell(275, 7, 'COMPRAS DE CLIENTE - ' . $client_name, 0, 1, 'C');
        $pdf->Setfont('Arial','B',10);
        $pdf->Cell(275, 4, 'Fecha: ' . date('d/m/y'), 0, 1,'C');
        $pdf->Cell(76, 5, '', 0, 1, 'C');

        $pdf->Setfont('Arial','B', 11);
        $pdf->Cell(50, 7, 'Codigo ', 1, 0,'L');
        $pdf->Cell(115, 7, 'Costo total', 1, 0,'L');
        $pdf->Cell(110, 7, 'Fecha', 1, 1,'L');

        $pdf->Setfont('Arial','', 10);
        
        $total = 0;

        foreach ($arr as $i => $value) {
            $pdf->Cell(50, 7, $value, 1, 0,'L');
            $bill = get_bill_information($value);
            $pdf->Cell(115, 7, $bill['total_price'], 1, 0,'L');
            $pdf->Cell(110, 7, $bill['time'], 1, 1,'L');
            $total = $total + $bill['total_price'];
        }

        $pdf->Setfont('Arial','B', 10);

        $pdf->Cell(50, 7, '', 0, 0,'R');
        $pdf->Cell(115, 7, "Total: " . $total, 0, 0,'R');
        $pdf->Cell(110, 7, '', 0, 1,'R');

        $pdf->Setfont('Arial', 'B', 8);
        $pdf->Cell(275, 4,'', 0, 1, 'C');
        $pdf->Cell(275, 4,'Farmacia Multimedial, farmacia.multimedial@gmail.com, 79991119', 0, 1, 'C');

        $pdf->Output();
        $pdf->Output('F','Reporte.pdf');
    }
?>