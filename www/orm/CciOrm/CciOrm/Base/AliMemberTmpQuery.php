<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMemberTmp as ChildAliMemberTmp;
use CciOrm\CciOrm\AliMemberTmpQuery as ChildAliMemberTmpQuery;
use CciOrm\CciOrm\Map\AliMemberTmpTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_member_tmp' table.
 *
 *
 *
 * @method     ChildAliMemberTmpQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliMemberTmpQuery orderByTranstype($order = Criteria::ASC) Order by the transtype column
 * @method     ChildAliMemberTmpQuery orderByPaytype($order = Criteria::ASC) Order by the paytype column
 * @method     ChildAliMemberTmpQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliMemberTmpQuery orderByCredittype($order = Criteria::ASC) Order by the credittype column
 * @method     ChildAliMemberTmpQuery orderBySendtype($order = Criteria::ASC) Order by the sendtype column
 * @method     ChildAliMemberTmpQuery orderByCstreet($order = Criteria::ASC) Order by the cstreet column
 * @method     ChildAliMemberTmpQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliMemberTmpQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliMemberTmpQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliMemberTmpQuery orderByNameE($order = Criteria::ASC) Order by the name_e column
 * @method     ChildAliMemberTmpQuery orderByPosid($order = Criteria::ASC) Order by the posid column
 * @method     ChildAliMemberTmpQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliMemberTmpQuery orderByBirthday($order = Criteria::ASC) Order by the birthday column
 * @method     ChildAliMemberTmpQuery orderByNational($order = Criteria::ASC) Order by the national column
 * @method     ChildAliMemberTmpQuery orderByIdTax($order = Criteria::ASC) Order by the id_tax column
 * @method     ChildAliMemberTmpQuery orderByIdCard($order = Criteria::ASC) Order by the id_card column
 * @method     ChildAliMemberTmpQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildAliMemberTmpQuery orderByHomeT($order = Criteria::ASC) Order by the home_t column
 * @method     ChildAliMemberTmpQuery orderByOfficeT($order = Criteria::ASC) Order by the office_t column
 * @method     ChildAliMemberTmpQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method     ChildAliMemberTmpQuery orderByMcodeAcc($order = Criteria::ASC) Order by the mcode_acc column
 * @method     ChildAliMemberTmpQuery orderByBonusrec($order = Criteria::ASC) Order by the bonusrec column
 * @method     ChildAliMemberTmpQuery orderByBankcode($order = Criteria::ASC) Order by the bankcode column
 * @method     ChildAliMemberTmpQuery orderByBranch($order = Criteria::ASC) Order by the branch column
 * @method     ChildAliMemberTmpQuery orderByAccType($order = Criteria::ASC) Order by the acc_type column
 * @method     ChildAliMemberTmpQuery orderByAccNo($order = Criteria::ASC) Order by the acc_no column
 * @method     ChildAliMemberTmpQuery orderByAccName($order = Criteria::ASC) Order by the acc_name column
 * @method     ChildAliMemberTmpQuery orderByAccProv($order = Criteria::ASC) Order by the acc_prov column
 * @method     ChildAliMemberTmpQuery orderBySvCode($order = Criteria::ASC) Order by the sv_code column
 * @method     ChildAliMemberTmpQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliMemberTmpQuery orderBySpName($order = Criteria::ASC) Order by the sp_name column
 * @method     ChildAliMemberTmpQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliMemberTmpQuery orderByUpaName($order = Criteria::ASC) Order by the upa_name column
 * @method     ChildAliMemberTmpQuery orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliMemberTmpQuery orderByComplete($order = Criteria::ASC) Order by the complete column
 * @method     ChildAliMemberTmpQuery orderByCompdate($order = Criteria::ASC) Order by the compdate column
 * @method     ChildAliMemberTmpQuery orderByModate($order = Criteria::ASC) Order by the modate column
 * @method     ChildAliMemberTmpQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliMemberTmpQuery orderByNameB($order = Criteria::ASC) Order by the name_b column
 * @method     ChildAliMemberTmpQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method     ChildAliMemberTmpQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildAliMemberTmpQuery orderByOccupation($order = Criteria::ASC) Order by the occupation column
 * @method     ChildAliMemberTmpQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliMemberTmpQuery orderByMarName($order = Criteria::ASC) Order by the mar_name column
 * @method     ChildAliMemberTmpQuery orderByMarAge($order = Criteria::ASC) Order by the mar_age column
 * @method     ChildAliMemberTmpQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildAliMemberTmpQuery orderByBeneficiaries($order = Criteria::ASC) Order by the beneficiaries column
 * @method     ChildAliMemberTmpQuery orderByRelation($order = Criteria::ASC) Order by the relation column
 * @method     ChildAliMemberTmpQuery orderByDistrictid($order = Criteria::ASC) Order by the districtId column
 * @method     ChildAliMemberTmpQuery orderByAmphurid($order = Criteria::ASC) Order by the amphurId column
 * @method     ChildAliMemberTmpQuery orderByProvinceid($order = Criteria::ASC) Order by the provinceId column
 * @method     ChildAliMemberTmpQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildAliMemberTmpQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliMemberTmpQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliMemberTmpQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliMemberTmpQuery orderByPosCur1($order = Criteria::ASC) Order by the pos_cur1 column
 * @method     ChildAliMemberTmpQuery orderByPosCur2($order = Criteria::ASC) Order by the pos_cur2 column
 * @method     ChildAliMemberTmpQuery orderByPosCur3($order = Criteria::ASC) Order by the pos_cur3 column
 * @method     ChildAliMemberTmpQuery orderByPosCur4($order = Criteria::ASC) Order by the pos_cur4 column
 * @method     ChildAliMemberTmpQuery orderByRposCur4($order = Criteria::ASC) Order by the rpos_cur4 column
 * @method     ChildAliMemberTmpQuery orderByMemdesc($order = Criteria::ASC) Order by the memdesc column
 * @method     ChildAliMemberTmpQuery orderByCmp($order = Criteria::ASC) Order by the cmp column
 * @method     ChildAliMemberTmpQuery orderByCmp2($order = Criteria::ASC) Order by the cmp2 column
 * @method     ChildAliMemberTmpQuery orderByCmp3($order = Criteria::ASC) Order by the cmp3 column
 * @method     ChildAliMemberTmpQuery orderByCcmp($order = Criteria::ASC) Order by the ccmp column
 * @method     ChildAliMemberTmpQuery orderByCcmp2($order = Criteria::ASC) Order by the ccmp2 column
 * @method     ChildAliMemberTmpQuery orderByCcmp3($order = Criteria::ASC) Order by the ccmp3 column
 * @method     ChildAliMemberTmpQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildAliMemberTmpQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ChildAliMemberTmpQuery orderByBuilding($order = Criteria::ASC) Order by the building column
 * @method     ChildAliMemberTmpQuery orderByVillage($order = Criteria::ASC) Order by the village column
 * @method     ChildAliMemberTmpQuery orderBySoi($order = Criteria::ASC) Order by the soi column
 * @method     ChildAliMemberTmpQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliMemberTmpQuery orderByBmdate1($order = Criteria::ASC) Order by the bmdate1 column
 * @method     ChildAliMemberTmpQuery orderByBmdate2($order = Criteria::ASC) Order by the bmdate2 column
 * @method     ChildAliMemberTmpQuery orderByBmdate3($order = Criteria::ASC) Order by the bmdate3 column
 * @method     ChildAliMemberTmpQuery orderByCbmdate1($order = Criteria::ASC) Order by the cbmdate1 column
 * @method     ChildAliMemberTmpQuery orderByCbmdate2($order = Criteria::ASC) Order by the cbmdate2 column
 * @method     ChildAliMemberTmpQuery orderByCbmdate3($order = Criteria::ASC) Order by the cbmdate3 column
 * @method     ChildAliMemberTmpQuery orderByOnline($order = Criteria::ASC) Order by the online column
 * @method     ChildAliMemberTmpQuery orderByCnameF($order = Criteria::ASC) Order by the cname_f column
 * @method     ChildAliMemberTmpQuery orderByCnameT($order = Criteria::ASC) Order by the cname_t column
 * @method     ChildAliMemberTmpQuery orderByCnameE($order = Criteria::ASC) Order by the cname_e column
 * @method     ChildAliMemberTmpQuery orderByCnameB($order = Criteria::ASC) Order by the cname_b column
 * @method     ChildAliMemberTmpQuery orderByCbirthday($order = Criteria::ASC) Order by the cbirthday column
 * @method     ChildAliMemberTmpQuery orderByCnational($order = Criteria::ASC) Order by the cnational column
 * @method     ChildAliMemberTmpQuery orderByCidTax($order = Criteria::ASC) Order by the cid_tax column
 * @method     ChildAliMemberTmpQuery orderByCidCard($order = Criteria::ASC) Order by the cid_card column
 * @method     ChildAliMemberTmpQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliMemberTmpQuery orderByCbuilding($order = Criteria::ASC) Order by the cbuilding column
 * @method     ChildAliMemberTmpQuery orderByCvillage($order = Criteria::ASC) Order by the cvillage column
 * @method     ChildAliMemberTmpQuery orderByCsoi($order = Criteria::ASC) Order by the csoi column
 * @method     ChildAliMemberTmpQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliMemberTmpQuery orderByChomeT($order = Criteria::ASC) Order by the chome_t column
 * @method     ChildAliMemberTmpQuery orderByCofficeT($order = Criteria::ASC) Order by the coffice_t column
 * @method     ChildAliMemberTmpQuery orderByCmobile($order = Criteria::ASC) Order by the cmobile column
 * @method     ChildAliMemberTmpQuery orderByCfax($order = Criteria::ASC) Order by the cfax column
 * @method     ChildAliMemberTmpQuery orderByCsex($order = Criteria::ASC) Order by the csex column
 * @method     ChildAliMemberTmpQuery orderByCemail($order = Criteria::ASC) Order by the cemail column
 * @method     ChildAliMemberTmpQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliMemberTmpQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliMemberTmpQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliMemberTmpQuery orderByInameF($order = Criteria::ASC) Order by the iname_f column
 * @method     ChildAliMemberTmpQuery orderByInameT($order = Criteria::ASC) Order by the iname_t column
 * @method     ChildAliMemberTmpQuery orderByIrelation($order = Criteria::ASC) Order by the irelation column
 * @method     ChildAliMemberTmpQuery orderByIphone($order = Criteria::ASC) Order by the iphone column
 * @method     ChildAliMemberTmpQuery orderByIidCard($order = Criteria::ASC) Order by the iid_card column
 * @method     ChildAliMemberTmpQuery orderByStatusDoc($order = Criteria::ASC) Order by the status_doc column
 * @method     ChildAliMemberTmpQuery orderByStatusExpire($order = Criteria::ASC) Order by the status_expire column
 * @method     ChildAliMemberTmpQuery orderByStatusTerminate($order = Criteria::ASC) Order by the status_terminate column
 * @method     ChildAliMemberTmpQuery orderByTerminateDate($order = Criteria::ASC) Order by the terminate_date column
 * @method     ChildAliMemberTmpQuery orderByStatusSuspend($order = Criteria::ASC) Order by the status_suspend column
 * @method     ChildAliMemberTmpQuery orderBySuspendDate($order = Criteria::ASC) Order by the suspend_date column
 * @method     ChildAliMemberTmpQuery orderByStatusBlacklist($order = Criteria::ASC) Order by the status_blacklist column
 * @method     ChildAliMemberTmpQuery orderByStatusAto($order = Criteria::ASC) Order by the status_ato column
 * @method     ChildAliMemberTmpQuery orderBySletter($order = Criteria::ASC) Order by the sletter column
 * @method     ChildAliMemberTmpQuery orderBySinvCode($order = Criteria::ASC) Order by the sinv_code column
 * @method     ChildAliMemberTmpQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliMemberTmpQuery orderByMcodeRef($order = Criteria::ASC) Order by the mcode_ref column
 * @method     ChildAliMemberTmpQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliMemberTmpQuery orderBySbook($order = Criteria::ASC) Order by the sbook column
 * @method     ChildAliMemberTmpQuery orderBySbinvCode($order = Criteria::ASC) Order by the sbinv_code column
 * @method     ChildAliMemberTmpQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliMemberTmpQuery orderByCidMobile($order = Criteria::ASC) Order by the cid_mobile column
 * @method     ChildAliMemberTmpQuery orderByBewallet($order = Criteria::ASC) Order by the bewallet column
 * @method     ChildAliMemberTmpQuery orderByBvoucher($order = Criteria::ASC) Order by the bvoucher column
 * @method     ChildAliMemberTmpQuery orderByVoucher($order = Criteria::ASC) Order by the voucher column
 * @method     ChildAliMemberTmpQuery orderByManager($order = Criteria::ASC) Order by the manager column
 * @method     ChildAliMemberTmpQuery orderByMtype($order = Criteria::ASC) Order by the mtype column
 * @method     ChildAliMemberTmpQuery orderByUidbase($order = Criteria::ASC) Order by the uidbase column
 *
 * @method     ChildAliMemberTmpQuery groupById() Group by the id column
 * @method     ChildAliMemberTmpQuery groupByTranstype() Group by the transtype column
 * @method     ChildAliMemberTmpQuery groupByPaytype() Group by the paytype column
 * @method     ChildAliMemberTmpQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliMemberTmpQuery groupByCredittype() Group by the credittype column
 * @method     ChildAliMemberTmpQuery groupBySendtype() Group by the sendtype column
 * @method     ChildAliMemberTmpQuery groupByCstreet() Group by the cstreet column
 * @method     ChildAliMemberTmpQuery groupByMcode() Group by the mcode column
 * @method     ChildAliMemberTmpQuery groupByNameF() Group by the name_f column
 * @method     ChildAliMemberTmpQuery groupByNameT() Group by the name_t column
 * @method     ChildAliMemberTmpQuery groupByNameE() Group by the name_e column
 * @method     ChildAliMemberTmpQuery groupByPosid() Group by the posid column
 * @method     ChildAliMemberTmpQuery groupByMdate() Group by the mdate column
 * @method     ChildAliMemberTmpQuery groupByBirthday() Group by the birthday column
 * @method     ChildAliMemberTmpQuery groupByNational() Group by the national column
 * @method     ChildAliMemberTmpQuery groupByIdTax() Group by the id_tax column
 * @method     ChildAliMemberTmpQuery groupByIdCard() Group by the id_card column
 * @method     ChildAliMemberTmpQuery groupByZip() Group by the zip column
 * @method     ChildAliMemberTmpQuery groupByHomeT() Group by the home_t column
 * @method     ChildAliMemberTmpQuery groupByOfficeT() Group by the office_t column
 * @method     ChildAliMemberTmpQuery groupByMobile() Group by the mobile column
 * @method     ChildAliMemberTmpQuery groupByMcodeAcc() Group by the mcode_acc column
 * @method     ChildAliMemberTmpQuery groupByBonusrec() Group by the bonusrec column
 * @method     ChildAliMemberTmpQuery groupByBankcode() Group by the bankcode column
 * @method     ChildAliMemberTmpQuery groupByBranch() Group by the branch column
 * @method     ChildAliMemberTmpQuery groupByAccType() Group by the acc_type column
 * @method     ChildAliMemberTmpQuery groupByAccNo() Group by the acc_no column
 * @method     ChildAliMemberTmpQuery groupByAccName() Group by the acc_name column
 * @method     ChildAliMemberTmpQuery groupByAccProv() Group by the acc_prov column
 * @method     ChildAliMemberTmpQuery groupBySvCode() Group by the sv_code column
 * @method     ChildAliMemberTmpQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliMemberTmpQuery groupBySpName() Group by the sp_name column
 * @method     ChildAliMemberTmpQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliMemberTmpQuery groupByUpaName() Group by the upa_name column
 * @method     ChildAliMemberTmpQuery groupByLr() Group by the lr column
 * @method     ChildAliMemberTmpQuery groupByComplete() Group by the complete column
 * @method     ChildAliMemberTmpQuery groupByCompdate() Group by the compdate column
 * @method     ChildAliMemberTmpQuery groupByModate() Group by the modate column
 * @method     ChildAliMemberTmpQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliMemberTmpQuery groupByNameB() Group by the name_b column
 * @method     ChildAliMemberTmpQuery groupBySex() Group by the sex column
 * @method     ChildAliMemberTmpQuery groupByAge() Group by the age column
 * @method     ChildAliMemberTmpQuery groupByOccupation() Group by the occupation column
 * @method     ChildAliMemberTmpQuery groupByStatus() Group by the status column
 * @method     ChildAliMemberTmpQuery groupByMarName() Group by the mar_name column
 * @method     ChildAliMemberTmpQuery groupByMarAge() Group by the mar_age column
 * @method     ChildAliMemberTmpQuery groupByEmail() Group by the email column
 * @method     ChildAliMemberTmpQuery groupByBeneficiaries() Group by the beneficiaries column
 * @method     ChildAliMemberTmpQuery groupByRelation() Group by the relation column
 * @method     ChildAliMemberTmpQuery groupByDistrictid() Group by the districtId column
 * @method     ChildAliMemberTmpQuery groupByAmphurid() Group by the amphurId column
 * @method     ChildAliMemberTmpQuery groupByProvinceid() Group by the provinceId column
 * @method     ChildAliMemberTmpQuery groupByFax() Group by the fax column
 * @method     ChildAliMemberTmpQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliMemberTmpQuery groupByUid() Group by the uid column
 * @method     ChildAliMemberTmpQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliMemberTmpQuery groupByPosCur1() Group by the pos_cur1 column
 * @method     ChildAliMemberTmpQuery groupByPosCur2() Group by the pos_cur2 column
 * @method     ChildAliMemberTmpQuery groupByPosCur3() Group by the pos_cur3 column
 * @method     ChildAliMemberTmpQuery groupByPosCur4() Group by the pos_cur4 column
 * @method     ChildAliMemberTmpQuery groupByRposCur4() Group by the rpos_cur4 column
 * @method     ChildAliMemberTmpQuery groupByMemdesc() Group by the memdesc column
 * @method     ChildAliMemberTmpQuery groupByCmp() Group by the cmp column
 * @method     ChildAliMemberTmpQuery groupByCmp2() Group by the cmp2 column
 * @method     ChildAliMemberTmpQuery groupByCmp3() Group by the cmp3 column
 * @method     ChildAliMemberTmpQuery groupByCcmp() Group by the ccmp column
 * @method     ChildAliMemberTmpQuery groupByCcmp2() Group by the ccmp2 column
 * @method     ChildAliMemberTmpQuery groupByCcmp3() Group by the ccmp3 column
 * @method     ChildAliMemberTmpQuery groupByAddress() Group by the address column
 * @method     ChildAliMemberTmpQuery groupByStreet() Group by the street column
 * @method     ChildAliMemberTmpQuery groupByBuilding() Group by the building column
 * @method     ChildAliMemberTmpQuery groupByVillage() Group by the village column
 * @method     ChildAliMemberTmpQuery groupBySoi() Group by the soi column
 * @method     ChildAliMemberTmpQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliMemberTmpQuery groupByBmdate1() Group by the bmdate1 column
 * @method     ChildAliMemberTmpQuery groupByBmdate2() Group by the bmdate2 column
 * @method     ChildAliMemberTmpQuery groupByBmdate3() Group by the bmdate3 column
 * @method     ChildAliMemberTmpQuery groupByCbmdate1() Group by the cbmdate1 column
 * @method     ChildAliMemberTmpQuery groupByCbmdate2() Group by the cbmdate2 column
 * @method     ChildAliMemberTmpQuery groupByCbmdate3() Group by the cbmdate3 column
 * @method     ChildAliMemberTmpQuery groupByOnline() Group by the online column
 * @method     ChildAliMemberTmpQuery groupByCnameF() Group by the cname_f column
 * @method     ChildAliMemberTmpQuery groupByCnameT() Group by the cname_t column
 * @method     ChildAliMemberTmpQuery groupByCnameE() Group by the cname_e column
 * @method     ChildAliMemberTmpQuery groupByCnameB() Group by the cname_b column
 * @method     ChildAliMemberTmpQuery groupByCbirthday() Group by the cbirthday column
 * @method     ChildAliMemberTmpQuery groupByCnational() Group by the cnational column
 * @method     ChildAliMemberTmpQuery groupByCidTax() Group by the cid_tax column
 * @method     ChildAliMemberTmpQuery groupByCidCard() Group by the cid_card column
 * @method     ChildAliMemberTmpQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliMemberTmpQuery groupByCbuilding() Group by the cbuilding column
 * @method     ChildAliMemberTmpQuery groupByCvillage() Group by the cvillage column
 * @method     ChildAliMemberTmpQuery groupByCsoi() Group by the csoi column
 * @method     ChildAliMemberTmpQuery groupByCzip() Group by the czip column
 * @method     ChildAliMemberTmpQuery groupByChomeT() Group by the chome_t column
 * @method     ChildAliMemberTmpQuery groupByCofficeT() Group by the coffice_t column
 * @method     ChildAliMemberTmpQuery groupByCmobile() Group by the cmobile column
 * @method     ChildAliMemberTmpQuery groupByCfax() Group by the cfax column
 * @method     ChildAliMemberTmpQuery groupByCsex() Group by the csex column
 * @method     ChildAliMemberTmpQuery groupByCemail() Group by the cemail column
 * @method     ChildAliMemberTmpQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliMemberTmpQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliMemberTmpQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliMemberTmpQuery groupByInameF() Group by the iname_f column
 * @method     ChildAliMemberTmpQuery groupByInameT() Group by the iname_t column
 * @method     ChildAliMemberTmpQuery groupByIrelation() Group by the irelation column
 * @method     ChildAliMemberTmpQuery groupByIphone() Group by the iphone column
 * @method     ChildAliMemberTmpQuery groupByIidCard() Group by the iid_card column
 * @method     ChildAliMemberTmpQuery groupByStatusDoc() Group by the status_doc column
 * @method     ChildAliMemberTmpQuery groupByStatusExpire() Group by the status_expire column
 * @method     ChildAliMemberTmpQuery groupByStatusTerminate() Group by the status_terminate column
 * @method     ChildAliMemberTmpQuery groupByTerminateDate() Group by the terminate_date column
 * @method     ChildAliMemberTmpQuery groupByStatusSuspend() Group by the status_suspend column
 * @method     ChildAliMemberTmpQuery groupBySuspendDate() Group by the suspend_date column
 * @method     ChildAliMemberTmpQuery groupByStatusBlacklist() Group by the status_blacklist column
 * @method     ChildAliMemberTmpQuery groupByStatusAto() Group by the status_ato column
 * @method     ChildAliMemberTmpQuery groupBySletter() Group by the sletter column
 * @method     ChildAliMemberTmpQuery groupBySinvCode() Group by the sinv_code column
 * @method     ChildAliMemberTmpQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliMemberTmpQuery groupByMcodeRef() Group by the mcode_ref column
 * @method     ChildAliMemberTmpQuery groupByCancel() Group by the cancel column
 * @method     ChildAliMemberTmpQuery groupBySbook() Group by the sbook column
 * @method     ChildAliMemberTmpQuery groupBySbinvCode() Group by the sbinv_code column
 * @method     ChildAliMemberTmpQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliMemberTmpQuery groupByCidMobile() Group by the cid_mobile column
 * @method     ChildAliMemberTmpQuery groupByBewallet() Group by the bewallet column
 * @method     ChildAliMemberTmpQuery groupByBvoucher() Group by the bvoucher column
 * @method     ChildAliMemberTmpQuery groupByVoucher() Group by the voucher column
 * @method     ChildAliMemberTmpQuery groupByManager() Group by the manager column
 * @method     ChildAliMemberTmpQuery groupByMtype() Group by the mtype column
 * @method     ChildAliMemberTmpQuery groupByUidbase() Group by the uidbase column
 *
 * @method     ChildAliMemberTmpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMemberTmpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMemberTmpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMemberTmpQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMemberTmpQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMemberTmpQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMemberTmp findOne(ConnectionInterface $con = null) Return the first ChildAliMemberTmp matching the query
 * @method     ChildAliMemberTmp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMemberTmp matching the query, or a new ChildAliMemberTmp object populated from the query conditions when no match is found
 *
 * @method     ChildAliMemberTmp findOneById(int $id) Return the first ChildAliMemberTmp filtered by the id column
 * @method     ChildAliMemberTmp findOneByTranstype(int $transtype) Return the first ChildAliMemberTmp filtered by the transtype column
 * @method     ChildAliMemberTmp findOneByPaytype(int $paytype) Return the first ChildAliMemberTmp filtered by the paytype column
 * @method     ChildAliMemberTmp findOneByPaydate(string $paydate) Return the first ChildAliMemberTmp filtered by the paydate column
 * @method     ChildAliMemberTmp findOneByCredittype(int $credittype) Return the first ChildAliMemberTmp filtered by the credittype column
 * @method     ChildAliMemberTmp findOneBySendtype(int $sendtype) Return the first ChildAliMemberTmp filtered by the sendtype column
 * @method     ChildAliMemberTmp findOneByCstreet(string $cstreet) Return the first ChildAliMemberTmp filtered by the cstreet column
 * @method     ChildAliMemberTmp findOneByMcode(string $mcode) Return the first ChildAliMemberTmp filtered by the mcode column
 * @method     ChildAliMemberTmp findOneByNameF(string $name_f) Return the first ChildAliMemberTmp filtered by the name_f column
 * @method     ChildAliMemberTmp findOneByNameT(string $name_t) Return the first ChildAliMemberTmp filtered by the name_t column
 * @method     ChildAliMemberTmp findOneByNameE(string $name_e) Return the first ChildAliMemberTmp filtered by the name_e column
 * @method     ChildAliMemberTmp findOneByPosid(string $posid) Return the first ChildAliMemberTmp filtered by the posid column
 * @method     ChildAliMemberTmp findOneByMdate(string $mdate) Return the first ChildAliMemberTmp filtered by the mdate column
 * @method     ChildAliMemberTmp findOneByBirthday(string $birthday) Return the first ChildAliMemberTmp filtered by the birthday column
 * @method     ChildAliMemberTmp findOneByNational(string $national) Return the first ChildAliMemberTmp filtered by the national column
 * @method     ChildAliMemberTmp findOneByIdTax(string $id_tax) Return the first ChildAliMemberTmp filtered by the id_tax column
 * @method     ChildAliMemberTmp findOneByIdCard(string $id_card) Return the first ChildAliMemberTmp filtered by the id_card column
 * @method     ChildAliMemberTmp findOneByZip(string $zip) Return the first ChildAliMemberTmp filtered by the zip column
 * @method     ChildAliMemberTmp findOneByHomeT(string $home_t) Return the first ChildAliMemberTmp filtered by the home_t column
 * @method     ChildAliMemberTmp findOneByOfficeT(string $office_t) Return the first ChildAliMemberTmp filtered by the office_t column
 * @method     ChildAliMemberTmp findOneByMobile(string $mobile) Return the first ChildAliMemberTmp filtered by the mobile column
 * @method     ChildAliMemberTmp findOneByMcodeAcc(string $mcode_acc) Return the first ChildAliMemberTmp filtered by the mcode_acc column
 * @method     ChildAliMemberTmp findOneByBonusrec(string $bonusrec) Return the first ChildAliMemberTmp filtered by the bonusrec column
 * @method     ChildAliMemberTmp findOneByBankcode(string $bankcode) Return the first ChildAliMemberTmp filtered by the bankcode column
 * @method     ChildAliMemberTmp findOneByBranch(string $branch) Return the first ChildAliMemberTmp filtered by the branch column
 * @method     ChildAliMemberTmp findOneByAccType(string $acc_type) Return the first ChildAliMemberTmp filtered by the acc_type column
 * @method     ChildAliMemberTmp findOneByAccNo(string $acc_no) Return the first ChildAliMemberTmp filtered by the acc_no column
 * @method     ChildAliMemberTmp findOneByAccName(string $acc_name) Return the first ChildAliMemberTmp filtered by the acc_name column
 * @method     ChildAliMemberTmp findOneByAccProv(string $acc_prov) Return the first ChildAliMemberTmp filtered by the acc_prov column
 * @method     ChildAliMemberTmp findOneBySvCode(string $sv_code) Return the first ChildAliMemberTmp filtered by the sv_code column
 * @method     ChildAliMemberTmp findOneBySpCode(string $sp_code) Return the first ChildAliMemberTmp filtered by the sp_code column
 * @method     ChildAliMemberTmp findOneBySpName(string $sp_name) Return the first ChildAliMemberTmp filtered by the sp_name column
 * @method     ChildAliMemberTmp findOneByUpaCode(string $upa_code) Return the first ChildAliMemberTmp filtered by the upa_code column
 * @method     ChildAliMemberTmp findOneByUpaName(string $upa_name) Return the first ChildAliMemberTmp filtered by the upa_name column
 * @method     ChildAliMemberTmp findOneByLr(int $lr) Return the first ChildAliMemberTmp filtered by the lr column
 * @method     ChildAliMemberTmp findOneByComplete(string $complete) Return the first ChildAliMemberTmp filtered by the complete column
 * @method     ChildAliMemberTmp findOneByCompdate(string $compdate) Return the first ChildAliMemberTmp filtered by the compdate column
 * @method     ChildAliMemberTmp findOneByModate(string $modate) Return the first ChildAliMemberTmp filtered by the modate column
 * @method     ChildAliMemberTmp findOneByUsercode(string $usercode) Return the first ChildAliMemberTmp filtered by the usercode column
 * @method     ChildAliMemberTmp findOneByNameB(string $name_b) Return the first ChildAliMemberTmp filtered by the name_b column
 * @method     ChildAliMemberTmp findOneBySex(string $sex) Return the first ChildAliMemberTmp filtered by the sex column
 * @method     ChildAliMemberTmp findOneByAge(int $age) Return the first ChildAliMemberTmp filtered by the age column
 * @method     ChildAliMemberTmp findOneByOccupation(string $occupation) Return the first ChildAliMemberTmp filtered by the occupation column
 * @method     ChildAliMemberTmp findOneByStatus(int $status) Return the first ChildAliMemberTmp filtered by the status column
 * @method     ChildAliMemberTmp findOneByMarName(string $mar_name) Return the first ChildAliMemberTmp filtered by the mar_name column
 * @method     ChildAliMemberTmp findOneByMarAge(int $mar_age) Return the first ChildAliMemberTmp filtered by the mar_age column
 * @method     ChildAliMemberTmp findOneByEmail(string $email) Return the first ChildAliMemberTmp filtered by the email column
 * @method     ChildAliMemberTmp findOneByBeneficiaries(string $beneficiaries) Return the first ChildAliMemberTmp filtered by the beneficiaries column
 * @method     ChildAliMemberTmp findOneByRelation(string $relation) Return the first ChildAliMemberTmp filtered by the relation column
 * @method     ChildAliMemberTmp findOneByDistrictid(int $districtId) Return the first ChildAliMemberTmp filtered by the districtId column
 * @method     ChildAliMemberTmp findOneByAmphurid(int $amphurId) Return the first ChildAliMemberTmp filtered by the amphurId column
 * @method     ChildAliMemberTmp findOneByProvinceid(int $provinceId) Return the first ChildAliMemberTmp filtered by the provinceId column
 * @method     ChildAliMemberTmp findOneByFax(string $fax) Return the first ChildAliMemberTmp filtered by the fax column
 * @method     ChildAliMemberTmp findOneByInvCode(string $inv_code) Return the first ChildAliMemberTmp filtered by the inv_code column
 * @method     ChildAliMemberTmp findOneByUid(string $uid) Return the first ChildAliMemberTmp filtered by the uid column
 * @method     ChildAliMemberTmp findOneByPosCur(string $pos_cur) Return the first ChildAliMemberTmp filtered by the pos_cur column
 * @method     ChildAliMemberTmp findOneByPosCur1(string $pos_cur1) Return the first ChildAliMemberTmp filtered by the pos_cur1 column
 * @method     ChildAliMemberTmp findOneByPosCur2(string $pos_cur2) Return the first ChildAliMemberTmp filtered by the pos_cur2 column
 * @method     ChildAliMemberTmp findOneByPosCur3(string $pos_cur3) Return the first ChildAliMemberTmp filtered by the pos_cur3 column
 * @method     ChildAliMemberTmp findOneByPosCur4(string $pos_cur4) Return the first ChildAliMemberTmp filtered by the pos_cur4 column
 * @method     ChildAliMemberTmp findOneByRposCur4(int $rpos_cur4) Return the first ChildAliMemberTmp filtered by the rpos_cur4 column
 * @method     ChildAliMemberTmp findOneByMemdesc(string $memdesc) Return the first ChildAliMemberTmp filtered by the memdesc column
 * @method     ChildAliMemberTmp findOneByCmp(string $cmp) Return the first ChildAliMemberTmp filtered by the cmp column
 * @method     ChildAliMemberTmp findOneByCmp2(string $cmp2) Return the first ChildAliMemberTmp filtered by the cmp2 column
 * @method     ChildAliMemberTmp findOneByCmp3(string $cmp3) Return the first ChildAliMemberTmp filtered by the cmp3 column
 * @method     ChildAliMemberTmp findOneByCcmp(string $ccmp) Return the first ChildAliMemberTmp filtered by the ccmp column
 * @method     ChildAliMemberTmp findOneByCcmp2(string $ccmp2) Return the first ChildAliMemberTmp filtered by the ccmp2 column
 * @method     ChildAliMemberTmp findOneByCcmp3(string $ccmp3) Return the first ChildAliMemberTmp filtered by the ccmp3 column
 * @method     ChildAliMemberTmp findOneByAddress(string $address) Return the first ChildAliMemberTmp filtered by the address column
 * @method     ChildAliMemberTmp findOneByStreet(string $street) Return the first ChildAliMemberTmp filtered by the street column
 * @method     ChildAliMemberTmp findOneByBuilding(string $building) Return the first ChildAliMemberTmp filtered by the building column
 * @method     ChildAliMemberTmp findOneByVillage(string $village) Return the first ChildAliMemberTmp filtered by the village column
 * @method     ChildAliMemberTmp findOneBySoi(string $soi) Return the first ChildAliMemberTmp filtered by the soi column
 * @method     ChildAliMemberTmp findOneByEwallet(string $ewallet) Return the first ChildAliMemberTmp filtered by the ewallet column
 * @method     ChildAliMemberTmp findOneByBmdate1(string $bmdate1) Return the first ChildAliMemberTmp filtered by the bmdate1 column
 * @method     ChildAliMemberTmp findOneByBmdate2(string $bmdate2) Return the first ChildAliMemberTmp filtered by the bmdate2 column
 * @method     ChildAliMemberTmp findOneByBmdate3(string $bmdate3) Return the first ChildAliMemberTmp filtered by the bmdate3 column
 * @method     ChildAliMemberTmp findOneByCbmdate1(string $cbmdate1) Return the first ChildAliMemberTmp filtered by the cbmdate1 column
 * @method     ChildAliMemberTmp findOneByCbmdate2(string $cbmdate2) Return the first ChildAliMemberTmp filtered by the cbmdate2 column
 * @method     ChildAliMemberTmp findOneByCbmdate3(string $cbmdate3) Return the first ChildAliMemberTmp filtered by the cbmdate3 column
 * @method     ChildAliMemberTmp findOneByOnline(int $online) Return the first ChildAliMemberTmp filtered by the online column
 * @method     ChildAliMemberTmp findOneByCnameF(string $cname_f) Return the first ChildAliMemberTmp filtered by the cname_f column
 * @method     ChildAliMemberTmp findOneByCnameT(string $cname_t) Return the first ChildAliMemberTmp filtered by the cname_t column
 * @method     ChildAliMemberTmp findOneByCnameE(string $cname_e) Return the first ChildAliMemberTmp filtered by the cname_e column
 * @method     ChildAliMemberTmp findOneByCnameB(string $cname_b) Return the first ChildAliMemberTmp filtered by the cname_b column
 * @method     ChildAliMemberTmp findOneByCbirthday(string $cbirthday) Return the first ChildAliMemberTmp filtered by the cbirthday column
 * @method     ChildAliMemberTmp findOneByCnational(string $cnational) Return the first ChildAliMemberTmp filtered by the cnational column
 * @method     ChildAliMemberTmp findOneByCidTax(string $cid_tax) Return the first ChildAliMemberTmp filtered by the cid_tax column
 * @method     ChildAliMemberTmp findOneByCidCard(string $cid_card) Return the first ChildAliMemberTmp filtered by the cid_card column
 * @method     ChildAliMemberTmp findOneByCaddress(string $caddress) Return the first ChildAliMemberTmp filtered by the caddress column
 * @method     ChildAliMemberTmp findOneByCbuilding(string $cbuilding) Return the first ChildAliMemberTmp filtered by the cbuilding column
 * @method     ChildAliMemberTmp findOneByCvillage(string $cvillage) Return the first ChildAliMemberTmp filtered by the cvillage column
 * @method     ChildAliMemberTmp findOneByCsoi(string $csoi) Return the first ChildAliMemberTmp filtered by the csoi column
 * @method     ChildAliMemberTmp findOneByCzip(string $czip) Return the first ChildAliMemberTmp filtered by the czip column
 * @method     ChildAliMemberTmp findOneByChomeT(string $chome_t) Return the first ChildAliMemberTmp filtered by the chome_t column
 * @method     ChildAliMemberTmp findOneByCofficeT(string $coffice_t) Return the first ChildAliMemberTmp filtered by the coffice_t column
 * @method     ChildAliMemberTmp findOneByCmobile(string $cmobile) Return the first ChildAliMemberTmp filtered by the cmobile column
 * @method     ChildAliMemberTmp findOneByCfax(string $cfax) Return the first ChildAliMemberTmp filtered by the cfax column
 * @method     ChildAliMemberTmp findOneByCsex(string $csex) Return the first ChildAliMemberTmp filtered by the csex column
 * @method     ChildAliMemberTmp findOneByCemail(string $cemail) Return the first ChildAliMemberTmp filtered by the cemail column
 * @method     ChildAliMemberTmp findOneByCdistrictid(int $cdistrictId) Return the first ChildAliMemberTmp filtered by the cdistrictId column
 * @method     ChildAliMemberTmp findOneByCamphurid(int $camphurId) Return the first ChildAliMemberTmp filtered by the camphurId column
 * @method     ChildAliMemberTmp findOneByCprovinceid(int $cprovinceId) Return the first ChildAliMemberTmp filtered by the cprovinceId column
 * @method     ChildAliMemberTmp findOneByInameF(string $iname_f) Return the first ChildAliMemberTmp filtered by the iname_f column
 * @method     ChildAliMemberTmp findOneByInameT(string $iname_t) Return the first ChildAliMemberTmp filtered by the iname_t column
 * @method     ChildAliMemberTmp findOneByIrelation(string $irelation) Return the first ChildAliMemberTmp filtered by the irelation column
 * @method     ChildAliMemberTmp findOneByIphone(string $iphone) Return the first ChildAliMemberTmp filtered by the iphone column
 * @method     ChildAliMemberTmp findOneByIidCard(string $iid_card) Return the first ChildAliMemberTmp filtered by the iid_card column
 * @method     ChildAliMemberTmp findOneByStatusDoc(int $status_doc) Return the first ChildAliMemberTmp filtered by the status_doc column
 * @method     ChildAliMemberTmp findOneByStatusExpire(int $status_expire) Return the first ChildAliMemberTmp filtered by the status_expire column
 * @method     ChildAliMemberTmp findOneByStatusTerminate(int $status_terminate) Return the first ChildAliMemberTmp filtered by the status_terminate column
 * @method     ChildAliMemberTmp findOneByTerminateDate(string $terminate_date) Return the first ChildAliMemberTmp filtered by the terminate_date column
 * @method     ChildAliMemberTmp findOneByStatusSuspend(int $status_suspend) Return the first ChildAliMemberTmp filtered by the status_suspend column
 * @method     ChildAliMemberTmp findOneBySuspendDate(string $suspend_date) Return the first ChildAliMemberTmp filtered by the suspend_date column
 * @method     ChildAliMemberTmp findOneByStatusBlacklist(int $status_blacklist) Return the first ChildAliMemberTmp filtered by the status_blacklist column
 * @method     ChildAliMemberTmp findOneByStatusAto(int $status_ato) Return the first ChildAliMemberTmp filtered by the status_ato column
 * @method     ChildAliMemberTmp findOneBySletter(int $sletter) Return the first ChildAliMemberTmp filtered by the sletter column
 * @method     ChildAliMemberTmp findOneBySinvCode(string $sinv_code) Return the first ChildAliMemberTmp filtered by the sinv_code column
 * @method     ChildAliMemberTmp findOneByTxtoption(string $txtoption) Return the first ChildAliMemberTmp filtered by the txtoption column
 * @method     ChildAliMemberTmp findOneByMcodeRef(string $mcode_ref) Return the first ChildAliMemberTmp filtered by the mcode_ref column
 * @method     ChildAliMemberTmp findOneByCancel(int $cancel) Return the first ChildAliMemberTmp filtered by the cancel column
 * @method     ChildAliMemberTmp findOneBySbook(int $sbook) Return the first ChildAliMemberTmp filtered by the sbook column
 * @method     ChildAliMemberTmp findOneBySbinvCode(string $sbinv_code) Return the first ChildAliMemberTmp filtered by the sbinv_code column
 * @method     ChildAliMemberTmp findOneByLocationbase(int $locationbase) Return the first ChildAliMemberTmp filtered by the locationbase column
 * @method     ChildAliMemberTmp findOneByCidMobile(string $cid_mobile) Return the first ChildAliMemberTmp filtered by the cid_mobile column
 * @method     ChildAliMemberTmp findOneByBewallet(string $bewallet) Return the first ChildAliMemberTmp filtered by the bewallet column
 * @method     ChildAliMemberTmp findOneByBvoucher(string $bvoucher) Return the first ChildAliMemberTmp filtered by the bvoucher column
 * @method     ChildAliMemberTmp findOneByVoucher(string $voucher) Return the first ChildAliMemberTmp filtered by the voucher column
 * @method     ChildAliMemberTmp findOneByManager(string $manager) Return the first ChildAliMemberTmp filtered by the manager column
 * @method     ChildAliMemberTmp findOneByMtype(string $mtype) Return the first ChildAliMemberTmp filtered by the mtype column
 * @method     ChildAliMemberTmp findOneByUidbase(string $uidbase) Return the first ChildAliMemberTmp filtered by the uidbase column *

 * @method     ChildAliMemberTmp requirePk($key, ConnectionInterface $con = null) Return the ChildAliMemberTmp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOne(ConnectionInterface $con = null) Return the first ChildAliMemberTmp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMemberTmp requireOneById(int $id) Return the first ChildAliMemberTmp filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByTranstype(int $transtype) Return the first ChildAliMemberTmp filtered by the transtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByPaytype(int $paytype) Return the first ChildAliMemberTmp filtered by the paytype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByPaydate(string $paydate) Return the first ChildAliMemberTmp filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCredittype(int $credittype) Return the first ChildAliMemberTmp filtered by the credittype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySendtype(int $sendtype) Return the first ChildAliMemberTmp filtered by the sendtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCstreet(string $cstreet) Return the first ChildAliMemberTmp filtered by the cstreet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMcode(string $mcode) Return the first ChildAliMemberTmp filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByNameF(string $name_f) Return the first ChildAliMemberTmp filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByNameT(string $name_t) Return the first ChildAliMemberTmp filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByNameE(string $name_e) Return the first ChildAliMemberTmp filtered by the name_e column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByPosid(string $posid) Return the first ChildAliMemberTmp filtered by the posid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMdate(string $mdate) Return the first ChildAliMemberTmp filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBirthday(string $birthday) Return the first ChildAliMemberTmp filtered by the birthday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByNational(string $national) Return the first ChildAliMemberTmp filtered by the national column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByIdTax(string $id_tax) Return the first ChildAliMemberTmp filtered by the id_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByIdCard(string $id_card) Return the first ChildAliMemberTmp filtered by the id_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByZip(string $zip) Return the first ChildAliMemberTmp filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByHomeT(string $home_t) Return the first ChildAliMemberTmp filtered by the home_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByOfficeT(string $office_t) Return the first ChildAliMemberTmp filtered by the office_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMobile(string $mobile) Return the first ChildAliMemberTmp filtered by the mobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMcodeAcc(string $mcode_acc) Return the first ChildAliMemberTmp filtered by the mcode_acc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBonusrec(string $bonusrec) Return the first ChildAliMemberTmp filtered by the bonusrec column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBankcode(string $bankcode) Return the first ChildAliMemberTmp filtered by the bankcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBranch(string $branch) Return the first ChildAliMemberTmp filtered by the branch column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByAccType(string $acc_type) Return the first ChildAliMemberTmp filtered by the acc_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByAccNo(string $acc_no) Return the first ChildAliMemberTmp filtered by the acc_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByAccName(string $acc_name) Return the first ChildAliMemberTmp filtered by the acc_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByAccProv(string $acc_prov) Return the first ChildAliMemberTmp filtered by the acc_prov column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySvCode(string $sv_code) Return the first ChildAliMemberTmp filtered by the sv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySpCode(string $sp_code) Return the first ChildAliMemberTmp filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySpName(string $sp_name) Return the first ChildAliMemberTmp filtered by the sp_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByUpaCode(string $upa_code) Return the first ChildAliMemberTmp filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByUpaName(string $upa_name) Return the first ChildAliMemberTmp filtered by the upa_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByLr(int $lr) Return the first ChildAliMemberTmp filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByComplete(string $complete) Return the first ChildAliMemberTmp filtered by the complete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCompdate(string $compdate) Return the first ChildAliMemberTmp filtered by the compdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByModate(string $modate) Return the first ChildAliMemberTmp filtered by the modate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByUsercode(string $usercode) Return the first ChildAliMemberTmp filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByNameB(string $name_b) Return the first ChildAliMemberTmp filtered by the name_b column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySex(string $sex) Return the first ChildAliMemberTmp filtered by the sex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByAge(int $age) Return the first ChildAliMemberTmp filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByOccupation(string $occupation) Return the first ChildAliMemberTmp filtered by the occupation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByStatus(int $status) Return the first ChildAliMemberTmp filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMarName(string $mar_name) Return the first ChildAliMemberTmp filtered by the mar_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMarAge(int $mar_age) Return the first ChildAliMemberTmp filtered by the mar_age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByEmail(string $email) Return the first ChildAliMemberTmp filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBeneficiaries(string $beneficiaries) Return the first ChildAliMemberTmp filtered by the beneficiaries column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByRelation(string $relation) Return the first ChildAliMemberTmp filtered by the relation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByDistrictid(int $districtId) Return the first ChildAliMemberTmp filtered by the districtId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByAmphurid(int $amphurId) Return the first ChildAliMemberTmp filtered by the amphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByProvinceid(int $provinceId) Return the first ChildAliMemberTmp filtered by the provinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByFax(string $fax) Return the first ChildAliMemberTmp filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByInvCode(string $inv_code) Return the first ChildAliMemberTmp filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByUid(string $uid) Return the first ChildAliMemberTmp filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByPosCur(string $pos_cur) Return the first ChildAliMemberTmp filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByPosCur1(string $pos_cur1) Return the first ChildAliMemberTmp filtered by the pos_cur1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByPosCur2(string $pos_cur2) Return the first ChildAliMemberTmp filtered by the pos_cur2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByPosCur3(string $pos_cur3) Return the first ChildAliMemberTmp filtered by the pos_cur3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByPosCur4(string $pos_cur4) Return the first ChildAliMemberTmp filtered by the pos_cur4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByRposCur4(int $rpos_cur4) Return the first ChildAliMemberTmp filtered by the rpos_cur4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMemdesc(string $memdesc) Return the first ChildAliMemberTmp filtered by the memdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCmp(string $cmp) Return the first ChildAliMemberTmp filtered by the cmp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCmp2(string $cmp2) Return the first ChildAliMemberTmp filtered by the cmp2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCmp3(string $cmp3) Return the first ChildAliMemberTmp filtered by the cmp3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCcmp(string $ccmp) Return the first ChildAliMemberTmp filtered by the ccmp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCcmp2(string $ccmp2) Return the first ChildAliMemberTmp filtered by the ccmp2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCcmp3(string $ccmp3) Return the first ChildAliMemberTmp filtered by the ccmp3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByAddress(string $address) Return the first ChildAliMemberTmp filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByStreet(string $street) Return the first ChildAliMemberTmp filtered by the street column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBuilding(string $building) Return the first ChildAliMemberTmp filtered by the building column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByVillage(string $village) Return the first ChildAliMemberTmp filtered by the village column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySoi(string $soi) Return the first ChildAliMemberTmp filtered by the soi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByEwallet(string $ewallet) Return the first ChildAliMemberTmp filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBmdate1(string $bmdate1) Return the first ChildAliMemberTmp filtered by the bmdate1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBmdate2(string $bmdate2) Return the first ChildAliMemberTmp filtered by the bmdate2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBmdate3(string $bmdate3) Return the first ChildAliMemberTmp filtered by the bmdate3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCbmdate1(string $cbmdate1) Return the first ChildAliMemberTmp filtered by the cbmdate1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCbmdate2(string $cbmdate2) Return the first ChildAliMemberTmp filtered by the cbmdate2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCbmdate3(string $cbmdate3) Return the first ChildAliMemberTmp filtered by the cbmdate3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByOnline(int $online) Return the first ChildAliMemberTmp filtered by the online column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCnameF(string $cname_f) Return the first ChildAliMemberTmp filtered by the cname_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCnameT(string $cname_t) Return the first ChildAliMemberTmp filtered by the cname_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCnameE(string $cname_e) Return the first ChildAliMemberTmp filtered by the cname_e column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCnameB(string $cname_b) Return the first ChildAliMemberTmp filtered by the cname_b column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCbirthday(string $cbirthday) Return the first ChildAliMemberTmp filtered by the cbirthday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCnational(string $cnational) Return the first ChildAliMemberTmp filtered by the cnational column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCidTax(string $cid_tax) Return the first ChildAliMemberTmp filtered by the cid_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCidCard(string $cid_card) Return the first ChildAliMemberTmp filtered by the cid_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCaddress(string $caddress) Return the first ChildAliMemberTmp filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCbuilding(string $cbuilding) Return the first ChildAliMemberTmp filtered by the cbuilding column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCvillage(string $cvillage) Return the first ChildAliMemberTmp filtered by the cvillage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCsoi(string $csoi) Return the first ChildAliMemberTmp filtered by the csoi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCzip(string $czip) Return the first ChildAliMemberTmp filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByChomeT(string $chome_t) Return the first ChildAliMemberTmp filtered by the chome_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCofficeT(string $coffice_t) Return the first ChildAliMemberTmp filtered by the coffice_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCmobile(string $cmobile) Return the first ChildAliMemberTmp filtered by the cmobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCfax(string $cfax) Return the first ChildAliMemberTmp filtered by the cfax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCsex(string $csex) Return the first ChildAliMemberTmp filtered by the csex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCemail(string $cemail) Return the first ChildAliMemberTmp filtered by the cemail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCdistrictid(int $cdistrictId) Return the first ChildAliMemberTmp filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCamphurid(int $camphurId) Return the first ChildAliMemberTmp filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCprovinceid(int $cprovinceId) Return the first ChildAliMemberTmp filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByInameF(string $iname_f) Return the first ChildAliMemberTmp filtered by the iname_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByInameT(string $iname_t) Return the first ChildAliMemberTmp filtered by the iname_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByIrelation(string $irelation) Return the first ChildAliMemberTmp filtered by the irelation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByIphone(string $iphone) Return the first ChildAliMemberTmp filtered by the iphone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByIidCard(string $iid_card) Return the first ChildAliMemberTmp filtered by the iid_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByStatusDoc(int $status_doc) Return the first ChildAliMemberTmp filtered by the status_doc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByStatusExpire(int $status_expire) Return the first ChildAliMemberTmp filtered by the status_expire column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByStatusTerminate(int $status_terminate) Return the first ChildAliMemberTmp filtered by the status_terminate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByTerminateDate(string $terminate_date) Return the first ChildAliMemberTmp filtered by the terminate_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByStatusSuspend(int $status_suspend) Return the first ChildAliMemberTmp filtered by the status_suspend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySuspendDate(string $suspend_date) Return the first ChildAliMemberTmp filtered by the suspend_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByStatusBlacklist(int $status_blacklist) Return the first ChildAliMemberTmp filtered by the status_blacklist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByStatusAto(int $status_ato) Return the first ChildAliMemberTmp filtered by the status_ato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySletter(int $sletter) Return the first ChildAliMemberTmp filtered by the sletter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySinvCode(string $sinv_code) Return the first ChildAliMemberTmp filtered by the sinv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByTxtoption(string $txtoption) Return the first ChildAliMemberTmp filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMcodeRef(string $mcode_ref) Return the first ChildAliMemberTmp filtered by the mcode_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCancel(int $cancel) Return the first ChildAliMemberTmp filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySbook(int $sbook) Return the first ChildAliMemberTmp filtered by the sbook column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneBySbinvCode(string $sbinv_code) Return the first ChildAliMemberTmp filtered by the sbinv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByLocationbase(int $locationbase) Return the first ChildAliMemberTmp filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByCidMobile(string $cid_mobile) Return the first ChildAliMemberTmp filtered by the cid_mobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBewallet(string $bewallet) Return the first ChildAliMemberTmp filtered by the bewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByBvoucher(string $bvoucher) Return the first ChildAliMemberTmp filtered by the bvoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByVoucher(string $voucher) Return the first ChildAliMemberTmp filtered by the voucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByManager(string $manager) Return the first ChildAliMemberTmp filtered by the manager column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByMtype(string $mtype) Return the first ChildAliMemberTmp filtered by the mtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMemberTmp requireOneByUidbase(string $uidbase) Return the first ChildAliMemberTmp filtered by the uidbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMemberTmp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMemberTmp objects based on current ModelCriteria
 * @method     ChildAliMemberTmp[]|ObjectCollection findById(int $id) Return ChildAliMemberTmp objects filtered by the id column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByTranstype(int $transtype) Return ChildAliMemberTmp objects filtered by the transtype column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByPaytype(int $paytype) Return ChildAliMemberTmp objects filtered by the paytype column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliMemberTmp objects filtered by the paydate column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCredittype(int $credittype) Return ChildAliMemberTmp objects filtered by the credittype column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySendtype(int $sendtype) Return ChildAliMemberTmp objects filtered by the sendtype column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCstreet(string $cstreet) Return ChildAliMemberTmp objects filtered by the cstreet column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMcode(string $mcode) Return ChildAliMemberTmp objects filtered by the mcode column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByNameF(string $name_f) Return ChildAliMemberTmp objects filtered by the name_f column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByNameT(string $name_t) Return ChildAliMemberTmp objects filtered by the name_t column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByNameE(string $name_e) Return ChildAliMemberTmp objects filtered by the name_e column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByPosid(string $posid) Return ChildAliMemberTmp objects filtered by the posid column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMdate(string $mdate) Return ChildAliMemberTmp objects filtered by the mdate column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBirthday(string $birthday) Return ChildAliMemberTmp objects filtered by the birthday column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByNational(string $national) Return ChildAliMemberTmp objects filtered by the national column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByIdTax(string $id_tax) Return ChildAliMemberTmp objects filtered by the id_tax column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByIdCard(string $id_card) Return ChildAliMemberTmp objects filtered by the id_card column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByZip(string $zip) Return ChildAliMemberTmp objects filtered by the zip column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByHomeT(string $home_t) Return ChildAliMemberTmp objects filtered by the home_t column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByOfficeT(string $office_t) Return ChildAliMemberTmp objects filtered by the office_t column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMobile(string $mobile) Return ChildAliMemberTmp objects filtered by the mobile column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMcodeAcc(string $mcode_acc) Return ChildAliMemberTmp objects filtered by the mcode_acc column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBonusrec(string $bonusrec) Return ChildAliMemberTmp objects filtered by the bonusrec column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBankcode(string $bankcode) Return ChildAliMemberTmp objects filtered by the bankcode column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBranch(string $branch) Return ChildAliMemberTmp objects filtered by the branch column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByAccType(string $acc_type) Return ChildAliMemberTmp objects filtered by the acc_type column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByAccNo(string $acc_no) Return ChildAliMemberTmp objects filtered by the acc_no column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByAccName(string $acc_name) Return ChildAliMemberTmp objects filtered by the acc_name column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByAccProv(string $acc_prov) Return ChildAliMemberTmp objects filtered by the acc_prov column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySvCode(string $sv_code) Return ChildAliMemberTmp objects filtered by the sv_code column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliMemberTmp objects filtered by the sp_code column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySpName(string $sp_name) Return ChildAliMemberTmp objects filtered by the sp_name column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliMemberTmp objects filtered by the upa_code column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByUpaName(string $upa_name) Return ChildAliMemberTmp objects filtered by the upa_name column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByLr(int $lr) Return ChildAliMemberTmp objects filtered by the lr column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByComplete(string $complete) Return ChildAliMemberTmp objects filtered by the complete column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCompdate(string $compdate) Return ChildAliMemberTmp objects filtered by the compdate column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByModate(string $modate) Return ChildAliMemberTmp objects filtered by the modate column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliMemberTmp objects filtered by the usercode column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByNameB(string $name_b) Return ChildAliMemberTmp objects filtered by the name_b column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySex(string $sex) Return ChildAliMemberTmp objects filtered by the sex column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByAge(int $age) Return ChildAliMemberTmp objects filtered by the age column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByOccupation(string $occupation) Return ChildAliMemberTmp objects filtered by the occupation column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByStatus(int $status) Return ChildAliMemberTmp objects filtered by the status column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMarName(string $mar_name) Return ChildAliMemberTmp objects filtered by the mar_name column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMarAge(int $mar_age) Return ChildAliMemberTmp objects filtered by the mar_age column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByEmail(string $email) Return ChildAliMemberTmp objects filtered by the email column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBeneficiaries(string $beneficiaries) Return ChildAliMemberTmp objects filtered by the beneficiaries column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByRelation(string $relation) Return ChildAliMemberTmp objects filtered by the relation column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByDistrictid(int $districtId) Return ChildAliMemberTmp objects filtered by the districtId column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByAmphurid(int $amphurId) Return ChildAliMemberTmp objects filtered by the amphurId column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByProvinceid(int $provinceId) Return ChildAliMemberTmp objects filtered by the provinceId column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByFax(string $fax) Return ChildAliMemberTmp objects filtered by the fax column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliMemberTmp objects filtered by the inv_code column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByUid(string $uid) Return ChildAliMemberTmp objects filtered by the uid column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliMemberTmp objects filtered by the pos_cur column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByPosCur1(string $pos_cur1) Return ChildAliMemberTmp objects filtered by the pos_cur1 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByPosCur2(string $pos_cur2) Return ChildAliMemberTmp objects filtered by the pos_cur2 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByPosCur3(string $pos_cur3) Return ChildAliMemberTmp objects filtered by the pos_cur3 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByPosCur4(string $pos_cur4) Return ChildAliMemberTmp objects filtered by the pos_cur4 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByRposCur4(int $rpos_cur4) Return ChildAliMemberTmp objects filtered by the rpos_cur4 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMemdesc(string $memdesc) Return ChildAliMemberTmp objects filtered by the memdesc column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCmp(string $cmp) Return ChildAliMemberTmp objects filtered by the cmp column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCmp2(string $cmp2) Return ChildAliMemberTmp objects filtered by the cmp2 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCmp3(string $cmp3) Return ChildAliMemberTmp objects filtered by the cmp3 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCcmp(string $ccmp) Return ChildAliMemberTmp objects filtered by the ccmp column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCcmp2(string $ccmp2) Return ChildAliMemberTmp objects filtered by the ccmp2 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCcmp3(string $ccmp3) Return ChildAliMemberTmp objects filtered by the ccmp3 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByAddress(string $address) Return ChildAliMemberTmp objects filtered by the address column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByStreet(string $street) Return ChildAliMemberTmp objects filtered by the street column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBuilding(string $building) Return ChildAliMemberTmp objects filtered by the building column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByVillage(string $village) Return ChildAliMemberTmp objects filtered by the village column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySoi(string $soi) Return ChildAliMemberTmp objects filtered by the soi column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliMemberTmp objects filtered by the ewallet column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBmdate1(string $bmdate1) Return ChildAliMemberTmp objects filtered by the bmdate1 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBmdate2(string $bmdate2) Return ChildAliMemberTmp objects filtered by the bmdate2 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBmdate3(string $bmdate3) Return ChildAliMemberTmp objects filtered by the bmdate3 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCbmdate1(string $cbmdate1) Return ChildAliMemberTmp objects filtered by the cbmdate1 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCbmdate2(string $cbmdate2) Return ChildAliMemberTmp objects filtered by the cbmdate2 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCbmdate3(string $cbmdate3) Return ChildAliMemberTmp objects filtered by the cbmdate3 column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByOnline(int $online) Return ChildAliMemberTmp objects filtered by the online column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCnameF(string $cname_f) Return ChildAliMemberTmp objects filtered by the cname_f column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCnameT(string $cname_t) Return ChildAliMemberTmp objects filtered by the cname_t column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCnameE(string $cname_e) Return ChildAliMemberTmp objects filtered by the cname_e column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCnameB(string $cname_b) Return ChildAliMemberTmp objects filtered by the cname_b column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCbirthday(string $cbirthday) Return ChildAliMemberTmp objects filtered by the cbirthday column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCnational(string $cnational) Return ChildAliMemberTmp objects filtered by the cnational column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCidTax(string $cid_tax) Return ChildAliMemberTmp objects filtered by the cid_tax column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCidCard(string $cid_card) Return ChildAliMemberTmp objects filtered by the cid_card column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliMemberTmp objects filtered by the caddress column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCbuilding(string $cbuilding) Return ChildAliMemberTmp objects filtered by the cbuilding column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCvillage(string $cvillage) Return ChildAliMemberTmp objects filtered by the cvillage column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCsoi(string $csoi) Return ChildAliMemberTmp objects filtered by the csoi column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCzip(string $czip) Return ChildAliMemberTmp objects filtered by the czip column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByChomeT(string $chome_t) Return ChildAliMemberTmp objects filtered by the chome_t column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCofficeT(string $coffice_t) Return ChildAliMemberTmp objects filtered by the coffice_t column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCmobile(string $cmobile) Return ChildAliMemberTmp objects filtered by the cmobile column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCfax(string $cfax) Return ChildAliMemberTmp objects filtered by the cfax column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCsex(string $csex) Return ChildAliMemberTmp objects filtered by the csex column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCemail(string $cemail) Return ChildAliMemberTmp objects filtered by the cemail column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCdistrictid(int $cdistrictId) Return ChildAliMemberTmp objects filtered by the cdistrictId column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCamphurid(int $camphurId) Return ChildAliMemberTmp objects filtered by the camphurId column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCprovinceid(int $cprovinceId) Return ChildAliMemberTmp objects filtered by the cprovinceId column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByInameF(string $iname_f) Return ChildAliMemberTmp objects filtered by the iname_f column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByInameT(string $iname_t) Return ChildAliMemberTmp objects filtered by the iname_t column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByIrelation(string $irelation) Return ChildAliMemberTmp objects filtered by the irelation column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByIphone(string $iphone) Return ChildAliMemberTmp objects filtered by the iphone column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByIidCard(string $iid_card) Return ChildAliMemberTmp objects filtered by the iid_card column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByStatusDoc(int $status_doc) Return ChildAliMemberTmp objects filtered by the status_doc column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByStatusExpire(int $status_expire) Return ChildAliMemberTmp objects filtered by the status_expire column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByStatusTerminate(int $status_terminate) Return ChildAliMemberTmp objects filtered by the status_terminate column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByTerminateDate(string $terminate_date) Return ChildAliMemberTmp objects filtered by the terminate_date column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByStatusSuspend(int $status_suspend) Return ChildAliMemberTmp objects filtered by the status_suspend column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySuspendDate(string $suspend_date) Return ChildAliMemberTmp objects filtered by the suspend_date column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByStatusBlacklist(int $status_blacklist) Return ChildAliMemberTmp objects filtered by the status_blacklist column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByStatusAto(int $status_ato) Return ChildAliMemberTmp objects filtered by the status_ato column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySletter(int $sletter) Return ChildAliMemberTmp objects filtered by the sletter column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySinvCode(string $sinv_code) Return ChildAliMemberTmp objects filtered by the sinv_code column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliMemberTmp objects filtered by the txtoption column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMcodeRef(string $mcode_ref) Return ChildAliMemberTmp objects filtered by the mcode_ref column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCancel(int $cancel) Return ChildAliMemberTmp objects filtered by the cancel column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySbook(int $sbook) Return ChildAliMemberTmp objects filtered by the sbook column
 * @method     ChildAliMemberTmp[]|ObjectCollection findBySbinvCode(string $sbinv_code) Return ChildAliMemberTmp objects filtered by the sbinv_code column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliMemberTmp objects filtered by the locationbase column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByCidMobile(string $cid_mobile) Return ChildAliMemberTmp objects filtered by the cid_mobile column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBewallet(string $bewallet) Return ChildAliMemberTmp objects filtered by the bewallet column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByBvoucher(string $bvoucher) Return ChildAliMemberTmp objects filtered by the bvoucher column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByVoucher(string $voucher) Return ChildAliMemberTmp objects filtered by the voucher column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByManager(string $manager) Return ChildAliMemberTmp objects filtered by the manager column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByMtype(string $mtype) Return ChildAliMemberTmp objects filtered by the mtype column
 * @method     ChildAliMemberTmp[]|ObjectCollection findByUidbase(string $uidbase) Return ChildAliMemberTmp objects filtered by the uidbase column
 * @method     ChildAliMemberTmp[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMemberTmpQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMemberTmpQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMemberTmp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMemberTmpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMemberTmpQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMemberTmpQuery) {
            return $criteria;
        }
        $query = new ChildAliMemberTmpQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAliMemberTmp|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMemberTmpTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMemberTmpTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAliMemberTmp A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, transtype, paytype, paydate, credittype, sendtype, cstreet, mcode, name_f, name_t, name_e, posid, mdate, birthday, national, id_tax, id_card, zip, home_t, office_t, mobile, mcode_acc, bonusrec, bankcode, branch, acc_type, acc_no, acc_name, acc_prov, sv_code, sp_code, sp_name, upa_code, upa_name, lr, complete, compdate, modate, usercode, name_b, sex, age, occupation, status, mar_name, mar_age, email, beneficiaries, relation, districtId, amphurId, provinceId, fax, inv_code, uid, pos_cur, pos_cur1, pos_cur2, pos_cur3, pos_cur4, rpos_cur4, memdesc, cmp, cmp2, cmp3, ccmp, ccmp2, ccmp3, address, street, building, village, soi, ewallet, bmdate1, bmdate2, bmdate3, cbmdate1, cbmdate2, cbmdate3, online, cname_f, cname_t, cname_e, cname_b, cbirthday, cnational, cid_tax, cid_card, caddress, cbuilding, cvillage, csoi, czip, chome_t, coffice_t, cmobile, cfax, csex, cemail, cdistrictId, camphurId, cprovinceId, iname_f, iname_t, irelation, iphone, iid_card, status_doc, status_expire, status_terminate, terminate_date, status_suspend, suspend_date, status_blacklist, status_ato, sletter, sinv_code, txtoption, mcode_ref, cancel, sbook, sbinv_code, locationbase, cid_mobile, bewallet, bvoucher, voucher, manager, mtype, uidbase FROM ali_member_tmp WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAliMemberTmp $obj */
            $obj = new ChildAliMemberTmp();
            $obj->hydrate($row);
            AliMemberTmpTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAliMemberTmp|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the transtype column
     *
     * Example usage:
     * <code>
     * $query->filterByTranstype(1234); // WHERE transtype = 1234
     * $query->filterByTranstype(array(12, 34)); // WHERE transtype IN (12, 34)
     * $query->filterByTranstype(array('min' => 12)); // WHERE transtype > 12
     * </code>
     *
     * @param     mixed $transtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByTranstype($transtype = null, $comparison = null)
    {
        if (is_array($transtype)) {
            $useMinMax = false;
            if (isset($transtype['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_TRANSTYPE, $transtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transtype['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_TRANSTYPE, $transtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_TRANSTYPE, $transtype, $comparison);
    }

    /**
     * Filter the query on the paytype column
     *
     * Example usage:
     * <code>
     * $query->filterByPaytype(1234); // WHERE paytype = 1234
     * $query->filterByPaytype(array(12, 34)); // WHERE paytype IN (12, 34)
     * $query->filterByPaytype(array('min' => 12)); // WHERE paytype > 12
     * </code>
     *
     * @param     mixed $paytype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPaytype($paytype = null, $comparison = null)
    {
        if (is_array($paytype)) {
            $useMinMax = false;
            if (isset($paytype['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_PAYTYPE, $paytype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paytype['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_PAYTYPE, $paytype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_PAYTYPE, $paytype, $comparison);
    }

    /**
     * Filter the query on the paydate column
     *
     * Example usage:
     * <code>
     * $query->filterByPaydate('2011-03-14'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate('now'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate(array('max' => 'yesterday')); // WHERE paydate > '2011-03-13'
     * </code>
     *
     * @param     mixed $paydate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_PAYDATE, $paydate, $comparison);
    }

    /**
     * Filter the query on the credittype column
     *
     * Example usage:
     * <code>
     * $query->filterByCredittype(1234); // WHERE credittype = 1234
     * $query->filterByCredittype(array(12, 34)); // WHERE credittype IN (12, 34)
     * $query->filterByCredittype(array('min' => 12)); // WHERE credittype > 12
     * </code>
     *
     * @param     mixed $credittype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCredittype($credittype = null, $comparison = null)
    {
        if (is_array($credittype)) {
            $useMinMax = false;
            if (isset($credittype['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CREDITTYPE, $credittype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($credittype['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CREDITTYPE, $credittype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CREDITTYPE, $credittype, $comparison);
    }

    /**
     * Filter the query on the sendtype column
     *
     * Example usage:
     * <code>
     * $query->filterBySendtype(1234); // WHERE sendtype = 1234
     * $query->filterBySendtype(array(12, 34)); // WHERE sendtype IN (12, 34)
     * $query->filterBySendtype(array('min' => 12)); // WHERE sendtype > 12
     * </code>
     *
     * @param     mixed $sendtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySendtype($sendtype = null, $comparison = null)
    {
        if (is_array($sendtype)) {
            $useMinMax = false;
            if (isset($sendtype['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_SENDTYPE, $sendtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sendtype['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_SENDTYPE, $sendtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SENDTYPE, $sendtype, $comparison);
    }

    /**
     * Filter the query on the cstreet column
     *
     * Example usage:
     * <code>
     * $query->filterByCstreet('fooValue');   // WHERE cstreet = 'fooValue'
     * $query->filterByCstreet('%fooValue%', Criteria::LIKE); // WHERE cstreet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cstreet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCstreet($cstreet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cstreet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CSTREET, $cstreet, $comparison);
    }

    /**
     * Filter the query on the mcode column
     *
     * Example usage:
     * <code>
     * $query->filterByMcode('fooValue');   // WHERE mcode = 'fooValue'
     * $query->filterByMcode('%fooValue%', Criteria::LIKE); // WHERE mcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the name_f column
     *
     * Example usage:
     * <code>
     * $query->filterByNameF('fooValue');   // WHERE name_f = 'fooValue'
     * $query->filterByNameF('%fooValue%', Criteria::LIKE); // WHERE name_f LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameF The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_NAME_F, $nameF, $comparison);
    }

    /**
     * Filter the query on the name_t column
     *
     * Example usage:
     * <code>
     * $query->filterByNameT('fooValue');   // WHERE name_t = 'fooValue'
     * $query->filterByNameT('%fooValue%', Criteria::LIKE); // WHERE name_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the name_e column
     *
     * Example usage:
     * <code>
     * $query->filterByNameE('fooValue');   // WHERE name_e = 'fooValue'
     * $query->filterByNameE('%fooValue%', Criteria::LIKE); // WHERE name_e LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameE The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByNameE($nameE = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameE)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_NAME_E, $nameE, $comparison);
    }

    /**
     * Filter the query on the posid column
     *
     * Example usage:
     * <code>
     * $query->filterByPosid('fooValue');   // WHERE posid = 'fooValue'
     * $query->filterByPosid('%fooValue%', Criteria::LIKE); // WHERE posid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPosid($posid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_POSID, $posid, $comparison);
    }

    /**
     * Filter the query on the mdate column
     *
     * Example usage:
     * <code>
     * $query->filterByMdate('fooValue');   // WHERE mdate = 'fooValue'
     * $query->filterByMdate('%fooValue%', Criteria::LIKE); // WHERE mdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MDATE, $mdate, $comparison);
    }

    /**
     * Filter the query on the birthday column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthday('fooValue');   // WHERE birthday = 'fooValue'
     * $query->filterByBirthday('%fooValue%', Criteria::LIKE); // WHERE birthday LIKE '%fooValue%'
     * </code>
     *
     * @param     string $birthday The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBirthday($birthday = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($birthday)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BIRTHDAY, $birthday, $comparison);
    }

    /**
     * Filter the query on the national column
     *
     * Example usage:
     * <code>
     * $query->filterByNational('fooValue');   // WHERE national = 'fooValue'
     * $query->filterByNational('%fooValue%', Criteria::LIKE); // WHERE national LIKE '%fooValue%'
     * </code>
     *
     * @param     string $national The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByNational($national = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($national)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_NATIONAL, $national, $comparison);
    }

    /**
     * Filter the query on the id_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTax('fooValue');   // WHERE id_tax = 'fooValue'
     * $query->filterByIdTax('%fooValue%', Criteria::LIKE); // WHERE id_tax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idTax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByIdTax($idTax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idTax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ID_TAX, $idTax, $comparison);
    }

    /**
     * Filter the query on the id_card column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCard('fooValue');   // WHERE id_card = 'fooValue'
     * $query->filterByIdCard('%fooValue%', Criteria::LIKE); // WHERE id_card LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idCard The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByIdCard($idCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ID_CARD, $idCard, $comparison);
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%', Criteria::LIKE); // WHERE zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the home_t column
     *
     * Example usage:
     * <code>
     * $query->filterByHomeT('fooValue');   // WHERE home_t = 'fooValue'
     * $query->filterByHomeT('%fooValue%', Criteria::LIKE); // WHERE home_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $homeT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByHomeT($homeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($homeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_HOME_T, $homeT, $comparison);
    }

    /**
     * Filter the query on the office_t column
     *
     * Example usage:
     * <code>
     * $query->filterByOfficeT('fooValue');   // WHERE office_t = 'fooValue'
     * $query->filterByOfficeT('%fooValue%', Criteria::LIKE); // WHERE office_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $officeT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByOfficeT($officeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($officeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_OFFICE_T, $officeT, $comparison);
    }

    /**
     * Filter the query on the mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByMobile('fooValue');   // WHERE mobile = 'fooValue'
     * $query->filterByMobile('%fooValue%', Criteria::LIKE); // WHERE mobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobile The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMobile($mobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MOBILE, $mobile, $comparison);
    }

    /**
     * Filter the query on the mcode_acc column
     *
     * Example usage:
     * <code>
     * $query->filterByMcodeAcc('fooValue');   // WHERE mcode_acc = 'fooValue'
     * $query->filterByMcodeAcc('%fooValue%', Criteria::LIKE); // WHERE mcode_acc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcodeAcc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMcodeAcc($mcodeAcc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeAcc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MCODE_ACC, $mcodeAcc, $comparison);
    }

    /**
     * Filter the query on the bonusrec column
     *
     * Example usage:
     * <code>
     * $query->filterByBonusrec('fooValue');   // WHERE bonusrec = 'fooValue'
     * $query->filterByBonusrec('%fooValue%', Criteria::LIKE); // WHERE bonusrec LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bonusrec The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBonusrec($bonusrec = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bonusrec)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BONUSREC, $bonusrec, $comparison);
    }

    /**
     * Filter the query on the bankcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBankcode('fooValue');   // WHERE bankcode = 'fooValue'
     * $query->filterByBankcode('%fooValue%', Criteria::LIKE); // WHERE bankcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBankcode($bankcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BANKCODE, $bankcode, $comparison);
    }

    /**
     * Filter the query on the branch column
     *
     * Example usage:
     * <code>
     * $query->filterByBranch('fooValue');   // WHERE branch = 'fooValue'
     * $query->filterByBranch('%fooValue%', Criteria::LIKE); // WHERE branch LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branch The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBranch($branch = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branch)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BRANCH, $branch, $comparison);
    }

    /**
     * Filter the query on the acc_type column
     *
     * Example usage:
     * <code>
     * $query->filterByAccType('fooValue');   // WHERE acc_type = 'fooValue'
     * $query->filterByAccType('%fooValue%', Criteria::LIKE); // WHERE acc_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByAccType($accType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ACC_TYPE, $accType, $comparison);
    }

    /**
     * Filter the query on the acc_no column
     *
     * Example usage:
     * <code>
     * $query->filterByAccNo('fooValue');   // WHERE acc_no = 'fooValue'
     * $query->filterByAccNo('%fooValue%', Criteria::LIKE); // WHERE acc_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accNo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByAccNo($accNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accNo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ACC_NO, $accNo, $comparison);
    }

    /**
     * Filter the query on the acc_name column
     *
     * Example usage:
     * <code>
     * $query->filterByAccName('fooValue');   // WHERE acc_name = 'fooValue'
     * $query->filterByAccName('%fooValue%', Criteria::LIKE); // WHERE acc_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByAccName($accName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ACC_NAME, $accName, $comparison);
    }

    /**
     * Filter the query on the acc_prov column
     *
     * Example usage:
     * <code>
     * $query->filterByAccProv('fooValue');   // WHERE acc_prov = 'fooValue'
     * $query->filterByAccProv('%fooValue%', Criteria::LIKE); // WHERE acc_prov LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accProv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByAccProv($accProv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accProv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ACC_PROV, $accProv, $comparison);
    }

    /**
     * Filter the query on the sv_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySvCode('fooValue');   // WHERE sv_code = 'fooValue'
     * $query->filterBySvCode('%fooValue%', Criteria::LIKE); // WHERE sv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $svCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySvCode($svCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($svCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SV_CODE, $svCode, $comparison);
    }

    /**
     * Filter the query on the sp_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySpCode('fooValue');   // WHERE sp_code = 'fooValue'
     * $query->filterBySpCode('%fooValue%', Criteria::LIKE); // WHERE sp_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SP_CODE, $spCode, $comparison);
    }

    /**
     * Filter the query on the sp_name column
     *
     * Example usage:
     * <code>
     * $query->filterBySpName('fooValue');   // WHERE sp_name = 'fooValue'
     * $query->filterBySpName('%fooValue%', Criteria::LIKE); // WHERE sp_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySpName($spName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SP_NAME, $spName, $comparison);
    }

    /**
     * Filter the query on the upa_code column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaCode('fooValue');   // WHERE upa_code = 'fooValue'
     * $query->filterByUpaCode('%fooValue%', Criteria::LIKE); // WHERE upa_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_UPA_CODE, $upaCode, $comparison);
    }

    /**
     * Filter the query on the upa_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaName('fooValue');   // WHERE upa_name = 'fooValue'
     * $query->filterByUpaName('%fooValue%', Criteria::LIKE); // WHERE upa_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByUpaName($upaName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_UPA_NAME, $upaName, $comparison);
    }

    /**
     * Filter the query on the lr column
     *
     * Example usage:
     * <code>
     * $query->filterByLr(1234); // WHERE lr = 1234
     * $query->filterByLr(array(12, 34)); // WHERE lr IN (12, 34)
     * $query->filterByLr(array('min' => 12)); // WHERE lr > 12
     * </code>
     *
     * @param     mixed $lr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (is_array($lr)) {
            $useMinMax = false;
            if (isset($lr['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_LR, $lr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lr['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_LR, $lr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_LR, $lr, $comparison);
    }

    /**
     * Filter the query on the complete column
     *
     * Example usage:
     * <code>
     * $query->filterByComplete('fooValue');   // WHERE complete = 'fooValue'
     * $query->filterByComplete('%fooValue%', Criteria::LIKE); // WHERE complete LIKE '%fooValue%'
     * </code>
     *
     * @param     string $complete The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByComplete($complete = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($complete)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_COMPLETE, $complete, $comparison);
    }

    /**
     * Filter the query on the compdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCompdate('fooValue');   // WHERE compdate = 'fooValue'
     * $query->filterByCompdate('%fooValue%', Criteria::LIKE); // WHERE compdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $compdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCompdate($compdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($compdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_COMPDATE, $compdate, $comparison);
    }

    /**
     * Filter the query on the modate column
     *
     * Example usage:
     * <code>
     * $query->filterByModate('fooValue');   // WHERE modate = 'fooValue'
     * $query->filterByModate('%fooValue%', Criteria::LIKE); // WHERE modate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $modate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByModate($modate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($modate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MODATE, $modate, $comparison);
    }

    /**
     * Filter the query on the usercode column
     *
     * Example usage:
     * <code>
     * $query->filterByUsercode('fooValue');   // WHERE usercode = 'fooValue'
     * $query->filterByUsercode('%fooValue%', Criteria::LIKE); // WHERE usercode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usercode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_USERCODE, $usercode, $comparison);
    }

    /**
     * Filter the query on the name_b column
     *
     * Example usage:
     * <code>
     * $query->filterByNameB('fooValue');   // WHERE name_b = 'fooValue'
     * $query->filterByNameB('%fooValue%', Criteria::LIKE); // WHERE name_b LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameB The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByNameB($nameB = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameB)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_NAME_B, $nameB, $comparison);
    }

    /**
     * Filter the query on the sex column
     *
     * Example usage:
     * <code>
     * $query->filterBySex('fooValue');   // WHERE sex = 'fooValue'
     * $query->filterBySex('%fooValue%', Criteria::LIKE); // WHERE sex LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sex The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sex)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SEX, $sex, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge(1234); // WHERE age = 1234
     * $query->filterByAge(array(12, 34)); // WHERE age IN (12, 34)
     * $query->filterByAge(array('min' => 12)); // WHERE age > 12
     * </code>
     *
     * @param     mixed $age The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_AGE, $age, $comparison);
    }

    /**
     * Filter the query on the occupation column
     *
     * Example usage:
     * <code>
     * $query->filterByOccupation('fooValue');   // WHERE occupation = 'fooValue'
     * $query->filterByOccupation('%fooValue%', Criteria::LIKE); // WHERE occupation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $occupation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByOccupation($occupation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($occupation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_OCCUPATION, $occupation, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the mar_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMarName('fooValue');   // WHERE mar_name = 'fooValue'
     * $query->filterByMarName('%fooValue%', Criteria::LIKE); // WHERE mar_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $marName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMarName($marName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MAR_NAME, $marName, $comparison);
    }

    /**
     * Filter the query on the mar_age column
     *
     * Example usage:
     * <code>
     * $query->filterByMarAge(1234); // WHERE mar_age = 1234
     * $query->filterByMarAge(array(12, 34)); // WHERE mar_age IN (12, 34)
     * $query->filterByMarAge(array('min' => 12)); // WHERE mar_age > 12
     * </code>
     *
     * @param     mixed $marAge The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMarAge($marAge = null, $comparison = null)
    {
        if (is_array($marAge)) {
            $useMinMax = false;
            if (isset($marAge['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_MAR_AGE, $marAge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marAge['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_MAR_AGE, $marAge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MAR_AGE, $marAge, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the beneficiaries column
     *
     * Example usage:
     * <code>
     * $query->filterByBeneficiaries('fooValue');   // WHERE beneficiaries = 'fooValue'
     * $query->filterByBeneficiaries('%fooValue%', Criteria::LIKE); // WHERE beneficiaries LIKE '%fooValue%'
     * </code>
     *
     * @param     string $beneficiaries The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBeneficiaries($beneficiaries = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($beneficiaries)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BENEFICIARIES, $beneficiaries, $comparison);
    }

    /**
     * Filter the query on the relation column
     *
     * Example usage:
     * <code>
     * $query->filterByRelation('fooValue');   // WHERE relation = 'fooValue'
     * $query->filterByRelation('%fooValue%', Criteria::LIKE); // WHERE relation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $relation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByRelation($relation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($relation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_RELATION, $relation, $comparison);
    }

    /**
     * Filter the query on the districtId column
     *
     * Example usage:
     * <code>
     * $query->filterByDistrictid(1234); // WHERE districtId = 1234
     * $query->filterByDistrictid(array(12, 34)); // WHERE districtId IN (12, 34)
     * $query->filterByDistrictid(array('min' => 12)); // WHERE districtId > 12
     * </code>
     *
     * @param     mixed $districtid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByDistrictid($districtid = null, $comparison = null)
    {
        if (is_array($districtid)) {
            $useMinMax = false;
            if (isset($districtid['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_DISTRICTID, $districtid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($districtid['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_DISTRICTID, $districtid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_DISTRICTID, $districtid, $comparison);
    }

    /**
     * Filter the query on the amphurId column
     *
     * Example usage:
     * <code>
     * $query->filterByAmphurid(1234); // WHERE amphurId = 1234
     * $query->filterByAmphurid(array(12, 34)); // WHERE amphurId IN (12, 34)
     * $query->filterByAmphurid(array('min' => 12)); // WHERE amphurId > 12
     * </code>
     *
     * @param     mixed $amphurid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByAmphurid($amphurid = null, $comparison = null)
    {
        if (is_array($amphurid)) {
            $useMinMax = false;
            if (isset($amphurid['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_AMPHURID, $amphurid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amphurid['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_AMPHURID, $amphurid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_AMPHURID, $amphurid, $comparison);
    }

    /**
     * Filter the query on the provinceId column
     *
     * Example usage:
     * <code>
     * $query->filterByProvinceid(1234); // WHERE provinceId = 1234
     * $query->filterByProvinceid(array(12, 34)); // WHERE provinceId IN (12, 34)
     * $query->filterByProvinceid(array('min' => 12)); // WHERE provinceId > 12
     * </code>
     *
     * @param     mixed $provinceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByProvinceid($provinceid = null, $comparison = null)
    {
        if (is_array($provinceid)) {
            $useMinMax = false;
            if (isset($provinceid['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_PROVINCEID, $provinceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($provinceid['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_PROVINCEID, $provinceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_PROVINCEID, $provinceid, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%', Criteria::LIKE); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the inv_code column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCode('fooValue');   // WHERE inv_code = 'fooValue'
     * $query->filterByInvCode('%fooValue%', Criteria::LIKE); // WHERE inv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%', Criteria::LIKE); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the pos_cur column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur('fooValue');   // WHERE pos_cur = 'fooValue'
     * $query->filterByPosCur('%fooValue%', Criteria::LIKE); // WHERE pos_cur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the pos_cur1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur1('fooValue');   // WHERE pos_cur1 = 'fooValue'
     * $query->filterByPosCur1('%fooValue%', Criteria::LIKE); // WHERE pos_cur1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPosCur1($posCur1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_POS_CUR1, $posCur1, $comparison);
    }

    /**
     * Filter the query on the pos_cur2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur2('fooValue');   // WHERE pos_cur2 = 'fooValue'
     * $query->filterByPosCur2('%fooValue%', Criteria::LIKE); // WHERE pos_cur2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPosCur2($posCur2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_POS_CUR2, $posCur2, $comparison);
    }

    /**
     * Filter the query on the pos_cur3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur3('fooValue');   // WHERE pos_cur3 = 'fooValue'
     * $query->filterByPosCur3('%fooValue%', Criteria::LIKE); // WHERE pos_cur3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPosCur3($posCur3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_POS_CUR3, $posCur3, $comparison);
    }

    /**
     * Filter the query on the pos_cur4 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur4('fooValue');   // WHERE pos_cur4 = 'fooValue'
     * $query->filterByPosCur4('%fooValue%', Criteria::LIKE); // WHERE pos_cur4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByPosCur4($posCur4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_POS_CUR4, $posCur4, $comparison);
    }

    /**
     * Filter the query on the rpos_cur4 column
     *
     * Example usage:
     * <code>
     * $query->filterByRposCur4(1234); // WHERE rpos_cur4 = 1234
     * $query->filterByRposCur4(array(12, 34)); // WHERE rpos_cur4 IN (12, 34)
     * $query->filterByRposCur4(array('min' => 12)); // WHERE rpos_cur4 > 12
     * </code>
     *
     * @param     mixed $rposCur4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByRposCur4($rposCur4 = null, $comparison = null)
    {
        if (is_array($rposCur4)) {
            $useMinMax = false;
            if (isset($rposCur4['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_RPOS_CUR4, $rposCur4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rposCur4['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_RPOS_CUR4, $rposCur4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_RPOS_CUR4, $rposCur4, $comparison);
    }

    /**
     * Filter the query on the memdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByMemdesc('fooValue');   // WHERE memdesc = 'fooValue'
     * $query->filterByMemdesc('%fooValue%', Criteria::LIKE); // WHERE memdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $memdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMemdesc($memdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($memdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MEMDESC, $memdesc, $comparison);
    }

    /**
     * Filter the query on the cmp column
     *
     * Example usage:
     * <code>
     * $query->filterByCmp('fooValue');   // WHERE cmp = 'fooValue'
     * $query->filterByCmp('%fooValue%', Criteria::LIKE); // WHERE cmp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCmp($cmp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CMP, $cmp, $comparison);
    }

    /**
     * Filter the query on the cmp2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCmp2('fooValue');   // WHERE cmp2 = 'fooValue'
     * $query->filterByCmp2('%fooValue%', Criteria::LIKE); // WHERE cmp2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmp2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCmp2($cmp2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmp2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CMP2, $cmp2, $comparison);
    }

    /**
     * Filter the query on the cmp3 column
     *
     * Example usage:
     * <code>
     * $query->filterByCmp3('fooValue');   // WHERE cmp3 = 'fooValue'
     * $query->filterByCmp3('%fooValue%', Criteria::LIKE); // WHERE cmp3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmp3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCmp3($cmp3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmp3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CMP3, $cmp3, $comparison);
    }

    /**
     * Filter the query on the ccmp column
     *
     * Example usage:
     * <code>
     * $query->filterByCcmp('fooValue');   // WHERE ccmp = 'fooValue'
     * $query->filterByCcmp('%fooValue%', Criteria::LIKE); // WHERE ccmp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccmp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCcmp($ccmp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccmp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CCMP, $ccmp, $comparison);
    }

    /**
     * Filter the query on the ccmp2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCcmp2('fooValue');   // WHERE ccmp2 = 'fooValue'
     * $query->filterByCcmp2('%fooValue%', Criteria::LIKE); // WHERE ccmp2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccmp2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCcmp2($ccmp2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccmp2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CCMP2, $ccmp2, $comparison);
    }

    /**
     * Filter the query on the ccmp3 column
     *
     * Example usage:
     * <code>
     * $query->filterByCcmp3('fooValue');   // WHERE ccmp3 = 'fooValue'
     * $query->filterByCcmp3('%fooValue%', Criteria::LIKE); // WHERE ccmp3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccmp3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCcmp3($ccmp3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccmp3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CCMP3, $ccmp3, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the street column
     *
     * Example usage:
     * <code>
     * $query->filterByStreet('fooValue');   // WHERE street = 'fooValue'
     * $query->filterByStreet('%fooValue%', Criteria::LIKE); // WHERE street LIKE '%fooValue%'
     * </code>
     *
     * @param     string $street The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByStreet($street = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($street)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_STREET, $street, $comparison);
    }

    /**
     * Filter the query on the building column
     *
     * Example usage:
     * <code>
     * $query->filterByBuilding('fooValue');   // WHERE building = 'fooValue'
     * $query->filterByBuilding('%fooValue%', Criteria::LIKE); // WHERE building LIKE '%fooValue%'
     * </code>
     *
     * @param     string $building The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBuilding($building = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($building)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BUILDING, $building, $comparison);
    }

    /**
     * Filter the query on the village column
     *
     * Example usage:
     * <code>
     * $query->filterByVillage('fooValue');   // WHERE village = 'fooValue'
     * $query->filterByVillage('%fooValue%', Criteria::LIKE); // WHERE village LIKE '%fooValue%'
     * </code>
     *
     * @param     string $village The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByVillage($village = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($village)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_VILLAGE, $village, $comparison);
    }

    /**
     * Filter the query on the soi column
     *
     * Example usage:
     * <code>
     * $query->filterBySoi('fooValue');   // WHERE soi = 'fooValue'
     * $query->filterBySoi('%fooValue%', Criteria::LIKE); // WHERE soi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $soi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySoi($soi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($soi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SOI, $soi, $comparison);
    }

    /**
     * Filter the query on the ewallet column
     *
     * Example usage:
     * <code>
     * $query->filterByEwallet(1234); // WHERE ewallet = 1234
     * $query->filterByEwallet(array(12, 34)); // WHERE ewallet IN (12, 34)
     * $query->filterByEwallet(array('min' => 12)); // WHERE ewallet > 12
     * </code>
     *
     * @param     mixed $ewallet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_EWALLET, $ewallet, $comparison);
    }

    /**
     * Filter the query on the bmdate1 column
     *
     * Example usage:
     * <code>
     * $query->filterByBmdate1('fooValue');   // WHERE bmdate1 = 'fooValue'
     * $query->filterByBmdate1('%fooValue%', Criteria::LIKE); // WHERE bmdate1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bmdate1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBmdate1($bmdate1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bmdate1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BMDATE1, $bmdate1, $comparison);
    }

    /**
     * Filter the query on the bmdate2 column
     *
     * Example usage:
     * <code>
     * $query->filterByBmdate2('fooValue');   // WHERE bmdate2 = 'fooValue'
     * $query->filterByBmdate2('%fooValue%', Criteria::LIKE); // WHERE bmdate2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bmdate2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBmdate2($bmdate2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bmdate2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BMDATE2, $bmdate2, $comparison);
    }

    /**
     * Filter the query on the bmdate3 column
     *
     * Example usage:
     * <code>
     * $query->filterByBmdate3('fooValue');   // WHERE bmdate3 = 'fooValue'
     * $query->filterByBmdate3('%fooValue%', Criteria::LIKE); // WHERE bmdate3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bmdate3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBmdate3($bmdate3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bmdate3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BMDATE3, $bmdate3, $comparison);
    }

    /**
     * Filter the query on the cbmdate1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCbmdate1('fooValue');   // WHERE cbmdate1 = 'fooValue'
     * $query->filterByCbmdate1('%fooValue%', Criteria::LIKE); // WHERE cbmdate1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cbmdate1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCbmdate1($cbmdate1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbmdate1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CBMDATE1, $cbmdate1, $comparison);
    }

    /**
     * Filter the query on the cbmdate2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCbmdate2('fooValue');   // WHERE cbmdate2 = 'fooValue'
     * $query->filterByCbmdate2('%fooValue%', Criteria::LIKE); // WHERE cbmdate2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cbmdate2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCbmdate2($cbmdate2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbmdate2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CBMDATE2, $cbmdate2, $comparison);
    }

    /**
     * Filter the query on the cbmdate3 column
     *
     * Example usage:
     * <code>
     * $query->filterByCbmdate3('fooValue');   // WHERE cbmdate3 = 'fooValue'
     * $query->filterByCbmdate3('%fooValue%', Criteria::LIKE); // WHERE cbmdate3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cbmdate3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCbmdate3($cbmdate3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbmdate3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CBMDATE3, $cbmdate3, $comparison);
    }

    /**
     * Filter the query on the online column
     *
     * Example usage:
     * <code>
     * $query->filterByOnline(1234); // WHERE online = 1234
     * $query->filterByOnline(array(12, 34)); // WHERE online IN (12, 34)
     * $query->filterByOnline(array('min' => 12)); // WHERE online > 12
     * </code>
     *
     * @param     mixed $online The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByOnline($online = null, $comparison = null)
    {
        if (is_array($online)) {
            $useMinMax = false;
            if (isset($online['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_ONLINE, $online['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($online['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_ONLINE, $online['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_ONLINE, $online, $comparison);
    }

    /**
     * Filter the query on the cname_f column
     *
     * Example usage:
     * <code>
     * $query->filterByCnameF('fooValue');   // WHERE cname_f = 'fooValue'
     * $query->filterByCnameF('%fooValue%', Criteria::LIKE); // WHERE cname_f LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cnameF The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCnameF($cnameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CNAME_F, $cnameF, $comparison);
    }

    /**
     * Filter the query on the cname_t column
     *
     * Example usage:
     * <code>
     * $query->filterByCnameT('fooValue');   // WHERE cname_t = 'fooValue'
     * $query->filterByCnameT('%fooValue%', Criteria::LIKE); // WHERE cname_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cnameT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCnameT($cnameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CNAME_T, $cnameT, $comparison);
    }

    /**
     * Filter the query on the cname_e column
     *
     * Example usage:
     * <code>
     * $query->filterByCnameE('fooValue');   // WHERE cname_e = 'fooValue'
     * $query->filterByCnameE('%fooValue%', Criteria::LIKE); // WHERE cname_e LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cnameE The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCnameE($cnameE = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnameE)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CNAME_E, $cnameE, $comparison);
    }

    /**
     * Filter the query on the cname_b column
     *
     * Example usage:
     * <code>
     * $query->filterByCnameB('fooValue');   // WHERE cname_b = 'fooValue'
     * $query->filterByCnameB('%fooValue%', Criteria::LIKE); // WHERE cname_b LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cnameB The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCnameB($cnameB = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnameB)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CNAME_B, $cnameB, $comparison);
    }

    /**
     * Filter the query on the cbirthday column
     *
     * Example usage:
     * <code>
     * $query->filterByCbirthday('fooValue');   // WHERE cbirthday = 'fooValue'
     * $query->filterByCbirthday('%fooValue%', Criteria::LIKE); // WHERE cbirthday LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cbirthday The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCbirthday($cbirthday = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbirthday)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CBIRTHDAY, $cbirthday, $comparison);
    }

    /**
     * Filter the query on the cnational column
     *
     * Example usage:
     * <code>
     * $query->filterByCnational('fooValue');   // WHERE cnational = 'fooValue'
     * $query->filterByCnational('%fooValue%', Criteria::LIKE); // WHERE cnational LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cnational The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCnational($cnational = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnational)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CNATIONAL, $cnational, $comparison);
    }

    /**
     * Filter the query on the cid_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByCidTax('fooValue');   // WHERE cid_tax = 'fooValue'
     * $query->filterByCidTax('%fooValue%', Criteria::LIKE); // WHERE cid_tax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cidTax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCidTax($cidTax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cidTax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CID_TAX, $cidTax, $comparison);
    }

    /**
     * Filter the query on the cid_card column
     *
     * Example usage:
     * <code>
     * $query->filterByCidCard('fooValue');   // WHERE cid_card = 'fooValue'
     * $query->filterByCidCard('%fooValue%', Criteria::LIKE); // WHERE cid_card LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cidCard The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCidCard($cidCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cidCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CID_CARD, $cidCard, $comparison);
    }

    /**
     * Filter the query on the caddress column
     *
     * Example usage:
     * <code>
     * $query->filterByCaddress('fooValue');   // WHERE caddress = 'fooValue'
     * $query->filterByCaddress('%fooValue%', Criteria::LIKE); // WHERE caddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $caddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CADDRESS, $caddress, $comparison);
    }

    /**
     * Filter the query on the cbuilding column
     *
     * Example usage:
     * <code>
     * $query->filterByCbuilding('fooValue');   // WHERE cbuilding = 'fooValue'
     * $query->filterByCbuilding('%fooValue%', Criteria::LIKE); // WHERE cbuilding LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cbuilding The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCbuilding($cbuilding = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbuilding)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CBUILDING, $cbuilding, $comparison);
    }

    /**
     * Filter the query on the cvillage column
     *
     * Example usage:
     * <code>
     * $query->filterByCvillage('fooValue');   // WHERE cvillage = 'fooValue'
     * $query->filterByCvillage('%fooValue%', Criteria::LIKE); // WHERE cvillage LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cvillage The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCvillage($cvillage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cvillage)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CVILLAGE, $cvillage, $comparison);
    }

    /**
     * Filter the query on the csoi column
     *
     * Example usage:
     * <code>
     * $query->filterByCsoi('fooValue');   // WHERE csoi = 'fooValue'
     * $query->filterByCsoi('%fooValue%', Criteria::LIKE); // WHERE csoi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $csoi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCsoi($csoi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($csoi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CSOI, $csoi, $comparison);
    }

    /**
     * Filter the query on the czip column
     *
     * Example usage:
     * <code>
     * $query->filterByCzip('fooValue');   // WHERE czip = 'fooValue'
     * $query->filterByCzip('%fooValue%', Criteria::LIKE); // WHERE czip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $czip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CZIP, $czip, $comparison);
    }

    /**
     * Filter the query on the chome_t column
     *
     * Example usage:
     * <code>
     * $query->filterByChomeT('fooValue');   // WHERE chome_t = 'fooValue'
     * $query->filterByChomeT('%fooValue%', Criteria::LIKE); // WHERE chome_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chomeT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByChomeT($chomeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chomeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CHOME_T, $chomeT, $comparison);
    }

    /**
     * Filter the query on the coffice_t column
     *
     * Example usage:
     * <code>
     * $query->filterByCofficeT('fooValue');   // WHERE coffice_t = 'fooValue'
     * $query->filterByCofficeT('%fooValue%', Criteria::LIKE); // WHERE coffice_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cofficeT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCofficeT($cofficeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cofficeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_COFFICE_T, $cofficeT, $comparison);
    }

    /**
     * Filter the query on the cmobile column
     *
     * Example usage:
     * <code>
     * $query->filterByCmobile('fooValue');   // WHERE cmobile = 'fooValue'
     * $query->filterByCmobile('%fooValue%', Criteria::LIKE); // WHERE cmobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmobile The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCmobile($cmobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CMOBILE, $cmobile, $comparison);
    }

    /**
     * Filter the query on the cfax column
     *
     * Example usage:
     * <code>
     * $query->filterByCfax('fooValue');   // WHERE cfax = 'fooValue'
     * $query->filterByCfax('%fooValue%', Criteria::LIKE); // WHERE cfax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cfax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCfax($cfax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cfax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CFAX, $cfax, $comparison);
    }

    /**
     * Filter the query on the csex column
     *
     * Example usage:
     * <code>
     * $query->filterByCsex('fooValue');   // WHERE csex = 'fooValue'
     * $query->filterByCsex('%fooValue%', Criteria::LIKE); // WHERE csex LIKE '%fooValue%'
     * </code>
     *
     * @param     string $csex The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCsex($csex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($csex)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CSEX, $csex, $comparison);
    }

    /**
     * Filter the query on the cemail column
     *
     * Example usage:
     * <code>
     * $query->filterByCemail('fooValue');   // WHERE cemail = 'fooValue'
     * $query->filterByCemail('%fooValue%', Criteria::LIKE); // WHERE cemail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cemail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCemail($cemail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cemail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CEMAIL, $cemail, $comparison);
    }

    /**
     * Filter the query on the cdistrictId column
     *
     * Example usage:
     * <code>
     * $query->filterByCdistrictid(1234); // WHERE cdistrictId = 1234
     * $query->filterByCdistrictid(array(12, 34)); // WHERE cdistrictId IN (12, 34)
     * $query->filterByCdistrictid(array('min' => 12)); // WHERE cdistrictId > 12
     * </code>
     *
     * @param     mixed $cdistrictid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (is_array($cdistrictid)) {
            $useMinMax = false;
            if (isset($cdistrictid['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CDISTRICTID, $cdistrictid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cdistrictid['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CDISTRICTID, $cdistrictid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
    }

    /**
     * Filter the query on the camphurId column
     *
     * Example usage:
     * <code>
     * $query->filterByCamphurid(1234); // WHERE camphurId = 1234
     * $query->filterByCamphurid(array(12, 34)); // WHERE camphurId IN (12, 34)
     * $query->filterByCamphurid(array('min' => 12)); // WHERE camphurId > 12
     * </code>
     *
     * @param     mixed $camphurid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (is_array($camphurid)) {
            $useMinMax = false;
            if (isset($camphurid['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CAMPHURID, $camphurid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($camphurid['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CAMPHURID, $camphurid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CAMPHURID, $camphurid, $comparison);
    }

    /**
     * Filter the query on the cprovinceId column
     *
     * Example usage:
     * <code>
     * $query->filterByCprovinceid(1234); // WHERE cprovinceId = 1234
     * $query->filterByCprovinceid(array(12, 34)); // WHERE cprovinceId IN (12, 34)
     * $query->filterByCprovinceid(array('min' => 12)); // WHERE cprovinceId > 12
     * </code>
     *
     * @param     mixed $cprovinceid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (is_array($cprovinceid)) {
            $useMinMax = false;
            if (isset($cprovinceid['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CPROVINCEID, $cprovinceid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cprovinceid['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CPROVINCEID, $cprovinceid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
    }

    /**
     * Filter the query on the iname_f column
     *
     * Example usage:
     * <code>
     * $query->filterByInameF('fooValue');   // WHERE iname_f = 'fooValue'
     * $query->filterByInameF('%fooValue%', Criteria::LIKE); // WHERE iname_f LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inameF The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByInameF($inameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_INAME_F, $inameF, $comparison);
    }

    /**
     * Filter the query on the iname_t column
     *
     * Example usage:
     * <code>
     * $query->filterByInameT('fooValue');   // WHERE iname_t = 'fooValue'
     * $query->filterByInameT('%fooValue%', Criteria::LIKE); // WHERE iname_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inameT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByInameT($inameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_INAME_T, $inameT, $comparison);
    }

    /**
     * Filter the query on the irelation column
     *
     * Example usage:
     * <code>
     * $query->filterByIrelation('fooValue');   // WHERE irelation = 'fooValue'
     * $query->filterByIrelation('%fooValue%', Criteria::LIKE); // WHERE irelation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $irelation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByIrelation($irelation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($irelation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_IRELATION, $irelation, $comparison);
    }

    /**
     * Filter the query on the iphone column
     *
     * Example usage:
     * <code>
     * $query->filterByIphone('fooValue');   // WHERE iphone = 'fooValue'
     * $query->filterByIphone('%fooValue%', Criteria::LIKE); // WHERE iphone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iphone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByIphone($iphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iphone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_IPHONE, $iphone, $comparison);
    }

    /**
     * Filter the query on the iid_card column
     *
     * Example usage:
     * <code>
     * $query->filterByIidCard('fooValue');   // WHERE iid_card = 'fooValue'
     * $query->filterByIidCard('%fooValue%', Criteria::LIKE); // WHERE iid_card LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iidCard The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByIidCard($iidCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iidCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_IID_CARD, $iidCard, $comparison);
    }

    /**
     * Filter the query on the status_doc column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusDoc(1234); // WHERE status_doc = 1234
     * $query->filterByStatusDoc(array(12, 34)); // WHERE status_doc IN (12, 34)
     * $query->filterByStatusDoc(array('min' => 12)); // WHERE status_doc > 12
     * </code>
     *
     * @param     mixed $statusDoc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByStatusDoc($statusDoc = null, $comparison = null)
    {
        if (is_array($statusDoc)) {
            $useMinMax = false;
            if (isset($statusDoc['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_DOC, $statusDoc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusDoc['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_DOC, $statusDoc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_DOC, $statusDoc, $comparison);
    }

    /**
     * Filter the query on the status_expire column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusExpire(1234); // WHERE status_expire = 1234
     * $query->filterByStatusExpire(array(12, 34)); // WHERE status_expire IN (12, 34)
     * $query->filterByStatusExpire(array('min' => 12)); // WHERE status_expire > 12
     * </code>
     *
     * @param     mixed $statusExpire The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByStatusExpire($statusExpire = null, $comparison = null)
    {
        if (is_array($statusExpire)) {
            $useMinMax = false;
            if (isset($statusExpire['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_EXPIRE, $statusExpire['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusExpire['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_EXPIRE, $statusExpire['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_EXPIRE, $statusExpire, $comparison);
    }

    /**
     * Filter the query on the status_terminate column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusTerminate(1234); // WHERE status_terminate = 1234
     * $query->filterByStatusTerminate(array(12, 34)); // WHERE status_terminate IN (12, 34)
     * $query->filterByStatusTerminate(array('min' => 12)); // WHERE status_terminate > 12
     * </code>
     *
     * @param     mixed $statusTerminate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByStatusTerminate($statusTerminate = null, $comparison = null)
    {
        if (is_array($statusTerminate)) {
            $useMinMax = false;
            if (isset($statusTerminate['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_TERMINATE, $statusTerminate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusTerminate['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_TERMINATE, $statusTerminate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_TERMINATE, $statusTerminate, $comparison);
    }

    /**
     * Filter the query on the terminate_date column
     *
     * Example usage:
     * <code>
     * $query->filterByTerminateDate('2011-03-14'); // WHERE terminate_date = '2011-03-14'
     * $query->filterByTerminateDate('now'); // WHERE terminate_date = '2011-03-14'
     * $query->filterByTerminateDate(array('max' => 'yesterday')); // WHERE terminate_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $terminateDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByTerminateDate($terminateDate = null, $comparison = null)
    {
        if (is_array($terminateDate)) {
            $useMinMax = false;
            if (isset($terminateDate['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_TERMINATE_DATE, $terminateDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($terminateDate['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_TERMINATE_DATE, $terminateDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_TERMINATE_DATE, $terminateDate, $comparison);
    }

    /**
     * Filter the query on the status_suspend column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusSuspend(1234); // WHERE status_suspend = 1234
     * $query->filterByStatusSuspend(array(12, 34)); // WHERE status_suspend IN (12, 34)
     * $query->filterByStatusSuspend(array('min' => 12)); // WHERE status_suspend > 12
     * </code>
     *
     * @param     mixed $statusSuspend The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByStatusSuspend($statusSuspend = null, $comparison = null)
    {
        if (is_array($statusSuspend)) {
            $useMinMax = false;
            if (isset($statusSuspend['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_SUSPEND, $statusSuspend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusSuspend['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_SUSPEND, $statusSuspend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_SUSPEND, $statusSuspend, $comparison);
    }

    /**
     * Filter the query on the suspend_date column
     *
     * Example usage:
     * <code>
     * $query->filterBySuspendDate('2011-03-14'); // WHERE suspend_date = '2011-03-14'
     * $query->filterBySuspendDate('now'); // WHERE suspend_date = '2011-03-14'
     * $query->filterBySuspendDate(array('max' => 'yesterday')); // WHERE suspend_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $suspendDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySuspendDate($suspendDate = null, $comparison = null)
    {
        if (is_array($suspendDate)) {
            $useMinMax = false;
            if (isset($suspendDate['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_SUSPEND_DATE, $suspendDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($suspendDate['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_SUSPEND_DATE, $suspendDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SUSPEND_DATE, $suspendDate, $comparison);
    }

    /**
     * Filter the query on the status_blacklist column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusBlacklist(1234); // WHERE status_blacklist = 1234
     * $query->filterByStatusBlacklist(array(12, 34)); // WHERE status_blacklist IN (12, 34)
     * $query->filterByStatusBlacklist(array('min' => 12)); // WHERE status_blacklist > 12
     * </code>
     *
     * @param     mixed $statusBlacklist The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByStatusBlacklist($statusBlacklist = null, $comparison = null)
    {
        if (is_array($statusBlacklist)) {
            $useMinMax = false;
            if (isset($statusBlacklist['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_BLACKLIST, $statusBlacklist['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusBlacklist['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_BLACKLIST, $statusBlacklist['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_BLACKLIST, $statusBlacklist, $comparison);
    }

    /**
     * Filter the query on the status_ato column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusAto(1234); // WHERE status_ato = 1234
     * $query->filterByStatusAto(array(12, 34)); // WHERE status_ato IN (12, 34)
     * $query->filterByStatusAto(array('min' => 12)); // WHERE status_ato > 12
     * </code>
     *
     * @param     mixed $statusAto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByStatusAto($statusAto = null, $comparison = null)
    {
        if (is_array($statusAto)) {
            $useMinMax = false;
            if (isset($statusAto['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_ATO, $statusAto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusAto['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_ATO, $statusAto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_STATUS_ATO, $statusAto, $comparison);
    }

    /**
     * Filter the query on the sletter column
     *
     * Example usage:
     * <code>
     * $query->filterBySletter(1234); // WHERE sletter = 1234
     * $query->filterBySletter(array(12, 34)); // WHERE sletter IN (12, 34)
     * $query->filterBySletter(array('min' => 12)); // WHERE sletter > 12
     * </code>
     *
     * @param     mixed $sletter The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySletter($sletter = null, $comparison = null)
    {
        if (is_array($sletter)) {
            $useMinMax = false;
            if (isset($sletter['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_SLETTER, $sletter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sletter['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_SLETTER, $sletter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SLETTER, $sletter, $comparison);
    }

    /**
     * Filter the query on the sinv_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySinvCode('fooValue');   // WHERE sinv_code = 'fooValue'
     * $query->filterBySinvCode('%fooValue%', Criteria::LIKE); // WHERE sinv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sinvCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySinvCode($sinvCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sinvCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SINV_CODE, $sinvCode, $comparison);
    }

    /**
     * Filter the query on the txtoption column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtoption('fooValue');   // WHERE txtoption = 'fooValue'
     * $query->filterByTxtoption('%fooValue%', Criteria::LIKE); // WHERE txtoption LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtoption The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_TXTOPTION, $txtoption, $comparison);
    }

    /**
     * Filter the query on the mcode_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByMcodeRef('fooValue');   // WHERE mcode_ref = 'fooValue'
     * $query->filterByMcodeRef('%fooValue%', Criteria::LIKE); // WHERE mcode_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcodeRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMcodeRef($mcodeRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MCODE_REF, $mcodeRef, $comparison);
    }

    /**
     * Filter the query on the cancel column
     *
     * Example usage:
     * <code>
     * $query->filterByCancel(1234); // WHERE cancel = 1234
     * $query->filterByCancel(array(12, 34)); // WHERE cancel IN (12, 34)
     * $query->filterByCancel(array('min' => 12)); // WHERE cancel > 12
     * </code>
     *
     * @param     mixed $cancel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (is_array($cancel)) {
            $useMinMax = false;
            if (isset($cancel['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CANCEL, $cancel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancel['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_CANCEL, $cancel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CANCEL, $cancel, $comparison);
    }

    /**
     * Filter the query on the sbook column
     *
     * Example usage:
     * <code>
     * $query->filterBySbook(1234); // WHERE sbook = 1234
     * $query->filterBySbook(array(12, 34)); // WHERE sbook IN (12, 34)
     * $query->filterBySbook(array('min' => 12)); // WHERE sbook > 12
     * </code>
     *
     * @param     mixed $sbook The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySbook($sbook = null, $comparison = null)
    {
        if (is_array($sbook)) {
            $useMinMax = false;
            if (isset($sbook['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_SBOOK, $sbook['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sbook['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_SBOOK, $sbook['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SBOOK, $sbook, $comparison);
    }

    /**
     * Filter the query on the sbinv_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySbinvCode('fooValue');   // WHERE sbinv_code = 'fooValue'
     * $query->filterBySbinvCode('%fooValue%', Criteria::LIKE); // WHERE sbinv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sbinvCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterBySbinvCode($sbinvCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sbinvCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_SBINV_CODE, $sbinvCode, $comparison);
    }

    /**
     * Filter the query on the locationbase column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationbase(1234); // WHERE locationbase = 1234
     * $query->filterByLocationbase(array(12, 34)); // WHERE locationbase IN (12, 34)
     * $query->filterByLocationbase(array('min' => 12)); // WHERE locationbase > 12
     * </code>
     *
     * @param     mixed $locationbase The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the cid_mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByCidMobile('fooValue');   // WHERE cid_mobile = 'fooValue'
     * $query->filterByCidMobile('%fooValue%', Criteria::LIKE); // WHERE cid_mobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cidMobile The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByCidMobile($cidMobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cidMobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_CID_MOBILE, $cidMobile, $comparison);
    }

    /**
     * Filter the query on the bewallet column
     *
     * Example usage:
     * <code>
     * $query->filterByBewallet(1234); // WHERE bewallet = 1234
     * $query->filterByBewallet(array(12, 34)); // WHERE bewallet IN (12, 34)
     * $query->filterByBewallet(array('min' => 12)); // WHERE bewallet > 12
     * </code>
     *
     * @param     mixed $bewallet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBewallet($bewallet = null, $comparison = null)
    {
        if (is_array($bewallet)) {
            $useMinMax = false;
            if (isset($bewallet['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_BEWALLET, $bewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bewallet['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_BEWALLET, $bewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BEWALLET, $bewallet, $comparison);
    }

    /**
     * Filter the query on the bvoucher column
     *
     * Example usage:
     * <code>
     * $query->filterByBvoucher(1234); // WHERE bvoucher = 1234
     * $query->filterByBvoucher(array(12, 34)); // WHERE bvoucher IN (12, 34)
     * $query->filterByBvoucher(array('min' => 12)); // WHERE bvoucher > 12
     * </code>
     *
     * @param     mixed $bvoucher The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByBvoucher($bvoucher = null, $comparison = null)
    {
        if (is_array($bvoucher)) {
            $useMinMax = false;
            if (isset($bvoucher['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_BVOUCHER, $bvoucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bvoucher['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_BVOUCHER, $bvoucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_BVOUCHER, $bvoucher, $comparison);
    }

    /**
     * Filter the query on the voucher column
     *
     * Example usage:
     * <code>
     * $query->filterByVoucher(1234); // WHERE voucher = 1234
     * $query->filterByVoucher(array(12, 34)); // WHERE voucher IN (12, 34)
     * $query->filterByVoucher(array('min' => 12)); // WHERE voucher > 12
     * </code>
     *
     * @param     mixed $voucher The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByVoucher($voucher = null, $comparison = null)
    {
        if (is_array($voucher)) {
            $useMinMax = false;
            if (isset($voucher['min'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_VOUCHER, $voucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucher['max'])) {
                $this->addUsingAlias(AliMemberTmpTableMap::COL_VOUCHER, $voucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_VOUCHER, $voucher, $comparison);
    }

    /**
     * Filter the query on the manager column
     *
     * Example usage:
     * <code>
     * $query->filterByManager('fooValue');   // WHERE manager = 'fooValue'
     * $query->filterByManager('%fooValue%', Criteria::LIKE); // WHERE manager LIKE '%fooValue%'
     * </code>
     *
     * @param     string $manager The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByManager($manager = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($manager)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MANAGER, $manager, $comparison);
    }

    /**
     * Filter the query on the mtype column
     *
     * Example usage:
     * <code>
     * $query->filterByMtype('fooValue');   // WHERE mtype = 'fooValue'
     * $query->filterByMtype('%fooValue%', Criteria::LIKE); // WHERE mtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByMtype($mtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_MTYPE, $mtype, $comparison);
    }

    /**
     * Filter the query on the uidbase column
     *
     * Example usage:
     * <code>
     * $query->filterByUidbase('fooValue');   // WHERE uidbase = 'fooValue'
     * $query->filterByUidbase('%fooValue%', Criteria::LIKE); // WHERE uidbase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidbase The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function filterByUidbase($uidbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTmpTableMap::COL_UIDBASE, $uidbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMemberTmp $aliMemberTmp Object to remove from the list of results
     *
     * @return $this|ChildAliMemberTmpQuery The current query, for fluid interface
     */
    public function prune($aliMemberTmp = null)
    {
        if ($aliMemberTmp) {
            $this->addUsingAlias(AliMemberTmpTableMap::COL_ID, $aliMemberTmp->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_member_tmp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTmpTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMemberTmpTableMap::clearInstancePool();
            AliMemberTmpTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTmpTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMemberTmpTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMemberTmpTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMemberTmpTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMemberTmpQuery
