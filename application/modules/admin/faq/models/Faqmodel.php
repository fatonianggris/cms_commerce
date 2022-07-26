<?php

class Faqmodel extends CI_Model {

    private $table_faq = 'faq';

    //
    //------------------------------COUNT--------------------------------//
    //

    public function get_jumlah() {
        $sql = $this->db->query('select (select count(id_produk) from produk) as total_produk, (select count(id_faq) from faq) as total_faq');
        return $sql->result();
    }

    //
    //------------------------------FAQ--------------------------------//
    //
    

    public function get_faq_limit() {
        $sql = $this->db->query('SELECT * FROM faq ORDER BY date LIMIT 3');
        return $sql->result();
    }

    public function cek_duplikat_faq($tanya = '') {
        $this->db->where('pertanyaan', $tanya);
        $sql = $this->db->get($this->table_faq);
        return $sql->result();
    }

    public function get_faq() {
        $sql = $this->db->query('SELECT * FROM faq');
        return $sql->result();
    }

    public function get_by_id_faq($id = '') {
        $this->db->where('id_faq', $id);
        $sql = $this->db->get($this->table_faq);
        return $sql->result();
    }

    public function get_namefaq_by_id($id = '') {
        $this->db->select('pertanyaan');
        $this->db->where('id_faq', $id);
        $sql = $this->db->get($this->table_faq);
        return $sql->result();
    }

    public function insert_faq($value = '') {

        $data = array(
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['jawaban'],
        );
        $this->db->insert($this->table_faq, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_faq($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['jawaban'],
        );

        $this->db->where('id_faq', $id);
        $this->db->update($this->table_faq, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_faq($value) {
        $this->db->trans_begin();

        $this->db->where('id_faq', $value);
        $this->db->delete($this->table_faq);

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