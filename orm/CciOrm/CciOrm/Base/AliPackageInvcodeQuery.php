<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliPackageInvcode as ChildAliPackageInvcode;
use CciOrm\CciOrm\AliPackageInvcodeQuery as ChildAliPackageInvcodeQuery;
use CciOrm\CciOrm\Map\AliPackageInvcodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_package_invcode' table.
 *
 *
 *
 * @method     ChildAliPackageInvcodeQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliPackageInvcodeQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 *
 * @method     ChildAliPackageInvcodeQuery groupByPcode() Group by the pcode column
 * @method     ChildAliPackageInvcodeQuery groupByInvCode() Group by the inv_code column
 *
 * @method     ChildAliPackageInvcodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliPackageInvcodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliPackageInvcodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliPackageInvcodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliPackageInvcodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliPackageInvcodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliPackageInvcode findOne(ConnectionInterface $con = null) Return the first ChildAliPackageInvcode matching the query
 * @method     ChildAliPackageInvcode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliPackageInvcode matching the query, or a new ChildAliPackageInvcode object populated from the query conditions when no match is found
 *
 * @method     ChildAliPackageInvcode findOneByPcode(string $pcode) Return the first ChildAliPackageInvcode filtered by the pcode column
 * @method     ChildAliPackageInvcode findOneByInvCode(string $inv_code) Return the first ChildAliPackageInvcode filtered by the inv_code column *

 * @method     ChildAliPackageInvcode requirePk($key, ConnectionInterface $con = null) Return the ChildAliPackageInvcode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPackageInvcode requireOne(ConnectionInterface $con = null) Return the first ChildAliPackageInvcode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPackageInvcode requireOneByPcode(string $pcode) Return the first ChildAliPackageInvcode filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliPackageInvcode requireOneByInvCode(string $inv_code) Return the first ChildAliPackageInvcode filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliPackageInvcode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliPackageInvcode objects based on current ModelCriteria
 * @method     ChildAliPackageInvcode[]|ObjectCollection findByPcode(string $pcode) Return ChildAliPackageInvcode objects filtered by the pcode column
 * @method     ChildAliPackageInvcode[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliPackageInvcode objects filtered by the inv_code column
 * @method     ChildAliPackageInvcode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliPackageInvcodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliPackageInvcodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliPackageInvcode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliPackageInvcodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliPackageInvcodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliPackageInvcodeQuery) {
            return $criteria;
        }
        $query = new ChildAliPackageInvcodeQuery();
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
     * @return ChildAliPackageInvcode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliPackageInvcode object has no primary key');
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
        throw new LogicException('The AliPackageInvcode object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliPackageInvcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliPackageInvcode object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliPackageInvcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliPackageInvcode object has no primary key');
    }

    /**
     * Filter the query on the pcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPcode('fooValue');   // WHERE pcode = 'fooValue'
     * $query->filterByPcode('%fooValue%', Criteria::LIKE); // WHERE pcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPackageInvcodeQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPackageInvcodeTableMap::COL_PCODE, $pcode, $comparison);
    }

    /**
     * Filter the query on the inv_code column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCode('fooValue');   // WHERE inv_code = 'fooValue'
     * $query->filterByInvCode('%fooValue%', Criteria::LIKE); // WHERE inv_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliPackageInvcodeQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliPackageInvcodeTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliPackageInvcode $aliPackageInvcode Object to remove from the list of results
     *
     * @return $this|ChildAliPackageInvcodeQuery The current query, for fluid interface
     */
    public function prune($aliPackageInvcode = null)
    {
        if ($aliPackageInvcode) {
            throw new LogicException('AliPackageInvcode object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_package_invcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliPackageInvcodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliPackageInvcodeTableMap::clearInstancePool();
            AliPackageInvcodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliPackageInvcodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliPackageInvcodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliPackageInvcodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliPackageInvcodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliPackageInvcodeQuery
