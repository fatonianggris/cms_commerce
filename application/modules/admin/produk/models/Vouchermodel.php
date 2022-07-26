<?php

class Vouchermodel extends CI_Model {

    private $table_voucher = 'voucher';

    //
    //---------------------------GENERAL----------------------//
    //

    public function get_jumlah_item() {
        $sql = $this->db->query('SELECT (SELECT COUNT(id_voucher) FROM voucher) AS jumlah_voucher,(SELECT COUNT(id_produk) FROM produk WHERE voucher!=0) AS jumlah_produk_voucher, (SELECT COUNT(id_produk) FROM produk) AS jumlah_produk');
        return $sql->result();
    }

    //
    //----------------------------SIZE--------------------------//
    //
    
    public function cek_duplikat_voucher($kode = '') {
        $this->db->where('kode_voucher', $kode);
        $sql = $this->db->get($this->table_voucher);
        return $sql->result();
    }

    public function get_jumlah_voucher() {
        $sql = $this->db->query('SELECT COUNT(id_voucher) AS jumlah_voucher FROM voucher');
        return $sql->result();
    }

    public function get_kodevoucher_by_id($id = '') {

        $this->db->select('kode_voucher');
        $this->db->where('id_voucher', $id);

        $sql = $this->db->get($this->table_voucher);
        return $sql->result();
    }

    public function get_voucher() {
        $sql = $this->db->query('SELECT * FROM voucher');
        return $sql->result();
    }

    public function insert_voucher($value = '') {
        $this->db->trans_begin();

        $data = array(
            'kode_voucher' => $value['kode_voucher'],
            'potongan' => $value['potongan'],
            'jumlah_voucher' => $value['jumlah_voucher'],
            'masa_berlaku' => $value['masa_berlaku'],
        );
        $this->db->insert($this->table_voucher, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_voucher($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'kode_voucher' => $value['kode_voucher'],
            'potongan' => $value['potongan'],
            'jumlah_voucher' => $value['jumlah_voucher'],
            'masa_berlaku' => $value['masa_berlaku'],
        );

        $this->db->where('id_voucher', $id);
        $this->db->update($this->table_voucher, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_voucher($value) {
        $this->db->trans_begin();

        $this->db->where('id_voucher', $value);
        $this->db->delete($this->table_voucher);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------------------------------//
}

?>