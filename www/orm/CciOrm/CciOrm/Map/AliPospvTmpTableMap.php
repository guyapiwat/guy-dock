<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliPospvTmp;
use CciOrm\CciOrm\AliPospvTmpQuery;
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
 * This class defines the structure of the 'ali_pospv_tmp' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliPospvTmpTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliPospvTmpTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_pospv_tmp';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliPospvTmp';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliPospvTmp';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the aid field
     */
    const COL_AID = 'ali_pospv_tmp.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_pospv_tmp.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_pospv_tmp.mcode';

    /**
     * the column name for the opos field
     */
    const COL_OPOS = 'ali_pospv_tmp.opos';

    /**
     * the column name for the npos field
     */
    const COL_NPOS = 'ali_pospv_tmp.npos';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_pospv_tmp.name_t';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_pospv_tmp.sp_code';

    /**
     * the column name for the lr field
     */
    const COL_LR = 'ali_pospv_tmp.lr';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_pospv_tmp.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_pospv_tmp.tdate';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'Opos', 'Npos', 'NameT', 'SpCode', 'Lr', 'Fdate', 'Tdate', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'opos', 'npos', 'nameT', 'spCode', 'lr', 'fdate', 'tdate', ),
        self::TYPE_COLNAME       => array(AliPospvTmpTableMap::COL_AID, AliPospvTmpTableMap::COL_RCODE, AliPospvTmpTableMap::COL_MCODE, AliPospvTmpTableMap::COL_OPOS, AliPospvTmpTableMap::COL_NPOS, AliPospvTmpTableMap::COL_NAME_T, AliPospvTmpTableMap::COL_SP_CODE, AliPospvTmpTableMap::COL_LR, AliPospvTmpTableMap::COL_FDATE, AliPospvTmpTableMap::COL_TDATE, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'opos', 'npos', 'name_t', 'sp_code', 'lr', 'fdate', 'tdate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'Opos' => 3, 'Npos' => 4, 'NameT' => 5, 'SpCode' => 6, 'Lr' => 7, 'Fdate' => 8, 'Tdate' => 9, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'opos' => 3, 'npos' => 4, 'nameT' => 5, 'spCode' => 6, 'lr' => 7, 'fdate' => 8, 'tdate' => 9, ),
        self::TYPE_COLNAME       => array(AliPospvTmpTableMap::COL_AID => 0, AliPospvTmpTableMap::COL_RCODE => 1, AliPospvTmpTableMap::COL_MCODE => 2, AliPospvTmpTableMap::COL_OPOS => 3, AliPospvTmpTableMap::COL_NPOS => 4, AliPospvTmpTableMap::COL_NAME_T => 5, AliPospvTmpTableMap::COL_SP_CODE => 6, AliPospvTmpTableMap::COL_LR => 7, AliPospvTmpTableMap::COL_FDATE => 8, AliPospvTmpTableMap::COL_TDATE => 9, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'opos' => 3, 'npos' => 4, 'name_t' => 5, 'sp_code' => 6, 'lr' => 7, 'fdate' => 8, 'tdate' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('ali_pospv_tmp');
        $this->setPhpName('AliPospvTmp');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliPospvTmp');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', false, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('opos', 'Opos', 'VARCHAR', false, 255, null);
        $this->addColumn('npos', 'Npos', 'VARCHAR', false, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', false, 255, null);
        $this->addColumn('lr', 'Lr', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliPospvTmpTableMap::CLASS_DEFAULT : AliPospvTmpTableMap::OM_CLASS;
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
     * @return array           (AliPospvTmp object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliPospvTmpTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliPospvTmpTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliPospvTmpTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliPospvTmpTableMap::OM_CLASS;
            /** @var AliPospvTmp $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliPospvTmpTableMap::addInstanceToPool($obj, $key);
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
            $key = AliPospvTmpTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliPospvTmpTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliPospvTmp $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliPospvTmpTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_AID);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_OPOS);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_NPOS);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_LR);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliPospvTmpTableMap::COL_TDATE);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.opos');
            $criteria->addSelectColumn($alias . '.npos');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.lr');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliPospvTmpTableMap::DATABASE_NAME)->getTable(AliPospvTmpTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliPospvTmpTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliPospvTmpTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliPospvTmpTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliPospvTmp or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliPospvTmp object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPospvTmpTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliPospvTmp) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliPospvTmpTableMap::DATABASE_NAME);
            $criteria->add(AliPospvTmpTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliPospvTmpQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliPospvTmpTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliPospvTmpTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_pospv_tmp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliPospvTmpQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliPospvTmp or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliPospvTmp object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPospvTmpTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliPospvTmp object
        }

        if ($criteria->containsKey(AliPospvTmpTableMap::COL_AID) && $criteria->keyContainsValue(AliPospvTmpTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliPospvTmpTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliPospvTmpQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliPospvTmpTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliPospvTmpTableMap::buildTableMap();
