<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliSms;
use CciOrm\CciOrm\AliSmsQuery;
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
 * This class defines the structure of the 'ali_sms' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliSmsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliSmsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_sms';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliSms';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliSms';

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
    const COL_ID = 'ali_sms.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_sms.mcode';

    /**
     * the column name for the mobile field
     */
    const COL_MOBILE = 'ali_sms.mobile';

    /**
     * the column name for the mobile_desc field
     */
    const COL_MOBILE_DESC = 'ali_sms.mobile_desc';

    /**
     * the column name for the mobile_date field
     */
    const COL_MOBILE_DATE = 'ali_sms.mobile_date';

    /**
     * the column name for the send_date field
     */
    const COL_SEND_DATE = 'ali_sms.send_date';

    /**
     * the column name for the mobile_status field
     */
    const COL_MOBILE_STATUS = 'ali_sms.mobile_status';

    /**
     * the column name for the mobile_credits field
     */
    const COL_MOBILE_CREDITS = 'ali_sms.mobile_credits';

    /**
     * the column name for the credit_balance field
     */
    const COL_CREDIT_BALANCE = 'ali_sms.credit_balance';

    /**
     * the column name for the recieve_date field
     */
    const COL_RECIEVE_DATE = 'ali_sms.recieve_date';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'Mobile', 'MobileDesc', 'MobileDate', 'SendDate', 'MobileStatus', 'MobileCredits', 'CreditBalance', 'RecieveDate', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'mobile', 'mobileDesc', 'mobileDate', 'sendDate', 'mobileStatus', 'mobileCredits', 'creditBalance', 'recieveDate', ),
        self::TYPE_COLNAME       => array(AliSmsTableMap::COL_ID, AliSmsTableMap::COL_MCODE, AliSmsTableMap::COL_MOBILE, AliSmsTableMap::COL_MOBILE_DESC, AliSmsTableMap::COL_MOBILE_DATE, AliSmsTableMap::COL_SEND_DATE, AliSmsTableMap::COL_MOBILE_STATUS, AliSmsTableMap::COL_MOBILE_CREDITS, AliSmsTableMap::COL_CREDIT_BALANCE, AliSmsTableMap::COL_RECIEVE_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'mobile', 'mobile_desc', 'mobile_date', 'send_date', 'mobile_status', 'mobile_credits', 'credit_balance', 'recieve_date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'Mobile' => 2, 'MobileDesc' => 3, 'MobileDate' => 4, 'SendDate' => 5, 'MobileStatus' => 6, 'MobileCredits' => 7, 'CreditBalance' => 8, 'RecieveDate' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'mobile' => 2, 'mobileDesc' => 3, 'mobileDate' => 4, 'sendDate' => 5, 'mobileStatus' => 6, 'mobileCredits' => 7, 'creditBalance' => 8, 'recieveDate' => 9, ),
        self::TYPE_COLNAME       => array(AliSmsTableMap::COL_ID => 0, AliSmsTableMap::COL_MCODE => 1, AliSmsTableMap::COL_MOBILE => 2, AliSmsTableMap::COL_MOBILE_DESC => 3, AliSmsTableMap::COL_MOBILE_DATE => 4, AliSmsTableMap::COL_SEND_DATE => 5, AliSmsTableMap::COL_MOBILE_STATUS => 6, AliSmsTableMap::COL_MOBILE_CREDITS => 7, AliSmsTableMap::COL_CREDIT_BALANCE => 8, AliSmsTableMap::COL_RECIEVE_DATE => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'mobile' => 2, 'mobile_desc' => 3, 'mobile_date' => 4, 'send_date' => 5, 'mobile_status' => 6, 'mobile_credits' => 7, 'credit_balance' => 8, 'recieve_date' => 9, ),
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
        $this->setName('ali_sms');
        $this->setPhpName('AliSms');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliSms');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('mobile', 'Mobile', 'VARCHAR', true, 255, null);
        $this->addColumn('mobile_desc', 'MobileDesc', 'LONGVARCHAR', true, null, null);
        $this->addColumn('mobile_date', 'MobileDate', 'VARCHAR', true, 14, null);
        $this->addColumn('send_date', 'SendDate', 'VARCHAR', true, 14, null);
        $this->addColumn('mobile_status', 'MobileStatus', 'VARCHAR', true, 255, null);
        $this->addColumn('mobile_credits', 'MobileCredits', 'VARCHAR', true, 255, null);
        $this->addColumn('credit_balance', 'CreditBalance', 'INTEGER', true, null, null);
        $this->addColumn('recieve_date', 'RecieveDate', 'TIMESTAMP', true, null, null);
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
        return $withPrefix ? AliSmsTableMap::CLASS_DEFAULT : AliSmsTableMap::OM_CLASS;
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
     * @return array           (AliSms object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliSmsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliSmsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliSmsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliSmsTableMap::OM_CLASS;
            /** @var AliSms $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliSmsTableMap::addInstanceToPool($obj, $key);
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
            $key = AliSmsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliSmsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliSms $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliSmsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliSmsTableMap::COL_ID);
            $criteria->addSelectColumn(AliSmsTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliSmsTableMap::COL_MOBILE);
            $criteria->addSelectColumn(AliSmsTableMap::COL_MOBILE_DESC);
            $criteria->addSelectColumn(AliSmsTableMap::COL_MOBILE_DATE);
            $criteria->addSelectColumn(AliSmsTableMap::COL_SEND_DATE);
            $criteria->addSelectColumn(AliSmsTableMap::COL_MOBILE_STATUS);
            $criteria->addSelectColumn(AliSmsTableMap::COL_MOBILE_CREDITS);
            $criteria->addSelectColumn(AliSmsTableMap::COL_CREDIT_BALANCE);
            $criteria->addSelectColumn(AliSmsTableMap::COL_RECIEVE_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.mobile');
            $criteria->addSelectColumn($alias . '.mobile_desc');
            $criteria->addSelectColumn($alias . '.mobile_date');
            $criteria->addSelectColumn($alias . '.send_date');
            $criteria->addSelectColumn($alias . '.mobile_status');
            $criteria->addSelectColumn($alias . '.mobile_credits');
            $criteria->addSelectColumn($alias . '.credit_balance');
            $criteria->addSelectColumn($alias . '.recieve_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliSmsTableMap::DATABASE_NAME)->getTable(AliSmsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliSmsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliSmsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliSmsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliSms or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliSms object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSmsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliSms) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliSmsTableMap::DATABASE_NAME);
            $criteria->add(AliSmsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliSmsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliSmsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliSmsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_sms table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliSmsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliSms or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliSms object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSmsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliSms object
        }

        if ($criteria->containsKey(AliSmsTableMap::COL_ID) && $criteria->keyContainsValue(AliSmsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliSmsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliSmsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliSmsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliSmsTableMap::buildTableMap();
