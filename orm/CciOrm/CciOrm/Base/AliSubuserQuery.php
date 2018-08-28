<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliSubuser as ChildAliSubuser;
use CciOrm\CciOrm\AliSubuserQuery as ChildAliSubuserQuery;
use CciOrm\CciOrm\Map\AliSubuserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_subuser' table.
 *
 *
 *
 * @method     ChildAliSubuserQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliSubuserQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliSubuserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildAliSubuserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildAliSubuserQuery orderByObject1($order = Criteria::ASC) Order by the object1 column
 * @method     ChildAliSubuserQuery orderByObject2($order = Criteria::ASC) Order by the object2 column
 * @method     ChildAliSubuserQuery orderByObject3($order = Criteria::ASC) Order by the object3 column
 * @method     ChildAliSubuserQuery orderByObject4($order = Criteria::ASC) Order by the object4 column
 * @method     ChildAliSubuserQuery orderByObject5($order = Criteria::ASC) Order by the object5 column
 * @method     ChildAliSubuserQuery orderByAccessright($order = Criteria::ASC) Order by the accessright column
 *
 * @method     ChildAliSubuserQuery groupByUid() Group by the uid column
 * @method     ChildAliSubuserQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliSubuserQuery groupByUsername() Group by the username column
 * @method     ChildAliSubuserQuery groupByPassword() Group by the password column
 * @method     ChildAliSubuserQuery groupByObject1() Group by the object1 column
 * @method     ChildAliSubuserQuery groupByObject2() Group by the object2 column
 * @method     ChildAliSubuserQuery groupByObject3() Group by the object3 column
 * @method     ChildAliSubuserQuery groupByObject4() Group by the object4 column
 * @method     ChildAliSubuserQuery groupByObject5() Group by the object5 column
 * @method     ChildAliSubuserQuery groupByAccessright() Group by the accessright column
 *
 * @method     ChildAliSubuserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliSubuserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliSubuserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliSubuserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliSubuserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliSubuserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliSubuser findOne(ConnectionInterface $con = null) Return the first ChildAliSubuser matching the query
 * @method     ChildAliSubuser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliSubuser matching the query, or a new ChildAliSubuser object populated from the query conditions when no match is found
 *
 * @method     ChildAliSubuser findOneByUid(int $uid) Return the first ChildAliSubuser filtered by the uid column
 * @method     ChildAliSubuser findOneByUsercode(string $usercode) Return the first ChildAliSubuser filtered by the usercode column
 * @method     ChildAliSubuser findOneByUsername(string $username) Return the first ChildAliSubuser filtered by the username column
 * @method     ChildAliSubuser findOneByPassword(string $password) Return the first ChildAliSubuser filtered by the password column
 * @method     ChildAliSubuser findOneByObject1(string $object1) Return the first ChildAliSubuser filtered by the object1 column
 * @method     ChildAliSubuser findOneByObject2(string $object2) Return the first ChildAliSubuser filtered by the object2 column
 * @method     ChildAliSubuser findOneByObject3(string $object3) Return the first ChildAliSubuser filtered by the object3 column
 * @method     ChildAliSubuser findOneByObject4(string $object4) Return the first ChildAliSubuser filtered by the object4 column
 * @method     ChildAliSubuser findOneByObject5(string $object5) Return the first ChildAliSubuser filtered by the object5 column
 * @method     ChildAliSubuser findOneByAccessright(string $accessright) Return the first ChildAliSubuser filtered by the accessright column *

 * @method     ChildAliSubuser requirePk($key, ConnectionInterface $con = null) Return the ChildAliSubuser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOne(ConnectionInterface $con = null) Return the first ChildAliSubuser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSubuser requireOneByUid(int $uid) Return the first ChildAliSubuser filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByUsercode(string $usercode) Return the first ChildAliSubuser filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByUsername(string $username) Return the first ChildAliSubuser filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByPassword(string $password) Return the first ChildAliSubuser filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByObject1(string $object1) Return the first ChildAliSubuser filtered by the object1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByObject2(string $object2) Return the first ChildAliSubuser filtered by the object2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByObject3(string $object3) Return the first ChildAliSubuser filtered by the object3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByObject4(string $object4) Return the first ChildAliSubuser filtered by the object4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByObject5(string $object5) Return the first ChildAliSubuser filtered by the object5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliSubuser requireOneByAccessright(string $accessright) Return the first ChildAliSubuser filtered by the accessright column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliSubuser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliSubuser objects based on current ModelCriteria
 * @method     ChildAliSubuser[]|ObjectCollection findByUid(int $uid) Return ChildAliSubuser objects filtered by the uid column
 * @method     ChildAliSubuser[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliSubuser objects filtered by the usercode column
 * @method     ChildAliSubuser[]|ObjectCollection findByUsername(string $username) Return ChildAliSubuser objects filtered by the username column
 * @method     ChildAliSubuser[]|ObjectCollection findByPassword(string $password) Return ChildAliSubuser objects filtered by the password column
 * @method     ChildAliSubuser[]|ObjectCollection findByObject1(string $object1) Return ChildAliSubuser objects filtered by the object1 column
 * @method     ChildAliSubuser[]|ObjectCollection findByObject2(string $object2) Return ChildAliSubuser objects filtered by the object2 column
 * @method     ChildAliSubuser[]|ObjectCollection findByObject3(string $object3) Return ChildAliSubuser objects filtered by the object3 column
 * @method     ChildAliSubuser[]|ObjectCollection findByObject4(string $object4) Return ChildAliSubuser objects filtered by the object4 column
 * @method     ChildAliSubuser[]|ObjectCollection findByObject5(string $object5) Return ChildAliSubuser objects filtered by the object5 column
 * @method     ChildAliSubuser[]|ObjectCollection findByAccessright(string $accessright) Return ChildAliSubuser objects filtered by the accessright column
 * @method     ChildAliSubuser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliSubuserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliSubuserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliSubuser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliSubuserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliSubuserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliSubuserQuery) {
            return $criteria;
        }
        $query = new ChildAliSubuserQuery();
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
     * @return ChildAliSubuser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliSubuserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliSubuserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliSubuser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT uid, usercode, username, password, object1, object2, object3, object4, object5, accessright FROM ali_subuser WHERE uid = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAliSubuser $obj */
            $obj = new ChildAliSubuser();
            $obj->hydrate($row);
            AliSubuserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliSubuser|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliSubuserTableMap::COL_UID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliSubuserTableMap::COL_UID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid(1234); // WHERE uid = 1234
     * $query->filterByUid(array(12, 34)); // WHERE uid IN (12, 34)
     * $query->filterByUid(array('min' => 12)); // WHERE uid > 12
     * </code>
     *
     * @param     mixed $uid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (is_array($uid)) {
            $useMinMax = false;
            if (isset($uid['min'])) {
                $this->addUsingAlias(AliSubuserTableMap::COL_UID, $uid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uid['max'])) {
                $this->addUsingAlias(AliSubuserTableMap::COL_UID, $uid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the usercode column
     *
     * Example usage:
     * <code>
     * $query->filterByUsercode('fooValue');   // WHERE usercode = 'fooValue'
     * $query->filterByUsercode('%fooValue%', Criteria::LIKE); // WHERE usercode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usercode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_USERCODE, $usercode, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the object1 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject1('fooValue');   // WHERE object1 = 'fooValue'
     * $query->filterByObject1('%fooValue%', Criteria::LIKE); // WHERE object1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $object1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByObject1($object1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($object1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_OBJECT1, $object1, $comparison);
    }

    /**
     * Filter the query on the object2 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject2('fooValue');   // WHERE object2 = 'fooValue'
     * $query->filterByObject2('%fooValue%', Criteria::LIKE); // WHERE object2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $object2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByObject2($object2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($object2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_OBJECT2, $object2, $comparison);
    }

    /**
     * Filter the query on the object3 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject3('fooValue');   // WHERE object3 = 'fooValue'
     * $query->filterByObject3('%fooValue%', Criteria::LIKE); // WHERE object3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $object3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByObject3($object3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($object3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_OBJECT3, $object3, $comparison);
    }

    /**
     * Filter the query on the object4 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject4('fooValue');   // WHERE object4 = 'fooValue'
     * $query->filterByObject4('%fooValue%', Criteria::LIKE); // WHERE object4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $object4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByObject4($object4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($object4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_OBJECT4, $object4, $comparison);
    }

    /**
     * Filter the query on the object5 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject5('fooValue');   // WHERE object5 = 'fooValue'
     * $query->filterByObject5('%fooValue%', Criteria::LIKE); // WHERE object5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $object5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByObject5($object5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($object5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_OBJECT5, $object5, $comparison);
    }

    /**
     * Filter the query on the accessright column
     *
     * Example usage:
     * <code>
     * $query->filterByAccessright('fooValue');   // WHERE accessright = 'fooValue'
     * $query->filterByAccessright('%fooValue%', Criteria::LIKE); // WHERE accessright LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accessright The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function filterByAccessright($accessright = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accessright)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliSubuserTableMap::COL_ACCESSRIGHT, $accessright, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliSubuser $aliSubuser Object to remove from the list of results
     *
     * @return $this|ChildAliSubuserQuery The current query, for fluid interface
     */
    public function prune($aliSubuser = null)
    {
        if ($aliSubuser) {
            $this->addUsingAlias(AliSubuserTableMap::COL_UID, $aliSubuser->getUid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_subuser table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliSubuserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliSubuserTableMap::clearInstancePool();
            AliSubuserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliSubuserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliSubuserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliSubuserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliSubuserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliSubuserQuery
