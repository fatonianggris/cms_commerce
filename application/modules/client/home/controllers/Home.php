<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        $this->load->model('Homemodel');
        $this->load->library('form_validation');
    }

    public function index() {

        $data['warna'] = $this->Homemodel->get_warna();
        $data['size'] = $this->Homemodel->get_size();
        $data['gambar_produk'] = $this->Homemodel->get_gambar_produk();
        $data['kategori'] = $this->Homemodel->get_kategori();
        $data['sub_kategori'] = $this->Homemodel->get_sub_kategori();
        $data['produk_all'] = $this->Homemodel->get_produk_all();
        $data['produk_rekomendasi'] = $this->Homemodel->get_produk_rekomendasi();
        $data['produk_promo'] = $this->Homemodel->get_produk_promo();
        $data['produk_baru'] = $this->Homemodel->get_produk_baru();
        $data['banner'] = $this->Homemodel->get_banner();
        $data['contact'] = $this->Homemodel->get_contact();
        $data['general_page'] = $this->Homemodel->get_general_page();
        $data['seo'] = $this->Homemodel->get_seo();
        $this->template->load('template_landing_page/template_landing_page', 'home', $data);
    }

    public function add_newsletter() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('email_user', 'Email Newsletter', 'required');

        if ($this->form_validation->run() == FALSE) {

            echo '0';
        } else {

            $edit = $this->Homemodel->insert_newsletter($data);
            if ($edit == true) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }

}
