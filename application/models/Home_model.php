<?php 
    class Home_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_posts($slug = FALSE){
            if($slug === FALSE){
                
                $this->db->order_by('posts.id', 'DESC');
				$this->db->limit(5);
                $query = $this->db->get('posts');
                return $query->result_array();
            }

            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }

		public function get_subgroups($slug = FALSE){
			if($slug === FALSE){
				$query = $this->db->get('subgroups');
				return $query->result_array();
			}

			$query = $this->db->get_where('subgroups', array('slug' => $slug));
			return $query->row_array();
		}

        public function create_post(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body')
            );

            return $this->db->insert('posts', $data);
        }

        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
    }
?>
