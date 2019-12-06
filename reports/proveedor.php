<?php
    require_once '../src/functions/medicine_functions.php';
    // $pdf->Cell(width, height, text, border(0 or 1 or LFTB), ln(0 or 1), align(LCR));
    /*
        $pdf->Cell(family, style, size);
        -family: Courier, Arial, Times
        -style: '', B, I, U  
    */
    require('fpdf/fpdf.php');
    require('qrcode/qrcode.class.php');

    function inventario() {

        $arr = get_all_medicines_and_manufacturers();
        $manufacturers = $arr['manufacturer_names'];

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
        $pdf->Cell(275, 7, 'PROVEEDORES', 0, 1, 'C');
        $pdf->Setfont('Arial','B',10);
        $pdf->Cell(275, 4, 'Fecha: ' . date('d/m/y'), 0, 1,'C');
        $pdf->Cell(76, 5, '', 0, 1, 'C');

        $pdf->Setfont('Arial','B', 11);
        $pdf->Cell(50, 7, 'Codigo ', 1, 0,'L');
        $pdf->Cell(225, 7, 'Nombre', 1, 1,'L');

        $pdf->Setfont('Arial','', 10);
        
        $k = 1;

        foreach ($manufacturers as $i => $value) {
            $pdf->Cell(50, 7, $k, 1, 0,'L');
            $pdf->Cell(225, 7, $value, 1, 1,'L');
            $k++;
        }

        $pdf->Setfont('Arial', 'B', 8);
        $pdf->Cell(275, 4,'', 0, 1, 'C');
        $pdf->Cell(275, 4,'Farmacia Multimedial, farmacia.multimedial@gmail.com, 79991119', 0, 1, 'C');

        $pdf->Output();
        $pdf->Output('F','Reporte.pdf');
    }
    inventario();
?>