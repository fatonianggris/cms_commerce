<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        $this->load->model('Productmodel');
    }

    public function detail_product($id = "") {

        $cek = $this->Productmodel->get_by_id_produk($id);
        if ($cek == FALSE or empty($id)) {
            $this->load->view('error_404');
        } else {
            $token_kat = $this->Productmodel->get_token_kat_produk_by_id($id);
            $data['warna'] = $this->Productmodel->get_warna();
            $data['size'] = $this->Productmodel->get_size();
            $data['kategori'] = $this->Productmodel->get_kategori();
            $data['sub_kategori'] = $this->Productmodel->get_sub_kategori();
            $data['gambar_produk'] = $this->Productmodel->get_imgproduk_by_id($token_kat[0]->token);
            $data['gambar_produk_kat'] = $this->Productmodel->get_gambar_produk();
            $data['produk_kategori'] = $this->Productmodel->get_produk_by_kategori($id, $token_kat[0]->kategori_barang);
            $data['detail_produk'] = $this->Productmodel->get_detail_produk($id);
            $data['contact'] = $this->Productmodel->get_contact();
            $data['general_page'] = $this->Productmodel->get_general_page();
            $data['seo'] = $this->Productmodel->get_seo();
            $this->template->load('template_landing_page/template_landing_page', 'product', $data);
        }
    }

    public function search_product() {
        $by_nama = $this->input->get('name');
        $by_kategori = $this->input->get('kat');
        $by_price_min = $this->input->get('prc_min');
        $by_price_max = $this->input->get('prc_max');
        $by_tag = $this->input->get('tag');

        $data['warna'] = $this->Productmodel->get_warna();
        $data['size'] = $this->Productmodel->get_size();
        $data['gambar_produk'] = $this->Productmodel->get_gambar_produk();
        $data['kategori'] = $this->Productmodel->get_kategori();
        $data['sub_kategori'] = $this->Productmodel->get_sub_kategori();
        $data['produk_rekomendasi'] = $this->Productmodel->get_produk_rekomendasi();
        $data['contact'] = $this->Productmodel->get_contact();
        $data['produk_search'] = $this->Productmodel->get_produk_search($by_nama, $by_kategori, $by_price_min, $by_price_max, $by_tag);
        $data['general_page'] = $this->Productmodel->get_general_page();
        $data['seo'] = $this->Productmodel->get_seo();
        $this->template->load('template_landing_page/template_landing_page', 'search', $data);
    }

    public function new_arrivals() {
        $data['warna'] = $this->Productmodel->get_warna();
        $data['size'] = $this->Productmodel->get_size();
        $data['gambar_produk'] = $this->Productmodel->get_gambar_produk();
        $data['kategori'] = $this->Productmodel->get_kategori();
        $data['sub_kategori'] = $this->Productmodel->get_sub_kategori();
        $data['produk_arrival'] = $this->Productmodel->get_produk_new_arrivals();
        $data['contact'] = $this->Productmodel->get_contact();
        $data['general_page'] = $this->Productmodel->get_general_page();
        $data['seo'] = $this->Productmodel->get_seo();
        $this->template->load('template_landing_page/template_landing_page', 'new_arrivals', $data);
    }

}
