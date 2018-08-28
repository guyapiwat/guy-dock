<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEsaled;
use CciOrm\CciOrm\AliEsaledQuery;
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
 * This class defines the structure of the 'ali_esaled' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEsaledTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEsaledTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_esaled';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEsaled';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEsaled';

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
     * the column name for the id field
     */
    const COL_ID = 'ali_esaled.id';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_esaled.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_esaled.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_esaled.inv_code';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_esaled.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_esaled.pdesc';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_esaled.mcode';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_esaled.price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_esaled.pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_esaled.bv';

    /**
     * the column name for the fv field
     */
    const COL_FV = 'ali_esaled.fv';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_esaled.qty';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_esaled.amt';

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
        self::TYPE_PHPNAME       => array('Id', 'Sano', 'Sadate', 'InvCode', 'Pcode', 'Pdesc', 'Mcode', 'Price', 'Pv', 'Bv', 'Fv', 'Qty', 'Amt', ),
        self::TYPE_CAMELNAME     => array('id', 'sano', 'sadate', 'invCode', 'pcode', 'pdesc', 'mcode', 'price', 'pv', 'bv', 'fv', 'qty', 'amt', ),
        self::TYPE_COLNAME       => array(AliEsaledTableMap::COL_ID, AliEsaledTableMap::COL_SANO, AliEsaledTableMap::COL_SADATE, AliEsaledTableMap::COL_INV_CODE, AliEsaledTableMap::COL_PCODE, AliEsaledTableMap::COL_PDESC, AliEsaledTableMap::COL_MCODE, AliEsaledTableMap::COL_PRICE, AliEsaledTableMap::COL_PV, AliEsaledTableMap::COL_BV, AliEsaledTableMap::COL_FV, AliEsaledTableMap::COL_QTY, AliEsaledTableMap::COL_AMT, ),
        self::TYPE_FIELDNAME     => array('id', 'sano', 'sadate', 'inv_code', 'pcode', 'pdesc', 'mcode', 'price', 'pv', 'bv', 'fv', 'qty', 'amt', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sano' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Pcode' => 4, 'Pdesc' => 5, 'Mcode' => 6, 'Price' => 7, 'Pv' => 8, 'Bv' => 9, 'Fv' => 10, 'Qty' => 11, 'Amt' => 12, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'invCode' => 3, 'pcode' => 4, 'pdesc' => 5, 'mcode' => 6, 'price' => 7, 'pv' => 8, 'bv' => 9, 'fv' => 10, 'qty' => 11, 'amt' => 12, ),
        self::TYPE_COLNAME       => array(AliEsaledTableMap::COL_ID => 0, AliEsaledTableMap::COL_SANO => 1, AliEsaledTableMap::COL_SADATE => 2, AliEsaledTableMap::COL_INV_CODE => 3, AliEsaledTableMap::COL_PCODE => 4, AliEsaledTableMap::COL_PDESC => 5, AliEsaledTableMap::COL_MCODE => 6, AliEsaledTableMap::COL_PRICE => 7, AliEsaledTableMap::COL_PV => 8, AliEsaledTableMap::COL_BV => 9, AliEsaledTableMap::COL_FV => 10, AliEsaledTableMap::COL_QTY => 11, AliEsaledTableMap::COL_AMT => 12, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'inv_code' => 3, 'pcode' => 4, 'pdesc' => 5, 'mcode' => 6, 'price' => 7, 'pv' => 8, 'bv' => 9, 'fv' => 10, 'qty' => 11, 'amt' => 12, ),
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
        $this->setName('ali_esaled');
        $this->setPhpName('AliEsaled');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEsaled');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 7, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', false, 20, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', false, 100, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 7, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 15, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', false, 15, null);
        $this->addColumn('bv', 'Bv', 'DECIMAL', false, 15, null);
        $this->addColumn('fv', 'Fv', 'DECIMAL', true, 15, null);
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 15, null);
        $this->addColumn('amt', 'Amt', 'DECIMAL', false, 15, null);
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
        return $withPrefix ? AliEsaledTableMap::CLASS_DEFAULT : AliEsaledTableMap::OM_CLASS;
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
     * @return array           (AliEsaled object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEsaledTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEsaledTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEsaledTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEsaledTableMap::OM_CLASS;
            /** @var AliEsaled $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEsaledTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEsaledTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEsaledTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEsaled $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEsaledTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEsaledTableMap::COL_ID);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_SANO);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_PV);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_BV);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_FV);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_QTY);
            $criteria->addSelectColumn(AliEsaledTableMap::COL_AMT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.bv');
            $criteria->addSelectColumn($alias . '.fv');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.amt');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEsaledTableMap::DATABASE_NAME)->getTable(AliEsaledTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEsaledTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEsaledTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEsaledTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEsaled or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEsaled object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEsaledTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEsaled) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEsaledTableMap::DATABASE_NAME);
            $criteria->add(AliEsaledTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEsaledQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEsaledTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEsaledTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_esaled table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEsaledQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEsaled or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEsaled object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEsaledTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEsaled object
        }

        if ($criteria->containsKey(AliEsaledTableMap::COL_ID) && $criteria->keyContainsValue(AliEsaledTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEsaledTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEsaledQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEsaledTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEsaledTableMap::buildTableMap();
