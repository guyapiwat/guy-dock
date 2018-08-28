<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliMsaleh;
use CciOrm\CciOrm\AliMsalehQuery;
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
 * This class defines the structure of the 'ali_msaleh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliMsalehTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliMsalehTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_msaleh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliMsaleh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliMsaleh';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 90;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 90;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_msaleh.sano';

    /**
     * the column name for the sano1 field
     */
    const COL_SANO1 = 'ali_msaleh.sano1';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_msaleh.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_msaleh.sctime';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_msaleh.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_msaleh.inv_ref';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_msaleh.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_msaleh.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_msaleh.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_msaleh.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_msaleh.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_msaleh.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_msaleh.tot_fv';

    /**
     * the column name for the tot_weight field
     */
    const COL_TOT_WEIGHT = 'ali_msaleh.tot_weight';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_msaleh.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_msaleh.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_msaleh.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_msaleh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_msaleh.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_msaleh.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_msaleh.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_msaleh.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_msaleh.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_msaleh.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_msaleh.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_msaleh.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_msaleh.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_msaleh.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_msaleh.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_msaleh.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_msaleh.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_msaleh.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_msaleh.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_msaleh.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_msaleh.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_msaleh.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_msaleh.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_msaleh.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_msaleh.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_msaleh.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_msaleh.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_msaleh.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_msaleh.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_msaleh.txtOther';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_msaleh.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_msaleh.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_msaleh.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_msaleh.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_msaleh.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_msaleh.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_msaleh.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_msaleh.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_msaleh.optionOther';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_msaleh.discount';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_msaleh.print';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_msaleh.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_msaleh.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_msaleh.ipay';

    /**
     * the column name for the pay_type field
     */
    const COL_PAY_TYPE = 'ali_msaleh.pay_type';

    /**
     * the column name for the hcancel field
     */
    const COL_HCANCEL = 'ali_msaleh.hcancel';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'ali_msaleh.caddress';

    /**
     * the column name for the cdistrictId field
     */
    const COL_CDISTRICTID = 'ali_msaleh.cdistrictId';

    /**
     * the column name for the camphurId field
     */
    const COL_CAMPHURID = 'ali_msaleh.camphurId';

    /**
     * the column name for the cprovinceId field
     */
    const COL_CPROVINCEID = 'ali_msaleh.cprovinceId';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'ali_msaleh.czip';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_msaleh.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_msaleh.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_msaleh.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_msaleh.receive_date';

    /**
     * the column name for the asend field
     */
    const COL_ASEND = 'ali_msaleh.asend';

    /**
     * the column name for the ato_type field
     */
    const COL_ATO_TYPE = 'ali_msaleh.ato_type';

    /**
     * the column name for the ato_id field
     */
    const COL_ATO_ID = 'ali_msaleh.ato_id';

    /**
     * the column name for the online field
     */
    const COL_ONLINE = 'ali_msaleh.online';

    /**
     * the column name for the hpv field
     */
    const COL_HPV = 'ali_msaleh.hpv';

    /**
     * the column name for the htotal field
     */
    const COL_HTOTAL = 'ali_msaleh.htotal';

    /**
     * the column name for the hdate field
     */
    const COL_HDATE = 'ali_msaleh.hdate';

    /**
     * the column name for the scheck field
     */
    const COL_SCHECK = 'ali_msaleh.scheck';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_msaleh.checkportal';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_msaleh.rcode';

    /**
     * the column name for the bmcauto field
     */
    const COL_BMCAUTO = 'ali_msaleh.bmcauto';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_msaleh.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_msaleh.uid_cancel';

    /**
     * the column name for the cname field
     */
    const COL_CNAME = 'ali_msaleh.cname';

    /**
     * the column name for the cmobile field
     */
    const COL_CMOBILE = 'ali_msaleh.cmobile';

    /**
     * the column name for the uid_sender field
     */
    const COL_UID_SENDER = 'ali_msaleh.uid_sender';

    /**
     * the column name for the uid_receive field
     */
    const COL_UID_RECEIVE = 'ali_msaleh.uid_receive';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_msaleh.mbase';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_msaleh.bprice';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_msaleh.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_msaleh.crate';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sano1', 'Sadate', 'Sctime', 'InvCode', 'InvRef', 'Mcode', 'NameF', 'NameT', 'Total', 'TotPv', 'TotBv', 'TotFv', 'TotWeight', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtoption', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkinternet', 'Chkdiscount', 'Chkother', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Ewallet', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtinternet', 'Txtdiscount', 'Txtother', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioninternet', 'Optiondiscount', 'Optionother', 'Discount', 'Print', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'PayType', 'Hcancel', 'Caddress', 'Cdistrictid', 'Camphurid', 'Cprovinceid', 'Czip', 'Sender', 'SenderDate', 'Receive', 'ReceiveDate', 'Asend', 'AtoType', 'AtoId', 'Online', 'Hpv', 'Htotal', 'Hdate', 'Scheck', 'Checkportal', 'Rcode', 'Bmcauto', 'CancelDate', 'UidCancel', 'Cname', 'Cmobile', 'UidSender', 'UidReceive', 'Mbase', 'Bprice', 'Locationbase', 'Crate', ),
        self::TYPE_CAMELNAME     => array('sano', 'sano1', 'sadate', 'sctime', 'invCode', 'invRef', 'mcode', 'nameF', 'nameT', 'total', 'totPv', 'totBv', 'totFv', 'totWeight', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtoption', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkinternet', 'chkdiscount', 'chkother', 'txtcash', 'txtfuture', 'txttransfer', 'ewallet', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtinternet', 'txtdiscount', 'txtother', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioninternet', 'optiondiscount', 'optionother', 'discount', 'print', 'ewalletBefore', 'ewalletAfter', 'ipay', 'payType', 'hcancel', 'caddress', 'cdistrictid', 'camphurid', 'cprovinceid', 'czip', 'sender', 'senderDate', 'receive', 'receiveDate', 'asend', 'atoType', 'atoId', 'online', 'hpv', 'htotal', 'hdate', 'scheck', 'checkportal', 'rcode', 'bmcauto', 'cancelDate', 'uidCancel', 'cname', 'cmobile', 'uidSender', 'uidReceive', 'mbase', 'bprice', 'locationbase', 'crate', ),
        self::TYPE_COLNAME       => array(AliMsalehTableMap::COL_SANO, AliMsalehTableMap::COL_SANO1, AliMsalehTableMap::COL_SADATE, AliMsalehTableMap::COL_SCTIME, AliMsalehTableMap::COL_INV_CODE, AliMsalehTableMap::COL_INV_REF, AliMsalehTableMap::COL_MCODE, AliMsalehTableMap::COL_NAME_F, AliMsalehTableMap::COL_NAME_T, AliMsalehTableMap::COL_TOTAL, AliMsalehTableMap::COL_TOT_PV, AliMsalehTableMap::COL_TOT_BV, AliMsalehTableMap::COL_TOT_FV, AliMsalehTableMap::COL_TOT_WEIGHT, AliMsalehTableMap::COL_USERCODE, AliMsalehTableMap::COL_REMARK, AliMsalehTableMap::COL_TRNF, AliMsalehTableMap::COL_ID, AliMsalehTableMap::COL_SA_TYPE, AliMsalehTableMap::COL_UID, AliMsalehTableMap::COL_LID, AliMsalehTableMap::COL_DL, AliMsalehTableMap::COL_CANCEL, AliMsalehTableMap::COL_SEND, AliMsalehTableMap::COL_TXTOPTION, AliMsalehTableMap::COL_CHKCASH, AliMsalehTableMap::COL_CHKFUTURE, AliMsalehTableMap::COL_CHKTRANSFER, AliMsalehTableMap::COL_CHKCREDIT1, AliMsalehTableMap::COL_CHKCREDIT2, AliMsalehTableMap::COL_CHKCREDIT3, AliMsalehTableMap::COL_CHKINTERNET, AliMsalehTableMap::COL_CHKDISCOUNT, AliMsalehTableMap::COL_CHKOTHER, AliMsalehTableMap::COL_TXTCASH, AliMsalehTableMap::COL_TXTFUTURE, AliMsalehTableMap::COL_TXTTRANSFER, AliMsalehTableMap::COL_EWALLET, AliMsalehTableMap::COL_TXTCREDIT1, AliMsalehTableMap::COL_TXTCREDIT2, AliMsalehTableMap::COL_TXTCREDIT3, AliMsalehTableMap::COL_TXTINTERNET, AliMsalehTableMap::COL_TXTDISCOUNT, AliMsalehTableMap::COL_TXTOTHER, AliMsalehTableMap::COL_OPTIONCASH, AliMsalehTableMap::COL_OPTIONFUTURE, AliMsalehTableMap::COL_OPTIONTRANSFER, AliMsalehTableMap::COL_OPTIONCREDIT1, AliMsalehTableMap::COL_OPTIONCREDIT2, AliMsalehTableMap::COL_OPTIONCREDIT3, AliMsalehTableMap::COL_OPTIONINTERNET, AliMsalehTableMap::COL_OPTIONDISCOUNT, AliMsalehTableMap::COL_OPTIONOTHER, AliMsalehTableMap::COL_DISCOUNT, AliMsalehTableMap::COL_PRINT, AliMsalehTableMap::COL_EWALLET_BEFORE, AliMsalehTableMap::COL_EWALLET_AFTER, AliMsalehTableMap::COL_IPAY, AliMsalehTableMap::COL_PAY_TYPE, AliMsalehTableMap::COL_HCANCEL, AliMsalehTableMap::COL_CADDRESS, AliMsalehTableMap::COL_CDISTRICTID, AliMsalehTableMap::COL_CAMPHURID, AliMsalehTableMap::COL_CPROVINCEID, AliMsalehTableMap::COL_CZIP, AliMsalehTableMap::COL_SENDER, AliMsalehTableMap::COL_SENDER_DATE, AliMsalehTableMap::COL_RECEIVE, AliMsalehTableMap::COL_RECEIVE_DATE, AliMsalehTableMap::COL_ASEND, AliMsalehTableMap::COL_ATO_TYPE, AliMsalehTableMap::COL_ATO_ID, AliMsalehTableMap::COL_ONLINE, AliMsalehTableMap::COL_HPV, AliMsalehTableMap::COL_HTOTAL, AliMsalehTableMap::COL_HDATE, AliMsalehTableMap::COL_SCHECK, AliMsalehTableMap::COL_CHECKPORTAL, AliMsalehTableMap::COL_RCODE, AliMsalehTableMap::COL_BMCAUTO, AliMsalehTableMap::COL_CANCEL_DATE, AliMsalehTableMap::COL_UID_CANCEL, AliMsalehTableMap::COL_CNAME, AliMsalehTableMap::COL_CMOBILE, AliMsalehTableMap::COL_UID_SENDER, AliMsalehTableMap::COL_UID_RECEIVE, AliMsalehTableMap::COL_MBASE, AliMsalehTableMap::COL_BPRICE, AliMsalehTableMap::COL_LOCATIONBASE, AliMsalehTableMap::COL_CRATE, ),
        self::TYPE_FIELDNAME     => array('sano', 'sano1', 'sadate', 'sctime', 'inv_code', 'inv_ref', 'mcode', 'name_f', 'name_t', 'total', 'tot_pv', 'tot_bv', 'tot_fv', 'tot_weight', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtoption', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkInternet', 'chkDiscount', 'chkOther', 'txtCash', 'txtFuture', 'txtTransfer', 'ewallet', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtInternet', 'txtDiscount', 'txtOther', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionInternet', 'optionDiscount', 'optionOther', 'discount', 'print', 'ewallet_before', 'ewallet_after', 'ipay', 'pay_type', 'hcancel', 'caddress', 'cdistrictId', 'camphurId', 'cprovinceId', 'czip', 'sender', 'sender_date', 'receive', 'receive_date', 'asend', 'ato_type', 'ato_id', 'online', 'hpv', 'htotal', 'hdate', 'scheck', 'checkportal', 'rcode', 'bmcauto', 'cancel_date', 'uid_cancel', 'cname', 'cmobile', 'uid_sender', 'uid_receive', 'mbase', 'bprice', 'locationbase', 'crate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sano1' => 1, 'Sadate' => 2, 'Sctime' => 3, 'InvCode' => 4, 'InvRef' => 5, 'Mcode' => 6, 'NameF' => 7, 'NameT' => 8, 'Total' => 9, 'TotPv' => 10, 'TotBv' => 11, 'TotFv' => 12, 'TotWeight' => 13, 'Usercode' => 14, 'Remark' => 15, 'Trnf' => 16, 'Id' => 17, 'SaType' => 18, 'Uid' => 19, 'Lid' => 20, 'Dl' => 21, 'Cancel' => 22, 'Send' => 23, 'Txtoption' => 24, 'Chkcash' => 25, 'Chkfuture' => 26, 'Chktransfer' => 27, 'Chkcredit1' => 28, 'Chkcredit2' => 29, 'Chkcredit3' => 30, 'Chkinternet' => 31, 'Chkdiscount' => 32, 'Chkother' => 33, 'Txtcash' => 34, 'Txtfuture' => 35, 'Txttransfer' => 36, 'Ewallet' => 37, 'Txtcredit1' => 38, 'Txtcredit2' => 39, 'Txtcredit3' => 40, 'Txtinternet' => 41, 'Txtdiscount' => 42, 'Txtother' => 43, 'Optioncash' => 44, 'Optionfuture' => 45, 'Optiontransfer' => 46, 'Optioncredit1' => 47, 'Optioncredit2' => 48, 'Optioncredit3' => 49, 'Optioninternet' => 50, 'Optiondiscount' => 51, 'Optionother' => 52, 'Discount' => 53, 'Print' => 54, 'EwalletBefore' => 55, 'EwalletAfter' => 56, 'Ipay' => 57, 'PayType' => 58, 'Hcancel' => 59, 'Caddress' => 60, 'Cdistrictid' => 61, 'Camphurid' => 62, 'Cprovinceid' => 63, 'Czip' => 64, 'Sender' => 65, 'SenderDate' => 66, 'Receive' => 67, 'ReceiveDate' => 68, 'Asend' => 69, 'AtoType' => 70, 'AtoId' => 71, 'Online' => 72, 'Hpv' => 73, 'Htotal' => 74, 'Hdate' => 75, 'Scheck' => 76, 'Checkportal' => 77, 'Rcode' => 78, 'Bmcauto' => 79, 'CancelDate' => 80, 'UidCancel' => 81, 'Cname' => 82, 'Cmobile' => 83, 'UidSender' => 84, 'UidReceive' => 85, 'Mbase' => 86, 'Bprice' => 87, 'Locationbase' => 88, 'Crate' => 89, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'sctime' => 3, 'invCode' => 4, 'invRef' => 5, 'mcode' => 6, 'nameF' => 7, 'nameT' => 8, 'total' => 9, 'totPv' => 10, 'totBv' => 11, 'totFv' => 12, 'totWeight' => 13, 'usercode' => 14, 'remark' => 15, 'trnf' => 16, 'id' => 17, 'saType' => 18, 'uid' => 19, 'lid' => 20, 'dl' => 21, 'cancel' => 22, 'send' => 23, 'txtoption' => 24, 'chkcash' => 25, 'chkfuture' => 26, 'chktransfer' => 27, 'chkcredit1' => 28, 'chkcredit2' => 29, 'chkcredit3' => 30, 'chkinternet' => 31, 'chkdiscount' => 32, 'chkother' => 33, 'txtcash' => 34, 'txtfuture' => 35, 'txttransfer' => 36, 'ewallet' => 37, 'txtcredit1' => 38, 'txtcredit2' => 39, 'txtcredit3' => 40, 'txtinternet' => 41, 'txtdiscount' => 42, 'txtother' => 43, 'optioncash' => 44, 'optionfuture' => 45, 'optiontransfer' => 46, 'optioncredit1' => 47, 'optioncredit2' => 48, 'optioncredit3' => 49, 'optioninternet' => 50, 'optiondiscount' => 51, 'optionother' => 52, 'discount' => 53, 'print' => 54, 'ewalletBefore' => 55, 'ewalletAfter' => 56, 'ipay' => 57, 'payType' => 58, 'hcancel' => 59, 'caddress' => 60, 'cdistrictid' => 61, 'camphurid' => 62, 'cprovinceid' => 63, 'czip' => 64, 'sender' => 65, 'senderDate' => 66, 'receive' => 67, 'receiveDate' => 68, 'asend' => 69, 'atoType' => 70, 'atoId' => 71, 'online' => 72, 'hpv' => 73, 'htotal' => 74, 'hdate' => 75, 'scheck' => 76, 'checkportal' => 77, 'rcode' => 78, 'bmcauto' => 79, 'cancelDate' => 80, 'uidCancel' => 81, 'cname' => 82, 'cmobile' => 83, 'uidSender' => 84, 'uidReceive' => 85, 'mbase' => 86, 'bprice' => 87, 'locationbase' => 88, 'crate' => 89, ),
        self::TYPE_COLNAME       => array(AliMsalehTableMap::COL_SANO => 0, AliMsalehTableMap::COL_SANO1 => 1, AliMsalehTableMap::COL_SADATE => 2, AliMsalehTableMap::COL_SCTIME => 3, AliMsalehTableMap::COL_INV_CODE => 4, AliMsalehTableMap::COL_INV_REF => 5, AliMsalehTableMap::COL_MCODE => 6, AliMsalehTableMap::COL_NAME_F => 7, AliMsalehTableMap::COL_NAME_T => 8, AliMsalehTableMap::COL_TOTAL => 9, AliMsalehTableMap::COL_TOT_PV => 10, AliMsalehTableMap::COL_TOT_BV => 11, AliMsalehTableMap::COL_TOT_FV => 12, AliMsalehTableMap::COL_TOT_WEIGHT => 13, AliMsalehTableMap::COL_USERCODE => 14, AliMsalehTableMap::COL_REMARK => 15, AliMsalehTableMap::COL_TRNF => 16, AliMsalehTableMap::COL_ID => 17, AliMsalehTableMap::COL_SA_TYPE => 18, AliMsalehTableMap::COL_UID => 19, AliMsalehTableMap::COL_LID => 20, AliMsalehTableMap::COL_DL => 21, AliMsalehTableMap::COL_CANCEL => 22, AliMsalehTableMap::COL_SEND => 23, AliMsalehTableMap::COL_TXTOPTION => 24, AliMsalehTableMap::COL_CHKCASH => 25, AliMsalehTableMap::COL_CHKFUTURE => 26, AliMsalehTableMap::COL_CHKTRANSFER => 27, AliMsalehTableMap::COL_CHKCREDIT1 => 28, AliMsalehTableMap::COL_CHKCREDIT2 => 29, AliMsalehTableMap::COL_CHKCREDIT3 => 30, AliMsalehTableMap::COL_CHKINTERNET => 31, AliMsalehTableMap::COL_CHKDISCOUNT => 32, AliMsalehTableMap::COL_CHKOTHER => 33, AliMsalehTableMap::COL_TXTCASH => 34, AliMsalehTableMap::COL_TXTFUTURE => 35, AliMsalehTableMap::COL_TXTTRANSFER => 36, AliMsalehTableMap::COL_EWALLET => 37, AliMsalehTableMap::COL_TXTCREDIT1 => 38, AliMsalehTableMap::COL_TXTCREDIT2 => 39, AliMsalehTableMap::COL_TXTCREDIT3 => 40, AliMsalehTableMap::COL_TXTINTERNET => 41, AliMsalehTableMap::COL_TXTDISCOUNT => 42, AliMsalehTableMap::COL_TXTOTHER => 43, AliMsalehTableMap::COL_OPTIONCASH => 44, AliMsalehTableMap::COL_OPTIONFUTURE => 45, AliMsalehTableMap::COL_OPTIONTRANSFER => 46, AliMsalehTableMap::COL_OPTIONCREDIT1 => 47, AliMsalehTableMap::COL_OPTIONCREDIT2 => 48, AliMsalehTableMap::COL_OPTIONCREDIT3 => 49, AliMsalehTableMap::COL_OPTIONINTERNET => 50, AliMsalehTableMap::COL_OPTIONDISCOUNT => 51, AliMsalehTableMap::COL_OPTIONOTHER => 52, AliMsalehTableMap::COL_DISCOUNT => 53, AliMsalehTableMap::COL_PRINT => 54, AliMsalehTableMap::COL_EWALLET_BEFORE => 55, AliMsalehTableMap::COL_EWALLET_AFTER => 56, AliMsalehTableMap::COL_IPAY => 57, AliMsalehTableMap::COL_PAY_TYPE => 58, AliMsalehTableMap::COL_HCANCEL => 59, AliMsalehTableMap::COL_CADDRESS => 60, AliMsalehTableMap::COL_CDISTRICTID => 61, AliMsalehTableMap::COL_CAMPHURID => 62, AliMsalehTableMap::COL_CPROVINCEID => 63, AliMsalehTableMap::COL_CZIP => 64, AliMsalehTableMap::COL_SENDER => 65, AliMsalehTableMap::COL_SENDER_DATE => 66, AliMsalehTableMap::COL_RECEIVE => 67, AliMsalehTableMap::COL_RECEIVE_DATE => 68, AliMsalehTableMap::COL_ASEND => 69, AliMsalehTableMap::COL_ATO_TYPE => 70, AliMsalehTableMap::COL_ATO_ID => 71, AliMsalehTableMap::COL_ONLINE => 72, AliMsalehTableMap::COL_HPV => 73, AliMsalehTableMap::COL_HTOTAL => 74, AliMsalehTableMap::COL_HDATE => 75, AliMsalehTableMap::COL_SCHECK => 76, AliMsalehTableMap::COL_CHECKPORTAL => 77, AliMsalehTableMap::COL_RCODE => 78, AliMsalehTableMap::COL_BMCAUTO => 79, AliMsalehTableMap::COL_CANCEL_DATE => 80, AliMsalehTableMap::COL_UID_CANCEL => 81, AliMsalehTableMap::COL_CNAME => 82, AliMsalehTableMap::COL_CMOBILE => 83, AliMsalehTableMap::COL_UID_SENDER => 84, AliMsalehTableMap::COL_UID_RECEIVE => 85, AliMsalehTableMap::COL_MBASE => 86, AliMsalehTableMap::COL_BPRICE => 87, AliMsalehTableMap::COL_LOCATIONBASE => 88, AliMsalehTableMap::COL_CRATE => 89, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'sctime' => 3, 'inv_code' => 4, 'inv_ref' => 5, 'mcode' => 6, 'name_f' => 7, 'name_t' => 8, 'total' => 9, 'tot_pv' => 10, 'tot_bv' => 11, 'tot_fv' => 12, 'tot_weight' => 13, 'usercode' => 14, 'remark' => 15, 'trnf' => 16, 'id' => 17, 'sa_type' => 18, 'uid' => 19, 'lid' => 20, 'dl' => 21, 'cancel' => 22, 'send' => 23, 'txtoption' => 24, 'chkCash' => 25, 'chkFuture' => 26, 'chkTransfer' => 27, 'chkCredit1' => 28, 'chkCredit2' => 29, 'chkCredit3' => 30, 'chkInternet' => 31, 'chkDiscount' => 32, 'chkOther' => 33, 'txtCash' => 34, 'txtFuture' => 35, 'txtTransfer' => 36, 'ewallet' => 37, 'txtCredit1' => 38, 'txtCredit2' => 39, 'txtCredit3' => 40, 'txtInternet' => 41, 'txtDiscount' => 42, 'txtOther' => 43, 'optionCash' => 44, 'optionFuture' => 45, 'optionTransfer' => 46, 'optionCredit1' => 47, 'optionCredit2' => 48, 'optionCredit3' => 49, 'optionInternet' => 50, 'optionDiscount' => 51, 'optionOther' => 52, 'discount' => 53, 'print' => 54, 'ewallet_before' => 55, 'ewallet_after' => 56, 'ipay' => 57, 'pay_type' => 58, 'hcancel' => 59, 'caddress' => 60, 'cdistrictId' => 61, 'camphurId' => 62, 'cprovinceId' => 63, 'czip' => 64, 'sender' => 65, 'sender_date' => 66, 'receive' => 67, 'receive_date' => 68, 'asend' => 69, 'ato_type' => 70, 'ato_id' => 71, 'online' => 72, 'hpv' => 73, 'htotal' => 74, 'hdate' => 75, 'scheck' => 76, 'checkportal' => 77, 'rcode' => 78, 'bmcauto' => 79, 'cancel_date' => 80, 'uid_cancel' => 81, 'cname' => 82, 'cmobile' => 83, 'uid_sender' => 84, 'uid_receive' => 85, 'mbase' => 86, 'bprice' => 87, 'locationbase' => 88, 'crate' => 89, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, )
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
        $this->setName('ali_msaleh');
        $this->setPhpName('AliMsaleh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliMsaleh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('sano1', 'Sano1', 'BIGINT', true, 22, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('sctime', 'Sctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_bv', 'TotBv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_fv', 'TotFv', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_weight', 'TotWeight', 'DECIMAL', true, 15, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 3, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 40, null);
        $this->addColumn('trnf', 'Trnf', 'INTEGER', false, null, 0);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sa_type', 'SaType', 'CHAR', true, 2, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('lid', 'Lid', 'VARCHAR', true, 255, null);
        $this->addColumn('dl', 'Dl', 'CHAR', true, null, null);
        $this->addColumn('cancel', 'Cancel', 'INTEGER', true, 2, null);
        $this->addColumn('send', 'Send', 'INTEGER', true, null, null);
        $this->addColumn('txtoption', 'Txtoption', 'CLOB', true, null, null);
        $this->addColumn('chkCash', 'Chkcash', 'VARCHAR', true, 255, null);
        $this->addColumn('chkFuture', 'Chkfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('chkTransfer', 'Chktransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit1', 'Chkcredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit2', 'Chkcredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit3', 'Chkcredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('chkInternet', 'Chkinternet', 'VARCHAR', true, 255, null);
        $this->addColumn('chkDiscount', 'Chkdiscount', 'VARCHAR', true, 255, null);
        $this->addColumn('chkOther', 'Chkother', 'VARCHAR', true, 255, null);
        $this->addColumn('txtCash', 'Txtcash', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtFuture', 'Txtfuture', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtTransfer', 'Txttransfer', 'DECIMAL', true, 15, 0);
        $this->addColumn('ewallet', 'Ewallet', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtCredit1', 'Txtcredit1', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtCredit2', 'Txtcredit2', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtCredit3', 'Txtcredit3', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtInternet', 'Txtinternet', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtDiscount', 'Txtdiscount', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtOther', 'Txtother', 'DECIMAL', true, 15, 0);
        $this->addColumn('optionCash', 'Optioncash', 'VARCHAR', true, 255, null);
        $this->addColumn('optionFuture', 'Optionfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer', 'Optiontransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit1', 'Optioncredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit2', 'Optioncredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit3', 'Optioncredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('optionInternet', 'Optioninternet', 'VARCHAR', true, 255, null);
        $this->addColumn('optionDiscount', 'Optiondiscount', 'VARCHAR', true, 255, null);
        $this->addColumn('optionOther', 'Optionother', 'VARCHAR', true, 255, null);
        $this->addColumn('discount', 'Discount', 'VARCHAR', true, 255, null);
        $this->addColumn('print', 'Print', 'INTEGER', true, null, null);
        $this->addColumn('ewallet_before', 'EwalletBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_after', 'EwalletAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('ipay', 'Ipay', 'VARCHAR', true, 255, null);
        $this->addColumn('pay_type', 'PayType', 'VARCHAR', true, 255, null);
        $this->addColumn('hcancel', 'Hcancel', 'INTEGER', true, null, null);
        $this->addColumn('caddress', 'Caddress', 'LONGVARCHAR', true, null, null);
        $this->addColumn('cdistrictId', 'Cdistrictid', 'VARCHAR', true, 255, null);
        $this->addColumn('camphurId', 'Camphurid', 'VARCHAR', true, 255, null);
        $this->addColumn('cprovinceId', 'Cprovinceid', 'VARCHAR', true, 255, null);
        $this->addColumn('czip', 'Czip', 'VARCHAR', true, 255, null);
        $this->addColumn('sender', 'Sender', 'INTEGER', true, null, null);
        $this->addColumn('sender_date', 'SenderDate', 'DATE', true, null, null);
        $this->addColumn('receive', 'Receive', 'INTEGER', true, null, null);
        $this->addColumn('receive_date', 'ReceiveDate', 'DATE', true, null, null);
        $this->addColumn('asend', 'Asend', 'INTEGER', true, null, null);
        $this->addColumn('ato_type', 'AtoType', 'INTEGER', true, null, null);
        $this->addColumn('ato_id', 'AtoId', 'INTEGER', true, null, null);
        $this->addColumn('online', 'Online', 'INTEGER', true, null, null);
        $this->addColumn('hpv', 'Hpv', 'DECIMAL', true, 15, null);
        $this->addColumn('htotal', 'Htotal', 'DECIMAL', true, 15, null);
        $this->addColumn('hdate', 'Hdate', 'DATE', true, null, null);
        $this->addColumn('scheck', 'Scheck', 'VARCHAR', true, 255, null);
        $this->addColumn('checkportal', 'Checkportal', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('bmcauto', 'Bmcauto', 'INTEGER', true, null, null);
        $this->addColumn('cancel_date', 'CancelDate', 'DATE', true, null, null);
        $this->addColumn('uid_cancel', 'UidCancel', 'VARCHAR', true, 255, null);
        $this->addColumn('cname', 'Cname', 'VARCHAR', true, 255, null);
        $this->addColumn('cmobile', 'Cmobile', 'VARCHAR', true, 255, null);
        $this->addColumn('uid_sender', 'UidSender', 'VARCHAR', true, 255, null);
        $this->addColumn('uid_receive', 'UidReceive', 'VARCHAR', true, 255, null);
        $this->addColumn('mbase', 'Mbase', 'VARCHAR', true, 255, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 17 + $offset
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
        return $withPrefix ? AliMsalehTableMap::CLASS_DEFAULT : AliMsalehTableMap::OM_CLASS;
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
     * @return array           (AliMsaleh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliMsalehTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliMsalehTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliMsalehTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliMsalehTableMap::OM_CLASS;
            /** @var AliMsaleh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliMsalehTableMap::addInstanceToPool($obj, $key);
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
            $key = AliMsalehTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliMsalehTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliMsaleh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliMsalehTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SANO);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SANO1);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TOT_WEIGHT);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_ID);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_UID);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_LID);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_DL);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SEND);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_PAY_TYPE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_HCANCEL);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CDISTRICTID);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CAMPHURID);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CPROVINCEID);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CZIP);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_ASEND);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_ATO_TYPE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_ATO_ID);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_ONLINE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_HPV);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_HTOTAL);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_HDATE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_SCHECK);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_BMCAUTO);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CNAME);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CMOBILE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_UID_SENDER);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_UID_RECEIVE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliMsalehTableMap::COL_CRATE);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sano1');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.sctime');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.tot_bv');
            $criteria->addSelectColumn($alias . '.tot_fv');
            $criteria->addSelectColumn($alias . '.tot_weight');
            $criteria->addSelectColumn($alias . '.usercode');
            $criteria->addSelectColumn($alias . '.remark');
            $criteria->addSelectColumn($alias . '.trnf');
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.lid');
            $criteria->addSelectColumn($alias . '.dl');
            $criteria->addSelectColumn($alias . '.cancel');
            $criteria->addSelectColumn($alias . '.send');
            $criteria->addSelectColumn($alias . '.txtoption');
            $criteria->addSelectColumn($alias . '.chkCash');
            $criteria->addSelectColumn($alias . '.chkFuture');
            $criteria->addSelectColumn($alias . '.chkTransfer');
            $criteria->addSelectColumn($alias . '.chkCredit1');
            $criteria->addSelectColumn($alias . '.chkCredit2');
            $criteria->addSelectColumn($alias . '.chkCredit3');
            $criteria->addSelectColumn($alias . '.chkInternet');
            $criteria->addSelectColumn($alias . '.chkDiscount');
            $criteria->addSelectColumn($alias . '.chkOther');
            $criteria->addSelectColumn($alias . '.txtCash');
            $criteria->addSelectColumn($alias . '.txtFuture');
            $criteria->addSelectColumn($alias . '.txtTransfer');
            $criteria->addSelectColumn($alias . '.ewallet');
            $criteria->addSelectColumn($alias . '.txtCredit1');
            $criteria->addSelectColumn($alias . '.txtCredit2');
            $criteria->addSelectColumn($alias . '.txtCredit3');
            $criteria->addSelectColumn($alias . '.txtInternet');
            $criteria->addSelectColumn($alias . '.txtDiscount');
            $criteria->addSelectColumn($alias . '.txtOther');
            $criteria->addSelectColumn($alias . '.optionCash');
            $criteria->addSelectColumn($alias . '.optionFuture');
            $criteria->addSelectColumn($alias . '.optionTransfer');
            $criteria->addSelectColumn($alias . '.optionCredit1');
            $criteria->addSelectColumn($alias . '.optionCredit2');
            $criteria->addSelectColumn($alias . '.optionCredit3');
            $criteria->addSelectColumn($alias . '.optionInternet');
            $criteria->addSelectColumn($alias . '.optionDiscount');
            $criteria->addSelectColumn($alias . '.optionOther');
            $criteria->addSelectColumn($alias . '.discount');
            $criteria->addSelectColumn($alias . '.print');
            $criteria->addSelectColumn($alias . '.ewallet_before');
            $criteria->addSelectColumn($alias . '.ewallet_after');
            $criteria->addSelectColumn($alias . '.ipay');
            $criteria->addSelectColumn($alias . '.pay_type');
            $criteria->addSelectColumn($alias . '.hcancel');
            $criteria->addSelectColumn($alias . '.caddress');
            $criteria->addSelectColumn($alias . '.cdistrictId');
            $criteria->addSelectColumn($alias . '.camphurId');
            $criteria->addSelectColumn($alias . '.cprovinceId');
            $criteria->addSelectColumn($alias . '.czip');
            $criteria->addSelectColumn($alias . '.sender');
            $criteria->addSelectColumn($alias . '.sender_date');
            $criteria->addSelectColumn($alias . '.receive');
            $criteria->addSelectColumn($alias . '.receive_date');
            $criteria->addSelectColumn($alias . '.asend');
            $criteria->addSelectColumn($alias . '.ato_type');
            $criteria->addSelectColumn($alias . '.ato_id');
            $criteria->addSelectColumn($alias . '.online');
            $criteria->addSelectColumn($alias . '.hpv');
            $criteria->addSelectColumn($alias . '.htotal');
            $criteria->addSelectColumn($alias . '.hdate');
            $criteria->addSelectColumn($alias . '.scheck');
            $criteria->addSelectColumn($alias . '.checkportal');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.bmcauto');
            $criteria->addSelectColumn($alias . '.cancel_date');
            $criteria->addSelectColumn($alias . '.uid_cancel');
            $criteria->addSelectColumn($alias . '.cname');
            $criteria->addSelectColumn($alias . '.cmobile');
            $criteria->addSelectColumn($alias . '.uid_sender');
            $criteria->addSelectColumn($alias . '.uid_receive');
            $criteria->addSelectColumn($alias . '.mbase');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.crate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliMsalehTableMap::DATABASE_NAME)->getTable(AliMsalehTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliMsalehTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliMsalehTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliMsalehTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliMsaleh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliMsaleh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMsalehTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliMsaleh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliMsalehTableMap::DATABASE_NAME);
            $criteria->add(AliMsalehTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliMsalehQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliMsalehTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliMsalehTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_msaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliMsalehQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliMsaleh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliMsaleh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMsalehTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliMsaleh object
        }

        if ($criteria->containsKey(AliMsalehTableMap::COL_ID) && $criteria->keyContainsValue(AliMsalehTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliMsalehTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliMsalehQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliMsalehTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliMsalehTableMap::buildTableMap();
