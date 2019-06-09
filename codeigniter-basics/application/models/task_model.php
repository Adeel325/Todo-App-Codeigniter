<?php 




/**
 * 
 */
class Task_model extends CI_Model
{


	public function create_task($data)
	{
		$query = $this->db->insert('tasks', $data);
		return true;
	}

	public function get_task($id){

		$this->db->where('id', $id);
		$query = $this->db->get('tasks');

		return $query->row();

	}

	public function edit_task($id, $data)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('tasks', $data);
		return TRUE;
	}

	public function delete_task($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('tasks');
		return TRUE;
	}


	public function mark_complete($task_id)
	{
		$this->db->set('status', 1);
		$this->db->where('id', $task_id);
		$query = $this->db->update('tasks');
		return $query;
	}

	public function mark_in_complete($task_id)
	{
		$this->db->set('status', 0);
		$this->db->where('id', $task_id);
		$query = $this->db->update('tasks');
		return $query;
	}

	public function get_all_task($user_id)
	{
		$this->db->where('project_user_id', $user_id);
		$this->db->join('tasks', 'tasks.project_id = projects.id');

		$query = $this->db->get('projects');
		return $query->result();
	}



}





 ?>