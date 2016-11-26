<header class="main-header" style="width: 100%" ng-controller="headerController">
    <!-- Logo -->
    <a href="" class="logo-mini" style="float: left">
        <img class="img-responsive" alt="TIMFinance" src="<?php echo base_url(); ?>resources/images/logo.png"/>
    </a>
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>T</b>MIF</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>TIM</b>Finance</span>
    </a>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu" ng-init="setGroupInfo('<?php echo htmlspecialchars(json_encode($user_group_info)) ?>')">
            <ul class="nav navbar-nav" ng-init="setOfficeInfo('<?php echo htmlspecialchars(json_encode($office_info)) ?>')">
                <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu" ng-if="officeInfo.zone_id != 0 && officeInfo.area_id == 0 && officeInfo.branch_id  == 0 ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="">Zone :{{groupInfo.name}}</span>
                        </a>
                    </li>
                    <li class="dropdown messages-menu" ng-if="officeInfo.zone_id != 0 && officeInfo.area_id != 0 && officeInfo.branch_id  == 0 ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="">Area : {{groupInfo.name}}</span>
                        </a>
                    </li>
                    <li class="dropdown messages-menu" ng-if="officeInfo.zone_id != 0 && officeInfo.area_id != 0 && officeInfo.branch_id  != 0 ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="">Branch : {{groupInfo.name}}</span>
                        </a>
                    </li>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="">Office Id :<?php echo $office_id; ?></span>
                    </a>
                </li>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="">Designation : <?php echo $designation; ?></span>
                    </a>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>resources/images/avatar5.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $username; ?></span>
                    </a>

                </li>

            </ul>
        </div>

    </nav>
    <!-- Header Navbar: style can be found in header.less -->

</header>