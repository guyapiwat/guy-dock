<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliBmbonus;
use CciOrm\CciOrm\AliBmbonusQuery;
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
 * This class defines the structure of the 'ali_bmbonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliBmbonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliBmbonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_bmbonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliBmbonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliBmbonus';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 34;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 34;

    /**
     * the column name for the cid field
     */
    const COL_CID = 'ali_bmbonus.cid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_bmbonus.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_bmbonus.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_bmbonus.name_t';

    /**
     * the column name for the ro_l field
     */
    const COL_RO_L = 'ali_bmbonus.ro_l';

    /**
     * the column name for the ro_c field
     */
    const COL_RO_C = 'ali_bmbonus.ro_c';

    /**
     * the column name for the ro_r field
     */
    const COL_RO_R = 'ali_bmbonus.ro_r';

    /**
     * the column name for the pcrry_l field
     */
    const COL_PCRRY_L = 'ali_bmbonus.pcrry_l';

    /**
     * the column name for the pcrry_c field
     */
    const COL_PCRRY_C = 'ali_bmbonus.pcrry_c';

    /**
     * the column name for the pquota field
     */
    const COL_PQUOTA = 'ali_bmbonus.pquota';

    /**
     * the column name for the total_pv_ll field
     */
    const COL_TOTAL_PV_LL = 'ali_bmbonus.total_pv_ll';

    /**
     * the column name for the total_pv_rr field
     */
    const COL_TOTAL_PV_RR = 'ali_bmbonus.total_pv_rr';

    /**
     * the column name for the total_pv_l field
     */
    const COL_TOTAL_PV_L = 'ali_bmbonus.total_pv_l';

    /**
     * the column name for the total_pv_r field
     */
    const COL_TOTAL_PV_R = 'ali_bmbonus.total_pv_r';

    /**
     * the column name for the carry_l field
     */
    const COL_CARRY_L = 'ali_bmbonus.carry_l';

    /**
     * the column name for the carry_c field
     */
    const COL_CARRY_C = 'ali_bmbonus.carry_c';

    /**
     * the column name for the carry_r field
     */
    const COL_CARRY_R = 'ali_bmbonus.carry_r';

    /**
     * the column name for the quota field
     */
    const COL_QUOTA = 'ali_bmbonus.quota';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_bmbonus.total';

    /**
     * the column name for the percer field
     */
    const COL_PERCER = 'ali_bmbonus.percer';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'ali_bmbonus.tax';

    /**
     * the column name for the totalamt field
     */
    const COL_TOTALAMT = 'ali_bmbonus.totalamt';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_bmbonus.paydate';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_bmbonus.mpos';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_bmbonus.tdate';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_bmbonus.fdate';

    /**
     * the column name for the pair_stop field
     */
    const COL_PAIR_STOP = 'ali_bmbonus.pair_stop';

    /**
     * the column name for the point field
     */
    const COL_POINT = 'ali_bmbonus.point';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_bmbonus.status';

    /**
     * the column name for the adjust field
     */
    const COL_ADJUST = 'ali_bmbonus.adjust';

    /**
     * the column name for the balance field
     */
    const COL_BALANCE = 'ali_bmbonus.balance';

    /**
     * the column name for the cycle_b field
     */
    const COL_CYCLE_B = 'ali_bmbonus.cycle_b';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_bmbonus.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_bmbonus.crate';

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
        self::TYPE_PHPNAME       => array('Cid', 'Rcode', 'Mcode', 'NameT', 'RoL', 'RoC', 'RoR', 'PcrryL', 'PcrryC', 'Pquota', 'TotalPvLl', 'TotalPvRr', 'TotalPvL', 'TotalPvR', 'CarryL', 'CarryC', 'CarryR', 'Quota', 'Total', 'Percer', 'Tax', 'Totalamt', 'Paydate', 'Mpos', 'Tdate', 'Fdate', 'PairStop', 'Point', 'Status', 'Adjust', 'Balance', 'CycleB', 'Locationbase', 'Crate', ),
        self::TYPE_CAMELNAME     => array('cid', 'rcode', 'mcode', 'nameT', 'roL', 'roC', 'roR', 'pcrryL', 'pcrryC', 'pquota', 'totalPvLl', 'totalPvRr', 'totalPvL', 'totalPvR', 'carryL', 'carryC', 'carryR', 'quota', 'total', 'percer', 'tax', 'totalamt', 'paydate', 'mpos', 'tdate', 'fdate', 'pairStop', 'point', 'status', 'adjust', 'balance', 'cycleB', 'locationbase', 'crate', ),
        self::TYPE_COLNAME       => array(AliBmbonusTableMap::COL_CID, AliBmbonusTableMap::COL_RCODE, AliBmbonusTableMap::COL_MCODE, AliBmbonusTableMap::COL_NAME_T, AliBmbonusTableMap::COL_RO_L, AliBmbonusTableMap::COL_RO_C, AliBmbonusTableMap::COL_RO_R, AliBmbonusTableMap::COL_PCRRY_L, AliBmbonusTableMap::COL_PCRRY_C, AliBmbonusTableMap::COL_PQUOTA, AliBmbonusTableMap::COL_TOTAL_PV_LL, AliBmbonusTableMap::COL_TOTAL_PV_RR, AliBmbonusTableMap::COL_TOTAL_PV_L, AliBmbonusTableMap::COL_TOTAL_PV_R, AliBmbonusTableMap::COL_CARRY_L, AliBmbonusTableMap::COL_CARRY_C, AliBmbonusTableMap::COL_CARRY_R, AliBmbonusTableMap::COL_QUOTA, AliBmbonusTableMap::COL_TOTAL, AliBmbonusTableMap::COL_PERCER, AliBmbonusTableMap::COL_TAX, AliBmbonusTableMap::COL_TOTALAMT, AliBmbonusTableMap::COL_PAYDATE, AliBmbonusTableMap::COL_MPOS, AliBmbonusTableMap::COL_TDATE, AliBmbonusTableMap::COL_FDATE, AliBmbonusTableMap::COL_PAIR_STOP, AliBmbonusTableMap::COL_POINT, AliBmbonusTableMap::COL_STATUS, AliBmbonusTableMap::COL_ADJUST, AliBmbonusTableMap::COL_BALANCE, AliBmbonusTableMap::COL_CYCLE_B, AliBmbonusTableMap::COL_LOCATIONBASE, AliBmbonusTableMap::COL_CRATE, ),
        self::TYPE_FIELDNAME     => array('cid', 'rcode', 'mcode', 'name_t', 'ro_l', 'ro_c', 'ro_r', 'pcrry_l', 'pcrry_c', 'pquota', 'total_pv_ll', 'total_pv_rr', 'total_pv_l', 'total_pv_r', 'carry_l', 'carry_c', 'carry_r', 'quota', 'total', 'percer', 'tax', 'totalamt', 'paydate', 'mpos', 'tdate', 'fdate', 'pair_stop', 'point', 'status', 'adjust', 'balance', 'cycle_b', 'locationbase', 'crate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Cid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameT' => 3, 'RoL' => 4, 'RoC' => 5, 'RoR' => 6, 'PcrryL' => 7, 'PcrryC' => 8, 'Pquota' => 9, 'TotalPvLl' => 10, 'TotalPvRr' => 11, 'TotalPvL' => 12, 'TotalPvR' => 13, 'CarryL' => 14, 'CarryC' => 15, 'CarryR' => 16, 'Quota' => 17, 'Total' => 18, 'Percer' => 19, 'Tax' => 20, 'Totalamt' => 21, 'Paydate' => 22, 'Mpos' => 23, 'Tdate' => 24, 'Fdate' => 25, 'PairStop' => 26, 'Point' => 27, 'Status' => 28, 'Adjust' => 29, 'Balance' => 30, 'CycleB' => 31, 'Locationbase' => 32, 'Crate' => 33, ),
        self::TYPE_CAMELNAME     => array('cid' => 0, 'rcode' => 1, 'mcode' => 2, 'nameT' => 3, 'roL' => 4, 'roC' => 5, 'roR' => 6, 'pcrryL' => 7, 'pcrryC' => 8, 'pquota' => 9, 'totalPvLl' => 10, 'totalPvRr' => 11, 'totalPvL' => 12, 'totalPvR' => 13, 'carryL' => 14, 'carryC' => 15, 'carryR' => 16, 'quota' => 17, 'total' => 18, 'percer' => 19, 'tax' => 20, 'totalamt' => 21, 'paydate' => 22, 'mpos' => 23, 'tdate' => 24, 'fdate' => 25, 'pairStop' => 26, 'point' => 27, 'status' => 28, 'adjust' => 29, 'balance' => 30, 'cycleB' => 31, 'locationbase' => 32, 'crate' => 33, ),
        self::TYPE_COLNAME       => array(AliBmbonusTableMap::COL_CID => 0, AliBmbonusTableMap::COL_RCODE => 1, AliBmbonusTableMap::COL_MCODE => 2, AliBmbonusTableMap::COL_NAME_T => 3, AliBmbonusTableMap::COL_RO_L => 4, AliBmbonusTableMap::COL_RO_C => 5, AliBmbonusTableMap::COL_RO_R => 6, AliBmbonusTableMap::COL_PCRRY_L => 7, AliBmbonusTableMap::COL_PCRRY_C => 8, AliBmbonusTableMap::COL_PQUOTA => 9, AliBmbonusTableMap::COL_TOTAL_PV_LL => 10, AliBmbonusTableMap::COL_TOTAL_PV_RR => 11, AliBmbonusTableMap::COL_TOTAL_PV_L => 12, AliBmbonusTableMap::COL_TOTAL_PV_R => 13, AliBmbonusTableMap::COL_CARRY_L => 14, AliBmbonusTableMap::COL_CARRY_C => 15, AliBmbonusTableMap::COL_CARRY_R => 16, AliBmbonusTableMap::COL_QUOTA => 17, AliBmbonusTableMap::COL_TOTAL => 18, AliBmbonusTableMap::COL_PERCER => 19, AliBmbonusTableMap::COL_TAX => 20, AliBmbonusTableMap::COL_TOTALAMT => 21, AliBmbonusTableMap::COL_PAYDATE => 22, AliBmbonusTableMap::COL_MPOS => 23, AliBmbonusTableMap::COL_TDATE => 24, AliBmbonusTableMap::COL_FDATE => 25, AliBmbonusTableMap::COL_PAIR_STOP => 26, AliBmbonusTableMap::COL_POINT => 27, AliBmbonusTableMap::COL_STATUS => 28, AliBmbonusTableMap::COL_ADJUST => 29, AliBmbonusTableMap::COL_BALANCE => 30, AliBmbonusTableMap::COL_CYCLE_B => 31, AliBmbonusTableMap::COL_LOCATIONBASE => 32, AliBmbonusTableMap::COL_CRATE => 33, ),
        self::TYPE_FIELDNAME     => array('cid' => 0, 'rcode' => 1, 'mcode' => 2, 'name_t' => 3, 'ro_l' => 4, 'ro_c' => 5, 'ro_r' => 6, 'pcrry_l' => 7, 'pcrry_c' => 8, 'pquota' => 9, 'total_pv_ll' => 10, 'total_pv_rr' => 11, 'total_pv_l' => 12, 'total_pv_r' => 13, 'carry_l' => 14, 'carry_c' => 15, 'carry_r' => 16, 'quota' => 17, 'total' => 18, 'percer' => 19, 'tax' => 20, 'totalamt' => 21, 'paydate' => 22, 'mpos' => 23, 'tdate' => 24, 'fdate' => 25, 'pair_stop' => 26, 'point' => 27, 'status' => 28, 'adjust' => 29, 'balance' => 30, 'cycle_b' => 31, 'locationbase' => 32, 'crate' => 33, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
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
        $this->setName('ali_bmbonus');
        $this->setPhpName('AliBmbonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliBmbonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('cid', 'Cid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 9, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('ro_l', 'RoL', 'DECIMAL', true, 15, null);
        $this->addColumn('ro_c', 'RoC', 'DECIMAL', true, 15, null);
        $this->addColumn('ro_r', 'RoR', 'DECIMAL', true, 15, null);
        $this->addColumn('pcrry_l', 'PcrryL', 'DECIMAL', true, 15, null);
        $this->addColumn('pcrry_c', 'PcrryC', 'DECIMAL', true, 15, null);
        $this->addColumn('pquota', 'Pquota', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_ll', 'TotalPvLl', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_rr', 'TotalPvRr', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_l', 'TotalPvL', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_r', 'TotalPvR', 'DECIMAL', true, 15, null);
        $this->addColumn('carry_l', 'CarryL', 'DECIMAL', true, 15, null);
        $this->addColumn('carry_c', 'CarryC', 'INTEGER', true, null, null);
        $this->addColumn('carry_r', 'CarryR', 'INTEGER', true, null, null);
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
        $this->addColumn('status', 'Status', 'VARCHAR', true, 255, null);
        $this->addColumn('adjust', 'Adjust', 'DECIMAL', true, 15, null);
        $this->addColumn('balance', 'Balance', 'DECIMAL', true, 15, null);
        $this->addColumn('cycle_b', 'CycleB', 'INTEGER', true, 3, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 15, null);
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
        return $withPrefix ? AliBmbonusTableMap::CLASS_DEFAULT : AliBmbonusTableMap::OM_CLASS;
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
     * @return array           (AliBmbonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliBmbonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliBmbonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliBmbonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliBmbonusTableMap::OM_CLASS;
            /** @var AliBmbonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliBmbonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliBmbonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliBmbonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliBmbonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliBmbonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_CID);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_RO_L);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_RO_C);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_RO_R);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_PCRRY_L);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_PCRRY_C);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_PQUOTA);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_TOTAL_PV_LL);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_TOTAL_PV_RR);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_TOTAL_PV_L);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_TOTAL_PV_R);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_CARRY_L);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_CARRY_C);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_CARRY_R);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_QUOTA);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_PERCER);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_TAX);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_TOTALAMT);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_PAIR_STOP);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_POINT);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_ADJUST);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_BALANCE);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_CYCLE_B);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliBmbonusTableMap::COL_CRATE);
        } else {
            $criteria->addSelectColumn($alias . '.cid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.ro_l');
            $criteria->addSelectColumn($alias . '.ro_c');
            $criteria->addSelectColumn($alias . '.ro_r');
            $criteria->addSelectColumn($alias . '.pcrry_l');
            $criteria->addSelectColumn($alias . '.pcrry_c');
            $criteria->addSelectColumn($alias . '.pquota');
            $criteria->addSelectColumn($alias . '.total_pv_ll');
            $criteria->addSelectColumn($alias . '.total_pv_rr');
            $criteria->addSelectColumn($alias . '.total_pv_l');
            $criteria->addSelectColumn($alias . '.total_pv_r');
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
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.adjust');
            $criteria->addSelectColumn($alias . '.balance');
            $criteria->addSelectColumn($alias . '.cycle_b');
            $criteria->addSelectColumn($alias . '.locationbase');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliBmbonusTableMap::DATABASE_NAME)->getTable(AliBmbonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliBmbonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliBmbonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliBmbonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliBmbonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliBmbonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliBmbonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliBmbonusTableMap::DATABASE_NAME);
            $criteria->add(AliBmbonusTableMap::COL_CID, (array) $values, Criteria::IN);
        }

        $query = AliBmbonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliBmbonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliBmbonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_bmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliBmbonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliBmbonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliBmbonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliBmbonus object
        }

        if ($criteria->containsKey(AliBmbonusTableMap::COL_CID) && $criteria->keyContainsValue(AliBmbonusTableMap::COL_CID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliBmbonusTableMap::COL_CID.')');
        }


        // Set the correct dbName
        $query = AliBmbonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliBmbonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliBmbonusTableMap::buildTableMap();
