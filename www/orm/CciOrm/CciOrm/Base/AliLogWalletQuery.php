<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLogWallet as ChildAliLogWallet;
use CciOrm\CciOrm\AliLogWalletQuery as ChildAliLogWalletQuery;
use CciOrm\CciOrm\Map\AliLogWalletTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_log_wallet' table.
 *
 *
 *
 * @method     ChildAliLogWalletQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliLogWalletQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliLogWalletQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliLogWalletQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliLogWalletQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliLogWalletQuery orderByEwallet($order = Criteria::ASC) Order by the ewallet column
 * @method     ChildAliLogWalletQuery orderByEvoucher($order = Criteria::ASC) Order by the evoucher column
 * @method     ChildAliLogWalletQuery orderByEautoship($order = Criteria::ASC) Order by the eautoship column
 * @method     ChildAliLogWalletQuery orderByEcom($order = Criteria::ASC) Order by the ecom column
 *
 * @method     ChildAliLogWalletQuery groupById() Group by the id column
 * @method     ChildAliLogWalletQuery groupByRcode() Group by the rcode column
 * @method     ChildAliLogWalletQuery groupByFdate() Group by the fdate column
 * @method     ChildAliLogWalletQuery groupByTdate() Group by the tdate column
 * @method     ChildAliLogWalletQuery groupByMcode() Group by the mcode column
 * @method     ChildAliLogWalletQuery groupByEwallet() Group by the ewallet column
 * @method     ChildAliLogWalletQuery groupByEvoucher() Group by the evoucher column
 * @method     ChildAliLogWalletQuery groupByEautoship() Group by the eautoship column
 * @method     ChildAliLogWalletQuery groupByEcom() Group by the ecom column
 *
 * @method     ChildAliLogWalletQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliLogWalletQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliLogWalletQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliLogWalletQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliLogWalletQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliLogWalletQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliLogWallet findOne(ConnectionInterface $con = null) Return the first ChildAliLogWallet matching the query
 * @method     ChildAliLogWallet findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliLogWallet matching the query, or a new ChildAliLogWallet object populated from the query conditions when no match is found
 *
 * @method     ChildAliLogWallet findOneById(int $id) Return the first ChildAliLogWallet filtered by the id column
 * @method     ChildAliLogWallet findOneByRcode(int $rcode) Return the first ChildAliLogWallet filtered by the rcode column
 * @method     ChildAliLogWallet findOneByFdate(string $fdate) Return the first ChildAliLogWallet filtered by the fdate column
 * @method     ChildAliLogWallet findOneByTdate(string $tdate) Return the first ChildAliLogWallet filtered by the tdate column
 * @method     ChildAliLogWallet findOneByMcode(string $mcode) Return the first ChildAliLogWallet filtered by the mcode column
 * @method     ChildAliLogWallet findOneByEwallet(string $ewallet) Return the first ChildAliLogWallet filtered by the ewallet column
 * @method     ChildAliLogWallet findOneByEvoucher(string $evoucher) Return the first ChildAliLogWallet filtered by the evoucher column
 * @method     ChildAliLogWallet findOneByEautoship(string $eautoship) Return the first ChildAliLogWallet filtered by the eautoship column
 * @method     ChildAliLogWallet findOneByEcom(string $ecom) Return the first ChildAliLogWallet filtered by the ecom column *

 * @method     ChildAliLogWallet requirePk($key, ConnectionInterface $con = null) Return the ChildAliLogWallet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOne(ConnectionInterface $con = null) Return the first ChildAliLogWallet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogWallet requireOneById(int $id) Return the first ChildAliLogWallet filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOneByRcode(int $rcode) Return the first ChildAliLogWallet filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOneByFdate(string $fdate) Return the first ChildAliLogWallet filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOneByTdate(string $tdate) Return the first ChildAliLogWallet filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOneByMcode(string $mcode) Return the first ChildAliLogWallet filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOneByEwallet(string $ewallet) Return the first ChildAliLogWallet filtered by the ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOneByEvoucher(string $evoucher) Return the first ChildAliLogWallet filtered by the evoucher column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOneByEautoship(string $eautoship) Return the first ChildAliLogWallet filtered by the eautoship column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogWallet requireOneByEcom(string $ecom) Return the first ChildAliLogWallet filtered by the ecom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogWallet[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliLogWallet objects based on current ModelCriteria
 * @method     ChildAliLogWallet[]|ObjectCollection findById(int $id) Return ChildAliLogWallet objects filtered by the id column
 * @method     ChildAliLogWallet[]|ObjectCollection findByRcode(int $rcode) Return ChildAliLogWallet objects filtered by the rcode column
 * @method     ChildAliLogWallet[]|ObjectCollection findByFdate(string $fdate) Return ChildAliLogWallet objects filtered by the fdate column
 * @method     ChildAliLogWallet[]|ObjectCollection findByTdate(string $tdate) Return ChildAliLogWallet objects filtered by the tdate column
 * @method     ChildAliLogWallet[]|ObjectCollection findByMcode(string $mcode) Return ChildAliLogWallet objects filtered by the mcode column
 * @method     ChildAliLogWallet[]|ObjectCollection findByEwallet(string $ewallet) Return ChildAliLogWallet objects filtered by the ewallet column
 * @method     ChildAliLogWallet[]|ObjectCollection findByEvoucher(string $evoucher) Return ChildAliLogWallet objects filtered by the evoucher column
 * @method     ChildAliLogWallet[]|ObjectCollection findByEautoship(string $eautoship) Return ChildAliLogWallet objects filtered by the eautoship column
 * @method     ChildAliLogWallet[]|ObjectCollection findByEcom(string $ecom) Return ChildAliLogWallet objects filtered by the ecom column
 * @method     ChildAliLogWallet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliLogWalletQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliLogWalletQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliLogWallet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliLogWalletQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliLogWalletQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliLogWalletQuery) {
            return $criteria;
        }
        $query = new ChildAliLogWalletQuery();
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
     * @return ChildAliLogWallet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliLogWalletTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliLogWalletTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliLogWallet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, fdate, tdate, mcode, ewallet, evoucher, eautoship, ecom FROM ali_log_wallet WHERE id = :p0';
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
            /** @var ChildAliLogWallet $obj */
            $obj = new ChildAliLogWallet();
            $obj->hydrate($row);
            AliLogWalletTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliLogWallet|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliLogWalletTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliLogWalletTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the ewallet column
     *
     * Example usage:
     * <code>
     * $query->filterByEwallet(1234); // WHERE ewallet = 1234
     * $query->filterByEwallet(array(12, 34)); // WHERE ewallet IN (12, 34)
     * $query->filterByEwallet(array('min' => 12)); // WHERE ewallet > 12
     * </code>
     *
     * @param     mixed $ewallet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByEwallet($ewallet = null, $comparison = null)
    {
        if (is_array($ewallet)) {
            $useMinMax = false;
            if (isset($ewallet['min'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_EWALLET, $ewallet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ewallet['max'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_EWALLET, $ewallet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_EWALLET, $ewallet, $comparison);
    }

    /**
     * Filter the query on the evoucher column
     *
     * Example usage:
     * <code>
     * $query->filterByEvoucher(1234); // WHERE evoucher = 1234
     * $query->filterByEvoucher(array(12, 34)); // WHERE evoucher IN (12, 34)
     * $query->filterByEvoucher(array('min' => 12)); // WHERE evoucher > 12
     * </code>
     *
     * @param     mixed $evoucher The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByEvoucher($evoucher = null, $comparison = null)
    {
        if (is_array($evoucher)) {
            $useMinMax = false;
            if (isset($evoucher['min'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_EVOUCHER, $evoucher['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($evoucher['max'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_EVOUCHER, $evoucher['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_EVOUCHER, $evoucher, $comparison);
    }

    /**
     * Filter the query on the eautoship column
     *
     * Example usage:
     * <code>
     * $query->filterByEautoship(1234); // WHERE eautoship = 1234
     * $query->filterByEautoship(array(12, 34)); // WHERE eautoship IN (12, 34)
     * $query->filterByEautoship(array('min' => 12)); // WHERE eautoship > 12
     * </code>
     *
     * @param     mixed $eautoship The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByEautoship($eautoship = null, $comparison = null)
    {
        if (is_array($eautoship)) {
            $useMinMax = false;
            if (isset($eautoship['min'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_EAUTOSHIP, $eautoship['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eautoship['max'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_EAUTOSHIP, $eautoship['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_EAUTOSHIP, $eautoship, $comparison);
    }

    /**
     * Filter the query on the ecom column
     *
     * Example usage:
     * <code>
     * $query->filterByEcom(1234); // WHERE ecom = 1234
     * $query->filterByEcom(array(12, 34)); // WHERE ecom IN (12, 34)
     * $query->filterByEcom(array('min' => 12)); // WHERE ecom > 12
     * </code>
     *
     * @param     mixed $ecom The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function filterByEcom($ecom = null, $comparison = null)
    {
        if (is_array($ecom)) {
            $useMinMax = false;
            if (isset($ecom['min'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_ECOM, $ecom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ecom['max'])) {
                $this->addUsingAlias(AliLogWalletTableMap::COL_ECOM, $ecom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogWalletTableMap::COL_ECOM, $ecom, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliLogWallet $aliLogWallet Object to remove from the list of results
     *
     * @return $this|ChildAliLogWalletQuery The current query, for fluid interface
     */
    public function prune($aliLogWallet = null)
    {
        if ($aliLogWallet) {
            $this->addUsingAlias(AliLogWalletTableMap::COL_ID, $aliLogWallet->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_log_wallet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogWalletTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliLogWalletTableMap::clearInstancePool();
            AliLogWalletTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogWalletTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliLogWalletTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliLogWalletTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliLogWalletTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliLogWalletQuery
