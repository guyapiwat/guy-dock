<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTripBonus;
use CciOrm\CciOrm\AliTripBonusQuery;
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
 * This class defines the structure of the 'ali_trip_bonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTripBonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTripBonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_trip_bonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTripBonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTripBonus';

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
     * the column name for the aid field
     */
    const COL_AID = 'ali_trip_bonus.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_trip_bonus.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_trip_bonus.mcode';

    /**
     * the column name for the pv_private field
     */
    const COL_PV_PRIVATE = 'ali_trip_bonus.pv_private';

    /**
     * the column name for the pv_team field
     */
    const COL_PV_TEAM = 'ali_trip_bonus.pv_team';

    /**
     * the column name for the pv_use_private field
     */
    const COL_PV_USE_PRIVATE = 'ali_trip_bonus.pv_use_private';

    /**
     * the column name for the pv_use_team field
     */
    const COL_PV_USE_TEAM = 'ali_trip_bonus.pv_use_team';

    /**
     * the column name for the total_pv_private field
     */
    const COL_TOTAL_PV_PRIVATE = 'ali_trip_bonus.total_pv_private';

    /**
     * the column name for the total_pv_team field
     */
    const COL_TOTAL_PV_TEAM = 'ali_trip_bonus.total_pv_team';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_trip_bonus.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_trip_bonus.tdate';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_trip_bonus.status';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'PvPrivate', 'PvTeam', 'PvUsePrivate', 'PvUseTeam', 'TotalPvPrivate', 'TotalPvTeam', 'Fdate', 'Tdate', 'Status', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'pvPrivate', 'pvTeam', 'pvUsePrivate', 'pvUseTeam', 'totalPvPrivate', 'totalPvTeam', 'fdate', 'tdate', 'status', ),
        self::TYPE_COLNAME       => array(AliTripBonusTableMap::COL_AID, AliTripBonusTableMap::COL_RCODE, AliTripBonusTableMap::COL_MCODE, AliTripBonusTableMap::COL_PV_PRIVATE, AliTripBonusTableMap::COL_PV_TEAM, AliTripBonusTableMap::COL_PV_USE_PRIVATE, AliTripBonusTableMap::COL_PV_USE_TEAM, AliTripBonusTableMap::COL_TOTAL_PV_PRIVATE, AliTripBonusTableMap::COL_TOTAL_PV_TEAM, AliTripBonusTableMap::COL_FDATE, AliTripBonusTableMap::COL_TDATE, AliTripBonusTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'pv_private', 'pv_team', 'pv_use_private', 'pv_use_team', 'total_pv_private', 'total_pv_team', 'fdate', 'tdate', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'PvPrivate' => 3, 'PvTeam' => 4, 'PvUsePrivate' => 5, 'PvUseTeam' => 6, 'TotalPvPrivate' => 7, 'TotalPvTeam' => 8, 'Fdate' => 9, 'Tdate' => 10, 'Status' => 11, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'pvPrivate' => 3, 'pvTeam' => 4, 'pvUsePrivate' => 5, 'pvUseTeam' => 6, 'totalPvPrivate' => 7, 'totalPvTeam' => 8, 'fdate' => 9, 'tdate' => 10, 'status' => 11, ),
        self::TYPE_COLNAME       => array(AliTripBonusTableMap::COL_AID => 0, AliTripBonusTableMap::COL_RCODE => 1, AliTripBonusTableMap::COL_MCODE => 2, AliTripBonusTableMap::COL_PV_PRIVATE => 3, AliTripBonusTableMap::COL_PV_TEAM => 4, AliTripBonusTableMap::COL_PV_USE_PRIVATE => 5, AliTripBonusTableMap::COL_PV_USE_TEAM => 6, AliTripBonusTableMap::COL_TOTAL_PV_PRIVATE => 7, AliTripBonusTableMap::COL_TOTAL_PV_TEAM => 8, AliTripBonusTableMap::COL_FDATE => 9, AliTripBonusTableMap::COL_TDATE => 10, AliTripBonusTableMap::COL_STATUS => 11, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'pv_private' => 3, 'pv_team' => 4, 'pv_use_private' => 5, 'pv_use_team' => 6, 'total_pv_private' => 7, 'total_pv_team' => 8, 'fdate' => 9, 'tdate' => 10, 'status' => 11, ),
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
        $this->setName('ali_trip_bonus');
        $this->setPhpName('AliTripBonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTripBonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('pv_private', 'PvPrivate', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_team', 'PvTeam', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_use_private', 'PvUsePrivate', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_use_team', 'PvUseTeam', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_private', 'TotalPvPrivate', 'DECIMAL', true, 15, null);
        $this->addColumn('total_pv_team', 'TotalPvTeam', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, 5, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliTripBonusTableMap::CLASS_DEFAULT : AliTripBonusTableMap::OM_CLASS;
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
     * @return array           (AliTripBonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTripBonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTripBonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTripBonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTripBonusTableMap::OM_CLASS;
            /** @var AliTripBonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTripBonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTripBonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTripBonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTripBonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTripBonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_AID);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_PV_PRIVATE);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_PV_TEAM);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_PV_USE_PRIVATE);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_PV_USE_TEAM);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_TOTAL_PV_PRIVATE);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_TOTAL_PV_TEAM);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliTripBonusTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.pv_private');
            $criteria->addSelectColumn($alias . '.pv_team');
            $criteria->addSelectColumn($alias . '.pv_use_private');
            $criteria->addSelectColumn($alias . '.pv_use_team');
            $criteria->addSelectColumn($alias . '.total_pv_private');
            $criteria->addSelectColumn($alias . '.total_pv_team');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTripBonusTableMap::DATABASE_NAME)->getTable(AliTripBonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTripBonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTripBonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTripBonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTripBonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTripBonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTripBonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTripBonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTripBonusTableMap::DATABASE_NAME);
            $criteria->add(AliTripBonusTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliTripBonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTripBonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTripBonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_trip_bonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTripBonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTripBonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTripBonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTripBonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTripBonus object
        }

        if ($criteria->containsKey(AliTripBonusTableMap::COL_AID) && $criteria->keyContainsValue(AliTripBonusTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTripBonusTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliTripBonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTripBonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTripBonusTableMap::buildTableMap();
