<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliImportStockH;
use CciOrm\CciOrm\AliImportStockHQuery;
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
 * This class defines the structure of the 'ali_import_stock_h' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliImportStockHTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliImportStockHTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_import_stock_h';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliImportStockH';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliImportStockH';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 59;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 59;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_import_stock_h.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_import_stock_h.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_import_stock_h.inv_code';

    /**
     * the column name for the inv_code_to field
     */
    const COL_INV_CODE_TO = 'ali_import_stock_h.inv_code_to';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_import_stock_h.mcode';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_import_stock_h.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_import_stock_h.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_import_stock_h.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_import_stock_h.tot_fv';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_import_stock_h.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_import_stock_h.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_import_stock_h.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_import_stock_h.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_import_stock_h.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_import_stock_h.uid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_import_stock_h.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_import_stock_h.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_import_stock_h.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_import_stock_h.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_import_stock_h.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_import_stock_h.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_import_stock_h.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_import_stock_h.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_import_stock_h.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_import_stock_h.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_import_stock_h.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_import_stock_h.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_import_stock_h.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_import_stock_h.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_import_stock_h.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_import_stock_h.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_import_stock_h.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_import_stock_h.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_import_stock_h.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_import_stock_h.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_import_stock_h.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_import_stock_h.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_import_stock_h.txtOther';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_import_stock_h.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_import_stock_h.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_import_stock_h.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_import_stock_h.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_import_stock_h.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_import_stock_h.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_import_stock_h.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_import_stock_h.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_import_stock_h.optionOther';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_import_stock_h.discount';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_import_stock_h.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_import_stock_h.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_import_stock_h.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_import_stock_h.receive_date';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_import_stock_h.print';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_import_stock_h.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_import_stock_h.ewallet_after';

    /**
     * the column name for the ewallett_before field
     */
    const COL_EWALLETT_BEFORE = 'ali_import_stock_h.ewallett_before';

    /**
     * the column name for the ewallett_after field
     */
    const COL_EWALLETT_AFTER = 'ali_import_stock_h.ewallett_after';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_import_stock_h.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_import_stock_h.uid_cancel';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sadate', 'InvCode', 'InvCodeTo', 'Mcode', 'Total', 'TotPv', 'TotBv', 'TotFv', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Dl', 'Cancel', 'Send', 'Txtoption', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkinternet', 'Chkdiscount', 'Chkother', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Ewallet', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtinternet', 'Txtdiscount', 'Txtother', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioninternet', 'Optiondiscount', 'Optionother', 'Discount', 'Sender', 'SenderDate', 'Receive', 'ReceiveDate', 'Print', 'EwalletBefore', 'EwalletAfter', 'EwallettBefore', 'EwallettAfter', 'CancelDate', 'UidCancel', ),
        self::TYPE_CAMELNAME     => array('sano', 'sadate', 'invCode', 'invCodeTo', 'mcode', 'total', 'totPv', 'totBv', 'totFv', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'dl', 'cancel', 'send', 'txtoption', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkinternet', 'chkdiscount', 'chkother', 'txtcash', 'txtfuture', 'txttransfer', 'ewallet', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtinternet', 'txtdiscount', 'txtother', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioninternet', 'optiondiscount', 'optionother', 'discount', 'sender', 'senderDate', 'receive', 'receiveDate', 'print', 'ewalletBefore', 'ewalletAfter', 'ewallettBefore', 'ewallettAfter', 'cancelDate', 'uidCancel', ),
        self::TYPE_COLNAME       => array(AliImportStockHTableMap::COL_SANO, AliImportStockHTableMap::COL_SADATE, AliImportStockHTableMap::COL_INV_CODE, AliImportStockHTableMap::COL_INV_CODE_TO, AliImportStockHTableMap::COL_MCODE, AliImportStockHTableMap::COL_TOTAL, AliImportStockHTableMap::COL_TOT_PV, AliImportStockHTableMap::COL_TOT_BV, AliImportStockHTableMap::COL_TOT_FV, AliImportStockHTableMap::COL_USERCODE, AliImportStockHTableMap::COL_REMARK, AliImportStockHTableMap::COL_TRNF, AliImportStockHTableMap::COL_ID, AliImportStockHTableMap::COL_SA_TYPE, AliImportStockHTableMap::COL_UID, AliImportStockHTableMap::COL_DL, AliImportStockHTableMap::COL_CANCEL, AliImportStockHTableMap::COL_SEND, AliImportStockHTableMap::COL_TXTOPTION, AliImportStockHTableMap::COL_CHKCASH, AliImportStockHTableMap::COL_CHKFUTURE, AliImportStockHTableMap::COL_CHKTRANSFER, AliImportStockHTableMap::COL_CHKCREDIT1, AliImportStockHTableMap::COL_CHKCREDIT2, AliImportStockHTableMap::COL_CHKCREDIT3, AliImportStockHTableMap::COL_CHKINTERNET, AliImportStockHTableMap::COL_CHKDISCOUNT, AliImportStockHTableMap::COL_CHKOTHER, AliImportStockHTableMap::COL_TXTCASH, AliImportStockHTableMap::COL_TXTFUTURE, AliImportStockHTableMap::COL_TXTTRANSFER, AliImportStockHTableMap::COL_EWALLET, AliImportStockHTableMap::COL_TXTCREDIT1, AliImportStockHTableMap::COL_TXTCREDIT2, AliImportStockHTableMap::COL_TXTCREDIT3, AliImportStockHTableMap::COL_TXTINTERNET, AliImportStockHTableMap::COL_TXTDISCOUNT, AliImportStockHTableMap::COL_TXTOTHER, AliImportStockHTableMap::COL_OPTIONCASH, AliImportStockHTableMap::COL_OPTIONFUTURE, AliImportStockHTableMap::COL_OPTIONTRANSFER, AliImportStockHTableMap::COL_OPTIONCREDIT1, AliImportStockHTableMap::COL_OPTIONCREDIT2, AliImportStockHTableMap::COL_OPTIONCREDIT3, AliImportStockHTableMap::COL_OPTIONINTERNET, AliImportStockHTableMap::COL_OPTIONDISCOUNT, AliImportStockHTableMap::COL_OPTIONOTHER, AliImportStockHTableMap::COL_DISCOUNT, AliImportStockHTableMap::COL_SENDER, AliImportStockHTableMap::COL_SENDER_DATE, AliImportStockHTableMap::COL_RECEIVE, AliImportStockHTableMap::COL_RECEIVE_DATE, AliImportStockHTableMap::COL_PRINT, AliImportStockHTableMap::COL_EWALLET_BEFORE, AliImportStockHTableMap::COL_EWALLET_AFTER, AliImportStockHTableMap::COL_EWALLETT_BEFORE, AliImportStockHTableMap::COL_EWALLETT_AFTER, AliImportStockHTableMap::COL_CANCEL_DATE, AliImportStockHTableMap::COL_UID_CANCEL, ),
        self::TYPE_FIELDNAME     => array('sano', 'sadate', 'inv_code', 'inv_code_to', 'mcode', 'total', 'tot_pv', 'tot_bv', 'tot_fv', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'dl', 'cancel', 'send', 'txtoption', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkInternet', 'chkDiscount', 'chkOther', 'txtCash', 'txtFuture', 'txtTransfer', 'ewallet', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtInternet', 'txtDiscount', 'txtOther', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionInternet', 'optionDiscount', 'optionOther', 'discount', 'sender', 'sender_date', 'receive', 'receive_date', 'print', 'ewallet_before', 'ewallet_after', 'ewallett_before', 'ewallett_after', 'cancel_date', 'uid_cancel', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sadate' => 1, 'InvCode' => 2, 'InvCodeTo' => 3, 'Mcode' => 4, 'Total' => 5, 'TotPv' => 6, 'TotBv' => 7, 'TotFv' => 8, 'Usercode' => 9, 'Remark' => 10, 'Trnf' => 11, 'Id' => 12, 'SaType' => 13, 'Uid' => 14, 'Dl' => 15, 'Cancel' => 16, 'Send' => 17, 'Txtoption' => 18, 'Chkcash' => 19, 'Chkfuture' => 20, 'Chktransfer' => 21, 'Chkcredit1' => 22, 'Chkcredit2' => 23, 'Chkcredit3' => 24, 'Chkinternet' => 25, 'Chkdiscount' => 26, 'Chkother' => 27, 'Txtcash' => 28, 'Txtfuture' => 29, 'Txttransfer' => 30, 'Ewallet' => 31, 'Txtcredit1' => 32, 'Txtcredit2' => 33, 'Txtcredit3' => 34, 'Txtinternet' => 35, 'Txtdiscount' => 36, 'Txtother' => 37, 'Optioncash' => 38, 'Optionfuture' => 39, 'Optiontransfer' => 40, 'Optioncredit1' => 41, 'Optioncredit2' => 42, 'Optioncredit3' => 43, 'Optioninternet' => 44, 'Optiondiscount' => 45, 'Optionother' => 46, 'Discount' => 47, 'Sender' => 48, 'SenderDate' => 49, 'Receive' => 50, 'ReceiveDate' => 51, 'Print' => 52, 'EwalletBefore' => 53, 'EwalletAfter' => 54, 'EwallettBefore' => 55, 'EwallettAfter' => 56, 'CancelDate' => 57, 'UidCancel' => 58, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sadate' => 1, 'invCode' => 2, 'invCodeTo' => 3, 'mcode' => 4, 'total' => 5, 'totPv' => 6, 'totBv' => 7, 'totFv' => 8, 'usercode' => 9, 'remark' => 10, 'trnf' => 11, 'id' => 12, 'saType' => 13, 'uid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtoption' => 18, 'chkcash' => 19, 'chkfuture' => 20, 'chktransfer' => 21, 'chkcredit1' => 22, 'chkcredit2' => 23, 'chkcredit3' => 24, 'chkinternet' => 25, 'chkdiscount' => 26, 'chkother' => 27, 'txtcash' => 28, 'txtfuture' => 29, 'txttransfer' => 30, 'ewallet' => 31, 'txtcredit1' => 32, 'txtcredit2' => 33, 'txtcredit3' => 34, 'txtinternet' => 35, 'txtdiscount' => 36, 'txtother' => 37, 'optioncash' => 38, 'optionfuture' => 39, 'optiontransfer' => 40, 'optioncredit1' => 41, 'optioncredit2' => 42, 'optioncredit3' => 43, 'optioninternet' => 44, 'optiondiscount' => 45, 'optionother' => 46, 'discount' => 47, 'sender' => 48, 'senderDate' => 49, 'receive' => 50, 'receiveDate' => 51, 'print' => 52, 'ewalletBefore' => 53, 'ewalletAfter' => 54, 'ewallettBefore' => 55, 'ewallettAfter' => 56, 'cancelDate' => 57, 'uidCancel' => 58, ),
        self::TYPE_COLNAME       => array(AliImportStockHTableMap::COL_SANO => 0, AliImportStockHTableMap::COL_SADATE => 1, AliImportStockHTableMap::COL_INV_CODE => 2, AliImportStockHTableMap::COL_INV_CODE_TO => 3, AliImportStockHTableMap::COL_MCODE => 4, AliImportStockHTableMap::COL_TOTAL => 5, AliImportStockHTableMap::COL_TOT_PV => 6, AliImportStockHTableMap::COL_TOT_BV => 7, AliImportStockHTableMap::COL_TOT_FV => 8, AliImportStockHTableMap::COL_USERCODE => 9, AliImportStockHTableMap::COL_REMARK => 10, AliImportStockHTableMap::COL_TRNF => 11, AliImportStockHTableMap::COL_ID => 12, AliImportStockHTableMap::COL_SA_TYPE => 13, AliImportStockHTableMap::COL_UID => 14, AliImportStockHTableMap::COL_DL => 15, AliImportStockHTableMap::COL_CANCEL => 16, AliImportStockHTableMap::COL_SEND => 17, AliImportStockHTableMap::COL_TXTOPTION => 18, AliImportStockHTableMap::COL_CHKCASH => 19, AliImportStockHTableMap::COL_CHKFUTURE => 20, AliImportStockHTableMap::COL_CHKTRANSFER => 21, AliImportStockHTableMap::COL_CHKCREDIT1 => 22, AliImportStockHTableMap::COL_CHKCREDIT2 => 23, AliImportStockHTableMap::COL_CHKCREDIT3 => 24, AliImportStockHTableMap::COL_CHKINTERNET => 25, AliImportStockHTableMap::COL_CHKDISCOUNT => 26, AliImportStockHTableMap::COL_CHKOTHER => 27, AliImportStockHTableMap::COL_TXTCASH => 28, AliImportStockHTableMap::COL_TXTFUTURE => 29, AliImportStockHTableMap::COL_TXTTRANSFER => 30, AliImportStockHTableMap::COL_EWALLET => 31, AliImportStockHTableMap::COL_TXTCREDIT1 => 32, AliImportStockHTableMap::COL_TXTCREDIT2 => 33, AliImportStockHTableMap::COL_TXTCREDIT3 => 34, AliImportStockHTableMap::COL_TXTINTERNET => 35, AliImportStockHTableMap::COL_TXTDISCOUNT => 36, AliImportStockHTableMap::COL_TXTOTHER => 37, AliImportStockHTableMap::COL_OPTIONCASH => 38, AliImportStockHTableMap::COL_OPTIONFUTURE => 39, AliImportStockHTableMap::COL_OPTIONTRANSFER => 40, AliImportStockHTableMap::COL_OPTIONCREDIT1 => 41, AliImportStockHTableMap::COL_OPTIONCREDIT2 => 42, AliImportStockHTableMap::COL_OPTIONCREDIT3 => 43, AliImportStockHTableMap::COL_OPTIONINTERNET => 44, AliImportStockHTableMap::COL_OPTIONDISCOUNT => 45, AliImportStockHTableMap::COL_OPTIONOTHER => 46, AliImportStockHTableMap::COL_DISCOUNT => 47, AliImportStockHTableMap::COL_SENDER => 48, AliImportStockHTableMap::COL_SENDER_DATE => 49, AliImportStockHTableMap::COL_RECEIVE => 50, AliImportStockHTableMap::COL_RECEIVE_DATE => 51, AliImportStockHTableMap::COL_PRINT => 52, AliImportStockHTableMap::COL_EWALLET_BEFORE => 53, AliImportStockHTableMap::COL_EWALLET_AFTER => 54, AliImportStockHTableMap::COL_EWALLETT_BEFORE => 55, AliImportStockHTableMap::COL_EWALLETT_AFTER => 56, AliImportStockHTableMap::COL_CANCEL_DATE => 57, AliImportStockHTableMap::COL_UID_CANCEL => 58, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sadate' => 1, 'inv_code' => 2, 'inv_code_to' => 3, 'mcode' => 4, 'total' => 5, 'tot_pv' => 6, 'tot_bv' => 7, 'tot_fv' => 8, 'usercode' => 9, 'remark' => 10, 'trnf' => 11, 'id' => 12, 'sa_type' => 13, 'uid' => 14, 'dl' => 15, 'cancel' => 16, 'send' => 17, 'txtoption' => 18, 'chkCash' => 19, 'chkFuture' => 20, 'chkTransfer' => 21, 'chkCredit1' => 22, 'chkCredit2' => 23, 'chkCredit3' => 24, 'chkInternet' => 25, 'chkDiscount' => 26, 'chkOther' => 27, 'txtCash' => 28, 'txtFuture' => 29, 'txtTransfer' => 30, 'ewallet' => 31, 'txtCredit1' => 32, 'txtCredit2' => 33, 'txtCredit3' => 34, 'txtInternet' => 35, 'txtDiscount' => 36, 'txtOther' => 37, 'optionCash' => 38, 'optionFuture' => 39, 'optionTransfer' => 40, 'optionCredit1' => 41, 'optionCredit2' => 42, 'optionCredit3' => 43, 'optionInternet' => 44, 'optionDiscount' => 45, 'optionOther' => 46, 'discount' => 47, 'sender' => 48, 'sender_date' => 49, 'receive' => 50, 'receive_date' => 51, 'print' => 52, 'ewallet_before' => 53, 'ewallet_after' => 54, 'ewallett_before' => 55, 'ewallett_after' => 56, 'cancel_date' => 57, 'uid_cancel' => 58, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, )
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
        $this->setName('ali_import_stock_h');
        $this->setPhpName('AliImportStockH');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliImportStockH');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'INTEGER', false, null, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('inv_code_to', 'InvCodeTo', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_bv', 'TotBv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_fv', 'TotFv', 'DECIMAL', true, 15, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 3, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 40, null);
        $this->addColumn('trnf', 'Trnf', 'VARCHAR', false, 1, null);
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
        $this->addColumn('discount', 'Discount', 'INTEGER', true, null, null);
        $this->addColumn('sender', 'Sender', 'INTEGER', true, null, null);
        $this->addColumn('sender_date', 'SenderDate', 'DATE', true, null, null);
        $this->addColumn('receive', 'Receive', 'INTEGER', true, null, null);
        $this->addColumn('receive_date', 'ReceiveDate', 'DATE', true, null, null);
        $this->addColumn('print', 'Print', 'INTEGER', true, null, null);
        $this->addColumn('ewallet_before', 'EwalletBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_after', 'EwalletAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallett_before', 'EwallettBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallett_after', 'EwallettAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('cancel_date', 'CancelDate', 'DATE', true, null, null);
        $this->addColumn('uid_cancel', 'UidCancel', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliImportStockHTableMap::CLASS_DEFAULT : AliImportStockHTableMap::OM_CLASS;
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
     * @return array           (AliImportStockH object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliImportStockHTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliImportStockHTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliImportStockHTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliImportStockHTableMap::OM_CLASS;
            /** @var AliImportStockH $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliImportStockHTableMap::addInstanceToPool($obj, $key);
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
            $key = AliImportStockHTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliImportStockHTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliImportStockH $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliImportStockHTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_SANO);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_INV_CODE_TO);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_ID);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_UID);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_DL);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_SEND);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_EWALLETT_BEFORE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_EWALLETT_AFTER);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliImportStockHTableMap::COL_UID_CANCEL);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_code_to');
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
            $criteria->addSelectColumn($alias . '.discount');
            $criteria->addSelectColumn($alias . '.sender');
            $criteria->addSelectColumn($alias . '.sender_date');
            $criteria->addSelectColumn($alias . '.receive');
            $criteria->addSelectColumn($alias . '.receive_date');
            $criteria->addSelectColumn($alias . '.print');
            $criteria->addSelectColumn($alias . '.ewallet_before');
            $criteria->addSelectColumn($alias . '.ewallet_after');
            $criteria->addSelectColumn($alias . '.ewallett_before');
            $criteria->addSelectColumn($alias . '.ewallett_after');
            $criteria->addSelectColumn($alias . '.cancel_date');
            $criteria->addSelectColumn($alias . '.uid_cancel');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliImportStockHTableMap::DATABASE_NAME)->getTable(AliImportStockHTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliImportStockHTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliImportStockHTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliImportStockHTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliImportStockH or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliImportStockH object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliImportStockHTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliImportStockH) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliImportStockHTableMap::DATABASE_NAME);
            $criteria->add(AliImportStockHTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliImportStockHQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliImportStockHTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliImportStockHTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_import_stock_h table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliImportStockHQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliImportStockH or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliImportStockH object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliImportStockHTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliImportStockH object
        }

        if ($criteria->containsKey(AliImportStockHTableMap::COL_ID) && $criteria->keyContainsValue(AliImportStockHTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliImportStockHTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliImportStockHQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliImportStockHTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliImportStockHTableMap::buildTableMap();
