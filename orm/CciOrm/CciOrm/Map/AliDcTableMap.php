<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliDc;
use CciOrm\CciOrm\AliDcQuery;
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
 * This class defines the structure of the 'ali_dc' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliDcTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliDcTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_dc';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliDc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliDc';

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
     * the column name for the aid field
     */
    const COL_AID = 'ali_dc.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_dc.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_dc.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_dc.name_t';

    /**
     * the column name for the mposi field
     */
    const COL_MPOSI = 'ali_dc.mposi';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_dc.upa_code';

    /**
     * the column name for the upa_name field
     */
    const COL_UPA_NAME = 'ali_dc.upa_name';

    /**
     * the column name for the bposi field
     */
    const COL_BPOSI = 'ali_dc.bposi';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'ali_dc.level';

    /**
     * the column name for the gen field
     */
    const COL_GEN = 'ali_dc.gen';

    /**
     * the column name for the btype field
     */
    const COL_BTYPE = 'ali_dc.btype';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_dc.pv';

    /**
     * the column name for the percer field
     */
    const COL_PERCER = 'ali_dc.percer';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_dc.total';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_dc.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_dc.tdate';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_dc.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_dc.locationbase';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'NameT', 'Mposi', 'UpaCode', 'UpaName', 'Bposi', 'Level', 'Gen', 'Btype', 'Pv', 'Percer', 'Total', 'Fdate', 'Tdate', 'Crate', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'nameT', 'mposi', 'upaCode', 'upaName', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', 'fdate', 'tdate', 'crate', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliDcTableMap::COL_AID, AliDcTableMap::COL_RCODE, AliDcTableMap::COL_MCODE, AliDcTableMap::COL_NAME_T, AliDcTableMap::COL_MPOSI, AliDcTableMap::COL_UPA_CODE, AliDcTableMap::COL_UPA_NAME, AliDcTableMap::COL_BPOSI, AliDcTableMap::COL_LEVEL, AliDcTableMap::COL_GEN, AliDcTableMap::COL_BTYPE, AliDcTableMap::COL_PV, AliDcTableMap::COL_PERCER, AliDcTableMap::COL_TOTAL, AliDcTableMap::COL_FDATE, AliDcTableMap::COL_TDATE, AliDcTableMap::COL_CRATE, AliDcTableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'name_t', 'mposi', 'upa_code', 'upa_name', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', 'fdate', 'tdate', 'crate', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameT' => 3, 'Mposi' => 4, 'UpaCode' => 5, 'UpaName' => 6, 'Bposi' => 7, 'Level' => 8, 'Gen' => 9, 'Btype' => 10, 'Pv' => 11, 'Percer' => 12, 'Total' => 13, 'Fdate' => 14, 'Tdate' => 15, 'Crate' => 16, 'Locationbase' => 17, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'nameT' => 3, 'mposi' => 4, 'upaCode' => 5, 'upaName' => 6, 'bposi' => 7, 'level' => 8, 'gen' => 9, 'btype' => 10, 'pv' => 11, 'percer' => 12, 'total' => 13, 'fdate' => 14, 'tdate' => 15, 'crate' => 16, 'locationbase' => 17, ),
        self::TYPE_COLNAME       => array(AliDcTableMap::COL_AID => 0, AliDcTableMap::COL_RCODE => 1, AliDcTableMap::COL_MCODE => 2, AliDcTableMap::COL_NAME_T => 3, AliDcTableMap::COL_MPOSI => 4, AliDcTableMap::COL_UPA_CODE => 5, AliDcTableMap::COL_UPA_NAME => 6, AliDcTableMap::COL_BPOSI => 7, AliDcTableMap::COL_LEVEL => 8, AliDcTableMap::COL_GEN => 9, AliDcTableMap::COL_BTYPE => 10, AliDcTableMap::COL_PV => 11, AliDcTableMap::COL_PERCER => 12, AliDcTableMap::COL_TOTAL => 13, AliDcTableMap::COL_FDATE => 14, AliDcTableMap::COL_TDATE => 15, AliDcTableMap::COL_CRATE => 16, AliDcTableMap::COL_LOCATIONBASE => 17, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'name_t' => 3, 'mposi' => 4, 'upa_code' => 5, 'upa_name' => 6, 'bposi' => 7, 'level' => 8, 'gen' => 9, 'btype' => 10, 'pv' => 11, 'percer' => 12, 'total' => 13, 'fdate' => 14, 'tdate' => 15, 'crate' => 16, 'locationbase' => 17, ),
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
        $this->setName('ali_dc');
        $this->setPhpName('AliDc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliDc');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('mposi', 'Mposi', 'VARCHAR', false, 10, null);
        $this->addColumn('upa_code', 'UpaCode', 'VARCHAR', false, 255, null);
        $this->addColumn('upa_name', 'UpaName', 'VARCHAR', true, 255, null);
        $this->addColumn('bposi', 'Bposi', 'VARCHAR', false, 10, null);
        $this->addColumn('level', 'Level', 'DECIMAL', true, 15, null);
        $this->addColumn('gen', 'Gen', 'DECIMAL', true, 15, null);
        $this->addColumn('btype', 'Btype', 'VARCHAR', false, 10, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', true, 15, null);
        $this->addColumn('percer', 'Percer', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliDcTableMap::CLASS_DEFAULT : AliDcTableMap::OM_CLASS;
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
     * @return array           (AliDc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliDcTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliDcTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliDcTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliDcTableMap::OM_CLASS;
            /** @var AliDc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliDcTableMap::addInstanceToPool($obj, $key);
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
            $key = AliDcTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliDcTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliDc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliDcTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliDcTableMap::COL_AID);
            $criteria->addSelectColumn(AliDcTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliDcTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliDcTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliDcTableMap::COL_MPOSI);
            $criteria->addSelectColumn(AliDcTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliDcTableMap::COL_UPA_NAME);
            $criteria->addSelectColumn(AliDcTableMap::COL_BPOSI);
            $criteria->addSelectColumn(AliDcTableMap::COL_LEVEL);
            $criteria->addSelectColumn(AliDcTableMap::COL_GEN);
            $criteria->addSelectColumn(AliDcTableMap::COL_BTYPE);
            $criteria->addSelectColumn(AliDcTableMap::COL_PV);
            $criteria->addSelectColumn(AliDcTableMap::COL_PERCER);
            $criteria->addSelectColumn(AliDcTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliDcTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliDcTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliDcTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliDcTableMap::COL_LOCATIONBASE);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.mposi');
            $criteria->addSelectColumn($alias . '.upa_code');
            $criteria->addSelectColumn($alias . '.upa_name');
            $criteria->addSelectColumn($alias . '.bposi');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.gen');
            $criteria->addSelectColumn($alias . '.btype');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.percer');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliDcTableMap::DATABASE_NAME)->getTable(AliDcTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliDcTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliDcTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliDcTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliDc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliDc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliDcTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliDc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliDcTableMap::DATABASE_NAME);
            $criteria->add(AliDcTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliDcQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliDcTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliDcTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_dc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliDcQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliDc or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliDc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliDcTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliDc object
        }

        if ($criteria->containsKey(AliDcTableMap::COL_AID) && $criteria->keyContainsValue(AliDcTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliDcTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliDcQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliDcTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliDcTableMap::buildTableMap();
