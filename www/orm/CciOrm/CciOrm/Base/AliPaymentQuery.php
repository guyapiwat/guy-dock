<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPayment as ChildAliPayment;
use CciOrm\CciOrm\AliPaymentQuery as ChildAliPaymentQuery;
use CciOrm\CciOrm\Map\AliPaymentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_payment' table.
 *
 *
 *
 * @method     ChildAliPaymentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliPaymentQuery orderByPaymentName($order = Criteria::ASC) Order by the payment_name column
 * @method     ChildAliPaymentQuery orderByOrderBy($order = Criteria::ASC) Order by the order_by column
 * @method     ChildAliPaymentQuery orderByPaymentRef($order = Criteria::ASC) Order by the payment_ref column
 * @method     ChildAliPaymentQuery orderByRepColumn($order = Criteria::ASC) Order by the rep_column column
 * @method     ChildAliPaymentQuery orderByPaymentColumn($order = Criteria::ASC) Order by the payment_column column
 * @method     ChildAliPaymentQuery orderByShows($order = Criteria::ASC) Order by the shows column
 * @method     ChildAliPaymentQuery orderByShowsEwallet($order = Criteria::ASC) Order by the shows_ewallet column
 * @method     ChildAliPaymentQuery orderByShowsMemEdit($order = Criteria::ASC) Order by the shows_mem_edit column
 * @method     ChildAliPaymentQuery orderByShowsMember($order = Criteria::ASC) Order by the shows_member column
 *
 * @method     ChildAliPaymentQuery groupById() Group by the id column
 * @method     ChildAliPaymentQuery groupByPaymentName() Group by the payment_name column
 * @method     ChildAliPaymentQuery groupByOrderBy() Group by the order_by column
 * @method     ChildAliPaymentQuery groupByPaymentRef() Group by the payment_ref column
 * @method     ChildAliPaymentQuery groupByRepColumn() Group by the rep_column column
 * @method     ChildAliPaymentQuery groupByPaymentColumn() Group by the payment_column column
 * @method     ChildAliPaymentQuery groupByShows() Group by the shows column
 * @method     ChildAliPaymentQuery groupByShowsEwallet() Group by the shows_ewallet column
 * @method     ChildAliPaymentQuery groupByShowsMemEdit() Group by the shows_mem_edit column
 * @method     ChildAliPaymentQuery groupByShowsMember() Group by the shows_member column
 *
 * @method     ChildAliPaymentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPaymentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPaymentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPaymentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPaymentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPaymentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPayment findOne(ConnectionInterface $con = null) Return the first ChildAliPayment matching the query
 * @method     ChildAliPayment findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPayment matching the query, or a new ChildAliPayment object populated from the query conditions when no match is found
 *
 * @method     ChildAliPayment findOneById(int $id) Return the first ChildAliPayment filtered by the id column
 * @method     ChildAliPayment findOneByPaymentName(string $payment_name) Return the first ChildAliPayment filtered by the payment_name column
 * @method     ChildAliPayment findOneByOrderBy(int $order_by) Return the first ChildAliPayment filtered by the order_by column
 * @method     ChildAliPayment findOneByPaymentRef(string $payment_ref) Return the first ChildAliPayment filtered by the payment_ref column
 * @method     ChildAliPayment findOneByRepColumn(string $rep_column) Return the first ChildAliPayment filtered by the rep_column column
 * @method     ChildAliPayment findOneByPaymentColumn(string $payment_column) Return the first ChildAliPayment filtered by the payment_column column
 * @method     ChildAliPayment findOneByShows(int $shows) Return the first ChildAliPayment filtered by the shows column
 * @method     ChildAliPayment findOneByShowsEwallet(int $shows_ewallet) Return the first ChildAliPayment filtered by the shows_ewallet column
 * @method     ChildAliPayment findOneByShowsMemEdit(int $shows_mem_edit) Return the first ChildAliPayment filtered by the shows_mem_edit column
 * @method     ChildAliPayment findOneByShowsMember(int $shows_member) Return the first ChildAliPayment filtered by the shows_member column *

 * @method     ChildAliPayment requirePk($key, ConnectionInterface $con = null) Return the ChildAliPayment by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOne(ConnectionInterface $con = null) Return the first ChildAliPayment matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPayment requireOneById(int $id) Return the first ChildAliPayment filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByPaymentName(string $payment_name) Return the first ChildAliPayment filtered by the payment_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByOrderBy(int $order_by) Return the first ChildAliPayment filtered by the order_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByPaymentRef(string $payment_ref) Return the first ChildAliPayment filtered by the payment_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByRepColumn(string $rep_column) Return the first ChildAliPayment filtered by the rep_column column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByPaymentColumn(string $payment_column) Return the first ChildAliPayment filtered by the payment_column column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByShows(int $shows) Return the first ChildAliPayment filtered by the shows column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByShowsEwallet(int $shows_ewallet) Return the first ChildAliPayment filtered by the shows_ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByShowsMemEdit(int $shows_mem_edit) Return the first ChildAliPayment filtered by the shows_mem_edit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPayment requireOneByShowsMember(int $shows_member) Return the first ChildAliPayment filtered by the shows_member column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPayment[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPayment objects based on current ModelCriteria
 * @method     ChildAliPayment[]|ObjectCollection findById(int $id) Return ChildAliPayment objects filtered by the id column
 * @method     ChildAliPayment[]|ObjectCollection findByPaymentName(string $payment_name) Return ChildAliPayment objects filtered by the payment_name column
 * @method     ChildAliPayment[]|ObjectCollection findByOrderBy(int $order_by) Return ChildAliPayment objects filtered by the order_by column
 * @method     ChildAliPayment[]|ObjectCollection findByPaymentRef(string $payment_ref) Return ChildAliPayment objects filtered by the payment_ref column
 * @method     ChildAliPayment[]|ObjectCollection findByRepColumn(string $rep_column) Return ChildAliPayment objects filtered by the rep_column column
 * @method     ChildAliPayment[]|ObjectCollection findByPaymentColumn(string $payment_column) Return ChildAliPayment objects filtered by the payment_column column
 * @method     ChildAliPayment[]|ObjectCollection findByShows(int $shows) Return ChildAliPayment objects filtered by the shows column
 * @method     ChildAliPayment[]|ObjectCollection findByShowsEwallet(int $shows_ewallet) Return ChildAliPayment objects filtered by the shows_ewallet column
 * @method     ChildAliPayment[]|ObjectCollection findByShowsMemEdit(int $shows_mem_edit) Return ChildAliPayment objects filtered by the shows_mem_edit column
 * @method     ChildAliPayment[]|ObjectCollection findByShowsMember(int $shows_member) Return ChildAliPayment objects filtered by the shows_member column
 * @method     ChildAliPayment[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPaymentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPaymentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPayment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPaymentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPaymentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPaymentQuery) {
            return $criteria;
        }
        $query = new ChildAliPaymentQuery();
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
     * @return ChildAliPayment|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliPaymentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliPaymentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliPayment A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, payment_name, order_by, payment_ref, rep_column, payment_column, shows, shows_ewallet, shows_mem_edit, shows_member FROM ali_payment WHERE id = :p0';
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
            /** @var ChildAliPayment $obj */
            $obj = new ChildAliPayment();
            $obj->hydrate($row);
            AliPaymentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliPayment|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliPaymentTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliPaymentTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the payment_name column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentName('fooValue');   // WHERE payment_name = 'fooValue'
     * $query->filterByPaymentName('%fooValue%', Criteria::LIKE); // WHERE payment_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByPaymentName($paymentName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_PAYMENT_NAME, $paymentName, $comparison);
    }

    /**
     * Filter the query on the order_by column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderBy(1234); // WHERE order_by = 1234
     * $query->filterByOrderBy(array(12, 34)); // WHERE order_by IN (12, 34)
     * $query->filterByOrderBy(array('min' => 12)); // WHERE order_by > 12
     * </code>
     *
     * @param     mixed $orderBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByOrderBy($orderBy = null, $comparison = null)
    {
        if (is_array($orderBy)) {
            $useMinMax = false;
            if (isset($orderBy['min'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_ORDER_BY, $orderBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderBy['max'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_ORDER_BY, $orderBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_ORDER_BY, $orderBy, $comparison);
    }

    /**
     * Filter the query on the payment_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentRef('fooValue');   // WHERE payment_ref = 'fooValue'
     * $query->filterByPaymentRef('%fooValue%', Criteria::LIKE); // WHERE payment_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByPaymentRef($paymentRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_PAYMENT_REF, $paymentRef, $comparison);
    }

    /**
     * Filter the query on the rep_column column
     *
     * Example usage:
     * <code>
     * $query->filterByRepColumn('fooValue');   // WHERE rep_column = 'fooValue'
     * $query->filterByRepColumn('%fooValue%', Criteria::LIKE); // WHERE rep_column LIKE '%fooValue%'
     * </code>
     *
     * @param     string $repColumn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByRepColumn($repColumn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($repColumn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_REP_COLUMN, $repColumn, $comparison);
    }

    /**
     * Filter the query on the payment_column column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentColumn('fooValue');   // WHERE payment_column = 'fooValue'
     * $query->filterByPaymentColumn('%fooValue%', Criteria::LIKE); // WHERE payment_column LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentColumn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByPaymentColumn($paymentColumn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentColumn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_PAYMENT_COLUMN, $paymentColumn, $comparison);
    }

    /**
     * Filter the query on the shows column
     *
     * Example usage:
     * <code>
     * $query->filterByShows(1234); // WHERE shows = 1234
     * $query->filterByShows(array(12, 34)); // WHERE shows IN (12, 34)
     * $query->filterByShows(array('min' => 12)); // WHERE shows > 12
     * </code>
     *
     * @param     mixed $shows The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByShows($shows = null, $comparison = null)
    {
        if (is_array($shows)) {
            $useMinMax = false;
            if (isset($shows['min'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS, $shows['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shows['max'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS, $shows['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS, $shows, $comparison);
    }

    /**
     * Filter the query on the shows_ewallet column
     *
     * Example usage:
     * <code>
     * $query->filterByShowsEwallet(1234); // WHERE shows_ewallet = 1234
     * $query->filterByShowsEwallet(array(12, 34)); // WHERE shows_ewallet IN (12, 34)
     * $query->filterByShowsEwallet(array('min' => 12)); // WHERE shows_ewallet > 12
     * </code>
     *
     * @param     mixed $showsEwallet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByShowsEwallet($showsEwallet = null, $comparison = null)
    {
        if (is_array($showsEwallet)) {
            $useMinMax = false;
            if (isset($showsEwallet['min'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_EWALLET, $showsEwallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($showsEwallet['max'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_EWALLET, $showsEwallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_EWALLET, $showsEwallet, $comparison);
    }

    /**
     * Filter the query on the shows_mem_edit column
     *
     * Example usage:
     * <code>
     * $query->filterByShowsMemEdit(1234); // WHERE shows_mem_edit = 1234
     * $query->filterByShowsMemEdit(array(12, 34)); // WHERE shows_mem_edit IN (12, 34)
     * $query->filterByShowsMemEdit(array('min' => 12)); // WHERE shows_mem_edit > 12
     * </code>
     *
     * @param     mixed $showsMemEdit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByShowsMemEdit($showsMemEdit = null, $comparison = null)
    {
        if (is_array($showsMemEdit)) {
            $useMinMax = false;
            if (isset($showsMemEdit['min'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_MEM_EDIT, $showsMemEdit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($showsMemEdit['max'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_MEM_EDIT, $showsMemEdit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_MEM_EDIT, $showsMemEdit, $comparison);
    }

    /**
     * Filter the query on the shows_member column
     *
     * Example usage:
     * <code>
     * $query->filterByShowsMember(1234); // WHERE shows_member = 1234
     * $query->filterByShowsMember(array(12, 34)); // WHERE shows_member IN (12, 34)
     * $query->filterByShowsMember(array('min' => 12)); // WHERE shows_member > 12
     * </code>
     *
     * @param     mixed $showsMember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function filterByShowsMember($showsMember = null, $comparison = null)
    {
        if (is_array($showsMember)) {
            $useMinMax = false;
            if (isset($showsMember['min'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_MEMBER, $showsMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($showsMember['max'])) {
                $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_MEMBER, $showsMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPaymentTableMap::COL_SHOWS_MEMBER, $showsMember, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPayment $aliPayment Object to remove from the list of results
     *
     * @return $this|ChildAliPaymentQuery The current query, for fluid interface
     */
    public function prune($aliPayment = null)
    {
        if ($aliPayment) {
            $this->addUsingAlias(AliPaymentTableMap::COL_ID, $aliPayment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_payment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPaymentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPaymentTableMap::clearInstancePool();
            AliPaymentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPaymentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPaymentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPaymentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPaymentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPaymentQuery
