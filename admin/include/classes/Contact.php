<?php 


class Contact
{
    
	private $db;

	public function __construct()
	{
	    $this->db = new Database;
	}

//////////////////////////////////////////////////////////////////////////////////

	public function contactUs($data)
	{
	    $name = $this->sanitizeForm($data['name']);
	    $email = $this->sanitizeForm($data['email']);
	    $message = $this->sanitizeForm($data['message']);
	    $score = $this->sanitizeForm($data['score']);
	    $score = intval($score);


	    if ($score === 8) {
	    	$this->db->query("INSERT INTO messages(name, email, msg) VALUES(:name, :email, :msg)");
	    	$this->db->bind(":name", $name);
	    	$this->db->bind(":email", $email);
	    	$this->db->bind(":msg", $message);

	    	if ($this->db->execute()) {
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	}

	

/////////////////////////////////////////////////////////////////////////////////

	private function sanitizeForm($inputText)
	{
	    $inputText = strip_tags($inputText);
		$inputText = trim($inputText);
		return $inputText;
	}

///////////////////////////////////////////////////////////////////////////////

	public function allEmails($type)
	{

		if ($type === "all") {
			$this->db->query("SELECT * FROM messages ORDER BY id DESC");
	    	$result = $this->db->resultSet();
		}

		if ($type === "read") {
			$this->db->query("SELECT * FROM messages WHERE is_read = 1 ORDER BY id DESC");
	    	$result = $this->db->resultSet();
		}

		if ($type === "no read") {
			$this->db->query("SELECT * FROM messages WHERE is_read = 0 ORDER BY id DESC");
	    	$result = $this->db->resultSet();
		}
	    
	    foreach ($result as $row) {

	    	$e_id = $row->id;
	    	$name = $row->name;
	    	$email = $row->email;
	    	$msg = substr($row->msg,0,100);
	    	$date = date("d-M-Y", strtotime($row->date));

	    	echo "<li>                                           
                    <div class='col-mail col-mail-1'>
                        <a href='email.php?source=email_read&id=$e_id'>
                            <p class='title'>$name</p>
                        </a>                                                    
                    </div>
                    <div class='col-mail col-mail-2'>
                        <a href='email.php?source=email_read&id=$e_id' class='subject'>$msg ...</a>
                        <div class='date'>$date</div>
                        <div class='del'>
                            <button type='button' id=$e_id class='btn btn-primary waves-light waves-effect email_delete'><i class='fas fa-trash'></i></button>
                        </div>

                    </div>                                                                                         
                </li>
	    	";

	        
	    }
	}


///////////////////////////////////////////////////////////////////////////////

	public function singleEmail($id)
	{
	    $this->db->query("SELECT * FROM messages WHERE id = :id");
	    $this->db->bind(":id", $id);
	    return $this->db->single();
	}

/////////////////////////////////////////////////////////////////////////////////

	public function countAllEmails()
	{
	    $this->db->query("SELECT count(id) AS all_e FROM messages");
	    return $this->db->single();
	}

//////////////////////////////////////////////////////////////////////////////////

	public function countAllNoReadEmails()
	{
	    $this->db->query("SELECT count(id) AS no_read FROM messages WHERE is_read = 0");
	    return $this->db->single();
	}

/////////////////////////////////////////////////////////////////////////////////

	public function updateIsRead($id)
	{
	    $this->db->query("UPDATE messages SET is_read = 1 WHERE id = :id");
	    $this->db->bind(":id", $id);
	    $this->db->execute();
	}

/////////////////////////////////////////////////////////////////////////////////

	public function deleteMessage($id)
	{
	    $this->db->query("DELETE FROM messages WHERE id = :id");
	    $this->db->bind(":id", $id);
	    $this->db->execute();
	}

///////////////////////////////////////////////////////////////////////////////////////////














} // end class
















 ?>