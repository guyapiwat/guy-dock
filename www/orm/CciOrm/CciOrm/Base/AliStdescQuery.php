<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStdesc as ChildAliStdesc;
use CciOrm\CciOrm\AliStdescQuery as ChildAliStdescQuery;
use CciOrm\CciOrm\Map\AliStdescTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_stdesc' table.
 *
 *
 *
 * @method     ChildAliStdescQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliStdescQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliStdescQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliStdescQuery orderByCmcode($order = Criteria::ASC) Order by the cmcode column
 * @method     ChildAliStdescQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildAliStdescQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliStdescQuery orderByFlag($order = Criteria::ASC) Order by the flag column
 * @method     ChildAliStdescQuery orderByCsano($order = Criteria::ASC) Order by the csano column
 *
 * @method     ChildAliStdescQuery groupById() Group by the id column
 * @method     ChildAliStdescQuery groupByMcode() Group by the mcode column
 * @method     ChildAliStdescQuery groupByRcode() Group by the rcode column
 * @method     ChildAliStdescQuery groupByCmcode() Group by the cmcode column
 * @method     ChildAliStdescQuery groupByLevel() Group by the level column
 * @method     ChildAliStdescQuery groupByTotal() Group by the total column
 * @method     ChildAliStdescQuery groupByFlag() Group by the flag column
 * @method     ChildAliStdescQuery groupByCsano() Group by the csano column
 *
 * @method     ChildAliStdescQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliStdescQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliStdescQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliStdescQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliStdescQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliStdescQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliStdesc findOne(ConnectionInterface $con = null) Return the first ChildAliStdesc matching the query
 * @method     ChildAliStdesc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliStdesc matching the query, or a new ChildAliStdesc object populated from the query conditions when no match is found
 *
 * @method     ChildAliStdesc findOneById(int $id) Return the first ChildAliStdesc filtered by the id column
 * @method     ChildAliStdesc findOneByMcode(string $mcode) Return the first ChildAliStdesc filtered by the mcode column
 * @method     ChildAliStdesc findOneByRcode(int $rcode) Return the first ChildAliStdesc filtered by the rcode column
 * @method     ChildAliStdesc findOneByCmcode(string $cmcode) Return the first ChildAliStdesc filtered by the cmcode column
 * @method     ChildAliStdesc findOneByLevel(string $level) Return the first ChildAliStdesc filtered by the level column
 * @method     ChildAliStdesc findOneByTotal(string $total) Return the first ChildAliStdesc filtered by the total column
 * @method     ChildAliStdesc findOneByFlag(string $flag) Return the first ChildAliStdesc filtered by the flag column
 * @method     ChildAliStdesc findOneByCsano(int $csano) Return the first ChildAliStdesc filtered by the csano column *

 * @method     ChildAliStdesc requirePk($key, ConnectionInterface $con = null) Return the ChildAliStdesc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStdesc requireOne(ConnectionInterface $con = null) Return the first ChildAliStdesc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStdesc requireOneById(int $id) Return the first ChildAliStdesc filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStdesc requireOneByMcode(string $mcode) Return the first ChildAliStdesc filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStdesc requireOneByRcode(int $rcode) Return the first ChildAliStdesc filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStdesc requireOneByCmcode(string $cmcode) Return the first ChildAliStdesc filtered by the cmcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStdesc requireOneByLevel(string $level) Return the first ChildAliStdesc filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStdesc requireOneByTotal(string $total) Return the first ChildAliStdesc filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStdesc requireOneByFlag(string $flag) Return the first ChildAliStdesc filtered by the flag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStdesc requireOneByCsano(int $csano) Return the first ChildAliStdesc filtered by the csano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStdesc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliStdesc objects based on current ModelCriteria
 * @method     ChildAliStdesc[]|ObjectCollection findById(int $id) Return ChildAliStdesc objects filtered by the id column
 * @method     ChildAliStdesc[]|ObjectCollection findByMcode(string $mcode) Return ChildAliStdesc objects filtered by the mcode column
 * @method     ChildAliStdesc[]|ObjectCollection findByRcode(int $rcode) Return ChildAliStdesc objects filtered by the rcode column
 * @method     ChildAliStdesc[]|ObjectCollection findByCmcode(string $cmcode) Return ChildAliStdesc objects filtered by the cmcode column
 * @method     ChildAliStdesc[]|ObjectCollection findByLevel(string $level) Return ChildAliStdesc objects filtered by the level column
 * @method     ChildAliStdesc[]|ObjectCollection findByTotal(string $total) Return ChildAliStdesc objects filtered by the total column
 * @method     ChildAliStdesc[]|ObjectCollection findByFlag(string $flag) Return ChildAliStdesc objects filtered by the flag column
 * @method     ChildAliStdesc[]|ObjectCollection findByCsano(int $csano) Return ChildAliStdesc objects filtered by the csano column
 * @method     ChildAliStdesc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliStdescQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliStdescQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliStdesc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliStdescQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliStdescQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliStdescQuery) {
            return $criteria;
        }
        $query = new ChildAliStdescQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAliStdesc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliStdescTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliStdescTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliStdesc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, rcode, cmcode, level, total, flag, csano FROM ali_stdesc WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAliStdesc $obj */
            $obj = new ChildAliStdesc();
            $obj->hydrate($row);
            AliStdescTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliStdesc|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliStdescTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliStdescTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStdescTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the mcode column
     *
     * Example usage:
     * <code>
     * $query->filterByMcode('fooValue');   // WHERE mcode = 'fooValue'
     * $query->filterByMcode('%fooValue%', Criteria::LIKE); // WHERE mcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStdescTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the rcode column
     *
     * Example usage:
     * <code>
     * $query->filterByRcode(1234); // WHERE rcode = 1234
     * $query->filterByRcode(array(12, 34)); // WHERE rcode IN (12, 34)
     * $query->filterByRcode(array('min' => 12)); // WHERE rcode > 12
     * </code>
     *
     * @param     mixed $rcode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStdescTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the cmcode column
     *
     * Example usage:
     * <code>
     * $query->filterByCmcode('fooValue');   // WHERE cmcode = 'fooValue'
     * $query->filterByCmcode('%fooValue%', Criteria::LIKE); // WHERE cmcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cmcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByCmcode($cmcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cmcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStdescTableMap::COL_CMCODE, $cmcode, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStdescTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStdescTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the flag column
     *
     * Example usage:
     * <code>
     * $query->filterByFlag('fooValue');   // WHERE flag = 'fooValue'
     * $query->filterByFlag('%fooValue%', Criteria::LIKE); // WHERE flag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByFlag($flag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStdescTableMap::COL_FLAG, $flag, $comparison);
    }

    /**
     * Filter the query on the csano column
     *
     * Example usage:
     * <code>
     * $query->filterByCsano(1234); // WHERE csano = 1234
     * $query->filterByCsano(array(12, 34)); // WHERE csano IN (12, 34)
     * $query->filterByCsano(array('min' => 12)); // WHERE csano > 12
     * </code>
     *
     * @param     mixed $csano The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function filterByCsano($csano = null, $comparison = null)
    {
        if (is_array($csano)) {
            $useMinMax = false;
            if (isset($csano['min'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_CSANO, $csano['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($csano['max'])) {
                $this->addUsingAlias(AliStdescTableMap::COL_CSANO, $csano['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStdescTableMap::COL_CSANO, $csano, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliStdesc $aliStdesc Object to remove from the list of results
     *
     * @return $this|ChildAliStdescQuery The current query, for fluid interface
     */
    public function prune($aliStdesc = null)
    {
        if ($aliStdesc) {
            $this->addUsingAlias(AliStdescTableMap::COL_ID, $aliStdesc->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_stdesc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStdescTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliStdescTableMap::clearInstancePool();
            AliStdescTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStdescTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliStdescTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliStdescTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliStdescTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliStdescQuery
