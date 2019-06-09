<?php 


class Users extends CI_Controller
{
	 public function index(){

	 	if($this->session->userdata('logged_in')){
	 	
	 		$user_id = $this->session->userdata('id');

		 	$data['tasks'] = $this->task_model->get_all_task($user_id);

		 	$data['projects'] = $this->project_model->get_all_project($user_id);

	 	}

	 	$data['main_view'] = "home_view";

		$this->load->view('layouts/main', $data);
	}


	public function register(){

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
		if($this->form_validation->run() == FALSE){
			
			$data['main_view'] = "users/register_view";
			$this->load->view('layouts/main', $data);
		}
		else{

			if($this->User_model->create_user()){

				$this->session->set_flashdata('user_registered', 'User has been registered');
				$this->index();
			}
			else{
				
			}

		}

			
	}


	public function login()
	{
		

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

		if ($this->form_validation->run() == FALSE) {       
			$errors = validation_errors();
           	$this->session->set_flashdata('form_error', $errors);
           	
           	$this->index();
           	
		}
		else{

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user_id = $this->User_model->user_login($username, $password);
			if($user_id){
				$user_data = array(
				'username'=>$username,
				'id'=>$user_id,
				'logged_in'=>true
				);
				$this->session->set_userdata($user_data);
				
				$this->session->set_flashdata('login_success', 'You are now logged in!');
				
				redirect('users/index');
			}
			else{

				$this->session->set_flashdata('login_failed', 'You are not logged in!');
				$this->index();
			}


		}
	}

	public function logout(){

		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');

		redirect('users/index');
	} 



}

 ?>