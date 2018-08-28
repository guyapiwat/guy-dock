<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTripPv;
use CciOrm\CciOrm\AliTripPvQuery;
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
 * This class defines the structure of the 'ali_trip_pv' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTripPvTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTripPvTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_trip_pv';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTripPv';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTripPv';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the bid field
     */
    const COL_BID = 'ali_trip_pv.bid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_trip_pv.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_trip_pv.mcode';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_trip_pv.upa_code';

    /**
     * the column name for the total_pv field
     */
    const COL_TOTAL_PV = 'ali_trip_pv.total_pv';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_trip_pv.mpos';

    /**
     * the column name for the npos field
     */
    const COL_NPOS = 'ali_trip_pv.npos';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_trip_pv.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_trip_pv.tdate';

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
        self::TYPE_PHPNAME       => array('Bid', 'Rcode', 'Mcode', 'UpaCode', 'TotalPv', 'Mpos', 'Npos', 'Fdate', 'Tdate', ),
        self::TYPE_CAMELNAME     => array('bid', 'rcode', 'mcode', 'upaCode', 'totalPv', 'mpos', 'npos', 'fdate', 'tdate', ),
        self::TYPE_COLNAME       => array(AliTripPvTableMap::COL_BID, AliTripPvTableMap::COL_RCODE, AliTripPvTableMap::COL_MCODE, AliTripPvTableMap::COL_UPA_CODE, AliTripPvTableMap::COL_TOTAL_PV, AliTripPvTableMap::COL_MPOS, AliTripPvTableMap::COL_NPOS, AliTripPvTableMap::COL_FDATE, AliTripPvTableMap::COL_TDATE, ),
        self::TYPE_FIELDNAME     => array('bid', 'rcode', 'mcode', 'upa_code', 'total_pv', 'mpos', 'npos', 'fdate', 'tdate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Bid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'UpaCode' => 3, 'TotalPv' => 4, 'Mpos' => 5, 'Npos' => 6, 'Fdate' => 7, 'Tdate' => 8, ),
        self::TYPE_CAMELNAME     => array('bid' => 0, 'rcode' => 1, 'mcode' => 2, 'upaCode' => 3, 'totalPv' => 4, 'mpos' => 5, 'npos' => 6, 'fdate' => 7, 'tdate' => 8, ),
        self::TYPE_COLNAME       => array(AliTripPvTableMap::COL_BID => 0, AliTripPvTableMap::COL_RCODE => 1, AliTripPvTableMap::COL_MCODE => 2, AliTripPvTableMap::COL_UPA_CODE => 3, AliTripPvTableMap::COL_TOTAL_PV => 4, AliTripPvTableMap::COL_MPOS => 5, AliTripPvTableMap::COL_NPOS => 6, AliTripPvTableMap::COL_FDATE => 7, AliTripPvTableMap::COL_TDATE => 8, ),
        self::TYPE_FIELDNAME     => array('bid' => 0, 'rcode' => 1, 'mcode' => 2, 'upa_code' => 3, 'total_pv' => 4, 'mpos' => 5, 'npos' => 6, 'fdate' => 7, 'tdate' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('ali_trip_pv');
        $this->setPhpName('AliTripPv');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTripPv');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('bid', 'Bid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', false, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('upa_code', 'UpaCode', 'VARCHAR', false, 255, null);
        $this->addColumn('total_pv', 'TotalPv', 'DECIMAL', false, 15, 0);
        $this->addColumn('mpos', 'Mpos', 'VARCHAR', false, 5, null);
        $this->addColumn('npos', 'Npos', 'VARCHAR', false, 5, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliTripPvTableMap::CLASS_DEFAULT : AliTripPvTableMap::OM_CLASS;
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
     * @return array           (AliTripPv object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTripPvTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTripPvTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTripPvTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTripPvTableMap::OM_CLASS;
            /** @var AliTripPv $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTripPvTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTripPvTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTripPvTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTripPv $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTripPvTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTripPvTableMap::COL_BID);
            $criteria->addSelectColumn(AliTripPvTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliTripPvTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTripPvTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliTripPvTableMap::COL_TOTAL_PV);
            $criteria->addSelectColumn(AliTripPvTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliTripPvTableMap::COL_NPOS);
            $criteria->addSelectColumn(AliTripPvTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliTripPvTableMap::COL_TDATE);
        } else {
            $criteria->addSelectColumn($alias . '.bid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.upa_code');
            $criteria->addSelectColumn($alias . '.total_pv');
            $criteria->addSelectColumn($alias . '.mpos');
            $criteria->addSelectColumn($alias . '.npos');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTripPvTableMap::DATABASE_NAME)->getTable(AliTripPvTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTripPvTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTripPvTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTripPvTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTripPv or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTripPv object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTripPvTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTripPv) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTripPvTableMap::DATABASE_NAME);
            $criteria->add(AliTripPvTableMap::COL_BID, (array) $values, Criteria::IN);
        }

        $query = AliTripPvQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTripPvTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTripPvTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_trip_pv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTripPvQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTripPv or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTripPv object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTripPvTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTripPv object
        }

        if ($criteria->containsKey(AliTripPvTableMap::COL_BID) && $criteria->keyContainsValue(AliTripPvTableMap::COL_BID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTripPvTableMap::COL_BID.')');
        }


        // Set the correct dbName
        $query = AliTripPvQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTripPvTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTripPvTableMap::buildTableMap();
