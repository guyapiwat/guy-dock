<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliLrDef as ChildAliLrDef;
use CciOrm\CciOrm\AliLrDefQuery as ChildAliLrDefQuery;
use CciOrm\CciOrm\Map\AliLrDefTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_lr_def' table.
 *
 *
 *
 * @method     ChildAliLrDefQuery orderByLrId($order = Criteria::ASC) Order by the lr_id column
 * @method     ChildAliLrDefQuery orderByLrName($order = Criteria::ASC) Order by the lr_name column
 *
 * @method     ChildAliLrDefQuery groupByLrId() Group by the lr_id column
 * @method     ChildAliLrDefQuery groupByLrName() Group by the lr_name column
 *
 * @method     ChildAliLrDefQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliLrDefQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliLrDefQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliLrDefQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliLrDefQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliLrDefQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliLrDef findOne(ConnectionInterface $con = null) Return the first ChildAliLrDef matching the query
 * @method     ChildAliLrDef findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliLrDef matching the query, or a new ChildAliLrDef object populated from the query conditions when no match is found
 *
 * @method     ChildAliLrDef findOneByLrId(int $lr_id) Return the first ChildAliLrDef filtered by the lr_id column
 * @method     ChildAliLrDef findOneByLrName(string $lr_name) Return the first ChildAliLrDef filtered by the lr_name column *

 * @method     ChildAliLrDef requirePk($key, ConnectionInterface $con = null) Return the ChildAliLrDef by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLrDef requireOne(ConnectionInterface $con = null) Return the first ChildAliLrDef matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLrDef requireOneByLrId(int $lr_id) Return the first ChildAliLrDef filtered by the lr_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliLrDef requireOneByLrName(string $lr_name) Return the first ChildAliLrDef filtered by the lr_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliLrDef[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliLrDef objects based on current ModelCriteria
 * @method     ChildAliLrDef[]|ObjectCollection findByLrId(int $lr_id) Return ChildAliLrDef objects filtered by the lr_id column
 * @method     ChildAliLrDef[]|ObjectCollection findByLrName(string $lr_name) Return ChildAliLrDef objects filtered by the lr_name column
 * @method     ChildAliLrDef[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliLrDefQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliLrDefQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliLrDef', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliLrDefQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliLrDefQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliLrDefQuery) {
            return $criteria;
        }
        $query = new ChildAliLrDefQuery();
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
     * @return ChildAliLrDef|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliLrDef object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliLrDef object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliLrDefQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliLrDef object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliLrDefQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliLrDef object has no primary key');
    }

    /**
     * Filter the query on the lr_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLrId(1234); // WHERE lr_id = 1234
     * $query->filterByLrId(array(12, 34)); // WHERE lr_id IN (12, 34)
     * $query->filterByLrId(array('min' => 12)); // WHERE lr_id > 12
     * </code>
     *
     * @param     mixed $lrId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLrDefQuery The current query, for fluid interface
     */
    public function filterByLrId($lrId = null, $comparison = null)
    {
        if (is_array($lrId)) {
            $useMinMax = false;
            if (isset($lrId['min'])) {
                $this->addUsingAlias(AliLrDefTableMap::COL_LR_ID, $lrId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lrId['max'])) {
                $this->addUsingAlias(AliLrDefTableMap::COL_LR_ID, $lrId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLrDefTableMap::COL_LR_ID, $lrId, $comparison);
    }

    /**
     * Filter the query on the lr_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLrName('fooValue');   // WHERE lr_name = 'fooValue'
     * $query->filterByLrName('%fooValue%', Criteria::LIKE); // WHERE lr_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lrName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliLrDefQuery The current query, for fluid interface
     */
    public function filterByLrName($lrName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lrName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliLrDefTableMap::COL_LR_NAME, $lrName, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliLrDef $aliLrDef Object to remove from the list of results
     *
     * @return $this|ChildAliLrDefQuery The current query, for fluid interface
     */
    public function prune($aliLrDef = null)
    {
        if ($aliLrDef) {
            throw new LogicException('AliLrDef object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_lr_def table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLrDefTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliLrDefTableMap::clearInstancePool();
            AliLrDefTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLrDefTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliLrDefTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliLrDefTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliLrDefTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliLrDefQuery
