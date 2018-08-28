
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ali_ac
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ac`;

CREATE TABLE `ali_ac`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `mposi` VARCHAR(10),
    `upa_code` VARCHAR(255),
    `upa_name` VARCHAR(255) NOT NULL,
    `bposi` VARCHAR(10),
    `level` DECIMAL(15,0) NOT NULL,
    `gen` DECIMAL(15,0) NOT NULL,
    `btype` VARCHAR(10),
    `pv` DECIMAL(15,2) NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`aid`),
    INDEX `rcode` (`rcode`, `mcode`, `fdate`, `tdate`),
    INDEX `fdate` (`fdate`, `tdate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_adjust
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_adjust`;

CREATE TABLE `ali_adjust`
(
    `sano` VARCHAR(255),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` VARCHAR(255) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) NOT NULL,
    `txtFuture` DECIMAL(15,2) NOT NULL,
    `txtTransfer` DECIMAL(15,2) NOT NULL,
    `txtCredit1` DECIMAL(15,2) NOT NULL,
    `txtCredit2` DECIMAL(15,2) NOT NULL,
    `txtCredit3` DECIMAL(15,2) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `chkCommission` DECIMAL(15,2) NOT NULL,
    `mbase` VARCHAR(244) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_aging
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_aging`;

CREATE TABLE `ali_aging`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `pcode` VARCHAR(255) NOT NULL,
    `intime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `outtime` DATETIME NOT NULL,
    `serial` VARCHAR(255) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `barcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `qty` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `id` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_ambonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ambonus`;

CREATE TABLE `ali_ambonus`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `tot_pv` DECIMAL(12,5) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `bonus` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pstatus` INTEGER NOT NULL,
    `prcode` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `paytype` INTEGER NOT NULL,
    PRIMARY KEY (`aid`),
    INDEX `fdate` (`fdate`, `tdate`),
    INDEX `mcode` (`mcode`),
    INDEX `rcode` (`rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_apv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_apv`;

CREATE TABLE `ali_apv`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `mcode` VARCHAR(255),
    `total_pv` DECIMAL(15,2) DEFAULT 0.00,
    PRIMARY KEY (`aid`),
    INDEX `rcode` (`rcode`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_around
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_around`;

