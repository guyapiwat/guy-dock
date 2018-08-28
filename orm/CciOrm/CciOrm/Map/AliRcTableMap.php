<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliRc;
use CciOrm\CciOrm\AliRcQuery;
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
 * This class defines the structure of the 'ali_rc' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliRcTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliRcTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_rc';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliRc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliRc';

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
     * the column name for the bid field
     */
    const COL_BID = 'ali_rc.bid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_rc.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_rc.mcode';

    /**
     * the column name for the mposi field
     */
    const COL_MPOSI = 'ali_rc.mposi';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_rc.upa_code';

    /**
     * the column name for the bposi field
     */
    const COL_BPOSI = 'ali_rc.bposi';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'ali_rc.level';

    /**
     * the column name for the gen field
     */
    const COL_GEN = 'ali_rc.gen';

    /**
     * the column name for the btype field
     */
    const COL_BTYPE = 'ali_rc.btype';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_rc.pv';

    /**
     * the column name for the percer field
     */
    const COL_PERCER = 'ali_rc.percer';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_rc.total';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_rc.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_rc.tdate';

    /**
     * the column name for the checkcheck field
     */
    const COL_CHECKCHECK = 'ali_rc.checkcheck';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_rc.pos_cur';

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
        self::TYPE_PHPNAME       => array('Bid', 'Rcode', 'Mcode', 'Mposi', 'UpaCode', 'Bposi', 'Level', 'Gen', 'Btype', 'Pv', 'Percer', 'Total', 'Fdate', 'Tdate', 'Checkcheck', 'PosCur', ),
        self::TYPE_CAMELNAME     => array('bid', 'rcode', 'mcode', 'mposi', 'upaCode', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', 'fdate', 'tdate', 'checkcheck', 'posCur', ),
        self::TYPE_COLNAME       => array(AliRcTableMap::COL_BID, AliRcTableMap::COL_RCODE, AliRcTableMap::COL_MCODE, AliRcTableMap::COL_MPOSI, AliRcTableMap::COL_UPA_CODE, AliRcTableMap::COL_BPOSI, AliRcTableMap::COL_LEVEL, AliRcTableMap::COL_GEN, AliRcTableMap::COL_BTYPE, AliRcTableMap::COL_PV, AliRcTableMap::COL_PERCER, AliRcTableMap::COL_TOTAL, AliRcTableMap::COL_FDATE, AliRcTableMap::COL_TDATE, AliRcTableMap::COL_CHECKCHECK, AliRcTableMap::COL_POS_CUR, ),
        self::TYPE_FIELDNAME     => array('bid', 'rcode', 'mcode', 'mposi', 'upa_code', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', 'fdate', 'tdate', 'checkcheck', 'pos_cur', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Bid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'Mposi' => 3, 'UpaCode' => 4, 'Bposi' => 5, 'Level' => 6, 'Gen' => 7, 'Btype' => 8, 'Pv' => 9, 'Percer' => 10, 'Total' => 11, 'Fdate' => 12, 'Tdate' => 13, 'Checkcheck' => 14, 'PosCur' => 15, ),
        self::TYPE_CAMELNAME     => array('bid' => 0, 'rcode' => 1, 'mcode' => 2, 'mposi' => 3, 'upaCode' => 4, 'bposi' => 5, 'level' => 6, 'gen' => 7, 'btype' => 8, 'pv' => 9, 'percer' => 10, 'total' => 11, 'fdate' => 12, 'tdate' => 13, 'checkcheck' => 14, 'posCur' => 15, ),
        self::TYPE_COLNAME       => array(AliRcTableMap::COL_BID => 0, AliRcTableMap::COL_RCODE => 1, AliRcTableMap::COL_MCODE => 2, AliRcTableMap::COL_MPOSI => 3, AliRcTableMap::COL_UPA_CODE => 4, AliRcTableMap::COL_BPOSI => 5, AliRcTableMap::COL_LEVEL => 6, AliRcTableMap::COL_GEN => 7, AliRcTableMap::COL_BTYPE => 8, AliRcTableMap::COL_PV => 9, AliRcTableMap::COL_PERCER => 10, AliRcTableMap::COL_TOTAL => 11, AliRcTableMap::COL_FDATE => 12, AliRcTableMap::COL_TDATE => 13, AliRcTableMap::COL_CHECKCHECK => 14, AliRcTableMap::COL_POS_CUR => 15, ),
        self::TYPE_FIELDNAME     => array('bid' => 0, 'rcode' => 1, 'mcode' => 2, 'mposi' => 3, 'upa_code' => 4, 'bposi' => 5, 'level' => 6, 'gen' => 7, 'btype' => 8, 'pv' => 9, 'percer' => 10, 'total' => 11, 'fdate' => 12, 'tdate' => 13, 'checkcheck' => 14, 'pos_cur' => 15, ),
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
        $this->setName('ali_rc');
        $this->setPhpName('AliRc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliRc');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('bid', 'Bid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('mposi', 'Mposi', 'VARCHAR', false, 10, null);
        $this->addColumn('upa_code', 'UpaCode', 'VARCHAR', false, 255, null);
        $this->addColumn('bposi', 'Bposi', 'VARCHAR', false, 10, null);
        $this->addColumn('level', 'Level', 'DECIMAL', true, 15, null);
        $this->addColumn('gen', 'Gen', 'DECIMAL', true, 15, null);
        $this->addColumn('btype', 'Btype', 'VARCHAR', false, 10, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', true, 15, null);
        $this->addColumn('percer', 'Percer', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('checkcheck', 'Checkcheck', 'VARCHAR', true, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Bid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliRcTableMap::CLASS_DEFAULT : AliRcTableMap::OM_CLASS;
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
     * @return array           (AliRc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliRcTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliRcTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliRcTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliRcTableMap::OM_CLASS;
            /** @var AliRc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliRcTableMap::addInstanceToPool($obj, $key);
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
            $key = AliRcTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliRcTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliRc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliRcTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliRcTableMap::COL_BID);
            $criteria->addSelectColumn(AliRcTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliRcTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliRcTableMap::COL_MPOSI);
            $criteria->addSelectColumn(AliRcTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliRcTableMap::COL_BPOSI);
            $criteria->addSelectColumn(AliRcTableMap::COL_LEVEL);
            $criteria->addSelectColumn(AliRcTableMap::COL_GEN);
            $criteria->addSelectColumn(AliRcTableMap::COL_BTYPE);
            $criteria->addSelectColumn(AliRcTableMap::COL_PV);
            $criteria->addSelectColumn(AliRcTableMap::COL_PERCER);
            $criteria->addSelectColumn(AliRcTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliRcTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliRcTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliRcTableMap::COL_CHECKCHECK);
            $criteria->addSelectColumn(AliRcTableMap::COL_POS_CUR);
        } else {
            $criteria->addSelectColumn($alias . '.bid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.mposi');
            $criteria->addSelectColumn($alias . '.upa_code');
            $criteria->addSelectColumn($alias . '.bposi');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.gen');
            $criteria->addSelectColumn($alias . '.btype');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.percer');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.checkcheck');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliRcTableMap::DATABASE_NAME)->getTable(AliRcTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliRcTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliRcTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliRcTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliRc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliRc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliRcTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliRc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliRcTableMap::DATABASE_NAME);
            $criteria->add(AliRcTableMap::COL_BID, (array) $values, Criteria::IN);
        }

        $query = AliRcQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliRcTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliRcTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_rc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliRcQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliRc or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliRc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliRcTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliRc object
        }

        if ($criteria->containsKey(AliRcTableMap::COL_BID) && $criteria->keyContainsValue(AliRcTableMap::COL_BID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliRcTableMap::COL_BID.')');
        }


        // Set the correct dbName
        $query = AliRcQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliRcTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliRcTableMap::buildTableMap();
