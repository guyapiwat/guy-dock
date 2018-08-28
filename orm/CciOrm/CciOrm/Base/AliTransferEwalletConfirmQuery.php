<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTransferEwalletConfirm as ChildAliTransferEwalletConfirm;
use CciOrm\CciOrm\AliTransferEwalletConfirmQuery as ChildAliTransferEwalletConfirmQuery;
use CciOrm\CciOrm\Map\AliTransferEwalletConfirmTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_transfer_ewallet_confirm' table.
 *
 *
 *
 * @method     ChildAliTransferEwalletConfirmQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliTransferEwalletConfirmQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTransferEwalletConfirmQuery orderByPayType($order = Criteria::ASC) Order by the pay_type column
 * @method     ChildAliTransferEwalletConfirmQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliTransferEwalletConfirmQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliTransferEwalletConfirmQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliTransferEwalletConfirmQuery orderByImgPay($order = Criteria::ASC) Order by the img_pay column
 * @method     ChildAliTransferEwalletConfirmQuery orderByApprovedUid($order = Criteria::ASC) Order by the approved_uid column
 * @method     ChildAliTransferEwalletConfirmQuery orderByApprovedSctime($order = Criteria::ASC) Order by the approved_sctime column
 * @method     ChildAliTransferEwalletConfirmQuery orderByApprovedStatus($order = Criteria::ASC) Order by the approved_status column
 * @method     ChildAliTransferEwalletConfirmQuery orderByCancelUid($order = Criteria::ASC) Order by the cancel_uid column
 * @method     ChildAliTransferEwalletConfirmQuery orderByCancelSctime($order = Criteria::ASC) Order by the cancel_sctime column
 * @method     ChildAliTransferEwalletConfirmQuery orderByCancelStatus($order = Criteria::ASC) Order by the cancel_status column
 * @method     ChildAliTransferEwalletConfirmQuery orderByLastSctime($order = Criteria::ASC) Order by the last_sctime column
 * @method     ChildAliTransferEwalletConfirmQuery orderBySanoRef($order = Criteria::ASC) Order by the sano_ref column
 *
 * @method     ChildAliTransferEwalletConfirmQuery groupById() Group by the id column
 * @method     ChildAliTransferEwalletConfirmQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTransferEwalletConfirmQuery groupByPayType() Group by the pay_type column
 * @method     ChildAliTransferEwalletConfirmQuery groupBySadate() Group by the sadate column
 * @method     ChildAliTransferEwalletConfirmQuery groupBySctime() Group by the sctime column
 * @method     ChildAliTransferEwalletConfirmQuery groupByTotal() Group by the total column
 * @method     ChildAliTransferEwalletConfirmQuery groupByImgPay() Group by the img_pay column
 * @method     ChildAliTransferEwalletConfirmQuery groupByApprovedUid() Group by the approved_uid column
 * @method     ChildAliTransferEwalletConfirmQuery groupByApprovedSctime() Group by the approved_sctime column
 * @method     ChildAliTransferEwalletConfirmQuery groupByApprovedStatus() Group by the approved_status column
 * @method     ChildAliTransferEwalletConfirmQuery groupByCancelUid() Group by the cancel_uid column
 * @method     ChildAliTransferEwalletConfirmQuery groupByCancelSctime() Group by the cancel_sctime column
 * @method     ChildAliTransferEwalletConfirmQuery groupByCancelStatus() Group by the cancel_status column
 * @method     ChildAliTransferEwalletConfirmQuery groupByLastSctime() Group by the last_sctime column
 * @method     ChildAliTransferEwalletConfirmQuery groupBySanoRef() Group by the sano_ref column
 *
 * @method     ChildAliTransferEwalletConfirmQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTransferEwalletConfirmQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTransferEwalletConfirmQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTransferEwalletConfirmQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTransferEwalletConfirmQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTransferEwalletConfirmQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTransferEwalletConfirm findOne(ConnectionInterface $con = null) Return the first ChildAliTransferEwalletConfirm matching the query
 * @method     ChildAliTransferEwalletConfirm findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTransferEwalletConfirm matching the query, or a new ChildAliTransferEwalletConfirm object populated from the query conditions when no match is found
 *
 * @method     ChildAliTransferEwalletConfirm findOneById(int $id) Return the first ChildAliTransferEwalletConfirm filtered by the id column
 * @method     ChildAliTransferEwalletConfirm findOneByMcode(string $mcode) Return the first ChildAliTransferEwalletConfirm filtered by the mcode column
 * @method     ChildAliTransferEwalletConfirm findOneByPayType(string $pay_type) Return the first ChildAliTransferEwalletConfirm filtered by the pay_type column
 * @method     ChildAliTransferEwalletConfirm findOneBySadate(string $sadate) Return the first ChildAliTransferEwalletConfirm filtered by the sadate column
 * @method     ChildAliTransferEwalletConfirm findOneBySctime(string $sctime) Return the first ChildAliTransferEwalletConfirm filtered by the sctime column
 * @method     ChildAliTransferEwalletConfirm findOneByTotal(string $total) Return the first ChildAliTransferEwalletConfirm filtered by the total column
 * @method     ChildAliTransferEwalletConfirm findOneByImgPay(string $img_pay) Return the first ChildAliTransferEwalletConfirm filtered by the img_pay column
 * @method     ChildAliTransferEwalletConfirm findOneByApprovedUid(string $approved_uid) Return the first ChildAliTransferEwalletConfirm filtered by the approved_uid column
 * @method     ChildAliTransferEwalletConfirm findOneByApprovedSctime(string $approved_sctime) Return the first ChildAliTransferEwalletConfirm filtered by the approved_sctime column
 * @method     ChildAliTransferEwalletConfirm findOneByApprovedStatus(int $approved_status) Return the first ChildAliTransferEwalletConfirm filtered by the approved_status column
 * @method     ChildAliTransferEwalletConfirm findOneByCancelUid(string $cancel_uid) Return the first ChildAliTransferEwalletConfirm filtered by the cancel_uid column
 * @method     ChildAliTransferEwalletConfirm findOneByCancelSctime(string $cancel_sctime) Return the first ChildAliTransferEwalletConfirm filtered by the cancel_sctime column
 * @method     ChildAliTransferEwalletConfirm findOneByCancelStatus(int $cancel_status) Return the first ChildAliTransferEwalletConfirm filtered by the cancel_status column
 * @method     ChildAliTransferEwalletConfirm findOneByLastSctime(string $last_sctime) Return the first ChildAliTransferEwalletConfirm filtered by the last_sctime column
 * @method     ChildAliTransferEwalletConfirm findOneBySanoRef(string $sano_ref) Return the first ChildAliTransferEwalletConfirm filtered by the sano_ref column *

 * @method     ChildAliTransferEwalletConfirm requirePk($key, ConnectionInterface $con = null) Return the ChildAliTransferEwalletConfirm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOne(ConnectionInterface $con = null) Return the first ChildAliTransferEwalletConfirm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTransferEwalletConfirm requireOneById(int $id) Return the first ChildAliTransferEwalletConfirm filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByMcode(string $mcode) Return the first ChildAliTransferEwalletConfirm filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByPayType(string $pay_type) Return the first ChildAliTransferEwalletConfirm filtered by the pay_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneBySadate(string $sadate) Return the first ChildAliTransferEwalletConfirm filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneBySctime(string $sctime) Return the first ChildAliTransferEwalletConfirm filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByTotal(string $total) Return the first ChildAliTransferEwalletConfirm filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByImgPay(string $img_pay) Return the first ChildAliTransferEwalletConfirm filtered by the img_pay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByApprovedUid(string $approved_uid) Return the first ChildAliTransferEwalletConfirm filtered by the approved_uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByApprovedSctime(string $approved_sctime) Return the first ChildAliTransferEwalletConfirm filtered by the approved_sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByApprovedStatus(int $approved_status) Return the first ChildAliTransferEwalletConfirm filtered by the approved_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByCancelUid(string $cancel_uid) Return the first ChildAliTransferEwalletConfirm filtered by the cancel_uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByCancelSctime(string $cancel_sctime) Return the first ChildAliTransferEwalletConfirm filtered by the cancel_sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByCancelStatus(int $cancel_status) Return the first ChildAliTransferEwalletConfirm filtered by the cancel_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneByLastSctime(string $last_sctime) Return the first ChildAliTransferEwalletConfirm filtered by the last_sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTransferEwalletConfirm requireOneBySanoRef(string $sano_ref) Return the first ChildAliTransferEwalletConfirm filtered by the sano_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTransferEwalletConfirm objects based on current ModelCriteria
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findById(int $id) Return ChildAliTransferEwalletConfirm objects filtered by the id column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTransferEwalletConfirm objects filtered by the mcode column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByPayType(string $pay_type) Return ChildAliTransferEwalletConfirm objects filtered by the pay_type column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findBySadate(string $sadate) Return ChildAliTransferEwalletConfirm objects filtered by the sadate column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findBySctime(string $sctime) Return ChildAliTransferEwalletConfirm objects filtered by the sctime column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByTotal(string $total) Return ChildAliTransferEwalletConfirm objects filtered by the total column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByImgPay(string $img_pay) Return ChildAliTransferEwalletConfirm objects filtered by the img_pay column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByApprovedUid(string $approved_uid) Return ChildAliTransferEwalletConfirm objects filtered by the approved_uid column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByApprovedSctime(string $approved_sctime) Return ChildAliTransferEwalletConfirm objects filtered by the approved_sctime column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByApprovedStatus(int $approved_status) Return ChildAliTransferEwalletConfirm objects filtered by the approved_status column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByCancelUid(string $cancel_uid) Return ChildAliTransferEwalletConfirm objects filtered by the cancel_uid column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByCancelSctime(string $cancel_sctime) Return ChildAliTransferEwalletConfirm objects filtered by the cancel_sctime column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByCancelStatus(int $cancel_status) Return ChildAliTransferEwalletConfirm objects filtered by the cancel_status column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findByLastSctime(string $last_sctime) Return ChildAliTransferEwalletConfirm objects filtered by the last_sctime column
 * @method     ChildAliTransferEwalletConfirm[]|ObjectCollection findBySanoRef(string $sano_ref) Return ChildAliTransferEwalletConfirm objects filtered by the sano_ref column
 * @method     ChildAliTransferEwalletConfirm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTransferEwalletConfirmQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTransferEwalletConfirmQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTransferEwalletConfirm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTransferEwalletConfirmQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTransferEwalletConfirmQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTransferEwalletConfirmQuery) {
            return $criteria;
        }
        $query = new ChildAliTransferEwalletConfirmQuery();
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
     * @return ChildAliTransferEwalletConfirm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTransferEwalletConfirmTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTransferEwalletConfirm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, pay_type, sadate, sctime, total, img_pay, approved_uid, approved_sctime, approved_status, cancel_uid, cancel_sctime, cancel_status, last_sctime, sano_ref FROM ali_transfer_ewallet_confirm WHERE id = :p0';
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
            /** @var ChildAliTransferEwalletConfirm $obj */
            $obj = new ChildAliTransferEwalletConfirm();
            $obj->hydrate($row);
            AliTransferEwalletConfirmTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTransferEwalletConfirm|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the pay_type column
     *
     * Example usage:
     * <code>
     * $query->filterByPayType('fooValue');   // WHERE pay_type = 'fooValue'
     * $query->filterByPayType('%fooValue%', Criteria::LIKE); // WHERE pay_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByPayType($payType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_PAY_TYPE, $payType, $comparison);
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
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_SADATE, $sadate, $comparison);
    }

    /**
     * Filter the query on the sctime column
     *
     * Example usage:
     * <code>
     * $query->filterBySctime('fooValue');   // WHERE sctime = 'fooValue'
     * $query->filterBySctime('%fooValue%', Criteria::LIKE); // WHERE sctime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sctime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sctime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_SCTIME, $sctime, $comparison);
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
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the img_pay column
     *
     * Example usage:
     * <code>
     * $query->filterByImgPay('fooValue');   // WHERE img_pay = 'fooValue'
     * $query->filterByImgPay('%fooValue%', Criteria::LIKE); // WHERE img_pay LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imgPay The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByImgPay($imgPay = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imgPay)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_IMG_PAY, $imgPay, $comparison);
    }

    /**
     * Filter the query on the approved_uid column
     *
     * Example usage:
     * <code>
     * $query->filterByApprovedUid('fooValue');   // WHERE approved_uid = 'fooValue'
     * $query->filterByApprovedUid('%fooValue%', Criteria::LIKE); // WHERE approved_uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $approvedUid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByApprovedUid($approvedUid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($approvedUid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_APPROVED_UID, $approvedUid, $comparison);
    }

    /**
     * Filter the query on the approved_sctime column
     *
     * Example usage:
     * <code>
     * $query->filterByApprovedSctime('2011-03-14'); // WHERE approved_sctime = '2011-03-14'
     * $query->filterByApprovedSctime('now'); // WHERE approved_sctime = '2011-03-14'
     * $query->filterByApprovedSctime(array('max' => 'yesterday')); // WHERE approved_sctime > '2011-03-13'
     * </code>
     *
     * @param     mixed $approvedSctime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByApprovedSctime($approvedSctime = null, $comparison = null)
    {
        if (is_array($approvedSctime)) {
            $useMinMax = false;
            if (isset($approvedSctime['min'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME, $approvedSctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($approvedSctime['max'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME, $approvedSctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_APPROVED_SCTIME, $approvedSctime, $comparison);
    }

    /**
     * Filter the query on the approved_status column
     *
     * Example usage:
     * <code>
     * $query->filterByApprovedStatus(1234); // WHERE approved_status = 1234
     * $query->filterByApprovedStatus(array(12, 34)); // WHERE approved_status IN (12, 34)
     * $query->filterByApprovedStatus(array('min' => 12)); // WHERE approved_status > 12
     * </code>
     *
     * @param     mixed $approvedStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByApprovedStatus($approvedStatus = null, $comparison = null)
    {
        if (is_array($approvedStatus)) {
            $useMinMax = false;
            if (isset($approvedStatus['min'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS, $approvedStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($approvedStatus['max'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS, $approvedStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_APPROVED_STATUS, $approvedStatus, $comparison);
    }

    /**
     * Filter the query on the cancel_uid column
     *
     * Example usage:
     * <code>
     * $query->filterByCancelUid('fooValue');   // WHERE cancel_uid = 'fooValue'
     * $query->filterByCancelUid('%fooValue%', Criteria::LIKE); // WHERE cancel_uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cancelUid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByCancelUid($cancelUid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cancelUid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_CANCEL_UID, $cancelUid, $comparison);
    }

    /**
     * Filter the query on the cancel_sctime column
     *
     * Example usage:
     * <code>
     * $query->filterByCancelSctime('2011-03-14'); // WHERE cancel_sctime = '2011-03-14'
     * $query->filterByCancelSctime('now'); // WHERE cancel_sctime = '2011-03-14'
     * $query->filterByCancelSctime(array('max' => 'yesterday')); // WHERE cancel_sctime > '2011-03-13'
     * </code>
     *
     * @param     mixed $cancelSctime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByCancelSctime($cancelSctime = null, $comparison = null)
    {
        if (is_array($cancelSctime)) {
            $useMinMax = false;
            if (isset($cancelSctime['min'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME, $cancelSctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelSctime['max'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME, $cancelSctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_CANCEL_SCTIME, $cancelSctime, $comparison);
    }

    /**
     * Filter the query on the cancel_status column
     *
     * Example usage:
     * <code>
     * $query->filterByCancelStatus(1234); // WHERE cancel_status = 1234
     * $query->filterByCancelStatus(array(12, 34)); // WHERE cancel_status IN (12, 34)
     * $query->filterByCancelStatus(array('min' => 12)); // WHERE cancel_status > 12
     * </code>
     *
     * @param     mixed $cancelStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByCancelStatus($cancelStatus = null, $comparison = null)
    {
        if (is_array($cancelStatus)) {
            $useMinMax = false;
            if (isset($cancelStatus['min'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS, $cancelStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelStatus['max'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS, $cancelStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_CANCEL_STATUS, $cancelStatus, $comparison);
    }

    /**
     * Filter the query on the last_sctime column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSctime('2011-03-14'); // WHERE last_sctime = '2011-03-14'
     * $query->filterByLastSctime('now'); // WHERE last_sctime = '2011-03-14'
     * $query->filterByLastSctime(array('max' => 'yesterday')); // WHERE last_sctime > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastSctime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterByLastSctime($lastSctime = null, $comparison = null)
    {
        if (is_array($lastSctime)) {
            $useMinMax = false;
            if (isset($lastSctime['min'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME, $lastSctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSctime['max'])) {
                $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME, $lastSctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_LAST_SCTIME, $lastSctime, $comparison);
    }

    /**
     * Filter the query on the sano_ref column
     *
     * Example usage:
     * <code>
     * $query->filterBySanoRef('fooValue');   // WHERE sano_ref = 'fooValue'
     * $query->filterBySanoRef('%fooValue%', Criteria::LIKE); // WHERE sano_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sanoRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function filterBySanoRef($sanoRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_SANO_REF, $sanoRef, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTransferEwalletConfirm $aliTransferEwalletConfirm Object to remove from the list of results
     *
     * @return $this|ChildAliTransferEwalletConfirmQuery The current query, for fluid interface
     */
    public function prune($aliTransferEwalletConfirm = null)
    {
        if ($aliTransferEwalletConfirm) {
            $this->addUsingAlias(AliTransferEwalletConfirmTableMap::COL_ID, $aliTransferEwalletConfirm->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_transfer_ewallet_confirm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTransferEwalletConfirmTableMap::clearInstancePool();
            AliTransferEwalletConfirmTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferEwalletConfirmTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTransferEwalletConfirmTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTransferEwalletConfirmTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTransferEwalletConfirmTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTransferEwalletConfirmQuery
