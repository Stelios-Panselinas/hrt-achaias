<?php
    class Pages extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('Home_model');
        }
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);
            $data['posts'] = $this->home_model->get_posts();
			$data['subgroups'] = $this->home_model->get_subgroups();
            $data['patras_department'] = $this->departments_model->get_patras_department();
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }
    }
?>
