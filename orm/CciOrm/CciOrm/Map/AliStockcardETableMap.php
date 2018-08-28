<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliStockcardE;
use CciOrm\CciOrm\AliStockcardEQuery;
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
 * This class defines the structure of the 'ali_stockcard_e' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliStockcardETableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliStockcardETableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_stockcard_e';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliStockcardE';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliStockcardE';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_stockcard_e.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_stockcard_e.mcode';

    /**
     * the column name for the inv_code field
     */
    const COL_INV_CODE = 'ali_stockcard_e.inv_code';

    /**
     * the column name for the inv_ref field
     */
    const COL_INV_REF = 'ali_stockcard_e.inv_ref';

    /**
     * the column name for the inv_action field
     */
    const COL_INV_ACTION = 'ali_stockcard_e.inv_action';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_stockcard_e.sano';

    /**
     * the column name for the sano_ref field
     */
    const COL_SANO_REF = 'ali_stockcard_e.sano_ref';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_stockcard_e.pcode';

    /**
     * the column name for the pdesc field
     */
    const COL_PDESC = 'ali_stockcard_e.pdesc';

    /**
     * the column name for the in_amount field
     */
    const COL_IN_AMOUNT = 'ali_stockcard_e.in_amount';

    /**
     * the column name for the out_amount field
     */
    const COL_OUT_AMOUNT = 'ali_stockcard_e.out_amount';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_stockcard_e.sadate';

    /**
     * the column name for the rdate field
     */
    const COL_RDATE = 'ali_stockcard_e.rdate';

    /**
     * the column name for the rccode field
     */
    const COL_RCCODE = 'ali_stockcard_e.rccode';

    /**
     * the column name for the yokma field
     */
    const COL_YOKMA = 'ali_stockcard_e.yokma';

    /**
     * the column name for the balance field
     */
    const COL_BALANCE = 'ali_stockcard_e.balance';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'ali_stockcard_e.price';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'ali_stockcard_e.amount';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_stockcard_e.uid';

    /**
     * the column name for the action field
     */
    const COL_ACTION = 'ali_stockcard_e.action';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'InvCode', 'InvRef', 'InvAction', 'Sano', 'SanoRef', 'Pcode', 'Pdesc', 'InAmount', 'OutAmount', 'Sadate', 'Rdate', 'Rccode', 'Yokma', 'Balance', 'Price', 'Amount', 'Uid', 'Action', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'invCode', 'invRef', 'invAction', 'sano', 'sanoRef', 'pcode', 'pdesc', 'inAmount', 'outAmount', 'sadate', 'rdate', 'rccode', 'yokma', 'balance', 'price', 'amount', 'uid', 'action', ),
        self::TYPE_COLNAME       => array(AliStockcardETableMap::COL_ID, AliStockcardETableMap::COL_MCODE, AliStockcardETableMap::COL_INV_CODE, AliStockcardETableMap::COL_INV_REF, AliStockcardETableMap::COL_INV_ACTION, AliStockcardETableMap::COL_SANO, AliStockcardETableMap::COL_SANO_REF, AliStockcardETableMap::COL_PCODE, AliStockcardETableMap::COL_PDESC, AliStockcardETableMap::COL_IN_AMOUNT, AliStockcardETableMap::COL_OUT_AMOUNT, AliStockcardETableMap::COL_SADATE, AliStockcardETableMap::COL_RDATE, AliStockcardETableMap::COL_RCCODE, AliStockcardETableMap::COL_YOKMA, AliStockcardETableMap::COL_BALANCE, AliStockcardETableMap::COL_PRICE, AliStockcardETableMap::COL_AMOUNT, AliStockcardETableMap::COL_UID, AliStockcardETableMap::COL_ACTION, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'inv_code', 'inv_ref', 'inv_action', 'sano', 'sano_ref', 'pcode', 'pdesc', 'in_amount', 'out_amount', 'sadate', 'rdate', 'rccode', 'yokma', 'balance', 'price', 'amount', 'uid', 'action', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'InvCode' => 2, 'InvRef' => 3, 'InvAction' => 4, 'Sano' => 5, 'SanoRef' => 6, 'Pcode' => 7, 'Pdesc' => 8, 'InAmount' => 9, 'OutAmount' => 10, 'Sadate' => 11, 'Rdate' => 12, 'Rccode' => 13, 'Yokma' => 14, 'Balance' => 15, 'Price' => 16, 'Amount' => 17, 'Uid' => 18, 'Action' => 19, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'invCode' => 2, 'invRef' => 3, 'invAction' => 4, 'sano' => 5, 'sanoRef' => 6, 'pcode' => 7, 'pdesc' => 8, 'inAmount' => 9, 'outAmount' => 10, 'sadate' => 11, 'rdate' => 12, 'rccode' => 13, 'yokma' => 14, 'balance' => 15, 'price' => 16, 'amount' => 17, 'uid' => 18, 'action' => 19, ),
        self::TYPE_COLNAME       => array(AliStockcardETableMap::COL_ID => 0, AliStockcardETableMap::COL_MCODE => 1, AliStockcardETableMap::COL_INV_CODE => 2, AliStockcardETableMap::COL_INV_REF => 3, AliStockcardETableMap::COL_INV_ACTION => 4, AliStockcardETableMap::COL_SANO => 5, AliStockcardETableMap::COL_SANO_REF => 6, AliStockcardETableMap::COL_PCODE => 7, AliStockcardETableMap::COL_PDESC => 8, AliStockcardETableMap::COL_IN_AMOUNT => 9, AliStockcardETableMap::COL_OUT_AMOUNT => 10, AliStockcardETableMap::COL_SADATE => 11, AliStockcardETableMap::COL_RDATE => 12, AliStockcardETableMap::COL_RCCODE => 13, AliStockcardETableMap::COL_YOKMA => 14, AliStockcardETableMap::COL_BALANCE => 15, AliStockcardETableMap::COL_PRICE => 16, AliStockcardETableMap::COL_AMOUNT => 17, AliStockcardETableMap::COL_UID => 18, AliStockcardETableMap::COL_ACTION => 19, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'inv_code' => 2, 'inv_ref' => 3, 'inv_action' => 4, 'sano' => 5, 'sano_ref' => 6, 'pcode' => 7, 'pdesc' => 8, 'in_amount' => 9, 'out_amount' => 10, 'sadate' => 11, 'rdate' => 12, 'rccode' => 13, 'yokma' => 14, 'balance' => 15, 'price' => 16, 'amount' => 17, 'uid' => 18, 'action' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('ali_stockcard_e');
        $this->setPhpName('AliStockcardE');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliStockcardE');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_code', 'InvCode', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_ref', 'InvRef', 'VARCHAR', true, 255, null);
        $this->addColumn('inv_action', 'InvAction', 'VARCHAR', true, 255, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 255, null);
        $this->addColumn('sano_ref', 'SanoRef', 'VARCHAR', true, 255, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('pdesc', 'Pdesc', 'VARCHAR', true, 255, null);
        $this->addColumn('in_amount', 'InAmount', 'DECIMAL', true, 15, null);
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
        return $withPrefix ? AliStockcardETableMap::CLASS_DEFAULT : AliStockcardETableMap::OM_CLASS;
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
     * @return array           (AliStockcardE object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliStockcardETableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliStockcardETableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliStockcardETableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliStockcardETableMap::OM_CLASS;
            /** @var AliStockcardE $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliStockcardETableMap::addInstanceToPool($obj, $key);
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
            $key = AliStockcardETableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliStockcardETableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliStockcardE $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliStockcardETableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliStockcardETableMap::COL_ID);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_MCODE);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_INV_CODE);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_INV_REF);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_INV_ACTION);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_SANO);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_SANO_REF);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_PCODE);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_PDESC);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_IN_AMOUNT);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_OUT_AMOUNT);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_SADATE);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_RDATE);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_RCCODE);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_YOKMA);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_BALANCE);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_PRICE);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_AMOUNT);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_UID);
            $criteria->addSelectColumn(AliStockcardETableMap::COL_ACTION);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.inv_code');
            $criteria->addSelectColumn($alias . '.inv_ref');
            $criteria->addSelectColumn($alias . '.inv_action');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.sano_ref');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.pdesc');
            $criteria->addSelectColumn($alias . '.in_amount');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliStockcardETableMap::DATABASE_NAME)->getTable(AliStockcardETableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliStockcardETableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliStockcardETableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliStockcardETableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliStockcardE or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliStockcardE object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardETableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliStockcardE) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliStockcardETableMap::DATABASE_NAME);
            $criteria->add(AliStockcardETableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliStockcardEQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliStockcardETableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliStockcardETableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_stockcard_e table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliStockcardEQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliStockcardE or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliStockcardE object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStockcardETableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliStockcardE object
        }

        if ($criteria->containsKey(AliStockcardETableMap::COL_ID) && $criteria->keyContainsValue(AliStockcardETableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliStockcardETableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliStockcardEQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliStockcardETableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliStockcardETableMap::buildTableMap();
