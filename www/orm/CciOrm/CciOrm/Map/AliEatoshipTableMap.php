<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEatoship;
use CciOrm\CciOrm\AliEatoshipQuery;
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
 * This class defines the structure of the 'ali_eatoship' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEatoshipTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEatoshipTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_eatoship';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEatoship';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEatoship';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 67;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 67;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_eatoship.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_eatoship.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_eatoship.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_eatoship.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_eatoship.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_eatoship.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_eatoship.total';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_eatoship.pv';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_eatoship.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_eatoship.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_eatoship.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_eatoship.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_eatoship.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_eatoship.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_eatoship.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_eatoship.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_eatoship.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_eatoship.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_eatoship.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_eatoship.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_eatoship.chkFuture';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_eatoship.chkInternet';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_eatoship.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_eatoship.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_eatoship.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_eatoship.chkCredit3';

    /**
     * the column name for the chkWithdraw field
     */
    const COL_CHKWITHDRAW = 'ali_eatoship.chkWithdraw';

    /**
     * the column name for the chkTransfer_in field
     */
    const COL_CHKTRANSFER_IN = 'ali_eatoship.chkTransfer_in';

    /**
     * the column name for the chkTransfer_out field
     */
    const COL_CHKTRANSFER_OUT = 'ali_eatoship.chkTransfer_out';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_eatoship.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_eatoship.txtFuture';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_eatoship.txtInternet';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_eatoship.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_eatoship.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_eatoship.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_eatoship.txtCredit3';

    /**
     * the column name for the txtWithdraw field
     */
    const COL_TXTWITHDRAW = 'ali_eatoship.txtWithdraw';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_eatoship.txtDiscount';

    /**
     * the column name for the txtTransfer_in field
     */
    const COL_TXTTRANSFER_IN = 'ali_eatoship.txtTransfer_in';

    /**
     * the column name for the txtTransfer_out field
     */
    const COL_TXTTRANSFER_OUT = 'ali_eatoship.txtTransfer_out';

    /**
     * the column name for the txtVoucher field
     */
    const COL_TXTVOUCHER = 'ali_eatoship.txtVoucher';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_eatoship.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_eatoship.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_eatoship.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_eatoship.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_eatoship.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_eatoship.optionCredit3';

    /**
     * the column name for the optionWithdraw field
     */
    const COL_OPTIONWITHDRAW = 'ali_eatoship.optionWithdraw';

    /**
     * the column name for the optionTransfer_in field
     */
    const COL_OPTIONTRANSFER_IN = 'ali_eatoship.optionTransfer_in';

    /**
     * the column name for the optionTransfer_out field
     */
    const COL_OPTIONTRANSFER_OUT = 'ali_eatoship.optionTransfer_out';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_eatoship.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_eatoship.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_eatoship.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_eatoship.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_eatoship.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_eatoship.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_eatoship.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_eatoship.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_eatoship.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_eatoship.locationbase';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_eatoship.chkCommission';

    /**
     * the column name for the txtCommission field
     */
    const COL_TXTCOMMISSION = 'ali_eatoship.txtCommission';

    /**
     * the column name for the optionCommission field
     */
    const COL_OPTIONCOMMISSION = 'ali_eatoship.optionCommission';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_eatoship.mbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_eatoship.crate';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_eatoship.rcode';

    /**
     * the column name for the echeck field
     */
    const COL_ECHECK = 'ali_eatoship.echeck';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sadate', 'InvCode', 'Mcode', 'NameF', 'NameT', 'Total', 'Pv', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkfuture', 'Chkinternet', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkwithdraw', 'ChktransferIn', 'ChktransferOut', 'Txtcash', 'Txtfuture', 'Txtinternet', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtwithdraw', 'Txtdiscount', 'TxttransferIn', 'TxttransferOut', 'Txtvoucher', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optionwithdraw', 'OptiontransferIn', 'OptiontransferOut', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Chkcommission', 'Txtcommission', 'Optioncommission', 'Mbase', 'Crate', 'Rcode', 'Echeck', ),
        self::TYPE_CAMELNAME     => array('sano', 'sadate', 'invCode', 'mcode', 'nameF', 'nameT', 'total', 'pv', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkfuture', 'chkinternet', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkwithdraw', 'chktransferIn', 'chktransferOut', 'txtcash', 'txtfuture', 'txtinternet', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtwithdraw', 'txtdiscount', 'txttransferIn', 'txttransferOut', 'txtvoucher', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optionwithdraw', 'optiontransferIn', 'optiontransferOut', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'chkcommission', 'txtcommission', 'optioncommission', 'mbase', 'crate', 'rcode', 'echeck', ),
        self::TYPE_COLNAME       => array(AliEatoshipTableMap::COL_SANO, AliEatoshipTableMap::COL_SADATE, AliEatoshipTableMap::COL_INV_CODE, AliEatoshipTableMap::COL_MCODE, AliEatoshipTableMap::COL_NAME_F, AliEatoshipTableMap::COL_NAME_T, AliEatoshipTableMap::COL_TOTAL, AliEatoshipTableMap::COL_PV, AliEatoshipTableMap::COL_USERCODE, AliEatoshipTableMap::COL_REMARK, AliEatoshipTableMap::COL_TRNF, AliEatoshipTableMap::COL_ID, AliEatoshipTableMap::COL_SA_TYPE, AliEatoshipTableMap::COL_UID, AliEatoshipTableMap::COL_LID, AliEatoshipTableMap::COL_DL, AliEatoshipTableMap::COL_CANCEL, AliEatoshipTableMap::COL_SEND, AliEatoshipTableMap::COL_TXTMONEY, AliEatoshipTableMap::COL_CHKCASH, AliEatoshipTableMap::COL_CHKFUTURE, AliEatoshipTableMap::COL_CHKINTERNET, AliEatoshipTableMap::COL_CHKTRANSFER, AliEatoshipTableMap::COL_CHKCREDIT1, AliEatoshipTableMap::COL_CHKCREDIT2, AliEatoshipTableMap::COL_CHKCREDIT3, AliEatoshipTableMap::COL_CHKWITHDRAW, AliEatoshipTableMap::COL_CHKTRANSFER_IN, AliEatoshipTableMap::COL_CHKTRANSFER_OUT, AliEatoshipTableMap::COL_TXTCASH, AliEatoshipTableMap::COL_TXTFUTURE, AliEatoshipTableMap::COL_TXTINTERNET, AliEatoshipTableMap::COL_TXTTRANSFER, AliEatoshipTableMap::COL_TXTCREDIT1, AliEatoshipTableMap::COL_TXTCREDIT2, AliEatoshipTableMap::COL_TXTCREDIT3, AliEatoshipTableMap::COL_TXTWITHDRAW, AliEatoshipTableMap::COL_TXTDISCOUNT, AliEatoshipTableMap::COL_TXTTRANSFER_IN, AliEatoshipTableMap::COL_TXTTRANSFER_OUT, AliEatoshipTableMap::COL_TXTVOUCHER, AliEatoshipTableMap::COL_OPTIONCASH, AliEatoshipTableMap::COL_OPTIONFUTURE, AliEatoshipTableMap::COL_OPTIONTRANSFER, AliEatoshipTableMap::COL_OPTIONCREDIT1, AliEatoshipTableMap::COL_OPTIONCREDIT2, AliEatoshipTableMap::COL_OPTIONCREDIT3, AliEatoshipTableMap::COL_OPTIONWITHDRAW, AliEatoshipTableMap::COL_OPTIONTRANSFER_IN, AliEatoshipTableMap::COL_OPTIONTRANSFER_OUT, AliEatoshipTableMap::COL_TXTOPTION, AliEatoshipTableMap::COL_EWALLET, AliEatoshipTableMap::COL_EWALLET_BEFORE, AliEatoshipTableMap::COL_EWALLET_AFTER, AliEatoshipTableMap::COL_IPAY, AliEatoshipTableMap::COL_CHECKPORTAL, AliEatoshipTableMap::COL_BPRICE, AliEatoshipTableMap::COL_CANCEL_DATE, AliEatoshipTableMap::COL_UID_CANCEL, AliEatoshipTableMap::COL_LOCATIONBASE, AliEatoshipTableMap::COL_CHKCOMMISSION, AliEatoshipTableMap::COL_TXTCOMMISSION, AliEatoshipTableMap::COL_OPTIONCOMMISSION, AliEatoshipTableMap::COL_MBASE, AliEatoshipTableMap::COL_CRATE, AliEatoshipTableMap::COL_RCODE, AliEatoshipTableMap::COL_ECHECK, ),
        self::TYPE_FIELDNAME     => array('sano', 'sadate', 'inv_code', 'mcode', 'name_f', 'name_t', 'total', 'pv', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkFuture', 'chkInternet', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkWithdraw', 'chkTransfer_in', 'chkTransfer_out', 'txtCash', 'txtFuture', 'txtInternet', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtWithdraw', 'txtDiscount', 'txtTransfer_in', 'txtTransfer_out', 'txtVoucher', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionWithdraw', 'optionTransfer_in', 'optionTransfer_out', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'chkCommission', 'txtCommission', 'optionCommission', 'mbase', 'crate', 'rcode', 'echeck', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sadate' => 1, 'InvCode' => 2, 'Mcode' => 3, 'NameF' => 4, 'NameT' => 5, 'Total' => 6, 'Pv' => 7, 'Usercode' => 8, 'Remark' => 9, 'Trnf' => 10, 'Id' => 11, 'SaType' => 12, 'Uid' => 13, 'Lid' => 14, 'Dl' => 15, 'Cancel' => 16, 'Send' => 17, 'Txtmoney' => 18, 'Chkcash' => 19, 'Chkfuture' => 20, 'Chkinternet' => 21, 'Chktransfer' => 22, 'Chkcredit1' => 23, 'Chkcredit2' => 24, 'Chkcredit3' => 25, 'Chkwithdraw' => 26, 'ChktransferIn' => 27, 'ChktransferOut' => 28, 'Txtcash' => 29, 'Txtfuture' => 30, 'Txtinternet' => 31, 'Txttransfer' => 32, 'Txtcredit1' => 33, 'Txtcredit2' => 34, 'Txtcredit3' => 35, 'Txtwithdraw' => 36, 'Txtdiscount' => 37, 'TxttransferIn' => 38, 'TxttransferOut' => 39, 'Txtvoucher' => 40, 'Optioncash' => 41, 'Optionfuture' => 42, 'Optiontransfer' => 43, 'Optioncredit1' => 44, 'Optioncredit2' => 45, 'Optioncredit3' => 46, 'Optionwithdraw' => 47, 'OptiontransferIn' => 48, 'OptiontransferOut' => 49, 'Txtoption' => 50, 'Ewallet' => 51, 'EwalletBefore' => 52, 'EwalletAfter' => 53, 'Ipay' => 54, 'Checkportal' => 55, 'Bprice' => 56, 'CancelDate' => 57, 'UidCancel' => 58, 'Locationbase' => 59, 'Chkcommission' => 60, 'Txtcommission' => 61, 'Optioncommission' => 62, 'Mbase' => 63, 'Crate' => 64, 'Rcode' => 65, 'Echeck' => 66, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sadate' => 1, 'invCode' => 2, 'mcode' => 3, 'nameF' => 4, 'nameT' => 5, 'total' => 6, 'pv' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'saType' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtmoney' => 18, 'chkcash' => 19, 'chkfuture' => 20, 'chkinternet' => 21, 'chktransfer' => 22, 'chkcredit1' => 23, 'chkcredit2' => 24, 'chkcredit3' => 25, 'chkwithdraw' => 26, 'chktransferIn' => 27, 'chktransferOut' => 28, 'txtcash' => 29, 'txtfuture' => 30, 'txtinternet' => 31, 'txttransfer' => 32, 'txtcredit1' => 33, 'txtcredit2' => 34, 'txtcredit3' => 35, 'txtwithdraw' => 36, 'txtdiscount' => 37, 'txttransferIn' => 38, 'txttransferOut' => 39, 'txtvoucher' => 40, 'optioncash' => 41, 'optionfuture' => 42, 'optiontransfer' => 43, 'optioncredit1' => 44, 'optioncredit2' => 45, 'optioncredit3' => 46, 'optionwithdraw' => 47, 'optiontransferIn' => 48, 'optiontransferOut' => 49, 'txtoption' => 50, 'ewallet' => 51, 'ewalletBefore' => 52, 'ewalletAfter' => 53, 'ipay' => 54, 'checkportal' => 55, 'bprice' => 56, 'cancelDate' => 57, 'uidCancel' => 58, 'locationbase' => 59, 'chkcommission' => 60, 'txtcommission' => 61, 'optioncommission' => 62, 'mbase' => 63, 'crate' => 64, 'rcode' => 65, 'echeck' => 66, ),
        self::TYPE_COLNAME       => array(AliEatoshipTableMap::COL_SANO => 0, AliEatoshipTableMap::COL_SADATE => 1, AliEatoshipTableMap::COL_INV_CODE => 2, AliEatoshipTableMap::COL_MCODE => 3, AliEatoshipTableMap::COL_NAME_F => 4, AliEatoshipTableMap::COL_NAME_T => 5, AliEatoshipTableMap::COL_TOTAL => 6, AliEatoshipTableMap::COL_PV => 7, AliEatoshipTableMap::COL_USERCODE => 8, AliEatoshipTableMap::COL_REMARK => 9, AliEatoshipTableMap::COL_TRNF => 10, AliEatoshipTableMap::COL_ID => 11, AliEatoshipTableMap::COL_SA_TYPE => 12, AliEatoshipTableMap::COL_UID => 13, AliEatoshipTableMap::COL_LID => 14, AliEatoshipTableMap::COL_DL => 15, AliEatoshipTableMap::COL_CANCEL => 16, AliEatoshipTableMap::COL_SEND => 17, AliEatoshipTableMap::COL_TXTMONEY => 18, AliEatoshipTableMap::COL_CHKCASH => 19, AliEatoshipTableMap::COL_CHKFUTURE => 20, AliEatoshipTableMap::COL_CHKINTERNET => 21, AliEatoshipTableMap::COL_CHKTRANSFER => 22, AliEatoshipTableMap::COL_CHKCREDIT1 => 23, AliEatoshipTableMap::COL_CHKCREDIT2 => 24, AliEatoshipTableMap::COL_CHKCREDIT3 => 25, AliEatoshipTableMap::COL_CHKWITHDRAW => 26, AliEatoshipTableMap::COL_CHKTRANSFER_IN => 27, AliEatoshipTableMap::COL_CHKTRANSFER_OUT => 28, AliEatoshipTableMap::COL_TXTCASH => 29, AliEatoshipTableMap::COL_TXTFUTURE => 30, AliEatoshipTableMap::COL_TXTINTERNET => 31, AliEatoshipTableMap::COL_TXTTRANSFER => 32, AliEatoshipTableMap::COL_TXTCREDIT1 => 33, AliEatoshipTableMap::COL_TXTCREDIT2 => 34, AliEatoshipTableMap::COL_TXTCREDIT3 => 35, AliEatoshipTableMap::COL_TXTWITHDRAW => 36, AliEatoshipTableMap::COL_TXTDISCOUNT => 37, AliEatoshipTableMap::COL_TXTTRANSFER_IN => 38, AliEatoshipTableMap::COL_TXTTRANSFER_OUT => 39, AliEatoshipTableMap::COL_TXTVOUCHER => 40, AliEatoshipTableMap::COL_OPTIONCASH => 41, AliEatoshipTableMap::COL_OPTIONFUTURE => 42, AliEatoshipTableMap::COL_OPTIONTRANSFER => 43, AliEatoshipTableMap::COL_OPTIONCREDIT1 => 44, AliEatoshipTableMap::COL_OPTIONCREDIT2 => 45, AliEatoshipTableMap::COL_OPTIONCREDIT3 => 46, AliEatoshipTableMap::COL_OPTIONWITHDRAW => 47, AliEatoshipTableMap::COL_OPTIONTRANSFER_IN => 48, AliEatoshipTableMap::COL_OPTIONTRANSFER_OUT => 49, AliEatoshipTableMap::COL_TXTOPTION => 50, AliEatoshipTableMap::COL_EWALLET => 51, AliEatoshipTableMap::COL_EWALLET_BEFORE => 52, AliEatoshipTableMap::COL_EWALLET_AFTER => 53, AliEatoshipTableMap::COL_IPAY => 54, AliEatoshipTableMap::COL_CHECKPORTAL => 55, AliEatoshipTableMap::COL_BPRICE => 56, AliEatoshipTableMap::COL_CANCEL_DATE => 57, AliEatoshipTableMap::COL_UID_CANCEL => 58, AliEatoshipTableMap::COL_LOCATIONBASE => 59, AliEatoshipTableMap::COL_CHKCOMMISSION => 60, AliEatoshipTableMap::COL_TXTCOMMISSION => 61, AliEatoshipTableMap::COL_OPTIONCOMMISSION => 62, AliEatoshipTableMap::COL_MBASE => 63, AliEatoshipTableMap::COL_CRATE => 64, AliEatoshipTableMap::COL_RCODE => 65, AliEatoshipTableMap::COL_ECHECK => 66, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sadate' => 1, 'inv_code' => 2, 'mcode' => 3, 'name_f' => 4, 'name_t' => 5, 'total' => 6, 'pv' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'sa_type' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtMoney' => 18, 'chkCash' => 19, 'chkFuture' => 20, 'chkInternet' => 21, 'chkTransfer' => 22, 'chkCredit1' => 23, 'chkCredit2' => 24, 'chkCredit3' => 25, 'chkWithdraw' => 26, 'chkTransfer_in' => 27, 'chkTransfer_out' => 28, 'txtCash' => 29, 'txtFuture' => 30, 'txtInternet' => 31, 'txtTransfer' => 32, 'txtCredit1' => 33, 'txtCredit2' => 34, 'txtCredit3' => 35, 'txtWithdraw' => 36, 'txtDiscount' => 37, 'txtTransfer_in' => 38, 'txtTransfer_out' => 39, 'txtVoucher' => 40, 'optionCash' => 41, 'optionFuture' => 42, 'optionTransfer' => 43, 'optionCredit1' => 44, 'optionCredit2' => 45, 'optionCredit3' => 46, 'optionWithdraw' => 47, 'optionTransfer_in' => 48, 'optionTransfer_out' => 49, 'txtoption' => 50, 'ewallet' => 51, 'ewallet_before' => 52, 'ewallet_after' => 53, 'ipay' => 54, 'checkportal' => 55, 'bprice' => 56, 'cancel_date' => 57, 'uid_cancel' => 58, 'locationbase' => 59, 'chkCommission' => 60, 'txtCommission' => 61, 'optionCommission' => 62, 'mbase' => 63, 'crate' => 64, 'rcode' => 65, 'echeck' => 66, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, )
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
        $this->setName('ali_eatoship');
        $this->setPhpName('AliEatoship');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEatoship');
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
        $this->addColumn('pv', 'Pv', 'INTEGER', true, null, null);
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
        $this->addColumn('chkInternet', 'Chkinternet', 'VARCHAR', true, 100, null);
        $this->addColumn('chkTransfer', 'Chktransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit1', 'Chkcredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit2', 'Chkcredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit3', 'Chkcredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('chkWithdraw', 'Chkwithdraw', 'VARCHAR', true, 255, null);
        $this->addColumn('chkTransfer_in', 'ChktransferIn', 'VARCHAR', true, 255, null);
        $this->addColumn('chkTransfer_out', 'ChktransferOut', 'VARCHAR', true, 255, null);
        $this->addColumn('txtCash', 'Txtcash', 'DECIMAL', true, 15, null);
        $this->addColumn('txtFuture', 'Txtfuture', 'DECIMAL', true, 15, null);
        $this->addColumn('txtInternet', 'Txtinternet', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer', 'Txttransfer', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit1', 'Txtcredit1', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit2', 'Txtcredit2', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit3', 'Txtcredit3', 'DECIMAL', true, 15, null);
        $this->addColumn('txtWithdraw', 'Txtwithdraw', 'DECIMAL', true, 15, null);
        $this->addColumn('txtDiscount', 'Txtdiscount', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer_in', 'TxttransferIn', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer_out', 'TxttransferOut', 'DECIMAL', true, 15, null);
        $this->addColumn('txtVoucher', 'Txtvoucher', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliEatoshipTableMap::CLASS_DEFAULT : AliEatoshipTableMap::OM_CLASS;
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
     * @return array           (AliEatoship object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEatoshipTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEatoshipTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEatoshipTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEatoshipTableMap::OM_CLASS;
            /** @var AliEatoship $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEatoshipTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEatoshipTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEatoshipTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEatoship $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEatoshipTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_PV);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_ID);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_UID);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_LID);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_DL);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_SEND);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKWITHDRAW);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKTRANSFER_IN);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKTRANSFER_OUT);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTWITHDRAW);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTTRANSFER_IN);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTTRANSFER_OUT);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTVOUCHER);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONWITHDRAW);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONTRANSFER_IN);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONTRANSFER_OUT);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_TXTCOMMISSION);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_OPTIONCOMMISSION);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliEatoshipTableMap::COL_ECHECK);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.pv');
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
            $criteria->addSelectColumn($alias . '.chkInternet');
            $criteria->addSelectColumn($alias . '.chkTransfer');
            $criteria->addSelectColumn($alias . '.chkCredit1');
            $criteria->addSelectColumn($alias . '.chkCredit2');
            $criteria->addSelectColumn($alias . '.chkCredit3');
            $criteria->addSelectColumn($alias . '.chkWithdraw');
            $criteria->addSelectColumn($alias . '.chkTransfer_in');
            $criteria->addSelectColumn($alias . '.chkTransfer_out');
            $criteria->addSelectColumn($alias . '.txtCash');
            $criteria->addSelectColumn($alias . '.txtFuture');
            $criteria->addSelectColumn($alias . '.txtInternet');
            $criteria->addSelectColumn($alias . '.txtTransfer');
            $criteria->addSelectColumn($alias . '.txtCredit1');
            $criteria->addSelectColumn($alias . '.txtCredit2');
            $criteria->addSelectColumn($alias . '.txtCredit3');
            $criteria->addSelectColumn($alias . '.txtWithdraw');
            $criteria->addSelectColumn($alias . '.txtDiscount');
            $criteria->addSelectColumn($alias . '.txtTransfer_in');
            $criteria->addSelectColumn($alias . '.txtTransfer_out');
            $criteria->addSelectColumn($alias . '.txtVoucher');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEatoshipTableMap::DATABASE_NAME)->getTable(AliEatoshipTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEatoshipTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEatoshipTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEatoshipTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEatoship or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEatoship object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEatoshipTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEatoship) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEatoshipTableMap::DATABASE_NAME);
            $criteria->add(AliEatoshipTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEatoshipQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEatoshipTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEatoshipTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_eatoship table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEatoshipQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEatoship or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEatoship object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEatoshipTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEatoship object
        }

        if ($criteria->containsKey(AliEatoshipTableMap::COL_ID) && $criteria->keyContainsValue(AliEatoshipTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEatoshipTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEatoshipQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEatoshipTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEatoshipTableMap::buildTableMap();
