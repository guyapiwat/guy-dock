<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliLocationBase;
use CciOrm\CciOrm\AliLocationBaseQuery;
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
 * This class defines the structure of the 'ali_location_base' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliLocationBaseTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliLocationBaseTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_location_base';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliLocationBase';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliLocationBase';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the cid field
     */
    const COL_CID = 'ali_location_base.cid';

    /**
     * the column name for the cshort field
     */
    const COL_CSHORT = 'ali_location_base.cshort';

    /**
     * the column name for the cname field
     */
    const COL_CNAME = 'ali_location_base.cname';

    /**
     * the column name for the csending field
     */
    const COL_CSENDING = 'ali_location_base.csending';

    /**
     * the column name for the ctax field
     */
    const COL_CTAX = 'ali_location_base.ctax';

    /**
     * the column name for the ctax1 field
     */
    const COL_CTAX1 = 'ali_location_base.ctax1';

    /**
     * the column name for the com_stockist field
     */
    const COL_COM_STOCKIST = 'ali_location_base.com_stockist';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_location_base.crate';

    /**
     * the column name for the pcode_register field
     */
    const COL_PCODE_REGISTER = 'ali_location_base.pcode_register';

    /**
     * the column name for the pcode_extend field
     */
    const COL_PCODE_EXTEND = 'ali_location_base.pcode_extend';

    /**
     * the column name for the pcode_charge field
     */
    const COL_PCODE_CHARGE = 'ali_location_base.pcode_charge';

    /**
     * the column name for the smssending field
     */
    const COL_SMSSENDING = 'ali_location_base.smssending';

    /**
     * the column name for the currcode field
     */
    const COL_CURRCODE = 'ali_location_base.currcode';

    /**
     * the column name for the lang field
     */
    const COL_LANG = 'ali_location_base.lang';

    /**
     * the column name for the timediff field
     */
    const COL_TIMEDIFF = 'ali_location_base.timediff';

    /**
     * the column name for the regis_transfer field
     */
    const COL_REGIS_TRANSFER = 'ali_location_base.regis_transfer';

    /**
     * the column name for the regis_success field
     */
    const COL_REGIS_SUCCESS = 'ali_location_base.regis_success';

    /**
     * the column name for the regis_fail field
     */
    const COL_REGIS_FAIL = 'ali_location_base.regis_fail';

    /**
     * the column name for the regis_cancel field
     */
    const COL_REGIS_CANCEL = 'ali_location_base.regis_cancel';

    /**
     * the column name for the main_inv_code field
     */
    const COL_MAIN_INV_CODE = 'ali_location_base.main_inv_code';

    /**
     * the column name for the com_transfer_chagre field
     */
    const COL_COM_TRANSFER_CHAGRE = 'ali_location_base.com_transfer_chagre';

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
        self::TYPE_PHPNAME       => array('Cid', 'Cshort', 'Cname', 'Csending', 'Ctax', 'Ctax1', 'ComStockist', 'Crate', 'PcodeRegister', 'PcodeExtend', 'PcodeCharge', 'Smssending', 'Currcode', 'Lang', 'Timediff', 'RegisTransfer', 'RegisSuccess', 'RegisFail', 'RegisCancel', 'MainInvCode', 'ComTransferChagre', ),
        self::TYPE_CAMELNAME     => array('cid', 'cshort', 'cname', 'csending', 'ctax', 'ctax1', 'comStockist', 'crate', 'pcodeRegister', 'pcodeExtend', 'pcodeCharge', 'smssending', 'currcode', 'lang', 'timediff', 'regisTransfer', 'regisSuccess', 'regisFail', 'regisCancel', 'mainInvCode', 'comTransferChagre', ),
        self::TYPE_COLNAME       => array(AliLocationBaseTableMap::COL_CID, AliLocationBaseTableMap::COL_CSHORT, AliLocationBaseTableMap::COL_CNAME, AliLocationBaseTableMap::COL_CSENDING, AliLocationBaseTableMap::COL_CTAX, AliLocationBaseTableMap::COL_CTAX1, AliLocationBaseTableMap::COL_COM_STOCKIST, AliLocationBaseTableMap::COL_CRATE, AliLocationBaseTableMap::COL_PCODE_REGISTER, AliLocationBaseTableMap::COL_PCODE_EXTEND, AliLocationBaseTableMap::COL_PCODE_CHARGE, AliLocationBaseTableMap::COL_SMSSENDING, AliLocationBaseTableMap::COL_CURRCODE, AliLocationBaseTableMap::COL_LANG, AliLocationBaseTableMap::COL_TIMEDIFF, AliLocationBaseTableMap::COL_REGIS_TRANSFER, AliLocationBaseTableMap::COL_REGIS_SUCCESS, AliLocationBaseTableMap::COL_REGIS_FAIL, AliLocationBaseTableMap::COL_REGIS_CANCEL, AliLocationBaseTableMap::COL_MAIN_INV_CODE, AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE, ),
        self::TYPE_FIELDNAME     => array('cid', 'cshort', 'cname', 'csending', 'ctax', 'ctax1', 'com_stockist', 'crate', 'pcode_register', 'pcode_extend', 'pcode_charge', 'smssending', 'currcode', 'lang', 'timediff', 'regis_transfer', 'regis_success', 'regis_fail', 'regis_cancel', 'main_inv_code', 'com_transfer_chagre', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Cid' => 0, 'Cshort' => 1, 'Cname' => 2, 'Csending' => 3, 'Ctax' => 4, 'Ctax1' => 5, 'ComStockist' => 6, 'Crate' => 7, 'PcodeRegister' => 8, 'PcodeExtend' => 9, 'PcodeCharge' => 10, 'Smssending' => 11, 'Currcode' => 12, 'Lang' => 13, 'Timediff' => 14, 'RegisTransfer' => 15, 'RegisSuccess' => 16, 'RegisFail' => 17, 'RegisCancel' => 18, 'MainInvCode' => 19, 'ComTransferChagre' => 20, ),
        self::TYPE_CAMELNAME     => array('cid' => 0, 'cshort' => 1, 'cname' => 2, 'csending' => 3, 'ctax' => 4, 'ctax1' => 5, 'comStockist' => 6, 'crate' => 7, 'pcodeRegister' => 8, 'pcodeExtend' => 9, 'pcodeCharge' => 10, 'smssending' => 11, 'currcode' => 12, 'lang' => 13, 'timediff' => 14, 'regisTransfer' => 15, 'regisSuccess' => 16, 'regisFail' => 17, 'regisCancel' => 18, 'mainInvCode' => 19, 'comTransferChagre' => 20, ),
        self::TYPE_COLNAME       => array(AliLocationBaseTableMap::COL_CID => 0, AliLocationBaseTableMap::COL_CSHORT => 1, AliLocationBaseTableMap::COL_CNAME => 2, AliLocationBaseTableMap::COL_CSENDING => 3, AliLocationBaseTableMap::COL_CTAX => 4, AliLocationBaseTableMap::COL_CTAX1 => 5, AliLocationBaseTableMap::COL_COM_STOCKIST => 6, AliLocationBaseTableMap::COL_CRATE => 7, AliLocationBaseTableMap::COL_PCODE_REGISTER => 8, AliLocationBaseTableMap::COL_PCODE_EXTEND => 9, AliLocationBaseTableMap::COL_PCODE_CHARGE => 10, AliLocationBaseTableMap::COL_SMSSENDING => 11, AliLocationBaseTableMap::COL_CURRCODE => 12, AliLocationBaseTableMap::COL_LANG => 13, AliLocationBaseTableMap::COL_TIMEDIFF => 14, AliLocationBaseTableMap::COL_REGIS_TRANSFER => 15, AliLocationBaseTableMap::COL_REGIS_SUCCESS => 16, AliLocationBaseTableMap::COL_REGIS_FAIL => 17, AliLocationBaseTableMap::COL_REGIS_CANCEL => 18, AliLocationBaseTableMap::COL_MAIN_INV_CODE => 19, AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE => 20, ),
        self::TYPE_FIELDNAME     => array('cid' => 0, 'cshort' => 1, 'cname' => 2, 'csending' => 3, 'ctax' => 4, 'ctax1' => 5, 'com_stockist' => 6, 'crate' => 7, 'pcode_register' => 8, 'pcode_extend' => 9, 'pcode_charge' => 10, 'smssending' => 11, 'currcode' => 12, 'lang' => 13, 'timediff' => 14, 'regis_transfer' => 15, 'regis_success' => 16, 'regis_fail' => 17, 'regis_cancel' => 18, 'main_inv_code' => 19, 'com_transfer_chagre' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $this->setName('ali_location_base');
        $this->setPhpName('AliLocationBase');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliLocationBase');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('cid', 'Cid', 'INTEGER', true, null, null);
        $this->addColumn('cshort', 'Cshort', 'VARCHAR', true, 255, null);
        $this->addColumn('cname', 'Cname', 'VARCHAR', true, 255, null);
        $this->addColumn('csending', 'Csending', 'VARCHAR', true, 255, null);
        $this->addColumn('ctax', 'Ctax', 'DECIMAL', true, 15, null);
        $this->addColumn('ctax1', 'Ctax1', 'DECIMAL', true, 15, null);
        $this->addColumn('com_stockist', 'ComStockist', 'DECIMAL', true, 15, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 15, null);
        $this->addColumn('pcode_register', 'PcodeRegister', 'VARCHAR', true, 255, null);
        $this->addColumn('pcode_extend', 'PcodeExtend', 'VARCHAR', true, 255, null);
        $this->addColumn('pcode_charge', 'PcodeCharge', 'VARCHAR', true, 255, null);
        $this->addColumn('smssending', 'Smssending', 'INTEGER', true, null, null);
        $this->addColumn('currcode', 'Currcode', 'VARCHAR', true, 255, null);
        $this->addColumn('lang', 'Lang', 'VARCHAR', true, 255, null);
        $this->addColumn('timediff', 'Timediff', 'INTEGER', true, null, null);
        $this->addColumn('regis_transfer', 'RegisTransfer', 'VARCHAR', true, 255, null);
        $this->addColumn('regis_success', 'RegisSuccess', 'VARCHAR', true, 255, null);
        $this->addColumn('regis_fail', 'RegisFail', 'VARCHAR', true, 255, null);
        $this->addColumn('regis_cancel', 'RegisCancel', 'VARCHAR', true, 255, null);
        $this->addColumn('main_inv_code', 'MainInvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('com_transfer_chagre', 'ComTransferChagre', 'DECIMAL', true, 15, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliLocationBaseTableMap::CLASS_DEFAULT : AliLocationBaseTableMap::OM_CLASS;
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
     * @return array           (AliLocationBase object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliLocationBaseTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliLocationBaseTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliLocationBaseTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliLocationBaseTableMap::OM_CLASS;
            /** @var AliLocationBase $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliLocationBaseTableMap::addInstanceToPool($obj, $key);
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
            $key = AliLocationBaseTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliLocationBaseTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliLocationBase $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliLocationBaseTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_CID);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_CSHORT);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_CNAME);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_CSENDING);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_CTAX);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_CTAX1);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_COM_STOCKIST);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_PCODE_REGISTER);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_PCODE_EXTEND);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_PCODE_CHARGE);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_SMSSENDING);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_CURRCODE);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_LANG);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_TIMEDIFF);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_REGIS_TRANSFER);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_REGIS_SUCCESS);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_REGIS_FAIL);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_REGIS_CANCEL);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_MAIN_INV_CODE);
            $criteria->addSelectColumn(AliLocationBaseTableMap::COL_COM_TRANSFER_CHAGRE);
        } else {
            $criteria->addSelectColumn($alias . '.cid');
            $criteria->addSelectColumn($alias . '.cshort');
            $criteria->addSelectColumn($alias . '.cname');
            $criteria->addSelectColumn($alias . '.csending');
            $criteria->addSelectColumn($alias . '.ctax');
            $criteria->addSelectColumn($alias . '.ctax1');
            $criteria->addSelectColumn($alias . '.com_stockist');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.pcode_register');
            $criteria->addSelectColumn($alias . '.pcode_extend');
            $criteria->addSelectColumn($alias . '.pcode_charge');
            $criteria->addSelectColumn($alias . '.smssending');
            $criteria->addSelectColumn($alias . '.currcode');
            $criteria->addSelectColumn($alias . '.lang');
            $criteria->addSelectColumn($alias . '.timediff');
            $criteria->addSelectColumn($alias . '.regis_transfer');
            $criteria->addSelectColumn($alias . '.regis_success');
            $criteria->addSelectColumn($alias . '.regis_fail');
            $criteria->addSelectColumn($alias . '.regis_cancel');
            $criteria->addSelectColumn($alias . '.main_inv_code');
            $criteria->addSelectColumn($alias . '.com_transfer_chagre');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliLocationBaseTableMap::DATABASE_NAME)->getTable(AliLocationBaseTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliLocationBaseTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliLocationBaseTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliLocationBaseTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliLocationBase or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliLocationBase object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLocationBaseTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliLocationBase) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliLocationBaseTableMap::DATABASE_NAME);
            $criteria->add(AliLocationBaseTableMap::COL_CID, (array) $values, Criteria::IN);
        }

        $query = AliLocationBaseQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliLocationBaseTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliLocationBaseTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_location_base table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliLocationBaseQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliLocationBase or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliLocationBase object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLocationBaseTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliLocationBase object
        }

        if ($criteria->containsKey(AliLocationBaseTableMap::COL_CID) && $criteria->keyContainsValue(AliLocationBaseTableMap::COL_CID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliLocationBaseTableMap::COL_CID.')');
        }


        // Set the correct dbName
        $query = AliLocationBaseQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliLocationBaseTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliLocationBaseTableMap::buildTableMap();
