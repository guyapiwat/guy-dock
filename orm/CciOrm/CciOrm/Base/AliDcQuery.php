<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliDc as ChildAliDc;
use CciOrm\CciOrm\AliDcQuery as ChildAliDcQuery;
use CciOrm\CciOrm\Map\AliDcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_dc' table.
 *
 *
 *
 * @method     ChildAliDcQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliDcQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliDcQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliDcQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliDcQuery orderByMposi($order = Criteria::ASC) Order by the mposi column
 * @method     ChildAliDcQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliDcQuery orderByUpaName($order = Criteria::ASC) Order by the upa_name column
 * @method     ChildAliDcQuery orderByBposi($order = Criteria::ASC) Order by the bposi column
 * @method     ChildAliDcQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildAliDcQuery orderByGen($order = Criteria::ASC) Order by the gen column
 * @method     ChildAliDcQuery orderByBtype($order = Criteria::ASC) Order by the btype column
 * @method     ChildAliDcQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliDcQuery orderByPercer($order = Criteria::ASC) Order by the percer column
 * @method     ChildAliDcQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliDcQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliDcQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliDcQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliDcQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliDcQuery groupByAid() Group by the aid column
 * @method     ChildAliDcQuery groupByRcode() Group by the rcode column
 * @method     ChildAliDcQuery groupByMcode() Group by the mcode column
 * @method     ChildAliDcQuery groupByNameT() Group by the name_t column
 * @method     ChildAliDcQuery groupByMposi() Group by the mposi column
 * @method     ChildAliDcQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliDcQuery groupByUpaName() Group by the upa_name column
 * @method     ChildAliDcQuery groupByBposi() Group by the bposi column
 * @method     ChildAliDcQuery groupByLevel() Group by the level column
 * @method     ChildAliDcQuery groupByGen() Group by the gen column
 * @method     ChildAliDcQuery groupByBtype() Group by the btype column
 * @method     ChildAliDcQuery groupByPv() Group by the pv column
 * @method     ChildAliDcQuery groupByPercer() Group by the percer column
 * @method     ChildAliDcQuery groupByTotal() Group by the total column
 * @method     ChildAliDcQuery groupByFdate() Group by the fdate column
 * @method     ChildAliDcQuery groupByTdate() Group by the tdate column
 * @method     ChildAliDcQuery groupByCrate() Group by the crate column
 * @method     ChildAliDcQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliDcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliDcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliDcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliDcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliDcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliDcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliDc findOne(ConnectionInterface $con = null) Return the first ChildAliDc matching the query
 * @method     ChildAliDc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliDc matching the query, or a new ChildAliDc object populated from the query conditions when no match is found
 *
 * @method     ChildAliDc findOneByAid(int $aid) Return the first ChildAliDc filtered by the aid column
 * @method     ChildAliDc findOneByRcode(int $rcode) Return the first ChildAliDc filtered by the rcode column
 * @method     ChildAliDc findOneByMcode(string $mcode) Return the first ChildAliDc filtered by the mcode column
 * @method     ChildAliDc findOneByNameT(string $name_t) Return the first ChildAliDc filtered by the name_t column
 * @method     ChildAliDc findOneByMposi(string $mposi) Return the first ChildAliDc filtered by the mposi column
 * @method     ChildAliDc findOneByUpaCode(string $upa_code) Return the first ChildAliDc filtered by the upa_code column
 * @method     ChildAliDc findOneByUpaName(string $upa_name) Return the first ChildAliDc filtered by the upa_name column
 * @method     ChildAliDc findOneByBposi(string $bposi) Return the first ChildAliDc filtered by the bposi column
 * @method     ChildAliDc findOneByLevel(string $level) Return the first ChildAliDc filtered by the level column
 * @method     ChildAliDc findOneByGen(string $gen) Return the first ChildAliDc filtered by the gen column
 * @method     ChildAliDc findOneByBtype(string $btype) Return the first ChildAliDc filtered by the btype column
 * @method     ChildAliDc findOneByPv(string $pv) Return the first ChildAliDc filtered by the pv column
 * @method     ChildAliDc findOneByPercer(string $percer) Return the first ChildAliDc filtered by the percer column
 * @method     ChildAliDc findOneByTotal(string $total) Return the first ChildAliDc filtered by the total column
 * @method     ChildAliDc findOneByFdate(string $fdate) Return the first ChildAliDc filtered by the fdate column
 * @method     ChildAliDc findOneByTdate(string $tdate) Return the first ChildAliDc filtered by the tdate column
 * @method     ChildAliDc findOneByCrate(string $crate) Return the first ChildAliDc filtered by the crate column
 * @method     ChildAliDc findOneByLocationbase(int $locationbase) Return the first ChildAliDc filtered by the locationbase column *

 * @method     ChildAliDc requirePk($key, ConnectionInterface $con = null) Return the ChildAliDc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOne(ConnectionInterface $con = null) Return the first ChildAliDc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliDc requireOneByAid(int $aid) Return the first ChildAliDc filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByRcode(int $rcode) Return the first ChildAliDc filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByMcode(string $mcode) Return the first ChildAliDc filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByNameT(string $name_t) Return the first ChildAliDc filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByMposi(string $mposi) Return the first ChildAliDc filtered by the mposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByUpaCode(string $upa_code) Return the first ChildAliDc filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByUpaName(string $upa_name) Return the first ChildAliDc filtered by the upa_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByBposi(string $bposi) Return the first ChildAliDc filtered by the bposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByLevel(string $level) Return the first ChildAliDc filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByGen(string $gen) Return the first ChildAliDc filtered by the gen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByBtype(string $btype) Return the first ChildAliDc filtered by the btype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByPv(string $pv) Return the first ChildAliDc filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByPercer(string $percer) Return the first ChildAliDc filtered by the percer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByTotal(string $total) Return the first ChildAliDc filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByFdate(string $fdate) Return the first ChildAliDc filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByTdate(string $tdate) Return the first ChildAliDc filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByCrate(string $crate) Return the first ChildAliDc filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDc requireOneByLocationbase(int $locationbase) Return the first ChildAliDc filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliDc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliDc objects based on current ModelCriteria
 * @method     ChildAliDc[]|ObjectCollection findByAid(int $aid) Return ChildAliDc objects filtered by the aid column
 * @method     ChildAliDc[]|ObjectCollection findByRcode(int $rcode) Return ChildAliDc objects filtered by the rcode column
 * @method     ChildAliDc[]|ObjectCollection findByMcode(string $mcode) Return ChildAliDc objects filtered by the mcode column
 * @method     ChildAliDc[]|ObjectCollection findByNameT(string $name_t) Return ChildAliDc objects filtered by the name_t column
 * @method     ChildAliDc[]|ObjectCollection findByMposi(string $mposi) Return ChildAliDc objects filtered by the mposi column
 * @method     ChildAliDc[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliDc objects filtered by the upa_code column
 * @method     ChildAliDc[]|ObjectCollection findByUpaName(string $upa_name) Return ChildAliDc objects filtered by the upa_name column
 * @method     ChildAliDc[]|ObjectCollection findByBposi(string $bposi) Return ChildAliDc objects filtered by the bposi column
 * @method     ChildAliDc[]|ObjectCollection findByLevel(string $level) Return ChildAliDc objects filtered by the level column
 * @method     ChildAliDc[]|ObjectCollection findByGen(string $gen) Return ChildAliDc objects filtered by the gen column
 * @method     ChildAliDc[]|ObjectCollection findByBtype(string $btype) Return ChildAliDc objects filtered by the btype column
 * @method     ChildAliDc[]|ObjectCollection findByPv(string $pv) Return ChildAliDc objects filtered by the pv column
 * @method     ChildAliDc[]|ObjectCollection findByPercer(string $percer) Return ChildAliDc objects filtered by the percer column
 * @method     ChildAliDc[]|ObjectCollection findByTotal(string $total) Return ChildAliDc objects filtered by the total column
 * @method     ChildAliDc[]|ObjectCollection findByFdate(string $fdate) Return ChildAliDc objects filtered by the fdate column
 * @method     ChildAliDc[]|ObjectCollection findByTdate(string $tdate) Return ChildAliDc objects filtered by the tdate column
 * @method     ChildAliDc[]|ObjectCollection findByCrate(string $crate) Return ChildAliDc objects filtered by the crate column
 * @method     ChildAliDc[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliDc objects filtered by the locationbase column
 * @method     ChildAliDc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliDcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliDcQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliDc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliDcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliDcQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliDcQuery) {
            return $criteria;
        }
        $query = new ChildAliDcQuery();
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
     * @return ChildAliDc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliDcTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliDcTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliDc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, name_t, mposi, upa_code, upa_name, bposi, level, gen, btype, pv, percer, total, fdate, tdate, crate, locationbase FROM ali_dc WHERE aid = :p0';
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
            /** @var ChildAliDc $obj */
            $obj = new ChildAliDc();
            $obj->hydrate($row);
            AliDcTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliDc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliDcTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliDcTableMap::COL_AID, $keys, Criteria::IN);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByMposi($mposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_MPOSI, $mposi, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_UPA_CODE, $upaCode, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByUpaName($upaName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_UPA_NAME, $upaName, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByBposi($bposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_BPOSI, $bposi, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_LEVEL, $level, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByGen($gen = null, $comparison = null)
    {
        if (is_array($gen)) {
            $useMinMax = false;
            if (isset($gen['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_GEN, $gen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gen['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_GEN, $gen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_GEN, $gen, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByBtype($btype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($btype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_BTYPE, $btype, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByPercer($percer = null, $comparison = null)
    {
        if (is_array($percer)) {
            $useMinMax = false;
            if (isset($percer['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_PERCER, $percer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percer['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_PERCER, $percer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_PERCER, $percer, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliDcTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliDcTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDcTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliDc $aliDc Object to remove from the list of results
     *
     * @return $this|ChildAliDcQuery The current query, for fluid interface
     */
    public function prune($aliDc = null)
    {
        if ($aliDc) {
            $this->addUsingAlias(AliDcTableMap::COL_AID, $aliDc->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_dc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliDcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliDcTableMap::clearInstancePool();
            AliDcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliDcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliDcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliDcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliDcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliDcQuery
