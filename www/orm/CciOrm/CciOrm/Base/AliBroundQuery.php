<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBround as ChildAliBround;
use CciOrm\CciOrm\AliBroundQuery as ChildAliBroundQuery;
use CciOrm\CciOrm\Map\AliBroundTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_bround' table.
 *
 *
 *
 * @method     ChildAliBroundQuery orderByRid($order = Criteria::ASC) Order by the rid column
 * @method     ChildAliBroundQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliBroundQuery orderByRdate($order = Criteria::ASC) Order by the rdate column
 * @method     ChildAliBroundQuery orderByFsano($order = Criteria::ASC) Order by the fsano column
 * @method     ChildAliBroundQuery orderByTsano($order = Criteria::ASC) Order by the tsano column
 * @method     ChildAliBroundQuery orderByPaydate($order = Criteria::ASC) Order by the paydate column
 * @method     ChildAliBroundQuery orderByCalc($order = Criteria::ASC) Order by the calc column
 * @method     ChildAliBroundQuery orderByCalcDate($order = Criteria::ASC) Order by the calc_date column
 * @method     ChildAliBroundQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliBroundQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliBroundQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliBroundQuery orderByFpdate($order = Criteria::ASC) Order by the fpdate column
 * @method     ChildAliBroundQuery orderByTpdate($order = Criteria::ASC) Order by the tpdate column
 * @method     ChildAliBroundQuery orderByTimequery($order = Criteria::ASC) Order by the timequery column
 * @method     ChildAliBroundQuery orderByUid($order = Criteria::ASC) Order by the uid column
 *
 * @method     ChildAliBroundQuery groupByRid() Group by the rid column
 * @method     ChildAliBroundQuery groupByRcode() Group by the rcode column
 * @method     ChildAliBroundQuery groupByRdate() Group by the rdate column
 * @method     ChildAliBroundQuery groupByFsano() Group by the fsano column
 * @method     ChildAliBroundQuery groupByTsano() Group by the tsano column
 * @method     ChildAliBroundQuery groupByPaydate() Group by the paydate column
 * @method     ChildAliBroundQuery groupByCalc() Group by the calc column
 * @method     ChildAliBroundQuery groupByCalcDate() Group by the calc_date column
 * @method     ChildAliBroundQuery groupByRemark() Group by the remark column
 * @method     ChildAliBroundQuery groupByFdate() Group by the fdate column
 * @method     ChildAliBroundQuery groupByTdate() Group by the tdate column
 * @method     ChildAliBroundQuery groupByFpdate() Group by the fpdate column
 * @method     ChildAliBroundQuery groupByTpdate() Group by the tpdate column
 * @method     ChildAliBroundQuery groupByTimequery() Group by the timequery column
 * @method     ChildAliBroundQuery groupByUid() Group by the uid column
 *
 * @method     ChildAliBroundQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBroundQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBroundQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBroundQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBroundQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBroundQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBround findOne(ConnectionInterface $con = null) Return the first ChildAliBround matching the query
 * @method     ChildAliBround findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBround matching the query, or a new ChildAliBround object populated from the query conditions when no match is found
 *
 * @method     ChildAliBround findOneByRid(int $rid) Return the first ChildAliBround filtered by the rid column
 * @method     ChildAliBround findOneByRcode(int $rcode) Return the first ChildAliBround filtered by the rcode column
 * @method     ChildAliBround findOneByRdate(string $rdate) Return the first ChildAliBround filtered by the rdate column
 * @method     ChildAliBround findOneByFsano(string $fsano) Return the first ChildAliBround filtered by the fsano column
 * @method     ChildAliBround findOneByTsano(string $tsano) Return the first ChildAliBround filtered by the tsano column
 * @method     ChildAliBround findOneByPaydate(string $paydate) Return the first ChildAliBround filtered by the paydate column
 * @method     ChildAliBround findOneByCalc(string $calc) Return the first ChildAliBround filtered by the calc column
 * @method     ChildAliBround findOneByCalcDate(string $calc_date) Return the first ChildAliBround filtered by the calc_date column
 * @method     ChildAliBround findOneByRemark(string $remark) Return the first ChildAliBround filtered by the remark column
 * @method     ChildAliBround findOneByFdate(string $fdate) Return the first ChildAliBround filtered by the fdate column
 * @method     ChildAliBround findOneByTdate(string $tdate) Return the first ChildAliBround filtered by the tdate column
 * @method     ChildAliBround findOneByFpdate(string $fpdate) Return the first ChildAliBround filtered by the fpdate column
 * @method     ChildAliBround findOneByTpdate(string $tpdate) Return the first ChildAliBround filtered by the tpdate column
 * @method     ChildAliBround findOneByTimequery(int $timequery) Return the first ChildAliBround filtered by the timequery column
 * @method     ChildAliBround findOneByUid(string $uid) Return the first ChildAliBround filtered by the uid column *

 * @method     ChildAliBround requirePk($key, ConnectionInterface $con = null) Return the ChildAliBround by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOne(ConnectionInterface $con = null) Return the first ChildAliBround matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBround requireOneByRid(int $rid) Return the first ChildAliBround filtered by the rid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByRcode(int $rcode) Return the first ChildAliBround filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByRdate(string $rdate) Return the first ChildAliBround filtered by the rdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByFsano(string $fsano) Return the first ChildAliBround filtered by the fsano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByTsano(string $tsano) Return the first ChildAliBround filtered by the tsano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByPaydate(string $paydate) Return the first ChildAliBround filtered by the paydate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByCalc(string $calc) Return the first ChildAliBround filtered by the calc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByCalcDate(string $calc_date) Return the first ChildAliBround filtered by the calc_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByRemark(string $remark) Return the first ChildAliBround filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByFdate(string $fdate) Return the first ChildAliBround filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByTdate(string $tdate) Return the first ChildAliBround filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByFpdate(string $fpdate) Return the first ChildAliBround filtered by the fpdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByTpdate(string $tpdate) Return the first ChildAliBround filtered by the tpdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByTimequery(int $timequery) Return the first ChildAliBround filtered by the timequery column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBround requireOneByUid(string $uid) Return the first ChildAliBround filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBround[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBround objects based on current ModelCriteria
 * @method     ChildAliBround[]|ObjectCollection findByRid(int $rid) Return ChildAliBround objects filtered by the rid column
 * @method     ChildAliBround[]|ObjectCollection findByRcode(int $rcode) Return ChildAliBround objects filtered by the rcode column
 * @method     ChildAliBround[]|ObjectCollection findByRdate(string $rdate) Return ChildAliBround objects filtered by the rdate column
 * @method     ChildAliBround[]|ObjectCollection findByFsano(string $fsano) Return ChildAliBround objects filtered by the fsano column
 * @method     ChildAliBround[]|ObjectCollection findByTsano(string $tsano) Return ChildAliBround objects filtered by the tsano column
 * @method     ChildAliBround[]|ObjectCollection findByPaydate(string $paydate) Return ChildAliBround objects filtered by the paydate column
 * @method     ChildAliBround[]|ObjectCollection findByCalc(string $calc) Return ChildAliBround objects filtered by the calc column
 * @method     ChildAliBround[]|ObjectCollection findByCalcDate(string $calc_date) Return ChildAliBround objects filtered by the calc_date column
 * @method     ChildAliBround[]|ObjectCollection findByRemark(string $remark) Return ChildAliBround objects filtered by the remark column
 * @method     ChildAliBround[]|ObjectCollection findByFdate(string $fdate) Return ChildAliBround objects filtered by the fdate column
 * @method     ChildAliBround[]|ObjectCollection findByTdate(string $tdate) Return ChildAliBround objects filtered by the tdate column
 * @method     ChildAliBround[]|ObjectCollection findByFpdate(string $fpdate) Return ChildAliBround objects filtered by the fpdate column
 * @method     ChildAliBround[]|ObjectCollection findByTpdate(string $tpdate) Return ChildAliBround objects filtered by the tpdate column
 * @method     ChildAliBround[]|ObjectCollection findByTimequery(int $timequery) Return ChildAliBround objects filtered by the timequery column
 * @method     ChildAliBround[]|ObjectCollection findByUid(string $uid) Return ChildAliBround objects filtered by the uid column
 * @method     ChildAliBround[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBroundQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBroundQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBround', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBroundQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBroundQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBroundQuery) {
            return $criteria;
        }
        $query = new ChildAliBroundQuery();
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
     * @return ChildAliBround|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBroundTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBroundTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBround A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT rid, rcode, rdate, fsano, tsano, paydate, calc, calc_date, remark, fdate, tdate, fpdate, tpdate, timequery, uid FROM ali_bround WHERE rid = :p0';
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
            /** @var ChildAliBround $obj */
            $obj = new ChildAliBround();
            $obj->hydrate($row);
            AliBroundTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBround|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBroundTableMap::COL_RID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBroundTableMap::COL_RID, $keys, Criteria::IN);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByRid($rid = null, $comparison = null)
    {
        if (is_array($rid)) {
            $useMinMax = false;
            if (isset($rid['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_RID, $rid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rid['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_RID, $rid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_RID, $rid, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByRdate($rdate = null, $comparison = null)
    {
        if (is_array($rdate)) {
            $useMinMax = false;
            if (isset($rdate['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_RDATE, $rdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rdate['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_RDATE, $rdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_RDATE, $rdate, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByFsano($fsano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fsano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_FSANO, $fsano, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByTsano($tsano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tsano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_TSANO, $tsano, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByPaydate($paydate = null, $comparison = null)
    {
        if (is_array($paydate)) {
            $useMinMax = false;
            if (isset($paydate['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_PAYDATE, $paydate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paydate['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_PAYDATE, $paydate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_PAYDATE, $paydate, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByCalc($calc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($calc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_CALC, $calc, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByCalcDate($calcDate = null, $comparison = null)
    {
        if (is_array($calcDate)) {
            $useMinMax = false;
            if (isset($calcDate['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_CALC_DATE, $calcDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calcDate['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_CALC_DATE, $calcDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_CALC_DATE, $calcDate, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_REMARK, $remark, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByFpdate($fpdate = null, $comparison = null)
    {
        if (is_array($fpdate)) {
            $useMinMax = false;
            if (isset($fpdate['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_FPDATE, $fpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fpdate['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_FPDATE, $fpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_FPDATE, $fpdate, $comparison);
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
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByTpdate($tpdate = null, $comparison = null)
    {
        if (is_array($tpdate)) {
            $useMinMax = false;
            if (isset($tpdate['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_TPDATE, $tpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tpdate['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_TPDATE, $tpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_TPDATE, $tpdate, $comparison);
    }

    /**
     * Filter the query on the timequery column
     *
     * Example usage:
     * <code>
     * $query->filterByTimequery(1234); // WHERE timequery = 1234
     * $query->filterByTimequery(array(12, 34)); // WHERE timequery IN (12, 34)
     * $query->filterByTimequery(array('min' => 12)); // WHERE timequery > 12
     * </code>
     *
     * @param     mixed $timequery The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByTimequery($timequery = null, $comparison = null)
    {
        if (is_array($timequery)) {
            $useMinMax = false;
            if (isset($timequery['min'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_TIMEQUERY, $timequery['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timequery['max'])) {
                $this->addUsingAlias(AliBroundTableMap::COL_TIMEQUERY, $timequery['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_TIMEQUERY, $timequery, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%', Criteria::LIKE); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBroundTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBround $aliBround Object to remove from the list of results
     *
     * @return $this|ChildAliBroundQuery The current query, for fluid interface
     */
    public function prune($aliBround = null)
    {
        if ($aliBround) {
            $this->addUsingAlias(AliBroundTableMap::COL_RID, $aliBround->getRid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_bround table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBroundTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBroundTableMap::clearInstancePool();
            AliBroundTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBroundTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBroundTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBroundTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBroundTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBroundQuery
