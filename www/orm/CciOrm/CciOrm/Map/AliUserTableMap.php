<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliUser;
use CciOrm\CciOrm\AliUserQuery;
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
 * This class defines the structure of the 'ali_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliUserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliUserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_user';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliUser';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliUser';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_user.uid';

    /**
     * the column name for the usercode field
     */
    const COL_USERCODE = 'ali_user.usercode';

    /**
     * the column name for the username field
     */
    const COL_USERNAME = 'ali_user.username';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'ali_user.password';

    /**
     * the column name for the usertype field
     */
    const COL_USERTYPE = 'ali_user.usertype';

    /**
     * the column name for the object1 field
     */
    const COL_OBJECT1 = 'ali_user.object1';

    /**
     * the column name for the object2 field
     */
    const COL_OBJECT2 = 'ali_user.object2';

    /**
     * the column name for the object3 field
     */
    const COL_OBJECT3 = 'ali_user.object3';

    /**
     * the column name for the object4 field
     */
    const COL_OBJECT4 = 'ali_user.object4';

    /**
     * the column name for the object5 field
     */
    const COL_OBJECT5 = 'ali_user.object5';

    /**
     * the column name for the object6 field
     */
    const COL_OBJECT6 = 'ali_user.object6';

    /**
     * the column name for the object7 field
     */
    const COL_OBJECT7 = 'ali_user.object7';

    /**
     * the column name for the object8 field
     */
    const COL_OBJECT8 = 'ali_user.object8';

    /**
     * the column name for the object9 field
     */
    const COL_OBJECT9 = 'ali_user.object9';

    /**
     * the column name for the object10 field
     */
    const COL_OBJECT10 = 'ali_user.object10';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_user.inv_ref';

    /**
     * the column name for the accessright field
     */
    const COL_ACCESSRIGHT = 'ali_user.accessright';

    /**
     * the column name for the code_ref field
     */
    const COL_CODE_REF = 'ali_user.code_ref';

    /**
     * the column name for the checkbackdate field
     */
    const COL_CHECKBACKDATE = 'ali_user.checkbackdate';

    /**
     * the column name for the limitcredit field
     */
    const COL_LIMITCREDIT = 'ali_user.limitcredit';

    /**
     * the column name for the mtype field
     */
    const COL_MTYPE = 'ali_user.mtype';

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
        self::TYPE_PHPNAME       => array('Uid', 'Usercode', 'Username', 'Password', 'Usertype', 'Object1', 'Object2', 'Object3', 'Object4', 'Object5', 'Object6', 'Object7', 'Object8', 'Object9', 'Object10', 'InvRef', 'Accessright', 'CodeRef', 'Checkbackdate', 'Limitcredit', 'Mtype', ),
        self::TYPE_CAMELNAME     => array('uid', 'usercode', 'username', 'password', 'usertype', 'object1', 'object2', 'object3', 'object4', 'object5', 'object6', 'object7', 'object8', 'object9', 'object10', 'invRef', 'accessright', 'codeRef', 'checkbackdate', 'limitcredit', 'mtype', ),
        self::TYPE_COLNAME       => array(AliUserTableMap::COL_UID, AliUserTableMap::COL_USERCODE, AliUserTableMap::COL_USERNAME, AliUserTableMap::COL_PASSWORD, AliUserTableMap::COL_USERTYPE, AliUserTableMap::COL_OBJECT1, AliUserTableMap::COL_OBJECT2, AliUserTableMap::COL_OBJECT3, AliUserTableMap::COL_OBJECT4, AliUserTableMap::COL_OBJECT5, AliUserTableMap::COL_OBJECT6, AliUserTableMap::COL_OBJECT7, AliUserTableMap::COL_OBJECT8, AliUserTableMap::COL_OBJECT9, AliUserTableMap::COL_OBJECT10, AliUserTableMap::COL_INV_REF, AliUserTableMap::COL_ACCESSRIGHT, AliUserTableMap::COL_CODE_REF, AliUserTableMap::COL_CHECKBACKDATE, AliUserTableMap::COL_LIMITCREDIT, AliUserTableMap::COL_MTYPE, ),
        self::TYPE_FIELDNAME     => array('uid', 'usercode', 'username', 'password', 'usertype', 'object1', 'object2', 'object3', 'object4', 'object5', 'object6', 'object7', 'object8', 'object9', 'object10', 'inv_ref', 'accessright', 'code_ref', 'checkbackdate', 'limitcredit', 'mtype', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Uid' => 0, 'Usercode' => 1, 'Username' => 2, 'Password' => 3, 'Usertype' => 4, 'Object1' => 5, 'Object2' => 6, 'Object3' => 7, 'Object4' => 8, 'Object5' => 9, 'Object6' => 10, 'Object7' => 11, 'Object8' => 12, 'Object9' => 13, 'Object10' => 14, 'InvRef' => 15, 'Accessright' => 16, 'CodeRef' => 17, 'Checkbackdate' => 18, 'Limitcredit' => 19, 'Mtype' => 20, ),
        self::TYPE_CAMELNAME     => array('uid' => 0, 'usercode' => 1, 'username' => 2, 'password' => 3, 'usertype' => 4, 'object1' => 5, 'object2' => 6, 'object3' => 7, 'object4' => 8, 'object5' => 9, 'object6' => 10, 'object7' => 11, 'object8' => 12, 'object9' => 13, 'object10' => 14, 'invRef' => 15, 'accessright' => 16, 'codeRef' => 17, 'checkbackdate' => 18, 'limitcredit' => 19, 'mtype' => 20, ),
        self::TYPE_COLNAME       => array(AliUserTableMap::COL_UID => 0, AliUserTableMap::COL_USERCODE => 1, AliUserTableMap::COL_USERNAME => 2, AliUserTableMap::COL_PASSWORD => 3, AliUserTableMap::COL_USERTYPE => 4, AliUserTableMap::COL_OBJECT1 => 5, AliUserTableMap::COL_OBJECT2 => 6, AliUserTableMap::COL_OBJECT3 => 7, AliUserTableMap::COL_OBJECT4 => 8, AliUserTableMap::COL_OBJECT5 => 9, AliUserTableMap::COL_OBJECT6 => 10, AliUserTableMap::COL_OBJECT7 => 11, AliUserTableMap::COL_OBJECT8 => 12, AliUserTableMap::COL_OBJECT9 => 13, AliUserTableMap::COL_OBJECT10 => 14, AliUserTableMap::COL_INV_REF => 15, AliUserTableMap::COL_ACCESSRIGHT => 16, AliUserTableMap::COL_CODE_REF => 17, AliUserTableMap::COL_CHECKBACKDATE => 18, AliUserTableMap::COL_LIMITCREDIT => 19, AliUserTableMap::COL_MTYPE => 20, ),
        self::TYPE_FIELDNAME     => array('uid' => 0, 'usercode' => 1, 'username' => 2, 'password' => 3, 'usertype' => 4, 'object1' => 5, 'object2' => 6, 'object3' => 7, 'object4' => 8, 'object5' => 9, 'object6' => 10, 'object7' => 11, 'object8' => 12, 'object9' => 13, 'object10' => 14, 'inv_ref' => 15, 'accessright' => 16, 'code_ref' => 17, 'checkbackdate' => 18, 'limitcredit' => 19, 'mtype' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $this->setName('ali_user');
        $this->setPhpName('AliUser');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliUser');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('uid', 'Uid', 'INTEGER', true, 10, null);
        $this->addColumn('usercode', 'Usercode', 'VARCHAR', false, 30, null);
        $this->addColumn('username', 'Username', 'VARCHAR', false, 255, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 255, null);
        $this->addColumn('usertype', 'Usertype', 'INTEGER', false, null, null);
        $this->addColumn('object1', 'Object1', 'INTEGER', false, 5, null);
        $this->addColumn('object2', 'Object2', 'INTEGER', false, 5, null);
        $this->addColumn('object3', 'Object3', 'INTEGER', false, 5, null);
        $this->addColumn('object4', 'Object4', 'INTEGER', false, 5, null);
        $this->addColumn('object5', 'Object5', 'INTEGER', false, 5, null);
        $this->addColumn('object6', 'Object6', 'INTEGER', true, null, null);
        $this->addColumn('object7', 'Object7', 'INTEGER', true, 5, null);
        $this->addColumn('object8', 'Object8', 'INTEGER', true, 5, null);
        $this->addColumn('object9', 'Object9', 'INTEGER', true, 5, null);
        $this->addColumn('object10', 'Object10', 'INTEGER', true, 5, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', false, 20, null);
        $this->addColumn('accessright', 'Accessright', 'LONGVARCHAR', false, null, null);
        $this->addColumn('code_ref', 'CodeRef', 'VARCHAR', true, 255, null);
        $this->addColumn('checkbackdate', 'Checkbackdate', 'INTEGER', true, null, null);
        $this->addColumn('limitcredit', 'Limitcredit', 'INTEGER', true, null, null);
        $this->addColumn('mtype', 'Mtype', 'INTEGER', true, 2, null);
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
        return $withPrefix ? AliUserTableMap::CLASS_DEFAULT : AliUserTableMap::OM_CLASS;
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
     * @return array           (AliUser object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliUserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliUserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliUserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliUserTableMap::OM_CLASS;
            /** @var AliUser $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliUserTableMap::addInstanceToPool($obj, $key);
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
            $key = AliUserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliUserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliUser $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliUserTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliUserTableMap::COL_UID);
            $criteria->addSelectColumn(AliUserTableMap::COL_USERCODE);
            $criteria->addSelectColumn(AliUserTableMap::COL_USERNAME);
            $criteria->addSelectColumn(AliUserTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(AliUserTableMap::COL_USERTYPE);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT1);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT2);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT3);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT4);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT5);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT6);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT7);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT8);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT9);
            $criteria->addSelectColumn(AliUserTableMap::COL_OBJECT10);
            $criteria->addSelectColumn(AliUserTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliUserTableMap::COL_ACCESSRIGHT);
            $criteria->addSelectColumn(AliUserTableMap::COL_CODE_REF);
            $criteria->addSelectColumn(AliUserTableMap::COL_CHECKBACKDATE);
            $criteria->addSelectColumn(AliUserTableMap::COL_LIMITCREDIT);
            $criteria->addSelectColumn(AliUserTableMap::COL_MTYPE);
        } else {
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.usercode');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.usertype');
            $criteria->addSelectColumn($alias . '.object1');
            $criteria->addSelectColumn($alias . '.object2');
            $criteria->addSelectColumn($alias . '.object3');
            $criteria->addSelectColumn($alias . '.object4');
            $criteria->addSelectColumn($alias . '.object5');
            $criteria->addSelectColumn($alias . '.object6');
            $criteria->addSelectColumn($alias . '.object7');
            $criteria->addSelectColumn($alias . '.object8');
            $criteria->addSelectColumn($alias . '.object9');
            $criteria->addSelectColumn($alias . '.object10');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.accessright');
            $criteria->addSelectColumn($alias . '.code_ref');
            $criteria->addSelectColumn($alias . '.checkbackdate');
            $criteria->addSelectColumn($alias . '.limitcredit');
            $criteria->addSelectColumn($alias . '.mtype');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliUserTableMap::DATABASE_NAME)->getTable(AliUserTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliUserTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliUserTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliUserTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliUser or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliUser object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliUserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliUser) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliUserTableMap::DATABASE_NAME);
            $criteria->add(AliUserTableMap::COL_UID, (array) $values, Criteria::IN);
        }

        $query = AliUserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliUserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliUserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliUserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliUser or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliUser object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliUserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliUser object
        }

        if ($criteria->containsKey(AliUserTableMap::COL_UID) && $criteria->keyContainsValue(AliUserTableMap::COL_UID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliUserTableMap::COL_UID.')');
        }


        // Set the correct dbName
        $query = AliUserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliUserTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliUserTableMap::buildTableMap();
