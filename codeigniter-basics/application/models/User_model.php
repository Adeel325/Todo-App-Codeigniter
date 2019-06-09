<?php 



class User_model extends CI_Model
{

	public function create_user()
	{

		$options = ['cost'=>12];
		$encrypted_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
		$data = array(
			'username' => $this->input->post('username'), 
			'first_name' => $this->input->post('first_name'), 
			'last_name' => $this->input->post('last_name'), 
			'email' => $this->input->post('email'), 
			'password' => $encrypted_password 
		);
		$user = $this->db->insert('users', $data);
		return $user;
	}

	public function user_login($username, $password){

		$this->db->where('username', $username);
		$result = $this->db->get('users');
		$db_password = $result->row(6)->password;
		
		if(password_verify($password, $db_password)){
			return $result->row(0)->id;
		}
		else{
			return false;
		}

	}
	
	// function __construct(argument)
	// {
	// 	# code...
	// }
	// function get_users(){

	// 	$query = $this->db->get('users');
	// 	return $query->result();

	// }

	// function create_user($data){

	// 	$this->db->insert('users', $data);
	// }

	// function update_user($data, $id){

	// 	$this->db->where(['id'=>$id]);
	// 	$this->db->update('users', $data);
	// }

	// public function delete_user($id)
	// {
	// 	$this->db->where(['id'=>$id]);
	// 	$this->db->delete('users');
	// }

}



 ?>