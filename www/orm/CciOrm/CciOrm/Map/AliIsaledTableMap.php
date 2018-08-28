<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliIsaled;
use CciOrm\CciOrm\AliIsaledQuery;
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
 * This class defines the structure of the 'ali_isaled' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliIsaledTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliIsaledTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_isaled';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliIsaled';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliIsaled';

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
    const COL_ID = 'ali_isaled.id';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_isaled.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_isaled.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_isaled.inv_code';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_isaled.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_isaled.pdesc';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_isaled.mcode';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_isaled.price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_isaled.pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_isaled.bv';

    /**
     * the column name for the fv field
     */
    const COL_FV = 'ali_isaled.fv';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_isaled.qty';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_isaled.amt';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_isaled.bprice';

    /**
     * the column name for the uidbase field
     */
    const COL_UIDBASE = 'ali_isaled.uidbase';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_isaled.locationbase';

    /**
     * the column name for the outstanding field
     */
    const COL_OUTSTANDING = 'ali_isaled.outstanding';

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
        self::TYPE_PHPNAME       => array('Id', 'Sano', 'Sadate', 'InvCode', 'Pcode', 'Pdesc', 'Mcode', 'Price', 'Pv', 'Bv', 'Fv', 'Qty', 'Amt', 'Bprice', 'Uidbase', 'Locationbase', 'Outstanding', ),
        self::TYPE_CAMELNAME     => array('id', 'sano', 'sadate', 'invCode', 'pcode', 'pdesc', 'mcode', 'price', 'pv', 'bv', 'fv', 'qty', 'amt', 'bprice', 'uidbase', 'locationbase', 'outstanding', ),
        self::TYPE_COLNAME       => array(AliIsaledTableMap::COL_ID, AliIsaledTableMap::COL_SANO, AliIsaledTableMap::COL_SADATE, AliIsaledTableMap::COL_INV_CODE, AliIsaledTableMap::COL_PCODE, AliIsaledTableMap::COL_PDESC, AliIsaledTableMap::COL_MCODE, AliIsaledTableMap::COL_PRICE, AliIsaledTableMap::COL_PV, AliIsaledTableMap::COL_BV, AliIsaledTableMap::COL_FV, AliIsaledTableMap::COL_QTY, AliIsaledTableMap::COL_AMT, AliIsaledTableMap::COL_BPRICE, AliIsaledTableMap::COL_UIDBASE, AliIsaledTableMap::COL_LOCATIONBASE, AliIsaledTableMap::COL_OUTSTANDING, ),
        self::TYPE_FIELDNAME     => array('id', 'sano', 'sadate', 'inv_code', 'pcode', 'pdesc', 'mcode', 'price', 'pv', 'bv', 'fv', 'qty', 'amt', 'bprice', 'uidbase', 'locationbase', 'outstanding', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sano' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Pcode' => 4, 'Pdesc' => 5, 'Mcode' => 6, 'Price' => 7, 'Pv' => 8, 'Bv' => 9, 'Fv' => 10, 'Qty' => 11, 'Amt' => 12, 'Bprice' => 13, 'Uidbase' => 14, 'Locationbase' => 15, 'Outstanding' => 16, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'invCode' => 3, 'pcode' => 4, 'pdesc' => 5, 'mcode' => 6, 'price' => 7, 'pv' => 8, 'bv' => 9, 'fv' => 10, 'qty' => 11, 'amt' => 12, 'bprice' => 13, 'uidbase' => 14, 'locationbase' => 15, 'outstanding' => 16, ),
        self::TYPE_COLNAME       => array(AliIsaledTableMap::COL_ID => 0, AliIsaledTableMap::COL_SANO => 1, AliIsaledTableMap::COL_SADATE => 2, AliIsaledTableMap::COL_INV_CODE => 3, AliIsaledTableMap::COL_PCODE => 4, AliIsaledTableMap::COL_PDESC => 5, AliIsaledTableMap::COL_MCODE => 6, AliIsaledTableMap::COL_PRICE => 7, AliIsaledTableMap::COL_PV => 8, AliIsaledTableMap::COL_BV => 9, AliIsaledTableMap::COL_FV => 10, AliIsaledTableMap::COL_QTY => 11, AliIsaledTableMap::COL_AMT => 12, AliIsaledTableMap::COL_BPRICE => 13, AliIsaledTableMap::COL_UIDBASE => 14, AliIsaledTableMap::COL_LOCATIONBASE => 15, AliIsaledTableMap::COL_OUTSTANDING => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'inv_code' => 3, 'pcode' => 4, 'pdesc' => 5, 'mcode' => 6, 'price' => 7, 'pv' => 8, 'bv' => 9, 'fv' => 10, 'qty' => 11, 'amt' => 12, 'bprice' => 13, 'uidbase' => 14, 'locationbase' => 15, 'outstanding' => 16, ),
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
        $this->setName('ali_isaled');
        $this->setPhpName('AliIsaled');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliIsaled');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 7, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 7, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', false, 20, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', false, 100, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 7, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 15, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', false, 15, null);
        $this->addColumn('bv', 'Bv', 'DECIMAL', false, 15, null);
        $this->addColumn('fv', 'Fv', 'DECIMAL', true, 15, null);
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 15, null);
        $this->addColumn('amt', 'Amt', 'DECIMAL', false, 15, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('uidbase', 'Uidbase', 'VARCHAR', true, 255, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('outstanding', 'Outstanding', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliIsaledTableMap::CLASS_DEFAULT : AliIsaledTableMap::OM_CLASS;
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
     * @return array           (AliIsaled object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliIsaledTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliIsaledTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliIsaledTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliIsaledTableMap::OM_CLASS;
            /** @var AliIsaled $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliIsaledTableMap::addInstanceToPool($obj, $key);
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
            $key = AliIsaledTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliIsaledTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliIsaled $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliIsaledTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliIsaledTableMap::COL_ID);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_SANO);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_PV);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_BV);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_FV);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_QTY);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_AMT);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_UIDBASE);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliIsaledTableMap::COL_OUTSTANDING);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.bv');
            $criteria->addSelectColumn($alias . '.fv');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.amt');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.uidbase');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.outstanding');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliIsaledTableMap::DATABASE_NAME)->getTable(AliIsaledTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliIsaledTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliIsaledTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliIsaledTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliIsaled or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliIsaled object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliIsaledTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliIsaled) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliIsaledTableMap::DATABASE_NAME);
            $criteria->add(AliIsaledTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliIsaledQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliIsaledTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliIsaledTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_isaled table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliIsaledQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliIsaled or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliIsaled object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliIsaledTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliIsaled object
        }

        if ($criteria->containsKey(AliIsaledTableMap::COL_ID) && $criteria->keyContainsValue(AliIsaledTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliIsaledTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliIsaledQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliIsaledTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliIsaledTableMap::buildTableMap();
