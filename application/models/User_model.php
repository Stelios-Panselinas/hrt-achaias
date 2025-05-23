<?php 
    class User_model extends CI_Model{
        public function register($enc_password){
            // User data array
            $data = array(
                'name' => $this->input->post('name'),
                'surname' => $this->input->post('surname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $enc_password,
                'AM' => $this->input->post('AM'),
                'is_ds' => $this->input->post('is_ds'),
                'is_department_leader' => $this->input->post('is_department_leader')
            );

            // Insert user
            return $this->db->insert('user', $data);
        }

        public function login($username, $password){
            // Validate
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('user');

            if($result->num_rows() == 1){
                return $result->row()->user_id;
            } else {
                return false;
            }
        }

        // Check if username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('user', array('username' => $username));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        // Check if email exists        
        public function check_email_exists($email){
            $query = $this->db->get_where('user', array('email' => $email));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        public function get_user_data($id){
            $query = $this->db->get_where('user', array('user_id' => $id));
            return $query->row_array();
        }

        public function get_subgroup_data($id){
            $this->db->join('subgroups', 'belong_to_subgroup.subgroup_id = subgroups.subgroup_id', 'inner');
            $query = $this->db->get_where('belong_to_subgroup', array('belong_to_subgroup.user_id' => $id));
            return $query->result_array();
        }

        public function get_operations($id){
            $this->db->join('operation', 'participate_in_operation.operation_id = operation.operation_id', 'inner');
            $query = $this->db->get_where('participate_in_operation', array('participate_in_operation.user_id' => $id));
            return $query->result_array();
        }

        public function get_trainings($id){
            $this->db->join('trainings', 'participate_in_training.training_id = trainings.training_id', 'inner');
            $query = $this->db->get_where('participate_in_training', array('participate_in_training.user_id' => $id));
            return $query->result_array();
        }

        public function is_department_leader($id){
            $query = $this->db->get_where('user', array('user_id' => $id));
            if($query->row()->is_department_leader == 1){
                return true;
            } else {
                return false;
            }
        }

        public function get_subgroup_id($id){
            $query = $this->db->get_where('subgroups', array('head_id' => $id));
            return $query->row()->subgroup_id;
        }

        public function is_ds($id){
            $query = $this->db->get_where('user', array('user_id' => $id));
            if($query->row()->is_ds == 1){
                return true;
            } else {
                return false;
            }
        }
    }