CREATE TABLE `ali_around`
(
    `rid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `rdate` DATE,
    `fsano` VARCHAR(7),
    `tsano` VARCHAR(7),
    `paydate` DATE,
    `calc` VARCHAR(1),
    `calc_date` DATETIME NOT NULL,
    `remark` VARCHAR(50),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `fpdate` DATE NOT NULL,
    `tpdate` DATE NOT NULL,
    `total_a` DECIMAL(15,2) NOT NULL,
    `total_h` DECIMAL(15,2) NOT NULL,
    `fast` DECIMAL(15,2) NOT NULL,
    `invent` DECIMAL(15,2) NOT NULL,
    `binaryt` DECIMAL(15,2) NOT NULL,
    `matching` DECIMAL(15,2) NOT NULL,
    `pool` DECIMAL(15,2) NOT NULL,
    `adjust_binary` DECIMAL(15,2) NOT NULL,
    `adjust_matching` DECIMAL(15,2) NOT NULL,
    `adjust_pool` DECIMAL(15,2) NOT NULL,
    `timequery` INTEGER NOT NULL,
    `countquery` INTEGER NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`),
    INDEX `paydate` (`paydate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_asaled
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_asaled`;

CREATE TABLE `ali_asaled`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(7),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(100),
    `unit` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `cost_price` DECIMAL(15,2) NOT NULL,
    `customer_price` DECIMAL(15,2) NOT NULL,
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `sppv` DECIMAL(15,2) NOT NULL,
    `fv` DECIMAL(15,2) NOT NULL,
    `weight` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    `bprice` DECIMAL(15,2) NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `outstanding` VARCHAR(255) NOT NULL,
    `vat` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `pcode` (`pcode`),
    INDEX `mcode` (`mcode`),
    INDEX `pv` (`pv`),
    INDEX `qty` (`qty`),
    INDEX `amt` (`amt`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_asaleh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_asaleh`;

CREATE TABLE `ali_asaleh`
(
    `sano` VARCHAR(255) NOT NULL,
    `pano` VARCHAR(255) NOT NULL,
    `sadate` VARCHAR(255) NOT NULL,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_pos` VARCHAR(10) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `total_vat` DECIMAL(15,2) NOT NULL,
    `total_net` DECIMAL(15,2) NOT NULL,
    `total_invat` DECIMAL(15,2) NOT NULL,
    `total_exvat` DECIMAL(15,2) NOT NULL,
    `customer_total` DECIMAL(15,2) NOT NULL,
    `tot_pv` VARCHAR(255) NOT NULL,
    `tot_bv` VARCHAR(255) NOT NULL,
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `tot_sppv` DECIMAL(15,2) NOT NULL,
    `tot_weight` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(255) NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `trnf` INTEGER DEFAULT 0,
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `uid_branch` VARCHAR(20) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkCredit4` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtFuture` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtTransfer` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `ewallet` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit1` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit2` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit3` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit4` DECIMAL(15,2) NOT NULL,
    `txtInternet` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtDiscount` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtOther` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtSending` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionCredit4` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `discount` VARCHAR(255) NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `pay_type` VARCHAR(255) NOT NULL,
    `hcancel` INTEGER NOT NULL,
    `caddress` TEXT NOT NULL,
    `cdistrictId` VARCHAR(255) NOT NULL,
    `camphurId` VARCHAR(255) NOT NULL,
    `cprovinceId` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `sender` INTEGER NOT NULL,
    `sender_date` DATE NOT NULL,
    `receive` INTEGER NOT NULL,
    `receive_date` DATE NOT NULL,
    `asend` INTEGER NOT NULL,
    `ato_type` INTEGER NOT NULL,
    `ato_id` INTEGER NOT NULL,
    `online` INTEGER NOT NULL,
    `hpv` DECIMAL(15,2) NOT NULL,
    `htotal` DECIMAL(15,2) NOT NULL,
    `hdate` DATE NOT NULL,
    `scheck` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `rcode` INTEGER NOT NULL,
    `bmcauto` INTEGER NOT NULL,
    `cancel_date` DATETIME DEFAULT '0000-00-00 00:00:00' NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `cname` VARCHAR(255) NOT NULL,
    `cmobile` VARCHAR(255) NOT NULL,
    `uid_sender` VARCHAR(255) NOT NULL,
    `uid_receive` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(255) NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `status` INTEGER NOT NULL,
    `ref` VARCHAR(100) NOT NULL,
    `selectCash` VARCHAR(255) NOT NULL,
    `selectTransfer` VARCHAR(255) NOT NULL,
    `selectCredit1` VARCHAR(255) NOT NULL,
    `selectCredit2` VARCHAR(255) NOT NULL,
    `selectCredit3` VARCHAR(255) NOT NULL,
    `selectDiscount` VARCHAR(255) NOT NULL,
    `selectInternet` VARCHAR(255) NOT NULL,
    `txtVoucher` DECIMAL(15,2) NOT NULL,
    `optionVoucher` VARCHAR(255) NOT NULL,
    `selectVoucher` VARCHAR(255) NOT NULL,
    `txtTransfer1` VARCHAR(255) NOT NULL,
    `optionTransfer1` VARCHAR(255) NOT NULL,
    `selectTransfer1` VARCHAR(255) NOT NULL,
    `txtTransfer2` VARCHAR(255) NOT NULL,
    `optionTransfer2` VARCHAR(255) NOT NULL,
    `selectTransfer2` VARCHAR(255) NOT NULL,
    `txtTransfer3` VARCHAR(255) NOT NULL,
    `optionTransfer3` VARCHAR(255) NOT NULL,
    `selectTransfer3` VARCHAR(255) NOT NULL,
    `status_package` INTEGER(10) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`),
    INDEX `sadate_3` (`sadate`, `mcode`, `sa_type`, `cancel`),
    INDEX `sadate_4` (`sadate`, `mcode`, `tot_bv`, `sa_type`, `cancel`),
    INDEX `sadate_5` (`sadate`, `sa_type`, `cancel`),
    INDEX `cancel` (`cancel`),
    INDEX `tot_pv` (`tot_pv`),
    INDEX `sa_type` (`sa_type`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_atoasaled
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_atoasaled`;

CREATE TABLE `ali_atoasaled`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(7),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(100),
    `unit` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `cost_price` DECIMAL(15,2) NOT NULL,
    `customer_price` DECIMAL(15,2) NOT NULL,
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `sppv` DECIMAL(15,2) NOT NULL,
    `fv` DECIMAL(15,2) NOT NULL,
    `weight` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    `bprice` DECIMAL(15,2) NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `outstanding` VARCHAR(255) NOT NULL,
    `vat` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_atoasaleh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_atoasaleh`;

CREATE TABLE `ali_atoasaleh`
(
    `sano` VARCHAR(255),
    `pano` VARCHAR(255) NOT NULL,
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255),
    `inv_ref` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_pos` VARCHAR(10) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `total_vat` DECIMAL(15,2) NOT NULL,
    `total_net` DECIMAL(15,2) NOT NULL,
    `total_invat` DECIMAL(15,2) NOT NULL,
    `total_exvat` DECIMAL(15,2) NOT NULL,
    `customer_total` DECIMAL(15,2) NOT NULL,
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `tot_sppv` DECIMAL(15,2) NOT NULL,
    `tot_weight` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` INTEGER DEFAULT 0,
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `uid_branch` VARCHAR(20) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkCredit4` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtFuture` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtTransfer` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `ewallet` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit1` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit2` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit3` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit4` DECIMAL(15,2) NOT NULL,
    `txtInternet` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtDiscount` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtOther` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionCredit4` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `discount` VARCHAR(255) NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `pay_type` VARCHAR(255) NOT NULL,
    `hcancel` INTEGER NOT NULL,
    `caddress` TEXT NOT NULL,
    `cdistrictId` VARCHAR(255) NOT NULL,
    `camphurId` VARCHAR(255) NOT NULL,
    `cprovinceId` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `sender` INTEGER NOT NULL,
    `sender_date` DATE NOT NULL,
    `receive` INTEGER NOT NULL,
    `receive_date` DATE NOT NULL,
    `asend` INTEGER NOT NULL,
    `ato_type` INTEGER NOT NULL,
    `ato_id` INTEGER NOT NULL,
    `online` INTEGER NOT NULL,
    `hpv` DECIMAL(15,2) NOT NULL,
    `htotal` DECIMAL(15,2) NOT NULL,
    `hdate` DATE NOT NULL,
    `scheck` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `rcode` INTEGER NOT NULL,
    `bmcauto` INTEGER NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `cname` VARCHAR(255) NOT NULL,
    `cmobile` VARCHAR(255) NOT NULL,
    `uid_sender` VARCHAR(255) NOT NULL,
    `uid_receive` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(255) NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `status` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`),
    INDEX `sadate_3` (`sadate`, `mcode`, `sa_type`, `cancel`),
    INDEX `sadate_4` (`sadate`, `mcode`, `tot_bv`, `sa_type`, `cancel`),
    INDEX `sadate_5` (`sadate`, `sa_type`, `cancel`),
    INDEX `sadate_6` (`sadate`, `mcode`, `sa_type`, `cancel`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_autocals
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_autocals`;

CREATE TABLE `ali_autocals`
(
    `cid` INTEGER NOT NULL AUTO_INCREMENT,
    `time` DATETIME NOT NULL,
    `status` INTEGER NOT NULL,
    PRIMARY KEY (`cid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_bank
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bank`;

CREATE TABLE `ali_bank`
(
    `bankcode` VARCHAR(255) NOT NULL,
    `bankname` VARCHAR(255),
    `uid` VARCHAR(255) NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`bankcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bank_new
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bank_new`;

CREATE TABLE `ali_bank_new`
(
    `bankcode` INTEGER NOT NULL AUTO_INCREMENT,
    `bankname` CHAR(200),
    `code` VARCHAR(255) NOT NULL,
    `uid` CHAR,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`bankcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bank_old
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bank_old`;

CREATE TABLE `ali_bank_old`
(
    `bankcode` INTEGER NOT NULL AUTO_INCREMENT,
    `bankname` CHAR(25),
    `code` VARCHAR(255) NOT NULL,
    `uid` CHAR,
    `locationbase` INTEGER(1) NOT NULL,
    PRIMARY KEY (`bankcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bbuy
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bbuy`;

CREATE TABLE `ali_bbuy`
(
    `bbuy_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `bbuy_Date` DATE NOT NULL,
    `pcode` VARCHAR(255) NOT NULL,
    `bbuy_Qua` INTEGER NOT NULL,
    `bbuy_Balance` INTEGER NOT NULL,
    `txtoption` TEXT NOT NULL,
    PRIMARY KEY (`bbuy_ID`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bc`;

CREATE TABLE `ali_bc`
(
    `bid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(7) NOT NULL,
    `upa_code` VARCHAR(7),
    `rol_l` DECIMAL(15,2) NOT NULL,
    `rol_r` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`bid`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_binary_newpoint
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_binary_newpoint`;

CREATE TABLE `ali_binary_newpoint`
(
    `mcode` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `month` VARCHAR(255) NOT NULL,
    `mdate` DATE NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name_t` VARCHAR(255) NOT NULL,
    `point_left` DECIMAL(15,2) NOT NULL,
    `point_right` DECIMAL(15,2) NOT NULL,
    `point_all` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `uid` (`uid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_binary_report
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_binary_report`;

CREATE TABLE `ali_binary_report`
(
    `mcode` VARCHAR(255) NOT NULL,
    `mdate` DATE NOT NULL,
    `id` BIGINT(22) NOT NULL AUTO_INCREMENT,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fast` DECIMAL(15,2) NOT NULL,
    `weakstrong` DECIMAL(15,2) NOT NULL,
    `matching` DECIMAL(15,2) NOT NULL,
    `upa_code` VARCHAR(255) NOT NULL,
    `upa_name` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_name` VARCHAR(255) NOT NULL,
    `lv` INTEGER NOT NULL,
    `lv_sp` INTEGER NOT NULL,
    `lr` INTEGER NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur2` VARCHAR(10) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `totpv` DECIMAL(15,2) NOT NULL,
    `hpv` DECIMAL(15,2) NOT NULL,
    `thismonth` DECIMAL(15,2) NOT NULL,
    `nextmonth` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `uid` (`uid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bm
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bm`;

CREATE TABLE `ali_bm`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `sano` VARCHAR(50) DEFAULT '0' NOT NULL,
    `mcode` CHAR(255) NOT NULL,
    `upa_code` CHAR(255),
    `lr` INTEGER(10),
    `level` INTEGER(10) NOT NULL,
    `pv` DECIMAL(15,2) DEFAULT 0.00,
    `bv` DECIMAL(15,2) NOT NULL,
    `gpv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` VARCHAR(10) NOT NULL,
    `sa_type` VARCHAR(10) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `rcode` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `upa_code` (`upa_code`),
    INDEX `lr` (`lr`),
    INDEX `pv` (`pv`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bm1
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bm1`;

CREATE TABLE `ali_bm1`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `sano` VARCHAR(50) DEFAULT '0' NOT NULL,
    `mcode` CHAR(255) NOT NULL,
    `upa_code` CHAR(255),
    `lr` INTEGER(10),
    `level` INTEGER(10) NOT NULL,
    `pv` DECIMAL(15,2) DEFAULT 0.00,
    `bv` DECIMAL(15,2) NOT NULL,
    `gpv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` CHAR(10) NOT NULL,
    `sa_type` CHAR(10) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `rcode` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `upa_code` (`upa_code`),
    INDEX `lr` (`lr`),
    INDEX `pv` (`pv`),
    INDEX `fdate` (`fdate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bm2
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bm2`;

CREATE TABLE `ali_bm2`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `sano` VARCHAR(50) DEFAULT '0' NOT NULL,
    `mcode` CHAR(255) NOT NULL,
    `upa_code` CHAR(255),
    `lr` INTEGER(10),
    `level` INTEGER(10) NOT NULL,
    `pv` DECIMAL(15,2) DEFAULT 0.00,
    `bv` DECIMAL(15,2) NOT NULL,
    `gpv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` CHAR(10) NOT NULL,
    `sa_type` CHAR(10) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `rcode` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `upa_code` (`upa_code`),
    INDEX `lr` (`lr`),
    INDEX `pv` (`pv`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bmbonus`;

CREATE TABLE `ali_bmbonus`
(
    `cid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(9) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `ro_l` DECIMAL(15,2) NOT NULL,
    `ro_c` DECIMAL(15,2) NOT NULL,
    `ro_r` DECIMAL(15,2) NOT NULL,
    `pcrry_l` DECIMAL(15,2) NOT NULL,
    `pcrry_c` DECIMAL(15,2) NOT NULL,
    `pquota` DECIMAL(15,2) NOT NULL,
    `total_pv_ll` DECIMAL(15,2) NOT NULL,
    `total_pv_rr` DECIMAL(15,2) NOT NULL,
    `total_pv_l` DECIMAL(15,2) NOT NULL,
    `total_pv_r` DECIMAL(15,2) NOT NULL,
    `carry_l` DECIMAL(15,2) NOT NULL,
    `carry_c` INTEGER NOT NULL,
    `carry_r` INTEGER NOT NULL,
    `quota` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `totalamt` DECIMAL(15,2) NOT NULL,
    `paydate` DATE DEFAULT '0000-00-00' NOT NULL,
    `mpos` VARCHAR(10),
    `tdate` DATE NOT NULL,
    `fdate` DATE NOT NULL,
    `pair_stop` DECIMAL(15,2) NOT NULL,
    `point` INTEGER NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `adjust` DECIMAL(15,2) NOT NULL,
    `balance` DECIMAL(15,2) NOT NULL,
    `cycle_b` INTEGER(3) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(15,6) NOT NULL,
    PRIMARY KEY (`cid`),
    INDEX `mcode` (`mcode`),
    INDEX `carry_l` (`carry_l`),
    INDEX `carry_c` (`carry_c`),
    INDEX `quota` (`quota`),
    INDEX `pair_stop` (`pair_stop`),
    INDEX `fdate` (`fdate`),
    INDEX `tdate` (`tdate`),
    INDEX `total` (`total`),
    INDEX `rcode` (`rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bmbonus_new
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bmbonus_new`;

CREATE TABLE `ali_bmbonus_new`
(
    `cid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(7) NOT NULL,
    `ro_l` DECIMAL(15,2) NOT NULL,
    `ro_c` DECIMAL(15,2) NOT NULL,
    `ro_r` DECIMAL(15,2) NOT NULL,
    `pcrry_l` DECIMAL(15,2) NOT NULL,
    `ccpcrry_l` VARCHAR(255) NOT NULL,
    `ccpcrry_c` VARCHAR(255) NOT NULL,
    `pcrry_c` DECIMAL(15,2) NOT NULL,
    `pcrry_r` DECIMAL(15,2) NOT NULL,
    `pquota` DECIMAL(15,2) NOT NULL,
    `total_pv_ll` DECIMAL(15,2) NOT NULL,
    `total_pv_rr` DECIMAL(15,2) NOT NULL,
    `total_pv_l` DECIMAL(15,2) NOT NULL,
    `total_pv_r` DECIMAL(15,2) NOT NULL,
    `count_l` DECIMAL(15,0) NOT NULL,
    `count_c` DECIMAL(15,0) NOT NULL,
    `count_r` DECIMAL(15,0) NOT NULL,
    `carry_l` DECIMAL(15,2) NOT NULL,
    `carry_c` DECIMAL(15,2) NOT NULL,
    `carry_r` DECIMAL(15,2) NOT NULL,
    `quota` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `totalamt` DECIMAL(15,2) NOT NULL,
    `paydate` DATE DEFAULT '0000-00-00' NOT NULL,
    `mpos` VARCHAR(10),
    `tdate` DATE NOT NULL,
    `fdate` DATE NOT NULL,
    `pair_stop` DECIMAL(15,2) NOT NULL,
    `point` INTEGER NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `adjust` DECIMAL(15,2) NOT NULL,
    `total_cmt_weak` DECIMAL(15,2) NOT NULL,
    `total_cmt_strong` DECIMAL(15,2) NOT NULL,
    `balance` DECIMAL(15,2) NOT NULL,
    `cycle_b` INTEGER(3) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`cid`),
    INDEX `mcode` (`mcode`),
    INDEX `carry_l` (`carry_l`),
    INDEX `carry_c` (`carry_c`),
    INDEX `carry_r` (`carry_r`),
    INDEX `quota` (`quota`),
    INDEX `pair_stop` (`pair_stop`),
    INDEX `fdate` (`fdate`),
    INDEX `tdate` (`tdate`),
    INDEX `total` (`total`),
    INDEX `rcode` (`rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bmnew
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bmnew`;

CREATE TABLE `ali_bmnew`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `carry_l` INTEGER NOT NULL,
    `carry_c` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_bround
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_bround`;

CREATE TABLE `ali_bround`
(
    `rid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `rdate` DATE,
    `fsano` VARCHAR(7),
    `tsano` VARCHAR(7),
    `paydate` DATE,
    `calc` VARCHAR(1),
    `calc_date` DATETIME NOT NULL,
    `remark` VARCHAR(50),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `fpdate` DATE NOT NULL,
    `tpdate` DATE NOT NULL,
    `timequery` INTEGER NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`),
    INDEX `paydate` (`paydate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_calc_poschange
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_calc_poschange`;

CREATE TABLE `ali_calc_poschange`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` CHAR(20) DEFAULT '' NOT NULL,
    `pos_before` VARCHAR(11),
    `pos_after` VARCHAR(11),
    `date_change` DATE,
    `date_update` DATE NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `up_down` VARCHAR(255) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `date_change` (`date_change`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_calc_poschange1
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_calc_poschange1`;

CREATE TABLE `ali_calc_poschange1`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) DEFAULT '' NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `pos_before` VARCHAR(11),
    `pos_after` VARCHAR(11),
    `date_change` DATE,
    `date_update` DATE NOT NULL,
    `type` VARCHAR(255),
    `uid` VARCHAR(255) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_calc_poschange2
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_calc_poschange2`;

CREATE TABLE `ali_calc_poschange2`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) DEFAULT '' NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `pos_before` VARCHAR(11),
    `pos_after` VARCHAR(11),
    `date_change` DATE,
    `date_update` DATE NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `pvleft` DECIMAL(15,2) NOT NULL,
    `pvright` DECIMAL(15,2) NOT NULL,
    `dpvleft` INTEGER NOT NULL,
    `dpvright` INTEGER NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `status` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_calc_poschange3
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_calc_poschange3`;

CREATE TABLE `ali_calc_poschange3`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) DEFAULT '' NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `pos_before` VARCHAR(11),
    `pos_after` VARCHAR(11),
    `date_change` DATE,
    `date_update` DATE NOT NULL,
    `type` VARCHAR(255),
    `uid` VARCHAR(255) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_calc_poschange_20180525
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_calc_poschange_20180525`;

CREATE TABLE `ali_calc_poschange_20180525`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` CHAR(20) DEFAULT '' NOT NULL,
    `pos_before` VARCHAR(11),
    `pos_after` VARCHAR(11),
    `date_change` DATE,
    `date_update` DATE NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `up_down` VARCHAR(255) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `date_change` (`date_change`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_cc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cc`;

CREATE TABLE `ali_cc`
(
    `bid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(7) NOT NULL,
    `upa_code` VARCHAR(7),
    `rol_l` DECIMAL(15,2) NOT NULL,
    `rol_r` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`bid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_checkdownline
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_checkdownline`;

CREATE TABLE `ali_checkdownline`
(
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fast` DECIMAL(15,2) NOT NULL,
    `weakstrong` DECIMAL(15,2) NOT NULL,
    `matching` DECIMAL(15,2) NOT NULL,
    `star` DECIMAL(15,2) NOT NULL,
    `onetime` DECIMAL(15,2) NOT NULL,
    `alltotal` DECIMAL(15,2) NOT NULL,
    `upa_code` VARCHAR(255) NOT NULL,
    `lv` INTEGER NOT NULL,
    `lr` INTEGER NOT NULL,
    `mdate` DATE,
    `id_card` VARCHAR(255) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_checkdownline_sp
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_checkdownline_sp`;

CREATE TABLE `ali_checkdownline_sp`
(
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fast` DECIMAL(15,2) NOT NULL,
    `weakstrong` DECIMAL(15,2) NOT NULL,
    `matching` DECIMAL(15,2) NOT NULL,
    `star` DECIMAL(15,2) NOT NULL,
    `onetime` DECIMAL(15,2) NOT NULL,
    `alltotal` DECIMAL(15,2) NOT NULL,
    `upa_code` VARCHAR(255) NOT NULL,
    `lv` INTEGER NOT NULL,
    `lr` INTEGER NOT NULL,
    `mdate` DATE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_cm
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cm`;

CREATE TABLE `ali_cm`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) DEFAULT 0 NOT NULL,
    `mcode` CHAR(20) NOT NULL,
    `upa_code` CHAR(20),
    `lr` INTEGER(10),
    `pv` DECIMAL(15,2) DEFAULT 0.00,
    `gpv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` CHAR(10) NOT NULL,
    `npos` CHAR(10) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `rcode` (`rcode`),
    INDEX `mcode` (`mcode`, `rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_cmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cmbonus`;

CREATE TABLE `ali_cmbonus`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `status_pv` DECIMAL(15,2) NOT NULL,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `status` VARCHAR(2) NOT NULL,
    `pv` DECIMAL(15,2) NOT NULL,
    `pvb` DECIMAL(15,2) NOT NULL,
    `pvh` DECIMAL(15,2) NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `fob` DECIMAL(15,2) NOT NULL,
    `cycle` DECIMAL(15,2) NOT NULL,
    `smb` DECIMAL(15,2) NOT NULL,
    `matching` DECIMAL(15,2) NOT NULL,
    `onetime` DECIMAL(15,2) NOT NULL,
    `atoship` DECIMAL(15,2) NOT NULL,
    `ecom` DECIMAL(15,2) NOT NULL,
    `ecom_round` DECIMAL(15,2) NOT NULL,
    `ecomtranfer` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `totaly` DECIMAL(15,2) NOT NULL,
    `tot_vat` DECIMAL(15,2) NOT NULL,
    `tot_tax` DECIMAL(15,2) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `mdate` DATE NOT NULL,
    `month_pv` VARCHAR(10) NOT NULL,
    `mpos` VARCHAR(255) NOT NULL,
    `c_note1` VARCHAR(255) NOT NULL,
    `c_note2` VARCHAR(255) NOT NULL,
    `c_note3` VARCHAR(255) NOT NULL,
    `c_note4` VARCHAR(255) NOT NULL,
    `c_note5` VARCHAR(255) NOT NULL,
    `c_transfer` VARCHAR(255) NOT NULL,
    `c_remark` VARCHAR(255) NOT NULL,
    `sms_credits` INTEGER NOT NULL,
    `paydate` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `voucher` DECIMAL(15,2) NOT NULL,
    `mtype` INTEGER NOT NULL,
    `com_transfer_chagre` DECIMAL(15,2) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `id_card` VARCHAR(255) NOT NULL,
    `id_tax` VARCHAR(255) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `bankcode` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `status` (`status`),
    INDEX `paydate` (`paydate`),
    INDEX `rcode` (`rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_cmbonus_b
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cmbonus_b`;

CREATE TABLE `ali_cmbonus_b`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `status_pv` DECIMAL(15,2) NOT NULL,
    `rcode` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `status` VARCHAR(2) NOT NULL,
    `pv` DECIMAL(15,2) NOT NULL,
    `pvb` DECIMAL(15,2) NOT NULL,
    `pvh` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `dmbonus` DECIMAL(15,2) NOT NULL,
    `embonus` DECIMAL(15,2) NOT NULL,
    `totaly` DECIMAL(15,2) NOT NULL,
    `tot_vat` DECIMAL(15,2) NOT NULL,
    `tot_tax` DECIMAL(15,2) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `mdate` DATE NOT NULL,
    `month_pv` VARCHAR(10) NOT NULL,
    `mpos` VARCHAR(255) NOT NULL,
    `c_note1` VARCHAR(255) NOT NULL,
    `c_note2` VARCHAR(255) NOT NULL,
    `c_note3` VARCHAR(255) NOT NULL,
    `c_note4` VARCHAR(255) NOT NULL,
    `c_note5` VARCHAR(255) NOT NULL,
    `c_transfer` VARCHAR(255) NOT NULL,
    `c_remark` VARCHAR(255) NOT NULL,
    `sms_credits` INTEGER NOT NULL,
    `paydate` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `voucher` DECIMAL(15,2) NOT NULL,
    `mtype` INTEGER NOT NULL,
    `com_transfer_chagre` DECIMAL(15,2) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `id_card` VARCHAR(255) NOT NULL,
    `id_tax` VARCHAR(255) NOT NULL,
    `vip` INTEGER(2) NOT NULL,
    `bankcode` VARCHAR(5) NOT NULL,
    `acc_no` VARCHAR(255) NOT NULL,
    `acc_name` VARCHAR(250) NOT NULL,
    `branch` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(255) NOT NULL,
    `cmp` VARCHAR(255) NOT NULL,
    `cmp2` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `status` (`status`),
    INDEX `rcode` (`rcode`),
    INDEX `fdate` (`fdate`),
    INDEX `tdate` (`tdate`),
    INDEX `paydate` (`paydate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_commission
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_commission`;

CREATE TABLE `ali_commission`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `ambonus` DECIMAL(15,2) NOT NULL,
    `bmbonus` DECIMAL(15,2) NOT NULL,
    `dmbonus` DECIMAL(15,2) NOT NULL,
    `fmbonus` DECIMAL(15,2) NOT NULL,
    `ato` DECIMAL(15,2) NOT NULL,
    `ato1` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `rcode` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pay` INTEGER(1) NOT NULL,
    `sano_ecom` VARCHAR(255) NOT NULL,
    `sano_ato` VARCHAR(255) NOT NULL,
    `sano_ewallet` VARCHAR(255) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `fdate`, `tdate`),
    INDEX `fdate` (`fdate`),
    INDEX `tdate` (`tdate`),
    INDEX `total` (`total`),
    INDEX `rcode` (`rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_commission_b
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_commission_b`;

CREATE TABLE `ali_commission_b`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `pos_cur3` VARCHAR(255) NOT NULL,
    `dmbonus` DECIMAL(15,2) NOT NULL,
    `embonus` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `rcode` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `fdate`, `tdate`),
    INDEX `fdate` (`fdate`),
    INDEX `tdate` (`tdate`),
    INDEX `total` (`total`),
    INDEX `rcode` (`rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_cpv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cpv`;

CREATE TABLE `ali_cpv`
(
    `bid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `mcode` VARCHAR(255),
    `total_pv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` VARCHAR(5),
    `npos` VARCHAR(5),
    PRIMARY KEY (`bid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_cron
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cron`;

CREATE TABLE `ali_cron`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `cron_detail` VARCHAR(255) NOT NULL,
    `cron_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `rcode` INTEGER NOT NULL,
    `httppost` VARCHAR(255) NOT NULL,
    `requesturl` VARCHAR(255) NOT NULL,
    `phpself` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_cronjob
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cronjob`;

CREATE TABLE `ali_cronjob`
(
    `cstatus` INTEGER NOT NULL,
    `ctype` INTEGER(255) NOT NULL,
    `cfdate` DATE NOT NULL,
    `ctdate` DATE NOT NULL,
    `ctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_cround
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cround`;

CREATE TABLE `ali_cround`
(
    `rid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `cstatus` INTEGER NOT NULL,
    `rdate` DATE,
    `fsano` VARCHAR(7),
    `tsano` VARCHAR(7),
    `paydate` DATE,
    `calc` VARCHAR(1),
    `remark` VARCHAR(50),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `fpdate` DATE NOT NULL,
    `tpdate` DATE NOT NULL,
    `total_a` DECIMAL(15,2) NOT NULL,
    `total_h` DECIMAL(15,2) NOT NULL,
    `fast` DECIMAL(15,2) NOT NULL,
    `invent` DECIMAL(15,2) NOT NULL,
    `binaryt` DECIMAL(15,2) NOT NULL,
    `matching` DECIMAL(15,2) NOT NULL,
    `pool` DECIMAL(15,2) NOT NULL,
    `adjust_binary` DECIMAL(15,2) NOT NULL,
    `adjust_matching` DECIMAL(15,2) NOT NULL,
    `adjust_pool` DECIMAL(15,2) NOT NULL,
    `calc_date` DATETIME NOT NULL,
    `timequery` INTEGER NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`),
    INDEX `paydate` (`paydate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_cround1
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_cround1`;

CREATE TABLE `ali_cround1`
(
    `rid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `rdate` DATE,
    `fsano` VARCHAR(7),
    `tsano` VARCHAR(7),
    `paydate` DATE,
    `calc` VARCHAR(1),
    `remark` VARCHAR(50),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `fpdate` DATE NOT NULL,
    `tpdate` DATE NOT NULL,
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`),
    INDEX `paydate` (`paydate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_dc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_dc`;

CREATE TABLE `ali_dc`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `mposi` VARCHAR(10),
    `upa_code` VARCHAR(255),
    `upa_name` VARCHAR(255) NOT NULL,
    `bposi` VARCHAR(10),
    `level` DECIMAL(15,0) NOT NULL,
    `gen` DECIMAL(15,0) NOT NULL,
    `btype` VARCHAR(10),
    `pv` DECIMAL(15,2) NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_dm
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_dm`;

CREATE TABLE `ali_dm`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) DEFAULT 0 NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `upa_code` VARCHAR(255),
    `lr` INTEGER(10),
    `pv` DECIMAL(15,2) DEFAULT 0.00,
    `gpv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` CHAR(10) NOT NULL,
    `npos` CHAR(10) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `rcode` (`rcode`),
    INDEX `mcode` (`mcode`, `rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_dmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_dmbonus`;

CREATE TABLE `ali_dmbonus`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `bonus` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `adjust` DECIMAL(15,2) NOT NULL,
    `pstatus` INTEGER NOT NULL,
    `prcode` INTEGER NOT NULL,
    `crate` DECIMAL(11,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_dpv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_dpv`;

CREATE TABLE `ali_dpv`
(
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `total_pv` DECIMAL(15,2) DEFAULT 0.00,
    INDEX `rcode` (`rcode`),
    INDEX `mcode` (`mcode`, `rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_dround
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_dround`;

CREATE TABLE `ali_dround`
(
    `rid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `rdate` DATE,
    `fsano` VARCHAR(7),
    `tsano` VARCHAR(7),
    `paydate` DATE,
    `calc` VARCHAR(1),
    `remark` VARCHAR(50),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `fpdate` DATE NOT NULL,
    `tpdate` DATE NOT NULL,
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`),
    INDEX `paydate` (`paydate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_eatoship
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_eatoship`;

CREATE TABLE `ali_eatoship`
(
    `sano` VARCHAR(255),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `pv` INTEGER NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` DECIMAL(15,2) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(100) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkWithdraw` VARCHAR(255) NOT NULL,
    `chkTransfer_in` VARCHAR(255) NOT NULL,
    `chkTransfer_out` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,3) NOT NULL,
    `txtFuture` DECIMAL(15,3) NOT NULL,
    `txtInternet` DECIMAL(15,2) NOT NULL,
    `txtTransfer` DECIMAL(15,3) NOT NULL,
    `txtCredit1` DECIMAL(15,3) NOT NULL,
    `txtCredit2` DECIMAL(15,3) NOT NULL,
    `txtCredit3` DECIMAL(15,3) NOT NULL,
    `txtWithdraw` DECIMAL(15,3) NOT NULL,
    `txtDiscount` DECIMAL(15,2) NOT NULL,
    `txtTransfer_in` DECIMAL(15,3) NOT NULL,
    `txtTransfer_out` DECIMAL(15,3) NOT NULL,
    `txtVoucher` VARCHAR(255) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionWithdraw` VARCHAR(255) NOT NULL,
    `optionTransfer_in` VARCHAR(255) NOT NULL,
    `optionTransfer_out` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `chkCommission` VARCHAR(255) NOT NULL,
    `txtCommission` DECIMAL(15,2) NOT NULL,
    `optionCommission` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(244) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `rcode` INTEGER NOT NULL,
    `echeck` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ec
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ec`;

CREATE TABLE `ali_ec`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255),
    `pv` DECIMAL(15,2) NOT NULL,
    `point` DECIMAL(15,0) NOT NULL,
    `share` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `pershare` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ecom
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ecom`;

CREATE TABLE `ali_ecom`
(
    `sano` VARCHAR(255),
    `rcode` INTEGER(10) NOT NULL,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `usercode` VARCHAR(3),
    `remark` VARCHAR(255) NOT NULL,
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` DECIMAL(15,2) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(100) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkWithdraw` VARCHAR(255) NOT NULL,
    `chkTransfer_in` VARCHAR(255) NOT NULL,
    `chkTransfer_out` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) NOT NULL,
    `txtFuture` DECIMAL(15,2) NOT NULL,
    `txtInternet` DECIMAL(15,2) NOT NULL,
    `txtTransfer` DECIMAL(15,2) NOT NULL,
    `txtCredit1` DECIMAL(15,2) NOT NULL,
    `txtCredit2` DECIMAL(15,2) NOT NULL,
    `txtCredit3` DECIMAL(15,2) NOT NULL,
    `txtWithdraw` DECIMAL(15,2) NOT NULL,
    `txtTransfer_in` DECIMAL(15,2) NOT NULL,
    `txtTransfer_out` DECIMAL(15,2) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionWithdraw` VARCHAR(255) NOT NULL,
    `optionTransfer_in` VARCHAR(255) NOT NULL,
    `optionTransfer_out` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `chkCommission` VARCHAR(255) NOT NULL,
    `txtCommission` DECIMAL(15,2) NOT NULL,
    `optionCommission` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(244) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `echeck` VARCHAR(255) NOT NULL,
    `sano_temp` VARCHAR(255) NOT NULL,
    `selectCash` VARCHAR(255),
    `selectTransfer` VARCHAR(255),
    `selectCredit1` VARCHAR(255),
    `selectCredit2` VARCHAR(255),
    `selectCredit3` VARCHAR(255),
    `optionInternet` VARCHAR(255),
    `selectInternet` VARCHAR(255),
    `txtTransfer1` DECIMAL(15,2),
    `optionTransfer1` VARCHAR(255),
    `selectTransfer1` VARCHAR(255),
    `txtTransfer2` DECIMAL(15,2),
    `optionTransfer2` VARCHAR(255),
    `selectTransfer2` VARCHAR(255),
    `txtTransfer3` DECIMAL(15,2),
    `optionTransfer3` VARCHAR(255),
    `selectTransfer3` VARCHAR(255),
    `image_transfer` TEXT NOT NULL,
    `txtVoucher` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ecommision
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ecommision`;

CREATE TABLE `ali_ecommision`
(
    `sano` VARCHAR(255),
    `rcode` INTEGER(10) NOT NULL,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` DECIMAL(15,2) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkWithdraw` VARCHAR(255) NOT NULL,
    `chkTransfer_in` VARCHAR(255) NOT NULL,
    `chkTransfer_out` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) NOT NULL,
    `txtFuture` DECIMAL(15,2) NOT NULL,
    `txtTransfer` DECIMAL(15,2) NOT NULL,
    `txtCredit1` DECIMAL(15,2) NOT NULL,
    `txtCredit2` DECIMAL(15,2) NOT NULL,
    `txtCredit3` DECIMAL(15,2) NOT NULL,
    `txtWithdraw` DECIMAL(15,2) NOT NULL,
    `txtTransfer_in` DECIMAL(15,2) NOT NULL,
    `txtTransfer_out` DECIMAL(15,2) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionWithdraw` VARCHAR(255) NOT NULL,
    `optionTransfer_in` VARCHAR(255) NOT NULL,
    `optionTransfer_out` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `chkCommission` VARCHAR(255) NOT NULL,
    `txtCommission` DECIMAL(15,2) NOT NULL,
    `optionCommission` VARCHAR(255) NOT NULL,
    `status_tranfer` INTEGER(2) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `echeck` VARCHAR(255) NOT NULL,
    `cmbonus` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ed
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ed`;

CREATE TABLE `ali_ed`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `pv` DOUBLE(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_em
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_em`;

CREATE TABLE `ali_em`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `mpos` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `pv` DECIMAL(15,2) NOT NULL,
    `share` INTEGER NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `total1` DECIMAL(15,2) NOT NULL,
    `total2` DECIMAL(15,2) NOT NULL,
    `total3` DECIMAL(15,2) NOT NULL,
    `total4` DECIMAL(15,2) NOT NULL,
    `total5` DECIMAL(15,2) NOT NULL,
    `total6` DECIMAL(15,2) NOT NULL,
    `pershare` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pv_world` DECIMAL(15,2) NOT NULL,
    `pools` INTEGER NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur1` VARCHAR(255) NOT NULL,
    `weak` DECIMAL(15,2) NOT NULL,
    `oon` INTEGER NOT NULL,
    `exp` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id` (`id`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_embonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_embonus`;

CREATE TABLE `ali_embonus`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `mpos` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `total2` DECIMAL(15,2) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `oon` INTEGER NOT NULL,
    `bonus` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(10) NOT NULL,
    `adjust` DECIMAL(15,2) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `pos_cur1` VARCHAR(255) NOT NULL,
    `weak` DECIMAL(15,2) NOT NULL,
    `pv_world` DECIMAL(15,2) NOT NULL,
    `allsumpv_cd` DECIMAL(15,2) NOT NULL,
    `allsumpv_sd` DECIMAL(15,2) NOT NULL,
    `sumpv_cd` DECIMAL(15,2) NOT NULL,
    `sumpv_sd` DECIMAL(15,2) NOT NULL,
    `exp` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`aid`),
    INDEX `rcode` (`rcode`, `mcode`),
    INDEX `fdate` (`fdate`, `tdate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_epv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_epv`;

CREATE TABLE `ali_epv`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `total_pv` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `fdate` (`fdate`, `tdate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_esaled
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_esaled`;

CREATE TABLE `ali_esaled`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(7),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(100),
    `mcode` VARCHAR(7),
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `fv` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_esaleh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_esaleh`;

CREATE TABLE `ali_esaleh`
(
    `sano` BIGINT(22),
    `sano1` BIGINT(22) NOT NULL,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `inv_ref` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(20),
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` INTEGER,
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtFuture` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtTransfer` VARCHAR(255) DEFAULT '0' NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `txtCredit1` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit2` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit3` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtInternet` VARCHAR(255) NOT NULL,
    `txtDiscount` VARCHAR(255) NOT NULL,
    `txtOther` VARCHAR(255) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `asend` INTEGER NOT NULL,
    `asend_date` DATE NOT NULL,
    `discount` VARCHAR(255) NOT NULL,
    `status` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ewallett_before` DECIMAL(15,2) NOT NULL,
    `ewallett_after` DECIMAL(15,2) NOT NULL,
    `print` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ewallet
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ewallet`;

CREATE TABLE `ali_ewallet`
(
    `sano` VARCHAR(255),
    `rcode` INTEGER(10) NOT NULL,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `usercode` VARCHAR(3),
    `remark` VARCHAR(255) NOT NULL,
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` DECIMAL(15,2) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(100) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkWithdraw` VARCHAR(255) NOT NULL,
    `txtDiscount` DECIMAL(15,2) NOT NULL,
    `chkTransfer_in` VARCHAR(255) NOT NULL,
    `chkTransfer_out` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) NOT NULL,
    `txtFuture` DECIMAL(15,2) NOT NULL,
    `txtInternet` DECIMAL(15,2) NOT NULL,
    `txtTransfer` DECIMAL(15,2) NOT NULL,
    `txtCredit1` DECIMAL(15,2) NOT NULL,
    `txtCredit2` DECIMAL(15,2) NOT NULL,
    `txtCredit3` DECIMAL(15,2) NOT NULL,
    `txtWithdraw` DECIMAL(15,2) NOT NULL,
    `txtTransfer_in` DECIMAL(15,2) NOT NULL,
    `txtTransfer_out` DECIMAL(15,2) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionWithdraw` VARCHAR(255) NOT NULL,
    `optionTransfer_in` VARCHAR(255) NOT NULL,
    `optionTransfer_out` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `chkCommission` VARCHAR(255) NOT NULL,
    `txtCommission` DECIMAL(15,2) NOT NULL,
    `optionCommission` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(244) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `echeck` VARCHAR(255) NOT NULL,
    `sano_temp` VARCHAR(255) NOT NULL,
    `selectCash` VARCHAR(255),
    `selectTransfer` VARCHAR(255),
    `selectCredit1` VARCHAR(255),
    `selectCredit2` VARCHAR(255),
    `selectCredit3` VARCHAR(255),
    `optionInternet` VARCHAR(255),
    `selectInternet` VARCHAR(255),
    `txtTransfer1` DECIMAL(15,2),
    `optionTransfer1` VARCHAR(255),
    `selectTransfer1` VARCHAR(255),
    `txtTransfer2` DECIMAL(15,2),
    `optionTransfer2` VARCHAR(255),
    `selectTransfer2` VARCHAR(255),
    `txtTransfer3` DECIMAL(15,2),
    `optionTransfer3` VARCHAR(255),
    `selectTransfer3` VARCHAR(255),
    `image_transfer` TEXT NOT NULL,
    `txtVoucher` DECIMAL(15,2) NOT NULL,
    `id_ecom` VARCHAR(255) NOT NULL,
    `cals` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `sano_4` (`sano`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ewallet_commission
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ewallet_commission`;

CREATE TABLE `ali_ewallet_commission`
(
    `sano` VARCHAR(255),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,3),
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` DECIMAL(15,3) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkWithdraw` VARCHAR(255) NOT NULL,
    `chkTransfer_in` VARCHAR(255) NOT NULL,
    `chkTransfer_out` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,3) NOT NULL,
    `txtFuture` DECIMAL(15,3) NOT NULL,
    `txtTransfer` DECIMAL(15,3) NOT NULL,
    `txtCredit1` DECIMAL(15,3) NOT NULL,
    `txtCredit2` DECIMAL(15,3) NOT NULL,
    `txtCredit3` DECIMAL(15,3) NOT NULL,
    `txtWithdraw` DECIMAL(15,3) NOT NULL,
    `txtTransfer_in` DECIMAL(15,3) NOT NULL,
    `txtTransfer_out` DECIMAL(15,3) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionWithdraw` VARCHAR(255) NOT NULL,
    `optionTransfer_in` VARCHAR(255) NOT NULL,
    `optionTransfer_out` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `chkCommission` VARCHAR(255) NOT NULL,
    `txtCommission` DECIMAL(15,3) NOT NULL,
    `optionCommission` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(244) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `rcode` INTEGER NOT NULL,
    `echeck` VARCHAR(255) NOT NULL,
    `cmbonus` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ewallet_tranfer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ewallet_tranfer`;

CREATE TABLE `ali_ewallet_tranfer`
(
    `sano` VARCHAR(255),
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `smcode` VARCHAR(255) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` DECIMAL(15,2) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkCommission` VARCHAR(255) NOT NULL,
    `chkWithdraw` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) NOT NULL,
    `txtFuture` DECIMAL(15,2) NOT NULL,
    `txtTransfer` DECIMAL(15,2) NOT NULL,
    `txtCredit1` DECIMAL(15,2) NOT NULL,
    `txtCredit2` DECIMAL(15,2) NOT NULL,
    `txtCredit3` DECIMAL(15,2) NOT NULL,
    `txtInternet` DECIMAL(15,2) NOT NULL,
    `txtCommission` DECIMAL(15,2) NOT NULL,
    `txtWithdraw` DECIMAL(15,2) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionCommission` VARCHAR(255) NOT NULL,
    `optionWithdraw` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `mbase` VARCHAR(244) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `echeck` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ewalletd
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ewalletd`;

CREATE TABLE `ali_ewalletd`
(
    `sano` VARCHAR(255),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` DECIMAL(15,2) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkCommission` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) NOT NULL,
    `txtFuture` DECIMAL(15,2) NOT NULL,
    `txtTransfer` DECIMAL(15,2) NOT NULL,
    `txtCredit1` DECIMAL(15,2) NOT NULL,
    `txtCredit2` DECIMAL(15,2) NOT NULL,
    `txtCredit3` DECIMAL(15,2) NOT NULL,
    `txtInternet` DECIMAL(15,2) NOT NULL,
    `txtCommission` DECIMAL(15,2) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionCommission` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `mbase` VARCHAR(244) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_expdate
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_expdate`;

CREATE TABLE `ali_expdate`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mid` INTEGER NOT NULL,
    `exp_date` DATE NOT NULL,
    `date_change` DATE,
    `exp_type` VARCHAR(255),
    `sano` VARCHAR(255),
    PRIMARY KEY (`id`),
    INDEX `mid` (`mid`),
    INDEX `mid_2` (`mid`, `exp_date`),
    INDEX `exp_date` (`exp_date`),
    INDEX `sano` (`sano`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_fc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_fc`;

CREATE TABLE `ali_fc`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `mposi` VARCHAR(10),
    `upa_code` VARCHAR(255),
    `upa_name` VARCHAR(255) NOT NULL,
    `bposi` VARCHAR(10),
    `level` DECIMAL(15,0) NOT NULL,
    `gen` DECIMAL(15,0) NOT NULL,
    `btype` VARCHAR(10),
    `pv` DECIMAL(15,2) NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `total_r` DECIMAL(15,2) NOT NULL,
    `ctax` DECIMAL(15,2) NOT NULL,
    `cvat` DECIMAL(15,2) NOT NULL,
    `amt` DECIMAL(15,2) NOT NULL,
    `oon` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `crate` INTEGER NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `pcode` VARCHAR(255) NOT NULL,
    `qty` INTEGER NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_fm
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_fm`;

CREATE TABLE `ali_fm`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) DEFAULT 0 NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `sano` CHAR(255),
    `status` VARCHAR(255),
    `sa_type` VARCHAR(255) NOT NULL,
    `tot_pv` DECIMAL(15,2) DEFAULT 0.00,
    `tot_price` DECIMAL(15,2) DEFAULT 0.00,
    `mdate` DATE NOT NULL,
    `crate` INTEGER NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `rcode` (`rcode`),
    INDEX `mcode` (`inv_code`, `rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_fmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_fmbonus`;

CREATE TABLE `ali_fmbonus`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `total_r` DECIMAL(15,2) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `bonus` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `paydate` DATE NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `paytype` INTEGER NOT NULL,
    PRIMARY KEY (`aid`),
    INDEX `fdate` (`fdate`, `tdate`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_fpv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_fpv`;

CREATE TABLE `ali_fpv`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `mcode` VARCHAR(255),
    `total_pv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` VARCHAR(255),
    `npos` VARCHAR(5),
    `crate` INTEGER NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_fround
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_fround`;

CREATE TABLE `ali_fround`
(
    `rid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `rdate` DATE,
    `fsano` VARCHAR(7),
    `tsano` VARCHAR(7),
    `paydate` DATE,
    `calc` VARCHAR(1),
    `remark` VARCHAR(50),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `fpdate` DATE NOT NULL,
    `tpdate` DATE NOT NULL,
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`),
    INDEX `paydate` (`paydate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_global
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_global`;

CREATE TABLE `ali_global`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `numofchild` INTEGER(10) DEFAULT 0 NOT NULL,
    `treeformat` VARCHAR(50) DEFAULT '' NOT NULL,
    `numoflevel` INTEGER(10) DEFAULT 0 NOT NULL,
    `statusformat` VARCHAR(255) DEFAULT 'close' NOT NULL,
    `status_member` INTEGER NOT NULL,
    `status_member_remark` VARCHAR(255) NOT NULL,
    `status_regis_mb` INTEGER NOT NULL,
    `status_regis_mb_remark` VARCHAR(255) NOT NULL,
    `status_sale_mb` INTEGER NOT NULL,
    `status_sale_mb_remark` VARCHAR(255) NOT NULL,
    `status_swap_mb` INTEGER NOT NULL,
    `status_swap_mb_remark` VARCHAR(255) NOT NULL,
    `status_hold_mb` INTEGER NOT NULL,
    `status_hold_mb_remark` VARCHAR(255) NOT NULL,
    `status_remark` VARCHAR(255) NOT NULL,
    `statusewallet` VARCHAR(255) NOT NULL,
    `vip_exp` INTEGER NOT NULL,
    `status_cron` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_gmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_gmbonus`;

CREATE TABLE `ali_gmbonus`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `fast_bonus` DECIMAL(15,2) NOT NULL,
    `cycle_bonus` DECIMAL(15,2) NOT NULL,
    `matching_bonus` DECIMAL(15,2) NOT NULL,
    `key_bonus` DECIMAL(15,2) NOT NULL,
    `autoship` DECIMAL(15,2) NOT NULL,
    `rcode` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `beatoship` DECIMAL(15,2) NOT NULL,
    `bvoucher` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fdate` (`fdate`, `tdate`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_holddesc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_holddesc`;

CREATE TABLE `ali_holddesc`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `hono` INTEGER(10),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(100),
    `price` DECIMAL(10,2),
    `pv` DECIMAL(10,2),
    `bv` DECIMAL(10,2),
    `fv` DECIMAL(15,2) NOT NULL,
    `sppv` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(5,0),
    `amt` DECIMAL(10,2),
    `bprice` DECIMAL(15,2) NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `vat` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `hono` (`hono`),
    INDEX `pcode` (`pcode`),
    INDEX `pv` (`pv`),
    INDEX `qty` (`qty`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_holdhead
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_holdhead`;

CREATE TABLE `ali_holdhead`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `hono` INTEGER NOT NULL,
    `sano` INTEGER(10) NOT NULL,
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sa_type` CHAR(2),
    `inv_code` VARCHAR(255),
    `inv_code_to` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `total` DECIMAL(10,2),
    `tot_pv` DECIMAL(10,2),
    `tot_bv` DECIMAL(10,2),
    `tot_sppv` DECIMAL(15,2) NOT NULL,
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `trnf` INTEGER DEFAULT 0 NOT NULL,
    `cancel` CHAR DEFAULT '0',
    `remark` VARCHAR(40),
    `uid` VARCHAR(255),
    `dl` CHAR,
    `print` INTEGER NOT NULL,
    `rcode` INTEGER NOT NULL,
    `status` INTEGER(10) NOT NULL,
    `bmcauto` INTEGER NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(255) NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_pos` VARCHAR(255) NOT NULL,
    `ref` VARCHAR(100) NOT NULL,
    `status_package` INTEGER(10) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `tot_pv` (`tot_pv`),
    INDEX `sadate` (`sadate`, `sa_type`, `mcode`, `cancel`),
    INDEX `sadate_2` (`sadate`),
    INDEX `hono` (`hono`),
    INDEX `sano` (`sano`),
    INDEX `sa_type` (`sa_type`),
    INDEX `total` (`total`),
    INDEX `cancel` (`cancel`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_import_stock_d
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_import_stock_d`;

CREATE TABLE `ali_import_stock_d`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(7),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(40),
    `mcode` VARCHAR(7),
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `fv` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `qty_old` DECIMAL(15,2) NOT NULL,
    `amt` DECIMAL(15,2),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_import_stock_h
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_import_stock_h`;

CREATE TABLE `ali_import_stock_h`
(
    `sano` INTEGER,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `inv_code_to` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtFuture` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtTransfer` VARCHAR(255) DEFAULT '0' NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `txtCredit1` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit2` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit3` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtInternet` VARCHAR(255) NOT NULL,
    `txtDiscount` VARCHAR(255) NOT NULL,
    `txtOther` VARCHAR(255) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `discount` INTEGER NOT NULL,
    `sender` INTEGER NOT NULL,
    `sender_date` DATE NOT NULL,
    `receive` INTEGER NOT NULL,
    `receive_date` DATE NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ewallett_before` DECIMAL(15,2) NOT NULL,
    `ewallett_after` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_invent
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_invent`;

CREATE TABLE `ali_invent`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `inv_code` VARCHAR(7),
    `inv_desc` VARCHAR(50),
    `inv_type` INTEGER(10) NOT NULL,
    `code_ref` VARCHAR(20) NOT NULL,
    `address` TEXT NOT NULL,
    `districtId` INTEGER(10) NOT NULL,
    `amphurId` INTEGER(10) NOT NULL,
    `provinceId` INTEGER(10) NOT NULL,
    `zip` VARCHAR(5) NOT NULL,
    `home_t` VARCHAR(255) NOT NULL,
    `uid` INTEGER(10) NOT NULL,
    `sync` VARCHAR(1),
    `web` VARCHAR(1),
    `ewallet` DECIMAL(15,2) NOT NULL,
    `voucher` DECIMAL(15,2) NOT NULL,
    `bewallet` DECIMAL(15,2) NOT NULL,
    `bvoucher` DECIMAL(15,2) NOT NULL,
    `discount` INTEGER NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `bill_ref` VARCHAR(50) NOT NULL,
    `fax` VARCHAR(10) NOT NULL,
    `no_tax` VARCHAR(10) NOT NULL,
    `type` INTEGER(2) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_inventory_order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_inventory_order`;

CREATE TABLE `ali_inventory_order`
(
    `MLM_Inv_Type` VARCHAR(255) NOT NULL,
    `MLM_Type_Group` VARCHAR(255) NOT NULL,
    `Oracle_Type` VARCHAR(255) NOT NULL,
    `Mapping_Code` VARCHAR(255) NOT NULL,
    `Mapping_type` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Mapping_Code`,`Mapping_type`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_isaled
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_isaled`;

CREATE TABLE `ali_isaled`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(7),
    `sadate` DATE,
    `inv_code` VARCHAR(7),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(100),
    `mcode` VARCHAR(7),
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `fv` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    `bprice` DECIMAL(15,2) NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `outstanding` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_isaleh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_isaleh`;

CREATE TABLE `ali_isaleh`
(
    `sano` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255),
    `lid` VARCHAR(255) NOT NULL,
    `inv_from` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtFuture` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtTransfer` VARCHAR(255) DEFAULT '0' NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `txtCredit1` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit2` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit3` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtInternet` VARCHAR(255) NOT NULL,
    `txtDiscount` VARCHAR(255) NOT NULL,
    `txtOther` VARCHAR(255) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `discount` INTEGER NOT NULL,
    `sender` INTEGER NOT NULL,
    `sender_date` DATE NOT NULL,
    `receive` INTEGER NOT NULL,
    `receive_date` DATE NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ewallett_before` DECIMAL(15,2) NOT NULL,
    `ewallett_after` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(255) NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `uid_receive` VARCHAR(255) NOT NULL,
    `uid_sender` VARCHAR(255) NOT NULL,
    `caddress` TEXT NOT NULL,
    `cdistrictId` VARCHAR(255) NOT NULL,
    `camphurId` VARCHAR(255) NOT NULL,
    `cprovinceId` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `status` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`),
    INDEX `ewallett_before` (`ewallet_before`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_istockd
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_istockd`;

CREATE TABLE `ali_istockd`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` INTEGER,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `inv_coden` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `inv_refn` VARCHAR(255) NOT NULL,
    `rccode` VARCHAR(255) NOT NULL,
    `stockist` VARCHAR(255) NOT NULL,
    `pcode` VARCHAR(255),
    `pdesc` VARCHAR(40),
    `unit` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `cost` DECIMAL(15,2) NOT NULL,
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    `ctax` INTEGER NOT NULL,
    `group_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_istockh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_istockh`;

CREATE TABLE `ali_istockh`
(
    `sano` VARCHAR(255),
    `sano1` VARCHAR(255) NOT NULL,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `inv_coden` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `inv_refn` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `sa_mtype` VARCHAR(255) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `uid_ref` VARCHAR(255) NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `sender` VARCHAR(255) NOT NULL,
    `sender_date` DATETIME NOT NULL,
    `receive` INTEGER(255) NOT NULL,
    `receive_date` DATETIME NOT NULL,
    `uid_receive` VARCHAR(255) NOT NULL,
    `status` INTEGER NOT NULL,
    `print` INTEGER NOT NULL,
    `rccode` VARCHAR(255) NOT NULL,
    `update_date` DATETIME NOT NULL,
    `mapping_code` VARCHAR(255) NOT NULL,
    `rrcode` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_location_base
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_location_base`;

CREATE TABLE `ali_location_base`
(
    `cid` INTEGER NOT NULL AUTO_INCREMENT,
    `cshort` VARCHAR(255) NOT NULL,
    `cname` VARCHAR(255) NOT NULL,
    `csending` VARCHAR(255) NOT NULL,
    `ctax` DECIMAL(15,2) NOT NULL,
    `ctax1` DECIMAL(15,2) NOT NULL,
    `com_stockist` DECIMAL(15,2) NOT NULL,
    `crate` DECIMAL(15,6) NOT NULL,
    `pcode_register` VARCHAR(255) NOT NULL,
    `pcode_extend` VARCHAR(255) NOT NULL,
    `pcode_charge` VARCHAR(255) NOT NULL,
    `smssending` INTEGER NOT NULL,
    `currcode` VARCHAR(255) NOT NULL,
    `lang` VARCHAR(255) NOT NULL,
    `timediff` INTEGER NOT NULL,
    `regis_transfer` VARCHAR(255) NOT NULL,
    `regis_success` VARCHAR(255) NOT NULL,
    `regis_fail` VARCHAR(255) NOT NULL,
    `regis_cancel` VARCHAR(255) NOT NULL,
    `main_inv_code` VARCHAR(255) NOT NULL,
    `com_transfer_chagre` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`cid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_log
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log`;

CREATE TABLE `ali_log`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `sys_id` VARCHAR(20),
    `subject` VARCHAR(255),
    `object` TEXT,
    `detail` TEXT NOT NULL,
    `chk_mobile` INTEGER(5) NOT NULL,
    `chk_id_card` INTEGER(5) NOT NULL,
    `chk_sp_code` INTEGER(5) NOT NULL,
    `chk_upa_code` INTEGER(5) NOT NULL,
    `chk_acc_no` INTEGER(5) NOT NULL,
    `ip` VARCHAR(20),
    `logdate` DATE,
    `logtime` TIME,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_log_change
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_change`;

CREATE TABLE `ali_log_change`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `mpos` VARCHAR(50) NOT NULL,
    `status` VARCHAR(2) NOT NULL,
    `pvb` DECIMAL(15,2) NOT NULL,
    `pvh` DECIMAL(15,3) NOT NULL,
    `fob` DECIMAL(15,2) NOT NULL,
    `cycle` DECIMAL(15,2) NOT NULL,
    `ambonus2` DECIMAL(15,2) NOT NULL,
    `fmbonus` DECIMAL(15,2) NOT NULL,
    `unilevel` DECIMAL(15,2) NOT NULL,
    `adjust` DECIMAL(15,2) NOT NULL,
    `autoship` DECIMAL(15,2) NOT NULL,
    `ewallet_withdraw` DECIMAL(15,2) NOT NULL,
    `tot_tax` DECIMAL(15,2) NOT NULL,
    `pv` INTEGER(10) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `paydate` DATE NOT NULL,
    `date_change` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `com_transfer_chagre` INTEGER(10) NOT NULL,
    `uid` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `status` (`status`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_log_eatoship
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_eatoship`;

CREATE TABLE `ali_log_eatoship`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `sadate` DATE NOT NULL,
    `satime` TIME NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `_in` DECIMAL(15,2) NOT NULL,
    `_out` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `sa_type` VARCHAR(255) NOT NULL,
    `_option` VARCHAR(255) NOT NULL,
    `recal` INTEGER(1) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_log_ecom
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_ecom`;

CREATE TABLE `ali_log_ecom`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `sadate` DATE NOT NULL,
    `satime` TIME NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `_in` DECIMAL(15,2) NOT NULL,
    `_out` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `sa_type` VARCHAR(255) NOT NULL,
    `_option` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_log_ewallet
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_ewallet`;

CREATE TABLE `ali_log_ewallet`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `sadate` DATE NOT NULL,
    `satime` TIME NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `_in` DECIMAL(15,2) NOT NULL,
    `_out` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `sa_type` VARCHAR(255) NOT NULL,
    `_option` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_log_hpv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_hpv`;

CREATE TABLE `ali_log_hpv`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `sadate` DATE NOT NULL,
    `satime` TIME NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `_in` DECIMAL(15,2) NOT NULL,
    `_out` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `sa_type` VARCHAR(255) NOT NULL,
    `_option` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_log_ipay
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_ipay`;

CREATE TABLE `ali_log_ipay`
(
    `ipayorderid` VARCHAR(255) NOT NULL,
    `inv_no` VARCHAR(255) NOT NULL,
    `amount` VARCHAR(255) NOT NULL,
    `pay_type` VARCHAR(255) NOT NULL,
    `pay_method` VARCHAR(255) NOT NULL,
    `resp_code` VARCHAR(255) NOT NULL,
    `resp_desc` VARCHAR(255) NOT NULL,
    `coupon_status` VARCHAR(255) NOT NULL,
    `coupon_serial` VARCHAR(255) NOT NULL,
    `coupon_password` VARCHAR(255) NOT NULL,
    `coupon_ref` VARCHAR(255) NOT NULL,
    `billtype` VARCHAR(255) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_log_ktc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_ktc`;

CREATE TABLE `ali_log_ktc`
(
    `ref1` VARCHAR(255) NOT NULL,
    `src` VARCHAR(255) NOT NULL,
    `prc` VARCHAR(255) NOT NULL,
    `ord` VARCHAR(255) NOT NULL,
    `holder` VARCHAR(255) NOT NULL,
    `successcode` VARCHAR(255) NOT NULL,
    `ref2` VARCHAR(255) NOT NULL,
    `payRef` VARCHAR(255) NOT NULL,
    `amt` VARCHAR(255) NOT NULL,
    `cur` VARCHAR(255) NOT NULL,
    `remark` VARCHAR(255) NOT NULL,
    `authId` VARCHAR(255) NOT NULL,
    `payerAuth` VARCHAR(255) NOT NULL,
    `sourcelp` VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_log_voucher
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_voucher`;

CREATE TABLE `ali_log_voucher`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `sadate` DATE NOT NULL,
    `satime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sano` VARCHAR(255) NOT NULL,
    `_in` DECIMAL(15,2) NOT NULL,
    `_out` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `sa_type` VARCHAR(255) NOT NULL,
    `_option` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_log_wallet
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_log_wallet`;

CREATE TABLE `ali_log_wallet`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `evoucher` DECIMAL(15,2) NOT NULL,
    `eautoship` DECIMAL(15,2) NOT NULL,
    `ecom` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `tdate` (`tdate`),
    INDEX `mcode` (`mcode`),
    INDEX `fdate` (`fdate`),
    INDEX `rcode` (`rcode`),
    INDEX `ewallet` (`ewallet`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_lr_def
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_lr_def`;

CREATE TABLE `ali_lr_def`
(
    `lr_id` INTEGER(10) DEFAULT 0 NOT NULL,
    `lr_name` VARCHAR(50) DEFAULT '' NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_mc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_mc`;

CREATE TABLE `ali_mc`
(
    `bid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `mposi` VARCHAR(10),
    `upa_code` VARCHAR(255),
    `upa_name` VARCHAR(255) NOT NULL,
    `bposi` VARCHAR(10),
    `level` DECIMAL(15,0) NOT NULL,
    `gen` DECIMAL(15,0) NOT NULL,
    `btype` VARCHAR(10),
    `pv` DECIMAL(15,2) NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `checkcheck` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`bid`),
    INDEX `mcode` (`mcode`, `upa_code`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_member
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_member`;

CREATE TABLE `ali_member`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `name_e` VARCHAR(255) NOT NULL,
    `posid` VARCHAR(255) NOT NULL,
    `mdate` VARCHAR(255) NOT NULL,
    `birthday` VARCHAR(255) NOT NULL,
    `national` VARCHAR(255) NOT NULL,
    `id_tax` VARCHAR(255) NOT NULL,
    `id_card` VARCHAR(255) NOT NULL,
    `id_card_img` VARCHAR(250) NOT NULL,
    `id_card_img_date` DATETIME NOT NULL,
    `zip` VARCHAR(255) NOT NULL,
    `home_t` VARCHAR(255) NOT NULL,
    `office_t` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(255) NOT NULL,
    `mcode_acc` VARCHAR(255) NOT NULL,
    `bonusrec` VARCHAR(255) NOT NULL,
    `bankcode` VARCHAR(255) NOT NULL,
    `branch` VARCHAR(255) NOT NULL,
    `acc_type` VARCHAR(255) NOT NULL,
    `acc_no` VARCHAR(255) NOT NULL,
    `acc_no_img` VARCHAR(250) NOT NULL,
    `acc_no_img_date` DATETIME NOT NULL,
    `acc_name` VARCHAR(255) NOT NULL,
    `acc_prov` VARCHAR(255) NOT NULL,
    `sv_code` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_name` VARCHAR(255) NOT NULL,
    `sp_code2` VARCHAR(255) NOT NULL,
    `sp_name2` VARCHAR(255) NOT NULL,
    `upa_code` VARCHAR(255) NOT NULL,
    `upa_name` VARCHAR(255) NOT NULL,
    `lr` VARCHAR(255) NOT NULL,
    `complete` VARCHAR(255) NOT NULL,
    `compdate` VARCHAR(255) NOT NULL,
    `modate` VARCHAR(255) NOT NULL,
    `usercode` VARCHAR(255) NOT NULL,
    `name_b` VARCHAR(255) NOT NULL,
    `sex` VARCHAR(10) NOT NULL,
    `age` INTEGER(10) NOT NULL,
    `occupation` VARCHAR(50) NOT NULL,
    `status` INTEGER NOT NULL,
    `mar_name` VARCHAR(100) NOT NULL,
    `mar_age` INTEGER(10) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `beneficiaries` VARCHAR(100) NOT NULL,
    `relation` VARCHAR(50) NOT NULL,
    `districtId` VARCHAR(255) NOT NULL,
    `amphurId` VARCHAR(255) NOT NULL,
    `provinceId` VARCHAR(255) NOT NULL,
    `fax` VARCHAR(20) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `oid` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur1` VARCHAR(255) NOT NULL,
    `pos_cur2` VARCHAR(255) NOT NULL,
    `pos_cur3` VARCHAR(255) NOT NULL,
    `pos_cur4` VARCHAR(255) NOT NULL,
    `pos_cur_tmp` VARCHAR(255) NOT NULL,
    `rpos_cur4` INTEGER NOT NULL,
    `pos_cur3_date` DATE NOT NULL,
    `memdesc` VARCHAR(40) NOT NULL,
    `cmp` VARCHAR(10) NOT NULL,
    `cmp2` VARCHAR(255) NOT NULL,
    `cmp3` VARCHAR(255) NOT NULL,
    `ccmp` VARCHAR(255) NOT NULL,
    `ccmp2` VARCHAR(255) NOT NULL,
    `ccmp3` VARCHAR(255) NOT NULL,
    `address` TEXT NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `building` VARCHAR(255) NOT NULL,
    `village` VARCHAR(255) NOT NULL,
    `soi` VARCHAR(255) NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `eatoship` DECIMAL(15,2) NOT NULL,
    `ecom` DECIMAL(15,2) NOT NULL,
    `bmdate1` VARCHAR(255) NOT NULL,
    `bmdate2` VARCHAR(255) NOT NULL,
    `bmdate3` VARCHAR(255) NOT NULL,
    `cbmdate1` VARCHAR(255) NOT NULL,
    `cbmdate2` VARCHAR(255) NOT NULL,
    `cbmdate3` VARCHAR(255) NOT NULL,
    `online` INTEGER NOT NULL,
    `cname_f` VARCHAR(255) NOT NULL,
    `cname_t` VARCHAR(255) NOT NULL,
    `cname_e` VARCHAR(255) NOT NULL,
    `cname_b` VARCHAR(255) NOT NULL,
    `cbirthday` VARCHAR(255) NOT NULL,
    `cnational` VARCHAR(255) NOT NULL,
    `cid_tax` VARCHAR(255) NOT NULL,
    `cid_card` VARCHAR(255) NOT NULL,
    `caddress` TEXT NOT NULL,
    `cbuilding` VARCHAR(255) NOT NULL,
    `cvillage` VARCHAR(255) NOT NULL,
    `cstreet` VARCHAR(255) NOT NULL,
    `csoi` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `chome_t` VARCHAR(255) NOT NULL,
    `coffice_t` VARCHAR(255) NOT NULL,
    `cmobile` VARCHAR(255) NOT NULL,
    `cfax` VARCHAR(255) NOT NULL,
    `csex` VARCHAR(255) NOT NULL,
    `cemail` VARCHAR(255) NOT NULL,
    `cdistrictId` VARCHAR(255) NOT NULL,
    `camphurId` VARCHAR(255) NOT NULL,
    `cprovinceId` VARCHAR(255) NOT NULL,
    `iname_f` VARCHAR(255) NOT NULL,
    `iname_t` VARCHAR(255) NOT NULL,
    `irelation` VARCHAR(255) NOT NULL,
    `iphone` VARCHAR(255) NOT NULL,
    `iid_card` VARCHAR(255) NOT NULL,
    `status_doc` INTEGER NOT NULL,
    `status_expire` INTEGER NOT NULL,
    `status_terminate` INTEGER NOT NULL,
    `terminate_date` DATETIME NOT NULL,
    `status_suspend` INTEGER NOT NULL,
    `suspend_date` DATETIME NOT NULL,
    `status_blacklist` INTEGER NOT NULL,
    `status_ato` INTEGER NOT NULL,
    `sletter` INTEGER NOT NULL,
    `sinv_code` VARCHAR(255) NOT NULL,
    `txtoption` TEXT NOT NULL,
    `setregis` INTEGER DEFAULT 0 NOT NULL,
    `slr` VARCHAR(11) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `cid_mobile` VARCHAR(255) NOT NULL,
    `bewallet` DECIMAL(15,2) NOT NULL,
    `bvoucher` DECIMAL(15,2) NOT NULL,
    `voucher` DECIMAL(15,2) NOT NULL,
    `manager` VARCHAR(255) NOT NULL,
    `mtype` INTEGER NOT NULL,
    `mtype1` INTEGER(2) NOT NULL,
    `mtype2` INTEGER(2) NOT NULL,
    `mvat` INTEGER NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    `exp_date` DATE NOT NULL,
    `head_code` VARCHAR(255) NOT NULL,
    `pv_l` DECIMAL(15,2) NOT NULL,
    `pv_c` DECIMAL(15,2) NOT NULL,
    `hpv_l` DECIMAL(15,2) NOT NULL,
    `hpv_c` DECIMAL(15,2) NOT NULL,
    `pv_l_nextmonth` DECIMAL(15,2) NOT NULL,
    `pv_c_nextmonth` DECIMAL(15,2) NOT NULL,
    `pv_l_lastmonth1` DECIMAL(15,2) NOT NULL,
    `pv_c_lastmonth1` DECIMAL(15,2) NOT NULL,
    `pv_l_lastmonth2` DECIMAL(15,2) NOT NULL,
    `pv_c_lastmonth2` DECIMAL(15,2) NOT NULL,
    `rcode_star` INTEGER NOT NULL,
    `bunit` INTEGER NOT NULL,
    `province` VARCHAR(11) NOT NULL,
    `line_id` VARCHAR(255) NOT NULL,
    `facebook_name` VARCHAR(255) NOT NULL,
    `type_com` INTEGER NOT NULL,
    `exp_pos` DATE NOT NULL,
    `exp_pos_60` DATE NOT NULL,
    `trip_private` DECIMAL(15,2) NOT NULL,
    `trip_team` DECIMAL(15,2) NOT NULL,
    `myfile1` VARCHAR(255) NOT NULL,
    `myfile2` VARCHAR(255) NOT NULL,
    `cline_id` VARCHAR(255) NOT NULL,
    `cfacebook_name` VARCHAR(255) NOT NULL,
    `profile_img` VARCHAR(255) NOT NULL,
    `atocom` INTEGER NOT NULL,
    `hpv` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `mcode_3` (`mcode`),
    INDEX `mcode` (`mcode`),
    INDEX `name_t` (`name_t`),
    INDEX `upa_code` (`upa_code`),
    INDEX `sp_code` (`sp_code`),
    INDEX `pos_cur` (`pos_cur`),
    INDEX `pos_cur2` (`pos_cur2`),
    INDEX `name_b` (`name_b`),
    INDEX `pos_cur1` (`pos_cur1`),
    INDEX `id` (`id`, `exp_date`),
    INDEX `mcode_2` (`mcode`, `upa_code`, `lr`),
    INDEX `pos_cur_2` (`pos_cur`, `status_terminate`, `locationbase`),
    INDEX `hpv` (`hpv`),
    INDEX `atocom` (`atocom`),
    INDEX `status_terminate` (`status_terminate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_member_20180525
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_member_20180525`;

CREATE TABLE `ali_member_20180525`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `name_e` VARCHAR(255) NOT NULL,
    `posid` VARCHAR(255) NOT NULL,
    `mdate` VARCHAR(255) NOT NULL,
    `birthday` VARCHAR(255) NOT NULL,
    `national` VARCHAR(255) NOT NULL,
    `id_tax` VARCHAR(255) NOT NULL,
    `id_card` VARCHAR(255) NOT NULL,
    `id_card_img` VARCHAR(250) NOT NULL,
    `id_card_img_date` DATETIME NOT NULL,
    `zip` VARCHAR(255) NOT NULL,
    `home_t` VARCHAR(255) NOT NULL,
    `office_t` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(255) NOT NULL,
    `mcode_acc` VARCHAR(255) NOT NULL,
    `bonusrec` VARCHAR(255) NOT NULL,
    `bankcode` VARCHAR(255) NOT NULL,
    `branch` VARCHAR(255) NOT NULL,
    `acc_type` VARCHAR(255) NOT NULL,
    `acc_no` VARCHAR(255) NOT NULL,
    `acc_no_img` VARCHAR(250) NOT NULL,
    `acc_no_img_date` DATETIME NOT NULL,
    `acc_name` VARCHAR(255) NOT NULL,
    `acc_prov` VARCHAR(255) NOT NULL,
    `sv_code` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_name` VARCHAR(255) NOT NULL,
    `sp_code2` VARCHAR(255) NOT NULL,
    `sp_name2` VARCHAR(255) NOT NULL,
    `upa_code` VARCHAR(255) NOT NULL,
    `upa_name` VARCHAR(255) NOT NULL,
    `lr` VARCHAR(255) NOT NULL,
    `complete` VARCHAR(255) NOT NULL,
    `compdate` VARCHAR(255) NOT NULL,
    `modate` VARCHAR(255) NOT NULL,
    `usercode` VARCHAR(255) NOT NULL,
    `name_b` VARCHAR(255) NOT NULL,
    `sex` VARCHAR(10) NOT NULL,
    `age` INTEGER(10) NOT NULL,
    `occupation` VARCHAR(50) NOT NULL,
    `status` INTEGER NOT NULL,
    `mar_name` VARCHAR(100) NOT NULL,
    `mar_age` INTEGER(10) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `beneficiaries` VARCHAR(100) NOT NULL,
    `relation` VARCHAR(50) NOT NULL,
    `districtId` VARCHAR(255) NOT NULL,
    `amphurId` VARCHAR(255) NOT NULL,
    `provinceId` VARCHAR(255) NOT NULL,
    `fax` VARCHAR(20) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `oid` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur1` VARCHAR(255) NOT NULL,
    `pos_cur2` VARCHAR(255) NOT NULL,
    `pos_cur3` VARCHAR(255) NOT NULL,
    `pos_cur4` VARCHAR(255) NOT NULL,
    `pos_cur_tmp` VARCHAR(255) NOT NULL,
    `rpos_cur4` INTEGER NOT NULL,
    `pos_cur3_date` DATE NOT NULL,
    `memdesc` VARCHAR(40) NOT NULL,
    `cmp` VARCHAR(10) NOT NULL,
    `cmp2` VARCHAR(255) NOT NULL,
    `cmp3` VARCHAR(255) NOT NULL,
    `ccmp` VARCHAR(255) NOT NULL,
    `ccmp2` VARCHAR(255) NOT NULL,
    `ccmp3` VARCHAR(255) NOT NULL,
    `address` TEXT NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `building` VARCHAR(255) NOT NULL,
    `village` VARCHAR(255) NOT NULL,
    `soi` VARCHAR(255) NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `eatoship` DECIMAL(15,2) NOT NULL,
    `ecom` DECIMAL(15,2) NOT NULL,
    `bmdate1` VARCHAR(255) NOT NULL,
    `bmdate2` VARCHAR(255) NOT NULL,
    `bmdate3` VARCHAR(255) NOT NULL,
    `cbmdate1` VARCHAR(255) NOT NULL,
    `cbmdate2` VARCHAR(255) NOT NULL,
    `cbmdate3` VARCHAR(255) NOT NULL,
    `online` INTEGER NOT NULL,
    `cname_f` VARCHAR(255) NOT NULL,
    `cname_t` VARCHAR(255) NOT NULL,
    `cname_e` VARCHAR(255) NOT NULL,
    `cname_b` VARCHAR(255) NOT NULL,
    `cbirthday` VARCHAR(255) NOT NULL,
    `cnational` VARCHAR(255) NOT NULL,
    `cid_tax` VARCHAR(255) NOT NULL,
    `cid_card` VARCHAR(255) NOT NULL,
    `caddress` TEXT NOT NULL,
    `cbuilding` VARCHAR(255) NOT NULL,
    `cvillage` VARCHAR(255) NOT NULL,
    `cstreet` VARCHAR(255) NOT NULL,
    `csoi` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `chome_t` VARCHAR(255) NOT NULL,
    `coffice_t` VARCHAR(255) NOT NULL,
    `cmobile` VARCHAR(255) NOT NULL,
    `cfax` VARCHAR(255) NOT NULL,
    `csex` VARCHAR(255) NOT NULL,
    `cemail` VARCHAR(255) NOT NULL,
    `cdistrictId` VARCHAR(255) NOT NULL,
    `camphurId` VARCHAR(255) NOT NULL,
    `cprovinceId` VARCHAR(255) NOT NULL,
    `iname_f` VARCHAR(255) NOT NULL,
    `iname_t` VARCHAR(255) NOT NULL,
    `irelation` VARCHAR(255) NOT NULL,
    `iphone` VARCHAR(255) NOT NULL,
    `iid_card` VARCHAR(255) NOT NULL,
    `status_doc` INTEGER NOT NULL,
    `status_expire` INTEGER NOT NULL,
    `status_terminate` INTEGER NOT NULL,
    `terminate_date` DATETIME NOT NULL,
    `status_suspend` INTEGER NOT NULL,
    `suspend_date` DATETIME NOT NULL,
    `status_blacklist` INTEGER NOT NULL,
    `status_ato` INTEGER NOT NULL,
    `sletter` INTEGER NOT NULL,
    `sinv_code` VARCHAR(255) NOT NULL,
    `txtoption` TEXT NOT NULL,
    `setregis` INTEGER DEFAULT 0 NOT NULL,
    `slr` VARCHAR(11) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `cid_mobile` VARCHAR(255) NOT NULL,
    `bewallet` DECIMAL(15,2) NOT NULL,
    `bvoucher` DECIMAL(15,2) NOT NULL,
    `voucher` DECIMAL(15,2) NOT NULL,
    `manager` VARCHAR(255) NOT NULL,
    `mtype` INTEGER NOT NULL,
    `mtype1` INTEGER(2) NOT NULL,
    `mtype2` INTEGER(2) NOT NULL,
    `mvat` INTEGER NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    `exp_date` DATE NOT NULL,
    `head_code` VARCHAR(255) NOT NULL,
    `pv_l` DECIMAL(15,2) NOT NULL,
    `pv_c` DECIMAL(15,2) NOT NULL,
    `hpv_l` DECIMAL(15,2) NOT NULL,
    `hpv_c` DECIMAL(15,2) NOT NULL,
    `pv_l_nextmonth` DECIMAL(15,2) NOT NULL,
    `pv_c_nextmonth` DECIMAL(15,2) NOT NULL,
    `pv_l_lastmonth1` DECIMAL(15,2) NOT NULL,
    `pv_c_lastmonth1` DECIMAL(15,2) NOT NULL,
    `pv_l_lastmonth2` DECIMAL(15,2) NOT NULL,
    `pv_c_lastmonth2` DECIMAL(15,2) NOT NULL,
    `rcode_star` INTEGER NOT NULL,
    `bunit` INTEGER NOT NULL,
    `province` VARCHAR(11) NOT NULL,
    `line_id` VARCHAR(255) NOT NULL,
    `facebook_name` VARCHAR(255) NOT NULL,
    `type_com` INTEGER NOT NULL,
    `exp_pos` DATE NOT NULL,
    `exp_pos_60` DATE NOT NULL,
    `trip_private` DECIMAL(15,2) NOT NULL,
    `trip_team` DECIMAL(15,2) NOT NULL,
    `myfile1` VARCHAR(255) NOT NULL,
    `myfile2` VARCHAR(255) NOT NULL,
    `cline_id` VARCHAR(255) NOT NULL,
    `cfacebook_name` VARCHAR(255) NOT NULL,
    `profile_img` VARCHAR(255) NOT NULL,
    `atocom` INTEGER NOT NULL,
    `hpv` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `mcode_3` (`mcode`),
    INDEX `mcode` (`mcode`),
    INDEX `name_t` (`name_t`),
    INDEX `upa_code` (`upa_code`),
    INDEX `sp_code` (`sp_code`),
    INDEX `pos_cur` (`pos_cur`),
    INDEX `pos_cur2` (`pos_cur2`),
    INDEX `name_b` (`name_b`),
    INDEX `pos_cur1` (`pos_cur1`),
    INDEX `id` (`id`, `exp_date`),
    INDEX `mcode_2` (`mcode`, `upa_code`, `lr`),
    INDEX `pos_cur_2` (`pos_cur`, `status_terminate`, `locationbase`),
    INDEX `hpv` (`hpv`),
    INDEX `atocom` (`atocom`),
    INDEX `status_terminate` (`status_terminate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_member_show
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_member_show`;

CREATE TABLE `ali_member_show`
(
    `mcode` VARCHAR(255) NOT NULL,
    `mdate` DATE NOT NULL,
    `id` BIGINT(22) NOT NULL AUTO_INCREMENT,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fast` DECIMAL(15,2) NOT NULL,
    `weakstrong` DECIMAL(15,2) NOT NULL,
    `matching` DECIMAL(15,2) NOT NULL,
    `upa_code` VARCHAR(255) NOT NULL,
    `upa_name` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_name` VARCHAR(255) NOT NULL,
    `lv` INTEGER NOT NULL,
    `lr` INTEGER NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur1` VARCHAR(255) NOT NULL,
    `pos_cur2` VARCHAR(20) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `totpv` DECIMAL(15,2) NOT NULL,
    `thismonth` DECIMAL(15,2) NOT NULL,
    `nextmonth` DECIMAL(15,2) NOT NULL,
    `sadate` DATE NOT NULL,
    `okok` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `uid` (`uid`),
    INDEX `lr` (`lr`, `uid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_member_tmp
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_member_tmp`;

CREATE TABLE `ali_member_tmp`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `transtype` INTEGER NOT NULL,
    `paytype` INTEGER NOT NULL,
    `paydate` DATETIME NOT NULL,
    `credittype` INTEGER NOT NULL,
    `sendtype` INTEGER NOT NULL,
    `cstreet` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255),
    `name_t` VARCHAR(255),
    `name_e` VARCHAR(255),
    `posid` CHAR(2),
    `mdate` VARCHAR(255),
    `birthday` VARCHAR(255),
    `national` VARCHAR(20),
    `id_tax` VARCHAR(10),
    `id_card` VARCHAR(20),
    `zip` VARCHAR(5),
    `home_t` VARCHAR(20),
    `office_t` VARCHAR(20),
    `mobile` VARCHAR(20),
    `mcode_acc` VARCHAR(7),
    `bonusrec` VARCHAR(1),
    `bankcode` VARCHAR(2),
    `branch` VARCHAR(20),
    `acc_type` VARCHAR(20),
    `acc_no` VARCHAR(20),
    `acc_name` VARCHAR(255),
    `acc_prov` VARCHAR(20),
    `sv_code` VARCHAR(20),
    `sp_code` VARCHAR(255),
    `sp_name` VARCHAR(255),
    `upa_code` VARCHAR(255),
    `upa_name` VARCHAR(255),
    `lr` INTEGER,
    `complete` VARCHAR(1),
    `compdate` VARCHAR(255),
    `modate` VARCHAR(255),
    `usercode` VARCHAR(3),
    `name_b` VARCHAR(255) NOT NULL,
    `sex` VARCHAR(10) NOT NULL,
    `age` INTEGER(10) NOT NULL,
    `occupation` VARCHAR(50) NOT NULL,
    `status` INTEGER NOT NULL,
    `mar_name` VARCHAR(100) NOT NULL,
    `mar_age` INTEGER(10) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `beneficiaries` VARCHAR(100) NOT NULL,
    `relation` VARCHAR(50) NOT NULL,
    `districtId` INTEGER(10) NOT NULL,
    `amphurId` INTEGER(10) NOT NULL,
    `provinceId` INTEGER(10) NOT NULL,
    `fax` VARCHAR(20) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur1` VARCHAR(255) DEFAULT 'S' NOT NULL,
    `pos_cur2` VARCHAR(255) NOT NULL,
    `pos_cur3` VARCHAR(255) NOT NULL,
    `pos_cur4` VARCHAR(255) NOT NULL,
    `rpos_cur4` INTEGER NOT NULL,
    `memdesc` VARCHAR(40) NOT NULL,
    `cmp` VARCHAR(10) NOT NULL,
    `cmp2` VARCHAR(255) NOT NULL,
    `cmp3` VARCHAR(255) NOT NULL,
    `ccmp` VARCHAR(255) NOT NULL,
    `ccmp2` VARCHAR(255) NOT NULL,
    `ccmp3` VARCHAR(255) NOT NULL,
    `address` TEXT NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `building` VARCHAR(255) NOT NULL,
    `village` VARCHAR(255) NOT NULL,
    `soi` VARCHAR(255) NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `bmdate1` VARCHAR(255) NOT NULL,
    `bmdate2` VARCHAR(255) NOT NULL,
    `bmdate3` VARCHAR(255) NOT NULL,
    `cbmdate1` VARCHAR(255) NOT NULL,
    `cbmdate2` VARCHAR(255) NOT NULL,
    `cbmdate3` VARCHAR(255) NOT NULL,
    `online` INTEGER NOT NULL,
    `cname_f` VARCHAR(255) NOT NULL,
    `cname_t` VARCHAR(255) NOT NULL,
    `cname_e` VARCHAR(255) NOT NULL,
    `cname_b` VARCHAR(255) NOT NULL,
    `cbirthday` VARCHAR(255) NOT NULL,
    `cnational` VARCHAR(255) NOT NULL,
    `cid_tax` VARCHAR(255) NOT NULL,
    `cid_card` VARCHAR(255) NOT NULL,
    `caddress` TEXT NOT NULL,
    `cbuilding` VARCHAR(255) NOT NULL,
    `cvillage` VARCHAR(255) NOT NULL,
    `csoi` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `chome_t` VARCHAR(255) NOT NULL,
    `coffice_t` VARCHAR(255) NOT NULL,
    `cmobile` VARCHAR(255) NOT NULL,
    `cfax` VARCHAR(255) NOT NULL,
    `csex` VARCHAR(255) NOT NULL,
    `cemail` VARCHAR(255) NOT NULL,
    `cdistrictId` INTEGER NOT NULL,
    `camphurId` INTEGER NOT NULL,
    `cprovinceId` INTEGER NOT NULL,
    `iname_f` VARCHAR(255) NOT NULL,
    `iname_t` VARCHAR(255) NOT NULL,
    `irelation` VARCHAR(255) NOT NULL,
    `iphone` VARCHAR(255) NOT NULL,
    `iid_card` VARCHAR(255) NOT NULL,
    `status_doc` INTEGER NOT NULL,
    `status_expire` INTEGER NOT NULL,
    `status_terminate` INTEGER NOT NULL,
    `terminate_date` DATETIME NOT NULL,
    `status_suspend` INTEGER NOT NULL,
    `suspend_date` DATETIME NOT NULL,
    `status_blacklist` INTEGER NOT NULL,
    `status_ato` INTEGER NOT NULL,
    `sletter` INTEGER NOT NULL,
    `sinv_code` VARCHAR(255) NOT NULL,
    `txtoption` TEXT NOT NULL,
    `mcode_ref` VARCHAR(255) NOT NULL,
    `cancel` INTEGER NOT NULL,
    `sbook` INTEGER NOT NULL,
    `sbinv_code` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `cid_mobile` VARCHAR(255) NOT NULL,
    `bewallet` DECIMAL(15,2) NOT NULL,
    `bvoucher` DECIMAL(15,2) NOT NULL,
    `voucher` DECIMAL(15,2) NOT NULL,
    `manager` VARCHAR(255) NOT NULL,
    `mtype` VARCHAR(255) NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `mcode_2` (`mcode`),
    INDEX `mcode` (`mcode`),
    INDEX `name_t` (`name_t`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_mm
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_mm`;

CREATE TABLE `ali_mm`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) DEFAULT 0 NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `upa_code` VARCHAR(255),
    `lr` INTEGER(10),
    `pv` DECIMAL(15,2) DEFAULT 0.00,
    `gpv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` CHAR(10) NOT NULL,
    `npos` CHAR(10) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `rcode` (`rcode`),
    INDEX `mcode` (`mcode`, `rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_mmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_mmbonus`;

CREATE TABLE `ali_mmbonus`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `tot_pv` DECIMAL(12,5) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `bonus` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pstatus` INTEGER NOT NULL,
    `prcode` INTEGER NOT NULL,
    `pmonth` VARCHAR(255) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `chk_status` INTEGER(2) NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_mmobile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_mmobile`;

CREATE TABLE `ali_mmobile`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` CHAR(7),
    `rcode` INTEGER(5),
    `dl` DECIMAL(15,2),
    `total` DECIMAL(15,2),
    `tax` DECIMAL(15,2),
    `coupon` DECIMAL(15,2),
    `paydate` DATE,
    `flag` CHAR,
    `sync` CHAR,
    `web` CHAR,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_mmodesc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_mmodesc`;

CREATE TABLE `ali_mmodesc`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` CHAR(7),
    `rcode` INTEGER(5),
    `cmcode` CHAR(7),
    `level` DECIMAL(15,2),
    `total` DECIMAL(15,2),
    `flag` CHAR,
    `csano` INTEGER(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_moround
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_moround`;

CREATE TABLE `ali_moround`
(
    `rid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` VARCHAR(5),
    `rdate` DATE,
    `fsano` VARCHAR(7),
    `tsano` VARCHAR(7),
    `paydate` DATE,
    `calc` VARCHAR(1),
    `remark` VARCHAR(50),
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`),
    INDEX `rcode_2` (`rcode`, `calc`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_mpv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_mpv`;

CREATE TABLE `ali_mpv`
(
    `bid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `mcode` VARCHAR(255),
    `total_pv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` VARCHAR(5),
    `npos` VARCHAR(5),
    PRIMARY KEY (`bid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_msaled
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_msaled`;

CREATE TABLE `ali_msaled`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(7),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(100),
    `unit` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(7),
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `fv` DECIMAL(15,2) NOT NULL,
    `weight` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    `bprice` DECIMAL(15,2) NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_msaleh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_msaleh`;

CREATE TABLE `ali_msaleh`
(
    `sano` VARCHAR(255),
    `sano1` BIGINT(22) NOT NULL,
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255),
    `inv_ref` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `tot_weight` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` INTEGER DEFAULT 0,
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtFuture` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtTransfer` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `ewallet` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit1` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit2` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtCredit3` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtInternet` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtDiscount` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `txtOther` DECIMAL(15,2) DEFAULT 0.00 NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `discount` VARCHAR(255) NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `pay_type` VARCHAR(255) NOT NULL,
    `hcancel` INTEGER NOT NULL,
    `caddress` TEXT NOT NULL,
    `cdistrictId` VARCHAR(255) NOT NULL,
    `camphurId` VARCHAR(255) NOT NULL,
    `cprovinceId` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `sender` INTEGER NOT NULL,
    `sender_date` DATE NOT NULL,
    `receive` INTEGER NOT NULL,
    `receive_date` DATE NOT NULL,
    `asend` INTEGER NOT NULL,
    `ato_type` INTEGER NOT NULL,
    `ato_id` INTEGER NOT NULL,
    `online` INTEGER NOT NULL,
    `hpv` DECIMAL(15,2) NOT NULL,
    `htotal` DECIMAL(15,2) NOT NULL,
    `hdate` DATE NOT NULL,
    `scheck` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `rcode` INTEGER NOT NULL,
    `bmcauto` INTEGER NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `cname` VARCHAR(255) NOT NULL,
    `cmobile` VARCHAR(255) NOT NULL,
    `uid_sender` VARCHAR(255) NOT NULL,
    `uid_receive` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(255) NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`),
    INDEX `sadate_3` (`sadate`, `mcode`, `sa_type`, `cancel`),
    INDEX `sadate_4` (`sadate`, `mcode`, `tot_bv`, `sa_type`, `cancel`),
    INDEX `sadate_5` (`sadate`, `sa_type`, `cancel`),
    INDEX `sadate_6` (`sadate`, `mcode`, `sa_type`, `cancel`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_my_pv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_my_pv`;

CREATE TABLE `ali_my_pv`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(5) NOT NULL,
    `pv_exp` DECIMAL(15,2) NOT NULL,
    `pv` DECIMAL(15,2) NOT NULL,
    `status` VARCHAR(1) NOT NULL,
    `pmonth` VARCHAR(6) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_nation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_nation`;

CREATE TABLE `ali_nation`
(
    `nation` VARCHAR(255) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_news
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_news`;

CREATE TABLE `ali_news`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `head` VARCHAR(255),
    `body` TEXT NOT NULL,
    `dates` DATE,
    `status` enum('Y','N') NOT NULL,
    `popup` enum('Y','N') NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ombonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ombonus`;

CREATE TABLE `ali_ombonus`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `bonus` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `adjust` DECIMAL(15,2) NOT NULL,
    `pstatus` INTEGER NOT NULL,
    `prcode` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_oon
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_oon`;

CREATE TABLE `ali_oon`
(
    `oon` INTEGER NOT NULL,
    `sms_credits` INTEGER NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ostockd
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ostockd`;

CREATE TABLE `ali_ostockd`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` INTEGER,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `inv_coden` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `inv_refn` VARCHAR(255) NOT NULL,
    `rccode` VARCHAR(255) NOT NULL,
    `stockist` VARCHAR(255) NOT NULL,
    `pcode` VARCHAR(255),
    `pdesc` VARCHAR(40),
    `unit` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `cost` DECIMAL(15,2) NOT NULL,
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    `ctax` INTEGER NOT NULL,
    `group_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ostockh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ostockh`;

CREATE TABLE `ali_ostockh`
(
    `sano` VARCHAR(255),
    `sano1` VARCHAR(255) NOT NULL,
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255),
    `inv_coden` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `inv_refn` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `sa_mtype` VARCHAR(255) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `uid_ref` VARCHAR(255) NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `sender` VARCHAR(255) NOT NULL,
    `sender_date` DATETIME NOT NULL,
    `receive` INTEGER(255) NOT NULL,
    `receive_date` DATETIME NOT NULL,
    `uid_receive` VARCHAR(255) NOT NULL,
    `status` INTEGER NOT NULL,
    `print` INTEGER NOT NULL,
    `rccode` VARCHAR(255) NOT NULL,
    `update_date` DATETIME NOT NULL,
    `mapping_code` VARCHAR(255) NOT NULL,
    `rrcode` VARCHAR(255) NOT NULL,
    `auto` VARCHAR(10),
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_package_invcode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_package_invcode`;

CREATE TABLE `ali_package_invcode`
(
    `pcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_pairbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_pairbonus`;

CREATE TABLE `ali_pairbonus`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `pair` DECIMAL(15,0) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `bonus` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_payment
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_payment`;

CREATE TABLE `ali_payment`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `payment_name` VARCHAR(255) NOT NULL,
    `order_by` INTEGER(2) NOT NULL,
    `payment_ref` VARCHAR(255) NOT NULL,
    `rep_column` VARCHAR(2555) NOT NULL,
    `payment_column` VARCHAR(255) NOT NULL,
    `shows` INTEGER(1) NOT NULL,
    `shows_ewallet` INTEGER(1) NOT NULL,
    `shows_mem_edit` INTEGER(1) NOT NULL,
    `shows_member` INTEGER(1) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_payment_branch
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_payment_branch`;

CREATE TABLE `ali_payment_branch`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `inv_code` VARCHAR(255) NOT NULL,
    `payment_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_payment_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_payment_type`;

CREATE TABLE `ali_payment_type`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `payment_id` INTEGER(10) NOT NULL,
    `pay_desc` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `shows` INTEGER(1) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mapping_code` (`shows`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_pc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_pc`;

CREATE TABLE `ali_pc`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `mposi` VARCHAR(10),
    `upa_code` VARCHAR(255),
    `bposi` VARCHAR(10),
    `level` DECIMAL(15,0) NOT NULL,
    `gen` DECIMAL(15,0) NOT NULL,
    `btype` VARCHAR(10),
    `pv` DECIMAL(15,2) NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_pmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_pmbonus`;

CREATE TABLE `ali_pmbonus`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `status` VARCHAR(2) NOT NULL,
    `pv` DECIMAL(15,2) NOT NULL,
    `pvb` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `mdate` DATE NOT NULL,
    `month_pv` VARCHAR(10) NOT NULL,
    `mpos` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `status` (`status`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_poschange
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_poschange`;

CREATE TABLE `ali_poschange`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) DEFAULT '' NOT NULL,
    `pos_before` VARCHAR(11),
    `pos_after` VARCHAR(11),
    `date_change` DATE,
    `date_update` DATE NOT NULL,
    `type` INTEGER,
    `uid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_position
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_position`;

CREATE TABLE `ali_position`
(
    `posid` INTEGER(2) NOT NULL AUTO_INCREMENT,
    `posshort` VARCHAR(5),
    `posname` VARCHAR(255),
    `posimg` VARCHAR(50),
    `posavt` VARCHAR(255) NOT NULL,
    `posutab` VARCHAR(10),
    `posdtab` VARCHAR(10),
    `posdesc` CHAR(50),
    `ud` CHAR,
    PRIMARY KEY (`posid`),
    UNIQUE INDEX `posname` (`posname`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_position2
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_position2`;

CREATE TABLE `ali_position2`
(
    `posid` INTEGER(2) NOT NULL AUTO_INCREMENT,
    `posshort` VARCHAR(3),
    `posname` VARCHAR(255),
    `posimg` VARCHAR(50),
    `posutab` VARCHAR(10),
    `posdtab` VARCHAR(10),
    `posdesc` CHAR(50),
    `ud` CHAR,
    PRIMARY KEY (`posid`),
    UNIQUE INDEX `posname` (`posname`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_pospv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_pospv`;

CREATE TABLE `ali_pospv`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `mcode` VARCHAR(255),
    `opos` VARCHAR(255),
    `npos` VARCHAR(255),
    `name_t` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255),
    `upa_code` VARCHAR(255) NOT NULL,
    `lr` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`aid`),
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_pospv_tmp
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_pospv_tmp`;

CREATE TABLE `ali_pospv_tmp`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `mcode` VARCHAR(255),
    `opos` VARCHAR(255),
    `npos` VARCHAR(255),
    `name_t` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255),
    `lr` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_ppv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_ppv`;

CREATE TABLE `ali_ppv`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `mcode` VARCHAR(255),
    `total_pv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` VARCHAR(5),
    `npos` VARCHAR(5),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_product`;

CREATE TABLE `ali_product`
(
    `pcode` VARCHAR(20) DEFAULT '' NOT NULL,
    `group_id` INTEGER NOT NULL,
    `pdesc` VARCHAR(100),
    `unit` VARCHAR(10),
    `price` INTEGER,
    `vat` DECIMAL(15,2) NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `personel_price` DECIMAL(15,2) NOT NULL,
    `customer_price` DECIMAL(15,2) NOT NULL,
    `pv` INTEGER,
    `bv` DECIMAL(10,2),
    `fv` DECIMAL(10,2) NOT NULL,
    `qty` INTEGER,
    `ud` CHAR NOT NULL,
    `sync` VARCHAR(1),
    `web` VARCHAR(1),
    `st` INTEGER(1),
    `sst` INTEGER NOT NULL,
    `bf` INTEGER NOT NULL,
    `sh` CHAR DEFAULT '',
    `pcode_stock` VARCHAR(20),
    `sup_code` VARCHAR(255) NOT NULL,
    `weight` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `barcode` VARCHAR(255) NOT NULL,
    `picture` VARCHAR(255) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `sa_type_a` INTEGER NOT NULL,
    `sa_type_h` INTEGER NOT NULL,
    `qtyr` INTEGER NOT NULL,
    `ato` INTEGER NOT NULL,
    `product_img` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`pcode`),
    INDEX `pcode` (`pcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_product_invcode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_product_invcode`;

CREATE TABLE `ali_product_invcode`
(
    `pcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_product_invent
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_product_invent`;

CREATE TABLE `ali_product_invent`
(
    `pcode` VARCHAR(255) NOT NULL,
    `qty` INTEGER,
    `qtys` INTEGER NOT NULL,
    `qtyr` INTEGER NOT NULL,
    `qtyd` INTEGER NOT NULL,
    `ud` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`pcode`,`inv_code`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_product_invent_log
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_product_invent_log`;

CREATE TABLE `ali_product_invent_log`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sadate` DATE NOT NULL,
    `pcode` VARCHAR(255) DEFAULT '' NOT NULL,
    `qty` DECIMAL(5,0),
    `in_qty` INTEGER NOT NULL,
    `out_qty` INTEGER NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `check_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `pcode` (`pcode`),
    INDEX `sadate` (`sadate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_product_invent_log_r
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_product_invent_log_r`;

CREATE TABLE `ali_product_invent_log_r`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sadate` DATE NOT NULL,
    `pcode` VARCHAR(255) DEFAULT '' NOT NULL,
    `qty` DECIMAL(5,0),
    `in_qty` INTEGER NOT NULL,
    `out_qty` INTEGER NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `check_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `pcode` (`pcode`),
    INDEX `sadate` (`sadate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_product_package
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_product_package`;

CREATE TABLE `ali_product_package`
(
    `pcode` VARCHAR(20) DEFAULT '' NOT NULL,
    `sa_type` VARCHAR(2) NOT NULL,
    `pdesc` VARCHAR(100),
    `unit` VARCHAR(10),
    `price` DECIMAL(10,2),
    `bprice` DECIMAL(15,2) NOT NULL,
    `customer_price` DECIMAL(15,2) NOT NULL,
    `pv` DECIMAL(10,2),
    `special_pv` DECIMAL(15,2) NOT NULL,
    `bv` DECIMAL(10,2),
    `fv` DECIMAL(10,2) NOT NULL,
    `weight` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(5,0),
    `st` INTEGER NOT NULL,
    `sst` INTEGER NOT NULL,
    `bf` INTEGER NOT NULL,
    `ato` INTEGER NOT NULL,
    `ud` CHAR NOT NULL,
    `locationbase` VARCHAR(255) NOT NULL,
    `barcode` VARCHAR(255) NOT NULL,
    `picture` VARCHAR(255) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_mb` INTEGER NOT NULL,
    `pos_su` INTEGER NOT NULL,
    `pos_ex` INTEGER NOT NULL,
    `pos_br` INTEGER NOT NULL,
    `pos_si` INTEGER NOT NULL,
    `pos_go` INTEGER NOT NULL,
    `pos_pl` INTEGER NOT NULL,
    `pos_pe` INTEGER NOT NULL,
    `pos_ru` INTEGER NOT NULL,
    `pos_sa` INTEGER NOT NULL,
    `pos_em` INTEGER NOT NULL,
    `pos_di` INTEGER NOT NULL,
    `pos_bd` INTEGER NOT NULL,
    `pos_bl` INTEGER NOT NULL,
    `pos_cd` INTEGER NOT NULL,
    `pos_id` INTEGER NOT NULL,
    `pos_pd` INTEGER NOT NULL,
    `pos_rd` INTEGER NOT NULL,
    `vat` INTEGER NOT NULL,
    PRIMARY KEY (`pcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_product_package1
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_product_package1`;

CREATE TABLE `ali_product_package1`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `package` VARCHAR(20) NOT NULL,
    `pcode` VARCHAR(20) NOT NULL,
    `pdesc` VARCHAR(100) NOT NULL,
    `qty` INTEGER NOT NULL,
    `mdate` DATE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_productgroup
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_productgroup`;

CREATE TABLE `ali_productgroup`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `groupname` VARCHAR(250) NOT NULL,
    `bf_ref` VARCHAR(25) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_promotion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_promotion`;

CREATE TABLE `ali_promotion`
(
    `rid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `name` VARCHAR(255) NOT NULL,
    `rdate` DATE,
    `calc` VARCHAR(1),
    `remark` VARCHAR(50),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `rtype` INTEGER NOT NULL,
    `firstseat` DECIMAL(15,2) NOT NULL,
    `secondseat` DECIMAL(15,2) NOT NULL,
    `rincrease` DECIMAL(15,2) NOT NULL,
    `rurl` TEXT NOT NULL,
    `calc_date` DATETIME NOT NULL,
    `tshow` INTEGER NOT NULL,
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_pround
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_pround`;

CREATE TABLE `ali_pround`
(
    `rid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `rdate` DATE,
    `fsano` VARCHAR(7),
    `tsano` VARCHAR(7),
    `paydate` DATE,
    `calc` VARCHAR(1),
    `remark` VARCHAR(50),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `fpdate` DATE NOT NULL,
    `tpdate` DATE NOT NULL,
    PRIMARY KEY (`rid`),
    INDEX `rcode` (`rcode`),
    INDEX `paydate` (`paydate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_rc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_rc`;

CREATE TABLE `ali_rc`
(
    `bid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `mposi` VARCHAR(10),
    `upa_code` VARCHAR(255),
    `bposi` VARCHAR(10),
    `level` DECIMAL(15,0) NOT NULL,
    `gen` DECIMAL(15,0) NOT NULL,
    `btype` VARCHAR(10),
    `pv` DECIMAL(15,2) NOT NULL,
    `percer` DECIMAL(15,2) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `checkcheck` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`bid`),
    INDEX `mcode` (`mcode`, `upa_code`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_rccode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_rccode`;

CREATE TABLE `ali_rccode`
(
    `rccode` VARCHAR(255) NOT NULL,
    `rccode_desc` VARCHAR(255) NOT NULL,
    `mapping_code` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_report_cron
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_report_cron`;

CREATE TABLE `ali_report_cron`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `start_cron_cal` DATETIME NOT NULL,
    `finish_cron_cal` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_report_member
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_report_member`;

CREATE TABLE `ali_report_member`
(
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `mdate` DATE NOT NULL,
    `expdate` DATE NOT NULL,
    `pvdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur4` VARCHAR(255) NOT NULL,
    `pos_cur2` VARCHAR(255) NOT NULL,
    `pos_cur1` VARCHAR(255) NOT NULL,
    `new_member` INTEGER NOT NULL,
    `new_sup` INTEGER NOT NULL,
    `new_ex` INTEGER NOT NULL,
    `sup_ex` INTEGER NOT NULL,
    `pvmonth` INTEGER NOT NULL,
    `auto_tot` DECIMAL(15,2) NOT NULL,
    `pv_l` INTEGER NOT NULL,
    `pv_c` INTEGER NOT NULL,
    `tpos_cur` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_name` VARCHAR(255) NOT NULL,
    `lr` INTEGER NOT NULL,
    `report1` VARCHAR(255) NOT NULL,
    `status_ato` VARCHAR(255) NOT NULL,
    `status_member` VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_report_point
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_report_point`;

CREATE TABLE `ali_report_point`
(
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `point` INTEGER NOT NULL,
    `monthpv` VARCHAR(255) NOT NULL,
    `carry_l` INTEGER NOT NULL,
    `carry_c` INTEGER NOT NULL,
    `ro_l` INTEGER NOT NULL,
    `ro_c` INTEGER NOT NULL,
    `all_l` INTEGER NOT NULL,
    `all_c` INTEGER NOT NULL,
    `allpv` INTEGER NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `new_sponsor` INTEGER NOT NULL,
    `new_sup` INTEGER NOT NULL,
    `new_ex` INTEGER NOT NULL,
    `sup_ex` INTEGER NOT NULL,
    `travelpoint` DECIMAL(15,2) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_report_point1
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_report_point1`;

CREATE TABLE `ali_report_point1`
(
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `point` INTEGER NOT NULL,
    `monthpv` VARCHAR(255) NOT NULL,
    `carry_l` INTEGER NOT NULL,
    `carry_c` INTEGER NOT NULL,
    `ro_l` INTEGER NOT NULL,
    `ro_c` INTEGER NOT NULL,
    `all_l` INTEGER NOT NULL,
    `all_c` INTEGER NOT NULL,
    `allpv` INTEGER NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `new_sponsor` INTEGER NOT NULL,
    `new_sup` INTEGER NOT NULL,
    `new_ex` INTEGER NOT NULL,
    `sup_ex` INTEGER NOT NULL,
    `travelpoint` DECIMAL(15,2) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_report_promotion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_report_promotion`;

CREATE TABLE `ali_report_promotion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_name` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur2` VARCHAR(255) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `tot_pv` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_report_promotion1
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_report_promotion1`;

CREATE TABLE `ali_report_promotion1`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `sp_code` VARCHAR(255) NOT NULL,
    `sp_name` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur2` VARCHAR(255) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `tot_pv` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_rsaled
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_rsaled`;

CREATE TABLE `ali_rsaled`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(7),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `pcode` VARCHAR(255),
    `pdesc` VARCHAR(40),
    `mcode` VARCHAR(7),
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `fv` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_rsaleh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_rsaleh`;

CREATE TABLE `ali_rsaleh`
(
    `sano` BIGINT(44),
    `sano1` BIGINT(22) NOT NULL,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `inv_ref` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(20),
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` INTEGER DEFAULT 0,
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtFuture` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtTransfer` VARCHAR(255) DEFAULT '0' NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `txtCredit1` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit2` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit3` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtInternet` VARCHAR(255) NOT NULL,
    `txtDiscount` VARCHAR(255) NOT NULL,
    `txtOther` VARCHAR(255) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `asend` INTEGER NOT NULL,
    `asend_date` DATE NOT NULL,
    `discount` VARCHAR(255) NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_rscode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_rscode`;

CREATE TABLE `ali_rscode`
(
    `rccode` VARCHAR(255) NOT NULL,
    `rccode_desc` VARCHAR(255) NOT NULL,
    `mapping_code` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_sale_ewallet
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_sale_ewallet`;

CREATE TABLE `ali_sale_ewallet`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `yokma` DECIMAL(15,2) NOT NULL,
    `buy` DECIMAL(15,2) NOT NULL,
    `used` DECIMAL(15,2) NOT NULL,
    `balance` DECIMAL(15,2) NOT NULL,
    `fdate` VARCHAR(255) NOT NULL,
    `tdate` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_sale_hold
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_sale_hold`;

CREATE TABLE `ali_sale_hold`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `yokma` DECIMAL(15,2) NOT NULL,
    `buy` DECIMAL(15,2) NOT NULL,
    `used` DECIMAL(15,2) NOT NULL,
    `balance` DECIMAL(15,2) NOT NULL,
    `fdate` VARCHAR(255) NOT NULL,
    `tdate` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_sc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_sc`;

CREATE TABLE `ali_sc`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `mpos` VARCHAR(10),
    `upa_code` VARCHAR(255),
    `total` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_sending
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_sending`;

CREATE TABLE `ali_sending`
(
    `sid` INTEGER NOT NULL AUTO_INCREMENT,
    `locationbase` VARCHAR(255) NOT NULL,
    `minpv` INTEGER NOT NULL,
    `maxpv` INTEGER NOT NULL,
    `minweight` DECIMAL(15,2) NOT NULL,
    `maxweight` DECIMAL(15,2) NOT NULL,
    `inbound-pcode` VARCHAR(255) NOT NULL,
    `outbound-pcode` VARCHAR(255) NOT NULL,
    `overweight-pcode` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`sid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_smbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_smbonus`;

CREATE TABLE `ali_smbonus`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `tax` DECIMAL(15,2) NOT NULL,
    `bonus` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `adjust` DECIMAL(15,2) NOT NULL,
    `pstatus` INTEGER NOT NULL,
    `prcode` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_sms
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_sms`;

CREATE TABLE `ali_sms`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(255) NOT NULL,
    `mobile_desc` TEXT NOT NULL,
    `mobile_date` VARCHAR(14) NOT NULL,
    `send_date` VARCHAR(14) NOT NULL,
    `mobile_status` VARCHAR(255) NOT NULL,
    `mobile_credits` VARCHAR(255) NOT NULL,
    `credit_balance` INTEGER NOT NULL,
    `recieve_date` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_special_point
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_special_point`;

CREATE TABLE `ali_special_point`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `vip_id` INTEGER(10) NOT NULL,
    `sadate` DATE NOT NULL,
    `mcode` VARCHAR(20) NOT NULL,
    `sa_type` CHAR(2) NOT NULL,
    `tot_pv` DECIMAL(10,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `heal_mouth` VARCHAR(6) NOT NULL,
    `ttime` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `sa_type` (`sa_type`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_special_point_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_special_point_group`;

CREATE TABLE `ali_special_point_group`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `vip_id` INTEGER(10) NOT NULL,
    `sadate` DATE,
    `mcode` VARCHAR(20),
    `sa_type` CHAR(2),
    `tot_pv` DECIMAL(10,2),
    `uid` INTEGER(255),
    `heal_mouth` VARCHAR(6),
    `ttime` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_sponsor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_sponsor`;

CREATE TABLE `ali_sponsor`
(
    `mcode` VARCHAR(7) NOT NULL,
    `sponsor` INTEGER NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_status`;

CREATE TABLE `ali_status`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `status` VARCHAR(2) NOT NULL,
    `pv` DECIMAL(15,2) NOT NULL,
    `pvb` INTEGER NOT NULL,
    `mdate` DATE NOT NULL,
    `sdate` DATE NOT NULL,
    `satype` VARCHAR(5) NOT NULL,
    `month_pv` VARCHAR(10) NOT NULL,
    `mpos` VARCHAR(255) NOT NULL,
    `realpos` VARCHAR(255) NOT NULL,
    `first_regis` INTEGER(1) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `status` (`status`),
    INDEX `mcode_2` (`mcode`, `mpos`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_stdesc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_stdesc`;

CREATE TABLE `ali_stdesc`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` CHAR(7),
    `rcode` INTEGER(5),
    `cmcode` CHAR(7),
    `level` DECIMAL(15,0),
    `total` DECIMAL(15,2),
    `flag` CHAR,
    `csano` INTEGER(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_stockcard_e
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_stockcard_e`;

CREATE TABLE `ali_stockcard_e`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `inv_action` VARCHAR(255) NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `sano_ref` VARCHAR(255) NOT NULL,
    `pcode` VARCHAR(255) NOT NULL,
    `pdesc` VARCHAR(255) NOT NULL,
    `in_amount` DECIMAL(15,2) NOT NULL,
    `out_amount` DECIMAL(15,2) NOT NULL,
    `sadate` DATE NOT NULL,
    `rdate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `rccode` VARCHAR(255) NOT NULL,
    `yokma` INTEGER NOT NULL,
    `balance` INTEGER NOT NULL,
    `price` DECIMAL(15,2) NOT NULL,
    `amount` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `action` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `inv_action` (`inv_action`, `pcode`, `sadate`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_stockcard_r
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_stockcard_r`;

CREATE TABLE `ali_stockcard_r`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `inv_action` VARCHAR(255) NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `sano_ref` VARCHAR(255) NOT NULL,
    `pcode` VARCHAR(255) NOT NULL,
    `pdesc` VARCHAR(255) NOT NULL,
    `in_qty` INTEGER NOT NULL,
    `in_price` DECIMAL(15,2) NOT NULL,
    `in_amount` DECIMAL(15,2) NOT NULL,
    `out_qty` INTEGER NOT NULL,
    `out_price` DECIMAL(15,2) NOT NULL,
    `out_amount` DECIMAL(15,2) NOT NULL,
    `sadate` DATE NOT NULL,
    `rdate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `rccode` VARCHAR(255) NOT NULL,
    `yokma` INTEGER NOT NULL,
    `balance` INTEGER NOT NULL,
    `price` DECIMAL(15,2) NOT NULL,
    `amount` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `action` VARCHAR(255) NOT NULL,
    `cancel` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `inv_action` (`inv_action`, `pcode`, `sadate`),
    INDEX `mcode` (`mcode`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_stockcard_s
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_stockcard_s`;

CREATE TABLE `ali_stockcard_s`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `inv_ref` VARCHAR(255) NOT NULL,
    `inv_action` VARCHAR(255) NOT NULL,
    `sano` VARCHAR(255) NOT NULL,
    `sano_ref` VARCHAR(255) NOT NULL,
    `pcode` VARCHAR(255) NOT NULL,
    `pdesc` VARCHAR(255) NOT NULL,
    `in_qty` INTEGER NOT NULL,
    `in_price` DECIMAL(15,2) NOT NULL,
    `in_amount` DECIMAL(15,2) NOT NULL,
    `out_qty` INTEGER NOT NULL,
    `out_price` DECIMAL(15,2) NOT NULL,
    `out_amount` DECIMAL(15,2) NOT NULL,
    `sadate` DATE NOT NULL,
    `rdate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `rccode` VARCHAR(255) NOT NULL,
    `yokma` INTEGER NOT NULL,
    `balance` INTEGER NOT NULL,
    `price` DECIMAL(15,2) NOT NULL,
    `amount` DECIMAL(15,2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `action` VARCHAR(255) NOT NULL,
    `cancel` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `inv_action` (`inv_action`, `pcode`, `sadate`),
    INDEX `mcode` (`mcode`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_stockeep
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_stockeep`;

CREATE TABLE `ali_stockeep`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255),
    `rcode` INTEGER(5),
    `dl` DECIMAL(15,2),
    `total` DECIMAL(15,2),
    `tax` DECIMAL(15,2),
    `coupon` DECIMAL(15,2),
    `paydate` DATE,
    `flag` CHAR,
    `sync` CHAR,
    `web` CHAR,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_stocks
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_stocks`;

CREATE TABLE `ali_stocks`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(255) NOT NULL,
    `inv_code` VARCHAR(255) NOT NULL,
    `inv_code1` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `pcode` VARCHAR(255) NOT NULL,
    `yokma` INTEGER NOT NULL,
    `qty` INTEGER NOT NULL,
    `amt` INTEGER NOT NULL,
    `sdate` DATE NOT NULL,
    `stime` TIME NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `remark` TEXT NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_structure_binary
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_structure_binary`;

CREATE TABLE `ali_structure_binary`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `mcode_index` VARCHAR(1000) NOT NULL,
    `mcode_ref` VARCHAR(255) NOT NULL,
    `tot_pv` INTEGER NOT NULL,
    `level` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode_ref` (`mcode_ref`),
    INDEX `mcode_index` (`mcode_index`(767)),
    INDEX `tot_pv` (`tot_pv`),
    INDEX `level` (`level`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_structure_binary_rcode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_structure_binary_rcode`;

CREATE TABLE `ali_structure_binary_rcode`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` VARCHAR(255) NOT NULL,
    `mcode_ref` VARCHAR(255) NOT NULL,
    `mcode_index` VARCHAR(5000) NOT NULL,
    `sp_code` VARCHAR(255) NOT NULL,
    `status_terminate` INTEGER(1) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `pos_cur1` VARCHAR(255) NOT NULL,
    `pos_cur2` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `rcode` (`rcode`),
    INDEX `mcode_ref` (`mcode_ref`),
    INDEX `mcode_index` (`mcode_index`(1000)),
    INDEX `sp_code` (`sp_code`),
    INDEX `status_terminate` (`status_terminate`),
    INDEX `pos_cur` (`pos_cur`),
    INDEX `pos_cur1` (`pos_cur1`),
    INDEX `pos_cur2` (`pos_cur2`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_structure_sponsor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_structure_sponsor`;

CREATE TABLE `ali_structure_sponsor`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `mcode_index` VARCHAR(1000) NOT NULL,
    `mcode_ref` VARCHAR(255) NOT NULL,
    `tot_pv` INTEGER NOT NULL,
    `level` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode_ref` (`mcode_ref`),
    INDEX `mcode_index` (`mcode_index`(767)),
    INDEX `tot_pv` (`tot_pv`),
    INDEX `level` (`level`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_subuser
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_subuser`;

CREATE TABLE `ali_subuser`
(
    `uid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `usercode` VARCHAR(30),
    `username` VARCHAR(30),
    `password` VARCHAR(30),
    `object1` CHAR,
    `object2` CHAR,
    `object3` CHAR,
    `object4` CHAR,
    `object5` CHAR,
    `accessright` TEXT,
    PRIMARY KEY (`uid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_supplier
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_supplier`;

CREATE TABLE `ali_supplier`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `sup_code` VARCHAR(7),
    `sup_desc` VARCHAR(255),
    `sup_type` INTEGER(10) NOT NULL,
    `address` TEXT NOT NULL,
    `districtId` INTEGER(10) NOT NULL,
    `amphurId` INTEGER(10) NOT NULL,
    `provinceId` INTEGER(10) NOT NULL,
    `zip` VARCHAR(5) NOT NULL,
    `uid` INTEGER(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_syscomm
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_syscomm`;

CREATE TABLE `ali_syscomm`
(
    `cid` INTEGER(5) NOT NULL AUTO_INCREMENT,
    `faststart` VARCHAR(1),
    `binary` VARCHAR(1),
    `weekstrong` VARCHAR(1),
    `trinary` VARCHAR(1),
    `unilevel` VARCHAR(1),
    `matching` VARCHAR(1),
    PRIMARY KEY (`cid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_tax
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_tax`;

CREATE TABLE `ali_tax`
(
    `cid` INTEGER NOT NULL AUTO_INCREMENT,
    `locationbase` VARCHAR(255) NOT NULL,
    `minaccamount` DECIMAL(15,2) NOT NULL,
    `maxaccamount` DECIMAL(15,2) NOT NULL,
    `vatlocal` INTEGER NOT NULL,
    `vatforeign` INTEGER NOT NULL,
    `taxlocal` DECIMAL(15,2) NOT NULL,
    `taxforeign` DECIMAL(15,2) NOT NULL,
    `mtype` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`cid`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_temp_ad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_temp_ad`;

CREATE TABLE `ali_temp_ad`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(7),
    `bdate` DATE,
    `lr1` VARCHAR(2),
    `rcode_l` VARCHAR(5),
    `level_l` DECIMAL(15,0),
    `mcode_l` VARCHAR(7),
    `sano_l` VARCHAR(7),
    `rcode_r` VARCHAR(5),
    `level_r` DECIMAL(15,0),
    `mcode_r` VARCHAR(7),
    `sano_r` VARCHAR(7),
    `total` DECIMAL(15,2),
    `flag` VARCHAR(1),
    PRIMARY KEY (`id`),
    INDEX `rcode_l` (`rcode_l`, `rcode_r`, `lr1`),
    INDEX `rcode_l_2` (`rcode_l`, `lr1`),
    INDEX `rcode_r` (`rcode_r`, `lr1`),
    INDEX `mcode` (`mcode`, `rcode_l`),
    INDEX `mcode_2` (`mcode`, `rcode_r`),
    INDEX `mcode_3` (`mcode`, `rcode_l`, `rcode_r`, `lr1`),
    INDEX `mcode_4` (`mcode`, `mcode_l`),
    INDEX `mcode_5` (`mcode`, `mcode_r`),
    INDEX `mcode_6` (`mcode`, `level_l`),
    INDEX `id` (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_tmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_tmbonus`;

CREATE TABLE `ali_tmbonus`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `mb2su` INTEGER NOT NULL,
    `mb2ex` INTEGER NOT NULL,
    `tot_pv` DECIMAL(15,2) NOT NULL,
    `left_pv` DECIMAL(15,2) NOT NULL,
    `right_pv` DECIMAL(15,2) NOT NULL,
    `balance_pv` DECIMAL(15,2) NOT NULL,
    `tpoint` DECIMAL(15,2) NOT NULL,
    `spoint` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fdate` (`fdate`, `tdate`),
    INDEX `mcode` (`mcode`, `fdate`, `tdate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_tmbonus1
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_tmbonus1`;

CREATE TABLE `ali_tmbonus1`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `rcode` INTEGER NOT NULL,
    `smallbig` INTEGER NOT NULL,
    `point` DECIMAL(15,2) NOT NULL,
    `seats` INTEGER NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `firstseatpoint` DECIMAL(15,2) NOT NULL,
    `secondseatpoint` DECIMAL(15,2) NOT NULL,
    `function_count` INTEGER NOT NULL,
    `groupvp` INTEGER NOT NULL,
    `couple` INTEGER NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`, `rcode`, `fdate`, `tdate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_transfer_ewallet_confirm
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_transfer_ewallet_confirm`;

CREATE TABLE `ali_transfer_ewallet_confirm`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mcode` VARCHAR(255) NOT NULL,
    `pay_type` VARCHAR(255) NOT NULL,
    `sadate` DATE NOT NULL,
    `sctime` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `img_pay` TEXT NOT NULL,
    `approved_uid` VARCHAR(255) NOT NULL,
    `approved_sctime` DATETIME NOT NULL,
    `approved_status` INTEGER(2) NOT NULL,
    `cancel_uid` VARCHAR(255) NOT NULL,
    `cancel_sctime` DATETIME NOT NULL,
    `cancel_status` INTEGER(2) NOT NULL,
    `last_sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sano_ref` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ali_transferewallet_h
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_transferewallet_h`;

CREATE TABLE `ali_transferewallet_h`
(
    `sano` VARCHAR(255),
    `sano1` BIGINT(22) NOT NULL,
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255),
    `inv_ref` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `tot_weight` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` INTEGER DEFAULT 0,
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtFuture` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtTransfer` VARCHAR(255) DEFAULT '0' NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `txtCredit1` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit2` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit3` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtInternet` VARCHAR(255) NOT NULL,
    `txtDiscount` VARCHAR(255) NOT NULL,
    `txtOther` VARCHAR(255) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `discount` VARCHAR(255) NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `pay_type` VARCHAR(255) NOT NULL,
    `hcancel` INTEGER NOT NULL,
    `caddress` TEXT NOT NULL,
    `cdistrictId` INTEGER NOT NULL,
    `camphurId` INTEGER NOT NULL,
    `cprovinceId` INTEGER NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `sender` INTEGER NOT NULL,
    `sender_date` DATE NOT NULL,
    `receive` INTEGER NOT NULL,
    `receive_date` DATE NOT NULL,
    `asend` INTEGER NOT NULL,
    `ato_type` INTEGER NOT NULL,
    `ato_id` INTEGER NOT NULL,
    `online` INTEGER NOT NULL,
    `hpv` DECIMAL(15,2) NOT NULL,
    `htotal` DECIMAL(15,2) NOT NULL,
    `hdate` DATE NOT NULL,
    `scheck` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `rcode` INTEGER NOT NULL,
    `bmcauto` INTEGER NOT NULL,
    `transtype` INTEGER NOT NULL,
    `paytype` INTEGER NOT NULL,
    `sendtype` INTEGER NOT NULL,
    `credittype` INTEGER NOT NULL,
    `paydate` DATETIME NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `mbase` VARCHAR(255) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_transfersale_d
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_transfersale_d`;

CREATE TABLE `ali_transfersale_d`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` VARCHAR(7),
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(100),
    `unit` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(7),
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `fv` DECIMAL(15,2) NOT NULL,
    `weight` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    `bprice` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_transfersale_h
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_transfersale_h`;

CREATE TABLE `ali_transfersale_h`
(
    `sano` VARCHAR(255),
    `sano1` BIGINT(22) NOT NULL,
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255),
    `inv_ref` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `tot_weight` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` INTEGER DEFAULT 0,
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtFuture` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtTransfer` VARCHAR(255) DEFAULT '0' NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `txtCredit1` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit2` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit3` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtInternet` VARCHAR(255) NOT NULL,
    `txtDiscount` VARCHAR(255) NOT NULL,
    `txtOther` VARCHAR(255) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `discount` VARCHAR(255) NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `pay_type` VARCHAR(255) NOT NULL,
    `hcancel` INTEGER NOT NULL,
    `caddress` TEXT NOT NULL,
    `cdistrictId` VARCHAR(255) NOT NULL,
    `camphurId` VARCHAR(255) NOT NULL,
    `cprovinceId` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `sender` INTEGER NOT NULL,
    `sender_date` DATE NOT NULL,
    `receive` INTEGER NOT NULL,
    `receive_date` DATE NOT NULL,
    `asend` INTEGER NOT NULL,
    `ato_type` INTEGER NOT NULL,
    `ato_id` INTEGER NOT NULL,
    `online` INTEGER NOT NULL,
    `hpv` DECIMAL(15,2) NOT NULL,
    `htotal` DECIMAL(15,2) NOT NULL,
    `hdate` DATE NOT NULL,
    `scheck` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `rcode` INTEGER NOT NULL,
    `bmcauto` INTEGER NOT NULL,
    `transtype` INTEGER NOT NULL,
    `paytype` INTEGER NOT NULL,
    `sendtype` INTEGER NOT NULL,
    `credittype` INTEGER NOT NULL,
    `paydate` DATETIME NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `mbase` VARCHAR(255) NOT NULL,
    `cname` VARCHAR(255) NOT NULL,
    `cmobile` VARCHAR(255) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_trip_bonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_trip_bonus`;

CREATE TABLE `ali_trip_bonus`
(
    `aid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5) NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `pv_private` DECIMAL(15,2) NOT NULL,
    `pv_team` DECIMAL(15,2) NOT NULL,
    `pv_use_private` DECIMAL(15,2) NOT NULL,
    `pv_use_team` DECIMAL(15,2) NOT NULL,
    `total_pv_private` DECIMAL(15,2) NOT NULL,
    `total_pv_team` DECIMAL(15,2) NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `status` INTEGER(5) NOT NULL,
    PRIMARY KEY (`aid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_trip_pv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_trip_pv`;

CREATE TABLE `ali_trip_pv`
(
    `bid` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER(5),
    `mcode` VARCHAR(255),
    `upa_code` VARCHAR(255),
    `total_pv` DECIMAL(15,2) DEFAULT 0.00,
    `mpos` VARCHAR(5),
    `npos` VARCHAR(5),
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`bid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_tround
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_tround`;

CREATE TABLE `ali_tround`
(
    `rcode` INTEGER NOT NULL,
    `rname` VARCHAR(255) NOT NULL,
    `detail` TEXT NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    `rtype` INTEGER NOT NULL,
    `firstseat` DECIMAL(15,2) NOT NULL,
    `secondseat` DECIMAL(15,2) NOT NULL,
    `rincrease` DECIMAL(15,2) NOT NULL,
    `rurl` VARCHAR(255) NOT NULL,
    `remark` TEXT NOT NULL,
    `calc` VARCHAR(255) NOT NULL,
    `calc_date` DATETIME NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_tsaled
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_tsaled`;

CREATE TABLE `ali_tsaled`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sano` INTEGER NOT NULL,
    `sadate` DATE,
    `inv_code` VARCHAR(7),
    `pcode` VARCHAR(20),
    `pdesc` VARCHAR(100),
    `mcode` VARCHAR(7),
    `price` DECIMAL(15,2),
    `pv` DECIMAL(15,2),
    `bv` DECIMAL(15,2),
    `fv` DECIMAL(15,2) NOT NULL,
    `qty` DECIMAL(15,2),
    `amt` DECIMAL(15,2),
    `bprice` DECIMAL(15,2) NOT NULL,
    `uidbase` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `outstanding` VARCHAR(255) NOT NULL,
    `uidm` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_tsaleh
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_tsaleh`;

CREATE TABLE `ali_tsaleh`
(
    `sano` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `sadate` DATE,
    `sctime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inv_code` VARCHAR(255),
    `lid` VARCHAR(255) NOT NULL,
    `inv_from` VARCHAR(255) NOT NULL,
    `mcode` VARCHAR(255),
    `total` DECIMAL(15,2),
    `tot_pv` DECIMAL(15,2),
    `tot_bv` DECIMAL(15,2),
    `tot_fv` DECIMAL(15,2) NOT NULL,
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkInternet` VARCHAR(255) NOT NULL,
    `chkDiscount` VARCHAR(255) NOT NULL,
    `chkOther` VARCHAR(255) NOT NULL,
    `txtCash` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtFuture` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtTransfer` VARCHAR(255) DEFAULT '0' NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `txtCredit1` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit2` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtCredit3` VARCHAR(255) DEFAULT '0' NOT NULL,
    `txtInternet` VARCHAR(255) NOT NULL,
    `txtDiscount` VARCHAR(255) NOT NULL,
    `txtOther` VARCHAR(255) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionInternet` VARCHAR(255) NOT NULL,
    `optionDiscount` VARCHAR(255) NOT NULL,
    `optionOther` VARCHAR(255) NOT NULL,
    `discount` INTEGER NOT NULL,
    `sender` INTEGER NOT NULL,
    `sender_date` DATE NOT NULL,
    `receive` INTEGER NOT NULL,
    `receive_date` DATE NOT NULL,
    `print` INTEGER NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ewallett_before` DECIMAL(15,2) NOT NULL,
    `ewallett_after` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(255) NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `uid_receive` VARCHAR(255) NOT NULL,
    `uid_sender` VARCHAR(255) NOT NULL,
    `caddress` TEXT NOT NULL,
    `cdistrictId` VARCHAR(255) NOT NULL,
    `camphurId` VARCHAR(255) NOT NULL,
    `cprovinceId` VARCHAR(255) NOT NULL,
    `czip` VARCHAR(255) NOT NULL,
    `status` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`, `tot_pv`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`, `tot_pv`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`),
    INDEX `ewallett_before` (`ewallet_before`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_upv
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_upv`;

CREATE TABLE `ali_upv`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `rcode` INTEGER NOT NULL,
    `mcode` VARCHAR(255) NOT NULL,
    `bmbonus` DECIMAL(15,2) DEFAULT 0.00,
    `total_pv` DECIMAL(15,2) NOT NULL,
    `sano` INTEGER NOT NULL,
    `sadate` DATE NOT NULL,
    `fdate` DATE NOT NULL,
    `tdate` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `mcode` (`mcode`),
    INDEX `fdate` (`fdate`, `tdate`),
    INDEX `sadate` (`sadate`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_user`;

CREATE TABLE `ali_user`
(
    `uid` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `usercode` VARCHAR(30),
    `username` VARCHAR(255),
    `password` VARCHAR(255),
    `usertype` INTEGER,
    `object1` INTEGER(5),
    `object2` INTEGER(5),
    `object3` INTEGER(5),
    `object4` INTEGER(5),
    `object5` INTEGER(5),
    `object6` INTEGER NOT NULL,
    `object7` INTEGER(5) NOT NULL,
    `object8` INTEGER(5) NOT NULL,
    `object9` INTEGER(5) NOT NULL,
    `object10` INTEGER(5) NOT NULL,
    `inv_ref` VARCHAR(20),
    `accessright` TEXT,
    `code_ref` VARCHAR(255) NOT NULL,
    `checkbackdate` INTEGER NOT NULL,
    `limitcredit` INTEGER NOT NULL,
    `mtype` INTEGER(2) NOT NULL,
    PRIMARY KEY (`uid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_voucher
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_voucher`;

CREATE TABLE `ali_voucher`
(
    `sano` VARCHAR(255),
    `rcode` INTEGER(10) NOT NULL,
    `sadate` DATE,
    `inv_code` VARCHAR(255),
    `mcode` VARCHAR(255),
    `name_f` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2),
    `usercode` VARCHAR(3),
    `remark` VARCHAR(40),
    `trnf` VARCHAR(1),
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `sa_type` CHAR(2) NOT NULL,
    `uid` VARCHAR(255) NOT NULL,
    `lid` VARCHAR(255) NOT NULL,
    `dl` CHAR NOT NULL,
    `cancel` INTEGER(2) NOT NULL,
    `send` INTEGER NOT NULL,
    `txtMoney` DECIMAL(15,2) NOT NULL,
    `chkCash` VARCHAR(255) NOT NULL,
    `chkFuture` VARCHAR(255) NOT NULL,
    `chkTransfer` VARCHAR(255) NOT NULL,
    `chkCredit1` VARCHAR(255) NOT NULL,
    `chkCredit2` VARCHAR(255) NOT NULL,
    `chkCredit3` VARCHAR(255) NOT NULL,
    `chkWithdraw` VARCHAR(255) NOT NULL,
    `chkTransfer_in` VARCHAR(255) NOT NULL,
    `chkTransfer_out` VARCHAR(255) NOT NULL,
    `txtCash` DECIMAL(15,2) NOT NULL,
    `txtFuture` DECIMAL(15,2) NOT NULL,
    `txtTransfer` DECIMAL(15,2) NOT NULL,
    `txtCredit1` DECIMAL(15,2) NOT NULL,
    `txtCredit2` DECIMAL(15,2) NOT NULL,
    `txtCredit3` DECIMAL(15,2) NOT NULL,
    `txtWithdraw` DECIMAL(15,2) NOT NULL,
    `txtTransfer_in` DECIMAL(15,2) NOT NULL,
    `txtTransfer_out` DECIMAL(15,2) NOT NULL,
    `optionCash` VARCHAR(255) NOT NULL,
    `optionFuture` VARCHAR(255) NOT NULL,
    `optionTransfer` VARCHAR(255) NOT NULL,
    `optionCredit1` VARCHAR(255) NOT NULL,
    `optionCredit2` VARCHAR(255) NOT NULL,
    `optionCredit3` VARCHAR(255) NOT NULL,
    `optionWithdraw` VARCHAR(255) NOT NULL,
    `optionTransfer_in` VARCHAR(255) NOT NULL,
    `optionTransfer_out` VARCHAR(255) NOT NULL,
    `txtoption` LONGTEXT NOT NULL,
    `ewallet` DECIMAL(15,2) NOT NULL,
    `ewallet_before` DECIMAL(15,2) NOT NULL,
    `ewallet_after` DECIMAL(15,2) NOT NULL,
    `ipay` VARCHAR(255) NOT NULL,
    `checkportal` INTEGER NOT NULL,
    `bprice` DECIMAL(15,2) NOT NULL,
    `cancel_date` DATE NOT NULL,
    `uid_cancel` VARCHAR(255) NOT NULL,
    `locationbase` INTEGER NOT NULL,
    `chkCommission` VARCHAR(255) NOT NULL,
    `txtCommission` DECIMAL(15,2) NOT NULL,
    `optionCommission` VARCHAR(255) NOT NULL,
    `mbase` VARCHAR(244) NOT NULL,
    `crate` DECIMAL(11,6) NOT NULL,
    `echeck` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `sano_4` (`sano`),
    INDEX `sano` (`sano`),
    INDEX `sadate` (`sadate`),
    INDEX `sano_2` (`sano`),
    INDEX `mcode` (`mcode`),
    INDEX `mcode_2` (`mcode`),
    INDEX `sano_3` (`sano`, `mcode`),
    INDEX `sadate_2` (`sadate`, `mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ali_webcfg
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ali_webcfg`;

CREATE TABLE `ali_webcfg`
(
    `cid` INTEGER NOT NULL AUTO_INCREMENT,
    `web_cfg` VARCHAR(200),
    PRIMARY KEY (`cid`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- amphur
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `amphur`;

CREATE TABLE `amphur`
(
    `amphurId` INTEGER(2) DEFAULT 0 NOT NULL,
    `amphurName` VARCHAR(30) DEFAULT '' NOT NULL,
    `amphurNameEng` VARCHAR(30),
    `provinceId` INTEGER(2) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`amphurId`),
    INDEX `provinceId` (`provinceId`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- amphur_postcode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `amphur_postcode`;

CREATE TABLE `amphur_postcode`
(
    `AMPHUR_ID` int(10) unsigned NOT NULL,
    `POST_CODE` int(11) unsigned NOT NULL,
    PRIMARY KEY (`AMPHUR_ID`,`POST_CODE`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- chkbmbonus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `chkbmbonus`;

CREATE TABLE `chkbmbonus`
(
    `mcode` VARCHAR(255) NOT NULL,
    `name_t` VARCHAR(255) NOT NULL,
    `total` DECIMAL(15,2) NOT NULL,
    `pos_cur` VARCHAR(255) NOT NULL,
    `countsp` INTEGER NOT NULL,
    `status_11` INTEGER NOT NULL,
    `status_12` INTEGER NOT NULL,
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- district
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `district`;

CREATE TABLE `district`
(
    `districtId` INTEGER(2) DEFAULT 0 NOT NULL,
    `districtName` VARCHAR(255) DEFAULT '' NOT NULL,
    `districtNameEng` VARCHAR(255),
    `amphurId` INTEGER(2) DEFAULT 0 NOT NULL,
    `provinceId` INTEGER(2) DEFAULT 0 NOT NULL,
    `zipcode` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`districtId`),
    INDEX `amphurId` (`amphurId`),
    INDEX `provinceId` (`provinceId`),
    INDEX `provinceId_2` (`provinceId`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- member_terminate
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `member_terminate`;

CREATE TABLE `member_terminate`
(
    `mcode` VARCHAR(255) NOT NULL,
    INDEX `mcode` (`mcode`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- province
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `province`;

CREATE TABLE `province`
(
    `provinceId` INTEGER(2) DEFAULT 0 NOT NULL,
    `provinceName` VARCHAR(255) DEFAULT '' NOT NULL,
    `provinceNameEng` VARCHAR(255) DEFAULT '' NOT NULL,
    `region` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`provinceId`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- tbl_activity_en
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_activity_en`;

CREATE TABLE `tbl_activity_en`
(
    `act_id` INTEGER(5) NOT NULL AUTO_INCREMENT,
    `act_name` VARCHAR(255) NOT NULL,
    `desc_s` TEXT NOT NULL,
    `desc_l` TEXT NOT NULL,
    `image` VARCHAR(200) NOT NULL,
    `short` VARCHAR(5) NOT NULL,
    `imageSlide` VARCHAR(100) NOT NULL,
    `start_date` VARCHAR(200) NOT NULL,
    `end_date` VARCHAR(200) NOT NULL,
    `slideshow` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`act_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- tbl_activity_th
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_activity_th`;

CREATE TABLE `tbl_activity_th`
(
    `act_id` INTEGER(5) NOT NULL AUTO_INCREMENT,
    `short` VARCHAR(5) NOT NULL,
    `act_name` VARCHAR(255) NOT NULL,
    `desc_s` TEXT NOT NULL,
    `desc_l` TEXT NOT NULL,
    `image` VARCHAR(200) NOT NULL,
    `imageSlide` VARCHAR(100) NOT NULL,
    `start_date` VARCHAR(200) NOT NULL,
    `end_date` VARCHAR(200) NOT NULL,
    `slideshow` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`act_id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
