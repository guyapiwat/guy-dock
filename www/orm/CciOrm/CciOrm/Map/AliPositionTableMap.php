<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliPosition;
use CciOrm\CciOrm\AliPositionQuery;
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
 * This class defines the structure of the 'ali_position' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliPositionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliPositionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_position';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliPosition';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliPosition';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the posid field
     */
    const COL_POSID = 'ali_position.posid';

    /**
     * the column name for the posshort field
     */
    const COL_POSSHORT = 'ali_position.posshort';

    /**
     * the column name for the posname field
     */
    const COL_POSNAME = 'ali_position.posname';

    /**
     * the column name for the posimg field
     */
    const COL_POSIMG = 'ali_position.posimg';

    /**
     * the column name for the posavt field
     */
    const COL_POSAVT = 'ali_position.posavt';

    /**
     * the column name for the posutab field
     */
    const COL_POSUTAB = 'ali_position.posutab';

    /**
     * the column name for the posdtab field
     */
    const COL_POSDTAB = 'ali_position.posdtab';

    /**
     * the column name for the posdesc field
     */
    const COL_POSDESC = 'ali_position.posdesc';

    /**
     * the column name for the ud field
     */
    const COL_UD = 'ali_position.ud';

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
        self::TYPE_PHPNAME       => array('Posid', 'Posshort', 'Posname', 'Posimg', 'Posavt', 'Posutab', 'Posdtab', 'Posdesc', 'Ud', ),
        self::TYPE_CAMELNAME     => array('posid', 'posshort', 'posname', 'posimg', 'posavt', 'posutab', 'posdtab', 'posdesc', 'ud', ),
        self::TYPE_COLNAME       => array(AliPositionTableMap::COL_POSID, AliPositionTableMap::COL_POSSHORT, AliPositionTableMap::COL_POSNAME, AliPositionTableMap::COL_POSIMG, AliPositionTableMap::COL_POSAVT, AliPositionTableMap::COL_POSUTAB, AliPositionTableMap::COL_POSDTAB, AliPositionTableMap::COL_POSDESC, AliPositionTableMap::COL_UD, ),
        self::TYPE_FIELDNAME     => array('posid', 'posshort', 'posname', 'posimg', 'posavt', 'posutab', 'posdtab', 'posdesc', 'ud', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Posid' => 0, 'Posshort' => 1, 'Posname' => 2, 'Posimg' => 3, 'Posavt' => 4, 'Posutab' => 5, 'Posdtab' => 6, 'Posdesc' => 7, 'Ud' => 8, ),
        self::TYPE_CAMELNAME     => array('posid' => 0, 'posshort' => 1, 'posname' => 2, 'posimg' => 3, 'posavt' => 4, 'posutab' => 5, 'posdtab' => 6, 'posdesc' => 7, 'ud' => 8, ),
        self::TYPE_COLNAME       => array(AliPositionTableMap::COL_POSID => 0, AliPositionTableMap::COL_POSSHORT => 1, AliPositionTableMap::COL_POSNAME => 2, AliPositionTableMap::COL_POSIMG => 3, AliPositionTableMap::COL_POSAVT => 4, AliPositionTableMap::COL_POSUTAB => 5, AliPositionTableMap::COL_POSDTAB => 6, AliPositionTableMap::COL_POSDESC => 7, AliPositionTableMap::COL_UD => 8, ),
        self::TYPE_FIELDNAME     => array('posid' => 0, 'posshort' => 1, 'posname' => 2, 'posimg' => 3, 'posavt' => 4, 'posutab' => 5, 'posdtab' => 6, 'posdesc' => 7, 'ud' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('ali_position');
        $this->setPhpName('AliPosition');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliPosition');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('posid', 'Posid', 'INTEGER', true, 2, null);
        $this->addColumn('posshort', 'Posshort', 'VARCHAR', false, 5, null);
        $this->addColumn('posname', 'Posname', 'VARCHAR', false, 255, null);
        $this->addColumn('posimg', 'Posimg', 'VARCHAR', false, 50, null);
        $this->addColumn('posavt', 'Posavt', 'VARCHAR', true, 255, null);
        $this->addColumn('posutab', 'Posutab', 'VARCHAR', false, 10, null);
        $this->addColumn('posdtab', 'Posdtab', 'VARCHAR', false, 10, null);
        $this->addColumn('posdesc', 'Posdesc', 'CHAR', false, 50, null);
        $this->addColumn('ud', 'Ud', 'CHAR', false, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Posid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Posid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Posid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Posid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Posid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Posid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Posid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliPositionTableMap::CLASS_DEFAULT : AliPositionTableMap::OM_CLASS;
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
     * @return array           (AliPosition object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliPositionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliPositionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliPositionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliPositionTableMap::OM_CLASS;
            /** @var AliPosition $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliPositionTableMap::addInstanceToPool($obj, $key);
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
            $key = AliPositionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliPositionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliPosition $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliPositionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliPositionTableMap::COL_POSID);
            $criteria->addSelectColumn(AliPositionTableMap::COL_POSSHORT);
            $criteria->addSelectColumn(AliPositionTableMap::COL_POSNAME);
            $criteria->addSelectColumn(AliPositionTableMap::COL_POSIMG);
            $criteria->addSelectColumn(AliPositionTableMap::COL_POSAVT);
            $criteria->addSelectColumn(AliPositionTableMap::COL_POSUTAB);
            $criteria->addSelectColumn(AliPositionTableMap::COL_POSDTAB);
            $criteria->addSelectColumn(AliPositionTableMap::COL_POSDESC);
            $criteria->addSelectColumn(AliPositionTableMap::COL_UD);
        } else {
            $criteria->addSelectColumn($alias . '.posid');
            $criteria->addSelectColumn($alias . '.posshort');
            $criteria->addSelectColumn($alias . '.posname');
            $criteria->addSelectColumn($alias . '.posimg');
            $criteria->addSelectColumn($alias . '.posavt');
            $criteria->addSelectColumn($alias . '.posutab');
            $criteria->addSelectColumn($alias . '.posdtab');
            $criteria->addSelectColumn($alias . '.posdesc');
            $criteria->addSelectColumn($alias . '.ud');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliPositionTableMap::DATABASE_NAME)->getTable(AliPositionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliPositionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliPositionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliPositionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliPosition or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliPosition object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPositionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliPosition) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliPositionTableMap::DATABASE_NAME);
            $criteria->add(AliPositionTableMap::COL_POSID, (array) $values, Criteria::IN);
        }

        $query = AliPositionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliPositionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliPositionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_position table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliPositionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliPosition or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliPosition object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPositionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliPosition object
        }

        if ($criteria->containsKey(AliPositionTableMap::COL_POSID) && $criteria->keyContainsValue(AliPositionTableMap::COL_POSID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliPositionTableMap::COL_POSID.')');
        }


        // Set the correct dbName
        $query = AliPositionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliPositionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliPositionTableMap::buildTableMap();
