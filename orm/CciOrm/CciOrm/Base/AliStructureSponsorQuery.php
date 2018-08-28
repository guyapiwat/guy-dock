<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStructureSponsor as ChildAliStructureSponsor;
use CciOrm\CciOrm\AliStructureSponsorQuery as ChildAliStructureSponsorQuery;
use CciOrm\CciOrm\Map\AliStructureSponsorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_structure_sponsor' table.
 *
 *
 *
 * @method     ChildAliStructureSponsorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliStructureSponsorQuery orderByMcodeIndex($order = Criteria::ASC) Order by the mcode_index column
 * @method     ChildAliStructureSponsorQuery orderByMcodeRef($order = Criteria::ASC) Order by the mcode_ref column
 * @method     ChildAliStructureSponsorQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliStructureSponsorQuery orderByLevel($order = Criteria::ASC) Order by the level column
 *
 * @method     ChildAliStructureSponsorQuery groupById() Group by the id column
 * @method     ChildAliStructureSponsorQuery groupByMcodeIndex() Group by the mcode_index column
 * @method     ChildAliStructureSponsorQuery groupByMcodeRef() Group by the mcode_ref column
 * @method     ChildAliStructureSponsorQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliStructureSponsorQuery groupByLevel() Group by the level column
 *
 * @method     ChildAliStructureSponsorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliStructureSponsorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliStructureSponsorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliStructureSponsorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliStructureSponsorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliStructureSponsorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliStructureSponsor findOne(ConnectionInterface $con = null) Return the first ChildAliStructureSponsor matching the query
 * @method     ChildAliStructureSponsor findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliStructureSponsor matching the query, or a new ChildAliStructureSponsor object populated from the query conditions when no match is found
 *
 * @method     ChildAliStructureSponsor findOneById(int $id) Return the first ChildAliStructureSponsor filtered by the id column
 * @method     ChildAliStructureSponsor findOneByMcodeIndex(string $mcode_index) Return the first ChildAliStructureSponsor filtered by the mcode_index column
 * @method     ChildAliStructureSponsor findOneByMcodeRef(string $mcode_ref) Return the first ChildAliStructureSponsor filtered by the mcode_ref column
 * @method     ChildAliStructureSponsor findOneByTotPv(int $tot_pv) Return the first ChildAliStructureSponsor filtered by the tot_pv column
 * @method     ChildAliStructureSponsor findOneByLevel(int $level) Return the first ChildAliStructureSponsor filtered by the level column *

 * @method     ChildAliStructureSponsor requirePk($key, ConnectionInterface $con = null) Return the ChildAliStructureSponsor by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureSponsor requireOne(ConnectionInterface $con = null) Return the first ChildAliStructureSponsor matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStructureSponsor requireOneById(int $id) Return the first ChildAliStructureSponsor filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureSponsor requireOneByMcodeIndex(string $mcode_index) Return the first ChildAliStructureSponsor filtered by the mcode_index column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureSponsor requireOneByMcodeRef(string $mcode_ref) Return the first ChildAliStructureSponsor filtered by the mcode_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureSponsor requireOneByTotPv(int $tot_pv) Return the first ChildAliStructureSponsor filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureSponsor requireOneByLevel(int $level) Return the first ChildAliStructureSponsor filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStructureSponsor[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliStructureSponsor objects based on current ModelCriteria
 * @method     ChildAliStructureSponsor[]|ObjectCollection findById(int $id) Return ChildAliStructureSponsor objects filtered by the id column
 * @method     ChildAliStructureSponsor[]|ObjectCollection findByMcodeIndex(string $mcode_index) Return ChildAliStructureSponsor objects filtered by the mcode_index column
 * @method     ChildAliStructureSponsor[]|ObjectCollection findByMcodeRef(string $mcode_ref) Return ChildAliStructureSponsor objects filtered by the mcode_ref column
 * @method     ChildAliStructureSponsor[]|ObjectCollection findByTotPv(int $tot_pv) Return ChildAliStructureSponsor objects filtered by the tot_pv column
 * @method     ChildAliStructureSponsor[]|ObjectCollection findByLevel(int $level) Return ChildAliStructureSponsor objects filtered by the level column
 * @method     ChildAliStructureSponsor[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliStructureSponsorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliStructureSponsorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliStructureSponsor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliStructureSponsorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliStructureSponsorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliStructureSponsorQuery) {
            return $criteria;
        }
        $query = new ChildAliStructureSponsorQuery();
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
     * @return ChildAliStructureSponsor|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliStructureSponsorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliStructureSponsorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliStructureSponsor A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mcode_index, mcode_ref, tot_pv, level FROM ali_structure_sponsor WHERE id = :p0';
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
            /** @var ChildAliStructureSponsor $obj */
            $obj = new ChildAliStructureSponsor();
            $obj->hydrate($row);
            AliStructureSponsorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliStructureSponsor|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliStructureSponsorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliStructureSponsorTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliStructureSponsorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliStructureSponsorTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliStructureSponsorQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliStructureSponsorTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliStructureSponsorTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureSponsorTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAliStructureSponsorQuery The current query, for fluid interface
     */
    public function filterByMcodeIndex($mcodeIndex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeIndex)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureSponsorTableMap::COL_MCODE_INDEX, $mcodeIndex, $comparison);
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
     * @return $this|ChildAliStructureSponsorQuery The current query, for fluid interface
     */
    public function filterByMcodeRef($mcodeRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureSponsorTableMap::COL_MCODE_REF, $mcodeRef, $comparison);
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
     * @return $this|ChildAliStructureSponsorQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliStructureSponsorTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliStructureSponsorTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureSponsorTableMap::COL_TOT_PV, $totPv, $comparison);
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
     * @return $this|ChildAliStructureSponsorQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(AliStructureSponsorTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(AliStructureSponsorTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureSponsorTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliStructureSponsor $aliStructureSponsor Object to remove from the list of results
     *
     * @return $this|ChildAliStructureSponsorQuery The current query, for fluid interface
     */
    public function prune($aliStructureSponsor = null)
    {
        if ($aliStructureSponsor) {
            $this->addUsingAlias(AliStructureSponsorTableMap::COL_ID, $aliStructureSponsor->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_structure_sponsor table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStructureSponsorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliStructureSponsorTableMap::clearInstancePool();
            AliStructureSponsorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStructureSponsorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliStructureSponsorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliStructureSponsorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliStructureSponsorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliStructureSponsorQuery
