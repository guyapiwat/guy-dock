<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCommission as ChildAliCommission;
use CciOrm\CciOrm\AliCommissionQuery as ChildAliCommissionQuery;
use CciOrm\CciOrm\Map\AliCommissionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_commission' table.
 *
 *
 *
 * @method     ChildAliCommissionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliCommissionQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliCommissionQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliCommissionQuery orderByAmbonus($order = Criteria::ASC) Order by the ambonus column
 * @method     ChildAliCommissionQuery orderByBmbonus($order = Criteria::ASC) Order by the bmbonus column
 * @method     ChildAliCommissionQuery orderByDmbonus($order = Criteria::ASC) Order by the dmbonus column
 * @method     ChildAliCommissionQuery orderByFmbonus($order = Criteria::ASC) Order by the fmbonus column
 * @method     ChildAliCommissionQuery orderByAto($order = Criteria::ASC) Order by the ato column
 * @method     ChildAliCommissionQuery orderByAto1($order = Criteria::ASC) Order by the ato1 column
 * @method     ChildAliCommissionQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliCommissionQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCommissionQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliCommissionQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliCommissionQuery orderByPay($order = Criteria::ASC) Order by the pay column
 * @method     ChildAliCommissionQuery orderBySanoEcom($order = Criteria::ASC) Order by the sano_ecom column
 * @method     ChildAliCommissionQuery orderBySanoAto($order = Criteria::ASC) Order by the sano_ato column
 * @method     ChildAliCommissionQuery orderBySanoEwallet($order = Criteria::ASC) Order by the sano_ewallet column
 * @method     ChildAliCommissionQuery orderByTax($order = Criteria::ASC) Order by the tax column
 *
 * @method     ChildAliCommissionQuery groupById() Group by the id column
 * @method     ChildAliCommissionQuery groupByMcode() Group by the mcode column
 * @method     ChildAliCommissionQuery groupByNameT() Group by the name_t column
 * @method     ChildAliCommissionQuery groupByAmbonus() Group by the ambonus column
 * @method     ChildAliCommissionQuery groupByBmbonus() Group by the bmbonus column
 * @method     ChildAliCommissionQuery groupByDmbonus() Group by the dmbonus column
 * @method     ChildAliCommissionQuery groupByFmbonus() Group by the fmbonus column
 * @method     ChildAliCommissionQuery groupByAto() Group by the ato column
 * @method     ChildAliCommissionQuery groupByAto1() Group by the ato1 column
 * @method     ChildAliCommissionQuery groupByTotal() Group by the total column
 * @method     ChildAliCommissionQuery groupByRcode() Group by the rcode column
 * @method     ChildAliCommissionQuery groupByFdate() Group by the fdate column
 * @method     ChildAliCommissionQuery groupByTdate() Group by the tdate column
 * @method     ChildAliCommissionQuery groupByPay() Group by the pay column
 * @method     ChildAliCommissionQuery groupBySanoEcom() Group by the sano_ecom column
 * @method     ChildAliCommissionQuery groupBySanoAto() Group by the sano_ato column
 * @method     ChildAliCommissionQuery groupBySanoEwallet() Group by the sano_ewallet column
 * @method     ChildAliCommissionQuery groupByTax() Group by the tax column
 *
 * @method     ChildAliCommissionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCommissionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCommissionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCommissionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCommissionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCommissionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCommission findOne(ConnectionInterface $con = null) Return the first ChildAliCommission matching the query
 * @method     ChildAliCommission findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCommission matching the query, or a new ChildAliCommission object populated from the query conditions when no match is found
 *
 * @method     ChildAliCommission findOneById(int $id) Return the first ChildAliCommission filtered by the id column
 * @method     ChildAliCommission findOneByMcode(string $mcode) Return the first ChildAliCommission filtered by the mcode column
 * @method     ChildAliCommission findOneByNameT(string $name_t) Return the first ChildAliCommission filtered by the name_t column
 * @method     ChildAliCommission findOneByAmbonus(string $ambonus) Return the first ChildAliCommission filtered by the ambonus column
 * @method     ChildAliCommission findOneByBmbonus(string $bmbonus) Return the first ChildAliCommission filtered by the bmbonus column
 * @method     ChildAliCommission findOneByDmbonus(string $dmbonus) Return the first ChildAliCommission filtered by the dmbonus column
 * @method     ChildAliCommission findOneByFmbonus(string $fmbonus) Return the first ChildAliCommission filtered by the fmbonus column
 * @method     ChildAliCommission findOneByAto(string $ato) Return the first ChildAliCommission filtered by the ato column
 * @method     ChildAliCommission findOneByAto1(string $ato1) Return the first ChildAliCommission filtered by the ato1 column
 * @method     ChildAliCommission findOneByTotal(string $total) Return the first ChildAliCommission filtered by the total column
 * @method     ChildAliCommission findOneByRcode(int $rcode) Return the first ChildAliCommission filtered by the rcode column
 * @method     ChildAliCommission findOneByFdate(string $fdate) Return the first ChildAliCommission filtered by the fdate column
 * @method     ChildAliCommission findOneByTdate(string $tdate) Return the first ChildAliCommission filtered by the tdate column
 * @method     ChildAliCommission findOneByPay(int $pay) Return the first ChildAliCommission filtered by the pay column
 * @method     ChildAliCommission findOneBySanoEcom(string $sano_ecom) Return the first ChildAliCommission filtered by the sano_ecom column
 * @method     ChildAliCommission findOneBySanoAto(string $sano_ato) Return the first ChildAliCommission filtered by the sano_ato column
 * @method     ChildAliCommission findOneBySanoEwallet(string $sano_ewallet) Return the first ChildAliCommission filtered by the sano_ewallet column
 * @method     ChildAliCommission findOneByTax(string $tax) Return the first ChildAliCommission filtered by the tax column *

 * @method     ChildAliCommission requirePk($key, ConnectionInterface $con = null) Return the ChildAliCommission by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOne(ConnectionInterface $con = null) Return the first ChildAliCommission matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCommission requireOneById(int $id) Return the first ChildAliCommission filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByMcode(string $mcode) Return the first ChildAliCommission filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByNameT(string $name_t) Return the first ChildAliCommission filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByAmbonus(string $ambonus) Return the first ChildAliCommission filtered by the ambonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByBmbonus(string $bmbonus) Return the first ChildAliCommission filtered by the bmbonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByDmbonus(string $dmbonus) Return the first ChildAliCommission filtered by the dmbonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByFmbonus(string $fmbonus) Return the first ChildAliCommission filtered by the fmbonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByAto(string $ato) Return the first ChildAliCommission filtered by the ato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByAto1(string $ato1) Return the first ChildAliCommission filtered by the ato1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByTotal(string $total) Return the first ChildAliCommission filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByRcode(int $rcode) Return the first ChildAliCommission filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByFdate(string $fdate) Return the first ChildAliCommission filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByTdate(string $tdate) Return the first ChildAliCommission filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByPay(int $pay) Return the first ChildAliCommission filtered by the pay column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneBySanoEcom(string $sano_ecom) Return the first ChildAliCommission filtered by the sano_ecom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneBySanoAto(string $sano_ato) Return the first ChildAliCommission filtered by the sano_ato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneBySanoEwallet(string $sano_ewallet) Return the first ChildAliCommission filtered by the sano_ewallet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommission requireOneByTax(string $tax) Return the first ChildAliCommission filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCommission[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCommission objects based on current ModelCriteria
 * @method     ChildAliCommission[]|ObjectCollection findById(int $id) Return ChildAliCommission objects filtered by the id column
 * @method     ChildAliCommission[]|ObjectCollection findByMcode(string $mcode) Return ChildAliCommission objects filtered by the mcode column
 * @method     ChildAliCommission[]|ObjectCollection findByNameT(string $name_t) Return ChildAliCommission objects filtered by the name_t column
 * @method     ChildAliCommission[]|ObjectCollection findByAmbonus(string $ambonus) Return ChildAliCommission objects filtered by the ambonus column
 * @method     ChildAliCommission[]|ObjectCollection findByBmbonus(string $bmbonus) Return ChildAliCommission objects filtered by the bmbonus column
 * @method     ChildAliCommission[]|ObjectCollection findByDmbonus(string $dmbonus) Return ChildAliCommission objects filtered by the dmbonus column
 * @method     ChildAliCommission[]|ObjectCollection findByFmbonus(string $fmbonus) Return ChildAliCommission objects filtered by the fmbonus column
 * @method     ChildAliCommission[]|ObjectCollection findByAto(string $ato) Return ChildAliCommission objects filtered by the ato column
 * @method     ChildAliCommission[]|ObjectCollection findByAto1(string $ato1) Return ChildAliCommission objects filtered by the ato1 column
 * @method     ChildAliCommission[]|ObjectCollection findByTotal(string $total) Return ChildAliCommission objects filtered by the total column
 * @method     ChildAliCommission[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCommission objects filtered by the rcode column
 * @method     ChildAliCommission[]|ObjectCollection findByFdate(string $fdate) Return ChildAliCommission objects filtered by the fdate column
 * @method     ChildAliCommission[]|ObjectCollection findByTdate(string $tdate) Return ChildAliCommission objects filtered by the tdate column
 * @method     ChildAliCommission[]|ObjectCollection findByPay(int $pay) Return ChildAliCommission objects filtered by the pay column
 * @method     ChildAliCommission[]|ObjectCollection findBySanoEcom(string $sano_ecom) Return ChildAliCommission objects filtered by the sano_ecom column
 * @method     ChildAliCommission[]|ObjectCollection findBySanoAto(string $sano_ato) Return ChildAliCommission objects filtered by the sano_ato column
 * @method     ChildAliCommission[]|ObjectCollection findBySanoEwallet(string $sano_ewallet) Return ChildAliCommission objects filtered by the sano_ewallet column
 * @method     ChildAliCommission[]|ObjectCollection findByTax(string $tax) Return ChildAliCommission objects filtered by the tax column
 * @method     ChildAliCommission[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCommissionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCommissionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCommission', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCommissionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCommissionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCommissionQuery) {
            return $criteria;
        }
        $query = new ChildAliCommissionQuery();
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
     * @return ChildAliCommission|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCommissionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCommissionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCommission A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, name_t, ambonus, bmbonus, dmbonus, fmbonus, ato, ato1, total, rcode, fdate, tdate, pay, sano_ecom, sano_ato, sano_ewallet, tax FROM ali_commission WHERE id = :p0';
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
            /** @var ChildAliCommission $obj */
            $obj = new ChildAliCommission();
            $obj->hydrate($row);
            AliCommissionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCommission|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCommissionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCommissionTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the name_t column
     *
     * Example usage:
     * <code>
     * $query->filterByNameT('fooValue');   // WHERE name_t = 'fooValue'
     * $query->filterByNameT('%fooValue%', Criteria::LIKE); // WHERE name_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the ambonus column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbonus(1234); // WHERE ambonus = 1234
     * $query->filterByAmbonus(array(12, 34)); // WHERE ambonus IN (12, 34)
     * $query->filterByAmbonus(array('min' => 12)); // WHERE ambonus > 12
     * </code>
     *
     * @param     mixed $ambonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByAmbonus($ambonus = null, $comparison = null)
    {
        if (is_array($ambonus)) {
            $useMinMax = false;
            if (isset($ambonus['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_AMBONUS, $ambonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambonus['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_AMBONUS, $ambonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_AMBONUS, $ambonus, $comparison);
    }

    /**
     * Filter the query on the bmbonus column
     *
     * Example usage:
     * <code>
     * $query->filterByBmbonus(1234); // WHERE bmbonus = 1234
     * $query->filterByBmbonus(array(12, 34)); // WHERE bmbonus IN (12, 34)
     * $query->filterByBmbonus(array('min' => 12)); // WHERE bmbonus > 12
     * </code>
     *
     * @param     mixed $bmbonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByBmbonus($bmbonus = null, $comparison = null)
    {
        if (is_array($bmbonus)) {
            $useMinMax = false;
            if (isset($bmbonus['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_BMBONUS, $bmbonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bmbonus['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_BMBONUS, $bmbonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_BMBONUS, $bmbonus, $comparison);
    }

    /**
     * Filter the query on the dmbonus column
     *
     * Example usage:
     * <code>
     * $query->filterByDmbonus(1234); // WHERE dmbonus = 1234
     * $query->filterByDmbonus(array(12, 34)); // WHERE dmbonus IN (12, 34)
     * $query->filterByDmbonus(array('min' => 12)); // WHERE dmbonus > 12
     * </code>
     *
     * @param     mixed $dmbonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByDmbonus($dmbonus = null, $comparison = null)
    {
        if (is_array($dmbonus)) {
            $useMinMax = false;
            if (isset($dmbonus['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_DMBONUS, $dmbonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dmbonus['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_DMBONUS, $dmbonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_DMBONUS, $dmbonus, $comparison);
    }

    /**
     * Filter the query on the fmbonus column
     *
     * Example usage:
     * <code>
     * $query->filterByFmbonus(1234); // WHERE fmbonus = 1234
     * $query->filterByFmbonus(array(12, 34)); // WHERE fmbonus IN (12, 34)
     * $query->filterByFmbonus(array('min' => 12)); // WHERE fmbonus > 12
     * </code>
     *
     * @param     mixed $fmbonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByFmbonus($fmbonus = null, $comparison = null)
    {
        if (is_array($fmbonus)) {
            $useMinMax = false;
            if (isset($fmbonus['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_FMBONUS, $fmbonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fmbonus['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_FMBONUS, $fmbonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_FMBONUS, $fmbonus, $comparison);
    }

    /**
     * Filter the query on the ato column
     *
     * Example usage:
     * <code>
     * $query->filterByAto(1234); // WHERE ato = 1234
     * $query->filterByAto(array(12, 34)); // WHERE ato IN (12, 34)
     * $query->filterByAto(array('min' => 12)); // WHERE ato > 12
     * </code>
     *
     * @param     mixed $ato The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByAto($ato = null, $comparison = null)
    {
        if (is_array($ato)) {
            $useMinMax = false;
            if (isset($ato['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_ATO, $ato['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ato['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_ATO, $ato['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_ATO, $ato, $comparison);
    }

    /**
     * Filter the query on the ato1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAto1(1234); // WHERE ato1 = 1234
     * $query->filterByAto1(array(12, 34)); // WHERE ato1 IN (12, 34)
     * $query->filterByAto1(array('min' => 12)); // WHERE ato1 > 12
     * </code>
     *
     * @param     mixed $ato1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByAto1($ato1 = null, $comparison = null)
    {
        if (is_array($ato1)) {
            $useMinMax = false;
            if (isset($ato1['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_ATO1, $ato1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ato1['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_ATO1, $ato1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_ATO1, $ato1, $comparison);
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
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the pay column
     *
     * Example usage:
     * <code>
     * $query->filterByPay(1234); // WHERE pay = 1234
     * $query->filterByPay(array(12, 34)); // WHERE pay IN (12, 34)
     * $query->filterByPay(array('min' => 12)); // WHERE pay > 12
     * </code>
     *
     * @param     mixed $pay The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByPay($pay = null, $comparison = null)
    {
        if (is_array($pay)) {
            $useMinMax = false;
            if (isset($pay['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_PAY, $pay['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pay['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_PAY, $pay['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_PAY, $pay, $comparison);
    }

    /**
     * Filter the query on the sano_ecom column
     *
     * Example usage:
     * <code>
     * $query->filterBySanoEcom('fooValue');   // WHERE sano_ecom = 'fooValue'
     * $query->filterBySanoEcom('%fooValue%', Criteria::LIKE); // WHERE sano_ecom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sanoEcom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterBySanoEcom($sanoEcom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoEcom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_SANO_ECOM, $sanoEcom, $comparison);
    }

    /**
     * Filter the query on the sano_ato column
     *
     * Example usage:
     * <code>
     * $query->filterBySanoAto('fooValue');   // WHERE sano_ato = 'fooValue'
     * $query->filterBySanoAto('%fooValue%', Criteria::LIKE); // WHERE sano_ato LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sanoAto The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterBySanoAto($sanoAto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoAto)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_SANO_ATO, $sanoAto, $comparison);
    }

    /**
     * Filter the query on the sano_ewallet column
     *
     * Example usage:
     * <code>
     * $query->filterBySanoEwallet('fooValue');   // WHERE sano_ewallet = 'fooValue'
     * $query->filterBySanoEwallet('%fooValue%', Criteria::LIKE); // WHERE sano_ewallet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sanoEwallet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterBySanoEwallet($sanoEwallet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoEwallet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_SANO_EWALLET, $sanoEwallet, $comparison);
    }

    /**
     * Filter the query on the tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTax(1234); // WHERE tax = 1234
     * $query->filterByTax(array(12, 34)); // WHERE tax IN (12, 34)
     * $query->filterByTax(array('min' => 12)); // WHERE tax > 12
     * </code>
     *
     * @param     mixed $tax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliCommissionTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionTableMap::COL_TAX, $tax, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCommission $aliCommission Object to remove from the list of results
     *
     * @return $this|ChildAliCommissionQuery The current query, for fluid interface
     */
    public function prune($aliCommission = null)
    {
        if ($aliCommission) {
            $this->addUsingAlias(AliCommissionTableMap::COL_ID, $aliCommission->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_commission table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCommissionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCommissionTableMap::clearInstancePool();
            AliCommissionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCommissionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCommissionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCommissionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCommissionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCommissionQuery
