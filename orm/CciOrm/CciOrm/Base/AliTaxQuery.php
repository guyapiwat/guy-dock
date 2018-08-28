<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTax as ChildAliTax;
use CciOrm\CciOrm\AliTaxQuery as ChildAliTaxQuery;
use CciOrm\CciOrm\Map\AliTaxTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_tax' table.
 *
 *
 *
 * @method     ChildAliTaxQuery orderByCid($order = Criteria::ASC) Order by the cid column
 * @method     ChildAliTaxQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliTaxQuery orderByMinaccamount($order = Criteria::ASC) Order by the minaccamount column
 * @method     ChildAliTaxQuery orderByMaxaccamount($order = Criteria::ASC) Order by the maxaccamount column
 * @method     ChildAliTaxQuery orderByVatlocal($order = Criteria::ASC) Order by the vatlocal column
 * @method     ChildAliTaxQuery orderByVatforeign($order = Criteria::ASC) Order by the vatforeign column
 * @method     ChildAliTaxQuery orderByTaxlocal($order = Criteria::ASC) Order by the taxlocal column
 * @method     ChildAliTaxQuery orderByTaxforeign($order = Criteria::ASC) Order by the taxforeign column
 * @method     ChildAliTaxQuery orderByMtype($order = Criteria::ASC) Order by the mtype column
 *
 * @method     ChildAliTaxQuery groupByCid() Group by the cid column
 * @method     ChildAliTaxQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliTaxQuery groupByMinaccamount() Group by the minaccamount column
 * @method     ChildAliTaxQuery groupByMaxaccamount() Group by the maxaccamount column
 * @method     ChildAliTaxQuery groupByVatlocal() Group by the vatlocal column
 * @method     ChildAliTaxQuery groupByVatforeign() Group by the vatforeign column
 * @method     ChildAliTaxQuery groupByTaxlocal() Group by the taxlocal column
 * @method     ChildAliTaxQuery groupByTaxforeign() Group by the taxforeign column
 * @method     ChildAliTaxQuery groupByMtype() Group by the mtype column
 *
 * @method     ChildAliTaxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTaxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTaxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTaxQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTaxQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTaxQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTax findOne(ConnectionInterface $con = null) Return the first ChildAliTax matching the query
 * @method     ChildAliTax findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTax matching the query, or a new ChildAliTax object populated from the query conditions when no match is found
 *
 * @method     ChildAliTax findOneByCid(int $cid) Return the first ChildAliTax filtered by the cid column
 * @method     ChildAliTax findOneByLocationbase(string $locationbase) Return the first ChildAliTax filtered by the locationbase column
 * @method     ChildAliTax findOneByMinaccamount(string $minaccamount) Return the first ChildAliTax filtered by the minaccamount column
 * @method     ChildAliTax findOneByMaxaccamount(string $maxaccamount) Return the first ChildAliTax filtered by the maxaccamount column
 * @method     ChildAliTax findOneByVatlocal(int $vatlocal) Return the first ChildAliTax filtered by the vatlocal column
 * @method     ChildAliTax findOneByVatforeign(int $vatforeign) Return the first ChildAliTax filtered by the vatforeign column
 * @method     ChildAliTax findOneByTaxlocal(string $taxlocal) Return the first ChildAliTax filtered by the taxlocal column
 * @method     ChildAliTax findOneByTaxforeign(string $taxforeign) Return the first ChildAliTax filtered by the taxforeign column
 * @method     ChildAliTax findOneByMtype(string $mtype) Return the first ChildAliTax filtered by the mtype column *

 * @method     ChildAliTax requirePk($key, ConnectionInterface $con = null) Return the ChildAliTax by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOne(ConnectionInterface $con = null) Return the first ChildAliTax matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTax requireOneByCid(int $cid) Return the first ChildAliTax filtered by the cid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOneByLocationbase(string $locationbase) Return the first ChildAliTax filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOneByMinaccamount(string $minaccamount) Return the first ChildAliTax filtered by the minaccamount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOneByMaxaccamount(string $maxaccamount) Return the first ChildAliTax filtered by the maxaccamount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOneByVatlocal(int $vatlocal) Return the first ChildAliTax filtered by the vatlocal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOneByVatforeign(int $vatforeign) Return the first ChildAliTax filtered by the vatforeign column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOneByTaxlocal(string $taxlocal) Return the first ChildAliTax filtered by the taxlocal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOneByTaxforeign(string $taxforeign) Return the first ChildAliTax filtered by the taxforeign column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTax requireOneByMtype(string $mtype) Return the first ChildAliTax filtered by the mtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTax[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTax objects based on current ModelCriteria
 * @method     ChildAliTax[]|ObjectCollection findByCid(int $cid) Return ChildAliTax objects filtered by the cid column
 * @method     ChildAliTax[]|ObjectCollection findByLocationbase(string $locationbase) Return ChildAliTax objects filtered by the locationbase column
 * @method     ChildAliTax[]|ObjectCollection findByMinaccamount(string $minaccamount) Return ChildAliTax objects filtered by the minaccamount column
 * @method     ChildAliTax[]|ObjectCollection findByMaxaccamount(string $maxaccamount) Return ChildAliTax objects filtered by the maxaccamount column
 * @method     ChildAliTax[]|ObjectCollection findByVatlocal(int $vatlocal) Return ChildAliTax objects filtered by the vatlocal column
 * @method     ChildAliTax[]|ObjectCollection findByVatforeign(int $vatforeign) Return ChildAliTax objects filtered by the vatforeign column
 * @method     ChildAliTax[]|ObjectCollection findByTaxlocal(string $taxlocal) Return ChildAliTax objects filtered by the taxlocal column
 * @method     ChildAliTax[]|ObjectCollection findByTaxforeign(string $taxforeign) Return ChildAliTax objects filtered by the taxforeign column
 * @method     ChildAliTax[]|ObjectCollection findByMtype(string $mtype) Return ChildAliTax objects filtered by the mtype column
 * @method     ChildAliTax[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTaxQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTaxQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTax', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTaxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTaxQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTaxQuery) {
            return $criteria;
        }
        $query = new ChildAliTaxQuery();
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
     * @return ChildAliTax|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTaxTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTaxTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTax A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT cid, locationbase, minaccamount, maxaccamount, vatlocal, vatforeign, taxlocal, taxforeign, mtype FROM ali_tax WHERE cid = :p0';
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
            /** @var ChildAliTax $obj */
            $obj = new ChildAliTax();
            $obj->hydrate($row);
            AliTaxTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTax|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTaxTableMap::COL_CID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTaxTableMap::COL_CID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the cid column
     *
     * Example usage:
     * <code>
     * $query->filterByCid(1234); // WHERE cid = 1234
     * $query->filterByCid(array(12, 34)); // WHERE cid IN (12, 34)
     * $query->filterByCid(array('min' => 12)); // WHERE cid > 12
     * </code>
     *
     * @param     mixed $cid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByCid($cid = null, $comparison = null)
    {
        if (is_array($cid)) {
            $useMinMax = false;
            if (isset($cid['min'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_CID, $cid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cid['max'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_CID, $cid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_CID, $cid, $comparison);
    }

    /**
     * Filter the query on the locationbase column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationbase('fooValue');   // WHERE locationbase = 'fooValue'
     * $query->filterByLocationbase('%fooValue%', Criteria::LIKE); // WHERE locationbase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $locationbase The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($locationbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the minaccamount column
     *
     * Example usage:
     * <code>
     * $query->filterByMinaccamount(1234); // WHERE minaccamount = 1234
     * $query->filterByMinaccamount(array(12, 34)); // WHERE minaccamount IN (12, 34)
     * $query->filterByMinaccamount(array('min' => 12)); // WHERE minaccamount > 12
     * </code>
     *
     * @param     mixed $minaccamount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByMinaccamount($minaccamount = null, $comparison = null)
    {
        if (is_array($minaccamount)) {
            $useMinMax = false;
            if (isset($minaccamount['min'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_MINACCAMOUNT, $minaccamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minaccamount['max'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_MINACCAMOUNT, $minaccamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_MINACCAMOUNT, $minaccamount, $comparison);
    }

    /**
     * Filter the query on the maxaccamount column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxaccamount(1234); // WHERE maxaccamount = 1234
     * $query->filterByMaxaccamount(array(12, 34)); // WHERE maxaccamount IN (12, 34)
     * $query->filterByMaxaccamount(array('min' => 12)); // WHERE maxaccamount > 12
     * </code>
     *
     * @param     mixed $maxaccamount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByMaxaccamount($maxaccamount = null, $comparison = null)
    {
        if (is_array($maxaccamount)) {
            $useMinMax = false;
            if (isset($maxaccamount['min'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_MAXACCAMOUNT, $maxaccamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxaccamount['max'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_MAXACCAMOUNT, $maxaccamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_MAXACCAMOUNT, $maxaccamount, $comparison);
    }

    /**
     * Filter the query on the vatlocal column
     *
     * Example usage:
     * <code>
     * $query->filterByVatlocal(1234); // WHERE vatlocal = 1234
     * $query->filterByVatlocal(array(12, 34)); // WHERE vatlocal IN (12, 34)
     * $query->filterByVatlocal(array('min' => 12)); // WHERE vatlocal > 12
     * </code>
     *
     * @param     mixed $vatlocal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByVatlocal($vatlocal = null, $comparison = null)
    {
        if (is_array($vatlocal)) {
            $useMinMax = false;
            if (isset($vatlocal['min'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_VATLOCAL, $vatlocal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vatlocal['max'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_VATLOCAL, $vatlocal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_VATLOCAL, $vatlocal, $comparison);
    }

    /**
     * Filter the query on the vatforeign column
     *
     * Example usage:
     * <code>
     * $query->filterByVatforeign(1234); // WHERE vatforeign = 1234
     * $query->filterByVatforeign(array(12, 34)); // WHERE vatforeign IN (12, 34)
     * $query->filterByVatforeign(array('min' => 12)); // WHERE vatforeign > 12
     * </code>
     *
     * @param     mixed $vatforeign The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByVatforeign($vatforeign = null, $comparison = null)
    {
        if (is_array($vatforeign)) {
            $useMinMax = false;
            if (isset($vatforeign['min'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_VATFOREIGN, $vatforeign['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vatforeign['max'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_VATFOREIGN, $vatforeign['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_VATFOREIGN, $vatforeign, $comparison);
    }

    /**
     * Filter the query on the taxlocal column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxlocal(1234); // WHERE taxlocal = 1234
     * $query->filterByTaxlocal(array(12, 34)); // WHERE taxlocal IN (12, 34)
     * $query->filterByTaxlocal(array('min' => 12)); // WHERE taxlocal > 12
     * </code>
     *
     * @param     mixed $taxlocal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByTaxlocal($taxlocal = null, $comparison = null)
    {
        if (is_array($taxlocal)) {
            $useMinMax = false;
            if (isset($taxlocal['min'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_TAXLOCAL, $taxlocal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxlocal['max'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_TAXLOCAL, $taxlocal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_TAXLOCAL, $taxlocal, $comparison);
    }

    /**
     * Filter the query on the taxforeign column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxforeign(1234); // WHERE taxforeign = 1234
     * $query->filterByTaxforeign(array(12, 34)); // WHERE taxforeign IN (12, 34)
     * $query->filterByTaxforeign(array('min' => 12)); // WHERE taxforeign > 12
     * </code>
     *
     * @param     mixed $taxforeign The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByTaxforeign($taxforeign = null, $comparison = null)
    {
        if (is_array($taxforeign)) {
            $useMinMax = false;
            if (isset($taxforeign['min'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_TAXFOREIGN, $taxforeign['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxforeign['max'])) {
                $this->addUsingAlias(AliTaxTableMap::COL_TAXFOREIGN, $taxforeign['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_TAXFOREIGN, $taxforeign, $comparison);
    }

    /**
     * Filter the query on the mtype column
     *
     * Example usage:
     * <code>
     * $query->filterByMtype('fooValue');   // WHERE mtype = 'fooValue'
     * $query->filterByMtype('%fooValue%', Criteria::LIKE); // WHERE mtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function filterByMtype($mtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTaxTableMap::COL_MTYPE, $mtype, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTax $aliTax Object to remove from the list of results
     *
     * @return $this|ChildAliTaxQuery The current query, for fluid interface
     */
    public function prune($aliTax = null)
    {
        if ($aliTax) {
            $this->addUsingAlias(AliTaxTableMap::COL_CID, $aliTax->getCid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_tax table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTaxTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTaxTableMap::clearInstancePool();
            AliTaxTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTaxTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTaxTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTaxTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTaxTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTaxQuery
