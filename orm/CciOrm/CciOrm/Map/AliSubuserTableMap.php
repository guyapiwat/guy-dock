<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliSubuser;
use CciOrm\CciOrm\AliSubuserQuery;
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
 * This class defines the structure of the 'ali_subuser' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliSubuserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliSubuserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_subuser';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliSubuser';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliSubuser';

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
     * the column name for the uid field
     */
    const COL_UID = 'ali_subuser.uid';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_subuser.usercode';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'ali_subuser.username';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'ali_subuser.password';

    /**
     * the column name for the object1 field
     */
    const COL_OBJECT1 = 'ali_subuser.object1';

    /**
     * the column name for the object2 field
     */
    const COL_OBJECT2 = 'ali_subuser.object2';

    /**
     * the column name for the object3 field
     */
    const COL_OBJECT3 = 'ali_subuser.object3';

    /**
     * the column name for the object4 field
     */
    const COL_OBJECT4 = 'ali_subuser.object4';

    /**
     * the column name for the object5 field
     */
    const COL_OBJECT5 = 'ali_subuser.object5';

    /**
     * the column name for the accessright field
     */
    const COL_ACCESSRIGHT = 'ali_subuser.accessright';

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
        self::TYPE_PHPNAME       => array('Uid', 'Usercode', 'Username', 'Password', 'Object1', 'Object2', 'Object3', 'Object4', 'Object5', 'Accessright', ),
        self::TYPE_CAMELNAME     => array('uid', 'usercode', 'username', 'password', 'object1', 'object2', 'object3', 'object4', 'object5', 'accessright', ),
        self::TYPE_COLNAME       => array(AliSubuserTableMap::COL_UID, AliSubuserTableMap::COL_USERCODE, AliSubuserTableMap::COL_USERNAME, AliSubuserTableMap::COL_PASSWORD, AliSubuserTableMap::COL_OBJECT1, AliSubuserTableMap::COL_OBJECT2, AliSubuserTableMap::COL_OBJECT3, AliSubuserTableMap::COL_OBJECT4, AliSubuserTableMap::COL_OBJECT5, AliSubuserTableMap::COL_ACCESSRIGHT, ),
        self::TYPE_FIELDNAME     => array('uid', 'usercode', 'username', 'password', 'object1', 'object2', 'object3', 'object4', 'object5', 'accessright', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Uid' => 0, 'Usercode' => 1, 'Username' => 2, 'Password' => 3, 'Object1' => 4, 'Object2' => 5, 'Object3' => 6, 'Object4' => 7, 'Object5' => 8, 'Accessright' => 9, ),
        self::TYPE_CAMELNAME     => array('uid' => 0, 'usercode' => 1, 'username' => 2, 'password' => 3, 'object1' => 4, 'object2' => 5, 'object3' => 6, 'object4' => 7, 'object5' => 8, 'accessright' => 9, ),
        self::TYPE_COLNAME       => array(AliSubuserTableMap::COL_UID => 0, AliSubuserTableMap::COL_USERCODE => 1, AliSubuserTableMap::COL_USERNAME => 2, AliSubuserTableMap::COL_PASSWORD => 3, AliSubuserTableMap::COL_OBJECT1 => 4, AliSubuserTableMap::COL_OBJECT2 => 5, AliSubuserTableMap::COL_OBJECT3 => 6, AliSubuserTableMap::COL_OBJECT4 => 7, AliSubuserTableMap::COL_OBJECT5 => 8, AliSubuserTableMap::COL_ACCESSRIGHT => 9, ),
        self::TYPE_FIELDNAME     => array('uid' => 0, 'usercode' => 1, 'username' => 2, 'password' => 3, 'object1' => 4, 'object2' => 5, 'object3' => 6, 'object4' => 7, 'object5' => 8, 'accessright' => 9, ),
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
        $this->setName('ali_subuser');
        $this->setPhpName('AliSubuser');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliSubuser');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('uid', 'Uid', 'INTEGER', true, 10, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 30, null);
        $this->addColumn('username', 'Username', 'VARCHAR', false, 30, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 30, null);
        $this->addColumn('object1', 'Object1', 'CHAR', false, null, null);
        $this->addColumn('object2', 'Object2', 'CHAR', false, null, null);
        $this->addColumn('object3', 'Object3', 'CHAR', false, null, null);
        $this->addColumn('object4', 'Object4', 'CHAR', false, null, null);
        $this->addColumn('object5', 'Object5', 'CHAR', false, null, null);
        $this->addColumn('accessright', 'Accessright', 'LONGVARCHAR', false, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliSubuserTableMap::CLASS_DEFAULT : AliSubuserTableMap::OM_CLASS;
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
     * @return array           (AliSubuser object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliSubuserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliSubuserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliSubuserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliSubuserTableMap::OM_CLASS;
            /** @var AliSubuser $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliSubuserTableMap::addInstanceToPool($obj, $key);
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
            $key = AliSubuserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliSubuserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliSubuser $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliSubuserTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliSubuserTableMap::COL_UID);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_USERNAME);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_OBJECT1);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_OBJECT2);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_OBJECT3);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_OBJECT4);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_OBJECT5);
            $criteria->addSelectColumn(AliSubuserTableMap::COL_ACCESSRIGHT);
        } else {
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.usercode');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.object1');
            $criteria->addSelectColumn($alias . '.object2');
            $criteria->addSelectColumn($alias . '.object3');
            $criteria->addSelectColumn($alias . '.object4');
            $criteria->addSelectColumn($alias . '.object5');
            $criteria->addSelectColumn($alias . '.accessright');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliSubuserTableMap::DATABASE_NAME)->getTable(AliSubuserTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliSubuserTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliSubuserTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliSubuserTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliSubuser or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliSubuser object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSubuserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliSubuser) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliSubuserTableMap::DATABASE_NAME);
            $criteria->add(AliSubuserTableMap::COL_UID, (array) $values, Criteria::IN);
        }

        $query = AliSubuserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliSubuserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliSubuserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_subuser table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliSubuserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliSubuser or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliSubuser object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSubuserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliSubuser object
        }

        if ($criteria->containsKey(AliSubuserTableMap::COL_UID) && $criteria->keyContainsValue(AliSubuserTableMap::COL_UID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliSubuserTableMap::COL_UID.')');
        }


        // Set the correct dbName
        $query = AliSubuserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliSubuserTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliSubuserTableMap::buildTableMap();
