<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliHoldhead;
use CciOrm\CciOrm\AliHoldheadQuery;
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
 * This class defines the structure of the 'ali_holdhead' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliHoldheadTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliHoldheadTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_holdhead';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliHoldhead';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliHoldhead';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 35;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 35;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_holdhead.id';

    /**
     * the column name for the hono field
     */
    const COL_HONO = 'ali_holdhead.hono';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_holdhead.sano';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_holdhead.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_holdhead.sctime';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_holdhead.sa_type';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_holdhead.inv_code';

    /**
     * the column name for the inv_code_to field
     */
    const COL_INV_CODE_TO = 'ali_holdhead.inv_code_to';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_holdhead.mcode';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_holdhead.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_holdhead.tot_pv';

    /**
     * the column name for the tot_bv field
     */
    const COL_TOT_BV = 'ali_holdhead.tot_bv';

    /**
     * the column name for the tot_sppv field
     */
    const COL_TOT_SPPV = 'ali_holdhead.tot_sppv';

    /**
     * the column name for the tot_fv field
     */
    const COL_TOT_FV = 'ali_holdhead.tot_fv';

    /**
     * the column name for the trnf field
     */
    const COL_TRNF = 'ali_holdhead.trnf';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_holdhead.cancel';

    /**
     * the column name for the remark field
     */
    const COL_REMARK = 'ali_holdhead.remark';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_holdhead.uid';

    /**
     * the column name for the dl field
     */
    const COL_DL = 'ali_holdhead.dl';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_holdhead.print';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_holdhead.rcode';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_holdhead.status';

    /**
     * the column name for the bmcauto field
     */
    const COL_BMCAUTO = 'ali_holdhead.bmcauto';

    /**
     * the column name for the cancel_date field
     */
    const COL_CANCEL_DATE = 'ali_holdhead.cancel_date';

    /**
     * the column name for the uid_cancel field
     */
    const COL_UID_CANCEL = 'ali_holdhead.uid_cancel';

    /**
     * the column name for the mbase field
     */
    const COL_MBASE = 'ali_holdhead.mbase';

    /**
     * the column name for the bprice field
     */
    const COL_BPRICE = 'ali_holdhead.bprice';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_holdhead.locationbase';

    /**
     * the column name for the name_f field
     */
    const COL_NAME_F = 'ali_holdhead.name_f';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_holdhead.name_t';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_holdhead.crate';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_holdhead.sp_code';

    /**
     * the column name for the sp_pos field
     */
    const COL_SP_POS = 'ali_holdhead.sp_pos';

    /**
     * the column name for the ref field
     */
    const COL_REF = 'ali_holdhead.ref';

    /**
     * the column name for the status_package field
     */
    const COL_STATUS_PACKAGE = 'ali_holdhead.status_package';

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
        self::TYPE_PHPNAME       => array('Id', 'Hono', 'Sano', 'Sadate', 'Sctime', 'SaType', 'InvCode', 'InvCodeTo', 'Mcode', 'Total', 'TotPv', 'TotBv', 'TotSppv', 'TotFv', 'Trnf', 'Cancel', 'Remark', 'Uid', 'Dl', 'Print', 'Rcode', 'Status', 'Bmcauto', 'CancelDate', 'UidCancel', 'Mbase', 'Bprice', 'Locationbase', 'NameF', 'NameT', 'Crate', 'SpCode', 'SpPos', 'Ref', 'StatusPackage', ),
        self::TYPE_CAMELNAME     => array('id', 'hono', 'sano', 'sadate', 'sctime', 'saType', 'invCode', 'invCodeTo', 'mcode', 'total', 'totPv', 'totBv', 'totSppv', 'totFv', 'trnf', 'cancel', 'remark', 'uid', 'dl', 'print', 'rcode', 'status', 'bmcauto', 'cancelDate', 'uidCancel', 'mbase', 'bprice', 'locationbase', 'nameF', 'nameT', 'crate', 'spCode', 'spPos', 'ref', 'statusPackage', ),
        self::TYPE_COLNAME       => array(AliHoldheadTableMap::COL_ID, AliHoldheadTableMap::COL_HONO, AliHoldheadTableMap::COL_SANO, AliHoldheadTableMap::COL_SADATE, AliHoldheadTableMap::COL_SCTIME, AliHoldheadTableMap::COL_SA_TYPE, AliHoldheadTableMap::COL_INV_CODE, AliHoldheadTableMap::COL_INV_CODE_TO, AliHoldheadTableMap::COL_MCODE, AliHoldheadTableMap::COL_TOTAL, AliHoldheadTableMap::COL_TOT_PV, AliHoldheadTableMap::COL_TOT_BV, AliHoldheadTableMap::COL_TOT_SPPV, AliHoldheadTableMap::COL_TOT_FV, AliHoldheadTableMap::COL_TRNF, AliHoldheadTableMap::COL_CANCEL, AliHoldheadTableMap::COL_REMARK, AliHoldheadTableMap::COL_UID, AliHoldheadTableMap::COL_DL, AliHoldheadTableMap::COL_PRINT, AliHoldheadTableMap::COL_RCODE, AliHoldheadTableMap::COL_STATUS, AliHoldheadTableMap::COL_BMCAUTO, AliHoldheadTableMap::COL_CANCEL_DATE, AliHoldheadTableMap::COL_UID_CANCEL, AliHoldheadTableMap::COL_MBASE, AliHoldheadTableMap::COL_BPRICE, AliHoldheadTableMap::COL_LOCATIONBASE, AliHoldheadTableMap::COL_NAME_F, AliHoldheadTableMap::COL_NAME_T, AliHoldheadTableMap::COL_CRATE, AliHoldheadTableMap::COL_SP_CODE, AliHoldheadTableMap::COL_SP_POS, AliHoldheadTableMap::COL_REF, AliHoldheadTableMap::COL_STATUS_PACKAGE, ),
        self::TYPE_FIELDNAME     => array('id', 'hono', 'sano', 'sadate', 'sctime', 'sa_type', 'inv_code', 'inv_code_to', 'mcode', 'total', 'tot_pv', 'tot_bv', 'tot_sppv', 'tot_fv', 'trnf', 'cancel', 'remark', 'uid', 'dl', 'print', 'rcode', 'status', 'bmcauto', 'cancel_date', 'uid_cancel', 'mbase', 'bprice', 'locationbase', 'name_f', 'name_t', 'crate', 'sp_code', 'sp_pos', 'ref', 'status_package', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Hono' => 1, 'Sano' => 2, 'Sadate' => 3, 'Sctime' => 4, 'SaType' => 5, 'InvCode' => 6, 'InvCodeTo' => 7, 'Mcode' => 8, 'Total' => 9, 'TotPv' => 10, 'TotBv' => 11, 'TotSppv' => 12, 'TotFv' => 13, 'Trnf' => 14, 'Cancel' => 15, 'Remark' => 16, 'Uid' => 17, 'Dl' => 18, 'Print' => 19, 'Rcode' => 20, 'Status' => 21, 'Bmcauto' => 22, 'CancelDate' => 23, 'UidCancel' => 24, 'Mbase' => 25, 'Bprice' => 26, 'Locationbase' => 27, 'NameF' => 28, 'NameT' => 29, 'Crate' => 30, 'SpCode' => 31, 'SpPos' => 32, 'Ref' => 33, 'StatusPackage' => 34, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'hono' => 1, 'sano' => 2, 'sadate' => 3, 'sctime' => 4, 'saType' => 5, 'invCode' => 6, 'invCodeTo' => 7, 'mcode' => 8, 'total' => 9, 'totPv' => 10, 'totBv' => 11, 'totSppv' => 12, 'totFv' => 13, 'trnf' => 14, 'cancel' => 15, 'remark' => 16, 'uid' => 17, 'dl' => 18, 'print' => 19, 'rcode' => 20, 'status' => 21, 'bmcauto' => 22, 'cancelDate' => 23, 'uidCancel' => 24, 'mbase' => 25, 'bprice' => 26, 'locationbase' => 27, 'nameF' => 28, 'nameT' => 29, 'crate' => 30, 'spCode' => 31, 'spPos' => 32, 'ref' => 33, 'statusPackage' => 34, ),
        self::TYPE_COLNAME       => array(AliHoldheadTableMap::COL_ID => 0, AliHoldheadTableMap::COL_HONO => 1, AliHoldheadTableMap::COL_SANO => 2, AliHoldheadTableMap::COL_SADATE => 3, AliHoldheadTableMap::COL_SCTIME => 4, AliHoldheadTableMap::COL_SA_TYPE => 5, AliHoldheadTableMap::COL_INV_CODE => 6, AliHoldheadTableMap::COL_INV_CODE_TO => 7, AliHoldheadTableMap::COL_MCODE => 8, AliHoldheadTableMap::COL_TOTAL => 9, AliHoldheadTableMap::COL_TOT_PV => 10, AliHoldheadTableMap::COL_TOT_BV => 11, AliHoldheadTableMap::COL_TOT_SPPV => 12, AliHoldheadTableMap::COL_TOT_FV => 13, AliHoldheadTableMap::COL_TRNF => 14, AliHoldheadTableMap::COL_CANCEL => 15, AliHoldheadTableMap::COL_REMARK => 16, AliHoldheadTableMap::COL_UID => 17, AliHoldheadTableMap::COL_DL => 18, AliHoldheadTableMap::COL_PRINT => 19, AliHoldheadTableMap::COL_RCODE => 20, AliHoldheadTableMap::COL_STATUS => 21, AliHoldheadTableMap::COL_BMCAUTO => 22, AliHoldheadTableMap::COL_CANCEL_DATE => 23, AliHoldheadTableMap::COL_UID_CANCEL => 24, AliHoldheadTableMap::COL_MBASE => 25, AliHoldheadTableMap::COL_BPRICE => 26, AliHoldheadTableMap::COL_LOCATIONBASE => 27, AliHoldheadTableMap::COL_NAME_F => 28, AliHoldheadTableMap::COL_NAME_T => 29, AliHoldheadTableMap::COL_CRATE => 30, AliHoldheadTableMap::COL_SP_CODE => 31, AliHoldheadTableMap::COL_SP_POS => 32, AliHoldheadTableMap::COL_REF => 33, AliHoldheadTableMap::COL_STATUS_PACKAGE => 34, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'hono' => 1, 'sano' => 2, 'sadate' => 3, 'sctime' => 4, 'sa_type' => 5, 'inv_code' => 6, 'inv_code_to' => 7, 'mcode' => 8, 'total' => 9, 'tot_pv' => 10, 'tot_bv' => 11, 'tot_sppv' => 12, 'tot_fv' => 13, 'trnf' => 14, 'cancel' => 15, 'remark' => 16, 'uid' => 17, 'dl' => 18, 'print' => 19, 'rcode' => 20, 'status' => 21, 'bmcauto' => 22, 'cancel_date' => 23, 'uid_cancel' => 24, 'mbase' => 25, 'bprice' => 26, 'locationbase' => 27, 'name_f' => 28, 'name_t' => 29, 'crate' => 30, 'sp_code' => 31, 'sp_pos' => 32, 'ref' => 33, 'status_package' => 34, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, )
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
        $this->setName('ali_holdhead');
        $this->setPhpName('AliHoldhead');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliHoldhead');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('hono', 'Hono', 'INTEGER', true, null, null);
        $this->addColumn('sano', 'Sano', 'INTEGER', true, 10, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('sctime', 'Sctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('sa_type', 'SaType', 'CHAR', false, 2, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('inv_code_to', 'InvCodeTo', 'VARCHAR', true, 255, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', false, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 10, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 10, null);
        $this->addColumn('tot_bv', 'TotBv', 'DECIMAL', false, 10, null);
        $this->addColumn('tot_sppv', 'TotSppv', 'DECIMAL', true, 15, null);
        $this->addColumn('tot_fv', 'TotFv', 'DECIMAL', true, 15, null);
        $this->addColumn('trnf', 'Trnf', 'INTEGER', true, null, 0);
        $this->addColumn('cancel', 'Cancel', 'CHAR', false, null, '0');
        $this->addColumn('remark', 'Remark', 'VARCHAR', false, 40, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', false, 255, null);
        $this->addColumn('dl', 'Dl', 'CHAR', false, null, null);
        $this->addColumn('print', 'Print', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, 10, null);
        $this->addColumn('bmcauto', 'Bmcauto', 'INTEGER', true, null, null);
        $this->addColumn('cancel_date', 'CancelDate', 'DATE', true, null, null);
        $this->addColumn('uid_cancel', 'UidCancel', 'VARCHAR', true, 255, null);
        $this->addColumn('mbase', 'Mbase', 'VARCHAR', true, 255, null);
        $this->addColumn('bprice', 'Bprice', 'DECIMAL', true, 15, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('name_f', 'NameF', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_pos', 'SpPos', 'VARCHAR', true, 255, null);
        $this->addColumn('ref', 'Ref', 'VARCHAR', true, 100, null);
        $this->addColumn('status_package', 'StatusPackage', 'INTEGER', true, 10, null);
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
        return $withPrefix ? AliHoldheadTableMap::CLASS_DEFAULT : AliHoldheadTableMap::OM_CLASS;
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
     * @return array           (AliHoldhead object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliHoldheadTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliHoldheadTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliHoldheadTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliHoldheadTableMap::OM_CLASS;
            /** @var AliHoldhead $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliHoldheadTableMap::addInstanceToPool($obj, $key);
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
            $key = AliHoldheadTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliHoldheadTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliHoldhead $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliHoldheadTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_ID);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_HONO);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_SANO);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_INV_CODE_TO);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_TOT_BV);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_TOT_SPPV);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_TOT_FV);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_TRNF);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_REMARK);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_UID);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_DL);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_BMCAUTO);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_CANCEL_DATE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_UID_CANCEL);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_MBASE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_BPRICE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_NAME_F);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_SP_POS);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_REF);
            $criteria->addSelectColumn(AliHoldheadTableMap::COL_STATUS_PACKAGE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.hono');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.sctime');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_code_to');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.tot_bv');
            $criteria->addSelectColumn($alias . '.tot_sppv');
            $criteria->addSelectColumn($alias . '.tot_fv');
            $criteria->addSelectColumn($alias . '.trnf');
            $criteria->addSelectColumn($alias . '.cancel');
            $criteria->addSelectColumn($alias . '.remark');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.dl');
            $criteria->addSelectColumn($alias . '.print');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.bmcauto');
            $criteria->addSelectColumn($alias . '.cancel_date');
            $criteria->addSelectColumn($alias . '.uid_cancel');
            $criteria->addSelectColumn($alias . '.mbase');
            $criteria->addSelectColumn($alias . '.bprice');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.name_f');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.sp_pos');
            $criteria->addSelectColumn($alias . '.ref');
            $criteria->addSelectColumn($alias . '.status_package');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliHoldheadTableMap::DATABASE_NAME)->getTable(AliHoldheadTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliHoldheadTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliHoldheadTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliHoldheadTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliHoldhead or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliHoldhead object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliHoldheadTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliHoldhead) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliHoldheadTableMap::DATABASE_NAME);
            $criteria->add(AliHoldheadTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliHoldheadQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliHoldheadTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliHoldheadTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_holdhead table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliHoldheadQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliHoldhead or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliHoldhead object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliHoldheadTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliHoldhead object
        }

        if ($criteria->containsKey(AliHoldheadTableMap::COL_ID) && $criteria->keyContainsValue(AliHoldheadTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliHoldheadTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliHoldheadQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliHoldheadTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliHoldheadTableMap::buildTableMap();
