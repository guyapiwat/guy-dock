<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTmbonus1;
use CciOrm\CciOrm\AliTmbonus1Query;
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
 * This class defines the structure of the 'ali_tmbonus1' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTmbonus1TableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTmbonus1TableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_tmbonus1';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTmbonus1';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTmbonus1';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_tmbonus1.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_tmbonus1.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_tmbonus1.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_tmbonus1.name_t';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_tmbonus1.rcode';

    /**
     * the column name for the smallbig field
     */
    const COL_SMALLBIG = 'ali_tmbonus1.smallbig';

    /**
     * the column name for the point field
     */
    const COL_POINT = 'ali_tmbonus1.point';

    /**
     * the column name for the seats field
     */
    const COL_SEATS = 'ali_tmbonus1.seats';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_tmbonus1.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_tmbonus1.tdate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_tmbonus1.locationbase';

    /**
     * the column name for the firstseatpoint field
     */
    const COL_FIRSTSEATPOINT = 'ali_tmbonus1.firstseatpoint';

    /**
     * the column name for the secondseatpoint field
     */
    const COL_SECONDSEATPOINT = 'ali_tmbonus1.secondseatpoint';

    /**
     * the column name for the function_count field
     */
    const COL_FUNCTION_COUNT = 'ali_tmbonus1.function_count';

    /**
     * the column name for the groupvp field
     */
    const COL_GROUPVP = 'ali_tmbonus1.groupvp';

    /**
     * the column name for the couple field
     */
    const COL_COUPLE = 'ali_tmbonus1.couple';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_tmbonus1.pos_cur';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'NameF', 'NameT', 'Rcode', 'Smallbig', 'Point', 'Seats', 'Fdate', 'Tdate', 'Locationbase', 'Firstseatpoint', 'Secondseatpoint', 'FunctionCount', 'Groupvp', 'Couple', 'PosCur', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'nameF', 'nameT', 'rcode', 'smallbig', 'point', 'seats', 'fdate', 'tdate', 'locationbase', 'firstseatpoint', 'secondseatpoint', 'functionCount', 'groupvp', 'couple', 'posCur', ),
        self::TYPE_COLNAME       => array(AliTmbonus1TableMap::COL_ID, AliTmbonus1TableMap::COL_MCODE, AliTmbonus1TableMap::COL_NAME_F, AliTmbonus1TableMap::COL_NAME_T, AliTmbonus1TableMap::COL_RCODE, AliTmbonus1TableMap::COL_SMALLBIG, AliTmbonus1TableMap::COL_POINT, AliTmbonus1TableMap::COL_SEATS, AliTmbonus1TableMap::COL_FDATE, AliTmbonus1TableMap::COL_TDATE, AliTmbonus1TableMap::COL_LOCATIONBASE, AliTmbonus1TableMap::COL_FIRSTSEATPOINT, AliTmbonus1TableMap::COL_SECONDSEATPOINT, AliTmbonus1TableMap::COL_FUNCTION_COUNT, AliTmbonus1TableMap::COL_GROUPVP, AliTmbonus1TableMap::COL_COUPLE, AliTmbonus1TableMap::COL_POS_CUR, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'name_f', 'name_t', 'rcode', 'smallbig', 'point', 'seats', 'fdate', 'tdate', 'locationbase', 'firstseatpoint', 'secondseatpoint', 'function_count', 'groupvp', 'couple', 'pos_cur', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'NameF' => 2, 'NameT' => 3, 'Rcode' => 4, 'Smallbig' => 5, 'Point' => 6, 'Seats' => 7, 'Fdate' => 8, 'Tdate' => 9, 'Locationbase' => 10, 'Firstseatpoint' => 11, 'Secondseatpoint' => 12, 'FunctionCount' => 13, 'Groupvp' => 14, 'Couple' => 15, 'PosCur' => 16, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'nameF' => 2, 'nameT' => 3, 'rcode' => 4, 'smallbig' => 5, 'point' => 6, 'seats' => 7, 'fdate' => 8, 'tdate' => 9, 'locationbase' => 10, 'firstseatpoint' => 11, 'secondseatpoint' => 12, 'functionCount' => 13, 'groupvp' => 14, 'couple' => 15, 'posCur' => 16, ),
        self::TYPE_COLNAME       => array(AliTmbonus1TableMap::COL_ID => 0, AliTmbonus1TableMap::COL_MCODE => 1, AliTmbonus1TableMap::COL_NAME_F => 2, AliTmbonus1TableMap::COL_NAME_T => 3, AliTmbonus1TableMap::COL_RCODE => 4, AliTmbonus1TableMap::COL_SMALLBIG => 5, AliTmbonus1TableMap::COL_POINT => 6, AliTmbonus1TableMap::COL_SEATS => 7, AliTmbonus1TableMap::COL_FDATE => 8, AliTmbonus1TableMap::COL_TDATE => 9, AliTmbonus1TableMap::COL_LOCATIONBASE => 10, AliTmbonus1TableMap::COL_FIRSTSEATPOINT => 11, AliTmbonus1TableMap::COL_SECONDSEATPOINT => 12, AliTmbonus1TableMap::COL_FUNCTION_COUNT => 13, AliTmbonus1TableMap::COL_GROUPVP => 14, AliTmbonus1TableMap::COL_COUPLE => 15, AliTmbonus1TableMap::COL_POS_CUR => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'name_f' => 2, 'name_t' => 3, 'rcode' => 4, 'smallbig' => 5, 'point' => 6, 'seats' => 7, 'fdate' => 8, 'tdate' => 9, 'locationbase' => 10, 'firstseatpoint' => 11, 'secondseatpoint' => 12, 'function_count' => 13, 'groupvp' => 14, 'couple' => 15, 'pos_cur' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('ali_tmbonus1');
        $this->setPhpName('AliTmbonus1');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTmbonus1');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('smallbig', 'Smallbig', 'INTEGER', true, null, null);
        $this->addColumn('point', 'Point', 'DECIMAL', true, 15, null);
        $this->addColumn('seats', 'Seats', 'INTEGER', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('firstseatpoint', 'Firstseatpoint', 'DECIMAL', true, 15, null);
        $this->addColumn('secondseatpoint', 'Secondseatpoint', 'DECIMAL', true, 15, null);
        $this->addColumn('function_count', 'FunctionCount', 'INTEGER', true, null, null);
        $this->addColumn('groupvp', 'Groupvp', 'INTEGER', true, null, null);
        $this->addColumn('couple', 'Couple', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliTmbonus1TableMap::CLASS_DEFAULT : AliTmbonus1TableMap::OM_CLASS;
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
     * @return array           (AliTmbonus1 object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTmbonus1TableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTmbonus1TableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTmbonus1TableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTmbonus1TableMap::OM_CLASS;
            /** @var AliTmbonus1 $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTmbonus1TableMap::addInstanceToPool($obj, $key);
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
            $key = AliTmbonus1TableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTmbonus1TableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTmbonus1 $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTmbonus1TableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_ID);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_RCODE);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_SMALLBIG);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_POINT);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_SEATS);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_FDATE);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_TDATE);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_FIRSTSEATPOINT);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_SECONDSEATPOINT);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_FUNCTION_COUNT);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_GROUPVP);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_COUPLE);
            $criteria->addSelectColumn(AliTmbonus1TableMap::COL_POS_CUR);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.smallbig');
            $criteria->addSelectColumn($alias . '.point');
            $criteria->addSelectColumn($alias . '.seats');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.firstseatpoint');
            $criteria->addSelectColumn($alias . '.secondseatpoint');
            $criteria->addSelectColumn($alias . '.function_count');
            $criteria->addSelectColumn($alias . '.groupvp');
            $criteria->addSelectColumn($alias . '.couple');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTmbonus1TableMap::DATABASE_NAME)->getTable(AliTmbonus1TableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTmbonus1TableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTmbonus1TableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTmbonus1TableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTmbonus1 or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTmbonus1 object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonus1TableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTmbonus1) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTmbonus1TableMap::DATABASE_NAME);
            $criteria->add(AliTmbonus1TableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliTmbonus1Query::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTmbonus1TableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTmbonus1TableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_tmbonus1 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTmbonus1Query::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTmbonus1 or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTmbonus1 object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonus1TableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTmbonus1 object
        }

        if ($criteria->containsKey(AliTmbonus1TableMap::COL_ID) && $criteria->keyContainsValue(AliTmbonus1TableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTmbonus1TableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliTmbonus1Query::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTmbonus1TableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTmbonus1TableMap::buildTableMap();
