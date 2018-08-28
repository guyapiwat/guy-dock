<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEsaleh;
use CciOrm\CciOrm\AliEsalehQuery;
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
 * This class defines the structure of the 'ali_esaleh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEsalehTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEsalehTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_esaleh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEsaleh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEsaleh';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 57;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 57;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_esaleh.sano';

    /**
     * the column name for the sano1 field
     */
    const COL_SANO1 = 'ali_esaleh.sano1';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_esaleh.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_esaleh.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_esaleh.inv_ref';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_esaleh.mcode';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_esaleh.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_esaleh.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_esaleh.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_esaleh.tot_fv';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_esaleh.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_esaleh.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_esaleh.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_esaleh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_esaleh.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_esaleh.uid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_esaleh.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_esaleh.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_esaleh.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_esaleh.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_esaleh.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_esaleh.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_esaleh.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_esaleh.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_esaleh.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_esaleh.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_esaleh.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_esaleh.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_esaleh.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_esaleh.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_esaleh.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_esaleh.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_esaleh.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_esaleh.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_esaleh.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_esaleh.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_esaleh.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_esaleh.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_esaleh.txtOther';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_esaleh.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_esaleh.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_esaleh.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_esaleh.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_esaleh.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_esaleh.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_esaleh.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_esaleh.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_esaleh.optionOther';

    /**
     * the column name for the asend field
     */
    const COL_ASEND = 'ali_esaleh.asend';

    /**
     * the column name for the asend_date field
     */
    const COL_ASEND_DATE = 'ali_esaleh.asend_date';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_esaleh.discount';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_esaleh.status';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_esaleh.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_esaleh.ewallet_after';

    /**
     * the column name for the ewallett_before field
     */
    const COL_EWALLETT_BEFORE = 'ali_esaleh.ewallett_before';

    /**
     * the column name for the ewallett_after field
     */
    const COL_EWALLETT_AFTER = 'ali_esaleh.ewallett_after';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_esaleh.print';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sano1', 'Sadate', 'InvCode', 'InvRef', 'Mcode', 'Total', 'TotPv', 'TotBv', 'TotFv', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Dl', 'Cancel', 'Send', 'Txtoption', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkinternet', 'Chkdiscount', 'Chkother', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Ewallet', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtinternet', 'Txtdiscount', 'Txtother', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioninternet', 'Optiondiscount', 'Optionother', 'Asend', 'AsendDate', 'Discount', 'Status', 'EwalletBefore', 'EwalletAfter', 'EwallettBefore', 'EwallettAfter', 'Print', ),
        self::TYPE_CAMELNAME     => array('sano', 'sano1', 'sadate', 'invCode', 'invRef', 'mcode', 'total', 'totPv', 'totBv', 'totFv', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'dl', 'cancel', 'send', 'txtoption', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkinternet', 'chkdiscount', 'chkother', 'txtcash', 'txtfuture', 'txttransfer', 'ewallet', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtinternet', 'txtdiscount', 'txtother', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioninternet', 'optiondiscount', 'optionother', 'asend', 'asendDate', 'discount', 'status', 'ewalletBefore', 'ewalletAfter', 'ewallettBefore', 'ewallettAfter', 'print', ),
        self::TYPE_COLNAME       => array(AliEsalehTableMap::COL_SANO, AliEsalehTableMap::COL_SANO1, AliEsalehTableMap::COL_SADATE, AliEsalehTableMap::COL_INV_CODE, AliEsalehTableMap::COL_INV_REF, AliEsalehTableMap::COL_MCODE, AliEsalehTableMap::COL_TOTAL, AliEsalehTableMap::COL_TOT_PV, AliEsalehTableMap::COL_TOT_BV, AliEsalehTableMap::COL_TOT_FV, AliEsalehTableMap::COL_USERCODE, AliEsalehTableMap::COL_REMARK, AliEsalehTableMap::COL_TRNF, AliEsalehTableMap::COL_ID, AliEsalehTableMap::COL_SA_TYPE, AliEsalehTableMap::COL_UID, AliEsalehTableMap::COL_DL, AliEsalehTableMap::COL_CANCEL, AliEsalehTableMap::COL_SEND, AliEsalehTableMap::COL_TXTOPTION, AliEsalehTableMap::COL_CHKCASH, AliEsalehTableMap::COL_CHKFUTURE, AliEsalehTableMap::COL_CHKTRANSFER, AliEsalehTableMap::COL_CHKCREDIT1, AliEsalehTableMap::COL_CHKCREDIT2, AliEsalehTableMap::COL_CHKCREDIT3, AliEsalehTableMap::COL_CHKINTERNET, AliEsalehTableMap::COL_CHKDISCOUNT, AliEsalehTableMap::COL_CHKOTHER, AliEsalehTableMap::COL_TXTCASH, AliEsalehTableMap::COL_TXTFUTURE, AliEsalehTableMap::COL_TXTTRANSFER, AliEsalehTableMap::COL_EWALLET, AliEsalehTableMap::COL_TXTCREDIT1, AliEsalehTableMap::COL_TXTCREDIT2, AliEsalehTableMap::COL_TXTCREDIT3, AliEsalehTableMap::COL_TXTINTERNET, AliEsalehTableMap::COL_TXTDISCOUNT, AliEsalehTableMap::COL_TXTOTHER, AliEsalehTableMap::COL_OPTIONCASH, AliEsalehTableMap::COL_OPTIONFUTURE, AliEsalehTableMap::COL_OPTIONTRANSFER, AliEsalehTableMap::COL_OPTIONCREDIT1, AliEsalehTableMap::COL_OPTIONCREDIT2, AliEsalehTableMap::COL_OPTIONCREDIT3, AliEsalehTableMap::COL_OPTIONINTERNET, AliEsalehTableMap::COL_OPTIONDISCOUNT, AliEsalehTableMap::COL_OPTIONOTHER, AliEsalehTableMap::COL_ASEND, AliEsalehTableMap::COL_ASEND_DATE, AliEsalehTableMap::COL_DISCOUNT, AliEsalehTableMap::COL_STATUS, AliEsalehTableMap::COL_EWALLET_BEFORE, AliEsalehTableMap::COL_EWALLET_AFTER, AliEsalehTableMap::COL_EWALLETT_BEFORE, AliEsalehTableMap::COL_EWALLETT_AFTER, AliEsalehTableMap::COL_PRINT, ),
        self::TYPE_FIELDNAME     => array('sano', 'sano1', 'sadate', 'inv_code', 'inv_ref', 'mcode', 'total', 'tot_pv', 'tot_bv', 'tot_fv', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'dl', 'cancel', 'send', 'txtoption', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkInternet', 'chkDiscount', 'chkOther', 'txtCash', 'txtFuture', 'txtTransfer', 'ewallet', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtInternet', 'txtDiscount', 'txtOther', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionInternet', 'optionDiscount', 'optionOther', 'asend', 'asend_date', 'discount', 'status', 'ewallet_before', 'ewallet_after', 'ewallett_before', 'ewallett_after', 'print', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sano1' => 1, 'Sadate' => 2, 'InvCode' => 3, 'InvRef' => 4, 'Mcode' => 5, 'Total' => 6, 'TotPv' => 7, 'TotBv' => 8, 'TotFv' => 9, 'Usercode' => 10, 'Remark' => 11, 'Trnf' => 12, 'Id' => 13, 'SaType' => 14, 'Uid' => 15, 'Dl' => 16, 'Cancel' => 17, 'Send' => 18, 'Txtoption' => 19, 'Chkcash' => 20, 'Chkfuture' => 21, 'Chktransfer' => 22, 'Chkcredit1' => 23, 'Chkcredit2' => 24, 'Chkcredit3' => 25, 'Chkinternet' => 26, 'Chkdiscount' => 27, 'Chkother' => 28, 'Txtcash' => 29, 'Txtfuture' => 30, 'Txttransfer' => 31, 'Ewallet' => 32, 'Txtcredit1' => 33, 'Txtcredit2' => 34, 'Txtcredit3' => 35, 'Txtinternet' => 36, 'Txtdiscount' => 37, 'Txtother' => 38, 'Optioncash' => 39, 'Optionfuture' => 40, 'Optiontransfer' => 41, 'Optioncredit1' => 42, 'Optioncredit2' => 43, 'Optioncredit3' => 44, 'Optioninternet' => 45, 'Optiondiscount' => 46, 'Optionother' => 47, 'Asend' => 48, 'AsendDate' => 49, 'Discount' => 50, 'Status' => 51, 'EwalletBefore' => 52, 'EwalletAfter' => 53, 'EwallettBefore' => 54, 'EwallettAfter' => 55, 'Print' => 56, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'invCode' => 3, 'invRef' => 4, 'mcode' => 5, 'total' => 6, 'totPv' => 7, 'totBv' => 8, 'totFv' => 9, 'usercode' => 10, 'remark' => 11, 'trnf' => 12, 'id' => 13, 'saType' => 14, 'uid' => 15, 'dl' => 16, 'cancel' => 17, 'send' => 18, 'txtoption' => 19, 'chkcash' => 20, 'chkfuture' => 21, 'chktransfer' => 22, 'chkcredit1' => 23, 'chkcredit2' => 24, 'chkcredit3' => 25, 'chkinternet' => 26, 'chkdiscount' => 27, 'chkother' => 28, 'txtcash' => 29, 'txtfuture' => 30, 'txttransfer' => 31, 'ewallet' => 32, 'txtcredit1' => 33, 'txtcredit2' => 34, 'txtcredit3' => 35, 'txtinternet' => 36, 'txtdiscount' => 37, 'txtother' => 38, 'optioncash' => 39, 'optionfuture' => 40, 'optiontransfer' => 41, 'optioncredit1' => 42, 'optioncredit2' => 43, 'optioncredit3' => 44, 'optioninternet' => 45, 'optiondiscount' => 46, 'optionother' => 47, 'asend' => 48, 'asendDate' => 49, 'discount' => 50, 'status' => 51, 'ewalletBefore' => 52, 'ewalletAfter' => 53, 'ewallettBefore' => 54, 'ewallettAfter' => 55, 'print' => 56, ),
        self::TYPE_COLNAME       => array(AliEsalehTableMap::COL_SANO => 0, AliEsalehTableMap::COL_SANO1 => 1, AliEsalehTableMap::COL_SADATE => 2, AliEsalehTableMap::COL_INV_CODE => 3, AliEsalehTableMap::COL_INV_REF => 4, AliEsalehTableMap::COL_MCODE => 5, AliEsalehTableMap::COL_TOTAL => 6, AliEsalehTableMap::COL_TOT_PV => 7, AliEsalehTableMap::COL_TOT_BV => 8, AliEsalehTableMap::COL_TOT_FV => 9, AliEsalehTableMap::COL_USERCODE => 10, AliEsalehTableMap::COL_REMARK => 11, AliEsalehTableMap::COL_TRNF => 12, AliEsalehTableMap::COL_ID => 13, AliEsalehTableMap::COL_SA_TYPE => 14, AliEsalehTableMap::COL_UID => 15, AliEsalehTableMap::COL_DL => 16, AliEsalehTableMap::COL_CANCEL => 17, AliEsalehTableMap::COL_SEND => 18, AliEsalehTableMap::COL_TXTOPTION => 19, AliEsalehTableMap::COL_CHKCASH => 20, AliEsalehTableMap::COL_CHKFUTURE => 21, AliEsalehTableMap::COL_CHKTRANSFER => 22, AliEsalehTableMap::COL_CHKCREDIT1 => 23, AliEsalehTableMap::COL_CHKCREDIT2 => 24, AliEsalehTableMap::COL_CHKCREDIT3 => 25, AliEsalehTableMap::COL_CHKINTERNET => 26, AliEsalehTableMap::COL_CHKDISCOUNT => 27, AliEsalehTableMap::COL_CHKOTHER => 28, AliEsalehTableMap::COL_TXTCASH => 29, AliEsalehTableMap::COL_TXTFUTURE => 30, AliEsalehTableMap::COL_TXTTRANSFER => 31, AliEsalehTableMap::COL_EWALLET => 32, AliEsalehTableMap::COL_TXTCREDIT1 => 33, AliEsalehTableMap::COL_TXTCREDIT2 => 34, AliEsalehTableMap::COL_TXTCREDIT3 => 35, AliEsalehTableMap::COL_TXTINTERNET => 36, AliEsalehTableMap::COL_TXTDISCOUNT => 37, AliEsalehTableMap::COL_TXTOTHER => 38, AliEsalehTableMap::COL_OPTIONCASH => 39, AliEsalehTableMap::COL_OPTIONFUTURE => 40, AliEsalehTableMap::COL_OPTIONTRANSFER => 41, AliEsalehTableMap::COL_OPTIONCREDIT1 => 42, AliEsalehTableMap::COL_OPTIONCREDIT2 => 43, AliEsalehTableMap::COL_OPTIONCREDIT3 => 44, AliEsalehTableMap::COL_OPTIONINTERNET => 45, AliEsalehTableMap::COL_OPTIONDISCOUNT => 46, AliEsalehTableMap::COL_OPTIONOTHER => 47, AliEsalehTableMap::COL_ASEND => 48, AliEsalehTableMap::COL_ASEND_DATE => 49, AliEsalehTableMap::COL_DISCOUNT => 50, AliEsalehTableMap::COL_STATUS => 51, AliEsalehTableMap::COL_EWALLET_BEFORE => 52, AliEsalehTableMap::COL_EWALLET_AFTER => 53, AliEsalehTableMap::COL_EWALLETT_BEFORE => 54, AliEsalehTableMap::COL_EWALLETT_AFTER => 55, AliEsalehTableMap::COL_PRINT => 56, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'inv_code' => 3, 'inv_ref' => 4, 'mcode' => 5, 'total' => 6, 'tot_pv' => 7, 'tot_bv' => 8, 'tot_fv' => 9, 'usercode' => 10, 'remark' => 11, 'trnf' => 12, 'id' => 13, 'sa_type' => 14, 'uid' => 15, 'dl' => 16, 'cancel' => 17, 'send' => 18, 'txtoption' => 19, 'chkCash' => 20, 'chkFuture' => 21, 'chkTransfer' => 22, 'chkCredit1' => 23, 'chkCredit2' => 24, 'chkCredit3' => 25, 'chkInternet' => 26, 'chkDiscount' => 27, 'chkOther' => 28, 'txtCash' => 29, 'txtFuture' => 30, 'txtTransfer' => 31, 'ewallet' => 32, 'txtCredit1' => 33, 'txtCredit2' => 34, 'txtCredit3' => 35, 'txtInternet' => 36, 'txtDiscount' => 37, 'txtOther' => 38, 'optionCash' => 39, 'optionFuture' => 40, 'optionTransfer' => 41, 'optionCredit1' => 42, 'optionCredit2' => 43, 'optionCredit3' => 44, 'optionInternet' => 45, 'optionDiscount' => 46, 'optionOther' => 47, 'asend' => 48, 'asend_date' => 49, 'discount' => 50, 'status' => 51, 'ewallet_before' => 52, 'ewallet_after' => 53, 'ewallett_before' => 54, 'ewallett_after' => 55, 'print' => 56, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, )
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
        $this->setName('ali_esaleh');
        $this->setPhpName('AliEsaleh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEsaleh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'BIGINT', false, 22, null);
        $this->addColumn('sano1', 'Sano1', 'BIGINT', true, 22, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 20, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_bv', 'TotBv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_fv', 'TotFv', 'DECIMAL', true, 15, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 3, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 40, null);
        $this->addColumn('trnf', 'Trnf', 'INTEGER', false, null, null);
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
        $this->addColumn('asend', 'Asend', 'INTEGER', true, null, null);
        $this->addColumn('asend_date', 'AsendDate', 'DATE', true, null, null);
        $this->addColumn('discount', 'Discount', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, null);
        $this->addColumn('ewallet_before', 'EwalletBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_after', 'EwalletAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallett_before', 'EwallettBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallett_after', 'EwallettAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('print', 'Print', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 13 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 13 + $offset
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
        return $withPrefix ? AliEsalehTableMap::CLASS_DEFAULT : AliEsalehTableMap::OM_CLASS;
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
     * @return array           (AliEsaleh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEsalehTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEsalehTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEsalehTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEsalehTableMap::OM_CLASS;
            /** @var AliEsaleh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEsalehTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEsalehTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEsalehTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEsaleh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEsalehTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEsalehTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_SANO1);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_ID);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_UID);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_DL);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_SEND);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_ASEND);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_ASEND_DATE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_EWALLETT_BEFORE);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_EWALLETT_AFTER);
            $criteria->addSelectColumn(AliEsalehTableMap::COL_PRINT);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sano1');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_ref');
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
            $criteria->addSelectColumn($alias . '.asend');
            $criteria->addSelectColumn($alias . '.asend_date');
            $criteria->addSelectColumn($alias . '.discount');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.ewallet_before');
            $criteria->addSelectColumn($alias . '.ewallet_after');
            $criteria->addSelectColumn($alias . '.ewallett_before');
            $criteria->addSelectColumn($alias . '.ewallett_after');
            $criteria->addSelectColumn($alias . '.print');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEsalehTableMap::DATABASE_NAME)->getTable(AliEsalehTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEsalehTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEsalehTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEsalehTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEsaleh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEsaleh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEsalehTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEsaleh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEsalehTableMap::DATABASE_NAME);
            $criteria->add(AliEsalehTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEsalehQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEsalehTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEsalehTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_esaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEsalehQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEsaleh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEsaleh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEsalehTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEsaleh object
        }

        if ($criteria->containsKey(AliEsalehTableMap::COL_ID) && $criteria->keyContainsValue(AliEsalehTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEsalehTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEsalehQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEsalehTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEsalehTableMap::buildTableMap();
