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
}