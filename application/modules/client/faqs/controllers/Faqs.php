<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        $this->load->model('Faqsmodel');
    }

    public function detail_faq() {
        $data['kategori'] = $this->Faqsmodel->get_kategori();
        $data['sub_kategori'] = $this->Faqsmodel->get_sub_kategori();
        $data['faqs'] = $this->Faqsmodel->get_faqs();
        $data['contact'] = $this->Faqsmodel->get_contact();
        $data['general_page'] = $this->Faqsmodel->get_general_page();
         $data['seo'] = $this->Faqsmodel->get_seo();
        $this->template->load('template_landing_page/template_landing_page', 'faqs', $data);
    }

}
