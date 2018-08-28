<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliSms as ChildAliSms;
use CciOrm\CciOrm\AliSmsQuery as ChildAliSmsQuery;
use CciOrm\CciOrm\Map\AliSmsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_sms' table.
 *
 *
 *
 * @method     ChildAliSmsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliSmsQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliSmsQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method     ChildAliSmsQuery orderByMobileDesc($order = Criteria::ASC) Order by the mobile_desc column
 * @method     ChildAliSmsQuery orderByMobileDate($order = Criteria::ASC) Order by the mobile_date column
 * @method     ChildAliSmsQuery orderBySendDate($order = Criteria::ASC) Order by the send_date column
 * @method     ChildAliSmsQuery orderByMobileStatus($order = Criteria::ASC) Order by the mobile_status column
 * @method     ChildAliSmsQuery orderByMobileCredits($order = Criteria::ASC) Order by the mobile_credits column
 * @method     ChildAliSmsQuery orderByCreditBalance($order = Criteria::ASC) Order by the credit_balance column
 * @method     ChildAliSmsQuery orderByRecieveDate($order = Criteria::ASC) Order by the recieve_date column
 *
 * @method     ChildAliSmsQuery groupById() Group by the id column
 * @method     ChildAliSmsQuery groupByMcode() Group by the mcode column
 * @method     ChildAliSmsQuery groupByMobile() Group by the mobile column
 * @method     ChildAliSmsQuery groupByMobileDesc() Group by the mobile_desc column
 * @method     ChildAliSmsQuery groupByMobileDate() Group by the mobile_date column
 * @method     ChildAliSmsQuery groupBySendDate() Group by the send_date column
 * @method     ChildAliSmsQuery groupByMobileStatus() Group by the mobile_status column
 * @method     ChildAliSmsQuery groupByMobileCredits() Group by the mobile_credits column
 * @method     ChildAliSmsQuery groupByCreditBalance() Group by the credit_balance column
 * @method     ChildAliSmsQuery groupByRecieveDate() Group by the recieve_date column
 *
 * @method     ChildAliSmsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSmsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSmsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSmsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSmsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSmsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSms findOne(ConnectionInterface $con = null) Return the first ChildAliSms matching the query
 * @method     ChildAliSms findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSms matching the query, or a new ChildAliSms object populated from the query conditions when no match is found
 *
 * @method     ChildAliSms findOneById(int $id) Return the first ChildAliSms filtered by the id column
 * @method     ChildAliSms findOneByMcode(string $mcode) Return the first ChildAliSms filtered by the mcode column
 * @method     ChildAliSms findOneByMobile(string $mobile) Return the first ChildAliSms filtered by the mobile column
 * @method     ChildAliSms findOneByMobileDesc(string $mobile_desc) Return the first ChildAliSms filtered by the mobile_desc column
 * @method     ChildAliSms findOneByMobileDate(string $mobile_date) Return the first ChildAliSms filtered by the mobile_date column
 * @method     ChildAliSms findOneBySendDate(string $send_date) Return the first ChildAliSms filtered by the send_date column
 * @method     ChildAliSms findOneByMobileStatus(string $mobile_status) Return the first ChildAliSms filtered by the mobile_status column
 * @method     ChildAliSms findOneByMobileCredits(string $mobile_credits) Return the first ChildAliSms filtered by the mobile_credits column
 * @method     ChildAliSms findOneByCreditBalance(int $credit_balance) Return the first ChildAliSms filtered by the credit_balance column
 * @method     ChildAliSms findOneByRecieveDate(string $recieve_date) Return the first ChildAliSms filtered by the recieve_date column *

 * @method     ChildAliSms requirePk($key, ConnectionInterface $con = null) Return the ChildAliSms by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOne(ConnectionInterface $con = null) Return the first ChildAliSms matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSms requireOneById(int $id) Return the first ChildAliSms filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneByMcode(string $mcode) Return the first ChildAliSms filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneByMobile(string $mobile) Return the first ChildAliSms filtered by the mobile column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneByMobileDesc(string $mobile_desc) Return the first ChildAliSms filtered by the mobile_desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneByMobileDate(string $mobile_date) Return the first ChildAliSms filtered by the mobile_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneBySendDate(string $send_date) Return the first ChildAliSms filtered by the send_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneByMobileStatus(string $mobile_status) Return the first ChildAliSms filtered by the mobile_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneByMobileCredits(string $mobile_credits) Return the first ChildAliSms filtered by the mobile_credits column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneByCreditBalance(int $credit_balance) Return the first ChildAliSms filtered by the credit_balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSms requireOneByRecieveDate(string $recieve_date) Return the first ChildAliSms filtered by the recieve_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSms[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSms objects based on current ModelCriteria
 * @method     ChildAliSms[]|ObjectCollection findById(int $id) Return ChildAliSms objects filtered by the id column
 * @method     ChildAliSms[]|ObjectCollection findByMcode(string $mcode) Return ChildAliSms objects filtered by the mcode column
 * @method     ChildAliSms[]|ObjectCollection findByMobile(string $mobile) Return ChildAliSms objects filtered by the mobile column
 * @method     ChildAliSms[]|ObjectCollection findByMobileDesc(string $mobile_desc) Return ChildAliSms objects filtered by the mobile_desc column
 * @method     ChildAliSms[]|ObjectCollection findByMobileDate(string $mobile_date) Return ChildAliSms objects filtered by the mobile_date column
 * @method     ChildAliSms[]|ObjectCollection findBySendDate(string $send_date) Return ChildAliSms objects filtered by the send_date column
 * @method     ChildAliSms[]|ObjectCollection findByMobileStatus(string $mobile_status) Return ChildAliSms objects filtered by the mobile_status column
 * @method     ChildAliSms[]|ObjectCollection findByMobileCredits(string $mobile_credits) Return ChildAliSms objects filtered by the mobile_credits column
 * @method     ChildAliSms[]|ObjectCollection findByCreditBalance(int $credit_balance) Return ChildAliSms objects filtered by the credit_balance column
 * @method     ChildAliSms[]|ObjectCollection findByRecieveDate(string $recieve_date) Return ChildAliSms objects filtered by the recieve_date column
 * @method     ChildAliSms[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSmsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSmsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSms', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSmsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSmsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSmsQuery) {
            return $criteria;
        }
        $query = new ChildAliSmsQuery();
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
     * @return ChildAliSms|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliSmsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliSmsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliSms A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, mobile, mobile_desc, mobile_date, send_date, mobile_status, mobile_credits, credit_balance, recieve_date FROM ali_sms WHERE id = :p0';
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
            /** @var ChildAliSms $obj */
            $obj = new ChildAliSms();
            $obj->hydrate($row);
            AliSmsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliSms|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliSmsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliSmsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliSmsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliSmsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByMobile('fooValue');   // WHERE mobile = 'fooValue'
     * $query->filterByMobile('%fooValue%', Criteria::LIKE); // WHERE mobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobile The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByMobile($mobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobile)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_MOBILE, $mobile, $comparison);
    }

    /**
     * Filter the query on the mobile_desc column
     *
     * Example usage:
     * <code>
     * $query->filterByMobileDesc('fooValue');   // WHERE mobile_desc = 'fooValue'
     * $query->filterByMobileDesc('%fooValue%', Criteria::LIKE); // WHERE mobile_desc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobileDesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByMobileDesc($mobileDesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobileDesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_MOBILE_DESC, $mobileDesc, $comparison);
    }

    /**
     * Filter the query on the mobile_date column
     *
     * Example usage:
     * <code>
     * $query->filterByMobileDate('fooValue');   // WHERE mobile_date = 'fooValue'
     * $query->filterByMobileDate('%fooValue%', Criteria::LIKE); // WHERE mobile_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobileDate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByMobileDate($mobileDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobileDate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_MOBILE_DATE, $mobileDate, $comparison);
    }

    /**
     * Filter the query on the send_date column
     *
     * Example usage:
     * <code>
     * $query->filterBySendDate('fooValue');   // WHERE send_date = 'fooValue'
     * $query->filterBySendDate('%fooValue%', Criteria::LIKE); // WHERE send_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sendDate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterBySendDate($sendDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sendDate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_SEND_DATE, $sendDate, $comparison);
    }

    /**
     * Filter the query on the mobile_status column
     *
     * Example usage:
     * <code>
     * $query->filterByMobileStatus('fooValue');   // WHERE mobile_status = 'fooValue'
     * $query->filterByMobileStatus('%fooValue%', Criteria::LIKE); // WHERE mobile_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobileStatus The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByMobileStatus($mobileStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobileStatus)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_MOBILE_STATUS, $mobileStatus, $comparison);
    }

    /**
     * Filter the query on the mobile_credits column
     *
     * Example usage:
     * <code>
     * $query->filterByMobileCredits('fooValue');   // WHERE mobile_credits = 'fooValue'
     * $query->filterByMobileCredits('%fooValue%', Criteria::LIKE); // WHERE mobile_credits LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobileCredits The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByMobileCredits($mobileCredits = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobileCredits)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_MOBILE_CREDITS, $mobileCredits, $comparison);
    }

    /**
     * Filter the query on the credit_balance column
     *
     * Example usage:
     * <code>
     * $query->filterByCreditBalance(1234); // WHERE credit_balance = 1234
     * $query->filterByCreditBalance(array(12, 34)); // WHERE credit_balance IN (12, 34)
     * $query->filterByCreditBalance(array('min' => 12)); // WHERE credit_balance > 12
     * </code>
     *
     * @param     mixed $creditBalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByCreditBalance($creditBalance = null, $comparison = null)
    {
        if (is_array($creditBalance)) {
            $useMinMax = false;
            if (isset($creditBalance['min'])) {
                $this->addUsingAlias(AliSmsTableMap::COL_CREDIT_BALANCE, $creditBalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creditBalance['max'])) {
                $this->addUsingAlias(AliSmsTableMap::COL_CREDIT_BALANCE, $creditBalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_CREDIT_BALANCE, $creditBalance, $comparison);
    }

    /**
     * Filter the query on the recieve_date column
     *
     * Example usage:
     * <code>
     * $query->filterByRecieveDate('2011-03-14'); // WHERE recieve_date = '2011-03-14'
     * $query->filterByRecieveDate('now'); // WHERE recieve_date = '2011-03-14'
     * $query->filterByRecieveDate(array('max' => 'yesterday')); // WHERE recieve_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $recieveDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function filterByRecieveDate($recieveDate = null, $comparison = null)
    {
        if (is_array($recieveDate)) {
            $useMinMax = false;
            if (isset($recieveDate['min'])) {
                $this->addUsingAlias(AliSmsTableMap::COL_RECIEVE_DATE, $recieveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recieveDate['max'])) {
                $this->addUsingAlias(AliSmsTableMap::COL_RECIEVE_DATE, $recieveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSmsTableMap::COL_RECIEVE_DATE, $recieveDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSms $aliSms Object to remove from the list of results
     *
     * @return $this|ChildAliSmsQuery The current query, for fluid interface
     */
    public function prune($aliSms = null)
    {
        if ($aliSms) {
            $this->addUsingAlias(AliSmsTableMap::COL_ID, $aliSms->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_sms table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSmsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSmsTableMap::clearInstancePool();
            AliSmsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSmsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSmsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSmsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSmsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSmsQuery
