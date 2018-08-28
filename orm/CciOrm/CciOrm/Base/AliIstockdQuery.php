<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliIstockd as ChildAliIstockd;
use CciOrm\CciOrm\AliIstockdQuery as ChildAliIstockdQuery;
use CciOrm\CciOrm\Map\AliIstockdTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_istockd' table.
 *
 *
 *
 * @method     ChildAliIstockdQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliIstockdQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliIstockdQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliIstockdQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliIstockdQuery orderByInvCoden($order = Criteria::ASC) Order by the inv_coden column
 * @method     ChildAliIstockdQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliIstockdQuery orderByInvRefn($order = Criteria::ASC) Order by the inv_refn column
 * @method     ChildAliIstockdQuery orderByRccode($order = Criteria::ASC) Order by the rccode column
 * @method     ChildAliIstockdQuery orderByStockist($order = Criteria::ASC) Order by the stockist column
 * @method     ChildAliIstockdQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliIstockdQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliIstockdQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildAliIstockdQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliIstockdQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method     ChildAliIstockdQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliIstockdQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliIstockdQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliIstockdQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 * @method     ChildAliIstockdQuery orderByCtax($order = Criteria::ASC) Order by the ctax column
 * @method     ChildAliIstockdQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 *
 * @method     ChildAliIstockdQuery groupById() Group by the id column
 * @method     ChildAliIstockdQuery groupBySano() Group by the sano column
 * @method     ChildAliIstockdQuery groupBySadate() Group by the sadate column
 * @method     ChildAliIstockdQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliIstockdQuery groupByInvCoden() Group by the inv_coden column
 * @method     ChildAliIstockdQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliIstockdQuery groupByInvRefn() Group by the inv_refn column
 * @method     ChildAliIstockdQuery groupByRccode() Group by the rccode column
 * @method     ChildAliIstockdQuery groupByStockist() Group by the stockist column
 * @method     ChildAliIstockdQuery groupByPcode() Group by the pcode column
 * @method     ChildAliIstockdQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliIstockdQuery groupByUnit() Group by the unit column
 * @method     ChildAliIstockdQuery groupByMcode() Group by the mcode column
 * @method     ChildAliIstockdQuery groupByCost() Group by the cost column
 * @method     ChildAliIstockdQuery groupByPrice() Group by the price column
 * @method     ChildAliIstockdQuery groupByPv() Group by the pv column
 * @method     ChildAliIstockdQuery groupByQty() Group by the qty column
 * @method     ChildAliIstockdQuery groupByAmt() Group by the amt column
 * @method     ChildAliIstockdQuery groupByCtax() Group by the ctax column
 * @method     ChildAliIstockdQuery groupByGroupId() Group by the group_id column
 *
 * @method     ChildAliIstockdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliIstockdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliIstockdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliIstockdQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliIstockdQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliIstockdQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliIstockd findOne(ConnectionInterface $con = null) Return the first ChildAliIstockd matching the query
 * @method     ChildAliIstockd findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliIstockd matching the query, or a new ChildAliIstockd object populated from the query conditions when no match is found
 *
 * @method     ChildAliIstockd findOneById(int $id) Return the first ChildAliIstockd filtered by the id column
 * @method     ChildAliIstockd findOneBySano(int $sano) Return the first ChildAliIstockd filtered by the sano column
 * @method     ChildAliIstockd findOneBySadate(string $sadate) Return the first ChildAliIstockd filtered by the sadate column
 * @method     ChildAliIstockd findOneByInvCode(string $inv_code) Return the first ChildAliIstockd filtered by the inv_code column
 * @method     ChildAliIstockd findOneByInvCoden(string $inv_coden) Return the first ChildAliIstockd filtered by the inv_coden column
 * @method     ChildAliIstockd findOneByInvRef(string $inv_ref) Return the first ChildAliIstockd filtered by the inv_ref column
 * @method     ChildAliIstockd findOneByInvRefn(string $inv_refn) Return the first ChildAliIstockd filtered by the inv_refn column
 * @method     ChildAliIstockd findOneByRccode(string $rccode) Return the first ChildAliIstockd filtered by the rccode column
 * @method     ChildAliIstockd findOneByStockist(string $stockist) Return the first ChildAliIstockd filtered by the stockist column
 * @method     ChildAliIstockd findOneByPcode(string $pcode) Return the first ChildAliIstockd filtered by the pcode column
 * @method     ChildAliIstockd findOneByPdesc(string $pdesc) Return the first ChildAliIstockd filtered by the pdesc column
 * @method     ChildAliIstockd findOneByUnit(string $unit) Return the first ChildAliIstockd filtered by the unit column
 * @method     ChildAliIstockd findOneByMcode(string $mcode) Return the first ChildAliIstockd filtered by the mcode column
 * @method     ChildAliIstockd findOneByCost(string $cost) Return the first ChildAliIstockd filtered by the cost column
 * @method     ChildAliIstockd findOneByPrice(string $price) Return the first ChildAliIstockd filtered by the price column
 * @method     ChildAliIstockd findOneByPv(string $pv) Return the first ChildAliIstockd filtered by the pv column
 * @method     ChildAliIstockd findOneByQty(string $qty) Return the first ChildAliIstockd filtered by the qty column
 * @method     ChildAliIstockd findOneByAmt(string $amt) Return the first ChildAliIstockd filtered by the amt column
 * @method     ChildAliIstockd findOneByCtax(int $ctax) Return the first ChildAliIstockd filtered by the ctax column
 * @method     ChildAliIstockd findOneByGroupId(string $group_id) Return the first ChildAliIstockd filtered by the group_id column *

 * @method     ChildAliIstockd requirePk($key, ConnectionInterface $con = null) Return the ChildAliIstockd by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOne(ConnectionInterface $con = null) Return the first ChildAliIstockd matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliIstockd requireOneById(int $id) Return the first ChildAliIstockd filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneBySano(int $sano) Return the first ChildAliIstockd filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneBySadate(string $sadate) Return the first ChildAliIstockd filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByInvCode(string $inv_code) Return the first ChildAliIstockd filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByInvCoden(string $inv_coden) Return the first ChildAliIstockd filtered by the inv_coden column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByInvRef(string $inv_ref) Return the first ChildAliIstockd filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByInvRefn(string $inv_refn) Return the first ChildAliIstockd filtered by the inv_refn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByRccode(string $rccode) Return the first ChildAliIstockd filtered by the rccode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByStockist(string $stockist) Return the first ChildAliIstockd filtered by the stockist column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByPcode(string $pcode) Return the first ChildAliIstockd filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByPdesc(string $pdesc) Return the first ChildAliIstockd filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByUnit(string $unit) Return the first ChildAliIstockd filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByMcode(string $mcode) Return the first ChildAliIstockd filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByCost(string $cost) Return the first ChildAliIstockd filtered by the cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByPrice(string $price) Return the first ChildAliIstockd filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByPv(string $pv) Return the first ChildAliIstockd filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByQty(string $qty) Return the first ChildAliIstockd filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByAmt(string $amt) Return the first ChildAliIstockd filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByCtax(int $ctax) Return the first ChildAliIstockd filtered by the ctax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliIstockd requireOneByGroupId(string $group_id) Return the first ChildAliIstockd filtered by the group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliIstockd[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliIstockd objects based on current ModelCriteria
 * @method     ChildAliIstockd[]|ObjectCollection findById(int $id) Return ChildAliIstockd objects filtered by the id column
 * @method     ChildAliIstockd[]|ObjectCollection findBySano(int $sano) Return ChildAliIstockd objects filtered by the sano column
 * @method     ChildAliIstockd[]|ObjectCollection findBySadate(string $sadate) Return ChildAliIstockd objects filtered by the sadate column
 * @method     ChildAliIstockd[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliIstockd objects filtered by the inv_code column
 * @method     ChildAliIstockd[]|ObjectCollection findByInvCoden(string $inv_coden) Return ChildAliIstockd objects filtered by the inv_coden column
 * @method     ChildAliIstockd[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliIstockd objects filtered by the inv_ref column
 * @method     ChildAliIstockd[]|ObjectCollection findByInvRefn(string $inv_refn) Return ChildAliIstockd objects filtered by the inv_refn column
 * @method     ChildAliIstockd[]|ObjectCollection findByRccode(string $rccode) Return ChildAliIstockd objects filtered by the rccode column
 * @method     ChildAliIstockd[]|ObjectCollection findByStockist(string $stockist) Return ChildAliIstockd objects filtered by the stockist column
 * @method     ChildAliIstockd[]|ObjectCollection findByPcode(string $pcode) Return ChildAliIstockd objects filtered by the pcode column
 * @method     ChildAliIstockd[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliIstockd objects filtered by the pdesc column
 * @method     ChildAliIstockd[]|ObjectCollection findByUnit(string $unit) Return ChildAliIstockd objects filtered by the unit column
 * @method     ChildAliIstockd[]|ObjectCollection findByMcode(string $mcode) Return ChildAliIstockd objects filtered by the mcode column
 * @method     ChildAliIstockd[]|ObjectCollection findByCost(string $cost) Return ChildAliIstockd objects filtered by the cost column
 * @method     ChildAliIstockd[]|ObjectCollection findByPrice(string $price) Return ChildAliIstockd objects filtered by the price column
 * @method     ChildAliIstockd[]|ObjectCollection findByPv(string $pv) Return ChildAliIstockd objects filtered by the pv column
 * @method     ChildAliIstockd[]|ObjectCollection findByQty(string $qty) Return ChildAliIstockd objects filtered by the qty column
 * @method     ChildAliIstockd[]|ObjectCollection findByAmt(string $amt) Return ChildAliIstockd objects filtered by the amt column
 * @method     ChildAliIstockd[]|ObjectCollection findByCtax(int $ctax) Return ChildAliIstockd objects filtered by the ctax column
 * @method     ChildAliIstockd[]|ObjectCollection findByGroupId(string $group_id) Return ChildAliIstockd objects filtered by the group_id column
 * @method     ChildAliIstockd[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliIstockdQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliIstockdQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliIstockd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliIstockdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliIstockdQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliIstockdQuery) {
            return $criteria;
        }
        $query = new ChildAliIstockdQuery();
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
     * @return ChildAliIstockd|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliIstockdTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliIstockdTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliIstockd A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sano, sadate, inv_code, inv_coden, inv_ref, inv_refn, rccode, stockist, pcode, pdesc, unit, mcode, cost, price, pv, qty, amt, ctax, group_id FROM ali_istockd WHERE id = :p0';
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
            /** @var ChildAliIstockd $obj */
            $obj = new ChildAliIstockd();
            $obj->hydrate($row);
            AliIstockdTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliIstockd|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliIstockdTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliIstockdTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano(1234); // WHERE sano = 1234
     * $query->filterBySano(array(12, 34)); // WHERE sano IN (12, 34)
     * $query->filterBySano(array('min' => 12)); // WHERE sano > 12
     * </code>
     *
     * @param     mixed $sano The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (is_array($sano)) {
            $useMinMax = false;
            if (isset($sano['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_SANO, $sano['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_SANO, $sano['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the inv_coden column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCoden('fooValue');   // WHERE inv_coden = 'fooValue'
     * $query->filterByInvCoden('%fooValue%', Criteria::LIKE); // WHERE inv_coden LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCoden The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByInvCoden($invCoden = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCoden)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_INV_CODEN, $invCoden, $comparison);
    }

    /**
     * Filter the query on the inv_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByInvRef('fooValue');   // WHERE inv_ref = 'fooValue'
     * $query->filterByInvRef('%fooValue%', Criteria::LIKE); // WHERE inv_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_INV_REF, $invRef, $comparison);
    }

    /**
     * Filter the query on the inv_refn column
     *
     * Example usage:
     * <code>
     * $query->filterByInvRefn('fooValue');   // WHERE inv_refn = 'fooValue'
     * $query->filterByInvRefn('%fooValue%', Criteria::LIKE); // WHERE inv_refn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invRefn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByInvRefn($invRefn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRefn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_INV_REFN, $invRefn, $comparison);
    }

    /**
     * Filter the query on the rccode column
     *
     * Example usage:
     * <code>
     * $query->filterByRccode('fooValue');   // WHERE rccode = 'fooValue'
     * $query->filterByRccode('%fooValue%', Criteria::LIKE); // WHERE rccode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rccode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByRccode($rccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_RCCODE, $rccode, $comparison);
    }

    /**
     * Filter the query on the stockist column
     *
     * Example usage:
     * <code>
     * $query->filterByStockist('fooValue');   // WHERE stockist = 'fooValue'
     * $query->filterByStockist('%fooValue%', Criteria::LIKE); // WHERE stockist LIKE '%fooValue%'
     * </code>
     *
     * @param     string $stockist The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByStockist($stockist = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($stockist)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_STOCKIST, $stockist, $comparison);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_PCODE, $pcode, $comparison);
    }

    /**
     * Filter the query on the pdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByPdesc('fooValue');   // WHERE pdesc = 'fooValue'
     * $query->filterByPdesc('%fooValue%', Criteria::LIKE); // WHERE pdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_PDESC, $pdesc, $comparison);
    }

    /**
     * Filter the query on the unit column
     *
     * Example usage:
     * <code>
     * $query->filterByUnit('fooValue');   // WHERE unit = 'fooValue'
     * $query->filterByUnit('%fooValue%', Criteria::LIKE); // WHERE unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_UNIT, $unit, $comparison);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE cost > 12
     * </code>
     *
     * @param     mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_COST, $cost, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (is_array($amt)) {
            $useMinMax = false;
            if (isset($amt['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_AMT, $amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amt['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_AMT, $amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_AMT, $amt, $comparison);
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
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByCtax($ctax = null, $comparison = null)
    {
        if (is_array($ctax)) {
            $useMinMax = false;
            if (isset($ctax['min'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_CTAX, $ctax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ctax['max'])) {
                $this->addUsingAlias(AliIstockdTableMap::COL_CTAX, $ctax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_CTAX, $ctax, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId('fooValue');   // WHERE group_id = 'fooValue'
     * $query->filterByGroupId('%fooValue%', Criteria::LIKE); // WHERE group_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $groupId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($groupId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliIstockdTableMap::COL_GROUP_ID, $groupId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliIstockd $aliIstockd Object to remove from the list of results
     *
     * @return $this|ChildAliIstockdQuery The current query, for fluid interface
     */
    public function prune($aliIstockd = null)
    {
        if ($aliIstockd) {
            $this->addUsingAlias(AliIstockdTableMap::COL_ID, $aliIstockd->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_istockd table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliIstockdTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliIstockdTableMap::clearInstancePool();
            AliIstockdTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliIstockdTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliIstockdTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliIstockdTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliIstockdTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliIstockdQuery
