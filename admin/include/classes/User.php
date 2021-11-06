<?php 


class User
{

	private $db;
	private $user_id;

	public function __construct($id)
	{
	    $this->db = new Database;
	    $this->user_id = $id;
	}

///////////////////////////////////////////////////////

	private function getAllFromUsers()
	{
	    $this->db->query("SELECT * FROM users WHERE user_id = :id");
	    $this->db->bind(':id', $this->user_id);
	    $row = $this->db->single();
	    return $row;
	}

////////////////////////////////////////////////////////

	public function getUserID()
	{
	    $result = $this->getAllFromUsers();
	    return $result->user_id;
	}

///////////////////////////////////////////////////////

	public function getFirstName()
	{
	    $result = $this->getAllFromUsers();
	    return $result->first_name;
	}

///////////////////////////////////////////////////////

	public function getLastName()
	{
	    $result = $this->getAllFromUsers();
	    return $result->last_name;
	}

///////////////////////////////////////////////////////

	public function getEmail()
	{
	    $result = $this->getAllFromUsers();
	    return $result->email;
	}

///////////////////////////////////////////////////////

	public function getRole()
	{
	    $result = $this->getAllFromUsers();
	    return $result->role;
	}

//////////////////////////////////////////////////////

	public function getProfileImg()
	{
	    $result = $this->getAllFromUsers();
	    return $result->profile_img;
	}

//////////////////////////////////////////////////////

	public function getAllUsers()
	{
	    $this->db->query("SELECT * FROM users");
	    $result = $this->db->resultSet();

	    foreach ($result as $row) {
	    	
	    	echo "<tr>
	    			<td>$row->user_id</td>
	    			<td><img height ='50px' src='../images/profile_img/$row->profile_img' alt='profile image'></td>
	    			<td>$row->first_name</td>
	    			<td>$row->last_name</td>
	    			<td>$row->role</td>
	    			<td><a href='user_info?u_id=$row->user_id' class='btn btn-soft-warning waves-effect waves-light'><i class='fas fa-info-circle'></i></a></td>
	    			<td><a href='javascript:void(0)' id=$row->user_id class='btn btn-soft-danger waves-effect waves-light delete_user'><i class='fas fa-trash'></i></a></td>
	    		</tr>";
	    }
	}

//////////////////////////////////////////////////////////

	public function getUserInfo()
	{
	    $this->db->query("SELECT * FROM users WHERE user_id = :id");
	    $this->db->bind(":id", $this->user_id);
	    $result = $this->db->single();
	    return $result;

	}

///////////////////////////////////////////////////////////////////

	public function getUsermetaInfo()
	{
	    $this->db->query("SELECT * FROM usersmeta WHERE usersmeta_user_id = :id");
	    $this->db->bind(":id", $this->user_id);
	    $result = $this->db->single();
	    return $result;

	}

/////////////////////////////////////////////////////////////////

	public function deleteUser($id)
	{
	    $this->db->query("DELETE FROM users WHERE user_id = {$id}");
	    $this->db->execute();
	}

//////////////////////////////////////////////////////////////////

	public function editProfile($u_id, $data, $img)
	{
	    $id = $u_id;
	    $f_name = trim($data['f_name']);
	    $l_name = trim($data['l_name']);
	    $email = trim($data['u_email']);

	    $image = $img['user_img']['name'];
	    $image_tmp = $img['user_img']['tmp_name'];

	    if (empty($image)) {
	    	$this->db->query("SELECT profile_img FROM users WHERE user_id = :id");
	    	$this->db->bind(':id',$id);
	    	$result = $this->db->single();

	    	$image = $result->profile_img;
	    }

	    $this->db->query("UPDATE users SET first_name = :f_name, last_name = :l_name, email = :email, profile_img = :image WHERE user_id = :id");
	    $this->db->bind(":f_name", $f_name);
	    $this->db->bind(":l_name", $l_name);
	    $this->db->bind(":email", $email);
	    $this->db->bind(":image", $image);
	    $this->db->bind(":id", $id);


	    if ($this->db->execute()) {
	    	move_uploaded_file($image_tmp, "../images/profile_img/$image");
	    	redirect($_SERVER['PHP_SELF']);
	    }


	}

///////////////////////////////////////////////////////////////////

	public function editProfileFront($u_id, $data, $img)
	{
	    $id = $u_id;
	    $f_name = trim($data['fname']);
	    $l_name = trim($data['lname']);
	    $email = trim($data['email']);

	    $address = trim($data['address']);
	    $city = trim($data['city']);
	    $phone = trim($data['phone']);

	    $image = $img['my_img']['name'];
	    $image_tmp = $img['my_img']['tmp_name'];

	    if (empty($image)) {
	    	$this->db->query("SELECT profile_img FROM users WHERE user_id = :id");
	    	$this->db->bind(':id',$id);
	    	$result = $this->db->single();

	    	$image = $result->profile_img;
	    }

	    $this->db->query("UPDATE users SET first_name = :f_name, last_name = :l_name, email = :email, profile_img = :image WHERE user_id = :id");
	    $this->db->bind(":f_name", $f_name);
	    $this->db->bind(":l_name", $l_name);
	    $this->db->bind(":email", $email);
	    $this->db->bind(":image", $image);
	    $this->db->bind(":id", $id);

	    if ($this->db->execute()) {
	    	move_uploaded_file($image_tmp, "images/profile_img/$image");

	    	$this->db->query("SELECT * FROM usersmeta WHERE usersmeta_user_id = {$u_id}");
			$this->db->execute();
			$count = $this->db->rowCount();

			if ($count == 1) {
				$this->db->query("UPDATE usersmeta SET address = :address, city = :city, phone = :phone WHERE usersmeta_user_id = :u_id");
		    	$this->db->bind(":address", $address);
		    	$this->db->bind(":city", $city);
		    	$this->db->bind(":phone", $phone);
		    	$this->db->bind(":u_id", $id);

		    	if ($this->db->execute()) {
		    		redirect("my_orders.php");
		    	}
			}else{
				$this->db->query("INSERT INTO usersmeta(usersmeta_user_id, address, city, phone) VALUES(:id, :address, :city, :phone)");
				$this->db->bind(":id", $id);
				$this->db->bind(":address", $address);
				$this->db->bind(":city", $city);
				$this->db->bind(":phone", $phone);
				
				if ($this->db->execute()) {
		    		redirect("my_orders.php");
		    	}
			}
	    	
	    	

	    }
	    
	}

////////////////////////////////////////////////////////////////////////



    
} // end class












 ?>