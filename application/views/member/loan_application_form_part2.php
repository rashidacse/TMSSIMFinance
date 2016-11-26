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

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title text-aqua">উদ্যোক্তার মাসিক আয়/ব্যয় বিবরণীঃ</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form ng-submit="addNew()">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" ng-model="selectedAll"
                                                               ng-click="checkAll()"/></th>
                                                    <th>ক্রমিক নং</th>
                                                    <th>বিবরণ</th>
                                                    <th>মোট আয়</th>
                                                    <th>মোট ব্যয়</th>
                                                    <th>নীট আয়</th>
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
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
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
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form ng-submit="addNew()">
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                <tr ng-repeat="personalDetail in personalDetails">

                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.sl_no" required/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" ng-model="personalDetail.selected"/>
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.sl_no" required/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               ng-model="personalDetail.amount_taka" required/>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" ng-model="personalDetail.selected"/>
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
                        <h3 class="box-title text-aqua">সদস্যের সম্পদ ও দেনার বিবরণী</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-sm-3">
                                    <label>দেনার বিবরণঃ</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;">
                                        <option selected="selected">ঢাকা</option>
                                        <option>পাবনা</option>
                                        <option>বগুড়া</option>
                                        <option>নাটোর</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>টাকা</label>
                                    <input type="text" class="form-control" name="cultivable_land"
                                           placeholder="টাকা" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>সম্পদের বিবরণঃ</label>
                                    <select class="form-control " name="zone_name" style="width: 100%;">
                                        <option selected="selected">ঢাকা</option>
                                        <option>পাবনা</option>
                                        <option>বগুড়া</option>
                                        <option>নাটোর</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>টাকা</label>
                                    <input type="text" class="form-control" name="cultivable_land"
                                           placeholder="টাকা" style="width: 100%;">
                                </div>
                                <div class="form-group col-sm-1">
                                    <button type="button" class="btn btn-info btn-flat "><i
                                            class="fa fa-plus-square"></i>Add More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>

                            <th>দেনার বিবরণ</th>
                            <th>টাকার পরিমাণ</th>

                            <th>সম্পদের বিবরণ</th>
                            <th>টাকার পরিমাণ</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td>মূল দলিল/দলিলের রশিদ</td>
                            <td>123</td>

                            <td>খাজনার DCR</td>
                            <td>1223</td>
                        </tr>
                        <tr>

                            <td>মূল দলিল/দলিলের রশিদ</td>
                            <td>123</td>

                            <td>খাজনার DCR</td>
                            <td>123</td>
                        </tr>
                        <tr>

                            <td>মূল দলিল/দলিলের রশিদ</td>
                            <td>123</td>

                            <td>খাজনার DCR</td>
                            <td>123</td>
                        </tr>
                        <tr>

                            <td>মূল দলিল/দলিলের রশিদ</td>
                            <td>123</td>

                            <td>খাজনার DCR</td>
                            <td>123</td>
                        </tr>
                        <tr>

                            <td class="pull-right">মোট=</td>
                            <td>123</td>

                            <td class="pull-right">মোট=</td>
                            <td>123</td>
                        </tr>
                        </tbody>
                    </table>
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