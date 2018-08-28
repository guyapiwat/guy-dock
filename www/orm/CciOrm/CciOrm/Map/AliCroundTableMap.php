<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliCround;
use CciOrm\CciOrm\AliCroundQuery;
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
 * This class defines the structure of the 'ali_cround' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliCroundTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliCroundTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_cround';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliCround';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliCround';

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
    const COL_RID = 'ali_cround.rid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_cround.rcode';

    /**
     * the column name for the cstatus field
     */
    const COL_CSTATUS = 'ali_cround.cstatus';

    /**
     * the column name for the rdate field
     */
    const COL_RDATE = 'ali_cround.rdate';

    /**
     * the column name for the fsano field
     */
    const COL_FSANO = 'ali_cround.fsano';

    /**
     * the column name for the tsano field
     */
    const COL_TSANO = 'ali_cround.tsano';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_cround.paydate';

    /**
     * the column name for the calc field
     */
    const COL_CALC = 'ali_cround.calc';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_cround.remark';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_cround.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_cround.tdate';

    /**
     * the column name for the fpdate field
     */
    const COL_FPDATE = 'ali_cround.fpdate';

    /**
     * the column name for the tpdate field
     */
    const COL_TPDATE = 'ali_cround.tpdate';

    /**
     * the column name for the total_a field
     */
    const COL_TOTAL_A = 'ali_cround.total_a';

    /**
     * the column name for the total_h field
     */
    const COL_TOTAL_H = 'ali_cround.total_h';

    /**
     * the column name for the fast field
     */
    const COL_FAST = 'ali_cround.fast';

    /**
     * the column name for the invent field
     */
    const COL_INVENT = 'ali_cround.invent';

    /**
     * the column name for the binaryt field
     */
    const COL_BINARYT = 'ali_cround.binaryt';

    /**
     * the column name for the matching field
     */
    const COL_MATCHING = 'ali_cround.matching';

    /**
     * the column name for the pool field
     */
    const COL_POOL = 'ali_cround.pool';

    /**
     * the column name for the adjust_binary field
     */
    const COL_ADJUST_BINARY = 'ali_cround.adjust_binary';

    /**
     * the column name for the adjust_matching field
     */
    const COL_ADJUST_MATCHING = 'ali_cround.adjust_matching';

    /**
     * the column name for the adjust_pool field
     */
    const COL_ADJUST_POOL = 'ali_cround.adjust_pool';

    /**
     * the column name for the calc_date field
     */
    const COL_CALC_DATE = 'ali_cround.calc_date';

    /**
     * the column name for the timequery field
     */
    const COL_TIMEQUERY = 'ali_cround.timequery';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_cround.uid';

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
        self::TYPE_PHPNAME       => array('Rid', 'Rcode', 'Cstatus', 'Rdate', 'Fsano', 'Tsano', 'Paydate', 'Calc', 'Remark', 'Fdate', 'Tdate', 'Fpdate', 'Tpdate', 'TotalA', 'TotalH', 'Fast', 'Invent', 'Binaryt', 'Matching', 'Pool', 'AdjustBinary', 'AdjustMatching', 'AdjustPool', 'CalcDate', 'Timequery', 'Uid', ),
        self::TYPE_CAMELNAME     => array('rid', 'rcode', 'cstatus', 'rdate', 'fsano', 'tsano', 'paydate', 'calc', 'remark', 'fdate', 'tdate', 'fpdate', 'tpdate', 'totalA', 'totalH', 'fast', 'invent', 'binaryt', 'matching', 'pool', 'adjustBinary', 'adjustMatching', 'adjustPool', 'calcDate', 'timequery', 'uid', ),
        self::TYPE_COLNAME       => array(AliCroundTableMap::COL_RID, AliCroundTableMap::COL_RCODE, AliCroundTableMap::COL_CSTATUS, AliCroundTableMap::COL_RDATE, AliCroundTableMap::COL_FSANO, AliCroundTableMap::COL_TSANO, AliCroundTableMap::COL_PAYDATE, AliCroundTableMap::COL_CALC, AliCroundTableMap::COL_REMARK, AliCroundTableMap::COL_FDATE, AliCroundTableMap::COL_TDATE, AliCroundTableMap::COL_FPDATE, AliCroundTableMap::COL_TPDATE, AliCroundTableMap::COL_TOTAL_A, AliCroundTableMap::COL_TOTAL_H, AliCroundTableMap::COL_FAST, AliCroundTableMap::COL_INVENT, AliCroundTableMap::COL_BINARYT, AliCroundTableMap::COL_MATCHING, AliCroundTableMap::COL_POOL, AliCroundTableMap::COL_ADJUST_BINARY, AliCroundTableMap::COL_ADJUST_MATCHING, AliCroundTableMap::COL_ADJUST_POOL, AliCroundTableMap::COL_CALC_DATE, AliCroundTableMap::COL_TIMEQUERY, AliCroundTableMap::COL_UID, ),
        self::TYPE_FIELDNAME     => array('rid', 'rcode', 'cstatus', 'rdate', 'fsano', 'tsano', 'paydate', 'calc', 'remark', 'fdate', 'tdate', 'fpdate', 'tpdate', 'total_a', 'total_h', 'fast', 'invent', 'binaryt', 'matching', 'pool', 'adjust_binary', 'adjust_matching', 'adjust_pool', 'calc_date', 'timequery', 'uid', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Rid' => 0, 'Rcode' => 1, 'Cstatus' => 2, 'Rdate' => 3, 'Fsano' => 4, 'Tsano' => 5, 'Paydate' => 6, 'Calc' => 7, 'Remark' => 8, 'Fdate' => 9, 'Tdate' => 10, 'Fpdate' => 11, 'Tpdate' => 12, 'TotalA' => 13, 'TotalH' => 14, 'Fast' => 15, 'Invent' => 16, 'Binaryt' => 17, 'Matching' => 18, 'Pool' => 19, 'AdjustBinary' => 20, 'AdjustMatching' => 21, 'AdjustPool' => 22, 'CalcDate' => 23, 'Timequery' => 24, 'Uid' => 25, ),
        self::TYPE_CAMELNAME     => array('rid' => 0, 'rcode' => 1, 'cstatus' => 2, 'rdate' => 3, 'fsano' => 4, 'tsano' => 5, 'paydate' => 6, 'calc' => 7, 'remark' => 8, 'fdate' => 9, 'tdate' => 10, 'fpdate' => 11, 'tpdate' => 12, 'totalA' => 13, 'totalH' => 14, 'fast' => 15, 'invent' => 16, 'binaryt' => 17, 'matching' => 18, 'pool' => 19, 'adjustBinary' => 20, 'adjustMatching' => 21, 'adjustPool' => 22, 'calcDate' => 23, 'timequery' => 24, 'uid' => 25, ),
        self::TYPE_COLNAME       => array(AliCroundTableMap::COL_RID => 0, AliCroundTableMap::COL_RCODE => 1, AliCroundTableMap::COL_CSTATUS => 2, AliCroundTableMap::COL_RDATE => 3, AliCroundTableMap::COL_FSANO => 4, AliCroundTableMap::COL_TSANO => 5, AliCroundTableMap::COL_PAYDATE => 6, AliCroundTableMap::COL_CALC => 7, AliCroundTableMap::COL_REMARK => 8, AliCroundTableMap::COL_FDATE => 9, AliCroundTableMap::COL_TDATE => 10, AliCroundTableMap::COL_FPDATE => 11, AliCroundTableMap::COL_TPDATE => 12, AliCroundTableMap::COL_TOTAL_A => 13, AliCroundTableMap::COL_TOTAL_H => 14, AliCroundTableMap::COL_FAST => 15, AliCroundTableMap::COL_INVENT => 16, AliCroundTableMap::COL_BINARYT => 17, AliCroundTableMap::COL_MATCHING => 18, AliCroundTableMap::COL_POOL => 19, AliCroundTableMap::COL_ADJUST_BINARY => 20, AliCroundTableMap::COL_ADJUST_MATCHING => 21, AliCroundTableMap::COL_ADJUST_POOL => 22, AliCroundTableMap::COL_CALC_DATE => 23, AliCroundTableMap::COL_TIMEQUERY => 24, AliCroundTableMap::COL_UID => 25, ),
        self::TYPE_FIELDNAME     => array('rid' => 0, 'rcode' => 1, 'cstatus' => 2, 'rdate' => 3, 'fsano' => 4, 'tsano' => 5, 'paydate' => 6, 'calc' => 7, 'remark' => 8, 'fdate' => 9, 'tdate' => 10, 'fpdate' => 11, 'tpdate' => 12, 'total_a' => 13, 'total_h' => 14, 'fast' => 15, 'invent' => 16, 'binaryt' => 17, 'matching' => 18, 'pool' => 19, 'adjust_binary' => 20, 'adjust_matching' => 21, 'adjust_pool' => 22, 'calc_date' => 23, 'timequery' => 24, 'uid' => 25, ),
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
        $this->setName('ali_cround');
        $this->setPhpName('AliCround');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliCround');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('rid', 'Rid', 'INTEGER', true, 10, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', false, 5, null);
        $this->addColumn('cstatus', 'Cstatus', 'INTEGER', true, null, null);
        $this->addColumn('rdate', 'Rdate', 'DATE', false, null, null);
        $this->addColumn('fsano', 'Fsano', 'VARCHAR', false, 7, null);
        $this->addColumn('tsano', 'Tsano', 'VARCHAR', false, 7, null);
        $this->addColumn('paydate', 'Paydate', 'DATE', false, null, null);
        $this->addColumn('calc', 'Calc', 'VARCHAR', false, 1, null);
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
        $this->addColumn('calc_date', 'CalcDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('timequery', 'Timequery', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliCroundTableMap::CLASS_DEFAULT : AliCroundTableMap::OM_CLASS;
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
     * @return array           (AliCround object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliCroundTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliCroundTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliCroundTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliCroundTableMap::OM_CLASS;
            /** @var AliCround $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliCroundTableMap::addInstanceToPool($obj, $key);
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
            $key = AliCroundTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliCroundTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliCround $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliCroundTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliCroundTableMap::COL_RID);
            $criteria->addSelectColumn(AliCroundTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliCroundTableMap::COL_CSTATUS);
            $criteria->addSelectColumn(AliCroundTableMap::COL_RDATE);
            $criteria->addSelectColumn(AliCroundTableMap::COL_FSANO);
            $criteria->addSelectColumn(AliCroundTableMap::COL_TSANO);
            $criteria->addSelectColumn(AliCroundTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliCroundTableMap::COL_CALC);
            $criteria->addSelectColumn(AliCroundTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliCroundTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliCroundTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliCroundTableMap::COL_FPDATE);
            $criteria->addSelectColumn(AliCroundTableMap::COL_TPDATE);
            $criteria->addSelectColumn(AliCroundTableMap::COL_TOTAL_A);
            $criteria->addSelectColumn(AliCroundTableMap::COL_TOTAL_H);
            $criteria->addSelectColumn(AliCroundTableMap::COL_FAST);
            $criteria->addSelectColumn(AliCroundTableMap::COL_INVENT);
            $criteria->addSelectColumn(AliCroundTableMap::COL_BINARYT);
            $criteria->addSelectColumn(AliCroundTableMap::COL_MATCHING);
            $criteria->addSelectColumn(AliCroundTableMap::COL_POOL);
            $criteria->addSelectColumn(AliCroundTableMap::COL_ADJUST_BINARY);
            $criteria->addSelectColumn(AliCroundTableMap::COL_ADJUST_MATCHING);
            $criteria->addSelectColumn(AliCroundTableMap::COL_ADJUST_POOL);
            $criteria->addSelectColumn(AliCroundTableMap::COL_CALC_DATE);
            $criteria->addSelectColumn(AliCroundTableMap::COL_TIMEQUERY);
            $criteria->addSelectColumn(AliCroundTableMap::COL_UID);
        } else {
            $criteria->addSelectColumn($alias . '.rid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.cstatus');
            $criteria->addSelectColumn($alias . '.rdate');
            $criteria->addSelectColumn($alias . '.fsano');
            $criteria->addSelectColumn($alias . '.tsano');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.calc');
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
            $criteria->addSelectColumn($alias . '.calc_date');
            $criteria->addSelectColumn($alias . '.timequery');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliCroundTableMap::DATABASE_NAME)->getTable(AliCroundTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliCroundTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliCroundTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliCroundTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliCround or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliCround object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCroundTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliCround) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliCroundTableMap::DATABASE_NAME);
            $criteria->add(AliCroundTableMap::COL_RID, (array) $values, Criteria::IN);
        }

        $query = AliCroundQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliCroundTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliCroundTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_cround table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliCroundQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliCround or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliCround object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCroundTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliCround object
        }

        if ($criteria->containsKey(AliCroundTableMap::COL_RID) && $criteria->keyContainsValue(AliCroundTableMap::COL_RID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliCroundTableMap::COL_RID.')');
        }


        // Set the correct dbName
        $query = AliCroundQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliCroundTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliCroundTableMap::buildTableMap();
