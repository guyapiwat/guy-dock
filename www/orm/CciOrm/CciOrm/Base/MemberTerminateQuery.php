<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\MemberTerminate as ChildMemberTerminate;
use CciOrm\CciOrm\MemberTerminateQuery as ChildMemberTerminateQuery;
use CciOrm\CciOrm\Map\MemberTerminateTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'member_terminate' table.
 *
 *
 *
 * @method     ChildMemberTerminateQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 *
 * @method     ChildMemberTerminateQuery groupByMcode() Group by the mcode column
 *
 * @method     ChildMemberTerminateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMemberTerminateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMemberTerminateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMemberTerminateQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMemberTerminateQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMemberTerminateQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMemberTerminate findOne(ConnectionInterface $con = null) Return the first ChildMemberTerminate matching the query
 * @method     ChildMemberTerminate findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMemberTerminate matching the query, or a new ChildMemberTerminate object populated from the query conditions when no match is found
 *
 * @method     ChildMemberTerminate findOneByMcode(string $mcode) Return the first ChildMemberTerminate filtered by the mcode column *

 * @method     ChildMemberTerminate requirePk($key, ConnectionInterface $con = null) Return the ChildMemberTerminate by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMemberTerminate requireOne(ConnectionInterface $con = null) Return the first ChildMemberTerminate matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberTerminate requireOneByMcode(string $mcode) Return the first ChildMemberTerminate filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMemberTerminate[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMemberTerminate objects based on current ModelCriteria
 * @method     ChildMemberTerminate[]|ObjectCollection findByMcode(string $mcode) Return ChildMemberTerminate objects filtered by the mcode column
 * @method     ChildMemberTerminate[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MemberTerminateQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\MemberTerminateQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\MemberTerminate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMemberTerminateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMemberTerminateQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMemberTerminateQuery) {
            return $criteria;
        }
        $query = new ChildMemberTerminateQuery();
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
     * @return ChildMemberTerminate|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The MemberTerminate object has no primary key');
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
        throw new LogicException('The MemberTerminate object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMemberTerminateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The MemberTerminate object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMemberTerminateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The MemberTerminate object has no primary key');
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
     * @return $this|ChildMemberTerminateQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MemberTerminateTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMemberTerminate $memberTerminate Object to remove from the list of results
     *
     * @return $this|ChildMemberTerminateQuery The current query, for fluid interface
     */
    public function prune($memberTerminate = null)
    {
        if ($memberTerminate) {
            throw new LogicException('MemberTerminate object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the member_terminate table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTerminateTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MemberTerminateTableMap::clearInstancePool();
            MemberTerminateTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MemberTerminateTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MemberTerminateTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MemberTerminateTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MemberTerminateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MemberTerminateQuery
