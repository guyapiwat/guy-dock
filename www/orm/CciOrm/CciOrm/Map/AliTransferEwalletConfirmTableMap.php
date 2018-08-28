<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTransferEwalletConfirm;
use CciOrm\CciOrm\AliTransferEwalletConfirmQuery;
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
 * This class defines the structure of the 'ali_transfer_ewallet_confirm' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTransferEwalletConfirmTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTransferEwalletConfirmTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_transfer_ewallet_confirm';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTransferEwalletConfirm';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTransferEwalletConfirm';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_transfer_ewallet_confirm.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_transfer_ewallet_confirm.mcode';

    /**
     * the column name for the pay_type field
     */
    const COL_PAY_TYPE = 'ali_transfer_ewallet_confirm.pay_type';

    /**
     * the column name for the sadate field
     */
    const COL_SADATE = 'ali_transfer_ewallet_confirm.sadate';

    /**
     * the column name for the sctime field
     */
    const COL_SCTIME = 'ali_transfer_ewallet_confirm.sctime';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_transfer_ewallet_confirm.total';

    /**
     * the column name for the img_pay field
     */
    const COL_IMG_PAY = 'ali_transfer_ewallet_confirm.img_pay';

    /**
     * the column name for the approved_uid field
     */
    const COL_APPROVED_UID = 'ali_transfer_ewallet_confirm.approved_uid';

    /**
     * the column name for the approved_sctime field
     */
    const COL_APPROVED_SCTIME = 'ali_transfer_ewallet_confirm.approved_sctime';

    /**
     * the column name for the approved_status field
     */
    const COL_APPROVED_STATUS = 'ali_transfer_ewallet_confirm.approved_status';

    /**
     * the column name for the cancel_uid field
     */
    const COL_CANCEL_UID = 'ali_transfer_ewallet_confirm.cancel_uid';

    /**
     * the column name for the cancel_sctime field
     */
    const COL_CANCEL_SCTIME = 'ali_transfer_ewallet_confirm.cancel_sctime';

    /**
     * the column name for the cancel_status field
     */
    const COL_CANCEL_STATUS = 'ali_transfer_ewallet_confirm.cancel_status';

    /**
     * the column name for the last_sctime field
     */
    const COL_LAST_SCTIME = 'ali_transfer_ewallet_confirm.last_sctime';

    /**
     * the column name for the sano_ref field
     */
    const COL_SANO_REF = 'ali_transfer_ewallet_confirm.sano_ref';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'PayType', 'Sadate', 'Sctime', 'Total', 'ImgPay', 'ApprovedUid', 'ApprovedSctime', 'ApprovedStatus', 'CancelUid', 'CancelSctime', 'CancelStatus', 'LastSctime', 'SanoRef', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'payType', 'sadate', 'sctime', 'total', 'imgPay', 'approvedUid', 'approvedSctime', 'approvedStatus', 'cancelUid', 'cancelSctime', 'cancelStatus', 'lastSctime', 'sanoRef', ),
        self::TYPE_COLNAME       => array(AliTransferEwalletConfirmTableMap::COL_ID, AliTransferEwalletConfirmTableMap::COL_MCODE, AliTransferEwalletConfirmTableMap::COL_PAY_TYPE, AliTransferEwalletConfirmTableMap::COL_SADATE, AliTransferEwalletConfirmTableMap::COL_SCTIME, AliTransferEwalletConfirmTableMap::COL_TOTAL, AliTransferEwalletConfirmTableMap::COL_IMG_PAY, AliTransferEwalletConfirmTableMap::COL_APPROVED_UID, AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME, AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS, AliTransferEwalletConfirmTableMap::COL_CANCEL_UID, AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME, AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS, AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME, AliTransferEwalletConfirmTableMap::COL_SANO_REF, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'pay_type', 'sadate', 'sctime', 'total', 'img_pay', 'approved_uid', 'approved_sctime', 'approved_status', 'cancel_uid', 'cancel_sctime', 'cancel_status', 'last_sctime', 'sano_ref', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'PayType' => 2, 'Sadate' => 3, 'Sctime' => 4, 'Total' => 5, 'ImgPay' => 6, 'ApprovedUid' => 7, 'ApprovedSctime' => 8, 'ApprovedStatus' => 9, 'CancelUid' => 10, 'CancelSctime' => 11, 'CancelStatus' => 12, 'LastSctime' => 13, 'SanoRef' => 14, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'payType' => 2, 'sadate' => 3, 'sctime' => 4, 'total' => 5, 'imgPay' => 6, 'approvedUid' => 7, 'approvedSctime' => 8, 'approvedStatus' => 9, 'cancelUid' => 10, 'cancelSctime' => 11, 'cancelStatus' => 12, 'lastSctime' => 13, 'sanoRef' => 14, ),
        self::TYPE_COLNAME       => array(AliTransferEwalletConfirmTableMap::COL_ID => 0, AliTransferEwalletConfirmTableMap::COL_MCODE => 1, AliTransferEwalletConfirmTableMap::COL_PAY_TYPE => 2, AliTransferEwalletConfirmTableMap::COL_SADATE => 3, AliTransferEwalletConfirmTableMap::COL_SCTIME => 4, AliTransferEwalletConfirmTableMap::COL_TOTAL => 5, AliTransferEwalletConfirmTableMap::COL_IMG_PAY => 6, AliTransferEwalletConfirmTableMap::COL_APPROVED_UID => 7, AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME => 8, AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS => 9, AliTransferEwalletConfirmTableMap::COL_CANCEL_UID => 10, AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME => 11, AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS => 12, AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME => 13, AliTransferEwalletConfirmTableMap::COL_SANO_REF => 14, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'pay_type' => 2, 'sadate' => 3, 'sctime' => 4, 'total' => 5, 'img_pay' => 6, 'approved_uid' => 7, 'approved_sctime' => 8, 'approved_status' => 9, 'cancel_uid' => 10, 'cancel_sctime' => 11, 'cancel_status' => 12, 'last_sctime' => 13, 'sano_ref' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('ali_transfer_ewallet_confirm');
        $this->setPhpName('AliTransferEwalletConfirm');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTransferEwalletConfirm');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('pay_type', 'PayType', 'VARCHAR', true, 255, null);
        $this->addColumn('sadate', 'Sadate', 'DATE', true, null, null);
        $this->addColumn('sctime', 'Sctime', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('img_pay', 'ImgPay', 'LONGVARCHAR', true, null, null);
        $this->addColumn('approved_uid', 'ApprovedUid', 'VARCHAR', true, 255, null);
        $this->addColumn('approved_sctime', 'ApprovedSctime', 'TIMESTAMP', true, null, null);
        $this->addColumn('approved_status', 'ApprovedStatus', 'INTEGER', true, 2, null);
        $this->addColumn('cancel_uid', 'CancelUid', 'VARCHAR', true, 255, null);
        $this->addColumn('cancel_sctime', 'CancelSctime', 'TIMESTAMP', true, null, null);
        $this->addColumn('cancel_status', 'CancelStatus', 'INTEGER', true, 2, null);
        $this->addColumn('last_sctime', 'LastSctime', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('sano_ref', 'SanoRef', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AliTransferEwalletConfirmTableMap::CLASS_DEFAULT : AliTransferEwalletConfirmTableMap::OM_CLASS;
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
     * @return array           (AliTransferEwalletConfirm object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTransferEwalletConfirmTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTransferEwalletConfirmTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTransferEwalletConfirmTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTransferEwalletConfirmTableMap::OM_CLASS;
            /** @var AliTransferEwalletConfirm $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTransferEwalletConfirmTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTransferEwalletConfirmTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTransferEwalletConfirmTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTransferEwalletConfirm $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTransferEwalletConfirmTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_ID);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_PAY_TYPE);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_SADATE);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_SCTIME);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_IMG_PAY);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_APPROVED_UID);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_CANCEL_UID);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME);
            $criteria->addSelectColumn(AliTransferEwalletConfirmTableMap::COL_SANO_REF);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.pay_type');
            $criteria->addSelectColumn($alias . '.sadate');
            $criteria->addSelectColumn($alias . '.sctime');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.img_pay');
            $criteria->addSelectColumn($alias . '.approved_uid');
            $criteria->addSelectColumn($alias . '.approved_sctime');
            $criteria->addSelectColumn($alias . '.approved_status');
            $criteria->addSelectColumn($alias . '.cancel_uid');
            $criteria->addSelectColumn($alias . '.cancel_sctime');
            $criteria->addSelectColumn($alias . '.cancel_status');
            $criteria->addSelectColumn($alias . '.last_sctime');
            $criteria->addSelectColumn($alias . '.sano_ref');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTransferEwalletConfirmTableMap::DATABASE_NAME)->getTable(AliTransferEwalletConfirmTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTransferEwalletConfirmTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTransferEwalletConfirmTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTransferEwalletConfirm or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTransferEwalletConfirm object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTransferEwalletConfirm) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
            $criteria->add(AliTransferEwalletConfirmTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliTransferEwalletConfirmQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTransferEwalletConfirmTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTransferEwalletConfirmTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_transfer_ewallet_confirm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTransferEwalletConfirmQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTransferEwalletConfirm or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTransferEwalletConfirm object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTransferEwalletConfirm object
        }

        if ($criteria->containsKey(AliTransferEwalletConfirmTableMap::COL_ID) && $criteria->keyContainsValue(AliTransferEwalletConfirmTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTransferEwalletConfirmTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliTransferEwalletConfirmQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTransferEwalletConfirmTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTransferEwalletConfirmTableMap::buildTableMap();
