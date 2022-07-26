<?php

class Homemodel extends CI_Model {

    private $table_home = 'home';
    private $table_newsletter = 'newsletter_customer';

    public function get_by_id_home($id = '') {
        $this->db->where('id', $id);
        $sql = $this->db->get($this->table_home);
        return $sql->result();
    }

    public function get_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori WHERE tipe_kategori=1');
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

    public function get_seo() {
        $sql = $this->db->query('SELECT * FROM seo_page WHERE id_seo_page=1');
        return $sql->result();
    }

    public function get_sub_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori WHERE tipe_kategori=2');
        return $sql->result();
    }

    public function get_merek() {
        $sql = $this->db->query('SELECT gambar_merek FROM toko');
        return $sql->result();
    }

    public function get_warna() {
        $sql = $this->db->query('SELECT * FROM warna');
        return $sql->result();
    }

    public function get_size() {
        $sql = $this->db->query('SELECT * FROM size');
        return $sql->result();
    }

    public function get_gambar_produk() {
        $sql = $this->db->query('SELECT * FROM gambar');
        return $sql->result();
    }

    public function get_banner() {
        $sql = $this->db->query('SELECT * FROM banner WHERE status_banner=1');
        return $sql->result();
    }

    public function get_produk_all() {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
        LEFT JOIN voucher v ON v.id_voucher = p.voucher        
        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
        ORDER BY t.tanggal_post DESC");
        return $sql->result();
    }

    public function get_produk_baru() {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
        LEFT JOIN voucher v ON v.id_voucher = p.voucher        
        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
        ORDER BY t.tanggal_post DESC LIMIT 8");
        return $sql->result();
    }

    public function get_produk_rekomendasi() {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk,  p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek,  m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
        LEFT JOIN voucher v ON v.id_voucher = p.voucher        
        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
        WHERE t.status_rekomendasi=1 
        ORDER BY t.tanggal_post DESC LIMIT 8");
        return $sql->result();
    }

    public function get_produk_promo() {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
        LEFT JOIN voucher v ON v.id_voucher = p.voucher        
        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
        WHERE t.status_promo=1
        ORDER BY t.tanggal_post DESC LIMIT 8");
        return $sql->result();
    }

    public function cari_data($nama, $kat) {
        $sql = $this->db->query('SELECT p.id, p.id_toko, p.rekomendasi, p.url_slug, k.nama_kat,t.gambar_merek, t.nama_toko, t.nama_merek, p.kondisi_barang, p.nama_produk, p.minimal_pembelian, p.harga_barang, p.stok, p.berat, p.desc_barang, p.gambar, p.gambar_thumb, p.gambar_2, p.gambar_2_thumb, p.gambar_3, p.gambar_3_thumb, p.date FROM produk p JOIN kategori k, toko t WHERE p.kat_barang = k.id AND p.id_toko = t.id AND (k.id=' . $kat . ' OR p.nama_produk LIKE "%$nama%") ORDER BY p.date DESC');
        return $sql->result();
    }

    public function insert_newsletter($value = '') {

        $data = array(
            'email_user' => $value['email_user']
        );

        $this->db->insert($this->table_newsletter, $data);

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