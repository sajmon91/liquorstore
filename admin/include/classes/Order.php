<?php 


class Order
{
    private $db;

	public function __construct()
	{
	    $this->db = new Database;
	}

//////////////////////////////////////////////////////////////////////

	public function getCartOrdersInAdmin()
	{
	    $this->db->query("SELECT * FROM orders o JOIN users u WHERE o.order_user_id = u.user_id ORDER BY o.order_id DESC");
	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$order_id = $row->order_id;
	    	$user_id= $row->user_id;
	    	$customer = $row->first_name . " " . $row->last_name;
	    	$total = number_format($row->total_price, 2, ",", ".");
	    	$order_date = date("d-m-Y H:i:s", strtotime($row->time_stamp));

	    	$status = $this->orderStatus($row->order_status);


	    	echo "<tr>
	    			<td>{$order_id}</td>
	    			<td><a href='user_info.php?u_id=$user_id'>$customer</a></td>
	    			<td>$ {$total}</td>
	    			<td>{$status}</td>
	    			<td>{$order_date}</td>

	    			<td><a class='btn btn-soft-info waves-effect waves-light' href='orders.php?source=see_order&id={$order_id}'><i class='fas fa-eye'></i></a></td>

			        <td>
                      <a href='invoice_large.php?id=$order_id' class='btn btn-soft-success waves-effect waves-light' target='_blanck' role='button'><i class='fa fa-print'></i>
                      </a>
                      <a href='invoice_small.php?id=$order_id' class='btn btn-soft-primary waves-effect waves-light' target='_blanck' role='button'><i class='fa fa-print'></i>
                      </a>
                    </td>

	    			<td><a href='orders.php?source=order_process&id={$order_id}' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-cog'></i></a></td>

	    			<td><a href='javascript:void(0)' id=$order_id class='btn btn-soft-danger waves-effect waves-light btn_delete_cart_order'><i class='fas fa-trash'></i></a></td>

	    		</tr>";
	    	

	    }
	}

/////////////////////////////////////////////////////////////////////////

	private function orderStatus($status)
	{
	    if ($status === "Pending order") {
	    	return "<h4><span class='badge badge-boxed badge-soft-warning'>$status</span></h4>";
    	}

    	if ($status === "Order sent") {
    		return "<h4><span class='badge badge-boxed badge-soft-info'>$status</span></h4>";
    	}

    	if ($status === "Delivered") {
    		return "<h4><span class='badge badge-boxed badge-soft-success'>$status</span></h4>";
    	}

    	if ($status === "Canceled") {
    		return "<h4><span class='badge badge-boxed badge-soft-danger'>$status</span></h4>";
    	}
	}

/////////////////////////////////////////////////////////////////////////

	public function getOrderTotalPrice($o_id, $order_type)
	{
		if ($order_type === "cart order") {
			$this->db->query("SELECT total_price FROM orders WHERE order_id = :id");
	    	$this->db->bind(":id", $o_id);
	    	return $this->db->single();
		}

		if ($order_type === "buy now order") {
			$this->db->query("SELECT product_quantity,product_price FROM buy_now_order WHERE buy_now_order_id = :id");
	    	$this->db->bind(":id", $o_id);
	    	$result = $this->db->single();

	    	$price = $result->product_price;
	    	$quan = $result->product_quantity;

	    	return $price * $quan;
		}
	    
	}

//////////////////////////////////////////////////////////////////

	public function seeOrderProduct($o_id, $order_type)
	{
		if ($order_type === "cart order") {
			$this->db->query("SELECT * FROM order_items o JOIN products p WHERE o.order_id =:id AND o.product_id = p.product_id");
	    	$this->db->bind(":id", $o_id);
	    	$result = $this->db->resultSet();
		}



		if ($order_type === "buy now order") {
			$this->db->query("SELECT * FROM products p  JOIN buy_now_order bn WHERE bn.buy_now_order_id = :id AND bn.product_id = p.product_id");
			$this->db->bind(":id", $o_id);
			$result = $this->db->resultSet();
		}
	    


	    foreach ($result as $row) {
	    	
	    	$p_price = $row->product_price;
	    	$p_price_formated = number_format($p_price,2, ",", ".");

	    	$tot = $p_price * $row->product_quantity;
	    	$tot_formated = number_format($tot,2, ",", ".");

	    	echo "<tr>
	    			<td>{$row->product_id}</td>
	    			<td><img src='../images/products_img/$row->product_img' alt='image'  width='90'></td>
	    			<td>{$row->product_name}</td>
	    			<td>$ {$p_price_formated}</td>
	    			<td>{$row->product_quantity}</td>
	    			<td>$ {$tot_formated}</td>
	    		</tr>";
	    }
	}

