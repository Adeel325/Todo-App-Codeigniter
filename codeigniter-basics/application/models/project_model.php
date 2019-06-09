<?php 

/**
 * 
 */
class Project_model extends CI_Model
{
	
	public function get_projects(){

		$query = $this->db->get('projects');

		return $query->result();

	}

	public function get_project($id){

		$this->db->where('id', $id);
		$query = $this->db->get('projects');

		return $query->row();

	}
	public function create_project($data){

		
		$query = $this->db->insert('projects', $data);
		return true;

	}
	public function edit_project($id, $data){

		$this->db->where('id', $id);
		$query = $this->db->update('projects', $data);
		return true;

	}

	public function delete_project($id){
		$this->db->where('id', $id);
		$query = $this->db->delete('projects');
	}


	public function get_all_project($user_id){

		$this->db->where('project_user_id', $user_id);
		$query = $this->db->get('projects');

		return $query->result();

	}


	public function get_project_task($project_id, $active = true){

		$this->db->select('
				tasks.id,
				tasks.task_name,
				tasks.task_body,
				projects.project_name,
				projects.project_body
			');

		$this->db->from('tasks');
		$this->db->join('projects', 'tasks.project_id = projects.id');
		
		$this->db->where('tasks.project_id', $project_id);

		if($active == true){
			$this->db->where('tasks.status', 0);
		}
		else{
			$this->db->where('tasks.status', 1);
		}

		$query = $this->db->get();

		if($query->num_rows() < 0){
			return false;
		}

		return $query->result();


	}

	public function delete_project_task($project_id)
	{
		$this->db->where('project_id', $project_id);
		$query = $this->db->delete('tasks');
		return $query;
	}


}











 ?>