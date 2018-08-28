<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliImportStockD as ChildAliImportStockD;
use CciOrm\CciOrm\AliImportStockDQuery as ChildAliImportStockDQuery;
use CciOrm\CciOrm\Map\AliImportStockDTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_import_stock_d' table.
 *
 *
 *
 * @method     ChildAliImportStockDQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliImportStockDQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliImportStockDQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliImportStockDQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliImportStockDQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliImportStockDQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliImportStockDQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliImportStockDQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliImportStockDQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliImportStockDQuery orderByBv($order = Criteria::ASC) Order by the bv column
 * @method     ChildAliImportStockDQuery orderByFv($order = Criteria::ASC) Order by the fv column
 * @method     ChildAliImportStockDQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliImportStockDQuery orderByQtyOld($order = Criteria::ASC) Order by the qty_old column
 * @method     ChildAliImportStockDQuery orderByAmt($order = Criteria::ASC) Order by the amt column
 *
 * @method     ChildAliImportStockDQuery groupById() Group by the id column
 * @method     ChildAliImportStockDQuery groupBySano() Group by the sano column
 * @method     ChildAliImportStockDQuery groupBySadate() Group by the sadate column
 * @method     ChildAliImportStockDQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliImportStockDQuery groupByPcode() Group by the pcode column
 * @method     ChildAliImportStockDQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliImportStockDQuery groupByMcode() Group by the mcode column
 * @method     ChildAliImportStockDQuery groupByPrice() Group by the price column
 * @method     ChildAliImportStockDQuery groupByPv() Group by the pv column
 * @method     ChildAliImportStockDQuery groupByBv() Group by the bv column
 * @method     ChildAliImportStockDQuery groupByFv() Group by the fv column
 * @method     ChildAliImportStockDQuery groupByQty() Group by the qty column
 * @method     ChildAliImportStockDQuery groupByQtyOld() Group by the qty_old column
 * @method     ChildAliImportStockDQuery groupByAmt() Group by the amt column
 *
 * @method     ChildAliImportStockDQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliImportStockDQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliImportStockDQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliImportStockDQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliImportStockDQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliImportStockDQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliImportStockD findOne(ConnectionInterface $con = null) Return the first ChildAliImportStockD matching the query
 * @method     ChildAliImportStockD findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliImportStockD matching the query, or a new ChildAliImportStockD object populated from the query conditions when no match is found
 *
 * @method     ChildAliImportStockD findOneById(int $id) Return the first ChildAliImportStockD filtered by the id column
 * @method     ChildAliImportStockD findOneBySano(string $sano) Return the first ChildAliImportStockD filtered by the sano column
 * @method     ChildAliImportStockD findOneBySadate(string $sadate) Return the first ChildAliImportStockD filtered by the sadate column
 * @method     ChildAliImportStockD findOneByInvCode(string $inv_code) Return the first ChildAliImportStockD filtered by the inv_code column
 * @method     ChildAliImportStockD findOneByPcode(string $pcode) Return the first ChildAliImportStockD filtered by the pcode column
 * @method     ChildAliImportStockD findOneByPdesc(string $pdesc) Return the first ChildAliImportStockD filtered by the pdesc column
 * @method     ChildAliImportStockD findOneByMcode(string $mcode) Return the first ChildAliImportStockD filtered by the mcode column
 * @method     ChildAliImportStockD findOneByPrice(string $price) Return the first ChildAliImportStockD filtered by the price column
 * @method     ChildAliImportStockD findOneByPv(string $pv) Return the first ChildAliImportStockD filtered by the pv column
 * @method     ChildAliImportStockD findOneByBv(string $bv) Return the first ChildAliImportStockD filtered by the bv column
 * @method     ChildAliImportStockD findOneByFv(string $fv) Return the first ChildAliImportStockD filtered by the fv column
 * @method     ChildAliImportStockD findOneByQty(string $qty) Return the first ChildAliImportStockD filtered by the qty column
 * @method     ChildAliImportStockD findOneByQtyOld(string $qty_old) Return the first ChildAliImportStockD filtered by the qty_old column
 * @method     ChildAliImportStockD findOneByAmt(string $amt) Return the first ChildAliImportStockD filtered by the amt column *

 * @method     ChildAliImportStockD requirePk($key, ConnectionInterface $con = null) Return the ChildAliImportStockD by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOne(ConnectionInterface $con = null) Return the first ChildAliImportStockD matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliImportStockD requireOneById(int $id) Return the first ChildAliImportStockD filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneBySano(string $sano) Return the first ChildAliImportStockD filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneBySadate(string $sadate) Return the first ChildAliImportStockD filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByInvCode(string $inv_code) Return the first ChildAliImportStockD filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByPcode(string $pcode) Return the first ChildAliImportStockD filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByPdesc(string $pdesc) Return the first ChildAliImportStockD filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByMcode(string $mcode) Return the first ChildAliImportStockD filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByPrice(string $price) Return the first ChildAliImportStockD filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByPv(string $pv) Return the first ChildAliImportStockD filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByBv(string $bv) Return the first ChildAliImportStockD filtered by the bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByFv(string $fv) Return the first ChildAliImportStockD filtered by the fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByQty(string $qty) Return the first ChildAliImportStockD filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByQtyOld(string $qty_old) Return the first ChildAliImportStockD filtered by the qty_old column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliImportStockD requireOneByAmt(string $amt) Return the first ChildAliImportStockD filtered by the amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliImportStockD[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliImportStockD objects based on current ModelCriteria
 * @method     ChildAliImportStockD[]|ObjectCollection findById(int $id) Return ChildAliImportStockD objects filtered by the id column
 * @method     ChildAliImportStockD[]|ObjectCollection findBySano(string $sano) Return ChildAliImportStockD objects filtered by the sano column
 * @method     ChildAliImportStockD[]|ObjectCollection findBySadate(string $sadate) Return ChildAliImportStockD objects filtered by the sadate column
 * @method     ChildAliImportStockD[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliImportStockD objects filtered by the inv_code column
 * @method     ChildAliImportStockD[]|ObjectCollection findByPcode(string $pcode) Return ChildAliImportStockD objects filtered by the pcode column
 * @method     ChildAliImportStockD[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliImportStockD objects filtered by the pdesc column
 * @method     ChildAliImportStockD[]|ObjectCollection findByMcode(string $mcode) Return ChildAliImportStockD objects filtered by the mcode column
 * @method     ChildAliImportStockD[]|ObjectCollection findByPrice(string $price) Return ChildAliImportStockD objects filtered by the price column
 * @method     ChildAliImportStockD[]|ObjectCollection findByPv(string $pv) Return ChildAliImportStockD objects filtered by the pv column
 * @method     ChildAliImportStockD[]|ObjectCollection findByBv(string $bv) Return ChildAliImportStockD objects filtered by the bv column
 * @method     ChildAliImportStockD[]|ObjectCollection findByFv(string $fv) Return ChildAliImportStockD objects filtered by the fv column
 * @method     ChildAliImportStockD[]|ObjectCollection findByQty(string $qty) Return ChildAliImportStockD objects filtered by the qty column
 * @method     ChildAliImportStockD[]|ObjectCollection findByQtyOld(string $qty_old) Return ChildAliImportStockD objects filtered by the qty_old column
 * @method     ChildAliImportStockD[]|ObjectCollection findByAmt(string $amt) Return ChildAliImportStockD objects filtered by the amt column
 * @method     ChildAliImportStockD[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliImportStockDQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliImportStockDQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliImportStockD', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliImportStockDQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliImportStockDQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliImportStockDQuery) {
            return $criteria;
        }
        $query = new ChildAliImportStockDQuery();
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
     * @return ChildAliImportStockD|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliImportStockDTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliImportStockDTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliImportStockD A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sano, sadate, inv_code, pcode, pdesc, mcode, price, pv, bv, fv, qty, qty_old, amt FROM ali_import_stock_d WHERE id = :p0';
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
            /** @var ChildAliImportStockD $obj */
            $obj = new ChildAliImportStockD();
            $obj->hydrate($row);
            AliImportStockDTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliImportStockD|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliImportStockDTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliImportStockDTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_SADATE, $sadate, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_PDESC, $pdesc, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByBv($bv = null, $comparison = null)
    {
        if (is_array($bv)) {
            $useMinMax = false;
            if (isset($bv['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_BV, $bv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bv['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_BV, $bv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_BV, $bv, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByFv($fv = null, $comparison = null)
    {
        if (is_array($fv)) {
            $useMinMax = false;
            if (isset($fv['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_FV, $fv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fv['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_FV, $fv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_FV, $fv, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the qty_old column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyOld(1234); // WHERE qty_old = 1234
     * $query->filterByQtyOld(array(12, 34)); // WHERE qty_old IN (12, 34)
     * $query->filterByQtyOld(array('min' => 12)); // WHERE qty_old > 12
     * </code>
     *
     * @param     mixed $qtyOld The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByQtyOld($qtyOld = null, $comparison = null)
    {
        if (is_array($qtyOld)) {
            $useMinMax = false;
            if (isset($qtyOld['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_QTY_OLD, $qtyOld['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qtyOld['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_QTY_OLD, $qtyOld['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_QTY_OLD, $qtyOld, $comparison);
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
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function filterByAmt($amt = null, $comparison = null)
    {
        if (is_array($amt)) {
            $useMinMax = false;
            if (isset($amt['min'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_AMT, $amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amt['max'])) {
                $this->addUsingAlias(AliImportStockDTableMap::COL_AMT, $amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliImportStockDTableMap::COL_AMT, $amt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliImportStockD $aliImportStockD Object to remove from the list of results
     *
     * @return $this|ChildAliImportStockDQuery The current query, for fluid interface
     */
    public function prune($aliImportStockD = null)
    {
        if ($aliImportStockD) {
            $this->addUsingAlias(AliImportStockDTableMap::COL_ID, $aliImportStockD->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_import_stock_d table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliImportStockDTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliImportStockDTableMap::clearInstancePool();
            AliImportStockDTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliImportStockDTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliImportStockDTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliImportStockDTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliImportStockDTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliImportStockDQuery
