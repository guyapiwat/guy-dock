<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliCmbonus;
use CciOrm\CciOrm\AliCmbonusQuery;
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
 * This class defines the structure of the 'ali_cmbonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliCmbonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliCmbonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_cmbonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliCmbonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliCmbonus';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 47;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 47;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_cmbonus.id';

    /**
     * the column name for the status_pv field
     */
    const COL_STATUS_PV = 'ali_cmbonus.status_pv';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_cmbonus.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_cmbonus.mcode';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_cmbonus.status';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_cmbonus.pv';

    /**
     * the column name for the pvb field
     */
    const COL_PVB = 'ali_cmbonus.pvb';

    /**
     * the column name for the pvh field
     */
    const COL_PVH = 'ali_cmbonus.pvh';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_cmbonus.ewallet';

    /**
     * the column name for the fob field
     */
    const COL_FOB = 'ali_cmbonus.fob';

    /**
     * the column name for the cycle field
     */
    const COL_CYCLE = 'ali_cmbonus.cycle';

    /**
     * the column name for the smb field
     */
    const COL_SMB = 'ali_cmbonus.smb';

    /**
     * the column name for the matching field
     */
    const COL_MATCHING = 'ali_cmbonus.matching';

    /**
     * the column name for the onetime field
     */
    const COL_ONETIME = 'ali_cmbonus.onetime';

    /**
     * the column name for the atoship field
     */
    const COL_ATOSHIP = 'ali_cmbonus.atoship';

    /**
     * the column name for the ecom field
     */
    const COL_ECOM = 'ali_cmbonus.ecom';

    /**
     * the column name for the ecom_round field
     */
    const COL_ECOM_ROUND = 'ali_cmbonus.ecom_round';

    /**
     * the column name for the ecomtranfer field
     */
    const COL_ECOMTRANFER = 'ali_cmbonus.ecomtranfer';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_cmbonus.total';

    /**
     * the column name for the totaly field
     */
    const COL_TOTALY = 'ali_cmbonus.totaly';

    /**
     * the column name for the tot_vat field
     */
    const COL_TOT_VAT = 'ali_cmbonus.tot_vat';

    /**
     * the column name for the tot_tax field
     */
    const COL_TOT_TAX = 'ali_cmbonus.tot_tax';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'ali_cmbonus.title';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_cmbonus.mdate';

    /**
     * the column name for the month_pv field
     */
    const COL_MONTH_PV = 'ali_cmbonus.month_pv';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_cmbonus.mpos';

    /**
     * the column name for the c_note1 field
     */
    const COL_C_NOTE1 = 'ali_cmbonus.c_note1';

    /**
     * the column name for the c_note2 field
     */
    const COL_C_NOTE2 = 'ali_cmbonus.c_note2';

    /**
     * the column name for the c_note3 field
     */
    const COL_C_NOTE3 = 'ali_cmbonus.c_note3';

    /**
     * the column name for the c_note4 field
     */
    const COL_C_NOTE4 = 'ali_cmbonus.c_note4';

    /**
     * the column name for the c_note5 field
     */
    const COL_C_NOTE5 = 'ali_cmbonus.c_note5';

    /**
     * the column name for the c_transfer field
     */
    const COL_C_TRANSFER = 'ali_cmbonus.c_transfer';

    /**
     * the column name for the c_remark field
     */
    const COL_C_REMARK = 'ali_cmbonus.c_remark';

    /**
     * the column name for the sms_credits field
     */
    const COL_SMS_CREDITS = 'ali_cmbonus.sms_credits';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_cmbonus.paydate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_cmbonus.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_cmbonus.crate';

    /**
     * the column name for the voucher field
     */
    const COL_VOUCHER = 'ali_cmbonus.voucher';

    /**
     * the column name for the mtype field
     */
    const COL_MTYPE = 'ali_cmbonus.mtype';

    /**
     * the column name for the com_transfer_chagre field
     */
    const COL_COM_TRANSFER_CHAGRE = 'ali_cmbonus.com_transfer_chagre';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_cmbonus.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_cmbonus.name_t';

    /**
     * the column name for the id_card field
     */
    const COL_ID_CARD = 'ali_cmbonus.id_card';

    /**
     * the column name for the id_tax field
     */
    const COL_ID_TAX = 'ali_cmbonus.id_tax';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_cmbonus.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_cmbonus.tdate';

    /**
     * the column name for the bankcode field
     */
    const COL_BANKCODE = 'ali_cmbonus.bankcode';

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
        self::TYPE_PHPNAME       => array('Id', 'StatusPv', 'Rcode', 'Mcode', 'Status', 'Pv', 'Pvb', 'Pvh', 'Ewallet', 'Fob', 'Cycle', 'Smb', 'Matching', 'Onetime', 'Atoship', 'Ecom', 'EcomRound', 'Ecomtranfer', 'Total', 'Totaly', 'TotVat', 'TotTax', 'Title', 'Mdate', 'MonthPv', 'Mpos', 'CNote1', 'CNote2', 'CNote3', 'CNote4', 'CNote5', 'CTransfer', 'CRemark', 'SmsCredits', 'Paydate', 'Locationbase', 'Crate', 'Voucher', 'Mtype', 'ComTransferChagre', 'NameF', 'NameT', 'IdCard', 'IdTax', 'Fdate', 'Tdate', 'Bankcode', ),
        self::TYPE_CAMELNAME     => array('id', 'statusPv', 'rcode', 'mcode', 'status', 'pv', 'pvb', 'pvh', 'ewallet', 'fob', 'cycle', 'smb', 'matching', 'onetime', 'atoship', 'ecom', 'ecomRound', 'ecomtranfer', 'total', 'totaly', 'totVat', 'totTax', 'title', 'mdate', 'monthPv', 'mpos', 'cNote1', 'cNote2', 'cNote3', 'cNote4', 'cNote5', 'cTransfer', 'cRemark', 'smsCredits', 'paydate', 'locationbase', 'crate', 'voucher', 'mtype', 'comTransferChagre', 'nameF', 'nameT', 'idCard', 'idTax', 'fdate', 'tdate', 'bankcode', ),
        self::TYPE_COLNAME       => array(AliCmbonusTableMap::COL_ID, AliCmbonusTableMap::COL_STATUS_PV, AliCmbonusTableMap::COL_RCODE, AliCmbonusTableMap::COL_MCODE, AliCmbonusTableMap::COL_STATUS, AliCmbonusTableMap::COL_PV, AliCmbonusTableMap::COL_PVB, AliCmbonusTableMap::COL_PVH, AliCmbonusTableMap::COL_EWALLET, AliCmbonusTableMap::COL_FOB, AliCmbonusTableMap::COL_CYCLE, AliCmbonusTableMap::COL_SMB, AliCmbonusTableMap::COL_MATCHING, AliCmbonusTableMap::COL_ONETIME, AliCmbonusTableMap::COL_ATOSHIP, AliCmbonusTableMap::COL_ECOM, AliCmbonusTableMap::COL_ECOM_ROUND, AliCmbonusTableMap::COL_ECOMTRANFER, AliCmbonusTableMap::COL_TOTAL, AliCmbonusTableMap::COL_TOTALY, AliCmbonusTableMap::COL_TOT_VAT, AliCmbonusTableMap::COL_TOT_TAX, AliCmbonusTableMap::COL_TITLE, AliCmbonusTableMap::COL_MDATE, AliCmbonusTableMap::COL_MONTH_PV, AliCmbonusTableMap::COL_MPOS, AliCmbonusTableMap::COL_C_NOTE1, AliCmbonusTableMap::COL_C_NOTE2, AliCmbonusTableMap::COL_C_NOTE3, AliCmbonusTableMap::COL_C_NOTE4, AliCmbonusTableMap::COL_C_NOTE5, AliCmbonusTableMap::COL_C_TRANSFER, AliCmbonusTableMap::COL_C_REMARK, AliCmbonusTableMap::COL_SMS_CREDITS, AliCmbonusTableMap::COL_PAYDATE, AliCmbonusTableMap::COL_LOCATIONBASE, AliCmbonusTableMap::COL_CRATE, AliCmbonusTableMap::COL_VOUCHER, AliCmbonusTableMap::COL_MTYPE, AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE, AliCmbonusTableMap::COL_NAME_F, AliCmbonusTableMap::COL_NAME_T, AliCmbonusTableMap::COL_ID_CARD, AliCmbonusTableMap::COL_ID_TAX, AliCmbonusTableMap::COL_FDATE, AliCmbonusTableMap::COL_TDATE, AliCmbonusTableMap::COL_BANKCODE, ),
        self::TYPE_FIELDNAME     => array('id', 'status_pv', 'rcode', 'mcode', 'status', 'pv', 'pvb', 'pvh', 'ewallet', 'fob', 'cycle', 'smb', 'matching', 'onetime', 'atoship', 'ecom', 'ecom_round', 'ecomtranfer', 'total', 'totaly', 'tot_vat', 'tot_tax', 'title', 'mdate', 'month_pv', 'mpos', 'c_note1', 'c_note2', 'c_note3', 'c_note4', 'c_note5', 'c_transfer', 'c_remark', 'sms_credits', 'paydate', 'locationbase', 'crate', 'voucher', 'mtype', 'com_transfer_chagre', 'name_f', 'name_t', 'id_card', 'id_tax', 'fdate', 'tdate', 'bankcode', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'StatusPv' => 1, 'Rcode' => 2, 'Mcode' => 3, 'Status' => 4, 'Pv' => 5, 'Pvb' => 6, 'Pvh' => 7, 'Ewallet' => 8, 'Fob' => 9, 'Cycle' => 10, 'Smb' => 11, 'Matching' => 12, 'Onetime' => 13, 'Atoship' => 14, 'Ecom' => 15, 'EcomRound' => 16, 'Ecomtranfer' => 17, 'Total' => 18, 'Totaly' => 19, 'TotVat' => 20, 'TotTax' => 21, 'Title' => 22, 'Mdate' => 23, 'MonthPv' => 24, 'Mpos' => 25, 'CNote1' => 26, 'CNote2' => 27, 'CNote3' => 28, 'CNote4' => 29, 'CNote5' => 30, 'CTransfer' => 31, 'CRemark' => 32, 'SmsCredits' => 33, 'Paydate' => 34, 'Locationbase' => 35, 'Crate' => 36, 'Voucher' => 37, 'Mtype' => 38, 'ComTransferChagre' => 39, 'NameF' => 40, 'NameT' => 41, 'IdCard' => 42, 'IdTax' => 43, 'Fdate' => 44, 'Tdate' => 45, 'Bankcode' => 46, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'statusPv' => 1, 'rcode' => 2, 'mcode' => 3, 'status' => 4, 'pv' => 5, 'pvb' => 6, 'pvh' => 7, 'ewallet' => 8, 'fob' => 9, 'cycle' => 10, 'smb' => 11, 'matching' => 12, 'onetime' => 13, 'atoship' => 14, 'ecom' => 15, 'ecomRound' => 16, 'ecomtranfer' => 17, 'total' => 18, 'totaly' => 19, 'totVat' => 20, 'totTax' => 21, 'title' => 22, 'mdate' => 23, 'monthPv' => 24, 'mpos' => 25, 'cNote1' => 26, 'cNote2' => 27, 'cNote3' => 28, 'cNote4' => 29, 'cNote5' => 30, 'cTransfer' => 31, 'cRemark' => 32, 'smsCredits' => 33, 'paydate' => 34, 'locationbase' => 35, 'crate' => 36, 'voucher' => 37, 'mtype' => 38, 'comTransferChagre' => 39, 'nameF' => 40, 'nameT' => 41, 'idCard' => 42, 'idTax' => 43, 'fdate' => 44, 'tdate' => 45, 'bankcode' => 46, ),
        self::TYPE_COLNAME       => array(AliCmbonusTableMap::COL_ID => 0, AliCmbonusTableMap::COL_STATUS_PV => 1, AliCmbonusTableMap::COL_RCODE => 2, AliCmbonusTableMap::COL_MCODE => 3, AliCmbonusTableMap::COL_STATUS => 4, AliCmbonusTableMap::COL_PV => 5, AliCmbonusTableMap::COL_PVB => 6, AliCmbonusTableMap::COL_PVH => 7, AliCmbonusTableMap::COL_EWALLET => 8, AliCmbonusTableMap::COL_FOB => 9, AliCmbonusTableMap::COL_CYCLE => 10, AliCmbonusTableMap::COL_SMB => 11, AliCmbonusTableMap::COL_MATCHING => 12, AliCmbonusTableMap::COL_ONETIME => 13, AliCmbonusTableMap::COL_ATOSHIP => 14, AliCmbonusTableMap::COL_ECOM => 15, AliCmbonusTableMap::COL_ECOM_ROUND => 16, AliCmbonusTableMap::COL_ECOMTRANFER => 17, AliCmbonusTableMap::COL_TOTAL => 18, AliCmbonusTableMap::COL_TOTALY => 19, AliCmbonusTableMap::COL_TOT_VAT => 20, AliCmbonusTableMap::COL_TOT_TAX => 21, AliCmbonusTableMap::COL_TITLE => 22, AliCmbonusTableMap::COL_MDATE => 23, AliCmbonusTableMap::COL_MONTH_PV => 24, AliCmbonusTableMap::COL_MPOS => 25, AliCmbonusTableMap::COL_C_NOTE1 => 26, AliCmbonusTableMap::COL_C_NOTE2 => 27, AliCmbonusTableMap::COL_C_NOTE3 => 28, AliCmbonusTableMap::COL_C_NOTE4 => 29, AliCmbonusTableMap::COL_C_NOTE5 => 30, AliCmbonusTableMap::COL_C_TRANSFER => 31, AliCmbonusTableMap::COL_C_REMARK => 32, AliCmbonusTableMap::COL_SMS_CREDITS => 33, AliCmbonusTableMap::COL_PAYDATE => 34, AliCmbonusTableMap::COL_LOCATIONBASE => 35, AliCmbonusTableMap::COL_CRATE => 36, AliCmbonusTableMap::COL_VOUCHER => 37, AliCmbonusTableMap::COL_MTYPE => 38, AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE => 39, AliCmbonusTableMap::COL_NAME_F => 40, AliCmbonusTableMap::COL_NAME_T => 41, AliCmbonusTableMap::COL_ID_CARD => 42, AliCmbonusTableMap::COL_ID_TAX => 43, AliCmbonusTableMap::COL_FDATE => 44, AliCmbonusTableMap::COL_TDATE => 45, AliCmbonusTableMap::COL_BANKCODE => 46, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'status_pv' => 1, 'rcode' => 2, 'mcode' => 3, 'status' => 4, 'pv' => 5, 'pvb' => 6, 'pvh' => 7, 'ewallet' => 8, 'fob' => 9, 'cycle' => 10, 'smb' => 11, 'matching' => 12, 'onetime' => 13, 'atoship' => 14, 'ecom' => 15, 'ecom_round' => 16, 'ecomtranfer' => 17, 'total' => 18, 'totaly' => 19, 'tot_vat' => 20, 'tot_tax' => 21, 'title' => 22, 'mdate' => 23, 'month_pv' => 24, 'mpos' => 25, 'c_note1' => 26, 'c_note2' => 27, 'c_note3' => 28, 'c_note4' => 29, 'c_note5' => 30, 'c_transfer' => 31, 'c_remark' => 32, 'sms_credits' => 33, 'paydate' => 34, 'locationbase' => 35, 'crate' => 36, 'voucher' => 37, 'mtype' => 38, 'com_transfer_chagre' => 39, 'name_f' => 40, 'name_t' => 41, 'id_card' => 42, 'id_tax' => 43, 'fdate' => 44, 'tdate' => 45, 'bankcode' => 46, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
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
        $this->setName('ali_cmbonus');
        $this->setPhpName('AliCmbonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliCmbonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('status_pv', 'StatusPv', 'DECIMAL', true, 15, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 2, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', true, 15, null);
        $this->addColumn('pvb', 'Pvb', 'DECIMAL', true, 15, null);
        $this->addColumn('pvh', 'Pvh', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet', 'Ewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('fob', 'Fob', 'DECIMAL', true, 15, null);
        $this->addColumn('cycle', 'Cycle', 'DECIMAL', true, 15, null);
        $this->addColumn('smb', 'Smb', 'DECIMAL', true, 15, null);
        $this->addColumn('matching', 'Matching', 'DECIMAL', true, 15, null);
        $this->addColumn('onetime', 'Onetime', 'DECIMAL', true, 15, null);
        $this->addColumn('atoship', 'Atoship', 'DECIMAL', true, 15, null);
        $this->addColumn('ecom', 'Ecom', 'DECIMAL', true, 15, null);
        $this->addColumn('ecom_round', 'EcomRound', 'DECIMAL', true, 15, null);
        $this->addColumn('ecomtranfer', 'Ecomtranfer', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
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
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('bankcode', 'Bankcode', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliCmbonusTableMap::CLASS_DEFAULT : AliCmbonusTableMap::OM_CLASS;
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
     * @return array           (AliCmbonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliCmbonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliCmbonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliCmbonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliCmbonusTableMap::OM_CLASS;
            /** @var AliCmbonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliCmbonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliCmbonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliCmbonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliCmbonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliCmbonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_ID);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_STATUS_PV);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_PV);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_PVB);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_PVH);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_FOB);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_CYCLE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_SMB);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_MATCHING);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_ONETIME);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_ATOSHIP);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_ECOM);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_ECOM_ROUND);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_ECOMTRANFER);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_TOTALY);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_TOT_VAT);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_TOT_TAX);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_TITLE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_MONTH_PV);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_C_NOTE1);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_C_NOTE2);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_C_NOTE3);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_C_NOTE4);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_C_NOTE5);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_C_TRANSFER);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_C_REMARK);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_SMS_CREDITS);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_VOUCHER);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_MTYPE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_COM_TRANSFER_CHAGRE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_ID_CARD);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_ID_TAX);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliCmbonusTableMap::COL_BANKCODE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.status_pv');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.pvb');
            $criteria->addSelectColumn($alias . '.pvh');
            $criteria->addSelectColumn($alias . '.ewallet');
            $criteria->addSelectColumn($alias . '.fob');
            $criteria->addSelectColumn($alias . '.cycle');
            $criteria->addSelectColumn($alias . '.smb');
            $criteria->addSelectColumn($alias . '.matching');
            $criteria->addSelectColumn($alias . '.onetime');
            $criteria->addSelectColumn($alias . '.atoship');
            $criteria->addSelectColumn($alias . '.ecom');
            $criteria->addSelectColumn($alias . '.ecom_round');
            $criteria->addSelectColumn($alias . '.ecomtranfer');
            $criteria->addSelectColumn($alias . '.total');
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
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.bankcode');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliCmbonusTableMap::DATABASE_NAME)->getTable(AliCmbonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliCmbonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliCmbonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliCmbonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliCmbonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliCmbonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliCmbonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliCmbonusTableMap::DATABASE_NAME);
            $criteria->add(AliCmbonusTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliCmbonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliCmbonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliCmbonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_cmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliCmbonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliCmbonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliCmbonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCmbonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliCmbonus object
        }

        if ($criteria->containsKey(AliCmbonusTableMap::COL_ID) && $criteria->keyContainsValue(AliCmbonusTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliCmbonusTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliCmbonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliCmbonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliCmbonusTableMap::buildTableMap();
