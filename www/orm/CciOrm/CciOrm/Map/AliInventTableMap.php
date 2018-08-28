<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliInvent;
use CciOrm\CciOrm\AliInventQuery;
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
 * This class defines the structure of the 'ali_invent' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliInventTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliInventTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_invent';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliInvent';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliInvent';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 24;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 24;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_invent.id';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_invent.inv_code';

    /**
     * the column name for the inv_desc field
     */
    const COL_INV_DESC = 'ali_invent.inv_desc';

    /**
     * the column name for the inv_type field
     */
    const COL_INV_TYPE = 'ali_invent.inv_type';

    /**
     * the column name for the code_ref field
     */
    const COL_CODE_REF = 'ali_invent.code_ref';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'ali_invent.address';

    /**
     * the column name for the districtId field
     */
    const COL_DISTRICTID = 'ali_invent.districtId';

    /**
     * the column name for the amphurId field
     */
    const COL_AMPHURID = 'ali_invent.amphurId';

    /**
     * the column name for the provinceId field
     */
    const COL_PROVINCEID = 'ali_invent.provinceId';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'ali_invent.zip';

    /**
     * the column name for the home_t field
     */
    const COL_HOME_T = 'ali_invent.home_t';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_invent.uid';

    /**
     * the column name for the sync field
     */
    const COL_SYNC = 'ali_invent.sync';

    /**
     * the column name for the web field
     */
    const COL_WEB = 'ali_invent.web';

    /**
     * the column name for the ewallet field
     */
    const COL_EWALLET = 'ali_invent.ewallet';

    /**
     * the column name for the voucher field
     */
    const COL_VOUCHER = 'ali_invent.voucher';

    /**
     * the column name for the bewallet field
     */
    const COL_BEWALLET = 'ali_invent.bewallet';

    /**
     * the column name for the bvoucher field
     */
    const COL_BVOUCHER = 'ali_invent.bvoucher';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'ali_invent.discount';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_invent.locationbase';

    /**
     * the column name for the bill_ref field
     */
    const COL_BILL_REF = 'ali_invent.bill_ref';

    /**
     * the column name for the fax field
     */
    const COL_FAX = 'ali_invent.fax';

    /**
     * the column name for the no_tax field
     */
    const COL_NO_TAX = 'ali_invent.no_tax';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'ali_invent.type';

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
        self::TYPE_PHPNAME       => array('Id', 'InvCode', 'InvDesc', 'InvType', 'CodeRef', 'Address', 'Districtid', 'Amphurid', 'Provinceid', 'Zip', 'HomeT', 'Uid', 'Sync', 'Web', 'Ewallet', 'Voucher', 'Bewallet', 'Bvoucher', 'Discount', 'Locationbase', 'BillRef', 'Fax', 'NoTax', 'Type', ),
        self::TYPE_CAMELNAME     => array('id', 'invCode', 'invDesc', 'invType', 'codeRef', 'address', 'districtid', 'amphurid', 'provinceid', 'zip', 'homeT', 'uid', 'sync', 'web', 'ewallet', 'voucher', 'bewallet', 'bvoucher', 'discount', 'locationbase', 'billRef', 'fax', 'noTax', 'type', ),
        self::TYPE_COLNAME       => array(AliInventTableMap::COL_ID, AliInventTableMap::COL_INV_CODE, AliInventTableMap::COL_INV_DESC, AliInventTableMap::COL_INV_TYPE, AliInventTableMap::COL_CODE_REF, AliInventTableMap::COL_ADDRESS, AliInventTableMap::COL_DISTRICTID, AliInventTableMap::COL_AMPHURID, AliInventTableMap::COL_PROVINCEID, AliInventTableMap::COL_ZIP, AliInventTableMap::COL_HOME_T, AliInventTableMap::COL_UID, AliInventTableMap::COL_SYNC, AliInventTableMap::COL_WEB, AliInventTableMap::COL_EWALLET, AliInventTableMap::COL_VOUCHER, AliInventTableMap::COL_BEWALLET, AliInventTableMap::COL_BVOUCHER, AliInventTableMap::COL_DISCOUNT, AliInventTableMap::COL_LOCATIONBASE, AliInventTableMap::COL_BILL_REF, AliInventTableMap::COL_FAX, AliInventTableMap::COL_NO_TAX, AliInventTableMap::COL_TYPE, ),
        self::TYPE_FIELDNAME     => array('id', 'inv_code', 'inv_desc', 'inv_type', 'code_ref', 'address', 'districtId', 'amphurId', 'provinceId', 'zip', 'home_t', 'uid', 'sync', 'web', 'ewallet', 'voucher', 'bewallet', 'bvoucher', 'discount', 'locationbase', 'bill_ref', 'fax', 'no_tax', 'type', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'InvCode' => 1, 'InvDesc' => 2, 'InvType' => 3, 'CodeRef' => 4, 'Address' => 5, 'Districtid' => 6, 'Amphurid' => 7, 'Provinceid' => 8, 'Zip' => 9, 'HomeT' => 10, 'Uid' => 11, 'Sync' => 12, 'Web' => 13, 'Ewallet' => 14, 'Voucher' => 15, 'Bewallet' => 16, 'Bvoucher' => 17, 'Discount' => 18, 'Locationbase' => 19, 'BillRef' => 20, 'Fax' => 21, 'NoTax' => 22, 'Type' => 23, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'invCode' => 1, 'invDesc' => 2, 'invType' => 3, 'codeRef' => 4, 'address' => 5, 'districtid' => 6, 'amphurid' => 7, 'provinceid' => 8, 'zip' => 9, 'homeT' => 10, 'uid' => 11, 'sync' => 12, 'web' => 13, 'ewallet' => 14, 'voucher' => 15, 'bewallet' => 16, 'bvoucher' => 17, 'discount' => 18, 'locationbase' => 19, 'billRef' => 20, 'fax' => 21, 'noTax' => 22, 'type' => 23, ),
        self::TYPE_COLNAME       => array(AliInventTableMap::COL_ID => 0, AliInventTableMap::COL_INV_CODE => 1, AliInventTableMap::COL_INV_DESC => 2, AliInventTableMap::COL_INV_TYPE => 3, AliInventTableMap::COL_CODE_REF => 4, AliInventTableMap::COL_ADDRESS => 5, AliInventTableMap::COL_DISTRICTID => 6, AliInventTableMap::COL_AMPHURID => 7, AliInventTableMap::COL_PROVINCEID => 8, AliInventTableMap::COL_ZIP => 9, AliInventTableMap::COL_HOME_T => 10, AliInventTableMap::COL_UID => 11, AliInventTableMap::COL_SYNC => 12, AliInventTableMap::COL_WEB => 13, AliInventTableMap::COL_EWALLET => 14, AliInventTableMap::COL_VOUCHER => 15, AliInventTableMap::COL_BEWALLET => 16, AliInventTableMap::COL_BVOUCHER => 17, AliInventTableMap::COL_DISCOUNT => 18, AliInventTableMap::COL_LOCATIONBASE => 19, AliInventTableMap::COL_BILL_REF => 20, AliInventTableMap::COL_FAX => 21, AliInventTableMap::COL_NO_TAX => 22, AliInventTableMap::COL_TYPE => 23, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'inv_code' => 1, 'inv_desc' => 2, 'inv_type' => 3, 'code_ref' => 4, 'address' => 5, 'districtId' => 6, 'amphurId' => 7, 'provinceId' => 8, 'zip' => 9, 'home_t' => 10, 'uid' => 11, 'sync' => 12, 'web' => 13, 'ewallet' => 14, 'voucher' => 15, 'bewallet' => 16, 'bvoucher' => 17, 'discount' => 18, 'locationbase' => 19, 'bill_ref' => 20, 'fax' => 21, 'no_tax' => 22, 'type' => 23, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
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
        $this->setName('ali_invent');
        $this->setPhpName('AliInvent');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliInvent');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 7, null);
        $this->addColumn('inv_desc', 'InvDesc', 'VARCHAR', false, 50, null);
        $this->addColumn('inv_type', 'InvType', 'INTEGER', true, 10, null);
        $this->addColumn('code_ref', 'CodeRef', 'VARCHAR', true, 20, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', true, null, null);
        $this->addColumn('districtId', 'Districtid', 'INTEGER', true, 10, null);
        $this->addColumn('amphurId', 'Amphurid', 'INTEGER', true, 10, null);
        $this->addColumn('provinceId', 'Provinceid', 'INTEGER', true, 10, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', true, 5, null);
        $this->addColumn('home_t', 'HomeT', 'VARCHAR', true, 255, null);
        $this->addColumn('uid', 'Uid', 'INTEGER', true, 10, null);
        $this->addColumn('sync', 'Sync', 'VARCHAR', false, 1, null);
        $this->addColumn('web', 'Web', 'VARCHAR', false, 1, null);
        $this->addColumn('ewallet', 'Ewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('voucher', 'Voucher', 'DECIMAL', true, 15, null);
        $this->addColumn('bewallet', 'Bewallet', 'DECIMAL', true, 15, null);
        $this->addColumn('bvoucher', 'Bvoucher', 'DECIMAL', true, 15, null);
        $this->addColumn('discount', 'Discount', 'INTEGER', true, null, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('bill_ref', 'BillRef', 'VARCHAR', true, 50, null);
        $this->addColumn('fax', 'Fax', 'VARCHAR', true, 10, null);
        $this->addColumn('no_tax', 'NoTax', 'VARCHAR', true, 10, null);
        $this->addColumn('type', 'Type', 'INTEGER', true, 2, null);
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
        return $withPrefix ? AliInventTableMap::CLASS_DEFAULT : AliInventTableMap::OM_CLASS;
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
     * @return array           (AliInvent object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliInventTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliInventTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliInventTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliInventTableMap::OM_CLASS;
            /** @var AliInvent $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliInventTableMap::addInstanceToPool($obj, $key);
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
            $key = AliInventTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliInventTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliInvent $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliInventTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliInventTableMap::COL_ID);
            $criteria->addSelectColumn(AliInventTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliInventTableMap::COL_INV_DESC);
            $criteria->addSelectColumn(AliInventTableMap::COL_INV_TYPE);
            $criteria->addSelectColumn(AliInventTableMap::COL_CODE_REF);
            $criteria->addSelectColumn(AliInventTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(AliInventTableMap::COL_DISTRICTID);
            $criteria->addSelectColumn(AliInventTableMap::COL_AMPHURID);
            $criteria->addSelectColumn(AliInventTableMap::COL_PROVINCEID);
            $criteria->addSelectColumn(AliInventTableMap::COL_ZIP);
            $criteria->addSelectColumn(AliInventTableMap::COL_HOME_T);
            $criteria->addSelectColumn(AliInventTableMap::COL_UID);
            $criteria->addSelectColumn(AliInventTableMap::COL_SYNC);
            $criteria->addSelectColumn(AliInventTableMap::COL_WEB);
            $criteria->addSelectColumn(AliInventTableMap::COL_EWALLET);
            $criteria->addSelectColumn(AliInventTableMap::COL_VOUCHER);
            $criteria->addSelectColumn(AliInventTableMap::COL_BEWALLET);
            $criteria->addSelectColumn(AliInventTableMap::COL_BVOUCHER);
            $criteria->addSelectColumn(AliInventTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(AliInventTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliInventTableMap::COL_BILL_REF);
            $criteria->addSelectColumn(AliInventTableMap::COL_FAX);
            $criteria->addSelectColumn(AliInventTableMap::COL_NO_TAX);
            $criteria->addSelectColumn(AliInventTableMap::COL_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_desc');
            $criteria->addSelectColumn($alias . '.inv_type');
            $criteria->addSelectColumn($alias . '.code_ref');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.districtId');
            $criteria->addSelectColumn($alias . '.amphurId');
            $criteria->addSelectColumn($alias . '.provinceId');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.home_t');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.sync');
            $criteria->addSelectColumn($alias . '.web');
            $criteria->addSelectColumn($alias . '.ewallet');
            $criteria->addSelectColumn($alias . '.voucher');
            $criteria->addSelectColumn($alias . '.bewallet');
            $criteria->addSelectColumn($alias . '.bvoucher');
            $criteria->addSelectColumn($alias . '.discount');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.bill_ref');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.no_tax');
            $criteria->addSelectColumn($alias . '.type');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliInventTableMap::DATABASE_NAME)->getTable(AliInventTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliInventTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliInventTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliInventTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliInvent or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliInvent object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliInvent) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliInventTableMap::DATABASE_NAME);
            $criteria->add(AliInventTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliInventQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliInventTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliInventTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_invent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliInventQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliInvent or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliInvent object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliInvent object
        }

        if ($criteria->containsKey(AliInventTableMap::COL_ID) && $criteria->keyContainsValue(AliInventTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliInventTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliInventQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliInventTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliInventTableMap::buildTableMap();
