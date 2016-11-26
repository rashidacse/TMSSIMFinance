<div class="content-wrapper" ng-controller="memberController">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1%">
        <h4 class="text-center">টিএমএসএস ইসলামিক মাইক্রো ফাইনান্স (TMSSIMF)</h4>
        <p class="text-blue text-center"><u>জরিপের তালিকা</u></p>
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
                                    <input type="text" class="form-control" id="search_member_id" name="search_member_name" onchange="get_class_subject_nid" ng-model="searchParam.searchValue" placeholder="">
                                    <button type="button" class="btn bg-navy btn-flat margin"  onclick="">অনুসন্ধান করুন</button>
                                </div>
                                <div class="form-group col-sm-6">
                                    <a href="index.html"> <button type="button" class="btn bg-purple btn-flat margin pull-right" value="">Add a New Survey</button></a>
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
                        <h3 class="box-title ">Survey List</h3>
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover" ng-init="setSurveyList('<?php echo htmlspecialchars(json_encode($survey_list)) ?>')">
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
                            <tr ng-repeat="(key, surveyInfo) in surveyList">
                                <td>{{key+1}}</td>
                                <td>{{surveyInfo.id}}</td>
                                <td>{{surveyInfo.nid}}</td>
                                <td>{{surveyInfo.name_title}} {{surveyInfo.first_name}} {{surveyInfo.last_name}}</td>
                                <td>{{surveyInfo.mobile}}</td>
                                <td>{{surveyInfo.email}}</td>
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
<script type="text/javascript">
    console.log('survey record search');
    $(this).ready(function () {
        $("#search_member_id").autocomplete({

            minLength: 1,
            source: function (req, add) {
                console.log('Inside function source()');
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/member/survey_list_autocomplet",
                    dataType: 'json',
                    type: 'POST',
                    data: req,
                    success: function (data) {
                        console.log('Inside function success()');
                        if (data.response == "true") {
                            add(data.message);
                            console.log(data.message);
                        }
                    }
                });
            }

        });


    });

</script>

<script type="text/javascript">
    function get_class_subject_nid(search_member_name) {
        $.ajax({
            url: '<?php echo base_url();?>index.php/member/survey_search/' + search_member_name,
            success: function (response) {
                jQuery('#subject_selection_holder').html(response);
            }
        });
    }
</script>