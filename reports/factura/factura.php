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

    function factura($id) {

        $info = get_bill_information($id);

        $pdf=new FPDF('P','mm',array(80,200));
        $pdf->setLeftMargin(2);
        $pdf->AddPage();
        $pdf->Image("logo.png", 5, 5, 20, 20, 'PNG');
        $pdf->Image("watermark.png", 15, 50, 50, 50, 'PNG');
         
        $pdf->SetFillColor(232,232,232);
        $pdf->Setfont('Arial','B',14);

        $pdf->setTextColor(0, 162, 185);
        $pdf->setXY(25, 5);
        $pdf->Cell(50, 10, 'FARMACIA', 0, 1, 'L');
        $pdf->setXY(25, 12);
        $pdf->Cell(50, 10, 'MULTIMEDIAL', 0, 1,'L');

        $pdf->Setfont('Arial','',7);
        $pdf->setXY(2, 25);
        $pdf->Cell(50, 3, 'COMERCIALIZADORA FARMACEUTICA DE LA PAZ - BOLIVIA', 0, 1, 'L');
        $pdf->Cell(50, 3, 'DIRECCION', 0, 1, 'L');
        $pdf->Cell(50, 3, 'Fijo: 2491312 Movil: 79991119', 0, 1, 'L');
        $pdf->Cell(50, 3, 'farmacia.multimedial@gmail.com', 0, 1, 'L');

        $pdf->setTextColor(0, 0, 0);
        $pdf->Setfont('Arial','',10);
        $pdf->Cell(76, 3, '', 0, 1, 'C');
        $pdf->Cell(76, 7, 'FACTURA DE VENTA', 'T', 1, 'C');
        $pdf->Setfont('Arial','',8);
        $pdf->Cell(76, 3, 'Nro: ' . $id, 'B', 1,'C');

        $pdf->Setfont('Arial','B', 8);
        $pdf->Cell(76, 2, '', 0, 1,'L');
        $pdf->Cell(76, 2, 'VENDEDOR: ', 0, 1,'L');

        $pdf->Setfont('Arial','', 8);
        $pdf->Cell(10, 6, '', 'B', 0,'L');
        $pdf->Cell(66, 6, 'CAJA', 'B', 1,'L');

        $pdf->Setfont('Arial','B', 8);
        $pdf->Cell(76, 2, '', 0, 1,'L');
        $pdf->Cell(76, 2, 'SENOR(ES): ', 0, 1,'L');

        $pdf->Setfont('Arial','', 8);
        $pdf->Cell(10, 6, '', 0, 0,'L');
        $pdf->Cell(66, 6, $info['name'], 0, 1,'L');

        $pdf->Setfont('Arial','B', 8);
        $pdf->Cell(76, 2, 'NIT: ', 0, 1,'L');

        $pdf->Setfont('Arial','', 8);
        $pdf->Cell(10, 6, '', 0, 0,'L');
        $pdf->Cell(66, 6, $info['nit'], 0, 1,'L');

        $pdf->Cell(70, 1,"",0,1,'C');

        $sales = $info['sales'];

        $pdf->Setfont('Arial','B',8);
        $pdf->Cell(10, 5, "Cant", 'TB', 0,'L');
        $pdf->Cell(34, 5, "Descripcion", 'TB', 0,'L');
        $pdf->Cell(16, 5, "Precio U", 'TB', 0,'L');
        $pdf->Cell(16, 5, "Total", 'TB', 1,'L');

        $pdf->Setfont('Arial','',8);

        $cant = 0;
        $total = 0;

        foreach ($sales as $i => $value) {
            $pdf->Cell(10, 4, $value['units'], 0, 0,'L');
            $pdf->Cell(34, 4, $value['medicine_name'], 0, 0,'L');
            $pdf->Cell(16, 4, $value['price'], 0, 0,'L');
            $pdf->Cell(16, 4, $value['price'] * $value['units'], 0, 1,'L');
            $cant++;
            $total = $total + $value['price'] * $value['units'];
        }
        

        $pdf->Cell(76, 2,"",'T',1,'C');    
        
        $pdf->Cell(20, 4,"", 0, 0,'C');
        $pdf->Setfont('Arial', 'B', 8);
        $pdf->Cell(20, 4,"Total", 0, 0,'L');
        $pdf->Cell(2, 4,":", 0, 0,'L');
        $pdf->Setfont('Arial', '', 8);
        $pdf->Cell(20, 4, $total, 0, 1,'R');

        $qrcode = new QRcode($info['name'] . " " . $info['nit'] . " Total: " . $total, 'H');
        $qrcode->displayFPDF($pdf, 28, 95 + $cant * 4, 25, array(255, 255, 255), array(0, 0, 0));

        $pdf->Cell(20, 35 + $cant * 3, '', 0, 1, 'L');
        $pdf->Setfont('Arial', '', 7);
        $pdf->Cell(75, 2,'Si tiene alguna duda sobre esta factura, pongase un contacto con', 0, 1, 'C');
        $pdf->Setfont('Arial', 'B', 6);
        $pdf->Cell(75, 4,'Farmacia Multimedial, farmacia.multimedial@gmail.com, 79991119', 0, 1, 'C');

        $pdf->Output();
        $pdf->Output('F','Reporte.pdf');
    }

    factura(1);
?>