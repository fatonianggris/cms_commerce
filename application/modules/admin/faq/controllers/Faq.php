<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        $this->load->model('Faqmodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------BLOG--------------------------------//
    //
    public function daftar_faq() {

        $data['faq'] = $this->Faqmodel->get_faq();
        $data['jumlah'] = $this->Faqmodel->get_jumlah();
        $this->template->load('template_admin/template_admin', 'daftar_faq', $data);
    }

    public function post_faq() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        $cek = $this->Faqmodel->cek_duplikat_faq(strtolower($data['pertanyaan']));

        if ($cek == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Pertanyaan FAQ '$data[pertanyaan]' Telah Tersedia..."));
            redirect('faq/daftar_faq');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('faq/daftar_faq'); //folder, controller, method
            } else {

                $input = $this->Faqmodel->insert_faq($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, FAQ '$data[pertanyaan]' Telah Tersimpan..."));
                    redirect('faq/daftar_faq');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('faq/daftar_faq');
                }
            }
        }
    }

    public function update_faq($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        $get_name = $this->Faqmodel->get_namefaq_by_id($id);
        $cek = $this->Faqmodel->cek_duplikat_faq(strtolower($data['pertanyaan']));

        if ($cek == TRUE && $data['pertanyaan'] != $get_name[0]->pertanyaan) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Pertanyaan FAQ '$data[pertanyaan]' Telah Tersedia..."));
            redirect('faq/daftar_faq');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('faq/daftar_faq');
            } else {
                // print_r($data);exit;    
                $edit = $this->Faqmodel->update_faq($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, FAQ '$data[pertanyaan]' Telah Terupdate..."));
                    redirect('faq/daftar_faq');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('faq/daftar_faq');
                }
            }
        }
    }

    public function delete_faq() {
        $id = $this->input->post('id');
        $data = $this->Faqmodel->get_namefaq_by_id($id);
        $delete = $this->Faqmodel->delete_faq($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, FAQ '$data->pertanyaan' Telah Terhapus.."));
            redirect('faq/daftar_faq');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('faq/daftar_faq');
        }
    }

    //-----------------------------------------------------------------------//
}
