<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEm as ChildAliEm;
use CciOrm\CciOrm\AliEmQuery as ChildAliEmQuery;
use CciOrm\CciOrm\Map\AliEmTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_em' table.
 *
 *
 *
 * @method     ChildAliEmQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliEmQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliEmQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEmQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliEmQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliEmQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliEmQuery orderByShare($order = Criteria::ASC) Order by the share column
 * @method     ChildAliEmQuery orderByPercer($order = Criteria::ASC) Order by the percer column
 * @method     ChildAliEmQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEmQuery orderByTotal1($order = Criteria::ASC) Order by the total1 column
 * @method     ChildAliEmQuery orderByTotal2($order = Criteria::ASC) Order by the total2 column
 * @method     ChildAliEmQuery orderByTotal3($order = Criteria::ASC) Order by the total3 column
 * @method     ChildAliEmQuery orderByTotal4($order = Criteria::ASC) Order by the total4 column
 * @method     ChildAliEmQuery orderByTotal5($order = Criteria::ASC) Order by the total5 column
 * @method     ChildAliEmQuery orderByTotal6($order = Criteria::ASC) Order by the total6 column
 * @method     ChildAliEmQuery orderByPershare($order = Criteria::ASC) Order by the pershare column
 * @method     ChildAliEmQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliEmQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliEmQuery orderByPvWorld($order = Criteria::ASC) Order by the pv_world column
 * @method     ChildAliEmQuery orderByPools($order = Criteria::ASC) Order by the pools column
 * @method     ChildAliEmQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliEmQuery orderByPosCur1($order = Criteria::ASC) Order by the pos_cur1 column
 * @method     ChildAliEmQuery orderByWeak($order = Criteria::ASC) Order by the weak column
 * @method     ChildAliEmQuery orderByOon($order = Criteria::ASC) Order by the oon column
 * @method     ChildAliEmQuery orderByExp($order = Criteria::ASC) Order by the exp column
 *
 * @method     ChildAliEmQuery groupById() Group by the id column
 * @method     ChildAliEmQuery groupByRcode() Group by the rcode column
 * @method     ChildAliEmQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEmQuery groupByMpos() Group by the mpos column
 * @method     ChildAliEmQuery groupByNameT() Group by the name_t column
 * @method     ChildAliEmQuery groupByPv() Group by the pv column
 * @method     ChildAliEmQuery groupByShare() Group by the share column
 * @method     ChildAliEmQuery groupByPercer() Group by the percer column
 * @method     ChildAliEmQuery groupByTotal() Group by the total column
 * @method     ChildAliEmQuery groupByTotal1() Group by the total1 column
 * @method     ChildAliEmQuery groupByTotal2() Group by the total2 column
 * @method     ChildAliEmQuery groupByTotal3() Group by the total3 column
 * @method     ChildAliEmQuery groupByTotal4() Group by the total4 column
 * @method     ChildAliEmQuery groupByTotal5() Group by the total5 column
 * @method     ChildAliEmQuery groupByTotal6() Group by the total6 column
 * @method     ChildAliEmQuery groupByPershare() Group by the pershare column
 * @method     ChildAliEmQuery groupByFdate() Group by the fdate column
 * @method     ChildAliEmQuery groupByTdate() Group by the tdate column
 * @method     ChildAliEmQuery groupByPvWorld() Group by the pv_world column
 * @method     ChildAliEmQuery groupByPools() Group by the pools column
 * @method     ChildAliEmQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliEmQuery groupByPosCur1() Group by the pos_cur1 column
 * @method     ChildAliEmQuery groupByWeak() Group by the weak column
 * @method     ChildAliEmQuery groupByOon() Group by the oon column
 * @method     ChildAliEmQuery groupByExp() Group by the exp column
 *
 * @method     ChildAliEmQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEmQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEmQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEmQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEmQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEmQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEm findOne(ConnectionInterface $con = null) Return the first ChildAliEm matching the query
 * @method     ChildAliEm findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEm matching the query, or a new ChildAliEm object populated from the query conditions when no match is found
 *
 * @method     ChildAliEm findOneById(int $id) Return the first ChildAliEm filtered by the id column
 * @method     ChildAliEm findOneByRcode(int $rcode) Return the first ChildAliEm filtered by the rcode column
 * @method     ChildAliEm findOneByMcode(string $mcode) Return the first ChildAliEm filtered by the mcode column
 * @method     ChildAliEm findOneByMpos(string $mpos) Return the first ChildAliEm filtered by the mpos column
 * @method     ChildAliEm findOneByNameT(string $name_t) Return the first ChildAliEm filtered by the name_t column
 * @method     ChildAliEm findOneByPv(string $pv) Return the first ChildAliEm filtered by the pv column
 * @method     ChildAliEm findOneByShare(int $share) Return the first ChildAliEm filtered by the share column
 * @method     ChildAliEm findOneByPercer(string $percer) Return the first ChildAliEm filtered by the percer column
 * @method     ChildAliEm findOneByTotal(string $total) Return the first ChildAliEm filtered by the total column
 * @method     ChildAliEm findOneByTotal1(string $total1) Return the first ChildAliEm filtered by the total1 column
 * @method     ChildAliEm findOneByTotal2(string $total2) Return the first ChildAliEm filtered by the total2 column
 * @method     ChildAliEm findOneByTotal3(string $total3) Return the first ChildAliEm filtered by the total3 column
 * @method     ChildAliEm findOneByTotal4(string $total4) Return the first ChildAliEm filtered by the total4 column
 * @method     ChildAliEm findOneByTotal5(string $total5) Return the first ChildAliEm filtered by the total5 column
 * @method     ChildAliEm findOneByTotal6(string $total6) Return the first ChildAliEm filtered by the total6 column
 * @method     ChildAliEm findOneByPershare(string $pershare) Return the first ChildAliEm filtered by the pershare column
 * @method     ChildAliEm findOneByFdate(string $fdate) Return the first ChildAliEm filtered by the fdate column
 * @method     ChildAliEm findOneByTdate(string $tdate) Return the first ChildAliEm filtered by the tdate column
 * @method     ChildAliEm findOneByPvWorld(string $pv_world) Return the first ChildAliEm filtered by the pv_world column
 * @method     ChildAliEm findOneByPools(int $pools) Return the first ChildAliEm filtered by the pools column
 * @method     ChildAliEm findOneByPosCur(string $pos_cur) Return the first ChildAliEm filtered by the pos_cur column
 * @method     ChildAliEm findOneByPosCur1(string $pos_cur1) Return the first ChildAliEm filtered by the pos_cur1 column
 * @method     ChildAliEm findOneByWeak(string $weak) Return the first ChildAliEm filtered by the weak column
 * @method     ChildAliEm findOneByOon(int $oon) Return the first ChildAliEm filtered by the oon column
 * @method     ChildAliEm findOneByExp(string $exp) Return the first ChildAliEm filtered by the exp column *

 * @method     ChildAliEm requirePk($key, ConnectionInterface $con = null) Return the ChildAliEm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOne(ConnectionInterface $con = null) Return the first ChildAliEm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEm requireOneById(int $id) Return the first ChildAliEm filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByRcode(int $rcode) Return the first ChildAliEm filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByMcode(string $mcode) Return the first ChildAliEm filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByMpos(string $mpos) Return the first ChildAliEm filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByNameT(string $name_t) Return the first ChildAliEm filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByPv(string $pv) Return the first ChildAliEm filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByShare(int $share) Return the first ChildAliEm filtered by the share column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByPercer(string $percer) Return the first ChildAliEm filtered by the percer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByTotal(string $total) Return the first ChildAliEm filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByTotal1(string $total1) Return the first ChildAliEm filtered by the total1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByTotal2(string $total2) Return the first ChildAliEm filtered by the total2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByTotal3(string $total3) Return the first ChildAliEm filtered by the total3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByTotal4(string $total4) Return the first ChildAliEm filtered by the total4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByTotal5(string $total5) Return the first ChildAliEm filtered by the total5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByTotal6(string $total6) Return the first ChildAliEm filtered by the total6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByPershare(string $pershare) Return the first ChildAliEm filtered by the pershare column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByFdate(string $fdate) Return the first ChildAliEm filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByTdate(string $tdate) Return the first ChildAliEm filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByPvWorld(string $pv_world) Return the first ChildAliEm filtered by the pv_world column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByPools(int $pools) Return the first ChildAliEm filtered by the pools column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByPosCur(string $pos_cur) Return the first ChildAliEm filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByPosCur1(string $pos_cur1) Return the first ChildAliEm filtered by the pos_cur1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByWeak(string $weak) Return the first ChildAliEm filtered by the weak column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByOon(int $oon) Return the first ChildAliEm filtered by the oon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEm requireOneByExp(string $exp) Return the first ChildAliEm filtered by the exp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEm[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEm objects based on current ModelCriteria
 * @method     ChildAliEm[]|ObjectCollection findById(int $id) Return ChildAliEm objects filtered by the id column
 * @method     ChildAliEm[]|ObjectCollection findByRcode(int $rcode) Return ChildAliEm objects filtered by the rcode column
 * @method     ChildAliEm[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEm objects filtered by the mcode column
 * @method     ChildAliEm[]|ObjectCollection findByMpos(string $mpos) Return ChildAliEm objects filtered by the mpos column
 * @method     ChildAliEm[]|ObjectCollection findByNameT(string $name_t) Return ChildAliEm objects filtered by the name_t column
 * @method     ChildAliEm[]|ObjectCollection findByPv(string $pv) Return ChildAliEm objects filtered by the pv column
 * @method     ChildAliEm[]|ObjectCollection findByShare(int $share) Return ChildAliEm objects filtered by the share column
 * @method     ChildAliEm[]|ObjectCollection findByPercer(string $percer) Return ChildAliEm objects filtered by the percer column
 * @method     ChildAliEm[]|ObjectCollection findByTotal(string $total) Return ChildAliEm objects filtered by the total column
 * @method     ChildAliEm[]|ObjectCollection findByTotal1(string $total1) Return ChildAliEm objects filtered by the total1 column
 * @method     ChildAliEm[]|ObjectCollection findByTotal2(string $total2) Return ChildAliEm objects filtered by the total2 column
 * @method     ChildAliEm[]|ObjectCollection findByTotal3(string $total3) Return ChildAliEm objects filtered by the total3 column
 * @method     ChildAliEm[]|ObjectCollection findByTotal4(string $total4) Return ChildAliEm objects filtered by the total4 column
 * @method     ChildAliEm[]|ObjectCollection findByTotal5(string $total5) Return ChildAliEm objects filtered by the total5 column
 * @method     ChildAliEm[]|ObjectCollection findByTotal6(string $total6) Return ChildAliEm objects filtered by the total6 column
 * @method     ChildAliEm[]|ObjectCollection findByPershare(string $pershare) Return ChildAliEm objects filtered by the pershare column
 * @method     ChildAliEm[]|ObjectCollection findByFdate(string $fdate) Return ChildAliEm objects filtered by the fdate column
 * @method     ChildAliEm[]|ObjectCollection findByTdate(string $tdate) Return ChildAliEm objects filtered by the tdate column
 * @method     ChildAliEm[]|ObjectCollection findByPvWorld(string $pv_world) Return ChildAliEm objects filtered by the pv_world column
 * @method     ChildAliEm[]|ObjectCollection findByPools(int $pools) Return ChildAliEm objects filtered by the pools column
 * @method     ChildAliEm[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliEm objects filtered by the pos_cur column
 * @method     ChildAliEm[]|ObjectCollection findByPosCur1(string $pos_cur1) Return ChildAliEm objects filtered by the pos_cur1 column
 * @method     ChildAliEm[]|ObjectCollection findByWeak(string $weak) Return ChildAliEm objects filtered by the weak column
 * @method     ChildAliEm[]|ObjectCollection findByOon(int $oon) Return ChildAliEm objects filtered by the oon column
 * @method     ChildAliEm[]|ObjectCollection findByExp(string $exp) Return ChildAliEm objects filtered by the exp column
 * @method     ChildAliEm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEmQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEmQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEmQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEmQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEmQuery) {
            return $criteria;
        }
        $query = new ChildAliEmQuery();
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
     * @return ChildAliEm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEmTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEmTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, mpos, name_t, pv, share, percer, total, total1, total2, total3, total4, total5, total6, pershare, fdate, tdate, pv_world, pools, pos_cur, pos_cur1, weak, oon, exp FROM ali_em WHERE id = :p0';
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
            /** @var ChildAliEm $obj */
            $obj = new ChildAliEm();
            $obj->hydrate($row);
            AliEmTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEm|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEmTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEmTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the mpos column
     *
     * Example usage:
     * <code>
     * $query->filterByMpos('fooValue');   // WHERE mpos = 'fooValue'
     * $query->filterByMpos('%fooValue%', Criteria::LIKE); // WHERE mpos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mpos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_MPOS, $mpos, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_PV, $pv, $comparison);
    }

    /**
     * Filter the query on the share column
     *
     * Example usage:
     * <code>
     * $query->filterByShare(1234); // WHERE share = 1234
     * $query->filterByShare(array(12, 34)); // WHERE share IN (12, 34)
     * $query->filterByShare(array('min' => 12)); // WHERE share > 12
     * </code>
     *
     * @param     mixed $share The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByShare($share = null, $comparison = null)
    {
        if (is_array($share)) {
            $useMinMax = false;
            if (isset($share['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_SHARE, $share['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($share['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_SHARE, $share['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_SHARE, $share, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPercer($percer = null, $comparison = null)
    {
        if (is_array($percer)) {
            $useMinMax = false;
            if (isset($percer['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_PERCER, $percer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percer['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_PERCER, $percer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_PERCER, $percer, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the total1 column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal1(1234); // WHERE total1 = 1234
     * $query->filterByTotal1(array(12, 34)); // WHERE total1 IN (12, 34)
     * $query->filterByTotal1(array('min' => 12)); // WHERE total1 > 12
     * </code>
     *
     * @param     mixed $total1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByTotal1($total1 = null, $comparison = null)
    {
        if (is_array($total1)) {
            $useMinMax = false;
            if (isset($total1['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL1, $total1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total1['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL1, $total1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_TOTAL1, $total1, $comparison);
    }

    /**
     * Filter the query on the total2 column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal2(1234); // WHERE total2 = 1234
     * $query->filterByTotal2(array(12, 34)); // WHERE total2 IN (12, 34)
     * $query->filterByTotal2(array('min' => 12)); // WHERE total2 > 12
     * </code>
     *
     * @param     mixed $total2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByTotal2($total2 = null, $comparison = null)
    {
        if (is_array($total2)) {
            $useMinMax = false;
            if (isset($total2['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL2, $total2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total2['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL2, $total2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_TOTAL2, $total2, $comparison);
    }

    /**
     * Filter the query on the total3 column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal3(1234); // WHERE total3 = 1234
     * $query->filterByTotal3(array(12, 34)); // WHERE total3 IN (12, 34)
     * $query->filterByTotal3(array('min' => 12)); // WHERE total3 > 12
     * </code>
     *
     * @param     mixed $total3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByTotal3($total3 = null, $comparison = null)
    {
        if (is_array($total3)) {
            $useMinMax = false;
            if (isset($total3['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL3, $total3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total3['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL3, $total3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_TOTAL3, $total3, $comparison);
    }

    /**
     * Filter the query on the total4 column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal4(1234); // WHERE total4 = 1234
     * $query->filterByTotal4(array(12, 34)); // WHERE total4 IN (12, 34)
     * $query->filterByTotal4(array('min' => 12)); // WHERE total4 > 12
     * </code>
     *
     * @param     mixed $total4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByTotal4($total4 = null, $comparison = null)
    {
        if (is_array($total4)) {
            $useMinMax = false;
            if (isset($total4['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL4, $total4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total4['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL4, $total4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_TOTAL4, $total4, $comparison);
    }

    /**
     * Filter the query on the total5 column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal5(1234); // WHERE total5 = 1234
     * $query->filterByTotal5(array(12, 34)); // WHERE total5 IN (12, 34)
     * $query->filterByTotal5(array('min' => 12)); // WHERE total5 > 12
     * </code>
     *
     * @param     mixed $total5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByTotal5($total5 = null, $comparison = null)
    {
        if (is_array($total5)) {
            $useMinMax = false;
            if (isset($total5['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL5, $total5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total5['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL5, $total5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_TOTAL5, $total5, $comparison);
    }

    /**
     * Filter the query on the total6 column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal6(1234); // WHERE total6 = 1234
     * $query->filterByTotal6(array(12, 34)); // WHERE total6 IN (12, 34)
     * $query->filterByTotal6(array('min' => 12)); // WHERE total6 > 12
     * </code>
     *
     * @param     mixed $total6 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByTotal6($total6 = null, $comparison = null)
    {
        if (is_array($total6)) {
            $useMinMax = false;
            if (isset($total6['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL6, $total6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total6['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TOTAL6, $total6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_TOTAL6, $total6, $comparison);
    }

    /**
     * Filter the query on the pershare column
     *
     * Example usage:
     * <code>
     * $query->filterByPershare(1234); // WHERE pershare = 1234
     * $query->filterByPershare(array(12, 34)); // WHERE pershare IN (12, 34)
     * $query->filterByPershare(array('min' => 12)); // WHERE pershare > 12
     * </code>
     *
     * @param     mixed $pershare The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPershare($pershare = null, $comparison = null)
    {
        if (is_array($pershare)) {
            $useMinMax = false;
            if (isset($pershare['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_PERSHARE, $pershare['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pershare['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_PERSHARE, $pershare['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_PERSHARE, $pershare, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the pv_world column
     *
     * Example usage:
     * <code>
     * $query->filterByPvWorld(1234); // WHERE pv_world = 1234
     * $query->filterByPvWorld(array(12, 34)); // WHERE pv_world IN (12, 34)
     * $query->filterByPvWorld(array('min' => 12)); // WHERE pv_world > 12
     * </code>
     *
     * @param     mixed $pvWorld The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPvWorld($pvWorld = null, $comparison = null)
    {
        if (is_array($pvWorld)) {
            $useMinMax = false;
            if (isset($pvWorld['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_PV_WORLD, $pvWorld['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvWorld['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_PV_WORLD, $pvWorld['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_PV_WORLD, $pvWorld, $comparison);
    }

    /**
     * Filter the query on the pools column
     *
     * Example usage:
     * <code>
     * $query->filterByPools(1234); // WHERE pools = 1234
     * $query->filterByPools(array(12, 34)); // WHERE pools IN (12, 34)
     * $query->filterByPools(array('min' => 12)); // WHERE pools > 12
     * </code>
     *
     * @param     mixed $pools The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPools($pools = null, $comparison = null)
    {
        if (is_array($pools)) {
            $useMinMax = false;
            if (isset($pools['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_POOLS, $pools['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pools['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_POOLS, $pools['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_POOLS, $pools, $comparison);
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
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the pos_cur1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur1('fooValue');   // WHERE pos_cur1 = 'fooValue'
     * $query->filterByPosCur1('%fooValue%', Criteria::LIKE); // WHERE pos_cur1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByPosCur1($posCur1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_POS_CUR1, $posCur1, $comparison);
    }

    /**
     * Filter the query on the weak column
     *
     * Example usage:
     * <code>
     * $query->filterByWeak(1234); // WHERE weak = 1234
     * $query->filterByWeak(array(12, 34)); // WHERE weak IN (12, 34)
     * $query->filterByWeak(array('min' => 12)); // WHERE weak > 12
     * </code>
     *
     * @param     mixed $weak The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByWeak($weak = null, $comparison = null)
    {
        if (is_array($weak)) {
            $useMinMax = false;
            if (isset($weak['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_WEAK, $weak['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weak['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_WEAK, $weak['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_WEAK, $weak, $comparison);
    }

    /**
     * Filter the query on the oon column
     *
     * Example usage:
     * <code>
     * $query->filterByOon(1234); // WHERE oon = 1234
     * $query->filterByOon(array(12, 34)); // WHERE oon IN (12, 34)
     * $query->filterByOon(array('min' => 12)); // WHERE oon > 12
     * </code>
     *
     * @param     mixed $oon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByOon($oon = null, $comparison = null)
    {
        if (is_array($oon)) {
            $useMinMax = false;
            if (isset($oon['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_OON, $oon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($oon['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_OON, $oon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_OON, $oon, $comparison);
    }

    /**
     * Filter the query on the exp column
     *
     * Example usage:
     * <code>
     * $query->filterByExp(1234); // WHERE exp = 1234
     * $query->filterByExp(array(12, 34)); // WHERE exp IN (12, 34)
     * $query->filterByExp(array('min' => 12)); // WHERE exp > 12
     * </code>
     *
     * @param     mixed $exp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function filterByExp($exp = null, $comparison = null)
    {
        if (is_array($exp)) {
            $useMinMax = false;
            if (isset($exp['min'])) {
                $this->addUsingAlias(AliEmTableMap::COL_EXP, $exp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($exp['max'])) {
                $this->addUsingAlias(AliEmTableMap::COL_EXP, $exp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmTableMap::COL_EXP, $exp, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEm $aliEm Object to remove from the list of results
     *
     * @return $this|ChildAliEmQuery The current query, for fluid interface
     */
    public function prune($aliEm = null)
    {
        if ($aliEm) {
            $this->addUsingAlias(AliEmTableMap::COL_ID, $aliEm->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_em table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEmTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEmTableMap::clearInstancePool();
            AliEmTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEmTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEmTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEmTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEmTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEmQuery
