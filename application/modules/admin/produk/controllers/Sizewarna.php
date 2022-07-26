<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sizewarna extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        // Load Library
        $this->load->model('Sizewarnamodel');
        $this->load->library('form_validation');
    }

    //--------------------------GENERAL----------------------------//

    public function daftar_size_warna() {

        $data['size'] = $this->Sizewarnamodel->get_size();
        $data['warna'] = $this->Sizewarnamodel->get_warna();
        $data['jumlah'] = $this->Sizewarnamodel->get_jumlah_item();

        $this->template->load('template_admin/template_admin', 'daftar_sizewarna', $data);
    }

    //---------------------------------------------------------------//
    //
    //----------------------------SIZE-------------------------------//
    public function post_size() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_size', 'Nama Size', 'required');

        $cek = $this->Sizewarnamodel->cek_duplikat_size(strtolower($data['nama_size']));

        if ($cek == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Size '$data[nama_size]' Telah Tersedia..."));
            redirect('produk/sizewarna/daftar_size_warna');
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('produk/sizewarna/daftar_size_warna'); //folder, controller, method
            } else {

                $input = $this->Sizewarnamodel->insert_size($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Size '$data[nama_size]' Telah Tersimpan.."));
                    redirect('produk/sizewarna/daftar_size_warna');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('produk/sizewarna/daftar_size_warna');
                }
            }
        }
    }

    public function update_size($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_size', 'Nama Size', 'required');

        $get_name = $this->Sizewarnamodel->get_namesize_by_id($id);
        $cek = $this->Sizewarnamodel->cek_duplikat_size(strtolower($data['nama_size']));

        if ($cek == TRUE && $data['nama_size'] != $get_name[0]->nama_size) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Size '$data[nama_size]' Telah Tersedia..."));
            redirect('produk/sizewarna/daftar_size_warna');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('produk/sizewarna/daftar_size_warna');
            } else {
                // print_r($data);exit;    
                $edit = $this->Sizewarnamodel->update_size($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Size '$data[nama_size]' Telah Terupdate.."));
                    redirect('produk/sizewarna/daftar_size_warna');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('produk/sizewarna/daftar_size_warna');
                }
            }
        }
    }

    public function delete_size() {

        $id = $this->input->post('id');
        $data = $this->Sizewarnamodel->get_namesize_by_id($id);
        $delete = $this->Sizewarnamodel->delete_size($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Size '$data->nama_size' Telah Terhapus.."));
            redirect('produk/sizewarna/daftar_size_warna/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('produk/sizewarna/daftar_size_warna/');
        }
    }

    //---------------------------------------------------------------//
    //
    //----------------------------WARNA-------------------------------//

    public function post_warna() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_warna', 'Nama Warna', 'required');
        $this->form_validation->set_rules('kode_warna', 'Kode Warna', 'required');

        $cek = $this->Sizewarnamodel->cek_duplikat_warna(strtolower($data['nama_warna']));

        if ($cek == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Warna '$data[nama_warna]' Telah Tersedia..."));
            redirect('produk/sizewarna/daftar_size_warna/');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('produk/sizewarna/daftar_size_warna/'); //folder, controller, method
            } else {

                $input = $this->Sizewarnamodel->insert_warna($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Warna '$data[nama_warna]' Telah Tersimpan.."));
                    redirect('produk/sizewarna/daftar_size_warna/');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('produk/sizewarna/daftar_size_warna/');
                }
            }
        }
    }

    public function update_warna($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_warna', 'Nama Warna', 'required');
        $this->form_validation->set_rules('kode_warna', 'Kode Warna', 'required');

        $get_name = $this->Sizewarnamodel->get_namewarna_by_id($id);
        $cek = $this->Sizewarnamodel->cek_duplikat_warna(strtolower($data['nama_warna']));

        if ($cek == TRUE && $data['nama_warna'] != $get_name[0]->nama_warna) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Warna '$data[nama_warna]' Telah Tersedia..."));
            redirect('produk/sizewarna/daftar_size_warna/');
        } else {

            if ($this->form_validation->run() == FALSE) {
                //
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('produk/sizewarna/daftar_size_warna/');
            } else {

                // print_r($data);exit;    
                $edit = $this->Sizewarnamodel->update_warna($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Warna '$data[nama_warna]' Telah Terupdate.."));
                    redirect('produk/sizewarna/daftar_size_warna/');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('produk/sizewarna/daftar_size_warna/');
                }
            }
        }
    }

    public function delete_warna() {
        $id = $this->input->post('id');
        $data = $this->Sizewarnamodel->get_namewarna_by_id($id);
        $delete = $this->Sizewarnamodel->delete_warna($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Warna '$data->nama_warna' Telah Terhapus.."));
            redirect('produk/sizewarna/daftar_size_warna/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('produk/sizewarna/daftar_size_warna/');
        }
    }

    //---------------------------------------------------------------//
//
}
