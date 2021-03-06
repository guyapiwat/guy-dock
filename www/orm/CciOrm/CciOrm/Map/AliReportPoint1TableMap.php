<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliReportPoint1;
use CciOrm\CciOrm\AliReportPoint1Query;
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
 * This class defines the structure of the 'ali_report_point1' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliReportPoint1TableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliReportPoint1TableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_report_point1';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliReportPoint1';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliReportPoint1';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the mcode field
     */
    const COL_MCODE = 'ali_report_point1.mcode';

    /**
     * the column name for the name_t field
     */
    const COL_NAME_T = 'ali_report_point1.name_t';

    /**
     * the column name for the point field
     */
    const COL_POINT = 'ali_report_point1.point';

    /**
     * the column name for the monthpv field
     */
    const COL_MONTHPV = 'ali_report_point1.monthpv';

    /**
     * the column name for the carry_l field
     */
    const COL_CARRY_L = 'ali_report_point1.carry_l';

    /**
     * the column name for the carry_c field
     */
    const COL_CARRY_C = 'ali_report_point1.carry_c';

    /**
     * the column name for the ro_l field
     */
    const COL_RO_L = 'ali_report_point1.ro_l';

    /**
     * the column name for the ro_c field
     */
    const COL_RO_C = 'ali_report_point1.ro_c';

    /**
     * the column name for the all_l field
     */
    const COL_ALL_L = 'ali_report_point1.all_l';

    /**
     * the column name for the all_c field
     */
    const COL_ALL_C = 'ali_report_point1.all_c';

    /**
     * the column name for the allpv field
     */
    const COL_ALLPV = 'ali_report_point1.allpv';

    /**
     * the column name for the pos_cur field
     */
    const COL_POS_CUR = 'ali_report_point1.pos_cur';

    /**
     * the column name for the new_sponsor field
     */
    const COL_NEW_SPONSOR = 'ali_report_point1.new_sponsor';

    /**
     * the column name for the new_sup field
     */
    const COL_NEW_SUP = 'ali_report_point1.new_sup';

    /**
     * the column name for the new_ex field
     */
    const COL_NEW_EX = 'ali_report_point1.new_ex';

    /**
     * the column name for the sup_ex field
     */
    const COL_SUP_EX = 'ali_report_point1.sup_ex';

    /**
     * the column name for the travelpoint field
     */
    const COL_TRAVELPOINT = 'ali_report_point1.travelpoint';

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
        self::TYPE_PHPNAME       => array('Mcode', 'NameT', 'Point', 'Monthpv', 'CarryL', 'CarryC', 'RoL', 'RoC', 'AllL', 'AllC', 'Allpv', 'PosCur', 'NewSponsor', 'NewSup', 'NewEx', 'SupEx', 'Travelpoint', ),
        self::TYPE_CAMELNAME     => array('mcode', 'nameT', 'point', 'monthpv', 'carryL', 'carryC', 'roL', 'roC', 'allL', 'allC', 'allpv', 'posCur', 'newSponsor', 'newSup', 'newEx', 'supEx', 'travelpoint', ),
        self::TYPE_COLNAME       => array(AliReportPoint1TableMap::COL_MCODE, AliReportPoint1TableMap::COL_NAME_T, AliReportPoint1TableMap::COL_POINT, AliReportPoint1TableMap::COL_MONTHPV, AliReportPoint1TableMap::COL_CARRY_L, AliReportPoint1TableMap::COL_CARRY_C, AliReportPoint1TableMap::COL_RO_L, AliReportPoint1TableMap::COL_RO_C, AliReportPoint1TableMap::COL_ALL_L, AliReportPoint1TableMap::COL_ALL_C, AliReportPoint1TableMap::COL_ALLPV, AliReportPoint1TableMap::COL_POS_CUR, AliReportPoint1TableMap::COL_NEW_SPONSOR, AliReportPoint1TableMap::COL_NEW_SUP, AliReportPoint1TableMap::COL_NEW_EX, AliReportPoint1TableMap::COL_SUP_EX, AliReportPoint1TableMap::COL_TRAVELPOINT, ),
        self::TYPE_FIELDNAME     => array('mcode', 'name_t', 'point', 'monthpv', 'carry_l', 'carry_c', 'ro_l', 'ro_c', 'all_l', 'all_c', 'allpv', 'pos_cur', 'new_sponsor', 'new_sup', 'new_ex', 'sup_ex', 'travelpoint', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Mcode' => 0, 'NameT' => 1, 'Point' => 2, 'Monthpv' => 3, 'CarryL' => 4, 'CarryC' => 5, 'RoL' => 6, 'RoC' => 7, 'AllL' => 8, 'AllC' => 9, 'Allpv' => 10, 'PosCur' => 11, 'NewSponsor' => 12, 'NewSup' => 13, 'NewEx' => 14, 'SupEx' => 15, 'Travelpoint' => 16, ),
        self::TYPE_CAMELNAME     => array('mcode' => 0, 'nameT' => 1, 'point' => 2, 'monthpv' => 3, 'carryL' => 4, 'carryC' => 5, 'roL' => 6, 'roC' => 7, 'allL' => 8, 'allC' => 9, 'allpv' => 10, 'posCur' => 11, 'newSponsor' => 12, 'newSup' => 13, 'newEx' => 14, 'supEx' => 15, 'travelpoint' => 16, ),
        self::TYPE_COLNAME       => array(AliReportPoint1TableMap::COL_MCODE => 0, AliReportPoint1TableMap::COL_NAME_T => 1, AliReportPoint1TableMap::COL_POINT => 2, AliReportPoint1TableMap::COL_MONTHPV => 3, AliReportPoint1TableMap::COL_CARRY_L => 4, AliReportPoint1TableMap::COL_CARRY_C => 5, AliReportPoint1TableMap::COL_RO_L => 6, AliReportPoint1TableMap::COL_RO_C => 7, AliReportPoint1TableMap::COL_ALL_L => 8, AliReportPoint1TableMap::COL_ALL_C => 9, AliReportPoint1TableMap::COL_ALLPV => 10, AliReportPoint1TableMap::COL_POS_CUR => 11, AliReportPoint1TableMap::COL_NEW_SPONSOR => 12, AliReportPoint1TableMap::COL_NEW_SUP => 13, AliReportPoint1TableMap::COL_NEW_EX => 14, AliReportPoint1TableMap::COL_SUP_EX => 15, AliReportPoint1TableMap::COL_TRAVELPOINT => 16, ),
        self::TYPE_FIELDNAME     => array('mcode' => 0, 'name_t' => 1, 'point' => 2, 'monthpv' => 3, 'carry_l' => 4, 'carry_c' => 5, 'ro_l' => 6, 'ro_c' => 7, 'all_l' => 8, 'all_c' => 9, 'allpv' => 10, 'pos_cur' => 11, 'new_sponsor' => 12, 'new_sup' => 13, 'new_ex' => 14, 'sup_ex' => 15, 'travelpoint' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('ali_report_point1');
        $this->setPhpName('AliReportPoint1');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliReportPoint1');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('mcode', 'Mcode', 'VARCHAR', true, 255, null);
        $this->addColumn('name_t', 'NameT', 'VARCHAR', true, 255, null);
        $this->addColumn('point', 'Point', 'INTEGER', true, null, null);
        $this->addColumn('monthpv', 'Monthpv', 'VARCHAR', true, 255, null);
        $this->addColumn('carry_l', 'CarryL', 'INTEGER', true, null, null);
        $this->addColumn('carry_c', 'CarryC', 'INTEGER', true, null, null);
        $this->addColumn('ro_l', 'RoL', 'INTEGER', true, null, null);
        $this->addColumn('ro_c', 'RoC', 'INTEGER', true, null, null);
        $this->addColumn('all_l', 'AllL', 'INTEGER', true, null, null);
        $this->addColumn('all_c', 'AllC', 'INTEGER', true, null, null);
        $this->addColumn('allpv', 'Allpv', 'INTEGER', true, null, null);
        $this->addColumn('pos_cur', 'PosCur', 'VARCHAR', true, 255, null);
        $this->addColumn('new_sponsor', 'NewSponsor', 'INTEGER', true, null, null);
        $this->addColumn('new_sup', 'NewSup', 'INTEGER', true, null, null);
        $this->addColumn('new_ex', 'NewEx', 'INTEGER', true, null, null);
        $this->addColumn('sup_ex', 'SupEx', 'INTEGER', true, null, null);
        $this->addColumn('travelpoint', 'Travelpoint', 'DECIMAL', true, 15, null);
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
        return $withPrefix ? AliReportPoint1TableMap::CLASS_DEFAULT : AliReportPoint1TableMap::OM_CLASS;
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
     * @return array           (AliReportPoint1 object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliReportPoint1TableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliReportPoint1TableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliReportPoint1TableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliReportPoint1TableMap::OM_CLASS;
            /** @var AliReportPoint1 $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliReportPoint1TableMap::addInstanceToPool($obj, $key);
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
            $key = AliReportPoint1TableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliReportPoint1TableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliReportPoint1 $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliReportPoint1TableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_MCODE);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_NAME_T);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_POINT);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_MONTHPV);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_CARRY_L);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_CARRY_C);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_RO_L);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_RO_C);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_ALL_L);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_ALL_C);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_ALLPV);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_POS_CUR);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_NEW_SPONSOR);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_NEW_SUP);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_NEW_EX);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_SUP_EX);
            $criteria->addSelectColumn(AliReportPoint1TableMap::COL_TRAVELPOINT);
        } else {
            $criteria->addSelectColumn($alias . '.mcode');
            $criteria->addSelectColumn($alias . '.name_t');
            $criteria->addSelectColumn($alias . '.point');
            $criteria->addSelectColumn($alias . '.monthpv');
            $criteria->addSelectColumn($alias . '.carry_l');
            $criteria->addSelectColumn($alias . '.carry_c');
            $criteria->addSelectColumn($alias . '.ro_l');
            $criteria->addSelectColumn($alias . '.ro_c');
            $criteria->addSelectColumn($alias . '.all_l');
            $criteria->addSelectColumn($alias . '.all_c');
            $criteria->addSelectColumn($alias . '.allpv');
            $criteria->addSelectColumn($alias . '.pos_cur');
            $criteria->addSelectColumn($alias . '.new_sponsor');
            $criteria->addSelectColumn($alias . '.new_sup');
            $criteria->addSelectColumn($alias . '.new_ex');
            $criteria->addSelectColumn($alias . '.sup_ex');
            $criteria->addSelectColumn($alias . '.travelpoint');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliReportPoint1TableMap::DATABASE_NAME)->getTable(AliReportPoint1TableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliReportPoint1TableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliReportPoint1TableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliReportPoint1TableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliReportPoint1 or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliReportPoint1 object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPoint1TableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliReportPoint1) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The AliReportPoint1 object has no primary key');
        }

        $query = AliReportPoint1Query::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliReportPoint1TableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliReportPoint1TableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_report_point1 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliReportPoint1Query::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliReportPoint1 or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliReportPoint1 object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPoint1TableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliReportPoint1 object
        }


        // Set the correct dbName
        $query = AliReportPoint1Query::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliReportPoint1TableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliReportPoint1TableMap::buildTableMap();
