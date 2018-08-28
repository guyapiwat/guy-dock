<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStatus as ChildAliStatus;
use CciOrm\CciOrm\AliStatusQuery as ChildAliStatusQuery;
use CciOrm\CciOrm\Map\AliStatusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_status' table.
 *
 *
 *
 * @method     ChildAliStatusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliStatusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliStatusQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliStatusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliStatusQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliStatusQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliStatusQuery orderByPvb($order = Criteria::ASC) Order by the pvb column
 * @method     ChildAliStatusQuery orderByMdate($order = Criteria::ASC) Order by the mdate column
 * @method     ChildAliStatusQuery orderBySdate($order = Criteria::ASC) Order by the sdate column
 * @method     ChildAliStatusQuery orderBySatype($order = Criteria::ASC) Order by the satype column
 * @method     ChildAliStatusQuery orderByMonthPv($order = Criteria::ASC) Order by the month_pv column
 * @method     ChildAliStatusQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliStatusQuery orderByRealpos($order = Criteria::ASC) Order by the realpos column
 * @method     ChildAliStatusQuery orderByFirstRegis($order = Criteria::ASC) Order by the first_regis column
 *
 * @method     ChildAliStatusQuery groupById() Group by the id column
 * @method     ChildAliStatusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliStatusQuery groupBySano() Group by the sano column
 * @method     ChildAliStatusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliStatusQuery groupByStatus() Group by the status column
 * @method     ChildAliStatusQuery groupByPv() Group by the pv column
 * @method     ChildAliStatusQuery groupByPvb() Group by the pvb column
 * @method     ChildAliStatusQuery groupByMdate() Group by the mdate column
 * @method     ChildAliStatusQuery groupBySdate() Group by the sdate column
 * @method     ChildAliStatusQuery groupBySatype() Group by the satype column
 * @method     ChildAliStatusQuery groupByMonthPv() Group by the month_pv column
 * @method     ChildAliStatusQuery groupByMpos() Group by the mpos column
 * @method     ChildAliStatusQuery groupByRealpos() Group by the realpos column
 * @method     ChildAliStatusQuery groupByFirstRegis() Group by the first_regis column
 *
 * @method     ChildAliStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliStatusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliStatusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliStatusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliStatus findOne(ConnectionInterface $con = null) Return the first ChildAliStatus matching the query
 * @method     ChildAliStatus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliStatus matching the query, or a new ChildAliStatus object populated from the query conditions when no match is found
 *
 * @method     ChildAliStatus findOneById(int $id) Return the first ChildAliStatus filtered by the id column
 * @method     ChildAliStatus findOneByRcode(int $rcode) Return the first ChildAliStatus filtered by the rcode column
 * @method     ChildAliStatus findOneBySano(string $sano) Return the first ChildAliStatus filtered by the sano column
 * @method     ChildAliStatus findOneByMcode(string $mcode) Return the first ChildAliStatus filtered by the mcode column
 * @method     ChildAliStatus findOneByStatus(string $status) Return the first ChildAliStatus filtered by the status column
 * @method     ChildAliStatus findOneByPv(string $pv) Return the first ChildAliStatus filtered by the pv column
 * @method     ChildAliStatus findOneByPvb(int $pvb) Return the first ChildAliStatus filtered by the pvb column
 * @method     ChildAliStatus findOneByMdate(string $mdate) Return the first ChildAliStatus filtered by the mdate column
 * @method     ChildAliStatus findOneBySdate(string $sdate) Return the first ChildAliStatus filtered by the sdate column
 * @method     ChildAliStatus findOneBySatype(string $satype) Return the first ChildAliStatus filtered by the satype column
 * @method     ChildAliStatus findOneByMonthPv(string $month_pv) Return the first ChildAliStatus filtered by the month_pv column
 * @method     ChildAliStatus findOneByMpos(string $mpos) Return the first ChildAliStatus filtered by the mpos column
 * @method     ChildAliStatus findOneByRealpos(string $realpos) Return the first ChildAliStatus filtered by the realpos column
 * @method     ChildAliStatus findOneByFirstRegis(int $first_regis) Return the first ChildAliStatus filtered by the first_regis column *

 * @method     ChildAliStatus requirePk($key, ConnectionInterface $con = null) Return the ChildAliStatus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOne(ConnectionInterface $con = null) Return the first ChildAliStatus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStatus requireOneById(int $id) Return the first ChildAliStatus filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByRcode(int $rcode) Return the first ChildAliStatus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneBySano(string $sano) Return the first ChildAliStatus filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByMcode(string $mcode) Return the first ChildAliStatus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByStatus(string $status) Return the first ChildAliStatus filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByPv(string $pv) Return the first ChildAliStatus filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByPvb(int $pvb) Return the first ChildAliStatus filtered by the pvb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByMdate(string $mdate) Return the first ChildAliStatus filtered by the mdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneBySdate(string $sdate) Return the first ChildAliStatus filtered by the sdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneBySatype(string $satype) Return the first ChildAliStatus filtered by the satype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByMonthPv(string $month_pv) Return the first ChildAliStatus filtered by the month_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByMpos(string $mpos) Return the first ChildAliStatus filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByRealpos(string $realpos) Return the first ChildAliStatus filtered by the realpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStatus requireOneByFirstRegis(int $first_regis) Return the first ChildAliStatus filtered by the first_regis column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStatus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliStatus objects based on current ModelCriteria
 * @method     ChildAliStatus[]|ObjectCollection findById(int $id) Return ChildAliStatus objects filtered by the id column
 * @method     ChildAliStatus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliStatus objects filtered by the rcode column
 * @method     ChildAliStatus[]|ObjectCollection findBySano(string $sano) Return ChildAliStatus objects filtered by the sano column
 * @method     ChildAliStatus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliStatus objects filtered by the mcode column
 * @method     ChildAliStatus[]|ObjectCollection findByStatus(string $status) Return ChildAliStatus objects filtered by the status column
 * @method     ChildAliStatus[]|ObjectCollection findByPv(string $pv) Return ChildAliStatus objects filtered by the pv column
 * @method     ChildAliStatus[]|ObjectCollection findByPvb(int $pvb) Return ChildAliStatus objects filtered by the pvb column
 * @method     ChildAliStatus[]|ObjectCollection findByMdate(string $mdate) Return ChildAliStatus objects filtered by the mdate column
 * @method     ChildAliStatus[]|ObjectCollection findBySdate(string $sdate) Return ChildAliStatus objects filtered by the sdate column
 * @method     ChildAliStatus[]|ObjectCollection findBySatype(string $satype) Return ChildAliStatus objects filtered by the satype column
 * @method     ChildAliStatus[]|ObjectCollection findByMonthPv(string $month_pv) Return ChildAliStatus objects filtered by the month_pv column
 * @method     ChildAliStatus[]|ObjectCollection findByMpos(string $mpos) Return ChildAliStatus objects filtered by the mpos column
 * @method     ChildAliStatus[]|ObjectCollection findByRealpos(string $realpos) Return ChildAliStatus objects filtered by the realpos column
 * @method     ChildAliStatus[]|ObjectCollection findByFirstRegis(int $first_regis) Return ChildAliStatus objects filtered by the first_regis column
 * @method     ChildAliStatus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliStatusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliStatusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliStatus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliStatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliStatusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliStatusQuery) {
            return $criteria;
        }
        $query = new ChildAliStatusQuery();
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
     * @return ChildAliStatus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliStatusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliStatusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliStatus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, sano, mcode, status, pv, pvb, mdate, sdate, satype, month_pv, mpos, realpos, first_regis FROM ali_status WHERE id = :p0';
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
            /** @var ChildAliStatus $obj */
            $obj = new ChildAliStatus();
            $obj->hydrate($row);
            AliStatusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliStatus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliStatusTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliStatusTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano('fooValue');   // WHERE sano = 'fooValue'
     * $query->filterBySano('%fooValue%', Criteria::LIKE); // WHERE sano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByPvb($pvb = null, $comparison = null)
    {
        if (is_array($pvb)) {
            $useMinMax = false;
            if (isset($pvb['min'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_PVB, $pvb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvb['max'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_PVB, $pvb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_PVB, $pvb, $comparison);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByMdate($mdate = null, $comparison = null)
    {
        if (is_array($mdate)) {
            $useMinMax = false;
            if (isset($mdate['min'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_MDATE, $mdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mdate['max'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_MDATE, $mdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_MDATE, $mdate, $comparison);
    }

    /**
     * Filter the query on the sdate column
     *
     * Example usage:
     * <code>
     * $query->filterBySdate('2011-03-14'); // WHERE sdate = '2011-03-14'
     * $query->filterBySdate('now'); // WHERE sdate = '2011-03-14'
     * $query->filterBySdate(array('max' => 'yesterday')); // WHERE sdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $sdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterBySdate($sdate = null, $comparison = null)
    {
        if (is_array($sdate)) {
            $useMinMax = false;
            if (isset($sdate['min'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_SDATE, $sdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sdate['max'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_SDATE, $sdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_SDATE, $sdate, $comparison);
    }

    /**
     * Filter the query on the satype column
     *
     * Example usage:
     * <code>
     * $query->filterBySatype('fooValue');   // WHERE satype = 'fooValue'
     * $query->filterBySatype('%fooValue%', Criteria::LIKE); // WHERE satype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $satype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterBySatype($satype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($satype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_SATYPE, $satype, $comparison);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByMonthPv($monthPv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($monthPv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_MONTH_PV, $monthPv, $comparison);
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
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_MPOS, $mpos, $comparison);
    }

    /**
     * Filter the query on the realpos column
     *
     * Example usage:
     * <code>
     * $query->filterByRealpos('fooValue');   // WHERE realpos = 'fooValue'
     * $query->filterByRealpos('%fooValue%', Criteria::LIKE); // WHERE realpos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $realpos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByRealpos($realpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($realpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_REALPOS, $realpos, $comparison);
    }

    /**
     * Filter the query on the first_regis column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstRegis(1234); // WHERE first_regis = 1234
     * $query->filterByFirstRegis(array(12, 34)); // WHERE first_regis IN (12, 34)
     * $query->filterByFirstRegis(array('min' => 12)); // WHERE first_regis > 12
     * </code>
     *
     * @param     mixed $firstRegis The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function filterByFirstRegis($firstRegis = null, $comparison = null)
    {
        if (is_array($firstRegis)) {
            $useMinMax = false;
            if (isset($firstRegis['min'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_FIRST_REGIS, $firstRegis['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($firstRegis['max'])) {
                $this->addUsingAlias(AliStatusTableMap::COL_FIRST_REGIS, $firstRegis['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStatusTableMap::COL_FIRST_REGIS, $firstRegis, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliStatus $aliStatus Object to remove from the list of results
     *
     * @return $this|ChildAliStatusQuery The current query, for fluid interface
     */
    public function prune($aliStatus = null)
    {
        if ($aliStatus) {
            $this->addUsingAlias(AliStatusTableMap::COL_ID, $aliStatus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_status table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStatusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliStatusTableMap::clearInstancePool();
            AliStatusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStatusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliStatusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliStatusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliStatusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliStatusQuery
