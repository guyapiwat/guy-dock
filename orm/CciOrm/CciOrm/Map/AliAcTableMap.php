<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliAc;
use CciOrm\CciOrm\AliAcQuery;
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
 * This class defines the structure of the 'ali_ac' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliAcTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliAcTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ac';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliAc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliAc';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the aid field
     */
    const COL_AID = 'ali_ac.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_ac.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ac.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_ac.name_t';

    /**
     * the column name for the mposi field
     */
    const COL_MPOSI = 'ali_ac.mposi';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_ac.upa_code';

    /**
     * the column name for the upa_name field
     */
    const COL_UPA_NAME = 'ali_ac.upa_name';

    /**
     * the column name for the bposi field
     */
    const COL_BPOSI = 'ali_ac.bposi';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'ali_ac.level';

    /**
     * the column name for the gen field
     */
    const COL_GEN = 'ali_ac.gen';

    /**
     * the column name for the btype field
     */
    const COL_BTYPE = 'ali_ac.btype';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_ac.pv';

    /**
     * the column name for the percer field
     */
    const COL_PERCER = 'ali_ac.percer';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ac.total';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_ac.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_ac.tdate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_ac.pos_cur';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'ali_ac.type';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_ac.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_ac.locationbase';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'NameT', 'Mposi', 'UpaCode', 'UpaName', 'Bposi', 'Level', 'Gen', 'Btype', 'Pv', 'Percer', 'Total', 'Fdate', 'Tdate', 'PosCur', 'Type', 'Crate', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'nameT', 'mposi', 'upaCode', 'upaName', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', 'fdate', 'tdate', 'posCur', 'type', 'crate', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliAcTableMap::COL_AID, AliAcTableMap::COL_RCODE, AliAcTableMap::COL_MCODE, AliAcTableMap::COL_NAME_T, AliAcTableMap::COL_MPOSI, AliAcTableMap::COL_UPA_CODE, AliAcTableMap::COL_UPA_NAME, AliAcTableMap::COL_BPOSI, AliAcTableMap::COL_LEVEL, AliAcTableMap::COL_GEN, AliAcTableMap::COL_BTYPE, AliAcTableMap::COL_PV, AliAcTableMap::COL_PERCER, AliAcTableMap::COL_TOTAL, AliAcTableMap::COL_FDATE, AliAcTableMap::COL_TDATE, AliAcTableMap::COL_POS_CUR, AliAcTableMap::COL_TYPE, AliAcTableMap::COL_CRATE, AliAcTableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'name_t', 'mposi', 'upa_code', 'upa_name', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', 'fdate', 'tdate', 'pos_cur', 'type', 'crate', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameT' => 3, 'Mposi' => 4, 'UpaCode' => 5, 'UpaName' => 6, 'Bposi' => 7, 'Level' => 8, 'Gen' => 9, 'Btype' => 10, 'Pv' => 11, 'Percer' => 12, 'Total' => 13, 'Fdate' => 14, 'Tdate' => 15, 'PosCur' => 16, 'Type' => 17, 'Crate' => 18, 'Locationbase' => 19, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'nameT' => 3, 'mposi' => 4, 'upaCode' => 5, 'upaName' => 6, 'bposi' => 7, 'level' => 8, 'gen' => 9, 'btype' => 10, 'pv' => 11, 'percer' => 12, 'total' => 13, 'fdate' => 14, 'tdate' => 15, 'posCur' => 16, 'type' => 17, 'crate' => 18, 'locationbase' => 19, ),
        self::TYPE_COLNAME       => array(AliAcTableMap::COL_AID => 0, AliAcTableMap::COL_RCODE => 1, AliAcTableMap::COL_MCODE => 2, AliAcTableMap::COL_NAME_T => 3, AliAcTableMap::COL_MPOSI => 4, AliAcTableMap::COL_UPA_CODE => 5, AliAcTableMap::COL_UPA_NAME => 6, AliAcTableMap::COL_BPOSI => 7, AliAcTableMap::COL_LEVEL => 8, AliAcTableMap::COL_GEN => 9, AliAcTableMap::COL_BTYPE => 10, AliAcTableMap::COL_PV => 11, AliAcTableMap::COL_PERCER => 12, AliAcTableMap::COL_TOTAL => 13, AliAcTableMap::COL_FDATE => 14, AliAcTableMap::COL_TDATE => 15, AliAcTableMap::COL_POS_CUR => 16, AliAcTableMap::COL_TYPE => 17, AliAcTableMap::COL_CRATE => 18, AliAcTableMap::COL_LOCATIONBASE => 19, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'name_t' => 3, 'mposi' => 4, 'upa_code' => 5, 'upa_name' => 6, 'bposi' => 7, 'level' => 8, 'gen' => 9, 'btype' => 10, 'pv' => 11, 'percer' => 12, 'total' => 13, 'fdate' => 14, 'tdate' => 15, 'pos_cur' => 16, 'type' => 17, 'crate' => 18, 'locationbase' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('ali_ac');
        $this->setPhpName('AliAc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliAc');
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
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliAcTableMap::CLASS_DEFAULT : AliAcTableMap::OM_CLASS;
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
     * @return array           (AliAc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliAcTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliAcTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliAcTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliAcTableMap::OM_CLASS;
            /** @var AliAc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliAcTableMap::addInstanceToPool($obj, $key);
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
            $key = AliAcTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliAcTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliAc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliAcTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliAcTableMap::COL_AID);
            $criteria->addSelectColumn(AliAcTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliAcTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliAcTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliAcTableMap::COL_MPOSI);
            $criteria->addSelectColumn(AliAcTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliAcTableMap::COL_UPA_NAME);
            $criteria->addSelectColumn(AliAcTableMap::COL_BPOSI);
            $criteria->addSelectColumn(AliAcTableMap::COL_LEVEL);
            $criteria->addSelectColumn(AliAcTableMap::COL_GEN);
            $criteria->addSelectColumn(AliAcTableMap::COL_BTYPE);
            $criteria->addSelectColumn(AliAcTableMap::COL_PV);
            $criteria->addSelectColumn(AliAcTableMap::COL_PERCER);
            $criteria->addSelectColumn(AliAcTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliAcTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliAcTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliAcTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliAcTableMap::COL_TYPE);
            $criteria->addSelectColumn(AliAcTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliAcTableMap::COL_LOCATIONBASE);
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
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.type');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliAcTableMap::DATABASE_NAME)->getTable(AliAcTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliAcTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliAcTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliAcTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliAc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliAc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAcTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliAc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliAcTableMap::DATABASE_NAME);
            $criteria->add(AliAcTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliAcQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliAcTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliAcTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ac table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliAcQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliAc or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliAc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAcTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliAc object
        }

        if ($criteria->containsKey(AliAcTableMap::COL_AID) && $criteria->keyContainsValue(AliAcTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliAcTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliAcQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliAcTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliAcTableMap::buildTableMap();
