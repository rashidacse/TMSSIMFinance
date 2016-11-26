<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>TIMFinance</title>
        <meta name="author" content="Rashida Sultana">
        <meta name="description" content="Social">
        <meta name="keywords" content=""/>
        <meta charset="UTF-8">
        <link href="<?php echo base_url()?>resources/images/money.ico" rel="icon" type="image/x-icon" id="page_favicon">
        <link href="<?php echo base_url()?>resources/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url()?>resources/css/default.css" rel="stylesheet">
        <link href="<?php echo base_url()?>resources/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url()?>resources/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>resources/css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo base_url()?>resources/css/AdminLTE.min.css">

        <link rel="stylesheet" href="<?php echo base_url()?>resources/css/skins/_all-skins.min.css">

        <script src="<?php echo base_url()?>resources/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>resources/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>resources/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url()?>resources/js/jquery-ui.js"></script>

        <script src="<?php echo base_url()?>resources/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url()?>resources/js/app.min.js"></script>



    </head>
    <body id="" class="hold-transition skin-blue sidebar-mini">
        <?php $this->load->view('nonmember/templates/sections/header');?>
        <section>
            <?php echo $contents;?>
        </section>
        <?php $this->load->view('nonmember/templates/sections/footer');?>
<!--        <script type="text/javascript">
            //
            function autoResize(id) {
                var newheight;
                var newwidth;

                if (document.getElementById) {
                    newheight = document.getElementById(id).contentWindow.document.body.scrollHeight;
                    newwidth = document.getElementById(id).contentWindow.document.body.scrollWidth;
                }

                document.getElementById(id).height = (newheight) + "px";
                document.getElementById(id).width = (newwidth) + "px";
            }
            //
        </script>-->



    </body>
</html>