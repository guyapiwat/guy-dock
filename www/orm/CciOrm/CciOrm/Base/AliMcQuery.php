<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMc as ChildAliMc;
use CciOrm\CciOrm\AliMcQuery as ChildAliMcQuery;
use CciOrm\CciOrm\Map\AliMcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_mc' table.
 *
 *
 *
 * @method     ChildAliMcQuery orderByBid($order = Criteria::ASC) Order by the bid column
 * @method     ChildAliMcQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliMcQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliMcQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliMcQuery orderByMposi($order = Criteria::ASC) Order by the mposi column
 * @method     ChildAliMcQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliMcQuery orderByUpaName($order = Criteria::ASC) Order by the upa_name column
 * @method     ChildAliMcQuery orderByBposi($order = Criteria::ASC) Order by the bposi column
 * @method     ChildAliMcQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildAliMcQuery orderByGen($order = Criteria::ASC) Order by the gen column
 * @method     ChildAliMcQuery orderByBtype($order = Criteria::ASC) Order by the btype column
 * @method     ChildAliMcQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliMcQuery orderByPercer($order = Criteria::ASC) Order by the percer column
 * @method     ChildAliMcQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliMcQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliMcQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliMcQuery orderByCheckcheck($order = Criteria::ASC) Order by the checkcheck column
 * @method     ChildAliMcQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 *
 * @method     ChildAliMcQuery groupByBid() Group by the bid column
 * @method     ChildAliMcQuery groupByRcode() Group by the rcode column
 * @method     ChildAliMcQuery groupByMcode() Group by the mcode column
 * @method     ChildAliMcQuery groupByNameT() Group by the name_t column
 * @method     ChildAliMcQuery groupByMposi() Group by the mposi column
 * @method     ChildAliMcQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliMcQuery groupByUpaName() Group by the upa_name column
 * @method     ChildAliMcQuery groupByBposi() Group by the bposi column
 * @method     ChildAliMcQuery groupByLevel() Group by the level column
 * @method     ChildAliMcQuery groupByGen() Group by the gen column
 * @method     ChildAliMcQuery groupByBtype() Group by the btype column
 * @method     ChildAliMcQuery groupByPv() Group by the pv column
 * @method     ChildAliMcQuery groupByPercer() Group by the percer column
 * @method     ChildAliMcQuery groupByTotal() Group by the total column
 * @method     ChildAliMcQuery groupByFdate() Group by the fdate column
 * @method     ChildAliMcQuery groupByTdate() Group by the tdate column
 * @method     ChildAliMcQuery groupByCheckcheck() Group by the checkcheck column
 * @method     ChildAliMcQuery groupByPosCur() Group by the pos_cur column
 *
 * @method     ChildAliMcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMc findOne(ConnectionInterface $con = null) Return the first ChildAliMc matching the query
 * @method     ChildAliMc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMc matching the query, or a new ChildAliMc object populated from the query conditions when no match is found
 *
 * @method     ChildAliMc findOneByBid(int $bid) Return the first ChildAliMc filtered by the bid column
 * @method     ChildAliMc findOneByRcode(int $rcode) Return the first ChildAliMc filtered by the rcode column
 * @method     ChildAliMc findOneByMcode(string $mcode) Return the first ChildAliMc filtered by the mcode column
 * @method     ChildAliMc findOneByNameT(string $name_t) Return the first ChildAliMc filtered by the name_t column
 * @method     ChildAliMc findOneByMposi(string $mposi) Return the first ChildAliMc filtered by the mposi column
 * @method     ChildAliMc findOneByUpaCode(string $upa_code) Return the first ChildAliMc filtered by the upa_code column
 * @method     ChildAliMc findOneByUpaName(string $upa_name) Return the first ChildAliMc filtered by the upa_name column
 * @method     ChildAliMc findOneByBposi(string $bposi) Return the first ChildAliMc filtered by the bposi column
 * @method     ChildAliMc findOneByLevel(string $level) Return the first ChildAliMc filtered by the level column
 * @method     ChildAliMc findOneByGen(string $gen) Return the first ChildAliMc filtered by the gen column
 * @method     ChildAliMc findOneByBtype(string $btype) Return the first ChildAliMc filtered by the btype column
 * @method     ChildAliMc findOneByPv(string $pv) Return the first ChildAliMc filtered by the pv column
 * @method     ChildAliMc findOneByPercer(string $percer) Return the first ChildAliMc filtered by the percer column
 * @method     ChildAliMc findOneByTotal(string $total) Return the first ChildAliMc filtered by the total column
 * @method     ChildAliMc findOneByFdate(string $fdate) Return the first ChildAliMc filtered by the fdate column
 * @method     ChildAliMc findOneByTdate(string $tdate) Return the first ChildAliMc filtered by the tdate column
 * @method     ChildAliMc findOneByCheckcheck(string $checkcheck) Return the first ChildAliMc filtered by the checkcheck column
 * @method     ChildAliMc findOneByPosCur(string $pos_cur) Return the first ChildAliMc filtered by the pos_cur column *

 * @method     ChildAliMc requirePk($key, ConnectionInterface $con = null) Return the ChildAliMc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOne(ConnectionInterface $con = null) Return the first ChildAliMc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMc requireOneByBid(int $bid) Return the first ChildAliMc filtered by the bid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByRcode(int $rcode) Return the first ChildAliMc filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByMcode(string $mcode) Return the first ChildAliMc filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByNameT(string $name_t) Return the first ChildAliMc filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByMposi(string $mposi) Return the first ChildAliMc filtered by the mposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByUpaCode(string $upa_code) Return the first ChildAliMc filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByUpaName(string $upa_name) Return the first ChildAliMc filtered by the upa_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByBposi(string $bposi) Return the first ChildAliMc filtered by the bposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByLevel(string $level) Return the first ChildAliMc filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByGen(string $gen) Return the first ChildAliMc filtered by the gen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByBtype(string $btype) Return the first ChildAliMc filtered by the btype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByPv(string $pv) Return the first ChildAliMc filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByPercer(string $percer) Return the first ChildAliMc filtered by the percer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByTotal(string $total) Return the first ChildAliMc filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByFdate(string $fdate) Return the first ChildAliMc filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByTdate(string $tdate) Return the first ChildAliMc filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByCheckcheck(string $checkcheck) Return the first ChildAliMc filtered by the checkcheck column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMc requireOneByPosCur(string $pos_cur) Return the first ChildAliMc filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMc objects based on current ModelCriteria
 * @method     ChildAliMc[]|ObjectCollection findByBid(int $bid) Return ChildAliMc objects filtered by the bid column
 * @method     ChildAliMc[]|ObjectCollection findByRcode(int $rcode) Return ChildAliMc objects filtered by the rcode column
 * @method     ChildAliMc[]|ObjectCollection findByMcode(string $mcode) Return ChildAliMc objects filtered by the mcode column
 * @method     ChildAliMc[]|ObjectCollection findByNameT(string $name_t) Return ChildAliMc objects filtered by the name_t column
 * @method     ChildAliMc[]|ObjectCollection findByMposi(string $mposi) Return ChildAliMc objects filtered by the mposi column
 * @method     ChildAliMc[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliMc objects filtered by the upa_code column
 * @method     ChildAliMc[]|ObjectCollection findByUpaName(string $upa_name) Return ChildAliMc objects filtered by the upa_name column
 * @method     ChildAliMc[]|ObjectCollection findByBposi(string $bposi) Return ChildAliMc objects filtered by the bposi column
 * @method     ChildAliMc[]|ObjectCollection findByLevel(string $level) Return ChildAliMc objects filtered by the level column
 * @method     ChildAliMc[]|ObjectCollection findByGen(string $gen) Return ChildAliMc objects filtered by the gen column
 * @method     ChildAliMc[]|ObjectCollection findByBtype(string $btype) Return ChildAliMc objects filtered by the btype column
 * @method     ChildAliMc[]|ObjectCollection findByPv(string $pv) Return ChildAliMc objects filtered by the pv column
 * @method     ChildAliMc[]|ObjectCollection findByPercer(string $percer) Return ChildAliMc objects filtered by the percer column
 * @method     ChildAliMc[]|ObjectCollection findByTotal(string $total) Return ChildAliMc objects filtered by the total column
 * @method     ChildAliMc[]|ObjectCollection findByFdate(string $fdate) Return ChildAliMc objects filtered by the fdate column
 * @method     ChildAliMc[]|ObjectCollection findByTdate(string $tdate) Return ChildAliMc objects filtered by the tdate column
 * @method     ChildAliMc[]|ObjectCollection findByCheckcheck(string $checkcheck) Return ChildAliMc objects filtered by the checkcheck column
 * @method     ChildAliMc[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliMc objects filtered by the pos_cur column
 * @method     ChildAliMc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMcQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMcQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMcQuery) {
            return $criteria;
        }
        $query = new ChildAliMcQuery();
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
     * @return ChildAliMc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMcTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMcTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliMc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT bid, rcode, mcode, name_t, mposi, upa_code, upa_name, bposi, level, gen, btype, pv, percer, total, fdate, tdate, checkcheck, pos_cur FROM ali_mc WHERE bid = :p0';
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
            /** @var ChildAliMc $obj */
            $obj = new ChildAliMc();
            $obj->hydrate($row);
            AliMcTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliMc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMcTableMap::COL_BID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMcTableMap::COL_BID, $keys, Criteria::IN);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByBid($bid = null, $comparison = null)
    {
        if (is_array($bid)) {
            $useMinMax = false;
            if (isset($bid['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_BID, $bid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bid['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_BID, $bid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_BID, $bid, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByMposi($mposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_MPOSI, $mposi, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_UPA_CODE, $upaCode, $comparison);
    }

    /**
     * Filter the query on the upa_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaName('fooValue');   // WHERE upa_name = 'fooValue'
     * $query->filterByUpaName('%fooValue%', Criteria::LIKE); // WHERE upa_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByUpaName($upaName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_UPA_NAME, $upaName, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByBposi($bposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_BPOSI, $bposi, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_LEVEL, $level, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByGen($gen = null, $comparison = null)
    {
        if (is_array($gen)) {
            $useMinMax = false;
            if (isset($gen['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_GEN, $gen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gen['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_GEN, $gen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_GEN, $gen, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByBtype($btype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($btype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_BTYPE, $btype, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByPercer($percer = null, $comparison = null)
    {
        if (is_array($percer)) {
            $useMinMax = false;
            if (isset($percer['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_PERCER, $percer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percer['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_PERCER, $percer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_PERCER, $percer, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliMcTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliMcTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByCheckcheck($checkcheck = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($checkcheck)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_CHECKCHECK, $checkcheck, $comparison);
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
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMcTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMc $aliMc Object to remove from the list of results
     *
     * @return $this|ChildAliMcQuery The current query, for fluid interface
     */
    public function prune($aliMc = null)
    {
        if ($aliMc) {
            $this->addUsingAlias(AliMcTableMap::COL_BID, $aliMc->getBid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_mc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMcTableMap::clearInstancePool();
            AliMcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMcQuery
