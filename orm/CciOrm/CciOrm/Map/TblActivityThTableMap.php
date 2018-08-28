<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\TblActivityTh;
use CciOrm\CciOrm\TblActivityThQuery;
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
 * This class defines the structure of the 'tbl_activity_th' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TblActivityThTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.TblActivityThTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tbl_activity_th';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\TblActivityTh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.TblActivityTh';

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
     * the column name for the act_id field
     */
    const COL_ACT_ID = 'tbl_activity_th.act_id';

    /**
     * the column name for the short field
     */
    const COL_SHORT = 'tbl_activity_th.short';

    /**
     * the column name for the act_name field
     */
    const COL_ACT_NAME = 'tbl_activity_th.act_name';

    /**
     * the column name for the desc_s field
     */
    const COL_DESC_S = 'tbl_activity_th.desc_s';

    /**
     * the column name for the desc_l field
     */
    const COL_DESC_L = 'tbl_activity_th.desc_l';

    /**
     * the column name for the image field
     */
    const COL_IMAGE = 'tbl_activity_th.image';

    /**
     * the column name for the imageSlide field
     */
    const COL_IMAGESLIDE = 'tbl_activity_th.imageSlide';

    /**
     * the column name for the start_date field
     */
    const COL_START_DATE = 'tbl_activity_th.start_date';

    /**
     * the column name for the end_date field
     */
    const COL_END_DATE = 'tbl_activity_th.end_date';

    /**
     * the column name for the slideshow field
     */
    const COL_SLIDESHOW = 'tbl_activity_th.slideshow';

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
        self::TYPE_PHPNAME       => array('ActId', 'Short', 'ActName', 'DescS', 'DescL', 'Image', 'Imageslide', 'StartDate', 'EndDate', 'Slideshow', ),
        self::TYPE_CAMELNAME     => array('actId', 'short', 'actName', 'descS', 'descL', 'image', 'imageslide', 'startDate', 'endDate', 'slideshow', ),
        self::TYPE_COLNAME       => array(TblActivityThTableMap::COL_ACT_ID, TblActivityThTableMap::COL_SHORT, TblActivityThTableMap::COL_ACT_NAME, TblActivityThTableMap::COL_DESC_S, TblActivityThTableMap::COL_DESC_L, TblActivityThTableMap::COL_IMAGE, TblActivityThTableMap::COL_IMAGESLIDE, TblActivityThTableMap::COL_START_DATE, TblActivityThTableMap::COL_END_DATE, TblActivityThTableMap::COL_SLIDESHOW, ),
        self::TYPE_FIELDNAME     => array('act_id', 'short', 'act_name', 'desc_s', 'desc_l', 'image', 'imageSlide', 'start_date', 'end_date', 'slideshow', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ActId' => 0, 'Short' => 1, 'ActName' => 2, 'DescS' => 3, 'DescL' => 4, 'Image' => 5, 'Imageslide' => 6, 'StartDate' => 7, 'EndDate' => 8, 'Slideshow' => 9, ),
        self::TYPE_CAMELNAME     => array('actId' => 0, 'short' => 1, 'actName' => 2, 'descS' => 3, 'descL' => 4, 'image' => 5, 'imageslide' => 6, 'startDate' => 7, 'endDate' => 8, 'slideshow' => 9, ),
        self::TYPE_COLNAME       => array(TblActivityThTableMap::COL_ACT_ID => 0, TblActivityThTableMap::COL_SHORT => 1, TblActivityThTableMap::COL_ACT_NAME => 2, TblActivityThTableMap::COL_DESC_S => 3, TblActivityThTableMap::COL_DESC_L => 4, TblActivityThTableMap::COL_IMAGE => 5, TblActivityThTableMap::COL_IMAGESLIDE => 6, TblActivityThTableMap::COL_START_DATE => 7, TblActivityThTableMap::COL_END_DATE => 8, TblActivityThTableMap::COL_SLIDESHOW => 9, ),
        self::TYPE_FIELDNAME     => array('act_id' => 0, 'short' => 1, 'act_name' => 2, 'desc_s' => 3, 'desc_l' => 4, 'image' => 5, 'imageSlide' => 6, 'start_date' => 7, 'end_date' => 8, 'slideshow' => 9, ),
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
        $this->setName('tbl_activity_th');
        $this->setPhpName('TblActivityTh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\TblActivityTh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('act_id', 'ActId', 'INTEGER', true, 5, null);
        $this->addColumn('short', 'Short', 'VARCHAR', true, 5, null);
        $this->addColumn('act_name', 'ActName', 'VARCHAR', true, 255, null);
        $this->addColumn('desc_s', 'DescS', 'LONGVARCHAR', true, null, null);
        $this->addColumn('desc_l', 'DescL', 'LONGVARCHAR', true, null, null);
        $this->addColumn('image', 'Image', 'VARCHAR', true, 200, null);
        $this->addColumn('imageSlide', 'Imageslide', 'VARCHAR', true, 100, null);
        $this->addColumn('start_date', 'StartDate', 'VARCHAR', true, 200, null);
        $this->addColumn('end_date', 'EndDate', 'VARCHAR', true, 200, null);
        $this->addColumn('slideshow', 'Slideshow', 'VARCHAR', true, 5, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ActId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ActId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? TblActivityThTableMap::CLASS_DEFAULT : TblActivityThTableMap::OM_CLASS;
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
     * @return array           (TblActivityTh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TblActivityThTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TblActivityThTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TblActivityThTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TblActivityThTableMap::OM_CLASS;
            /** @var TblActivityTh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TblActivityThTableMap::addInstanceToPool($obj, $key);
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
            $key = TblActivityThTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TblActivityThTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var TblActivityTh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TblActivityThTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TblActivityThTableMap::COL_ACT_ID);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_SHORT);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_ACT_NAME);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_DESC_S);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_DESC_L);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_IMAGE);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_IMAGESLIDE);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_START_DATE);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_END_DATE);
            $criteria->addSelectColumn(TblActivityThTableMap::COL_SLIDESHOW);
        } else {
            $criteria->addSelectColumn($alias . '.act_id');
            $criteria->addSelectColumn($alias . '.short');
            $criteria->addSelectColumn($alias . '.act_name');
            $criteria->addSelectColumn($alias . '.desc_s');
            $criteria->addSelectColumn($alias . '.desc_l');
            $criteria->addSelectColumn($alias . '.image');
            $criteria->addSelectColumn($alias . '.imageSlide');
            $criteria->addSelectColumn($alias . '.start_date');
            $criteria->addSelectColumn($alias . '.end_date');
            $criteria->addSelectColumn($alias . '.slideshow');
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
        return Propel::getServiceContainer()->getDatabaseMap(TblActivityThTableMap::DATABASE_NAME)->getTable(TblActivityThTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TblActivityThTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TblActivityThTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TblActivityThTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a TblActivityTh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or TblActivityTh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TblActivityThTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\TblActivityTh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TblActivityThTableMap::DATABASE_NAME);
            $criteria->add(TblActivityThTableMap::COL_ACT_ID, (array) $values, Criteria::IN);
        }

        $query = TblActivityThQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TblActivityThTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TblActivityThTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tbl_activity_th table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TblActivityThQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a TblActivityTh or Criteria object.
     *
     * @param mixed               $criteria Criteria or TblActivityTh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblActivityThTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from TblActivityTh object
        }

        if ($criteria->containsKey(TblActivityThTableMap::COL_ACT_ID) && $criteria->keyContainsValue(TblActivityThTableMap::COL_ACT_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TblActivityThTableMap::COL_ACT_ID.')');
        }


        // Set the correct dbName
        $query = TblActivityThQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TblActivityThTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TblActivityThTableMap::buildTableMap();
