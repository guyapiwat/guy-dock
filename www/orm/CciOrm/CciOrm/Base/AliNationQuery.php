<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliNation as ChildAliNation;
use CciOrm\CciOrm\AliNationQuery as ChildAliNationQuery;
use CciOrm\CciOrm\Map\AliNationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_nation' table.
 *
 *
 *
 * @method     ChildAliNationQuery orderByNation($order = Criteria::ASC) Order by the nation column
 *
 * @method     ChildAliNationQuery groupByNation() Group by the nation column
 *
 * @method     ChildAliNationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliNationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliNationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliNationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliNationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliNationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliNation findOne(ConnectionInterface $con = null) Return the first ChildAliNation matching the query
 * @method     ChildAliNation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliNation matching the query, or a new ChildAliNation object populated from the query conditions when no match is found
 *
 * @method     ChildAliNation findOneByNation(string $nation) Return the first ChildAliNation filtered by the nation column *

 * @method     ChildAliNation requirePk($key, ConnectionInterface $con = null) Return the ChildAliNation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliNation requireOne(ConnectionInterface $con = null) Return the first ChildAliNation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliNation requireOneByNation(string $nation) Return the first ChildAliNation filtered by the nation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliNation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliNation objects based on current ModelCriteria
 * @method     ChildAliNation[]|ObjectCollection findByNation(string $nation) Return ChildAliNation objects filtered by the nation column
 * @method     ChildAliNation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliNationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliNationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliNation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliNationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliNationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliNationQuery) {
            return $criteria;
        }
        $query = new ChildAliNationQuery();
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
     * @return ChildAliNation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliNation object has no primary key');
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
        throw new LogicException('The AliNation object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliNationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliNation object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliNationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliNation object has no primary key');
    }

    /**
     * Filter the query on the nation column
     *
     * Example usage:
     * <code>
     * $query->filterByNation('fooValue');   // WHERE nation = 'fooValue'
     * $query->filterByNation('%fooValue%', Criteria::LIKE); // WHERE nation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliNationQuery The current query, for fluid interface
     */
    public function filterByNation($nation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliNationTableMap::COL_NATION, $nation, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliNation $aliNation Object to remove from the list of results
     *
     * @return $this|ChildAliNationQuery The current query, for fluid interface
     */
    public function prune($aliNation = null)
    {
        if ($aliNation) {
            throw new LogicException('AliNation object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_nation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliNationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliNationTableMap::clearInstancePool();
            AliNationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliNationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliNationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliNationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliNationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliNationQuery
