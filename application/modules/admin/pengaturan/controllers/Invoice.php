<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        $this->load->model('Invoicemodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------GENERAL PAGE--------------------------------//
    //
    public function edit_invoice() {
        $data[] = "";
        //$data['invoice'] = $this->Invoicemodel->get_by_id_invoice(1);
        //$this->template->load('template_admin/template_admin', 'general_page', $data);
        $this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function update_invoice() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['logo_invoice'] = $data['logo_temp'];
        $data['logo_invoice_thumb'] = $data['logo_temp_thumb'];

        $get_logo_temp = explode('/', $data['logo_temp']);
        $path_logo_temp = $get_logo_temp[2];

        $this->form_validation->set_rules('nama_website', 'Nama Website Toko', 'required');
        $this->form_validation->set_rules('greeting_website', 'Isi Ucapan Salam Toko', 'required');
        $this->form_validation->set_rules('contact_bussines', 'Kontak Bisnis', 'required');
        $this->form_validation->set_rules('about_website', 'Tetang Website Toko', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/invoice/daftar_invoice');
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image

            if (!empty($_FILES['logo_invoice']['tmp_name'])) {

                $this->delete_general_file($path_logo_temp); //delete existing file

                $path = 'uploads/invoice/';
                $path_thumb = 'uploads/invoice/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo_invoice')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['logo_invoice'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 600;
                    $img['height'] = 600;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['logo_invoice_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/invoice/daftar_invoice');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/invoice/daftar_invoice');
                }
            }
            // print_r($data);exit;    
            $edit = $this->Invoicemodel->update_invoice(1, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Deskripsi General Page Telah Terupdate..."));
                redirect('pengaturan/invoice/daftar_invoice');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/invoice/daftar_invoice');
            }
        }
    }

    public function delete_general_file($name = '') {
        $path = './uploads/invoice/';
        $path_thumb = './uploads/invoice/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //-----------------------------------------------------------------------//
}
