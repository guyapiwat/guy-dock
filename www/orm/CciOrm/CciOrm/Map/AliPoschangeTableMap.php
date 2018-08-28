<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliPoschange;
use CciOrm\CciOrm\AliPoschangeQuery;
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
 * This class defines the structure of the 'ali_poschange' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliPoschangeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliPoschangeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_poschange';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliPoschange';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliPoschange';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_poschange.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_poschange.mcode';

    /**
     * the column name for the pos_before field
     */
    const COL_POS_BEFORE = 'ali_poschange.pos_before';

    /**
     * the column name for the pos_after field
     */
    const COL_POS_AFTER = 'ali_poschange.pos_after';

    /**
     * the column name for the date_change field
     */
    const COL_DATE_CHANGE = 'ali_poschange.date_change';

    /**
     * the column name for the date_update field
     */
    const COL_DATE_UPDATE = 'ali_poschange.date_update';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'ali_poschange.type';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_poschange.uid';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'PosBefore', 'PosAfter', 'DateChange', 'DateUpdate', 'Type', 'Uid', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'posBefore', 'posAfter', 'dateChange', 'dateUpdate', 'type', 'uid', ),
        self::TYPE_COLNAME       => array(AliPoschangeTableMap::COL_ID, AliPoschangeTableMap::COL_MCODE, AliPoschangeTableMap::COL_POS_BEFORE, AliPoschangeTableMap::COL_POS_AFTER, AliPoschangeTableMap::COL_DATE_CHANGE, AliPoschangeTableMap::COL_DATE_UPDATE, AliPoschangeTableMap::COL_TYPE, AliPoschangeTableMap::COL_UID, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'pos_before', 'pos_after', 'date_change', 'date_update', 'type', 'uid', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'PosBefore' => 2, 'PosAfter' => 3, 'DateChange' => 4, 'DateUpdate' => 5, 'Type' => 6, 'Uid' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'posBefore' => 2, 'posAfter' => 3, 'dateChange' => 4, 'dateUpdate' => 5, 'type' => 6, 'uid' => 7, ),
        self::TYPE_COLNAME       => array(AliPoschangeTableMap::COL_ID => 0, AliPoschangeTableMap::COL_MCODE => 1, AliPoschangeTableMap::COL_POS_BEFORE => 2, AliPoschangeTableMap::COL_POS_AFTER => 3, AliPoschangeTableMap::COL_DATE_CHANGE => 4, AliPoschangeTableMap::COL_DATE_UPDATE => 5, AliPoschangeTableMap::COL_TYPE => 6, AliPoschangeTableMap::COL_UID => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'pos_before' => 2, 'pos_after' => 3, 'date_change' => 4, 'date_update' => 5, 'type' => 6, 'uid' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('ali_poschange');
        $this->setPhpName('AliPoschange');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliPoschange');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, '');
        $this->addColumn('pos_before', 'PosBefore', 'VARCHAR', false, 11, null);
        $this->addColumn('pos_after', 'PosAfter', 'VARCHAR', false, 11, null);
        $this->addColumn('date_change', 'DateChange', 'DATE', false, null, null);
        $this->addColumn('date_update', 'DateUpdate', 'DATE', true, null, null);
        $this->addColumn('type', 'Type', 'INTEGER', false, null, null);
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
        return $withPrefix ? AliPoschangeTableMap::CLASS_DEFAULT : AliPoschangeTableMap::OM_CLASS;
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
     * @return array           (AliPoschange object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliPoschangeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliPoschangeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliPoschangeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliPoschangeTableMap::OM_CLASS;
            /** @var AliPoschange $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliPoschangeTableMap::addInstanceToPool($obj, $key);
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
            $key = AliPoschangeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliPoschangeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliPoschange $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliPoschangeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliPoschangeTableMap::COL_ID);
            $criteria->addSelectColumn(AliPoschangeTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliPoschangeTableMap::COL_POS_BEFORE);
            $criteria->addSelectColumn(AliPoschangeTableMap::COL_POS_AFTER);
            $criteria->addSelectColumn(AliPoschangeTableMap::COL_DATE_CHANGE);
            $criteria->addSelectColumn(AliPoschangeTableMap::COL_DATE_UPDATE);
            $criteria->addSelectColumn(AliPoschangeTableMap::COL_TYPE);
            $criteria->addSelectColumn(AliPoschangeTableMap::COL_UID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.pos_before');
            $criteria->addSelectColumn($alias . '.pos_after');
            $criteria->addSelectColumn($alias . '.date_change');
            $criteria->addSelectColumn($alias . '.date_update');
            $criteria->addSelectColumn($alias . '.type');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliPoschangeTableMap::DATABASE_NAME)->getTable(AliPoschangeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliPoschangeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliPoschangeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliPoschangeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliPoschange or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliPoschange object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPoschangeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliPoschange) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliPoschangeTableMap::DATABASE_NAME);
            $criteria->add(AliPoschangeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliPoschangeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliPoschangeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliPoschangeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_poschange table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliPoschangeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliPoschange or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliPoschange object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPoschangeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliPoschange object
        }

        if ($criteria->containsKey(AliPoschangeTableMap::COL_ID) && $criteria->keyContainsValue(AliPoschangeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliPoschangeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliPoschangeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliPoschangeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliPoschangeTableMap::buildTableMap();
