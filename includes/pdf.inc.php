<?php
require '../libraries/fpdf/fpdf.php';
include './connect.inc.php';

function generateInvoicePDF($customerName, $invoiceNumber, $invoiceDate, $items, $total)
{
    global $connection;

    define('EURO', chr(128));

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont('Helvetica', 'B', 16);
    $pdf->Cell(190, 10, 'INVOICE', 0, 1, 'C');

    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(40, 10, 'Customer Name:', 0, 0);
    $pdf->Cell(100, 10, $customerName, 0, 1);

    $pdf->Cell(40, 10, 'Invoice Number:', 0, 0);
    $pdf->Cell(100, 10, $invoiceNumber, 0, 1);

    $pdf->Cell(40, 10, 'Invoice Date:', 0, 0);
    $pdf->Cell(100, 10, $invoiceDate, 0, 1);

    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(90, 10, 'Item', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Price', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Quantity', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Total', 1, 1, 'C');

    // make list of every product id
    $productIds = array();
    $pdf->SetFont('Helvetica', '', 12);
    foreach ($items as $item) {
        for ($i = 0; $i < $item['quantity']; $i++) {
            $productIds[] = $item['id'];
        }
        $pdf->Cell(90, 10, $item['name'], 1, 0);
        $pdf->Cell(30, 10, EURO . ' ' . $item['price'], 1, 0);
        $pdf->Cell(30, 10, $item['quantity'], 1, 0);
        $pdf->Cell(40, 10, EURO . ' ' . $item['price'] * $item['quantity'], 1, 1);
    }

    $productIdsString = implode(',', $productIds);

    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(120, 10, '', 0, 0);
    $pdf->Cell(30, 10, 'Total:', 0, 0);
    $pdf->Cell(40, 10, EURO . ' ' . $total, 0, 1);

    $pdf_file = $invoiceNumber . '.pdf';
    $pdf->Output('F', '../orders/' . $pdf_file);

    $pdf_data = file_get_contents('../orders/' . $invoiceNumber . '.pdf');
    $pdf_data = mysqli_real_escape_string($connection, $pdf_data);

    echo '
    <div class="wrapper" style="height: 100vmin; display: flex; justify-content:center;align-items:center">
        <form action="../public_html/checkout.php" method="post">
            <input type="hidden" name="invoicenumber" value="' . $invoiceNumber . '">
            <input type="submit" name="submit" value="Proceed">
        </form>
    </div>
    ';
    
    $sql = "INSERT INTO orders (id, user, products, pdf, data_added) VALUES ('" . $invoiceNumber . "', '" . $_SESSION["user"] . "', '" . $productIdsString . "', '" . $pdf_data . "', default)";
    $connection->query($sql);
}
