<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliStatus;
use CciOrm\CciOrm\AliStatusQuery;
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
 * This class defines the structure of the 'ali_status' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliStatusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliStatusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_status';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliStatus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliStatus';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_status.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_status.rcode';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_status.sano';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_status.mcode';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_status.status';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_status.pv';

    /**
     * the column name for the pvb field
     */
    const COL_PVB = 'ali_status.pvb';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_status.mdate';

    /**
     * the column name for the sdate field
     */
    const COL_SDATE = 'ali_status.sdate';

    /**
     * the column name for the satype field
     */
    const COL_SATYPE = 'ali_status.satype';

    /**
     * the column name for the month_pv field
     */
    const COL_MONTH_PV = 'ali_status.month_pv';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_status.mpos';

    /**
     * the column name for the realpos field
     */
    const COL_REALPOS = 'ali_status.realpos';

    /**
     * the column name for the first_regis field
     */
    const COL_FIRST_REGIS = 'ali_status.first_regis';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Sano', 'Mcode', 'Status', 'Pv', 'Pvb', 'Mdate', 'Sdate', 'Satype', 'MonthPv', 'Mpos', 'Realpos', 'FirstRegis', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'sano', 'mcode', 'status', 'pv', 'pvb', 'mdate', 'sdate', 'satype', 'monthPv', 'mpos', 'realpos', 'firstRegis', ),
        self::TYPE_COLNAME       => array(AliStatusTableMap::COL_ID, AliStatusTableMap::COL_RCODE, AliStatusTableMap::COL_SANO, AliStatusTableMap::COL_MCODE, AliStatusTableMap::COL_STATUS, AliStatusTableMap::COL_PV, AliStatusTableMap::COL_PVB, AliStatusTableMap::COL_MDATE, AliStatusTableMap::COL_SDATE, AliStatusTableMap::COL_SATYPE, AliStatusTableMap::COL_MONTH_PV, AliStatusTableMap::COL_MPOS, AliStatusTableMap::COL_REALPOS, AliStatusTableMap::COL_FIRST_REGIS, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'sano', 'mcode', 'status', 'pv', 'pvb', 'mdate', 'sdate', 'satype', 'month_pv', 'mpos', 'realpos', 'first_regis', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Sano' => 2, 'Mcode' => 3, 'Status' => 4, 'Pv' => 5, 'Pvb' => 6, 'Mdate' => 7, 'Sdate' => 8, 'Satype' => 9, 'MonthPv' => 10, 'Mpos' => 11, 'Realpos' => 12, 'FirstRegis' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'sano' => 2, 'mcode' => 3, 'status' => 4, 'pv' => 5, 'pvb' => 6, 'mdate' => 7, 'sdate' => 8, 'satype' => 9, 'monthPv' => 10, 'mpos' => 11, 'realpos' => 12, 'firstRegis' => 13, ),
        self::TYPE_COLNAME       => array(AliStatusTableMap::COL_ID => 0, AliStatusTableMap::COL_RCODE => 1, AliStatusTableMap::COL_SANO => 2, AliStatusTableMap::COL_MCODE => 3, AliStatusTableMap::COL_STATUS => 4, AliStatusTableMap::COL_PV => 5, AliStatusTableMap::COL_PVB => 6, AliStatusTableMap::COL_MDATE => 7, AliStatusTableMap::COL_SDATE => 8, AliStatusTableMap::COL_SATYPE => 9, AliStatusTableMap::COL_MONTH_PV => 10, AliStatusTableMap::COL_MPOS => 11, AliStatusTableMap::COL_REALPOS => 12, AliStatusTableMap::COL_FIRST_REGIS => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'sano' => 2, 'mcode' => 3, 'status' => 4, 'pv' => 5, 'pvb' => 6, 'mdate' => 7, 'sdate' => 8, 'satype' => 9, 'month_pv' => 10, 'mpos' => 11, 'realpos' => 12, 'first_regis' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('ali_status');
        $this->setPhpName('AliStatus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliStatus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 2, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', true, 15, null);
        $this->addColumn('pvb', 'Pvb', 'INTEGER', true, null, null);
        $this->addColumn('mdate', 'Mdate', 'DATE', true, null, null);
        $this->addColumn('sdate', 'Sdate', 'DATE', true, null, null);
        $this->addColumn('satype', 'Satype', 'VARCHAR', true, 5, null);
        $this->addColumn('month_pv', 'MonthPv', 'VARCHAR', true, 10, null);
        $this->addColumn('mpos', 'Mpos', 'VARCHAR', true, 255, null);
        $this->addColumn('realpos', 'Realpos', 'VARCHAR', true, 255, null);
        $this->addColumn('first_regis', 'FirstRegis', 'INTEGER', true, 1, null);
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
        return $withPrefix ? AliStatusTableMap::CLASS_DEFAULT : AliStatusTableMap::OM_CLASS;
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
     * @return array           (AliStatus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliStatusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliStatusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliStatusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliStatusTableMap::OM_CLASS;
            /** @var AliStatus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliStatusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliStatusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliStatusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliStatus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliStatusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliStatusTableMap::COL_ID);
            $criteria->addSelectColumn(AliStatusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliStatusTableMap::COL_SANO);
            $criteria->addSelectColumn(AliStatusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliStatusTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliStatusTableMap::COL_PV);
            $criteria->addSelectColumn(AliStatusTableMap::COL_PVB);
            $criteria->addSelectColumn(AliStatusTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliStatusTableMap::COL_SDATE);
            $criteria->addSelectColumn(AliStatusTableMap::COL_SATYPE);
            $criteria->addSelectColumn(AliStatusTableMap::COL_MONTH_PV);
            $criteria->addSelectColumn(AliStatusTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliStatusTableMap::COL_REALPOS);
            $criteria->addSelectColumn(AliStatusTableMap::COL_FIRST_REGIS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.pvb');
            $criteria->addSelectColumn($alias . '.mdate');
            $criteria->addSelectColumn($alias . '.sdate');
            $criteria->addSelectColumn($alias . '.satype');
            $criteria->addSelectColumn($alias . '.month_pv');
            $criteria->addSelectColumn($alias . '.mpos');
            $criteria->addSelectColumn($alias . '.realpos');
            $criteria->addSelectColumn($alias . '.first_regis');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliStatusTableMap::DATABASE_NAME)->getTable(AliStatusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliStatusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliStatusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliStatusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliStatus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliStatus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStatusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliStatus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliStatusTableMap::DATABASE_NAME);
            $criteria->add(AliStatusTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliStatusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliStatusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliStatusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_status table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliStatusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliStatus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliStatus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStatusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliStatus object
        }

        if ($criteria->containsKey(AliStatusTableMap::COL_ID) && $criteria->keyContainsValue(AliStatusTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliStatusTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliStatusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliStatusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliStatusTableMap::buildTableMap();
