<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEwalletCommission;
use CciOrm\CciOrm\AliEwalletCommissionQuery;
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
 * This class defines the structure of the 'ali_ewallet_commission' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEwalletCommissionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEwalletCommissionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ewallet_commission';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEwalletCommission';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEwalletCommission';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 63;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 63;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_ewallet_commission.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_ewallet_commission.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_ewallet_commission.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ewallet_commission.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_ewallet_commission.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_ewallet_commission.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ewallet_commission.total';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_ewallet_commission.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_ewallet_commission.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_ewallet_commission.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_ewallet_commission.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_ewallet_commission.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_ewallet_commission.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_ewallet_commission.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_ewallet_commission.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_ewallet_commission.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_ewallet_commission.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_ewallet_commission.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_ewallet_commission.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_ewallet_commission.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_ewallet_commission.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_ewallet_commission.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_ewallet_commission.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_ewallet_commission.chkCredit3';

    /**
     * the column name for the chkWithdraw field
     */
    const COL_CHKWITHDRAW = 'ali_ewallet_commission.chkWithdraw';

    /**
     * the column name for the chkTransfer_in field
     */
    const COL_CHKTRANSFER_IN = 'ali_ewallet_commission.chkTransfer_in';

    /**
     * the column name for the chkTransfer_out field
     */
    const COL_CHKTRANSFER_OUT = 'ali_ewallet_commission.chkTransfer_out';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_ewallet_commission.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_ewallet_commission.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_ewallet_commission.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_ewallet_commission.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_ewallet_commission.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_ewallet_commission.txtCredit3';

    /**
     * the column name for the txtWithdraw field
     */
    const COL_TXTWITHDRAW = 'ali_ewallet_commission.txtWithdraw';

    /**
     * the column name for the txtTransfer_in field
     */
    const COL_TXTTRANSFER_IN = 'ali_ewallet_commission.txtTransfer_in';

    /**
     * the column name for the txtTransfer_out field
     */
    const COL_TXTTRANSFER_OUT = 'ali_ewallet_commission.txtTransfer_out';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_ewallet_commission.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_ewallet_commission.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_ewallet_commission.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_ewallet_commission.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_ewallet_commission.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_ewallet_commission.optionCredit3';

    /**
     * the column name for the optionWithdraw field
     */
    const COL_OPTIONWITHDRAW = 'ali_ewallet_commission.optionWithdraw';

    /**
     * the column name for the optionTransfer_in field
     */
    const COL_OPTIONTRANSFER_IN = 'ali_ewallet_commission.optionTransfer_in';

    /**
     * the column name for the optionTransfer_out field
     */
    const COL_OPTIONTRANSFER_OUT = 'ali_ewallet_commission.optionTransfer_out';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_ewallet_commission.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_ewallet_commission.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_ewallet_commission.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_ewallet_commission.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_ewallet_commission.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_ewallet_commission.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_ewallet_commission.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_ewallet_commission.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_ewallet_commission.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_ewallet_commission.locationbase';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_ewallet_commission.chkCommission';

    /**
     * the column name for the txtCommission field
     */
    const COL_TXTCOMMISSION = 'ali_ewallet_commission.txtCommission';

    /**
     * the column name for the optionCommission field
     */
    const COL_OPTIONCOMMISSION = 'ali_ewallet_commission.optionCommission';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_ewallet_commission.mbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_ewallet_commission.crate';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_ewallet_commission.rcode';

    /**
     * the column name for the echeck field
     */
    const COL_ECHECK = 'ali_ewallet_commission.echeck';

    /**
     * the column name for the cmbonus field
     */
    const COL_CMBONUS = 'ali_ewallet_commission.cmbonus';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sadate', 'InvCode', 'Mcode', 'NameF', 'NameT', 'Total', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkwithdraw', 'ChktransferIn', 'ChktransferOut', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtwithdraw', 'TxttransferIn', 'TxttransferOut', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optionwithdraw', 'OptiontransferIn', 'OptiontransferOut', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Chkcommission', 'Txtcommission', 'Optioncommission', 'Mbase', 'Crate', 'Rcode', 'Echeck', 'Cmbonus', ),
        self::TYPE_CAMELNAME     => array('sano', 'sadate', 'invCode', 'mcode', 'nameF', 'nameT', 'total', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkwithdraw', 'chktransferIn', 'chktransferOut', 'txtcash', 'txtfuture', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtwithdraw', 'txttransferIn', 'txttransferOut', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optionwithdraw', 'optiontransferIn', 'optiontransferOut', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'chkcommission', 'txtcommission', 'optioncommission', 'mbase', 'crate', 'rcode', 'echeck', 'cmbonus', ),
        self::TYPE_COLNAME       => array(AliEwalletCommissionTableMap::COL_SANO, AliEwalletCommissionTableMap::COL_SADATE, AliEwalletCommissionTableMap::COL_INV_CODE, AliEwalletCommissionTableMap::COL_MCODE, AliEwalletCommissionTableMap::COL_NAME_F, AliEwalletCommissionTableMap::COL_NAME_T, AliEwalletCommissionTableMap::COL_TOTAL, AliEwalletCommissionTableMap::COL_USERCODE, AliEwalletCommissionTableMap::COL_REMARK, AliEwalletCommissionTableMap::COL_TRNF, AliEwalletCommissionTableMap::COL_ID, AliEwalletCommissionTableMap::COL_SA_TYPE, AliEwalletCommissionTableMap::COL_UID, AliEwalletCommissionTableMap::COL_LID, AliEwalletCommissionTableMap::COL_DL, AliEwalletCommissionTableMap::COL_CANCEL, AliEwalletCommissionTableMap::COL_SEND, AliEwalletCommissionTableMap::COL_TXTMONEY, AliEwalletCommissionTableMap::COL_CHKCASH, AliEwalletCommissionTableMap::COL_CHKFUTURE, AliEwalletCommissionTableMap::COL_CHKTRANSFER, AliEwalletCommissionTableMap::COL_CHKCREDIT1, AliEwalletCommissionTableMap::COL_CHKCREDIT2, AliEwalletCommissionTableMap::COL_CHKCREDIT3, AliEwalletCommissionTableMap::COL_CHKWITHDRAW, AliEwalletCommissionTableMap::COL_CHKTRANSFER_IN, AliEwalletCommissionTableMap::COL_CHKTRANSFER_OUT, AliEwalletCommissionTableMap::COL_TXTCASH, AliEwalletCommissionTableMap::COL_TXTFUTURE, AliEwalletCommissionTableMap::COL_TXTTRANSFER, AliEwalletCommissionTableMap::COL_TXTCREDIT1, AliEwalletCommissionTableMap::COL_TXTCREDIT2, AliEwalletCommissionTableMap::COL_TXTCREDIT3, AliEwalletCommissionTableMap::COL_TXTWITHDRAW, AliEwalletCommissionTableMap::COL_TXTTRANSFER_IN, AliEwalletCommissionTableMap::COL_TXTTRANSFER_OUT, AliEwalletCommissionTableMap::COL_OPTIONCASH, AliEwalletCommissionTableMap::COL_OPTIONFUTURE, AliEwalletCommissionTableMap::COL_OPTIONTRANSFER, AliEwalletCommissionTableMap::COL_OPTIONCREDIT1, AliEwalletCommissionTableMap::COL_OPTIONCREDIT2, AliEwalletCommissionTableMap::COL_OPTIONCREDIT3, AliEwalletCommissionTableMap::COL_OPTIONWITHDRAW, AliEwalletCommissionTableMap::COL_OPTIONTRANSFER_IN, AliEwalletCommissionTableMap::COL_OPTIONTRANSFER_OUT, AliEwalletCommissionTableMap::COL_TXTOPTION, AliEwalletCommissionTableMap::COL_EWALLET, AliEwalletCommissionTableMap::COL_EWALLET_BEFORE, AliEwalletCommissionTableMap::COL_EWALLET_AFTER, AliEwalletCommissionTableMap::COL_IPAY, AliEwalletCommissionTableMap::COL_CHECKPORTAL, AliEwalletCommissionTableMap::COL_BPRICE, AliEwalletCommissionTableMap::COL_CANCEL_DATE, AliEwalletCommissionTableMap::COL_UID_CANCEL, AliEwalletCommissionTableMap::COL_LOCATIONBASE, AliEwalletCommissionTableMap::COL_CHKCOMMISSION, AliEwalletCommissionTableMap::COL_TXTCOMMISSION, AliEwalletCommissionTableMap::COL_OPTIONCOMMISSION, AliEwalletCommissionTableMap::COL_MBASE, AliEwalletCommissionTableMap::COL_CRATE, AliEwalletCommissionTableMap::COL_RCODE, AliEwalletCommissionTableMap::COL_ECHECK, AliEwalletCommissionTableMap::COL_CMBONUS, ),
        self::TYPE_FIELDNAME     => array('sano', 'sadate', 'inv_code', 'mcode', 'name_f', 'name_t', 'total', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkWithdraw', 'chkTransfer_in', 'chkTransfer_out', 'txtCash', 'txtFuture', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtWithdraw', 'txtTransfer_in', 'txtTransfer_out', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionWithdraw', 'optionTransfer_in', 'optionTransfer_out', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'chkCommission', 'txtCommission', 'optionCommission', 'mbase', 'crate', 'rcode', 'echeck', 'cmbonus', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sadate' => 1, 'InvCode' => 2, 'Mcode' => 3, 'NameF' => 4, 'NameT' => 5, 'Total' => 6, 'Usercode' => 7, 'Remark' => 8, 'Trnf' => 9, 'Id' => 10, 'SaType' => 11, 'Uid' => 12, 'Lid' => 13, 'Dl' => 14, 'Cancel' => 15, 'Send' => 16, 'Txtmoney' => 17, 'Chkcash' => 18, 'Chkfuture' => 19, 'Chktransfer' => 20, 'Chkcredit1' => 21, 'Chkcredit2' => 22, 'Chkcredit3' => 23, 'Chkwithdraw' => 24, 'ChktransferIn' => 25, 'ChktransferOut' => 26, 'Txtcash' => 27, 'Txtfuture' => 28, 'Txttransfer' => 29, 'Txtcredit1' => 30, 'Txtcredit2' => 31, 'Txtcredit3' => 32, 'Txtwithdraw' => 33, 'TxttransferIn' => 34, 'TxttransferOut' => 35, 'Optioncash' => 36, 'Optionfuture' => 37, 'Optiontransfer' => 38, 'Optioncredit1' => 39, 'Optioncredit2' => 40, 'Optioncredit3' => 41, 'Optionwithdraw' => 42, 'OptiontransferIn' => 43, 'OptiontransferOut' => 44, 'Txtoption' => 45, 'Ewallet' => 46, 'EwalletBefore' => 47, 'EwalletAfter' => 48, 'Ipay' => 49, 'Checkportal' => 50, 'Bprice' => 51, 'CancelDate' => 52, 'UidCancel' => 53, 'Locationbase' => 54, 'Chkcommission' => 55, 'Txtcommission' => 56, 'Optioncommission' => 57, 'Mbase' => 58, 'Crate' => 59, 'Rcode' => 60, 'Echeck' => 61, 'Cmbonus' => 62, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sadate' => 1, 'invCode' => 2, 'mcode' => 3, 'nameF' => 4, 'nameT' => 5, 'total' => 6, 'usercode' => 7, 'remark' => 8, 'trnf' => 9, 'id' => 10, 'saType' => 11, 'uid' => 12, 'lid' => 13, 'dl' => 14, 'cancel' => 15, 'send' => 16, 'txtmoney' => 17, 'chkcash' => 18, 'chkfuture' => 19, 'chktransfer' => 20, 'chkcredit1' => 21, 'chkcredit2' => 22, 'chkcredit3' => 23, 'chkwithdraw' => 24, 'chktransferIn' => 25, 'chktransferOut' => 26, 'txtcash' => 27, 'txtfuture' => 28, 'txttransfer' => 29, 'txtcredit1' => 30, 'txtcredit2' => 31, 'txtcredit3' => 32, 'txtwithdraw' => 33, 'txttransferIn' => 34, 'txttransferOut' => 35, 'optioncash' => 36, 'optionfuture' => 37, 'optiontransfer' => 38, 'optioncredit1' => 39, 'optioncredit2' => 40, 'optioncredit3' => 41, 'optionwithdraw' => 42, 'optiontransferIn' => 43, 'optiontransferOut' => 44, 'txtoption' => 45, 'ewallet' => 46, 'ewalletBefore' => 47, 'ewalletAfter' => 48, 'ipay' => 49, 'checkportal' => 50, 'bprice' => 51, 'cancelDate' => 52, 'uidCancel' => 53, 'locationbase' => 54, 'chkcommission' => 55, 'txtcommission' => 56, 'optioncommission' => 57, 'mbase' => 58, 'crate' => 59, 'rcode' => 60, 'echeck' => 61, 'cmbonus' => 62, ),
        self::TYPE_COLNAME       => array(AliEwalletCommissionTableMap::COL_SANO => 0, AliEwalletCommissionTableMap::COL_SADATE => 1, AliEwalletCommissionTableMap::COL_INV_CODE => 2, AliEwalletCommissionTableMap::COL_MCODE => 3, AliEwalletCommissionTableMap::COL_NAME_F => 4, AliEwalletCommissionTableMap::COL_NAME_T => 5, AliEwalletCommissionTableMap::COL_TOTAL => 6, AliEwalletCommissionTableMap::COL_USERCODE => 7, AliEwalletCommissionTableMap::COL_REMARK => 8, AliEwalletCommissionTableMap::COL_TRNF => 9, AliEwalletCommissionTableMap::COL_ID => 10, AliEwalletCommissionTableMap::COL_SA_TYPE => 11, AliEwalletCommissionTableMap::COL_UID => 12, AliEwalletCommissionTableMap::COL_LID => 13, AliEwalletCommissionTableMap::COL_DL => 14, AliEwalletCommissionTableMap::COL_CANCEL => 15, AliEwalletCommissionTableMap::COL_SEND => 16, AliEwalletCommissionTableMap::COL_TXTMONEY => 17, AliEwalletCommissionTableMap::COL_CHKCASH => 18, AliEwalletCommissionTableMap::COL_CHKFUTURE => 19, AliEwalletCommissionTableMap::COL_CHKTRANSFER => 20, AliEwalletCommissionTableMap::COL_CHKCREDIT1 => 21, AliEwalletCommissionTableMap::COL_CHKCREDIT2 => 22, AliEwalletCommissionTableMap::COL_CHKCREDIT3 => 23, AliEwalletCommissionTableMap::COL_CHKWITHDRAW => 24, AliEwalletCommissionTableMap::COL_CHKTRANSFER_IN => 25, AliEwalletCommissionTableMap::COL_CHKTRANSFER_OUT => 26, AliEwalletCommissionTableMap::COL_TXTCASH => 27, AliEwalletCommissionTableMap::COL_TXTFUTURE => 28, AliEwalletCommissionTableMap::COL_TXTTRANSFER => 29, AliEwalletCommissionTableMap::COL_TXTCREDIT1 => 30, AliEwalletCommissionTableMap::COL_TXTCREDIT2 => 31, AliEwalletCommissionTableMap::COL_TXTCREDIT3 => 32, AliEwalletCommissionTableMap::COL_TXTWITHDRAW => 33, AliEwalletCommissionTableMap::COL_TXTTRANSFER_IN => 34, AliEwalletCommissionTableMap::COL_TXTTRANSFER_OUT => 35, AliEwalletCommissionTableMap::COL_OPTIONCASH => 36, AliEwalletCommissionTableMap::COL_OPTIONFUTURE => 37, AliEwalletCommissionTableMap::COL_OPTIONTRANSFER => 38, AliEwalletCommissionTableMap::COL_OPTIONCREDIT1 => 39, AliEwalletCommissionTableMap::COL_OPTIONCREDIT2 => 40, AliEwalletCommissionTableMap::COL_OPTIONCREDIT3 => 41, AliEwalletCommissionTableMap::COL_OPTIONWITHDRAW => 42, AliEwalletCommissionTableMap::COL_OPTIONTRANSFER_IN => 43, AliEwalletCommissionTableMap::COL_OPTIONTRANSFER_OUT => 44, AliEwalletCommissionTableMap::COL_TXTOPTION => 45, AliEwalletCommissionTableMap::COL_EWALLET => 46, AliEwalletCommissionTableMap::COL_EWALLET_BEFORE => 47, AliEwalletCommissionTableMap::COL_EWALLET_AFTER => 48, AliEwalletCommissionTableMap::COL_IPAY => 49, AliEwalletCommissionTableMap::COL_CHECKPORTAL => 50, AliEwalletCommissionTableMap::COL_BPRICE => 51, AliEwalletCommissionTableMap::COL_CANCEL_DATE => 52, AliEwalletCommissionTableMap::COL_UID_CANCEL => 53, AliEwalletCommissionTableMap::COL_LOCATIONBASE => 54, AliEwalletCommissionTableMap::COL_CHKCOMMISSION => 55, AliEwalletCommissionTableMap::COL_TXTCOMMISSION => 56, AliEwalletCommissionTableMap::COL_OPTIONCOMMISSION => 57, AliEwalletCommissionTableMap::COL_MBASE => 58, AliEwalletCommissionTableMap::COL_CRATE => 59, AliEwalletCommissionTableMap::COL_RCODE => 60, AliEwalletCommissionTableMap::COL_ECHECK => 61, AliEwalletCommissionTableMap::COL_CMBONUS => 62, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sadate' => 1, 'inv_code' => 2, 'mcode' => 3, 'name_f' => 4, 'name_t' => 5, 'total' => 6, 'usercode' => 7, 'remark' => 8, 'trnf' => 9, 'id' => 10, 'sa_type' => 11, 'uid' => 12, 'lid' => 13, 'dl' => 14, 'cancel' => 15, 'send' => 16, 'txtMoney' => 17, 'chkCash' => 18, 'chkFuture' => 19, 'chkTransfer' => 20, 'chkCredit1' => 21, 'chkCredit2' => 22, 'chkCredit3' => 23, 'chkWithdraw' => 24, 'chkTransfer_in' => 25, 'chkTransfer_out' => 26, 'txtCash' => 27, 'txtFuture' => 28, 'txtTransfer' => 29, 'txtCredit1' => 30, 'txtCredit2' => 31, 'txtCredit3' => 32, 'txtWithdraw' => 33, 'txtTransfer_in' => 34, 'txtTransfer_out' => 35, 'optionCash' => 36, 'optionFuture' => 37, 'optionTransfer' => 38, 'optionCredit1' => 39, 'optionCredit2' => 40, 'optionCredit3' => 41, 'optionWithdraw' => 42, 'optionTransfer_in' => 43, 'optionTransfer_out' => 44, 'txtoption' => 45, 'ewallet' => 46, 'ewallet_before' => 47, 'ewallet_after' => 48, 'ipay' => 49, 'checkportal' => 50, 'bprice' => 51, 'cancel_date' => 52, 'uid_cancel' => 53, 'locationbase' => 54, 'chkCommission' => 55, 'txtCommission' => 56, 'optionCommission' => 57, 'mbase' => 58, 'crate' => 59, 'rcode' => 60, 'echeck' => 61, 'cmbonus' => 62, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
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
        $this->setName('ali_ewallet_commission');
        $this->setPhpName('AliEwalletCommission');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEwalletCommission');
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
        $this->addColumn('chkWithdraw', 'Chkwithdraw', 'VARCHAR', true, 255, null);
        $this->addColumn('chkTransfer_in', 'ChktransferIn', 'VARCHAR', true, 255, null);
        $this->addColumn('chkTransfer_out', 'ChktransferOut', 'VARCHAR', true, 255, null);
        $this->addColumn('txtCash', 'Txtcash', 'DECIMAL', true, 15, null);
        $this->addColumn('txtFuture', 'Txtfuture', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer', 'Txttransfer', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit1', 'Txtcredit1', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit2', 'Txtcredit2', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit3', 'Txtcredit3', 'DECIMAL', true, 15, null);
        $this->addColumn('txtWithdraw', 'Txtwithdraw', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer_in', 'TxttransferIn', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer_out', 'TxttransferOut', 'DECIMAL', true, 15, null);
        $this->addColumn('optionCash', 'Optioncash', 'VARCHAR', true, 255, null);
        $this->addColumn('optionFuture', 'Optionfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer', 'Optiontransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit1', 'Optioncredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit2', 'Optioncredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit3', 'Optioncredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('optionWithdraw', 'Optionwithdraw', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer_in', 'OptiontransferIn', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer_out', 'OptiontransferOut', 'VARCHAR', true, 255, null);
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
        $this->addColumn('chkCommission', 'Chkcommission', 'VARCHAR', true, 255, null);
        $this->addColumn('txtCommission', 'Txtcommission', 'DECIMAL', true, 15, null);
        $this->addColumn('optionCommission', 'Optioncommission', 'VARCHAR', true, 255, null);
        $this->addColumn('mbase', 'Mbase', 'VARCHAR', true, 244, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('echeck', 'Echeck', 'VARCHAR', true, 255, null);
        $this->addColumn('cmbonus', 'Cmbonus', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliEwalletCommissionTableMap::CLASS_DEFAULT : AliEwalletCommissionTableMap::OM_CLASS;
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
     * @return array           (AliEwalletCommission object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEwalletCommissionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEwalletCommissionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEwalletCommissionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEwalletCommissionTableMap::OM_CLASS;
            /** @var AliEwalletCommission $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEwalletCommissionTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEwalletCommissionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEwalletCommissionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEwalletCommission $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEwalletCommissionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_ID);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_UID);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_LID);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_DL);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_SEND);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKWITHDRAW);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKTRANSFER_IN);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKTRANSFER_OUT);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTWITHDRAW);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTTRANSFER_IN);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTTRANSFER_OUT);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONWITHDRAW);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONTRANSFER_IN);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONTRANSFER_OUT);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_TXTCOMMISSION);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_OPTIONCOMMISSION);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_ECHECK);
            $criteria->addSelectColumn(AliEwalletCommissionTableMap::COL_CMBONUS);
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
            $criteria->addSelectColumn($alias . '.chkWithdraw');
            $criteria->addSelectColumn($alias . '.chkTransfer_in');
            $criteria->addSelectColumn($alias . '.chkTransfer_out');
            $criteria->addSelectColumn($alias . '.txtCash');
            $criteria->addSelectColumn($alias . '.txtFuture');
            $criteria->addSelectColumn($alias . '.txtTransfer');
            $criteria->addSelectColumn($alias . '.txtCredit1');
            $criteria->addSelectColumn($alias . '.txtCredit2');
            $criteria->addSelectColumn($alias . '.txtCredit3');
            $criteria->addSelectColumn($alias . '.txtWithdraw');
            $criteria->addSelectColumn($alias . '.txtTransfer_in');
            $criteria->addSelectColumn($alias . '.txtTransfer_out');
            $criteria->addSelectColumn($alias . '.optionCash');
            $criteria->addSelectColumn($alias . '.optionFuture');
            $criteria->addSelectColumn($alias . '.optionTransfer');
            $criteria->addSelectColumn($alias . '.optionCredit1');
            $criteria->addSelectColumn($alias . '.optionCredit2');
            $criteria->addSelectColumn($alias . '.optionCredit3');
            $criteria->addSelectColumn($alias . '.optionWithdraw');
            $criteria->addSelectColumn($alias . '.optionTransfer_in');
            $criteria->addSelectColumn($alias . '.optionTransfer_out');
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
            $criteria->addSelectColumn($alias . '.chkCommission');
            $criteria->addSelectColumn($alias . '.txtCommission');
            $criteria->addSelectColumn($alias . '.optionCommission');
            $criteria->addSelectColumn($alias . '.mbase');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.echeck');
            $criteria->addSelectColumn($alias . '.cmbonus');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEwalletCommissionTableMap::DATABASE_NAME)->getTable(AliEwalletCommissionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEwalletCommissionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEwalletCommissionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEwalletCommissionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEwalletCommission or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEwalletCommission object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletCommissionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEwalletCommission) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEwalletCommissionTableMap::DATABASE_NAME);
            $criteria->add(AliEwalletCommissionTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEwalletCommissionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEwalletCommissionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEwalletCommissionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ewallet_commission table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEwalletCommissionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEwalletCommission or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEwalletCommission object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletCommissionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEwalletCommission object
        }

        if ($criteria->containsKey(AliEwalletCommissionTableMap::COL_ID) && $criteria->keyContainsValue(AliEwalletCommissionTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEwalletCommissionTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEwalletCommissionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEwalletCommissionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEwalletCommissionTableMap::buildTableMap();
