<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliFround;
use CciOrm\CciOrm\AliFroundQuery;
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
 * This class defines the structure of the 'ali_fround' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliFroundTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliFroundTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_fround';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliFround';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliFround';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the rid field
     */
    const COL_RID = 'ali_fround.rid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_fround.rcode';

    /**
     * the column name for the rdate field
     */
    const COL_RDATE = 'ali_fround.rdate';

    /**
     * the column name for the fsano field
     */
    const COL_FSANO = 'ali_fround.fsano';

    /**
     * the column name for the tsano field
     */
    const COL_TSANO = 'ali_fround.tsano';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_fround.paydate';

    /**
     * the column name for the calc field
     */
    const COL_CALC = 'ali_fround.calc';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_fround.remark';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_fround.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_fround.tdate';

    /**
     * the column name for the fpdate field
     */
    const COL_FPDATE = 'ali_fround.fpdate';

    /**
     * the column name for the tpdate field
     */
    const COL_TPDATE = 'ali_fround.tpdate';

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
        self::TYPE_PHPNAME       => array('Rid', 'Rcode', 'Rdate', 'Fsano', 'Tsano', 'Paydate', 'Calc', 'Remark', 'Fdate', 'Tdate', 'Fpdate', 'Tpdate', ),
        self::TYPE_CAMELNAME     => array('rid', 'rcode', 'rdate', 'fsano', 'tsano', 'paydate', 'calc', 'remark', 'fdate', 'tdate', 'fpdate', 'tpdate', ),
        self::TYPE_COLNAME       => array(AliFroundTableMap::COL_RID, AliFroundTableMap::COL_RCODE, AliFroundTableMap::COL_RDATE, AliFroundTableMap::COL_FSANO, AliFroundTableMap::COL_TSANO, AliFroundTableMap::COL_PAYDATE, AliFroundTableMap::COL_CALC, AliFroundTableMap::COL_REMARK, AliFroundTableMap::COL_FDATE, AliFroundTableMap::COL_TDATE, AliFroundTableMap::COL_FPDATE, AliFroundTableMap::COL_TPDATE, ),
        self::TYPE_FIELDNAME     => array('rid', 'rcode', 'rdate', 'fsano', 'tsano', 'paydate', 'calc', 'remark', 'fdate', 'tdate', 'fpdate', 'tpdate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Rid' => 0, 'Rcode' => 1, 'Rdate' => 2, 'Fsano' => 3, 'Tsano' => 4, 'Paydate' => 5, 'Calc' => 6, 'Remark' => 7, 'Fdate' => 8, 'Tdate' => 9, 'Fpdate' => 10, 'Tpdate' => 11, ),
        self::TYPE_CAMELNAME     => array('rid' => 0, 'rcode' => 1, 'rdate' => 2, 'fsano' => 3, 'tsano' => 4, 'paydate' => 5, 'calc' => 6, 'remark' => 7, 'fdate' => 8, 'tdate' => 9, 'fpdate' => 10, 'tpdate' => 11, ),
        self::TYPE_COLNAME       => array(AliFroundTableMap::COL_RID => 0, AliFroundTableMap::COL_RCODE => 1, AliFroundTableMap::COL_RDATE => 2, AliFroundTableMap::COL_FSANO => 3, AliFroundTableMap::COL_TSANO => 4, AliFroundTableMap::COL_PAYDATE => 5, AliFroundTableMap::COL_CALC => 6, AliFroundTableMap::COL_REMARK => 7, AliFroundTableMap::COL_FDATE => 8, AliFroundTableMap::COL_TDATE => 9, AliFroundTableMap::COL_FPDATE => 10, AliFroundTableMap::COL_TPDATE => 11, ),
        self::TYPE_FIELDNAME     => array('rid' => 0, 'rcode' => 1, 'rdate' => 2, 'fsano' => 3, 'tsano' => 4, 'paydate' => 5, 'calc' => 6, 'remark' => 7, 'fdate' => 8, 'tdate' => 9, 'fpdate' => 10, 'tpdate' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('ali_fround');
        $this->setPhpName('AliFround');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliFround');
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
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 50, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('fpdate', 'Fpdate', 'DATE', true, null, null);
        $this->addColumn('tpdate', 'Tpdate', 'DATE', true, null, null);
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
        return $withPrefix ? AliFroundTableMap::CLASS_DEFAULT : AliFroundTableMap::OM_CLASS;
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
     * @return array           (AliFround object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliFroundTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliFroundTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliFroundTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliFroundTableMap::OM_CLASS;
            /** @var AliFround $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliFroundTableMap::addInstanceToPool($obj, $key);
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
            $key = AliFroundTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliFroundTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliFround $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliFroundTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliFroundTableMap::COL_RID);
            $criteria->addSelectColumn(AliFroundTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliFroundTableMap::COL_RDATE);
            $criteria->addSelectColumn(AliFroundTableMap::COL_FSANO);
            $criteria->addSelectColumn(AliFroundTableMap::COL_TSANO);
            $criteria->addSelectColumn(AliFroundTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliFroundTableMap::COL_CALC);
            $criteria->addSelectColumn(AliFroundTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliFroundTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliFroundTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliFroundTableMap::COL_FPDATE);
            $criteria->addSelectColumn(AliFroundTableMap::COL_TPDATE);
        } else {
            $criteria->addSelectColumn($alias . '.rid');
            $criteria->addSelectColumn($alias . '.rcode');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliFroundTableMap::DATABASE_NAME)->getTable(AliFroundTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliFroundTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliFroundTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliFroundTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliFround or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliFround object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliFroundTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliFround) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliFroundTableMap::DATABASE_NAME);
            $criteria->add(AliFroundTableMap::COL_RID, (array) $values, Criteria::IN);
        }

        $query = AliFroundQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliFroundTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliFroundTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_fround table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliFroundQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliFround or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliFround object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliFroundTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliFround object
        }

        if ($criteria->containsKey(AliFroundTableMap::COL_RID) && $criteria->keyContainsValue(AliFroundTableMap::COL_RID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliFroundTableMap::COL_RID.')');
        }


        // Set the correct dbName
        $query = AliFroundQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliFroundTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliFroundTableMap::buildTableMap();
