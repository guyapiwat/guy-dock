<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTempAd as ChildAliTempAd;
use CciOrm\CciOrm\AliTempAdQuery as ChildAliTempAdQuery;
use CciOrm\CciOrm\Map\AliTempAdTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_temp_ad' table.
 *
 *
 *
 * @method     ChildAliTempAdQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliTempAdQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliTempAdQuery orderByBdate($order = Criteria::ASC) Order by the bdate column
 * @method     ChildAliTempAdQuery orderByLr1($order = Criteria::ASC) Order by the lr1 column
 * @method     ChildAliTempAdQuery orderByRcodeL($order = Criteria::ASC) Order by the rcode_l column
 * @method     ChildAliTempAdQuery orderByLevelL($order = Criteria::ASC) Order by the level_l column
 * @method     ChildAliTempAdQuery orderByMcodeL($order = Criteria::ASC) Order by the mcode_l column
 * @method     ChildAliTempAdQuery orderBySanoL($order = Criteria::ASC) Order by the sano_l column
 * @method     ChildAliTempAdQuery orderByRcodeR($order = Criteria::ASC) Order by the rcode_r column
 * @method     ChildAliTempAdQuery orderByLevelR($order = Criteria::ASC) Order by the level_r column
 * @method     ChildAliTempAdQuery orderByMcodeR($order = Criteria::ASC) Order by the mcode_r column
 * @method     ChildAliTempAdQuery orderBySanoR($order = Criteria::ASC) Order by the sano_r column
 * @method     ChildAliTempAdQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliTempAdQuery orderByFlag($order = Criteria::ASC) Order by the flag column
 *
 * @method     ChildAliTempAdQuery groupById() Group by the id column
 * @method     ChildAliTempAdQuery groupByMcode() Group by the mcode column
 * @method     ChildAliTempAdQuery groupByBdate() Group by the bdate column
 * @method     ChildAliTempAdQuery groupByLr1() Group by the lr1 column
 * @method     ChildAliTempAdQuery groupByRcodeL() Group by the rcode_l column
 * @method     ChildAliTempAdQuery groupByLevelL() Group by the level_l column
 * @method     ChildAliTempAdQuery groupByMcodeL() Group by the mcode_l column
 * @method     ChildAliTempAdQuery groupBySanoL() Group by the sano_l column
 * @method     ChildAliTempAdQuery groupByRcodeR() Group by the rcode_r column
 * @method     ChildAliTempAdQuery groupByLevelR() Group by the level_r column
 * @method     ChildAliTempAdQuery groupByMcodeR() Group by the mcode_r column
 * @method     ChildAliTempAdQuery groupBySanoR() Group by the sano_r column
 * @method     ChildAliTempAdQuery groupByTotal() Group by the total column
 * @method     ChildAliTempAdQuery groupByFlag() Group by the flag column
 *
 * @method     ChildAliTempAdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliTempAdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliTempAdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliTempAdQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliTempAdQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliTempAdQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliTempAd findOne(ConnectionInterface $con = null) Return the first ChildAliTempAd matching the query
 * @method     ChildAliTempAd findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliTempAd matching the query, or a new ChildAliTempAd object populated from the query conditions when no match is found
 *
 * @method     ChildAliTempAd findOneById(int $id) Return the first ChildAliTempAd filtered by the id column
 * @method     ChildAliTempAd findOneByMcode(string $mcode) Return the first ChildAliTempAd filtered by the mcode column
 * @method     ChildAliTempAd findOneByBdate(string $bdate) Return the first ChildAliTempAd filtered by the bdate column
 * @method     ChildAliTempAd findOneByLr1(string $lr1) Return the first ChildAliTempAd filtered by the lr1 column
 * @method     ChildAliTempAd findOneByRcodeL(string $rcode_l) Return the first ChildAliTempAd filtered by the rcode_l column
 * @method     ChildAliTempAd findOneByLevelL(string $level_l) Return the first ChildAliTempAd filtered by the level_l column
 * @method     ChildAliTempAd findOneByMcodeL(string $mcode_l) Return the first ChildAliTempAd filtered by the mcode_l column
 * @method     ChildAliTempAd findOneBySanoL(string $sano_l) Return the first ChildAliTempAd filtered by the sano_l column
 * @method     ChildAliTempAd findOneByRcodeR(string $rcode_r) Return the first ChildAliTempAd filtered by the rcode_r column
 * @method     ChildAliTempAd findOneByLevelR(string $level_r) Return the first ChildAliTempAd filtered by the level_r column
 * @method     ChildAliTempAd findOneByMcodeR(string $mcode_r) Return the first ChildAliTempAd filtered by the mcode_r column
 * @method     ChildAliTempAd findOneBySanoR(string $sano_r) Return the first ChildAliTempAd filtered by the sano_r column
 * @method     ChildAliTempAd findOneByTotal(string $total) Return the first ChildAliTempAd filtered by the total column
 * @method     ChildAliTempAd findOneByFlag(string $flag) Return the first ChildAliTempAd filtered by the flag column *

 * @method     ChildAliTempAd requirePk($key, ConnectionInterface $con = null) Return the ChildAliTempAd by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOne(ConnectionInterface $con = null) Return the first ChildAliTempAd matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTempAd requireOneById(int $id) Return the first ChildAliTempAd filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByMcode(string $mcode) Return the first ChildAliTempAd filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByBdate(string $bdate) Return the first ChildAliTempAd filtered by the bdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByLr1(string $lr1) Return the first ChildAliTempAd filtered by the lr1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByRcodeL(string $rcode_l) Return the first ChildAliTempAd filtered by the rcode_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByLevelL(string $level_l) Return the first ChildAliTempAd filtered by the level_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByMcodeL(string $mcode_l) Return the first ChildAliTempAd filtered by the mcode_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneBySanoL(string $sano_l) Return the first ChildAliTempAd filtered by the sano_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByRcodeR(string $rcode_r) Return the first ChildAliTempAd filtered by the rcode_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByLevelR(string $level_r) Return the first ChildAliTempAd filtered by the level_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByMcodeR(string $mcode_r) Return the first ChildAliTempAd filtered by the mcode_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneBySanoR(string $sano_r) Return the first ChildAliTempAd filtered by the sano_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByTotal(string $total) Return the first ChildAliTempAd filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliTempAd requireOneByFlag(string $flag) Return the first ChildAliTempAd filtered by the flag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliTempAd[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliTempAd objects based on current ModelCriteria
 * @method     ChildAliTempAd[]|ObjectCollection findById(int $id) Return ChildAliTempAd objects filtered by the id column
 * @method     ChildAliTempAd[]|ObjectCollection findByMcode(string $mcode) Return ChildAliTempAd objects filtered by the mcode column
 * @method     ChildAliTempAd[]|ObjectCollection findByBdate(string $bdate) Return ChildAliTempAd objects filtered by the bdate column
 * @method     ChildAliTempAd[]|ObjectCollection findByLr1(string $lr1) Return ChildAliTempAd objects filtered by the lr1 column
 * @method     ChildAliTempAd[]|ObjectCollection findByRcodeL(string $rcode_l) Return ChildAliTempAd objects filtered by the rcode_l column
 * @method     ChildAliTempAd[]|ObjectCollection findByLevelL(string $level_l) Return ChildAliTempAd objects filtered by the level_l column
 * @method     ChildAliTempAd[]|ObjectCollection findByMcodeL(string $mcode_l) Return ChildAliTempAd objects filtered by the mcode_l column
 * @method     ChildAliTempAd[]|ObjectCollection findBySanoL(string $sano_l) Return ChildAliTempAd objects filtered by the sano_l column
 * @method     ChildAliTempAd[]|ObjectCollection findByRcodeR(string $rcode_r) Return ChildAliTempAd objects filtered by the rcode_r column
 * @method     ChildAliTempAd[]|ObjectCollection findByLevelR(string $level_r) Return ChildAliTempAd objects filtered by the level_r column
 * @method     ChildAliTempAd[]|ObjectCollection findByMcodeR(string $mcode_r) Return ChildAliTempAd objects filtered by the mcode_r column
 * @method     ChildAliTempAd[]|ObjectCollection findBySanoR(string $sano_r) Return ChildAliTempAd objects filtered by the sano_r column
 * @method     ChildAliTempAd[]|ObjectCollection findByTotal(string $total) Return ChildAliTempAd objects filtered by the total column
 * @method     ChildAliTempAd[]|ObjectCollection findByFlag(string $flag) Return ChildAliTempAd objects filtered by the flag column
 * @method     ChildAliTempAd[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliTempAdQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliTempAdQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliTempAd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliTempAdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliTempAdQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliTempAdQuery) {
            return $criteria;
        }
        $query = new ChildAliTempAdQuery();
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
     * @return ChildAliTempAd|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliTempAdTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliTempAdTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliTempAd A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, bdate, lr1, rcode_l, level_l, mcode_l, sano_l, rcode_r, level_r, mcode_r, sano_r, total, flag FROM ali_temp_ad WHERE id = :p0';
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
            /** @var ChildAliTempAd $obj */
            $obj = new ChildAliTempAd();
            $obj->hydrate($row);
            AliTempAdTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliTempAd|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliTempAdTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliTempAdTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the bdate column
     *
     * Example usage:
     * <code>
     * $query->filterByBdate('2011-03-14'); // WHERE bdate = '2011-03-14'
     * $query->filterByBdate('now'); // WHERE bdate = '2011-03-14'
     * $query->filterByBdate(array('max' => 'yesterday')); // WHERE bdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $bdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByBdate($bdate = null, $comparison = null)
    {
        if (is_array($bdate)) {
            $useMinMax = false;
            if (isset($bdate['min'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_BDATE, $bdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bdate['max'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_BDATE, $bdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_BDATE, $bdate, $comparison);
    }

    /**
     * Filter the query on the lr1 column
     *
     * Example usage:
     * <code>
     * $query->filterByLr1('fooValue');   // WHERE lr1 = 'fooValue'
     * $query->filterByLr1('%fooValue%', Criteria::LIKE); // WHERE lr1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lr1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByLr1($lr1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lr1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_LR1, $lr1, $comparison);
    }

    /**
     * Filter the query on the rcode_l column
     *
     * Example usage:
     * <code>
     * $query->filterByRcodeL('fooValue');   // WHERE rcode_l = 'fooValue'
     * $query->filterByRcodeL('%fooValue%', Criteria::LIKE); // WHERE rcode_l LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rcodeL The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByRcodeL($rcodeL = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rcodeL)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_RCODE_L, $rcodeL, $comparison);
    }

    /**
     * Filter the query on the level_l column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelL(1234); // WHERE level_l = 1234
     * $query->filterByLevelL(array(12, 34)); // WHERE level_l IN (12, 34)
     * $query->filterByLevelL(array('min' => 12)); // WHERE level_l > 12
     * </code>
     *
     * @param     mixed $levelL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByLevelL($levelL = null, $comparison = null)
    {
        if (is_array($levelL)) {
            $useMinMax = false;
            if (isset($levelL['min'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_LEVEL_L, $levelL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($levelL['max'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_LEVEL_L, $levelL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_LEVEL_L, $levelL, $comparison);
    }

    /**
     * Filter the query on the mcode_l column
     *
     * Example usage:
     * <code>
     * $query->filterByMcodeL('fooValue');   // WHERE mcode_l = 'fooValue'
     * $query->filterByMcodeL('%fooValue%', Criteria::LIKE); // WHERE mcode_l LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcodeL The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByMcodeL($mcodeL = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeL)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_MCODE_L, $mcodeL, $comparison);
    }

    /**
     * Filter the query on the sano_l column
     *
     * Example usage:
     * <code>
     * $query->filterBySanoL('fooValue');   // WHERE sano_l = 'fooValue'
     * $query->filterBySanoL('%fooValue%', Criteria::LIKE); // WHERE sano_l LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sanoL The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterBySanoL($sanoL = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoL)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_SANO_L, $sanoL, $comparison);
    }

    /**
     * Filter the query on the rcode_r column
     *
     * Example usage:
     * <code>
     * $query->filterByRcodeR('fooValue');   // WHERE rcode_r = 'fooValue'
     * $query->filterByRcodeR('%fooValue%', Criteria::LIKE); // WHERE rcode_r LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rcodeR The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByRcodeR($rcodeR = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rcodeR)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_RCODE_R, $rcodeR, $comparison);
    }

    /**
     * Filter the query on the level_r column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelR(1234); // WHERE level_r = 1234
     * $query->filterByLevelR(array(12, 34)); // WHERE level_r IN (12, 34)
     * $query->filterByLevelR(array('min' => 12)); // WHERE level_r > 12
     * </code>
     *
     * @param     mixed $levelR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByLevelR($levelR = null, $comparison = null)
    {
        if (is_array($levelR)) {
            $useMinMax = false;
            if (isset($levelR['min'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_LEVEL_R, $levelR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($levelR['max'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_LEVEL_R, $levelR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_LEVEL_R, $levelR, $comparison);
    }

    /**
     * Filter the query on the mcode_r column
     *
     * Example usage:
     * <code>
     * $query->filterByMcodeR('fooValue');   // WHERE mcode_r = 'fooValue'
     * $query->filterByMcodeR('%fooValue%', Criteria::LIKE); // WHERE mcode_r LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcodeR The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByMcodeR($mcodeR = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeR)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_MCODE_R, $mcodeR, $comparison);
    }

    /**
     * Filter the query on the sano_r column
     *
     * Example usage:
     * <code>
     * $query->filterBySanoR('fooValue');   // WHERE sano_r = 'fooValue'
     * $query->filterBySanoR('%fooValue%', Criteria::LIKE); // WHERE sano_r LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sanoR The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterBySanoR($sanoR = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sanoR)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_SANO_R, $sanoR, $comparison);
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
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliTempAdTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the flag column
     *
     * Example usage:
     * <code>
     * $query->filterByFlag('fooValue');   // WHERE flag = 'fooValue'
     * $query->filterByFlag('%fooValue%', Criteria::LIKE); // WHERE flag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function filterByFlag($flag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliTempAdTableMap::COL_FLAG, $flag, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliTempAd $aliTempAd Object to remove from the list of results
     *
     * @return $this|ChildAliTempAdQuery The current query, for fluid interface
     */
    public function prune($aliTempAd = null)
    {
        if ($aliTempAd) {
            $this->addUsingAlias(AliTempAdTableMap::COL_ID, $aliTempAd->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_temp_ad table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTempAdTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliTempAdTableMap::clearInstancePool();
            AliTempAdTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTempAdTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliTempAdTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliTempAdTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliTempAdTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliTempAdQuery
