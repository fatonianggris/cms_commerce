<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->model('Sitemapmodel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------SITEMAP------------------------------//
    //
   public function index() {
        $get_produk = $this->Sitemapmodel->get_slug_produk();
        $get_kategori = $this->Sitemapmodel->get_slug_kategori();
        $get_merek = $this->Sitemapmodel->get_slug_merek();

        $xmlString = '<?xml version="1.0" encoding="UTF-8" ?>
                        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
                        <url>
                            <loc>' . base_url() . '</loc>
                            <priority>1.0</priority>
                            <changefreq>daily</changefreq>
                        </url>';

        foreach ($get_produk as $produk) {
            $xmlString .= '<url>
                                <loc>' . base_url('product/detail_product/') . $produk->id_produk . '/' . $produk->url_slug . '</loc>
                                <priority>0.5</priority>
                                <changefreq>daily</changefreq>
                            </url>';
        }
        foreach ($get_kategori as $kategori) {
            $xmlString .= '<url>
                                <loc>' . base_url('product/search_product/') . $kategori->url_slug . '</loc>
                                <priority>0.5</priority>
                                <changefreq>daily</changefreq>
                            </url>';
        }

        foreach ($get_merek as $merek) {
            $xmlString .= '<url>
                                <loc>' . base_url('product/search_product/') . $merek->url_slug . '</loc>
                                <priority>0.5</priority>
                                <changefreq>daily</changefreq>
                           </url>';
        }
        $xmlString .= '</urlset>';

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xmlString);

        $create_xml = $dom->save($_SERVER["DOCUMENT_ROOT"] . '/sitemap.xml');

        if ($create_xml == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Sitemap.xml Telah Terupdate.."));
            redirect('pengaturan/generalpage/daftar_generalpage');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('pengaturan/generalpage/daftar_generalpage');
        }
    }

    //-------------------------------------------------------------------//
}
