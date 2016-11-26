<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . 'configuration/welcome_page' ?>"><i
                                class="fa fa-circle-o text-blue"></i> Dashboard</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user text-green"></i> <span>জরিপ</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . 'member/survey_list' ?>"><i class="fa fa-user-o"></i>Survey
                            List</a></li>
                    <li><a href="index.html"><i class="fa fa-user-plus"></i>New Survey</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>সদস্য</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . 'member/member_list' ?>"><i class="fa fa-user-o"></i>সদস্য
                            তালিকা</a></li>
                    <li><a href="<?php echo base_url() . 'member/add_addmission_info' ?>"><i
                                class="fa fa-user-plus"></i>সদস্য যোগ করুণ</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-bank "></i> <span>প্রতিষ্ঠান সংক্রান্ত </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . 'configuration/organization_settings' ?>"><i
                                class="fa fa-institution"></i>প্রতিষ্ঠানের তথ্য </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase"></i> <span>ঋণ সংক্রান্ত</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . 'member/loan_application' ?>"><i class="fa fa-circle-o"></i>ঋণ
                            আবেদন</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> ঋণ অনুমদন</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-aqua"></i> <span>প্রোডাক্ট</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . 'configuration/product' ?>"><i
                                class="fa fa-circle-o text-aqua"></i> <span>প্রোডাক্ট তালিকা</span></a></li>
                    <li><a href="<?php echo base_url() . 'configuration/product' ?>"><i
                                class="fa fa-circle-o text-aqua"></i> <span>প্রোডাক্ট</span></a></li>
                </ul>
            </li>


            <li><a href="<?php echo base_url() . 'configuration/purpose' ?>"><i class="fa fa-circle-o text-lime"></i>
                    <span>উদ্দেশ্য</span></a></li>
            <li><a href="<?php echo base_url() . 'configuration/investor' ?>"><i class="fa fa-circle-o text-yellow"></i>
                    <span>বিনিয়োগকারী</span></a></li>
            <li><a href="<?php echo base_url() . 'configuration/grace' ?>"><i class="fa fa-circle-o text-green"></i>
                    <span>গ্রেছ</span></a></li>
            <li><a href="<?php echo base_url() . 'auth/logout' ?>"><i class="glyphicon glyphicon-log-out text-red"></i>
                    <span>Logout</span></a></li>

            <!--            <li><a href="-->
            <?php //// echo base_url() . 'configuration/organization' ?><!--"><i class="fa fa-circle-o text-green"></i> <span>Organization</span></a></li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>