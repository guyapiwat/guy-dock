<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStructureBinary as ChildAliStructureBinary;
use CciOrm\CciOrm\AliStructureBinaryQuery as ChildAliStructureBinaryQuery;
use CciOrm\CciOrm\Map\AliStructureBinaryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_structure_binary' table.
 *
 *
 *
 * @method     ChildAliStructureBinaryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliStructureBinaryQuery orderByMcodeIndex($order = Criteria::ASC) Order by the mcode_index column
 * @method     ChildAliStructureBinaryQuery orderByMcodeRef($order = Criteria::ASC) Order by the mcode_ref column
 * @method     ChildAliStructureBinaryQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliStructureBinaryQuery orderByLevel($order = Criteria::ASC) Order by the level column
 *
 * @method     ChildAliStructureBinaryQuery groupById() Group by the id column
 * @method     ChildAliStructureBinaryQuery groupByMcodeIndex() Group by the mcode_index column
 * @method     ChildAliStructureBinaryQuery groupByMcodeRef() Group by the mcode_ref column
 * @method     ChildAliStructureBinaryQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliStructureBinaryQuery groupByLevel() Group by the level column
 *
 * @method     ChildAliStructureBinaryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliStructureBinaryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliStructureBinaryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliStructureBinaryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliStructureBinaryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliStructureBinaryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliStructureBinary findOne(ConnectionInterface $con = null) Return the first ChildAliStructureBinary matching the query
 * @method     ChildAliStructureBinary findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliStructureBinary matching the query, or a new ChildAliStructureBinary object populated from the query conditions when no match is found
 *
 * @method     ChildAliStructureBinary findOneById(int $id) Return the first ChildAliStructureBinary filtered by the id column
 * @method     ChildAliStructureBinary findOneByMcodeIndex(string $mcode_index) Return the first ChildAliStructureBinary filtered by the mcode_index column
 * @method     ChildAliStructureBinary findOneByMcodeRef(string $mcode_ref) Return the first ChildAliStructureBinary filtered by the mcode_ref column
 * @method     ChildAliStructureBinary findOneByTotPv(int $tot_pv) Return the first ChildAliStructureBinary filtered by the tot_pv column
 * @method     ChildAliStructureBinary findOneByLevel(int $level) Return the first ChildAliStructureBinary filtered by the level column *

 * @method     ChildAliStructureBinary requirePk($key, ConnectionInterface $con = null) Return the ChildAliStructureBinary by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinary requireOne(ConnectionInterface $con = null) Return the first ChildAliStructureBinary matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStructureBinary requireOneById(int $id) Return the first ChildAliStructureBinary filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinary requireOneByMcodeIndex(string $mcode_index) Return the first ChildAliStructureBinary filtered by the mcode_index column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinary requireOneByMcodeRef(string $mcode_ref) Return the first ChildAliStructureBinary filtered by the mcode_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinary requireOneByTotPv(int $tot_pv) Return the first ChildAliStructureBinary filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinary requireOneByLevel(int $level) Return the first ChildAliStructureBinary filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStructureBinary[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliStructureBinary objects based on current ModelCriteria
 * @method     ChildAliStructureBinary[]|ObjectCollection findById(int $id) Return ChildAliStructureBinary objects filtered by the id column
 * @method     ChildAliStructureBinary[]|ObjectCollection findByMcodeIndex(string $mcode_index) Return ChildAliStructureBinary objects filtered by the mcode_index column
 * @method     ChildAliStructureBinary[]|ObjectCollection findByMcodeRef(string $mcode_ref) Return ChildAliStructureBinary objects filtered by the mcode_ref column
 * @method     ChildAliStructureBinary[]|ObjectCollection findByTotPv(int $tot_pv) Return ChildAliStructureBinary objects filtered by the tot_pv column
 * @method     ChildAliStructureBinary[]|ObjectCollection findByLevel(int $level) Return ChildAliStructureBinary objects filtered by the level column
 * @method     ChildAliStructureBinary[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliStructureBinaryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliStructureBinaryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliStructureBinary', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliStructureBinaryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliStructureBinaryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliStructureBinaryQuery) {
            return $criteria;
        }
        $query = new ChildAliStructureBinaryQuery();
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
     * @return ChildAliStructureBinary|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliStructureBinaryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliStructureBinaryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliStructureBinary A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode_index, mcode_ref, tot_pv, level FROM ali_structure_binary WHERE id = :p0';
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
            /** @var ChildAliStructureBinary $obj */
            $obj = new ChildAliStructureBinary();
            $obj->hydrate($row);
            AliStructureBinaryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliStructureBinary|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliStructureBinaryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliStructureBinaryTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliStructureBinaryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliStructureBinaryTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliStructureBinaryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliStructureBinaryTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliStructureBinaryTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the mcode_index column
     *
     * Example usage:
     * <code>
     * $query->filterByMcodeIndex('fooValue');   // WHERE mcode_index = 'fooValue'
     * $query->filterByMcodeIndex('%fooValue%', Criteria::LIKE); // WHERE mcode_index LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcodeIndex The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryQuery The current query, for fluid interface
     */
    public function filterByMcodeIndex($mcodeIndex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeIndex)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryTableMap::COL_MCODE_INDEX, $mcodeIndex, $comparison);
    }

    /**
     * Filter the query on the mcode_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByMcodeRef('fooValue');   // WHERE mcode_ref = 'fooValue'
     * $query->filterByMcodeRef('%fooValue%', Criteria::LIKE); // WHERE mcode_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcodeRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryQuery The current query, for fluid interface
     */
    public function filterByMcodeRef($mcodeRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryTableMap::COL_MCODE_REF, $mcodeRef, $comparison);
    }

    /**
     * Filter the query on the tot_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotPv(1234); // WHERE tot_pv = 1234
     * $query->filterByTotPv(array(12, 34)); // WHERE tot_pv IN (12, 34)
     * $query->filterByTotPv(array('min' => 12)); // WHERE tot_pv > 12
     * </code>
     *
     * @param     mixed $totPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliStructureBinaryTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliStructureBinaryTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliStructureBinaryQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliStructureBinaryTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliStructureBinaryTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliStructureBinary $aliStructureBinary Object to remove from the list of results
     *
     * @return $this|ChildAliStructureBinaryQuery The current query, for fluid interface
     */
    public function prune($aliStructureBinary = null)
    {
        if ($aliStructureBinary) {
            $this->addUsingAlias(AliStructureBinaryTableMap::COL_ID, $aliStructureBinary->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_structure_binary table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStructureBinaryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliStructureBinaryTableMap::clearInstancePool();
            AliStructureBinaryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStructureBinaryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliStructureBinaryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliStructureBinaryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliStructureBinaryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliStructureBinaryQuery
