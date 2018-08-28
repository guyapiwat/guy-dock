<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliReportMember;
use CciOrm\CciOrm\AliReportMemberQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'ali_report_member' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliReportMemberTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliReportMemberTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_report_member';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliReportMember';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliReportMember';

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
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_report_member.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_report_member.name_t';

    /**
     * the column name for the mdate field
     */
    const COL_MDATE = 'ali_report_member.mdate';

    /**
     * the column name for the expdate field
     */
    const COL_EXPDATE = 'ali_report_member.expdate';

    /**
     * the column name for the pvdate field
     */
    const COL_PVDATE = 'ali_report_member.pvdate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_report_member.pos_cur';

    /**
     * the column name for the pos_cur4 field
     */
    const COL_POS_CUR4 = 'ali_report_member.pos_cur4';

    /**
     * the column name for the pos_cur2 field
     */
    const COL_POS_CUR2 = 'ali_report_member.pos_cur2';

    /**
     * the column name for the pos_cur1 field
     */
    const COL_POS_CUR1 = 'ali_report_member.pos_cur1';

    /**
     * the column name for the new_member field
     */
    const COL_NEW_MEMBER = 'ali_report_member.new_member';

    /**
     * the column name for the new_sup field
     */
    const COL_NEW_SUP = 'ali_report_member.new_sup';

    /**
     * the column name for the new_ex field
     */
    const COL_NEW_EX = 'ali_report_member.new_ex';

    /**
     * the column name for the sup_ex field
     */
    const COL_SUP_EX = 'ali_report_member.sup_ex';

    /**
     * the column name for the pvmonth field
     */
    const COL_PVMONTH = 'ali_report_member.pvmonth';

    /**
     * the column name for the auto_tot field
     */
    const COL_AUTO_TOT = 'ali_report_member.auto_tot';

    /**
     * the column name for the pv_l field
     */
    const COL_PV_L = 'ali_report_member.pv_l';

    /**
     * the column name for the pv_c field
     */
    const COL_PV_C = 'ali_report_member.pv_c';

    /**
     * the column name for the tpos_cur field
     */
    const COL_TPOS_CUR = 'ali_report_member.tpos_cur';

    /**
     * the column name for the sp_code field
     */
    const COL_SP_CODE = 'ali_report_member.sp_code';

    /**
     * the column name for the sp_name field
     */
    const COL_SP_NAME = 'ali_report_member.sp_name';

    /**
     * the column name for the lr field
     */
    const COL_LR = 'ali_report_member.lr';

    /**
     * the column name for the report1 field
     */
    const COL_REPORT1 = 'ali_report_member.report1';

    /**
     * the column name for the status_ato field
     */
    const COL_STATUS_ATO = 'ali_report_member.status_ato';

    /**
     * the column name for the status_member field
     */
    const COL_STATUS_MEMBER = 'ali_report_member.status_member';

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
        self::TYPE_PHPNAME       => array('Mcode', 'NameT', 'Mdate', 'Expdate', 'Pvdate', 'PosCur', 'PosCur4', 'PosCur2', 'PosCur1', 'NewMember', 'NewSup', 'NewEx', 'SupEx', 'Pvmonth', 'AutoTot', 'PvL', 'PvC', 'TposCur', 'SpCode', 'SpName', 'Lr', 'Report1', 'StatusAto', 'StatusMember', ),
        self::TYPE_CAMELNAME     => array('mcode', 'nameT', 'mdate', 'expdate', 'pvdate', 'posCur', 'posCur4', 'posCur2', 'posCur1', 'newMember', 'newSup', 'newEx', 'supEx', 'pvmonth', 'autoTot', 'pvL', 'pvC', 'tposCur', 'spCode', 'spName', 'lr', 'report1', 'statusAto', 'statusMember', ),
        self::TYPE_COLNAME       => array(AliReportMemberTableMap::COL_MCODE, AliReportMemberTableMap::COL_NAME_T, AliReportMemberTableMap::COL_MDATE, AliReportMemberTableMap::COL_EXPDATE, AliReportMemberTableMap::COL_PVDATE, AliReportMemberTableMap::COL_POS_CUR, AliReportMemberTableMap::COL_POS_CUR4, AliReportMemberTableMap::COL_POS_CUR2, AliReportMemberTableMap::COL_POS_CUR1, AliReportMemberTableMap::COL_NEW_MEMBER, AliReportMemberTableMap::COL_NEW_SUP, AliReportMemberTableMap::COL_NEW_EX, AliReportMemberTableMap::COL_SUP_EX, AliReportMemberTableMap::COL_PVMONTH, AliReportMemberTableMap::COL_AUTO_TOT, AliReportMemberTableMap::COL_PV_L, AliReportMemberTableMap::COL_PV_C, AliReportMemberTableMap::COL_TPOS_CUR, AliReportMemberTableMap::COL_SP_CODE, AliReportMemberTableMap::COL_SP_NAME, AliReportMemberTableMap::COL_LR, AliReportMemberTableMap::COL_REPORT1, AliReportMemberTableMap::COL_STATUS_ATO, AliReportMemberTableMap::COL_STATUS_MEMBER, ),
        self::TYPE_FIELDNAME     => array('mcode', 'name_t', 'mdate', 'expdate', 'pvdate', 'pos_cur', 'pos_cur4', 'pos_cur2', 'pos_cur1', 'new_member', 'new_sup', 'new_ex', 'sup_ex', 'pvmonth', 'auto_tot', 'pv_l', 'pv_c', 'tpos_cur', 'sp_code', 'sp_name', 'lr', 'report1', 'status_ato', 'status_member', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Mcode' => 0, 'NameT' => 1, 'Mdate' => 2, 'Expdate' => 3, 'Pvdate' => 4, 'PosCur' => 5, 'PosCur4' => 6, 'PosCur2' => 7, 'PosCur1' => 8, 'NewMember' => 9, 'NewSup' => 10, 'NewEx' => 11, 'SupEx' => 12, 'Pvmonth' => 13, 'AutoTot' => 14, 'PvL' => 15, 'PvC' => 16, 'TposCur' => 17, 'SpCode' => 18, 'SpName' => 19, 'Lr' => 20, 'Report1' => 21, 'StatusAto' => 22, 'StatusMember' => 23, ),
        self::TYPE_CAMELNAME     => array('mcode' => 0, 'nameT' => 1, 'mdate' => 2, 'expdate' => 3, 'pvdate' => 4, 'posCur' => 5, 'posCur4' => 6, 'posCur2' => 7, 'posCur1' => 8, 'newMember' => 9, 'newSup' => 10, 'newEx' => 11, 'supEx' => 12, 'pvmonth' => 13, 'autoTot' => 14, 'pvL' => 15, 'pvC' => 16, 'tposCur' => 17, 'spCode' => 18, 'spName' => 19, 'lr' => 20, 'report1' => 21, 'statusAto' => 22, 'statusMember' => 23, ),
        self::TYPE_COLNAME       => array(AliReportMemberTableMap::COL_MCODE => 0, AliReportMemberTableMap::COL_NAME_T => 1, AliReportMemberTableMap::COL_MDATE => 2, AliReportMemberTableMap::COL_EXPDATE => 3, AliReportMemberTableMap::COL_PVDATE => 4, AliReportMemberTableMap::COL_POS_CUR => 5, AliReportMemberTableMap::COL_POS_CUR4 => 6, AliReportMemberTableMap::COL_POS_CUR2 => 7, AliReportMemberTableMap::COL_POS_CUR1 => 8, AliReportMemberTableMap::COL_NEW_MEMBER => 9, AliReportMemberTableMap::COL_NEW_SUP => 10, AliReportMemberTableMap::COL_NEW_EX => 11, AliReportMemberTableMap::COL_SUP_EX => 12, AliReportMemberTableMap::COL_PVMONTH => 13, AliReportMemberTableMap::COL_AUTO_TOT => 14, AliReportMemberTableMap::COL_PV_L => 15, AliReportMemberTableMap::COL_PV_C => 16, AliReportMemberTableMap::COL_TPOS_CUR => 17, AliReportMemberTableMap::COL_SP_CODE => 18, AliReportMemberTableMap::COL_SP_NAME => 19, AliReportMemberTableMap::COL_LR => 20, AliReportMemberTableMap::COL_REPORT1 => 21, AliReportMemberTableMap::COL_STATUS_ATO => 22, AliReportMemberTableMap::COL_STATUS_MEMBER => 23, ),
        self::TYPE_FIELDNAME     => array('mcode' => 0, 'name_t' => 1, 'mdate' => 2, 'expdate' => 3, 'pvdate' => 4, 'pos_cur' => 5, 'pos_cur4' => 6, 'pos_cur2' => 7, 'pos_cur1' => 8, 'new_member' => 9, 'new_sup' => 10, 'new_ex' => 11, 'sup_ex' => 12, 'pvmonth' => 13, 'auto_tot' => 14, 'pv_l' => 15, 'pv_c' => 16, 'tpos_cur' => 17, 'sp_code' => 18, 'sp_name' => 19, 'lr' => 20, 'report1' => 21, 'status_ato' => 22, 'status_member' => 23, ),
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
        $this->setName('ali_report_member');
        $this->setPhpName('AliReportMember');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliReportMember');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('mdate', 'Mdate', 'DATE', true, null, null);
        $this->addColumn('expdate', 'Expdate', 'DATE', true, null, null);
        $this->addColumn('pvdate', 'Pvdate', 'DATE', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur4', 'PosCur4', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur2', 'PosCur2', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur1', 'PosCur1', 'VARCHAR', true, 255, null);
        $this->addColumn('new_member', 'NewMember', 'INTEGER', true, null, null);
        $this->addColumn('new_sup', 'NewSup', 'INTEGER', true, null, null);
        $this->addColumn('new_ex', 'NewEx', 'INTEGER', true, null, null);
        $this->addColumn('sup_ex', 'SupEx', 'INTEGER', true, null, null);
        $this->addColumn('pvmonth', 'Pvmonth', 'INTEGER', true, null, null);
        $this->addColumn('auto_tot', 'AutoTot', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_l', 'PvL', 'INTEGER', true, null, null);
        $this->addColumn('pv_c', 'PvC', 'INTEGER', true, null, null);
        $this->addColumn('tpos_cur', 'TposCur', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_code', 'SpCode', 'VARCHAR', true, 255, null);
        $this->addColumn('sp_name', 'SpName', 'VARCHAR', true, 255, null);
        $this->addColumn('lr', 'Lr', 'INTEGER', true, null, null);
        $this->addColumn('report1', 'Report1', 'VARCHAR', true, 255, null);
        $this->addColumn('status_ato', 'StatusAto', 'VARCHAR', true, 255, null);
        $this->addColumn('status_member', 'StatusMember', 'VARCHAR', true, 255, null);
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
        return null;
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
        return '';
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
        return $withPrefix ? AliReportMemberTableMap::CLASS_DEFAULT : AliReportMemberTableMap::OM_CLASS;
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
     * @return array           (AliReportMember object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliReportMemberTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliReportMemberTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliReportMemberTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliReportMemberTableMap::OM_CLASS;
            /** @var AliReportMember $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliReportMemberTableMap::addInstanceToPool($obj, $key);
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
            $key = AliReportMemberTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliReportMemberTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliReportMember $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliReportMemberTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_MDATE);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_EXPDATE);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_PVDATE);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_POS_CUR4);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_POS_CUR2);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_POS_CUR1);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_NEW_MEMBER);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_NEW_SUP);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_NEW_EX);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_SUP_EX);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_PVMONTH);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_AUTO_TOT);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_PV_L);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_PV_C);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_TPOS_CUR);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_SP_CODE);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_SP_NAME);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_LR);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_REPORT1);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_STATUS_ATO);
            $criteria->addSelectColumn(AliReportMemberTableMap::COL_STATUS_MEMBER);
        } else {
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.mdate');
            $criteria->addSelectColumn($alias . '.expdate');
            $criteria->addSelectColumn($alias . '.pvdate');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.pos_cur4');
            $criteria->addSelectColumn($alias . '.pos_cur2');
            $criteria->addSelectColumn($alias . '.pos_cur1');
            $criteria->addSelectColumn($alias . '.new_member');
            $criteria->addSelectColumn($alias . '.new_sup');
            $criteria->addSelectColumn($alias . '.new_ex');
            $criteria->addSelectColumn($alias . '.sup_ex');
            $criteria->addSelectColumn($alias . '.pvmonth');
            $criteria->addSelectColumn($alias . '.auto_tot');
            $criteria->addSelectColumn($alias . '.pv_l');
            $criteria->addSelectColumn($alias . '.pv_c');
            $criteria->addSelectColumn($alias . '.tpos_cur');
            $criteria->addSelectColumn($alias . '.sp_code');
            $criteria->addSelectColumn($alias . '.sp_name');
            $criteria->addSelectColumn($alias . '.lr');
            $criteria->addSelectColumn($alias . '.report1');
            $criteria->addSelectColumn($alias . '.status_ato');
            $criteria->addSelectColumn($alias . '.status_member');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliReportMemberTableMap::DATABASE_NAME)->getTable(AliReportMemberTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliReportMemberTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliReportMemberTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliReportMemberTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliReportMember or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliReportMember object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportMemberTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliReportMember) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The AliReportMember object has no primary key');
        }

        $query = AliReportMemberQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliReportMemberTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliReportMemberTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_report_member table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliReportMemberQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliReportMember or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliReportMember object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportMemberTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliReportMember object
        }


        // Set the correct dbName
        $query = AliReportMemberQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliReportMemberTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliReportMemberTableMap::buildTableMap();