///////////////////////////////////////////////////////////////////////

	public function seeOrderProcess($o_id)
	{
	    $this->db->query("SELECT * FROM orders WHERE order_id = :id");
	    $this->db->bind(":id", $o_id);
	    $result = $this->db->single();

	    $this->db->query("SELECT message FROM order_tracking WHERE order_id = :o_id ORDER BY order_tracking_id DESC");
	    $this->db->bind(":o_id", $o_id);
	    $msg = $this->db->single();

	    $order_date = date("d-m-Y H:i:s", strtotime($result->time_stamp));
	    $message = (isset($msg->message)) ? $msg->message : '';
	    $tot_formated = number_format($result->total_price, 2, ",", ".");

	    $status = $this->orderStatus($result->order_status);


	    echo "<tr>
    			<td>{$result->order_id}</td>
    			<td>{$order_date}</td>
    			<td>{$status}</td>
    			<td>{$message}</td>
    			<td>$ {$tot_formated}</td>
    		</tr>";
	}

//////////////////////////////////////////////////////////////////////////

	public function orderProcess($data)
	{
	    $status = $data['status'];
	    $msg = trim($data['message']);
	    $o_id = $data['order_id'];

	    $this->db->query("INSERT INTO order_tracking(order_id, status, message) VALUES(:id, :status, :msg)");
	    $this->db->bind(":id", $o_id);
	    $this->db->bind(":status", $status);
	    $this->db->bind(":msg", $msg);

	    if ($this->db->execute()) {
	    	$this->db->query("UPDATE orders SET order_status = :status WHERE order_id = :id");
	    	$this->db->bind(":status", $status);
	    	$this->db->bind(":id", $o_id);

	    	if ($this->db->execute()) {
	    		$this->orderProcess2($o_id);
	    		redirect("orders.php");
	    	}
	    }

	}


////////////////////////////////////////////////////////////////////////////

	private function orderProcess2($o_id)
	{
	    $this->db->query("SELECT * FROM orders o JOIN order_items oi WHERE o.order_id = oi.order_id AND o.order_id = :id");
	    $this->db->bind(":id", $o_id);
	    $res = $this->db->resultSet();

	    foreach ($res as $row) {
	    	
	    	$p_id = $row->product_id;
	    	$p_qua = $row->product_quantity;
	    	$stat = $row->order_status;
	    	$total = $row->total_price;

	    	if ($stat === "Delivered") {
	    		$this->db->query("UPDATE products SET product_stock = product_stock - :qua WHERE product_id = :p_id");
	    		$this->db->bind(":qua", $p_qua);
	    		$this->db->bind(":p_id", $p_id);
	    		$this->db->execute();
	    	}

	    	// trebao sam i ukupnu cenu da ubacim u bazu
	    	if ($stat === "Delivered") {
	    		$this->db->query("INSERT INTO best_selling_product(best_product_id, best_product_qua, best_date) VALUES(:p_id, :p_qua, :p_date)");
	    		$this->db->bind(":p_id", $p_id);
	    		$this->db->bind(":p_qua", $p_qua);
	    		$this->db->bind("p_date", date('Y-m-d'));
	    		$this->db->execute();
	    	}

	    }

	    if ($stat === "Delivered") {
	    	$this->db->query("INSERT INTO total_sale(order_id, t_sale, sale_date) VALUES(:o_id, :t_sale, :sale_date)");
	    	$this->db->bind(":o_id", $o_id);
	    	$this->db->bind(":t_sale", $total);
	    	$this->db->bind(":sale_date", date('Y-m-d'));
	    	$this->db->execute();
	    }
	}

////////////////////////////////////////////////////////////////////////////////

	public function deleteOrder($id)
	{
	    $this->db->query("DELETE FROM orders WHERE order_id = {$id}");
	    $this->db->execute();    
	}

////////////////////////////////////////////////////////////////////////////////////

	public function getBuyNowOrdersInAdmin()
	{
	    $this->db->query("SELECT * FROM buy_now_order ORDER BY buy_now_order_id DESC");
	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$order_id = $row->buy_now_order_id;
	    	$p_id = $row->product_id;
	    	$quan = $row->product_quantity;
	    	$p_price = $row->product_price;

	    	$customer = $row->full_name;
	    	$address = $row->address;
	    	$city = $row->city;
	    	$phone = $row->phone;


	    	$total = $quan * $p_price;
	    	$total_formated = number_format($total, 2, ",", ".");

	    	$order_date = date("d-m-Y H:i:s", strtotime($row->time_stamp));

	    	$status = $this->orderStatus($row->order_status);


	    	echo "<tr>
	    			<td>{$order_id}</td>
	    			<td><a href='#' data-toggle='modal' data-animation='bounce' data-target='.bs-example-modal-sm-$order_id'>$customer</a></td>
	    			<td>$ {$total_formated}</td>
	    			<td>{$status}</td>
	    			<td>{$order_date}</td>

	    			<td><a class='btn btn-soft-info waves-effect waves-light' href='orders.php?source=see_buy_now_order&id=$order_id'><i class='fas fa-eye'></i></a></td>

			        <td>
                      <a href='invoice_large_buy_now.php?id=$order_id' class='btn btn-soft-success waves-effect waves-light' target='_blanck' role='button'><i class='fa fa-print'></i>
                      </a>
                      <a href='invoice_small_buy_now.php?id=$order_id' class='btn btn-soft-primary waves-effect waves-light' target='_blanck' role='button'><i class='fa fa-print'></i>
                      </a>
                    </td>

	    			<td><a href='orders.php?source=buy_now_order_process&id={$order_id}' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-cog'></i></a></td>

	    			<td><a href='javascript:void(0)' id=$order_id class='btn btn-soft-danger waves-effect waves-light btn_delete_buy_now_order'><i class='fas fa-trash'></i></a></td>

	    		</tr>

	    		<div class='modal fade bs-example-modal-sm-$order_id' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
			        <div class='modal-dialog modal-sm'>
			            <div class='modal-content'>
			                <div class='modal-header'>
			                    <h5 class='modal-title mt-0' id='mySmallModalLabel'>Costumer Info</h5>
			                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
			                </div>
			                <div class='modal-body'>
			                    <p><b>Full Name</b> : $customer</p>
			                    <p><b>Address</b> : $address</p>
			                    <p><b>City</b> : $city</p>
			                    <p><b>Phone</b> : $phone</p>
			                </div>
			            </div>
			        </div>
			    </div>


	    		";
	    	
	    }
	}

//////////////////////////////////////////////////////////////////////

	public function seeBuyNowOrderProcess($o_id)
	{
	    $this->db->query("SELECT * FROM buy_now_order WHERE buy_now_order_id = :id");
	    $this->db->bind(":id", $o_id);
	    $result = $this->db->single();

	    $this->db->query("SELECT message FROM buy_now_order_tracking WHERE buy_now_order_id = :o_id ORDER BY buy_now_order_tracking_id DESC");
	    $this->db->bind(":o_id", $o_id);
	    $msg = $this->db->single();

	    $order_date = date("d-m-Y H:i:s", strtotime($result->time_stamp));
	    $message = (isset($msg->message)) ? $msg->message : '';
	    $total = $result->product_quantity * $result->product_price;
	    $tot_formated = number_format($total, 2, ",", ".");

	    $status = $this->orderStatus($result->order_status);


	    echo "<tr>
    			<td>{$result->buy_now_order_id}</td>
    			<td>{$order_date}</td>
    			<td>{$status}</td>
    			<td>{$message}</td>
    			<td>$ {$tot_formated}</td>
    		</tr>";
	}

