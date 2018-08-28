<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliLogChange;
use CciOrm\CciOrm\AliLogChangeQuery;
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
 * This class defines the structure of the 'ali_log_change' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliLogChangeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliLogChangeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_log_change';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliLogChange';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliLogChange';

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
    const COL_ID = 'ali_log_change.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_log_change.rcode';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_log_change.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_log_change.tdate';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_log_change.mcode';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_log_change.mpos';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_log_change.status';

    /**
     * the column name for the pvb field
     */
    const COL_PVB = 'ali_log_change.pvb';

    /**
     * the column name for the pvh field
     */
    const COL_PVH = 'ali_log_change.pvh';

    /**
     * the column name for the fob field
     */
    const COL_FOB = 'ali_log_change.fob';

    /**
     * the column name for the cycle field
     */
    const COL_CYCLE = 'ali_log_change.cycle';

    /**
     * the column name for the ambonus2 field
     */
    const COL_AMBONUS2 = 'ali_log_change.ambonus2';

    /**
     * the column name for the fmbonus field
     */
    const COL_FMBONUS = 'ali_log_change.fmbonus';

    /**
     * the column name for the unilevel field
     */
    const COL_UNILEVEL = 'ali_log_change.unilevel';

    /**
     * the column name for the adjust field
     */
    const COL_ADJUST = 'ali_log_change.adjust';

    /**
     * the column name for the autoship field
     */
    const COL_AUTOSHIP = 'ali_log_change.autoship';

    /**
     * the column name for the ewallet_withdraw field
     */
    const COL_EWALLET_WITHDRAW = 'ali_log_change.ewallet_withdraw';

    /**
     * the column name for the tot_tax field
     */
    const COL_TOT_TAX = 'ali_log_change.tot_tax';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_log_change.pv';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_log_change.total';

    /**
     * the column name for the paydate field
     */
    const COL_PAYDATE = 'ali_log_change.paydate';

    /**
     * the column name for the date_change field
     */
    const COL_DATE_CHANGE = 'ali_log_change.date_change';

    /**
     * the column name for the com_transfer_chagre field
     */
    const COL_COM_TRANSFER_CHAGRE = 'ali_log_change.com_transfer_chagre';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_log_change.uid';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Fdate', 'Tdate', 'Mcode', 'Mpos', 'Status', 'Pvb', 'Pvh', 'Fob', 'Cycle', 'Ambonus2', 'Fmbonus', 'Unilevel', 'Adjust', 'Autoship', 'EwalletWithdraw', 'TotTax', 'Pv', 'Total', 'Paydate', 'DateChange', 'ComTransferChagre', 'Uid', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'fdate', 'tdate', 'mcode', 'mpos', 'status', 'pvb', 'pvh', 'fob', 'cycle', 'ambonus2', 'fmbonus', 'unilevel', 'adjust', 'autoship', 'ewalletWithdraw', 'totTax', 'pv', 'total', 'paydate', 'dateChange', 'comTransferChagre', 'uid', ),
        self::TYPE_COLNAME       => array(AliLogChangeTableMap::COL_ID, AliLogChangeTableMap::COL_RCODE, AliLogChangeTableMap::COL_FDATE, AliLogChangeTableMap::COL_TDATE, AliLogChangeTableMap::COL_MCODE, AliLogChangeTableMap::COL_MPOS, AliLogChangeTableMap::COL_STATUS, AliLogChangeTableMap::COL_PVB, AliLogChangeTableMap::COL_PVH, AliLogChangeTableMap::COL_FOB, AliLogChangeTableMap::COL_CYCLE, AliLogChangeTableMap::COL_AMBONUS2, AliLogChangeTableMap::COL_FMBONUS, AliLogChangeTableMap::COL_UNILEVEL, AliLogChangeTableMap::COL_ADJUST, AliLogChangeTableMap::COL_AUTOSHIP, AliLogChangeTableMap::COL_EWALLET_WITHDRAW, AliLogChangeTableMap::COL_TOT_TAX, AliLogChangeTableMap::COL_PV, AliLogChangeTableMap::COL_TOTAL, AliLogChangeTableMap::COL_PAYDATE, AliLogChangeTableMap::COL_DATE_CHANGE, AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE, AliLogChangeTableMap::COL_UID, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'fdate', 'tdate', 'mcode', 'mpos', 'status', 'pvb', 'pvh', 'fob', 'cycle', 'ambonus2', 'fmbonus', 'unilevel', 'adjust', 'autoship', 'ewallet_withdraw', 'tot_tax', 'pv', 'total', 'paydate', 'date_change', 'com_transfer_chagre', 'uid', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Fdate' => 2, 'Tdate' => 3, 'Mcode' => 4, 'Mpos' => 5, 'Status' => 6, 'Pvb' => 7, 'Pvh' => 8, 'Fob' => 9, 'Cycle' => 10, 'Ambonus2' => 11, 'Fmbonus' => 12, 'Unilevel' => 13, 'Adjust' => 14, 'Autoship' => 15, 'EwalletWithdraw' => 16, 'TotTax' => 17, 'Pv' => 18, 'Total' => 19, 'Paydate' => 20, 'DateChange' => 21, 'ComTransferChagre' => 22, 'Uid' => 23, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'fdate' => 2, 'tdate' => 3, 'mcode' => 4, 'mpos' => 5, 'status' => 6, 'pvb' => 7, 'pvh' => 8, 'fob' => 9, 'cycle' => 10, 'ambonus2' => 11, 'fmbonus' => 12, 'unilevel' => 13, 'adjust' => 14, 'autoship' => 15, 'ewalletWithdraw' => 16, 'totTax' => 17, 'pv' => 18, 'total' => 19, 'paydate' => 20, 'dateChange' => 21, 'comTransferChagre' => 22, 'uid' => 23, ),
        self::TYPE_COLNAME       => array(AliLogChangeTableMap::COL_ID => 0, AliLogChangeTableMap::COL_RCODE => 1, AliLogChangeTableMap::COL_FDATE => 2, AliLogChangeTableMap::COL_TDATE => 3, AliLogChangeTableMap::COL_MCODE => 4, AliLogChangeTableMap::COL_MPOS => 5, AliLogChangeTableMap::COL_STATUS => 6, AliLogChangeTableMap::COL_PVB => 7, AliLogChangeTableMap::COL_PVH => 8, AliLogChangeTableMap::COL_FOB => 9, AliLogChangeTableMap::COL_CYCLE => 10, AliLogChangeTableMap::COL_AMBONUS2 => 11, AliLogChangeTableMap::COL_FMBONUS => 12, AliLogChangeTableMap::COL_UNILEVEL => 13, AliLogChangeTableMap::COL_ADJUST => 14, AliLogChangeTableMap::COL_AUTOSHIP => 15, AliLogChangeTableMap::COL_EWALLET_WITHDRAW => 16, AliLogChangeTableMap::COL_TOT_TAX => 17, AliLogChangeTableMap::COL_PV => 18, AliLogChangeTableMap::COL_TOTAL => 19, AliLogChangeTableMap::COL_PAYDATE => 20, AliLogChangeTableMap::COL_DATE_CHANGE => 21, AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE => 22, AliLogChangeTableMap::COL_UID => 23, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'fdate' => 2, 'tdate' => 3, 'mcode' => 4, 'mpos' => 5, 'status' => 6, 'pvb' => 7, 'pvh' => 8, 'fob' => 9, 'cycle' => 10, 'ambonus2' => 11, 'fmbonus' => 12, 'unilevel' => 13, 'adjust' => 14, 'autoship' => 15, 'ewallet_withdraw' => 16, 'tot_tax' => 17, 'pv' => 18, 'total' => 19, 'paydate' => 20, 'date_change' => 21, 'com_transfer_chagre' => 22, 'uid' => 23, ),
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
        $this->setName('ali_log_change');
        $this->setPhpName('AliLogChange');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliLogChange');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('mpos', 'Mpos', 'VARCHAR', true, 50, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 2, null);
        $this->addColumn('pvb', 'Pvb', 'DECIMAL', true, 15, null);
        $this->addColumn('pvh', 'Pvh', 'DECIMAL', true, 15, null);
        $this->addColumn('fob', 'Fob', 'DECIMAL', true, 15, null);
        $this->addColumn('cycle', 'Cycle', 'DECIMAL', true, 15, null);
        $this->addColumn('ambonus2', 'Ambonus2', 'DECIMAL', true, 15, null);
        $this->addColumn('fmbonus', 'Fmbonus', 'DECIMAL', true, 15, null);
        $this->addColumn('unilevel', 'Unilevel', 'DECIMAL', true, 15, null);
        $this->addColumn('adjust', 'Adjust', 'DECIMAL', true, 15, null);
        $this->addColumn('autoship', 'Autoship', 'DECIMAL', true, 15, null);
        $this->addColumn('ewallet_withdraw', 'EwalletWithdraw', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_tax', 'TotTax', 'DECIMAL', true, 15, null);
        $this->addColumn('pv', 'Pv', 'INTEGER', true, 10, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('paydate', 'Paydate', 'DATE', true, null, null);
        $this->addColumn('date_change', 'DateChange', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('com_transfer_chagre', 'ComTransferChagre', 'INTEGER', true, 10, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 100, null);
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
        return $withPrefix ? AliLogChangeTableMap::CLASS_DEFAULT : AliLogChangeTableMap::OM_CLASS;
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
     * @return array           (AliLogChange object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliLogChangeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliLogChangeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliLogChangeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliLogChangeTableMap::OM_CLASS;
            /** @var AliLogChange $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliLogChangeTableMap::addInstanceToPool($obj, $key);
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
            $key = AliLogChangeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliLogChangeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliLogChange $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliLogChangeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_ID);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_PVB);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_PVH);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_FOB);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_CYCLE);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_AMBONUS2);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_FMBONUS);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_UNILEVEL);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_ADJUST);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_AUTOSHIP);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_EWALLET_WITHDRAW);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_TOT_TAX);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_PV);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_PAYDATE);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_DATE_CHANGE);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE);
            $criteria->addSelectColumn(AliLogChangeTableMap::COL_UID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.mpos');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.pvb');
            $criteria->addSelectColumn($alias . '.pvh');
            $criteria->addSelectColumn($alias . '.fob');
            $criteria->addSelectColumn($alias . '.cycle');
            $criteria->addSelectColumn($alias . '.ambonus2');
            $criteria->addSelectColumn($alias . '.fmbonus');
            $criteria->addSelectColumn($alias . '.unilevel');
            $criteria->addSelectColumn($alias . '.adjust');
            $criteria->addSelectColumn($alias . '.autoship');
            $criteria->addSelectColumn($alias . '.ewallet_withdraw');
            $criteria->addSelectColumn($alias . '.tot_tax');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.paydate');
            $criteria->addSelectColumn($alias . '.date_change');
            $criteria->addSelectColumn($alias . '.com_transfer_chagre');
            $criteria->addSelectColumn($alias . '.uid');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliLogChangeTableMap::DATABASE_NAME)->getTable(AliLogChangeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliLogChangeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliLogChangeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliLogChangeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliLogChange or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliLogChange object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogChangeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliLogChange) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliLogChangeTableMap::DATABASE_NAME);
            $criteria->add(AliLogChangeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliLogChangeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliLogChangeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliLogChangeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_log_change table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliLogChangeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliLogChange or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliLogChange object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogChangeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliLogChange object
        }

        if ($criteria->containsKey(AliLogChangeTableMap::COL_ID) && $criteria->keyContainsValue(AliLogChangeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliLogChangeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliLogChangeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliLogChangeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliLogChangeTableMap::buildTableMap();
