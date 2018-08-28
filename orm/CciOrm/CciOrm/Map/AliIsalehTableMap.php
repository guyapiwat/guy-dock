<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliIsaleh;
use CciOrm\CciOrm\AliIsalehQuery;
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
 * This class defines the structure of the 'ali_isaleh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliIsalehTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliIsalehTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_isaleh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliIsaleh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliIsaleh';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 76;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 76;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_isaleh.sano';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_isaleh.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_isaleh.name_t';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_isaleh.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_isaleh.sctime';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_isaleh.inv_code';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_isaleh.lid';

    /**
     * the column name for the inv_from field
     */
    const COL_INV_FROM = 'ali_isaleh.inv_from';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_isaleh.mcode';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_isaleh.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_isaleh.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_isaleh.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_isaleh.tot_fv';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_isaleh.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_isaleh.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_isaleh.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_isaleh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_isaleh.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_isaleh.uid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_isaleh.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_isaleh.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_isaleh.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_isaleh.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_isaleh.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_isaleh.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_isaleh.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_isaleh.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_isaleh.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_isaleh.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_isaleh.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_isaleh.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_isaleh.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_isaleh.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_isaleh.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_isaleh.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_isaleh.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_isaleh.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_isaleh.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_isaleh.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_isaleh.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_isaleh.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_isaleh.txtOther';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_isaleh.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_isaleh.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_isaleh.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_isaleh.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_isaleh.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_isaleh.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_isaleh.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_isaleh.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_isaleh.optionOther';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_isaleh.discount';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_isaleh.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_isaleh.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_isaleh.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_isaleh.receive_date';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_isaleh.print';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_isaleh.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_isaleh.ewallet_after';

    /**
     * the column name for the ewallett_before field
     */
    const COL_EWALLETT_BEFORE = 'ali_isaleh.ewallett_before';

    /**
     * the column name for the ewallett_after field
     */
    const COL_EWALLETT_AFTER = 'ali_isaleh.ewallett_after';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_isaleh.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_isaleh.uid_cancel';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_isaleh.mbase';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_isaleh.bprice';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_isaleh.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_isaleh.crate';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_isaleh.checkportal';

    /**
     * the column name for the uid_receive field
     */
    const COL_UID_RECEIVE = 'ali_isaleh.uid_receive';

    /**
     * the column name for the uid_sender field
     */
    const COL_UID_SENDER = 'ali_isaleh.uid_sender';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'ali_isaleh.caddress';

    /**
     * the column name for the cdistrictId field
     */
    const COL_CDISTRICTID = 'ali_isaleh.cdistrictId';

    /**
     * the column name for the camphurId field
     */
    const COL_CAMPHURID = 'ali_isaleh.camphurId';

    /**
     * the column name for the cprovinceId field
     */
    const COL_CPROVINCEID = 'ali_isaleh.cprovinceId';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'ali_isaleh.czip';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_isaleh.status';

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
        self::TYPE_PHPNAME       => array('Sano', 'NameF', 'NameT', 'Sadate', 'Sctime', 'InvCode', 'Lid', 'InvFrom', 'Mcode', 'Total', 'TotPv', 'TotBv', 'TotFv', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Dl', 'Cancel', 'Send', 'Txtoption', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkinternet', 'Chkdiscount', 'Chkother', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Ewallet', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtinternet', 'Txtdiscount', 'Txtother', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioninternet', 'Optiondiscount', 'Optionother', 'Discount', 'Sender', 'SenderDate', 'Receive', 'ReceiveDate', 'Print', 'EwalletBefore', 'EwalletAfter', 'EwallettBefore', 'EwallettAfter', 'CancelDate', 'UidCancel', 'Mbase', 'Bprice', 'Locationbase', 'Crate', 'Checkportal', 'UidReceive', 'UidSender', 'Caddress', 'Cdistrictid', 'Camphurid', 'Cprovinceid', 'Czip', 'Status', ),
        self::TYPE_CAMELNAME     => array('sano', 'nameF', 'nameT', 'sadate', 'sctime', 'invCode', 'lid', 'invFrom', 'mcode', 'total', 'totPv', 'totBv', 'totFv', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'dl', 'cancel', 'send', 'txtoption', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkinternet', 'chkdiscount', 'chkother', 'txtcash', 'txtfuture', 'txttransfer', 'ewallet', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtinternet', 'txtdiscount', 'txtother', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioninternet', 'optiondiscount', 'optionother', 'discount', 'sender', 'senderDate', 'receive', 'receiveDate', 'print', 'ewalletBefore', 'ewalletAfter', 'ewallettBefore', 'ewallettAfter', 'cancelDate', 'uidCancel', 'mbase', 'bprice', 'locationbase', 'crate', 'checkportal', 'uidReceive', 'uidSender', 'caddress', 'cdistrictid', 'camphurid', 'cprovinceid', 'czip', 'status', ),
        self::TYPE_COLNAME       => array(AliIsalehTableMap::COL_SANO, AliIsalehTableMap::COL_NAME_F, AliIsalehTableMap::COL_NAME_T, AliIsalehTableMap::COL_SADATE, AliIsalehTableMap::COL_SCTIME, AliIsalehTableMap::COL_INV_CODE, AliIsalehTableMap::COL_LID, AliIsalehTableMap::COL_INV_FROM, AliIsalehTableMap::COL_MCODE, AliIsalehTableMap::COL_TOTAL, AliIsalehTableMap::COL_TOT_PV, AliIsalehTableMap::COL_TOT_BV, AliIsalehTableMap::COL_TOT_FV, AliIsalehTableMap::COL_USERCODE, AliIsalehTableMap::COL_REMARK, AliIsalehTableMap::COL_TRNF, AliIsalehTableMap::COL_ID, AliIsalehTableMap::COL_SA_TYPE, AliIsalehTableMap::COL_UID, AliIsalehTableMap::COL_DL, AliIsalehTableMap::COL_CANCEL, AliIsalehTableMap::COL_SEND, AliIsalehTableMap::COL_TXTOPTION, AliIsalehTableMap::COL_CHKCASH, AliIsalehTableMap::COL_CHKFUTURE, AliIsalehTableMap::COL_CHKTRANSFER, AliIsalehTableMap::COL_CHKCREDIT1, AliIsalehTableMap::COL_CHKCREDIT2, AliIsalehTableMap::COL_CHKCREDIT3, AliIsalehTableMap::COL_CHKINTERNET, AliIsalehTableMap::COL_CHKDISCOUNT, AliIsalehTableMap::COL_CHKOTHER, AliIsalehTableMap::COL_TXTCASH, AliIsalehTableMap::COL_TXTFUTURE, AliIsalehTableMap::COL_TXTTRANSFER, AliIsalehTableMap::COL_EWALLET, AliIsalehTableMap::COL_TXTCREDIT1, AliIsalehTableMap::COL_TXTCREDIT2, AliIsalehTableMap::COL_TXTCREDIT3, AliIsalehTableMap::COL_TXTINTERNET, AliIsalehTableMap::COL_TXTDISCOUNT, AliIsalehTableMap::COL_TXTOTHER, AliIsalehTableMap::COL_OPTIONCASH, AliIsalehTableMap::COL_OPTIONFUTURE, AliIsalehTableMap::COL_OPTIONTRANSFER, AliIsalehTableMap::COL_OPTIONCREDIT1, AliIsalehTableMap::COL_OPTIONCREDIT2, AliIsalehTableMap::COL_OPTIONCREDIT3, AliIsalehTableMap::COL_OPTIONINTERNET, AliIsalehTableMap::COL_OPTIONDISCOUNT, AliIsalehTableMap::COL_OPTIONOTHER, AliIsalehTableMap::COL_DISCOUNT, AliIsalehTableMap::COL_SENDER, AliIsalehTableMap::COL_SENDER_DATE, AliIsalehTableMap::COL_RECEIVE, AliIsalehTableMap::COL_RECEIVE_DATE, AliIsalehTableMap::COL_PRINT, AliIsalehTableMap::COL_EWALLET_BEFORE, AliIsalehTableMap::COL_EWALLET_AFTER, AliIsalehTableMap::COL_EWALLETT_BEFORE, AliIsalehTableMap::COL_EWALLETT_AFTER, AliIsalehTableMap::COL_CANCEL_DATE, AliIsalehTableMap::COL_UID_CANCEL, AliIsalehTableMap::COL_MBASE, AliIsalehTableMap::COL_BPRICE, AliIsalehTableMap::COL_LOCATIONBASE, AliIsalehTableMap::COL_CRATE, AliIsalehTableMap::COL_CHECKPORTAL, AliIsalehTableMap::COL_UID_RECEIVE, AliIsalehTableMap::COL_UID_SENDER, AliIsalehTableMap::COL_CADDRESS, AliIsalehTableMap::COL_CDISTRICTID, AliIsalehTableMap::COL_CAMPHURID, AliIsalehTableMap::COL_CPROVINCEID, AliIsalehTableMap::COL_CZIP, AliIsalehTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('sano', 'name_f', 'name_t', 'sadate', 'sctime', 'inv_code', 'lid', 'inv_from', 'mcode', 'total', 'tot_pv', 'tot_bv', 'tot_fv', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'dl', 'cancel', 'send', 'txtoption', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkInternet', 'chkDiscount', 'chkOther', 'txtCash', 'txtFuture', 'txtTransfer', 'ewallet', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtInternet', 'txtDiscount', 'txtOther', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionInternet', 'optionDiscount', 'optionOther', 'discount', 'sender', 'sender_date', 'receive', 'receive_date', 'print', 'ewallet_before', 'ewallet_after', 'ewallett_before', 'ewallett_after', 'cancel_date', 'uid_cancel', 'mbase', 'bprice', 'locationbase', 'crate', 'checkportal', 'uid_receive', 'uid_sender', 'caddress', 'cdistrictId', 'camphurId', 'cprovinceId', 'czip', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'NameF' => 1, 'NameT' => 2, 'Sadate' => 3, 'Sctime' => 4, 'InvCode' => 5, 'Lid' => 6, 'InvFrom' => 7, 'Mcode' => 8, 'Total' => 9, 'TotPv' => 10, 'TotBv' => 11, 'TotFv' => 12, 'Usercode' => 13, 'Remark' => 14, 'Trnf' => 15, 'Id' => 16, 'SaType' => 17, 'Uid' => 18, 'Dl' => 19, 'Cancel' => 20, 'Send' => 21, 'Txtoption' => 22, 'Chkcash' => 23, 'Chkfuture' => 24, 'Chktransfer' => 25, 'Chkcredit1' => 26, 'Chkcredit2' => 27, 'Chkcredit3' => 28, 'Chkinternet' => 29, 'Chkdiscount' => 30, 'Chkother' => 31, 'Txtcash' => 32, 'Txtfuture' => 33, 'Txttransfer' => 34, 'Ewallet' => 35, 'Txtcredit1' => 36, 'Txtcredit2' => 37, 'Txtcredit3' => 38, 'Txtinternet' => 39, 'Txtdiscount' => 40, 'Txtother' => 41, 'Optioncash' => 42, 'Optionfuture' => 43, 'Optiontransfer' => 44, 'Optioncredit1' => 45, 'Optioncredit2' => 46, 'Optioncredit3' => 47, 'Optioninternet' => 48, 'Optiondiscount' => 49, 'Optionother' => 50, 'Discount' => 51, 'Sender' => 52, 'SenderDate' => 53, 'Receive' => 54, 'ReceiveDate' => 55, 'Print' => 56, 'EwalletBefore' => 57, 'EwalletAfter' => 58, 'EwallettBefore' => 59, 'EwallettAfter' => 60, 'CancelDate' => 61, 'UidCancel' => 62, 'Mbase' => 63, 'Bprice' => 64, 'Locationbase' => 65, 'Crate' => 66, 'Checkportal' => 67, 'UidReceive' => 68, 'UidSender' => 69, 'Caddress' => 70, 'Cdistrictid' => 71, 'Camphurid' => 72, 'Cprovinceid' => 73, 'Czip' => 74, 'Status' => 75, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'nameF' => 1, 'nameT' => 2, 'sadate' => 3, 'sctime' => 4, 'invCode' => 5, 'lid' => 6, 'invFrom' => 7, 'mcode' => 8, 'total' => 9, 'totPv' => 10, 'totBv' => 11, 'totFv' => 12, 'usercode' => 13, 'remark' => 14, 'trnf' => 15, 'id' => 16, 'saType' => 17, 'uid' => 18, 'dl' => 19, 'cancel' => 20, 'send' => 21, 'txtoption' => 22, 'chkcash' => 23, 'chkfuture' => 24, 'chktransfer' => 25, 'chkcredit1' => 26, 'chkcredit2' => 27, 'chkcredit3' => 28, 'chkinternet' => 29, 'chkdiscount' => 30, 'chkother' => 31, 'txtcash' => 32, 'txtfuture' => 33, 'txttransfer' => 34, 'ewallet' => 35, 'txtcredit1' => 36, 'txtcredit2' => 37, 'txtcredit3' => 38, 'txtinternet' => 39, 'txtdiscount' => 40, 'txtother' => 41, 'optioncash' => 42, 'optionfuture' => 43, 'optiontransfer' => 44, 'optioncredit1' => 45, 'optioncredit2' => 46, 'optioncredit3' => 47, 'optioninternet' => 48, 'optiondiscount' => 49, 'optionother' => 50, 'discount' => 51, 'sender' => 52, 'senderDate' => 53, 'receive' => 54, 'receiveDate' => 55, 'print' => 56, 'ewalletBefore' => 57, 'ewalletAfter' => 58, 'ewallettBefore' => 59, 'ewallettAfter' => 60, 'cancelDate' => 61, 'uidCancel' => 62, 'mbase' => 63, 'bprice' => 64, 'locationbase' => 65, 'crate' => 66, 'checkportal' => 67, 'uidReceive' => 68, 'uidSender' => 69, 'caddress' => 70, 'cdistrictid' => 71, 'camphurid' => 72, 'cprovinceid' => 73, 'czip' => 74, 'status' => 75, ),
        self::TYPE_COLNAME       => array(AliIsalehTableMap::COL_SANO => 0, AliIsalehTableMap::COL_NAME_F => 1, AliIsalehTableMap::COL_NAME_T => 2, AliIsalehTableMap::COL_SADATE => 3, AliIsalehTableMap::COL_SCTIME => 4, AliIsalehTableMap::COL_INV_CODE => 5, AliIsalehTableMap::COL_LID => 6, AliIsalehTableMap::COL_INV_FROM => 7, AliIsalehTableMap::COL_MCODE => 8, AliIsalehTableMap::COL_TOTAL => 9, AliIsalehTableMap::COL_TOT_PV => 10, AliIsalehTableMap::COL_TOT_BV => 11, AliIsalehTableMap::COL_TOT_FV => 12, AliIsalehTableMap::COL_USERCODE => 13, AliIsalehTableMap::COL_REMARK => 14, AliIsalehTableMap::COL_TRNF => 15, AliIsalehTableMap::COL_ID => 16, AliIsalehTableMap::COL_SA_TYPE => 17, AliIsalehTableMap::COL_UID => 18, AliIsalehTableMap::COL_DL => 19, AliIsalehTableMap::COL_CANCEL => 20, AliIsalehTableMap::COL_SEND => 21, AliIsalehTableMap::COL_TXTOPTION => 22, AliIsalehTableMap::COL_CHKCASH => 23, AliIsalehTableMap::COL_CHKFUTURE => 24, AliIsalehTableMap::COL_CHKTRANSFER => 25, AliIsalehTableMap::COL_CHKCREDIT1 => 26, AliIsalehTableMap::COL_CHKCREDIT2 => 27, AliIsalehTableMap::COL_CHKCREDIT3 => 28, AliIsalehTableMap::COL_CHKINTERNET => 29, AliIsalehTableMap::COL_CHKDISCOUNT => 30, AliIsalehTableMap::COL_CHKOTHER => 31, AliIsalehTableMap::COL_TXTCASH => 32, AliIsalehTableMap::COL_TXTFUTURE => 33, AliIsalehTableMap::COL_TXTTRANSFER => 34, AliIsalehTableMap::COL_EWALLET => 35, AliIsalehTableMap::COL_TXTCREDIT1 => 36, AliIsalehTableMap::COL_TXTCREDIT2 => 37, AliIsalehTableMap::COL_TXTCREDIT3 => 38, AliIsalehTableMap::COL_TXTINTERNET => 39, AliIsalehTableMap::COL_TXTDISCOUNT => 40, AliIsalehTableMap::COL_TXTOTHER => 41, AliIsalehTableMap::COL_OPTIONCASH => 42, AliIsalehTableMap::COL_OPTIONFUTURE => 43, AliIsalehTableMap::COL_OPTIONTRANSFER => 44, AliIsalehTableMap::COL_OPTIONCREDIT1 => 45, AliIsalehTableMap::COL_OPTIONCREDIT2 => 46, AliIsalehTableMap::COL_OPTIONCREDIT3 => 47, AliIsalehTableMap::COL_OPTIONINTERNET => 48, AliIsalehTableMap::COL_OPTIONDISCOUNT => 49, AliIsalehTableMap::COL_OPTIONOTHER => 50, AliIsalehTableMap::COL_DISCOUNT => 51, AliIsalehTableMap::COL_SENDER => 52, AliIsalehTableMap::COL_SENDER_DATE => 53, AliIsalehTableMap::COL_RECEIVE => 54, AliIsalehTableMap::COL_RECEIVE_DATE => 55, AliIsalehTableMap::COL_PRINT => 56, AliIsalehTableMap::COL_EWALLET_BEFORE => 57, AliIsalehTableMap::COL_EWALLET_AFTER => 58, AliIsalehTableMap::COL_EWALLETT_BEFORE => 59, AliIsalehTableMap::COL_EWALLETT_AFTER => 60, AliIsalehTableMap::COL_CANCEL_DATE => 61, AliIsalehTableMap::COL_UID_CANCEL => 62, AliIsalehTableMap::COL_MBASE => 63, AliIsalehTableMap::COL_BPRICE => 64, AliIsalehTableMap::COL_LOCATIONBASE => 65, AliIsalehTableMap::COL_CRATE => 66, AliIsalehTableMap::COL_CHECKPORTAL => 67, AliIsalehTableMap::COL_UID_RECEIVE => 68, AliIsalehTableMap::COL_UID_SENDER => 69, AliIsalehTableMap::COL_CADDRESS => 70, AliIsalehTableMap::COL_CDISTRICTID => 71, AliIsalehTableMap::COL_CAMPHURID => 72, AliIsalehTableMap::COL_CPROVINCEID => 73, AliIsalehTableMap::COL_CZIP => 74, AliIsalehTableMap::COL_STATUS => 75, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'name_f' => 1, 'name_t' => 2, 'sadate' => 3, 'sctime' => 4, 'inv_code' => 5, 'lid' => 6, 'inv_from' => 7, 'mcode' => 8, 'total' => 9, 'tot_pv' => 10, 'tot_bv' => 11, 'tot_fv' => 12, 'usercode' => 13, 'remark' => 14, 'trnf' => 15, 'id' => 16, 'sa_type' => 17, 'uid' => 18, 'dl' => 19, 'cancel' => 20, 'send' => 21, 'txtoption' => 22, 'chkCash' => 23, 'chkFuture' => 24, 'chkTransfer' => 25, 'chkCredit1' => 26, 'chkCredit2' => 27, 'chkCredit3' => 28, 'chkInternet' => 29, 'chkDiscount' => 30, 'chkOther' => 31, 'txtCash' => 32, 'txtFuture' => 33, 'txtTransfer' => 34, 'ewallet' => 35, 'txtCredit1' => 36, 'txtCredit2' => 37, 'txtCredit3' => 38, 'txtInternet' => 39, 'txtDiscount' => 40, 'txtOther' => 41, 'optionCash' => 42, 'optionFuture' => 43, 'optionTransfer' => 44, 'optionCredit1' => 45, 'optionCredit2' => 46, 'optionCredit3' => 47, 'optionInternet' => 48, 'optionDiscount' => 49, 'optionOther' => 50, 'discount' => 51, 'sender' => 52, 'sender_date' => 53, 'receive' => 54, 'receive_date' => 55, 'print' => 56, 'ewallet_before' => 57, 'ewallet_after' => 58, 'ewallett_before' => 59, 'ewallett_after' => 60, 'cancel_date' => 61, 'uid_cancel' => 62, 'mbase' => 63, 'bprice' => 64, 'locationbase' => 65, 'crate' => 66, 'checkportal' => 67, 'uid_receive' => 68, 'uid_sender' => 69, 'caddress' => 70, 'cdistrictId' => 71, 'camphurId' => 72, 'cprovinceId' => 73, 'czip' => 74, 'status' => 75, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, )
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
        $this->setName('ali_isaleh');
        $this->setPhpName('AliIsaleh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliIsaleh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('sctime', 'Sctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('lid', 'Lid', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_from', 'InvFrom', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_bv', 'TotBv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_fv', 'TotFv', 'DECIMAL', true, 15, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 3, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 40, null);
        $this->addColumn('trnf', 'Trnf', 'VARCHAR', false, 1, null);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sa_type', 'SaType', 'CHAR', true, 2, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
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
        $this->addColumn('txtCash', 'Txtcash', 'VARCHAR', true, 255, '0');
        $this->addColumn('txtFuture', 'Txtfuture', 'VARCHAR', true, 255, '0');
        $this->addColumn('txtTransfer', 'Txttransfer', 'VARCHAR', true, 255, '0');
        $this->addColumn('ewallet', 'Ewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit1', 'Txtcredit1', 'VARCHAR', true, 255, '0');
        $this->addColumn('txtCredit2', 'Txtcredit2', 'VARCHAR', true, 255, '0');
        $this->addColumn('txtCredit3', 'Txtcredit3', 'VARCHAR', true, 255, '0');
        $this->addColumn('txtInternet', 'Txtinternet', 'VARCHAR', true, 255, null);
        $this->addColumn('txtDiscount', 'Txtdiscount', 'VARCHAR', true, 255, null);
        $this->addColumn('txtOther', 'Txtother', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCash', 'Optioncash', 'VARCHAR', true, 255, null);
        $this->addColumn('optionFuture', 'Optionfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer', 'Optiontransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit1', 'Optioncredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit2', 'Optioncredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit3', 'Optioncredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('optionInternet', 'Optioninternet', 'VARCHAR', true, 255, null);
        $this->addColumn('optionDiscount', 'Optiondiscount', 'VARCHAR', true, 255, null);
        $this->addColumn('optionOther', 'Optionother', 'VARCHAR', true, 255, null);
        $this->addColumn('discount', 'Discount', 'INTEGER', true, null, null);
        $this->addColumn('sender', 'Sender', 'INTEGER', true, null, null);
        $this->addColumn('sender_date', 'SenderDate', 'DATE', true, null, null);
        $this->addColumn('receive', 'Receive', 'INTEGER', true, null, null);
        $this->addColumn('receive_date', 'ReceiveDate', 'DATE', true, null, null);
        $this->addColumn('print', 'Print', 'INTEGER', true, null, null);
        $this->addColumn('ewallet_before', 'EwalletBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_after', 'EwalletAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallett_before', 'EwallettBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallett_after', 'EwallettAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('cancel_date', 'CancelDate', 'DATE', true, null, null);
        $this->addColumn('uid_cancel', 'UidCancel', 'VARCHAR', true, 255, null);
        $this->addColumn('mbase', 'Mbase', 'VARCHAR', true, 255, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('checkportal', 'Checkportal', 'INTEGER', true, null, null);
        $this->addColumn('uid_receive', 'UidReceive', 'VARCHAR', true, 255, null);
        $this->addColumn('uid_sender', 'UidSender', 'VARCHAR', true, 255, null);
        $this->addColumn('caddress', 'Caddress', 'LONGVARCHAR', true, null, null);
        $this->addColumn('cdistrictId', 'Cdistrictid', 'VARCHAR', true, 255, null);
        $this->addColumn('camphurId', 'Camphurid', 'VARCHAR', true, 255, null);
        $this->addColumn('cprovinceId', 'Cprovinceid', 'VARCHAR', true, 255, null);
        $this->addColumn('czip', 'Czip', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 16 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 16 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 16 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 16 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 16 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 16 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 16 + $offset
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
        return $withPrefix ? AliIsalehTableMap::CLASS_DEFAULT : AliIsalehTableMap::OM_CLASS;
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
     * @return array           (AliIsaleh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliIsalehTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliIsalehTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliIsalehTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliIsalehTableMap::OM_CLASS;
            /** @var AliIsaleh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliIsalehTableMap::addInstanceToPool($obj, $key);
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
            $key = AliIsalehTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliIsalehTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliIsaleh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliIsalehTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliIsalehTableMap::COL_SANO);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_LID);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_INV_FROM);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_ID);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_UID);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_DL);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_SEND);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_EWALLETT_BEFORE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_EWALLETT_AFTER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_UID_RECEIVE);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_UID_SENDER);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CDISTRICTID);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CAMPHURID);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CPROVINCEID);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_CZIP);
            $criteria->addSelectColumn(AliIsalehTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.sctime');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.lid');
            $criteria->addSelectColumn($alias . '.inv_from');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.tot_bv');
            $criteria->addSelectColumn($alias . '.tot_fv');
            $criteria->addSelectColumn($alias . '.usercode');
            $criteria->addSelectColumn($alias . '.remark');
            $criteria->addSelectColumn($alias . '.trnf');
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.uid');
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
            $criteria->addSelectColumn($alias . '.sender');
            $criteria->addSelectColumn($alias . '.sender_date');
            $criteria->addSelectColumn($alias . '.receive');
            $criteria->addSelectColumn($alias . '.receive_date');
            $criteria->addSelectColumn($alias . '.print');
            $criteria->addSelectColumn($alias . '.ewallet_before');
            $criteria->addSelectColumn($alias . '.ewallet_after');
            $criteria->addSelectColumn($alias . '.ewallett_before');
            $criteria->addSelectColumn($alias . '.ewallett_after');
            $criteria->addSelectColumn($alias . '.cancel_date');
            $criteria->addSelectColumn($alias . '.uid_cancel');
            $criteria->addSelectColumn($alias . '.mbase');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.checkportal');
            $criteria->addSelectColumn($alias . '.uid_receive');
            $criteria->addSelectColumn($alias . '.uid_sender');
            $criteria->addSelectColumn($alias . '.caddress');
            $criteria->addSelectColumn($alias . '.cdistrictId');
            $criteria->addSelectColumn($alias . '.camphurId');
            $criteria->addSelectColumn($alias . '.cprovinceId');
            $criteria->addSelectColumn($alias . '.czip');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliIsalehTableMap::DATABASE_NAME)->getTable(AliIsalehTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliIsalehTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliIsalehTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliIsalehTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliIsaleh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliIsaleh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliIsalehTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliIsaleh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliIsalehTableMap::DATABASE_NAME);
            $criteria->add(AliIsalehTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliIsalehQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliIsalehTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliIsalehTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_isaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliIsalehQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliIsaleh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliIsaleh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliIsalehTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliIsaleh object
        }

        if ($criteria->containsKey(AliIsalehTableMap::COL_ID) && $criteria->keyContainsValue(AliIsalehTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliIsalehTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliIsalehQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliIsalehTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliIsalehTableMap::buildTableMap();
