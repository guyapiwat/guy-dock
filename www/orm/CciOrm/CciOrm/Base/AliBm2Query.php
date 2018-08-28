<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBm2 as ChildAliBm2;
use CciOrm\CciOrm\AliBm2Query as ChildAliBm2Query;
use CciOrm\CciOrm\Map\AliBm2TableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_bm2' table.
 *
 *
 *
 * @method     ChildAliBm2Query orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliBm2Query orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliBm2Query orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliBm2Query orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliBm2Query orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliBm2Query orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliBm2Query orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildAliBm2Query orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliBm2Query orderByBv($order = Criteria::ASC) Order by the bv column
 * @method     ChildAliBm2Query orderByGpv($order = Criteria::ASC) Order by the gpv column
 * @method     ChildAliBm2Query orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliBm2Query orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliBm2Query orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliBm2Query orderByTdate($order = Criteria::ASC) Order by the tdate column
 *
 * @method     ChildAliBm2Query groupById() Group by the id column
 * @method     ChildAliBm2Query groupByRcode() Group by the rcode column
 * @method     ChildAliBm2Query groupBySano() Group by the sano column
 * @method     ChildAliBm2Query groupByMcode() Group by the mcode column
 * @method     ChildAliBm2Query groupByUpaCode() Group by the upa_code column
 * @method     ChildAliBm2Query groupByLr() Group by the lr column
 * @method     ChildAliBm2Query groupByLevel() Group by the level column
 * @method     ChildAliBm2Query groupByPv() Group by the pv column
 * @method     ChildAliBm2Query groupByBv() Group by the bv column
 * @method     ChildAliBm2Query groupByGpv() Group by the gpv column
 * @method     ChildAliBm2Query groupByMpos() Group by the mpos column
 * @method     ChildAliBm2Query groupBySaType() Group by the sa_type column
 * @method     ChildAliBm2Query groupByFdate() Group by the fdate column
 * @method     ChildAliBm2Query groupByTdate() Group by the tdate column
 *
 * @method     ChildAliBm2Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBm2Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBm2Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBm2Query leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBm2Query rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBm2Query innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBm2 findOne(ConnectionInterface $con = null) Return the first ChildAliBm2 matching the query
 * @method     ChildAliBm2 findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBm2 matching the query, or a new ChildAliBm2 object populated from the query conditions when no match is found
 *
 * @method     ChildAliBm2 findOneById(int $id) Return the first ChildAliBm2 filtered by the id column
 * @method     ChildAliBm2 findOneByRcode(int $rcode) Return the first ChildAliBm2 filtered by the rcode column
 * @method     ChildAliBm2 findOneBySano(string $sano) Return the first ChildAliBm2 filtered by the sano column
 * @method     ChildAliBm2 findOneByMcode(string $mcode) Return the first ChildAliBm2 filtered by the mcode column
 * @method     ChildAliBm2 findOneByUpaCode(string $upa_code) Return the first ChildAliBm2 filtered by the upa_code column
 * @method     ChildAliBm2 findOneByLr(int $lr) Return the first ChildAliBm2 filtered by the lr column
 * @method     ChildAliBm2 findOneByLevel(int $level) Return the first ChildAliBm2 filtered by the level column
 * @method     ChildAliBm2 findOneByPv(string $pv) Return the first ChildAliBm2 filtered by the pv column
 * @method     ChildAliBm2 findOneByBv(string $bv) Return the first ChildAliBm2 filtered by the bv column
 * @method     ChildAliBm2 findOneByGpv(string $gpv) Return the first ChildAliBm2 filtered by the gpv column
 * @method     ChildAliBm2 findOneByMpos(string $mpos) Return the first ChildAliBm2 filtered by the mpos column
 * @method     ChildAliBm2 findOneBySaType(string $sa_type) Return the first ChildAliBm2 filtered by the sa_type column
 * @method     ChildAliBm2 findOneByFdate(string $fdate) Return the first ChildAliBm2 filtered by the fdate column
 * @method     ChildAliBm2 findOneByTdate(string $tdate) Return the first ChildAliBm2 filtered by the tdate column *

 * @method     ChildAliBm2 requirePk($key, ConnectionInterface $con = null) Return the ChildAliBm2 by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOne(ConnectionInterface $con = null) Return the first ChildAliBm2 matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBm2 requireOneById(int $id) Return the first ChildAliBm2 filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByRcode(int $rcode) Return the first ChildAliBm2 filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneBySano(string $sano) Return the first ChildAliBm2 filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByMcode(string $mcode) Return the first ChildAliBm2 filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByUpaCode(string $upa_code) Return the first ChildAliBm2 filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByLr(int $lr) Return the first ChildAliBm2 filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByLevel(int $level) Return the first ChildAliBm2 filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByPv(string $pv) Return the first ChildAliBm2 filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByBv(string $bv) Return the first ChildAliBm2 filtered by the bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByGpv(string $gpv) Return the first ChildAliBm2 filtered by the gpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByMpos(string $mpos) Return the first ChildAliBm2 filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneBySaType(string $sa_type) Return the first ChildAliBm2 filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByFdate(string $fdate) Return the first ChildAliBm2 filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBm2 requireOneByTdate(string $tdate) Return the first ChildAliBm2 filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBm2[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBm2 objects based on current ModelCriteria
 * @method     ChildAliBm2[]|ObjectCollection findById(int $id) Return ChildAliBm2 objects filtered by the id column
 * @method     ChildAliBm2[]|ObjectCollection findByRcode(int $rcode) Return ChildAliBm2 objects filtered by the rcode column
 * @method     ChildAliBm2[]|ObjectCollection findBySano(string $sano) Return ChildAliBm2 objects filtered by the sano column
 * @method     ChildAliBm2[]|ObjectCollection findByMcode(string $mcode) Return ChildAliBm2 objects filtered by the mcode column
 * @method     ChildAliBm2[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliBm2 objects filtered by the upa_code column
 * @method     ChildAliBm2[]|ObjectCollection findByLr(int $lr) Return ChildAliBm2 objects filtered by the lr column
 * @method     ChildAliBm2[]|ObjectCollection findByLevel(int $level) Return ChildAliBm2 objects filtered by the level column
 * @method     ChildAliBm2[]|ObjectCollection findByPv(string $pv) Return ChildAliBm2 objects filtered by the pv column
 * @method     ChildAliBm2[]|ObjectCollection findByBv(string $bv) Return ChildAliBm2 objects filtered by the bv column
 * @method     ChildAliBm2[]|ObjectCollection findByGpv(string $gpv) Return ChildAliBm2 objects filtered by the gpv column
 * @method     ChildAliBm2[]|ObjectCollection findByMpos(string $mpos) Return ChildAliBm2 objects filtered by the mpos column
 * @method     ChildAliBm2[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliBm2 objects filtered by the sa_type column
 * @method     ChildAliBm2[]|ObjectCollection findByFdate(string $fdate) Return ChildAliBm2 objects filtered by the fdate column
 * @method     ChildAliBm2[]|ObjectCollection findByTdate(string $tdate) Return ChildAliBm2 objects filtered by the tdate column
 * @method     ChildAliBm2[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBm2Query extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBm2Query object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBm2', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBm2Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBm2Query
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBm2Query) {
            return $criteria;
        }
        $query = new ChildAliBm2Query();
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
     * @return ChildAliBm2|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBm2TableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBm2TableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBm2 A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, sano, mcode, upa_code, lr, level, pv, bv, gpv, mpos, sa_type, fdate, tdate FROM ali_bm2 WHERE id = :p0';
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
            /** @var ChildAliBm2 $obj */
            $obj = new ChildAliBm2();
            $obj->hydrate($row);
            AliBm2TableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBm2|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBm2TableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBm2TableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sano)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_SANO, $sano, $comparison);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the upa_code column
     *
     * Example usage:
     * <code>
     * $query->filterByUpaCode('fooValue');   // WHERE upa_code = 'fooValue'
     * $query->filterByUpaCode('%fooValue%', Criteria::LIKE); // WHERE upa_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upaCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_UPA_CODE, $upaCode, $comparison);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (is_array($lr)) {
            $useMinMax = false;
            if (isset($lr['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_LR, $lr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lr['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_LR, $lr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_LR, $lr, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_LEVEL, $level, $comparison);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByBv($bv = null, $comparison = null)
    {
        if (is_array($bv)) {
            $useMinMax = false;
            if (isset($bv['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_BV, $bv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bv['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_BV, $bv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_BV, $bv, $comparison);
    }

    /**
     * Filter the query on the gpv column
     *
     * Example usage:
     * <code>
     * $query->filterByGpv(1234); // WHERE gpv = 1234
     * $query->filterByGpv(array(12, 34)); // WHERE gpv IN (12, 34)
     * $query->filterByGpv(array('min' => 12)); // WHERE gpv > 12
     * </code>
     *
     * @param     mixed $gpv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByGpv($gpv = null, $comparison = null)
    {
        if (is_array($gpv)) {
            $useMinMax = false;
            if (isset($gpv['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_GPV, $gpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gpv['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_GPV, $gpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_GPV, $gpv, $comparison);
    }

    /**
     * Filter the query on the mpos column
     *
     * Example usage:
     * <code>
     * $query->filterByMpos('fooValue');   // WHERE mpos = 'fooValue'
     * $query->filterByMpos('%fooValue%', Criteria::LIKE); // WHERE mpos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mpos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_MPOS, $mpos, $comparison);
    }

    /**
     * Filter the query on the sa_type column
     *
     * Example usage:
     * <code>
     * $query->filterBySaType('fooValue');   // WHERE sa_type = 'fooValue'
     * $query->filterBySaType('%fooValue%', Criteria::LIKE); // WHERE sa_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliBm2TableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBm2TableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBm2 $aliBm2 Object to remove from the list of results
     *
     * @return $this|ChildAliBm2Query The current query, for fluid interface
     */
    public function prune($aliBm2 = null)
    {
        if ($aliBm2) {
            $this->addUsingAlias(AliBm2TableMap::COL_ID, $aliBm2->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_bm2 table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBm2TableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBm2TableMap::clearInstancePool();
            AliBm2TableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBm2TableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBm2TableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBm2TableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBm2TableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBm2Query
