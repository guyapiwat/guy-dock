<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliLogKtc as ChildAliLogKtc;
use CciOrm\CciOrm\AliLogKtcQuery as ChildAliLogKtcQuery;
use CciOrm\CciOrm\Map\AliLogKtcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_log_ktc' table.
 *
 *
 *
 * @method     ChildAliLogKtcQuery orderByRef1($order = Criteria::ASC) Order by the ref1 column
 * @method     ChildAliLogKtcQuery orderBySrc($order = Criteria::ASC) Order by the src column
 * @method     ChildAliLogKtcQuery orderByPrc($order = Criteria::ASC) Order by the prc column
 * @method     ChildAliLogKtcQuery orderByOrd($order = Criteria::ASC) Order by the ord column
 * @method     ChildAliLogKtcQuery orderByHolder($order = Criteria::ASC) Order by the holder column
 * @method     ChildAliLogKtcQuery orderBySuccesscode($order = Criteria::ASC) Order by the successcode column
 * @method     ChildAliLogKtcQuery orderByRef2($order = Criteria::ASC) Order by the ref2 column
 * @method     ChildAliLogKtcQuery orderByPayref($order = Criteria::ASC) Order by the payRef column
 * @method     ChildAliLogKtcQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 * @method     ChildAliLogKtcQuery orderByCur($order = Criteria::ASC) Order by the cur column
 * @method     ChildAliLogKtcQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliLogKtcQuery orderByAuthid($order = Criteria::ASC) Order by the authId column
 * @method     ChildAliLogKtcQuery orderByPayerauth($order = Criteria::ASC) Order by the payerAuth column
 * @method     ChildAliLogKtcQuery orderBySourcelp($order = Criteria::ASC) Order by the sourcelp column
 *
 * @method     ChildAliLogKtcQuery groupByRef1() Group by the ref1 column
 * @method     ChildAliLogKtcQuery groupBySrc() Group by the src column
 * @method     ChildAliLogKtcQuery groupByPrc() Group by the prc column
 * @method     ChildAliLogKtcQuery groupByOrd() Group by the ord column
 * @method     ChildAliLogKtcQuery groupByHolder() Group by the holder column
 * @method     ChildAliLogKtcQuery groupBySuccesscode() Group by the successcode column
 * @method     ChildAliLogKtcQuery groupByRef2() Group by the ref2 column
 * @method     ChildAliLogKtcQuery groupByPayref() Group by the payRef column
 * @method     ChildAliLogKtcQuery groupByAmt() Group by the amt column
 * @method     ChildAliLogKtcQuery groupByCur() Group by the cur column
 * @method     ChildAliLogKtcQuery groupByRemark() Group by the remark column
 * @method     ChildAliLogKtcQuery groupByAuthid() Group by the authId column
 * @method     ChildAliLogKtcQuery groupByPayerauth() Group by the payerAuth column
 * @method     ChildAliLogKtcQuery groupBySourcelp() Group by the sourcelp column
 *
 * @method     ChildAliLogKtcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliLogKtcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliLogKtcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliLogKtcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliLogKtcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliLogKtcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliLogKtc findOne(ConnectionInterface $con = null) Return the first ChildAliLogKtc matching the query
 * @method     ChildAliLogKtc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliLogKtc matching the query, or a new ChildAliLogKtc object populated from the query conditions when no match is found
 *
 * @method     ChildAliLogKtc findOneByRef1(string $ref1) Return the first ChildAliLogKtc filtered by the ref1 column
 * @method     ChildAliLogKtc findOneBySrc(string $src) Return the first ChildAliLogKtc filtered by the src column
 * @method     ChildAliLogKtc findOneByPrc(string $prc) Return the first ChildAliLogKtc filtered by the prc column
 * @method     ChildAliLogKtc findOneByOrd(string $ord) Return the first ChildAliLogKtc filtered by the ord column
 * @method     ChildAliLogKtc findOneByHolder(string $holder) Return the first ChildAliLogKtc filtered by the holder column
 * @method     ChildAliLogKtc findOneBySuccesscode(string $successcode) Return the first ChildAliLogKtc filtered by the successcode column
 * @method     ChildAliLogKtc findOneByRef2(string $ref2) Return the first ChildAliLogKtc filtered by the ref2 column
 * @method     ChildAliLogKtc findOneByPayref(string $payRef) Return the first ChildAliLogKtc filtered by the payRef column
 * @method     ChildAliLogKtc findOneByAmt(string $amt) Return the first ChildAliLogKtc filtered by the amt column
 * @method     ChildAliLogKtc findOneByCur(string $cur) Return the first ChildAliLogKtc filtered by the cur column
 * @method     ChildAliLogKtc findOneByRemark(string $remark) Return the first ChildAliLogKtc filtered by the remark column
 * @method     ChildAliLogKtc findOneByAuthid(string $authId) Return the first ChildAliLogKtc filtered by the authId column
 * @method     ChildAliLogKtc findOneByPayerauth(string $payerAuth) Return the first ChildAliLogKtc filtered by the payerAuth column
 * @method     ChildAliLogKtc findOneBySourcelp(string $sourcelp) Return the first ChildAliLogKtc filtered by the sourcelp column *

 * @method     ChildAliLogKtc requirePk($key, ConnectionInterface $con = null) Return the ChildAliLogKtc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOne(ConnectionInterface $con = null) Return the first ChildAliLogKtc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogKtc requireOneByRef1(string $ref1) Return the first ChildAliLogKtc filtered by the ref1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneBySrc(string $src) Return the first ChildAliLogKtc filtered by the src column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByPrc(string $prc) Return the first ChildAliLogKtc filtered by the prc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByOrd(string $ord) Return the first ChildAliLogKtc filtered by the ord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByHolder(string $holder) Return the first ChildAliLogKtc filtered by the holder column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneBySuccesscode(string $successcode) Return the first ChildAliLogKtc filtered by the successcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByRef2(string $ref2) Return the first ChildAliLogKtc filtered by the ref2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByPayref(string $payRef) Return the first ChildAliLogKtc filtered by the payRef column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByAmt(string $amt) Return the first ChildAliLogKtc filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByCur(string $cur) Return the first ChildAliLogKtc filtered by the cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByRemark(string $remark) Return the first ChildAliLogKtc filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByAuthid(string $authId) Return the first ChildAliLogKtc filtered by the authId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneByPayerauth(string $payerAuth) Return the first ChildAliLogKtc filtered by the payerAuth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLogKtc requireOneBySourcelp(string $sourcelp) Return the first ChildAliLogKtc filtered by the sourcelp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLogKtc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliLogKtc objects based on current ModelCriteria
 * @method     ChildAliLogKtc[]|ObjectCollection findByRef1(string $ref1) Return ChildAliLogKtc objects filtered by the ref1 column
 * @method     ChildAliLogKtc[]|ObjectCollection findBySrc(string $src) Return ChildAliLogKtc objects filtered by the src column
 * @method     ChildAliLogKtc[]|ObjectCollection findByPrc(string $prc) Return ChildAliLogKtc objects filtered by the prc column
 * @method     ChildAliLogKtc[]|ObjectCollection findByOrd(string $ord) Return ChildAliLogKtc objects filtered by the ord column
 * @method     ChildAliLogKtc[]|ObjectCollection findByHolder(string $holder) Return ChildAliLogKtc objects filtered by the holder column
 * @method     ChildAliLogKtc[]|ObjectCollection findBySuccesscode(string $successcode) Return ChildAliLogKtc objects filtered by the successcode column
 * @method     ChildAliLogKtc[]|ObjectCollection findByRef2(string $ref2) Return ChildAliLogKtc objects filtered by the ref2 column
 * @method     ChildAliLogKtc[]|ObjectCollection findByPayref(string $payRef) Return ChildAliLogKtc objects filtered by the payRef column
 * @method     ChildAliLogKtc[]|ObjectCollection findByAmt(string $amt) Return ChildAliLogKtc objects filtered by the amt column
 * @method     ChildAliLogKtc[]|ObjectCollection findByCur(string $cur) Return ChildAliLogKtc objects filtered by the cur column
 * @method     ChildAliLogKtc[]|ObjectCollection findByRemark(string $remark) Return ChildAliLogKtc objects filtered by the remark column
 * @method     ChildAliLogKtc[]|ObjectCollection findByAuthid(string $authId) Return ChildAliLogKtc objects filtered by the authId column
 * @method     ChildAliLogKtc[]|ObjectCollection findByPayerauth(string $payerAuth) Return ChildAliLogKtc objects filtered by the payerAuth column
 * @method     ChildAliLogKtc[]|ObjectCollection findBySourcelp(string $sourcelp) Return ChildAliLogKtc objects filtered by the sourcelp column
 * @method     ChildAliLogKtc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliLogKtcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliLogKtcQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliLogKtc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliLogKtcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliLogKtcQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliLogKtcQuery) {
            return $criteria;
        }
        $query = new ChildAliLogKtcQuery();
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
     * @return ChildAliLogKtc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliLogKtc object has no primary key');
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
        throw new LogicException('The AliLogKtc object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliLogKtc object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliLogKtc object has no primary key');
    }

    /**
     * Filter the query on the ref1 column
     *
     * Example usage:
     * <code>
     * $query->filterByRef1('fooValue');   // WHERE ref1 = 'fooValue'
     * $query->filterByRef1('%fooValue%', Criteria::LIKE); // WHERE ref1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ref1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByRef1($ref1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ref1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_REF1, $ref1, $comparison);
    }

    /**
     * Filter the query on the src column
     *
     * Example usage:
     * <code>
     * $query->filterBySrc('fooValue');   // WHERE src = 'fooValue'
     * $query->filterBySrc('%fooValue%', Criteria::LIKE); // WHERE src LIKE '%fooValue%'
     * </code>
     *
     * @param     string $src The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterBySrc($src = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($src)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_SRC, $src, $comparison);
    }

    /**
     * Filter the query on the prc column
     *
     * Example usage:
     * <code>
     * $query->filterByPrc('fooValue');   // WHERE prc = 'fooValue'
     * $query->filterByPrc('%fooValue%', Criteria::LIKE); // WHERE prc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByPrc($prc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_PRC, $prc, $comparison);
    }

    /**
     * Filter the query on the ord column
     *
     * Example usage:
     * <code>
     * $query->filterByOrd('fooValue');   // WHERE ord = 'fooValue'
     * $query->filterByOrd('%fooValue%', Criteria::LIKE); // WHERE ord LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ord The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByOrd($ord = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ord)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_ORD, $ord, $comparison);
    }

    /**
     * Filter the query on the holder column
     *
     * Example usage:
     * <code>
     * $query->filterByHolder('fooValue');   // WHERE holder = 'fooValue'
     * $query->filterByHolder('%fooValue%', Criteria::LIKE); // WHERE holder LIKE '%fooValue%'
     * </code>
     *
     * @param     string $holder The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByHolder($holder = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($holder)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_HOLDER, $holder, $comparison);
    }

    /**
     * Filter the query on the successcode column
     *
     * Example usage:
     * <code>
     * $query->filterBySuccesscode('fooValue');   // WHERE successcode = 'fooValue'
     * $query->filterBySuccesscode('%fooValue%', Criteria::LIKE); // WHERE successcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $successcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterBySuccesscode($successcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($successcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_SUCCESSCODE, $successcode, $comparison);
    }

    /**
     * Filter the query on the ref2 column
     *
     * Example usage:
     * <code>
     * $query->filterByRef2('fooValue');   // WHERE ref2 = 'fooValue'
     * $query->filterByRef2('%fooValue%', Criteria::LIKE); // WHERE ref2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ref2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByRef2($ref2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ref2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_REF2, $ref2, $comparison);
    }

    /**
     * Filter the query on the payRef column
     *
     * Example usage:
     * <code>
     * $query->filterByPayref('fooValue');   // WHERE payRef = 'fooValue'
     * $query->filterByPayref('%fooValue%', Criteria::LIKE); // WHERE payRef LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payref The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByPayref($payref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_PAYREF, $payref, $comparison);
    }

    /**
     * Filter the query on the amt column
     *
     * Example usage:
     * <code>
     * $query->filterByAmt('fooValue');   // WHERE amt = 'fooValue'
     * $query->filterByAmt('%fooValue%', Criteria::LIKE); // WHERE amt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $amt The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($amt)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_AMT, $amt, $comparison);
    }

    /**
     * Filter the query on the cur column
     *
     * Example usage:
     * <code>
     * $query->filterByCur('fooValue');   // WHERE cur = 'fooValue'
     * $query->filterByCur('%fooValue%', Criteria::LIKE); // WHERE cur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByCur($cur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_CUR, $cur, $comparison);
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
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_REMARK, $remark, $comparison);
    }

    /**
     * Filter the query on the authId column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthid('fooValue');   // WHERE authId = 'fooValue'
     * $query->filterByAuthid('%fooValue%', Criteria::LIKE); // WHERE authId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByAuthid($authid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_AUTHID, $authid, $comparison);
    }

    /**
     * Filter the query on the payerAuth column
     *
     * Example usage:
     * <code>
     * $query->filterByPayerauth('fooValue');   // WHERE payerAuth = 'fooValue'
     * $query->filterByPayerauth('%fooValue%', Criteria::LIKE); // WHERE payerAuth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payerauth The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterByPayerauth($payerauth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payerauth)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_PAYERAUTH, $payerauth, $comparison);
    }

    /**
     * Filter the query on the sourcelp column
     *
     * Example usage:
     * <code>
     * $query->filterBySourcelp('fooValue');   // WHERE sourcelp = 'fooValue'
     * $query->filterBySourcelp('%fooValue%', Criteria::LIKE); // WHERE sourcelp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sourcelp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function filterBySourcelp($sourcelp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sourcelp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLogKtcTableMap::COL_SOURCELP, $sourcelp, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliLogKtc $aliLogKtc Object to remove from the list of results
     *
     * @return $this|ChildAliLogKtcQuery The current query, for fluid interface
     */
    public function prune($aliLogKtc = null)
    {
        if ($aliLogKtc) {
            throw new LogicException('AliLogKtc object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_log_ktc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogKtcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliLogKtcTableMap::clearInstancePool();
            AliLogKtcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogKtcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliLogKtcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliLogKtcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliLogKtcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliLogKtcQuery
