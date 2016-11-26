<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Feedback Model
 * Author: Rashida
 * Requirements: PHP5 or above
 *
 */
class Member_model extends Ion_auth_model {

    public function __construct() {
        parent::__construct();
        $this->load->config('ion_auth', TRUE);
        $this->lang->load('ion_auth');
    }

    /*
     * This method will add member survey
     * @param $additional_data,  data to be added
     * @author rashida sultana
     */

    public function add_survey($additional_data) {
        $data = $this->_filter_data($this->tables['surveys'], $additional_data);
        $this->db->insert($this->tables['surveys'], $data);
        $id = $this->db->insert_id();
        return isset($id) ? $id : FALSE;
    }

    public function get_survey_info($nid = "", $email = "", $mobile = 0) {
        if (!empty($nid)) {
            $this->db->where($this->tables['surveys'] . '.nid', $nid);
        }
        if (!empty($email)) {
            $this->db->where($this->tables['surveys'] . '.email', $email);
        }
        if (!empty($email)) {
            $this->db->where($this->tables['surveys'] . '.mobile', $mobile);
        }
        return $this->db->select('*')
                        ->from($this->tables['surveys'])
                        ->get();
    }


    public function get_survey_list()
    {
        return $this->db->select('*')
            ->from($this->tables['surveys'])
            ->get();
    }

    public function get_member_list()
    {
        return $this->db->select('*')
            ->from($this->tables['members'])
            ->get();
    }


    public function get_member_info($nid = "", $email = "", $mobile = 0) {
        if (!empty($nid)) {
            $this->db->where($this->tables['members'] . '.nid', $nid);
        }
        if (!empty($email)) {
            $this->db->where($this->tables['members'] . '.email', $email);
        }
        if (!empty($mobile)) {
            $this->db->where($this->tables['members'] . '.mobile', $mobile);
        }
        return $this->db->select('*')
                        ->from($this->tables['members'])
                        ->get();
    }

    public function get_member_family_info($member_id, $nid) {
        if (!empty($nid)) {
            $this->db->where($this->tables['member_family_info'] . '.nid', $nid);
        }
        if (!empty($member_id)) {
            $this->db->where($this->tables['member_family_info'] . '.member_id', $member_id);
        }
        $this->db->order_by($this->tables['member_family_info'] . '.id', 'desc');
        return $this->db->select('*')
                        ->from($this->tables['member_family_info'])
                        ->limit(1)
                        ->get();
    }
    public function get_member_addresse_info($member_id, $nid) {
        if (!empty($nid)) {
            $this->db->where($this->tables['member_addresses'] . '.nid', $nid);
        }
        if (!empty($member_id)) {
            $this->db->where($this->tables['member_addresses'] . '.member_id', $member_id);
        }
        $this->db->order_by($this->tables['member_addresses'] . '.id', 'desc');
        return $this->db->select('*')
                        ->from($this->tables['member_addresses'])
                        ->limit(1)
                        ->get();
    }
    public function get_member_profession_info($member_id, $nid) {
        if (!empty($nid)) {
            $this->db->where($this->tables['member_profession_info'] . '.nid', $nid);
        }
        if (!empty($member_id)) {
            $this->db->where($this->tables['member_profession_info'] . '.member_id', $member_id);
        }
        $this->db->order_by($this->tables['member_profession_info'] . '.id', 'desc');
        return $this->db->select('*')
                        ->from($this->tables['member_profession_info'])
                        ->limit(1)
                        ->get();
    }
    public function get_member_land_info($member_id, $nid) {
        if (!empty($nid)) {
            $this->db->where($this->tables['member_land_info'] . '.nid', $nid);
        }
        if (!empty($member_id)) {
            $this->db->where($this->tables['member_land_info'] . '.member_id', $member_id);
        }
        $this->db->order_by($this->tables['member_land_info'] . '.id', 'desc');
        return $this->db->select('*')
                        ->from($this->tables['member_land_info'])
                        ->limit(1)
                        ->get();
    }
    public function get_member_investment_info($member_id, $nid) {
        if (!empty($nid)) {
            $this->db->where($this->tables['member_investment_info'] . '.nid', $nid);
        }
        if (!empty($member_id)) {
            $this->db->where($this->tables['member_investment_info'] . '.member_id', $member_id);
        }
        $this->db->order_by($this->tables['member_investment_info'] . '.id', 'desc');
        return $this->db->select('*')
                        ->from($this->tables['member_investment_info'])
                        ->limit(1)
                        ->get();
    }
    public function get_member_business_info($member_id, $nid) {
        if (!empty($nid)) {
            $this->db->where($this->tables['member_business_info'] . '.nid', $nid);
        }
        if (!empty($member_id)) {
            $this->db->where($this->tables['member_business_info'] . '.member_id', $member_id);
        }
        $this->db->order_by($this->tables['member_business_info'] . '.id', 'desc');
        return $this->db->select('*')
                        ->from($this->tables['member_business_info'])
                        ->limit(1)
                        ->get();
    }

