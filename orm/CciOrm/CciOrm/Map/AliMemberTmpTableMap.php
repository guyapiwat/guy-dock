<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliMemberTmp;
use CciOrm\CciOrm\AliMemberTmpQuery;
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
 * This class defines the structure of the 'ali_member_tmp' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliMemberTmpTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliMemberTmpTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_member_tmp';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliMemberTmp';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliMemberTmp';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 131;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 131;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_member_tmp.id';

    /**
     * the column name for the transtype field
     */
    const COL_TRANSTYPE = 'ali_member_tmp.transtype';

    /**
     * the column name for the paytype field
     */
    const COL_PAYTYPE = 'ali_member_tmp.paytype';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_member_tmp.paydate';

    /**
     * the column name for the credittype field
     */
    const COL_CREDITTYPE = 'ali_member_tmp.credittype';

    /**
     * the column name for the sendtype field
     */
    const COL_SENDTYPE = 'ali_member_tmp.sendtype';

    /**
     * the column name for the cstreet field
     */
    const COL_CSTREET = 'ali_member_tmp.cstreet';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_member_tmp.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_member_tmp.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_member_tmp.name_t';

    /**
     * the column name for the name_e field
     */
    const COL_NAME_E = 'ali_member_tmp.name_e';

    /**
     * the column name for the posid field
     */
    const COL_POSID = 'ali_member_tmp.posid';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_member_tmp.mdate';

    /**
     * the column name for the birthday field
     */
    const COL_BIRTHDAY = 'ali_member_tmp.birthday';

    /**
     * the column name for the national field
     */
    const COL_NATIONAL = 'ali_member_tmp.national';

    /**
     * the column name for the id_tax field
     */
    const COL_ID_TAX = 'ali_member_tmp.id_tax';

    /**
     * the column name for the id_card field
     */
    const COL_ID_CARD = 'ali_member_tmp.id_card';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'ali_member_tmp.zip';

    /**
     * the column name for the home_t field
     */
    const COL_HOME_T = 'ali_member_tmp.home_t';

    /**
     * the column name for the office_t field
     */
    const COL_OFFICE_T = 'ali_member_tmp.office_t';

    /**
     * the column name for the mobile field
     */
    const COL_MOBILE = 'ali_member_tmp.mobile';

    /**
     * the column name for the mcode_acc field
     */
    const COL_MCODE_ACC = 'ali_member_tmp.mcode_acc';

    /**
     * the column name for the bonusrec field
     */
    const COL_BONUSREC = 'ali_member_tmp.bonusrec';

    /**
     * the column name for the bankcode field
     */
    const COL_BANKCODE = 'ali_member_tmp.bankcode';

    /**
     * the column name for the branch field
     */
    const COL_BRANCH = 'ali_member_tmp.branch';

    /**
     * the column name for the acc_type field
     */
    const COL_ACC_TYPE = 'ali_member_tmp.acc_type';

    /**
     * the column name for the acc_no field
     */
    const COL_ACC_NO = 'ali_member_tmp.acc_no';

    /**
     * the column name for the acc_name field
     */
    const COL_ACC_NAME = 'ali_member_tmp.acc_name';

    /**
     * the column name for the acc_prov field
     */
    const COL_ACC_PROV = 'ali_member_tmp.acc_prov';

    /**
     * the column name for the sv_code field
     */
    const COL_SV_CODE = 'ali_member_tmp.sv_code';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_member_tmp.sp_code';

    /**
     * the column name for the sp_name field
     */
    const COL_SP_NAME = 'ali_member_tmp.sp_name';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_member_tmp.upa_code';

    /**
     * the column name for the upa_name field
     */
    const COL_UPA_NAME = 'ali_member_tmp.upa_name';

    /**
     * the column name for the lr field
     */
    const COL_LR = 'ali_member_tmp.lr';

    /**
     * the column name for the complete field
     */
    const COL_COMPLETE = 'ali_member_tmp.complete';

    /**
     * the column name for the compdate field
     */
    const COL_COMPDATE = 'ali_member_tmp.compdate';

    /**
     * the column name for the modate field
     */
    const COL_MODATE = 'ali_member_tmp.modate';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_member_tmp.usercode';

    /**
     * the column name for the name_b field
     */
    const COL_NAME_B = 'ali_member_tmp.name_b';

    /**
     * the column name for the sex field
     */
    const COL_SEX = 'ali_member_tmp.sex';

    /**
     * the column name for the age field
     */
    const COL_AGE = 'ali_member_tmp.age';

    /**
     * the column name for the occupation field
     */
    const COL_OCCUPATION = 'ali_member_tmp.occupation';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_member_tmp.status';

    /**
     * the column name for the mar_name field
     */
    const COL_MAR_NAME = 'ali_member_tmp.mar_name';

    /**
     * the column name for the mar_age field
     */
    const COL_MAR_AGE = 'ali_member_tmp.mar_age';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'ali_member_tmp.email';

    /**
     * the column name for the beneficiaries field
     */
    const COL_BENEFICIARIES = 'ali_member_tmp.beneficiaries';

    /**
     * the column name for the relation field
     */
    const COL_RELATION = 'ali_member_tmp.relation';

    /**
     * the column name for the districtId field
     */
    const COL_DISTRICTID = 'ali_member_tmp.districtId';

    /**
     * the column name for the amphurId field
     */
    const COL_AMPHURID = 'ali_member_tmp.amphurId';

    /**
     * the column name for the provinceId field
     */
    const COL_PROVINCEID = 'ali_member_tmp.provinceId';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'ali_member_tmp.fax';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_member_tmp.inv_code';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_member_tmp.uid';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_member_tmp.pos_cur';

    /**
     * the column name for the pos_cur1 field
     */
    const COL_POS_CUR1 = 'ali_member_tmp.pos_cur1';

    /**
     * the column name for the pos_cur2 field
     */
    const COL_POS_CUR2 = 'ali_member_tmp.pos_cur2';

    /**
     * the column name for the pos_cur3 field
     */
    const COL_POS_CUR3 = 'ali_member_tmp.pos_cur3';

    /**
     * the column name for the pos_cur4 field
     */
    const COL_POS_CUR4 = 'ali_member_tmp.pos_cur4';

    /**
     * the column name for the rpos_cur4 field
     */
    const COL_RPOS_CUR4 = 'ali_member_tmp.rpos_cur4';

    /**
     * the column name for the memdesc field
     */
    const COL_MEMDESC = 'ali_member_tmp.memdesc';

    /**
     * the column name for the cmp field
     */
    const COL_CMP = 'ali_member_tmp.cmp';

    /**
     * the column name for the cmp2 field
     */
    const COL_CMP2 = 'ali_member_tmp.cmp2';

    /**
     * the column name for the cmp3 field
     */
    const COL_CMP3 = 'ali_member_tmp.cmp3';

    /**
     * the column name for the ccmp field
     */
    const COL_CCMP = 'ali_member_tmp.ccmp';

    /**
     * the column name for the ccmp2 field
     */
    const COL_CCMP2 = 'ali_member_tmp.ccmp2';

    /**
     * the column name for the ccmp3 field
     */
    const COL_CCMP3 = 'ali_member_tmp.ccmp3';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'ali_member_tmp.address';

    /**
     * the column name for the street field
     */
    const COL_STREET = 'ali_member_tmp.street';

    /**
     * the column name for the building field
     */
    const COL_BUILDING = 'ali_member_tmp.building';

    /**
     * the column name for the village field
     */
    const COL_VILLAGE = 'ali_member_tmp.village';

    /**
     * the column name for the soi field
     */
    const COL_SOI = 'ali_member_tmp.soi';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_member_tmp.ewallet';

    /**
     * the column name for the bmdate1 field
     */
    const COL_BMDATE1 = 'ali_member_tmp.bmdate1';

    /**
     * the column name for the bmdate2 field
     */
    const COL_BMDATE2 = 'ali_member_tmp.bmdate2';

    /**
     * the column name for the bmdate3 field
     */
    const COL_BMDATE3 = 'ali_member_tmp.bmdate3';

    /**
     * the column name for the cbmdate1 field
     */
    const COL_CBMDATE1 = 'ali_member_tmp.cbmdate1';

    /**
     * the column name for the cbmdate2 field
     */
    const COL_CBMDATE2 = 'ali_member_tmp.cbmdate2';

    /**
     * the column name for the cbmdate3 field
     */
    const COL_CBMDATE3 = 'ali_member_tmp.cbmdate3';

    /**
     * the column name for the online field
     */
    const COL_ONLINE = 'ali_member_tmp.online';

    /**
     * the column name for the cname_f field
     */
    const COL_CNAME_F = 'ali_member_tmp.cname_f';

    /**
     * the column name for the cname_t field
     */
    const COL_CNAME_T = 'ali_member_tmp.cname_t';

    /**
     * the column name for the cname_e field
     */
    const COL_CNAME_E = 'ali_member_tmp.cname_e';

    /**
     * the column name for the cname_b field
     */
    const COL_CNAME_B = 'ali_member_tmp.cname_b';

    /**
     * the column name for the cbirthday field
     */
    const COL_CBIRTHDAY = 'ali_member_tmp.cbirthday';

    /**
     * the column name for the cnational field
     */
    const COL_CNATIONAL = 'ali_member_tmp.cnational';

    /**
     * the column name for the cid_tax field
     */
    const COL_CID_TAX = 'ali_member_tmp.cid_tax';

    /**
     * the column name for the cid_card field
     */
    const COL_CID_CARD = 'ali_member_tmp.cid_card';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'ali_member_tmp.caddress';

    /**
     * the column name for the cbuilding field
     */
    const COL_CBUILDING = 'ali_member_tmp.cbuilding';

    /**
     * the column name for the cvillage field
     */
    const COL_CVILLAGE = 'ali_member_tmp.cvillage';

    /**
     * the column name for the csoi field
     */
    const COL_CSOI = 'ali_member_tmp.csoi';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'ali_member_tmp.czip';

    /**
     * the column name for the chome_t field
     */
    const COL_CHOME_T = 'ali_member_tmp.chome_t';

    /**
     * the column name for the coffice_t field
     */
    const COL_COFFICE_T = 'ali_member_tmp.coffice_t';

    /**
     * the column name for the cmobile field
     */
    const COL_CMOBILE = 'ali_member_tmp.cmobile';

    /**
     * the column name for the cfax field
     */
    const COL_CFAX = 'ali_member_tmp.cfax';

    /**
     * the column name for the csex field
     */
    const COL_CSEX = 'ali_member_tmp.csex';

    /**
     * the column name for the cemail field
     */
    const COL_CEMAIL = 'ali_member_tmp.cemail';

    /**
     * the column name for the cdistrictId field
     */
    const COL_CDISTRICTID = 'ali_member_tmp.cdistrictId';

    /**
     * the column name for the camphurId field
     */
    const COL_CAMPHURID = 'ali_member_tmp.camphurId';

    /**
     * the column name for the cprovinceId field
     */
    const COL_CPROVINCEID = 'ali_member_tmp.cprovinceId';

    /**
     * the column name for the iname_f field
     */
    const COL_INAME_F = 'ali_member_tmp.iname_f';

    /**
     * the column name for the iname_t field
     */
    const COL_INAME_T = 'ali_member_tmp.iname_t';

    /**
     * the column name for the irelation field
     */
    const COL_IRELATION = 'ali_member_tmp.irelation';

    /**
     * the column name for the iphone field
     */
    const COL_IPHONE = 'ali_member_tmp.iphone';

    /**
     * the column name for the iid_card field
     */
    const COL_IID_CARD = 'ali_member_tmp.iid_card';

    /**
     * the column name for the status_doc field
     */
    const COL_STATUS_DOC = 'ali_member_tmp.status_doc';

    /**
     * the column name for the status_expire field
     */
    const COL_STATUS_EXPIRE = 'ali_member_tmp.status_expire';

    /**
     * the column name for the status_terminate field
     */
    const COL_STATUS_TERMINATE = 'ali_member_tmp.status_terminate';

    /**
     * the column name for the terminate_date field
     */
    const COL_TERMINATE_DATE = 'ali_member_tmp.terminate_date';

    /**
     * the column name for the status_suspend field
     */
    const COL_STATUS_SUSPEND = 'ali_member_tmp.status_suspend';

    /**
     * the column name for the suspend_date field
     */
    const COL_SUSPEND_DATE = 'ali_member_tmp.suspend_date';

    /**
     * the column name for the status_blacklist field
     */
    const COL_STATUS_BLACKLIST = 'ali_member_tmp.status_blacklist';

    /**
     * the column name for the status_ato field
     */
    const COL_STATUS_ATO = 'ali_member_tmp.status_ato';

    /**
     * the column name for the sletter field
     */
    const COL_SLETTER = 'ali_member_tmp.sletter';

    /**
     * the column name for the sinv_code field
     */
    const COL_SINV_CODE = 'ali_member_tmp.sinv_code';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_member_tmp.txtoption';

    /**
     * the column name for the mcode_ref field
     */
    const COL_MCODE_REF = 'ali_member_tmp.mcode_ref';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_member_tmp.cancel';

    /**
     * the column name for the sbook field
     */
    const COL_SBOOK = 'ali_member_tmp.sbook';

    /**
     * the column name for the sbinv_code field
     */
    const COL_SBINV_CODE = 'ali_member_tmp.sbinv_code';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_member_tmp.locationbase';

    /**
     * the column name for the cid_mobile field
     */
    const COL_CID_MOBILE = 'ali_member_tmp.cid_mobile';

    /**
     * the column name for the bewallet field
     */
    const COL_BEWALLET = 'ali_member_tmp.bewallet';

    /**
     * the column name for the bvoucher field
     */
    const COL_BVOUCHER = 'ali_member_tmp.bvoucher';

    /**
     * the column name for the voucher field
     */
    const COL_VOUCHER = 'ali_member_tmp.voucher';

    /**
     * the column name for the manager field
     */
    const COL_MANAGER = 'ali_member_tmp.manager';

    /**
     * the column name for the mtype field
     */
    const COL_MTYPE = 'ali_member_tmp.mtype';

    /**
     * the column name for the uidbase field
     */
    const COL_UIDBASE = 'ali_member_tmp.uidbase';

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
        self::TYPE_PHPNAME       => array('Id', 'Transtype', 'Paytype', 'Paydate', 'Credittype', 'Sendtype', 'Cstreet', 'Mcode', 'NameF', 'NameT', 'NameE', 'Posid', 'Mdate', 'Birthday', 'National', 'IdTax', 'IdCard', 'Zip', 'HomeT', 'OfficeT', 'Mobile', 'McodeAcc', 'Bonusrec', 'Bankcode', 'Branch', 'AccType', 'AccNo', 'AccName', 'AccProv', 'SvCode', 'SpCode', 'SpName', 'UpaCode', 'UpaName', 'Lr', 'Complete', 'Compdate', 'Modate', 'Usercode', 'NameB', 'Sex', 'Age', 'Occupation', 'Status', 'MarName', 'MarAge', 'Email', 'Beneficiaries', 'Relation', 'Districtid', 'Amphurid', 'Provinceid', 'Fax', 'InvCode', 'Uid', 'PosCur', 'PosCur1', 'PosCur2', 'PosCur3', 'PosCur4', 'RposCur4', 'Memdesc', 'Cmp', 'Cmp2', 'Cmp3', 'Ccmp', 'Ccmp2', 'Ccmp3', 'Address', 'Street', 'Building', 'Village', 'Soi', 'Ewallet', 'Bmdate1', 'Bmdate2', 'Bmdate3', 'Cbmdate1', 'Cbmdate2', 'Cbmdate3', 'Online', 'CnameF', 'CnameT', 'CnameE', 'CnameB', 'Cbirthday', 'Cnational', 'CidTax', 'CidCard', 'Caddress', 'Cbuilding', 'Cvillage', 'Csoi', 'Czip', 'ChomeT', 'CofficeT', 'Cmobile', 'Cfax', 'Csex', 'Cemail', 'Cdistrictid', 'Camphurid', 'Cprovinceid', 'InameF', 'InameT', 'Irelation', 'Iphone', 'IidCard', 'StatusDoc', 'StatusExpire', 'StatusTerminate', 'TerminateDate', 'StatusSuspend', 'SuspendDate', 'StatusBlacklist', 'StatusAto', 'Sletter', 'SinvCode', 'Txtoption', 'McodeRef', 'Cancel', 'Sbook', 'SbinvCode', 'Locationbase', 'CidMobile', 'Bewallet', 'Bvoucher', 'Voucher', 'Manager', 'Mtype', 'Uidbase', ),
        self::TYPE_CAMELNAME     => array('id', 'transtype', 'paytype', 'paydate', 'credittype', 'sendtype', 'cstreet', 'mcode', 'nameF', 'nameT', 'nameE', 'posid', 'mdate', 'birthday', 'national', 'idTax', 'idCard', 'zip', 'homeT', 'officeT', 'mobile', 'mcodeAcc', 'bonusrec', 'bankcode', 'branch', 'accType', 'accNo', 'accName', 'accProv', 'svCode', 'spCode', 'spName', 'upaCode', 'upaName', 'lr', 'complete', 'compdate', 'modate', 'usercode', 'nameB', 'sex', 'age', 'occupation', 'status', 'marName', 'marAge', 'email', 'beneficiaries', 'relation', 'districtid', 'amphurid', 'provinceid', 'fax', 'invCode', 'uid', 'posCur', 'posCur1', 'posCur2', 'posCur3', 'posCur4', 'rposCur4', 'memdesc', 'cmp', 'cmp2', 'cmp3', 'ccmp', 'ccmp2', 'ccmp3', 'address', 'street', 'building', 'village', 'soi', 'ewallet', 'bmdate1', 'bmdate2', 'bmdate3', 'cbmdate1', 'cbmdate2', 'cbmdate3', 'online', 'cnameF', 'cnameT', 'cnameE', 'cnameB', 'cbirthday', 'cnational', 'cidTax', 'cidCard', 'caddress', 'cbuilding', 'cvillage', 'csoi', 'czip', 'chomeT', 'cofficeT', 'cmobile', 'cfax', 'csex', 'cemail', 'cdistrictid', 'camphurid', 'cprovinceid', 'inameF', 'inameT', 'irelation', 'iphone', 'iidCard', 'statusDoc', 'statusExpire', 'statusTerminate', 'terminateDate', 'statusSuspend', 'suspendDate', 'statusBlacklist', 'statusAto', 'sletter', 'sinvCode', 'txtoption', 'mcodeRef', 'cancel', 'sbook', 'sbinvCode', 'locationbase', 'cidMobile', 'bewallet', 'bvoucher', 'voucher', 'manager', 'mtype', 'uidbase', ),
        self::TYPE_COLNAME       => array(AliMemberTmpTableMap::COL_ID, AliMemberTmpTableMap::COL_TRANSTYPE, AliMemberTmpTableMap::COL_PAYTYPE, AliMemberTmpTableMap::COL_PAYDATE, AliMemberTmpTableMap::COL_CREDITTYPE, AliMemberTmpTableMap::COL_SENDTYPE, AliMemberTmpTableMap::COL_CSTREET, AliMemberTmpTableMap::COL_MCODE, AliMemberTmpTableMap::COL_NAME_F, AliMemberTmpTableMap::COL_NAME_T, AliMemberTmpTableMap::COL_NAME_E, AliMemberTmpTableMap::COL_POSID, AliMemberTmpTableMap::COL_MDATE, AliMemberTmpTableMap::COL_BIRTHDAY, AliMemberTmpTableMap::COL_NATIONAL, AliMemberTmpTableMap::COL_ID_TAX, AliMemberTmpTableMap::COL_ID_CARD, AliMemberTmpTableMap::COL_ZIP, AliMemberTmpTableMap::COL_HOME_T, AliMemberTmpTableMap::COL_OFFICE_T, AliMemberTmpTableMap::COL_MOBILE, AliMemberTmpTableMap::COL_MCODE_ACC, AliMemberTmpTableMap::COL_BONUSREC, AliMemberTmpTableMap::COL_BANKCODE, AliMemberTmpTableMap::COL_BRANCH, AliMemberTmpTableMap::COL_ACC_TYPE, AliMemberTmpTableMap::COL_ACC_NO, AliMemberTmpTableMap::COL_ACC_NAME, AliMemberTmpTableMap::COL_ACC_PROV, AliMemberTmpTableMap::COL_SV_CODE, AliMemberTmpTableMap::COL_SP_CODE, AliMemberTmpTableMap::COL_SP_NAME, AliMemberTmpTableMap::COL_UPA_CODE, AliMemberTmpTableMap::COL_UPA_NAME, AliMemberTmpTableMap::COL_LR, AliMemberTmpTableMap::COL_COMPLETE, AliMemberTmpTableMap::COL_COMPDATE, AliMemberTmpTableMap::COL_MODATE, AliMemberTmpTableMap::COL_USERCODE, AliMemberTmpTableMap::COL_NAME_B, AliMemberTmpTableMap::COL_SEX, AliMemberTmpTableMap::COL_AGE, AliMemberTmpTableMap::COL_OCCUPATION, AliMemberTmpTableMap::COL_STATUS, AliMemberTmpTableMap::COL_MAR_NAME, AliMemberTmpTableMap::COL_MAR_AGE, AliMemberTmpTableMap::COL_EMAIL, AliMemberTmpTableMap::COL_BENEFICIARIES, AliMemberTmpTableMap::COL_RELATION, AliMemberTmpTableMap::COL_DISTRICTID, AliMemberTmpTableMap::COL_AMPHURID, AliMemberTmpTableMap::COL_PROVINCEID, AliMemberTmpTableMap::COL_FAX, AliMemberTmpTableMap::COL_INV_CODE, AliMemberTmpTableMap::COL_UID, AliMemberTmpTableMap::COL_POS_CUR, AliMemberTmpTableMap::COL_POS_CUR1, AliMemberTmpTableMap::COL_POS_CUR2, AliMemberTmpTableMap::COL_POS_CUR3, AliMemberTmpTableMap::COL_POS_CUR4, AliMemberTmpTableMap::COL_RPOS_CUR4, AliMemberTmpTableMap::COL_MEMDESC, AliMemberTmpTableMap::COL_CMP, AliMemberTmpTableMap::COL_CMP2, AliMemberTmpTableMap::COL_CMP3, AliMemberTmpTableMap::COL_CCMP, AliMemberTmpTableMap::COL_CCMP2, AliMemberTmpTableMap::COL_CCMP3, AliMemberTmpTableMap::COL_ADDRESS, AliMemberTmpTableMap::COL_STREET, AliMemberTmpTableMap::COL_BUILDING, AliMemberTmpTableMap::COL_VILLAGE, AliMemberTmpTableMap::COL_SOI, AliMemberTmpTableMap::COL_EWALLET, AliMemberTmpTableMap::COL_BMDATE1, AliMemberTmpTableMap::COL_BMDATE2, AliMemberTmpTableMap::COL_BMDATE3, AliMemberTmpTableMap::COL_CBMDATE1, AliMemberTmpTableMap::COL_CBMDATE2, AliMemberTmpTableMap::COL_CBMDATE3, AliMemberTmpTableMap::COL_ONLINE, AliMemberTmpTableMap::COL_CNAME_F, AliMemberTmpTableMap::COL_CNAME_T, AliMemberTmpTableMap::COL_CNAME_E, AliMemberTmpTableMap::COL_CNAME_B, AliMemberTmpTableMap::COL_CBIRTHDAY, AliMemberTmpTableMap::COL_CNATIONAL, AliMemberTmpTableMap::COL_CID_TAX, AliMemberTmpTableMap::COL_CID_CARD, AliMemberTmpTableMap::COL_CADDRESS, AliMemberTmpTableMap::COL_CBUILDING, AliMemberTmpTableMap::COL_CVILLAGE, AliMemberTmpTableMap::COL_CSOI, AliMemberTmpTableMap::COL_CZIP, AliMemberTmpTableMap::COL_CHOME_T, AliMemberTmpTableMap::COL_COFFICE_T, AliMemberTmpTableMap::COL_CMOBILE, AliMemberTmpTableMap::COL_CFAX, AliMemberTmpTableMap::COL_CSEX, AliMemberTmpTableMap::COL_CEMAIL, AliMemberTmpTableMap::COL_CDISTRICTID, AliMemberTmpTableMap::COL_CAMPHURID, AliMemberTmpTableMap::COL_CPROVINCEID, AliMemberTmpTableMap::COL_INAME_F, AliMemberTmpTableMap::COL_INAME_T, AliMemberTmpTableMap::COL_IRELATION, AliMemberTmpTableMap::COL_IPHONE, AliMemberTmpTableMap::COL_IID_CARD, AliMemberTmpTableMap::COL_STATUS_DOC, AliMemberTmpTableMap::COL_STATUS_EXPIRE, AliMemberTmpTableMap::COL_STATUS_TERMINATE, AliMemberTmpTableMap::COL_TERMINATE_DATE, AliMemberTmpTableMap::COL_STATUS_SUSPEND, AliMemberTmpTableMap::COL_SUSPEND_DATE, AliMemberTmpTableMap::COL_STATUS_BLACKLIST, AliMemberTmpTableMap::COL_STATUS_ATO, AliMemberTmpTableMap::COL_SLETTER, AliMemberTmpTableMap::COL_SINV_CODE, AliMemberTmpTableMap::COL_TXTOPTION, AliMemberTmpTableMap::COL_MCODE_REF, AliMemberTmpTableMap::COL_CANCEL, AliMemberTmpTableMap::COL_SBOOK, AliMemberTmpTableMap::COL_SBINV_CODE, AliMemberTmpTableMap::COL_LOCATIONBASE, AliMemberTmpTableMap::COL_CID_MOBILE, AliMemberTmpTableMap::COL_BEWALLET, AliMemberTmpTableMap::COL_BVOUCHER, AliMemberTmpTableMap::COL_VOUCHER, AliMemberTmpTableMap::COL_MANAGER, AliMemberTmpTableMap::COL_MTYPE, AliMemberTmpTableMap::COL_UIDBASE, ),
        self::TYPE_FIELDNAME     => array('id', 'transtype', 'paytype', 'paydate', 'credittype', 'sendtype', 'cstreet', 'mcode', 'name_f', 'name_t', 'name_e', 'posid', 'mdate', 'birthday', 'national', 'id_tax', 'id_card', 'zip', 'home_t', 'office_t', 'mobile', 'mcode_acc', 'bonusrec', 'bankcode', 'branch', 'acc_type', 'acc_no', 'acc_name', 'acc_prov', 'sv_code', 'sp_code', 'sp_name', 'upa_code', 'upa_name', 'lr', 'complete', 'compdate', 'modate', 'usercode', 'name_b', 'sex', 'age', 'occupation', 'status', 'mar_name', 'mar_age', 'email', 'beneficiaries', 'relation', 'districtId', 'amphurId', 'provinceId', 'fax', 'inv_code', 'uid', 'pos_cur', 'pos_cur1', 'pos_cur2', 'pos_cur3', 'pos_cur4', 'rpos_cur4', 'memdesc', 'cmp', 'cmp2', 'cmp3', 'ccmp', 'ccmp2', 'ccmp3', 'address', 'street', 'building', 'village', 'soi', 'ewallet', 'bmdate1', 'bmdate2', 'bmdate3', 'cbmdate1', 'cbmdate2', 'cbmdate3', 'online', 'cname_f', 'cname_t', 'cname_e', 'cname_b', 'cbirthday', 'cnational', 'cid_tax', 'cid_card', 'caddress', 'cbuilding', 'cvillage', 'csoi', 'czip', 'chome_t', 'coffice_t', 'cmobile', 'cfax', 'csex', 'cemail', 'cdistrictId', 'camphurId', 'cprovinceId', 'iname_f', 'iname_t', 'irelation', 'iphone', 'iid_card', 'status_doc', 'status_expire', 'status_terminate', 'terminate_date', 'status_suspend', 'suspend_date', 'status_blacklist', 'status_ato', 'sletter', 'sinv_code', 'txtoption', 'mcode_ref', 'cancel', 'sbook', 'sbinv_code', 'locationbase', 'cid_mobile', 'bewallet', 'bvoucher', 'voucher', 'manager', 'mtype', 'uidbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Transtype' => 1, 'Paytype' => 2, 'Paydate' => 3, 'Credittype' => 4, 'Sendtype' => 5, 'Cstreet' => 6, 'Mcode' => 7, 'NameF' => 8, 'NameT' => 9, 'NameE' => 10, 'Posid' => 11, 'Mdate' => 12, 'Birthday' => 13, 'National' => 14, 'IdTax' => 15, 'IdCard' => 16, 'Zip' => 17, 'HomeT' => 18, 'OfficeT' => 19, 'Mobile' => 20, 'McodeAcc' => 21, 'Bonusrec' => 22, 'Bankcode' => 23, 'Branch' => 24, 'AccType' => 25, 'AccNo' => 26, 'AccName' => 27, 'AccProv' => 28, 'SvCode' => 29, 'SpCode' => 30, 'SpName' => 31, 'UpaCode' => 32, 'UpaName' => 33, 'Lr' => 34, 'Complete' => 35, 'Compdate' => 36, 'Modate' => 37, 'Usercode' => 38, 'NameB' => 39, 'Sex' => 40, 'Age' => 41, 'Occupation' => 42, 'Status' => 43, 'MarName' => 44, 'MarAge' => 45, 'Email' => 46, 'Beneficiaries' => 47, 'Relation' => 48, 'Districtid' => 49, 'Amphurid' => 50, 'Provinceid' => 51, 'Fax' => 52, 'InvCode' => 53, 'Uid' => 54, 'PosCur' => 55, 'PosCur1' => 56, 'PosCur2' => 57, 'PosCur3' => 58, 'PosCur4' => 59, 'RposCur4' => 60, 'Memdesc' => 61, 'Cmp' => 62, 'Cmp2' => 63, 'Cmp3' => 64, 'Ccmp' => 65, 'Ccmp2' => 66, 'Ccmp3' => 67, 'Address' => 68, 'Street' => 69, 'Building' => 70, 'Village' => 71, 'Soi' => 72, 'Ewallet' => 73, 'Bmdate1' => 74, 'Bmdate2' => 75, 'Bmdate3' => 76, 'Cbmdate1' => 77, 'Cbmdate2' => 78, 'Cbmdate3' => 79, 'Online' => 80, 'CnameF' => 81, 'CnameT' => 82, 'CnameE' => 83, 'CnameB' => 84, 'Cbirthday' => 85, 'Cnational' => 86, 'CidTax' => 87, 'CidCard' => 88, 'Caddress' => 89, 'Cbuilding' => 90, 'Cvillage' => 91, 'Csoi' => 92, 'Czip' => 93, 'ChomeT' => 94, 'CofficeT' => 95, 'Cmobile' => 96, 'Cfax' => 97, 'Csex' => 98, 'Cemail' => 99, 'Cdistrictid' => 100, 'Camphurid' => 101, 'Cprovinceid' => 102, 'InameF' => 103, 'InameT' => 104, 'Irelation' => 105, 'Iphone' => 106, 'IidCard' => 107, 'StatusDoc' => 108, 'StatusExpire' => 109, 'StatusTerminate' => 110, 'TerminateDate' => 111, 'StatusSuspend' => 112, 'SuspendDate' => 113, 'StatusBlacklist' => 114, 'StatusAto' => 115, 'Sletter' => 116, 'SinvCode' => 117, 'Txtoption' => 118, 'McodeRef' => 119, 'Cancel' => 120, 'Sbook' => 121, 'SbinvCode' => 122, 'Locationbase' => 123, 'CidMobile' => 124, 'Bewallet' => 125, 'Bvoucher' => 126, 'Voucher' => 127, 'Manager' => 128, 'Mtype' => 129, 'Uidbase' => 130, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'transtype' => 1, 'paytype' => 2, 'paydate' => 3, 'credittype' => 4, 'sendtype' => 5, 'cstreet' => 6, 'mcode' => 7, 'nameF' => 8, 'nameT' => 9, 'nameE' => 10, 'posid' => 11, 'mdate' => 12, 'birthday' => 13, 'national' => 14, 'idTax' => 15, 'idCard' => 16, 'zip' => 17, 'homeT' => 18, 'officeT' => 19, 'mobile' => 20, 'mcodeAcc' => 21, 'bonusrec' => 22, 'bankcode' => 23, 'branch' => 24, 'accType' => 25, 'accNo' => 26, 'accName' => 27, 'accProv' => 28, 'svCode' => 29, 'spCode' => 30, 'spName' => 31, 'upaCode' => 32, 'upaName' => 33, 'lr' => 34, 'complete' => 35, 'compdate' => 36, 'modate' => 37, 'usercode' => 38, 'nameB' => 39, 'sex' => 40, 'age' => 41, 'occupation' => 42, 'status' => 43, 'marName' => 44, 'marAge' => 45, 'email' => 46, 'beneficiaries' => 47, 'relation' => 48, 'districtid' => 49, 'amphurid' => 50, 'provinceid' => 51, 'fax' => 52, 'invCode' => 53, 'uid' => 54, 'posCur' => 55, 'posCur1' => 56, 'posCur2' => 57, 'posCur3' => 58, 'posCur4' => 59, 'rposCur4' => 60, 'memdesc' => 61, 'cmp' => 62, 'cmp2' => 63, 'cmp3' => 64, 'ccmp' => 65, 'ccmp2' => 66, 'ccmp3' => 67, 'address' => 68, 'street' => 69, 'building' => 70, 'village' => 71, 'soi' => 72, 'ewallet' => 73, 'bmdate1' => 74, 'bmdate2' => 75, 'bmdate3' => 76, 'cbmdate1' => 77, 'cbmdate2' => 78, 'cbmdate3' => 79, 'online' => 80, 'cnameF' => 81, 'cnameT' => 82, 'cnameE' => 83, 'cnameB' => 84, 'cbirthday' => 85, 'cnational' => 86, 'cidTax' => 87, 'cidCard' => 88, 'caddress' => 89, 'cbuilding' => 90, 'cvillage' => 91, 'csoi' => 92, 'czip' => 93, 'chomeT' => 94, 'cofficeT' => 95, 'cmobile' => 96, 'cfax' => 97, 'csex' => 98, 'cemail' => 99, 'cdistrictid' => 100, 'camphurid' => 101, 'cprovinceid' => 102, 'inameF' => 103, 'inameT' => 104, 'irelation' => 105, 'iphone' => 106, 'iidCard' => 107, 'statusDoc' => 108, 'statusExpire' => 109, 'statusTerminate' => 110, 'terminateDate' => 111, 'statusSuspend' => 112, 'suspendDate' => 113, 'statusBlacklist' => 114, 'statusAto' => 115, 'sletter' => 116, 'sinvCode' => 117, 'txtoption' => 118, 'mcodeRef' => 119, 'cancel' => 120, 'sbook' => 121, 'sbinvCode' => 122, 'locationbase' => 123, 'cidMobile' => 124, 'bewallet' => 125, 'bvoucher' => 126, 'voucher' => 127, 'manager' => 128, 'mtype' => 129, 'uidbase' => 130, ),
        self::TYPE_COLNAME       => array(AliMemberTmpTableMap::COL_ID => 0, AliMemberTmpTableMap::COL_TRANSTYPE => 1, AliMemberTmpTableMap::COL_PAYTYPE => 2, AliMemberTmpTableMap::COL_PAYDATE => 3, AliMemberTmpTableMap::COL_CREDITTYPE => 4, AliMemberTmpTableMap::COL_SENDTYPE => 5, AliMemberTmpTableMap::COL_CSTREET => 6, AliMemberTmpTableMap::COL_MCODE => 7, AliMemberTmpTableMap::COL_NAME_F => 8, AliMemberTmpTableMap::COL_NAME_T => 9, AliMemberTmpTableMap::COL_NAME_E => 10, AliMemberTmpTableMap::COL_POSID => 11, AliMemberTmpTableMap::COL_MDATE => 12, AliMemberTmpTableMap::COL_BIRTHDAY => 13, AliMemberTmpTableMap::COL_NATIONAL => 14, AliMemberTmpTableMap::COL_ID_TAX => 15, AliMemberTmpTableMap::COL_ID_CARD => 16, AliMemberTmpTableMap::COL_ZIP => 17, AliMemberTmpTableMap::COL_HOME_T => 18, AliMemberTmpTableMap::COL_OFFICE_T => 19, AliMemberTmpTableMap::COL_MOBILE => 20, AliMemberTmpTableMap::COL_MCODE_ACC => 21, AliMemberTmpTableMap::COL_BONUSREC => 22, AliMemberTmpTableMap::COL_BANKCODE => 23, AliMemberTmpTableMap::COL_BRANCH => 24, AliMemberTmpTableMap::COL_ACC_TYPE => 25, AliMemberTmpTableMap::COL_ACC_NO => 26, AliMemberTmpTableMap::COL_ACC_NAME => 27, AliMemberTmpTableMap::COL_ACC_PROV => 28, AliMemberTmpTableMap::COL_SV_CODE => 29, AliMemberTmpTableMap::COL_SP_CODE => 30, AliMemberTmpTableMap::COL_SP_NAME => 31, AliMemberTmpTableMap::COL_UPA_CODE => 32, AliMemberTmpTableMap::COL_UPA_NAME => 33, AliMemberTmpTableMap::COL_LR => 34, AliMemberTmpTableMap::COL_COMPLETE => 35, AliMemberTmpTableMap::COL_COMPDATE => 36, AliMemberTmpTableMap::COL_MODATE => 37, AliMemberTmpTableMap::COL_USERCODE => 38, AliMemberTmpTableMap::COL_NAME_B => 39, AliMemberTmpTableMap::COL_SEX => 40, AliMemberTmpTableMap::COL_AGE => 41, AliMemberTmpTableMap::COL_OCCUPATION => 42, AliMemberTmpTableMap::COL_STATUS => 43, AliMemberTmpTableMap::COL_MAR_NAME => 44, AliMemberTmpTableMap::COL_MAR_AGE => 45, AliMemberTmpTableMap::COL_EMAIL => 46, AliMemberTmpTableMap::COL_BENEFICIARIES => 47, AliMemberTmpTableMap::COL_RELATION => 48, AliMemberTmpTableMap::COL_DISTRICTID => 49, AliMemberTmpTableMap::COL_AMPHURID => 50, AliMemberTmpTableMap::COL_PROVINCEID => 51, AliMemberTmpTableMap::COL_FAX => 52, AliMemberTmpTableMap::COL_INV_CODE => 53, AliMemberTmpTableMap::COL_UID => 54, AliMemberTmpTableMap::COL_POS_CUR => 55, AliMemberTmpTableMap::COL_POS_CUR1 => 56, AliMemberTmpTableMap::COL_POS_CUR2 => 57, AliMemberTmpTableMap::COL_POS_CUR3 => 58, AliMemberTmpTableMap::COL_POS_CUR4 => 59, AliMemberTmpTableMap::COL_RPOS_CUR4 => 60, AliMemberTmpTableMap::COL_MEMDESC => 61, AliMemberTmpTableMap::COL_CMP => 62, AliMemberTmpTableMap::COL_CMP2 => 63, AliMemberTmpTableMap::COL_CMP3 => 64, AliMemberTmpTableMap::COL_CCMP => 65, AliMemberTmpTableMap::COL_CCMP2 => 66, AliMemberTmpTableMap::COL_CCMP3 => 67, AliMemberTmpTableMap::COL_ADDRESS => 68, AliMemberTmpTableMap::COL_STREET => 69, AliMemberTmpTableMap::COL_BUILDING => 70, AliMemberTmpTableMap::COL_VILLAGE => 71, AliMemberTmpTableMap::COL_SOI => 72, AliMemberTmpTableMap::COL_EWALLET => 73, AliMemberTmpTableMap::COL_BMDATE1 => 74, AliMemberTmpTableMap::COL_BMDATE2 => 75, AliMemberTmpTableMap::COL_BMDATE3 => 76, AliMemberTmpTableMap::COL_CBMDATE1 => 77, AliMemberTmpTableMap::COL_CBMDATE2 => 78, AliMemberTmpTableMap::COL_CBMDATE3 => 79, AliMemberTmpTableMap::COL_ONLINE => 80, AliMemberTmpTableMap::COL_CNAME_F => 81, AliMemberTmpTableMap::COL_CNAME_T => 82, AliMemberTmpTableMap::COL_CNAME_E => 83, AliMemberTmpTableMap::COL_CNAME_B => 84, AliMemberTmpTableMap::COL_CBIRTHDAY => 85, AliMemberTmpTableMap::COL_CNATIONAL => 86, AliMemberTmpTableMap::COL_CID_TAX => 87, AliMemberTmpTableMap::COL_CID_CARD => 88, AliMemberTmpTableMap::COL_CADDRESS => 89, AliMemberTmpTableMap::COL_CBUILDING => 90, AliMemberTmpTableMap::COL_CVILLAGE => 91, AliMemberTmpTableMap::COL_CSOI => 92, AliMemberTmpTableMap::COL_CZIP => 93, AliMemberTmpTableMap::COL_CHOME_T => 94, AliMemberTmpTableMap::COL_COFFICE_T => 95, AliMemberTmpTableMap::COL_CMOBILE => 96, AliMemberTmpTableMap::COL_CFAX => 97, AliMemberTmpTableMap::COL_CSEX => 98, AliMemberTmpTableMap::COL_CEMAIL => 99, AliMemberTmpTableMap::COL_CDISTRICTID => 100, AliMemberTmpTableMap::COL_CAMPHURID => 101, AliMemberTmpTableMap::COL_CPROVINCEID => 102, AliMemberTmpTableMap::COL_INAME_F => 103, AliMemberTmpTableMap::COL_INAME_T => 104, AliMemberTmpTableMap::COL_IRELATION => 105, AliMemberTmpTableMap::COL_IPHONE => 106, AliMemberTmpTableMap::COL_IID_CARD => 107, AliMemberTmpTableMap::COL_STATUS_DOC => 108, AliMemberTmpTableMap::COL_STATUS_EXPIRE => 109, AliMemberTmpTableMap::COL_STATUS_TERMINATE => 110, AliMemberTmpTableMap::COL_TERMINATE_DATE => 111, AliMemberTmpTableMap::COL_STATUS_SUSPEND => 112, AliMemberTmpTableMap::COL_SUSPEND_DATE => 113, AliMemberTmpTableMap::COL_STATUS_BLACKLIST => 114, AliMemberTmpTableMap::COL_STATUS_ATO => 115, AliMemberTmpTableMap::COL_SLETTER => 116, AliMemberTmpTableMap::COL_SINV_CODE => 117, AliMemberTmpTableMap::COL_TXTOPTION => 118, AliMemberTmpTableMap::COL_MCODE_REF => 119, AliMemberTmpTableMap::COL_CANCEL => 120, AliMemberTmpTableMap::COL_SBOOK => 121, AliMemberTmpTableMap::COL_SBINV_CODE => 122, AliMemberTmpTableMap::COL_LOCATIONBASE => 123, AliMemberTmpTableMap::COL_CID_MOBILE => 124, AliMemberTmpTableMap::COL_BEWALLET => 125, AliMemberTmpTableMap::COL_BVOUCHER => 126, AliMemberTmpTableMap::COL_VOUCHER => 127, AliMemberTmpTableMap::COL_MANAGER => 128, AliMemberTmpTableMap::COL_MTYPE => 129, AliMemberTmpTableMap::COL_UIDBASE => 130, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'transtype' => 1, 'paytype' => 2, 'paydate' => 3, 'credittype' => 4, 'sendtype' => 5, 'cstreet' => 6, 'mcode' => 7, 'name_f' => 8, 'name_t' => 9, 'name_e' => 10, 'posid' => 11, 'mdate' => 12, 'birthday' => 13, 'national' => 14, 'id_tax' => 15, 'id_card' => 16, 'zip' => 17, 'home_t' => 18, 'office_t' => 19, 'mobile' => 20, 'mcode_acc' => 21, 'bonusrec' => 22, 'bankcode' => 23, 'branch' => 24, 'acc_type' => 25, 'acc_no' => 26, 'acc_name' => 27, 'acc_prov' => 28, 'sv_code' => 29, 'sp_code' => 30, 'sp_name' => 31, 'upa_code' => 32, 'upa_name' => 33, 'lr' => 34, 'complete' => 35, 'compdate' => 36, 'modate' => 37, 'usercode' => 38, 'name_b' => 39, 'sex' => 40, 'age' => 41, 'occupation' => 42, 'status' => 43, 'mar_name' => 44, 'mar_age' => 45, 'email' => 46, 'beneficiaries' => 47, 'relation' => 48, 'districtId' => 49, 'amphurId' => 50, 'provinceId' => 51, 'fax' => 52, 'inv_code' => 53, 'uid' => 54, 'pos_cur' => 55, 'pos_cur1' => 56, 'pos_cur2' => 57, 'pos_cur3' => 58, 'pos_cur4' => 59, 'rpos_cur4' => 60, 'memdesc' => 61, 'cmp' => 62, 'cmp2' => 63, 'cmp3' => 64, 'ccmp' => 65, 'ccmp2' => 66, 'ccmp3' => 67, 'address' => 68, 'street' => 69, 'building' => 70, 'village' => 71, 'soi' => 72, 'ewallet' => 73, 'bmdate1' => 74, 'bmdate2' => 75, 'bmdate3' => 76, 'cbmdate1' => 77, 'cbmdate2' => 78, 'cbmdate3' => 79, 'online' => 80, 'cname_f' => 81, 'cname_t' => 82, 'cname_e' => 83, 'cname_b' => 84, 'cbirthday' => 85, 'cnational' => 86, 'cid_tax' => 87, 'cid_card' => 88, 'caddress' => 89, 'cbuilding' => 90, 'cvillage' => 91, 'csoi' => 92, 'czip' => 93, 'chome_t' => 94, 'coffice_t' => 95, 'cmobile' => 96, 'cfax' => 97, 'csex' => 98, 'cemail' => 99, 'cdistrictId' => 100, 'camphurId' => 101, 'cprovinceId' => 102, 'iname_f' => 103, 'iname_t' => 104, 'irelation' => 105, 'iphone' => 106, 'iid_card' => 107, 'status_doc' => 108, 'status_expire' => 109, 'status_terminate' => 110, 'terminate_date' => 111, 'status_suspend' => 112, 'suspend_date' => 113, 'status_blacklist' => 114, 'status_ato' => 115, 'sletter' => 116, 'sinv_code' => 117, 'txtoption' => 118, 'mcode_ref' => 119, 'cancel' => 120, 'sbook' => 121, 'sbinv_code' => 122, 'locationbase' => 123, 'cid_mobile' => 124, 'bewallet' => 125, 'bvoucher' => 126, 'voucher' => 127, 'manager' => 128, 'mtype' => 129, 'uidbase' => 130, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, )
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
        $this->setName('ali_member_tmp');
        $this->setPhpName('AliMemberTmp');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliMemberTmp');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('transtype', 'Transtype', 'INTEGER', true, null, null);
        $this->addColumn('paytype', 'Paytype', 'INTEGER', true, null, null);
        $this->addColumn('paydate', 'Paydate', 'TIMESTAMP', true, null, null);
        $this->addColumn('credittype', 'Credittype', 'INTEGER', true, null, null);
        $this->addColumn('sendtype', 'Sendtype', 'INTEGER', true, null, null);
        $this->addColumn('cstreet', 'Cstreet', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', false, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', false, 255, null);
        $this->addColumn('name_e', 'NameE', 'VARCHAR', false, 255, null);
        $this->addColumn('posid', 'Posid', 'CHAR', false, 2, null);
        $this->addColumn('mdate', 'Mdate', 'VARCHAR', false, 255, null);
        $this->addColumn('birthday', 'Birthday', 'VARCHAR', false, 255, null);
        $this->addColumn('national', 'National', 'VARCHAR', false, 20, null);
        $this->addColumn('id_tax', 'IdTax', 'VARCHAR', false, 10, null);
        $this->addColumn('id_card', 'IdCard', 'VARCHAR', false, 20, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', false, 5, null);
        $this->addColumn('home_t', 'HomeT', 'VARCHAR', false, 20, null);
        $this->addColumn('office_t', 'OfficeT', 'VARCHAR', false, 20, null);
        $this->addColumn('mobile', 'Mobile', 'VARCHAR', false, 20, null);
        $this->addColumn('mcode_acc', 'McodeAcc', 'VARCHAR', false, 7, null);
        $this->addColumn('bonusrec', 'Bonusrec', 'VARCHAR', false, 1, null);
        $this->addColumn('bankcode', 'Bankcode', 'VARCHAR', false, 2, null);
        $this->addColumn('branch', 'Branch', 'VARCHAR', false, 20, null);
        $this->addColumn('acc_type', 'AccType', 'VARCHAR', false, 20, null);
        $this->addColumn('acc_no', 'AccNo', 'VARCHAR', false, 20, null);
        $this->addColumn('acc_name', 'AccName', 'VARCHAR', false, 255, null);
        $this->addColumn('acc_prov', 'AccProv', 'VARCHAR', false, 20, null);
        $this->addColumn('sv_code', 'SvCode', 'VARCHAR', false, 20, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', false, 255, null);
        $this->addColumn('sp_name', 'SpName', 'VARCHAR', false, 255, null);
        $this->addColumn('upa_code', 'UpaCode', 'VARCHAR', false, 255, null);
        $this->addColumn('upa_name', 'UpaName', 'VARCHAR', false, 255, null);
        $this->addColumn('lr', 'Lr', 'INTEGER', false, null, null);
        $this->addColumn('complete', 'Complete', 'VARCHAR', false, 1, null);
        $this->addColumn('compdate', 'Compdate', 'VARCHAR', false, 255, null);
        $this->addColumn('modate', 'Modate', 'VARCHAR', false, 255, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 3, null);
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
        $this->addColumn('districtId', 'Districtid', 'INTEGER', true, 10, null);
        $this->addColumn('amphurId', 'Amphurid', 'INTEGER', true, 10, null);
        $this->addColumn('provinceId', 'Provinceid', 'INTEGER', true, 10, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', true, 20, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur1', 'PosCur1', 'VARCHAR', true, 255, 'S');
        $this->addColumn('pos_cur2', 'PosCur2', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur3', 'PosCur3', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur4', 'PosCur4', 'VARCHAR', true, 255, null);
        $this->addColumn('rpos_cur4', 'RposCur4', 'INTEGER', true, null, null);
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
        $this->addColumn('csoi', 'Csoi', 'VARCHAR', true, 255, null);
        $this->addColumn('czip', 'Czip', 'VARCHAR', true, 255, null);
        $this->addColumn('chome_t', 'ChomeT', 'VARCHAR', true, 255, null);
        $this->addColumn('coffice_t', 'CofficeT', 'VARCHAR', true, 255, null);
        $this->addColumn('cmobile', 'Cmobile', 'VARCHAR', true, 255, null);
        $this->addColumn('cfax', 'Cfax', 'VARCHAR', true, 255, null);
        $this->addColumn('csex', 'Csex', 'VARCHAR', true, 255, null);
        $this->addColumn('cemail', 'Cemail', 'VARCHAR', true, 255, null);
        $this->addColumn('cdistrictId', 'Cdistrictid', 'INTEGER', true, null, null);
        $this->addColumn('camphurId', 'Camphurid', 'INTEGER', true, null, null);
        $this->addColumn('cprovinceId', 'Cprovinceid', 'INTEGER', true, null, null);
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
        $this->addColumn('mcode_ref', 'McodeRef', 'VARCHAR', true, 255, null);
        $this->addColumn('cancel', 'Cancel', 'INTEGER', true, null, null);
        $this->addColumn('sbook', 'Sbook', 'INTEGER', true, null, null);
        $this->addColumn('sbinv_code', 'SbinvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('cid_mobile', 'CidMobile', 'VARCHAR', true, 255, null);
        $this->addColumn('bewallet', 'Bewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('bvoucher', 'Bvoucher', 'DECIMAL', true, 15, null);
        $this->addColumn('voucher', 'Voucher', 'DECIMAL', true, 15, null);
        $this->addColumn('manager', 'Manager', 'VARCHAR', true, 255, null);
        $this->addColumn('mtype', 'Mtype', 'VARCHAR', true, 255, null);
        $this->addColumn('uidbase', 'Uidbase', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliMemberTmpTableMap::CLASS_DEFAULT : AliMemberTmpTableMap::OM_CLASS;
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
     * @return array           (AliMemberTmp object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliMemberTmpTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliMemberTmpTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliMemberTmpTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliMemberTmpTableMap::OM_CLASS;
            /** @var AliMemberTmp $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliMemberTmpTableMap::addInstanceToPool($obj, $key);
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
            $key = AliMemberTmpTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliMemberTmpTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliMemberTmp $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliMemberTmpTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_TRANSTYPE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_PAYTYPE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CREDITTYPE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SENDTYPE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CSTREET);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_NAME_E);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_POSID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BIRTHDAY);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_NATIONAL);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ID_TAX);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ID_CARD);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ZIP);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_HOME_T);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_OFFICE_T);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MOBILE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MCODE_ACC);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BONUSREC);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BANKCODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BRANCH);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ACC_TYPE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ACC_NO);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ACC_NAME);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ACC_PROV);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SV_CODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SP_NAME);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_UPA_NAME);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_LR);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_COMPLETE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_COMPDATE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MODATE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_NAME_B);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SEX);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_AGE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_OCCUPATION);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MAR_NAME);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MAR_AGE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_EMAIL);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BENEFICIARIES);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_RELATION);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_DISTRICTID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_AMPHURID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_PROVINCEID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_FAX);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_UID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_POS_CUR1);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_POS_CUR2);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_POS_CUR3);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_POS_CUR4);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_RPOS_CUR4);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MEMDESC);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CMP);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CMP2);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CMP3);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CCMP);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CCMP2);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CCMP3);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_STREET);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BUILDING);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_VILLAGE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SOI);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BMDATE1);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BMDATE2);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BMDATE3);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CBMDATE1);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CBMDATE2);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CBMDATE3);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_ONLINE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CNAME_F);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CNAME_T);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CNAME_E);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CNAME_B);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CBIRTHDAY);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CNATIONAL);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CID_TAX);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CID_CARD);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CBUILDING);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CVILLAGE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CSOI);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CZIP);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CHOME_T);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_COFFICE_T);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CMOBILE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CFAX);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CSEX);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CEMAIL);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CDISTRICTID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CAMPHURID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CPROVINCEID);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_INAME_F);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_INAME_T);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_IRELATION);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_IPHONE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_IID_CARD);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_STATUS_DOC);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_STATUS_EXPIRE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_STATUS_TERMINATE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_TERMINATE_DATE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_STATUS_SUSPEND);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SUSPEND_DATE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_STATUS_BLACKLIST);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_STATUS_ATO);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SLETTER);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SINV_CODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MCODE_REF);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SBOOK);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_SBINV_CODE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_CID_MOBILE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BEWALLET);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_BVOUCHER);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_VOUCHER);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MANAGER);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_MTYPE);
            $criteria->addSelectColumn(AliMemberTmpTableMap::COL_UIDBASE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.transtype');
            $criteria->addSelectColumn($alias . '.paytype');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.credittype');
            $criteria->addSelectColumn($alias . '.sendtype');
            $criteria->addSelectColumn($alias . '.cstreet');
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
            $criteria->addSelectColumn($alias . '.acc_name');
            $criteria->addSelectColumn($alias . '.acc_prov');
            $criteria->addSelectColumn($alias . '.sv_code');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.sp_name');
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
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.pos_cur1');
            $criteria->addSelectColumn($alias . '.pos_cur2');
            $criteria->addSelectColumn($alias . '.pos_cur3');
            $criteria->addSelectColumn($alias . '.pos_cur4');
            $criteria->addSelectColumn($alias . '.rpos_cur4');
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
            $criteria->addSelectColumn($alias . '.mcode_ref');
            $criteria->addSelectColumn($alias . '.cancel');
            $criteria->addSelectColumn($alias . '.sbook');
            $criteria->addSelectColumn($alias . '.sbinv_code');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.cid_mobile');
            $criteria->addSelectColumn($alias . '.bewallet');
            $criteria->addSelectColumn($alias . '.bvoucher');
            $criteria->addSelectColumn($alias . '.voucher');
            $criteria->addSelectColumn($alias . '.manager');
            $criteria->addSelectColumn($alias . '.mtype');
            $criteria->addSelectColumn($alias . '.uidbase');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliMemberTmpTableMap::DATABASE_NAME)->getTable(AliMemberTmpTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliMemberTmpTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliMemberTmpTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliMemberTmpTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliMemberTmp or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliMemberTmp object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTmpTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliMemberTmp) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliMemberTmpTableMap::DATABASE_NAME);
            $criteria->add(AliMemberTmpTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliMemberTmpQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliMemberTmpTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliMemberTmpTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_member_tmp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliMemberTmpQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliMemberTmp or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliMemberTmp object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberTmpTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliMemberTmp object
        }

        if ($criteria->containsKey(AliMemberTmpTableMap::COL_ID) && $criteria->keyContainsValue(AliMemberTmpTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliMemberTmpTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliMemberTmpQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliMemberTmpTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliMemberTmpTableMap::buildTableMap();
