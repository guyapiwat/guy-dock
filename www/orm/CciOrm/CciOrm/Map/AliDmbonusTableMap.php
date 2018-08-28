<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliDmbonus;
use CciOrm\CciOrm\AliDmbonusQuery;
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
 * This class defines the structure of the 'ali_dmbonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliDmbonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliDmbonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_dmbonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliDmbonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliDmbonus';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the aid field
     */
    const COL_AID = 'ali_dmbonus.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_dmbonus.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_dmbonus.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_dmbonus.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_dmbonus.total';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'ali_dmbonus.tax';

    /**
     * the column name for the bonus field
     */
    const COL_BONUS = 'ali_dmbonus.bonus';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_dmbonus.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_dmbonus.tdate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_dmbonus.pos_cur';

    /**
     * the column name for the adjust field
     */
    const COL_ADJUST = 'ali_dmbonus.adjust';

    /**
     * the column name for the pstatus field
     */
    const COL_PSTATUS = 'ali_dmbonus.pstatus';

    /**
     * the column name for the prcode field
     */
    const COL_PRCODE = 'ali_dmbonus.prcode';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_dmbonus.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_dmbonus.locationbase';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'NameT', 'Total', 'Tax', 'Bonus', 'Fdate', 'Tdate', 'PosCur', 'Adjust', 'Pstatus', 'Prcode', 'Crate', 'Locationbase', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'nameT', 'total', 'tax', 'bonus', 'fdate', 'tdate', 'posCur', 'adjust', 'pstatus', 'prcode', 'crate', 'locationbase', ),
        self::TYPE_COLNAME       => array(AliDmbonusTableMap::COL_AID, AliDmbonusTableMap::COL_RCODE, AliDmbonusTableMap::COL_MCODE, AliDmbonusTableMap::COL_NAME_T, AliDmbonusTableMap::COL_TOTAL, AliDmbonusTableMap::COL_TAX, AliDmbonusTableMap::COL_BONUS, AliDmbonusTableMap::COL_FDATE, AliDmbonusTableMap::COL_TDATE, AliDmbonusTableMap::COL_POS_CUR, AliDmbonusTableMap::COL_ADJUST, AliDmbonusTableMap::COL_PSTATUS, AliDmbonusTableMap::COL_PRCODE, AliDmbonusTableMap::COL_CRATE, AliDmbonusTableMap::COL_LOCATIONBASE, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'name_t', 'total', 'tax', 'bonus', 'fdate', 'tdate', 'pos_cur', 'adjust', 'pstatus', 'prcode', 'crate', 'locationbase', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameT' => 3, 'Total' => 4, 'Tax' => 5, 'Bonus' => 6, 'Fdate' => 7, 'Tdate' => 8, 'PosCur' => 9, 'Adjust' => 10, 'Pstatus' => 11, 'Prcode' => 12, 'Crate' => 13, 'Locationbase' => 14, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'nameT' => 3, 'total' => 4, 'tax' => 5, 'bonus' => 6, 'fdate' => 7, 'tdate' => 8, 'posCur' => 9, 'adjust' => 10, 'pstatus' => 11, 'prcode' => 12, 'crate' => 13, 'locationbase' => 14, ),
        self::TYPE_COLNAME       => array(AliDmbonusTableMap::COL_AID => 0, AliDmbonusTableMap::COL_RCODE => 1, AliDmbonusTableMap::COL_MCODE => 2, AliDmbonusTableMap::COL_NAME_T => 3, AliDmbonusTableMap::COL_TOTAL => 4, AliDmbonusTableMap::COL_TAX => 5, AliDmbonusTableMap::COL_BONUS => 6, AliDmbonusTableMap::COL_FDATE => 7, AliDmbonusTableMap::COL_TDATE => 8, AliDmbonusTableMap::COL_POS_CUR => 9, AliDmbonusTableMap::COL_ADJUST => 10, AliDmbonusTableMap::COL_PSTATUS => 11, AliDmbonusTableMap::COL_PRCODE => 12, AliDmbonusTableMap::COL_CRATE => 13, AliDmbonusTableMap::COL_LOCATIONBASE => 14, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'name_t' => 3, 'total' => 4, 'tax' => 5, 'bonus' => 6, 'fdate' => 7, 'tdate' => 8, 'pos_cur' => 9, 'adjust' => 10, 'pstatus' => 11, 'prcode' => 12, 'crate' => 13, 'locationbase' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('ali_dmbonus');
        $this->setPhpName('AliDmbonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliDmbonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('tax', 'Tax', 'DECIMAL', true, 15, null);
        $this->addColumn('bonus', 'Bonus', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('adjust', 'Adjust', 'DECIMAL', true, 15, null);
        $this->addColumn('pstatus', 'Pstatus', 'INTEGER', true, null, null);
        $this->addColumn('prcode', 'Prcode', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliDmbonusTableMap::CLASS_DEFAULT : AliDmbonusTableMap::OM_CLASS;
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
     * @return array           (AliDmbonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliDmbonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliDmbonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliDmbonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliDmbonusTableMap::OM_CLASS;
            /** @var AliDmbonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliDmbonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliDmbonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliDmbonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliDmbonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliDmbonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_AID);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_TAX);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_BONUS);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_ADJUST);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_PSTATUS);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_PRCODE);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliDmbonusTableMap::COL_LOCATIONBASE);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tax');
            $criteria->addSelectColumn($alias . '.bonus');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.adjust');
            $criteria->addSelectColumn($alias . '.pstatus');
            $criteria->addSelectColumn($alias . '.prcode');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliDmbonusTableMap::DATABASE_NAME)->getTable(AliDmbonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliDmbonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliDmbonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliDmbonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliDmbonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliDmbonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliDmbonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliDmbonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliDmbonusTableMap::DATABASE_NAME);
            $criteria->add(AliDmbonusTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliDmbonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliDmbonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliDmbonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_dmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliDmbonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliDmbonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliDmbonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliDmbonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliDmbonus object
        }

        if ($criteria->containsKey(AliDmbonusTableMap::COL_AID) && $criteria->keyContainsValue(AliDmbonusTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliDmbonusTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliDmbonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliDmbonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliDmbonusTableMap::buildTableMap();
