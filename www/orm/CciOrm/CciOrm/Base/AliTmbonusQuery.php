<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTmbonus as ChildAliTmbonus;
use CciOrm\CciOrm\AliTmbonusQuery as ChildAliTmbonusQuery;
use CciOrm\CciOrm\Map\AliTmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_tmbonus' table.
 *
 *
 *
 * @method     ChildAliTmbonusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliTmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliTmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTmbonusQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliTmbonusQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliTmbonusQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliTmbonusQuery orderByMb2su($order = Criteria::ASC) Order by the mb2su column
 * @method     ChildAliTmbonusQuery orderByMb2ex($order = Criteria::ASC) Order by the mb2ex column
 * @method     ChildAliTmbonusQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliTmbonusQuery orderByLeftPv($order = Criteria::ASC) Order by the left_pv column
 * @method     ChildAliTmbonusQuery orderByRightPv($order = Criteria::ASC) Order by the right_pv column
 * @method     ChildAliTmbonusQuery orderByBalancePv($order = Criteria::ASC) Order by the balance_pv column
 * @method     ChildAliTmbonusQuery orderByTpoint($order = Criteria::ASC) Order by the tpoint column
 * @method     ChildAliTmbonusQuery orderBySpoint($order = Criteria::ASC) Order by the spoint column
 * @method     ChildAliTmbonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliTmbonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliTmbonusQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliTmbonusQuery groupById() Group by the id column
 * @method     ChildAliTmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliTmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTmbonusQuery groupByNameF() Group by the name_f column
 * @method     ChildAliTmbonusQuery groupByNameT() Group by the name_t column
 * @method     ChildAliTmbonusQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliTmbonusQuery groupByMb2su() Group by the mb2su column
 * @method     ChildAliTmbonusQuery groupByMb2ex() Group by the mb2ex column
 * @method     ChildAliTmbonusQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliTmbonusQuery groupByLeftPv() Group by the left_pv column
 * @method     ChildAliTmbonusQuery groupByRightPv() Group by the right_pv column
 * @method     ChildAliTmbonusQuery groupByBalancePv() Group by the balance_pv column
 * @method     ChildAliTmbonusQuery groupByTpoint() Group by the tpoint column
 * @method     ChildAliTmbonusQuery groupBySpoint() Group by the spoint column
 * @method     ChildAliTmbonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliTmbonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliTmbonusQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliTmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliTmbonus matching the query
 * @method     ChildAliTmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTmbonus matching the query, or a new ChildAliTmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliTmbonus findOneById(int $id) Return the first ChildAliTmbonus filtered by the id column
 * @method     ChildAliTmbonus findOneByRcode(int $rcode) Return the first ChildAliTmbonus filtered by the rcode column
 * @method     ChildAliTmbonus findOneByMcode(string $mcode) Return the first ChildAliTmbonus filtered by the mcode column
 * @method     ChildAliTmbonus findOneByNameF(string $name_f) Return the first ChildAliTmbonus filtered by the name_f column
 * @method     ChildAliTmbonus findOneByNameT(string $name_t) Return the first ChildAliTmbonus filtered by the name_t column
 * @method     ChildAliTmbonus findOneByPosCur(string $pos_cur) Return the first ChildAliTmbonus filtered by the pos_cur column
 * @method     ChildAliTmbonus findOneByMb2su(int $mb2su) Return the first ChildAliTmbonus filtered by the mb2su column
 * @method     ChildAliTmbonus findOneByMb2ex(int $mb2ex) Return the first ChildAliTmbonus filtered by the mb2ex column
 * @method     ChildAliTmbonus findOneByTotPv(string $tot_pv) Return the first ChildAliTmbonus filtered by the tot_pv column
 * @method     ChildAliTmbonus findOneByLeftPv(string $left_pv) Return the first ChildAliTmbonus filtered by the left_pv column
 * @method     ChildAliTmbonus findOneByRightPv(string $right_pv) Return the first ChildAliTmbonus filtered by the right_pv column
 * @method     ChildAliTmbonus findOneByBalancePv(string $balance_pv) Return the first ChildAliTmbonus filtered by the balance_pv column
 * @method     ChildAliTmbonus findOneByTpoint(string $tpoint) Return the first ChildAliTmbonus filtered by the tpoint column
 * @method     ChildAliTmbonus findOneBySpoint(string $spoint) Return the first ChildAliTmbonus filtered by the spoint column
 * @method     ChildAliTmbonus findOneByFdate(string $fdate) Return the first ChildAliTmbonus filtered by the fdate column
 * @method     ChildAliTmbonus findOneByTdate(string $tdate) Return the first ChildAliTmbonus filtered by the tdate column
 * @method     ChildAliTmbonus findOneByLocationbase(int $locationbase) Return the first ChildAliTmbonus filtered by the locationbase column *

 * @method     ChildAliTmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliTmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliTmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTmbonus requireOneById(int $id) Return the first ChildAliTmbonus filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByRcode(int $rcode) Return the first ChildAliTmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByMcode(string $mcode) Return the first ChildAliTmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByNameF(string $name_f) Return the first ChildAliTmbonus filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByNameT(string $name_t) Return the first ChildAliTmbonus filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByPosCur(string $pos_cur) Return the first ChildAliTmbonus filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByMb2su(int $mb2su) Return the first ChildAliTmbonus filtered by the mb2su column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByMb2ex(int $mb2ex) Return the first ChildAliTmbonus filtered by the mb2ex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByTotPv(string $tot_pv) Return the first ChildAliTmbonus filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByLeftPv(string $left_pv) Return the first ChildAliTmbonus filtered by the left_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByRightPv(string $right_pv) Return the first ChildAliTmbonus filtered by the right_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByBalancePv(string $balance_pv) Return the first ChildAliTmbonus filtered by the balance_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByTpoint(string $tpoint) Return the first ChildAliTmbonus filtered by the tpoint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneBySpoint(string $spoint) Return the first ChildAliTmbonus filtered by the spoint column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByFdate(string $fdate) Return the first ChildAliTmbonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByTdate(string $tdate) Return the first ChildAliTmbonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTmbonus requireOneByLocationbase(int $locationbase) Return the first ChildAliTmbonus filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTmbonus objects based on current ModelCriteria
 * @method     ChildAliTmbonus[]|ObjectCollection findById(int $id) Return ChildAliTmbonus objects filtered by the id column
 * @method     ChildAliTmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliTmbonus objects filtered by the rcode column
 * @method     ChildAliTmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTmbonus objects filtered by the mcode column
 * @method     ChildAliTmbonus[]|ObjectCollection findByNameF(string $name_f) Return ChildAliTmbonus objects filtered by the name_f column
 * @method     ChildAliTmbonus[]|ObjectCollection findByNameT(string $name_t) Return ChildAliTmbonus objects filtered by the name_t column
 * @method     ChildAliTmbonus[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliTmbonus objects filtered by the pos_cur column
 * @method     ChildAliTmbonus[]|ObjectCollection findByMb2su(int $mb2su) Return ChildAliTmbonus objects filtered by the mb2su column
 * @method     ChildAliTmbonus[]|ObjectCollection findByMb2ex(int $mb2ex) Return ChildAliTmbonus objects filtered by the mb2ex column
 * @method     ChildAliTmbonus[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliTmbonus objects filtered by the tot_pv column
 * @method     ChildAliTmbonus[]|ObjectCollection findByLeftPv(string $left_pv) Return ChildAliTmbonus objects filtered by the left_pv column
 * @method     ChildAliTmbonus[]|ObjectCollection findByRightPv(string $right_pv) Return ChildAliTmbonus objects filtered by the right_pv column
 * @method     ChildAliTmbonus[]|ObjectCollection findByBalancePv(string $balance_pv) Return ChildAliTmbonus objects filtered by the balance_pv column
 * @method     ChildAliTmbonus[]|ObjectCollection findByTpoint(string $tpoint) Return ChildAliTmbonus objects filtered by the tpoint column
 * @method     ChildAliTmbonus[]|ObjectCollection findBySpoint(string $spoint) Return ChildAliTmbonus objects filtered by the spoint column
 * @method     ChildAliTmbonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliTmbonus objects filtered by the fdate column
 * @method     ChildAliTmbonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliTmbonus objects filtered by the tdate column
 * @method     ChildAliTmbonus[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliTmbonus objects filtered by the locationbase column
 * @method     ChildAliTmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliTmbonusQuery();
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
     * @return ChildAliTmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, name_f, name_t, pos_cur, mb2su, mb2ex, tot_pv, left_pv, right_pv, balance_pv, tpoint, spoint, fdate, tdate, locationbase FROM ali_tmbonus WHERE id = :p0';
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
            /** @var ChildAliTmbonus $obj */
            $obj = new ChildAliTmbonus();
            $obj->hydrate($row);
            AliTmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTmbonusTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTmbonusTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the mb2su column
     *
     * Example usage:
     * <code>
     * $query->filterByMb2su(1234); // WHERE mb2su = 1234
     * $query->filterByMb2su(array(12, 34)); // WHERE mb2su IN (12, 34)
     * $query->filterByMb2su(array('min' => 12)); // WHERE mb2su > 12
     * </code>
     *
     * @param     mixed $mb2su The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByMb2su($mb2su = null, $comparison = null)
    {
        if (is_array($mb2su)) {
            $useMinMax = false;
            if (isset($mb2su['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_MB2SU, $mb2su['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mb2su['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_MB2SU, $mb2su['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_MB2SU, $mb2su, $comparison);
    }

    /**
     * Filter the query on the mb2ex column
     *
     * Example usage:
     * <code>
     * $query->filterByMb2ex(1234); // WHERE mb2ex = 1234
     * $query->filterByMb2ex(array(12, 34)); // WHERE mb2ex IN (12, 34)
     * $query->filterByMb2ex(array('min' => 12)); // WHERE mb2ex > 12
     * </code>
     *
     * @param     mixed $mb2ex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByMb2ex($mb2ex = null, $comparison = null)
    {
        if (is_array($mb2ex)) {
            $useMinMax = false;
            if (isset($mb2ex['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_MB2EX, $mb2ex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mb2ex['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_MB2EX, $mb2ex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_MB2EX, $mb2ex, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_TOT_PV, $totPv, $comparison);
    }

    /**
     * Filter the query on the left_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByLeftPv(1234); // WHERE left_pv = 1234
     * $query->filterByLeftPv(array(12, 34)); // WHERE left_pv IN (12, 34)
     * $query->filterByLeftPv(array('min' => 12)); // WHERE left_pv > 12
     * </code>
     *
     * @param     mixed $leftPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByLeftPv($leftPv = null, $comparison = null)
    {
        if (is_array($leftPv)) {
            $useMinMax = false;
            if (isset($leftPv['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_LEFT_PV, $leftPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($leftPv['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_LEFT_PV, $leftPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_LEFT_PV, $leftPv, $comparison);
    }

    /**
     * Filter the query on the right_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByRightPv(1234); // WHERE right_pv = 1234
     * $query->filterByRightPv(array(12, 34)); // WHERE right_pv IN (12, 34)
     * $query->filterByRightPv(array('min' => 12)); // WHERE right_pv > 12
     * </code>
     *
     * @param     mixed $rightPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByRightPv($rightPv = null, $comparison = null)
    {
        if (is_array($rightPv)) {
            $useMinMax = false;
            if (isset($rightPv['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_RIGHT_PV, $rightPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rightPv['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_RIGHT_PV, $rightPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_RIGHT_PV, $rightPv, $comparison);
    }

    /**
     * Filter the query on the balance_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByBalancePv(1234); // WHERE balance_pv = 1234
     * $query->filterByBalancePv(array(12, 34)); // WHERE balance_pv IN (12, 34)
     * $query->filterByBalancePv(array('min' => 12)); // WHERE balance_pv > 12
     * </code>
     *
     * @param     mixed $balancePv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByBalancePv($balancePv = null, $comparison = null)
    {
        if (is_array($balancePv)) {
            $useMinMax = false;
            if (isset($balancePv['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_BALANCE_PV, $balancePv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balancePv['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_BALANCE_PV, $balancePv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_BALANCE_PV, $balancePv, $comparison);
    }

    /**
     * Filter the query on the tpoint column
     *
     * Example usage:
     * <code>
     * $query->filterByTpoint(1234); // WHERE tpoint = 1234
     * $query->filterByTpoint(array(12, 34)); // WHERE tpoint IN (12, 34)
     * $query->filterByTpoint(array('min' => 12)); // WHERE tpoint > 12
     * </code>
     *
     * @param     mixed $tpoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByTpoint($tpoint = null, $comparison = null)
    {
        if (is_array($tpoint)) {
            $useMinMax = false;
            if (isset($tpoint['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_TPOINT, $tpoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tpoint['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_TPOINT, $tpoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_TPOINT, $tpoint, $comparison);
    }

    /**
     * Filter the query on the spoint column
     *
     * Example usage:
     * <code>
     * $query->filterBySpoint(1234); // WHERE spoint = 1234
     * $query->filterBySpoint(array(12, 34)); // WHERE spoint IN (12, 34)
     * $query->filterBySpoint(array('min' => 12)); // WHERE spoint > 12
     * </code>
     *
     * @param     mixed $spoint The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterBySpoint($spoint = null, $comparison = null)
    {
        if (is_array($spoint)) {
            $useMinMax = false;
            if (isset($spoint['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_SPOINT, $spoint['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spoint['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_SPOINT, $spoint['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_SPOINT, $spoint, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliTmbonusTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTmbonusTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTmbonus $aliTmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliTmbonusQuery The current query, for fluid interface
     */
    public function prune($aliTmbonus = null)
    {
        if ($aliTmbonus) {
            $this->addUsingAlias(AliTmbonusTableMap::COL_ID, $aliTmbonus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_tmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTmbonusTableMap::clearInstancePool();
            AliTmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTmbonusQuery
