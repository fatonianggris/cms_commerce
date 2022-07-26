<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        $this->load->model('Laporanmodel');
    }

    public function daftar_laporan_penjualan() {
        $data[] = '';
        //$data['produk'] = $this->Laporanmodel->get_produk();
        //$data['count'] = $this->Laporanmodel->get_count();
        //$this->template->load('template_admin/template_admin', 'daftar_laporan_penjualan', $data);
        $this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function daftar_laporan_produk() {

        $data[] = '';
        //$data['produk'] = $this->Laporanmodel->get_produk();
        //$data['count'] = $this->Laporanmodel->get_count();
        //$this->template->load('template_admin/template_admin', 'daftar_laporan_produk', $data);
        $this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function detail_produk($id) {
        $data['home'] = $this->Produkmodel->get_by_id_home(1);
        $data['merek'] = $this->Produkmodel->get_merek();
        $data['kat'] = $this->Produkmodel->get_kat();
        $data['produk'] = $this->Produkmodel->get_produk_by_id($id);
        $cek = $this->Produkmodel->get_by_id_produk($id);
        if ($cek == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_landing_page/template_landing_page', 'detail_produk', $data);
        }
    }

    public function add_produk() {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $data['toko'] = $this->Produkmodel->get_toko();
        $data['kat'] = $this->Produkmodel->get_kat();
        $this->template->load('template_admin/template_admin', 'tambah_produk', $data);
    }

    public function get_produk($id = '') {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $data = array();
        $data['produk'] = $this->Produkmodel->get_by_id_produk($id); //?
        $data['kat'] = $this->Produkmodel->get_kat(); //?
        $data['toko'] = $this->Produkmodel->get_toko(); //?
        $cek = $this->Produkmodel->get_by_id_produk($id);
        if ($cek == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_admin/template_admin', 'edit_produk', $data);
        }
    }

    public function post_produk() {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('produk_toko', 'Produk dari Toko', 'required');
        $this->form_validation->set_rules('min_pembelian', 'Minimal Pembelian', 'required');
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('berat', 'Berat Barang', 'required');
        $this->form_validation->set_rules('kat_barang', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('rekomendasi', 'Rekomendasi Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required');
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
        $this->form_validation->set_rules('desc_barang', 'Deskripsi Barang', 'required');
        //print_r($param);exit;
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('produk/tambah_produk'); //folder, controller, method
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['img1'])) {

                $path = 'uploads/produk/';
                $path_thumb = 'uploads/produk/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img1')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['pic1'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 600;
                    $img['weight'] = 600;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb1'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('produk/tambah_produk');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('produk/tambah_produk');
                }
            }
            if (!empty($_FILES['img2'])) {

                $path = 'uploads/produk/';
                $path_thumb = 'uploads/produk/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img2')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['pic2'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 600;
                    $img['weight'] = 600;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb2'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('produk/tambah_produk');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('produk/tambah_produk');
                }
            }
            if (!empty($_FILES['img3'])) {

                $path = 'uploads/produk/';
                $path_thumb = 'uploads/produk/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img3')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['pic3'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 600;
                    $img['weight'] = 600;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb3'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('produk/tambah_produk');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('produk/tambah_produk');
                }
            }

            $input = $this->Produkmodel->insert_produk($data);
            if ($input == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data telah tersimpan..'));
                redirect('produk/tambah_produk');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('produk/tambah_produk');
            }
        }
    }

    public function edit_produk($id = '') {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $param = $this->input->post();

        $data = $this->security->xss_clean($param);
        $data['pic1'] = $data['image1'];
        $data['pic_thumb1'] = $data['image_thumb1'];

        $data['pic2'] = $data['image2'];
        $data['pic_thumb2'] = $data['image_thumb2'];

        $data['pic3'] = $data['image3'];
        $data['pic_thumb3'] = $data['image_thumb3'];

        $data_img_1 = explode('/', $data['image1']);
        $img_name_1 = $data_img_1[2];

        $data_img_2 = explode('/', $data['image2']);
        $img_name_2 = $data_img_2[2];

        $data_img_3 = explode('/', $data['image3']);
        $img_name_3 = $data_img_3[2];

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('produk_toko', 'Produk dari Toko', 'required');
        $this->form_validation->set_rules('min_pembelian', 'Minimal Pembelian', 'required');
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('berat', 'Berat Barang', 'required');
        $this->form_validation->set_rules('kat_barang', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('rekomendasi', 'Rekomendasi Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required');
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
        $this->form_validation->set_rules('desc_barang', 'Deskripsi Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            //
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('produk/get_produk/' . $id);
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image

            if (!empty($_FILES['img1']['tmp_name'])) {

                $this->delete_file($img_name_1); //delete existing file

                $path = 'uploads/produk/';
                $path_thumb = 'uploads/produk/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img1')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['pic1'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 100;
                    $img['weight'] = 100;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb1'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('produk/get_produk/' . $id);
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('produk/get_produk/' . $id);
                }
            }

            if (!empty($_FILES['img2']['tmp_name'])) {

                $this->delete_file($img_name_2); //delete existing file

                $path = 'uploads/produk/';
                $path_thumb = 'uploads/produk/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img2')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['pic2'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 100;
                    $img['weight'] = 100;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb2'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('produk/get_produk/' . $id);
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('produk/get_produk/' . $id);
                }
            }

            if (!empty($_FILES['img3']['tmp_name'])) {

                $this->delete_file($img_name_3); //delete existing file

                $path = 'uploads/produk/';
                $path_thumb = 'uploads/produk/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('img3')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['pic3'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 100;
                    $img['weight'] = 100;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['pic_thumb3'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('produk/get_produk/' . $id);
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('produk/get_produk/' . $id);
                }
            }
            // print_r($data);exit;    
            $edit = $this->Produkmodel->update_produk($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data Telah Tersimpan..'));
                redirect('produk/get_produk/' . $id);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('produk/get_produk/' . $id);
            }
        }
    }

    public function delete_produk() {
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $id = $this->input->post('id');
        $data = $this->Produkmodel->get_img_by_id_produk($id);
        $data_img1 = explode('/', $data[0]->gambar);
        $name_img1 = $data_img1[2];
        $data_img2 = explode('/', $data[0]->gambar_1);
        $name_img2 = $data_img2[2];
        $data_img3 = explode('/', $data[0]->gambar_2);
        $name_img3 = $data_img3[2];
        $delete = $this->Produkmodel->delete_produk($id);
        if ($delete == true) {
            $this->delete_file($name_img1);
            $this->delete_file($name_img2);
            $this->delete_file($name_img3);
            echo '1|' . succ_msg('Berhasil, Data Telah Terhapus..');
        } else {
            echo '0|' . err_msg('Maaf, Terjadi kesalahan, Coba lagi....');
        }
    }

    public function delete_file($name = '') {
        $path = './uploads/produk/';
        $path_thumb = './uploads/produk/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

}
