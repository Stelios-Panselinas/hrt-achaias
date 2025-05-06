<?php
class Departments_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_department_members($department_id)
    {
        $this->db->join('user', 'belong_to_subgroup.user_id = user.user_id', 'inner');
        $query = $this->db->get_where('belong_to_subgroup', array('belong_to_subgroup.subgroup_id' => $department_id));
        return $query->result_array();
    }

    public function get_all_members()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_department_name($subgroup_id)
    {
        $query = $this->db->get_where('subgroups', array('subgroup_id' => $subgroup_id));
        return $query->row_array()['sub_name'];

    }

    public function get_operations($id)
    {
        if ($this->session->userdata('subgroup_id') == 7) {
            $this->db->join('operation', 'participate_in_operation.operation_id = operation.operation_id', 'inner');
            $query = $this->db->get_where('participate_in_operation', array('participate_in_operation.user_id' => $id));
        } else {
            // Subquery 1: Get operation IDs from participate_in_operation for the given user
            $this->db->select('operation_id');
            $this->db->from('participate_in_operation');
            $this->db->where('user_id', $id);
            $subquery1 = $this->db->get_compiled_select();

            // Subquery 2: Get operation IDs from operation_to_subgroup where subgroup_id is in Subquery 1
            $this->db->select('operation_id');
            $this->db->from('operation_to_subgroup');
            $this->db->where("operation_id IN ($subquery1)", null, false);
            $subquery2 = $this->db->get_compiled_select();

            // Main query: Get operations where operation_id is in Subquery 2
            $this->db->select('*');
            $this->db->from('operation');
            $this->db->where("operation_id IN ($subquery2)", null, false);
            $query = $this->db->get();

            return $query->result_array();
        }
    }
}