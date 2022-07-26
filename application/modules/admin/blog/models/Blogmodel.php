<?php

class Blogmodel extends CI_Model {

    private $table_blog = 'blog';

    //
    //------------------------------BLOG--------------------------------//
    //
    
    public function get_jumlah_blog() {
        $sql = $this->db->query('SELECT (SELECT count(id_blog) FROM blog) AS blog');
        return $sql->result();
    }

    public function get_blog_limit() {
        $sql = $this->db->query('SELECT * FROM blog ORDER BY date LIMIT 3');
        return $sql->result();
    }

    public function get_blog() {
        $sql = $this->db->query('SELECT * FROM blog');
        return $sql->result();
    }

    public function get_by_id_blog($id = '') {
        $this->db->where('id_blog', $id);
        $sql = $this->db->get($this->table_blog);
        return $sql->result();
    }

    public function get_nameimgblog_by($id = '') {
        $this->db->select('foto_blog, judul_blog');
        $this->db->where('id_blog', $id);
        $sql = $this->db->get($this->table_blog);
        return $sql->result();
    }

    public function insert_blog($value = '') {

        $data = array(
            'judul_blog' => $value['judul_blog'],
            'tag_blog' => $value['tag_blog'],
            'isi_blog' => $value['isi_blog'],
            'foto_blog' => $value['foto_blog'],
            'foto_blog_thumb' => $value['foto_blog_thumb'],
            'url_slug' => $value['url_slug'],
        );
        $this->db->insert($this->table_blog, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_blog($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'judul' => $value['judul'],
            'tag' => $value['tag'],
            'highlight' => $value['highlight'],
            'isi_blog' => $value['isi_blog'],
            'foto_blog' => $value['foto_blog'],
            'foto_blog_thumb' => $value['foto_blog_thumb'],
            'url_slug' => $value['url_slug'],
        );

        $this->db->where('id_blog', $id);
        $this->db->update($this->table_blog, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_blog($value) {
        $this->db->trans_begin();

        $this->db->where('id_blog', $value);
        $this->db->delete($this->table_blog);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //--------------------------------------------------------------------//
//
}

?>