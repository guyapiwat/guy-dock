<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTransfersaleD;
use CciOrm\CciOrm\AliTransfersaleDQuery;
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
 * This class defines the structure of the 'ali_transfersale_d' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTransfersaleDTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTransfersaleDTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_transfersale_d';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTransfersaleD';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTransfersaleD';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_transfersale_d.id';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_transfersale_d.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_transfersale_d.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_transfersale_d.inv_code';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_transfersale_d.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_transfersale_d.pdesc';

    /**
     * the column name for the unit field
     */
    const COL_UNIT = 'ali_transfersale_d.unit';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_transfersale_d.mcode';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_transfersale_d.price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_transfersale_d.pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_transfersale_d.bv';

    /**
     * the column name for the fv field
     */
    const COL_FV = 'ali_transfersale_d.fv';

    /**
     * the column name for the weight field
     */
    const COL_WEIGHT = 'ali_transfersale_d.weight';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_transfersale_d.qty';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_transfersale_d.amt';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_transfersale_d.bprice';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_transfersale_d.locationbase';

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
        self::TYPE_PHPNAME       => array('Id', 'Sano', 'Sadate', 'InvCode', 'Pcode', 'Pdesc', 'Unit', 'Mcode', 'Price', 'Pv', 'Bv', 'Fv', 'Weight', 'Qty', 'Amt', 'Bprice', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('id', 'sano', 'sadate', 'invCode', 'pcode', 'pdesc', 'unit', 'mcode', 'price', 'pv', 'bv', 'fv', 'weight', 'qty', 'amt', 'bprice', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliTransfersaleDTableMap::COL_ID, AliTransfersaleDTableMap::COL_SANO, AliTransfersaleDTableMap::COL_SADATE, AliTransfersaleDTableMap::COL_INV_CODE, AliTransfersaleDTableMap::COL_PCODE, AliTransfersaleDTableMap::COL_PDESC, AliTransfersaleDTableMap::COL_UNIT, AliTransfersaleDTableMap::COL_MCODE, AliTransfersaleDTableMap::COL_PRICE, AliTransfersaleDTableMap::COL_PV, AliTransfersaleDTableMap::COL_BV, AliTransfersaleDTableMap::COL_FV, AliTransfersaleDTableMap::COL_WEIGHT, AliTransfersaleDTableMap::COL_QTY, AliTransfersaleDTableMap::COL_AMT, AliTransfersaleDTableMap::COL_BPRICE, AliTransfersaleDTableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('id', 'sano', 'sadate', 'inv_code', 'pcode', 'pdesc', 'unit', 'mcode', 'price', 'pv', 'bv', 'fv', 'weight', 'qty', 'amt', 'bprice', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sano' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Pcode' => 4, 'Pdesc' => 5, 'Unit' => 6, 'Mcode' => 7, 'Price' => 8, 'Pv' => 9, 'Bv' => 10, 'Fv' => 11, 'Weight' => 12, 'Qty' => 13, 'Amt' => 14, 'Bprice' => 15, 'Locationbase' => 16, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'invCode' => 3, 'pcode' => 4, 'pdesc' => 5, 'unit' => 6, 'mcode' => 7, 'price' => 8, 'pv' => 9, 'bv' => 10, 'fv' => 11, 'weight' => 12, 'qty' => 13, 'amt' => 14, 'bprice' => 15, 'locationbase' => 16, ),
        self::TYPE_COLNAME       => array(AliTransfersaleDTableMap::COL_ID => 0, AliTransfersaleDTableMap::COL_SANO => 1, AliTransfersaleDTableMap::COL_SADATE => 2, AliTransfersaleDTableMap::COL_INV_CODE => 3, AliTransfersaleDTableMap::COL_PCODE => 4, AliTransfersaleDTableMap::COL_PDESC => 5, AliTransfersaleDTableMap::COL_UNIT => 6, AliTransfersaleDTableMap::COL_MCODE => 7, AliTransfersaleDTableMap::COL_PRICE => 8, AliTransfersaleDTableMap::COL_PV => 9, AliTransfersaleDTableMap::COL_BV => 10, AliTransfersaleDTableMap::COL_FV => 11, AliTransfersaleDTableMap::COL_WEIGHT => 12, AliTransfersaleDTableMap::COL_QTY => 13, AliTransfersaleDTableMap::COL_AMT => 14, AliTransfersaleDTableMap::COL_BPRICE => 15, AliTransfersaleDTableMap::COL_LOCATIONBASE => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'inv_code' => 3, 'pcode' => 4, 'pdesc' => 5, 'unit' => 6, 'mcode' => 7, 'price' => 8, 'pv' => 9, 'bv' => 10, 'fv' => 11, 'weight' => 12, 'qty' => 13, 'amt' => 14, 'bprice' => 15, 'locationbase' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('ali_transfersale_d');
        $this->setPhpName('AliTransfersaleD');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTransfersaleD');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 7, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', false, 20, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', false, 100, null);
        $this->addColumn('unit', 'Unit', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 7, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 15, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', false, 15, null);
        $this->addColumn('bv', 'Bv', 'DECIMAL', false, 15, null);
        $this->addColumn('fv', 'Fv', 'DECIMAL', true, 15, null);
        $this->addColumn('weight', 'Weight', 'DECIMAL', true, 15, null);
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 15, null);
        $this->addColumn('amt', 'Amt', 'DECIMAL', false, 15, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliTransfersaleDTableMap::CLASS_DEFAULT : AliTransfersaleDTableMap::OM_CLASS;
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
     * @return array           (AliTransfersaleD object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTransfersaleDTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTransfersaleDTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTransfersaleDTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTransfersaleDTableMap::OM_CLASS;
            /** @var AliTransfersaleD $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTransfersaleDTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTransfersaleDTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTransfersaleDTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTransfersaleD $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTransfersaleDTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_ID);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_SANO);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_UNIT);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_PV);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_BV);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_FV);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_WEIGHT);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_QTY);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_AMT);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliTransfersaleDTableMap::COL_LOCATIONBASE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.unit');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.bv');
            $criteria->addSelectColumn($alias . '.fv');
            $criteria->addSelectColumn($alias . '.weight');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.amt');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.locationbase');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTransfersaleDTableMap::DATABASE_NAME)->getTable(AliTransfersaleDTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTransfersaleDTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTransfersaleDTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTransfersaleDTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTransfersaleD or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTransfersaleD object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleDTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTransfersaleD) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTransfersaleDTableMap::DATABASE_NAME);
            $criteria->add(AliTransfersaleDTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliTransfersaleDQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTransfersaleDTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTransfersaleDTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_transfersale_d table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTransfersaleDQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTransfersaleD or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTransfersaleD object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleDTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTransfersaleD object
        }

        if ($criteria->containsKey(AliTransfersaleDTableMap::COL_ID) && $criteria->keyContainsValue(AliTransfersaleDTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTransfersaleDTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliTransfersaleDQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTransfersaleDTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTransfersaleDTableMap::buildTableMap();
