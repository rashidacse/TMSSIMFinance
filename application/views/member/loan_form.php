
<script type="text/javascript">
    $(function () {
        $('#start_date').Zebra_DatePicker();
//        $('#start_date').val('<?php // echo $current_date            ?>');
        $('#a_start_date').Zebra_DatePicker();
//        $('#end_date').val('<?php // echo $current_date            ?>');
    });
</script>

<div class="row"  style="margin-top: 25px">
    <div class="ezttle">
        <div class="col-md-6">
            <div ><span class="text">Loan Application form</span></div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">NID/MI: </div>
                <div class="col-md-6" ><input type="text" class="form-control input-xs customInputMargin" placeholder="0579011225765768" ng-model="searchInfo.cellNo"></div>
                <div class="col-md-3"><input id="search_submit_btn" type="submit" size="18" value="Search" onclick="search_member(angular.element(this).scope().searchInfo)" class="button-custom"></div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 25px">
    <div class=" row  form-group form-inline">
        <div class="col-md-2">
            <?php $this->load->view("member/add_picture"); ?>
        </div>
        <div class="col-md-10">
            <div class="row form-group">
                <div class=" col-md-2 form-group  ">
                    <lebel class=""  for="">জোন</lebel>
                    <select class="" name="zone_name">
                        <option>ঢাকা</option>
                        <option>পাবনা</option>
                        <option>বগুড়া</option>
                        <option>নাটোর</option>
                    </select>
                </div>
                <div class=" col-md-2 form-group">
                    <lebel class="" for="">অঞ্চল</lebel>
                    <select class=""  name="area_name">
                        <option>মিরপুর</option>
                        <option>পবা</option>
                        <option>বেড়া</option>
                        <option>লালপুর</option>
                    </select>
                </div>
                <div class=" col-md-2  form-group">
                    <lebel  class=""  for="">শাখাঃ</lebel>
                    <select class=""  name="branch_name">
                        <option>মিরপুর</option>
                        <option>পবা</option>
                        <option>বেড়া</option>
                        <option>লালপুর</option>
                    </select>
                </div>
                <div class=" col-md-3  form-group">
                    <lebel  class=""  for="">Group</lebel>
                    <select class=""  name="branch_name">
                        <option>মিরপুর</option>
                        <option>পবা</option>
                        <option>বেড়া</option>
                        <option>লালপুর</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <lebel class=""  for="">Group No:</lebel>
                    <input  class="" type="text" name="first_name" placeholder="Group no">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3 form-group">
                    <lebel class=""  for="">Admission date:</lebel>
                    <input id="start_date" type="text" size="18" placeholder="Start Date"  name="from" class="form-control input-xs customInputMargin">
                </div>
                <div class="col-md-3 form-group">
                    <lebel class=""  for="">Member No:</lebel>
                    <input  class="" type="text" name="first_name" placeholder="Member no">
                </div>

                <div class="col-md-3 form-group">
                    <lebel class=""  for="">Admission date:</lebel>
                    <input id="a_start_date" type="text" size="18" placeholder="Start Date"  name="from" class="form-control input-xs customInputMargin">
                </div>
                <div class="col-md-3 form-group">
                    <lebel class=""  for="">Application Type:</lebel>
                    <select class="" name="educational_qualification">
                        <option>---select---</option>
                        <option>weekly</option>
                        <option>Monthly</option>
                        <option>Krishi</option>
                    </select>
                </div>
            </div>

        </div>
    </div>

    

    <div class=" row form-group form-inline">
        <div class="col-md-3">
            <lebel for="">নামঃ</lebel>
            <div class="form-group ">
                <select class="" name="name_title">
                    <option>---select---</option>
                    <option>মোঃ</option>
                    <option>মোছাঃ</option>
                    <option>শ্রীঃ</option>
                    <option>শ্রীমতি</option>
                </select>
            </div>
        </div>
        <div class="col-md-3  form-group">
            <input  class="" type="text" name="first_name" placeholder="১ম নামঃ">
        </div>
        <div class="col-md-3 form-group ">
            <input class="" type="text" name="last_name" placeholder="২য় নামঃ">
        </div>
        <div class="col-md-3 form-group">
            <input  class="" type="text" name="last_name" placeholder="২য় নামঃ">
        </div>
    </div>
    <div class=" row form-group form-inline">
        <div class="col-md-3"></div>
        <div class="form-group col-md-3 ">
            <lebel for="">পারিবারিক নামঃ</lebel>
            <select class="" name="family_name">
                <option>---select---</option>
                <option>শেখ</option>
                <option>মোল্লা</option>
                <option>খান</option>
                <option>মণ্ডল</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <lebel for="">লিঙ্গঃ</lebel>
            <select class="" name="gender_name">
                <option>---select---</option>
                <option>পুরুষ</option>
                <option>মহিলা</option>
                <option>অন্যান্য</option>
            </select>
        </div>
        <div class="col-md-3">
            <lebel for="">বয়সঃ</lebel>
            <div class="form-group ">
                <select class="" name="age">
                    <option>---select---</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class=" row form-group form-inline">
        <div class="col-md-3">
            <lebel for="">Business Info</lebel>
        </div>
        <div class="col-md-2">
            <lebel for="">Type</lebel>
            <div class="form-group ">
                <select class="" name="age">
                    <option>---select---</option>
                    <option>Eng</option>
                    <option>doc</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <lebel for="">Duration</lebel>
            <div class="form-group ">
                <select class="" name="age">
                    <option>---select---</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <input type="text" name="father/hasband_second_name" placeholder="পিতার ২য় নামঃ">
        </div>
        <div class="col-md-3">
            <lebel for="">Address</lebel>
            <div class="form-group ">
                <input type="text_area" name="father/hasband_second_name" placeholder="Address">

            </div>
        </div>
    </div>
    <div class=" row form-group form-inline">
        <div class="col-md-3">
            <lebel for="">Instalment</lebel>
            <select class="" name="father/hasband_title">
                <option>---select---</option>
                <option>মোছাঃ</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="text" name="father/hasband_first_name" placeholder="মাতার ১ম নামঃ">
        </div>
        <div class="col-md-2">
            <input type="text" name="father/hasband_second_name" placeholder="মাতার ২য় নামঃ">
        </div>
        <div class="col-md-2">
            <input type="text" name="father/hasband_second_name" placeholder="মাতার ২য় নামঃ">
        </div>
        <div class="col-md-3">
            <lebel for="">মাতার বয়স</lebel>
            <select class="" name="father/hasband_family_name">
                <option>---select---</option>
                <option>30</option>
                <option>31</option>
                <option>32</option>
                <option>45</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-offset-8 col-md-2 pull-right">
            <input id="search_submit_btn" ng-model="Save" type="submit" size="18" value="Save" onclick="search_payment_history()" class="button ">
        </div>
    </div>
</div>

