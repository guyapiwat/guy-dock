<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStocks as ChildAliStocks;
use CciOrm\CciOrm\AliStocksQuery as ChildAliStocksQuery;
use CciOrm\CciOrm\Map\AliStocksTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_stocks' table.
 *
 *
 *
 * @method     ChildAliStocksQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliStocksQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliStocksQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliStocksQuery orderByInvCode1($order = Criteria::ASC) Order by the inv_code1 column
 * @method     ChildAliStocksQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliStocksQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliStocksQuery orderByYokma($order = Criteria::ASC) Order by the yokma column
 * @method     ChildAliStocksQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliStocksQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 * @method     ChildAliStocksQuery orderBySdate($order = Criteria::ASC) Order by the sdate column
 * @method     ChildAliStocksQuery orderByStime($order = Criteria::ASC) Order by the stime column
 * @method     ChildAliStocksQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliStocksQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliStocksQuery orderByUid($order = Criteria::ASC) Order by the uid column
 *
 * @method     ChildAliStocksQuery groupById() Group by the id column
 * @method     ChildAliStocksQuery groupBySano() Group by the sano column
 * @method     ChildAliStocksQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliStocksQuery groupByInvCode1() Group by the inv_code1 column
 * @method     ChildAliStocksQuery groupByMcode() Group by the mcode column
 * @method     ChildAliStocksQuery groupByPcode() Group by the pcode column
 * @method     ChildAliStocksQuery groupByYokma() Group by the yokma column
 * @method     ChildAliStocksQuery groupByQty() Group by the qty column
 * @method     ChildAliStocksQuery groupByAmt() Group by the amt column
 * @method     ChildAliStocksQuery groupBySdate() Group by the sdate column
 * @method     ChildAliStocksQuery groupByStime() Group by the stime column
 * @method     ChildAliStocksQuery groupByStatus() Group by the status column
 * @method     ChildAliStocksQuery groupByRemark() Group by the remark column
 * @method     ChildAliStocksQuery groupByUid() Group by the uid column
 *
 * @method     ChildAliStocksQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliStocksQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliStocksQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliStocksQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliStocksQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliStocksQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliStocks findOne(ConnectionInterface $con = null) Return the first ChildAliStocks matching the query
 * @method     ChildAliStocks findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliStocks matching the query, or a new ChildAliStocks object populated from the query conditions when no match is found
 *
 * @method     ChildAliStocks findOneById(int $id) Return the first ChildAliStocks filtered by the id column
 * @method     ChildAliStocks findOneBySano(string $sano) Return the first ChildAliStocks filtered by the sano column
 * @method     ChildAliStocks findOneByInvCode(string $inv_code) Return the first ChildAliStocks filtered by the inv_code column
 * @method     ChildAliStocks findOneByInvCode1(string $inv_code1) Return the first ChildAliStocks filtered by the inv_code1 column
 * @method     ChildAliStocks findOneByMcode(string $mcode) Return the first ChildAliStocks filtered by the mcode column
 * @method     ChildAliStocks findOneByPcode(string $pcode) Return the first ChildAliStocks filtered by the pcode column
 * @method     ChildAliStocks findOneByYokma(int $yokma) Return the first ChildAliStocks filtered by the yokma column
 * @method     ChildAliStocks findOneByQty(int $qty) Return the first ChildAliStocks filtered by the qty column
 * @method     ChildAliStocks findOneByAmt(int $amt) Return the first ChildAliStocks filtered by the amt column
 * @method     ChildAliStocks findOneBySdate(string $sdate) Return the first ChildAliStocks filtered by the sdate column
 * @method     ChildAliStocks findOneByStime(string $stime) Return the first ChildAliStocks filtered by the stime column
 * @method     ChildAliStocks findOneByStatus(string $status) Return the first ChildAliStocks filtered by the status column
 * @method     ChildAliStocks findOneByRemark(string $remark) Return the first ChildAliStocks filtered by the remark column
 * @method     ChildAliStocks findOneByUid(string $uid) Return the first ChildAliStocks filtered by the uid column *

 * @method     ChildAliStocks requirePk($key, ConnectionInterface $con = null) Return the ChildAliStocks by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOne(ConnectionInterface $con = null) Return the first ChildAliStocks matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStocks requireOneById(int $id) Return the first ChildAliStocks filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneBySano(string $sano) Return the first ChildAliStocks filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByInvCode(string $inv_code) Return the first ChildAliStocks filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByInvCode1(string $inv_code1) Return the first ChildAliStocks filtered by the inv_code1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByMcode(string $mcode) Return the first ChildAliStocks filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByPcode(string $pcode) Return the first ChildAliStocks filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByYokma(int $yokma) Return the first ChildAliStocks filtered by the yokma column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByQty(int $qty) Return the first ChildAliStocks filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByAmt(int $amt) Return the first ChildAliStocks filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneBySdate(string $sdate) Return the first ChildAliStocks filtered by the sdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByStime(string $stime) Return the first ChildAliStocks filtered by the stime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByStatus(string $status) Return the first ChildAliStocks filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByRemark(string $remark) Return the first ChildAliStocks filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStocks requireOneByUid(string $uid) Return the first ChildAliStocks filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStocks[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliStocks objects based on current ModelCriteria
 * @method     ChildAliStocks[]|ObjectCollection findById(int $id) Return ChildAliStocks objects filtered by the id column
 * @method     ChildAliStocks[]|ObjectCollection findBySano(string $sano) Return ChildAliStocks objects filtered by the sano column
 * @method     ChildAliStocks[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliStocks objects filtered by the inv_code column
 * @method     ChildAliStocks[]|ObjectCollection findByInvCode1(string $inv_code1) Return ChildAliStocks objects filtered by the inv_code1 column
 * @method     ChildAliStocks[]|ObjectCollection findByMcode(string $mcode) Return ChildAliStocks objects filtered by the mcode column
 * @method     ChildAliStocks[]|ObjectCollection findByPcode(string $pcode) Return ChildAliStocks objects filtered by the pcode column
 * @method     ChildAliStocks[]|ObjectCollection findByYokma(int $yokma) Return ChildAliStocks objects filtered by the yokma column
 * @method     ChildAliStocks[]|ObjectCollection findByQty(int $qty) Return ChildAliStocks objects filtered by the qty column
 * @method     ChildAliStocks[]|ObjectCollection findByAmt(int $amt) Return ChildAliStocks objects filtered by the amt column
 * @method     ChildAliStocks[]|ObjectCollection findBySdate(string $sdate) Return ChildAliStocks objects filtered by the sdate column
 * @method     ChildAliStocks[]|ObjectCollection findByStime(string $stime) Return ChildAliStocks objects filtered by the stime column
 * @method     ChildAliStocks[]|ObjectCollection findByStatus(string $status) Return ChildAliStocks objects filtered by the status column
 * @method     ChildAliStocks[]|ObjectCollection findByRemark(string $remark) Return ChildAliStocks objects filtered by the remark column
 * @method     ChildAliStocks[]|ObjectCollection findByUid(string $uid) Return ChildAliStocks objects filtered by the uid column
 * @method     ChildAliStocks[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliStocksQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliStocksQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliStocks', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliStocksQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliStocksQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliStocksQuery) {
            return $criteria;
        }
        $query = new ChildAliStocksQuery();
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
     * @return ChildAliStocks|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliStocksTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliStocksTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliStocks A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sano, inv_code, inv_code1, mcode, pcode, yokma, qty, amt, sdate, stime, status, remark, uid FROM ali_stocks WHERE id = :p0';
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
            /** @var ChildAliStocks $obj */
            $obj = new ChildAliStocks();
            $obj->hydrate($row);
            AliStocksTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliStocks|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliStocksTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliStocksTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the inv_code1 column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCode1('fooValue');   // WHERE inv_code1 = 'fooValue'
     * $query->filterByInvCode1('%fooValue%', Criteria::LIKE); // WHERE inv_code1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCode1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByInvCode1($invCode1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_INV_CODE1, $invCode1, $comparison);
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
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_PCODE, $pcode, $comparison);
    }

    /**
     * Filter the query on the yokma column
     *
     * Example usage:
     * <code>
     * $query->filterByYokma(1234); // WHERE yokma = 1234
     * $query->filterByYokma(array(12, 34)); // WHERE yokma IN (12, 34)
     * $query->filterByYokma(array('min' => 12)); // WHERE yokma > 12
     * </code>
     *
     * @param     mixed $yokma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByYokma($yokma = null, $comparison = null)
    {
        if (is_array($yokma)) {
            $useMinMax = false;
            if (isset($yokma['min'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_YOKMA, $yokma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yokma['max'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_YOKMA, $yokma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_YOKMA, $yokma, $comparison);
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
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (is_array($amt)) {
            $useMinMax = false;
            if (isset($amt['min'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_AMT, $amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amt['max'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_AMT, $amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_AMT, $amt, $comparison);
    }

    /**
     * Filter the query on the sdate column
     *
     * Example usage:
     * <code>
     * $query->filterBySdate('2011-03-14'); // WHERE sdate = '2011-03-14'
     * $query->filterBySdate('now'); // WHERE sdate = '2011-03-14'
     * $query->filterBySdate(array('max' => 'yesterday')); // WHERE sdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $sdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterBySdate($sdate = null, $comparison = null)
    {
        if (is_array($sdate)) {
            $useMinMax = false;
            if (isset($sdate['min'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_SDATE, $sdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sdate['max'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_SDATE, $sdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_SDATE, $sdate, $comparison);
    }

    /**
     * Filter the query on the stime column
     *
     * Example usage:
     * <code>
     * $query->filterByStime('2011-03-14'); // WHERE stime = '2011-03-14'
     * $query->filterByStime('now'); // WHERE stime = '2011-03-14'
     * $query->filterByStime(array('max' => 'yesterday')); // WHERE stime > '2011-03-13'
     * </code>
     *
     * @param     mixed $stime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByStime($stime = null, $comparison = null)
    {
        if (is_array($stime)) {
            $useMinMax = false;
            if (isset($stime['min'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_STIME, $stime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stime['max'])) {
                $this->addUsingAlias(AliStocksTableMap::COL_STIME, $stime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_STIME, $stime, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the remark column
     *
     * Example usage:
     * <code>
     * $query->filterByRemark('fooValue');   // WHERE remark = 'fooValue'
     * $query->filterByRemark('%fooValue%', Criteria::LIKE); // WHERE remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_REMARK, $remark, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%', Criteria::LIKE); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStocksTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliStocks $aliStocks Object to remove from the list of results
     *
     * @return $this|ChildAliStocksQuery The current query, for fluid interface
     */
    public function prune($aliStocks = null)
    {
        if ($aliStocks) {
            $this->addUsingAlias(AliStocksTableMap::COL_ID, $aliStocks->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_stocks table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStocksTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliStocksTableMap::clearInstancePool();
            AliStocksTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStocksTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliStocksTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliStocksTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliStocksTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliStocksQuery
