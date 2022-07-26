<?php

class Laporanmodel extends CI_Model {

    private $table_produk = 'produk';
    private $table_home = 'home';

    public function get_by_id_home($id = '') {
        $this->db->where('id', $id);
        $sql = $this->db->get($this->table_home);
        return $sql->result();
    }

    public function get_kat() {
        $sql = $this->db->query('SELECT * FROM kategori');
        return $sql->result();
    }

    public function get_merek() {
        $sql = $this->db->query('SELECT gambar_merek FROM toko');
        return $sql->result();
    }

    public function get_count() {
        $sql = $this->db->query('select (select count(id) from produk) as produk, (select count(id) from produk WHERE rekomendasi=1 ) as rekomen, (select count(id) from produk WHERE kat_barang=1 ) as bekas, (select count(id) from produk WHERE kat_barang=2 ) as baru');
        return $sql->result();
    }

    public function get_produk_by_id($id = '') {
        $sql = $this->db->query("SELECT p.id, p.id_toko, p.rekomendasi, k.nama_kat, t.nama_toko, t.nama_merek, t.gambar_merek, p.kondisi_barang, p.nama_produk, p.minimal_pembelian, p.harga_barang, p.stok, p.berat, p.desc_barang, p.gambar, p.gambar_thumb, p.gambar_2, p.gambar_2_thumb, p.gambar_3, p.gambar_3_thumb, p.date FROM produk p JOIN kategori k, toko t WHERE p.kat_barang = k.id AND p.id_toko = t.id AND p.id = $id");
        return $sql->result();
    }

    public function get_produk() {
        $sql = $this->db->query('SELECT p.id, p.id_toko, p.rekomendasi, k.nama_kat, t.nama_toko, t.nama_merek, p.kondisi_barang, p.nama_produk, p.minimal_pembelian, p.harga_barang, p.stok, p.berat, p.desc_barang, p.gambar, p.gambar_thumb, p.gambar_2, p.gambar_2_thumb, p.gambar_3, p.gambar_3_thumb, p.date FROM produk p JOIN kategori k, toko t WHERE p.kat_barang = k.id AND p.id_toko = t.id ORDER BY p.date DESC');
        return $sql->result();
    }

    public function get_by_id_produk($id = '') {
        $this->db->where('id', $id);
        $sql = $this->db->get($this->table_produk);
        return $sql->result();
    }

    public function get_toko() {
        $sql = $this->db->query('SELECT id, nama_toko, nama_merek FROM toko');
        return $sql->result();
    }

    public function insert_produk($value = '') {
        $this->db->trans_begin();

        $data = array(
            'kat_barang' => $value['kat_barang'],
            'id_toko' => $value['produk_toko'],
            'kondisi_barang' => $value['kondisi_barang'],
            'nama_produk' => $value['nama_produk'],
            'rekomendasi' => $value['rekomendasi'],
            'minimal_pembelian' => $value['min_pembelian'],
            'harga_barang' => $value['harga'],
            'stok' => $value['stok_barang'],
            'berat' => $value['berat'],
            'desc_barang' => $value['desc_barang'],
            'gambar' => $value['pic1'],
            'gambar_thumb' => $value['pic_thumb1'],
            'gambar_2' => $value['pic2'],
            'gambar_2_thumb' => $value['pic_thumb2'],
            'gambar_3' => $value['pic3'],
            'gambar_3_thumb' => $value['pic_thumb3'],
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
            'kat_barang' => $value['kat_barang'],
            'id_toko' => $value['produk_toko'],
            'kondisi_barang' => $value['kondisi_barang'],
            'nama_produk' => $value['nama_produk'],
            'minimal_pembelian' => $value['min_pembelian'],
            'harga_barang' => $value['harga'],
            'stok' => $value['stok_barang'],
            'rekomendasi' => $value['rekomendasi'],
            'berat' => $value['berat'],
            'desc_barang' => $value['desc_barang'],
            'gambar' => $value['pic1'],
            'gambar_thumb' => $value['pic_thumb1'],
            'gambar_2' => $value['pic2'],
            'gambar_2_thumb' => $value['pic_thumb2'],
            'gambar_3' => $value['pic3'],
            'gambar_3_thumb' => $value['pic_thumb3']
        );

        $this->db->where('id', $id);
        $this->db->update($this->table_produk, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
     public function get_img_by_id_produk($id = '') {
        $this->db->select('gambar, gambar_2, gambar_3');
        $this->db->where('id', $id);
        $sql = $this->db->get($this->table_produk);
        return $sql->result();
    }

    public function delete_produk($value) {
        $this->db->trans_begin();

        $this->db->where('id', $value);
        $this->db->delete($this->table_produk);

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