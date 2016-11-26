<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TIMF</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--<CSS>-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/font-awesome.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/ionicons.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/AdminLTE.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/skins/_all-skins.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/styles.css">

        <!--<Date picker css>-->
<!--        <link rel="stylesheet" href="--><?php ////echo base_url(); ?><!--<!--resources/css/superadmin/zebra_datePicker.css" type="text/css">-->
<!--        <link rel="stylesheet" href="--><?php ////echo base_url(); ?><!--<!--resources/css/superadmin/zebra_datePicker_custom.css" type="text/css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/plugins/timepicker/bootstrap-timepicker.min.css">
        <!--<NAV Bar JS>-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>resources/plugins/datatables/dataTables.bootstrap.css">

        <script src="<?php echo base_url(); ?>resources/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url(); ?>resources/js/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>resources/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/moment.js"></script>
        <script src="<?php echo base_url(); ?>resources/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>resources/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script src="<?php echo base_url(); ?>resources/js/app.min.js"></script>
        <!--<Date picker js>-->
        <script type="text/javascript" src="<?php echo base_url() ?>resources/js/superadmin/zebra_datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>resources/js/superadmin/zebra_datepicker_core.js"></script>
        <!--<angular>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/angular/angular.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/angular-bootstrap/ui-bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/angular/angular-animate.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/angular/angular-file-upload.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/csv_file_dependencies/angular-sanitize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/csv_file_dependencies/ng-csv.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/angular/image-crop.js"></script>
        <!--<angular Services>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/AngularService/memberService.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/AngularService/configurationService.js"></script>
        <!--<angular Controller>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/AngularController/memberController.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/AngularController/configurationController.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/AngularController/imageCropController.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/AngularController/headerController.js"></script>

        <!--<angular Apps>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/AngularApp/memberApp.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/AngularApp/configarationApp.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />
    </head>

    <body class="hold-transition skin-blue sidebar-mini">


        <div class="wrapper" ng-app = "<?php echo $app_name; ?>">


            <?php $this->load->view("templates/sections/header"); ?>
            <?php $this->load->view('templates/left_panel'); ?>
            <div style="background-color: #FFFFFF;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-11">
                            <?php echo $contents; ?>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </div>
        <!--            <div id="footer">
        <?php // $this->load->view("templates/sections/footer"); ?>
            </div>-->


    </div>

</body>
</html>
