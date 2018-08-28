<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEwalletTranfer;
use CciOrm\CciOrm\AliEwalletTranferQuery;
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
 * This class defines the structure of the 'ali_ewallet_tranfer' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEwalletTranferTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEwalletTranferTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ewallet_tranfer';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEwalletTranfer';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEwalletTranfer';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 60;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 60;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_ewallet_tranfer.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_ewallet_tranfer.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_ewallet_tranfer.sctime';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_ewallet_tranfer.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ewallet_tranfer.mcode';

    /**
     * the column name for the smcode field
     */
    const COL_SMCODE = 'ali_ewallet_tranfer.smcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_ewallet_tranfer.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_ewallet_tranfer.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ewallet_tranfer.total';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_ewallet_tranfer.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_ewallet_tranfer.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_ewallet_tranfer.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_ewallet_tranfer.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_ewallet_tranfer.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_ewallet_tranfer.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_ewallet_tranfer.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_ewallet_tranfer.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_ewallet_tranfer.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_ewallet_tranfer.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_ewallet_tranfer.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_ewallet_tranfer.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_ewallet_tranfer.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_ewallet_tranfer.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_ewallet_tranfer.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_ewallet_tranfer.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_ewallet_tranfer.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_ewallet_tranfer.chkInternet';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_ewallet_tranfer.chkCommission';

    /**
     * the column name for the chkWithdraw field
     */
    const COL_CHKWITHDRAW = 'ali_ewallet_tranfer.chkWithdraw';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_ewallet_tranfer.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_ewallet_tranfer.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_ewallet_tranfer.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_ewallet_tranfer.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_ewallet_tranfer.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_ewallet_tranfer.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_ewallet_tranfer.txtInternet';

    /**
     * the column name for the txtCommission field
     */
    const COL_TXTCOMMISSION = 'ali_ewallet_tranfer.txtCommission';

    /**
     * the column name for the txtWithdraw field
     */
    const COL_TXTWITHDRAW = 'ali_ewallet_tranfer.txtWithdraw';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_ewallet_tranfer.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_ewallet_tranfer.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_ewallet_tranfer.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_ewallet_tranfer.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_ewallet_tranfer.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_ewallet_tranfer.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_ewallet_tranfer.optionInternet';

    /**
     * the column name for the optionCommission field
     */
    const COL_OPTIONCOMMISSION = 'ali_ewallet_tranfer.optionCommission';

    /**
     * the column name for the optionWithdraw field
     */
    const COL_OPTIONWITHDRAW = 'ali_ewallet_tranfer.optionWithdraw';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_ewallet_tranfer.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_ewallet_tranfer.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_ewallet_tranfer.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_ewallet_tranfer.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_ewallet_tranfer.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_ewallet_tranfer.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_ewallet_tranfer.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_ewallet_tranfer.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_ewallet_tranfer.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_ewallet_tranfer.locationbase';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_ewallet_tranfer.mbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_ewallet_tranfer.crate';

    /**
     * the column name for the echeck field
     */
    const COL_ECHECK = 'ali_ewallet_tranfer.echeck';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sadate', 'Sctime', 'InvCode', 'Mcode', 'Smcode', 'NameF', 'NameT', 'Total', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkinternet', 'Chkcommission', 'Chkwithdraw', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtinternet', 'Txtcommission', 'Txtwithdraw', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioninternet', 'Optioncommission', 'Optionwithdraw', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Mbase', 'Crate', 'Echeck', ),
        self::TYPE_CAMELNAME     => array('sano', 'sadate', 'sctime', 'invCode', 'mcode', 'smcode', 'nameF', 'nameT', 'total', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkinternet', 'chkcommission', 'chkwithdraw', 'txtcash', 'txtfuture', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtinternet', 'txtcommission', 'txtwithdraw', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioninternet', 'optioncommission', 'optionwithdraw', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'mbase', 'crate', 'echeck', ),
        self::TYPE_COLNAME       => array(AliEwalletTranferTableMap::COL_SANO, AliEwalletTranferTableMap::COL_SADATE, AliEwalletTranferTableMap::COL_SCTIME, AliEwalletTranferTableMap::COL_INV_CODE, AliEwalletTranferTableMap::COL_MCODE, AliEwalletTranferTableMap::COL_SMCODE, AliEwalletTranferTableMap::COL_NAME_F, AliEwalletTranferTableMap::COL_NAME_T, AliEwalletTranferTableMap::COL_TOTAL, AliEwalletTranferTableMap::COL_USERCODE, AliEwalletTranferTableMap::COL_REMARK, AliEwalletTranferTableMap::COL_TRNF, AliEwalletTranferTableMap::COL_ID, AliEwalletTranferTableMap::COL_SA_TYPE, AliEwalletTranferTableMap::COL_UID, AliEwalletTranferTableMap::COL_LID, AliEwalletTranferTableMap::COL_DL, AliEwalletTranferTableMap::COL_CANCEL, AliEwalletTranferTableMap::COL_SEND, AliEwalletTranferTableMap::COL_TXTMONEY, AliEwalletTranferTableMap::COL_CHKCASH, AliEwalletTranferTableMap::COL_CHKFUTURE, AliEwalletTranferTableMap::COL_CHKTRANSFER, AliEwalletTranferTableMap::COL_CHKCREDIT1, AliEwalletTranferTableMap::COL_CHKCREDIT2, AliEwalletTranferTableMap::COL_CHKCREDIT3, AliEwalletTranferTableMap::COL_CHKINTERNET, AliEwalletTranferTableMap::COL_CHKCOMMISSION, AliEwalletTranferTableMap::COL_CHKWITHDRAW, AliEwalletTranferTableMap::COL_TXTCASH, AliEwalletTranferTableMap::COL_TXTFUTURE, AliEwalletTranferTableMap::COL_TXTTRANSFER, AliEwalletTranferTableMap::COL_TXTCREDIT1, AliEwalletTranferTableMap::COL_TXTCREDIT2, AliEwalletTranferTableMap::COL_TXTCREDIT3, AliEwalletTranferTableMap::COL_TXTINTERNET, AliEwalletTranferTableMap::COL_TXTCOMMISSION, AliEwalletTranferTableMap::COL_TXTWITHDRAW, AliEwalletTranferTableMap::COL_OPTIONCASH, AliEwalletTranferTableMap::COL_OPTIONFUTURE, AliEwalletTranferTableMap::COL_OPTIONTRANSFER, AliEwalletTranferTableMap::COL_OPTIONCREDIT1, AliEwalletTranferTableMap::COL_OPTIONCREDIT2, AliEwalletTranferTableMap::COL_OPTIONCREDIT3, AliEwalletTranferTableMap::COL_OPTIONINTERNET, AliEwalletTranferTableMap::COL_OPTIONCOMMISSION, AliEwalletTranferTableMap::COL_OPTIONWITHDRAW, AliEwalletTranferTableMap::COL_TXTOPTION, AliEwalletTranferTableMap::COL_EWALLET, AliEwalletTranferTableMap::COL_EWALLET_BEFORE, AliEwalletTranferTableMap::COL_EWALLET_AFTER, AliEwalletTranferTableMap::COL_IPAY, AliEwalletTranferTableMap::COL_CHECKPORTAL, AliEwalletTranferTableMap::COL_BPRICE, AliEwalletTranferTableMap::COL_CANCEL_DATE, AliEwalletTranferTableMap::COL_UID_CANCEL, AliEwalletTranferTableMap::COL_LOCATIONBASE, AliEwalletTranferTableMap::COL_MBASE, AliEwalletTranferTableMap::COL_CRATE, AliEwalletTranferTableMap::COL_ECHECK, ),
        self::TYPE_FIELDNAME     => array('sano', 'sadate', 'sctime', 'inv_code', 'mcode', 'smcode', 'name_f', 'name_t', 'total', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkInternet', 'chkCommission', 'chkWithdraw', 'txtCash', 'txtFuture', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtInternet', 'txtCommission', 'txtWithdraw', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionInternet', 'optionCommission', 'optionWithdraw', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'mbase', 'crate', 'echeck', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sadate' => 1, 'Sctime' => 2, 'InvCode' => 3, 'Mcode' => 4, 'Smcode' => 5, 'NameF' => 6, 'NameT' => 7, 'Total' => 8, 'Usercode' => 9, 'Remark' => 10, 'Trnf' => 11, 'Id' => 12, 'SaType' => 13, 'Uid' => 14, 'Lid' => 15, 'Dl' => 16, 'Cancel' => 17, 'Send' => 18, 'Txtmoney' => 19, 'Chkcash' => 20, 'Chkfuture' => 21, 'Chktransfer' => 22, 'Chkcredit1' => 23, 'Chkcredit2' => 24, 'Chkcredit3' => 25, 'Chkinternet' => 26, 'Chkcommission' => 27, 'Chkwithdraw' => 28, 'Txtcash' => 29, 'Txtfuture' => 30, 'Txttransfer' => 31, 'Txtcredit1' => 32, 'Txtcredit2' => 33, 'Txtcredit3' => 34, 'Txtinternet' => 35, 'Txtcommission' => 36, 'Txtwithdraw' => 37, 'Optioncash' => 38, 'Optionfuture' => 39, 'Optiontransfer' => 40, 'Optioncredit1' => 41, 'Optioncredit2' => 42, 'Optioncredit3' => 43, 'Optioninternet' => 44, 'Optioncommission' => 45, 'Optionwithdraw' => 46, 'Txtoption' => 47, 'Ewallet' => 48, 'EwalletBefore' => 49, 'EwalletAfter' => 50, 'Ipay' => 51, 'Checkportal' => 52, 'Bprice' => 53, 'CancelDate' => 54, 'UidCancel' => 55, 'Locationbase' => 56, 'Mbase' => 57, 'Crate' => 58, 'Echeck' => 59, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sadate' => 1, 'sctime' => 2, 'invCode' => 3, 'mcode' => 4, 'smcode' => 5, 'nameF' => 6, 'nameT' => 7, 'total' => 8, 'usercode' => 9, 'remark' => 10, 'trnf' => 11, 'id' => 12, 'saType' => 13, 'uid' => 14, 'lid' => 15, 'dl' => 16, 'cancel' => 17, 'send' => 18, 'txtmoney' => 19, 'chkcash' => 20, 'chkfuture' => 21, 'chktransfer' => 22, 'chkcredit1' => 23, 'chkcredit2' => 24, 'chkcredit3' => 25, 'chkinternet' => 26, 'chkcommission' => 27, 'chkwithdraw' => 28, 'txtcash' => 29, 'txtfuture' => 30, 'txttransfer' => 31, 'txtcredit1' => 32, 'txtcredit2' => 33, 'txtcredit3' => 34, 'txtinternet' => 35, 'txtcommission' => 36, 'txtwithdraw' => 37, 'optioncash' => 38, 'optionfuture' => 39, 'optiontransfer' => 40, 'optioncredit1' => 41, 'optioncredit2' => 42, 'optioncredit3' => 43, 'optioninternet' => 44, 'optioncommission' => 45, 'optionwithdraw' => 46, 'txtoption' => 47, 'ewallet' => 48, 'ewalletBefore' => 49, 'ewalletAfter' => 50, 'ipay' => 51, 'checkportal' => 52, 'bprice' => 53, 'cancelDate' => 54, 'uidCancel' => 55, 'locationbase' => 56, 'mbase' => 57, 'crate' => 58, 'echeck' => 59, ),
        self::TYPE_COLNAME       => array(AliEwalletTranferTableMap::COL_SANO => 0, AliEwalletTranferTableMap::COL_SADATE => 1, AliEwalletTranferTableMap::COL_SCTIME => 2, AliEwalletTranferTableMap::COL_INV_CODE => 3, AliEwalletTranferTableMap::COL_MCODE => 4, AliEwalletTranferTableMap::COL_SMCODE => 5, AliEwalletTranferTableMap::COL_NAME_F => 6, AliEwalletTranferTableMap::COL_NAME_T => 7, AliEwalletTranferTableMap::COL_TOTAL => 8, AliEwalletTranferTableMap::COL_USERCODE => 9, AliEwalletTranferTableMap::COL_REMARK => 10, AliEwalletTranferTableMap::COL_TRNF => 11, AliEwalletTranferTableMap::COL_ID => 12, AliEwalletTranferTableMap::COL_SA_TYPE => 13, AliEwalletTranferTableMap::COL_UID => 14, AliEwalletTranferTableMap::COL_LID => 15, AliEwalletTranferTableMap::COL_DL => 16, AliEwalletTranferTableMap::COL_CANCEL => 17, AliEwalletTranferTableMap::COL_SEND => 18, AliEwalletTranferTableMap::COL_TXTMONEY => 19, AliEwalletTranferTableMap::COL_CHKCASH => 20, AliEwalletTranferTableMap::COL_CHKFUTURE => 21, AliEwalletTranferTableMap::COL_CHKTRANSFER => 22, AliEwalletTranferTableMap::COL_CHKCREDIT1 => 23, AliEwalletTranferTableMap::COL_CHKCREDIT2 => 24, AliEwalletTranferTableMap::COL_CHKCREDIT3 => 25, AliEwalletTranferTableMap::COL_CHKINTERNET => 26, AliEwalletTranferTableMap::COL_CHKCOMMISSION => 27, AliEwalletTranferTableMap::COL_CHKWITHDRAW => 28, AliEwalletTranferTableMap::COL_TXTCASH => 29, AliEwalletTranferTableMap::COL_TXTFUTURE => 30, AliEwalletTranferTableMap::COL_TXTTRANSFER => 31, AliEwalletTranferTableMap::COL_TXTCREDIT1 => 32, AliEwalletTranferTableMap::COL_TXTCREDIT2 => 33, AliEwalletTranferTableMap::COL_TXTCREDIT3 => 34, AliEwalletTranferTableMap::COL_TXTINTERNET => 35, AliEwalletTranferTableMap::COL_TXTCOMMISSION => 36, AliEwalletTranferTableMap::COL_TXTWITHDRAW => 37, AliEwalletTranferTableMap::COL_OPTIONCASH => 38, AliEwalletTranferTableMap::COL_OPTIONFUTURE => 39, AliEwalletTranferTableMap::COL_OPTIONTRANSFER => 40, AliEwalletTranferTableMap::COL_OPTIONCREDIT1 => 41, AliEwalletTranferTableMap::COL_OPTIONCREDIT2 => 42, AliEwalletTranferTableMap::COL_OPTIONCREDIT3 => 43, AliEwalletTranferTableMap::COL_OPTIONINTERNET => 44, AliEwalletTranferTableMap::COL_OPTIONCOMMISSION => 45, AliEwalletTranferTableMap::COL_OPTIONWITHDRAW => 46, AliEwalletTranferTableMap::COL_TXTOPTION => 47, AliEwalletTranferTableMap::COL_EWALLET => 48, AliEwalletTranferTableMap::COL_EWALLET_BEFORE => 49, AliEwalletTranferTableMap::COL_EWALLET_AFTER => 50, AliEwalletTranferTableMap::COL_IPAY => 51, AliEwalletTranferTableMap::COL_CHECKPORTAL => 52, AliEwalletTranferTableMap::COL_BPRICE => 53, AliEwalletTranferTableMap::COL_CANCEL_DATE => 54, AliEwalletTranferTableMap::COL_UID_CANCEL => 55, AliEwalletTranferTableMap::COL_LOCATIONBASE => 56, AliEwalletTranferTableMap::COL_MBASE => 57, AliEwalletTranferTableMap::COL_CRATE => 58, AliEwalletTranferTableMap::COL_ECHECK => 59, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sadate' => 1, 'sctime' => 2, 'inv_code' => 3, 'mcode' => 4, 'smcode' => 5, 'name_f' => 6, 'name_t' => 7, 'total' => 8, 'usercode' => 9, 'remark' => 10, 'trnf' => 11, 'id' => 12, 'sa_type' => 13, 'uid' => 14, 'lid' => 15, 'dl' => 16, 'cancel' => 17, 'send' => 18, 'txtMoney' => 19, 'chkCash' => 20, 'chkFuture' => 21, 'chkTransfer' => 22, 'chkCredit1' => 23, 'chkCredit2' => 24, 'chkCredit3' => 25, 'chkInternet' => 26, 'chkCommission' => 27, 'chkWithdraw' => 28, 'txtCash' => 29, 'txtFuture' => 30, 'txtTransfer' => 31, 'txtCredit1' => 32, 'txtCredit2' => 33, 'txtCredit3' => 34, 'txtInternet' => 35, 'txtCommission' => 36, 'txtWithdraw' => 37, 'optionCash' => 38, 'optionFuture' => 39, 'optionTransfer' => 40, 'optionCredit1' => 41, 'optionCredit2' => 42, 'optionCredit3' => 43, 'optionInternet' => 44, 'optionCommission' => 45, 'optionWithdraw' => 46, 'txtoption' => 47, 'ewallet' => 48, 'ewallet_before' => 49, 'ewallet_after' => 50, 'ipay' => 51, 'checkportal' => 52, 'bprice' => 53, 'cancel_date' => 54, 'uid_cancel' => 55, 'locationbase' => 56, 'mbase' => 57, 'crate' => 58, 'echeck' => 59, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, )
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
        $this->setName('ali_ewallet_tranfer');
        $this->setPhpName('AliEwalletTranfer');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEwalletTranfer');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('sctime', 'Sctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('smcode', 'Smcode', 'VARCHAR', true, 255, null);
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
        $this->addColumn('chkWithdraw', 'Chkwithdraw', 'VARCHAR', true, 255, null);
        $this->addColumn('txtCash', 'Txtcash', 'DECIMAL', true, 15, null);
        $this->addColumn('txtFuture', 'Txtfuture', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer', 'Txttransfer', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit1', 'Txtcredit1', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit2', 'Txtcredit2', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit3', 'Txtcredit3', 'DECIMAL', true, 15, null);
        $this->addColumn('txtInternet', 'Txtinternet', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCommission', 'Txtcommission', 'DECIMAL', true, 15, null);
        $this->addColumn('txtWithdraw', 'Txtwithdraw', 'DECIMAL', true, 15, null);
        $this->addColumn('optionCash', 'Optioncash', 'VARCHAR', true, 255, null);
        $this->addColumn('optionFuture', 'Optionfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer', 'Optiontransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit1', 'Optioncredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit2', 'Optioncredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit3', 'Optioncredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('optionInternet', 'Optioninternet', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCommission', 'Optioncommission', 'VARCHAR', true, 255, null);
        $this->addColumn('optionWithdraw', 'Optionwithdraw', 'VARCHAR', true, 255, null);
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
        $this->addColumn('echeck', 'Echeck', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 12 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 12 + $offset
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
        return $withPrefix ? AliEwalletTranferTableMap::CLASS_DEFAULT : AliEwalletTranferTableMap::OM_CLASS;
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
     * @return array           (AliEwalletTranfer object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEwalletTranferTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEwalletTranferTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEwalletTranferTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEwalletTranferTableMap::OM_CLASS;
            /** @var AliEwalletTranfer $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEwalletTranferTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEwalletTranferTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEwalletTranferTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEwalletTranfer $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEwalletTranferTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_SMCODE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_ID);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_UID);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_LID);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_DL);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_SEND);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHKWITHDRAW);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTCOMMISSION);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTWITHDRAW);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONCOMMISSION);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_OPTIONWITHDRAW);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliEwalletTranferTableMap::COL_ECHECK);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.sctime');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.smcode');
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
            $criteria->addSelectColumn($alias . '.chkWithdraw');
            $criteria->addSelectColumn($alias . '.txtCash');
            $criteria->addSelectColumn($alias . '.txtFuture');
            $criteria->addSelectColumn($alias . '.txtTransfer');
            $criteria->addSelectColumn($alias . '.txtCredit1');
            $criteria->addSelectColumn($alias . '.txtCredit2');
            $criteria->addSelectColumn($alias . '.txtCredit3');
            $criteria->addSelectColumn($alias . '.txtInternet');
            $criteria->addSelectColumn($alias . '.txtCommission');
            $criteria->addSelectColumn($alias . '.txtWithdraw');
            $criteria->addSelectColumn($alias . '.optionCash');
            $criteria->addSelectColumn($alias . '.optionFuture');
            $criteria->addSelectColumn($alias . '.optionTransfer');
            $criteria->addSelectColumn($alias . '.optionCredit1');
            $criteria->addSelectColumn($alias . '.optionCredit2');
            $criteria->addSelectColumn($alias . '.optionCredit3');
            $criteria->addSelectColumn($alias . '.optionInternet');
            $criteria->addSelectColumn($alias . '.optionCommission');
            $criteria->addSelectColumn($alias . '.optionWithdraw');
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
            $criteria->addSelectColumn($alias . '.echeck');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEwalletTranferTableMap::DATABASE_NAME)->getTable(AliEwalletTranferTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEwalletTranferTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEwalletTranferTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEwalletTranferTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEwalletTranfer or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEwalletTranfer object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletTranferTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEwalletTranfer) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEwalletTranferTableMap::DATABASE_NAME);
            $criteria->add(AliEwalletTranferTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEwalletTranferQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEwalletTranferTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEwalletTranferTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ewallet_tranfer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEwalletTranferQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEwalletTranfer or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEwalletTranfer object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletTranferTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEwalletTranfer object
        }

        if ($criteria->containsKey(AliEwalletTranferTableMap::COL_ID) && $criteria->keyContainsValue(AliEwalletTranferTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEwalletTranferTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEwalletTranferQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEwalletTranferTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEwalletTranferTableMap::buildTableMap();
