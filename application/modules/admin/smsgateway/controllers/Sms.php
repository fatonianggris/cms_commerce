<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        $this->load->model('Smsmodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------SMS GATEWAY PAGE--------------------------------//
    //
   
    public function index() {

        $data['sms'] = $this->Smsmodel->get_by_id_sms(1);
        $data['jumlah'] = $this->Smsmodel->get_jumlah(1);
        $data['pesan'] = $this->Smsmodel->get_template_pesan();
        $this->template->load('template_admin/template_admin', 'sms_page', $data);
    }

    public function update_sms() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['file_apk'] = $data['file_apk_temp'];

        $get_apk_temp = explode('/', $data['file_apk_temp']);
        $path_apk_temp = $get_apk_temp[2];

        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('sms_token', 'SMS Token', 'required');
        $this->form_validation->set_rules('device_id', 'Device ID', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('smsgateway/sms/');
        } else {
            $this->load->library('upload'); //load library upload file

            if (!empty($_FILES['file_apk']['tmp_name'])) {

                $this->delete_apk_file($path_apk_temp); //delete existing file

                $path = 'uploads/apk/';

                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'apk';
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file_apk')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['file_apk'] = $path . $name;
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('smsgateway/sms/');
                }
            }
            // print_r($data);exit;    
            $edit = $this->Smsmodel->update_sms_config(1, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi SMS Gateway Telah Terupdate..."));
                redirect('smsgateway/sms/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('smsgateway/sms/');
            }
        }
    }

    public function delete_apk_file($name = '') {
        $path = './uploads/apk/';
        @unlink($path . $name);
    }

    public function test_sms_pembayaran() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $subjek = "ABANG21.COM - TESTING SMS PEMBAYARAN";
        $pesan = "ini pembayaran lho"; // Ambil isi file content.php dan masukan ke variabel $content

        $sendsms = array(
            'no_hp' => $data['no_hp'],
            'pesan' => $subjek . "\n" . $pesan,
        );

        $send = $this->sms_gateway->send_sms($sendsms); // Panggil fungsi send yang ada di librari sms

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, SMS Testing Pembayaran Telah Dikirimkan Ke '$data[no_hp]'..."));
            redirect('smsgateway/sms/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('smsgateway/sms/');
        }
    }

    public function test_sms_pengiriman_konfirmasi() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $subjek = "ABANG21.COM - TESTING SMS PENGIRIMAN & KONFIRMASI";
        $pesan = "ini pengiriman & konfirmasi lho"; // Ambil isi file content.php dan masukan ke variabel $content

        $sendsms = array(
            'no_hp' => $data['no_hp'],
            'pesan' => $subjek . "\n" . $pesan,
        );

        $send = $this->sms_gateway->send_sms($sendsms); // Panggil fungsi send yang ada di librari sms

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, SMS Testing Pengiriman & Konfirmas Telah Dikirimkan Ke '$data[no_hp]'..."));
            redirect('smsgateway/sms/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('smsgateway/sms/');
        }
    }

    public function test_sms_pesanan() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $subjek = "ABANG21.COM - TESTING SMS PESANAN";
        $pesan = "ini pesanan lho"; // Ambil isi file content.php dan masukan ke variabel $content

        $sendsms = array(
            'no_hp' => $data['no_hp'],
            'pesan' => $subjek . "\n" . $pesan,
        );

        $send = $this->sms_gateway->send_sms($sendsms); // Panggil fungsi send yang ada di librari sms

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, SMS Testing Pesanan Telah Dikirimkan Ke '$data[no_hp]'..."));
            redirect('smsgateway/sms/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('smsgateway/sms/');
        }
    }

    //-----------------------------------------------------------------------//
}
