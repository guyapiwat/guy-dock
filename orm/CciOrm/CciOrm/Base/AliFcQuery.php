<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliFc as ChildAliFc;
use CciOrm\CciOrm\AliFcQuery as ChildAliFcQuery;
use CciOrm\CciOrm\Map\AliFcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_fc' table.
 *
 *
 *
 * @method     ChildAliFcQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliFcQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliFcQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliFcQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliFcQuery orderByMposi($order = Criteria::ASC) Order by the mposi column
 * @method     ChildAliFcQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliFcQuery orderByUpaName($order = Criteria::ASC) Order by the upa_name column
 * @method     ChildAliFcQuery orderByBposi($order = Criteria::ASC) Order by the bposi column
 * @method     ChildAliFcQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildAliFcQuery orderByGen($order = Criteria::ASC) Order by the gen column
 * @method     ChildAliFcQuery orderByBtype($order = Criteria::ASC) Order by the btype column
 * @method     ChildAliFcQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliFcQuery orderByPercer($order = Criteria::ASC) Order by the percer column
 * @method     ChildAliFcQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliFcQuery orderByTotalR($order = Criteria::ASC) Order by the total_r column
 * @method     ChildAliFcQuery orderByCtax($order = Criteria::ASC) Order by the ctax column
 * @method     ChildAliFcQuery orderByCvat($order = Criteria::ASC) Order by the cvat column
 * @method     ChildAliFcQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 * @method     ChildAliFcQuery orderByOon($order = Criteria::ASC) Order by the oon column
 * @method     ChildAliFcQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliFcQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliFcQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliFcQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliFcQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliFcQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliFcQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliFcQuery orderByQty($order = Criteria::ASC) Order by the qty column
 *
 * @method     ChildAliFcQuery groupByAid() Group by the aid column
 * @method     ChildAliFcQuery groupByRcode() Group by the rcode column
 * @method     ChildAliFcQuery groupByMcode() Group by the mcode column
 * @method     ChildAliFcQuery groupByNameT() Group by the name_t column
 * @method     ChildAliFcQuery groupByMposi() Group by the mposi column
 * @method     ChildAliFcQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliFcQuery groupByUpaName() Group by the upa_name column
 * @method     ChildAliFcQuery groupByBposi() Group by the bposi column
 * @method     ChildAliFcQuery groupByLevel() Group by the level column
 * @method     ChildAliFcQuery groupByGen() Group by the gen column
 * @method     ChildAliFcQuery groupByBtype() Group by the btype column
 * @method     ChildAliFcQuery groupByPv() Group by the pv column
 * @method     ChildAliFcQuery groupByPercer() Group by the percer column
 * @method     ChildAliFcQuery groupByTotal() Group by the total column
 * @method     ChildAliFcQuery groupByTotalR() Group by the total_r column
 * @method     ChildAliFcQuery groupByCtax() Group by the ctax column
 * @method     ChildAliFcQuery groupByCvat() Group by the cvat column
 * @method     ChildAliFcQuery groupByAmt() Group by the amt column
 * @method     ChildAliFcQuery groupByOon() Group by the oon column
 * @method     ChildAliFcQuery groupByFdate() Group by the fdate column
 * @method     ChildAliFcQuery groupByTdate() Group by the tdate column
 * @method     ChildAliFcQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliFcQuery groupByCrate() Group by the crate column
 * @method     ChildAliFcQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliFcQuery groupBySano() Group by the sano column
 * @method     ChildAliFcQuery groupByPcode() Group by the pcode column
 * @method     ChildAliFcQuery groupByQty() Group by the qty column
 *
 * @method     ChildAliFcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliFcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliFcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliFcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliFcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliFcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliFc findOne(ConnectionInterface $con = null) Return the first ChildAliFc matching the query
 * @method     ChildAliFc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliFc matching the query, or a new ChildAliFc object populated from the query conditions when no match is found
 *
 * @method     ChildAliFc findOneByAid(int $aid) Return the first ChildAliFc filtered by the aid column
 * @method     ChildAliFc findOneByRcode(int $rcode) Return the first ChildAliFc filtered by the rcode column
 * @method     ChildAliFc findOneByMcode(string $mcode) Return the first ChildAliFc filtered by the mcode column
 * @method     ChildAliFc findOneByNameT(string $name_t) Return the first ChildAliFc filtered by the name_t column
 * @method     ChildAliFc findOneByMposi(string $mposi) Return the first ChildAliFc filtered by the mposi column
 * @method     ChildAliFc findOneByUpaCode(string $upa_code) Return the first ChildAliFc filtered by the upa_code column
 * @method     ChildAliFc findOneByUpaName(string $upa_name) Return the first ChildAliFc filtered by the upa_name column
 * @method     ChildAliFc findOneByBposi(string $bposi) Return the first ChildAliFc filtered by the bposi column
 * @method     ChildAliFc findOneByLevel(string $level) Return the first ChildAliFc filtered by the level column
 * @method     ChildAliFc findOneByGen(string $gen) Return the first ChildAliFc filtered by the gen column
 * @method     ChildAliFc findOneByBtype(string $btype) Return the first ChildAliFc filtered by the btype column
 * @method     ChildAliFc findOneByPv(string $pv) Return the first ChildAliFc filtered by the pv column
 * @method     ChildAliFc findOneByPercer(string $percer) Return the first ChildAliFc filtered by the percer column
 * @method     ChildAliFc findOneByTotal(string $total) Return the first ChildAliFc filtered by the total column
 * @method     ChildAliFc findOneByTotalR(string $total_r) Return the first ChildAliFc filtered by the total_r column
 * @method     ChildAliFc findOneByCtax(string $ctax) Return the first ChildAliFc filtered by the ctax column
 * @method     ChildAliFc findOneByCvat(string $cvat) Return the first ChildAliFc filtered by the cvat column
 * @method     ChildAliFc findOneByAmt(string $amt) Return the first ChildAliFc filtered by the amt column
 * @method     ChildAliFc findOneByOon(string $oon) Return the first ChildAliFc filtered by the oon column
 * @method     ChildAliFc findOneByFdate(string $fdate) Return the first ChildAliFc filtered by the fdate column
 * @method     ChildAliFc findOneByTdate(string $tdate) Return the first ChildAliFc filtered by the tdate column
 * @method     ChildAliFc findOneByPosCur(string $pos_cur) Return the first ChildAliFc filtered by the pos_cur column
 * @method     ChildAliFc findOneByCrate(int $crate) Return the first ChildAliFc filtered by the crate column
 * @method     ChildAliFc findOneByLocationbase(int $locationbase) Return the first ChildAliFc filtered by the locationbase column
 * @method     ChildAliFc findOneBySano(string $sano) Return the first ChildAliFc filtered by the sano column
 * @method     ChildAliFc findOneByPcode(string $pcode) Return the first ChildAliFc filtered by the pcode column
 * @method     ChildAliFc findOneByQty(int $qty) Return the first ChildAliFc filtered by the qty column *

 * @method     ChildAliFc requirePk($key, ConnectionInterface $con = null) Return the ChildAliFc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOne(ConnectionInterface $con = null) Return the first ChildAliFc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliFc requireOneByAid(int $aid) Return the first ChildAliFc filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByRcode(int $rcode) Return the first ChildAliFc filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByMcode(string $mcode) Return the first ChildAliFc filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByNameT(string $name_t) Return the first ChildAliFc filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByMposi(string $mposi) Return the first ChildAliFc filtered by the mposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByUpaCode(string $upa_code) Return the first ChildAliFc filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByUpaName(string $upa_name) Return the first ChildAliFc filtered by the upa_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByBposi(string $bposi) Return the first ChildAliFc filtered by the bposi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByLevel(string $level) Return the first ChildAliFc filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByGen(string $gen) Return the first ChildAliFc filtered by the gen column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByBtype(string $btype) Return the first ChildAliFc filtered by the btype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByPv(string $pv) Return the first ChildAliFc filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByPercer(string $percer) Return the first ChildAliFc filtered by the percer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByTotal(string $total) Return the first ChildAliFc filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByTotalR(string $total_r) Return the first ChildAliFc filtered by the total_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByCtax(string $ctax) Return the first ChildAliFc filtered by the ctax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByCvat(string $cvat) Return the first ChildAliFc filtered by the cvat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByAmt(string $amt) Return the first ChildAliFc filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByOon(string $oon) Return the first ChildAliFc filtered by the oon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByFdate(string $fdate) Return the first ChildAliFc filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByTdate(string $tdate) Return the first ChildAliFc filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByPosCur(string $pos_cur) Return the first ChildAliFc filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByCrate(int $crate) Return the first ChildAliFc filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByLocationbase(int $locationbase) Return the first ChildAliFc filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneBySano(string $sano) Return the first ChildAliFc filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByPcode(string $pcode) Return the first ChildAliFc filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliFc requireOneByQty(int $qty) Return the first ChildAliFc filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliFc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliFc objects based on current ModelCriteria
 * @method     ChildAliFc[]|ObjectCollection findByAid(int $aid) Return ChildAliFc objects filtered by the aid column
 * @method     ChildAliFc[]|ObjectCollection findByRcode(int $rcode) Return ChildAliFc objects filtered by the rcode column
 * @method     ChildAliFc[]|ObjectCollection findByMcode(string $mcode) Return ChildAliFc objects filtered by the mcode column
 * @method     ChildAliFc[]|ObjectCollection findByNameT(string $name_t) Return ChildAliFc objects filtered by the name_t column
 * @method     ChildAliFc[]|ObjectCollection findByMposi(string $mposi) Return ChildAliFc objects filtered by the mposi column
 * @method     ChildAliFc[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliFc objects filtered by the upa_code column
 * @method     ChildAliFc[]|ObjectCollection findByUpaName(string $upa_name) Return ChildAliFc objects filtered by the upa_name column
 * @method     ChildAliFc[]|ObjectCollection findByBposi(string $bposi) Return ChildAliFc objects filtered by the bposi column
 * @method     ChildAliFc[]|ObjectCollection findByLevel(string $level) Return ChildAliFc objects filtered by the level column
 * @method     ChildAliFc[]|ObjectCollection findByGen(string $gen) Return ChildAliFc objects filtered by the gen column
 * @method     ChildAliFc[]|ObjectCollection findByBtype(string $btype) Return ChildAliFc objects filtered by the btype column
 * @method     ChildAliFc[]|ObjectCollection findByPv(string $pv) Return ChildAliFc objects filtered by the pv column
 * @method     ChildAliFc[]|ObjectCollection findByPercer(string $percer) Return ChildAliFc objects filtered by the percer column
 * @method     ChildAliFc[]|ObjectCollection findByTotal(string $total) Return ChildAliFc objects filtered by the total column
 * @method     ChildAliFc[]|ObjectCollection findByTotalR(string $total_r) Return ChildAliFc objects filtered by the total_r column
 * @method     ChildAliFc[]|ObjectCollection findByCtax(string $ctax) Return ChildAliFc objects filtered by the ctax column
 * @method     ChildAliFc[]|ObjectCollection findByCvat(string $cvat) Return ChildAliFc objects filtered by the cvat column
 * @method     ChildAliFc[]|ObjectCollection findByAmt(string $amt) Return ChildAliFc objects filtered by the amt column
 * @method     ChildAliFc[]|ObjectCollection findByOon(string $oon) Return ChildAliFc objects filtered by the oon column
 * @method     ChildAliFc[]|ObjectCollection findByFdate(string $fdate) Return ChildAliFc objects filtered by the fdate column
 * @method     ChildAliFc[]|ObjectCollection findByTdate(string $tdate) Return ChildAliFc objects filtered by the tdate column
 * @method     ChildAliFc[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliFc objects filtered by the pos_cur column
 * @method     ChildAliFc[]|ObjectCollection findByCrate(int $crate) Return ChildAliFc objects filtered by the crate column
 * @method     ChildAliFc[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliFc objects filtered by the locationbase column
 * @method     ChildAliFc[]|ObjectCollection findBySano(string $sano) Return ChildAliFc objects filtered by the sano column
 * @method     ChildAliFc[]|ObjectCollection findByPcode(string $pcode) Return ChildAliFc objects filtered by the pcode column
 * @method     ChildAliFc[]|ObjectCollection findByQty(int $qty) Return ChildAliFc objects filtered by the qty column
 * @method     ChildAliFc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliFcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliFcQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliFc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliFcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliFcQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliFcQuery) {
            return $criteria;
        }
        $query = new ChildAliFcQuery();
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
     * @return ChildAliFc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliFcTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliFcTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliFc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, name_t, mposi, upa_code, upa_name, bposi, level, gen, btype, pv, percer, total, total_r, ctax, cvat, amt, oon, fdate, tdate, pos_cur, crate, locationbase, sano, pcode, qty FROM ali_fc WHERE aid = :p0';
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
            /** @var ChildAliFc $obj */
            $obj = new ChildAliFc();
            $obj->hydrate($row);
            AliFcTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliFc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliFcTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliFcTableMap::COL_AID, $keys, Criteria::IN);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByMposi($mposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_MPOSI, $mposi, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_UPA_CODE, $upaCode, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByUpaName($upaName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_UPA_NAME, $upaName, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByBposi($bposi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bposi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_BPOSI, $bposi, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_LEVEL, $level, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByGen($gen = null, $comparison = null)
    {
        if (is_array($gen)) {
            $useMinMax = false;
            if (isset($gen['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_GEN, $gen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gen['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_GEN, $gen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_GEN, $gen, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByBtype($btype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($btype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_BTYPE, $btype, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByPercer($percer = null, $comparison = null)
    {
        if (is_array($percer)) {
            $useMinMax = false;
            if (isset($percer['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_PERCER, $percer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percer['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_PERCER, $percer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_PERCER, $percer, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the total_r column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalR(1234); // WHERE total_r = 1234
     * $query->filterByTotalR(array(12, 34)); // WHERE total_r IN (12, 34)
     * $query->filterByTotalR(array('min' => 12)); // WHERE total_r > 12
     * </code>
     *
     * @param     mixed $totalR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByTotalR($totalR = null, $comparison = null)
    {
        if (is_array($totalR)) {
            $useMinMax = false;
            if (isset($totalR['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_TOTAL_R, $totalR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalR['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_TOTAL_R, $totalR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_TOTAL_R, $totalR, $comparison);
    }

    /**
     * Filter the query on the ctax column
     *
     * Example usage:
     * <code>
     * $query->filterByCtax(1234); // WHERE ctax = 1234
     * $query->filterByCtax(array(12, 34)); // WHERE ctax IN (12, 34)
     * $query->filterByCtax(array('min' => 12)); // WHERE ctax > 12
     * </code>
     *
     * @param     mixed $ctax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByCtax($ctax = null, $comparison = null)
    {
        if (is_array($ctax)) {
            $useMinMax = false;
            if (isset($ctax['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_CTAX, $ctax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ctax['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_CTAX, $ctax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_CTAX, $ctax, $comparison);
    }

    /**
     * Filter the query on the cvat column
     *
     * Example usage:
     * <code>
     * $query->filterByCvat(1234); // WHERE cvat = 1234
     * $query->filterByCvat(array(12, 34)); // WHERE cvat IN (12, 34)
     * $query->filterByCvat(array('min' => 12)); // WHERE cvat > 12
     * </code>
     *
     * @param     mixed $cvat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByCvat($cvat = null, $comparison = null)
    {
        if (is_array($cvat)) {
            $useMinMax = false;
            if (isset($cvat['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_CVAT, $cvat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cvat['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_CVAT, $cvat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_CVAT, $cvat, $comparison);
    }

    /**
     * Filter the query on the amt column
     *
     * Example usage:
     * <code>
     * $query->filterByAmt(1234); // WHERE amt = 1234
     * $query->filterByAmt(array(12, 34)); // WHERE amt IN (12, 34)
     * $query->filterByAmt(array('min' => 12)); // WHERE amt > 12
     * </code>
     *
     * @param     mixed $amt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (is_array($amt)) {
            $useMinMax = false;
            if (isset($amt['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_AMT, $amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amt['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_AMT, $amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_AMT, $amt, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByOon($oon = null, $comparison = null)
    {
        if (is_array($oon)) {
            $useMinMax = false;
            if (isset($oon['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_OON, $oon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($oon['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_OON, $oon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_OON, $oon, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_POS_CUR, $posCur, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Filter the query on the pcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPcode('fooValue');   // WHERE pcode = 'fooValue'
     * $query->filterByPcode('%fooValue%', Criteria::LIKE); // WHERE pcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_PCODE, $pcode, $comparison);
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty(1234); // WHERE qty = 1234
     * $query->filterByQty(array(12, 34)); // WHERE qty IN (12, 34)
     * $query->filterByQty(array('min' => 12)); // WHERE qty > 12
     * </code>
     *
     * @param     mixed $qty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliFcTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliFcTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliFcTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliFc $aliFc Object to remove from the list of results
     *
     * @return $this|ChildAliFcQuery The current query, for fluid interface
     */
    public function prune($aliFc = null)
    {
        if ($aliFc) {
            $this->addUsingAlias(AliFcTableMap::COL_AID, $aliFc->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_fc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliFcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliFcTableMap::clearInstancePool();
            AliFcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliFcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliFcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliFcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliFcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliFcQuery
