<?php 


class Report
{
	private $db;
    
	public function __construct()
	{
	    $this->db = new Database;
	}

//////////////////////////////////////////////////////////////


	public function getCartTotalSale($from_date, $to_date)
	{
	    $this->db->query("SELECT * FROM total_sale WHERE sale_date BETWEEN :from_date AND :to_date");
	    $this->db->bind(":from_date", $from_date);
	    $this->db->bind(":to_date", $to_date);

	    $result = $this->db->resultSet();
	    
	    $cart_id_array = [];
	    $cart_invoice_array = [];
	    $cart_total_array = [];

	    foreach ($result as $cart_row) {

	      array_push($cart_id_array, $cart_row->order_id);
	      array_push($cart_total_array, $cart_row->t_sale);
	      array_push($cart_invoice_array, $cart_row->total_sale_id);
	    }

	    $cart_sum = array_sum($cart_total_array);
	    $cart_invoice = count($cart_invoice_array);

	    $result = [
	    	'orders_id' => $cart_id_array,
	    	'cart_sum' => $cart_sum,
	    	'cart_invoice' => $cart_invoice
	    ];

	    return $result;

	}

////////////////////////////////////////////////////////////////////////

	public function cartOrderReport($orders_ids)
	{
		$cart_orders = [];

	    foreach ($orders_ids as $row) {
	    	$this->db->query("SELECT * FROM orders WHERE order_id = :id");
	    	$this->db->bind(":id", $row);
	    	$result = $this->db->single();
	    	$full_name = $this->getNameFromOrder($result->order_user_id);
	    	 
	    	$data = [
	    		'order_id' => $result->order_id,
	    		'full_name' => $full_name->first_name . " " . $full_name->last_name,
	    		'price' => $result->total_price,
	    		'date' => $result->time_stamp
	    	];

			 array_push($cart_orders, $data);
	    }

	    return $cart_orders;

	}

/////////////////////////////////////////////////////////////////////////

	private function getNameFromOrder($user_id)
	{
	    $this->db->query("SELECT first_name ,last_name FROM users WHERE user_id = :id");
	    $this->db->bind(":id", $user_id);
	    $res = $this->db->single();
	    return $res;
	}

//////////////////////////////////////////////////////////////////////////

	public function getbuyNowTotalSale($from_date, $to_date)
	{
	    $this->db->query("SELECT * FROM buy_now_total_sale WHERE buy_now_date BETWEEN :from_date AND :to_date");
	    $this->db->bind(":from_date", $from_date);
	    $this->db->bind(":to_date", $to_date);

	    $result = $this->db->resultSet();

	    $buy_id_array = [];
	    $buy_invoice_array = [];
	    $buy_total_array = [];

	    foreach ($result as $buy_row) {

	      array_push($buy_id_array, $buy_row->buy_now_order_id);
	      array_push($buy_total_array, $buy_row->buy_now_total);
	      array_push($buy_invoice_array, $buy_row->buy_now_total_sale_id);
	    }

	    $buy_sum = array_sum($buy_total_array);
	    $buy_invoice = count($buy_invoice_array);

	    $result = [
	    	'buy_orders_id' => $buy_id_array,
	    	'buy_sum' => $buy_sum,
	    	'buy_invoice' => $buy_invoice
	    ];

	    return $result;
	    

	}

//////////////////////////////////////////////////////////////////////

	public function buyOrderReport($orders_ids)
	{
		$buy_orders = [];

	    foreach ($orders_ids as $row) {
	    	$this->db->query("SELECT * FROM buy_now_order WHERE buy_now_order_id = :id");
	    	$this->db->bind(":id", $row);
	    	$result = $this->db->single();
	    	$total = $result->product_quantity * $result->product_price;
	    	 
	    	$data = [
	    		'buy_order_id' => $result->buy_now_order_id,
	    		'full_name' => $result->full_name,
	    		'price' => $total,
	    		'date' => $result->time_stamp
	    	];

			 array_push($buy_orders, $data);
	    }

	    return $buy_orders;

	}

//////////////////////////////////////////////////////////////////////////////

	public function graphOrderReport($from_date, $to_date)
	{
	    $this->db->query("SELECT sale_date, sum(t_sale) AS price FROM total_sale WHERE sale_date BETWEEN :from_date AND :to_date GROUP BY sale_date");
	    $this->db->bind(":from_date", $from_date);
	    $this->db->bind(":to_date", $to_date);
	    $r = $this->db->resultSet();
	    
	    $c_total = [];
	    $c_date = [];

	    foreach ($r as $row) {

	    $c_date_order = date("d/m/Y", strtotime($row->sale_date));
	          
	    $c_total[] = $row->price;
	    $c_date[] = $c_date_order;
	   }

	   $data = [
	   		'c_total' => $c_total,
	   		'c_date' => $c_date
	   ];

	   return $data;

	}

//////////////////////////////////////////////////////////////////////////////

	public function graphOrderReportBuyNow($from_date, $to_date)
	{
	    $this->db->query("SELECT buy_now_date, sum(buy_now_total) AS b_price FROM buy_now_total_sale WHERE buy_now_date BETWEEN :from_date AND :to_date GROUP BY buy_now_date");
	    $this->db->bind(":from_date", $from_date);
	    $this->db->bind(":to_date", $to_date);
	    $r = $this->db->resultSet();
	    
	    $b_total = [];
	    $b_date = [];

	    foreach ($r as $row) {

	    $b_date_order = date("d/m/Y", strtotime($row->buy_now_date));
	          
	    $b_total[] = $row->b_price;
	    $b_date[] = $b_date_order;
	   }

	   $data = [
	   		'b_total' => $b_total,
	   		'b_date' => $b_date
	   ];

	   return $data;

	}

//////////////////////////////////////////////////////////////////////////////////

	public function bestSellingProductc($from_date, $to_date)
	{
	    $this->db->query("SELECT best_product_id, sum(best_product_qua) AS qua FROM best_selling_product WHERE best_date BETWEEN :from_date AND :to_date GROUP BY best_product_id");
	    $this->db->bind(":from_date", $from_date);
	    $this->db->bind(":to_date", $to_date);
	    $r = $this->db->resultSet();
	    
	    
	    $p_name = [];
	    $quan = [];

	    foreach ($r as $row) {
	    	
	    	$name = $this->getProductName($row->best_product_id);

	    	$p_name[] = $name->product_name;
	    	$quan[] = $row->qua;
	    }

	    $data = [
	    	'name' => $p_name,
	    	'quan' => $quan
	    ];

	    return $data;

	}

////////////////////////////////////////////////////////////////////////

	private function getProductName($p_id)
	{
	    $this->db->query("SELECT product_name FROM products WHERE product_id = :id");
	    $this->db->bind(":id", $p_id);
	    return $this->db->single();
	}



} //end class


















 ?>