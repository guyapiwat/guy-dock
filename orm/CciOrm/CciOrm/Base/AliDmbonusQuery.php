<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliDmbonus as ChildAliDmbonus;
use CciOrm\CciOrm\AliDmbonusQuery as ChildAliDmbonusQuery;
use CciOrm\CciOrm\Map\AliDmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_dmbonus' table.
 *
 *
 *
 * @method     ChildAliDmbonusQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliDmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliDmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliDmbonusQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliDmbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliDmbonusQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildAliDmbonusQuery orderByBonus($order = Criteria::ASC) Order by the bonus column
 * @method     ChildAliDmbonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliDmbonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliDmbonusQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliDmbonusQuery orderByAdjust($order = Criteria::ASC) Order by the adjust column
 * @method     ChildAliDmbonusQuery orderByPstatus($order = Criteria::ASC) Order by the pstatus column
 * @method     ChildAliDmbonusQuery orderByPrcode($order = Criteria::ASC) Order by the prcode column
 * @method     ChildAliDmbonusQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliDmbonusQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliDmbonusQuery groupByAid() Group by the aid column
 * @method     ChildAliDmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliDmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliDmbonusQuery groupByNameT() Group by the name_t column
 * @method     ChildAliDmbonusQuery groupByTotal() Group by the total column
 * @method     ChildAliDmbonusQuery groupByTax() Group by the tax column
 * @method     ChildAliDmbonusQuery groupByBonus() Group by the bonus column
 * @method     ChildAliDmbonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliDmbonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliDmbonusQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliDmbonusQuery groupByAdjust() Group by the adjust column
 * @method     ChildAliDmbonusQuery groupByPstatus() Group by the pstatus column
 * @method     ChildAliDmbonusQuery groupByPrcode() Group by the prcode column
 * @method     ChildAliDmbonusQuery groupByCrate() Group by the crate column
 * @method     ChildAliDmbonusQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliDmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliDmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliDmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliDmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliDmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliDmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliDmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliDmbonus matching the query
 * @method     ChildAliDmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliDmbonus matching the query, or a new ChildAliDmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliDmbonus findOneByAid(int $aid) Return the first ChildAliDmbonus filtered by the aid column
 * @method     ChildAliDmbonus findOneByRcode(int $rcode) Return the first ChildAliDmbonus filtered by the rcode column
 * @method     ChildAliDmbonus findOneByMcode(string $mcode) Return the first ChildAliDmbonus filtered by the mcode column
 * @method     ChildAliDmbonus findOneByNameT(string $name_t) Return the first ChildAliDmbonus filtered by the name_t column
 * @method     ChildAliDmbonus findOneByTotal(string $total) Return the first ChildAliDmbonus filtered by the total column
 * @method     ChildAliDmbonus findOneByTax(string $tax) Return the first ChildAliDmbonus filtered by the tax column
 * @method     ChildAliDmbonus findOneByBonus(string $bonus) Return the first ChildAliDmbonus filtered by the bonus column
 * @method     ChildAliDmbonus findOneByFdate(string $fdate) Return the first ChildAliDmbonus filtered by the fdate column
 * @method     ChildAliDmbonus findOneByTdate(string $tdate) Return the first ChildAliDmbonus filtered by the tdate column
 * @method     ChildAliDmbonus findOneByPosCur(string $pos_cur) Return the first ChildAliDmbonus filtered by the pos_cur column
 * @method     ChildAliDmbonus findOneByAdjust(string $adjust) Return the first ChildAliDmbonus filtered by the adjust column
 * @method     ChildAliDmbonus findOneByPstatus(int $pstatus) Return the first ChildAliDmbonus filtered by the pstatus column
 * @method     ChildAliDmbonus findOneByPrcode(int $prcode) Return the first ChildAliDmbonus filtered by the prcode column
 * @method     ChildAliDmbonus findOneByCrate(string $crate) Return the first ChildAliDmbonus filtered by the crate column
 * @method     ChildAliDmbonus findOneByLocationbase(int $locationbase) Return the first ChildAliDmbonus filtered by the locationbase column *

 * @method     ChildAliDmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliDmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliDmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliDmbonus requireOneByAid(int $aid) Return the first ChildAliDmbonus filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByRcode(int $rcode) Return the first ChildAliDmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByMcode(string $mcode) Return the first ChildAliDmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByNameT(string $name_t) Return the first ChildAliDmbonus filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByTotal(string $total) Return the first ChildAliDmbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByTax(string $tax) Return the first ChildAliDmbonus filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByBonus(string $bonus) Return the first ChildAliDmbonus filtered by the bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByFdate(string $fdate) Return the first ChildAliDmbonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByTdate(string $tdate) Return the first ChildAliDmbonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByPosCur(string $pos_cur) Return the first ChildAliDmbonus filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByAdjust(string $adjust) Return the first ChildAliDmbonus filtered by the adjust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByPstatus(int $pstatus) Return the first ChildAliDmbonus filtered by the pstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByPrcode(int $prcode) Return the first ChildAliDmbonus filtered by the prcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByCrate(string $crate) Return the first ChildAliDmbonus filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDmbonus requireOneByLocationbase(int $locationbase) Return the first ChildAliDmbonus filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliDmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliDmbonus objects based on current ModelCriteria
 * @method     ChildAliDmbonus[]|ObjectCollection findByAid(int $aid) Return ChildAliDmbonus objects filtered by the aid column
 * @method     ChildAliDmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliDmbonus objects filtered by the rcode column
 * @method     ChildAliDmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliDmbonus objects filtered by the mcode column
 * @method     ChildAliDmbonus[]|ObjectCollection findByNameT(string $name_t) Return ChildAliDmbonus objects filtered by the name_t column
 * @method     ChildAliDmbonus[]|ObjectCollection findByTotal(string $total) Return ChildAliDmbonus objects filtered by the total column
 * @method     ChildAliDmbonus[]|ObjectCollection findByTax(string $tax) Return ChildAliDmbonus objects filtered by the tax column
 * @method     ChildAliDmbonus[]|ObjectCollection findByBonus(string $bonus) Return ChildAliDmbonus objects filtered by the bonus column
 * @method     ChildAliDmbonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliDmbonus objects filtered by the fdate column
 * @method     ChildAliDmbonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliDmbonus objects filtered by the tdate column
 * @method     ChildAliDmbonus[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliDmbonus objects filtered by the pos_cur column
 * @method     ChildAliDmbonus[]|ObjectCollection findByAdjust(string $adjust) Return ChildAliDmbonus objects filtered by the adjust column
 * @method     ChildAliDmbonus[]|ObjectCollection findByPstatus(int $pstatus) Return ChildAliDmbonus objects filtered by the pstatus column
 * @method     ChildAliDmbonus[]|ObjectCollection findByPrcode(int $prcode) Return ChildAliDmbonus objects filtered by the prcode column
 * @method     ChildAliDmbonus[]|ObjectCollection findByCrate(string $crate) Return ChildAliDmbonus objects filtered by the crate column
 * @method     ChildAliDmbonus[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliDmbonus objects filtered by the locationbase column
 * @method     ChildAliDmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliDmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliDmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliDmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliDmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliDmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliDmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliDmbonusQuery();
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
     * @return ChildAliDmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliDmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliDmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliDmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, name_t, total, tax, bonus, fdate, tdate, pos_cur, adjust, pstatus, prcode, crate, locationbase FROM ali_dmbonus WHERE aid = :p0';
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
            /** @var ChildAliDmbonus $obj */
            $obj = new ChildAliDmbonus();
            $obj->hydrate($row);
            AliDmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliDmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliDmbonusTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliDmbonusTableMap::COL_AID, $keys, Criteria::IN);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_TAX, $tax, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByBonus($bonus = null, $comparison = null)
    {
        if (is_array($bonus)) {
            $useMinMax = false;
            if (isset($bonus['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_BONUS, $bonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bonus['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_BONUS, $bonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_BONUS, $bonus, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the adjust column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjust(1234); // WHERE adjust = 1234
     * $query->filterByAdjust(array(12, 34)); // WHERE adjust IN (12, 34)
     * $query->filterByAdjust(array('min' => 12)); // WHERE adjust > 12
     * </code>
     *
     * @param     mixed $adjust The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByAdjust($adjust = null, $comparison = null)
    {
        if (is_array($adjust)) {
            $useMinMax = false;
            if (isset($adjust['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_ADJUST, $adjust['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjust['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_ADJUST, $adjust['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_ADJUST, $adjust, $comparison);
    }

    /**
     * Filter the query on the pstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByPstatus(1234); // WHERE pstatus = 1234
     * $query->filterByPstatus(array(12, 34)); // WHERE pstatus IN (12, 34)
     * $query->filterByPstatus(array('min' => 12)); // WHERE pstatus > 12
     * </code>
     *
     * @param     mixed $pstatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByPstatus($pstatus = null, $comparison = null)
    {
        if (is_array($pstatus)) {
            $useMinMax = false;
            if (isset($pstatus['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_PSTATUS, $pstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pstatus['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_PSTATUS, $pstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_PSTATUS, $pstatus, $comparison);
    }

    /**
     * Filter the query on the prcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPrcode(1234); // WHERE prcode = 1234
     * $query->filterByPrcode(array(12, 34)); // WHERE prcode IN (12, 34)
     * $query->filterByPrcode(array('min' => 12)); // WHERE prcode > 12
     * </code>
     *
     * @param     mixed $prcode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByPrcode($prcode = null, $comparison = null)
    {
        if (is_array($prcode)) {
            $useMinMax = false;
            if (isset($prcode['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_PRCODE, $prcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prcode['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_PRCODE, $prcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_PRCODE, $prcode, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliDmbonusTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDmbonusTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliDmbonus $aliDmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliDmbonusQuery The current query, for fluid interface
     */
    public function prune($aliDmbonus = null)
    {
        if ($aliDmbonus) {
            $this->addUsingAlias(AliDmbonusTableMap::COL_AID, $aliDmbonus->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_dmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliDmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliDmbonusTableMap::clearInstancePool();
            AliDmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliDmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliDmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliDmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliDmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliDmbonusQuery
