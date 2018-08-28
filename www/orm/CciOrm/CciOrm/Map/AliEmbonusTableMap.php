<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEmbonus;
use CciOrm\CciOrm\AliEmbonusQuery;
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
 * This class defines the structure of the 'ali_embonus' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEmbonusTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEmbonusTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_embonus';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEmbonus';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEmbonus';

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
     * the column name for the aid field
     */
    const COL_AID = 'ali_embonus.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_embonus.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_embonus.mcode';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_embonus.mpos';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_embonus.name_t';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_embonus.total';

    /**
     * the column name for the total2 field
     */
    const COL_TOTAL2 = 'ali_embonus.total2';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'ali_embonus.tax';

    /**
     * the column name for the oon field
     */
    const COL_OON = 'ali_embonus.oon';

    /**
     * the column name for the bonus field
     */
    const COL_BONUS = 'ali_embonus.bonus';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_embonus.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_embonus.tdate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_embonus.pos_cur';

    /**
     * the column name for the adjust field
     */
    const COL_ADJUST = 'ali_embonus.adjust';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_embonus.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_embonus.locationbase';

    /**
     * the column name for the pos_cur1 field
     */
    const COL_POS_CUR1 = 'ali_embonus.pos_cur1';

    /**
     * the column name for the weak field
     */
    const COL_WEAK = 'ali_embonus.weak';

    /**
     * the column name for the pv_world field
     */
    const COL_PV_WORLD = 'ali_embonus.pv_world';

    /**
     * the column name for the allsumpv_cd field
     */
    const COL_ALLSUMPV_CD = 'ali_embonus.allsumpv_cd';

    /**
     * the column name for the allsumpv_sd field
     */
    const COL_ALLSUMPV_SD = 'ali_embonus.allsumpv_sd';

    /**
     * the column name for the sumpv_cd field
     */
    const COL_SUMPV_CD = 'ali_embonus.sumpv_cd';

    /**
     * the column name for the sumpv_sd field
     */
    const COL_SUMPV_SD = 'ali_embonus.sumpv_sd';

    /**
     * the column name for the exp field
     */
    const COL_EXP = 'ali_embonus.exp';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'Mpos', 'NameT', 'Total', 'Total2', 'Tax', 'Oon', 'Bonus', 'Fdate', 'Tdate', 'PosCur', 'Adjust', 'Crate', 'Locationbase', 'PosCur1', 'Weak', 'PvWorld', 'AllsumpvCd', 'AllsumpvSd', 'SumpvCd', 'SumpvSd', 'Exp', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'mpos', 'nameT', 'total', 'total2', 'tax', 'oon', 'bonus', 'fdate', 'tdate', 'posCur', 'adjust', 'crate', 'locationbase', 'posCur1', 'weak', 'pvWorld', 'allsumpvCd', 'allsumpvSd', 'sumpvCd', 'sumpvSd', 'exp', ),
        self::TYPE_COLNAME       => array(AliEmbonusTableMap::COL_AID, AliEmbonusTableMap::COL_RCODE, AliEmbonusTableMap::COL_MCODE, AliEmbonusTableMap::COL_MPOS, AliEmbonusTableMap::COL_NAME_T, AliEmbonusTableMap::COL_TOTAL, AliEmbonusTableMap::COL_TOTAL2, AliEmbonusTableMap::COL_TAX, AliEmbonusTableMap::COL_OON, AliEmbonusTableMap::COL_BONUS, AliEmbonusTableMap::COL_FDATE, AliEmbonusTableMap::COL_TDATE, AliEmbonusTableMap::COL_POS_CUR, AliEmbonusTableMap::COL_ADJUST, AliEmbonusTableMap::COL_CRATE, AliEmbonusTableMap::COL_LOCATIONBASE, AliEmbonusTableMap::COL_POS_CUR1, AliEmbonusTableMap::COL_WEAK, AliEmbonusTableMap::COL_PV_WORLD, AliEmbonusTableMap::COL_ALLSUMPV_CD, AliEmbonusTableMap::COL_ALLSUMPV_SD, AliEmbonusTableMap::COL_SUMPV_CD, AliEmbonusTableMap::COL_SUMPV_SD, AliEmbonusTableMap::COL_EXP, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'mpos', 'name_t', 'total', 'total2', 'tax', 'oon', 'bonus', 'fdate', 'tdate', 'pos_cur', 'adjust', 'crate', 'locationbase', 'pos_cur1', 'weak', 'pv_world', 'allsumpv_cd', 'allsumpv_sd', 'sumpv_cd', 'sumpv_sd', 'exp', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'Mpos' => 3, 'NameT' => 4, 'Total' => 5, 'Total2' => 6, 'Tax' => 7, 'Oon' => 8, 'Bonus' => 9, 'Fdate' => 10, 'Tdate' => 11, 'PosCur' => 12, 'Adjust' => 13, 'Crate' => 14, 'Locationbase' => 15, 'PosCur1' => 16, 'Weak' => 17, 'PvWorld' => 18, 'AllsumpvCd' => 19, 'AllsumpvSd' => 20, 'SumpvCd' => 21, 'SumpvSd' => 22, 'Exp' => 23, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'mpos' => 3, 'nameT' => 4, 'total' => 5, 'total2' => 6, 'tax' => 7, 'oon' => 8, 'bonus' => 9, 'fdate' => 10, 'tdate' => 11, 'posCur' => 12, 'adjust' => 13, 'crate' => 14, 'locationbase' => 15, 'posCur1' => 16, 'weak' => 17, 'pvWorld' => 18, 'allsumpvCd' => 19, 'allsumpvSd' => 20, 'sumpvCd' => 21, 'sumpvSd' => 22, 'exp' => 23, ),
        self::TYPE_COLNAME       => array(AliEmbonusTableMap::COL_AID => 0, AliEmbonusTableMap::COL_RCODE => 1, AliEmbonusTableMap::COL_MCODE => 2, AliEmbonusTableMap::COL_MPOS => 3, AliEmbonusTableMap::COL_NAME_T => 4, AliEmbonusTableMap::COL_TOTAL => 5, AliEmbonusTableMap::COL_TOTAL2 => 6, AliEmbonusTableMap::COL_TAX => 7, AliEmbonusTableMap::COL_OON => 8, AliEmbonusTableMap::COL_BONUS => 9, AliEmbonusTableMap::COL_FDATE => 10, AliEmbonusTableMap::COL_TDATE => 11, AliEmbonusTableMap::COL_POS_CUR => 12, AliEmbonusTableMap::COL_ADJUST => 13, AliEmbonusTableMap::COL_CRATE => 14, AliEmbonusTableMap::COL_LOCATIONBASE => 15, AliEmbonusTableMap::COL_POS_CUR1 => 16, AliEmbonusTableMap::COL_WEAK => 17, AliEmbonusTableMap::COL_PV_WORLD => 18, AliEmbonusTableMap::COL_ALLSUMPV_CD => 19, AliEmbonusTableMap::COL_ALLSUMPV_SD => 20, AliEmbonusTableMap::COL_SUMPV_CD => 21, AliEmbonusTableMap::COL_SUMPV_SD => 22, AliEmbonusTableMap::COL_EXP => 23, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'mpos' => 3, 'name_t' => 4, 'total' => 5, 'total2' => 6, 'tax' => 7, 'oon' => 8, 'bonus' => 9, 'fdate' => 10, 'tdate' => 11, 'pos_cur' => 12, 'adjust' => 13, 'crate' => 14, 'locationbase' => 15, 'pos_cur1' => 16, 'weak' => 17, 'pv_world' => 18, 'allsumpv_cd' => 19, 'allsumpv_sd' => 20, 'sumpv_cd' => 21, 'sumpv_sd' => 22, 'exp' => 23, ),
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
        $this->setName('ali_embonus');
        $this->setPhpName('AliEmbonus');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEmbonus');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('mpos', 'Mpos', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('total2', 'Total2', 'DECIMAL', true, 15, null);
        $this->addColumn('tax', 'Tax', 'DECIMAL', true, 15, null);
        $this->addColumn('oon', 'Oon', 'INTEGER', true, null, null);
        $this->addColumn('bonus', 'Bonus', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 10, null);
        $this->addColumn('adjust', 'Adjust', 'DECIMAL', true, 15, null);
        $this->addColumn('crate', 'Crate', 'DECIMAL', true, 11, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('pos_cur1', 'PosCur1', 'VARCHAR', true, 255, null);
        $this->addColumn('weak', 'Weak', 'DECIMAL', true, 15, null);
        $this->addColumn('pv_world', 'PvWorld', 'DECIMAL', true, 15, null);
        $this->addColumn('allsumpv_cd', 'AllsumpvCd', 'DECIMAL', true, 15, null);
        $this->addColumn('allsumpv_sd', 'AllsumpvSd', 'DECIMAL', true, 15, null);
        $this->addColumn('sumpv_cd', 'SumpvCd', 'DECIMAL', true, 15, null);
        $this->addColumn('sumpv_sd', 'SumpvSd', 'DECIMAL', true, 15, null);
        $this->addColumn('exp', 'Exp', 'DECIMAL', true, 15, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliEmbonusTableMap::CLASS_DEFAULT : AliEmbonusTableMap::OM_CLASS;
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
     * @return array           (AliEmbonus object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEmbonusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEmbonusTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEmbonusTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEmbonusTableMap::OM_CLASS;
            /** @var AliEmbonus $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEmbonusTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEmbonusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEmbonusTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEmbonus $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEmbonusTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_AID);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_TOTAL2);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_TAX);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_OON);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_BONUS);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_ADJUST);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_POS_CUR1);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_WEAK);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_PV_WORLD);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_ALLSUMPV_CD);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_ALLSUMPV_SD);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_SUMPV_CD);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_SUMPV_SD);
            $criteria->addSelectColumn(AliEmbonusTableMap::COL_EXP);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.mpos');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.total2');
            $criteria->addSelectColumn($alias . '.tax');
            $criteria->addSelectColumn($alias . '.oon');
            $criteria->addSelectColumn($alias . '.bonus');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.adjust');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.pos_cur1');
            $criteria->addSelectColumn($alias . '.weak');
            $criteria->addSelectColumn($alias . '.pv_world');
            $criteria->addSelectColumn($alias . '.allsumpv_cd');
            $criteria->addSelectColumn($alias . '.allsumpv_sd');
            $criteria->addSelectColumn($alias . '.sumpv_cd');
            $criteria->addSelectColumn($alias . '.sumpv_sd');
            $criteria->addSelectColumn($alias . '.exp');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEmbonusTableMap::DATABASE_NAME)->getTable(AliEmbonusTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEmbonusTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEmbonusTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEmbonusTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEmbonus or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEmbonus object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEmbonusTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEmbonus) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEmbonusTableMap::DATABASE_NAME);
            $criteria->add(AliEmbonusTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliEmbonusQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEmbonusTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEmbonusTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_embonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEmbonusQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEmbonus or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEmbonus object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEmbonusTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEmbonus object
        }

        if ($criteria->containsKey(AliEmbonusTableMap::COL_AID) && $criteria->keyContainsValue(AliEmbonusTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEmbonusTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliEmbonusQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEmbonusTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEmbonusTableMap::buildTableMap();
