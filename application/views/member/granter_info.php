<div class="content-wrapper" ng-controller="configurationController">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1%">
        <h1 class="text-center">টিএমএসএস ইসলামিক মাইক্রো ফাইনান্স (TMSS)</h1>
        <p class="text-aqua text-center"><u>জামিন্দারের তথ্য</u></p>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-12">
                                    <h4><u>Granter Name:</u></h4>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>Name Title:</label>
                                    <select class="form-control " name="zone_name" ng-model="memberSurveyInfo.nameTitle"
                                            style="width: 100%;"
                                            ng-init="setNameTitleList('<?php echo htmlspecialchars(json_encode($name_title_list)) ?>')">
                                        <option value="">Select</option>
                                        <option ng-repeat="(key,nameTitle) in nameTitleList" value={{nameTitle}}>
                                            {{nameTitle}}
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.firstName"
                                           name="first_name" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.lastName"
                                           name="last_name" placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Sur Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.surName"
                                           name="sur_name" placeholder="sur name"
                                           style="width: 100%;">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-12">
                                    <label>Full Name(বাংলায়)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.NameBangla"
                                           name="first_name" placeholder="পূর্ণ নাম(বাংলায়)"
                                           style="width: 100%;">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>গ্রাহকের সাথে সম্পর্ক</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.genderId"
                                            style="width: 100%;"
                                            ng-init="setGenderList('<?php echo htmlspecialchars(json_encode($gender_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="genderInfo in genderList" value={{genderInfo.id}}>
                                            {{genderInfo.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>বয়সঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.age" style="width: 100%;"
                                            ng-init="setAgeList('<?php echo htmlspecialchars(json_encode($age_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="ageInfo in ageList" value={{ageInfo}}>{{ageInfo}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">

                                </div>
                                <div class="form-group col-sm-3">

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-12">
                                    <h4><u> Granter Father/Hatbands Name:</u></h4>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>Name Title:</label>
                                    <select class="form-control " name="zone_name" ng-model="memberSurveyInfo.nameTitle"
                                            style="width: 100%;"
                                            ng-init="setNameTitleList('<?php echo htmlspecialchars(json_encode($name_title_list)) ?>')">
                                        <option value="">Select</option>
                                        <option ng-repeat="(key,nameTitle) in nameTitleList" value={{nameTitle}}>
                                            {{nameTitle}}
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.firstName"
                                           name="first_name" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.lastName"
                                           name="last_name" placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Sur Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.surName"
                                           name="sur_name" placeholder="sur name"
                                           style="width: 100%;">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-12">
                                    <label>Full Name(বাংলায়)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.NameBangla"
                                           name="first_name" placeholder="পূর্ণ নাম(বাংলায়)"
                                           style="width: 100%;">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-lg-3">
                                    <label>অভিভাবকের পেশা/পদবী</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.gProfessionId"
                                            style="width: 100%;"
                                            ng-init="setProfessionList('<?php echo htmlspecialchars(json_encode($profession_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="professionInfo in proList" value={{professionInfo.id}}>
                                            {{professionInfo.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ফোন নংঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.nid"
                                           placeholder="জাতীয় পরিচয় পত্রের নং"
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>মোবাইল নংঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.nid"
                                           placeholder="জাতীয় পরিচয় পত্রের নং"
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>জাতীয় পরিচয় পত্রের নংঃ </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.nid"
                                           placeholder="জাতীয় পরিচয় পত্রের নং"
                                           style="width: 100%;">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title "><u>বর্তমান ঠিকানা</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>দেশ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.mCountryId"
                                            style="width: 100%;" style="width: 100%;"
                                            ng-init="setCountryList('<?php echo htmlspecialchars(json_encode($country_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="countryInfo in countryList" value={{countryInfo.id}}>
                                            {{countryInfo.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>জেলাঃ</label>
                                    <select class="form-control " name="age" style="width: 100%;"
                                            ng-model="memberSurveyInfo.mDistrictId" style="width: 100%;"
                                            ng-init="setDistrictList('<?php echo htmlspecialchars(json_encode($district_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="districtInfo in districtList" value={{districtInfo.id}}>
                                            {{districtInfo.name}}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>থানাঃ</label>
                                    <select class="form-control "
                                            style="width: 100%;" ng-model="memberSurveyInfo.mThanaId"
                                            style="width: 100%;"
                                            ng-init="setThanaList('<?php echo htmlspecialchars(json_encode($thana_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="thanaInfo in thanaList" value={{thanaInfo.id}}>
                                            {{thanaInfo.name}}
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ইউনিয়নঃ</label>
                                    <select class="form-control " style="width: 100%;"
                                            ng-model="memberSurveyInfo.mUnion"
                                            ng-init="setUnionList('<?php echo htmlspecialchars(json_encode($union_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="unionInfo in unionList" value={{unionInfo.id}}>
                                            {{unionInfo.name}}
                                        </option>
                                    </select>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>পোষ্ট অফিসঃ</label>
                                    <select class="form-control " style="width: 100%;"
                                            ng-model="memberSurveyInfo.mPostId"
                                            ng-init="setPostList('<?php echo htmlspecialchars(json_encode($post_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="postInfo in postList" value={{postInfo.id}}>
                                            {{postInfo.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>গ্রাম বা মহল্লাঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mVill"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>রাস্তা নং</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mRoad"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ওয়ার্ড নং</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mRoad"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title "><u>স্থায়ী ঠিকানা</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>দেশ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.mCountryId"
                                            style="width: 100%;" style="width: 100%;"
                                            ng-init="setCountryList('<?php echo htmlspecialchars(json_encode($country_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="countryInfo in countryList" value={{countryInfo.id}}>
                                            {{countryInfo.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>জেলাঃ</label>
                                    <select class="form-control " name="age" style="width: 100%;"
                                            ng-model="memberSurveyInfo.mDistrictId" style="width: 100%;"
                                            ng-init="setDistrictList('<?php echo htmlspecialchars(json_encode($district_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="districtInfo in districtList" value={{districtInfo.id}}>
                                            {{districtInfo.name}}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>থানাঃ</label>
                                    <select class="form-control "
                                            style="width: 100%;" ng-model="memberSurveyInfo.mThanaId"
                                            style="width: 100%;"
                                            ng-init="setThanaList('<?php echo htmlspecialchars(json_encode($thana_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="thanaInfo in thanaList" value={{thanaInfo.id}}>
                                            {{thanaInfo.name}}
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ইউনিয়নঃ</label>
                                    <select class="form-control " style="width: 100%;"
                                            ng-model="memberSurveyInfo.mUnion"
                                            ng-init="setUnionList('<?php echo htmlspecialchars(json_encode($union_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="unionInfo in unionList" value={{unionInfo.id}}>
                                            {{unionInfo.name}}
                                        </option>
                                    </select>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>পোষ্ট অফিসঃ</label>
                                    <select class="form-control " style="width: 100%;"
                                            ng-model="memberSurveyInfo.mPostId"
                                            ng-init="setPostList('<?php echo htmlspecialchars(json_encode($post_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="postInfo in postList" value={{postInfo.id}}>
                                            {{postInfo.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>গ্রাম বা মহল্লাঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mVill"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>রাস্তা নং</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mRoad"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ওয়ার্ড নং</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mRoad"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title "><u>স্থায়ী ঠিকানা</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>মাসিক মোট আয়ঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mVill"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>মাসিক মোট ব্যয়ঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mVill"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>উদ্বৃত্ত টাকাঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mRoad"
                                           placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">

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
                        <button type="button" class="btn btn-info btn-flat " ng-click="addPurpose()">Save</button>
                    </div>
                </div>

            </div>


        </div>

    </section>
    <!-- /.content -->
</div>