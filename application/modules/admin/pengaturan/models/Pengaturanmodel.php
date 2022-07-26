<?php

class Pengaturanmodel extends CI_Model {

    private $table_user = 'user';
    private $table_kat = 'kategori';
    private $table_banner = 'banner';

    public function get_count() {
        $sql = $this->db->query('select (select count(id) from banner) as banner, (select count(id) from user) as user, (select count(id) from kategori) as kat');
        return $sql->result();
    }

    public function get_user() {
        $sql = $this->db->query('SELECT * FROM user');
        return $sql->result();
    }

    public function get_kat() {
        $sql = $this->db->query('SELECT * FROM kategori');
        return $sql->result();
    }

    public function get_banner() {
        $sql = $this->db->query('SELECT * FROM banner');
        return $sql->result();
    }

    public function insert_user($value = '') {
        $passwd = md5($value['password']);
        $this->db->trans_begin();

        $data = array(
            'nama' => $value['nama_user'],
            'username' => $value['username'],
            'email' => $value['email'],
            'no_telepon' => $value['no_telp'],
            'password' => $passwd,
            'foto' => $value['pic'],
            'foto_thumb' => $value['pic_thumb'],
        );
        $this->db->insert($this->table_user, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_user($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama' => $value['nama_user'],
            'username' => $value['username'],
            'email' => $value['email'],
            'no_telepon' => $value['no_telp'],
            'foto' => $value['pic'],
            'foto_thumb' => $value['pic_thumb'],
        );

        $this->db->where('id', $id);
        $this->db->update($this->table_user, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_kategori($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_kat' => $value['nama_kat'],
            'icon' => $value['pic'],
            'icon_thumb' => $value['pic_thumb'],
        );
        $this->db->insert($this->table_kat, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_kat($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_kat' => $value['nama_kat'],
            'icon' => $value['pic'],
            'icon_thumb' => $value['pic_thumb'],
        );

        $this->db->where('id', $id);
        $this->db->update($this->table_kat, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_banner($value = '') {
        $this->db->trans_begin();

        $data = array(
            'header' => $value['nama_header'],
            'nama_tombol' => $value['nama_tombol'],
            'konten' => $value['konten'],
            'foto' => $value['pic'],
            'foto_thumb' => $value['pic_thumb'],
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
            'header' => $value['nama_header'],
            'nama_tombol' => $value['nama_tombol'],
            'konten' => $value['konten'],
            'foto' => $value['pic'],
            'foto_thumb' => $value['pic_thumb']
        );

        $this->db->where('id', $id);
        $this->db->update($this->table_banner, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_img_by_id_user($id = '') {
        $this->db->select('foto');
        $this->db->where('id', $id);
        $sql = $this->db->get($this->table_user);
        return $sql->result();
    }

    public function delete_user($value) {
        $this->db->trans_begin();

        $this->db->where('id', $value);
        $this->db->delete($this->table_user);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_img_by_id_banner($id = '') {
        $this->db->select('foto');
        $this->db->where('id', $id);
        $sql = $this->db->get($this->table_banner);
        return $sql->result();
    }

    public function delete_banner($value) {
        $this->db->trans_begin();

        $this->db->where('id', $value);
        $this->db->delete($this->table_banner);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_img_by_id_kat($id = '') {
        $this->db->select('icon');
        $this->db->where('id', $id);
        $sql = $this->db->get($this->table_kat);
        return $sql->result();
    }

    public function delete_kat($value) {
        $this->db->trans_begin();

        $this->db->where('id', $value);
        $this->db->delete($this->table_kat);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}

?>