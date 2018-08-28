<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliRscode as ChildAliRscode;
use CciOrm\CciOrm\AliRscodeQuery as ChildAliRscodeQuery;
use CciOrm\CciOrm\Map\AliRscodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_rscode' table.
 *
 *
 *
 * @method     ChildAliRscodeQuery orderByRccode($order = Criteria::ASC) Order by the rccode column
 * @method     ChildAliRscodeQuery orderByRccodeDesc($order = Criteria::ASC) Order by the rccode_desc column
 * @method     ChildAliRscodeQuery orderByMappingCode($order = Criteria::ASC) Order by the mapping_code column
 * @method     ChildAliRscodeQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 *
 * @method     ChildAliRscodeQuery groupByRccode() Group by the rccode column
 * @method     ChildAliRscodeQuery groupByRccodeDesc() Group by the rccode_desc column
 * @method     ChildAliRscodeQuery groupByMappingCode() Group by the mapping_code column
 * @method     ChildAliRscodeQuery groupByInvCode() Group by the inv_code column
 *
 * @method     ChildAliRscodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliRscodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliRscodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliRscodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliRscodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliRscodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliRscode findOne(ConnectionInterface $con = null) Return the first ChildAliRscode matching the query
 * @method     ChildAliRscode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliRscode matching the query, or a new ChildAliRscode object populated from the query conditions when no match is found
 *
 * @method     ChildAliRscode findOneByRccode(string $rccode) Return the first ChildAliRscode filtered by the rccode column
 * @method     ChildAliRscode findOneByRccodeDesc(string $rccode_desc) Return the first ChildAliRscode filtered by the rccode_desc column
 * @method     ChildAliRscode findOneByMappingCode(string $mapping_code) Return the first ChildAliRscode filtered by the mapping_code column
 * @method     ChildAliRscode findOneByInvCode(string $inv_code) Return the first ChildAliRscode filtered by the inv_code column *

 * @method     ChildAliRscode requirePk($key, ConnectionInterface $con = null) Return the ChildAliRscode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRscode requireOne(ConnectionInterface $con = null) Return the first ChildAliRscode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliRscode requireOneByRccode(string $rccode) Return the first ChildAliRscode filtered by the rccode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRscode requireOneByRccodeDesc(string $rccode_desc) Return the first ChildAliRscode filtered by the rccode_desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRscode requireOneByMappingCode(string $mapping_code) Return the first ChildAliRscode filtered by the mapping_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliRscode requireOneByInvCode(string $inv_code) Return the first ChildAliRscode filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliRscode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliRscode objects based on current ModelCriteria
 * @method     ChildAliRscode[]|ObjectCollection findByRccode(string $rccode) Return ChildAliRscode objects filtered by the rccode column
 * @method     ChildAliRscode[]|ObjectCollection findByRccodeDesc(string $rccode_desc) Return ChildAliRscode objects filtered by the rccode_desc column
 * @method     ChildAliRscode[]|ObjectCollection findByMappingCode(string $mapping_code) Return ChildAliRscode objects filtered by the mapping_code column
 * @method     ChildAliRscode[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliRscode objects filtered by the inv_code column
 * @method     ChildAliRscode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliRscodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliRscodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliRscode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliRscodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliRscodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliRscodeQuery) {
            return $criteria;
        }
        $query = new ChildAliRscodeQuery();
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
     * @return ChildAliRscode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliRscode object has no primary key');
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
        throw new LogicException('The AliRscode object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliRscodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliRscode object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliRscodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliRscode object has no primary key');
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
     * @return $this|ChildAliRscodeQuery The current query, for fluid interface
     */
    public function filterByRccode($rccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRscodeTableMap::COL_RCCODE, $rccode, $comparison);
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
     * @return $this|ChildAliRscodeQuery The current query, for fluid interface
     */
    public function filterByRccodeDesc($rccodeDesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rccodeDesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRscodeTableMap::COL_RCCODE_DESC, $rccodeDesc, $comparison);
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
     * @return $this|ChildAliRscodeQuery The current query, for fluid interface
     */
    public function filterByMappingCode($mappingCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mappingCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRscodeTableMap::COL_MAPPING_CODE, $mappingCode, $comparison);
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
     * @return $this|ChildAliRscodeQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliRscodeTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliRscode $aliRscode Object to remove from the list of results
     *
     * @return $this|ChildAliRscodeQuery The current query, for fluid interface
     */
    public function prune($aliRscode = null)
    {
        if ($aliRscode) {
            throw new LogicException('AliRscode object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_rscode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliRscodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliRscodeTableMap::clearInstancePool();
            AliRscodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliRscodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliRscodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliRscodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliRscodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliRscodeQuery
