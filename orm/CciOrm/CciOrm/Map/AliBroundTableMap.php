<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliBround;
use CciOrm\CciOrm\AliBroundQuery;
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
 * This class defines the structure of the 'ali_bround' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliBroundTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliBroundTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_bround';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliBround';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliBround';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the rid field
     */
    const COL_RID = 'ali_bround.rid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_bround.rcode';

    /**
     * the column name for the rdate field
     */
    const COL_RDATE = 'ali_bround.rdate';

    /**
     * the column name for the fsano field
     */
    const COL_FSANO = 'ali_bround.fsano';

    /**
     * the column name for the tsano field
     */
    const COL_TSANO = 'ali_bround.tsano';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_bround.paydate';

    /**
     * the column name for the calc field
     */
    const COL_CALC = 'ali_bround.calc';

    /**
     * the column name for the calc_date field
     */
    const COL_CALC_DATE = 'ali_bround.calc_date';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_bround.remark';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_bround.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_bround.tdate';

    /**
     * the column name for the fpdate field
     */
    const COL_FPDATE = 'ali_bround.fpdate';

    /**
     * the column name for the tpdate field
     */
    const COL_TPDATE = 'ali_bround.tpdate';

    /**
     * the column name for the timequery field
     */
    const COL_TIMEQUERY = 'ali_bround.timequery';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_bround.uid';

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
        self::TYPE_PHPNAME       => array('Rid', 'Rcode', 'Rdate', 'Fsano', 'Tsano', 'Paydate', 'Calc', 'CalcDate', 'Remark', 'Fdate', 'Tdate', 'Fpdate', 'Tpdate', 'Timequery', 'Uid', ),
        self::TYPE_CAMELNAME     => array('rid', 'rcode', 'rdate', 'fsano', 'tsano', 'paydate', 'calc', 'calcDate', 'remark', 'fdate', 'tdate', 'fpdate', 'tpdate', 'timequery', 'uid', ),
        self::TYPE_COLNAME       => array(AliBroundTableMap::COL_RID, AliBroundTableMap::COL_RCODE, AliBroundTableMap::COL_RDATE, AliBroundTableMap::COL_FSANO, AliBroundTableMap::COL_TSANO, AliBroundTableMap::COL_PAYDATE, AliBroundTableMap::COL_CALC, AliBroundTableMap::COL_CALC_DATE, AliBroundTableMap::COL_REMARK, AliBroundTableMap::COL_FDATE, AliBroundTableMap::COL_TDATE, AliBroundTableMap::COL_FPDATE, AliBroundTableMap::COL_TPDATE, AliBroundTableMap::COL_TIMEQUERY, AliBroundTableMap::COL_UID, ),
        self::TYPE_FIELDNAME     => array('rid', 'rcode', 'rdate', 'fsano', 'tsano', 'paydate', 'calc', 'calc_date', 'remark', 'fdate', 'tdate', 'fpdate', 'tpdate', 'timequery', 'uid', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Rid' => 0, 'Rcode' => 1, 'Rdate' => 2, 'Fsano' => 3, 'Tsano' => 4, 'Paydate' => 5, 'Calc' => 6, 'CalcDate' => 7, 'Remark' => 8, 'Fdate' => 9, 'Tdate' => 10, 'Fpdate' => 11, 'Tpdate' => 12, 'Timequery' => 13, 'Uid' => 14, ),
        self::TYPE_CAMELNAME     => array('rid' => 0, 'rcode' => 1, 'rdate' => 2, 'fsano' => 3, 'tsano' => 4, 'paydate' => 5, 'calc' => 6, 'calcDate' => 7, 'remark' => 8, 'fdate' => 9, 'tdate' => 10, 'fpdate' => 11, 'tpdate' => 12, 'timequery' => 13, 'uid' => 14, ),
        self::TYPE_COLNAME       => array(AliBroundTableMap::COL_RID => 0, AliBroundTableMap::COL_RCODE => 1, AliBroundTableMap::COL_RDATE => 2, AliBroundTableMap::COL_FSANO => 3, AliBroundTableMap::COL_TSANO => 4, AliBroundTableMap::COL_PAYDATE => 5, AliBroundTableMap::COL_CALC => 6, AliBroundTableMap::COL_CALC_DATE => 7, AliBroundTableMap::COL_REMARK => 8, AliBroundTableMap::COL_FDATE => 9, AliBroundTableMap::COL_TDATE => 10, AliBroundTableMap::COL_FPDATE => 11, AliBroundTableMap::COL_TPDATE => 12, AliBroundTableMap::COL_TIMEQUERY => 13, AliBroundTableMap::COL_UID => 14, ),
        self::TYPE_FIELDNAME     => array('rid' => 0, 'rcode' => 1, 'rdate' => 2, 'fsano' => 3, 'tsano' => 4, 'paydate' => 5, 'calc' => 6, 'calc_date' => 7, 'remark' => 8, 'fdate' => 9, 'tdate' => 10, 'fpdate' => 11, 'tpdate' => 12, 'timequery' => 13, 'uid' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('ali_bround');
        $this->setPhpName('AliBround');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliBround');
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
        return $withPrefix ? AliBroundTableMap::CLASS_DEFAULT : AliBroundTableMap::OM_CLASS;
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
     * @return array           (AliBround object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliBroundTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliBroundTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliBroundTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliBroundTableMap::OM_CLASS;
            /** @var AliBround $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliBroundTableMap::addInstanceToPool($obj, $key);
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
            $key = AliBroundTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliBroundTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliBround $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliBroundTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliBroundTableMap::COL_RID);
            $criteria->addSelectColumn(AliBroundTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliBroundTableMap::COL_RDATE);
            $criteria->addSelectColumn(AliBroundTableMap::COL_FSANO);
            $criteria->addSelectColumn(AliBroundTableMap::COL_TSANO);
            $criteria->addSelectColumn(AliBroundTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliBroundTableMap::COL_CALC);
            $criteria->addSelectColumn(AliBroundTableMap::COL_CALC_DATE);
            $criteria->addSelectColumn(AliBroundTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliBroundTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliBroundTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliBroundTableMap::COL_FPDATE);
            $criteria->addSelectColumn(AliBroundTableMap::COL_TPDATE);
            $criteria->addSelectColumn(AliBroundTableMap::COL_TIMEQUERY);
            $criteria->addSelectColumn(AliBroundTableMap::COL_UID);
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
        return Propel::getServiceContainer()->getDatabaseMap(AliBroundTableMap::DATABASE_NAME)->getTable(AliBroundTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliBroundTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliBroundTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliBroundTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliBround or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliBround object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBroundTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliBround) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliBroundTableMap::DATABASE_NAME);
            $criteria->add(AliBroundTableMap::COL_RID, (array) $values, Criteria::IN);
        }

        $query = AliBroundQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliBroundTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliBroundTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_bround table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliBroundQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliBround or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliBround object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBroundTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliBround object
        }

        if ($criteria->containsKey(AliBroundTableMap::COL_RID) && $criteria->keyContainsValue(AliBroundTableMap::COL_RID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliBroundTableMap::COL_RID.')');
        }


        // Set the correct dbName
        $query = AliBroundQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliBroundTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliBroundTableMap::buildTableMap();
