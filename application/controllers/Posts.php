<?php
    class Posts extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('home_model');
        }

        public function index(){

            $data['title'] = 'Posts';
            $data['post'] = $this->home_model->get_posts();
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

		public function view($slug) {
			$data['post'] = $this->home_model->get_posts($slug);

			/*if(empty($data['post'])){
				show_404();
			}*/

			$data['title'] = $data['post']['title'];
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');

		}
    }
?>
