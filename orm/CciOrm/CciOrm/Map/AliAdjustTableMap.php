<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliAdjust;
use CciOrm\CciOrm\AliAdjustQuery;
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
 * This class defines the structure of the 'ali_adjust' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliAdjustTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliAdjustTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_adjust';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliAdjust';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliAdjust';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 49;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 49;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_adjust.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_adjust.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_adjust.inv_code';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_adjust.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_adjust.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_adjust.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_adjust.total';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_adjust.usercode';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_adjust.remark';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_adjust.trnf';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_adjust.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_adjust.sa_type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_adjust.uid';

    /**
     * the column name for the lid field
     */
    const COL_LID = 'ali_adjust.lid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_adjust.dl';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_adjust.cancel';

    /**
     * the column name for the send field
     */
    const COL_SEND = 'ali_adjust.send';

    /**
     * the column name for the txtMoney field
     */
    const COL_TXTMONEY = 'ali_adjust.txtMoney';

    /**
     * the column name for the chkCash field
     */
    const COL_CHKCASH = 'ali_adjust.chkCash';

    /**
     * the column name for the chkFuture field
     */
    const COL_CHKFUTURE = 'ali_adjust.chkFuture';

    /**
     * the column name for the chkTransfer field
     */
    const COL_CHKTRANSFER = 'ali_adjust.chkTransfer';

    /**
     * the column name for the chkCredit1 field
     */
    const COL_CHKCREDIT1 = 'ali_adjust.chkCredit1';

    /**
     * the column name for the chkCredit2 field
     */
    const COL_CHKCREDIT2 = 'ali_adjust.chkCredit2';

    /**
     * the column name for the chkCredit3 field
     */
    const COL_CHKCREDIT3 = 'ali_adjust.chkCredit3';

    /**
     * the column name for the txtCash field
     */
    const COL_TXTCASH = 'ali_adjust.txtCash';

    /**
     * the column name for the txtFuture field
     */
    const COL_TXTFUTURE = 'ali_adjust.txtFuture';

    /**
     * the column name for the txtTransfer field
     */
    const COL_TXTTRANSFER = 'ali_adjust.txtTransfer';

    /**
     * the column name for the txtCredit1 field
     */
    const COL_TXTCREDIT1 = 'ali_adjust.txtCredit1';

    /**
     * the column name for the txtCredit2 field
     */
    const COL_TXTCREDIT2 = 'ali_adjust.txtCredit2';

    /**
     * the column name for the txtCredit3 field
     */
    const COL_TXTCREDIT3 = 'ali_adjust.txtCredit3';

    /**
     * the column name for the optionCash field
     */
    const COL_OPTIONCASH = 'ali_adjust.optionCash';

    /**
     * the column name for the optionFuture field
     */
    const COL_OPTIONFUTURE = 'ali_adjust.optionFuture';

    /**
     * the column name for the optionTransfer field
     */
    const COL_OPTIONTRANSFER = 'ali_adjust.optionTransfer';

    /**
     * the column name for the optionCredit1 field
     */
    const COL_OPTIONCREDIT1 = 'ali_adjust.optionCredit1';

    /**
     * the column name for the optionCredit2 field
     */
    const COL_OPTIONCREDIT2 = 'ali_adjust.optionCredit2';

    /**
     * the column name for the optionCredit3 field
     */
    const COL_OPTIONCREDIT3 = 'ali_adjust.optionCredit3';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_adjust.txtoption';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_adjust.ewallet';

    /**
     * the column name for the ewallet_before field
     */
    const COL_EWALLET_BEFORE = 'ali_adjust.ewallet_before';

    /**
     * the column name for the ewallet_after field
     */
    const COL_EWALLET_AFTER = 'ali_adjust.ewallet_after';

    /**
     * the column name for the ipay field
     */
    const COL_IPAY = 'ali_adjust.ipay';

    /**
     * the column name for the checkportal field
     */
    const COL_CHECKPORTAL = 'ali_adjust.checkportal';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_adjust.bprice';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_adjust.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_adjust.uid_cancel';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_adjust.locationbase';

    /**
     * the column name for the chkCommission field
     */
    const COL_CHKCOMMISSION = 'ali_adjust.chkCommission';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_adjust.mbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_adjust.crate';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sadate', 'InvCode', 'Mcode', 'NameF', 'NameT', 'Total', 'Usercode', 'Remark', 'Trnf', 'Id', 'SaType', 'Uid', 'Lid', 'Dl', 'Cancel', 'Send', 'Txtmoney', 'Chkcash', 'Chkfuture', 'Chktransfer', 'Chkcredit1', 'Chkcredit2', 'Chkcredit3', 'Txtcash', 'Txtfuture', 'Txttransfer', 'Txtcredit1', 'Txtcredit2', 'Txtcredit3', 'Optioncash', 'Optionfuture', 'Optiontransfer', 'Optioncredit1', 'Optioncredit2', 'Optioncredit3', 'Txtoption', 'Ewallet', 'EwalletBefore', 'EwalletAfter', 'Ipay', 'Checkportal', 'Bprice', 'CancelDate', 'UidCancel', 'Locationbase', 'Chkcommission', 'Mbase', 'Crate', ),
        self::TYPE_CAMELNAME     => array('sano', 'sadate', 'invCode', 'mcode', 'nameF', 'nameT', 'total', 'usercode', 'remark', 'trnf', 'id', 'saType', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtmoney', 'chkcash', 'chkfuture', 'chktransfer', 'chkcredit1', 'chkcredit2', 'chkcredit3', 'txtcash', 'txtfuture', 'txttransfer', 'txtcredit1', 'txtcredit2', 'txtcredit3', 'optioncash', 'optionfuture', 'optiontransfer', 'optioncredit1', 'optioncredit2', 'optioncredit3', 'txtoption', 'ewallet', 'ewalletBefore', 'ewalletAfter', 'ipay', 'checkportal', 'bprice', 'cancelDate', 'uidCancel', 'locationbase', 'chkcommission', 'mbase', 'crate', ),
        self::TYPE_COLNAME       => array(AliAdjustTableMap::COL_SANO, AliAdjustTableMap::COL_SADATE, AliAdjustTableMap::COL_INV_CODE, AliAdjustTableMap::COL_MCODE, AliAdjustTableMap::COL_NAME_F, AliAdjustTableMap::COL_NAME_T, AliAdjustTableMap::COL_TOTAL, AliAdjustTableMap::COL_USERCODE, AliAdjustTableMap::COL_REMARK, AliAdjustTableMap::COL_TRNF, AliAdjustTableMap::COL_ID, AliAdjustTableMap::COL_SA_TYPE, AliAdjustTableMap::COL_UID, AliAdjustTableMap::COL_LID, AliAdjustTableMap::COL_DL, AliAdjustTableMap::COL_CANCEL, AliAdjustTableMap::COL_SEND, AliAdjustTableMap::COL_TXTMONEY, AliAdjustTableMap::COL_CHKCASH, AliAdjustTableMap::COL_CHKFUTURE, AliAdjustTableMap::COL_CHKTRANSFER, AliAdjustTableMap::COL_CHKCREDIT1, AliAdjustTableMap::COL_CHKCREDIT2, AliAdjustTableMap::COL_CHKCREDIT3, AliAdjustTableMap::COL_TXTCASH, AliAdjustTableMap::COL_TXTFUTURE, AliAdjustTableMap::COL_TXTTRANSFER, AliAdjustTableMap::COL_TXTCREDIT1, AliAdjustTableMap::COL_TXTCREDIT2, AliAdjustTableMap::COL_TXTCREDIT3, AliAdjustTableMap::COL_OPTIONCASH, AliAdjustTableMap::COL_OPTIONFUTURE, AliAdjustTableMap::COL_OPTIONTRANSFER, AliAdjustTableMap::COL_OPTIONCREDIT1, AliAdjustTableMap::COL_OPTIONCREDIT2, AliAdjustTableMap::COL_OPTIONCREDIT3, AliAdjustTableMap::COL_TXTOPTION, AliAdjustTableMap::COL_EWALLET, AliAdjustTableMap::COL_EWALLET_BEFORE, AliAdjustTableMap::COL_EWALLET_AFTER, AliAdjustTableMap::COL_IPAY, AliAdjustTableMap::COL_CHECKPORTAL, AliAdjustTableMap::COL_BPRICE, AliAdjustTableMap::COL_CANCEL_DATE, AliAdjustTableMap::COL_UID_CANCEL, AliAdjustTableMap::COL_LOCATIONBASE, AliAdjustTableMap::COL_CHKCOMMISSION, AliAdjustTableMap::COL_MBASE, AliAdjustTableMap::COL_CRATE, ),
        self::TYPE_FIELDNAME     => array('sano', 'sadate', 'inv_code', 'mcode', 'name_f', 'name_t', 'total', 'usercode', 'remark', 'trnf', 'id', 'sa_type', 'uid', 'lid', 'dl', 'cancel', 'send', 'txtMoney', 'chkCash', 'chkFuture', 'chkTransfer', 'chkCredit1', 'chkCredit2', 'chkCredit3', 'txtCash', 'txtFuture', 'txtTransfer', 'txtCredit1', 'txtCredit2', 'txtCredit3', 'optionCash', 'optionFuture', 'optionTransfer', 'optionCredit1', 'optionCredit2', 'optionCredit3', 'txtoption', 'ewallet', 'ewallet_before', 'ewallet_after', 'ipay', 'checkportal', 'bprice', 'cancel_date', 'uid_cancel', 'locationbase', 'chkCommission', 'mbase', 'crate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sadate' => 1, 'InvCode' => 2, 'Mcode' => 3, 'NameF' => 4, 'NameT' => 5, 'Total' => 6, 'Usercode' => 7, 'Remark' => 8, 'Trnf' => 9, 'Id' => 10, 'SaType' => 11, 'Uid' => 12, 'Lid' => 13, 'Dl' => 14, 'Cancel' => 15, 'Send' => 16, 'Txtmoney' => 17, 'Chkcash' => 18, 'Chkfuture' => 19, 'Chktransfer' => 20, 'Chkcredit1' => 21, 'Chkcredit2' => 22, 'Chkcredit3' => 23, 'Txtcash' => 24, 'Txtfuture' => 25, 'Txttransfer' => 26, 'Txtcredit1' => 27, 'Txtcredit2' => 28, 'Txtcredit3' => 29, 'Optioncash' => 30, 'Optionfuture' => 31, 'Optiontransfer' => 32, 'Optioncredit1' => 33, 'Optioncredit2' => 34, 'Optioncredit3' => 35, 'Txtoption' => 36, 'Ewallet' => 37, 'EwalletBefore' => 38, 'EwalletAfter' => 39, 'Ipay' => 40, 'Checkportal' => 41, 'Bprice' => 42, 'CancelDate' => 43, 'UidCancel' => 44, 'Locationbase' => 45, 'Chkcommission' => 46, 'Mbase' => 47, 'Crate' => 48, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sadate' => 1, 'invCode' => 2, 'mcode' => 3, 'nameF' => 4, 'nameT' => 5, 'total' => 6, 'usercode' => 7, 'remark' => 8, 'trnf' => 9, 'id' => 10, 'saType' => 11, 'uid' => 12, 'lid' => 13, 'dl' => 14, 'cancel' => 15, 'send' => 16, 'txtmoney' => 17, 'chkcash' => 18, 'chkfuture' => 19, 'chktransfer' => 20, 'chkcredit1' => 21, 'chkcredit2' => 22, 'chkcredit3' => 23, 'txtcash' => 24, 'txtfuture' => 25, 'txttransfer' => 26, 'txtcredit1' => 27, 'txtcredit2' => 28, 'txtcredit3' => 29, 'optioncash' => 30, 'optionfuture' => 31, 'optiontransfer' => 32, 'optioncredit1' => 33, 'optioncredit2' => 34, 'optioncredit3' => 35, 'txtoption' => 36, 'ewallet' => 37, 'ewalletBefore' => 38, 'ewalletAfter' => 39, 'ipay' => 40, 'checkportal' => 41, 'bprice' => 42, 'cancelDate' => 43, 'uidCancel' => 44, 'locationbase' => 45, 'chkcommission' => 46, 'mbase' => 47, 'crate' => 48, ),
        self::TYPE_COLNAME       => array(AliAdjustTableMap::COL_SANO => 0, AliAdjustTableMap::COL_SADATE => 1, AliAdjustTableMap::COL_INV_CODE => 2, AliAdjustTableMap::COL_MCODE => 3, AliAdjustTableMap::COL_NAME_F => 4, AliAdjustTableMap::COL_NAME_T => 5, AliAdjustTableMap::COL_TOTAL => 6, AliAdjustTableMap::COL_USERCODE => 7, AliAdjustTableMap::COL_REMARK => 8, AliAdjustTableMap::COL_TRNF => 9, AliAdjustTableMap::COL_ID => 10, AliAdjustTableMap::COL_SA_TYPE => 11, AliAdjustTableMap::COL_UID => 12, AliAdjustTableMap::COL_LID => 13, AliAdjustTableMap::COL_DL => 14, AliAdjustTableMap::COL_CANCEL => 15, AliAdjustTableMap::COL_SEND => 16, AliAdjustTableMap::COL_TXTMONEY => 17, AliAdjustTableMap::COL_CHKCASH => 18, AliAdjustTableMap::COL_CHKFUTURE => 19, AliAdjustTableMap::COL_CHKTRANSFER => 20, AliAdjustTableMap::COL_CHKCREDIT1 => 21, AliAdjustTableMap::COL_CHKCREDIT2 => 22, AliAdjustTableMap::COL_CHKCREDIT3 => 23, AliAdjustTableMap::COL_TXTCASH => 24, AliAdjustTableMap::COL_TXTFUTURE => 25, AliAdjustTableMap::COL_TXTTRANSFER => 26, AliAdjustTableMap::COL_TXTCREDIT1 => 27, AliAdjustTableMap::COL_TXTCREDIT2 => 28, AliAdjustTableMap::COL_TXTCREDIT3 => 29, AliAdjustTableMap::COL_OPTIONCASH => 30, AliAdjustTableMap::COL_OPTIONFUTURE => 31, AliAdjustTableMap::COL_OPTIONTRANSFER => 32, AliAdjustTableMap::COL_OPTIONCREDIT1 => 33, AliAdjustTableMap::COL_OPTIONCREDIT2 => 34, AliAdjustTableMap::COL_OPTIONCREDIT3 => 35, AliAdjustTableMap::COL_TXTOPTION => 36, AliAdjustTableMap::COL_EWALLET => 37, AliAdjustTableMap::COL_EWALLET_BEFORE => 38, AliAdjustTableMap::COL_EWALLET_AFTER => 39, AliAdjustTableMap::COL_IPAY => 40, AliAdjustTableMap::COL_CHECKPORTAL => 41, AliAdjustTableMap::COL_BPRICE => 42, AliAdjustTableMap::COL_CANCEL_DATE => 43, AliAdjustTableMap::COL_UID_CANCEL => 44, AliAdjustTableMap::COL_LOCATIONBASE => 45, AliAdjustTableMap::COL_CHKCOMMISSION => 46, AliAdjustTableMap::COL_MBASE => 47, AliAdjustTableMap::COL_CRATE => 48, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sadate' => 1, 'inv_code' => 2, 'mcode' => 3, 'name_f' => 4, 'name_t' => 5, 'total' => 6, 'usercode' => 7, 'remark' => 8, 'trnf' => 9, 'id' => 10, 'sa_type' => 11, 'uid' => 12, 'lid' => 13, 'dl' => 14, 'cancel' => 15, 'send' => 16, 'txtMoney' => 17, 'chkCash' => 18, 'chkFuture' => 19, 'chkTransfer' => 20, 'chkCredit1' => 21, 'chkCredit2' => 22, 'chkCredit3' => 23, 'txtCash' => 24, 'txtFuture' => 25, 'txtTransfer' => 26, 'txtCredit1' => 27, 'txtCredit2' => 28, 'txtCredit3' => 29, 'optionCash' => 30, 'optionFuture' => 31, 'optionTransfer' => 32, 'optionCredit1' => 33, 'optionCredit2' => 34, 'optionCredit3' => 35, 'txtoption' => 36, 'ewallet' => 37, 'ewallet_before' => 38, 'ewallet_after' => 39, 'ipay' => 40, 'checkportal' => 41, 'bprice' => 42, 'cancel_date' => 43, 'uid_cancel' => 44, 'locationbase' => 45, 'chkCommission' => 46, 'mbase' => 47, 'crate' => 48, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, )
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
        $this->setName('ali_adjust');
        $this->setPhpName('AliAdjust');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliAdjust');
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
        $this->addColumn('txtMoney', 'Txtmoney', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCash', 'Chkcash', 'VARCHAR', true, 255, null);
        $this->addColumn('chkFuture', 'Chkfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('chkTransfer', 'Chktransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit1', 'Chkcredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit2', 'Chkcredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('chkCredit3', 'Chkcredit3', 'VARCHAR', true, 255, null);
        $this->addColumn('txtCash', 'Txtcash', 'DECIMAL', true, 15, null);
        $this->addColumn('txtFuture', 'Txtfuture', 'DECIMAL', true, 15, null);
        $this->addColumn('txtTransfer', 'Txttransfer', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit1', 'Txtcredit1', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit2', 'Txtcredit2', 'DECIMAL', true, 15, null);
        $this->addColumn('txtCredit3', 'Txtcredit3', 'DECIMAL', true, 15, null);
        $this->addColumn('optionCash', 'Optioncash', 'VARCHAR', true, 255, null);
        $this->addColumn('optionFuture', 'Optionfuture', 'VARCHAR', true, 255, null);
        $this->addColumn('optionTransfer', 'Optiontransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit1', 'Optioncredit1', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit2', 'Optioncredit2', 'VARCHAR', true, 255, null);
        $this->addColumn('optionCredit3', 'Optioncredit3', 'VARCHAR', true, 255, null);
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
        $this->addColumn('chkCommission', 'Chkcommission', 'DECIMAL', true, 15, null);
        $this->addColumn('mbase', 'Mbase', 'VARCHAR', true, 244, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 10 + $offset
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
        return $withPrefix ? AliAdjustTableMap::CLASS_DEFAULT : AliAdjustTableMap::OM_CLASS;
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
     * @return array           (AliAdjust object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliAdjustTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliAdjustTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliAdjustTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliAdjustTableMap::OM_CLASS;
            /** @var AliAdjust $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliAdjustTableMap::addInstanceToPool($obj, $key);
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
            $key = AliAdjustTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliAdjustTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliAdjust $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliAdjustTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliAdjustTableMap::COL_SANO);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_ID);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_UID);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_LID);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_DL);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_SEND);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TXTMONEY);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CHKCASH);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CHKFUTURE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CHKTRANSFER);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CHKCREDIT1);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CHKCREDIT2);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CHKCREDIT3);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TXTCASH);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TXTFUTURE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TXTTRANSFER);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TXTCREDIT1);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TXTCREDIT2);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TXTCREDIT3);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_OPTIONCASH);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_OPTIONFUTURE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_OPTIONTRANSFER);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_OPTIONCREDIT1);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_OPTIONCREDIT2);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_OPTIONCREDIT3);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_EWALLET_BEFORE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_EWALLET_AFTER);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_IPAY);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CHECKPORTAL);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CHKCOMMISSION);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliAdjustTableMap::COL_CRATE);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
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
            $criteria->addSelectColumn($alias . '.txtCash');
            $criteria->addSelectColumn($alias . '.txtFuture');
            $criteria->addSelectColumn($alias . '.txtTransfer');
            $criteria->addSelectColumn($alias . '.txtCredit1');
            $criteria->addSelectColumn($alias . '.txtCredit2');
            $criteria->addSelectColumn($alias . '.txtCredit3');
            $criteria->addSelectColumn($alias . '.optionCash');
            $criteria->addSelectColumn($alias . '.optionFuture');
            $criteria->addSelectColumn($alias . '.optionTransfer');
            $criteria->addSelectColumn($alias . '.optionCredit1');
            $criteria->addSelectColumn($alias . '.optionCredit2');
            $criteria->addSelectColumn($alias . '.optionCredit3');
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
            $criteria->addSelectColumn($alias . '.mbase');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliAdjustTableMap::DATABASE_NAME)->getTable(AliAdjustTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliAdjustTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliAdjustTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliAdjustTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliAdjust or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliAdjust object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAdjustTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliAdjust) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliAdjustTableMap::DATABASE_NAME);
            $criteria->add(AliAdjustTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliAdjustQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliAdjustTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliAdjustTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_adjust table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliAdjustQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliAdjust or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliAdjust object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAdjustTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliAdjust object
        }

        if ($criteria->containsKey(AliAdjustTableMap::COL_ID) && $criteria->keyContainsValue(AliAdjustTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliAdjustTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliAdjustQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliAdjustTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliAdjustTableMap::buildTableMap();
