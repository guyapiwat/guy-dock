<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliCommissionB;
use CciOrm\CciOrm\AliCommissionBQuery;
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
 * This class defines the structure of the 'ali_commission_b' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliCommissionBTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliCommissionBTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_commission_b';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliCommissionB';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliCommissionB';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_commission_b.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_commission_b.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_commission_b.name_t';

    /**
     * the column name for the pos_cur3 field
     */
    const COL_POS_CUR3 = 'ali_commission_b.pos_cur3';

    /**
     * the column name for the dmbonus field
     */
    const COL_DMBONUS = 'ali_commission_b.dmbonus';

    /**
     * the column name for the embonus field
     */
    const COL_EMBONUS = 'ali_commission_b.embonus';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_commission_b.total';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_commission_b.rcode';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_commission_b.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_commission_b.tdate';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'NameT', 'PosCur3', 'Dmbonus', 'Embonus', 'Total', 'Rcode', 'Fdate', 'Tdate', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'nameT', 'posCur3', 'dmbonus', 'embonus', 'total', 'rcode', 'fdate', 'tdate', ),
        self::TYPE_COLNAME       => array(AliCommissionBTableMap::COL_ID, AliCommissionBTableMap::COL_MCODE, AliCommissionBTableMap::COL_NAME_T, AliCommissionBTableMap::COL_POS_CUR3, AliCommissionBTableMap::COL_DMBONUS, AliCommissionBTableMap::COL_EMBONUS, AliCommissionBTableMap::COL_TOTAL, AliCommissionBTableMap::COL_RCODE, AliCommissionBTableMap::COL_FDATE, AliCommissionBTableMap::COL_TDATE, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'name_t', 'pos_cur3', 'dmbonus', 'embonus', 'total', 'rcode', 'fdate', 'tdate', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'NameT' => 2, 'PosCur3' => 3, 'Dmbonus' => 4, 'Embonus' => 5, 'Total' => 6, 'Rcode' => 7, 'Fdate' => 8, 'Tdate' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'nameT' => 2, 'posCur3' => 3, 'dmbonus' => 4, 'embonus' => 5, 'total' => 6, 'rcode' => 7, 'fdate' => 8, 'tdate' => 9, ),
        self::TYPE_COLNAME       => array(AliCommissionBTableMap::COL_ID => 0, AliCommissionBTableMap::COL_MCODE => 1, AliCommissionBTableMap::COL_NAME_T => 2, AliCommissionBTableMap::COL_POS_CUR3 => 3, AliCommissionBTableMap::COL_DMBONUS => 4, AliCommissionBTableMap::COL_EMBONUS => 5, AliCommissionBTableMap::COL_TOTAL => 6, AliCommissionBTableMap::COL_RCODE => 7, AliCommissionBTableMap::COL_FDATE => 8, AliCommissionBTableMap::COL_TDATE => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'name_t' => 2, 'pos_cur3' => 3, 'dmbonus' => 4, 'embonus' => 5, 'total' => 6, 'rcode' => 7, 'fdate' => 8, 'tdate' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('ali_commission_b');
        $this->setPhpName('AliCommissionB');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliCommissionB');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur3', 'PosCur3', 'VARCHAR', true, 255, null);
        $this->addColumn('dmbonus', 'Dmbonus', 'DECIMAL', true, 15, null);
        $this->addColumn('embonus', 'Embonus', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
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
        return $withPrefix ? AliCommissionBTableMap::CLASS_DEFAULT : AliCommissionBTableMap::OM_CLASS;
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
     * @return array           (AliCommissionB object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliCommissionBTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliCommissionBTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliCommissionBTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliCommissionBTableMap::OM_CLASS;
            /** @var AliCommissionB $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliCommissionBTableMap::addInstanceToPool($obj, $key);
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
            $key = AliCommissionBTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliCommissionBTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliCommissionB $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliCommissionBTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_ID);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_POS_CUR3);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_DMBONUS);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_EMBONUS);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliCommissionBTableMap::COL_TDATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.pos_cur3');
            $criteria->addSelectColumn($alias . '.dmbonus');
            $criteria->addSelectColumn($alias . '.embonus');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliCommissionBTableMap::DATABASE_NAME)->getTable(AliCommissionBTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliCommissionBTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliCommissionBTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliCommissionBTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliCommissionB or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliCommissionB object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCommissionBTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliCommissionB) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliCommissionBTableMap::DATABASE_NAME);
            $criteria->add(AliCommissionBTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliCommissionBQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliCommissionBTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliCommissionBTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_commission_b table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliCommissionBQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliCommissionB or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliCommissionB object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCommissionBTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliCommissionB object
        }

        if ($criteria->containsKey(AliCommissionBTableMap::COL_ID) && $criteria->keyContainsValue(AliCommissionBTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliCommissionBTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliCommissionBQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliCommissionBTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliCommissionBTableMap::buildTableMap();
