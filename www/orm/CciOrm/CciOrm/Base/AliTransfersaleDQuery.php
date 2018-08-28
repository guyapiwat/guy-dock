<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTransfersaleD as ChildAliTransfersaleD;
use CciOrm\CciOrm\AliTransfersaleDQuery as ChildAliTransfersaleDQuery;
use CciOrm\CciOrm\Map\AliTransfersaleDTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_transfersale_d' table.
 *
 *
 *
 * @method     ChildAliTransfersaleDQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliTransfersaleDQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliTransfersaleDQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliTransfersaleDQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliTransfersaleDQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliTransfersaleDQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliTransfersaleDQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildAliTransfersaleDQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTransfersaleDQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliTransfersaleDQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliTransfersaleDQuery orderByBv($order = Criteria::ASC) Order by the bv column
 * @method     ChildAliTransfersaleDQuery orderByFv($order = Criteria::ASC) Order by the fv column
 * @method     ChildAliTransfersaleDQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildAliTransfersaleDQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliTransfersaleDQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 * @method     ChildAliTransfersaleDQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliTransfersaleDQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 *
 * @method     ChildAliTransfersaleDQuery groupById() Group by the id column
 * @method     ChildAliTransfersaleDQuery groupBySano() Group by the sano column
 * @method     ChildAliTransfersaleDQuery groupBySadate() Group by the sadate column
 * @method     ChildAliTransfersaleDQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliTransfersaleDQuery groupByPcode() Group by the pcode column
 * @method     ChildAliTransfersaleDQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliTransfersaleDQuery groupByUnit() Group by the unit column
 * @method     ChildAliTransfersaleDQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTransfersaleDQuery groupByPrice() Group by the price column
 * @method     ChildAliTransfersaleDQuery groupByPv() Group by the pv column
 * @method     ChildAliTransfersaleDQuery groupByBv() Group by the bv column
 * @method     ChildAliTransfersaleDQuery groupByFv() Group by the fv column
 * @method     ChildAliTransfersaleDQuery groupByWeight() Group by the weight column
 * @method     ChildAliTransfersaleDQuery groupByQty() Group by the qty column
 * @method     ChildAliTransfersaleDQuery groupByAmt() Group by the amt column
 * @method     ChildAliTransfersaleDQuery groupByBprice() Group by the bprice column
 * @method     ChildAliTransfersaleDQuery groupByLocationbase() Group by the locationbase column
 *
 * @method     ChildAliTransfersaleDQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTransfersaleDQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTransfersaleDQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTransfersaleDQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTransfersaleDQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTransfersaleDQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTransfersaleD findOne(ConnectionInterface $con = null) Return the first ChildAliTransfersaleD matching the query
 * @method     ChildAliTransfersaleD findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTransfersaleD matching the query, or a new ChildAliTransfersaleD object populated from the query conditions when no match is found
 *
 * @method     ChildAliTransfersaleD findOneById(int $id) Return the first ChildAliTransfersaleD filtered by the id column
 * @method     ChildAliTransfersaleD findOneBySano(string $sano) Return the first ChildAliTransfersaleD filtered by the sano column
 * @method     ChildAliTransfersaleD findOneBySadate(string $sadate) Return the first ChildAliTransfersaleD filtered by the sadate column
 * @method     ChildAliTransfersaleD findOneByInvCode(string $inv_code) Return the first ChildAliTransfersaleD filtered by the inv_code column
 * @method     ChildAliTransfersaleD findOneByPcode(string $pcode) Return the first ChildAliTransfersaleD filtered by the pcode column
 * @method     ChildAliTransfersaleD findOneByPdesc(string $pdesc) Return the first ChildAliTransfersaleD filtered by the pdesc column
 * @method     ChildAliTransfersaleD findOneByUnit(string $unit) Return the first ChildAliTransfersaleD filtered by the unit column
 * @method     ChildAliTransfersaleD findOneByMcode(string $mcode) Return the first ChildAliTransfersaleD filtered by the mcode column
 * @method     ChildAliTransfersaleD findOneByPrice(string $price) Return the first ChildAliTransfersaleD filtered by the price column
 * @method     ChildAliTransfersaleD findOneByPv(string $pv) Return the first ChildAliTransfersaleD filtered by the pv column
 * @method     ChildAliTransfersaleD findOneByBv(string $bv) Return the first ChildAliTransfersaleD filtered by the bv column
 * @method     ChildAliTransfersaleD findOneByFv(string $fv) Return the first ChildAliTransfersaleD filtered by the fv column
 * @method     ChildAliTransfersaleD findOneByWeight(string $weight) Return the first ChildAliTransfersaleD filtered by the weight column
 * @method     ChildAliTransfersaleD findOneByQty(string $qty) Return the first ChildAliTransfersaleD filtered by the qty column
 * @method     ChildAliTransfersaleD findOneByAmt(string $amt) Return the first ChildAliTransfersaleD filtered by the amt column
 * @method     ChildAliTransfersaleD findOneByBprice(string $bprice) Return the first ChildAliTransfersaleD filtered by the bprice column
 * @method     ChildAliTransfersaleD findOneByLocationbase(int $locationbase) Return the first ChildAliTransfersaleD filtered by the locationbase column *

 * @method     ChildAliTransfersaleD requirePk($key, ConnectionInterface $con = null) Return the ChildAliTransfersaleD by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOne(ConnectionInterface $con = null) Return the first ChildAliTransfersaleD matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTransfersaleD requireOneById(int $id) Return the first ChildAliTransfersaleD filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneBySano(string $sano) Return the first ChildAliTransfersaleD filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneBySadate(string $sadate) Return the first ChildAliTransfersaleD filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByInvCode(string $inv_code) Return the first ChildAliTransfersaleD filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByPcode(string $pcode) Return the first ChildAliTransfersaleD filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByPdesc(string $pdesc) Return the first ChildAliTransfersaleD filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByUnit(string $unit) Return the first ChildAliTransfersaleD filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByMcode(string $mcode) Return the first ChildAliTransfersaleD filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByPrice(string $price) Return the first ChildAliTransfersaleD filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByPv(string $pv) Return the first ChildAliTransfersaleD filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByBv(string $bv) Return the first ChildAliTransfersaleD filtered by the bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByFv(string $fv) Return the first ChildAliTransfersaleD filtered by the fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByWeight(string $weight) Return the first ChildAliTransfersaleD filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByQty(string $qty) Return the first ChildAliTransfersaleD filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByAmt(string $amt) Return the first ChildAliTransfersaleD filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByBprice(string $bprice) Return the first ChildAliTransfersaleD filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransfersaleD requireOneByLocationbase(int $locationbase) Return the first ChildAliTransfersaleD filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTransfersaleD[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTransfersaleD objects based on current ModelCriteria
 * @method     ChildAliTransfersaleD[]|ObjectCollection findById(int $id) Return ChildAliTransfersaleD objects filtered by the id column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findBySano(string $sano) Return ChildAliTransfersaleD objects filtered by the sano column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findBySadate(string $sadate) Return ChildAliTransfersaleD objects filtered by the sadate column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliTransfersaleD objects filtered by the inv_code column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByPcode(string $pcode) Return ChildAliTransfersaleD objects filtered by the pcode column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliTransfersaleD objects filtered by the pdesc column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByUnit(string $unit) Return ChildAliTransfersaleD objects filtered by the unit column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTransfersaleD objects filtered by the mcode column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByPrice(string $price) Return ChildAliTransfersaleD objects filtered by the price column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByPv(string $pv) Return ChildAliTransfersaleD objects filtered by the pv column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByBv(string $bv) Return ChildAliTransfersaleD objects filtered by the bv column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByFv(string $fv) Return ChildAliTransfersaleD objects filtered by the fv column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByWeight(string $weight) Return ChildAliTransfersaleD objects filtered by the weight column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByQty(string $qty) Return ChildAliTransfersaleD objects filtered by the qty column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByAmt(string $amt) Return ChildAliTransfersaleD objects filtered by the amt column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByBprice(string $bprice) Return ChildAliTransfersaleD objects filtered by the bprice column
 * @method     ChildAliTransfersaleD[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliTransfersaleD objects filtered by the locationbase column
 * @method     ChildAliTransfersaleD[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTransfersaleDQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTransfersaleDQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTransfersaleD', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTransfersaleDQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTransfersaleDQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTransfersaleDQuery) {
            return $criteria;
        }
        $query = new ChildAliTransfersaleDQuery();
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
     * @return ChildAliTransfersaleD|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTransfersaleDTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTransfersaleDTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTransfersaleD A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sano, sadate, inv_code, pcode, pdesc, unit, mcode, price, pv, bv, fv, weight, qty, amt, bprice, locationbase FROM ali_transfersale_d WHERE id = :p0';
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
            /** @var ChildAliTransfersaleD $obj */
            $obj = new ChildAliTransfersaleD();
            $obj->hydrate($row);
            AliTransfersaleDTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTransfersaleD|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_PDESC, $pdesc, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_UNIT, $unit, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByBv($bv = null, $comparison = null)
    {
        if (is_array($bv)) {
            $useMinMax = false;
            if (isset($bv['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_BV, $bv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bv['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_BV, $bv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_BV, $bv, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByFv($fv = null, $comparison = null)
    {
        if (is_array($fv)) {
            $useMinMax = false;
            if (isset($fv['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_FV, $fv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fv['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_FV, $fv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_FV, $fv, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (is_array($weight)) {
            $useMinMax = false;
            if (isset($weight['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_WEIGHT, $weight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weight['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_WEIGHT, $weight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_WEIGHT, $weight, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (is_array($amt)) {
            $useMinMax = false;
            if (isset($amt['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_AMT, $amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amt['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_AMT, $amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_AMT, $amt, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliTransfersaleDTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransfersaleDTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTransfersaleD $aliTransfersaleD Object to remove from the list of results
     *
     * @return $this|ChildAliTransfersaleDQuery The current query, for fluid interface
     */
    public function prune($aliTransfersaleD = null)
    {
        if ($aliTransfersaleD) {
            $this->addUsingAlias(AliTransfersaleDTableMap::COL_ID, $aliTransfersaleD->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_transfersale_d table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleDTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTransfersaleDTableMap::clearInstancePool();
            AliTransfersaleDTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransfersaleDTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTransfersaleDTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTransfersaleDTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTransfersaleDTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTransfersaleDQuery
