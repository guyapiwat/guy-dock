<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliBbuy;
use CciOrm\CciOrm\AliBbuyQuery;
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
 * This class defines the structure of the 'ali_bbuy' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliBbuyTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliBbuyTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_bbuy';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliBbuy';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliBbuy';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the bbuy_ID field
     */
    const COL_BBUY_ID = 'ali_bbuy.bbuy_ID';

    /**
     * the column name for the bbuy_Date field
     */
    const COL_BBUY_DATE = 'ali_bbuy.bbuy_Date';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_bbuy.pcode';

    /**
     * the column name for the bbuy_Qua field
     */
    const COL_BBUY_QUA = 'ali_bbuy.bbuy_Qua';

    /**
     * the column name for the bbuy_Balance field
     */
    const COL_BBUY_BALANCE = 'ali_bbuy.bbuy_Balance';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_bbuy.txtoption';

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
        self::TYPE_PHPNAME       => array('BbuyId', 'BbuyDate', 'Pcode', 'BbuyQua', 'BbuyBalance', 'Txtoption', ),
        self::TYPE_CAMELNAME     => array('bbuyId', 'bbuyDate', 'pcode', 'bbuyQua', 'bbuyBalance', 'txtoption', ),
        self::TYPE_COLNAME       => array(AliBbuyTableMap::COL_BBUY_ID, AliBbuyTableMap::COL_BBUY_DATE, AliBbuyTableMap::COL_PCODE, AliBbuyTableMap::COL_BBUY_QUA, AliBbuyTableMap::COL_BBUY_BALANCE, AliBbuyTableMap::COL_TXTOPTION, ),
        self::TYPE_FIELDNAME     => array('bbuy_ID', 'bbuy_Date', 'pcode', 'bbuy_Qua', 'bbuy_Balance', 'txtoption', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('BbuyId' => 0, 'BbuyDate' => 1, 'Pcode' => 2, 'BbuyQua' => 3, 'BbuyBalance' => 4, 'Txtoption' => 5, ),
        self::TYPE_CAMELNAME     => array('bbuyId' => 0, 'bbuyDate' => 1, 'pcode' => 2, 'bbuyQua' => 3, 'bbuyBalance' => 4, 'txtoption' => 5, ),
        self::TYPE_COLNAME       => array(AliBbuyTableMap::COL_BBUY_ID => 0, AliBbuyTableMap::COL_BBUY_DATE => 1, AliBbuyTableMap::COL_PCODE => 2, AliBbuyTableMap::COL_BBUY_QUA => 3, AliBbuyTableMap::COL_BBUY_BALANCE => 4, AliBbuyTableMap::COL_TXTOPTION => 5, ),
        self::TYPE_FIELDNAME     => array('bbuy_ID' => 0, 'bbuy_Date' => 1, 'pcode' => 2, 'bbuy_Qua' => 3, 'bbuy_Balance' => 4, 'txtoption' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('ali_bbuy');
        $this->setPhpName('AliBbuy');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliBbuy');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('bbuy_ID', 'BbuyId', 'INTEGER', true, null, null);
        $this->addColumn('bbuy_Date', 'BbuyDate', 'DATE', true, null, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('bbuy_Qua', 'BbuyQua', 'INTEGER', true, null, null);
        $this->addColumn('bbuy_Balance', 'BbuyBalance', 'INTEGER', true, null, null);
        $this->addColumn('txtoption', 'Txtoption', 'LONGVARCHAR', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BbuyId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BbuyId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BbuyId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BbuyId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BbuyId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BbuyId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('BbuyId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliBbuyTableMap::CLASS_DEFAULT : AliBbuyTableMap::OM_CLASS;
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
     * @return array           (AliBbuy object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliBbuyTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliBbuyTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliBbuyTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliBbuyTableMap::OM_CLASS;
            /** @var AliBbuy $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliBbuyTableMap::addInstanceToPool($obj, $key);
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
            $key = AliBbuyTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliBbuyTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliBbuy $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliBbuyTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliBbuyTableMap::COL_BBUY_ID);
            $criteria->addSelectColumn(AliBbuyTableMap::COL_BBUY_DATE);
            $criteria->addSelectColumn(AliBbuyTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliBbuyTableMap::COL_BBUY_QUA);
            $criteria->addSelectColumn(AliBbuyTableMap::COL_BBUY_BALANCE);
            $criteria->addSelectColumn(AliBbuyTableMap::COL_TXTOPTION);
        } else {
            $criteria->addSelectColumn($alias . '.bbuy_ID');
            $criteria->addSelectColumn($alias . '.bbuy_Date');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.bbuy_Qua');
            $criteria->addSelectColumn($alias . '.bbuy_Balance');
            $criteria->addSelectColumn($alias . '.txtoption');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliBbuyTableMap::DATABASE_NAME)->getTable(AliBbuyTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliBbuyTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliBbuyTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliBbuyTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliBbuy or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliBbuy object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBbuyTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliBbuy) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliBbuyTableMap::DATABASE_NAME);
            $criteria->add(AliBbuyTableMap::COL_BBUY_ID, (array) $values, Criteria::IN);
        }

        $query = AliBbuyQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliBbuyTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliBbuyTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_bbuy table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliBbuyQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliBbuy or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliBbuy object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBbuyTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliBbuy object
        }

        if ($criteria->containsKey(AliBbuyTableMap::COL_BBUY_ID) && $criteria->keyContainsValue(AliBbuyTableMap::COL_BBUY_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliBbuyTableMap::COL_BBUY_ID.')');
        }


        // Set the correct dbName
        $query = AliBbuyQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliBbuyTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliBbuyTableMap::buildTableMap();
