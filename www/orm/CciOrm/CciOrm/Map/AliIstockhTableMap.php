<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliIstockh;
use CciOrm\CciOrm\AliIstockhQuery;
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
 * This class defines the structure of the 'ali_istockh' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliIstockhTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliIstockhTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_istockh';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliIstockh';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliIstockh';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 27;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 27;

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_istockh.sano';

    /**
     * the column name for the sano1 field
     */
    const COL_SANO1 = 'ali_istockh.sano1';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_istockh.sadate';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_istockh.inv_code';

    /**
     * the column name for the inv_coden field
     */
    const COL_INV_CODEN = 'ali_istockh.inv_coden';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_istockh.inv_ref';

    /**
     * the column name for the inv_refn field
     */
    const COL_INV_REFN = 'ali_istockh.inv_refn';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_istockh.total';

    /**
     * the column name for the tot_pv field
     */
    const COL_TOT_PV = 'ali_istockh.tot_pv';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_istockh.id';

    /**
     * the column name for the sa_type field
     */
    const COL_SA_TYPE = 'ali_istockh.sa_type';

    /**
     * the column name for the sa_mtype field
     */
    const COL_SA_MTYPE = 'ali_istockh.sa_mtype';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_istockh.uid';

    /**
     * the column name for the uid_ref field
     */
    const COL_UID_REF = 'ali_istockh.uid_ref';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_istockh.cancel';

    /**
     * the column name for the txtoption field
     */
    const COL_TXTOPTION = 'ali_istockh.txtoption';

    /**
     * the column name for the sender field
     */
    const COL_SENDER = 'ali_istockh.sender';

    /**
     * the column name for the sender_date field
     */
    const COL_SENDER_DATE = 'ali_istockh.sender_date';

    /**
     * the column name for the receive field
     */
    const COL_RECEIVE = 'ali_istockh.receive';

    /**
     * the column name for the receive_date field
     */
    const COL_RECEIVE_DATE = 'ali_istockh.receive_date';

    /**
     * the column name for the uid_receive field
     */
    const COL_UID_RECEIVE = 'ali_istockh.uid_receive';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'ali_istockh.status';

    /**
     * the column name for the print field
     */
    const COL_PRINT = 'ali_istockh.print';

    /**
     * the column name for the rccode field
     */
    const COL_RCCODE = 'ali_istockh.rccode';

    /**
     * the column name for the update_date field
     */
    const COL_UPDATE_DATE = 'ali_istockh.update_date';

    /**
     * the column name for the mapping_code field
     */
    const COL_MAPPING_CODE = 'ali_istockh.mapping_code';

    /**
     * the column name for the rrcode field
     */
    const COL_RRCODE = 'ali_istockh.rrcode';

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
        self::TYPE_PHPNAME       => array('Sano', 'Sano1', 'Sadate', 'InvCode', 'InvCoden', 'InvRef', 'InvRefn', 'Total', 'TotPv', 'Id', 'SaType', 'SaMtype', 'Uid', 'UidRef', 'Cancel', 'Txtoption', 'Sender', 'SenderDate', 'Receive', 'ReceiveDate', 'UidReceive', 'Status', 'Print', 'Rccode', 'UpdateDate', 'MappingCode', 'Rrcode', ),
        self::TYPE_CAMELNAME     => array('sano', 'sano1', 'sadate', 'invCode', 'invCoden', 'invRef', 'invRefn', 'total', 'totPv', 'id', 'saType', 'saMtype', 'uid', 'uidRef', 'cancel', 'txtoption', 'sender', 'senderDate', 'receive', 'receiveDate', 'uidReceive', 'status', 'print', 'rccode', 'updateDate', 'mappingCode', 'rrcode', ),
        self::TYPE_COLNAME       => array(AliIstockhTableMap::COL_SANO, AliIstockhTableMap::COL_SANO1, AliIstockhTableMap::COL_SADATE, AliIstockhTableMap::COL_INV_CODE, AliIstockhTableMap::COL_INV_CODEN, AliIstockhTableMap::COL_INV_REF, AliIstockhTableMap::COL_INV_REFN, AliIstockhTableMap::COL_TOTAL, AliIstockhTableMap::COL_TOT_PV, AliIstockhTableMap::COL_ID, AliIstockhTableMap::COL_SA_TYPE, AliIstockhTableMap::COL_SA_MTYPE, AliIstockhTableMap::COL_UID, AliIstockhTableMap::COL_UID_REF, AliIstockhTableMap::COL_CANCEL, AliIstockhTableMap::COL_TXTOPTION, AliIstockhTableMap::COL_SENDER, AliIstockhTableMap::COL_SENDER_DATE, AliIstockhTableMap::COL_RECEIVE, AliIstockhTableMap::COL_RECEIVE_DATE, AliIstockhTableMap::COL_UID_RECEIVE, AliIstockhTableMap::COL_STATUS, AliIstockhTableMap::COL_PRINT, AliIstockhTableMap::COL_RCCODE, AliIstockhTableMap::COL_UPDATE_DATE, AliIstockhTableMap::COL_MAPPING_CODE, AliIstockhTableMap::COL_RRCODE, ),
        self::TYPE_FIELDNAME     => array('sano', 'sano1', 'sadate', 'inv_code', 'inv_coden', 'inv_ref', 'inv_refn', 'total', 'tot_pv', 'id', 'sa_type', 'sa_mtype', 'uid', 'uid_ref', 'cancel', 'txtoption', 'sender', 'sender_date', 'receive', 'receive_date', 'uid_receive', 'status', 'print', 'rccode', 'update_date', 'mapping_code', 'rrcode', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sano' => 0, 'Sano1' => 1, 'Sadate' => 2, 'InvCode' => 3, 'InvCoden' => 4, 'InvRef' => 5, 'InvRefn' => 6, 'Total' => 7, 'TotPv' => 8, 'Id' => 9, 'SaType' => 10, 'SaMtype' => 11, 'Uid' => 12, 'UidRef' => 13, 'Cancel' => 14, 'Txtoption' => 15, 'Sender' => 16, 'SenderDate' => 17, 'Receive' => 18, 'ReceiveDate' => 19, 'UidReceive' => 20, 'Status' => 21, 'Print' => 22, 'Rccode' => 23, 'UpdateDate' => 24, 'MappingCode' => 25, 'Rrcode' => 26, ),
        self::TYPE_CAMELNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'invCode' => 3, 'invCoden' => 4, 'invRef' => 5, 'invRefn' => 6, 'total' => 7, 'totPv' => 8, 'id' => 9, 'saType' => 10, 'saMtype' => 11, 'uid' => 12, 'uidRef' => 13, 'cancel' => 14, 'txtoption' => 15, 'sender' => 16, 'senderDate' => 17, 'receive' => 18, 'receiveDate' => 19, 'uidReceive' => 20, 'status' => 21, 'print' => 22, 'rccode' => 23, 'updateDate' => 24, 'mappingCode' => 25, 'rrcode' => 26, ),
        self::TYPE_COLNAME       => array(AliIstockhTableMap::COL_SANO => 0, AliIstockhTableMap::COL_SANO1 => 1, AliIstockhTableMap::COL_SADATE => 2, AliIstockhTableMap::COL_INV_CODE => 3, AliIstockhTableMap::COL_INV_CODEN => 4, AliIstockhTableMap::COL_INV_REF => 5, AliIstockhTableMap::COL_INV_REFN => 6, AliIstockhTableMap::COL_TOTAL => 7, AliIstockhTableMap::COL_TOT_PV => 8, AliIstockhTableMap::COL_ID => 9, AliIstockhTableMap::COL_SA_TYPE => 10, AliIstockhTableMap::COL_SA_MTYPE => 11, AliIstockhTableMap::COL_UID => 12, AliIstockhTableMap::COL_UID_REF => 13, AliIstockhTableMap::COL_CANCEL => 14, AliIstockhTableMap::COL_TXTOPTION => 15, AliIstockhTableMap::COL_SENDER => 16, AliIstockhTableMap::COL_SENDER_DATE => 17, AliIstockhTableMap::COL_RECEIVE => 18, AliIstockhTableMap::COL_RECEIVE_DATE => 19, AliIstockhTableMap::COL_UID_RECEIVE => 20, AliIstockhTableMap::COL_STATUS => 21, AliIstockhTableMap::COL_PRINT => 22, AliIstockhTableMap::COL_RCCODE => 23, AliIstockhTableMap::COL_UPDATE_DATE => 24, AliIstockhTableMap::COL_MAPPING_CODE => 25, AliIstockhTableMap::COL_RRCODE => 26, ),
        self::TYPE_FIELDNAME     => array('sano' => 0, 'sano1' => 1, 'sadate' => 2, 'inv_code' => 3, 'inv_coden' => 4, 'inv_ref' => 5, 'inv_refn' => 6, 'total' => 7, 'tot_pv' => 8, 'id' => 9, 'sa_type' => 10, 'sa_mtype' => 11, 'uid' => 12, 'uid_ref' => 13, 'cancel' => 14, 'txtoption' => 15, 'sender' => 16, 'sender_date' => 17, 'receive' => 18, 'receive_date' => 19, 'uid_receive' => 20, 'status' => 21, 'print' => 22, 'rccode' => 23, 'update_date' => 24, 'mapping_code' => 25, 'rrcode' => 26, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
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
        $this->setName('ali_istockh');
        $this->setPhpName('AliIstockh');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliIstockh');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('sano', 'Sano', 'VARCHAR', false, 255, null);
        $this->addColumn('sano1', 'Sano1', 'VARCHAR', true, 255, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', false, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 9 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 9 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 9 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 9 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 9 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 9 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 9 + $offset
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
        return $withPrefix ? AliIstockhTableMap::CLASS_DEFAULT : AliIstockhTableMap::OM_CLASS;
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
     * @return array           (AliIstockh object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliIstockhTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliIstockhTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliIstockhTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliIstockhTableMap::OM_CLASS;
            /** @var AliIstockh $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliIstockhTableMap::addInstanceToPool($obj, $key);
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
            $key = AliIstockhTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliIstockhTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliIstockh $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliIstockhTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliIstockhTableMap::COL_SANO);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_SANO1);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_INV_CODEN);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_INV_REFN);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_TOT_PV);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_ID);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_SA_TYPE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_SA_MTYPE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_UID);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_UID_REF);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_CANCEL);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_TXTOPTION);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_SENDER);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_SENDER_DATE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_RECEIVE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_RECEIVE_DATE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_UID_RECEIVE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_STATUS);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_PRINT);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_RCCODE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_UPDATE_DATE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_MAPPING_CODE);
            $criteria->addSelectColumn(AliIstockhTableMap::COL_RRCODE);
        } else {
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sano1');
            $criteria->addSelectColumn($alias . '.sadate');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliIstockhTableMap::DATABASE_NAME)->getTable(AliIstockhTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliIstockhTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliIstockhTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliIstockhTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliIstockh or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliIstockh object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliIstockhTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliIstockh) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliIstockhTableMap::DATABASE_NAME);
            $criteria->add(AliIstockhTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliIstockhQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliIstockhTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliIstockhTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_istockh table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliIstockhQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliIstockh or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliIstockh object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliIstockhTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliIstockh object
        }

        if ($criteria->containsKey(AliIstockhTableMap::COL_ID) && $criteria->keyContainsValue(AliIstockhTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliIstockhTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliIstockhQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliIstockhTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliIstockhTableMap::buildTableMap();
