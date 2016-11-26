<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class Member_library {

    public function __construct() {
        $this->load->model('org/member_model');
    }

    /**
     * __call
     *
     * Acts as a simple way to call model methods without loads of stupid alias'
     *
     * */
    public function __call($method, $arguments) {
        if (!method_exists($this->member_model, $method)) {
            throw new Exception('Undefined method Member_library::' . $method . '() called');
        }

        return call_user_func_array(array($this->member_model, $method), $arguments);
    }

    /**
     * __get
     *
     * Enables the use of CI super-global without having to define an extra variable.
     *
     * I can't remember where I first saw this, so thank you if you are the original author. -Militis
     *
     * @access	public
     * @param	$var
     * @return	mixed
     */
    public function __get($var) {
        return get_instance()->$var;
    }

    /*
     * this method will return whether user has permission to execute a transaction or not
     * @param $user_id, user id
     * @param $amount, amount
     * @return boolean
     * @author nazmul hasan on 18th october 2016
     */

    public function get_member_info($nid, $email, $mobile) {
        $member_info = array();
        $member_info_array = $this->member_model->get_member_info($nid, $email, $mobile)->result_array();
        if (!empty($member_info_array)) {
            $member_id = $member_info_array[0]['id'];
            $member_family_info = $this->member_model->get_member_family_info($member_id, $nid)->result_array();
            $member_addresse_info = $this->member_model->get_member_addresse_info($member_id, $nid)->result_array();
            $member_profession_info = $this->member_model->get_member_profession_info($member_id, $nid)->result_array();
            $member_land_info = $this->member_model->get_member_land_info($member_id, $nid)->result_array();
            $member_investment_info = $this->member_model->get_member_investment_info($member_id, $nid)->result_array();
            $member_business_info = $this->member_model->get_member_business_info($member_id, $nid)->result_array();
            $member_info = array_merge($member_info_array[0], $member_family_info[0], $member_addresse_info[0], $member_profession_info[0], $member_land_info[0], $member_investment_info[0], $member_business_info[0]);
        }
        return $member_info;
    }

}
