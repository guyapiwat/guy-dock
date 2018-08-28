<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliFc;
use CciOrm\CciOrm\AliFcQuery;
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
 * This class defines the structure of the 'ali_fc' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliFcTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliFcTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_fc';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliFc';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliFc';

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
     * the column name for the aid field
     */
    const COL_AID = 'ali_fc.aid';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_fc.rcode';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_fc.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_fc.name_t';

    /**
     * the column name for the mposi field
     */
    const COL_MPOSI = 'ali_fc.mposi';

    /**
     * the column name for the upa_code field
     */
    const COL_UPA_CODE = 'ali_fc.upa_code';

    /**
     * the column name for the upa_name field
     */
    const COL_UPA_NAME = 'ali_fc.upa_name';

    /**
     * the column name for the bposi field
     */
    const COL_BPOSI = 'ali_fc.bposi';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'ali_fc.level';

    /**
     * the column name for the gen field
     */
    const COL_GEN = 'ali_fc.gen';

    /**
     * the column name for the btype field
     */
    const COL_BTYPE = 'ali_fc.btype';

    /**
     * the column name for the pv field
     */
    const COL_PV = 'ali_fc.pv';

    /**
     * the column name for the percer field
     */
    const COL_PERCER = 'ali_fc.percer';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_fc.total';

    /**
     * the column name for the total_r field
     */
    const COL_TOTAL_R = 'ali_fc.total_r';

    /**
     * the column name for the ctax field
     */
    const COL_CTAX = 'ali_fc.ctax';

    /**
     * the column name for the cvat field
     */
    const COL_CVAT = 'ali_fc.cvat';

    /**
     * the column name for the amt field
     */
    const COL_AMT = 'ali_fc.amt';

    /**
     * the column name for the oon field
     */
    const COL_OON = 'ali_fc.oon';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_fc.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_fc.tdate';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_fc.pos_cur';

    /**
     * the column name for the crate field
     */
    const COL_CRATE = 'ali_fc.crate';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_fc.locationbase';

    /**
     * the column name for the sano field
     */
    const COL_SANO = 'ali_fc.sano';

    /**
     * the column name for the pcode field
     */
    const COL_PCODE = 'ali_fc.pcode';

    /**
     * the column name for the qty field
     */
    const COL_QTY = 'ali_fc.qty';

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
        self::TYPE_PHPNAME       => array('Aid', 'Rcode', 'Mcode', 'NameT', 'Mposi', 'UpaCode', 'UpaName', 'Bposi', 'Level', 'Gen', 'Btype', 'Pv', 'Percer', 'Total', 'TotalR', 'Ctax', 'Cvat', 'Amt', 'Oon', 'Fdate', 'Tdate', 'PosCur', 'Crate', 'Locationbase', 'Sano', 'Pcode', 'Qty', ),
        self::TYPE_CAMELNAME     => array('aid', 'rcode', 'mcode', 'nameT', 'mposi', 'upaCode', 'upaName', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', 'totalR', 'ctax', 'cvat', 'amt', 'oon', 'fdate', 'tdate', 'posCur', 'crate', 'locationbase', 'sano', 'pcode', 'qty', ),
        self::TYPE_COLNAME       => array(AliFcTableMap::COL_AID, AliFcTableMap::COL_RCODE, AliFcTableMap::COL_MCODE, AliFcTableMap::COL_NAME_T, AliFcTableMap::COL_MPOSI, AliFcTableMap::COL_UPA_CODE, AliFcTableMap::COL_UPA_NAME, AliFcTableMap::COL_BPOSI, AliFcTableMap::COL_LEVEL, AliFcTableMap::COL_GEN, AliFcTableMap::COL_BTYPE, AliFcTableMap::COL_PV, AliFcTableMap::COL_PERCER, AliFcTableMap::COL_TOTAL, AliFcTableMap::COL_TOTAL_R, AliFcTableMap::COL_CTAX, AliFcTableMap::COL_CVAT, AliFcTableMap::COL_AMT, AliFcTableMap::COL_OON, AliFcTableMap::COL_FDATE, AliFcTableMap::COL_TDATE, AliFcTableMap::COL_POS_CUR, AliFcTableMap::COL_CRATE, AliFcTableMap::COL_LOCATIONBASE, AliFcTableMap::COL_SANO, AliFcTableMap::COL_PCODE, AliFcTableMap::COL_QTY, ),
        self::TYPE_FIELDNAME     => array('aid', 'rcode', 'mcode', 'name_t', 'mposi', 'upa_code', 'upa_name', 'bposi', 'level', 'gen', 'btype', 'pv', 'percer', 'total', 'total_r', 'ctax', 'cvat', 'amt', 'oon', 'fdate', 'tdate', 'pos_cur', 'crate', 'locationbase', 'sano', 'pcode', 'qty', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Aid' => 0, 'Rcode' => 1, 'Mcode' => 2, 'NameT' => 3, 'Mposi' => 4, 'UpaCode' => 5, 'UpaName' => 6, 'Bposi' => 7, 'Level' => 8, 'Gen' => 9, 'Btype' => 10, 'Pv' => 11, 'Percer' => 12, 'Total' => 13, 'TotalR' => 14, 'Ctax' => 15, 'Cvat' => 16, 'Amt' => 17, 'Oon' => 18, 'Fdate' => 19, 'Tdate' => 20, 'PosCur' => 21, 'Crate' => 22, 'Locationbase' => 23, 'Sano' => 24, 'Pcode' => 25, 'Qty' => 26, ),
        self::TYPE_CAMELNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'nameT' => 3, 'mposi' => 4, 'upaCode' => 5, 'upaName' => 6, 'bposi' => 7, 'level' => 8, 'gen' => 9, 'btype' => 10, 'pv' => 11, 'percer' => 12, 'total' => 13, 'totalR' => 14, 'ctax' => 15, 'cvat' => 16, 'amt' => 17, 'oon' => 18, 'fdate' => 19, 'tdate' => 20, 'posCur' => 21, 'crate' => 22, 'locationbase' => 23, 'sano' => 24, 'pcode' => 25, 'qty' => 26, ),
        self::TYPE_COLNAME       => array(AliFcTableMap::COL_AID => 0, AliFcTableMap::COL_RCODE => 1, AliFcTableMap::COL_MCODE => 2, AliFcTableMap::COL_NAME_T => 3, AliFcTableMap::COL_MPOSI => 4, AliFcTableMap::COL_UPA_CODE => 5, AliFcTableMap::COL_UPA_NAME => 6, AliFcTableMap::COL_BPOSI => 7, AliFcTableMap::COL_LEVEL => 8, AliFcTableMap::COL_GEN => 9, AliFcTableMap::COL_BTYPE => 10, AliFcTableMap::COL_PV => 11, AliFcTableMap::COL_PERCER => 12, AliFcTableMap::COL_TOTAL => 13, AliFcTableMap::COL_TOTAL_R => 14, AliFcTableMap::COL_CTAX => 15, AliFcTableMap::COL_CVAT => 16, AliFcTableMap::COL_AMT => 17, AliFcTableMap::COL_OON => 18, AliFcTableMap::COL_FDATE => 19, AliFcTableMap::COL_TDATE => 20, AliFcTableMap::COL_POS_CUR => 21, AliFcTableMap::COL_CRATE => 22, AliFcTableMap::COL_LOCATIONBASE => 23, AliFcTableMap::COL_SANO => 24, AliFcTableMap::COL_PCODE => 25, AliFcTableMap::COL_QTY => 26, ),
        self::TYPE_FIELDNAME     => array('aid' => 0, 'rcode' => 1, 'mcode' => 2, 'name_t' => 3, 'mposi' => 4, 'upa_code' => 5, 'upa_name' => 6, 'bposi' => 7, 'level' => 8, 'gen' => 9, 'btype' => 10, 'pv' => 11, 'percer' => 12, 'total' => 13, 'total_r' => 14, 'ctax' => 15, 'cvat' => 16, 'amt' => 17, 'oon' => 18, 'fdate' => 19, 'tdate' => 20, 'pos_cur' => 21, 'crate' => 22, 'locationbase' => 23, 'sano' => 24, 'pcode' => 25, 'qty' => 26, ),
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
        $this->setName('ali_fc');
        $this->setPhpName('AliFc');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliFc');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('aid', 'Aid', 'INTEGER', true, null, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, 5, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('mposi', 'Mposi', 'VARCHAR', false, 10, null);
        $this->addColumn('upa_code', 'UpaCode', 'VARCHAR', false, 255, null);
        $this->addColumn('upa_name', 'UpaName', 'VARCHAR', true, 255, null);
        $this->addColumn('bposi', 'Bposi', 'VARCHAR', false, 10, null);
        $this->addColumn('level', 'Level', 'DECIMAL', true, 15, null);
        $this->addColumn('gen', 'Gen', 'DECIMAL', true, 15, null);
        $this->addColumn('btype', 'Btype', 'VARCHAR', false, 10, null);
        $this->addColumn('pv', 'Pv', 'DECIMAL', true, 15, null);
        $this->addColumn('percer', 'Percer', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('total_r', 'TotalR', 'DECIMAL', true, 15, null);
        $this->addColumn('ctax', 'Ctax', 'DECIMAL', true, 15, null);
        $this->addColumn('cvat', 'Cvat', 'DECIMAL', true, 15, null);
        $this->addColumn('amt', 'Amt', 'DECIMAL', true, 15, null);
        $this->addColumn('oon', 'Oon', 'DECIMAL', true, 15, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('crate', 'Crate', 'INTEGER', true, null, null);
        $this->addColumn('locationbase', 'Locationbase', 'INTEGER', true, null, null);
        $this->addColumn('sano', 'Sano', 'VARCHAR', true, 255, null);
        $this->addColumn('pcode', 'Pcode', 'VARCHAR', true, 255, null);
        $this->addColumn('qty', 'Qty', 'INTEGER', true, null, null);
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
        return $withPrefix ? AliFcTableMap::CLASS_DEFAULT : AliFcTableMap::OM_CLASS;
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
     * @return array           (AliFc object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliFcTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliFcTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliFcTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliFcTableMap::OM_CLASS;
            /** @var AliFc $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliFcTableMap::addInstanceToPool($obj, $key);
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
            $key = AliFcTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliFcTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliFc $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliFcTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliFcTableMap::COL_AID);
            $criteria->addSelectColumn(AliFcTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliFcTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliFcTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliFcTableMap::COL_MPOSI);
            $criteria->addSelectColumn(AliFcTableMap::COL_UPA_CODE);
            $criteria->addSelectColumn(AliFcTableMap::COL_UPA_NAME);
            $criteria->addSelectColumn(AliFcTableMap::COL_BPOSI);
            $criteria->addSelectColumn(AliFcTableMap::COL_LEVEL);
            $criteria->addSelectColumn(AliFcTableMap::COL_GEN);
            $criteria->addSelectColumn(AliFcTableMap::COL_BTYPE);
            $criteria->addSelectColumn(AliFcTableMap::COL_PV);
            $criteria->addSelectColumn(AliFcTableMap::COL_PERCER);
            $criteria->addSelectColumn(AliFcTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliFcTableMap::COL_TOTAL_R);
            $criteria->addSelectColumn(AliFcTableMap::COL_CTAX);
            $criteria->addSelectColumn(AliFcTableMap::COL_CVAT);
            $criteria->addSelectColumn(AliFcTableMap::COL_AMT);
            $criteria->addSelectColumn(AliFcTableMap::COL_OON);
            $criteria->addSelectColumn(AliFcTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliFcTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliFcTableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliFcTableMap::COL_CRATE);
            $criteria->addSelectColumn(AliFcTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliFcTableMap::COL_SANO);
            $criteria->addSelectColumn(AliFcTableMap::COL_PCODE);
            $criteria->addSelectColumn(AliFcTableMap::COL_QTY);
        } else {
            $criteria->addSelectColumn($alias . '.aid');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.mposi');
            $criteria->addSelectColumn($alias . '.upa_code');
            $criteria->addSelectColumn($alias . '.upa_name');
            $criteria->addSelectColumn($alias . '.bposi');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.gen');
            $criteria->addSelectColumn($alias . '.btype');
            $criteria->addSelectColumn($alias . '.pv');
            $criteria->addSelectColumn($alias . '.percer');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.total_r');
            $criteria->addSelectColumn($alias . '.ctax');
            $criteria->addSelectColumn($alias . '.cvat');
            $criteria->addSelectColumn($alias . '.amt');
            $criteria->addSelectColumn($alias . '.oon');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.crate');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.sano');
            $criteria->addSelectColumn($alias . '.pcode');
            $criteria->addSelectColumn($alias . '.qty');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliFcTableMap::DATABASE_NAME)->getTable(AliFcTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliFcTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliFcTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliFcTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliFc or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliFc object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliFcTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliFc) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliFcTableMap::DATABASE_NAME);
            $criteria->add(AliFcTableMap::COL_AID, (array) $values, Criteria::IN);
        }

        $query = AliFcQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliFcTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliFcTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_fc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliFcQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliFc or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliFc object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliFcTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliFc object
        }

        if ($criteria->containsKey(AliFcTableMap::COL_AID) && $criteria->keyContainsValue(AliFcTableMap::COL_AID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliFcTableMap::COL_AID.')');
        }


        // Set the correct dbName
        $query = AliFcQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliFcTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliFcTableMap::buildTableMap();
