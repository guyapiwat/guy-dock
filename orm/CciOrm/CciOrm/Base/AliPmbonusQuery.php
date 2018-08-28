<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPmbonus as ChildAliPmbonus;
use CciOrm\CciOrm\AliPmbonusQuery as ChildAliPmbonusQuery;
use CciOrm\CciOrm\Map\AliPmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_pmbonus' table.
 *
 *
 *
 * @method     ChildAliPmbonusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliPmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliPmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliPmbonusQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliPmbonusQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliPmbonusQuery orderByPvb($order = Criteria::ASC) Order by the pvb column
 * @method     ChildAliPmbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliPmbonusQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliPmbonusQuery orderByMonthPv($order = Criteria::ASC) Order by the month_pv column
 * @method     ChildAliPmbonusQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 *
 * @method     ChildAliPmbonusQuery groupById() Group by the id column
 * @method     ChildAliPmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliPmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliPmbonusQuery groupByStatus() Group by the status column
 * @method     ChildAliPmbonusQuery groupByPv() Group by the pv column
 * @method     ChildAliPmbonusQuery groupByPvb() Group by the pvb column
 * @method     ChildAliPmbonusQuery groupByTotal() Group by the total column
 * @method     ChildAliPmbonusQuery groupByMdate() Group by the mdate column
 * @method     ChildAliPmbonusQuery groupByMonthPv() Group by the month_pv column
 * @method     ChildAliPmbonusQuery groupByMpos() Group by the mpos column
 *
 * @method     ChildAliPmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliPmbonus matching the query
 * @method     ChildAliPmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPmbonus matching the query, or a new ChildAliPmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliPmbonus findOneById(int $id) Return the first ChildAliPmbonus filtered by the id column
 * @method     ChildAliPmbonus findOneByRcode(int $rcode) Return the first ChildAliPmbonus filtered by the rcode column
 * @method     ChildAliPmbonus findOneByMcode(string $mcode) Return the first ChildAliPmbonus filtered by the mcode column
 * @method     ChildAliPmbonus findOneByStatus(string $status) Return the first ChildAliPmbonus filtered by the status column
 * @method     ChildAliPmbonus findOneByPv(string $pv) Return the first ChildAliPmbonus filtered by the pv column
 * @method     ChildAliPmbonus findOneByPvb(string $pvb) Return the first ChildAliPmbonus filtered by the pvb column
 * @method     ChildAliPmbonus findOneByTotal(string $total) Return the first ChildAliPmbonus filtered by the total column
 * @method     ChildAliPmbonus findOneByMdate(string $mdate) Return the first ChildAliPmbonus filtered by the mdate column
 * @method     ChildAliPmbonus findOneByMonthPv(string $month_pv) Return the first ChildAliPmbonus filtered by the month_pv column
 * @method     ChildAliPmbonus findOneByMpos(string $mpos) Return the first ChildAliPmbonus filtered by the mpos column *

 * @method     ChildAliPmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliPmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliPmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPmbonus requireOneById(int $id) Return the first ChildAliPmbonus filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByRcode(int $rcode) Return the first ChildAliPmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByMcode(string $mcode) Return the first ChildAliPmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByStatus(string $status) Return the first ChildAliPmbonus filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByPv(string $pv) Return the first ChildAliPmbonus filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByPvb(string $pvb) Return the first ChildAliPmbonus filtered by the pvb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByTotal(string $total) Return the first ChildAliPmbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByMdate(string $mdate) Return the first ChildAliPmbonus filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByMonthPv(string $month_pv) Return the first ChildAliPmbonus filtered by the month_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPmbonus requireOneByMpos(string $mpos) Return the first ChildAliPmbonus filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPmbonus objects based on current ModelCriteria
 * @method     ChildAliPmbonus[]|ObjectCollection findById(int $id) Return ChildAliPmbonus objects filtered by the id column
 * @method     ChildAliPmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliPmbonus objects filtered by the rcode column
 * @method     ChildAliPmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliPmbonus objects filtered by the mcode column
 * @method     ChildAliPmbonus[]|ObjectCollection findByStatus(string $status) Return ChildAliPmbonus objects filtered by the status column
 * @method     ChildAliPmbonus[]|ObjectCollection findByPv(string $pv) Return ChildAliPmbonus objects filtered by the pv column
 * @method     ChildAliPmbonus[]|ObjectCollection findByPvb(string $pvb) Return ChildAliPmbonus objects filtered by the pvb column
 * @method     ChildAliPmbonus[]|ObjectCollection findByTotal(string $total) Return ChildAliPmbonus objects filtered by the total column
 * @method     ChildAliPmbonus[]|ObjectCollection findByMdate(string $mdate) Return ChildAliPmbonus objects filtered by the mdate column
 * @method     ChildAliPmbonus[]|ObjectCollection findByMonthPv(string $month_pv) Return ChildAliPmbonus objects filtered by the month_pv column
 * @method     ChildAliPmbonus[]|ObjectCollection findByMpos(string $mpos) Return ChildAliPmbonus objects filtered by the mpos column
 * @method     ChildAliPmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliPmbonusQuery();
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
     * @return ChildAliPmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliPmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliPmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliPmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, status, pv, pvb, total, mdate, month_pv, mpos FROM ali_pmbonus WHERE id = :p0';
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
            /** @var ChildAliPmbonus $obj */
            $obj = new ChildAliPmbonus();
            $obj->hydrate($row);
            AliPmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliPmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliPmbonusTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliPmbonusTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the pv column
     *
     * Example usage:
     * <code>
     * $query->filterByPv(1234); // WHERE pv = 1234
     * $query->filterByPv(array(12, 34)); // WHERE pv IN (12, 34)
     * $query->filterByPv(array('min' => 12)); // WHERE pv > 12
     * </code>
     *
     * @param     mixed $pv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_PV, $pv, $comparison);
    }

    /**
     * Filter the query on the pvb column
     *
     * Example usage:
     * <code>
     * $query->filterByPvb(1234); // WHERE pvb = 1234
     * $query->filterByPvb(array(12, 34)); // WHERE pvb IN (12, 34)
     * $query->filterByPvb(array('min' => 12)); // WHERE pvb > 12
     * </code>
     *
     * @param     mixed $pvb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByPvb($pvb = null, $comparison = null)
    {
        if (is_array($pvb)) {
            $useMinMax = false;
            if (isset($pvb['min'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_PVB, $pvb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvb['max'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_PVB, $pvb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_PVB, $pvb, $comparison);
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
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the mdate column
     *
     * Example usage:
     * <code>
     * $query->filterByMdate('2011-03-14'); // WHERE mdate = '2011-03-14'
     * $query->filterByMdate('now'); // WHERE mdate = '2011-03-14'
     * $query->filterByMdate(array('max' => 'yesterday')); // WHERE mdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $mdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliPmbonusTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_MDATE, $mdate, $comparison);
    }

    /**
     * Filter the query on the month_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByMonthPv('fooValue');   // WHERE month_pv = 'fooValue'
     * $query->filterByMonthPv('%fooValue%', Criteria::LIKE); // WHERE month_pv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $monthPv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByMonthPv($monthPv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($monthPv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_MONTH_PV, $monthPv, $comparison);
    }

    /**
     * Filter the query on the mpos column
     *
     * Example usage:
     * <code>
     * $query->filterByMpos('fooValue');   // WHERE mpos = 'fooValue'
     * $query->filterByMpos('%fooValue%', Criteria::LIKE); // WHERE mpos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mpos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPmbonusTableMap::COL_MPOS, $mpos, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPmbonus $aliPmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliPmbonusQuery The current query, for fluid interface
     */
    public function prune($aliPmbonus = null)
    {
        if ($aliPmbonus) {
            $this->addUsingAlias(AliPmbonusTableMap::COL_ID, $aliPmbonus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_pmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPmbonusTableMap::clearInstancePool();
            AliPmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPmbonusQuery
