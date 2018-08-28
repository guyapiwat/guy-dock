<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliRsaleh;
use CciOrm\CciOrm\AliRsalehQuery;
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
 * This class defines the structure of the 'ali_rsaleh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliRsalehTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliRsalehTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_rsaleh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliRsaleh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliRsaleh';

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
    const COL_SANO = 'ali_rsaleh.sano';

    /**
     * the column name for the sano1 field
     */
    const COL_SANO1 = 'ali_rsaleh.sano1';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_rsaleh.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_rsaleh.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_rsaleh.inv_ref';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_rsaleh.mcode';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_rsaleh.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_rsaleh.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_rsaleh.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_rsaleh.tot_fv';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_rsaleh.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_rsaleh.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_rsaleh.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_rsaleh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_rsaleh.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_rsaleh.uid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_rsaleh.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_rsaleh.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_rsaleh.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_rsaleh.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_rsaleh.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_rsaleh.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_rsaleh.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_rsaleh.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_rsaleh.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_rsaleh.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_rsaleh.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_rsaleh.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_rsaleh.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_rsaleh.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_rsaleh.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_rsaleh.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_rsaleh.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_rsaleh.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_rsaleh.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_rsaleh.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_rsaleh.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_rsaleh.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_rsaleh.txtOther';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_rsaleh.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_rsaleh.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_rsaleh.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_rsaleh.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_rsaleh.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_rsaleh.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_rsaleh.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_rsaleh.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_rsaleh.optionOther';

    /**
     * the column name for the asend field
     */
    const COL_ASEND = 'ali_rsaleh.asend';

    /**
     * the column name for the asend_date field
     */
    const COL_ASEND_DATE = 'ali_rsaleh.asend_date';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_rsaleh.discount';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_rsaleh.print';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_rsaleh.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_rsaleh.ewallet_after';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sano1', 'Sadate', 'InvCode', 'InvRef', 'Mcode', 'Total', 'TotPv', 'TotBv', 'TotFv', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Dl', 'Cancel', 'Send', 'Txtoption', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkinternet', 'Chkdiscount', 'Chkother', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Ewallet', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtinternet', 'Txtdiscount', 'Txtother', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioninternet', 'Optiondiscount', 'Optionother', 'Asend', 'AsendDate', 'Discount', 'Print', 'EwalletBefore', 'EwalletAfter', ),
        self::TYPE_CAMELNAME     => array('sano', 'sano1', 'sadate', 'invCode', 'invRef', 'mcode', 'total', 'totPv', 'totBv', 'totFv', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'dl', 'cancel', 'send', 'txtoption', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkinternet', 'chkdiscount', 'chkother', 'txtcash', 'txtfuture', 'txttransfer', 'ewallet', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtinternet', 'txtdiscount', 'txtother', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioninternet', 'optiondiscount', 'optionother', 'asend', 'asendDate', 'discount', 'print', 'ewalletBefore', 'ewalletAfter', ),
        self::TYPE_COLNAME       => array(AliRsalehTableMap::COL_SANO, AliRsalehTableMap::COL_SANO1, AliRsalehTableMap::COL_SADATE, AliRsalehTableMap::COL_INV_CODE, AliRsalehTableMap::COL_INV_REF, AliRsalehTableMap::COL_MCODE, AliRsalehTableMap::COL_TOTAL, AliRsalehTableMap::COL_TOT_PV, AliRsalehTableMap::COL_TOT_BV, AliRsalehTableMap::COL_TOT_FV, AliRsalehTableMap::COL_USERCODE, AliRsalehTableMap::COL_REMARK, AliRsalehTableMap::COL_TRNF, AliRsalehTableMap::COL_ID, AliRsalehTableMap::COL_SA_TYPE, AliRsalehTableMap::COL_UID, AliRsalehTableMap::COL_DL, AliRsalehTableMap::COL_CANCEL, AliRsalehTableMap::COL_SEND, AliRsalehTableMap::COL_TXTOPTION, AliRsalehTableMap::COL_CHKCASH, AliRsalehTableMap::COL_CHKFUTURE, AliRsalehTableMap::COL_CHKTRANSFER, AliRsalehTableMap::COL_CHKCREDIT1, AliRsalehTableMap::COL_CHKCREDIT2, AliRsalehTableMap::COL_CHKCREDIT3, AliRsalehTableMap::COL_CHKINTERNET, AliRsalehTableMap::COL_CHKDISCOUNT, AliRsalehTableMap::COL_CHKOTHER, AliRsalehTableMap::COL_TXTCASH, AliRsalehTableMap::COL_TXTFUTURE, AliRsalehTableMap::COL_TXTTRANSFER, AliRsalehTableMap::COL_EWALLET, AliRsalehTableMap::COL_TXTCREDIT1, AliRsalehTableMap::COL_TXTCREDIT2, AliRsalehTableMap::COL_TXTCREDIT3, AliRsalehTableMap::COL_TXTINTERNET, AliRsalehTableMap::COL_TXTDISCOUNT, AliRsalehTableMap::COL_TXTOTHER, AliRsalehTableMap::COL_OPTIONCASH, AliRsalehTableMap::COL_OPTIONFUTURE, AliRsalehTableMap::COL_OPTIONTRANSFER, AliRsalehTableMap::COL_OPTIONCREDIT1, AliRsalehTableMap::COL_OPTIONCREDIT2, AliRsalehTableMap::COL_OPTIONCREDIT3, AliRsalehTableMap::COL_OPTIONINTERNET, AliRsalehTableMap::COL_OPTIONDISCOUNT, AliRsalehTableMap::COL_OPTIONOTHER, AliRsalehTableMap::COL_ASEND, AliRsalehTableMap::COL_ASEND_DATE, AliRsalehTableMap::COL_DISCOUNT, AliRsalehTableMap::COL_PRINT, AliRsalehTableMap::COL_EWALLET_BEFORE, AliRsalehTableMap::COL_EWALLET_AFTER, ),
        self::TYPE_FIELDNAME     => array('sano', 'sano1', 'sadate', 'inv_code', 'inv_ref', 'mcode', 'total', 'tot_pv', 'tot_bv', 'tot_fv', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'dl', 'cancel', 'send', 'txtoption', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkInternet', 'chkDiscount', 'chkOther', 'txtCash', 'txtFuture', 'txtTransfer', 'ewallet', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtInternet', 'txtDiscount', 'txtOther', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionInternet', 'optionDiscount', 'optionOther', 'asend', 'asend_date', 'discount', 'print', 'ewallet_before', 'ewallet_after', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sano1' => 1, 'Sadate' => 2, 'InvCode' => 3, 'InvRef' => 4, 'Mcode' => 5, 'Total' => 6, 'TotPv' => 7, 'TotBv' => 8, 'TotFv' => 9, 'Usercode' => 10, 'Remark' => 11, 'Trnf' => 12, 'Id' => 13, 'SaType' => 14, 'Uid' => 15, 'Dl' => 16, 'Cancel' => 17, 'Send' => 18, 'Txtoption' => 19, 'Chkcash' => 20, 'Chkfuture' => 21, 'Chktransfer' => 22, 'Chkcredit1' => 23, 'Chkcredit2' => 24, 'Chkcredit3' => 25, 'Chkinternet' => 26, 'Chkdiscount' => 27, 'Chkother' => 28, 'Txtcash' => 29, 'Txtfuture' => 30, 'Txttransfer' => 31, 'Ewallet' => 32, 'Txtcredit1' => 33, 'Txtcredit2' => 34, 'Txtcredit3' => 35, 'Txtinternet' => 36, 'Txtdiscount' => 37, 'Txtother' => 38, 'Optioncash' => 39, 'Optionfuture' => 40, 'Optiontransfer' => 41, 'Optioncredit1' => 42, 'Optioncredit2' => 43, 'Optioncredit3' => 44, 'Optioninternet' => 45, 'Optiondiscount' => 46, 'Optionother' => 47, 'Asend' => 48, 'AsendDate' => 49, 'Discount' => 50, 'Print' => 51, 'EwalletBefore' => 52, 'EwalletAfter' => 53, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'invCode' => 3, 'invRef' => 4, 'mcode' => 5, 'total' => 6, 'totPv' => 7, 'totBv' => 8, 'totFv' => 9, 'usercode' => 10, 'remark' => 11, 'trnf' => 12, 'id' => 13, 'saType' => 14, 'uid' => 15, 'dl' => 16, 'cancel' => 17, 'send' => 18, 'txtoption' => 19, 'chkcash' => 20, 'chkfuture' => 21, 'chktransfer' => 22, 'chkcredit1' => 23, 'chkcredit2' => 24, 'chkcredit3' => 25, 'chkinternet' => 26, 'chkdiscount' => 27, 'chkother' => 28, 'txtcash' => 29, 'txtfuture' => 30, 'txttransfer' => 31, 'ewallet' => 32, 'txtcredit1' => 33, 'txtcredit2' => 34, 'txtcredit3' => 35, 'txtinternet' => 36, 'txtdiscount' => 37, 'txtother' => 38, 'optioncash' => 39, 'optionfuture' => 40, 'optiontransfer' => 41, 'optioncredit1' => 42, 'optioncredit2' => 43, 'optioncredit3' => 44, 'optioninternet' => 45, 'optiondiscount' => 46, 'optionother' => 47, 'asend' => 48, 'asendDate' => 49, 'discount' => 50, 'print' => 51, 'ewalletBefore' => 52, 'ewalletAfter' => 53, ),
        self::TYPE_COLNAME       => array(AliRsalehTableMap::COL_SANO => 0, AliRsalehTableMap::COL_SANO1 => 1, AliRsalehTableMap::COL_SADATE => 2, AliRsalehTableMap::COL_INV_CODE => 3, AliRsalehTableMap::COL_INV_REF => 4, AliRsalehTableMap::COL_MCODE => 5, AliRsalehTableMap::COL_TOTAL => 6, AliRsalehTableMap::COL_TOT_PV => 7, AliRsalehTableMap::COL_TOT_BV => 8, AliRsalehTableMap::COL_TOT_FV => 9, AliRsalehTableMap::COL_USERCODE => 10, AliRsalehTableMap::COL_REMARK => 11, AliRsalehTableMap::COL_TRNF => 12, AliRsalehTableMap::COL_ID => 13, AliRsalehTableMap::COL_SA_TYPE => 14, AliRsalehTableMap::COL_UID => 15, AliRsalehTableMap::COL_DL => 16, AliRsalehTableMap::COL_CANCEL => 17, AliRsalehTableMap::COL_SEND => 18, AliRsalehTableMap::COL_TXTOPTION => 19, AliRsalehTableMap::COL_CHKCASH => 20, AliRsalehTableMap::COL_CHKFUTURE => 21, AliRsalehTableMap::COL_CHKTRANSFER => 22, AliRsalehTableMap::COL_CHKCREDIT1 => 23, AliRsalehTableMap::COL_CHKCREDIT2 => 24, AliRsalehTableMap::COL_CHKCREDIT3 => 25, AliRsalehTableMap::COL_CHKINTERNET => 26, AliRsalehTableMap::COL_CHKDISCOUNT => 27, AliRsalehTableMap::COL_CHKOTHER => 28, AliRsalehTableMap::COL_TXTCASH => 29, AliRsalehTableMap::COL_TXTFUTURE => 30, AliRsalehTableMap::COL_TXTTRANSFER => 31, AliRsalehTableMap::COL_EWALLET => 32, AliRsalehTableMap::COL_TXTCREDIT1 => 33, AliRsalehTableMap::COL_TXTCREDIT2 => 34, AliRsalehTableMap::COL_TXTCREDIT3 => 35, AliRsalehTableMap::COL_TXTINTERNET => 36, AliRsalehTableMap::COL_TXTDISCOUNT => 37, AliRsalehTableMap::COL_TXTOTHER => 38, AliRsalehTableMap::COL_OPTIONCASH => 39, AliRsalehTableMap::COL_OPTIONFUTURE => 40, AliRsalehTableMap::COL_OPTIONTRANSFER => 41, AliRsalehTableMap::COL_OPTIONCREDIT1 => 42, AliRsalehTableMap::COL_OPTIONCREDIT2 => 43, AliRsalehTableMap::COL_OPTIONCREDIT3 => 44, AliRsalehTableMap::COL_OPTIONINTERNET => 45, AliRsalehTableMap::COL_OPTIONDISCOUNT => 46, AliRsalehTableMap::COL_OPTIONOTHER => 47, AliRsalehTableMap::COL_ASEND => 48, AliRsalehTableMap::COL_ASEND_DATE => 49, AliRsalehTableMap::COL_DISCOUNT => 50, AliRsalehTableMap::COL_PRINT => 51, AliRsalehTableMap::COL_EWALLET_BEFORE => 52, AliRsalehTableMap::COL_EWALLET_AFTER => 53, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'inv_code' => 3, 'inv_ref' => 4, 'mcode' => 5, 'total' => 6, 'tot_pv' => 7, 'tot_bv' => 8, 'tot_fv' => 9, 'usercode' => 10, 'remark' => 11, 'trnf' => 12, 'id' => 13, 'sa_type' => 14, 'uid' => 15, 'dl' => 16, 'cancel' => 17, 'send' => 18, 'txtoption' => 19, 'chkCash' => 20, 'chkFuture' => 21, 'chkTransfer' => 22, 'chkCredit1' => 23, 'chkCredit2' => 24, 'chkCredit3' => 25, 'chkInternet' => 26, 'chkDiscount' => 27, 'chkOther' => 28, 'txtCash' => 29, 'txtFuture' => 30, 'txtTransfer' => 31, 'ewallet' => 32, 'txtCredit1' => 33, 'txtCredit2' => 34, 'txtCredit3' => 35, 'txtInternet' => 36, 'txtDiscount' => 37, 'txtOther' => 38, 'optionCash' => 39, 'optionFuture' => 40, 'optionTransfer' => 41, 'optionCredit1' => 42, 'optionCredit2' => 43, 'optionCredit3' => 44, 'optionInternet' => 45, 'optionDiscount' => 46, 'optionOther' => 47, 'asend' => 48, 'asend_date' => 49, 'discount' => 50, 'print' => 51, 'ewallet_before' => 52, 'ewallet_after' => 53, ),
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
        $this->setName('ali_rsaleh');
        $this->setPhpName('AliRsaleh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliRsaleh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'BIGINT', false, 44, null);
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
        $this->addColumn('trnf', 'Trnf', 'INTEGER', false, null, 0);
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
        $this->addColumn('print', 'Print', 'INTEGER', true, null, null);
        $this->addColumn('ewallet_before', 'EwalletBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_after', 'EwalletAfter', 'DECIMAL', true, 15, null);
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
        return $withPrefix ? AliRsalehTableMap::CLASS_DEFAULT : AliRsalehTableMap::OM_CLASS;
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
     * @return array           (AliRsaleh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliRsalehTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliRsalehTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliRsalehTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliRsalehTableMap::OM_CLASS;
            /** @var AliRsaleh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliRsalehTableMap::addInstanceToPool($obj, $key);
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
            $key = AliRsalehTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliRsalehTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliRsaleh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliRsalehTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliRsalehTableMap::COL_SANO);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_SANO1);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_ID);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_UID);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_DL);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_SEND);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_ASEND);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_ASEND_DATE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliRsalehTableMap::COL_EWALLET_AFTER);
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
            $criteria->addSelectColumn($alias . '.print');
            $criteria->addSelectColumn($alias . '.ewallet_before');
            $criteria->addSelectColumn($alias . '.ewallet_after');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliRsalehTableMap::DATABASE_NAME)->getTable(AliRsalehTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliRsalehTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliRsalehTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliRsalehTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliRsaleh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliRsaleh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliRsalehTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliRsaleh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliRsalehTableMap::DATABASE_NAME);
            $criteria->add(AliRsalehTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliRsalehQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliRsalehTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliRsalehTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_rsaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliRsalehQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliRsaleh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliRsaleh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliRsalehTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliRsaleh object
        }

        if ($criteria->containsKey(AliRsalehTableMap::COL_ID) && $criteria->keyContainsValue(AliRsalehTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliRsalehTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliRsalehQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliRsalehTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliRsalehTableMap::buildTableMap();
