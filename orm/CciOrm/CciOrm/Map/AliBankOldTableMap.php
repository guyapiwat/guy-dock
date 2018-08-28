<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliBankOld;
use CciOrm\CciOrm\AliBankOldQuery;
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
 * This class defines the structure of the 'ali_bank_old' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliBankOldTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliBankOldTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_bank_old';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliBankOld';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliBankOld';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the bankcode field
     */
    const COL_BANKCODE = 'ali_bank_old.bankcode';

    /**
     * the column name for the bankname field
     */
    const COL_BANKNAME = 'ali_bank_old.bankname';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'ali_bank_old.code';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_bank_old.uid';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_bank_old.locationbase';

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
        self::TYPE_PHPNAME       => array('Bankcode', 'Bankname', 'Code', 'Uid', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('bankcode', 'bankname', 'code', 'uid', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliBankOldTableMap::COL_BANKCODE, AliBankOldTableMap::COL_BANKNAME, AliBankOldTableMap::COL_CODE, AliBankOldTableMap::COL_UID, AliBankOldTableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('bankcode', 'bankname', 'code', 'uid', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Bankcode' => 0, 'Bankname' => 1, 'Code' => 2, 'Uid' => 3, 'Locationbase' => 4, ),
        self::TYPE_CAMELNAME     => array('bankcode' => 0, 'bankname' => 1, 'code' => 2, 'uid' => 3, 'locationbase' => 4, ),
        self::TYPE_COLNAME       => array(AliBankOldTableMap::COL_BANKCODE => 0, AliBankOldTableMap::COL_BANKNAME => 1, AliBankOldTableMap::COL_CODE => 2, AliBankOldTableMap::COL_UID => 3, AliBankOldTableMap::COL_LOCATIONBASE => 4, ),
        self::TYPE_FIELDNAME     => array('bankcode' => 0, 'bankname' => 1, 'code' => 2, 'uid' => 3, 'locationbase' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('ali_bank_old');
        $this->setPhpName('AliBankOld');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliBankOld');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('bankcode', 'Bankcode', 'INTEGER', true, null, null);
        $this->addColumn('bankname', 'Bankname', 'CHAR', false, 25, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 255, null);
        $this->addColumn('uid', 'Uid', 'CHAR', false, null, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, 1, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Bankcode', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliBankOldTableMap::CLASS_DEFAULT : AliBankOldTableMap::OM_CLASS;
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
     * @return array           (AliBankOld object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliBankOldTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliBankOldTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliBankOldTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliBankOldTableMap::OM_CLASS;
            /** @var AliBankOld $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliBankOldTableMap::addInstanceToPool($obj, $key);
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
            $key = AliBankOldTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliBankOldTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliBankOld $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliBankOldTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliBankOldTableMap::COL_BANKCODE);
            $criteria->addSelectColumn(AliBankOldTableMap::COL_BANKNAME);
            $criteria->addSelectColumn(AliBankOldTableMap::COL_CODE);
            $criteria->addSelectColumn(AliBankOldTableMap::COL_UID);
            $criteria->addSelectColumn(AliBankOldTableMap::COL_LOCATIONBASE);
        } else {
            $criteria->addSelectColumn($alias . '.bankcode');
            $criteria->addSelectColumn($alias . '.bankname');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.locationbase');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliBankOldTableMap::DATABASE_NAME)->getTable(AliBankOldTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliBankOldTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliBankOldTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliBankOldTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliBankOld or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliBankOld object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBankOldTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliBankOld) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliBankOldTableMap::DATABASE_NAME);
            $criteria->add(AliBankOldTableMap::COL_BANKCODE, (array) $values, Criteria::IN);
        }

        $query = AliBankOldQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliBankOldTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliBankOldTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_bank_old table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliBankOldQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliBankOld or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliBankOld object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBankOldTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliBankOld object
        }

        if ($criteria->containsKey(AliBankOldTableMap::COL_BANKCODE) && $criteria->keyContainsValue(AliBankOldTableMap::COL_BANKCODE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliBankOldTableMap::COL_BANKCODE.')');
        }


        // Set the correct dbName
        $query = AliBankOldQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliBankOldTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliBankOldTableMap::buildTableMap();
