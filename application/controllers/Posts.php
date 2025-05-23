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

        public function create (){
            $data['title'] = 'Create Post';
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
    
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else { // Upload Image
				$target_dir = "assets/img/posts/";
				is_dir("assets/img/posts/")?error_log('image destination folder exists'):error_log('image destination folder does not exist');
				$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["userfile"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						error_log("File is not an image.");
						$uploadOk = 0;
					}
				}

				if (file_exists($target_file)) {
					$this->home_model->create_post();
					redirect('home');
					$uploadOk = 1;
				}

// Check file size
				if ($_FILES["userfile"]["size"] > 5000000) {
					error_log("Sorry, your file is too large.");
					$uploadOk = 0;
				}

// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					error_log("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
					$uploadOk = 0;
				}

// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					error_log("Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
						echo "The file ". htmlspecialchars( basename( $_FILES["userfile"]["name"])). " has been uploaded.";
					} else {
						error_log("Sorry, there was an error uploading your file.");
					}
				}
                $this->home_model->create_post();
                redirect('home');
            }
        }

        public function delete($id){
            $this->home_model->delete_post($id);
            redirect('home');
        }

        public function edit($slug){
           $data['post'] = $this->home_model->get_posts($slug);

           if(empty($data['post'])){
               show_404();  
              }

            $data['title'] = 'Edit Post';
            $this->load->view('templates/header');  
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');

        }
    }
?>
