<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliCronjob as ChildAliCronjob;
use CciOrm\CciOrm\AliCronjobQuery as ChildAliCronjobQuery;
use CciOrm\CciOrm\Map\AliCronjobTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_cronjob' table.
 *
 *
 *
 * @method     ChildAliCronjobQuery orderByCstatus($order = Criteria::ASC) Order by the cstatus column
 * @method     ChildAliCronjobQuery orderByCtype($order = Criteria::ASC) Order by the ctype column
 * @method     ChildAliCronjobQuery orderByCfdate($order = Criteria::ASC) Order by the cfdate column
 * @method     ChildAliCronjobQuery orderByCtdate($order = Criteria::ASC) Order by the ctdate column
 * @method     ChildAliCronjobQuery orderByCtime($order = Criteria::ASC) Order by the ctime column
 *
 * @method     ChildAliCronjobQuery groupByCstatus() Group by the cstatus column
 * @method     ChildAliCronjobQuery groupByCtype() Group by the ctype column
 * @method     ChildAliCronjobQuery groupByCfdate() Group by the cfdate column
 * @method     ChildAliCronjobQuery groupByCtdate() Group by the ctdate column
 * @method     ChildAliCronjobQuery groupByCtime() Group by the ctime column
 *
 * @method     ChildAliCronjobQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliCronjobQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliCronjobQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliCronjobQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliCronjobQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliCronjobQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliCronjob findOne(ConnectionInterface $con = null) Return the first ChildAliCronjob matching the query
 * @method     ChildAliCronjob findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliCronjob matching the query, or a new ChildAliCronjob object populated from the query conditions when no match is found
 *
 * @method     ChildAliCronjob findOneByCstatus(int $cstatus) Return the first ChildAliCronjob filtered by the cstatus column
 * @method     ChildAliCronjob findOneByCtype(int $ctype) Return the first ChildAliCronjob filtered by the ctype column
 * @method     ChildAliCronjob findOneByCfdate(string $cfdate) Return the first ChildAliCronjob filtered by the cfdate column
 * @method     ChildAliCronjob findOneByCtdate(string $ctdate) Return the first ChildAliCronjob filtered by the ctdate column
 * @method     ChildAliCronjob findOneByCtime(string $ctime) Return the first ChildAliCronjob filtered by the ctime column *

 * @method     ChildAliCronjob requirePk($key, ConnectionInterface $con = null) Return the ChildAliCronjob by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCronjob requireOne(ConnectionInterface $con = null) Return the first ChildAliCronjob matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCronjob requireOneByCstatus(int $cstatus) Return the first ChildAliCronjob filtered by the cstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCronjob requireOneByCtype(int $ctype) Return the first ChildAliCronjob filtered by the ctype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCronjob requireOneByCfdate(string $cfdate) Return the first ChildAliCronjob filtered by the cfdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCronjob requireOneByCtdate(string $ctdate) Return the first ChildAliCronjob filtered by the ctdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliCronjob requireOneByCtime(string $ctime) Return the first ChildAliCronjob filtered by the ctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliCronjob[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliCronjob objects based on current ModelCriteria
 * @method     ChildAliCronjob[]|ObjectCollection findByCstatus(int $cstatus) Return ChildAliCronjob objects filtered by the cstatus column
 * @method     ChildAliCronjob[]|ObjectCollection findByCtype(int $ctype) Return ChildAliCronjob objects filtered by the ctype column
 * @method     ChildAliCronjob[]|ObjectCollection findByCfdate(string $cfdate) Return ChildAliCronjob objects filtered by the cfdate column
 * @method     ChildAliCronjob[]|ObjectCollection findByCtdate(string $ctdate) Return ChildAliCronjob objects filtered by the ctdate column
 * @method     ChildAliCronjob[]|ObjectCollection findByCtime(string $ctime) Return ChildAliCronjob objects filtered by the ctime column
 * @method     ChildAliCronjob[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliCronjobQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliCronjobQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliCronjob', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliCronjobQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliCronjobQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliCronjobQuery) {
            return $criteria;
        }
        $query = new ChildAliCronjobQuery();
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
     * @return ChildAliCronjob|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliCronjob object has no primary key');
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
        throw new LogicException('The AliCronjob object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliCronjobQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliCronjob object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliCronjobQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliCronjob object has no primary key');
    }

    /**
     * Filter the query on the cstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByCstatus(1234); // WHERE cstatus = 1234
     * $query->filterByCstatus(array(12, 34)); // WHERE cstatus IN (12, 34)
     * $query->filterByCstatus(array('min' => 12)); // WHERE cstatus > 12
     * </code>
     *
     * @param     mixed $cstatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronjobQuery The current query, for fluid interface
     */
    public function filterByCstatus($cstatus = null, $comparison = null)
    {
        if (is_array($cstatus)) {
            $useMinMax = false;
            if (isset($cstatus['min'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CSTATUS, $cstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cstatus['max'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CSTATUS, $cstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronjobTableMap::COL_CSTATUS, $cstatus, $comparison);
    }

    /**
     * Filter the query on the ctype column
     *
     * Example usage:
     * <code>
     * $query->filterByCtype(1234); // WHERE ctype = 1234
     * $query->filterByCtype(array(12, 34)); // WHERE ctype IN (12, 34)
     * $query->filterByCtype(array('min' => 12)); // WHERE ctype > 12
     * </code>
     *
     * @param     mixed $ctype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronjobQuery The current query, for fluid interface
     */
    public function filterByCtype($ctype = null, $comparison = null)
    {
        if (is_array($ctype)) {
            $useMinMax = false;
            if (isset($ctype['min'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CTYPE, $ctype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ctype['max'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CTYPE, $ctype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronjobTableMap::COL_CTYPE, $ctype, $comparison);
    }

    /**
     * Filter the query on the cfdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCfdate('2011-03-14'); // WHERE cfdate = '2011-03-14'
     * $query->filterByCfdate('now'); // WHERE cfdate = '2011-03-14'
     * $query->filterByCfdate(array('max' => 'yesterday')); // WHERE cfdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $cfdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronjobQuery The current query, for fluid interface
     */
    public function filterByCfdate($cfdate = null, $comparison = null)
    {
        if (is_array($cfdate)) {
            $useMinMax = false;
            if (isset($cfdate['min'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CFDATE, $cfdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cfdate['max'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CFDATE, $cfdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronjobTableMap::COL_CFDATE, $cfdate, $comparison);
    }

    /**
     * Filter the query on the ctdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCtdate('2011-03-14'); // WHERE ctdate = '2011-03-14'
     * $query->filterByCtdate('now'); // WHERE ctdate = '2011-03-14'
     * $query->filterByCtdate(array('max' => 'yesterday')); // WHERE ctdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $ctdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronjobQuery The current query, for fluid interface
     */
    public function filterByCtdate($ctdate = null, $comparison = null)
    {
        if (is_array($ctdate)) {
            $useMinMax = false;
            if (isset($ctdate['min'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CTDATE, $ctdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ctdate['max'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CTDATE, $ctdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronjobTableMap::COL_CTDATE, $ctdate, $comparison);
    }

    /**
     * Filter the query on the ctime column
     *
     * Example usage:
     * <code>
     * $query->filterByCtime('2011-03-14'); // WHERE ctime = '2011-03-14'
     * $query->filterByCtime('now'); // WHERE ctime = '2011-03-14'
     * $query->filterByCtime(array('max' => 'yesterday')); // WHERE ctime > '2011-03-13'
     * </code>
     *
     * @param     mixed $ctime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliCronjobQuery The current query, for fluid interface
     */
    public function filterByCtime($ctime = null, $comparison = null)
    {
        if (is_array($ctime)) {
            $useMinMax = false;
            if (isset($ctime['min'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CTIME, $ctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ctime['max'])) {
                $this->addUsingAlias(AliCronjobTableMap::COL_CTIME, $ctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliCronjobTableMap::COL_CTIME, $ctime, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliCronjob $aliCronjob Object to remove from the list of results
     *
     * @return $this|ChildAliCronjobQuery The current query, for fluid interface
     */
    public function prune($aliCronjob = null)
    {
        if ($aliCronjob) {
            throw new LogicException('AliCronjob object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_cronjob table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliCronjobTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliCronjobTableMap::clearInstancePool();
            AliCronjobTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliCronjobTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliCronjobTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliCronjobTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliCronjobTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliCronjobQuery
