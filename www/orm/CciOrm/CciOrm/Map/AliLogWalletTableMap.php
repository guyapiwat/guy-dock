<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliLogWallet;
use CciOrm\CciOrm\AliLogWalletQuery;
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
 * This class defines the structure of the 'ali_log_wallet' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliLogWalletTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliLogWalletTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_log_wallet';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliLogWallet';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliLogWallet';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_log_wallet.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_log_wallet.rcode';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_log_wallet.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_log_wallet.tdate';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_log_wallet.mcode';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_log_wallet.ewallet';

    /**
     * the column name for the evoucher field
     */
    const COL_EVOUCHER = 'ali_log_wallet.evoucher';

    /**
     * the column name for the eautoship field
     */
    const COL_EAUTOSHIP = 'ali_log_wallet.eautoship';

    /**
     * the column name for the ecom field
     */
    const COL_ECOM = 'ali_log_wallet.ecom';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Fdate', 'Tdate', 'Mcode', 'Ewallet', 'Evoucher', 'Eautoship', 'Ecom', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'fdate', 'tdate', 'mcode', 'ewallet', 'evoucher', 'eautoship', 'ecom', ),
        self::TYPE_COLNAME       => array(AliLogWalletTableMap::COL_ID, AliLogWalletTableMap::COL_RCODE, AliLogWalletTableMap::COL_FDATE, AliLogWalletTableMap::COL_TDATE, AliLogWalletTableMap::COL_MCODE, AliLogWalletTableMap::COL_EWALLET, AliLogWalletTableMap::COL_EVOUCHER, AliLogWalletTableMap::COL_EAUTOSHIP, AliLogWalletTableMap::COL_ECOM, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'fdate', 'tdate', 'mcode', 'ewallet', 'evoucher', 'eautoship', 'ecom', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Fdate' => 2, 'Tdate' => 3, 'Mcode' => 4, 'Ewallet' => 5, 'Evoucher' => 6, 'Eautoship' => 7, 'Ecom' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'fdate' => 2, 'tdate' => 3, 'mcode' => 4, 'ewallet' => 5, 'evoucher' => 6, 'eautoship' => 7, 'ecom' => 8, ),
        self::TYPE_COLNAME       => array(AliLogWalletTableMap::COL_ID => 0, AliLogWalletTableMap::COL_RCODE => 1, AliLogWalletTableMap::COL_FDATE => 2, AliLogWalletTableMap::COL_TDATE => 3, AliLogWalletTableMap::COL_MCODE => 4, AliLogWalletTableMap::COL_EWALLET => 5, AliLogWalletTableMap::COL_EVOUCHER => 6, AliLogWalletTableMap::COL_EAUTOSHIP => 7, AliLogWalletTableMap::COL_ECOM => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'fdate' => 2, 'tdate' => 3, 'mcode' => 4, 'ewallet' => 5, 'evoucher' => 6, 'eautoship' => 7, 'ecom' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('ali_log_wallet');
        $this->setPhpName('AliLogWallet');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliLogWallet');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('ewallet', 'Ewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('evoucher', 'Evoucher', 'DECIMAL', true, 15, null);
        $this->addColumn('eautoship', 'Eautoship', 'DECIMAL', true, 15, null);
        $this->addColumn('ecom', 'Ecom', 'DECIMAL', true, 15, null);
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
        return $withPrefix ? AliLogWalletTableMap::CLASS_DEFAULT : AliLogWalletTableMap::OM_CLASS;
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
     * @return array           (AliLogWallet object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliLogWalletTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliLogWalletTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliLogWalletTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliLogWalletTableMap::OM_CLASS;
            /** @var AliLogWallet $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliLogWalletTableMap::addInstanceToPool($obj, $key);
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
            $key = AliLogWalletTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliLogWalletTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliLogWallet $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliLogWalletTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_ID);
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_EVOUCHER);
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_EAUTOSHIP);
            $criteria->addSelectColumn(AliLogWalletTableMap::COL_ECOM);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.ewallet');
            $criteria->addSelectColumn($alias . '.evoucher');
            $criteria->addSelectColumn($alias . '.eautoship');
            $criteria->addSelectColumn($alias . '.ecom');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliLogWalletTableMap::DATABASE_NAME)->getTable(AliLogWalletTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliLogWalletTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliLogWalletTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliLogWalletTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliLogWallet or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliLogWallet object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogWalletTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliLogWallet) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliLogWalletTableMap::DATABASE_NAME);
            $criteria->add(AliLogWalletTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliLogWalletQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliLogWalletTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliLogWalletTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_log_wallet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliLogWalletQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliLogWallet or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliLogWallet object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogWalletTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliLogWallet object
        }

        if ($criteria->containsKey(AliLogWalletTableMap::COL_ID) && $criteria->keyContainsValue(AliLogWalletTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliLogWalletTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliLogWalletQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliLogWalletTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliLogWalletTableMap::buildTableMap();
