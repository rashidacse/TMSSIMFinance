<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of configuration
 *
 * @author rashida
 */
class configuration extends Role_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->library('utility');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('org/configuration_model');
    }

    public function grace() {
        $this->data['test'] = "";
        $this->data['app_name'] = CONFIGURATION_APP;
        $this->template->load(MEMBER_TEMPLATE, 'configuration/grace', $this->data);
    }

    public function investor() {
        $this->data['test'] = "";
        $this->data['app_name'] = CONFIGURATION_APP;
        $this->template->load(MEMBER_TEMPLATE, 'configuration/investor', $this->data);
    }

    public function welcome_page() {
        $this->data['test'] = "";
        $this->data['app_name'] = CONFIGURATION_APP;
        $this->template->load(MEMBER_TEMPLATE, 'dashboard/dashboard', $this->data);
    }

    public function product() {
        if (file_get_contents("php://input") != null) {
            $user_name = "";
            $response = array();
            $postdata = file_get_contents("php://input");
            $requestData = json_decode($postdata);
            if (property_exists($requestData, "productInfo") != FALSE) {
                $requestInfo = $requestData->productInfo;
                $addisional_data = array();
                if (property_exists($requestInfo, "bang_full_name") != FALSE) {
                    $addisional_data['bang_full_name'] = $requestInfo->bang_full_name;
                }
                if (property_exists($requestInfo, "bang_short_name") != FALSE) {
                    $addisional_data['bang_short_name'] = $requestInfo->bang_short_name;
                }
                if (property_exists($requestInfo, "code") != FALSE) {
                    $addisional_data['code'] = $requestInfo->code;
                }
                if (property_exists($requestInfo, "duration") != FALSE) {
                    $addisional_data['duration'] = $requestInfo->duration;
                }
                if (property_exists($requestInfo, "eng_name") != FALSE) {
                    $addisional_data['eng_name'] = $requestInfo->eng_name;
                }
                if (property_exists($requestInfo, "insurance_item_code") != FALSE) {
                    $addisional_data['insurance_item_code'] = $requestInfo->insurance_item_code;
                }
                if (property_exists($requestInfo, "interest_calculation_method") != FALSE) {
                    $addisional_data['interest_calculation_method'] = $requestInfo->interest_calculation_method;
                }
                if (property_exists($requestInfo, "interest_rate") != FALSE) {
                    $addisional_data['interest_rate'] = $requestInfo->interest_rate;
                }
                if (property_exists($requestInfo, "main_product_code") != FALSE) {
                    $addisional_data['main_product_code'] = $requestInfo->main_product_code;
                }
                if (property_exists($requestInfo, "max_limit") != FALSE) {
                    $addisional_data['max_limit'] = $requestInfo->max_limit;
                }
                if (property_exists($requestInfo, "min_limit") != FALSE) {
                    $addisional_data['min_limit'] = $requestInfo->min_limit;
                }
                if (property_exists($requestInfo, "name") != FALSE) {
                    $addisional_data['name'] = $requestInfo->name;
                }
                if (property_exists($requestInfo, "payment_frequency_id") != FALSE) {
                    $addisional_data['payment_frequency_id'] = $requestInfo->payment_frequency_id;
                }
                if (property_exists($requestInfo, "product_type_id") != FALSE) {
                    $addisional_data['product_type_id'] = $requestInfo->product_type_id;
                }
                $insert_id = $this->configuration_model->add_product_info($addisional_data);
                if ($insert_id != -1) {
                    $response["message"] = "Product Info  is Added Successfully!";
                } else {
                    $response["message"] = "Sorry! Error While Adding Product Info!";
                }
                echo json_encode($response);
                return;
            }
        }

        $this->data['test'] = "";
        $this->data['product_types'] = $this->utility->get_product_types();
        $this->data['interest_cal_methods'] = $this->utility->get_interest_calculation_methods();
        $this->data['payment_frequency_list'] = $this->configuration_model->get_payment_frequency_list()->result_array();
        $this->data['app_name'] = CONFIGURATION_APP;
        $this->template->load(MEMBER_TEMPLATE, 'configuration/product', $this->data);
    }

    public function purpose() {
        if (file_get_contents("php://input") != null) {

            $response = array();
            $postdata = file_get_contents("php://input");
            $requestData = json_decode($postdata);
            if (property_exists($requestData, "purposeInfo") != FALSE) {
                $requestInfo = $requestData->purposeInfo;
                $addisional_data = array();
                if (property_exists($requestInfo, "purpose_name") != FALSE) {
                    $addisional_data['purpose_name'] = $requestInfo->purpose_name;
                }

                $addisional_data['org_id'] = $this->session->userdata('user_id');
                $addisional_data['employee_id'] = $this->session->userdata('user_id');

                $insert_id = $this->configuration_model->add_purpose_info($addisional_data);
            if ($insert_id != -1) {
                $response["message"] = "Product Info  is Added Successfully!";
            } else {
                $response["message"] = "Sorry! Error While Adding Product Info!";
            }
            echo json_encode($response);
            return;
        }
        }
        $this->data['test'] = "";
        $this->data['app_name'] = CONFIGURATION_APP;
        $this->template->load(MEMBER_TEMPLATE, 'configuration/purpose', $this->data);
    }

    public function organization_settings() {
        if (file_get_contents("php://input") != null) {
            $user_name = "";
            $response = array();
            $postdata = file_get_contents("php://input");
            $requestData = json_decode($postdata);
            if (property_exists($requestData, "organizationInfo") != FALSE) {
                $requestInfo = $requestData->organizationInfo;
                $addisional_data = array();
                if (property_exists($requestInfo, "office_id") != FALSE) {
                    $addisional_data['office_id'] = $requestInfo->office_id;
                }
                if (property_exists($requestInfo, "organization_name") != FALSE) {
                    $addisional_data['organization_name'] = $requestInfo->organization_name;
                }
                if (property_exists($requestInfo, "org_address") != FALSE) {
                    $addisional_data['org_address'] = $requestInfo->org_address;
                }
                if (property_exists($requestInfo, "cash_book") != FALSE) {
                    $addisional_data['cash_book'] = $requestInfo->cash_book;
                }
                if (property_exists($requestInfo, "pla_aacount") != FALSE) {
                    $addisional_data['pla_aacount'] = $requestInfo->pla_aacount;
                }
                if (property_exists($requestInfo, "bank_aacount") != FALSE) {
                    $addisional_data['bank_aacount'] = $requestInfo->bank_aacount;
                }
                if (property_exists($requestInfo, "phone_no") != FALSE) {
                    $addisional_data['phone_no'] = $requestInfo->phone_no;
                }
                if (property_exists($requestInfo, "cell_no") != FALSE) {
                    $addisional_data['cell_no'] = $requestInfo->cell_no;
                }
                if (property_exists($requestInfo, "email") != FALSE) {
                    $addisional_data['email'] = $requestInfo->email;
                }
                if (property_exists($requestInfo, "process_type") != FALSE) {
                    $addisional_data['process_type'] = $requestInfo->process_type;
                }
                if (property_exists($requestInfo, "license_no") != FALSE) {
                    $addisional_data['license_no'] = $requestInfo->license_no;
                }
                if (property_exists($requestInfo, "license_start_date") != FALSE) {
                    $addisional_data['license_start_date'] = $requestInfo->license_start_date;
                }
                if (property_exists($requestInfo, "license_end_date") != FALSE) {
                    $addisional_data['license_end_date'] = $requestInfo->license_end_date;
                }
            }
            $addisional_data['reference_user_id'] = $user_id = $this->session->userdata('user_id');
            $insert_id = $this->configuration_model->organization_settings($addisional_data);
            if ($insert_id != -1) {
                $response["message"] = "Organization Settings  is Added Successfully!";
            } else {
                $response["message"] = "Sorry! Error While Adding Organization Settings!";
            }
            echo json_encode($response);
            return;
        }
        $this->data['app_name'] = CONFIGURATION_APP;
        $this->data['investor_list'] = $this->configuration_model->get_investor_list()->result_array();
        $this->data['process_list'] = $this->configuration_model->get_process_type_list()->result_array();
        $this->template->load(MEMBER_TEMPLATE, 'configuration/organization', $this->data);
    }

}
