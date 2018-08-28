<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliLogIpay;
use CciOrm\CciOrm\AliLogIpayQuery;
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
 * This class defines the structure of the 'ali_log_ipay' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliLogIpayTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliLogIpayTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_log_ipay';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliLogIpay';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliLogIpay';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the ipayorderid field
     */
    const COL_IPAYORDERID = 'ali_log_ipay.ipayorderid';

    /**
     * the column name for the inv_no field
     */
    const COL_INV_NO = 'ali_log_ipay.inv_no';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'ali_log_ipay.amount';

    /**
     * the column name for the pay_type field
     */
    const COL_PAY_TYPE = 'ali_log_ipay.pay_type';

    /**
     * the column name for the pay_method field
     */
    const COL_PAY_METHOD = 'ali_log_ipay.pay_method';

    /**
     * the column name for the resp_code field
     */
    const COL_RESP_CODE = 'ali_log_ipay.resp_code';

    /**
     * the column name for the resp_desc field
     */
    const COL_RESP_DESC = 'ali_log_ipay.resp_desc';

    /**
     * the column name for the coupon_status field
     */
    const COL_COUPON_STATUS = 'ali_log_ipay.coupon_status';

    /**
     * the column name for the coupon_serial field
     */
    const COL_COUPON_SERIAL = 'ali_log_ipay.coupon_serial';

    /**
     * the column name for the coupon_password field
     */
    const COL_COUPON_PASSWORD = 'ali_log_ipay.coupon_password';

    /**
     * the column name for the coupon_ref field
     */
    const COL_COUPON_REF = 'ali_log_ipay.coupon_ref';

    /**
     * the column name for the billtype field
     */
    const COL_BILLTYPE = 'ali_log_ipay.billtype';

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
        self::TYPE_PHPNAME       => array('Ipayorderid', 'InvNo', 'Amount', 'PayType', 'PayMethod', 'RespCode', 'RespDesc', 'CouponStatus', 'CouponSerial', 'CouponPassword', 'CouponRef', 'Billtype', ),
        self::TYPE_CAMELNAME     => array('ipayorderid', 'invNo', 'amount', 'payType', 'payMethod', 'respCode', 'respDesc', 'couponStatus', 'couponSerial', 'couponPassword', 'couponRef', 'billtype', ),
        self::TYPE_COLNAME       => array(AliLogIpayTableMap::COL_IPAYORDERID, AliLogIpayTableMap::COL_INV_NO, AliLogIpayTableMap::COL_AMOUNT, AliLogIpayTableMap::COL_PAY_TYPE, AliLogIpayTableMap::COL_PAY_METHOD, AliLogIpayTableMap::COL_RESP_CODE, AliLogIpayTableMap::COL_RESP_DESC, AliLogIpayTableMap::COL_COUPON_STATUS, AliLogIpayTableMap::COL_COUPON_SERIAL, AliLogIpayTableMap::COL_COUPON_PASSWORD, AliLogIpayTableMap::COL_COUPON_REF, AliLogIpayTableMap::COL_BILLTYPE, ),
        self::TYPE_FIELDNAME     => array('ipayorderid', 'inv_no', 'amount', 'pay_type', 'pay_method', 'resp_code', 'resp_desc', 'coupon_status', 'coupon_serial', 'coupon_password', 'coupon_ref', 'billtype', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Ipayorderid' => 0, 'InvNo' => 1, 'Amount' => 2, 'PayType' => 3, 'PayMethod' => 4, 'RespCode' => 5, 'RespDesc' => 6, 'CouponStatus' => 7, 'CouponSerial' => 8, 'CouponPassword' => 9, 'CouponRef' => 10, 'Billtype' => 11, ),
        self::TYPE_CAMELNAME     => array('ipayorderid' => 0, 'invNo' => 1, 'amount' => 2, 'payType' => 3, 'payMethod' => 4, 'respCode' => 5, 'respDesc' => 6, 'couponStatus' => 7, 'couponSerial' => 8, 'couponPassword' => 9, 'couponRef' => 10, 'billtype' => 11, ),
        self::TYPE_COLNAME       => array(AliLogIpayTableMap::COL_IPAYORDERID => 0, AliLogIpayTableMap::COL_INV_NO => 1, AliLogIpayTableMap::COL_AMOUNT => 2, AliLogIpayTableMap::COL_PAY_TYPE => 3, AliLogIpayTableMap::COL_PAY_METHOD => 4, AliLogIpayTableMap::COL_RESP_CODE => 5, AliLogIpayTableMap::COL_RESP_DESC => 6, AliLogIpayTableMap::COL_COUPON_STATUS => 7, AliLogIpayTableMap::COL_COUPON_SERIAL => 8, AliLogIpayTableMap::COL_COUPON_PASSWORD => 9, AliLogIpayTableMap::COL_COUPON_REF => 10, AliLogIpayTableMap::COL_BILLTYPE => 11, ),
        self::TYPE_FIELDNAME     => array('ipayorderid' => 0, 'inv_no' => 1, 'amount' => 2, 'pay_type' => 3, 'pay_method' => 4, 'resp_code' => 5, 'resp_desc' => 6, 'coupon_status' => 7, 'coupon_serial' => 8, 'coupon_password' => 9, 'coupon_ref' => 10, 'billtype' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('ali_log_ipay');
        $this->setPhpName('AliLogIpay');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliLogIpay');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('ipayorderid', 'Ipayorderid', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_no', 'InvNo', 'VARCHAR', true, 255, null);
        $this->addColumn('amount', 'Amount', 'VARCHAR', true, 255, null);
        $this->addColumn('pay_type', 'PayType', 'VARCHAR', true, 255, null);
        $this->addColumn('pay_method', 'PayMethod', 'VARCHAR', true, 255, null);
        $this->addColumn('resp_code', 'RespCode', 'VARCHAR', true, 255, null);
        $this->addColumn('resp_desc', 'RespDesc', 'VARCHAR', true, 255, null);
        $this->addColumn('coupon_status', 'CouponStatus', 'VARCHAR', true, 255, null);
        $this->addColumn('coupon_serial', 'CouponSerial', 'VARCHAR', true, 255, null);
        $this->addColumn('coupon_password', 'CouponPassword', 'VARCHAR', true, 255, null);
        $this->addColumn('coupon_ref', 'CouponRef', 'VARCHAR', true, 255, null);
        $this->addColumn('billtype', 'Billtype', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliLogIpayTableMap::CLASS_DEFAULT : AliLogIpayTableMap::OM_CLASS;
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
     * @return array           (AliLogIpay object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliLogIpayTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliLogIpayTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliLogIpayTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliLogIpayTableMap::OM_CLASS;
            /** @var AliLogIpay $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliLogIpayTableMap::addInstanceToPool($obj, $key);
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
            $key = AliLogIpayTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliLogIpayTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliLogIpay $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliLogIpayTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_IPAYORDERID);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_INV_NO);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_PAY_TYPE);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_PAY_METHOD);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_RESP_CODE);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_RESP_DESC);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_COUPON_STATUS);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_COUPON_SERIAL);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_COUPON_PASSWORD);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_COUPON_REF);
            $criteria->addSelectColumn(AliLogIpayTableMap::COL_BILLTYPE);
        } else {
            $criteria->addSelectColumn($alias . '.ipayorderid');
            $criteria->addSelectColumn($alias . '.inv_no');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.pay_type');
            $criteria->addSelectColumn($alias . '.pay_method');
            $criteria->addSelectColumn($alias . '.resp_code');
            $criteria->addSelectColumn($alias . '.resp_desc');
            $criteria->addSelectColumn($alias . '.coupon_status');
            $criteria->addSelectColumn($alias . '.coupon_serial');
            $criteria->addSelectColumn($alias . '.coupon_password');
            $criteria->addSelectColumn($alias . '.coupon_ref');
            $criteria->addSelectColumn($alias . '.billtype');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliLogIpayTableMap::DATABASE_NAME)->getTable(AliLogIpayTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliLogIpayTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliLogIpayTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliLogIpayTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliLogIpay or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliLogIpay object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogIpayTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliLogIpay) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The AliLogIpay object has no primary key');
        }

        $query = AliLogIpayQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliLogIpayTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliLogIpayTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_log_ipay table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliLogIpayQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliLogIpay or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliLogIpay object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogIpayTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliLogIpay object
        }


        // Set the correct dbName
        $query = AliLogIpayQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliLogIpayTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliLogIpayTableMap::buildTableMap();
