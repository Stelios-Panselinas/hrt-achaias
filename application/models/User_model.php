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
                return $result->row(0)->id;
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
    }