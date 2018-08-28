<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTransfersaleH;
use CciOrm\CciOrm\AliTransfersaleHQuery;
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
 * This class defines the structure of the 'ali_transfersale_h' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTransfersaleHTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTransfersaleHTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_transfersale_h';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTransfersaleH';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTransfersaleH';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 91;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 91;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_transfersale_h.sano';

    /**
     * the column name for the sano1 field
     */
    const COL_SANO1 = 'ali_transfersale_h.sano1';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_transfersale_h.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_transfersale_h.sctime';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_transfersale_h.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_transfersale_h.inv_ref';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_transfersale_h.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_transfersale_h.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_transfersale_h.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_transfersale_h.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_transfersale_h.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_transfersale_h.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_transfersale_h.tot_fv';

    /**
     * the column name for the tot_weight field
     */
    const COL_TOT_WEIGHT = 'ali_transfersale_h.tot_weight';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_transfersale_h.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_transfersale_h.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_transfersale_h.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_transfersale_h.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_transfersale_h.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_transfersale_h.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_transfersale_h.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_transfersale_h.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_transfersale_h.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_transfersale_h.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_transfersale_h.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_transfersale_h.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_transfersale_h.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_transfersale_h.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_transfersale_h.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_transfersale_h.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_transfersale_h.chkCredit3';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_transfersale_h.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_transfersale_h.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_transfersale_h.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_transfersale_h.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_transfersale_h.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_transfersale_h.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_transfersale_h.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_transfersale_h.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_transfersale_h.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_transfersale_h.txtCredit3';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_transfersale_h.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_transfersale_h.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_transfersale_h.txtOther';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_transfersale_h.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_transfersale_h.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_transfersale_h.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_transfersale_h.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_transfersale_h.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_transfersale_h.optionCredit3';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_transfersale_h.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_transfersale_h.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_transfersale_h.optionOther';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_transfersale_h.discount';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_transfersale_h.print';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_transfersale_h.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_transfersale_h.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_transfersale_h.ipay';

    /**
     * the column name for the pay_type field
     */
    const COL_PAY_TYPE = 'ali_transfersale_h.pay_type';

    /**
     * the column name for the hcancel field
     */
    const COL_HCANCEL = 'ali_transfersale_h.hcancel';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'ali_transfersale_h.caddress';

    /**
     * the column name for the cdistrictId field
     */
    const COL_CDISTRICTID = 'ali_transfersale_h.cdistrictId';

    /**
     * the column name for the camphurId field
     */
    const COL_CAMPHURID = 'ali_transfersale_h.camphurId';

    /**
     * the column name for the cprovinceId field
     */
    const COL_CPROVINCEID = 'ali_transfersale_h.cprovinceId';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'ali_transfersale_h.czip';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_transfersale_h.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_transfersale_h.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_transfersale_h.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_transfersale_h.receive_date';

    /**
     * the column name for the asend field
     */
    const COL_ASEND = 'ali_transfersale_h.asend';

    /**
     * the column name for the ato_type field
     */
    const COL_ATO_TYPE = 'ali_transfersale_h.ato_type';

    /**
     * the column name for the ato_id field
     */
    const COL_ATO_ID = 'ali_transfersale_h.ato_id';

    /**
     * the column name for the online field
     */
    const COL_ONLINE = 'ali_transfersale_h.online';

    /**
     * the column name for the hpv field
     */
    const COL_HPV = 'ali_transfersale_h.hpv';

    /**
     * the column name for the htotal field
     */
    const COL_HTOTAL = 'ali_transfersale_h.htotal';

    /**
     * the column name for the hdate field
     */
    const COL_HDATE = 'ali_transfersale_h.hdate';

    /**
     * the column name for the scheck field
     */
    const COL_SCHECK = 'ali_transfersale_h.scheck';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_transfersale_h.checkportal';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_transfersale_h.rcode';

    /**
     * the column name for the bmcauto field
     */
    const COL_BMCAUTO = 'ali_transfersale_h.bmcauto';

    /**
     * the column name for the transtype field
     */
    const COL_TRANSTYPE = 'ali_transfersale_h.transtype';

    /**
     * the column name for the paytype field
     */
    const COL_PAYTYPE = 'ali_transfersale_h.paytype';

    /**
     * the column name for the sendtype field
     */
    const COL_SENDTYPE = 'ali_transfersale_h.sendtype';

    /**
     * the column name for the credittype field
     */
    const COL_CREDITTYPE = 'ali_transfersale_h.credittype';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_transfersale_h.paydate';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_transfersale_h.bprice';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_transfersale_h.locationbase';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_transfersale_h.mbase';

    /**
     * the column name for the cname field
     */
    const COL_CNAME = 'ali_transfersale_h.cname';

    /**
     * the column name for the cmobile field
     */
    const COL_CMOBILE = 'ali_transfersale_h.cmobile';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_transfersale_h.crate';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sano1', 'Sadate', 'Sctime', 'InvCode', 'InvRef', 'Mcode', 'NameF', 'NameT', 'Total', 'TotPv', 'TotBv', 'TotFv', 'TotWeight', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtoption', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkinternet', 'Chkdiscount', 'Chkother', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Ewallet', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtinternet', 'Txtdiscount', 'Txtother', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioninternet', 'Optiondiscount', 'Optionother', 'Discount', 'Print', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'PayType', 'Hcancel', 'Caddress', 'Cdistrictid', 'Camphurid', 'Cprovinceid', 'Czip', 'Sender', 'SenderDate', 'Receive', 'ReceiveDate', 'Asend', 'AtoType', 'AtoId', 'Online', 'Hpv', 'Htotal', 'Hdate', 'Scheck', 'Checkportal', 'Rcode', 'Bmcauto', 'Transtype', 'Paytype', 'Sendtype', 'Credittype', 'Paydate', 'Bprice', 'Locationbase', 'Mbase', 'Cname', 'Cmobile', 'Crate', ),
        self::TYPE_CAMELNAME     => array('sano', 'sano1', 'sadate', 'sctime', 'invCode', 'invRef', 'mcode', 'nameF', 'nameT', 'total', 'totPv', 'totBv', 'totFv', 'totWeight', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtoption', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkinternet', 'chkdiscount', 'chkother', 'txtcash', 'txtfuture', 'txttransfer', 'ewallet', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtinternet', 'txtdiscount', 'txtother', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioninternet', 'optiondiscount', 'optionother', 'discount', 'print', 'ewalletBefore', 'ewalletAfter', 'ipay', 'payType', 'hcancel', 'caddress', 'cdistrictid', 'camphurid', 'cprovinceid', 'czip', 'sender', 'senderDate', 'receive', 'receiveDate', 'asend', 'atoType', 'atoId', 'online', 'hpv', 'htotal', 'hdate', 'scheck', 'checkportal', 'rcode', 'bmcauto', 'transtype', 'paytype', 'sendtype', 'credittype', 'paydate', 'bprice', 'locationbase', 'mbase', 'cname', 'cmobile', 'crate', ),
        self::TYPE_COLNAME       => array(AliTransfersaleHTableMap::COL_SANO, AliTransfersaleHTableMap::COL_SANO1, AliTransfersaleHTableMap::COL_SADATE, AliTransfersaleHTableMap::COL_SCTIME, AliTransfersaleHTableMap::COL_INV_CODE, AliTransfersaleHTableMap::COL_INV_REF, AliTransfersaleHTableMap::COL_MCODE, AliTransfersaleHTableMap::COL_NAME_F, AliTransfersaleHTableMap::COL_NAME_T, AliTransfersaleHTableMap::COL_TOTAL, AliTransfersaleHTableMap::COL_TOT_PV, AliTransfersaleHTableMap::COL_TOT_BV, AliTransfersaleHTableMap::COL_TOT_FV, AliTransfersaleHTableMap::COL_TOT_WEIGHT, AliTransfersaleHTableMap::COL_USERCODE, AliTransfersaleHTableMap::COL_REMARK, AliTransfersaleHTableMap::COL_TRNF, AliTransfersaleHTableMap::COL_ID, AliTransfersaleHTableMap::COL_SA_TYPE, AliTransfersaleHTableMap::COL_UID, AliTransfersaleHTableMap::COL_LID, AliTransfersaleHTableMap::COL_DL, AliTransfersaleHTableMap::COL_CANCEL, AliTransfersaleHTableMap::COL_SEND, AliTransfersaleHTableMap::COL_TXTOPTION, AliTransfersaleHTableMap::COL_CHKCASH, AliTransfersaleHTableMap::COL_CHKFUTURE, AliTransfersaleHTableMap::COL_CHKTRANSFER, AliTransfersaleHTableMap::COL_CHKCREDIT1, AliTransfersaleHTableMap::COL_CHKCREDIT2, AliTransfersaleHTableMap::COL_CHKCREDIT3, AliTransfersaleHTableMap::COL_CHKINTERNET, AliTransfersaleHTableMap::COL_CHKDISCOUNT, AliTransfersaleHTableMap::COL_CHKOTHER, AliTransfersaleHTableMap::COL_TXTCASH, AliTransfersaleHTableMap::COL_TXTFUTURE, AliTransfersaleHTableMap::COL_TXTTRANSFER, AliTransfersaleHTableMap::COL_EWALLET, AliTransfersaleHTableMap::COL_TXTCREDIT1, AliTransfersaleHTableMap::COL_TXTCREDIT2, AliTransfersaleHTableMap::COL_TXTCREDIT3, AliTransfersaleHTableMap::COL_TXTINTERNET, AliTransfersaleHTableMap::COL_TXTDISCOUNT, AliTransfersaleHTableMap::COL_TXTOTHER, AliTransfersaleHTableMap::COL_OPTIONCASH, AliTransfersaleHTableMap::COL_OPTIONFUTURE, AliTransfersaleHTableMap::COL_OPTIONTRANSFER, AliTransfersaleHTableMap::COL_OPTIONCREDIT1, AliTransfersaleHTableMap::COL_OPTIONCREDIT2, AliTransfersaleHTableMap::COL_OPTIONCREDIT3, AliTransfersaleHTableMap::COL_OPTIONINTERNET, AliTransfersaleHTableMap::COL_OPTIONDISCOUNT, AliTransfersaleHTableMap::COL_OPTIONOTHER, AliTransfersaleHTableMap::COL_DISCOUNT, AliTransfersaleHTableMap::COL_PRINT, AliTransfersaleHTableMap::COL_EWALLET_BEFORE, AliTransfersaleHTableMap::COL_EWALLET_AFTER, AliTransfersaleHTableMap::COL_IPAY, AliTransfersaleHTableMap::COL_PAY_TYPE, AliTransfersaleHTableMap::COL_HCANCEL, AliTransfersaleHTableMap::COL_CADDRESS, AliTransfersaleHTableMap::COL_CDISTRICTID, AliTransfersaleHTableMap::COL_CAMPHURID, AliTransfersaleHTableMap::COL_CPROVINCEID, AliTransfersaleHTableMap::COL_CZIP, AliTransfersaleHTableMap::COL_SENDER, AliTransfersaleHTableMap::COL_SENDER_DATE, AliTransfersaleHTableMap::COL_RECEIVE, AliTransfersaleHTableMap::COL_RECEIVE_DATE, AliTransfersaleHTableMap::COL_ASEND, AliTransfersaleHTableMap::COL_ATO_TYPE, AliTransfersaleHTableMap::COL_ATO_ID, AliTransfersaleHTableMap::COL_ONLINE, AliTransfersaleHTableMap::COL_HPV, AliTransfersaleHTableMap::COL_HTOTAL, AliTransfersaleHTableMap::COL_HDATE, AliTransfersaleHTableMap::COL_SCHECK, AliTransfersaleHTableMap::COL_CHECKPORTAL, AliTransfersaleHTableMap::COL_RCODE, AliTransfersaleHTableMap::COL_BMCAUTO, AliTransfersaleHTableMap::COL_TRANSTYPE, AliTransfersaleHTableMap::COL_PAYTYPE, AliTransfersaleHTableMap::COL_SENDTYPE, AliTransfersaleHTableMap::COL_CREDITTYPE, AliTransfersaleHTableMap::COL_PAYDATE, AliTransfersaleHTableMap::COL_BPRICE, AliTransfersaleHTableMap::COL_LOCATIONBASE, AliTransfersaleHTableMap::COL_MBASE, AliTransfersaleHTableMap::COL_CNAME, AliTransfersaleHTableMap::COL_CMOBILE, AliTransfersaleHTableMap::COL_CRATE, ),
        self::TYPE_FIELDNAME     => array('sano', 'sano1', 'sadate', 'sctime', 'inv_code', 'inv_ref', 'mcode', 'name_f', 'name_t', 'total', 'tot_pv', 'tot_bv', 'tot_fv', 'tot_weight', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtoption', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkInternet', 'chkDiscount', 'chkOther', 'txtCash', 'txtFuture', 'txtTransfer', 'ewallet', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtInternet', 'txtDiscount', 'txtOther', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionInternet', 'optionDiscount', 'optionOther', 'discount', 'print', 'ewallet_before', 'ewallet_after', 'ipay', 'pay_type', 'hcancel', 'caddress', 'cdistrictId', 'camphurId', 'cprovinceId', 'czip', 'sender', 'sender_date', 'receive', 'receive_date', 'asend', 'ato_type', 'ato_id', 'online', 'hpv', 'htotal', 'hdate', 'scheck', 'checkportal', 'rcode', 'bmcauto', 'transtype', 'paytype', 'sendtype', 'credittype', 'paydate', 'bprice', 'locationbase', 'mbase', 'cname', 'cmobile', 'crate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sano1' => 1, 'Sadate' => 2, 'Sctime' => 3, 'InvCode' => 4, 'InvRef' => 5, 'Mcode' => 6, 'NameF' => 7, 'NameT' => 8, 'Total' => 9, 'TotPv' => 10, 'TotBv' => 11, 'TotFv' => 12, 'TotWeight' => 13, 'Usercode' => 14, 'Remark' => 15, 'Trnf' => 16, 'Id' => 17, 'SaType' => 18, 'Uid' => 19, 'Lid' => 20, 'Dl' => 21, 'Cancel' => 22, 'Send' => 23, 'Txtoption' => 24, 'Chkcash' => 25, 'Chkfuture' => 26, 'Chktransfer' => 27, 'Chkcredit1' => 28, 'Chkcredit2' => 29, 'Chkcredit3' => 30, 'Chkinternet' => 31, 'Chkdiscount' => 32, 'Chkother' => 33, 'Txtcash' => 34, 'Txtfuture' => 35, 'Txttransfer' => 36, 'Ewallet' => 37, 'Txtcredit1' => 38, 'Txtcredit2' => 39, 'Txtcredit3' => 40, 'Txtinternet' => 41, 'Txtdiscount' => 42, 'Txtother' => 43, 'Optioncash' => 44, 'Optionfuture' => 45, 'Optiontransfer' => 46, 'Optioncredit1' => 47, 'Optioncredit2' => 48, 'Optioncredit3' => 49, 'Optioninternet' => 50, 'Optiondiscount' => 51, 'Optionother' => 52, 'Discount' => 53, 'Print' => 54, 'EwalletBefore' => 55, 'EwalletAfter' => 56, 'Ipay' => 57, 'PayType' => 58, 'Hcancel' => 59, 'Caddress' => 60, 'Cdistrictid' => 61, 'Camphurid' => 62, 'Cprovinceid' => 63, 'Czip' => 64, 'Sender' => 65, 'SenderDate' => 66, 'Receive' => 67, 'ReceiveDate' => 68, 'Asend' => 69, 'AtoType' => 70, 'AtoId' => 71, 'Online' => 72, 'Hpv' => 73, 'Htotal' => 74, 'Hdate' => 75, 'Scheck' => 76, 'Checkportal' => 77, 'Rcode' => 78, 'Bmcauto' => 79, 'Transtype' => 80, 'Paytype' => 81, 'Sendtype' => 82, 'Credittype' => 83, 'Paydate' => 84, 'Bprice' => 85, 'Locationbase' => 86, 'Mbase' => 87, 'Cname' => 88, 'Cmobile' => 89, 'Crate' => 90, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'sctime' => 3, 'invCode' => 4, 'invRef' => 5, 'mcode' => 6, 'nameF' => 7, 'nameT' => 8, 'total' => 9, 'totPv' => 10, 'totBv' => 11, 'totFv' => 12, 'totWeight' => 13, 'usercode' => 14, 'remark' => 15, 'trnf' => 16, 'id' => 17, 'saType' => 18, 'uid' => 19, 'lid' => 20, 'dl' => 21, 'cancel' => 22, 'send' => 23, 'txtoption' => 24, 'chkcash' => 25, 'chkfuture' => 26, 'chktransfer' => 27, 'chkcredit1' => 28, 'chkcredit2' => 29, 'chkcredit3' => 30, 'chkinternet' => 31, 'chkdiscount' => 32, 'chkother' => 33, 'txtcash' => 34, 'txtfuture' => 35, 'txttransfer' => 36, 'ewallet' => 37, 'txtcredit1' => 38, 'txtcredit2' => 39, 'txtcredit3' => 40, 'txtinternet' => 41, 'txtdiscount' => 42, 'txtother' => 43, 'optioncash' => 44, 'optionfuture' => 45, 'optiontransfer' => 46, 'optioncredit1' => 47, 'optioncredit2' => 48, 'optioncredit3' => 49, 'optioninternet' => 50, 'optiondiscount' => 51, 'optionother' => 52, 'discount' => 53, 'print' => 54, 'ewalletBefore' => 55, 'ewalletAfter' => 56, 'ipay' => 57, 'payType' => 58, 'hcancel' => 59, 'caddress' => 60, 'cdistrictid' => 61, 'camphurid' => 62, 'cprovinceid' => 63, 'czip' => 64, 'sender' => 65, 'senderDate' => 66, 'receive' => 67, 'receiveDate' => 68, 'asend' => 69, 'atoType' => 70, 'atoId' => 71, 'online' => 72, 'hpv' => 73, 'htotal' => 74, 'hdate' => 75, 'scheck' => 76, 'checkportal' => 77, 'rcode' => 78, 'bmcauto' => 79, 'transtype' => 80, 'paytype' => 81, 'sendtype' => 82, 'credittype' => 83, 'paydate' => 84, 'bprice' => 85, 'locationbase' => 86, 'mbase' => 87, 'cname' => 88, 'cmobile' => 89, 'crate' => 90, ),
        self::TYPE_COLNAME       => array(AliTransfersaleHTableMap::COL_SANO => 0, AliTransfersaleHTableMap::COL_SANO1 => 1, AliTransfersaleHTableMap::COL_SADATE => 2, AliTransfersaleHTableMap::COL_SCTIME => 3, AliTransfersaleHTableMap::COL_INV_CODE => 4, AliTransfersaleHTableMap::COL_INV_REF => 5, AliTransfersaleHTableMap::COL_MCODE => 6, AliTransfersaleHTableMap::COL_NAME_F => 7, AliTransfersaleHTableMap::COL_NAME_T => 8, AliTransfersaleHTableMap::COL_TOTAL => 9, AliTransfersaleHTableMap::COL_TOT_PV => 10, AliTransfersaleHTableMap::COL_TOT_BV => 11, AliTransfersaleHTableMap::COL_TOT_FV => 12, AliTransfersaleHTableMap::COL_TOT_WEIGHT => 13, AliTransfersaleHTableMap::COL_USERCODE => 14, AliTransfersaleHTableMap::COL_REMARK => 15, AliTransfersaleHTableMap::COL_TRNF => 16, AliTransfersaleHTableMap::COL_ID => 17, AliTransfersaleHTableMap::COL_SA_TYPE => 18, AliTransfersaleHTableMap::COL_UID => 19, AliTransfersaleHTableMap::COL_LID => 20, AliTransfersaleHTableMap::COL_DL => 21, AliTransfersaleHTableMap::COL_CANCEL => 22, AliTransfersaleHTableMap::COL_SEND => 23, AliTransfersaleHTableMap::COL_TXTOPTION => 24, AliTransfersaleHTableMap::COL_CHKCASH => 25, AliTransfersaleHTableMap::COL_CHKFUTURE => 26, AliTransfersaleHTableMap::COL_CHKTRANSFER => 27, AliTransfersaleHTableMap::COL_CHKCREDIT1 => 28, AliTransfersaleHTableMap::COL_CHKCREDIT2 => 29, AliTransfersaleHTableMap::COL_CHKCREDIT3 => 30, AliTransfersaleHTableMap::COL_CHKINTERNET => 31, AliTransfersaleHTableMap::COL_CHKDISCOUNT => 32, AliTransfersaleHTableMap::COL_CHKOTHER => 33, AliTransfersaleHTableMap::COL_TXTCASH => 34, AliTransfersaleHTableMap::COL_TXTFUTURE => 35, AliTransfersaleHTableMap::COL_TXTTRANSFER => 36, AliTransfersaleHTableMap::COL_EWALLET => 37, AliTransfersaleHTableMap::COL_TXTCREDIT1 => 38, AliTransfersaleHTableMap::COL_TXTCREDIT2 => 39, AliTransfersaleHTableMap::COL_TXTCREDIT3 => 40, AliTransfersaleHTableMap::COL_TXTINTERNET => 41, AliTransfersaleHTableMap::COL_TXTDISCOUNT => 42, AliTransfersaleHTableMap::COL_TXTOTHER => 43, AliTransfersaleHTableMap::COL_OPTIONCASH => 44, AliTransfersaleHTableMap::COL_OPTIONFUTURE => 45, AliTransfersaleHTableMap::COL_OPTIONTRANSFER => 46, AliTransfersaleHTableMap::COL_OPTIONCREDIT1 => 47, AliTransfersaleHTableMap::COL_OPTIONCREDIT2 => 48, AliTransfersaleHTableMap::COL_OPTIONCREDIT3 => 49, AliTransfersaleHTableMap::COL_OPTIONINTERNET => 50, AliTransfersaleHTableMap::COL_OPTIONDISCOUNT => 51, AliTransfersaleHTableMap::COL_OPTIONOTHER => 52, AliTransfersaleHTableMap::COL_DISCOUNT => 53, AliTransfersaleHTableMap::COL_PRINT => 54, AliTransfersaleHTableMap::COL_EWALLET_BEFORE => 55, AliTransfersaleHTableMap::COL_EWALLET_AFTER => 56, AliTransfersaleHTableMap::COL_IPAY => 57, AliTransfersaleHTableMap::COL_PAY_TYPE => 58, AliTransfersaleHTableMap::COL_HCANCEL => 59, AliTransfersaleHTableMap::COL_CADDRESS => 60, AliTransfersaleHTableMap::COL_CDISTRICTID => 61, AliTransfersaleHTableMap::COL_CAMPHURID => 62, AliTransfersaleHTableMap::COL_CPROVINCEID => 63, AliTransfersaleHTableMap::COL_CZIP => 64, AliTransfersaleHTableMap::COL_SENDER => 65, AliTransfersaleHTableMap::COL_SENDER_DATE => 66, AliTransfersaleHTableMap::COL_RECEIVE => 67, AliTransfersaleHTableMap::COL_RECEIVE_DATE => 68, AliTransfersaleHTableMap::COL_ASEND => 69, AliTransfersaleHTableMap::COL_ATO_TYPE => 70, AliTransfersaleHTableMap::COL_ATO_ID => 71, AliTransfersaleHTableMap::COL_ONLINE => 72, AliTransfersaleHTableMap::COL_HPV => 73, AliTransfersaleHTableMap::COL_HTOTAL => 74, AliTransfersaleHTableMap::COL_HDATE => 75, AliTransfersaleHTableMap::COL_SCHECK => 76, AliTransfersaleHTableMap::COL_CHECKPORTAL => 77, AliTransfersaleHTableMap::COL_RCODE => 78, AliTransfersaleHTableMap::COL_BMCAUTO => 79, AliTransfersaleHTableMap::COL_TRANSTYPE => 80, AliTransfersaleHTableMap::COL_PAYTYPE => 81, AliTransfersaleHTableMap::COL_SENDTYPE => 82, AliTransfersaleHTableMap::COL_CREDITTYPE => 83, AliTransfersaleHTableMap::COL_PAYDATE => 84, AliTransfersaleHTableMap::COL_BPRICE => 85, AliTransfersaleHTableMap::COL_LOCATIONBASE => 86, AliTransfersaleHTableMap::COL_MBASE => 87, AliTransfersaleHTableMap::COL_CNAME => 88, AliTransfersaleHTableMap::COL_CMOBILE => 89, AliTransfersaleHTableMap::COL_CRATE => 90, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'sctime' => 3, 'inv_code' => 4, 'inv_ref' => 5, 'mcode' => 6, 'name_f' => 7, 'name_t' => 8, 'total' => 9, 'tot_pv' => 10, 'tot_bv' => 11, 'tot_fv' => 12, 'tot_weight' => 13, 'usercode' => 14, 'remark' => 15, 'trnf' => 16, 'id' => 17, 'sa_type' => 18, 'uid' => 19, 'lid' => 20, 'dl' => 21, 'cancel' => 22, 'send' => 23, 'txtoption' => 24, 'chkCash' => 25, 'chkFuture' => 26, 'chkTransfer' => 27, 'chkCredit1' => 28, 'chkCredit2' => 29, 'chkCredit3' => 30, 'chkInternet' => 31, 'chkDiscount' => 32, 'chkOther' => 33, 'txtCash' => 34, 'txtFuture' => 35, 'txtTransfer' => 36, 'ewallet' => 37, 'txtCredit1' => 38, 'txtCredit2' => 39, 'txtCredit3' => 40, 'txtInternet' => 41, 'txtDiscount' => 42, 'txtOther' => 43, 'optionCash' => 44, 'optionFuture' => 45, 'optionTransfer' => 46, 'optionCredit1' => 47, 'optionCredit2' => 48, 'optionCredit3' => 49, 'optionInternet' => 50, 'optionDiscount' => 51, 'optionOther' => 52, 'discount' => 53, 'print' => 54, 'ewallet_before' => 55, 'ewallet_after' => 56, 'ipay' => 57, 'pay_type' => 58, 'hcancel' => 59, 'caddress' => 60, 'cdistrictId' => 61, 'camphurId' => 62, 'cprovinceId' => 63, 'czip' => 64, 'sender' => 65, 'sender_date' => 66, 'receive' => 67, 'receive_date' => 68, 'asend' => 69, 'ato_type' => 70, 'ato_id' => 71, 'online' => 72, 'hpv' => 73, 'htotal' => 74, 'hdate' => 75, 'scheck' => 76, 'checkportal' => 77, 'rcode' => 78, 'bmcauto' => 79, 'transtype' => 80, 'paytype' => 81, 'sendtype' => 82, 'credittype' => 83, 'paydate' => 84, 'bprice' => 85, 'locationbase' => 86, 'mbase' => 87, 'cname' => 88, 'cmobile' => 89, 'crate' => 90, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, )
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
        $this->setName('ali_transfersale_h');
        $this->setPhpName('AliTransfersaleH');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTransfersaleH');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('sano1', 'Sano1', 'BIGINT', true, 22, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('sctime', 'Sctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_bv', 'TotBv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_fv', 'TotFv', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_weight', 'TotWeight', 'DECIMAL', true, 15, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 3, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 40, null);
        $this->addColumn('trnf', 'Trnf', 'INTEGER', false, null, 0);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sa_type', 'SaType', 'CHAR', true, 2, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('lid', 'Lid', 'VARCHAR', true, 255, null);
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
        $this->addColumn('discount', 'Discount', 'VARCHAR', true, 255, null);
        $this->addColumn('print', 'Print', 'INTEGER', true, null, null);
        $this->addColumn('ewallet_before', 'EwalletBefore', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_after', 'EwalletAfter', 'DECIMAL', true, 15, null);
        $this->addColumn('ipay', 'Ipay', 'VARCHAR', true, 255, null);
        $this->addColumn('pay_type', 'PayType', 'VARCHAR', true, 255, null);
        $this->addColumn('hcancel', 'Hcancel', 'INTEGER', true, null, null);
        $this->addColumn('caddress', 'Caddress', 'LONGVARCHAR', true, null, null);
        $this->addColumn('cdistrictId', 'Cdistrictid', 'VARCHAR', true, 255, null);
        $this->addColumn('camphurId', 'Camphurid', 'VARCHAR', true, 255, null);
        $this->addColumn('cprovinceId', 'Cprovinceid', 'VARCHAR', true, 255, null);
        $this->addColumn('czip', 'Czip', 'VARCHAR', true, 255, null);
        $this->addColumn('sender', 'Sender', 'INTEGER', true, null, null);
        $this->addColumn('sender_date', 'SenderDate', 'DATE', true, null, null);
        $this->addColumn('receive', 'Receive', 'INTEGER', true, null, null);
        $this->addColumn('receive_date', 'ReceiveDate', 'DATE', true, null, null);
        $this->addColumn('asend', 'Asend', 'INTEGER', true, null, null);
        $this->addColumn('ato_type', 'AtoType', 'INTEGER', true, null, null);
        $this->addColumn('ato_id', 'AtoId', 'INTEGER', true, null, null);
        $this->addColumn('online', 'Online', 'INTEGER', true, null, null);
        $this->addColumn('hpv', 'Hpv', 'DECIMAL', true, 15, null);
        $this->addColumn('htotal', 'Htotal', 'DECIMAL', true, 15, null);
        $this->addColumn('hdate', 'Hdate', 'DATE', true, null, null);
        $this->addColumn('scheck', 'Scheck', 'VARCHAR', true, 255, null);
        $this->addColumn('checkportal', 'Checkportal', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('bmcauto', 'Bmcauto', 'INTEGER', true, null, null);
        $this->addColumn('transtype', 'Transtype', 'INTEGER', true, null, null);
        $this->addColumn('paytype', 'Paytype', 'INTEGER', true, null, null);
        $this->addColumn('sendtype', 'Sendtype', 'INTEGER', true, null, null);
        $this->addColumn('credittype', 'Credittype', 'INTEGER', true, null, null);
        $this->addColumn('paydate', 'Paydate', 'TIMESTAMP', true, null, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('mbase', 'Mbase', 'VARCHAR', true, 255, null);
        $this->addColumn('cname', 'Cname', 'VARCHAR', true, 255, null);
        $this->addColumn('cmobile', 'Cmobile', 'VARCHAR', true, 255, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 17 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 17 + $offset
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
        return $withPrefix ? AliTransfersaleHTableMap::CLASS_DEFAULT : AliTransfersaleHTableMap::OM_CLASS;
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
     * @return array           (AliTransfersaleH object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTransfersaleHTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTransfersaleHTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTransfersaleHTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTransfersaleHTableMap::OM_CLASS;
            /** @var AliTransfersaleH $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTransfersaleHTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTransfersaleHTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTransfersaleHTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTransfersaleH $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTransfersaleHTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SANO);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SANO1);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TOT_WEIGHT);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_ID);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_UID);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_LID);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_DL);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SEND);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_PAY_TYPE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_HCANCEL);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CDISTRICTID);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CAMPHURID);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CPROVINCEID);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CZIP);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_ASEND);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_ATO_TYPE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_ATO_ID);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_ONLINE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_HPV);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_HTOTAL);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_HDATE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SCHECK);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_BMCAUTO);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_TRANSTYPE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_PAYTYPE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_SENDTYPE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CREDITTYPE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CNAME);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CMOBILE);
            $criteria->addSelectColumn(AliTransfersaleHTableMap::COL_CRATE);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sano1');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.sctime');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.tot_bv');
            $criteria->addSelectColumn($alias . '.tot_fv');
            $criteria->addSelectColumn($alias . '.tot_weight');
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
            $criteria->addSelectColumn($alias . '.print');
            $criteria->addSelectColumn($alias . '.ewallet_before');
            $criteria->addSelectColumn($alias . '.ewallet_after');
            $criteria->addSelectColumn($alias . '.ipay');
            $criteria->addSelectColumn($alias . '.pay_type');
            $criteria->addSelectColumn($alias . '.hcancel');
            $criteria->addSelectColumn($alias . '.caddress');
            $criteria->addSelectColumn($alias . '.cdistrictId');
            $criteria->addSelectColumn($alias . '.camphurId');
            $criteria->addSelectColumn($alias . '.cprovinceId');
            $criteria->addSelectColumn($alias . '.czip');
            $criteria->addSelectColumn($alias . '.sender');
            $criteria->addSelectColumn($alias . '.sender_date');
            $criteria->addSelectColumn($alias . '.receive');
            $criteria->addSelectColumn($alias . '.receive_date');
            $criteria->addSelectColumn($alias . '.asend');
            $criteria->addSelectColumn($alias . '.ato_type');
            $criteria->addSelectColumn($alias . '.ato_id');
            $criteria->addSelectColumn($alias . '.online');
            $criteria->addSelectColumn($alias . '.hpv');
            $criteria->addSelectColumn($alias . '.htotal');
            $criteria->addSelectColumn($alias . '.hdate');
            $criteria->addSelectColumn($alias . '.scheck');
            $criteria->addSelectColumn($alias . '.checkportal');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.bmcauto');
            $criteria->addSelectColumn($alias . '.transtype');
            $criteria->addSelectColumn($alias . '.paytype');
            $criteria->addSelectColumn($alias . '.sendtype');
            $criteria->addSelectColumn($alias . '.credittype');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.mbase');
            $criteria->addSelectColumn($alias . '.cname');
            $criteria->addSelectColumn($alias . '.cmobile');
            $criteria->addSelectColumn($alias . '.crate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTransfersaleHTableMap::DATABASE_NAME)->getTable(AliTransfersaleHTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTransfersaleHTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTransfersaleHTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTransfersaleHTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTransfersaleH or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTransfersaleH object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleHTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTransfersaleH) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTransfersaleHTableMap::DATABASE_NAME);
            $criteria->add(AliTransfersaleHTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliTransfersaleHQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTransfersaleHTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTransfersaleHTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_transfersale_h table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTransfersaleHQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTransfersaleH or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTransfersaleH object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleHTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTransfersaleH object
        }

        if ($criteria->containsKey(AliTransfersaleHTableMap::COL_ID) && $criteria->keyContainsValue(AliTransfersaleHTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTransfersaleHTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliTransfersaleHQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTransfersaleHTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTransfersaleHTableMap::buildTableMap();
