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
                                <div class="form-group col-lg-6" ng-init="setInvestorList('<?php echo htmlspecialchars(json_encode($investor_list)) ?>')">
                                    <label>প্রতিষ্ঠানের আইডিঃ</label>
                                    <select class="form-control "   ng-model="organizationInfo.office_id"  style="width: 100%;">
                                        <option  value="">নির্বাচন করুন</option>
                                        <option ng-repeat="investorInfo in investorList" value={{investorInfo.code}} >{{investorInfo.code}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-12">
                                    <label>প্রতিষ্ঠানের নামঃ</label>
                                    <select class="form-control " ng-model="organizationInfo.organization_name" style="width: 100%;">
                                        <option  value="">নির্বাচন করুন</option>
                                        <option ng-repeat="investorInfo in investorList" value={{investorInfo.name}} >{{investorInfo.name}}</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-12">
                                    <label>প্রতিষ্ঠানের ঠিকানাঃ</label>
                                    <textarea  ng-model="organizationInfo.org_address" name="remarks" rows="2" style="width: 100%" required></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>বছর সমাপ্তি তারিখঃ</label>
                                    <input type="datetime" class="form-control" name="dateclosing" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>ক্যাশ বুকঃ</label>
                                    <input type="text" class="form-control" ng-model="organizationInfo.cash_book" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>PL আকাউন্ট</label>
                                    <input type="text" class="form-control" ng-model="organizationInfo.pla_aacount" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>ব্যাংক আকাউন্ট</label>
                                    <input type="text" class="form-control" ng-model="organizationInfo.bank_aacount" style="width: 100%" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-4">
                                    <label>ফোন নংঃ</label>
                                    <input type="text" class="form-control" ng-model="organizationInfo.phone_no" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>মোবাইল নংঃ </label>
                                    <input type="text" class="form-control" ng-model="organizationInfo.cell_no" style="width: 100%" required>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label>ইমেইলঃ</label>
                                    <input type="text" class="form-control" ng-model="organizationInfo.email" style="width: 100%" required required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-4">
                                    <label>কার্যদিবস শুরুঃ</label>
                                    <input type="datetime" class="form-control" name="cultivable_land"
                                           placeholder="" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-4"   ng-init="setProcessList('<?php echo htmlspecialchars(json_encode($process_list)) ?>')">
                                    <label>কাজের ধরনঃ</label>
                                      <select class="form-control " ng-model="organizationInfo.process_type" style="width: 100%;">
                                    <option  value="">নির্বাচন করুন</option>
                                    <option ng-repeat="processInfo in processList" value={{processInfo.name}} >{{processInfo.name}}</option>
                                      </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>লাইসেন্স নংঃ</label>
                                    <input type="text" class="form-control"  ng-model="organizationInfo.license_no"
                                           placeholder="" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-4">
                                    <label>লাইসেন্স শুরুর তারিখঃ</label>
                                    <input type="datetime" class="form-control" ng-model="organizationInfo.license_start_date"
                                           placeholder="" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>লাইসেন্সের মেয়াদ শেষ হওয়ার তারিখঃ</label>
                                    <input type="datetime" class="form-control" ng-model="organizationInfo.license_end_date"
                                           placeholder="" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-4">

                                </div>
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
                        <button type="button" class="btn btn-info btn-flat" ng-click="addOrganization()" >Save</button>
                    </div>
                </div>

            </div>


        </div>

    </section>
    <!-- /.content -->
</div>