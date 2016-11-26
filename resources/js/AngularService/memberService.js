angular.module('services.Member', []).
        factory('memberService', function ($http, $location) {
            var $app_name = "/timfinance";
            //var $app_name = "";
            var memberService = {};
            memberService.addSurveyInfo = function (memberSurveyInfo) {
                return $http({
                    method: 'post',
                    url: $location.path() + $app_name + '/member/index',
                    data: {
                        memberSurveyInfo: memberSurveyInfo
                    }
                });
            };
            memberService.searchSurveyInfo = function (searchParam) {
                return $http({
                    method: 'post',
                    url: $location.path() + $app_name + '/member/get_survey_info',
                    data: {
                        searchParam: searchParam
                    }
                });
            };
            memberService.searchMemberInfo = function (searchParam) {
                return $http({
                    method: 'post',
                    url: $location.path() + $app_name + '/member/get_member_info',
                    data: {
                        searchParam: searchParam
                    }
                });
            };
            memberService.addmissionInfoAdd = function (memberSurveyInfo) {
               return $http({
                    method: 'post',
                    url: $location.path() + $app_name + '/member/add_addmission_info',
                    data: {
                        memberSurveyInfo: memberSurveyInfo
                    }
                });
            };
           
            return memberService;
        });

