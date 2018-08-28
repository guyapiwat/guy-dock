<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliPromotion;
use CciOrm\CciOrm\AliPromotionQuery;
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
 * This class defines the structure of the 'ali_promotion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliPromotionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliPromotionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_promotion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliPromotion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliPromotion';

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
     * the column name for the rid field
     */
    const COL_RID = 'ali_promotion.rid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_promotion.rcode';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'ali_promotion.name';

    /**
     * the column name for the rdate field
     */
    const COL_RDATE = 'ali_promotion.rdate';

    /**
     * the column name for the calc field
     */
    const COL_CALC = 'ali_promotion.calc';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_promotion.remark';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_promotion.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_promotion.tdate';

    /**
     * the column name for the rtype field
     */
    const COL_RTYPE = 'ali_promotion.rtype';

    /**
     * the column name for the firstseat field
     */
    const COL_FIRSTSEAT = 'ali_promotion.firstseat';

    /**
     * the column name for the secondseat field
     */
    const COL_SECONDSEAT = 'ali_promotion.secondseat';

    /**
     * the column name for the rincrease field
     */
    const COL_RINCREASE = 'ali_promotion.rincrease';

    /**
     * the column name for the rurl field
     */
    const COL_RURL = 'ali_promotion.rurl';

    /**
     * the column name for the calc_date field
     */
    const COL_CALC_DATE = 'ali_promotion.calc_date';

    /**
     * the column name for the tshow field
     */
    const COL_TSHOW = 'ali_promotion.tshow';

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
        self::TYPE_PHPNAME       => array('Rid', 'Rcode', 'Name', 'Rdate', 'Calc', 'Remark', 'Fdate', 'Tdate', 'Rtype', 'Firstseat', 'Secondseat', 'Rincrease', 'Rurl', 'CalcDate', 'Tshow', ),
        self::TYPE_CAMELNAME     => array('rid', 'rcode', 'name', 'rdate', 'calc', 'remark', 'fdate', 'tdate', 'rtype', 'firstseat', 'secondseat', 'rincrease', 'rurl', 'calcDate', 'tshow', ),
        self::TYPE_COLNAME       => array(AliPromotionTableMap::COL_RID, AliPromotionTableMap::COL_RCODE, AliPromotionTableMap::COL_NAME, AliPromotionTableMap::COL_RDATE, AliPromotionTableMap::COL_CALC, AliPromotionTableMap::COL_REMARK, AliPromotionTableMap::COL_FDATE, AliPromotionTableMap::COL_TDATE, AliPromotionTableMap::COL_RTYPE, AliPromotionTableMap::COL_FIRSTSEAT, AliPromotionTableMap::COL_SECONDSEAT, AliPromotionTableMap::COL_RINCREASE, AliPromotionTableMap::COL_RURL, AliPromotionTableMap::COL_CALC_DATE, AliPromotionTableMap::COL_TSHOW, ),
        self::TYPE_FIELDNAME     => array('rid', 'rcode', 'name', 'rdate', 'calc', 'remark', 'fdate', 'tdate', 'rtype', 'firstseat', 'secondseat', 'rincrease', 'rurl', 'calc_date', 'tshow', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Rid' => 0, 'Rcode' => 1, 'Name' => 2, 'Rdate' => 3, 'Calc' => 4, 'Remark' => 5, 'Fdate' => 6, 'Tdate' => 7, 'Rtype' => 8, 'Firstseat' => 9, 'Secondseat' => 10, 'Rincrease' => 11, 'Rurl' => 12, 'CalcDate' => 13, 'Tshow' => 14, ),
        self::TYPE_CAMELNAME     => array('rid' => 0, 'rcode' => 1, 'name' => 2, 'rdate' => 3, 'calc' => 4, 'remark' => 5, 'fdate' => 6, 'tdate' => 7, 'rtype' => 8, 'firstseat' => 9, 'secondseat' => 10, 'rincrease' => 11, 'rurl' => 12, 'calcDate' => 13, 'tshow' => 14, ),
        self::TYPE_COLNAME       => array(AliPromotionTableMap::COL_RID => 0, AliPromotionTableMap::COL_RCODE => 1, AliPromotionTableMap::COL_NAME => 2, AliPromotionTableMap::COL_RDATE => 3, AliPromotionTableMap::COL_CALC => 4, AliPromotionTableMap::COL_REMARK => 5, AliPromotionTableMap::COL_FDATE => 6, AliPromotionTableMap::COL_TDATE => 7, AliPromotionTableMap::COL_RTYPE => 8, AliPromotionTableMap::COL_FIRSTSEAT => 9, AliPromotionTableMap::COL_SECONDSEAT => 10, AliPromotionTableMap::COL_RINCREASE => 11, AliPromotionTableMap::COL_RURL => 12, AliPromotionTableMap::COL_CALC_DATE => 13, AliPromotionTableMap::COL_TSHOW => 14, ),
        self::TYPE_FIELDNAME     => array('rid' => 0, 'rcode' => 1, 'name' => 2, 'rdate' => 3, 'calc' => 4, 'remark' => 5, 'fdate' => 6, 'tdate' => 7, 'rtype' => 8, 'firstseat' => 9, 'secondseat' => 10, 'rincrease' => 11, 'rurl' => 12, 'calc_date' => 13, 'tshow' => 14, ),
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
        $this->setName('ali_promotion');
        $this->setPhpName('AliPromotion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliPromotion');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('rid', 'Rid', 'INTEGER', true, 10, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', false, 5, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('rdate', 'Rdate', 'DATE', false, null, null);
        $this->addColumn('calc', 'Calc', 'VARCHAR', false, 1, null);
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 50, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('rtype', 'Rtype', 'INTEGER', true, null, null);
        $this->addColumn('firstseat', 'Firstseat', 'DECIMAL', true, 15, null);
        $this->addColumn('secondseat', 'Secondseat', 'DECIMAL', true, 15, null);
        $this->addColumn('rincrease', 'Rincrease', 'DECIMAL', true, 15, null);
        $this->addColumn('rurl', 'Rurl', 'LONGVARCHAR', true, null, null);
        $this->addColumn('calc_date', 'CalcDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('tshow', 'Tshow', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Rid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliPromotionTableMap::CLASS_DEFAULT : AliPromotionTableMap::OM_CLASS;
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
     * @return array           (AliPromotion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliPromotionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliPromotionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliPromotionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliPromotionTableMap::OM_CLASS;
            /** @var AliPromotion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliPromotionTableMap::addInstanceToPool($obj, $key);
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
            $key = AliPromotionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliPromotionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliPromotion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliPromotionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliPromotionTableMap::COL_RID);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_NAME);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_RDATE);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_CALC);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_RTYPE);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_FIRSTSEAT);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_SECONDSEAT);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_RINCREASE);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_RURL);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_CALC_DATE);
            $criteria->addSelectColumn(AliPromotionTableMap::COL_TSHOW);
        } else {
            $criteria->addSelectColumn($alias . '.rid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.rdate');
            $criteria->addSelectColumn($alias . '.calc');
            $criteria->addSelectColumn($alias . '.remark');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.rtype');
            $criteria->addSelectColumn($alias . '.firstseat');
            $criteria->addSelectColumn($alias . '.secondseat');
            $criteria->addSelectColumn($alias . '.rincrease');
            $criteria->addSelectColumn($alias . '.rurl');
            $criteria->addSelectColumn($alias . '.calc_date');
            $criteria->addSelectColumn($alias . '.tshow');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliPromotionTableMap::DATABASE_NAME)->getTable(AliPromotionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliPromotionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliPromotionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliPromotionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliPromotion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliPromotion object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPromotionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliPromotion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliPromotionTableMap::DATABASE_NAME);
            $criteria->add(AliPromotionTableMap::COL_RID, (array) $values, Criteria::IN);
        }

        $query = AliPromotionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliPromotionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliPromotionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_promotion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliPromotionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliPromotion or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliPromotion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPromotionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliPromotion object
        }

        if ($criteria->containsKey(AliPromotionTableMap::COL_RID) && $criteria->keyContainsValue(AliPromotionTableMap::COL_RID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliPromotionTableMap::COL_RID.')');
        }


        // Set the correct dbName
        $query = AliPromotionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliPromotionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliPromotionTableMap::buildTableMap();
