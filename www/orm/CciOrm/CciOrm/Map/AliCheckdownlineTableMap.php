<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliCheckdownline;
use CciOrm\CciOrm\AliCheckdownlineQuery;
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
 * This class defines the structure of the 'ali_checkdownline' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliCheckdownlineTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliCheckdownlineTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_checkdownline';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliCheckdownline';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliCheckdownline';

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
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_checkdownline.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_checkdownline.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_checkdownline.total';

    /**
     * the column name for the fast field
     */
    const COL_FAST = 'ali_checkdownline.fast';

    /**
     * the column name for the weakstrong field
     */
    const COL_WEAKSTRONG = 'ali_checkdownline.weakstrong';

    /**
     * the column name for the matching field
     */
    const COL_MATCHING = 'ali_checkdownline.matching';

    /**
     * the column name for the star field
     */
    const COL_STAR = 'ali_checkdownline.star';

    /**
     * the column name for the onetime field
     */
    const COL_ONETIME = 'ali_checkdownline.onetime';

    /**
     * the column name for the alltotal field
     */
    const COL_ALLTOTAL = 'ali_checkdownline.alltotal';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_checkdownline.upa_code';

    /**
     * the column name for the lv field
     */
    const COL_LV = 'ali_checkdownline.lv';

    /**
     * the column name for the lr field
     */
    const COL_LR = 'ali_checkdownline.lr';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_checkdownline.mdate';

    /**
     * the column name for the id_card field
     */
    const COL_ID_CARD = 'ali_checkdownline.id_card';

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
        self::TYPE_PHPNAME       => array('Mcode', 'NameT', 'Total', 'Fast', 'Weakstrong', 'Matching', 'Star', 'Onetime', 'Alltotal', 'UpaCode', 'Lv', 'Lr', 'Mdate', 'IdCard', ),
        self::TYPE_CAMELNAME     => array('mcode', 'nameT', 'total', 'fast', 'weakstrong', 'matching', 'star', 'onetime', 'alltotal', 'upaCode', 'lv', 'lr', 'mdate', 'idCard', ),
        self::TYPE_COLNAME       => array(AliCheckdownlineTableMap::COL_MCODE, AliCheckdownlineTableMap::COL_NAME_T, AliCheckdownlineTableMap::COL_TOTAL, AliCheckdownlineTableMap::COL_FAST, AliCheckdownlineTableMap::COL_WEAKSTRONG, AliCheckdownlineTableMap::COL_MATCHING, AliCheckdownlineTableMap::COL_STAR, AliCheckdownlineTableMap::COL_ONETIME, AliCheckdownlineTableMap::COL_ALLTOTAL, AliCheckdownlineTableMap::COL_UPA_CODE, AliCheckdownlineTableMap::COL_LV, AliCheckdownlineTableMap::COL_LR, AliCheckdownlineTableMap::COL_MDATE, AliCheckdownlineTableMap::COL_ID_CARD, ),
        self::TYPE_FIELDNAME     => array('mcode', 'name_t', 'total', 'fast', 'weakstrong', 'matching', 'star', 'onetime', 'alltotal', 'upa_code', 'lv', 'lr', 'mdate', 'id_card', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Mcode' => 0, 'NameT' => 1, 'Total' => 2, 'Fast' => 3, 'Weakstrong' => 4, 'Matching' => 5, 'Star' => 6, 'Onetime' => 7, 'Alltotal' => 8, 'UpaCode' => 9, 'Lv' => 10, 'Lr' => 11, 'Mdate' => 12, 'IdCard' => 13, ),
        self::TYPE_CAMELNAME     => array('mcode' => 0, 'nameT' => 1, 'total' => 2, 'fast' => 3, 'weakstrong' => 4, 'matching' => 5, 'star' => 6, 'onetime' => 7, 'alltotal' => 8, 'upaCode' => 9, 'lv' => 10, 'lr' => 11, 'mdate' => 12, 'idCard' => 13, ),
        self::TYPE_COLNAME       => array(AliCheckdownlineTableMap::COL_MCODE => 0, AliCheckdownlineTableMap::COL_NAME_T => 1, AliCheckdownlineTableMap::COL_TOTAL => 2, AliCheckdownlineTableMap::COL_FAST => 3, AliCheckdownlineTableMap::COL_WEAKSTRONG => 4, AliCheckdownlineTableMap::COL_MATCHING => 5, AliCheckdownlineTableMap::COL_STAR => 6, AliCheckdownlineTableMap::COL_ONETIME => 7, AliCheckdownlineTableMap::COL_ALLTOTAL => 8, AliCheckdownlineTableMap::COL_UPA_CODE => 9, AliCheckdownlineTableMap::COL_LV => 10, AliCheckdownlineTableMap::COL_LR => 11, AliCheckdownlineTableMap::COL_MDATE => 12, AliCheckdownlineTableMap::COL_ID_CARD => 13, ),
        self::TYPE_FIELDNAME     => array('mcode' => 0, 'name_t' => 1, 'total' => 2, 'fast' => 3, 'weakstrong' => 4, 'matching' => 5, 'star' => 6, 'onetime' => 7, 'alltotal' => 8, 'upa_code' => 9, 'lv' => 10, 'lr' => 11, 'mdate' => 12, 'id_card' => 13, ),
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
        $this->setName('ali_checkdownline');
        $this->setPhpName('AliCheckdownline');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliCheckdownline');
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
        $this->addColumn('id_card', 'IdCard', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliCheckdownlineTableMap::CLASS_DEFAULT : AliCheckdownlineTableMap::OM_CLASS;
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
     * @return array           (AliCheckdownline object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliCheckdownlineTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliCheckdownlineTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliCheckdownlineTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliCheckdownlineTableMap::OM_CLASS;
            /** @var AliCheckdownline $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliCheckdownlineTableMap::addInstanceToPool($obj, $key);
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
            $key = AliCheckdownlineTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliCheckdownlineTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliCheckdownline $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliCheckdownlineTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_FAST);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_WEAKSTRONG);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_MATCHING);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_STAR);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_ONETIME);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_ALLTOTAL);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_LV);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_LR);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliCheckdownlineTableMap::COL_ID_CARD);
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
            $criteria->addSelectColumn($alias . '.id_card');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliCheckdownlineTableMap::DATABASE_NAME)->getTable(AliCheckdownlineTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliCheckdownlineTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliCheckdownlineTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliCheckdownlineTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliCheckdownline or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliCheckdownline object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCheckdownlineTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliCheckdownline) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The AliCheckdownline object has no primary key');
        }

        $query = AliCheckdownlineQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliCheckdownlineTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliCheckdownlineTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_checkdownline table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliCheckdownlineQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliCheckdownline or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliCheckdownline object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCheckdownlineTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliCheckdownline object
        }


        // Set the correct dbName
        $query = AliCheckdownlineQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliCheckdownlineTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliCheckdownlineTableMap::buildTableMap();
