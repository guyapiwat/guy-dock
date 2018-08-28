<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use CciOrm\CciOrm\Chkbmbonus as ChildChkbmbonus;
use CciOrm\CciOrm\ChkbmbonusQuery as ChildChkbmbonusQuery;
use CciOrm\CciOrm\Map\ChkbmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'chkbmbonus' table.
 *
 *
 *
 * @method     ChildChkbmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildChkbmbonusQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildChkbmbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildChkbmbonusQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildChkbmbonusQuery orderByCountsp($order = Criteria::ASC) Order by the countsp column
 * @method     ChildChkbmbonusQuery orderByStatus11($order = Criteria::ASC) Order by the status_11 column
 * @method     ChildChkbmbonusQuery orderByStatus12($order = Criteria::ASC) Order by the status_12 column
 *
 * @method     ChildChkbmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildChkbmbonusQuery groupByNameT() Group by the name_t column
 * @method     ChildChkbmbonusQuery groupByTotal() Group by the total column
 * @method     ChildChkbmbonusQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildChkbmbonusQuery groupByCountsp() Group by the countsp column
 * @method     ChildChkbmbonusQuery groupByStatus11() Group by the status_11 column
 * @method     ChildChkbmbonusQuery groupByStatus12() Group by the status_12 column
 *
 * @method     ChildChkbmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChkbmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChkbmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChkbmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildChkbmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildChkbmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildChkbmbonus findOne(ConnectionInterface $con = null) Return the first ChildChkbmbonus matching the query
 * @method     ChildChkbmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChkbmbonus matching the query, or a new ChildChkbmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildChkbmbonus findOneByMcode(string $mcode) Return the first ChildChkbmbonus filtered by the mcode column
 * @method     ChildChkbmbonus findOneByNameT(string $name_t) Return the first ChildChkbmbonus filtered by the name_t column
 * @method     ChildChkbmbonus findOneByTotal(string $total) Return the first ChildChkbmbonus filtered by the total column
 * @method     ChildChkbmbonus findOneByPosCur(string $pos_cur) Return the first ChildChkbmbonus filtered by the pos_cur column
 * @method     ChildChkbmbonus findOneByCountsp(int $countsp) Return the first ChildChkbmbonus filtered by the countsp column
 * @method     ChildChkbmbonus findOneByStatus11(int $status_11) Return the first ChildChkbmbonus filtered by the status_11 column
 * @method     ChildChkbmbonus findOneByStatus12(int $status_12) Return the first ChildChkbmbonus filtered by the status_12 column *

 * @method     ChildChkbmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildChkbmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChkbmbonus requireOne(ConnectionInterface $con = null) Return the first ChildChkbmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChkbmbonus requireOneByMcode(string $mcode) Return the first ChildChkbmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChkbmbonus requireOneByNameT(string $name_t) Return the first ChildChkbmbonus filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChkbmbonus requireOneByTotal(string $total) Return the first ChildChkbmbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChkbmbonus requireOneByPosCur(string $pos_cur) Return the first ChildChkbmbonus filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChkbmbonus requireOneByCountsp(int $countsp) Return the first ChildChkbmbonus filtered by the countsp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChkbmbonus requireOneByStatus11(int $status_11) Return the first ChildChkbmbonus filtered by the status_11 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChkbmbonus requireOneByStatus12(int $status_12) Return the first ChildChkbmbonus filtered by the status_12 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChkbmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChkbmbonus objects based on current ModelCriteria
 * @method     ChildChkbmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildChkbmbonus objects filtered by the mcode column
 * @method     ChildChkbmbonus[]|ObjectCollection findByNameT(string $name_t) Return ChildChkbmbonus objects filtered by the name_t column
 * @method     ChildChkbmbonus[]|ObjectCollection findByTotal(string $total) Return ChildChkbmbonus objects filtered by the total column
 * @method     ChildChkbmbonus[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildChkbmbonus objects filtered by the pos_cur column
 * @method     ChildChkbmbonus[]|ObjectCollection findByCountsp(int $countsp) Return ChildChkbmbonus objects filtered by the countsp column
 * @method     ChildChkbmbonus[]|ObjectCollection findByStatus11(int $status_11) Return ChildChkbmbonus objects filtered by the status_11 column
 * @method     ChildChkbmbonus[]|ObjectCollection findByStatus12(int $status_12) Return ChildChkbmbonus objects filtered by the status_12 column
 * @method     ChildChkbmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChkbmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\ChkbmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\Chkbmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChkbmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChkbmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChkbmbonusQuery) {
            return $criteria;
        }
        $query = new ChildChkbmbonusQuery();
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
     * @return ChildChkbmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Chkbmbonus object has no primary key');
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
        throw new LogicException('The Chkbmbonus object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Chkbmbonus object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Chkbmbonus object has no primary key');
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
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChkbmbonusTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the name_t column
     *
     * Example usage:
     * <code>
     * $query->filterByNameT('fooValue');   // WHERE name_t = 'fooValue'
     * $query->filterByNameT('%fooValue%', Criteria::LIKE); // WHERE name_t LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameT The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChkbmbonusTableMap::COL_NAME_T, $nameT, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(ChkbmbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(ChkbmbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChkbmbonusTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the pos_cur column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur('fooValue');   // WHERE pos_cur = 'fooValue'
     * $query->filterByPosCur('%fooValue%', Criteria::LIKE); // WHERE pos_cur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChkbmbonusTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the countsp column
     *
     * Example usage:
     * <code>
     * $query->filterByCountsp(1234); // WHERE countsp = 1234
     * $query->filterByCountsp(array(12, 34)); // WHERE countsp IN (12, 34)
     * $query->filterByCountsp(array('min' => 12)); // WHERE countsp > 12
     * </code>
     *
     * @param     mixed $countsp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByCountsp($countsp = null, $comparison = null)
    {
        if (is_array($countsp)) {
            $useMinMax = false;
            if (isset($countsp['min'])) {
                $this->addUsingAlias(ChkbmbonusTableMap::COL_COUNTSP, $countsp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countsp['max'])) {
                $this->addUsingAlias(ChkbmbonusTableMap::COL_COUNTSP, $countsp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChkbmbonusTableMap::COL_COUNTSP, $countsp, $comparison);
    }

    /**
     * Filter the query on the status_11 column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus11(1234); // WHERE status_11 = 1234
     * $query->filterByStatus11(array(12, 34)); // WHERE status_11 IN (12, 34)
     * $query->filterByStatus11(array('min' => 12)); // WHERE status_11 > 12
     * </code>
     *
     * @param     mixed $status11 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByStatus11($status11 = null, $comparison = null)
    {
        if (is_array($status11)) {
            $useMinMax = false;
            if (isset($status11['min'])) {
                $this->addUsingAlias(ChkbmbonusTableMap::COL_STATUS_11, $status11['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status11['max'])) {
                $this->addUsingAlias(ChkbmbonusTableMap::COL_STATUS_11, $status11['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChkbmbonusTableMap::COL_STATUS_11, $status11, $comparison);
    }

    /**
     * Filter the query on the status_12 column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus12(1234); // WHERE status_12 = 1234
     * $query->filterByStatus12(array(12, 34)); // WHERE status_12 IN (12, 34)
     * $query->filterByStatus12(array('min' => 12)); // WHERE status_12 > 12
     * </code>
     *
     * @param     mixed $status12 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function filterByStatus12($status12 = null, $comparison = null)
    {
        if (is_array($status12)) {
            $useMinMax = false;
            if (isset($status12['min'])) {
                $this->addUsingAlias(ChkbmbonusTableMap::COL_STATUS_12, $status12['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status12['max'])) {
                $this->addUsingAlias(ChkbmbonusTableMap::COL_STATUS_12, $status12['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChkbmbonusTableMap::COL_STATUS_12, $status12, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChkbmbonus $chkbmbonus Object to remove from the list of results
     *
     * @return $this|ChildChkbmbonusQuery The current query, for fluid interface
     */
    public function prune($chkbmbonus = null)
    {
        if ($chkbmbonus) {
            throw new LogicException('Chkbmbonus object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the chkbmbonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChkbmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChkbmbonusTableMap::clearInstancePool();
            ChkbmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ChkbmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChkbmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ChkbmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChkbmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChkbmbonusQuery
