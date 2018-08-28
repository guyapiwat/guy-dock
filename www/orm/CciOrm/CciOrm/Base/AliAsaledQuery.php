<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliAsaled as ChildAliAsaled;
use CciOrm\CciOrm\AliAsaledQuery as ChildAliAsaledQuery;
use CciOrm\CciOrm\Map\AliAsaledTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_asaled' table.
 *
 *
 *
 * @method     ChildAliAsaledQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliAsaledQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliAsaledQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliAsaledQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliAsaledQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliAsaledQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliAsaledQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildAliAsaledQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliAsaledQuery orderByCostPrice($order = Criteria::ASC) Order by the cost_price column
 * @method     ChildAliAsaledQuery orderByCustomerPrice($order = Criteria::ASC) Order by the customer_price column
 * @method     ChildAliAsaledQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliAsaledQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliAsaledQuery orderByBv($order = Criteria::ASC) Order by the bv column
 * @method     ChildAliAsaledQuery orderBySppv($order = Criteria::ASC) Order by the sppv column
 * @method     ChildAliAsaledQuery orderByFv($order = Criteria::ASC) Order by the fv column
 * @method     ChildAliAsaledQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildAliAsaledQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliAsaledQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 * @method     ChildAliAsaledQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliAsaledQuery orderByUidbase($order = Criteria::ASC) Order by the uidbase column
 * @method     ChildAliAsaledQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliAsaledQuery orderByOutstanding($order = Criteria::ASC) Order by the outstanding column
 * @method     ChildAliAsaledQuery orderByVat($order = Criteria::ASC) Order by the vat column
 *
 * @method     ChildAliAsaledQuery groupById() Group by the id column
 * @method     ChildAliAsaledQuery groupBySano() Group by the sano column
 * @method     ChildAliAsaledQuery groupBySadate() Group by the sadate column
 * @method     ChildAliAsaledQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliAsaledQuery groupByPcode() Group by the pcode column
 * @method     ChildAliAsaledQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliAsaledQuery groupByUnit() Group by the unit column
 * @method     ChildAliAsaledQuery groupByMcode() Group by the mcode column
 * @method     ChildAliAsaledQuery groupByCostPrice() Group by the cost_price column
 * @method     ChildAliAsaledQuery groupByCustomerPrice() Group by the customer_price column
 * @method     ChildAliAsaledQuery groupByPrice() Group by the price column
 * @method     ChildAliAsaledQuery groupByPv() Group by the pv column
 * @method     ChildAliAsaledQuery groupByBv() Group by the bv column
 * @method     ChildAliAsaledQuery groupBySppv() Group by the sppv column
 * @method     ChildAliAsaledQuery groupByFv() Group by the fv column
 * @method     ChildAliAsaledQuery groupByWeight() Group by the weight column
 * @method     ChildAliAsaledQuery groupByQty() Group by the qty column
 * @method     ChildAliAsaledQuery groupByAmt() Group by the amt column
 * @method     ChildAliAsaledQuery groupByBprice() Group by the bprice column
 * @method     ChildAliAsaledQuery groupByUidbase() Group by the uidbase column
 * @method     ChildAliAsaledQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliAsaledQuery groupByOutstanding() Group by the outstanding column
 * @method     ChildAliAsaledQuery groupByVat() Group by the vat column
 *
 * @method     ChildAliAsaledQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliAsaledQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliAsaledQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliAsaledQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliAsaledQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliAsaledQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliAsaled findOne(ConnectionInterface $con = null) Return the first ChildAliAsaled matching the query
 * @method     ChildAliAsaled findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliAsaled matching the query, or a new ChildAliAsaled object populated from the query conditions when no match is found
 *
 * @method     ChildAliAsaled findOneById(int $id) Return the first ChildAliAsaled filtered by the id column
 * @method     ChildAliAsaled findOneBySano(string $sano) Return the first ChildAliAsaled filtered by the sano column
 * @method     ChildAliAsaled findOneBySadate(string $sadate) Return the first ChildAliAsaled filtered by the sadate column
 * @method     ChildAliAsaled findOneByInvCode(string $inv_code) Return the first ChildAliAsaled filtered by the inv_code column
 * @method     ChildAliAsaled findOneByPcode(string $pcode) Return the first ChildAliAsaled filtered by the pcode column
 * @method     ChildAliAsaled findOneByPdesc(string $pdesc) Return the first ChildAliAsaled filtered by the pdesc column
 * @method     ChildAliAsaled findOneByUnit(string $unit) Return the first ChildAliAsaled filtered by the unit column
 * @method     ChildAliAsaled findOneByMcode(string $mcode) Return the first ChildAliAsaled filtered by the mcode column
 * @method     ChildAliAsaled findOneByCostPrice(string $cost_price) Return the first ChildAliAsaled filtered by the cost_price column
 * @method     ChildAliAsaled findOneByCustomerPrice(string $customer_price) Return the first ChildAliAsaled filtered by the customer_price column
 * @method     ChildAliAsaled findOneByPrice(string $price) Return the first ChildAliAsaled filtered by the price column
 * @method     ChildAliAsaled findOneByPv(string $pv) Return the first ChildAliAsaled filtered by the pv column
 * @method     ChildAliAsaled findOneByBv(string $bv) Return the first ChildAliAsaled filtered by the bv column
 * @method     ChildAliAsaled findOneBySppv(string $sppv) Return the first ChildAliAsaled filtered by the sppv column
 * @method     ChildAliAsaled findOneByFv(string $fv) Return the first ChildAliAsaled filtered by the fv column
 * @method     ChildAliAsaled findOneByWeight(string $weight) Return the first ChildAliAsaled filtered by the weight column
 * @method     ChildAliAsaled findOneByQty(string $qty) Return the first ChildAliAsaled filtered by the qty column
 * @method     ChildAliAsaled findOneByAmt(string $amt) Return the first ChildAliAsaled filtered by the amt column
 * @method     ChildAliAsaled findOneByBprice(string $bprice) Return the first ChildAliAsaled filtered by the bprice column
 * @method     ChildAliAsaled findOneByUidbase(string $uidbase) Return the first ChildAliAsaled filtered by the uidbase column
 * @method     ChildAliAsaled findOneByLocationbase(int $locationbase) Return the first ChildAliAsaled filtered by the locationbase column
 * @method     ChildAliAsaled findOneByOutstanding(string $outstanding) Return the first ChildAliAsaled filtered by the outstanding column
 * @method     ChildAliAsaled findOneByVat(int $vat) Return the first ChildAliAsaled filtered by the vat column *

 * @method     ChildAliAsaled requirePk($key, ConnectionInterface $con = null) Return the ChildAliAsaled by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOne(ConnectionInterface $con = null) Return the first ChildAliAsaled matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAsaled requireOneById(int $id) Return the first ChildAliAsaled filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneBySano(string $sano) Return the first ChildAliAsaled filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneBySadate(string $sadate) Return the first ChildAliAsaled filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByInvCode(string $inv_code) Return the first ChildAliAsaled filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByPcode(string $pcode) Return the first ChildAliAsaled filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByPdesc(string $pdesc) Return the first ChildAliAsaled filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByUnit(string $unit) Return the first ChildAliAsaled filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByMcode(string $mcode) Return the first ChildAliAsaled filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByCostPrice(string $cost_price) Return the first ChildAliAsaled filtered by the cost_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByCustomerPrice(string $customer_price) Return the first ChildAliAsaled filtered by the customer_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByPrice(string $price) Return the first ChildAliAsaled filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByPv(string $pv) Return the first ChildAliAsaled filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByBv(string $bv) Return the first ChildAliAsaled filtered by the bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneBySppv(string $sppv) Return the first ChildAliAsaled filtered by the sppv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByFv(string $fv) Return the first ChildAliAsaled filtered by the fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByWeight(string $weight) Return the first ChildAliAsaled filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByQty(string $qty) Return the first ChildAliAsaled filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByAmt(string $amt) Return the first ChildAliAsaled filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByBprice(string $bprice) Return the first ChildAliAsaled filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByUidbase(string $uidbase) Return the first ChildAliAsaled filtered by the uidbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByLocationbase(int $locationbase) Return the first ChildAliAsaled filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByOutstanding(string $outstanding) Return the first ChildAliAsaled filtered by the outstanding column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAsaled requireOneByVat(int $vat) Return the first ChildAliAsaled filtered by the vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAsaled[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliAsaled objects based on current ModelCriteria
 * @method     ChildAliAsaled[]|ObjectCollection findById(int $id) Return ChildAliAsaled objects filtered by the id column
 * @method     ChildAliAsaled[]|ObjectCollection findBySano(string $sano) Return ChildAliAsaled objects filtered by the sano column
 * @method     ChildAliAsaled[]|ObjectCollection findBySadate(string $sadate) Return ChildAliAsaled objects filtered by the sadate column
 * @method     ChildAliAsaled[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliAsaled objects filtered by the inv_code column
 * @method     ChildAliAsaled[]|ObjectCollection findByPcode(string $pcode) Return ChildAliAsaled objects filtered by the pcode column
 * @method     ChildAliAsaled[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliAsaled objects filtered by the pdesc column
 * @method     ChildAliAsaled[]|ObjectCollection findByUnit(string $unit) Return ChildAliAsaled objects filtered by the unit column
 * @method     ChildAliAsaled[]|ObjectCollection findByMcode(string $mcode) Return ChildAliAsaled objects filtered by the mcode column
 * @method     ChildAliAsaled[]|ObjectCollection findByCostPrice(string $cost_price) Return ChildAliAsaled objects filtered by the cost_price column
 * @method     ChildAliAsaled[]|ObjectCollection findByCustomerPrice(string $customer_price) Return ChildAliAsaled objects filtered by the customer_price column
 * @method     ChildAliAsaled[]|ObjectCollection findByPrice(string $price) Return ChildAliAsaled objects filtered by the price column
 * @method     ChildAliAsaled[]|ObjectCollection findByPv(string $pv) Return ChildAliAsaled objects filtered by the pv column
 * @method     ChildAliAsaled[]|ObjectCollection findByBv(string $bv) Return ChildAliAsaled objects filtered by the bv column
 * @method     ChildAliAsaled[]|ObjectCollection findBySppv(string $sppv) Return ChildAliAsaled objects filtered by the sppv column
 * @method     ChildAliAsaled[]|ObjectCollection findByFv(string $fv) Return ChildAliAsaled objects filtered by the fv column
 * @method     ChildAliAsaled[]|ObjectCollection findByWeight(string $weight) Return ChildAliAsaled objects filtered by the weight column
 * @method     ChildAliAsaled[]|ObjectCollection findByQty(string $qty) Return ChildAliAsaled objects filtered by the qty column
 * @method     ChildAliAsaled[]|ObjectCollection findByAmt(string $amt) Return ChildAliAsaled objects filtered by the amt column
 * @method     ChildAliAsaled[]|ObjectCollection findByBprice(string $bprice) Return ChildAliAsaled objects filtered by the bprice column
 * @method     ChildAliAsaled[]|ObjectCollection findByUidbase(string $uidbase) Return ChildAliAsaled objects filtered by the uidbase column
 * @method     ChildAliAsaled[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliAsaled objects filtered by the locationbase column
 * @method     ChildAliAsaled[]|ObjectCollection findByOutstanding(string $outstanding) Return ChildAliAsaled objects filtered by the outstanding column
 * @method     ChildAliAsaled[]|ObjectCollection findByVat(int $vat) Return ChildAliAsaled objects filtered by the vat column
 * @method     ChildAliAsaled[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliAsaledQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliAsaledQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliAsaled', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliAsaledQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliAsaledQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliAsaledQuery) {
            return $criteria;
        }
        $query = new ChildAliAsaledQuery();
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
     * @return ChildAliAsaled|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliAsaledTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliAsaledTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliAsaled A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sano, sadate, inv_code, pcode, pdesc, unit, mcode, cost_price, customer_price, price, pv, bv, sppv, fv, weight, qty, amt, bprice, uidbase, locationbase, outstanding, vat FROM ali_asaled WHERE id = :p0';
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
            /** @var ChildAliAsaled $obj */
            $obj = new ChildAliAsaled();
            $obj->hydrate($row);
            AliAsaledTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliAsaled|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliAsaledTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliAsaledTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_PDESC, $pdesc, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_UNIT, $unit, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the cost_price column
     *
     * Example usage:
     * <code>
     * $query->filterByCostPrice(1234); // WHERE cost_price = 1234
     * $query->filterByCostPrice(array(12, 34)); // WHERE cost_price IN (12, 34)
     * $query->filterByCostPrice(array('min' => 12)); // WHERE cost_price > 12
     * </code>
     *
     * @param     mixed $costPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByCostPrice($costPrice = null, $comparison = null)
    {
        if (is_array($costPrice)) {
            $useMinMax = false;
            if (isset($costPrice['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_COST_PRICE, $costPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costPrice['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_COST_PRICE, $costPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_COST_PRICE, $costPrice, $comparison);
    }

    /**
     * Filter the query on the customer_price column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerPrice(1234); // WHERE customer_price = 1234
     * $query->filterByCustomerPrice(array(12, 34)); // WHERE customer_price IN (12, 34)
     * $query->filterByCustomerPrice(array('min' => 12)); // WHERE customer_price > 12
     * </code>
     *
     * @param     mixed $customerPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByCustomerPrice($customerPrice = null, $comparison = null)
    {
        if (is_array($customerPrice)) {
            $useMinMax = false;
            if (isset($customerPrice['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_CUSTOMER_PRICE, $customerPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerPrice['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_CUSTOMER_PRICE, $customerPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_CUSTOMER_PRICE, $customerPrice, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_PV, $pv, $comparison);
    }

    /**
     * Filter the query on the bv column
     *
     * Example usage:
     * <code>
     * $query->filterByBv(1234); // WHERE bv = 1234
     * $query->filterByBv(array(12, 34)); // WHERE bv IN (12, 34)
     * $query->filterByBv(array('min' => 12)); // WHERE bv > 12
     * </code>
     *
     * @param     mixed $bv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByBv($bv = null, $comparison = null)
    {
        if (is_array($bv)) {
            $useMinMax = false;
            if (isset($bv['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_BV, $bv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bv['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_BV, $bv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_BV, $bv, $comparison);
    }

    /**
     * Filter the query on the sppv column
     *
     * Example usage:
     * <code>
     * $query->filterBySppv(1234); // WHERE sppv = 1234
     * $query->filterBySppv(array(12, 34)); // WHERE sppv IN (12, 34)
     * $query->filterBySppv(array('min' => 12)); // WHERE sppv > 12
     * </code>
     *
     * @param     mixed $sppv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterBySppv($sppv = null, $comparison = null)
    {
        if (is_array($sppv)) {
            $useMinMax = false;
            if (isset($sppv['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_SPPV, $sppv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sppv['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_SPPV, $sppv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_SPPV, $sppv, $comparison);
    }

    /**
     * Filter the query on the fv column
     *
     * Example usage:
     * <code>
     * $query->filterByFv(1234); // WHERE fv = 1234
     * $query->filterByFv(array(12, 34)); // WHERE fv IN (12, 34)
     * $query->filterByFv(array('min' => 12)); // WHERE fv > 12
     * </code>
     *
     * @param     mixed $fv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByFv($fv = null, $comparison = null)
    {
        if (is_array($fv)) {
            $useMinMax = false;
            if (isset($fv['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_FV, $fv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fv['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_FV, $fv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_FV, $fv, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight(1234); // WHERE weight = 1234
     * $query->filterByWeight(array(12, 34)); // WHERE weight IN (12, 34)
     * $query->filterByWeight(array('min' => 12)); // WHERE weight > 12
     * </code>
     *
     * @param     mixed $weight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (is_array($weight)) {
            $useMinMax = false;
            if (isset($weight['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_WEIGHT, $weight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weight['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_WEIGHT, $weight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_WEIGHT, $weight, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (is_array($amt)) {
            $useMinMax = false;
            if (isset($amt['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_AMT, $amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amt['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_AMT, $amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_AMT, $amt, $comparison);
    }

    /**
     * Filter the query on the bprice column
     *
     * Example usage:
     * <code>
     * $query->filterByBprice(1234); // WHERE bprice = 1234
     * $query->filterByBprice(array(12, 34)); // WHERE bprice IN (12, 34)
     * $query->filterByBprice(array('min' => 12)); // WHERE bprice > 12
     * </code>
     *
     * @param     mixed $bprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_BPRICE, $bprice, $comparison);
    }

    /**
     * Filter the query on the uidbase column
     *
     * Example usage:
     * <code>
     * $query->filterByUidbase('fooValue');   // WHERE uidbase = 'fooValue'
     * $query->filterByUidbase('%fooValue%', Criteria::LIKE); // WHERE uidbase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidbase The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByUidbase($uidbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_UIDBASE, $uidbase, $comparison);
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
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the outstanding column
     *
     * Example usage:
     * <code>
     * $query->filterByOutstanding('fooValue');   // WHERE outstanding = 'fooValue'
     * $query->filterByOutstanding('%fooValue%', Criteria::LIKE); // WHERE outstanding LIKE '%fooValue%'
     * </code>
     *
     * @param     string $outstanding The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByOutstanding($outstanding = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($outstanding)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_OUTSTANDING, $outstanding, $comparison);
    }

    /**
     * Filter the query on the vat column
     *
     * Example usage:
     * <code>
     * $query->filterByVat(1234); // WHERE vat = 1234
     * $query->filterByVat(array(12, 34)); // WHERE vat IN (12, 34)
     * $query->filterByVat(array('min' => 12)); // WHERE vat > 12
     * </code>
     *
     * @param     mixed $vat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function filterByVat($vat = null, $comparison = null)
    {
        if (is_array($vat)) {
            $useMinMax = false;
            if (isset($vat['min'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_VAT, $vat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vat['max'])) {
                $this->addUsingAlias(AliAsaledTableMap::COL_VAT, $vat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAsaledTableMap::COL_VAT, $vat, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliAsaled $aliAsaled Object to remove from the list of results
     *
     * @return $this|ChildAliAsaledQuery The current query, for fluid interface
     */
    public function prune($aliAsaled = null)
    {
        if ($aliAsaled) {
            $this->addUsingAlias(AliAsaledTableMap::COL_ID, $aliAsaled->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_asaled table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAsaledTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliAsaledTableMap::clearInstancePool();
            AliAsaledTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAsaledTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliAsaledTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliAsaledTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliAsaledTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliAsaledQuery
