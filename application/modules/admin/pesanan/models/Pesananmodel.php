<?php

class Pesananmodel extends CI_Model {

    private $table_pesanan = 'pesanan';

    //
    //------------------------------PESANAN----------------------------//
    //
    
    public function get_count() {
        $sql = $this->db->query('select (select count(id) from produk) as produk, (select count(id) from produk WHERE rekomendasi=1 ) as rekomen, (select count(id) from produk WHERE kat_barang=1 ) as bekas, (select count(id) from produk WHERE kat_barang=2 ) as baru');
        return $sql->result();
    }

    public function get_pesanan() {
        $sql = $this->db->query("SELECT * FROM pesanan");
        return $sql->result();
    }

    public function get_namapesanan_by_id($id = '') {
        $this->db->select('nama_pesanan');
        $this->db->where('id_pesanan', $id);
        $sql = $this->db->get($this->table_pesanan);
        return $sql->result();
    }

    public function get_by_id_pesanan($id = '') {
        $this->db->where('id_pesanan', $id);
        $sql = $this->db->get($this->table_pesanan);
        return $sql->result();
    }

    public function update_pesanan($id = '', $value = '') {
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

        $this->db->where('id_pesanan', $id);
        $this->db->update($this->table_pesanan, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_pesanan($value) {
        $this->db->trans_begin();

        $this->db->where('id_pesanan', $value);
        $this->db->delete($this->table_pesanan);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------------------------------------//
}

?>