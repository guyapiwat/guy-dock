<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliHolddesc;
use CciOrm\CciOrm\AliHolddescQuery;
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
 * This class defines the structure of the 'ali_holddesc' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliHolddescTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliHolddescTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_holddesc';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliHolddesc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliHolddesc';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_holddesc.id';

    /**
     * the column name for the hono field
     */
    const COL_HONO = 'ali_holddesc.hono';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_holddesc.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_holddesc.pdesc';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_holddesc.price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_holddesc.pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_holddesc.bv';

    /**
     * the column name for the fv field
     */
    const COL_FV = 'ali_holddesc.fv';

    /**
     * the column name for the sppv field
     */
    const COL_SPPV = 'ali_holddesc.sppv';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_holddesc.qty';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_holddesc.amt';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_holddesc.bprice';

    /**
     * the column name for the uidbase field
     */
    const COL_UIDBASE = 'ali_holddesc.uidbase';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_holddesc.locationbase';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_holddesc.crate';

    /**
     * the column name for the vat field
     */
    const COL_VAT = 'ali_holddesc.vat';

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
        self::TYPE_PHPNAME       => array('Id', 'Hono', 'Pcode', 'Pdesc', 'Price', 'Pv', 'Bv', 'Fv', 'Sppv', 'Qty', 'Amt', 'Bprice', 'Uidbase', 'Locationbase', 'Crate', 'Vat', ),
        self::TYPE_CAMELNAME     => array('id', 'hono', 'pcode', 'pdesc', 'price', 'pv', 'bv', 'fv', 'sppv', 'qty', 'amt', 'bprice', 'uidbase', 'locationbase', 'crate', 'vat', ),
        self::TYPE_COLNAME       => array(AliHolddescTableMap::COL_ID, AliHolddescTableMap::COL_HONO, AliHolddescTableMap::COL_PCODE, AliHolddescTableMap::COL_PDESC, AliHolddescTableMap::COL_PRICE, AliHolddescTableMap::COL_PV, AliHolddescTableMap::COL_BV, AliHolddescTableMap::COL_FV, AliHolddescTableMap::COL_SPPV, AliHolddescTableMap::COL_QTY, AliHolddescTableMap::COL_AMT, AliHolddescTableMap::COL_BPRICE, AliHolddescTableMap::COL_UIDBASE, AliHolddescTableMap::COL_LOCATIONBASE, AliHolddescTableMap::COL_CRATE, AliHolddescTableMap::COL_VAT, ),
        self::TYPE_FIELDNAME     => array('id', 'hono', 'pcode', 'pdesc', 'price', 'pv', 'bv', 'fv', 'sppv', 'qty', 'amt', 'bprice', 'uidbase', 'locationbase', 'crate', 'vat', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Hono' => 1, 'Pcode' => 2, 'Pdesc' => 3, 'Price' => 4, 'Pv' => 5, 'Bv' => 6, 'Fv' => 7, 'Sppv' => 8, 'Qty' => 9, 'Amt' => 10, 'Bprice' => 11, 'Uidbase' => 12, 'Locationbase' => 13, 'Crate' => 14, 'Vat' => 15, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'hono' => 1, 'pcode' => 2, 'pdesc' => 3, 'price' => 4, 'pv' => 5, 'bv' => 6, 'fv' => 7, 'sppv' => 8, 'qty' => 9, 'amt' => 10, 'bprice' => 11, 'uidbase' => 12, 'locationbase' => 13, 'crate' => 14, 'vat' => 15, ),
        self::TYPE_COLNAME       => array(AliHolddescTableMap::COL_ID => 0, AliHolddescTableMap::COL_HONO => 1, AliHolddescTableMap::COL_PCODE => 2, AliHolddescTableMap::COL_PDESC => 3, AliHolddescTableMap::COL_PRICE => 4, AliHolddescTableMap::COL_PV => 5, AliHolddescTableMap::COL_BV => 6, AliHolddescTableMap::COL_FV => 7, AliHolddescTableMap::COL_SPPV => 8, AliHolddescTableMap::COL_QTY => 9, AliHolddescTableMap::COL_AMT => 10, AliHolddescTableMap::COL_BPRICE => 11, AliHolddescTableMap::COL_UIDBASE => 12, AliHolddescTableMap::COL_LOCATIONBASE => 13, AliHolddescTableMap::COL_CRATE => 14, AliHolddescTableMap::COL_VAT => 15, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'hono' => 1, 'pcode' => 2, 'pdesc' => 3, 'price' => 4, 'pv' => 5, 'bv' => 6, 'fv' => 7, 'sppv' => 8, 'qty' => 9, 'amt' => 10, 'bprice' => 11, 'uidbase' => 12, 'locationbase' => 13, 'crate' => 14, 'vat' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $this->setName('ali_holddesc');
        $this->setPhpName('AliHolddesc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliHolddesc');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('hono', 'Hono', 'INTEGER', false, 10, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', false, 20, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', false, 100, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 10, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', false, 10, null);
        $this->addColumn('bv', 'Bv', 'DECIMAL', false, 10, null);
        $this->addColumn('fv', 'Fv', 'DECIMAL', true, 15, null);
        $this->addColumn('sppv', 'Sppv', 'DECIMAL', true, 15, null);
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 5, null);
        $this->addColumn('amt', 'Amt', 'DECIMAL', false, 10, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('uidbase', 'Uidbase', 'VARCHAR', true, 255, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('vat', 'Vat', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliHolddescTableMap::CLASS_DEFAULT : AliHolddescTableMap::OM_CLASS;
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
     * @return array           (AliHolddesc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliHolddescTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliHolddescTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliHolddescTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliHolddescTableMap::OM_CLASS;
            /** @var AliHolddesc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliHolddescTableMap::addInstanceToPool($obj, $key);
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
            $key = AliHolddescTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliHolddescTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliHolddesc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliHolddescTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliHolddescTableMap::COL_ID);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_HONO);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_PV);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_BV);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_FV);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_SPPV);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_QTY);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_AMT);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_UIDBASE);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliHolddescTableMap::COL_VAT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.hono');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.bv');
            $criteria->addSelectColumn($alias . '.fv');
            $criteria->addSelectColumn($alias . '.sppv');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.amt');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.uidbase');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.vat');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliHolddescTableMap::DATABASE_NAME)->getTable(AliHolddescTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliHolddescTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliHolddescTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliHolddescTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliHolddesc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliHolddesc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliHolddescTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliHolddesc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliHolddescTableMap::DATABASE_NAME);
            $criteria->add(AliHolddescTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliHolddescQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliHolddescTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliHolddescTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_holddesc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliHolddescQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliHolddesc or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliHolddesc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliHolddescTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliHolddesc object
        }

        if ($criteria->containsKey(AliHolddescTableMap::COL_ID) && $criteria->keyContainsValue(AliHolddescTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliHolddescTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliHolddescQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliHolddescTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliHolddescTableMap::buildTableMap();
