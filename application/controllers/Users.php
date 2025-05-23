<?php
class Users extends CI_Controller
{
    public function register()
    {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->user_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

            redirect('users/register');
        }
    }

    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        $data['title'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
            // Get username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = md5($this->input->post('password'));

            // Login user
            $user_id = $this->user_model->login($username, $password);

            if ($user_id) {
                // Create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true,
                    'is_department_leader' => $this->user_model->is_department_leader($user_id),
                    'is_ds' => $this->user_model->is_ds($user_id),
                    'subgroup_id' => $this->user_model->is_department_leader($user_id)?$this->user_model->get_subgroup_id($user_id):false
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect('home');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');

                redirect('users/login');
            }
        }
    }

    public function logout()
    {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('is_department_leader');
        $this->session->unset_userdata('is_ds');
        $this->session->unset_userdata('subgroup_id');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('users/login');
    }

    public function profile($id)
    {
        
        $data['personal_info'] = $this->user_model->get_user_data($id);
        $data['subgroup_info'] = $this->user_model->get_subgroup_data($id);
        $data['operations'] = $this->user_model->get_operations($id);
        $data['trainings'] = $this->user_model->get_trainings($id);
        $data['title'] = 'Profile';

        $this->load->view('templates/header');
        $this->load->view('users/profile', $data);
        $this->load->view('templates/footer');
    }
}