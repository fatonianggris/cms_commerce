<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generalpage extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        $this->load->model('Generalpagemodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------GENERAL PAGE--------------------------------//
    //
    public function daftar_generalpage() {

        $data['generalpage'] = $this->Generalpagemodel->get_by_id_generalpage(1);
        $data['seopage'] = $this->Generalpagemodel->get_by_id_seopage(1);
        $data['banner'] = $this->Generalpagemodel->get_banner();
        $data['jumlah'] = $this->Generalpagemodel->get_jumlah();
        $this->template->load('template_admin/template_admin', 'general_page', $data);
    }

    public function update_generalpage() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['logo_website'] = $data['logo_temp'];
        $data['logo_website_thumb'] = $data['logo_temp_thumb'];

        $get_logo_temp = explode('/', $data['logo_temp']);
        $path_logo_temp = $get_logo_temp[2];

        $this->form_validation->set_rules('nama_website', 'Nama Website Toko', 'required');      
        $this->form_validation->set_rules('contact_bussines', 'Kontak Bisnis', 'required');
        $this->form_validation->set_rules('about_website', 'Tetang Website Toko', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/generalpage/daftar_generalpage');
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image

            if (!empty($_FILES['logo_website']['tmp_name'])) {

                $this->delete_general_file($path_logo_temp); //delete existing file

                $path = 'uploads/general/';
                $path_thumb = 'uploads/general/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo_website')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['logo_website'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 600;
                    $img['height'] = 600;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['logo_website_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/generalpage/daftar_generalpage');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/generalpage/daftar_generalpage');
                }
            }
            // print_r($data);exit;    
            $edit = $this->Generalpagemodel->update_generalpage(1, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Deskripsi General Page Telah Terupdate..."));
                redirect('pengaturan/generalpage/daftar_generalpage');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/generalpage/daftar_generalpage');
            }
        }
    }

    public function delete_general_file($name = '') {
        $path = './uploads/general/';
        $path_thumb = './uploads/general/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //-----------------------------------------------------------------------//
    //
    //--------------------------------BANNER----------------------------------//
    //
    
     public function post_banner() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['status_banner'] = '0';

        $this->form_validation->set_rules('judul_banner', 'Judul Banner Toko', 'required');
        $this->form_validation->set_rules('judul_promo', 'Judul Promo Banner Toko', 'required');
        $this->form_validation->set_rules('konten', 'Konten Banner Toko', 'required');
        $this->form_validation->set_rules('highlight', 'Highlight Banner Toko', 'required');

        $cek = $this->Generalpagemodel->cek_duplikat_banner(strtolower($data['judul_banner']));

        if ($cek == TRUE) {
            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Judul Banner '$data[judul_banner]' Telah Tersedia..."));
            redirect('pengaturan/generalpage/daftar_generalpage');
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('pengaturan/generalpage/daftar_generalpage'); //folder, controller, method
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['gambar_banner'])) {

                    $path = 'uploads/banner/';
                    $path_thumb = 'uploads/banner/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg|ico';
                    $config['max_size'] = 2048; //set limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('gambar_banner')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['gambar_banner'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 600;
                        $img['weight'] = 600;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['gambar_banner_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('pengaturan/generalpage/daftar_generalpage');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('pengaturan/generalpage/daftar_generalpage');
                    }
                }
                $input = $this->Generalpagemodel->insert_banner($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Banner '$data[judul_banner]' Telah Tersimpan.."));
                    redirect('pengaturan/generalpage/daftar_generalpage');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('pengaturan/generalpage/daftar_generalpage');
                }
            }
        }
    }

    public function update_banner($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['gambar_banner'] = $data['gambar_temp'];
        $data['gambar_banner_thumb'] = $data['gambar_temp_thumb'];

        $get_gambar_temp = explode('/', $data['gambar_temp']);
        $path_gambar_temp = $get_gambar_temp[2];

        $this->form_validation->set_rules('judul_banner', 'Judul Banner Toko', 'required');
        $this->form_validation->set_rules('judul_promo', 'Judul Promo Banner Toko', 'required');
        $this->form_validation->set_rules('konten', 'Konten Banner Toko', 'required');
        $this->form_validation->set_rules('highlight', 'Highlight Banner Toko', 'required');

        $get_name = $this->Generalpagemodel->get_nameimgbanner_by_id($id);
        $cek = $this->Generalpagemodel->cek_duplikat_banner(strtolower($data['judul_banner']));

        if ($cek == TRUE && $data['judul_banner'] != $get_name[0]->judul_banner) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Judul Banner '$data[judul_banner]' Telah Tersedia..."));
            redirect('pengaturan/generalpage/daftar_generalpage');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('pengaturan/generalpage/daftar_generalpage');
            } else {

                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['gambar_banner']['tmp_name'])) {

                    $this->delete_banner_file($path_gambar_temp); //delete existing file

                    $path = 'uploads/banner/';
                    $path_thumb = 'uploads/banner/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = 2048; //set without limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('gambar_banner')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['gambar_banner'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 600;
                        $img['height'] = 600;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['gambar_banner_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('pengaturan/generalpage/daftar_generalpage');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('pengaturan/generalpage/daftar_generalpage');
                    }
                }
                // print_r($data);exit;    
                
                $edit = $this->Generalpagemodel->update_banner($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Banner '$data[judul_banner]' Telah Terupdate.."));
                    redirect('pengaturan/generalpage/daftar_generalpage');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('pengaturan/generalpage/daftar_generalpage');
                }
            }
        }
    }

    public function delete_banner() {
        $id = $this->input->post('id');
        $data = $this->Generalpagemodel->get_nameimgbanner_by_id($id);
        $data_img = explode('/', $data[0]->gambar_banner);
        $name_img = $data_img[2];

        $delete = $this->Generalpagemodel->delete_banner($id);
        if ($delete == true) {
            $this->delete_banner_file($name_img);
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Banner '$data->nama_banner' Telah Terhapus.."));
            redirect('pengaturan/generalpage/daftar_generalpage');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('pengaturan/generalpage/daftar_generalpage');
        }
    }

    public function delete_banner_file($name = '') {
        $path = './uploads/banner/';
        $path_thumb = './uploads/banner/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //-----------------------------------------------------------------------//
    //
    //------------------------------SEO PAGE--------------------------------//
//

    public function update_seopage() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['gambar_page_seo'] = $data['gambar_temp'];

        $get_gambar_temp = explode('/', $data['gambar_temp']);
        $path_gambar_temp = $get_gambar_temp[2];

        $this->form_validation->set_rules('judul_page_seo', 'Judul Website Anda', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords Website Anda', 'required');
        $this->form_validation->set_rules('deskripsi_page', 'Deskripsi Website Anda', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/generalpage/daftar_generalpage');
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image

            if (!empty($_FILES['gambar_page_seo']['tmp_name'])) {

                $this->delete_seo_file($path_gambar_temp); //delete existing file

                $path = 'uploads/general/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 652; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = FALSE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar_page_seo')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['gambar_page_seo'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 300;
                    $img['height'] = 300;

                    $this->image_lib->initialize($img);
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/generalpage/daftar_generalpage');
                }
            }
            // print_r($data);exit;    
            $edit = $this->Generalpagemodel->update_seopage(1, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Deskripsi General Page Telah Terupdate..."));
                redirect('pengaturan/generalpage/daftar_generalpage');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/generalpage/daftar_generalpage');
            }
        }
    }

    public function delete_seo_file($name = '') {
        $path = './uploads/general/';
        @unlink($path . $name);
    }

}
