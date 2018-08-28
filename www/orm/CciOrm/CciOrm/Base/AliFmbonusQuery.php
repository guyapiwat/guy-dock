<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliFmbonus as ChildAliFmbonus;
use CciOrm\CciOrm\AliFmbonusQuery as ChildAliFmbonusQuery;
use CciOrm\CciOrm\Map\AliFmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_fmbonus' table.
 *
 *
 *
 * @method     ChildAliFmbonusQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliFmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliFmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliFmbonusQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliFmbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliFmbonusQuery orderByTotalR($order = Criteria::ASC) Order by the total_r column
 * @method     ChildAliFmbonusQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildAliFmbonusQuery orderByBonus($order = Criteria::ASC) Order by the bonus column
 * @method     ChildAliFmbonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliFmbonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliFmbonusQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliFmbonusQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliFmbonusQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliFmbonusQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliFmbonusQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliFmbonusQuery orderByPaytype($order = Criteria::ASC) Order by the paytype column
 *
 * @method     ChildAliFmbonusQuery groupByAid() Group by the aid column
 * @method     ChildAliFmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliFmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliFmbonusQuery groupByNameT() Group by the name_t column
 * @method     ChildAliFmbonusQuery groupByTotal() Group by the total column
 * @method     ChildAliFmbonusQuery groupByTotalR() Group by the total_r column
 * @method     ChildAliFmbonusQuery groupByTax() Group by the tax column
 * @method     ChildAliFmbonusQuery groupByBonus() Group by the bonus column
 * @method     ChildAliFmbonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliFmbonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliFmbonusQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliFmbonusQuery groupByCrate() Group by the crate column
 * @method     ChildAliFmbonusQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliFmbonusQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliFmbonusQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliFmbonusQuery groupByPaytype() Group by the paytype column
 *
 * @method     ChildAliFmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliFmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliFmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliFmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliFmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliFmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliFmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliFmbonus matching the query
 * @method     ChildAliFmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliFmbonus matching the query, or a new ChildAliFmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliFmbonus findOneByAid(int $aid) Return the first ChildAliFmbonus filtered by the aid column
 * @method     ChildAliFmbonus findOneByRcode(int $rcode) Return the first ChildAliFmbonus filtered by the rcode column
 * @method     ChildAliFmbonus findOneByMcode(string $mcode) Return the first ChildAliFmbonus filtered by the mcode column
 * @method     ChildAliFmbonus findOneByNameT(string $name_t) Return the first ChildAliFmbonus filtered by the name_t column
 * @method     ChildAliFmbonus findOneByTotal(string $total) Return the first ChildAliFmbonus filtered by the total column
 * @method     ChildAliFmbonus findOneByTotalR(string $total_r) Return the first ChildAliFmbonus filtered by the total_r column
 * @method     ChildAliFmbonus findOneByTax(string $tax) Return the first ChildAliFmbonus filtered by the tax column
 * @method     ChildAliFmbonus findOneByBonus(string $bonus) Return the first ChildAliFmbonus filtered by the bonus column
 * @method     ChildAliFmbonus findOneByFdate(string $fdate) Return the first ChildAliFmbonus filtered by the fdate column
 * @method     ChildAliFmbonus findOneByTdate(string $tdate) Return the first ChildAliFmbonus filtered by the tdate column
 * @method     ChildAliFmbonus findOneByPosCur(string $pos_cur) Return the first ChildAliFmbonus filtered by the pos_cur column
 * @method     ChildAliFmbonus findOneByCrate(string $crate) Return the first ChildAliFmbonus filtered by the crate column
 * @method     ChildAliFmbonus findOneByLocationbase(int $locationbase) Return the first ChildAliFmbonus filtered by the locationbase column
 * @method     ChildAliFmbonus findOneByPaydate(string $paydate) Return the first ChildAliFmbonus filtered by the paydate column
 * @method     ChildAliFmbonus findOneByInvCode(string $inv_code) Return the first ChildAliFmbonus filtered by the inv_code column
 * @method     ChildAliFmbonus findOneByPaytype(int $paytype) Return the first ChildAliFmbonus filtered by the paytype column *

 * @method     ChildAliFmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliFmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliFmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliFmbonus requireOneByAid(int $aid) Return the first ChildAliFmbonus filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByRcode(int $rcode) Return the first ChildAliFmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByMcode(string $mcode) Return the first ChildAliFmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByNameT(string $name_t) Return the first ChildAliFmbonus filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByTotal(string $total) Return the first ChildAliFmbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByTotalR(string $total_r) Return the first ChildAliFmbonus filtered by the total_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByTax(string $tax) Return the first ChildAliFmbonus filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByBonus(string $bonus) Return the first ChildAliFmbonus filtered by the bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByFdate(string $fdate) Return the first ChildAliFmbonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByTdate(string $tdate) Return the first ChildAliFmbonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByPosCur(string $pos_cur) Return the first ChildAliFmbonus filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByCrate(string $crate) Return the first ChildAliFmbonus filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByLocationbase(int $locationbase) Return the first ChildAliFmbonus filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByPaydate(string $paydate) Return the first ChildAliFmbonus filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByInvCode(string $inv_code) Return the first ChildAliFmbonus filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFmbonus requireOneByPaytype(int $paytype) Return the first ChildAliFmbonus filtered by the paytype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliFmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliFmbonus objects based on current ModelCriteria
 * @method     ChildAliFmbonus[]|ObjectCollection findByAid(int $aid) Return ChildAliFmbonus objects filtered by the aid column
 * @method     ChildAliFmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliFmbonus objects filtered by the rcode column
 * @method     ChildAliFmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliFmbonus objects filtered by the mcode column
 * @method     ChildAliFmbonus[]|ObjectCollection findByNameT(string $name_t) Return ChildAliFmbonus objects filtered by the name_t column
 * @method     ChildAliFmbonus[]|ObjectCollection findByTotal(string $total) Return ChildAliFmbonus objects filtered by the total column
 * @method     ChildAliFmbonus[]|ObjectCollection findByTotalR(string $total_r) Return ChildAliFmbonus objects filtered by the total_r column
 * @method     ChildAliFmbonus[]|ObjectCollection findByTax(string $tax) Return ChildAliFmbonus objects filtered by the tax column
 * @method     ChildAliFmbonus[]|ObjectCollection findByBonus(string $bonus) Return ChildAliFmbonus objects filtered by the bonus column
 * @method     ChildAliFmbonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliFmbonus objects filtered by the fdate column
 * @method     ChildAliFmbonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliFmbonus objects filtered by the tdate column
 * @method     ChildAliFmbonus[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliFmbonus objects filtered by the pos_cur column
 * @method     ChildAliFmbonus[]|ObjectCollection findByCrate(string $crate) Return ChildAliFmbonus objects filtered by the crate column
 * @method     ChildAliFmbonus[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliFmbonus objects filtered by the locationbase column
 * @method     ChildAliFmbonus[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliFmbonus objects filtered by the paydate column
 * @method     ChildAliFmbonus[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliFmbonus objects filtered by the inv_code column
 * @method     ChildAliFmbonus[]|ObjectCollection findByPaytype(int $paytype) Return ChildAliFmbonus objects filtered by the paytype column
 * @method     ChildAliFmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliFmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliFmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliFmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliFmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliFmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliFmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliFmbonusQuery();
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
     * @return ChildAliFmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliFmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliFmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliFmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, name_t, total, total_r, tax, bonus, fdate, tdate, pos_cur, crate, locationbase, paydate, inv_code, paytype FROM ali_fmbonus WHERE aid = :p0';
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
            /** @var ChildAliFmbonus $obj */
            $obj = new ChildAliFmbonus();
            $obj->hydrate($row);
            AliFmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliFmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliFmbonusTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliFmbonusTableMap::COL_AID, $keys, Criteria::IN);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the total_r column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalR(1234); // WHERE total_r = 1234
     * $query->filterByTotalR(array(12, 34)); // WHERE total_r IN (12, 34)
     * $query->filterByTotalR(array('min' => 12)); // WHERE total_r > 12
     * </code>
     *
     * @param     mixed $totalR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByTotalR($totalR = null, $comparison = null)
    {
        if (is_array($totalR)) {
            $useMinMax = false;
            if (isset($totalR['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_TOTAL_R, $totalR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalR['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_TOTAL_R, $totalR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_TOTAL_R, $totalR, $comparison);
    }

    /**
     * Filter the query on the tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTax(1234); // WHERE tax = 1234
     * $query->filterByTax(array(12, 34)); // WHERE tax IN (12, 34)
     * $query->filterByTax(array('min' => 12)); // WHERE tax > 12
     * </code>
     *
     * @param     mixed $tax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_TAX, $tax, $comparison);
    }

    /**
     * Filter the query on the bonus column
     *
     * Example usage:
     * <code>
     * $query->filterByBonus(1234); // WHERE bonus = 1234
     * $query->filterByBonus(array(12, 34)); // WHERE bonus IN (12, 34)
     * $query->filterByBonus(array('min' => 12)); // WHERE bonus > 12
     * </code>
     *
     * @param     mixed $bonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByBonus($bonus = null, $comparison = null)
    {
        if (is_array($bonus)) {
            $useMinMax = false;
            if (isset($bonus['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_BONUS, $bonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bonus['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_BONUS, $bonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_BONUS, $bonus, $comparison);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the crate column
     *
     * Example usage:
     * <code>
     * $query->filterByCrate(1234); // WHERE crate = 1234
     * $query->filterByCrate(array(12, 34)); // WHERE crate IN (12, 34)
     * $query->filterByCrate(array('min' => 12)); // WHERE crate > 12
     * </code>
     *
     * @param     mixed $crate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the paydate column
     *
     * Example usage:
     * <code>
     * $query->filterByPaydate('2011-03-14'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate('now'); // WHERE paydate = '2011-03-14'
     * $query->filterByPaydate(array('max' => 'yesterday')); // WHERE paydate > '2011-03-13'
     * </code>
     *
     * @param     mixed $paydate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_PAYDATE, $paydate, $comparison);
    }

    /**
     * Filter the query on the inv_code column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCode('fooValue');   // WHERE inv_code = 'fooValue'
     * $query->filterByInvCode('%fooValue%', Criteria::LIKE); // WHERE inv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the paytype column
     *
     * Example usage:
     * <code>
     * $query->filterByPaytype(1234); // WHERE paytype = 1234
     * $query->filterByPaytype(array(12, 34)); // WHERE paytype IN (12, 34)
     * $query->filterByPaytype(array('min' => 12)); // WHERE paytype > 12
     * </code>
     *
     * @param     mixed $paytype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function filterByPaytype($paytype = null, $comparison = null)
    {
        if (is_array($paytype)) {
            $useMinMax = false;
            if (isset($paytype['min'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_PAYTYPE, $paytype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paytype['max'])) {
                $this->addUsingAlias(AliFmbonusTableMap::COL_PAYTYPE, $paytype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFmbonusTableMap::COL_PAYTYPE, $paytype, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliFmbonus $aliFmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliFmbonusQuery The current query, for fluid interface
     */
    public function prune($aliFmbonus = null)
    {
        if ($aliFmbonus) {
            $this->addUsingAlias(AliFmbonusTableMap::COL_AID, $aliFmbonus->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_fmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliFmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliFmbonusTableMap::clearInstancePool();
            AliFmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliFmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliFmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliFmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliFmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliFmbonusQuery
