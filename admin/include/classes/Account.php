<?php 


class Account
{
	private $db;
	private $errorArray;

	public function __construct()
	{
	    $this->db = new Database;
	    $this->errorArray = [];
	}

////////////////////////////////////////////////////////////////////////////////////////////

	public function getError($error)
	{
		if (!in_array($error, $this->errorArray)) {	
			$error = "";
		}
		return "<span class='errorMessage'>$error</span>";
	}

/////////////////////////////////////////////////////////////////////////////////////

	public function register($fn,$ln,$em,$pw)
	{

		$this->validateFirstName($fn);
		$this->validateLastName($ln);
		$this->validateEmail($em);
		$this->validatePassword($pw);


		if (empty($this->errorArray)) {
			//insert into db
			return $this->insertUserDetails($fn, $ln, $em, $pw);

		}else{

			return false;
		}
	}

//////////////////////////////////////////////////////////////////////////////////////////

	private function insertUserDetails($fn, $ln, $em, $pw)
	{
		$hash_password = password_hash($pw, PASSWORD_DEFAULT);

		$this->db->query('INSERT INTO users (first_name, last_name, email, password, role) VALUES(:f_name, :l_name, :email, :password, :role)');

		$this->db->bind(':f_name', $fn);
		$this->db->bind(':l_name', $ln);
		$this->db->bind(':email', $em);
		$this->db->bind(':password', $hash_password);
		$this->db->bind(':role', 'user');

		if ($this->db->execute()) {
        	return true;
        }else{
        	return false;
        }

	}

/////////////////////////////////////////////////////////////////////////////////////////////

	private function validateFirstName($fn)
	{
	    if (empty($fn)) {
	    	array_push($this->errorArray, Constants::$firstNameEmpty);
	    	return;
	    }
	}

/////////////////////////////////////////////////////////////////////////////////////////////

	private function validateLastName($ln)
	{
	    if (empty($ln)) {
	    	array_push($this->errorArray, Constants::$lastNameEmpty);
	    	return;
	    }
	}

//////////////////////////////////////////////////////////////////////////////////////////////

	private function findUserByEmail($email)
	    {
	        $this->db->query('SELECT * FROM users WHERE email = :email');
	        // bind value
	        $this->db->bind(':email', $email);

	        $row = $this->db->single();

	        // check row
	        if ($this->db->rowCount() > 0) {
	        	return true;
	        }else{
	        	return false;
	        }
	    }

/////////////////////////////////////////////////////////////////////////////////////////////

	private function validateEmail($em)
	{
		if (empty($em)) {
			array_push($this->errorArray, Constants::$emailEmpty);
			return;
		}

		if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, Constants::$emailInvalid);
			return;
		}

		if ($this->findUserByEmail($em)) {
			array_push($this->errorArray, Constants::$emailTaken);
			return;
		}
	
	}

//////////////////////////////////////////////////////////////////////////////////////////////////

	private function validatePassword($pw)
	{
		if (empty($pw)) {
			array_push($this->errorArray, Constants::$passwordEmpty);
			return;
		}

		if (strlen($pw) < 5) {
			array_push($this->errorArray, Constants::$passwordLength);
			return;
		}
	
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	public function login($em, $pw)
	{
	    $this->validateLoginEmail($em);
	    $this->validateLoginPassword($pw);

	    if (empty($this->errorArray)) {
	    	
	    	$this->db->query('SELECT * FROM users WHERE email = :email');
	        $this->db->bind(':email', $em);

	        $row = $this->db->single();

	        $hashed_password = $row->password;

	        if (password_verify($pw, $hashed_password)) {

	        	$_SESSION['user_id'] = $row->user_id;
	        	$_SESSION['first_name'] = $row->first_name;
	        	$_SESSION['last_name'] = $row->last_name;
	        	$_SESSION['email'] = $row->email;
	        	$_SESSION['role'] = $row->role;

	        	if ($row->role === 'admin') {
	        		redirect('admin');
	        	}

	        	if ($row->role === 'user') {
	        		// set_message("<p class='text-center'>You are log in</p>");
					redirect('my_orders.php');
	        	}
	        	
	        }else{
	        	array_push($this->errorArray, Constants::$wrongPassword);
				return;
	        }
	    }
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	private function validateLoginEmail($em)
	{
		if (empty($em)) {
			array_push($this->errorArray, Constants::$emailEmpty);
			return;
		}

		if (!$this->findUserByEmail($em)) {
			array_push($this->errorArray, Constants::$wrongEmail);
			return;
		}

	}

//////////////////////////////////////////////////////////////////////////////////////////////////

	private function validateLoginPassword($pw)
	{
		if (empty($pw)) {
			array_push($this->errorArray, Constants::$passwordEmpty);
			return;
		}
	}

///////////////////////////////////////////////////////////////////////////////////////////////////

	public static function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        session_destroy();
        redirect('../../../login.php');
    }

////////////////////////////////////////////////////////////////////////////////////////////////////




    
} //end class


















 ?>