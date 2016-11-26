<div class="content-wrapper" ng-controller="memberController">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1%">
        <h1 class=" text-center">টিএমএসএস ইসলামিক মাইক্রো ফাইনান্স (TMSSIMF)</h1>
        <p class="text-blue text-center"><u>ঋণ আবেদন ফরম</u></p>
    </section>


    <section class="content">

        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title ">Cash Flow/ অর্থ প্রবাহ বিবরণী (মাসিক সর্বনিম্ন)</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-header with-border">
                        <p class=" ">উদ্যোগ/ব্যবসার অর্থ প্রবাহঃ (এ ছকে শুধু মাত্র যে ব্যবসার জন্য বিনিয়োগ নিতে
                            আগ্রহী সেই ব্যবসার মাসিক গড় ক্যাশ প্রবাহের তথ্য যাবে)</p>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form ng-submit="addNew()">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr class="">
                                                    <th colspan="4" style="width: 50% ;text-align: center">Cash Inflow
                                                        (অর্থ আগমন)
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th><input type="checkbox" ng-model="selectedAll"
                                                               ng-click="checkAll()"/></th>
                                                    <th>ক্রমিক নং</th>
                                                    <th>সেবা/পণ্য বিক্রয়ের বিবরণ</th>
                                                    <th>টাকার পরিমাণ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="personalDetail in personalDetails">
                                                    <td>
                                                        <input type="checkbox" ng-model="personalDetail.selected"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.sl_no" required/>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" ng-model="personalDetail.fname"
                                                                required>
                                                            <option selected="selected">ঢাকা</option>
                                                            <option>পাবনা</option>
                                                            <option>বগুড়া</option>
                                                            <option>নাটোর</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="form-group">
                                                <input ng-hide="!personalDetails.length" type="button"
                                                       class="btn btn-danger pull-right" ng-click="remove()"
                                                       value="Remove">
                                                <input type="submit" class="btn btn-primary addnew pull-right"
                                                       value="Add New">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title ">Cash Flow/ অর্থ প্রবাহ বিবরণী (মাসিক সর্বনিম্ন)</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-header with-border">
                        <p class=" ">উদ্যোগ/ব্যবসার অর্থ প্রবাহঃ (এ ছকে শুধু মাত্র যে ব্যবসার জন্য বিনিয়োগ নিতে
                            আগ্রহী সেই ব্যবসার মাসিক গড় ক্যাশ প্রবাহের তথ্য যাবে)</p>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form ng-submit="addNew()">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr class="">
                                                    <th colspan="4" style="width: 50% ;text-align: center">Cash OutFlow
                                                        (অর্থ বহিঃরগমন)
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th><input type="checkbox" ng-model="selectedAll"
                                                               ng-click="checkAll()"/></th>
                                                    <th>ক্রমিক নং</th>
                                                    <th>কাঁচামাল ক্রয় ও খরচের বিবরণ</th>
                                                    <th>টাকার পরিমাণ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="personalDetail in personalDetails">
                                                    <td>
                                                        <input type="checkbox" ng-model="personalDetail.selected"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.sl_no" required/>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" ng-model="personalDetail.fname"
                                                                style="width: 100%;" required>
                                                            <option selected="selected">ঢাকা</option>
                                                            <option>পাবনা</option>
                                                            <option>বগুড়া</option>
                                                            <option>নাটোর</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="form-group">
                                                <input ng-hide="!personalDetails.length" type="button"
                                                       class="btn btn-danger pull-right" ng-click="remove()"
                                                       value="Remove">
                                                <input type="submit" class="btn btn-primary addnew pull-right"
                                                       value="Add New">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title ">Cash Flow/ অর্থ প্রবাহ বিবরণী (মাসিক সর্বনিম্ন)</h3>
                    </div>

                    <div class="box-header with-border">
                        <p class=" ">সামগ্রীক অর্থ প্রবাহ ছকঃ (এ ছকে বিনিয়োগ নিতে
                            আগ্রহী ব্যক্তির সকল ধরনের আয়ের উৎসের মাসিক গড় ক্যাশ প্রবাহের তথ্য যাবে)</p>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form ng-submit="addNew()">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr class="">
                                                    <th colspan="4" style="width: 50% ;text-align: center">Cash Inflow
                                                        (অর্থ আগমন)
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th><input type="checkbox" ng-model="selectedAll"
                                                               ng-click="checkAll()"/></th>
                                                    <th>ক্রমিক নং</th>
                                                    <th>আয়ের বিবরণ</th>
                                                    <th>টাকার পরিমাণ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="personalDetail in personalDetails">
                                                    <td>
                                                        <input type="checkbox" ng-model="personalDetail.selected"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.sl_no" required/>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" ng-model="personalDetail.fname"
                                                                required>
                                                            <option selected="selected">ঢাকা</option>
                                                            <option>পাবনা</option>
                                                            <option>বগুড়া</option>
                                                            <option>নাটোর</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="form-group">
                                                <input ng-hide="!personalDetails.length" type="button"
                                                       class="btn btn-danger pull-right" ng-click="remove()"
                                                       value="Remove">
                                                <input type="submit" class="btn btn-primary addnew pull-right"
                                                       value="Add New">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title ">Cash Flow/ অর্থ প্রবাহ বিবরণী (মাসিক সর্বনিম্ন)</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-header with-border">
                        <p class=" ">সামগ্রীক অর্থ প্রবাহ ছকঃ (এ ছকে বিনিয়োগ নিতে
                            আগ্রহী ব্যক্তির সকল ধরনের আয়ের উৎসের মাসিক গড় ক্যাশ প্রবাহের তথ্য যাবে)</p>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form ng-submit="addNew()">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr class="">
                                                    <th colspan="4" style="width: 50% ;text-align: center">Cash OutFlow
                                                        (অর্থ বহিঃরগমন)
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th><input type="checkbox" ng-model="selectedAll"
                                                               ng-click="checkAll()"/></th>
                                                    <th>ক্রমিক নং</th>
                                                    <th>খরচের বিবরণ</th>
                                                    <th>টাকার পরিমাণ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="personalDetail in personalDetails">
                                                    <td>
                                                        <input type="checkbox" ng-model="personalDetail.selected"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.sl_no" required/>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" ng-model="personalDetail.fname"
                                                                style="width: 100%;" required>
                                                            <option selected="selected">ঢাকা</option>
                                                            <option>পাবনা</option>
                                                            <option>বগুড়া</option>
                                                            <option>নাটোর</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="form-group">
                                                <input ng-hide="!personalDetails.length" type="button"
                                                       class="btn btn-danger pull-right" ng-click="remove()"
                                                       value="Remove">
                                                <input type="submit" class="btn btn-primary addnew pull-right"
                                                       value="Add New">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box-header with-border">
                    <h3 class="box-title ">অত্র সংস্থা বা অন্য কোন আর্থিক প্রতিষ্ঠানে আবেদনকারীর বিনিয়োগের
                        তথ্যঃ</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="form-inline">

                            <div class="form-group col-lg-3">
                                <label>বিনিয়োগ দাতা প্রতিষ্ঠানের নামঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="বিনিয়োগ দাতা প্রতিষ্ঠানের নামঃ" style="width: 100%;">
                            </div>

                            <div class="form-group col-lg-3">
                                <label>বিনিয়োগ দাতা প্রতিষ্ঠানের ঠিকানাঃ</label>
                                <textarea class="form-control" name="org_address" style="width: 100%"></textarea>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>গৃহীত বিনিয়োগ/ঋনের পরিমানঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="গৃহীত বিনিয়োগ/ঋনের পরিমানঃ" style="width: 100%;">
                            </div>

                            <div class="form-group col-sm-3">
                                <label>বিনিয়োগ সামগ্রীর নামঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="বিনিয়োগ সামগ্রীর নামঃ" style="width: 100%;">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="form-inline">

                            <div class="form-group col-lg-3">
                                <label>বিনিয়োগের দফা নংঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="বিনিয়োগের দফাঃ নংঃ" style="width: 100%;">
                            </div>

                            <div class="form-group col-lg-3">
                                <label>বিনিয়োগের মেয়াদঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="বিনিয়োগের মেয়াদঃ" style="width: 100%;">
                            </div>

                            <div class="form-group col-lg-3">
                                <label>বিনিয়োগ/ঋণ গ্রহনের তাংঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="" style="width: 100%;">
                            </div>

                            <div class="form-group col-sm-3">
                                <label>এ পর্যন্ত পরিশোধঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="এ পর্যন্ত পরিশোধঃ" style="width: 100%;">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="form-inline">

                            <div class="form-group col-lg-3">
                                <label>বর্তমান স্থিতিঃ </label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="বর্তমান স্থিতিঃ " style="width: 100%;">
                            </div>

                            <div class="form-group col-lg-3">
                                <label>অবশিষ্ট কিস্তি সংখ্যাঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="অবশিষ্ট কিস্তি সংখ্যাঃ" style="width: 100%;">
                            </div>

                            <div class="form-group col-lg-3">
                                <label>সম্ভাব্য পরিশোধের তারিখঃ</label>
                                <input type="text" class="form-control" name="cultivable_land"
                                       placeholder="" style="width: 100%;">
                            </div>

                            <div class="form-group col-sm-3">

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

