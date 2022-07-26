<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir_api {

    public $_ci;
    public $db_kurir = "kurir";
    public $base_url = '';
    public $kota_asal = '';
    public $API_KEY = '';

    public function __construct() {
        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
        $get_kurir = $this->_ci->db->query('select * from ' . $this->db_kurir . ' where id_kurir=1')->result();

        $this->base_url = $get_kurir[0]->base_url_api;
        $this->API_KEY = $get_kurir[0]->api_key;
        $this->kota_asal = $get_kurir[0]->id_kabupaten;
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
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->API_KEY
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $provinsi = json_decode($response, true);
            //var_dump($provinsi);
            //exit;
            $hasil = $provinsi['rajaongkir']['results'];
            return $hasil;
        }
    }

    public function kabupaten_api($province_id = '') {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url . "city" . (isset($province_id) ? '?province=' . $province_id : ''),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->API_KEY
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $kab = $data['rajaongkir']['results'];
            return $kab;
        }
    }

    public function get_ongkir_api($tujuan = '', $berat = '', $kurir = '') {
        // Set Kota asal
        $asal = $this->kota_asal;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url . "cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$asal&destination=$tujuan&weight=$berat&courier=$kurir",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->API_KEY
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $ongkir = $data['rajaongkir']['results'][0]['costs'];
            return $ongkir;
        }
    }

}
