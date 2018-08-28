<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCround1 as ChildAliCround1;
use CciOrm\CciOrm\AliCround1Query as ChildAliCround1Query;
use CciOrm\CciOrm\Map\AliCround1TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_cround1' table.
 *
 *
 *
 * @method     ChildAliCround1Query orderByRid($order = Criteria::ASC) Order by the rid column
 * @method     ChildAliCround1Query orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCround1Query orderByRdate($order = Criteria::ASC) Order by the rdate column
 * @method     ChildAliCround1Query orderByFsano($order = Criteria::ASC) Order by the fsano column
 * @method     ChildAliCround1Query orderByTsano($order = Criteria::ASC) Order by the tsano column
 * @method     ChildAliCround1Query orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliCround1Query orderByCalc($order = Criteria::ASC) Order by the calc column
 * @method     ChildAliCround1Query orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliCround1Query orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliCround1Query orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliCround1Query orderByFpdate($order = Criteria::ASC) Order by the fpdate column
 * @method     ChildAliCround1Query orderByTpdate($order = Criteria::ASC) Order by the tpdate column
 *
 * @method     ChildAliCround1Query groupByRid() Group by the rid column
 * @method     ChildAliCround1Query groupByRcode() Group by the rcode column
 * @method     ChildAliCround1Query groupByRdate() Group by the rdate column
 * @method     ChildAliCround1Query groupByFsano() Group by the fsano column
 * @method     ChildAliCround1Query groupByTsano() Group by the tsano column
 * @method     ChildAliCround1Query groupByPaydate() Group by the paydate column
 * @method     ChildAliCround1Query groupByCalc() Group by the calc column
 * @method     ChildAliCround1Query groupByRemark() Group by the remark column
 * @method     ChildAliCround1Query groupByFdate() Group by the fdate column
 * @method     ChildAliCround1Query groupByTdate() Group by the tdate column
 * @method     ChildAliCround1Query groupByFpdate() Group by the fpdate column
 * @method     ChildAliCround1Query groupByTpdate() Group by the tpdate column
 *
 * @method     ChildAliCround1Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCround1Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCround1Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCround1Query leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCround1Query rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCround1Query innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCround1 findOne(ConnectionInterface $con = null) Return the first ChildAliCround1 matching the query
 * @method     ChildAliCround1 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCround1 matching the query, or a new ChildAliCround1 object populated from the query conditions when no match is found
 *
 * @method     ChildAliCround1 findOneByRid(int $rid) Return the first ChildAliCround1 filtered by the rid column
 * @method     ChildAliCround1 findOneByRcode(int $rcode) Return the first ChildAliCround1 filtered by the rcode column
 * @method     ChildAliCround1 findOneByRdate(string $rdate) Return the first ChildAliCround1 filtered by the rdate column
 * @method     ChildAliCround1 findOneByFsano(string $fsano) Return the first ChildAliCround1 filtered by the fsano column
 * @method     ChildAliCround1 findOneByTsano(string $tsano) Return the first ChildAliCround1 filtered by the tsano column
 * @method     ChildAliCround1 findOneByPaydate(string $paydate) Return the first ChildAliCround1 filtered by the paydate column
 * @method     ChildAliCround1 findOneByCalc(string $calc) Return the first ChildAliCround1 filtered by the calc column
 * @method     ChildAliCround1 findOneByRemark(string $remark) Return the first ChildAliCround1 filtered by the remark column
 * @method     ChildAliCround1 findOneByFdate(string $fdate) Return the first ChildAliCround1 filtered by the fdate column
 * @method     ChildAliCround1 findOneByTdate(string $tdate) Return the first ChildAliCround1 filtered by the tdate column
 * @method     ChildAliCround1 findOneByFpdate(string $fpdate) Return the first ChildAliCround1 filtered by the fpdate column
 * @method     ChildAliCround1 findOneByTpdate(string $tpdate) Return the first ChildAliCround1 filtered by the tpdate column *

 * @method     ChildAliCround1 requirePk($key, ConnectionInterface $con = null) Return the ChildAliCround1 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOne(ConnectionInterface $con = null) Return the first ChildAliCround1 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCround1 requireOneByRid(int $rid) Return the first ChildAliCround1 filtered by the rid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByRcode(int $rcode) Return the first ChildAliCround1 filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByRdate(string $rdate) Return the first ChildAliCround1 filtered by the rdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByFsano(string $fsano) Return the first ChildAliCround1 filtered by the fsano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByTsano(string $tsano) Return the first ChildAliCround1 filtered by the tsano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByPaydate(string $paydate) Return the first ChildAliCround1 filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByCalc(string $calc) Return the first ChildAliCround1 filtered by the calc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByRemark(string $remark) Return the first ChildAliCround1 filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByFdate(string $fdate) Return the first ChildAliCround1 filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByTdate(string $tdate) Return the first ChildAliCround1 filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByFpdate(string $fpdate) Return the first ChildAliCround1 filtered by the fpdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCround1 requireOneByTpdate(string $tpdate) Return the first ChildAliCround1 filtered by the tpdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCround1[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCround1 objects based on current ModelCriteria
 * @method     ChildAliCround1[]|ObjectCollection findByRid(int $rid) Return ChildAliCround1 objects filtered by the rid column
 * @method     ChildAliCround1[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCround1 objects filtered by the rcode column
 * @method     ChildAliCround1[]|ObjectCollection findByRdate(string $rdate) Return ChildAliCround1 objects filtered by the rdate column
 * @method     ChildAliCround1[]|ObjectCollection findByFsano(string $fsano) Return ChildAliCround1 objects filtered by the fsano column
 * @method     ChildAliCround1[]|ObjectCollection findByTsano(string $tsano) Return ChildAliCround1 objects filtered by the tsano column
 * @method     ChildAliCround1[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliCround1 objects filtered by the paydate column
 * @method     ChildAliCround1[]|ObjectCollection findByCalc(string $calc) Return ChildAliCround1 objects filtered by the calc column
 * @method     ChildAliCround1[]|ObjectCollection findByRemark(string $remark) Return ChildAliCround1 objects filtered by the remark column
 * @method     ChildAliCround1[]|ObjectCollection findByFdate(string $fdate) Return ChildAliCround1 objects filtered by the fdate column
 * @method     ChildAliCround1[]|ObjectCollection findByTdate(string $tdate) Return ChildAliCround1 objects filtered by the tdate column
 * @method     ChildAliCround1[]|ObjectCollection findByFpdate(string $fpdate) Return ChildAliCround1 objects filtered by the fpdate column
 * @method     ChildAliCround1[]|ObjectCollection findByTpdate(string $tpdate) Return ChildAliCround1 objects filtered by the tpdate column
 * @method     ChildAliCround1[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCround1Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCround1Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCround1', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCround1Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCround1Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCround1Query) {
            return $criteria;
        }
        $query = new ChildAliCround1Query();
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
     * @return ChildAliCround1|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCround1TableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCround1TableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCround1 A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT rid, rcode, rdate, fsano, tsano, paydate, calc, remark, fdate, tdate, fpdate, tpdate FROM ali_cround1 WHERE rid = :p0';
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
            /** @var ChildAliCround1 $obj */
            $obj = new ChildAliCround1();
            $obj->hydrate($row);
            AliCround1TableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCround1|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCround1TableMap::COL_RID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCround1TableMap::COL_RID, $keys, Criteria::IN);
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByRid($rid = null, $comparison = null)
    {
        if (is_array($rid)) {
            $useMinMax = false;
            if (isset($rid['min'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_RID, $rid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rid['max'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_RID, $rid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_RID, $rid, $comparison);
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByRdate($rdate = null, $comparison = null)
    {
        if (is_array($rdate)) {
            $useMinMax = false;
            if (isset($rdate['min'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_RDATE, $rdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rdate['max'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_RDATE, $rdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_RDATE, $rdate, $comparison);
    }

    /**
     * Filter the query on the fsano column
     *
     * Example usage:
     * <code>
     * $query->filterByFsano('fooValue');   // WHERE fsano = 'fooValue'
     * $query->filterByFsano('%fooValue%', Criteria::LIKE); // WHERE fsano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fsano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByFsano($fsano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fsano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_FSANO, $fsano, $comparison);
    }

    /**
     * Filter the query on the tsano column
     *
     * Example usage:
     * <code>
     * $query->filterByTsano('fooValue');   // WHERE tsano = 'fooValue'
     * $query->filterByTsano('%fooValue%', Criteria::LIKE); // WHERE tsano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tsano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByTsano($tsano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tsano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_TSANO, $tsano, $comparison);
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_PAYDATE, $paydate, $comparison);
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByCalc($calc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($calc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_CALC, $calc, $comparison);
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the fpdate column
     *
     * Example usage:
     * <code>
     * $query->filterByFpdate('2011-03-14'); // WHERE fpdate = '2011-03-14'
     * $query->filterByFpdate('now'); // WHERE fpdate = '2011-03-14'
     * $query->filterByFpdate(array('max' => 'yesterday')); // WHERE fpdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $fpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByFpdate($fpdate = null, $comparison = null)
    {
        if (is_array($fpdate)) {
            $useMinMax = false;
            if (isset($fpdate['min'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_FPDATE, $fpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fpdate['max'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_FPDATE, $fpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_FPDATE, $fpdate, $comparison);
    }

    /**
     * Filter the query on the tpdate column
     *
     * Example usage:
     * <code>
     * $query->filterByTpdate('2011-03-14'); // WHERE tpdate = '2011-03-14'
     * $query->filterByTpdate('now'); // WHERE tpdate = '2011-03-14'
     * $query->filterByTpdate(array('max' => 'yesterday')); // WHERE tpdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $tpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function filterByTpdate($tpdate = null, $comparison = null)
    {
        if (is_array($tpdate)) {
            $useMinMax = false;
            if (isset($tpdate['min'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_TPDATE, $tpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tpdate['max'])) {
                $this->addUsingAlias(AliCround1TableMap::COL_TPDATE, $tpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCround1TableMap::COL_TPDATE, $tpdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCround1 $aliCround1 Object to remove from the list of results
     *
     * @return $this|ChildAliCround1Query The current query, for fluid interface
     */
    public function prune($aliCround1 = null)
    {
        if ($aliCround1) {
            $this->addUsingAlias(AliCround1TableMap::COL_RID, $aliCround1->getRid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_cround1 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCround1TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCround1TableMap::clearInstancePool();
            AliCround1TableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCround1TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCround1TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCround1TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCround1TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCround1Query
