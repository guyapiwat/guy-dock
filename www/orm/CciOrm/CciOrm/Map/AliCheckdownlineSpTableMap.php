<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliCheckdownlineSp;
use CciOrm\CciOrm\AliCheckdownlineSpQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'ali_checkdownline_sp' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliCheckdownlineSpTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliCheckdownlineSpTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_checkdownline_sp';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliCheckdownlineSp';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliCheckdownlineSp';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_checkdownline_sp.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_checkdownline_sp.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_checkdownline_sp.total';

    /**
     * the column name for the fast field
     */
    const COL_FAST = 'ali_checkdownline_sp.fast';

    /**
     * the column name for the weakstrong field
     */
    const COL_WEAKSTRONG = 'ali_checkdownline_sp.weakstrong';

    /**
     * the column name for the matching field
     */
    const COL_MATCHING = 'ali_checkdownline_sp.matching';

    /**
     * the column name for the star field
     */
    const COL_STAR = 'ali_checkdownline_sp.star';

    /**
     * the column name for the onetime field
     */
    const COL_ONETIME = 'ali_checkdownline_sp.onetime';

    /**
     * the column name for the alltotal field
     */
    const COL_ALLTOTAL = 'ali_checkdownline_sp.alltotal';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_checkdownline_sp.upa_code';

    /**
     * the column name for the lv field
     */
    const COL_LV = 'ali_checkdownline_sp.lv';

    /**
     * the column name for the lr field
     */
    const COL_LR = 'ali_checkdownline_sp.lr';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_checkdownline_sp.mdate';

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
        self::TYPE_PHPNAME       => array('Mcode', 'NameT', 'Total', 'Fast', 'Weakstrong', 'Matching', 'Star', 'Onetime', 'Alltotal', 'UpaCode', 'Lv', 'Lr', 'Mdate', ),
        self::TYPE_CAMELNAME     => array('mcode', 'nameT', 'total', 'fast', 'weakstrong', 'matching', 'star', 'onetime', 'alltotal', 'upaCode', 'lv', 'lr', 'mdate', ),
        self::TYPE_COLNAME       => array(AliCheckdownlineSpTableMap::COL_MCODE, AliCheckdownlineSpTableMap::COL_NAME_T, AliCheckdownlineSpTableMap::COL_TOTAL, AliCheckdownlineSpTableMap::COL_FAST, AliCheckdownlineSpTableMap::COL_WEAKSTRONG, AliCheckdownlineSpTableMap::COL_MATCHING, AliCheckdownlineSpTableMap::COL_STAR, AliCheckdownlineSpTableMap::COL_ONETIME, AliCheckdownlineSpTableMap::COL_ALLTOTAL, AliCheckdownlineSpTableMap::COL_UPA_CODE, AliCheckdownlineSpTableMap::COL_LV, AliCheckdownlineSpTableMap::COL_LR, AliCheckdownlineSpTableMap::COL_MDATE, ),
        self::TYPE_FIELDNAME     => array('mcode', 'name_t', 'total', 'fast', 'weakstrong', 'matching', 'star', 'onetime', 'alltotal', 'upa_code', 'lv', 'lr', 'mdate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Mcode' => 0, 'NameT' => 1, 'Total' => 2, 'Fast' => 3, 'Weakstrong' => 4, 'Matching' => 5, 'Star' => 6, 'Onetime' => 7, 'Alltotal' => 8, 'UpaCode' => 9, 'Lv' => 10, 'Lr' => 11, 'Mdate' => 12, ),
        self::TYPE_CAMELNAME     => array('mcode' => 0, 'nameT' => 1, 'total' => 2, 'fast' => 3, 'weakstrong' => 4, 'matching' => 5, 'star' => 6, 'onetime' => 7, 'alltotal' => 8, 'upaCode' => 9, 'lv' => 10, 'lr' => 11, 'mdate' => 12, ),
        self::TYPE_COLNAME       => array(AliCheckdownlineSpTableMap::COL_MCODE => 0, AliCheckdownlineSpTableMap::COL_NAME_T => 1, AliCheckdownlineSpTableMap::COL_TOTAL => 2, AliCheckdownlineSpTableMap::COL_FAST => 3, AliCheckdownlineSpTableMap::COL_WEAKSTRONG => 4, AliCheckdownlineSpTableMap::COL_MATCHING => 5, AliCheckdownlineSpTableMap::COL_STAR => 6, AliCheckdownlineSpTableMap::COL_ONETIME => 7, AliCheckdownlineSpTableMap::COL_ALLTOTAL => 8, AliCheckdownlineSpTableMap::COL_UPA_CODE => 9, AliCheckdownlineSpTableMap::COL_LV => 10, AliCheckdownlineSpTableMap::COL_LR => 11, AliCheckdownlineSpTableMap::COL_MDATE => 12, ),
        self::TYPE_FIELDNAME     => array('mcode' => 0, 'name_t' => 1, 'total' => 2, 'fast' => 3, 'weakstrong' => 4, 'matching' => 5, 'star' => 6, 'onetime' => 7, 'alltotal' => 8, 'upa_code' => 9, 'lv' => 10, 'lr' => 11, 'mdate' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('ali_checkdownline_sp');
        $this->setPhpName('AliCheckdownlineSp');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliCheckdownlineSp');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('fast', 'Fast', 'DECIMAL', true, 15, null);
        $this->addColumn('weakstrong', 'Weakstrong', 'DECIMAL', true, 15, null);
        $this->addColumn('matching', 'Matching', 'DECIMAL', true, 15, null);
        $this->addColumn('star', 'Star', 'DECIMAL', true, 15, null);
        $this->addColumn('onetime', 'Onetime', 'DECIMAL', true, 15, null);
        $this->addColumn('alltotal', 'Alltotal', 'DECIMAL', true, 15, null);
        $this->addColumn('upa_code', 'UpaCode', 'VARCHAR', true, 255, null);
        $this->addColumn('lv', 'Lv', 'INTEGER', true, null, null);
        $this->addColumn('lr', 'Lr', 'INTEGER', true, null, null);
        $this->addColumn('mdate', 'Mdate', 'DATE', false, null, null);
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
        return null;
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
        return '';
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
        return $withPrefix ? AliCheckdownlineSpTableMap::CLASS_DEFAULT : AliCheckdownlineSpTableMap::OM_CLASS;
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
     * @return array           (AliCheckdownlineSp object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliCheckdownlineSpTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliCheckdownlineSpTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliCheckdownlineSpTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliCheckdownlineSpTableMap::OM_CLASS;
            /** @var AliCheckdownlineSp $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliCheckdownlineSpTableMap::addInstanceToPool($obj, $key);
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
            $key = AliCheckdownlineSpTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliCheckdownlineSpTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliCheckdownlineSp $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliCheckdownlineSpTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_FAST);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_WEAKSTRONG);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_MATCHING);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_STAR);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_ONETIME);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_ALLTOTAL);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_LV);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_LR);
            $criteria->addSelectColumn(AliCheckdownlineSpTableMap::COL_MDATE);
        } else {
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.fast');
            $criteria->addSelectColumn($alias . '.weakstrong');
            $criteria->addSelectColumn($alias . '.matching');
            $criteria->addSelectColumn($alias . '.star');
            $criteria->addSelectColumn($alias . '.onetime');
            $criteria->addSelectColumn($alias . '.alltotal');
            $criteria->addSelectColumn($alias . '.upa_code');
            $criteria->addSelectColumn($alias . '.lv');
            $criteria->addSelectColumn($alias . '.lr');
            $criteria->addSelectColumn($alias . '.mdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliCheckdownlineSpTableMap::DATABASE_NAME)->getTable(AliCheckdownlineSpTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliCheckdownlineSpTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliCheckdownlineSpTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliCheckdownlineSpTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliCheckdownlineSp or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliCheckdownlineSp object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCheckdownlineSpTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliCheckdownlineSp) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The AliCheckdownlineSp object has no primary key');
        }

        $query = AliCheckdownlineSpQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliCheckdownlineSpTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliCheckdownlineSpTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_checkdownline_sp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliCheckdownlineSpQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliCheckdownlineSp or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliCheckdownlineSp object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCheckdownlineSpTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliCheckdownlineSp object
        }


        // Set the correct dbName
        $query = AliCheckdownlineSpQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliCheckdownlineSpTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliCheckdownlineSpTableMap::buildTableMap();
