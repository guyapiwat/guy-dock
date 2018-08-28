<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliStructureBinaryRcode;
use CciOrm\CciOrm\AliStructureBinaryRcodeQuery;
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
 * This class defines the structure of the 'ali_structure_binary_rcode' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliStructureBinaryRcodeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliStructureBinaryRcodeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_structure_binary_rcode';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliStructureBinaryRcode';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliStructureBinaryRcode';

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
     * the column name for the id field
     */
    const COL_ID = 'ali_structure_binary_rcode.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_structure_binary_rcode.rcode';

    /**
     * the column name for the mcode_ref field
     */
    const COL_MCODE_REF = 'ali_structure_binary_rcode.mcode_ref';

    /**
     * the column name for the mcode_index field
     */
    const COL_MCODE_INDEX = 'ali_structure_binary_rcode.mcode_index';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_structure_binary_rcode.sp_code';

    /**
     * the column name for the status_terminate field
     */
    const COL_STATUS_TERMINATE = 'ali_structure_binary_rcode.status_terminate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_structure_binary_rcode.pos_cur';

    /**
     * the column name for the pos_cur1 field
     */
    const COL_POS_CUR1 = 'ali_structure_binary_rcode.pos_cur1';

    /**
     * the column name for the pos_cur2 field
     */
    const COL_POS_CUR2 = 'ali_structure_binary_rcode.pos_cur2';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'McodeRef', 'McodeIndex', 'SpCode', 'StatusTerminate', 'PosCur', 'PosCur1', 'PosCur2', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'mcodeRef', 'mcodeIndex', 'spCode', 'statusTerminate', 'posCur', 'posCur1', 'posCur2', ),
        self::TYPE_COLNAME       => array(AliStructureBinaryRcodeTableMap::COL_ID, AliStructureBinaryRcodeTableMap::COL_RCODE, AliStructureBinaryRcodeTableMap::COL_MCODE_REF, AliStructureBinaryRcodeTableMap::COL_MCODE_INDEX, AliStructureBinaryRcodeTableMap::COL_SP_CODE, AliStructureBinaryRcodeTableMap::COL_STATUS_TERMINATE, AliStructureBinaryRcodeTableMap::COL_POS_CUR, AliStructureBinaryRcodeTableMap::COL_POS_CUR1, AliStructureBinaryRcodeTableMap::COL_POS_CUR2, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'mcode_ref', 'mcode_index', 'sp_code', 'status_terminate', 'pos_cur', 'pos_cur1', 'pos_cur2', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'McodeRef' => 2, 'McodeIndex' => 3, 'SpCode' => 4, 'StatusTerminate' => 5, 'PosCur' => 6, 'PosCur1' => 7, 'PosCur2' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'mcodeRef' => 2, 'mcodeIndex' => 3, 'spCode' => 4, 'statusTerminate' => 5, 'posCur' => 6, 'posCur1' => 7, 'posCur2' => 8, ),
        self::TYPE_COLNAME       => array(AliStructureBinaryRcodeTableMap::COL_ID => 0, AliStructureBinaryRcodeTableMap::COL_RCODE => 1, AliStructureBinaryRcodeTableMap::COL_MCODE_REF => 2, AliStructureBinaryRcodeTableMap::COL_MCODE_INDEX => 3, AliStructureBinaryRcodeTableMap::COL_SP_CODE => 4, AliStructureBinaryRcodeTableMap::COL_STATUS_TERMINATE => 5, AliStructureBinaryRcodeTableMap::COL_POS_CUR => 6, AliStructureBinaryRcodeTableMap::COL_POS_CUR1 => 7, AliStructureBinaryRcodeTableMap::COL_POS_CUR2 => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'mcode_ref' => 2, 'mcode_index' => 3, 'sp_code' => 4, 'status_terminate' => 5, 'pos_cur' => 6, 'pos_cur1' => 7, 'pos_cur2' => 8, ),
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
        $this->setName('ali_structure_binary_rcode');
        $this->setPhpName('AliStructureBinaryRcode');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliStructureBinaryRcode');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode_ref', 'McodeRef', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode_index', 'McodeIndex', 'VARCHAR', true, 5000, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('status_terminate', 'StatusTerminate', 'INTEGER', true, 1, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur1', 'PosCur1', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur2', 'PosCur2', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliStructureBinaryRcodeTableMap::CLASS_DEFAULT : AliStructureBinaryRcodeTableMap::OM_CLASS;
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
     * @return array           (AliStructureBinaryRcode object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliStructureBinaryRcodeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliStructureBinaryRcodeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliStructureBinaryRcodeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliStructureBinaryRcodeTableMap::OM_CLASS;
            /** @var AliStructureBinaryRcode $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliStructureBinaryRcodeTableMap::addInstanceToPool($obj, $key);
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
            $key = AliStructureBinaryRcodeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliStructureBinaryRcodeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliStructureBinaryRcode $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliStructureBinaryRcodeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_ID);
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_MCODE_REF);
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_MCODE_INDEX);
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_STATUS_TERMINATE);
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_POS_CUR1);
            $criteria->addSelectColumn(AliStructureBinaryRcodeTableMap::COL_POS_CUR2);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode_ref');
            $criteria->addSelectColumn($alias . '.mcode_index');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.status_terminate');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.pos_cur1');
            $criteria->addSelectColumn($alias . '.pos_cur2');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliStructureBinaryRcodeTableMap::DATABASE_NAME)->getTable(AliStructureBinaryRcodeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliStructureBinaryRcodeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliStructureBinaryRcodeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliStructureBinaryRcodeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliStructureBinaryRcode or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliStructureBinaryRcode object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStructureBinaryRcodeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliStructureBinaryRcode) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliStructureBinaryRcodeTableMap::DATABASE_NAME);
            $criteria->add(AliStructureBinaryRcodeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliStructureBinaryRcodeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliStructureBinaryRcodeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliStructureBinaryRcodeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_structure_binary_rcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliStructureBinaryRcodeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliStructureBinaryRcode or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliStructureBinaryRcode object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStructureBinaryRcodeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliStructureBinaryRcode object
        }

        if ($criteria->containsKey(AliStructureBinaryRcodeTableMap::COL_ID) && $criteria->keyContainsValue(AliStructureBinaryRcodeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliStructureBinaryRcodeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliStructureBinaryRcodeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliStructureBinaryRcodeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliStructureBinaryRcodeTableMap::buildTableMap();