///////////////////////////////////////////////////////////////////////////

	public function buyNowOrderProcess($data)
	{
	    $status = $data['status'];
	    $msg = trim($data['message']);
	    $o_id = $data['buy_now_order_id'];

	    $this->db->query("INSERT INTO buy_now_order_tracking(buy_now_order_id, status, message) VALUES(:id, :status, :msg)");
	    $this->db->bind(":id", $o_id);
	    $this->db->bind(":status", $status);
	    $this->db->bind(":msg", $msg);

	    if ($this->db->execute()) {
	    	$this->db->query("UPDATE buy_now_order SET order_status = :status WHERE buy_now_order_id = :id");
	    	$this->db->bind(":status", $status);
	    	$this->db->bind(":id", $o_id);

	    	if ($this->db->execute()) {
	    		$this->buyNowOrderProcess2($o_id);
	    		redirect("orders.php?source=buy_now_orders");
	    	}
	    }

	}

//////////////////////////////////////////////////////////////////////////////

	private function buyNowOrderProcess2($o_id)
	{
	    $this->db->query("SELECT * FROM buy_now_order WHERE buy_now_order_id = :id");
	    $this->db->bind(":id", $o_id);
	    $res = $this->db->resultSet();

	    foreach ($res as $row) {
	    	
	    	$p_id = $row->product_id;
	    	$p_qua = $row->product_quantity;
	    	$stat = $row->order_status;
	    	$total = $row->product_quantity * $row->product_price;

	    	if ($stat === "Delivered") {
	    		$this->db->query("UPDATE products SET product_stock = product_stock - :qua WHERE product_id = :p_id");
	    		$this->db->bind(":qua", $p_qua);
	    		$this->db->bind(":p_id", $p_id);
	    		$this->db->execute();
	    	}

	    	if ($stat === "Delivered") {
	    		$this->db->query("INSERT INTO best_selling_product(best_product_id, best_product_qua, best_date) VALUES(:p_id, :p_qua, :best_date)");
	    		$this->db->bind(":p_id", $p_id);
	    		$this->db->bind(":p_qua", $p_qua);
	    		$this->db->bind(":best_date", date('Y-m-d'));
	    		$this->db->execute();
	    	}

	    }

	    if ($stat === "Delivered") {
	    	$this->db->query("INSERT INTO buy_now_total_sale(buy_now_order_id, buy_now_total, buy_now_date) VALUES(:o_id, :t_sale, :b_date)");
	    	$this->db->bind(":o_id", $o_id);
	    	$this->db->bind(":t_sale", $total);
	    	$this->db->bind(":b_date", date('Y-m-d'));
	    	$this->db->execute();
	    }
	}

////////////////////////////////////////////////////////////////////////////////////

	public function deleteBuyNowOrder($id)
	{
	    $this->db->query("DELETE FROM buy_now_order WHERE buy_now_order_id = {$id}");
	    $this->db->execute();    
	}

////////////////////////////////////////////////////////////////////////////////////

	public function getCartOrdersPendingInAdmin()
	{
	    $this->db->query("SELECT * FROM orders o JOIN users u WHERE o.order_user_id = u.user_id AND order_status = 'Pending order' ORDER BY o.order_id DESC");
	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$order_id = $row->order_id;
	    	$user_id= $row->user_id;
	    	$customer = $row->first_name . " " . $row->last_name;
	    	$total = number_format($row->total_price, 2, ",", ".");
	    	$order_date = date("d-m-Y H:i:s", strtotime($row->time_stamp));

	    	$status = $this->orderStatus($row->order_status);


	    	echo "<tr>
	    			<td>{$order_id}</td>
	    			<td><a href='user_info.php?u_id=$user_id'>$customer</a></td>
	    			<td>$ {$total}</td>
	    			<td>{$status}</td>
	    			<td>{$order_date}</td>

	    			<td><a class='btn btn-soft-info waves-effect waves-light' href='orders.php?source=see_order&id={$order_id}'><i class='fas fa-eye'></i></a></td>

			        <td>
                      <a href='invoice_large.php?id=$order_id' class='btn btn-soft-success waves-effect waves-light' target='_blanck' role='button'><i class='fa fa-print'></i>
                      </a>
                      <a href='invoice_small.php?id=$order_id' class='btn btn-soft-primary waves-effect waves-light' target='_blanck' role='button'><i class='fa fa-print'></i>
                      </a>
                    </td>

	    			<td><a href='orders.php?source=order_process&id={$order_id}' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-cog'></i></a></td>

	    			<td><a href='javascript:void(0)' id=$order_id class='btn btn-soft-danger waves-effect waves-light btn_delete_cart_order'><i class='fas fa-trash'></i></a></td>

	    		</tr>";
	    	

	    }
	}

///////////////////////////////////////////////////////////////

	public function getBuyNowOrdersPendingInAdmin()
	{
	    $this->db->query("SELECT * FROM buy_now_order WHERE order_status = 'Pending order' ORDER BY buy_now_order_id DESC");
	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$order_id = $row->buy_now_order_id;
	    	$p_id = $row->product_id;
	    	$quan = $row->product_quantity;
	    	$p_price = $row->product_price;

	    	$customer = $row->full_name;
	    	$address = $row->address;
	    	$city = $row->city;
	    	$phone = $row->phone;


	    	$total = $quan * $p_price;
	    	$total_formated = number_format($total, 2, ",", ".");

	    	$order_date = date("d-m-Y H:i:s", strtotime($row->time_stamp));

	    	$status = $this->orderStatus($row->order_status);


	    	echo "<tr>
	    			<td>{$order_id}</td>
	    			<td><a href='#' data-toggle='modal' data-animation='bounce' data-target='.bs-example-modal-sm-$order_id'>$customer</a></td>
	    			<td>$ {$total_formated}</td>
	    			<td>{$status}</td>
	    			<td>{$order_date}</td>

	    			<td><a class='btn btn-soft-info waves-effect waves-light' href='orders.php?source=see_buy_now_order&id=$order_id'><i class='fas fa-eye'></i></a></td>

			        <td>
                      <a href='invoice_large_buy_now.php?id=$order_id' class='btn btn-soft-success waves-effect waves-light' target='_blanck' role='button'><i class='fa fa-print'></i>
                      </a>
                      <a href='invoice_small_buy_now.php?id=$order_id' class='btn btn-soft-primary waves-effect waves-light' target='_blanck' role='button'><i class='fa fa-print'></i>
                      </a>
                    </td>

	    			<td><a href='orders.php?source=buy_now_order_process&id={$order_id}' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-cog'></i></a></td>

	    			<td><a href='javascript:void(0)' id=$order_id class='btn btn-soft-danger waves-effect waves-light btn_delete_buy_now_order'><i class='fas fa-trash'></i></a></td>

	    		</tr>

	    		<div class='modal fade bs-example-modal-sm-$order_id' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
			        <div class='modal-dialog modal-sm'>
			            <div class='modal-content'>
			                <div class='modal-header'>
			                    <h5 class='modal-title mt-0' id='mySmallModalLabel'>Costumer Info</h5>
			                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
			                </div>
			                <div class='modal-body'>
			                    <p><b>Full Name</b> : $customer</p>
			                    <p><b>Address</b> : $address</p>
			                    <p><b>City</b> : $city</p>
			                    <p><b>Phone</b> : $phone</p>
			                </div>
			            </div>
			        </div>
			    </div>


	    		";
	    	
	    }
	}

///////////////////////////////////////////////////////////////////////////////

	public function myOrdersFront($u_id)		
	{
	    $this->db->query("SELECT * FROM orders WHERE order_user_id = :id ORDER BY order_id DESC");
	    $this->db->bind(":id", $u_id);
	    return $this->db->resultSet();
	}

////////////////////////////////////////////////////////////////////////////////

	public function seeMyOrder($u_id, $o_id)
	{
	    $this->db->query("SELECT total_price FROM orders WHERE order_user_id = :u_id AND order_id = :o_id");
	    $this->db->bind(":u_id", $u_id);
	    $this->db->bind(":o_id", $o_id);
	    $total_price = $this->db->single();

	    $this->db->query("SELECT * FROM order_items o JOIN products p WHERE o.order_id = :o_id AND o.product_id = p.product_id");
	    $this->db->bind(":o_id", $o_id);
	    $prod_info = $this->db->resultSet();

	    $data = [
	    	'total_price' => $total_price,
	    	'product_info' =>$prod_info
	    ];

	    return $data;
	}

///////////////////////////////////////////////////////////////////////










	
} // end class
















 ?>