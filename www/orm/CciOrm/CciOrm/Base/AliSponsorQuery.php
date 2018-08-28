<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliSponsor as ChildAliSponsor;
use CciOrm\CciOrm\AliSponsorQuery as ChildAliSponsorQuery;
use CciOrm\CciOrm\Map\AliSponsorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_sponsor' table.
 *
 *
 *
 * @method     ChildAliSponsorQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliSponsorQuery orderBySponsor($order = Criteria::ASC) Order by the sponsor column
 *
 * @method     ChildAliSponsorQuery groupByMcode() Group by the mcode column
 * @method     ChildAliSponsorQuery groupBySponsor() Group by the sponsor column
 *
 * @method     ChildAliSponsorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSponsorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSponsorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSponsorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSponsorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSponsorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSponsor findOne(ConnectionInterface $con = null) Return the first ChildAliSponsor matching the query
 * @method     ChildAliSponsor findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSponsor matching the query, or a new ChildAliSponsor object populated from the query conditions when no match is found
 *
 * @method     ChildAliSponsor findOneByMcode(string $mcode) Return the first ChildAliSponsor filtered by the mcode column
 * @method     ChildAliSponsor findOneBySponsor(int $sponsor) Return the first ChildAliSponsor filtered by the sponsor column *

 * @method     ChildAliSponsor requirePk($key, ConnectionInterface $con = null) Return the ChildAliSponsor by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSponsor requireOne(ConnectionInterface $con = null) Return the first ChildAliSponsor matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSponsor requireOneByMcode(string $mcode) Return the first ChildAliSponsor filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSponsor requireOneBySponsor(int $sponsor) Return the first ChildAliSponsor filtered by the sponsor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSponsor[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSponsor objects based on current ModelCriteria
 * @method     ChildAliSponsor[]|ObjectCollection findByMcode(string $mcode) Return ChildAliSponsor objects filtered by the mcode column
 * @method     ChildAliSponsor[]|ObjectCollection findBySponsor(int $sponsor) Return ChildAliSponsor objects filtered by the sponsor column
 * @method     ChildAliSponsor[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSponsorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSponsorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSponsor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSponsorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSponsorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSponsorQuery) {
            return $criteria;
        }
        $query = new ChildAliSponsorQuery();
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
     * @return ChildAliSponsor|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliSponsor object has no primary key');
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
        throw new LogicException('The AliSponsor object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliSponsorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliSponsor object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSponsorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliSponsor object has no primary key');
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
     * @return $this|ChildAliSponsorQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSponsorTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the sponsor column
     *
     * Example usage:
     * <code>
     * $query->filterBySponsor(1234); // WHERE sponsor = 1234
     * $query->filterBySponsor(array(12, 34)); // WHERE sponsor IN (12, 34)
     * $query->filterBySponsor(array('min' => 12)); // WHERE sponsor > 12
     * </code>
     *
     * @param     mixed $sponsor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSponsorQuery The current query, for fluid interface
     */
    public function filterBySponsor($sponsor = null, $comparison = null)
    {
        if (is_array($sponsor)) {
            $useMinMax = false;
            if (isset($sponsor['min'])) {
                $this->addUsingAlias(AliSponsorTableMap::COL_SPONSOR, $sponsor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sponsor['max'])) {
                $this->addUsingAlias(AliSponsorTableMap::COL_SPONSOR, $sponsor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSponsorTableMap::COL_SPONSOR, $sponsor, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSponsor $aliSponsor Object to remove from the list of results
     *
     * @return $this|ChildAliSponsorQuery The current query, for fluid interface
     */
    public function prune($aliSponsor = null)
    {
        if ($aliSponsor) {
            throw new LogicException('AliSponsor object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_sponsor table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSponsorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSponsorTableMap::clearInstancePool();
            AliSponsorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSponsorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSponsorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSponsorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSponsorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSponsorQuery
