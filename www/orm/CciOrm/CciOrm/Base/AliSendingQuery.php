<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliSending as ChildAliSending;
use CciOrm\CciOrm\AliSendingQuery as ChildAliSendingQuery;
use CciOrm\CciOrm\Map\AliSendingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_sending' table.
 *
 *
 *
 * @method     ChildAliSendingQuery orderBySid($order = Criteria::ASC) Order by the sid column
 * @method     ChildAliSendingQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliSendingQuery orderByMinpv($order = Criteria::ASC) Order by the minpv column
 * @method     ChildAliSendingQuery orderByMaxpv($order = Criteria::ASC) Order by the maxpv column
 * @method     ChildAliSendingQuery orderByMinweight($order = Criteria::ASC) Order by the minweight column
 * @method     ChildAliSendingQuery orderByMaxweight($order = Criteria::ASC) Order by the maxweight column
 * @method     ChildAliSendingQuery orderByInbound-pcode($order = Criteria::ASC) Order by the inbound-pcode column
 * @method     ChildAliSendingQuery orderByOutbound-pcode($order = Criteria::ASC) Order by the outbound-pcode column
 * @method     ChildAliSendingQuery orderByOverweight-pcode($order = Criteria::ASC) Order by the overweight-pcode column
 *
 * @method     ChildAliSendingQuery groupBySid() Group by the sid column
 * @method     ChildAliSendingQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliSendingQuery groupByMinpv() Group by the minpv column
 * @method     ChildAliSendingQuery groupByMaxpv() Group by the maxpv column
 * @method     ChildAliSendingQuery groupByMinweight() Group by the minweight column
 * @method     ChildAliSendingQuery groupByMaxweight() Group by the maxweight column
 * @method     ChildAliSendingQuery groupByInbound-pcode() Group by the inbound-pcode column
 * @method     ChildAliSendingQuery groupByOutbound-pcode() Group by the outbound-pcode column
 * @method     ChildAliSendingQuery groupByOverweight-pcode() Group by the overweight-pcode column
 *
 * @method     ChildAliSendingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSendingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSendingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSendingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSendingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSendingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSending findOne(ConnectionInterface $con = null) Return the first ChildAliSending matching the query
 * @method     ChildAliSending findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSending matching the query, or a new ChildAliSending object populated from the query conditions when no match is found
 *
 * @method     ChildAliSending findOneBySid(int $sid) Return the first ChildAliSending filtered by the sid column
 * @method     ChildAliSending findOneByLocationbase(string $locationbase) Return the first ChildAliSending filtered by the locationbase column
 * @method     ChildAliSending findOneByMinpv(int $minpv) Return the first ChildAliSending filtered by the minpv column
 * @method     ChildAliSending findOneByMaxpv(int $maxpv) Return the first ChildAliSending filtered by the maxpv column
 * @method     ChildAliSending findOneByMinweight(string $minweight) Return the first ChildAliSending filtered by the minweight column
 * @method     ChildAliSending findOneByMaxweight(string $maxweight) Return the first ChildAliSending filtered by the maxweight column
 * @method     ChildAliSending findOneByInbound-pcode(string $inbound-pcode) Return the first ChildAliSending filtered by the inbound-pcode column
 * @method     ChildAliSending findOneByOutbound-pcode(string $outbound-pcode) Return the first ChildAliSending filtered by the outbound-pcode column
 * @method     ChildAliSending findOneByOverweight-pcode(string $overweight-pcode) Return the first ChildAliSending filtered by the overweight-pcode column *

 * @method     ChildAliSending requirePk($key, ConnectionInterface $con = null) Return the ChildAliSending by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOne(ConnectionInterface $con = null) Return the first ChildAliSending matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSending requireOneBySid(int $sid) Return the first ChildAliSending filtered by the sid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOneByLocationbase(string $locationbase) Return the first ChildAliSending filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOneByMinpv(int $minpv) Return the first ChildAliSending filtered by the minpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOneByMaxpv(int $maxpv) Return the first ChildAliSending filtered by the maxpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOneByMinweight(string $minweight) Return the first ChildAliSending filtered by the minweight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOneByMaxweight(string $maxweight) Return the first ChildAliSending filtered by the maxweight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOneByInbound-pcode(string $inbound-pcode) Return the first ChildAliSending filtered by the inbound-pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOneByOutbound-pcode(string $outbound-pcode) Return the first ChildAliSending filtered by the outbound-pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSending requireOneByOverweight-pcode(string $overweight-pcode) Return the first ChildAliSending filtered by the overweight-pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSending[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSending objects based on current ModelCriteria
 * @method     ChildAliSending[]|ObjectCollection findBySid(int $sid) Return ChildAliSending objects filtered by the sid column
 * @method     ChildAliSending[]|ObjectCollection findByLocationbase(string $locationbase) Return ChildAliSending objects filtered by the locationbase column
 * @method     ChildAliSending[]|ObjectCollection findByMinpv(int $minpv) Return ChildAliSending objects filtered by the minpv column
 * @method     ChildAliSending[]|ObjectCollection findByMaxpv(int $maxpv) Return ChildAliSending objects filtered by the maxpv column
 * @method     ChildAliSending[]|ObjectCollection findByMinweight(string $minweight) Return ChildAliSending objects filtered by the minweight column
 * @method     ChildAliSending[]|ObjectCollection findByMaxweight(string $maxweight) Return ChildAliSending objects filtered by the maxweight column
 * @method     ChildAliSending[]|ObjectCollection findByInbound-pcode(string $inbound-pcode) Return ChildAliSending objects filtered by the inbound-pcode column
 * @method     ChildAliSending[]|ObjectCollection findByOutbound-pcode(string $outbound-pcode) Return ChildAliSending objects filtered by the outbound-pcode column
 * @method     ChildAliSending[]|ObjectCollection findByOverweight-pcode(string $overweight-pcode) Return ChildAliSending objects filtered by the overweight-pcode column
 * @method     ChildAliSending[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSendingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSendingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSending', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSendingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSendingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSendingQuery) {
            return $criteria;
        }
        $query = new ChildAliSendingQuery();
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
     * @return ChildAliSending|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliSendingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliSendingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliSending A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sid, locationbase, minpv, maxpv, minweight, maxweight, inbound-pcode, outbound-pcode, overweight-pcode FROM ali_sending WHERE sid = :p0';
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
            /** @var ChildAliSending $obj */
            $obj = new ChildAliSending();
            $obj->hydrate($row);
            AliSendingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliSending|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliSendingTableMap::COL_SID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliSendingTableMap::COL_SID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the sid column
     *
     * Example usage:
     * <code>
     * $query->filterBySid(1234); // WHERE sid = 1234
     * $query->filterBySid(array(12, 34)); // WHERE sid IN (12, 34)
     * $query->filterBySid(array('min' => 12)); // WHERE sid > 12
     * </code>
     *
     * @param     mixed $sid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterBySid($sid = null, $comparison = null)
    {
        if (is_array($sid)) {
            $useMinMax = false;
            if (isset($sid['min'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_SID, $sid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sid['max'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_SID, $sid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_SID, $sid, $comparison);
    }

    /**
     * Filter the query on the locationbase column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationbase('fooValue');   // WHERE locationbase = 'fooValue'
     * $query->filterByLocationbase('%fooValue%', Criteria::LIKE); // WHERE locationbase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $locationbase The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($locationbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the minpv column
     *
     * Example usage:
     * <code>
     * $query->filterByMinpv(1234); // WHERE minpv = 1234
     * $query->filterByMinpv(array(12, 34)); // WHERE minpv IN (12, 34)
     * $query->filterByMinpv(array('min' => 12)); // WHERE minpv > 12
     * </code>
     *
     * @param     mixed $minpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByMinpv($minpv = null, $comparison = null)
    {
        if (is_array($minpv)) {
            $useMinMax = false;
            if (isset($minpv['min'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_MINPV, $minpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minpv['max'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_MINPV, $minpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_MINPV, $minpv, $comparison);
    }

    /**
     * Filter the query on the maxpv column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxpv(1234); // WHERE maxpv = 1234
     * $query->filterByMaxpv(array(12, 34)); // WHERE maxpv IN (12, 34)
     * $query->filterByMaxpv(array('min' => 12)); // WHERE maxpv > 12
     * </code>
     *
     * @param     mixed $maxpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByMaxpv($maxpv = null, $comparison = null)
    {
        if (is_array($maxpv)) {
            $useMinMax = false;
            if (isset($maxpv['min'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_MAXPV, $maxpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxpv['max'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_MAXPV, $maxpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_MAXPV, $maxpv, $comparison);
    }

    /**
     * Filter the query on the minweight column
     *
     * Example usage:
     * <code>
     * $query->filterByMinweight(1234); // WHERE minweight = 1234
     * $query->filterByMinweight(array(12, 34)); // WHERE minweight IN (12, 34)
     * $query->filterByMinweight(array('min' => 12)); // WHERE minweight > 12
     * </code>
     *
     * @param     mixed $minweight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByMinweight($minweight = null, $comparison = null)
    {
        if (is_array($minweight)) {
            $useMinMax = false;
            if (isset($minweight['min'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_MINWEIGHT, $minweight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minweight['max'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_MINWEIGHT, $minweight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_MINWEIGHT, $minweight, $comparison);
    }

    /**
     * Filter the query on the maxweight column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxweight(1234); // WHERE maxweight = 1234
     * $query->filterByMaxweight(array(12, 34)); // WHERE maxweight IN (12, 34)
     * $query->filterByMaxweight(array('min' => 12)); // WHERE maxweight > 12
     * </code>
     *
     * @param     mixed $maxweight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByMaxweight($maxweight = null, $comparison = null)
    {
        if (is_array($maxweight)) {
            $useMinMax = false;
            if (isset($maxweight['min'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_MAXWEIGHT, $maxweight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxweight['max'])) {
                $this->addUsingAlias(AliSendingTableMap::COL_MAXWEIGHT, $maxweight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_MAXWEIGHT, $maxweight, $comparison);
    }

    /**
     * Filter the query on the inbound-pcode column
     *
     * Example usage:
     * <code>
     * $query->filterByInbound-pcode('fooValue');   // WHERE inbound-pcode = 'fooValue'
     * $query->filterByInbound-pcode('%fooValue%', Criteria::LIKE); // WHERE inbound-pcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inbound-pcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByInbound-pcode($inbound-pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inbound-pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_INBOUND-PCODE, $inbound-pcode, $comparison);
    }

    /**
     * Filter the query on the outbound-pcode column
     *
     * Example usage:
     * <code>
     * $query->filterByOutbound-pcode('fooValue');   // WHERE outbound-pcode = 'fooValue'
     * $query->filterByOutbound-pcode('%fooValue%', Criteria::LIKE); // WHERE outbound-pcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $outbound-pcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByOutbound-pcode($outbound-pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($outbound-pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_OUTBOUND-PCODE, $outbound-pcode, $comparison);
    }

    /**
     * Filter the query on the overweight-pcode column
     *
     * Example usage:
     * <code>
     * $query->filterByOverweight-pcode('fooValue');   // WHERE overweight-pcode = 'fooValue'
     * $query->filterByOverweight-pcode('%fooValue%', Criteria::LIKE); // WHERE overweight-pcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $overweight-pcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function filterByOverweight-pcode($overweight-pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($overweight-pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSendingTableMap::COL_OVERWEIGHT-PCODE, $overweight-pcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSending $aliSending Object to remove from the list of results
     *
     * @return $this|ChildAliSendingQuery The current query, for fluid interface
     */
    public function prune($aliSending = null)
    {
        if ($aliSending) {
            $this->addUsingAlias(AliSendingTableMap::COL_SID, $aliSending->getSid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_sending table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSendingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSendingTableMap::clearInstancePool();
            AliSendingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSendingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSendingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSendingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSendingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSendingQuery
