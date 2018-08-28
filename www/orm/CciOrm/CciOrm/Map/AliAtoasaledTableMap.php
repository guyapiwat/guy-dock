<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliAtoasaled;
use CciOrm\CciOrm\AliAtoasaledQuery;
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
 * This class defines the structure of the 'ali_atoasaled' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliAtoasaledTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliAtoasaledTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_atoasaled';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliAtoasaled';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliAtoasaled';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 23;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 23;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_atoasaled.id';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_atoasaled.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_atoasaled.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_atoasaled.inv_code';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_atoasaled.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_atoasaled.pdesc';

    /**
     * the column name for the unit field
     */
    const COL_UNIT = 'ali_atoasaled.unit';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_atoasaled.mcode';

    /**
     * the column name for the cost_price field
     */
    const COL_COST_PRICE = 'ali_atoasaled.cost_price';

    /**
     * the column name for the customer_price field
     */
    const COL_CUSTOMER_PRICE = 'ali_atoasaled.customer_price';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_atoasaled.price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_atoasaled.pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_atoasaled.bv';

    /**
     * the column name for the sppv field
     */
    const COL_SPPV = 'ali_atoasaled.sppv';

    /**
     * the column name for the fv field
     */
    const COL_FV = 'ali_atoasaled.fv';

    /**
     * the column name for the weight field
     */
    const COL_WEIGHT = 'ali_atoasaled.weight';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_atoasaled.qty';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_atoasaled.amt';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_atoasaled.bprice';

    /**
     * the column name for the uidbase field
     */
    const COL_UIDBASE = 'ali_atoasaled.uidbase';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_atoasaled.locationbase';

    /**
     * the column name for the outstanding field
     */
    const COL_OUTSTANDING = 'ali_atoasaled.outstanding';

    /**
     * the column name for the vat field
     */
    const COL_VAT = 'ali_atoasaled.vat';

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
        self::TYPE_PHPNAME       => array('Id', 'Sano', 'Sadate', 'InvCode', 'Pcode', 'Pdesc', 'Unit', 'Mcode', 'CostPrice', 'CustomerPrice', 'Price', 'Pv', 'Bv', 'Sppv', 'Fv', 'Weight', 'Qty', 'Amt', 'Bprice', 'Uidbase', 'Locationbase', 'Outstanding', 'Vat', ),
        self::TYPE_CAMELNAME     => array('id', 'sano', 'sadate', 'invCode', 'pcode', 'pdesc', 'unit', 'mcode', 'costPrice', 'customerPrice', 'price', 'pv', 'bv', 'sppv', 'fv', 'weight', 'qty', 'amt', 'bprice', 'uidbase', 'locationbase', 'outstanding', 'vat', ),
        self::TYPE_COLNAME       => array(AliAtoasaledTableMap::COL_ID, AliAtoasaledTableMap::COL_SANO, AliAtoasaledTableMap::COL_SADATE, AliAtoasaledTableMap::COL_INV_CODE, AliAtoasaledTableMap::COL_PCODE, AliAtoasaledTableMap::COL_PDESC, AliAtoasaledTableMap::COL_UNIT, AliAtoasaledTableMap::COL_MCODE, AliAtoasaledTableMap::COL_COST_PRICE, AliAtoasaledTableMap::COL_CUSTOMER_PRICE, AliAtoasaledTableMap::COL_PRICE, AliAtoasaledTableMap::COL_PV, AliAtoasaledTableMap::COL_BV, AliAtoasaledTableMap::COL_SPPV, AliAtoasaledTableMap::COL_FV, AliAtoasaledTableMap::COL_WEIGHT, AliAtoasaledTableMap::COL_QTY, AliAtoasaledTableMap::COL_AMT, AliAtoasaledTableMap::COL_BPRICE, AliAtoasaledTableMap::COL_UIDBASE, AliAtoasaledTableMap::COL_LOCATIONBASE, AliAtoasaledTableMap::COL_OUTSTANDING, AliAtoasaledTableMap::COL_VAT, ),
        self::TYPE_FIELDNAME     => array('id', 'sano', 'sadate', 'inv_code', 'pcode', 'pdesc', 'unit', 'mcode', 'cost_price', 'customer_price', 'price', 'pv', 'bv', 'sppv', 'fv', 'weight', 'qty', 'amt', 'bprice', 'uidbase', 'locationbase', 'outstanding', 'vat', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Sano' => 1, 'Sadate' => 2, 'InvCode' => 3, 'Pcode' => 4, 'Pdesc' => 5, 'Unit' => 6, 'Mcode' => 7, 'CostPrice' => 8, 'CustomerPrice' => 9, 'Price' => 10, 'Pv' => 11, 'Bv' => 12, 'Sppv' => 13, 'Fv' => 14, 'Weight' => 15, 'Qty' => 16, 'Amt' => 17, 'Bprice' => 18, 'Uidbase' => 19, 'Locationbase' => 20, 'Outstanding' => 21, 'Vat' => 22, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'invCode' => 3, 'pcode' => 4, 'pdesc' => 5, 'unit' => 6, 'mcode' => 7, 'costPrice' => 8, 'customerPrice' => 9, 'price' => 10, 'pv' => 11, 'bv' => 12, 'sppv' => 13, 'fv' => 14, 'weight' => 15, 'qty' => 16, 'amt' => 17, 'bprice' => 18, 'uidbase' => 19, 'locationbase' => 20, 'outstanding' => 21, 'vat' => 22, ),
        self::TYPE_COLNAME       => array(AliAtoasaledTableMap::COL_ID => 0, AliAtoasaledTableMap::COL_SANO => 1, AliAtoasaledTableMap::COL_SADATE => 2, AliAtoasaledTableMap::COL_INV_CODE => 3, AliAtoasaledTableMap::COL_PCODE => 4, AliAtoasaledTableMap::COL_PDESC => 5, AliAtoasaledTableMap::COL_UNIT => 6, AliAtoasaledTableMap::COL_MCODE => 7, AliAtoasaledTableMap::COL_COST_PRICE => 8, AliAtoasaledTableMap::COL_CUSTOMER_PRICE => 9, AliAtoasaledTableMap::COL_PRICE => 10, AliAtoasaledTableMap::COL_PV => 11, AliAtoasaledTableMap::COL_BV => 12, AliAtoasaledTableMap::COL_SPPV => 13, AliAtoasaledTableMap::COL_FV => 14, AliAtoasaledTableMap::COL_WEIGHT => 15, AliAtoasaledTableMap::COL_QTY => 16, AliAtoasaledTableMap::COL_AMT => 17, AliAtoasaledTableMap::COL_BPRICE => 18, AliAtoasaledTableMap::COL_UIDBASE => 19, AliAtoasaledTableMap::COL_LOCATIONBASE => 20, AliAtoasaledTableMap::COL_OUTSTANDING => 21, AliAtoasaledTableMap::COL_VAT => 22, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sano' => 1, 'sadate' => 2, 'inv_code' => 3, 'pcode' => 4, 'pdesc' => 5, 'unit' => 6, 'mcode' => 7, 'cost_price' => 8, 'customer_price' => 9, 'price' => 10, 'pv' => 11, 'bv' => 12, 'sppv' => 13, 'fv' => 14, 'weight' => 15, 'qty' => 16, 'amt' => 17, 'bprice' => 18, 'uidbase' => 19, 'locationbase' => 20, 'outstanding' => 21, 'vat' => 22, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
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
        $this->setName('ali_atoasaled');
        $this->setPhpName('AliAtoasaled');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliAtoasaled');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 7, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', false, 20, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', false, 100, null);
        $this->addColumn('unit', 'Unit', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('cost_price', 'CostPrice', 'DECIMAL', true, 15, null);
        $this->addColumn('customer_price', 'CustomerPrice', 'DECIMAL', true, 15, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 15, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', false, 15, null);
        $this->addColumn('bv', 'Bv', 'DECIMAL', false, 15, null);
        $this->addColumn('sppv', 'Sppv', 'DECIMAL', true, 15, null);
        $this->addColumn('fv', 'Fv', 'DECIMAL', true, 15, null);
        $this->addColumn('weight', 'Weight', 'DECIMAL', true, 15, null);
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 15, null);
        $this->addColumn('amt', 'Amt', 'DECIMAL', false, 15, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('uidbase', 'Uidbase', 'VARCHAR', true, 255, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('outstanding', 'Outstanding', 'VARCHAR', true, 255, null);
        $this->addColumn('vat', 'Vat', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliAtoasaledTableMap::CLASS_DEFAULT : AliAtoasaledTableMap::OM_CLASS;
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
     * @return array           (AliAtoasaled object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliAtoasaledTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliAtoasaledTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliAtoasaledTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliAtoasaledTableMap::OM_CLASS;
            /** @var AliAtoasaled $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliAtoasaledTableMap::addInstanceToPool($obj, $key);
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
            $key = AliAtoasaledTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliAtoasaledTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliAtoasaled $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliAtoasaledTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_ID);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_SANO);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_UNIT);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_COST_PRICE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_CUSTOMER_PRICE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_PV);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_BV);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_SPPV);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_FV);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_WEIGHT);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_QTY);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_AMT);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_UIDBASE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_OUTSTANDING);
            $criteria->addSelectColumn(AliAtoasaledTableMap::COL_VAT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.unit');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.cost_price');
            $criteria->addSelectColumn($alias . '.customer_price');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.bv');
            $criteria->addSelectColumn($alias . '.sppv');
            $criteria->addSelectColumn($alias . '.fv');
            $criteria->addSelectColumn($alias . '.weight');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.amt');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.uidbase');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.outstanding');
            $criteria->addSelectColumn($alias . '.vat');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliAtoasaledTableMap::DATABASE_NAME)->getTable(AliAtoasaledTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliAtoasaledTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliAtoasaledTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliAtoasaledTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliAtoasaled or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliAtoasaled object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAtoasaledTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliAtoasaled) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliAtoasaledTableMap::DATABASE_NAME);
            $criteria->add(AliAtoasaledTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliAtoasaledQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliAtoasaledTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliAtoasaledTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_atoasaled table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliAtoasaledQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliAtoasaled or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliAtoasaled object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAtoasaledTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliAtoasaled object
        }

        if ($criteria->containsKey(AliAtoasaledTableMap::COL_ID) && $criteria->keyContainsValue(AliAtoasaledTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliAtoasaledTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliAtoasaledQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliAtoasaledTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliAtoasaledTableMap::buildTableMap();
