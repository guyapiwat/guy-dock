<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliOmbonus as ChildAliOmbonus;
use CciOrm\CciOrm\AliOmbonusQuery as ChildAliOmbonusQuery;
use CciOrm\CciOrm\Map\AliOmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_ombonus' table.
 *
 *
 *
 * @method     ChildAliOmbonusQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliOmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliOmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliOmbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliOmbonusQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildAliOmbonusQuery orderByBonus($order = Criteria::ASC) Order by the bonus column
 * @method     ChildAliOmbonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliOmbonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliOmbonusQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliOmbonusQuery orderByAdjust($order = Criteria::ASC) Order by the adjust column
 * @method     ChildAliOmbonusQuery orderByPstatus($order = Criteria::ASC) Order by the pstatus column
 * @method     ChildAliOmbonusQuery orderByPrcode($order = Criteria::ASC) Order by the prcode column
 * @method     ChildAliOmbonusQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliOmbonusQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliOmbonusQuery groupByAid() Group by the aid column
 * @method     ChildAliOmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliOmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliOmbonusQuery groupByTotal() Group by the total column
 * @method     ChildAliOmbonusQuery groupByTax() Group by the tax column
 * @method     ChildAliOmbonusQuery groupByBonus() Group by the bonus column
 * @method     ChildAliOmbonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliOmbonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliOmbonusQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliOmbonusQuery groupByAdjust() Group by the adjust column
 * @method     ChildAliOmbonusQuery groupByPstatus() Group by the pstatus column
 * @method     ChildAliOmbonusQuery groupByPrcode() Group by the prcode column
 * @method     ChildAliOmbonusQuery groupByCrate() Group by the crate column
 * @method     ChildAliOmbonusQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliOmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliOmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliOmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliOmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliOmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliOmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliOmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliOmbonus matching the query
 * @method     ChildAliOmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliOmbonus matching the query, or a new ChildAliOmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliOmbonus findOneByAid(int $aid) Return the first ChildAliOmbonus filtered by the aid column
 * @method     ChildAliOmbonus findOneByRcode(int $rcode) Return the first ChildAliOmbonus filtered by the rcode column
 * @method     ChildAliOmbonus findOneByMcode(string $mcode) Return the first ChildAliOmbonus filtered by the mcode column
 * @method     ChildAliOmbonus findOneByTotal(string $total) Return the first ChildAliOmbonus filtered by the total column
 * @method     ChildAliOmbonus findOneByTax(string $tax) Return the first ChildAliOmbonus filtered by the tax column
 * @method     ChildAliOmbonus findOneByBonus(string $bonus) Return the first ChildAliOmbonus filtered by the bonus column
 * @method     ChildAliOmbonus findOneByFdate(string $fdate) Return the first ChildAliOmbonus filtered by the fdate column
 * @method     ChildAliOmbonus findOneByTdate(string $tdate) Return the first ChildAliOmbonus filtered by the tdate column
 * @method     ChildAliOmbonus findOneByPosCur(string $pos_cur) Return the first ChildAliOmbonus filtered by the pos_cur column
 * @method     ChildAliOmbonus findOneByAdjust(string $adjust) Return the first ChildAliOmbonus filtered by the adjust column
 * @method     ChildAliOmbonus findOneByPstatus(int $pstatus) Return the first ChildAliOmbonus filtered by the pstatus column
 * @method     ChildAliOmbonus findOneByPrcode(int $prcode) Return the first ChildAliOmbonus filtered by the prcode column
 * @method     ChildAliOmbonus findOneByCrate(string $crate) Return the first ChildAliOmbonus filtered by the crate column
 * @method     ChildAliOmbonus findOneByLocationbase(int $locationbase) Return the first ChildAliOmbonus filtered by the locationbase column *

 * @method     ChildAliOmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliOmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliOmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliOmbonus requireOneByAid(int $aid) Return the first ChildAliOmbonus filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByRcode(int $rcode) Return the first ChildAliOmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByMcode(string $mcode) Return the first ChildAliOmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByTotal(string $total) Return the first ChildAliOmbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByTax(string $tax) Return the first ChildAliOmbonus filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByBonus(string $bonus) Return the first ChildAliOmbonus filtered by the bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByFdate(string $fdate) Return the first ChildAliOmbonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByTdate(string $tdate) Return the first ChildAliOmbonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByPosCur(string $pos_cur) Return the first ChildAliOmbonus filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByAdjust(string $adjust) Return the first ChildAliOmbonus filtered by the adjust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByPstatus(int $pstatus) Return the first ChildAliOmbonus filtered by the pstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByPrcode(int $prcode) Return the first ChildAliOmbonus filtered by the prcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByCrate(string $crate) Return the first ChildAliOmbonus filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOmbonus requireOneByLocationbase(int $locationbase) Return the first ChildAliOmbonus filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliOmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliOmbonus objects based on current ModelCriteria
 * @method     ChildAliOmbonus[]|ObjectCollection findByAid(int $aid) Return ChildAliOmbonus objects filtered by the aid column
 * @method     ChildAliOmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliOmbonus objects filtered by the rcode column
 * @method     ChildAliOmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliOmbonus objects filtered by the mcode column
 * @method     ChildAliOmbonus[]|ObjectCollection findByTotal(string $total) Return ChildAliOmbonus objects filtered by the total column
 * @method     ChildAliOmbonus[]|ObjectCollection findByTax(string $tax) Return ChildAliOmbonus objects filtered by the tax column
 * @method     ChildAliOmbonus[]|ObjectCollection findByBonus(string $bonus) Return ChildAliOmbonus objects filtered by the bonus column
 * @method     ChildAliOmbonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliOmbonus objects filtered by the fdate column
 * @method     ChildAliOmbonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliOmbonus objects filtered by the tdate column
 * @method     ChildAliOmbonus[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliOmbonus objects filtered by the pos_cur column
 * @method     ChildAliOmbonus[]|ObjectCollection findByAdjust(string $adjust) Return ChildAliOmbonus objects filtered by the adjust column
 * @method     ChildAliOmbonus[]|ObjectCollection findByPstatus(int $pstatus) Return ChildAliOmbonus objects filtered by the pstatus column
 * @method     ChildAliOmbonus[]|ObjectCollection findByPrcode(int $prcode) Return ChildAliOmbonus objects filtered by the prcode column
 * @method     ChildAliOmbonus[]|ObjectCollection findByCrate(string $crate) Return ChildAliOmbonus objects filtered by the crate column
 * @method     ChildAliOmbonus[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliOmbonus objects filtered by the locationbase column
 * @method     ChildAliOmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliOmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliOmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliOmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliOmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliOmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliOmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliOmbonusQuery();
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
     * @return ChildAliOmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliOmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliOmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliOmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, total, tax, bonus, fdate, tdate, pos_cur, adjust, pstatus, prcode, crate, locationbase FROM ali_ombonus WHERE aid = :p0';
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
            /** @var ChildAliOmbonus $obj */
            $obj = new ChildAliOmbonus();
            $obj->hydrate($row);
            AliOmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliOmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliOmbonusTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliOmbonusTableMap::COL_AID, $keys, Criteria::IN);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_TAX, $tax, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByBonus($bonus = null, $comparison = null)
    {
        if (is_array($bonus)) {
            $useMinMax = false;
            if (isset($bonus['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_BONUS, $bonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bonus['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_BONUS, $bonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_BONUS, $bonus, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_POS_CUR, $posCur, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByAdjust($adjust = null, $comparison = null)
    {
        if (is_array($adjust)) {
            $useMinMax = false;
            if (isset($adjust['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_ADJUST, $adjust['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjust['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_ADJUST, $adjust['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_ADJUST, $adjust, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByPstatus($pstatus = null, $comparison = null)
    {
        if (is_array($pstatus)) {
            $useMinMax = false;
            if (isset($pstatus['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_PSTATUS, $pstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pstatus['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_PSTATUS, $pstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_PSTATUS, $pstatus, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByPrcode($prcode = null, $comparison = null)
    {
        if (is_array($prcode)) {
            $useMinMax = false;
            if (isset($prcode['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_PRCODE, $prcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prcode['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_PRCODE, $prcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_PRCODE, $prcode, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliOmbonusTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOmbonusTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliOmbonus $aliOmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliOmbonusQuery The current query, for fluid interface
     */
    public function prune($aliOmbonus = null)
    {
        if ($aliOmbonus) {
            $this->addUsingAlias(AliOmbonusTableMap::COL_AID, $aliOmbonus->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_ombonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliOmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliOmbonusTableMap::clearInstancePool();
            AliOmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliOmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliOmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliOmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliOmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliOmbonusQuery
