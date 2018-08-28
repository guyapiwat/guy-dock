<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTmbonus1 as ChildAliTmbonus1;
use CciOrm\CciOrm\AliTmbonus1Query as ChildAliTmbonus1Query;
use CciOrm\CciOrm\Map\AliTmbonus1TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_tmbonus1' table.
 *
 *
 *
 * @method     ChildAliTmbonus1Query orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliTmbonus1Query orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTmbonus1Query orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliTmbonus1Query orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliTmbonus1Query orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliTmbonus1Query orderBySmallbig($order = Criteria::ASC) Order by the smallbig column
 * @method     ChildAliTmbonus1Query orderByPoint($order = Criteria::ASC) Order by the point column
 * @method     ChildAliTmbonus1Query orderBySeats($order = Criteria::ASC) Order by the seats column
 * @method     ChildAliTmbonus1Query orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliTmbonus1Query orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliTmbonus1Query orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliTmbonus1Query orderByFirstseatpoint($order = Criteria::ASC) Order by the firstseatpoint column
 * @method     ChildAliTmbonus1Query orderBySecondseatpoint($order = Criteria::ASC) Order by the secondseatpoint column
 * @method     ChildAliTmbonus1Query orderByFunctionCount($order = Criteria::ASC) Order by the function_count column
 * @method     ChildAliTmbonus1Query orderByGroupvp($order = Criteria::ASC) Order by the groupvp column
 * @method     ChildAliTmbonus1Query orderByCouple($order = Criteria::ASC) Order by the couple column
 * @method     ChildAliTmbonus1Query orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 *
 * @method     ChildAliTmbonus1Query groupById() Group by the id column
 * @method     ChildAliTmbonus1Query groupByMcode() Group by the mcode column
 * @method     ChildAliTmbonus1Query groupByNameF() Group by the name_f column
 * @method     ChildAliTmbonus1Query groupByNameT() Group by the name_t column
 * @method     ChildAliTmbonus1Query groupByRcode() Group by the rcode column
 * @method     ChildAliTmbonus1Query groupBySmallbig() Group by the smallbig column
 * @method     ChildAliTmbonus1Query groupByPoint() Group by the point column
 * @method     ChildAliTmbonus1Query groupBySeats() Group by the seats column
 * @method     ChildAliTmbonus1Query groupByFdate() Group by the fdate column
 * @method     ChildAliTmbonus1Query groupByTdate() Group by the tdate column
 * @method     ChildAliTmbonus1Query groupByLocationbase() Group by the locationbase column
 * @method     ChildAliTmbonus1Query groupByFirstseatpoint() Group by the firstseatpoint column
 * @method     ChildAliTmbonus1Query groupBySecondseatpoint() Group by the secondseatpoint column
 * @method     ChildAliTmbonus1Query groupByFunctionCount() Group by the function_count column
 * @method     ChildAliTmbonus1Query groupByGroupvp() Group by the groupvp column
 * @method     ChildAliTmbonus1Query groupByCouple() Group by the couple column
 * @method     ChildAliTmbonus1Query groupByPosCur() Group by the pos_cur column
 *
 * @method     ChildAliTmbonus1Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTmbonus1Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTmbonus1Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTmbonus1Query leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTmbonus1Query rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTmbonus1Query innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTmbonus1 findOne(ConnectionInterface $con = null) Return the first ChildAliTmbonus1 matching the query
 * @method     ChildAliTmbonus1 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTmbonus1 matching the query, or a new ChildAliTmbonus1 object populated from the query conditions when no match is found
 *
 * @method     ChildAliTmbonus1 findOneById(int $id) Return the first ChildAliTmbonus1 filtered by the id column
 * @method     ChildAliTmbonus1 findOneByMcode(string $mcode) Return the first ChildAliTmbonus1 filtered by the mcode column
 * @method     ChildAliTmbonus1 findOneByNameF(string $name_f) Return the first ChildAliTmbonus1 filtered by the name_f column
 * @method     ChildAliTmbonus1 findOneByNameT(string $name_t) Return the first ChildAliTmbonus1 filtered by the name_t column
 * @method     ChildAliTmbonus1 findOneByRcode(int $rcode) Return the first ChildAliTmbonus1 filtered by the rcode column
 * @method     ChildAliTmbonus1 findOneBySmallbig(int $smallbig) Return the first ChildAliTmbonus1 filtered by the smallbig column
 * @method     ChildAliTmbonus1 findOneByPoint(string $point) Return the first ChildAliTmbonus1 filtered by the point column
 * @method     ChildAliTmbonus1 findOneBySeats(int $seats) Return the first ChildAliTmbonus1 filtered by the seats column
 * @method     ChildAliTmbonus1 findOneByFdate(string $fdate) Return the first ChildAliTmbonus1 filtered by the fdate column
 * @method     ChildAliTmbonus1 findOneByTdate(string $tdate) Return the first ChildAliTmbonus1 filtered by the tdate column
 * @method     ChildAliTmbonus1 findOneByLocationbase(int $locationbase) Return the first ChildAliTmbonus1 filtered by the locationbase column
 * @method     ChildAliTmbonus1 findOneByFirstseatpoint(string $firstseatpoint) Return the first ChildAliTmbonus1 filtered by the firstseatpoint column
 * @method     ChildAliTmbonus1 findOneBySecondseatpoint(string $secondseatpoint) Return the first ChildAliTmbonus1 filtered by the secondseatpoint column
 * @method     ChildAliTmbonus1 findOneByFunctionCount(int $function_count) Return the first ChildAliTmbonus1 filtered by the function_count column
 * @method     ChildAliTmbonus1 findOneByGroupvp(int $groupvp) Return the first ChildAliTmbonus1 filtered by the groupvp column
 * @method     ChildAliTmbonus1 findOneByCouple(int $couple) Return the first ChildAliTmbonus1 filtered by the couple column
 * @method     ChildAliTmbonus1 findOneByPosCur(string $pos_cur) Return the first ChildAliTmbonus1 filtered by the pos_cur column *

 * @method     ChildAliTmbonus1 requirePk($key, ConnectionInterface $con = null) Return the ChildAliTmbonus1 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOne(ConnectionInterface $con = null) Return the first ChildAliTmbonus1 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTmbonus1 requireOneById(int $id) Return the first ChildAliTmbonus1 filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByMcode(string $mcode) Return the first ChildAliTmbonus1 filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByNameF(string $name_f) Return the first ChildAliTmbonus1 filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByNameT(string $name_t) Return the first ChildAliTmbonus1 filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByRcode(int $rcode) Return the first ChildAliTmbonus1 filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneBySmallbig(int $smallbig) Return the first ChildAliTmbonus1 filtered by the smallbig column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByPoint(string $point) Return the first ChildAliTmbonus1 filtered by the point column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneBySeats(int $seats) Return the first ChildAliTmbonus1 filtered by the seats column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByFdate(string $fdate) Return the first ChildAliTmbonus1 filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByTdate(string $tdate) Return the first ChildAliTmbonus1 filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByLocationbase(int $locationbase) Return the first ChildAliTmbonus1 filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByFirstseatpoint(string $firstseatpoint) Return the first ChildAliTmbonus1 filtered by the firstseatpoint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneBySecondseatpoint(string $secondseatpoint) Return the first ChildAliTmbonus1 filtered by the secondseatpoint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByFunctionCount(int $function_count) Return the first ChildAliTmbonus1 filtered by the function_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByGroupvp(int $groupvp) Return the first ChildAliTmbonus1 filtered by the groupvp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByCouple(int $couple) Return the first ChildAliTmbonus1 filtered by the couple column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus1 requireOneByPosCur(string $pos_cur) Return the first ChildAliTmbonus1 filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTmbonus1[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTmbonus1 objects based on current ModelCriteria
 * @method     ChildAliTmbonus1[]|ObjectCollection findById(int $id) Return ChildAliTmbonus1 objects filtered by the id column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTmbonus1 objects filtered by the mcode column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByNameF(string $name_f) Return ChildAliTmbonus1 objects filtered by the name_f column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByNameT(string $name_t) Return ChildAliTmbonus1 objects filtered by the name_t column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByRcode(int $rcode) Return ChildAliTmbonus1 objects filtered by the rcode column
 * @method     ChildAliTmbonus1[]|ObjectCollection findBySmallbig(int $smallbig) Return ChildAliTmbonus1 objects filtered by the smallbig column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByPoint(string $point) Return ChildAliTmbonus1 objects filtered by the point column
 * @method     ChildAliTmbonus1[]|ObjectCollection findBySeats(int $seats) Return ChildAliTmbonus1 objects filtered by the seats column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByFdate(string $fdate) Return ChildAliTmbonus1 objects filtered by the fdate column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByTdate(string $tdate) Return ChildAliTmbonus1 objects filtered by the tdate column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliTmbonus1 objects filtered by the locationbase column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByFirstseatpoint(string $firstseatpoint) Return ChildAliTmbonus1 objects filtered by the firstseatpoint column
 * @method     ChildAliTmbonus1[]|ObjectCollection findBySecondseatpoint(string $secondseatpoint) Return ChildAliTmbonus1 objects filtered by the secondseatpoint column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByFunctionCount(int $function_count) Return ChildAliTmbonus1 objects filtered by the function_count column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByGroupvp(int $groupvp) Return ChildAliTmbonus1 objects filtered by the groupvp column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByCouple(int $couple) Return ChildAliTmbonus1 objects filtered by the couple column
 * @method     ChildAliTmbonus1[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliTmbonus1 objects filtered by the pos_cur column
 * @method     ChildAliTmbonus1[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTmbonus1Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTmbonus1Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTmbonus1', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTmbonus1Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTmbonus1Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTmbonus1Query) {
            return $criteria;
        }
        $query = new ChildAliTmbonus1Query();
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
     * @return ChildAliTmbonus1|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTmbonus1TableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTmbonus1TableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTmbonus1 A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, name_f, name_t, rcode, smallbig, point, seats, fdate, tdate, locationbase, firstseatpoint, secondseatpoint, function_count, groupvp, couple, pos_cur FROM ali_tmbonus1 WHERE id = :p0';
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
            /** @var ChildAliTmbonus1 $obj */
            $obj = new ChildAliTmbonus1();
            $obj->hydrate($row);
            AliTmbonus1TableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTmbonus1|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the name_f column
     *
     * Example usage:
     * <code>
     * $query->filterByNameF('fooValue');   // WHERE name_f = 'fooValue'
     * $query->filterByNameF('%fooValue%', Criteria::LIKE); // WHERE name_f LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameF The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the smallbig column
     *
     * Example usage:
     * <code>
     * $query->filterBySmallbig(1234); // WHERE smallbig = 1234
     * $query->filterBySmallbig(array(12, 34)); // WHERE smallbig IN (12, 34)
     * $query->filterBySmallbig(array('min' => 12)); // WHERE smallbig > 12
     * </code>
     *
     * @param     mixed $smallbig The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterBySmallbig($smallbig = null, $comparison = null)
    {
        if (is_array($smallbig)) {
            $useMinMax = false;
            if (isset($smallbig['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_SMALLBIG, $smallbig['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($smallbig['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_SMALLBIG, $smallbig['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_SMALLBIG, $smallbig, $comparison);
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByPoint($point = null, $comparison = null)
    {
        if (is_array($point)) {
            $useMinMax = false;
            if (isset($point['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_POINT, $point['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($point['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_POINT, $point['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_POINT, $point, $comparison);
    }

    /**
     * Filter the query on the seats column
     *
     * Example usage:
     * <code>
     * $query->filterBySeats(1234); // WHERE seats = 1234
     * $query->filterBySeats(array(12, 34)); // WHERE seats IN (12, 34)
     * $query->filterBySeats(array('min' => 12)); // WHERE seats > 12
     * </code>
     *
     * @param     mixed $seats The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterBySeats($seats = null, $comparison = null)
    {
        if (is_array($seats)) {
            $useMinMax = false;
            if (isset($seats['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_SEATS, $seats['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($seats['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_SEATS, $seats['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_SEATS, $seats, $comparison);
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the locationbase column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationbase(1234); // WHERE locationbase = 1234
     * $query->filterByLocationbase(array(12, 34)); // WHERE locationbase IN (12, 34)
     * $query->filterByLocationbase(array('min' => 12)); // WHERE locationbase > 12
     * </code>
     *
     * @param     mixed $locationbase The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the firstseatpoint column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstseatpoint(1234); // WHERE firstseatpoint = 1234
     * $query->filterByFirstseatpoint(array(12, 34)); // WHERE firstseatpoint IN (12, 34)
     * $query->filterByFirstseatpoint(array('min' => 12)); // WHERE firstseatpoint > 12
     * </code>
     *
     * @param     mixed $firstseatpoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByFirstseatpoint($firstseatpoint = null, $comparison = null)
    {
        if (is_array($firstseatpoint)) {
            $useMinMax = false;
            if (isset($firstseatpoint['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_FIRSTSEATPOINT, $firstseatpoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($firstseatpoint['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_FIRSTSEATPOINT, $firstseatpoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_FIRSTSEATPOINT, $firstseatpoint, $comparison);
    }

    /**
     * Filter the query on the secondseatpoint column
     *
     * Example usage:
     * <code>
     * $query->filterBySecondseatpoint(1234); // WHERE secondseatpoint = 1234
     * $query->filterBySecondseatpoint(array(12, 34)); // WHERE secondseatpoint IN (12, 34)
     * $query->filterBySecondseatpoint(array('min' => 12)); // WHERE secondseatpoint > 12
     * </code>
     *
     * @param     mixed $secondseatpoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterBySecondseatpoint($secondseatpoint = null, $comparison = null)
    {
        if (is_array($secondseatpoint)) {
            $useMinMax = false;
            if (isset($secondseatpoint['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_SECONDSEATPOINT, $secondseatpoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($secondseatpoint['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_SECONDSEATPOINT, $secondseatpoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_SECONDSEATPOINT, $secondseatpoint, $comparison);
    }

    /**
     * Filter the query on the function_count column
     *
     * Example usage:
     * <code>
     * $query->filterByFunctionCount(1234); // WHERE function_count = 1234
     * $query->filterByFunctionCount(array(12, 34)); // WHERE function_count IN (12, 34)
     * $query->filterByFunctionCount(array('min' => 12)); // WHERE function_count > 12
     * </code>
     *
     * @param     mixed $functionCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByFunctionCount($functionCount = null, $comparison = null)
    {
        if (is_array($functionCount)) {
            $useMinMax = false;
            if (isset($functionCount['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_FUNCTION_COUNT, $functionCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($functionCount['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_FUNCTION_COUNT, $functionCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_FUNCTION_COUNT, $functionCount, $comparison);
    }

    /**
     * Filter the query on the groupvp column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupvp(1234); // WHERE groupvp = 1234
     * $query->filterByGroupvp(array(12, 34)); // WHERE groupvp IN (12, 34)
     * $query->filterByGroupvp(array('min' => 12)); // WHERE groupvp > 12
     * </code>
     *
     * @param     mixed $groupvp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByGroupvp($groupvp = null, $comparison = null)
    {
        if (is_array($groupvp)) {
            $useMinMax = false;
            if (isset($groupvp['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_GROUPVP, $groupvp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupvp['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_GROUPVP, $groupvp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_GROUPVP, $groupvp, $comparison);
    }

    /**
     * Filter the query on the couple column
     *
     * Example usage:
     * <code>
     * $query->filterByCouple(1234); // WHERE couple = 1234
     * $query->filterByCouple(array(12, 34)); // WHERE couple IN (12, 34)
     * $query->filterByCouple(array('min' => 12)); // WHERE couple > 12
     * </code>
     *
     * @param     mixed $couple The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByCouple($couple = null, $comparison = null)
    {
        if (is_array($couple)) {
            $useMinMax = false;
            if (isset($couple['min'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_COUPLE, $couple['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($couple['max'])) {
                $this->addUsingAlias(AliTmbonus1TableMap::COL_COUPLE, $couple['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_COUPLE, $couple, $comparison);
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
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonus1TableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTmbonus1 $aliTmbonus1 Object to remove from the list of results
     *
     * @return $this|ChildAliTmbonus1Query The current query, for fluid interface
     */
    public function prune($aliTmbonus1 = null)
    {
        if ($aliTmbonus1) {
            $this->addUsingAlias(AliTmbonus1TableMap::COL_ID, $aliTmbonus1->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_tmbonus1 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonus1TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTmbonus1TableMap::clearInstancePool();
            AliTmbonus1TableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonus1TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTmbonus1TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTmbonus1TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTmbonus1TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTmbonus1Query
