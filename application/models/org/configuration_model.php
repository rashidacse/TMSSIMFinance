<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Feedback Model
 * Author: Rashida
 * Requirements: PHP5 or above
 *
 */
class Configuration_model extends Ion_auth_model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * This method will add member survey
     * @param $additional_data,  data to be added
     * @author rashida sultana
     */

    public function add_product_info($additional_data) {
        $data = $this->_filter_data($this->tables['products'], $additional_data);
        $this->db->insert($this->tables['products'], $data);
        $id = $this->db->insert_id();
        return isset($id) ? $id : FALSE;
    }
    public function add_purpose_info($additional_data) {
        $data = $this->_filter_data($this->tables['purposes'], $additional_data);
        $this->db->insert($this->tables['purposes'], $data);
        $id = $this->db->insert_id();
        return isset($id) ? $id : FALSE;
    }


    public function get_investor_list() {
        return $this->db->select('*')
                        ->from($this->tables['investors'])
                        ->get();
    }
    public function get_process_type_list() {
        return $this->db->select('*')
                        ->from($this->tables['process_types'])
                        ->get();
    }
    public function get_payment_frequency_list() {
        return $this->db->select('*')
                        ->from($this->tables['payment_frequency'])
                        ->get();
    }

}

?>
