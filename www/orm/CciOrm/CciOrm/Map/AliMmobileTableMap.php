<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliMmobile;
use CciOrm\CciOrm\AliMmobileQuery;
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
 * This class defines the structure of the 'ali_mmobile' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliMmobileTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliMmobileTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_mmobile';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliMmobile';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliMmobile';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_mmobile.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_mmobile.mcode';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_mmobile.rcode';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_mmobile.dl';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_mmobile.total';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'ali_mmobile.tax';

    /**
     * the column name for the coupon field
     */
    const COL_COUPON = 'ali_mmobile.coupon';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_mmobile.paydate';

    /**
     * the column name for the flag field
     */
    const COL_FLAG = 'ali_mmobile.flag';

    /**
     * the column name for the sync field
     */
    const COL_SYNC = 'ali_mmobile.sync';

    /**
     * the column name for the web field
     */
    const COL_WEB = 'ali_mmobile.web';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'Rcode', 'Dl', 'Total', 'Tax', 'Coupon', 'Paydate', 'Flag', 'Sync', 'Web', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'rcode', 'dl', 'total', 'tax', 'coupon', 'paydate', 'flag', 'sync', 'web', ),
        self::TYPE_COLNAME       => array(AliMmobileTableMap::COL_ID, AliMmobileTableMap::COL_MCODE, AliMmobileTableMap::COL_RCODE, AliMmobileTableMap::COL_DL, AliMmobileTableMap::COL_TOTAL, AliMmobileTableMap::COL_TAX, AliMmobileTableMap::COL_COUPON, AliMmobileTableMap::COL_PAYDATE, AliMmobileTableMap::COL_FLAG, AliMmobileTableMap::COL_SYNC, AliMmobileTableMap::COL_WEB, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'rcode', 'dl', 'total', 'tax', 'coupon', 'paydate', 'flag', 'sync', 'web', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'Rcode' => 2, 'Dl' => 3, 'Total' => 4, 'Tax' => 5, 'Coupon' => 6, 'Paydate' => 7, 'Flag' => 8, 'Sync' => 9, 'Web' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'rcode' => 2, 'dl' => 3, 'total' => 4, 'tax' => 5, 'coupon' => 6, 'paydate' => 7, 'flag' => 8, 'sync' => 9, 'web' => 10, ),
        self::TYPE_COLNAME       => array(AliMmobileTableMap::COL_ID => 0, AliMmobileTableMap::COL_MCODE => 1, AliMmobileTableMap::COL_RCODE => 2, AliMmobileTableMap::COL_DL => 3, AliMmobileTableMap::COL_TOTAL => 4, AliMmobileTableMap::COL_TAX => 5, AliMmobileTableMap::COL_COUPON => 6, AliMmobileTableMap::COL_PAYDATE => 7, AliMmobileTableMap::COL_FLAG => 8, AliMmobileTableMap::COL_SYNC => 9, AliMmobileTableMap::COL_WEB => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'rcode' => 2, 'dl' => 3, 'total' => 4, 'tax' => 5, 'coupon' => 6, 'paydate' => 7, 'flag' => 8, 'sync' => 9, 'web' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('ali_mmobile');
        $this->setPhpName('AliMmobile');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliMmobile');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'CHAR', false, 7, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', false, 5, null);
        $this->addColumn('dl', 'Dl', 'DECIMAL', false, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('tax', 'Tax', 'DECIMAL', false, 15, null);
        $this->addColumn('coupon', 'Coupon', 'DECIMAL', false, 15, null);
        $this->addColumn('paydate', 'Paydate', 'DATE', false, null, null);
        $this->addColumn('flag', 'Flag', 'CHAR', false, null, null);
        $this->addColumn('sync', 'Sync', 'CHAR', false, null, null);
        $this->addColumn('web', 'Web', 'CHAR', false, null, null);
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
        return $withPrefix ? AliMmobileTableMap::CLASS_DEFAULT : AliMmobileTableMap::OM_CLASS;
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
     * @return array           (AliMmobile object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliMmobileTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliMmobileTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliMmobileTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliMmobileTableMap::OM_CLASS;
            /** @var AliMmobile $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliMmobileTableMap::addInstanceToPool($obj, $key);
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
            $key = AliMmobileTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliMmobileTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliMmobile $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliMmobileTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliMmobileTableMap::COL_ID);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_DL);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_TAX);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_COUPON);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_FLAG);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_SYNC);
            $criteria->addSelectColumn(AliMmobileTableMap::COL_WEB);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.dl');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tax');
            $criteria->addSelectColumn($alias . '.coupon');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.flag');
            $criteria->addSelectColumn($alias . '.sync');
            $criteria->addSelectColumn($alias . '.web');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliMmobileTableMap::DATABASE_NAME)->getTable(AliMmobileTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliMmobileTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliMmobileTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliMmobileTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliMmobile or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliMmobile object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMmobileTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliMmobile) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliMmobileTableMap::DATABASE_NAME);
            $criteria->add(AliMmobileTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliMmobileQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliMmobileTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliMmobileTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_mmobile table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliMmobileQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliMmobile or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliMmobile object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMmobileTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliMmobile object
        }

        if ($criteria->containsKey(AliMmobileTableMap::COL_ID) && $criteria->keyContainsValue(AliMmobileTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliMmobileTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliMmobileQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliMmobileTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliMmobileTableMap::buildTableMap();
