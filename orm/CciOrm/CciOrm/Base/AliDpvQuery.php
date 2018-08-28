<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliDpv as ChildAliDpv;
use CciOrm\CciOrm\AliDpvQuery as ChildAliDpvQuery;
use CciOrm\CciOrm\Map\AliDpvTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_dpv' table.
 *
 *
 *
 * @method     ChildAliDpvQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliDpvQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliDpvQuery orderByTotalPv($order = Criteria::ASC) Order by the total_pv column
 *
 * @method     ChildAliDpvQuery groupByRcode() Group by the rcode column
 * @method     ChildAliDpvQuery groupByMcode() Group by the mcode column
 * @method     ChildAliDpvQuery groupByTotalPv() Group by the total_pv column
 *
 * @method     ChildAliDpvQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliDpvQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliDpvQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliDpvQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliDpvQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliDpvQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliDpv findOne(ConnectionInterface $con = null) Return the first ChildAliDpv matching the query
 * @method     ChildAliDpv findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliDpv matching the query, or a new ChildAliDpv object populated from the query conditions when no match is found
 *
 * @method     ChildAliDpv findOneByRcode(int $rcode) Return the first ChildAliDpv filtered by the rcode column
 * @method     ChildAliDpv findOneByMcode(string $mcode) Return the first ChildAliDpv filtered by the mcode column
 * @method     ChildAliDpv findOneByTotalPv(string $total_pv) Return the first ChildAliDpv filtered by the total_pv column *

 * @method     ChildAliDpv requirePk($key, ConnectionInterface $con = null) Return the ChildAliDpv by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDpv requireOne(ConnectionInterface $con = null) Return the first ChildAliDpv matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliDpv requireOneByRcode(int $rcode) Return the first ChildAliDpv filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDpv requireOneByMcode(string $mcode) Return the first ChildAliDpv filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliDpv requireOneByTotalPv(string $total_pv) Return the first ChildAliDpv filtered by the total_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliDpv[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliDpv objects based on current ModelCriteria
 * @method     ChildAliDpv[]|ObjectCollection findByRcode(int $rcode) Return ChildAliDpv objects filtered by the rcode column
 * @method     ChildAliDpv[]|ObjectCollection findByMcode(string $mcode) Return ChildAliDpv objects filtered by the mcode column
 * @method     ChildAliDpv[]|ObjectCollection findByTotalPv(string $total_pv) Return ChildAliDpv objects filtered by the total_pv column
 * @method     ChildAliDpv[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliDpvQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliDpvQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliDpv', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliDpvQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliDpvQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliDpvQuery) {
            return $criteria;
        }
        $query = new ChildAliDpvQuery();
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
     * @return ChildAliDpv|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliDpv object has no primary key');
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
        throw new LogicException('The AliDpv object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliDpvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliDpv object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliDpvQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliDpv object has no primary key');
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
     * @return $this|ChildAliDpvQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliDpvTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliDpvTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDpvTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliDpvQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDpvTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the total_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPv(1234); // WHERE total_pv = 1234
     * $query->filterByTotalPv(array(12, 34)); // WHERE total_pv IN (12, 34)
     * $query->filterByTotalPv(array('min' => 12)); // WHERE total_pv > 12
     * </code>
     *
     * @param     mixed $totalPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliDpvQuery The current query, for fluid interface
     */
    public function filterByTotalPv($totalPv = null, $comparison = null)
    {
        if (is_array($totalPv)) {
            $useMinMax = false;
            if (isset($totalPv['min'])) {
                $this->addUsingAlias(AliDpvTableMap::COL_TOTAL_PV, $totalPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPv['max'])) {
                $this->addUsingAlias(AliDpvTableMap::COL_TOTAL_PV, $totalPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliDpvTableMap::COL_TOTAL_PV, $totalPv, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliDpv $aliDpv Object to remove from the list of results
     *
     * @return $this|ChildAliDpvQuery The current query, for fluid interface
     */
    public function prune($aliDpv = null)
    {
        if ($aliDpv) {
            throw new LogicException('AliDpv object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_dpv table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliDpvTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliDpvTableMap::clearInstancePool();
            AliDpvTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliDpvTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliDpvTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliDpvTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliDpvTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliDpvQuery
