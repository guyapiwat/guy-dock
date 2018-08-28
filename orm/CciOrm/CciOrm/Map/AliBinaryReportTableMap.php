<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliBinaryReport;
use CciOrm\CciOrm\AliBinaryReportQuery;
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
 * This class defines the structure of the 'ali_binary_report' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliBinaryReportTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliBinaryReportTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_binary_report';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliBinaryReport';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliBinaryReport';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 22;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 22;

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_binary_report.mcode';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_binary_report.mdate';

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_binary_report.id';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_binary_report.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_binary_report.total';

    /**
     * the column name for the fast field
     */
    const COL_FAST = 'ali_binary_report.fast';

    /**
     * the column name for the weakstrong field
     */
    const COL_WEAKSTRONG = 'ali_binary_report.weakstrong';

    /**
     * the column name for the matching field
     */
    const COL_MATCHING = 'ali_binary_report.matching';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_binary_report.upa_code';

    /**
     * the column name for the upa_name field
     */
    const COL_UPA_NAME = 'ali_binary_report.upa_name';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_binary_report.sp_code';

    /**
     * the column name for the sp_name field
     */
    const COL_SP_NAME = 'ali_binary_report.sp_name';

    /**
     * the column name for the lv field
     */
    const COL_LV = 'ali_binary_report.lv';

    /**
     * the column name for the lv_sp field
     */
    const COL_LV_SP = 'ali_binary_report.lv_sp';

    /**
     * the column name for the lr field
     */
    const COL_LR = 'ali_binary_report.lr';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_binary_report.pos_cur';

    /**
     * the column name for the pos_cur2 field
     */
    const COL_POS_CUR2 = 'ali_binary_report.pos_cur2';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'ali_binary_report.uid';

    /**
     * the column name for the totpv field
     */
    const COL_TOTPV = 'ali_binary_report.totpv';

    /**
     * the column name for the hpv field
     */
    const COL_HPV = 'ali_binary_report.hpv';

    /**
     * the column name for the thismonth field
     */
    const COL_THISMONTH = 'ali_binary_report.thismonth';

    /**
     * the column name for the nextmonth field
     */
    const COL_NEXTMONTH = 'ali_binary_report.nextmonth';

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
        self::TYPE_PHPNAME       => array('Mcode', 'Mdate', 'Id', 'NameT', 'Total', 'Fast', 'Weakstrong', 'Matching', 'UpaCode', 'UpaName', 'SpCode', 'SpName', 'Lv', 'LvSp', 'Lr', 'PosCur', 'PosCur2', 'Uid', 'Totpv', 'Hpv', 'Thismonth', 'Nextmonth', ),
        self::TYPE_CAMELNAME     => array('mcode', 'mdate', 'id', 'nameT', 'total', 'fast', 'weakstrong', 'matching', 'upaCode', 'upaName', 'spCode', 'spName', 'lv', 'lvSp', 'lr', 'posCur', 'posCur2', 'uid', 'totpv', 'hpv', 'thismonth', 'nextmonth', ),
        self::TYPE_COLNAME       => array(AliBinaryReportTableMap::COL_MCODE, AliBinaryReportTableMap::COL_MDATE, AliBinaryReportTableMap::COL_ID, AliBinaryReportTableMap::COL_NAME_T, AliBinaryReportTableMap::COL_TOTAL, AliBinaryReportTableMap::COL_FAST, AliBinaryReportTableMap::COL_WEAKSTRONG, AliBinaryReportTableMap::COL_MATCHING, AliBinaryReportTableMap::COL_UPA_CODE, AliBinaryReportTableMap::COL_UPA_NAME, AliBinaryReportTableMap::COL_SP_CODE, AliBinaryReportTableMap::COL_SP_NAME, AliBinaryReportTableMap::COL_LV, AliBinaryReportTableMap::COL_LV_SP, AliBinaryReportTableMap::COL_LR, AliBinaryReportTableMap::COL_POS_CUR, AliBinaryReportTableMap::COL_POS_CUR2, AliBinaryReportTableMap::COL_UID, AliBinaryReportTableMap::COL_TOTPV, AliBinaryReportTableMap::COL_HPV, AliBinaryReportTableMap::COL_THISMONTH, AliBinaryReportTableMap::COL_NEXTMONTH, ),
        self::TYPE_FIELDNAME     => array('mcode', 'mdate', 'id', 'name_t', 'total', 'fast', 'weakstrong', 'matching', 'upa_code', 'upa_name', 'sp_code', 'sp_name', 'lv', 'lv_sp', 'lr', 'pos_cur', 'pos_cur2', 'uid', 'totpv', 'hpv', 'thismonth', 'nextmonth', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Mcode' => 0, 'Mdate' => 1, 'Id' => 2, 'NameT' => 3, 'Total' => 4, 'Fast' => 5, 'Weakstrong' => 6, 'Matching' => 7, 'UpaCode' => 8, 'UpaName' => 9, 'SpCode' => 10, 'SpName' => 11, 'Lv' => 12, 'LvSp' => 13, 'Lr' => 14, 'PosCur' => 15, 'PosCur2' => 16, 'Uid' => 17, 'Totpv' => 18, 'Hpv' => 19, 'Thismonth' => 20, 'Nextmonth' => 21, ),
        self::TYPE_CAMELNAME     => array('mcode' => 0, 'mdate' => 1, 'id' => 2, 'nameT' => 3, 'total' => 4, 'fast' => 5, 'weakstrong' => 6, 'matching' => 7, 'upaCode' => 8, 'upaName' => 9, 'spCode' => 10, 'spName' => 11, 'lv' => 12, 'lvSp' => 13, 'lr' => 14, 'posCur' => 15, 'posCur2' => 16, 'uid' => 17, 'totpv' => 18, 'hpv' => 19, 'thismonth' => 20, 'nextmonth' => 21, ),
        self::TYPE_COLNAME       => array(AliBinaryReportTableMap::COL_MCODE => 0, AliBinaryReportTableMap::COL_MDATE => 1, AliBinaryReportTableMap::COL_ID => 2, AliBinaryReportTableMap::COL_NAME_T => 3, AliBinaryReportTableMap::COL_TOTAL => 4, AliBinaryReportTableMap::COL_FAST => 5, AliBinaryReportTableMap::COL_WEAKSTRONG => 6, AliBinaryReportTableMap::COL_MATCHING => 7, AliBinaryReportTableMap::COL_UPA_CODE => 8, AliBinaryReportTableMap::COL_UPA_NAME => 9, AliBinaryReportTableMap::COL_SP_CODE => 10, AliBinaryReportTableMap::COL_SP_NAME => 11, AliBinaryReportTableMap::COL_LV => 12, AliBinaryReportTableMap::COL_LV_SP => 13, AliBinaryReportTableMap::COL_LR => 14, AliBinaryReportTableMap::COL_POS_CUR => 15, AliBinaryReportTableMap::COL_POS_CUR2 => 16, AliBinaryReportTableMap::COL_UID => 17, AliBinaryReportTableMap::COL_TOTPV => 18, AliBinaryReportTableMap::COL_HPV => 19, AliBinaryReportTableMap::COL_THISMONTH => 20, AliBinaryReportTableMap::COL_NEXTMONTH => 21, ),
        self::TYPE_FIELDNAME     => array('mcode' => 0, 'mdate' => 1, 'id' => 2, 'name_t' => 3, 'total' => 4, 'fast' => 5, 'weakstrong' => 6, 'matching' => 7, 'upa_code' => 8, 'upa_name' => 9, 'sp_code' => 10, 'sp_name' => 11, 'lv' => 12, 'lv_sp' => 13, 'lr' => 14, 'pos_cur' => 15, 'pos_cur2' => 16, 'uid' => 17, 'totpv' => 18, 'hpv' => 19, 'thismonth' => 20, 'nextmonth' => 21, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $this->setName('ali_binary_report');
        $this->setPhpName('AliBinaryReport');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliBinaryReport');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('mdate', 'Mdate', 'DATE', true, null, null);
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, 22, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('fast', 'Fast', 'DECIMAL', true, 15, null);
        $this->addColumn('weakstrong', 'Weakstrong', 'DECIMAL', true, 15, null);
        $this->addColumn('matching', 'Matching', 'DECIMAL', true, 15, null);
        $this->addColumn('upa_code', 'UpaCode', 'VARCHAR', true, 255, null);
        $this->addColumn('upa_name', 'UpaName', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_name', 'SpName', 'VARCHAR', true, 255, null);
        $this->addColumn('lv', 'Lv', 'INTEGER', true, null, null);
        $this->addColumn('lv_sp', 'LvSp', 'INTEGER', true, null, null);
        $this->addColumn('lr', 'Lr', 'INTEGER', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur2', 'PosCur2', 'VARCHAR', true, 10, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('totpv', 'Totpv', 'DECIMAL', true, 15, null);
        $this->addColumn('hpv', 'Hpv', 'DECIMAL', true, 15, null);
        $this->addColumn('thismonth', 'Thismonth', 'DECIMAL', true, 15, null);
        $this->addColumn('nextmonth', 'Nextmonth', 'DECIMAL', true, 15, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
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
        return $withPrefix ? AliBinaryReportTableMap::CLASS_DEFAULT : AliBinaryReportTableMap::OM_CLASS;
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
     * @return array           (AliBinaryReport object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliBinaryReportTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliBinaryReportTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliBinaryReportTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliBinaryReportTableMap::OM_CLASS;
            /** @var AliBinaryReport $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliBinaryReportTableMap::addInstanceToPool($obj, $key);
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
            $key = AliBinaryReportTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliBinaryReportTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliBinaryReport $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliBinaryReportTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_ID);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_FAST);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_WEAKSTRONG);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_MATCHING);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_UPA_NAME);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_SP_NAME);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_LV);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_LV_SP);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_LR);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_POS_CUR2);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_UID);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_TOTPV);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_HPV);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_THISMONTH);
            $criteria->addSelectColumn(AliBinaryReportTableMap::COL_NEXTMONTH);
        } else {
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.mdate');
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.fast');
            $criteria->addSelectColumn($alias . '.weakstrong');
            $criteria->addSelectColumn($alias . '.matching');
            $criteria->addSelectColumn($alias . '.upa_code');
            $criteria->addSelectColumn($alias . '.upa_name');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.sp_name');
            $criteria->addSelectColumn($alias . '.lv');
            $criteria->addSelectColumn($alias . '.lv_sp');
            $criteria->addSelectColumn($alias . '.lr');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.pos_cur2');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.totpv');
            $criteria->addSelectColumn($alias . '.hpv');
            $criteria->addSelectColumn($alias . '.thismonth');
            $criteria->addSelectColumn($alias . '.nextmonth');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliBinaryReportTableMap::DATABASE_NAME)->getTable(AliBinaryReportTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliBinaryReportTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliBinaryReportTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliBinaryReportTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliBinaryReport or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliBinaryReport object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBinaryReportTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliBinaryReport) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliBinaryReportTableMap::DATABASE_NAME);
            $criteria->add(AliBinaryReportTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliBinaryReportQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliBinaryReportTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliBinaryReportTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_binary_report table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliBinaryReportQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliBinaryReport or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliBinaryReport object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBinaryReportTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliBinaryReport object
        }

        if ($criteria->containsKey(AliBinaryReportTableMap::COL_ID) && $criteria->keyContainsValue(AliBinaryReportTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliBinaryReportTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliBinaryReportQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliBinaryReportTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliBinaryReportTableMap::buildTableMap();
