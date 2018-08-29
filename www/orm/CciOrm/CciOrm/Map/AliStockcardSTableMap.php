<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliStockcardS;
use CciOrm\CciOrm\AliStockcardSQuery;
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
 * This class defines the structure of the 'ali_stockcard_s' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliStockcardSTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliStockcardSTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_stockcard_s';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliStockcardS';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliStockcardS';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 26;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 26;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_stockcard_s.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_stockcard_s.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_stockcard_s.name_t';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_stockcard_s.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_stockcard_s.inv_ref';

    /**
     * the column name for the inv_action field
     */
    const COL_INV_ACTION = 'ali_stockcard_s.inv_action';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_stockcard_s.sano';

    /**
     * the column name for the sano_ref field
     */
    const COL_SANO_REF = 'ali_stockcard_s.sano_ref';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_stockcard_s.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_stockcard_s.pdesc';

    /**
     * the column name for the in_qty field
     */
    const COL_IN_QTY = 'ali_stockcard_s.in_qty';

    /**
     * the column name for the in_price field
     */
    const COL_IN_PRICE = 'ali_stockcard_s.in_price';

    /**
     * the column name for the in_amount field
     */
    const COL_IN_AMOUNT = 'ali_stockcard_s.in_amount';

    /**
     * the column name for the out_qty field
     */
    const COL_OUT_QTY = 'ali_stockcard_s.out_qty';

    /**
     * the column name for the out_price field
     */
    const COL_OUT_PRICE = 'ali_stockcard_s.out_price';

    /**
     * the column name for the out_amount field
     */
    const COL_OUT_AMOUNT = 'ali_stockcard_s.out_amount';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_stockcard_s.sadate';

    /**
     * the column name for the rdate field
     */
    const COL_RDATE = 'ali_stockcard_s.rdate';

    /**
     * the column name for the rccode field
     */
    const COL_RCCODE = 'ali_stockcard_s.rccode';

    /**
     * the column name for the yokma field
     */
    const COL_YOKMA = 'ali_stockcard_s.yokma';

    /**
     * the column name for the balance field
     */
    const COL_BALANCE = 'ali_stockcard_s.balance';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_stockcard_s.price';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'ali_stockcard_s.amount';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_stockcard_s.uid';

    /**
     * the column name for the action field
     */
    const COL_ACTION = 'ali_stockcard_s.action';

    /**
     * the column name for the cancel field
     */
    const COL_CANCEL = 'ali_stockcard_s.cancel';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'NameT', 'InvCode', 'InvRef', 'InvAction', 'Sano', 'SanoRef', 'Pcode', 'Pdesc', 'InQty', 'InPrice', 'InAmount', 'OutQty', 'OutPrice', 'OutAmount', 'Sadate', 'Rdate', 'Rccode', 'Yokma', 'Balance', 'Price', 'Amount', 'Uid', 'Action', 'Cancel', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'nameT', 'invCode', 'invRef', 'invAction', 'sano', 'sanoRef', 'pcode', 'pdesc', 'inQty', 'inPrice', 'inAmount', 'outQty', 'outPrice', 'outAmount', 'sadate', 'rdate', 'rccode', 'yokma', 'balance', 'price', 'amount', 'uid', 'action', 'cancel', ),
        self::TYPE_COLNAME       => array(AliStockcardSTableMap::COL_ID, AliStockcardSTableMap::COL_MCODE, AliStockcardSTableMap::COL_NAME_T, AliStockcardSTableMap::COL_INV_CODE, AliStockcardSTableMap::COL_INV_REF, AliStockcardSTableMap::COL_INV_ACTION, AliStockcardSTableMap::COL_SANO, AliStockcardSTableMap::COL_SANO_REF, AliStockcardSTableMap::COL_PCODE, AliStockcardSTableMap::COL_PDESC, AliStockcardSTableMap::COL_IN_QTY, AliStockcardSTableMap::COL_IN_PRICE, AliStockcardSTableMap::COL_IN_AMOUNT, AliStockcardSTableMap::COL_OUT_QTY, AliStockcardSTableMap::COL_OUT_PRICE, AliStockcardSTableMap::COL_OUT_AMOUNT, AliStockcardSTableMap::COL_SADATE, AliStockcardSTableMap::COL_RDATE, AliStockcardSTableMap::COL_RCCODE, AliStockcardSTableMap::COL_YOKMA, AliStockcardSTableMap::COL_BALANCE, AliStockcardSTableMap::COL_PRICE, AliStockcardSTableMap::COL_AMOUNT, AliStockcardSTableMap::COL_UID, AliStockcardSTableMap::COL_ACTION, AliStockcardSTableMap::COL_CANCEL, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'name_t', 'inv_code', 'inv_ref', 'inv_action', 'sano', 'sano_ref', 'pcode', 'pdesc', 'in_qty', 'in_price', 'in_amount', 'out_qty', 'out_price', 'out_amount', 'sadate', 'rdate', 'rccode', 'yokma', 'balance', 'price', 'amount', 'uid', 'action', 'cancel', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'NameT' => 2, 'InvCode' => 3, 'InvRef' => 4, 'InvAction' => 5, 'Sano' => 6, 'SanoRef' => 7, 'Pcode' => 8, 'Pdesc' => 9, 'InQty' => 10, 'InPrice' => 11, 'InAmount' => 12, 'OutQty' => 13, 'OutPrice' => 14, 'OutAmount' => 15, 'Sadate' => 16, 'Rdate' => 17, 'Rccode' => 18, 'Yokma' => 19, 'Balance' => 20, 'Price' => 21, 'Amount' => 22, 'Uid' => 23, 'Action' => 24, 'Cancel' => 25, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'nameT' => 2, 'invCode' => 3, 'invRef' => 4, 'invAction' => 5, 'sano' => 6, 'sanoRef' => 7, 'pcode' => 8, 'pdesc' => 9, 'inQty' => 10, 'inPrice' => 11, 'inAmount' => 12, 'outQty' => 13, 'outPrice' => 14, 'outAmount' => 15, 'sadate' => 16, 'rdate' => 17, 'rccode' => 18, 'yokma' => 19, 'balance' => 20, 'price' => 21, 'amount' => 22, 'uid' => 23, 'action' => 24, 'cancel' => 25, ),
        self::TYPE_COLNAME       => array(AliStockcardSTableMap::COL_ID => 0, AliStockcardSTableMap::COL_MCODE => 1, AliStockcardSTableMap::COL_NAME_T => 2, AliStockcardSTableMap::COL_INV_CODE => 3, AliStockcardSTableMap::COL_INV_REF => 4, AliStockcardSTableMap::COL_INV_ACTION => 5, AliStockcardSTableMap::COL_SANO => 6, AliStockcardSTableMap::COL_SANO_REF => 7, AliStockcardSTableMap::COL_PCODE => 8, AliStockcardSTableMap::COL_PDESC => 9, AliStockcardSTableMap::COL_IN_QTY => 10, AliStockcardSTableMap::COL_IN_PRICE => 11, AliStockcardSTableMap::COL_IN_AMOUNT => 12, AliStockcardSTableMap::COL_OUT_QTY => 13, AliStockcardSTableMap::COL_OUT_PRICE => 14, AliStockcardSTableMap::COL_OUT_AMOUNT => 15, AliStockcardSTableMap::COL_SADATE => 16, AliStockcardSTableMap::COL_RDATE => 17, AliStockcardSTableMap::COL_RCCODE => 18, AliStockcardSTableMap::COL_YOKMA => 19, AliStockcardSTableMap::COL_BALANCE => 20, AliStockcardSTableMap::COL_PRICE => 21, AliStockcardSTableMap::COL_AMOUNT => 22, AliStockcardSTableMap::COL_UID => 23, AliStockcardSTableMap::COL_ACTION => 24, AliStockcardSTableMap::COL_CANCEL => 25, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'name_t' => 2, 'inv_code' => 3, 'inv_ref' => 4, 'inv_action' => 5, 'sano' => 6, 'sano_ref' => 7, 'pcode' => 8, 'pdesc' => 9, 'in_qty' => 10, 'in_price' => 11, 'in_amount' => 12, 'out_qty' => 13, 'out_price' => 14, 'out_amount' => 15, 'sadate' => 16, 'rdate' => 17, 'rccode' => 18, 'yokma' => 19, 'balance' => 20, 'price' => 21, 'amount' => 22, 'uid' => 23, 'action' => 24, 'cancel' => 25, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
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
        $this->setName('ali_stockcard_s');
        $this->setPhpName('AliStockcardS');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliStockcardS');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_action', 'InvAction', 'VARCHAR', true, 255, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 255, null);
        $this->addColumn('sano_ref', 'SanoRef', 'VARCHAR', true, 255, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', true, 255, null);
        $this->addColumn('in_qty', 'InQty', 'INTEGER', true, null, null);
        $this->addColumn('in_price', 'InPrice', 'DECIMAL', true, 15, null);
        $this->addColumn('in_amount', 'InAmount', 'DECIMAL', true, 15, null);
        $this->addColumn('out_qty', 'OutQty', 'INTEGER', true, null, null);
        $this->addColumn('out_price', 'OutPrice', 'DECIMAL', true, 15, null);
        $this->addColumn('out_amount', 'OutAmount', 'DECIMAL', true, 15, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', true, null, null);
        $this->addColumn('rdate', 'Rdate', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('rccode', 'Rccode', 'VARCHAR', true, 255, null);
        $this->addColumn('yokma', 'Yokma', 'INTEGER', true, null, null);
        $this->addColumn('balance', 'Balance', 'INTEGER', true, null, null);
        $this->addColumn('price', 'Price', 'DECIMAL', true, 15, null);
        $this->addColumn('amount', 'Amount', 'DECIMAL', true, 15, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('action', 'Action', 'VARCHAR', true, 255, null);
        $this->addColumn('cancel', 'Cancel', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliStockcardSTableMap::CLASS_DEFAULT : AliStockcardSTableMap::OM_CLASS;
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
     * @return array           (AliStockcardS object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliStockcardSTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliStockcardSTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliStockcardSTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliStockcardSTableMap::OM_CLASS;
            /** @var AliStockcardS $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliStockcardSTableMap::addInstanceToPool($obj, $key);
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
            $key = AliStockcardSTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliStockcardSTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliStockcardS $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliStockcardSTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_ID);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_INV_ACTION);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_SANO);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_SANO_REF);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_PDESC);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_IN_QTY);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_IN_PRICE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_IN_AMOUNT);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_OUT_QTY);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_OUT_PRICE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_OUT_AMOUNT);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_RDATE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_RCCODE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_YOKMA);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_BALANCE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_PRICE);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_UID);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_ACTION);
            $criteria->addSelectColumn(AliStockcardSTableMap::COL_CANCEL);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.inv_action');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sano_ref');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.in_qty');
            $criteria->addSelectColumn($alias . '.in_price');
            $criteria->addSelectColumn($alias . '.in_amount');
            $criteria->addSelectColumn($alias . '.out_qty');
            $criteria->addSelectColumn($alias . '.out_price');
            $criteria->addSelectColumn($alias . '.out_amount');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.rdate');
            $criteria->addSelectColumn($alias . '.rccode');
            $criteria->addSelectColumn($alias . '.yokma');
            $criteria->addSelectColumn($alias . '.balance');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.action');
            $criteria->addSelectColumn($alias . '.cancel');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliStockcardSTableMap::DATABASE_NAME)->getTable(AliStockcardSTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliStockcardSTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliStockcardSTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliStockcardSTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliStockcardS or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliStockcardS object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardSTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliStockcardS) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliStockcardSTableMap::DATABASE_NAME);
            $criteria->add(AliStockcardSTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliStockcardSQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliStockcardSTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliStockcardSTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_stockcard_s table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliStockcardSQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliStockcardS or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliStockcardS object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardSTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliStockcardS object
        }

        if ($criteria->containsKey(AliStockcardSTableMap::COL_ID) && $criteria->keyContainsValue(AliStockcardSTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliStockcardSTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliStockcardSQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliStockcardSTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliStockcardSTableMap::buildTableMap();