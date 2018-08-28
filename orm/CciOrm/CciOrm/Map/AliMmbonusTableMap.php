<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliMmbonus;
use CciOrm\CciOrm\AliMmbonusQuery;
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
 * This class defines the structure of the 'ali_mmbonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliMmbonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliMmbonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_mmbonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliMmbonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliMmbonus';

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
     * the column name for the aid field
     */
    const COL_AID = 'ali_mmbonus.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_mmbonus.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_mmbonus.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_mmbonus.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_mmbonus.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_mmbonus.tot_pv';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'ali_mmbonus.tax';

    /**
     * the column name for the bonus field
     */
    const COL_BONUS = 'ali_mmbonus.bonus';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_mmbonus.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_mmbonus.tdate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_mmbonus.pos_cur';

    /**
     * the column name for the pstatus field
     */
    const COL_PSTATUS = 'ali_mmbonus.pstatus';

    /**
     * the column name for the prcode field
     */
    const COL_PRCODE = 'ali_mmbonus.prcode';

    /**
     * the column name for the pmonth field
     */
    const COL_PMONTH = 'ali_mmbonus.pmonth';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_mmbonus.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_mmbonus.locationbase';

    /**
     * the column name for the chk_status field
     */
    const COL_CHK_STATUS = 'ali_mmbonus.chk_status';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'NameT', 'Total', 'TotPv', 'Tax', 'Bonus', 'Fdate', 'Tdate', 'PosCur', 'Pstatus', 'Prcode', 'Pmonth', 'Crate', 'Locationbase', 'ChkStatus', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'nameT', 'total', 'totPv', 'tax', 'bonus', 'fdate', 'tdate', 'posCur', 'pstatus', 'prcode', 'pmonth', 'crate', 'locationbase', 'chkStatus', ),
        self::TYPE_COLNAME       => array(AliMmbonusTableMap::COL_AID, AliMmbonusTableMap::COL_RCODE, AliMmbonusTableMap::COL_MCODE, AliMmbonusTableMap::COL_NAME_T, AliMmbonusTableMap::COL_TOTAL, AliMmbonusTableMap::COL_TOT_PV, AliMmbonusTableMap::COL_TAX, AliMmbonusTableMap::COL_BONUS, AliMmbonusTableMap::COL_FDATE, AliMmbonusTableMap::COL_TDATE, AliMmbonusTableMap::COL_POS_CUR, AliMmbonusTableMap::COL_PSTATUS, AliMmbonusTableMap::COL_PRCODE, AliMmbonusTableMap::COL_PMONTH, AliMmbonusTableMap::COL_CRATE, AliMmbonusTableMap::COL_LOCATIONBASE, AliMmbonusTableMap::COL_CHK_STATUS, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'name_t', 'total', 'tot_pv', 'tax', 'bonus', 'fdate', 'tdate', 'pos_cur', 'pstatus', 'prcode', 'pmonth', 'crate', 'locationbase', 'chk_status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameT' => 3, 'Total' => 4, 'TotPv' => 5, 'Tax' => 6, 'Bonus' => 7, 'Fdate' => 8, 'Tdate' => 9, 'PosCur' => 10, 'Pstatus' => 11, 'Prcode' => 12, 'Pmonth' => 13, 'Crate' => 14, 'Locationbase' => 15, 'ChkStatus' => 16, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'nameT' => 3, 'total' => 4, 'totPv' => 5, 'tax' => 6, 'bonus' => 7, 'fdate' => 8, 'tdate' => 9, 'posCur' => 10, 'pstatus' => 11, 'prcode' => 12, 'pmonth' => 13, 'crate' => 14, 'locationbase' => 15, 'chkStatus' => 16, ),
        self::TYPE_COLNAME       => array(AliMmbonusTableMap::COL_AID => 0, AliMmbonusTableMap::COL_RCODE => 1, AliMmbonusTableMap::COL_MCODE => 2, AliMmbonusTableMap::COL_NAME_T => 3, AliMmbonusTableMap::COL_TOTAL => 4, AliMmbonusTableMap::COL_TOT_PV => 5, AliMmbonusTableMap::COL_TAX => 6, AliMmbonusTableMap::COL_BONUS => 7, AliMmbonusTableMap::COL_FDATE => 8, AliMmbonusTableMap::COL_TDATE => 9, AliMmbonusTableMap::COL_POS_CUR => 10, AliMmbonusTableMap::COL_PSTATUS => 11, AliMmbonusTableMap::COL_PRCODE => 12, AliMmbonusTableMap::COL_PMONTH => 13, AliMmbonusTableMap::COL_CRATE => 14, AliMmbonusTableMap::COL_LOCATIONBASE => 15, AliMmbonusTableMap::COL_CHK_STATUS => 16, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'name_t' => 3, 'total' => 4, 'tot_pv' => 5, 'tax' => 6, 'bonus' => 7, 'fdate' => 8, 'tdate' => 9, 'pos_cur' => 10, 'pstatus' => 11, 'prcode' => 12, 'pmonth' => 13, 'crate' => 14, 'locationbase' => 15, 'chk_status' => 16, ),
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
        $this->setName('ali_mmbonus');
        $this->setPhpName('AliMmbonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliMmbonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', true, 12, null);
        $this->addColumn('tax', 'Tax', 'DECIMAL', true, 15, null);
        $this->addColumn('bonus', 'Bonus', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('pstatus', 'Pstatus', 'INTEGER', true, null, null);
        $this->addColumn('prcode', 'Prcode', 'INTEGER', true, null, null);
        $this->addColumn('pmonth', 'Pmonth', 'VARCHAR', true, 255, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('chk_status', 'ChkStatus', 'INTEGER', true, 2, null);
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
        return $withPrefix ? AliMmbonusTableMap::CLASS_DEFAULT : AliMmbonusTableMap::OM_CLASS;
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
     * @return array           (AliMmbonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliMmbonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliMmbonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliMmbonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliMmbonusTableMap::OM_CLASS;
            /** @var AliMmbonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliMmbonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliMmbonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliMmbonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliMmbonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliMmbonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_AID);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_TAX);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_BONUS);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_PSTATUS);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_PRCODE);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_PMONTH);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliMmbonusTableMap::COL_CHK_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.tax');
            $criteria->addSelectColumn($alias . '.bonus');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.pstatus');
            $criteria->addSelectColumn($alias . '.prcode');
            $criteria->addSelectColumn($alias . '.pmonth');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.chk_status');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliMmbonusTableMap::DATABASE_NAME)->getTable(AliMmbonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliMmbonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliMmbonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliMmbonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliMmbonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliMmbonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMmbonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliMmbonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliMmbonusTableMap::DATABASE_NAME);
            $criteria->add(AliMmbonusTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliMmbonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliMmbonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliMmbonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_mmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliMmbonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliMmbonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliMmbonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMmbonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliMmbonus object
        }

        if ($criteria->containsKey(AliMmbonusTableMap::COL_AID) && $criteria->keyContainsValue(AliMmbonusTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliMmbonusTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliMmbonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliMmbonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliMmbonusTableMap::buildTableMap();
