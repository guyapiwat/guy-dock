<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliSpecialPointGroup as ChildAliSpecialPointGroup;
use CciOrm\CciOrm\AliSpecialPointGroupQuery as ChildAliSpecialPointGroupQuery;
use CciOrm\CciOrm\Map\AliSpecialPointGroupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_special_point_group' table.
 *
 *
 *
 * @method     ChildAliSpecialPointGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliSpecialPointGroupQuery orderByVipId($order = Criteria::ASC) Order by the vip_id column
 * @method     ChildAliSpecialPointGroupQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliSpecialPointGroupQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliSpecialPointGroupQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliSpecialPointGroupQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliSpecialPointGroupQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliSpecialPointGroupQuery orderByHealMouth($order = Criteria::ASC) Order by the heal_mouth column
 * @method     ChildAliSpecialPointGroupQuery orderByTtime($order = Criteria::ASC) Order by the ttime column
 *
 * @method     ChildAliSpecialPointGroupQuery groupById() Group by the id column
 * @method     ChildAliSpecialPointGroupQuery groupByVipId() Group by the vip_id column
 * @method     ChildAliSpecialPointGroupQuery groupBySadate() Group by the sadate column
 * @method     ChildAliSpecialPointGroupQuery groupByMcode() Group by the mcode column
 * @method     ChildAliSpecialPointGroupQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliSpecialPointGroupQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliSpecialPointGroupQuery groupByUid() Group by the uid column
 * @method     ChildAliSpecialPointGroupQuery groupByHealMouth() Group by the heal_mouth column
 * @method     ChildAliSpecialPointGroupQuery groupByTtime() Group by the ttime column
 *
 * @method     ChildAliSpecialPointGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSpecialPointGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSpecialPointGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSpecialPointGroupQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSpecialPointGroupQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSpecialPointGroupQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSpecialPointGroup findOne(ConnectionInterface $con = null) Return the first ChildAliSpecialPointGroup matching the query
 * @method     ChildAliSpecialPointGroup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSpecialPointGroup matching the query, or a new ChildAliSpecialPointGroup object populated from the query conditions when no match is found
 *
 * @method     ChildAliSpecialPointGroup findOneById(int $id) Return the first ChildAliSpecialPointGroup filtered by the id column
 * @method     ChildAliSpecialPointGroup findOneByVipId(int $vip_id) Return the first ChildAliSpecialPointGroup filtered by the vip_id column
 * @method     ChildAliSpecialPointGroup findOneBySadate(string $sadate) Return the first ChildAliSpecialPointGroup filtered by the sadate column
 * @method     ChildAliSpecialPointGroup findOneByMcode(string $mcode) Return the first ChildAliSpecialPointGroup filtered by the mcode column
 * @method     ChildAliSpecialPointGroup findOneBySaType(string $sa_type) Return the first ChildAliSpecialPointGroup filtered by the sa_type column
 * @method     ChildAliSpecialPointGroup findOneByTotPv(string $tot_pv) Return the first ChildAliSpecialPointGroup filtered by the tot_pv column
 * @method     ChildAliSpecialPointGroup findOneByUid(int $uid) Return the first ChildAliSpecialPointGroup filtered by the uid column
 * @method     ChildAliSpecialPointGroup findOneByHealMouth(string $heal_mouth) Return the first ChildAliSpecialPointGroup filtered by the heal_mouth column
 * @method     ChildAliSpecialPointGroup findOneByTtime(string $ttime) Return the first ChildAliSpecialPointGroup filtered by the ttime column *

 * @method     ChildAliSpecialPointGroup requirePk($key, ConnectionInterface $con = null) Return the ChildAliSpecialPointGroup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOne(ConnectionInterface $con = null) Return the first ChildAliSpecialPointGroup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSpecialPointGroup requireOneById(int $id) Return the first ChildAliSpecialPointGroup filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOneByVipId(int $vip_id) Return the first ChildAliSpecialPointGroup filtered by the vip_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOneBySadate(string $sadate) Return the first ChildAliSpecialPointGroup filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOneByMcode(string $mcode) Return the first ChildAliSpecialPointGroup filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOneBySaType(string $sa_type) Return the first ChildAliSpecialPointGroup filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOneByTotPv(string $tot_pv) Return the first ChildAliSpecialPointGroup filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOneByUid(int $uid) Return the first ChildAliSpecialPointGroup filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOneByHealMouth(string $heal_mouth) Return the first ChildAliSpecialPointGroup filtered by the heal_mouth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSpecialPointGroup requireOneByTtime(string $ttime) Return the first ChildAliSpecialPointGroup filtered by the ttime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSpecialPointGroup objects based on current ModelCriteria
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findById(int $id) Return ChildAliSpecialPointGroup objects filtered by the id column
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findByVipId(int $vip_id) Return ChildAliSpecialPointGroup objects filtered by the vip_id column
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findBySadate(string $sadate) Return ChildAliSpecialPointGroup objects filtered by the sadate column
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findByMcode(string $mcode) Return ChildAliSpecialPointGroup objects filtered by the mcode column
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliSpecialPointGroup objects filtered by the sa_type column
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliSpecialPointGroup objects filtered by the tot_pv column
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findByUid(int $uid) Return ChildAliSpecialPointGroup objects filtered by the uid column
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findByHealMouth(string $heal_mouth) Return ChildAliSpecialPointGroup objects filtered by the heal_mouth column
 * @method     ChildAliSpecialPointGroup[]|ObjectCollection findByTtime(string $ttime) Return ChildAliSpecialPointGroup objects filtered by the ttime column
 * @method     ChildAliSpecialPointGroup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSpecialPointGroupQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSpecialPointGroupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSpecialPointGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSpecialPointGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSpecialPointGroupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSpecialPointGroupQuery) {
            return $criteria;
        }
        $query = new ChildAliSpecialPointGroupQuery();
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
     * @return ChildAliSpecialPointGroup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliSpecialPointGroupTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliSpecialPointGroupTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliSpecialPointGroup A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, vip_id, sadate, mcode, sa_type, tot_pv, uid, heal_mouth, ttime FROM ali_special_point_group WHERE id = :p0';
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
            /** @var ChildAliSpecialPointGroup $obj */
            $obj = new ChildAliSpecialPointGroup();
            $obj->hydrate($row);
            AliSpecialPointGroupTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliSpecialPointGroup|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the vip_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVipId(1234); // WHERE vip_id = 1234
     * $query->filterByVipId(array(12, 34)); // WHERE vip_id IN (12, 34)
     * $query->filterByVipId(array('min' => 12)); // WHERE vip_id > 12
     * </code>
     *
     * @param     mixed $vipId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterByVipId($vipId = null, $comparison = null)
    {
        if (is_array($vipId)) {
            $useMinMax = false;
            if (isset($vipId['min'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_VIP_ID, $vipId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vipId['max'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_VIP_ID, $vipId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_VIP_ID, $vipId, $comparison);
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
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the sa_type column
     *
     * Example usage:
     * <code>
     * $query->filterBySaType('fooValue');   // WHERE sa_type = 'fooValue'
     * $query->filterBySaType('%fooValue%', Criteria::LIKE); // WHERE sa_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_SA_TYPE, $saType, $comparison);
    }

    /**
     * Filter the query on the tot_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotPv(1234); // WHERE tot_pv = 1234
     * $query->filterByTotPv(array(12, 34)); // WHERE tot_pv IN (12, 34)
     * $query->filterByTotPv(array('min' => 12)); // WHERE tot_pv > 12
     * </code>
     *
     * @param     mixed $totPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_TOT_PV, $totPv, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid(1234); // WHERE uid = 1234
     * $query->filterByUid(array(12, 34)); // WHERE uid IN (12, 34)
     * $query->filterByUid(array('min' => 12)); // WHERE uid > 12
     * </code>
     *
     * @param     mixed $uid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (is_array($uid)) {
            $useMinMax = false;
            if (isset($uid['min'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_UID, $uid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uid['max'])) {
                $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_UID, $uid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the heal_mouth column
     *
     * Example usage:
     * <code>
     * $query->filterByHealMouth('fooValue');   // WHERE heal_mouth = 'fooValue'
     * $query->filterByHealMouth('%fooValue%', Criteria::LIKE); // WHERE heal_mouth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $healMouth The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterByHealMouth($healMouth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($healMouth)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_HEAL_MOUTH, $healMouth, $comparison);
    }

    /**
     * Filter the query on the ttime column
     *
     * Example usage:
     * <code>
     * $query->filterByTtime('fooValue');   // WHERE ttime = 'fooValue'
     * $query->filterByTtime('%fooValue%', Criteria::LIKE); // WHERE ttime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ttime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function filterByTtime($ttime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ttime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_TTIME, $ttime, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSpecialPointGroup $aliSpecialPointGroup Object to remove from the list of results
     *
     * @return $this|ChildAliSpecialPointGroupQuery The current query, for fluid interface
     */
    public function prune($aliSpecialPointGroup = null)
    {
        if ($aliSpecialPointGroup) {
            $this->addUsingAlias(AliSpecialPointGroupTableMap::COL_ID, $aliSpecialPointGroup->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_special_point_group table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSpecialPointGroupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSpecialPointGroupTableMap::clearInstancePool();
            AliSpecialPointGroupTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSpecialPointGroupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSpecialPointGroupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSpecialPointGroupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSpecialPointGroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSpecialPointGroupQuery
