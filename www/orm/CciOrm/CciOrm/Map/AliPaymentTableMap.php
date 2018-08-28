<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliPayment;
use CciOrm\CciOrm\AliPaymentQuery;
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
 * This class defines the structure of the 'ali_payment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliPaymentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliPaymentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_payment';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliPayment';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliPayment';

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
     * the column name for the id field
     */
    const COL_ID = 'ali_payment.id';

    /**
     * the column name for the payment_name field
     */
    const COL_PAYMENT_NAME = 'ali_payment.payment_name';

    /**
     * the column name for the order_by field
     */
    const COL_ORDER_BY = 'ali_payment.order_by';

    /**
     * the column name for the payment_ref field
     */
    const COL_PAYMENT_REF = 'ali_payment.payment_ref';

    /**
     * the column name for the rep_column field
     */
    const COL_REP_COLUMN = 'ali_payment.rep_column';

    /**
     * the column name for the payment_column field
     */
    const COL_PAYMENT_COLUMN = 'ali_payment.payment_column';

    /**
     * the column name for the shows field
     */
    const COL_SHOWS = 'ali_payment.shows';

    /**
     * the column name for the shows_ewallet field
     */
    const COL_SHOWS_EWALLET = 'ali_payment.shows_ewallet';

    /**
     * the column name for the shows_mem_edit field
     */
    const COL_SHOWS_MEM_EDIT = 'ali_payment.shows_mem_edit';

    /**
     * the column name for the shows_member field
     */
    const COL_SHOWS_MEMBER = 'ali_payment.shows_member';

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
        self::TYPE_PHPNAME       => array('Id', 'PaymentName', 'OrderBy', 'PaymentRef', 'RepColumn', 'PaymentColumn', 'Shows', 'ShowsEwallet', 'ShowsMemEdit', 'ShowsMember', ),
        self::TYPE_CAMELNAME     => array('id', 'paymentName', 'orderBy', 'paymentRef', 'repColumn', 'paymentColumn', 'shows', 'showsEwallet', 'showsMemEdit', 'showsMember', ),
        self::TYPE_COLNAME       => array(AliPaymentTableMap::COL_ID, AliPaymentTableMap::COL_PAYMENT_NAME, AliPaymentTableMap::COL_ORDER_BY, AliPaymentTableMap::COL_PAYMENT_REF, AliPaymentTableMap::COL_REP_COLUMN, AliPaymentTableMap::COL_PAYMENT_COLUMN, AliPaymentTableMap::COL_SHOWS, AliPaymentTableMap::COL_SHOWS_EWALLET, AliPaymentTableMap::COL_SHOWS_MEM_EDIT, AliPaymentTableMap::COL_SHOWS_MEMBER, ),
        self::TYPE_FIELDNAME     => array('id', 'payment_name', 'order_by', 'payment_ref', 'rep_column', 'payment_column', 'shows', 'shows_ewallet', 'shows_mem_edit', 'shows_member', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'PaymentName' => 1, 'OrderBy' => 2, 'PaymentRef' => 3, 'RepColumn' => 4, 'PaymentColumn' => 5, 'Shows' => 6, 'ShowsEwallet' => 7, 'ShowsMemEdit' => 8, 'ShowsMember' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'paymentName' => 1, 'orderBy' => 2, 'paymentRef' => 3, 'repColumn' => 4, 'paymentColumn' => 5, 'shows' => 6, 'showsEwallet' => 7, 'showsMemEdit' => 8, 'showsMember' => 9, ),
        self::TYPE_COLNAME       => array(AliPaymentTableMap::COL_ID => 0, AliPaymentTableMap::COL_PAYMENT_NAME => 1, AliPaymentTableMap::COL_ORDER_BY => 2, AliPaymentTableMap::COL_PAYMENT_REF => 3, AliPaymentTableMap::COL_REP_COLUMN => 4, AliPaymentTableMap::COL_PAYMENT_COLUMN => 5, AliPaymentTableMap::COL_SHOWS => 6, AliPaymentTableMap::COL_SHOWS_EWALLET => 7, AliPaymentTableMap::COL_SHOWS_MEM_EDIT => 8, AliPaymentTableMap::COL_SHOWS_MEMBER => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'payment_name' => 1, 'order_by' => 2, 'payment_ref' => 3, 'rep_column' => 4, 'payment_column' => 5, 'shows' => 6, 'shows_ewallet' => 7, 'shows_mem_edit' => 8, 'shows_member' => 9, ),
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
        $this->setName('ali_payment');
        $this->setPhpName('AliPayment');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliPayment');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('payment_name', 'PaymentName', 'VARCHAR', true, 255, null);
        $this->addColumn('order_by', 'OrderBy', 'INTEGER', true, 2, null);
        $this->addColumn('payment_ref', 'PaymentRef', 'VARCHAR', true, 255, null);
        $this->addColumn('rep_column', 'RepColumn', 'VARCHAR', true, 2555, null);
        $this->addColumn('payment_column', 'PaymentColumn', 'VARCHAR', true, 255, null);
        $this->addColumn('shows', 'Shows', 'INTEGER', true, 1, null);
        $this->addColumn('shows_ewallet', 'ShowsEwallet', 'INTEGER', true, 1, null);
        $this->addColumn('shows_mem_edit', 'ShowsMemEdit', 'INTEGER', true, 1, null);
        $this->addColumn('shows_member', 'ShowsMember', 'INTEGER', true, 1, null);
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
        return $withPrefix ? AliPaymentTableMap::CLASS_DEFAULT : AliPaymentTableMap::OM_CLASS;
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
     * @return array           (AliPayment object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliPaymentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliPaymentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliPaymentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliPaymentTableMap::OM_CLASS;
            /** @var AliPayment $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliPaymentTableMap::addInstanceToPool($obj, $key);
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
            $key = AliPaymentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliPaymentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliPayment $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliPaymentTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliPaymentTableMap::COL_ID);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_PAYMENT_NAME);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_ORDER_BY);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_PAYMENT_REF);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_REP_COLUMN);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_PAYMENT_COLUMN);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_SHOWS);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_SHOWS_EWALLET);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_SHOWS_MEM_EDIT);
            $criteria->addSelectColumn(AliPaymentTableMap::COL_SHOWS_MEMBER);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.payment_name');
            $criteria->addSelectColumn($alias . '.order_by');
            $criteria->addSelectColumn($alias . '.payment_ref');
            $criteria->addSelectColumn($alias . '.rep_column');
            $criteria->addSelectColumn($alias . '.payment_column');
            $criteria->addSelectColumn($alias . '.shows');
            $criteria->addSelectColumn($alias . '.shows_ewallet');
            $criteria->addSelectColumn($alias . '.shows_mem_edit');
            $criteria->addSelectColumn($alias . '.shows_member');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliPaymentTableMap::DATABASE_NAME)->getTable(AliPaymentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliPaymentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliPaymentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliPaymentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliPayment or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliPayment object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPaymentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliPayment) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliPaymentTableMap::DATABASE_NAME);
            $criteria->add(AliPaymentTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliPaymentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliPaymentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliPaymentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_payment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliPaymentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliPayment or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliPayment object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPaymentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliPayment object
        }

        if ($criteria->containsKey(AliPaymentTableMap::COL_ID) && $criteria->keyContainsValue(AliPaymentTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliPaymentTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliPaymentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliPaymentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliPaymentTableMap::buildTableMap();
