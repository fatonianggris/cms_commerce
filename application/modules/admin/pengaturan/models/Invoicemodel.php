<?php

class Invoicemodel extends CI_Model {

    private $table_invoice = 'invoice';

    //
    //------------------------------HOMEPAGE--------------------------------//
    //

    public function get_by_id_invoice($id = '') {
        $this->db->where('id_general_page', $id);
        $sql = $this->db->get($this->table_invoice);
        return $sql->result();
    }

    public function update_invoice($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_website' => $value['nama_website'],
            'logo_website' => $value['logo_website'],
            'logo_website_thumb' => $value['logo_website_thumb'],
            'greeting_website' => $value['greeting_website'],
            'contact_bussines' => $value['contact_bussines'],
            'about_website' => $value['about_website']
        );

        $this->db->where('id_general_page', $id);
        $this->db->update($this->table_invoice, $data);

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
}

?>