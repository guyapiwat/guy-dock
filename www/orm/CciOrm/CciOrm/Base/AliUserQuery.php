<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliUser as ChildAliUser;
use CciOrm\CciOrm\AliUserQuery as ChildAliUserQuery;
use CciOrm\CciOrm\Map\AliUserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_user' table.
 *
 *
 *
 * @method     ChildAliUserQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliUserQuery orderByUsercode($order = Criteria::ASC) Order by the usercode column
 * @method     ChildAliUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildAliUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildAliUserQuery orderByUsertype($order = Criteria::ASC) Order by the usertype column
 * @method     ChildAliUserQuery orderByObject1($order = Criteria::ASC) Order by the object1 column
 * @method     ChildAliUserQuery orderByObject2($order = Criteria::ASC) Order by the object2 column
 * @method     ChildAliUserQuery orderByObject3($order = Criteria::ASC) Order by the object3 column
 * @method     ChildAliUserQuery orderByObject4($order = Criteria::ASC) Order by the object4 column
 * @method     ChildAliUserQuery orderByObject5($order = Criteria::ASC) Order by the object5 column
 * @method     ChildAliUserQuery orderByObject6($order = Criteria::ASC) Order by the object6 column
 * @method     ChildAliUserQuery orderByObject7($order = Criteria::ASC) Order by the object7 column
 * @method     ChildAliUserQuery orderByObject8($order = Criteria::ASC) Order by the object8 column
 * @method     ChildAliUserQuery orderByObject9($order = Criteria::ASC) Order by the object9 column
 * @method     ChildAliUserQuery orderByObject10($order = Criteria::ASC) Order by the object10 column
 * @method     ChildAliUserQuery orderByInvRef($order = Criteria::ASC) Order by the inv_ref column
 * @method     ChildAliUserQuery orderByAccessright($order = Criteria::ASC) Order by the accessright column
 * @method     ChildAliUserQuery orderByCodeRef($order = Criteria::ASC) Order by the code_ref column
 * @method     ChildAliUserQuery orderByCheckbackdate($order = Criteria::ASC) Order by the checkbackdate column
 * @method     ChildAliUserQuery orderByLimitcredit($order = Criteria::ASC) Order by the limitcredit column
 * @method     ChildAliUserQuery orderByMtype($order = Criteria::ASC) Order by the mtype column
 *
 * @method     ChildAliUserQuery groupByUid() Group by the uid column
 * @method     ChildAliUserQuery groupByUsercode() Group by the usercode column
 * @method     ChildAliUserQuery groupByUsername() Group by the username column
 * @method     ChildAliUserQuery groupByPassword() Group by the password column
 * @method     ChildAliUserQuery groupByUsertype() Group by the usertype column
 * @method     ChildAliUserQuery groupByObject1() Group by the object1 column
 * @method     ChildAliUserQuery groupByObject2() Group by the object2 column
 * @method     ChildAliUserQuery groupByObject3() Group by the object3 column
 * @method     ChildAliUserQuery groupByObject4() Group by the object4 column
 * @method     ChildAliUserQuery groupByObject5() Group by the object5 column
 * @method     ChildAliUserQuery groupByObject6() Group by the object6 column
 * @method     ChildAliUserQuery groupByObject7() Group by the object7 column
 * @method     ChildAliUserQuery groupByObject8() Group by the object8 column
 * @method     ChildAliUserQuery groupByObject9() Group by the object9 column
 * @method     ChildAliUserQuery groupByObject10() Group by the object10 column
 * @method     ChildAliUserQuery groupByInvRef() Group by the inv_ref column
 * @method     ChildAliUserQuery groupByAccessright() Group by the accessright column
 * @method     ChildAliUserQuery groupByCodeRef() Group by the code_ref column
 * @method     ChildAliUserQuery groupByCheckbackdate() Group by the checkbackdate column
 * @method     ChildAliUserQuery groupByLimitcredit() Group by the limitcredit column
 * @method     ChildAliUserQuery groupByMtype() Group by the mtype column
 *
 * @method     ChildAliUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliUser findOne(ConnectionInterface $con = null) Return the first ChildAliUser matching the query
 * @method     ChildAliUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliUser matching the query, or a new ChildAliUser object populated from the query conditions when no match is found
 *
 * @method     ChildAliUser findOneByUid(int $uid) Return the first ChildAliUser filtered by the uid column
 * @method     ChildAliUser findOneByUsercode(string $usercode) Return the first ChildAliUser filtered by the usercode column
 * @method     ChildAliUser findOneByUsername(string $username) Return the first ChildAliUser filtered by the username column
 * @method     ChildAliUser findOneByPassword(string $password) Return the first ChildAliUser filtered by the password column
 * @method     ChildAliUser findOneByUsertype(int $usertype) Return the first ChildAliUser filtered by the usertype column
 * @method     ChildAliUser findOneByObject1(int $object1) Return the first ChildAliUser filtered by the object1 column
 * @method     ChildAliUser findOneByObject2(int $object2) Return the first ChildAliUser filtered by the object2 column
 * @method     ChildAliUser findOneByObject3(int $object3) Return the first ChildAliUser filtered by the object3 column
 * @method     ChildAliUser findOneByObject4(int $object4) Return the first ChildAliUser filtered by the object4 column
 * @method     ChildAliUser findOneByObject5(int $object5) Return the first ChildAliUser filtered by the object5 column
 * @method     ChildAliUser findOneByObject6(int $object6) Return the first ChildAliUser filtered by the object6 column
 * @method     ChildAliUser findOneByObject7(int $object7) Return the first ChildAliUser filtered by the object7 column
 * @method     ChildAliUser findOneByObject8(int $object8) Return the first ChildAliUser filtered by the object8 column
 * @method     ChildAliUser findOneByObject9(int $object9) Return the first ChildAliUser filtered by the object9 column
 * @method     ChildAliUser findOneByObject10(int $object10) Return the first ChildAliUser filtered by the object10 column
 * @method     ChildAliUser findOneByInvRef(string $inv_ref) Return the first ChildAliUser filtered by the inv_ref column
 * @method     ChildAliUser findOneByAccessright(string $accessright) Return the first ChildAliUser filtered by the accessright column
 * @method     ChildAliUser findOneByCodeRef(string $code_ref) Return the first ChildAliUser filtered by the code_ref column
 * @method     ChildAliUser findOneByCheckbackdate(int $checkbackdate) Return the first ChildAliUser filtered by the checkbackdate column
 * @method     ChildAliUser findOneByLimitcredit(int $limitcredit) Return the first ChildAliUser filtered by the limitcredit column
 * @method     ChildAliUser findOneByMtype(int $mtype) Return the first ChildAliUser filtered by the mtype column *

 * @method     ChildAliUser requirePk($key, ConnectionInterface $con = null) Return the ChildAliUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOne(ConnectionInterface $con = null) Return the first ChildAliUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliUser requireOneByUid(int $uid) Return the first ChildAliUser filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByUsercode(string $usercode) Return the first ChildAliUser filtered by the usercode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByUsername(string $username) Return the first ChildAliUser filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByPassword(string $password) Return the first ChildAliUser filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByUsertype(int $usertype) Return the first ChildAliUser filtered by the usertype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject1(int $object1) Return the first ChildAliUser filtered by the object1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject2(int $object2) Return the first ChildAliUser filtered by the object2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject3(int $object3) Return the first ChildAliUser filtered by the object3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject4(int $object4) Return the first ChildAliUser filtered by the object4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject5(int $object5) Return the first ChildAliUser filtered by the object5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject6(int $object6) Return the first ChildAliUser filtered by the object6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject7(int $object7) Return the first ChildAliUser filtered by the object7 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject8(int $object8) Return the first ChildAliUser filtered by the object8 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject9(int $object9) Return the first ChildAliUser filtered by the object9 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByObject10(int $object10) Return the first ChildAliUser filtered by the object10 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByInvRef(string $inv_ref) Return the first ChildAliUser filtered by the inv_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByAccessright(string $accessright) Return the first ChildAliUser filtered by the accessright column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByCodeRef(string $code_ref) Return the first ChildAliUser filtered by the code_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByCheckbackdate(int $checkbackdate) Return the first ChildAliUser filtered by the checkbackdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByLimitcredit(int $limitcredit) Return the first ChildAliUser filtered by the limitcredit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliUser requireOneByMtype(int $mtype) Return the first ChildAliUser filtered by the mtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliUser objects based on current ModelCriteria
 * @method     ChildAliUser[]|ObjectCollection findByUid(int $uid) Return ChildAliUser objects filtered by the uid column
 * @method     ChildAliUser[]|ObjectCollection findByUsercode(string $usercode) Return ChildAliUser objects filtered by the usercode column
 * @method     ChildAliUser[]|ObjectCollection findByUsername(string $username) Return ChildAliUser objects filtered by the username column
 * @method     ChildAliUser[]|ObjectCollection findByPassword(string $password) Return ChildAliUser objects filtered by the password column
 * @method     ChildAliUser[]|ObjectCollection findByUsertype(int $usertype) Return ChildAliUser objects filtered by the usertype column
 * @method     ChildAliUser[]|ObjectCollection findByObject1(int $object1) Return ChildAliUser objects filtered by the object1 column
 * @method     ChildAliUser[]|ObjectCollection findByObject2(int $object2) Return ChildAliUser objects filtered by the object2 column
 * @method     ChildAliUser[]|ObjectCollection findByObject3(int $object3) Return ChildAliUser objects filtered by the object3 column
 * @method     ChildAliUser[]|ObjectCollection findByObject4(int $object4) Return ChildAliUser objects filtered by the object4 column
 * @method     ChildAliUser[]|ObjectCollection findByObject5(int $object5) Return ChildAliUser objects filtered by the object5 column
 * @method     ChildAliUser[]|ObjectCollection findByObject6(int $object6) Return ChildAliUser objects filtered by the object6 column
 * @method     ChildAliUser[]|ObjectCollection findByObject7(int $object7) Return ChildAliUser objects filtered by the object7 column
 * @method     ChildAliUser[]|ObjectCollection findByObject8(int $object8) Return ChildAliUser objects filtered by the object8 column
 * @method     ChildAliUser[]|ObjectCollection findByObject9(int $object9) Return ChildAliUser objects filtered by the object9 column
 * @method     ChildAliUser[]|ObjectCollection findByObject10(int $object10) Return ChildAliUser objects filtered by the object10 column
 * @method     ChildAliUser[]|ObjectCollection findByInvRef(string $inv_ref) Return ChildAliUser objects filtered by the inv_ref column
 * @method     ChildAliUser[]|ObjectCollection findByAccessright(string $accessright) Return ChildAliUser objects filtered by the accessright column
 * @method     ChildAliUser[]|ObjectCollection findByCodeRef(string $code_ref) Return ChildAliUser objects filtered by the code_ref column
 * @method     ChildAliUser[]|ObjectCollection findByCheckbackdate(int $checkbackdate) Return ChildAliUser objects filtered by the checkbackdate column
 * @method     ChildAliUser[]|ObjectCollection findByLimitcredit(int $limitcredit) Return ChildAliUser objects filtered by the limitcredit column
 * @method     ChildAliUser[]|ObjectCollection findByMtype(int $mtype) Return ChildAliUser objects filtered by the mtype column
 * @method     ChildAliUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliUserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliUserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliUserQuery) {
            return $criteria;
        }
        $query = new ChildAliUserQuery();
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
     * @return ChildAliUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliUserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliUserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT uid, usercode, username, password, usertype, object1, object2, object3, object4, object5, object6, object7, object8, object9, object10, inv_ref, accessright, code_ref, checkbackdate, limitcredit, mtype FROM ali_user WHERE uid = :p0';
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
            /** @var ChildAliUser $obj */
            $obj = new ChildAliUser();
            $obj->hydrate($row);
            AliUserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliUserTableMap::COL_UID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliUserTableMap::COL_UID, $keys, Criteria::IN);
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
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (is_array($uid)) {
            $useMinMax = false;
            if (isset($uid['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_UID, $uid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uid['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_UID, $uid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByUsercode($usercode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usercode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_USERCODE, $usercode, $comparison);
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
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_USERNAME, $username, $comparison);
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
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the usertype column
     *
     * Example usage:
     * <code>
     * $query->filterByUsertype(1234); // WHERE usertype = 1234
     * $query->filterByUsertype(array(12, 34)); // WHERE usertype IN (12, 34)
     * $query->filterByUsertype(array('min' => 12)); // WHERE usertype > 12
     * </code>
     *
     * @param     mixed $usertype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByUsertype($usertype = null, $comparison = null)
    {
        if (is_array($usertype)) {
            $useMinMax = false;
            if (isset($usertype['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_USERTYPE, $usertype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usertype['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_USERTYPE, $usertype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_USERTYPE, $usertype, $comparison);
    }

    /**
     * Filter the query on the object1 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject1(1234); // WHERE object1 = 1234
     * $query->filterByObject1(array(12, 34)); // WHERE object1 IN (12, 34)
     * $query->filterByObject1(array('min' => 12)); // WHERE object1 > 12
     * </code>
     *
     * @param     mixed $object1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject1($object1 = null, $comparison = null)
    {
        if (is_array($object1)) {
            $useMinMax = false;
            if (isset($object1['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT1, $object1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object1['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT1, $object1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT1, $object1, $comparison);
    }

    /**
     * Filter the query on the object2 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject2(1234); // WHERE object2 = 1234
     * $query->filterByObject2(array(12, 34)); // WHERE object2 IN (12, 34)
     * $query->filterByObject2(array('min' => 12)); // WHERE object2 > 12
     * </code>
     *
     * @param     mixed $object2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject2($object2 = null, $comparison = null)
    {
        if (is_array($object2)) {
            $useMinMax = false;
            if (isset($object2['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT2, $object2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object2['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT2, $object2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT2, $object2, $comparison);
    }

    /**
     * Filter the query on the object3 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject3(1234); // WHERE object3 = 1234
     * $query->filterByObject3(array(12, 34)); // WHERE object3 IN (12, 34)
     * $query->filterByObject3(array('min' => 12)); // WHERE object3 > 12
     * </code>
     *
     * @param     mixed $object3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject3($object3 = null, $comparison = null)
    {
        if (is_array($object3)) {
            $useMinMax = false;
            if (isset($object3['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT3, $object3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object3['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT3, $object3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT3, $object3, $comparison);
    }

    /**
     * Filter the query on the object4 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject4(1234); // WHERE object4 = 1234
     * $query->filterByObject4(array(12, 34)); // WHERE object4 IN (12, 34)
     * $query->filterByObject4(array('min' => 12)); // WHERE object4 > 12
     * </code>
     *
     * @param     mixed $object4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject4($object4 = null, $comparison = null)
    {
        if (is_array($object4)) {
            $useMinMax = false;
            if (isset($object4['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT4, $object4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object4['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT4, $object4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT4, $object4, $comparison);
    }

    /**
     * Filter the query on the object5 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject5(1234); // WHERE object5 = 1234
     * $query->filterByObject5(array(12, 34)); // WHERE object5 IN (12, 34)
     * $query->filterByObject5(array('min' => 12)); // WHERE object5 > 12
     * </code>
     *
     * @param     mixed $object5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject5($object5 = null, $comparison = null)
    {
        if (is_array($object5)) {
            $useMinMax = false;
            if (isset($object5['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT5, $object5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object5['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT5, $object5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT5, $object5, $comparison);
    }

    /**
     * Filter the query on the object6 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject6(1234); // WHERE object6 = 1234
     * $query->filterByObject6(array(12, 34)); // WHERE object6 IN (12, 34)
     * $query->filterByObject6(array('min' => 12)); // WHERE object6 > 12
     * </code>
     *
     * @param     mixed $object6 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject6($object6 = null, $comparison = null)
    {
        if (is_array($object6)) {
            $useMinMax = false;
            if (isset($object6['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT6, $object6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object6['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT6, $object6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT6, $object6, $comparison);
    }

    /**
     * Filter the query on the object7 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject7(1234); // WHERE object7 = 1234
     * $query->filterByObject7(array(12, 34)); // WHERE object7 IN (12, 34)
     * $query->filterByObject7(array('min' => 12)); // WHERE object7 > 12
     * </code>
     *
     * @param     mixed $object7 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject7($object7 = null, $comparison = null)
    {
        if (is_array($object7)) {
            $useMinMax = false;
            if (isset($object7['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT7, $object7['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object7['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT7, $object7['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT7, $object7, $comparison);
    }

    /**
     * Filter the query on the object8 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject8(1234); // WHERE object8 = 1234
     * $query->filterByObject8(array(12, 34)); // WHERE object8 IN (12, 34)
     * $query->filterByObject8(array('min' => 12)); // WHERE object8 > 12
     * </code>
     *
     * @param     mixed $object8 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject8($object8 = null, $comparison = null)
    {
        if (is_array($object8)) {
            $useMinMax = false;
            if (isset($object8['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT8, $object8['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object8['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT8, $object8['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT8, $object8, $comparison);
    }

    /**
     * Filter the query on the object9 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject9(1234); // WHERE object9 = 1234
     * $query->filterByObject9(array(12, 34)); // WHERE object9 IN (12, 34)
     * $query->filterByObject9(array('min' => 12)); // WHERE object9 > 12
     * </code>
     *
     * @param     mixed $object9 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject9($object9 = null, $comparison = null)
    {
        if (is_array($object9)) {
            $useMinMax = false;
            if (isset($object9['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT9, $object9['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object9['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT9, $object9['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT9, $object9, $comparison);
    }

    /**
     * Filter the query on the object10 column
     *
     * Example usage:
     * <code>
     * $query->filterByObject10(1234); // WHERE object10 = 1234
     * $query->filterByObject10(array(12, 34)); // WHERE object10 IN (12, 34)
     * $query->filterByObject10(array('min' => 12)); // WHERE object10 > 12
     * </code>
     *
     * @param     mixed $object10 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByObject10($object10 = null, $comparison = null)
    {
        if (is_array($object10)) {
            $useMinMax = false;
            if (isset($object10['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT10, $object10['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($object10['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_OBJECT10, $object10['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_OBJECT10, $object10, $comparison);
    }

    /**
     * Filter the query on the inv_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByInvRef('fooValue');   // WHERE inv_ref = 'fooValue'
     * $query->filterByInvRef('%fooValue%', Criteria::LIKE); // WHERE inv_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByInvRef($invRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_INV_REF, $invRef, $comparison);
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
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByAccessright($accessright = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accessright)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_ACCESSRIGHT, $accessright, $comparison);
    }

    /**
     * Filter the query on the code_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeRef('fooValue');   // WHERE code_ref = 'fooValue'
     * $query->filterByCodeRef('%fooValue%', Criteria::LIKE); // WHERE code_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codeRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByCodeRef($codeRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codeRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_CODE_REF, $codeRef, $comparison);
    }

    /**
     * Filter the query on the checkbackdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckbackdate(1234); // WHERE checkbackdate = 1234
     * $query->filterByCheckbackdate(array(12, 34)); // WHERE checkbackdate IN (12, 34)
     * $query->filterByCheckbackdate(array('min' => 12)); // WHERE checkbackdate > 12
     * </code>
     *
     * @param     mixed $checkbackdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByCheckbackdate($checkbackdate = null, $comparison = null)
    {
        if (is_array($checkbackdate)) {
            $useMinMax = false;
            if (isset($checkbackdate['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_CHECKBACKDATE, $checkbackdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkbackdate['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_CHECKBACKDATE, $checkbackdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_CHECKBACKDATE, $checkbackdate, $comparison);
    }

    /**
     * Filter the query on the limitcredit column
     *
     * Example usage:
     * <code>
     * $query->filterByLimitcredit(1234); // WHERE limitcredit = 1234
     * $query->filterByLimitcredit(array(12, 34)); // WHERE limitcredit IN (12, 34)
     * $query->filterByLimitcredit(array('min' => 12)); // WHERE limitcredit > 12
     * </code>
     *
     * @param     mixed $limitcredit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByLimitcredit($limitcredit = null, $comparison = null)
    {
        if (is_array($limitcredit)) {
            $useMinMax = false;
            if (isset($limitcredit['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_LIMITCREDIT, $limitcredit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($limitcredit['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_LIMITCREDIT, $limitcredit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_LIMITCREDIT, $limitcredit, $comparison);
    }

    /**
     * Filter the query on the mtype column
     *
     * Example usage:
     * <code>
     * $query->filterByMtype(1234); // WHERE mtype = 1234
     * $query->filterByMtype(array(12, 34)); // WHERE mtype IN (12, 34)
     * $query->filterByMtype(array('min' => 12)); // WHERE mtype > 12
     * </code>
     *
     * @param     mixed $mtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function filterByMtype($mtype = null, $comparison = null)
    {
        if (is_array($mtype)) {
            $useMinMax = false;
            if (isset($mtype['min'])) {
                $this->addUsingAlias(AliUserTableMap::COL_MTYPE, $mtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mtype['max'])) {
                $this->addUsingAlias(AliUserTableMap::COL_MTYPE, $mtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliUserTableMap::COL_MTYPE, $mtype, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliUser $aliUser Object to remove from the list of results
     *
     * @return $this|ChildAliUserQuery The current query, for fluid interface
     */
    public function prune($aliUser = null)
    {
        if ($aliUser) {
            $this->addUsingAlias(AliUserTableMap::COL_UID, $aliUser->getUid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliUserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliUserTableMap::clearInstancePool();
            AliUserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliUserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliUserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliUserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliUserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliUserQuery
