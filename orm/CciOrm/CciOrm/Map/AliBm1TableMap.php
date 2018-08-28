<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliBm1;
use CciOrm\CciOrm\AliBm1Query;
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
 * This class defines the structure of the 'ali_bm1' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliBm1TableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliBm1TableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_bm1';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliBm1';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliBm1';

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
    const COL_ID = 'ali_bm1.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_bm1.rcode';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_bm1.sano';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_bm1.mcode';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_bm1.upa_code';

    /**
     * the column name for the lr field
     */
    const COL_LR = 'ali_bm1.lr';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'ali_bm1.level';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_bm1.pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_bm1.bv';

    /**
     * the column name for the gpv field
     */
    const COL_GPV = 'ali_bm1.gpv';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_bm1.mpos';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_bm1.sa_type';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_bm1.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_bm1.tdate';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Sano', 'Mcode', 'UpaCode', 'Lr', 'Level', 'Pv', 'Bv', 'Gpv', 'Mpos', 'SaType', 'Fdate', 'Tdate', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'sano', 'mcode', 'upaCode', 'lr', 'level', 'pv', 'bv', 'gpv', 'mpos', 'saType', 'fdate', 'tdate', ),
        self::TYPE_COLNAME       => array(AliBm1TableMap::COL_ID, AliBm1TableMap::COL_RCODE, AliBm1TableMap::COL_SANO, AliBm1TableMap::COL_MCODE, AliBm1TableMap::COL_UPA_CODE, AliBm1TableMap::COL_LR, AliBm1TableMap::COL_LEVEL, AliBm1TableMap::COL_PV, AliBm1TableMap::COL_BV, AliBm1TableMap::COL_GPV, AliBm1TableMap::COL_MPOS, AliBm1TableMap::COL_SA_TYPE, AliBm1TableMap::COL_FDATE, AliBm1TableMap::COL_TDATE, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'sano', 'mcode', 'upa_code', 'lr', 'level', 'pv', 'bv', 'gpv', 'mpos', 'sa_type', 'fdate', 'tdate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Sano' => 2, 'Mcode' => 3, 'UpaCode' => 4, 'Lr' => 5, 'Level' => 6, 'Pv' => 7, 'Bv' => 8, 'Gpv' => 9, 'Mpos' => 10, 'SaType' => 11, 'Fdate' => 12, 'Tdate' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'sano' => 2, 'mcode' => 3, 'upaCode' => 4, 'lr' => 5, 'level' => 6, 'pv' => 7, 'bv' => 8, 'gpv' => 9, 'mpos' => 10, 'saType' => 11, 'fdate' => 12, 'tdate' => 13, ),
        self::TYPE_COLNAME       => array(AliBm1TableMap::COL_ID => 0, AliBm1TableMap::COL_RCODE => 1, AliBm1TableMap::COL_SANO => 2, AliBm1TableMap::COL_MCODE => 3, AliBm1TableMap::COL_UPA_CODE => 4, AliBm1TableMap::COL_LR => 5, AliBm1TableMap::COL_LEVEL => 6, AliBm1TableMap::COL_PV => 7, AliBm1TableMap::COL_BV => 8, AliBm1TableMap::COL_GPV => 9, AliBm1TableMap::COL_MPOS => 10, AliBm1TableMap::COL_SA_TYPE => 11, AliBm1TableMap::COL_FDATE => 12, AliBm1TableMap::COL_TDATE => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'sano' => 2, 'mcode' => 3, 'upa_code' => 4, 'lr' => 5, 'level' => 6, 'pv' => 7, 'bv' => 8, 'gpv' => 9, 'mpos' => 10, 'sa_type' => 11, 'fdate' => 12, 'tdate' => 13, ),
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
        $this->setName('ali_bm1');
        $this->setPhpName('AliBm1');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliBm1');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 50, '0');
        $this->addColumn('mcode', 'Mcode', 'CHAR', true, 255, null);
        $this->addColumn('upa_code', 'UpaCode', 'CHAR', false, 255, null);
        $this->addColumn('lr', 'Lr', 'INTEGER', false, 10, null);
        $this->addColumn('level', 'Level', 'INTEGER', true, 10, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', false, 15, 0);
        $this->addColumn('bv', 'Bv', 'DECIMAL', true, 15, null);
        $this->addColumn('gpv', 'Gpv', 'DECIMAL', false, 15, 0);
        $this->addColumn('mpos', 'Mpos', 'CHAR', true, 10, null);
        $this->addColumn('sa_type', 'SaType', 'CHAR', true, 10, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
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
        return $withPrefix ? AliBm1TableMap::CLASS_DEFAULT : AliBm1TableMap::OM_CLASS;
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
     * @return array           (AliBm1 object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliBm1TableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliBm1TableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliBm1TableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliBm1TableMap::OM_CLASS;
            /** @var AliBm1 $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliBm1TableMap::addInstanceToPool($obj, $key);
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
            $key = AliBm1TableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliBm1TableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliBm1 $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliBm1TableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliBm1TableMap::COL_ID);
            $criteria->addSelectColumn(AliBm1TableMap::COL_RCODE);
            $criteria->addSelectColumn(AliBm1TableMap::COL_SANO);
            $criteria->addSelectColumn(AliBm1TableMap::COL_MCODE);
            $criteria->addSelectColumn(AliBm1TableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliBm1TableMap::COL_LR);
            $criteria->addSelectColumn(AliBm1TableMap::COL_LEVEL);
            $criteria->addSelectColumn(AliBm1TableMap::COL_PV);
            $criteria->addSelectColumn(AliBm1TableMap::COL_BV);
            $criteria->addSelectColumn(AliBm1TableMap::COL_GPV);
            $criteria->addSelectColumn(AliBm1TableMap::COL_MPOS);
            $criteria->addSelectColumn(AliBm1TableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliBm1TableMap::COL_FDATE);
            $criteria->addSelectColumn(AliBm1TableMap::COL_TDATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.upa_code');
            $criteria->addSelectColumn($alias . '.lr');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.bv');
            $criteria->addSelectColumn($alias . '.gpv');
            $criteria->addSelectColumn($alias . '.mpos');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliBm1TableMap::DATABASE_NAME)->getTable(AliBm1TableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliBm1TableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliBm1TableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliBm1TableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliBm1 or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliBm1 object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBm1TableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliBm1) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliBm1TableMap::DATABASE_NAME);
            $criteria->add(AliBm1TableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliBm1Query::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliBm1TableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliBm1TableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_bm1 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliBm1Query::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliBm1 or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliBm1 object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBm1TableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliBm1 object
        }

        if ($criteria->containsKey(AliBm1TableMap::COL_ID) && $criteria->keyContainsValue(AliBm1TableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliBm1TableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliBm1Query::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliBm1TableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliBm1TableMap::buildTableMap();
