<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTripPv as ChildAliTripPv;
use CciOrm\CciOrm\AliTripPvQuery as ChildAliTripPvQuery;
use CciOrm\CciOrm\Map\AliTripPvTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_trip_pv' table.
 *
 *
 *
 * @method     ChildAliTripPvQuery orderByBid($order = Criteria::ASC) Order by the bid column
 * @method     ChildAliTripPvQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliTripPvQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTripPvQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliTripPvQuery orderByTotalPv($order = Criteria::ASC) Order by the total_pv column
 * @method     ChildAliTripPvQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliTripPvQuery orderByNpos($order = Criteria::ASC) Order by the npos column
 * @method     ChildAliTripPvQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliTripPvQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 *
 * @method     ChildAliTripPvQuery groupByBid() Group by the bid column
 * @method     ChildAliTripPvQuery groupByRcode() Group by the rcode column
 * @method     ChildAliTripPvQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTripPvQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliTripPvQuery groupByTotalPv() Group by the total_pv column
 * @method     ChildAliTripPvQuery groupByMpos() Group by the mpos column
 * @method     ChildAliTripPvQuery groupByNpos() Group by the npos column
 * @method     ChildAliTripPvQuery groupByFdate() Group by the fdate column
 * @method     ChildAliTripPvQuery groupByTdate() Group by the tdate column
 *
 * @method     ChildAliTripPvQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTripPvQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTripPvQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTripPvQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTripPvQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTripPvQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTripPv findOne(ConnectionInterface $con = null) Return the first ChildAliTripPv matching the query
 * @method     ChildAliTripPv findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTripPv matching the query, or a new ChildAliTripPv object populated from the query conditions when no match is found
 *
 * @method     ChildAliTripPv findOneByBid(int $bid) Return the first ChildAliTripPv filtered by the bid column
 * @method     ChildAliTripPv findOneByRcode(int $rcode) Return the first ChildAliTripPv filtered by the rcode column
 * @method     ChildAliTripPv findOneByMcode(string $mcode) Return the first ChildAliTripPv filtered by the mcode column
 * @method     ChildAliTripPv findOneByUpaCode(string $upa_code) Return the first ChildAliTripPv filtered by the upa_code column
 * @method     ChildAliTripPv findOneByTotalPv(string $total_pv) Return the first ChildAliTripPv filtered by the total_pv column
 * @method     ChildAliTripPv findOneByMpos(string $mpos) Return the first ChildAliTripPv filtered by the mpos column
 * @method     ChildAliTripPv findOneByNpos(string $npos) Return the first ChildAliTripPv filtered by the npos column
 * @method     ChildAliTripPv findOneByFdate(string $fdate) Return the first ChildAliTripPv filtered by the fdate column
 * @method     ChildAliTripPv findOneByTdate(string $tdate) Return the first ChildAliTripPv filtered by the tdate column *

 * @method     ChildAliTripPv requirePk($key, ConnectionInterface $con = null) Return the ChildAliTripPv by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOne(ConnectionInterface $con = null) Return the first ChildAliTripPv matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTripPv requireOneByBid(int $bid) Return the first ChildAliTripPv filtered by the bid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOneByRcode(int $rcode) Return the first ChildAliTripPv filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOneByMcode(string $mcode) Return the first ChildAliTripPv filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOneByUpaCode(string $upa_code) Return the first ChildAliTripPv filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOneByTotalPv(string $total_pv) Return the first ChildAliTripPv filtered by the total_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOneByMpos(string $mpos) Return the first ChildAliTripPv filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOneByNpos(string $npos) Return the first ChildAliTripPv filtered by the npos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOneByFdate(string $fdate) Return the first ChildAliTripPv filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripPv requireOneByTdate(string $tdate) Return the first ChildAliTripPv filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTripPv[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTripPv objects based on current ModelCriteria
 * @method     ChildAliTripPv[]|ObjectCollection findByBid(int $bid) Return ChildAliTripPv objects filtered by the bid column
 * @method     ChildAliTripPv[]|ObjectCollection findByRcode(int $rcode) Return ChildAliTripPv objects filtered by the rcode column
 * @method     ChildAliTripPv[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTripPv objects filtered by the mcode column
 * @method     ChildAliTripPv[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliTripPv objects filtered by the upa_code column
 * @method     ChildAliTripPv[]|ObjectCollection findByTotalPv(string $total_pv) Return ChildAliTripPv objects filtered by the total_pv column
 * @method     ChildAliTripPv[]|ObjectCollection findByMpos(string $mpos) Return ChildAliTripPv objects filtered by the mpos column
 * @method     ChildAliTripPv[]|ObjectCollection findByNpos(string $npos) Return ChildAliTripPv objects filtered by the npos column
 * @method     ChildAliTripPv[]|ObjectCollection findByFdate(string $fdate) Return ChildAliTripPv objects filtered by the fdate column
 * @method     ChildAliTripPv[]|ObjectCollection findByTdate(string $tdate) Return ChildAliTripPv objects filtered by the tdate column
 * @method     ChildAliTripPv[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTripPvQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTripPvQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTripPv', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTripPvQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTripPvQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTripPvQuery) {
            return $criteria;
        }
        $query = new ChildAliTripPvQuery();
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
     * @return ChildAliTripPv|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTripPvTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTripPvTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTripPv A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT bid, rcode, mcode, upa_code, total_pv, mpos, npos, fdate, tdate FROM ali_trip_pv WHERE bid = :p0';
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
            /** @var ChildAliTripPv $obj */
            $obj = new ChildAliTripPv();
            $obj->hydrate($row);
            AliTripPvTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTripPv|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTripPvTableMap::COL_BID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTripPvTableMap::COL_BID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bid column
     *
     * Example usage:
     * <code>
     * $query->filterByBid(1234); // WHERE bid = 1234
     * $query->filterByBid(array(12, 34)); // WHERE bid IN (12, 34)
     * $query->filterByBid(array('min' => 12)); // WHERE bid > 12
     * </code>
     *
     * @param     mixed $bid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByBid($bid = null, $comparison = null)
    {
        if (is_array($bid)) {
            $useMinMax = false;
            if (isset($bid['min'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_BID, $bid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bid['max'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_BID, $bid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_BID, $bid, $comparison);
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
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the upa_code column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaCode('fooValue');   // WHERE upa_code = 'fooValue'
     * $query->filterByUpaCode('%fooValue%', Criteria::LIKE); // WHERE upa_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_UPA_CODE, $upaCode, $comparison);
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
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByTotalPv($totalPv = null, $comparison = null)
    {
        if (is_array($totalPv)) {
            $useMinMax = false;
            if (isset($totalPv['min'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_TOTAL_PV, $totalPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPv['max'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_TOTAL_PV, $totalPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_TOTAL_PV, $totalPv, $comparison);
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
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_MPOS, $mpos, $comparison);
    }

    /**
     * Filter the query on the npos column
     *
     * Example usage:
     * <code>
     * $query->filterByNpos('fooValue');   // WHERE npos = 'fooValue'
     * $query->filterByNpos('%fooValue%', Criteria::LIKE); // WHERE npos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByNpos($npos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_NPOS, $npos, $comparison);
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
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliTripPvTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripPvTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTripPv $aliTripPv Object to remove from the list of results
     *
     * @return $this|ChildAliTripPvQuery The current query, for fluid interface
     */
    public function prune($aliTripPv = null)
    {
        if ($aliTripPv) {
            $this->addUsingAlias(AliTripPvTableMap::COL_BID, $aliTripPv->getBid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_trip_pv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTripPvTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTripPvTableMap::clearInstancePool();
            AliTripPvTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTripPvTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTripPvTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTripPvTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTripPvTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTripPvQuery
