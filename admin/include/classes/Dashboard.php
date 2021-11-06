<?php 


class Dashboard
{
	private $db;
    
	public function __construct()
	{
	    $this->db = new Database;
	}

//////////////////////////////////////////////////////////////

	public function totalProducts()
	{
	    $this->db->query("SELECT count(product_id) AS p FROM products");
	    return $this->db->single();
	}

//////////////////////////////////////////////////////////////

	public function totalCategories()
	{
	    $this->db->query("SELECT count(cat_id) AS c FROM categories");
	    return $this->db->single();
	}

//////////////////////////////////////////////////////////////

	public function totalUsers()
	{
	    $this->db->query("SELECT count(user_id) AS u FROM users");
	    return $this->db->single();
	}

//////////////////////////////////////////////////////////////


	public function totalRevenue()
	{
		$total = [];

	    $this->db->query("SELECT t_sale FROM total_sale");
	    $cart_t = $this->db->resultSet();

	    foreach ($cart_t as $c_row) {
	    	$total[] = $c_row->t_sale;
	    }

	    $this->db->query("SELECT buy_now_total FROM buy_now_total_sale");
	    $buy_t = $this->db->resultSet();

	    foreach ($buy_t as $b_row) {
	    	$total[] = $b_row->buy_now_total;
	    }

	    return array_sum($total);

	}

///////////////////////////////////////////////////////////////

	public function revenue($type)
	{
	    if ($type === 'cart') {
	    	$this->db->query("SELECT sum(t_sale) AS c_total FROM total_sale");
	    	return $this->db->single();
	    }


	    if ($type === 'buy_now') {
	    	$this->db->query("SELECT sum(buy_now_total) AS b_total FROM buy_now_total_sale");
	    	return $this->db->single();
	    }
	}

//////////////////////////////////////////////////////////////

	public function cartOrderPending()
	{
	    $this->db->query("SELECT count(order_id) AS op FROM orders WHERE order_status = 'Pending order'");
	    return $this->db->single();
	}

//////////////////////////////////////////////////////////////

	public function buyOrderPending()
	{
	    $this->db->query("SELECT count(buy_now_order_id) AS bp FROM buy_now_order WHERE order_status = 'Pending order'");
	    return $this->db->single();
	}

////////////////////////////////////////////////////////////////////////

	public function graphOrderReportLast7()
	{
	    $this->db->query("SELECT sale_date, sum(t_sale) AS price FROM total_sale GROUP BY sale_date DESC LIMIT 7");
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

/////////////////////////////////////////////////////////////////////

	public function graphOrderReportBuyNowLast7()
	{
	    $this->db->query("SELECT buy_now_date, sum(buy_now_total) AS b_price FROM buy_now_total_sale GROUP BY buy_now_date DESC LIMIT 7");
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

/////////////////////////////////////////////////////////////////////

	public function totalOrdersReport()
	{
		$total_order = $this->totalOrders();
		$order_sent = $this->orderSent();
		$order_delivered = $this->orderDelivered();
		$order_canceled = $this->orderCanceled();

		$data = [
			'total_order' => $total_order,
			'order_sent' => $order_sent,
			'order_delivered' => $order_delivered,
			'order_canceled' => $order_canceled
		];

		return $data;
	    

	}

////////////////////////////////////////////////////////////////////////

	private function totalOrders()
	{
	    $this->db->query("SELECT count(order_id) AS all_cart FROM orders");
	    $cart_o = $this->db->single();
	    $orders[] = $cart_o->all_cart;

	    $this->db->query("SELECT count(buy_now_order_id) AS all_buy FROM buy_now_order");
	    $buy_o = $this->db->single();
	    $orders[] = $buy_o->all_buy;

	    $all_orders = array_sum($orders);

	    return $all_orders;
	}

//////////////////////////////////////////////////////////////////////////

	private function orderSent()
	{
	    $this->db->query("SELECT count(order_id) AS all_cart FROM orders WHERE order_status = 'Order sent'");
	    $cart_o = $this->db->single();
	    $orders[] = $cart_o->all_cart;

	    $this->db->query("SELECT count(buy_now_order_id) AS all_buy FROM buy_now_order WHERE order_status = 'Order sent'");
	    $buy_o = $this->db->single();
	    $orders[] = $buy_o->all_buy;

	    $all_orders = array_sum($orders);

	    return $all_orders;
	}

/////////////////////////////////////////////////////////////////////////////

	private function orderDelivered()
	{
	    $this->db->query("SELECT count(order_id) AS all_cart FROM orders WHERE order_status = 'Delivered'");
	    $cart_o = $this->db->single();
	    $orders[] = $cart_o->all_cart;

	    $this->db->query("SELECT count(buy_now_order_id) AS all_buy FROM buy_now_order WHERE order_status = 'Delivered'");
	    $buy_o = $this->db->single();
	    $orders[] = $buy_o->all_buy;

	    $all_orders = array_sum($orders);

	    return $all_orders;
	}

/////////////////////////////////////////////////////////////////////////////

	private function orderCanceled()
	{
	    $this->db->query("SELECT count(order_id) AS all_cart FROM orders WHERE order_status = 'Canceled'");
	    $cart_o = $this->db->single();
	    $orders[] = $cart_o->all_cart;

	    $this->db->query("SELECT count(buy_now_order_id) AS all_buy FROM buy_now_order WHERE order_status = 'Canceled'");
	    $buy_o = $this->db->single();
	    $orders[] = $buy_o->all_buy;

	    $all_orders = array_sum($orders);

	    return $all_orders;
	}

/////////////////////////////////////////////////////////////////////////////

	public function bestProduct()
	{
	    $this->db->query("SELECT best_product_id, sum(best_product_qua) AS qua FROM best_selling_product GROUP BY best_product_id ORDER BY sum(best_product_qua) DESC LIMIT 20");
	    $r = $this->db->resultSet();

	    $best_products = [];

	    foreach ($r as $row) {
	    	
	    	$name = $this->getProductName($row->best_product_id);

	    	$data = [
		    	'p_id' => $row->best_product_id,
		    	'name' => $name->product_name,
		    	'quan' => $row->qua
	    	];

	    	array_push($best_products, $data);
	    }

	    return $best_products;
	}

////////////////////////////////////////////////////////////////////////

	private function getProductName($p_id)
	{
	    $this->db->query("SELECT product_name FROM products WHERE product_id = :id");
	    $this->db->bind(":id", $p_id);
	    return $this->db->single();
	}

/////////////////////////////////////////////////////////////////////////////

	public function popularProduct()
	{
	    $this->db->query("SELECT best_product_id, sum(best_product_qua) AS qua FROM best_selling_product GROUP BY best_product_id ORDER BY sum(best_product_qua) DESC LIMIT 3");
	    $r = $this->db->resultSet();

	    $popular_products = [];

	    foreach ($r as $row) {
	    	
	    	$p_data = $this->getProductData($row->best_product_id);

	    	$p_price = (!empty($p_data->product_new_price)) ? $p_data->product_new_price : $p_data->product_price;

	    	$data = [
		    	'p_id' => $row->best_product_id,
		    	'name' => $p_data->product_name,
		    	'price' => $p_price,
		    	'img' => $p_data->product_img,
		    	'quan' => $row->qua
	    	];

	    	array_push($popular_products, $data);
	    }

	    return $popular_products;
	}

//////////////////////////////////////////////////////////////////////////////////////

	private function getProductData($p_id)
	{
	    $this->db->query("SELECT product_name, product_price, product_new_price, product_img FROM products WHERE product_id = :id");
	    $this->db->bind(":id", $p_id);
	    return $this->db->single();
	}

///////////////////////////////////////////////////////////////////////////////////////

	public function categorydonut()
	{
		$name_c = [];
		$count = [];

	 	$this->db->query("SELECT * FROM categories");

	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	      	$cat_id = $row->cat_id;
		   	$cat_name = $row->cat_name;

		   	$this->db->query("SELECT product_cat FROM products WHERE product_cat = {$cat_id}");
		   	$this->db->execute();
		   	$cat_count = $this->db->rowCount();

		   	$name_c[] = $cat_name;
		   	$count[] = $cat_count;
	    }   

	    	$data = [
		   		'cat_name' => $name_c,
		   		'cat_count' => $count
		   	];

	    return $data;
	}

//////////////////////////////////////////////////////////////////////////////////////









} //end class


















 ?>