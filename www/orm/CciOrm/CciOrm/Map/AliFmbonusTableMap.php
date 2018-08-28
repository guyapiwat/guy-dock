<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliFmbonus;
use CciOrm\CciOrm\AliFmbonusQuery;
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
 * This class defines the structure of the 'ali_fmbonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliFmbonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliFmbonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_fmbonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliFmbonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliFmbonus';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the aid field
     */
    const COL_AID = 'ali_fmbonus.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_fmbonus.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_fmbonus.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_fmbonus.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_fmbonus.total';

    /**
     * the column name for the total_r field
     */
    const COL_TOTAL_R = 'ali_fmbonus.total_r';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'ali_fmbonus.tax';

    /**
     * the column name for the bonus field
     */
    const COL_BONUS = 'ali_fmbonus.bonus';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_fmbonus.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_fmbonus.tdate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_fmbonus.pos_cur';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_fmbonus.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_fmbonus.locationbase';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_fmbonus.paydate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_fmbonus.inv_code';

    /**
     * the column name for the paytype field
     */
    const COL_PAYTYPE = 'ali_fmbonus.paytype';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'NameT', 'Total', 'TotalR', 'Tax', 'Bonus', 'Fdate', 'Tdate', 'PosCur', 'Crate', 'Locationbase', 'Paydate', 'InvCode', 'Paytype', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'nameT', 'total', 'totalR', 'tax', 'bonus', 'fdate', 'tdate', 'posCur', 'crate', 'locationbase', 'paydate', 'invCode', 'paytype', ),
        self::TYPE_COLNAME       => array(AliFmbonusTableMap::COL_AID, AliFmbonusTableMap::COL_RCODE, AliFmbonusTableMap::COL_MCODE, AliFmbonusTableMap::COL_NAME_T, AliFmbonusTableMap::COL_TOTAL, AliFmbonusTableMap::COL_TOTAL_R, AliFmbonusTableMap::COL_TAX, AliFmbonusTableMap::COL_BONUS, AliFmbonusTableMap::COL_FDATE, AliFmbonusTableMap::COL_TDATE, AliFmbonusTableMap::COL_POS_CUR, AliFmbonusTableMap::COL_CRATE, AliFmbonusTableMap::COL_LOCATIONBASE, AliFmbonusTableMap::COL_PAYDATE, AliFmbonusTableMap::COL_INV_CODE, AliFmbonusTableMap::COL_PAYTYPE, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'name_t', 'total', 'total_r', 'tax', 'bonus', 'fdate', 'tdate', 'pos_cur', 'crate', 'locationbase', 'paydate', 'inv_code', 'paytype', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameT' => 3, 'Total' => 4, 'TotalR' => 5, 'Tax' => 6, 'Bonus' => 7, 'Fdate' => 8, 'Tdate' => 9, 'PosCur' => 10, 'Crate' => 11, 'Locationbase' => 12, 'Paydate' => 13, 'InvCode' => 14, 'Paytype' => 15, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'nameT' => 3, 'total' => 4, 'totalR' => 5, 'tax' => 6, 'bonus' => 7, 'fdate' => 8, 'tdate' => 9, 'posCur' => 10, 'crate' => 11, 'locationbase' => 12, 'paydate' => 13, 'invCode' => 14, 'paytype' => 15, ),
        self::TYPE_COLNAME       => array(AliFmbonusTableMap::COL_AID => 0, AliFmbonusTableMap::COL_RCODE => 1, AliFmbonusTableMap::COL_MCODE => 2, AliFmbonusTableMap::COL_NAME_T => 3, AliFmbonusTableMap::COL_TOTAL => 4, AliFmbonusTableMap::COL_TOTAL_R => 5, AliFmbonusTableMap::COL_TAX => 6, AliFmbonusTableMap::COL_BONUS => 7, AliFmbonusTableMap::COL_FDATE => 8, AliFmbonusTableMap::COL_TDATE => 9, AliFmbonusTableMap::COL_POS_CUR => 10, AliFmbonusTableMap::COL_CRATE => 11, AliFmbonusTableMap::COL_LOCATIONBASE => 12, AliFmbonusTableMap::COL_PAYDATE => 13, AliFmbonusTableMap::COL_INV_CODE => 14, AliFmbonusTableMap::COL_PAYTYPE => 15, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'name_t' => 3, 'total' => 4, 'total_r' => 5, 'tax' => 6, 'bonus' => 7, 'fdate' => 8, 'tdate' => 9, 'pos_cur' => 10, 'crate' => 11, 'locationbase' => 12, 'paydate' => 13, 'inv_code' => 14, 'paytype' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $this->setName('ali_fmbonus');
        $this->setPhpName('AliFmbonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliFmbonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('total_r', 'TotalR', 'DECIMAL', true, 15, null);
        $this->addColumn('tax', 'Tax', 'DECIMAL', true, 15, null);
        $this->addColumn('bonus', 'Bonus', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('paydate', 'Paydate', 'DATE', true, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('paytype', 'Paytype', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliFmbonusTableMap::CLASS_DEFAULT : AliFmbonusTableMap::OM_CLASS;
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
     * @return array           (AliFmbonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliFmbonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliFmbonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliFmbonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliFmbonusTableMap::OM_CLASS;
            /** @var AliFmbonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliFmbonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliFmbonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliFmbonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliFmbonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliFmbonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_AID);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_TOTAL_R);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_TAX);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_BONUS);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliFmbonusTableMap::COL_PAYTYPE);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.total_r');
            $criteria->addSelectColumn($alias . '.tax');
            $criteria->addSelectColumn($alias . '.bonus');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.paytype');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliFmbonusTableMap::DATABASE_NAME)->getTable(AliFmbonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliFmbonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliFmbonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliFmbonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliFmbonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliFmbonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliFmbonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliFmbonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliFmbonusTableMap::DATABASE_NAME);
            $criteria->add(AliFmbonusTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliFmbonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliFmbonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliFmbonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_fmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliFmbonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliFmbonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliFmbonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliFmbonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliFmbonus object
        }

        if ($criteria->containsKey(AliFmbonusTableMap::COL_AID) && $criteria->keyContainsValue(AliFmbonusTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliFmbonusTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliFmbonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliFmbonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliFmbonusTableMap::buildTableMap();
