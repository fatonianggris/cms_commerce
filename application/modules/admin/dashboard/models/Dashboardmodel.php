<?php

class Dashboardmodel extends CI_Model {

    private $site_log = 'track_visitor';

    //
    //------------------------------COUNT--------------------------------//
    //
    public function get_jumlah() {
        $sql = $this->db->query('select (select count(id_produk) from produk) as total_produk, (select count(id_produk) from produk WHERE status_rekomendasi=1 ) as rekomendasi, (select count(id_produk) from produk WHERE status_promo=1 ) as promo, (select count(id) from user) as user_admin');
        return $sql->result();
    }

    //
    //------------------------------GET VISITOR--------------------------------//
    //  

    public function get_list_visitor() {
        $sql = $this->db->query('SELECT * FROM track_visitor ORDER BY access_date DESC');
        return $sql->result();
    }

    public function get_visitorip_by_id($id = '') {

        $this->db->select('ip_address');
        $this->db->where('track_visitor_id', $id);

        $sql = $this->db->get($this->site_log);
        return $sql->result();
    }

    public function delete_visit($value) {
        $this->db->trans_begin();

        $this->db->where('track_visitor_id', $value);
        $this->db->delete($this->site_log);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function get_site_data_for_today() {
        $results = array();
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits 
            FROM ' . $this->site_log . ' 
            WHERE CURDATE()=DATE(access_date)
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results['visits'] = $row->visits;
        }

        return $results;
    }

    function get_site_data_for_last_week() {
        $results = array();
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits
            FROM ' . $this->site_log . '
            WHERE DATE(access_date) >= CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY
            AND DATE(access_date) < CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY 
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results['visits'] = $row->visits;

            return $results;
        }
    }

    function get_chart_data_for_today() {
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%h %p") AS hour
                FROM ' . $this->site_log . '
                WHERE CURDATE()=DATE(access_date)
                GROUP BY HOUR(access_date)');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }

    function get_chart_data_for_month_year($month = 0, $year = 0) {
        if ($month == 0 && $year == 0) {
            $month = date('m');
            $year = date('Y');
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day 
                FROM ' . $this->site_log . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        if ($month == 0 && $year > 0) {
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(timestamp,"%M") AS day
                FROM ' . $this->site_log . '
                WHERE YEAR(access_date)=' . $year . '
                GROUP BY MONTH(access_date)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        if ($year == 0 && $month > 0) {
            $year = date('Y');
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->site_log . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        if ($year > 0 && $month > 0) {
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->site_log . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        return NULL;
    }

    //-----------------------------------------------------------------------//
//
}

?>