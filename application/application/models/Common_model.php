<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function insert($table, $data, $insert = 0) {
        if (!empty($data)) {
            $this->db->insert($this->db->dbprefix($table), $data);
            if ($insert == 1) {
                return $this->db->insert_id();
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function update($table, $data, $where) {
        if (!empty($data)) {
            $this->db->update($this->db->dbprefix($table), $data, $where);
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $where) {
        if (!empty($where)) {
            $this->db->delete($this->db->dbprefix($table), $where);
            return true;
        } else {
            return false;
        }
    }

    public function get($table, $where = array()) {
        if (!empty($where)) {
            $result = $this->db->get_where($this->db->dbprefix($table), $where);
            return $result->result_array();
        } else {
            $result = $this->db->get($this->db->dbprefix($table));
            return $result->result_array();
        }
    }

    public function count_data($table, $where) {
        if (!empty($where)) {
            $result = $this->db->get_where($this->db->dbprefix($table), $where);
            return $result->num_rows();
        } else {
            $result = $this->db->get($this->db->dbprefix($table));
            return $result->num_rows();
        }
    }

    //Run Direct query
    public function query($sql, $no_return = 0) {
        $result = $this->db->query($sql);
        if ($no_return == 0) {
            return $result->result_array();
        }
    }

    // get current date data
    public function get_orderby_desc($table, $order_field, $where = array()) {
        if (!empty($where)) {
            $result = $this->db->order_by($order_field, 'DESC')->get_where($this->db->dbprefix($table), $where);
            return $result->result_array();
        } else {
            $result = $this->db->order_by($order_field, 'DESC')->get($this->db->dbprefix($table));
            return $result->result_array();
        }
    }

    public function get_orderby_asc($table, $order_field, $where = array()) {
        if (!empty($where)) {
            $result = $this->db->order_by($order_field, 'ASC')->get_where($this->db->dbprefix($table), $where);
            return $result->result_array();
        } else {
            $result = $this->db->order_by($order_field, 'ASC')->get($this->db->dbprefix($table));
            return $result->result_array();
        }
    }

    public function get_orderby_desc_limit($table, $order_field, $where = array(), $limits) {
        $limit = $limits["limit"];
        $start = $limits["start"];
        if (!empty($where)) {
            $result = $this->db->order_by($order_field, 'DESC')->limit($limit, $start)->get_where($this->db->dbprefix($table), $where);
            return $result->result_array();
        } else {
            $result = $this->db->order_by($order_field, 'DESC')->limit($limit, $start)->get($this->db->dbprefix($table));
            return $result->result_array();
        }
    }

}
