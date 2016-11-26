angular.module('controller.Configuration', ['services.Configuration']).controller('configurationController', function ($scope, configurationService) {
    $scope.investorList = [];
    $scope.processList = [];
    $scope.productTypes = [];
    $scope.paymentFrequencyList = [];
    $scope.interestCalMethods = [];
    $scope.organizationInfo = {};
    $scope.purposeInfo = {};
    $scope.productInfo = {};

    $scope.setInvestorList = function (investorList) {
        $scope.investorList = JSON.parse(investorList);
    }
    $scope.setProcessList = function (processList) {
        $scope.processList = JSON.parse(processList);
    }
    $scope.setProductTypes = function (productTypes) {
        $scope.productTypes = JSON.parse(productTypes);
    }
    $scope.setInterestCalMethod = function (interestCalMethods) {
        $scope.interestCalMethods = JSON.parse(interestCalMethods);
    }
    $scope.setPaymentFrequencyList = function (paymentFrequencyList) {
        $scope.paymentFrequencyList = JSON.parse(paymentFrequencyList);
    }

    $scope.addProduct = function () {
        configurationService.addProduct($scope.productInfo).success(function (data, status, headers, config) {
            alert(data.message);
            $scope.organizationInfo = {};
            $scope.allow_action = true;
        });
    }
    $scope.addPurpose = function () {
        console.log($scope.purposeInfo);
        configurationService.addPurpose($scope.purposeInfo).
        success(function (data, status, headers, config) {
            alert(data.message);

        });
    }

    $scope.addOrganization = function () {
        if ($scope.allow_action == false) {
            return;
        }
        $scope.allow_action = false;
        configurationService.addOrganization($scope.organizationInfo).success(function (data, status, headers, config) {
            alert(data.message);
            $scope.organizationInfo = {};
            $scope.allow_action = true;
        });
    }


});


