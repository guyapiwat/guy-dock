<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMember as ChildAliMember;
use CciOrm\CciOrm\AliMemberQuery as ChildAliMemberQuery;
use CciOrm\CciOrm\Map\AliMemberTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_member' table.
 *
 *
 *
 * @method     ChildAliMemberQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliMemberQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliMemberQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliMemberQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliMemberQuery orderByNameE($order = Criteria::ASC) Order by the name_e column
 * @method     ChildAliMemberQuery orderByPosid($order = Criteria::ASC) Order by the posid column
 * @method     ChildAliMemberQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliMemberQuery orderByBirthday($order = Criteria::ASC) Order by the birthday column
 * @method     ChildAliMemberQuery orderByNational($order = Criteria::ASC) Order by the national column
 * @method     ChildAliMemberQuery orderByIdTax($order = Criteria::ASC) Order by the id_tax column
 * @method     ChildAliMemberQuery orderByIdCard($order = Criteria::ASC) Order by the id_card column
 * @method     ChildAliMemberQuery orderByIdCardImg($order = Criteria::ASC) Order by the id_card_img column
 * @method     ChildAliMemberQuery orderByIdCardImgDate($order = Criteria::ASC) Order by the id_card_img_date column
 * @method     ChildAliMemberQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildAliMemberQuery orderByHomeT($order = Criteria::ASC) Order by the home_t column
 * @method     ChildAliMemberQuery orderByOfficeT($order = Criteria::ASC) Order by the office_t column
 * @method     ChildAliMemberQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method     ChildAliMemberQuery orderByMcodeAcc($order = Criteria::ASC) Order by the mcode_acc column
 * @method     ChildAliMemberQuery orderByBonusrec($order = Criteria::ASC) Order by the bonusrec column
 * @method     ChildAliMemberQuery orderByBankcode($order = Criteria::ASC) Order by the bankcode column
 * @method     ChildAliMemberQuery orderByBranch($order = Criteria::ASC) Order by the branch column
 * @method     ChildAliMemberQuery orderByAccType($order = Criteria::ASC) Order by the acc_type column
 * @method     ChildAliMemberQuery orderByAccNo($order = Criteria::ASC) Order by the acc_no column
 * @method     ChildAliMemberQuery orderByAccNoImg($order = Criteria::ASC) Order by the acc_no_img column
 * @method     ChildAliMemberQuery orderByAccNoImgDate($order = Criteria::ASC) Order by the acc_no_img_date column
 * @method     ChildAliMemberQuery orderByAccName($order = Criteria::ASC) Order by the acc_name column
 * @method     ChildAliMemberQuery orderByAccProv($order = Criteria::ASC) Order by the acc_prov column
 * @method     ChildAliMemberQuery orderBySvCode($order = Criteria::ASC) Order by the sv_code column
 * @method     ChildAliMemberQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliMemberQuery orderBySpName($order = Criteria::ASC) Order by the sp_name column
 * @method     ChildAliMemberQuery orderBySpCode2($order = Criteria::ASC) Order by the sp_code2 column
 * @method     ChildAliMemberQuery orderBySpName2($order = Criteria::ASC) Order by the sp_name2 column
 * @method     ChildAliMemberQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliMemberQuery orderByUpaName($order = Criteria::ASC) Order by the upa_name column
 * @method     ChildAliMemberQuery orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliMemberQuery orderByComplete($order = Criteria::ASC) Order by the complete column
 * @method     ChildAliMemberQuery orderByCompdate($order = Criteria::ASC) Order by the compdate column
 * @method     ChildAliMemberQuery orderByModate($order = Criteria::ASC) Order by the modate column
 * @method     ChildAliMemberQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliMemberQuery orderByNameB($order = Criteria::ASC) Order by the name_b column
 * @method     ChildAliMemberQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method     ChildAliMemberQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildAliMemberQuery orderByOccupation($order = Criteria::ASC) Order by the occupation column
 * @method     ChildAliMemberQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliMemberQuery orderByMarName($order = Criteria::ASC) Order by the mar_name column
 * @method     ChildAliMemberQuery orderByMarAge($order = Criteria::ASC) Order by the mar_age column
 * @method     ChildAliMemberQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildAliMemberQuery orderByBeneficiaries($order = Criteria::ASC) Order by the beneficiaries column
 * @method     ChildAliMemberQuery orderByRelation($order = Criteria::ASC) Order by the relation column
 * @method     ChildAliMemberQuery orderByDistrictid($order = Criteria::ASC) Order by the districtId column
 * @method     ChildAliMemberQuery orderByAmphurid($order = Criteria::ASC) Order by the amphurId column
 * @method     ChildAliMemberQuery orderByProvinceid($order = Criteria::ASC) Order by the provinceId column
 * @method     ChildAliMemberQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildAliMemberQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliMemberQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliMemberQuery orderByOid($order = Criteria::ASC) Order by the oid column
 * @method     ChildAliMemberQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliMemberQuery orderByPosCur1($order = Criteria::ASC) Order by the pos_cur1 column
 * @method     ChildAliMemberQuery orderByPosCur2($order = Criteria::ASC) Order by the pos_cur2 column
 * @method     ChildAliMemberQuery orderByPosCur3($order = Criteria::ASC) Order by the pos_cur3 column
 * @method     ChildAliMemberQuery orderByPosCur4($order = Criteria::ASC) Order by the pos_cur4 column
 * @method     ChildAliMemberQuery orderByPosCurTmp($order = Criteria::ASC) Order by the pos_cur_tmp column
 * @method     ChildAliMemberQuery orderByRposCur4($order = Criteria::ASC) Order by the rpos_cur4 column
 * @method     ChildAliMemberQuery orderByPosCur3Date($order = Criteria::ASC) Order by the pos_cur3_date column
 * @method     ChildAliMemberQuery orderByMemdesc($order = Criteria::ASC) Order by the memdesc column
 * @method     ChildAliMemberQuery orderByCmp($order = Criteria::ASC) Order by the cmp column
 * @method     ChildAliMemberQuery orderByCmp2($order = Criteria::ASC) Order by the cmp2 column
 * @method     ChildAliMemberQuery orderByCmp3($order = Criteria::ASC) Order by the cmp3 column
 * @method     ChildAliMemberQuery orderByCcmp($order = Criteria::ASC) Order by the ccmp column
 * @method     ChildAliMemberQuery orderByCcmp2($order = Criteria::ASC) Order by the ccmp2 column
 * @method     ChildAliMemberQuery orderByCcmp3($order = Criteria::ASC) Order by the ccmp3 column
 * @method     ChildAliMemberQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildAliMemberQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ChildAliMemberQuery orderByBuilding($order = Criteria::ASC) Order by the building column
 * @method     ChildAliMemberQuery orderByVillage($order = Criteria::ASC) Order by the village column
 * @method     ChildAliMemberQuery orderBySoi($order = Criteria::ASC) Order by the soi column
 * @method     ChildAliMemberQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliMemberQuery orderByEatoship($order = Criteria::ASC) Order by the eatoship column
 * @method     ChildAliMemberQuery orderByEcom($order = Criteria::ASC) Order by the ecom column
 * @method     ChildAliMemberQuery orderByBmdate1($order = Criteria::ASC) Order by the bmdate1 column
 * @method     ChildAliMemberQuery orderByBmdate2($order = Criteria::ASC) Order by the bmdate2 column
 * @method     ChildAliMemberQuery orderByBmdate3($order = Criteria::ASC) Order by the bmdate3 column
 * @method     ChildAliMemberQuery orderByCbmdate1($order = Criteria::ASC) Order by the cbmdate1 column
 * @method     ChildAliMemberQuery orderByCbmdate2($order = Criteria::ASC) Order by the cbmdate2 column
 * @method     ChildAliMemberQuery orderByCbmdate3($order = Criteria::ASC) Order by the cbmdate3 column
 * @method     ChildAliMemberQuery orderByOnline($order = Criteria::ASC) Order by the online column
 * @method     ChildAliMemberQuery orderByCnameF($order = Criteria::ASC) Order by the cname_f column
 * @method     ChildAliMemberQuery orderByCnameT($order = Criteria::ASC) Order by the cname_t column
 * @method     ChildAliMemberQuery orderByCnameE($order = Criteria::ASC) Order by the cname_e column
 * @method     ChildAliMemberQuery orderByCnameB($order = Criteria::ASC) Order by the cname_b column
 * @method     ChildAliMemberQuery orderByCbirthday($order = Criteria::ASC) Order by the cbirthday column
 * @method     ChildAliMemberQuery orderByCnational($order = Criteria::ASC) Order by the cnational column
 * @method     ChildAliMemberQuery orderByCidTax($order = Criteria::ASC) Order by the cid_tax column
 * @method     ChildAliMemberQuery orderByCidCard($order = Criteria::ASC) Order by the cid_card column
 * @method     ChildAliMemberQuery orderByCaddress($order = Criteria::ASC) Order by the caddress column
 * @method     ChildAliMemberQuery orderByCbuilding($order = Criteria::ASC) Order by the cbuilding column
 * @method     ChildAliMemberQuery orderByCvillage($order = Criteria::ASC) Order by the cvillage column
 * @method     ChildAliMemberQuery orderByCstreet($order = Criteria::ASC) Order by the cstreet column
 * @method     ChildAliMemberQuery orderByCsoi($order = Criteria::ASC) Order by the csoi column
 * @method     ChildAliMemberQuery orderByCzip($order = Criteria::ASC) Order by the czip column
 * @method     ChildAliMemberQuery orderByChomeT($order = Criteria::ASC) Order by the chome_t column
 * @method     ChildAliMemberQuery orderByCofficeT($order = Criteria::ASC) Order by the coffice_t column
 * @method     ChildAliMemberQuery orderByCmobile($order = Criteria::ASC) Order by the cmobile column
 * @method     ChildAliMemberQuery orderByCfax($order = Criteria::ASC) Order by the cfax column
 * @method     ChildAliMemberQuery orderByCsex($order = Criteria::ASC) Order by the csex column
 * @method     ChildAliMemberQuery orderByCemail($order = Criteria::ASC) Order by the cemail column
 * @method     ChildAliMemberQuery orderByCdistrictid($order = Criteria::ASC) Order by the cdistrictId column
 * @method     ChildAliMemberQuery orderByCamphurid($order = Criteria::ASC) Order by the camphurId column
 * @method     ChildAliMemberQuery orderByCprovinceid($order = Criteria::ASC) Order by the cprovinceId column
 * @method     ChildAliMemberQuery orderByInameF($order = Criteria::ASC) Order by the iname_f column
 * @method     ChildAliMemberQuery orderByInameT($order = Criteria::ASC) Order by the iname_t column
 * @method     ChildAliMemberQuery orderByIrelation($order = Criteria::ASC) Order by the irelation column
 * @method     ChildAliMemberQuery orderByIphone($order = Criteria::ASC) Order by the iphone column
 * @method     ChildAliMemberQuery orderByIidCard($order = Criteria::ASC) Order by the iid_card column
 * @method     ChildAliMemberQuery orderByStatusDoc($order = Criteria::ASC) Order by the status_doc column
 * @method     ChildAliMemberQuery orderByStatusExpire($order = Criteria::ASC) Order by the status_expire column
 * @method     ChildAliMemberQuery orderByStatusTerminate($order = Criteria::ASC) Order by the status_terminate column
 * @method     ChildAliMemberQuery orderByTerminateDate($order = Criteria::ASC) Order by the terminate_date column
 * @method     ChildAliMemberQuery orderByStatusSuspend($order = Criteria::ASC) Order by the status_suspend column
 * @method     ChildAliMemberQuery orderBySuspendDate($order = Criteria::ASC) Order by the suspend_date column
 * @method     ChildAliMemberQuery orderByStatusBlacklist($order = Criteria::ASC) Order by the status_blacklist column
 * @method     ChildAliMemberQuery orderByStatusAto($order = Criteria::ASC) Order by the status_ato column
 * @method     ChildAliMemberQuery orderBySletter($order = Criteria::ASC) Order by the sletter column
 * @method     ChildAliMemberQuery orderBySinvCode($order = Criteria::ASC) Order by the sinv_code column
 * @method     ChildAliMemberQuery orderByTxtoption($order = Criteria::ASC) Order by the txtoption column
 * @method     ChildAliMemberQuery orderBySetregis($order = Criteria::ASC) Order by the setregis column
 * @method     ChildAliMemberQuery orderBySlr($order = Criteria::ASC) Order by the slr column
 * @method     ChildAliMemberQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliMemberQuery orderByCidMobile($order = Criteria::ASC) Order by the cid_mobile column
 * @method     ChildAliMemberQuery orderByBewallet($order = Criteria::ASC) Order by the bewallet column
 * @method     ChildAliMemberQuery orderByBvoucher($order = Criteria::ASC) Order by the bvoucher column
 * @method     ChildAliMemberQuery orderByVoucher($order = Criteria::ASC) Order by the voucher column
 * @method     ChildAliMemberQuery orderByManager($order = Criteria::ASC) Order by the manager column
 * @method     ChildAliMemberQuery orderByMtype($order = Criteria::ASC) Order by the mtype column
 * @method     ChildAliMemberQuery orderByMtype1($order = Criteria::ASC) Order by the mtype1 column
 * @method     ChildAliMemberQuery orderByMtype2($order = Criteria::ASC) Order by the mtype2 column
 * @method     ChildAliMemberQuery orderByMvat($order = Criteria::ASC) Order by the mvat column
 * @method     ChildAliMemberQuery orderByUidbase($order = Criteria::ASC) Order by the uidbase column
 * @method     ChildAliMemberQuery orderByExpDate($order = Criteria::ASC) Order by the exp_date column
 * @method     ChildAliMemberQuery orderByHeadCode($order = Criteria::ASC) Order by the head_code column
 * @method     ChildAliMemberQuery orderByPvL($order = Criteria::ASC) Order by the pv_l column
 * @method     ChildAliMemberQuery orderByPvC($order = Criteria::ASC) Order by the pv_c column
 * @method     ChildAliMemberQuery orderByHpvL($order = Criteria::ASC) Order by the hpv_l column
 * @method     ChildAliMemberQuery orderByHpvC($order = Criteria::ASC) Order by the hpv_c column
 * @method     ChildAliMemberQuery orderByPvLNextmonth($order = Criteria::ASC) Order by the pv_l_nextmonth column
 * @method     ChildAliMemberQuery orderByPvCNextmonth($order = Criteria::ASC) Order by the pv_c_nextmonth column
 * @method     ChildAliMemberQuery orderByPvLLastmonth1($order = Criteria::ASC) Order by the pv_l_lastmonth1 column
 * @method     ChildAliMemberQuery orderByPvCLastmonth1($order = Criteria::ASC) Order by the pv_c_lastmonth1 column
 * @method     ChildAliMemberQuery orderByPvLLastmonth2($order = Criteria::ASC) Order by the pv_l_lastmonth2 column
 * @method     ChildAliMemberQuery orderByPvCLastmonth2($order = Criteria::ASC) Order by the pv_c_lastmonth2 column
 * @method     ChildAliMemberQuery orderByRcodeStar($order = Criteria::ASC) Order by the rcode_star column
 * @method     ChildAliMemberQuery orderByBunit($order = Criteria::ASC) Order by the bunit column
 * @method     ChildAliMemberQuery orderByProvince($order = Criteria::ASC) Order by the province column
 * @method     ChildAliMemberQuery orderByLineId($order = Criteria::ASC) Order by the line_id column
 * @method     ChildAliMemberQuery orderByFacebookName($order = Criteria::ASC) Order by the facebook_name column
 * @method     ChildAliMemberQuery orderByTypeCom($order = Criteria::ASC) Order by the type_com column
 * @method     ChildAliMemberQuery orderByExpPos($order = Criteria::ASC) Order by the exp_pos column
 * @method     ChildAliMemberQuery orderByExpPos60($order = Criteria::ASC) Order by the exp_pos_60 column
 * @method     ChildAliMemberQuery orderByTripPrivate($order = Criteria::ASC) Order by the trip_private column
 * @method     ChildAliMemberQuery orderByTripTeam($order = Criteria::ASC) Order by the trip_team column
 * @method     ChildAliMemberQuery orderByMyfile1($order = Criteria::ASC) Order by the myfile1 column
 * @method     ChildAliMemberQuery orderByMyfile2($order = Criteria::ASC) Order by the myfile2 column
 * @method     ChildAliMemberQuery orderByClineId($order = Criteria::ASC) Order by the cline_id column
 * @method     ChildAliMemberQuery orderByCfacebookName($order = Criteria::ASC) Order by the cfacebook_name column
 * @method     ChildAliMemberQuery orderByProfileImg($order = Criteria::ASC) Order by the profile_img column
 * @method     ChildAliMemberQuery orderByAtocom($order = Criteria::ASC) Order by the atocom column
 * @method     ChildAliMemberQuery orderByHpv($order = Criteria::ASC) Order by the hpv column
 *
 * @method     ChildAliMemberQuery groupById() Group by the id column
 * @method     ChildAliMemberQuery groupByMcode() Group by the mcode column
 * @method     ChildAliMemberQuery groupByNameF() Group by the name_f column
 * @method     ChildAliMemberQuery groupByNameT() Group by the name_t column
 * @method     ChildAliMemberQuery groupByNameE() Group by the name_e column
 * @method     ChildAliMemberQuery groupByPosid() Group by the posid column
 * @method     ChildAliMemberQuery groupByMdate() Group by the mdate column
 * @method     ChildAliMemberQuery groupByBirthday() Group by the birthday column
 * @method     ChildAliMemberQuery groupByNational() Group by the national column
 * @method     ChildAliMemberQuery groupByIdTax() Group by the id_tax column
 * @method     ChildAliMemberQuery groupByIdCard() Group by the id_card column
 * @method     ChildAliMemberQuery groupByIdCardImg() Group by the id_card_img column
 * @method     ChildAliMemberQuery groupByIdCardImgDate() Group by the id_card_img_date column
 * @method     ChildAliMemberQuery groupByZip() Group by the zip column
 * @method     ChildAliMemberQuery groupByHomeT() Group by the home_t column
 * @method     ChildAliMemberQuery groupByOfficeT() Group by the office_t column
 * @method     ChildAliMemberQuery groupByMobile() Group by the mobile column
 * @method     ChildAliMemberQuery groupByMcodeAcc() Group by the mcode_acc column
 * @method     ChildAliMemberQuery groupByBonusrec() Group by the bonusrec column
 * @method     ChildAliMemberQuery groupByBankcode() Group by the bankcode column
 * @method     ChildAliMemberQuery groupByBranch() Group by the branch column
 * @method     ChildAliMemberQuery groupByAccType() Group by the acc_type column
 * @method     ChildAliMemberQuery groupByAccNo() Group by the acc_no column
 * @method     ChildAliMemberQuery groupByAccNoImg() Group by the acc_no_img column
 * @method     ChildAliMemberQuery groupByAccNoImgDate() Group by the acc_no_img_date column
 * @method     ChildAliMemberQuery groupByAccName() Group by the acc_name column
 * @method     ChildAliMemberQuery groupByAccProv() Group by the acc_prov column
 * @method     ChildAliMemberQuery groupBySvCode() Group by the sv_code column
 * @method     ChildAliMemberQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliMemberQuery groupBySpName() Group by the sp_name column
 * @method     ChildAliMemberQuery groupBySpCode2() Group by the sp_code2 column
 * @method     ChildAliMemberQuery groupBySpName2() Group by the sp_name2 column
 * @method     ChildAliMemberQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliMemberQuery groupByUpaName() Group by the upa_name column
 * @method     ChildAliMemberQuery groupByLr() Group by the lr column
 * @method     ChildAliMemberQuery groupByComplete() Group by the complete column
 * @method     ChildAliMemberQuery groupByCompdate() Group by the compdate column
 * @method     ChildAliMemberQuery groupByModate() Group by the modate column
 * @method     ChildAliMemberQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliMemberQuery groupByNameB() Group by the name_b column
 * @method     ChildAliMemberQuery groupBySex() Group by the sex column
 * @method     ChildAliMemberQuery groupByAge() Group by the age column
 * @method     ChildAliMemberQuery groupByOccupation() Group by the occupation column
 * @method     ChildAliMemberQuery groupByStatus() Group by the status column
 * @method     ChildAliMemberQuery groupByMarName() Group by the mar_name column
 * @method     ChildAliMemberQuery groupByMarAge() Group by the mar_age column
 * @method     ChildAliMemberQuery groupByEmail() Group by the email column
 * @method     ChildAliMemberQuery groupByBeneficiaries() Group by the beneficiaries column
 * @method     ChildAliMemberQuery groupByRelation() Group by the relation column
 * @method     ChildAliMemberQuery groupByDistrictid() Group by the districtId column
 * @method     ChildAliMemberQuery groupByAmphurid() Group by the amphurId column
 * @method     ChildAliMemberQuery groupByProvinceid() Group by the provinceId column
 * @method     ChildAliMemberQuery groupByFax() Group by the fax column
 * @method     ChildAliMemberQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliMemberQuery groupByUid() Group by the uid column
 * @method     ChildAliMemberQuery groupByOid() Group by the oid column
 * @method     ChildAliMemberQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliMemberQuery groupByPosCur1() Group by the pos_cur1 column
 * @method     ChildAliMemberQuery groupByPosCur2() Group by the pos_cur2 column
 * @method     ChildAliMemberQuery groupByPosCur3() Group by the pos_cur3 column
 * @method     ChildAliMemberQuery groupByPosCur4() Group by the pos_cur4 column
 * @method     ChildAliMemberQuery groupByPosCurTmp() Group by the pos_cur_tmp column
 * @method     ChildAliMemberQuery groupByRposCur4() Group by the rpos_cur4 column
 * @method     ChildAliMemberQuery groupByPosCur3Date() Group by the pos_cur3_date column
 * @method     ChildAliMemberQuery groupByMemdesc() Group by the memdesc column
 * @method     ChildAliMemberQuery groupByCmp() Group by the cmp column
 * @method     ChildAliMemberQuery groupByCmp2() Group by the cmp2 column
 * @method     ChildAliMemberQuery groupByCmp3() Group by the cmp3 column
 * @method     ChildAliMemberQuery groupByCcmp() Group by the ccmp column
 * @method     ChildAliMemberQuery groupByCcmp2() Group by the ccmp2 column
 * @method     ChildAliMemberQuery groupByCcmp3() Group by the ccmp3 column
 * @method     ChildAliMemberQuery groupByAddress() Group by the address column
 * @method     ChildAliMemberQuery groupByStreet() Group by the street column
 * @method     ChildAliMemberQuery groupByBuilding() Group by the building column
 * @method     ChildAliMemberQuery groupByVillage() Group by the village column
 * @method     ChildAliMemberQuery groupBySoi() Group by the soi column
 * @method     ChildAliMemberQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliMemberQuery groupByEatoship() Group by the eatoship column
 * @method     ChildAliMemberQuery groupByEcom() Group by the ecom column
 * @method     ChildAliMemberQuery groupByBmdate1() Group by the bmdate1 column
 * @method     ChildAliMemberQuery groupByBmdate2() Group by the bmdate2 column
 * @method     ChildAliMemberQuery groupByBmdate3() Group by the bmdate3 column
 * @method     ChildAliMemberQuery groupByCbmdate1() Group by the cbmdate1 column
 * @method     ChildAliMemberQuery groupByCbmdate2() Group by the cbmdate2 column
 * @method     ChildAliMemberQuery groupByCbmdate3() Group by the cbmdate3 column
 * @method     ChildAliMemberQuery groupByOnline() Group by the online column
 * @method     ChildAliMemberQuery groupByCnameF() Group by the cname_f column
 * @method     ChildAliMemberQuery groupByCnameT() Group by the cname_t column
 * @method     ChildAliMemberQuery groupByCnameE() Group by the cname_e column
 * @method     ChildAliMemberQuery groupByCnameB() Group by the cname_b column
 * @method     ChildAliMemberQuery groupByCbirthday() Group by the cbirthday column
 * @method     ChildAliMemberQuery groupByCnational() Group by the cnational column
 * @method     ChildAliMemberQuery groupByCidTax() Group by the cid_tax column
 * @method     ChildAliMemberQuery groupByCidCard() Group by the cid_card column
 * @method     ChildAliMemberQuery groupByCaddress() Group by the caddress column
 * @method     ChildAliMemberQuery groupByCbuilding() Group by the cbuilding column
 * @method     ChildAliMemberQuery groupByCvillage() Group by the cvillage column
 * @method     ChildAliMemberQuery groupByCstreet() Group by the cstreet column
 * @method     ChildAliMemberQuery groupByCsoi() Group by the csoi column
 * @method     ChildAliMemberQuery groupByCzip() Group by the czip column
 * @method     ChildAliMemberQuery groupByChomeT() Group by the chome_t column
 * @method     ChildAliMemberQuery groupByCofficeT() Group by the coffice_t column
 * @method     ChildAliMemberQuery groupByCmobile() Group by the cmobile column
 * @method     ChildAliMemberQuery groupByCfax() Group by the cfax column
 * @method     ChildAliMemberQuery groupByCsex() Group by the csex column
 * @method     ChildAliMemberQuery groupByCemail() Group by the cemail column
 * @method     ChildAliMemberQuery groupByCdistrictid() Group by the cdistrictId column
 * @method     ChildAliMemberQuery groupByCamphurid() Group by the camphurId column
 * @method     ChildAliMemberQuery groupByCprovinceid() Group by the cprovinceId column
 * @method     ChildAliMemberQuery groupByInameF() Group by the iname_f column
 * @method     ChildAliMemberQuery groupByInameT() Group by the iname_t column
 * @method     ChildAliMemberQuery groupByIrelation() Group by the irelation column
 * @method     ChildAliMemberQuery groupByIphone() Group by the iphone column
 * @method     ChildAliMemberQuery groupByIidCard() Group by the iid_card column
 * @method     ChildAliMemberQuery groupByStatusDoc() Group by the status_doc column
 * @method     ChildAliMemberQuery groupByStatusExpire() Group by the status_expire column
 * @method     ChildAliMemberQuery groupByStatusTerminate() Group by the status_terminate column
 * @method     ChildAliMemberQuery groupByTerminateDate() Group by the terminate_date column
 * @method     ChildAliMemberQuery groupByStatusSuspend() Group by the status_suspend column
 * @method     ChildAliMemberQuery groupBySuspendDate() Group by the suspend_date column
 * @method     ChildAliMemberQuery groupByStatusBlacklist() Group by the status_blacklist column
 * @method     ChildAliMemberQuery groupByStatusAto() Group by the status_ato column
 * @method     ChildAliMemberQuery groupBySletter() Group by the sletter column
 * @method     ChildAliMemberQuery groupBySinvCode() Group by the sinv_code column
 * @method     ChildAliMemberQuery groupByTxtoption() Group by the txtoption column
 * @method     ChildAliMemberQuery groupBySetregis() Group by the setregis column
 * @method     ChildAliMemberQuery groupBySlr() Group by the slr column
 * @method     ChildAliMemberQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliMemberQuery groupByCidMobile() Group by the cid_mobile column
 * @method     ChildAliMemberQuery groupByBewallet() Group by the bewallet column
 * @method     ChildAliMemberQuery groupByBvoucher() Group by the bvoucher column
 * @method     ChildAliMemberQuery groupByVoucher() Group by the voucher column
 * @method     ChildAliMemberQuery groupByManager() Group by the manager column
 * @method     ChildAliMemberQuery groupByMtype() Group by the mtype column
 * @method     ChildAliMemberQuery groupByMtype1() Group by the mtype1 column
 * @method     ChildAliMemberQuery groupByMtype2() Group by the mtype2 column
 * @method     ChildAliMemberQuery groupByMvat() Group by the mvat column
 * @method     ChildAliMemberQuery groupByUidbase() Group by the uidbase column
 * @method     ChildAliMemberQuery groupByExpDate() Group by the exp_date column
 * @method     ChildAliMemberQuery groupByHeadCode() Group by the head_code column
 * @method     ChildAliMemberQuery groupByPvL() Group by the pv_l column
 * @method     ChildAliMemberQuery groupByPvC() Group by the pv_c column
 * @method     ChildAliMemberQuery groupByHpvL() Group by the hpv_l column
 * @method     ChildAliMemberQuery groupByHpvC() Group by the hpv_c column
 * @method     ChildAliMemberQuery groupByPvLNextmonth() Group by the pv_l_nextmonth column
 * @method     ChildAliMemberQuery groupByPvCNextmonth() Group by the pv_c_nextmonth column
 * @method     ChildAliMemberQuery groupByPvLLastmonth1() Group by the pv_l_lastmonth1 column
 * @method     ChildAliMemberQuery groupByPvCLastmonth1() Group by the pv_c_lastmonth1 column
 * @method     ChildAliMemberQuery groupByPvLLastmonth2() Group by the pv_l_lastmonth2 column
 * @method     ChildAliMemberQuery groupByPvCLastmonth2() Group by the pv_c_lastmonth2 column
 * @method     ChildAliMemberQuery groupByRcodeStar() Group by the rcode_star column
 * @method     ChildAliMemberQuery groupByBunit() Group by the bunit column
 * @method     ChildAliMemberQuery groupByProvince() Group by the province column
 * @method     ChildAliMemberQuery groupByLineId() Group by the line_id column
 * @method     ChildAliMemberQuery groupByFacebookName() Group by the facebook_name column
 * @method     ChildAliMemberQuery groupByTypeCom() Group by the type_com column
 * @method     ChildAliMemberQuery groupByExpPos() Group by the exp_pos column
 * @method     ChildAliMemberQuery groupByExpPos60() Group by the exp_pos_60 column
 * @method     ChildAliMemberQuery groupByTripPrivate() Group by the trip_private column
 * @method     ChildAliMemberQuery groupByTripTeam() Group by the trip_team column
 * @method     ChildAliMemberQuery groupByMyfile1() Group by the myfile1 column
 * @method     ChildAliMemberQuery groupByMyfile2() Group by the myfile2 column
 * @method     ChildAliMemberQuery groupByClineId() Group by the cline_id column
 * @method     ChildAliMemberQuery groupByCfacebookName() Group by the cfacebook_name column
 * @method     ChildAliMemberQuery groupByProfileImg() Group by the profile_img column
 * @method     ChildAliMemberQuery groupByAtocom() Group by the atocom column
 * @method     ChildAliMemberQuery groupByHpv() Group by the hpv column
 *
 * @method     ChildAliMemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMemberQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMemberQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMemberQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMember findOne(ConnectionInterface $con = null) Return the first ChildAliMember matching the query
 * @method     ChildAliMember findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMember matching the query, or a new ChildAliMember object populated from the query conditions when no match is found
 *
 * @method     ChildAliMember findOneById(int $id) Return the first ChildAliMember filtered by the id column
 * @method     ChildAliMember findOneByMcode(string $mcode) Return the first ChildAliMember filtered by the mcode column
 * @method     ChildAliMember findOneByNameF(string $name_f) Return the first ChildAliMember filtered by the name_f column
 * @method     ChildAliMember findOneByNameT(string $name_t) Return the first ChildAliMember filtered by the name_t column
 * @method     ChildAliMember findOneByNameE(string $name_e) Return the first ChildAliMember filtered by the name_e column
 * @method     ChildAliMember findOneByPosid(string $posid) Return the first ChildAliMember filtered by the posid column
 * @method     ChildAliMember findOneByMdate(string $mdate) Return the first ChildAliMember filtered by the mdate column
 * @method     ChildAliMember findOneByBirthday(string $birthday) Return the first ChildAliMember filtered by the birthday column
 * @method     ChildAliMember findOneByNational(string $national) Return the first ChildAliMember filtered by the national column
 * @method     ChildAliMember findOneByIdTax(string $id_tax) Return the first ChildAliMember filtered by the id_tax column
 * @method     ChildAliMember findOneByIdCard(string $id_card) Return the first ChildAliMember filtered by the id_card column
 * @method     ChildAliMember findOneByIdCardImg(string $id_card_img) Return the first ChildAliMember filtered by the id_card_img column
 * @method     ChildAliMember findOneByIdCardImgDate(string $id_card_img_date) Return the first ChildAliMember filtered by the id_card_img_date column
 * @method     ChildAliMember findOneByZip(string $zip) Return the first ChildAliMember filtered by the zip column
 * @method     ChildAliMember findOneByHomeT(string $home_t) Return the first ChildAliMember filtered by the home_t column
 * @method     ChildAliMember findOneByOfficeT(string $office_t) Return the first ChildAliMember filtered by the office_t column
 * @method     ChildAliMember findOneByMobile(string $mobile) Return the first ChildAliMember filtered by the mobile column
 * @method     ChildAliMember findOneByMcodeAcc(string $mcode_acc) Return the first ChildAliMember filtered by the mcode_acc column
 * @method     ChildAliMember findOneByBonusrec(string $bonusrec) Return the first ChildAliMember filtered by the bonusrec column
 * @method     ChildAliMember findOneByBankcode(string $bankcode) Return the first ChildAliMember filtered by the bankcode column
 * @method     ChildAliMember findOneByBranch(string $branch) Return the first ChildAliMember filtered by the branch column
 * @method     ChildAliMember findOneByAccType(string $acc_type) Return the first ChildAliMember filtered by the acc_type column
 * @method     ChildAliMember findOneByAccNo(string $acc_no) Return the first ChildAliMember filtered by the acc_no column
 * @method     ChildAliMember findOneByAccNoImg(string $acc_no_img) Return the first ChildAliMember filtered by the acc_no_img column
 * @method     ChildAliMember findOneByAccNoImgDate(string $acc_no_img_date) Return the first ChildAliMember filtered by the acc_no_img_date column
 * @method     ChildAliMember findOneByAccName(string $acc_name) Return the first ChildAliMember filtered by the acc_name column
 * @method     ChildAliMember findOneByAccProv(string $acc_prov) Return the first ChildAliMember filtered by the acc_prov column
 * @method     ChildAliMember findOneBySvCode(string $sv_code) Return the first ChildAliMember filtered by the sv_code column
 * @method     ChildAliMember findOneBySpCode(string $sp_code) Return the first ChildAliMember filtered by the sp_code column
 * @method     ChildAliMember findOneBySpName(string $sp_name) Return the first ChildAliMember filtered by the sp_name column
 * @method     ChildAliMember findOneBySpCode2(string $sp_code2) Return the first ChildAliMember filtered by the sp_code2 column
 * @method     ChildAliMember findOneBySpName2(string $sp_name2) Return the first ChildAliMember filtered by the sp_name2 column
 * @method     ChildAliMember findOneByUpaCode(string $upa_code) Return the first ChildAliMember filtered by the upa_code column
 * @method     ChildAliMember findOneByUpaName(string $upa_name) Return the first ChildAliMember filtered by the upa_name column
 * @method     ChildAliMember findOneByLr(string $lr) Return the first ChildAliMember filtered by the lr column
 * @method     ChildAliMember findOneByComplete(string $complete) Return the first ChildAliMember filtered by the complete column
 * @method     ChildAliMember findOneByCompdate(string $compdate) Return the first ChildAliMember filtered by the compdate column
 * @method     ChildAliMember findOneByModate(string $modate) Return the first ChildAliMember filtered by the modate column
 * @method     ChildAliMember findOneByUsercode(string $usercode) Return the first ChildAliMember filtered by the usercode column
 * @method     ChildAliMember findOneByNameB(string $name_b) Return the first ChildAliMember filtered by the name_b column
 * @method     ChildAliMember findOneBySex(string $sex) Return the first ChildAliMember filtered by the sex column
 * @method     ChildAliMember findOneByAge(int $age) Return the first ChildAliMember filtered by the age column
 * @method     ChildAliMember findOneByOccupation(string $occupation) Return the first ChildAliMember filtered by the occupation column
 * @method     ChildAliMember findOneByStatus(int $status) Return the first ChildAliMember filtered by the status column
 * @method     ChildAliMember findOneByMarName(string $mar_name) Return the first ChildAliMember filtered by the mar_name column
 * @method     ChildAliMember findOneByMarAge(int $mar_age) Return the first ChildAliMember filtered by the mar_age column
 * @method     ChildAliMember findOneByEmail(string $email) Return the first ChildAliMember filtered by the email column
 * @method     ChildAliMember findOneByBeneficiaries(string $beneficiaries) Return the first ChildAliMember filtered by the beneficiaries column
 * @method     ChildAliMember findOneByRelation(string $relation) Return the first ChildAliMember filtered by the relation column
 * @method     ChildAliMember findOneByDistrictid(string $districtId) Return the first ChildAliMember filtered by the districtId column
 * @method     ChildAliMember findOneByAmphurid(string $amphurId) Return the first ChildAliMember filtered by the amphurId column
 * @method     ChildAliMember findOneByProvinceid(string $provinceId) Return the first ChildAliMember filtered by the provinceId column
 * @method     ChildAliMember findOneByFax(string $fax) Return the first ChildAliMember filtered by the fax column
 * @method     ChildAliMember findOneByInvCode(string $inv_code) Return the first ChildAliMember filtered by the inv_code column
 * @method     ChildAliMember findOneByUid(string $uid) Return the first ChildAliMember filtered by the uid column
 * @method     ChildAliMember findOneByOid(string $oid) Return the first ChildAliMember filtered by the oid column
 * @method     ChildAliMember findOneByPosCur(string $pos_cur) Return the first ChildAliMember filtered by the pos_cur column
 * @method     ChildAliMember findOneByPosCur1(string $pos_cur1) Return the first ChildAliMember filtered by the pos_cur1 column
 * @method     ChildAliMember findOneByPosCur2(string $pos_cur2) Return the first ChildAliMember filtered by the pos_cur2 column
 * @method     ChildAliMember findOneByPosCur3(string $pos_cur3) Return the first ChildAliMember filtered by the pos_cur3 column
 * @method     ChildAliMember findOneByPosCur4(string $pos_cur4) Return the first ChildAliMember filtered by the pos_cur4 column
 * @method     ChildAliMember findOneByPosCurTmp(string $pos_cur_tmp) Return the first ChildAliMember filtered by the pos_cur_tmp column
 * @method     ChildAliMember findOneByRposCur4(int $rpos_cur4) Return the first ChildAliMember filtered by the rpos_cur4 column
 * @method     ChildAliMember findOneByPosCur3Date(string $pos_cur3_date) Return the first ChildAliMember filtered by the pos_cur3_date column
 * @method     ChildAliMember findOneByMemdesc(string $memdesc) Return the first ChildAliMember filtered by the memdesc column
 * @method     ChildAliMember findOneByCmp(string $cmp) Return the first ChildAliMember filtered by the cmp column
 * @method     ChildAliMember findOneByCmp2(string $cmp2) Return the first ChildAliMember filtered by the cmp2 column
 * @method     ChildAliMember findOneByCmp3(string $cmp3) Return the first ChildAliMember filtered by the cmp3 column
 * @method     ChildAliMember findOneByCcmp(string $ccmp) Return the first ChildAliMember filtered by the ccmp column
 * @method     ChildAliMember findOneByCcmp2(string $ccmp2) Return the first ChildAliMember filtered by the ccmp2 column
 * @method     ChildAliMember findOneByCcmp3(string $ccmp3) Return the first ChildAliMember filtered by the ccmp3 column
 * @method     ChildAliMember findOneByAddress(string $address) Return the first ChildAliMember filtered by the address column
 * @method     ChildAliMember findOneByStreet(string $street) Return the first ChildAliMember filtered by the street column
 * @method     ChildAliMember findOneByBuilding(string $building) Return the first ChildAliMember filtered by the building column
 * @method     ChildAliMember findOneByVillage(string $village) Return the first ChildAliMember filtered by the village column
 * @method     ChildAliMember findOneBySoi(string $soi) Return the first ChildAliMember filtered by the soi column
 * @method     ChildAliMember findOneByEwallet(string $ewallet) Return the first ChildAliMember filtered by the ewallet column
 * @method     ChildAliMember findOneByEatoship(string $eatoship) Return the first ChildAliMember filtered by the eatoship column
 * @method     ChildAliMember findOneByEcom(string $ecom) Return the first ChildAliMember filtered by the ecom column
 * @method     ChildAliMember findOneByBmdate1(string $bmdate1) Return the first ChildAliMember filtered by the bmdate1 column
 * @method     ChildAliMember findOneByBmdate2(string $bmdate2) Return the first ChildAliMember filtered by the bmdate2 column
 * @method     ChildAliMember findOneByBmdate3(string $bmdate3) Return the first ChildAliMember filtered by the bmdate3 column
 * @method     ChildAliMember findOneByCbmdate1(string $cbmdate1) Return the first ChildAliMember filtered by the cbmdate1 column
 * @method     ChildAliMember findOneByCbmdate2(string $cbmdate2) Return the first ChildAliMember filtered by the cbmdate2 column
 * @method     ChildAliMember findOneByCbmdate3(string $cbmdate3) Return the first ChildAliMember filtered by the cbmdate3 column
 * @method     ChildAliMember findOneByOnline(int $online) Return the first ChildAliMember filtered by the online column
 * @method     ChildAliMember findOneByCnameF(string $cname_f) Return the first ChildAliMember filtered by the cname_f column
 * @method     ChildAliMember findOneByCnameT(string $cname_t) Return the first ChildAliMember filtered by the cname_t column
 * @method     ChildAliMember findOneByCnameE(string $cname_e) Return the first ChildAliMember filtered by the cname_e column
 * @method     ChildAliMember findOneByCnameB(string $cname_b) Return the first ChildAliMember filtered by the cname_b column
 * @method     ChildAliMember findOneByCbirthday(string $cbirthday) Return the first ChildAliMember filtered by the cbirthday column
 * @method     ChildAliMember findOneByCnational(string $cnational) Return the first ChildAliMember filtered by the cnational column
 * @method     ChildAliMember findOneByCidTax(string $cid_tax) Return the first ChildAliMember filtered by the cid_tax column
 * @method     ChildAliMember findOneByCidCard(string $cid_card) Return the first ChildAliMember filtered by the cid_card column
 * @method     ChildAliMember findOneByCaddress(string $caddress) Return the first ChildAliMember filtered by the caddress column
 * @method     ChildAliMember findOneByCbuilding(string $cbuilding) Return the first ChildAliMember filtered by the cbuilding column
 * @method     ChildAliMember findOneByCvillage(string $cvillage) Return the first ChildAliMember filtered by the cvillage column
 * @method     ChildAliMember findOneByCstreet(string $cstreet) Return the first ChildAliMember filtered by the cstreet column
 * @method     ChildAliMember findOneByCsoi(string $csoi) Return the first ChildAliMember filtered by the csoi column
 * @method     ChildAliMember findOneByCzip(string $czip) Return the first ChildAliMember filtered by the czip column
 * @method     ChildAliMember findOneByChomeT(string $chome_t) Return the first ChildAliMember filtered by the chome_t column
 * @method     ChildAliMember findOneByCofficeT(string $coffice_t) Return the first ChildAliMember filtered by the coffice_t column
 * @method     ChildAliMember findOneByCmobile(string $cmobile) Return the first ChildAliMember filtered by the cmobile column
 * @method     ChildAliMember findOneByCfax(string $cfax) Return the first ChildAliMember filtered by the cfax column
 * @method     ChildAliMember findOneByCsex(string $csex) Return the first ChildAliMember filtered by the csex column
 * @method     ChildAliMember findOneByCemail(string $cemail) Return the first ChildAliMember filtered by the cemail column
 * @method     ChildAliMember findOneByCdistrictid(string $cdistrictId) Return the first ChildAliMember filtered by the cdistrictId column
 * @method     ChildAliMember findOneByCamphurid(string $camphurId) Return the first ChildAliMember filtered by the camphurId column
 * @method     ChildAliMember findOneByCprovinceid(string $cprovinceId) Return the first ChildAliMember filtered by the cprovinceId column
 * @method     ChildAliMember findOneByInameF(string $iname_f) Return the first ChildAliMember filtered by the iname_f column
 * @method     ChildAliMember findOneByInameT(string $iname_t) Return the first ChildAliMember filtered by the iname_t column
 * @method     ChildAliMember findOneByIrelation(string $irelation) Return the first ChildAliMember filtered by the irelation column
 * @method     ChildAliMember findOneByIphone(string $iphone) Return the first ChildAliMember filtered by the iphone column
 * @method     ChildAliMember findOneByIidCard(string $iid_card) Return the first ChildAliMember filtered by the iid_card column
 * @method     ChildAliMember findOneByStatusDoc(int $status_doc) Return the first ChildAliMember filtered by the status_doc column
 * @method     ChildAliMember findOneByStatusExpire(int $status_expire) Return the first ChildAliMember filtered by the status_expire column
 * @method     ChildAliMember findOneByStatusTerminate(int $status_terminate) Return the first ChildAliMember filtered by the status_terminate column
 * @method     ChildAliMember findOneByTerminateDate(string $terminate_date) Return the first ChildAliMember filtered by the terminate_date column
 * @method     ChildAliMember findOneByStatusSuspend(int $status_suspend) Return the first ChildAliMember filtered by the status_suspend column
 * @method     ChildAliMember findOneBySuspendDate(string $suspend_date) Return the first ChildAliMember filtered by the suspend_date column
 * @method     ChildAliMember findOneByStatusBlacklist(int $status_blacklist) Return the first ChildAliMember filtered by the status_blacklist column
 * @method     ChildAliMember findOneByStatusAto(int $status_ato) Return the first ChildAliMember filtered by the status_ato column
 * @method     ChildAliMember findOneBySletter(int $sletter) Return the first ChildAliMember filtered by the sletter column
 * @method     ChildAliMember findOneBySinvCode(string $sinv_code) Return the first ChildAliMember filtered by the sinv_code column
 * @method     ChildAliMember findOneByTxtoption(string $txtoption) Return the first ChildAliMember filtered by the txtoption column
 * @method     ChildAliMember findOneBySetregis(int $setregis) Return the first ChildAliMember filtered by the setregis column
 * @method     ChildAliMember findOneBySlr(string $slr) Return the first ChildAliMember filtered by the slr column
 * @method     ChildAliMember findOneByLocationbase(int $locationbase) Return the first ChildAliMember filtered by the locationbase column
 * @method     ChildAliMember findOneByCidMobile(string $cid_mobile) Return the first ChildAliMember filtered by the cid_mobile column
 * @method     ChildAliMember findOneByBewallet(string $bewallet) Return the first ChildAliMember filtered by the bewallet column
 * @method     ChildAliMember findOneByBvoucher(string $bvoucher) Return the first ChildAliMember filtered by the bvoucher column
 * @method     ChildAliMember findOneByVoucher(string $voucher) Return the first ChildAliMember filtered by the voucher column
 * @method     ChildAliMember findOneByManager(string $manager) Return the first ChildAliMember filtered by the manager column
 * @method     ChildAliMember findOneByMtype(int $mtype) Return the first ChildAliMember filtered by the mtype column
 * @method     ChildAliMember findOneByMtype1(int $mtype1) Return the first ChildAliMember filtered by the mtype1 column
 * @method     ChildAliMember findOneByMtype2(int $mtype2) Return the first ChildAliMember filtered by the mtype2 column
 * @method     ChildAliMember findOneByMvat(int $mvat) Return the first ChildAliMember filtered by the mvat column
 * @method     ChildAliMember findOneByUidbase(string $uidbase) Return the first ChildAliMember filtered by the uidbase column
 * @method     ChildAliMember findOneByExpDate(string $exp_date) Return the first ChildAliMember filtered by the exp_date column
 * @method     ChildAliMember findOneByHeadCode(string $head_code) Return the first ChildAliMember filtered by the head_code column
 * @method     ChildAliMember findOneByPvL(string $pv_l) Return the first ChildAliMember filtered by the pv_l column
 * @method     ChildAliMember findOneByPvC(string $pv_c) Return the first ChildAliMember filtered by the pv_c column
 * @method     ChildAliMember findOneByHpvL(string $hpv_l) Return the first ChildAliMember filtered by the hpv_l column
 * @method     ChildAliMember findOneByHpvC(string $hpv_c) Return the first ChildAliMember filtered by the hpv_c column
 * @method     ChildAliMember findOneByPvLNextmonth(string $pv_l_nextmonth) Return the first ChildAliMember filtered by the pv_l_nextmonth column
 * @method     ChildAliMember findOneByPvCNextmonth(string $pv_c_nextmonth) Return the first ChildAliMember filtered by the pv_c_nextmonth column
 * @method     ChildAliMember findOneByPvLLastmonth1(string $pv_l_lastmonth1) Return the first ChildAliMember filtered by the pv_l_lastmonth1 column
 * @method     ChildAliMember findOneByPvCLastmonth1(string $pv_c_lastmonth1) Return the first ChildAliMember filtered by the pv_c_lastmonth1 column
 * @method     ChildAliMember findOneByPvLLastmonth2(string $pv_l_lastmonth2) Return the first ChildAliMember filtered by the pv_l_lastmonth2 column
 * @method     ChildAliMember findOneByPvCLastmonth2(string $pv_c_lastmonth2) Return the first ChildAliMember filtered by the pv_c_lastmonth2 column
 * @method     ChildAliMember findOneByRcodeStar(int $rcode_star) Return the first ChildAliMember filtered by the rcode_star column
 * @method     ChildAliMember findOneByBunit(int $bunit) Return the first ChildAliMember filtered by the bunit column
 * @method     ChildAliMember findOneByProvince(string $province) Return the first ChildAliMember filtered by the province column
 * @method     ChildAliMember findOneByLineId(string $line_id) Return the first ChildAliMember filtered by the line_id column
 * @method     ChildAliMember findOneByFacebookName(string $facebook_name) Return the first ChildAliMember filtered by the facebook_name column
 * @method     ChildAliMember findOneByTypeCom(int $type_com) Return the first ChildAliMember filtered by the type_com column
 * @method     ChildAliMember findOneByExpPos(string $exp_pos) Return the first ChildAliMember filtered by the exp_pos column
 * @method     ChildAliMember findOneByExpPos60(string $exp_pos_60) Return the first ChildAliMember filtered by the exp_pos_60 column
 * @method     ChildAliMember findOneByTripPrivate(string $trip_private) Return the first ChildAliMember filtered by the trip_private column
 * @method     ChildAliMember findOneByTripTeam(string $trip_team) Return the first ChildAliMember filtered by the trip_team column
 * @method     ChildAliMember findOneByMyfile1(string $myfile1) Return the first ChildAliMember filtered by the myfile1 column
 * @method     ChildAliMember findOneByMyfile2(string $myfile2) Return the first ChildAliMember filtered by the myfile2 column
 * @method     ChildAliMember findOneByClineId(string $cline_id) Return the first ChildAliMember filtered by the cline_id column
 * @method     ChildAliMember findOneByCfacebookName(string $cfacebook_name) Return the first ChildAliMember filtered by the cfacebook_name column
 * @method     ChildAliMember findOneByProfileImg(string $profile_img) Return the first ChildAliMember filtered by the profile_img column
 * @method     ChildAliMember findOneByAtocom(int $atocom) Return the first ChildAliMember filtered by the atocom column
 * @method     ChildAliMember findOneByHpv(string $hpv) Return the first ChildAliMember filtered by the hpv column *

 * @method     ChildAliMember requirePk($key, ConnectionInterface $con = null) Return the ChildAliMember by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOne(ConnectionInterface $con = null) Return the first ChildAliMember matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMember requireOneById(int $id) Return the first ChildAliMember filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMcode(string $mcode) Return the first ChildAliMember filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByNameF(string $name_f) Return the first ChildAliMember filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByNameT(string $name_t) Return the first ChildAliMember filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByNameE(string $name_e) Return the first ChildAliMember filtered by the name_e column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPosid(string $posid) Return the first ChildAliMember filtered by the posid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMdate(string $mdate) Return the first ChildAliMember filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBirthday(string $birthday) Return the first ChildAliMember filtered by the birthday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByNational(string $national) Return the first ChildAliMember filtered by the national column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByIdTax(string $id_tax) Return the first ChildAliMember filtered by the id_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByIdCard(string $id_card) Return the first ChildAliMember filtered by the id_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByIdCardImg(string $id_card_img) Return the first ChildAliMember filtered by the id_card_img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByIdCardImgDate(string $id_card_img_date) Return the first ChildAliMember filtered by the id_card_img_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByZip(string $zip) Return the first ChildAliMember filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByHomeT(string $home_t) Return the first ChildAliMember filtered by the home_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByOfficeT(string $office_t) Return the first ChildAliMember filtered by the office_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMobile(string $mobile) Return the first ChildAliMember filtered by the mobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMcodeAcc(string $mcode_acc) Return the first ChildAliMember filtered by the mcode_acc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBonusrec(string $bonusrec) Return the first ChildAliMember filtered by the bonusrec column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBankcode(string $bankcode) Return the first ChildAliMember filtered by the bankcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBranch(string $branch) Return the first ChildAliMember filtered by the branch column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAccType(string $acc_type) Return the first ChildAliMember filtered by the acc_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAccNo(string $acc_no) Return the first ChildAliMember filtered by the acc_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAccNoImg(string $acc_no_img) Return the first ChildAliMember filtered by the acc_no_img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAccNoImgDate(string $acc_no_img_date) Return the first ChildAliMember filtered by the acc_no_img_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAccName(string $acc_name) Return the first ChildAliMember filtered by the acc_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAccProv(string $acc_prov) Return the first ChildAliMember filtered by the acc_prov column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySvCode(string $sv_code) Return the first ChildAliMember filtered by the sv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySpCode(string $sp_code) Return the first ChildAliMember filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySpName(string $sp_name) Return the first ChildAliMember filtered by the sp_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySpCode2(string $sp_code2) Return the first ChildAliMember filtered by the sp_code2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySpName2(string $sp_name2) Return the first ChildAliMember filtered by the sp_name2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByUpaCode(string $upa_code) Return the first ChildAliMember filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByUpaName(string $upa_name) Return the first ChildAliMember filtered by the upa_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByLr(string $lr) Return the first ChildAliMember filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByComplete(string $complete) Return the first ChildAliMember filtered by the complete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCompdate(string $compdate) Return the first ChildAliMember filtered by the compdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByModate(string $modate) Return the first ChildAliMember filtered by the modate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByUsercode(string $usercode) Return the first ChildAliMember filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByNameB(string $name_b) Return the first ChildAliMember filtered by the name_b column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySex(string $sex) Return the first ChildAliMember filtered by the sex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAge(int $age) Return the first ChildAliMember filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByOccupation(string $occupation) Return the first ChildAliMember filtered by the occupation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByStatus(int $status) Return the first ChildAliMember filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMarName(string $mar_name) Return the first ChildAliMember filtered by the mar_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMarAge(int $mar_age) Return the first ChildAliMember filtered by the mar_age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByEmail(string $email) Return the first ChildAliMember filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBeneficiaries(string $beneficiaries) Return the first ChildAliMember filtered by the beneficiaries column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByRelation(string $relation) Return the first ChildAliMember filtered by the relation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByDistrictid(string $districtId) Return the first ChildAliMember filtered by the districtId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAmphurid(string $amphurId) Return the first ChildAliMember filtered by the amphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByProvinceid(string $provinceId) Return the first ChildAliMember filtered by the provinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByFax(string $fax) Return the first ChildAliMember filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByInvCode(string $inv_code) Return the first ChildAliMember filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByUid(string $uid) Return the first ChildAliMember filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByOid(string $oid) Return the first ChildAliMember filtered by the oid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPosCur(string $pos_cur) Return the first ChildAliMember filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPosCur1(string $pos_cur1) Return the first ChildAliMember filtered by the pos_cur1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPosCur2(string $pos_cur2) Return the first ChildAliMember filtered by the pos_cur2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPosCur3(string $pos_cur3) Return the first ChildAliMember filtered by the pos_cur3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPosCur4(string $pos_cur4) Return the first ChildAliMember filtered by the pos_cur4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPosCurTmp(string $pos_cur_tmp) Return the first ChildAliMember filtered by the pos_cur_tmp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByRposCur4(int $rpos_cur4) Return the first ChildAliMember filtered by the rpos_cur4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPosCur3Date(string $pos_cur3_date) Return the first ChildAliMember filtered by the pos_cur3_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMemdesc(string $memdesc) Return the first ChildAliMember filtered by the memdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCmp(string $cmp) Return the first ChildAliMember filtered by the cmp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCmp2(string $cmp2) Return the first ChildAliMember filtered by the cmp2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCmp3(string $cmp3) Return the first ChildAliMember filtered by the cmp3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCcmp(string $ccmp) Return the first ChildAliMember filtered by the ccmp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCcmp2(string $ccmp2) Return the first ChildAliMember filtered by the ccmp2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCcmp3(string $ccmp3) Return the first ChildAliMember filtered by the ccmp3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAddress(string $address) Return the first ChildAliMember filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByStreet(string $street) Return the first ChildAliMember filtered by the street column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBuilding(string $building) Return the first ChildAliMember filtered by the building column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByVillage(string $village) Return the first ChildAliMember filtered by the village column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySoi(string $soi) Return the first ChildAliMember filtered by the soi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByEwallet(string $ewallet) Return the first ChildAliMember filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByEatoship(string $eatoship) Return the first ChildAliMember filtered by the eatoship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByEcom(string $ecom) Return the first ChildAliMember filtered by the ecom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBmdate1(string $bmdate1) Return the first ChildAliMember filtered by the bmdate1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBmdate2(string $bmdate2) Return the first ChildAliMember filtered by the bmdate2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBmdate3(string $bmdate3) Return the first ChildAliMember filtered by the bmdate3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCbmdate1(string $cbmdate1) Return the first ChildAliMember filtered by the cbmdate1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCbmdate2(string $cbmdate2) Return the first ChildAliMember filtered by the cbmdate2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCbmdate3(string $cbmdate3) Return the first ChildAliMember filtered by the cbmdate3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByOnline(int $online) Return the first ChildAliMember filtered by the online column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCnameF(string $cname_f) Return the first ChildAliMember filtered by the cname_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCnameT(string $cname_t) Return the first ChildAliMember filtered by the cname_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCnameE(string $cname_e) Return the first ChildAliMember filtered by the cname_e column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCnameB(string $cname_b) Return the first ChildAliMember filtered by the cname_b column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCbirthday(string $cbirthday) Return the first ChildAliMember filtered by the cbirthday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCnational(string $cnational) Return the first ChildAliMember filtered by the cnational column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCidTax(string $cid_tax) Return the first ChildAliMember filtered by the cid_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCidCard(string $cid_card) Return the first ChildAliMember filtered by the cid_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCaddress(string $caddress) Return the first ChildAliMember filtered by the caddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCbuilding(string $cbuilding) Return the first ChildAliMember filtered by the cbuilding column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCvillage(string $cvillage) Return the first ChildAliMember filtered by the cvillage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCstreet(string $cstreet) Return the first ChildAliMember filtered by the cstreet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCsoi(string $csoi) Return the first ChildAliMember filtered by the csoi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCzip(string $czip) Return the first ChildAliMember filtered by the czip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByChomeT(string $chome_t) Return the first ChildAliMember filtered by the chome_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCofficeT(string $coffice_t) Return the first ChildAliMember filtered by the coffice_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCmobile(string $cmobile) Return the first ChildAliMember filtered by the cmobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCfax(string $cfax) Return the first ChildAliMember filtered by the cfax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCsex(string $csex) Return the first ChildAliMember filtered by the csex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCemail(string $cemail) Return the first ChildAliMember filtered by the cemail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCdistrictid(string $cdistrictId) Return the first ChildAliMember filtered by the cdistrictId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCamphurid(string $camphurId) Return the first ChildAliMember filtered by the camphurId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCprovinceid(string $cprovinceId) Return the first ChildAliMember filtered by the cprovinceId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByInameF(string $iname_f) Return the first ChildAliMember filtered by the iname_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByInameT(string $iname_t) Return the first ChildAliMember filtered by the iname_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByIrelation(string $irelation) Return the first ChildAliMember filtered by the irelation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByIphone(string $iphone) Return the first ChildAliMember filtered by the iphone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByIidCard(string $iid_card) Return the first ChildAliMember filtered by the iid_card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByStatusDoc(int $status_doc) Return the first ChildAliMember filtered by the status_doc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByStatusExpire(int $status_expire) Return the first ChildAliMember filtered by the status_expire column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByStatusTerminate(int $status_terminate) Return the first ChildAliMember filtered by the status_terminate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByTerminateDate(string $terminate_date) Return the first ChildAliMember filtered by the terminate_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByStatusSuspend(int $status_suspend) Return the first ChildAliMember filtered by the status_suspend column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySuspendDate(string $suspend_date) Return the first ChildAliMember filtered by the suspend_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByStatusBlacklist(int $status_blacklist) Return the first ChildAliMember filtered by the status_blacklist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByStatusAto(int $status_ato) Return the first ChildAliMember filtered by the status_ato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySletter(int $sletter) Return the first ChildAliMember filtered by the sletter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySinvCode(string $sinv_code) Return the first ChildAliMember filtered by the sinv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByTxtoption(string $txtoption) Return the first ChildAliMember filtered by the txtoption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySetregis(int $setregis) Return the first ChildAliMember filtered by the setregis column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneBySlr(string $slr) Return the first ChildAliMember filtered by the slr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByLocationbase(int $locationbase) Return the first ChildAliMember filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCidMobile(string $cid_mobile) Return the first ChildAliMember filtered by the cid_mobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBewallet(string $bewallet) Return the first ChildAliMember filtered by the bewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBvoucher(string $bvoucher) Return the first ChildAliMember filtered by the bvoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByVoucher(string $voucher) Return the first ChildAliMember filtered by the voucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByManager(string $manager) Return the first ChildAliMember filtered by the manager column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMtype(int $mtype) Return the first ChildAliMember filtered by the mtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMtype1(int $mtype1) Return the first ChildAliMember filtered by the mtype1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMtype2(int $mtype2) Return the first ChildAliMember filtered by the mtype2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMvat(int $mvat) Return the first ChildAliMember filtered by the mvat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByUidbase(string $uidbase) Return the first ChildAliMember filtered by the uidbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByExpDate(string $exp_date) Return the first ChildAliMember filtered by the exp_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByHeadCode(string $head_code) Return the first ChildAliMember filtered by the head_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPvL(string $pv_l) Return the first ChildAliMember filtered by the pv_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPvC(string $pv_c) Return the first ChildAliMember filtered by the pv_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByHpvL(string $hpv_l) Return the first ChildAliMember filtered by the hpv_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByHpvC(string $hpv_c) Return the first ChildAliMember filtered by the hpv_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPvLNextmonth(string $pv_l_nextmonth) Return the first ChildAliMember filtered by the pv_l_nextmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPvCNextmonth(string $pv_c_nextmonth) Return the first ChildAliMember filtered by the pv_c_nextmonth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPvLLastmonth1(string $pv_l_lastmonth1) Return the first ChildAliMember filtered by the pv_l_lastmonth1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPvCLastmonth1(string $pv_c_lastmonth1) Return the first ChildAliMember filtered by the pv_c_lastmonth1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPvLLastmonth2(string $pv_l_lastmonth2) Return the first ChildAliMember filtered by the pv_l_lastmonth2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByPvCLastmonth2(string $pv_c_lastmonth2) Return the first ChildAliMember filtered by the pv_c_lastmonth2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByRcodeStar(int $rcode_star) Return the first ChildAliMember filtered by the rcode_star column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByBunit(int $bunit) Return the first ChildAliMember filtered by the bunit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByProvince(string $province) Return the first ChildAliMember filtered by the province column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByLineId(string $line_id) Return the first ChildAliMember filtered by the line_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByFacebookName(string $facebook_name) Return the first ChildAliMember filtered by the facebook_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByTypeCom(int $type_com) Return the first ChildAliMember filtered by the type_com column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByExpPos(string $exp_pos) Return the first ChildAliMember filtered by the exp_pos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByExpPos60(string $exp_pos_60) Return the first ChildAliMember filtered by the exp_pos_60 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByTripPrivate(string $trip_private) Return the first ChildAliMember filtered by the trip_private column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByTripTeam(string $trip_team) Return the first ChildAliMember filtered by the trip_team column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMyfile1(string $myfile1) Return the first ChildAliMember filtered by the myfile1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByMyfile2(string $myfile2) Return the first ChildAliMember filtered by the myfile2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByClineId(string $cline_id) Return the first ChildAliMember filtered by the cline_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByCfacebookName(string $cfacebook_name) Return the first ChildAliMember filtered by the cfacebook_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByProfileImg(string $profile_img) Return the first ChildAliMember filtered by the profile_img column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByAtocom(int $atocom) Return the first ChildAliMember filtered by the atocom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMember requireOneByHpv(string $hpv) Return the first ChildAliMember filtered by the hpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMember[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMember objects based on current ModelCriteria
 * @method     ChildAliMember[]|ObjectCollection findById(int $id) Return ChildAliMember objects filtered by the id column
 * @method     ChildAliMember[]|ObjectCollection findByMcode(string $mcode) Return ChildAliMember objects filtered by the mcode column
 * @method     ChildAliMember[]|ObjectCollection findByNameF(string $name_f) Return ChildAliMember objects filtered by the name_f column
 * @method     ChildAliMember[]|ObjectCollection findByNameT(string $name_t) Return ChildAliMember objects filtered by the name_t column
 * @method     ChildAliMember[]|ObjectCollection findByNameE(string $name_e) Return ChildAliMember objects filtered by the name_e column
 * @method     ChildAliMember[]|ObjectCollection findByPosid(string $posid) Return ChildAliMember objects filtered by the posid column
 * @method     ChildAliMember[]|ObjectCollection findByMdate(string $mdate) Return ChildAliMember objects filtered by the mdate column
 * @method     ChildAliMember[]|ObjectCollection findByBirthday(string $birthday) Return ChildAliMember objects filtered by the birthday column
 * @method     ChildAliMember[]|ObjectCollection findByNational(string $national) Return ChildAliMember objects filtered by the national column
 * @method     ChildAliMember[]|ObjectCollection findByIdTax(string $id_tax) Return ChildAliMember objects filtered by the id_tax column
 * @method     ChildAliMember[]|ObjectCollection findByIdCard(string $id_card) Return ChildAliMember objects filtered by the id_card column
 * @method     ChildAliMember[]|ObjectCollection findByIdCardImg(string $id_card_img) Return ChildAliMember objects filtered by the id_card_img column
 * @method     ChildAliMember[]|ObjectCollection findByIdCardImgDate(string $id_card_img_date) Return ChildAliMember objects filtered by the id_card_img_date column
 * @method     ChildAliMember[]|ObjectCollection findByZip(string $zip) Return ChildAliMember objects filtered by the zip column
 * @method     ChildAliMember[]|ObjectCollection findByHomeT(string $home_t) Return ChildAliMember objects filtered by the home_t column
 * @method     ChildAliMember[]|ObjectCollection findByOfficeT(string $office_t) Return ChildAliMember objects filtered by the office_t column
 * @method     ChildAliMember[]|ObjectCollection findByMobile(string $mobile) Return ChildAliMember objects filtered by the mobile column
 * @method     ChildAliMember[]|ObjectCollection findByMcodeAcc(string $mcode_acc) Return ChildAliMember objects filtered by the mcode_acc column
 * @method     ChildAliMember[]|ObjectCollection findByBonusrec(string $bonusrec) Return ChildAliMember objects filtered by the bonusrec column
 * @method     ChildAliMember[]|ObjectCollection findByBankcode(string $bankcode) Return ChildAliMember objects filtered by the bankcode column
 * @method     ChildAliMember[]|ObjectCollection findByBranch(string $branch) Return ChildAliMember objects filtered by the branch column
 * @method     ChildAliMember[]|ObjectCollection findByAccType(string $acc_type) Return ChildAliMember objects filtered by the acc_type column
 * @method     ChildAliMember[]|ObjectCollection findByAccNo(string $acc_no) Return ChildAliMember objects filtered by the acc_no column
 * @method     ChildAliMember[]|ObjectCollection findByAccNoImg(string $acc_no_img) Return ChildAliMember objects filtered by the acc_no_img column
 * @method     ChildAliMember[]|ObjectCollection findByAccNoImgDate(string $acc_no_img_date) Return ChildAliMember objects filtered by the acc_no_img_date column
 * @method     ChildAliMember[]|ObjectCollection findByAccName(string $acc_name) Return ChildAliMember objects filtered by the acc_name column
 * @method     ChildAliMember[]|ObjectCollection findByAccProv(string $acc_prov) Return ChildAliMember objects filtered by the acc_prov column
 * @method     ChildAliMember[]|ObjectCollection findBySvCode(string $sv_code) Return ChildAliMember objects filtered by the sv_code column
 * @method     ChildAliMember[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliMember objects filtered by the sp_code column
 * @method     ChildAliMember[]|ObjectCollection findBySpName(string $sp_name) Return ChildAliMember objects filtered by the sp_name column
 * @method     ChildAliMember[]|ObjectCollection findBySpCode2(string $sp_code2) Return ChildAliMember objects filtered by the sp_code2 column
 * @method     ChildAliMember[]|ObjectCollection findBySpName2(string $sp_name2) Return ChildAliMember objects filtered by the sp_name2 column
 * @method     ChildAliMember[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliMember objects filtered by the upa_code column
 * @method     ChildAliMember[]|ObjectCollection findByUpaName(string $upa_name) Return ChildAliMember objects filtered by the upa_name column
 * @method     ChildAliMember[]|ObjectCollection findByLr(string $lr) Return ChildAliMember objects filtered by the lr column
 * @method     ChildAliMember[]|ObjectCollection findByComplete(string $complete) Return ChildAliMember objects filtered by the complete column
 * @method     ChildAliMember[]|ObjectCollection findByCompdate(string $compdate) Return ChildAliMember objects filtered by the compdate column
 * @method     ChildAliMember[]|ObjectCollection findByModate(string $modate) Return ChildAliMember objects filtered by the modate column
 * @method     ChildAliMember[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliMember objects filtered by the usercode column
 * @method     ChildAliMember[]|ObjectCollection findByNameB(string $name_b) Return ChildAliMember objects filtered by the name_b column
 * @method     ChildAliMember[]|ObjectCollection findBySex(string $sex) Return ChildAliMember objects filtered by the sex column
 * @method     ChildAliMember[]|ObjectCollection findByAge(int $age) Return ChildAliMember objects filtered by the age column
 * @method     ChildAliMember[]|ObjectCollection findByOccupation(string $occupation) Return ChildAliMember objects filtered by the occupation column
 * @method     ChildAliMember[]|ObjectCollection findByStatus(int $status) Return ChildAliMember objects filtered by the status column
 * @method     ChildAliMember[]|ObjectCollection findByMarName(string $mar_name) Return ChildAliMember objects filtered by the mar_name column
 * @method     ChildAliMember[]|ObjectCollection findByMarAge(int $mar_age) Return ChildAliMember objects filtered by the mar_age column
 * @method     ChildAliMember[]|ObjectCollection findByEmail(string $email) Return ChildAliMember objects filtered by the email column
 * @method     ChildAliMember[]|ObjectCollection findByBeneficiaries(string $beneficiaries) Return ChildAliMember objects filtered by the beneficiaries column
 * @method     ChildAliMember[]|ObjectCollection findByRelation(string $relation) Return ChildAliMember objects filtered by the relation column
 * @method     ChildAliMember[]|ObjectCollection findByDistrictid(string $districtId) Return ChildAliMember objects filtered by the districtId column
 * @method     ChildAliMember[]|ObjectCollection findByAmphurid(string $amphurId) Return ChildAliMember objects filtered by the amphurId column
 * @method     ChildAliMember[]|ObjectCollection findByProvinceid(string $provinceId) Return ChildAliMember objects filtered by the provinceId column
 * @method     ChildAliMember[]|ObjectCollection findByFax(string $fax) Return ChildAliMember objects filtered by the fax column
 * @method     ChildAliMember[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliMember objects filtered by the inv_code column
 * @method     ChildAliMember[]|ObjectCollection findByUid(string $uid) Return ChildAliMember objects filtered by the uid column
 * @method     ChildAliMember[]|ObjectCollection findByOid(string $oid) Return ChildAliMember objects filtered by the oid column
 * @method     ChildAliMember[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliMember objects filtered by the pos_cur column
 * @method     ChildAliMember[]|ObjectCollection findByPosCur1(string $pos_cur1) Return ChildAliMember objects filtered by the pos_cur1 column
 * @method     ChildAliMember[]|ObjectCollection findByPosCur2(string $pos_cur2) Return ChildAliMember objects filtered by the pos_cur2 column
 * @method     ChildAliMember[]|ObjectCollection findByPosCur3(string $pos_cur3) Return ChildAliMember objects filtered by the pos_cur3 column
 * @method     ChildAliMember[]|ObjectCollection findByPosCur4(string $pos_cur4) Return ChildAliMember objects filtered by the pos_cur4 column
 * @method     ChildAliMember[]|ObjectCollection findByPosCurTmp(string $pos_cur_tmp) Return ChildAliMember objects filtered by the pos_cur_tmp column
 * @method     ChildAliMember[]|ObjectCollection findByRposCur4(int $rpos_cur4) Return ChildAliMember objects filtered by the rpos_cur4 column
 * @method     ChildAliMember[]|ObjectCollection findByPosCur3Date(string $pos_cur3_date) Return ChildAliMember objects filtered by the pos_cur3_date column
 * @method     ChildAliMember[]|ObjectCollection findByMemdesc(string $memdesc) Return ChildAliMember objects filtered by the memdesc column
 * @method     ChildAliMember[]|ObjectCollection findByCmp(string $cmp) Return ChildAliMember objects filtered by the cmp column
 * @method     ChildAliMember[]|ObjectCollection findByCmp2(string $cmp2) Return ChildAliMember objects filtered by the cmp2 column
 * @method     ChildAliMember[]|ObjectCollection findByCmp3(string $cmp3) Return ChildAliMember objects filtered by the cmp3 column
 * @method     ChildAliMember[]|ObjectCollection findByCcmp(string $ccmp) Return ChildAliMember objects filtered by the ccmp column
 * @method     ChildAliMember[]|ObjectCollection findByCcmp2(string $ccmp2) Return ChildAliMember objects filtered by the ccmp2 column
 * @method     ChildAliMember[]|ObjectCollection findByCcmp3(string $ccmp3) Return ChildAliMember objects filtered by the ccmp3 column
 * @method     ChildAliMember[]|ObjectCollection findByAddress(string $address) Return ChildAliMember objects filtered by the address column
 * @method     ChildAliMember[]|ObjectCollection findByStreet(string $street) Return ChildAliMember objects filtered by the street column
 * @method     ChildAliMember[]|ObjectCollection findByBuilding(string $building) Return ChildAliMember objects filtered by the building column
 * @method     ChildAliMember[]|ObjectCollection findByVillage(string $village) Return ChildAliMember objects filtered by the village column
 * @method     ChildAliMember[]|ObjectCollection findBySoi(string $soi) Return ChildAliMember objects filtered by the soi column
 * @method     ChildAliMember[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliMember objects filtered by the ewallet column
 * @method     ChildAliMember[]|ObjectCollection findByEatoship(string $eatoship) Return ChildAliMember objects filtered by the eatoship column
 * @method     ChildAliMember[]|ObjectCollection findByEcom(string $ecom) Return ChildAliMember objects filtered by the ecom column
 * @method     ChildAliMember[]|ObjectCollection findByBmdate1(string $bmdate1) Return ChildAliMember objects filtered by the bmdate1 column
 * @method     ChildAliMember[]|ObjectCollection findByBmdate2(string $bmdate2) Return ChildAliMember objects filtered by the bmdate2 column
 * @method     ChildAliMember[]|ObjectCollection findByBmdate3(string $bmdate3) Return ChildAliMember objects filtered by the bmdate3 column
 * @method     ChildAliMember[]|ObjectCollection findByCbmdate1(string $cbmdate1) Return ChildAliMember objects filtered by the cbmdate1 column
 * @method     ChildAliMember[]|ObjectCollection findByCbmdate2(string $cbmdate2) Return ChildAliMember objects filtered by the cbmdate2 column
 * @method     ChildAliMember[]|ObjectCollection findByCbmdate3(string $cbmdate3) Return ChildAliMember objects filtered by the cbmdate3 column
 * @method     ChildAliMember[]|ObjectCollection findByOnline(int $online) Return ChildAliMember objects filtered by the online column
 * @method     ChildAliMember[]|ObjectCollection findByCnameF(string $cname_f) Return ChildAliMember objects filtered by the cname_f column
 * @method     ChildAliMember[]|ObjectCollection findByCnameT(string $cname_t) Return ChildAliMember objects filtered by the cname_t column
 * @method     ChildAliMember[]|ObjectCollection findByCnameE(string $cname_e) Return ChildAliMember objects filtered by the cname_e column
 * @method     ChildAliMember[]|ObjectCollection findByCnameB(string $cname_b) Return ChildAliMember objects filtered by the cname_b column
 * @method     ChildAliMember[]|ObjectCollection findByCbirthday(string $cbirthday) Return ChildAliMember objects filtered by the cbirthday column
 * @method     ChildAliMember[]|ObjectCollection findByCnational(string $cnational) Return ChildAliMember objects filtered by the cnational column
 * @method     ChildAliMember[]|ObjectCollection findByCidTax(string $cid_tax) Return ChildAliMember objects filtered by the cid_tax column
 * @method     ChildAliMember[]|ObjectCollection findByCidCard(string $cid_card) Return ChildAliMember objects filtered by the cid_card column
 * @method     ChildAliMember[]|ObjectCollection findByCaddress(string $caddress) Return ChildAliMember objects filtered by the caddress column
 * @method     ChildAliMember[]|ObjectCollection findByCbuilding(string $cbuilding) Return ChildAliMember objects filtered by the cbuilding column
 * @method     ChildAliMember[]|ObjectCollection findByCvillage(string $cvillage) Return ChildAliMember objects filtered by the cvillage column
 * @method     ChildAliMember[]|ObjectCollection findByCstreet(string $cstreet) Return ChildAliMember objects filtered by the cstreet column
 * @method     ChildAliMember[]|ObjectCollection findByCsoi(string $csoi) Return ChildAliMember objects filtered by the csoi column
 * @method     ChildAliMember[]|ObjectCollection findByCzip(string $czip) Return ChildAliMember objects filtered by the czip column
 * @method     ChildAliMember[]|ObjectCollection findByChomeT(string $chome_t) Return ChildAliMember objects filtered by the chome_t column
 * @method     ChildAliMember[]|ObjectCollection findByCofficeT(string $coffice_t) Return ChildAliMember objects filtered by the coffice_t column
 * @method     ChildAliMember[]|ObjectCollection findByCmobile(string $cmobile) Return ChildAliMember objects filtered by the cmobile column
 * @method     ChildAliMember[]|ObjectCollection findByCfax(string $cfax) Return ChildAliMember objects filtered by the cfax column
 * @method     ChildAliMember[]|ObjectCollection findByCsex(string $csex) Return ChildAliMember objects filtered by the csex column
 * @method     ChildAliMember[]|ObjectCollection findByCemail(string $cemail) Return ChildAliMember objects filtered by the cemail column
 * @method     ChildAliMember[]|ObjectCollection findByCdistrictid(string $cdistrictId) Return ChildAliMember objects filtered by the cdistrictId column
 * @method     ChildAliMember[]|ObjectCollection findByCamphurid(string $camphurId) Return ChildAliMember objects filtered by the camphurId column
 * @method     ChildAliMember[]|ObjectCollection findByCprovinceid(string $cprovinceId) Return ChildAliMember objects filtered by the cprovinceId column
 * @method     ChildAliMember[]|ObjectCollection findByInameF(string $iname_f) Return ChildAliMember objects filtered by the iname_f column
 * @method     ChildAliMember[]|ObjectCollection findByInameT(string $iname_t) Return ChildAliMember objects filtered by the iname_t column
 * @method     ChildAliMember[]|ObjectCollection findByIrelation(string $irelation) Return ChildAliMember objects filtered by the irelation column
 * @method     ChildAliMember[]|ObjectCollection findByIphone(string $iphone) Return ChildAliMember objects filtered by the iphone column
 * @method     ChildAliMember[]|ObjectCollection findByIidCard(string $iid_card) Return ChildAliMember objects filtered by the iid_card column
 * @method     ChildAliMember[]|ObjectCollection findByStatusDoc(int $status_doc) Return ChildAliMember objects filtered by the status_doc column
 * @method     ChildAliMember[]|ObjectCollection findByStatusExpire(int $status_expire) Return ChildAliMember objects filtered by the status_expire column
 * @method     ChildAliMember[]|ObjectCollection findByStatusTerminate(int $status_terminate) Return ChildAliMember objects filtered by the status_terminate column
 * @method     ChildAliMember[]|ObjectCollection findByTerminateDate(string $terminate_date) Return ChildAliMember objects filtered by the terminate_date column
 * @method     ChildAliMember[]|ObjectCollection findByStatusSuspend(int $status_suspend) Return ChildAliMember objects filtered by the status_suspend column
 * @method     ChildAliMember[]|ObjectCollection findBySuspendDate(string $suspend_date) Return ChildAliMember objects filtered by the suspend_date column
 * @method     ChildAliMember[]|ObjectCollection findByStatusBlacklist(int $status_blacklist) Return ChildAliMember objects filtered by the status_blacklist column
 * @method     ChildAliMember[]|ObjectCollection findByStatusAto(int $status_ato) Return ChildAliMember objects filtered by the status_ato column
 * @method     ChildAliMember[]|ObjectCollection findBySletter(int $sletter) Return ChildAliMember objects filtered by the sletter column
 * @method     ChildAliMember[]|ObjectCollection findBySinvCode(string $sinv_code) Return ChildAliMember objects filtered by the sinv_code column
 * @method     ChildAliMember[]|ObjectCollection findByTxtoption(string $txtoption) Return ChildAliMember objects filtered by the txtoption column
 * @method     ChildAliMember[]|ObjectCollection findBySetregis(int $setregis) Return ChildAliMember objects filtered by the setregis column
 * @method     ChildAliMember[]|ObjectCollection findBySlr(string $slr) Return ChildAliMember objects filtered by the slr column
 * @method     ChildAliMember[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliMember objects filtered by the locationbase column
 * @method     ChildAliMember[]|ObjectCollection findByCidMobile(string $cid_mobile) Return ChildAliMember objects filtered by the cid_mobile column
 * @method     ChildAliMember[]|ObjectCollection findByBewallet(string $bewallet) Return ChildAliMember objects filtered by the bewallet column
 * @method     ChildAliMember[]|ObjectCollection findByBvoucher(string $bvoucher) Return ChildAliMember objects filtered by the bvoucher column
 * @method     ChildAliMember[]|ObjectCollection findByVoucher(string $voucher) Return ChildAliMember objects filtered by the voucher column
 * @method     ChildAliMember[]|ObjectCollection findByManager(string $manager) Return ChildAliMember objects filtered by the manager column
 * @method     ChildAliMember[]|ObjectCollection findByMtype(int $mtype) Return ChildAliMember objects filtered by the mtype column
 * @method     ChildAliMember[]|ObjectCollection findByMtype1(int $mtype1) Return ChildAliMember objects filtered by the mtype1 column
 * @method     ChildAliMember[]|ObjectCollection findByMtype2(int $mtype2) Return ChildAliMember objects filtered by the mtype2 column
 * @method     ChildAliMember[]|ObjectCollection findByMvat(int $mvat) Return ChildAliMember objects filtered by the mvat column
 * @method     ChildAliMember[]|ObjectCollection findByUidbase(string $uidbase) Return ChildAliMember objects filtered by the uidbase column
 * @method     ChildAliMember[]|ObjectCollection findByExpDate(string $exp_date) Return ChildAliMember objects filtered by the exp_date column
 * @method     ChildAliMember[]|ObjectCollection findByHeadCode(string $head_code) Return ChildAliMember objects filtered by the head_code column
 * @method     ChildAliMember[]|ObjectCollection findByPvL(string $pv_l) Return ChildAliMember objects filtered by the pv_l column
 * @method     ChildAliMember[]|ObjectCollection findByPvC(string $pv_c) Return ChildAliMember objects filtered by the pv_c column
 * @method     ChildAliMember[]|ObjectCollection findByHpvL(string $hpv_l) Return ChildAliMember objects filtered by the hpv_l column
 * @method     ChildAliMember[]|ObjectCollection findByHpvC(string $hpv_c) Return ChildAliMember objects filtered by the hpv_c column
 * @method     ChildAliMember[]|ObjectCollection findByPvLNextmonth(string $pv_l_nextmonth) Return ChildAliMember objects filtered by the pv_l_nextmonth column
 * @method     ChildAliMember[]|ObjectCollection findByPvCNextmonth(string $pv_c_nextmonth) Return ChildAliMember objects filtered by the pv_c_nextmonth column
 * @method     ChildAliMember[]|ObjectCollection findByPvLLastmonth1(string $pv_l_lastmonth1) Return ChildAliMember objects filtered by the pv_l_lastmonth1 column
 * @method     ChildAliMember[]|ObjectCollection findByPvCLastmonth1(string $pv_c_lastmonth1) Return ChildAliMember objects filtered by the pv_c_lastmonth1 column
 * @method     ChildAliMember[]|ObjectCollection findByPvLLastmonth2(string $pv_l_lastmonth2) Return ChildAliMember objects filtered by the pv_l_lastmonth2 column
 * @method     ChildAliMember[]|ObjectCollection findByPvCLastmonth2(string $pv_c_lastmonth2) Return ChildAliMember objects filtered by the pv_c_lastmonth2 column
 * @method     ChildAliMember[]|ObjectCollection findByRcodeStar(int $rcode_star) Return ChildAliMember objects filtered by the rcode_star column
 * @method     ChildAliMember[]|ObjectCollection findByBunit(int $bunit) Return ChildAliMember objects filtered by the bunit column
 * @method     ChildAliMember[]|ObjectCollection findByProvince(string $province) Return ChildAliMember objects filtered by the province column
 * @method     ChildAliMember[]|ObjectCollection findByLineId(string $line_id) Return ChildAliMember objects filtered by the line_id column
 * @method     ChildAliMember[]|ObjectCollection findByFacebookName(string $facebook_name) Return ChildAliMember objects filtered by the facebook_name column
 * @method     ChildAliMember[]|ObjectCollection findByTypeCom(int $type_com) Return ChildAliMember objects filtered by the type_com column
 * @method     ChildAliMember[]|ObjectCollection findByExpPos(string $exp_pos) Return ChildAliMember objects filtered by the exp_pos column
 * @method     ChildAliMember[]|ObjectCollection findByExpPos60(string $exp_pos_60) Return ChildAliMember objects filtered by the exp_pos_60 column
 * @method     ChildAliMember[]|ObjectCollection findByTripPrivate(string $trip_private) Return ChildAliMember objects filtered by the trip_private column
 * @method     ChildAliMember[]|ObjectCollection findByTripTeam(string $trip_team) Return ChildAliMember objects filtered by the trip_team column
 * @method     ChildAliMember[]|ObjectCollection findByMyfile1(string $myfile1) Return ChildAliMember objects filtered by the myfile1 column
 * @method     ChildAliMember[]|ObjectCollection findByMyfile2(string $myfile2) Return ChildAliMember objects filtered by the myfile2 column
 * @method     ChildAliMember[]|ObjectCollection findByClineId(string $cline_id) Return ChildAliMember objects filtered by the cline_id column
 * @method     ChildAliMember[]|ObjectCollection findByCfacebookName(string $cfacebook_name) Return ChildAliMember objects filtered by the cfacebook_name column
 * @method     ChildAliMember[]|ObjectCollection findByProfileImg(string $profile_img) Return ChildAliMember objects filtered by the profile_img column
 * @method     ChildAliMember[]|ObjectCollection findByAtocom(int $atocom) Return ChildAliMember objects filtered by the atocom column
 * @method     ChildAliMember[]|ObjectCollection findByHpv(string $hpv) Return ChildAliMember objects filtered by the hpv column
 * @method     ChildAliMember[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMemberQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMemberQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMember', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMemberQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMemberQuery) {
            return $criteria;
        }
        $query = new ChildAliMemberQuery();
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
     * @return ChildAliMember|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMemberTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMemberTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliMember A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, name_f, name_t, name_e, posid, mdate, birthday, national, id_tax, id_card, id_card_img, id_card_img_date, zip, home_t, office_t, mobile, mcode_acc, bonusrec, bankcode, branch, acc_type, acc_no, acc_no_img, acc_no_img_date, acc_name, acc_prov, sv_code, sp_code, sp_name, sp_code2, sp_name2, upa_code, upa_name, lr, complete, compdate, modate, usercode, name_b, sex, age, occupation, status, mar_name, mar_age, email, beneficiaries, relation, districtId, amphurId, provinceId, fax, inv_code, uid, oid, pos_cur, pos_cur1, pos_cur2, pos_cur3, pos_cur4, pos_cur_tmp, rpos_cur4, pos_cur3_date, memdesc, cmp, cmp2, cmp3, ccmp, ccmp2, ccmp3, address, street, building, village, soi, ewallet, eatoship, ecom, bmdate1, bmdate2, bmdate3, cbmdate1, cbmdate2, cbmdate3, online, cname_f, cname_t, cname_e, cname_b, cbirthday, cnational, cid_tax, cid_card, caddress, cbuilding, cvillage, cstreet, csoi, czip, chome_t, coffice_t, cmobile, cfax, csex, cemail, cdistrictId, camphurId, cprovinceId, iname_f, iname_t, irelation, iphone, iid_card, status_doc, status_expire, status_terminate, terminate_date, status_suspend, suspend_date, status_blacklist, status_ato, sletter, sinv_code, txtoption, setregis, slr, locationbase, cid_mobile, bewallet, bvoucher, voucher, manager, mtype, mtype1, mtype2, mvat, uidbase, exp_date, head_code, pv_l, pv_c, hpv_l, hpv_c, pv_l_nextmonth, pv_c_nextmonth, pv_l_lastmonth1, pv_c_lastmonth1, pv_l_lastmonth2, pv_c_lastmonth2, rcode_star, bunit, province, line_id, facebook_name, type_com, exp_pos, exp_pos_60, trip_private, trip_team, myfile1, myfile2, cline_id, cfacebook_name, profile_img, atocom, hpv FROM ali_member WHERE id = :p0';
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
            /** @var ChildAliMember $obj */
            $obj = new ChildAliMember();
            $obj->hydrate($row);
            AliMemberTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliMember|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMemberTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMemberTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByNameE($nameE = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameE)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_NAME_E, $nameE, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPosid($posid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_POSID, $posid, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MDATE, $mdate, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBirthday($birthday = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($birthday)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BIRTHDAY, $birthday, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByNational($national = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($national)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_NATIONAL, $national, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByIdTax($idTax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idTax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ID_TAX, $idTax, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByIdCard($idCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ID_CARD, $idCard, $comparison);
    }

    /**
     * Filter the query on the id_card_img column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCardImg('fooValue');   // WHERE id_card_img = 'fooValue'
     * $query->filterByIdCardImg('%fooValue%', Criteria::LIKE); // WHERE id_card_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idCardImg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByIdCardImg($idCardImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idCardImg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ID_CARD_IMG, $idCardImg, $comparison);
    }

    /**
     * Filter the query on the id_card_img_date column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCardImgDate('2011-03-14'); // WHERE id_card_img_date = '2011-03-14'
     * $query->filterByIdCardImgDate('now'); // WHERE id_card_img_date = '2011-03-14'
     * $query->filterByIdCardImgDate(array('max' => 'yesterday')); // WHERE id_card_img_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $idCardImgDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByIdCardImgDate($idCardImgDate = null, $comparison = null)
    {
        if (is_array($idCardImgDate)) {
            $useMinMax = false;
            if (isset($idCardImgDate['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ID_CARD_IMG_DATE, $idCardImgDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCardImgDate['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ID_CARD_IMG_DATE, $idCardImgDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ID_CARD_IMG_DATE, $idCardImgDate, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ZIP, $zip, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByHomeT($homeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($homeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_HOME_T, $homeT, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByOfficeT($officeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($officeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_OFFICE_T, $officeT, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMobile($mobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MOBILE, $mobile, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMcodeAcc($mcodeAcc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeAcc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MCODE_ACC, $mcodeAcc, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBonusrec($bonusrec = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bonusrec)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BONUSREC, $bonusrec, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBankcode($bankcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BANKCODE, $bankcode, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBranch($branch = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branch)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BRANCH, $branch, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAccType($accType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ACC_TYPE, $accType, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAccNo($accNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accNo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ACC_NO, $accNo, $comparison);
    }

    /**
     * Filter the query on the acc_no_img column
     *
     * Example usage:
     * <code>
     * $query->filterByAccNoImg('fooValue');   // WHERE acc_no_img = 'fooValue'
     * $query->filterByAccNoImg('%fooValue%', Criteria::LIKE); // WHERE acc_no_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accNoImg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAccNoImg($accNoImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accNoImg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ACC_NO_IMG, $accNoImg, $comparison);
    }

    /**
     * Filter the query on the acc_no_img_date column
     *
     * Example usage:
     * <code>
     * $query->filterByAccNoImgDate('2011-03-14'); // WHERE acc_no_img_date = '2011-03-14'
     * $query->filterByAccNoImgDate('now'); // WHERE acc_no_img_date = '2011-03-14'
     * $query->filterByAccNoImgDate(array('max' => 'yesterday')); // WHERE acc_no_img_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $accNoImgDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAccNoImgDate($accNoImgDate = null, $comparison = null)
    {
        if (is_array($accNoImgDate)) {
            $useMinMax = false;
            if (isset($accNoImgDate['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ACC_NO_IMG_DATE, $accNoImgDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accNoImgDate['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ACC_NO_IMG_DATE, $accNoImgDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ACC_NO_IMG_DATE, $accNoImgDate, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAccName($accName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ACC_NAME, $accName, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAccProv($accProv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accProv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ACC_PROV, $accProv, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySvCode($svCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($svCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SV_CODE, $svCode, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SP_CODE, $spCode, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySpName($spName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SP_NAME, $spName, $comparison);
    }

    /**
     * Filter the query on the sp_code2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySpCode2('fooValue');   // WHERE sp_code2 = 'fooValue'
     * $query->filterBySpCode2('%fooValue%', Criteria::LIKE); // WHERE sp_code2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spCode2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySpCode2($spCode2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SP_CODE2, $spCode2, $comparison);
    }

    /**
     * Filter the query on the sp_name2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySpName2('fooValue');   // WHERE sp_name2 = 'fooValue'
     * $query->filterBySpName2('%fooValue%', Criteria::LIKE); // WHERE sp_name2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spName2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySpName2($spName2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spName2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SP_NAME2, $spName2, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_UPA_CODE, $upaCode, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByUpaName($upaName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_UPA_NAME, $upaName, $comparison);
    }

    /**
     * Filter the query on the lr column
     *
     * Example usage:
     * <code>
     * $query->filterByLr('fooValue');   // WHERE lr = 'fooValue'
     * $query->filterByLr('%fooValue%', Criteria::LIKE); // WHERE lr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_LR, $lr, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByComplete($complete = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($complete)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_COMPLETE, $complete, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCompdate($compdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($compdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_COMPDATE, $compdate, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByModate($modate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($modate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MODATE, $modate, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByNameB($nameB = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameB)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_NAME_B, $nameB, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sex)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SEX, $sex, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_AGE, $age, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByOccupation($occupation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($occupation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_OCCUPATION, $occupation, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMarName($marName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($marName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MAR_NAME, $marName, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMarAge($marAge = null, $comparison = null)
    {
        if (is_array($marAge)) {
            $useMinMax = false;
            if (isset($marAge['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MAR_AGE, $marAge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marAge['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MAR_AGE, $marAge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MAR_AGE, $marAge, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBeneficiaries($beneficiaries = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($beneficiaries)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BENEFICIARIES, $beneficiaries, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByRelation($relation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($relation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_RELATION, $relation, $comparison);
    }

    /**
     * Filter the query on the districtId column
     *
     * Example usage:
     * <code>
     * $query->filterByDistrictid('fooValue');   // WHERE districtId = 'fooValue'
     * $query->filterByDistrictid('%fooValue%', Criteria::LIKE); // WHERE districtId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $districtid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByDistrictid($districtid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($districtid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_DISTRICTID, $districtid, $comparison);
    }

    /**
     * Filter the query on the amphurId column
     *
     * Example usage:
     * <code>
     * $query->filterByAmphurid('fooValue');   // WHERE amphurId = 'fooValue'
     * $query->filterByAmphurid('%fooValue%', Criteria::LIKE); // WHERE amphurId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $amphurid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAmphurid($amphurid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($amphurid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_AMPHURID, $amphurid, $comparison);
    }

    /**
     * Filter the query on the provinceId column
     *
     * Example usage:
     * <code>
     * $query->filterByProvinceid('fooValue');   // WHERE provinceId = 'fooValue'
     * $query->filterByProvinceid('%fooValue%', Criteria::LIKE); // WHERE provinceId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $provinceid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByProvinceid($provinceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($provinceid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PROVINCEID, $provinceid, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_FAX, $fax, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the oid column
     *
     * Example usage:
     * <code>
     * $query->filterByOid('fooValue');   // WHERE oid = 'fooValue'
     * $query->filterByOid('%fooValue%', Criteria::LIKE); // WHERE oid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $oid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByOid($oid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($oid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_OID, $oid, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR, $posCur, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur1($posCur1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR1, $posCur1, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur2($posCur2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR2, $posCur2, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur3($posCur3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR3, $posCur3, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur4($posCur4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR4, $posCur4, $comparison);
    }

    /**
     * Filter the query on the pos_cur_tmp column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCurTmp('fooValue');   // WHERE pos_cur_tmp = 'fooValue'
     * $query->filterByPosCurTmp('%fooValue%', Criteria::LIKE); // WHERE pos_cur_tmp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCurTmp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPosCurTmp($posCurTmp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCurTmp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR_TMP, $posCurTmp, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByRposCur4($rposCur4 = null, $comparison = null)
    {
        if (is_array($rposCur4)) {
            $useMinMax = false;
            if (isset($rposCur4['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_RPOS_CUR4, $rposCur4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rposCur4['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_RPOS_CUR4, $rposCur4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_RPOS_CUR4, $rposCur4, $comparison);
    }

    /**
     * Filter the query on the pos_cur3_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur3Date('2011-03-14'); // WHERE pos_cur3_date = '2011-03-14'
     * $query->filterByPosCur3Date('now'); // WHERE pos_cur3_date = '2011-03-14'
     * $query->filterByPosCur3Date(array('max' => 'yesterday')); // WHERE pos_cur3_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $posCur3Date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPosCur3Date($posCur3Date = null, $comparison = null)
    {
        if (is_array($posCur3Date)) {
            $useMinMax = false;
            if (isset($posCur3Date['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR3_DATE, $posCur3Date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posCur3Date['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR3_DATE, $posCur3Date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_POS_CUR3_DATE, $posCur3Date, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMemdesc($memdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($memdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MEMDESC, $memdesc, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCmp($cmp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CMP, $cmp, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCmp2($cmp2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmp2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CMP2, $cmp2, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCmp3($cmp3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmp3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CMP3, $cmp3, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCcmp($ccmp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccmp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CCMP, $ccmp, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCcmp2($ccmp2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccmp2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CCMP2, $ccmp2, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCcmp3($ccmp3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccmp3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CCMP3, $ccmp3, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ADDRESS, $address, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByStreet($street = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($street)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_STREET, $street, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBuilding($building = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($building)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BUILDING, $building, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByVillage($village = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($village)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_VILLAGE, $village, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySoi($soi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($soi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SOI, $soi, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_EWALLET, $ewallet, $comparison);
    }

    /**
     * Filter the query on the eatoship column
     *
     * Example usage:
     * <code>
     * $query->filterByEatoship(1234); // WHERE eatoship = 1234
     * $query->filterByEatoship(array(12, 34)); // WHERE eatoship IN (12, 34)
     * $query->filterByEatoship(array('min' => 12)); // WHERE eatoship > 12
     * </code>
     *
     * @param     mixed $eatoship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByEatoship($eatoship = null, $comparison = null)
    {
        if (is_array($eatoship)) {
            $useMinMax = false;
            if (isset($eatoship['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EATOSHIP, $eatoship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eatoship['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EATOSHIP, $eatoship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_EATOSHIP, $eatoship, $comparison);
    }

    /**
     * Filter the query on the ecom column
     *
     * Example usage:
     * <code>
     * $query->filterByEcom(1234); // WHERE ecom = 1234
     * $query->filterByEcom(array(12, 34)); // WHERE ecom IN (12, 34)
     * $query->filterByEcom(array('min' => 12)); // WHERE ecom > 12
     * </code>
     *
     * @param     mixed $ecom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByEcom($ecom = null, $comparison = null)
    {
        if (is_array($ecom)) {
            $useMinMax = false;
            if (isset($ecom['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ECOM, $ecom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ecom['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ECOM, $ecom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ECOM, $ecom, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBmdate1($bmdate1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bmdate1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BMDATE1, $bmdate1, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBmdate2($bmdate2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bmdate2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BMDATE2, $bmdate2, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBmdate3($bmdate3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bmdate3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BMDATE3, $bmdate3, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCbmdate1($cbmdate1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbmdate1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CBMDATE1, $cbmdate1, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCbmdate2($cbmdate2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbmdate2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CBMDATE2, $cbmdate2, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCbmdate3($cbmdate3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbmdate3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CBMDATE3, $cbmdate3, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByOnline($online = null, $comparison = null)
    {
        if (is_array($online)) {
            $useMinMax = false;
            if (isset($online['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ONLINE, $online['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($online['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ONLINE, $online['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ONLINE, $online, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCnameF($cnameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CNAME_F, $cnameF, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCnameT($cnameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CNAME_T, $cnameT, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCnameE($cnameE = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnameE)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CNAME_E, $cnameE, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCnameB($cnameB = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnameB)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CNAME_B, $cnameB, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCbirthday($cbirthday = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbirthday)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CBIRTHDAY, $cbirthday, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCnational($cnational = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cnational)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CNATIONAL, $cnational, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCidTax($cidTax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cidTax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CID_TAX, $cidTax, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCidCard($cidCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cidCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CID_CARD, $cidCard, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCaddress($caddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CADDRESS, $caddress, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCbuilding($cbuilding = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cbuilding)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CBUILDING, $cbuilding, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCvillage($cvillage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cvillage)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CVILLAGE, $cvillage, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCstreet($cstreet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cstreet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CSTREET, $cstreet, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCsoi($csoi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($csoi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CSOI, $csoi, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCzip($czip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($czip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CZIP, $czip, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByChomeT($chomeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chomeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CHOME_T, $chomeT, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCofficeT($cofficeT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cofficeT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_COFFICE_T, $cofficeT, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCmobile($cmobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CMOBILE, $cmobile, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCfax($cfax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cfax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CFAX, $cfax, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCsex($csex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($csex)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CSEX, $csex, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCemail($cemail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cemail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CEMAIL, $cemail, $comparison);
    }

    /**
     * Filter the query on the cdistrictId column
     *
     * Example usage:
     * <code>
     * $query->filterByCdistrictid('fooValue');   // WHERE cdistrictId = 'fooValue'
     * $query->filterByCdistrictid('%fooValue%', Criteria::LIKE); // WHERE cdistrictId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cdistrictid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCdistrictid($cdistrictid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cdistrictid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CDISTRICTID, $cdistrictid, $comparison);
    }

    /**
     * Filter the query on the camphurId column
     *
     * Example usage:
     * <code>
     * $query->filterByCamphurid('fooValue');   // WHERE camphurId = 'fooValue'
     * $query->filterByCamphurid('%fooValue%', Criteria::LIKE); // WHERE camphurId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $camphurid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCamphurid($camphurid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($camphurid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CAMPHURID, $camphurid, $comparison);
    }

    /**
     * Filter the query on the cprovinceId column
     *
     * Example usage:
     * <code>
     * $query->filterByCprovinceid('fooValue');   // WHERE cprovinceId = 'fooValue'
     * $query->filterByCprovinceid('%fooValue%', Criteria::LIKE); // WHERE cprovinceId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cprovinceid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCprovinceid($cprovinceid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cprovinceid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CPROVINCEID, $cprovinceid, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByInameF($inameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_INAME_F, $inameF, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByInameT($inameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_INAME_T, $inameT, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByIrelation($irelation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($irelation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_IRELATION, $irelation, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByIphone($iphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iphone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_IPHONE, $iphone, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByIidCard($iidCard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iidCard)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_IID_CARD, $iidCard, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByStatusDoc($statusDoc = null, $comparison = null)
    {
        if (is_array($statusDoc)) {
            $useMinMax = false;
            if (isset($statusDoc['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_DOC, $statusDoc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusDoc['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_DOC, $statusDoc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_STATUS_DOC, $statusDoc, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByStatusExpire($statusExpire = null, $comparison = null)
    {
        if (is_array($statusExpire)) {
            $useMinMax = false;
            if (isset($statusExpire['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_EXPIRE, $statusExpire['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusExpire['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_EXPIRE, $statusExpire['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_STATUS_EXPIRE, $statusExpire, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByStatusTerminate($statusTerminate = null, $comparison = null)
    {
        if (is_array($statusTerminate)) {
            $useMinMax = false;
            if (isset($statusTerminate['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_TERMINATE, $statusTerminate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusTerminate['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_TERMINATE, $statusTerminate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_STATUS_TERMINATE, $statusTerminate, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByTerminateDate($terminateDate = null, $comparison = null)
    {
        if (is_array($terminateDate)) {
            $useMinMax = false;
            if (isset($terminateDate['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_TERMINATE_DATE, $terminateDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($terminateDate['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_TERMINATE_DATE, $terminateDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_TERMINATE_DATE, $terminateDate, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByStatusSuspend($statusSuspend = null, $comparison = null)
    {
        if (is_array($statusSuspend)) {
            $useMinMax = false;
            if (isset($statusSuspend['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_SUSPEND, $statusSuspend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusSuspend['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_SUSPEND, $statusSuspend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_STATUS_SUSPEND, $statusSuspend, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySuspendDate($suspendDate = null, $comparison = null)
    {
        if (is_array($suspendDate)) {
            $useMinMax = false;
            if (isset($suspendDate['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_SUSPEND_DATE, $suspendDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($suspendDate['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_SUSPEND_DATE, $suspendDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SUSPEND_DATE, $suspendDate, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByStatusBlacklist($statusBlacklist = null, $comparison = null)
    {
        if (is_array($statusBlacklist)) {
            $useMinMax = false;
            if (isset($statusBlacklist['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_BLACKLIST, $statusBlacklist['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusBlacklist['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_BLACKLIST, $statusBlacklist['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_STATUS_BLACKLIST, $statusBlacklist, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByStatusAto($statusAto = null, $comparison = null)
    {
        if (is_array($statusAto)) {
            $useMinMax = false;
            if (isset($statusAto['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_ATO, $statusAto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusAto['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_STATUS_ATO, $statusAto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_STATUS_ATO, $statusAto, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySletter($sletter = null, $comparison = null)
    {
        if (is_array($sletter)) {
            $useMinMax = false;
            if (isset($sletter['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_SLETTER, $sletter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sletter['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_SLETTER, $sletter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SLETTER, $sletter, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySinvCode($sinvCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sinvCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SINV_CODE, $sinvCode, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByTxtoption($txtoption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtoption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_TXTOPTION, $txtoption, $comparison);
    }

    /**
     * Filter the query on the setregis column
     *
     * Example usage:
     * <code>
     * $query->filterBySetregis(1234); // WHERE setregis = 1234
     * $query->filterBySetregis(array(12, 34)); // WHERE setregis IN (12, 34)
     * $query->filterBySetregis(array('min' => 12)); // WHERE setregis > 12
     * </code>
     *
     * @param     mixed $setregis The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySetregis($setregis = null, $comparison = null)
    {
        if (is_array($setregis)) {
            $useMinMax = false;
            if (isset($setregis['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_SETREGIS, $setregis['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($setregis['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_SETREGIS, $setregis['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SETREGIS, $setregis, $comparison);
    }

    /**
     * Filter the query on the slr column
     *
     * Example usage:
     * <code>
     * $query->filterBySlr('fooValue');   // WHERE slr = 'fooValue'
     * $query->filterBySlr('%fooValue%', Criteria::LIKE); // WHERE slr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterBySlr($slr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_SLR, $slr, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCidMobile($cidMobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cidMobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CID_MOBILE, $cidMobile, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBewallet($bewallet = null, $comparison = null)
    {
        if (is_array($bewallet)) {
            $useMinMax = false;
            if (isset($bewallet['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_BEWALLET, $bewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bewallet['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_BEWALLET, $bewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BEWALLET, $bewallet, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBvoucher($bvoucher = null, $comparison = null)
    {
        if (is_array($bvoucher)) {
            $useMinMax = false;
            if (isset($bvoucher['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_BVOUCHER, $bvoucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bvoucher['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_BVOUCHER, $bvoucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BVOUCHER, $bvoucher, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByVoucher($voucher = null, $comparison = null)
    {
        if (is_array($voucher)) {
            $useMinMax = false;
            if (isset($voucher['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_VOUCHER, $voucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voucher['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_VOUCHER, $voucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_VOUCHER, $voucher, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByManager($manager = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($manager)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MANAGER, $manager, $comparison);
    }

    /**
     * Filter the query on the mtype column
     *
     * Example usage:
     * <code>
     * $query->filterByMtype(1234); // WHERE mtype = 1234
     * $query->filterByMtype(array(12, 34)); // WHERE mtype IN (12, 34)
     * $query->filterByMtype(array('min' => 12)); // WHERE mtype > 12
     * </code>
     *
     * @param     mixed $mtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMtype($mtype = null, $comparison = null)
    {
        if (is_array($mtype)) {
            $useMinMax = false;
            if (isset($mtype['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MTYPE, $mtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mtype['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MTYPE, $mtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MTYPE, $mtype, $comparison);
    }

    /**
     * Filter the query on the mtype1 column
     *
     * Example usage:
     * <code>
     * $query->filterByMtype1(1234); // WHERE mtype1 = 1234
     * $query->filterByMtype1(array(12, 34)); // WHERE mtype1 IN (12, 34)
     * $query->filterByMtype1(array('min' => 12)); // WHERE mtype1 > 12
     * </code>
     *
     * @param     mixed $mtype1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMtype1($mtype1 = null, $comparison = null)
    {
        if (is_array($mtype1)) {
            $useMinMax = false;
            if (isset($mtype1['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MTYPE1, $mtype1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mtype1['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MTYPE1, $mtype1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MTYPE1, $mtype1, $comparison);
    }

    /**
     * Filter the query on the mtype2 column
     *
     * Example usage:
     * <code>
     * $query->filterByMtype2(1234); // WHERE mtype2 = 1234
     * $query->filterByMtype2(array(12, 34)); // WHERE mtype2 IN (12, 34)
     * $query->filterByMtype2(array('min' => 12)); // WHERE mtype2 > 12
     * </code>
     *
     * @param     mixed $mtype2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMtype2($mtype2 = null, $comparison = null)
    {
        if (is_array($mtype2)) {
            $useMinMax = false;
            if (isset($mtype2['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MTYPE2, $mtype2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mtype2['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MTYPE2, $mtype2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MTYPE2, $mtype2, $comparison);
    }

    /**
     * Filter the query on the mvat column
     *
     * Example usage:
     * <code>
     * $query->filterByMvat(1234); // WHERE mvat = 1234
     * $query->filterByMvat(array(12, 34)); // WHERE mvat IN (12, 34)
     * $query->filterByMvat(array('min' => 12)); // WHERE mvat > 12
     * </code>
     *
     * @param     mixed $mvat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMvat($mvat = null, $comparison = null)
    {
        if (is_array($mvat)) {
            $useMinMax = false;
            if (isset($mvat['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MVAT, $mvat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mvat['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_MVAT, $mvat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MVAT, $mvat, $comparison);
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
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByUidbase($uidbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_UIDBASE, $uidbase, $comparison);
    }

    /**
     * Filter the query on the exp_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpDate('2011-03-14'); // WHERE exp_date = '2011-03-14'
     * $query->filterByExpDate('now'); // WHERE exp_date = '2011-03-14'
     * $query->filterByExpDate(array('max' => 'yesterday')); // WHERE exp_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $expDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByExpDate($expDate = null, $comparison = null)
    {
        if (is_array($expDate)) {
            $useMinMax = false;
            if (isset($expDate['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EXP_DATE, $expDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expDate['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EXP_DATE, $expDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_EXP_DATE, $expDate, $comparison);
    }

    /**
     * Filter the query on the head_code column
     *
     * Example usage:
     * <code>
     * $query->filterByHeadCode('fooValue');   // WHERE head_code = 'fooValue'
     * $query->filterByHeadCode('%fooValue%', Criteria::LIKE); // WHERE head_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $headCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByHeadCode($headCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($headCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_HEAD_CODE, $headCode, $comparison);
    }

    /**
     * Filter the query on the pv_l column
     *
     * Example usage:
     * <code>
     * $query->filterByPvL(1234); // WHERE pv_l = 1234
     * $query->filterByPvL(array(12, 34)); // WHERE pv_l IN (12, 34)
     * $query->filterByPvL(array('min' => 12)); // WHERE pv_l > 12
     * </code>
     *
     * @param     mixed $pvL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPvL($pvL = null, $comparison = null)
    {
        if (is_array($pvL)) {
            $useMinMax = false;
            if (isset($pvL['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_L, $pvL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvL['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_L, $pvL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PV_L, $pvL, $comparison);
    }

    /**
     * Filter the query on the pv_c column
     *
     * Example usage:
     * <code>
     * $query->filterByPvC(1234); // WHERE pv_c = 1234
     * $query->filterByPvC(array(12, 34)); // WHERE pv_c IN (12, 34)
     * $query->filterByPvC(array('min' => 12)); // WHERE pv_c > 12
     * </code>
     *
     * @param     mixed $pvC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPvC($pvC = null, $comparison = null)
    {
        if (is_array($pvC)) {
            $useMinMax = false;
            if (isset($pvC['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_C, $pvC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvC['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_C, $pvC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PV_C, $pvC, $comparison);
    }

    /**
     * Filter the query on the hpv_l column
     *
     * Example usage:
     * <code>
     * $query->filterByHpvL(1234); // WHERE hpv_l = 1234
     * $query->filterByHpvL(array(12, 34)); // WHERE hpv_l IN (12, 34)
     * $query->filterByHpvL(array('min' => 12)); // WHERE hpv_l > 12
     * </code>
     *
     * @param     mixed $hpvL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByHpvL($hpvL = null, $comparison = null)
    {
        if (is_array($hpvL)) {
            $useMinMax = false;
            if (isset($hpvL['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_HPV_L, $hpvL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpvL['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_HPV_L, $hpvL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_HPV_L, $hpvL, $comparison);
    }

    /**
     * Filter the query on the hpv_c column
     *
     * Example usage:
     * <code>
     * $query->filterByHpvC(1234); // WHERE hpv_c = 1234
     * $query->filterByHpvC(array(12, 34)); // WHERE hpv_c IN (12, 34)
     * $query->filterByHpvC(array('min' => 12)); // WHERE hpv_c > 12
     * </code>
     *
     * @param     mixed $hpvC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByHpvC($hpvC = null, $comparison = null)
    {
        if (is_array($hpvC)) {
            $useMinMax = false;
            if (isset($hpvC['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_HPV_C, $hpvC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpvC['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_HPV_C, $hpvC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_HPV_C, $hpvC, $comparison);
    }

    /**
     * Filter the query on the pv_l_nextmonth column
     *
     * Example usage:
     * <code>
     * $query->filterByPvLNextmonth(1234); // WHERE pv_l_nextmonth = 1234
     * $query->filterByPvLNextmonth(array(12, 34)); // WHERE pv_l_nextmonth IN (12, 34)
     * $query->filterByPvLNextmonth(array('min' => 12)); // WHERE pv_l_nextmonth > 12
     * </code>
     *
     * @param     mixed $pvLNextmonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPvLNextmonth($pvLNextmonth = null, $comparison = null)
    {
        if (is_array($pvLNextmonth)) {
            $useMinMax = false;
            if (isset($pvLNextmonth['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_L_NEXTMONTH, $pvLNextmonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvLNextmonth['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_L_NEXTMONTH, $pvLNextmonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PV_L_NEXTMONTH, $pvLNextmonth, $comparison);
    }

    /**
     * Filter the query on the pv_c_nextmonth column
     *
     * Example usage:
     * <code>
     * $query->filterByPvCNextmonth(1234); // WHERE pv_c_nextmonth = 1234
     * $query->filterByPvCNextmonth(array(12, 34)); // WHERE pv_c_nextmonth IN (12, 34)
     * $query->filterByPvCNextmonth(array('min' => 12)); // WHERE pv_c_nextmonth > 12
     * </code>
     *
     * @param     mixed $pvCNextmonth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPvCNextmonth($pvCNextmonth = null, $comparison = null)
    {
        if (is_array($pvCNextmonth)) {
            $useMinMax = false;
            if (isset($pvCNextmonth['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_C_NEXTMONTH, $pvCNextmonth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvCNextmonth['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_C_NEXTMONTH, $pvCNextmonth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PV_C_NEXTMONTH, $pvCNextmonth, $comparison);
    }

    /**
     * Filter the query on the pv_l_lastmonth1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPvLLastmonth1(1234); // WHERE pv_l_lastmonth1 = 1234
     * $query->filterByPvLLastmonth1(array(12, 34)); // WHERE pv_l_lastmonth1 IN (12, 34)
     * $query->filterByPvLLastmonth1(array('min' => 12)); // WHERE pv_l_lastmonth1 > 12
     * </code>
     *
     * @param     mixed $pvLLastmonth1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPvLLastmonth1($pvLLastmonth1 = null, $comparison = null)
    {
        if (is_array($pvLLastmonth1)) {
            $useMinMax = false;
            if (isset($pvLLastmonth1['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_L_LASTMONTH1, $pvLLastmonth1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvLLastmonth1['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_L_LASTMONTH1, $pvLLastmonth1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PV_L_LASTMONTH1, $pvLLastmonth1, $comparison);
    }

    /**
     * Filter the query on the pv_c_lastmonth1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPvCLastmonth1(1234); // WHERE pv_c_lastmonth1 = 1234
     * $query->filterByPvCLastmonth1(array(12, 34)); // WHERE pv_c_lastmonth1 IN (12, 34)
     * $query->filterByPvCLastmonth1(array('min' => 12)); // WHERE pv_c_lastmonth1 > 12
     * </code>
     *
     * @param     mixed $pvCLastmonth1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPvCLastmonth1($pvCLastmonth1 = null, $comparison = null)
    {
        if (is_array($pvCLastmonth1)) {
            $useMinMax = false;
            if (isset($pvCLastmonth1['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_C_LASTMONTH1, $pvCLastmonth1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvCLastmonth1['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_C_LASTMONTH1, $pvCLastmonth1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PV_C_LASTMONTH1, $pvCLastmonth1, $comparison);
    }

    /**
     * Filter the query on the pv_l_lastmonth2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPvLLastmonth2(1234); // WHERE pv_l_lastmonth2 = 1234
     * $query->filterByPvLLastmonth2(array(12, 34)); // WHERE pv_l_lastmonth2 IN (12, 34)
     * $query->filterByPvLLastmonth2(array('min' => 12)); // WHERE pv_l_lastmonth2 > 12
     * </code>
     *
     * @param     mixed $pvLLastmonth2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPvLLastmonth2($pvLLastmonth2 = null, $comparison = null)
    {
        if (is_array($pvLLastmonth2)) {
            $useMinMax = false;
            if (isset($pvLLastmonth2['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_L_LASTMONTH2, $pvLLastmonth2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvLLastmonth2['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_L_LASTMONTH2, $pvLLastmonth2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PV_L_LASTMONTH2, $pvLLastmonth2, $comparison);
    }

    /**
     * Filter the query on the pv_c_lastmonth2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPvCLastmonth2(1234); // WHERE pv_c_lastmonth2 = 1234
     * $query->filterByPvCLastmonth2(array(12, 34)); // WHERE pv_c_lastmonth2 IN (12, 34)
     * $query->filterByPvCLastmonth2(array('min' => 12)); // WHERE pv_c_lastmonth2 > 12
     * </code>
     *
     * @param     mixed $pvCLastmonth2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByPvCLastmonth2($pvCLastmonth2 = null, $comparison = null)
    {
        if (is_array($pvCLastmonth2)) {
            $useMinMax = false;
            if (isset($pvCLastmonth2['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_C_LASTMONTH2, $pvCLastmonth2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvCLastmonth2['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_PV_C_LASTMONTH2, $pvCLastmonth2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PV_C_LASTMONTH2, $pvCLastmonth2, $comparison);
    }

    /**
     * Filter the query on the rcode_star column
     *
     * Example usage:
     * <code>
     * $query->filterByRcodeStar(1234); // WHERE rcode_star = 1234
     * $query->filterByRcodeStar(array(12, 34)); // WHERE rcode_star IN (12, 34)
     * $query->filterByRcodeStar(array('min' => 12)); // WHERE rcode_star > 12
     * </code>
     *
     * @param     mixed $rcodeStar The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByRcodeStar($rcodeStar = null, $comparison = null)
    {
        if (is_array($rcodeStar)) {
            $useMinMax = false;
            if (isset($rcodeStar['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_RCODE_STAR, $rcodeStar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcodeStar['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_RCODE_STAR, $rcodeStar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_RCODE_STAR, $rcodeStar, $comparison);
    }

    /**
     * Filter the query on the bunit column
     *
     * Example usage:
     * <code>
     * $query->filterByBunit(1234); // WHERE bunit = 1234
     * $query->filterByBunit(array(12, 34)); // WHERE bunit IN (12, 34)
     * $query->filterByBunit(array('min' => 12)); // WHERE bunit > 12
     * </code>
     *
     * @param     mixed $bunit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByBunit($bunit = null, $comparison = null)
    {
        if (is_array($bunit)) {
            $useMinMax = false;
            if (isset($bunit['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_BUNIT, $bunit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bunit['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_BUNIT, $bunit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_BUNIT, $bunit, $comparison);
    }

    /**
     * Filter the query on the province column
     *
     * Example usage:
     * <code>
     * $query->filterByProvince('fooValue');   // WHERE province = 'fooValue'
     * $query->filterByProvince('%fooValue%', Criteria::LIKE); // WHERE province LIKE '%fooValue%'
     * </code>
     *
     * @param     string $province The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByProvince($province = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($province)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PROVINCE, $province, $comparison);
    }

    /**
     * Filter the query on the line_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLineId('fooValue');   // WHERE line_id = 'fooValue'
     * $query->filterByLineId('%fooValue%', Criteria::LIKE); // WHERE line_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lineId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByLineId($lineId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lineId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_LINE_ID, $lineId, $comparison);
    }

    /**
     * Filter the query on the facebook_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFacebookName('fooValue');   // WHERE facebook_name = 'fooValue'
     * $query->filterByFacebookName('%fooValue%', Criteria::LIKE); // WHERE facebook_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $facebookName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByFacebookName($facebookName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($facebookName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_FACEBOOK_NAME, $facebookName, $comparison);
    }

    /**
     * Filter the query on the type_com column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeCom(1234); // WHERE type_com = 1234
     * $query->filterByTypeCom(array(12, 34)); // WHERE type_com IN (12, 34)
     * $query->filterByTypeCom(array('min' => 12)); // WHERE type_com > 12
     * </code>
     *
     * @param     mixed $typeCom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByTypeCom($typeCom = null, $comparison = null)
    {
        if (is_array($typeCom)) {
            $useMinMax = false;
            if (isset($typeCom['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_TYPE_COM, $typeCom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeCom['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_TYPE_COM, $typeCom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_TYPE_COM, $typeCom, $comparison);
    }

    /**
     * Filter the query on the exp_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByExpPos('2011-03-14'); // WHERE exp_pos = '2011-03-14'
     * $query->filterByExpPos('now'); // WHERE exp_pos = '2011-03-14'
     * $query->filterByExpPos(array('max' => 'yesterday')); // WHERE exp_pos > '2011-03-13'
     * </code>
     *
     * @param     mixed $expPos The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByExpPos($expPos = null, $comparison = null)
    {
        if (is_array($expPos)) {
            $useMinMax = false;
            if (isset($expPos['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EXP_POS, $expPos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expPos['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EXP_POS, $expPos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_EXP_POS, $expPos, $comparison);
    }

    /**
     * Filter the query on the exp_pos_60 column
     *
     * Example usage:
     * <code>
     * $query->filterByExpPos60('2011-03-14'); // WHERE exp_pos_60 = '2011-03-14'
     * $query->filterByExpPos60('now'); // WHERE exp_pos_60 = '2011-03-14'
     * $query->filterByExpPos60(array('max' => 'yesterday')); // WHERE exp_pos_60 > '2011-03-13'
     * </code>
     *
     * @param     mixed $expPos60 The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByExpPos60($expPos60 = null, $comparison = null)
    {
        if (is_array($expPos60)) {
            $useMinMax = false;
            if (isset($expPos60['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EXP_POS_60, $expPos60['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expPos60['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_EXP_POS_60, $expPos60['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_EXP_POS_60, $expPos60, $comparison);
    }

    /**
     * Filter the query on the trip_private column
     *
     * Example usage:
     * <code>
     * $query->filterByTripPrivate(1234); // WHERE trip_private = 1234
     * $query->filterByTripPrivate(array(12, 34)); // WHERE trip_private IN (12, 34)
     * $query->filterByTripPrivate(array('min' => 12)); // WHERE trip_private > 12
     * </code>
     *
     * @param     mixed $tripPrivate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByTripPrivate($tripPrivate = null, $comparison = null)
    {
        if (is_array($tripPrivate)) {
            $useMinMax = false;
            if (isset($tripPrivate['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_TRIP_PRIVATE, $tripPrivate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tripPrivate['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_TRIP_PRIVATE, $tripPrivate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_TRIP_PRIVATE, $tripPrivate, $comparison);
    }

    /**
     * Filter the query on the trip_team column
     *
     * Example usage:
     * <code>
     * $query->filterByTripTeam(1234); // WHERE trip_team = 1234
     * $query->filterByTripTeam(array(12, 34)); // WHERE trip_team IN (12, 34)
     * $query->filterByTripTeam(array('min' => 12)); // WHERE trip_team > 12
     * </code>
     *
     * @param     mixed $tripTeam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByTripTeam($tripTeam = null, $comparison = null)
    {
        if (is_array($tripTeam)) {
            $useMinMax = false;
            if (isset($tripTeam['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_TRIP_TEAM, $tripTeam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tripTeam['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_TRIP_TEAM, $tripTeam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_TRIP_TEAM, $tripTeam, $comparison);
    }

    /**
     * Filter the query on the myfile1 column
     *
     * Example usage:
     * <code>
     * $query->filterByMyfile1('fooValue');   // WHERE myfile1 = 'fooValue'
     * $query->filterByMyfile1('%fooValue%', Criteria::LIKE); // WHERE myfile1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $myfile1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMyfile1($myfile1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($myfile1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MYFILE1, $myfile1, $comparison);
    }

    /**
     * Filter the query on the myfile2 column
     *
     * Example usage:
     * <code>
     * $query->filterByMyfile2('fooValue');   // WHERE myfile2 = 'fooValue'
     * $query->filterByMyfile2('%fooValue%', Criteria::LIKE); // WHERE myfile2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $myfile2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByMyfile2($myfile2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($myfile2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_MYFILE2, $myfile2, $comparison);
    }

    /**
     * Filter the query on the cline_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClineId('fooValue');   // WHERE cline_id = 'fooValue'
     * $query->filterByClineId('%fooValue%', Criteria::LIKE); // WHERE cline_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clineId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByClineId($clineId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clineId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CLINE_ID, $clineId, $comparison);
    }

    /**
     * Filter the query on the cfacebook_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCfacebookName('fooValue');   // WHERE cfacebook_name = 'fooValue'
     * $query->filterByCfacebookName('%fooValue%', Criteria::LIKE); // WHERE cfacebook_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cfacebookName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByCfacebookName($cfacebookName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cfacebookName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_CFACEBOOK_NAME, $cfacebookName, $comparison);
    }

    /**
     * Filter the query on the profile_img column
     *
     * Example usage:
     * <code>
     * $query->filterByProfileImg('fooValue');   // WHERE profile_img = 'fooValue'
     * $query->filterByProfileImg('%fooValue%', Criteria::LIKE); // WHERE profile_img LIKE '%fooValue%'
     * </code>
     *
     * @param     string $profileImg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByProfileImg($profileImg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($profileImg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_PROFILE_IMG, $profileImg, $comparison);
    }

    /**
     * Filter the query on the atocom column
     *
     * Example usage:
     * <code>
     * $query->filterByAtocom(1234); // WHERE atocom = 1234
     * $query->filterByAtocom(array(12, 34)); // WHERE atocom IN (12, 34)
     * $query->filterByAtocom(array('min' => 12)); // WHERE atocom > 12
     * </code>
     *
     * @param     mixed $atocom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByAtocom($atocom = null, $comparison = null)
    {
        if (is_array($atocom)) {
            $useMinMax = false;
            if (isset($atocom['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ATOCOM, $atocom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atocom['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_ATOCOM, $atocom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_ATOCOM, $atocom, $comparison);
    }

    /**
     * Filter the query on the hpv column
     *
     * Example usage:
     * <code>
     * $query->filterByHpv(1234); // WHERE hpv = 1234
     * $query->filterByHpv(array(12, 34)); // WHERE hpv IN (12, 34)
     * $query->filterByHpv(array('min' => 12)); // WHERE hpv > 12
     * </code>
     *
     * @param     mixed $hpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function filterByHpv($hpv = null, $comparison = null)
    {
        if (is_array($hpv)) {
            $useMinMax = false;
            if (isset($hpv['min'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_HPV, $hpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hpv['max'])) {
                $this->addUsingAlias(AliMemberTableMap::COL_HPV, $hpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMemberTableMap::COL_HPV, $hpv, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMember $aliMember Object to remove from the list of results
     *
     * @return $this|ChildAliMemberQuery The current query, for fluid interface
     */
    public function prune($aliMember = null)
    {
        if ($aliMember) {
            $this->addUsingAlias(AliMemberTableMap::COL_ID, $aliMember->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_member table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMemberTableMap::clearInstancePool();
            AliMemberTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMemberTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMemberTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMemberTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMemberQuery
