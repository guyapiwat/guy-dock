<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliGlobal;
use CciOrm\CciOrm\AliGlobalQuery;
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
 * This class defines the structure of the 'ali_global' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliGlobalTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliGlobalTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_global';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliGlobal';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliGlobal';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 19;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 19;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_global.id';

    /**
     * the column name for the numofchild field
     */
    const COL_NUMOFCHILD = 'ali_global.numofchild';

    /**
     * the column name for the treeformat field
     */
    const COL_TREEFORMAT = 'ali_global.treeformat';

    /**
     * the column name for the numoflevel field
     */
    const COL_NUMOFLEVEL = 'ali_global.numoflevel';

    /**
     * the column name for the statusformat field
     */
    const COL_STATUSFORMAT = 'ali_global.statusformat';

    /**
     * the column name for the status_member field
     */
    const COL_STATUS_MEMBER = 'ali_global.status_member';

    /**
     * the column name for the status_member_remark field
     */
    const COL_STATUS_MEMBER_REMARK = 'ali_global.status_member_remark';

    /**
     * the column name for the status_regis_mb field
     */
    const COL_STATUS_REGIS_MB = 'ali_global.status_regis_mb';

    /**
     * the column name for the status_regis_mb_remark field
     */
    const COL_STATUS_REGIS_MB_REMARK = 'ali_global.status_regis_mb_remark';

    /**
     * the column name for the status_sale_mb field
     */
    const COL_STATUS_SALE_MB = 'ali_global.status_sale_mb';

    /**
     * the column name for the status_sale_mb_remark field
     */
    const COL_STATUS_SALE_MB_REMARK = 'ali_global.status_sale_mb_remark';

    /**
     * the column name for the status_swap_mb field
     */
    const COL_STATUS_SWAP_MB = 'ali_global.status_swap_mb';

    /**
     * the column name for the status_swap_mb_remark field
     */
    const COL_STATUS_SWAP_MB_REMARK = 'ali_global.status_swap_mb_remark';

    /**
     * the column name for the status_hold_mb field
     */
    const COL_STATUS_HOLD_MB = 'ali_global.status_hold_mb';

    /**
     * the column name for the status_hold_mb_remark field
     */
    const COL_STATUS_HOLD_MB_REMARK = 'ali_global.status_hold_mb_remark';

    /**
     * the column name for the status_remark field
     */
    const COL_STATUS_REMARK = 'ali_global.status_remark';

    /**
     * the column name for the statusewallet field
     */
    const COL_STATUSEWALLET = 'ali_global.statusewallet';

    /**
     * the column name for the vip_exp field
     */
    const COL_VIP_EXP = 'ali_global.vip_exp';

    /**
     * the column name for the status_cron field
     */
    const COL_STATUS_CRON = 'ali_global.status_cron';

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
        self::TYPE_PHPNAME       => array('Id', 'Numofchild', 'Treeformat', 'Numoflevel', 'Statusformat', 'StatusMember', 'StatusMemberRemark', 'StatusRegisMb', 'StatusRegisMbRemark', 'StatusSaleMb', 'StatusSaleMbRemark', 'StatusSwapMb', 'StatusSwapMbRemark', 'StatusHoldMb', 'StatusHoldMbRemark', 'StatusRemark', 'Statusewallet', 'VipExp', 'StatusCron', ),
        self::TYPE_CAMELNAME     => array('id', 'numofchild', 'treeformat', 'numoflevel', 'statusformat', 'statusMember', 'statusMemberRemark', 'statusRegisMb', 'statusRegisMbRemark', 'statusSaleMb', 'statusSaleMbRemark', 'statusSwapMb', 'statusSwapMbRemark', 'statusHoldMb', 'statusHoldMbRemark', 'statusRemark', 'statusewallet', 'vipExp', 'statusCron', ),
        self::TYPE_COLNAME       => array(AliGlobalTableMap::COL_ID, AliGlobalTableMap::COL_NUMOFCHILD, AliGlobalTableMap::COL_TREEFORMAT, AliGlobalTableMap::COL_NUMOFLEVEL, AliGlobalTableMap::COL_STATUSFORMAT, AliGlobalTableMap::COL_STATUS_MEMBER, AliGlobalTableMap::COL_STATUS_MEMBER_REMARK, AliGlobalTableMap::COL_STATUS_REGIS_MB, AliGlobalTableMap::COL_STATUS_REGIS_MB_REMARK, AliGlobalTableMap::COL_STATUS_SALE_MB, AliGlobalTableMap::COL_STATUS_SALE_MB_REMARK, AliGlobalTableMap::COL_STATUS_SWAP_MB, AliGlobalTableMap::COL_STATUS_SWAP_MB_REMARK, AliGlobalTableMap::COL_STATUS_HOLD_MB, AliGlobalTableMap::COL_STATUS_HOLD_MB_REMARK, AliGlobalTableMap::COL_STATUS_REMARK, AliGlobalTableMap::COL_STATUSEWALLET, AliGlobalTableMap::COL_VIP_EXP, AliGlobalTableMap::COL_STATUS_CRON, ),
        self::TYPE_FIELDNAME     => array('id', 'numofchild', 'treeformat', 'numoflevel', 'statusformat', 'status_member', 'status_member_remark', 'status_regis_mb', 'status_regis_mb_remark', 'status_sale_mb', 'status_sale_mb_remark', 'status_swap_mb', 'status_swap_mb_remark', 'status_hold_mb', 'status_hold_mb_remark', 'status_remark', 'statusewallet', 'vip_exp', 'status_cron', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Numofchild' => 1, 'Treeformat' => 2, 'Numoflevel' => 3, 'Statusformat' => 4, 'StatusMember' => 5, 'StatusMemberRemark' => 6, 'StatusRegisMb' => 7, 'StatusRegisMbRemark' => 8, 'StatusSaleMb' => 9, 'StatusSaleMbRemark' => 10, 'StatusSwapMb' => 11, 'StatusSwapMbRemark' => 12, 'StatusHoldMb' => 13, 'StatusHoldMbRemark' => 14, 'StatusRemark' => 15, 'Statusewallet' => 16, 'VipExp' => 17, 'StatusCron' => 18, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'numofchild' => 1, 'treeformat' => 2, 'numoflevel' => 3, 'statusformat' => 4, 'statusMember' => 5, 'statusMemberRemark' => 6, 'statusRegisMb' => 7, 'statusRegisMbRemark' => 8, 'statusSaleMb' => 9, 'statusSaleMbRemark' => 10, 'statusSwapMb' => 11, 'statusSwapMbRemark' => 12, 'statusHoldMb' => 13, 'statusHoldMbRemark' => 14, 'statusRemark' => 15, 'statusewallet' => 16, 'vipExp' => 17, 'statusCron' => 18, ),
        self::TYPE_COLNAME       => array(AliGlobalTableMap::COL_ID => 0, AliGlobalTableMap::COL_NUMOFCHILD => 1, AliGlobalTableMap::COL_TREEFORMAT => 2, AliGlobalTableMap::COL_NUMOFLEVEL => 3, AliGlobalTableMap::COL_STATUSFORMAT => 4, AliGlobalTableMap::COL_STATUS_MEMBER => 5, AliGlobalTableMap::COL_STATUS_MEMBER_REMARK => 6, AliGlobalTableMap::COL_STATUS_REGIS_MB => 7, AliGlobalTableMap::COL_STATUS_REGIS_MB_REMARK => 8, AliGlobalTableMap::COL_STATUS_SALE_MB => 9, AliGlobalTableMap::COL_STATUS_SALE_MB_REMARK => 10, AliGlobalTableMap::COL_STATUS_SWAP_MB => 11, AliGlobalTableMap::COL_STATUS_SWAP_MB_REMARK => 12, AliGlobalTableMap::COL_STATUS_HOLD_MB => 13, AliGlobalTableMap::COL_STATUS_HOLD_MB_REMARK => 14, AliGlobalTableMap::COL_STATUS_REMARK => 15, AliGlobalTableMap::COL_STATUSEWALLET => 16, AliGlobalTableMap::COL_VIP_EXP => 17, AliGlobalTableMap::COL_STATUS_CRON => 18, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'numofchild' => 1, 'treeformat' => 2, 'numoflevel' => 3, 'statusformat' => 4, 'status_member' => 5, 'status_member_remark' => 6, 'status_regis_mb' => 7, 'status_regis_mb_remark' => 8, 'status_sale_mb' => 9, 'status_sale_mb_remark' => 10, 'status_swap_mb' => 11, 'status_swap_mb_remark' => 12, 'status_hold_mb' => 13, 'status_hold_mb_remark' => 14, 'status_remark' => 15, 'statusewallet' => 16, 'vip_exp' => 17, 'status_cron' => 18, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $this->setName('ali_global');
        $this->setPhpName('AliGlobal');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliGlobal');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('numofchild', 'Numofchild', 'INTEGER', true, 10, 0);
        $this->addColumn('treeformat', 'Treeformat', 'VARCHAR', true, 50, '');
        $this->addColumn('numoflevel', 'Numoflevel', 'INTEGER', true, 10, 0);
        $this->addColumn('statusformat', 'Statusformat', 'VARCHAR', true, 255, 'close');
        $this->addColumn('status_member', 'StatusMember', 'INTEGER', true, null, null);
        $this->addColumn('status_member_remark', 'StatusMemberRemark', 'VARCHAR', true, 255, null);
        $this->addColumn('status_regis_mb', 'StatusRegisMb', 'INTEGER', true, null, null);
        $this->addColumn('status_regis_mb_remark', 'StatusRegisMbRemark', 'VARCHAR', true, 255, null);
        $this->addColumn('status_sale_mb', 'StatusSaleMb', 'INTEGER', true, null, null);
        $this->addColumn('status_sale_mb_remark', 'StatusSaleMbRemark', 'VARCHAR', true, 255, null);
        $this->addColumn('status_swap_mb', 'StatusSwapMb', 'INTEGER', true, null, null);
        $this->addColumn('status_swap_mb_remark', 'StatusSwapMbRemark', 'VARCHAR', true, 255, null);
        $this->addColumn('status_hold_mb', 'StatusHoldMb', 'INTEGER', true, null, null);
        $this->addColumn('status_hold_mb_remark', 'StatusHoldMbRemark', 'VARCHAR', true, 255, null);
        $this->addColumn('status_remark', 'StatusRemark', 'VARCHAR', true, 255, null);
        $this->addColumn('statusewallet', 'Statusewallet', 'VARCHAR', true, 255, null);
        $this->addColumn('vip_exp', 'VipExp', 'INTEGER', true, null, null);
        $this->addColumn('status_cron', 'StatusCron', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliGlobalTableMap::CLASS_DEFAULT : AliGlobalTableMap::OM_CLASS;
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
     * @return array           (AliGlobal object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliGlobalTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliGlobalTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliGlobalTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliGlobalTableMap::OM_CLASS;
            /** @var AliGlobal $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliGlobalTableMap::addInstanceToPool($obj, $key);
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
            $key = AliGlobalTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliGlobalTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliGlobal $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliGlobalTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliGlobalTableMap::COL_ID);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_NUMOFCHILD);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_TREEFORMAT);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_NUMOFLEVEL);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUSFORMAT);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_MEMBER);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_MEMBER_REMARK);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_REGIS_MB);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_REGIS_MB_REMARK);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_SALE_MB);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_SALE_MB_REMARK);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_SWAP_MB);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_SWAP_MB_REMARK);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_HOLD_MB);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_HOLD_MB_REMARK);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_REMARK);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUSEWALLET);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_VIP_EXP);
            $criteria->addSelectColumn(AliGlobalTableMap::COL_STATUS_CRON);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.numofchild');
            $criteria->addSelectColumn($alias . '.treeformat');
            $criteria->addSelectColumn($alias . '.numoflevel');
            $criteria->addSelectColumn($alias . '.statusformat');
            $criteria->addSelectColumn($alias . '.status_member');
            $criteria->addSelectColumn($alias . '.status_member_remark');
            $criteria->addSelectColumn($alias . '.status_regis_mb');
            $criteria->addSelectColumn($alias . '.status_regis_mb_remark');
            $criteria->addSelectColumn($alias . '.status_sale_mb');
            $criteria->addSelectColumn($alias . '.status_sale_mb_remark');
            $criteria->addSelectColumn($alias . '.status_swap_mb');
            $criteria->addSelectColumn($alias . '.status_swap_mb_remark');
            $criteria->addSelectColumn($alias . '.status_hold_mb');
            $criteria->addSelectColumn($alias . '.status_hold_mb_remark');
            $criteria->addSelectColumn($alias . '.status_remark');
            $criteria->addSelectColumn($alias . '.statusewallet');
            $criteria->addSelectColumn($alias . '.vip_exp');
            $criteria->addSelectColumn($alias . '.status_cron');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliGlobalTableMap::DATABASE_NAME)->getTable(AliGlobalTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliGlobalTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliGlobalTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliGlobalTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliGlobal or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliGlobal object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliGlobalTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliGlobal) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliGlobalTableMap::DATABASE_NAME);
            $criteria->add(AliGlobalTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliGlobalQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliGlobalTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliGlobalTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_global table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliGlobalQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliGlobal or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliGlobal object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliGlobalTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliGlobal object
        }

        if ($criteria->containsKey(AliGlobalTableMap::COL_ID) && $criteria->keyContainsValue(AliGlobalTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliGlobalTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliGlobalQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliGlobalTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliGlobalTableMap::buildTableMap();
