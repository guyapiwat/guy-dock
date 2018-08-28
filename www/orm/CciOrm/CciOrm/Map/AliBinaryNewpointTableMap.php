<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliBinaryNewpoint;
use CciOrm\CciOrm\AliBinaryNewpointQuery;
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
 * This class defines the structure of the 'ali_binary_newpoint' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliBinaryNewpointTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliBinaryNewpointTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_binary_newpoint';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliBinaryNewpoint';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliBinaryNewpoint';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_binary_newpoint.mcode';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_binary_newpoint.sp_code';

    /**
     * the column name for the month field
     */
    const COL_MONTH = 'ali_binary_newpoint.month';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_binary_newpoint.mdate';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_binary_newpoint.id';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_binary_newpoint.name_t';

    /**
     * the column name for the point_left field
     */
    const COL_POINT_LEFT = 'ali_binary_newpoint.point_left';

    /**
     * the column name for the point_right field
     */
    const COL_POINT_RIGHT = 'ali_binary_newpoint.point_right';

    /**
     * the column name for the point_all field
     */
    const COL_POINT_ALL = 'ali_binary_newpoint.point_all';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_binary_newpoint.uid';

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
        self::TYPE_PHPNAME       => array('Mcode', 'SpCode', 'Month', 'Mdate', 'Id', 'NameT', 'PointLeft', 'PointRight', 'PointAll', 'Uid', ),
        self::TYPE_CAMELNAME     => array('mcode', 'spCode', 'month', 'mdate', 'id', 'nameT', 'pointLeft', 'pointRight', 'pointAll', 'uid', ),
        self::TYPE_COLNAME       => array(AliBinaryNewpointTableMap::COL_MCODE, AliBinaryNewpointTableMap::COL_SP_CODE, AliBinaryNewpointTableMap::COL_MONTH, AliBinaryNewpointTableMap::COL_MDATE, AliBinaryNewpointTableMap::COL_ID, AliBinaryNewpointTableMap::COL_NAME_T, AliBinaryNewpointTableMap::COL_POINT_LEFT, AliBinaryNewpointTableMap::COL_POINT_RIGHT, AliBinaryNewpointTableMap::COL_POINT_ALL, AliBinaryNewpointTableMap::COL_UID, ),
        self::TYPE_FIELDNAME     => array('mcode', 'sp_code', 'month', 'mdate', 'id', 'name_t', 'point_left', 'point_right', 'point_all', 'uid', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Mcode' => 0, 'SpCode' => 1, 'Month' => 2, 'Mdate' => 3, 'Id' => 4, 'NameT' => 5, 'PointLeft' => 6, 'PointRight' => 7, 'PointAll' => 8, 'Uid' => 9, ),
        self::TYPE_CAMELNAME     => array('mcode' => 0, 'spCode' => 1, 'month' => 2, 'mdate' => 3, 'id' => 4, 'nameT' => 5, 'pointLeft' => 6, 'pointRight' => 7, 'pointAll' => 8, 'uid' => 9, ),
        self::TYPE_COLNAME       => array(AliBinaryNewpointTableMap::COL_MCODE => 0, AliBinaryNewpointTableMap::COL_SP_CODE => 1, AliBinaryNewpointTableMap::COL_MONTH => 2, AliBinaryNewpointTableMap::COL_MDATE => 3, AliBinaryNewpointTableMap::COL_ID => 4, AliBinaryNewpointTableMap::COL_NAME_T => 5, AliBinaryNewpointTableMap::COL_POINT_LEFT => 6, AliBinaryNewpointTableMap::COL_POINT_RIGHT => 7, AliBinaryNewpointTableMap::COL_POINT_ALL => 8, AliBinaryNewpointTableMap::COL_UID => 9, ),
        self::TYPE_FIELDNAME     => array('mcode' => 0, 'sp_code' => 1, 'month' => 2, 'mdate' => 3, 'id' => 4, 'name_t' => 5, 'point_left' => 6, 'point_right' => 7, 'point_all' => 8, 'uid' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('ali_binary_newpoint');
        $this->setPhpName('AliBinaryNewpoint');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliBinaryNewpoint');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('month', 'Month', 'VARCHAR', true, 255, null);
        $this->addColumn('mdate', 'Mdate', 'DATE', true, null, null);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('point_left', 'PointLeft', 'DECIMAL', true, 15, null);
        $this->addColumn('point_right', 'PointRight', 'DECIMAL', true, 15, null);
        $this->addColumn('point_all', 'PointAll', 'DECIMAL', true, 15, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 4 + $offset
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
        return $withPrefix ? AliBinaryNewpointTableMap::CLASS_DEFAULT : AliBinaryNewpointTableMap::OM_CLASS;
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
     * @return array           (AliBinaryNewpoint object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliBinaryNewpointTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliBinaryNewpointTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliBinaryNewpointTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliBinaryNewpointTableMap::OM_CLASS;
            /** @var AliBinaryNewpoint $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliBinaryNewpointTableMap::addInstanceToPool($obj, $key);
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
            $key = AliBinaryNewpointTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliBinaryNewpointTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliBinaryNewpoint $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliBinaryNewpointTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_MONTH);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_ID);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_POINT_LEFT);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_POINT_RIGHT);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_POINT_ALL);
            $criteria->addSelectColumn(AliBinaryNewpointTableMap::COL_UID);
        } else {
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.month');
            $criteria->addSelectColumn($alias . '.mdate');
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.point_left');
            $criteria->addSelectColumn($alias . '.point_right');
            $criteria->addSelectColumn($alias . '.point_all');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliBinaryNewpointTableMap::DATABASE_NAME)->getTable(AliBinaryNewpointTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliBinaryNewpointTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliBinaryNewpointTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliBinaryNewpointTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliBinaryNewpoint or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliBinaryNewpoint object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBinaryNewpointTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliBinaryNewpoint) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliBinaryNewpointTableMap::DATABASE_NAME);
            $criteria->add(AliBinaryNewpointTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliBinaryNewpointQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliBinaryNewpointTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliBinaryNewpointTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_binary_newpoint table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliBinaryNewpointQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliBinaryNewpoint or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliBinaryNewpoint object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBinaryNewpointTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliBinaryNewpoint object
        }

        if ($criteria->containsKey(AliBinaryNewpointTableMap::COL_ID) && $criteria->keyContainsValue(AliBinaryNewpointTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliBinaryNewpointTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliBinaryNewpointQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliBinaryNewpointTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliBinaryNewpointTableMap::buildTableMap();
