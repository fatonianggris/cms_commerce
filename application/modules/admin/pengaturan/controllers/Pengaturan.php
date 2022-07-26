<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
//        if ($this->session->userdata('signapps') == FALSE) {
//            redirect('auth');
//        } 
        $this->load->model('Pengaturanmodel');
        $this->load->library('form_validation');
    }

    public function index() {

        $data['user'] = $this->Pengaturanmodel->get_user();
        $data['kat'] = $this->Pengaturanmodel->get_kat();
        $data['banner'] = $this->Pengaturanmodel->get_banner();
        $data['count'] = $this->Pengaturanmodel->get_count();
        $this->template->load('template_admin/template_admin', 'pengaturan', $data);
    }

    public function tambah_user() {


        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_user', 'Nama User Admin', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor HP/Telp', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|matches[cf_passwd]');
        $this->form_validation->set_rules('cf_passwd', 'Password Konfirmasi', 'required|min_length[4]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/'); //folder, controller, method
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img'])) {

                $path = 'uploads/user/';
                $path_thumb = 'uploads/user/thumbs/';
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
                    $img['width'] = 100;
                    $img['weight'] = 100;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/');
                }
            }

            $input = $this->Pengaturanmodel->insert_user($data);
            if ($input == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data telah tersimpan..'));
                redirect('pengaturan/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/');
            }
        }
    }

    public function tambah_kategori() {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kat', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/'); //folder, controller, method
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img'])) {

                $path = 'uploads/icon/';
                $path_thumb = 'uploads/icon/thumbs/';
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
                    $img['width'] = 100;
                    $img['weight'] = 100;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/');
                }
            }

            $input = $this->Pengaturanmodel->insert_kategori($data);
            if ($input == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data telah tersimpan..'));
                redirect('pengaturan/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/');
            }
        }
    }

    public function tambah_banner() {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_header', 'Nama Header', 'required');
        $this->form_validation->set_rules('nama_tombol', 'Nama Tombol', 'required');
        $this->form_validation->set_rules('konten', 'Isi Konten', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/'); //folder, controller, method
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img'])) {

                $path = 'uploads/banner/';
                $path_thumb = 'uploads/banner/thumbs/';
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
                    $img['width'] = 1920;
                    $img['weight'] = 466;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/');
                }
            }

            $input = $this->Pengaturanmodel->insert_banner($data);
            if ($input == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data telah tersimpan..'));
                redirect('pengaturan/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/');
            }
        }
    }

    public function edit_kat($id = '') {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $param = $this->input->post();

        $data = $this->security->xss_clean($param);
        $data['pic'] = $data['image'];
        $data['pic_thumb'] = $data['image_thumb'];

        $data_img = explode('/', $data['image']);
        $img_name = $data_img[2];

        $this->form_validation->set_rules('nama_kat', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            //
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/');
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img']['tmp_name'])) {

                $this->delete_file_kat($img_name); //delete existing file

                $path = 'uploads/icon/';
                $path_thumb = 'uploads/icon/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
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
                    $img['width'] = 100;
                    $img['weight'] = 100;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/');
                }
            }
            // print_r($data);exit;    
            $edit = $this->Pengaturanmodel->update_kat($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data Telah Tersimpan..'));
                redirect('pengaturan/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/');
            }
        }
    }

    public function edit_banner($id = '') {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $param = $this->input->post();

        $data = $this->security->xss_clean($param);
        $data['pic'] = $data['image'];
        $data['pic_thumb'] = $data['image_thumb'];

        $data_img = explode('/', $data['image']);
        $img_name = $data_img[2];

        $this->form_validation->set_rules('nama_header', 'Nama Header', 'required');
        $this->form_validation->set_rules('nama_tombol', 'Nama Tombol', 'required');
        $this->form_validation->set_rules('konten', 'Isi Konten', 'required');

        if ($this->form_validation->run() == FALSE) {
            //
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/');
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img']['tmp_name'])) {

                $this->delete_file_ban($img_name); //delete existing file

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

                if ($this->upload->do_upload('img')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['pic'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 1920;
                    $img['weight'] = 466;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/');
                }
            }
            // print_r($data);exit;    
            $edit = $this->Pengaturanmodel->update_banner($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data Telah Tersimpan..'));
                redirect('pengaturan/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/');
            }
        }
    }

    public function edit_user($id = '') {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $param = $this->input->post();

        $data = $this->security->xss_clean($param);
        $data['pic'] = $data['image'];
        $data['pic_thumb'] = $data['image_thumb'];

        $data_img = explode('/', $data['image']);
        $img_name = $data_img[2];

        $this->form_validation->set_rules('nama_user', 'Nama User Admin', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor HP/Telp', 'required');

        if ($this->form_validation->run() == FALSE) {
            //
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/');
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img']['tmp_name'])) {

                $this->delete_file_user($img_name); //delete existing file

                $path = 'uploads/user/';
                $path_thumb = 'uploads/user/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
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
                    $img['width'] = 100;
                    $img['weight'] = 100;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/');
                }
            }
            // print_r($data);exit;    
            $edit = $this->Pengaturanmodel->update_user($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data Telah Tersimpan..'));
                redirect('pengaturan/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('pengaturan/');
            }
        }
    }

    public function delete_user() {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $id = $this->input->post('id');
        $data = $this->Pengaturanmodel->get_img_by_id_user($id);
        $data_img = explode('/', $data[0]->foto);
        $name_img = $data_img[2];
        $delete = $this->Pengaturanmodel->delete_user($id);
        if ($delete == true) {
            $this->delete_file_user($name_img);
            echo '1|' . succ_msg('Berhasil, Data Telah Terhapus..');
        } else {
            echo '0|' . err_msg('Maaf, Terjadi kesalahan, Coba lagi....');
        }
    }

    public function delete_banner() {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $id = $this->input->post('id');
        $data = $this->Pengaturanmodel->get_img_by_id_banner($id);
        $data_img = explode('/', $data[0]->foto);
        $name_img = $data_img[2];
        $delete = $this->Pengaturanmodel->delete_banner($id);
        if ($delete == true) {
            $this->delete_file_ban($name_img);
            echo '1|' . succ_msg('Berhasil, Data Telah Terhapus..');
        } else {
            echo '0|' . err_msg('Maaf, Terjadi kesalahan, Coba lagi....');
        }
    }

    public function delete_kat() {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $id = $this->input->post('id');
        $data = $this->Pengaturanmodel->get_img_by_id_kat($id);
        $data_img = explode('/', $data[0]->icon);
        $name_img = $data_img[2];
        $delete = $this->Pengaturanmodel->delete_kat($id);
        if ($delete == true) {
            $this->delete_file_ban($name_img);
            echo '1|' . succ_msg('Berhasil, Data Telah Terhapus..');
        } else {
            echo '0|' . err_msg('Maaf, Terjadi kesalahan, Coba lagi....');
        }
    }

    public function delete_file_kat($name = '') {
        $path = './uploads/icon/';
        $path_thumb = './uploads/icon/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    public function delete_file_ban($name = '') {
        $path = './uploads/banner/';
        $path_thumb = './uploads/banner/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    public function delete_file_user($name = '') {
        $path = './uploads/user/';
        $path_thumb = './uploads/user/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

}
