<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliOstockh;
use CciOrm\CciOrm\AliOstockhQuery;
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
 * This class defines the structure of the 'ali_ostockh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliOstockhTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliOstockhTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_ostockh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliOstockh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliOstockh';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 29;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 29;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_ostockh.sano';

    /**
     * the column name for the sano1 field
     */
    const COL_SANO1 = 'ali_ostockh.sano1';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_ostockh.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_ostockh.sctime';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_ostockh.inv_code';

    /**
     * the column name for the inv_coden field
     */
    const COL_INV_CODEN = 'ali_ostockh.inv_coden';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_ostockh.inv_ref';

    /**
     * the column name for the inv_refn field
     */
    const COL_INV_REFN = 'ali_ostockh.inv_refn';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_ostockh.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_ostockh.tot_pv';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_ostockh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_ostockh.sa_type';

    /**
     * the column name for the sa_mtype field
     */
    const COL_SA_MTYPE = 'ali_ostockh.sa_mtype';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_ostockh.uid';

    /**
     * the column name for the uid_ref field
     */
    const COL_UID_REF = 'ali_ostockh.uid_ref';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_ostockh.cancel';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_ostockh.txtoption';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_ostockh.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_ostockh.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_ostockh.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_ostockh.receive_date';

    /**
     * the column name for the uid_receive field
     */
    const COL_UID_RECEIVE = 'ali_ostockh.uid_receive';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_ostockh.status';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_ostockh.print';

    /**
     * the column name for the rccode field
     */
    const COL_RCCODE = 'ali_ostockh.rccode';

    /**
     * the column name for the update_date field
     */
    const COL_UPDATE_DATE = 'ali_ostockh.update_date';

    /**
     * the column name for the mapping_code field
     */
    const COL_MAPPING_CODE = 'ali_ostockh.mapping_code';

    /**
     * the column name for the rrcode field
     */
    const COL_RRCODE = 'ali_ostockh.rrcode';

    /**
     * the column name for the auto field
     */
    const COL_AUTO = 'ali_ostockh.auto';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sano1', 'Sadate', 'Sctime', 'InvCode', 'InvCoden', 'InvRef', 'InvRefn', 'Total', 'TotPv', 'Id', 'SaType', 'SaMtype', 'Uid', 'UidRef', 'Cancel', 'Txtoption', 'Sender', 'SenderDate', 'Receive', 'ReceiveDate', 'UidReceive', 'Status', 'Print', 'Rccode', 'UpdateDate', 'MappingCode', 'Rrcode', 'Auto', ),
        self::TYPE_CAMELNAME     => array('sano', 'sano1', 'sadate', 'sctime', 'invCode', 'invCoden', 'invRef', 'invRefn', 'total', 'totPv', 'id', 'saType', 'saMtype', 'uid', 'uidRef', 'cancel', 'txtoption', 'sender', 'senderDate', 'receive', 'receiveDate', 'uidReceive', 'status', 'print', 'rccode', 'updateDate', 'mappingCode', 'rrcode', 'auto', ),
        self::TYPE_COLNAME       => array(AliOstockhTableMap::COL_SANO, AliOstockhTableMap::COL_SANO1, AliOstockhTableMap::COL_SADATE, AliOstockhTableMap::COL_SCTIME, AliOstockhTableMap::COL_INV_CODE, AliOstockhTableMap::COL_INV_CODEN, AliOstockhTableMap::COL_INV_REF, AliOstockhTableMap::COL_INV_REFN, AliOstockhTableMap::COL_TOTAL, AliOstockhTableMap::COL_TOT_PV, AliOstockhTableMap::COL_ID, AliOstockhTableMap::COL_SA_TYPE, AliOstockhTableMap::COL_SA_MTYPE, AliOstockhTableMap::COL_UID, AliOstockhTableMap::COL_UID_REF, AliOstockhTableMap::COL_CANCEL, AliOstockhTableMap::COL_TXTOPTION, AliOstockhTableMap::COL_SENDER, AliOstockhTableMap::COL_SENDER_DATE, AliOstockhTableMap::COL_RECEIVE, AliOstockhTableMap::COL_RECEIVE_DATE, AliOstockhTableMap::COL_UID_RECEIVE, AliOstockhTableMap::COL_STATUS, AliOstockhTableMap::COL_PRINT, AliOstockhTableMap::COL_RCCODE, AliOstockhTableMap::COL_UPDATE_DATE, AliOstockhTableMap::COL_MAPPING_CODE, AliOstockhTableMap::COL_RRCODE, AliOstockhTableMap::COL_AUTO, ),
        self::TYPE_FIELDNAME     => array('sano', 'sano1', 'sadate', 'sctime', 'inv_code', 'inv_coden', 'inv_ref', 'inv_refn', 'total', 'tot_pv', 'id', 'sa_type', 'sa_mtype', 'uid', 'uid_ref', 'cancel', 'txtoption', 'sender', 'sender_date', 'receive', 'receive_date', 'uid_receive', 'status', 'print', 'rccode', 'update_date', 'mapping_code', 'rrcode', 'auto', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sano1' => 1, 'Sadate' => 2, 'Sctime' => 3, 'InvCode' => 4, 'InvCoden' => 5, 'InvRef' => 6, 'InvRefn' => 7, 'Total' => 8, 'TotPv' => 9, 'Id' => 10, 'SaType' => 11, 'SaMtype' => 12, 'Uid' => 13, 'UidRef' => 14, 'Cancel' => 15, 'Txtoption' => 16, 'Sender' => 17, 'SenderDate' => 18, 'Receive' => 19, 'ReceiveDate' => 20, 'UidReceive' => 21, 'Status' => 22, 'Print' => 23, 'Rccode' => 24, 'UpdateDate' => 25, 'MappingCode' => 26, 'Rrcode' => 27, 'Auto' => 28, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'sctime' => 3, 'invCode' => 4, 'invCoden' => 5, 'invRef' => 6, 'invRefn' => 7, 'total' => 8, 'totPv' => 9, 'id' => 10, 'saType' => 11, 'saMtype' => 12, 'uid' => 13, 'uidRef' => 14, 'cancel' => 15, 'txtoption' => 16, 'sender' => 17, 'senderDate' => 18, 'receive' => 19, 'receiveDate' => 20, 'uidReceive' => 21, 'status' => 22, 'print' => 23, 'rccode' => 24, 'updateDate' => 25, 'mappingCode' => 26, 'rrcode' => 27, 'auto' => 28, ),
        self::TYPE_COLNAME       => array(AliOstockhTableMap::COL_SANO => 0, AliOstockhTableMap::COL_SANO1 => 1, AliOstockhTableMap::COL_SADATE => 2, AliOstockhTableMap::COL_SCTIME => 3, AliOstockhTableMap::COL_INV_CODE => 4, AliOstockhTableMap::COL_INV_CODEN => 5, AliOstockhTableMap::COL_INV_REF => 6, AliOstockhTableMap::COL_INV_REFN => 7, AliOstockhTableMap::COL_TOTAL => 8, AliOstockhTableMap::COL_TOT_PV => 9, AliOstockhTableMap::COL_ID => 10, AliOstockhTableMap::COL_SA_TYPE => 11, AliOstockhTableMap::COL_SA_MTYPE => 12, AliOstockhTableMap::COL_UID => 13, AliOstockhTableMap::COL_UID_REF => 14, AliOstockhTableMap::COL_CANCEL => 15, AliOstockhTableMap::COL_TXTOPTION => 16, AliOstockhTableMap::COL_SENDER => 17, AliOstockhTableMap::COL_SENDER_DATE => 18, AliOstockhTableMap::COL_RECEIVE => 19, AliOstockhTableMap::COL_RECEIVE_DATE => 20, AliOstockhTableMap::COL_UID_RECEIVE => 21, AliOstockhTableMap::COL_STATUS => 22, AliOstockhTableMap::COL_PRINT => 23, AliOstockhTableMap::COL_RCCODE => 24, AliOstockhTableMap::COL_UPDATE_DATE => 25, AliOstockhTableMap::COL_MAPPING_CODE => 26, AliOstockhTableMap::COL_RRCODE => 27, AliOstockhTableMap::COL_AUTO => 28, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'sctime' => 3, 'inv_code' => 4, 'inv_coden' => 5, 'inv_ref' => 6, 'inv_refn' => 7, 'total' => 8, 'tot_pv' => 9, 'id' => 10, 'sa_type' => 11, 'sa_mtype' => 12, 'uid' => 13, 'uid_ref' => 14, 'cancel' => 15, 'txtoption' => 16, 'sender' => 17, 'sender_date' => 18, 'receive' => 19, 'receive_date' => 20, 'uid_receive' => 21, 'status' => 22, 'print' => 23, 'rccode' => 24, 'update_date' => 25, 'mapping_code' => 26, 'rrcode' => 27, 'auto' => 28, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
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
        $this->setName('ali_ostockh');
        $this->setPhpName('AliOstockh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliOstockh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('sano1', 'Sano1', 'VARCHAR', true, 255, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
        $this->addColumn('sctime', 'Sctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', false, 255, null);
        $this->addColumn('inv_coden', 'InvCoden', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_refn', 'InvRefn', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, 15, null);
        $this->addColumn('tot_pv', 'TotPv', 'DECIMAL', false, 15, null);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('sa_type', 'SaType', 'CHAR', true, 2, null);
        $this->addColumn('sa_mtype', 'SaMtype', 'VARCHAR', true, 255, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('uid_ref', 'UidRef', 'VARCHAR', true, 255, null);
        $this->addColumn('cancel', 'Cancel', 'INTEGER', true, 2, null);
        $this->addColumn('txtoption', 'Txtoption', 'CLOB', true, null, null);
        $this->addColumn('sender', 'Sender', 'VARCHAR', true, 255, null);
        $this->addColumn('sender_date', 'SenderDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('receive', 'Receive', 'INTEGER', true, 255, null);
        $this->addColumn('receive_date', 'ReceiveDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('uid_receive', 'UidReceive', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, null);
        $this->addColumn('print', 'Print', 'INTEGER', true, null, null);
        $this->addColumn('rccode', 'Rccode', 'VARCHAR', true, 255, null);
        $this->addColumn('update_date', 'UpdateDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('mapping_code', 'MappingCode', 'VARCHAR', true, 255, null);
        $this->addColumn('rrcode', 'Rrcode', 'VARCHAR', true, 255, null);
        $this->addColumn('auto', 'Auto', 'VARCHAR', false, 10, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 10 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 10 + $offset
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
        return $withPrefix ? AliOstockhTableMap::CLASS_DEFAULT : AliOstockhTableMap::OM_CLASS;
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
     * @return array           (AliOstockh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliOstockhTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliOstockhTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliOstockhTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliOstockhTableMap::OM_CLASS;
            /** @var AliOstockh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliOstockhTableMap::addInstanceToPool($obj, $key);
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
            $key = AliOstockhTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliOstockhTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliOstockh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliOstockhTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliOstockhTableMap::COL_SANO);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_SANO1);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_INV_CODEN);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_INV_REFN);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_ID);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_SA_MTYPE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_UID);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_UID_REF);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_UID_RECEIVE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_RCCODE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_UPDATE_DATE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_MAPPING_CODE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_RRCODE);
            $criteria->addSelectColumn(AliOstockhTableMap::COL_AUTO);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sano1');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.sctime');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_coden');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.inv_refn');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.tot_pv');
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sa_type');
            $criteria->addSelectColumn($alias . '.sa_mtype');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.uid_ref');
            $criteria->addSelectColumn($alias . '.cancel');
            $criteria->addSelectColumn($alias . '.txtoption');
            $criteria->addSelectColumn($alias . '.sender');
            $criteria->addSelectColumn($alias . '.sender_date');
            $criteria->addSelectColumn($alias . '.receive');
            $criteria->addSelectColumn($alias . '.receive_date');
            $criteria->addSelectColumn($alias . '.uid_receive');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.print');
            $criteria->addSelectColumn($alias . '.rccode');
            $criteria->addSelectColumn($alias . '.update_date');
            $criteria->addSelectColumn($alias . '.mapping_code');
            $criteria->addSelectColumn($alias . '.rrcode');
            $criteria->addSelectColumn($alias . '.auto');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliOstockhTableMap::DATABASE_NAME)->getTable(AliOstockhTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliOstockhTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliOstockhTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliOstockhTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliOstockh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliOstockh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliOstockhTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliOstockh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliOstockhTableMap::DATABASE_NAME);
            $criteria->add(AliOstockhTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliOstockhQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliOstockhTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliOstockhTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_ostockh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliOstockhQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliOstockh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliOstockh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliOstockhTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliOstockh object
        }

        if ($criteria->containsKey(AliOstockhTableMap::COL_ID) && $criteria->keyContainsValue(AliOstockhTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliOstockhTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliOstockhQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliOstockhTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliOstockhTableMap::buildTableMap();
