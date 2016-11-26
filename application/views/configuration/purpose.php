<div class="content-wrapper" ng-controller="configurationController">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1%">
        <h1 class="text-center">টিএমএসএস ইসলামিক মাইক্রো ফাইনান্স (TMSS)</h1>
        <p class="text-aqua text-center"><u>বিনিয়োগকারীর উদ্দেশ্য প্রদান করুন</u></p>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">

                    <div class="box-body">
                        <div class="row">
                            <div class="form-inline">
                                <div class="form-group col-lg-12">
                                    <label>উদ্দেশ্যের নামঃ</label>
                                    <input type="text" class="form-control" ng-model="purposeInfo.purpose_name"  style="width: 100%" required>
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