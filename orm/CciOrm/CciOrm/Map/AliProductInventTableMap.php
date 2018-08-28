<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliProductInvent;
use CciOrm\CciOrm\AliProductInventQuery;
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
 * This class defines the structure of the 'ali_product_invent' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliProductInventTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliProductInventTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_product_invent';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliProductInvent';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliProductInvent';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_product_invent.pcode';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_product_invent.qty';

    /**
     * the column name for the qtys field
     */
    const COL_QTYS = 'ali_product_invent.qtys';

    /**
     * the column name for the qtyr field
     */
    const COL_QTYR = 'ali_product_invent.qtyr';

    /**
     * the column name for the qtyd field
     */
    const COL_QTYD = 'ali_product_invent.qtyd';

    /**
     * the column name for the ud field
     */
    const COL_UD = 'ali_product_invent.ud';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_product_invent.inv_code';

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
        self::TYPE_PHPNAME       => array('Pcode', 'Qty', 'Qtys', 'Qtyr', 'Qtyd', 'Ud', 'InvCode', ),
        self::TYPE_CAMELNAME     => array('pcode', 'qty', 'qtys', 'qtyr', 'qtyd', 'ud', 'invCode', ),
        self::TYPE_COLNAME       => array(AliProductInventTableMap::COL_PCODE, AliProductInventTableMap::COL_QTY, AliProductInventTableMap::COL_QTYS, AliProductInventTableMap::COL_QTYR, AliProductInventTableMap::COL_QTYD, AliProductInventTableMap::COL_UD, AliProductInventTableMap::COL_INV_CODE, ),
        self::TYPE_FIELDNAME     => array('pcode', 'qty', 'qtys', 'qtyr', 'qtyd', 'ud', 'inv_code', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Pcode' => 0, 'Qty' => 1, 'Qtys' => 2, 'Qtyr' => 3, 'Qtyd' => 4, 'Ud' => 5, 'InvCode' => 6, ),
        self::TYPE_CAMELNAME     => array('pcode' => 0, 'qty' => 1, 'qtys' => 2, 'qtyr' => 3, 'qtyd' => 4, 'ud' => 5, 'invCode' => 6, ),
        self::TYPE_COLNAME       => array(AliProductInventTableMap::COL_PCODE => 0, AliProductInventTableMap::COL_QTY => 1, AliProductInventTableMap::COL_QTYS => 2, AliProductInventTableMap::COL_QTYR => 3, AliProductInventTableMap::COL_QTYD => 4, AliProductInventTableMap::COL_UD => 5, AliProductInventTableMap::COL_INV_CODE => 6, ),
        self::TYPE_FIELDNAME     => array('pcode' => 0, 'qty' => 1, 'qtys' => 2, 'qtyr' => 3, 'qtyd' => 4, 'ud' => 5, 'inv_code' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('ali_product_invent');
        $this->setPhpName('AliProductInvent');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliProductInvent');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pcode', 'Pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', false, null, null);
        $this->addColumn('qtys', 'Qtys', 'INTEGER', true, null, null);
        $this->addColumn('qtyr', 'Qtyr', 'INTEGER', true, null, null);
        $this->addColumn('qtyd', 'Qtyd', 'INTEGER', true, null, null);
        $this->addColumn('ud', 'Ud', 'VARCHAR', true, 255, null);
        $this->addPrimaryKey('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \CciOrm\CciOrm\AliProductInvent $obj A \CciOrm\CciOrm\AliProductInvent object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getPcode() || is_scalar($obj->getPcode()) || is_callable([$obj->getPcode(), '__toString']) ? (string) $obj->getPcode() : $obj->getPcode()), (null === $obj->getInvCode() || is_scalar($obj->getInvCode()) || is_callable([$obj->getInvCode(), '__toString']) ? (string) $obj->getInvCode() : $obj->getInvCode())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \CciOrm\CciOrm\AliProductInvent object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \CciOrm\CciOrm\AliProductInvent) {
                $key = serialize([(null === $value->getPcode() || is_scalar($value->getPcode()) || is_callable([$value->getPcode(), '__toString']) ? (string) $value->getPcode() : $value->getPcode()), (null === $value->getInvCode() || is_scalar($value->getInvCode()) || is_callable([$value->getInvCode(), '__toString']) ? (string) $value->getInvCode() : $value->getInvCode())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \CciOrm\CciOrm\AliProductInvent object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)])]);
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
            $pks = [];

        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 6 + $offset
                : self::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
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
        return $withPrefix ? AliProductInventTableMap::CLASS_DEFAULT : AliProductInventTableMap::OM_CLASS;
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
     * @return array           (AliProductInvent object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliProductInventTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliProductInventTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliProductInventTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliProductInventTableMap::OM_CLASS;
            /** @var AliProductInvent $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliProductInventTableMap::addInstanceToPool($obj, $key);
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
            $key = AliProductInventTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliProductInventTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliProductInvent $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliProductInventTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliProductInventTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliProductInventTableMap::COL_QTY);
            $criteria->addSelectColumn(AliProductInventTableMap::COL_QTYS);
            $criteria->addSelectColumn(AliProductInventTableMap::COL_QTYR);
            $criteria->addSelectColumn(AliProductInventTableMap::COL_QTYD);
            $criteria->addSelectColumn(AliProductInventTableMap::COL_UD);
            $criteria->addSelectColumn(AliProductInventTableMap::COL_INV_CODE);
        } else {
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.qtys');
            $criteria->addSelectColumn($alias . '.qtyr');
            $criteria->addSelectColumn($alias . '.qtyd');
            $criteria->addSelectColumn($alias . '.ud');
            $criteria->addSelectColumn($alias . '.inv_code');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliProductInventTableMap::DATABASE_NAME)->getTable(AliProductInventTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliProductInventTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliProductInventTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliProductInventTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliProductInvent or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliProductInvent object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInventTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliProductInvent) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliProductInventTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(AliProductInventTableMap::COL_PCODE, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(AliProductInventTableMap::COL_INV_CODE, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = AliProductInventQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliProductInventTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliProductInventTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_product_invent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliProductInventQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliProductInvent or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliProductInvent object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInventTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliProductInvent object
        }


        // Set the correct dbName
        $query = AliProductInventQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliProductInventTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliProductInventTableMap::buildTableMap();
