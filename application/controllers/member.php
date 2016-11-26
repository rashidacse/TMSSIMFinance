<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends Role_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->library('utility');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('org/member_model');
        $this->office_info = $this->data['office_info'];
    }

    public function test() {
        $this->load->library('member_library');
        $member_info = $this->member_library->get_member_info(123, "", "");
        var_dump($member_info);
        exit;
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, '', $this->data);
    }

    public function survey_list() {
        $this->data['survey_list']=$this->member_model->get_survey_list()->result_array();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/survey_list', $this->data);
    }

    public function jamindar_info() {
        $this->data['test'] = "";
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/granter_info', $this->data);
    }

    public function member_list() {
        $this->data['member_list'] = $this->member_model->get_member_list()->result_array();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/member_list', $this->data);
    }

    public function survey_list_autocomplet() {
        $keyword = $this->input->post('term');
        $this->db->select('nid');
        $this->db->distinct();
        $this->db->like('nid', $keyword);
        $result = $this->db->get('surveys')->result();
        $data['response'] = 'false';
        if (!empty($result)) {
            $data['response'] = 'true';
            foreach ($result as $row) {
                $data['message'][] = $row->nid;
            }
        }
        echo json_encode($data); //echo json string if ajax request
    }

    public function survey_search($nid) {
        $this->db->select('*');
        $this->db->from('surveys');
        $this->db->where('nid', $nid);
        $result = $this->get_result();
        return $result();

        print_r($result);
        die();
    }

    public function index() {
        if (file_get_contents("php://input") != null) {
            $user_name = "";
            $response = array();
            $postdata = file_get_contents("php://input");
            $requestData = json_decode($postdata);
            if (property_exists($requestData, "memberSurveyInfo") != FALSE) {
                $requestInfo = $requestData->memberSurveyInfo;
                $addisional_data = array();
// area information
                if (property_exists($requestInfo, "zoneId") != FALSE) {
                    $addisional_data['zone_id'] = $requestInfo->zoneId;
                }
                if (property_exists($requestInfo, "areaId") != FALSE) {
                    $addisional_data['area_id'] = $requestInfo->areaId;
                }
                if (property_exists($requestInfo, "branchId") != FALSE) {
                    $addisional_data['branch_id'] = $requestInfo->branchId;
                }

// basic information

                if (property_exists($requestInfo, "nameTitle") != FALSE) {
                    $addisional_data['name_title'] = $requestInfo->nameTitle;
                }
                if (property_exists($requestInfo, "firstName") != FALSE) {
                    $addisional_data['first_name'] = $requestInfo->firstName;
                }
                if (property_exists($requestInfo, "lastName") != FALSE) {
                    $addisional_data['last_name'] = $requestInfo->lastName;
                }
                if (property_exists($requestInfo, "fimilyTitle") != FALSE) {
                    $addisional_data['sur_name'] = $requestInfo->fimilyTitle;
                }
                if (property_exists($requestInfo, "genderId") != FALSE) {
                    $addisional_data['gender_id'] = $requestInfo->genderId;
                }
                if (property_exists($requestInfo, "age") != FALSE) {
                    $addisional_data['age'] = $requestInfo->age;
                }
                if (property_exists($requestInfo, "educationId") != FALSE) {
                    $addisional_data['education_id'] = $requestInfo->educationId;
                }
                if (property_exists($requestInfo, "passingYear") != FALSE) {
                    $addisional_data['passing_year'] = $requestInfo->passingYear;
                }
                if (property_exists($requestInfo, "nid") != FALSE) {
                    $addisional_data['nid'] = $requestInfo->nid;
                }
                if (property_exists($requestInfo, "maritalId") != FALSE) {
                    $addisional_data['marital_id'] = $requestInfo->maritalId;
                }

// father info

                if (property_exists($requestInfo, "fNameTitle") != FALSE) {
                    $addisional_data['f_name_title'] = $requestInfo->fNameTitle;
                }
                if (property_exists($requestInfo, "fFirstName") != FALSE) {
                    $addisional_data['f_first_name'] = $requestInfo->fFirstName;
                }
                if (property_exists($requestInfo, "fLastName") != FALSE) {
                    $addisional_data['f_last_name'] = $requestInfo->fLastName;
                }
                if (property_exists($requestInfo, "fAge") != FALSE) {
                    $addisional_data['f_age'] = $requestInfo->fAge;
                }
                if (property_exists($requestInfo, "gProfessionId") != FALSE) {
                    $addisional_data['f_profession'] = $requestInfo->gProfessionId;
                }
                if (property_exists($requestInfo, "politicalStatusId") != FALSE) {
                    $addisional_data['political_status_id'] = $requestInfo->politicalStatusId;
                }

                if (property_exists($requestInfo, "fEmail") != FALSE) {
                    $addisional_data['guardian_mobile'] = $requestInfo->fEmail;
                }

// mother info 

                if (property_exists($requestInfo, "mNameTitle") != FALSE) {
                    $addisional_data['m_name_title'] = $requestInfo->mNameTitle;
                }
                if (property_exists($requestInfo, "mFrstName") != FALSE) {
                    $addisional_data['m_first_name'] = $requestInfo->mFrstName;
                }
                if (property_exists($requestInfo, "mLastName") != FALSE) {
                    $addisional_data['m_last_name'] = $requestInfo->mLastName;
                }
                if (property_exists($requestInfo, "mAge") != FALSE) {
                    $addisional_data['m_age'] = $requestInfo->mAge;
                }
                if (property_exists($requestInfo, "familyTypeId") != FALSE) {
                    $addisional_data['family_type_id'] = $requestInfo->familyTypeId;
                }
                if (property_exists($requestInfo, "earnedMMNo") != FALSE) {
                    $addisional_data['male_earned_person'] = $requestInfo->earnedMMNo;
                }
                if (property_exists($requestInfo, "earnedFMNo") != FALSE) {
                    $addisional_data['female_earned_person'] = $requestInfo->earnedFMNo;
                }

// location mailing information

                if (property_exists($requestInfo, "mCountryId") != FALSE) {
                    $addisional_data['m_country_id'] = $requestInfo->mCountryId;
                }
                if (property_exists($requestInfo, "mDistrictId") != FALSE) {
                    $addisional_data['m_district_id'] = $requestInfo->mDistrictId;
                }
                if (property_exists($requestInfo, "mThanaId") != FALSE) {
                    $addisional_data['m_thana_id'] = $requestInfo->mThanaId;
                }
                if (property_exists($requestInfo, "mUnion") != FALSE) {
                    $addisional_data['m_union_name'] = $requestInfo->mUnion;
                }
                if (property_exists($requestInfo, "mPostId") != FALSE) {
                    $addisional_data['m_post_id'] = $requestInfo->mPostId;
                }
                if (property_exists($requestInfo, "mVill") != FALSE) {

                    $addisional_data['m_vill_name'] = $requestInfo->mVill;
                }
                if (property_exists($requestInfo, "mRoad") != FALSE) {

                    $addisional_data['m_road'] = $requestInfo->mRoad;
                }
// location present  information
                if (property_exists($requestInfo, "pCountryId") != FALSE) {
                    $addisional_data['p_country_id'] = $requestInfo->pCountryId;
                }
                if (property_exists($requestInfo, "pDistrictId") != FALSE) {
                    $addisional_data['p_district_id'] = $requestInfo->pDistrictId;
                }

                if (property_exists($requestInfo, "pVill") != FALSE) {
                    $addisional_data['p_vill_name'] = $requestInfo->pVill;
                }
                if (property_exists($requestInfo, "pUnion") != FALSE) {
                    $addisional_data['p_union_name'] = $requestInfo->pUnion;
                }
                if (property_exists($requestInfo, "pPostId") != FALSE) {
                    $addisional_data['p_post_id'] = $requestInfo->pPostId;
                }
                if (property_exists($requestInfo, "pThanaId") != FALSE) {
                    $addisional_data['p_thana_id'] = $requestInfo->pThanaId;
                }
                if (property_exists($requestInfo, "pRoad") != FALSE) {
                    $addisional_data['p_road'] = $requestInfo->pRoad;
                }

                if (property_exists($requestInfo, "mobile") != FALSE) {
                    $addisional_data['mobile'] = $requestInfo->mobile;
                }
                if (property_exists($requestInfo, "email") != FALSE) {
                    $addisional_data['email'] = $requestInfo->email;
                }

                if (property_exists($requestInfo, "distToCentre") != FALSE) {
                    $addisional_data['s_distance'] = $requestInfo->distToCentre;
                }

                if (property_exists($requestInfo, "cProfessionId") != FALSE) {
                    $addisional_data['current_profession_id'] = $requestInfo->cProfessionId;
                }
                if (property_exists($requestInfo, "pProfessionId") != FALSE) {
                    $addisional_data['previous_profession_id'] = $requestInfo->pProfessionId;
                }
//need to add database
                if (property_exists($requestInfo, "fBusinessPlan") != FALSE) {
                    $addisional_data['future_business_plan'] = $requestInfo->fBusinessPlan;
                }
                if (property_exists($requestInfo, "businessTypeId") != FALSE) {
                    $addisional_data['business_type_id'] = $requestInfo->businessTypeId;
                }
                if (property_exists($requestInfo, "mPrePYear") != FALSE) {
                    $addisional_data['previous_p_year_id'] = $requestInfo->mPrePYear;
                }
                if (property_exists($requestInfo, "totalMemberNo") != FALSE) {
                    $addisional_data['family_member_no'] = $requestInfo->totalMemberNo;
                }
                if (property_exists($requestInfo, "earningSource") != FALSE) {
                    $addisional_data['earning_source'] = $requestInfo->earningSource;
                }
                if (property_exists($requestInfo, "aEarningSource") != FALSE) {
                    $addisional_data['alt_earning_source'] = $requestInfo->aEarningSource;
                }
                if (property_exists($requestInfo, "cultivableLand") != FALSE) {
                    $addisional_data['cultivable_land'] = $requestInfo->cultivableLand;
                }
                if (property_exists($requestInfo, "unCultivableLand") != FALSE) {
                    $addisional_data['un_cultivable_land'] = $requestInfo->unCultivableLand;
                }
                if (property_exists($requestInfo, "ponds") != FALSE) {
                    $addisional_data['ponds'] = $requestInfo->ponds;
                }
                if (property_exists($requestInfo, "house") != FALSE) {
                    $addisional_data['house'] = $requestInfo->house;
                }
                if (property_exists($requestInfo, "totalLand") != FALSE) {
                    $addisional_data['total_land'] = $requestInfo->totalLand;
                }
                if (property_exists($requestInfo, "agIncome") != FALSE) {
                    $addisional_data['ag_income'] = $requestInfo->agIncome;
                }
                if (property_exists($requestInfo, "unAgIncome") != FALSE) {
                    $addisional_data['un_ag_income'] = $requestInfo->unAgIncome;
                }
                if (property_exists($requestInfo, "totalIncome") != FALSE) {
                    $addisional_data['total_income'] = $requestInfo->totalIncome;
                }
                if (property_exists($requestInfo, "totalExpenditure") != FALSE) {
                    $addisional_data['total_expence'] = $requestInfo->totalExpenditure;
                }
                if (property_exists($requestInfo, "loss") != FALSE) {
                    $addisional_data['loss'] = $requestInfo->loss;
                }
                if (property_exists($requestInfo, "tinHouse") != FALSE) {
                    $addisional_data['tin_house'] = $requestInfo->tinHouse;
                }
                if (property_exists($requestInfo, "strawHouse") != FALSE) {
                    $addisional_data['straw_house'] = $requestInfo->strawHouse;
                }
                if (property_exists($requestInfo, "brickHouse") != FALSE) {
                    $addisional_data['brick_house'] = $requestInfo->brickHouse;
                }
                if (property_exists($requestInfo, "receiveAmound") != FALSE) {
                    $addisional_data['receive_amound'] = $requestInfo->receiveAmound;
                }
                if (property_exists($requestInfo, "paidAmound") != FALSE) {
                    $addisional_data['paid_amound'] = $requestInfo->paidAmound;
                }
                if (property_exists($requestInfo, "remainningAmound") != FALSE) {
                    $addisional_data['re_amound'] = $requestInfo->remainningAmound;
                }
                if (property_exists($requestInfo, "paymentTypeId") != FALSE) {
                    $addisional_data['payment_type_id'] = $requestInfo->paymentTypeId;
                }
                if (property_exists($requestInfo, "financierCompany") != FALSE) {
                    $addisional_data['financier_company'] = $requestInfo->financierCompany;
                }
                if (property_exists($requestInfo, "loaningYear") != FALSE) {
                    $addisional_data['loaning_year'] = $requestInfo->loaningYear;
                }
                if (property_exists($requestInfo, "lastLoaningYear") != FALSE) {
                    $addisional_data['last_loaning_year'] = $requestInfo->lastLoaningYear;
                }
                if (property_exists($requestInfo, "investmentSector") != FALSE) {
                    $addisional_data['investment_sector'] = $requestInfo->investmentSector;
                }
                if (property_exists($requestInfo, "amount") != FALSE) {
                    $addisional_data['amount'] = $requestInfo->amount;
                }
                if (property_exists($requestInfo, "recomannd1") != FALSE) {
                    $addisional_data['recomannd1'] = $requestInfo->recomannd1;
                }
                if (property_exists($requestInfo, "recomannd2") != FALSE) {
                    $addisional_data['recomannd2'] = $requestInfo->recomannd2;
                }
            }
            $insert_id = $this->member_model->add_survey($addisional_data);
            if ($insert_id != -1) {
                $response["message"] = "Survey Information is Added Successfully!";
            } else {
                $response["message"] = "Sorry! Error While Adding Survey Information!";
            }
            echo json_encode($response);
            return;
        }
        $this->data['family_name_list'] = $this->utility->family_name();
        $this->data['name_title_list'] = $this->utility->name_title();
        $this->data['f_name_title_list'] = $this->utility->father_name_title();
        $this->data['m_name_title_list'] = $this->utility->mother_name_title();
        $this->data['age_list'] = $this->utility->age();
        $this->data['f_member_list'] = $this->utility->family_member();
        $this->data['passing_year_list'] = $this->utility->passing_year();
        $this->data['member_list'] = $this->utility->get_member_list();

        $this->data['zone_list'] = $this->member_model->get_zone_list($this->office_info['zone_id'])->result_array();
        $this->data['area_list'] = $this->member_model->get_area_list($this->office_info['zone_id'], $this->office_info['area_id'])->result_array();
        $this->data['branch_list'] = $this->member_model->get_branch_list($this->office_info['area_id'], $this->office_info['branch_id'])->result_array();
        $this->data['gender_list'] = $this->member_model->get_gender_list()->result_array();
        $this->data['post_list'] = $this->member_model->get_post_list()->result_array();
        $this->data['thana_list'] = $this->member_model->get_thana_list()->result_array();
        $this->data['district_list'] = $this->member_model->get_district_list()->result_array();
        $this->data['union_list'] = $this->member_model->get_union_list()->result_array();
        $this->data['country_list'] = $this->member_model->get_country_list()->result_array();
        $this->data['marital_list'] = $this->member_model->get_marital_list()->result_array();
        $this->data['profession_list'] = $this->member_model->get_profession_list()->result_array();
        $this->data['political_status_list'] = $this->member_model->get_political_statuses()->result_array();
        $this->data['business_type_list'] = $this->member_model->get_business_types()->result_array();
        $this->data['family_type_list'] = $this->member_model->get_family_types()->result_array();
        $this->data['educations_list'] = $this->member_model->get_education_list()->result_array();
        $this->data['payment_types'] = $this->member_model->get_payment_type_list()->result_array();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/index', $this->data);
    }

    public function add_addmission_info() {
        if (file_get_contents("php://input") != null) {
            $user_name = "";
            $response = array();
            $postdata = file_get_contents("php://input");
            $requestData = json_decode($postdata);
            if (property_exists($requestData, "memberSurveyInfo") != FALSE) {
                $requestInfo = $requestData->memberSurveyInfo;
                $addisional_data = array();
                $member_info = array();
                $member_family_info = array();
                $member_address_info = array();
                $member_profession_info = array();
                $member_land_info = array();
                $member_investment_info = array();
// area information
                if (property_exists($requestInfo, "zone_id") != FALSE) {
                    $member_info['zone_id'] = $requestInfo->zone_id;
                }
                if (property_exists($requestInfo, "area_id") != FALSE) {
                    $member_info['area_id'] = $requestInfo->area_id;
                }
                if (property_exists($requestInfo, "branch_id") != FALSE) {
                    $member_info['branch_id'] = $requestInfo->branch_id;
                }

// basic information

                if (property_exists($requestInfo, "name_title") != FALSE) {
                    $member_info['name_title'] = $requestInfo->name_title;
                }
                if (property_exists($requestInfo, "first_name") != FALSE) {
                    $member_info['first_name'] = $requestInfo->first_name;
                }
                if (property_exists($requestInfo, "last_name") != FALSE) {
                    $member_info['last_name'] = $requestInfo->last_name;
                }
                if (property_exists($requestInfo, "sur_name") != FALSE) {
                    $member_info['sur_name'] = $requestInfo->sur_name;
                }
                if (property_exists($requestInfo, "gender_id") != FALSE) {
                    $member_info['gender_id'] = $requestInfo->gender_id;
                }
                if (property_exists($requestInfo, "age") != FALSE) {
                    $member_info['age'] = $requestInfo->age;
                }
                if (property_exists($requestInfo, "education_id") != FALSE) {
                    $member_info['education_id'] = $requestInfo->education_id;
                }
                if (property_exists($requestInfo, "passing_year") != FALSE) {
                    $member_info['passing_year'] = $requestInfo->passing_year;
                }
                if (property_exists($requestInfo, "nid") != FALSE) {
                    $member_info['nid'] = $requestInfo->nid;
                }
                if (property_exists($requestInfo, "marital_id") != FALSE) {
                    $member_info['marital_id'] = $requestInfo->marital_id;
                }
                if (property_exists($requestInfo, "political_status_id") != FALSE) {
                    $member_info['political_status_id'] = $requestInfo->political_status_id;
                }
                if (property_exists($requestInfo, "mobile") != FALSE) {
                    $member_info['mobile'] = $requestInfo->mobile;
                }
                if (property_exists($requestInfo, "email") != FALSE) {
                    $member_info['email'] = $requestInfo->email;
                }
                if (property_exists($requestInfo, "s_distance") != FALSE) {
                    $member_info['s_distance'] = $requestInfo->s_distance;
                }





// father info

                if (property_exists($requestInfo, "f_name_title") != FALSE) {
                    $member_family_info['f_name_title'] = $requestInfo->f_name_title;
                }
                if (property_exists($requestInfo, "f_first_name") != FALSE) {
                    $member_family_info['f_first_name'] = $requestInfo->f_first_name;
                }
                if (property_exists($requestInfo, "f_last_name") != FALSE) {
                    $member_family_info['f_last_name'] = $requestInfo->f_last_name;
                }
                if (property_exists($requestInfo, "f_age") != FALSE) {
                    $member_family_info['f_age'] = $requestInfo->f_age;
                }
                if (property_exists($requestInfo, "f_profession") != FALSE) {
                    $member_family_info['f_profession'] = $requestInfo->f_profession;
                }


                if (property_exists($requestInfo, "guardian_email") != FALSE) {
                    $member_family_info['guardian_email'] = $requestInfo->guardian_email;
                }
                if (property_exists($requestInfo, "family_member_no") != FALSE) {
                    $member_family_info['family_member_no'] = $requestInfo->family_member_no;
                }
// mother info 

                if (property_exists($requestInfo, "m_name_title") != FALSE) {
                    $member_family_info['m_name_title'] = $requestInfo->m_name_title;
                }
                if (property_exists($requestInfo, "m_first_name") != FALSE) {
                    $member_family_info['m_first_name'] = $requestInfo->m_first_name;
                }
                if (property_exists($requestInfo, "m_last_name") != FALSE) {
                    $member_family_info['m_last_name'] = $requestInfo->m_last_name;
                }
                if (property_exists($requestInfo, "m_age") != FALSE) {
                    $member_family_info['m_age'] = $requestInfo->m_age;
                }


                if (property_exists($requestInfo, "family_type_id") != FALSE) {
                    $member_family_info['family_type_id'] = $requestInfo->family_type_id;
                }
                if (property_exists($requestInfo, "male_earned_person") != FALSE) {
                    $member_family_info['male_earned_person'] = $requestInfo->male_earned_person;
                }
                if (property_exists($requestInfo, "female_earned_person") != FALSE) {
                    $member_family_info['female_earned_person'] = $requestInfo->female_earned_person;
                }
                if (property_exists($requestInfo, "male_member") != FALSE) {
                    $member_family_info['male_member'] = $requestInfo->male_member;
                }
                if (property_exists($requestInfo, "female_member") != FALSE) {
                    $member_family_info['female_member'] = $requestInfo->female_member;
                }

// addresses

                if (property_exists($requestInfo, "m_country_id") != FALSE) {
                    $member_address_info['m_country_id'] = $requestInfo->m_country_id;
                }

                if (property_exists($requestInfo, "m_district_id") != FALSE) {
                    $member_address_info['m_district_id'] = $requestInfo->m_district_id;
                }
                if (property_exists($requestInfo, "m_thana_id") != FALSE) {
                    $member_address_info['m_thana_id'] = $requestInfo->m_thana_id;
                }
                if (property_exists($requestInfo, "m_union_name") != FALSE) {
                    $member_address_info['m_union_name'] = $requestInfo->m_union_name;
                }
                if (property_exists($requestInfo, "m_post_id") != FALSE) {
                    $member_address_info['m_post_id'] = $requestInfo->m_post_id;
                }
                if (property_exists($requestInfo, "m_vill_name") != FALSE) {

                    $member_address_info['m_vill_name'] = $requestInfo->m_vill_name;
                }
                if (property_exists($requestInfo, "m_road") != FALSE) {

                    $member_address_info['m_road'] = $requestInfo->m_road;
                }
                if (property_exists($requestInfo, "p_country_id") != FALSE) {
                    $member_address_info['p_country_id'] = $requestInfo->p_country_id;
                }
                if (property_exists($requestInfo, "p_district_id") != FALSE) {
                    $member_address_info['p_district_id'] = $requestInfo->p_district_id;
                }

                if (property_exists($requestInfo, "p_thana_id") != FALSE) {
                    $member_address_info['p_thana_id'] = $requestInfo->p_thana_id;
                }
                if (property_exists($requestInfo, "p_vill_name") != FALSE) {
                    $member_address_info['p_vill_name'] = $requestInfo->p_vill_name;
                }
                if (property_exists($requestInfo, "p_union_name") != FALSE) {
                    $member_address_info['p_union_name'] = $requestInfo->p_union_name;
                }
                if (property_exists($requestInfo, "p_post_id") != FALSE) {
                    $member_address_info['p_post_id'] = $requestInfo->p_post_id;
                }
                if (property_exists($requestInfo, "p_road") != FALSE) {
                    $member_address_info['p_road'] = $requestInfo->p_road;
                }


//profession info
                if (property_exists($requestInfo, "current_profession_id") != FALSE) {
                    $member_profession_info['current_profession_id'] = $requestInfo->current_profession_id;
                }
                if (property_exists($requestInfo, "previous_profession_id") != FALSE) {
                    $member_profession_info['previous_profession_id'] = $requestInfo->previous_profession_id;
                }
                if (property_exists($requestInfo, "business_type_id") != FALSE) {
                    $member_profession_info['business_type_id'] = $requestInfo->business_type_id;
                }
                if (property_exists($requestInfo, "future_business_plan") != FALSE) {
                    $member_profession_info['future_business_plan'] = $requestInfo->future_business_plan;
                }

                if (property_exists($requestInfo, "previous_p_year_id") != FALSE) {
                    $member_profession_info['previous_p_year_id'] = $requestInfo->previous_p_year_id;
                }
                if (property_exists($requestInfo, "earning_source") != FALSE) {
                    $member_profession_info['earning_source'] = $requestInfo->earning_source;
                }
                if (property_exists($requestInfo, "alt_earning_source") != FALSE) {
                    $member_profession_info['alt_earning_source'] = $requestInfo->alt_earning_source;
                }


                //land info
                if (property_exists($requestInfo, "cultivable_land") != FALSE) {
                    $member_land_info['cultivable_land'] = $requestInfo->cultivable_land;
                }
                if (property_exists($requestInfo, "un_cultivable_land") != FALSE) {
                    $member_land_info['un_cultivable_land'] = $requestInfo->un_cultivable_land;
                }
                if (property_exists($requestInfo, "ponds") != FALSE) {
                    $member_land_info['ponds'] = $requestInfo->ponds;
                }
                if (property_exists($requestInfo, "house") != FALSE) {
                    $member_land_info['house'] = $requestInfo->house;
                }
                if (property_exists($requestInfo, "total_land") != FALSE) {
                    $member_land_info['total_land'] = $requestInfo->total_land;
                }
                if (property_exists($requestInfo, "ag_income") != FALSE) {
                    $member_land_info['ag_income'] = $requestInfo->ag_income;
                }
                if (property_exists($requestInfo, "un_ag_income") != FALSE) {
                    $member_land_info['un_ag_income'] = $requestInfo->un_ag_income;
                }
                if (property_exists($requestInfo, "total_income") != FALSE) {
                    $member_land_info['total_income'] = $requestInfo->total_income;
                }
                if (property_exists($requestInfo, "total_expence") != FALSE) {
                    $member_land_info['total_expence'] = $requestInfo->total_expence;
                }
                if (property_exists($requestInfo, "loss") != FALSE) {
                    $member_land_info['loss'] = $requestInfo->loss;
                }
                if (property_exists($requestInfo, "tin_house") != FALSE) {
                    $member_land_info['tin_house'] = $requestInfo->tin_house;
                }
                if (property_exists($requestInfo, "straw_house") != FALSE) {
                    $member_land_info['straw_house'] = $requestInfo->straw_house;
                }
                if (property_exists($requestInfo, "brick_house") != FALSE) {
                    $member_land_info['brick_house'] = $requestInfo->brick_house;
                }
                //investment info
                if (property_exists($requestInfo, "receive_amound") != FALSE) {
                    $member_investment_info['receive_amound'] = $requestInfo->receive_amound;
                }
                if (property_exists($requestInfo, "paid_amound") != FALSE) {
                    $member_investment_info['paid_amound'] = $requestInfo->paid_amound;
                }
                if (property_exists($requestInfo, "re_amound") != FALSE) {
                    $member_investment_info['re_amound'] = $requestInfo->re_amound;
                }
                if (property_exists($requestInfo, "payment_type_id") != FALSE) {
                    $member_investment_info['payment_type_id'] = $requestInfo->payment_type_id;
                }
                if (property_exists($requestInfo, "financier_company") != FALSE) {
                    $member_investment_info['financier_company'] = $requestInfo->financier_company;
                }
                if (property_exists($requestInfo, "loaning_year") != FALSE) {
                    $member_investment_info['loaning_year'] = $requestInfo->loaning_year;
                }
                if (property_exists($requestInfo, "last_loaning_year") != FALSE) {
                    $member_investment_info['last_loaning_year'] = $requestInfo->last_loaning_year;
                }
                if (property_exists($requestInfo, "investment_sector") != FALSE) {
                    $member_investment_info['investment_sector'] = $requestInfo->investment_sector;
                }
                if (property_exists($requestInfo, "amount") != FALSE) {
                    $member_investment_info['amount'] = $requestInfo->amount;
                }
                if (property_exists($requestInfo, "recomannd1") != FALSE) {
                    $member_investment_info['recomannd1'] = $requestInfo->recomannd1;
                }
                if (property_exists($requestInfo, "recomannd2") != FALSE) {
                    $member_investment_info['recomannd2'] = $requestInfo->recomannd2;
                }
                //application form
                if (property_exists($requestInfo, "m_business_name") != FALSE) {
                    $addisional_data['m_business_name'] = $requestInfo->m_business_name;
                }
                if (property_exists($requestInfo, "m_bus_type_name") != FALSE) {
                    $addisional_data['m_bus_type_name'] = $requestInfo->m_bus_type_name;
                }
                if (property_exists($requestInfo, "m_business_expre") != FALSE) {
                    $addisional_data['m_business_expre'] = $requestInfo->m_business_expre;
                }
                if (property_exists($requestInfo, "m_business_adds") != FALSE) {
                    $addisional_data['m_business_adds'] = $requestInfo->m_business_adds;
                }
                if (property_exists($requestInfo, "m_bus_date") != FALSE) {
                    $addisional_data['m_bus_date'] = $requestInfo->m_bus_date;
                }
                if (property_exists($requestInfo, "m_bus_infrastructure") != FALSE) {
                    $addisional_data['m_bus_infrastructure'] = $requestInfo->m_bus_infrastructure;
                }
                if (property_exists($requestInfo, "m_bus_from_foot") != FALSE) {
                    $addisional_data['m_bus_from_foot'] = $requestInfo->m_bus_from_foot;
                }
                if (property_exists($requestInfo, "m_bus_to_foot") != FALSE) {
                    $addisional_data['m_bus_to_foot'] = $requestInfo->m_bus_to_foot;
                }
                if (property_exists($requestInfo, "m_bus_direction") != FALSE) {
                    $addisional_data['m_bus_direction'] = $requestInfo->m_bus_direction;
                }
                if (property_exists($requestInfo, "m_bus_place") != FALSE) {
                    $addisional_data['m_bus_place'] = $requestInfo->m_bus_place;
                }
                if (property_exists($requestInfo, "m_trade_licence") != FALSE) {
                    $addisional_data['m_trade_licence'] = $requestInfo->m_trade_licence;
                }
                if (property_exists($requestInfo, "m_admin") != FALSE) {
                    $addisional_data['m_admin'] = $requestInfo->m_admin;
                }
                if (property_exists($requestInfo, "m_capital") != FALSE) {
                    $addisional_data['m_capital'] = $requestInfo->m_capital;
                }
                if (property_exists($requestInfo, "m_avg_sale") != FALSE) {
                    $addisional_data['m_avg_sale'] = $requestInfo->m_avg_sale;
                }
                if (property_exists($requestInfo, "m_bank") != FALSE) {
                    $addisional_data['m_bank'] = $requestInfo->m_bank;
                }
                if (property_exists($requestInfo, "m_ngo") != FALSE) {
                    $addisional_data['m_ngo'] = $requestInfo->m_ngo;
                }
                if (property_exists($requestInfo, "m_self") != FALSE) {
                    $addisional_data['m_self'] = $requestInfo->m_self;
                }
                if (property_exists($requestInfo, "m_loan") != FALSE) {
                    $addisional_data['m_loan'] = $requestInfo->m_loan;
                }
                if (property_exists($requestInfo, "m_monthly_income") != FALSE) {
                    $addisional_data['m_monthly_income'] = $requestInfo->m_monthly_income;
                }
                if (property_exists($requestInfo, "m_monthly_expen") != FALSE) {
                    $addisional_data['m_monthly_expen'] = $requestInfo->m_monthly_expen;
                }
                if (property_exists($requestInfo, "m_surplus") != FALSE) {
                    $addisional_data['m_surplus'] = $requestInfo->m_surplus;
                }
                if (property_exists($requestInfo, "m_others_m_income") != FALSE) {
                    $addisional_data['m_others_m_income'] = $requestInfo->m_others_m_income;
                }
                if (property_exists($requestInfo, "m_others_total_income") != FALSE) {
                    $addisional_data['m_others_total_income'] = $requestInfo->m_others_total_income;
                }
                if (property_exists($requestInfo, "m_others_m_exp") != FALSE) {
                    $addisional_data['m_others_m_exp'] = $requestInfo->m_others_m_exp;
                }
                if (property_exists($requestInfo, "m_extra") != FALSE) {
                    $addisional_data['m_extra'] = $requestInfo->m_extra;
                }
                if (property_exists($requestInfo, "m_total_extra") != FALSE) {
                    $addisional_data['m_total_extra'] = $requestInfo->m_total_extra;
                }
                if (property_exists($requestInfo, "m_bus_type_id") != FALSE) {
                    $addisional_data['m_bus_type_id'] = $requestInfo->m_bus_type_id;
                }
                if (property_exists($requestInfo, "m_others") != FALSE) {
                    $addisional_data['m_others'] = $requestInfo->m_others;
                }
                if (property_exists($requestInfo, "start_first_half") != FALSE) {
                    $addisional_data['start_first_half'] = $requestInfo->start_first_half;
                }
                if (property_exists($requestInfo, "last_first_half") != FALSE) {
                    $addisional_data['last_first_half'] = $requestInfo->last_first_half;
                }
                if (property_exists($requestInfo, "first_second_half") != FALSE) {
                    $addisional_data['first_second_half'] = $requestInfo->first_second_half;
                }
                if (property_exists($requestInfo, "last_second_half") != FALSE) {
                    $addisional_data['last_second_half'] = $requestInfo->last_second_half;
                }
                if (property_exists($requestInfo, "total_time") != FALSE) {
                    $addisional_data['total_time'] = $requestInfo->total_time;
                }
                if (property_exists($requestInfo, "opening_time") != FALSE) {
                    $addisional_data['opening_time'] = $requestInfo->opening_time;
                }
                if (property_exists($requestInfo, "closing_time") != FALSE) {
                    $addisional_data['closing_time'] = $requestInfo->closing_time;
                }
                if (property_exists($requestInfo, "intervel_start") != FALSE) {
                    $addisional_data['intervel_start'] = $requestInfo->intervel_start;
                }
                if (property_exists($requestInfo, "intervel_end") != FALSE) {
                    $addisional_data['intervel_end'] = $requestInfo->intervel_end;
                }
                if (property_exists($requestInfo, "total_member") != FALSE) {
                    $addisional_data['total_member'] = $requestInfo->total_member;
                }
            }
            $insert_id = $this->member_model->add_addmission_info($member_info, $member_family_info, $member_address_info, $member_profession_info, $member_land_info, $member_investment_info, $addisional_data);
            if ($insert_id != -1) {
                $response["message"] = "Member Addmission Information is Added Successfully!";
            } else {
                $response["message"] = "Sorry! Error While Adding Member Addmission Information !";
            }
            echo json_encode($response);
            return;
        }
        $this->data['family_name_list'] = $this->utility->family_name();
        $this->data['name_title_list'] = $this->utility->name_title();
        $this->data['f_name_title_list'] = $this->utility->father_name_title();
        $this->data['m_name_title_list'] = $this->utility->mother_name_title();
        $this->data['age_list'] = $this->utility->age();
        $this->data['f_member_list'] = $this->utility->family_member();
        $this->data['passing_year_list'] = $this->utility->passing_year();
        $this->data['member_list'] = $this->utility->get_member_list();

        $this->data['zone_list'] = $this->member_model->get_zone_list($this->office_info['zone_id'])->result_array();
        $this->data['area_list'] = $this->member_model->get_area_list($this->office_info['zone_id'], $this->office_info['area_id'])->result_array();
        $this->data['branch_list'] = $this->member_model->get_branch_list($this->office_info['area_id'], $this->office_info['branch_id'])->result_array();
        $this->data['gender_list'] = $this->member_model->get_gender_list()->result_array();
        $this->data['post_list'] = $this->member_model->get_post_list()->result_array();
        $this->data['thana_list'] = $this->member_model->get_thana_list()->result_array();
        $this->data['district_list'] = $this->member_model->get_district_list()->result_array();
        $this->data['union_list'] = $this->member_model->get_union_list()->result_array();
        $this->data['country_list'] = $this->member_model->get_country_list()->result_array();
        $this->data['marital_list'] = $this->member_model->get_marital_list()->result_array();
        $this->data['profession_list'] = $this->member_model->get_profession_list()->result_array();
        $this->data['political_status_list'] = $this->member_model->get_political_statuses()->result_array();
        $this->data['business_type_list'] = $this->member_model->get_business_types()->result_array();
        $this->data['family_type_list'] = $this->member_model->get_family_types()->result_array();
        $this->data['educations_list'] = $this->member_model->get_education_list()->result_array();
        $this->data['payment_types'] = $this->member_model->get_payment_type_list()->result_array();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/addmision', $this->data);
    }

    public function get_survey_info() {
        if (file_get_contents("php://input") != null) {
            $user_name = "";
            $response = array();
            $postdata = file_get_contents("php://input");
            $requestData = json_decode($postdata);
            if (property_exists($requestData, "searchParam") != FALSE) {
                $search_info = $requestData->searchParam;
                $searh_param = 0;
                if (property_exists($search_info, "searchFlag") != FALSE) {
                    $searh_param = $search_info->searchFlag;
                }
                if (property_exists($search_info, "searchValue") != FALSE) {
                    $search_value = $search_info->searchValue;
                }
                $nid = "";
                $email = "";
                $mobile = "";
                if ($searh_param == SEARCH_BY_NID) {
                    $nid = $search_value;
                }
                if ($searh_param == SEARCH_BY_EMAIL) {
                    $email = $search_value;
                }
                if ($searh_param == SEARCH_BY_MOBILE) {
                    $mobile = $search_value;
                }
                $result = $this->member_model->get_survey_info($nid, $email, $mobile)->result_array();
                if (!empty($result)) {
                    $response['survey_info'] = $result[0];
                }
            }
            echo json_encode($response);
            return;
        }
    }

    public function get_member_info() {
        $this->load->library('member_library');
        if (file_get_contents("php://input") != null) {
            $user_name = "";
            $response = array();
            $postdata = file_get_contents("php://input");
            $requestData = json_decode($postdata);
            if (property_exists($requestData, "searchParam") != FALSE) {
                $search_info = $requestData->searchParam;
                $searh_param = 0;
                if (property_exists($search_info, "searchFlag") != FALSE) {
                    $searh_param = $search_info->searchFlag;
                }
                if (property_exists($search_info, "searchValue") != FALSE) {
                    $search_value = $search_info->searchValue;
                }
                $nid = "";
                $email = "";
                $mobile = "";
                if ($searh_param == SEARCH_BY_NID) {
                    $nid = $search_value;
                }
                if ($searh_param == SEARCH_BY_EMAIL) {
                    $email = $search_value;
                }
                if ($searh_param == SEARCH_BY_MOBILE) {
                    $mobile = $search_value;
                }
                $response['member_info'] = $this->member_library->get_member_info($nid, $email, $mobile);
            }
            echo json_encode($response);
            return;
        }
    }

    public function addmission_12() {
        $this->data['app_name'] = MEMBER_APP;
        $this->data['test'] = "";
        $this->template->load(MEMBER_TEMPLATE, 'member/addmision', $this->data);
    }

    public function loan_application() {
        $this->data['zone_list'] = $this->member_model->get_zone_list()->result_array();
        $this->data['area_list'] = $this->member_model->get_area_list()->result_array();
        $this->data['branch_list'] = $this->member_model->get_branch_list()->result_array();
        $this->data['name_title_list'] = $this->utility->name_title();
        $this->data['family_name_list'] = $this->utility->family_name();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/loan_application', $this->data);
    }
    public function loan_application1() {
        $this->data['zone_list'] = $this->member_model->get_zone_list()->result_array();
        $this->data['area_list'] = $this->member_model->get_area_list()->result_array();
        $this->data['branch_list'] = $this->member_model->get_branch_list()->result_array();
        $this->data['name_title_list'] = $this->utility->name_title();
        $this->data['family_name_list'] = $this->utility->family_name();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/loan_application_form_part1', $this->data);
    }
    public function loan_application2() {
        $this->data['zone_list'] = $this->member_model->get_zone_list()->result_array();
        $this->data['area_list'] = $this->member_model->get_area_list()->result_array();
        $this->data['branch_list'] = $this->member_model->get_branch_list()->result_array();
        $this->data['name_title_list'] = $this->utility->name_title();
        $this->data['family_name_list'] = $this->utility->family_name();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/loan_application_form_part2', $this->data);
    }

    public function loan_application3() {
        $this->data['zone_list'] = $this->member_model->get_zone_list()->result_array();
        $this->data['area_list'] = $this->member_model->get_area_list()->result_array();
        $this->data['branch_list'] = $this->member_model->get_branch_list()->result_array();
        $this->data['name_title_list'] = $this->utility->name_title();
        $this->data['family_name_list'] = $this->utility->family_name();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/loan_application_form_part3', $this->data);
    }

    public function loan_application4() {
        $this->data['zone_list'] = $this->member_model->get_zone_list()->result_array();
        $this->data['area_list'] = $this->member_model->get_area_list()->result_array();
        $this->data['branch_list'] = $this->member_model->get_branch_list()->result_array();
        $this->data['name_title_list'] = $this->utility->name_title();
        $this->data['family_name_list'] = $this->utility->family_name();
        $this->data['app_name'] = MEMBER_APP;
        $this->template->load(MEMBER_TEMPLATE, 'member/loan_application_form_part4', $this->data);
    }

    public function add_feedback() {
        $this->form_validation->set_error_delimiters("<div style='color:red'>", '</div>');
        $this->form_validation->set_rules('name', 'Name', 'xss_clean|required');
        $this->form_validation->set_rules('current_address', 'Current Address', 'xss_clean|required');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'xss_clean|required');
        $this->form_validation->set_rules('email', 'Email', 'xss_clean|required');
        $this->form_validation->set_rules('cell', 'Cell', 'xss_clean|required');
        $this->form_validation->set_rules('academic_qualification', 'Academic Qualification', 'xss_clean|required');
        $this->form_validation->set_rules('personal_skills', 'Personal Skills', 'xss_clean|required');
        $this->form_validation->set_rules('reference', 'Reference', 'xss_clean|required');
        if ($this->input->post()) {
            if ($this->form_validation->run() == true) {
                $feedback_data = array(
                    'name' => $this->input->post('name'),
                    'current_address' => $this->input->post('current_address'),
                    'permanent_address' => $this->input->post('permanent_address'),
                    'national_id' => $this->input->post('national_id'),
                    'passport_id' => $this->input->post('passport_id'),
                    'email' => $this->input->post('email'),
                    'skype' => $this->input->post('skype'),
                    'cell' => $this->input->post('cell'),
                    'blood_group' => $this->input->post('blood_group'),
                    'religion' => $this->input->post('religion'),
                    'personal_statement' => $this->input->post('personal_statement'),
                    'academic_qualification' => $this->input->post('academic_qualification'),
                    'volunteering_skills' => $this->input->post('volunteering_skills'),
                    'knowledge_of_speciality' => $this->input->post('knowledge_of_specialty'),
                    'personal_skills' => $this->input->post('personal_skills'),
                    'hobbies_and_interests' => $this->input->post('hobbies_and_interest'),
                    'total_friends' => $this->input->post('no_of_friends_on_facebook'),
                    'reference' => $this->input->post('reference'),
                );
                $feedback_id = $this->feedback_model->add_feedback($feedback_data);
                if ($feedback_id !== FALSE) {
                    $this->data['message'] = "Thank you for your inofrmation.";
                } else {
                    $this->data['message'] = "System error. Please try again.";
                }
            } else {
                $this->data['message'] = validation_errors();
            }
        }
        $this->data['name'] = array(
            'id' => 'name',
            'name' => 'name',
            'type' => 'text',
        );

        $this->data['current_address'] = array(
            'id' => 'current_address',
            'name' => 'current_address',
            'type' => 'text',
        );
        $this->data['permanent_address'] = array(
            'id' => 'permanent_address',
            'name' => 'permanent_address',
            'type' => 'text',
        );

        $this->data['national_id'] = array(
            'id' => 'national_id',
            'name' => 'national_id',
            'type' => 'text',
        );
        $this->data['passport_id'] = array(
            'id' => 'passport_id',
            'name' => 'passport_id',
            'type' => 'text',
        );

        $this->data['email'] = array(
            'id' => 'email',
            'name' => 'email',
            'type' => 'text',
        );
        $this->data['skype'] = array(
            'id' => 'skype',
            'name' => 'skype',
            'type' => 'text',
        );
        $this->data['cell'] = array(
            'id' => 'cell',
            'name' => 'cell',
            'type' => 'text',
        );
        $this->data['blood_group'] = array(
            'id' => 'blood_group',
            'name' => 'blood_group',
            'type' => 'text',
        );
        $this->data['religion'] = array(
            'id' => 'religion',
            'name' => 'religion',
            'type' => 'text',
        );

        $this->data['personal_statement'] = array(
            'id' => 'personal_statement',
            'name' => 'personal_statement',
            'rows' => '1',
        );

        $this->data['academic_qualification'] = array(
            'id' => 'academic_qualification',
            'name' => 'academic_qualification',
            'rows' => '1',
        );

        $this->data['volunteering_skills'] = array(
            'id' => 'volunteering_skills',
            'name' => 'volunteering_skills',
            'rows' => '1',
        );


        $this->data['knowledge_of_specialty'] = array(
            'id' => 'knowledge_of_specialty',
            'name' => 'knowledge_of_specialty',
            'type' => 'text',
        );
        $this->data['personal_skills'] = array(
            'id' => 'personal_skills',
            'name' => 'personal_skills',
            'rows' => '1',
        );
        $this->data['hobbies_and_interest'] = array(
            'id' => 'hobbies_and_interest',
            'name' => 'hobbies_and_interest',
            'rows' => '1',
        );
        $this->data['no_of_friends_on_facebook'] = array(
            'id' => 'no_of_friends_on_facebook',
            'name' => 'no_of_friends_on_facebook',
            'type' => 'text',
        );
        $this->data['reference'] = array(
            'id' => 'reference',
            'name' => 'reference',
            'rows' => '1',
        );
        $this->data['submit'] = array(
            'id' => 'submit',
            'name' => 'submit',
            'type' => 'submit',
            'value' => 'submit',
        );
        $this->template->load(MEMBER_LOGIN_SUCCESS_TEMPLATE, 'member/add_feedback', $this->data);
    }

    public function upload_picture($image_data, $image_name, $image_path) {
        $response = array();
        list(, $data) = explode(',', $image_data);
        $final_image_data = base64_decode($data);
        $file = $image_path . $image_name;
        $result = file_put_contents($file, $final_image_data);
        if ($result != null) {
            $response['status'] = 1;
        } else {
            $response['status'] = 0;
        }
        return $response;
    }

    function add_cover_picture($nid = 0) {
        $response = array();
        $image_data = $this->input->post('imageData');

        // image upload to user album for database save 
        $temp_src_name = $nid . '.jpg';
        $user_image_path = USER_ALBUM_IMAGE_PATH;
        $result = $this->upload_picture($image_data, $temp_src_name, $user_image_path);
        if ($result['status'] != 0) {
            $response["nid"] = $nid;
            echo json_encode($response);
        }
    }

}
