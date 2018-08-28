<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMm as ChildAliMm;
use CciOrm\CciOrm\AliMmQuery as ChildAliMmQuery;
use CciOrm\CciOrm\Map\AliMmTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_mm' table.
 *
 *
 *
 * @method     ChildAliMmQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliMmQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliMmQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliMmQuery orderByUpaCode($order = Criteria::ASC) Order by the upa_code column
 * @method     ChildAliMmQuery orderByLr($order = Criteria::ASC) Order by the lr column
 * @method     ChildAliMmQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliMmQuery orderByGpv($order = Criteria::ASC) Order by the gpv column
 * @method     ChildAliMmQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliMmQuery orderByNpos($order = Criteria::ASC) Order by the npos column
 *
 * @method     ChildAliMmQuery groupById() Group by the id column
 * @method     ChildAliMmQuery groupByRcode() Group by the rcode column
 * @method     ChildAliMmQuery groupByMcode() Group by the mcode column
 * @method     ChildAliMmQuery groupByUpaCode() Group by the upa_code column
 * @method     ChildAliMmQuery groupByLr() Group by the lr column
 * @method     ChildAliMmQuery groupByPv() Group by the pv column
 * @method     ChildAliMmQuery groupByGpv() Group by the gpv column
 * @method     ChildAliMmQuery groupByMpos() Group by the mpos column
 * @method     ChildAliMmQuery groupByNpos() Group by the npos column
 *
 * @method     ChildAliMmQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliMmQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliMmQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliMmQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliMmQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliMmQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliMm findOne(ConnectionInterface $con = null) Return the first ChildAliMm matching the query
 * @method     ChildAliMm findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliMm matching the query, or a new ChildAliMm object populated from the query conditions when no match is found
 *
 * @method     ChildAliMm findOneById(int $id) Return the first ChildAliMm filtered by the id column
 * @method     ChildAliMm findOneByRcode(int $rcode) Return the first ChildAliMm filtered by the rcode column
 * @method     ChildAliMm findOneByMcode(string $mcode) Return the first ChildAliMm filtered by the mcode column
 * @method     ChildAliMm findOneByUpaCode(string $upa_code) Return the first ChildAliMm filtered by the upa_code column
 * @method     ChildAliMm findOneByLr(int $lr) Return the first ChildAliMm filtered by the lr column
 * @method     ChildAliMm findOneByPv(string $pv) Return the first ChildAliMm filtered by the pv column
 * @method     ChildAliMm findOneByGpv(string $gpv) Return the first ChildAliMm filtered by the gpv column
 * @method     ChildAliMm findOneByMpos(string $mpos) Return the first ChildAliMm filtered by the mpos column
 * @method     ChildAliMm findOneByNpos(string $npos) Return the first ChildAliMm filtered by the npos column *

 * @method     ChildAliMm requirePk($key, ConnectionInterface $con = null) Return the ChildAliMm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOne(ConnectionInterface $con = null) Return the first ChildAliMm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMm requireOneById(int $id) Return the first ChildAliMm filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOneByRcode(int $rcode) Return the first ChildAliMm filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOneByMcode(string $mcode) Return the first ChildAliMm filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOneByUpaCode(string $upa_code) Return the first ChildAliMm filtered by the upa_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOneByLr(int $lr) Return the first ChildAliMm filtered by the lr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOneByPv(string $pv) Return the first ChildAliMm filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOneByGpv(string $gpv) Return the first ChildAliMm filtered by the gpv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOneByMpos(string $mpos) Return the first ChildAliMm filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliMm requireOneByNpos(string $npos) Return the first ChildAliMm filtered by the npos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliMm[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliMm objects based on current ModelCriteria
 * @method     ChildAliMm[]|ObjectCollection findById(int $id) Return ChildAliMm objects filtered by the id column
 * @method     ChildAliMm[]|ObjectCollection findByRcode(int $rcode) Return ChildAliMm objects filtered by the rcode column
 * @method     ChildAliMm[]|ObjectCollection findByMcode(string $mcode) Return ChildAliMm objects filtered by the mcode column
 * @method     ChildAliMm[]|ObjectCollection findByUpaCode(string $upa_code) Return ChildAliMm objects filtered by the upa_code column
 * @method     ChildAliMm[]|ObjectCollection findByLr(int $lr) Return ChildAliMm objects filtered by the lr column
 * @method     ChildAliMm[]|ObjectCollection findByPv(string $pv) Return ChildAliMm objects filtered by the pv column
 * @method     ChildAliMm[]|ObjectCollection findByGpv(string $gpv) Return ChildAliMm objects filtered by the gpv column
 * @method     ChildAliMm[]|ObjectCollection findByMpos(string $mpos) Return ChildAliMm objects filtered by the mpos column
 * @method     ChildAliMm[]|ObjectCollection findByNpos(string $npos) Return ChildAliMm objects filtered by the npos column
 * @method     ChildAliMm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliMmQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliMmQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliMm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliMmQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliMmQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliMmQuery) {
            return $criteria;
        }
        $query = new ChildAliMmQuery();
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
     * @return ChildAliMm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliMmTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliMmTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliMm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode, upa_code, lr, pv, gpv, mpos, npos FROM ali_mm WHERE id = :p0';
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
            /** @var ChildAliMm $obj */
            $obj = new ChildAliMm();
            $obj->hydrate($row);
            AliMmTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliMm|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliMmTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliMmTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliMmTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliMmTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliMmTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliMmTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByUpaCode($upaCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upaCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_UPA_CODE, $upaCode, $comparison);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByLr($lr = null, $comparison = null)
    {
        if (is_array($lr)) {
            $useMinMax = false;
            if (isset($lr['min'])) {
                $this->addUsingAlias(AliMmTableMap::COL_LR, $lr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lr['max'])) {
                $this->addUsingAlias(AliMmTableMap::COL_LR, $lr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_LR, $lr, $comparison);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliMmTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliMmTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_PV, $pv, $comparison);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByGpv($gpv = null, $comparison = null)
    {
        if (is_array($gpv)) {
            $useMinMax = false;
            if (isset($gpv['min'])) {
                $this->addUsingAlias(AliMmTableMap::COL_GPV, $gpv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gpv['max'])) {
                $this->addUsingAlias(AliMmTableMap::COL_GPV, $gpv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_GPV, $gpv, $comparison);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_MPOS, $mpos, $comparison);
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
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function filterByNpos($npos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliMmTableMap::COL_NPOS, $npos, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliMm $aliMm Object to remove from the list of results
     *
     * @return $this|ChildAliMmQuery The current query, for fluid interface
     */
    public function prune($aliMm = null)
    {
        if ($aliMm) {
            $this->addUsingAlias(AliMmTableMap::COL_ID, $aliMm->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_mm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMmTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliMmTableMap::clearInstancePool();
            AliMmTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMmTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliMmTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliMmTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliMmTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliMmQuery
