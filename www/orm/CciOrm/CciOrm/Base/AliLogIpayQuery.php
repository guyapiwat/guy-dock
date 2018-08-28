<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliLogIpay as ChildAliLogIpay;
use CciOrm\CciOrm\AliLogIpayQuery as ChildAliLogIpayQuery;
use CciOrm\CciOrm\Map\AliLogIpayTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_log_ipay' table.
 *
 *
 *
 * @method     ChildAliLogIpayQuery orderByIpayorderid($order = Criteria::ASC) Order by the ipayorderid column
 * @method     ChildAliLogIpayQuery orderByInvNo($order = Criteria::ASC) Order by the inv_no column
 * @method     ChildAliLogIpayQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildAliLogIpayQuery orderByPayType($order = Criteria::ASC) Order by the pay_type column
 * @method     ChildAliLogIpayQuery orderByPayMethod($order = Criteria::ASC) Order by the pay_method column
 * @method     ChildAliLogIpayQuery orderByRespCode($order = Criteria::ASC) Order by the resp_code column
 * @method     ChildAliLogIpayQuery orderByRespDesc($order = Criteria::ASC) Order by the resp_desc column
 * @method     ChildAliLogIpayQuery orderByCouponStatus($order = Criteria::ASC) Order by the coupon_status column
 * @method     ChildAliLogIpayQuery orderByCouponSerial($order = Criteria::ASC) Order by the coupon_serial column
 * @method     ChildAliLogIpayQuery orderByCouponPassword($order = Criteria::ASC) Order by the coupon_password column
 * @method     ChildAliLogIpayQuery orderByCouponRef($order = Criteria::ASC) Order by the coupon_ref column
 * @method     ChildAliLogIpayQuery orderByBilltype($order = Criteria::ASC) Order by the billtype column
 *
 * @method     ChildAliLogIpayQuery groupByIpayorderid() Group by the ipayorderid column
 * @method     ChildAliLogIpayQuery groupByInvNo() Group by the inv_no column
 * @method     ChildAliLogIpayQuery groupByAmount() Group by the amount column
 * @method     ChildAliLogIpayQuery groupByPayType() Group by the pay_type column
 * @method     ChildAliLogIpayQuery groupByPayMethod() Group by the pay_method column
 * @method     ChildAliLogIpayQuery groupByRespCode() Group by the resp_code column
 * @method     ChildAliLogIpayQuery groupByRespDesc() Group by the resp_desc column
 * @method     ChildAliLogIpayQuery groupByCouponStatus() Group by the coupon_status column
 * @method     ChildAliLogIpayQuery groupByCouponSerial() Group by the coupon_serial column
 * @method     ChildAliLogIpayQuery groupByCouponPassword() Group by the coupon_password column
 * @method     ChildAliLogIpayQuery groupByCouponRef() Group by the coupon_ref column
 * @method     ChildAliLogIpayQuery groupByBilltype() Group by the billtype column
 *
 * @method     ChildAliLogIpayQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliLogIpayQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliLogIpayQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliLogIpayQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliLogIpayQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliLogIpayQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliLogIpay findOne(ConnectionInterface $con = null) Return the first ChildAliLogIpay matching the query
 * @method     ChildAliLogIpay findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliLogIpay matching the query, or a new ChildAliLogIpay object populated from the query conditions when no match is found
 *
 * @method     ChildAliLogIpay findOneByIpayorderid(string $ipayorderid) Return the first ChildAliLogIpay filtered by the ipayorderid column
 * @method     ChildAliLogIpay findOneByInvNo(string $inv_no) Return the first ChildAliLogIpay filtered by the inv_no column
 * @method     ChildAliLogIpay findOneByAmount(string $amount) Return the first ChildAliLogIpay filtered by the amount column
 * @method     ChildAliLogIpay findOneByPayType(string $pay_type) Return the first ChildAliLogIpay filtered by the pay_type column
 * @method     ChildAliLogIpay findOneByPayMethod(string $pay_method) Return the first ChildAliLogIpay filtered by the pay_method column
 * @method     ChildAliLogIpay findOneByRespCode(string $resp_code) Return the first ChildAliLogIpay filtered by the resp_code column
 * @method     ChildAliLogIpay findOneByRespDesc(string $resp_desc) Return the first ChildAliLogIpay filtered by the resp_desc column
 * @method     ChildAliLogIpay findOneByCouponStatus(string $coupon_status) Return the first ChildAliLogIpay filtered by the coupon_status column
 * @method     ChildAliLogIpay findOneByCouponSerial(string $coupon_serial) Return the first ChildAliLogIpay filtered by the coupon_serial column
 * @method     ChildAliLogIpay findOneByCouponPassword(string $coupon_password) Return the first ChildAliLogIpay filtered by the coupon_password column
 * @method     ChildAliLogIpay findOneByCouponRef(string $coupon_ref) Return the first ChildAliLogIpay filtered by the coupon_ref column
 * @method     ChildAliLogIpay findOneByBilltype(string $billtype) Return the first ChildAliLogIpay filtered by the billtype column *

 * @method     ChildAliLogIpay requirePk($key, ConnectionInterface $con = null) Return the ChildAliLogIpay by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOne(ConnectionInterface $con = null) Return the first ChildAliLogIpay matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogIpay requireOneByIpayorderid(string $ipayorderid) Return the first ChildAliLogIpay filtered by the ipayorderid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByInvNo(string $inv_no) Return the first ChildAliLogIpay filtered by the inv_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByAmount(string $amount) Return the first ChildAliLogIpay filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByPayType(string $pay_type) Return the first ChildAliLogIpay filtered by the pay_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByPayMethod(string $pay_method) Return the first ChildAliLogIpay filtered by the pay_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByRespCode(string $resp_code) Return the first ChildAliLogIpay filtered by the resp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByRespDesc(string $resp_desc) Return the first ChildAliLogIpay filtered by the resp_desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByCouponStatus(string $coupon_status) Return the first ChildAliLogIpay filtered by the coupon_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByCouponSerial(string $coupon_serial) Return the first ChildAliLogIpay filtered by the coupon_serial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByCouponPassword(string $coupon_password) Return the first ChildAliLogIpay filtered by the coupon_password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByCouponRef(string $coupon_ref) Return the first ChildAliLogIpay filtered by the coupon_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogIpay requireOneByBilltype(string $billtype) Return the first ChildAliLogIpay filtered by the billtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogIpay[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliLogIpay objects based on current ModelCriteria
 * @method     ChildAliLogIpay[]|ObjectCollection findByIpayorderid(string $ipayorderid) Return ChildAliLogIpay objects filtered by the ipayorderid column
 * @method     ChildAliLogIpay[]|ObjectCollection findByInvNo(string $inv_no) Return ChildAliLogIpay objects filtered by the inv_no column
 * @method     ChildAliLogIpay[]|ObjectCollection findByAmount(string $amount) Return ChildAliLogIpay objects filtered by the amount column
 * @method     ChildAliLogIpay[]|ObjectCollection findByPayType(string $pay_type) Return ChildAliLogIpay objects filtered by the pay_type column
 * @method     ChildAliLogIpay[]|ObjectCollection findByPayMethod(string $pay_method) Return ChildAliLogIpay objects filtered by the pay_method column
 * @method     ChildAliLogIpay[]|ObjectCollection findByRespCode(string $resp_code) Return ChildAliLogIpay objects filtered by the resp_code column
 * @method     ChildAliLogIpay[]|ObjectCollection findByRespDesc(string $resp_desc) Return ChildAliLogIpay objects filtered by the resp_desc column
 * @method     ChildAliLogIpay[]|ObjectCollection findByCouponStatus(string $coupon_status) Return ChildAliLogIpay objects filtered by the coupon_status column
 * @method     ChildAliLogIpay[]|ObjectCollection findByCouponSerial(string $coupon_serial) Return ChildAliLogIpay objects filtered by the coupon_serial column
 * @method     ChildAliLogIpay[]|ObjectCollection findByCouponPassword(string $coupon_password) Return ChildAliLogIpay objects filtered by the coupon_password column
 * @method     ChildAliLogIpay[]|ObjectCollection findByCouponRef(string $coupon_ref) Return ChildAliLogIpay objects filtered by the coupon_ref column
 * @method     ChildAliLogIpay[]|ObjectCollection findByBilltype(string $billtype) Return ChildAliLogIpay objects filtered by the billtype column
 * @method     ChildAliLogIpay[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliLogIpayQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliLogIpayQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliLogIpay', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliLogIpayQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliLogIpayQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliLogIpayQuery) {
            return $criteria;
        }
        $query = new ChildAliLogIpayQuery();
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
     * @return ChildAliLogIpay|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliLogIpay object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliLogIpay object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliLogIpay object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliLogIpay object has no primary key');
    }

    /**
     * Filter the query on the ipayorderid column
     *
     * Example usage:
     * <code>
     * $query->filterByIpayorderid('fooValue');   // WHERE ipayorderid = 'fooValue'
     * $query->filterByIpayorderid('%fooValue%', Criteria::LIKE); // WHERE ipayorderid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipayorderid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByIpayorderid($ipayorderid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipayorderid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_IPAYORDERID, $ipayorderid, $comparison);
    }

    /**
     * Filter the query on the inv_no column
     *
     * Example usage:
     * <code>
     * $query->filterByInvNo('fooValue');   // WHERE inv_no = 'fooValue'
     * $query->filterByInvNo('%fooValue%', Criteria::LIKE); // WHERE inv_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invNo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByInvNo($invNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invNo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_INV_NO, $invNo, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount('fooValue');   // WHERE amount = 'fooValue'
     * $query->filterByAmount('%fooValue%', Criteria::LIKE); // WHERE amount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $amount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($amount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByPayType($payType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_PAY_TYPE, $payType, $comparison);
    }

    /**
     * Filter the query on the pay_method column
     *
     * Example usage:
     * <code>
     * $query->filterByPayMethod('fooValue');   // WHERE pay_method = 'fooValue'
     * $query->filterByPayMethod('%fooValue%', Criteria::LIKE); // WHERE pay_method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payMethod The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByPayMethod($payMethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payMethod)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_PAY_METHOD, $payMethod, $comparison);
    }

    /**
     * Filter the query on the resp_code column
     *
     * Example usage:
     * <code>
     * $query->filterByRespCode('fooValue');   // WHERE resp_code = 'fooValue'
     * $query->filterByRespCode('%fooValue%', Criteria::LIKE); // WHERE resp_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $respCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByRespCode($respCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($respCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_RESP_CODE, $respCode, $comparison);
    }

    /**
     * Filter the query on the resp_desc column
     *
     * Example usage:
     * <code>
     * $query->filterByRespDesc('fooValue');   // WHERE resp_desc = 'fooValue'
     * $query->filterByRespDesc('%fooValue%', Criteria::LIKE); // WHERE resp_desc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $respDesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByRespDesc($respDesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($respDesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_RESP_DESC, $respDesc, $comparison);
    }

    /**
     * Filter the query on the coupon_status column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponStatus('fooValue');   // WHERE coupon_status = 'fooValue'
     * $query->filterByCouponStatus('%fooValue%', Criteria::LIKE); // WHERE coupon_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $couponStatus The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByCouponStatus($couponStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($couponStatus)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_COUPON_STATUS, $couponStatus, $comparison);
    }

    /**
     * Filter the query on the coupon_serial column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponSerial('fooValue');   // WHERE coupon_serial = 'fooValue'
     * $query->filterByCouponSerial('%fooValue%', Criteria::LIKE); // WHERE coupon_serial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $couponSerial The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByCouponSerial($couponSerial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($couponSerial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_COUPON_SERIAL, $couponSerial, $comparison);
    }

    /**
     * Filter the query on the coupon_password column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponPassword('fooValue');   // WHERE coupon_password = 'fooValue'
     * $query->filterByCouponPassword('%fooValue%', Criteria::LIKE); // WHERE coupon_password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $couponPassword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByCouponPassword($couponPassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($couponPassword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_COUPON_PASSWORD, $couponPassword, $comparison);
    }

    /**
     * Filter the query on the coupon_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponRef('fooValue');   // WHERE coupon_ref = 'fooValue'
     * $query->filterByCouponRef('%fooValue%', Criteria::LIKE); // WHERE coupon_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $couponRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByCouponRef($couponRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($couponRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_COUPON_REF, $couponRef, $comparison);
    }

    /**
     * Filter the query on the billtype column
     *
     * Example usage:
     * <code>
     * $query->filterByBilltype('fooValue');   // WHERE billtype = 'fooValue'
     * $query->filterByBilltype('%fooValue%', Criteria::LIKE); // WHERE billtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function filterByBilltype($billtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogIpayTableMap::COL_BILLTYPE, $billtype, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliLogIpay $aliLogIpay Object to remove from the list of results
     *
     * @return $this|ChildAliLogIpayQuery The current query, for fluid interface
     */
    public function prune($aliLogIpay = null)
    {
        if ($aliLogIpay) {
            throw new LogicException('AliLogIpay object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_log_ipay table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogIpayTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliLogIpayTableMap::clearInstancePool();
            AliLogIpayTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogIpayTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliLogIpayTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliLogIpayTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliLogIpayTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliLogIpayQuery
