<?php 

class Category
{
	private $db;

	public function __construct()
	{
	    $this->db = new Database;
	}

////////////////////////////////////////////////////////////////////

	public function insertCategory($cat)
	{
	    $this->db->query("INSERT INTO categories(cat_name) VALUES(:cat)");
	    $this->db->bind(':cat', $cat);
	    $this->db->execute();

	    set_message('<div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        Category created
                    </div>');
	}

///////////////////////////////////////////////////////////////////////

	public function showAllCategories()
	{
	    $this->db->query("SELECT * FROM categories");

	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	      	$cat_id = $row->cat_id;
		   	$cat_name = $row->cat_name;

		   	$this->db->query("SELECT product_cat FROM products WHERE product_cat = {$cat_id}");
		   	$this->db->execute();
		   	$cat_count = $this->db->rowCount();

		   	echo "<tr>
		   	        <td>{$cat_id}</td>
		   	        <td>{$cat_name}</td>
		   	        <td><a href='products.php?source=product_category&cat_id={$cat_id}'>{$cat_count}</a></td>
		   	        <td><a href='categories.php?edit={$cat_id}' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-edit'></i></a></td>
		   	        <td><a href='categories.php?delete={$cat_id}' class='btn btn-soft-danger waves-effect waves-light'><i class='fas fa-trash'></i></a></td>
		   	      </tr>";
	    }
	}

//////////////////////////////////////////////////////////////////////////////////

	public function getCategoryTitle($id)
	{
	    $cat_id = trim($id);

	    $this->db->query("SELECT * FROM categories WHERE cat_id = :cat_id");
	    $this->db->bind(':cat_id', $cat_id);

	    $result = $this->db->single();

	    echo "<input value='$result->cat_name' id='edit-cat-input' class='form-control' type='text' name='edit_category'>";
	}

//////////////////////////////////////////////////////////////////////////////////

	public function editCategory($id, $name)
	{
	    $cat_id = trim($id);
	    $cat_name = trim($name);

	    $this->db->query("UPDATE categories SET cat_name = :cat_name WHERE cat_id = :cat_id");
	    $this->db->bind(':cat_name', $cat_name);
	    $this->db->bind(':cat_id', $cat_id);
	    $this->db->execute();

	    set_message('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        Category edited
                    </div>');

	    redirect('categories.php');

	}

///////////////////////////////////////////////////////////////////////////////////

	public function deleteCategory($id)
	{
	    $cat_id = trim($id);

	    $this->db->query("DELETE FROM categories WHERE cat_id = :id");
	    $this->db->bind(':id', $cat_id);
	    $this->db->execute();

	    set_message('<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        Category deleted
                    </div>');

	    redirect('categories.php');


	}


//////////////////////////////////////////////////////////////////////////////////

	public function getAllCategory()
	{
	    $this->db->query("SELECT * FROM categories");
	    return $this->db->resultSet();
	}

/////////////////////////////////////////////////////////////////////////////////////

	public function getCategory($id)
	{
	    $this->db->query("SELECT * FROM categories WHERE cat_id = :id");
	    $this->db->bind(":id", $id);
	    return $this->db->single();
	}


    
} //end class








 ?>