<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliFm;
use CciOrm\CciOrm\AliFmQuery;
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
 * This class defines the structure of the 'ali_fm' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliFmTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliFmTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_fm';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliFm';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliFm';

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
    const COL_ID = 'ali_fm.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_fm.rcode';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_fm.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_fm.inv_ref';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_fm.sano';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_fm.status';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_fm.sa_type';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_fm.tot_pv';

    /**
     * the column name for the tot_price field
     */
    const COL_TOT_PRICE = 'ali_fm.tot_price';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_fm.mdate';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_fm.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_fm.locationbase';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'InvCode', 'InvRef', 'Sano', 'Status', 'SaType', 'TotPv', 'TotPrice', 'Mdate', 'Crate', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'invCode', 'invRef', 'sano', 'status', 'saType', 'totPv', 'totPrice', 'mdate', 'crate', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliFmTableMap::COL_ID, AliFmTableMap::COL_RCODE, AliFmTableMap::COL_INV_CODE, AliFmTableMap::COL_INV_REF, AliFmTableMap::COL_SANO, AliFmTableMap::COL_STATUS, AliFmTableMap::COL_SA_TYPE, AliFmTableMap::COL_TOT_PV, AliFmTableMap::COL_TOT_PRICE, AliFmTableMap::COL_MDATE, AliFmTableMap::COL_CRATE, AliFmTableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'inv_code', 'inv_ref', 'sano', 'status', 'sa_type', 'tot_pv', 'tot_price', 'mdate', 'crate', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'InvCode' => 2, 'InvRef' => 3, 'Sano' => 4, 'Status' => 5, 'SaType' => 6, 'TotPv' => 7, 'TotPrice' => 8, 'Mdate' => 9, 'Crate' => 10, 'Locationbase' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'invCode' => 2, 'invRef' => 3, 'sano' => 4, 'status' => 5, 'saType' => 6, 'totPv' => 7, 'totPrice' => 8, 'mdate' => 9, 'crate' => 10, 'locationbase' => 11, ),
        self::TYPE_COLNAME       => array(AliFmTableMap::COL_ID => 0, AliFmTableMap::COL_RCODE => 1, AliFmTableMap::COL_INV_CODE => 2, AliFmTableMap::COL_INV_REF => 3, AliFmTableMap::COL_SANO => 4, AliFmTableMap::COL_STATUS => 5, AliFmTableMap::COL_SA_TYPE => 6, AliFmTableMap::COL_TOT_PV => 7, AliFmTableMap::COL_TOT_PRICE => 8, AliFmTableMap::COL_MDATE => 9, AliFmTableMap::COL_CRATE => 10, AliFmTableMap::COL_LOCATIONBASE => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'inv_code' => 2, 'inv_ref' => 3, 'sano' => 4, 'status' => 5, 'sa_type' => 6, 'tot_pv' => 7, 'tot_price' => 8, 'mdate' => 9, 'crate' => 10, 'locationbase' => 11, ),
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
        $this->setName('ali_fm');
        $this->setPhpName('AliFm');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliFm');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, 0);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('sano', 'Sano', 'CHAR', false, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 255, null);
        $this->addColumn('sa_type', 'SaType', 'VARCHAR', true, 255, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 15, 0);
        $this->addColumn('tot_price', 'TotPrice', 'DECIMAL', false, 15, 0);
        $this->addColumn('mdate', 'Mdate', 'DATE', true, null, null);
        $this->addColumn('crate', 'Crate', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliFmTableMap::CLASS_DEFAULT : AliFmTableMap::OM_CLASS;
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
     * @return array           (AliFm object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliFmTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliFmTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliFmTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliFmTableMap::OM_CLASS;
            /** @var AliFm $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliFmTableMap::addInstanceToPool($obj, $key);
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
            $key = AliFmTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliFmTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliFm $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliFmTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliFmTableMap::COL_ID);
            $criteria->addSelectColumn(AliFmTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliFmTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliFmTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliFmTableMap::COL_SANO);
            $criteria->addSelectColumn(AliFmTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliFmTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliFmTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliFmTableMap::COL_TOT_PRICE);
            $criteria->addSelectColumn(AliFmTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliFmTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliFmTableMap::COL_LOCATIONBASE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.tot_price');
            $criteria->addSelectColumn($alias . '.mdate');
            $criteria->addSelectColumn($alias . '.crate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliFmTableMap::DATABASE_NAME)->getTable(AliFmTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliFmTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliFmTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliFmTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliFm or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliFm object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliFmTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliFm) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliFmTableMap::DATABASE_NAME);
            $criteria->add(AliFmTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliFmQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliFmTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliFmTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_fm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliFmQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliFm or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliFm object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliFmTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliFm object
        }

        if ($criteria->containsKey(AliFmTableMap::COL_ID) && $criteria->keyContainsValue(AliFmTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliFmTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliFmQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliFmTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliFmTableMap::buildTableMap();
