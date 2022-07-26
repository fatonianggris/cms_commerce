<?php

class Alatbayarkurirmodel extends CI_Model {

    private $table_alatbayar = 'alatbayar';
    private $table_kurir = 'kurir';

    //
    //-------------------------------ALATBAYAR------------------------------//
    //
    
    public function get_jumlah() {
        $sql = $this->db->query('select(select count(id_alatbayar) from alatbayar) as total_alatbayar, (select count(id_kurir) from kurir) as total_kurir');
        return $sql->result();
    }

    public function cek_duplikat_alatbayar($nama = '') {
        $this->db->where('nama_alatbayar', $nama);
        $sql = $this->db->get($this->table_alatbayar);
        return $sql->result();
    }

    public function get_alatbayar() {
        $sql = $this->db->query("SELECT * FROM alatbayar");
        return $sql->result();
    }

    public function get_alatbayar_by_id($id = '') {
        $this->db->where('id_alatbayar', $id);
        $sql = $this->db->get($this->table_alatbayar);
        return $sql->result();
    }

    public function get_nameimgalatbayar_by_id($id = '') {
        $this->db->select('logo_instansi, nama_alatbayar');
        $this->db->where('id_alatbayar', $id);
        $sql = $this->db->get($this->table_alatbayar);
        return $sql->result();
    }

    public function insert_alatbayar($value = '') {
        $this->db->trans_begin();

        $data = array(
            'tipe_alatbayar' => $value['tipe_alatbayar'],
            'nama_alatbayar' => $value['nama_alatbayar'],
            'atas_nama' => $value['atas_nama'],
            'nomor_alatbayar' => $value['nomor_alatbayar'],
            'logo_instansi' => $value['logo_instansi'],
            'logo_instansi_thumb' => $value['logo_instansi_thumb'],
            'catatan_transfer' => $value['catatan_transfer'],
            'petunjuk_transfer' => $value['petunjuk_transfer']
        );
        $this->db->insert($this->table_alatbayar, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_alatbayar($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'tipe_alatbayar' => $value['tipe_alatbayar'],
            'nama_alatbayar' => $value['nama_alatbayar'],
            'atas_nama' => $value['atas_nama'],
            'nomor_alatbayar' => $value['nomor_alatbayar'],
            'logo_instansi' => $value['logo_instansi'],
            'logo_instansi_thumb' => $value['logo_instansi_thumb'],
            'catatan_transfer' => $value['catatan_transfer'],
            'petunjuk_transfer' => $value['petunjuk_transfer']
        );

        $this->db->where('id_alatbayar', $id);
        $this->db->update($this->table_alatbayar, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_alatbayar($value) {
        $this->db->trans_begin();

        $this->db->where('id_alatbayar', $value);
        $this->db->delete($this->table_alatbayar);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------------------------------------------//
    //
    //-------------------------------API KURIR------------------------------//
    //
      
    public function get_kurir_by_id($id = '') {
        $this->db->where('id_kurir', $id);
        $sql = $this->db->get($this->table_kurir);
        return $sql->result();
    }

    public function update_api_kurir($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'base_url_api' => $value['base_url_api'],
            'api_key' => $value['api_key'],
            'id_provinsi' => $value['id_provinsi'],
            'id_kabupaten' => $value['id_kabupaten'],
            'id_kecamatan' => $value['id_kecamatan'],
            'type_alamat' => $value['type_alamat']
        );

        $this->db->where('id_kurir', $id);
        $this->db->update($this->table_kurir, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------------------------------------------------//
}

?>