<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliCommission;
use CciOrm\CciOrm\AliCommissionQuery;
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
 * This class defines the structure of the 'ali_commission' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliCommissionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliCommissionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_commission';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliCommission';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliCommission';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 18;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 18;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ali_commission.id';

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_commission.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_commission.name_t';

    /**
     * the column name for the ambonus field
     */
    const COL_AMBONUS = 'ali_commission.ambonus';

    /**
     * the column name for the bmbonus field
     */
    const COL_BMBONUS = 'ali_commission.bmbonus';

    /**
     * the column name for the dmbonus field
     */
    const COL_DMBONUS = 'ali_commission.dmbonus';

    /**
     * the column name for the fmbonus field
     */
    const COL_FMBONUS = 'ali_commission.fmbonus';

    /**
     * the column name for the ato field
     */
    const COL_ATO = 'ali_commission.ato';

    /**
     * the column name for the ato1 field
     */
    const COL_ATO1 = 'ali_commission.ato1';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'ali_commission.total';

    /**
     * the column name for the rcode field
     */
    const COL_RCODE = 'ali_commission.rcode';

    /**
     * the column name for the fdate field
     */
    const COL_FDATE = 'ali_commission.fdate';

    /**
     * the column name for the tdate field
     */
    const COL_TDATE = 'ali_commission.tdate';

    /**
     * the column name for the pay field
     */
    const COL_PAY = 'ali_commission.pay';

    /**
     * the column name for the sano_ecom field
     */
    const COL_SANO_ECOM = 'ali_commission.sano_ecom';

    /**
     * the column name for the sano_ato field
     */
    const COL_SANO_ATO = 'ali_commission.sano_ato';

    /**
     * the column name for the sano_ewallet field
     */
    const COL_SANO_EWALLET = 'ali_commission.sano_ewallet';

    /**
     * the column name for the tax field
     */
    const COL_TAX = 'ali_commission.tax';

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
        self::TYPE_PHPNAME       => array('Id', 'Mcode', 'NameT', 'Ambonus', 'Bmbonus', 'Dmbonus', 'Fmbonus', 'Ato', 'Ato1', 'Total', 'Rcode', 'Fdate', 'Tdate', 'Pay', 'SanoEcom', 'SanoAto', 'SanoEwallet', 'Tax', ),
        self::TYPE_CAMELNAME     => array('id', 'mcode', 'nameT', 'ambonus', 'bmbonus', 'dmbonus', 'fmbonus', 'ato', 'ato1', 'total', 'rcode', 'fdate', 'tdate', 'pay', 'sanoEcom', 'sanoAto', 'sanoEwallet', 'tax', ),
        self::TYPE_COLNAME       => array(AliCommissionTableMap::COL_ID, AliCommissionTableMap::COL_MCODE, AliCommissionTableMap::COL_NAME_T, AliCommissionTableMap::COL_AMBONUS, AliCommissionTableMap::COL_BMBONUS, AliCommissionTableMap::COL_DMBONUS, AliCommissionTableMap::COL_FMBONUS, AliCommissionTableMap::COL_ATO, AliCommissionTableMap::COL_ATO1, AliCommissionTableMap::COL_TOTAL, AliCommissionTableMap::COL_RCODE, AliCommissionTableMap::COL_FDATE, AliCommissionTableMap::COL_TDATE, AliCommissionTableMap::COL_PAY, AliCommissionTableMap::COL_SANO_ECOM, AliCommissionTableMap::COL_SANO_ATO, AliCommissionTableMap::COL_SANO_EWALLET, AliCommissionTableMap::COL_TAX, ),
        self::TYPE_FIELDNAME     => array('id', 'mcode', 'name_t', 'ambonus', 'bmbonus', 'dmbonus', 'fmbonus', 'ato', 'ato1', 'total', 'rcode', 'fdate', 'tdate', 'pay', 'sano_ecom', 'sano_ato', 'sano_ewallet', 'tax', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mcode' => 1, 'NameT' => 2, 'Ambonus' => 3, 'Bmbonus' => 4, 'Dmbonus' => 5, 'Fmbonus' => 6, 'Ato' => 7, 'Ato1' => 8, 'Total' => 9, 'Rcode' => 10, 'Fdate' => 11, 'Tdate' => 12, 'Pay' => 13, 'SanoEcom' => 14, 'SanoAto' => 15, 'SanoEwallet' => 16, 'Tax' => 17, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mcode' => 1, 'nameT' => 2, 'ambonus' => 3, 'bmbonus' => 4, 'dmbonus' => 5, 'fmbonus' => 6, 'ato' => 7, 'ato1' => 8, 'total' => 9, 'rcode' => 10, 'fdate' => 11, 'tdate' => 12, 'pay' => 13, 'sanoEcom' => 14, 'sanoAto' => 15, 'sanoEwallet' => 16, 'tax' => 17, ),
        self::TYPE_COLNAME       => array(AliCommissionTableMap::COL_ID => 0, AliCommissionTableMap::COL_MCODE => 1, AliCommissionTableMap::COL_NAME_T => 2, AliCommissionTableMap::COL_AMBONUS => 3, AliCommissionTableMap::COL_BMBONUS => 4, AliCommissionTableMap::COL_DMBONUS => 5, AliCommissionTableMap::COL_FMBONUS => 6, AliCommissionTableMap::COL_ATO => 7, AliCommissionTableMap::COL_ATO1 => 8, AliCommissionTableMap::COL_TOTAL => 9, AliCommissionTableMap::COL_RCODE => 10, AliCommissionTableMap::COL_FDATE => 11, AliCommissionTableMap::COL_TDATE => 12, AliCommissionTableMap::COL_PAY => 13, AliCommissionTableMap::COL_SANO_ECOM => 14, AliCommissionTableMap::COL_SANO_ATO => 15, AliCommissionTableMap::COL_SANO_EWALLET => 16, AliCommissionTableMap::COL_TAX => 17, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mcode' => 1, 'name_t' => 2, 'ambonus' => 3, 'bmbonus' => 4, 'dmbonus' => 5, 'fmbonus' => 6, 'ato' => 7, 'ato1' => 8, 'total' => 9, 'rcode' => 10, 'fdate' => 11, 'tdate' => 12, 'pay' => 13, 'sano_ecom' => 14, 'sano_ato' => 15, 'sano_ewallet' => 16, 'tax' => 17, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $this->setName('ali_commission');
        $this->setPhpName('AliCommission');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliCommission');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('ambonus', 'Ambonus', 'DECIMAL', true, 15, null);
        $this->addColumn('bmbonus', 'Bmbonus', 'DECIMAL', true, 15, null);
        $this->addColumn('dmbonus', 'Dmbonus', 'DECIMAL', true, 15, null);
        $this->addColumn('fmbonus', 'Fmbonus', 'DECIMAL', true, 15, null);
        $this->addColumn('ato', 'Ato', 'DECIMAL', true, 15, null);
        $this->addColumn('ato1', 'Ato1', 'DECIMAL', true, 15, null);
        $this->addColumn('total', 'Total', 'DECIMAL', true, 15, null);
        $this->addColumn('rcode', 'Rcode', 'INTEGER', true, null, null);
        $this->addColumn('fdate', 'Fdate', 'DATE', true, null, null);
        $this->addColumn('tdate', 'Tdate', 'DATE', true, null, null);
        $this->addColumn('pay', 'Pay', 'INTEGER', true, 1, null);
        $this->addColumn('sano_ecom', 'SanoEcom', 'VARCHAR', true, 255, null);
        $this->addColumn('sano_ato', 'SanoAto', 'VARCHAR', true, 255, null);
        $this->addColumn('sano_ewallet', 'SanoEwallet', 'VARCHAR', true, 255, null);
        $this->addColumn('tax', 'Tax', 'DECIMAL', true, 15, null);
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
        return $withPrefix ? AliCommissionTableMap::CLASS_DEFAULT : AliCommissionTableMap::OM_CLASS;
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
     * @return array           (AliCommission object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliCommissionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliCommissionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliCommissionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliCommissionTableMap::OM_CLASS;
            /** @var AliCommission $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliCommissionTableMap::addInstanceToPool($obj, $key);
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
            $key = AliCommissionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliCommissionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliCommission $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliCommissionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliCommissionTableMap::COL_ID);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_MCODE);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_AMBONUS);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_BMBONUS);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_DMBONUS);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_FMBONUS);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_ATO);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_ATO1);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_TOTAL);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_RCODE);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_FDATE);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_TDATE);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_PAY);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_SANO_ECOM);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_SANO_ATO);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_SANO_EWALLET);
            $criteria->addSelectColumn(AliCommissionTableMap::COL_TAX);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.ambonus');
            $criteria->addSelectColumn($alias . '.bmbonus');
            $criteria->addSelectColumn($alias . '.dmbonus');
            $criteria->addSelectColumn($alias . '.fmbonus');
            $criteria->addSelectColumn($alias . '.ato');
            $criteria->addSelectColumn($alias . '.ato1');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.rcode');
            $criteria->addSelectColumn($alias . '.fdate');
            $criteria->addSelectColumn($alias . '.tdate');
            $criteria->addSelectColumn($alias . '.pay');
            $criteria->addSelectColumn($alias . '.sano_ecom');
            $criteria->addSelectColumn($alias . '.sano_ato');
            $criteria->addSelectColumn($alias . '.sano_ewallet');
            $criteria->addSelectColumn($alias . '.tax');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliCommissionTableMap::DATABASE_NAME)->getTable(AliCommissionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliCommissionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliCommissionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliCommissionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliCommission or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliCommission object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCommissionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliCommission) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliCommissionTableMap::DATABASE_NAME);
            $criteria->add(AliCommissionTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AliCommissionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliCommissionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliCommissionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_commission table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliCommissionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliCommission or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliCommission object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCommissionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliCommission object
        }

        if ($criteria->containsKey(AliCommissionTableMap::COL_ID) && $criteria->keyContainsValue(AliCommissionTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliCommissionTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AliCommissionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliCommissionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliCommissionTableMap::buildTableMap();
