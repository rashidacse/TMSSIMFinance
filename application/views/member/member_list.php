<div class="content-wrapper" ng-controller="memberController">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1%">
        <h4 class="text-center">টিএমএসএস ইসলামিক মাইক্রো ফাইনান্স (TMSSIMF)</h4>
        <p class="text-blue text-center"><u>সদস্য তালিকা</u></p>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box  box-info">

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form group inline col-lg-6">
                                    <label>Search</label>
                                    <input type="text" class="form-control"ng-model="searchParam.searchValue" placeholder="">
                                    <button type="button" class="btn bg-navy btn-flat margin" ng-click="searchSurveyInfo()">অনুসন্ধান করুন</button>
                                </div>
                                <div class="form-group col-sm-6">
                                    <a href="<?php echo base_url() . 'member/add_addmission_info' ?>"><button type="button" class="btn bg-purple btn-flat margin pull-right" value="">Add a New Member</button></a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title ">Member List</h3>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover" ng-init="setMemberInfoList('<?php echo htmlspecialchars(json_encode($member_list)) ?>')">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Member ID</th>
                                <th>NID</th>
                                <th>Name</th>
                                <th>Phone No</th>
                                <th>Email ID</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="(key, memberInfo) in memberList">
                                <td>{{key+1}}</td>
                                <td>{{memberInfo.id}}</td>
                                <td>{{memberInfo.nid}}</td>
                                <td>{{memberInfo.name_title}} {{memberInfo.first_name}} {{memberInfo.last_name}}</td>
                                <td>{{memberInfo.mobile}}</td>
                                <td>{{memberInfo.email}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
