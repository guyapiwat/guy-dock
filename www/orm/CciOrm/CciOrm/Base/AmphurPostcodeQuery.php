<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AmphurPostcode as ChildAmphurPostcode;
use CciOrm\CciOrm\AmphurPostcodeQuery as ChildAmphurPostcodeQuery;
use CciOrm\CciOrm\Map\AmphurPostcodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'amphur_postcode' table.
 *
 *
 *
 * @method     ChildAmphurPostcodeQuery orderByAmphurId($order = Criteria::ASC) Order by the AMPHUR_ID column
 * @method     ChildAmphurPostcodeQuery orderByPostCode($order = Criteria::ASC) Order by the POST_CODE column
 *
 * @method     ChildAmphurPostcodeQuery groupByAmphurId() Group by the AMPHUR_ID column
 * @method     ChildAmphurPostcodeQuery groupByPostCode() Group by the POST_CODE column
 *
 * @method     ChildAmphurPostcodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAmphurPostcodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAmphurPostcodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAmphurPostcodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAmphurPostcodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAmphurPostcodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAmphurPostcode findOne(ConnectionInterface $con = null) Return the first ChildAmphurPostcode matching the query
 * @method     ChildAmphurPostcode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAmphurPostcode matching the query, or a new ChildAmphurPostcode object populated from the query conditions when no match is found
 *
 * @method     ChildAmphurPostcode findOneByAmphurId(int $AMPHUR_ID) Return the first ChildAmphurPostcode filtered by the AMPHUR_ID column
 * @method     ChildAmphurPostcode findOneByPostCode(int $POST_CODE) Return the first ChildAmphurPostcode filtered by the POST_CODE column *

 * @method     ChildAmphurPostcode requirePk($key, ConnectionInterface $con = null) Return the ChildAmphurPostcode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmphurPostcode requireOne(ConnectionInterface $con = null) Return the first ChildAmphurPostcode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAmphurPostcode requireOneByAmphurId(int $AMPHUR_ID) Return the first ChildAmphurPostcode filtered by the AMPHUR_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAmphurPostcode requireOneByPostCode(int $POST_CODE) Return the first ChildAmphurPostcode filtered by the POST_CODE column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAmphurPostcode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAmphurPostcode objects based on current ModelCriteria
 * @method     ChildAmphurPostcode[]|ObjectCollection findByAmphurId(int $AMPHUR_ID) Return ChildAmphurPostcode objects filtered by the AMPHUR_ID column
 * @method     ChildAmphurPostcode[]|ObjectCollection findByPostCode(int $POST_CODE) Return ChildAmphurPostcode objects filtered by the POST_CODE column
 * @method     ChildAmphurPostcode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AmphurPostcodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AmphurPostcodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AmphurPostcode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAmphurPostcodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAmphurPostcodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAmphurPostcodeQuery) {
            return $criteria;
        }
        $query = new ChildAmphurPostcodeQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$AMPHUR_ID, $POST_CODE] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAmphurPostcode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AmphurPostcodeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AmphurPostcodeTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAmphurPostcode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT AMPHUR_ID, POST_CODE FROM amphur_postcode WHERE AMPHUR_ID = :p0 AND POST_CODE = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAmphurPostcode $obj */
            $obj = new ChildAmphurPostcode();
            $obj->hydrate($row);
            AmphurPostcodeTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAmphurPostcode|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
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
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAmphurPostcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AmphurPostcodeTableMap::COL_AMPHUR_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AmphurPostcodeTableMap::COL_POST_CODE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAmphurPostcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AmphurPostcodeTableMap::COL_AMPHUR_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AmphurPostcodeTableMap::COL_POST_CODE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the AMPHUR_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByAmphurId(1234); // WHERE AMPHUR_ID = 1234
     * $query->filterByAmphurId(array(12, 34)); // WHERE AMPHUR_ID IN (12, 34)
     * $query->filterByAmphurId(array('min' => 12)); // WHERE AMPHUR_ID > 12
     * </code>
     *
     * @param     mixed $amphurId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmphurPostcodeQuery The current query, for fluid interface
     */
    public function filterByAmphurId($amphurId = null, $comparison = null)
    {
        if (is_array($amphurId)) {
            $useMinMax = false;
            if (isset($amphurId['min'])) {
                $this->addUsingAlias(AmphurPostcodeTableMap::COL_AMPHUR_ID, $amphurId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amphurId['max'])) {
                $this->addUsingAlias(AmphurPostcodeTableMap::COL_AMPHUR_ID, $amphurId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmphurPostcodeTableMap::COL_AMPHUR_ID, $amphurId, $comparison);
    }

    /**
     * Filter the query on the POST_CODE column
     *
     * Example usage:
     * <code>
     * $query->filterByPostCode(1234); // WHERE POST_CODE = 1234
     * $query->filterByPostCode(array(12, 34)); // WHERE POST_CODE IN (12, 34)
     * $query->filterByPostCode(array('min' => 12)); // WHERE POST_CODE > 12
     * </code>
     *
     * @param     mixed $postCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAmphurPostcodeQuery The current query, for fluid interface
     */
    public function filterByPostCode($postCode = null, $comparison = null)
    {
        if (is_array($postCode)) {
            $useMinMax = false;
            if (isset($postCode['min'])) {
                $this->addUsingAlias(AmphurPostcodeTableMap::COL_POST_CODE, $postCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postCode['max'])) {
                $this->addUsingAlias(AmphurPostcodeTableMap::COL_POST_CODE, $postCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AmphurPostcodeTableMap::COL_POST_CODE, $postCode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAmphurPostcode $amphurPostcode Object to remove from the list of results
     *
     * @return $this|ChildAmphurPostcodeQuery The current query, for fluid interface
     */
    public function prune($amphurPostcode = null)
    {
        if ($amphurPostcode) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AmphurPostcodeTableMap::COL_AMPHUR_ID), $amphurPostcode->getAmphurId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AmphurPostcodeTableMap::COL_POST_CODE), $amphurPostcode->getPostCode(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the amphur_postcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AmphurPostcodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AmphurPostcodeTableMap::clearInstancePool();
            AmphurPostcodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AmphurPostcodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AmphurPostcodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AmphurPostcodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AmphurPostcodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AmphurPostcodeQuery
