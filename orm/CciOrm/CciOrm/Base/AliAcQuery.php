<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliAc as ChildAliAc;
use CciOrm\CciOrm\AliAcQuery as ChildAliAcQuery;
use CciOrm\CciOrm\Map\AliAcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_ac' table.
 *
 *
 *
 * @method     ChildAliAcQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliAcQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliAcQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliAcQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliAcQuery orderByMposi($order = Criteria::ASC) Order by the mposi column
 * @method     ChildAliAcQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliAcQuery orderByUpaName($order = Criteria::ASC) Order by the upa_name column
 * @method     ChildAliAcQuery orderByBposi($order = Criteria::ASC) Order by the bposi column
 * @method     ChildAliAcQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildAliAcQuery orderByGen($order = Criteria::ASC) Order by the gen column
 * @method     ChildAliAcQuery orderByBtype($order = Criteria::ASC) Order by the btype column
 * @method     ChildAliAcQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliAcQuery orderByPercer($order = Criteria::ASC) Order by the percer column
 * @method     ChildAliAcQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliAcQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliAcQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliAcQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliAcQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildAliAcQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliAcQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliAcQuery groupByAid() Group by the aid column
 * @method     ChildAliAcQuery groupByRcode() Group by the rcode column
 * @method     ChildAliAcQuery groupByMcode() Group by the mcode column
 * @method     ChildAliAcQuery groupByNameT() Group by the name_t column
 * @method     ChildAliAcQuery groupByMposi() Group by the mposi column
 * @method     ChildAliAcQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliAcQuery groupByUpaName() Group by the upa_name column
 * @method     ChildAliAcQuery groupByBposi() Group by the bposi column
 * @method     ChildAliAcQuery groupByLevel() Group by the level column
 * @method     ChildAliAcQuery groupByGen() Group by the gen column
 * @method     ChildAliAcQuery groupByBtype() Group by the btype column
 * @method     ChildAliAcQuery groupByPv() Group by the pv column
 * @method     ChildAliAcQuery groupByPercer() Group by the percer column
 * @method     ChildAliAcQuery groupByTotal() Group by the total column
 * @method     ChildAliAcQuery groupByFdate() Group by the fdate column
 * @method     ChildAliAcQuery groupByTdate() Group by the tdate column
 * @method     ChildAliAcQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliAcQuery groupByType() Group by the type column
 * @method     ChildAliAcQuery groupByCrate() Group by the crate column
 * @method     ChildAliAcQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliAcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliAcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliAcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliAcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliAcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliAcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliAc findOne(ConnectionInterface $con = null) Return the first ChildAliAc matching the query
 * @method     ChildAliAc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliAc matching the query, or a new ChildAliAc object populated from the query conditions when no match is found
 *
 * @method     ChildAliAc findOneByAid(int $aid) Return the first ChildAliAc filtered by the aid column
 * @method     ChildAliAc findOneByRcode(int $rcode) Return the first ChildAliAc filtered by the rcode column
 * @method     ChildAliAc findOneByMcode(string $mcode) Return the first ChildAliAc filtered by the mcode column
 * @method     ChildAliAc findOneByNameT(string $name_t) Return the first ChildAliAc filtered by the name_t column
 * @method     ChildAliAc findOneByMposi(string $mposi) Return the first ChildAliAc filtered by the mposi column
 * @method     ChildAliAc findOneByUpaCode(string $upa_code) Return the first ChildAliAc filtered by the upa_code column
 * @method     ChildAliAc findOneByUpaName(string $upa_name) Return the first ChildAliAc filtered by the upa_name column
 * @method     ChildAliAc findOneByBposi(string $bposi) Return the first ChildAliAc filtered by the bposi column
 * @method     ChildAliAc findOneByLevel(string $level) Return the first ChildAliAc filtered by the level column
 * @method     ChildAliAc findOneByGen(string $gen) Return the first ChildAliAc filtered by the gen column
 * @method     ChildAliAc findOneByBtype(string $btype) Return the first ChildAliAc filtered by the btype column
 * @method     ChildAliAc findOneByPv(string $pv) Return the first ChildAliAc filtered by the pv column
 * @method     ChildAliAc findOneByPercer(string $percer) Return the first ChildAliAc filtered by the percer column
 * @method     ChildAliAc findOneByTotal(string $total) Return the first ChildAliAc filtered by the total column
 * @method     ChildAliAc findOneByFdate(string $fdate) Return the first ChildAliAc filtered by the fdate column
 * @method     ChildAliAc findOneByTdate(string $tdate) Return the first ChildAliAc filtered by the tdate column
 * @method     ChildAliAc findOneByPosCur(string $pos_cur) Return the first ChildAliAc filtered by the pos_cur column
 * @method     ChildAliAc findOneByType(string $type) Return the first ChildAliAc filtered by the type column
 * @method     ChildAliAc findOneByCrate(string $crate) Return the first ChildAliAc filtered by the crate column
 * @method     ChildAliAc findOneByLocationbase(int $locationbase) Return the first ChildAliAc filtered by the locationbase column *

 * @method     ChildAliAc requirePk($key, ConnectionInterface $con = null) Return the ChildAliAc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOne(ConnectionInterface $con = null) Return the first ChildAliAc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAc requireOneByAid(int $aid) Return the first ChildAliAc filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByRcode(int $rcode) Return the first ChildAliAc filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByMcode(string $mcode) Return the first ChildAliAc filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByNameT(string $name_t) Return the first ChildAliAc filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByMposi(string $mposi) Return the first ChildAliAc filtered by the mposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByUpaCode(string $upa_code) Return the first ChildAliAc filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByUpaName(string $upa_name) Return the first ChildAliAc filtered by the upa_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByBposi(string $bposi) Return the first ChildAliAc filtered by the bposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByLevel(string $level) Return the first ChildAliAc filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByGen(string $gen) Return the first ChildAliAc filtered by the gen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByBtype(string $btype) Return the first ChildAliAc filtered by the btype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByPv(string $pv) Return the first ChildAliAc filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByPercer(string $percer) Return the first ChildAliAc filtered by the percer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByTotal(string $total) Return the first ChildAliAc filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByFdate(string $fdate) Return the first ChildAliAc filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByTdate(string $tdate) Return the first ChildAliAc filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByPosCur(string $pos_cur) Return the first ChildAliAc filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByType(string $type) Return the first ChildAliAc filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByCrate(string $crate) Return the first ChildAliAc filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAc requireOneByLocationbase(int $locationbase) Return the first ChildAliAc filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliAc objects based on current ModelCriteria
 * @method     ChildAliAc[]|ObjectCollection findByAid(int $aid) Return ChildAliAc objects filtered by the aid column
 * @method     ChildAliAc[]|ObjectCollection findByRcode(int $rcode) Return ChildAliAc objects filtered by the rcode column
 * @method     ChildAliAc[]|ObjectCollection findByMcode(string $mcode) Return ChildAliAc objects filtered by the mcode column
 * @method     ChildAliAc[]|ObjectCollection findByNameT(string $name_t) Return ChildAliAc objects filtered by the name_t column
 * @method     ChildAliAc[]|ObjectCollection findByMposi(string $mposi) Return ChildAliAc objects filtered by the mposi column
 * @method     ChildAliAc[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliAc objects filtered by the upa_code column
 * @method     ChildAliAc[]|ObjectCollection findByUpaName(string $upa_name) Return ChildAliAc objects filtered by the upa_name column
 * @method     ChildAliAc[]|ObjectCollection findByBposi(string $bposi) Return ChildAliAc objects filtered by the bposi column
 * @method     ChildAliAc[]|ObjectCollection findByLevel(string $level) Return ChildAliAc objects filtered by the level column
 * @method     ChildAliAc[]|ObjectCollection findByGen(string $gen) Return ChildAliAc objects filtered by the gen column
 * @method     ChildAliAc[]|ObjectCollection findByBtype(string $btype) Return ChildAliAc objects filtered by the btype column
 * @method     ChildAliAc[]|ObjectCollection findByPv(string $pv) Return ChildAliAc objects filtered by the pv column
 * @method     ChildAliAc[]|ObjectCollection findByPercer(string $percer) Return ChildAliAc objects filtered by the percer column
 * @method     ChildAliAc[]|ObjectCollection findByTotal(string $total) Return ChildAliAc objects filtered by the total column
 * @method     ChildAliAc[]|ObjectCollection findByFdate(string $fdate) Return ChildAliAc objects filtered by the fdate column
 * @method     ChildAliAc[]|ObjectCollection findByTdate(string $tdate) Return ChildAliAc objects filtered by the tdate column
 * @method     ChildAliAc[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliAc objects filtered by the pos_cur column
 * @method     ChildAliAc[]|ObjectCollection findByType(string $type) Return ChildAliAc objects filtered by the type column
 * @method     ChildAliAc[]|ObjectCollection findByCrate(string $crate) Return ChildAliAc objects filtered by the crate column
 * @method     ChildAliAc[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliAc objects filtered by the locationbase column
 * @method     ChildAliAc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliAcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliAcQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliAc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliAcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliAcQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliAcQuery) {
            return $criteria;
        }
        $query = new ChildAliAcQuery();
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
     * @return ChildAliAc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliAcTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliAcTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliAc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, name_t, mposi, upa_code, upa_name, bposi, level, gen, btype, pv, percer, total, fdate, tdate, pos_cur, type, crate, locationbase FROM ali_ac WHERE aid = :p0';
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
            /** @var ChildAliAc $obj */
            $obj = new ChildAliAc();
            $obj->hydrate($row);
            AliAcTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliAc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliAcTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliAcTableMap::COL_AID, $keys, Criteria::IN);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByMposi($mposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_MPOSI, $mposi, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_UPA_CODE, $upaCode, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByUpaName($upaName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_UPA_NAME, $upaName, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByBposi($bposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_BPOSI, $bposi, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_LEVEL, $level, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByGen($gen = null, $comparison = null)
    {
        if (is_array($gen)) {
            $useMinMax = false;
            if (isset($gen['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_GEN, $gen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gen['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_GEN, $gen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_GEN, $gen, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByBtype($btype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($btype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_BTYPE, $btype, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByPercer($percer = null, $comparison = null)
    {
        if (is_array($percer)) {
            $useMinMax = false;
            if (isset($percer['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_PERCER, $percer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percer['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_PERCER, $percer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_PERCER, $percer, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliAcTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliAcTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAcTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliAc $aliAc Object to remove from the list of results
     *
     * @return $this|ChildAliAcQuery The current query, for fluid interface
     */
    public function prune($aliAc = null)
    {
        if ($aliAc) {
            $this->addUsingAlias(AliAcTableMap::COL_AID, $aliAc->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_ac table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliAcTableMap::clearInstancePool();
            AliAcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliAcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliAcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliAcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliAcQuery
