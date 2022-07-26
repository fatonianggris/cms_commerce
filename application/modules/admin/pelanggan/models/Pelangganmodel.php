<?php

class Pelangganmodel extends CI_Model {

    private $table_pelanggan = 'pelanggan';

    //
    //------------------------------PESANAN----------------------------//
    //
    
    public function get_count() {
        $sql = $this->db->query('select (select count(id) from produk) as produk, (select count(id) from produk WHERE rekomendasi=1 ) as rekomen, (select count(id) from produk WHERE kat_barang=1 ) as bekas, (select count(id) from produk WHERE kat_barang=2 ) as baru');
        return $sql->result();
    }

    public function get_pelanggan() {
        $sql = $this->db->query("SELECT * FROM pelanggan");
        return $sql->result();
    }

    public function get_namapelanggan_by_id($id = '') {
        $this->db->select('nama_pelanggan');
        $this->db->where('id_pelanggan', $id);
        $sql = $this->db->get($this->table_pelanggan);
        return $sql->result();
    }

    public function get_by_id_pelanggan($id = '') {
        $this->db->where('id_pelanggan', $id);
        $sql = $this->db->get($this->table_pelanggan);
        return $sql->result();
    }

    public function update_pelanggan($id = '', $value = '') {
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

        $this->db->where('id_pelanggan', $id);
        $this->db->update($this->table_pelanggan, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_pelanggan($value) {
        $this->db->trans_begin();

        $this->db->where('id_pelanggan', $value);
        $this->db->delete($this->table_pelanggan);

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