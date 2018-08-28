<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTripBonus as ChildAliTripBonus;
use CciOrm\CciOrm\AliTripBonusQuery as ChildAliTripBonusQuery;
use CciOrm\CciOrm\Map\AliTripBonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_trip_bonus' table.
 *
 *
 *
 * @method     ChildAliTripBonusQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliTripBonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliTripBonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTripBonusQuery orderByPvPrivate($order = Criteria::ASC) Order by the pv_private column
 * @method     ChildAliTripBonusQuery orderByPvTeam($order = Criteria::ASC) Order by the pv_team column
 * @method     ChildAliTripBonusQuery orderByPvUsePrivate($order = Criteria::ASC) Order by the pv_use_private column
 * @method     ChildAliTripBonusQuery orderByPvUseTeam($order = Criteria::ASC) Order by the pv_use_team column
 * @method     ChildAliTripBonusQuery orderByTotalPvPrivate($order = Criteria::ASC) Order by the total_pv_private column
 * @method     ChildAliTripBonusQuery orderByTotalPvTeam($order = Criteria::ASC) Order by the total_pv_team column
 * @method     ChildAliTripBonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliTripBonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliTripBonusQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildAliTripBonusQuery groupByAid() Group by the aid column
 * @method     ChildAliTripBonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliTripBonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTripBonusQuery groupByPvPrivate() Group by the pv_private column
 * @method     ChildAliTripBonusQuery groupByPvTeam() Group by the pv_team column
 * @method     ChildAliTripBonusQuery groupByPvUsePrivate() Group by the pv_use_private column
 * @method     ChildAliTripBonusQuery groupByPvUseTeam() Group by the pv_use_team column
 * @method     ChildAliTripBonusQuery groupByTotalPvPrivate() Group by the total_pv_private column
 * @method     ChildAliTripBonusQuery groupByTotalPvTeam() Group by the total_pv_team column
 * @method     ChildAliTripBonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliTripBonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliTripBonusQuery groupByStatus() Group by the status column
 *
 * @method     ChildAliTripBonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTripBonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTripBonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTripBonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTripBonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTripBonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTripBonus findOne(ConnectionInterface $con = null) Return the first ChildAliTripBonus matching the query
 * @method     ChildAliTripBonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTripBonus matching the query, or a new ChildAliTripBonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliTripBonus findOneByAid(int $aid) Return the first ChildAliTripBonus filtered by the aid column
 * @method     ChildAliTripBonus findOneByRcode(int $rcode) Return the first ChildAliTripBonus filtered by the rcode column
 * @method     ChildAliTripBonus findOneByMcode(string $mcode) Return the first ChildAliTripBonus filtered by the mcode column
 * @method     ChildAliTripBonus findOneByPvPrivate(string $pv_private) Return the first ChildAliTripBonus filtered by the pv_private column
 * @method     ChildAliTripBonus findOneByPvTeam(string $pv_team) Return the first ChildAliTripBonus filtered by the pv_team column
 * @method     ChildAliTripBonus findOneByPvUsePrivate(string $pv_use_private) Return the first ChildAliTripBonus filtered by the pv_use_private column
 * @method     ChildAliTripBonus findOneByPvUseTeam(string $pv_use_team) Return the first ChildAliTripBonus filtered by the pv_use_team column
 * @method     ChildAliTripBonus findOneByTotalPvPrivate(string $total_pv_private) Return the first ChildAliTripBonus filtered by the total_pv_private column
 * @method     ChildAliTripBonus findOneByTotalPvTeam(string $total_pv_team) Return the first ChildAliTripBonus filtered by the total_pv_team column
 * @method     ChildAliTripBonus findOneByFdate(string $fdate) Return the first ChildAliTripBonus filtered by the fdate column
 * @method     ChildAliTripBonus findOneByTdate(string $tdate) Return the first ChildAliTripBonus filtered by the tdate column
 * @method     ChildAliTripBonus findOneByStatus(int $status) Return the first ChildAliTripBonus filtered by the status column *

 * @method     ChildAliTripBonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliTripBonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOne(ConnectionInterface $con = null) Return the first ChildAliTripBonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTripBonus requireOneByAid(int $aid) Return the first ChildAliTripBonus filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByRcode(int $rcode) Return the first ChildAliTripBonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByMcode(string $mcode) Return the first ChildAliTripBonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByPvPrivate(string $pv_private) Return the first ChildAliTripBonus filtered by the pv_private column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByPvTeam(string $pv_team) Return the first ChildAliTripBonus filtered by the pv_team column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByPvUsePrivate(string $pv_use_private) Return the first ChildAliTripBonus filtered by the pv_use_private column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByPvUseTeam(string $pv_use_team) Return the first ChildAliTripBonus filtered by the pv_use_team column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByTotalPvPrivate(string $total_pv_private) Return the first ChildAliTripBonus filtered by the total_pv_private column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByTotalPvTeam(string $total_pv_team) Return the first ChildAliTripBonus filtered by the total_pv_team column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByFdate(string $fdate) Return the first ChildAliTripBonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByTdate(string $tdate) Return the first ChildAliTripBonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTripBonus requireOneByStatus(int $status) Return the first ChildAliTripBonus filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTripBonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTripBonus objects based on current ModelCriteria
 * @method     ChildAliTripBonus[]|ObjectCollection findByAid(int $aid) Return ChildAliTripBonus objects filtered by the aid column
 * @method     ChildAliTripBonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliTripBonus objects filtered by the rcode column
 * @method     ChildAliTripBonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTripBonus objects filtered by the mcode column
 * @method     ChildAliTripBonus[]|ObjectCollection findByPvPrivate(string $pv_private) Return ChildAliTripBonus objects filtered by the pv_private column
 * @method     ChildAliTripBonus[]|ObjectCollection findByPvTeam(string $pv_team) Return ChildAliTripBonus objects filtered by the pv_team column
 * @method     ChildAliTripBonus[]|ObjectCollection findByPvUsePrivate(string $pv_use_private) Return ChildAliTripBonus objects filtered by the pv_use_private column
 * @method     ChildAliTripBonus[]|ObjectCollection findByPvUseTeam(string $pv_use_team) Return ChildAliTripBonus objects filtered by the pv_use_team column
 * @method     ChildAliTripBonus[]|ObjectCollection findByTotalPvPrivate(string $total_pv_private) Return ChildAliTripBonus objects filtered by the total_pv_private column
 * @method     ChildAliTripBonus[]|ObjectCollection findByTotalPvTeam(string $total_pv_team) Return ChildAliTripBonus objects filtered by the total_pv_team column
 * @method     ChildAliTripBonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliTripBonus objects filtered by the fdate column
 * @method     ChildAliTripBonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliTripBonus objects filtered by the tdate column
 * @method     ChildAliTripBonus[]|ObjectCollection findByStatus(int $status) Return ChildAliTripBonus objects filtered by the status column
 * @method     ChildAliTripBonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTripBonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTripBonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTripBonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTripBonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTripBonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTripBonusQuery) {
            return $criteria;
        }
        $query = new ChildAliTripBonusQuery();
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
     * @return ChildAliTripBonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTripBonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTripBonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTripBonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, pv_private, pv_team, pv_use_private, pv_use_team, total_pv_private, total_pv_team, fdate, tdate, status FROM ali_trip_bonus WHERE aid = :p0';
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
            /** @var ChildAliTripBonus $obj */
            $obj = new ChildAliTripBonus();
            $obj->hydrate($row);
            AliTripBonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTripBonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTripBonusTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTripBonusTableMap::COL_AID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the aid column
     *
     * Example usage:
     * <code>
     * $query->filterByAid(1234); // WHERE aid = 1234
     * $query->filterByAid(array(12, 34)); // WHERE aid IN (12, 34)
     * $query->filterByAid(array('min' => 12)); // WHERE aid > 12
     * </code>
     *
     * @param     mixed $aid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the pv_private column
     *
     * Example usage:
     * <code>
     * $query->filterByPvPrivate(1234); // WHERE pv_private = 1234
     * $query->filterByPvPrivate(array(12, 34)); // WHERE pv_private IN (12, 34)
     * $query->filterByPvPrivate(array('min' => 12)); // WHERE pv_private > 12
     * </code>
     *
     * @param     mixed $pvPrivate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByPvPrivate($pvPrivate = null, $comparison = null)
    {
        if (is_array($pvPrivate)) {
            $useMinMax = false;
            if (isset($pvPrivate['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_PV_PRIVATE, $pvPrivate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvPrivate['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_PV_PRIVATE, $pvPrivate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_PV_PRIVATE, $pvPrivate, $comparison);
    }

    /**
     * Filter the query on the pv_team column
     *
     * Example usage:
     * <code>
     * $query->filterByPvTeam(1234); // WHERE pv_team = 1234
     * $query->filterByPvTeam(array(12, 34)); // WHERE pv_team IN (12, 34)
     * $query->filterByPvTeam(array('min' => 12)); // WHERE pv_team > 12
     * </code>
     *
     * @param     mixed $pvTeam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByPvTeam($pvTeam = null, $comparison = null)
    {
        if (is_array($pvTeam)) {
            $useMinMax = false;
            if (isset($pvTeam['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_PV_TEAM, $pvTeam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvTeam['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_PV_TEAM, $pvTeam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_PV_TEAM, $pvTeam, $comparison);
    }

    /**
     * Filter the query on the pv_use_private column
     *
     * Example usage:
     * <code>
     * $query->filterByPvUsePrivate(1234); // WHERE pv_use_private = 1234
     * $query->filterByPvUsePrivate(array(12, 34)); // WHERE pv_use_private IN (12, 34)
     * $query->filterByPvUsePrivate(array('min' => 12)); // WHERE pv_use_private > 12
     * </code>
     *
     * @param     mixed $pvUsePrivate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByPvUsePrivate($pvUsePrivate = null, $comparison = null)
    {
        if (is_array($pvUsePrivate)) {
            $useMinMax = false;
            if (isset($pvUsePrivate['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_PV_USE_PRIVATE, $pvUsePrivate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvUsePrivate['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_PV_USE_PRIVATE, $pvUsePrivate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_PV_USE_PRIVATE, $pvUsePrivate, $comparison);
    }

    /**
     * Filter the query on the pv_use_team column
     *
     * Example usage:
     * <code>
     * $query->filterByPvUseTeam(1234); // WHERE pv_use_team = 1234
     * $query->filterByPvUseTeam(array(12, 34)); // WHERE pv_use_team IN (12, 34)
     * $query->filterByPvUseTeam(array('min' => 12)); // WHERE pv_use_team > 12
     * </code>
     *
     * @param     mixed $pvUseTeam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByPvUseTeam($pvUseTeam = null, $comparison = null)
    {
        if (is_array($pvUseTeam)) {
            $useMinMax = false;
            if (isset($pvUseTeam['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_PV_USE_TEAM, $pvUseTeam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvUseTeam['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_PV_USE_TEAM, $pvUseTeam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_PV_USE_TEAM, $pvUseTeam, $comparison);
    }

    /**
     * Filter the query on the total_pv_private column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPvPrivate(1234); // WHERE total_pv_private = 1234
     * $query->filterByTotalPvPrivate(array(12, 34)); // WHERE total_pv_private IN (12, 34)
     * $query->filterByTotalPvPrivate(array('min' => 12)); // WHERE total_pv_private > 12
     * </code>
     *
     * @param     mixed $totalPvPrivate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByTotalPvPrivate($totalPvPrivate = null, $comparison = null)
    {
        if (is_array($totalPvPrivate)) {
            $useMinMax = false;
            if (isset($totalPvPrivate['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_TOTAL_PV_PRIVATE, $totalPvPrivate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvPrivate['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_TOTAL_PV_PRIVATE, $totalPvPrivate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_TOTAL_PV_PRIVATE, $totalPvPrivate, $comparison);
    }

    /**
     * Filter the query on the total_pv_team column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPvTeam(1234); // WHERE total_pv_team = 1234
     * $query->filterByTotalPvTeam(array(12, 34)); // WHERE total_pv_team IN (12, 34)
     * $query->filterByTotalPvTeam(array('min' => 12)); // WHERE total_pv_team > 12
     * </code>
     *
     * @param     mixed $totalPvTeam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByTotalPvTeam($totalPvTeam = null, $comparison = null)
    {
        if (is_array($totalPvTeam)) {
            $useMinMax = false;
            if (isset($totalPvTeam['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_TOTAL_PV_TEAM, $totalPvTeam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPvTeam['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_TOTAL_PV_TEAM, $totalPvTeam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_TOTAL_PV_TEAM, $totalPvTeam, $comparison);
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
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliTripBonusTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTripBonusTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTripBonus $aliTripBonus Object to remove from the list of results
     *
     * @return $this|ChildAliTripBonusQuery The current query, for fluid interface
     */
    public function prune($aliTripBonus = null)
    {
        if ($aliTripBonus) {
            $this->addUsingAlias(AliTripBonusTableMap::COL_AID, $aliTripBonus->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_trip_bonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTripBonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTripBonusTableMap::clearInstancePool();
            AliTripBonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTripBonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTripBonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTripBonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTripBonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTripBonusQuery
