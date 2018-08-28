<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEc as ChildAliEc;
use CciOrm\CciOrm\AliEcQuery as ChildAliEcQuery;
use CciOrm\CciOrm\Map\AliEcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_ec' table.
 *
 *
 *
 * @method     ChildAliEcQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliEcQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliEcQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEcQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliEcQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliEcQuery orderByPoint($order = Criteria::ASC) Order by the point column
 * @method     ChildAliEcQuery orderByShare($order = Criteria::ASC) Order by the share column
 * @method     ChildAliEcQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEcQuery orderByPershare($order = Criteria::ASC) Order by the pershare column
 * @method     ChildAliEcQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliEcQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliEcQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 *
 * @method     ChildAliEcQuery groupById() Group by the id column
 * @method     ChildAliEcQuery groupByRcode() Group by the rcode column
 * @method     ChildAliEcQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEcQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliEcQuery groupByPv() Group by the pv column
 * @method     ChildAliEcQuery groupByPoint() Group by the point column
 * @method     ChildAliEcQuery groupByShare() Group by the share column
 * @method     ChildAliEcQuery groupByTotal() Group by the total column
 * @method     ChildAliEcQuery groupByPershare() Group by the pershare column
 * @method     ChildAliEcQuery groupByFdate() Group by the fdate column
 * @method     ChildAliEcQuery groupByTdate() Group by the tdate column
 * @method     ChildAliEcQuery groupByPosCur() Group by the pos_cur column
 *
 * @method     ChildAliEcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEc findOne(ConnectionInterface $con = null) Return the first ChildAliEc matching the query
 * @method     ChildAliEc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEc matching the query, or a new ChildAliEc object populated from the query conditions when no match is found
 *
 * @method     ChildAliEc findOneById(int $id) Return the first ChildAliEc filtered by the id column
 * @method     ChildAliEc findOneByRcode(int $rcode) Return the first ChildAliEc filtered by the rcode column
 * @method     ChildAliEc findOneByMcode(string $mcode) Return the first ChildAliEc filtered by the mcode column
 * @method     ChildAliEc findOneBySpCode(string $sp_code) Return the first ChildAliEc filtered by the sp_code column
 * @method     ChildAliEc findOneByPv(string $pv) Return the first ChildAliEc filtered by the pv column
 * @method     ChildAliEc findOneByPoint(string $point) Return the first ChildAliEc filtered by the point column
 * @method     ChildAliEc findOneByShare(string $share) Return the first ChildAliEc filtered by the share column
 * @method     ChildAliEc findOneByTotal(string $total) Return the first ChildAliEc filtered by the total column
 * @method     ChildAliEc findOneByPershare(string $pershare) Return the first ChildAliEc filtered by the pershare column
 * @method     ChildAliEc findOneByFdate(string $fdate) Return the first ChildAliEc filtered by the fdate column
 * @method     ChildAliEc findOneByTdate(string $tdate) Return the first ChildAliEc filtered by the tdate column
 * @method     ChildAliEc findOneByPosCur(string $pos_cur) Return the first ChildAliEc filtered by the pos_cur column *

 * @method     ChildAliEc requirePk($key, ConnectionInterface $con = null) Return the ChildAliEc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOne(ConnectionInterface $con = null) Return the first ChildAliEc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEc requireOneById(int $id) Return the first ChildAliEc filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByRcode(int $rcode) Return the first ChildAliEc filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByMcode(string $mcode) Return the first ChildAliEc filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneBySpCode(string $sp_code) Return the first ChildAliEc filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByPv(string $pv) Return the first ChildAliEc filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByPoint(string $point) Return the first ChildAliEc filtered by the point column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByShare(string $share) Return the first ChildAliEc filtered by the share column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByTotal(string $total) Return the first ChildAliEc filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByPershare(string $pershare) Return the first ChildAliEc filtered by the pershare column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByFdate(string $fdate) Return the first ChildAliEc filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByTdate(string $tdate) Return the first ChildAliEc filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEc requireOneByPosCur(string $pos_cur) Return the first ChildAliEc filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEc objects based on current ModelCriteria
 * @method     ChildAliEc[]|ObjectCollection findById(int $id) Return ChildAliEc objects filtered by the id column
 * @method     ChildAliEc[]|ObjectCollection findByRcode(int $rcode) Return ChildAliEc objects filtered by the rcode column
 * @method     ChildAliEc[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEc objects filtered by the mcode column
 * @method     ChildAliEc[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliEc objects filtered by the sp_code column
 * @method     ChildAliEc[]|ObjectCollection findByPv(string $pv) Return ChildAliEc objects filtered by the pv column
 * @method     ChildAliEc[]|ObjectCollection findByPoint(string $point) Return ChildAliEc objects filtered by the point column
 * @method     ChildAliEc[]|ObjectCollection findByShare(string $share) Return ChildAliEc objects filtered by the share column
 * @method     ChildAliEc[]|ObjectCollection findByTotal(string $total) Return ChildAliEc objects filtered by the total column
 * @method     ChildAliEc[]|ObjectCollection findByPershare(string $pershare) Return ChildAliEc objects filtered by the pershare column
 * @method     ChildAliEc[]|ObjectCollection findByFdate(string $fdate) Return ChildAliEc objects filtered by the fdate column
 * @method     ChildAliEc[]|ObjectCollection findByTdate(string $tdate) Return ChildAliEc objects filtered by the tdate column
 * @method     ChildAliEc[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliEc objects filtered by the pos_cur column
 * @method     ChildAliEc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEcQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEcQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEcQuery) {
            return $criteria;
        }
        $query = new ChildAliEcQuery();
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
     * @return ChildAliEc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEcTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEcTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, sp_code, pv, point, share, total, pershare, fdate, tdate, pos_cur FROM ali_ec WHERE id = :p0';
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
            /** @var ChildAliEc $obj */
            $obj = new ChildAliEc();
            $obj->hydrate($row);
            AliEcTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEcTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEcTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the sp_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySpCode('fooValue');   // WHERE sp_code = 'fooValue'
     * $query->filterBySpCode('%fooValue%', Criteria::LIKE); // WHERE sp_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_SP_CODE, $spCode, $comparison);
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
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_PV, $pv, $comparison);
    }

    /**
     * Filter the query on the point column
     *
     * Example usage:
     * <code>
     * $query->filterByPoint(1234); // WHERE point = 1234
     * $query->filterByPoint(array(12, 34)); // WHERE point IN (12, 34)
     * $query->filterByPoint(array('min' => 12)); // WHERE point > 12
     * </code>
     *
     * @param     mixed $point The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByPoint($point = null, $comparison = null)
    {
        if (is_array($point)) {
            $useMinMax = false;
            if (isset($point['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_POINT, $point['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($point['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_POINT, $point['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_POINT, $point, $comparison);
    }

    /**
     * Filter the query on the share column
     *
     * Example usage:
     * <code>
     * $query->filterByShare(1234); // WHERE share = 1234
     * $query->filterByShare(array(12, 34)); // WHERE share IN (12, 34)
     * $query->filterByShare(array('min' => 12)); // WHERE share > 12
     * </code>
     *
     * @param     mixed $share The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByShare($share = null, $comparison = null)
    {
        if (is_array($share)) {
            $useMinMax = false;
            if (isset($share['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_SHARE, $share['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($share['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_SHARE, $share['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_SHARE, $share, $comparison);
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
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the pershare column
     *
     * Example usage:
     * <code>
     * $query->filterByPershare(1234); // WHERE pershare = 1234
     * $query->filterByPershare(array(12, 34)); // WHERE pershare IN (12, 34)
     * $query->filterByPershare(array('min' => 12)); // WHERE pershare > 12
     * </code>
     *
     * @param     mixed $pershare The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByPershare($pershare = null, $comparison = null)
    {
        if (is_array($pershare)) {
            $useMinMax = false;
            if (isset($pershare['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_PERSHARE, $pershare['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pershare['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_PERSHARE, $pershare['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_PERSHARE, $pershare, $comparison);
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
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliEcTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliEcTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the pos_cur column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur('fooValue');   // WHERE pos_cur = 'fooValue'
     * $query->filterByPosCur('%fooValue%', Criteria::LIKE); // WHERE pos_cur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEcTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEc $aliEc Object to remove from the list of results
     *
     * @return $this|ChildAliEcQuery The current query, for fluid interface
     */
    public function prune($aliEc = null)
    {
        if ($aliEc) {
            $this->addUsingAlias(AliEcTableMap::COL_ID, $aliEc->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_ec table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEcTableMap::clearInstancePool();
            AliEcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEcQuery
