<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliVoucher;
use CciOrm\CciOrm\AliVoucherQuery;
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
 * This class defines the structure of the 'ali_voucher' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliVoucherTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliVoucherTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_voucher';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliVoucher';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliVoucher';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 62;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 62;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_voucher.sano';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_voucher.rcode';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_voucher.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_voucher.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_voucher.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_voucher.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_voucher.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_voucher.total';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_voucher.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_voucher.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_voucher.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_voucher.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_voucher.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_voucher.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_voucher.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_voucher.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_voucher.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_voucher.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_voucher.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_voucher.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_voucher.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_voucher.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_voucher.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_voucher.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_voucher.chkCredit3';

    /**
     * the column name for the chkWithdraw field
     */
    const COL_CHKWITHDRAW = 'ali_voucher.chkWithdraw';

    /**
     * the column name for the chkTransfer_in field
     */
    const COL_CHKTRANSFER_IN = 'ali_voucher.chkTransfer_in';

    /**
     * the column name for the chkTransfer_out field
     */
    const COL_CHKTRANSFER_OUT = 'ali_voucher.chkTransfer_out';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_voucher.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_voucher.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_voucher.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_voucher.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_voucher.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_voucher.txtCredit3';

    /**
     * the column name for the txtWithdraw field
     */
    const COL_TXTWITHDRAW = 'ali_voucher.txtWithdraw';

    /**
     * the column name for the txtTransfer_in field
     */
    const COL_TXTTRANSFER_IN = 'ali_voucher.txtTransfer_in';

    /**
     * the column name for the txtTransfer_out field
     */
    const COL_TXTTRANSFER_OUT = 'ali_voucher.txtTransfer_out';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_voucher.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_voucher.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_voucher.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_voucher.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_voucher.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_voucher.optionCredit3';

    /**
     * the column name for the optionWithdraw field
     */
    const COL_OPTIONWITHDRAW = 'ali_voucher.optionWithdraw';

    /**
     * the column name for the optionTransfer_in field
     */
    const COL_OPTIONTRANSFER_IN = 'ali_voucher.optionTransfer_in';

    /**
     * the column name for the optionTransfer_out field
     */
    const COL_OPTIONTRANSFER_OUT = 'ali_voucher.optionTransfer_out';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_voucher.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_voucher.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_voucher.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_voucher.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_voucher.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_voucher.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_voucher.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_voucher.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_voucher.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_voucher.locationbase';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_voucher.chkCommission';

    /**
     * the column name for the txtCommission field
     */
    const COL_TXTCOMMISSION = 'ali_voucher.txtCommission';

    /**
     * the column name for the optionCommission field
     */
    const COL_OPTIONCOMMISSION = 'ali_voucher.optionCommission';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_voucher.mbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_voucher.crate';

    /**
     * the column name for the echeck field
     */
    const COL_ECHECK = 'ali_voucher.echeck';

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
        self::TYPE_PHPNAME       => array('Sano', 'Rcode', 'Sadate', 'InvCode', 'Mcode', 'NameF', 'NameT', 'Total', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkwithdraw', 'ChktransferIn', 'ChktransferOut', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtwithdraw', 'TxttransferIn', 'TxttransferOut', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optionwithdraw', 'OptiontransferIn', 'OptiontransferOut', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Chkcommission', 'Txtcommission', 'Optioncommission', 'Mbase', 'Crate', 'Echeck', ),
        self::TYPE_CAMELNAME     => array('sano', 'rcode', 'sadate', 'invCode', 'mcode', 'nameF', 'nameT', 'total', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkwithdraw', 'chktransferIn', 'chktransferOut', 'txtcash', 'txtfuture', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtwithdraw', 'txttransferIn', 'txttransferOut', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optionwithdraw', 'optiontransferIn', 'optiontransferOut', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'chkcommission', 'txtcommission', 'optioncommission', 'mbase', 'crate', 'echeck', ),
        self::TYPE_COLNAME       => array(AliVoucherTableMap::COL_SANO, AliVoucherTableMap::COL_RCODE, AliVoucherTableMap::COL_SADATE, AliVoucherTableMap::COL_INV_CODE, AliVoucherTableMap::COL_MCODE, AliVoucherTableMap::COL_NAME_F, AliVoucherTableMap::COL_NAME_T, AliVoucherTableMap::COL_TOTAL, AliVoucherTableMap::COL_USERCODE, AliVoucherTableMap::COL_REMARK, AliVoucherTableMap::COL_TRNF, AliVoucherTableMap::COL_ID, AliVoucherTableMap::COL_SA_TYPE, AliVoucherTableMap::COL_UID, AliVoucherTableMap::COL_LID, AliVoucherTableMap::COL_DL, AliVoucherTableMap::COL_CANCEL, AliVoucherTableMap::COL_SEND, AliVoucherTableMap::COL_TXTMONEY, AliVoucherTableMap::COL_CHKCASH, AliVoucherTableMap::COL_CHKFUTURE, AliVoucherTableMap::COL_CHKTRANSFER, AliVoucherTableMap::COL_CHKCREDIT1, AliVoucherTableMap::COL_CHKCREDIT2, AliVoucherTableMap::COL_CHKCREDIT3, AliVoucherTableMap::COL_CHKWITHDRAW, AliVoucherTableMap::COL_CHKTRANSFER_IN, AliVoucherTableMap::COL_CHKTRANSFER_OUT, AliVoucherTableMap::COL_TXTCASH, AliVoucherTableMap::COL_TXTFUTURE, AliVoucherTableMap::COL_TXTTRANSFER, AliVoucherTableMap::COL_TXTCREDIT1, AliVoucherTableMap::COL_TXTCREDIT2, AliVoucherTableMap::COL_TXTCREDIT3, AliVoucherTableMap::COL_TXTWITHDRAW, AliVoucherTableMap::COL_TXTTRANSFER_IN, AliVoucherTableMap::COL_TXTTRANSFER_OUT, AliVoucherTableMap::COL_OPTIONCASH, AliVoucherTableMap::COL_OPTIONFUTURE, AliVoucherTableMap::COL_OPTIONTRANSFER, AliVoucherTableMap::COL_OPTIONCREDIT1, AliVoucherTableMap::COL_OPTIONCREDIT2, AliVoucherTableMap::COL_OPTIONCREDIT3, AliVoucherTableMap::COL_OPTIONWITHDRAW, AliVoucherTableMap::COL_OPTIONTRANSFER_IN, AliVoucherTableMap::COL_OPTIONTRANSFER_OUT, AliVoucherTableMap::COL_TXTOPTION, AliVoucherTableMap::COL_EWALLET, AliVoucherTableMap::COL_EWALLET_BEFORE, AliVoucherTableMap::COL_EWALLET_AFTER, AliVoucherTableMap::COL_IPAY, AliVoucherTableMap::COL_CHECKPORTAL, AliVoucherTableMap::COL_BPRICE, AliVoucherTableMap::COL_CANCEL_DATE, AliVoucherTableMap::COL_UID_CANCEL, AliVoucherTableMap::COL_LOCATIONBASE, AliVoucherTableMap::COL_CHKCOMMISSION, AliVoucherTableMap::COL_TXTCOMMISSION, AliVoucherTableMap::COL_OPTIONCOMMISSION, AliVoucherTableMap::COL_MBASE, AliVoucherTableMap::COL_CRATE, AliVoucherTableMap::COL_ECHECK, ),
        self::TYPE_FIELDNAME     => array('sano', 'rcode', 'sadate', 'inv_code', 'mcode', 'name_f', 'name_t', 'total', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkWithdraw', 'chkTransfer_in', 'chkTransfer_out', 'txtCash', 'txtFuture', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtWithdraw', 'txtTransfer_in', 'txtTransfer_out', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionWithdraw', 'optionTransfer_in', 'optionTransfer_out', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'chkCommission', 'txtCommission', 'optionCommission', 'mbase', 'crate', 'echeck', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Rcode' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Mcode' => 4, 'NameF' => 5, 'NameT' => 6, 'Total' => 7, 'Usercode' => 8, 'Remark' => 9, 'Trnf' => 10, 'Id' => 11, 'SaType' => 12, 'Uid' => 13, 'Lid' => 14, 'Dl' => 15, 'Cancel' => 16, 'Send' => 17, 'Txtmoney' => 18, 'Chkcash' => 19, 'Chkfuture' => 20, 'Chktransfer' => 21, 'Chkcredit1' => 22, 'Chkcredit2' => 23, 'Chkcredit3' => 24, 'Chkwithdraw' => 25, 'ChktransferIn' => 26, 'ChktransferOut' => 27, 'Txtcash' => 28, 'Txtfuture' => 29, 'Txttransfer' => 30, 'Txtcredit1' => 31, 'Txtcredit2' => 32, 'Txtcredit3' => 33, 'Txtwithdraw' => 34, 'TxttransferIn' => 35, 'TxttransferOut' => 36, 'Optioncash' => 37, 'Optionfuture' => 38, 'Optiontransfer' => 39, 'Optioncredit1' => 40, 'Optioncredit2' => 41, 'Optioncredit3' => 42, 'Optionwithdraw' => 43, 'OptiontransferIn' => 44, 'OptiontransferOut' => 45, 'Txtoption' => 46, 'Ewallet' => 47, 'EwalletBefore' => 48, 'EwalletAfter' => 49, 'Ipay' => 50, 'Checkportal' => 51, 'Bprice' => 52, 'CancelDate' => 53, 'UidCancel' => 54, 'Locationbase' => 55, 'Chkcommission' => 56, 'Txtcommission' => 57, 'Optioncommission' => 58, 'Mbase' => 59, 'Crate' => 60, 'Echeck' => 61, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'rcode' => 1, 'sadate' => 2, 'invCode' => 3, 'mcode' => 4, 'nameF' => 5, 'nameT' => 6, 'total' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'saType' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtmoney' => 18, 'chkcash' => 19, 'chkfuture' => 20, 'chktransfer' => 21, 'chkcredit1' => 22, 'chkcredit2' => 23, 'chkcredit3' => 24, 'chkwithdraw' => 25, 'chktransferIn' => 26, 'chktransferOut' => 27, 'txtcash' => 28, 'txtfuture' => 29, 'txttransfer' => 30, 'txtcredit1' => 31, 'txtcredit2' => 32, 'txtcredit3' => 33, 'txtwithdraw' => 34, 'txttransferIn' => 35, 'txttransferOut' => 36, 'optioncash' => 37, 'optionfuture' => 38, 'optiontransfer' => 39, 'optioncredit1' => 40, 'optioncredit2' => 41, 'optioncredit3' => 42, 'optionwithdraw' => 43, 'optiontransferIn' => 44, 'optiontransferOut' => 45, 'txtoption' => 46, 'ewallet' => 47, 'ewalletBefore' => 48, 'ewalletAfter' => 49, 'ipay' => 50, 'checkportal' => 51, 'bprice' => 52, 'cancelDate' => 53, 'uidCancel' => 54, 'locationbase' => 55, 'chkcommission' => 56, 'txtcommission' => 57, 'optioncommission' => 58, 'mbase' => 59, 'crate' => 60, 'echeck' => 61, ),
        self::TYPE_COLNAME       => array(AliVoucherTableMap::COL_SANO => 0, AliVoucherTableMap::COL_RCODE => 1, AliVoucherTableMap::COL_SADATE => 2, AliVoucherTableMap::COL_INV_CODE => 3, AliVoucherTableMap::COL_MCODE => 4, AliVoucherTableMap::COL_NAME_F => 5, AliVoucherTableMap::COL_NAME_T => 6, AliVoucherTableMap::COL_TOTAL => 7, AliVoucherTableMap::COL_USERCODE => 8, AliVoucherTableMap::COL_REMARK => 9, AliVoucherTableMap::COL_TRNF => 10, AliVoucherTableMap::COL_ID => 11, AliVoucherTableMap::COL_SA_TYPE => 12, AliVoucherTableMap::COL_UID => 13, AliVoucherTableMap::COL_LID => 14, AliVoucherTableMap::COL_DL => 15, AliVoucherTableMap::COL_CANCEL => 16, AliVoucherTableMap::COL_SEND => 17, AliVoucherTableMap::COL_TXTMONEY => 18, AliVoucherTableMap::COL_CHKCASH => 19, AliVoucherTableMap::COL_CHKFUTURE => 20, AliVoucherTableMap::COL_CHKTRANSFER => 21, AliVoucherTableMap::COL_CHKCREDIT1 => 22, AliVoucherTableMap::COL_CHKCREDIT2 => 23, AliVoucherTableMap::COL_CHKCREDIT3 => 24, AliVoucherTableMap::COL_CHKWITHDRAW => 25, AliVoucherTableMap::COL_CHKTRANSFER_IN => 26, AliVoucherTableMap::COL_CHKTRANSFER_OUT => 27, AliVoucherTableMap::COL_TXTCASH => 28, AliVoucherTableMap::COL_TXTFUTURE => 29, AliVoucherTableMap::COL_TXTTRANSFER => 30, AliVoucherTableMap::COL_TXTCREDIT1 => 31, AliVoucherTableMap::COL_TXTCREDIT2 => 32, AliVoucherTableMap::COL_TXTCREDIT3 => 33, AliVoucherTableMap::COL_TXTWITHDRAW => 34, AliVoucherTableMap::COL_TXTTRANSFER_IN => 35, AliVoucherTableMap::COL_TXTTRANSFER_OUT => 36, AliVoucherTableMap::COL_OPTIONCASH => 37, AliVoucherTableMap::COL_OPTIONFUTURE => 38, AliVoucherTableMap::COL_OPTIONTRANSFER => 39, AliVoucherTableMap::COL_OPTIONCREDIT1 => 40, AliVoucherTableMap::COL_OPTIONCREDIT2 => 41, AliVoucherTableMap::COL_OPTIONCREDIT3 => 42, AliVoucherTableMap::COL_OPTIONWITHDRAW => 43, AliVoucherTableMap::COL_OPTIONTRANSFER_IN => 44, AliVoucherTableMap::COL_OPTIONTRANSFER_OUT => 45, AliVoucherTableMap::COL_TXTOPTION => 46, AliVoucherTableMap::COL_EWALLET => 47, AliVoucherTableMap::COL_EWALLET_BEFORE => 48, AliVoucherTableMap::COL_EWALLET_AFTER => 49, AliVoucherTableMap::COL_IPAY => 50, AliVoucherTableMap::COL_CHECKPORTAL => 51, AliVoucherTableMap::COL_BPRICE => 52, AliVoucherTableMap::COL_CANCEL_DATE => 53, AliVoucherTableMap::COL_UID_CANCEL => 54, AliVoucherTableMap::COL_LOCATIONBASE => 55, AliVoucherTableMap::COL_CHKCOMMISSION => 56, AliVoucherTableMap::COL_TXTCOMMISSION => 57, AliVoucherTableMap::COL_OPTIONCOMMISSION => 58, AliVoucherTableMap::COL_MBASE => 59, AliVoucherTableMap::COL_CRATE => 60, AliVoucherTableMap::COL_ECHECK => 61, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'rcode' => 1, 'sadate' => 2, 'inv_code' => 3, 'mcode' => 4, 'name_f' => 5, 'name_t' => 6, 'total' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'sa_type' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtMoney' => 18, 'chkCash' => 19, 'chkFuture' => 20, 'chkTransfer' => 21, 'chkCredit1' => 22, 'chkCredit2' => 23, 'chkCredit3' => 24, 'chkWithdraw' => 25, 'chkTransfer_in' => 26, 'chkTransfer_out' => 27, 'txtCash' => 28, 'txtFuture' => 29, 'txtTransfer' => 30, 'txtCredit1' => 31, 'txtCredit2' => 32, 'txtCredit3' => 33, 'txtWithdraw' => 34, 'txtTransfer_in' => 35, 'txtTransfer_out' => 36, 'optionCash' => 37, 'optionFuture' => 38, 'optionTransfer' => 39, 'optionCredit1' => 40, 'optionCredit2' => 41, 'optionCredit3' => 42, 'optionWithdraw' => 43, 'optionTransfer_in' => 44, 'optionTransfer_out' => 45, 'txtoption' => 46, 'ewallet' => 47, 'ewallet_before' => 48, 'ewallet_after' => 49, 'ipay' => 50, 'checkportal' => 51, 'bprice' => 52, 'cancel_date' => 53, 'uid_cancel' => 54, 'locationbase' => 55, 'chkCommission' => 56, 'txtCommission' => 57, 'optionCommission' => 58, 'mbase' => 59, 'crate' => 60, 'echeck' => 61, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, )
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
        $this->setName('ali_voucher');
        $this->setPhpName('AliVoucher');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliVoucher');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 10, null);
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
        $this->addColumn('echeck', 'Echeck', 'VARCHAR', true, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 11 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 11 + $offset
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
        return $withPrefix ? AliVoucherTableMap::CLASS_DEFAULT : AliVoucherTableMap::OM_CLASS;
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
     * @return array           (AliVoucher object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliVoucherTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliVoucherTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliVoucherTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliVoucherTableMap::OM_CLASS;
            /** @var AliVoucher $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliVoucherTableMap::addInstanceToPool($obj, $key);
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
            $key = AliVoucherTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliVoucherTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliVoucher $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliVoucherTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliVoucherTableMap::COL_SANO);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_ID);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_UID);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_LID);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_DL);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_SEND);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKWITHDRAW);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKTRANSFER_IN);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKTRANSFER_OUT);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTWITHDRAW);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTTRANSFER_IN);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTTRANSFER_OUT);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONWITHDRAW);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONTRANSFER_IN);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONTRANSFER_OUT);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_TXTCOMMISSION);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_OPTIONCOMMISSION);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliVoucherTableMap::COL_ECHECK);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.rcode');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliVoucherTableMap::DATABASE_NAME)->getTable(AliVoucherTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliVoucherTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliVoucherTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliVoucherTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliVoucher or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliVoucher object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliVoucherTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliVoucher) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliVoucherTableMap::DATABASE_NAME);
            $criteria->add(AliVoucherTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliVoucherQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliVoucherTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliVoucherTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_voucher table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliVoucherQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliVoucher or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliVoucher object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliVoucherTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliVoucher object
        }

        if ($criteria->containsKey(AliVoucherTableMap::COL_ID) && $criteria->keyContainsValue(AliVoucherTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliVoucherTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliVoucherQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliVoucherTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliVoucherTableMap::buildTableMap();
