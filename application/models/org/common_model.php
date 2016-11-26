<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Feedback Model
 * Author: Rashida
 * Requirements: PHP5 or above
 *
 */
class Common_model extends Ion_auth_model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * This method will add member survey
     * @param $additional_data,  data to be added
     * @author rashida sultana
     */

    public function get_branch_info($area_id , $branch_id) {
        $this->db->where($this->tables['branches'] . '.area_id', $area_id);
        $this->db->where($this->tables['branches'] . '.id', $branch_id);
        return $this->db->select('*')
                        ->from($this->tables['branches'])
                        ->get();
    }

    public function get_area_info($zone_id, $area_id) {
        $this->db->where($this->tables['areas'] . '.zone_id', $zone_id);
        $this->db->where($this->tables['areas'] . '.id', $area_id);
        return $this->db->select('*')
                        ->from($this->tables['areas'])
                        ->get();
    }

    public function get_zone_info($zone_id) {
        $this->db->where($this->tables['zones'] . '.id', $zone_id);
        return $this->db->select('*')
                        ->from($this->tables['zones'])
                        ->get();
    }

}

?>
