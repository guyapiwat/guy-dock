<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliPospvTmp as ChildAliPospvTmp;
use CciOrm\CciOrm\AliPospvTmpQuery as ChildAliPospvTmpQuery;
use CciOrm\CciOrm\Map\AliPospvTmpTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_pospv_tmp' table.
 *
 *
 *
 * @method     ChildAliPospvTmpQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliPospvTmpQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliPospvTmpQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliPospvTmpQuery orderByOpos($order = Criteria::ASC) Order by the opos column
 * @method     ChildAliPospvTmpQuery orderByNpos($order = Criteria::ASC) Order by the npos column
 * @method     ChildAliPospvTmpQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliPospvTmpQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliPospvTmpQuery orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliPospvTmpQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliPospvTmpQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 *
 * @method     ChildAliPospvTmpQuery groupByAid() Group by the aid column
 * @method     ChildAliPospvTmpQuery groupByRcode() Group by the rcode column
 * @method     ChildAliPospvTmpQuery groupByMcode() Group by the mcode column
 * @method     ChildAliPospvTmpQuery groupByOpos() Group by the opos column
 * @method     ChildAliPospvTmpQuery groupByNpos() Group by the npos column
 * @method     ChildAliPospvTmpQuery groupByNameT() Group by the name_t column
 * @method     ChildAliPospvTmpQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliPospvTmpQuery groupByLr() Group by the lr column
 * @method     ChildAliPospvTmpQuery groupByFdate() Group by the fdate column
 * @method     ChildAliPospvTmpQuery groupByTdate() Group by the tdate column
 *
 * @method     ChildAliPospvTmpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPospvTmpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPospvTmpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPospvTmpQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPospvTmpQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPospvTmpQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPospvTmp findOne(ConnectionInterface $con = null) Return the first ChildAliPospvTmp matching the query
 * @method     ChildAliPospvTmp findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPospvTmp matching the query, or a new ChildAliPospvTmp object populated from the query conditions when no match is found
 *
 * @method     ChildAliPospvTmp findOneByAid(int $aid) Return the first ChildAliPospvTmp filtered by the aid column
 * @method     ChildAliPospvTmp findOneByRcode(int $rcode) Return the first ChildAliPospvTmp filtered by the rcode column
 * @method     ChildAliPospvTmp findOneByMcode(string $mcode) Return the first ChildAliPospvTmp filtered by the mcode column
 * @method     ChildAliPospvTmp findOneByOpos(string $opos) Return the first ChildAliPospvTmp filtered by the opos column
 * @method     ChildAliPospvTmp findOneByNpos(string $npos) Return the first ChildAliPospvTmp filtered by the npos column
 * @method     ChildAliPospvTmp findOneByNameT(string $name_t) Return the first ChildAliPospvTmp filtered by the name_t column
 * @method     ChildAliPospvTmp findOneBySpCode(string $sp_code) Return the first ChildAliPospvTmp filtered by the sp_code column
 * @method     ChildAliPospvTmp findOneByLr(int $lr) Return the first ChildAliPospvTmp filtered by the lr column
 * @method     ChildAliPospvTmp findOneByFdate(string $fdate) Return the first ChildAliPospvTmp filtered by the fdate column
 * @method     ChildAliPospvTmp findOneByTdate(string $tdate) Return the first ChildAliPospvTmp filtered by the tdate column *

 * @method     ChildAliPospvTmp requirePk($key, ConnectionInterface $con = null) Return the ChildAliPospvTmp by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOne(ConnectionInterface $con = null) Return the first ChildAliPospvTmp matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPospvTmp requireOneByAid(int $aid) Return the first ChildAliPospvTmp filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneByRcode(int $rcode) Return the first ChildAliPospvTmp filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneByMcode(string $mcode) Return the first ChildAliPospvTmp filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneByOpos(string $opos) Return the first ChildAliPospvTmp filtered by the opos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneByNpos(string $npos) Return the first ChildAliPospvTmp filtered by the npos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneByNameT(string $name_t) Return the first ChildAliPospvTmp filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneBySpCode(string $sp_code) Return the first ChildAliPospvTmp filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneByLr(int $lr) Return the first ChildAliPospvTmp filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneByFdate(string $fdate) Return the first ChildAliPospvTmp filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPospvTmp requireOneByTdate(string $tdate) Return the first ChildAliPospvTmp filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPospvTmp[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPospvTmp objects based on current ModelCriteria
 * @method     ChildAliPospvTmp[]|ObjectCollection findByAid(int $aid) Return ChildAliPospvTmp objects filtered by the aid column
 * @method     ChildAliPospvTmp[]|ObjectCollection findByRcode(int $rcode) Return ChildAliPospvTmp objects filtered by the rcode column
 * @method     ChildAliPospvTmp[]|ObjectCollection findByMcode(string $mcode) Return ChildAliPospvTmp objects filtered by the mcode column
 * @method     ChildAliPospvTmp[]|ObjectCollection findByOpos(string $opos) Return ChildAliPospvTmp objects filtered by the opos column
 * @method     ChildAliPospvTmp[]|ObjectCollection findByNpos(string $npos) Return ChildAliPospvTmp objects filtered by the npos column
 * @method     ChildAliPospvTmp[]|ObjectCollection findByNameT(string $name_t) Return ChildAliPospvTmp objects filtered by the name_t column
 * @method     ChildAliPospvTmp[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliPospvTmp objects filtered by the sp_code column
 * @method     ChildAliPospvTmp[]|ObjectCollection findByLr(int $lr) Return ChildAliPospvTmp objects filtered by the lr column
 * @method     ChildAliPospvTmp[]|ObjectCollection findByFdate(string $fdate) Return ChildAliPospvTmp objects filtered by the fdate column
 * @method     ChildAliPospvTmp[]|ObjectCollection findByTdate(string $tdate) Return ChildAliPospvTmp objects filtered by the tdate column
 * @method     ChildAliPospvTmp[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPospvTmpQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPospvTmpQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPospvTmp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPospvTmpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPospvTmpQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPospvTmpQuery) {
            return $criteria;
        }
        $query = new ChildAliPospvTmpQuery();
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
     * @return ChildAliPospvTmp|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliPospvTmpTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliPospvTmpTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliPospvTmp A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, opos, npos, name_t, sp_code, lr, fdate, tdate FROM ali_pospv_tmp WHERE aid = :p0';
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
            /** @var ChildAliPospvTmp $obj */
            $obj = new ChildAliPospvTmp();
            $obj->hydrate($row);
            AliPospvTmpTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliPospvTmp|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_AID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the aid column
     *
     * Example usage:
     * <code>
     * $query->filterByAid(1234); // WHERE aid = 1234
     * $query->filterByAid(array(12, 34)); // WHERE aid IN (12, 34)
     * $query->filterByAid(array('min' => 12)); // WHERE aid > 12
     * </code>
     *
     * @param     mixed $aid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_AID, $aid, $comparison);
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
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the opos column
     *
     * Example usage:
     * <code>
     * $query->filterByOpos('fooValue');   // WHERE opos = 'fooValue'
     * $query->filterByOpos('%fooValue%', Criteria::LIKE); // WHERE opos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $opos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByOpos($opos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($opos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_OPOS, $opos, $comparison);
    }

    /**
     * Filter the query on the npos column
     *
     * Example usage:
     * <code>
     * $query->filterByNpos('fooValue');   // WHERE npos = 'fooValue'
     * $query->filterByNpos('%fooValue%', Criteria::LIKE); // WHERE npos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByNpos($npos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_NPOS, $npos, $comparison);
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
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the sp_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySpCode('fooValue');   // WHERE sp_code = 'fooValue'
     * $query->filterBySpCode('%fooValue%', Criteria::LIKE); // WHERE sp_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_SP_CODE, $spCode, $comparison);
    }

    /**
     * Filter the query on the lr column
     *
     * Example usage:
     * <code>
     * $query->filterByLr(1234); // WHERE lr = 1234
     * $query->filterByLr(array(12, 34)); // WHERE lr IN (12, 34)
     * $query->filterByLr(array('min' => 12)); // WHERE lr > 12
     * </code>
     *
     * @param     mixed $lr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (is_array($lr)) {
            $useMinMax = false;
            if (isset($lr['min'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_LR, $lr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lr['max'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_LR, $lr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_LR, $lr, $comparison);
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
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliPospvTmpTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPospvTmpTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPospvTmp $aliPospvTmp Object to remove from the list of results
     *
     * @return $this|ChildAliPospvTmpQuery The current query, for fluid interface
     */
    public function prune($aliPospvTmp = null)
    {
        if ($aliPospvTmp) {
            $this->addUsingAlias(AliPospvTmpTableMap::COL_AID, $aliPospvTmp->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_pospv_tmp table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPospvTmpTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPospvTmpTableMap::clearInstancePool();
            AliPospvTmpTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPospvTmpTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPospvTmpTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPospvTmpTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPospvTmpTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPospvTmpQuery
