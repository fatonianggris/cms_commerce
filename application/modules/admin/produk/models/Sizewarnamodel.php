<?php

class Sizewarnamodel extends CI_Model {

    private $table_size = 'size';
    private $table_warna = 'warna';

    //
    //---------------------------GENERAL----------------------//
    //

    public function get_jumlah_item() {
        $sql = $this->db->query('SELECT (SELECT COUNT(id_size) FROM size) AS jumlah_size,(SELECT COUNT(id_warna) FROM warna) AS jumlah_warna, (SELECT COUNT(id_produk) FROM produk) AS jumlah_produk');
        return $sql->result();
    }

    //
    //----------------------------SIZE--------------------------//
    //
    
    public function cek_duplikat_size($nama = '') {
        $this->db->where('nama_size', $nama);
        $sql = $this->db->get($this->table_size);
        return $sql->result();
    }

    public function get_jumlah_size() {
        $sql = $this->db->query('SELECT COUNT(id_size) AS jumlah_size FROM size');
        return $sql->result();
    }

    public function get_namesize_by_id($id = '') {

        $this->db->select('nama_size');
        $this->db->where('id_size', $id);

        $sql = $this->db->get($this->table_size);
        return $sql->result();
    }

    public function get_size() {
        $sql = $this->db->query('SELECT * FROM size');
        return $sql->result();
    }

    public function insert_size($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_size' => $value['nama_size'],
            'desc_size' => $value['desc_size'],
        );
        $this->db->insert($this->table_size, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_size($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_size' => $value['nama_size'],
            'desc_size' => $value['desc_size'],
        );

        $this->db->where('id_size', $id);
        $this->db->update($this->table_size, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_size($value) {
        $this->db->trans_begin();

        $this->db->where('id_size', $value);
        $this->db->delete($this->table_size);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------------------------------//
    //
    //-------------------------WARNA----------------------//

    public function cek_duplikat_warna($nama = '') {
        $this->db->where('nama_warna', $nama);
        $sql = $this->db->get($this->table_warna);
        return $sql->result();
    }

    public function get_warna() {
        $sql = $this->db->query('SELECT * FROM warna');
        return $sql->result();
    }

    public function get_jumlah_warna() {
        $sql = $this->db->query('SELECT COUNT(id_warna) AS jumlah_warna FROM warna');
        return $sql->result();
    }

    public function get_namewarna_by_id($id = '') {

        $this->db->select('nama_warna');
        $this->db->where('id_warna', $id);

        $sql = $this->db->get($this->table_warna);
        return $sql->result();
    }

    public function insert_warna($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_warna' => $value['nama_warna'],
            'kode_warna' => $value['kode_warna'],
            'desc_warna' => $value['desc_warna'],
        );
        $this->db->insert($this->table_warna, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_warna($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_warna' => $value['nama_warna'],
            'kode_warna' => $value['kode_warna'],
            'desc_warna' => $value['desc_warna'],
        );

        $this->db->where('id_warna', $id);
        $this->db->update($this->table_warna, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_warna($value) {
        $this->db->trans_begin();

        $this->db->where('id_warna', $value);
        $this->db->delete($this->table_warna);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //------------------------------------------------//
}

?>