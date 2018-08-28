<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliGmbonus;
use CciOrm\CciOrm\AliGmbonusQuery;
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
 * This class defines the structure of the 'ali_gmbonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliGmbonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliGmbonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_gmbonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliGmbonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliGmbonus';

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
     * the column name for the id field
     */
    const COL_ID = 'ali_gmbonus.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_gmbonus.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_gmbonus.name_t';

    /**
     * the column name for the fast_bonus field
     */
    const COL_FAST_BONUS = 'ali_gmbonus.fast_bonus';

    /**
     * the column name for the cycle_bonus field
     */
    const COL_CYCLE_BONUS = 'ali_gmbonus.cycle_bonus';

    /**
     * the column name for the matching_bonus field
     */
    const COL_MATCHING_BONUS = 'ali_gmbonus.matching_bonus';

    /**
     * the column name for the key_bonus field
     */
    const COL_KEY_BONUS = 'ali_gmbonus.key_bonus';

    /**
     * the column name for the autoship field
     */
    const COL_AUTOSHIP = 'ali_gmbonus.autoship';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_gmbonus.rcode';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_gmbonus.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_gmbonus.tdate';

    /**
     * the column name for the beatoship field
     */
    const COL_BEATOSHIP = 'ali_gmbonus.beatoship';

    /**
     * the column name for the bvoucher field
     */
    const COL_BVOUCHER = 'ali_gmbonus.bvoucher';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'NameT', 'FastBonus', 'CycleBonus', 'MatchingBonus', 'KeyBonus', 'Autoship', 'Rcode', 'Fdate', 'Tdate', 'Beatoship', 'Bvoucher', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'nameT', 'fastBonus', 'cycleBonus', 'matchingBonus', 'keyBonus', 'autoship', 'rcode', 'fdate', 'tdate', 'beatoship', 'bvoucher', ),
        self::TYPE_COLNAME       => array(AliGmbonusTableMap::COL_ID, AliGmbonusTableMap::COL_MCODE, AliGmbonusTableMap::COL_NAME_T, AliGmbonusTableMap::COL_FAST_BONUS, AliGmbonusTableMap::COL_CYCLE_BONUS, AliGmbonusTableMap::COL_MATCHING_BONUS, AliGmbonusTableMap::COL_KEY_BONUS, AliGmbonusTableMap::COL_AUTOSHIP, AliGmbonusTableMap::COL_RCODE, AliGmbonusTableMap::COL_FDATE, AliGmbonusTableMap::COL_TDATE, AliGmbonusTableMap::COL_BEATOSHIP, AliGmbonusTableMap::COL_BVOUCHER, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'name_t', 'fast_bonus', 'cycle_bonus', 'matching_bonus', 'key_bonus', 'autoship', 'rcode', 'fdate', 'tdate', 'beatoship', 'bvoucher', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'NameT' => 2, 'FastBonus' => 3, 'CycleBonus' => 4, 'MatchingBonus' => 5, 'KeyBonus' => 6, 'Autoship' => 7, 'Rcode' => 8, 'Fdate' => 9, 'Tdate' => 10, 'Beatoship' => 11, 'Bvoucher' => 12, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'nameT' => 2, 'fastBonus' => 3, 'cycleBonus' => 4, 'matchingBonus' => 5, 'keyBonus' => 6, 'autoship' => 7, 'rcode' => 8, 'fdate' => 9, 'tdate' => 10, 'beatoship' => 11, 'bvoucher' => 12, ),
        self::TYPE_COLNAME       => array(AliGmbonusTableMap::COL_ID => 0, AliGmbonusTableMap::COL_MCODE => 1, AliGmbonusTableMap::COL_NAME_T => 2, AliGmbonusTableMap::COL_FAST_BONUS => 3, AliGmbonusTableMap::COL_CYCLE_BONUS => 4, AliGmbonusTableMap::COL_MATCHING_BONUS => 5, AliGmbonusTableMap::COL_KEY_BONUS => 6, AliGmbonusTableMap::COL_AUTOSHIP => 7, AliGmbonusTableMap::COL_RCODE => 8, AliGmbonusTableMap::COL_FDATE => 9, AliGmbonusTableMap::COL_TDATE => 10, AliGmbonusTableMap::COL_BEATOSHIP => 11, AliGmbonusTableMap::COL_BVOUCHER => 12, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'name_t' => 2, 'fast_bonus' => 3, 'cycle_bonus' => 4, 'matching_bonus' => 5, 'key_bonus' => 6, 'autoship' => 7, 'rcode' => 8, 'fdate' => 9, 'tdate' => 10, 'beatoship' => 11, 'bvoucher' => 12, ),
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
        $this->setName('ali_gmbonus');
        $this->setPhpName('AliGmbonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliGmbonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('fast_bonus', 'FastBonus', 'DECIMAL', true, 15, null);
        $this->addColumn('cycle_bonus', 'CycleBonus', 'DECIMAL', true, 15, null);
        $this->addColumn('matching_bonus', 'MatchingBonus', 'DECIMAL', true, 15, null);
        $this->addColumn('key_bonus', 'KeyBonus', 'DECIMAL', true, 15, null);
        $this->addColumn('autoship', 'Autoship', 'DECIMAL', true, 15, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('beatoship', 'Beatoship', 'DECIMAL', true, 15, null);
        $this->addColumn('bvoucher', 'Bvoucher', 'DECIMAL', true, 15, null);
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
        return $withPrefix ? AliGmbonusTableMap::CLASS_DEFAULT : AliGmbonusTableMap::OM_CLASS;
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
     * @return array           (AliGmbonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliGmbonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliGmbonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliGmbonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliGmbonusTableMap::OM_CLASS;
            /** @var AliGmbonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliGmbonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliGmbonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliGmbonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliGmbonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliGmbonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_ID);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_FAST_BONUS);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_CYCLE_BONUS);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_MATCHING_BONUS);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_KEY_BONUS);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_AUTOSHIP);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_BEATOSHIP);
            $criteria->addSelectColumn(AliGmbonusTableMap::COL_BVOUCHER);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.fast_bonus');
            $criteria->addSelectColumn($alias . '.cycle_bonus');
            $criteria->addSelectColumn($alias . '.matching_bonus');
            $criteria->addSelectColumn($alias . '.key_bonus');
            $criteria->addSelectColumn($alias . '.autoship');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.beatoship');
            $criteria->addSelectColumn($alias . '.bvoucher');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliGmbonusTableMap::DATABASE_NAME)->getTable(AliGmbonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliGmbonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliGmbonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliGmbonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliGmbonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliGmbonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliGmbonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliGmbonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliGmbonusTableMap::DATABASE_NAME);
            $criteria->add(AliGmbonusTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliGmbonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliGmbonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliGmbonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_gmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliGmbonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliGmbonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliGmbonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliGmbonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliGmbonus object
        }

        if ($criteria->containsKey(AliGmbonusTableMap::COL_ID) && $criteria->keyContainsValue(AliGmbonusTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliGmbonusTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliGmbonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliGmbonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliGmbonusTableMap::buildTableMap();
