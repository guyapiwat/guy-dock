<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliSupplier;
use CciOrm\CciOrm\AliSupplierQuery;
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
 * This class defines the structure of the 'ali_supplier' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliSupplierTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliSupplierTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_supplier';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliSupplier';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliSupplier';

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
    const COL_ID = 'ali_supplier.id';

    /**
     * the column name for the sup_code field
     */
    const COL_SUP_CODE = 'ali_supplier.sup_code';

    /**
     * the column name for the sup_desc field
     */
    const COL_SUP_DESC = 'ali_supplier.sup_desc';

    /**
     * the column name for the sup_type field
     */
    const COL_SUP_TYPE = 'ali_supplier.sup_type';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'ali_supplier.address';

    /**
     * the column name for the districtId field
     */
    const COL_DISTRICTID = 'ali_supplier.districtId';

    /**
     * the column name for the amphurId field
     */
    const COL_AMPHURID = 'ali_supplier.amphurId';

    /**
     * the column name for the provinceId field
     */
    const COL_PROVINCEID = 'ali_supplier.provinceId';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'ali_supplier.zip';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_supplier.uid';

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
        self::TYPE_PHPNAME       => array('Id', 'SupCode', 'SupDesc', 'SupType', 'Address', 'Districtid', 'Amphurid', 'Provinceid', 'Zip', 'Uid', ),
        self::TYPE_CAMELNAME     => array('id', 'supCode', 'supDesc', 'supType', 'address', 'districtid', 'amphurid', 'provinceid', 'zip', 'uid', ),
        self::TYPE_COLNAME       => array(AliSupplierTableMap::COL_ID, AliSupplierTableMap::COL_SUP_CODE, AliSupplierTableMap::COL_SUP_DESC, AliSupplierTableMap::COL_SUP_TYPE, AliSupplierTableMap::COL_ADDRESS, AliSupplierTableMap::COL_DISTRICTID, AliSupplierTableMap::COL_AMPHURID, AliSupplierTableMap::COL_PROVINCEID, AliSupplierTableMap::COL_ZIP, AliSupplierTableMap::COL_UID, ),
        self::TYPE_FIELDNAME     => array('id', 'sup_code', 'sup_desc', 'sup_type', 'address', 'districtId', 'amphurId', 'provinceId', 'zip', 'uid', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'SupCode' => 1, 'SupDesc' => 2, 'SupType' => 3, 'Address' => 4, 'Districtid' => 5, 'Amphurid' => 6, 'Provinceid' => 7, 'Zip' => 8, 'Uid' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'supCode' => 1, 'supDesc' => 2, 'supType' => 3, 'address' => 4, 'districtid' => 5, 'amphurid' => 6, 'provinceid' => 7, 'zip' => 8, 'uid' => 9, ),
        self::TYPE_COLNAME       => array(AliSupplierTableMap::COL_ID => 0, AliSupplierTableMap::COL_SUP_CODE => 1, AliSupplierTableMap::COL_SUP_DESC => 2, AliSupplierTableMap::COL_SUP_TYPE => 3, AliSupplierTableMap::COL_ADDRESS => 4, AliSupplierTableMap::COL_DISTRICTID => 5, AliSupplierTableMap::COL_AMPHURID => 6, AliSupplierTableMap::COL_PROVINCEID => 7, AliSupplierTableMap::COL_ZIP => 8, AliSupplierTableMap::COL_UID => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sup_code' => 1, 'sup_desc' => 2, 'sup_type' => 3, 'address' => 4, 'districtId' => 5, 'amphurId' => 6, 'provinceId' => 7, 'zip' => 8, 'uid' => 9, ),
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
        $this->setName('ali_supplier');
        $this->setPhpName('AliSupplier');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliSupplier');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('sup_code', 'SupCode', 'VARCHAR', false, 7, null);
        $this->addColumn('sup_desc', 'SupDesc', 'VARCHAR', false, 255, null);
        $this->addColumn('sup_type', 'SupType', 'INTEGER', true, 10, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', true, null, null);
        $this->addColumn('districtId', 'Districtid', 'INTEGER', true, 10, null);
        $this->addColumn('amphurId', 'Amphurid', 'INTEGER', true, 10, null);
        $this->addColumn('provinceId', 'Provinceid', 'INTEGER', true, 10, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', true, 5, null);
        $this->addColumn('uid', 'Uid', 'INTEGER', true, 10, null);
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
        return $withPrefix ? AliSupplierTableMap::CLASS_DEFAULT : AliSupplierTableMap::OM_CLASS;
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
     * @return array           (AliSupplier object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliSupplierTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliSupplierTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliSupplierTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliSupplierTableMap::OM_CLASS;
            /** @var AliSupplier $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliSupplierTableMap::addInstanceToPool($obj, $key);
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
            $key = AliSupplierTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliSupplierTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliSupplier $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliSupplierTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliSupplierTableMap::COL_ID);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_SUP_CODE);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_SUP_DESC);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_SUP_TYPE);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_DISTRICTID);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_AMPHURID);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_PROVINCEID);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_ZIP);
            $criteria->addSelectColumn(AliSupplierTableMap::COL_UID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sup_code');
            $criteria->addSelectColumn($alias . '.sup_desc');
            $criteria->addSelectColumn($alias . '.sup_type');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.districtId');
            $criteria->addSelectColumn($alias . '.amphurId');
            $criteria->addSelectColumn($alias . '.provinceId');
            $criteria->addSelectColumn($alias . '.zip');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliSupplierTableMap::DATABASE_NAME)->getTable(AliSupplierTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliSupplierTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliSupplierTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliSupplierTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliSupplier or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliSupplier object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSupplierTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliSupplier) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliSupplierTableMap::DATABASE_NAME);
            $criteria->add(AliSupplierTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliSupplierQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliSupplierTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliSupplierTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_supplier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliSupplierQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliSupplier or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliSupplier object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSupplierTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliSupplier object
        }

        if ($criteria->containsKey(AliSupplierTableMap::COL_ID) && $criteria->keyContainsValue(AliSupplierTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliSupplierTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliSupplierQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliSupplierTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliSupplierTableMap::buildTableMap();
