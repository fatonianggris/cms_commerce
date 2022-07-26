<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        // Load Library
        $this->load->model('Vouchermodel');
        $this->load->library('form_validation');
    }

    //---------------------------------------------------------------//
    //
    //----------------------------VOUCHER-------------------------------//

    public function daftar_voucher() {

        $data['voucher'] = $this->Vouchermodel->get_voucher();
        $data['jumlah'] = $this->Vouchermodel->get_jumlah_item();

        $this->template->load('template_admin/template_admin', 'daftar_voucher', $data);
    }

    public function post_voucher() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('kode_voucher', 'Kode Voucher', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'required');
        $this->form_validation->set_rules('jumlah_voucher', 'Jumlah Voucher', 'required');
        $this->form_validation->set_rules('masa_berlaku', 'Masa Berlaku', 'required');

        $cek = $this->Vouchermodel->cek_duplikat_voucher(strtolower($data['kode_voucher']));

        if ($cek == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Kode Voucher '$data[kode_voucher]' Telah Tersedia..."));
            redirect('produk/voucher/daftar_voucher');
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('produk/voucher/daftar_voucher'); //folder, controller, method
            } else {

                $input = $this->Vouchermodel->insert_voucher($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kode Voucher '$data[kode_voucher]' Telah Tersimpan.."));
                    redirect('produk/voucher/daftar_voucher');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('produk/voucher/daftar_voucher');
                }
            }
        }
    }

    public function update_voucher($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('kode_voucher', 'Kode Voucher', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'required');
        $this->form_validation->set_rules('jumlah_voucher', 'Jumlah Voucher', 'required');
        $this->form_validation->set_rules('masa_berlaku', 'Masa Berlaku', 'required');

        $get_kode = $this->Vouchermodel->get_kodevoucher_by_id($id);
        $cek = $this->Vouchermodel->cek_duplikat_voucher(strtolower($data['kode_voucher']));

        if ($cek == TRUE && $data['kode_voucher'] != $get_kode[0]->kode_voucher) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Kode Voucher '$data[kode_voucher]' Telah Tersedia..."));
            redirect('produk/voucher/daftar_voucher');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('produk/voucher/daftar_voucher');
            } else {
                // print_r($data);exit;    
                $edit = $this->Vouchermodel->update_voucher($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kode Voucher '$data[kode_voucher]' Telah Terupdate.."));
                    redirect('produk/voucher/daftar_voucher');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('produk/voucher/daftar_voucher');
                }
            }
        }
    }

    public function delete_voucher() {

        $id = $this->input->post('id');
        $data = $this->Vouchermodel->get_kodevoucher_by_id($id);
        $delete = $this->Vouchermodel->delete_voucher($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Size '$data->kode_voucher' Telah Terhapus.."));
            redirect('produk/voucher/daftar_voucher/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('produk/voucher/daftar_voucher/');
        }
    }

    //---------------------------------------------------------------//
//
}
