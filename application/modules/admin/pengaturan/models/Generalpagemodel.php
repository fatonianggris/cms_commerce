<?php

class Generalpagemodel extends CI_Model {

    private $table_generalpage = 'general_page';
    private $table_banner = 'banner';
    private $table_seopage = 'seo_page';

    //
    //------------------------------COUNT--------------------------------//
    //

    public function get_jumlah() {
        $sql = $this->db->query('select (select count(id_produk) from produk) as total_produk, (select count(id_banner) from banner) as total_banner');
        return $sql->result();
    }

    //
    //------------------------------GENERALPAGE--------------------------------//
    //
    
    public function get_by_id_generalpage($id = '') {
        $this->db->where('id_general_page', $id);
        $sql = $this->db->get($this->table_generalpage);
        return $sql->result();
    }

    public function update_generalpage($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_website' => $value['nama_website'],
            'logo_website' => $value['logo_website'],
            'logo_website_thumb' => $value['logo_website_thumb'],
            'greeting_website' => $value['greeting_website'],
            'contact_bussines' => $value['contact_bussines'],
            'about_website' => $value['about_website']
        );

        $this->db->where('id_general_page', $id);
        $this->db->update($this->table_generalpage, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //------------------------------SEO PAGE--------------------------------//
    //
     public function get_by_id_seopage($id = '') {
        $this->db->where('id_seo_page', $id);
        $sql = $this->db->get($this->table_seopage);
        return $sql->result();
    }

    public function update_seopage($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'judul_page_seo' => $value['judul_page_seo'],
            'deskripsi_page' => $value['deskripsi_page'],
            'keywords' => $value['keywords'],
            'copyright' => $value['copyright'],
            'gambar_page_seo' => $value['gambar_page_seo'],
            'id_twitter' => $value['id_twitter'],
            'id_fb_page' => $value['id_fb_page'],
            'id_fb_app' => $value['id_fb_app'],
            'status_robot' => $value['status_robot'],
            'status_boosting' => $value['status_boosting'],
            'canonical' => $value['canonical']
        );

        $this->db->where('id_seo_page', $id);
        $this->db->update($this->table_seopage, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //--------------------------------------------------------------------//
    //------------------------------BANNER--------------------------------//
    //

    public function cek_duplikat_banner($nama = '') {
        $this->db->where('judul_banner', $nama);
        $sql = $this->db->get($this->table_banner);
        return $sql->result();
    }

    public function get_nameimgbanner_by_id($id = '') {
        $this->db->select('gambar_banner, judul_banner');
        $this->db->where('id_banner', $id);
        $sql = $this->db->get($this->table_banner);
        return $sql->result();
    }

    public function get_banner() {
        $sql = $this->db->query('SELECT * FROM banner');
        return $sql->result();
    }

    public function insert_banner($value = '') {

        $data = array(
            'status_banner' => @$value['status_banner'],
            'judul_banner' => $value['judul_banner'],
            'judul_promo' => $value['judul_promo'],
            'konten' => $value['konten'],
            'highlight' => $value['highlight'],
            'gambar_banner' => $value['gambar_banner'],
            'gambar_banner_thumb' => $value['gambar_banner_thumb'],
        );

        $this->db->insert($this->table_banner, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_banner($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_banner' => $value['status_banner'],
            'judul_banner' => $value['judul_banner'],
            'judul_promo' => $value['judul_promo'],
            'konten' => $value['konten'],
            'highlight' => $value['highlight'],
            'gambar_banner' => $value['gambar_banner'],
            'gambar_banner_thumb' => $value['gambar_banner_thumb'],
        );

        $this->db->where('id_banner', $id);
        $this->db->update($this->table_banner, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_banner($value = '') {
        $this->db->trans_begin();

        $this->db->where('id_banner', $value);
        $this->db->delete($this->table_banner);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

//
    //--------------------------------------------------------------------//
//
}

?>