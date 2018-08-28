<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTempAd;
use CciOrm\CciOrm\AliTempAdQuery;
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
 * This class defines the structure of the 'ali_temp_ad' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTempAdTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTempAdTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_temp_ad';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTempAd';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTempAd';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_temp_ad.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_temp_ad.mcode';

    /**
     * the column name for the bdate field
     */
    const COL_BDATE = 'ali_temp_ad.bdate';

    /**
     * the column name for the lr1 field
     */
    const COL_LR1 = 'ali_temp_ad.lr1';

    /**
     * the column name for the rcode_l field
     */
    const COL_RCODE_L = 'ali_temp_ad.rcode_l';

    /**
     * the column name for the level_l field
     */
    const COL_LEVEL_L = 'ali_temp_ad.level_l';

    /**
     * the column name for the mcode_l field
     */
    const COL_MCODE_L = 'ali_temp_ad.mcode_l';

    /**
     * the column name for the sano_l field
     */
    const COL_SANO_L = 'ali_temp_ad.sano_l';

    /**
     * the column name for the rcode_r field
     */
    const COL_RCODE_R = 'ali_temp_ad.rcode_r';

    /**
     * the column name for the level_r field
     */
    const COL_LEVEL_R = 'ali_temp_ad.level_r';

    /**
     * the column name for the mcode_r field
     */
    const COL_MCODE_R = 'ali_temp_ad.mcode_r';

    /**
     * the column name for the sano_r field
     */
    const COL_SANO_R = 'ali_temp_ad.sano_r';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_temp_ad.total';

    /**
     * the column name for the flag field
     */
    const COL_FLAG = 'ali_temp_ad.flag';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'Bdate', 'Lr1', 'RcodeL', 'LevelL', 'McodeL', 'SanoL', 'RcodeR', 'LevelR', 'McodeR', 'SanoR', 'Total', 'Flag', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'bdate', 'lr1', 'rcodeL', 'levelL', 'mcodeL', 'sanoL', 'rcodeR', 'levelR', 'mcodeR', 'sanoR', 'total', 'flag', ),
        self::TYPE_COLNAME       => array(AliTempAdTableMap::COL_ID, AliTempAdTableMap::COL_MCODE, AliTempAdTableMap::COL_BDATE, AliTempAdTableMap::COL_LR1, AliTempAdTableMap::COL_RCODE_L, AliTempAdTableMap::COL_LEVEL_L, AliTempAdTableMap::COL_MCODE_L, AliTempAdTableMap::COL_SANO_L, AliTempAdTableMap::COL_RCODE_R, AliTempAdTableMap::COL_LEVEL_R, AliTempAdTableMap::COL_MCODE_R, AliTempAdTableMap::COL_SANO_R, AliTempAdTableMap::COL_TOTAL, AliTempAdTableMap::COL_FLAG, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'bdate', 'lr1', 'rcode_l', 'level_l', 'mcode_l', 'sano_l', 'rcode_r', 'level_r', 'mcode_r', 'sano_r', 'total', 'flag', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'Bdate' => 2, 'Lr1' => 3, 'RcodeL' => 4, 'LevelL' => 5, 'McodeL' => 6, 'SanoL' => 7, 'RcodeR' => 8, 'LevelR' => 9, 'McodeR' => 10, 'SanoR' => 11, 'Total' => 12, 'Flag' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'bdate' => 2, 'lr1' => 3, 'rcodeL' => 4, 'levelL' => 5, 'mcodeL' => 6, 'sanoL' => 7, 'rcodeR' => 8, 'levelR' => 9, 'mcodeR' => 10, 'sanoR' => 11, 'total' => 12, 'flag' => 13, ),
        self::TYPE_COLNAME       => array(AliTempAdTableMap::COL_ID => 0, AliTempAdTableMap::COL_MCODE => 1, AliTempAdTableMap::COL_BDATE => 2, AliTempAdTableMap::COL_LR1 => 3, AliTempAdTableMap::COL_RCODE_L => 4, AliTempAdTableMap::COL_LEVEL_L => 5, AliTempAdTableMap::COL_MCODE_L => 6, AliTempAdTableMap::COL_SANO_L => 7, AliTempAdTableMap::COL_RCODE_R => 8, AliTempAdTableMap::COL_LEVEL_R => 9, AliTempAdTableMap::COL_MCODE_R => 10, AliTempAdTableMap::COL_SANO_R => 11, AliTempAdTableMap::COL_TOTAL => 12, AliTempAdTableMap::COL_FLAG => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'bdate' => 2, 'lr1' => 3, 'rcode_l' => 4, 'level_l' => 5, 'mcode_l' => 6, 'sano_l' => 7, 'rcode_r' => 8, 'level_r' => 9, 'mcode_r' => 10, 'sano_r' => 11, 'total' => 12, 'flag' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('ali_temp_ad');
        $this->setPhpName('AliTempAd');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTempAd');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 7, null);
        $this->addColumn('bdate', 'Bdate', 'DATE', false, null, null);
        $this->addColumn('lr1', 'Lr1', 'VARCHAR', false, 2, null);
        $this->addColumn('rcode_l', 'RcodeL', 'VARCHAR', false, 5, null);
        $this->addColumn('level_l', 'LevelL', 'DECIMAL', false, 15, null);
        $this->addColumn('mcode_l', 'McodeL', 'VARCHAR', false, 7, null);
        $this->addColumn('sano_l', 'SanoL', 'VARCHAR', false, 7, null);
        $this->addColumn('rcode_r', 'RcodeR', 'VARCHAR', false, 5, null);
        $this->addColumn('level_r', 'LevelR', 'DECIMAL', false, 15, null);
        $this->addColumn('mcode_r', 'McodeR', 'VARCHAR', false, 7, null);
        $this->addColumn('sano_r', 'SanoR', 'VARCHAR', false, 7, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('flag', 'Flag', 'VARCHAR', false, 1, null);
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
        return $withPrefix ? AliTempAdTableMap::CLASS_DEFAULT : AliTempAdTableMap::OM_CLASS;
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
     * @return array           (AliTempAd object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTempAdTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTempAdTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTempAdTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTempAdTableMap::OM_CLASS;
            /** @var AliTempAd $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTempAdTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTempAdTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTempAdTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTempAd $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTempAdTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTempAdTableMap::COL_ID);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_BDATE);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_LR1);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_RCODE_L);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_LEVEL_L);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_MCODE_L);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_SANO_L);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_RCODE_R);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_LEVEL_R);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_MCODE_R);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_SANO_R);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliTempAdTableMap::COL_FLAG);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.bdate');
            $criteria->addSelectColumn($alias . '.lr1');
            $criteria->addSelectColumn($alias . '.rcode_l');
            $criteria->addSelectColumn($alias . '.level_l');
            $criteria->addSelectColumn($alias . '.mcode_l');
            $criteria->addSelectColumn($alias . '.sano_l');
            $criteria->addSelectColumn($alias . '.rcode_r');
            $criteria->addSelectColumn($alias . '.level_r');
            $criteria->addSelectColumn($alias . '.mcode_r');
            $criteria->addSelectColumn($alias . '.sano_r');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.flag');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTempAdTableMap::DATABASE_NAME)->getTable(AliTempAdTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTempAdTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTempAdTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTempAdTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTempAd or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTempAd object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTempAdTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTempAd) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTempAdTableMap::DATABASE_NAME);
            $criteria->add(AliTempAdTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliTempAdQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTempAdTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTempAdTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_temp_ad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTempAdQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTempAd or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTempAd object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTempAdTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTempAd object
        }

        if ($criteria->containsKey(AliTempAdTableMap::COL_ID) && $criteria->keyContainsValue(AliTempAdTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTempAdTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliTempAdQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTempAdTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTempAdTableMap::buildTableMap();
