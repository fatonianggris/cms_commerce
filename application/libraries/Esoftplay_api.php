<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Esoftplay_api {

    public $_ci;
    public $db_kurir = "kurir";
    public $base_url = '';
    public $kota_asal = '';
    public $kecamatan_asal = '';
    public $tipe_alamat = '';
    public $API_KEY = '';

    public function __construct() {
        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
        $get_kurir = $this->_ci->db->query('select * from ' . $this->db_kurir . ' where id_kurir=2')->result();

        $this->base_url = $get_kurir[0]->base_url_api;
        $this->API_KEY = $get_kurir[0]->api_key;
        $this->kota_asal = $get_kurir[0]->id_kabupaten;
        $this->kecamatan_asal = $get_kurir[0]->id_kecamatan;
        $this->tipe_alamat = $get_kurir[0]->type_alamat;
    }

    public function provinsi_api() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url . "province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $provinsi = json_decode($response, true);
            $hasil = $provinsi['result'];
            return $hasil;
        }
    }

    public function kabupaten_api($province_id = '') {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url . "city/" . (isset($province_id) ? $province_id : ''),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $kab = $data['result'];
            return $kab;
        }
    }

    public function kecamatan_api($kabupaten_id = '') {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url . "subdistrict/" . (isset($kabupaten_id) ? $kabupaten_id : ''),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $kab = $data['result'];
            return $kab;
        }
    }

    public function get_ongkir_api($tujuan = '', $berat = '', $kurir = '', $tipe_tujuan = '') {
        // Set Kota asal
        $asal = '';
        if ($this->kecamatan_asal == '' or empty($this->kecamatan_asal)) {
            $asal = $this->kota_asal;
        } else {
            $asal = $this->kecamatan_asal;
        }

        $tipe_asal = $this->tipe_alamat;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url . "domesticCost/" . $asal . "/" . $tujuan . "/" . $berat . "/" . $kurir . "/" . $tipe_asal . "/" . $tipe_tujuan,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $ongkir = $data['result'][0]['costs'];
            return $ongkir;
        }
    }

}
