<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEwalletd;
use CciOrm\CciOrm\AliEwalletdQuery;
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
 * This class defines the structure of the 'ali_ewalletd' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEwalletdTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEwalletdTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ewalletd';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEwalletd';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEwalletd';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 54;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 54;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_ewalletd.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_ewalletd.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_ewalletd.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ewalletd.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_ewalletd.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_ewalletd.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ewalletd.total';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_ewalletd.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_ewalletd.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_ewalletd.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_ewalletd.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_ewalletd.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_ewalletd.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_ewalletd.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_ewalletd.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_ewalletd.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_ewalletd.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_ewalletd.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_ewalletd.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_ewalletd.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_ewalletd.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_ewalletd.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_ewalletd.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_ewalletd.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_ewalletd.chkInternet';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_ewalletd.chkCommission';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_ewalletd.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_ewalletd.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_ewalletd.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_ewalletd.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_ewalletd.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_ewalletd.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_ewalletd.txtInternet';

    /**
     * the column name for the txtCommission field
     */
    const COL_TXTCOMMISSION = 'ali_ewalletd.txtCommission';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_ewalletd.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_ewalletd.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_ewalletd.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_ewalletd.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_ewalletd.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_ewalletd.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_ewalletd.optionInternet';

    /**
     * the column name for the optionCommission field
     */
    const COL_OPTIONCOMMISSION = 'ali_ewalletd.optionCommission';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_ewalletd.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_ewalletd.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_ewalletd.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_ewalletd.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_ewalletd.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_ewalletd.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_ewalletd.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_ewalletd.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_ewalletd.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_ewalletd.locationbase';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_ewalletd.mbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_ewalletd.crate';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sadate', 'InvCode', 'Mcode', 'NameF', 'NameT', 'Total', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkinternet', 'Chkcommission', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtinternet', 'Txtcommission', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioninternet', 'Optioncommission', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Mbase', 'Crate', ),
        self::TYPE_CAMELNAME     => array('sano', 'sadate', 'invCode', 'mcode', 'nameF', 'nameT', 'total', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkinternet', 'chkcommission', 'txtcash', 'txtfuture', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtinternet', 'txtcommission', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioninternet', 'optioncommission', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'mbase', 'crate', ),
        self::TYPE_COLNAME       => array(AliEwalletdTableMap::COL_SANO, AliEwalletdTableMap::COL_SADATE, AliEwalletdTableMap::COL_INV_CODE, AliEwalletdTableMap::COL_MCODE, AliEwalletdTableMap::COL_NAME_F, AliEwalletdTableMap::COL_NAME_T, AliEwalletdTableMap::COL_TOTAL, AliEwalletdTableMap::COL_USERCODE, AliEwalletdTableMap::COL_REMARK, AliEwalletdTableMap::COL_TRNF, AliEwalletdTableMap::COL_ID, AliEwalletdTableMap::COL_SA_TYPE, AliEwalletdTableMap::COL_UID, AliEwalletdTableMap::COL_LID, AliEwalletdTableMap::COL_DL, AliEwalletdTableMap::COL_CANCEL, AliEwalletdTableMap::COL_SEND, AliEwalletdTableMap::COL_TXTMONEY, AliEwalletdTableMap::COL_CHKCASH, AliEwalletdTableMap::COL_CHKFUTURE, AliEwalletdTableMap::COL_CHKTRANSFER, AliEwalletdTableMap::COL_CHKCREDIT1, AliEwalletdTableMap::COL_CHKCREDIT2, AliEwalletdTableMap::COL_CHKCREDIT3, AliEwalletdTableMap::COL_CHKINTERNET, AliEwalletdTableMap::COL_CHKCOMMISSION, AliEwalletdTableMap::COL_TXTCASH, AliEwalletdTableMap::COL_TXTFUTURE, AliEwalletdTableMap::COL_TXTTRANSFER, AliEwalletdTableMap::COL_TXTCREDIT1, AliEwalletdTableMap::COL_TXTCREDIT2, AliEwalletdTableMap::COL_TXTCREDIT3, AliEwalletdTableMap::COL_TXTINTERNET, AliEwalletdTableMap::COL_TXTCOMMISSION, AliEwalletdTableMap::COL_OPTIONCASH, AliEwalletdTableMap::COL_OPTIONFUTURE, AliEwalletdTableMap::COL_OPTIONTRANSFER, AliEwalletdTableMap::COL_OPTIONCREDIT1, AliEwalletdTableMap::COL_OPTIONCREDIT2, AliEwalletdTableMap::COL_OPTIONCREDIT3, AliEwalletdTableMap::COL_OPTIONINTERNET, AliEwalletdTableMap::COL_OPTIONCOMMISSION, AliEwalletdTableMap::COL_TXTOPTION, AliEwalletdTableMap::COL_EWALLET, AliEwalletdTableMap::COL_EWALLET_BEFORE, AliEwalletdTableMap::COL_EWALLET_AFTER, AliEwalletdTableMap::COL_IPAY, AliEwalletdTableMap::COL_CHECKPORTAL, AliEwalletdTableMap::COL_BPRICE, AliEwalletdTableMap::COL_CANCEL_DATE, AliEwalletdTableMap::COL_UID_CANCEL, AliEwalletdTableMap::COL_LOCATIONBASE, AliEwalletdTableMap::COL_MBASE, AliEwalletdTableMap::COL_CRATE, ),
        self::TYPE_FIELDNAME     => array('sano', 'sadate', 'inv_code', 'mcode', 'name_f', 'name_t', 'total', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkInternet', 'chkCommission', 'txtCash', 'txtFuture', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtInternet', 'txtCommission', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionInternet', 'optionCommission', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'mbase', 'crate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sadate' => 1, 'InvCode' => 2, 'Mcode' => 3, 'NameF' => 4, 'NameT' => 5, 'Total' => 6, 'Usercode' => 7, 'Remark' => 8, 'Trnf' => 9, 'Id' => 10, 'SaType' => 11, 'Uid' => 12, 'Lid' => 13, 'Dl' => 14, 'Cancel' => 15, 'Send' => 16, 'Txtmoney' => 17, 'Chkcash' => 18, 'Chkfuture' => 19, 'Chktransfer' => 20, 'Chkcredit1' => 21, 'Chkcredit2' => 22, 'Chkcredit3' => 23, 'Chkinternet' => 24, 'Chkcommission' => 25, 'Txtcash' => 26, 'Txtfuture' => 27, 'Txttransfer' => 28, 'Txtcredit1' => 29, 'Txtcredit2' => 30, 'Txtcredit3' => 31, 'Txtinternet' => 32, 'Txtcommission' => 33, 'Optioncash' => 34, 'Optionfuture' => 35, 'Optiontransfer' => 36, 'Optioncredit1' => 37, 'Optioncredit2' => 38, 'Optioncredit3' => 39, 'Optioninternet' => 40, 'Optioncommission' => 41, 'Txtoption' => 42, 'Ewallet' => 43, 'EwalletBefore' => 44, 'EwalletAfter' => 45, 'Ipay' => 46, 'Checkportal' => 47, 'Bprice' => 48, 'CancelDate' => 49, 'UidCancel' => 50, 'Locationbase' => 51, 'Mbase' => 52, 'Crate' => 53, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sadate' => 1, 'invCode' => 2, 'mcode' => 3, 'nameF' => 4, 'nameT' => 5, 'total' => 6, 'usercode' => 7, 'remark' => 8, 'trnf' => 9, 'id' => 10, 'saType' => 11, 'uid' => 12, 'lid' => 13, 'dl' => 14, 'cancel' => 15, 'send' => 16, 'txtmoney' => 17, 'chkcash' => 18, 'chkfuture' => 19, 'chktransfer' => 20, 'chkcredit1' => 21, 'chkcredit2' => 22, 'chkcredit3' => 23, 'chkinternet' => 24, 'chkcommission' => 25, 'txtcash' => 26, 'txtfuture' => 27, 'txttransfer' => 28, 'txtcredit1' => 29, 'txtcredit2' => 30, 'txtcredit3' => 31, 'txtinternet' => 32, 'txtcommission' => 33, 'optioncash' => 34, 'optionfuture' => 35, 'optiontransfer' => 36, 'optioncredit1' => 37, 'optioncredit2' => 38, 'optioncredit3' => 39, 'optioninternet' => 40, 'optioncommission' => 41, 'txtoption' => 42, 'ewallet' => 43, 'ewalletBefore' => 44, 'ewalletAfter' => 45, 'ipay' => 46, 'checkportal' => 47, 'bprice' => 48, 'cancelDate' => 49, 'uidCancel' => 50, 'locationbase' => 51, 'mbase' => 52, 'crate' => 53, ),
        self::TYPE_COLNAME       => array(AliEwalletdTableMap::COL_SANO => 0, AliEwalletdTableMap::COL_SADATE => 1, AliEwalletdTableMap::COL_INV_CODE => 2, AliEwalletdTableMap::COL_MCODE => 3, AliEwalletdTableMap::COL_NAME_F => 4, AliEwalletdTableMap::COL_NAME_T => 5, AliEwalletdTableMap::COL_TOTAL => 6, AliEwalletdTableMap::COL_USERCODE => 7, AliEwalletdTableMap::COL_REMARK => 8, AliEwalletdTableMap::COL_TRNF => 9, AliEwalletdTableMap::COL_ID => 10, AliEwalletdTableMap::COL_SA_TYPE => 11, AliEwalletdTableMap::COL_UID => 12, AliEwalletdTableMap::COL_LID => 13, AliEwalletdTableMap::COL_DL => 14, AliEwalletdTableMap::COL_CANCEL => 15, AliEwalletdTableMap::COL_SEND => 16, AliEwalletdTableMap::COL_TXTMONEY => 17, AliEwalletdTableMap::COL_CHKCASH => 18, AliEwalletdTableMap::COL_CHKFUTURE => 19, AliEwalletdTableMap::COL_CHKTRANSFER => 20, AliEwalletdTableMap::COL_CHKCREDIT1 => 21, AliEwalletdTableMap::COL_CHKCREDIT2 => 22, AliEwalletdTableMap::COL_CHKCREDIT3 => 23, AliEwalletdTableMap::COL_CHKINTERNET => 24, AliEwalletdTableMap::COL_CHKCOMMISSION => 25, AliEwalletdTableMap::COL_TXTCASH => 26, AliEwalletdTableMap::COL_TXTFUTURE => 27, AliEwalletdTableMap::COL_TXTTRANSFER => 28, AliEwalletdTableMap::COL_TXTCREDIT1 => 29, AliEwalletdTableMap::COL_TXTCREDIT2 => 30, AliEwalletdTableMap::COL_TXTCREDIT3 => 31, AliEwalletdTableMap::COL_TXTINTERNET => 32, AliEwalletdTableMap::COL_TXTCOMMISSION => 33, AliEwalletdTableMap::COL_OPTIONCASH => 34, AliEwalletdTableMap::COL_OPTIONFUTURE => 35, AliEwalletdTableMap::COL_OPTIONTRANSFER => 36, AliEwalletdTableMap::COL_OPTIONCREDIT1 => 37, AliEwalletdTableMap::COL_OPTIONCREDIT2 => 38, AliEwalletdTableMap::COL_OPTIONCREDIT3 => 39, AliEwalletdTableMap::COL_OPTIONINTERNET => 40, AliEwalletdTableMap::COL_OPTIONCOMMISSION => 41, AliEwalletdTableMap::COL_TXTOPTION => 42, AliEwalletdTableMap::COL_EWALLET => 43, AliEwalletdTableMap::COL_EWALLET_BEFORE => 44, AliEwalletdTableMap::COL_EWALLET_AFTER => 45, AliEwalletdTableMap::COL_IPAY => 46, AliEwalletdTableMap::COL_CHECKPORTAL => 47, AliEwalletdTableMap::COL_BPRICE => 48, AliEwalletdTableMap::COL_CANCEL_DATE => 49, AliEwalletdTableMap::COL_UID_CANCEL => 50, AliEwalletdTableMap::COL_LOCATIONBASE => 51, AliEwalletdTableMap::COL_MBASE => 52, AliEwalletdTableMap::COL_CRATE => 53, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sadate' => 1, 'inv_code' => 2, 'mcode' => 3, 'name_f' => 4, 'name_t' => 5, 'total' => 6, 'usercode' => 7, 'remark' => 8, 'trnf' => 9, 'id' => 10, 'sa_type' => 11, 'uid' => 12, 'lid' => 13, 'dl' => 14, 'cancel' => 15, 'send' => 16, 'txtMoney' => 17, 'chkCash' => 18, 'chkFuture' => 19, 'chkTransfer' => 20, 'chkCredit1' => 21, 'chkCredit2' => 22, 'chkCredit3' => 23, 'chkInternet' => 24, 'chkCommission' => 25, 'txtCash' => 26, 'txtFuture' => 27, 'txtTransfer' => 28, 'txtCredit1' => 29, 'txtCredit2' => 30, 'txtCredit3' => 31, 'txtInternet' => 32, 'txtCommission' => 33, 'optionCash' => 34, 'optionFuture' => 35, 'optionTransfer' => 36, 'optionCredit1' => 37, 'optionCredit2' => 38, 'optionCredit3' => 39, 'optionInternet' => 40, 'optionCommission' => 41, 'txtoption' => 42, 'ewallet' => 43, 'ewallet_before' => 44, 'ewallet_after' => 45, 'ipay' => 46, 'checkportal' => 47, 'bprice' => 48, 'cancel_date' => 49, 'uid_cancel' => 50, 'locationbase' => 51, 'mbase' => 52, 'crate' => 53, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, )
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
        $this->setName('ali_ewalletd');
        $this->setPhpName('AliEwalletd');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEwalletd');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 3, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 40, null);
        $this->addColumn('trnf', 'Trnf', 'VARCHAR', false, 1, null);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sa_type', 'SaType', 'CHAR', true, 2, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('lid', 'Lid', 'VARCHAR', true, 255, null);
        $this->addColumn('dl', 'Dl', 'CHAR', true, null, null);
        $this->addColumn('cancel', 'Cancel', 'INTEGER', true, 2, null);
        $this->addColumn('send', 'Send', 'INTEGER', true, null, null);
        $this->addColumn('txtMoney', 'Txtmoney', 'DECIMAL', true, 15, null);
        $this->addColumn('chkCash', 'Chkcash', 'VARCHAR', true, 255, null);
        $this->addColumn('chkFuture', 'Chkfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('chkTransfer', 'Chktransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit1', 'Chkcredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit2', 'Chkcredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit3', 'Chkcredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('chkInternet', 'Chkinternet', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCommission', 'Chkcommission', 'VARCHAR', true, 255, null);
        $this->addColumn('txtCash', 'Txtcash', 'DECIMAL', true, 15, null);
        $this->addColumn('txtFuture', 'Txtfuture', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer', 'Txttransfer', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit1', 'Txtcredit1', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit2', 'Txtcredit2', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit3', 'Txtcredit3', 'DECIMAL', true, 15, null);
        $this->addColumn('txtInternet', 'Txtinternet', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCommission', 'Txtcommission', 'DECIMAL', true, 15, null);
        $this->addColumn('optionCash', 'Optioncash', 'VARCHAR', true, 255, null);
        $this->addColumn('optionFuture', 'Optionfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer', 'Optiontransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit1', 'Optioncredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit2', 'Optioncredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit3', 'Optioncredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('optionInternet', 'Optioninternet', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCommission', 'Optioncommission', 'VARCHAR', true, 255, null);
        $this->addColumn('txtoption', 'Txtoption', 'CLOB', true, null, null);
        $this->addColumn('ewallet', 'Ewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_before', 'EwalletBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_after', 'EwalletAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('ipay', 'Ipay', 'VARCHAR', true, 255, null);
        $this->addColumn('checkportal', 'Checkportal', 'INTEGER', true, null, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('cancel_date', 'CancelDate', 'DATE', true, null, null);
        $this->addColumn('uid_cancel', 'UidCancel', 'VARCHAR', true, 255, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('mbase', 'Mbase', 'VARCHAR', true, 244, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 10 + $offset
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
        return $withPrefix ? AliEwalletdTableMap::CLASS_DEFAULT : AliEwalletdTableMap::OM_CLASS;
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
     * @return array           (AliEwalletd object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEwalletdTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEwalletdTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEwalletdTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEwalletdTableMap::OM_CLASS;
            /** @var AliEwalletd $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEwalletdTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEwalletdTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEwalletdTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEwalletd $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEwalletdTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_ID);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_UID);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_LID);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_DL);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_SEND);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTCOMMISSION);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_OPTIONCOMMISSION);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliEwalletdTableMap::COL_CRATE);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
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
            $criteria->addSelectColumn($alias . '.txtMoney');
            $criteria->addSelectColumn($alias . '.chkCash');
            $criteria->addSelectColumn($alias . '.chkFuture');
            $criteria->addSelectColumn($alias . '.chkTransfer');
            $criteria->addSelectColumn($alias . '.chkCredit1');
            $criteria->addSelectColumn($alias . '.chkCredit2');
            $criteria->addSelectColumn($alias . '.chkCredit3');
            $criteria->addSelectColumn($alias . '.chkInternet');
            $criteria->addSelectColumn($alias . '.chkCommission');
            $criteria->addSelectColumn($alias . '.txtCash');
            $criteria->addSelectColumn($alias . '.txtFuture');
            $criteria->addSelectColumn($alias . '.txtTransfer');
            $criteria->addSelectColumn($alias . '.txtCredit1');
            $criteria->addSelectColumn($alias . '.txtCredit2');
            $criteria->addSelectColumn($alias . '.txtCredit3');
            $criteria->addSelectColumn($alias . '.txtInternet');
            $criteria->addSelectColumn($alias . '.txtCommission');
            $criteria->addSelectColumn($alias . '.optionCash');
            $criteria->addSelectColumn($alias . '.optionFuture');
            $criteria->addSelectColumn($alias . '.optionTransfer');
            $criteria->addSelectColumn($alias . '.optionCredit1');
            $criteria->addSelectColumn($alias . '.optionCredit2');
            $criteria->addSelectColumn($alias . '.optionCredit3');
            $criteria->addSelectColumn($alias . '.optionInternet');
            $criteria->addSelectColumn($alias . '.optionCommission');
            $criteria->addSelectColumn($alias . '.txtoption');
            $criteria->addSelectColumn($alias . '.ewallet');
            $criteria->addSelectColumn($alias . '.ewallet_before');
            $criteria->addSelectColumn($alias . '.ewallet_after');
            $criteria->addSelectColumn($alias . '.ipay');
            $criteria->addSelectColumn($alias . '.checkportal');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.cancel_date');
            $criteria->addSelectColumn($alias . '.uid_cancel');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.mbase');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEwalletdTableMap::DATABASE_NAME)->getTable(AliEwalletdTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEwalletdTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEwalletdTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEwalletdTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEwalletd or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEwalletd object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletdTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEwalletd) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEwalletdTableMap::DATABASE_NAME);
            $criteria->add(AliEwalletdTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEwalletdQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEwalletdTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEwalletdTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ewalletd table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEwalletdQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEwalletd or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEwalletd object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletdTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEwalletd object
        }

        if ($criteria->containsKey(AliEwalletdTableMap::COL_ID) && $criteria->keyContainsValue(AliEwalletdTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEwalletdTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEwalletdQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEwalletdTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEwalletdTableMap::buildTableMap();
