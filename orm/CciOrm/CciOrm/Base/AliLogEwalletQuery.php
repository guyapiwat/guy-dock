<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLogEwallet as ChildAliLogEwallet;
use CciOrm\CciOrm\AliLogEwalletQuery as ChildAliLogEwalletQuery;
use CciOrm\CciOrm\Map\AliLogEwalletTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_log_ewallet' table.
 *
 *
 *
 * @method     ChildAliLogEwalletQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliLogEwalletQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliLogEwalletQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliLogEwalletQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliLogEwalletQuery orderBySatime($order = Criteria::ASC) Order by the satime column
 * @method     ChildAliLogEwalletQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliLogEwalletQuery orderByIn($order = Criteria::ASC) Order by the _in column
 * @method     ChildAliLogEwalletQuery orderByOut($order = Criteria::ASC) Order by the _out column
 * @method     ChildAliLogEwalletQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliLogEwalletQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliLogEwalletQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliLogEwalletQuery orderByOption($order = Criteria::ASC) Order by the _option column
 *
 * @method     ChildAliLogEwalletQuery groupById() Group by the id column
 * @method     ChildAliLogEwalletQuery groupByMcode() Group by the mcode column
 * @method     ChildAliLogEwalletQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliLogEwalletQuery groupBySadate() Group by the sadate column
 * @method     ChildAliLogEwalletQuery groupBySatime() Group by the satime column
 * @method     ChildAliLogEwalletQuery groupBySano() Group by the sano column
 * @method     ChildAliLogEwalletQuery groupByIn() Group by the _in column
 * @method     ChildAliLogEwalletQuery groupByOut() Group by the _out column
 * @method     ChildAliLogEwalletQuery groupByTotal() Group by the total column
 * @method     ChildAliLogEwalletQuery groupByUid() Group by the uid column
 * @method     ChildAliLogEwalletQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliLogEwalletQuery groupByOption() Group by the _option column
 *
 * @method     ChildAliLogEwalletQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliLogEwalletQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliLogEwalletQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliLogEwalletQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliLogEwalletQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliLogEwalletQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliLogEwallet findOne(ConnectionInterface $con = null) Return the first ChildAliLogEwallet matching the query
 * @method     ChildAliLogEwallet findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliLogEwallet matching the query, or a new ChildAliLogEwallet object populated from the query conditions when no match is found
 *
 * @method     ChildAliLogEwallet findOneById(int $id) Return the first ChildAliLogEwallet filtered by the id column
 * @method     ChildAliLogEwallet findOneByMcode(string $mcode) Return the first ChildAliLogEwallet filtered by the mcode column
 * @method     ChildAliLogEwallet findOneByInvCode(string $inv_code) Return the first ChildAliLogEwallet filtered by the inv_code column
 * @method     ChildAliLogEwallet findOneBySadate(string $sadate) Return the first ChildAliLogEwallet filtered by the sadate column
 * @method     ChildAliLogEwallet findOneBySatime(string $satime) Return the first ChildAliLogEwallet filtered by the satime column
 * @method     ChildAliLogEwallet findOneBySano(string $sano) Return the first ChildAliLogEwallet filtered by the sano column
 * @method     ChildAliLogEwallet findOneByIn(string $_in) Return the first ChildAliLogEwallet filtered by the _in column
 * @method     ChildAliLogEwallet findOneByOut(string $_out) Return the first ChildAliLogEwallet filtered by the _out column
 * @method     ChildAliLogEwallet findOneByTotal(string $total) Return the first ChildAliLogEwallet filtered by the total column
 * @method     ChildAliLogEwallet findOneByUid(string $uid) Return the first ChildAliLogEwallet filtered by the uid column
 * @method     ChildAliLogEwallet findOneBySaType(string $sa_type) Return the first ChildAliLogEwallet filtered by the sa_type column
 * @method     ChildAliLogEwallet findOneByOption(string $_option) Return the first ChildAliLogEwallet filtered by the _option column *

 * @method     ChildAliLogEwallet requirePk($key, ConnectionInterface $con = null) Return the ChildAliLogEwallet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOne(ConnectionInterface $con = null) Return the first ChildAliLogEwallet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogEwallet requireOneById(int $id) Return the first ChildAliLogEwallet filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneByMcode(string $mcode) Return the first ChildAliLogEwallet filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneByInvCode(string $inv_code) Return the first ChildAliLogEwallet filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneBySadate(string $sadate) Return the first ChildAliLogEwallet filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneBySatime(string $satime) Return the first ChildAliLogEwallet filtered by the satime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneBySano(string $sano) Return the first ChildAliLogEwallet filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneByIn(string $_in) Return the first ChildAliLogEwallet filtered by the _in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneByOut(string $_out) Return the first ChildAliLogEwallet filtered by the _out column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneByTotal(string $total) Return the first ChildAliLogEwallet filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneByUid(string $uid) Return the first ChildAliLogEwallet filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneBySaType(string $sa_type) Return the first ChildAliLogEwallet filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogEwallet requireOneByOption(string $_option) Return the first ChildAliLogEwallet filtered by the _option column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogEwallet[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliLogEwallet objects based on current ModelCriteria
 * @method     ChildAliLogEwallet[]|ObjectCollection findById(int $id) Return ChildAliLogEwallet objects filtered by the id column
 * @method     ChildAliLogEwallet[]|ObjectCollection findByMcode(string $mcode) Return ChildAliLogEwallet objects filtered by the mcode column
 * @method     ChildAliLogEwallet[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliLogEwallet objects filtered by the inv_code column
 * @method     ChildAliLogEwallet[]|ObjectCollection findBySadate(string $sadate) Return ChildAliLogEwallet objects filtered by the sadate column
 * @method     ChildAliLogEwallet[]|ObjectCollection findBySatime(string $satime) Return ChildAliLogEwallet objects filtered by the satime column
 * @method     ChildAliLogEwallet[]|ObjectCollection findBySano(string $sano) Return ChildAliLogEwallet objects filtered by the sano column
 * @method     ChildAliLogEwallet[]|ObjectCollection findByIn(string $_in) Return ChildAliLogEwallet objects filtered by the _in column
 * @method     ChildAliLogEwallet[]|ObjectCollection findByOut(string $_out) Return ChildAliLogEwallet objects filtered by the _out column
 * @method     ChildAliLogEwallet[]|ObjectCollection findByTotal(string $total) Return ChildAliLogEwallet objects filtered by the total column
 * @method     ChildAliLogEwallet[]|ObjectCollection findByUid(string $uid) Return ChildAliLogEwallet objects filtered by the uid column
 * @method     ChildAliLogEwallet[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliLogEwallet objects filtered by the sa_type column
 * @method     ChildAliLogEwallet[]|ObjectCollection findByOption(string $_option) Return ChildAliLogEwallet objects filtered by the _option column
 * @method     ChildAliLogEwallet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliLogEwalletQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliLogEwalletQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliLogEwallet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliLogEwalletQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliLogEwalletQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliLogEwalletQuery) {
            return $criteria;
        }
        $query = new ChildAliLogEwalletQuery();
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
     * @return ChildAliLogEwallet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliLogEwalletTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliLogEwalletTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliLogEwallet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, inv_code, sadate, satime, sano, _in, _out, total, uid, sa_type, _option FROM ali_log_ewallet WHERE id = :p0';
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
            /** @var ChildAliLogEwallet $obj */
            $obj = new ChildAliLogEwallet();
            $obj->hydrate($row);
            AliLogEwalletTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliLogEwallet|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_SADATE, $sadate, $comparison);
    }

    /**
     * Filter the query on the satime column
     *
     * Example usage:
     * <code>
     * $query->filterBySatime('2011-03-14'); // WHERE satime = '2011-03-14'
     * $query->filterBySatime('now'); // WHERE satime = '2011-03-14'
     * $query->filterBySatime(array('max' => 'yesterday')); // WHERE satime > '2011-03-13'
     * </code>
     *
     * @param     mixed $satime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterBySatime($satime = null, $comparison = null)
    {
        if (is_array($satime)) {
            $useMinMax = false;
            if (isset($satime['min'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL_SATIME, $satime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($satime['max'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL_SATIME, $satime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_SATIME, $satime, $comparison);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano('fooValue');   // WHERE sano = 'fooValue'
     * $query->filterBySano('%fooValue%', Criteria::LIKE); // WHERE sano LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sano The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Filter the query on the _in column
     *
     * Example usage:
     * <code>
     * $query->filterByIn(1234); // WHERE _in = 1234
     * $query->filterByIn(array(12, 34)); // WHERE _in IN (12, 34)
     * $query->filterByIn(array('min' => 12)); // WHERE _in > 12
     * </code>
     *
     * @param     mixed $in The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByIn($in = null, $comparison = null)
    {
        if (is_array($in)) {
            $useMinMax = false;
            if (isset($in['min'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL__IN, $in['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($in['max'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL__IN, $in['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL__IN, $in, $comparison);
    }

    /**
     * Filter the query on the _out column
     *
     * Example usage:
     * <code>
     * $query->filterByOut(1234); // WHERE _out = 1234
     * $query->filterByOut(array(12, 34)); // WHERE _out IN (12, 34)
     * $query->filterByOut(array('min' => 12)); // WHERE _out > 12
     * </code>
     *
     * @param     mixed $out The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByOut($out = null, $comparison = null)
    {
        if (is_array($out)) {
            $useMinMax = false;
            if (isset($out['min'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL__OUT, $out['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($out['max'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL__OUT, $out['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL__OUT, $out, $comparison);
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
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliLogEwalletTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL_SA_TYPE, $saType, $comparison);
    }

    /**
     * Filter the query on the _option column
     *
     * Example usage:
     * <code>
     * $query->filterByOption('fooValue');   // WHERE _option = 'fooValue'
     * $query->filterByOption('%fooValue%', Criteria::LIKE); // WHERE _option LIKE '%fooValue%'
     * </code>
     *
     * @param     string $option The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function filterByOption($option = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($option)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogEwalletTableMap::COL__OPTION, $option, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliLogEwallet $aliLogEwallet Object to remove from the list of results
     *
     * @return $this|ChildAliLogEwalletQuery The current query, for fluid interface
     */
    public function prune($aliLogEwallet = null)
    {
        if ($aliLogEwallet) {
            $this->addUsingAlias(AliLogEwalletTableMap::COL_ID, $aliLogEwallet->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_log_ewallet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogEwalletTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliLogEwalletTableMap::clearInstancePool();
            AliLogEwalletTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogEwalletTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliLogEwalletTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliLogEwalletTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliLogEwalletTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliLogEwalletQuery
