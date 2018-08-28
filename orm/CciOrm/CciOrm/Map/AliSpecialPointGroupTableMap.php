<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliSpecialPointGroup;
use CciOrm\CciOrm\AliSpecialPointGroupQuery;
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
 * This class defines the structure of the 'ali_special_point_group' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliSpecialPointGroupTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliSpecialPointGroupTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_special_point_group';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliSpecialPointGroup';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliSpecialPointGroup';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_special_point_group.id';

    /**
     * the column name for the vip_id field
     */
    const COL_VIP_ID = 'ali_special_point_group.vip_id';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_special_point_group.sadate';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_special_point_group.mcode';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_special_point_group.sa_type';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_special_point_group.tot_pv';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_special_point_group.uid';

    /**
     * the column name for the heal_mouth field
     */
    const COL_HEAL_MOUTH = 'ali_special_point_group.heal_mouth';

    /**
     * the column name for the ttime field
     */
    const COL_TTIME = 'ali_special_point_group.ttime';

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
        self::TYPE_PHPNAME       => array('Id', 'VipId', 'Sadate', 'Mcode', 'SaType', 'TotPv', 'Uid', 'HealMouth', 'Ttime', ),
        self::TYPE_CAMELNAME     => array('id', 'vipId', 'sadate', 'mcode', 'saType', 'totPv', 'uid', 'healMouth', 'ttime', ),
        self::TYPE_COLNAME       => array(AliSpecialPointGroupTableMap::COL_ID, AliSpecialPointGroupTableMap::COL_VIP_ID, AliSpecialPointGroupTableMap::COL_SADATE, AliSpecialPointGroupTableMap::COL_MCODE, AliSpecialPointGroupTableMap::COL_SA_TYPE, AliSpecialPointGroupTableMap::COL_TOT_PV, AliSpecialPointGroupTableMap::COL_UID, AliSpecialPointGroupTableMap::COL_HEAL_MOUTH, AliSpecialPointGroupTableMap::COL_TTIME, ),
        self::TYPE_FIELDNAME     => array('id', 'vip_id', 'sadate', 'mcode', 'sa_type', 'tot_pv', 'uid', 'heal_mouth', 'ttime', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'VipId' => 1, 'Sadate' => 2, 'Mcode' => 3, 'SaType' => 4, 'TotPv' => 5, 'Uid' => 6, 'HealMouth' => 7, 'Ttime' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'vipId' => 1, 'sadate' => 2, 'mcode' => 3, 'saType' => 4, 'totPv' => 5, 'uid' => 6, 'healMouth' => 7, 'ttime' => 8, ),
        self::TYPE_COLNAME       => array(AliSpecialPointGroupTableMap::COL_ID => 0, AliSpecialPointGroupTableMap::COL_VIP_ID => 1, AliSpecialPointGroupTableMap::COL_SADATE => 2, AliSpecialPointGroupTableMap::COL_MCODE => 3, AliSpecialPointGroupTableMap::COL_SA_TYPE => 4, AliSpecialPointGroupTableMap::COL_TOT_PV => 5, AliSpecialPointGroupTableMap::COL_UID => 6, AliSpecialPointGroupTableMap::COL_HEAL_MOUTH => 7, AliSpecialPointGroupTableMap::COL_TTIME => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'vip_id' => 1, 'sadate' => 2, 'mcode' => 3, 'sa_type' => 4, 'tot_pv' => 5, 'uid' => 6, 'heal_mouth' => 7, 'ttime' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('ali_special_point_group');
        $this->setPhpName('AliSpecialPointGroup');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliSpecialPointGroup');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('vip_id', 'VipId', 'INTEGER', true, 10, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 20, null);
        $this->addColumn('sa_type', 'SaType', 'CHAR', false, 2, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 10, null);
        $this->addColumn('uid', 'Uid', 'INTEGER', false, 255, null);
        $this->addColumn('heal_mouth', 'HealMouth', 'VARCHAR', false, 6, null);
        $this->addColumn('ttime', 'Ttime', 'VARCHAR', true, 100, null);
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
        return $withPrefix ? AliSpecialPointGroupTableMap::CLASS_DEFAULT : AliSpecialPointGroupTableMap::OM_CLASS;
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
     * @return array           (AliSpecialPointGroup object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliSpecialPointGroupTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliSpecialPointGroupTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliSpecialPointGroupTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliSpecialPointGroupTableMap::OM_CLASS;
            /** @var AliSpecialPointGroup $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliSpecialPointGroupTableMap::addInstanceToPool($obj, $key);
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
            $key = AliSpecialPointGroupTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliSpecialPointGroupTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliSpecialPointGroup $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliSpecialPointGroupTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_ID);
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_VIP_ID);
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_UID);
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_HEAL_MOUTH);
            $criteria->addSelectColumn(AliSpecialPointGroupTableMap::COL_TTIME);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.vip_id');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.heal_mouth');
            $criteria->addSelectColumn($alias . '.ttime');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliSpecialPointGroupTableMap::DATABASE_NAME)->getTable(AliSpecialPointGroupTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliSpecialPointGroupTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliSpecialPointGroupTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliSpecialPointGroupTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliSpecialPointGroup or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliSpecialPointGroup object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSpecialPointGroupTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliSpecialPointGroup) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliSpecialPointGroupTableMap::DATABASE_NAME);
            $criteria->add(AliSpecialPointGroupTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliSpecialPointGroupQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliSpecialPointGroupTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliSpecialPointGroupTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_special_point_group table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliSpecialPointGroupQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliSpecialPointGroup or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliSpecialPointGroup object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSpecialPointGroupTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliSpecialPointGroup object
        }

        if ($criteria->containsKey(AliSpecialPointGroupTableMap::COL_ID) && $criteria->keyContainsValue(AliSpecialPointGroupTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliSpecialPointGroupTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliSpecialPointGroupQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliSpecialPointGroupTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliSpecialPointGroupTableMap::buildTableMap();
