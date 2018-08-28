<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliAtoasaled as ChildAliAtoasaled;
use CciOrm\CciOrm\AliAtoasaledQuery as ChildAliAtoasaledQuery;
use CciOrm\CciOrm\Map\AliAtoasaledTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_atoasaled' table.
 *
 *
 *
 * @method     ChildAliAtoasaledQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliAtoasaledQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliAtoasaledQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliAtoasaledQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliAtoasaledQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliAtoasaledQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliAtoasaledQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildAliAtoasaledQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliAtoasaledQuery orderByCostPrice($order = Criteria::ASC) Order by the cost_price column
 * @method     ChildAliAtoasaledQuery orderByCustomerPrice($order = Criteria::ASC) Order by the customer_price column
 * @method     ChildAliAtoasaledQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliAtoasaledQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliAtoasaledQuery orderByBv($order = Criteria::ASC) Order by the bv column
 * @method     ChildAliAtoasaledQuery orderBySppv($order = Criteria::ASC) Order by the sppv column
 * @method     ChildAliAtoasaledQuery orderByFv($order = Criteria::ASC) Order by the fv column
 * @method     ChildAliAtoasaledQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildAliAtoasaledQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliAtoasaledQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 * @method     ChildAliAtoasaledQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliAtoasaledQuery orderByUidbase($order = Criteria::ASC) Order by the uidbase column
 * @method     ChildAliAtoasaledQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliAtoasaledQuery orderByOutstanding($order = Criteria::ASC) Order by the outstanding column
 * @method     ChildAliAtoasaledQuery orderByVat($order = Criteria::ASC) Order by the vat column
 *
 * @method     ChildAliAtoasaledQuery groupById() Group by the id column
 * @method     ChildAliAtoasaledQuery groupBySano() Group by the sano column
 * @method     ChildAliAtoasaledQuery groupBySadate() Group by the sadate column
 * @method     ChildAliAtoasaledQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliAtoasaledQuery groupByPcode() Group by the pcode column
 * @method     ChildAliAtoasaledQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliAtoasaledQuery groupByUnit() Group by the unit column
 * @method     ChildAliAtoasaledQuery groupByMcode() Group by the mcode column
 * @method     ChildAliAtoasaledQuery groupByCostPrice() Group by the cost_price column
 * @method     ChildAliAtoasaledQuery groupByCustomerPrice() Group by the customer_price column
 * @method     ChildAliAtoasaledQuery groupByPrice() Group by the price column
 * @method     ChildAliAtoasaledQuery groupByPv() Group by the pv column
 * @method     ChildAliAtoasaledQuery groupByBv() Group by the bv column
 * @method     ChildAliAtoasaledQuery groupBySppv() Group by the sppv column
 * @method     ChildAliAtoasaledQuery groupByFv() Group by the fv column
 * @method     ChildAliAtoasaledQuery groupByWeight() Group by the weight column
 * @method     ChildAliAtoasaledQuery groupByQty() Group by the qty column
 * @method     ChildAliAtoasaledQuery groupByAmt() Group by the amt column
 * @method     ChildAliAtoasaledQuery groupByBprice() Group by the bprice column
 * @method     ChildAliAtoasaledQuery groupByUidbase() Group by the uidbase column
 * @method     ChildAliAtoasaledQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliAtoasaledQuery groupByOutstanding() Group by the outstanding column
 * @method     ChildAliAtoasaledQuery groupByVat() Group by the vat column
 *
 * @method     ChildAliAtoasaledQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliAtoasaledQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliAtoasaledQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliAtoasaledQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliAtoasaledQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliAtoasaledQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliAtoasaled findOne(ConnectionInterface $con = null) Return the first ChildAliAtoasaled matching the query
 * @method     ChildAliAtoasaled findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliAtoasaled matching the query, or a new ChildAliAtoasaled object populated from the query conditions when no match is found
 *
 * @method     ChildAliAtoasaled findOneById(int $id) Return the first ChildAliAtoasaled filtered by the id column
 * @method     ChildAliAtoasaled findOneBySano(string $sano) Return the first ChildAliAtoasaled filtered by the sano column
 * @method     ChildAliAtoasaled findOneBySadate(string $sadate) Return the first ChildAliAtoasaled filtered by the sadate column
 * @method     ChildAliAtoasaled findOneByInvCode(string $inv_code) Return the first ChildAliAtoasaled filtered by the inv_code column
 * @method     ChildAliAtoasaled findOneByPcode(string $pcode) Return the first ChildAliAtoasaled filtered by the pcode column
 * @method     ChildAliAtoasaled findOneByPdesc(string $pdesc) Return the first ChildAliAtoasaled filtered by the pdesc column
 * @method     ChildAliAtoasaled findOneByUnit(string $unit) Return the first ChildAliAtoasaled filtered by the unit column
 * @method     ChildAliAtoasaled findOneByMcode(string $mcode) Return the first ChildAliAtoasaled filtered by the mcode column
 * @method     ChildAliAtoasaled findOneByCostPrice(string $cost_price) Return the first ChildAliAtoasaled filtered by the cost_price column
 * @method     ChildAliAtoasaled findOneByCustomerPrice(string $customer_price) Return the first ChildAliAtoasaled filtered by the customer_price column
 * @method     ChildAliAtoasaled findOneByPrice(string $price) Return the first ChildAliAtoasaled filtered by the price column
 * @method     ChildAliAtoasaled findOneByPv(string $pv) Return the first ChildAliAtoasaled filtered by the pv column
 * @method     ChildAliAtoasaled findOneByBv(string $bv) Return the first ChildAliAtoasaled filtered by the bv column
 * @method     ChildAliAtoasaled findOneBySppv(string $sppv) Return the first ChildAliAtoasaled filtered by the sppv column
 * @method     ChildAliAtoasaled findOneByFv(string $fv) Return the first ChildAliAtoasaled filtered by the fv column
 * @method     ChildAliAtoasaled findOneByWeight(string $weight) Return the first ChildAliAtoasaled filtered by the weight column
 * @method     ChildAliAtoasaled findOneByQty(string $qty) Return the first ChildAliAtoasaled filtered by the qty column
 * @method     ChildAliAtoasaled findOneByAmt(string $amt) Return the first ChildAliAtoasaled filtered by the amt column
 * @method     ChildAliAtoasaled findOneByBprice(string $bprice) Return the first ChildAliAtoasaled filtered by the bprice column
 * @method     ChildAliAtoasaled findOneByUidbase(string $uidbase) Return the first ChildAliAtoasaled filtered by the uidbase column
 * @method     ChildAliAtoasaled findOneByLocationbase(int $locationbase) Return the first ChildAliAtoasaled filtered by the locationbase column
 * @method     ChildAliAtoasaled findOneByOutstanding(string $outstanding) Return the first ChildAliAtoasaled filtered by the outstanding column
 * @method     ChildAliAtoasaled findOneByVat(int $vat) Return the first ChildAliAtoasaled filtered by the vat column *

 * @method     ChildAliAtoasaled requirePk($key, ConnectionInterface $con = null) Return the ChildAliAtoasaled by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOne(ConnectionInterface $con = null) Return the first ChildAliAtoasaled matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAtoasaled requireOneById(int $id) Return the first ChildAliAtoasaled filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneBySano(string $sano) Return the first ChildAliAtoasaled filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneBySadate(string $sadate) Return the first ChildAliAtoasaled filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByInvCode(string $inv_code) Return the first ChildAliAtoasaled filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByPcode(string $pcode) Return the first ChildAliAtoasaled filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByPdesc(string $pdesc) Return the first ChildAliAtoasaled filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByUnit(string $unit) Return the first ChildAliAtoasaled filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByMcode(string $mcode) Return the first ChildAliAtoasaled filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByCostPrice(string $cost_price) Return the first ChildAliAtoasaled filtered by the cost_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByCustomerPrice(string $customer_price) Return the first ChildAliAtoasaled filtered by the customer_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByPrice(string $price) Return the first ChildAliAtoasaled filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByPv(string $pv) Return the first ChildAliAtoasaled filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByBv(string $bv) Return the first ChildAliAtoasaled filtered by the bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneBySppv(string $sppv) Return the first ChildAliAtoasaled filtered by the sppv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByFv(string $fv) Return the first ChildAliAtoasaled filtered by the fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByWeight(string $weight) Return the first ChildAliAtoasaled filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByQty(string $qty) Return the first ChildAliAtoasaled filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByAmt(string $amt) Return the first ChildAliAtoasaled filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByBprice(string $bprice) Return the first ChildAliAtoasaled filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByUidbase(string $uidbase) Return the first ChildAliAtoasaled filtered by the uidbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByLocationbase(int $locationbase) Return the first ChildAliAtoasaled filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByOutstanding(string $outstanding) Return the first ChildAliAtoasaled filtered by the outstanding column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAtoasaled requireOneByVat(int $vat) Return the first ChildAliAtoasaled filtered by the vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAtoasaled[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliAtoasaled objects based on current ModelCriteria
 * @method     ChildAliAtoasaled[]|ObjectCollection findById(int $id) Return ChildAliAtoasaled objects filtered by the id column
 * @method     ChildAliAtoasaled[]|ObjectCollection findBySano(string $sano) Return ChildAliAtoasaled objects filtered by the sano column
 * @method     ChildAliAtoasaled[]|ObjectCollection findBySadate(string $sadate) Return ChildAliAtoasaled objects filtered by the sadate column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliAtoasaled objects filtered by the inv_code column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByPcode(string $pcode) Return ChildAliAtoasaled objects filtered by the pcode column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliAtoasaled objects filtered by the pdesc column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByUnit(string $unit) Return ChildAliAtoasaled objects filtered by the unit column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByMcode(string $mcode) Return ChildAliAtoasaled objects filtered by the mcode column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByCostPrice(string $cost_price) Return ChildAliAtoasaled objects filtered by the cost_price column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByCustomerPrice(string $customer_price) Return ChildAliAtoasaled objects filtered by the customer_price column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByPrice(string $price) Return ChildAliAtoasaled objects filtered by the price column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByPv(string $pv) Return ChildAliAtoasaled objects filtered by the pv column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByBv(string $bv) Return ChildAliAtoasaled objects filtered by the bv column
 * @method     ChildAliAtoasaled[]|ObjectCollection findBySppv(string $sppv) Return ChildAliAtoasaled objects filtered by the sppv column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByFv(string $fv) Return ChildAliAtoasaled objects filtered by the fv column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByWeight(string $weight) Return ChildAliAtoasaled objects filtered by the weight column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByQty(string $qty) Return ChildAliAtoasaled objects filtered by the qty column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByAmt(string $amt) Return ChildAliAtoasaled objects filtered by the amt column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByBprice(string $bprice) Return ChildAliAtoasaled objects filtered by the bprice column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByUidbase(string $uidbase) Return ChildAliAtoasaled objects filtered by the uidbase column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliAtoasaled objects filtered by the locationbase column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByOutstanding(string $outstanding) Return ChildAliAtoasaled objects filtered by the outstanding column
 * @method     ChildAliAtoasaled[]|ObjectCollection findByVat(int $vat) Return ChildAliAtoasaled objects filtered by the vat column
 * @method     ChildAliAtoasaled[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliAtoasaledQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliAtoasaledQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliAtoasaled', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliAtoasaledQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliAtoasaledQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliAtoasaledQuery) {
            return $criteria;
        }
        $query = new ChildAliAtoasaledQuery();
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
     * @return ChildAliAtoasaled|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliAtoasaledTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliAtoasaledTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliAtoasaled A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sano, sadate, inv_code, pcode, pdesc, unit, mcode, cost_price, customer_price, price, pv, bv, sppv, fv, weight, qty, amt, bprice, uidbase, locationbase, outstanding, vat FROM ali_atoasaled WHERE id = :p0';
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
            /** @var ChildAliAtoasaled $obj */
            $obj = new ChildAliAtoasaled();
            $obj->hydrate($row);
            AliAtoasaledTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliAtoasaled|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_PDESC, $pdesc, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_UNIT, $unit, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByCostPrice($costPrice = null, $comparison = null)
    {
        if (is_array($costPrice)) {
            $useMinMax = false;
            if (isset($costPrice['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_COST_PRICE, $costPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costPrice['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_COST_PRICE, $costPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_COST_PRICE, $costPrice, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByCustomerPrice($customerPrice = null, $comparison = null)
    {
        if (is_array($customerPrice)) {
            $useMinMax = false;
            if (isset($customerPrice['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_CUSTOMER_PRICE, $customerPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerPrice['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_CUSTOMER_PRICE, $customerPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_CUSTOMER_PRICE, $customerPrice, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByBv($bv = null, $comparison = null)
    {
        if (is_array($bv)) {
            $useMinMax = false;
            if (isset($bv['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_BV, $bv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bv['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_BV, $bv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_BV, $bv, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterBySppv($sppv = null, $comparison = null)
    {
        if (is_array($sppv)) {
            $useMinMax = false;
            if (isset($sppv['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_SPPV, $sppv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sppv['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_SPPV, $sppv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_SPPV, $sppv, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByFv($fv = null, $comparison = null)
    {
        if (is_array($fv)) {
            $useMinMax = false;
            if (isset($fv['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_FV, $fv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fv['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_FV, $fv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_FV, $fv, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (is_array($weight)) {
            $useMinMax = false;
            if (isset($weight['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_WEIGHT, $weight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weight['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_WEIGHT, $weight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_WEIGHT, $weight, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (is_array($amt)) {
            $useMinMax = false;
            if (isset($amt['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_AMT, $amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amt['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_AMT, $amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_AMT, $amt, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByUidbase($uidbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_UIDBASE, $uidbase, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByOutstanding($outstanding = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($outstanding)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_OUTSTANDING, $outstanding, $comparison);
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
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function filterByVat($vat = null, $comparison = null)
    {
        if (is_array($vat)) {
            $useMinMax = false;
            if (isset($vat['min'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_VAT, $vat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vat['max'])) {
                $this->addUsingAlias(AliAtoasaledTableMap::COL_VAT, $vat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAtoasaledTableMap::COL_VAT, $vat, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliAtoasaled $aliAtoasaled Object to remove from the list of results
     *
     * @return $this|ChildAliAtoasaledQuery The current query, for fluid interface
     */
    public function prune($aliAtoasaled = null)
    {
        if ($aliAtoasaled) {
            $this->addUsingAlias(AliAtoasaledTableMap::COL_ID, $aliAtoasaled->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_atoasaled table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAtoasaledTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliAtoasaledTableMap::clearInstancePool();
            AliAtoasaledTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAtoasaledTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliAtoasaledTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliAtoasaledTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliAtoasaledTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliAtoasaledQuery
