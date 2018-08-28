<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliCmbonusB;
use CciOrm\CciOrm\AliCmbonusBQuery;
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
 * This class defines the structure of the 'ali_cmbonus_b' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliCmbonusBTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliCmbonusBTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_cmbonus_b';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliCmbonusB';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliCmbonusB';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 46;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 46;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_cmbonus_b.id';

    /**
     * the column name for the status_pv field
     */
    const COL_STATUS_PV = 'ali_cmbonus_b.status_pv';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_cmbonus_b.rcode';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_cmbonus_b.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_cmbonus_b.tdate';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_cmbonus_b.mcode';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_cmbonus_b.status';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_cmbonus_b.pv';

    /**
     * the column name for the pvb field
     */
    const COL_PVB = 'ali_cmbonus_b.pvb';

    /**
     * the column name for the pvh field
     */
    const COL_PVH = 'ali_cmbonus_b.pvh';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_cmbonus_b.total';

    /**
     * the column name for the dmbonus field
     */
    const COL_DMBONUS = 'ali_cmbonus_b.dmbonus';

    /**
     * the column name for the embonus field
     */
    const COL_EMBONUS = 'ali_cmbonus_b.embonus';

    /**
     * the column name for the totaly field
     */
    const COL_TOTALY = 'ali_cmbonus_b.totaly';

    /**
     * the column name for the tot_vat field
     */
    const COL_TOT_VAT = 'ali_cmbonus_b.tot_vat';

    /**
     * the column name for the tot_tax field
     */
    const COL_TOT_TAX = 'ali_cmbonus_b.tot_tax';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'ali_cmbonus_b.title';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_cmbonus_b.mdate';

    /**
     * the column name for the month_pv field
     */
    const COL_MONTH_PV = 'ali_cmbonus_b.month_pv';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_cmbonus_b.mpos';

    /**
     * the column name for the c_note1 field
     */
    const COL_C_NOTE1 = 'ali_cmbonus_b.c_note1';

    /**
     * the column name for the c_note2 field
     */
    const COL_C_NOTE2 = 'ali_cmbonus_b.c_note2';

    /**
     * the column name for the c_note3 field
     */
    const COL_C_NOTE3 = 'ali_cmbonus_b.c_note3';

    /**
     * the column name for the c_note4 field
     */
    const COL_C_NOTE4 = 'ali_cmbonus_b.c_note4';

    /**
     * the column name for the c_note5 field
     */
    const COL_C_NOTE5 = 'ali_cmbonus_b.c_note5';

    /**
     * the column name for the c_transfer field
     */
    const COL_C_TRANSFER = 'ali_cmbonus_b.c_transfer';

    /**
     * the column name for the c_remark field
     */
    const COL_C_REMARK = 'ali_cmbonus_b.c_remark';

    /**
     * the column name for the sms_credits field
     */
    const COL_SMS_CREDITS = 'ali_cmbonus_b.sms_credits';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_cmbonus_b.paydate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_cmbonus_b.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_cmbonus_b.crate';

    /**
     * the column name for the voucher field
     */
    const COL_VOUCHER = 'ali_cmbonus_b.voucher';

    /**
     * the column name for the mtype field
     */
    const COL_MTYPE = 'ali_cmbonus_b.mtype';

    /**
     * the column name for the com_transfer_chagre field
     */
    const COL_COM_TRANSFER_CHAGRE = 'ali_cmbonus_b.com_transfer_chagre';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_cmbonus_b.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_cmbonus_b.name_t';

    /**
     * the column name for the id_card field
     */
    const COL_ID_CARD = 'ali_cmbonus_b.id_card';

    /**
     * the column name for the id_tax field
     */
    const COL_ID_TAX = 'ali_cmbonus_b.id_tax';

    /**
     * the column name for the vip field
     */
    const COL_VIP = 'ali_cmbonus_b.vip';

    /**
     * the column name for the bankcode field
     */
    const COL_BANKCODE = 'ali_cmbonus_b.bankcode';

    /**
     * the column name for the acc_no field
     */
    const COL_ACC_NO = 'ali_cmbonus_b.acc_no';

    /**
     * the column name for the acc_name field
     */
    const COL_ACC_NAME = 'ali_cmbonus_b.acc_name';

    /**
     * the column name for the branch field
     */
    const COL_BRANCH = 'ali_cmbonus_b.branch';

    /**
     * the column name for the mobile field
     */
    const COL_MOBILE = 'ali_cmbonus_b.mobile';

    /**
     * the column name for the cmp field
     */
    const COL_CMP = 'ali_cmbonus_b.cmp';

    /**
     * the column name for the cmp2 field
     */
    const COL_CMP2 = 'ali_cmbonus_b.cmp2';

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
        self::TYPE_PHPNAME       => array('Id', 'StatusPv', 'Rcode', 'Fdate', 'Tdate', 'Mcode', 'Status', 'Pv', 'Pvb', 'Pvh', 'Total', 'Dmbonus', 'Embonus', 'Totaly', 'TotVat', 'TotTax', 'Title', 'Mdate', 'MonthPv', 'Mpos', 'CNote1', 'CNote2', 'CNote3', 'CNote4', 'CNote5', 'CTransfer', 'CRemark', 'SmsCredits', 'Paydate', 'Locationbase', 'Crate', 'Voucher', 'Mtype', 'ComTransferChagre', 'NameF', 'NameT', 'IdCard', 'IdTax', 'Vip', 'Bankcode', 'AccNo', 'AccName', 'Branch', 'Mobile', 'Cmp', 'Cmp2', ),
        self::TYPE_CAMELNAME     => array('id', 'statusPv', 'rcode', 'fdate', 'tdate', 'mcode', 'status', 'pv', 'pvb', 'pvh', 'total', 'dmbonus', 'embonus', 'totaly', 'totVat', 'totTax', 'title', 'mdate', 'monthPv', 'mpos', 'cNote1', 'cNote2', 'cNote3', 'cNote4', 'cNote5', 'cTransfer', 'cRemark', 'smsCredits', 'paydate', 'locationbase', 'crate', 'voucher', 'mtype', 'comTransferChagre', 'nameF', 'nameT', 'idCard', 'idTax', 'vip', 'bankcode', 'accNo', 'accName', 'branch', 'mobile', 'cmp', 'cmp2', ),
        self::TYPE_COLNAME       => array(AliCmbonusBTableMap::COL_ID, AliCmbonusBTableMap::COL_STATUS_PV, AliCmbonusBTableMap::COL_RCODE, AliCmbonusBTableMap::COL_FDATE, AliCmbonusBTableMap::COL_TDATE, AliCmbonusBTableMap::COL_MCODE, AliCmbonusBTableMap::COL_STATUS, AliCmbonusBTableMap::COL_PV, AliCmbonusBTableMap::COL_PVB, AliCmbonusBTableMap::COL_PVH, AliCmbonusBTableMap::COL_TOTAL, AliCmbonusBTableMap::COL_DMBONUS, AliCmbonusBTableMap::COL_EMBONUS, AliCmbonusBTableMap::COL_TOTALY, AliCmbonusBTableMap::COL_TOT_VAT, AliCmbonusBTableMap::COL_TOT_TAX, AliCmbonusBTableMap::COL_TITLE, AliCmbonusBTableMap::COL_MDATE, AliCmbonusBTableMap::COL_MONTH_PV, AliCmbonusBTableMap::COL_MPOS, AliCmbonusBTableMap::COL_C_NOTE1, AliCmbonusBTableMap::COL_C_NOTE2, AliCmbonusBTableMap::COL_C_NOTE3, AliCmbonusBTableMap::COL_C_NOTE4, AliCmbonusBTableMap::COL_C_NOTE5, AliCmbonusBTableMap::COL_C_TRANSFER, AliCmbonusBTableMap::COL_C_REMARK, AliCmbonusBTableMap::COL_SMS_CREDITS, AliCmbonusBTableMap::COL_PAYDATE, AliCmbonusBTableMap::COL_LOCATIONBASE, AliCmbonusBTableMap::COL_CRATE, AliCmbonusBTableMap::COL_VOUCHER, AliCmbonusBTableMap::COL_MTYPE, AliCmbonusBTableMap::COL_COM_TRANSFER_CHAGRE, AliCmbonusBTableMap::COL_NAME_F, AliCmbonusBTableMap::COL_NAME_T, AliCmbonusBTableMap::COL_ID_CARD, AliCmbonusBTableMap::COL_ID_TAX, AliCmbonusBTableMap::COL_VIP, AliCmbonusBTableMap::COL_BANKCODE, AliCmbonusBTableMap::COL_ACC_NO, AliCmbonusBTableMap::COL_ACC_NAME, AliCmbonusBTableMap::COL_BRANCH, AliCmbonusBTableMap::COL_MOBILE, AliCmbonusBTableMap::COL_CMP, AliCmbonusBTableMap::COL_CMP2, ),
        self::TYPE_FIELDNAME     => array('id', 'status_pv', 'rcode', 'fdate', 'tdate', 'mcode', 'status', 'pv', 'pvb', 'pvh', 'total', 'dmbonus', 'embonus', 'totaly', 'tot_vat', 'tot_tax', 'title', 'mdate', 'month_pv', 'mpos', 'c_note1', 'c_note2', 'c_note3', 'c_note4', 'c_note5', 'c_transfer', 'c_remark', 'sms_credits', 'paydate', 'locationbase', 'crate', 'voucher', 'mtype', 'com_transfer_chagre', 'name_f', 'name_t', 'id_card', 'id_tax', 'vip', 'bankcode', 'acc_no', 'acc_name', 'branch', 'mobile', 'cmp', 'cmp2', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'StatusPv' => 1, 'Rcode' => 2, 'Fdate' => 3, 'Tdate' => 4, 'Mcode' => 5, 'Status' => 6, 'Pv' => 7, 'Pvb' => 8, 'Pvh' => 9, 'Total' => 10, 'Dmbonus' => 11, 'Embonus' => 12, 'Totaly' => 13, 'TotVat' => 14, 'TotTax' => 15, 'Title' => 16, 'Mdate' => 17, 'MonthPv' => 18, 'Mpos' => 19, 'CNote1' => 20, 'CNote2' => 21, 'CNote3' => 22, 'CNote4' => 23, 'CNote5' => 24, 'CTransfer' => 25, 'CRemark' => 26, 'SmsCredits' => 27, 'Paydate' => 28, 'Locationbase' => 29, 'Crate' => 30, 'Voucher' => 31, 'Mtype' => 32, 'ComTransferChagre' => 33, 'NameF' => 34, 'NameT' => 35, 'IdCard' => 36, 'IdTax' => 37, 'Vip' => 38, 'Bankcode' => 39, 'AccNo' => 40, 'AccName' => 41, 'Branch' => 42, 'Mobile' => 43, 'Cmp' => 44, 'Cmp2' => 45, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'statusPv' => 1, 'rcode' => 2, 'fdate' => 3, 'tdate' => 4, 'mcode' => 5, 'status' => 6, 'pv' => 7, 'pvb' => 8, 'pvh' => 9, 'total' => 10, 'dmbonus' => 11, 'embonus' => 12, 'totaly' => 13, 'totVat' => 14, 'totTax' => 15, 'title' => 16, 'mdate' => 17, 'monthPv' => 18, 'mpos' => 19, 'cNote1' => 20, 'cNote2' => 21, 'cNote3' => 22, 'cNote4' => 23, 'cNote5' => 24, 'cTransfer' => 25, 'cRemark' => 26, 'smsCredits' => 27, 'paydate' => 28, 'locationbase' => 29, 'crate' => 30, 'voucher' => 31, 'mtype' => 32, 'comTransferChagre' => 33, 'nameF' => 34, 'nameT' => 35, 'idCard' => 36, 'idTax' => 37, 'vip' => 38, 'bankcode' => 39, 'accNo' => 40, 'accName' => 41, 'branch' => 42, 'mobile' => 43, 'cmp' => 44, 'cmp2' => 45, ),
        self::TYPE_COLNAME       => array(AliCmbonusBTableMap::COL_ID => 0, AliCmbonusBTableMap::COL_STATUS_PV => 1, AliCmbonusBTableMap::COL_RCODE => 2, AliCmbonusBTableMap::COL_FDATE => 3, AliCmbonusBTableMap::COL_TDATE => 4, AliCmbonusBTableMap::COL_MCODE => 5, AliCmbonusBTableMap::COL_STATUS => 6, AliCmbonusBTableMap::COL_PV => 7, AliCmbonusBTableMap::COL_PVB => 8, AliCmbonusBTableMap::COL_PVH => 9, AliCmbonusBTableMap::COL_TOTAL => 10, AliCmbonusBTableMap::COL_DMBONUS => 11, AliCmbonusBTableMap::COL_EMBONUS => 12, AliCmbonusBTableMap::COL_TOTALY => 13, AliCmbonusBTableMap::COL_TOT_VAT => 14, AliCmbonusBTableMap::COL_TOT_TAX => 15, AliCmbonusBTableMap::COL_TITLE => 16, AliCmbonusBTableMap::COL_MDATE => 17, AliCmbonusBTableMap::COL_MONTH_PV => 18, AliCmbonusBTableMap::COL_MPOS => 19, AliCmbonusBTableMap::COL_C_NOTE1 => 20, AliCmbonusBTableMap::COL_C_NOTE2 => 21, AliCmbonusBTableMap::COL_C_NOTE3 => 22, AliCmbonusBTableMap::COL_C_NOTE4 => 23, AliCmbonusBTableMap::COL_C_NOTE5 => 24, AliCmbonusBTableMap::COL_C_TRANSFER => 25, AliCmbonusBTableMap::COL_C_REMARK => 26, AliCmbonusBTableMap::COL_SMS_CREDITS => 27, AliCmbonusBTableMap::COL_PAYDATE => 28, AliCmbonusBTableMap::COL_LOCATIONBASE => 29, AliCmbonusBTableMap::COL_CRATE => 30, AliCmbonusBTableMap::COL_VOUCHER => 31, AliCmbonusBTableMap::COL_MTYPE => 32, AliCmbonusBTableMap::COL_COM_TRANSFER_CHAGRE => 33, AliCmbonusBTableMap::COL_NAME_F => 34, AliCmbonusBTableMap::COL_NAME_T => 35, AliCmbonusBTableMap::COL_ID_CARD => 36, AliCmbonusBTableMap::COL_ID_TAX => 37, AliCmbonusBTableMap::COL_VIP => 38, AliCmbonusBTableMap::COL_BANKCODE => 39, AliCmbonusBTableMap::COL_ACC_NO => 40, AliCmbonusBTableMap::COL_ACC_NAME => 41, AliCmbonusBTableMap::COL_BRANCH => 42, AliCmbonusBTableMap::COL_MOBILE => 43, AliCmbonusBTableMap::COL_CMP => 44, AliCmbonusBTableMap::COL_CMP2 => 45, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'status_pv' => 1, 'rcode' => 2, 'fdate' => 3, 'tdate' => 4, 'mcode' => 5, 'status' => 6, 'pv' => 7, 'pvb' => 8, 'pvh' => 9, 'total' => 10, 'dmbonus' => 11, 'embonus' => 12, 'totaly' => 13, 'tot_vat' => 14, 'tot_tax' => 15, 'title' => 16, 'mdate' => 17, 'month_pv' => 18, 'mpos' => 19, 'c_note1' => 20, 'c_note2' => 21, 'c_note3' => 22, 'c_note4' => 23, 'c_note5' => 24, 'c_transfer' => 25, 'c_remark' => 26, 'sms_credits' => 27, 'paydate' => 28, 'locationbase' => 29, 'crate' => 30, 'voucher' => 31, 'mtype' => 32, 'com_transfer_chagre' => 33, 'name_f' => 34, 'name_t' => 35, 'id_card' => 36, 'id_tax' => 37, 'vip' => 38, 'bankcode' => 39, 'acc_no' => 40, 'acc_name' => 41, 'branch' => 42, 'mobile' => 43, 'cmp' => 44, 'cmp2' => 45, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, )
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
        $this->setName('ali_cmbonus_b');
        $this->setPhpName('AliCmbonusB');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliCmbonusB');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('status_pv', 'StatusPv', 'DECIMAL', true, 15, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 2, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', true, 15, null);
        $this->addColumn('pvb', 'Pvb', 'DECIMAL', true, 15, null);
        $this->addColumn('pvh', 'Pvh', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('dmbonus', 'Dmbonus', 'DECIMAL', true, 15, null);
        $this->addColumn('embonus', 'Embonus', 'DECIMAL', true, 15, null);
        $this->addColumn('totaly', 'Totaly', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_vat', 'TotVat', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_tax', 'TotTax', 'DECIMAL', true, 15, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('mdate', 'Mdate', 'DATE', true, null, null);
        $this->addColumn('month_pv', 'MonthPv', 'VARCHAR', true, 10, null);
        $this->addColumn('mpos', 'Mpos', 'VARCHAR', true, 255, null);
        $this->addColumn('c_note1', 'CNote1', 'VARCHAR', true, 255, null);
        $this->addColumn('c_note2', 'CNote2', 'VARCHAR', true, 255, null);
        $this->addColumn('c_note3', 'CNote3', 'VARCHAR', true, 255, null);
        $this->addColumn('c_note4', 'CNote4', 'VARCHAR', true, 255, null);
        $this->addColumn('c_note5', 'CNote5', 'VARCHAR', true, 255, null);
        $this->addColumn('c_transfer', 'CTransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('c_remark', 'CRemark', 'VARCHAR', true, 255, null);
        $this->addColumn('sms_credits', 'SmsCredits', 'INTEGER', true, null, null);
        $this->addColumn('paydate', 'Paydate', 'VARCHAR', true, 255, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('voucher', 'Voucher', 'DECIMAL', true, 15, null);
        $this->addColumn('mtype', 'Mtype', 'INTEGER', true, null, null);
        $this->addColumn('com_transfer_chagre', 'ComTransferChagre', 'DECIMAL', true, 15, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('id_card', 'IdCard', 'VARCHAR', true, 255, null);
        $this->addColumn('id_tax', 'IdTax', 'VARCHAR', true, 255, null);
        $this->addColumn('vip', 'Vip', 'INTEGER', true, 2, null);
        $this->addColumn('bankcode', 'Bankcode', 'VARCHAR', true, 5, null);
        $this->addColumn('acc_no', 'AccNo', 'VARCHAR', true, 255, null);
        $this->addColumn('acc_name', 'AccName', 'VARCHAR', true, 250, null);
        $this->addColumn('branch', 'Branch', 'VARCHAR', true, 255, null);
        $this->addColumn('mobile', 'Mobile', 'VARCHAR', true, 255, null);
        $this->addColumn('cmp', 'Cmp', 'VARCHAR', true, 255, null);
        $this->addColumn('cmp2', 'Cmp2', 'VARCHAR', true, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 0 + $offset
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
        return $withPrefix ? AliCmbonusBTableMap::CLASS_DEFAULT : AliCmbonusBTableMap::OM_CLASS;
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
     * @return array           (AliCmbonusB object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliCmbonusBTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliCmbonusBTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliCmbonusBTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliCmbonusBTableMap::OM_CLASS;
            /** @var AliCmbonusB $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliCmbonusBTableMap::addInstanceToPool($obj, $key);
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
            $key = AliCmbonusBTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliCmbonusBTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliCmbonusB $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliCmbonusBTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_ID);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_STATUS_PV);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_PV);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_PVB);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_PVH);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_DMBONUS);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_EMBONUS);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_TOTALY);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_TOT_VAT);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_TOT_TAX);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_TITLE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_MONTH_PV);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_C_NOTE1);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_C_NOTE2);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_C_NOTE3);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_C_NOTE4);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_C_NOTE5);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_C_TRANSFER);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_C_REMARK);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_SMS_CREDITS);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_VOUCHER);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_MTYPE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_COM_TRANSFER_CHAGRE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_ID_CARD);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_ID_TAX);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_VIP);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_BANKCODE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_ACC_NO);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_ACC_NAME);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_BRANCH);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_MOBILE);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_CMP);
            $criteria->addSelectColumn(AliCmbonusBTableMap::COL_CMP2);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.status_pv');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.pvb');
            $criteria->addSelectColumn($alias . '.pvh');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.dmbonus');
            $criteria->addSelectColumn($alias . '.embonus');
            $criteria->addSelectColumn($alias . '.totaly');
            $criteria->addSelectColumn($alias . '.tot_vat');
            $criteria->addSelectColumn($alias . '.tot_tax');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.mdate');
            $criteria->addSelectColumn($alias . '.month_pv');
            $criteria->addSelectColumn($alias . '.mpos');
            $criteria->addSelectColumn($alias . '.c_note1');
            $criteria->addSelectColumn($alias . '.c_note2');
            $criteria->addSelectColumn($alias . '.c_note3');
            $criteria->addSelectColumn($alias . '.c_note4');
            $criteria->addSelectColumn($alias . '.c_note5');
            $criteria->addSelectColumn($alias . '.c_transfer');
            $criteria->addSelectColumn($alias . '.c_remark');
            $criteria->addSelectColumn($alias . '.sms_credits');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.voucher');
            $criteria->addSelectColumn($alias . '.mtype');
            $criteria->addSelectColumn($alias . '.com_transfer_chagre');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.id_card');
            $criteria->addSelectColumn($alias . '.id_tax');
            $criteria->addSelectColumn($alias . '.vip');
            $criteria->addSelectColumn($alias . '.bankcode');
            $criteria->addSelectColumn($alias . '.acc_no');
            $criteria->addSelectColumn($alias . '.acc_name');
            $criteria->addSelectColumn($alias . '.branch');
            $criteria->addSelectColumn($alias . '.mobile');
            $criteria->addSelectColumn($alias . '.cmp');
            $criteria->addSelectColumn($alias . '.cmp2');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliCmbonusBTableMap::DATABASE_NAME)->getTable(AliCmbonusBTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliCmbonusBTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliCmbonusBTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliCmbonusBTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliCmbonusB or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliCmbonusB object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusBTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliCmbonusB) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliCmbonusBTableMap::DATABASE_NAME);
            $criteria->add(AliCmbonusBTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliCmbonusBQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliCmbonusBTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliCmbonusBTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_cmbonus_b table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliCmbonusBQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliCmbonusB or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliCmbonusB object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusBTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliCmbonusB object
        }

        if ($criteria->containsKey(AliCmbonusBTableMap::COL_ID) && $criteria->keyContainsValue(AliCmbonusBTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliCmbonusBTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliCmbonusBQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliCmbonusBTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliCmbonusBTableMap::buildTableMap();
