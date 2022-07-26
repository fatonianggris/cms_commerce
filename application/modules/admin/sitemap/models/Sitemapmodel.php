<?php

class Sitemapmodel extends CI_Model {

    private $table_produk = 'produk';
    private $table_kategori = 'kategori';
    private $table_merek = 'merek';

    //
    //-------------------------------SITEMAP------------------------------//
    //

    public function get_slug_produk() {
        $sql = $this->db->query("SELECT url_slug, id_produk FROM produk");
        return $sql->result();
    }

    public function get_slug_kategori() {
        $sql = $this->db->query("SELECT url_slug FROM kategori");
        return $sql->result();
    }

    public function get_slug_merek() {
        $sql = $this->db->query("SELECT url_slug FROM merek");
        return $sql->result();
    }

    //-------------------------------------------------------------------//
}

?>