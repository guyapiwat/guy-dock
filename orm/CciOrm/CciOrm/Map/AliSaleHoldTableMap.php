<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliSaleHold;
use CciOrm\CciOrm\AliSaleHoldQuery;
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
 * This class defines the structure of the 'ali_sale_hold' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliSaleHoldTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliSaleHoldTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_sale_hold';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliSaleHold';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliSaleHold';

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
    const COL_ID = 'ali_sale_hold.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_sale_hold.rcode';

    /**
     * the column name for the yokma field
     */
    const COL_YOKMA = 'ali_sale_hold.yokma';

    /**
     * the column name for the buy field
     */
    const COL_BUY = 'ali_sale_hold.buy';

    /**
     * the column name for the used field
     */
    const COL_USED = 'ali_sale_hold.used';

    /**
     * the column name for the balance field
     */
    const COL_BALANCE = 'ali_sale_hold.balance';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_sale_hold.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_sale_hold.tdate';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Yokma', 'Buy', 'Used', 'Balance', 'Fdate', 'Tdate', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'yokma', 'buy', 'used', 'balance', 'fdate', 'tdate', ),
        self::TYPE_COLNAME       => array(AliSaleHoldTableMap::COL_ID, AliSaleHoldTableMap::COL_RCODE, AliSaleHoldTableMap::COL_YOKMA, AliSaleHoldTableMap::COL_BUY, AliSaleHoldTableMap::COL_USED, AliSaleHoldTableMap::COL_BALANCE, AliSaleHoldTableMap::COL_FDATE, AliSaleHoldTableMap::COL_TDATE, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'yokma', 'buy', 'used', 'balance', 'fdate', 'tdate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Yokma' => 2, 'Buy' => 3, 'Used' => 4, 'Balance' => 5, 'Fdate' => 6, 'Tdate' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'yokma' => 2, 'buy' => 3, 'used' => 4, 'balance' => 5, 'fdate' => 6, 'tdate' => 7, ),
        self::TYPE_COLNAME       => array(AliSaleHoldTableMap::COL_ID => 0, AliSaleHoldTableMap::COL_RCODE => 1, AliSaleHoldTableMap::COL_YOKMA => 2, AliSaleHoldTableMap::COL_BUY => 3, AliSaleHoldTableMap::COL_USED => 4, AliSaleHoldTableMap::COL_BALANCE => 5, AliSaleHoldTableMap::COL_FDATE => 6, AliSaleHoldTableMap::COL_TDATE => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'yokma' => 2, 'buy' => 3, 'used' => 4, 'balance' => 5, 'fdate' => 6, 'tdate' => 7, ),
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
        $this->setName('ali_sale_hold');
        $this->setPhpName('AliSaleHold');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliSaleHold');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('yokma', 'Yokma', 'DECIMAL', true, 15, null);
        $this->addColumn('buy', 'Buy', 'DECIMAL', true, 15, null);
        $this->addColumn('used', 'Used', 'DECIMAL', true, 15, null);
        $this->addColumn('balance', 'Balance', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'VARCHAR', true, 255, null);
        $this->addColumn('tdate', 'Tdate', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliSaleHoldTableMap::CLASS_DEFAULT : AliSaleHoldTableMap::OM_CLASS;
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
     * @return array           (AliSaleHold object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliSaleHoldTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliSaleHoldTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliSaleHoldTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliSaleHoldTableMap::OM_CLASS;
            /** @var AliSaleHold $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliSaleHoldTableMap::addInstanceToPool($obj, $key);
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
            $key = AliSaleHoldTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliSaleHoldTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliSaleHold $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliSaleHoldTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliSaleHoldTableMap::COL_ID);
            $criteria->addSelectColumn(AliSaleHoldTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliSaleHoldTableMap::COL_YOKMA);
            $criteria->addSelectColumn(AliSaleHoldTableMap::COL_BUY);
            $criteria->addSelectColumn(AliSaleHoldTableMap::COL_USED);
            $criteria->addSelectColumn(AliSaleHoldTableMap::COL_BALANCE);
            $criteria->addSelectColumn(AliSaleHoldTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliSaleHoldTableMap::COL_TDATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.yokma');
            $criteria->addSelectColumn($alias . '.buy');
            $criteria->addSelectColumn($alias . '.used');
            $criteria->addSelectColumn($alias . '.balance');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliSaleHoldTableMap::DATABASE_NAME)->getTable(AliSaleHoldTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliSaleHoldTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliSaleHoldTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliSaleHoldTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliSaleHold or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliSaleHold object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSaleHoldTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliSaleHold) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliSaleHoldTableMap::DATABASE_NAME);
            $criteria->add(AliSaleHoldTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliSaleHoldQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliSaleHoldTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliSaleHoldTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_sale_hold table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliSaleHoldQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliSaleHold or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliSaleHold object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSaleHoldTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliSaleHold object
        }

        if ($criteria->containsKey(AliSaleHoldTableMap::COL_ID) && $criteria->keyContainsValue(AliSaleHoldTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliSaleHoldTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliSaleHoldQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliSaleHoldTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliSaleHoldTableMap::buildTableMap();
