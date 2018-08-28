<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliCommissionB as ChildAliCommissionB;
use CciOrm\CciOrm\AliCommissionBQuery as ChildAliCommissionBQuery;
use CciOrm\CciOrm\Map\AliCommissionBTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_commission_b' table.
 *
 *
 *
 * @method     ChildAliCommissionBQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliCommissionBQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliCommissionBQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliCommissionBQuery orderByPosCur3($order = Criteria::ASC) Order by the pos_cur3 column
 * @method     ChildAliCommissionBQuery orderByDmbonus($order = Criteria::ASC) Order by the dmbonus column
 * @method     ChildAliCommissionBQuery orderByEmbonus($order = Criteria::ASC) Order by the embonus column
 * @method     ChildAliCommissionBQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliCommissionBQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliCommissionBQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliCommissionBQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 *
 * @method     ChildAliCommissionBQuery groupById() Group by the id column
 * @method     ChildAliCommissionBQuery groupByMcode() Group by the mcode column
 * @method     ChildAliCommissionBQuery groupByNameT() Group by the name_t column
 * @method     ChildAliCommissionBQuery groupByPosCur3() Group by the pos_cur3 column
 * @method     ChildAliCommissionBQuery groupByDmbonus() Group by the dmbonus column
 * @method     ChildAliCommissionBQuery groupByEmbonus() Group by the embonus column
 * @method     ChildAliCommissionBQuery groupByTotal() Group by the total column
 * @method     ChildAliCommissionBQuery groupByRcode() Group by the rcode column
 * @method     ChildAliCommissionBQuery groupByFdate() Group by the fdate column
 * @method     ChildAliCommissionBQuery groupByTdate() Group by the tdate column
 *
 * @method     ChildAliCommissionBQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCommissionBQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCommissionBQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCommissionBQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCommissionBQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCommissionBQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCommissionB findOne(ConnectionInterface $con = null) Return the first ChildAliCommissionB matching the query
 * @method     ChildAliCommissionB findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCommissionB matching the query, or a new ChildAliCommissionB object populated from the query conditions when no match is found
 *
 * @method     ChildAliCommissionB findOneById(int $id) Return the first ChildAliCommissionB filtered by the id column
 * @method     ChildAliCommissionB findOneByMcode(string $mcode) Return the first ChildAliCommissionB filtered by the mcode column
 * @method     ChildAliCommissionB findOneByNameT(string $name_t) Return the first ChildAliCommissionB filtered by the name_t column
 * @method     ChildAliCommissionB findOneByPosCur3(string $pos_cur3) Return the first ChildAliCommissionB filtered by the pos_cur3 column
 * @method     ChildAliCommissionB findOneByDmbonus(string $dmbonus) Return the first ChildAliCommissionB filtered by the dmbonus column
 * @method     ChildAliCommissionB findOneByEmbonus(string $embonus) Return the first ChildAliCommissionB filtered by the embonus column
 * @method     ChildAliCommissionB findOneByTotal(string $total) Return the first ChildAliCommissionB filtered by the total column
 * @method     ChildAliCommissionB findOneByRcode(int $rcode) Return the first ChildAliCommissionB filtered by the rcode column
 * @method     ChildAliCommissionB findOneByFdate(string $fdate) Return the first ChildAliCommissionB filtered by the fdate column
 * @method     ChildAliCommissionB findOneByTdate(string $tdate) Return the first ChildAliCommissionB filtered by the tdate column *

 * @method     ChildAliCommissionB requirePk($key, ConnectionInterface $con = null) Return the ChildAliCommissionB by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOne(ConnectionInterface $con = null) Return the first ChildAliCommissionB matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCommissionB requireOneById(int $id) Return the first ChildAliCommissionB filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByMcode(string $mcode) Return the first ChildAliCommissionB filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByNameT(string $name_t) Return the first ChildAliCommissionB filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByPosCur3(string $pos_cur3) Return the first ChildAliCommissionB filtered by the pos_cur3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByDmbonus(string $dmbonus) Return the first ChildAliCommissionB filtered by the dmbonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByEmbonus(string $embonus) Return the first ChildAliCommissionB filtered by the embonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByTotal(string $total) Return the first ChildAliCommissionB filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByRcode(int $rcode) Return the first ChildAliCommissionB filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByFdate(string $fdate) Return the first ChildAliCommissionB filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCommissionB requireOneByTdate(string $tdate) Return the first ChildAliCommissionB filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCommissionB[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCommissionB objects based on current ModelCriteria
 * @method     ChildAliCommissionB[]|ObjectCollection findById(int $id) Return ChildAliCommissionB objects filtered by the id column
 * @method     ChildAliCommissionB[]|ObjectCollection findByMcode(string $mcode) Return ChildAliCommissionB objects filtered by the mcode column
 * @method     ChildAliCommissionB[]|ObjectCollection findByNameT(string $name_t) Return ChildAliCommissionB objects filtered by the name_t column
 * @method     ChildAliCommissionB[]|ObjectCollection findByPosCur3(string $pos_cur3) Return ChildAliCommissionB objects filtered by the pos_cur3 column
 * @method     ChildAliCommissionB[]|ObjectCollection findByDmbonus(string $dmbonus) Return ChildAliCommissionB objects filtered by the dmbonus column
 * @method     ChildAliCommissionB[]|ObjectCollection findByEmbonus(string $embonus) Return ChildAliCommissionB objects filtered by the embonus column
 * @method     ChildAliCommissionB[]|ObjectCollection findByTotal(string $total) Return ChildAliCommissionB objects filtered by the total column
 * @method     ChildAliCommissionB[]|ObjectCollection findByRcode(int $rcode) Return ChildAliCommissionB objects filtered by the rcode column
 * @method     ChildAliCommissionB[]|ObjectCollection findByFdate(string $fdate) Return ChildAliCommissionB objects filtered by the fdate column
 * @method     ChildAliCommissionB[]|ObjectCollection findByTdate(string $tdate) Return ChildAliCommissionB objects filtered by the tdate column
 * @method     ChildAliCommissionB[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCommissionBQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCommissionBQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCommissionB', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCommissionBQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCommissionBQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCommissionBQuery) {
            return $criteria;
        }
        $query = new ChildAliCommissionBQuery();
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
     * @return ChildAliCommissionB|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliCommissionBTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliCommissionBTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliCommissionB A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode, name_t, pos_cur3, dmbonus, embonus, total, rcode, fdate, tdate FROM ali_commission_b WHERE id = :p0';
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
            /** @var ChildAliCommissionB $obj */
            $obj = new ChildAliCommissionB();
            $obj->hydrate($row);
            AliCommissionBTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliCommissionB|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliCommissionBTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliCommissionBTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the pos_cur3 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur3('fooValue');   // WHERE pos_cur3 = 'fooValue'
     * $query->filterByPosCur3('%fooValue%', Criteria::LIKE); // WHERE pos_cur3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByPosCur3($posCur3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_POS_CUR3, $posCur3, $comparison);
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByDmbonus($dmbonus = null, $comparison = null)
    {
        if (is_array($dmbonus)) {
            $useMinMax = false;
            if (isset($dmbonus['min'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_DMBONUS, $dmbonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dmbonus['max'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_DMBONUS, $dmbonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_DMBONUS, $dmbonus, $comparison);
    }

    /**
     * Filter the query on the embonus column
     *
     * Example usage:
     * <code>
     * $query->filterByEmbonus(1234); // WHERE embonus = 1234
     * $query->filterByEmbonus(array(12, 34)); // WHERE embonus IN (12, 34)
     * $query->filterByEmbonus(array('min' => 12)); // WHERE embonus > 12
     * </code>
     *
     * @param     mixed $embonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByEmbonus($embonus = null, $comparison = null)
    {
        if (is_array($embonus)) {
            $useMinMax = false;
            if (isset($embonus['min'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_EMBONUS, $embonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($embonus['max'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_EMBONUS, $embonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_EMBONUS, $embonus, $comparison);
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliCommissionBTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCommissionBTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCommissionB $aliCommissionB Object to remove from the list of results
     *
     * @return $this|ChildAliCommissionBQuery The current query, for fluid interface
     */
    public function prune($aliCommissionB = null)
    {
        if ($aliCommissionB) {
            $this->addUsingAlias(AliCommissionBTableMap::COL_ID, $aliCommissionB->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_commission_b table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCommissionBTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCommissionBTableMap::clearInstancePool();
            AliCommissionBTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCommissionBTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCommissionBTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCommissionBTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCommissionBTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCommissionBQuery
