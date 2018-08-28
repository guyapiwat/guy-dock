<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliInventoryOrder as ChildAliInventoryOrder;
use CciOrm\CciOrm\AliInventoryOrderQuery as ChildAliInventoryOrderQuery;
use CciOrm\CciOrm\Map\AliInventoryOrderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_inventory_order' table.
 *
 *
 *
 * @method     ChildAliInventoryOrderQuery orderByMlmInvType($order = Criteria::ASC) Order by the MLM_Inv_Type column
 * @method     ChildAliInventoryOrderQuery orderByMlmTypeGroup($order = Criteria::ASC) Order by the MLM_Type_Group column
 * @method     ChildAliInventoryOrderQuery orderByOracleType($order = Criteria::ASC) Order by the Oracle_Type column
 * @method     ChildAliInventoryOrderQuery orderByMappingCode($order = Criteria::ASC) Order by the Mapping_Code column
 * @method     ChildAliInventoryOrderQuery orderByMappingType($order = Criteria::ASC) Order by the Mapping_type column
 *
 * @method     ChildAliInventoryOrderQuery groupByMlmInvType() Group by the MLM_Inv_Type column
 * @method     ChildAliInventoryOrderQuery groupByMlmTypeGroup() Group by the MLM_Type_Group column
 * @method     ChildAliInventoryOrderQuery groupByOracleType() Group by the Oracle_Type column
 * @method     ChildAliInventoryOrderQuery groupByMappingCode() Group by the Mapping_Code column
 * @method     ChildAliInventoryOrderQuery groupByMappingType() Group by the Mapping_type column
 *
 * @method     ChildAliInventoryOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliInventoryOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliInventoryOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliInventoryOrderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliInventoryOrderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliInventoryOrderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliInventoryOrder findOne(ConnectionInterface $con = null) Return the first ChildAliInventoryOrder matching the query
 * @method     ChildAliInventoryOrder findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliInventoryOrder matching the query, or a new ChildAliInventoryOrder object populated from the query conditions when no match is found
 *
 * @method     ChildAliInventoryOrder findOneByMlmInvType(string $MLM_Inv_Type) Return the first ChildAliInventoryOrder filtered by the MLM_Inv_Type column
 * @method     ChildAliInventoryOrder findOneByMlmTypeGroup(string $MLM_Type_Group) Return the first ChildAliInventoryOrder filtered by the MLM_Type_Group column
 * @method     ChildAliInventoryOrder findOneByOracleType(string $Oracle_Type) Return the first ChildAliInventoryOrder filtered by the Oracle_Type column
 * @method     ChildAliInventoryOrder findOneByMappingCode(string $Mapping_Code) Return the first ChildAliInventoryOrder filtered by the Mapping_Code column
 * @method     ChildAliInventoryOrder findOneByMappingType(string $Mapping_type) Return the first ChildAliInventoryOrder filtered by the Mapping_type column *

 * @method     ChildAliInventoryOrder requirePk($key, ConnectionInterface $con = null) Return the ChildAliInventoryOrder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInventoryOrder requireOne(ConnectionInterface $con = null) Return the first ChildAliInventoryOrder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliInventoryOrder requireOneByMlmInvType(string $MLM_Inv_Type) Return the first ChildAliInventoryOrder filtered by the MLM_Inv_Type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInventoryOrder requireOneByMlmTypeGroup(string $MLM_Type_Group) Return the first ChildAliInventoryOrder filtered by the MLM_Type_Group column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInventoryOrder requireOneByOracleType(string $Oracle_Type) Return the first ChildAliInventoryOrder filtered by the Oracle_Type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInventoryOrder requireOneByMappingCode(string $Mapping_Code) Return the first ChildAliInventoryOrder filtered by the Mapping_Code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliInventoryOrder requireOneByMappingType(string $Mapping_type) Return the first ChildAliInventoryOrder filtered by the Mapping_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliInventoryOrder[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliInventoryOrder objects based on current ModelCriteria
 * @method     ChildAliInventoryOrder[]|ObjectCollection findByMlmInvType(string $MLM_Inv_Type) Return ChildAliInventoryOrder objects filtered by the MLM_Inv_Type column
 * @method     ChildAliInventoryOrder[]|ObjectCollection findByMlmTypeGroup(string $MLM_Type_Group) Return ChildAliInventoryOrder objects filtered by the MLM_Type_Group column
 * @method     ChildAliInventoryOrder[]|ObjectCollection findByOracleType(string $Oracle_Type) Return ChildAliInventoryOrder objects filtered by the Oracle_Type column
 * @method     ChildAliInventoryOrder[]|ObjectCollection findByMappingCode(string $Mapping_Code) Return ChildAliInventoryOrder objects filtered by the Mapping_Code column
 * @method     ChildAliInventoryOrder[]|ObjectCollection findByMappingType(string $Mapping_type) Return ChildAliInventoryOrder objects filtered by the Mapping_type column
 * @method     ChildAliInventoryOrder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliInventoryOrderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliInventoryOrderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliInventoryOrder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliInventoryOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliInventoryOrderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliInventoryOrderQuery) {
            return $criteria;
        }
        $query = new ChildAliInventoryOrderQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$Mapping_Code, $Mapping_type] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAliInventoryOrder|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliInventoryOrderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliInventoryOrderTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAliInventoryOrder A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT MLM_Inv_Type, MLM_Type_Group, Oracle_Type, Mapping_Code, Mapping_type FROM ali_inventory_order WHERE Mapping_Code = :p0 AND Mapping_type = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAliInventoryOrder $obj */
            $obj = new ChildAliInventoryOrder();
            $obj->hydrate($row);
            AliInventoryOrderTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAliInventoryOrder|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliInventoryOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AliInventoryOrderTableMap::COL_MAPPING_CODE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AliInventoryOrderTableMap::COL_MAPPING_TYPE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliInventoryOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AliInventoryOrderTableMap::COL_MAPPING_CODE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AliInventoryOrderTableMap::COL_MAPPING_TYPE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the MLM_Inv_Type column
     *
     * Example usage:
     * <code>
     * $query->filterByMlmInvType('fooValue');   // WHERE MLM_Inv_Type = 'fooValue'
     * $query->filterByMlmInvType('%fooValue%', Criteria::LIKE); // WHERE MLM_Inv_Type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mlmInvType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventoryOrderQuery The current query, for fluid interface
     */
    public function filterByMlmInvType($mlmInvType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mlmInvType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventoryOrderTableMap::COL_MLM_INV_TYPE, $mlmInvType, $comparison);
    }

    /**
     * Filter the query on the MLM_Type_Group column
     *
     * Example usage:
     * <code>
     * $query->filterByMlmTypeGroup('fooValue');   // WHERE MLM_Type_Group = 'fooValue'
     * $query->filterByMlmTypeGroup('%fooValue%', Criteria::LIKE); // WHERE MLM_Type_Group LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mlmTypeGroup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventoryOrderQuery The current query, for fluid interface
     */
    public function filterByMlmTypeGroup($mlmTypeGroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mlmTypeGroup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventoryOrderTableMap::COL_MLM_TYPE_GROUP, $mlmTypeGroup, $comparison);
    }

    /**
     * Filter the query on the Oracle_Type column
     *
     * Example usage:
     * <code>
     * $query->filterByOracleType('fooValue');   // WHERE Oracle_Type = 'fooValue'
     * $query->filterByOracleType('%fooValue%', Criteria::LIKE); // WHERE Oracle_Type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $oracleType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventoryOrderQuery The current query, for fluid interface
     */
    public function filterByOracleType($oracleType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($oracleType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventoryOrderTableMap::COL_ORACLE_TYPE, $oracleType, $comparison);
    }

    /**
     * Filter the query on the Mapping_Code column
     *
     * Example usage:
     * <code>
     * $query->filterByMappingCode('fooValue');   // WHERE Mapping_Code = 'fooValue'
     * $query->filterByMappingCode('%fooValue%', Criteria::LIKE); // WHERE Mapping_Code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mappingCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventoryOrderQuery The current query, for fluid interface
     */
    public function filterByMappingCode($mappingCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mappingCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventoryOrderTableMap::COL_MAPPING_CODE, $mappingCode, $comparison);
    }

    /**
     * Filter the query on the Mapping_type column
     *
     * Example usage:
     * <code>
     * $query->filterByMappingType('fooValue');   // WHERE Mapping_type = 'fooValue'
     * $query->filterByMappingType('%fooValue%', Criteria::LIKE); // WHERE Mapping_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mappingType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliInventoryOrderQuery The current query, for fluid interface
     */
    public function filterByMappingType($mappingType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mappingType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliInventoryOrderTableMap::COL_MAPPING_TYPE, $mappingType, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliInventoryOrder $aliInventoryOrder Object to remove from the list of results
     *
     * @return $this|ChildAliInventoryOrderQuery The current query, for fluid interface
     */
    public function prune($aliInventoryOrder = null)
    {
        if ($aliInventoryOrder) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AliInventoryOrderTableMap::COL_MAPPING_CODE), $aliInventoryOrder->getMappingCode(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AliInventoryOrderTableMap::COL_MAPPING_TYPE), $aliInventoryOrder->getMappingType(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_inventory_order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventoryOrderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliInventoryOrderTableMap::clearInstancePool();
            AliInventoryOrderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliInventoryOrderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliInventoryOrderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliInventoryOrderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliInventoryOrderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliInventoryOrderQuery
