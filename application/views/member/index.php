<div class="content-wrapper" ng-controller="memberController">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1%">
        <h1 class="text-center">টিএমএসএস ইসলামিক মাইক্রো ফাইনান্স (TMSS)</h1>
        <p class="text-blue text-center"><u>TIMF প্রকল্প এলাকার জনগনের তথ্য বিবরণী</u></p>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title ">ব্রাঞ্চের তথ্য </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3" ng-init="setZoneList('<?php echo htmlspecialchars(json_encode($zone_list)) ?>')">
                                    <label>জোনঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.zoneId" >
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="zoneInfo in zoneList" value={{zoneInfo.id}} >{{zoneInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3" ng-init="setAreaList('<?php echo htmlspecialchars(json_encode($area_list)) ?>')">
                                    <label>এলাকাঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.areaId" >
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="areaInfo in areaList" value={{areaInfo.id}} >{{areaInfo.name}}</option>

                                    </select>
                                </div>

                                <div class="form-group col-sm-3" ng-init="setBranchList('<?php echo htmlspecialchars(json_encode($branch_list)) ?>')">
                                    <label>শাখাঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.branchId">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="branchInfo in branchList" value={{branchInfo.id}} >{{branchInfo.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>


        </div>
        <div class="row">

            <div class="col-md-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h2 class="box-title ">ব্যক্তিগত তথ্য</h2>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-12">
                                    <h4><u>Name:</u></h4>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>Name Title:</label>
                                    <select class="form-control " name="zone_name" ng-model="memberSurveyInfo.nameTitle" style="width: 100%;" ng-init="setNameTitleList('<?php echo htmlspecialchars(json_encode($name_title_list)) ?>')">
                                        <option value="">Select</option>
                                        <option ng-repeat="(key,nameTitle) in nameTitleList" value={{nameTitle}} >{{nameTitle}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.firstName" name="first_name" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.lastName"  name="last_name" placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Sur Name:</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.surName"  name="sur_name" placeholder="sur name"
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
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.NameBangla" name="first_name" placeholder="পূর্ণ নাম(বাংলায়)"
                                           style="width: 100%;">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>লিঙ্গঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.genderId" style="width: 100%;"ng-init="setGenderList('<?php echo htmlspecialchars(json_encode($gender_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="genderInfo in genderList" value={{genderInfo.id}} >{{genderInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>বয়সঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.age" style="width: 100%;" ng-init="setAgeList('<?php echo htmlspecialchars(json_encode($age_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="ageInfo in ageList" value={{ageInfo}} >{{ageInfo}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>শিক্ষাগত যোগ্যতা(সর্বোচ্চ)</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.educationId" 
                                            style="width: 100%;"ng-init="setEducationList('<?php echo htmlspecialchars(json_encode($educations_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="educationInfo in educationList" value={{educationInfo.id}} >{{educationInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>উত্তীর্ণ হওয়ার সাল</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.passingYear"  style="width: 100%;" ng-init="setYearList('<?php echo htmlspecialchars(json_encode($passing_year_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="yearInfo in yearList" value={{yearInfo}} >{{yearInfo}}</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>পিতা/স্বামীর নামঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.fNameTitle" style="width: 100%;" ng-init="setFTitleList('<?php echo htmlspecialchars(json_encode($f_name_title_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="fTitle in fTitleList" value={{fTitle}} >{{fTitle}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>পিতার/স্বামীর ১ম নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.fFirstName" 
                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>পিতার/স্বামীর ২য় নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.fLastName" 
                                           placeholder="" style="width: 100%;">
                                </div>

                                 <div class="form-group col-sm-3">
                                    <label> পিতার/স্বামীর বয়সঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.fAge" style="width: 100%;">
                                       <option value="">নির্বাচন করুন</option>
                                       <option ng-repeat="ageInfo in ageList" value={{ageInfo}} >{{ageInfo}}</option>
                                    </select>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>মাতার নামঃ</label>
                                    <select class="form-control"ng-model="memberSurveyInfo.mNameTitle" style="width: 100%;"ng-init="setMTitleList('<?php echo htmlspecialchars(json_encode($m_name_title_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="mTitle in mTitleList" value={{mTitle}} >{{mTitle}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>মাতার নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mFrstName"  placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>মাতার ২য় নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mLastName" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>মায়ের বয়সঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.mAge" style="width: 100%;">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="ageInfo in ageList" value={{ageInfo}} >{{ageInfo}}</option>
                                    </select>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-lg-3">
                                    <label>অভিভাবকের পেশা</label>
                                    <select class="form-control"  ng-model="memberSurveyInfo.gProfessionId" 
                                            style="width: 100%;" ng-init="setProfessionList('<?php echo htmlspecialchars(json_encode($profession_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="professionInfo in proList" value={{professionInfo.id}} >{{professionInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>বৈবাহিক অবস্থাঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.maritalId" style="width: 100%;" ng-init="setMaritalList('<?php echo htmlspecialchars(json_encode($marital_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="maritalInfo in maritalList" value={{maritalInfo.id}} >{{maritalInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>রাজনীতির সাথে জরিত কি না? </label>
                                    <select class="form-control" style="width: 100%;"ng-model="memberSurveyInfo.politicalStatusId" style="width: 100%;" ng-init="setPSList('<?php echo htmlspecialchars(json_encode($political_status_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="pStatusInfo in politicalStatusList" value={{pStatusInfo.id}} >{{pStatusInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>জাতীয় পরিচয় পত্রের নংঃ </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.nid" placeholder="জাতীয় পরিচয় পত্রের নং"
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
                                    <select class="form-control" ng-model="memberSurveyInfo.mCountryId" style="width: 100%;" style="width: 100%;" ng-init="setCountryList('<?php echo htmlspecialchars(json_encode($country_list)) ?>')">
                                       <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="countryInfo in countryList" value={{countryInfo.id}} >{{countryInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>জেলাঃ</label>
                                    <select class="form-control " name="age" style="width: 100%;" ng-model="memberSurveyInfo.mDistrictId" style="width: 100%;" ng-init="setDistrictList('<?php echo htmlspecialchars(json_encode($district_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="districtInfo in districtList" value={{districtInfo.id}} >{{districtInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>থানাঃ</label>
                                    <select class="form-control "
                                            style="width: 100%;" ng-model="memberSurveyInfo.mThanaId" style="width: 100%;" ng-init="setThanaList('<?php echo htmlspecialchars(json_encode($thana_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="thanaInfo in thanaList" value={{thanaInfo.id}} >{{thanaInfo.name}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ইউনিয়নঃ</label>
                                    <select class="form-control "  style="width: 100%;"ng-model="memberSurveyInfo.mUnion" ng-init="setUnionList('<?php echo htmlspecialchars(json_encode($union_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="unionInfo in unionList" value={{unionInfo.id}} >{{unionInfo.name}}</option>
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
                                  <select class="form-control "  style="width: 100%;"ng-model="memberSurveyInfo.mPostId" ng-init="setPostList('<?php echo htmlspecialchars(json_encode($post_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="postInfo in postList" value={{postInfo.id}} >{{postInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>গ্রাম বা মহল্লাঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mVill" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>রাস্তা নং</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mRoad" placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title "><u>পারিবারিক তথ্য</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>পরিবারের সদস্য সংখ্যাঃ </label>
                                    <select class="form-control " style="width: 100%;" ng-model="memberSurveyInfo.totalMemberNo" ng-init="setMemberList('<?php echo htmlspecialchars(json_encode($member_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>উপার্জনক্ষম পুরুষের সংখ্যা</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;" ng-model="memberSurveyInfo.earnedMMNo" >
                                        <option value="">নির্বাচন করুন</option>
                                         <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>উপার্জনক্ষম মহিলার সংখ্যা</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;"ng-model="memberSurveyInfo.earnedFMNo">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">

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
                                    <select class="form-control" ng-model="memberSurveyInfo.pCountryId" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                          <option ng-repeat="countryInfo in countryList" value={{countryInfo.id}} >{{countryInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>জেলাঃ</label>
                                    <select class="form-control "  ng-model="memberSurveyInfo.pDistrictId"  style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="districtInfo in districtList" value={{districtInfo.id}} >{{districtInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>থানাঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.pThanaId"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                         <option ng-repeat="thanaInfo in thanaList" value={{thanaInfo.id}} >{{thanaInfo.name}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ইউনিয়নঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.pUnionId" style="width: 100%;">
                                        <option  value = "">নির্বাচন করুন</option>
                                        <option ng-repeat="unionInfo in unionList" value={{unionInfo.id}} >{{unionInfo.name}}</option>
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
                                      <select class="form-control "  style="width: 100%;"ng-model="memberSurveyInfo.pPostId" ng-init="setPostList('<?php echo htmlspecialchars(json_encode($post_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="postInfo in postList" value={{postInfo.id}} >{{postInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>গ্রাম বা মহল্লাঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.pVill"  placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>রাস্তা নং</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.pRoad"  placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title "><u>যোগাযোগঃ</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>মোবাইল নংঃ </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mobile" name="member_mobile" placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ইমেইলঃ </label>
                                    <input type="email" class="form-control" ng-model="memberSurveyInfo.email" placeholder=""   style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>অভিভাবকের মোবাইল নংঃ </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.fEmail"  placeholder=""
                                           style="width: 100%;">

                                </div>
                                <div class="form-group col-lg-3">
                                    <label>শাখা অফিসের দুরুত্ব (কিঃ মিঃ)</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.distToCentre"  style="width: 100%;">
                                        <option selected="selected">নির্বাচন করুন</option>
                                         <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title "><u>সদস্যের পেশা সংক্রান্ত তথ্যঃ </u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-sm-3">
                                    <label>পেশা</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.cProfessionId"name="member_profession" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="professionInfo in proList" value={{professionInfo.id}} >{{professionInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>বর্তমান পেশার পূর্বে তিনি কি করতেন</label>
                                    <select class="form-control"  ng-model="memberSurveyInfo.pProfessionId" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="professionInfo in proList" value={{professionInfo.id}} >{{professionInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>সেই পেশায় কতদিন নিয়োজিত ছিলেন(মাস)</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.mPrePYear"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসা/চাকুরী করে অর্জিত সম্পদের বিবরণঃ</label>
                                    <textarea rows="3" class="form-control" ng-model="memberSurveyInfo.earningSource"
                                              style="width: 100%;"></textarea>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসা ছাড়া আয়ের উৎস থাকলে তার বিবরণঃ</label>
                                    <textarea rows="3" class="form-control" ng-model="memberSurveyInfo.aEarningSource" 
                                              style="width: 100%;"></textarea>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসার ধরনঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.businessTypeId"
                                            style="width: 100%;"ng-init="setBTypeList('<?php echo htmlspecialchars(json_encode($business_type_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="bType in bTypeList" value={{bType.id}} >{{bType.name}}</option>
                                    </select>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসার ভবিষ্যৎ পরিকল্পনাঃ</label>
                                    <textarea rows="3" class="form-control" ng-model="memberSurveyInfo.fBusinessPlan" name="business_future_plan"
                                              style="width: 100%;"></textarea>
                                </div>

                            </div>


                        </div>
                    </div>


                </div>

            </div>


        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title ">জমির পরিমান</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-4">
                                    <label>আবাদি জমি (শতক)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.cultivableLand"
                                           placeholder="আবাদি জমি (শতক)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>অনাবাদি জমি (শতক)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.unCultivableLand"
                                           placeholder="অনাবাদি জমি (শতক)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>পুকুর (শতক)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.ponds"
                                           placeholder="পুকুর (শতক)" style="width: 100%;">
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-4">
                                    <label>বসত বাড়ী(শতক)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.house"  name="cultivable_land"
                                           placeholder="বসত বাড়ী (শতক)" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>মোট জমি (শতক)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.totalLand" name="cultivable_land"
                                           placeholder="মোট জমি (শতক)" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-4">

                                </div>


                            </div>


                        </div>
                    </div>


                </div>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title ">বাৎসরিক মোট আয় ও ব্যয়</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-4">
                                    <label>কৃষিজ আয় (টাকা)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.agIncome"
                                           placeholder="কৃষিজ আয় (টাকা)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>অকৃষিজ আয় (টাকা)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.unAgIncome"
                                           placeholder="অকৃষিজ আয় (টাকা)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>মোট আয় (টাকা)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.totalIncome"
                                           placeholder="মোট আয় (টাকা)" style="width: 100%;">
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-4">
                                    <label>মোট ব্যয় (টাকা)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.totalExpenditure"
                                           placeholder="মোট ব্যয় (টাকা)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>উদ্বৃত্ত/ঘাটতি (টাকা)</label>
                                    <input type="text" class="form-control"  ng-model="memberSurveyInfo.loss"
                                           placeholder="উদ্বৃত্ত/ঘাটতি (টাকা)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                </div>

                            </div>


                        </div>
                    </div>


                </div>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title ">পরিবারের গৃহের ধরনঃ</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-4">
                                    <label>টিনের ঘর (কত টি?)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.tinHouse"
                                           placeholder="টিনের ঘর (কত টি?)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>খড়ের ঘর (কত টি?)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.strawHouse"
                                           placeholder="খড়ের ঘর (কত টি?)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>ইটের ঘর (কত টি?)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.brickHouse"   name="pond" placeholder="ইটের ঘর (কত টি?)"
                                           style="width: 100%;">
                                </div>

                            </div>


                        </div>
                    </div>

                </div>

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title ">বিনিয়োগ সংক্রান্ত তথ্যঃ </h3>
                        <h5 class="text-red">সম্ভাব্য সদস্য যোদি কোন এন জি ও / ব্যাংক থেকে বিনিয়োগ/ঋণ গ্রহন করে থাকে
                            তাহলে নিম্ন লিখিত তথ্য গুলো প্রদান করবে </h5>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>গৃহীত টাকার পরিমাণ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.receiveAmound" name="cultivable_land"
                                           placeholder="গৃহীত টাকার পরিমাণ" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>পরিশোধিত টাকার পরিমাণ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.paidAmound"
                                           placeholder="পরিশোধিত টাকার পরিমাণ" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>অবশিষ্ট টাকার পরিমাণ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.remainningAmound"
                                           placeholder="অবশিষ্ট টাকার পরিমাণ" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>পরিশোধের ধরণঃ </label>
                                    <select class="form-control" 
                                            style="width: 100%;" ng-model="memberSurveyInfo.paymentTypeId" ng-init="setPaymentTypeList('<?php echo htmlspecialchars(json_encode($payment_types)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="paymentType in paymentTypeList" value={{paymentType.id}} >{{paymentType.name}}</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">

                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>লগ্নীকারী প্রতিষ্ঠানের নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.financierCompany"
                                           placeholder="লগ্নীকারী প্রতিষ্ঠানের নাম " style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>কতদিন যাবৎ গ্রহন করছেন (মাস)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.loaningYear"
                                           placeholder="কতদিন যাবৎ গ্রহন করছেন" style="width: 100%;">
                                </div>

                                <div class="form-group date col-sm-3">
                                    <label>সর্বশেষ কবে গ্রহণ করেছেন </label>
                                    <input type="text" class="form-control " id="datepicker"  ng-model="memberSurveyInfo.lastLoaningYear"
                                           placeholder="সর্বশেষ কবে গ্রহণ করেছেন " style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">

                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="box-header">
                        <h5 class="text-red">সম্ভাব্য সদস্য যোদি TIMF থেকে বিনিয়োগ/ঋণ গ্রহন করতে আগ্রহী হয় তাহলে নিম্ন
                            লিখিত তথ্য গুলো প্রদান করবে </h5>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="form-inline">
                                <div class="form-group col-sm-4">
                                    <label>বিনিয়োগ/ঋণ গ্রহন করতে আগ্রহী কি না-</label>
                                    <select class="form-control" name="member_previous_profession_duration"
                                            style="width: 100%;">
                                        <option selected="selected">নির্বাচন করুন</option>
                                        <option>নির্বাচন করুন</option>
                                        <option>হ্যাঁ</option>
                                        <option>না</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>বিনিয়োগের খাতঃ </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.investmentSector"
                                           placeholder="বিনিয়োগের খাত " style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>টাকার পরিমানঃ </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.amount"
                                           placeholder="টাকার পরিমানঃ" style="width: 100%;">
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="box-header">
                        <h5 class="text-red">দুই জন নিকটতম ব্যবসায়ীর ঋণ গ্রহন সম্পর্কে মন্তব্যঃ </h5>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="form-inline">
                                <div class="form-group col-sm-6">
                                    <label>প্রথম ব্যক্তির মন্তব্যঃ </label>
                                    <textarea rows="3" class="form-control" ng-model="memberSurveyInfo.recomannd1" 
                                              style="width: 100%;"></textarea>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>দ্বিতীয় ব্যক্তির মন্তব্যঃ </label>
                                    <textarea rows="3" class="form-control" ng-model="memberSurveyInfo.recomannd2"  
                                              style="width: 100%;"></textarea>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>

            </div>


        </div>

        <div class="row">

            <div class="col-md-12">


                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <div class="col-sm-2 pull-right">
                        <button type="button" class="btn btn-info btn-flat " ng-click="addSurveyInfo()"> Save</button>
                    </div>
                </div>


            </div>


        </div>


    </section>

</div>
<script>
    $(function () {

        $('#datepicker').datepicker({
            autoclose: true
        });

        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>