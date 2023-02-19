CREATE TABLE `dnpsaltedpassword`(
	`dnp_id` INT AUTO_INCREMENT,
	`dnp_prefix` VARCHAR(250) NOT NULL,
	`dnp_suffix` VARCHAR(250) NOT NULL,
	PRIMARY KEY(`dnp_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `user`(
	`u_id` INT AUTO_INCREMENT,
	`u_name` VARCHAR(30) NOT NULL,
	`u_number` VARCHAR(10) NOT NULL UNIQUE,
	`u_password` VARCHAR(500) NOT NULL,
	`user` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`u_id`),
	FOREIGN KEY(`user`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `user_type`(
	`ut_id` INT AUTO_INCREMENT,
	`u_type` VARCHAR(50) NULL,
	`u_code` VARCHAR(5) UNIQUE NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`visibility` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ut_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

ALTER TABLE
`user` ADD `ut_id` INT NULL AFTER `u_password`,
ADD FOREIGN KEY(`ut_id`) REFERENCES `user_type`(`ut_id`);

CREATE TABLE `pages`(
	`pg_id` INT AUTO_INCREMENT,
	`pg_name` VARCHAR(50) NOT NULL,
	`pg_icon` VARCHAR(100) NULL,
	`pg_link` VARCHAR(50) NOT NULL,
	`pg_order` INT(2) NOT NULL UNIQUE,
	`pg_listing` ENUM('Y', 'N') DEFAULT 'Y',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`pg_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `page_rights`(
	`pgr_id` INT AUTO_INCREMENT,
	`pg_id` INT NOT NULL,
	`ut_id` INT NULL,
	`pgr_right` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`pgr_id`),
	FOREIGN KEY(`pg_id`) REFERENCES `pages`(`pg_id`),
	FOREIGN KEY(`ut_id`) REFERENCES `user_type`(`ut_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `categories`(
	`c_id` INT AUTO_INCREMENT,
	`c_name` VARCHAR(50) NULL,
	`c_sequence` INT NULL,
	`c_icon` VARCHAR(500) NULL,
	`c_img` VARCHAR(500) NULL,
	`c_code` VARCHAR(50) UNIQUE NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`c_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;


CREATE TABLE `sub_categories`(
	`sc_id` INT AUTO_INCREMENT,
	`c_id` INT NULL,
	`sc_name` VARCHAR(50) NULL,
	`sc_sequence` INT NULL,
	`sc_icon` VARCHAR(500) NULL,
	`sc_img` VARCHAR(500) NULL,
	`sc_code` VARCHAR(50) UNIQUE NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`sc_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`c_id`) REFERENCES `categories`(`c_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `sub_cat_feat`(
	`scf_id` INT AUTO_INCREMENT,
	`sc_id` INT NULL,
	`scf_name` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`scf_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `membership_types`(
	`mt_id` INT AUTO_INCREMENT,
	`mt_name` VARCHAR(50) NULL,
	`mt_code` VARCHAR(50) UNIQUE NULL,
	`mt_priority` int(2) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mt_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `membership_fees`(
	`mf_id` INT AUTO_INCREMENT,
	`mt_id` INT NULL,
	`mf_amount` DOUBLE(10, 2) NULL,
	`mf_duration` INT NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mf_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`mt_id`) REFERENCES `membership_types`(`mt_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `country`(
	`cnt_id` INT AUTO_INCREMENT,
	`cnt_name` VARCHAR(50) NOT NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`cnt_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `state`(
	`st_id` INT AUTO_INCREMENT,
	`cnt_id` INT NULL,
	`st_name` VARCHAR(50) UNIQUE NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`st_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`cnt_id`) REFERENCES `country`(`cnt_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `city`(
	`ct_id` INT AUTO_INCREMENT,
	`cnt_id` INT NULL,
	`st_id` INT NULL,
	`city_name` VARCHAR(50) UNIQUE NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ct_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`cnt_id`) REFERENCES `country`(`cnt_id`),
	FOREIGN KEY(`st_id`) REFERENCES `state`(`st_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `pincode`(
	`pin_id` INT AUTO_INCREMENT,
	`ct_id` INT NULL,
	`pin_code` INT(8) UNIQUE NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`pin_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`ct_id`) REFERENCES `city`(`ct_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `members`(
	`m_id` INT AUTO_INCREMENT,
	`m_name` VARCHAR(50) NULL,
	`m_b_name` VARCHAR(100) NULL,
	`m_email` VARCHAR(50) NULL,
	`m_contact` VARCHAR(50) NULL,
	`m_a_contact` VARCHAR(50) NULL,
	`m_whatsapp` VARCHAR(50) NULL,
	`m_gst` ENUM('Y', 'N') NULL,
	`m_gst_number` VARCHAR(30) NULL,
	`m_aadhaar` VARCHAR(12) NULL,
	`m_for` ENUM('M','F') NULL,
	`m_pan` VARCHAR(10) NULL,
	`u_id` INT NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`m_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;



CREATE TABLE `members_categories`(
	`mc_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`ma_id` INT NULL,
	`sc_id` INT NULL,
	`u_id` INT NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mc_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `members_address`(
	`ma_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`ma_address` VARCHAR(1500) NULL,
	`ct_id` INT NULL,
	`pin_id` INT NULL,
	`ma_lat` DECIMAL(10, 8) NULL,
	`ma_lng` DECIMAL(11, 8) NULL,
	`u_id` INT NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ma_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`),
	FOREIGN KEY(`ct_id`) REFERENCES `city`(`ct_id`),
	FOREIGN KEY(`pin_id`) REFERENCES `pincode`(`pin_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `members_package`(
	`mp_id` INT AUTO_INCREMENT,
	`mt_id` INT NULL,
	`mf_id` INT NULL,
	`m_id` INT NULL,
	`mp_validity` DATE NULL,
	`u_id` INT NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mp_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`mt_id`) REFERENCES `membership_types`(`mt_id`),
	FOREIGN KEY(`mf_id`) REFERENCES `membership_fees`(`mf_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `advertiser`(
	`adr_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`adr_start` DATE NULL,
	`adr_ends` DATE NULL,
	`adr_charges` VARCHAR(10) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`adr_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `advertise_img`(
	`ai_id` INT AUTO_INCREMENT,
	`adr_id` INT NULL,
	`sc_id` INT NULL,
	`ai_img` VARCHAR(100) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ai_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`adr_id`) REFERENCES `advertiser`(`adr_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `advsel`
(
	`ads_id` int AUTO_INCREMENT,
	`adr_id` int null,
	`sc_id` int null,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ads_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`adr_id`) REFERENCES `advertiser`(`adr_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `sizes`(
	`sz_id` INT AUTO_INCREMENT,
	`sz_size` VARCHAR(50) NULL,
	`sz_type` ENUM('I', 'M', 'MM', 'C', 'F', 'P', 'NS') COMMENT 'I => INCHES, M => METERS, MM => MILLIMETERS, C => CENTIMETERS, F => FEETS, P => PIXELS , NS => NOT SPECIFIC',
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`sz_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `design_type`(
	`dt_id` INT AUTO_INCREMENT,
	`dt_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`dt_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `print_color`(
	`pc_id` INT AUTO_INCREMENT,
	`pc_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`pc_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `title_material`(
	`tm_id` INT AUTO_INCREMENT,
	`tm_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`tm_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `title_process_type`(
	`tpt_id` INT AUTO_INCREMENT,
	`tpt_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`tpt_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `inner_material`(
	`im_id` INT AUTO_INCREMENT,
	`im_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`im_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `binding_type`(
	`bt_id` INT AUTO_INCREMENT,
	`bt_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`bt_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `calendar_type`(
	`cal_id` INT AUTO_INCREMENT,
	`cal_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`cal_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `lamination_type`(
	`lt_id` INT AUTO_INCREMENT,
	`lt_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`lt_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `clip_type`(
	`clpt_id` INT AUTO_INCREMENT,
	`clpt_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`clpt_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `label_type`(
	`lbl_id` INT AUTO_INCREMENT,
	`lbl_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`lbl_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `sticker_type`(
	`stk_id` INT AUTO_INCREMENT,
	`stk_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`stk_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `bag_type`(
	`bag_id` INT AUTO_INCREMENT,
	`bag_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`bag_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `box_type`(
	`box_id` INT AUTO_INCREMENT,
	`box_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`box_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `banner_type`(
	`bnr_id` INT AUTO_INCREMENT,
	`bnr_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`bnr_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `sowe_type`(
	`sw_id` INT AUTO_INCREMENT,
	`sw_name` VARCHAR(50) NULL,
	`sw_type` ENUM('S','W','A') COMMENT 'S => SOCIAL MEDIA, W => WEB, A => APP',
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`sw_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `mobrand_type`(
	`mob_id` INT AUTO_INCREMENT,
	`mob_name` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mob_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `mocover_type`(
	`moc_id` INT AUTO_INCREMENT,
	`mob_id` INT NULL,
	`moc_name` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`moc_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`mob_id`) REFERENCES `mobrand_type`(`mob_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `phtg_type`(
	`pht_id` INT AUTO_INCREMENT,
	`pht_type` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`pht_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `specific`(
	`spec_id` INT AUTO_INCREMENT,
	`sp_name` VARCHAR(100) NULL,
	`table_id` INT NULL,
	`spec_specific` ENUM('A', 'S') COMMENT 'A => ALL, S => SPECIFIC',
	`sc_id` INT NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`spec_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `keyword`
(
	`ky_id` INT AUTO_INCREMENT,
	`ky_key` VARCHAR(60) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ky_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `key_cat`(
	`sk_id` INT AUTO_INCREMENT,
	`c_id` INT NULL,
	`ky_id` INT NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`sk_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`c_id`) REFERENCES `categories`(`c_id`),
	FOREIGN KEY(`ky_id`) REFERENCES `keyword`(`ky_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `mem_key`(
	`mk_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`ky_id` INT NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'n',
	`deleted` ENUM('Y', 'N') DEFAULT 'y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mk_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`),
	FOREIGN KEY(`ky_id`) REFERENCES `keyword`(`ky_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `emp`(
	`e_id` INT AUTO_INCREMENT,
	`e_fname` VARCHAR(50) NULL,
	`e_mname` VARCHAR(50) NULL,
	`e_lname` VARCHAR(50) NULL,
	`e_dob` DATE NULL,
	`e_qual` VARCHAR(100) NULL,
	`e_doj` DATE NULL,
	`e_cadd` VARCHAR(500) NULL,
	`e_cont` VARCHAR(15) NULL UNIQUE,
	`e_email` VARCHAR(70) NULL,
	`e_ocont` VARCHAR(15) NULL,
	`e_oemail` VARCHAR(70) NULL,
	`e_econtact` VARCHAR(15) NULL,
	`e_dadCon` VARCHAR(15) NULL,
	`e_momCon` VARCHAR(15) NULL,
	`e_aadhar` VARCHAR(12) NULL,
	`e_pan` VARCHAR(10) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`e_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

ALTER TABLE
`user` ADD `e_id` INT NULL AFTER `ut_id`,
ADD FOREIGN KEY(`e_id`) REFERENCES `emp`(`e_id`);

CREATE TABLE `membership_profile_pic`(
	`mpp_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`mpp_pro_pic` VARCHAR(500) NULL,
	`mpp_cvr_pic` VARCHAR(500) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`ext_msg` TEXT NULL,
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mpp_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

ALTER TABLE `user` ADD `m_id` INT NULL AFTER `e_id`, ADD FOREIGN KEY (`m_id`) REFERENCES `members`(`m_id`);

CREATE TABLE `members_services`(
	`ms_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`sc_id` INT NULL,
	`ms_name` VARCHAR(100) NULL,
	`ms_img` VARCHAR(100) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`ext_msg` TEXT NULL,
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ms_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;


CREATE TABLE `members_aboutus`(
	`mabt_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`mabt_fblink` VARCHAR(50) NULL,
	`mabt_instalink` VARCHAR(50) NULL,
	`mabt_weblink` VARCHAR(50) NULL,
	`mabt_about` VARCHAR(2000) NULL,
	`mabt_timing` VARCHAR(40) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`ext_msg` TEXT NULL,
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mabt_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;
ALTER TABLE `members_aboutus` ADD `mabt_timing` VARCHAR(40) NULL AFTER `mabt_timing`

CREATE TABLE `sliderimg`(
	`sli_id` INT AUTO_INCREMENT,
	`sli_head` VARCHAR(50) NULL,
	`sli_desc` VARCHAR(80) NULL,
	`sli_img` VARCHAR(200) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`sli_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `catalogue`(
	`ctl_id` INT AUTO_INCREMENT,
	`ctl_name` VARCHAR(50) NULL,
	`m_id` INT NULL,
	`u_id` INT NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ctl_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `catalogue_imgs`(
	`ctl_img_id` INT AUTO_INCREMENT,
	`ctl_id` INT NULL,
	`ctl_img_path` VARCHAR(250) NULL,
	`m_id` INT NULL,
	`u_id` INT NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`ctl_img_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`ctl_id`) REFERENCES `catalogue`(`ctl_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `reg_inq`(
	`rgi_id` INT AUTO_INCREMENT,
	`sc_id` INT NULL,
	`m_id` INT NULL,
	`rgi_name` VARCHAR(70) NULL,
	`rgi_con` VARCHAR(10) NULL,
	`rgi_email` VARCHAR(100) NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`rgi_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `adv_inq`(
	`adi_id` INT AUTO_INCREMENT,
	`adi_name` VARCHAR(80) NULL,
	`adi_email` VARCHAR(50) NULL,
	`adi_contact` VARCHAR(10) NULL,
	`adi_city` VARCHAR(80) NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`adi_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `con_us_inq`(
	`cui_id` INT AUTO_INCREMENT,
	`cui_name` VARCHAR(80) NULL,
	`cui_num` VARCHAR(10) NULL,
	`cui_email` VARCHAR(50) NULL,
	`cui_city` VARCHAR(80) NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`cui_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `c_inq_type`(
	`cit_id` INT AUTO_INCREMENT,
	`cui_id` INT NULL,
	`sc_id` INT NULL,
	`m_id` INT NULL,
	`u_id` INT NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'Y',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`cit_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`),
	FOREIGN KEY(`cui_id`) REFERENCES `con_us_inq`(`cui_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;


CREATE TABLE `mem_pro_imgs`(
	`mpi_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`mpi_name` VARCHAR(50) NULL,
	`mpi_img` VARCHAR(500) NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'Y',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mpi_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `rattings`(
	`r_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`cui_id` INT NULL,
	`r_rat` DOUBLE(4,2) NULL,
	`r_rat_desc` VARCHAR(1000) NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'Y',
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`r_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`),
	FOREIGN KEY(`cui_id`) REFERENCES `con_us_inq`(`cui_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `sms_balance`(
	`sb_id` INT AUTO_INCREMENT,
	`sb_balance` INT(6) NOT NULL,
	`sb_username` VARCHAR(50) NULL,
	`sb_password` VARCHAR(50) NULL,
	`cretedDate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`updatedDate` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY(`sb_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

/*CREATE TABLE `inqs_logs` (
	`di_id` INT AUTO_INCREMENT,
	`cui_id` INT NULL,
	`m_id` INT NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`di_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`),
	FOREIGN KEY(`cui_id`) REFERENCES `con_us_inq`(`cui_id`),
	FOREIGN KEY(`u_id`) REFERENCES `user`(`u_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `visit_log` (
	`vl_id` INT AUTO_INCREMENT,
	`c_id` INT NULL,
	`sc_id` INT NULL,
	`m_id` INT NULL,
) ENGINE = INNODB DEFAULT CHARSET = utf8;*/

CREATE TABLE `reqqou`(
	`req_id` INT AUTO_INCREMENT,
	`cui_id` INT NULL,
	`m_id` INT NULL,
	`sc_id` INT NULL,
	`req_quan` VARCHAR(500),
	`req_extra` VARCHAR(500),
	`u_id` INT NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'N',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`req_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `quocus`(
	`quc_id` INT AUTO_INCREMENT,
	`req_id` INT NULL,
	`table_id` INT NULL,
	`table_name` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`quc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `leads`(
	`lead_id` INT AUTO_INCREMENT,
	`lead_opt` ENUM('A', 'S'),
	`lead_end_date` DATE NULL,
	`lead_file` VARCHAR(500) NULL,
	`lead_cus_name` VARCHAR(100) NULL,
	`lead_cus_num` VARCHAR(10) NULL,
	`lead_detail` VARCHAR(1000) NULL,
	`lead_add` VARCHAR(600) NULL,
	`sc_id` INT NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`lead_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `lead_cus`(
	`lecu_id` INT AUTO_INCREMENT,
	`lead_id` INT NULL,
	`table_id` INT NULL,
	`table_name` VARCHAR(50) NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`lecu_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `lead_mem`(
	`lem_id` INT AUTO_INCREMENT,
	`lead_id` INT NULL,
	`m_id` INT NULL,
	`u_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`lem_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

-- Pending on server

ALTER TABLE
`sliderimg` ADD `m_id` INT NULL AFTER `sli_img`;


CREATE TABLE `ratings`(
	`rat_id` INT AUTO_INCREMENT,
	`rating` DOUBLE(2,1) NULL,
	`review` VARCHAR(200) NULL,
	`cui_id` INT NULL,
	`m_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`rat_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `view_port_count`(
	`vpc_id` INT AUTO_INCREMENT,
	`sc_id` INT NULL,
	`m_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`vpc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;


ALTER TABLE `categories` ADD `c_meta_title` VARCHAR(15) NULL AFTER `c_code`,  ADD `c_meta_desc` VARCHAR(150) NULL AFTER `c_meta_title`;
ALTER TABLE `sub_categories` ADD `sc_meta_title` VARCHAR(15) NULL AFTER `sc_code`,  ADD `sc_meta_desc` VARCHAR(150) NULL AFTER `sc_meta_title`;


CREATE TABLE `view_count`(
	`vc_id` INT AUTO_INCREMENT,
	`c_id` INT NULL,
	`sc_id` INT NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`vc_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

/*Remove `mem_abt_cat_imgs` from server and add following*/

CREATE TABLE `mem_abt_cat`(
	`mac_id` INT AUTO_INCREMENT,
	`m_id` INT NULL,
	`sc_id` INT NULL,
	`mc_price` DOUBLE(10,2) NULL,
	`mc_title` VARCHAR(50) NULL,
	`mc_desc` VARCHAR(250) NULL,
	`approved` ENUM('Y', 'N') DEFAULT 'Y',
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mac_id`),
	FOREIGN KEY(`sc_id`) REFERENCES `sub_categories`(`sc_id`),
	FOREIGN KEY(`m_id`) REFERENCES `members`(`m_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `mem_abt_cat_img`(
	`mci_id` INT AUTO_INCREMENT,
	`mac_id` INT NULL,
	`mci_img` VARCHAR(500) NULL,
	`active` ENUM('Y', 'N') DEFAULT 'N',
	`deleted` ENUM('Y', 'N') DEFAULT 'Y',
	`createdDate` DATETIME NOT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY(`mci_id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;