<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
        $this->load->model('Produkmodel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------PRODUK------------------------------//
    //
    
    public function daftar_produk() {
        $data['produk'] = $this->Produkmodel->get_produk();
        $data['jumlah'] = $this->Produkmodel->get_jumlah();
        $this->template->load('template_admin/template_admin', 'daftar_produk', $data);
    }

    public function detail_produk($id = '') {
        $token = $this->Produkmodel->get_tokenproduk_by_id($id);

        $data['warna'] = $this->Produkmodel->get_warna();
        $data['size'] = $this->Produkmodel->get_size();
        $data['foto_produk'] = $this->Produkmodel->get_imgproduk_by_id($token[0]->token);
        $data['detail_produk'] = $this->Produkmodel->get_detail_produk($id);

        $this->template->load('template_admin/template_admin', 'detail_produk', $data);
    }

    public function add_produk() {

        $data['warna'] = $this->Produkmodel->get_warna();
        $data['size'] = $this->Produkmodel->get_size();
        $data['kategori'] = $this->Produkmodel->get_kategori();
        $data['merek'] = $this->Produkmodel->get_merek();
        $data['voucher'] = $this->Produkmodel->get_voucher();
        $this->template->load('template_admin/template_admin', 'tambah_produk', $data);
    }

    public function edit_produk($id = '') {

        $data['warna'] = $this->Produkmodel->get_warna();
        $data['size'] = $this->Produkmodel->get_size();
        $data['kategori'] = $this->Produkmodel->get_kategori();
        $data['merek'] = $this->Produkmodel->get_merek();
        $data['voucher'] = $this->Produkmodel->get_voucher();

        $data['edit_produk'] = $this->Produkmodel->get_detail_produk($id); //?
        $cek = $this->Produkmodel->get_by_id_produk($id);

        if ($cek == FALSE or empty($id)) {
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template_admin/template_admin', 'edit_produk', $data);
        }
    }

    public function post_produk() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('sku_produk', 'SKU Produk', 'required');
        $this->form_validation->set_rules('bahan_produk', 'Bahan Produk', 'required');
        $this->form_validation->set_rules('minimal_pembelian', 'Minimal Pembelian', 'required');
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
        $this->form_validation->set_rules('berat_barang', 'Berat Barang', 'required');
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi Produk', 'required');
        $this->form_validation->set_rules('merek_barang', 'Merek Barang', 'required');
        $this->form_validation->set_rules('asal_produk', 'Asal Barang', 'required');
        $this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('voucher', 'Voucher', 'required');
        $this->form_validation->set_rules('ukuran_barang[]', 'Ukuran Barang', 'required');
        $this->form_validation->set_rules('warna_barang[]', 'Stok Barang', 'required');
//
//        $max_id = $this->Produkmodel->get_max_idproduk();
//
//        $sku = $data['sku_produk'];
//
//        if ($max_id == TRUE) {
//            $data['sku_produk'] = $sku . "-" . $max_id[0]->max_id;
//        } else {
//            $data['sku_produk'] = $sku . "-1";
//        }
//
//        $data['id'] = $max_id[0]->max_id + 1;

        $size = $data['ukuran_barang'];
        $data['ukuran_barang'] = implode(",", $size);

        $warna = $data['warna_barang'];
        $data['warna_barang'] = implode(",", $warna);

        $data['url_slug'] = create_slug($data['nama_produk'], 'dash');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('produk/add_produk'); //folder, controller, method
        } else {

            $input = $this->Produkmodel->insert_produk($data);
            if ($input == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Produk '$data[nama_produk]' telah tersimpan.."));
                redirect('produk/add_produk');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('produk/add_produk');
            }
        }
    }

    public function update_produk($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('sku_produk', 'SKU Produk', 'required');
        $this->form_validation->set_rules('bahan_produk', 'Bahan Produk', 'required');
        $this->form_validation->set_rules('minimal_pembelian', 'Minimal Pembelian', 'required');
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
        $this->form_validation->set_rules('berat_barang', 'Berat Barang', 'required');
        $this->form_validation->set_rules('kondisi_barang', 'Kondisi Produk', 'required');
        $this->form_validation->set_rules('merek_barang', 'Merek Barang', 'required');
        $this->form_validation->set_rules('asal_produk', 'Asal Barang', 'required');
        $this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');
        $this->form_validation->set_rules('voucher', 'Voucher', 'required');
        $this->form_validation->set_rules('ukuran_barang[]', 'Ukuran Barang', 'required');
        $this->form_validation->set_rules('warna_barang[]', 'Stok Barang', 'required');

        $size = $data['ukuran_barang'];
        $data['ukuran_barang'] = implode(",", $size);

        $warna = $data['warna_barang'];
        $data['warna_barang'] = implode(",", $warna);

        $data['url_slug'] = create_slug($data['nama_produk'], 'dash');

        if ($this->form_validation->run() == FALSE) {
            //
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('produk/edit_produk/' . $id);
        } else {
            // print_r($data);exit;    
            $edit = $this->Produkmodel->update_produk($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Produk '$data[nama_produk]' Telah Terupdate.."));
                redirect('produk/edit_produk/' . $id);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('produk/edit_produk/' . $id);
            }
        }
    }

    public function delete_produk() {

        $id = $this->input->post('id');
        $token = $this->Produkmodel->get_tokenproduk_by_id($id);
        $data = $this->Produkmodel->get_imgproduk_by_id($token[0]->token);
        $delete_item = $this->Produkmodel->delete_produk($id);
        $delete_gambar = $this->Produkmodel->delete_gambar($token[0]->token);

        if ($delete_item == true && $delete_gambar == true) {
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $data_img = explode('/', $value->gambar_produk);
                    $name_img = $data_img[2];
                    $this->delete_file($name_img);
                }
            }

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Produk '$data->nama_produk' Telah Terhapus.."));
            redirect('produk/daftar_produk/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('produk/daftar_produk/');
        }
    }

    public function edit_status_rekomendasi() {

        $id = $this->input->post('id');
        $val = $this->input->post('value');
        $change = $this->Produkmodel->update_status_rekomendasi($id, $val);

        if ($change == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Produk Telah Terupdate.."));
            redirect('produk/daftar_produk/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('produk/daftar_produk/');
        }
    }

    public function edit_status_promo() {

        $id = $this->input->post('id');
        $val = $this->input->post('value');
        $potong = $this->input->post('potongan');
        $harga = $this->input->post('harga_promo');
        $change = $this->Produkmodel->update_status_promo($id, $val, $potong, $harga);

        if ($change == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Produk Telah Terupdate.."));
            redirect('produk/daftar_produk/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('produk/daftar_produk/');
        }
    }

    public function delete_file($name = '') {
        $path = './uploads/produk/';
        $path_thumb = './uploads/produk/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //--------------------------------------------------------------//
    //---------------------------DROPZONE-----------------------------------//

    public function upload() {

        $token = $this->input->post('token');

        $this->load->library('upload'); //load library upload file
        $this->load->library('image_lib'); //load library image

        $img_source = '';
        $img_thumb = '';

        if (!empty($_FILES['file'])) {

            $path = 'uploads/produk/';
            $path_thumb = 'uploads/produk/thumbs/';
            //config upload file
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png|jpeg|ico';
            $config['max_size'] = 2048; //set without limit
            $config['overwrite'] = FALSE; //if have same name, add number
            $config['remove_spaces'] = TRUE; //change space into _
            $config['encrypt_name'] = TRUE;
            //initialize config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload("file")) {
                $result['upload'] = $this->upload->data();
                $name = $result['upload']['file_name'];
                $img_source = $path . $name;

                $img['image_library'] = 'gd2';
                $img['source_image'] = $path . $name;
                $img['new_image'] = $path_thumb . $name;
                $img['maintain_ratio'] = true;
                $img['width'] = 600;
                $img['weight'] = 600;

                $this->image_lib->initialize($img);
                if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                    $img_thumb = $path_thumb . $name;
                } else {
                    echo $this->image_lib->display_errors();
                }
                $this->db->insert('gambar', array('gambar_produk' => $img_source, 'gambar_produk_thumb' => $img_thumb, 'token' => $token));
            } else {
                echo "failed to upload file(s)";
            }
        }
    }

    public function remove() {
        $nama = $this->input->post("file");
        $img_thumb = 'uploads/produk/thumbs/' . $nama;
        $gambar = $this->db->get_where('gambar', array('gambar_produk_thumb' => $img_thumb));
        if ($gambar->num_rows() > 0) {
            $hasil = $gambar->row();
            $nama_gambar = $hasil->gambar_produk;
            $nama_gambar_thumb = $hasil->gambar_produk_thumb;
            if (file_exists($nama_gambar)) {
                unlink($nama_gambar);
                unlink($nama_gambar_thumb);
            }
            $this->db->delete('gambar', array('gambar_produk_thumb' => $img_thumb));
        }
    }

    public function list_files($token = '') {

        $gambar = $this->db->get_where('gambar', array('token' => $token));
        // we need name and size for dropzone mockfile
        $value = array();
        foreach ($gambar->result() as $val) {
            $data_img = explode('/', $val->gambar_produk_thumb);
            $value[] = array(
                'name' => $data_img[3],
                'size' => filesize($val->gambar_produk_thumb)
            );
        }
        header("Content-type: text/json");
        header("Content-type: application/json");
        echo json_encode($value);
    }

    //----------------------------------------------------------------------//
}
