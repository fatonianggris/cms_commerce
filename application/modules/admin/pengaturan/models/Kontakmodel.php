<?php

class Kontakmodel extends CI_Model {

    private $table_kontak = 'kontak';
    private $table_saran = 'saran';

    //
    //------------------------------COUNT--------------------------------//
    //

    public function get_jumlah() {
        $sql = $this->db->query('select (select count(id_produk) from produk) as total_produk, (select count(id_saran) from saran) as total_saran');
        return $sql->result();
    }

    //
    //------------------------------KONTAK--------------------------------//
    //

    public function get_by_id_kontak($id = '') {
        $this->db->where('id_kontak', $id);
        $sql = $this->db->get($this->table_kontak);
        return $sql->result();
    }

    public function update_kontak($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'alamat' => $value['alamat'],
            'nomor_telephone' => $value['nomor_telephone'],
            'no_handphone' => $value['no_handphone'],
            'email' => $value['email'],
            'jam_kerja' => $value['jam_kerja'],
            'akun_instagram' => $value['akun_instagram'],
            'akun_facebook' => $value['akun_facebook'],
            'akun_twitter' => $value['akun_twitter'],
        );

        $this->db->where('id_kontak', $id);
        $this->db->update($this->table_kontak, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //--------------------------------------------------------------------//
    //------------------------------SARAN--------------------------------//
    //



    public function get_jumlah_saran() {
        $sql = $this->db->query('SELECT (SELECT count(id_saran) FROM saran) AS jumlah_saran');
        return $sql->result();
    }

    public function get_namesaran_by_id($id = '') {
        $this->db->select('nama_pengirim');
        $this->db->where('id_saran', $id);
        $sql = $this->db->get($this->table_saran);
        return $sql->result();
    }

    public function get_saran() {
        $sql = $this->db->query('SELECT * FROM saran');
        return $sql->result();
    }

    public function delete_saran($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_saran', $value);
        $this->db->delete($this->table_saran);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

//
    //--------------------------------------------------------------------//
//
}

?>