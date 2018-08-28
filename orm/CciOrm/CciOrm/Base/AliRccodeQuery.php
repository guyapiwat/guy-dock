<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliRccode as ChildAliRccode;
use CciOrm\CciOrm\AliRccodeQuery as ChildAliRccodeQuery;
use CciOrm\CciOrm\Map\AliRccodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_rccode' table.
 *
 *
 *
 * @method     ChildAliRccodeQuery orderByRccode($order = Criteria::ASC) Order by the rccode column
 * @method     ChildAliRccodeQuery orderByRccodeDesc($order = Criteria::ASC) Order by the rccode_desc column
 * @method     ChildAliRccodeQuery orderByMappingCode($order = Criteria::ASC) Order by the mapping_code column
 * @method     ChildAliRccodeQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 *
 * @method     ChildAliRccodeQuery groupByRccode() Group by the rccode column
 * @method     ChildAliRccodeQuery groupByRccodeDesc() Group by the rccode_desc column
 * @method     ChildAliRccodeQuery groupByMappingCode() Group by the mapping_code column
 * @method     ChildAliRccodeQuery groupByInvCode() Group by the inv_code column
 *
 * @method     ChildAliRccodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliRccodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliRccodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliRccodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliRccodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliRccodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliRccode findOne(ConnectionInterface $con = null) Return the first ChildAliRccode matching the query
 * @method     ChildAliRccode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliRccode matching the query, or a new ChildAliRccode object populated from the query conditions when no match is found
 *
 * @method     ChildAliRccode findOneByRccode(string $rccode) Return the first ChildAliRccode filtered by the rccode column
 * @method     ChildAliRccode findOneByRccodeDesc(string $rccode_desc) Return the first ChildAliRccode filtered by the rccode_desc column
 * @method     ChildAliRccode findOneByMappingCode(string $mapping_code) Return the first ChildAliRccode filtered by the mapping_code column
 * @method     ChildAliRccode findOneByInvCode(string $inv_code) Return the first ChildAliRccode filtered by the inv_code column *

 * @method     ChildAliRccode requirePk($key, ConnectionInterface $con = null) Return the ChildAliRccode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRccode requireOne(ConnectionInterface $con = null) Return the first ChildAliRccode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliRccode requireOneByRccode(string $rccode) Return the first ChildAliRccode filtered by the rccode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRccode requireOneByRccodeDesc(string $rccode_desc) Return the first ChildAliRccode filtered by the rccode_desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRccode requireOneByMappingCode(string $mapping_code) Return the first ChildAliRccode filtered by the mapping_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRccode requireOneByInvCode(string $inv_code) Return the first ChildAliRccode filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliRccode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliRccode objects based on current ModelCriteria
 * @method     ChildAliRccode[]|ObjectCollection findByRccode(string $rccode) Return ChildAliRccode objects filtered by the rccode column
 * @method     ChildAliRccode[]|ObjectCollection findByRccodeDesc(string $rccode_desc) Return ChildAliRccode objects filtered by the rccode_desc column
 * @method     ChildAliRccode[]|ObjectCollection findByMappingCode(string $mapping_code) Return ChildAliRccode objects filtered by the mapping_code column
 * @method     ChildAliRccode[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliRccode objects filtered by the inv_code column
 * @method     ChildAliRccode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliRccodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliRccodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliRccode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliRccodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliRccodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliRccodeQuery) {
            return $criteria;
        }
        $query = new ChildAliRccodeQuery();
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
     * @return ChildAliRccode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliRccode object has no primary key');
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
        throw new LogicException('The AliRccode object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliRccodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliRccode object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliRccodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliRccode object has no primary key');
    }

    /**
     * Filter the query on the rccode column
     *
     * Example usage:
     * <code>
     * $query->filterByRccode('fooValue');   // WHERE rccode = 'fooValue'
     * $query->filterByRccode('%fooValue%', Criteria::LIKE); // WHERE rccode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rccode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRccodeQuery The current query, for fluid interface
     */
    public function filterByRccode($rccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRccodeTableMap::COL_RCCODE, $rccode, $comparison);
    }

    /**
     * Filter the query on the rccode_desc column
     *
     * Example usage:
     * <code>
     * $query->filterByRccodeDesc('fooValue');   // WHERE rccode_desc = 'fooValue'
     * $query->filterByRccodeDesc('%fooValue%', Criteria::LIKE); // WHERE rccode_desc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rccodeDesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRccodeQuery The current query, for fluid interface
     */
    public function filterByRccodeDesc($rccodeDesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccodeDesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRccodeTableMap::COL_RCCODE_DESC, $rccodeDesc, $comparison);
    }

    /**
     * Filter the query on the mapping_code column
     *
     * Example usage:
     * <code>
     * $query->filterByMappingCode('fooValue');   // WHERE mapping_code = 'fooValue'
     * $query->filterByMappingCode('%fooValue%', Criteria::LIKE); // WHERE mapping_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mappingCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliRccodeQuery The current query, for fluid interface
     */
    public function filterByMappingCode($mappingCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mappingCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRccodeTableMap::COL_MAPPING_CODE, $mappingCode, $comparison);
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
     * @return $this|ChildAliRccodeQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRccodeTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliRccode $aliRccode Object to remove from the list of results
     *
     * @return $this|ChildAliRccodeQuery The current query, for fluid interface
     */
    public function prune($aliRccode = null)
    {
        if ($aliRccode) {
            throw new LogicException('AliRccode object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_rccode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliRccodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliRccodeTableMap::clearInstancePool();
            AliRccodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliRccodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliRccodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliRccodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliRccodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliRccodeQuery
