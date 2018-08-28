<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliStructureBinaryRcode as ChildAliStructureBinaryRcode;
use CciOrm\CciOrm\AliStructureBinaryRcodeQuery as ChildAliStructureBinaryRcodeQuery;
use CciOrm\CciOrm\Map\AliStructureBinaryRcodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_structure_binary_rcode' table.
 *
 *
 *
 * @method     ChildAliStructureBinaryRcodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliStructureBinaryRcodeQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliStructureBinaryRcodeQuery orderByMcodeRef($order = Criteria::ASC) Order by the mcode_ref column
 * @method     ChildAliStructureBinaryRcodeQuery orderByMcodeIndex($order = Criteria::ASC) Order by the mcode_index column
 * @method     ChildAliStructureBinaryRcodeQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliStructureBinaryRcodeQuery orderByStatusTerminate($order = Criteria::ASC) Order by the status_terminate column
 * @method     ChildAliStructureBinaryRcodeQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliStructureBinaryRcodeQuery orderByPosCur1($order = Criteria::ASC) Order by the pos_cur1 column
 * @method     ChildAliStructureBinaryRcodeQuery orderByPosCur2($order = Criteria::ASC) Order by the pos_cur2 column
 *
 * @method     ChildAliStructureBinaryRcodeQuery groupById() Group by the id column
 * @method     ChildAliStructureBinaryRcodeQuery groupByRcode() Group by the rcode column
 * @method     ChildAliStructureBinaryRcodeQuery groupByMcodeRef() Group by the mcode_ref column
 * @method     ChildAliStructureBinaryRcodeQuery groupByMcodeIndex() Group by the mcode_index column
 * @method     ChildAliStructureBinaryRcodeQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliStructureBinaryRcodeQuery groupByStatusTerminate() Group by the status_terminate column
 * @method     ChildAliStructureBinaryRcodeQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliStructureBinaryRcodeQuery groupByPosCur1() Group by the pos_cur1 column
 * @method     ChildAliStructureBinaryRcodeQuery groupByPosCur2() Group by the pos_cur2 column
 *
 * @method     ChildAliStructureBinaryRcodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliStructureBinaryRcodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliStructureBinaryRcodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliStructureBinaryRcodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliStructureBinaryRcodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliStructureBinaryRcodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliStructureBinaryRcode findOne(ConnectionInterface $con = null) Return the first ChildAliStructureBinaryRcode matching the query
 * @method     ChildAliStructureBinaryRcode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliStructureBinaryRcode matching the query, or a new ChildAliStructureBinaryRcode object populated from the query conditions when no match is found
 *
 * @method     ChildAliStructureBinaryRcode findOneById(int $id) Return the first ChildAliStructureBinaryRcode filtered by the id column
 * @method     ChildAliStructureBinaryRcode findOneByRcode(string $rcode) Return the first ChildAliStructureBinaryRcode filtered by the rcode column
 * @method     ChildAliStructureBinaryRcode findOneByMcodeRef(string $mcode_ref) Return the first ChildAliStructureBinaryRcode filtered by the mcode_ref column
 * @method     ChildAliStructureBinaryRcode findOneByMcodeIndex(string $mcode_index) Return the first ChildAliStructureBinaryRcode filtered by the mcode_index column
 * @method     ChildAliStructureBinaryRcode findOneBySpCode(string $sp_code) Return the first ChildAliStructureBinaryRcode filtered by the sp_code column
 * @method     ChildAliStructureBinaryRcode findOneByStatusTerminate(int $status_terminate) Return the first ChildAliStructureBinaryRcode filtered by the status_terminate column
 * @method     ChildAliStructureBinaryRcode findOneByPosCur(string $pos_cur) Return the first ChildAliStructureBinaryRcode filtered by the pos_cur column
 * @method     ChildAliStructureBinaryRcode findOneByPosCur1(string $pos_cur1) Return the first ChildAliStructureBinaryRcode filtered by the pos_cur1 column
 * @method     ChildAliStructureBinaryRcode findOneByPosCur2(string $pos_cur2) Return the first ChildAliStructureBinaryRcode filtered by the pos_cur2 column *

 * @method     ChildAliStructureBinaryRcode requirePk($key, ConnectionInterface $con = null) Return the ChildAliStructureBinaryRcode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOne(ConnectionInterface $con = null) Return the first ChildAliStructureBinaryRcode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStructureBinaryRcode requireOneById(int $id) Return the first ChildAliStructureBinaryRcode filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOneByRcode(string $rcode) Return the first ChildAliStructureBinaryRcode filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOneByMcodeRef(string $mcode_ref) Return the first ChildAliStructureBinaryRcode filtered by the mcode_ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOneByMcodeIndex(string $mcode_index) Return the first ChildAliStructureBinaryRcode filtered by the mcode_index column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOneBySpCode(string $sp_code) Return the first ChildAliStructureBinaryRcode filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOneByStatusTerminate(int $status_terminate) Return the first ChildAliStructureBinaryRcode filtered by the status_terminate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOneByPosCur(string $pos_cur) Return the first ChildAliStructureBinaryRcode filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOneByPosCur1(string $pos_cur1) Return the first ChildAliStructureBinaryRcode filtered by the pos_cur1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliStructureBinaryRcode requireOneByPosCur2(string $pos_cur2) Return the first ChildAliStructureBinaryRcode filtered by the pos_cur2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliStructureBinaryRcode objects based on current ModelCriteria
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findById(int $id) Return ChildAliStructureBinaryRcode objects filtered by the id column
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findByRcode(string $rcode) Return ChildAliStructureBinaryRcode objects filtered by the rcode column
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findByMcodeRef(string $mcode_ref) Return ChildAliStructureBinaryRcode objects filtered by the mcode_ref column
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findByMcodeIndex(string $mcode_index) Return ChildAliStructureBinaryRcode objects filtered by the mcode_index column
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliStructureBinaryRcode objects filtered by the sp_code column
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findByStatusTerminate(int $status_terminate) Return ChildAliStructureBinaryRcode objects filtered by the status_terminate column
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliStructureBinaryRcode objects filtered by the pos_cur column
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findByPosCur1(string $pos_cur1) Return ChildAliStructureBinaryRcode objects filtered by the pos_cur1 column
 * @method     ChildAliStructureBinaryRcode[]|ObjectCollection findByPosCur2(string $pos_cur2) Return ChildAliStructureBinaryRcode objects filtered by the pos_cur2 column
 * @method     ChildAliStructureBinaryRcode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliStructureBinaryRcodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliStructureBinaryRcodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliStructureBinaryRcode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliStructureBinaryRcodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliStructureBinaryRcodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliStructureBinaryRcodeQuery) {
            return $criteria;
        }
        $query = new ChildAliStructureBinaryRcodeQuery();
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
     * @return ChildAliStructureBinaryRcode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliStructureBinaryRcodeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliStructureBinaryRcodeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliStructureBinaryRcode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, rcode, mcode_ref, mcode_index, sp_code, status_terminate, pos_cur, pos_cur1, pos_cur2 FROM ali_structure_binary_rcode WHERE id = :p0';
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
            /** @var ChildAliStructureBinaryRcode $obj */
            $obj = new ChildAliStructureBinaryRcode();
            $obj->hydrate($row);
            AliStructureBinaryRcodeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliStructureBinaryRcode|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the rcode column
     *
     * Example usage:
     * <code>
     * $query->filterByRcode('fooValue');   // WHERE rcode = 'fooValue'
     * $query->filterByRcode('%fooValue%', Criteria::LIKE); // WHERE rcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the mcode_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByMcodeRef('fooValue');   // WHERE mcode_ref = 'fooValue'
     * $query->filterByMcodeRef('%fooValue%', Criteria::LIKE); // WHERE mcode_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcodeRef The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByMcodeRef($mcodeRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeRef)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_MCODE_REF, $mcodeRef, $comparison);
    }

    /**
     * Filter the query on the mcode_index column
     *
     * Example usage:
     * <code>
     * $query->filterByMcodeIndex('fooValue');   // WHERE mcode_index = 'fooValue'
     * $query->filterByMcodeIndex('%fooValue%', Criteria::LIKE); // WHERE mcode_index LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mcodeIndex The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByMcodeIndex($mcodeIndex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcodeIndex)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_MCODE_INDEX, $mcodeIndex, $comparison);
    }

    /**
     * Filter the query on the sp_code column
     *
     * Example usage:
     * <code>
     * $query->filterBySpCode('fooValue');   // WHERE sp_code = 'fooValue'
     * $query->filterBySpCode('%fooValue%', Criteria::LIKE); // WHERE sp_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_SP_CODE, $spCode, $comparison);
    }

    /**
     * Filter the query on the status_terminate column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusTerminate(1234); // WHERE status_terminate = 1234
     * $query->filterByStatusTerminate(array(12, 34)); // WHERE status_terminate IN (12, 34)
     * $query->filterByStatusTerminate(array('min' => 12)); // WHERE status_terminate > 12
     * </code>
     *
     * @param     mixed $statusTerminate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByStatusTerminate($statusTerminate = null, $comparison = null)
    {
        if (is_array($statusTerminate)) {
            $useMinMax = false;
            if (isset($statusTerminate['min'])) {
                $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_STATUS_TERMINATE, $statusTerminate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusTerminate['max'])) {
                $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_STATUS_TERMINATE, $statusTerminate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_STATUS_TERMINATE, $statusTerminate, $comparison);
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
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the pos_cur1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur1('fooValue');   // WHERE pos_cur1 = 'fooValue'
     * $query->filterByPosCur1('%fooValue%', Criteria::LIKE); // WHERE pos_cur1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByPosCur1($posCur1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_POS_CUR1, $posCur1, $comparison);
    }

    /**
     * Filter the query on the pos_cur2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCur2('fooValue');   // WHERE pos_cur2 = 'fooValue'
     * $query->filterByPosCur2('%fooValue%', Criteria::LIKE); // WHERE pos_cur2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $posCur2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function filterByPosCur2($posCur2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_POS_CUR2, $posCur2, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliStructureBinaryRcode $aliStructureBinaryRcode Object to remove from the list of results
     *
     * @return $this|ChildAliStructureBinaryRcodeQuery The current query, for fluid interface
     */
    public function prune($aliStructureBinaryRcode = null)
    {
        if ($aliStructureBinaryRcode) {
            $this->addUsingAlias(AliStructureBinaryRcodeTableMap::COL_ID, $aliStructureBinaryRcode->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_structure_binary_rcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliStructureBinaryRcodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliStructureBinaryRcodeTableMap::clearInstancePool();
            AliStructureBinaryRcodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliStructureBinaryRcodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliStructureBinaryRcodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliStructureBinaryRcodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliStructureBinaryRcodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliStructureBinaryRcodeQuery
