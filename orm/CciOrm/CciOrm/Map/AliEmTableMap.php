<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliEm;
use CciOrm\CciOrm\AliEmQuery;
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
 * This class defines the structure of the 'ali_em' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliEmTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliEmTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_em';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliEm';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliEm';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 25;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 25;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_em.id';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_em.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_em.mcode';

    /**
     * the column name for the mpos field
     */
    const COL_MPOS = 'ali_em.mpos';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_em.name_t';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_em.pv';

    /**
     * the column name for the share field
     */
    const COL_SHARE = 'ali_em.share';

    /**
     * the column name for the percer field
     */
    const COL_PERCER = 'ali_em.percer';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_em.total';

    /**
     * the column name for the total1 field
     */
    const COL_TOTAL1 = 'ali_em.total1';

    /**
     * the column name for the total2 field
     */
    const COL_TOTAL2 = 'ali_em.total2';

    /**
     * the column name for the total3 field
     */
    const COL_TOTAL3 = 'ali_em.total3';

    /**
     * the column name for the total4 field
     */
    const COL_TOTAL4 = 'ali_em.total4';

    /**
     * the column name for the total5 field
     */
    const COL_TOTAL5 = 'ali_em.total5';

    /**
     * the column name for the total6 field
     */
    const COL_TOTAL6 = 'ali_em.total6';

    /**
     * the column name for the pershare field
     */
    const COL_PERSHARE = 'ali_em.pershare';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_em.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_em.tdate';

    /**
     * the column name for the pv_world field
     */
    const COL_PV_WORLD = 'ali_em.pv_world';

    /**
     * the column name for the pools field
     */
    const COL_POOLS = 'ali_em.pools';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_em.pos_cur';

    /**
     * the column name for the pos_cur1 field
     */
    const COL_POS_CUR1 = 'ali_em.pos_cur1';

    /**
     * the column name for the weak field
     */
    const COL_WEAK = 'ali_em.weak';

    /**
     * the column name for the oon field
     */
    const COL_OON = 'ali_em.oon';

    /**
     * the column name for the exp field
     */
    const COL_EXP = 'ali_em.exp';

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
        self::TYPE_PHPNAME       => array('Id', 'Rcode', 'Mcode', 'Mpos', 'NameT', 'Pv', 'Share', 'Percer', 'Total', 'Total1', 'Total2', 'Total3', 'Total4', 'Total5', 'Total6', 'Pershare', 'Fdate', 'Tdate', 'PvWorld', 'Pools', 'PosCur', 'PosCur1', 'Weak', 'Oon', 'Exp', ),
        self::TYPE_CAMELNAME     => array('id', 'rcode', 'mcode', 'mpos', 'nameT', 'pv', 'share', 'percer', 'total', 'total1', 'total2', 'total3', 'total4', 'total5', 'total6', 'pershare', 'fdate', 'tdate', 'pvWorld', 'pools', 'posCur', 'posCur1', 'weak', 'oon', 'exp', ),
        self::TYPE_COLNAME       => array(AliEmTableMap::COL_ID, AliEmTableMap::COL_RCODE, AliEmTableMap::COL_MCODE, AliEmTableMap::COL_MPOS, AliEmTableMap::COL_NAME_T, AliEmTableMap::COL_PV, AliEmTableMap::COL_SHARE, AliEmTableMap::COL_PERCER, AliEmTableMap::COL_TOTAL, AliEmTableMap::COL_TOTAL1, AliEmTableMap::COL_TOTAL2, AliEmTableMap::COL_TOTAL3, AliEmTableMap::COL_TOTAL4, AliEmTableMap::COL_TOTAL5, AliEmTableMap::COL_TOTAL6, AliEmTableMap::COL_PERSHARE, AliEmTableMap::COL_FDATE, AliEmTableMap::COL_TDATE, AliEmTableMap::COL_PV_WORLD, AliEmTableMap::COL_POOLS, AliEmTableMap::COL_POS_CUR, AliEmTableMap::COL_POS_CUR1, AliEmTableMap::COL_WEAK, AliEmTableMap::COL_OON, AliEmTableMap::COL_EXP, ),
        self::TYPE_FIELDNAME     => array('id', 'rcode', 'mcode', 'mpos', 'name_t', 'pv', 'share', 'percer', 'total', 'total1', 'total2', 'total3', 'total4', 'total5', 'total6', 'pershare', 'fdate', 'tdate', 'pv_world', 'pools', 'pos_cur', 'pos_cur1', 'weak', 'oon', 'exp', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Rcode' => 1, 'Mcode' => 2, 'Mpos' => 3, 'NameT' => 4, 'Pv' => 5, 'Share' => 6, 'Percer' => 7, 'Total' => 8, 'Total1' => 9, 'Total2' => 10, 'Total3' => 11, 'Total4' => 12, 'Total5' => 13, 'Total6' => 14, 'Pershare' => 15, 'Fdate' => 16, 'Tdate' => 17, 'PvWorld' => 18, 'Pools' => 19, 'PosCur' => 20, 'PosCur1' => 21, 'Weak' => 22, 'Oon' => 23, 'Exp' => 24, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'rcode' => 1, 'mcode' => 2, 'mpos' => 3, 'nameT' => 4, 'pv' => 5, 'share' => 6, 'percer' => 7, 'total' => 8, 'total1' => 9, 'total2' => 10, 'total3' => 11, 'total4' => 12, 'total5' => 13, 'total6' => 14, 'pershare' => 15, 'fdate' => 16, 'tdate' => 17, 'pvWorld' => 18, 'pools' => 19, 'posCur' => 20, 'posCur1' => 21, 'weak' => 22, 'oon' => 23, 'exp' => 24, ),
        self::TYPE_COLNAME       => array(AliEmTableMap::COL_ID => 0, AliEmTableMap::COL_RCODE => 1, AliEmTableMap::COL_MCODE => 2, AliEmTableMap::COL_MPOS => 3, AliEmTableMap::COL_NAME_T => 4, AliEmTableMap::COL_PV => 5, AliEmTableMap::COL_SHARE => 6, AliEmTableMap::COL_PERCER => 7, AliEmTableMap::COL_TOTAL => 8, AliEmTableMap::COL_TOTAL1 => 9, AliEmTableMap::COL_TOTAL2 => 10, AliEmTableMap::COL_TOTAL3 => 11, AliEmTableMap::COL_TOTAL4 => 12, AliEmTableMap::COL_TOTAL5 => 13, AliEmTableMap::COL_TOTAL6 => 14, AliEmTableMap::COL_PERSHARE => 15, AliEmTableMap::COL_FDATE => 16, AliEmTableMap::COL_TDATE => 17, AliEmTableMap::COL_PV_WORLD => 18, AliEmTableMap::COL_POOLS => 19, AliEmTableMap::COL_POS_CUR => 20, AliEmTableMap::COL_POS_CUR1 => 21, AliEmTableMap::COL_WEAK => 22, AliEmTableMap::COL_OON => 23, AliEmTableMap::COL_EXP => 24, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'rcode' => 1, 'mcode' => 2, 'mpos' => 3, 'name_t' => 4, 'pv' => 5, 'share' => 6, 'percer' => 7, 'total' => 8, 'total1' => 9, 'total2' => 10, 'total3' => 11, 'total4' => 12, 'total5' => 13, 'total6' => 14, 'pershare' => 15, 'fdate' => 16, 'tdate' => 17, 'pv_world' => 18, 'pools' => 19, 'pos_cur' => 20, 'pos_cur1' => 21, 'weak' => 22, 'oon' => 23, 'exp' => 24, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
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
        $this->setName('ali_em');
        $this->setPhpName('AliEm');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliEm');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('mpos', 'Mpos', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', true, 15, null);
        $this->addColumn('share', 'Share', 'INTEGER', true, null, null);
        $this->addColumn('percer', 'Percer', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('total1', 'Total1', 'DECIMAL', true, 15, null);
        $this->addColumn('total2', 'Total2', 'DECIMAL', true, 15, null);
        $this->addColumn('total3', 'Total3', 'DECIMAL', true, 15, null);
        $this->addColumn('total4', 'Total4', 'DECIMAL', true, 15, null);
        $this->addColumn('total5', 'Total5', 'DECIMAL', true, 15, null);
        $this->addColumn('total6', 'Total6', 'DECIMAL', true, 15, null);
        $this->addColumn('pershare', 'Pershare', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pv_world', 'PvWorld', 'DECIMAL', true, 15, null);
        $this->addColumn('pools', 'Pools', 'INTEGER', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('pos_cur1', 'PosCur1', 'VARCHAR', true, 255, null);
        $this->addColumn('weak', 'Weak', 'DECIMAL', true, 15, null);
        $this->addColumn('oon', 'Oon', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliEmTableMap::CLASS_DEFAULT : AliEmTableMap::OM_CLASS;
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
     * @return array           (AliEm object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliEmTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliEmTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliEmTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliEmTableMap::OM_CLASS;
            /** @var AliEm $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliEmTableMap::addInstanceToPool($obj, $key);
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
            $key = AliEmTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliEmTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliEm $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliEmTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliEmTableMap::COL_ID);
            $criteria->addSelectColumn(AliEmTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliEmTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliEmTableMap::COL_MPOS);
            $criteria->addSelectColumn(AliEmTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliEmTableMap::COL_PV);
            $criteria->addSelectColumn(AliEmTableMap::COL_SHARE);
            $criteria->addSelectColumn(AliEmTableMap::COL_PERCER);
            $criteria->addSelectColumn(AliEmTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliEmTableMap::COL_TOTAL1);
            $criteria->addSelectColumn(AliEmTableMap::COL_TOTAL2);
            $criteria->addSelectColumn(AliEmTableMap::COL_TOTAL3);
            $criteria->addSelectColumn(AliEmTableMap::COL_TOTAL4);
            $criteria->addSelectColumn(AliEmTableMap::COL_TOTAL5);
            $criteria->addSelectColumn(AliEmTableMap::COL_TOTAL6);
            $criteria->addSelectColumn(AliEmTableMap::COL_PERSHARE);
            $criteria->addSelectColumn(AliEmTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliEmTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliEmTableMap::COL_PV_WORLD);
            $criteria->addSelectColumn(AliEmTableMap::COL_POOLS);
            $criteria->addSelectColumn(AliEmTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliEmTableMap::COL_POS_CUR1);
            $criteria->addSelectColumn(AliEmTableMap::COL_WEAK);
            $criteria->addSelectColumn(AliEmTableMap::COL_OON);
            $criteria->addSelectColumn(AliEmTableMap::COL_EXP);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.mpos');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.share');
            $criteria->addSelectColumn($alias . '.percer');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.total1');
            $criteria->addSelectColumn($alias . '.total2');
            $criteria->addSelectColumn($alias . '.total3');
            $criteria->addSelectColumn($alias . '.total4');
            $criteria->addSelectColumn($alias . '.total5');
            $criteria->addSelectColumn($alias . '.total6');
            $criteria->addSelectColumn($alias . '.pershare');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pv_world');
            $criteria->addSelectColumn($alias . '.pools');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.pos_cur1');
            $criteria->addSelectColumn($alias . '.weak');
            $criteria->addSelectColumn($alias . '.oon');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliEmTableMap::DATABASE_NAME)->getTable(AliEmTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliEmTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliEmTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliEmTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliEm or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliEm object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEmTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliEm) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliEmTableMap::DATABASE_NAME);
            $criteria->add(AliEmTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliEmQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliEmTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliEmTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_em table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliEmQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliEm or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliEm object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEmTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliEm object
        }

        if ($criteria->containsKey(AliEmTableMap::COL_ID) && $criteria->keyContainsValue(AliEmTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliEmTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliEmQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliEmTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliEmTableMap::buildTableMap();
