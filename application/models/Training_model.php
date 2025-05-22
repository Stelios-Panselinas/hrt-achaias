<?php
class Training_model extends CI_Model
{
	public function get_users()
	{
		$this->db->select('user_id, name, surname');
		$this->db->from('user');
		$query = $this->db->get();

		return $query->result_array(); // Returns the result as an array
	}

	public function create_training()
	{
		$data = array(
			'name' => $this->input->post('training_name'),
			'date' => $this->input->post('date')
		);
		$people = $this->input->post('people');
		//$subgroup = $this->input->post('subgroups');
		// Insert the operation data into the database
		$this->db->insert('trainings', $data);

		$this->db->select('training_id');
		$this->db->from('trainings');
		$this->db->order_by('training_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$training_id = intval($query->row()->training_id);

		foreach ($people as $user_id) {
			$data = array(
				'training_id' => $training_id,
				'user_id' => intval($user_id)
			);
			// Insert the user ID into the operation_users table
			$this->db->insert('participate_in_training', $data);
		}
//		foreach ($subgroup as $subgroup_id) {
//			$data = array(
//				'training_id' => $operation_id,
//				'subgroup_id' => intval($subgroup_id)
//			);
//			// Insert the subgroup ID into the operation_subgroups table
//			$this->db->insert('operation_to_subgroup', $data);
//		}
	}
}
