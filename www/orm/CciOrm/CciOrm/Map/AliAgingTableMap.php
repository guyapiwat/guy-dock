<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliAging;
use CciOrm\CciOrm\AliAgingQuery;
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
 * This class defines the structure of the 'ali_aging' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliAgingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliAgingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_aging';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliAging';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliAging';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_aging.id';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_aging.pcode';

    /**
     * the column name for the intime field
     */
    const COL_INTIME = 'ali_aging.intime';

    /**
     * the column name for the outtime field
     */
    const COL_OUTTIME = 'ali_aging.outtime';

    /**
     * the column name for the serial field
     */
    const COL_SERIAL = 'ali_aging.serial';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_aging.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_aging.tdate';

    /**
     * the column name for the barcode field
     */
    const COL_BARCODE = 'ali_aging.barcode';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_aging.inv_code';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_aging.sano';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_aging.mcode';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_aging.qty';

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
        self::TYPE_PHPNAME       => array('Id', 'Pcode', 'Intime', 'Outtime', 'Serial', 'Fdate', 'Tdate', 'Barcode', 'InvCode', 'Sano', 'Mcode', 'Qty', ),
        self::TYPE_CAMELNAME     => array('id', 'pcode', 'intime', 'outtime', 'serial', 'fdate', 'tdate', 'barcode', 'invCode', 'sano', 'mcode', 'qty', ),
        self::TYPE_COLNAME       => array(AliAgingTableMap::COL_ID, AliAgingTableMap::COL_PCODE, AliAgingTableMap::COL_INTIME, AliAgingTableMap::COL_OUTTIME, AliAgingTableMap::COL_SERIAL, AliAgingTableMap::COL_FDATE, AliAgingTableMap::COL_TDATE, AliAgingTableMap::COL_BARCODE, AliAgingTableMap::COL_INV_CODE, AliAgingTableMap::COL_SANO, AliAgingTableMap::COL_MCODE, AliAgingTableMap::COL_QTY, ),
        self::TYPE_FIELDNAME     => array('id', 'pcode', 'intime', 'outtime', 'serial', 'fdate', 'tdate', 'barcode', 'inv_code', 'sano', 'mcode', 'qty', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Pcode' => 1, 'Intime' => 2, 'Outtime' => 3, 'Serial' => 4, 'Fdate' => 5, 'Tdate' => 6, 'Barcode' => 7, 'InvCode' => 8, 'Sano' => 9, 'Mcode' => 10, 'Qty' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'pcode' => 1, 'intime' => 2, 'outtime' => 3, 'serial' => 4, 'fdate' => 5, 'tdate' => 6, 'barcode' => 7, 'invCode' => 8, 'sano' => 9, 'mcode' => 10, 'qty' => 11, ),
        self::TYPE_COLNAME       => array(AliAgingTableMap::COL_ID => 0, AliAgingTableMap::COL_PCODE => 1, AliAgingTableMap::COL_INTIME => 2, AliAgingTableMap::COL_OUTTIME => 3, AliAgingTableMap::COL_SERIAL => 4, AliAgingTableMap::COL_FDATE => 5, AliAgingTableMap::COL_TDATE => 6, AliAgingTableMap::COL_BARCODE => 7, AliAgingTableMap::COL_INV_CODE => 8, AliAgingTableMap::COL_SANO => 9, AliAgingTableMap::COL_MCODE => 10, AliAgingTableMap::COL_QTY => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'pcode' => 1, 'intime' => 2, 'outtime' => 3, 'serial' => 4, 'fdate' => 5, 'tdate' => 6, 'barcode' => 7, 'inv_code' => 8, 'sano' => 9, 'mcode' => 10, 'qty' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('ali_aging');
        $this->setPhpName('AliAging');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliAging');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('intime', 'Intime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('outtime', 'Outtime', 'TIMESTAMP', true, null, null);
        $this->addColumn('serial', 'Serial', 'VARCHAR', true, 255, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('barcode', 'Barcode', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliAgingTableMap::CLASS_DEFAULT : AliAgingTableMap::OM_CLASS;
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
     * @return array           (AliAging object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliAgingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliAgingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliAgingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliAgingTableMap::OM_CLASS;
            /** @var AliAging $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliAgingTableMap::addInstanceToPool($obj, $key);
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
            $key = AliAgingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliAgingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliAging $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliAgingTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliAgingTableMap::COL_ID);
            $criteria->addSelectColumn(AliAgingTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliAgingTableMap::COL_INTIME);
            $criteria->addSelectColumn(AliAgingTableMap::COL_OUTTIME);
            $criteria->addSelectColumn(AliAgingTableMap::COL_SERIAL);
            $criteria->addSelectColumn(AliAgingTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliAgingTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliAgingTableMap::COL_BARCODE);
            $criteria->addSelectColumn(AliAgingTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliAgingTableMap::COL_SANO);
            $criteria->addSelectColumn(AliAgingTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliAgingTableMap::COL_QTY);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.intime');
            $criteria->addSelectColumn($alias . '.outtime');
            $criteria->addSelectColumn($alias . '.serial');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.barcode');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.qty');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliAgingTableMap::DATABASE_NAME)->getTable(AliAgingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliAgingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliAgingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliAgingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliAging or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliAging object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAgingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliAging) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliAgingTableMap::DATABASE_NAME);
            $criteria->add(AliAgingTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliAgingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliAgingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliAgingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_aging table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliAgingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliAging or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliAging object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAgingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliAging object
        }

        if ($criteria->containsKey(AliAgingTableMap::COL_ID) && $criteria->keyContainsValue(AliAgingTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliAgingTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliAgingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliAgingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliAgingTableMap::buildTableMap();
