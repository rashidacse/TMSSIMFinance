<style>
    .user_brief_card
    {
        border: 2px solid lightgray; 
        padding: 3px 2px;
        background-color: white;
    }
</style>
<div style="padding-bottom: 45px;">
    <div class="container-fluid">
        <div class="row form-group"></div>
        <div class="row form-group"></div>
        <div class="row form-group">
            <div class="col-md-offset-1 col-md-5">
            </div>
            <div class="col-md-5">
                
                <?php if (isset($message) && ($message != NULL)): ?>
                    <div class="alert alert-dismissible" style="background-color: #703684;color: #ffffff"><?php echo $message; ?></div>
                <?php endif; ?>
                <div class="row form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <span style="font-size: 25px; color: #703684; font-weight: bold;">Sign Up</span>
                        <span style="font-size: 14px; padding-top: 8px; font-weight: bold; float: right; font-family: monospace"><a style="text-decoration: none; cursor: pointer;" href="<?php echo base_url(); ?>member/add_feedback">Become a volunteer</a></span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 padding_style">
                        <?php echo form_input($r_first_name + array('class' => 'form-control', 'placeholder' => 'First Name')); ?>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input($r_last_name + array('class' => 'form-control', 'placeholder' => 'Last Name')); ?>
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php echo form_input($r_email + array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                    </div>
                </div>

                <div class="row form-group"> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php echo form_input($r_password + array('class' => 'form-control', 'placeholder' => 'Password')); ?>
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php echo form_input($r_password_conf + array('class' => 'form-control', 'placeholder' => 'Re-peated password')); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12"> 
                        <span style="color: #703684; font-size: 15px; font-weight: bold;">Birthday</span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <div class="pages_type_add_form_input">
                            <?php echo form_dropdown('birthday_day', $date_list, "0", 'class=form-control id=birthday_day'); ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <div class="pages_type_add_form_input">
                            <?php echo form_dropdown('birthday_month', $month_list, "0", 'class=form-control id=birthday_month'); ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                        <div class="pages_type_add_form_input">
                            <?php echo form_dropdown('birthday_year', $year_list, "0", 'class=form-control id=birthday_year'); ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                        <label style="color: #703684; font-size: 15px; font-weight: bold;">Gender</label>
                        <?php echo form_dropdown('gender_list', $gender_list, 0, 'class=form-control id=gender_id'); ?>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                        <label style="color: #703684; font-size: 15px; font-weight: bold;">Religion</label>
                        <?php echo form_dropdown('religion_list', $religion_list, '', 'class=form-control id=religion_list'); ?>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                        <label style="color: #703684; font-size: 15px; font-weight: bold;">Country</label>
                        <?php echo form_dropdown('country_list', $country_list, '', 'class=form-control id=country_list'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <span style="color: black; font-size: 11px;">By clicking Sign Up, you agree to our <a href="<?php echo base_url() ?>footer/terms">Terms and Conditions</a></span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php echo form_input($register_btn + array('class' => 'btn button-custom', 'style' => 'background-color: #703684; color: white')); ?>                        
                    </div>
                </div>                
            </div>
            <div class="col-md-1"></div>
        </div>
        
    </div>
</div>

<script>
    $('#other_religion').on('click', function () {
        $('#religion').hide();
        $('#religion_input').show();
    });

    $(function () {
        $(".brand_single_image").mouseenter(function () {
            var brand_single_image = $(this);
            var brand_single_cover_image = $(this).find(".brand_cover_single_image");
            $(brand_single_image).show();
            $(brand_single_cover_image).hide();
        });
        $(".brand_single_image").mouseleave(function () {
            var brand_single_image = $(this);
            var brand_single_cover_image = $(this).find(".brand_cover_single_image");
            if ($(brand_single_cover_image).prop("style").display === "none") {
                $(brand_single_cover_image).show();
            }
        });
    });
</script>