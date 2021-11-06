<?php 

class Testimonial
{
    private $db;
    
	public function __construct()
	{
	    $this->db = new Database;
	}

/////////////////////////////////////////////////////////////////////

	public function addTestimonial($data, $img)
	{
	    $user_name = trim($data['t_name']);
	    $position = trim($data['position']);
	    $text = $data['t_text'];
	    $image = $img['user_img']['name'];
	    $image_tmp = $img['user_img']['tmp_name'];

	    $this->db->query("INSERT INTO testimonials(testi_name, testi_position, testi_img, testi_text) VALUES(:t_name, :position, :t_img, :t_text)");

	    $this->db->bind('t_name', $user_name);
	    $this->db->bind('position', $position);
	    $this->db->bind('t_img', $image);
	    $this->db->bind('t_text', $text);

	    if ($this->db->execute()) {
	    	move_uploaded_file($image_tmp, "../images/testimonials_img/$image");
	    	set_message('<div class="alert alert-info alert-dismissible fade show col-6" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        Testimonial Added
                    </div>');
	    	redirect('testimonials.php');
	    }

	}

//////////////////////////////////////////////////////////////////////

	public function getTestimonialsInAdmin()
	{
	    $this->db->query("SELECT * FROM testimonials ORDER BY testi_id DESC");
	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	$t_id = $row->testi_id;
	    	$t_name = $row->testi_name;
	    	$position = $row->testi_position;
	    	$text = substr($row->testi_text,0,100);
	    	$image = $row->testi_img;
	    	$status = $row->testi_status;


	    	if ($status == 1) {
	    		$st = "<span class='badge badge-soft-success'>Active</span>";
	    	}else{
	    		$st = "<span class='badge badge-soft-danger'>Inactive</span>";
	    	}


	    	echo "<tr>
	    			<td><input class='checkBoxes' type='checkbox' name='checBoxArrayTesti[]' value='{$t_id}'></td>
	    			<td><img height ='100px' src='../images/testimonials_img/{$image}' alt='testimonial image'></td>
	    			<td>{$t_name}<br></td>
	    			<td>{$position}</td>
	    			<td>$text</td>
	    			<td>$st</td>
	    			<td><a href='testimonials.php?source=edit_testimonial&t_id={$t_id}' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-edit'></i></a></td>
	    			<td><a href='javascript:void(0)' id=$t_id class='btn btn-soft-danger waves-effect waves-light btn_delete_testi'><i class='fas fa-trash'></i></a></td>

	    		</tr>";

	    }
	}

//////////////////////////////////////////////////////////////////////////////

	public function getTestimonialData($id)
	{
	    $t_id = trim($id);

	    $this->db->query("SELECT * FROM testimonials WHERE testi_id = :id");
	    $this->db->bind(':id', $t_id);

	    $result = $this->db->single();

	    return $result;

	}

//////////////////////////////////////////////////////////////////////////////

	public function editTestimonial($id, $data, $img)
	{
	    $t_id = trim($id);
	    $name = trim($data['t_name']);
	    $position = trim($data['position']);
	    $text = trim($data['t_text']);
	    $status = $data['t_status'];

	    $image = $img['user_img']['name'];
	    $image_tmp = $img['user_img']['tmp_name'];

	    if (empty($image)) {
	    	$this->db->query("SELECT testi_img FROM testimonials WHERE testi_id = :id");
	    	$this->db->bind(':id',$t_id);
	    	$result = $this->db->single();

	    	$image = $result->testi_img;
	    }

	    $this->db->query("UPDATE testimonials SET testi_name = :name, testi_position = :position, testi_img = :img, testi_text = :t_text, testi_status = :status WHERE testi_id = :id");

	    $this->db->bind(":name", $name);
	    $this->db->bind(":position", $position);
	    $this->db->bind(":img", $image);
	    $this->db->bind(":t_text", $text);
	    $this->db->bind(":status", $status);
	    $this->db->bind(":id", $t_id);

	    if ($this->db->execute()) {
	    	move_uploaded_file($image_tmp, "../images/testimonials_img/$image");
	    	set_message('<div class="alert alert-info alert-dismissible fade show col-6" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        Testimonial Updated
                    </div>');
	    	redirect('testimonials.php');
	    }
	}

///////////////////////////////////////////////////////////////////////////////

	public function deleteTestimonial($id)
	{
	    $this->db->query("DELETE FROM testimonials WHERE testi_id = {$id}");
	    $this->db->execute();    
	}

/////////////////////////////////////////////////////////////////////////////////

	public function testimonialStatus()
	{
	    if (isset($_POST['checBoxArrayTesti'])) {

	    	foreach ($_POST['checBoxArrayTesti'] as $postValueId) {
	    		
	    		$bulk_options = $_POST['testi_options'];

	    		switch ($bulk_options) {

	               	case 'delete':
	               		$this->db->query("DELETE FROM testimonials WHERE testi_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'active':
	               		$this->db->query("UPDATE testimonials SET testi_status = 1 WHERE testi_id = {$postValueId}");
	               		$this->db->execute();
	               		break;

	               	case 'inactive':
	               		$this->db->query("UPDATE testimonials SET testi_status = 0 WHERE testi_id = {$postValueId}");
	               		$this->db->execute();
	               		break; 	

	    		}
	    	}
	    }
	}

////////////////////////////////////////////////////////////////////////

	public function testimonialFront()
	{
	    $this->db->query("SELECT * FROM testimonials WHERE  testi_status = 1 ");
	    return $this->db->resultSet();
	}

///////////////////////////////////////////////////////////////////////////











} // end class













 ?>