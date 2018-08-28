<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliAtoasaleh;
use CciOrm\CciOrm\AliAtoasalehQuery;
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
 * This class defines the structure of the 'ali_atoasaleh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliAtoasalehTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliAtoasalehTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_atoasaleh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliAtoasaleh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliAtoasaleh';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 103;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 103;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_atoasaleh.sano';

    /**
     * the column name for the pano field
     */
    const COL_PANO = 'ali_atoasaleh.pano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_atoasaleh.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_atoasaleh.sctime';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_atoasaleh.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_atoasaleh.inv_ref';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_atoasaleh.mcode';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_atoasaleh.sp_code';

    /**
     * the column name for the sp_pos field
     */
    const COL_SP_POS = 'ali_atoasaleh.sp_pos';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_atoasaleh.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_atoasaleh.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_atoasaleh.total';

    /**
     * the column name for the total_vat field
     */
    const COL_TOTAL_VAT = 'ali_atoasaleh.total_vat';

    /**
     * the column name for the total_net field
     */
    const COL_TOTAL_NET = 'ali_atoasaleh.total_net';

    /**
     * the column name for the total_invat field
     */
    const COL_TOTAL_INVAT = 'ali_atoasaleh.total_invat';

    /**
     * the column name for the total_exvat field
     */
    const COL_TOTAL_EXVAT = 'ali_atoasaleh.total_exvat';

    /**
     * the column name for the customer_total field
     */
    const COL_CUSTOMER_TOTAL = 'ali_atoasaleh.customer_total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_atoasaleh.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_atoasaleh.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_atoasaleh.tot_fv';

    /**
     * the column name for the tot_sppv field
     */
    const COL_TOT_SPPV = 'ali_atoasaleh.tot_sppv';

    /**
     * the column name for the tot_weight field
     */
    const COL_TOT_WEIGHT = 'ali_atoasaleh.tot_weight';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_atoasaleh.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_atoasaleh.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_atoasaleh.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_atoasaleh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_atoasaleh.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_atoasaleh.uid';

    /**
     * the column name for the uid_branch field
     */
    const COL_UID_BRANCH = 'ali_atoasaleh.uid_branch';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_atoasaleh.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_atoasaleh.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_atoasaleh.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_atoasaleh.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_atoasaleh.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_atoasaleh.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_atoasaleh.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_atoasaleh.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_atoasaleh.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_atoasaleh.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_atoasaleh.chkCredit3';

    /**
     * the column name for the chkCredit4 field
     */
    const COL_CHKCREDIT4 = 'ali_atoasaleh.chkCredit4';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_atoasaleh.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_atoasaleh.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_atoasaleh.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_atoasaleh.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_atoasaleh.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_atoasaleh.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_atoasaleh.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_atoasaleh.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_atoasaleh.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_atoasaleh.txtCredit3';

    /**
     * the column name for the txtCredit4 field
     */
    const COL_TXTCREDIT4 = 'ali_atoasaleh.txtCredit4';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_atoasaleh.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_atoasaleh.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_atoasaleh.txtOther';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_atoasaleh.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_atoasaleh.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_atoasaleh.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_atoasaleh.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_atoasaleh.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_atoasaleh.optionCredit3';

    /**
     * the column name for the optionCredit4 field
     */
    const COL_OPTIONCREDIT4 = 'ali_atoasaleh.optionCredit4';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_atoasaleh.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_atoasaleh.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_atoasaleh.optionOther';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_atoasaleh.discount';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_atoasaleh.print';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_atoasaleh.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_atoasaleh.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_atoasaleh.ipay';

    /**
     * the column name for the pay_type field
     */
    const COL_PAY_TYPE = 'ali_atoasaleh.pay_type';

    /**
     * the column name for the hcancel field
     */
    const COL_HCANCEL = 'ali_atoasaleh.hcancel';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'ali_atoasaleh.caddress';

    /**
     * the column name for the cdistrictId field
     */
    const COL_CDISTRICTID = 'ali_atoasaleh.cdistrictId';

    /**
     * the column name for the camphurId field
     */
    const COL_CAMPHURID = 'ali_atoasaleh.camphurId';

    /**
     * the column name for the cprovinceId field
     */
    const COL_CPROVINCEID = 'ali_atoasaleh.cprovinceId';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'ali_atoasaleh.czip';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_atoasaleh.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_atoasaleh.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_atoasaleh.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_atoasaleh.receive_date';

    /**
     * the column name for the asend field
     */
    const COL_ASEND = 'ali_atoasaleh.asend';

    /**
     * the column name for the ato_type field
     */
    const COL_ATO_TYPE = 'ali_atoasaleh.ato_type';

    /**
     * the column name for the ato_id field
     */
    const COL_ATO_ID = 'ali_atoasaleh.ato_id';

    /**
     * the column name for the online field
     */
    const COL_ONLINE = 'ali_atoasaleh.online';

    /**
     * the column name for the hpv field
     */
    const COL_HPV = 'ali_atoasaleh.hpv';

    /**
     * the column name for the htotal field
     */
    const COL_HTOTAL = 'ali_atoasaleh.htotal';

    /**
     * the column name for the hdate field
     */
    const COL_HDATE = 'ali_atoasaleh.hdate';

    /**
     * the column name for the scheck field
     */
    const COL_SCHECK = 'ali_atoasaleh.scheck';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_atoasaleh.checkportal';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_atoasaleh.rcode';

    /**
     * the column name for the bmcauto field
     */
    const COL_BMCAUTO = 'ali_atoasaleh.bmcauto';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_atoasaleh.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_atoasaleh.uid_cancel';

    /**
     * the column name for the cname field
     */
    const COL_CNAME = 'ali_atoasaleh.cname';

    /**
     * the column name for the cmobile field
     */
    const COL_CMOBILE = 'ali_atoasaleh.cmobile';

    /**
     * the column name for the uid_sender field
     */
    const COL_UID_SENDER = 'ali_atoasaleh.uid_sender';

    /**
     * the column name for the uid_receive field
     */
    const COL_UID_RECEIVE = 'ali_atoasaleh.uid_receive';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_atoasaleh.mbase';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_atoasaleh.bprice';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_atoasaleh.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_atoasaleh.crate';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_atoasaleh.status';

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
        self::TYPE_PHPNAME       => array('Sano', 'Pano', 'Sadate', 'Sctime', 'InvCode', 'InvRef', 'Mcode', 'SpCode', 'SpPos', 'NameF', 'NameT', 'Total', 'TotalVat', 'TotalNet', 'TotalInvat', 'TotalExvat', 'CustomerTotal', 'TotPv', 'TotBv', 'TotFv', 'TotSppv', 'TotWeight', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'UidBranch', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtoption', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkcredit4', 'Chkinternet', 'Chkdiscount', 'Chkother', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Ewallet', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtcredit4', 'Txtinternet', 'Txtdiscount', 'Txtother', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioncredit4', 'Optioninternet', 'Optiondiscount', 'Optionother', 'Discount', 'Print', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'PayType', 'Hcancel', 'Caddress', 'Cdistrictid', 'Camphurid', 'Cprovinceid', 'Czip', 'Sender', 'SenderDate', 'Receive', 'ReceiveDate', 'Asend', 'AtoType', 'AtoId', 'Online', 'Hpv', 'Htotal', 'Hdate', 'Scheck', 'Checkportal', 'Rcode', 'Bmcauto', 'CancelDate', 'UidCancel', 'Cname', 'Cmobile', 'UidSender', 'UidReceive', 'Mbase', 'Bprice', 'Locationbase', 'Crate', 'Status', ),
        self::TYPE_CAMELNAME     => array('sano', 'pano', 'sadate', 'sctime', 'invCode', 'invRef', 'mcode', 'spCode', 'spPos', 'nameF', 'nameT', 'total', 'totalVat', 'totalNet', 'totalInvat', 'totalExvat', 'customerTotal', 'totPv', 'totBv', 'totFv', 'totSppv', 'totWeight', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'uidBranch', 'lid', 'dl', 'cancel', 'send', 'txtoption', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkcredit4', 'chkinternet', 'chkdiscount', 'chkother', 'txtcash', 'txtfuture', 'txttransfer', 'ewallet', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtcredit4', 'txtinternet', 'txtdiscount', 'txtother', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioncredit4', 'optioninternet', 'optiondiscount', 'optionother', 'discount', 'print', 'ewalletBefore', 'ewalletAfter', 'ipay', 'payType', 'hcancel', 'caddress', 'cdistrictid', 'camphurid', 'cprovinceid', 'czip', 'sender', 'senderDate', 'receive', 'receiveDate', 'asend', 'atoType', 'atoId', 'online', 'hpv', 'htotal', 'hdate', 'scheck', 'checkportal', 'rcode', 'bmcauto', 'cancelDate', 'uidCancel', 'cname', 'cmobile', 'uidSender', 'uidReceive', 'mbase', 'bprice', 'locationbase', 'crate', 'status', ),
        self::TYPE_COLNAME       => array(AliAtoasalehTableMap::COL_SANO, AliAtoasalehTableMap::COL_PANO, AliAtoasalehTableMap::COL_SADATE, AliAtoasalehTableMap::COL_SCTIME, AliAtoasalehTableMap::COL_INV_CODE, AliAtoasalehTableMap::COL_INV_REF, AliAtoasalehTableMap::COL_MCODE, AliAtoasalehTableMap::COL_SP_CODE, AliAtoasalehTableMap::COL_SP_POS, AliAtoasalehTableMap::COL_NAME_F, AliAtoasalehTableMap::COL_NAME_T, AliAtoasalehTableMap::COL_TOTAL, AliAtoasalehTableMap::COL_TOTAL_VAT, AliAtoasalehTableMap::COL_TOTAL_NET, AliAtoasalehTableMap::COL_TOTAL_INVAT, AliAtoasalehTableMap::COL_TOTAL_EXVAT, AliAtoasalehTableMap::COL_CUSTOMER_TOTAL, AliAtoasalehTableMap::COL_TOT_PV, AliAtoasalehTableMap::COL_TOT_BV, AliAtoasalehTableMap::COL_TOT_FV, AliAtoasalehTableMap::COL_TOT_SPPV, AliAtoasalehTableMap::COL_TOT_WEIGHT, AliAtoasalehTableMap::COL_USERCODE, AliAtoasalehTableMap::COL_REMARK, AliAtoasalehTableMap::COL_TRNF, AliAtoasalehTableMap::COL_ID, AliAtoasalehTableMap::COL_SA_TYPE, AliAtoasalehTableMap::COL_UID, AliAtoasalehTableMap::COL_UID_BRANCH, AliAtoasalehTableMap::COL_LID, AliAtoasalehTableMap::COL_DL, AliAtoasalehTableMap::COL_CANCEL, AliAtoasalehTableMap::COL_SEND, AliAtoasalehTableMap::COL_TXTOPTION, AliAtoasalehTableMap::COL_CHKCASH, AliAtoasalehTableMap::COL_CHKFUTURE, AliAtoasalehTableMap::COL_CHKTRANSFER, AliAtoasalehTableMap::COL_CHKCREDIT1, AliAtoasalehTableMap::COL_CHKCREDIT2, AliAtoasalehTableMap::COL_CHKCREDIT3, AliAtoasalehTableMap::COL_CHKCREDIT4, AliAtoasalehTableMap::COL_CHKINTERNET, AliAtoasalehTableMap::COL_CHKDISCOUNT, AliAtoasalehTableMap::COL_CHKOTHER, AliAtoasalehTableMap::COL_TXTCASH, AliAtoasalehTableMap::COL_TXTFUTURE, AliAtoasalehTableMap::COL_TXTTRANSFER, AliAtoasalehTableMap::COL_EWALLET, AliAtoasalehTableMap::COL_TXTCREDIT1, AliAtoasalehTableMap::COL_TXTCREDIT2, AliAtoasalehTableMap::COL_TXTCREDIT3, AliAtoasalehTableMap::COL_TXTCREDIT4, AliAtoasalehTableMap::COL_TXTINTERNET, AliAtoasalehTableMap::COL_TXTDISCOUNT, AliAtoasalehTableMap::COL_TXTOTHER, AliAtoasalehTableMap::COL_OPTIONCASH, AliAtoasalehTableMap::COL_OPTIONFUTURE, AliAtoasalehTableMap::COL_OPTIONTRANSFER, AliAtoasalehTableMap::COL_OPTIONCREDIT1, AliAtoasalehTableMap::COL_OPTIONCREDIT2, AliAtoasalehTableMap::COL_OPTIONCREDIT3, AliAtoasalehTableMap::COL_OPTIONCREDIT4, AliAtoasalehTableMap::COL_OPTIONINTERNET, AliAtoasalehTableMap::COL_OPTIONDISCOUNT, AliAtoasalehTableMap::COL_OPTIONOTHER, AliAtoasalehTableMap::COL_DISCOUNT, AliAtoasalehTableMap::COL_PRINT, AliAtoasalehTableMap::COL_EWALLET_BEFORE, AliAtoasalehTableMap::COL_EWALLET_AFTER, AliAtoasalehTableMap::COL_IPAY, AliAtoasalehTableMap::COL_PAY_TYPE, AliAtoasalehTableMap::COL_HCANCEL, AliAtoasalehTableMap::COL_CADDRESS, AliAtoasalehTableMap::COL_CDISTRICTID, AliAtoasalehTableMap::COL_CAMPHURID, AliAtoasalehTableMap::COL_CPROVINCEID, AliAtoasalehTableMap::COL_CZIP, AliAtoasalehTableMap::COL_SENDER, AliAtoasalehTableMap::COL_SENDER_DATE, AliAtoasalehTableMap::COL_RECEIVE, AliAtoasalehTableMap::COL_RECEIVE_DATE, AliAtoasalehTableMap::COL_ASEND, AliAtoasalehTableMap::COL_ATO_TYPE, AliAtoasalehTableMap::COL_ATO_ID, AliAtoasalehTableMap::COL_ONLINE, AliAtoasalehTableMap::COL_HPV, AliAtoasalehTableMap::COL_HTOTAL, AliAtoasalehTableMap::COL_HDATE, AliAtoasalehTableMap::COL_SCHECK, AliAtoasalehTableMap::COL_CHECKPORTAL, AliAtoasalehTableMap::COL_RCODE, AliAtoasalehTableMap::COL_BMCAUTO, AliAtoasalehTableMap::COL_CANCEL_DATE, AliAtoasalehTableMap::COL_UID_CANCEL, AliAtoasalehTableMap::COL_CNAME, AliAtoasalehTableMap::COL_CMOBILE, AliAtoasalehTableMap::COL_UID_SENDER, AliAtoasalehTableMap::COL_UID_RECEIVE, AliAtoasalehTableMap::COL_MBASE, AliAtoasalehTableMap::COL_BPRICE, AliAtoasalehTableMap::COL_LOCATIONBASE, AliAtoasalehTableMap::COL_CRATE, AliAtoasalehTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('sano', 'pano', 'sadate', 'sctime', 'inv_code', 'inv_ref', 'mcode', 'sp_code', 'sp_pos', 'name_f', 'name_t', 'total', 'total_vat', 'total_net', 'total_invat', 'total_exvat', 'customer_total', 'tot_pv', 'tot_bv', 'tot_fv', 'tot_sppv', 'tot_weight', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'uid_branch', 'lid', 'dl', 'cancel', 'send', 'txtoption', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkCredit4', 'chkInternet', 'chkDiscount', 'chkOther', 'txtCash', 'txtFuture', 'txtTransfer', 'ewallet', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtCredit4', 'txtInternet', 'txtDiscount', 'txtOther', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionCredit4', 'optionInternet', 'optionDiscount', 'optionOther', 'discount', 'print', 'ewallet_before', 'ewallet_after', 'ipay', 'pay_type', 'hcancel', 'caddress', 'cdistrictId', 'camphurId', 'cprovinceId', 'czip', 'sender', 'sender_date', 'receive', 'receive_date', 'asend', 'ato_type', 'ato_id', 'online', 'hpv', 'htotal', 'hdate', 'scheck', 'checkportal', 'rcode', 'bmcauto', 'cancel_date', 'uid_cancel', 'cname', 'cmobile', 'uid_sender', 'uid_receive', 'mbase', 'bprice', 'locationbase', 'crate', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Pano' => 1, 'Sadate' => 2, 'Sctime' => 3, 'InvCode' => 4, 'InvRef' => 5, 'Mcode' => 6, 'SpCode' => 7, 'SpPos' => 8, 'NameF' => 9, 'NameT' => 10, 'Total' => 11, 'TotalVat' => 12, 'TotalNet' => 13, 'TotalInvat' => 14, 'TotalExvat' => 15, 'CustomerTotal' => 16, 'TotPv' => 17, 'TotBv' => 18, 'TotFv' => 19, 'TotSppv' => 20, 'TotWeight' => 21, 'Usercode' => 22, 'Remark' => 23, 'Trnf' => 24, 'Id' => 25, 'SaType' => 26, 'Uid' => 27, 'UidBranch' => 28, 'Lid' => 29, 'Dl' => 30, 'Cancel' => 31, 'Send' => 32, 'Txtoption' => 33, 'Chkcash' => 34, 'Chkfuture' => 35, 'Chktransfer' => 36, 'Chkcredit1' => 37, 'Chkcredit2' => 38, 'Chkcredit3' => 39, 'Chkcredit4' => 40, 'Chkinternet' => 41, 'Chkdiscount' => 42, 'Chkother' => 43, 'Txtcash' => 44, 'Txtfuture' => 45, 'Txttransfer' => 46, 'Ewallet' => 47, 'Txtcredit1' => 48, 'Txtcredit2' => 49, 'Txtcredit3' => 50, 'Txtcredit4' => 51, 'Txtinternet' => 52, 'Txtdiscount' => 53, 'Txtother' => 54, 'Optioncash' => 55, 'Optionfuture' => 56, 'Optiontransfer' => 57, 'Optioncredit1' => 58, 'Optioncredit2' => 59, 'Optioncredit3' => 60, 'Optioncredit4' => 61, 'Optioninternet' => 62, 'Optiondiscount' => 63, 'Optionother' => 64, 'Discount' => 65, 'Print' => 66, 'EwalletBefore' => 67, 'EwalletAfter' => 68, 'Ipay' => 69, 'PayType' => 70, 'Hcancel' => 71, 'Caddress' => 72, 'Cdistrictid' => 73, 'Camphurid' => 74, 'Cprovinceid' => 75, 'Czip' => 76, 'Sender' => 77, 'SenderDate' => 78, 'Receive' => 79, 'ReceiveDate' => 80, 'Asend' => 81, 'AtoType' => 82, 'AtoId' => 83, 'Online' => 84, 'Hpv' => 85, 'Htotal' => 86, 'Hdate' => 87, 'Scheck' => 88, 'Checkportal' => 89, 'Rcode' => 90, 'Bmcauto' => 91, 'CancelDate' => 92, 'UidCancel' => 93, 'Cname' => 94, 'Cmobile' => 95, 'UidSender' => 96, 'UidReceive' => 97, 'Mbase' => 98, 'Bprice' => 99, 'Locationbase' => 100, 'Crate' => 101, 'Status' => 102, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'pano' => 1, 'sadate' => 2, 'sctime' => 3, 'invCode' => 4, 'invRef' => 5, 'mcode' => 6, 'spCode' => 7, 'spPos' => 8, 'nameF' => 9, 'nameT' => 10, 'total' => 11, 'totalVat' => 12, 'totalNet' => 13, 'totalInvat' => 14, 'totalExvat' => 15, 'customerTotal' => 16, 'totPv' => 17, 'totBv' => 18, 'totFv' => 19, 'totSppv' => 20, 'totWeight' => 21, 'usercode' => 22, 'remark' => 23, 'trnf' => 24, 'id' => 25, 'saType' => 26, 'uid' => 27, 'uidBranch' => 28, 'lid' => 29, 'dl' => 30, 'cancel' => 31, 'send' => 32, 'txtoption' => 33, 'chkcash' => 34, 'chkfuture' => 35, 'chktransfer' => 36, 'chkcredit1' => 37, 'chkcredit2' => 38, 'chkcredit3' => 39, 'chkcredit4' => 40, 'chkinternet' => 41, 'chkdiscount' => 42, 'chkother' => 43, 'txtcash' => 44, 'txtfuture' => 45, 'txttransfer' => 46, 'ewallet' => 47, 'txtcredit1' => 48, 'txtcredit2' => 49, 'txtcredit3' => 50, 'txtcredit4' => 51, 'txtinternet' => 52, 'txtdiscount' => 53, 'txtother' => 54, 'optioncash' => 55, 'optionfuture' => 56, 'optiontransfer' => 57, 'optioncredit1' => 58, 'optioncredit2' => 59, 'optioncredit3' => 60, 'optioncredit4' => 61, 'optioninternet' => 62, 'optiondiscount' => 63, 'optionother' => 64, 'discount' => 65, 'print' => 66, 'ewalletBefore' => 67, 'ewalletAfter' => 68, 'ipay' => 69, 'payType' => 70, 'hcancel' => 71, 'caddress' => 72, 'cdistrictid' => 73, 'camphurid' => 74, 'cprovinceid' => 75, 'czip' => 76, 'sender' => 77, 'senderDate' => 78, 'receive' => 79, 'receiveDate' => 80, 'asend' => 81, 'atoType' => 82, 'atoId' => 83, 'online' => 84, 'hpv' => 85, 'htotal' => 86, 'hdate' => 87, 'scheck' => 88, 'checkportal' => 89, 'rcode' => 90, 'bmcauto' => 91, 'cancelDate' => 92, 'uidCancel' => 93, 'cname' => 94, 'cmobile' => 95, 'uidSender' => 96, 'uidReceive' => 97, 'mbase' => 98, 'bprice' => 99, 'locationbase' => 100, 'crate' => 101, 'status' => 102, ),
        self::TYPE_COLNAME       => array(AliAtoasalehTableMap::COL_SANO => 0, AliAtoasalehTableMap::COL_PANO => 1, AliAtoasalehTableMap::COL_SADATE => 2, AliAtoasalehTableMap::COL_SCTIME => 3, AliAtoasalehTableMap::COL_INV_CODE => 4, AliAtoasalehTableMap::COL_INV_REF => 5, AliAtoasalehTableMap::COL_MCODE => 6, AliAtoasalehTableMap::COL_SP_CODE => 7, AliAtoasalehTableMap::COL_SP_POS => 8, AliAtoasalehTableMap::COL_NAME_F => 9, AliAtoasalehTableMap::COL_NAME_T => 10, AliAtoasalehTableMap::COL_TOTAL => 11, AliAtoasalehTableMap::COL_TOTAL_VAT => 12, AliAtoasalehTableMap::COL_TOTAL_NET => 13, AliAtoasalehTableMap::COL_TOTAL_INVAT => 14, AliAtoasalehTableMap::COL_TOTAL_EXVAT => 15, AliAtoasalehTableMap::COL_CUSTOMER_TOTAL => 16, AliAtoasalehTableMap::COL_TOT_PV => 17, AliAtoasalehTableMap::COL_TOT_BV => 18, AliAtoasalehTableMap::COL_TOT_FV => 19, AliAtoasalehTableMap::COL_TOT_SPPV => 20, AliAtoasalehTableMap::COL_TOT_WEIGHT => 21, AliAtoasalehTableMap::COL_USERCODE => 22, AliAtoasalehTableMap::COL_REMARK => 23, AliAtoasalehTableMap::COL_TRNF => 24, AliAtoasalehTableMap::COL_ID => 25, AliAtoasalehTableMap::COL_SA_TYPE => 26, AliAtoasalehTableMap::COL_UID => 27, AliAtoasalehTableMap::COL_UID_BRANCH => 28, AliAtoasalehTableMap::COL_LID => 29, AliAtoasalehTableMap::COL_DL => 30, AliAtoasalehTableMap::COL_CANCEL => 31, AliAtoasalehTableMap::COL_SEND => 32, AliAtoasalehTableMap::COL_TXTOPTION => 33, AliAtoasalehTableMap::COL_CHKCASH => 34, AliAtoasalehTableMap::COL_CHKFUTURE => 35, AliAtoasalehTableMap::COL_CHKTRANSFER => 36, AliAtoasalehTableMap::COL_CHKCREDIT1 => 37, AliAtoasalehTableMap::COL_CHKCREDIT2 => 38, AliAtoasalehTableMap::COL_CHKCREDIT3 => 39, AliAtoasalehTableMap::COL_CHKCREDIT4 => 40, AliAtoasalehTableMap::COL_CHKINTERNET => 41, AliAtoasalehTableMap::COL_CHKDISCOUNT => 42, AliAtoasalehTableMap::COL_CHKOTHER => 43, AliAtoasalehTableMap::COL_TXTCASH => 44, AliAtoasalehTableMap::COL_TXTFUTURE => 45, AliAtoasalehTableMap::COL_TXTTRANSFER => 46, AliAtoasalehTableMap::COL_EWALLET => 47, AliAtoasalehTableMap::COL_TXTCREDIT1 => 48, AliAtoasalehTableMap::COL_TXTCREDIT2 => 49, AliAtoasalehTableMap::COL_TXTCREDIT3 => 50, AliAtoasalehTableMap::COL_TXTCREDIT4 => 51, AliAtoasalehTableMap::COL_TXTINTERNET => 52, AliAtoasalehTableMap::COL_TXTDISCOUNT => 53, AliAtoasalehTableMap::COL_TXTOTHER => 54, AliAtoasalehTableMap::COL_OPTIONCASH => 55, AliAtoasalehTableMap::COL_OPTIONFUTURE => 56, AliAtoasalehTableMap::COL_OPTIONTRANSFER => 57, AliAtoasalehTableMap::COL_OPTIONCREDIT1 => 58, AliAtoasalehTableMap::COL_OPTIONCREDIT2 => 59, AliAtoasalehTableMap::COL_OPTIONCREDIT3 => 60, AliAtoasalehTableMap::COL_OPTIONCREDIT4 => 61, AliAtoasalehTableMap::COL_OPTIONINTERNET => 62, AliAtoasalehTableMap::COL_OPTIONDISCOUNT => 63, AliAtoasalehTableMap::COL_OPTIONOTHER => 64, AliAtoasalehTableMap::COL_DISCOUNT => 65, AliAtoasalehTableMap::COL_PRINT => 66, AliAtoasalehTableMap::COL_EWALLET_BEFORE => 67, AliAtoasalehTableMap::COL_EWALLET_AFTER => 68, AliAtoasalehTableMap::COL_IPAY => 69, AliAtoasalehTableMap::COL_PAY_TYPE => 70, AliAtoasalehTableMap::COL_HCANCEL => 71, AliAtoasalehTableMap::COL_CADDRESS => 72, AliAtoasalehTableMap::COL_CDISTRICTID => 73, AliAtoasalehTableMap::COL_CAMPHURID => 74, AliAtoasalehTableMap::COL_CPROVINCEID => 75, AliAtoasalehTableMap::COL_CZIP => 76, AliAtoasalehTableMap::COL_SENDER => 77, AliAtoasalehTableMap::COL_SENDER_DATE => 78, AliAtoasalehTableMap::COL_RECEIVE => 79, AliAtoasalehTableMap::COL_RECEIVE_DATE => 80, AliAtoasalehTableMap::COL_ASEND => 81, AliAtoasalehTableMap::COL_ATO_TYPE => 82, AliAtoasalehTableMap::COL_ATO_ID => 83, AliAtoasalehTableMap::COL_ONLINE => 84, AliAtoasalehTableMap::COL_HPV => 85, AliAtoasalehTableMap::COL_HTOTAL => 86, AliAtoasalehTableMap::COL_HDATE => 87, AliAtoasalehTableMap::COL_SCHECK => 88, AliAtoasalehTableMap::COL_CHECKPORTAL => 89, AliAtoasalehTableMap::COL_RCODE => 90, AliAtoasalehTableMap::COL_BMCAUTO => 91, AliAtoasalehTableMap::COL_CANCEL_DATE => 92, AliAtoasalehTableMap::COL_UID_CANCEL => 93, AliAtoasalehTableMap::COL_CNAME => 94, AliAtoasalehTableMap::COL_CMOBILE => 95, AliAtoasalehTableMap::COL_UID_SENDER => 96, AliAtoasalehTableMap::COL_UID_RECEIVE => 97, AliAtoasalehTableMap::COL_MBASE => 98, AliAtoasalehTableMap::COL_BPRICE => 99, AliAtoasalehTableMap::COL_LOCATIONBASE => 100, AliAtoasalehTableMap::COL_CRATE => 101, AliAtoasalehTableMap::COL_STATUS => 102, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'pano' => 1, 'sadate' => 2, 'sctime' => 3, 'inv_code' => 4, 'inv_ref' => 5, 'mcode' => 6, 'sp_code' => 7, 'sp_pos' => 8, 'name_f' => 9, 'name_t' => 10, 'total' => 11, 'total_vat' => 12, 'total_net' => 13, 'total_invat' => 14, 'total_exvat' => 15, 'customer_total' => 16, 'tot_pv' => 17, 'tot_bv' => 18, 'tot_fv' => 19, 'tot_sppv' => 20, 'tot_weight' => 21, 'usercode' => 22, 'remark' => 23, 'trnf' => 24, 'id' => 25, 'sa_type' => 26, 'uid' => 27, 'uid_branch' => 28, 'lid' => 29, 'dl' => 30, 'cancel' => 31, 'send' => 32, 'txtoption' => 33, 'chkCash' => 34, 'chkFuture' => 35, 'chkTransfer' => 36, 'chkCredit1' => 37, 'chkCredit2' => 38, 'chkCredit3' => 39, 'chkCredit4' => 40, 'chkInternet' => 41, 'chkDiscount' => 42, 'chkOther' => 43, 'txtCash' => 44, 'txtFuture' => 45, 'txtTransfer' => 46, 'ewallet' => 47, 'txtCredit1' => 48, 'txtCredit2' => 49, 'txtCredit3' => 50, 'txtCredit4' => 51, 'txtInternet' => 52, 'txtDiscount' => 53, 'txtOther' => 54, 'optionCash' => 55, 'optionFuture' => 56, 'optionTransfer' => 57, 'optionCredit1' => 58, 'optionCredit2' => 59, 'optionCredit3' => 60, 'optionCredit4' => 61, 'optionInternet' => 62, 'optionDiscount' => 63, 'optionOther' => 64, 'discount' => 65, 'print' => 66, 'ewallet_before' => 67, 'ewallet_after' => 68, 'ipay' => 69, 'pay_type' => 70, 'hcancel' => 71, 'caddress' => 72, 'cdistrictId' => 73, 'camphurId' => 74, 'cprovinceId' => 75, 'czip' => 76, 'sender' => 77, 'sender_date' => 78, 'receive' => 79, 'receive_date' => 80, 'asend' => 81, 'ato_type' => 82, 'ato_id' => 83, 'online' => 84, 'hpv' => 85, 'htotal' => 86, 'hdate' => 87, 'scheck' => 88, 'checkportal' => 89, 'rcode' => 90, 'bmcauto' => 91, 'cancel_date' => 92, 'uid_cancel' => 93, 'cname' => 94, 'cmobile' => 95, 'uid_sender' => 96, 'uid_receive' => 97, 'mbase' => 98, 'bprice' => 99, 'locationbase' => 100, 'crate' => 101, 'status' => 102, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, )
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
        $this->setName('ali_atoasaleh');
        $this->setPhpName('AliAtoasaleh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliAtoasaleh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('pano', 'Pano', 'VARCHAR', true, 255, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('sctime', 'Sctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_pos', 'SpPos', 'VARCHAR', true, 10, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('total_vat', 'TotalVat', 'DECIMAL', true, 15, null);
        $this->addColumn('total_net', 'TotalNet', 'DECIMAL', true, 15, null);
        $this->addColumn('total_invat', 'TotalInvat', 'DECIMAL', true, 15, null);
        $this->addColumn('total_exvat', 'TotalExvat', 'DECIMAL', true, 15, null);
        $this->addColumn('customer_total', 'CustomerTotal', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_bv', 'TotBv', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_fv', 'TotFv', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_sppv', 'TotSppv', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_weight', 'TotWeight', 'DECIMAL', true, 15, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 3, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 40, null);
        $this->addColumn('trnf', 'Trnf', 'INTEGER', false, null, 0);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sa_type', 'SaType', 'CHAR', true, 2, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('uid_branch', 'UidBranch', 'VARCHAR', true, 20, null);
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
        $this->addColumn('chkCredit4', 'Chkcredit4', 'VARCHAR', true, 255, null);
        $this->addColumn('chkInternet', 'Chkinternet', 'VARCHAR', true, 255, null);
        $this->addColumn('chkDiscount', 'Chkdiscount', 'VARCHAR', true, 255, null);
        $this->addColumn('chkOther', 'Chkother', 'VARCHAR', true, 255, null);
        $this->addColumn('txtCash', 'Txtcash', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtFuture', 'Txtfuture', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtTransfer', 'Txttransfer', 'DECIMAL', true, 15, 0);
        $this->addColumn('ewallet', 'Ewallet', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtCredit1', 'Txtcredit1', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtCredit2', 'Txtcredit2', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtCredit3', 'Txtcredit3', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtCredit4', 'Txtcredit4', 'DECIMAL', true, 15, null);
        $this->addColumn('txtInternet', 'Txtinternet', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtDiscount', 'Txtdiscount', 'DECIMAL', true, 15, 0);
        $this->addColumn('txtOther', 'Txtother', 'DECIMAL', true, 15, 0);
        $this->addColumn('optionCash', 'Optioncash', 'VARCHAR', true, 255, null);
        $this->addColumn('optionFuture', 'Optionfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer', 'Optiontransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit1', 'Optioncredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit2', 'Optioncredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit3', 'Optioncredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit4', 'Optioncredit4', 'VARCHAR', true, 255, null);
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
        $this->addColumn('cancel_date', 'CancelDate', 'DATE', true, null, null);
        $this->addColumn('uid_cancel', 'UidCancel', 'VARCHAR', true, 255, null);
        $this->addColumn('cname', 'Cname', 'VARCHAR', true, 255, null);
        $this->addColumn('cmobile', 'Cmobile', 'VARCHAR', true, 255, null);
        $this->addColumn('uid_sender', 'UidSender', 'VARCHAR', true, 255, null);
        $this->addColumn('uid_receive', 'UidReceive', 'VARCHAR', true, 255, null);
        $this->addColumn('mbase', 'Mbase', 'VARCHAR', true, 255, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 25 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 25 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 25 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 25 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 25 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 25 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 25 + $offset
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
        return $withPrefix ? AliAtoasalehTableMap::CLASS_DEFAULT : AliAtoasalehTableMap::OM_CLASS;
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
     * @return array           (AliAtoasaleh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliAtoasalehTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliAtoasalehTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliAtoasalehTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliAtoasalehTableMap::OM_CLASS;
            /** @var AliAtoasaleh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliAtoasalehTableMap::addInstanceToPool($obj, $key);
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
            $key = AliAtoasalehTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliAtoasalehTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliAtoasaleh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliAtoasalehTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SANO);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_PANO);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SP_POS);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOTAL_VAT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOTAL_NET);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOTAL_INVAT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOTAL_EXVAT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CUSTOMER_TOTAL);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOT_SPPV);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TOT_WEIGHT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_ID);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_UID);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_UID_BRANCH);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_LID);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_DL);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SEND);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKCREDIT4);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTCREDIT4);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONCREDIT4);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_PAY_TYPE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_HCANCEL);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CDISTRICTID);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CAMPHURID);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CPROVINCEID);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CZIP);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_ASEND);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_ATO_TYPE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_ATO_ID);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_ONLINE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_HPV);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_HTOTAL);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_HDATE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_SCHECK);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_BMCAUTO);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CNAME);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CMOBILE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_UID_SENDER);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_UID_RECEIVE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliAtoasalehTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.pano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.sctime');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.sp_pos');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.total_vat');
            $criteria->addSelectColumn($alias . '.total_net');
            $criteria->addSelectColumn($alias . '.total_invat');
            $criteria->addSelectColumn($alias . '.total_exvat');
            $criteria->addSelectColumn($alias . '.customer_total');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.tot_bv');
            $criteria->addSelectColumn($alias . '.tot_fv');
            $criteria->addSelectColumn($alias . '.tot_sppv');
            $criteria->addSelectColumn($alias . '.tot_weight');
            $criteria->addSelectColumn($alias . '.usercode');
            $criteria->addSelectColumn($alias . '.remark');
            $criteria->addSelectColumn($alias . '.trnf');
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.uid_branch');
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
            $criteria->addSelectColumn($alias . '.chkCredit4');
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
            $criteria->addSelectColumn($alias . '.txtCredit4');
            $criteria->addSelectColumn($alias . '.txtInternet');
            $criteria->addSelectColumn($alias . '.txtDiscount');
            $criteria->addSelectColumn($alias . '.txtOther');
            $criteria->addSelectColumn($alias . '.optionCash');
            $criteria->addSelectColumn($alias . '.optionFuture');
            $criteria->addSelectColumn($alias . '.optionTransfer');
            $criteria->addSelectColumn($alias . '.optionCredit1');
            $criteria->addSelectColumn($alias . '.optionCredit2');
            $criteria->addSelectColumn($alias . '.optionCredit3');
            $criteria->addSelectColumn($alias . '.optionCredit4');
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
            $criteria->addSelectColumn($alias . '.cancel_date');
            $criteria->addSelectColumn($alias . '.uid_cancel');
            $criteria->addSelectColumn($alias . '.cname');
            $criteria->addSelectColumn($alias . '.cmobile');
            $criteria->addSelectColumn($alias . '.uid_sender');
            $criteria->addSelectColumn($alias . '.uid_receive');
            $criteria->addSelectColumn($alias . '.mbase');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliAtoasalehTableMap::DATABASE_NAME)->getTable(AliAtoasalehTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliAtoasalehTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliAtoasalehTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliAtoasalehTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliAtoasaleh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliAtoasaleh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAtoasalehTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliAtoasaleh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliAtoasalehTableMap::DATABASE_NAME);
            $criteria->add(AliAtoasalehTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliAtoasalehQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliAtoasalehTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliAtoasalehTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_atoasaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliAtoasalehQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliAtoasaleh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliAtoasaleh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAtoasalehTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliAtoasaleh object
        }

        if ($criteria->containsKey(AliAtoasalehTableMap::COL_ID) && $criteria->keyContainsValue(AliAtoasalehTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliAtoasalehTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliAtoasalehQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliAtoasalehTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliAtoasalehTableMap::buildTableMap();
