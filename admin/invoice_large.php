<?php 

include 'include/init.php';

	if (!isAdmin()) {
        redirect('../index.php');
    }

    if (isset($_GET['id'])) {
    	
    	$id = $_GET['id'];

    	$db = new Database;

    	$select = $db->query("SELECT * FROM orders o JOIN users u WHERE o.order_user_id = u.user_id AND o.order_id = :id");
    	$select = $db->bind(":id", $id);

    	$order_row = $select = $db->single();


    	$order_date = date("d-m-Y", strtotime($order_row->time_stamp));
    	$custumer = $order_row->first_name . " " . $order_row->last_name;
    	$subtotal = number_format($order_row->total_price, 2, ",", ".");

    	$total = $order_row->total_price + 5;
    	$total = number_format($total, 2, ",", "."); 

    }else{
    	redirect("orders.php");
    }


// call the FPDF library
require 'fpdf/fpdf.php';


// A4 width: 219mm
// default margin: 10mm each side
// writable horizontal: 219 - (10 * 2) = 199mm

// create pdf object
// with parameters
// string orientation (P or L) - portrait or landscape
// string unit (pt, mm, cm, and in) - measure unit
// mixed format (A3, A4, A5, Letter and legal) - format of page
$pdf = new FPDF('P', 'mm', 'A4');


// add new page
$pdf->AddPage();

// bg-color
//$pdf->SetFillColor(123, 255, 234);

// set font to arial, bold-italic-underline-B-I-U, 16pt
//$pdf->SetFont('Arial', '', 16);

// Cell(width, height, text, border, end line, align, bg color-setfillcolor)
//$pdf->Cell(0, 10, 'Hello World', 1, 1, 'C', true);




$pdf->Image('assets/images/logo.png', 170, 0, -150);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(80, 10, 'Liquor Store');

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(112, 10, 'INVOICE', 0, 1, 'C');

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(80, 5, 'Cara Lazara 345, Krusevac - Serbia');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(112, 5, 'Invoice: #' . $order_row->order_id, 0, 1, 'C');

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(80, 5, 'Phone: 123-456-789', 0, 0);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(112, 5, 'Date: ' . $order_date, 0, 1, 'C');

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(80, 5, 'Email: stefan.sajmon@gmail.com', 0, 1);
$pdf->Cell(80, 5, 'Website: www.3S.com', 0, 1);


// Line(x1, y1, x2, y2);
$pdf->Line(5, 45, 205, 45);

//line break
$pdf->Ln(10);

///////////// bill to /////////////////

$pdf->SetFont('Arial', 'BI', 12);
$pdf->Cell(20, 10, 'Bill To:', 0, 0);

$pdf->SetFont('Courier', 'BI', 14);
$pdf->Cell(50, 10, $custumer, 0, 1);

$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(208, 208, 208);
$pdf->Cell(100, 8, 'Product', 1, 0, 'C', true);
$pdf->Cell(20, 8, 'QTY', 1, 0, 'C', true);
$pdf->Cell(30, 8, 'Price', 1, 0, 'C', true);
$pdf->Cell(40, 8, 'Total', 1, 1, 'C', true);

///////////// products /////////////////

$select_product = $db->query("SELECT * FROM products p JOIN order_items o WHERE o.order_id =:id AND o.product_id = p.product_id");
$select_product = $db->bind(":id", $id);

$product_result = $select_product = $db->resultSet();




foreach ($product_result as $p_row) {

	$p_price = $p_row->product_price;
	$formated_price = number_format($p_price, 2, ",", ".");

	$p_total = $p_price * $p_row->product_quantity;
	$formated_p_total = number_format($p_total, 2, ",", ".");
	
	$pdf->Cell(100, 8, $p_row->product_name, 1, 0, 'C');
	$pdf->Cell(20, 8, $p_row->product_quantity, 1, 0, 'C');
	$pdf->Cell(30, 8,"$ " . $formated_price, 1, 0, 'C');
	$pdf->Cell(40, 8,"$ " . $formated_p_total, 1, 1, 'C');
}






//////////// subtotal //////////////////

$pdf->Cell(100, 8, '', 0, 0, 'C');
$pdf->Cell(20, 8, '', 0, 0, 'C');
$pdf->Cell(30, 8, '', 0, 0, 'C');
$pdf->Cell(40, 8, 'Subtotal', 1, 1, 'C', true);

$pdf->Cell(100, 8, '', 0, 0, 'C');
$pdf->Cell(20, 8, '', 0, 0, 'C');
$pdf->Cell(30, 8, '', 0, 0, 'C');
$pdf->Cell(40, 8, '$ ' . $subtotal, 1, 1, 'C');


//////////// Delivery //////////////////

$pdf->Cell(100, 8, '', 0, 0, 'C');
$pdf->Cell(20, 8, '', 0, 0, 'C');
$pdf->Cell(30, 8, '', 0, 0, 'C');
$pdf->Cell(40, 8, 'Delivery', 1, 1, 'C', true);

$pdf->Cell(100, 8, '', 0, 0, 'C');
$pdf->Cell(20, 8, '', 0, 0, 'C');
$pdf->Cell(30, 8, '', 0, 0, 'C');
$pdf->Cell(40, 8, '$ 5,00', 1, 1, 'C');



//////////// total //////////////////

$pdf->Cell(100, 8, '', 0, 0, 'C');
$pdf->Cell(20, 8, '', 0, 0, 'C');
$pdf->Cell(30, 8, '', 0, 0, 'C');
$pdf->Cell(40, 8, 'Total', 1, 1, 'C', true);

$pdf->Cell(100, 8, '', 0, 0, 'C');
$pdf->Cell(20, 8, '', 0, 0, 'C');
$pdf->Cell(30, 8, '', 0, 0, 'C');
$pdf->Cell(40, 8, '$ ' . $total, 1, 1, 'C');






// output the result
$pdf->Output();












 ?>