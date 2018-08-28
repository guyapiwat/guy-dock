<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliLogKtc;
use CciOrm\CciOrm\AliLogKtcQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'ali_log_ktc' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliLogKtcTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliLogKtcTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_log_ktc';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliLogKtc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliLogKtc';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the ref1 field
     */
    const COL_REF1 = 'ali_log_ktc.ref1';

    /**
     * the column name for the src field
     */
    const COL_SRC = 'ali_log_ktc.src';

    /**
     * the column name for the prc field
     */
    const COL_PRC = 'ali_log_ktc.prc';

    /**
     * the column name for the ord field
     */
    const COL_ORD = 'ali_log_ktc.ord';

    /**
     * the column name for the holder field
     */
    const COL_HOLDER = 'ali_log_ktc.holder';

    /**
     * the column name for the successcode field
     */
    const COL_SUCCESSCODE = 'ali_log_ktc.successcode';

    /**
     * the column name for the ref2 field
     */
    const COL_REF2 = 'ali_log_ktc.ref2';

    /**
     * the column name for the payRef field
     */
    const COL_PAYREF = 'ali_log_ktc.payRef';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_log_ktc.amt';

    /**
     * the column name for the cur field
     */
    const COL_CUR = 'ali_log_ktc.cur';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_log_ktc.remark';

    /**
     * the column name for the authId field
     */
    const COL_AUTHID = 'ali_log_ktc.authId';

    /**
     * the column name for the payerAuth field
     */
    const COL_PAYERAUTH = 'ali_log_ktc.payerAuth';

    /**
     * the column name for the sourcelp field
     */
    const COL_SOURCELP = 'ali_log_ktc.sourcelp';

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
        self::TYPE_PHPNAME       => array('Ref1', 'Src', 'Prc', 'Ord', 'Holder', 'Successcode', 'Ref2', 'Payref', 'Amt', 'Cur', 'Remark', 'Authid', 'Payerauth', 'Sourcelp', ),
        self::TYPE_CAMELNAME     => array('ref1', 'src', 'prc', 'ord', 'holder', 'successcode', 'ref2', 'payref', 'amt', 'cur', 'remark', 'authid', 'payerauth', 'sourcelp', ),
        self::TYPE_COLNAME       => array(AliLogKtcTableMap::COL_REF1, AliLogKtcTableMap::COL_SRC, AliLogKtcTableMap::COL_PRC, AliLogKtcTableMap::COL_ORD, AliLogKtcTableMap::COL_HOLDER, AliLogKtcTableMap::COL_SUCCESSCODE, AliLogKtcTableMap::COL_REF2, AliLogKtcTableMap::COL_PAYREF, AliLogKtcTableMap::COL_AMT, AliLogKtcTableMap::COL_CUR, AliLogKtcTableMap::COL_REMARK, AliLogKtcTableMap::COL_AUTHID, AliLogKtcTableMap::COL_PAYERAUTH, AliLogKtcTableMap::COL_SOURCELP, ),
        self::TYPE_FIELDNAME     => array('ref1', 'src', 'prc', 'ord', 'holder', 'successcode', 'ref2', 'payRef', 'amt', 'cur', 'remark', 'authId', 'payerAuth', 'sourcelp', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Ref1' => 0, 'Src' => 1, 'Prc' => 2, 'Ord' => 3, 'Holder' => 4, 'Successcode' => 5, 'Ref2' => 6, 'Payref' => 7, 'Amt' => 8, 'Cur' => 9, 'Remark' => 10, 'Authid' => 11, 'Payerauth' => 12, 'Sourcelp' => 13, ),
        self::TYPE_CAMELNAME     => array('ref1' => 0, 'src' => 1, 'prc' => 2, 'ord' => 3, 'holder' => 4, 'successcode' => 5, 'ref2' => 6, 'payref' => 7, 'amt' => 8, 'cur' => 9, 'remark' => 10, 'authid' => 11, 'payerauth' => 12, 'sourcelp' => 13, ),
        self::TYPE_COLNAME       => array(AliLogKtcTableMap::COL_REF1 => 0, AliLogKtcTableMap::COL_SRC => 1, AliLogKtcTableMap::COL_PRC => 2, AliLogKtcTableMap::COL_ORD => 3, AliLogKtcTableMap::COL_HOLDER => 4, AliLogKtcTableMap::COL_SUCCESSCODE => 5, AliLogKtcTableMap::COL_REF2 => 6, AliLogKtcTableMap::COL_PAYREF => 7, AliLogKtcTableMap::COL_AMT => 8, AliLogKtcTableMap::COL_CUR => 9, AliLogKtcTableMap::COL_REMARK => 10, AliLogKtcTableMap::COL_AUTHID => 11, AliLogKtcTableMap::COL_PAYERAUTH => 12, AliLogKtcTableMap::COL_SOURCELP => 13, ),
        self::TYPE_FIELDNAME     => array('ref1' => 0, 'src' => 1, 'prc' => 2, 'ord' => 3, 'holder' => 4, 'successcode' => 5, 'ref2' => 6, 'payRef' => 7, 'amt' => 8, 'cur' => 9, 'remark' => 10, 'authId' => 11, 'payerAuth' => 12, 'sourcelp' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('ali_log_ktc');
        $this->setPhpName('AliLogKtc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliLogKtc');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('ref1', 'Ref1', 'VARCHAR', true, 255, null);
        $this->addColumn('src', 'Src', 'VARCHAR', true, 255, null);
        $this->addColumn('prc', 'Prc', 'VARCHAR', true, 255, null);
        $this->addColumn('ord', 'Ord', 'VARCHAR', true, 255, null);
        $this->addColumn('holder', 'Holder', 'VARCHAR', true, 255, null);
        $this->addColumn('successcode', 'Successcode', 'VARCHAR', true, 255, null);
        $this->addColumn('ref2', 'Ref2', 'VARCHAR', true, 255, null);
        $this->addColumn('payRef', 'Payref', 'VARCHAR', true, 255, null);
        $this->addColumn('amt', 'Amt', 'VARCHAR', true, 255, null);
        $this->addColumn('cur', 'Cur', 'VARCHAR', true, 255, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', true, 255, null);
        $this->addColumn('authId', 'Authid', 'VARCHAR', true, 255, null);
        $this->addColumn('payerAuth', 'Payerauth', 'VARCHAR', true, 255, null);
        $this->addColumn('sourcelp', 'Sourcelp', 'VARCHAR', true, 255, null);
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
        return null;
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
        return '';
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
        return $withPrefix ? AliLogKtcTableMap::CLASS_DEFAULT : AliLogKtcTableMap::OM_CLASS;
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
     * @return array           (AliLogKtc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliLogKtcTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliLogKtcTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliLogKtcTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliLogKtcTableMap::OM_CLASS;
            /** @var AliLogKtc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliLogKtcTableMap::addInstanceToPool($obj, $key);
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
            $key = AliLogKtcTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliLogKtcTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliLogKtc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliLogKtcTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_REF1);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_SRC);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_PRC);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_ORD);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_HOLDER);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_SUCCESSCODE);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_REF2);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_PAYREF);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_AMT);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_CUR);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_AUTHID);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_PAYERAUTH);
            $criteria->addSelectColumn(AliLogKtcTableMap::COL_SOURCELP);
        } else {
            $criteria->addSelectColumn($alias . '.ref1');
            $criteria->addSelectColumn($alias . '.src');
            $criteria->addSelectColumn($alias . '.prc');
            $criteria->addSelectColumn($alias . '.ord');
            $criteria->addSelectColumn($alias . '.holder');
            $criteria->addSelectColumn($alias . '.successcode');
            $criteria->addSelectColumn($alias . '.ref2');
            $criteria->addSelectColumn($alias . '.payRef');
            $criteria->addSelectColumn($alias . '.amt');
            $criteria->addSelectColumn($alias . '.cur');
            $criteria->addSelectColumn($alias . '.remark');
            $criteria->addSelectColumn($alias . '.authId');
            $criteria->addSelectColumn($alias . '.payerAuth');
            $criteria->addSelectColumn($alias . '.sourcelp');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliLogKtcTableMap::DATABASE_NAME)->getTable(AliLogKtcTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliLogKtcTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliLogKtcTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliLogKtcTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliLogKtc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliLogKtc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogKtcTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliLogKtc) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The AliLogKtc object has no primary key');
        }

        $query = AliLogKtcQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliLogKtcTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliLogKtcTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_log_ktc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliLogKtcQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliLogKtc or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliLogKtc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogKtcTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliLogKtc object
        }


        // Set the correct dbName
        $query = AliLogKtcQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliLogKtcTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliLogKtcTableMap::buildTableMap();
