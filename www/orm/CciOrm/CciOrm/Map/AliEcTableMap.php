<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEc;
use CciOrm\CciOrm\AliEcQuery;
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
 * This class defines the structure of the 'ali_ec' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEcTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEcTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ec';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEc';

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
    const COL_ID = 'ali_ec.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_ec.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ec.mcode';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_ec.sp_code';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_ec.pv';

    /**
     * the column name for the point field
     */
    const COL_POINT = 'ali_ec.point';

    /**
     * the column name for the share field
     */
    const COL_SHARE = 'ali_ec.share';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ec.total';

    /**
     * the column name for the pershare field
     */
    const COL_PERSHARE = 'ali_ec.pershare';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_ec.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_ec.tdate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_ec.pos_cur';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Mcode', 'SpCode', 'Pv', 'Point', 'Share', 'Total', 'Pershare', 'Fdate', 'Tdate', 'PosCur', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'mcode', 'spCode', 'pv', 'point', 'share', 'total', 'pershare', 'fdate', 'tdate', 'posCur', ),
        self::TYPE_COLNAME       => array(AliEcTableMap::COL_ID, AliEcTableMap::COL_RCODE, AliEcTableMap::COL_MCODE, AliEcTableMap::COL_SP_CODE, AliEcTableMap::COL_PV, AliEcTableMap::COL_POINT, AliEcTableMap::COL_SHARE, AliEcTableMap::COL_TOTAL, AliEcTableMap::COL_PERSHARE, AliEcTableMap::COL_FDATE, AliEcTableMap::COL_TDATE, AliEcTableMap::COL_POS_CUR, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'mcode', 'sp_code', 'pv', 'point', 'share', 'total', 'pershare', 'fdate', 'tdate', 'pos_cur', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Mcode' => 2, 'SpCode' => 3, 'Pv' => 4, 'Point' => 5, 'Share' => 6, 'Total' => 7, 'Pershare' => 8, 'Fdate' => 9, 'Tdate' => 10, 'PosCur' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'mcode' => 2, 'spCode' => 3, 'pv' => 4, 'point' => 5, 'share' => 6, 'total' => 7, 'pershare' => 8, 'fdate' => 9, 'tdate' => 10, 'posCur' => 11, ),
        self::TYPE_COLNAME       => array(AliEcTableMap::COL_ID => 0, AliEcTableMap::COL_RCODE => 1, AliEcTableMap::COL_MCODE => 2, AliEcTableMap::COL_SP_CODE => 3, AliEcTableMap::COL_PV => 4, AliEcTableMap::COL_POINT => 5, AliEcTableMap::COL_SHARE => 6, AliEcTableMap::COL_TOTAL => 7, AliEcTableMap::COL_PERSHARE => 8, AliEcTableMap::COL_FDATE => 9, AliEcTableMap::COL_TDATE => 10, AliEcTableMap::COL_POS_CUR => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'mcode' => 2, 'sp_code' => 3, 'pv' => 4, 'point' => 5, 'share' => 6, 'total' => 7, 'pershare' => 8, 'fdate' => 9, 'tdate' => 10, 'pos_cur' => 11, ),
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
        $this->setName('ali_ec');
        $this->setPhpName('AliEc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEc');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', false, 255, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', true, 15, null);
        $this->addColumn('point', 'Point', 'DECIMAL', true, 15, null);
        $this->addColumn('share', 'Share', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('pershare', 'Pershare', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliEcTableMap::CLASS_DEFAULT : AliEcTableMap::OM_CLASS;
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
     * @return array           (AliEc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEcTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEcTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEcTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEcTableMap::OM_CLASS;
            /** @var AliEc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEcTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEcTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEcTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEcTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEcTableMap::COL_ID);
            $criteria->addSelectColumn(AliEcTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliEcTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEcTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliEcTableMap::COL_PV);
            $criteria->addSelectColumn(AliEcTableMap::COL_POINT);
            $criteria->addSelectColumn(AliEcTableMap::COL_SHARE);
            $criteria->addSelectColumn(AliEcTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEcTableMap::COL_PERSHARE);
            $criteria->addSelectColumn(AliEcTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliEcTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliEcTableMap::COL_POS_CUR);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.point');
            $criteria->addSelectColumn($alias . '.share');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.pershare');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pos_cur');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEcTableMap::DATABASE_NAME)->getTable(AliEcTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEcTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEcTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEcTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEcTableMap::DATABASE_NAME);
            $criteria->add(AliEcTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEcQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEcTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEcTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ec table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEcQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEc or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEc object
        }

        if ($criteria->containsKey(AliEcTableMap::COL_ID) && $criteria->keyContainsValue(AliEcTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEcTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEcQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEcTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEcTableMap::buildTableMap();
