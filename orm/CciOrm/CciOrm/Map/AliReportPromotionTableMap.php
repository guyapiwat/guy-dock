<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliReportPromotion;
use CciOrm\CciOrm\AliReportPromotionQuery;
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
 * This class defines the structure of the 'ali_report_promotion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliReportPromotionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliReportPromotionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_report_promotion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliReportPromotion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliReportPromotion';

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
    const COL_ID = 'ali_report_promotion.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_report_promotion.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_report_promotion.name_t';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_report_promotion.sp_code';

    /**
     * the column name for the sp_name field
     */
    const COL_SP_NAME = 'ali_report_promotion.sp_name';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_report_promotion.pos_cur';

    /**
     * the column name for the pos_cur2 field
     */
    const COL_POS_CUR2 = 'ali_report_promotion.pos_cur2';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_report_promotion.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_report_promotion.tdate';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_report_promotion.tot_pv';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'NameT', 'SpCode', 'SpName', 'PosCur', 'PosCur2', 'Fdate', 'Tdate', 'TotPv', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'nameT', 'spCode', 'spName', 'posCur', 'posCur2', 'fdate', 'tdate', 'totPv', ),
        self::TYPE_COLNAME       => array(AliReportPromotionTableMap::COL_ID, AliReportPromotionTableMap::COL_MCODE, AliReportPromotionTableMap::COL_NAME_T, AliReportPromotionTableMap::COL_SP_CODE, AliReportPromotionTableMap::COL_SP_NAME, AliReportPromotionTableMap::COL_POS_CUR, AliReportPromotionTableMap::COL_POS_CUR2, AliReportPromotionTableMap::COL_FDATE, AliReportPromotionTableMap::COL_TDATE, AliReportPromotionTableMap::COL_TOT_PV, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'name_t', 'sp_code', 'sp_name', 'pos_cur', 'pos_cur2', 'fdate', 'tdate', 'tot_pv', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'NameT' => 2, 'SpCode' => 3, 'SpName' => 4, 'PosCur' => 5, 'PosCur2' => 6, 'Fdate' => 7, 'Tdate' => 8, 'TotPv' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'nameT' => 2, 'spCode' => 3, 'spName' => 4, 'posCur' => 5, 'posCur2' => 6, 'fdate' => 7, 'tdate' => 8, 'totPv' => 9, ),
        self::TYPE_COLNAME       => array(AliReportPromotionTableMap::COL_ID => 0, AliReportPromotionTableMap::COL_MCODE => 1, AliReportPromotionTableMap::COL_NAME_T => 2, AliReportPromotionTableMap::COL_SP_CODE => 3, AliReportPromotionTableMap::COL_SP_NAME => 4, AliReportPromotionTableMap::COL_POS_CUR => 5, AliReportPromotionTableMap::COL_POS_CUR2 => 6, AliReportPromotionTableMap::COL_FDATE => 7, AliReportPromotionTableMap::COL_TDATE => 8, AliReportPromotionTableMap::COL_TOT_PV => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'name_t' => 2, 'sp_code' => 3, 'sp_name' => 4, 'pos_cur' => 5, 'pos_cur2' => 6, 'fdate' => 7, 'tdate' => 8, 'tot_pv' => 9, ),
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
        $this->setName('ali_report_promotion');
        $this->setPhpName('AliReportPromotion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliReportPromotion');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_name', 'SpName', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur2', 'PosCur2', 'VARCHAR', true, 255, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('tot_pv', 'TotPv', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliReportPromotionTableMap::CLASS_DEFAULT : AliReportPromotionTableMap::OM_CLASS;
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
     * @return array           (AliReportPromotion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliReportPromotionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliReportPromotionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliReportPromotionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliReportPromotionTableMap::OM_CLASS;
            /** @var AliReportPromotion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliReportPromotionTableMap::addInstanceToPool($obj, $key);
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
            $key = AliReportPromotionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliReportPromotionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliReportPromotion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliReportPromotionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_ID);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_SP_NAME);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_POS_CUR2);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliReportPromotionTableMap::COL_TOT_PV);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.sp_name');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.pos_cur2');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.tot_pv');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliReportPromotionTableMap::DATABASE_NAME)->getTable(AliReportPromotionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliReportPromotionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliReportPromotionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliReportPromotionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliReportPromotion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliReportPromotion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPromotionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliReportPromotion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliReportPromotionTableMap::DATABASE_NAME);
            $criteria->add(AliReportPromotionTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliReportPromotionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliReportPromotionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliReportPromotionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_report_promotion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliReportPromotionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliReportPromotion or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliReportPromotion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPromotionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliReportPromotion object
        }

        if ($criteria->containsKey(AliReportPromotionTableMap::COL_ID) && $criteria->keyContainsValue(AliReportPromotionTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliReportPromotionTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliReportPromotionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliReportPromotionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliReportPromotionTableMap::buildTableMap();
