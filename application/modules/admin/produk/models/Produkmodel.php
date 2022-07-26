<?php

class Produkmodel extends CI_Model {

    private $table_produk = 'produk';
    private $table_gambar = 'gambar';

    //
    //----------------------------PRODUK---------------------------//
    //
    
    public function get_jumlah() {
        $sql = $this->db->query('select (select count(id_produk) from produk) as total_produk, (select count(id_produk) from produk WHERE status_rekomendasi=1 ) as rekomendasi, (select count(id_produk) from produk WHERE status_promo=1 ) as promo, (select count(id_produk) from produk WHERE kondisi_barang=1 ) as kondisi');
        return $sql->result();
    }

    public function get_kategori() {
        $sql = $this->db->query('SELECT * FROM kategori');
        return $sql->result();
    }

    public function get_max_idproduk() {
        $sql = $this->db->query('SELECT MAX(id_produk) as max_id FROM produk');
        return $sql->result();
    }

    public function get_voucher() {
        $sql = $this->db->query('SELECT * FROM voucher');
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

    public function get_merek() {
        $sql = $this->db->query('SELECT * FROM merek');
        return $sql->result();
    }

    public function get_nameproduk_by_id($id = '') {
        $this->db->select('nama_produk');
        $this->db->where('id_produk', $id);
        $sql = $this->db->get($this->table_produk);
        return $sql->result();
    }

    public function get_imgproduk_by_id($token) {
        $this->db->select('gambar_produk, gambar_produk_thumb');
        $this->db->where('token', $token);
        $sql = $this->db->get($this->table_gambar);
        return $sql->result();
    }

    public function get_tokenproduk_by_id($id = '') {
        $this->db->select('token');
        $this->db->where('id_produk', $id);
        $sql = $this->db->get($this->table_produk);
        return $sql->result();
    }

    public function get_detail_produk($id = '') {
        $sql = $this->db->query("SELECT t.* FROM (SELECT p.id_produk, p.url_slug, p.nama_produk, p.status_rekomendasi, p.bahan_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM  produk p 
                        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang 
                        LEFT JOIN voucher v ON v.id_voucher = p.voucher
                        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t 
           		WHERE t.id_produk = '$id'");
        return $sql->result();
    }

    public function get_produk() {
        $sql = $this->db->query('SELECT t.* FROM (SELECT p.id_produk, p.nama_produk, p.status_rekomendasi, p.bahan_produk, p.sku_produk, p.status_sensor_harga, p.start_digit, p.end_digit, p.minimal_pembelian, p.stok_barang, p.harga_barang, p.status_promo, p.potongan_harga, p.harga_promo, p.berat_barang, p.kondisi_barang, p.merek_barang, m.nama_merek, p.asal_produk, p.kategori_barang, k.nama_kategori, p.voucher, v.kode_voucher, v.potongan, p.tag_barang, p.ukuran_barang, p.warna_barang, p.spesifikasi_barang, p.token, p.link_shopee, p.link_tokopedia, p.link_lazada, p.link_bukalapak, p.tanggal_post FROM produk p
        LEFT JOIN kategori k ON k.id_kategori = p.kategori_barang
        LEFT JOIN voucher v ON v.id_voucher = p.voucher        
        LEFT JOIN merek m ON m.id_merek = p.merek_barang) t
        ORDER BY t.tanggal_post DESC');
        return $sql->result();
    }

    public function get_by_id_produk($id = '') {
        $this->db->where('id_produk', $id);
        $sql = $this->db->get($this->table_produk);
        return $sql->result();
    }

    public function insert_produk($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_produk' => $value['nama_produk'],
            'status_rekomendasi' => @$value['status_rekomendasi'],
            'sku_produk' => $value['sku_produk'],
            'bahan_produk' => $value['bahan_produk'],
            'minimal_pembelian' => $value['minimal_pembelian'],
            'stok_barang' => $value['stok_barang'],
            'harga_barang' => $value['harga_barang'],
            'status_promo' => @$value['status_promo'],
            'potongan_harga' => @$value['potongan_harga'],
            'harga_promo' => @$value['harga_promo'],
            'berat_barang' => $value['berat_barang'],
            'kondisi_barang' => $value['kondisi_barang'],
            'merek_barang' => $value['merek_barang'],
            'asal_produk' => $value['asal_produk'],
            'kategori_barang' => $value['kategori_barang'],
            'voucher' => $value['voucher'],
            'tag_barang' => $value['tag_barang'],
            'ukuran_barang' => $value['ukuran_barang'],
            'warna_barang' => $value['warna_barang'],
            'spesifikasi_barang' => $value['spesifikasi_barang'],
            'token' => $value['token'],
            'status_sensor_harga' => @$value['status_sensor_harga'],
            'start_digit' => @$value['start_digit'],
            'end_digit' => @$value['end_digit'],
            'link_shopee' => $value['link_shopee'],
            'link_tokopedia' => $value['link_tokopedia'],
            'link_lazada' => $value['link_lazada'],
            'link_bukalapak' => $value['link_bukalapak'],
            'url_slug' => $value['url_slug'],
        );
        $this->db->insert($this->table_produk, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_produk($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_produk' => $value['nama_produk'],
            'status_rekomendasi' => @$value['status_rekomendasi'],
            'bahan_produk' => $value['bahan_produk'],
            'sku_produk' => $value['sku_produk'],
            'minimal_pembelian' => $value['minimal_pembelian'],
            'stok_barang' => $value['stok_barang'],
            'harga_barang' => @$value['harga_barang'],
            'status_promo' => @$value['status_promo'],
            'harga_barang' => @$value['harga_barang'],
            'potongan_harga' => @$value['potongan_harga'],
            'harga_promo' => $value['harga_promo'],
            'berat_barang' => $value['berat_barang'],
            'kondisi_barang' => $value['kondisi_barang'],
            'merek_barang' => $value['merek_barang'],
            'asal_produk' => $value['asal_produk'],
            'kategori_barang' => $value['kategori_barang'],
            'voucher' => $value['voucher'],
            'tag_barang' => $value['tag_barang'],
            'ukuran_barang' => $value['ukuran_barang'],
            'warna_barang' => $value['warna_barang'],
            'spesifikasi_barang' => $value['spesifikasi_barang'],
            'token' => $value['token'],
            'status_sensor_harga' => @$value['status_sensor_harga'],
            'start_digit' => @$value['start_digit'],
            'end_digit' => @$value['end_digit'],
            'link_shopee' => $value['link_shopee'],
            'link_tokopedia' => $value['link_tokopedia'],
            'link_lazada' => $value['link_lazada'],
            'link_bukalapak' => $value['link_bukalapak'],
            'url_slug' => $value['url_slug'],
        );

        $this->db->where('id_produk', $id);
        $this->db->update($this->table_produk, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_rekomendasi($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_rekomendasi' => $value,
        );

        $this->db->where('id_produk', $id);
        $this->db->update($this->table_produk, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_promo($id = '', $value = '', $potongan = '', $harga = '') {
        $this->db->trans_begin();

        $data = array(
            'status_promo' => $value,
            'harga_promo' => $harga,
            'potongan_harga' => $potongan,
        );

        $this->db->where('id_produk', $id);
        $this->db->update($this->table_produk, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_produk($value) {
        $this->db->trans_begin();

        $this->db->where('id_produk', $value);
        $this->db->delete($this->table_produk);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_gambar($token) {
        $this->db->trans_begin();

        $this->db->where('token', $token);
        $this->db->delete($this->table_gambar);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------------------------------------------//
}

?>