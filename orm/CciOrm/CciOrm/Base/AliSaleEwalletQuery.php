<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliSaleEwallet as ChildAliSaleEwallet;
use CciOrm\CciOrm\AliSaleEwalletQuery as ChildAliSaleEwalletQuery;
use CciOrm\CciOrm\Map\AliSaleEwalletTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_sale_ewallet' table.
 *
 *
 *
 * @method     ChildAliSaleEwalletQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliSaleEwalletQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliSaleEwalletQuery orderByYokma($order = Criteria::ASC) Order by the yokma column
 * @method     ChildAliSaleEwalletQuery orderByBuy($order = Criteria::ASC) Order by the buy column
 * @method     ChildAliSaleEwalletQuery orderByUsed($order = Criteria::ASC) Order by the used column
 * @method     ChildAliSaleEwalletQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method     ChildAliSaleEwalletQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliSaleEwalletQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 *
 * @method     ChildAliSaleEwalletQuery groupById() Group by the id column
 * @method     ChildAliSaleEwalletQuery groupByRcode() Group by the rcode column
 * @method     ChildAliSaleEwalletQuery groupByYokma() Group by the yokma column
 * @method     ChildAliSaleEwalletQuery groupByBuy() Group by the buy column
 * @method     ChildAliSaleEwalletQuery groupByUsed() Group by the used column
 * @method     ChildAliSaleEwalletQuery groupByBalance() Group by the balance column
 * @method     ChildAliSaleEwalletQuery groupByFdate() Group by the fdate column
 * @method     ChildAliSaleEwalletQuery groupByTdate() Group by the tdate column
 *
 * @method     ChildAliSaleEwalletQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSaleEwalletQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSaleEwalletQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSaleEwalletQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSaleEwalletQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSaleEwalletQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSaleEwallet findOne(ConnectionInterface $con = null) Return the first ChildAliSaleEwallet matching the query
 * @method     ChildAliSaleEwallet findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSaleEwallet matching the query, or a new ChildAliSaleEwallet object populated from the query conditions when no match is found
 *
 * @method     ChildAliSaleEwallet findOneById(int $id) Return the first ChildAliSaleEwallet filtered by the id column
 * @method     ChildAliSaleEwallet findOneByRcode(int $rcode) Return the first ChildAliSaleEwallet filtered by the rcode column
 * @method     ChildAliSaleEwallet findOneByYokma(string $yokma) Return the first ChildAliSaleEwallet filtered by the yokma column
 * @method     ChildAliSaleEwallet findOneByBuy(string $buy) Return the first ChildAliSaleEwallet filtered by the buy column
 * @method     ChildAliSaleEwallet findOneByUsed(string $used) Return the first ChildAliSaleEwallet filtered by the used column
 * @method     ChildAliSaleEwallet findOneByBalance(string $balance) Return the first ChildAliSaleEwallet filtered by the balance column
 * @method     ChildAliSaleEwallet findOneByFdate(string $fdate) Return the first ChildAliSaleEwallet filtered by the fdate column
 * @method     ChildAliSaleEwallet findOneByTdate(string $tdate) Return the first ChildAliSaleEwallet filtered by the tdate column *

 * @method     ChildAliSaleEwallet requirePk($key, ConnectionInterface $con = null) Return the ChildAliSaleEwallet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleEwallet requireOne(ConnectionInterface $con = null) Return the first ChildAliSaleEwallet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSaleEwallet requireOneById(int $id) Return the first ChildAliSaleEwallet filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleEwallet requireOneByRcode(int $rcode) Return the first ChildAliSaleEwallet filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleEwallet requireOneByYokma(string $yokma) Return the first ChildAliSaleEwallet filtered by the yokma column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleEwallet requireOneByBuy(string $buy) Return the first ChildAliSaleEwallet filtered by the buy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleEwallet requireOneByUsed(string $used) Return the first ChildAliSaleEwallet filtered by the used column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleEwallet requireOneByBalance(string $balance) Return the first ChildAliSaleEwallet filtered by the balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleEwallet requireOneByFdate(string $fdate) Return the first ChildAliSaleEwallet filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSaleEwallet requireOneByTdate(string $tdate) Return the first ChildAliSaleEwallet filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSaleEwallet[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSaleEwallet objects based on current ModelCriteria
 * @method     ChildAliSaleEwallet[]|ObjectCollection findById(int $id) Return ChildAliSaleEwallet objects filtered by the id column
 * @method     ChildAliSaleEwallet[]|ObjectCollection findByRcode(int $rcode) Return ChildAliSaleEwallet objects filtered by the rcode column
 * @method     ChildAliSaleEwallet[]|ObjectCollection findByYokma(string $yokma) Return ChildAliSaleEwallet objects filtered by the yokma column
 * @method     ChildAliSaleEwallet[]|ObjectCollection findByBuy(string $buy) Return ChildAliSaleEwallet objects filtered by the buy column
 * @method     ChildAliSaleEwallet[]|ObjectCollection findByUsed(string $used) Return ChildAliSaleEwallet objects filtered by the used column
 * @method     ChildAliSaleEwallet[]|ObjectCollection findByBalance(string $balance) Return ChildAliSaleEwallet objects filtered by the balance column
 * @method     ChildAliSaleEwallet[]|ObjectCollection findByFdate(string $fdate) Return ChildAliSaleEwallet objects filtered by the fdate column
 * @method     ChildAliSaleEwallet[]|ObjectCollection findByTdate(string $tdate) Return ChildAliSaleEwallet objects filtered by the tdate column
 * @method     ChildAliSaleEwallet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSaleEwalletQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSaleEwalletQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSaleEwallet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSaleEwalletQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSaleEwalletQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSaleEwalletQuery) {
            return $criteria;
        }
        $query = new ChildAliSaleEwalletQuery();
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
     * @return ChildAliSaleEwallet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliSaleEwalletTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliSaleEwalletTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliSaleEwallet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, yokma, buy, used, balance, fdate, tdate FROM ali_sale_ewallet WHERE id = :p0';
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
            /** @var ChildAliSaleEwallet $obj */
            $obj = new ChildAliSaleEwallet();
            $obj->hydrate($row);
            AliSaleEwalletTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliSaleEwallet|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByYokma($yokma = null, $comparison = null)
    {
        if (is_array($yokma)) {
            $useMinMax = false;
            if (isset($yokma['min'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_YOKMA, $yokma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yokma['max'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_YOKMA, $yokma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_YOKMA, $yokma, $comparison);
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByBuy($buy = null, $comparison = null)
    {
        if (is_array($buy)) {
            $useMinMax = false;
            if (isset($buy['min'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_BUY, $buy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($buy['max'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_BUY, $buy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_BUY, $buy, $comparison);
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByUsed($used = null, $comparison = null)
    {
        if (is_array($used)) {
            $useMinMax = false;
            if (isset($used['min'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_USED, $used['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($used['max'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_USED, $used['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_USED, $used, $comparison);
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(AliSaleEwalletTableMap::COL_BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_BALANCE, $balance, $comparison);
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSaleEwalletTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSaleEwallet $aliSaleEwallet Object to remove from the list of results
     *
     * @return $this|ChildAliSaleEwalletQuery The current query, for fluid interface
     */
    public function prune($aliSaleEwallet = null)
    {
        if ($aliSaleEwallet) {
            $this->addUsingAlias(AliSaleEwalletTableMap::COL_ID, $aliSaleEwallet->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_sale_ewallet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSaleEwalletTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSaleEwalletTableMap::clearInstancePool();
            AliSaleEwalletTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSaleEwalletTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSaleEwalletTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSaleEwalletTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSaleEwalletTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSaleEwalletQuery
