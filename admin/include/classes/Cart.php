<?php 


class Cart
{
    
	private $db;

	public function __construct()
	{
	    $this->db = new Database;
	}

//////////////////////////////////////////////////////////////////////////////////

	public function dropdownCart($carts)
	{
		$return_string_array = [];

	    foreach ($carts as $key => $value) {
	    	$this->db->query("SELECT * FROM products WHERE product_id = :id");
	    	$this->db->bind(":id", $key);
	    	$row = $this->db->single();

	    	$q = $value['qua'];

	    	$p_price = (!empty($row->product_new_price)) ? $row->product_new_price : $row->product_price;
	    	$p_price = number_format($p_price,2, ",", ".");

	    	$return_string = "<div class='dropdown-item d-flex align-items-start'>
				    	<div class='img' style='background-image: url(images/products_img/$row->product_img);'></div>
				    	<div class='text pl-3'>
				    		<a href='product-single.php?id=$row->product_id'>
				    			<h4>$row->product_name</h4>
				    		</a>
				    		<p class='mb-0'><a href='product-single.php?id=$row->product_id' class='price'>$$p_price</a><span class='quantity ml-3'>Quantity: $q</span></p>
				    	</div>
				    </div>";

			array_push($return_string_array, $return_string);

	    }

	    if (!empty($carts)) {
	    	$return_str ="<a class='dropdown-item text-center btn-link d-block w-100' href='cart.php'>
							    	View All
							    	<span class='ion-ios-arrow-round-forward'></span>
							    </a>";
			array_push($return_string_array, $return_str);
	    }

	    

	    return $return_string_array;
	}

////////////////////////////////////////////////////////////////////////////////

	public function checkoutOrder($u_id, $cart, $data)
	{
		$this->db->query("SELECT * FROM usersmeta WHERE usersmeta_user_id = {$u_id}");
		$this->db->execute();
		$count = $this->db->rowCount();
		
		if ($count == 1) {
			$this->db->query("UPDATE usersmeta SET address = :address, city = :city, phone = :phone WHERE usersmeta_user_id = {$u_id}");
			$this->db->bind(":address", $data['address']);
			$this->db->bind(":city", $data['city']);
			$this->db->bind(":phone", $data['phone']);
			$this->db->execute();

			if ($this->insertInOrders($u_id, $cart)) {

				$order_id = $this->db->lastId();

				if ($this->insertInOrderItems($order_id, $cart)) {

					unset($_SESSION['subtotal']);
					unset($_SESSION['cart']);

					redirect("thanks.php");
				}
			}
		}else{
			$this->db->query("INSERT INTO usersmeta(usersmeta_user_id, address, city, phone) VALUES(:id, :address, :city, :phone)");
			$this->db->bind(":id", $u_id);
			$this->db->bind(":address", $data['address']);
			$this->db->bind(":city", $data['city']);
			$this->db->bind(":phone", $data['phone']);
			$this->db->execute();

			if ($this->insertInOrders($u_id, $cart)) {
				$order_id = $this->db->lastId();

				if ($this->insertInOrderItems($order_id, $cart)) {

					unset($_SESSION['subtotal']);
					unset($_SESSION['cart']);

					redirect("thanks.php");
				}
			}
		}
	    
	}

/////////////////////////////////////////////////////////////////////////////////

	public function getAllFromUsersmeta($u_id)
	{
	    $this->db->query("SELECT * FROM usersmeta WHERE usersmeta_user_id = :id");
	    $this->db->bind(":id", $u_id);
	    $result = $this->db->single();
	    return $result;
	}

////////////////////////////////////////////////////////////////////////////////

	private function insertInOrders($u_id, $cart)
	{
	    $total = 0;

	    foreach ($cart as $key => $value) {
	    	$this->db->query("SELECT * FROM products WHERE product_id = :id");
	    	$this->db->bind(":id", $key);
	    	$ord_row = $this->db->single();

	    	$price = $ord_row->product_price;
	    	$new_price = $ord_row->product_new_price;

	    	$insert_price = (empty($new_price)) ? $price : $new_price;

	    	$total = $total + ($insert_price * $value['qua']);
	    }

	    $this->db->query("INSERT INTO orders(order_user_id, total_price, order_status) VALUES(:id, :total, :status)");
	    $this->db->bind(":id", $u_id);
	    $this->db->bind(":total", $total);
	    $this->db->bind(":status", "Pending order");

	    if ($this->db->execute()) {
	    	return true;
	    }else{
	    	return false;
	    }

	}

//////////////////////////////////////////////////////////////////////////////

	private function insertInOrderItems($order_id, $cart)
	{
	     foreach ($cart as $key => $value) {
	    	$this->db->query("SELECT * FROM products WHERE product_id = :id");
	    	$this->db->bind(":id", $key);
	    	$ord_row = $this->db->single();

	    	$prod_id = $ord_row->product_id;

	    	$price = $ord_row->product_price;
	    	$new_price = $ord_row->product_new_price;
	    	$insert_price = (empty($new_price)) ? $price : $new_price;

	    	$qua = $value['qua'];

	    	$this->db->query("INSERT INTO order_items(product_id, product_quantity, product_price, order_id) VALUES(:p_id, :qua, :price, :o_id)");
	    	$this->db->bind(":p_id", $prod_id);
	    	$this->db->bind(":qua", $qua);
	    	$this->db->bind(":price", $insert_price);
	    	$this->db->bind(":o_id", $order_id);

	    	$exe = $this->db->execute();
	    	
	    }

	    if ($exe) {
	    	return true;
	    }else{
	    	return false;
	    }
	}

///////////////////////////////////////////////////////////////////////

	public function buyNowOrder($product_id, $data)
	{
	   $this->db->query("INSERT INTO buy_now_order(product_id, product_quantity, product_price, order_status, full_name, address, city, phone) VALUES(:p_id, :p_quan, :p_price, :status, :name, :address, :city, :phone)");
	   $this->db->bind(":p_id", $product_id);
	   $this->db->bind(":p_quan", $data['quan']);
	   $this->db->bind(":p_price", $data['price']);
	   $this->db->bind(":status", "Pending order");
	   $this->db->bind(":name", $data['fullname']);
	   $this->db->bind(":address", $data['address']);
	   $this->db->bind(":city", $data['city']);
	   $this->db->bind(":phone", $data['phone']);

	   if ($this->db->execute()) {
	   	redirect("thanks.php");
	   }

	}

////////////////////////////////////////////////////////////////////






} // end class
















 ?>