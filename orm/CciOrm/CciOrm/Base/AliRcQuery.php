<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliRc as ChildAliRc;
use CciOrm\CciOrm\AliRcQuery as ChildAliRcQuery;
use CciOrm\CciOrm\Map\AliRcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_rc' table.
 *
 *
 *
 * @method     ChildAliRcQuery orderByBid($order = Criteria::ASC) Order by the bid column
 * @method     ChildAliRcQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliRcQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliRcQuery orderByMposi($order = Criteria::ASC) Order by the mposi column
 * @method     ChildAliRcQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliRcQuery orderByBposi($order = Criteria::ASC) Order by the bposi column
 * @method     ChildAliRcQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildAliRcQuery orderByGen($order = Criteria::ASC) Order by the gen column
 * @method     ChildAliRcQuery orderByBtype($order = Criteria::ASC) Order by the btype column
 * @method     ChildAliRcQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliRcQuery orderByPercer($order = Criteria::ASC) Order by the percer column
 * @method     ChildAliRcQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliRcQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliRcQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliRcQuery orderByCheckcheck($order = Criteria::ASC) Order by the checkcheck column
 * @method     ChildAliRcQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 *
 * @method     ChildAliRcQuery groupByBid() Group by the bid column
 * @method     ChildAliRcQuery groupByRcode() Group by the rcode column
 * @method     ChildAliRcQuery groupByMcode() Group by the mcode column
 * @method     ChildAliRcQuery groupByMposi() Group by the mposi column
 * @method     ChildAliRcQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliRcQuery groupByBposi() Group by the bposi column
 * @method     ChildAliRcQuery groupByLevel() Group by the level column
 * @method     ChildAliRcQuery groupByGen() Group by the gen column
 * @method     ChildAliRcQuery groupByBtype() Group by the btype column
 * @method     ChildAliRcQuery groupByPv() Group by the pv column
 * @method     ChildAliRcQuery groupByPercer() Group by the percer column
 * @method     ChildAliRcQuery groupByTotal() Group by the total column
 * @method     ChildAliRcQuery groupByFdate() Group by the fdate column
 * @method     ChildAliRcQuery groupByTdate() Group by the tdate column
 * @method     ChildAliRcQuery groupByCheckcheck() Group by the checkcheck column
 * @method     ChildAliRcQuery groupByPosCur() Group by the pos_cur column
 *
 * @method     ChildAliRcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliRcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliRcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliRcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliRcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliRcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliRc findOne(ConnectionInterface $con = null) Return the first ChildAliRc matching the query
 * @method     ChildAliRc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliRc matching the query, or a new ChildAliRc object populated from the query conditions when no match is found
 *
 * @method     ChildAliRc findOneByBid(int $bid) Return the first ChildAliRc filtered by the bid column
 * @method     ChildAliRc findOneByRcode(int $rcode) Return the first ChildAliRc filtered by the rcode column
 * @method     ChildAliRc findOneByMcode(string $mcode) Return the first ChildAliRc filtered by the mcode column
 * @method     ChildAliRc findOneByMposi(string $mposi) Return the first ChildAliRc filtered by the mposi column
 * @method     ChildAliRc findOneByUpaCode(string $upa_code) Return the first ChildAliRc filtered by the upa_code column
 * @method     ChildAliRc findOneByBposi(string $bposi) Return the first ChildAliRc filtered by the bposi column
 * @method     ChildAliRc findOneByLevel(string $level) Return the first ChildAliRc filtered by the level column
 * @method     ChildAliRc findOneByGen(string $gen) Return the first ChildAliRc filtered by the gen column
 * @method     ChildAliRc findOneByBtype(string $btype) Return the first ChildAliRc filtered by the btype column
 * @method     ChildAliRc findOneByPv(string $pv) Return the first ChildAliRc filtered by the pv column
 * @method     ChildAliRc findOneByPercer(string $percer) Return the first ChildAliRc filtered by the percer column
 * @method     ChildAliRc findOneByTotal(string $total) Return the first ChildAliRc filtered by the total column
 * @method     ChildAliRc findOneByFdate(string $fdate) Return the first ChildAliRc filtered by the fdate column
 * @method     ChildAliRc findOneByTdate(string $tdate) Return the first ChildAliRc filtered by the tdate column
 * @method     ChildAliRc findOneByCheckcheck(string $checkcheck) Return the first ChildAliRc filtered by the checkcheck column
 * @method     ChildAliRc findOneByPosCur(string $pos_cur) Return the first ChildAliRc filtered by the pos_cur column *

 * @method     ChildAliRc requirePk($key, ConnectionInterface $con = null) Return the ChildAliRc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOne(ConnectionInterface $con = null) Return the first ChildAliRc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliRc requireOneByBid(int $bid) Return the first ChildAliRc filtered by the bid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByRcode(int $rcode) Return the first ChildAliRc filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByMcode(string $mcode) Return the first ChildAliRc filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByMposi(string $mposi) Return the first ChildAliRc filtered by the mposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByUpaCode(string $upa_code) Return the first ChildAliRc filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByBposi(string $bposi) Return the first ChildAliRc filtered by the bposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByLevel(string $level) Return the first ChildAliRc filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByGen(string $gen) Return the first ChildAliRc filtered by the gen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByBtype(string $btype) Return the first ChildAliRc filtered by the btype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByPv(string $pv) Return the first ChildAliRc filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByPercer(string $percer) Return the first ChildAliRc filtered by the percer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByTotal(string $total) Return the first ChildAliRc filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByFdate(string $fdate) Return the first ChildAliRc filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByTdate(string $tdate) Return the first ChildAliRc filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByCheckcheck(string $checkcheck) Return the first ChildAliRc filtered by the checkcheck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRc requireOneByPosCur(string $pos_cur) Return the first ChildAliRc filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliRc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliRc objects based on current ModelCriteria
 * @method     ChildAliRc[]|ObjectCollection findByBid(int $bid) Return ChildAliRc objects filtered by the bid column
 * @method     ChildAliRc[]|ObjectCollection findByRcode(int $rcode) Return ChildAliRc objects filtered by the rcode column
 * @method     ChildAliRc[]|ObjectCollection findByMcode(string $mcode) Return ChildAliRc objects filtered by the mcode column
 * @method     ChildAliRc[]|ObjectCollection findByMposi(string $mposi) Return ChildAliRc objects filtered by the mposi column
 * @method     ChildAliRc[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliRc objects filtered by the upa_code column
 * @method     ChildAliRc[]|ObjectCollection findByBposi(string $bposi) Return ChildAliRc objects filtered by the bposi column
 * @method     ChildAliRc[]|ObjectCollection findByLevel(string $level) Return ChildAliRc objects filtered by the level column
 * @method     ChildAliRc[]|ObjectCollection findByGen(string $gen) Return ChildAliRc objects filtered by the gen column
 * @method     ChildAliRc[]|ObjectCollection findByBtype(string $btype) Return ChildAliRc objects filtered by the btype column
 * @method     ChildAliRc[]|ObjectCollection findByPv(string $pv) Return ChildAliRc objects filtered by the pv column
 * @method     ChildAliRc[]|ObjectCollection findByPercer(string $percer) Return ChildAliRc objects filtered by the percer column
 * @method     ChildAliRc[]|ObjectCollection findByTotal(string $total) Return ChildAliRc objects filtered by the total column
 * @method     ChildAliRc[]|ObjectCollection findByFdate(string $fdate) Return ChildAliRc objects filtered by the fdate column
 * @method     ChildAliRc[]|ObjectCollection findByTdate(string $tdate) Return ChildAliRc objects filtered by the tdate column
 * @method     ChildAliRc[]|ObjectCollection findByCheckcheck(string $checkcheck) Return ChildAliRc objects filtered by the checkcheck column
 * @method     ChildAliRc[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliRc objects filtered by the pos_cur column
 * @method     ChildAliRc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliRcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliRcQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliRc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliRcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliRcQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliRcQuery) {
            return $criteria;
        }
        $query = new ChildAliRcQuery();
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
     * @return ChildAliRc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliRcTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliRcTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliRc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT bid, rcode, mcode, mposi, upa_code, bposi, level, gen, btype, pv, percer, total, fdate, tdate, checkcheck, pos_cur FROM ali_rc WHERE bid = :p0';
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
            /** @var ChildAliRc $obj */
            $obj = new ChildAliRc();
            $obj->hydrate($row);
            AliRcTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliRc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliRcTableMap::COL_BID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliRcTableMap::COL_BID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bid column
     *
     * Example usage:
     * <code>
     * $query->filterByBid(1234); // WHERE bid = 1234
     * $query->filterByBid(array(12, 34)); // WHERE bid IN (12, 34)
     * $query->filterByBid(array('min' => 12)); // WHERE bid > 12
     * </code>
     *
     * @param     mixed $bid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByBid($bid = null, $comparison = null)
    {
        if (is_array($bid)) {
            $useMinMax = false;
            if (isset($bid['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_BID, $bid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bid['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_BID, $bid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_BID, $bid, $comparison);
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
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the mposi column
     *
     * Example usage:
     * <code>
     * $query->filterByMposi('fooValue');   // WHERE mposi = 'fooValue'
     * $query->filterByMposi('%fooValue%', Criteria::LIKE); // WHERE mposi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mposi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByMposi($mposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_MPOSI, $mposi, $comparison);
    }

    /**
     * Filter the query on the upa_code column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaCode('fooValue');   // WHERE upa_code = 'fooValue'
     * $query->filterByUpaCode('%fooValue%', Criteria::LIKE); // WHERE upa_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_UPA_CODE, $upaCode, $comparison);
    }

    /**
     * Filter the query on the bposi column
     *
     * Example usage:
     * <code>
     * $query->filterByBposi('fooValue');   // WHERE bposi = 'fooValue'
     * $query->filterByBposi('%fooValue%', Criteria::LIKE); // WHERE bposi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bposi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByBposi($bposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_BPOSI, $bposi, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the gen column
     *
     * Example usage:
     * <code>
     * $query->filterByGen(1234); // WHERE gen = 1234
     * $query->filterByGen(array(12, 34)); // WHERE gen IN (12, 34)
     * $query->filterByGen(array('min' => 12)); // WHERE gen > 12
     * </code>
     *
     * @param     mixed $gen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByGen($gen = null, $comparison = null)
    {
        if (is_array($gen)) {
            $useMinMax = false;
            if (isset($gen['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_GEN, $gen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gen['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_GEN, $gen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_GEN, $gen, $comparison);
    }

    /**
     * Filter the query on the btype column
     *
     * Example usage:
     * <code>
     * $query->filterByBtype('fooValue');   // WHERE btype = 'fooValue'
     * $query->filterByBtype('%fooValue%', Criteria::LIKE); // WHERE btype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $btype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByBtype($btype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($btype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_BTYPE, $btype, $comparison);
    }

    /**
     * Filter the query on the pv column
     *
     * Example usage:
     * <code>
     * $query->filterByPv(1234); // WHERE pv = 1234
     * $query->filterByPv(array(12, 34)); // WHERE pv IN (12, 34)
     * $query->filterByPv(array('min' => 12)); // WHERE pv > 12
     * </code>
     *
     * @param     mixed $pv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_PV, $pv, $comparison);
    }

    /**
     * Filter the query on the percer column
     *
     * Example usage:
     * <code>
     * $query->filterByPercer(1234); // WHERE percer = 1234
     * $query->filterByPercer(array(12, 34)); // WHERE percer IN (12, 34)
     * $query->filterByPercer(array('min' => 12)); // WHERE percer > 12
     * </code>
     *
     * @param     mixed $percer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByPercer($percer = null, $comparison = null)
    {
        if (is_array($percer)) {
            $useMinMax = false;
            if (isset($percer['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_PERCER, $percer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percer['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_PERCER, $percer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_PERCER, $percer, $comparison);
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
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliRcTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliRcTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the checkcheck column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckcheck('fooValue');   // WHERE checkcheck = 'fooValue'
     * $query->filterByCheckcheck('%fooValue%', Criteria::LIKE); // WHERE checkcheck LIKE '%fooValue%'
     * </code>
     *
     * @param     string $checkcheck The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByCheckcheck($checkcheck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($checkcheck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_CHECKCHECK, $checkcheck, $comparison);
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
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRcTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliRc $aliRc Object to remove from the list of results
     *
     * @return $this|ChildAliRcQuery The current query, for fluid interface
     */
    public function prune($aliRc = null)
    {
        if ($aliRc) {
            $this->addUsingAlias(AliRcTableMap::COL_BID, $aliRc->getBid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_rc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliRcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliRcTableMap::clearInstancePool();
            AliRcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliRcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliRcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliRcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliRcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliRcQuery
