<?php 
    class Home_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_posts($slug = FALSE){
            if($slug === FALSE){
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
    }
?>
