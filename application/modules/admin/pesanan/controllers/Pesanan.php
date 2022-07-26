<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->model('Pesananmodel');
        $this->load->library('form_validation');
    }

    //
    //----------------------------PESANAN--------------------------//
    //
    
    public function daftar_pesanan() {
        $data = "";
//        $data['pesanan'] = $this->Pesananmodel->get_pesanan();
//        $data['count'] = $this->Pesananmodel->get_jumlah();
        //$this->template->load('template_admin/template_admin', 'daftar_pesanan', $data);
        $this->template->load('template_admin/template_admin', 'detail_invoice', $data);
    }

    public function edit_pesanan($id = '') {

        $data['pesanan'] = $this->Pesananmodel->get_by_id_pesanan($id); //?
        $cek = $this->Pesananmodel->get_by_id_pesanan($id);

        if ($cek == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_admin/template_admin', 'edit_pesanan', $data);
        }
    }

    public function update_pesanan($id = '') {

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
            redirect('pesanan/edit_pesanan/' . $id);
        } else {

            // print_r($data);exit;    
            $edit = $this->Pesananmodel->update_pesanan($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Pesanan '$data[nama_pesanan]' Telah Terupdate.."));
                redirect('pesanan/edit_pesanan/' . $id);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pesanan/edit_pesanan/' . $id);
            }
        }
    }

    public function delete_pesanan() {

        $id = $this->input->post('id');
        $data = $this->Pesananmodel->get_namapesanan_by_id($id);
        $delete = $this->Pesananmodel->delete_pesanan($id);

        if ($delete == true) {

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Pesanan '$data->nama_pesanan' Telah Terhapus.."));
            redirect('pesanan/daftar_pesanan/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('pesanan/daftar_pesanan/');
        }
    }

    public function delete_file($name = '') {
        $path = './uploads/pesanan/';
        $path_thumb = './uploads/pesanan/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //----------------------------------------------------------------//
}
