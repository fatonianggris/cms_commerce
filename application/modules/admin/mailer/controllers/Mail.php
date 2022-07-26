<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }

        $this->load->model('Mailmodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------MAIL PAGE--------------------------------//
    //
   
    public function index() {

        $data['mail'] = $this->Mailmodel->get_by_id_mail(1);
        $data['jumlah'] = $this->Mailmodel->get_jumlah(1);
        $data['newsletter_user'] = $this->Mailmodel->get_newsletter();
        $this->template->load('template_admin/template_admin', 'mailer_page', $data);
    }

    public function update_mailer() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        if (!isset($data['smtp_auth'])) {
            $data['smtp_auth'] = 'false';
        }
        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('host', 'Host', 'required');
        $this->form_validation->set_rules('email_website', 'Email Website', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('port', 'Port', 'required');
        $this->form_validation->set_rules('smtp_secure', 'SMTP Secure', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('mailer/mail/');
        } else {

            $edit = $this->Mailmodel->update_mailer(1, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi Mailer Telah Terupdate..."));
                redirect('mailer/mail/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('mailer/mail/');
            }
        }
    }

    //
    //------------------------------NEWSLETTER PAGE--------------------------------//
    //

    public function add_email_newsletter() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('email_user', 'Email Newsletter', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('mailer/mail/');
        } else {

            $edit = $this->Mailmodel->insert_newsletter($data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Newsletter '$data[email_user]' Telah Ditambahkan..."));
                redirect('mailer/mail/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('mailer/mail/');
            }
        }
    }

    public function delete_newsletter() {
        $id = $this->input->post('id');
        $data = $this->Mailmodel->get_emailnewsletter_by_id($id);
        $delete = $this->Mailmodel->delete_newsletter($id);

        if ($delete == true) {

            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Newsletter '$data->email_user' Telah Terhapus.."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function send_newsletter() {
        $id = $this->input->post('id');

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();
        $data['produk'] = $this->Mailmodel->get_detail_produk($id); //?
        $data['gambar'] = $this->Mailmodel->get_gambar_produk($data['produk'][0]->token); //?
        $newsletter_user = $this->Mailmodel->get_newsletter();

        $subjek = "ABANG21.COM - NEW ARRIVAL'S";
        $content = $this->load->view('mailer_template/newsletter', $data, true); // Ambil isi file content.php dan masukan ke variabel $content
        foreach ($newsletter_user as $mail) {
            $sendmail = array(
                'email_penerima' => $mail->email_user,
                'subjek' => $subjek,
                'content' => $content,
            );
            $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
        }
    }

    public function test_newsletter() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL NEWSLETTER";
        $content = $this->load->view('mailer_template_test/newsletter', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
       
        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Newsletter Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_akun_aktivasi() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL AKUN AKTIVASI";
        $content = $this->load->view('mailer_template_test/akun_aktivasi', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );

        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Akun Aktivasi Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_invoice() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL INVOICE";
        $content = $this->load->view('mailer_template/invoice', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );

        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Invoice Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_lupa_password() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL LUPA PASSWORD";
        $content = $this->load->view('mailer_template_test/lupa_password', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Lupa Password Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_pembayaran() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL PEMBAYARAN";
        $content = $this->load->view('mailer_template_test/pembayaran', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Pembayaran Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_pengiriman_konfirmasi() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL PENGIRIMAN & KONFIRMASI";
        $content = $this->load->view('mailer_template_test/pengiriman_konfirmasi', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Pengiriman & Konfirmasi Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    public function test_pesanan() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();
        
        $subjek = "ABANG21.COM - TESTING EMAIL PESANAN";
        $content = $this->load->view('mailer_template_test/pesanan', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Pesanan Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    //-----------------------------------------------------------------------//
}
