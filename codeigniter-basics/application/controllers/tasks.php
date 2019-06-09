<?php 
/**
 * 
 */
class Tasks extends CI_Controller
{
	
	public function index(){


		$data['main_view'] = "tasks/display";
		$this->load->view('layouts/main', $data);

	}

	public function display($task_id)
	{
		$data['task_data'] = $this->task_model->get_task($task_id);
		$data['main_view'] = "tasks/display";
		$this->load->view('layouts/main', $data);
	}

	public function create($project_id)
	{
		$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
		$this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');
		$this->form_validation->set_rules('due_date', 'Task Due Date', 'trim|required');

		if($this->form_validation->run() == FALSE){
			
			$data['main_view'] = "tasks/create_task";
			$this->load->view('layouts/main', $data);
			
		}
		else{

			$data = array(
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'project_id' => $project_id,
				'due_date' => $this->input->post('due_date')
			);

			if($this->task_model->create_task($data)){
				$this->session->set_flashdata('task_created', 'Your task has been created');
				redirect('projects/index');
			}
			else{


			}

		}
	}



	public function edit($task_id){

		$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
		$this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');
		$this->form_validation->set_rules('due_date', 'Task Due Date', 'trim|required');

		if($this->form_validation->run() == FALSE){
			
			$data['task_data'] = $this->task_model->get_task($task_id);
			$data['main_view'] = "tasks/edit_task";
			$this->load->view('layouts/main', $data);
			
		}
		else{
			$task_project_id = $this->task_model->get_task($task_id)->project_id;
			$data = array(
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'project_id' => $task_project_id,
				'due_date' => $this->input->post('due_date')
			);

			if($this->task_model->edit_task($task_id, $data)){
				$this->session->set_flashdata('task_updated', 'Your task has been updated');
				redirect('projects/index');
			}
			else{


			}
		}

	}


	public function delete($project_id, $task_id)
	{
		$this->task_model->delete_task($task_id);
		
		$this->session->set_flashdata('task_deleted', 'Task has been deleted');

		redirect('projects/display/'.$project_id.'');
	}



	public function mark_complete($task_id)
	{
		$this->task_model->mark_complete($task_id);
		$task_project_id = $this->task_model->get_task($task_id)->project_id;
		$this->session->set_flashdata('marked_complete', 'This task has marked Complete');

		redirect('projects/display/'.$task_project_id.'');
	}

	public function mark_in_complete($task_id)
	{
		$this->task_model->mark_in_complete($task_id);
		$task_project_id = $this->task_model->get_task($task_id)->project_id;
		$this->session->set_flashdata('marked_in_complete', 'This task has marked Incomplete');

		redirect('projects/display/'.$task_project_id.'');
	}


















}








 ?>