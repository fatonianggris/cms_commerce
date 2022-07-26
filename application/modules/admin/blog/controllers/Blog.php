<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        $this->load->model('Blogmodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------BLOG--------------------------------//
    //
    public function daftar_blog() {

        $data['blog'] = $this->Blogmodel->get_blog();
        $data['jumlah_blog'] = $this->Blogmodel->get_jumlah_blog();
        //$this->template->load('template_admin/template_admin', 'daftar_blog', $data);
        $this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function edit_blog($id = '') {

        $data['blog'] = $this->Blogmodel->get_by_id_blog($id); //?
        $cek = $this->Blogmodel->get_by_id_blog($id);

        if ($cek == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_admin/template_admin', 'edit_blog', $data);
        }
    }

    public function add_blog() {

        $data['title'] = "Tambah Blog";
        //$this->template->load('template_admin/template_admin', 'tambah_blog', $data);
        $this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function post_blog() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tag', 'Tag', 'required');
        $this->form_validation->set_rules('highlight', 'Highlight', 'required');
        $this->form_validation->set_rules('isi_blog', 'Isi Blog', 'required');

        $data['url_slug'] = create_slug($data['judul'], 'dash');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('blog/add_blog'); //folder, controller, method
        } else {

            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img'])) {

                $path = 'uploads/blog/';
                $path_thumb = 'uploads/blog/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['pic'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 870;
                    $img['weight'] = 460;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('blog/add_blog');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('blog/add_blog');
                }
            }

            $input = $this->Blogmodel->insert_blog($data);
            if ($input == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Blog '$data[judul_blog]' Telah Tersimpan..."));
                redirect('blog/add_blog');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('blog/add_blog');
            }
        }
    }

    public function update_blog($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['pic'] = $data['image'];
        $data['pic_thumb'] = $data['image_thumb'];

        $data_img = explode('/', $data['image']);
        $img_name = $data_img[2];

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tag', 'Tag', 'required');
        $this->form_validation->set_rules('highlight', 'Highlight', 'required');
        $this->form_validation->set_rules('isi_blog', 'Isi Blog', 'required');

        $data['url_slug'] = create_slug($data['judul'], 'dash');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('blog/edit_blog/' . $id);
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img']['tmp_name'])) {

                $this->delete_file($img_name); //delete existing file

                $path = 'uploads/blog/';
                $path_thumb = 'uploads/blog/thumbs/';
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img')) {
                    $name = $result['upload']['file_name'];
                    $data['pic'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 100;
                    $img['weight'] = 100;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('blog/edit_blog/' . $id);
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('blog/edit_blog/' . $id);
                }
            }
            // print_r($data);exit;    
            $edit = $this->Blogmodel->update_blog($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Blog '$data[judul_blog]' Telah Terupdate..."));
                redirect('blog/edit_blog/' . $id);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('blog/edit_blog/' . $id);
            }
        }
    }

    public function delete_blog() {
        $id = $this->input->post('id');
        $data = $this->Blogmodel->get_nameimgblog_by($id);

        $data_img = explode('/', $data[0]->gambar);
        $name_img = $data_img[2];
        $delete = $this->Blogmodel->delete_blog($id);

        if ($delete == true) {
            $this->delete_file($name_img);
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Blog '$data->judul_blog' Telah Terhapus.."));
            redirect('daftar_blog/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('daftar_blog/');
        }
    }

    public function delete_file($name = '') {
        $path = './uploads/blog/';
        $path_thumb = './uploads/blog/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //-----------------------------------------------------------------------//
}
