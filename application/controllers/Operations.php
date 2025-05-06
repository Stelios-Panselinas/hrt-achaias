<?php
class Operations extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('operations_model');
    //     $this->load->model('user_model');
    //     $this->load->library('form_validation');
    // }

    public function create()
    {
        $data['title'] = 'Create Operation';

        $this->form_validation->set_rules('operation_name', 'Όνομα', 'required');
        $this->form_validation->set_rules('place', 'Τοποθεσία', 'required');
        $this->form_validation->set_rules('date', 'Ημερομηνία', 'required');
        // $this->form_validation->set_rules('people', 'Άτομα', 'required');
        // $this->form_validation->set_rules('subgroup', 'Τμήμα', 'required');

        $data['users'] = $this->operation_model->get_users(); // Fetch users from the model
        $data['subgroups'] = $this->operation_model->get_subgroups(); // Fetch subgroups from the model
        // $this->load->view('templates/header');
        // $this->load->view('operations/create',$data);
        // $this->load->view('templates/footer');
        

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('operations/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->operation_model->create_operation();
            redirect('/');
        }
        
    }

}