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
$pdf = new FPDF('P', 'mm', [80, 200]);


// add new page
$pdf->AddPage();

// bg-color
//$pdf->SetFillColor(123, 255, 234);

// set font to arial, bold-italic-underline-B-I-U, 16pt
//$pdf->SetFont('Arial', '', 16);

// Cell(width, height, text, border, end line, align, bg color-setfillcolor)
//$pdf->Cell(0, 10, 'Hello World', 1, 1, 'C', true);




$pdf->Image('assets/images/logo.png', 5, -5, -150);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(65, 10, 'Liquor Store', 0, 1, 'R');
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 5, 'Cara Lazara 345, Krusevac - Serbia', 0, 1, 'C');
$pdf->Cell(60, 5, 'Phone: 123-456-789',  0, 1, 'C');
$pdf->Cell(60, 5, 'Email: stefan.sajmon@gmail.com', 0, 1, 'C');
$pdf->Cell(60, 5, 'Website: www.3S.com',  0, 1, 'C');

$pdf->Line(0, 45, 72, 45);

$pdf->Ln(5);


$pdf->SetFont('Arial', 'BI', 8);
$pdf->Cell(20, 4, 'Bill To:', 0, 0);

$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(40, 4, $custumer, 0, 1);

$pdf->SetFont('Arial', 'BI', 8);
$pdf->Cell(20, 4, 'Invoice:', 0, 0);

$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(40, 4, "#" . $order_row->order_id, 0, 1);

$pdf->SetFont('Arial', 'BI', 8);
$pdf->Cell(20, 4, 'Date:', 0, 0);

$pdf->SetFont('Courier', 'BI', 8);
$pdf->Cell(40, 4, $order_date, 0, 1);

$pdf->Ln(3);


$pdf->SetX(7);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(35, 5, 'Product', 1, 0, 'C');
$pdf->Cell(10, 5, 'QTY', 1, 0, 'C');
$pdf->Cell(10, 5, 'Price', 1, 0, 'C');
$pdf->Cell(10, 5, 'Total', 1, 1, 'C');




///////////// products /////////////////

$select_product = $db->query("SELECT * FROM products p JOIN order_items o WHERE o.order_id =:id AND o.product_id = p.product_id");
$select_product = $db->bind(":id", $id);

$product_result = $select_product = $db->resultSet();




foreach ($product_result as $p_row) {

	$p_price = $p_row->product_price;
	$formated_price = number_format($p_price, 2, ",", ".");

	$p_total = $p_price * $p_row->product_quantity;
	$formated_p_total = number_format($p_total, 2, ",", ".");
	
	$pdf->SetX(7);
	$pdf->Cell(35, 5, $p_row->product_name, 1, 0, 'C');
	$pdf->Cell(10, 5, $p_row->product_quantity, 1, 0, 'C');
	$pdf->Cell(10, 5, $formated_price, 1, 0, 'C');
	$pdf->Cell(10, 5, $formated_p_total, 1, 1, 'C');
}



//////////// subtotal //////////////////

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', 8);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, 'Subtotal:', 1, 0, 'C');
$pdf->Cell(20, 5, '$ ' . $subtotal, 1, 1, 'C');


//////////// Delivery //////////////////

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', 8);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, 'Delivery:', 1, 0, 'C');
$pdf->Cell(20, 5, '$ 5,00', 1, 1, 'C');



//////////// total //////////////////

$pdf->SetX(7);
$pdf->SetFont('Courier', 'B', 10);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, 'Total:', 1, 0, 'C');
$pdf->Cell(20, 5, '$ ' . $total, 1, 1, 'C');






// output the result
$pdf->Output();












 ?>