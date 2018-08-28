<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEcommision;
use CciOrm\CciOrm\AliEcommisionQuery;
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
 * This class defines the structure of the 'ali_ecommision' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEcommisionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEcommisionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ecommision';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEcommision';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEcommision';

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
    const COL_SANO = 'ali_ecommision.sano';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_ecommision.rcode';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_ecommision.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_ecommision.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ecommision.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_ecommision.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_ecommision.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ecommision.total';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_ecommision.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_ecommision.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_ecommision.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_ecommision.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_ecommision.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_ecommision.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_ecommision.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_ecommision.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_ecommision.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_ecommision.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_ecommision.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_ecommision.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_ecommision.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_ecommision.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_ecommision.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_ecommision.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_ecommision.chkCredit3';

    /**
     * the column name for the chkWithdraw field
     */
    const COL_CHKWITHDRAW = 'ali_ecommision.chkWithdraw';

    /**
     * the column name for the chkTransfer_in field
     */
    const COL_CHKTRANSFER_IN = 'ali_ecommision.chkTransfer_in';

    /**
     * the column name for the chkTransfer_out field
     */
    const COL_CHKTRANSFER_OUT = 'ali_ecommision.chkTransfer_out';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_ecommision.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_ecommision.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_ecommision.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_ecommision.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_ecommision.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_ecommision.txtCredit3';

    /**
     * the column name for the txtWithdraw field
     */
    const COL_TXTWITHDRAW = 'ali_ecommision.txtWithdraw';

    /**
     * the column name for the txtTransfer_in field
     */
    const COL_TXTTRANSFER_IN = 'ali_ecommision.txtTransfer_in';

    /**
     * the column name for the txtTransfer_out field
     */
    const COL_TXTTRANSFER_OUT = 'ali_ecommision.txtTransfer_out';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_ecommision.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_ecommision.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_ecommision.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_ecommision.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_ecommision.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_ecommision.optionCredit3';

    /**
     * the column name for the optionWithdraw field
     */
    const COL_OPTIONWITHDRAW = 'ali_ecommision.optionWithdraw';

    /**
     * the column name for the optionTransfer_in field
     */
    const COL_OPTIONTRANSFER_IN = 'ali_ecommision.optionTransfer_in';

    /**
     * the column name for the optionTransfer_out field
     */
    const COL_OPTIONTRANSFER_OUT = 'ali_ecommision.optionTransfer_out';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_ecommision.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_ecommision.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_ecommision.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_ecommision.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_ecommision.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_ecommision.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_ecommision.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_ecommision.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_ecommision.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_ecommision.locationbase';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_ecommision.chkCommission';

    /**
     * the column name for the txtCommission field
     */
    const COL_TXTCOMMISSION = 'ali_ecommision.txtCommission';

    /**
     * the column name for the optionCommission field
     */
    const COL_OPTIONCOMMISSION = 'ali_ecommision.optionCommission';

    /**
     * the column name for the status_tranfer field
     */
    const COL_STATUS_TRANFER = 'ali_ecommision.status_tranfer';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_ecommision.crate';

    /**
     * the column name for the echeck field
     */
    const COL_ECHECK = 'ali_ecommision.echeck';

    /**
     * the column name for the cmbonus field
     */
    const COL_CMBONUS = 'ali_ecommision.cmbonus';

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
        self::TYPE_PHPNAME       => array('Sano', 'Rcode', 'Sadate', 'InvCode', 'Mcode', 'NameF', 'NameT', 'Total', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkwithdraw', 'ChktransferIn', 'ChktransferOut', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtwithdraw', 'TxttransferIn', 'TxttransferOut', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optionwithdraw', 'OptiontransferIn', 'OptiontransferOut', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Chkcommission', 'Txtcommission', 'Optioncommission', 'StatusTranfer', 'Crate', 'Echeck', 'Cmbonus', ),
        self::TYPE_CAMELNAME     => array('sano', 'rcode', 'sadate', 'invCode', 'mcode', 'nameF', 'nameT', 'total', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkwithdraw', 'chktransferIn', 'chktransferOut', 'txtcash', 'txtfuture', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtwithdraw', 'txttransferIn', 'txttransferOut', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optionwithdraw', 'optiontransferIn', 'optiontransferOut', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'chkcommission', 'txtcommission', 'optioncommission', 'statusTranfer', 'crate', 'echeck', 'cmbonus', ),
        self::TYPE_COLNAME       => array(AliEcommisionTableMap::COL_SANO, AliEcommisionTableMap::COL_RCODE, AliEcommisionTableMap::COL_SADATE, AliEcommisionTableMap::COL_INV_CODE, AliEcommisionTableMap::COL_MCODE, AliEcommisionTableMap::COL_NAME_F, AliEcommisionTableMap::COL_NAME_T, AliEcommisionTableMap::COL_TOTAL, AliEcommisionTableMap::COL_USERCODE, AliEcommisionTableMap::COL_REMARK, AliEcommisionTableMap::COL_TRNF, AliEcommisionTableMap::COL_ID, AliEcommisionTableMap::COL_SA_TYPE, AliEcommisionTableMap::COL_UID, AliEcommisionTableMap::COL_LID, AliEcommisionTableMap::COL_DL, AliEcommisionTableMap::COL_CANCEL, AliEcommisionTableMap::COL_SEND, AliEcommisionTableMap::COL_TXTMONEY, AliEcommisionTableMap::COL_CHKCASH, AliEcommisionTableMap::COL_CHKFUTURE, AliEcommisionTableMap::COL_CHKTRANSFER, AliEcommisionTableMap::COL_CHKCREDIT1, AliEcommisionTableMap::COL_CHKCREDIT2, AliEcommisionTableMap::COL_CHKCREDIT3, AliEcommisionTableMap::COL_CHKWITHDRAW, AliEcommisionTableMap::COL_CHKTRANSFER_IN, AliEcommisionTableMap::COL_CHKTRANSFER_OUT, AliEcommisionTableMap::COL_TXTCASH, AliEcommisionTableMap::COL_TXTFUTURE, AliEcommisionTableMap::COL_TXTTRANSFER, AliEcommisionTableMap::COL_TXTCREDIT1, AliEcommisionTableMap::COL_TXTCREDIT2, AliEcommisionTableMap::COL_TXTCREDIT3, AliEcommisionTableMap::COL_TXTWITHDRAW, AliEcommisionTableMap::COL_TXTTRANSFER_IN, AliEcommisionTableMap::COL_TXTTRANSFER_OUT, AliEcommisionTableMap::COL_OPTIONCASH, AliEcommisionTableMap::COL_OPTIONFUTURE, AliEcommisionTableMap::COL_OPTIONTRANSFER, AliEcommisionTableMap::COL_OPTIONCREDIT1, AliEcommisionTableMap::COL_OPTIONCREDIT2, AliEcommisionTableMap::COL_OPTIONCREDIT3, AliEcommisionTableMap::COL_OPTIONWITHDRAW, AliEcommisionTableMap::COL_OPTIONTRANSFER_IN, AliEcommisionTableMap::COL_OPTIONTRANSFER_OUT, AliEcommisionTableMap::COL_TXTOPTION, AliEcommisionTableMap::COL_EWALLET, AliEcommisionTableMap::COL_EWALLET_BEFORE, AliEcommisionTableMap::COL_EWALLET_AFTER, AliEcommisionTableMap::COL_IPAY, AliEcommisionTableMap::COL_CHECKPORTAL, AliEcommisionTableMap::COL_BPRICE, AliEcommisionTableMap::COL_CANCEL_DATE, AliEcommisionTableMap::COL_UID_CANCEL, AliEcommisionTableMap::COL_LOCATIONBASE, AliEcommisionTableMap::COL_CHKCOMMISSION, AliEcommisionTableMap::COL_TXTCOMMISSION, AliEcommisionTableMap::COL_OPTIONCOMMISSION, AliEcommisionTableMap::COL_STATUS_TRANFER, AliEcommisionTableMap::COL_CRATE, AliEcommisionTableMap::COL_ECHECK, AliEcommisionTableMap::COL_CMBONUS, ),
        self::TYPE_FIELDNAME     => array('sano', 'rcode', 'sadate', 'inv_code', 'mcode', 'name_f', 'name_t', 'total', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkWithdraw', 'chkTransfer_in', 'chkTransfer_out', 'txtCash', 'txtFuture', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtWithdraw', 'txtTransfer_in', 'txtTransfer_out', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionWithdraw', 'optionTransfer_in', 'optionTransfer_out', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'chkCommission', 'txtCommission', 'optionCommission', 'status_tranfer', 'crate', 'echeck', 'cmbonus', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Rcode' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Mcode' => 4, 'NameF' => 5, 'NameT' => 6, 'Total' => 7, 'Usercode' => 8, 'Remark' => 9, 'Trnf' => 10, 'Id' => 11, 'SaType' => 12, 'Uid' => 13, 'Lid' => 14, 'Dl' => 15, 'Cancel' => 16, 'Send' => 17, 'Txtmoney' => 18, 'Chkcash' => 19, 'Chkfuture' => 20, 'Chktransfer' => 21, 'Chkcredit1' => 22, 'Chkcredit2' => 23, 'Chkcredit3' => 24, 'Chkwithdraw' => 25, 'ChktransferIn' => 26, 'ChktransferOut' => 27, 'Txtcash' => 28, 'Txtfuture' => 29, 'Txttransfer' => 30, 'Txtcredit1' => 31, 'Txtcredit2' => 32, 'Txtcredit3' => 33, 'Txtwithdraw' => 34, 'TxttransferIn' => 35, 'TxttransferOut' => 36, 'Optioncash' => 37, 'Optionfuture' => 38, 'Optiontransfer' => 39, 'Optioncredit1' => 40, 'Optioncredit2' => 41, 'Optioncredit3' => 42, 'Optionwithdraw' => 43, 'OptiontransferIn' => 44, 'OptiontransferOut' => 45, 'Txtoption' => 46, 'Ewallet' => 47, 'EwalletBefore' => 48, 'EwalletAfter' => 49, 'Ipay' => 50, 'Checkportal' => 51, 'Bprice' => 52, 'CancelDate' => 53, 'UidCancel' => 54, 'Locationbase' => 55, 'Chkcommission' => 56, 'Txtcommission' => 57, 'Optioncommission' => 58, 'StatusTranfer' => 59, 'Crate' => 60, 'Echeck' => 61, 'Cmbonus' => 62, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'rcode' => 1, 'sadate' => 2, 'invCode' => 3, 'mcode' => 4, 'nameF' => 5, 'nameT' => 6, 'total' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'saType' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtmoney' => 18, 'chkcash' => 19, 'chkfuture' => 20, 'chktransfer' => 21, 'chkcredit1' => 22, 'chkcredit2' => 23, 'chkcredit3' => 24, 'chkwithdraw' => 25, 'chktransferIn' => 26, 'chktransferOut' => 27, 'txtcash' => 28, 'txtfuture' => 29, 'txttransfer' => 30, 'txtcredit1' => 31, 'txtcredit2' => 32, 'txtcredit3' => 33, 'txtwithdraw' => 34, 'txttransferIn' => 35, 'txttransferOut' => 36, 'optioncash' => 37, 'optionfuture' => 38, 'optiontransfer' => 39, 'optioncredit1' => 40, 'optioncredit2' => 41, 'optioncredit3' => 42, 'optionwithdraw' => 43, 'optiontransferIn' => 44, 'optiontransferOut' => 45, 'txtoption' => 46, 'ewallet' => 47, 'ewalletBefore' => 48, 'ewalletAfter' => 49, 'ipay' => 50, 'checkportal' => 51, 'bprice' => 52, 'cancelDate' => 53, 'uidCancel' => 54, 'locationbase' => 55, 'chkcommission' => 56, 'txtcommission' => 57, 'optioncommission' => 58, 'statusTranfer' => 59, 'crate' => 60, 'echeck' => 61, 'cmbonus' => 62, ),
        self::TYPE_COLNAME       => array(AliEcommisionTableMap::COL_SANO => 0, AliEcommisionTableMap::COL_RCODE => 1, AliEcommisionTableMap::COL_SADATE => 2, AliEcommisionTableMap::COL_INV_CODE => 3, AliEcommisionTableMap::COL_MCODE => 4, AliEcommisionTableMap::COL_NAME_F => 5, AliEcommisionTableMap::COL_NAME_T => 6, AliEcommisionTableMap::COL_TOTAL => 7, AliEcommisionTableMap::COL_USERCODE => 8, AliEcommisionTableMap::COL_REMARK => 9, AliEcommisionTableMap::COL_TRNF => 10, AliEcommisionTableMap::COL_ID => 11, AliEcommisionTableMap::COL_SA_TYPE => 12, AliEcommisionTableMap::COL_UID => 13, AliEcommisionTableMap::COL_LID => 14, AliEcommisionTableMap::COL_DL => 15, AliEcommisionTableMap::COL_CANCEL => 16, AliEcommisionTableMap::COL_SEND => 17, AliEcommisionTableMap::COL_TXTMONEY => 18, AliEcommisionTableMap::COL_CHKCASH => 19, AliEcommisionTableMap::COL_CHKFUTURE => 20, AliEcommisionTableMap::COL_CHKTRANSFER => 21, AliEcommisionTableMap::COL_CHKCREDIT1 => 22, AliEcommisionTableMap::COL_CHKCREDIT2 => 23, AliEcommisionTableMap::COL_CHKCREDIT3 => 24, AliEcommisionTableMap::COL_CHKWITHDRAW => 25, AliEcommisionTableMap::COL_CHKTRANSFER_IN => 26, AliEcommisionTableMap::COL_CHKTRANSFER_OUT => 27, AliEcommisionTableMap::COL_TXTCASH => 28, AliEcommisionTableMap::COL_TXTFUTURE => 29, AliEcommisionTableMap::COL_TXTTRANSFER => 30, AliEcommisionTableMap::COL_TXTCREDIT1 => 31, AliEcommisionTableMap::COL_TXTCREDIT2 => 32, AliEcommisionTableMap::COL_TXTCREDIT3 => 33, AliEcommisionTableMap::COL_TXTWITHDRAW => 34, AliEcommisionTableMap::COL_TXTTRANSFER_IN => 35, AliEcommisionTableMap::COL_TXTTRANSFER_OUT => 36, AliEcommisionTableMap::COL_OPTIONCASH => 37, AliEcommisionTableMap::COL_OPTIONFUTURE => 38, AliEcommisionTableMap::COL_OPTIONTRANSFER => 39, AliEcommisionTableMap::COL_OPTIONCREDIT1 => 40, AliEcommisionTableMap::COL_OPTIONCREDIT2 => 41, AliEcommisionTableMap::COL_OPTIONCREDIT3 => 42, AliEcommisionTableMap::COL_OPTIONWITHDRAW => 43, AliEcommisionTableMap::COL_OPTIONTRANSFER_IN => 44, AliEcommisionTableMap::COL_OPTIONTRANSFER_OUT => 45, AliEcommisionTableMap::COL_TXTOPTION => 46, AliEcommisionTableMap::COL_EWALLET => 47, AliEcommisionTableMap::COL_EWALLET_BEFORE => 48, AliEcommisionTableMap::COL_EWALLET_AFTER => 49, AliEcommisionTableMap::COL_IPAY => 50, AliEcommisionTableMap::COL_CHECKPORTAL => 51, AliEcommisionTableMap::COL_BPRICE => 52, AliEcommisionTableMap::COL_CANCEL_DATE => 53, AliEcommisionTableMap::COL_UID_CANCEL => 54, AliEcommisionTableMap::COL_LOCATIONBASE => 55, AliEcommisionTableMap::COL_CHKCOMMISSION => 56, AliEcommisionTableMap::COL_TXTCOMMISSION => 57, AliEcommisionTableMap::COL_OPTIONCOMMISSION => 58, AliEcommisionTableMap::COL_STATUS_TRANFER => 59, AliEcommisionTableMap::COL_CRATE => 60, AliEcommisionTableMap::COL_ECHECK => 61, AliEcommisionTableMap::COL_CMBONUS => 62, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'rcode' => 1, 'sadate' => 2, 'inv_code' => 3, 'mcode' => 4, 'name_f' => 5, 'name_t' => 6, 'total' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'sa_type' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtMoney' => 18, 'chkCash' => 19, 'chkFuture' => 20, 'chkTransfer' => 21, 'chkCredit1' => 22, 'chkCredit2' => 23, 'chkCredit3' => 24, 'chkWithdraw' => 25, 'chkTransfer_in' => 26, 'chkTransfer_out' => 27, 'txtCash' => 28, 'txtFuture' => 29, 'txtTransfer' => 30, 'txtCredit1' => 31, 'txtCredit2' => 32, 'txtCredit3' => 33, 'txtWithdraw' => 34, 'txtTransfer_in' => 35, 'txtTransfer_out' => 36, 'optionCash' => 37, 'optionFuture' => 38, 'optionTransfer' => 39, 'optionCredit1' => 40, 'optionCredit2' => 41, 'optionCredit3' => 42, 'optionWithdraw' => 43, 'optionTransfer_in' => 44, 'optionTransfer_out' => 45, 'txtoption' => 46, 'ewallet' => 47, 'ewallet_before' => 48, 'ewallet_after' => 49, 'ipay' => 50, 'checkportal' => 51, 'bprice' => 52, 'cancel_date' => 53, 'uid_cancel' => 54, 'locationbase' => 55, 'chkCommission' => 56, 'txtCommission' => 57, 'optionCommission' => 58, 'status_tranfer' => 59, 'crate' => 60, 'echeck' => 61, 'cmbonus' => 62, ),
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
        $this->setName('ali_ecommision');
        $this->setPhpName('AliEcommision');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEcommision');
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
        $this->addColumn('status_tranfer', 'StatusTranfer', 'INTEGER', true, 2, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
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
        return $withPrefix ? AliEcommisionTableMap::CLASS_DEFAULT : AliEcommisionTableMap::OM_CLASS;
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
     * @return array           (AliEcommision object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEcommisionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEcommisionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEcommisionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEcommisionTableMap::OM_CLASS;
            /** @var AliEcommision $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEcommisionTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEcommisionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEcommisionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEcommision $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEcommisionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_ID);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_UID);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_LID);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_DL);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_SEND);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKWITHDRAW);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKTRANSFER_IN);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKTRANSFER_OUT);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTWITHDRAW);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTTRANSFER_IN);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTTRANSFER_OUT);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONWITHDRAW);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONTRANSFER_IN);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONTRANSFER_OUT);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_TXTCOMMISSION);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_OPTIONCOMMISSION);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_STATUS_TRANFER);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_ECHECK);
            $criteria->addSelectColumn(AliEcommisionTableMap::COL_CMBONUS);
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
            $criteria->addSelectColumn($alias . '.status_tranfer');
            $criteria->addSelectColumn($alias . '.crate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEcommisionTableMap::DATABASE_NAME)->getTable(AliEcommisionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEcommisionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEcommisionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEcommisionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEcommision or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEcommision object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcommisionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEcommision) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEcommisionTableMap::DATABASE_NAME);
            $criteria->add(AliEcommisionTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEcommisionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEcommisionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEcommisionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ecommision table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEcommisionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEcommision or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEcommision object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcommisionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEcommision object
        }

        if ($criteria->containsKey(AliEcommisionTableMap::COL_ID) && $criteria->keyContainsValue(AliEcommisionTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEcommisionTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEcommisionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEcommisionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEcommisionTableMap::buildTableMap();
