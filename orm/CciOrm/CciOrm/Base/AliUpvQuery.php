<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliUpv as ChildAliUpv;
use CciOrm\CciOrm\AliUpvQuery as ChildAliUpvQuery;
use CciOrm\CciOrm\Map\AliUpvTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_upv' table.
 *
 *
 *
 * @method     ChildAliUpvQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliUpvQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliUpvQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliUpvQuery orderByBmbonus($order = Criteria::ASC) Order by the bmbonus column
 * @method     ChildAliUpvQuery orderByTotalPv($order = Criteria::ASC) Order by the total_pv column
 * @method     ChildAliUpvQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliUpvQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliUpvQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliUpvQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 *
 * @method     ChildAliUpvQuery groupById() Group by the id column
 * @method     ChildAliUpvQuery groupByRcode() Group by the rcode column
 * @method     ChildAliUpvQuery groupByMcode() Group by the mcode column
 * @method     ChildAliUpvQuery groupByBmbonus() Group by the bmbonus column
 * @method     ChildAliUpvQuery groupByTotalPv() Group by the total_pv column
 * @method     ChildAliUpvQuery groupBySano() Group by the sano column
 * @method     ChildAliUpvQuery groupBySadate() Group by the sadate column
 * @method     ChildAliUpvQuery groupByFdate() Group by the fdate column
 * @method     ChildAliUpvQuery groupByTdate() Group by the tdate column
 *
 * @method     ChildAliUpvQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliUpvQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliUpvQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliUpvQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliUpvQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliUpvQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliUpv findOne(ConnectionInterface $con = null) Return the first ChildAliUpv matching the query
 * @method     ChildAliUpv findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliUpv matching the query, or a new ChildAliUpv object populated from the query conditions when no match is found
 *
 * @method     ChildAliUpv findOneById(int $id) Return the first ChildAliUpv filtered by the id column
 * @method     ChildAliUpv findOneByRcode(int $rcode) Return the first ChildAliUpv filtered by the rcode column
 * @method     ChildAliUpv findOneByMcode(string $mcode) Return the first ChildAliUpv filtered by the mcode column
 * @method     ChildAliUpv findOneByBmbonus(string $bmbonus) Return the first ChildAliUpv filtered by the bmbonus column
 * @method     ChildAliUpv findOneByTotalPv(string $total_pv) Return the first ChildAliUpv filtered by the total_pv column
 * @method     ChildAliUpv findOneBySano(int $sano) Return the first ChildAliUpv filtered by the sano column
 * @method     ChildAliUpv findOneBySadate(string $sadate) Return the first ChildAliUpv filtered by the sadate column
 * @method     ChildAliUpv findOneByFdate(string $fdate) Return the first ChildAliUpv filtered by the fdate column
 * @method     ChildAliUpv findOneByTdate(string $tdate) Return the first ChildAliUpv filtered by the tdate column *

 * @method     ChildAliUpv requirePk($key, ConnectionInterface $con = null) Return the ChildAliUpv by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOne(ConnectionInterface $con = null) Return the first ChildAliUpv matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliUpv requireOneById(int $id) Return the first ChildAliUpv filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOneByRcode(int $rcode) Return the first ChildAliUpv filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOneByMcode(string $mcode) Return the first ChildAliUpv filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOneByBmbonus(string $bmbonus) Return the first ChildAliUpv filtered by the bmbonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOneByTotalPv(string $total_pv) Return the first ChildAliUpv filtered by the total_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOneBySano(int $sano) Return the first ChildAliUpv filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOneBySadate(string $sadate) Return the first ChildAliUpv filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOneByFdate(string $fdate) Return the first ChildAliUpv filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUpv requireOneByTdate(string $tdate) Return the first ChildAliUpv filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliUpv[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliUpv objects based on current ModelCriteria
 * @method     ChildAliUpv[]|ObjectCollection findById(int $id) Return ChildAliUpv objects filtered by the id column
 * @method     ChildAliUpv[]|ObjectCollection findByRcode(int $rcode) Return ChildAliUpv objects filtered by the rcode column
 * @method     ChildAliUpv[]|ObjectCollection findByMcode(string $mcode) Return ChildAliUpv objects filtered by the mcode column
 * @method     ChildAliUpv[]|ObjectCollection findByBmbonus(string $bmbonus) Return ChildAliUpv objects filtered by the bmbonus column
 * @method     ChildAliUpv[]|ObjectCollection findByTotalPv(string $total_pv) Return ChildAliUpv objects filtered by the total_pv column
 * @method     ChildAliUpv[]|ObjectCollection findBySano(int $sano) Return ChildAliUpv objects filtered by the sano column
 * @method     ChildAliUpv[]|ObjectCollection findBySadate(string $sadate) Return ChildAliUpv objects filtered by the sadate column
 * @method     ChildAliUpv[]|ObjectCollection findByFdate(string $fdate) Return ChildAliUpv objects filtered by the fdate column
 * @method     ChildAliUpv[]|ObjectCollection findByTdate(string $tdate) Return ChildAliUpv objects filtered by the tdate column
 * @method     ChildAliUpv[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliUpvQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliUpvQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliUpv', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliUpvQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliUpvQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliUpvQuery) {
            return $criteria;
        }
        $query = new ChildAliUpvQuery();
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
     * @return ChildAliUpv|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliUpvTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliUpvTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliUpv A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, bmbonus, total_pv, sano, sadate, fdate, tdate FROM ali_upv WHERE id = :p0';
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
            /** @var ChildAliUpv $obj */
            $obj = new ChildAliUpv();
            $obj->hydrate($row);
            AliUpvTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliUpv|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliUpvTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliUpvTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the bmbonus column
     *
     * Example usage:
     * <code>
     * $query->filterByBmbonus(1234); // WHERE bmbonus = 1234
     * $query->filterByBmbonus(array(12, 34)); // WHERE bmbonus IN (12, 34)
     * $query->filterByBmbonus(array('min' => 12)); // WHERE bmbonus > 12
     * </code>
     *
     * @param     mixed $bmbonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterByBmbonus($bmbonus = null, $comparison = null)
    {
        if (is_array($bmbonus)) {
            $useMinMax = false;
            if (isset($bmbonus['min'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_BMBONUS, $bmbonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bmbonus['max'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_BMBONUS, $bmbonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_BMBONUS, $bmbonus, $comparison);
    }

    /**
     * Filter the query on the total_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPv(1234); // WHERE total_pv = 1234
     * $query->filterByTotalPv(array(12, 34)); // WHERE total_pv IN (12, 34)
     * $query->filterByTotalPv(array('min' => 12)); // WHERE total_pv > 12
     * </code>
     *
     * @param     mixed $totalPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterByTotalPv($totalPv = null, $comparison = null)
    {
        if (is_array($totalPv)) {
            $useMinMax = false;
            if (isset($totalPv['min'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_TOTAL_PV, $totalPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPv['max'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_TOTAL_PV, $totalPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_TOTAL_PV, $totalPv, $comparison);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano(1234); // WHERE sano = 1234
     * $query->filterBySano(array(12, 34)); // WHERE sano IN (12, 34)
     * $query->filterBySano(array('min' => 12)); // WHERE sano > 12
     * </code>
     *
     * @param     mixed $sano The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (is_array($sano)) {
            $useMinMax = false;
            if (isset($sano['min'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_SANO, $sano['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano['max'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_SANO, $sano['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Filter the query on the sadate column
     *
     * Example usage:
     * <code>
     * $query->filterBySadate('2011-03-14'); // WHERE sadate = '2011-03-14'
     * $query->filterBySadate('now'); // WHERE sadate = '2011-03-14'
     * $query->filterBySadate(array('max' => 'yesterday')); // WHERE sadate > '2011-03-13'
     * </code>
     *
     * @param     mixed $sadate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_SADATE, $sadate, $comparison);
    }

    /**
     * Filter the query on the fdate column
     *
     * Example usage:
     * <code>
     * $query->filterByFdate('2011-03-14'); // WHERE fdate = '2011-03-14'
     * $query->filterByFdate('now'); // WHERE fdate = '2011-03-14'
     * $query->filterByFdate(array('max' => 'yesterday')); // WHERE fdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $fdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_FDATE, $fdate, $comparison);
    }

    /**
     * Filter the query on the tdate column
     *
     * Example usage:
     * <code>
     * $query->filterByTdate('2011-03-14'); // WHERE tdate = '2011-03-14'
     * $query->filterByTdate('now'); // WHERE tdate = '2011-03-14'
     * $query->filterByTdate(array('max' => 'yesterday')); // WHERE tdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $tdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliUpvTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUpvTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliUpv $aliUpv Object to remove from the list of results
     *
     * @return $this|ChildAliUpvQuery The current query, for fluid interface
     */
    public function prune($aliUpv = null)
    {
        if ($aliUpv) {
            $this->addUsingAlias(AliUpvTableMap::COL_ID, $aliUpv->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_upv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliUpvTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliUpvTableMap::clearInstancePool();
            AliUpvTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliUpvTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliUpvTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliUpvTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliUpvTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliUpvQuery
