<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEcom;
use CciOrm\CciOrm\AliEcomQuery;
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
 * This class defines the structure of the 'ali_ecom' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEcomTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEcomTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ecom';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEcom';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEcom';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 83;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 83;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_ecom.sano';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_ecom.rcode';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_ecom.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_ecom.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ecom.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_ecom.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_ecom.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ecom.total';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_ecom.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_ecom.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_ecom.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_ecom.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_ecom.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_ecom.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_ecom.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_ecom.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_ecom.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_ecom.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_ecom.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_ecom.chkCash';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_ecom.chkInternet';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_ecom.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_ecom.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_ecom.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_ecom.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_ecom.chkCredit3';

    /**
     * the column name for the chkWithdraw field
     */
    const COL_CHKWITHDRAW = 'ali_ecom.chkWithdraw';

    /**
     * the column name for the chkTransfer_in field
     */
    const COL_CHKTRANSFER_IN = 'ali_ecom.chkTransfer_in';

    /**
     * the column name for the chkTransfer_out field
     */
    const COL_CHKTRANSFER_OUT = 'ali_ecom.chkTransfer_out';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_ecom.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_ecom.txtFuture';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_ecom.txtInternet';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_ecom.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_ecom.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_ecom.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_ecom.txtCredit3';

    /**
     * the column name for the txtWithdraw field
     */
    const COL_TXTWITHDRAW = 'ali_ecom.txtWithdraw';

    /**
     * the column name for the txtTransfer_in field
     */
    const COL_TXTTRANSFER_IN = 'ali_ecom.txtTransfer_in';

    /**
     * the column name for the txtTransfer_out field
     */
    const COL_TXTTRANSFER_OUT = 'ali_ecom.txtTransfer_out';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_ecom.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_ecom.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_ecom.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_ecom.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_ecom.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_ecom.optionCredit3';

    /**
     * the column name for the optionWithdraw field
     */
    const COL_OPTIONWITHDRAW = 'ali_ecom.optionWithdraw';

    /**
     * the column name for the optionTransfer_in field
     */
    const COL_OPTIONTRANSFER_IN = 'ali_ecom.optionTransfer_in';

    /**
     * the column name for the optionTransfer_out field
     */
    const COL_OPTIONTRANSFER_OUT = 'ali_ecom.optionTransfer_out';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_ecom.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_ecom.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_ecom.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_ecom.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_ecom.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_ecom.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_ecom.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_ecom.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_ecom.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_ecom.locationbase';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_ecom.chkCommission';

    /**
     * the column name for the txtCommission field
     */
    const COL_TXTCOMMISSION = 'ali_ecom.txtCommission';

    /**
     * the column name for the optionCommission field
     */
    const COL_OPTIONCOMMISSION = 'ali_ecom.optionCommission';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_ecom.mbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_ecom.crate';

    /**
     * the column name for the echeck field
     */
    const COL_ECHECK = 'ali_ecom.echeck';

    /**
     * the column name for the sano_temp field
     */
    const COL_SANO_TEMP = 'ali_ecom.sano_temp';

    /**
     * the column name for the selectCash field
     */
    const COL_SELECTCASH = 'ali_ecom.selectCash';

    /**
     * the column name for the selectTransfer field
     */
    const COL_SELECTTRANSFER = 'ali_ecom.selectTransfer';

    /**
     * the column name for the selectCredit1 field
     */
    const COL_SELECTCREDIT1 = 'ali_ecom.selectCredit1';

    /**
     * the column name for the selectCredit2 field
     */
    const COL_SELECTCREDIT2 = 'ali_ecom.selectCredit2';

    /**
     * the column name for the selectCredit3 field
     */
    const COL_SELECTCREDIT3 = 'ali_ecom.selectCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_ecom.optionInternet';

    /**
     * the column name for the selectInternet field
     */
    const COL_SELECTINTERNET = 'ali_ecom.selectInternet';

    /**
     * the column name for the txtTransfer1 field
     */
    const COL_TXTTRANSFER1 = 'ali_ecom.txtTransfer1';

    /**
     * the column name for the optionTransfer1 field
     */
    const COL_OPTIONTRANSFER1 = 'ali_ecom.optionTransfer1';

    /**
     * the column name for the selectTransfer1 field
     */
    const COL_SELECTTRANSFER1 = 'ali_ecom.selectTransfer1';

    /**
     * the column name for the txtTransfer2 field
     */
    const COL_TXTTRANSFER2 = 'ali_ecom.txtTransfer2';

    /**
     * the column name for the optionTransfer2 field
     */
    const COL_OPTIONTRANSFER2 = 'ali_ecom.optionTransfer2';

    /**
     * the column name for the selectTransfer2 field
     */
    const COL_SELECTTRANSFER2 = 'ali_ecom.selectTransfer2';

    /**
     * the column name for the txtTransfer3 field
     */
    const COL_TXTTRANSFER3 = 'ali_ecom.txtTransfer3';

    /**
     * the column name for the optionTransfer3 field
     */
    const COL_OPTIONTRANSFER3 = 'ali_ecom.optionTransfer3';

    /**
     * the column name for the selectTransfer3 field
     */
    const COL_SELECTTRANSFER3 = 'ali_ecom.selectTransfer3';

    /**
     * the column name for the image_transfer field
     */
    const COL_IMAGE_TRANSFER = 'ali_ecom.image_transfer';

    /**
     * the column name for the txtVoucher field
     */
    const COL_TXTVOUCHER = 'ali_ecom.txtVoucher';

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
        self::TYPE_PHPNAME       => array('Sano', 'Rcode', 'Sadate', 'InvCode', 'Mcode', 'NameF', 'NameT', 'Total', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkinternet', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkwithdraw', 'ChktransferIn', 'ChktransferOut', 'Txtcash', 'Txtfuture', 'Txtinternet', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtwithdraw', 'TxttransferIn', 'TxttransferOut', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optionwithdraw', 'OptiontransferIn', 'OptiontransferOut', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Chkcommission', 'Txtcommission', 'Optioncommission', 'Mbase', 'Crate', 'Echeck', 'SanoTemp', 'Selectcash', 'Selecttransfer', 'Selectcredit1', 'Selectcredit2', 'Selectcredit3', 'Optioninternet', 'Selectinternet', 'Txttransfer1', 'Optiontransfer1', 'Selecttransfer1', 'Txttransfer2', 'Optiontransfer2', 'Selecttransfer2', 'Txttransfer3', 'Optiontransfer3', 'Selecttransfer3', 'ImageTransfer', 'Txtvoucher', ),
        self::TYPE_CAMELNAME     => array('sano', 'rcode', 'sadate', 'invCode', 'mcode', 'nameF', 'nameT', 'total', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkinternet', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkwithdraw', 'chktransferIn', 'chktransferOut', 'txtcash', 'txtfuture', 'txtinternet', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtwithdraw', 'txttransferIn', 'txttransferOut', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optionwithdraw', 'optiontransferIn', 'optiontransferOut', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'chkcommission', 'txtcommission', 'optioncommission', 'mbase', 'crate', 'echeck', 'sanoTemp', 'selectcash', 'selecttransfer', 'selectcredit1', 'selectcredit2', 'selectcredit3', 'optioninternet', 'selectinternet', 'txttransfer1', 'optiontransfer1', 'selecttransfer1', 'txttransfer2', 'optiontransfer2', 'selecttransfer2', 'txttransfer3', 'optiontransfer3', 'selecttransfer3', 'imageTransfer', 'txtvoucher', ),
        self::TYPE_COLNAME       => array(AliEcomTableMap::COL_SANO, AliEcomTableMap::COL_RCODE, AliEcomTableMap::COL_SADATE, AliEcomTableMap::COL_INV_CODE, AliEcomTableMap::COL_MCODE, AliEcomTableMap::COL_NAME_F, AliEcomTableMap::COL_NAME_T, AliEcomTableMap::COL_TOTAL, AliEcomTableMap::COL_USERCODE, AliEcomTableMap::COL_REMARK, AliEcomTableMap::COL_TRNF, AliEcomTableMap::COL_ID, AliEcomTableMap::COL_SA_TYPE, AliEcomTableMap::COL_UID, AliEcomTableMap::COL_LID, AliEcomTableMap::COL_DL, AliEcomTableMap::COL_CANCEL, AliEcomTableMap::COL_SEND, AliEcomTableMap::COL_TXTMONEY, AliEcomTableMap::COL_CHKCASH, AliEcomTableMap::COL_CHKINTERNET, AliEcomTableMap::COL_CHKFUTURE, AliEcomTableMap::COL_CHKTRANSFER, AliEcomTableMap::COL_CHKCREDIT1, AliEcomTableMap::COL_CHKCREDIT2, AliEcomTableMap::COL_CHKCREDIT3, AliEcomTableMap::COL_CHKWITHDRAW, AliEcomTableMap::COL_CHKTRANSFER_IN, AliEcomTableMap::COL_CHKTRANSFER_OUT, AliEcomTableMap::COL_TXTCASH, AliEcomTableMap::COL_TXTFUTURE, AliEcomTableMap::COL_TXTINTERNET, AliEcomTableMap::COL_TXTTRANSFER, AliEcomTableMap::COL_TXTCREDIT1, AliEcomTableMap::COL_TXTCREDIT2, AliEcomTableMap::COL_TXTCREDIT3, AliEcomTableMap::COL_TXTWITHDRAW, AliEcomTableMap::COL_TXTTRANSFER_IN, AliEcomTableMap::COL_TXTTRANSFER_OUT, AliEcomTableMap::COL_OPTIONCASH, AliEcomTableMap::COL_OPTIONFUTURE, AliEcomTableMap::COL_OPTIONTRANSFER, AliEcomTableMap::COL_OPTIONCREDIT1, AliEcomTableMap::COL_OPTIONCREDIT2, AliEcomTableMap::COL_OPTIONCREDIT3, AliEcomTableMap::COL_OPTIONWITHDRAW, AliEcomTableMap::COL_OPTIONTRANSFER_IN, AliEcomTableMap::COL_OPTIONTRANSFER_OUT, AliEcomTableMap::COL_TXTOPTION, AliEcomTableMap::COL_EWALLET, AliEcomTableMap::COL_EWALLET_BEFORE, AliEcomTableMap::COL_EWALLET_AFTER, AliEcomTableMap::COL_IPAY, AliEcomTableMap::COL_CHECKPORTAL, AliEcomTableMap::COL_BPRICE, AliEcomTableMap::COL_CANCEL_DATE, AliEcomTableMap::COL_UID_CANCEL, AliEcomTableMap::COL_LOCATIONBASE, AliEcomTableMap::COL_CHKCOMMISSION, AliEcomTableMap::COL_TXTCOMMISSION, AliEcomTableMap::COL_OPTIONCOMMISSION, AliEcomTableMap::COL_MBASE, AliEcomTableMap::COL_CRATE, AliEcomTableMap::COL_ECHECK, AliEcomTableMap::COL_SANO_TEMP, AliEcomTableMap::COL_SELECTCASH, AliEcomTableMap::COL_SELECTTRANSFER, AliEcomTableMap::COL_SELECTCREDIT1, AliEcomTableMap::COL_SELECTCREDIT2, AliEcomTableMap::COL_SELECTCREDIT3, AliEcomTableMap::COL_OPTIONINTERNET, AliEcomTableMap::COL_SELECTINTERNET, AliEcomTableMap::COL_TXTTRANSFER1, AliEcomTableMap::COL_OPTIONTRANSFER1, AliEcomTableMap::COL_SELECTTRANSFER1, AliEcomTableMap::COL_TXTTRANSFER2, AliEcomTableMap::COL_OPTIONTRANSFER2, AliEcomTableMap::COL_SELECTTRANSFER2, AliEcomTableMap::COL_TXTTRANSFER3, AliEcomTableMap::COL_OPTIONTRANSFER3, AliEcomTableMap::COL_SELECTTRANSFER3, AliEcomTableMap::COL_IMAGE_TRANSFER, AliEcomTableMap::COL_TXTVOUCHER, ),
        self::TYPE_FIELDNAME     => array('sano', 'rcode', 'sadate', 'inv_code', 'mcode', 'name_f', 'name_t', 'total', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkInternet', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkWithdraw', 'chkTransfer_in', 'chkTransfer_out', 'txtCash', 'txtFuture', 'txtInternet', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtWithdraw', 'txtTransfer_in', 'txtTransfer_out', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionWithdraw', 'optionTransfer_in', 'optionTransfer_out', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'chkCommission', 'txtCommission', 'optionCommission', 'mbase', 'crate', 'echeck', 'sano_temp', 'selectCash', 'selectTransfer', 'selectCredit1', 'selectCredit2', 'selectCredit3', 'optionInternet', 'selectInternet', 'txtTransfer1', 'optionTransfer1', 'selectTransfer1', 'txtTransfer2', 'optionTransfer2', 'selectTransfer2', 'txtTransfer3', 'optionTransfer3', 'selectTransfer3', 'image_transfer', 'txtVoucher', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Rcode' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Mcode' => 4, 'NameF' => 5, 'NameT' => 6, 'Total' => 7, 'Usercode' => 8, 'Remark' => 9, 'Trnf' => 10, 'Id' => 11, 'SaType' => 12, 'Uid' => 13, 'Lid' => 14, 'Dl' => 15, 'Cancel' => 16, 'Send' => 17, 'Txtmoney' => 18, 'Chkcash' => 19, 'Chkinternet' => 20, 'Chkfuture' => 21, 'Chktransfer' => 22, 'Chkcredit1' => 23, 'Chkcredit2' => 24, 'Chkcredit3' => 25, 'Chkwithdraw' => 26, 'ChktransferIn' => 27, 'ChktransferOut' => 28, 'Txtcash' => 29, 'Txtfuture' => 30, 'Txtinternet' => 31, 'Txttransfer' => 32, 'Txtcredit1' => 33, 'Txtcredit2' => 34, 'Txtcredit3' => 35, 'Txtwithdraw' => 36, 'TxttransferIn' => 37, 'TxttransferOut' => 38, 'Optioncash' => 39, 'Optionfuture' => 40, 'Optiontransfer' => 41, 'Optioncredit1' => 42, 'Optioncredit2' => 43, 'Optioncredit3' => 44, 'Optionwithdraw' => 45, 'OptiontransferIn' => 46, 'OptiontransferOut' => 47, 'Txtoption' => 48, 'Ewallet' => 49, 'EwalletBefore' => 50, 'EwalletAfter' => 51, 'Ipay' => 52, 'Checkportal' => 53, 'Bprice' => 54, 'CancelDate' => 55, 'UidCancel' => 56, 'Locationbase' => 57, 'Chkcommission' => 58, 'Txtcommission' => 59, 'Optioncommission' => 60, 'Mbase' => 61, 'Crate' => 62, 'Echeck' => 63, 'SanoTemp' => 64, 'Selectcash' => 65, 'Selecttransfer' => 66, 'Selectcredit1' => 67, 'Selectcredit2' => 68, 'Selectcredit3' => 69, 'Optioninternet' => 70, 'Selectinternet' => 71, 'Txttransfer1' => 72, 'Optiontransfer1' => 73, 'Selecttransfer1' => 74, 'Txttransfer2' => 75, 'Optiontransfer2' => 76, 'Selecttransfer2' => 77, 'Txttransfer3' => 78, 'Optiontransfer3' => 79, 'Selecttransfer3' => 80, 'ImageTransfer' => 81, 'Txtvoucher' => 82, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'rcode' => 1, 'sadate' => 2, 'invCode' => 3, 'mcode' => 4, 'nameF' => 5, 'nameT' => 6, 'total' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'saType' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtmoney' => 18, 'chkcash' => 19, 'chkinternet' => 20, 'chkfuture' => 21, 'chktransfer' => 22, 'chkcredit1' => 23, 'chkcredit2' => 24, 'chkcredit3' => 25, 'chkwithdraw' => 26, 'chktransferIn' => 27, 'chktransferOut' => 28, 'txtcash' => 29, 'txtfuture' => 30, 'txtinternet' => 31, 'txttransfer' => 32, 'txtcredit1' => 33, 'txtcredit2' => 34, 'txtcredit3' => 35, 'txtwithdraw' => 36, 'txttransferIn' => 37, 'txttransferOut' => 38, 'optioncash' => 39, 'optionfuture' => 40, 'optiontransfer' => 41, 'optioncredit1' => 42, 'optioncredit2' => 43, 'optioncredit3' => 44, 'optionwithdraw' => 45, 'optiontransferIn' => 46, 'optiontransferOut' => 47, 'txtoption' => 48, 'ewallet' => 49, 'ewalletBefore' => 50, 'ewalletAfter' => 51, 'ipay' => 52, 'checkportal' => 53, 'bprice' => 54, 'cancelDate' => 55, 'uidCancel' => 56, 'locationbase' => 57, 'chkcommission' => 58, 'txtcommission' => 59, 'optioncommission' => 60, 'mbase' => 61, 'crate' => 62, 'echeck' => 63, 'sanoTemp' => 64, 'selectcash' => 65, 'selecttransfer' => 66, 'selectcredit1' => 67, 'selectcredit2' => 68, 'selectcredit3' => 69, 'optioninternet' => 70, 'selectinternet' => 71, 'txttransfer1' => 72, 'optiontransfer1' => 73, 'selecttransfer1' => 74, 'txttransfer2' => 75, 'optiontransfer2' => 76, 'selecttransfer2' => 77, 'txttransfer3' => 78, 'optiontransfer3' => 79, 'selecttransfer3' => 80, 'imageTransfer' => 81, 'txtvoucher' => 82, ),
        self::TYPE_COLNAME       => array(AliEcomTableMap::COL_SANO => 0, AliEcomTableMap::COL_RCODE => 1, AliEcomTableMap::COL_SADATE => 2, AliEcomTableMap::COL_INV_CODE => 3, AliEcomTableMap::COL_MCODE => 4, AliEcomTableMap::COL_NAME_F => 5, AliEcomTableMap::COL_NAME_T => 6, AliEcomTableMap::COL_TOTAL => 7, AliEcomTableMap::COL_USERCODE => 8, AliEcomTableMap::COL_REMARK => 9, AliEcomTableMap::COL_TRNF => 10, AliEcomTableMap::COL_ID => 11, AliEcomTableMap::COL_SA_TYPE => 12, AliEcomTableMap::COL_UID => 13, AliEcomTableMap::COL_LID => 14, AliEcomTableMap::COL_DL => 15, AliEcomTableMap::COL_CANCEL => 16, AliEcomTableMap::COL_SEND => 17, AliEcomTableMap::COL_TXTMONEY => 18, AliEcomTableMap::COL_CHKCASH => 19, AliEcomTableMap::COL_CHKINTERNET => 20, AliEcomTableMap::COL_CHKFUTURE => 21, AliEcomTableMap::COL_CHKTRANSFER => 22, AliEcomTableMap::COL_CHKCREDIT1 => 23, AliEcomTableMap::COL_CHKCREDIT2 => 24, AliEcomTableMap::COL_CHKCREDIT3 => 25, AliEcomTableMap::COL_CHKWITHDRAW => 26, AliEcomTableMap::COL_CHKTRANSFER_IN => 27, AliEcomTableMap::COL_CHKTRANSFER_OUT => 28, AliEcomTableMap::COL_TXTCASH => 29, AliEcomTableMap::COL_TXTFUTURE => 30, AliEcomTableMap::COL_TXTINTERNET => 31, AliEcomTableMap::COL_TXTTRANSFER => 32, AliEcomTableMap::COL_TXTCREDIT1 => 33, AliEcomTableMap::COL_TXTCREDIT2 => 34, AliEcomTableMap::COL_TXTCREDIT3 => 35, AliEcomTableMap::COL_TXTWITHDRAW => 36, AliEcomTableMap::COL_TXTTRANSFER_IN => 37, AliEcomTableMap::COL_TXTTRANSFER_OUT => 38, AliEcomTableMap::COL_OPTIONCASH => 39, AliEcomTableMap::COL_OPTIONFUTURE => 40, AliEcomTableMap::COL_OPTIONTRANSFER => 41, AliEcomTableMap::COL_OPTIONCREDIT1 => 42, AliEcomTableMap::COL_OPTIONCREDIT2 => 43, AliEcomTableMap::COL_OPTIONCREDIT3 => 44, AliEcomTableMap::COL_OPTIONWITHDRAW => 45, AliEcomTableMap::COL_OPTIONTRANSFER_IN => 46, AliEcomTableMap::COL_OPTIONTRANSFER_OUT => 47, AliEcomTableMap::COL_TXTOPTION => 48, AliEcomTableMap::COL_EWALLET => 49, AliEcomTableMap::COL_EWALLET_BEFORE => 50, AliEcomTableMap::COL_EWALLET_AFTER => 51, AliEcomTableMap::COL_IPAY => 52, AliEcomTableMap::COL_CHECKPORTAL => 53, AliEcomTableMap::COL_BPRICE => 54, AliEcomTableMap::COL_CANCEL_DATE => 55, AliEcomTableMap::COL_UID_CANCEL => 56, AliEcomTableMap::COL_LOCATIONBASE => 57, AliEcomTableMap::COL_CHKCOMMISSION => 58, AliEcomTableMap::COL_TXTCOMMISSION => 59, AliEcomTableMap::COL_OPTIONCOMMISSION => 60, AliEcomTableMap::COL_MBASE => 61, AliEcomTableMap::COL_CRATE => 62, AliEcomTableMap::COL_ECHECK => 63, AliEcomTableMap::COL_SANO_TEMP => 64, AliEcomTableMap::COL_SELECTCASH => 65, AliEcomTableMap::COL_SELECTTRANSFER => 66, AliEcomTableMap::COL_SELECTCREDIT1 => 67, AliEcomTableMap::COL_SELECTCREDIT2 => 68, AliEcomTableMap::COL_SELECTCREDIT3 => 69, AliEcomTableMap::COL_OPTIONINTERNET => 70, AliEcomTableMap::COL_SELECTINTERNET => 71, AliEcomTableMap::COL_TXTTRANSFER1 => 72, AliEcomTableMap::COL_OPTIONTRANSFER1 => 73, AliEcomTableMap::COL_SELECTTRANSFER1 => 74, AliEcomTableMap::COL_TXTTRANSFER2 => 75, AliEcomTableMap::COL_OPTIONTRANSFER2 => 76, AliEcomTableMap::COL_SELECTTRANSFER2 => 77, AliEcomTableMap::COL_TXTTRANSFER3 => 78, AliEcomTableMap::COL_OPTIONTRANSFER3 => 79, AliEcomTableMap::COL_SELECTTRANSFER3 => 80, AliEcomTableMap::COL_IMAGE_TRANSFER => 81, AliEcomTableMap::COL_TXTVOUCHER => 82, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'rcode' => 1, 'sadate' => 2, 'inv_code' => 3, 'mcode' => 4, 'name_f' => 5, 'name_t' => 6, 'total' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'sa_type' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtMoney' => 18, 'chkCash' => 19, 'chkInternet' => 20, 'chkFuture' => 21, 'chkTransfer' => 22, 'chkCredit1' => 23, 'chkCredit2' => 24, 'chkCredit3' => 25, 'chkWithdraw' => 26, 'chkTransfer_in' => 27, 'chkTransfer_out' => 28, 'txtCash' => 29, 'txtFuture' => 30, 'txtInternet' => 31, 'txtTransfer' => 32, 'txtCredit1' => 33, 'txtCredit2' => 34, 'txtCredit3' => 35, 'txtWithdraw' => 36, 'txtTransfer_in' => 37, 'txtTransfer_out' => 38, 'optionCash' => 39, 'optionFuture' => 40, 'optionTransfer' => 41, 'optionCredit1' => 42, 'optionCredit2' => 43, 'optionCredit3' => 44, 'optionWithdraw' => 45, 'optionTransfer_in' => 46, 'optionTransfer_out' => 47, 'txtoption' => 48, 'ewallet' => 49, 'ewallet_before' => 50, 'ewallet_after' => 51, 'ipay' => 52, 'checkportal' => 53, 'bprice' => 54, 'cancel_date' => 55, 'uid_cancel' => 56, 'locationbase' => 57, 'chkCommission' => 58, 'txtCommission' => 59, 'optionCommission' => 60, 'mbase' => 61, 'crate' => 62, 'echeck' => 63, 'sano_temp' => 64, 'selectCash' => 65, 'selectTransfer' => 66, 'selectCredit1' => 67, 'selectCredit2' => 68, 'selectCredit3' => 69, 'optionInternet' => 70, 'selectInternet' => 71, 'txtTransfer1' => 72, 'optionTransfer1' => 73, 'selectTransfer1' => 74, 'txtTransfer2' => 75, 'optionTransfer2' => 76, 'selectTransfer2' => 77, 'txtTransfer3' => 78, 'optionTransfer3' => 79, 'selectTransfer3' => 80, 'image_transfer' => 81, 'txtVoucher' => 82, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, )
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
        $this->setName('ali_ecom');
        $this->setPhpName('AliEcom');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEcom');
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
        $this->addColumn('remark', 'Remark', 'VARCHAR', true, 255, null);
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
        $this->addColumn('chkInternet', 'Chkinternet', 'VARCHAR', true, 100, null);
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
        $this->addColumn('txtInternet', 'Txtinternet', 'DECIMAL', true, 15, null);
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
        $this->addColumn('sano_temp', 'SanoTemp', 'VARCHAR', true, 255, null);
        $this->addColumn('selectCash', 'Selectcash', 'VARCHAR', false, 255, null);
        $this->addColumn('selectTransfer', 'Selecttransfer', 'VARCHAR', false, 255, null);
        $this->addColumn('selectCredit1', 'Selectcredit1', 'VARCHAR', false, 255, null);
        $this->addColumn('selectCredit2', 'Selectcredit2', 'VARCHAR', false, 255, null);
        $this->addColumn('selectCredit3', 'Selectcredit3', 'VARCHAR', false, 255, null);
        $this->addColumn('optionInternet', 'Optioninternet', 'VARCHAR', false, 255, null);
        $this->addColumn('selectInternet', 'Selectinternet', 'VARCHAR', false, 255, null);
        $this->addColumn('txtTransfer1', 'Txttransfer1', 'DECIMAL', false, 15, null);
        $this->addColumn('optionTransfer1', 'Optiontransfer1', 'VARCHAR', false, 255, null);
        $this->addColumn('selectTransfer1', 'Selecttransfer1', 'VARCHAR', false, 255, null);
        $this->addColumn('txtTransfer2', 'Txttransfer2', 'DECIMAL', false, 15, null);
        $this->addColumn('optionTransfer2', 'Optiontransfer2', 'VARCHAR', false, 255, null);
        $this->addColumn('selectTransfer2', 'Selecttransfer2', 'VARCHAR', false, 255, null);
        $this->addColumn('txtTransfer3', 'Txttransfer3', 'DECIMAL', false, 15, null);
        $this->addColumn('optionTransfer3', 'Optiontransfer3', 'VARCHAR', false, 255, null);
        $this->addColumn('selectTransfer3', 'Selecttransfer3', 'VARCHAR', false, 255, null);
        $this->addColumn('image_transfer', 'ImageTransfer', 'LONGVARCHAR', true, null, null);
        $this->addColumn('txtVoucher', 'Txtvoucher', 'DECIMAL', true, 15, null);
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
        return $withPrefix ? AliEcomTableMap::CLASS_DEFAULT : AliEcomTableMap::OM_CLASS;
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
     * @return array           (AliEcom object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEcomTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEcomTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEcomTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEcomTableMap::OM_CLASS;
            /** @var AliEcom $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEcomTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEcomTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEcomTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEcom $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEcomTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEcomTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEcomTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliEcomTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEcomTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliEcomTableMap::COL_ID);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_UID);
            $criteria->addSelectColumn(AliEcomTableMap::COL_LID);
            $criteria->addSelectColumn(AliEcomTableMap::COL_DL);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SEND);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKWITHDRAW);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKTRANSFER_IN);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKTRANSFER_OUT);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTWITHDRAW);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTTRANSFER_IN);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTTRANSFER_OUT);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONWITHDRAW);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONTRANSFER_IN);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONTRANSFER_OUT);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliEcomTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliEcomTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliEcomTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliEcomTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliEcomTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTCOMMISSION);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONCOMMISSION);
            $criteria->addSelectColumn(AliEcomTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliEcomTableMap::COL_ECHECK);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SANO_TEMP);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTCASH);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTTRANSFER);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTCREDIT1);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTCREDIT2);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTCREDIT3);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTINTERNET);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTTRANSFER1);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONTRANSFER1);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTTRANSFER1);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTTRANSFER2);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONTRANSFER2);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTTRANSFER2);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTTRANSFER3);
            $criteria->addSelectColumn(AliEcomTableMap::COL_OPTIONTRANSFER3);
            $criteria->addSelectColumn(AliEcomTableMap::COL_SELECTTRANSFER3);
            $criteria->addSelectColumn(AliEcomTableMap::COL_IMAGE_TRANSFER);
            $criteria->addSelectColumn(AliEcomTableMap::COL_TXTVOUCHER);
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
            $criteria->addSelectColumn($alias . '.chkInternet');
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
            $criteria->addSelectColumn($alias . '.txtInternet');
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
            $criteria->addSelectColumn($alias . '.sano_temp');
            $criteria->addSelectColumn($alias . '.selectCash');
            $criteria->addSelectColumn($alias . '.selectTransfer');
            $criteria->addSelectColumn($alias . '.selectCredit1');
            $criteria->addSelectColumn($alias . '.selectCredit2');
            $criteria->addSelectColumn($alias . '.selectCredit3');
            $criteria->addSelectColumn($alias . '.optionInternet');
            $criteria->addSelectColumn($alias . '.selectInternet');
            $criteria->addSelectColumn($alias . '.txtTransfer1');
            $criteria->addSelectColumn($alias . '.optionTransfer1');
            $criteria->addSelectColumn($alias . '.selectTransfer1');
            $criteria->addSelectColumn($alias . '.txtTransfer2');
            $criteria->addSelectColumn($alias . '.optionTransfer2');
            $criteria->addSelectColumn($alias . '.selectTransfer2');
            $criteria->addSelectColumn($alias . '.txtTransfer3');
            $criteria->addSelectColumn($alias . '.optionTransfer3');
            $criteria->addSelectColumn($alias . '.selectTransfer3');
            $criteria->addSelectColumn($alias . '.image_transfer');
            $criteria->addSelectColumn($alias . '.txtVoucher');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEcomTableMap::DATABASE_NAME)->getTable(AliEcomTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEcomTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEcomTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEcomTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEcom or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEcom object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcomTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEcom) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEcomTableMap::DATABASE_NAME);
            $criteria->add(AliEcomTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEcomQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEcomTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEcomTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ecom table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEcomQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEcom or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEcom object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcomTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEcom object
        }

        if ($criteria->containsKey(AliEcomTableMap::COL_ID) && $criteria->keyContainsValue(AliEcomTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEcomTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEcomQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEcomTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEcomTableMap::buildTableMap();
