<?php

class Contactmodel extends CI_Model {

    private $table_contact = 'kontak';
    private $table_saran = 'saran';

    public function get_contact() {
        $sql = $this->db->query('SELECT * FROM kontak');
        return $sql->result();
    }

    public function get_sub_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori WHERE tipe_kategori=2');
        return $sql->result();
    }

    public function get_general_page() {
        $sql = $this->db->query('SELECT * FROM general_page');
        return $sql->result();
    }

    public function get_seo() {
        $sql = $this->db->query('SELECT * FROM seo_page WHERE id_seo_page=1');
        return $sql->result();
    }

    public function get_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori WHERE tipe_kategori=1');
        return $sql->result();
    }

    public function insert_saran($value = '') {

        $data = array(
            'nama_pengirim' => $value['nama_pengirim'],
            'email' => $value['email'],
            'no_telephone' => $value['no_telephone'],
            'isi_saran' => $value['isi_saran'],
        );
        $this->db->insert($this->table_saran, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}

?>