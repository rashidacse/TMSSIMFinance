<div class="content-wrapper" ng-controller="memberController">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1%">
        <h1 class="text-aqua text-center">টিএমএসএস ইসলামিক মাইক্রো ফাইনান্স (TMSSIMF)</h1>
        <p class="text-blue text-center"><u>ঋণ আবেদন ফরম</u></p>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box  box-info">

                    <div class="box-header with-border">
                        <h3 class="box-title text-aqua">অনুসন্ধানঃ</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-4">

                                    <select class="form-control " ng-model="searchParam.searchFlag" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option value="<?php echo SEARCH_BY_NID; ?>">জাতীয় পরিচয় পত্র</option>
                                        <option value="<?php echo SEARCH_BY_MOBILE; ?>">মোবাইল নং</option>
                                        <option value="<?php echo SEARCH_BY_EMAIL; ?>">ইমেইল</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <input type="text" class="form-control"ng-model="searchParam.searchValue" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <button type="button" class="btn btn-block btn-success" ng-click="searchMemberInfo()">অনুসন্ধান করুন</button>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>

            </div>


        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="box  box-info">

                    <div class="box-header with-border">
                        <h3 class="box-title text-aqua">ভর্তি ইচ্ছুক সদস্যের ছবি</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="">
                                <div ng-controller="ImageCopperController" style="position: relative;">
                                    <div  ng-show="imageCropStep == 1" class="fileinput-cover-button">	
                                        <span ng-if="searchParam.searchValue === undefined" >
                                            <img class="img-responsive"    ng-src="<?php echo base_url() ?>resources/images/add_photo_album.jpg"/>
                                        </span>
                                        <span ng-if="searchParam.searchValue !== undefined && searchParam.searchFlag == <?php echo SEARCH_BY_NID ?>"  >
                                            <img class="img-responsive"    ng-src="<?php echo base_url() . USER_ALBUM_IMAGE_PATH ?>{{searchParam.searchValue}}.jpg"/>
                                        </span>
                                      <!--<img class="img-responsive" fallback-src="<?php echo base_url() ?>resources/images/cover.jpg"  ng-src="<?php echo base_url() . COVER_PICTURE_IMAGE_PATH . $user_id . '.jpg'; ?>" />-->
                                        <input class="profile_cover_upload_input" style="z-index: 1005" type="file" name="fileInput" id="fileInput" onchange="angular.element(this).scope().fileChanged(event)"/>
                                        <div class="profile_cover_upload_img">
                                            <img ng-src="<?php echo base_url() ?>resources/images/upload_icon.png"/>
                                            <span>Upload Cover Picture</span>
                                        </div>
                                    </div>			
                                    <div style="position: relative; left: -16px; margin: 0 15px; right: 0; top: 0; width: 100%"  ng-show="imageCropStep == 2" class="zoom_disable">
                                        <image-crop		 
                                            data-height="150"
                                            data-width="150"
                                            data-shape="square"
                                            data-step="imageCropStep"
                                            src="imgSrc"
                                            data-result="result"
                                            data-result-blob="resultBlob"
                                            crop="initCrop"
                                            padding="50"
                                            max-size="1024"
                                            imagepath="<?php echo base_url(); ?>member/add_cover_picture/{{searchParam.searchValue}}"
                                            ></image-crop>		   
                                    </div>
                                    <div ng-show="imageCropStep == 2" >
                                        <button class="btn btn-sm" style="position: absolute; bottom: 0; left: 42%; bottom: 35px; background-color: #999; color: #fff; z-index: 1001"  ng-click="clear()">Cancel</button>
                                        <button class="btn btn-sm" style="position: absolute; bottom: 0; right: 42%; bottom: 35px; background-color: #999; color: #fff; z-index: 1001" ng-click="initCrop = true">Crop</button>		
                                    </div>		  
                                    <div  ng-show="imageCropStep == 3">
                                        <div >
                                            <img ng-src="{{result}}"/>
                                        </div>
                                    </div>
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
                        <h3 class="box-title text-aqua">ব্যাংক সংক্রান্ত তথ্য </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3"ng-init="setZoneList('<?php echo htmlspecialchars(json_encode($zone_list)) ?>')">
                                    <label>জোনঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.zone_id" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="zoneInfo in zoneList" value={{zoneInfo.id}} >{{zoneInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3" ng-init="setAreaList('<?php echo htmlspecialchars(json_encode($area_list)) ?>')">
                                    <label>এলাকাঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.area_id" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="areaInfo in areaList" value={{areaInfo.id}} >{{areaInfo.name}}</option>

                                    </select>
                                </div>

                                <div class="form-group col-sm-3"ng-init="setBranchList('<?php echo htmlspecialchars(json_encode($branch_list)) ?>')">
                                    <label>শাখাঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.branch_id" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="branchInfo in branchList" value={{branchInfo.id}} >{{branchInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>দলঃ</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;">
                                        <option selected="selected">নির্বাচন করুণ</option>
                                        <option>চামেলী</option>
                                        <option>শিউলি</option>
                                        <option>বেলি</option>

                                    </select>

                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group date col-lg-3">
                                    <label>আবেদনের তারিখঃ</label>
                                    <input type="text" name="application_date" id="application_date"
                                           class="form-control" placeholder="আবেদনের তারিখ" style="width: 100%">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>সদস্য নম্বরঃ</label>
                                    <input type="text" name="member_no" class="form-control" placeholder="সদস্য নম্বর"
                                           style="width: 100%">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>গ্রুপ নাম্বার</label>
                                    <input type="text" name="group_no" class="form-control" placeholder="গ্রুপ নাম্বার"
                                           style="width: 100%">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>বিয়োগের দফাঃ</label>
                                    <input type="text" name="investment_step" class="form-control"
                                           placeholder="বিয়োগের দফা" style="width: 100%">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group date col-lg-3">
                                    <label>বিনিয়োগের তারিখঃ</label>
                                    <input type="text" name="investment_date" id="investment_date" class="form-control"
                                           placeholder="বিনিয়োগের তারিখ" style="width: 100%">
                                </div>

                                <div class="form-group col-sm-9">
                                    <label>আবেদনের বিষয়ঃ</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;">
                                        <option selected="selected">নির্বাচন করুণ</option>
                                        <option>বাই-মুয়াজ্জাল পদ্ধতিতে বিনিয়োগের আবেদন পত্র , গ্যারান্টি, মঞ্জুরী ও
                                            এগ্রিমেন্ট প্রসঙ্গে
                                        </option>
                                        <option>শিউলি</option>
                                        <option>বেলি</option>

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
                        <h3 class="box-title ">সম্ভাব্য সদস্যের ব্যক্তিগত তথ্য</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>নামঃ</label>
                                    <select class="form-control "  ng-model="memberSurveyInfo.name_title" style="width: 100%;" ng-init="setNameTitleList('<?php echo htmlspecialchars(json_encode($name_title_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="(key,nameTitle) in nameTitleList" value={{nameTitle}} >{{nameTitle}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>১ম নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.first_name" name="first_name" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>১ম নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.last_name"  name="first_name" placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>পারিবারিক নামঃ</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;" ng-model="memberSurveyInfo.sur_name" style="width: 100%;" ng-init="setFamilyTitleList('<?php echo htmlspecialchars(json_encode($family_name_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="(key,fimilyTitle) in familyTitleList" value={{fimilyTitle}} >{{fimilyTitle}}</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>লিঙ্গঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.gender_id" style="width: 100%;"ng-init="setGenderList('<?php echo htmlspecialchars(json_encode($gender_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="genderInfo in genderList" value={{genderInfo.id}} >{{genderInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>বয়সঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.age" style="width: 100%;" ng-init="setAgeList('<?php echo htmlspecialchars(json_encode($age_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="ageInfo in ageList" value={{ageInfo}} >{{ageInfo}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>শিক্ষাগত যোগ্যতা(সর্বোচ্চ)</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.education_id"
                                            style="width: 100%;"ng-init="setEducationList('<?php echo htmlspecialchars(json_encode($educations_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="educationInfo in educationList" value={{educationInfo.id}} >{{educationInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>উত্তীর্ণ হওয়ার সাল</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.passing_year"  style="width: 100%;" ng-init="setYearList('<?php echo htmlspecialchars(json_encode($passing_year_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
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
                                    <select class="form-control" ng-model="memberSurveyInfo.f_name_title" style="width: 100%;" ng-init="setFTitleList('<?php echo htmlspecialchars(json_encode($f_name_title_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="fTitle in fTitleList" value={{fTitle}} >{{fTitle}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>পিতার/স্বামীর ১ম নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.f_first_name"
                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>পিতার/স্বামীর ২য় নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.f_last_name"
                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label> পিতার/স্বামীর বয়সঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.f_age" style="width: 100%">
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
                                    <select class="form-control"ng-model="memberSurveyInfo.m_name_title" style="width: 100%;"ng-init="setMTitleList('<?php echo htmlspecialchars(json_encode($m_name_title_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="mTitle in mTitleList" value={{mTitle}} >{{mTitle}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>মাতার নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_first_name"  placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>মাতার ২য় নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_last_name" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>মায়ের বয়সঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.m_age" style="width: 100%">
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
                                    <select class="form-control"  ng-model="memberSurveyInfo.f_profession"
                                            style="width: 100%;" ng-init="setProfessionList('<?php echo htmlspecialchars(json_encode($profession_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="professionInfo in proList" value={{professionInfo.id}} >{{professionInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>বৈবাহিক অবস্থাঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.marital_id" style="width: 100%;" ng-init="setMaritalList('<?php echo htmlspecialchars(json_encode($marital_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="maritalInfo in maritalList" value={{maritalInfo.id}} >{{maritalInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>রাজনীতির সাথে জরিত কি না? </label>
                                    <select class="form-control" style="width: 100%;"ng-model="memberSurveyInfo.political_status_id" style="width: 100%;" ng-init="setPSList('<?php echo htmlspecialchars(json_encode($political_status_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
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
                        <h3 class="box-title "><u>যোগাযোগঃ</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>মোবাইল নংঃ </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.mobile" placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ইমেইলঃ </label>
                                    <input type="email" class="form-control" ng-model="memberSurveyInfo.email" placeholder=""   style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>অভিভাবকের মোবাইল নংঃ </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.guardian_mobile"  placeholder=""
                                           style="width: 100%;">

                                </div>
                                <div class="form-group col-lg-3">
                                    <label>শাখা অফিসের দুরুত্ব (কিঃ মিঃ)</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.s_distance"  style="width: 100%;">
                                        <option selected="selected">নির্বাচন করুন</option>
                                        <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title "><u>সম্ভাব্য সদস্যের বর্তমান ঠিকানা</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>দেশ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.m_country_id" style="width: 100%;" style="width: 100%;" ng-init="setCountryList('<?php echo htmlspecialchars(json_encode($country_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="countryInfo in countryList" value={{countryInfo.id}} >{{countryInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>জেলাঃ</label>
                                    <select class="form-control " name="age" style="width: 100%;" ng-model="memberSurveyInfo.m_district_id" style="width: 100%;" ng-init="setDistrictList('<?php echo htmlspecialchars(json_encode($district_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="districtInfo in districtList" value={{districtInfo.id}} >{{districtInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>থানাঃ</label>
                                    <select class="form-control "
                                            style="width: 100%;" ng-model="memberSurveyInfo.m_thana_id" style="width: 100%;" ng-init="setThanaList('<?php echo htmlspecialchars(json_encode($thana_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="thanaInfo in thanaList" value={{thanaInfo.id}} >{{thanaInfo.name}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ইউনিয়নঃ</label>
                                    <select class="form-control "  style="width: 100%;"ng-model="memberSurveyInfo.m_union_name" ng-init="setUnionList('<?php echo htmlspecialchars(json_encode($union_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
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
                                    <select class="form-control "  style="width: 100%;"ng-model="memberSurveyInfo.m_post_id" ng-init="setPostList('<?php echo htmlspecialchars(json_encode($post_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="postInfo in postList" value={{postInfo.id}} >{{postInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>গ্রাম বা মহল্লাঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_vill_name" placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>রাস্তা নং</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_road" placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title "><u>সম্ভাব্য সদস্যের পারিবারিক তথ্য</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>পরিবারের সদস্য সংখ্যাঃ </label>
                                    <select class="form-control " style="width: 100%;" ng-model="memberSurveyInfo.family_member_no" ng-init="setMemberList('<?php echo htmlspecialchars(json_encode($member_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>উপার্জনক্ষম পুরুষের সংখ্যা</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;" ng-model="memberSurveyInfo.male_earned_person" >
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>উপার্জনক্ষম মহিলার সংখ্যা</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;"ng-model="memberSurveyInfo.female_earned_person">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="memberInfo in memberNoList" value={{memberInfo}} >{{memberInfo}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title "><u>সম্ভাব্য সদস্যের স্থায়ী ঠিকানা</u></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>দেশ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.p_country_id" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="countryInfo in countryList" value={{countryInfo.id}} >{{countryInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>জেলাঃ</label>
                                    <select class="form-control "  ng-model="memberSurveyInfo.p_district_id"  style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="districtInfo in districtList" value={{districtInfo.id}} >{{districtInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>থানাঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.p_thana_id"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="thanaInfo in thanaList" value={{thanaInfo.id}} >{{thanaInfo.name}}</option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ইউনিয়নঃ</label>
                                    <select class="form-control " ng-model="memberSurveyInfo.p_union_name" style="width: 100%;">
                                        <option  value="">নির্বাচন করুন</option>
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
                                    <select class="form-control "  style="width: 100%;"ng-model="memberSurveyInfo.p_post_id" >
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="postInfo in postList" value={{postInfo.id}} >{{postInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>গ্রাম বা মহল্লাঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.p_vill_name"  placeholder=""
                                           style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>রাস্তা নং</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.p_road"  placeholder=""
                                           style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">

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
                                    <select class="form-control" ng-model="memberSurveyInfo.current_profession_id"name="member_profession" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="professionInfo in proList" value={{professionInfo.id}} >{{professionInfo.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>বর্তমান পেশার পূর্বে তিনি কি করতেন</label>
                                    <select class="form-control"  ng-model="memberSurveyInfo.previous_profession_id" style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option ng-repeat="professionInfo in proList" value={{professionInfo.id}} >{{professionInfo.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>সেই পেশায় কতদিন নিয়োজিত ছিলেন(মাস)</label>
                                    <select class="form-control" ng-model="previous_p_year_id"
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
                                    <textarea rows="3" class="form-control" ng-model="memberSurveyInfo.earning_source"
                                              style="width: 100%;"></textarea>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসা ছাড়া আয়ের উৎস থাকলে তার বিবরণঃ</label>
                                    <textarea rows="3" class="form-control" ng-model="memberSurveyInfo.alt_earning_source"
                                              style="width: 100%;"></textarea>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসার ধরনঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.business_type_id"
                                            style="width: 100%;"ng-init="setBTypeList('<?php echo htmlspecialchars(json_encode($business_type_list)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="bType in bTypeList" value={{bType.id}} >{{bType.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসার ভবিষ্যৎ পরিকল্পনাঃ</label>
                                    <textarea rows="3" class="form-control" ng-model="memberSurveyInfo.future_business_plan" name="business_future_plan"
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
                        <h3 class="box-title ">সম্ভাব্য সদস্যের জমির পরিমান</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-4">
                                    <label>আবাদি জমি (শতক)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.cultivable_land"
                                           placeholder="আবাদি জমি (শতক)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>অনাবাদি জমি (শতক)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.un_cultivable_land"
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
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.house"
                                           placeholder="বসত বাড়ী (শতক)" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>মোট জমি (শতক)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.total_land"
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
                        <h3 class="box-title ">সম্ভাব্য সদস্যের বাৎসরিক মোট আয় ও ব্যয়</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-4">
                                    <label>কৃষিজ আয় (টাকা)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.ag_income"
                                           placeholder="কৃষিজ আয় (টাকা)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>অকৃষিজ আয় (টাকা)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.un_ag_income"
                                           placeholder="অকৃষিজ আয় (টাকা)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>মোট আয় (টাকা)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.total_income"
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
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.total_expence"
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
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.tin_house"
                                           placeholder="টিনের ঘর (কত টি?)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>খড়ের ঘর (কত টি?)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.straw_house"
                                           placeholder="খড়ের ঘর (কত টি?)" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>ইটের ঘর (কত টি?)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.brick_house"   placeholder="ইটের ঘর (কত টি?)"
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
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.receive_amound"
                                           placeholder="গৃহীত টাকার পরিমাণ" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>পরিশোধিত টাকার পরিমাণ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.paid_amound"
                                           placeholder="পরিশোধিত টাকার পরিমাণ" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>অবশিষ্ট টাকার পরিমাণ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.re_amound"
                                           placeholder="অবশিষ্ট টাকার পরিমাণ" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>পরিশোধের ধরণঃ </label>
                                    <select class="form-control"
                                            style="width: 100%;" ng-model="memberSurveyInfo.payment_type_id" ng-init="setPaymentTypeList('<?php echo htmlspecialchars(json_encode($payment_types)) ?>')">
                                        <option value="">নির্বাচন করুন</option>/option>
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
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.financier_company"
                                           placeholder="লগ্নীকারী প্রতিষ্ঠানের নাম " style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>কতদিন যাবৎ গ্রহন করছেন (মাস)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.loaning_year"
                                           placeholder="কতদিন যাবৎ গ্রহন করছেন" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>সর্বশেষ কবে গ্রহণ করেছেন </label>

                                    <input type="text" class="form-control"  id="last_receive_date" ng-model="memberSurveyInfo.last_loaning_year"
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
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.investment_sector"
                                           placeholder="বিনিয়োগের খাত " style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>টাকার পরিমানঃ </label>

                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.amount"
                                           placeholder="সর্বশেষ কবে গ্রহণ করেছেন " style="width: 100%;">
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

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title ">সম্ভাব্য সদস্যের ব্যবসায়িক তথ্য </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-3">
                                    <label>ব্যবসার নামঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_business_name"
                                           placeholder="আবাদি জমি (শতক)" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ব্যবসার প্রকৃতিঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_bus_type_name"
                                           placeholder="ব্যবসার প্রকৃতিঃ" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসার অভিজ্ঞতাঃ(মাস) </label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_business_expre"
                                           placeholder="মাস" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসা কেন্দ্রের ঠিকানাঃ </label>
                                    <textarea rows="2" class="form-control" ng-model="memberSurveyInfo.m_business_adds"
                                              style="width: 100%;"></textarea>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group date col-lg-3">
                                    <label>বব্যবসা শুরুর তারিখঃ</label>

                                    <input type="text" class="form-control" id="business_start_date" ng-model="memberSurveyInfo.m_bus_date"
                                           placeholder="" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>অবকাঠামোঃ</label>
                                    <select class="form-control"  ng-model="memberSurveyInfo.m_bus_infrastructure"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option value="পাকা">পাকা</option>
                                        <option value="সেমি পাকা">সেমি পাকা</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6 form-inline">
                                    <label>পরিমাপঃ </label>
                                    <input type="text" class="form-group" ng-model="memberSurveyInfo.m_bus_from_foot"
                                           placeholder="ফুট">
                                    <input type="text" class="form-group" ng-model="memberSurveyInfo.m_bus_to_foot"
                                           placeholder="ফুট">
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-sm-3">
                                    <label> দিকঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.m_bus_direction"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option value="পূর্ব">পূর্ব</option>
                                        <option value="পশ্চিম">পশ্চিম</option>
                                        <option value="উত্তর">উত্তর</option>
                                        <option value="দক্ষিণ">দক্ষিণ</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">

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

                                <div class="form-group col-lg-3">
                                    <label>বব্যবসা স্থানঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.m_bus_place"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option value="নিজেস্ব">নিজেস্ব</option>
                                        <option value="পজিশন">পজিশন</option>
                                        <option value="ভাড়া">ভাড়া</option>
                                        <option value="লীজ">লীজ</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>ট্রেড লাইসেন্স নংঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_trade_licence"
                                           placeholder="১২৩৪৪৫৬৭" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>ইস্যুকারী কতৃপক্ষঃ </label>
                                    <select class="form-control" ng-model="memberSurveyInfo.m_admin"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option value="ইউনিয়ন">ইউনিয়ন</option>
                                        <option value="পৌরসভা">পৌরসভা</option>
                                        <option value="সিটি কর্পোরেশন">সিটি কর্পোরেশন</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ব্যবসায় নিয়োজিত মূলধনঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_capital"
                                           placeholder="নিয়োজিত মূলধন" style="width: 100%;">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-lg-3">
                                    <label>মাসিক গড় বিক্রয়ঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_avg_sale"
                                           placeholder="গড় বিক্রয়" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">

                                </div>

                                <div class="form-group col-lg-3">

                                </div>

                                <div class="form-group col-sm-3">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title ">ব্যবসায় নিয়োজিত মূলধনের উৎসঃ</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-lg-3">
                                    <label>ব্যাংক(%)</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_bank"
                                           placeholder="" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>এন জি ও (%)</label>
                                    <input type="text" class="form-control"  ng-model="memberSurveyInfo.m_ngo"
                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>নিজঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_self"
                                           placeholder="নিজঃ" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>ধার/কর্জ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_loan"
                                           placeholder="ধার/কর্জ" style="width: 100%;">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-lg-3">
                                    <label>বব্যবসা থেকে মাসিক আয়ঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_monthly_income"
                                           placeholder="বব্যবসা থেকে মাসিক আয়" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>বব্যবসা থেকে মাসিক ব্যয়ঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_monthly_expen"
                                           placeholder="বব্যবসা থেকে মাসিক ব্যয়" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>উদ্বৃত্তঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_surplus"
                                           placeholder="উদ্বৃত্ত" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-lg-3">
                                    <label>অন্যান্য উৎস থেকে মাসিক আয়ঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_others_m_income"
                                           placeholder="অন্যান্য উৎস থেকে মাসিক আয়" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>অন্যান্য উৎসঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.m_others_total_income"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>
                                        <option>চাকুরী</option>
                                        <option>অন্যত্র বিনিয়োগ</option>
                                        <option>জমি</option>
                                        <option>বাড়ী ভাড়া</option>
                                        <option>দোকান ভাড়া</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>অন্যান্য উৎস থেকে মাসিক ব্যয়ঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_others_m_exp"
                                           placeholder="অন্যান্য উৎস মাসিক ব্যয়" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label>উদ্বৃত্তঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_extra"
                                           placeholder="উদ্বৃত্ত" style="width: 100%;">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">

                                    <label>সর্বমোট উদ্বৃত্তঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_total_extra"
                                           placeholder="সর্বমোট উদ্বৃত্ত" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3">

                                </div>

                                <div class="form-group col-lg-3">

                                </div>

                                <div class="form-group col-sm-3">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-lg-3">
                                    <label>ব্যবসার ধরনঃ</label>
                                    <select class="form-control" ng-model="memberSurveyInfo.m_bus_type_id"
                                            style="width: 100%;">
                                        <option value="">নির্বাচন করুন</option>/option>
                                        <option ng-repeat="bType in bTypeList" value={{bType.id}} >{{bType.name}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>অন্যান্যঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.m_others"
                                           placeholder="অন্যান্য.........." style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">

                                </div>

                                <div class="form-group col-sm-3">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <p class="text-red">প্রতিদিন ব্যবসায় নিয়োজিত সময়ঃ</p>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline ">


                                <div class="input-group col-lg-3 bootstrap-timepicker">
                                    <label>১ম অর্ধ শুরুঃ</label>

                                    <input type="text" class="form-control timepicker" id="first_half_start_time" ng-model="memberSurveyInfo.start_first_half"

                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3 bootstrap-timepicker">
                                    <label>১ম অর্ধ শেষঃ</label>

                                    <input type="text" class="form-control timepicker" id="first_half_end_time" ng-model="memberSurveyInfo.last_first_half"

                                           placeholder="" style="width: 100%;">
                                </div>
                                <div class="form-group col-lg-3 bootstrap-timepicker">
                                    <label>২য় অর্ধ শুরুঃ</label>

                                    <input type="text" class="form-control" id="second_half_start_time" ng-model="memberSurveyInfo.first_second_half"
                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3 bootstrap-timepicker">
                                    <label>২য় অর্ধ শেষঃ</label>

                                    <input type="text" class="form-control" id="second_half_end_time"  ng-model="memberSurveyInfo.last_second_half"

                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">


                                <div class="form-group col-lg-3 bootstrap-timepicker">
                                    <label>মোট সময়ঃ</label>

                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.total_time"
                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3">

                                </div>
                                <div class="form-group col-lg-3">

                                </div>

                                <div class="form-group col-lg-3">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">


                                <div class="form-group col-lg-3 bootstrap-timepicker">
                                    <label>প্রতিদিন প্রতিষ্ঠান খোলা হয়ঃ</label>

                                    <input  id="opening_time" type="text" class="form-control timepicker"  ng-model="memberSurveyInfo.opening_time"

                                            placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3 bootstrap-timepicker">
                                    <label>প্রতিদিন প্রতিষ্ঠান বন্ধ হয়ঃ</label>

                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.closing_time"

                                           placeholder="" style="width: 100%;">
                                </div>
                                <div class="form-group col-lg-3 bootstrap-timepicker">
                                    <label>মাঝে বন্ধ শুরুঃ</label>

                                    <input type="text" class="form-control " ng-model="memberSurveyInfo.intervel_start"

                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3 bootstrap-timepicker">
                                    <label>মাঝে বন্ধ শেষঃ</label>

                                    <input type="text" class="form-control bootstrap-timepicker" ng-model="memberSurveyInfo.intervel_end"

                                           placeholder="" style="width: 100%;">
                                </div>

                                <div class="form-group col-sm-3">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">

                                <div class="form-group col-lg-3">
                                    <label>সাপ্তাহিক বন্ধঃ</label>
                                    <select class="form-control" name="member_previous_profession_duration"
                                            style="width: 100%;">
                                        <option selected="selected">নির্বাচন করুন</option>
                                        <option>শুক্রবার</option>
                                        <option>শনিবার</option>
                                        <option>রবিবার</option>
                                        <option>সোমবার</option>
                                        <option>মঙ্গলবার</option>
                                        <option>বুধবার</option>
                                        <option>বৃহস্পতিবার</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label>প্রতিষ্ঠানে স্থায়ী জনবলের সংখ্যাঃ</label>
                                    <input type="text" class="form-control" ng-model="memberSurveyInfo.total_member"
                                           placeholder="প্রতিষ্ঠানে স্থায়ী জনবলের সংখ্যা" style="width: 100%;">
                                </div>

                                <div class="form-group col-lg-3">

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
                        <button type="button" class="btn btn-info btn-flat ">Save</button>
                    </div>
                </div>

            </div>


        </div>

    </section>
    <!-- /.content -->
</div>

<script>
    $(function () {

    $('#application_date').datepicker({
    autoclose: true
    });
    $('#investment_date').datepicker({
    autoclose: true
    });
    $(".timepicker").timepicker({
    showInputs: false
    });
    });
</script>