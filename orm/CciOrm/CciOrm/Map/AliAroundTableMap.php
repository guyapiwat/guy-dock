<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliAround;
use CciOrm\CciOrm\AliAroundQuery;
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
 * This class defines the structure of the 'ali_around' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliAroundTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliAroundTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_around';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliAround';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliAround';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 26;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 26;

    /**
     * the column name for the rid field
     */
    const COL_RID = 'ali_around.rid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_around.rcode';

    /**
     * the column name for the rdate field
     */
    const COL_RDATE = 'ali_around.rdate';

    /**
     * the column name for the fsano field
     */
    const COL_FSANO = 'ali_around.fsano';

    /**
     * the column name for the tsano field
     */
    const COL_TSANO = 'ali_around.tsano';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_around.paydate';

    /**
     * the column name for the calc field
     */
    const COL_CALC = 'ali_around.calc';

    /**
     * the column name for the calc_date field
     */
    const COL_CALC_DATE = 'ali_around.calc_date';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_around.remark';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_around.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_around.tdate';

    /**
     * the column name for the fpdate field
     */
    const COL_FPDATE = 'ali_around.fpdate';

    /**
     * the column name for the tpdate field
     */
    const COL_TPDATE = 'ali_around.tpdate';

    /**
     * the column name for the total_a field
     */
    const COL_TOTAL_A = 'ali_around.total_a';

    /**
     * the column name for the total_h field
     */
    const COL_TOTAL_H = 'ali_around.total_h';

    /**
     * the column name for the fast field
     */
    const COL_FAST = 'ali_around.fast';

    /**
     * the column name for the invent field
     */
    const COL_INVENT = 'ali_around.invent';

    /**
     * the column name for the binaryt field
     */
    const COL_BINARYT = 'ali_around.binaryt';

    /**
     * the column name for the matching field
     */
    const COL_MATCHING = 'ali_around.matching';

    /**
     * the column name for the pool field
     */
    const COL_POOL = 'ali_around.pool';

    /**
     * the column name for the adjust_binary field
     */
    const COL_ADJUST_BINARY = 'ali_around.adjust_binary';

    /**
     * the column name for the adjust_matching field
     */
    const COL_ADJUST_MATCHING = 'ali_around.adjust_matching';

    /**
     * the column name for the adjust_pool field
     */
    const COL_ADJUST_POOL = 'ali_around.adjust_pool';

    /**
     * the column name for the timequery field
     */
    const COL_TIMEQUERY = 'ali_around.timequery';

    /**
     * the column name for the countquery field
     */
    const COL_COUNTQUERY = 'ali_around.countquery';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_around.uid';

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
        self::TYPE_PHPNAME       => array('Rid', 'Rcode', 'Rdate', 'Fsano', 'Tsano', 'Paydate', 'Calc', 'CalcDate', 'Remark', 'Fdate', 'Tdate', 'Fpdate', 'Tpdate', 'TotalA', 'TotalH', 'Fast', 'Invent', 'Binaryt', 'Matching', 'Pool', 'AdjustBinary', 'AdjustMatching', 'AdjustPool', 'Timequery', 'Countquery', 'Uid', ),
        self::TYPE_CAMELNAME     => array('rid', 'rcode', 'rdate', 'fsano', 'tsano', 'paydate', 'calc', 'calcDate', 'remark', 'fdate', 'tdate', 'fpdate', 'tpdate', 'totalA', 'totalH', 'fast', 'invent', 'binaryt', 'matching', 'pool', 'adjustBinary', 'adjustMatching', 'adjustPool', 'timequery', 'countquery', 'uid', ),
        self::TYPE_COLNAME       => array(AliAroundTableMap::COL_RID, AliAroundTableMap::COL_RCODE, AliAroundTableMap::COL_RDATE, AliAroundTableMap::COL_FSANO, AliAroundTableMap::COL_TSANO, AliAroundTableMap::COL_PAYDATE, AliAroundTableMap::COL_CALC, AliAroundTableMap::COL_CALC_DATE, AliAroundTableMap::COL_REMARK, AliAroundTableMap::COL_FDATE, AliAroundTableMap::COL_TDATE, AliAroundTableMap::COL_FPDATE, AliAroundTableMap::COL_TPDATE, AliAroundTableMap::COL_TOTAL_A, AliAroundTableMap::COL_TOTAL_H, AliAroundTableMap::COL_FAST, AliAroundTableMap::COL_INVENT, AliAroundTableMap::COL_BINARYT, AliAroundTableMap::COL_MATCHING, AliAroundTableMap::COL_POOL, AliAroundTableMap::COL_ADJUST_BINARY, AliAroundTableMap::COL_ADJUST_MATCHING, AliAroundTableMap::COL_ADJUST_POOL, AliAroundTableMap::COL_TIMEQUERY, AliAroundTableMap::COL_COUNTQUERY, AliAroundTableMap::COL_UID, ),
        self::TYPE_FIELDNAME     => array('rid', 'rcode', 'rdate', 'fsano', 'tsano', 'paydate', 'calc', 'calc_date', 'remark', 'fdate', 'tdate', 'fpdate', 'tpdate', 'total_a', 'total_h', 'fast', 'invent', 'binaryt', 'matching', 'pool', 'adjust_binary', 'adjust_matching', 'adjust_pool', 'timequery', 'countquery', 'uid', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Rid' => 0, 'Rcode' => 1, 'Rdate' => 2, 'Fsano' => 3, 'Tsano' => 4, 'Paydate' => 5, 'Calc' => 6, 'CalcDate' => 7, 'Remark' => 8, 'Fdate' => 9, 'Tdate' => 10, 'Fpdate' => 11, 'Tpdate' => 12, 'TotalA' => 13, 'TotalH' => 14, 'Fast' => 15, 'Invent' => 16, 'Binaryt' => 17, 'Matching' => 18, 'Pool' => 19, 'AdjustBinary' => 20, 'AdjustMatching' => 21, 'AdjustPool' => 22, 'Timequery' => 23, 'Countquery' => 24, 'Uid' => 25, ),
        self::TYPE_CAMELNAME     => array('rid' => 0, 'rcode' => 1, 'rdate' => 2, 'fsano' => 3, 'tsano' => 4, 'paydate' => 5, 'calc' => 6, 'calcDate' => 7, 'remark' => 8, 'fdate' => 9, 'tdate' => 10, 'fpdate' => 11, 'tpdate' => 12, 'totalA' => 13, 'totalH' => 14, 'fast' => 15, 'invent' => 16, 'binaryt' => 17, 'matching' => 18, 'pool' => 19, 'adjustBinary' => 20, 'adjustMatching' => 21, 'adjustPool' => 22, 'timequery' => 23, 'countquery' => 24, 'uid' => 25, ),
        self::TYPE_COLNAME       => array(AliAroundTableMap::COL_RID => 0, AliAroundTableMap::COL_RCODE => 1, AliAroundTableMap::COL_RDATE => 2, AliAroundTableMap::COL_FSANO => 3, AliAroundTableMap::COL_TSANO => 4, AliAroundTableMap::COL_PAYDATE => 5, AliAroundTableMap::COL_CALC => 6, AliAroundTableMap::COL_CALC_DATE => 7, AliAroundTableMap::COL_REMARK => 8, AliAroundTableMap::COL_FDATE => 9, AliAroundTableMap::COL_TDATE => 10, AliAroundTableMap::COL_FPDATE => 11, AliAroundTableMap::COL_TPDATE => 12, AliAroundTableMap::COL_TOTAL_A => 13, AliAroundTableMap::COL_TOTAL_H => 14, AliAroundTableMap::COL_FAST => 15, AliAroundTableMap::COL_INVENT => 16, AliAroundTableMap::COL_BINARYT => 17, AliAroundTableMap::COL_MATCHING => 18, AliAroundTableMap::COL_POOL => 19, AliAroundTableMap::COL_ADJUST_BINARY => 20, AliAroundTableMap::COL_ADJUST_MATCHING => 21, AliAroundTableMap::COL_ADJUST_POOL => 22, AliAroundTableMap::COL_TIMEQUERY => 23, AliAroundTableMap::COL_COUNTQUERY => 24, AliAroundTableMap::COL_UID => 25, ),
        self::TYPE_FIELDNAME     => array('rid' => 0, 'rcode' => 1, 'rdate' => 2, 'fsano' => 3, 'tsano' => 4, 'paydate' => 5, 'calc' => 6, 'calc_date' => 7, 'remark' => 8, 'fdate' => 9, 'tdate' => 10, 'fpdate' => 11, 'tpdate' => 12, 'total_a' => 13, 'total_h' => 14, 'fast' => 15, 'invent' => 16, 'binaryt' => 17, 'matching' => 18, 'pool' => 19, 'adjust_binary' => 20, 'adjust_matching' => 21, 'adjust_pool' => 22, 'timequery' => 23, 'countquery' => 24, 'uid' => 25, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
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
        $this->setName('ali_around');
        $this->setPhpName('AliAround');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliAround');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('rid', 'Rid', 'INTEGER', true, 10, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', false, 5, null);
        $this->addColumn('rdate', 'Rdate', 'DATE', false, null, null);
        $this->addColumn('fsano', 'Fsano', 'VARCHAR', false, 7, null);
        $this->addColumn('tsano', 'Tsano', 'VARCHAR', false, 7, null);
        $this->addColumn('paydate', 'Paydate', 'DATE', false, null, null);
        $this->addColumn('calc', 'Calc', 'VARCHAR', false, 1, null);
        $this->addColumn('calc_date', 'CalcDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 50, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('fpdate', 'Fpdate', 'DATE', true, null, null);
        $this->addColumn('tpdate', 'Tpdate', 'DATE', true, null, null);
        $this->addColumn('total_a', 'TotalA', 'DECIMAL', true, 15, null);
        $this->addColumn('total_h', 'TotalH', 'DECIMAL', true, 15, null);
        $this->addColumn('fast', 'Fast', 'DECIMAL', true, 15, null);
        $this->addColumn('invent', 'Invent', 'DECIMAL', true, 15, null);
        $this->addColumn('binaryt', 'Binaryt', 'DECIMAL', true, 15, null);
        $this->addColumn('matching', 'Matching', 'DECIMAL', true, 15, null);
        $this->addColumn('pool', 'Pool', 'DECIMAL', true, 15, null);
        $this->addColumn('adjust_binary', 'AdjustBinary', 'DECIMAL', true, 15, null);
        $this->addColumn('adjust_matching', 'AdjustMatching', 'DECIMAL', true, 15, null);
        $this->addColumn('adjust_pool', 'AdjustPool', 'DECIMAL', true, 15, null);
        $this->addColumn('timequery', 'Timequery', 'INTEGER', true, null, null);
        $this->addColumn('countquery', 'Countquery', 'INTEGER', true, null, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliAroundTableMap::CLASS_DEFAULT : AliAroundTableMap::OM_CLASS;
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
     * @return array           (AliAround object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliAroundTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliAroundTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliAroundTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliAroundTableMap::OM_CLASS;
            /** @var AliAround $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliAroundTableMap::addInstanceToPool($obj, $key);
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
            $key = AliAroundTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliAroundTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliAround $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliAroundTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliAroundTableMap::COL_RID);
            $criteria->addSelectColumn(AliAroundTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliAroundTableMap::COL_RDATE);
            $criteria->addSelectColumn(AliAroundTableMap::COL_FSANO);
            $criteria->addSelectColumn(AliAroundTableMap::COL_TSANO);
            $criteria->addSelectColumn(AliAroundTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliAroundTableMap::COL_CALC);
            $criteria->addSelectColumn(AliAroundTableMap::COL_CALC_DATE);
            $criteria->addSelectColumn(AliAroundTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliAroundTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliAroundTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliAroundTableMap::COL_FPDATE);
            $criteria->addSelectColumn(AliAroundTableMap::COL_TPDATE);
            $criteria->addSelectColumn(AliAroundTableMap::COL_TOTAL_A);
            $criteria->addSelectColumn(AliAroundTableMap::COL_TOTAL_H);
            $criteria->addSelectColumn(AliAroundTableMap::COL_FAST);
            $criteria->addSelectColumn(AliAroundTableMap::COL_INVENT);
            $criteria->addSelectColumn(AliAroundTableMap::COL_BINARYT);
            $criteria->addSelectColumn(AliAroundTableMap::COL_MATCHING);
            $criteria->addSelectColumn(AliAroundTableMap::COL_POOL);
            $criteria->addSelectColumn(AliAroundTableMap::COL_ADJUST_BINARY);
            $criteria->addSelectColumn(AliAroundTableMap::COL_ADJUST_MATCHING);
            $criteria->addSelectColumn(AliAroundTableMap::COL_ADJUST_POOL);
            $criteria->addSelectColumn(AliAroundTableMap::COL_TIMEQUERY);
            $criteria->addSelectColumn(AliAroundTableMap::COL_COUNTQUERY);
            $criteria->addSelectColumn(AliAroundTableMap::COL_UID);
        } else {
            $criteria->addSelectColumn($alias . '.rid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.rdate');
            $criteria->addSelectColumn($alias . '.fsano');
            $criteria->addSelectColumn($alias . '.tsano');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.calc');
            $criteria->addSelectColumn($alias . '.calc_date');
            $criteria->addSelectColumn($alias . '.remark');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.fpdate');
            $criteria->addSelectColumn($alias . '.tpdate');
            $criteria->addSelectColumn($alias . '.total_a');
            $criteria->addSelectColumn($alias . '.total_h');
            $criteria->addSelectColumn($alias . '.fast');
            $criteria->addSelectColumn($alias . '.invent');
            $criteria->addSelectColumn($alias . '.binaryt');
            $criteria->addSelectColumn($alias . '.matching');
            $criteria->addSelectColumn($alias . '.pool');
            $criteria->addSelectColumn($alias . '.adjust_binary');
            $criteria->addSelectColumn($alias . '.adjust_matching');
            $criteria->addSelectColumn($alias . '.adjust_pool');
            $criteria->addSelectColumn($alias . '.timequery');
            $criteria->addSelectColumn($alias . '.countquery');
            $criteria->addSelectColumn($alias . '.uid');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliAroundTableMap::DATABASE_NAME)->getTable(AliAroundTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliAroundTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliAroundTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliAroundTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliAround or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliAround object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAroundTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliAround) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliAroundTableMap::DATABASE_NAME);
            $criteria->add(AliAroundTableMap::COL_RID, (array) $values, Criteria::IN);
        }

        $query = AliAroundQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliAroundTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliAroundTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_around table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliAroundQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliAround or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliAround object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAroundTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliAround object
        }

        if ($criteria->containsKey(AliAroundTableMap::COL_RID) && $criteria->keyContainsValue(AliAroundTableMap::COL_RID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliAroundTableMap::COL_RID.')');
        }


        // Set the correct dbName
        $query = AliAroundQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliAroundTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliAroundTableMap::buildTableMap();
