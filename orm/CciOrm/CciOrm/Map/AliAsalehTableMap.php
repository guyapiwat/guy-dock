<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliAsaleh;
use CciOrm\CciOrm\AliAsalehQuery;
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
 * This class defines the structure of the 'ali_asaleh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliAsalehTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliAsalehTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_asaleh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliAsaleh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliAsaleh';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 125;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 125;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_asaleh.sano';

    /**
     * the column name for the pano field
     */
    const COL_PANO = 'ali_asaleh.pano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_asaleh.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_asaleh.sctime';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_asaleh.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_asaleh.inv_ref';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_asaleh.mcode';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_asaleh.sp_code';

    /**
     * the column name for the sp_pos field
     */
    const COL_SP_POS = 'ali_asaleh.sp_pos';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_asaleh.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_asaleh.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_asaleh.total';

    /**
     * the column name for the total_vat field
     */
    const COL_TOTAL_VAT = 'ali_asaleh.total_vat';

    /**
     * the column name for the total_net field
     */
    const COL_TOTAL_NET = 'ali_asaleh.total_net';

    /**
     * the column name for the total_invat field
     */
    const COL_TOTAL_INVAT = 'ali_asaleh.total_invat';

    /**
     * the column name for the total_exvat field
     */
    const COL_TOTAL_EXVAT = 'ali_asaleh.total_exvat';

    /**
     * the column name for the customer_total field
     */
    const COL_CUSTOMER_TOTAL = 'ali_asaleh.customer_total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_asaleh.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_asaleh.tot_bv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_asaleh.tot_fv';

    /**
     * the column name for the tot_sppv field
     */
    const COL_TOT_SPPV = 'ali_asaleh.tot_sppv';

    /**
     * the column name for the tot_weight field
     */
    const COL_TOT_WEIGHT = 'ali_asaleh.tot_weight';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_asaleh.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_asaleh.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_asaleh.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_asaleh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_asaleh.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_asaleh.uid';

    /**
     * the column name for the uid_branch field
     */
    const COL_UID_BRANCH = 'ali_asaleh.uid_branch';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_asaleh.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_asaleh.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_asaleh.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_asaleh.send';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_asaleh.txtoption';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_asaleh.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_asaleh.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_asaleh.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_asaleh.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_asaleh.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_asaleh.chkCredit3';

    /**
     * the column name for the chkCredit4 field
     */
    const COL_CHKCREDIT4 = 'ali_asaleh.chkCredit4';

    /**
     * the column name for the chkInternet field
     */
    const COL_CHKINTERNET = 'ali_asaleh.chkInternet';

    /**
     * the column name for the chkDiscount field
     */
    const COL_CHKDISCOUNT = 'ali_asaleh.chkDiscount';

    /**
     * the column name for the chkOther field
     */
    const COL_CHKOTHER = 'ali_asaleh.chkOther';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_asaleh.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_asaleh.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_asaleh.txtTransfer';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_asaleh.ewallet';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_asaleh.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_asaleh.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_asaleh.txtCredit3';

    /**
     * the column name for the txtCredit4 field
     */
    const COL_TXTCREDIT4 = 'ali_asaleh.txtCredit4';

    /**
     * the column name for the txtInternet field
     */
    const COL_TXTINTERNET = 'ali_asaleh.txtInternet';

    /**
     * the column name for the txtDiscount field
     */
    const COL_TXTDISCOUNT = 'ali_asaleh.txtDiscount';

    /**
     * the column name for the txtOther field
     */
    const COL_TXTOTHER = 'ali_asaleh.txtOther';

    /**
     * the column name for the txtSending field
     */
    const COL_TXTSENDING = 'ali_asaleh.txtSending';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_asaleh.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_asaleh.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_asaleh.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_asaleh.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_asaleh.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_asaleh.optionCredit3';

    /**
     * the column name for the optionCredit4 field
     */
    const COL_OPTIONCREDIT4 = 'ali_asaleh.optionCredit4';

    /**
     * the column name for the optionInternet field
     */
    const COL_OPTIONINTERNET = 'ali_asaleh.optionInternet';

    /**
     * the column name for the optionDiscount field
     */
    const COL_OPTIONDISCOUNT = 'ali_asaleh.optionDiscount';

    /**
     * the column name for the optionOther field
     */
    const COL_OPTIONOTHER = 'ali_asaleh.optionOther';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_asaleh.discount';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_asaleh.print';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_asaleh.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_asaleh.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_asaleh.ipay';

    /**
     * the column name for the pay_type field
     */
    const COL_PAY_TYPE = 'ali_asaleh.pay_type';

    /**
     * the column name for the hcancel field
     */
    const COL_HCANCEL = 'ali_asaleh.hcancel';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'ali_asaleh.caddress';

    /**
     * the column name for the cdistrictId field
     */
    const COL_CDISTRICTID = 'ali_asaleh.cdistrictId';

    /**
     * the column name for the camphurId field
     */
    const COL_CAMPHURID = 'ali_asaleh.camphurId';

    /**
     * the column name for the cprovinceId field
     */
    const COL_CPROVINCEID = 'ali_asaleh.cprovinceId';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'ali_asaleh.czip';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_asaleh.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_asaleh.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_asaleh.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_asaleh.receive_date';

    /**
     * the column name for the asend field
     */
    const COL_ASEND = 'ali_asaleh.asend';

    /**
     * the column name for the ato_type field
     */
    const COL_ATO_TYPE = 'ali_asaleh.ato_type';

    /**
     * the column name for the ato_id field
     */
    const COL_ATO_ID = 'ali_asaleh.ato_id';

    /**
     * the column name for the online field
     */
    const COL_ONLINE = 'ali_asaleh.online';

    /**
     * the column name for the hpv field
     */
    const COL_HPV = 'ali_asaleh.hpv';

    /**
     * the column name for the htotal field
     */
    const COL_HTOTAL = 'ali_asaleh.htotal';

    /**
     * the column name for the hdate field
     */
    const COL_HDATE = 'ali_asaleh.hdate';

    /**
     * the column name for the scheck field
     */
    const COL_SCHECK = 'ali_asaleh.scheck';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_asaleh.checkportal';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_asaleh.rcode';

    /**
     * the column name for the bmcauto field
     */
    const COL_BMCAUTO = 'ali_asaleh.bmcauto';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_asaleh.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_asaleh.uid_cancel';

    /**
     * the column name for the cname field
     */
    const COL_CNAME = 'ali_asaleh.cname';

    /**
     * the column name for the cmobile field
     */
    const COL_CMOBILE = 'ali_asaleh.cmobile';

    /**
     * the column name for the uid_sender field
     */
    const COL_UID_SENDER = 'ali_asaleh.uid_sender';

    /**
     * the column name for the uid_receive field
     */
    const COL_UID_RECEIVE = 'ali_asaleh.uid_receive';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_asaleh.mbase';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_asaleh.bprice';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_asaleh.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_asaleh.crate';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_asaleh.status';

    /**
     * the column name for the ref field
     */
    const COL_REF = 'ali_asaleh.ref';

    /**
     * the column name for the selectCash field
     */
    const COL_SELECTCASH = 'ali_asaleh.selectCash';

    /**
     * the column name for the selectTransfer field
     */
    const COL_SELECTTRANSFER = 'ali_asaleh.selectTransfer';

    /**
     * the column name for the selectCredit1 field
     */
    const COL_SELECTCREDIT1 = 'ali_asaleh.selectCredit1';

    /**
     * the column name for the selectCredit2 field
     */
    const COL_SELECTCREDIT2 = 'ali_asaleh.selectCredit2';

    /**
     * the column name for the selectCredit3 field
     */
    const COL_SELECTCREDIT3 = 'ali_asaleh.selectCredit3';

    /**
     * the column name for the selectDiscount field
     */
    const COL_SELECTDISCOUNT = 'ali_asaleh.selectDiscount';

    /**
     * the column name for the selectInternet field
     */
    const COL_SELECTINTERNET = 'ali_asaleh.selectInternet';

    /**
     * the column name for the txtVoucher field
     */
    const COL_TXTVOUCHER = 'ali_asaleh.txtVoucher';

    /**
     * the column name for the optionVoucher field
     */
    const COL_OPTIONVOUCHER = 'ali_asaleh.optionVoucher';

    /**
     * the column name for the selectVoucher field
     */
    const COL_SELECTVOUCHER = 'ali_asaleh.selectVoucher';

    /**
     * the column name for the txtTransfer1 field
     */
    const COL_TXTTRANSFER1 = 'ali_asaleh.txtTransfer1';

    /**
     * the column name for the optionTransfer1 field
     */
    const COL_OPTIONTRANSFER1 = 'ali_asaleh.optionTransfer1';

    /**
     * the column name for the selectTransfer1 field
     */
    const COL_SELECTTRANSFER1 = 'ali_asaleh.selectTransfer1';

    /**
     * the column name for the txtTransfer2 field
     */
    const COL_TXTTRANSFER2 = 'ali_asaleh.txtTransfer2';

    /**
     * the column name for the optionTransfer2 field
     */
    const COL_OPTIONTRANSFER2 = 'ali_asaleh.optionTransfer2';

    /**
     * the column name for the selectTransfer2 field
     */
    const COL_SELECTTRANSFER2 = 'ali_asaleh.selectTransfer2';

    /**
     * the column name for the txtTransfer3 field
     */
    const COL_TXTTRANSFER3 = 'ali_asaleh.txtTransfer3';

    /**
     * the column name for the optionTransfer3 field
     */
    const COL_OPTIONTRANSFER3 = 'ali_asaleh.optionTransfer3';

    /**
     * the column name for the selectTransfer3 field
     */
    const COL_SELECTTRANSFER3 = 'ali_asaleh.selectTransfer3';

    /**
     * the column name for the status_package field
     */
    const COL_STATUS_PACKAGE = 'ali_asaleh.status_package';

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
        self::TYPE_PHPNAME       => array('Sano', 'Pano', 'Sadate', 'Sctime', 'InvCode', 'InvRef', 'Mcode', 'SpCode', 'SpPos', 'NameF', 'NameT', 'Total', 'TotalVat', 'TotalNet', 'TotalInvat', 'TotalExvat', 'CustomerTotal', 'TotPv', 'TotBv', 'TotFv', 'TotSppv', 'TotWeight', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'UidBranch', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtoption', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Chkcredit4', 'Chkinternet', 'Chkdiscount', 'Chkother', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Ewallet', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Txtcredit4', 'Txtinternet', 'Txtdiscount', 'Txtother', 'Txtsending', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Optioncredit4', 'Optioninternet', 'Optiondiscount', 'Optionother', 'Discount', 'Print', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'PayType', 'Hcancel', 'Caddress', 'Cdistrictid', 'Camphurid', 'Cprovinceid', 'Czip', 'Sender', 'SenderDate', 'Receive', 'ReceiveDate', 'Asend', 'AtoType', 'AtoId', 'Online', 'Hpv', 'Htotal', 'Hdate', 'Scheck', 'Checkportal', 'Rcode', 'Bmcauto', 'CancelDate', 'UidCancel', 'Cname', 'Cmobile', 'UidSender', 'UidReceive', 'Mbase', 'Bprice', 'Locationbase', 'Crate', 'Status', 'Ref', 'Selectcash', 'Selecttransfer', 'Selectcredit1', 'Selectcredit2', 'Selectcredit3', 'Selectdiscount', 'Selectinternet', 'Txtvoucher', 'Optionvoucher', 'Selectvoucher', 'Txttransfer1', 'Optiontransfer1', 'Selecttransfer1', 'Txttransfer2', 'Optiontransfer2', 'Selecttransfer2', 'Txttransfer3', 'Optiontransfer3', 'Selecttransfer3', 'StatusPackage', ),
        self::TYPE_CAMELNAME     => array('sano', 'pano', 'sadate', 'sctime', 'invCode', 'invRef', 'mcode', 'spCode', 'spPos', 'nameF', 'nameT', 'total', 'totalVat', 'totalNet', 'totalInvat', 'totalExvat', 'customerTotal', 'totPv', 'totBv', 'totFv', 'totSppv', 'totWeight', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'uidBranch', 'lid', 'dl', 'cancel', 'send', 'txtoption', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'chkcredit4', 'chkinternet', 'chkdiscount', 'chkother', 'txtcash', 'txtfuture', 'txttransfer', 'ewallet', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'txtcredit4', 'txtinternet', 'txtdiscount', 'txtother', 'txtsending', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'optioncredit4', 'optioninternet', 'optiondiscount', 'optionother', 'discount', 'print', 'ewalletBefore', 'ewalletAfter', 'ipay', 'payType', 'hcancel', 'caddress', 'cdistrictid', 'camphurid', 'cprovinceid', 'czip', 'sender', 'senderDate', 'receive', 'receiveDate', 'asend', 'atoType', 'atoId', 'online', 'hpv', 'htotal', 'hdate', 'scheck', 'checkportal', 'rcode', 'bmcauto', 'cancelDate', 'uidCancel', 'cname', 'cmobile', 'uidSender', 'uidReceive', 'mbase', 'bprice', 'locationbase', 'crate', 'status', 'ref', 'selectcash', 'selecttransfer', 'selectcredit1', 'selectcredit2', 'selectcredit3', 'selectdiscount', 'selectinternet', 'txtvoucher', 'optionvoucher', 'selectvoucher', 'txttransfer1', 'optiontransfer1', 'selecttransfer1', 'txttransfer2', 'optiontransfer2', 'selecttransfer2', 'txttransfer3', 'optiontransfer3', 'selecttransfer3', 'statusPackage', ),
        self::TYPE_COLNAME       => array(AliAsalehTableMap::COL_SANO, AliAsalehTableMap::COL_PANO, AliAsalehTableMap::COL_SADATE, AliAsalehTableMap::COL_SCTIME, AliAsalehTableMap::COL_INV_CODE, AliAsalehTableMap::COL_INV_REF, AliAsalehTableMap::COL_MCODE, AliAsalehTableMap::COL_SP_CODE, AliAsalehTableMap::COL_SP_POS, AliAsalehTableMap::COL_NAME_F, AliAsalehTableMap::COL_NAME_T, AliAsalehTableMap::COL_TOTAL, AliAsalehTableMap::COL_TOTAL_VAT, AliAsalehTableMap::COL_TOTAL_NET, AliAsalehTableMap::COL_TOTAL_INVAT, AliAsalehTableMap::COL_TOTAL_EXVAT, AliAsalehTableMap::COL_CUSTOMER_TOTAL, AliAsalehTableMap::COL_TOT_PV, AliAsalehTableMap::COL_TOT_BV, AliAsalehTableMap::COL_TOT_FV, AliAsalehTableMap::COL_TOT_SPPV, AliAsalehTableMap::COL_TOT_WEIGHT, AliAsalehTableMap::COL_USERCODE, AliAsalehTableMap::COL_REMARK, AliAsalehTableMap::COL_TRNF, AliAsalehTableMap::COL_ID, AliAsalehTableMap::COL_SA_TYPE, AliAsalehTableMap::COL_UID, AliAsalehTableMap::COL_UID_BRANCH, AliAsalehTableMap::COL_LID, AliAsalehTableMap::COL_DL, AliAsalehTableMap::COL_CANCEL, AliAsalehTableMap::COL_SEND, AliAsalehTableMap::COL_TXTOPTION, AliAsalehTableMap::COL_CHKCASH, AliAsalehTableMap::COL_CHKFUTURE, AliAsalehTableMap::COL_CHKTRANSFER, AliAsalehTableMap::COL_CHKCREDIT1, AliAsalehTableMap::COL_CHKCREDIT2, AliAsalehTableMap::COL_CHKCREDIT3, AliAsalehTableMap::COL_CHKCREDIT4, AliAsalehTableMap::COL_CHKINTERNET, AliAsalehTableMap::COL_CHKDISCOUNT, AliAsalehTableMap::COL_CHKOTHER, AliAsalehTableMap::COL_TXTCASH, AliAsalehTableMap::COL_TXTFUTURE, AliAsalehTableMap::COL_TXTTRANSFER, AliAsalehTableMap::COL_EWALLET, AliAsalehTableMap::COL_TXTCREDIT1, AliAsalehTableMap::COL_TXTCREDIT2, AliAsalehTableMap::COL_TXTCREDIT3, AliAsalehTableMap::COL_TXTCREDIT4, AliAsalehTableMap::COL_TXTINTERNET, AliAsalehTableMap::COL_TXTDISCOUNT, AliAsalehTableMap::COL_TXTOTHER, AliAsalehTableMap::COL_TXTSENDING, AliAsalehTableMap::COL_OPTIONCASH, AliAsalehTableMap::COL_OPTIONFUTURE, AliAsalehTableMap::COL_OPTIONTRANSFER, AliAsalehTableMap::COL_OPTIONCREDIT1, AliAsalehTableMap::COL_OPTIONCREDIT2, AliAsalehTableMap::COL_OPTIONCREDIT3, AliAsalehTableMap::COL_OPTIONCREDIT4, AliAsalehTableMap::COL_OPTIONINTERNET, AliAsalehTableMap::COL_OPTIONDISCOUNT, AliAsalehTableMap::COL_OPTIONOTHER, AliAsalehTableMap::COL_DISCOUNT, AliAsalehTableMap::COL_PRINT, AliAsalehTableMap::COL_EWALLET_BEFORE, AliAsalehTableMap::COL_EWALLET_AFTER, AliAsalehTableMap::COL_IPAY, AliAsalehTableMap::COL_PAY_TYPE, AliAsalehTableMap::COL_HCANCEL, AliAsalehTableMap::COL_CADDRESS, AliAsalehTableMap::COL_CDISTRICTID, AliAsalehTableMap::COL_CAMPHURID, AliAsalehTableMap::COL_CPROVINCEID, AliAsalehTableMap::COL_CZIP, AliAsalehTableMap::COL_SENDER, AliAsalehTableMap::COL_SENDER_DATE, AliAsalehTableMap::COL_RECEIVE, AliAsalehTableMap::COL_RECEIVE_DATE, AliAsalehTableMap::COL_ASEND, AliAsalehTableMap::COL_ATO_TYPE, AliAsalehTableMap::COL_ATO_ID, AliAsalehTableMap::COL_ONLINE, AliAsalehTableMap::COL_HPV, AliAsalehTableMap::COL_HTOTAL, AliAsalehTableMap::COL_HDATE, AliAsalehTableMap::COL_SCHECK, AliAsalehTableMap::COL_CHECKPORTAL, AliAsalehTableMap::COL_RCODE, AliAsalehTableMap::COL_BMCAUTO, AliAsalehTableMap::COL_CANCEL_DATE, AliAsalehTableMap::COL_UID_CANCEL, AliAsalehTableMap::COL_CNAME, AliAsalehTableMap::COL_CMOBILE, AliAsalehTableMap::COL_UID_SENDER, AliAsalehTableMap::COL_UID_RECEIVE, AliAsalehTableMap::COL_MBASE, AliAsalehTableMap::COL_BPRICE, AliAsalehTableMap::COL_LOCATIONBASE, AliAsalehTableMap::COL_CRATE, AliAsalehTableMap::COL_STATUS, AliAsalehTableMap::COL_REF, AliAsalehTableMap::COL_SELECTCASH, AliAsalehTableMap::COL_SELECTTRANSFER, AliAsalehTableMap::COL_SELECTCREDIT1, AliAsalehTableMap::COL_SELECTCREDIT2, AliAsalehTableMap::COL_SELECTCREDIT3, AliAsalehTableMap::COL_SELECTDISCOUNT, AliAsalehTableMap::COL_SELECTINTERNET, AliAsalehTableMap::COL_TXTVOUCHER, AliAsalehTableMap::COL_OPTIONVOUCHER, AliAsalehTableMap::COL_SELECTVOUCHER, AliAsalehTableMap::COL_TXTTRANSFER1, AliAsalehTableMap::COL_OPTIONTRANSFER1, AliAsalehTableMap::COL_SELECTTRANSFER1, AliAsalehTableMap::COL_TXTTRANSFER2, AliAsalehTableMap::COL_OPTIONTRANSFER2, AliAsalehTableMap::COL_SELECTTRANSFER2, AliAsalehTableMap::COL_TXTTRANSFER3, AliAsalehTableMap::COL_OPTIONTRANSFER3, AliAsalehTableMap::COL_SELECTTRANSFER3, AliAsalehTableMap::COL_STATUS_PACKAGE, ),
        self::TYPE_FIELDNAME     => array('sano', 'pano', 'sadate', 'sctime', 'inv_code', 'inv_ref', 'mcode', 'sp_code', 'sp_pos', 'name_f', 'name_t', 'total', 'total_vat', 'total_net', 'total_invat', 'total_exvat', 'customer_total', 'tot_pv', 'tot_bv', 'tot_fv', 'tot_sppv', 'tot_weight', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'uid_branch', 'lid', 'dl', 'cancel', 'send', 'txtoption', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'chkCredit4', 'chkInternet', 'chkDiscount', 'chkOther', 'txtCash', 'txtFuture', 'txtTransfer', 'ewallet', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'txtCredit4', 'txtInternet', 'txtDiscount', 'txtOther', 'txtSending', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'optionCredit4', 'optionInternet', 'optionDiscount', 'optionOther', 'discount', 'print', 'ewallet_before', 'ewallet_after', 'ipay', 'pay_type', 'hcancel', 'caddress', 'cdistrictId', 'camphurId', 'cprovinceId', 'czip', 'sender', 'sender_date', 'receive', 'receive_date', 'asend', 'ato_type', 'ato_id', 'online', 'hpv', 'htotal', 'hdate', 'scheck', 'checkportal', 'rcode', 'bmcauto', 'cancel_date', 'uid_cancel', 'cname', 'cmobile', 'uid_sender', 'uid_receive', 'mbase', 'bprice', 'locationbase', 'crate', 'status', 'ref', 'selectCash', 'selectTransfer', 'selectCredit1', 'selectCredit2', 'selectCredit3', 'selectDiscount', 'selectInternet', 'txtVoucher', 'optionVoucher', 'selectVoucher', 'txtTransfer1', 'optionTransfer1', 'selectTransfer1', 'txtTransfer2', 'optionTransfer2', 'selectTransfer2', 'txtTransfer3', 'optionTransfer3', 'selectTransfer3', 'status_package', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Pano' => 1, 'Sadate' => 2, 'Sctime' => 3, 'InvCode' => 4, 'InvRef' => 5, 'Mcode' => 6, 'SpCode' => 7, 'SpPos' => 8, 'NameF' => 9, 'NameT' => 10, 'Total' => 11, 'TotalVat' => 12, 'TotalNet' => 13, 'TotalInvat' => 14, 'TotalExvat' => 15, 'CustomerTotal' => 16, 'TotPv' => 17, 'TotBv' => 18, 'TotFv' => 19, 'TotSppv' => 20, 'TotWeight' => 21, 'Usercode' => 22, 'Remark' => 23, 'Trnf' => 24, 'Id' => 25, 'SaType' => 26, 'Uid' => 27, 'UidBranch' => 28, 'Lid' => 29, 'Dl' => 30, 'Cancel' => 31, 'Send' => 32, 'Txtoption' => 33, 'Chkcash' => 34, 'Chkfuture' => 35, 'Chktransfer' => 36, 'Chkcredit1' => 37, 'Chkcredit2' => 38, 'Chkcredit3' => 39, 'Chkcredit4' => 40, 'Chkinternet' => 41, 'Chkdiscount' => 42, 'Chkother' => 43, 'Txtcash' => 44, 'Txtfuture' => 45, 'Txttransfer' => 46, 'Ewallet' => 47, 'Txtcredit1' => 48, 'Txtcredit2' => 49, 'Txtcredit3' => 50, 'Txtcredit4' => 51, 'Txtinternet' => 52, 'Txtdiscount' => 53, 'Txtother' => 54, 'Txtsending' => 55, 'Optioncash' => 56, 'Optionfuture' => 57, 'Optiontransfer' => 58, 'Optioncredit1' => 59, 'Optioncredit2' => 60, 'Optioncredit3' => 61, 'Optioncredit4' => 62, 'Optioninternet' => 63, 'Optiondiscount' => 64, 'Optionother' => 65, 'Discount' => 66, 'Print' => 67, 'EwalletBefore' => 68, 'EwalletAfter' => 69, 'Ipay' => 70, 'PayType' => 71, 'Hcancel' => 72, 'Caddress' => 73, 'Cdistrictid' => 74, 'Camphurid' => 75, 'Cprovinceid' => 76, 'Czip' => 77, 'Sender' => 78, 'SenderDate' => 79, 'Receive' => 80, 'ReceiveDate' => 81, 'Asend' => 82, 'AtoType' => 83, 'AtoId' => 84, 'Online' => 85, 'Hpv' => 86, 'Htotal' => 87, 'Hdate' => 88, 'Scheck' => 89, 'Checkportal' => 90, 'Rcode' => 91, 'Bmcauto' => 92, 'CancelDate' => 93, 'UidCancel' => 94, 'Cname' => 95, 'Cmobile' => 96, 'UidSender' => 97, 'UidReceive' => 98, 'Mbase' => 99, 'Bprice' => 100, 'Locationbase' => 101, 'Crate' => 102, 'Status' => 103, 'Ref' => 104, 'Selectcash' => 105, 'Selecttransfer' => 106, 'Selectcredit1' => 107, 'Selectcredit2' => 108, 'Selectcredit3' => 109, 'Selectdiscount' => 110, 'Selectinternet' => 111, 'Txtvoucher' => 112, 'Optionvoucher' => 113, 'Selectvoucher' => 114, 'Txttransfer1' => 115, 'Optiontransfer1' => 116, 'Selecttransfer1' => 117, 'Txttransfer2' => 118, 'Optiontransfer2' => 119, 'Selecttransfer2' => 120, 'Txttransfer3' => 121, 'Optiontransfer3' => 122, 'Selecttransfer3' => 123, 'StatusPackage' => 124, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'pano' => 1, 'sadate' => 2, 'sctime' => 3, 'invCode' => 4, 'invRef' => 5, 'mcode' => 6, 'spCode' => 7, 'spPos' => 8, 'nameF' => 9, 'nameT' => 10, 'total' => 11, 'totalVat' => 12, 'totalNet' => 13, 'totalInvat' => 14, 'totalExvat' => 15, 'customerTotal' => 16, 'totPv' => 17, 'totBv' => 18, 'totFv' => 19, 'totSppv' => 20, 'totWeight' => 21, 'usercode' => 22, 'remark' => 23, 'trnf' => 24, 'id' => 25, 'saType' => 26, 'uid' => 27, 'uidBranch' => 28, 'lid' => 29, 'dl' => 30, 'cancel' => 31, 'send' => 32, 'txtoption' => 33, 'chkcash' => 34, 'chkfuture' => 35, 'chktransfer' => 36, 'chkcredit1' => 37, 'chkcredit2' => 38, 'chkcredit3' => 39, 'chkcredit4' => 40, 'chkinternet' => 41, 'chkdiscount' => 42, 'chkother' => 43, 'txtcash' => 44, 'txtfuture' => 45, 'txttransfer' => 46, 'ewallet' => 47, 'txtcredit1' => 48, 'txtcredit2' => 49, 'txtcredit3' => 50, 'txtcredit4' => 51, 'txtinternet' => 52, 'txtdiscount' => 53, 'txtother' => 54, 'txtsending' => 55, 'optioncash' => 56, 'optionfuture' => 57, 'optiontransfer' => 58, 'optioncredit1' => 59, 'optioncredit2' => 60, 'optioncredit3' => 61, 'optioncredit4' => 62, 'optioninternet' => 63, 'optiondiscount' => 64, 'optionother' => 65, 'discount' => 66, 'print' => 67, 'ewalletBefore' => 68, 'ewalletAfter' => 69, 'ipay' => 70, 'payType' => 71, 'hcancel' => 72, 'caddress' => 73, 'cdistrictid' => 74, 'camphurid' => 75, 'cprovinceid' => 76, 'czip' => 77, 'sender' => 78, 'senderDate' => 79, 'receive' => 80, 'receiveDate' => 81, 'asend' => 82, 'atoType' => 83, 'atoId' => 84, 'online' => 85, 'hpv' => 86, 'htotal' => 87, 'hdate' => 88, 'scheck' => 89, 'checkportal' => 90, 'rcode' => 91, 'bmcauto' => 92, 'cancelDate' => 93, 'uidCancel' => 94, 'cname' => 95, 'cmobile' => 96, 'uidSender' => 97, 'uidReceive' => 98, 'mbase' => 99, 'bprice' => 100, 'locationbase' => 101, 'crate' => 102, 'status' => 103, 'ref' => 104, 'selectcash' => 105, 'selecttransfer' => 106, 'selectcredit1' => 107, 'selectcredit2' => 108, 'selectcredit3' => 109, 'selectdiscount' => 110, 'selectinternet' => 111, 'txtvoucher' => 112, 'optionvoucher' => 113, 'selectvoucher' => 114, 'txttransfer1' => 115, 'optiontransfer1' => 116, 'selecttransfer1' => 117, 'txttransfer2' => 118, 'optiontransfer2' => 119, 'selecttransfer2' => 120, 'txttransfer3' => 121, 'optiontransfer3' => 122, 'selecttransfer3' => 123, 'statusPackage' => 124, ),
        self::TYPE_COLNAME       => array(AliAsalehTableMap::COL_SANO => 0, AliAsalehTableMap::COL_PANO => 1, AliAsalehTableMap::COL_SADATE => 2, AliAsalehTableMap::COL_SCTIME => 3, AliAsalehTableMap::COL_INV_CODE => 4, AliAsalehTableMap::COL_INV_REF => 5, AliAsalehTableMap::COL_MCODE => 6, AliAsalehTableMap::COL_SP_CODE => 7, AliAsalehTableMap::COL_SP_POS => 8, AliAsalehTableMap::COL_NAME_F => 9, AliAsalehTableMap::COL_NAME_T => 10, AliAsalehTableMap::COL_TOTAL => 11, AliAsalehTableMap::COL_TOTAL_VAT => 12, AliAsalehTableMap::COL_TOTAL_NET => 13, AliAsalehTableMap::COL_TOTAL_INVAT => 14, AliAsalehTableMap::COL_TOTAL_EXVAT => 15, AliAsalehTableMap::COL_CUSTOMER_TOTAL => 16, AliAsalehTableMap::COL_TOT_PV => 17, AliAsalehTableMap::COL_TOT_BV => 18, AliAsalehTableMap::COL_TOT_FV => 19, AliAsalehTableMap::COL_TOT_SPPV => 20, AliAsalehTableMap::COL_TOT_WEIGHT => 21, AliAsalehTableMap::COL_USERCODE => 22, AliAsalehTableMap::COL_REMARK => 23, AliAsalehTableMap::COL_TRNF => 24, AliAsalehTableMap::COL_ID => 25, AliAsalehTableMap::COL_SA_TYPE => 26, AliAsalehTableMap::COL_UID => 27, AliAsalehTableMap::COL_UID_BRANCH => 28, AliAsalehTableMap::COL_LID => 29, AliAsalehTableMap::COL_DL => 30, AliAsalehTableMap::COL_CANCEL => 31, AliAsalehTableMap::COL_SEND => 32, AliAsalehTableMap::COL_TXTOPTION => 33, AliAsalehTableMap::COL_CHKCASH => 34, AliAsalehTableMap::COL_CHKFUTURE => 35, AliAsalehTableMap::COL_CHKTRANSFER => 36, AliAsalehTableMap::COL_CHKCREDIT1 => 37, AliAsalehTableMap::COL_CHKCREDIT2 => 38, AliAsalehTableMap::COL_CHKCREDIT3 => 39, AliAsalehTableMap::COL_CHKCREDIT4 => 40, AliAsalehTableMap::COL_CHKINTERNET => 41, AliAsalehTableMap::COL_CHKDISCOUNT => 42, AliAsalehTableMap::COL_CHKOTHER => 43, AliAsalehTableMap::COL_TXTCASH => 44, AliAsalehTableMap::COL_TXTFUTURE => 45, AliAsalehTableMap::COL_TXTTRANSFER => 46, AliAsalehTableMap::COL_EWALLET => 47, AliAsalehTableMap::COL_TXTCREDIT1 => 48, AliAsalehTableMap::COL_TXTCREDIT2 => 49, AliAsalehTableMap::COL_TXTCREDIT3 => 50, AliAsalehTableMap::COL_TXTCREDIT4 => 51, AliAsalehTableMap::COL_TXTINTERNET => 52, AliAsalehTableMap::COL_TXTDISCOUNT => 53, AliAsalehTableMap::COL_TXTOTHER => 54, AliAsalehTableMap::COL_TXTSENDING => 55, AliAsalehTableMap::COL_OPTIONCASH => 56, AliAsalehTableMap::COL_OPTIONFUTURE => 57, AliAsalehTableMap::COL_OPTIONTRANSFER => 58, AliAsalehTableMap::COL_OPTIONCREDIT1 => 59, AliAsalehTableMap::COL_OPTIONCREDIT2 => 60, AliAsalehTableMap::COL_OPTIONCREDIT3 => 61, AliAsalehTableMap::COL_OPTIONCREDIT4 => 62, AliAsalehTableMap::COL_OPTIONINTERNET => 63, AliAsalehTableMap::COL_OPTIONDISCOUNT => 64, AliAsalehTableMap::COL_OPTIONOTHER => 65, AliAsalehTableMap::COL_DISCOUNT => 66, AliAsalehTableMap::COL_PRINT => 67, AliAsalehTableMap::COL_EWALLET_BEFORE => 68, AliAsalehTableMap::COL_EWALLET_AFTER => 69, AliAsalehTableMap::COL_IPAY => 70, AliAsalehTableMap::COL_PAY_TYPE => 71, AliAsalehTableMap::COL_HCANCEL => 72, AliAsalehTableMap::COL_CADDRESS => 73, AliAsalehTableMap::COL_CDISTRICTID => 74, AliAsalehTableMap::COL_CAMPHURID => 75, AliAsalehTableMap::COL_CPROVINCEID => 76, AliAsalehTableMap::COL_CZIP => 77, AliAsalehTableMap::COL_SENDER => 78, AliAsalehTableMap::COL_SENDER_DATE => 79, AliAsalehTableMap::COL_RECEIVE => 80, AliAsalehTableMap::COL_RECEIVE_DATE => 81, AliAsalehTableMap::COL_ASEND => 82, AliAsalehTableMap::COL_ATO_TYPE => 83, AliAsalehTableMap::COL_ATO_ID => 84, AliAsalehTableMap::COL_ONLINE => 85, AliAsalehTableMap::COL_HPV => 86, AliAsalehTableMap::COL_HTOTAL => 87, AliAsalehTableMap::COL_HDATE => 88, AliAsalehTableMap::COL_SCHECK => 89, AliAsalehTableMap::COL_CHECKPORTAL => 90, AliAsalehTableMap::COL_RCODE => 91, AliAsalehTableMap::COL_BMCAUTO => 92, AliAsalehTableMap::COL_CANCEL_DATE => 93, AliAsalehTableMap::COL_UID_CANCEL => 94, AliAsalehTableMap::COL_CNAME => 95, AliAsalehTableMap::COL_CMOBILE => 96, AliAsalehTableMap::COL_UID_SENDER => 97, AliAsalehTableMap::COL_UID_RECEIVE => 98, AliAsalehTableMap::COL_MBASE => 99, AliAsalehTableMap::COL_BPRICE => 100, AliAsalehTableMap::COL_LOCATIONBASE => 101, AliAsalehTableMap::COL_CRATE => 102, AliAsalehTableMap::COL_STATUS => 103, AliAsalehTableMap::COL_REF => 104, AliAsalehTableMap::COL_SELECTCASH => 105, AliAsalehTableMap::COL_SELECTTRANSFER => 106, AliAsalehTableMap::COL_SELECTCREDIT1 => 107, AliAsalehTableMap::COL_SELECTCREDIT2 => 108, AliAsalehTableMap::COL_SELECTCREDIT3 => 109, AliAsalehTableMap::COL_SELECTDISCOUNT => 110, AliAsalehTableMap::COL_SELECTINTERNET => 111, AliAsalehTableMap::COL_TXTVOUCHER => 112, AliAsalehTableMap::COL_OPTIONVOUCHER => 113, AliAsalehTableMap::COL_SELECTVOUCHER => 114, AliAsalehTableMap::COL_TXTTRANSFER1 => 115, AliAsalehTableMap::COL_OPTIONTRANSFER1 => 116, AliAsalehTableMap::COL_SELECTTRANSFER1 => 117, AliAsalehTableMap::COL_TXTTRANSFER2 => 118, AliAsalehTableMap::COL_OPTIONTRANSFER2 => 119, AliAsalehTableMap::COL_SELECTTRANSFER2 => 120, AliAsalehTableMap::COL_TXTTRANSFER3 => 121, AliAsalehTableMap::COL_OPTIONTRANSFER3 => 122, AliAsalehTableMap::COL_SELECTTRANSFER3 => 123, AliAsalehTableMap::COL_STATUS_PACKAGE => 124, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'pano' => 1, 'sadate' => 2, 'sctime' => 3, 'inv_code' => 4, 'inv_ref' => 5, 'mcode' => 6, 'sp_code' => 7, 'sp_pos' => 8, 'name_f' => 9, 'name_t' => 10, 'total' => 11, 'total_vat' => 12, 'total_net' => 13, 'total_invat' => 14, 'total_exvat' => 15, 'customer_total' => 16, 'tot_pv' => 17, 'tot_bv' => 18, 'tot_fv' => 19, 'tot_sppv' => 20, 'tot_weight' => 21, 'usercode' => 22, 'remark' => 23, 'trnf' => 24, 'id' => 25, 'sa_type' => 26, 'uid' => 27, 'uid_branch' => 28, 'lid' => 29, 'dl' => 30, 'cancel' => 31, 'send' => 32, 'txtoption' => 33, 'chkCash' => 34, 'chkFuture' => 35, 'chkTransfer' => 36, 'chkCredit1' => 37, 'chkCredit2' => 38, 'chkCredit3' => 39, 'chkCredit4' => 40, 'chkInternet' => 41, 'chkDiscount' => 42, 'chkOther' => 43, 'txtCash' => 44, 'txtFuture' => 45, 'txtTransfer' => 46, 'ewallet' => 47, 'txtCredit1' => 48, 'txtCredit2' => 49, 'txtCredit3' => 50, 'txtCredit4' => 51, 'txtInternet' => 52, 'txtDiscount' => 53, 'txtOther' => 54, 'txtSending' => 55, 'optionCash' => 56, 'optionFuture' => 57, 'optionTransfer' => 58, 'optionCredit1' => 59, 'optionCredit2' => 60, 'optionCredit3' => 61, 'optionCredit4' => 62, 'optionInternet' => 63, 'optionDiscount' => 64, 'optionOther' => 65, 'discount' => 66, 'print' => 67, 'ewallet_before' => 68, 'ewallet_after' => 69, 'ipay' => 70, 'pay_type' => 71, 'hcancel' => 72, 'caddress' => 73, 'cdistrictId' => 74, 'camphurId' => 75, 'cprovinceId' => 76, 'czip' => 77, 'sender' => 78, 'sender_date' => 79, 'receive' => 80, 'receive_date' => 81, 'asend' => 82, 'ato_type' => 83, 'ato_id' => 84, 'online' => 85, 'hpv' => 86, 'htotal' => 87, 'hdate' => 88, 'scheck' => 89, 'checkportal' => 90, 'rcode' => 91, 'bmcauto' => 92, 'cancel_date' => 93, 'uid_cancel' => 94, 'cname' => 95, 'cmobile' => 96, 'uid_sender' => 97, 'uid_receive' => 98, 'mbase' => 99, 'bprice' => 100, 'locationbase' => 101, 'crate' => 102, 'status' => 103, 'ref' => 104, 'selectCash' => 105, 'selectTransfer' => 106, 'selectCredit1' => 107, 'selectCredit2' => 108, 'selectCredit3' => 109, 'selectDiscount' => 110, 'selectInternet' => 111, 'txtVoucher' => 112, 'optionVoucher' => 113, 'selectVoucher' => 114, 'txtTransfer1' => 115, 'optionTransfer1' => 116, 'selectTransfer1' => 117, 'txtTransfer2' => 118, 'optionTransfer2' => 119, 'selectTransfer2' => 120, 'txtTransfer3' => 121, 'optionTransfer3' => 122, 'selectTransfer3' => 123, 'status_package' => 124, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, )
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
        $this->setName('ali_asaleh');
        $this->setPhpName('AliAsaleh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliAsaleh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 255, null);
        $this->addColumn('pano', 'Pano', 'VARCHAR', true, 255, null);
        $this->addColumn('sadate', 'Sadate', 'VARCHAR', true, 255, null);
        $this->addColumn('sctime', 'Sctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_pos', 'SpPos', 'VARCHAR', true, 10, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('total_vat', 'TotalVat', 'DECIMAL', true, 15, null);
        $this->addColumn('total_net', 'TotalNet', 'DECIMAL', true, 15, null);
        $this->addColumn('total_invat', 'TotalInvat', 'DECIMAL', true, 15, null);
        $this->addColumn('total_exvat', 'TotalExvat', 'DECIMAL', true, 15, null);
        $this->addColumn('customer_total', 'CustomerTotal', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'VARCHAR', true, 255, null);
        $this->addColumn('tot_bv', 'TotBv', 'VARCHAR', true, 255, null);
        $this->addColumn('tot_fv', 'TotFv', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_sppv', 'TotSppv', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_weight', 'TotWeight', 'DECIMAL', true, 15, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', true, 255, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', true, 255, null);
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
        $this->addColumn('txtSending', 'Txtsending', 'DECIMAL', true, 15, 0);
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
        $this->addColumn('cancel_date', 'CancelDate', 'TIMESTAMP', true, null, '0000-00-00 00:00:00');
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
        $this->addColumn('ref', 'Ref', 'VARCHAR', true, 100, null);
        $this->addColumn('selectCash', 'Selectcash', 'VARCHAR', true, 255, null);
        $this->addColumn('selectTransfer', 'Selecttransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('selectCredit1', 'Selectcredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('selectCredit2', 'Selectcredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('selectCredit3', 'Selectcredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('selectDiscount', 'Selectdiscount', 'VARCHAR', true, 255, null);
        $this->addColumn('selectInternet', 'Selectinternet', 'VARCHAR', true, 255, null);
        $this->addColumn('txtVoucher', 'Txtvoucher', 'DECIMAL', true, 15, null);
        $this->addColumn('optionVoucher', 'Optionvoucher', 'VARCHAR', true, 255, null);
        $this->addColumn('selectVoucher', 'Selectvoucher', 'VARCHAR', true, 255, null);
        $this->addColumn('txtTransfer1', 'Txttransfer1', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer1', 'Optiontransfer1', 'VARCHAR', true, 255, null);
        $this->addColumn('selectTransfer1', 'Selecttransfer1', 'VARCHAR', true, 255, null);
        $this->addColumn('txtTransfer2', 'Txttransfer2', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer2', 'Optiontransfer2', 'VARCHAR', true, 255, null);
        $this->addColumn('selectTransfer2', 'Selecttransfer2', 'VARCHAR', true, 255, null);
        $this->addColumn('txtTransfer3', 'Txttransfer3', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer3', 'Optiontransfer3', 'VARCHAR', true, 255, null);
        $this->addColumn('selectTransfer3', 'Selecttransfer3', 'VARCHAR', true, 255, null);
        $this->addColumn('status_package', 'StatusPackage', 'INTEGER', true, 10, null);
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
        return $withPrefix ? AliAsalehTableMap::CLASS_DEFAULT : AliAsalehTableMap::OM_CLASS;
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
     * @return array           (AliAsaleh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliAsalehTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliAsalehTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliAsalehTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliAsalehTableMap::OM_CLASS;
            /** @var AliAsaleh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliAsalehTableMap::addInstanceToPool($obj, $key);
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
            $key = AliAsalehTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliAsalehTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliAsaleh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliAsalehTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SANO);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_PANO);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SP_POS);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOTAL_VAT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOTAL_NET);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOTAL_INVAT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOTAL_EXVAT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CUSTOMER_TOTAL);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOT_SPPV);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TOT_WEIGHT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_ID);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_UID);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_UID_BRANCH);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_LID);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_DL);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SEND);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKCREDIT4);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKINTERNET);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKDISCOUNT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHKOTHER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTCREDIT4);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTINTERNET);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTDISCOUNT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTOTHER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTSENDING);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONCREDIT4);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONINTERNET);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONDISCOUNT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONOTHER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_PAY_TYPE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_HCANCEL);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CDISTRICTID);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CAMPHURID);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CPROVINCEID);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CZIP);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_ASEND);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_ATO_TYPE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_ATO_ID);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_ONLINE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_HPV);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_HTOTAL);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_HDATE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SCHECK);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_BMCAUTO);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CNAME);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CMOBILE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_UID_SENDER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_UID_RECEIVE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_REF);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTCASH);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTTRANSFER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTCREDIT1);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTCREDIT2);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTCREDIT3);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTDISCOUNT);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTINTERNET);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTVOUCHER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONVOUCHER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTVOUCHER);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTTRANSFER1);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONTRANSFER1);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTTRANSFER1);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTTRANSFER2);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONTRANSFER2);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTTRANSFER2);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_TXTTRANSFER3);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_OPTIONTRANSFER3);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_SELECTTRANSFER3);
            $criteria->addSelectColumn(AliAsalehTableMap::COL_STATUS_PACKAGE);
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
            $criteria->addSelectColumn($alias . '.txtSending');
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
            $criteria->addSelectColumn($alias . '.ref');
            $criteria->addSelectColumn($alias . '.selectCash');
            $criteria->addSelectColumn($alias . '.selectTransfer');
            $criteria->addSelectColumn($alias . '.selectCredit1');
            $criteria->addSelectColumn($alias . '.selectCredit2');
            $criteria->addSelectColumn($alias . '.selectCredit3');
            $criteria->addSelectColumn($alias . '.selectDiscount');
            $criteria->addSelectColumn($alias . '.selectInternet');
            $criteria->addSelectColumn($alias . '.txtVoucher');
            $criteria->addSelectColumn($alias . '.optionVoucher');
            $criteria->addSelectColumn($alias . '.selectVoucher');
            $criteria->addSelectColumn($alias . '.txtTransfer1');
            $criteria->addSelectColumn($alias . '.optionTransfer1');
            $criteria->addSelectColumn($alias . '.selectTransfer1');
            $criteria->addSelectColumn($alias . '.txtTransfer2');
            $criteria->addSelectColumn($alias . '.optionTransfer2');
            $criteria->addSelectColumn($alias . '.selectTransfer2');
            $criteria->addSelectColumn($alias . '.txtTransfer3');
            $criteria->addSelectColumn($alias . '.optionTransfer3');
            $criteria->addSelectColumn($alias . '.selectTransfer3');
            $criteria->addSelectColumn($alias . '.status_package');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliAsalehTableMap::DATABASE_NAME)->getTable(AliAsalehTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliAsalehTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliAsalehTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliAsalehTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliAsaleh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliAsaleh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAsalehTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliAsaleh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliAsalehTableMap::DATABASE_NAME);
            $criteria->add(AliAsalehTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliAsalehQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliAsalehTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliAsalehTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_asaleh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliAsalehQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliAsaleh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliAsaleh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAsalehTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliAsaleh object
        }

        if ($criteria->containsKey(AliAsalehTableMap::COL_ID) && $criteria->keyContainsValue(AliAsalehTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliAsalehTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliAsalehQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliAsalehTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliAsalehTableMap::buildTableMap();
