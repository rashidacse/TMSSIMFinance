angular.module('controller.Member', ['services.Member']).
        controller('memberController', function ($scope, memberService) {
            $scope.memberSurveyInfo = {};
            $scope.searchParam = {};
            $scope.zoneList = [];
            $scope.areaList = [];
            $scope.branchList = [];
            $scope.genderList = [];
            $scope.educationList = [];
            $scope.ageList = [];
            $scope.yearList = [];
            $scope.proList = [];
            $scope.maritalList = [];
            $scope.politicalStatusList = [];
            $scope.nameTitleList = [];
            $scope.districtList = [];
            $scope.unionList = [];
            $scope.familyTitleList = [];
            $scope.fTitleList = [];
            $scope.mTitleList = [];
            $scope.thanaList = [];
            $scope.postList = [];
            $scope.paymentTypeList = [];
            $scope.memberNoList = [];
            $scope.surveyList = [];
            $scope.memberList = [];
            $scope.allow_action = true;

            $scope.setPaymentTypeList = function (paymentTypeList) {
                $scope.paymentTypeList = JSON.parse(paymentTypeList);
            }

            $scope.setSurveyList = function (surveyList) {
                $scope.surveyList = JSON.parse(surveyList);
                console.log($scope.surveyList);
            }

            $scope.setMemberInfoList = function (memberList) {
                $scope.memberList = JSON.parse(memberList);
                console.log($scope.memberList);
            }
            $scope.setUnionList = function (unionList) {
                $scope.unionList = JSON.parse(unionList);
            }
            $scope.setDistrictList = function (districtList) {
                $scope.districtList = JSON.parse(districtList);
            }
            $scope.setPostList = function (postList) {
                $scope.postList = JSON.parse(postList);
            }
            $scope.setThanaList = function (thanaList) {
                $scope.thanaList = JSON.parse(thanaList);
            }
            $scope.setMemberList = function (memberNoList) {
                $scope.memberNoList = JSON.parse(memberNoList);
            }
            $scope.setBTypeList = function (bTypeList) {
                $scope.bTypeList = JSON.parse(bTypeList);
            }
            $scope.setNameTitleList = function (nameTitleList) {
                $scope.nameTitleList = JSON.parse(nameTitleList);
            }
            $scope.setFamilyTitleList = function (familyTitleList) {
                $scope.familyTitleList = JSON.parse(familyTitleList);
            }
            $scope.setFTitleList = function (fTitleList) {
                $scope.fTitleList = JSON.parse(fTitleList);
            }
            $scope.setMTitleList = function (mTitleList) {
                $scope.mTitleList = JSON.parse(mTitleList);
            }
            $scope.setZoneList = function (zoneList) {
                $scope.zoneList = JSON.parse(zoneList);
            }
            $scope.setAreaList = function (areaList) {
                $scope.areaList = JSON.parse(areaList);
            }
            $scope.setBranchList = function (branchList) {
                $scope.branchList = JSON.parse(branchList);
            }
            $scope.setGenderList = function (genderList) {
                $scope.genderList = JSON.parse(genderList);
            }
            $scope.setAgeList = function (ageList) {
                $scope.ageList = JSON.parse(ageList);
            }
            $scope.setEducationList = function (educationList) {
                $scope.educationList = JSON.parse(educationList);
            }
            $scope.setYearList = function (yearList) {
                $scope.yearList = JSON.parse(yearList);
            }
            $scope.setProfessionList = function (proList) {
                $scope.proList = JSON.parse(proList);
            }
            $scope.setMaritalList = function (maritalList) {
                $scope.maritalList = JSON.parse(maritalList);
            }
            $scope.setCountryList = function (countryList) {
                $scope.countryList = JSON.parse(countryList);
            }
            $scope.setPSList = function (politicalStatusList) {
                $scope.politicalStatusList = JSON.parse(politicalStatusList);
            }
            $scope.addSurveyInfo = function () {
                if ($scope.allow_action == false) {
                    return;
                }
                $scope.allow_action = false;
                memberService.addSurveyInfo($scope.memberSurveyInfo).
                        success(function (data, status, headers, config) {
                            $scope.allow_action = true;
                            alert(data.message);
                            $scope.memberSurveyInfo = {};
                        });
            }
            $scope.searchSurveyInfo = function () {
                if ($scope.allow_action == false) {
                    return;
                }
                $scope.allow_action = false;
                memberService.searchSurveyInfo($scope.searchParam).
                        success(function (data, status, headers, config) {
                            $scope.memberSurveyInfo = data['survey_info'];
                            $scope.allow_action = true;
                        });
            }
            $scope.searchMemberInfo = function () {
                if ($scope.allow_action == false) {
                    return;
                }
                $scope.allow_action = false;
                memberService.searchMemberInfo($scope.searchParam).
                        success(function (data, status, headers, config) {
                            $scope.memberSurveyInfo = data['member_info'];
                            console.log($scope.memberSurveyInfo);
                            $scope.allow_action = true;
                        });
            }
            $scope.addmissionInfoAdd = function () {
                if ($scope.allow_action == false) {
                    return;
                }
                $scope.allow_action = false;
                memberService.addmissionInfoAdd($scope.memberSurveyInfo).
                        success(function (data, status, headers, config) {
                            alert(data.message);
                            $scope.memberSurveyInfo = {};
                            $scope.allow_action = true;
                        });
            }
//list dynamic view
            $scope.personalDetails = [
    	        {
    	            'fname':'Muhammed',
    	            'lname':'Shanid',
    	            'email':'shanid@shanid.com'
    	        },
    	        {
    	            'fname':'John',
    	            'lname':'Abraham',
    	            'email':'john@john.com'
    	        },
    	        {
    	            'fname':'Roy',
    	            'lname':'Mathew',
    	            'email':'roy@roy.com'
    	        }];
    	    
    	        $scope.addNew = function(personalDetails){
                    var testObj = {};
                    $scope.personalDetails.push({});
    	        };
    	    
    	        $scope.remove = function(){
    	            var newDataList=[];
    	            $scope.selectedAll = false;
    	            angular.forEach($scope.personalDetails, function(selected){
    	                if(!selected.selected){
    	                    newDataList.push(selected);
    	                }
    	            }); 
    	            $scope.personalDetails = newDataList;
    	        };
    	    
    	        $scope.checkAll = function () {
    	            if (!$scope.selectedAll) {
    	                $scope.selectedAll = true;
    	            } else {
    	                $scope.selectedAll = false;
    	            }
    	            angular.forEach($scope.personalDetails, function (personalDetails) {
    	                personalDetails.selected = $scope.selectedAll;
    	            });
    	        }; 

        });


