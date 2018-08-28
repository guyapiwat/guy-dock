<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliBmbonusNew;
use CciOrm\CciOrm\AliBmbonusNewQuery;
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
 * This class defines the structure of the 'ali_bmbonus_new' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliBmbonusNewTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliBmbonusNewTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_bmbonus_new';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliBmbonusNew';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliBmbonusNew';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 41;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 41;

    /**
     * the column name for the cid field
     */
    const COL_CID = 'ali_bmbonus_new.cid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_bmbonus_new.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_bmbonus_new.mcode';

    /**
     * the column name for the ro_l field
     */
    const COL_RO_L = 'ali_bmbonus_new.ro_l';

    /**
     * the column name for the ro_c field
     */
    const COL_RO_C = 'ali_bmbonus_new.ro_c';

    /**
     * the column name for the ro_r field
     */
    const COL_RO_R = 'ali_bmbonus_new.ro_r';

    /**
     * the column name for the pcrry_l field
     */
    const COL_PCRRY_L = 'ali_bmbonus_new.pcrry_l';

    /**
     * the column name for the ccpcrry_l field
     */
    const COL_CCPCRRY_L = 'ali_bmbonus_new.ccpcrry_l';

    /**
     * the column name for the ccpcrry_c field
     */
    const COL_CCPCRRY_C = 'ali_bmbonus_new.ccpcrry_c';

    /**
     * the column name for the pcrry_c field
     */
    const COL_PCRRY_C = 'ali_bmbonus_new.pcrry_c';

    /**
     * the column name for the pcrry_r field
     */
    const COL_PCRRY_R = 'ali_bmbonus_new.pcrry_r';

    /**
     * the column name for the pquota field
     */
    const COL_PQUOTA = 'ali_bmbonus_new.pquota';

    /**
     * the column name for the total_pv_ll field
     */
    const COL_TOTAL_PV_LL = 'ali_bmbonus_new.total_pv_ll';

    /**
     * the column name for the total_pv_rr field
     */
    const COL_TOTAL_PV_RR = 'ali_bmbonus_new.total_pv_rr';

    /**
     * the column name for the total_pv_l field
     */
    const COL_TOTAL_PV_L = 'ali_bmbonus_new.total_pv_l';

    /**
     * the column name for the total_pv_r field
     */
    const COL_TOTAL_PV_R = 'ali_bmbonus_new.total_pv_r';

    /**
     * the column name for the count_l field
     */
    const COL_COUNT_L = 'ali_bmbonus_new.count_l';

    /**
     * the column name for the count_c field
     */
    const COL_COUNT_C = 'ali_bmbonus_new.count_c';

    /**
     * the column name for the count_r field
     */
    const COL_COUNT_R = 'ali_bmbonus_new.count_r';

    /**
     * the column name for the carry_l field
     */
    const COL_CARRY_L = 'ali_bmbonus_new.carry_l';

    /**
     * the column name for the carry_c field
     */
    const COL_CARRY_C = 'ali_bmbonus_new.carry_c';

    /**
     * the column name for the carry_r field
     */
    const COL_CARRY_R = 'ali_bmbonus_new.carry_r';

    /**
     * the column name for the quota field
     */
    const COL_QUOTA = 'ali_bmbonus_new.quota';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_bmbonus_new.total';

    /**
     * the column name for the percer field
     */
    const COL_PERCER = 'ali_bmbonus_new.percer';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'ali_bmbonus_new.tax';

    /**
     * the column name for the totalamt field
     */
    const COL_TOTALAMT = 'ali_bmbonus_new.totalamt';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_bmbonus_new.paydate';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_bmbonus_new.mpos';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_bmbonus_new.tdate';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_bmbonus_new.fdate';

    /**
     * the column name for the pair_stop field
     */
    const COL_PAIR_STOP = 'ali_bmbonus_new.pair_stop';

    /**
     * the column name for the point field
     */
    const COL_POINT = 'ali_bmbonus_new.point';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_bmbonus_new.pos_cur';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_bmbonus_new.status';

    /**
     * the column name for the adjust field
     */
    const COL_ADJUST = 'ali_bmbonus_new.adjust';

    /**
     * the column name for the total_cmt_weak field
     */
    const COL_TOTAL_CMT_WEAK = 'ali_bmbonus_new.total_cmt_weak';

    /**
     * the column name for the total_cmt_strong field
     */
    const COL_TOTAL_CMT_STRONG = 'ali_bmbonus_new.total_cmt_strong';

    /**
     * the column name for the balance field
     */
    const COL_BALANCE = 'ali_bmbonus_new.balance';

    /**
     * the column name for the cycle_b field
     */
    const COL_CYCLE_B = 'ali_bmbonus_new.cycle_b';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_bmbonus_new.locationbase';

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
        self::TYPE_PHPNAME       => array('Cid', 'Rcode', 'Mcode', 'RoL', 'RoC', 'RoR', 'PcrryL', 'CcpcrryL', 'CcpcrryC', 'PcrryC', 'PcrryR', 'Pquota', 'TotalPvLl', 'TotalPvRr', 'TotalPvL', 'TotalPvR', 'CountL', 'CountC', 'CountR', 'CarryL', 'CarryC', 'CarryR', 'Quota', 'Total', 'Percer', 'Tax', 'Totalamt', 'Paydate', 'Mpos', 'Tdate', 'Fdate', 'PairStop', 'Point', 'PosCur', 'Status', 'Adjust', 'TotalCmtWeak', 'TotalCmtStrong', 'Balance', 'CycleB', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('cid', 'rcode', 'mcode', 'roL', 'roC', 'roR', 'pcrryL', 'ccpcrryL', 'ccpcrryC', 'pcrryC', 'pcrryR', 'pquota', 'totalPvLl', 'totalPvRr', 'totalPvL', 'totalPvR', 'countL', 'countC', 'countR', 'carryL', 'carryC', 'carryR', 'quota', 'total', 'percer', 'tax', 'totalamt', 'paydate', 'mpos', 'tdate', 'fdate', 'pairStop', 'point', 'posCur', 'status', 'adjust', 'totalCmtWeak', 'totalCmtStrong', 'balance', 'cycleB', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliBmbonusNewTableMap::COL_CID, AliBmbonusNewTableMap::COL_RCODE, AliBmbonusNewTableMap::COL_MCODE, AliBmbonusNewTableMap::COL_RO_L, AliBmbonusNewTableMap::COL_RO_C, AliBmbonusNewTableMap::COL_RO_R, AliBmbonusNewTableMap::COL_PCRRY_L, AliBmbonusNewTableMap::COL_CCPCRRY_L, AliBmbonusNewTableMap::COL_CCPCRRY_C, AliBmbonusNewTableMap::COL_PCRRY_C, AliBmbonusNewTableMap::COL_PCRRY_R, AliBmbonusNewTableMap::COL_PQUOTA, AliBmbonusNewTableMap::COL_TOTAL_PV_LL, AliBmbonusNewTableMap::COL_TOTAL_PV_RR, AliBmbonusNewTableMap::COL_TOTAL_PV_L, AliBmbonusNewTableMap::COL_TOTAL_PV_R, AliBmbonusNewTableMap::COL_COUNT_L, AliBmbonusNewTableMap::COL_COUNT_C, AliBmbonusNewTableMap::COL_COUNT_R, AliBmbonusNewTableMap::COL_CARRY_L, AliBmbonusNewTableMap::COL_CARRY_C, AliBmbonusNewTableMap::COL_CARRY_R, AliBmbonusNewTableMap::COL_QUOTA, AliBmbonusNewTableMap::COL_TOTAL, AliBmbonusNewTableMap::COL_PERCER, AliBmbonusNewTableMap::COL_TAX, AliBmbonusNewTableMap::COL_TOTALAMT, AliBmbonusNewTableMap::COL_PAYDATE, AliBmbonusNewTableMap::COL_MPOS, AliBmbonusNewTableMap::COL_TDATE, AliBmbonusNewTableMap::COL_FDATE, AliBmbonusNewTableMap::COL_PAIR_STOP, AliBmbonusNewTableMap::COL_POINT, AliBmbonusNewTableMap::COL_POS_CUR, AliBmbonusNewTableMap::COL_STATUS, AliBmbonusNewTableMap::COL_ADJUST, AliBmbonusNewTableMap::COL_TOTAL_CMT_WEAK, AliBmbonusNewTableMap::COL_TOTAL_CMT_STRONG, AliBmbonusNewTableMap::COL_BALANCE, AliBmbonusNewTableMap::COL_CYCLE_B, AliBmbonusNewTableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('cid', 'rcode', 'mcode', 'ro_l', 'ro_c', 'ro_r', 'pcrry_l', 'ccpcrry_l', 'ccpcrry_c', 'pcrry_c', 'pcrry_r', 'pquota', 'total_pv_ll', 'total_pv_rr', 'total_pv_l', 'total_pv_r', 'count_l', 'count_c', 'count_r', 'carry_l', 'carry_c', 'carry_r', 'quota', 'total', 'percer', 'tax', 'totalamt', 'paydate', 'mpos', 'tdate', 'fdate', 'pair_stop', 'point', 'pos_cur', 'status', 'adjust', 'total_cmt_weak', 'total_cmt_strong', 'balance', 'cycle_b', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Cid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'RoL' => 3, 'RoC' => 4, 'RoR' => 5, 'PcrryL' => 6, 'CcpcrryL' => 7, 'CcpcrryC' => 8, 'PcrryC' => 9, 'PcrryR' => 10, 'Pquota' => 11, 'TotalPvLl' => 12, 'TotalPvRr' => 13, 'TotalPvL' => 14, 'TotalPvR' => 15, 'CountL' => 16, 'CountC' => 17, 'CountR' => 18, 'CarryL' => 19, 'CarryC' => 20, 'CarryR' => 21, 'Quota' => 22, 'Total' => 23, 'Percer' => 24, 'Tax' => 25, 'Totalamt' => 26, 'Paydate' => 27, 'Mpos' => 28, 'Tdate' => 29, 'Fdate' => 30, 'PairStop' => 31, 'Point' => 32, 'PosCur' => 33, 'Status' => 34, 'Adjust' => 35, 'TotalCmtWeak' => 36, 'TotalCmtStrong' => 37, 'Balance' => 38, 'CycleB' => 39, 'Locationbase' => 40, ),
        self::TYPE_CAMELNAME     => array('cid' => 0, 'rcode' => 1, 'mcode' => 2, 'roL' => 3, 'roC' => 4, 'roR' => 5, 'pcrryL' => 6, 'ccpcrryL' => 7, 'ccpcrryC' => 8, 'pcrryC' => 9, 'pcrryR' => 10, 'pquota' => 11, 'totalPvLl' => 12, 'totalPvRr' => 13, 'totalPvL' => 14, 'totalPvR' => 15, 'countL' => 16, 'countC' => 17, 'countR' => 18, 'carryL' => 19, 'carryC' => 20, 'carryR' => 21, 'quota' => 22, 'total' => 23, 'percer' => 24, 'tax' => 25, 'totalamt' => 26, 'paydate' => 27, 'mpos' => 28, 'tdate' => 29, 'fdate' => 30, 'pairStop' => 31, 'point' => 32, 'posCur' => 33, 'status' => 34, 'adjust' => 35, 'totalCmtWeak' => 36, 'totalCmtStrong' => 37, 'balance' => 38, 'cycleB' => 39, 'locationbase' => 40, ),
        self::TYPE_COLNAME       => array(AliBmbonusNewTableMap::COL_CID => 0, AliBmbonusNewTableMap::COL_RCODE => 1, AliBmbonusNewTableMap::COL_MCODE => 2, AliBmbonusNewTableMap::COL_RO_L => 3, AliBmbonusNewTableMap::COL_RO_C => 4, AliBmbonusNewTableMap::COL_RO_R => 5, AliBmbonusNewTableMap::COL_PCRRY_L => 6, AliBmbonusNewTableMap::COL_CCPCRRY_L => 7, AliBmbonusNewTableMap::COL_CCPCRRY_C => 8, AliBmbonusNewTableMap::COL_PCRRY_C => 9, AliBmbonusNewTableMap::COL_PCRRY_R => 10, AliBmbonusNewTableMap::COL_PQUOTA => 11, AliBmbonusNewTableMap::COL_TOTAL_PV_LL => 12, AliBmbonusNewTableMap::COL_TOTAL_PV_RR => 13, AliBmbonusNewTableMap::COL_TOTAL_PV_L => 14, AliBmbonusNewTableMap::COL_TOTAL_PV_R => 15, AliBmbonusNewTableMap::COL_COUNT_L => 16, AliBmbonusNewTableMap::COL_COUNT_C => 17, AliBmbonusNewTableMap::COL_COUNT_R => 18, AliBmbonusNewTableMap::COL_CARRY_L => 19, AliBmbonusNewTableMap::COL_CARRY_C => 20, AliBmbonusNewTableMap::COL_CARRY_R => 21, AliBmbonusNewTableMap::COL_QUOTA => 22, AliBmbonusNewTableMap::COL_TOTAL => 23, AliBmbonusNewTableMap::COL_PERCER => 24, AliBmbonusNewTableMap::COL_TAX => 25, AliBmbonusNewTableMap::COL_TOTALAMT => 26, AliBmbonusNewTableMap::COL_PAYDATE => 27, AliBmbonusNewTableMap::COL_MPOS => 28, AliBmbonusNewTableMap::COL_TDATE => 29, AliBmbonusNewTableMap::COL_FDATE => 30, AliBmbonusNewTableMap::COL_PAIR_STOP => 31, AliBmbonusNewTableMap::COL_POINT => 32, AliBmbonusNewTableMap::COL_POS_CUR => 33, AliBmbonusNewTableMap::COL_STATUS => 34, AliBmbonusNewTableMap::COL_ADJUST => 35, AliBmbonusNewTableMap::COL_TOTAL_CMT_WEAK => 36, AliBmbonusNewTableMap::COL_TOTAL_CMT_STRONG => 37, AliBmbonusNewTableMap::COL_BALANCE => 38, AliBmbonusNewTableMap::COL_CYCLE_B => 39, AliBmbonusNewTableMap::COL_LOCATIONBASE => 40, ),
        self::TYPE_FIELDNAME     => array('cid' => 0, 'rcode' => 1, 'mcode' => 2, 'ro_l' => 3, 'ro_c' => 4, 'ro_r' => 5, 'pcrry_l' => 6, 'ccpcrry_l' => 7, 'ccpcrry_c' => 8, 'pcrry_c' => 9, 'pcrry_r' => 10, 'pquota' => 11, 'total_pv_ll' => 12, 'total_pv_rr' => 13, 'total_pv_l' => 14, 'total_pv_r' => 15, 'count_l' => 16, 'count_c' => 17, 'count_r' => 18, 'carry_l' => 19, 'carry_c' => 20, 'carry_r' => 21, 'quota' => 22, 'total' => 23, 'percer' => 24, 'tax' => 25, 'totalamt' => 26, 'paydate' => 27, 'mpos' => 28, 'tdate' => 29, 'fdate' => 30, 'pair_stop' => 31, 'point' => 32, 'pos_cur' => 33, 'status' => 34, 'adjust' => 35, 'total_cmt_weak' => 36, 'total_cmt_strong' => 37, 'balance' => 38, 'cycle_b' => 39, 'locationbase' => 40, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
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
        $this->setName('ali_bmbonus_new');
        $this->setPhpName('AliBmbonusNew');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliBmbonusNew');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('cid', 'Cid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 7, null);
        $this->addColumn('ro_l', 'RoL', 'DECIMAL', true, 15, null);
        $this->addColumn('ro_c', 'RoC', 'DECIMAL', true, 15, null);
        $this->addColumn('ro_r', 'RoR', 'DECIMAL', true, 15, null);
        $this->addColumn('pcrry_l', 'PcrryL', 'DECIMAL', true, 15, null);
        $this->addColumn('ccpcrry_l', 'CcpcrryL', 'VARCHAR', true, 255, null);
        $this->addColumn('ccpcrry_c', 'CcpcrryC', 'VARCHAR', true, 255, null);
        $this->addColumn('pcrry_c', 'PcrryC', 'DECIMAL', true, 15, null);
        $this->addColumn('pcrry_r', 'PcrryR', 'DECIMAL', true, 15, null);
        $this->addColumn('pquota', 'Pquota', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_ll', 'TotalPvLl', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_rr', 'TotalPvRr', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_l', 'TotalPvL', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_r', 'TotalPvR', 'DECIMAL', true, 15, null);
        $this->addColumn('count_l', 'CountL', 'DECIMAL', true, 15, null);
        $this->addColumn('count_c', 'CountC', 'DECIMAL', true, 15, null);
        $this->addColumn('count_r', 'CountR', 'DECIMAL', true, 15, null);
        $this->addColumn('carry_l', 'CarryL', 'DECIMAL', true, 15, null);
        $this->addColumn('carry_c', 'CarryC', 'DECIMAL', true, 15, null);
        $this->addColumn('carry_r', 'CarryR', 'DECIMAL', true, 15, null);
        $this->addColumn('quota', 'Quota', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('percer', 'Percer', 'DECIMAL', true, 15, null);
        $this->addColumn('tax', 'Tax', 'DECIMAL', true, 15, null);
        $this->addColumn('totalamt', 'Totalamt', 'DECIMAL', true, 15, null);
        $this->addColumn('paydate', 'Paydate', 'DATE', true, null, '0000-00-00');
        $this->addColumn('mpos', 'Mpos', 'VARCHAR', false, 10, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('pair_stop', 'PairStop', 'DECIMAL', true, 15, null);
        $this->addColumn('point', 'Point', 'INTEGER', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 255, null);
        $this->addColumn('adjust', 'Adjust', 'DECIMAL', true, 15, null);
        $this->addColumn('total_cmt_weak', 'TotalCmtWeak', 'DECIMAL', true, 15, null);
        $this->addColumn('total_cmt_strong', 'TotalCmtStrong', 'DECIMAL', true, 15, null);
        $this->addColumn('balance', 'Balance', 'DECIMAL', true, 15, null);
        $this->addColumn('cycle_b', 'CycleB', 'INTEGER', true, 3, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliBmbonusNewTableMap::CLASS_DEFAULT : AliBmbonusNewTableMap::OM_CLASS;
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
     * @return array           (AliBmbonusNew object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliBmbonusNewTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliBmbonusNewTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliBmbonusNewTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliBmbonusNewTableMap::OM_CLASS;
            /** @var AliBmbonusNew $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliBmbonusNewTableMap::addInstanceToPool($obj, $key);
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
            $key = AliBmbonusNewTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliBmbonusNewTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliBmbonusNew $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliBmbonusNewTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_CID);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_RO_L);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_RO_C);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_RO_R);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_PCRRY_L);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_CCPCRRY_L);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_CCPCRRY_C);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_PCRRY_C);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_PCRRY_R);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_PQUOTA);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TOTAL_PV_LL);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TOTAL_PV_RR);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TOTAL_PV_L);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TOTAL_PV_R);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_COUNT_L);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_COUNT_C);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_COUNT_R);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_CARRY_L);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_CARRY_C);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_CARRY_R);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_QUOTA);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_PERCER);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TAX);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TOTALAMT);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_PAIR_STOP);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_POINT);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_ADJUST);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TOTAL_CMT_WEAK);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_TOTAL_CMT_STRONG);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_BALANCE);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_CYCLE_B);
            $criteria->addSelectColumn(AliBmbonusNewTableMap::COL_LOCATIONBASE);
        } else {
            $criteria->addSelectColumn($alias . '.cid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.ro_l');
            $criteria->addSelectColumn($alias . '.ro_c');
            $criteria->addSelectColumn($alias . '.ro_r');
            $criteria->addSelectColumn($alias . '.pcrry_l');
            $criteria->addSelectColumn($alias . '.ccpcrry_l');
            $criteria->addSelectColumn($alias . '.ccpcrry_c');
            $criteria->addSelectColumn($alias . '.pcrry_c');
            $criteria->addSelectColumn($alias . '.pcrry_r');
            $criteria->addSelectColumn($alias . '.pquota');
            $criteria->addSelectColumn($alias . '.total_pv_ll');
            $criteria->addSelectColumn($alias . '.total_pv_rr');
            $criteria->addSelectColumn($alias . '.total_pv_l');
            $criteria->addSelectColumn($alias . '.total_pv_r');
            $criteria->addSelectColumn($alias . '.count_l');
            $criteria->addSelectColumn($alias . '.count_c');
            $criteria->addSelectColumn($alias . '.count_r');
            $criteria->addSelectColumn($alias . '.carry_l');
            $criteria->addSelectColumn($alias . '.carry_c');
            $criteria->addSelectColumn($alias . '.carry_r');
            $criteria->addSelectColumn($alias . '.quota');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.percer');
            $criteria->addSelectColumn($alias . '.tax');
            $criteria->addSelectColumn($alias . '.totalamt');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.mpos');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.pair_stop');
            $criteria->addSelectColumn($alias . '.point');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.adjust');
            $criteria->addSelectColumn($alias . '.total_cmt_weak');
            $criteria->addSelectColumn($alias . '.total_cmt_strong');
            $criteria->addSelectColumn($alias . '.balance');
            $criteria->addSelectColumn($alias . '.cycle_b');
            $criteria->addSelectColumn($alias . '.locationbase');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliBmbonusNewTableMap::DATABASE_NAME)->getTable(AliBmbonusNewTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliBmbonusNewTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliBmbonusNewTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliBmbonusNewTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliBmbonusNew or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliBmbonusNew object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusNewTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliBmbonusNew) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliBmbonusNewTableMap::DATABASE_NAME);
            $criteria->add(AliBmbonusNewTableMap::COL_CID, (array) $values, Criteria::IN);
        }

        $query = AliBmbonusNewQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliBmbonusNewTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliBmbonusNewTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_bmbonus_new table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliBmbonusNewQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliBmbonusNew or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliBmbonusNew object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusNewTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliBmbonusNew object
        }

        if ($criteria->containsKey(AliBmbonusNewTableMap::COL_CID) && $criteria->keyContainsValue(AliBmbonusNewTableMap::COL_CID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliBmbonusNewTableMap::COL_CID.')');
        }


        // Set the correct dbName
        $query = AliBmbonusNewQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliBmbonusNewTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliBmbonusNewTableMap::buildTableMap();
