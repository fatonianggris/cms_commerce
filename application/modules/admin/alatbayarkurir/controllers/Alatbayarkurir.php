<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alatbayarkurir extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->model('Alatbayarkurirmodel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------GENERAL------------------------------//
    //
    public function daftar_alatbayar_kurir() {
        $data['alatbayar'] = $this->Alatbayarkurirmodel->get_alatbayar();
        $data['kurir'] = $this->Alatbayarkurirmodel->get_kurir_by_id(2);
        $data['jumlah'] = $this->Alatbayarkurirmodel->get_jumlah();
        //$data['provinsi'] = $this->kurir_api->provinsi_api();
        $data['provinsi'] = $this->esoftplay_api->provinsi_api();
        $data['kabupaten'] = $this->esoftplay_api->kabupaten_api($data['kurir'][0]->id_provinsi);
        $data['kecamatan'] = $this->esoftplay_api->kecamatan_api($data['kurir'][0]->id_kabupaten);
        $this->template->load('template_admin/template_admin', 'daftar_alatbayarkurir', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
        //var_dump($data['provinsi']);
        //exit;
    }

    //-------------------------------------------------------------------//
    //
    //-------------------------------ALAT BAYAR------------------------------//
    //

    public function add_alatbayar() {

        $data['title'] = "Tambah Alat Bayar";
        $this->template->load('template_admin/template_admin', 'tambah_alatbayar', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function edit_alatbayar($id = '') {

        $data['alatbayar'] = $this->Alatbayarkurirmodel->get_alatbayar_by_id($id); //?    
        $cek = $this->Alatbayarkurirmodel->get_alatbayar_by_id($id);

        if ($cek == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_admin/template_admin', 'edit_alatbayar', $data);
        }
    }

    public function post_alatbayar() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('tipe_alatbayar', 'Tipe Alat Bayar', 'required');
        $this->form_validation->set_rules('nama_alatbayar', 'Nama Alat Bayar', 'required');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
        $this->form_validation->set_rules('nomor_alatbayar', 'Nomor Alat Bayar', 'required');

        $cek = $this->Alatbayarkurirmodel->cek_duplikat_alatbayar(strtolower($data['nama_alatbayar']));

        if ($cek == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Alat Bayar '$data[nama_alatbayar]' Telah Tersedia..."));
            redirect('alatbayarkurir/add_alatbayar');
        } else {
            //print_r($param);exit;
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('alatbayarkurir/add_alatbayar'); //folder, controller, method
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['logo_instansi'])) {

                    $path = 'uploads/alatbayar/';
                    $path_thumb = 'uploads/alatbayar/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 1048; //set limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('logo_instansi')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['logo_instansi'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 600;
                        $img['weight'] = 600;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['logo_instansi_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('alatbayarkurir/add_alatbayar');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('alatbayarkurir/add_alatbayar');
                    }
                }

                $input = $this->Alatbayarkurirmodel->insert_alatbayar($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Alat Bayar '$data[nama_alatbayar]' Telah Tersimpan.."));
                    redirect('alatbayarkurir/add_alatbayar');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('alatbayarkurir/add_alatbayar');
                }
            }
        }
    }

    public function update_alatbayar($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['logo_instansi'] = $data['logo_temp'];
        $data['logo_instansi_thumb'] = $data['logo_temp_thumb'];

        $get_logo_temp = explode('/', $data['logo_temp']);
        $path_logo_temp = $get_logo_temp[2];

        $this->form_validation->set_rules('tipe_alatbayar', 'Tipe Alat Bayar', 'required');
        $this->form_validation->set_rules('nama_alatbayar', 'Nama Alat Bayar', 'required');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
        $this->form_validation->set_rules('nomor_alatbayar', 'Nomor Alat Bayar', 'required');

        $get_name = $this->Alatbayarkurirmodel->get_nameimgalatbayar_by_id($id);
        $cek = $this->Alatbayarkurirmodel->cek_duplikat_alatbayar(strtolower($data['nama_alatbayar']));

        if ($cek == TRUE && $data['nama_alatbayar'] != $get_name[0]->nama_alatbayar) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Alat Bayar '$data[nama_alatbayar]' Telah Tersedia..."));
            redirect('alatbayarkurir/edit_alatbayar/' . $id);
        } else {

            if ($this->form_validation->run() == FALSE) {
                //
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('alatbayarkurir/edit_alatbayar/' . $id);
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['logo_instansi']['tmp_name'])) {

                    $this->delete_file($path_logo_temp); //delete existing file

                    $path = 'uploads/alatbayar/';
                    $path_thumb = 'uploads/alatbayar/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = 2048; //set without limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('logo_instansi')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['logo_instansi'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 600;
                        $img['weight'] = 600;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['logo_instansi_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('alatbayarkurir/edit_alatbayar/' . $id);
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('alatbayarkurir/edit_alatbayar/' . $id);
                    }
                }

                // print_r($data);exit;    
                $edit = $this->Alatbayarkurirmodel->update_alatbayar($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Alat Bayar '$data[nama_alatbayar]' Telah Terupdate.."));
                    redirect('alatbayarkurir/edit_alatbayar/' . $id);
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('alatbayarkurir/edit_alatbayar/' . $id);
                }
            }
        }
    }

    public function delete_alatbayar() {

        $id = $this->input->post('id');
        $data = $this->Alatbayarkurirmodel->get_nameimgalatbayar_by_id($id);
        $data_img = explode('/', $data[0]->logo_instansi);
        $name_img = $data_img[2];

        $delete = $this->Alatbayarkurirmodel->delete_alatbayar($id);
        if ($delete == true) {
            $this->delete_file($name_img);
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Alat Bayar '$data->nama_alatbayar' Telah Terhapus.."));
            redirect('alatbayarkurir/daftar_alatbayar_kurir');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('alatbayarkurir/daftar_alatbayar_kurir');
        }
    }

    public function delete_file($name = '') {
        $path = './uploads/alatbayar/';
        $path_thumb = './uploads/alatbayar/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //---------------------------------------------------------------------//
    //
    //-------------------------------API KURIR------------------------------//
    //

    public function update_api_pengiriman() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('base_url_api', 'Base Url API', 'required');
        $this->form_validation->set_rules('api_key', 'API Key', 'required');
        $this->form_validation->set_rules('id_provinsi', 'Provinsi Toko', 'required');
        $this->form_validation->set_rules('id_kabupaten', 'Kabupaten Toko', 'required');

        if (($data['id_kecamatan'] == '') or empty($data['id_kecamatan'])) {

            $data['type_alamat'] = 'city';
        } else {
            $data['type_alamat'] = 'subdistrict';
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('alatbayarkurir/daftar_alatbayar_kurir/');
        } else {

            $edit = $this->Alatbayarkurirmodel->update_api_kurir(2, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi API Pengiriman Telah Terupdate..."));
                redirect('alatbayarkurir/daftar_alatbayar_kurir/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('alatbayarkurir/daftar_alatbayar_kurir/');
            }
        }
    }

    public function get_kabupaten_esoftplay($province_id = '') {

        $kab = $this->esoftplay_api->kabupaten_api($province_id);
        $data = "<option>Pilih Kabupaten</option>";

        for ($i = 0; $i < count($kab); $i++) {
            $data .= "<option value='" . $kab[$i]['city_id'] . "'>" . $kab[$i]['city_name'] . " - [" . strtolower($kab[$i]['type']) . "]" . "</option>";
        }
        echo $data;
    }

    public function get_kecamatan_esoftplay($kabupaten_id = '') {

        $kec = $this->esoftplay_api->kecamatan_api($kabupaten_id);
        $data = "<option value=''>Pilih Kecamatan</option>";

        for ($i = 0; $i < count($kec); $i++) {
            $data .= "<option value='" . $kec[$i]['subdistrict_id'] . "'>" . $kec[$i]['subdistrict_name'] . "</option>";
        }
        echo $data;
    }

    public function get_kabupaten($province_id = '') {

        $kab = $this->kurir_api->kabupaten_api($province_id);
        $data = "<option>Pilih Kabupaten</option>";

        for ($i = 0; $i < count($kab); $i++) {
            $data .= "<option value='" . $kab[$i]['city_id'] . "'>" . $kab[$i]['city_name'] . " - [" . strtolower($kab[$i]['type']) . "]" . "</option>";
        }
        echo $data;
    }

    public function get_ongkir($tujuan = '', $berat = '', $kurir = '', $tipe_tujuan = '') {

        $ongkir = $this->esoftplay_api->get_ongkir_api($tujuan, $berat, $kurir, $tipe_tujuan);

        $data = "<option>Pilih Ongkir</option>";

        if (count($ongkir) == 0 or empty($ongkir)) {
            $data .= "<option value=''> Ongkir Tidak Tersedia</option>";
        }
        for ($i = 0; $i < count($ongkir); $i++) {
            $data .= "<option value='" . $ongkir[$i]['cost'][0]['value'] . "'>" . $ongkir[$i]['service'] . " - Rp." . $ongkir[$i]['cost'][0]['value'] . "</option>";
        }
        echo $data;
    }

}
