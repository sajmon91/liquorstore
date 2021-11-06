<?php 


class Product
{
	private $db;
    
	public function __construct()
	{
	    $this->db = new Database;
	}

//////////////////////////////////////////////////////////////

	public function getCategoryInProduct()
	{
	    $this->db->query("SELECT * FROM categories");

	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$cat_id = $row->cat_id;
		   	$cat_name = $row->cat_name;

		   	echo "<option value='$cat_id'>$cat_name</option>";
	    }
	}

////////////////////////////////////////////////////////////////

	public function addProduct($data, $img)
	{
	    $product_name = trim($data['p_name']);
	    $desc = trim($data['p_desc']);
	    $price = trim($data['p_price']);
	    $new_badge = $data['new_badge'];
	    $category = $data['p_cat'];
	    $stock = trim($data['p_stock']);
	    $image = $img['img']['name'];
	    $image_tmp = $img['img']['tmp_name'];

	    $this->db->query("INSERT INTO products(product_name, product_cat, product_price, new_badge, product_desc, product_stock, product_img, status) VALUES(:p_name, :p_cat, :price, :new_badge, :p_desc, :stock, :p_img, 1)");

	    $this->db->bind(':p_name', $product_name);
	    $this->db->bind(':p_cat', $category);
	    $this->db->bind(':price', $price);
	    $this->db->bind(':new_badge', $new_badge);
	    $this->db->bind(':p_desc', $desc);
	    $this->db->bind(':stock', $stock);
	    $this->db->bind(':p_img', $image);

	    if ($this->db->execute()) {
	    	move_uploaded_file($image_tmp, "../images/products_img/$image");
	    	set_message('<div class="alert alert-info alert-dismissible fade show col-6" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        Product Added
                    </div>');
	    	redirect('products.php');
	    }

	}

//////////////////////////////////////////////////////////////////////////////////////

	public function showProductTitle($table, $prod_id, $prod_cat_id, $title)
	{
	    $this->db->query("SELECT * FROM $table WHERE $prod_id = :cat_id");
	    $this->db->bind(':cat_id', $prod_cat_id);

	    $result = $this->db->single();

	    return $result->$title;
	}

////////////////////////////////////////////////////////////////////////////////////////

	public function getProductsInAdmin()
	{
	    $this->db->query("SELECT * FROM products ORDER BY product_id DESC");
	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$p_id = $row->product_id;
	    	$p_name = $row->product_name;
	    	$p_cat = $this->showProductTitle('categories', 'cat_id', $row->product_cat, 'cat_name');
	    	$p_price = $row->product_price;
	    	$p_new_price = $row->product_new_price;
	    	$p_discount = $row->product_discount;
	    	$p_stock = $row->product_stock;
	    	$p_image = $row->product_img;
	    	$status = $row->status;
	    	$new_b = $row->new_badge;
	    	$best_seler = $row->best_seler_badge;

	    	if (!empty($p_discount)) {
	    		$disc = "Discount: {$p_discount} % <br>
	    				New Price: {$p_new_price} $";
	    	}else{
	    		$disc = '';
	    	}


	    	if ($status == 1) {
	    		$st = "<span class='badge badge-soft-success'>Active</span>";
	    	}else{
	    		$st = "<span class='badge badge-soft-danger'>Inactive</span>";
	    	}

	    	if ($p_stock <= 5) {
	    		$stock = "<span class='badge badge-soft-danger'>{$p_stock}</span>";
	    	}else{
	    		$stock = $p_stock;
	    	}

	    	if ($p_stock <= 0) {
	    		$this->db->query("UPDATE products SET status = 0 WHERE product_id = :id");
	    		$this->db->bind(":id", $p_id);
	    		$this->db->execute();
	    	}

	    	if ($p_stock > 0) {
	    		$this->db->query("UPDATE products SET status = 1 WHERE product_id = :id");
	    		$this->db->bind(":id", $p_id);
	    		$this->db->execute();
	    	}


	    	$nb = (!empty($new_b)) ? "<span class='badge badge-soft-success'>{$new_b}</span>" : '';
	    	$bs = (!empty($best_seler)) ? "<span class='badge badge-soft-warning'>{$best_seler}</span>" : '';


	    	echo "<tr>
	    			<td><input class='checkBoxes' type='checkbox' name='checBoxArray[]' value='{$p_id}'></td>
	    			<td><img height ='100px' src='../images/products_img/{$p_image}' alt='product image'></td>
	    			<td>{$p_name}<br>
	    				ID: {$p_id}<br>
	    				{$nb}
	    				{$bs}
	    			</td>
	    			<td>{$p_price} $ <br>
	    				$disc
	    			</td>
	    			<td><a href='products.php?source=product_category&cat_id={$row->product_cat}'>$p_cat</a></td>
	    			<td>$stock</td>
	    			<td>$st</td>
	    			<td><a href='products.php?source=edit_product&id={$p_id}' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-edit'></i></a></td>
	    			<td><a href='javascript:void(0)' id=$p_id class='btn btn-soft-danger waves-effect waves-light btn_delete'><i class='fas fa-trash'></i></a></td>

	    		</tr>";

	    }
	}

/////////////////////////////////////////////////////////////////////////////

	public function deleteProduct($id)
	{
	    $this->db->query("DELETE FROM products WHERE product_id = {$id}");
	    $this->db->execute();    
	}

//////////////////////////////////////////////////////////////////////////////

	public function getProductData($id)
	{
	    $p_id = trim($id);

	    $this->db->query("SELECT * FROM products WHERE product_id = :id");
	    $this->db->bind(':id', $p_id);

	    $result = $this->db->single();

	    return $result;
	}

//////////////////////////////////////////////////////////////////////////////

	public function getCategoryInEditProduct($p_cat_id)
	{
	    $this->db->query("SELECT * FROM categories");

	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$cat_id = $row->cat_id;
		   	$cat_name = $row->cat_name;

		   	if ($p_cat_id === $cat_id) {
		   		echo "<option selected value='$cat_id'>$cat_name</option>";
		   	}else{
		   		echo "<option value='$cat_id'>$cat_name</option>";
		   	}

		   	
	    }
	}


////////////////////////////////////////////////////////////////////////////	

	public function editProduct($id, $data, $img)
	{
	    $p_id = trim($id);
	    $p_name = trim($data['p_name']);
	    $p_desc = trim($data['p_desc']);

	    $price = trim($data['p_price']);
	    $discount = $data['discount'];

	    $new_badge = $data['new_badge'];
	    $best_seller = $data['best'];

	    $category = $data['p_cat'];
	    $stock = trim($data['p_stock']);
	    $status = $data['status'];

	    $image = $img['img']['name'];
	    $image_tmp = $img['img']['tmp_name'];

	    if (!empty($discount)) {
	    	$discount_price = ($discount / 100) * $price;
	    	$new_price = $price - $discount_price;
	    }

	    if ($discount === 'remove') {
	    	$new_price = "";
			$discount = "";
	    }

	    if (empty($discount)) {
	    	$new_price = "";
			$discount = "";
	    }

	    if (empty($image)) {
	    	$this->db->query("SELECT product_img FROM products WHERE product_id = :id");
	    	$this->db->bind(':id',$p_id);
	    	$result = $this->db->single();

	    	$image = $result->product_img;
	    }

	    $this->db->query("UPDATE products SET product_name = :p_name, product_cat = :p_cat, product_price = :price, product_new_price = :new_price, product_discount = :discount, new_badge = :new_badge, best_seler_badge = :best, product_desc = :p_desc, product_stock = :stock, product_img = :img, status = :status WHERE product_id = :id");

	    $this->db->bind(':p_name', $p_name);
	    $this->db->bind(':p_cat', $category);
	    $this->db->bind(':price', $price);
	    $this->db->bind(':new_price', $new_price);
	    $this->db->bind(':discount', $discount);
	    $this->db->bind(':new_badge', $new_badge);
	    $this->db->bind(':best', $best_seller);
	    $this->db->bind(':p_desc', $p_desc);
	    $this->db->bind(':stock', $stock);
	    $this->db->bind(':img', $image);
	    $this->db->bind(':status', $status);
	    $this->db->bind(':id', $p_id);

	    if ($this->db->execute()) {
	    	move_uploaded_file($image_tmp, "../images/products_img/$image");
	    	set_message('<div class="alert alert-info alert-dismissible fade show col-6" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        Product Updated
                    </div>');
	    	redirect('products.php');
	    }


	}

///////////////////////////////////////////////////////////////////////////

	public function getProductsInOtherPage($get_id, $prod_row)
	{
		$get = trim($get_id);
		$row_name = $prod_row;

	    $this->db->query("SELECT * FROM products WHERE $row_name = :id ORDER BY product_id DESC");
	    $this->db->bind(':id', $get);
	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$p_id = $row->product_id;
	    	$p_name = $row->product_name;
	    	$p_cat = $this->showProductTitle('categories', 'cat_id', $row->product_cat, 'cat_name');
	    	$p_price = $row->product_price;
	    	$p_new_price = $row->product_new_price;
	    	$p_discount = $row->product_discount;
	    	$p_stock = $row->product_stock;
	    	$p_image = $row->product_img;
	    	$status = $row->status;
	    	$new_b = $row->new_badge;
	    	$best_seler = $row->best_seler_badge;

	    	if (!empty($p_discount)) {
	    		$disc = "Discount: {$p_discount} % <br>
	    				New Price: {$p_new_price} $";
	    	}else{
	    		$disc = '';
	    	}


	    	if ($status == 1) {
	    		$st = "<span class='badge badge-soft-success'>Active</span>";
	    	}else{
	    		$st = "<span class='badge badge-soft-danger'>Inactive</span>";
	    	}

	    	if ($p_stock <= 5) {
	    		$stock = "<span class='badge badge-soft-danger'>{$p_stock}</span>";
	    	}else{
	    		$stock = $p_stock;
	    	}


	    	$nb = (!empty($new_b)) ? "<span class='badge badge-soft-success'>{$new_b}</span>" : '';
	    	$bs = (!empty($best_seler)) ? "<span class='badge badge-soft-warning'>{$best_seler}</span>" : '';


	    	echo "<tr>
	    			<td><input class='checkBoxes' type='checkbox' name='checBoxArray[]' value='{$p_id}'></td>
	    			<td><img height ='100px' src='../images/products_img/{$p_image}' alt='product image'></td>
	    			<td>{$p_name}<br>
	    				ID: {$p_id}<br>
	    				{$nb}
	    				{$bs}
	    			</td>
	    			<td>{$p_price} $ <br>
	    				$disc
	    			</td>
	    			<td><a href='products.php?source=product_category&cat_id={$row->product_cat}'>$p_cat</a></td>
	    			<td>$stock</td>
	    			<td>$st</td>
	    			<td><a href='products.php?source=edit_product&id={$p_id}' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-edit'></i></a></td>
	    			<td><a href='javascript:void(0)' id=$p_id class='btn btn-soft-danger waves-effect waves-light btn_delete'><i class='fas fa-trash'></i></a></td>

	    		</tr>";

	    }
	}

