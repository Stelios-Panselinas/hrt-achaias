<?php

class Departments extends CI_Controller
{

    public function get_department_members()
    {
        $data['title'] = $this->departments_model->get_department_name($this->session->userdata('subgroup_id'));
        $data['department_members'] = $this->departments_model->get_department_members($this->session->userdata('subgroup_id'));

        
        foreach ($data['department_members'] as $key => $value) {
            $data['department_members'][$key]['operations'] = $this->user_model->get_operations($data['department_members'][$key]['user_id']);
            $data['department_members'][$key]['training'] = $this->user_model->get_trainings($data['department_members'][$key]['user_id']);
        }

        $this->load->view('templates/header');
        $this->load->view('departments/members', $data);
        $this->load->view('templates/footer');
    }

    public function all_members(){
        $data['title'] = 'All Members';
        $data['all_members'] = $this->departments_model->get_all_members();

        foreach ($data['all_members'] as $key => $value) {
            $data['all_members'][$key]['operations'] = $this->user_model->get_operations($data['all_members'][$key]['user_id']);
            $data['all_members'][$key]['training'] = $this->user_model->get_trainings($data['all_members'][$key]['user_id']);
        }

        $this->load->view('templates/header');
        $this->load->view('departments/all_members', $data);
        $this->load->view('templates/footer');
    }
}