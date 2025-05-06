<?php
class Operation_model extends CI_Model
{
    public function get_users()
    {
        $this->db->select('user_id, name, surname');
        $this->db->from('user');
        $query = $this->db->get();

        return $query->result_array(); // Returns the result as an array
    }

    public function get_subgroups()
    {
        $this->db->select('subgroup_id, sub_name');
        $this->db->from('subgroups');
        $query = $this->db->get();

        return $query->result_array(); // Returns the result as an array
    }
    public function create_operation()
    {
        $data = array(
            'name' => $this->input->post('operation_name'),
            'place' => $this->input->post('place'),
            'date' => $this->input->post('date')
        );
        $people = $this->input->post('people');
        $subgroup = $this->input->post('subgroups');
        // Insert the operation data into the database
        $this->db->insert('operation', $data);

        $this->db->select('operation_id'); 
        $this->db->from('operation'); 
        $this->db->order_by('operation_id', 'DESC'); 
        $this->db->limit(1); 
        $query = $this->db->get();
        $operation_id = intval($query->row()->operation_id);

        foreach ($people as $user_id) {
            $data = array(
                'operation_id' => $operation_id,
                'user_id' => intval($user_id)
            );
            // Insert the user ID into the operation_users table
            $this->db->insert('participate_in_operation', $data);
        }
        foreach ($subgroup as $subgroup_id) {
            $data = array(
                'operation_id' => $operation_id,
                'subgroup_id' => intval($subgroup_id)
            );
            // Insert the subgroup ID into the operation_subgroups table
            $this->db->insert('operation_to_subgroup', $data);
        }
    }
}