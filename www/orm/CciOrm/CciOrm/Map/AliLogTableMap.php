<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliLog;
use CciOrm\CciOrm\AliLogQuery;
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
 * This class defines the structure of the 'ali_log' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliLogTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliLogTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_log';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliLog';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliLog';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_log.id';

    /**
     * the column name for the sys_id field
     */
    const COL_SYS_ID = 'ali_log.sys_id';

    /**
     * the column name for the subject field
     */
    const COL_SUBJECT = 'ali_log.subject';

    /**
     * the column name for the object field
     */
    const COL_OBJECT = 'ali_log.object';

    /**
     * the column name for the detail field
     */
    const COL_DETAIL = 'ali_log.detail';

    /**
     * the column name for the chk_mobile field
     */
    const COL_CHK_MOBILE = 'ali_log.chk_mobile';

    /**
     * the column name for the chk_id_card field
     */
    const COL_CHK_ID_CARD = 'ali_log.chk_id_card';

    /**
     * the column name for the chk_sp_code field
     */
    const COL_CHK_SP_CODE = 'ali_log.chk_sp_code';

    /**
     * the column name for the chk_upa_code field
     */
    const COL_CHK_UPA_CODE = 'ali_log.chk_upa_code';

    /**
     * the column name for the chk_acc_no field
     */
    const COL_CHK_ACC_NO = 'ali_log.chk_acc_no';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'ali_log.ip';

    /**
     * the column name for the logdate field
     */
    const COL_LOGDATE = 'ali_log.logdate';

    /**
     * the column name for the logtime field
     */
    const COL_LOGTIME = 'ali_log.logtime';

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
        self::TYPE_PHPNAME       => array('Id', 'SysId', 'Subject', 'Object', 'Detail', 'ChkMobile', 'ChkIdCard', 'ChkSpCode', 'ChkUpaCode', 'ChkAccNo', 'Ip', 'Logdate', 'Logtime', ),
        self::TYPE_CAMELNAME     => array('id', 'sysId', 'subject', 'object', 'detail', 'chkMobile', 'chkIdCard', 'chkSpCode', 'chkUpaCode', 'chkAccNo', 'ip', 'logdate', 'logtime', ),
        self::TYPE_COLNAME       => array(AliLogTableMap::COL_ID, AliLogTableMap::COL_SYS_ID, AliLogTableMap::COL_SUBJECT, AliLogTableMap::COL_OBJECT, AliLogTableMap::COL_DETAIL, AliLogTableMap::COL_CHK_MOBILE, AliLogTableMap::COL_CHK_ID_CARD, AliLogTableMap::COL_CHK_SP_CODE, AliLogTableMap::COL_CHK_UPA_CODE, AliLogTableMap::COL_CHK_ACC_NO, AliLogTableMap::COL_IP, AliLogTableMap::COL_LOGDATE, AliLogTableMap::COL_LOGTIME, ),
        self::TYPE_FIELDNAME     => array('id', 'sys_id', 'subject', 'object', 'detail', 'chk_mobile', 'chk_id_card', 'chk_sp_code', 'chk_upa_code', 'chk_acc_no', 'ip', 'logdate', 'logtime', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'SysId' => 1, 'Subject' => 2, 'Object' => 3, 'Detail' => 4, 'ChkMobile' => 5, 'ChkIdCard' => 6, 'ChkSpCode' => 7, 'ChkUpaCode' => 8, 'ChkAccNo' => 9, 'Ip' => 10, 'Logdate' => 11, 'Logtime' => 12, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'sysId' => 1, 'subject' => 2, 'object' => 3, 'detail' => 4, 'chkMobile' => 5, 'chkIdCard' => 6, 'chkSpCode' => 7, 'chkUpaCode' => 8, 'chkAccNo' => 9, 'ip' => 10, 'logdate' => 11, 'logtime' => 12, ),
        self::TYPE_COLNAME       => array(AliLogTableMap::COL_ID => 0, AliLogTableMap::COL_SYS_ID => 1, AliLogTableMap::COL_SUBJECT => 2, AliLogTableMap::COL_OBJECT => 3, AliLogTableMap::COL_DETAIL => 4, AliLogTableMap::COL_CHK_MOBILE => 5, AliLogTableMap::COL_CHK_ID_CARD => 6, AliLogTableMap::COL_CHK_SP_CODE => 7, AliLogTableMap::COL_CHK_UPA_CODE => 8, AliLogTableMap::COL_CHK_ACC_NO => 9, AliLogTableMap::COL_IP => 10, AliLogTableMap::COL_LOGDATE => 11, AliLogTableMap::COL_LOGTIME => 12, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sys_id' => 1, 'subject' => 2, 'object' => 3, 'detail' => 4, 'chk_mobile' => 5, 'chk_id_card' => 6, 'chk_sp_code' => 7, 'chk_upa_code' => 8, 'chk_acc_no' => 9, 'ip' => 10, 'logdate' => 11, 'logtime' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('ali_log');
        $this->setPhpName('AliLog');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliLog');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('sys_id', 'SysId', 'VARCHAR', false, 20, null);
        $this->addColumn('subject', 'Subject', 'VARCHAR', false, 255, null);
        $this->addColumn('object', 'Object', 'LONGVARCHAR', false, null, null);
        $this->addColumn('detail', 'Detail', 'LONGVARCHAR', true, null, null);
        $this->addColumn('chk_mobile', 'ChkMobile', 'INTEGER', true, 5, null);
        $this->addColumn('chk_id_card', 'ChkIdCard', 'INTEGER', true, 5, null);
        $this->addColumn('chk_sp_code', 'ChkSpCode', 'INTEGER', true, 5, null);
        $this->addColumn('chk_upa_code', 'ChkUpaCode', 'INTEGER', true, 5, null);
        $this->addColumn('chk_acc_no', 'ChkAccNo', 'INTEGER', true, 5, null);
        $this->addColumn('ip', 'Ip', 'VARCHAR', false, 20, null);
        $this->addColumn('logdate', 'Logdate', 'DATE', false, null, null);
        $this->addColumn('logtime', 'Logtime', 'TIME', false, null, null);
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
        return $withPrefix ? AliLogTableMap::CLASS_DEFAULT : AliLogTableMap::OM_CLASS;
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
     * @return array           (AliLog object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliLogTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliLogTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliLogTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliLogTableMap::OM_CLASS;
            /** @var AliLog $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliLogTableMap::addInstanceToPool($obj, $key);
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
            $key = AliLogTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliLogTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliLog $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliLogTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliLogTableMap::COL_ID);
            $criteria->addSelectColumn(AliLogTableMap::COL_SYS_ID);
            $criteria->addSelectColumn(AliLogTableMap::COL_SUBJECT);
            $criteria->addSelectColumn(AliLogTableMap::COL_OBJECT);
            $criteria->addSelectColumn(AliLogTableMap::COL_DETAIL);
            $criteria->addSelectColumn(AliLogTableMap::COL_CHK_MOBILE);
            $criteria->addSelectColumn(AliLogTableMap::COL_CHK_ID_CARD);
            $criteria->addSelectColumn(AliLogTableMap::COL_CHK_SP_CODE);
            $criteria->addSelectColumn(AliLogTableMap::COL_CHK_UPA_CODE);
            $criteria->addSelectColumn(AliLogTableMap::COL_CHK_ACC_NO);
            $criteria->addSelectColumn(AliLogTableMap::COL_IP);
            $criteria->addSelectColumn(AliLogTableMap::COL_LOGDATE);
            $criteria->addSelectColumn(AliLogTableMap::COL_LOGTIME);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sys_id');
            $criteria->addSelectColumn($alias . '.subject');
            $criteria->addSelectColumn($alias . '.object');
            $criteria->addSelectColumn($alias . '.detail');
            $criteria->addSelectColumn($alias . '.chk_mobile');
            $criteria->addSelectColumn($alias . '.chk_id_card');
            $criteria->addSelectColumn($alias . '.chk_sp_code');
            $criteria->addSelectColumn($alias . '.chk_upa_code');
            $criteria->addSelectColumn($alias . '.chk_acc_no');
            $criteria->addSelectColumn($alias . '.ip');
            $criteria->addSelectColumn($alias . '.logdate');
            $criteria->addSelectColumn($alias . '.logtime');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliLogTableMap::DATABASE_NAME)->getTable(AliLogTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliLogTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliLogTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliLogTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliLog or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliLog object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliLog) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliLogTableMap::DATABASE_NAME);
            $criteria->add(AliLogTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliLogQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliLogTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliLogTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_log table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliLogQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliLog or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliLog object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliLog object
        }

        if ($criteria->containsKey(AliLogTableMap::COL_ID) && $criteria->keyContainsValue(AliLogTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliLogTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliLogQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliLogTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliLogTableMap::buildTableMap();
