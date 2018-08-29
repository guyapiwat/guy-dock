<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliPc;
use CciOrm\CciOrm\AliPcQuery;
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
 * This class defines the structure of the 'ali_pc' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliPcTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliPcTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_pc';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliPc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliPc';

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
     * the column name for the aid field
     */
    const COL_AID = 'ali_pc.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_pc.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_pc.mcode';

    /**
     * the column name for the mposi field
     */
    const COL_MPOSI = 'ali_pc.mposi';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_pc.upa_code';

    /**
     * the column name for the bposi field
     */
    const COL_BPOSI = 'ali_pc.bposi';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'ali_pc.level';

    /**
     * the column name for the gen field
     */
    const COL_GEN = 'ali_pc.gen';

    /**
     * the column name for the btype field
     */
    const COL_BTYPE = 'ali_pc.btype';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_pc.pv';

    /**
     * the column name for the percer field
     */
    const COL_PERCER = 'ali_pc.percer';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_pc.total';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'Mposi', 'UpaCode', 'Bposi', 'Level', 'Gen', 'Btype', 'Pv', 'Percer', 'Total', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'mposi', 'upaCode', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', ),
        self::TYPE_COLNAME       => array(AliPcTableMap::COL_AID, AliPcTableMap::COL_RCODE, AliPcTableMap::COL_MCODE, AliPcTableMap::COL_MPOSI, AliPcTableMap::COL_UPA_CODE, AliPcTableMap::COL_BPOSI, AliPcTableMap::COL_LEVEL, AliPcTableMap::COL_GEN, AliPcTableMap::COL_BTYPE, AliPcTableMap::COL_PV, AliPcTableMap::COL_PERCER, AliPcTableMap::COL_TOTAL, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'mposi', 'upa_code', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'Mposi' => 3, 'UpaCode' => 4, 'Bposi' => 5, 'Level' => 6, 'Gen' => 7, 'Btype' => 8, 'Pv' => 9, 'Percer' => 10, 'Total' => 11, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'mposi' => 3, 'upaCode' => 4, 'bposi' => 5, 'level' => 6, 'gen' => 7, 'btype' => 8, 'pv' => 9, 'percer' => 10, 'total' => 11, ),
        self::TYPE_COLNAME       => array(AliPcTableMap::COL_AID => 0, AliPcTableMap::COL_RCODE => 1, AliPcTableMap::COL_MCODE => 2, AliPcTableMap::COL_MPOSI => 3, AliPcTableMap::COL_UPA_CODE => 4, AliPcTableMap::COL_BPOSI => 5, AliPcTableMap::COL_LEVEL => 6, AliPcTableMap::COL_GEN => 7, AliPcTableMap::COL_BTYPE => 8, AliPcTableMap::COL_PV => 9, AliPcTableMap::COL_PERCER => 10, AliPcTableMap::COL_TOTAL => 11, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'mposi' => 3, 'upa_code' => 4, 'bposi' => 5, 'level' => 6, 'gen' => 7, 'btype' => 8, 'pv' => 9, 'percer' => 10, 'total' => 11, ),
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
        $this->setName('ali_pc');
        $this->setPhpName('AliPc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliPc');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliPcTableMap::CLASS_DEFAULT : AliPcTableMap::OM_CLASS;
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
     * @return array           (AliPc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliPcTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliPcTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliPcTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliPcTableMap::OM_CLASS;
            /** @var AliPc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliPcTableMap::addInstanceToPool($obj, $key);
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
            $key = AliPcTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliPcTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliPc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliPcTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliPcTableMap::COL_AID);
            $criteria->addSelectColumn(AliPcTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliPcTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliPcTableMap::COL_MPOSI);
            $criteria->addSelectColumn(AliPcTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliPcTableMap::COL_BPOSI);
            $criteria->addSelectColumn(AliPcTableMap::COL_LEVEL);
            $criteria->addSelectColumn(AliPcTableMap::COL_GEN);
            $criteria->addSelectColumn(AliPcTableMap::COL_BTYPE);
            $criteria->addSelectColumn(AliPcTableMap::COL_PV);
            $criteria->addSelectColumn(AliPcTableMap::COL_PERCER);
            $criteria->addSelectColumn(AliPcTableMap::COL_TOTAL);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliPcTableMap::DATABASE_NAME)->getTable(AliPcTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliPcTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliPcTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliPcTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliPc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliPc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPcTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliPc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliPcTableMap::DATABASE_NAME);
            $criteria->add(AliPcTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliPcQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliPcTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliPcTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_pc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliPcQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliPc or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliPc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPcTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliPc object
        }

        if ($criteria->containsKey(AliPcTableMap::COL_AID) && $criteria->keyContainsValue(AliPcTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliPcTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliPcQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliPcTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliPcTableMap::buildTableMap();