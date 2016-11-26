SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'zone member', 'Zone Member'),
(3, 'area member', 'Area Member'),
(4, 'branch member', 'branch Member');

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'TMMS-ICT'),
(2, 'TMMS-Account');

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `account_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;   
INSERT INTO `account_status` (`id`, `description`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Suspended'),
(4, 'Deactivated'),
(5, 'Blocked');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `account_status_id` int(11) unsigned NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `dept_id` int(11) unsigned NOT NULL,
  `designation`varchar(100)  NOT NULL,
  `office_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_laccount_status1` FOREIGN KEY (`account_status_id`) REFERENCES `account_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_dept1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`,   `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `account_status_id`, `first_name`, `last_name`, `organization`, `mobile`, `dept_id`,`designation`,`office_id`) VALUES
(1, '\0\0', 'superadmin-1-0-0', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Admin', 'admin', 'ADMIN', '0',1, 'CEO','1-0-0' ),
(2, '\0\0', 'rashida-1-1-1', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'member@member.com', NULL, NULL, NULL, 1268889823, 1373438882, 1, 'Member', 'Member', 'MEMBER', '0', 1, 'branch Manager', '1-1-1');


CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 4);

CREATE TABLE IF NOT EXISTS `division` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) unsigned NOT NULL,
  `division_code` int(11) unsigned DEFAULT NULL,
  `division_name` varchar(200) NOT NULL,
  `division_name_other` varchar(200) NOT NULL,
  `is_removed` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `organigations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `organigations` (`id`, `name`) VALUES
(1, 'TMMS');
CREATE TABLE IF NOT EXISTS `process_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `process_types` (`id`, `name`) VALUES
(1, 'উৎপাদন'),
(2, 'পরিবহন'),
(3, 'এন জি ও');
CREATE TABLE IF NOT EXISTS `payment_frequency` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `short_name` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `payment_frequency` (`id`, `short_name`,`name`) VALUES
(1, 'W','Weekly'),
(2,'F', 'Fortnightly'),
(3, 'M','Monthly'),
(4, 'H',' Half Yearly'),
(5, 'Y', 'Yearly'),
(6, 'O','Once in a life');

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`code` int(11) unsigned NOT NULL,
`name` varchar(200) NOT NULL,
`bang_short_name` varchar(200) DEFAULT NULL,
`bang_full_name` varchar(200) DEFAULT NULL,
`eng_name` varchar(200) DEFAULT NULL,
`product_type_id`int(11) unsigned NOT NULL,
`interest_rate`int(11) unsigned NOT NULL,
`duration`varchar(200) NOT NULL,
`main_product_code`int(11) unsigned NOT NULL,
`loan_installment`int(11) unsigned NOT NULL,
`interest_installment`int(11) unsigned NOT NULL,
`savings_installment`int(11) unsigned NOT NULL,
`min_limit`int(11) unsigned NOT NULL,
`max_limit`int(11) unsigned NOT NULL,
  `interest_calculation_method` varchar(200) NOT NULL,
  `payment_frequency_id` int(11) unsigned NOT NULL,
  `insurance_item_code` int(11) unsigned NOT NULL,
  `insurance_item_rate` int(11) unsigned NOT NULL,
  `main_item_name` varchar(200) NOT NULL,
 `org_id` int(11) unsigned NOT NULL,
 `is_active`  boolean DEFAULT 0,
 `is_active_date` int(11) unsigned DEFAULT NULL,
 `reference_user_id` int(11) unsigned NOT NULL,
 `created_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`, `code`),
  UNIQUE KEY `uc_org` (`org_id`,`reference_user_id`),
  KEY `fk_org_product_idx` (`org_id`),
  KEY `fk_users_product_idx` (`reference_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   


CREATE TABLE IF NOT EXISTS `organigation_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`office_id` int(11) unsigned NOT NULL,
`organization_id` int(11) unsigned NOT NULL,
 `organization_name` varchar(200) NOT NULL,
 `transaction_date` int(11) unsigned DEFAULT NULL,
 `month_closing_date` int(11) unsigned DEFAULT NULL,
 `year_closing_date` int(11) unsigned DEFAULT NULL,
 `cash_book`  varchar(200) NOT NULL,
 `pla_aacount`  varchar(200) NOT NULL,
 `bank_aacount`  varchar(200) NOT NULL,
 `org_address`  varchar(200) NOT NULL,
 `phone_no`  varchar(50) NOT NULL,
 `cell_no`  varchar(50) NOT NULL,
 `email`  varchar(50) NOT NULL,
 `operation_start_date` int(11) unsigned DEFAULT NULL,
 `license_no`  varchar(50) NOT NULL,
 `license_start_date` int(11) unsigned DEFAULT NULL,
 `license_end_date` int(11) unsigned DEFAULT NULL,
 `process_type` int(11) unsigned DEFAULT NULL,
 `org_id` int(11) unsigned NOT NULL,
 `is_active`  boolean DEFAULT 0,
 `is_active_date` int(11) unsigned DEFAULT NULL,
 `reference_user_id` int(11) unsigned NOT NULL,
 `created_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`, `office_id`, `organization_id`,`license_no`),
  UNIQUE KEY `uc_org` (`org_id`,`reference_user_id`),
  KEY `fk_org_org_settings_idx` (`org_id`),
  KEY `fk_users_org_setting_idx` (`reference_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   


CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
ALTER TABLE `employees`  
 ADD CONSTRAINT `fk_employe_dept_id` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
INSERT INTO `employees` (`id`, `dept_id`, `name`) VALUES
(1, 1, 'Noor-a Alam'),
(2,1, 'Zia');


CREATE TABLE IF NOT EXISTS `investors` (
  `id` tinyint(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `org_id`  int(11) unsigned NOT NULL,
  `is_active`  int(11) unsigned DEFAULT NULL,
  `is_active_date`  int(11) unsigned DEFAULT NULL,
  `employee_id`  int(11) unsigned NOT NULL,
  `created_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `investors`
ADD CONSTRAINT `fk_investor_org_id` FOREIGN KEY (`org_id`) REFERENCES `organigations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_investor_emp_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
INSERT INTO `investors` (`id`,`code`,`name`,`org_id`, `employee_id` ) VALUES
(1, '001','TMMS-ICT',1, 1 ),
(2, '002','brack',1, 1 );

CREATE TABLE IF NOT EXISTS `purposes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `org_id`  int(11) unsigned NOT NULL,
  `is_active`  int(11) unsigned NOT NULL,
  `is_active_date`  int(11) unsigned NOT NULL,
  `employee_id`  int(11) unsigned NOT NULL,
  `created_on` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `purposes`
ADD CONSTRAINT `fk_purpose_dept_id` FOREIGN KEY (`org_id`) REFERENCES `organigations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_purpose_emp_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
INSERT INTO `purposes` (`id`,`code`,`name`,`org_id`, `employee_id` ) VALUES
(1, '123','TMMS-ICT',1, 1 );
CREATE TABLE IF NOT EXISTS `payment_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `payment_types` (`id`, `name`) VALUES
(1, 'নিয়োমিত'),
(2, 'ঋণ খেলাপি');


CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Bangladesh');
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `districts` (`id`, `name`) VALUES
(1, 'Gazipur');

CREATE TABLE IF NOT EXISTS `thanas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `dist_id`  int(11) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;  
ALTER TABLE `thanas`  
 ADD CONSTRAINT `fk_thana_dist_id` FOREIGN KEY (`dist_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION; 
INSERT INTO `thanas` (`id`, `dist_id`, `name`) VALUES
(1, 1, 'Kapasia');

-- /genders table 
CREATE TABLE IF NOT EXISTS `unions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
`thana_id`  int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;  
ALTER TABLE `unions`  
 ADD CONSTRAINT `fk_unions_thana_id` FOREIGN KEY (`thana_id`) REFERENCES `thanas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION; 
INSERT INTO `unions` (`id`,`thana_id`, `name`) VALUES
(1, 1, 'Durgapur');

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
`union_id`  int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;  
ALTER TABLE `posts`  
 ADD CONSTRAINT `fk_post_union_id` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION; 
INSERT INTO `posts` (`id`,`union_id`, `name`) VALUES
(1, 1, 'Raninong');




-- /genders table 
CREATE TABLE IF NOT EXISTS `marital_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `marital_status` (`id`, `name`) VALUES
(1, 'Single'),
(2, 'Married');
-- /educations table 
CREATE TABLE IF NOT EXISTS `educations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `educations` (`id`, `name`) VALUES
(1, 'PSC'),
(2, 'JSC'),
(3, 'SSC'),
(4, 'HSC');
-- /professions table 
CREATE TABLE IF NOT EXISTS `professions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `professions` (`id`, `name`) VALUES
(1, 'Agriculture'),
(2, 'Non-Agriculture'),
(3, 'Business'),
(4, 'Services'),
(5, 'Othres');

-- /genders table 
CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'FeMale');
-- /political status table 
CREATE TABLE IF NOT EXISTS `political_statuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `political_statuses` (`id`, `name`) VALUES
(1, 'Yes'),
(2, 'No');
-- /business status table 
CREATE TABLE IF NOT EXISTS `business_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `business_types` (`id`, `name`) VALUES
(1, 'OwnerShip'),
(2, 'PartnerShip');
-- /family types table 
CREATE TABLE IF NOT EXISTS `family_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `family_types` (`id`, `name`) VALUES
(1, 'Single'),
(2, 'Combined');


-- /zone table 
CREATE TABLE IF NOT EXISTS `zones` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
INSERT INTO `zones` (`id`, `name`) VALUES
(1, 'Dhaka');

-- /areas table 
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `areas`
  ADD CONSTRAINT `fk_zone_id` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
INSERT INTO `areas` (`id`, `zone_id`, `name`) VALUES
(1, 1, "Gazipur");

-- /branches table 
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(11) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `branches`
  ADD CONSTRAINT `fk_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
INSERT INTO `branches` (`id`, `area_id`, `name`) VALUES
(1, 1, "Kapasia");
-- /groups table 
CREATE TABLE IF NOT EXISTS `m_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `m_groups`
  ADD CONSTRAINT `fk_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
INSERT INTO `m_groups` (`id`, `branch_id`, `name`) VALUES
(1, 1, "Ranigong");









-- //members table
CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) unsigned NOT NULL,
  `area_id` int(11) unsigned NOT NULL,
  `branch_id` int(11) unsigned NOT NULL,
  `nid` varchar(50) NOT NULL,
  `name_title` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `sur_name` varchar(100) DEFAULT NULL,
  `gender_id` int(11) unsigned DEFAULT NULL,
  `age` int(11) unsigned DEFAULT NULL,
  `education_id` int(11) unsigned DEFAULT NULL,
  `passing_year` int(11) unsigned DEFAULT NULL,


  `f_first_name` varchar(40) DEFAULT NULL,
  `f_last_name` varchar(40) DEFAULT NULL,
  `f_name_title` varchar(40) DEFAULT NULL,
  `f_age` int(11) unsigned DEFAULT NULL,
  `f_profession` varchar(40) DEFAULT NULL,
  `m_first_name` varchar(40) DEFAULT NULL,
  `m_last_name` varchar(40) DEFAULT NULL,
  `m_name_title` varchar(40) DEFAULT NULL,
  `m_age` varchar(40) DEFAULT NULL,

  `m_road` varchar(40) DEFAULT NULL,
  `m_vill_name` varchar(40) DEFAULT NULL,
  `m_union_name` varchar(40) DEFAULT NULL,
  `m_post_id`  int(11) unsigned DEFAULT NULL,
  `m_thana_id`  int(11) unsigned DEFAULT NULL,
  `m_district_id` int(11) unsigned DEFAULT NULL,
  `m_country_id` int(11) unsigned DEFAULT NULL,
  `p_country_id` int(11) unsigned DEFAULT NULL,

  `p_road` varchar(40) DEFAULT NULL,
  `p_vill_name` varchar(40) DEFAULT NULL,
  `p_union_name` varchar(40) DEFAULT NULL,
  `p_post_id`  int(11) unsigned DEFAULT NULL,
  `p_thana_id`  int(11) unsigned DEFAULT NULL,
  `p_district_id` int(11) unsigned DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `guardian_mobile` varchar(20) DEFAULT NULL,
  `s_distance` int(11) unsigned DEFAULT NULL,
  `marital_id` int(11) unsigned DEFAULT NULL,
  `current_profession_id` int(11) unsigned DEFAULT NULL,
  `previous_profession_id` int(11) unsigned DEFAULT NULL,

  `political_status_id` int(11) unsigned DEFAULT NULL,
  `business_type_id` int(11) unsigned  DEFAULT NULL,
  `future_business_plan` varchar(20) DEFAULT NULL,
  `previous_p_year_id` varchar(20) DEFAULT NULL,
  `earning_source` varchar(20) DEFAULT NULL,
  `alt_earning_source` varchar(20) DEFAULT NULL,
  `cultivable_land` varchar(20) DEFAULT NULL,
  `un_cultivable_land` varchar(20) DEFAULT NULL,
  `ponds` varchar(20) DEFAULT NULL,
  `house` varchar(20) DEFAULT NULL,
  `total_land` varchar(20) DEFAULT NULL,
  `ag_income` varchar(20) DEFAULT NULL,
  `un_ag_income` varchar(20) DEFAULT NULL,
  `total_income` varchar(20) DEFAULT NULL,
  `total_expence` varchar(20) DEFAULT NULL,
  `loss` varchar(20) DEFAULT NULL,
  `tin_house` varchar(20) DEFAULT NULL,
  `straw_house` varchar(20) DEFAULT NULL,
  `brick_house` varchar(20) DEFAULT NULL,
  `receive_amound` varchar(20) DEFAULT NULL,
  `paid_amound` varchar(20) DEFAULT NULL,
  `re_amound` varchar(20) DEFAULT NULL,
  `payment_type_id` varchar(20) DEFAULT NULL,
  `financier_company` varchar(20) DEFAULT NULL,
  `loaning_year` varchar(20) DEFAULT NULL,
  `last_loaning_year` varchar(20) DEFAULT NULL,
  `investment_sector` varchar(20) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `recomannd1` varchar(20) DEFAULT NULL,
  `recomannd2` varchar(20) DEFAULT NULL,
  `family_type_id` int(11) unsigned DEFAULT NULL,
  `family_member_no` int(11) unsigned DEFAULT NULL,
  `male_earned_person` int(11) unsigned DEFAULT NULL,
  `female_earned_person` int(11) unsigned DEFAULT NULL,
  `member_registration_flag`  boolean DEFAULT 0,
 PRIMARY KEY  (`id`, `nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
ALTER TABLE `surveys`
  ADD CONSTRAINT `fk_sur_zone1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asur_rea1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_gender1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_education1` FOREIGN KEY (`education_id`) REFERENCES `educations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_post1` FOREIGN KEY (`m_post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_thana1` FOREIGN KEY (`m_thana_id`) REFERENCES `thanas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_district1` FOREIGN KEY (`m_district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_post2` FOREIGN KEY (`p_post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_thana2` FOREIGN KEY (`p_thana_id`) REFERENCES `thanas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_district2` FOREIGN KEY (`p_district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_marital1` FOREIGN KEY (`marital_id`) REFERENCES `marital_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_current_profession1` FOREIGN KEY (`current_profession_id`) REFERENCES `professions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_current_profession2` FOREIGN KEY (`previous_profession_id`) REFERENCES `professions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_political_status1` FOREIGN KEY (`political_status_id`) REFERENCES `political_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_business1` FOREIGN KEY (`business_type_id`) REFERENCES `business_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sur_family_type1` FOREIGN KEY (`family_type_id`) REFERENCES `family_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;




CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) unsigned NOT NULL,
  `area_id` int(11) unsigned NOT NULL,
  `branch_id` int(11) unsigned NOT NULL,
  `nid` varchar(50) NOT NULL,
  `name_title` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `sur_name` varchar(100) DEFAULT NULL,
  `gender_id` int(11) unsigned DEFAULT NULL,
  `age` int(11) unsigned DEFAULT NULL,
  `education_id` int(11) unsigned DEFAULT NULL,
  `passing_year` int(11) unsigned DEFAULT NULL,
 `marital_id` int(11) unsigned DEFAULT NULL,
 `political_status_id` int(11) unsigned DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
`s_distance` int(11) unsigned DEFAULT NULL,
`reference_id` int(11) unsigned NOT NULL,
 PRIMARY KEY  (`id`, `nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
ALTER TABLE `members`
  ADD CONSTRAINT `fk_reference_user_id_member` FOREIGN KEY (`reference_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_zone1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_area1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gender1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_education1` FOREIGN KEY (`education_id`) REFERENCES `educations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_marital1` FOREIGN KEY (`marital_id`) REFERENCES `marital_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_political_status1` FOREIGN KEY (`political_status_id`) REFERENCES `political_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 

-- CREATE TABLE IF NOT EXISTS `member_basic_info` (
--   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
--   `member_id` int(11) unsigned NOT NULL,
--   `nid` varchar(50) NOT NULL,
--   `first_name` varchar(50) DEFAULT NULL,
--   `last_name` varchar(50) DEFAULT NULL,
--   `sur_name` varchar(100) DEFAULT NULL,
--   `gender_id` int(11) unsigned DEFAULT NULL,
--   `age` int(11) unsigned DEFAULT NULL,
--   `education_id` int(11) unsigned DEFAULT NULL,
--   `passing_year` int(11) unsigned DEFAULT NULL,
--   PRIMARY KEY  (`id`),
-- UNIQUE KEY `uc_member_basic_info` (`member_id`,`nid`),
--   KEY `fk_member_basic_info_memder_indx` (`member_id`),
--   KEY `fk_member_basic_info__nid_idx` (`nid`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
-- ALTER TABLE `member_basic_info`
--   ADD CONSTRAINT `fk_gender1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,

CREATE TABLE IF NOT EXISTS `member_family_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
  `nid` varchar(50) NOT NULL,
  `f_first_name` varchar(40) DEFAULT NULL,
  `f_last_name` varchar(40) DEFAULT NULL,
  `f_name_title` varchar(40) DEFAULT NULL,
  `f_age` int(11) unsigned DEFAULT NULL,
  `m_first_name` varchar(40) DEFAULT NULL,
  `m_last_name` varchar(40) DEFAULT NULL,
  `m_age` varchar(40) DEFAULT NULL,
  `f_profession` varchar(40) DEFAULT NULL,
  `guardian_mobile` varchar(20) DEFAULT NULL,
  `family_type_id` int(11) unsigned DEFAULT NULL,
  `family_member_no` int(11) unsigned DEFAULT NULL,
  `male_earned_person` int(11) unsigned DEFAULT NULL,
  `female_earned_person` int(11) unsigned DEFAULT NULL,
  `male_member` int(11) unsigned DEFAULT NULL,
  `female_member` int(11) unsigned DEFAULT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
ALTER TABLE `member_family_info`  
ADD CONSTRAINT `fk_family_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
 ADD CONSTRAINT `fk_family_type_m` FOREIGN KEY (`family_type_id`) REFERENCES `family_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `member_addresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
  `nid` varchar(50) NOT NULL,
  `m_vill_name` varchar(40) DEFAULT NULL,
  `m_union_name` varchar(40) DEFAULT NULL,
  `m_post_id`  int(11) unsigned DEFAULT NULL,
  `m_thana_id`  int(11) unsigned DEFAULT NULL,
  `m_district_id` int(11) unsigned DEFAULT NULL,
  `p_road` varchar(40) DEFAULT NULL,
  `p_vill_name` varchar(40) DEFAULT NULL,
  `p_union_name` varchar(40) DEFAULT NULL,
  `p_post_id`  int(11) unsigned DEFAULT NULL,
  `p_thana_id`  int(11) unsigned DEFAULT NULL,
  `p_district_id` int(11) unsigned DEFAULT NULL,
  `m_country_id` int(11) unsigned DEFAULT NULL,
  `p_country_id` int(11) unsigned DEFAULT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `member_addresses`
ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_post_m` FOREIGN KEY (`m_post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
 ADD CONSTRAINT `fk_thana_m` FOREIGN KEY (`m_thana_id`) REFERENCES `thanas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_district_m` FOREIGN KEY (`m_district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_post_p` FOREIGN KEY (`p_post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_thana_p` FOREIGN KEY (`p_thana_id`) REFERENCES `thanas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_district_p` FOREIGN KEY (`p_district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `member_profession_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
  `nid` varchar(50) NOT NULL,
  `current_profession_id` int(11) unsigned DEFAULT NULL,
  `previous_profession_id` int(11) unsigned DEFAULT NULL,
  `business_type_id` int(11) unsigned  DEFAULT NULL,
  `previous_p_year_id` varchar(20) DEFAULT NULL,
  `future_business_plan` varchar(20) DEFAULT NULL,
  `earning_source` varchar(20) DEFAULT NULL,
  `alt_earning_source` varchar(20) DEFAULT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;  
ALTER TABLE `member_profession_info`
ADD CONSTRAINT `fk_member_id_m` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_current_profession_m` FOREIGN KEY (`current_profession_id`) REFERENCES `professions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_previous_profession_m` FOREIGN KEY (`previous_profession_id`) REFERENCES `professions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_business_m` FOREIGN KEY (`business_type_id`) REFERENCES `business_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 
CREATE TABLE IF NOT EXISTS `member_land_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
  `nid` varchar(50) NOT NULL,
  `cultivable_land` varchar(20) DEFAULT NULL,
  `un_cultivable_land` varchar(20) DEFAULT NULL,
  `ponds` varchar(20) DEFAULT NULL,
  `house` varchar(20) DEFAULT NULL,
  `total_land` varchar(20) DEFAULT NULL,
  `ag_income` varchar(20) DEFAULT NULL,
  `un_ag_income` varchar(20) DEFAULT NULL,
  `total_income` varchar(20) DEFAULT NULL,
  `total_expence` varchar(20) DEFAULT NULL,
  `loss` varchar(20) DEFAULT NULL,
  `tin_house` varchar(20) DEFAULT NULL,
  `straw_house` varchar(20) DEFAULT NULL,
  `brick_house` varchar(20) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `member_land_info`
ADD CONSTRAINT `fk_member_land_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `member_investment_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
  `nid` varchar(50) NOT NULL,
  `receive_amound` varchar(20) DEFAULT NULL,
  `paid_amound` varchar(20) DEFAULT NULL,
  `re_amound` varchar(20) DEFAULT NULL,
  `payment_type_id` varchar(20) DEFAULT NULL,
  `financier_company` varchar(20) DEFAULT NULL,
  `loaning_year` varchar(20) DEFAULT NULL,
  `last_loaning_year` varchar(20) DEFAULT NULL,
  `investment_sector` varchar(20) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
 `recomannd1` varchar(20) DEFAULT NULL,
  `recomannd2` varchar(20) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `member_investment_info`
  ADD CONSTRAINT `fk_investment_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `member_business_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
   `nid` varchar(50) NOT NULL,
   `m_business_name` varchar(20) DEFAULT NULL,
  `m_bus_type_name` varchar(20) DEFAULT NULL,
  `m_business_expre` varchar(20) DEFAULT NULL,
  `m_business_adds` varchar(20) DEFAULT NULL,
  `m_bus_date` varchar(20) DEFAULT NULL,
  `m_bus_infrastructure` varchar(20) DEFAULT NULL,
  `m_bus_from_foot` int(11) unsigned DEFAULT NULL,
`m_bus_to_foot` int(11) unsigned DEFAULT NULL,
`m_bus_direction` varchar(20) DEFAULT NULL,
`m_bus_place` varchar(20) DEFAULT NULL,
`m_trade_licence` int(11) unsigned DEFAULT NULL,
`m_admin` varchar(20) DEFAULT NULL,
`m_capital` varchar(20) DEFAULT NULL,
`m_avg_sale` varchar(20) DEFAULT NULL,
`m_bank` varchar(20) DEFAULT NULL,
`m_ngo` varchar(20) DEFAULT NULL,
`m_self` varchar(20) DEFAULT NULL,
`m_loan` varchar(20) DEFAULT NULL,
`m_monthly_income` int(11) unsigned DEFAULT NULL,
`m_monthly_expen` int(11) unsigned DEFAULT NULL,
`m_surplus` int(11) unsigned DEFAULT NULL,
`m_others_m_income` int(11) unsigned DEFAULT NULL,
`m_others_m_exp` int(11) unsigned DEFAULT NULL,
`m_extra` int(11) unsigned DEFAULT NULL,
`m_total_extra` int(11) unsigned DEFAULT NULL,
`m_bus_type_id` int(11) unsigned DEFAULT NULL,
`m_others` varchar(20) DEFAULT NULL,
`start_first_half` varchar(20) DEFAULT NULL,
`last_first_half` varchar(20) DEFAULT NULL,
`first_second_half` varchar(20) DEFAULT NULL,
`last_second_half` varchar(20) DEFAULT NULL,
`opening_time` varchar(20) DEFAULT NULL,
`closing_time` varchar(20) DEFAULT NULL,
`intervel_start` varchar(20) DEFAULT NULL,
`intervel_end` varchar(20) DEFAULT NULL,
`total_member` varchar(20) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
ALTER TABLE `member_business_info`
  ADD CONSTRAINT `fk_business_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `cash_inflow` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
INSERT INTO `cash_inflow` (`id`, `name`, `description`) VALUES
(1, 'test', 'test'),
(2, ' member', 'test Member');
CREATE TABLE IF NOT EXISTS `cash_outflow` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
INSERT INTO `cash_outflow` (`id`, `name`, `description`) VALUES
(1, 'test', 'test'),
(2, ' member', 'test Member');

CREATE TABLE IF NOT EXISTS `member_parties` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
INSERT INTO `member_parties` (`id`, `name`, `description`) VALUES
(1, 'beli', 'beli'),
(2, ' Chamily', 'Chamily');


CREATE TABLE IF NOT EXISTS `loan_applications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
 `zone_id` int(11) unsigned NOT NULL,
  `area_id` int(11) unsigned NOT NULL,
  `branch_id` int(11) unsigned NOT NULL,
  `nid` varchar(50) NOT NULL,
  `party_id` mediumint(11) unsigned NOT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `member_no` int(11) unsigned NOT NULL,
  `group_no` int(11) unsigned NOT NULL,
   `investment_date` int(11) unsigned NOT NULL,
   `point_deduction` int(11) unsigned NOT NULL,
   `application_subject` int(11) DEFAULT NULL,
  `name_title` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `sur_name` varchar(100) DEFAULT NULL,
  `gender_id` int(11) unsigned DEFAULT NULL,
  `age` int(11) unsigned DEFAULT NULL,
  `education_id` int(11) unsigned DEFAULT NULL,
  `passing_year` int(11) unsigned DEFAULT NULL,
 `marital_id` int(11) unsigned DEFAULT NULL,
 `political_status_id` int(11) unsigned DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
`s_distance` int(11) unsigned DEFAULT NULL,
`reference_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;   
ALTER TABLE `loan_applications`
  ADD CONSTRAINT `fk_user_loan_idx` FOREIGN KEY (`reference_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member_loan` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_zone_loan` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_area_loan` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_branch_loan` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_group_loan` FOREIGN KEY (`party_id`) REFERENCES `member_parties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gender_loan` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_education_loan` FOREIGN KEY (`education_id`) REFERENCES `educations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_marital_loan` FOREIGN KEY (`marital_id`) REFERENCES `marital_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_political_status_loan` FOREIGN KEY (`political_status_id`) REFERENCES `political_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 

CREATE TABLE IF NOT EXISTS `member_cash_inflow` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
   `member_id` int(11) unsigned NOT NULL,
  `loan_id` int(11) unsigned NOT NULL,
  `cash_flow_id` int(11) unsigned NOT NULL,
  `amount` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `member_cash_inflow`
ADD CONSTRAINT `fk_loan_inflow_idx` FOREIGN KEY (`loan_id`) REFERENCES `loan_applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_member_inflow_indx` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `member_cash_outflow` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
   `member_id` int(11) unsigned NOT NULL,
  `loan_id` int(11) unsigned NOT NULL,
  `cash_flow_id` int(11) unsigned NOT NULL,
  `amount` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `member_cash_inflow`
ADD CONSTRAINT `fk_loan_outflow_idx` FOREIGN KEY (`loan_id`) REFERENCES `loan_applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_member_outflow` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE IF NOT EXISTS `monthly_income_expence` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
   `member_id` int(11) unsigned NOT NULL,
  `loan_id` int(11) unsigned NOT NULL,
  `project_type_id` int(11) unsigned NOT NULL,
  `amount` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `monthly_income_expence`
ADD CONSTRAINT `fk_loan_in_ex_idx` FOREIGN KEY (`loan_id`) REFERENCES `loan_applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_member_in_ex_idx` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `member_documentation` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
   `member_id` int(11) unsigned NOT NULL,
  `loan_id` int(11) unsigned NOT NULL,
  `type_id` int(11) unsigned NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `member_documentation`
ADD CONSTRAINT `fk_loan_docu_idx` FOREIGN KEY (`loan_id`) REFERENCES `loan_applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_member_docu_idx` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `assets_debt_info` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
  `loan_id` int(11) unsigned NOT NULL,
  `type_id` int(11) unsigned NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
ALTER TABLE `assets_debt_info`
ADD CONSTRAINT `fk_loan_asset_dept` FOREIGN KEY (`loan_id`) REFERENCES `loan_applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_member_asset_dept` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

 