    public function add_addmission_info($member_info, $member_family_info, $member_address_info, $member_profession_info, $member_land_info, $member_investment_info, $additional_data) {
        $this->db->trans_begin();
        $member_info = $this->_filter_data($this->tables['members'], $member_info);
        $this->db->insert($this->tables['members'], $member_info);
        $member_id = $this->db->insert_id();
        $member_family_info['member_id'] = $member_id;
        $member_address_info['member_id'] = $member_id;
        $member_profession_info['member_id'] = $member_id;
        $member_land_info['member_id'] = $member_id;
        $member_investment_info['member_id'] = $member_id;
        $additional_data['member_id'] = $member_id;
        $nid = $member_info['nid'];
        $member_family_info['nid'] = $nid;
        $member_address_info['nid'] = $nid;
        $member_profession_info['nid'] = $nid;
        $member_land_info['nid'] = $nid;
        $member_investment_info['nid'] = $nid;
        $additional_data['nid'] = $nid;
        $member_family_info = $this->_filter_data($this->tables['member_family_info'], $member_family_info);
        $this->db->insert($this->tables['member_family_info'], $member_family_info);
        $member_address_info = $this->_filter_data($this->tables['member_addresses'], $member_address_info);
        $this->db->insert($this->tables['member_addresses'], $member_address_info);
        $member_profession_info = $this->_filter_data($this->tables['member_profession_info'], $member_profession_info);
        $this->db->insert($this->tables['member_profession_info'], $member_profession_info);
        $member_land_info = $this->_filter_data($this->tables['member_land_info'], $member_land_info);
        $this->db->insert($this->tables['member_land_info'], $member_land_info);
        $member_investment_info = $this->_filter_data($this->tables['member_investment_info'], $member_investment_info);
        $this->db->insert($this->tables['member_investment_info'], $member_investment_info);
        $additional_data = $this->_filter_data($this->tables['member_business_info'], $additional_data);
        $this->db->insert($this->tables['member_business_info'], $additional_data);
        $this->db->trans_commit();
    }

    /*
     * This method will return zone List
     * @return zone List
     * @author rashida on 12th Nov 2016
     */

    public function get_zone_list($zone_id = 0) {
        if ($zone_id != 0) {
            $this->db->where($this->tables['zones'] . '.id', $zone_id);
        }
        return $this->db->select('*')
                        ->from($this->tables['zones'])
                        ->get();
    }

    /*
     * This method will return area List
     * @return area List
     * @author rashida on 12th Nov 2016
     */

    public function get_area_list($zone_id = 0, $area_id = 0) {
        if ($zone_id != 0) {
            $this->db->where($this->tables['areas'] . '.zone_id', $zone_id);
        }
        if ($area_id != 0) {
            $this->db->where($this->tables['areas'] . '.id', $area_id);
        }
        return $this->db->select('*')
                        ->from($this->tables['areas'])
                        ->get();
    }

    /*
     * This method will return branche List
     * @return branche List
     * @author rashida on 12th Nov 2016
     */

    public function get_branch_list($area_id = 0, $branch_id = 0) {
        if ($area_id != 0) {
            $this->db->where($this->tables['branches'] . '.area_id', $area_id);
        }
        if ($branch_id != 0) {
            $this->db->where($this->tables['branches'] . '.id', $branch_id);
        }
        return $this->db->select('*')
                        ->from($this->tables['branches'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_gender_list() {
        return $this->db->select('*')
                        ->from($this->tables['genders'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_post_list($thana_id = 0) {
        if ($thana_id != 0) {
            $this->db->where($this->tables['posts'] . '.post_id', $thana_id);
        }
        return $this->db->select('*')
                        ->from($this->tables['posts'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_thana_list($district_id = 0) {
        if ($district_id != 0) {
            $this->db->where($this->tables['thanas'] . '.dist_id', $district_id);
        }
        return $this->db->select('*')
                        ->from($this->tables['thanas'])
                        ->get();
    }

    public function get_country_list() {
        return $this->db->select('*')
                        ->from($this->tables['countries'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_district_list() {
        return $this->db->select('*')
                        ->from($this->tables['districts'])
                        ->get();
    }

    public function get_union_list() {
        return $this->db->select('*')
                        ->from($this->tables['unions'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_marital_list() {
        return $this->db->select('*')
                        ->from($this->tables['marital_status'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_profession_list() {
        return $this->db->select('*')
                        ->from($this->tables['professions'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_political_statuses() {
        return $this->db->select('*')
                        ->from($this->tables['political_statuses'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_business_types() {
        return $this->db->select('*')
                        ->from($this->tables['business_types'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_family_types() {
        return $this->db->select('*')
                        ->from($this->tables['family_types'])
                        ->get();
    }

    /*
     * This method will return gender List
     * @return gender List
     * @author rashida on 12th Nov 2016
     */

    public function get_education_list() {
        return $this->db->select('*')
                        ->from($this->tables['educations'])
                        ->get();
    }

    public function get_payment_type_list() {
        return $this->db->select('*')
                        ->from($this->tables['payment_types'])
                        ->get();
    }
    public function get_member_groups_list() {
        return $this->db->select('*')
                        ->from($this->tables['member_groups'])
                        ->get();
    }
    public function get_member_cash_inflow_list() {
        return $this->db->select('*')
                        ->from($this->tables['member_cash_inflow'])
                        ->get();
    }
    public function get_member_cash_outflow_list() {
        return $this->db->select('*')
                        ->from($this->tables['member_cash_outflow'])
                        ->get();
    }
    public function get_monthly_income_expence_list() {
        return $this->db->select('*')
                        ->from($this->tables['monthly_income_expence'])
                        ->get();
    }

}

?>
