<?php

class Role_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $office_info = array();
        $office_id = $this->session->userdata('office_id');
        $office_id_array = explode('-', $office_id);
        $office_info['zone_id'] = $zone_id = (int) $office_id_array[0];
        $office_info['area_id'] = $area_id = (int) $office_id_array[1];
        $office_info['branch_id'] = $branch_id = (int) $office_id_array[2];
        $this->load->library('ion_auth');
        $user_group_info = $this->ion_auth->get_user_groups_info($zone_id, $area_id, $branch_id);
        $this->data['user_group_info'] = $user_group_info['branch_info'][0];
        $this->data['office_info'] = $office_info;
        $this->data['office_id'] = $office_id;
        $this->data['designation'] = $this->session->userdata('designation');
        $this->data['username'] = $this->session->userdata('username');
    }

}
