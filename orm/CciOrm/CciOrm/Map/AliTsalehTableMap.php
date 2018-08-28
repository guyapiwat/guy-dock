<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTsaleh;
use CciOrm\CciOrm\AliTsalehQuery;
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
 * This class defines the structure of the 'ali_tsaleh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTsalehTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTsalehTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_tsaleh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTsaleh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTsaleh';

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
    const COL_SANO = 'ali_tsaleh.sano';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_tsaleh.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_tsaleh.name_t';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_tsaleh.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_tsaleh.sctime';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_tsaleh.inv_code';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_tsaleh.lid';

    /**
     * the column name for the inv_from field
     */
    const COL_INV_FROM = 'ali_tsaleh.inv_from';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_tsaleh.mcode';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_tsaleh.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_tsaleh.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_tsaleh.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_tsaleh.tot_fv';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_tsaleh.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_tsaleh.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_tsaleh.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_tsaleh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_tsaleh.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_tsaleh.uid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_tsaleh.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_tsaleh.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_tsaleh.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_tsaleh.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_tsaleh.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_tsaleh.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_tsaleh.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_tsaleh.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_tsaleh.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_tsaleh.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_tsaleh.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_tsaleh.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_tsaleh.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_tsaleh.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_tsaleh.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_tsaleh.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_tsaleh.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_tsaleh.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_tsaleh.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_tsaleh.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_tsaleh.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_tsaleh.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_tsaleh.txtOther';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_tsaleh.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_tsaleh.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_tsaleh.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_tsaleh.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_tsaleh.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_tsaleh.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_tsaleh.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_tsaleh.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_tsaleh.optionOther';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_tsaleh.discount';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_tsaleh.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_tsaleh.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_tsaleh.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_tsaleh.receive_date';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_tsaleh.print';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_tsaleh.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_tsaleh.ewallet_after';

    /**
     * the column name for the ewallett_before field
     */
    const COL_EWALLETT_BEFORE = 'ali_tsaleh.ewallett_before';

    /**
     * the column name for the ewallett_after field
     */
    const COL_EWALLETT_AFTER = 'ali_tsaleh.ewallett_after';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_tsaleh.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_tsaleh.uid_cancel';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_tsaleh.mbase';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_tsaleh.bprice';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_tsaleh.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_tsaleh.crate';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_tsaleh.checkportal';

    /**
     * the column name for the uid_receive field
     */
    const COL_UID_RECEIVE = 'ali_tsaleh.uid_receive';

    /**
     * the column name for the uid_sender field
     */
    const COL_UID_SENDER = 'ali_tsaleh.uid_sender';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'ali_tsaleh.caddress';

    /**
     * the column name for the cdistrictId field
     */
    const COL_CDISTRICTID = 'ali_tsaleh.cdistrictId';

    /**
     * the column name for the camphurId field
     */
    const COL_CAMPHURID = 'ali_tsaleh.camphurId';

    /**
     * the column name for the cprovinceId field
     */
    const COL_CPROVINCEID = 'ali_tsaleh.cprovinceId';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'ali_tsaleh.czip';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_tsaleh.status';

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
        self::TYPE_COLNAME       => array(AliTsalehTableMap::COL_SANO, AliTsalehTableMap::COL_NAME_F, AliTsalehTableMap::COL_NAME_T, AliTsalehTableMap::COL_SADATE, AliTsalehTableMap::COL_SCTIME, AliTsalehTableMap::COL_INV_CODE, AliTsalehTableMap::COL_LID, AliTsalehTableMap::COL_INV_FROM, AliTsalehTableMap::COL_MCODE, AliTsalehTableMap::COL_TOTAL, AliTsalehTableMap::COL_TOT_PV, AliTsalehTableMap::COL_TOT_BV, AliTsalehTableMap::COL_TOT_FV, AliTsalehTableMap::COL_USERCODE, AliTsalehTableMap::COL_REMARK, AliTsalehTableMap::COL_TRNF, AliTsalehTableMap::COL_ID, AliTsalehTableMap::COL_SA_TYPE, AliTsalehTableMap::COL_UID, AliTsalehTableMap::COL_DL, AliTsalehTableMap::COL_CANCEL, AliTsalehTableMap::COL_SEND, AliTsalehTableMap::COL_TXTOPTION, AliTsalehTableMap::COL_CHKCASH, AliTsalehTableMap::COL_CHKFUTURE, AliTsalehTableMap::COL_CHKTRANSFER, AliTsalehTableMap::COL_CHKCREDIT1, AliTsalehTableMap::COL_CHKCREDIT2, AliTsalehTableMap::COL_CHKCREDIT3, AliTsalehTableMap::COL_CHKINTERNET, AliTsalehTableMap::COL_CHKDISCOUNT, AliTsalehTableMap::COL_CHKOTHER, AliTsalehTableMap::COL_TXTCASH, AliTsalehTableMap::COL_TXTFUTURE, AliTsalehTableMap::COL_TXTTRANSFER, AliTsalehTableMap::COL_EWALLET, AliTsalehTableMap::COL_TXTCREDIT1, AliTsalehTableMap::COL_TXTCREDIT2, AliTsalehTableMap::COL_TXTCREDIT3, AliTsalehTableMap::COL_TXTINTERNET, AliTsalehTableMap::COL_TXTDISCOUNT, AliTsalehTableMap::COL_TXTOTHER, AliTsalehTableMap::COL_OPTIONCASH, AliTsalehTableMap::COL_OPTIONFUTURE, AliTsalehTableMap::COL_OPTIONTRANSFER, AliTsalehTableMap::COL_OPTIONCREDIT1, AliTsalehTableMap::COL_OPTIONCREDIT2, AliTsalehTableMap::COL_OPTIONCREDIT3, AliTsalehTableMap::COL_OPTIONINTERNET, AliTsalehTableMap::COL_OPTIONDISCOUNT, AliTsalehTableMap::COL_OPTIONOTHER, AliTsalehTableMap::COL_DISCOUNT, AliTsalehTableMap::COL_SENDER, AliTsalehTableMap::COL_SENDER_DATE, AliTsalehTableMap::COL_RECEIVE, AliTsalehTableMap::COL_RECEIVE_DATE, AliTsalehTableMap::COL_PRINT, AliTsalehTableMap::COL_EWALLET_BEFORE, AliTsalehTableMap::COL_EWALLET_AFTER, AliTsalehTableMap::COL_EWALLETT_BEFORE, AliTsalehTableMap::COL_EWALLETT_AFTER, AliTsalehTableMap::COL_CANCEL_DATE, AliTsalehTableMap::COL_UID_CANCEL, AliTsalehTableMap::COL_MBASE, AliTsalehTableMap::COL_BPRICE, AliTsalehTableMap::COL_LOCATIONBASE, AliTsalehTableMap::COL_CRATE, AliTsalehTableMap::COL_CHECKPORTAL, AliTsalehTableMap::COL_UID_RECEIVE, AliTsalehTableMap::COL_UID_SENDER, AliTsalehTableMap::COL_CADDRESS, AliTsalehTableMap::COL_CDISTRICTID, AliTsalehTableMap::COL_CAMPHURID, AliTsalehTableMap::COL_CPROVINCEID, AliTsalehTableMap::COL_CZIP, AliTsalehTableMap::COL_STATUS, ),
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
        self::TYPE_COLNAME       => array(AliTsalehTableMap::COL_SANO => 0, AliTsalehTableMap::COL_NAME_F => 1, AliTsalehTableMap::COL_NAME_T => 2, AliTsalehTableMap::COL_SADATE => 3, AliTsalehTableMap::COL_SCTIME => 4, AliTsalehTableMap::COL_INV_CODE => 5, AliTsalehTableMap::COL_LID => 6, AliTsalehTableMap::COL_INV_FROM => 7, AliTsalehTableMap::COL_MCODE => 8, AliTsalehTableMap::COL_TOTAL => 9, AliTsalehTableMap::COL_TOT_PV => 10, AliTsalehTableMap::COL_TOT_BV => 11, AliTsalehTableMap::COL_TOT_FV => 12, AliTsalehTableMap::COL_USERCODE => 13, AliTsalehTableMap::COL_REMARK => 14, AliTsalehTableMap::COL_TRNF => 15, AliTsalehTableMap::COL_ID => 16, AliTsalehTableMap::COL_SA_TYPE => 17, AliTsalehTableMap::COL_UID => 18, AliTsalehTableMap::COL_DL => 19, AliTsalehTableMap::COL_CANCEL => 20, AliTsalehTableMap::COL_SEND => 21, AliTsalehTableMap::COL_TXTOPTION => 22, AliTsalehTableMap::COL_CHKCASH => 23, AliTsalehTableMap::COL_CHKFUTURE => 24, AliTsalehTableMap::COL_CHKTRANSFER => 25, AliTsalehTableMap::COL_CHKCREDIT1 => 26, AliTsalehTableMap::COL_CHKCREDIT2 => 27, AliTsalehTableMap::COL_CHKCREDIT3 => 28, AliTsalehTableMap::COL_CHKINTERNET => 29, AliTsalehTableMap::COL_CHKDISCOUNT => 30, AliTsalehTableMap::COL_CHKOTHER => 31, AliTsalehTableMap::COL_TXTCASH => 32, AliTsalehTableMap::COL_TXTFUTURE => 33, AliTsalehTableMap::COL_TXTTRANSFER => 34, AliTsalehTableMap::COL_EWALLET => 35, AliTsalehTableMap::COL_TXTCREDIT1 => 36, AliTsalehTableMap::COL_TXTCREDIT2 => 37, AliTsalehTableMap::COL_TXTCREDIT3 => 38, AliTsalehTableMap::COL_TXTINTERNET => 39, AliTsalehTableMap::COL_TXTDISCOUNT => 40, AliTsalehTableMap::COL_TXTOTHER => 41, AliTsalehTableMap::COL_OPTIONCASH => 42, AliTsalehTableMap::COL_OPTIONFUTURE => 43, AliTsalehTableMap::COL_OPTIONTRANSFER => 44, AliTsalehTableMap::COL_OPTIONCREDIT1 => 45, AliTsalehTableMap::COL_OPTIONCREDIT2 => 46, AliTsalehTableMap::COL_OPTIONCREDIT3 => 47, AliTsalehTableMap::COL_OPTIONINTERNET => 48, AliTsalehTableMap::COL_OPTIONDISCOUNT => 49, AliTsalehTableMap::COL_OPTIONOTHER => 50, AliTsalehTableMap::COL_DISCOUNT => 51, AliTsalehTableMap::COL_SENDER => 52, AliTsalehTableMap::COL_SENDER_DATE => 53, AliTsalehTableMap::COL_RECEIVE => 54, AliTsalehTableMap::COL_RECEIVE_DATE => 55, AliTsalehTableMap::COL_PRINT => 56, AliTsalehTableMap::COL_EWALLET_BEFORE => 57, AliTsalehTableMap::COL_EWALLET_AFTER => 58, AliTsalehTableMap::COL_EWALLETT_BEFORE => 59, AliTsalehTableMap::COL_EWALLETT_AFTER => 60, AliTsalehTableMap::COL_CANCEL_DATE => 61, AliTsalehTableMap::COL_UID_CANCEL => 62, AliTsalehTableMap::COL_MBASE => 63, AliTsalehTableMap::COL_BPRICE => 64, AliTsalehTableMap::COL_LOCATIONBASE => 65, AliTsalehTableMap::COL_CRATE => 66, AliTsalehTableMap::COL_CHECKPORTAL => 67, AliTsalehTableMap::COL_UID_RECEIVE => 68, AliTsalehTableMap::COL_UID_SENDER => 69, AliTsalehTableMap::COL_CADDRESS => 70, AliTsalehTableMap::COL_CDISTRICTID => 71, AliTsalehTableMap::COL_CAMPHURID => 72, AliTsalehTableMap::COL_CPROVINCEID => 73, AliTsalehTableMap::COL_CZIP => 74, AliTsalehTableMap::COL_STATUS => 75, ),
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
        $this->setName('ali_tsaleh');
        $this->setPhpName('AliTsaleh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTsaleh');
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
        return $withPrefix ? AliTsalehTableMap::CLASS_DEFAULT : AliTsalehTableMap::OM_CLASS;
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
     * @return array           (AliTsaleh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTsalehTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTsalehTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTsalehTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTsalehTableMap::OM_CLASS;
            /** @var AliTsaleh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTsalehTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTsalehTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTsalehTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTsaleh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTsalehTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTsalehTableMap::COL_SANO);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_LID);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_INV_FROM);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_ID);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_UID);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_DL);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_SEND);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_EWALLETT_BEFORE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_EWALLETT_AFTER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_UID_RECEIVE);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_UID_SENDER);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CDISTRICTID);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CAMPHURID);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CPROVINCEID);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_CZIP);
            $criteria->addSelectColumn(AliTsalehTableMap::COL_STATUS);
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTsalehTableMap::DATABASE_NAME)->getTable(AliTsalehTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTsalehTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTsalehTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTsalehTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTsaleh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTsaleh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTsalehTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTsaleh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTsalehTableMap::DATABASE_NAME);
            $criteria->add(AliTsalehTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliTsalehQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTsalehTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTsalehTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_tsaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTsalehQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTsaleh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTsaleh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTsalehTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTsaleh object
        }

        if ($criteria->containsKey(AliTsalehTableMap::COL_ID) && $criteria->keyContainsValue(AliTsalehTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTsalehTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliTsalehQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTsalehTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTsalehTableMap::buildTableMap();