/////////////////////////////////////////////////////////////////////////

	private function discountQuery($p_id, $bulk_option)
	{
	    $this->db->query("SELECT * FROM products WHERE product_id = $p_id");

	    $row = $this->db->single();

	    $discount_price = ($bulk_option / 100) * $row->product_price;
	    $new_price = $row->product_price - $discount_price;

	    $this->db->query("UPDATE products SET product_discount = :option, product_new_price = :new_price WHERE product_id = :p_id");
	    $this->db->bind(':option', $bulk_option);
	    $this->db->bind(':new_price', $new_price);
	    $this->db->bind(':p_id', $p_id);

	    $this->db->execute();

	}

////////////////////////////////////////////////////////////////////////////

	public function productDiscount()
	{
	    if (isset($_POST['checBoxArray'])) {

	    	foreach ($_POST['checBoxArray'] as $postValueId) {
	    		
	    		$bulk_options = $_POST['bulk_options'];

	    		switch ($bulk_options) {
	    			case '5':
	    				$this->discountQuery($postValueId, 5);
	    				break;

	    			case '10':
	    				$this->discountQuery($postValueId, 10);
	    				break;

	    			case '15':
	    				$this->discountQuery($postValueId, 15);
	    				break;
	    			
	    			case '20':
               			$this->discountQuery($postValueId, 20);
               			break; 

	               	case '25':
	               		$this->discountQuery($postValueId, 25);
	               		break;

	                case '30':
	               		$this->discountQuery($postValueId, 30);
	                   	break; 

	                 case '35':
	               		$this->discountQuery($postValueId, 35);
	               		break;

	                case '40':
	               		$this->discountQuery($postValueId, 40);
	                   break; 

	                case '45':
	               		$this->discountQuery($postValueId, 45);
	               		break;

	                case '50':
	               		$this->discountQuery($postValueId, 50);
	                   break; 

	                 case '55':
	               		$this->discountQuery($postValueId, 55);
	               		break; 

	               	case '60':
	               		$this->discountQuery($postValueId, 60);
	               		break;

	               	case '65':
	               		$this->discountQuery($postValueId, 65);
	               		break;

	               	case '70':
	               		$this->discountQuery($postValueId, 70);
	               		break;

	               	case 'remove':
	               		$this->db->query("UPDATE products SET product_discount = '', product_new_price = '' WHERE product_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'delete':
	               		$this->db->query("DELETE FROM products WHERE product_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'active':
	               		$this->db->query("UPDATE products SET status = 1 WHERE product_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'inactive':
	               		$this->db->query("UPDATE products SET status = 0 WHERE product_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'new':
	               		$this->db->query("UPDATE products SET new_badge = 'NEW' WHERE product_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'remove_new':
	               		$this->db->query("UPDATE products SET new_badge = '' WHERE product_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'best':
	               		$this->db->query("UPDATE products SET best_seler_badge = 'BEST SELLER' WHERE product_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'remove_best':
	               		$this->db->query("UPDATE products SET best_seler_badge = '' WHERE product_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	    		}
	    	}
	    }
	}


//////////////////////////////////////////////////////////////////////////////

	public function productsFront($limit)
	{
	    $this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 ORDER BY rand() LIMIT $limit");
	    return $this->db->resultSet();
	}

//////////////////////////////////////////////////////////////////////////////

	public function productsPageFront($limit, $offset, $sort = null)
	{
		if ($sort == null) {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 ORDER BY product_id DESC LIMIT $limit OFFSET $offset");
	    	return $this->db->resultSet();
		}

		if ($sort == 'lower') {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 ORDER BY product_price ASC LIMIT $limit OFFSET $offset");
	    	return $this->db->resultSet();
		}

		if ($sort == 'high') {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 ORDER BY product_price DESC LIMIT $limit OFFSET $offset");
	    	return $this->db->resultSet();
		}


		if ($sort == 'a-z') {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 ORDER BY product_name ASC LIMIT $limit OFFSET $offset");
	    	return $this->db->resultSet();
		}

		if ($sort == 'z-a') {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 ORDER BY product_name DESC LIMIT $limit OFFSET $offset");
	    	return $this->db->resultSet();
		}
	    
	}

/////////////////////////////////////////////////////////////////////////////

	public function productSingle($id)
	{
	    $this->db->query("SELECT * FROM products WHERE product_id = :id");
	    $this->db->bind(':id', $id);
	    return $this->db->single();
	}

////////////////////////////////////////////////////////////////////////////

	public function similarProducts($category_id, $limit)
	{
	    $this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 AND product_cat = :id ORDER BY RAND() LIMIT $limit");
	    $this->db->bind(":id", $category_id);
	    return $this->db->resultSet();
	}

//////////////////////////////////////////////////////////////////////////

	public function categoryProductsFront($category_id, $limit, $offset, $sort = null)
	{
		if ($sort == null) {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 AND product_cat = :id ORDER BY product_id DESC LIMIT $limit OFFSET $offset");
	    	$this->db->bind(":id", $category_id);
	    	return $this->db->resultSet();
		}

		if ($sort == 'lower') {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 AND product_cat = :id ORDER BY product_price ASC LIMIT $limit OFFSET $offset");
	    	$this->db->bind(":id", $category_id);
	    	return $this->db->resultSet();
		}

		if ($sort == 'high') {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 AND product_cat = :id ORDER BY product_price DESC LIMIT $limit OFFSET $offset");
	    	$this->db->bind(":id", $category_id);
	    	return $this->db->resultSet();
		}

		if ($sort == 'a-z') {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 AND product_cat = :id ORDER BY product_name ASC LIMIT $limit OFFSET $offset");
	    	$this->db->bind(":id", $category_id);
	    	return $this->db->resultSet();
		}

		if ($sort == 'z-a') {
			$this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 AND product_cat = :id ORDER BY product_name DESC LIMIT $limit OFFSET $offset");
	    	$this->db->bind(":id", $category_id);
	    	return $this->db->resultSet();
		}
	    
	}

/////////////////////////////////////////////////////////////////////////

	public function countAllProducts($type, $cat_id = null)
	{
		if ($type === "products") {
			$this->db->query("SELECT count(product_id) AS p FROM products WHERE status = 1");
	    	return $this->db->single();
		}

		if ($type === "category") {
			$this->db->query("SELECT count(product_id) AS p FROM products WHERE product_cat = :id AND status = 1");
			$this->db->bind(":id", $cat_id);
	    	return $this->db->single();
		}
	    
	}

///////////////////////////////////////////////////////////////////////////

	public function filterProductsPageFront($min_max, $limit, $offset)
	{
	    $min = $min_max['min'];
	    $max = $min_max['max'];

	    $this->db->query("SELECT * FROM products WHERE product_stock > 0 AND status = 1 AND product_price BETWEEN :min AND :max ORDER BY product_price ASC LIMIT $limit OFFSET $offset");
	    $this->db->bind(":min", $min);
	    $this->db->bind(":max", $max);
	    return $this->db->resultSet();
	}

///////////////////////////////////////////////////////////////////////////

	public function countAllFilterProducts($min_max, $type, $cat_id = null)
	{
		$min = $min_max['min'];
	    $max = $min_max['max'];

	    if ($type === "products" ) {
	    	$this->db->query("SELECT count(product_id) AS p FROM products WHERE status = 1 AND product_price BETWEEN :min AND :max");
			$this->db->bind(":min", $min);
		    $this->db->bind(":max", $max);
	    	return $this->db->single();
	    }

	    if ($type === "category") {
			$this->db->query("SELECT count(product_id) AS p FROM products WHERE product_cat = :id AND status = 1 AND product_price BETWEEN :min AND :max");
			$this->db->bind(":id", $cat_id);
			$this->db->bind(":min", $min);
		    $this->db->bind(":max", $max);
	    	return $this->db->single();
		}
	}

/////////////////////////////////////////////////////////////////////////////

	public function filterProductsCategoryPageFront($min_max, $limit, $offset, $cat_id)
	{
	    $min = $min_max['min'];
	    $max = $min_max['max'];

	    $this->db->query("SELECT * FROM products WHERE product_cat = :id AND product_stock > 0 AND status = 1 AND product_price BETWEEN :min AND :max ORDER BY product_price ASC LIMIT $limit OFFSET $offset");
	    $this->db->bind(":id", $cat_id);
	    $this->db->bind(":min", $min);
	    $this->db->bind(":max", $max);
	    return $this->db->resultSet();
	}

///////////////////////////////////////////////////////////////////////////////




} //end class


















 ?>