<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliSaleHold as ChildAliSaleHold;
use CciOrm\CciOrm\AliSaleHoldQuery as ChildAliSaleHoldQuery;
use CciOrm\CciOrm\Map\AliSaleHoldTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_sale_hold' table.
 *
 *
 *
 * @method     ChildAliSaleHoldQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliSaleHoldQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliSaleHoldQuery orderByYokma($order = Criteria::ASC) Order by the yokma column
 * @method     ChildAliSaleHoldQuery orderByBuy($order = Criteria::ASC) Order by the buy column
 * @method     ChildAliSaleHoldQuery orderByUsed($order = Criteria::ASC) Order by the used column
 * @method     ChildAliSaleHoldQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method     ChildAliSaleHoldQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliSaleHoldQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 *
 * @method     ChildAliSaleHoldQuery groupById() Group by the id column
 * @method     ChildAliSaleHoldQuery groupByRcode() Group by the rcode column
 * @method     ChildAliSaleHoldQuery groupByYokma() Group by the yokma column
 * @method     ChildAliSaleHoldQuery groupByBuy() Group by the buy column
 * @method     ChildAliSaleHoldQuery groupByUsed() Group by the used column
 * @method     ChildAliSaleHoldQuery groupByBalance() Group by the balance column
 * @method     ChildAliSaleHoldQuery groupByFdate() Group by the fdate column
 * @method     ChildAliSaleHoldQuery groupByTdate() Group by the tdate column
 *
 * @method     ChildAliSaleHoldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSaleHoldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSaleHoldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSaleHoldQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSaleHoldQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSaleHoldQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSaleHold findOne(ConnectionInterface $con = null) Return the first ChildAliSaleHold matching the query
 * @method     ChildAliSaleHold findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSaleHold matching the query, or a new ChildAliSaleHold object populated from the query conditions when no match is found
 *
 * @method     ChildAliSaleHold findOneById(int $id) Return the first ChildAliSaleHold filtered by the id column
 * @method     ChildAliSaleHold findOneByRcode(int $rcode) Return the first ChildAliSaleHold filtered by the rcode column
 * @method     ChildAliSaleHold findOneByYokma(string $yokma) Return the first ChildAliSaleHold filtered by the yokma column
 * @method     ChildAliSaleHold findOneByBuy(string $buy) Return the first ChildAliSaleHold filtered by the buy column
 * @method     ChildAliSaleHold findOneByUsed(string $used) Return the first ChildAliSaleHold filtered by the used column
 * @method     ChildAliSaleHold findOneByBalance(string $balance) Return the first ChildAliSaleHold filtered by the balance column
 * @method     ChildAliSaleHold findOneByFdate(string $fdate) Return the first ChildAliSaleHold filtered by the fdate column
 * @method     ChildAliSaleHold findOneByTdate(string $tdate) Return the first ChildAliSaleHold filtered by the tdate column *

 * @method     ChildAliSaleHold requirePk($key, ConnectionInterface $con = null) Return the ChildAliSaleHold by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleHold requireOne(ConnectionInterface $con = null) Return the first ChildAliSaleHold matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSaleHold requireOneById(int $id) Return the first ChildAliSaleHold filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleHold requireOneByRcode(int $rcode) Return the first ChildAliSaleHold filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleHold requireOneByYokma(string $yokma) Return the first ChildAliSaleHold filtered by the yokma column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleHold requireOneByBuy(string $buy) Return the first ChildAliSaleHold filtered by the buy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleHold requireOneByUsed(string $used) Return the first ChildAliSaleHold filtered by the used column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleHold requireOneByBalance(string $balance) Return the first ChildAliSaleHold filtered by the balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleHold requireOneByFdate(string $fdate) Return the first ChildAliSaleHold filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleHold requireOneByTdate(string $tdate) Return the first ChildAliSaleHold filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSaleHold[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSaleHold objects based on current ModelCriteria
 * @method     ChildAliSaleHold[]|ObjectCollection findById(int $id) Return ChildAliSaleHold objects filtered by the id column
 * @method     ChildAliSaleHold[]|ObjectCollection findByRcode(int $rcode) Return ChildAliSaleHold objects filtered by the rcode column
 * @method     ChildAliSaleHold[]|ObjectCollection findByYokma(string $yokma) Return ChildAliSaleHold objects filtered by the yokma column
 * @method     ChildAliSaleHold[]|ObjectCollection findByBuy(string $buy) Return ChildAliSaleHold objects filtered by the buy column
 * @method     ChildAliSaleHold[]|ObjectCollection findByUsed(string $used) Return ChildAliSaleHold objects filtered by the used column
 * @method     ChildAliSaleHold[]|ObjectCollection findByBalance(string $balance) Return ChildAliSaleHold objects filtered by the balance column
 * @method     ChildAliSaleHold[]|ObjectCollection findByFdate(string $fdate) Return ChildAliSaleHold objects filtered by the fdate column
 * @method     ChildAliSaleHold[]|ObjectCollection findByTdate(string $tdate) Return ChildAliSaleHold objects filtered by the tdate column
 * @method     ChildAliSaleHold[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSaleHoldQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSaleHoldQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSaleHold', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSaleHoldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSaleHoldQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSaleHoldQuery) {
            return $criteria;
        }
        $query = new ChildAliSaleHoldQuery();
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
     * @return ChildAliSaleHold|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliSaleHoldTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliSaleHoldTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliSaleHold A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, yokma, buy, used, balance, fdate, tdate FROM ali_sale_hold WHERE id = :p0';
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
            /** @var ChildAliSaleHold $obj */
            $obj = new ChildAliSaleHold();
            $obj->hydrate($row);
            AliSaleHoldTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliSaleHold|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the yokma column
     *
     * Example usage:
     * <code>
     * $query->filterByYokma(1234); // WHERE yokma = 1234
     * $query->filterByYokma(array(12, 34)); // WHERE yokma IN (12, 34)
     * $query->filterByYokma(array('min' => 12)); // WHERE yokma > 12
     * </code>
     *
     * @param     mixed $yokma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByYokma($yokma = null, $comparison = null)
    {
        if (is_array($yokma)) {
            $useMinMax = false;
            if (isset($yokma['min'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_YOKMA, $yokma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yokma['max'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_YOKMA, $yokma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_YOKMA, $yokma, $comparison);
    }

    /**
     * Filter the query on the buy column
     *
     * Example usage:
     * <code>
     * $query->filterByBuy(1234); // WHERE buy = 1234
     * $query->filterByBuy(array(12, 34)); // WHERE buy IN (12, 34)
     * $query->filterByBuy(array('min' => 12)); // WHERE buy > 12
     * </code>
     *
     * @param     mixed $buy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByBuy($buy = null, $comparison = null)
    {
        if (is_array($buy)) {
            $useMinMax = false;
            if (isset($buy['min'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_BUY, $buy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($buy['max'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_BUY, $buy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_BUY, $buy, $comparison);
    }

    /**
     * Filter the query on the used column
     *
     * Example usage:
     * <code>
     * $query->filterByUsed(1234); // WHERE used = 1234
     * $query->filterByUsed(array(12, 34)); // WHERE used IN (12, 34)
     * $query->filterByUsed(array('min' => 12)); // WHERE used > 12
     * </code>
     *
     * @param     mixed $used The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByUsed($used = null, $comparison = null)
    {
        if (is_array($used)) {
            $useMinMax = false;
            if (isset($used['min'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_USED, $used['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($used['max'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_USED, $used['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_USED, $used, $comparison);
    }

    /**
     * Filter the query on the balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBalance(1234); // WHERE balance = 1234
     * $query->filterByBalance(array(12, 34)); // WHERE balance IN (12, 34)
     * $query->filterByBalance(array('min' => 12)); // WHERE balance > 12
     * </code>
     *
     * @param     mixed $balance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(AliSaleHoldTableMap::COL_BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_BALANCE, $balance, $comparison);
    }

    /**
     * Filter the query on the fdate column
     *
     * Example usage:
     * <code>
     * $query->filterByFdate('fooValue');   // WHERE fdate = 'fooValue'
     * $query->filterByFdate('%fooValue%', Criteria::LIKE); // WHERE fdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_FDATE, $fdate, $comparison);
    }

    /**
     * Filter the query on the tdate column
     *
     * Example usage:
     * <code>
     * $query->filterByTdate('fooValue');   // WHERE tdate = 'fooValue'
     * $query->filterByTdate('%fooValue%', Criteria::LIKE); // WHERE tdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleHoldTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSaleHold $aliSaleHold Object to remove from the list of results
     *
     * @return $this|ChildAliSaleHoldQuery The current query, for fluid interface
     */
    public function prune($aliSaleHold = null)
    {
        if ($aliSaleHold) {
            $this->addUsingAlias(AliSaleHoldTableMap::COL_ID, $aliSaleHold->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_sale_hold table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSaleHoldTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSaleHoldTableMap::clearInstancePool();
            AliSaleHoldTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSaleHoldTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSaleHoldTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSaleHoldTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSaleHoldTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSaleHoldQuery
