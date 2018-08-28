<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliProduct;
use CciOrm\CciOrm\AliProductQuery;
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
 * This class defines the structure of the 'ali_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliProductTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliProductTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_product';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliProduct';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliProduct';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 33;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 33;

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_product.pcode';

    /**
     * the column name for the group_id field
     */
    const COL_GROUP_ID = 'ali_product.group_id';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_product.pdesc';

    /**
     * the column name for the unit field
     */
    const COL_UNIT = 'ali_product.unit';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_product.price';

    /**
     * the column name for the vat field
     */
    const COL_VAT = 'ali_product.vat';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_product.bprice';

    /**
     * the column name for the personel_price field
     */
    const COL_PERSONEL_PRICE = 'ali_product.personel_price';

    /**
     * the column name for the customer_price field
     */
    const COL_CUSTOMER_PRICE = 'ali_product.customer_price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_product.pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_product.bv';

    /**
     * the column name for the fv field
     */
    const COL_FV = 'ali_product.fv';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_product.qty';

    /**
     * the column name for the ud field
     */
    const COL_UD = 'ali_product.ud';

    /**
     * the column name for the sync field
     */
    const COL_SYNC = 'ali_product.sync';

    /**
     * the column name for the web field
     */
    const COL_WEB = 'ali_product.web';

    /**
     * the column name for the st field
     */
    const COL_ST = 'ali_product.st';

    /**
     * the column name for the sst field
     */
    const COL_SST = 'ali_product.sst';

    /**
     * the column name for the bf field
     */
    const COL_BF = 'ali_product.bf';

    /**
     * the column name for the sh field
     */
    const COL_SH = 'ali_product.sh';

    /**
     * the column name for the pcode_stock field
     */
    const COL_PCODE_STOCK = 'ali_product.pcode_stock';

    /**
     * the column name for the sup_code field
     */
    const COL_SUP_CODE = 'ali_product.sup_code';

    /**
     * the column name for the weight field
     */
    const COL_WEIGHT = 'ali_product.weight';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_product.locationbase';

    /**
     * the column name for the barcode field
     */
    const COL_BARCODE = 'ali_product.barcode';

    /**
     * the column name for the picture field
     */
    const COL_PICTURE = 'ali_product.picture';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_product.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_product.tdate';

    /**
     * the column name for the sa_type_a field
     */
    const COL_SA_TYPE_A = 'ali_product.sa_type_a';

    /**
     * the column name for the sa_type_h field
     */
    const COL_SA_TYPE_H = 'ali_product.sa_type_h';

    /**
     * the column name for the qtyr field
     */
    const COL_QTYR = 'ali_product.qtyr';

    /**
     * the column name for the ato field
     */
    const COL_ATO = 'ali_product.ato';

    /**
     * the column name for the product_img field
     */
    const COL_PRODUCT_IMG = 'ali_product.product_img';

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
        self::TYPE_PHPNAME       => array('Pcode', 'GroupId', 'Pdesc', 'Unit', 'Price', 'Vat', 'Bprice', 'PersonelPrice', 'CustomerPrice', 'Pv', 'Bv', 'Fv', 'Qty', 'Ud', 'Sync', 'Web', 'St', 'Sst', 'Bf', 'Sh', 'PcodeStock', 'SupCode', 'Weight', 'Locationbase', 'Barcode', 'Picture', 'Fdate', 'Tdate', 'SaTypeA', 'SaTypeH', 'Qtyr', 'Ato', 'ProductImg', ),
        self::TYPE_CAMELNAME     => array('pcode', 'groupId', 'pdesc', 'unit', 'price', 'vat', 'bprice', 'personelPrice', 'customerPrice', 'pv', 'bv', 'fv', 'qty', 'ud', 'sync', 'web', 'st', 'sst', 'bf', 'sh', 'pcodeStock', 'supCode', 'weight', 'locationbase', 'barcode', 'picture', 'fdate', 'tdate', 'saTypeA', 'saTypeH', 'qtyr', 'ato', 'productImg', ),
        self::TYPE_COLNAME       => array(AliProductTableMap::COL_PCODE, AliProductTableMap::COL_GROUP_ID, AliProductTableMap::COL_PDESC, AliProductTableMap::COL_UNIT, AliProductTableMap::COL_PRICE, AliProductTableMap::COL_VAT, AliProductTableMap::COL_BPRICE, AliProductTableMap::COL_PERSONEL_PRICE, AliProductTableMap::COL_CUSTOMER_PRICE, AliProductTableMap::COL_PV, AliProductTableMap::COL_BV, AliProductTableMap::COL_FV, AliProductTableMap::COL_QTY, AliProductTableMap::COL_UD, AliProductTableMap::COL_SYNC, AliProductTableMap::COL_WEB, AliProductTableMap::COL_ST, AliProductTableMap::COL_SST, AliProductTableMap::COL_BF, AliProductTableMap::COL_SH, AliProductTableMap::COL_PCODE_STOCK, AliProductTableMap::COL_SUP_CODE, AliProductTableMap::COL_WEIGHT, AliProductTableMap::COL_LOCATIONBASE, AliProductTableMap::COL_BARCODE, AliProductTableMap::COL_PICTURE, AliProductTableMap::COL_FDATE, AliProductTableMap::COL_TDATE, AliProductTableMap::COL_SA_TYPE_A, AliProductTableMap::COL_SA_TYPE_H, AliProductTableMap::COL_QTYR, AliProductTableMap::COL_ATO, AliProductTableMap::COL_PRODUCT_IMG, ),
        self::TYPE_FIELDNAME     => array('pcode', 'group_id', 'pdesc', 'unit', 'price', 'vat', 'bprice', 'personel_price', 'customer_price', 'pv', 'bv', 'fv', 'qty', 'ud', 'sync', 'web', 'st', 'sst', 'bf', 'sh', 'pcode_stock', 'sup_code', 'weight', 'locationbase', 'barcode', 'picture', 'fdate', 'tdate', 'sa_type_a', 'sa_type_h', 'qtyr', 'ato', 'product_img', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Pcode' => 0, 'GroupId' => 1, 'Pdesc' => 2, 'Unit' => 3, 'Price' => 4, 'Vat' => 5, 'Bprice' => 6, 'PersonelPrice' => 7, 'CustomerPrice' => 8, 'Pv' => 9, 'Bv' => 10, 'Fv' => 11, 'Qty' => 12, 'Ud' => 13, 'Sync' => 14, 'Web' => 15, 'St' => 16, 'Sst' => 17, 'Bf' => 18, 'Sh' => 19, 'PcodeStock' => 20, 'SupCode' => 21, 'Weight' => 22, 'Locationbase' => 23, 'Barcode' => 24, 'Picture' => 25, 'Fdate' => 26, 'Tdate' => 27, 'SaTypeA' => 28, 'SaTypeH' => 29, 'Qtyr' => 30, 'Ato' => 31, 'ProductImg' => 32, ),
        self::TYPE_CAMELNAME     => array('pcode' => 0, 'groupId' => 1, 'pdesc' => 2, 'unit' => 3, 'price' => 4, 'vat' => 5, 'bprice' => 6, 'personelPrice' => 7, 'customerPrice' => 8, 'pv' => 9, 'bv' => 10, 'fv' => 11, 'qty' => 12, 'ud' => 13, 'sync' => 14, 'web' => 15, 'st' => 16, 'sst' => 17, 'bf' => 18, 'sh' => 19, 'pcodeStock' => 20, 'supCode' => 21, 'weight' => 22, 'locationbase' => 23, 'barcode' => 24, 'picture' => 25, 'fdate' => 26, 'tdate' => 27, 'saTypeA' => 28, 'saTypeH' => 29, 'qtyr' => 30, 'ato' => 31, 'productImg' => 32, ),
        self::TYPE_COLNAME       => array(AliProductTableMap::COL_PCODE => 0, AliProductTableMap::COL_GROUP_ID => 1, AliProductTableMap::COL_PDESC => 2, AliProductTableMap::COL_UNIT => 3, AliProductTableMap::COL_PRICE => 4, AliProductTableMap::COL_VAT => 5, AliProductTableMap::COL_BPRICE => 6, AliProductTableMap::COL_PERSONEL_PRICE => 7, AliProductTableMap::COL_CUSTOMER_PRICE => 8, AliProductTableMap::COL_PV => 9, AliProductTableMap::COL_BV => 10, AliProductTableMap::COL_FV => 11, AliProductTableMap::COL_QTY => 12, AliProductTableMap::COL_UD => 13, AliProductTableMap::COL_SYNC => 14, AliProductTableMap::COL_WEB => 15, AliProductTableMap::COL_ST => 16, AliProductTableMap::COL_SST => 17, AliProductTableMap::COL_BF => 18, AliProductTableMap::COL_SH => 19, AliProductTableMap::COL_PCODE_STOCK => 20, AliProductTableMap::COL_SUP_CODE => 21, AliProductTableMap::COL_WEIGHT => 22, AliProductTableMap::COL_LOCATIONBASE => 23, AliProductTableMap::COL_BARCODE => 24, AliProductTableMap::COL_PICTURE => 25, AliProductTableMap::COL_FDATE => 26, AliProductTableMap::COL_TDATE => 27, AliProductTableMap::COL_SA_TYPE_A => 28, AliProductTableMap::COL_SA_TYPE_H => 29, AliProductTableMap::COL_QTYR => 30, AliProductTableMap::COL_ATO => 31, AliProductTableMap::COL_PRODUCT_IMG => 32, ),
        self::TYPE_FIELDNAME     => array('pcode' => 0, 'group_id' => 1, 'pdesc' => 2, 'unit' => 3, 'price' => 4, 'vat' => 5, 'bprice' => 6, 'personel_price' => 7, 'customer_price' => 8, 'pv' => 9, 'bv' => 10, 'fv' => 11, 'qty' => 12, 'ud' => 13, 'sync' => 14, 'web' => 15, 'st' => 16, 'sst' => 17, 'bf' => 18, 'sh' => 19, 'pcode_stock' => 20, 'sup_code' => 21, 'weight' => 22, 'locationbase' => 23, 'barcode' => 24, 'picture' => 25, 'fdate' => 26, 'tdate' => 27, 'sa_type_a' => 28, 'sa_type_h' => 29, 'qtyr' => 30, 'ato' => 31, 'product_img' => 32, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
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
        $this->setName('ali_product');
        $this->setPhpName('AliProduct');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliProduct');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pcode', 'Pcode', 'VARCHAR', true, 20, '');
        $this->addColumn('group_id', 'GroupId', 'INTEGER', true, null, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', false, 100, null);
        $this->addColumn('unit', 'Unit', 'VARCHAR', false, 10, null);
        $this->addColumn('price', 'Price', 'INTEGER', false, null, null);
        $this->addColumn('vat', 'Vat', 'DECIMAL', true, 15, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('personel_price', 'PersonelPrice', 'DECIMAL', true, 15, null);
        $this->addColumn('customer_price', 'CustomerPrice', 'DECIMAL', true, 15, null);
        $this->addColumn('pv', 'Pv', 'INTEGER', false, null, null);
        $this->addColumn('bv', 'Bv', 'DECIMAL', false, 10, null);
        $this->addColumn('fv', 'Fv', 'DECIMAL', true, 10, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', false, null, null);
        $this->addColumn('ud', 'Ud', 'CHAR', true, null, null);
        $this->addColumn('sync', 'Sync', 'VARCHAR', false, 1, null);
        $this->addColumn('web', 'Web', 'VARCHAR', false, 1, null);
        $this->addColumn('st', 'St', 'INTEGER', false, 1, null);
        $this->addColumn('sst', 'Sst', 'INTEGER', true, null, null);
        $this->addColumn('bf', 'Bf', 'INTEGER', true, null, null);
        $this->addColumn('sh', 'Sh', 'CHAR', false, null, '');
        $this->addColumn('pcode_stock', 'PcodeStock', 'VARCHAR', false, 20, null);
        $this->addColumn('sup_code', 'SupCode', 'VARCHAR', true, 255, null);
        $this->addColumn('weight', 'Weight', 'DECIMAL', true, 15, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('barcode', 'Barcode', 'VARCHAR', true, 255, null);
        $this->addColumn('picture', 'Picture', 'VARCHAR', true, 255, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('sa_type_a', 'SaTypeA', 'INTEGER', true, null, null);
        $this->addColumn('sa_type_h', 'SaTypeH', 'INTEGER', true, null, null);
        $this->addColumn('qtyr', 'Qtyr', 'INTEGER', true, null, null);
        $this->addColumn('ato', 'Ato', 'INTEGER', true, null, null);
        $this->addColumn('product_img', 'ProductImg', 'VARCHAR', true, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliProductTableMap::CLASS_DEFAULT : AliProductTableMap::OM_CLASS;
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
     * @return array           (AliProduct object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliProductTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliProductTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliProductTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliProductTableMap::OM_CLASS;
            /** @var AliProduct $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliProductTableMap::addInstanceToPool($obj, $key);
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
            $key = AliProductTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliProductTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliProduct $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliProductTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliProductTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliProductTableMap::COL_GROUP_ID);
            $criteria->addSelectColumn(AliProductTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliProductTableMap::COL_UNIT);
            $criteria->addSelectColumn(AliProductTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliProductTableMap::COL_VAT);
            $criteria->addSelectColumn(AliProductTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliProductTableMap::COL_PERSONEL_PRICE);
            $criteria->addSelectColumn(AliProductTableMap::COL_CUSTOMER_PRICE);
            $criteria->addSelectColumn(AliProductTableMap::COL_PV);
            $criteria->addSelectColumn(AliProductTableMap::COL_BV);
            $criteria->addSelectColumn(AliProductTableMap::COL_FV);
            $criteria->addSelectColumn(AliProductTableMap::COL_QTY);
            $criteria->addSelectColumn(AliProductTableMap::COL_UD);
            $criteria->addSelectColumn(AliProductTableMap::COL_SYNC);
            $criteria->addSelectColumn(AliProductTableMap::COL_WEB);
            $criteria->addSelectColumn(AliProductTableMap::COL_ST);
            $criteria->addSelectColumn(AliProductTableMap::COL_SST);
            $criteria->addSelectColumn(AliProductTableMap::COL_BF);
            $criteria->addSelectColumn(AliProductTableMap::COL_SH);
            $criteria->addSelectColumn(AliProductTableMap::COL_PCODE_STOCK);
            $criteria->addSelectColumn(AliProductTableMap::COL_SUP_CODE);
            $criteria->addSelectColumn(AliProductTableMap::COL_WEIGHT);
            $criteria->addSelectColumn(AliProductTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliProductTableMap::COL_BARCODE);
            $criteria->addSelectColumn(AliProductTableMap::COL_PICTURE);
            $criteria->addSelectColumn(AliProductTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliProductTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliProductTableMap::COL_SA_TYPE_A);
            $criteria->addSelectColumn(AliProductTableMap::COL_SA_TYPE_H);
            $criteria->addSelectColumn(AliProductTableMap::COL_QTYR);
            $criteria->addSelectColumn(AliProductTableMap::COL_ATO);
            $criteria->addSelectColumn(AliProductTableMap::COL_PRODUCT_IMG);
        } else {
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.group_id');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.unit');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.vat');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.personel_price');
            $criteria->addSelectColumn($alias . '.customer_price');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.bv');
            $criteria->addSelectColumn($alias . '.fv');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.ud');
            $criteria->addSelectColumn($alias . '.sync');
            $criteria->addSelectColumn($alias . '.web');
            $criteria->addSelectColumn($alias . '.st');
            $criteria->addSelectColumn($alias . '.sst');
            $criteria->addSelectColumn($alias . '.bf');
            $criteria->addSelectColumn($alias . '.sh');
            $criteria->addSelectColumn($alias . '.pcode_stock');
            $criteria->addSelectColumn($alias . '.sup_code');
            $criteria->addSelectColumn($alias . '.weight');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.barcode');
            $criteria->addSelectColumn($alias . '.picture');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.sa_type_a');
            $criteria->addSelectColumn($alias . '.sa_type_h');
            $criteria->addSelectColumn($alias . '.qtyr');
            $criteria->addSelectColumn($alias . '.ato');
            $criteria->addSelectColumn($alias . '.product_img');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliProductTableMap::DATABASE_NAME)->getTable(AliProductTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliProductTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliProductTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliProductTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliProduct or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliProduct object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliProduct) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliProductTableMap::DATABASE_NAME);
            $criteria->add(AliProductTableMap::COL_PCODE, (array) $values, Criteria::IN);
        }

        $query = AliProductQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliProductTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliProductTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliProductQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliProduct or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliProduct object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliProduct object
        }


        // Set the correct dbName
        $query = AliProductQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliProductTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliProductTableMap::buildTableMap();
