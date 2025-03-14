<?php 
    class Departments_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_department_members($department_id)
        {
            $this->db->join('user', 'belong_to_subgroup.user_id = user.user_id', 'inner');
            $query = $this->db->get_where('belong_to_subgroup', array('belong_to_subgroup.subgroup_id' => $department_id));
            return $query->result_array();
        }

        public function get_department_name($subgroup_id)
        {
            $query = $this->db->get_where('subgroups', array('subgroup_id' => $subgroup_id));
            return $query->row_array()['sub_name'];

        }
    }