<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliLogHpv;
use CciOrm\CciOrm\AliLogHpvQuery;
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
 * This class defines the structure of the 'ali_log_hpv' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliLogHpvTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliLogHpvTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_log_hpv';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliLogHpv';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliLogHpv';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_log_hpv.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_log_hpv.mcode';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_log_hpv.inv_code';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_log_hpv.sadate';

    /**
     * the column name for the satime field
     */
    const COL_SATIME = 'ali_log_hpv.satime';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_log_hpv.sano';

    /**
     * the column name for the _in field
     */
    const COL__IN = 'ali_log_hpv._in';

    /**
     * the column name for the _out field
     */
    const COL__OUT = 'ali_log_hpv._out';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_log_hpv.total';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_log_hpv.uid';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_log_hpv.sa_type';

    /**
     * the column name for the _option field
     */
    const COL__OPTION = 'ali_log_hpv._option';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'InvCode', 'Sadate', 'Satime', 'Sano', 'In', 'Out', 'Total', 'Uid', 'SaType', 'Option', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'invCode', 'sadate', 'satime', 'sano', 'in', 'out', 'total', 'uid', 'saType', 'option', ),
        self::TYPE_COLNAME       => array(AliLogHpvTableMap::COL_ID, AliLogHpvTableMap::COL_MCODE, AliLogHpvTableMap::COL_INV_CODE, AliLogHpvTableMap::COL_SADATE, AliLogHpvTableMap::COL_SATIME, AliLogHpvTableMap::COL_SANO, AliLogHpvTableMap::COL__IN, AliLogHpvTableMap::COL__OUT, AliLogHpvTableMap::COL_TOTAL, AliLogHpvTableMap::COL_UID, AliLogHpvTableMap::COL_SA_TYPE, AliLogHpvTableMap::COL__OPTION, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'inv_code', 'sadate', 'satime', 'sano', '_in', '_out', 'total', 'uid', 'sa_type', '_option', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'InvCode' => 2, 'Sadate' => 3, 'Satime' => 4, 'Sano' => 5, 'In' => 6, 'Out' => 7, 'Total' => 8, 'Uid' => 9, 'SaType' => 10, 'Option' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'invCode' => 2, 'sadate' => 3, 'satime' => 4, 'sano' => 5, 'in' => 6, 'out' => 7, 'total' => 8, 'uid' => 9, 'saType' => 10, 'option' => 11, ),
        self::TYPE_COLNAME       => array(AliLogHpvTableMap::COL_ID => 0, AliLogHpvTableMap::COL_MCODE => 1, AliLogHpvTableMap::COL_INV_CODE => 2, AliLogHpvTableMap::COL_SADATE => 3, AliLogHpvTableMap::COL_SATIME => 4, AliLogHpvTableMap::COL_SANO => 5, AliLogHpvTableMap::COL__IN => 6, AliLogHpvTableMap::COL__OUT => 7, AliLogHpvTableMap::COL_TOTAL => 8, AliLogHpvTableMap::COL_UID => 9, AliLogHpvTableMap::COL_SA_TYPE => 10, AliLogHpvTableMap::COL__OPTION => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'inv_code' => 2, 'sadate' => 3, 'satime' => 4, 'sano' => 5, '_in' => 6, '_out' => 7, 'total' => 8, 'uid' => 9, 'sa_type' => 10, '_option' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('ali_log_hpv');
        $this->setPhpName('AliLogHpv');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliLogHpv');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', true, null, null);
        $this->addColumn('satime', 'Satime', 'TIME', true, null, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 255, null);
        $this->addColumn('_in', 'In', 'DECIMAL', true, 15, null);
        $this->addColumn('_out', 'Out', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('sa_type', 'SaType', 'VARCHAR', true, 255, null);
        $this->addColumn('_option', 'Option', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliLogHpvTableMap::CLASS_DEFAULT : AliLogHpvTableMap::OM_CLASS;
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
     * @return array           (AliLogHpv object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliLogHpvTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliLogHpvTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliLogHpvTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliLogHpvTableMap::OM_CLASS;
            /** @var AliLogHpv $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliLogHpvTableMap::addInstanceToPool($obj, $key);
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
            $key = AliLogHpvTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliLogHpvTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliLogHpv $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliLogHpvTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_ID);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_SATIME);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_SANO);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL__IN);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL__OUT);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_UID);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliLogHpvTableMap::COL__OPTION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.satime');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '._in');
            $criteria->addSelectColumn($alias . '._out');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '._option');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliLogHpvTableMap::DATABASE_NAME)->getTable(AliLogHpvTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliLogHpvTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliLogHpvTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliLogHpvTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliLogHpv or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliLogHpv object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogHpvTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliLogHpv) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliLogHpvTableMap::DATABASE_NAME);
            $criteria->add(AliLogHpvTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliLogHpvQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliLogHpvTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliLogHpvTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_log_hpv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliLogHpvQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliLogHpv or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliLogHpv object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogHpvTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliLogHpv object
        }

        if ($criteria->containsKey(AliLogHpvTableMap::COL_ID) && $criteria->keyContainsValue(AliLogHpvTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliLogHpvTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliLogHpvQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliLogHpvTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliLogHpvTableMap::buildTableMap();
