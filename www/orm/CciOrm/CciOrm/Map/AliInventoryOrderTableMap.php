<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliInventoryOrder;
use CciOrm\CciOrm\AliInventoryOrderQuery;
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
 * This class defines the structure of the 'ali_inventory_order' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliInventoryOrderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliInventoryOrderTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_inventory_order';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliInventoryOrder';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliInventoryOrder';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the MLM_Inv_Type field
     */
    const COL_MLM_INV_TYPE = 'ali_inventory_order.MLM_Inv_Type';

    /**
     * the column name for the MLM_Type_Group field
     */
    const COL_MLM_TYPE_GROUP = 'ali_inventory_order.MLM_Type_Group';

    /**
     * the column name for the Oracle_Type field
     */
    const COL_ORACLE_TYPE = 'ali_inventory_order.Oracle_Type';

    /**
     * the column name for the Mapping_Code field
     */
    const COL_MAPPING_CODE = 'ali_inventory_order.Mapping_Code';

    /**
     * the column name for the Mapping_type field
     */
    const COL_MAPPING_TYPE = 'ali_inventory_order.Mapping_type';

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
        self::TYPE_PHPNAME       => array('MlmInvType', 'MlmTypeGroup', 'OracleType', 'MappingCode', 'MappingType', ),
        self::TYPE_CAMELNAME     => array('mlmInvType', 'mlmTypeGroup', 'oracleType', 'mappingCode', 'mappingType', ),
        self::TYPE_COLNAME       => array(AliInventoryOrderTableMap::COL_MLM_INV_TYPE, AliInventoryOrderTableMap::COL_MLM_TYPE_GROUP, AliInventoryOrderTableMap::COL_ORACLE_TYPE, AliInventoryOrderTableMap::COL_MAPPING_CODE, AliInventoryOrderTableMap::COL_MAPPING_TYPE, ),
        self::TYPE_FIELDNAME     => array('MLM_Inv_Type', 'MLM_Type_Group', 'Oracle_Type', 'Mapping_Code', 'Mapping_type', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('MlmInvType' => 0, 'MlmTypeGroup' => 1, 'OracleType' => 2, 'MappingCode' => 3, 'MappingType' => 4, ),
        self::TYPE_CAMELNAME     => array('mlmInvType' => 0, 'mlmTypeGroup' => 1, 'oracleType' => 2, 'mappingCode' => 3, 'mappingType' => 4, ),
        self::TYPE_COLNAME       => array(AliInventoryOrderTableMap::COL_MLM_INV_TYPE => 0, AliInventoryOrderTableMap::COL_MLM_TYPE_GROUP => 1, AliInventoryOrderTableMap::COL_ORACLE_TYPE => 2, AliInventoryOrderTableMap::COL_MAPPING_CODE => 3, AliInventoryOrderTableMap::COL_MAPPING_TYPE => 4, ),
        self::TYPE_FIELDNAME     => array('MLM_Inv_Type' => 0, 'MLM_Type_Group' => 1, 'Oracle_Type' => 2, 'Mapping_Code' => 3, 'Mapping_type' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('ali_inventory_order');
        $this->setPhpName('AliInventoryOrder');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliInventoryOrder');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('MLM_Inv_Type', 'MlmInvType', 'VARCHAR', true, 255, null);
        $this->addColumn('MLM_Type_Group', 'MlmTypeGroup', 'VARCHAR', true, 255, null);
        $this->addColumn('Oracle_Type', 'OracleType', 'VARCHAR', true, 255, null);
        $this->addPrimaryKey('Mapping_Code', 'MappingCode', 'VARCHAR', true, 255, null);
        $this->addPrimaryKey('Mapping_type', 'MappingType', 'VARCHAR', true, 255, null);
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
     * @param \CciOrm\CciOrm\AliInventoryOrder $obj A \CciOrm\CciOrm\AliInventoryOrder object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getMappingCode() || is_scalar($obj->getMappingCode()) || is_callable([$obj->getMappingCode(), '__toString']) ? (string) $obj->getMappingCode() : $obj->getMappingCode()), (null === $obj->getMappingType() || is_scalar($obj->getMappingType()) || is_callable([$obj->getMappingType(), '__toString']) ? (string) $obj->getMappingType() : $obj->getMappingType())]);
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
     * @param mixed $value A \CciOrm\CciOrm\AliInventoryOrder object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \CciOrm\CciOrm\AliInventoryOrder) {
                $key = serialize([(null === $value->getMappingCode() || is_scalar($value->getMappingCode()) || is_callable([$value->getMappingCode(), '__toString']) ? (string) $value->getMappingCode() : $value->getMappingCode()), (null === $value->getMappingType() || is_scalar($value->getMappingType()) || is_callable([$value->getMappingType(), '__toString']) ? (string) $value->getMappingType() : $value->getMappingType())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \CciOrm\CciOrm\AliInventoryOrder object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('MappingCode', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('MappingType', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('MappingCode', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('MappingCode', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('MappingCode', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('MappingCode', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('MappingCode', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('MappingType', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('MappingType', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('MappingType', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('MappingType', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('MappingType', TableMap::TYPE_PHPNAME, $indexType)])]);
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
                ? 3 + $offset
                : self::translateFieldName('MappingCode', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('MappingType', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliInventoryOrderTableMap::CLASS_DEFAULT : AliInventoryOrderTableMap::OM_CLASS;
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
     * @return array           (AliInventoryOrder object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliInventoryOrderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliInventoryOrderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliInventoryOrderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliInventoryOrderTableMap::OM_CLASS;
            /** @var AliInventoryOrder $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliInventoryOrderTableMap::addInstanceToPool($obj, $key);
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
            $key = AliInventoryOrderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliInventoryOrderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliInventoryOrder $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliInventoryOrderTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliInventoryOrderTableMap::COL_MLM_INV_TYPE);
            $criteria->addSelectColumn(AliInventoryOrderTableMap::COL_MLM_TYPE_GROUP);
            $criteria->addSelectColumn(AliInventoryOrderTableMap::COL_ORACLE_TYPE);
            $criteria->addSelectColumn(AliInventoryOrderTableMap::COL_MAPPING_CODE);
            $criteria->addSelectColumn(AliInventoryOrderTableMap::COL_MAPPING_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.MLM_Inv_Type');
            $criteria->addSelectColumn($alias . '.MLM_Type_Group');
            $criteria->addSelectColumn($alias . '.Oracle_Type');
            $criteria->addSelectColumn($alias . '.Mapping_Code');
            $criteria->addSelectColumn($alias . '.Mapping_type');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliInventoryOrderTableMap::DATABASE_NAME)->getTable(AliInventoryOrderTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliInventoryOrderTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliInventoryOrderTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliInventoryOrderTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliInventoryOrder or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliInventoryOrder object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventoryOrderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliInventoryOrder) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliInventoryOrderTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(AliInventoryOrderTableMap::COL_MAPPING_CODE, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(AliInventoryOrderTableMap::COL_MAPPING_TYPE, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = AliInventoryOrderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliInventoryOrderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliInventoryOrderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_inventory_order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliInventoryOrderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliInventoryOrder or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliInventoryOrder object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventoryOrderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliInventoryOrder object
        }


        // Set the correct dbName
        $query = AliInventoryOrderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliInventoryOrderTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliInventoryOrderTableMap::buildTableMap();
