<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliHolddesc as ChildAliHolddesc;
use CciOrm\CciOrm\AliHolddescQuery as ChildAliHolddescQuery;
use CciOrm\CciOrm\Map\AliHolddescTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_holddesc' table.
 *
 *
 *
 * @method     ChildAliHolddescQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliHolddescQuery orderByHono($order = Criteria::ASC) Order by the hono column
 * @method     ChildAliHolddescQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliHolddescQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliHolddescQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliHolddescQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliHolddescQuery orderByBv($order = Criteria::ASC) Order by the bv column
 * @method     ChildAliHolddescQuery orderByFv($order = Criteria::ASC) Order by the fv column
 * @method     ChildAliHolddescQuery orderBySppv($order = Criteria::ASC) Order by the sppv column
 * @method     ChildAliHolddescQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliHolddescQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 * @method     ChildAliHolddescQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliHolddescQuery orderByUidbase($order = Criteria::ASC) Order by the uidbase column
 * @method     ChildAliHolddescQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliHolddescQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliHolddescQuery orderByVat($order = Criteria::ASC) Order by the vat column
 *
 * @method     ChildAliHolddescQuery groupById() Group by the id column
 * @method     ChildAliHolddescQuery groupByHono() Group by the hono column
 * @method     ChildAliHolddescQuery groupByPcode() Group by the pcode column
 * @method     ChildAliHolddescQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliHolddescQuery groupByPrice() Group by the price column
 * @method     ChildAliHolddescQuery groupByPv() Group by the pv column
 * @method     ChildAliHolddescQuery groupByBv() Group by the bv column
 * @method     ChildAliHolddescQuery groupByFv() Group by the fv column
 * @method     ChildAliHolddescQuery groupBySppv() Group by the sppv column
 * @method     ChildAliHolddescQuery groupByQty() Group by the qty column
 * @method     ChildAliHolddescQuery groupByAmt() Group by the amt column
 * @method     ChildAliHolddescQuery groupByBprice() Group by the bprice column
 * @method     ChildAliHolddescQuery groupByUidbase() Group by the uidbase column
 * @method     ChildAliHolddescQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliHolddescQuery groupByCrate() Group by the crate column
 * @method     ChildAliHolddescQuery groupByVat() Group by the vat column
 *
 * @method     ChildAliHolddescQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliHolddescQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliHolddescQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliHolddescQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliHolddescQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliHolddescQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliHolddesc findOne(ConnectionInterface $con = null) Return the first ChildAliHolddesc matching the query
 * @method     ChildAliHolddesc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliHolddesc matching the query, or a new ChildAliHolddesc object populated from the query conditions when no match is found
 *
 * @method     ChildAliHolddesc findOneById(int $id) Return the first ChildAliHolddesc filtered by the id column
 * @method     ChildAliHolddesc findOneByHono(int $hono) Return the first ChildAliHolddesc filtered by the hono column
 * @method     ChildAliHolddesc findOneByPcode(string $pcode) Return the first ChildAliHolddesc filtered by the pcode column
 * @method     ChildAliHolddesc findOneByPdesc(string $pdesc) Return the first ChildAliHolddesc filtered by the pdesc column
 * @method     ChildAliHolddesc findOneByPrice(string $price) Return the first ChildAliHolddesc filtered by the price column
 * @method     ChildAliHolddesc findOneByPv(string $pv) Return the first ChildAliHolddesc filtered by the pv column
 * @method     ChildAliHolddesc findOneByBv(string $bv) Return the first ChildAliHolddesc filtered by the bv column
 * @method     ChildAliHolddesc findOneByFv(string $fv) Return the first ChildAliHolddesc filtered by the fv column
 * @method     ChildAliHolddesc findOneBySppv(string $sppv) Return the first ChildAliHolddesc filtered by the sppv column
 * @method     ChildAliHolddesc findOneByQty(string $qty) Return the first ChildAliHolddesc filtered by the qty column
 * @method     ChildAliHolddesc findOneByAmt(string $amt) Return the first ChildAliHolddesc filtered by the amt column
 * @method     ChildAliHolddesc findOneByBprice(string $bprice) Return the first ChildAliHolddesc filtered by the bprice column
 * @method     ChildAliHolddesc findOneByUidbase(string $uidbase) Return the first ChildAliHolddesc filtered by the uidbase column
 * @method     ChildAliHolddesc findOneByLocationbase(int $locationbase) Return the first ChildAliHolddesc filtered by the locationbase column
 * @method     ChildAliHolddesc findOneByCrate(string $crate) Return the first ChildAliHolddesc filtered by the crate column
 * @method     ChildAliHolddesc findOneByVat(int $vat) Return the first ChildAliHolddesc filtered by the vat column *

 * @method     ChildAliHolddesc requirePk($key, ConnectionInterface $con = null) Return the ChildAliHolddesc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOne(ConnectionInterface $con = null) Return the first ChildAliHolddesc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliHolddesc requireOneById(int $id) Return the first ChildAliHolddesc filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByHono(int $hono) Return the first ChildAliHolddesc filtered by the hono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByPcode(string $pcode) Return the first ChildAliHolddesc filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByPdesc(string $pdesc) Return the first ChildAliHolddesc filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByPrice(string $price) Return the first ChildAliHolddesc filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByPv(string $pv) Return the first ChildAliHolddesc filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByBv(string $bv) Return the first ChildAliHolddesc filtered by the bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByFv(string $fv) Return the first ChildAliHolddesc filtered by the fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneBySppv(string $sppv) Return the first ChildAliHolddesc filtered by the sppv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByQty(string $qty) Return the first ChildAliHolddesc filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByAmt(string $amt) Return the first ChildAliHolddesc filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByBprice(string $bprice) Return the first ChildAliHolddesc filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByUidbase(string $uidbase) Return the first ChildAliHolddesc filtered by the uidbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByLocationbase(int $locationbase) Return the first ChildAliHolddesc filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByCrate(string $crate) Return the first ChildAliHolddesc filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHolddesc requireOneByVat(int $vat) Return the first ChildAliHolddesc filtered by the vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliHolddesc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliHolddesc objects based on current ModelCriteria
 * @method     ChildAliHolddesc[]|ObjectCollection findById(int $id) Return ChildAliHolddesc objects filtered by the id column
 * @method     ChildAliHolddesc[]|ObjectCollection findByHono(int $hono) Return ChildAliHolddesc objects filtered by the hono column
 * @method     ChildAliHolddesc[]|ObjectCollection findByPcode(string $pcode) Return ChildAliHolddesc objects filtered by the pcode column
 * @method     ChildAliHolddesc[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliHolddesc objects filtered by the pdesc column
 * @method     ChildAliHolddesc[]|ObjectCollection findByPrice(string $price) Return ChildAliHolddesc objects filtered by the price column
 * @method     ChildAliHolddesc[]|ObjectCollection findByPv(string $pv) Return ChildAliHolddesc objects filtered by the pv column
 * @method     ChildAliHolddesc[]|ObjectCollection findByBv(string $bv) Return ChildAliHolddesc objects filtered by the bv column
 * @method     ChildAliHolddesc[]|ObjectCollection findByFv(string $fv) Return ChildAliHolddesc objects filtered by the fv column
 * @method     ChildAliHolddesc[]|ObjectCollection findBySppv(string $sppv) Return ChildAliHolddesc objects filtered by the sppv column
 * @method     ChildAliHolddesc[]|ObjectCollection findByQty(string $qty) Return ChildAliHolddesc objects filtered by the qty column
 * @method     ChildAliHolddesc[]|ObjectCollection findByAmt(string $amt) Return ChildAliHolddesc objects filtered by the amt column
 * @method     ChildAliHolddesc[]|ObjectCollection findByBprice(string $bprice) Return ChildAliHolddesc objects filtered by the bprice column
 * @method     ChildAliHolddesc[]|ObjectCollection findByUidbase(string $uidbase) Return ChildAliHolddesc objects filtered by the uidbase column
 * @method     ChildAliHolddesc[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliHolddesc objects filtered by the locationbase column
 * @method     ChildAliHolddesc[]|ObjectCollection findByCrate(string $crate) Return ChildAliHolddesc objects filtered by the crate column
 * @method     ChildAliHolddesc[]|ObjectCollection findByVat(int $vat) Return ChildAliHolddesc objects filtered by the vat column
 * @method     ChildAliHolddesc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliHolddescQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliHolddescQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliHolddesc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliHolddescQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliHolddescQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliHolddescQuery) {
            return $criteria;
        }
        $query = new ChildAliHolddescQuery();
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
     * @return ChildAliHolddesc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliHolddescTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliHolddescTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliHolddesc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, hono, pcode, pdesc, price, pv, bv, fv, sppv, qty, amt, bprice, uidbase, locationbase, crate, vat FROM ali_holddesc WHERE id = :p0';
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
            /** @var ChildAliHolddesc $obj */
            $obj = new ChildAliHolddesc();
            $obj->hydrate($row);
            AliHolddescTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliHolddesc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliHolddescTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliHolddescTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the hono column
     *
     * Example usage:
     * <code>
     * $query->filterByHono(1234); // WHERE hono = 1234
     * $query->filterByHono(array(12, 34)); // WHERE hono IN (12, 34)
     * $query->filterByHono(array('min' => 12)); // WHERE hono > 12
     * </code>
     *
     * @param     mixed $hono The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByHono($hono = null, $comparison = null)
    {
        if (is_array($hono)) {
            $useMinMax = false;
            if (isset($hono['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_HONO, $hono['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hono['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_HONO, $hono['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_HONO, $hono, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_PDESC, $pdesc, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByBv($bv = null, $comparison = null)
    {
        if (is_array($bv)) {
            $useMinMax = false;
            if (isset($bv['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_BV, $bv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bv['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_BV, $bv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_BV, $bv, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByFv($fv = null, $comparison = null)
    {
        if (is_array($fv)) {
            $useMinMax = false;
            if (isset($fv['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_FV, $fv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fv['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_FV, $fv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_FV, $fv, $comparison);
    }

    /**
     * Filter the query on the sppv column
     *
     * Example usage:
     * <code>
     * $query->filterBySppv(1234); // WHERE sppv = 1234
     * $query->filterBySppv(array(12, 34)); // WHERE sppv IN (12, 34)
     * $query->filterBySppv(array('min' => 12)); // WHERE sppv > 12
     * </code>
     *
     * @param     mixed $sppv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterBySppv($sppv = null, $comparison = null)
    {
        if (is_array($sppv)) {
            $useMinMax = false;
            if (isset($sppv['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_SPPV, $sppv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sppv['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_SPPV, $sppv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_SPPV, $sppv, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_QTY, $qty, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (is_array($amt)) {
            $useMinMax = false;
            if (isset($amt['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_AMT, $amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amt['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_AMT, $amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_AMT, $amt, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_BPRICE, $bprice, $comparison);
    }

    /**
     * Filter the query on the uidbase column
     *
     * Example usage:
     * <code>
     * $query->filterByUidbase('fooValue');   // WHERE uidbase = 'fooValue'
     * $query->filterByUidbase('%fooValue%', Criteria::LIKE); // WHERE uidbase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidbase The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByUidbase($uidbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_UIDBASE, $uidbase, $comparison);
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
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the crate column
     *
     * Example usage:
     * <code>
     * $query->filterByCrate(1234); // WHERE crate = 1234
     * $query->filterByCrate(array(12, 34)); // WHERE crate IN (12, 34)
     * $query->filterByCrate(array('min' => 12)); // WHERE crate > 12
     * </code>
     *
     * @param     mixed $crate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Filter the query on the vat column
     *
     * Example usage:
     * <code>
     * $query->filterByVat(1234); // WHERE vat = 1234
     * $query->filterByVat(array(12, 34)); // WHERE vat IN (12, 34)
     * $query->filterByVat(array('min' => 12)); // WHERE vat > 12
     * </code>
     *
     * @param     mixed $vat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function filterByVat($vat = null, $comparison = null)
    {
        if (is_array($vat)) {
            $useMinMax = false;
            if (isset($vat['min'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_VAT, $vat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vat['max'])) {
                $this->addUsingAlias(AliHolddescTableMap::COL_VAT, $vat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHolddescTableMap::COL_VAT, $vat, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliHolddesc $aliHolddesc Object to remove from the list of results
     *
     * @return $this|ChildAliHolddescQuery The current query, for fluid interface
     */
    public function prune($aliHolddesc = null)
    {
        if ($aliHolddesc) {
            $this->addUsingAlias(AliHolddescTableMap::COL_ID, $aliHolddesc->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_holddesc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliHolddescTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliHolddescTableMap::clearInstancePool();
            AliHolddescTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliHolddescTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliHolddescTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliHolddescTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliHolddescTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliHolddescQuery
