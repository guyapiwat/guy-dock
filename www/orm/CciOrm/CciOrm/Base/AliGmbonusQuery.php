<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliGmbonus as ChildAliGmbonus;
use CciOrm\CciOrm\AliGmbonusQuery as ChildAliGmbonusQuery;
use CciOrm\CciOrm\Map\AliGmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_gmbonus' table.
 *
 *
 *
 * @method     ChildAliGmbonusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliGmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliGmbonusQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliGmbonusQuery orderByFastBonus($order = Criteria::ASC) Order by the fast_bonus column
 * @method     ChildAliGmbonusQuery orderByCycleBonus($order = Criteria::ASC) Order by the cycle_bonus column
 * @method     ChildAliGmbonusQuery orderByMatchingBonus($order = Criteria::ASC) Order by the matching_bonus column
 * @method     ChildAliGmbonusQuery orderByKeyBonus($order = Criteria::ASC) Order by the key_bonus column
 * @method     ChildAliGmbonusQuery orderByAutoship($order = Criteria::ASC) Order by the autoship column
 * @method     ChildAliGmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliGmbonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliGmbonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliGmbonusQuery orderByBeatoship($order = Criteria::ASC) Order by the beatoship column
 * @method     ChildAliGmbonusQuery orderByBvoucher($order = Criteria::ASC) Order by the bvoucher column
 *
 * @method     ChildAliGmbonusQuery groupById() Group by the id column
 * @method     ChildAliGmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliGmbonusQuery groupByNameT() Group by the name_t column
 * @method     ChildAliGmbonusQuery groupByFastBonus() Group by the fast_bonus column
 * @method     ChildAliGmbonusQuery groupByCycleBonus() Group by the cycle_bonus column
 * @method     ChildAliGmbonusQuery groupByMatchingBonus() Group by the matching_bonus column
 * @method     ChildAliGmbonusQuery groupByKeyBonus() Group by the key_bonus column
 * @method     ChildAliGmbonusQuery groupByAutoship() Group by the autoship column
 * @method     ChildAliGmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliGmbonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliGmbonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliGmbonusQuery groupByBeatoship() Group by the beatoship column
 * @method     ChildAliGmbonusQuery groupByBvoucher() Group by the bvoucher column
 *
 * @method     ChildAliGmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliGmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliGmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliGmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliGmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliGmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliGmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliGmbonus matching the query
 * @method     ChildAliGmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliGmbonus matching the query, or a new ChildAliGmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliGmbonus findOneById(int $id) Return the first ChildAliGmbonus filtered by the id column
 * @method     ChildAliGmbonus findOneByMcode(string $mcode) Return the first ChildAliGmbonus filtered by the mcode column
 * @method     ChildAliGmbonus findOneByNameT(string $name_t) Return the first ChildAliGmbonus filtered by the name_t column
 * @method     ChildAliGmbonus findOneByFastBonus(string $fast_bonus) Return the first ChildAliGmbonus filtered by the fast_bonus column
 * @method     ChildAliGmbonus findOneByCycleBonus(string $cycle_bonus) Return the first ChildAliGmbonus filtered by the cycle_bonus column
 * @method     ChildAliGmbonus findOneByMatchingBonus(string $matching_bonus) Return the first ChildAliGmbonus filtered by the matching_bonus column
 * @method     ChildAliGmbonus findOneByKeyBonus(string $key_bonus) Return the first ChildAliGmbonus filtered by the key_bonus column
 * @method     ChildAliGmbonus findOneByAutoship(string $autoship) Return the first ChildAliGmbonus filtered by the autoship column
 * @method     ChildAliGmbonus findOneByRcode(int $rcode) Return the first ChildAliGmbonus filtered by the rcode column
 * @method     ChildAliGmbonus findOneByFdate(string $fdate) Return the first ChildAliGmbonus filtered by the fdate column
 * @method     ChildAliGmbonus findOneByTdate(string $tdate) Return the first ChildAliGmbonus filtered by the tdate column
 * @method     ChildAliGmbonus findOneByBeatoship(string $beatoship) Return the first ChildAliGmbonus filtered by the beatoship column
 * @method     ChildAliGmbonus findOneByBvoucher(string $bvoucher) Return the first ChildAliGmbonus filtered by the bvoucher column *

 * @method     ChildAliGmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliGmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliGmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliGmbonus requireOneById(int $id) Return the first ChildAliGmbonus filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByMcode(string $mcode) Return the first ChildAliGmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByNameT(string $name_t) Return the first ChildAliGmbonus filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByFastBonus(string $fast_bonus) Return the first ChildAliGmbonus filtered by the fast_bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByCycleBonus(string $cycle_bonus) Return the first ChildAliGmbonus filtered by the cycle_bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByMatchingBonus(string $matching_bonus) Return the first ChildAliGmbonus filtered by the matching_bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByKeyBonus(string $key_bonus) Return the first ChildAliGmbonus filtered by the key_bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByAutoship(string $autoship) Return the first ChildAliGmbonus filtered by the autoship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByRcode(int $rcode) Return the first ChildAliGmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByFdate(string $fdate) Return the first ChildAliGmbonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByTdate(string $tdate) Return the first ChildAliGmbonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByBeatoship(string $beatoship) Return the first ChildAliGmbonus filtered by the beatoship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliGmbonus requireOneByBvoucher(string $bvoucher) Return the first ChildAliGmbonus filtered by the bvoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliGmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliGmbonus objects based on current ModelCriteria
 * @method     ChildAliGmbonus[]|ObjectCollection findById(int $id) Return ChildAliGmbonus objects filtered by the id column
 * @method     ChildAliGmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliGmbonus objects filtered by the mcode column
 * @method     ChildAliGmbonus[]|ObjectCollection findByNameT(string $name_t) Return ChildAliGmbonus objects filtered by the name_t column
 * @method     ChildAliGmbonus[]|ObjectCollection findByFastBonus(string $fast_bonus) Return ChildAliGmbonus objects filtered by the fast_bonus column
 * @method     ChildAliGmbonus[]|ObjectCollection findByCycleBonus(string $cycle_bonus) Return ChildAliGmbonus objects filtered by the cycle_bonus column
 * @method     ChildAliGmbonus[]|ObjectCollection findByMatchingBonus(string $matching_bonus) Return ChildAliGmbonus objects filtered by the matching_bonus column
 * @method     ChildAliGmbonus[]|ObjectCollection findByKeyBonus(string $key_bonus) Return ChildAliGmbonus objects filtered by the key_bonus column
 * @method     ChildAliGmbonus[]|ObjectCollection findByAutoship(string $autoship) Return ChildAliGmbonus objects filtered by the autoship column
 * @method     ChildAliGmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliGmbonus objects filtered by the rcode column
 * @method     ChildAliGmbonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliGmbonus objects filtered by the fdate column
 * @method     ChildAliGmbonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliGmbonus objects filtered by the tdate column
 * @method     ChildAliGmbonus[]|ObjectCollection findByBeatoship(string $beatoship) Return ChildAliGmbonus objects filtered by the beatoship column
 * @method     ChildAliGmbonus[]|ObjectCollection findByBvoucher(string $bvoucher) Return ChildAliGmbonus objects filtered by the bvoucher column
 * @method     ChildAliGmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliGmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliGmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliGmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliGmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliGmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliGmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliGmbonusQuery();
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
     * @return ChildAliGmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliGmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliGmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliGmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, name_t, fast_bonus, cycle_bonus, matching_bonus, key_bonus, autoship, rcode, fdate, tdate, beatoship, bvoucher FROM ali_gmbonus WHERE id = :p0';
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
            /** @var ChildAliGmbonus $obj */
            $obj = new ChildAliGmbonus();
            $obj->hydrate($row);
            AliGmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliGmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliGmbonusTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliGmbonusTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the name_t column
     *
     * Example usage:
     * <code>
     * $query->filterByNameT('fooValue');   // WHERE name_t = 'fooValue'
     * $query->filterByNameT('%fooValue%', Criteria::LIKE); // WHERE name_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the fast_bonus column
     *
     * Example usage:
     * <code>
     * $query->filterByFastBonus(1234); // WHERE fast_bonus = 1234
     * $query->filterByFastBonus(array(12, 34)); // WHERE fast_bonus IN (12, 34)
     * $query->filterByFastBonus(array('min' => 12)); // WHERE fast_bonus > 12
     * </code>
     *
     * @param     mixed $fastBonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByFastBonus($fastBonus = null, $comparison = null)
    {
        if (is_array($fastBonus)) {
            $useMinMax = false;
            if (isset($fastBonus['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_FAST_BONUS, $fastBonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fastBonus['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_FAST_BONUS, $fastBonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_FAST_BONUS, $fastBonus, $comparison);
    }

    /**
     * Filter the query on the cycle_bonus column
     *
     * Example usage:
     * <code>
     * $query->filterByCycleBonus(1234); // WHERE cycle_bonus = 1234
     * $query->filterByCycleBonus(array(12, 34)); // WHERE cycle_bonus IN (12, 34)
     * $query->filterByCycleBonus(array('min' => 12)); // WHERE cycle_bonus > 12
     * </code>
     *
     * @param     mixed $cycleBonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByCycleBonus($cycleBonus = null, $comparison = null)
    {
        if (is_array($cycleBonus)) {
            $useMinMax = false;
            if (isset($cycleBonus['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_CYCLE_BONUS, $cycleBonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cycleBonus['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_CYCLE_BONUS, $cycleBonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_CYCLE_BONUS, $cycleBonus, $comparison);
    }

    /**
     * Filter the query on the matching_bonus column
     *
     * Example usage:
     * <code>
     * $query->filterByMatchingBonus(1234); // WHERE matching_bonus = 1234
     * $query->filterByMatchingBonus(array(12, 34)); // WHERE matching_bonus IN (12, 34)
     * $query->filterByMatchingBonus(array('min' => 12)); // WHERE matching_bonus > 12
     * </code>
     *
     * @param     mixed $matchingBonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByMatchingBonus($matchingBonus = null, $comparison = null)
    {
        if (is_array($matchingBonus)) {
            $useMinMax = false;
            if (isset($matchingBonus['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_MATCHING_BONUS, $matchingBonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matchingBonus['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_MATCHING_BONUS, $matchingBonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_MATCHING_BONUS, $matchingBonus, $comparison);
    }

    /**
     * Filter the query on the key_bonus column
     *
     * Example usage:
     * <code>
     * $query->filterByKeyBonus(1234); // WHERE key_bonus = 1234
     * $query->filterByKeyBonus(array(12, 34)); // WHERE key_bonus IN (12, 34)
     * $query->filterByKeyBonus(array('min' => 12)); // WHERE key_bonus > 12
     * </code>
     *
     * @param     mixed $keyBonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByKeyBonus($keyBonus = null, $comparison = null)
    {
        if (is_array($keyBonus)) {
            $useMinMax = false;
            if (isset($keyBonus['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_KEY_BONUS, $keyBonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($keyBonus['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_KEY_BONUS, $keyBonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_KEY_BONUS, $keyBonus, $comparison);
    }

    /**
     * Filter the query on the autoship column
     *
     * Example usage:
     * <code>
     * $query->filterByAutoship(1234); // WHERE autoship = 1234
     * $query->filterByAutoship(array(12, 34)); // WHERE autoship IN (12, 34)
     * $query->filterByAutoship(array('min' => 12)); // WHERE autoship > 12
     * </code>
     *
     * @param     mixed $autoship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByAutoship($autoship = null, $comparison = null)
    {
        if (is_array($autoship)) {
            $useMinMax = false;
            if (isset($autoship['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_AUTOSHIP, $autoship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($autoship['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_AUTOSHIP, $autoship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_AUTOSHIP, $autoship, $comparison);
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
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the beatoship column
     *
     * Example usage:
     * <code>
     * $query->filterByBeatoship(1234); // WHERE beatoship = 1234
     * $query->filterByBeatoship(array(12, 34)); // WHERE beatoship IN (12, 34)
     * $query->filterByBeatoship(array('min' => 12)); // WHERE beatoship > 12
     * </code>
     *
     * @param     mixed $beatoship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByBeatoship($beatoship = null, $comparison = null)
    {
        if (is_array($beatoship)) {
            $useMinMax = false;
            if (isset($beatoship['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_BEATOSHIP, $beatoship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($beatoship['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_BEATOSHIP, $beatoship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_BEATOSHIP, $beatoship, $comparison);
    }

    /**
     * Filter the query on the bvoucher column
     *
     * Example usage:
     * <code>
     * $query->filterByBvoucher(1234); // WHERE bvoucher = 1234
     * $query->filterByBvoucher(array(12, 34)); // WHERE bvoucher IN (12, 34)
     * $query->filterByBvoucher(array('min' => 12)); // WHERE bvoucher > 12
     * </code>
     *
     * @param     mixed $bvoucher The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function filterByBvoucher($bvoucher = null, $comparison = null)
    {
        if (is_array($bvoucher)) {
            $useMinMax = false;
            if (isset($bvoucher['min'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_BVOUCHER, $bvoucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bvoucher['max'])) {
                $this->addUsingAlias(AliGmbonusTableMap::COL_BVOUCHER, $bvoucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliGmbonusTableMap::COL_BVOUCHER, $bvoucher, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliGmbonus $aliGmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliGmbonusQuery The current query, for fluid interface
     */
    public function prune($aliGmbonus = null)
    {
        if ($aliGmbonus) {
            $this->addUsingAlias(AliGmbonusTableMap::COL_ID, $aliGmbonus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_gmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliGmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliGmbonusTableMap::clearInstancePool();
            AliGmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliGmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliGmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliGmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliGmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliGmbonusQuery
