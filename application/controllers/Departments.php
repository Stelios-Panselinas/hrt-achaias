<?php

class Departments extends CI_Controller
{

    public function get_department_members()
    {
        $data['title'] = $this->departments_model->get_department_name($this->session->userdata('subgroup_id'));
        $data['department_members'] = $this->departments_model->get_all_members();


        foreach ($data['department_members'] as $key => $value) {
            $data['department_members'][$key]['operations'] = $this->departments_model->get_operations($data['department_members'][$key]['user_id']);
            $data['department_members'][$key]['training'] = $this->user_model->get_trainings($data['department_members'][$key]['user_id']);

        }

        $this->load->view('templates/header');
        $this->load->view('departments/members', $data);
        $this->load->view('templates/footer');
    }

    public function all_members()
    {
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

    public function view($id)
    {

        $subgroup = $this->departments_model->get_subgroup_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('departments/view', $subgroup);
        $this->load->view('templates/footer');
    }
    public function view_patras_department($id)
    {

        $department = $this->departments_model->get_patras_department();

        $this->load->view('templates/header');
        $this->load->view('departments/view', $department);
        $this->load->view('templates/footer');
    }

    public function update_economical_status() {
    log_message('debug', 'update_economical_status called');

    $user_id = $this->input->post('user_id');
    $economical_ok = $this->input->post('economical_ok');

    if ($user_id === null || $economical_ok === null) {
        show_error('Missing parameters', 400);
        return;
    }

    log_message('debug', "Received user_id=$user_id, economical_ok=$economical_ok");

    $this->load->model('User_model');
    $updated = $this->departments_model->update_economical_status($user_id, $economical_ok);

    if ($updated) {
        echo "Updated user #$user_id to economical_ok = $economical_ok";
    } else {
        show_error('Failed to update', 500);
    }
}
}