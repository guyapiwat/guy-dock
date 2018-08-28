<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliMember;
use CciOrm\CciOrm\AliMemberQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'ali_member' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliMemberTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliMemberTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_member';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliMember';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliMember';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 167;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 167;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_member.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_member.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_member.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_member.name_t';

    /**
     * the column name for the name_e field
     */
    const COL_NAME_E = 'ali_member.name_e';

    /**
     * the column name for the posid field
     */
    const COL_POSID = 'ali_member.posid';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_member.mdate';

    /**
     * the column name for the birthday field
     */
    const COL_BIRTHDAY = 'ali_member.birthday';

    /**
     * the column name for the national field
     */
    const COL_NATIONAL = 'ali_member.national';

    /**
     * the column name for the id_tax field
     */
    const COL_ID_TAX = 'ali_member.id_tax';

    /**
     * the column name for the id_card field
     */
    const COL_ID_CARD = 'ali_member.id_card';

    /**
     * the column name for the id_card_img field
     */
    const COL_ID_CARD_IMG = 'ali_member.id_card_img';

    /**
     * the column name for the id_card_img_date field
     */
    const COL_ID_CARD_IMG_DATE = 'ali_member.id_card_img_date';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'ali_member.zip';

    /**
     * the column name for the home_t field
     */
    const COL_HOME_T = 'ali_member.home_t';

    /**
     * the column name for the office_t field
     */
    const COL_OFFICE_T = 'ali_member.office_t';

    /**
     * the column name for the mobile field
     */
    const COL_MOBILE = 'ali_member.mobile';

    /**
     * the column name for the mcode_acc field
     */
    const COL_MCODE_ACC = 'ali_member.mcode_acc';

    /**
     * the column name for the bonusrec field
     */
    const COL_BONUSREC = 'ali_member.bonusrec';

    /**
     * the column name for the bankcode field
     */
    const COL_BANKCODE = 'ali_member.bankcode';

    /**
     * the column name for the branch field
     */
    const COL_BRANCH = 'ali_member.branch';

    /**
     * the column name for the acc_type field
     */
    const COL_ACC_TYPE = 'ali_member.acc_type';

    /**
     * the column name for the acc_no field
     */
    const COL_ACC_NO = 'ali_member.acc_no';

    /**
     * the column name for the acc_no_img field
     */
    const COL_ACC_NO_IMG = 'ali_member.acc_no_img';

    /**
     * the column name for the acc_no_img_date field
     */
    const COL_ACC_NO_IMG_DATE = 'ali_member.acc_no_img_date';

    /**
     * the column name for the acc_name field
     */
    const COL_ACC_NAME = 'ali_member.acc_name';

    /**
     * the column name for the acc_prov field
     */
    const COL_ACC_PROV = 'ali_member.acc_prov';

    /**
     * the column name for the sv_code field
     */
    const COL_SV_CODE = 'ali_member.sv_code';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_member.sp_code';

    /**
     * the column name for the sp_name field
     */
    const COL_SP_NAME = 'ali_member.sp_name';

    /**
     * the column name for the sp_code2 field
     */
    const COL_SP_CODE2 = 'ali_member.sp_code2';

    /**
     * the column name for the sp_name2 field
     */
    const COL_SP_NAME2 = 'ali_member.sp_name2';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_member.upa_code';

    /**
     * the column name for the upa_name field
     */
    const COL_UPA_NAME = 'ali_member.upa_name';

    /**
     * the column name for the lr field
     */
    const COL_LR = 'ali_member.lr';

    /**
     * the column name for the complete field
     */
    const COL_COMPLETE = 'ali_member.complete';

    /**
     * the column name for the compdate field
     */
    const COL_COMPDATE = 'ali_member.compdate';

    /**
     * the column name for the modate field
     */
    const COL_MODATE = 'ali_member.modate';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_member.usercode';

    /**
     * the column name for the name_b field
     */
    const COL_NAME_B = 'ali_member.name_b';

    /**
     * the column name for the sex field
     */
    const COL_SEX = 'ali_member.sex';

    /**
     * the column name for the age field
     */
    const COL_AGE = 'ali_member.age';

    /**
     * the column name for the occupation field
     */
    const COL_OCCUPATION = 'ali_member.occupation';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_member.status';

    /**
     * the column name for the mar_name field
     */
    const COL_MAR_NAME = 'ali_member.mar_name';

    /**
     * the column name for the mar_age field
     */
    const COL_MAR_AGE = 'ali_member.mar_age';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'ali_member.email';

    /**
     * the column name for the beneficiaries field
     */
    const COL_BENEFICIARIES = 'ali_member.beneficiaries';

    /**
     * the column name for the relation field
     */
    const COL_RELATION = 'ali_member.relation';

    /**
     * the column name for the districtId field
     */
    const COL_DISTRICTID = 'ali_member.districtId';

    /**
     * the column name for the amphurId field
     */
    const COL_AMPHURID = 'ali_member.amphurId';

    /**
     * the column name for the provinceId field
     */
    const COL_PROVINCEID = 'ali_member.provinceId';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'ali_member.fax';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_member.inv_code';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_member.uid';

    /**
     * the column name for the oid field
     */
    const COL_OID = 'ali_member.oid';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_member.pos_cur';

    /**
     * the column name for the pos_cur1 field
     */
    const COL_POS_CUR1 = 'ali_member.pos_cur1';

    /**
     * the column name for the pos_cur2 field
     */
    const COL_POS_CUR2 = 'ali_member.pos_cur2';

    /**
     * the column name for the pos_cur3 field
     */
    const COL_POS_CUR3 = 'ali_member.pos_cur3';

    /**
     * the column name for the pos_cur4 field
     */
    const COL_POS_CUR4 = 'ali_member.pos_cur4';

    /**
     * the column name for the pos_cur_tmp field
     */
    const COL_POS_CUR_TMP = 'ali_member.pos_cur_tmp';

    /**
     * the column name for the rpos_cur4 field
     */
    const COL_RPOS_CUR4 = 'ali_member.rpos_cur4';

    /**
     * the column name for the pos_cur3_date field
     */
    const COL_POS_CUR3_DATE = 'ali_member.pos_cur3_date';

    /**
     * the column name for the memdesc field
     */
    const COL_MEMDESC = 'ali_member.memdesc';

    /**
     * the column name for the cmp field
     */
    const COL_CMP = 'ali_member.cmp';

    /**
     * the column name for the cmp2 field
     */
    const COL_CMP2 = 'ali_member.cmp2';

    /**
     * the column name for the cmp3 field
     */
    const COL_CMP3 = 'ali_member.cmp3';

    /**
     * the column name for the ccmp field
     */
    const COL_CCMP = 'ali_member.ccmp';

    /**
     * the column name for the ccmp2 field
     */
    const COL_CCMP2 = 'ali_member.ccmp2';

    /**
     * the column name for the ccmp3 field
     */
    const COL_CCMP3 = 'ali_member.ccmp3';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'ali_member.address';

    /**
     * the column name for the street field
     */
    const COL_STREET = 'ali_member.street';

    /**
     * the column name for the building field
     */
    const COL_BUILDING = 'ali_member.building';

    /**
     * the column name for the village field
     */
    const COL_VILLAGE = 'ali_member.village';

    /**
     * the column name for the soi field
     */
    const COL_SOI = 'ali_member.soi';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_member.ewallet';

    /**
     * the column name for the eatoship field
     */
    const COL_EATOSHIP = 'ali_member.eatoship';

    /**
     * the column name for the ecom field
     */
    const COL_ECOM = 'ali_member.ecom';

    /**
     * the column name for the bmdate1 field
     */
    const COL_BMDATE1 = 'ali_member.bmdate1';

    /**
     * the column name for the bmdate2 field
     */
    const COL_BMDATE2 = 'ali_member.bmdate2';

    /**
     * the column name for the bmdate3 field
     */
    const COL_BMDATE3 = 'ali_member.bmdate3';

    /**
     * the column name for the cbmdate1 field
     */
    const COL_CBMDATE1 = 'ali_member.cbmdate1';

    /**
     * the column name for the cbmdate2 field
     */
    const COL_CBMDATE2 = 'ali_member.cbmdate2';

    /**
     * the column name for the cbmdate3 field
     */
    const COL_CBMDATE3 = 'ali_member.cbmdate3';

    /**
     * the column name for the online field
     */
    const COL_ONLINE = 'ali_member.online';

    /**
     * the column name for the cname_f field
     */
    const COL_CNAME_F = 'ali_member.cname_f';

    /**
     * the column name for the cname_t field
     */
    const COL_CNAME_T = 'ali_member.cname_t';

    /**
     * the column name for the cname_e field
     */
    const COL_CNAME_E = 'ali_member.cname_e';

    /**
     * the column name for the cname_b field
     */
    const COL_CNAME_B = 'ali_member.cname_b';

    /**
     * the column name for the cbirthday field
     */
    const COL_CBIRTHDAY = 'ali_member.cbirthday';

    /**
     * the column name for the cnational field
     */
    const COL_CNATIONAL = 'ali_member.cnational';

    /**
     * the column name for the cid_tax field
     */
    const COL_CID_TAX = 'ali_member.cid_tax';

    /**
     * the column name for the cid_card field
     */
    const COL_CID_CARD = 'ali_member.cid_card';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'ali_member.caddress';

    /**
     * the column name for the cbuilding field
     */
    const COL_CBUILDING = 'ali_member.cbuilding';

    /**
     * the column name for the cvillage field
     */
    const COL_CVILLAGE = 'ali_member.cvillage';

    /**
     * the column name for the cstreet field
     */
    const COL_CSTREET = 'ali_member.cstreet';

    /**
     * the column name for the csoi field
     */
    const COL_CSOI = 'ali_member.csoi';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'ali_member.czip';

    /**
     * the column name for the chome_t field
     */
    const COL_CHOME_T = 'ali_member.chome_t';

    /**
     * the column name for the coffice_t field
     */
    const COL_COFFICE_T = 'ali_member.coffice_t';

    /**
     * the column name for the cmobile field
     */
    const COL_CMOBILE = 'ali_member.cmobile';

    /**
     * the column name for the cfax field
     */
    const COL_CFAX = 'ali_member.cfax';

    /**
     * the column name for the csex field
     */
    const COL_CSEX = 'ali_member.csex';

    /**
     * the column name for the cemail field
     */
    const COL_CEMAIL = 'ali_member.cemail';

    /**
     * the column name for the cdistrictId field
     */
    const COL_CDISTRICTID = 'ali_member.cdistrictId';

    /**
     * the column name for the camphurId field
     */
    const COL_CAMPHURID = 'ali_member.camphurId';

    /**
     * the column name for the cprovinceId field
     */
    const COL_CPROVINCEID = 'ali_member.cprovinceId';

    /**
     * the column name for the iname_f field
     */
    const COL_INAME_F = 'ali_member.iname_f';

    /**
     * the column name for the iname_t field
     */
    const COL_INAME_T = 'ali_member.iname_t';

    /**
     * the column name for the irelation field
     */
    const COL_IRELATION = 'ali_member.irelation';

    /**
     * the column name for the iphone field
     */
    const COL_IPHONE = 'ali_member.iphone';

    /**
     * the column name for the iid_card field
     */
    const COL_IID_CARD = 'ali_member.iid_card';

    /**
     * the column name for the status_doc field
     */
    const COL_STATUS_DOC = 'ali_member.status_doc';

    /**
     * the column name for the status_expire field
     */
    const COL_STATUS_EXPIRE = 'ali_member.status_expire';

    /**
     * the column name for the status_terminate field
     */
    const COL_STATUS_TERMINATE = 'ali_member.status_terminate';

    /**
     * the column name for the terminate_date field
     */
    const COL_TERMINATE_DATE = 'ali_member.terminate_date';

    /**
     * the column name for the status_suspend field
     */
    const COL_STATUS_SUSPEND = 'ali_member.status_suspend';

    /**
     * the column name for the suspend_date field
     */
    const COL_SUSPEND_DATE = 'ali_member.suspend_date';

    /**
     * the column name for the status_blacklist field
     */
    const COL_STATUS_BLACKLIST = 'ali_member.status_blacklist';

    /**
     * the column name for the status_ato field
     */
    const COL_STATUS_ATO = 'ali_member.status_ato';

    /**
     * the column name for the sletter field
     */
    const COL_SLETTER = 'ali_member.sletter';

    /**
     * the column name for the sinv_code field
     */
    const COL_SINV_CODE = 'ali_member.sinv_code';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_member.txtoption';

    /**
     * the column name for the setregis field
     */
    const COL_SETREGIS = 'ali_member.setregis';

    /**
     * the column name for the slr field
     */
    const COL_SLR = 'ali_member.slr';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_member.locationbase';

    /**
     * the column name for the cid_mobile field
     */
    const COL_CID_MOBILE = 'ali_member.cid_mobile';

    /**
     * the column name for the bewallet field
     */
    const COL_BEWALLET = 'ali_member.bewallet';

    /**
     * the column name for the bvoucher field
     */
    const COL_BVOUCHER = 'ali_member.bvoucher';

    /**
     * the column name for the voucher field
     */
    const COL_VOUCHER = 'ali_member.voucher';

    /**
     * the column name for the manager field
     */
    const COL_MANAGER = 'ali_member.manager';

    /**
     * the column name for the mtype field
     */
    const COL_MTYPE = 'ali_member.mtype';

    /**
     * the column name for the mtype1 field
     */
    const COL_MTYPE1 = 'ali_member.mtype1';

    /**
     * the column name for the mtype2 field
     */
    const COL_MTYPE2 = 'ali_member.mtype2';

    /**
     * the column name for the mvat field
     */
    const COL_MVAT = 'ali_member.mvat';

    /**
     * the column name for the uidbase field
     */
    const COL_UIDBASE = 'ali_member.uidbase';

    /**
     * the column name for the exp_date field
     */
    const COL_EXP_DATE = 'ali_member.exp_date';

    /**
     * the column name for the head_code field
     */
    const COL_HEAD_CODE = 'ali_member.head_code';

    /**
     * the column name for the pv_l field
     */
    const COL_PV_L = 'ali_member.pv_l';

    /**
     * the column name for the pv_c field
     */
    const COL_PV_C = 'ali_member.pv_c';

    /**
     * the column name for the hpv_l field
     */
    const COL_HPV_L = 'ali_member.hpv_l';

    /**
     * the column name for the hpv_c field
     */
    const COL_HPV_C = 'ali_member.hpv_c';

    /**
     * the column name for the pv_l_nextmonth field
     */
    const COL_PV_L_NEXTMONTH = 'ali_member.pv_l_nextmonth';

    /**
     * the column name for the pv_c_nextmonth field
     */
    const COL_PV_C_NEXTMONTH = 'ali_member.pv_c_nextmonth';

    /**
     * the column name for the pv_l_lastmonth1 field
     */
    const COL_PV_L_LASTMONTH1 = 'ali_member.pv_l_lastmonth1';

    /**
     * the column name for the pv_c_lastmonth1 field
     */
    const COL_PV_C_LASTMONTH1 = 'ali_member.pv_c_lastmonth1';

    /**
     * the column name for the pv_l_lastmonth2 field
     */
    const COL_PV_L_LASTMONTH2 = 'ali_member.pv_l_lastmonth2';

    /**
     * the column name for the pv_c_lastmonth2 field
     */
    const COL_PV_C_LASTMONTH2 = 'ali_member.pv_c_lastmonth2';

    /**
     * the column name for the rcode_star field
     */
    const COL_RCODE_STAR = 'ali_member.rcode_star';

    /**
     * the column name for the bunit field
     */
    const COL_BUNIT = 'ali_member.bunit';

    /**
     * the column name for the province field
     */
    const COL_PROVINCE = 'ali_member.province';

    /**
     * the column name for the line_id field
     */
    const COL_LINE_ID = 'ali_member.line_id';

    /**
     * the column name for the facebook_name field
     */
    const COL_FACEBOOK_NAME = 'ali_member.facebook_name';

    /**
     * the column name for the type_com field
     */
    const COL_TYPE_COM = 'ali_member.type_com';

    /**
     * the column name for the exp_pos field
     */
    const COL_EXP_POS = 'ali_member.exp_pos';

    /**
     * the column name for the exp_pos_60 field
     */
    const COL_EXP_POS_60 = 'ali_member.exp_pos_60';

    /**
     * the column name for the trip_private field
     */
    const COL_TRIP_PRIVATE = 'ali_member.trip_private';

    /**
     * the column name for the trip_team field
     */
    const COL_TRIP_TEAM = 'ali_member.trip_team';

    /**
     * the column name for the myfile1 field
     */
    const COL_MYFILE1 = 'ali_member.myfile1';

    /**
     * the column name for the myfile2 field
     */
    const COL_MYFILE2 = 'ali_member.myfile2';

    /**
     * the column name for the cline_id field
     */
    const COL_CLINE_ID = 'ali_member.cline_id';

    /**
     * the column name for the cfacebook_name field
     */
    const COL_CFACEBOOK_NAME = 'ali_member.cfacebook_name';

    /**
     * the column name for the profile_img field
     */
    const COL_PROFILE_IMG = 'ali_member.profile_img';

    /**
     * the column name for the atocom field
     */
    const COL_ATOCOM = 'ali_member.atocom';

    /**
     * the column name for the hpv field
     */
    const COL_HPV = 'ali_member.hpv';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'NameF', 'NameT', 'NameE', 'Posid', 'Mdate', 'Birthday', 'National', 'IdTax', 'IdCard', 'IdCardImg', 'IdCardImgDate', 'Zip', 'HomeT', 'OfficeT', 'Mobile', 'McodeAcc', 'Bonusrec', 'Bankcode', 'Branch', 'AccType', 'AccNo', 'AccNoImg', 'AccNoImgDate', 'AccName', 'AccProv', 'SvCode', 'SpCode', 'SpName', 'SpCode2', 'SpName2', 'UpaCode', 'UpaName', 'Lr', 'Complete', 'Compdate', 'Modate', 'Usercode', 'NameB', 'Sex', 'Age', 'Occupation', 'Status', 'MarName', 'MarAge', 'Email', 'Beneficiaries', 'Relation', 'Districtid', 'Amphurid', 'Provinceid', 'Fax', 'InvCode', 'Uid', 'Oid', 'PosCur', 'PosCur1', 'PosCur2', 'PosCur3', 'PosCur4', 'PosCurTmp', 'RposCur4', 'PosCur3Date', 'Memdesc', 'Cmp', 'Cmp2', 'Cmp3', 'Ccmp', 'Ccmp2', 'Ccmp3', 'Address', 'Street', 'Building', 'Village', 'Soi', 'Ewallet', 'Eatoship', 'Ecom', 'Bmdate1', 'Bmdate2', 'Bmdate3', 'Cbmdate1', 'Cbmdate2', 'Cbmdate3', 'Online', 'CnameF', 'CnameT', 'CnameE', 'CnameB', 'Cbirthday', 'Cnational', 'CidTax', 'CidCard', 'Caddress', 'Cbuilding', 'Cvillage', 'Cstreet', 'Csoi', 'Czip', 'ChomeT', 'CofficeT', 'Cmobile', 'Cfax', 'Csex', 'Cemail', 'Cdistrictid', 'Camphurid', 'Cprovinceid', 'InameF', 'InameT', 'Irelation', 'Iphone', 'IidCard', 'StatusDoc', 'StatusExpire', 'StatusTerminate', 'TerminateDate', 'StatusSuspend', 'SuspendDate', 'StatusBlacklist', 'StatusAto', 'Sletter', 'SinvCode', 'Txtoption', 'Setregis', 'Slr', 'Locationbase', 'CidMobile', 'Bewallet', 'Bvoucher', 'Voucher', 'Manager', 'Mtype', 'Mtype1', 'Mtype2', 'Mvat', 'Uidbase', 'ExpDate', 'HeadCode', 'PvL', 'PvC', 'HpvL', 'HpvC', 'PvLNextmonth', 'PvCNextmonth', 'PvLLastmonth1', 'PvCLastmonth1', 'PvLLastmonth2', 'PvCLastmonth2', 'RcodeStar', 'Bunit', 'Province', 'LineId', 'FacebookName', 'TypeCom', 'ExpPos', 'ExpPos60', 'TripPrivate', 'TripTeam', 'Myfile1', 'Myfile2', 'ClineId', 'CfacebookName', 'ProfileImg', 'Atocom', 'Hpv', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'nameF', 'nameT', 'nameE', 'posid', 'mdate', 'birthday', 'national', 'idTax', 'idCard', 'idCardImg', 'idCardImgDate', 'zip', 'homeT', 'officeT', 'mobile', 'mcodeAcc', 'bonusrec', 'bankcode', 'branch', 'accType', 'accNo', 'accNoImg', 'accNoImgDate', 'accName', 'accProv', 'svCode', 'spCode', 'spName', 'spCode2', 'spName2', 'upaCode', 'upaName', 'lr', 'complete', 'compdate', 'modate', 'usercode', 'nameB', 'sex', 'age', 'occupation', 'status', 'marName', 'marAge', 'email', 'beneficiaries', 'relation', 'districtid', 'amphurid', 'provinceid', 'fax', 'invCode', 'uid', 'oid', 'posCur', 'posCur1', 'posCur2', 'posCur3', 'posCur4', 'posCurTmp', 'rposCur4', 'posCur3Date', 'memdesc', 'cmp', 'cmp2', 'cmp3', 'ccmp', 'ccmp2', 'ccmp3', 'address', 'street', 'building', 'village', 'soi', 'ewallet', 'eatoship', 'ecom', 'bmdate1', 'bmdate2', 'bmdate3', 'cbmdate1', 'cbmdate2', 'cbmdate3', 'online', 'cnameF', 'cnameT', 'cnameE', 'cnameB', 'cbirthday', 'cnational', 'cidTax', 'cidCard', 'caddress', 'cbuilding', 'cvillage', 'cstreet', 'csoi', 'czip', 'chomeT', 'cofficeT', 'cmobile', 'cfax', 'csex', 'cemail', 'cdistrictid', 'camphurid', 'cprovinceid', 'inameF', 'inameT', 'irelation', 'iphone', 'iidCard', 'statusDoc', 'statusExpire', 'statusTerminate', 'terminateDate', 'statusSuspend', 'suspendDate', 'statusBlacklist', 'statusAto', 'sletter', 'sinvCode', 'txtoption', 'setregis', 'slr', 'locationbase', 'cidMobile', 'bewallet', 'bvoucher', 'voucher', 'manager', 'mtype', 'mtype1', 'mtype2', 'mvat', 'uidbase', 'expDate', 'headCode', 'pvL', 'pvC', 'hpvL', 'hpvC', 'pvLNextmonth', 'pvCNextmonth', 'pvLLastmonth1', 'pvCLastmonth1', 'pvLLastmonth2', 'pvCLastmonth2', 'rcodeStar', 'bunit', 'province', 'lineId', 'facebookName', 'typeCom', 'expPos', 'expPos60', 'tripPrivate', 'tripTeam', 'myfile1', 'myfile2', 'clineId', 'cfacebookName', 'profileImg', 'atocom', 'hpv', ),
        self::TYPE_COLNAME       => array(AliMemberTableMap::COL_ID, AliMemberTableMap::COL_MCODE, AliMemberTableMap::COL_NAME_F, AliMemberTableMap::COL_NAME_T, AliMemberTableMap::COL_NAME_E, AliMemberTableMap::COL_POSID, AliMemberTableMap::COL_MDATE, AliMemberTableMap::COL_BIRTHDAY, AliMemberTableMap::COL_NATIONAL, AliMemberTableMap::COL_ID_TAX, AliMemberTableMap::COL_ID_CARD, AliMemberTableMap::COL_ID_CARD_IMG, AliMemberTableMap::COL_ID_CARD_IMG_DATE, AliMemberTableMap::COL_ZIP, AliMemberTableMap::COL_HOME_T, AliMemberTableMap::COL_OFFICE_T, AliMemberTableMap::COL_MOBILE, AliMemberTableMap::COL_MCODE_ACC, AliMemberTableMap::COL_BONUSREC, AliMemberTableMap::COL_BANKCODE, AliMemberTableMap::COL_BRANCH, AliMemberTableMap::COL_ACC_TYPE, AliMemberTableMap::COL_ACC_NO, AliMemberTableMap::COL_ACC_NO_IMG, AliMemberTableMap::COL_ACC_NO_IMG_DATE, AliMemberTableMap::COL_ACC_NAME, AliMemberTableMap::COL_ACC_PROV, AliMemberTableMap::COL_SV_CODE, AliMemberTableMap::COL_SP_CODE, AliMemberTableMap::COL_SP_NAME, AliMemberTableMap::COL_SP_CODE2, AliMemberTableMap::COL_SP_NAME2, AliMemberTableMap::COL_UPA_CODE, AliMemberTableMap::COL_UPA_NAME, AliMemberTableMap::COL_LR, AliMemberTableMap::COL_COMPLETE, AliMemberTableMap::COL_COMPDATE, AliMemberTableMap::COL_MODATE, AliMemberTableMap::COL_USERCODE, AliMemberTableMap::COL_NAME_B, AliMemberTableMap::COL_SEX, AliMemberTableMap::COL_AGE, AliMemberTableMap::COL_OCCUPATION, AliMemberTableMap::COL_STATUS, AliMemberTableMap::COL_MAR_NAME, AliMemberTableMap::COL_MAR_AGE, AliMemberTableMap::COL_EMAIL, AliMemberTableMap::COL_BENEFICIARIES, AliMemberTableMap::COL_RELATION, AliMemberTableMap::COL_DISTRICTID, AliMemberTableMap::COL_AMPHURID, AliMemberTableMap::COL_PROVINCEID, AliMemberTableMap::COL_FAX, AliMemberTableMap::COL_INV_CODE, AliMemberTableMap::COL_UID, AliMemberTableMap::COL_OID, AliMemberTableMap::COL_POS_CUR, AliMemberTableMap::COL_POS_CUR1, AliMemberTableMap::COL_POS_CUR2, AliMemberTableMap::COL_POS_CUR3, AliMemberTableMap::COL_POS_CUR4, AliMemberTableMap::COL_POS_CUR_TMP, AliMemberTableMap::COL_RPOS_CUR4, AliMemberTableMap::COL_POS_CUR3_DATE, AliMemberTableMap::COL_MEMDESC, AliMemberTableMap::COL_CMP, AliMemberTableMap::COL_CMP2, AliMemberTableMap::COL_CMP3, AliMemberTableMap::COL_CCMP, AliMemberTableMap::COL_CCMP2, AliMemberTableMap::COL_CCMP3, AliMemberTableMap::COL_ADDRESS, AliMemberTableMap::COL_STREET, AliMemberTableMap::COL_BUILDING, AliMemberTableMap::COL_VILLAGE, AliMemberTableMap::COL_SOI, AliMemberTableMap::COL_EWALLET, AliMemberTableMap::COL_EATOSHIP, AliMemberTableMap::COL_ECOM, AliMemberTableMap::COL_BMDATE1, AliMemberTableMap::COL_BMDATE2, AliMemberTableMap::COL_BMDATE3, AliMemberTableMap::COL_CBMDATE1, AliMemberTableMap::COL_CBMDATE2, AliMemberTableMap::COL_CBMDATE3, AliMemberTableMap::COL_ONLINE, AliMemberTableMap::COL_CNAME_F, AliMemberTableMap::COL_CNAME_T, AliMemberTableMap::COL_CNAME_E, AliMemberTableMap::COL_CNAME_B, AliMemberTableMap::COL_CBIRTHDAY, AliMemberTableMap::COL_CNATIONAL, AliMemberTableMap::COL_CID_TAX, AliMemberTableMap::COL_CID_CARD, AliMemberTableMap::COL_CADDRESS, AliMemberTableMap::COL_CBUILDING, AliMemberTableMap::COL_CVILLAGE, AliMemberTableMap::COL_CSTREET, AliMemberTableMap::COL_CSOI, AliMemberTableMap::COL_CZIP, AliMemberTableMap::COL_CHOME_T, AliMemberTableMap::COL_COFFICE_T, AliMemberTableMap::COL_CMOBILE, AliMemberTableMap::COL_CFAX, AliMemberTableMap::COL_CSEX, AliMemberTableMap::COL_CEMAIL, AliMemberTableMap::COL_CDISTRICTID, AliMemberTableMap::COL_CAMPHURID, AliMemberTableMap::COL_CPROVINCEID, AliMemberTableMap::COL_INAME_F, AliMemberTableMap::COL_INAME_T, AliMemberTableMap::COL_IRELATION, AliMemberTableMap::COL_IPHONE, AliMemberTableMap::COL_IID_CARD, AliMemberTableMap::COL_STATUS_DOC, AliMemberTableMap::COL_STATUS_EXPIRE, AliMemberTableMap::COL_STATUS_TERMINATE, AliMemberTableMap::COL_TERMINATE_DATE, AliMemberTableMap::COL_STATUS_SUSPEND, AliMemberTableMap::COL_SUSPEND_DATE, AliMemberTableMap::COL_STATUS_BLACKLIST, AliMemberTableMap::COL_STATUS_ATO, AliMemberTableMap::COL_SLETTER, AliMemberTableMap::COL_SINV_CODE, AliMemberTableMap::COL_TXTOPTION, AliMemberTableMap::COL_SETREGIS, AliMemberTableMap::COL_SLR, AliMemberTableMap::COL_LOCATIONBASE, AliMemberTableMap::COL_CID_MOBILE, AliMemberTableMap::COL_BEWALLET, AliMemberTableMap::COL_BVOUCHER, AliMemberTableMap::COL_VOUCHER, AliMemberTableMap::COL_MANAGER, AliMemberTableMap::COL_MTYPE, AliMemberTableMap::COL_MTYPE1, AliMemberTableMap::COL_MTYPE2, AliMemberTableMap::COL_MVAT, AliMemberTableMap::COL_UIDBASE, AliMemberTableMap::COL_EXP_DATE, AliMemberTableMap::COL_HEAD_CODE, AliMemberTableMap::COL_PV_L, AliMemberTableMap::COL_PV_C, AliMemberTableMap::COL_HPV_L, AliMemberTableMap::COL_HPV_C, AliMemberTableMap::COL_PV_L_NEXTMONTH, AliMemberTableMap::COL_PV_C_NEXTMONTH, AliMemberTableMap::COL_PV_L_LASTMONTH1, AliMemberTableMap::COL_PV_C_LASTMONTH1, AliMemberTableMap::COL_PV_L_LASTMONTH2, AliMemberTableMap::COL_PV_C_LASTMONTH2, AliMemberTableMap::COL_RCODE_STAR, AliMemberTableMap::COL_BUNIT, AliMemberTableMap::COL_PROVINCE, AliMemberTableMap::COL_LINE_ID, AliMemberTableMap::COL_FACEBOOK_NAME, AliMemberTableMap::COL_TYPE_COM, AliMemberTableMap::COL_EXP_POS, AliMemberTableMap::COL_EXP_POS_60, AliMemberTableMap::COL_TRIP_PRIVATE, AliMemberTableMap::COL_TRIP_TEAM, AliMemberTableMap::COL_MYFILE1, AliMemberTableMap::COL_MYFILE2, AliMemberTableMap::COL_CLINE_ID, AliMemberTableMap::COL_CFACEBOOK_NAME, AliMemberTableMap::COL_PROFILE_IMG, AliMemberTableMap::COL_ATOCOM, AliMemberTableMap::COL_HPV, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'name_f', 'name_t', 'name_e', 'posid', 'mdate', 'birthday', 'national', 'id_tax', 'id_card', 'id_card_img', 'id_card_img_date', 'zip', 'home_t', 'office_t', 'mobile', 'mcode_acc', 'bonusrec', 'bankcode', 'branch', 'acc_type', 'acc_no', 'acc_no_img', 'acc_no_img_date', 'acc_name', 'acc_prov', 'sv_code', 'sp_code', 'sp_name', 'sp_code2', 'sp_name2', 'upa_code', 'upa_name', 'lr', 'complete', 'compdate', 'modate', 'usercode', 'name_b', 'sex', 'age', 'occupation', 'status', 'mar_name', 'mar_age', 'email', 'beneficiaries', 'relation', 'districtId', 'amphurId', 'provinceId', 'fax', 'inv_code', 'uid', 'oid', 'pos_cur', 'pos_cur1', 'pos_cur2', 'pos_cur3', 'pos_cur4', 'pos_cur_tmp', 'rpos_cur4', 'pos_cur3_date', 'memdesc', 'cmp', 'cmp2', 'cmp3', 'ccmp', 'ccmp2', 'ccmp3', 'address', 'street', 'building', 'village', 'soi', 'ewallet', 'eatoship', 'ecom', 'bmdate1', 'bmdate2', 'bmdate3', 'cbmdate1', 'cbmdate2', 'cbmdate3', 'online', 'cname_f', 'cname_t', 'cname_e', 'cname_b', 'cbirthday', 'cnational', 'cid_tax', 'cid_card', 'caddress', 'cbuilding', 'cvillage', 'cstreet', 'csoi', 'czip', 'chome_t', 'coffice_t', 'cmobile', 'cfax', 'csex', 'cemail', 'cdistrictId', 'camphurId', 'cprovinceId', 'iname_f', 'iname_t', 'irelation', 'iphone', 'iid_card', 'status_doc', 'status_expire', 'status_terminate', 'terminate_date', 'status_suspend', 'suspend_date', 'status_blacklist', 'status_ato', 'sletter', 'sinv_code', 'txtoption', 'setregis', 'slr', 'locationbase', 'cid_mobile', 'bewallet', 'bvoucher', 'voucher', 'manager', 'mtype', 'mtype1', 'mtype2', 'mvat', 'uidbase', 'exp_date', 'head_code', 'pv_l', 'pv_c', 'hpv_l', 'hpv_c', 'pv_l_nextmonth', 'pv_c_nextmonth', 'pv_l_lastmonth1', 'pv_c_lastmonth1', 'pv_l_lastmonth2', 'pv_c_lastmonth2', 'rcode_star', 'bunit', 'province', 'line_id', 'facebook_name', 'type_com', 'exp_pos', 'exp_pos_60', 'trip_private', 'trip_team', 'myfile1', 'myfile2', 'cline_id', 'cfacebook_name', 'profile_img', 'atocom', 'hpv', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'NameF' => 2, 'NameT' => 3, 'NameE' => 4, 'Posid' => 5, 'Mdate' => 6, 'Birthday' => 7, 'National' => 8, 'IdTax' => 9, 'IdCard' => 10, 'IdCardImg' => 11, 'IdCardImgDate' => 12, 'Zip' => 13, 'HomeT' => 14, 'OfficeT' => 15, 'Mobile' => 16, 'McodeAcc' => 17, 'Bonusrec' => 18, 'Bankcode' => 19, 'Branch' => 20, 'AccType' => 21, 'AccNo' => 22, 'AccNoImg' => 23, 'AccNoImgDate' => 24, 'AccName' => 25, 'AccProv' => 26, 'SvCode' => 27, 'SpCode' => 28, 'SpName' => 29, 'SpCode2' => 30, 'SpName2' => 31, 'UpaCode' => 32, 'UpaName' => 33, 'Lr' => 34, 'Complete' => 35, 'Compdate' => 36, 'Modate' => 37, 'Usercode' => 38, 'NameB' => 39, 'Sex' => 40, 'Age' => 41, 'Occupation' => 42, 'Status' => 43, 'MarName' => 44, 'MarAge' => 45, 'Email' => 46, 'Beneficiaries' => 47, 'Relation' => 48, 'Districtid' => 49, 'Amphurid' => 50, 'Provinceid' => 51, 'Fax' => 52, 'InvCode' => 53, 'Uid' => 54, 'Oid' => 55, 'PosCur' => 56, 'PosCur1' => 57, 'PosCur2' => 58, 'PosCur3' => 59, 'PosCur4' => 60, 'PosCurTmp' => 61, 'RposCur4' => 62, 'PosCur3Date' => 63, 'Memdesc' => 64, 'Cmp' => 65, 'Cmp2' => 66, 'Cmp3' => 67, 'Ccmp' => 68, 'Ccmp2' => 69, 'Ccmp3' => 70, 'Address' => 71, 'Street' => 72, 'Building' => 73, 'Village' => 74, 'Soi' => 75, 'Ewallet' => 76, 'Eatoship' => 77, 'Ecom' => 78, 'Bmdate1' => 79, 'Bmdate2' => 80, 'Bmdate3' => 81, 'Cbmdate1' => 82, 'Cbmdate2' => 83, 'Cbmdate3' => 84, 'Online' => 85, 'CnameF' => 86, 'CnameT' => 87, 'CnameE' => 88, 'CnameB' => 89, 'Cbirthday' => 90, 'Cnational' => 91, 'CidTax' => 92, 'CidCard' => 93, 'Caddress' => 94, 'Cbuilding' => 95, 'Cvillage' => 96, 'Cstreet' => 97, 'Csoi' => 98, 'Czip' => 99, 'ChomeT' => 100, 'CofficeT' => 101, 'Cmobile' => 102, 'Cfax' => 103, 'Csex' => 104, 'Cemail' => 105, 'Cdistrictid' => 106, 'Camphurid' => 107, 'Cprovinceid' => 108, 'InameF' => 109, 'InameT' => 110, 'Irelation' => 111, 'Iphone' => 112, 'IidCard' => 113, 'StatusDoc' => 114, 'StatusExpire' => 115, 'StatusTerminate' => 116, 'TerminateDate' => 117, 'StatusSuspend' => 118, 'SuspendDate' => 119, 'StatusBlacklist' => 120, 'StatusAto' => 121, 'Sletter' => 122, 'SinvCode' => 123, 'Txtoption' => 124, 'Setregis' => 125, 'Slr' => 126, 'Locationbase' => 127, 'CidMobile' => 128, 'Bewallet' => 129, 'Bvoucher' => 130, 'Voucher' => 131, 'Manager' => 132, 'Mtype' => 133, 'Mtype1' => 134, 'Mtype2' => 135, 'Mvat' => 136, 'Uidbase' => 137, 'ExpDate' => 138, 'HeadCode' => 139, 'PvL' => 140, 'PvC' => 141, 'HpvL' => 142, 'HpvC' => 143, 'PvLNextmonth' => 144, 'PvCNextmonth' => 145, 'PvLLastmonth1' => 146, 'PvCLastmonth1' => 147, 'PvLLastmonth2' => 148, 'PvCLastmonth2' => 149, 'RcodeStar' => 150, 'Bunit' => 151, 'Province' => 152, 'LineId' => 153, 'FacebookName' => 154, 'TypeCom' => 155, 'ExpPos' => 156, 'ExpPos60' => 157, 'TripPrivate' => 158, 'TripTeam' => 159, 'Myfile1' => 160, 'Myfile2' => 161, 'ClineId' => 162, 'CfacebookName' => 163, 'ProfileImg' => 164, 'Atocom' => 165, 'Hpv' => 166, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'nameF' => 2, 'nameT' => 3, 'nameE' => 4, 'posid' => 5, 'mdate' => 6, 'birthday' => 7, 'national' => 8, 'idTax' => 9, 'idCard' => 10, 'idCardImg' => 11, 'idCardImgDate' => 12, 'zip' => 13, 'homeT' => 14, 'officeT' => 15, 'mobile' => 16, 'mcodeAcc' => 17, 'bonusrec' => 18, 'bankcode' => 19, 'branch' => 20, 'accType' => 21, 'accNo' => 22, 'accNoImg' => 23, 'accNoImgDate' => 24, 'accName' => 25, 'accProv' => 26, 'svCode' => 27, 'spCode' => 28, 'spName' => 29, 'spCode2' => 30, 'spName2' => 31, 'upaCode' => 32, 'upaName' => 33, 'lr' => 34, 'complete' => 35, 'compdate' => 36, 'modate' => 37, 'usercode' => 38, 'nameB' => 39, 'sex' => 40, 'age' => 41, 'occupation' => 42, 'status' => 43, 'marName' => 44, 'marAge' => 45, 'email' => 46, 'beneficiaries' => 47, 'relation' => 48, 'districtid' => 49, 'amphurid' => 50, 'provinceid' => 51, 'fax' => 52, 'invCode' => 53, 'uid' => 54, 'oid' => 55, 'posCur' => 56, 'posCur1' => 57, 'posCur2' => 58, 'posCur3' => 59, 'posCur4' => 60, 'posCurTmp' => 61, 'rposCur4' => 62, 'posCur3Date' => 63, 'memdesc' => 64, 'cmp' => 65, 'cmp2' => 66, 'cmp3' => 67, 'ccmp' => 68, 'ccmp2' => 69, 'ccmp3' => 70, 'address' => 71, 'street' => 72, 'building' => 73, 'village' => 74, 'soi' => 75, 'ewallet' => 76, 'eatoship' => 77, 'ecom' => 78, 'bmdate1' => 79, 'bmdate2' => 80, 'bmdate3' => 81, 'cbmdate1' => 82, 'cbmdate2' => 83, 'cbmdate3' => 84, 'online' => 85, 'cnameF' => 86, 'cnameT' => 87, 'cnameE' => 88, 'cnameB' => 89, 'cbirthday' => 90, 'cnational' => 91, 'cidTax' => 92, 'cidCard' => 93, 'caddress' => 94, 'cbuilding' => 95, 'cvillage' => 96, 'cstreet' => 97, 'csoi' => 98, 'czip' => 99, 'chomeT' => 100, 'cofficeT' => 101, 'cmobile' => 102, 'cfax' => 103, 'csex' => 104, 'cemail' => 105, 'cdistrictid' => 106, 'camphurid' => 107, 'cprovinceid' => 108, 'inameF' => 109, 'inameT' => 110, 'irelation' => 111, 'iphone' => 112, 'iidCard' => 113, 'statusDoc' => 114, 'statusExpire' => 115, 'statusTerminate' => 116, 'terminateDate' => 117, 'statusSuspend' => 118, 'suspendDate' => 119, 'statusBlacklist' => 120, 'statusAto' => 121, 'sletter' => 122, 'sinvCode' => 123, 'txtoption' => 124, 'setregis' => 125, 'slr' => 126, 'locationbase' => 127, 'cidMobile' => 128, 'bewallet' => 129, 'bvoucher' => 130, 'voucher' => 131, 'manager' => 132, 'mtype' => 133, 'mtype1' => 134, 'mtype2' => 135, 'mvat' => 136, 'uidbase' => 137, 'expDate' => 138, 'headCode' => 139, 'pvL' => 140, 'pvC' => 141, 'hpvL' => 142, 'hpvC' => 143, 'pvLNextmonth' => 144, 'pvCNextmonth' => 145, 'pvLLastmonth1' => 146, 'pvCLastmonth1' => 147, 'pvLLastmonth2' => 148, 'pvCLastmonth2' => 149, 'rcodeStar' => 150, 'bunit' => 151, 'province' => 152, 'lineId' => 153, 'facebookName' => 154, 'typeCom' => 155, 'expPos' => 156, 'expPos60' => 157, 'tripPrivate' => 158, 'tripTeam' => 159, 'myfile1' => 160, 'myfile2' => 161, 'clineId' => 162, 'cfacebookName' => 163, 'profileImg' => 164, 'atocom' => 165, 'hpv' => 166, ),
        self::TYPE_COLNAME       => array(AliMemberTableMap::COL_ID => 0, AliMemberTableMap::COL_MCODE => 1, AliMemberTableMap::COL_NAME_F => 2, AliMemberTableMap::COL_NAME_T => 3, AliMemberTableMap::COL_NAME_E => 4, AliMemberTableMap::COL_POSID => 5, AliMemberTableMap::COL_MDATE => 6, AliMemberTableMap::COL_BIRTHDAY => 7, AliMemberTableMap::COL_NATIONAL => 8, AliMemberTableMap::COL_ID_TAX => 9, AliMemberTableMap::COL_ID_CARD => 10, AliMemberTableMap::COL_ID_CARD_IMG => 11, AliMemberTableMap::COL_ID_CARD_IMG_DATE => 12, AliMemberTableMap::COL_ZIP => 13, AliMemberTableMap::COL_HOME_T => 14, AliMemberTableMap::COL_OFFICE_T => 15, AliMemberTableMap::COL_MOBILE => 16, AliMemberTableMap::COL_MCODE_ACC => 17, AliMemberTableMap::COL_BONUSREC => 18, AliMemberTableMap::COL_BANKCODE => 19, AliMemberTableMap::COL_BRANCH => 20, AliMemberTableMap::COL_ACC_TYPE => 21, AliMemberTableMap::COL_ACC_NO => 22, AliMemberTableMap::COL_ACC_NO_IMG => 23, AliMemberTableMap::COL_ACC_NO_IMG_DATE => 24, AliMemberTableMap::COL_ACC_NAME => 25, AliMemberTableMap::COL_ACC_PROV => 26, AliMemberTableMap::COL_SV_CODE => 27, AliMemberTableMap::COL_SP_CODE => 28, AliMemberTableMap::COL_SP_NAME => 29, AliMemberTableMap::COL_SP_CODE2 => 30, AliMemberTableMap::COL_SP_NAME2 => 31, AliMemberTableMap::COL_UPA_CODE => 32, AliMemberTableMap::COL_UPA_NAME => 33, AliMemberTableMap::COL_LR => 34, AliMemberTableMap::COL_COMPLETE => 35, AliMemberTableMap::COL_COMPDATE => 36, AliMemberTableMap::COL_MODATE => 37, AliMemberTableMap::COL_USERCODE => 38, AliMemberTableMap::COL_NAME_B => 39, AliMemberTableMap::COL_SEX => 40, AliMemberTableMap::COL_AGE => 41, AliMemberTableMap::COL_OCCUPATION => 42, AliMemberTableMap::COL_STATUS => 43, AliMemberTableMap::COL_MAR_NAME => 44, AliMemberTableMap::COL_MAR_AGE => 45, AliMemberTableMap::COL_EMAIL => 46, AliMemberTableMap::COL_BENEFICIARIES => 47, AliMemberTableMap::COL_RELATION => 48, AliMemberTableMap::COL_DISTRICTID => 49, AliMemberTableMap::COL_AMPHURID => 50, AliMemberTableMap::COL_PROVINCEID => 51, AliMemberTableMap::COL_FAX => 52, AliMemberTableMap::COL_INV_CODE => 53, AliMemberTableMap::COL_UID => 54, AliMemberTableMap::COL_OID => 55, AliMemberTableMap::COL_POS_CUR => 56, AliMemberTableMap::COL_POS_CUR1 => 57, AliMemberTableMap::COL_POS_CUR2 => 58, AliMemberTableMap::COL_POS_CUR3 => 59, AliMemberTableMap::COL_POS_CUR4 => 60, AliMemberTableMap::COL_POS_CUR_TMP => 61, AliMemberTableMap::COL_RPOS_CUR4 => 62, AliMemberTableMap::COL_POS_CUR3_DATE => 63, AliMemberTableMap::COL_MEMDESC => 64, AliMemberTableMap::COL_CMP => 65, AliMemberTableMap::COL_CMP2 => 66, AliMemberTableMap::COL_CMP3 => 67, AliMemberTableMap::COL_CCMP => 68, AliMemberTableMap::COL_CCMP2 => 69, AliMemberTableMap::COL_CCMP3 => 70, AliMemberTableMap::COL_ADDRESS => 71, AliMemberTableMap::COL_STREET => 72, AliMemberTableMap::COL_BUILDING => 73, AliMemberTableMap::COL_VILLAGE => 74, AliMemberTableMap::COL_SOI => 75, AliMemberTableMap::COL_EWALLET => 76, AliMemberTableMap::COL_EATOSHIP => 77, AliMemberTableMap::COL_ECOM => 78, AliMemberTableMap::COL_BMDATE1 => 79, AliMemberTableMap::COL_BMDATE2 => 80, AliMemberTableMap::COL_BMDATE3 => 81, AliMemberTableMap::COL_CBMDATE1 => 82, AliMemberTableMap::COL_CBMDATE2 => 83, AliMemberTableMap::COL_CBMDATE3 => 84, AliMemberTableMap::COL_ONLINE => 85, AliMemberTableMap::COL_CNAME_F => 86, AliMemberTableMap::COL_CNAME_T => 87, AliMemberTableMap::COL_CNAME_E => 88, AliMemberTableMap::COL_CNAME_B => 89, AliMemberTableMap::COL_CBIRTHDAY => 90, AliMemberTableMap::COL_CNATIONAL => 91, AliMemberTableMap::COL_CID_TAX => 92, AliMemberTableMap::COL_CID_CARD => 93, AliMemberTableMap::COL_CADDRESS => 94, AliMemberTableMap::COL_CBUILDING => 95, AliMemberTableMap::COL_CVILLAGE => 96, AliMemberTableMap::COL_CSTREET => 97, AliMemberTableMap::COL_CSOI => 98, AliMemberTableMap::COL_CZIP => 99, AliMemberTableMap::COL_CHOME_T => 100, AliMemberTableMap::COL_COFFICE_T => 101, AliMemberTableMap::COL_CMOBILE => 102, AliMemberTableMap::COL_CFAX => 103, AliMemberTableMap::COL_CSEX => 104, AliMemberTableMap::COL_CEMAIL => 105, AliMemberTableMap::COL_CDISTRICTID => 106, AliMemberTableMap::COL_CAMPHURID => 107, AliMemberTableMap::COL_CPROVINCEID => 108, AliMemberTableMap::COL_INAME_F => 109, AliMemberTableMap::COL_INAME_T => 110, AliMemberTableMap::COL_IRELATION => 111, AliMemberTableMap::COL_IPHONE => 112, AliMemberTableMap::COL_IID_CARD => 113, AliMemberTableMap::COL_STATUS_DOC => 114, AliMemberTableMap::COL_STATUS_EXPIRE => 115, AliMemberTableMap::COL_STATUS_TERMINATE => 116, AliMemberTableMap::COL_TERMINATE_DATE => 117, AliMemberTableMap::COL_STATUS_SUSPEND => 118, AliMemberTableMap::COL_SUSPEND_DATE => 119, AliMemberTableMap::COL_STATUS_BLACKLIST => 120, AliMemberTableMap::COL_STATUS_ATO => 121, AliMemberTableMap::COL_SLETTER => 122, AliMemberTableMap::COL_SINV_CODE => 123, AliMemberTableMap::COL_TXTOPTION => 124, AliMemberTableMap::COL_SETREGIS => 125, AliMemberTableMap::COL_SLR => 126, AliMemberTableMap::COL_LOCATIONBASE => 127, AliMemberTableMap::COL_CID_MOBILE => 128, AliMemberTableMap::COL_BEWALLET => 129, AliMemberTableMap::COL_BVOUCHER => 130, AliMemberTableMap::COL_VOUCHER => 131, AliMemberTableMap::COL_MANAGER => 132, AliMemberTableMap::COL_MTYPE => 133, AliMemberTableMap::COL_MTYPE1 => 134, AliMemberTableMap::COL_MTYPE2 => 135, AliMemberTableMap::COL_MVAT => 136, AliMemberTableMap::COL_UIDBASE => 137, AliMemberTableMap::COL_EXP_DATE => 138, AliMemberTableMap::COL_HEAD_CODE => 139, AliMemberTableMap::COL_PV_L => 140, AliMemberTableMap::COL_PV_C => 141, AliMemberTableMap::COL_HPV_L => 142, AliMemberTableMap::COL_HPV_C => 143, AliMemberTableMap::COL_PV_L_NEXTMONTH => 144, AliMemberTableMap::COL_PV_C_NEXTMONTH => 145, AliMemberTableMap::COL_PV_L_LASTMONTH1 => 146, AliMemberTableMap::COL_PV_C_LASTMONTH1 => 147, AliMemberTableMap::COL_PV_L_LASTMONTH2 => 148, AliMemberTableMap::COL_PV_C_LASTMONTH2 => 149, AliMemberTableMap::COL_RCODE_STAR => 150, AliMemberTableMap::COL_BUNIT => 151, AliMemberTableMap::COL_PROVINCE => 152, AliMemberTableMap::COL_LINE_ID => 153, AliMemberTableMap::COL_FACEBOOK_NAME => 154, AliMemberTableMap::COL_TYPE_COM => 155, AliMemberTableMap::COL_EXP_POS => 156, AliMemberTableMap::COL_EXP_POS_60 => 157, AliMemberTableMap::COL_TRIP_PRIVATE => 158, AliMemberTableMap::COL_TRIP_TEAM => 159, AliMemberTableMap::COL_MYFILE1 => 160, AliMemberTableMap::COL_MYFILE2 => 161, AliMemberTableMap::COL_CLINE_ID => 162, AliMemberTableMap::COL_CFACEBOOK_NAME => 163, AliMemberTableMap::COL_PROFILE_IMG => 164, AliMemberTableMap::COL_ATOCOM => 165, AliMemberTableMap::COL_HPV => 166, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'name_f' => 2, 'name_t' => 3, 'name_e' => 4, 'posid' => 5, 'mdate' => 6, 'birthday' => 7, 'national' => 8, 'id_tax' => 9, 'id_card' => 10, 'id_card_img' => 11, 'id_card_img_date' => 12, 'zip' => 13, 'home_t' => 14, 'office_t' => 15, 'mobile' => 16, 'mcode_acc' => 17, 'bonusrec' => 18, 'bankcode' => 19, 'branch' => 20, 'acc_type' => 21, 'acc_no' => 22, 'acc_no_img' => 23, 'acc_no_img_date' => 24, 'acc_name' => 25, 'acc_prov' => 26, 'sv_code' => 27, 'sp_code' => 28, 'sp_name' => 29, 'sp_code2' => 30, 'sp_name2' => 31, 'upa_code' => 32, 'upa_name' => 33, 'lr' => 34, 'complete' => 35, 'compdate' => 36, 'modate' => 37, 'usercode' => 38, 'name_b' => 39, 'sex' => 40, 'age' => 41, 'occupation' => 42, 'status' => 43, 'mar_name' => 44, 'mar_age' => 45, 'email' => 46, 'beneficiaries' => 47, 'relation' => 48, 'districtId' => 49, 'amphurId' => 50, 'provinceId' => 51, 'fax' => 52, 'inv_code' => 53, 'uid' => 54, 'oid' => 55, 'pos_cur' => 56, 'pos_cur1' => 57, 'pos_cur2' => 58, 'pos_cur3' => 59, 'pos_cur4' => 60, 'pos_cur_tmp' => 61, 'rpos_cur4' => 62, 'pos_cur3_date' => 63, 'memdesc' => 64, 'cmp' => 65, 'cmp2' => 66, 'cmp3' => 67, 'ccmp' => 68, 'ccmp2' => 69, 'ccmp3' => 70, 'address' => 71, 'street' => 72, 'building' => 73, 'village' => 74, 'soi' => 75, 'ewallet' => 76, 'eatoship' => 77, 'ecom' => 78, 'bmdate1' => 79, 'bmdate2' => 80, 'bmdate3' => 81, 'cbmdate1' => 82, 'cbmdate2' => 83, 'cbmdate3' => 84, 'online' => 85, 'cname_f' => 86, 'cname_t' => 87, 'cname_e' => 88, 'cname_b' => 89, 'cbirthday' => 90, 'cnational' => 91, 'cid_tax' => 92, 'cid_card' => 93, 'caddress' => 94, 'cbuilding' => 95, 'cvillage' => 96, 'cstreet' => 97, 'csoi' => 98, 'czip' => 99, 'chome_t' => 100, 'coffice_t' => 101, 'cmobile' => 102, 'cfax' => 103, 'csex' => 104, 'cemail' => 105, 'cdistrictId' => 106, 'camphurId' => 107, 'cprovinceId' => 108, 'iname_f' => 109, 'iname_t' => 110, 'irelation' => 111, 'iphone' => 112, 'iid_card' => 113, 'status_doc' => 114, 'status_expire' => 115, 'status_terminate' => 116, 'terminate_date' => 117, 'status_suspend' => 118, 'suspend_date' => 119, 'status_blacklist' => 120, 'status_ato' => 121, 'sletter' => 122, 'sinv_code' => 123, 'txtoption' => 124, 'setregis' => 125, 'slr' => 126, 'locationbase' => 127, 'cid_mobile' => 128, 'bewallet' => 129, 'bvoucher' => 130, 'voucher' => 131, 'manager' => 132, 'mtype' => 133, 'mtype1' => 134, 'mtype2' => 135, 'mvat' => 136, 'uidbase' => 137, 'exp_date' => 138, 'head_code' => 139, 'pv_l' => 140, 'pv_c' => 141, 'hpv_l' => 142, 'hpv_c' => 143, 'pv_l_nextmonth' => 144, 'pv_c_nextmonth' => 145, 'pv_l_lastmonth1' => 146, 'pv_c_lastmonth1' => 147, 'pv_l_lastmonth2' => 148, 'pv_c_lastmonth2' => 149, 'rcode_star' => 150, 'bunit' => 151, 'province' => 152, 'line_id' => 153, 'facebook_name' => 154, 'type_com' => 155, 'exp_pos' => 156, 'exp_pos_60' => 157, 'trip_private' => 158, 'trip_team' => 159, 'myfile1' => 160, 'myfile2' => 161, 'cline_id' => 162, 'cfacebook_name' => 163, 'profile_img' => 164, 'atocom' => 165, 'hpv' => 166, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('ali_member');
        $this->setPhpName('AliMember');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliMember');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('name_e', 'NameE', 'VARCHAR', true, 255, null);
        $this->addColumn('posid', 'Posid', 'VARCHAR', true, 255, null);
        $this->addColumn('mdate', 'Mdate', 'VARCHAR', true, 255, null);
        $this->addColumn('birthday', 'Birthday', 'VARCHAR', true, 255, null);
        $this->addColumn('national', 'National', 'VARCHAR', true, 255, null);
        $this->addColumn('id_tax', 'IdTax', 'VARCHAR', true, 255, null);
        $this->addColumn('id_card', 'IdCard', 'VARCHAR', true, 255, null);
        $this->addColumn('id_card_img', 'IdCardImg', 'VARCHAR', true, 250, null);
        $this->addColumn('id_card_img_date', 'IdCardImgDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', true, 255, null);
        $this->addColumn('home_t', 'HomeT', 'VARCHAR', true, 255, null);
        $this->addColumn('office_t', 'OfficeT', 'VARCHAR', true, 255, null);
        $this->addColumn('mobile', 'Mobile', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode_acc', 'McodeAcc', 'VARCHAR', true, 255, null);
        $this->addColumn('bonusrec', 'Bonusrec', 'VARCHAR', true, 255, null);
        $this->addColumn('bankcode', 'Bankcode', 'VARCHAR', true, 255, null);
        $this->addColumn('branch', 'Branch', 'VARCHAR', true, 255, null);
        $this->addColumn('acc_type', 'AccType', 'VARCHAR', true, 255, null);
        $this->addColumn('acc_no', 'AccNo', 'VARCHAR', true, 255, null);
        $this->addColumn('acc_no_img', 'AccNoImg', 'VARCHAR', true, 250, null);
        $this->addColumn('acc_no_img_date', 'AccNoImgDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('acc_name', 'AccName', 'VARCHAR', true, 255, null);
        $this->addColumn('acc_prov', 'AccProv', 'VARCHAR', true, 255, null);
        $this->addColumn('sv_code', 'SvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_name', 'SpName', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code2', 'SpCode2', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_name2', 'SpName2', 'VARCHAR', true, 255, null);
        $this->addColumn('upa_code', 'UpaCode', 'VARCHAR', true, 255, null);
        $this->addColumn('upa_name', 'UpaName', 'VARCHAR', true, 255, null);
        $this->addColumn('lr', 'Lr', 'VARCHAR', true, 255, null);
        $this->addColumn('complete', 'Complete', 'VARCHAR', true, 255, null);
        $this->addColumn('compdate', 'Compdate', 'VARCHAR', true, 255, null);
        $this->addColumn('modate', 'Modate', 'VARCHAR', true, 255, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_b', 'NameB', 'VARCHAR', true, 255, null);
        $this->addColumn('sex', 'Sex', 'VARCHAR', true, 10, null);
        $this->addColumn('age', 'Age', 'INTEGER', true, 10, null);
        $this->addColumn('occupation', 'Occupation', 'VARCHAR', true, 50, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, null);
        $this->addColumn('mar_name', 'MarName', 'VARCHAR', true, 100, null);
        $this->addColumn('mar_age', 'MarAge', 'INTEGER', true, 10, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 50, null);
        $this->addColumn('beneficiaries', 'Beneficiaries', 'VARCHAR', true, 100, null);
        $this->addColumn('relation', 'Relation', 'VARCHAR', true, 50, null);
        $this->addColumn('districtId', 'Districtid', 'VARCHAR', true, 255, null);
        $this->addColumn('amphurId', 'Amphurid', 'VARCHAR', true, 255, null);
        $this->addColumn('provinceId', 'Provinceid', 'VARCHAR', true, 255, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', true, 20, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('oid', 'Oid', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur1', 'PosCur1', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur2', 'PosCur2', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur3', 'PosCur3', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur4', 'PosCur4', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur_tmp', 'PosCurTmp', 'VARCHAR', true, 255, null);
        $this->addColumn('rpos_cur4', 'RposCur4', 'INTEGER', true, null, null);
        $this->addColumn('pos_cur3_date', 'PosCur3Date', 'DATE', true, null, null);
        $this->addColumn('memdesc', 'Memdesc', 'VARCHAR', true, 40, null);
        $this->addColumn('cmp', 'Cmp', 'VARCHAR', true, 10, null);
        $this->addColumn('cmp2', 'Cmp2', 'VARCHAR', true, 255, null);
        $this->addColumn('cmp3', 'Cmp3', 'VARCHAR', true, 255, null);
        $this->addColumn('ccmp', 'Ccmp', 'VARCHAR', true, 255, null);
        $this->addColumn('ccmp2', 'Ccmp2', 'VARCHAR', true, 255, null);
        $this->addColumn('ccmp3', 'Ccmp3', 'VARCHAR', true, 255, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', true, null, null);
        $this->addColumn('street', 'Street', 'VARCHAR', true, 255, null);
        $this->addColumn('building', 'Building', 'VARCHAR', true, 255, null);
        $this->addColumn('village', 'Village', 'VARCHAR', true, 255, null);
        $this->addColumn('soi', 'Soi', 'VARCHAR', true, 255, null);
        $this->addColumn('ewallet', 'Ewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('eatoship', 'Eatoship', 'DECIMAL', true, 15, null);
        $this->addColumn('ecom', 'Ecom', 'DECIMAL', true, 15, null);
        $this->addColumn('bmdate1', 'Bmdate1', 'VARCHAR', true, 255, null);
        $this->addColumn('bmdate2', 'Bmdate2', 'VARCHAR', true, 255, null);
        $this->addColumn('bmdate3', 'Bmdate3', 'VARCHAR', true, 255, null);
        $this->addColumn('cbmdate1', 'Cbmdate1', 'VARCHAR', true, 255, null);
        $this->addColumn('cbmdate2', 'Cbmdate2', 'VARCHAR', true, 255, null);
        $this->addColumn('cbmdate3', 'Cbmdate3', 'VARCHAR', true, 255, null);
        $this->addColumn('online', 'Online', 'INTEGER', true, null, null);
        $this->addColumn('cname_f', 'CnameF', 'VARCHAR', true, 255, null);
        $this->addColumn('cname_t', 'CnameT', 'VARCHAR', true, 255, null);
        $this->addColumn('cname_e', 'CnameE', 'VARCHAR', true, 255, null);
        $this->addColumn('cname_b', 'CnameB', 'VARCHAR', true, 255, null);
        $this->addColumn('cbirthday', 'Cbirthday', 'VARCHAR', true, 255, null);
        $this->addColumn('cnational', 'Cnational', 'VARCHAR', true, 255, null);
        $this->addColumn('cid_tax', 'CidTax', 'VARCHAR', true, 255, null);
        $this->addColumn('cid_card', 'CidCard', 'VARCHAR', true, 255, null);
        $this->addColumn('caddress', 'Caddress', 'LONGVARCHAR', true, null, null);
        $this->addColumn('cbuilding', 'Cbuilding', 'VARCHAR', true, 255, null);
        $this->addColumn('cvillage', 'Cvillage', 'VARCHAR', true, 255, null);
        $this->addColumn('cstreet', 'Cstreet', 'VARCHAR', true, 255, null);
        $this->addColumn('csoi', 'Csoi', 'VARCHAR', true, 255, null);
        $this->addColumn('czip', 'Czip', 'VARCHAR', true, 255, null);
        $this->addColumn('chome_t', 'ChomeT', 'VARCHAR', true, 255, null);
        $this->addColumn('coffice_t', 'CofficeT', 'VARCHAR', true, 255, null);
        $this->addColumn('cmobile', 'Cmobile', 'VARCHAR', true, 255, null);
        $this->addColumn('cfax', 'Cfax', 'VARCHAR', true, 255, null);
        $this->addColumn('csex', 'Csex', 'VARCHAR', true, 255, null);
        $this->addColumn('cemail', 'Cemail', 'VARCHAR', true, 255, null);
        $this->addColumn('cdistrictId', 'Cdistrictid', 'VARCHAR', true, 255, null);
        $this->addColumn('camphurId', 'Camphurid', 'VARCHAR', true, 255, null);
        $this->addColumn('cprovinceId', 'Cprovinceid', 'VARCHAR', true, 255, null);
        $this->addColumn('iname_f', 'InameF', 'VARCHAR', true, 255, null);
        $this->addColumn('iname_t', 'InameT', 'VARCHAR', true, 255, null);
        $this->addColumn('irelation', 'Irelation', 'VARCHAR', true, 255, null);
        $this->addColumn('iphone', 'Iphone', 'VARCHAR', true, 255, null);
        $this->addColumn('iid_card', 'IidCard', 'VARCHAR', true, 255, null);
        $this->addColumn('status_doc', 'StatusDoc', 'INTEGER', true, null, null);
        $this->addColumn('status_expire', 'StatusExpire', 'INTEGER', true, null, null);
        $this->addColumn('status_terminate', 'StatusTerminate', 'INTEGER', true, null, null);
        $this->addColumn('terminate_date', 'TerminateDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('status_suspend', 'StatusSuspend', 'INTEGER', true, null, null);
        $this->addColumn('suspend_date', 'SuspendDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('status_blacklist', 'StatusBlacklist', 'INTEGER', true, null, null);
        $this->addColumn('status_ato', 'StatusAto', 'INTEGER', true, null, null);
        $this->addColumn('sletter', 'Sletter', 'INTEGER', true, null, null);
        $this->addColumn('sinv_code', 'SinvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('txtoption', 'Txtoption', 'LONGVARCHAR', true, null, null);
        $this->addColumn('setregis', 'Setregis', 'INTEGER', true, null, 0);
        $this->addColumn('slr', 'Slr', 'VARCHAR', true, 11, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('cid_mobile', 'CidMobile', 'VARCHAR', true, 255, null);
        $this->addColumn('bewallet', 'Bewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('bvoucher', 'Bvoucher', 'DECIMAL', true, 15, null);
        $this->addColumn('voucher', 'Voucher', 'DECIMAL', true, 15, null);
        $this->addColumn('manager', 'Manager', 'VARCHAR', true, 255, null);
        $this->addColumn('mtype', 'Mtype', 'INTEGER', true, null, null);
        $this->addColumn('mtype1', 'Mtype1', 'INTEGER', true, 2, null);
        $this->addColumn('mtype2', 'Mtype2', 'INTEGER', true, 2, null);
        $this->addColumn('mvat', 'Mvat', 'INTEGER', true, null, null);
        $this->addColumn('uidbase', 'Uidbase', 'VARCHAR', true, 255, null);
        $this->addColumn('exp_date', 'ExpDate', 'DATE', true, null, null);
        $this->addColumn('head_code', 'HeadCode', 'VARCHAR', true, 255, null);
        $this->addColumn('pv_l', 'PvL', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_c', 'PvC', 'DECIMAL', true, 15, null);
        $this->addColumn('hpv_l', 'HpvL', 'DECIMAL', true, 15, null);
        $this->addColumn('hpv_c', 'HpvC', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_l_nextmonth', 'PvLNextmonth', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_c_nextmonth', 'PvCNextmonth', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_l_lastmonth1', 'PvLLastmonth1', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_c_lastmonth1', 'PvCLastmonth1', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_l_lastmonth2', 'PvLLastmonth2', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_c_lastmonth2', 'PvCLastmonth2', 'DECIMAL', true, 15, null);
        $this->addColumn('rcode_star', 'RcodeStar', 'INTEGER', true, null, null);
        $this->addColumn('bunit', 'Bunit', 'INTEGER', true, null, null);
        $this->addColumn('province', 'Province', 'VARCHAR', true, 11, null);
        $this->addColumn('line_id', 'LineId', 'VARCHAR', true, 255, null);
        $this->addColumn('facebook_name', 'FacebookName', 'VARCHAR', true, 255, null);
        $this->addColumn('type_com', 'TypeCom', 'INTEGER', true, null, null);
        $this->addColumn('exp_pos', 'ExpPos', 'DATE', true, null, null);
        $this->addColumn('exp_pos_60', 'ExpPos60', 'DATE', true, null, null);
        $this->addColumn('trip_private', 'TripPrivate', 'DECIMAL', true, 15, null);
        $this->addColumn('trip_team', 'TripTeam', 'DECIMAL', true, 15, null);
        $this->addColumn('myfile1', 'Myfile1', 'VARCHAR', true, 255, null);
        $this->addColumn('myfile2', 'Myfile2', 'VARCHAR', true, 255, null);
        $this->addColumn('cline_id', 'ClineId', 'VARCHAR', true, 255, null);
        $this->addColumn('cfacebook_name', 'CfacebookName', 'VARCHAR', true, 255, null);
        $this->addColumn('profile_img', 'ProfileImg', 'VARCHAR', true, 255, null);
        $this->addColumn('atocom', 'Atocom', 'INTEGER', true, null, null);
        $this->addColumn('hpv', 'Hpv', 'DECIMAL', true, 15, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AliMemberTableMap::CLASS_DEFAULT : AliMemberTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (AliMember object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliMemberTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliMemberTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliMemberTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliMemberTableMap::OM_CLASS;
            /** @var AliMember $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliMemberTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AliMemberTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliMemberTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliMember $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliMemberTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AliMemberTableMap::COL_ID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliMemberTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliMemberTableMap::COL_NAME_E);
            $criteria->addSelectColumn(AliMemberTableMap::COL_POSID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BIRTHDAY);
            $criteria->addSelectColumn(AliMemberTableMap::COL_NATIONAL);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ID_TAX);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ID_CARD);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ID_CARD_IMG);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ID_CARD_IMG_DATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ZIP);
            $criteria->addSelectColumn(AliMemberTableMap::COL_HOME_T);
            $criteria->addSelectColumn(AliMemberTableMap::COL_OFFICE_T);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MOBILE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MCODE_ACC);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BONUSREC);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BANKCODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BRANCH);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ACC_TYPE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ACC_NO);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ACC_NO_IMG);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ACC_NO_IMG_DATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ACC_NAME);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ACC_PROV);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SV_CODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SP_NAME);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SP_CODE2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SP_NAME2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_UPA_NAME);
            $criteria->addSelectColumn(AliMemberTableMap::COL_LR);
            $criteria->addSelectColumn(AliMemberTableMap::COL_COMPLETE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_COMPDATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MODATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_NAME_B);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SEX);
            $criteria->addSelectColumn(AliMemberTableMap::COL_AGE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_OCCUPATION);
            $criteria->addSelectColumn(AliMemberTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MAR_NAME);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MAR_AGE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_EMAIL);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BENEFICIARIES);
            $criteria->addSelectColumn(AliMemberTableMap::COL_RELATION);
            $criteria->addSelectColumn(AliMemberTableMap::COL_DISTRICTID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_AMPHURID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PROVINCEID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_FAX);
            $criteria->addSelectColumn(AliMemberTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_UID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_OID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliMemberTableMap::COL_POS_CUR1);
            $criteria->addSelectColumn(AliMemberTableMap::COL_POS_CUR2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_POS_CUR3);
            $criteria->addSelectColumn(AliMemberTableMap::COL_POS_CUR4);
            $criteria->addSelectColumn(AliMemberTableMap::COL_POS_CUR_TMP);
            $criteria->addSelectColumn(AliMemberTableMap::COL_RPOS_CUR4);
            $criteria->addSelectColumn(AliMemberTableMap::COL_POS_CUR3_DATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MEMDESC);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CMP);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CMP2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CMP3);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CCMP);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CCMP2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CCMP3);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(AliMemberTableMap::COL_STREET);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BUILDING);
            $criteria->addSelectColumn(AliMemberTableMap::COL_VILLAGE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SOI);
            $criteria->addSelectColumn(AliMemberTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliMemberTableMap::COL_EATOSHIP);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ECOM);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BMDATE1);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BMDATE2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BMDATE3);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CBMDATE1);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CBMDATE2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CBMDATE3);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ONLINE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CNAME_F);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CNAME_T);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CNAME_E);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CNAME_B);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CBIRTHDAY);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CNATIONAL);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CID_TAX);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CID_CARD);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CBUILDING);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CVILLAGE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CSTREET);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CSOI);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CZIP);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CHOME_T);
            $criteria->addSelectColumn(AliMemberTableMap::COL_COFFICE_T);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CMOBILE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CFAX);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CSEX);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CEMAIL);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CDISTRICTID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CAMPHURID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CPROVINCEID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_INAME_F);
            $criteria->addSelectColumn(AliMemberTableMap::COL_INAME_T);
            $criteria->addSelectColumn(AliMemberTableMap::COL_IRELATION);
            $criteria->addSelectColumn(AliMemberTableMap::COL_IPHONE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_IID_CARD);
            $criteria->addSelectColumn(AliMemberTableMap::COL_STATUS_DOC);
            $criteria->addSelectColumn(AliMemberTableMap::COL_STATUS_EXPIRE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_STATUS_TERMINATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_TERMINATE_DATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_STATUS_SUSPEND);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SUSPEND_DATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_STATUS_BLACKLIST);
            $criteria->addSelectColumn(AliMemberTableMap::COL_STATUS_ATO);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SLETTER);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SINV_CODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SETREGIS);
            $criteria->addSelectColumn(AliMemberTableMap::COL_SLR);
            $criteria->addSelectColumn(AliMemberTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CID_MOBILE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BEWALLET);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BVOUCHER);
            $criteria->addSelectColumn(AliMemberTableMap::COL_VOUCHER);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MANAGER);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MTYPE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MTYPE1);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MTYPE2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MVAT);
            $criteria->addSelectColumn(AliMemberTableMap::COL_UIDBASE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_EXP_DATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_HEAD_CODE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PV_L);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PV_C);
            $criteria->addSelectColumn(AliMemberTableMap::COL_HPV_L);
            $criteria->addSelectColumn(AliMemberTableMap::COL_HPV_C);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PV_L_NEXTMONTH);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PV_C_NEXTMONTH);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PV_L_LASTMONTH1);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PV_C_LASTMONTH1);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PV_L_LASTMONTH2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PV_C_LASTMONTH2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_RCODE_STAR);
            $criteria->addSelectColumn(AliMemberTableMap::COL_BUNIT);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PROVINCE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_LINE_ID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_FACEBOOK_NAME);
            $criteria->addSelectColumn(AliMemberTableMap::COL_TYPE_COM);
            $criteria->addSelectColumn(AliMemberTableMap::COL_EXP_POS);
            $criteria->addSelectColumn(AliMemberTableMap::COL_EXP_POS_60);
            $criteria->addSelectColumn(AliMemberTableMap::COL_TRIP_PRIVATE);
            $criteria->addSelectColumn(AliMemberTableMap::COL_TRIP_TEAM);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MYFILE1);
            $criteria->addSelectColumn(AliMemberTableMap::COL_MYFILE2);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CLINE_ID);
            $criteria->addSelectColumn(AliMemberTableMap::COL_CFACEBOOK_NAME);
            $criteria->addSelectColumn(AliMemberTableMap::COL_PROFILE_IMG);
            $criteria->addSelectColumn(AliMemberTableMap::COL_ATOCOM);
            $criteria->addSelectColumn(AliMemberTableMap::COL_HPV);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.name_e');
            $criteria->addSelectColumn($alias . '.posid');
            $criteria->addSelectColumn($alias . '.mdate');
            $criteria->addSelectColumn($alias . '.birthday');
            $criteria->addSelectColumn($alias . '.national');
            $criteria->addSelectColumn($alias . '.id_tax');
            $criteria->addSelectColumn($alias . '.id_card');
            $criteria->addSelectColumn($alias . '.id_card_img');
            $criteria->addSelectColumn($alias . '.id_card_img_date');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.home_t');
            $criteria->addSelectColumn($alias . '.office_t');
            $criteria->addSelectColumn($alias . '.mobile');
            $criteria->addSelectColumn($alias . '.mcode_acc');
            $criteria->addSelectColumn($alias . '.bonusrec');
            $criteria->addSelectColumn($alias . '.bankcode');
            $criteria->addSelectColumn($alias . '.branch');
            $criteria->addSelectColumn($alias . '.acc_type');
            $criteria->addSelectColumn($alias . '.acc_no');
            $criteria->addSelectColumn($alias . '.acc_no_img');
            $criteria->addSelectColumn($alias . '.acc_no_img_date');
            $criteria->addSelectColumn($alias . '.acc_name');
            $criteria->addSelectColumn($alias . '.acc_prov');
            $criteria->addSelectColumn($alias . '.sv_code');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.sp_name');
            $criteria->addSelectColumn($alias . '.sp_code2');
            $criteria->addSelectColumn($alias . '.sp_name2');
            $criteria->addSelectColumn($alias . '.upa_code');
            $criteria->addSelectColumn($alias . '.upa_name');
            $criteria->addSelectColumn($alias . '.lr');
            $criteria->addSelectColumn($alias . '.complete');
            $criteria->addSelectColumn($alias . '.compdate');
            $criteria->addSelectColumn($alias . '.modate');
            $criteria->addSelectColumn($alias . '.usercode');
            $criteria->addSelectColumn($alias . '.name_b');
            $criteria->addSelectColumn($alias . '.sex');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.occupation');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.mar_name');
            $criteria->addSelectColumn($alias . '.mar_age');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.beneficiaries');
            $criteria->addSelectColumn($alias . '.relation');
            $criteria->addSelectColumn($alias . '.districtId');
            $criteria->addSelectColumn($alias . '.amphurId');
            $criteria->addSelectColumn($alias . '.provinceId');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.oid');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.pos_cur1');
            $criteria->addSelectColumn($alias . '.pos_cur2');
            $criteria->addSelectColumn($alias . '.pos_cur3');
            $criteria->addSelectColumn($alias . '.pos_cur4');
            $criteria->addSelectColumn($alias . '.pos_cur_tmp');
            $criteria->addSelectColumn($alias . '.rpos_cur4');
            $criteria->addSelectColumn($alias . '.pos_cur3_date');
            $criteria->addSelectColumn($alias . '.memdesc');
            $criteria->addSelectColumn($alias . '.cmp');
            $criteria->addSelectColumn($alias . '.cmp2');
            $criteria->addSelectColumn($alias . '.cmp3');
            $criteria->addSelectColumn($alias . '.ccmp');
            $criteria->addSelectColumn($alias . '.ccmp2');
            $criteria->addSelectColumn($alias . '.ccmp3');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.street');
            $criteria->addSelectColumn($alias . '.building');
            $criteria->addSelectColumn($alias . '.village');
            $criteria->addSelectColumn($alias . '.soi');
            $criteria->addSelectColumn($alias . '.ewallet');
            $criteria->addSelectColumn($alias . '.eatoship');
            $criteria->addSelectColumn($alias . '.ecom');
            $criteria->addSelectColumn($alias . '.bmdate1');
            $criteria->addSelectColumn($alias . '.bmdate2');
            $criteria->addSelectColumn($alias . '.bmdate3');
            $criteria->addSelectColumn($alias . '.cbmdate1');
            $criteria->addSelectColumn($alias . '.cbmdate2');
            $criteria->addSelectColumn($alias . '.cbmdate3');
            $criteria->addSelectColumn($alias . '.online');
            $criteria->addSelectColumn($alias . '.cname_f');
            $criteria->addSelectColumn($alias . '.cname_t');
            $criteria->addSelectColumn($alias . '.cname_e');
            $criteria->addSelectColumn($alias . '.cname_b');
            $criteria->addSelectColumn($alias . '.cbirthday');
            $criteria->addSelectColumn($alias . '.cnational');
            $criteria->addSelectColumn($alias . '.cid_tax');
            $criteria->addSelectColumn($alias . '.cid_card');
            $criteria->addSelectColumn($alias . '.caddress');
            $criteria->addSelectColumn($alias . '.cbuilding');
            $criteria->addSelectColumn($alias . '.cvillage');
            $criteria->addSelectColumn($alias . '.cstreet');
            $criteria->addSelectColumn($alias . '.csoi');
            $criteria->addSelectColumn($alias . '.czip');
            $criteria->addSelectColumn($alias . '.chome_t');
            $criteria->addSelectColumn($alias . '.coffice_t');
            $criteria->addSelectColumn($alias . '.cmobile');
            $criteria->addSelectColumn($alias . '.cfax');
            $criteria->addSelectColumn($alias . '.csex');
            $criteria->addSelectColumn($alias . '.cemail');
            $criteria->addSelectColumn($alias . '.cdistrictId');
            $criteria->addSelectColumn($alias . '.camphurId');
            $criteria->addSelectColumn($alias . '.cprovinceId');
            $criteria->addSelectColumn($alias . '.iname_f');
            $criteria->addSelectColumn($alias . '.iname_t');
            $criteria->addSelectColumn($alias . '.irelation');
            $criteria->addSelectColumn($alias . '.iphone');
            $criteria->addSelectColumn($alias . '.iid_card');
            $criteria->addSelectColumn($alias . '.status_doc');
            $criteria->addSelectColumn($alias . '.status_expire');
            $criteria->addSelectColumn($alias . '.status_terminate');
            $criteria->addSelectColumn($alias . '.terminate_date');
            $criteria->addSelectColumn($alias . '.status_suspend');
            $criteria->addSelectColumn($alias . '.suspend_date');
            $criteria->addSelectColumn($alias . '.status_blacklist');
            $criteria->addSelectColumn($alias . '.status_ato');
            $criteria->addSelectColumn($alias . '.sletter');
            $criteria->addSelectColumn($alias . '.sinv_code');
            $criteria->addSelectColumn($alias . '.txtoption');
            $criteria->addSelectColumn($alias . '.setregis');
            $criteria->addSelectColumn($alias . '.slr');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.cid_mobile');
            $criteria->addSelectColumn($alias . '.bewallet');
            $criteria->addSelectColumn($alias . '.bvoucher');
            $criteria->addSelectColumn($alias . '.voucher');
            $criteria->addSelectColumn($alias . '.manager');
            $criteria->addSelectColumn($alias . '.mtype');
            $criteria->addSelectColumn($alias . '.mtype1');
            $criteria->addSelectColumn($alias . '.mtype2');
            $criteria->addSelectColumn($alias . '.mvat');
            $criteria->addSelectColumn($alias . '.uidbase');
            $criteria->addSelectColumn($alias . '.exp_date');
            $criteria->addSelectColumn($alias . '.head_code');
            $criteria->addSelectColumn($alias . '.pv_l');
            $criteria->addSelectColumn($alias . '.pv_c');
            $criteria->addSelectColumn($alias . '.hpv_l');
            $criteria->addSelectColumn($alias . '.hpv_c');
            $criteria->addSelectColumn($alias . '.pv_l_nextmonth');
            $criteria->addSelectColumn($alias . '.pv_c_nextmonth');
            $criteria->addSelectColumn($alias . '.pv_l_lastmonth1');
            $criteria->addSelectColumn($alias . '.pv_c_lastmonth1');
            $criteria->addSelectColumn($alias . '.pv_l_lastmonth2');
            $criteria->addSelectColumn($alias . '.pv_c_lastmonth2');
            $criteria->addSelectColumn($alias . '.rcode_star');
            $criteria->addSelectColumn($alias . '.bunit');
            $criteria->addSelectColumn($alias . '.province');
            $criteria->addSelectColumn($alias . '.line_id');
            $criteria->addSelectColumn($alias . '.facebook_name');
            $criteria->addSelectColumn($alias . '.type_com');
            $criteria->addSelectColumn($alias . '.exp_pos');
            $criteria->addSelectColumn($alias . '.exp_pos_60');
            $criteria->addSelectColumn($alias . '.trip_private');
            $criteria->addSelectColumn($alias . '.trip_team');
            $criteria->addSelectColumn($alias . '.myfile1');
            $criteria->addSelectColumn($alias . '.myfile2');
            $criteria->addSelectColumn($alias . '.cline_id');
            $criteria->addSelectColumn($alias . '.cfacebook_name');
            $criteria->addSelectColumn($alias . '.profile_img');
            $criteria->addSelectColumn($alias . '.atocom');
            $criteria->addSelectColumn($alias . '.hpv');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(AliMemberTableMap::DATABASE_NAME)->getTable(AliMemberTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliMemberTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliMemberTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliMemberTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliMember or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliMember object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliMember) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliMemberTableMap::DATABASE_NAME);
            $criteria->add(AliMemberTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliMemberQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliMemberTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliMemberTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_member table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliMemberQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliMember or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliMember object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliMember object
        }

        if ($criteria->containsKey(AliMemberTableMap::COL_ID) && $criteria->keyContainsValue(AliMemberTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliMemberTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliMemberQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliMemberTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliMemberTableMap::buildTableMap();
