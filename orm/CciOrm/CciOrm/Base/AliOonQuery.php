<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\AliOon as ChildAliOon;
use CciOrm\CciOrm\AliOonQuery as ChildAliOonQuery;
use CciOrm\CciOrm\Map\AliOonTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_oon' table.
 *
 *
 *
 * @method     ChildAliOonQuery orderByOon($order = Criteria::ASC) Order by the oon column
 * @method     ChildAliOonQuery orderBySmsCredits($order = Criteria::ASC) Order by the sms_credits column
 *
 * @method     ChildAliOonQuery groupByOon() Group by the oon column
 * @method     ChildAliOonQuery groupBySmsCredits() Group by the sms_credits column
 *
 * @method     ChildAliOonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliOonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliOonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliOonQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliOonQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliOonQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliOon findOne(ConnectionInterface $con = null) Return the first ChildAliOon matching the query
 * @method     ChildAliOon findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliOon matching the query, or a new ChildAliOon object populated from the query conditions when no match is found
 *
 * @method     ChildAliOon findOneByOon(int $oon) Return the first ChildAliOon filtered by the oon column
 * @method     ChildAliOon findOneBySmsCredits(int $sms_credits) Return the first ChildAliOon filtered by the sms_credits column *

 * @method     ChildAliOon requirePk($key, ConnectionInterface $con = null) Return the ChildAliOon by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOon requireOne(ConnectionInterface $con = null) Return the first ChildAliOon matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliOon requireOneByOon(int $oon) Return the first ChildAliOon filtered by the oon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliOon requireOneBySmsCredits(int $sms_credits) Return the first ChildAliOon filtered by the sms_credits column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliOon[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliOon objects based on current ModelCriteria
 * @method     ChildAliOon[]|ObjectCollection findByOon(int $oon) Return ChildAliOon objects filtered by the oon column
 * @method     ChildAliOon[]|ObjectCollection findBySmsCredits(int $sms_credits) Return ChildAliOon objects filtered by the sms_credits column
 * @method     ChildAliOon[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliOonQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliOonQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliOon', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliOonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliOonQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliOonQuery) {
            return $criteria;
        }
        $query = new ChildAliOonQuery();
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
     * @return ChildAliOon|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The AliOon object has no primary key');
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
        throw new LogicException('The AliOon object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAliOonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The AliOon object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliOonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The AliOon object has no primary key');
    }

    /**
     * Filter the query on the oon column
     *
     * Example usage:
     * <code>
     * $query->filterByOon(1234); // WHERE oon = 1234
     * $query->filterByOon(array(12, 34)); // WHERE oon IN (12, 34)
     * $query->filterByOon(array('min' => 12)); // WHERE oon > 12
     * </code>
     *
     * @param     mixed $oon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliOonQuery The current query, for fluid interface
     */
    public function filterByOon($oon = null, $comparison = null)
    {
        if (is_array($oon)) {
            $useMinMax = false;
            if (isset($oon['min'])) {
                $this->addUsingAlias(AliOonTableMap::COL_OON, $oon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($oon['max'])) {
                $this->addUsingAlias(AliOonTableMap::COL_OON, $oon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOonTableMap::COL_OON, $oon, $comparison);
    }

    /**
     * Filter the query on the sms_credits column
     *
     * Example usage:
     * <code>
     * $query->filterBySmsCredits(1234); // WHERE sms_credits = 1234
     * $query->filterBySmsCredits(array(12, 34)); // WHERE sms_credits IN (12, 34)
     * $query->filterBySmsCredits(array('min' => 12)); // WHERE sms_credits > 12
     * </code>
     *
     * @param     mixed $smsCredits The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliOonQuery The current query, for fluid interface
     */
    public function filterBySmsCredits($smsCredits = null, $comparison = null)
    {
        if (is_array($smsCredits)) {
            $useMinMax = false;
            if (isset($smsCredits['min'])) {
                $this->addUsingAlias(AliOonTableMap::COL_SMS_CREDITS, $smsCredits['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($smsCredits['max'])) {
                $this->addUsingAlias(AliOonTableMap::COL_SMS_CREDITS, $smsCredits['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliOonTableMap::COL_SMS_CREDITS, $smsCredits, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliOon $aliOon Object to remove from the list of results
     *
     * @return $this|ChildAliOonQuery The current query, for fluid interface
     */
    public function prune($aliOon = null)
    {
        if ($aliOon) {
            throw new LogicException('AliOon object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_oon table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliOonTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliOonTableMap::clearInstancePool();
            AliOonTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliOonTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliOonTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliOonTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliOonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliOonQuery
