<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliSending;
use CciOrm\CciOrm\AliSendingQuery;
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
 * This class defines the structure of the 'ali_sending' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliSendingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliSendingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_sending';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliSending';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliSending';

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
     * the column name for the sid field
     */
    const COL_SID = 'ali_sending.sid';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_sending.locationbase';

    /**
     * the column name for the minpv field
     */
    const COL_MINPV = 'ali_sending.minpv';

    /**
     * the column name for the maxpv field
     */
    const COL_MAXPV = 'ali_sending.maxpv';

    /**
     * the column name for the minweight field
     */
    const COL_MINWEIGHT = 'ali_sending.minweight';

    /**
     * the column name for the maxweight field
     */
    const COL_MAXWEIGHT = 'ali_sending.maxweight';

    /**
     * the column name for the inbound-pcode field
     */
    const COL_INBOUND-PCODE = 'ali_sending.inbound-pcode';

    /**
     * the column name for the outbound-pcode field
     */
    const COL_OUTBOUND-PCODE = 'ali_sending.outbound-pcode';

    /**
     * the column name for the overweight-pcode field
     */
    const COL_OVERWEIGHT-PCODE = 'ali_sending.overweight-pcode';

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
        self::TYPE_PHPNAME       => array('Sid', 'Locationbase', 'Minpv', 'Maxpv', 'Minweight', 'Maxweight', 'Inbound-pcode', 'Outbound-pcode', 'Overweight-pcode', ),
        self::TYPE_CAMELNAME     => array('sid', 'locationbase', 'minpv', 'maxpv', 'minweight', 'maxweight', 'inbound-pcode', 'outbound-pcode', 'overweight-pcode', ),
        self::TYPE_COLNAME       => array(AliSendingTableMap::COL_SID, AliSendingTableMap::COL_LOCATIONBASE, AliSendingTableMap::COL_MINPV, AliSendingTableMap::COL_MAXPV, AliSendingTableMap::COL_MINWEIGHT, AliSendingTableMap::COL_MAXWEIGHT, AliSendingTableMap::COL_INBOUND-PCODE, AliSendingTableMap::COL_OUTBOUND-PCODE, AliSendingTableMap::COL_OVERWEIGHT-PCODE, ),
        self::TYPE_FIELDNAME     => array('sid', 'locationbase', 'minpv', 'maxpv', 'minweight', 'maxweight', 'inbound-pcode', 'outbound-pcode', 'overweight-pcode', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sid' => 0, 'Locationbase' => 1, 'Minpv' => 2, 'Maxpv' => 3, 'Minweight' => 4, 'Maxweight' => 5, 'Inbound-pcode' => 6, 'Outbound-pcode' => 7, 'Overweight-pcode' => 8, ),
        self::TYPE_CAMELNAME     => array('sid' => 0, 'locationbase' => 1, 'minpv' => 2, 'maxpv' => 3, 'minweight' => 4, 'maxweight' => 5, 'inbound-pcode' => 6, 'outbound-pcode' => 7, 'overweight-pcode' => 8, ),
        self::TYPE_COLNAME       => array(AliSendingTableMap::COL_SID => 0, AliSendingTableMap::COL_LOCATIONBASE => 1, AliSendingTableMap::COL_MINPV => 2, AliSendingTableMap::COL_MAXPV => 3, AliSendingTableMap::COL_MINWEIGHT => 4, AliSendingTableMap::COL_MAXWEIGHT => 5, AliSendingTableMap::COL_INBOUND-PCODE => 6, AliSendingTableMap::COL_OUTBOUND-PCODE => 7, AliSendingTableMap::COL_OVERWEIGHT-PCODE => 8, ),
        self::TYPE_FIELDNAME     => array('sid' => 0, 'locationbase' => 1, 'minpv' => 2, 'maxpv' => 3, 'minweight' => 4, 'maxweight' => 5, 'inbound-pcode' => 6, 'outbound-pcode' => 7, 'overweight-pcode' => 8, ),
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
        $this->setName('ali_sending');
        $this->setPhpName('AliSending');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliSending');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('sid', 'Sid', 'INTEGER', true, null, null);
        $this->addColumn('locationbase', 'Locationbase', 'VARCHAR', true, 255, null);
        $this->addColumn('minpv', 'Minpv', 'INTEGER', true, null, null);
        $this->addColumn('maxpv', 'Maxpv', 'INTEGER', true, null, null);
        $this->addColumn('minweight', 'Minweight', 'DECIMAL', true, 15, null);
        $this->addColumn('maxweight', 'Maxweight', 'DECIMAL', true, 15, null);
        $this->addColumn('inbound-pcode', 'Inbound-pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('outbound-pcode', 'Outbound-pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('overweight-pcode', 'Overweight-pcode', 'VARCHAR', true, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Sid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliSendingTableMap::CLASS_DEFAULT : AliSendingTableMap::OM_CLASS;
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
     * @return array           (AliSending object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliSendingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliSendingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliSendingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliSendingTableMap::OM_CLASS;
            /** @var AliSending $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliSendingTableMap::addInstanceToPool($obj, $key);
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
            $key = AliSendingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliSendingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliSending $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliSendingTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliSendingTableMap::COL_SID);
            $criteria->addSelectColumn(AliSendingTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliSendingTableMap::COL_MINPV);
            $criteria->addSelectColumn(AliSendingTableMap::COL_MAXPV);
            $criteria->addSelectColumn(AliSendingTableMap::COL_MINWEIGHT);
            $criteria->addSelectColumn(AliSendingTableMap::COL_MAXWEIGHT);
            $criteria->addSelectColumn(AliSendingTableMap::COL_INBOUND-PCODE);
            $criteria->addSelectColumn(AliSendingTableMap::COL_OUTBOUND-PCODE);
            $criteria->addSelectColumn(AliSendingTableMap::COL_OVERWEIGHT-PCODE);
        } else {
            $criteria->addSelectColumn($alias . '.sid');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.minpv');
            $criteria->addSelectColumn($alias . '.maxpv');
            $criteria->addSelectColumn($alias . '.minweight');
            $criteria->addSelectColumn($alias . '.maxweight');
            $criteria->addSelectColumn($alias . '.inbound-pcode');
            $criteria->addSelectColumn($alias . '.outbound-pcode');
            $criteria->addSelectColumn($alias . '.overweight-pcode');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliSendingTableMap::DATABASE_NAME)->getTable(AliSendingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliSendingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliSendingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliSendingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliSending or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliSending object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSendingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliSending) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliSendingTableMap::DATABASE_NAME);
            $criteria->add(AliSendingTableMap::COL_SID, (array) $values, Criteria::IN);
        }

        $query = AliSendingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliSendingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliSendingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_sending table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliSendingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliSending or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliSending object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSendingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliSending object
        }

        if ($criteria->containsKey(AliSendingTableMap::COL_SID) && $criteria->keyContainsValue(AliSendingTableMap::COL_SID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliSendingTableMap::COL_SID.')');
        }


        // Set the correct dbName
        $query = AliSendingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliSendingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliSendingTableMap::buildTableMap();
