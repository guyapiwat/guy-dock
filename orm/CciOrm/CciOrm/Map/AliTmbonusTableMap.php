<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTmbonus;
use CciOrm\CciOrm\AliTmbonusQuery;
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
 * This class defines the structure of the 'ali_tmbonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTmbonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTmbonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_tmbonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTmbonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTmbonus';

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
    const COL_ID = 'ali_tmbonus.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_tmbonus.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_tmbonus.mcode';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_tmbonus.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_tmbonus.name_t';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_tmbonus.pos_cur';

    /**
     * the column name for the mb2su field
     */
    const COL_MB2SU = 'ali_tmbonus.mb2su';

    /**
     * the column name for the mb2ex field
     */
    const COL_MB2EX = 'ali_tmbonus.mb2ex';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_tmbonus.tot_pv';

    /**
     * the column name for the left_pv field
     */
    const COL_LEFT_PV = 'ali_tmbonus.left_pv';

    /**
     * the column name for the right_pv field
     */
    const COL_RIGHT_PV = 'ali_tmbonus.right_pv';

    /**
     * the column name for the balance_pv field
     */
    const COL_BALANCE_PV = 'ali_tmbonus.balance_pv';

    /**
     * the column name for the tpoint field
     */
    const COL_TPOINT = 'ali_tmbonus.tpoint';

    /**
     * the column name for the spoint field
     */
    const COL_SPOINT = 'ali_tmbonus.spoint';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_tmbonus.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_tmbonus.tdate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_tmbonus.locationbase';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Mcode', 'NameF', 'NameT', 'PosCur', 'Mb2su', 'Mb2ex', 'TotPv', 'LeftPv', 'RightPv', 'BalancePv', 'Tpoint', 'Spoint', 'Fdate', 'Tdate', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'mcode', 'nameF', 'nameT', 'posCur', 'mb2su', 'mb2ex', 'totPv', 'leftPv', 'rightPv', 'balancePv', 'tpoint', 'spoint', 'fdate', 'tdate', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliTmbonusTableMap::COL_ID, AliTmbonusTableMap::COL_RCODE, AliTmbonusTableMap::COL_MCODE, AliTmbonusTableMap::COL_NAME_F, AliTmbonusTableMap::COL_NAME_T, AliTmbonusTableMap::COL_POS_CUR, AliTmbonusTableMap::COL_MB2SU, AliTmbonusTableMap::COL_MB2EX, AliTmbonusTableMap::COL_TOT_PV, AliTmbonusTableMap::COL_LEFT_PV, AliTmbonusTableMap::COL_RIGHT_PV, AliTmbonusTableMap::COL_BALANCE_PV, AliTmbonusTableMap::COL_TPOINT, AliTmbonusTableMap::COL_SPOINT, AliTmbonusTableMap::COL_FDATE, AliTmbonusTableMap::COL_TDATE, AliTmbonusTableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'mcode', 'name_f', 'name_t', 'pos_cur', 'mb2su', 'mb2ex', 'tot_pv', 'left_pv', 'right_pv', 'balance_pv', 'tpoint', 'spoint', 'fdate', 'tdate', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameF' => 3, 'NameT' => 4, 'PosCur' => 5, 'Mb2su' => 6, 'Mb2ex' => 7, 'TotPv' => 8, 'LeftPv' => 9, 'RightPv' => 10, 'BalancePv' => 11, 'Tpoint' => 12, 'Spoint' => 13, 'Fdate' => 14, 'Tdate' => 15, 'Locationbase' => 16, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'mcode' => 2, 'nameF' => 3, 'nameT' => 4, 'posCur' => 5, 'mb2su' => 6, 'mb2ex' => 7, 'totPv' => 8, 'leftPv' => 9, 'rightPv' => 10, 'balancePv' => 11, 'tpoint' => 12, 'spoint' => 13, 'fdate' => 14, 'tdate' => 15, 'locationbase' => 16, ),
        self::TYPE_COLNAME       => array(AliTmbonusTableMap::COL_ID => 0, AliTmbonusTableMap::COL_RCODE => 1, AliTmbonusTableMap::COL_MCODE => 2, AliTmbonusTableMap::COL_NAME_F => 3, AliTmbonusTableMap::COL_NAME_T => 4, AliTmbonusTableMap::COL_POS_CUR => 5, AliTmbonusTableMap::COL_MB2SU => 6, AliTmbonusTableMap::COL_MB2EX => 7, AliTmbonusTableMap::COL_TOT_PV => 8, AliTmbonusTableMap::COL_LEFT_PV => 9, AliTmbonusTableMap::COL_RIGHT_PV => 10, AliTmbonusTableMap::COL_BALANCE_PV => 11, AliTmbonusTableMap::COL_TPOINT => 12, AliTmbonusTableMap::COL_SPOINT => 13, AliTmbonusTableMap::COL_FDATE => 14, AliTmbonusTableMap::COL_TDATE => 15, AliTmbonusTableMap::COL_LOCATIONBASE => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'mcode' => 2, 'name_f' => 3, 'name_t' => 4, 'pos_cur' => 5, 'mb2su' => 6, 'mb2ex' => 7, 'tot_pv' => 8, 'left_pv' => 9, 'right_pv' => 10, 'balance_pv' => 11, 'tpoint' => 12, 'spoint' => 13, 'fdate' => 14, 'tdate' => 15, 'locationbase' => 16, ),
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
        $this->setName('ali_tmbonus');
        $this->setPhpName('AliTmbonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTmbonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('mb2su', 'Mb2su', 'INTEGER', true, null, null);
        $this->addColumn('mb2ex', 'Mb2ex', 'INTEGER', true, null, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', true, 15, null);
        $this->addColumn('left_pv', 'LeftPv', 'DECIMAL', true, 15, null);
        $this->addColumn('right_pv', 'RightPv', 'DECIMAL', true, 15, null);
        $this->addColumn('balance_pv', 'BalancePv', 'DECIMAL', true, 15, null);
        $this->addColumn('tpoint', 'Tpoint', 'DECIMAL', true, 15, null);
        $this->addColumn('spoint', 'Spoint', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
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
        return $withPrefix ? AliTmbonusTableMap::CLASS_DEFAULT : AliTmbonusTableMap::OM_CLASS;
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
     * @return array           (AliTmbonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTmbonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTmbonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTmbonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTmbonusTableMap::OM_CLASS;
            /** @var AliTmbonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTmbonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTmbonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTmbonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTmbonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTmbonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_ID);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_MB2SU);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_MB2EX);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_LEFT_PV);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_RIGHT_PV);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_BALANCE_PV);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_TPOINT);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_SPOINT);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliTmbonusTableMap::COL_LOCATIONBASE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.mb2su');
            $criteria->addSelectColumn($alias . '.mb2ex');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.left_pv');
            $criteria->addSelectColumn($alias . '.right_pv');
            $criteria->addSelectColumn($alias . '.balance_pv');
            $criteria->addSelectColumn($alias . '.tpoint');
            $criteria->addSelectColumn($alias . '.spoint');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTmbonusTableMap::DATABASE_NAME)->getTable(AliTmbonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTmbonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTmbonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTmbonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTmbonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTmbonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTmbonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTmbonusTableMap::DATABASE_NAME);
            $criteria->add(AliTmbonusTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliTmbonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTmbonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTmbonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_tmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTmbonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTmbonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTmbonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTmbonus object
        }

        if ($criteria->containsKey(AliTmbonusTableMap::COL_ID) && $criteria->keyContainsValue(AliTmbonusTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTmbonusTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliTmbonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTmbonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTmbonusTableMap::buildTableMap();
