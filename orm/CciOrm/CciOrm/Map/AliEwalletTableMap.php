<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEwallet;
use CciOrm\CciOrm\AliEwalletQuery;
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
 * This class defines the structure of the 'ali_ewallet' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEwalletTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEwalletTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ewallet';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEwallet';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEwallet';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 86;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 86;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_ewallet.sano';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_ewallet.rcode';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_ewallet.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_ewallet.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ewallet.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_ewallet.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_ewallet.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ewallet.total';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_ewallet.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_ewallet.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_ewallet.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_ewallet.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_ewallet.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_ewallet.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_ewallet.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_ewallet.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_ewallet.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_ewallet.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_ewallet.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_ewallet.chkCash';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_ewallet.chkInternet';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_ewallet.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_ewallet.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_ewallet.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_ewallet.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_ewallet.chkCredit3';

    /**
     * the column name for the chkWithdraw field
     */
    const COL_CHKWITHDRAW = 'ali_ewallet.chkWithdraw';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_ewallet.txtDiscount';

    /**
     * the column name for the chkTransfer_in field
     */
    const COL_CHKTRANSFER_IN = 'ali_ewallet.chkTransfer_in';

    /**
     * the column name for the chkTransfer_out field
     */
    const COL_CHKTRANSFER_OUT = 'ali_ewallet.chkTransfer_out';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_ewallet.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_ewallet.txtFuture';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_ewallet.txtInternet';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_ewallet.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_ewallet.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_ewallet.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_ewallet.txtCredit3';

    /**
     * the column name for the txtWithdraw field
     */
    const COL_TXTWITHDRAW = 'ali_ewallet.txtWithdraw';

    /**
     * the column name for the txtTransfer_in field
     */
    const COL_TXTTRANSFER_IN = 'ali_ewallet.txtTransfer_in';

    /**
     * the column name for the txtTransfer_out field
     */
    const COL_TXTTRANSFER_OUT = 'ali_ewallet.txtTransfer_out';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_ewallet.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_ewallet.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_ewallet.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_ewallet.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_ewallet.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_ewallet.optionCredit3';

    /**
     * the column name for the optionWithdraw field
     */
    const COL_OPTIONWITHDRAW = 'ali_ewallet.optionWithdraw';

    /**
     * the column name for the optionTransfer_in field
     */
    const COL_OPTIONTRANSFER_IN = 'ali_ewallet.optionTransfer_in';

    /**
     * the column name for the optionTransfer_out field
     */
    const COL_OPTIONTRANSFER_OUT = 'ali_ewallet.optionTransfer_out';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_ewallet.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_ewallet.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_ewallet.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_ewallet.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_ewallet.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_ewallet.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_ewallet.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_ewallet.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_ewallet.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_ewallet.locationbase';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_ewallet.chkCommission';

    /**
     * the column name for the txtCommission field
     */
    const COL_TXTCOMMISSION = 'ali_ewallet.txtCommission';

    /**
     * the column name for the optionCommission field
     */
    const COL_OPTIONCOMMISSION = 'ali_ewallet.optionCommission';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_ewallet.mbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_ewallet.crate';

    /**
     * the column name for the echeck field
     */
    const COL_ECHECK = 'ali_ewallet.echeck';

    /**
     * the column name for the sano_temp field
     */
    const COL_SANO_TEMP = 'ali_ewallet.sano_temp';

    /**
     * the column name for the selectCash field
     */
    const COL_SELECTCASH = 'ali_ewallet.selectCash';

    /**
     * the column name for the selectTransfer field
     */
    const COL_SELECTTRANSFER = 'ali_ewallet.selectTransfer';

    /**
     * the column name for the selectCredit1 field
     */
    const COL_SELECTCREDIT1 = 'ali_ewallet.selectCredit1';

    /**
     * the column name for the selectCredit2 field
     */
    const COL_SELECTCREDIT2 = 'ali_ewallet.selectCredit2';

    /**
     * the column name for the selectCredit3 field
     */
    const COL_SELECTCREDIT3 = 'ali_ewallet.selectCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_ewallet.optionInternet';

    /**
     * the column name for the selectInternet field
     */
    const COL_SELECTINTERNET = 'ali_ewallet.selectInternet';

    /**
     * the column name for the txtTransfer1 field
     */
    const COL_TXTTRANSFER1 = 'ali_ewallet.txtTransfer1';

    /**
     * the column name for the optionTransfer1 field
     */
    const COL_OPTIONTRANSFER1 = 'ali_ewallet.optionTransfer1';

    /**
     * the column name for the selectTransfer1 field
     */
    const COL_SELECTTRANSFER1 = 'ali_ewallet.selectTransfer1';

    /**
     * the column name for the txtTransfer2 field
     */
    const COL_TXTTRANSFER2 = 'ali_ewallet.txtTransfer2';

    /**
     * the column name for the optionTransfer2 field
     */
    const COL_OPTIONTRANSFER2 = 'ali_ewallet.optionTransfer2';

    /**
     * the column name for the selectTransfer2 field
     */
    const COL_SELECTTRANSFER2 = 'ali_ewallet.selectTransfer2';

    /**
     * the column name for the txtTransfer3 field
     */
    const COL_TXTTRANSFER3 = 'ali_ewallet.txtTransfer3';

    /**
     * the column name for the optionTransfer3 field
     */
    const COL_OPTIONTRANSFER3 = 'ali_ewallet.optionTransfer3';

    /**
     * the column name for the selectTransfer3 field
     */
    const COL_SELECTTRANSFER3 = 'ali_ewallet.selectTransfer3';

    /**
     * the column name for the image_transfer field
     */
    const COL_IMAGE_TRANSFER = 'ali_ewallet.image_transfer';

    /**
     * the column name for the txtVoucher field
     */
    const COL_TXTVOUCHER = 'ali_ewallet.txtVoucher';

    /**
     * the column name for the id_ecom field
     */
    const COL_ID_ECOM = 'ali_ewallet.id_ecom';

    /**
     * the column name for the cals field
     */
    const COL_CALS = 'ali_ewallet.cals';

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
        self::TYPE_PHPNAME       => array('Sano', 'Rcode', 'Sadate', 'InvCode', 'Mcode', 'NameF', 'NameT', 'Total', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkinternet', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkwithdraw', 'Txtdiscount', 'ChktransferIn', 'ChktransferOut', 'Txtcash', 'Txtfuture', 'Txtinternet', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtwithdraw', 'TxttransferIn', 'TxttransferOut', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optionwithdraw', 'OptiontransferIn', 'OptiontransferOut', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Chkcommission', 'Txtcommission', 'Optioncommission', 'Mbase', 'Crate', 'Echeck', 'SanoTemp', 'Selectcash', 'Selecttransfer', 'Selectcredit1', 'Selectcredit2', 'Selectcredit3', 'Optioninternet', 'Selectinternet', 'Txttransfer1', 'Optiontransfer1', 'Selecttransfer1', 'Txttransfer2', 'Optiontransfer2', 'Selecttransfer2', 'Txttransfer3', 'Optiontransfer3', 'Selecttransfer3', 'ImageTransfer', 'Txtvoucher', 'IdEcom', 'Cals', ),
        self::TYPE_CAMELNAME     => array('sano', 'rcode', 'sadate', 'invCode', 'mcode', 'nameF', 'nameT', 'total', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkinternet', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkwithdraw', 'txtdiscount', 'chktransferIn', 'chktransferOut', 'txtcash', 'txtfuture', 'txtinternet', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtwithdraw', 'txttransferIn', 'txttransferOut', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optionwithdraw', 'optiontransferIn', 'optiontransferOut', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'chkcommission', 'txtcommission', 'optioncommission', 'mbase', 'crate', 'echeck', 'sanoTemp', 'selectcash', 'selecttransfer', 'selectcredit1', 'selectcredit2', 'selectcredit3', 'optioninternet', 'selectinternet', 'txttransfer1', 'optiontransfer1', 'selecttransfer1', 'txttransfer2', 'optiontransfer2', 'selecttransfer2', 'txttransfer3', 'optiontransfer3', 'selecttransfer3', 'imageTransfer', 'txtvoucher', 'idEcom', 'cals', ),
        self::TYPE_COLNAME       => array(AliEwalletTableMap::COL_SANO, AliEwalletTableMap::COL_RCODE, AliEwalletTableMap::COL_SADATE, AliEwalletTableMap::COL_INV_CODE, AliEwalletTableMap::COL_MCODE, AliEwalletTableMap::COL_NAME_F, AliEwalletTableMap::COL_NAME_T, AliEwalletTableMap::COL_TOTAL, AliEwalletTableMap::COL_USERCODE, AliEwalletTableMap::COL_REMARK, AliEwalletTableMap::COL_TRNF, AliEwalletTableMap::COL_ID, AliEwalletTableMap::COL_SA_TYPE, AliEwalletTableMap::COL_UID, AliEwalletTableMap::COL_LID, AliEwalletTableMap::COL_DL, AliEwalletTableMap::COL_CANCEL, AliEwalletTableMap::COL_SEND, AliEwalletTableMap::COL_TXTMONEY, AliEwalletTableMap::COL_CHKCASH, AliEwalletTableMap::COL_CHKINTERNET, AliEwalletTableMap::COL_CHKFUTURE, AliEwalletTableMap::COL_CHKTRANSFER, AliEwalletTableMap::COL_CHKCREDIT1, AliEwalletTableMap::COL_CHKCREDIT2, AliEwalletTableMap::COL_CHKCREDIT3, AliEwalletTableMap::COL_CHKWITHDRAW, AliEwalletTableMap::COL_TXTDISCOUNT, AliEwalletTableMap::COL_CHKTRANSFER_IN, AliEwalletTableMap::COL_CHKTRANSFER_OUT, AliEwalletTableMap::COL_TXTCASH, AliEwalletTableMap::COL_TXTFUTURE, AliEwalletTableMap::COL_TXTINTERNET, AliEwalletTableMap::COL_TXTTRANSFER, AliEwalletTableMap::COL_TXTCREDIT1, AliEwalletTableMap::COL_TXTCREDIT2, AliEwalletTableMap::COL_TXTCREDIT3, AliEwalletTableMap::COL_TXTWITHDRAW, AliEwalletTableMap::COL_TXTTRANSFER_IN, AliEwalletTableMap::COL_TXTTRANSFER_OUT, AliEwalletTableMap::COL_OPTIONCASH, AliEwalletTableMap::COL_OPTIONFUTURE, AliEwalletTableMap::COL_OPTIONTRANSFER, AliEwalletTableMap::COL_OPTIONCREDIT1, AliEwalletTableMap::COL_OPTIONCREDIT2, AliEwalletTableMap::COL_OPTIONCREDIT3, AliEwalletTableMap::COL_OPTIONWITHDRAW, AliEwalletTableMap::COL_OPTIONTRANSFER_IN, AliEwalletTableMap::COL_OPTIONTRANSFER_OUT, AliEwalletTableMap::COL_TXTOPTION, AliEwalletTableMap::COL_EWALLET, AliEwalletTableMap::COL_EWALLET_BEFORE, AliEwalletTableMap::COL_EWALLET_AFTER, AliEwalletTableMap::COL_IPAY, AliEwalletTableMap::COL_CHECKPORTAL, AliEwalletTableMap::COL_BPRICE, AliEwalletTableMap::COL_CANCEL_DATE, AliEwalletTableMap::COL_UID_CANCEL, AliEwalletTableMap::COL_LOCATIONBASE, AliEwalletTableMap::COL_CHKCOMMISSION, AliEwalletTableMap::COL_TXTCOMMISSION, AliEwalletTableMap::COL_OPTIONCOMMISSION, AliEwalletTableMap::COL_MBASE, AliEwalletTableMap::COL_CRATE, AliEwalletTableMap::COL_ECHECK, AliEwalletTableMap::COL_SANO_TEMP, AliEwalletTableMap::COL_SELECTCASH, AliEwalletTableMap::COL_SELECTTRANSFER, AliEwalletTableMap::COL_SELECTCREDIT1, AliEwalletTableMap::COL_SELECTCREDIT2, AliEwalletTableMap::COL_SELECTCREDIT3, AliEwalletTableMap::COL_OPTIONINTERNET, AliEwalletTableMap::COL_SELECTINTERNET, AliEwalletTableMap::COL_TXTTRANSFER1, AliEwalletTableMap::COL_OPTIONTRANSFER1, AliEwalletTableMap::COL_SELECTTRANSFER1, AliEwalletTableMap::COL_TXTTRANSFER2, AliEwalletTableMap::COL_OPTIONTRANSFER2, AliEwalletTableMap::COL_SELECTTRANSFER2, AliEwalletTableMap::COL_TXTTRANSFER3, AliEwalletTableMap::COL_OPTIONTRANSFER3, AliEwalletTableMap::COL_SELECTTRANSFER3, AliEwalletTableMap::COL_IMAGE_TRANSFER, AliEwalletTableMap::COL_TXTVOUCHER, AliEwalletTableMap::COL_ID_ECOM, AliEwalletTableMap::COL_CALS, ),
        self::TYPE_FIELDNAME     => array('sano', 'rcode', 'sadate', 'inv_code', 'mcode', 'name_f', 'name_t', 'total', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkInternet', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkWithdraw', 'txtDiscount', 'chkTransfer_in', 'chkTransfer_out', 'txtCash', 'txtFuture', 'txtInternet', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtWithdraw', 'txtTransfer_in', 'txtTransfer_out', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionWithdraw', 'optionTransfer_in', 'optionTransfer_out', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'chkCommission', 'txtCommission', 'optionCommission', 'mbase', 'crate', 'echeck', 'sano_temp', 'selectCash', 'selectTransfer', 'selectCredit1', 'selectCredit2', 'selectCredit3', 'optionInternet', 'selectInternet', 'txtTransfer1', 'optionTransfer1', 'selectTransfer1', 'txtTransfer2', 'optionTransfer2', 'selectTransfer2', 'txtTransfer3', 'optionTransfer3', 'selectTransfer3', 'image_transfer', 'txtVoucher', 'id_ecom', 'cals', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Rcode' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Mcode' => 4, 'NameF' => 5, 'NameT' => 6, 'Total' => 7, 'Usercode' => 8, 'Remark' => 9, 'Trnf' => 10, 'Id' => 11, 'SaType' => 12, 'Uid' => 13, 'Lid' => 14, 'Dl' => 15, 'Cancel' => 16, 'Send' => 17, 'Txtmoney' => 18, 'Chkcash' => 19, 'Chkinternet' => 20, 'Chkfuture' => 21, 'Chktransfer' => 22, 'Chkcredit1' => 23, 'Chkcredit2' => 24, 'Chkcredit3' => 25, 'Chkwithdraw' => 26, 'Txtdiscount' => 27, 'ChktransferIn' => 28, 'ChktransferOut' => 29, 'Txtcash' => 30, 'Txtfuture' => 31, 'Txtinternet' => 32, 'Txttransfer' => 33, 'Txtcredit1' => 34, 'Txtcredit2' => 35, 'Txtcredit3' => 36, 'Txtwithdraw' => 37, 'TxttransferIn' => 38, 'TxttransferOut' => 39, 'Optioncash' => 40, 'Optionfuture' => 41, 'Optiontransfer' => 42, 'Optioncredit1' => 43, 'Optioncredit2' => 44, 'Optioncredit3' => 45, 'Optionwithdraw' => 46, 'OptiontransferIn' => 47, 'OptiontransferOut' => 48, 'Txtoption' => 49, 'Ewallet' => 50, 'EwalletBefore' => 51, 'EwalletAfter' => 52, 'Ipay' => 53, 'Checkportal' => 54, 'Bprice' => 55, 'CancelDate' => 56, 'UidCancel' => 57, 'Locationbase' => 58, 'Chkcommission' => 59, 'Txtcommission' => 60, 'Optioncommission' => 61, 'Mbase' => 62, 'Crate' => 63, 'Echeck' => 64, 'SanoTemp' => 65, 'Selectcash' => 66, 'Selecttransfer' => 67, 'Selectcredit1' => 68, 'Selectcredit2' => 69, 'Selectcredit3' => 70, 'Optioninternet' => 71, 'Selectinternet' => 72, 'Txttransfer1' => 73, 'Optiontransfer1' => 74, 'Selecttransfer1' => 75, 'Txttransfer2' => 76, 'Optiontransfer2' => 77, 'Selecttransfer2' => 78, 'Txttransfer3' => 79, 'Optiontransfer3' => 80, 'Selecttransfer3' => 81, 'ImageTransfer' => 82, 'Txtvoucher' => 83, 'IdEcom' => 84, 'Cals' => 85, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'rcode' => 1, 'sadate' => 2, 'invCode' => 3, 'mcode' => 4, 'nameF' => 5, 'nameT' => 6, 'total' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'saType' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtmoney' => 18, 'chkcash' => 19, 'chkinternet' => 20, 'chkfuture' => 21, 'chktransfer' => 22, 'chkcredit1' => 23, 'chkcredit2' => 24, 'chkcredit3' => 25, 'chkwithdraw' => 26, 'txtdiscount' => 27, 'chktransferIn' => 28, 'chktransferOut' => 29, 'txtcash' => 30, 'txtfuture' => 31, 'txtinternet' => 32, 'txttransfer' => 33, 'txtcredit1' => 34, 'txtcredit2' => 35, 'txtcredit3' => 36, 'txtwithdraw' => 37, 'txttransferIn' => 38, 'txttransferOut' => 39, 'optioncash' => 40, 'optionfuture' => 41, 'optiontransfer' => 42, 'optioncredit1' => 43, 'optioncredit2' => 44, 'optioncredit3' => 45, 'optionwithdraw' => 46, 'optiontransferIn' => 47, 'optiontransferOut' => 48, 'txtoption' => 49, 'ewallet' => 50, 'ewalletBefore' => 51, 'ewalletAfter' => 52, 'ipay' => 53, 'checkportal' => 54, 'bprice' => 55, 'cancelDate' => 56, 'uidCancel' => 57, 'locationbase' => 58, 'chkcommission' => 59, 'txtcommission' => 60, 'optioncommission' => 61, 'mbase' => 62, 'crate' => 63, 'echeck' => 64, 'sanoTemp' => 65, 'selectcash' => 66, 'selecttransfer' => 67, 'selectcredit1' => 68, 'selectcredit2' => 69, 'selectcredit3' => 70, 'optioninternet' => 71, 'selectinternet' => 72, 'txttransfer1' => 73, 'optiontransfer1' => 74, 'selecttransfer1' => 75, 'txttransfer2' => 76, 'optiontransfer2' => 77, 'selecttransfer2' => 78, 'txttransfer3' => 79, 'optiontransfer3' => 80, 'selecttransfer3' => 81, 'imageTransfer' => 82, 'txtvoucher' => 83, 'idEcom' => 84, 'cals' => 85, ),
        self::TYPE_COLNAME       => array(AliEwalletTableMap::COL_SANO => 0, AliEwalletTableMap::COL_RCODE => 1, AliEwalletTableMap::COL_SADATE => 2, AliEwalletTableMap::COL_INV_CODE => 3, AliEwalletTableMap::COL_MCODE => 4, AliEwalletTableMap::COL_NAME_F => 5, AliEwalletTableMap::COL_NAME_T => 6, AliEwalletTableMap::COL_TOTAL => 7, AliEwalletTableMap::COL_USERCODE => 8, AliEwalletTableMap::COL_REMARK => 9, AliEwalletTableMap::COL_TRNF => 10, AliEwalletTableMap::COL_ID => 11, AliEwalletTableMap::COL_SA_TYPE => 12, AliEwalletTableMap::COL_UID => 13, AliEwalletTableMap::COL_LID => 14, AliEwalletTableMap::COL_DL => 15, AliEwalletTableMap::COL_CANCEL => 16, AliEwalletTableMap::COL_SEND => 17, AliEwalletTableMap::COL_TXTMONEY => 18, AliEwalletTableMap::COL_CHKCASH => 19, AliEwalletTableMap::COL_CHKINTERNET => 20, AliEwalletTableMap::COL_CHKFUTURE => 21, AliEwalletTableMap::COL_CHKTRANSFER => 22, AliEwalletTableMap::COL_CHKCREDIT1 => 23, AliEwalletTableMap::COL_CHKCREDIT2 => 24, AliEwalletTableMap::COL_CHKCREDIT3 => 25, AliEwalletTableMap::COL_CHKWITHDRAW => 26, AliEwalletTableMap::COL_TXTDISCOUNT => 27, AliEwalletTableMap::COL_CHKTRANSFER_IN => 28, AliEwalletTableMap::COL_CHKTRANSFER_OUT => 29, AliEwalletTableMap::COL_TXTCASH => 30, AliEwalletTableMap::COL_TXTFUTURE => 31, AliEwalletTableMap::COL_TXTINTERNET => 32, AliEwalletTableMap::COL_TXTTRANSFER => 33, AliEwalletTableMap::COL_TXTCREDIT1 => 34, AliEwalletTableMap::COL_TXTCREDIT2 => 35, AliEwalletTableMap::COL_TXTCREDIT3 => 36, AliEwalletTableMap::COL_TXTWITHDRAW => 37, AliEwalletTableMap::COL_TXTTRANSFER_IN => 38, AliEwalletTableMap::COL_TXTTRANSFER_OUT => 39, AliEwalletTableMap::COL_OPTIONCASH => 40, AliEwalletTableMap::COL_OPTIONFUTURE => 41, AliEwalletTableMap::COL_OPTIONTRANSFER => 42, AliEwalletTableMap::COL_OPTIONCREDIT1 => 43, AliEwalletTableMap::COL_OPTIONCREDIT2 => 44, AliEwalletTableMap::COL_OPTIONCREDIT3 => 45, AliEwalletTableMap::COL_OPTIONWITHDRAW => 46, AliEwalletTableMap::COL_OPTIONTRANSFER_IN => 47, AliEwalletTableMap::COL_OPTIONTRANSFER_OUT => 48, AliEwalletTableMap::COL_TXTOPTION => 49, AliEwalletTableMap::COL_EWALLET => 50, AliEwalletTableMap::COL_EWALLET_BEFORE => 51, AliEwalletTableMap::COL_EWALLET_AFTER => 52, AliEwalletTableMap::COL_IPAY => 53, AliEwalletTableMap::COL_CHECKPORTAL => 54, AliEwalletTableMap::COL_BPRICE => 55, AliEwalletTableMap::COL_CANCEL_DATE => 56, AliEwalletTableMap::COL_UID_CANCEL => 57, AliEwalletTableMap::COL_LOCATIONBASE => 58, AliEwalletTableMap::COL_CHKCOMMISSION => 59, AliEwalletTableMap::COL_TXTCOMMISSION => 60, AliEwalletTableMap::COL_OPTIONCOMMISSION => 61, AliEwalletTableMap::COL_MBASE => 62, AliEwalletTableMap::COL_CRATE => 63, AliEwalletTableMap::COL_ECHECK => 64, AliEwalletTableMap::COL_SANO_TEMP => 65, AliEwalletTableMap::COL_SELECTCASH => 66, AliEwalletTableMap::COL_SELECTTRANSFER => 67, AliEwalletTableMap::COL_SELECTCREDIT1 => 68, AliEwalletTableMap::COL_SELECTCREDIT2 => 69, AliEwalletTableMap::COL_SELECTCREDIT3 => 70, AliEwalletTableMap::COL_OPTIONINTERNET => 71, AliEwalletTableMap::COL_SELECTINTERNET => 72, AliEwalletTableMap::COL_TXTTRANSFER1 => 73, AliEwalletTableMap::COL_OPTIONTRANSFER1 => 74, AliEwalletTableMap::COL_SELECTTRANSFER1 => 75, AliEwalletTableMap::COL_TXTTRANSFER2 => 76, AliEwalletTableMap::COL_OPTIONTRANSFER2 => 77, AliEwalletTableMap::COL_SELECTTRANSFER2 => 78, AliEwalletTableMap::COL_TXTTRANSFER3 => 79, AliEwalletTableMap::COL_OPTIONTRANSFER3 => 80, AliEwalletTableMap::COL_SELECTTRANSFER3 => 81, AliEwalletTableMap::COL_IMAGE_TRANSFER => 82, AliEwalletTableMap::COL_TXTVOUCHER => 83, AliEwalletTableMap::COL_ID_ECOM => 84, AliEwalletTableMap::COL_CALS => 85, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'rcode' => 1, 'sadate' => 2, 'inv_code' => 3, 'mcode' => 4, 'name_f' => 5, 'name_t' => 6, 'total' => 7, 'usercode' => 8, 'remark' => 9, 'trnf' => 10, 'id' => 11, 'sa_type' => 12, 'uid' => 13, 'lid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtMoney' => 18, 'chkCash' => 19, 'chkInternet' => 20, 'chkFuture' => 21, 'chkTransfer' => 22, 'chkCredit1' => 23, 'chkCredit2' => 24, 'chkCredit3' => 25, 'chkWithdraw' => 26, 'txtDiscount' => 27, 'chkTransfer_in' => 28, 'chkTransfer_out' => 29, 'txtCash' => 30, 'txtFuture' => 31, 'txtInternet' => 32, 'txtTransfer' => 33, 'txtCredit1' => 34, 'txtCredit2' => 35, 'txtCredit3' => 36, 'txtWithdraw' => 37, 'txtTransfer_in' => 38, 'txtTransfer_out' => 39, 'optionCash' => 40, 'optionFuture' => 41, 'optionTransfer' => 42, 'optionCredit1' => 43, 'optionCredit2' => 44, 'optionCredit3' => 45, 'optionWithdraw' => 46, 'optionTransfer_in' => 47, 'optionTransfer_out' => 48, 'txtoption' => 49, 'ewallet' => 50, 'ewallet_before' => 51, 'ewallet_after' => 52, 'ipay' => 53, 'checkportal' => 54, 'bprice' => 55, 'cancel_date' => 56, 'uid_cancel' => 57, 'locationbase' => 58, 'chkCommission' => 59, 'txtCommission' => 60, 'optionCommission' => 61, 'mbase' => 62, 'crate' => 63, 'echeck' => 64, 'sano_temp' => 65, 'selectCash' => 66, 'selectTransfer' => 67, 'selectCredit1' => 68, 'selectCredit2' => 69, 'selectCredit3' => 70, 'optionInternet' => 71, 'selectInternet' => 72, 'txtTransfer1' => 73, 'optionTransfer1' => 74, 'selectTransfer1' => 75, 'txtTransfer2' => 76, 'optionTransfer2' => 77, 'selectTransfer2' => 78, 'txtTransfer3' => 79, 'optionTransfer3' => 80, 'selectTransfer3' => 81, 'image_transfer' => 82, 'txtVoucher' => 83, 'id_ecom' => 84, 'cals' => 85, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, )
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
        $this->setName('ali_ewallet');
        $this->setPhpName('AliEwallet');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEwallet');
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
        $this->addColumn('txtDiscount', 'Txtdiscount', 'DECIMAL', true, 15, null);
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
        $this->addColumn('id_ecom', 'IdEcom', 'VARCHAR', true, 255, null);
        $this->addColumn('cals', 'Cals', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliEwalletTableMap::CLASS_DEFAULT : AliEwalletTableMap::OM_CLASS;
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
     * @return array           (AliEwallet object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEwalletTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEwalletTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEwalletTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEwalletTableMap::OM_CLASS;
            /** @var AliEwallet $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEwalletTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEwalletTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEwalletTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEwallet $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEwalletTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_ID);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_UID);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_LID);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_DL);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SEND);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKWITHDRAW);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKTRANSFER_IN);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKTRANSFER_OUT);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTWITHDRAW);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTTRANSFER_IN);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTTRANSFER_OUT);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONWITHDRAW);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONTRANSFER_IN);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONTRANSFER_OUT);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTCOMMISSION);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONCOMMISSION);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_ECHECK);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SANO_TEMP);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTCASH);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTTRANSFER);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTCREDIT1);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTCREDIT2);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTCREDIT3);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTINTERNET);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTTRANSFER1);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONTRANSFER1);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTTRANSFER1);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTTRANSFER2);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONTRANSFER2);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTTRANSFER2);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTTRANSFER3);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_OPTIONTRANSFER3);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_SELECTTRANSFER3);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_IMAGE_TRANSFER);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_TXTVOUCHER);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_ID_ECOM);
            $criteria->addSelectColumn(AliEwalletTableMap::COL_CALS);
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
            $criteria->addSelectColumn($alias . '.txtDiscount');
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
            $criteria->addSelectColumn($alias . '.id_ecom');
            $criteria->addSelectColumn($alias . '.cals');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEwalletTableMap::DATABASE_NAME)->getTable(AliEwalletTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEwalletTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEwalletTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEwalletTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEwallet or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEwallet object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEwallet) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEwalletTableMap::DATABASE_NAME);
            $criteria->add(AliEwalletTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEwalletQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEwalletTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEwalletTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ewallet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEwalletQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEwallet or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEwallet object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEwalletTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEwallet object
        }

        if ($criteria->containsKey(AliEwalletTableMap::COL_ID) && $criteria->keyContainsValue(AliEwalletTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEwalletTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEwalletQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEwalletTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEwalletTableMap::buildTableMap();
