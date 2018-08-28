<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTround;
use CciOrm\CciOrm\AliTroundQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'ali_tround' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTroundTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTroundTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_tround';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTround';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTround';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_tround.rcode';

    /**
     * the column name for the rname field
     */
    const COL_RNAME = 'ali_tround.rname';

    /**
     * the column name for the detail field
     */
    const COL_DETAIL = 'ali_tround.detail';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_tround.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_tround.tdate';

    /**
     * the column name for the rtype field
     */
    const COL_RTYPE = 'ali_tround.rtype';

    /**
     * the column name for the firstseat field
     */
    const COL_FIRSTSEAT = 'ali_tround.firstseat';

    /**
     * the column name for the secondseat field
     */
    const COL_SECONDSEAT = 'ali_tround.secondseat';

    /**
     * the column name for the rincrease field
     */
    const COL_RINCREASE = 'ali_tround.rincrease';

    /**
     * the column name for the rurl field
     */
    const COL_RURL = 'ali_tround.rurl';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_tround.remark';

    /**
     * the column name for the calc field
     */
    const COL_CALC = 'ali_tround.calc';

    /**
     * the column name for the calc_date field
     */
    const COL_CALC_DATE = 'ali_tround.calc_date';

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
        self::TYPE_PHPNAME       => array('Rcode', 'Rname', 'Detail', 'Fdate', 'Tdate', 'Rtype', 'Firstseat', 'Secondseat', 'Rincrease', 'Rurl', 'Remark', 'Calc', 'CalcDate', ),
        self::TYPE_CAMELNAME     => array('rcode', 'rname', 'detail', 'fdate', 'tdate', 'rtype', 'firstseat', 'secondseat', 'rincrease', 'rurl', 'remark', 'calc', 'calcDate', ),
        self::TYPE_COLNAME       => array(AliTroundTableMap::COL_RCODE, AliTroundTableMap::COL_RNAME, AliTroundTableMap::COL_DETAIL, AliTroundTableMap::COL_FDATE, AliTroundTableMap::COL_TDATE, AliTroundTableMap::COL_RTYPE, AliTroundTableMap::COL_FIRSTSEAT, AliTroundTableMap::COL_SECONDSEAT, AliTroundTableMap::COL_RINCREASE, AliTroundTableMap::COL_RURL, AliTroundTableMap::COL_REMARK, AliTroundTableMap::COL_CALC, AliTroundTableMap::COL_CALC_DATE, ),
        self::TYPE_FIELDNAME     => array('rcode', 'rname', 'detail', 'fdate', 'tdate', 'rtype', 'firstseat', 'secondseat', 'rincrease', 'rurl', 'remark', 'calc', 'calc_date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Rcode' => 0, 'Rname' => 1, 'Detail' => 2, 'Fdate' => 3, 'Tdate' => 4, 'Rtype' => 5, 'Firstseat' => 6, 'Secondseat' => 7, 'Rincrease' => 8, 'Rurl' => 9, 'Remark' => 10, 'Calc' => 11, 'CalcDate' => 12, ),
        self::TYPE_CAMELNAME     => array('rcode' => 0, 'rname' => 1, 'detail' => 2, 'fdate' => 3, 'tdate' => 4, 'rtype' => 5, 'firstseat' => 6, 'secondseat' => 7, 'rincrease' => 8, 'rurl' => 9, 'remark' => 10, 'calc' => 11, 'calcDate' => 12, ),
        self::TYPE_COLNAME       => array(AliTroundTableMap::COL_RCODE => 0, AliTroundTableMap::COL_RNAME => 1, AliTroundTableMap::COL_DETAIL => 2, AliTroundTableMap::COL_FDATE => 3, AliTroundTableMap::COL_TDATE => 4, AliTroundTableMap::COL_RTYPE => 5, AliTroundTableMap::COL_FIRSTSEAT => 6, AliTroundTableMap::COL_SECONDSEAT => 7, AliTroundTableMap::COL_RINCREASE => 8, AliTroundTableMap::COL_RURL => 9, AliTroundTableMap::COL_REMARK => 10, AliTroundTableMap::COL_CALC => 11, AliTroundTableMap::COL_CALC_DATE => 12, ),
        self::TYPE_FIELDNAME     => array('rcode' => 0, 'rname' => 1, 'detail' => 2, 'fdate' => 3, 'tdate' => 4, 'rtype' => 5, 'firstseat' => 6, 'secondseat' => 7, 'rincrease' => 8, 'rurl' => 9, 'remark' => 10, 'calc' => 11, 'calc_date' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('ali_tround');
        $this->setPhpName('AliTround');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTround');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('rname', 'Rname', 'VARCHAR', true, 255, null);
        $this->addColumn('detail', 'Detail', 'LONGVARCHAR', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('rtype', 'Rtype', 'INTEGER', true, null, null);
        $this->addColumn('firstseat', 'Firstseat', 'DECIMAL', true, 15, null);
        $this->addColumn('secondseat', 'Secondseat', 'DECIMAL', true, 15, null);
        $this->addColumn('rincrease', 'Rincrease', 'DECIMAL', true, 15, null);
        $this->addColumn('rurl', 'Rurl', 'VARCHAR', true, 255, null);
        $this->addColumn('remark', 'Remark', 'LONGVARCHAR', true, null, null);
        $this->addColumn('calc', 'Calc', 'VARCHAR', true, 255, null);
        $this->addColumn('calc_date', 'CalcDate', 'TIMESTAMP', true, null, null);
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
        return null;
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
        return '';
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
        return $withPrefix ? AliTroundTableMap::CLASS_DEFAULT : AliTroundTableMap::OM_CLASS;
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
     * @return array           (AliTround object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTroundTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTroundTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTroundTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTroundTableMap::OM_CLASS;
            /** @var AliTround $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTroundTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTroundTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTroundTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTround $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTroundTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTroundTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliTroundTableMap::COL_RNAME);
            $criteria->addSelectColumn(AliTroundTableMap::COL_DETAIL);
            $criteria->addSelectColumn(AliTroundTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliTroundTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliTroundTableMap::COL_RTYPE);
            $criteria->addSelectColumn(AliTroundTableMap::COL_FIRSTSEAT);
            $criteria->addSelectColumn(AliTroundTableMap::COL_SECONDSEAT);
            $criteria->addSelectColumn(AliTroundTableMap::COL_RINCREASE);
            $criteria->addSelectColumn(AliTroundTableMap::COL_RURL);
            $criteria->addSelectColumn(AliTroundTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliTroundTableMap::COL_CALC);
            $criteria->addSelectColumn(AliTroundTableMap::COL_CALC_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.rname');
            $criteria->addSelectColumn($alias . '.detail');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.rtype');
            $criteria->addSelectColumn($alias . '.firstseat');
            $criteria->addSelectColumn($alias . '.secondseat');
            $criteria->addSelectColumn($alias . '.rincrease');
            $criteria->addSelectColumn($alias . '.rurl');
            $criteria->addSelectColumn($alias . '.remark');
            $criteria->addSelectColumn($alias . '.calc');
            $criteria->addSelectColumn($alias . '.calc_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTroundTableMap::DATABASE_NAME)->getTable(AliTroundTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTroundTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTroundTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTroundTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTround or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTround object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTroundTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTround) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The AliTround object has no primary key');
        }

        $query = AliTroundQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTroundTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTroundTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_tround table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTroundQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTround or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTround object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTroundTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTround object
        }


        // Set the correct dbName
        $query = AliTroundQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTroundTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTroundTableMap::buildTableMap();
