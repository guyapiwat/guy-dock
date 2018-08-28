<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliOstockd;
use CciOrm\CciOrm\AliOstockdQuery;
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
 * This class defines the structure of the 'ali_ostockd' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliOstockdTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliOstockdTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ostockd';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliOstockd';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliOstockd';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_ostockd.id';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_ostockd.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_ostockd.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_ostockd.inv_code';

    /**
     * the column name for the inv_coden field
     */
    const COL_INV_CODEN = 'ali_ostockd.inv_coden';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_ostockd.inv_ref';

    /**
     * the column name for the inv_refn field
     */
    const COL_INV_REFN = 'ali_ostockd.inv_refn';

    /**
     * the column name for the rccode field
     */
    const COL_RCCODE = 'ali_ostockd.rccode';

    /**
     * the column name for the stockist field
     */
    const COL_STOCKIST = 'ali_ostockd.stockist';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_ostockd.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_ostockd.pdesc';

    /**
     * the column name for the unit field
     */
    const COL_UNIT = 'ali_ostockd.unit';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_ostockd.mcode';

    /**
     * the column name for the cost field
     */
    const COL_COST = 'ali_ostockd.cost';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_ostockd.price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_ostockd.pv';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_ostockd.qty';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_ostockd.amt';

    /**
     * the column name for the ctax field
     */
    const COL_CTAX = 'ali_ostockd.ctax';

    /**
     * the column name for the group_id field
     */
    const COL_GROUP_ID = 'ali_ostockd.group_id';

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
        self::TYPE_PHPNAME       => array('Id', 'Sano', 'Sadate', 'InvCode', 'InvCoden', 'InvRef', 'InvRefn', 'Rccode', 'Stockist', 'Pcode', 'Pdesc', 'Unit', 'Mcode', 'Cost', 'Price', 'Pv', 'Qty', 'Amt', 'Ctax', 'GroupId', ),
        self::TYPE_CAMELNAME     => array('id', 'sano', 'sadate', 'invCode', 'invCoden', 'invRef', 'invRefn', 'rccode', 'stockist', 'pcode', 'pdesc', 'unit', 'mcode', 'cost', 'price', 'pv', 'qty', 'amt', 'ctax', 'groupId', ),
        self::TYPE_COLNAME       => array(AliOstockdTableMap::COL_ID, AliOstockdTableMap::COL_SANO, AliOstockdTableMap::COL_SADATE, AliOstockdTableMap::COL_INV_CODE, AliOstockdTableMap::COL_INV_CODEN, AliOstockdTableMap::COL_INV_REF, AliOstockdTableMap::COL_INV_REFN, AliOstockdTableMap::COL_RCCODE, AliOstockdTableMap::COL_STOCKIST, AliOstockdTableMap::COL_PCODE, AliOstockdTableMap::COL_PDESC, AliOstockdTableMap::COL_UNIT, AliOstockdTableMap::COL_MCODE, AliOstockdTableMap::COL_COST, AliOstockdTableMap::COL_PRICE, AliOstockdTableMap::COL_PV, AliOstockdTableMap::COL_QTY, AliOstockdTableMap::COL_AMT, AliOstockdTableMap::COL_CTAX, AliOstockdTableMap::COL_GROUP_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'sano', 'sadate', 'inv_code', 'inv_coden', 'inv_ref', 'inv_refn', 'rccode', 'stockist', 'pcode', 'pdesc', 'unit', 'mcode', 'cost', 'price', 'pv', 'qty', 'amt', 'ctax', 'group_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sano' => 1, 'Sadate' => 2, 'InvCode' => 3, 'InvCoden' => 4, 'InvRef' => 5, 'InvRefn' => 6, 'Rccode' => 7, 'Stockist' => 8, 'Pcode' => 9, 'Pdesc' => 10, 'Unit' => 11, 'Mcode' => 12, 'Cost' => 13, 'Price' => 14, 'Pv' => 15, 'Qty' => 16, 'Amt' => 17, 'Ctax' => 18, 'GroupId' => 19, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'invCode' => 3, 'invCoden' => 4, 'invRef' => 5, 'invRefn' => 6, 'rccode' => 7, 'stockist' => 8, 'pcode' => 9, 'pdesc' => 10, 'unit' => 11, 'mcode' => 12, 'cost' => 13, 'price' => 14, 'pv' => 15, 'qty' => 16, 'amt' => 17, 'ctax' => 18, 'groupId' => 19, ),
        self::TYPE_COLNAME       => array(AliOstockdTableMap::COL_ID => 0, AliOstockdTableMap::COL_SANO => 1, AliOstockdTableMap::COL_SADATE => 2, AliOstockdTableMap::COL_INV_CODE => 3, AliOstockdTableMap::COL_INV_CODEN => 4, AliOstockdTableMap::COL_INV_REF => 5, AliOstockdTableMap::COL_INV_REFN => 6, AliOstockdTableMap::COL_RCCODE => 7, AliOstockdTableMap::COL_STOCKIST => 8, AliOstockdTableMap::COL_PCODE => 9, AliOstockdTableMap::COL_PDESC => 10, AliOstockdTableMap::COL_UNIT => 11, AliOstockdTableMap::COL_MCODE => 12, AliOstockdTableMap::COL_COST => 13, AliOstockdTableMap::COL_PRICE => 14, AliOstockdTableMap::COL_PV => 15, AliOstockdTableMap::COL_QTY => 16, AliOstockdTableMap::COL_AMT => 17, AliOstockdTableMap::COL_CTAX => 18, AliOstockdTableMap::COL_GROUP_ID => 19, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'inv_code' => 3, 'inv_coden' => 4, 'inv_ref' => 5, 'inv_refn' => 6, 'rccode' => 7, 'stockist' => 8, 'pcode' => 9, 'pdesc' => 10, 'unit' => 11, 'mcode' => 12, 'cost' => 13, 'price' => 14, 'pv' => 15, 'qty' => 16, 'amt' => 17, 'ctax' => 18, 'group_id' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('ali_ostockd');
        $this->setPhpName('AliOstockd');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliOstockd');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sano', 'Sano', 'INTEGER', false, null, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('inv_coden', 'InvCoden', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_refn', 'InvRefn', 'VARCHAR', true, 255, null);
        $this->addColumn('rccode', 'Rccode', 'VARCHAR', true, 255, null);
        $this->addColumn('stockist', 'Stockist', 'VARCHAR', true, 255, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', false, 255, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', false, 40, null);
        $this->addColumn('unit', 'Unit', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('cost', 'Cost', 'DECIMAL', true, 15, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 15, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', false, 15, null);
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 15, null);
        $this->addColumn('amt', 'Amt', 'DECIMAL', false, 15, null);
        $this->addColumn('ctax', 'Ctax', 'INTEGER', true, null, null);
        $this->addColumn('group_id', 'GroupId', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliOstockdTableMap::CLASS_DEFAULT : AliOstockdTableMap::OM_CLASS;
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
     * @return array           (AliOstockd object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliOstockdTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliOstockdTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliOstockdTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliOstockdTableMap::OM_CLASS;
            /** @var AliOstockd $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliOstockdTableMap::addInstanceToPool($obj, $key);
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
            $key = AliOstockdTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliOstockdTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliOstockd $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliOstockdTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliOstockdTableMap::COL_ID);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_SANO);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_INV_CODEN);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_INV_REFN);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_RCCODE);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_STOCKIST);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_UNIT);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_COST);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_PV);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_QTY);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_AMT);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_CTAX);
            $criteria->addSelectColumn(AliOstockdTableMap::COL_GROUP_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_coden');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.inv_refn');
            $criteria->addSelectColumn($alias . '.rccode');
            $criteria->addSelectColumn($alias . '.stockist');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.unit');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.cost');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.amt');
            $criteria->addSelectColumn($alias . '.ctax');
            $criteria->addSelectColumn($alias . '.group_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliOstockdTableMap::DATABASE_NAME)->getTable(AliOstockdTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliOstockdTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliOstockdTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliOstockdTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliOstockd or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliOstockd object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliOstockdTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliOstockd) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliOstockdTableMap::DATABASE_NAME);
            $criteria->add(AliOstockdTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliOstockdQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliOstockdTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliOstockdTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ostockd table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliOstockdQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliOstockd or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliOstockd object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliOstockdTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliOstockd object
        }

        if ($criteria->containsKey(AliOstockdTableMap::COL_ID) && $criteria->keyContainsValue(AliOstockdTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliOstockdTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliOstockdQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliOstockdTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliOstockdTableMap::buildTableMap();
