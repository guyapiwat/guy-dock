<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliProductInvcode as ChildAliProductInvcode;
use CciOrm\CciOrm\AliProductInvcodeQuery as ChildAliProductInvcodeQuery;
use CciOrm\CciOrm\Map\AliProductInvcodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_product_invcode' table.
 *
 *
 *
 * @method     ChildAliProductInvcodeQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliProductInvcodeQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 *
 * @method     ChildAliProductInvcodeQuery groupByPcode() Group by the pcode column
 * @method     ChildAliProductInvcodeQuery groupByInvCode() Group by the inv_code column
 *
 * @method     ChildAliProductInvcodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliProductInvcodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliProductInvcodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliProductInvcodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliProductInvcodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliProductInvcodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliProductInvcode findOne(ConnectionInterface $con = null) Return the first ChildAliProductInvcode matching the query
 * @method     ChildAliProductInvcode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliProductInvcode matching the query, or a new ChildAliProductInvcode object populated from the query conditions when no match is found
 *
 * @method     ChildAliProductInvcode findOneByPcode(string $pcode) Return the first ChildAliProductInvcode filtered by the pcode column
 * @method     ChildAliProductInvcode findOneByInvCode(string $inv_code) Return the first ChildAliProductInvcode filtered by the inv_code column *

 * @method     ChildAliProductInvcode requirePk($key, ConnectionInterface $con = null) Return the ChildAliProductInvcode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvcode requireOne(ConnectionInterface $con = null) Return the first ChildAliProductInvcode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductInvcode requireOneByPcode(string $pcode) Return the first ChildAliProductInvcode filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductInvcode requireOneByInvCode(string $inv_code) Return the first ChildAliProductInvcode filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductInvcode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliProductInvcode objects based on current ModelCriteria
 * @method     ChildAliProductInvcode[]|ObjectCollection findByPcode(string $pcode) Return ChildAliProductInvcode objects filtered by the pcode column
 * @method     ChildAliProductInvcode[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliProductInvcode objects filtered by the inv_code column
 * @method     ChildAliProductInvcode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliProductInvcodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliProductInvcodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliProductInvcode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliProductInvcodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliProductInvcodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliProductInvcodeQuery) {
            return $criteria;
        }
        $query = new ChildAliProductInvcodeQuery();
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
     * @return ChildAliProductInvcode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliProductInvcode object has no primary key');
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
        throw new LogicException('The AliProductInvcode object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliProductInvcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliProductInvcode object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliProductInvcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliProductInvcode object has no primary key');
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
     * @return $this|ChildAliProductInvcodeQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInvcodeTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliProductInvcodeQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductInvcodeTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliProductInvcode $aliProductInvcode Object to remove from the list of results
     *
     * @return $this|ChildAliProductInvcodeQuery The current query, for fluid interface
     */
    public function prune($aliProductInvcode = null)
    {
        if ($aliProductInvcode) {
            throw new LogicException('AliProductInvcode object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_product_invcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInvcodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliProductInvcodeTableMap::clearInstancePool();
            AliProductInvcodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductInvcodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliProductInvcodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliProductInvcodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliProductInvcodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliProductInvcodeQuery
