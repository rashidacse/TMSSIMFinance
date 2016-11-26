<div class="content-wrapper" ng-controller="configurationController">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1%">
        <h1 class="text-center">টিএমএসএস ইসলামিক মাইক্রো ফাইনান্স (TMSS)</h1>
        <p class="text-aqua text-center"><u>প্রতিষ্ঠানের তথ্য প্রদান করুন</u></p>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-6">
                                    <label>প্রোডাক্ট কোডঃ</label>
                                    <input type="text" ng-model="productInfo.code"  required style="width: 100%">
                                </div>
                                <div class="form-group col-sm-6">

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-6">
                                    <label>প্রোডাক্টের নামঃ</label>
                                    <input type="text"   ng-model="productInfo.name"   required style="width: 100%">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>প্রোডাক্টের নাম (ইংরেজি)</label>
                                    <input type="text"  ng-model="productInfo.eng_name"   required style="width: 100%">
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-6">
                                    <label>বাংলা  নাম (সংক্ষিপ্ত)</label>
                                    <input type="text"  ng-model="productInfo.bang_short_name"   required style="width: 100%">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>বাংলা  নাম (পূর্ণ)</label>
                                    <input type="text"  ng-model="productInfo.bang_full_name"    required style="width: 100%">
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-4"  ng-init="setProductTypes('<?php echo htmlspecialchars(json_encode($product_types)) ?>')">
                                    <label>প্রোডাক্টের ধরণঃ</label>
                                    <select class="form-control " ng-model="productInfo.product_type_id" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                         <option ng-repeat="productInfo in productTypes" value={{productInfo.id}} >{{productInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>সার্ভিস চার্জ রেটঃ</label>
                                    <input type="text"  ng-model="productInfo.interest_rate"   required style="width: 100%">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>মেয়াদঃ</label>
                                    <input type="text"  ng-model="productInfo.duration"   required style="width: 100%">
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-6">
                                    <label>মেইন প্রোডাক্টের নামঃ</label>
                                    <input type="text"   ng-model="productInfo.main_product_code"    required style="width: 100%">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>মেইন আইটেম নামঃ</label>
                                    <input type="number"  ng-model="productInfo.main_item_name"    required style="width: 100%">
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-4">
                                    <label>ঋণ কিস্তিঃ </label>
                                    <input type="number" class="form-control" ng-model="productInfo.loan_installment" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>কিস্তিির সার্ভিস চার্জঃ</label>
                                    <input type="number" class="form-control" ng-model="productInfo.interest_installment" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>সঞ্চয় কিস্তিঃ</label>
                                    <input type="number" class="form-control"  ng-model="productInfo.savings_installment" style="width: 100%" required>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-4">
                                    <label>সর্বনিম্ন সীমাঃ </label>
                                    <input type="text" class="form-control" ng-model="productInfo.min_limit" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>সর্বোচ্চ সীমাঃ </label>
                                    <input type="text" class="form-control"  ng-model="productInfo.max_limit" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-4" ng-init="setInterestCalMethod('<?php echo htmlspecialchars(json_encode($interest_cal_methods)) ?>')">
                                    
                                    <label>সার্ভিস চার্জ হিসাবের পদ্ধতি</label>
                                   <select class="form-control " ng-model="productInfo.interest_calculation_method" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                         <option ng-repeat="interestCalMethod in interestCalMethods" value={{interestCalMethod}} >{{interestCalMethod}}</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-4" ng-init="setPaymentFrequencyList('<?php echo htmlspecialchars(json_encode($payment_frequency_list)) ?>')">
                                    <label>পেমেন্ট ফ্রিকুয়েন্সিঃ</label>
                                   <select class="form-control " ng-model="productInfo.payment_frequency_id" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                         <option ng-repeat="paymentFrequency in paymentFrequencyList" value={{paymentFrequency.id}} >{{paymentFrequency.name}}</option>
                                    </select>
                                </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>ইন্সুরেন্স আইটেম কোডঃ</label>
                                    <input type="text" class="form-control" ng-model="productInfo.insurance_item_code"  style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>ইন্সুরেন্স আইটেম রেটঃ</label>
                                    <input type="number" class="form-control" ng-model="productInfo.insurance_item_rate" style="width: 100%" required>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>




        <div class="row">

            <div class="col-md-12">

                <div class="box-body">
                    <div class="col-sm-2 pull-right">
                        <button type="button" class="btn btn-info btn-flat" ng-click="addProduct()">Save</button>
                    </div>
                </div>

            </div>

        </div>

        </div>

    </section>
    <!-- /.content -->
</div>