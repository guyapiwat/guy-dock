<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliProductInventLog;
use CciOrm\CciOrm\AliProductInventLogQuery;
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
 * This class defines the structure of the 'ali_product_invent_log' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliProductInventLogTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliProductInventLogTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_product_invent_log';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliProductInventLog';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliProductInventLog';

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
    const COL_ID = 'ali_product_invent_log.id';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_product_invent_log.sadate';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_product_invent_log.pcode';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_product_invent_log.qty';

    /**
     * the column name for the in_qty field
     */
    const COL_IN_QTY = 'ali_product_invent_log.in_qty';

    /**
     * the column name for the out_qty field
     */
    const COL_OUT_QTY = 'ali_product_invent_log.out_qty';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_product_invent_log.inv_code';

    /**
     * the column name for the check_date field
     */
    const COL_CHECK_DATE = 'ali_product_invent_log.check_date';

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
        self::TYPE_PHPNAME       => array('Id', 'Sadate', 'Pcode', 'Qty', 'InQty', 'OutQty', 'InvCode', 'CheckDate', ),
        self::TYPE_CAMELNAME     => array('id', 'sadate', 'pcode', 'qty', 'inQty', 'outQty', 'invCode', 'checkDate', ),
        self::TYPE_COLNAME       => array(AliProductInventLogTableMap::COL_ID, AliProductInventLogTableMap::COL_SADATE, AliProductInventLogTableMap::COL_PCODE, AliProductInventLogTableMap::COL_QTY, AliProductInventLogTableMap::COL_IN_QTY, AliProductInventLogTableMap::COL_OUT_QTY, AliProductInventLogTableMap::COL_INV_CODE, AliProductInventLogTableMap::COL_CHECK_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'sadate', 'pcode', 'qty', 'in_qty', 'out_qty', 'inv_code', 'check_date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sadate' => 1, 'Pcode' => 2, 'Qty' => 3, 'InQty' => 4, 'OutQty' => 5, 'InvCode' => 6, 'CheckDate' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sadate' => 1, 'pcode' => 2, 'qty' => 3, 'inQty' => 4, 'outQty' => 5, 'invCode' => 6, 'checkDate' => 7, ),
        self::TYPE_COLNAME       => array(AliProductInventLogTableMap::COL_ID => 0, AliProductInventLogTableMap::COL_SADATE => 1, AliProductInventLogTableMap::COL_PCODE => 2, AliProductInventLogTableMap::COL_QTY => 3, AliProductInventLogTableMap::COL_IN_QTY => 4, AliProductInventLogTableMap::COL_OUT_QTY => 5, AliProductInventLogTableMap::COL_INV_CODE => 6, AliProductInventLogTableMap::COL_CHECK_DATE => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sadate' => 1, 'pcode' => 2, 'qty' => 3, 'in_qty' => 4, 'out_qty' => 5, 'inv_code' => 6, 'check_date' => 7, ),
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
        $this->setName('ali_product_invent_log');
        $this->setPhpName('AliProductInventLog');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliProductInventLog');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', true, null, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', true, 255, '');
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 5, null);
        $this->addColumn('in_qty', 'InQty', 'INTEGER', true, null, null);
        $this->addColumn('out_qty', 'OutQty', 'INTEGER', true, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('check_date', 'CheckDate', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
        return $withPrefix ? AliProductInventLogTableMap::CLASS_DEFAULT : AliProductInventLogTableMap::OM_CLASS;
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
     * @return array           (AliProductInventLog object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliProductInventLogTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliProductInventLogTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliProductInventLogTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliProductInventLogTableMap::OM_CLASS;
            /** @var AliProductInventLog $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliProductInventLogTableMap::addInstanceToPool($obj, $key);
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
            $key = AliProductInventLogTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliProductInventLogTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliProductInventLog $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliProductInventLogTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliProductInventLogTableMap::COL_ID);
            $criteria->addSelectColumn(AliProductInventLogTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliProductInventLogTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliProductInventLogTableMap::COL_QTY);
            $criteria->addSelectColumn(AliProductInventLogTableMap::COL_IN_QTY);
            $criteria->addSelectColumn(AliProductInventLogTableMap::COL_OUT_QTY);
            $criteria->addSelectColumn(AliProductInventLogTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliProductInventLogTableMap::COL_CHECK_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.in_qty');
            $criteria->addSelectColumn($alias . '.out_qty');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.check_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliProductInventLogTableMap::DATABASE_NAME)->getTable(AliProductInventLogTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliProductInventLogTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliProductInventLogTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliProductInventLogTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliProductInventLog or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliProductInventLog object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInventLogTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliProductInventLog) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliProductInventLogTableMap::DATABASE_NAME);
            $criteria->add(AliProductInventLogTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliProductInventLogQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliProductInventLogTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliProductInventLogTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_product_invent_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliProductInventLogQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliProductInventLog or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliProductInventLog object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInventLogTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliProductInventLog object
        }

        if ($criteria->containsKey(AliProductInventLogTableMap::COL_ID) && $criteria->keyContainsValue(AliProductInventLogTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliProductInventLogTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliProductInventLogQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliProductInventLogTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliProductInventLogTableMap::buildTableMap();
