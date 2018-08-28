<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliStocks;
use CciOrm\CciOrm\AliStocksQuery;
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
 * This class defines the structure of the 'ali_stocks' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliStocksTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliStocksTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_stocks';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliStocks';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliStocks';

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
     * the column name for the id field
     */
    const COL_ID = 'ali_stocks.id';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_stocks.sano';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_stocks.inv_code';

    /**
     * the column name for the inv_code1 field
     */
    const COL_INV_CODE1 = 'ali_stocks.inv_code1';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_stocks.mcode';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_stocks.pcode';

    /**
     * the column name for the yokma field
     */
    const COL_YOKMA = 'ali_stocks.yokma';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_stocks.qty';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_stocks.amt';

    /**
     * the column name for the sdate field
     */
    const COL_SDATE = 'ali_stocks.sdate';

    /**
     * the column name for the stime field
     */
    const COL_STIME = 'ali_stocks.stime';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_stocks.status';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_stocks.remark';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_stocks.uid';

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
        self::TYPE_PHPNAME       => array('Id', 'Sano', 'InvCode', 'InvCode1', 'Mcode', 'Pcode', 'Yokma', 'Qty', 'Amt', 'Sdate', 'Stime', 'Status', 'Remark', 'Uid', ),
        self::TYPE_CAMELNAME     => array('id', 'sano', 'invCode', 'invCode1', 'mcode', 'pcode', 'yokma', 'qty', 'amt', 'sdate', 'stime', 'status', 'remark', 'uid', ),
        self::TYPE_COLNAME       => array(AliStocksTableMap::COL_ID, AliStocksTableMap::COL_SANO, AliStocksTableMap::COL_INV_CODE, AliStocksTableMap::COL_INV_CODE1, AliStocksTableMap::COL_MCODE, AliStocksTableMap::COL_PCODE, AliStocksTableMap::COL_YOKMA, AliStocksTableMap::COL_QTY, AliStocksTableMap::COL_AMT, AliStocksTableMap::COL_SDATE, AliStocksTableMap::COL_STIME, AliStocksTableMap::COL_STATUS, AliStocksTableMap::COL_REMARK, AliStocksTableMap::COL_UID, ),
        self::TYPE_FIELDNAME     => array('id', 'sano', 'inv_code', 'inv_code1', 'mcode', 'pcode', 'yokma', 'qty', 'amt', 'sdate', 'stime', 'status', 'remark', 'uid', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sano' => 1, 'InvCode' => 2, 'InvCode1' => 3, 'Mcode' => 4, 'Pcode' => 5, 'Yokma' => 6, 'Qty' => 7, 'Amt' => 8, 'Sdate' => 9, 'Stime' => 10, 'Status' => 11, 'Remark' => 12, 'Uid' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sano' => 1, 'invCode' => 2, 'invCode1' => 3, 'mcode' => 4, 'pcode' => 5, 'yokma' => 6, 'qty' => 7, 'amt' => 8, 'sdate' => 9, 'stime' => 10, 'status' => 11, 'remark' => 12, 'uid' => 13, ),
        self::TYPE_COLNAME       => array(AliStocksTableMap::COL_ID => 0, AliStocksTableMap::COL_SANO => 1, AliStocksTableMap::COL_INV_CODE => 2, AliStocksTableMap::COL_INV_CODE1 => 3, AliStocksTableMap::COL_MCODE => 4, AliStocksTableMap::COL_PCODE => 5, AliStocksTableMap::COL_YOKMA => 6, AliStocksTableMap::COL_QTY => 7, AliStocksTableMap::COL_AMT => 8, AliStocksTableMap::COL_SDATE => 9, AliStocksTableMap::COL_STIME => 10, AliStocksTableMap::COL_STATUS => 11, AliStocksTableMap::COL_REMARK => 12, AliStocksTableMap::COL_UID => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sano' => 1, 'inv_code' => 2, 'inv_code1' => 3, 'mcode' => 4, 'pcode' => 5, 'yokma' => 6, 'qty' => 7, 'amt' => 8, 'sdate' => 9, 'stime' => 10, 'status' => 11, 'remark' => 12, 'uid' => 13, ),
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
        $this->setName('ali_stocks');
        $this->setPhpName('AliStocks');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliStocks');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_code1', 'InvCode1', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('yokma', 'Yokma', 'INTEGER', true, null, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', true, null, null);
        $this->addColumn('amt', 'Amt', 'INTEGER', true, null, null);
        $this->addColumn('sdate', 'Sdate', 'DATE', true, null, null);
        $this->addColumn('stime', 'Stime', 'TIME', true, null, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 255, null);
        $this->addColumn('remark', 'Remark', 'LONGVARCHAR', true, null, null);
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
        return $withPrefix ? AliStocksTableMap::CLASS_DEFAULT : AliStocksTableMap::OM_CLASS;
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
     * @return array           (AliStocks object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliStocksTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliStocksTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliStocksTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliStocksTableMap::OM_CLASS;
            /** @var AliStocks $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliStocksTableMap::addInstanceToPool($obj, $key);
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
            $key = AliStocksTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliStocksTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliStocks $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliStocksTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliStocksTableMap::COL_ID);
            $criteria->addSelectColumn(AliStocksTableMap::COL_SANO);
            $criteria->addSelectColumn(AliStocksTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliStocksTableMap::COL_INV_CODE1);
            $criteria->addSelectColumn(AliStocksTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliStocksTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliStocksTableMap::COL_YOKMA);
            $criteria->addSelectColumn(AliStocksTableMap::COL_QTY);
            $criteria->addSelectColumn(AliStocksTableMap::COL_AMT);
            $criteria->addSelectColumn(AliStocksTableMap::COL_SDATE);
            $criteria->addSelectColumn(AliStocksTableMap::COL_STIME);
            $criteria->addSelectColumn(AliStocksTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliStocksTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliStocksTableMap::COL_UID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_code1');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.yokma');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.amt');
            $criteria->addSelectColumn($alias . '.sdate');
            $criteria->addSelectColumn($alias . '.stime');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.remark');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliStocksTableMap::DATABASE_NAME)->getTable(AliStocksTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliStocksTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliStocksTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliStocksTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliStocks or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliStocks object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStocksTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliStocks) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliStocksTableMap::DATABASE_NAME);
            $criteria->add(AliStocksTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliStocksQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliStocksTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliStocksTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_stocks table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliStocksQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliStocks or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliStocks object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStocksTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliStocks object
        }

        if ($criteria->containsKey(AliStocksTableMap::COL_ID) && $criteria->keyContainsValue(AliStocksTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliStocksTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliStocksQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliStocksTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliStocksTableMap::buildTableMap();
