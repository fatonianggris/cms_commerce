<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        $this->load->model('Kontakmodel');
        $this->load->library('form_validation');
    }

    //
    //--------------------------------KONTAK----------------------------------//
    //
    public function daftar_kontak() {

        $data['kontak'] = $this->Kontakmodel->get_by_id_kontak(1);
        $data['saran'] = $this->Kontakmodel->get_saran();
        $data['jumlah'] = $this->Kontakmodel->get_jumlah();
        $this->template->load('template_admin/template_admin', 'daftar_kontak', $data);
    }

    public function update_kontak() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('email', 'Email Online Shop', 'required');
        $this->form_validation->set_rules('jam_kerja', 'Jam Kerja Toko', 'required');
        $this->form_validation->set_rules('no_handphone', 'Nomor Handphone', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/kontak/daftar_kontak');
        } else {
            // print_r($data);exit;    
            $edit = $this->Kontakmodel->update_kontak(1, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Deskripsi Kontak Telah Terupdate..."));
                redirect('pengaturan/kontak/daftar_kontak');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/kontak/daftar_kontak');
            }
        }
    }

    //-----------------------------------------------------------------------//
    //
    //--------------------------------SARAN----------------------------------//
    //
    public function delete_saran() {
        $id = $this->input->post('id');
        $data = $this->Kontakmodel->get_namesaran_by_id($id);
        $delete = $this->Kontakmodel->delete_saran($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Saran dari '$data->nama_pengirim' Telah Terhapus.."));
            redirect('pengaturan/kontak/daftar_kontak');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('pengaturan/kontak/daftar_kontak');
        }
    }

    //-----------------------------------------------------------------------//
}
