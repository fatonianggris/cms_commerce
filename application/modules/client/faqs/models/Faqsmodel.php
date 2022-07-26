<?php

class Faqsmodel extends CI_Model {

    private $table_faq = 'faq';

    public function get_faqs() {
        $sql = $this->db->query('SELECT * FROM faq');
        return $sql->result();
    }

    public function get_contact() {
        $sql = $this->db->query('SELECT * FROM kontak');
        return $sql->result();
    }

    public function get_general_page() {
        $sql = $this->db->query('SELECT * FROM general_page');
        return $sql->result();
    }

    public function get_sub_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori WHERE tipe_kategori=2');
        return $sql->result();
    }

    public function get_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori WHERE tipe_kategori=1');
        return $sql->result();
    }

    public function get_seo() {
        $sql = $this->db->query('SELECT * FROM seo_page WHERE id_seo_page=1');
        return $sql->result();
    }

}

?>