<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPromotion as ChildAliPromotion;
use CciOrm\CciOrm\AliPromotionQuery as ChildAliPromotionQuery;
use CciOrm\CciOrm\Map\AliPromotionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_promotion' table.
 *
 *
 *
 * @method     ChildAliPromotionQuery orderByRid($order = Criteria::ASC) Order by the rid column
 * @method     ChildAliPromotionQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliPromotionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildAliPromotionQuery orderByRdate($order = Criteria::ASC) Order by the rdate column
 * @method     ChildAliPromotionQuery orderByCalc($order = Criteria::ASC) Order by the calc column
 * @method     ChildAliPromotionQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliPromotionQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliPromotionQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliPromotionQuery orderByRtype($order = Criteria::ASC) Order by the rtype column
 * @method     ChildAliPromotionQuery orderByFirstseat($order = Criteria::ASC) Order by the firstseat column
 * @method     ChildAliPromotionQuery orderBySecondseat($order = Criteria::ASC) Order by the secondseat column
 * @method     ChildAliPromotionQuery orderByRincrease($order = Criteria::ASC) Order by the rincrease column
 * @method     ChildAliPromotionQuery orderByRurl($order = Criteria::ASC) Order by the rurl column
 * @method     ChildAliPromotionQuery orderByCalcDate($order = Criteria::ASC) Order by the calc_date column
 * @method     ChildAliPromotionQuery orderByTshow($order = Criteria::ASC) Order by the tshow column
 *
 * @method     ChildAliPromotionQuery groupByRid() Group by the rid column
 * @method     ChildAliPromotionQuery groupByRcode() Group by the rcode column
 * @method     ChildAliPromotionQuery groupByName() Group by the name column
 * @method     ChildAliPromotionQuery groupByRdate() Group by the rdate column
 * @method     ChildAliPromotionQuery groupByCalc() Group by the calc column
 * @method     ChildAliPromotionQuery groupByRemark() Group by the remark column
 * @method     ChildAliPromotionQuery groupByFdate() Group by the fdate column
 * @method     ChildAliPromotionQuery groupByTdate() Group by the tdate column
 * @method     ChildAliPromotionQuery groupByRtype() Group by the rtype column
 * @method     ChildAliPromotionQuery groupByFirstseat() Group by the firstseat column
 * @method     ChildAliPromotionQuery groupBySecondseat() Group by the secondseat column
 * @method     ChildAliPromotionQuery groupByRincrease() Group by the rincrease column
 * @method     ChildAliPromotionQuery groupByRurl() Group by the rurl column
 * @method     ChildAliPromotionQuery groupByCalcDate() Group by the calc_date column
 * @method     ChildAliPromotionQuery groupByTshow() Group by the tshow column
 *
 * @method     ChildAliPromotionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPromotionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPromotionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPromotionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPromotionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPromotionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPromotion findOne(ConnectionInterface $con = null) Return the first ChildAliPromotion matching the query
 * @method     ChildAliPromotion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPromotion matching the query, or a new ChildAliPromotion object populated from the query conditions when no match is found
 *
 * @method     ChildAliPromotion findOneByRid(int $rid) Return the first ChildAliPromotion filtered by the rid column
 * @method     ChildAliPromotion findOneByRcode(int $rcode) Return the first ChildAliPromotion filtered by the rcode column
 * @method     ChildAliPromotion findOneByName(string $name) Return the first ChildAliPromotion filtered by the name column
 * @method     ChildAliPromotion findOneByRdate(string $rdate) Return the first ChildAliPromotion filtered by the rdate column
 * @method     ChildAliPromotion findOneByCalc(string $calc) Return the first ChildAliPromotion filtered by the calc column
 * @method     ChildAliPromotion findOneByRemark(string $remark) Return the first ChildAliPromotion filtered by the remark column
 * @method     ChildAliPromotion findOneByFdate(string $fdate) Return the first ChildAliPromotion filtered by the fdate column
 * @method     ChildAliPromotion findOneByTdate(string $tdate) Return the first ChildAliPromotion filtered by the tdate column
 * @method     ChildAliPromotion findOneByRtype(int $rtype) Return the first ChildAliPromotion filtered by the rtype column
 * @method     ChildAliPromotion findOneByFirstseat(string $firstseat) Return the first ChildAliPromotion filtered by the firstseat column
 * @method     ChildAliPromotion findOneBySecondseat(string $secondseat) Return the first ChildAliPromotion filtered by the secondseat column
 * @method     ChildAliPromotion findOneByRincrease(string $rincrease) Return the first ChildAliPromotion filtered by the rincrease column
 * @method     ChildAliPromotion findOneByRurl(string $rurl) Return the first ChildAliPromotion filtered by the rurl column
 * @method     ChildAliPromotion findOneByCalcDate(string $calc_date) Return the first ChildAliPromotion filtered by the calc_date column
 * @method     ChildAliPromotion findOneByTshow(int $tshow) Return the first ChildAliPromotion filtered by the tshow column *

 * @method     ChildAliPromotion requirePk($key, ConnectionInterface $con = null) Return the ChildAliPromotion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOne(ConnectionInterface $con = null) Return the first ChildAliPromotion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPromotion requireOneByRid(int $rid) Return the first ChildAliPromotion filtered by the rid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByRcode(int $rcode) Return the first ChildAliPromotion filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByName(string $name) Return the first ChildAliPromotion filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByRdate(string $rdate) Return the first ChildAliPromotion filtered by the rdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByCalc(string $calc) Return the first ChildAliPromotion filtered by the calc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByRemark(string $remark) Return the first ChildAliPromotion filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByFdate(string $fdate) Return the first ChildAliPromotion filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByTdate(string $tdate) Return the first ChildAliPromotion filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByRtype(int $rtype) Return the first ChildAliPromotion filtered by the rtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByFirstseat(string $firstseat) Return the first ChildAliPromotion filtered by the firstseat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneBySecondseat(string $secondseat) Return the first ChildAliPromotion filtered by the secondseat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByRincrease(string $rincrease) Return the first ChildAliPromotion filtered by the rincrease column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByRurl(string $rurl) Return the first ChildAliPromotion filtered by the rurl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByCalcDate(string $calc_date) Return the first ChildAliPromotion filtered by the calc_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPromotion requireOneByTshow(int $tshow) Return the first ChildAliPromotion filtered by the tshow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPromotion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPromotion objects based on current ModelCriteria
 * @method     ChildAliPromotion[]|ObjectCollection findByRid(int $rid) Return ChildAliPromotion objects filtered by the rid column
 * @method     ChildAliPromotion[]|ObjectCollection findByRcode(int $rcode) Return ChildAliPromotion objects filtered by the rcode column
 * @method     ChildAliPromotion[]|ObjectCollection findByName(string $name) Return ChildAliPromotion objects filtered by the name column
 * @method     ChildAliPromotion[]|ObjectCollection findByRdate(string $rdate) Return ChildAliPromotion objects filtered by the rdate column
 * @method     ChildAliPromotion[]|ObjectCollection findByCalc(string $calc) Return ChildAliPromotion objects filtered by the calc column
 * @method     ChildAliPromotion[]|ObjectCollection findByRemark(string $remark) Return ChildAliPromotion objects filtered by the remark column
 * @method     ChildAliPromotion[]|ObjectCollection findByFdate(string $fdate) Return ChildAliPromotion objects filtered by the fdate column
 * @method     ChildAliPromotion[]|ObjectCollection findByTdate(string $tdate) Return ChildAliPromotion objects filtered by the tdate column
 * @method     ChildAliPromotion[]|ObjectCollection findByRtype(int $rtype) Return ChildAliPromotion objects filtered by the rtype column
 * @method     ChildAliPromotion[]|ObjectCollection findByFirstseat(string $firstseat) Return ChildAliPromotion objects filtered by the firstseat column
 * @method     ChildAliPromotion[]|ObjectCollection findBySecondseat(string $secondseat) Return ChildAliPromotion objects filtered by the secondseat column
 * @method     ChildAliPromotion[]|ObjectCollection findByRincrease(string $rincrease) Return ChildAliPromotion objects filtered by the rincrease column
 * @method     ChildAliPromotion[]|ObjectCollection findByRurl(string $rurl) Return ChildAliPromotion objects filtered by the rurl column
 * @method     ChildAliPromotion[]|ObjectCollection findByCalcDate(string $calc_date) Return ChildAliPromotion objects filtered by the calc_date column
 * @method     ChildAliPromotion[]|ObjectCollection findByTshow(int $tshow) Return ChildAliPromotion objects filtered by the tshow column
 * @method     ChildAliPromotion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPromotionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPromotionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPromotion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPromotionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPromotionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPromotionQuery) {
            return $criteria;
        }
        $query = new ChildAliPromotionQuery();
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
     * @return ChildAliPromotion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliPromotionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliPromotionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliPromotion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT rid, rcode, name, rdate, calc, remark, fdate, tdate, rtype, firstseat, secondseat, rincrease, rurl, calc_date, tshow FROM ali_promotion WHERE rid = :p0';
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
            /** @var ChildAliPromotion $obj */
            $obj = new ChildAliPromotion();
            $obj->hydrate($row);
            AliPromotionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliPromotion|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliPromotionTableMap::COL_RID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliPromotionTableMap::COL_RID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the rid column
     *
     * Example usage:
     * <code>
     * $query->filterByRid(1234); // WHERE rid = 1234
     * $query->filterByRid(array(12, 34)); // WHERE rid IN (12, 34)
     * $query->filterByRid(array('min' => 12)); // WHERE rid > 12
     * </code>
     *
     * @param     mixed $rid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByRid($rid = null, $comparison = null)
    {
        if (is_array($rid)) {
            $useMinMax = false;
            if (isset($rid['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RID, $rid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rid['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RID, $rid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_RID, $rid, $comparison);
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
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the rdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRdate('2011-03-14'); // WHERE rdate = '2011-03-14'
     * $query->filterByRdate('now'); // WHERE rdate = '2011-03-14'
     * $query->filterByRdate(array('max' => 'yesterday')); // WHERE rdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $rdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByRdate($rdate = null, $comparison = null)
    {
        if (is_array($rdate)) {
            $useMinMax = false;
            if (isset($rdate['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RDATE, $rdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rdate['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RDATE, $rdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_RDATE, $rdate, $comparison);
    }

    /**
     * Filter the query on the calc column
     *
     * Example usage:
     * <code>
     * $query->filterByCalc('fooValue');   // WHERE calc = 'fooValue'
     * $query->filterByCalc('%fooValue%', Criteria::LIKE); // WHERE calc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $calc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByCalc($calc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($calc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_CALC, $calc, $comparison);
    }

    /**
     * Filter the query on the remark column
     *
     * Example usage:
     * <code>
     * $query->filterByRemark('fooValue');   // WHERE remark = 'fooValue'
     * $query->filterByRemark('%fooValue%', Criteria::LIKE); // WHERE remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the rtype column
     *
     * Example usage:
     * <code>
     * $query->filterByRtype(1234); // WHERE rtype = 1234
     * $query->filterByRtype(array(12, 34)); // WHERE rtype IN (12, 34)
     * $query->filterByRtype(array('min' => 12)); // WHERE rtype > 12
     * </code>
     *
     * @param     mixed $rtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByRtype($rtype = null, $comparison = null)
    {
        if (is_array($rtype)) {
            $useMinMax = false;
            if (isset($rtype['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RTYPE, $rtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rtype['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RTYPE, $rtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_RTYPE, $rtype, $comparison);
    }

    /**
     * Filter the query on the firstseat column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstseat(1234); // WHERE firstseat = 1234
     * $query->filterByFirstseat(array(12, 34)); // WHERE firstseat IN (12, 34)
     * $query->filterByFirstseat(array('min' => 12)); // WHERE firstseat > 12
     * </code>
     *
     * @param     mixed $firstseat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByFirstseat($firstseat = null, $comparison = null)
    {
        if (is_array($firstseat)) {
            $useMinMax = false;
            if (isset($firstseat['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_FIRSTSEAT, $firstseat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($firstseat['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_FIRSTSEAT, $firstseat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_FIRSTSEAT, $firstseat, $comparison);
    }

    /**
     * Filter the query on the secondseat column
     *
     * Example usage:
     * <code>
     * $query->filterBySecondseat(1234); // WHERE secondseat = 1234
     * $query->filterBySecondseat(array(12, 34)); // WHERE secondseat IN (12, 34)
     * $query->filterBySecondseat(array('min' => 12)); // WHERE secondseat > 12
     * </code>
     *
     * @param     mixed $secondseat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterBySecondseat($secondseat = null, $comparison = null)
    {
        if (is_array($secondseat)) {
            $useMinMax = false;
            if (isset($secondseat['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_SECONDSEAT, $secondseat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($secondseat['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_SECONDSEAT, $secondseat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_SECONDSEAT, $secondseat, $comparison);
    }

    /**
     * Filter the query on the rincrease column
     *
     * Example usage:
     * <code>
     * $query->filterByRincrease(1234); // WHERE rincrease = 1234
     * $query->filterByRincrease(array(12, 34)); // WHERE rincrease IN (12, 34)
     * $query->filterByRincrease(array('min' => 12)); // WHERE rincrease > 12
     * </code>
     *
     * @param     mixed $rincrease The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByRincrease($rincrease = null, $comparison = null)
    {
        if (is_array($rincrease)) {
            $useMinMax = false;
            if (isset($rincrease['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RINCREASE, $rincrease['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rincrease['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_RINCREASE, $rincrease['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_RINCREASE, $rincrease, $comparison);
    }

    /**
     * Filter the query on the rurl column
     *
     * Example usage:
     * <code>
     * $query->filterByRurl('fooValue');   // WHERE rurl = 'fooValue'
     * $query->filterByRurl('%fooValue%', Criteria::LIKE); // WHERE rurl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rurl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByRurl($rurl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rurl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_RURL, $rurl, $comparison);
    }

    /**
     * Filter the query on the calc_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCalcDate('2011-03-14'); // WHERE calc_date = '2011-03-14'
     * $query->filterByCalcDate('now'); // WHERE calc_date = '2011-03-14'
     * $query->filterByCalcDate(array('max' => 'yesterday')); // WHERE calc_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $calcDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByCalcDate($calcDate = null, $comparison = null)
    {
        if (is_array($calcDate)) {
            $useMinMax = false;
            if (isset($calcDate['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_CALC_DATE, $calcDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calcDate['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_CALC_DATE, $calcDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_CALC_DATE, $calcDate, $comparison);
    }

    /**
     * Filter the query on the tshow column
     *
     * Example usage:
     * <code>
     * $query->filterByTshow(1234); // WHERE tshow = 1234
     * $query->filterByTshow(array(12, 34)); // WHERE tshow IN (12, 34)
     * $query->filterByTshow(array('min' => 12)); // WHERE tshow > 12
     * </code>
     *
     * @param     mixed $tshow The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function filterByTshow($tshow = null, $comparison = null)
    {
        if (is_array($tshow)) {
            $useMinMax = false;
            if (isset($tshow['min'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_TSHOW, $tshow['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tshow['max'])) {
                $this->addUsingAlias(AliPromotionTableMap::COL_TSHOW, $tshow['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPromotionTableMap::COL_TSHOW, $tshow, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPromotion $aliPromotion Object to remove from the list of results
     *
     * @return $this|ChildAliPromotionQuery The current query, for fluid interface
     */
    public function prune($aliPromotion = null)
    {
        if ($aliPromotion) {
            $this->addUsingAlias(AliPromotionTableMap::COL_RID, $aliPromotion->getRid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_promotion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPromotionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPromotionTableMap::clearInstancePool();
            AliPromotionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPromotionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPromotionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPromotionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPromotionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPromotionQuery
