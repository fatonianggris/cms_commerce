<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategorimerek extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        // Load Library
        $this->load->model('Kategorimerekmodel');
        $this->load->library('form_validation');
    }

    //--------------------------GENERAL----------------------------//

    public function daftar_kategori_merek() {

        $data['kategori'] = $this->Kategorimerekmodel->get_kategori();
        $data['merek'] = $this->Kategorimerekmodel->get_merek();
        $data['jumlah'] = $this->Kategorimerekmodel->get_jumlah_item();

        $this->template->load('template_admin/template_admin', 'daftar_kategorimerek', $data);
    }

    //---------------------------------------------------------------//
    //
    //--------------------------KATEGORI----------------------------//
    public function get_struktur_kategori() {
        $data = [];
        $parent_key = '0';
        $row = $this->db->select('id_kategori as id,nama_kategori as name,id_level as parent_id')->from('kategori')->get();

        if ($row->num_rows() > 0) {
            $data = $this->membersTree($parent_key);
        } else {
            $data = ["id" => "0", "name" => "No Members presnt in list", "text" => "No Members is presnt in list", "nodes" => []];
        }

        echo json_encode(array_values($data));
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function membersTree($parent_key) {
        $row1 = [];
        $row = $this->Kategorimerekmodel->get_struktur_kategori($parent_key);

        foreach ($row as $key => $value) {
            $row1[$key]['id'] = $value['id_kategori'];
            $row1[$key]['name'] = ucwords($value['nama_kategori']);
            $row1[$key]['text'] = ucwords($value['nama_kategori']);
            $row1[$key]['nodes'] = array_values($this->membersTree($value['id_kategori']));
        }

        return $row1;
    }

    public function post_kategori() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        $data['tipe_kategori'] = '1';
        $data['id_level'] = '0';

        $data['url_slug'] = create_slug($data['nama_kategori'], 'dash');

        $cek = $this->Kategorimerekmodel->cek_duplikat_kategori(strtolower($data['nama_kategori']));

        if ($cek == TRUE) {
            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Kategori '$data[nama_kategori]' Telah Tersedia..."));
            redirect('kategorimerek/daftar_kategori_merek');
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('kategorimerek/daftar_kategori_merek'); //folder, controller, method
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['gambar_kategori'])) {

                    $path = 'uploads/kategori/';
                    $path_thumb = 'uploads/kategori/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg|ico';
                    $config['max_size'] = 2048; //set limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('gambar_kategori')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['gambar_kategori'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 600;
                        $img['weight'] = 600;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['gambar_kategori_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('kategorimerek/daftar_kategori_merek');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('kategorimerek/daftar_kategori_merek');
                    }
                }
                $input = $this->Kategorimerekmodel->insert_kategori($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kategori '$data[nama_kategori]' Telah Tersimpan.."));
                    redirect('kategorimerek/daftar_kategori_merek');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('kategorimerek/daftar_kategori_merek');
                }
            }
        }
    }

    public function post_sub_kategori() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('id_level', 'Kategori Utama', 'required');

        $data['tipe_kategori'] = '2';

        $data['url_slug'] = create_slug($data['nama_kategori'], 'dash');

        $cek = $this->Kategorimerekmodel->cek_duplikat_kategori(strtolower($data['nama_kategori']));

        if ($cek == TRUE) {
            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Kategori '$data[nama_kategori]' Telah Tersedia..."));
            redirect('kategorimerek/daftar_kategori_merek');
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('kategorimerek/daftar_kategori_merek'); //folder, controller, method
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['gambar_kategori'])) {

                    $path = 'uploads/kategori/';
                    $path_thumb = 'uploads/kategori/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg|ico';
                    $config['max_size'] = 2048; //set limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('gambar_kategori')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['gambar_kategori'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 600;
                        $img['weight'] = 600;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['gambar_kategori_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('kategorimerek/daftar_kategori_merek');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('kategorimerek/daftar_kategori_merek');
                    }
                }
                $input = $this->Kategorimerekmodel->insert_kategori($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kategori '$data[nama_kategori]' Telah Tersimpan.."));
                    redirect('kategorimerek/daftar_kategori_merek');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('kategorimerek/daftar_kategori_merek');
                }
            }
        }
    }

    public function update_kategori($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['tipe_kategori'] = '1';
        $data['id_level'] = '0';

        $data['gambar_kategori'] = $data['gambar_temp'];
        $data['gambar_kategori_thumb'] = $data['gambar_temp_thumb'];

        $get_gambar_temp = explode('/', $data['gambar_temp']);
        $path_gambar_temp = $get_gambar_temp[2];

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        $data['url_slug'] = create_slug($data['nama_kategori'], 'dash');

        $get_name = $this->Kategorimerekmodel->get_nameimgkategori_by_id($id);
        $cek = $this->Kategorimerekmodel->cek_duplikat_kategori(strtolower($data['nama_kategori']));

        if ($cek == TRUE && $data['nama_kategori'] != $get_name[0]->nama_kategori) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Kategori '$data[nama_kategori]' Telah Tersedia..."));
            redirect('kategorimerek/daftar_kategori_merek');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('kategorimerek/daftar_kategori_merek');
            } else {

                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['gambar_kategori']['tmp_name'])) {

                    $this->delete_kategori_file($path_gambar_temp); //delete existing file

                    $path = 'uploads/kategori/';
                    $path_thumb = 'uploads/kategori/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = 2048; //set without limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('gambar_kategori')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['gambar_kategori'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 600;
                        $img['height'] = 600;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['gambar_kategori_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('kategorimerek/daftar_kategori_merek');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('kategorimerek/daftar_kategori_merek');
                    }
                }
                // print_r($data);exit;    
                $edit = $this->Kategorimerekmodel->update_kategori($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kategori '$data[nama_kategori]' Telah Terupdate.."));
                    redirect('kategorimerek/daftar_kategori_merek');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('kategorimerek/daftar_kategori_merek');
                }
            }
        }
    }

    public function update_sub_kategori($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['tipe_kategori'] = '2';

        $data['gambar_kategori'] = $data['gambar_temp'];
        $data['gambar_kategori_thumb'] = $data['gambar_temp_thumb'];

        $get_gambar_temp = explode('/', $data['gambar_temp']);
        $path_gambar_temp = $get_gambar_temp[2];

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        $data['url_slug'] = create_slug($data['nama_kategori'], 'dash');

        $get_name = $this->Kategorimerekmodel->get_nameimgkategori_by_id($id);
        $cek = $this->Kategorimerekmodel->cek_duplikat_kategori(strtolower($data['nama_kategori']));

        if ($cek == TRUE && $data['nama_kategori'] != $get_name[0]->nama_kategori) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Kategori '$data[nama_kategori]' Telah Tersedia..."));
            redirect('kategorimerek/daftar_kategori_merek');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('kategorimerek/daftar_kategori_merek');
            } else {

                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['gambar_kategori']['tmp_name'])) {

                    $this->delete_kategori_file($path_gambar_temp); //delete existing file

                    $path = 'uploads/kategori/';
                    $path_thumb = 'uploads/kategori/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = 2048; //set without limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('gambar_kategori')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['gambar_kategori'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 600;
                        $img['height'] = 600;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['gambar_kategori_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('kategorimerek/daftar_kategori_merek');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('kategorimerek/daftar_kategori_merek');
                    }
                }
                // print_r($data);exit;    
                $edit = $this->Kategorimerekmodel->update_kategori($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kategori '$data[nama_kategori]' Telah Terupdate.."));
                    redirect('kategorimerek/daftar_kategori_merek');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('kategorimerek/daftar_kategori_merek');
                }
            }
        }
    }

    public function delete_kategori() {

        $id = $this->input->post('id');
        $data = $this->Kategorimerekmodel->get_nameimgkategori_by_id($id);

        $data_img = explode('/', $data[0]->gambar_kategori);
        $name_img = $data_img[2];

        $delete = $this->Kategorimerekmodel->delete_kategori($id);

        if ($delete == true) {
            $this->delete_kategori_file($name_img);
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kategori '$data->nama_kategori' Telah Terhapus.."));
            redirect('kategorimerek/daftar_kategori_merek');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kategorimerek/daftar_kategori_merek');
        }
    }

    public function delete_kategori_file($name = '') {
        $path = './uploads/kategori/';
        $path_thumb = './uploads/kategori/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //---------------------------------------------------------------//
    //
    //----------------------------TAG-------------------------------//

    public function post_merek() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_merek', 'Nama Merek', 'required');

        $data['url_slug'] = create_slug($data['nama_merek'], 'dash');

        $cek = $this->Kategorimerekmodel->cek_duplikat_merek(strtolower($data['nama_merek']));
        if ($cek == TRUE) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Merek '$data[nama_merek]' Telah Tersedia..."));
            redirect('kategorimerek/daftar_kategori_merek');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('kategorimerek/daftar_kategori_merek'); //folder, controller, method
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['logo_merek'])) {

                    $path = 'uploads/merek/';
                    $path_thumb = 'uploads/merek/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 2048; //set limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('logo_merek')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['logo_merek'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 250;
                        $img['weight'] = 250;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['logo_merek_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('kategorimerek/daftar_kategori_merek');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('kategorimerek/daftar_kategori_merek');
                    }
                }
                $input = $this->Kategorimerekmodel->insert_merek($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Merek '$data[nama_merek]' Telah Tersimpan.."));
                    redirect('kategorimerek/daftar_kategori_merek');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('kategorimerek/daftar_kategori_merek');
                }
            }
        }
    }

    public function update_merek($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['logo_merek'] = $data['logo_temp'];
        $data['logo_merek_thumb'] = $data['logo_temp_thumb'];

        $get_logo_temp = explode('/', $data['logo_temp']);
        $path_logo_temp = $get_logo_temp[2];

        $this->form_validation->set_rules('nama_merek', 'Nama Merek', 'required');

        $data['url_slug'] = create_slug($data['nama_merek'], 'dash');

        $get_name = $this->Kategorimerekmodel->get_nameimgmerek_by_id($id);
        $cek = $this->Kategorimerekmodel->cek_duplikat_kategori(strtolower($data['nama_kategori']));

        if ($cek == TRUE && $data['nama_merek'] != $get_name[0]->nama_merek) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Merek '$data[nama_merek]' Telah Tersedia..."));
            redirect('kategorimerek/daftar_kategori_merek');
        } else {

            if ($this->form_validation->run() == FALSE) {
                //
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('kategorimerek/daftar_kategori_merek');
            } else {
                $this->load->library('upload'); //load library upload file
                $this->load->library('image_lib'); //load library image

                if (!empty($_FILES['logo_merek']['tmp_name'])) {

                    $this->delete_merek_file($path_logo_temp); //delete existing file

                    $path = 'uploads/merek/';
                    $path_thumb = 'uploads/merek/thumbs/';
                    //config upload file
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = 1048; //set without limit
                    $config['overwrite'] = FALSE; //if have same name, add number
                    $config['remove_spaces'] = TRUE; //change space into _
                    $config['encrypt_name'] = TRUE;
                    //initialize config upload
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('logo_merek')) {//if success upload data
                        $result['upload'] = $this->upload->data();
                        $name = $result['upload']['file_name'];
                        $data['logo_merek'] = $path . $name;

                        $img['image_library'] = 'gd2';
                        $img['source_image'] = $path . $name;
                        $img['new_image'] = $path_thumb . $name;
                        $img['maintain_ratio'] = true;
                        $img['width'] = 250;
                        $img['weight'] = 250;

                        $this->image_lib->initialize($img);
                        if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                            $data['logo_merek_thumb'] = $path_thumb . $name;
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                            redirect('kategorimerek/daftar_kategori_merek');
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                        redirect('kategorimerek/daftar_kategori_merek');
                    }
                }
                // print_r($data);exit;    
                $edit = $this->Kategorimerekmodel->update_merek($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Merek '$data[nama_merek]' Telah Terupdate.."));
                    redirect('kategorimerek/daftar_kategori_merek');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('kategorimerek/daftar_kategori_merek');
                }
            }
        }
    }

    public function delete_merek() {
        $id = $this->input->post('id');
        $data = $this->Kategorimerekmodel->get_nameimgmerek_by_id($id);
        $data_img = explode('/', $data[0]->logo_merek);
        $name_img = $data_img[2];

        $delete = $this->Kategorimerekmodel->delete_merek($id);
        if ($delete == true) {
            $this->delete_merek_file($name_img);
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Merek '$data->nama_merek' Telah Terhapus.."));
            redirect('kategorimerek/daftar_kategori_merek');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kategorimerek/daftar_kategori_merek');
        }
    }

    public function delete_merek_file($name = '') {
        $path = './uploads/merek/';
        $path_thumb = './uploads/merek/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //---------------------------------------------------------------//
//
}
