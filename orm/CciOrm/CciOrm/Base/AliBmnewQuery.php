<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBmnew as ChildAliBmnew;
use CciOrm\CciOrm\AliBmnewQuery as ChildAliBmnewQuery;
use CciOrm\CciOrm\Map\AliBmnewTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_bmnew' table.
 *
 *
 *
 * @method     ChildAliBmnewQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliBmnewQuery orderByCarryL($order = Criteria::ASC) Order by the carry_l column
 * @method     ChildAliBmnewQuery orderByCarryC($order = Criteria::ASC) Order by the carry_c column
 * @method     ChildAliBmnewQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 *
 * @method     ChildAliBmnewQuery groupById() Group by the id column
 * @method     ChildAliBmnewQuery groupByCarryL() Group by the carry_l column
 * @method     ChildAliBmnewQuery groupByCarryC() Group by the carry_c column
 * @method     ChildAliBmnewQuery groupByMcode() Group by the mcode column
 *
 * @method     ChildAliBmnewQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliBmnewQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliBmnewQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliBmnewQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliBmnewQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliBmnewQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliBmnew findOne(ConnectionInterface $con = null) Return the first ChildAliBmnew matching the query
 * @method     ChildAliBmnew findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliBmnew matching the query, or a new ChildAliBmnew object populated from the query conditions when no match is found
 *
 * @method     ChildAliBmnew findOneById(int $id) Return the first ChildAliBmnew filtered by the id column
 * @method     ChildAliBmnew findOneByCarryL(int $carry_l) Return the first ChildAliBmnew filtered by the carry_l column
 * @method     ChildAliBmnew findOneByCarryC(int $carry_c) Return the first ChildAliBmnew filtered by the carry_c column
 * @method     ChildAliBmnew findOneByMcode(string $mcode) Return the first ChildAliBmnew filtered by the mcode column *

 * @method     ChildAliBmnew requirePk($key, ConnectionInterface $con = null) Return the ChildAliBmnew by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmnew requireOne(ConnectionInterface $con = null) Return the first ChildAliBmnew matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBmnew requireOneById(int $id) Return the first ChildAliBmnew filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmnew requireOneByCarryL(int $carry_l) Return the first ChildAliBmnew filtered by the carry_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmnew requireOneByCarryC(int $carry_c) Return the first ChildAliBmnew filtered by the carry_c column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliBmnew requireOneByMcode(string $mcode) Return the first ChildAliBmnew filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliBmnew[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliBmnew objects based on current ModelCriteria
 * @method     ChildAliBmnew[]|ObjectCollection findById(int $id) Return ChildAliBmnew objects filtered by the id column
 * @method     ChildAliBmnew[]|ObjectCollection findByCarryL(int $carry_l) Return ChildAliBmnew objects filtered by the carry_l column
 * @method     ChildAliBmnew[]|ObjectCollection findByCarryC(int $carry_c) Return ChildAliBmnew objects filtered by the carry_c column
 * @method     ChildAliBmnew[]|ObjectCollection findByMcode(string $mcode) Return ChildAliBmnew objects filtered by the mcode column
 * @method     ChildAliBmnew[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliBmnewQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliBmnewQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliBmnew', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliBmnewQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliBmnewQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliBmnewQuery) {
            return $criteria;
        }
        $query = new ChildAliBmnewQuery();
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
     * @return ChildAliBmnew|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliBmnewTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliBmnewTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliBmnew A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, carry_l, carry_c, mcode FROM ali_bmnew WHERE id = :p0';
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
            /** @var ChildAliBmnew $obj */
            $obj = new ChildAliBmnew();
            $obj->hydrate($row);
            AliBmnewTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliBmnew|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliBmnewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliBmnewTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliBmnewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliBmnewTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliBmnewQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliBmnewTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliBmnewTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmnewTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the carry_l column
     *
     * Example usage:
     * <code>
     * $query->filterByCarryL(1234); // WHERE carry_l = 1234
     * $query->filterByCarryL(array(12, 34)); // WHERE carry_l IN (12, 34)
     * $query->filterByCarryL(array('min' => 12)); // WHERE carry_l > 12
     * </code>
     *
     * @param     mixed $carryL The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmnewQuery The current query, for fluid interface
     */
    public function filterByCarryL($carryL = null, $comparison = null)
    {
        if (is_array($carryL)) {
            $useMinMax = false;
            if (isset($carryL['min'])) {
                $this->addUsingAlias(AliBmnewTableMap::COL_CARRY_L, $carryL['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryL['max'])) {
                $this->addUsingAlias(AliBmnewTableMap::COL_CARRY_L, $carryL['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmnewTableMap::COL_CARRY_L, $carryL, $comparison);
    }

    /**
     * Filter the query on the carry_c column
     *
     * Example usage:
     * <code>
     * $query->filterByCarryC(1234); // WHERE carry_c = 1234
     * $query->filterByCarryC(array(12, 34)); // WHERE carry_c IN (12, 34)
     * $query->filterByCarryC(array('min' => 12)); // WHERE carry_c > 12
     * </code>
     *
     * @param     mixed $carryC The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliBmnewQuery The current query, for fluid interface
     */
    public function filterByCarryC($carryC = null, $comparison = null)
    {
        if (is_array($carryC)) {
            $useMinMax = false;
            if (isset($carryC['min'])) {
                $this->addUsingAlias(AliBmnewTableMap::COL_CARRY_C, $carryC['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carryC['max'])) {
                $this->addUsingAlias(AliBmnewTableMap::COL_CARRY_C, $carryC['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmnewTableMap::COL_CARRY_C, $carryC, $comparison);
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
     * @return $this|ChildAliBmnewQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliBmnewTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliBmnew $aliBmnew Object to remove from the list of results
     *
     * @return $this|ChildAliBmnewQuery The current query, for fluid interface
     */
    public function prune($aliBmnew = null)
    {
        if ($aliBmnew) {
            $this->addUsingAlias(AliBmnewTableMap::COL_ID, $aliBmnew->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_bmnew table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmnewTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliBmnewTableMap::clearInstancePool();
            AliBmnewTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmnewTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliBmnewTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliBmnewTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliBmnewTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliBmnewQuery
