<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliProductPackage;
use CciOrm\CciOrm\AliProductPackageQuery;
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
 * This class defines the structure of the 'ali_product_package' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliProductPackageTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliProductPackageTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_product_package';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliProductPackage';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliProductPackage';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 42;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 42;

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_product_package.pcode';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_product_package.sa_type';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_product_package.pdesc';

    /**
     * the column name for the unit field
     */
    const COL_UNIT = 'ali_product_package.unit';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_product_package.price';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_product_package.bprice';

    /**
     * the column name for the customer_price field
     */
    const COL_CUSTOMER_PRICE = 'ali_product_package.customer_price';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_product_package.pv';

    /**
     * the column name for the special_pv field
     */
    const COL_SPECIAL_PV = 'ali_product_package.special_pv';

    /**
     * the column name for the bv field
     */
    const COL_BV = 'ali_product_package.bv';

    /**
     * the column name for the fv field
     */
    const COL_FV = 'ali_product_package.fv';

    /**
     * the column name for the weight field
     */
    const COL_WEIGHT = 'ali_product_package.weight';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_product_package.qty';

    /**
     * the column name for the st field
     */
    const COL_ST = 'ali_product_package.st';

    /**
     * the column name for the sst field
     */
    const COL_SST = 'ali_product_package.sst';

    /**
     * the column name for the bf field
     */
    const COL_BF = 'ali_product_package.bf';

    /**
     * the column name for the ato field
     */
    const COL_ATO = 'ali_product_package.ato';

    /**
     * the column name for the ud field
     */
    const COL_UD = 'ali_product_package.ud';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_product_package.locationbase';

    /**
     * the column name for the barcode field
     */
    const COL_BARCODE = 'ali_product_package.barcode';

    /**
     * the column name for the picture field
     */
    const COL_PICTURE = 'ali_product_package.picture';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_product_package.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_product_package.tdate';

    /**
     * the column name for the pos_mb field
     */
    const COL_POS_MB = 'ali_product_package.pos_mb';

    /**
     * the column name for the pos_su field
     */
    const COL_POS_SU = 'ali_product_package.pos_su';

    /**
     * the column name for the pos_ex field
     */
    const COL_POS_EX = 'ali_product_package.pos_ex';

    /**
     * the column name for the pos_br field
     */
    const COL_POS_BR = 'ali_product_package.pos_br';

    /**
     * the column name for the pos_si field
     */
    const COL_POS_SI = 'ali_product_package.pos_si';

    /**
     * the column name for the pos_go field
     */
    const COL_POS_GO = 'ali_product_package.pos_go';

    /**
     * the column name for the pos_pl field
     */
    const COL_POS_PL = 'ali_product_package.pos_pl';

    /**
     * the column name for the pos_pe field
     */
    const COL_POS_PE = 'ali_product_package.pos_pe';

    /**
     * the column name for the pos_ru field
     */
    const COL_POS_RU = 'ali_product_package.pos_ru';

    /**
     * the column name for the pos_sa field
     */
    const COL_POS_SA = 'ali_product_package.pos_sa';

    /**
     * the column name for the pos_em field
     */
    const COL_POS_EM = 'ali_product_package.pos_em';

    /**
     * the column name for the pos_di field
     */
    const COL_POS_DI = 'ali_product_package.pos_di';

    /**
     * the column name for the pos_bd field
     */
    const COL_POS_BD = 'ali_product_package.pos_bd';

    /**
     * the column name for the pos_bl field
     */
    const COL_POS_BL = 'ali_product_package.pos_bl';

    /**
     * the column name for the pos_cd field
     */
    const COL_POS_CD = 'ali_product_package.pos_cd';

    /**
     * the column name for the pos_id field
     */
    const COL_POS_ID = 'ali_product_package.pos_id';

    /**
     * the column name for the pos_pd field
     */
    const COL_POS_PD = 'ali_product_package.pos_pd';

    /**
     * the column name for the pos_rd field
     */
    const COL_POS_RD = 'ali_product_package.pos_rd';

    /**
     * the column name for the vat field
     */
    const COL_VAT = 'ali_product_package.vat';

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
        self::TYPE_PHPNAME       => array('Pcode', 'SaType', 'Pdesc', 'Unit', 'Price', 'Bprice', 'CustomerPrice', 'Pv', 'SpecialPv', 'Bv', 'Fv', 'Weight', 'Qty', 'St', 'Sst', 'Bf', 'Ato', 'Ud', 'Locationbase', 'Barcode', 'Picture', 'Fdate', 'Tdate', 'PosMb', 'PosSu', 'PosEx', 'PosBr', 'PosSi', 'PosGo', 'PosPl', 'PosPe', 'PosRu', 'PosSa', 'PosEm', 'PosDi', 'PosBd', 'PosBl', 'PosCd', 'PosId', 'PosPd', 'PosRd', 'Vat', ),
        self::TYPE_CAMELNAME     => array('pcode', 'saType', 'pdesc', 'unit', 'price', 'bprice', 'customerPrice', 'pv', 'specialPv', 'bv', 'fv', 'weight', 'qty', 'st', 'sst', 'bf', 'ato', 'ud', 'locationbase', 'barcode', 'picture', 'fdate', 'tdate', 'posMb', 'posSu', 'posEx', 'posBr', 'posSi', 'posGo', 'posPl', 'posPe', 'posRu', 'posSa', 'posEm', 'posDi', 'posBd', 'posBl', 'posCd', 'posId', 'posPd', 'posRd', 'vat', ),
        self::TYPE_COLNAME       => array(AliProductPackageTableMap::COL_PCODE, AliProductPackageTableMap::COL_SA_TYPE, AliProductPackageTableMap::COL_PDESC, AliProductPackageTableMap::COL_UNIT, AliProductPackageTableMap::COL_PRICE, AliProductPackageTableMap::COL_BPRICE, AliProductPackageTableMap::COL_CUSTOMER_PRICE, AliProductPackageTableMap::COL_PV, AliProductPackageTableMap::COL_SPECIAL_PV, AliProductPackageTableMap::COL_BV, AliProductPackageTableMap::COL_FV, AliProductPackageTableMap::COL_WEIGHT, AliProductPackageTableMap::COL_QTY, AliProductPackageTableMap::COL_ST, AliProductPackageTableMap::COL_SST, AliProductPackageTableMap::COL_BF, AliProductPackageTableMap::COL_ATO, AliProductPackageTableMap::COL_UD, AliProductPackageTableMap::COL_LOCATIONBASE, AliProductPackageTableMap::COL_BARCODE, AliProductPackageTableMap::COL_PICTURE, AliProductPackageTableMap::COL_FDATE, AliProductPackageTableMap::COL_TDATE, AliProductPackageTableMap::COL_POS_MB, AliProductPackageTableMap::COL_POS_SU, AliProductPackageTableMap::COL_POS_EX, AliProductPackageTableMap::COL_POS_BR, AliProductPackageTableMap::COL_POS_SI, AliProductPackageTableMap::COL_POS_GO, AliProductPackageTableMap::COL_POS_PL, AliProductPackageTableMap::COL_POS_PE, AliProductPackageTableMap::COL_POS_RU, AliProductPackageTableMap::COL_POS_SA, AliProductPackageTableMap::COL_POS_EM, AliProductPackageTableMap::COL_POS_DI, AliProductPackageTableMap::COL_POS_BD, AliProductPackageTableMap::COL_POS_BL, AliProductPackageTableMap::COL_POS_CD, AliProductPackageTableMap::COL_POS_ID, AliProductPackageTableMap::COL_POS_PD, AliProductPackageTableMap::COL_POS_RD, AliProductPackageTableMap::COL_VAT, ),
        self::TYPE_FIELDNAME     => array('pcode', 'sa_type', 'pdesc', 'unit', 'price', 'bprice', 'customer_price', 'pv', 'special_pv', 'bv', 'fv', 'weight', 'qty', 'st', 'sst', 'bf', 'ato', 'ud', 'locationbase', 'barcode', 'picture', 'fdate', 'tdate', 'pos_mb', 'pos_su', 'pos_ex', 'pos_br', 'pos_si', 'pos_go', 'pos_pl', 'pos_pe', 'pos_ru', 'pos_sa', 'pos_em', 'pos_di', 'pos_bd', 'pos_bl', 'pos_cd', 'pos_id', 'pos_pd', 'pos_rd', 'vat', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Pcode' => 0, 'SaType' => 1, 'Pdesc' => 2, 'Unit' => 3, 'Price' => 4, 'Bprice' => 5, 'CustomerPrice' => 6, 'Pv' => 7, 'SpecialPv' => 8, 'Bv' => 9, 'Fv' => 10, 'Weight' => 11, 'Qty' => 12, 'St' => 13, 'Sst' => 14, 'Bf' => 15, 'Ato' => 16, 'Ud' => 17, 'Locationbase' => 18, 'Barcode' => 19, 'Picture' => 20, 'Fdate' => 21, 'Tdate' => 22, 'PosMb' => 23, 'PosSu' => 24, 'PosEx' => 25, 'PosBr' => 26, 'PosSi' => 27, 'PosGo' => 28, 'PosPl' => 29, 'PosPe' => 30, 'PosRu' => 31, 'PosSa' => 32, 'PosEm' => 33, 'PosDi' => 34, 'PosBd' => 35, 'PosBl' => 36, 'PosCd' => 37, 'PosId' => 38, 'PosPd' => 39, 'PosRd' => 40, 'Vat' => 41, ),
        self::TYPE_CAMELNAME     => array('pcode' => 0, 'saType' => 1, 'pdesc' => 2, 'unit' => 3, 'price' => 4, 'bprice' => 5, 'customerPrice' => 6, 'pv' => 7, 'specialPv' => 8, 'bv' => 9, 'fv' => 10, 'weight' => 11, 'qty' => 12, 'st' => 13, 'sst' => 14, 'bf' => 15, 'ato' => 16, 'ud' => 17, 'locationbase' => 18, 'barcode' => 19, 'picture' => 20, 'fdate' => 21, 'tdate' => 22, 'posMb' => 23, 'posSu' => 24, 'posEx' => 25, 'posBr' => 26, 'posSi' => 27, 'posGo' => 28, 'posPl' => 29, 'posPe' => 30, 'posRu' => 31, 'posSa' => 32, 'posEm' => 33, 'posDi' => 34, 'posBd' => 35, 'posBl' => 36, 'posCd' => 37, 'posId' => 38, 'posPd' => 39, 'posRd' => 40, 'vat' => 41, ),
        self::TYPE_COLNAME       => array(AliProductPackageTableMap::COL_PCODE => 0, AliProductPackageTableMap::COL_SA_TYPE => 1, AliProductPackageTableMap::COL_PDESC => 2, AliProductPackageTableMap::COL_UNIT => 3, AliProductPackageTableMap::COL_PRICE => 4, AliProductPackageTableMap::COL_BPRICE => 5, AliProductPackageTableMap::COL_CUSTOMER_PRICE => 6, AliProductPackageTableMap::COL_PV => 7, AliProductPackageTableMap::COL_SPECIAL_PV => 8, AliProductPackageTableMap::COL_BV => 9, AliProductPackageTableMap::COL_FV => 10, AliProductPackageTableMap::COL_WEIGHT => 11, AliProductPackageTableMap::COL_QTY => 12, AliProductPackageTableMap::COL_ST => 13, AliProductPackageTableMap::COL_SST => 14, AliProductPackageTableMap::COL_BF => 15, AliProductPackageTableMap::COL_ATO => 16, AliProductPackageTableMap::COL_UD => 17, AliProductPackageTableMap::COL_LOCATIONBASE => 18, AliProductPackageTableMap::COL_BARCODE => 19, AliProductPackageTableMap::COL_PICTURE => 20, AliProductPackageTableMap::COL_FDATE => 21, AliProductPackageTableMap::COL_TDATE => 22, AliProductPackageTableMap::COL_POS_MB => 23, AliProductPackageTableMap::COL_POS_SU => 24, AliProductPackageTableMap::COL_POS_EX => 25, AliProductPackageTableMap::COL_POS_BR => 26, AliProductPackageTableMap::COL_POS_SI => 27, AliProductPackageTableMap::COL_POS_GO => 28, AliProductPackageTableMap::COL_POS_PL => 29, AliProductPackageTableMap::COL_POS_PE => 30, AliProductPackageTableMap::COL_POS_RU => 31, AliProductPackageTableMap::COL_POS_SA => 32, AliProductPackageTableMap::COL_POS_EM => 33, AliProductPackageTableMap::COL_POS_DI => 34, AliProductPackageTableMap::COL_POS_BD => 35, AliProductPackageTableMap::COL_POS_BL => 36, AliProductPackageTableMap::COL_POS_CD => 37, AliProductPackageTableMap::COL_POS_ID => 38, AliProductPackageTableMap::COL_POS_PD => 39, AliProductPackageTableMap::COL_POS_RD => 40, AliProductPackageTableMap::COL_VAT => 41, ),
        self::TYPE_FIELDNAME     => array('pcode' => 0, 'sa_type' => 1, 'pdesc' => 2, 'unit' => 3, 'price' => 4, 'bprice' => 5, 'customer_price' => 6, 'pv' => 7, 'special_pv' => 8, 'bv' => 9, 'fv' => 10, 'weight' => 11, 'qty' => 12, 'st' => 13, 'sst' => 14, 'bf' => 15, 'ato' => 16, 'ud' => 17, 'locationbase' => 18, 'barcode' => 19, 'picture' => 20, 'fdate' => 21, 'tdate' => 22, 'pos_mb' => 23, 'pos_su' => 24, 'pos_ex' => 25, 'pos_br' => 26, 'pos_si' => 27, 'pos_go' => 28, 'pos_pl' => 29, 'pos_pe' => 30, 'pos_ru' => 31, 'pos_sa' => 32, 'pos_em' => 33, 'pos_di' => 34, 'pos_bd' => 35, 'pos_bl' => 36, 'pos_cd' => 37, 'pos_id' => 38, 'pos_pd' => 39, 'pos_rd' => 40, 'vat' => 41, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, )
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
        $this->setName('ali_product_package');
        $this->setPhpName('AliProductPackage');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliProductPackage');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pcode', 'Pcode', 'VARCHAR', true, 20, '');
        $this->addColumn('sa_type', 'SaType', 'VARCHAR', true, 2, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', false, 100, null);
        $this->addColumn('unit', 'Unit', 'VARCHAR', false, 10, null);
        $this->addColumn('price', 'Price', 'DECIMAL', false, 10, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('customer_price', 'CustomerPrice', 'DECIMAL', true, 15, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', false, 10, null);
        $this->addColumn('special_pv', 'SpecialPv', 'DECIMAL', true, 15, null);
        $this->addColumn('bv', 'Bv', 'DECIMAL', false, 10, null);
        $this->addColumn('fv', 'Fv', 'DECIMAL', true, 10, null);
        $this->addColumn('weight', 'Weight', 'DECIMAL', true, 15, null);
        $this->addColumn('qty', 'Qty', 'DECIMAL', false, 5, null);
        $this->addColumn('st', 'St', 'INTEGER', true, null, null);
        $this->addColumn('sst', 'Sst', 'INTEGER', true, null, null);
        $this->addColumn('bf', 'Bf', 'INTEGER', true, null, null);
        $this->addColumn('ato', 'Ato', 'INTEGER', true, null, null);
        $this->addColumn('ud', 'Ud', 'CHAR', true, null, null);
        $this->addColumn('locationbase', 'Locationbase', 'VARCHAR', true, 255, null);
        $this->addColumn('barcode', 'Barcode', 'VARCHAR', true, 255, null);
        $this->addColumn('picture', 'Picture', 'VARCHAR', true, 255, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pos_mb', 'PosMb', 'INTEGER', true, null, null);
        $this->addColumn('pos_su', 'PosSu', 'INTEGER', true, null, null);
        $this->addColumn('pos_ex', 'PosEx', 'INTEGER', true, null, null);
        $this->addColumn('pos_br', 'PosBr', 'INTEGER', true, null, null);
        $this->addColumn('pos_si', 'PosSi', 'INTEGER', true, null, null);
        $this->addColumn('pos_go', 'PosGo', 'INTEGER', true, null, null);
        $this->addColumn('pos_pl', 'PosPl', 'INTEGER', true, null, null);
        $this->addColumn('pos_pe', 'PosPe', 'INTEGER', true, null, null);
        $this->addColumn('pos_ru', 'PosRu', 'INTEGER', true, null, null);
        $this->addColumn('pos_sa', 'PosSa', 'INTEGER', true, null, null);
        $this->addColumn('pos_em', 'PosEm', 'INTEGER', true, null, null);
        $this->addColumn('pos_di', 'PosDi', 'INTEGER', true, null, null);
        $this->addColumn('pos_bd', 'PosBd', 'INTEGER', true, null, null);
        $this->addColumn('pos_bl', 'PosBl', 'INTEGER', true, null, null);
        $this->addColumn('pos_cd', 'PosCd', 'INTEGER', true, null, null);
        $this->addColumn('pos_id', 'PosId', 'INTEGER', true, null, null);
        $this->addColumn('pos_pd', 'PosPd', 'INTEGER', true, null, null);
        $this->addColumn('pos_rd', 'PosRd', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliProductPackageTableMap::CLASS_DEFAULT : AliProductPackageTableMap::OM_CLASS;
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
     * @return array           (AliProductPackage object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliProductPackageTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliProductPackageTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliProductPackageTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliProductPackageTableMap::OM_CLASS;
            /** @var AliProductPackage $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliProductPackageTableMap::addInstanceToPool($obj, $key);
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
            $key = AliProductPackageTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliProductPackageTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliProductPackage $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliProductPackageTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_UNIT);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_CUSTOMER_PRICE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_PV);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_SPECIAL_PV);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_BV);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_FV);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_WEIGHT);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_QTY);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_ST);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_SST);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_BF);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_ATO);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_UD);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_BARCODE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_PICTURE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_MB);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_SU);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_EX);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_BR);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_SI);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_GO);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_PL);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_PE);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_RU);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_SA);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_EM);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_DI);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_BD);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_BL);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_CD);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_ID);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_PD);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_POS_RD);
            $criteria->addSelectColumn(AliProductPackageTableMap::COL_VAT);
        } else {
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.unit');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.customer_price');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.special_pv');
            $criteria->addSelectColumn($alias . '.bv');
            $criteria->addSelectColumn($alias . '.fv');
            $criteria->addSelectColumn($alias . '.weight');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.st');
            $criteria->addSelectColumn($alias . '.sst');
            $criteria->addSelectColumn($alias . '.bf');
            $criteria->addSelectColumn($alias . '.ato');
            $criteria->addSelectColumn($alias . '.ud');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.barcode');
            $criteria->addSelectColumn($alias . '.picture');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pos_mb');
            $criteria->addSelectColumn($alias . '.pos_su');
            $criteria->addSelectColumn($alias . '.pos_ex');
            $criteria->addSelectColumn($alias . '.pos_br');
            $criteria->addSelectColumn($alias . '.pos_si');
            $criteria->addSelectColumn($alias . '.pos_go');
            $criteria->addSelectColumn($alias . '.pos_pl');
            $criteria->addSelectColumn($alias . '.pos_pe');
            $criteria->addSelectColumn($alias . '.pos_ru');
            $criteria->addSelectColumn($alias . '.pos_sa');
            $criteria->addSelectColumn($alias . '.pos_em');
            $criteria->addSelectColumn($alias . '.pos_di');
            $criteria->addSelectColumn($alias . '.pos_bd');
            $criteria->addSelectColumn($alias . '.pos_bl');
            $criteria->addSelectColumn($alias . '.pos_cd');
            $criteria->addSelectColumn($alias . '.pos_id');
            $criteria->addSelectColumn($alias . '.pos_pd');
            $criteria->addSelectColumn($alias . '.pos_rd');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliProductPackageTableMap::DATABASE_NAME)->getTable(AliProductPackageTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliProductPackageTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliProductPackageTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliProductPackageTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliProductPackage or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliProductPackage object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductPackageTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliProductPackage) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliProductPackageTableMap::DATABASE_NAME);
            $criteria->add(AliProductPackageTableMap::COL_PCODE, (array) $values, Criteria::IN);
        }

        $query = AliProductPackageQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliProductPackageTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliProductPackageTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_product_package table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliProductPackageQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliProductPackage or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliProductPackage object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductPackageTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliProductPackage object
        }


        // Set the correct dbName
        $query = AliProductPackageQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliProductPackageTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliProductPackageTableMap::buildTableMap();
