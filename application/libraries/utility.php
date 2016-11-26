<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utility {

    public function family_name() {
        $family_name = array(
            0 => "খান",
            1 => "মোল্লা",
            2 => "শেখ",
            3 => "মণ্ডল",
            4 => "সর্দার",
            5 => "চৌধুরী"
        );
        return $family_name;
    }

    public function name_title() {
        $name_title = array(
            0 => "Mr",
            1 => "Mrs",
            2 => "Mss"
        );
        return $name_title;
    }

    public function father_name_title() {
        $father_name_title = array(
            0 => "Mr"
        );
        return $father_name_title;
    }

    public function mother_name_title() {
        $mother_name_title = array(
            0 => "Mrs",
            1 => "Ms"
        );
        return $mother_name_title;
    }

    public function age() {
        $age[] = array();
        $age[0] = 1;
        for ($i = 1; $i < 100; $i++) {
            $age[$i] = $i + 1;
        }
        return $age;
    }

    public function get_member_list() {
        $age[] = array();
        $age[0] = 1;
        for ($i = 1; $i < 10; $i++) {
            $age[$i] = $i + 1;
        }
        return $age;
    }

    public function family_member() {
        $family_member[] = array();
        $family_member[0] = 2;
        for ($i = 1; $i < 30; $i++) {
            $family_member[$i] = $i + 1;
        }
        return $family_member;
    }

    public function passing_year() {
        $passing_year[] = array();
        $passing_year[0] = 1950;
        for ($i = 1950; $i < 2050; $i++) {
            $passing_year[$i] = $i + 1;
        }
        return $passing_year;
    }

    public function get_product_types() {
        $product_types = array();
        $savings_obj = new stdClass();
        $savings_obj->id = PRODUCT_TYPE_Id_SAVINGS;
        $savings_obj->name = PRODUCT_TYPE_NAME_FOR_SAVINGS;
        $loan_obj = new stdClass();
        $loan_obj->id = PRODUCT_TYPE_Id_LOAN;
        $loan_obj->name = PRODUCT_TYPE_NAME_FOR_LOAN;
        $product_types[] = $savings_obj;
        $product_types[] = $loan_obj;
        return $product_types;
    }
    public function get_interest_calculation_methods() {
        $interset_cal_methods = array();
       $interset_cal_methods[] =  INTEREST_CALCULATION_METHOD_DECLINE;
       $interset_cal_methods[] =  INTEREST_CALCULATION_METHOD_FLAT;
        return $interset_cal_methods;
    }

}

?>