<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliAging as ChildAliAging;
use CciOrm\CciOrm\AliAgingQuery as ChildAliAgingQuery;
use CciOrm\CciOrm\Map\AliAgingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_aging' table.
 *
 *
 *
 * @method     ChildAliAgingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliAgingQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliAgingQuery orderByIntime($order = Criteria::ASC) Order by the intime column
 * @method     ChildAliAgingQuery orderByOuttime($order = Criteria::ASC) Order by the outtime column
 * @method     ChildAliAgingQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method     ChildAliAgingQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliAgingQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliAgingQuery orderByBarcode($order = Criteria::ASC) Order by the barcode column
 * @method     ChildAliAgingQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliAgingQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliAgingQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliAgingQuery orderByQty($order = Criteria::ASC) Order by the qty column
 *
 * @method     ChildAliAgingQuery groupById() Group by the id column
 * @method     ChildAliAgingQuery groupByPcode() Group by the pcode column
 * @method     ChildAliAgingQuery groupByIntime() Group by the intime column
 * @method     ChildAliAgingQuery groupByOuttime() Group by the outtime column
 * @method     ChildAliAgingQuery groupBySerial() Group by the serial column
 * @method     ChildAliAgingQuery groupByFdate() Group by the fdate column
 * @method     ChildAliAgingQuery groupByTdate() Group by the tdate column
 * @method     ChildAliAgingQuery groupByBarcode() Group by the barcode column
 * @method     ChildAliAgingQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliAgingQuery groupBySano() Group by the sano column
 * @method     ChildAliAgingQuery groupByMcode() Group by the mcode column
 * @method     ChildAliAgingQuery groupByQty() Group by the qty column
 *
 * @method     ChildAliAgingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliAgingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliAgingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliAgingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliAgingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliAgingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliAging findOne(ConnectionInterface $con = null) Return the first ChildAliAging matching the query
 * @method     ChildAliAging findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliAging matching the query, or a new ChildAliAging object populated from the query conditions when no match is found
 *
 * @method     ChildAliAging findOneById(int $id) Return the first ChildAliAging filtered by the id column
 * @method     ChildAliAging findOneByPcode(string $pcode) Return the first ChildAliAging filtered by the pcode column
 * @method     ChildAliAging findOneByIntime(string $intime) Return the first ChildAliAging filtered by the intime column
 * @method     ChildAliAging findOneByOuttime(string $outtime) Return the first ChildAliAging filtered by the outtime column
 * @method     ChildAliAging findOneBySerial(string $serial) Return the first ChildAliAging filtered by the serial column
 * @method     ChildAliAging findOneByFdate(string $fdate) Return the first ChildAliAging filtered by the fdate column
 * @method     ChildAliAging findOneByTdate(string $tdate) Return the first ChildAliAging filtered by the tdate column
 * @method     ChildAliAging findOneByBarcode(string $barcode) Return the first ChildAliAging filtered by the barcode column
 * @method     ChildAliAging findOneByInvCode(string $inv_code) Return the first ChildAliAging filtered by the inv_code column
 * @method     ChildAliAging findOneBySano(string $sano) Return the first ChildAliAging filtered by the sano column
 * @method     ChildAliAging findOneByMcode(string $mcode) Return the first ChildAliAging filtered by the mcode column
 * @method     ChildAliAging findOneByQty(int $qty) Return the first ChildAliAging filtered by the qty column *

 * @method     ChildAliAging requirePk($key, ConnectionInterface $con = null) Return the ChildAliAging by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOne(ConnectionInterface $con = null) Return the first ChildAliAging matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAging requireOneById(int $id) Return the first ChildAliAging filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByPcode(string $pcode) Return the first ChildAliAging filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByIntime(string $intime) Return the first ChildAliAging filtered by the intime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByOuttime(string $outtime) Return the first ChildAliAging filtered by the outtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneBySerial(string $serial) Return the first ChildAliAging filtered by the serial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByFdate(string $fdate) Return the first ChildAliAging filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByTdate(string $tdate) Return the first ChildAliAging filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByBarcode(string $barcode) Return the first ChildAliAging filtered by the barcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByInvCode(string $inv_code) Return the first ChildAliAging filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneBySano(string $sano) Return the first ChildAliAging filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByMcode(string $mcode) Return the first ChildAliAging filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliAging requireOneByQty(int $qty) Return the first ChildAliAging filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliAging[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliAging objects based on current ModelCriteria
 * @method     ChildAliAging[]|ObjectCollection findById(int $id) Return ChildAliAging objects filtered by the id column
 * @method     ChildAliAging[]|ObjectCollection findByPcode(string $pcode) Return ChildAliAging objects filtered by the pcode column
 * @method     ChildAliAging[]|ObjectCollection findByIntime(string $intime) Return ChildAliAging objects filtered by the intime column
 * @method     ChildAliAging[]|ObjectCollection findByOuttime(string $outtime) Return ChildAliAging objects filtered by the outtime column
 * @method     ChildAliAging[]|ObjectCollection findBySerial(string $serial) Return ChildAliAging objects filtered by the serial column
 * @method     ChildAliAging[]|ObjectCollection findByFdate(string $fdate) Return ChildAliAging objects filtered by the fdate column
 * @method     ChildAliAging[]|ObjectCollection findByTdate(string $tdate) Return ChildAliAging objects filtered by the tdate column
 * @method     ChildAliAging[]|ObjectCollection findByBarcode(string $barcode) Return ChildAliAging objects filtered by the barcode column
 * @method     ChildAliAging[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliAging objects filtered by the inv_code column
 * @method     ChildAliAging[]|ObjectCollection findBySano(string $sano) Return ChildAliAging objects filtered by the sano column
 * @method     ChildAliAging[]|ObjectCollection findByMcode(string $mcode) Return ChildAliAging objects filtered by the mcode column
 * @method     ChildAliAging[]|ObjectCollection findByQty(int $qty) Return ChildAliAging objects filtered by the qty column
 * @method     ChildAliAging[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliAgingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliAgingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliAging', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliAgingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliAgingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliAgingQuery) {
            return $criteria;
        }
        $query = new ChildAliAgingQuery();
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
     * @return ChildAliAging|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliAgingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliAgingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliAging A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, pcode, intime, outtime, serial, fdate, tdate, barcode, inv_code, sano, mcode, qty FROM ali_aging WHERE id = :p0';
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
            /** @var ChildAliAging $obj */
            $obj = new ChildAliAging();
            $obj->hydrate($row);
            AliAgingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliAging|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliAgingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliAgingTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_PCODE, $pcode, $comparison);
    }

    /**
     * Filter the query on the intime column
     *
     * Example usage:
     * <code>
     * $query->filterByIntime('2011-03-14'); // WHERE intime = '2011-03-14'
     * $query->filterByIntime('now'); // WHERE intime = '2011-03-14'
     * $query->filterByIntime(array('max' => 'yesterday')); // WHERE intime > '2011-03-13'
     * </code>
     *
     * @param     mixed $intime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByIntime($intime = null, $comparison = null)
    {
        if (is_array($intime)) {
            $useMinMax = false;
            if (isset($intime['min'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_INTIME, $intime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intime['max'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_INTIME, $intime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_INTIME, $intime, $comparison);
    }

    /**
     * Filter the query on the outtime column
     *
     * Example usage:
     * <code>
     * $query->filterByOuttime('2011-03-14'); // WHERE outtime = '2011-03-14'
     * $query->filterByOuttime('now'); // WHERE outtime = '2011-03-14'
     * $query->filterByOuttime(array('max' => 'yesterday')); // WHERE outtime > '2011-03-13'
     * </code>
     *
     * @param     mixed $outtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByOuttime($outtime = null, $comparison = null)
    {
        if (is_array($outtime)) {
            $useMinMax = false;
            if (isset($outtime['min'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_OUTTIME, $outtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outtime['max'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_OUTTIME, $outtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_OUTTIME, $outtime, $comparison);
    }

    /**
     * Filter the query on the serial column
     *
     * Example usage:
     * <code>
     * $query->filterBySerial('fooValue');   // WHERE serial = 'fooValue'
     * $query->filterBySerial('%fooValue%', Criteria::LIKE); // WHERE serial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serial The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterBySerial($serial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serial)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_SERIAL, $serial, $comparison);
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the barcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBarcode('fooValue');   // WHERE barcode = 'fooValue'
     * $query->filterByBarcode('%fooValue%', Criteria::LIKE); // WHERE barcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $barcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByBarcode($barcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_BARCODE, $barcode, $comparison);
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_INV_CODE, $invCode, $comparison);
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliAgingTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliAgingTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliAging $aliAging Object to remove from the list of results
     *
     * @return $this|ChildAliAgingQuery The current query, for fluid interface
     */
    public function prune($aliAging = null)
    {
        if ($aliAging) {
            $this->addUsingAlias(AliAgingTableMap::COL_ID, $aliAging->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_aging table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliAgingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliAgingTableMap::clearInstancePool();
            AliAgingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliAgingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliAgingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliAgingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliAgingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliAgingQuery
