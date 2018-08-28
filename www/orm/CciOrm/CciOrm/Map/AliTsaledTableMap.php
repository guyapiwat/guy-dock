<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTsaled;
use CciOrm\CciOrm\AliTsaledQuery;
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
 * This class defines the structure of the 'ali_tsaled' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTsaledTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTsaledTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_tsaled';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTsaled';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTsaled';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 18;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 18;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_tsaled.id';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_tsaled.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_tsaled.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_tsaled.inv_code';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_tsaled.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_tsaled.pdesc';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_tsaled.mcode';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_tsaled.price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_tsaled.pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_tsaled.bv';

    /**
     * the column name for the fv field
     */
    const COL_FV = 'ali_tsaled.fv';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_tsaled.qty';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_tsaled.amt';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_tsaled.bprice';

    /**
     * the column name for the uidbase field
     */
    const COL_UIDBASE = 'ali_tsaled.uidbase';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_tsaled.locationbase';

    /**
     * the column name for the outstanding field
     */
    const COL_OUTSTANDING = 'ali_tsaled.outstanding';

    /**
     * the column name for the uidm field
     */
    const COL_UIDM = 'ali_tsaled.uidm';

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
        self::TYPE_PHPNAME       => array('Id', 'Sano', 'Sadate', 'InvCode', 'Pcode', 'Pdesc', 'Mcode', 'Price', 'Pv', 'Bv', 'Fv', 'Qty', 'Amt', 'Bprice', 'Uidbase', 'Locationbase', 'Outstanding', 'Uidm', ),
        self::TYPE_CAMELNAME     => array('id', 'sano', 'sadate', 'invCode', 'pcode', 'pdesc', 'mcode', 'price', 'pv', 'bv', 'fv', 'qty', 'amt', 'bprice', 'uidbase', 'locationbase', 'outstanding', 'uidm', ),
        self::TYPE_COLNAME       => array(AliTsaledTableMap::COL_ID, AliTsaledTableMap::COL_SANO, AliTsaledTableMap::COL_SADATE, AliTsaledTableMap::COL_INV_CODE, AliTsaledTableMap::COL_PCODE, AliTsaledTableMap::COL_PDESC, AliTsaledTableMap::COL_MCODE, AliTsaledTableMap::COL_PRICE, AliTsaledTableMap::COL_PV, AliTsaledTableMap::COL_BV, AliTsaledTableMap::COL_FV, AliTsaledTableMap::COL_QTY, AliTsaledTableMap::COL_AMT, AliTsaledTableMap::COL_BPRICE, AliTsaledTableMap::COL_UIDBASE, AliTsaledTableMap::COL_LOCATIONBASE, AliTsaledTableMap::COL_OUTSTANDING, AliTsaledTableMap::COL_UIDM, ),
        self::TYPE_FIELDNAME     => array('id', 'sano', 'sadate', 'inv_code', 'pcode', 'pdesc', 'mcode', 'price', 'pv', 'bv', 'fv', 'qty', 'amt', 'bprice', 'uidbase', 'locationbase', 'outstanding', 'uidm', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sano' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Pcode' => 4, 'Pdesc' => 5, 'Mcode' => 6, 'Price' => 7, 'Pv' => 8, 'Bv' => 9, 'Fv' => 10, 'Qty' => 11, 'Amt' => 12, 'Bprice' => 13, 'Uidbase' => 14, 'Locationbase' => 15, 'Outstanding' => 16, 'Uidm' => 17, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'invCode' => 3, 'pcode' => 4, 'pdesc' => 5, 'mcode' => 6, 'price' => 7, 'pv' => 8, 'bv' => 9, 'fv' => 10, 'qty' => 11, 'amt' => 12, 'bprice' => 13, 'uidbase' => 14, 'locationbase' => 15, 'outstanding' => 16, 'uidm' => 17, ),
        self::TYPE_COLNAME       => array(AliTsaledTableMap::COL_ID => 0, AliTsaledTableMap::COL_SANO => 1, AliTsaledTableMap::COL_SADATE => 2, AliTsaledTableMap::COL_INV_CODE => 3, AliTsaledTableMap::COL_PCODE => 4, AliTsaledTableMap::COL_PDESC => 5, AliTsaledTableMap::COL_MCODE => 6, AliTsaledTableMap::COL_PRICE => 7, AliTsaledTableMap::COL_PV => 8, AliTsaledTableMap::COL_BV => 9, AliTsaledTableMap::COL_FV => 10, AliTsaledTableMap::COL_QTY => 11, AliTsaledTableMap::COL_AMT => 12, AliTsaledTableMap::COL_BPRICE => 13, AliTsaledTableMap::COL_UIDBASE => 14, AliTsaledTableMap::COL_LOCATIONBASE => 15, AliTsaledTableMap::COL_OUTSTANDING => 16, AliTsaledTableMap::COL_UIDM => 17, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'inv_code' => 3, 'pcode' => 4, 'pdesc' => 5, 'mcode' => 6, 'price' => 7, 'pv' => 8, 'bv' => 9, 'fv' => 10, 'qty' => 11, 'amt' => 12, 'bprice' => 13, 'uidbase' => 14, 'locationbase' => 15, 'outstanding' => 16, 'uidm' => 17, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $this->setName('ali_tsaled');
        $this->setPhpName('AliTsaled');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTsaled');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sano', 'Sano', 'INTEGER', true, null, null);
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
        $this->addColumn('uidm', 'Uidm', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliTsaledTableMap::CLASS_DEFAULT : AliTsaledTableMap::OM_CLASS;
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
     * @return array           (AliTsaled object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTsaledTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTsaledTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTsaledTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTsaledTableMap::OM_CLASS;
            /** @var AliTsaled $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTsaledTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTsaledTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTsaledTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTsaled $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTsaledTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTsaledTableMap::COL_ID);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_SANO);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_PV);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_BV);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_FV);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_QTY);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_AMT);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_UIDBASE);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_OUTSTANDING);
            $criteria->addSelectColumn(AliTsaledTableMap::COL_UIDM);
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
            $criteria->addSelectColumn($alias . '.uidm');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTsaledTableMap::DATABASE_NAME)->getTable(AliTsaledTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTsaledTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTsaledTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTsaledTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTsaled or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTsaled object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTsaledTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTsaled) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTsaledTableMap::DATABASE_NAME);
            $criteria->add(AliTsaledTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliTsaledQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTsaledTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTsaledTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_tsaled table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTsaledQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTsaled or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTsaled object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTsaledTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTsaled object
        }

        if ($criteria->containsKey(AliTsaledTableMap::COL_ID) && $criteria->keyContainsValue(AliTsaledTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTsaledTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliTsaledQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTsaledTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTsaledTableMap::buildTableMap();
