<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMmobile as ChildAliMmobile;
use CciOrm\CciOrm\AliMmobileQuery as ChildAliMmobileQuery;
use CciOrm\CciOrm\Map\AliMmobileTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_mmobile' table.
 *
 *
 *
 * @method     ChildAliMmobileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliMmobileQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliMmobileQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliMmobileQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliMmobileQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliMmobileQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildAliMmobileQuery orderByCoupon($order = Criteria::ASC) Order by the coupon column
 * @method     ChildAliMmobileQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliMmobileQuery orderByFlag($order = Criteria::ASC) Order by the flag column
 * @method     ChildAliMmobileQuery orderBySync($order = Criteria::ASC) Order by the sync column
 * @method     ChildAliMmobileQuery orderByWeb($order = Criteria::ASC) Order by the web column
 *
 * @method     ChildAliMmobileQuery groupById() Group by the id column
 * @method     ChildAliMmobileQuery groupByMcode() Group by the mcode column
 * @method     ChildAliMmobileQuery groupByRcode() Group by the rcode column
 * @method     ChildAliMmobileQuery groupByDl() Group by the dl column
 * @method     ChildAliMmobileQuery groupByTotal() Group by the total column
 * @method     ChildAliMmobileQuery groupByTax() Group by the tax column
 * @method     ChildAliMmobileQuery groupByCoupon() Group by the coupon column
 * @method     ChildAliMmobileQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliMmobileQuery groupByFlag() Group by the flag column
 * @method     ChildAliMmobileQuery groupBySync() Group by the sync column
 * @method     ChildAliMmobileQuery groupByWeb() Group by the web column
 *
 * @method     ChildAliMmobileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMmobileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMmobileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMmobileQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMmobileQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMmobileQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMmobile findOne(ConnectionInterface $con = null) Return the first ChildAliMmobile matching the query
 * @method     ChildAliMmobile findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMmobile matching the query, or a new ChildAliMmobile object populated from the query conditions when no match is found
 *
 * @method     ChildAliMmobile findOneById(int $id) Return the first ChildAliMmobile filtered by the id column
 * @method     ChildAliMmobile findOneByMcode(string $mcode) Return the first ChildAliMmobile filtered by the mcode column
 * @method     ChildAliMmobile findOneByRcode(int $rcode) Return the first ChildAliMmobile filtered by the rcode column
 * @method     ChildAliMmobile findOneByDl(string $dl) Return the first ChildAliMmobile filtered by the dl column
 * @method     ChildAliMmobile findOneByTotal(string $total) Return the first ChildAliMmobile filtered by the total column
 * @method     ChildAliMmobile findOneByTax(string $tax) Return the first ChildAliMmobile filtered by the tax column
 * @method     ChildAliMmobile findOneByCoupon(string $coupon) Return the first ChildAliMmobile filtered by the coupon column
 * @method     ChildAliMmobile findOneByPaydate(string $paydate) Return the first ChildAliMmobile filtered by the paydate column
 * @method     ChildAliMmobile findOneByFlag(string $flag) Return the first ChildAliMmobile filtered by the flag column
 * @method     ChildAliMmobile findOneBySync(string $sync) Return the first ChildAliMmobile filtered by the sync column
 * @method     ChildAliMmobile findOneByWeb(string $web) Return the first ChildAliMmobile filtered by the web column *

 * @method     ChildAliMmobile requirePk($key, ConnectionInterface $con = null) Return the ChildAliMmobile by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOne(ConnectionInterface $con = null) Return the first ChildAliMmobile matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMmobile requireOneById(int $id) Return the first ChildAliMmobile filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByMcode(string $mcode) Return the first ChildAliMmobile filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByRcode(int $rcode) Return the first ChildAliMmobile filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByDl(string $dl) Return the first ChildAliMmobile filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByTotal(string $total) Return the first ChildAliMmobile filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByTax(string $tax) Return the first ChildAliMmobile filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByCoupon(string $coupon) Return the first ChildAliMmobile filtered by the coupon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByPaydate(string $paydate) Return the first ChildAliMmobile filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByFlag(string $flag) Return the first ChildAliMmobile filtered by the flag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneBySync(string $sync) Return the first ChildAliMmobile filtered by the sync column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMmobile requireOneByWeb(string $web) Return the first ChildAliMmobile filtered by the web column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMmobile[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMmobile objects based on current ModelCriteria
 * @method     ChildAliMmobile[]|ObjectCollection findById(int $id) Return ChildAliMmobile objects filtered by the id column
 * @method     ChildAliMmobile[]|ObjectCollection findByMcode(string $mcode) Return ChildAliMmobile objects filtered by the mcode column
 * @method     ChildAliMmobile[]|ObjectCollection findByRcode(int $rcode) Return ChildAliMmobile objects filtered by the rcode column
 * @method     ChildAliMmobile[]|ObjectCollection findByDl(string $dl) Return ChildAliMmobile objects filtered by the dl column
 * @method     ChildAliMmobile[]|ObjectCollection findByTotal(string $total) Return ChildAliMmobile objects filtered by the total column
 * @method     ChildAliMmobile[]|ObjectCollection findByTax(string $tax) Return ChildAliMmobile objects filtered by the tax column
 * @method     ChildAliMmobile[]|ObjectCollection findByCoupon(string $coupon) Return ChildAliMmobile objects filtered by the coupon column
 * @method     ChildAliMmobile[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliMmobile objects filtered by the paydate column
 * @method     ChildAliMmobile[]|ObjectCollection findByFlag(string $flag) Return ChildAliMmobile objects filtered by the flag column
 * @method     ChildAliMmobile[]|ObjectCollection findBySync(string $sync) Return ChildAliMmobile objects filtered by the sync column
 * @method     ChildAliMmobile[]|ObjectCollection findByWeb(string $web) Return ChildAliMmobile objects filtered by the web column
 * @method     ChildAliMmobile[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMmobileQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMmobileQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMmobile', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMmobileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMmobileQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMmobileQuery) {
            return $criteria;
        }
        $query = new ChildAliMmobileQuery();
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
     * @return ChildAliMmobile|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMmobileTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMmobileTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliMmobile A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, rcode, dl, total, tax, coupon, paydate, flag, sync, web FROM ali_mmobile WHERE id = :p0';
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
            /** @var ChildAliMmobile $obj */
            $obj = new ChildAliMmobile();
            $obj->hydrate($row);
            AliMmobileTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliMmobile|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMmobileTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMmobileTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the dl column
     *
     * Example usage:
     * <code>
     * $query->filterByDl(1234); // WHERE dl = 1234
     * $query->filterByDl(array(12, 34)); // WHERE dl IN (12, 34)
     * $query->filterByDl(array('min' => 12)); // WHERE dl > 12
     * </code>
     *
     * @param     mixed $dl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (is_array($dl)) {
            $useMinMax = false;
            if (isset($dl['min'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_DL, $dl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dl['max'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_DL, $dl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_DL, $dl, $comparison);
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
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTax(1234); // WHERE tax = 1234
     * $query->filterByTax(array(12, 34)); // WHERE tax IN (12, 34)
     * $query->filterByTax(array('min' => 12)); // WHERE tax > 12
     * </code>
     *
     * @param     mixed $tax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_TAX, $tax, $comparison);
    }

    /**
     * Filter the query on the coupon column
     *
     * Example usage:
     * <code>
     * $query->filterByCoupon(1234); // WHERE coupon = 1234
     * $query->filterByCoupon(array(12, 34)); // WHERE coupon IN (12, 34)
     * $query->filterByCoupon(array('min' => 12)); // WHERE coupon > 12
     * </code>
     *
     * @param     mixed $coupon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByCoupon($coupon = null, $comparison = null)
    {
        if (is_array($coupon)) {
            $useMinMax = false;
            if (isset($coupon['min'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_COUPON, $coupon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coupon['max'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_COUPON, $coupon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_COUPON, $coupon, $comparison);
    }

    /**
     * Filter the query on the paydate column
     *
     * Example usage:
     * <code>
     * $query->filterByPaydate('2011-03-14'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate('now'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate(array('max' => 'yesterday')); // WHERE paydate > '2011-03-13'
     * </code>
     *
     * @param     mixed $paydate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliMmobileTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_PAYDATE, $paydate, $comparison);
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
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByFlag($flag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_FLAG, $flag, $comparison);
    }

    /**
     * Filter the query on the sync column
     *
     * Example usage:
     * <code>
     * $query->filterBySync('fooValue');   // WHERE sync = 'fooValue'
     * $query->filterBySync('%fooValue%', Criteria::LIKE); // WHERE sync LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sync The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterBySync($sync = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sync)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_SYNC, $sync, $comparison);
    }

    /**
     * Filter the query on the web column
     *
     * Example usage:
     * <code>
     * $query->filterByWeb('fooValue');   // WHERE web = 'fooValue'
     * $query->filterByWeb('%fooValue%', Criteria::LIKE); // WHERE web LIKE '%fooValue%'
     * </code>
     *
     * @param     string $web The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function filterByWeb($web = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($web)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmobileTableMap::COL_WEB, $web, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMmobile $aliMmobile Object to remove from the list of results
     *
     * @return $this|ChildAliMmobileQuery The current query, for fluid interface
     */
    public function prune($aliMmobile = null)
    {
        if ($aliMmobile) {
            $this->addUsingAlias(AliMmobileTableMap::COL_ID, $aliMmobile->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_mmobile table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMmobileTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMmobileTableMap::clearInstancePool();
            AliMmobileTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMmobileTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMmobileTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMmobileTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMmobileTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMmobileQuery
