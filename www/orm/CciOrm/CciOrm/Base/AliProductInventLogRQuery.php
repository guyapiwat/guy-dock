<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliProductInventLogR as ChildAliProductInventLogR;
use CciOrm\CciOrm\AliProductInventLogRQuery as ChildAliProductInventLogRQuery;
use CciOrm\CciOrm\Map\AliProductInventLogRTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_product_invent_log_r' table.
 *
 *
 *
 * @method     ChildAliProductInventLogRQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliProductInventLogRQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliProductInventLogRQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliProductInventLogRQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliProductInventLogRQuery orderByInQty($order = Criteria::ASC) Order by the in_qty column
 * @method     ChildAliProductInventLogRQuery orderByOutQty($order = Criteria::ASC) Order by the out_qty column
 * @method     ChildAliProductInventLogRQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliProductInventLogRQuery orderByCheckDate($order = Criteria::ASC) Order by the check_date column
 *
 * @method     ChildAliProductInventLogRQuery groupById() Group by the id column
 * @method     ChildAliProductInventLogRQuery groupBySadate() Group by the sadate column
 * @method     ChildAliProductInventLogRQuery groupByPcode() Group by the pcode column
 * @method     ChildAliProductInventLogRQuery groupByQty() Group by the qty column
 * @method     ChildAliProductInventLogRQuery groupByInQty() Group by the in_qty column
 * @method     ChildAliProductInventLogRQuery groupByOutQty() Group by the out_qty column
 * @method     ChildAliProductInventLogRQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliProductInventLogRQuery groupByCheckDate() Group by the check_date column
 *
 * @method     ChildAliProductInventLogRQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliProductInventLogRQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliProductInventLogRQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliProductInventLogRQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliProductInventLogRQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliProductInventLogRQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliProductInventLogR findOne(ConnectionInterface $con = null) Return the first ChildAliProductInventLogR matching the query
 * @method     ChildAliProductInventLogR findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliProductInventLogR matching the query, or a new ChildAliProductInventLogR object populated from the query conditions when no match is found
 *
 * @method     ChildAliProductInventLogR findOneById(int $id) Return the first ChildAliProductInventLogR filtered by the id column
 * @method     ChildAliProductInventLogR findOneBySadate(string $sadate) Return the first ChildAliProductInventLogR filtered by the sadate column
 * @method     ChildAliProductInventLogR findOneByPcode(string $pcode) Return the first ChildAliProductInventLogR filtered by the pcode column
 * @method     ChildAliProductInventLogR findOneByQty(string $qty) Return the first ChildAliProductInventLogR filtered by the qty column
 * @method     ChildAliProductInventLogR findOneByInQty(int $in_qty) Return the first ChildAliProductInventLogR filtered by the in_qty column
 * @method     ChildAliProductInventLogR findOneByOutQty(int $out_qty) Return the first ChildAliProductInventLogR filtered by the out_qty column
 * @method     ChildAliProductInventLogR findOneByInvCode(string $inv_code) Return the first ChildAliProductInventLogR filtered by the inv_code column
 * @method     ChildAliProductInventLogR findOneByCheckDate(string $check_date) Return the first ChildAliProductInventLogR filtered by the check_date column *

 * @method     ChildAliProductInventLogR requirePk($key, ConnectionInterface $con = null) Return the ChildAliProductInventLogR by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInventLogR requireOne(ConnectionInterface $con = null) Return the first ChildAliProductInventLogR matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductInventLogR requireOneById(int $id) Return the first ChildAliProductInventLogR filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInventLogR requireOneBySadate(string $sadate) Return the first ChildAliProductInventLogR filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInventLogR requireOneByPcode(string $pcode) Return the first ChildAliProductInventLogR filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInventLogR requireOneByQty(string $qty) Return the first ChildAliProductInventLogR filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInventLogR requireOneByInQty(int $in_qty) Return the first ChildAliProductInventLogR filtered by the in_qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInventLogR requireOneByOutQty(int $out_qty) Return the first ChildAliProductInventLogR filtered by the out_qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInventLogR requireOneByInvCode(string $inv_code) Return the first ChildAliProductInventLogR filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInventLogR requireOneByCheckDate(string $check_date) Return the first ChildAliProductInventLogR filtered by the check_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductInventLogR[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliProductInventLogR objects based on current ModelCriteria
 * @method     ChildAliProductInventLogR[]|ObjectCollection findById(int $id) Return ChildAliProductInventLogR objects filtered by the id column
 * @method     ChildAliProductInventLogR[]|ObjectCollection findBySadate(string $sadate) Return ChildAliProductInventLogR objects filtered by the sadate column
 * @method     ChildAliProductInventLogR[]|ObjectCollection findByPcode(string $pcode) Return ChildAliProductInventLogR objects filtered by the pcode column
 * @method     ChildAliProductInventLogR[]|ObjectCollection findByQty(string $qty) Return ChildAliProductInventLogR objects filtered by the qty column
 * @method     ChildAliProductInventLogR[]|ObjectCollection findByInQty(int $in_qty) Return ChildAliProductInventLogR objects filtered by the in_qty column
 * @method     ChildAliProductInventLogR[]|ObjectCollection findByOutQty(int $out_qty) Return ChildAliProductInventLogR objects filtered by the out_qty column
 * @method     ChildAliProductInventLogR[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliProductInventLogR objects filtered by the inv_code column
 * @method     ChildAliProductInventLogR[]|ObjectCollection findByCheckDate(string $check_date) Return ChildAliProductInventLogR objects filtered by the check_date column
 * @method     ChildAliProductInventLogR[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliProductInventLogRQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliProductInventLogRQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliProductInventLogR', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliProductInventLogRQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliProductInventLogRQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliProductInventLogRQuery) {
            return $criteria;
        }
        $query = new ChildAliProductInventLogRQuery();
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
     * @return ChildAliProductInventLogR|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliProductInventLogRTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliProductInventLogRTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliProductInventLogR A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sadate, pcode, qty, in_qty, out_qty, inv_code, check_date FROM ali_product_invent_log_r WHERE id = :p0';
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
            /** @var ChildAliProductInventLogR $obj */
            $obj = new ChildAliProductInventLogR();
            $obj->hydrate($row);
            AliProductInventLogRTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliProductInventLogR|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the in_qty column
     *
     * Example usage:
     * <code>
     * $query->filterByInQty(1234); // WHERE in_qty = 1234
     * $query->filterByInQty(array(12, 34)); // WHERE in_qty IN (12, 34)
     * $query->filterByInQty(array('min' => 12)); // WHERE in_qty > 12
     * </code>
     *
     * @param     mixed $inQty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterByInQty($inQty = null, $comparison = null)
    {
        if (is_array($inQty)) {
            $useMinMax = false;
            if (isset($inQty['min'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_IN_QTY, $inQty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inQty['max'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_IN_QTY, $inQty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_IN_QTY, $inQty, $comparison);
    }

    /**
     * Filter the query on the out_qty column
     *
     * Example usage:
     * <code>
     * $query->filterByOutQty(1234); // WHERE out_qty = 1234
     * $query->filterByOutQty(array(12, 34)); // WHERE out_qty IN (12, 34)
     * $query->filterByOutQty(array('min' => 12)); // WHERE out_qty > 12
     * </code>
     *
     * @param     mixed $outQty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterByOutQty($outQty = null, $comparison = null)
    {
        if (is_array($outQty)) {
            $useMinMax = false;
            if (isset($outQty['min'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_OUT_QTY, $outQty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outQty['max'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_OUT_QTY, $outQty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_OUT_QTY, $outQty, $comparison);
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
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the check_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckDate('2011-03-14'); // WHERE check_date = '2011-03-14'
     * $query->filterByCheckDate('now'); // WHERE check_date = '2011-03-14'
     * $query->filterByCheckDate(array('max' => 'yesterday')); // WHERE check_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $checkDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function filterByCheckDate($checkDate = null, $comparison = null)
    {
        if (is_array($checkDate)) {
            $useMinMax = false;
            if (isset($checkDate['min'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_CHECK_DATE, $checkDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkDate['max'])) {
                $this->addUsingAlias(AliProductInventLogRTableMap::COL_CHECK_DATE, $checkDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInventLogRTableMap::COL_CHECK_DATE, $checkDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliProductInventLogR $aliProductInventLogR Object to remove from the list of results
     *
     * @return $this|ChildAliProductInventLogRQuery The current query, for fluid interface
     */
    public function prune($aliProductInventLogR = null)
    {
        if ($aliProductInventLogR) {
            $this->addUsingAlias(AliProductInventLogRTableMap::COL_ID, $aliProductInventLogR->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_product_invent_log_r table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInventLogRTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliProductInventLogRTableMap::clearInstancePool();
            AliProductInventLogRTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInventLogRTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliProductInventLogRTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliProductInventLogRTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliProductInventLogRTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliProductInventLogRQuery
