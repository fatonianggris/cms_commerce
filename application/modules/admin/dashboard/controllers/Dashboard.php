<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('Dashboardmodel');
        if ($this->session->userdata('batikpati') == FALSE) {
            redirect('auth');
        }
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    
    public function index() {

        $site_statics_today = $this->Dashboardmodel->get_site_data_for_today();
        $site_statics_last_week = $this->Dashboardmodel->get_site_data_for_last_week();
        $data['jumlah'] = $this->Dashboardmodel->get_jumlah();
        $data['list_visitor'] = $this->Dashboardmodel->get_list_visitor();
        $data['visits_today'] = isset($site_statics_today['visits']) ? $site_statics_today['visits'] : 0;
        $data['visits_last_week'] = isset($site_statics_last_week['visits']) ? $site_statics_last_week['visits'] : 0;
        $data['chart_data_today'] = $this->Dashboardmodel->get_chart_data_for_today();
        $data['chart_data_curr_month'] = $this->Dashboardmodel->get_chart_data_for_month_year();
        $this->template->load('template_admin/template_admin', 'dashboard', $data);
        //$this->template->load('template_admin/template_admin', 'under_dev', $data);
    }

    public function delete_visitor() {

        $id = $this->input->post('id');
        $data = $this->Dashboardmodel->get_visitorip_by_id($id);
        $delete_item = $this->Dashboardmodel->delete_visit($id);

        if ($delete_item == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Visitor IP '$data->ip_address' Telah Terhapus.."));
            redirect('dashboard/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('dashboard/');
        }
    }

    function get_chart_data() {
        if (isset($_POST)) {
            if (isset($_POST['month']) && strlen($_POST['month']) && isset($_POST['year']) && strlen($_POST['year'])) {
                $month = $_POST['month'];
                $year = $_POST['year'];
                $data = $this->Dashboardmodel->get_chart_data_for_month_year($month, $year);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    $timestamp = mktime(0, 0, 0, $month);
                    $label = date("F", $timestamp);
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $label . '-' . $year . '"</div>';
                }
            } else if (isset($_POST['month']) && strlen($_POST['month'])) {
                $month = $_POST['month'];
                $data = $this->Dashboardmodel->get_chart_data_for_month_year($month);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    $timestamp = mktime(0, 0, 0, $month);
                    $label = date("F", $timestamp);
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $label . '"</div>';
                }
            } else if (isset($_POST['year']) && strlen($_POST['year'])) {
                $year = $_POST['year'];
                $data = $this->Dashboardmodel->get_chart_data_for_month_year(0, $year);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $year . '"</div>';
                }
            } else {
                $data = $this->Dashboardmodel->get_chart_data_for_month_year();
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found!</div>';
                }
            }
        }
    }

    //-----------------------------------------------------------------------//
//
}
