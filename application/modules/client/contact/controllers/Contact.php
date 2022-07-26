<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        $this->load->model('Contactmodel');
        $this->load->library('form_validation');
    }

    public function contact_us() {
        $data['kategori'] = $this->Contactmodel->get_kategori();
        $data['sub_kategori'] = $this->Contactmodel->get_sub_kategori();
        $data['contact'] = $this->Contactmodel->get_contact();
        $data['general_page'] = $this->Contactmodel->get_general_page();
        $data['seo'] = $this->Contactmodel->get_seo();
        $this->template->load('template_landing_page/template_landing_page', 'contact', $data);
    }

    public function post_contact() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo '0';
        } else {

            $input = $this->Contactmodel->insert_saran($data);
            if ($input == true) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }

}
