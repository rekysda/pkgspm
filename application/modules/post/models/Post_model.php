<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{
        public function getPostCatById($id)
        {
                return $this->db->get_where('posts_categories', ['id' => $id])->row_array();
        }
        public function hapusPostCat($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('posts_categories');
        }

        public function getposts()
        {
                $query = "SELECT `posts`.*,`posts_categories`.`name`as category,`posts_categories`.`parent_id`
                FROM `posts` LEFT JOIN `posts_categories`
                ON `posts`.`category_id`=`posts_categories`.`id`
        ";
                return $this->db->query($query)->result_array();
        }

        public function getPostById($id)
        {
                return $this->db->get_where('posts', ['id' => $id])->row_array();
        }

        public function hapusDataPost($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('posts');
        }

        function unique_slug($slug)
        {
                $q = $this->db->like('slug', $slug, 'both')->get('posts_categories');

                if ($q->num_rows() > 0) {
                        $l = $q->last_row();
                        $slug = increment_string($slug, '-', $q->num_rows() + 1);
                }
                return $slug;
        }
}
