<?php

namespace CciOrm\CciOrm\Map;

use CciOrm\CciOrm\AliTax;
use CciOrm\CciOrm\AliTaxQuery;
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
 * This class defines the structure of the 'ali_tax' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AliTaxTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CciOrm.CciOrm.Map.AliTaxTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ali_tax';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CciOrm\\CciOrm\\AliTax';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CciOrm.CciOrm.AliTax';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the cid field
     */
    const COL_CID = 'ali_tax.cid';

    /**
     * the column name for the locationbase field
     */
    const COL_LOCATIONBASE = 'ali_tax.locationbase';

    /**
     * the column name for the minaccamount field
     */
    const COL_MINACCAMOUNT = 'ali_tax.minaccamount';

    /**
     * the column name for the maxaccamount field
     */
    const COL_MAXACCAMOUNT = 'ali_tax.maxaccamount';

    /**
     * the column name for the vatlocal field
     */
    const COL_VATLOCAL = 'ali_tax.vatlocal';

    /**
     * the column name for the vatforeign field
     */
    const COL_VATFOREIGN = 'ali_tax.vatforeign';

    /**
     * the column name for the taxlocal field
     */
    const COL_TAXLOCAL = 'ali_tax.taxlocal';

    /**
     * the column name for the taxforeign field
     */
    const COL_TAXFOREIGN = 'ali_tax.taxforeign';

    /**
     * the column name for the mtype field
     */
    const COL_MTYPE = 'ali_tax.mtype';

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
        self::TYPE_PHPNAME       => array('Cid', 'Locationbase', 'Minaccamount', 'Maxaccamount', 'Vatlocal', 'Vatforeign', 'Taxlocal', 'Taxforeign', 'Mtype', ),
        self::TYPE_CAMELNAME     => array('cid', 'locationbase', 'minaccamount', 'maxaccamount', 'vatlocal', 'vatforeign', 'taxlocal', 'taxforeign', 'mtype', ),
        self::TYPE_COLNAME       => array(AliTaxTableMap::COL_CID, AliTaxTableMap::COL_LOCATIONBASE, AliTaxTableMap::COL_MINACCAMOUNT, AliTaxTableMap::COL_MAXACCAMOUNT, AliTaxTableMap::COL_VATLOCAL, AliTaxTableMap::COL_VATFOREIGN, AliTaxTableMap::COL_TAXLOCAL, AliTaxTableMap::COL_TAXFOREIGN, AliTaxTableMap::COL_MTYPE, ),
        self::TYPE_FIELDNAME     => array('cid', 'locationbase', 'minaccamount', 'maxaccamount', 'vatlocal', 'vatforeign', 'taxlocal', 'taxforeign', 'mtype', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Cid' => 0, 'Locationbase' => 1, 'Minaccamount' => 2, 'Maxaccamount' => 3, 'Vatlocal' => 4, 'Vatforeign' => 5, 'Taxlocal' => 6, 'Taxforeign' => 7, 'Mtype' => 8, ),
        self::TYPE_CAMELNAME     => array('cid' => 0, 'locationbase' => 1, 'minaccamount' => 2, 'maxaccamount' => 3, 'vatlocal' => 4, 'vatforeign' => 5, 'taxlocal' => 6, 'taxforeign' => 7, 'mtype' => 8, ),
        self::TYPE_COLNAME       => array(AliTaxTableMap::COL_CID => 0, AliTaxTableMap::COL_LOCATIONBASE => 1, AliTaxTableMap::COL_MINACCAMOUNT => 2, AliTaxTableMap::COL_MAXACCAMOUNT => 3, AliTaxTableMap::COL_VATLOCAL => 4, AliTaxTableMap::COL_VATFOREIGN => 5, AliTaxTableMap::COL_TAXLOCAL => 6, AliTaxTableMap::COL_TAXFOREIGN => 7, AliTaxTableMap::COL_MTYPE => 8, ),
        self::TYPE_FIELDNAME     => array('cid' => 0, 'locationbase' => 1, 'minaccamount' => 2, 'maxaccamount' => 3, 'vatlocal' => 4, 'vatforeign' => 5, 'taxlocal' => 6, 'taxforeign' => 7, 'mtype' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('ali_tax');
        $this->setPhpName('AliTax');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CciOrm\\CciOrm\\AliTax');
        $this->setPackage('CciOrm.CciOrm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('cid', 'Cid', 'INTEGER', true, null, null);
        $this->addColumn('locationbase', 'Locationbase', 'VARCHAR', true, 255, null);
        $this->addColumn('minaccamount', 'Minaccamount', 'DECIMAL', true, 15, null);
        $this->addColumn('maxaccamount', 'Maxaccamount', 'DECIMAL', true, 15, null);
        $this->addColumn('vatlocal', 'Vatlocal', 'INTEGER', true, null, null);
        $this->addColumn('vatforeign', 'Vatforeign', 'INTEGER', true, null, null);
        $this->addColumn('taxlocal', 'Taxlocal', 'DECIMAL', true, 15, null);
        $this->addColumn('taxforeign', 'Taxforeign', 'DECIMAL', true, 15, null);
        $this->addColumn('mtype', 'Mtype', 'VARCHAR', true, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AliTaxTableMap::CLASS_DEFAULT : AliTaxTableMap::OM_CLASS;
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
     * @return array           (AliTax object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AliTaxTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AliTaxTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AliTaxTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AliTaxTableMap::OM_CLASS;
            /** @var AliTax $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AliTaxTableMap::addInstanceToPool($obj, $key);
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
            $key = AliTaxTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AliTaxTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AliTax $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AliTaxTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AliTaxTableMap::COL_CID);
            $criteria->addSelectColumn(AliTaxTableMap::COL_LOCATIONBASE);
            $criteria->addSelectColumn(AliTaxTableMap::COL_MINACCAMOUNT);
            $criteria->addSelectColumn(AliTaxTableMap::COL_MAXACCAMOUNT);
            $criteria->addSelectColumn(AliTaxTableMap::COL_VATLOCAL);
            $criteria->addSelectColumn(AliTaxTableMap::COL_VATFOREIGN);
            $criteria->addSelectColumn(AliTaxTableMap::COL_TAXLOCAL);
            $criteria->addSelectColumn(AliTaxTableMap::COL_TAXFOREIGN);
            $criteria->addSelectColumn(AliTaxTableMap::COL_MTYPE);
        } else {
            $criteria->addSelectColumn($alias . '.cid');
            $criteria->addSelectColumn($alias . '.locationbase');
            $criteria->addSelectColumn($alias . '.minaccamount');
            $criteria->addSelectColumn($alias . '.maxaccamount');
            $criteria->addSelectColumn($alias . '.vatlocal');
            $criteria->addSelectColumn($alias . '.vatforeign');
            $criteria->addSelectColumn($alias . '.taxlocal');
            $criteria->addSelectColumn($alias . '.taxforeign');
            $criteria->addSelectColumn($alias . '.mtype');
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
        return Propel::getServiceContainer()->getDatabaseMap(AliTaxTableMap::DATABASE_NAME)->getTable(AliTaxTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AliTaxTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AliTaxTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AliTaxTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AliTax or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AliTax object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTaxTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CciOrm\CciOrm\AliTax) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AliTaxTableMap::DATABASE_NAME);
            $criteria->add(AliTaxTableMap::COL_CID, (array) $values, Criteria::IN);
        }

        $query = AliTaxQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AliTaxTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AliTaxTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ali_tax table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AliTaxQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AliTax or Criteria object.
     *
     * @param mixed               $criteria Criteria or AliTax object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTaxTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AliTax object
        }

        if ($criteria->containsKey(AliTaxTableMap::COL_CID) && $criteria->keyContainsValue(AliTaxTableMap::COL_CID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AliTaxTableMap::COL_CID.')');
        }


        // Set the correct dbName
        $query = AliTaxQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AliTaxTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AliTaxTableMap::buildTableMap();
