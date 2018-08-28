<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliPosition2;
use CciOrm\CciOrm\AliPosition2Query;
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
 * This class defines the structure of the 'ali_position2' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliPosition2TableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliPosition2TableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_position2';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliPosition2';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliPosition2';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the posid field
     */
    const COL_POSID = 'ali_position2.posid';

    /**
     * the column name for the posshort field
     */
    const COL_POSSHORT = 'ali_position2.posshort';

    /**
     * the column name for the posname field
     */
    const COL_POSNAME = 'ali_position2.posname';

    /**
     * the column name for the posimg field
     */
    const COL_POSIMG = 'ali_position2.posimg';

    /**
     * the column name for the posutab field
     */
    const COL_POSUTAB = 'ali_position2.posutab';

    /**
     * the column name for the posdtab field
     */
    const COL_POSDTAB = 'ali_position2.posdtab';

    /**
     * the column name for the posdesc field
     */
    const COL_POSDESC = 'ali_position2.posdesc';

    /**
     * the column name for the ud field
     */
    const COL_UD = 'ali_position2.ud';

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
        self::TYPE_PHPNAME       => array('Posid', 'Posshort', 'Posname', 'Posimg', 'Posutab', 'Posdtab', 'Posdesc', 'Ud', ),
        self::TYPE_CAMELNAME     => array('posid', 'posshort', 'posname', 'posimg', 'posutab', 'posdtab', 'posdesc', 'ud', ),
        self::TYPE_COLNAME       => array(AliPosition2TableMap::COL_POSID, AliPosition2TableMap::COL_POSSHORT, AliPosition2TableMap::COL_POSNAME, AliPosition2TableMap::COL_POSIMG, AliPosition2TableMap::COL_POSUTAB, AliPosition2TableMap::COL_POSDTAB, AliPosition2TableMap::COL_POSDESC, AliPosition2TableMap::COL_UD, ),
        self::TYPE_FIELDNAME     => array('posid', 'posshort', 'posname', 'posimg', 'posutab', 'posdtab', 'posdesc', 'ud', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Posid' => 0, 'Posshort' => 1, 'Posname' => 2, 'Posimg' => 3, 'Posutab' => 4, 'Posdtab' => 5, 'Posdesc' => 6, 'Ud' => 7, ),
        self::TYPE_CAMELNAME     => array('posid' => 0, 'posshort' => 1, 'posname' => 2, 'posimg' => 3, 'posutab' => 4, 'posdtab' => 5, 'posdesc' => 6, 'ud' => 7, ),
        self::TYPE_COLNAME       => array(AliPosition2TableMap::COL_POSID => 0, AliPosition2TableMap::COL_POSSHORT => 1, AliPosition2TableMap::COL_POSNAME => 2, AliPosition2TableMap::COL_POSIMG => 3, AliPosition2TableMap::COL_POSUTAB => 4, AliPosition2TableMap::COL_POSDTAB => 5, AliPosition2TableMap::COL_POSDESC => 6, AliPosition2TableMap::COL_UD => 7, ),
        self::TYPE_FIELDNAME     => array('posid' => 0, 'posshort' => 1, 'posname' => 2, 'posimg' => 3, 'posutab' => 4, 'posdtab' => 5, 'posdesc' => 6, 'ud' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('ali_position2');
        $this->setPhpName('AliPosition2');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliPosition2');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('posid', 'Posid', 'INTEGER', true, 2, null);
        $this->addColumn('posshort', 'Posshort', 'VARCHAR', false, 3, null);
        $this->addColumn('posname', 'Posname', 'VARCHAR', false, 255, null);
        $this->addColumn('posimg', 'Posimg', 'VARCHAR', false, 50, null);
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
        return $withPrefix ? AliPosition2TableMap::CLASS_DEFAULT : AliPosition2TableMap::OM_CLASS;
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
     * @return array           (AliPosition2 object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliPosition2TableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliPosition2TableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliPosition2TableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliPosition2TableMap::OM_CLASS;
            /** @var AliPosition2 $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliPosition2TableMap::addInstanceToPool($obj, $key);
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
            $key = AliPosition2TableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliPosition2TableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliPosition2 $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliPosition2TableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliPosition2TableMap::COL_POSID);
            $criteria->addSelectColumn(AliPosition2TableMap::COL_POSSHORT);
            $criteria->addSelectColumn(AliPosition2TableMap::COL_POSNAME);
            $criteria->addSelectColumn(AliPosition2TableMap::COL_POSIMG);
            $criteria->addSelectColumn(AliPosition2TableMap::COL_POSUTAB);
            $criteria->addSelectColumn(AliPosition2TableMap::COL_POSDTAB);
            $criteria->addSelectColumn(AliPosition2TableMap::COL_POSDESC);
            $criteria->addSelectColumn(AliPosition2TableMap::COL_UD);
        } else {
            $criteria->addSelectColumn($alias . '.posid');
            $criteria->addSelectColumn($alias . '.posshort');
            $criteria->addSelectColumn($alias . '.posname');
            $criteria->addSelectColumn($alias . '.posimg');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliPosition2TableMap::DATABASE_NAME)->getTable(AliPosition2TableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliPosition2TableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliPosition2TableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliPosition2TableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliPosition2 or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliPosition2 object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPosition2TableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliPosition2) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliPosition2TableMap::DATABASE_NAME);
            $criteria->add(AliPosition2TableMap::COL_POSID, (array) $values, Criteria::IN);
        }

        $query = AliPosition2Query::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliPosition2TableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliPosition2TableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_position2 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliPosition2Query::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliPosition2 or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliPosition2 object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPosition2TableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliPosition2 object
        }

        if ($criteria->containsKey(AliPosition2TableMap::COL_POSID) && $criteria->keyContainsValue(AliPosition2TableMap::COL_POSID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliPosition2TableMap::COL_POSID.')');
        }


        // Set the correct dbName
        $query = AliPosition2Query::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliPosition2TableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliPosition2TableMap::buildTableMap();
