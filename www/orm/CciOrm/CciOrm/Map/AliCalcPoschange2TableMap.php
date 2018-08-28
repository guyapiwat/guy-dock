<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliCalcPoschange2;
use CciOrm\CciOrm\AliCalcPoschange2Query;
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
 * This class defines the structure of the 'ali_calc_poschange2' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliCalcPoschange2TableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliCalcPoschange2TableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_calc_poschange2';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliCalcPoschange2';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliCalcPoschange2';

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
    const COL_ID = 'ali_calc_poschange2.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_calc_poschange2.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_calc_poschange2.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_calc_poschange2.name_t';

    /**
     * the column name for the pos_before field
     */
    const COL_POS_BEFORE = 'ali_calc_poschange2.pos_before';

    /**
     * the column name for the pos_after field
     */
    const COL_POS_AFTER = 'ali_calc_poschange2.pos_after';

    /**
     * the column name for the date_change field
     */
    const COL_DATE_CHANGE = 'ali_calc_poschange2.date_change';

    /**
     * the column name for the date_update field
     */
    const COL_DATE_UPDATE = 'ali_calc_poschange2.date_update';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'ali_calc_poschange2.type';

    /**
     * the column name for the pvleft field
     */
    const COL_PVLEFT = 'ali_calc_poschange2.pvleft';

    /**
     * the column name for the pvright field
     */
    const COL_PVRIGHT = 'ali_calc_poschange2.pvright';

    /**
     * the column name for the dpvleft field
     */
    const COL_DPVLEFT = 'ali_calc_poschange2.dpvleft';

    /**
     * the column name for the dpvright field
     */
    const COL_DPVRIGHT = 'ali_calc_poschange2.dpvright';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_calc_poschange2.uid';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_calc_poschange2.status';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_calc_poschange2.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_calc_poschange2.locationbase';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Mcode', 'NameT', 'PosBefore', 'PosAfter', 'DateChange', 'DateUpdate', 'Type', 'Pvleft', 'Pvright', 'Dpvleft', 'Dpvright', 'Uid', 'Status', 'Crate', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'mcode', 'nameT', 'posBefore', 'posAfter', 'dateChange', 'dateUpdate', 'type', 'pvleft', 'pvright', 'dpvleft', 'dpvright', 'uid', 'status', 'crate', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliCalcPoschange2TableMap::COL_ID, AliCalcPoschange2TableMap::COL_RCODE, AliCalcPoschange2TableMap::COL_MCODE, AliCalcPoschange2TableMap::COL_NAME_T, AliCalcPoschange2TableMap::COL_POS_BEFORE, AliCalcPoschange2TableMap::COL_POS_AFTER, AliCalcPoschange2TableMap::COL_DATE_CHANGE, AliCalcPoschange2TableMap::COL_DATE_UPDATE, AliCalcPoschange2TableMap::COL_TYPE, AliCalcPoschange2TableMap::COL_PVLEFT, AliCalcPoschange2TableMap::COL_PVRIGHT, AliCalcPoschange2TableMap::COL_DPVLEFT, AliCalcPoschange2TableMap::COL_DPVRIGHT, AliCalcPoschange2TableMap::COL_UID, AliCalcPoschange2TableMap::COL_STATUS, AliCalcPoschange2TableMap::COL_CRATE, AliCalcPoschange2TableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'mcode', 'name_t', 'pos_before', 'pos_after', 'date_change', 'date_update', 'type', 'pvleft', 'pvright', 'dpvleft', 'dpvright', 'uid', 'status', 'crate', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameT' => 3, 'PosBefore' => 4, 'PosAfter' => 5, 'DateChange' => 6, 'DateUpdate' => 7, 'Type' => 8, 'Pvleft' => 9, 'Pvright' => 10, 'Dpvleft' => 11, 'Dpvright' => 12, 'Uid' => 13, 'Status' => 14, 'Crate' => 15, 'Locationbase' => 16, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'mcode' => 2, 'nameT' => 3, 'posBefore' => 4, 'posAfter' => 5, 'dateChange' => 6, 'dateUpdate' => 7, 'type' => 8, 'pvleft' => 9, 'pvright' => 10, 'dpvleft' => 11, 'dpvright' => 12, 'uid' => 13, 'status' => 14, 'crate' => 15, 'locationbase' => 16, ),
        self::TYPE_COLNAME       => array(AliCalcPoschange2TableMap::COL_ID => 0, AliCalcPoschange2TableMap::COL_RCODE => 1, AliCalcPoschange2TableMap::COL_MCODE => 2, AliCalcPoschange2TableMap::COL_NAME_T => 3, AliCalcPoschange2TableMap::COL_POS_BEFORE => 4, AliCalcPoschange2TableMap::COL_POS_AFTER => 5, AliCalcPoschange2TableMap::COL_DATE_CHANGE => 6, AliCalcPoschange2TableMap::COL_DATE_UPDATE => 7, AliCalcPoschange2TableMap::COL_TYPE => 8, AliCalcPoschange2TableMap::COL_PVLEFT => 9, AliCalcPoschange2TableMap::COL_PVRIGHT => 10, AliCalcPoschange2TableMap::COL_DPVLEFT => 11, AliCalcPoschange2TableMap::COL_DPVRIGHT => 12, AliCalcPoschange2TableMap::COL_UID => 13, AliCalcPoschange2TableMap::COL_STATUS => 14, AliCalcPoschange2TableMap::COL_CRATE => 15, AliCalcPoschange2TableMap::COL_LOCATIONBASE => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'mcode' => 2, 'name_t' => 3, 'pos_before' => 4, 'pos_after' => 5, 'date_change' => 6, 'date_update' => 7, 'type' => 8, 'pvleft' => 9, 'pvright' => 10, 'dpvleft' => 11, 'dpvright' => 12, 'uid' => 13, 'status' => 14, 'crate' => 15, 'locationbase' => 16, ),
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
        $this->setName('ali_calc_poschange2');
        $this->setPhpName('AliCalcPoschange2');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliCalcPoschange2');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, '');
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_before', 'PosBefore', 'VARCHAR', false, 11, null);
        $this->addColumn('pos_after', 'PosAfter', 'VARCHAR', false, 11, null);
        $this->addColumn('date_change', 'DateChange', 'DATE', false, null, null);
        $this->addColumn('date_update', 'DateUpdate', 'DATE', true, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 255, null);
        $this->addColumn('pvleft', 'Pvleft', 'DECIMAL', true, 15, null);
        $this->addColumn('pvright', 'Pvright', 'DECIMAL', true, 15, null);
        $this->addColumn('dpvleft', 'Dpvleft', 'INTEGER', true, null, null);
        $this->addColumn('dpvright', 'Dpvright', 'INTEGER', true, null, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliCalcPoschange2TableMap::CLASS_DEFAULT : AliCalcPoschange2TableMap::OM_CLASS;
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
     * @return array           (AliCalcPoschange2 object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliCalcPoschange2TableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliCalcPoschange2TableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliCalcPoschange2TableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliCalcPoschange2TableMap::OM_CLASS;
            /** @var AliCalcPoschange2 $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliCalcPoschange2TableMap::addInstanceToPool($obj, $key);
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
            $key = AliCalcPoschange2TableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliCalcPoschange2TableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliCalcPoschange2 $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliCalcPoschange2TableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_ID);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_RCODE);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_MCODE);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_POS_BEFORE);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_POS_AFTER);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_DATE_CHANGE);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_DATE_UPDATE);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_TYPE);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_PVLEFT);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_PVRIGHT);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_DPVLEFT);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_DPVRIGHT);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_UID);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_STATUS);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_CRATE);
            $criteria->addSelectColumn(AliCalcPoschange2TableMap::COL_LOCATIONBASE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.pos_before');
            $criteria->addSelectColumn($alias . '.pos_after');
            $criteria->addSelectColumn($alias . '.date_change');
            $criteria->addSelectColumn($alias . '.date_update');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.pvleft');
            $criteria->addSelectColumn($alias . '.pvright');
            $criteria->addSelectColumn($alias . '.dpvleft');
            $criteria->addSelectColumn($alias . '.dpvright');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliCalcPoschange2TableMap::DATABASE_NAME)->getTable(AliCalcPoschange2TableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliCalcPoschange2TableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliCalcPoschange2TableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliCalcPoschange2TableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliCalcPoschange2 or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliCalcPoschange2 object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCalcPoschange2TableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliCalcPoschange2) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliCalcPoschange2TableMap::DATABASE_NAME);
            $criteria->add(AliCalcPoschange2TableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliCalcPoschange2Query::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliCalcPoschange2TableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliCalcPoschange2TableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_calc_poschange2 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliCalcPoschange2Query::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliCalcPoschange2 or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliCalcPoschange2 object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCalcPoschange2TableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliCalcPoschange2 object
        }

        if ($criteria->containsKey(AliCalcPoschange2TableMap::COL_ID) && $criteria->keyContainsValue(AliCalcPoschange2TableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliCalcPoschange2TableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliCalcPoschange2Query::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliCalcPoschange2TableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliCalcPoschange2TableMap::buildTableMap();
