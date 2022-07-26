<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->model('Pelangganmodel');
        $this->load->library('form_validation');
    }

    //
    //----------------------------PELANGGAN--------------------------//
    //
    
    public function daftar_pelanggan() {

        $data['pelanggan'] = $this->Pelangganmodel->get_pelanggan();
//        $data['count'] = $this->Pelangganmodel->get_jumlah();
        //$this->template->load('template_admin/template_admin', 'daftar_pelanggan', $data);
        $this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function detail_pelanggan() {

        $data['pelanggan'] = $this->Pelangganmodel->get_pelanggan();
//        $data['count'] = $this->Pelangganmodel->get_jumlah();
        $this->template->load('template_admin/template_admin', 'detail_pelanggan', $data);
    }

    public function edit_pelanggan($id = '') {

        $data['pelanggan'] = $this->Pelangganmodel->get_by_id_pelanggan($id); //?
        $cek = $this->Pelangganmodel->get_by_id_pelanggan($id);

        if ($cek == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_admin/template_admin', 'edit_pelanggan', $data);
        }
    }

    public function update_pelanggan($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('produk_toko', 'Produk dari Toko', 'required');
        $this->form_validation->set_rules('min_pembelian', 'Minimal Pembelian', 'required');
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('berat', 'Berat Barang', 'required');
        $this->form_validation->set_rules('kat_barang', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('rekomendasi', 'Rekomendasi Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required');
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
        $this->form_validation->set_rules('desc_barang', 'Deskripsi Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            //
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pelanggan/daftar_pelanggan/');
        } else {

            // print_r($data);exit;    
            $edit = $this->Pelangganmodel->update_pelanggan($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Pelanggan '$data[nama_pelanggan]' Telah Terupdate.."));
                redirect('pelanggan/daftar_pelanggan/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pelanggan/daftar_pelanggan/');
            }
        }
    }

    public function delete_pelanggan() {

        $id = $this->input->post('id');
        $data = $this->Pelangganmodel->get_namapelanggan_by_id($id);
        $delete = $this->Pelangganmodel->delete_pelanggan($id);

        if ($delete == true) {

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Pelanggan '$data->nama_pelanggan' Telah Terhapus.."));
            redirect('pelanggan/daftar_pelanggan/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('pelanggan/daftar_pelanggan/');
        }
    }

    public function delete_file($name = '') {
        $path = './uploads/pelanggan/';
        $path_thumb = './uploads/pelanggan/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //----------------------------------------------------------------//
}
