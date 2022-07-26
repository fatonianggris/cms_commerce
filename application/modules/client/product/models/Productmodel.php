<?php

class Productmodel extends CI_Model {

    private $table_produk = 'produk';
    private $table_gambar = 'gambar';

    public function get_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori WHERE tipe_kategori=1');
        return $sql->result();
    }

    public function get_merek() {
        $sql = $this->db->query('SELECT gambar_merek FROM toko');
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

    public function get_sub_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori WHERE tipe_kategori=2');
        return $sql->result();
    }

    public function get_imgproduk_by_id($token) {
        $this->db->select('gambar_produk, gambar_produk_thumb, token');
        $this->db->where('token', $token);
        $sql = $this->db->get($this->table_gambar);
        return $sql->result();
    }

    public function get_by_id_produk($id = '') {
        $this->db->select('id_produk');
        $this->db->where('id_produk', $id);
        $sql = $this->db->get($this->table_produk);
        return $sql->result();
    }

    public function get_token_kat_produk_by_id($id = '') {
        $this->db->select('token, kategori_barang');
        $this->db->where('id_produk', $id);
        $sql = $this->db->get($this->table_produk);
        return $sql->result();
    }

    public function get_detail_produk($id = '') {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM  produk p 
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang 
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t 
                                WHERE t.id_produk = '$id'");
        return $sql->result();
    }

    public function get_produk_rekomendasi() {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk,  p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek,  m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
        LEFT JOIN voucher v ON v.id_voucher = p.voucher        
        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
        WHERE t.status_rekomendasi=1 
        ORDER BY t.tanggal_post DESC LIMIT 6");
        return $sql->result();
    }

    public function get_produk_new_arrivals() {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t                               
                                ORDER BY t.tanggal_post DESC LIMIT 20");
        return $sql->result();
    }

    public function get_produk_by_kategori($id = '', $id_kat = '') {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug,  p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
                                WHERE t.kategori_barang = '$id_kat' AND t.id_produk !='$id'
                                ORDER BY t.tanggal_post DESC LIMIT 8");
        return $sql->result();
    }

    public function get_produk_search($by_nama, $by_kategori, $by_price_min, $by_price_max, $by_tag) {
        if (($by_nama != '' or $by_nama != NULL) && ($by_kategori == '' && $by_kategori == '')) {
            $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug,  p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
                                WHERE t.nama_produk LIKE '%$by_nama%' 
                                ORDER BY t.tanggal_post DESC");
        } elseif (($by_nama != '' or $by_nama != NULL) && ($by_kategori != '' or $by_kategori != NULL)) {
            $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
                                WHERE t.nama_produk LIKE '%$by_nama%' AND t.nama_kategori = '$by_kategori'
                                ORDER BY t.tanggal_post DESC");
        } else if (($by_nama != '' or $by_nama != NULL) && ($by_price_min != '' && $by_price_max != '')) {
            $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
                                WHERE t.nama_produk LIKE '%$by_nama%'  AND (REPLACE(t.harga_barang, '.', '') BETWEEN $by_price_min AND $by_price_max) OR (REPLACE(t.harga_promo, '.', '') BETWEEN $by_price_min AND $by_price_max)
                                ORDER BY t.tanggal_post DESC");
        } else if (($by_nama != '' or $by_nama != NULL) && ($by_price_min != '' && $by_price_max != '') && ($by_kategori != '' or $by_kategori != NULL)) {
            $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
                                WHERE t.nama_produk LIKE '%$by_nama%'  AND t.nama_kategori = '$by_kategori' AND (REPLACE(t.harga_barang, '.', '') BETWEEN $by_price_min AND $by_price_max) OR (REPLACE(t.harga_promo, '.', '') BETWEEN $by_price_min AND $by_price_max)
                                ORDER BY t.tanggal_post DESC");
        } else if (( $by_kategori != '' or $by_kategori != NULL) && ($by_price_min == '' && $by_price_max == '')) {
            $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
                                WHERE t.nama_kategori = '$by_kategori'
                                ORDER BY t.tanggal_post DESC");
        } else if (( $by_kategori != '' or $by_kategori != NULL) && ($by_price_min != '' && $by_price_max != '')) {
            $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
                                WHERE t.nama_kategori = '$by_kategori' AND (REPLACE(t.harga_barang, '.', '') BETWEEN $by_price_min AND $by_price_max)
                                ORDER BY t.tanggal_post DESC");
        } else {
            $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.status_rekomendasi, p.bahan_produk, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, m.logo_merek_thumb, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
                                LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
                                LEFT JOIN voucher v ON v.id_voucher = p.voucher        
                                LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
                                WHERE t.nama_kategori = '$'
                                ORDER BY t.tanggal_post DESC");
        }
        return $sql->result();
    }

}

?>