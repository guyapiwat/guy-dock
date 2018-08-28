<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliEmbonus as ChildAliEmbonus;
use CciOrm\CciOrm\AliEmbonusQuery as ChildAliEmbonusQuery;
use CciOrm\CciOrm\Map\AliEmbonusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_embonus' table.
 *
 *
 *
 * @method     ChildAliEmbonusQuery orderByAid($order = Criteria::ASC) Order by the aid column
 * @method     ChildAliEmbonusQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliEmbonusQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliEmbonusQuery orderByMpos($order = Criteria::ASC) Order by the mpos column
 * @method     ChildAliEmbonusQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliEmbonusQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliEmbonusQuery orderByTotal2($order = Criteria::ASC) Order by the total2 column
 * @method     ChildAliEmbonusQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildAliEmbonusQuery orderByOon($order = Criteria::ASC) Order by the oon column
 * @method     ChildAliEmbonusQuery orderByBonus($order = Criteria::ASC) Order by the bonus column
 * @method     ChildAliEmbonusQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliEmbonusQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliEmbonusQuery orderByPosCur($order = Criteria::ASC) Order by the pos_cur column
 * @method     ChildAliEmbonusQuery orderByAdjust($order = Criteria::ASC) Order by the adjust column
 * @method     ChildAliEmbonusQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliEmbonusQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliEmbonusQuery orderByPosCur1($order = Criteria::ASC) Order by the pos_cur1 column
 * @method     ChildAliEmbonusQuery orderByWeak($order = Criteria::ASC) Order by the weak column
 * @method     ChildAliEmbonusQuery orderByPvWorld($order = Criteria::ASC) Order by the pv_world column
 * @method     ChildAliEmbonusQuery orderByAllsumpvCd($order = Criteria::ASC) Order by the allsumpv_cd column
 * @method     ChildAliEmbonusQuery orderByAllsumpvSd($order = Criteria::ASC) Order by the allsumpv_sd column
 * @method     ChildAliEmbonusQuery orderBySumpvCd($order = Criteria::ASC) Order by the sumpv_cd column
 * @method     ChildAliEmbonusQuery orderBySumpvSd($order = Criteria::ASC) Order by the sumpv_sd column
 * @method     ChildAliEmbonusQuery orderByExp($order = Criteria::ASC) Order by the exp column
 *
 * @method     ChildAliEmbonusQuery groupByAid() Group by the aid column
 * @method     ChildAliEmbonusQuery groupByRcode() Group by the rcode column
 * @method     ChildAliEmbonusQuery groupByMcode() Group by the mcode column
 * @method     ChildAliEmbonusQuery groupByMpos() Group by the mpos column
 * @method     ChildAliEmbonusQuery groupByNameT() Group by the name_t column
 * @method     ChildAliEmbonusQuery groupByTotal() Group by the total column
 * @method     ChildAliEmbonusQuery groupByTotal2() Group by the total2 column
 * @method     ChildAliEmbonusQuery groupByTax() Group by the tax column
 * @method     ChildAliEmbonusQuery groupByOon() Group by the oon column
 * @method     ChildAliEmbonusQuery groupByBonus() Group by the bonus column
 * @method     ChildAliEmbonusQuery groupByFdate() Group by the fdate column
 * @method     ChildAliEmbonusQuery groupByTdate() Group by the tdate column
 * @method     ChildAliEmbonusQuery groupByPosCur() Group by the pos_cur column
 * @method     ChildAliEmbonusQuery groupByAdjust() Group by the adjust column
 * @method     ChildAliEmbonusQuery groupByCrate() Group by the crate column
 * @method     ChildAliEmbonusQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliEmbonusQuery groupByPosCur1() Group by the pos_cur1 column
 * @method     ChildAliEmbonusQuery groupByWeak() Group by the weak column
 * @method     ChildAliEmbonusQuery groupByPvWorld() Group by the pv_world column
 * @method     ChildAliEmbonusQuery groupByAllsumpvCd() Group by the allsumpv_cd column
 * @method     ChildAliEmbonusQuery groupByAllsumpvSd() Group by the allsumpv_sd column
 * @method     ChildAliEmbonusQuery groupBySumpvCd() Group by the sumpv_cd column
 * @method     ChildAliEmbonusQuery groupBySumpvSd() Group by the sumpv_sd column
 * @method     ChildAliEmbonusQuery groupByExp() Group by the exp column
 *
 * @method     ChildAliEmbonusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliEmbonusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliEmbonusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliEmbonusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliEmbonusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliEmbonusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliEmbonus findOne(ConnectionInterface $con = null) Return the first ChildAliEmbonus matching the query
 * @method     ChildAliEmbonus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliEmbonus matching the query, or a new ChildAliEmbonus object populated from the query conditions when no match is found
 *
 * @method     ChildAliEmbonus findOneByAid(int $aid) Return the first ChildAliEmbonus filtered by the aid column
 * @method     ChildAliEmbonus findOneByRcode(int $rcode) Return the first ChildAliEmbonus filtered by the rcode column
 * @method     ChildAliEmbonus findOneByMcode(string $mcode) Return the first ChildAliEmbonus filtered by the mcode column
 * @method     ChildAliEmbonus findOneByMpos(string $mpos) Return the first ChildAliEmbonus filtered by the mpos column
 * @method     ChildAliEmbonus findOneByNameT(string $name_t) Return the first ChildAliEmbonus filtered by the name_t column
 * @method     ChildAliEmbonus findOneByTotal(string $total) Return the first ChildAliEmbonus filtered by the total column
 * @method     ChildAliEmbonus findOneByTotal2(string $total2) Return the first ChildAliEmbonus filtered by the total2 column
 * @method     ChildAliEmbonus findOneByTax(string $tax) Return the first ChildAliEmbonus filtered by the tax column
 * @method     ChildAliEmbonus findOneByOon(int $oon) Return the first ChildAliEmbonus filtered by the oon column
 * @method     ChildAliEmbonus findOneByBonus(string $bonus) Return the first ChildAliEmbonus filtered by the bonus column
 * @method     ChildAliEmbonus findOneByFdate(string $fdate) Return the first ChildAliEmbonus filtered by the fdate column
 * @method     ChildAliEmbonus findOneByTdate(string $tdate) Return the first ChildAliEmbonus filtered by the tdate column
 * @method     ChildAliEmbonus findOneByPosCur(string $pos_cur) Return the first ChildAliEmbonus filtered by the pos_cur column
 * @method     ChildAliEmbonus findOneByAdjust(string $adjust) Return the first ChildAliEmbonus filtered by the adjust column
 * @method     ChildAliEmbonus findOneByCrate(string $crate) Return the first ChildAliEmbonus filtered by the crate column
 * @method     ChildAliEmbonus findOneByLocationbase(int $locationbase) Return the first ChildAliEmbonus filtered by the locationbase column
 * @method     ChildAliEmbonus findOneByPosCur1(string $pos_cur1) Return the first ChildAliEmbonus filtered by the pos_cur1 column
 * @method     ChildAliEmbonus findOneByWeak(string $weak) Return the first ChildAliEmbonus filtered by the weak column
 * @method     ChildAliEmbonus findOneByPvWorld(string $pv_world) Return the first ChildAliEmbonus filtered by the pv_world column
 * @method     ChildAliEmbonus findOneByAllsumpvCd(string $allsumpv_cd) Return the first ChildAliEmbonus filtered by the allsumpv_cd column
 * @method     ChildAliEmbonus findOneByAllsumpvSd(string $allsumpv_sd) Return the first ChildAliEmbonus filtered by the allsumpv_sd column
 * @method     ChildAliEmbonus findOneBySumpvCd(string $sumpv_cd) Return the first ChildAliEmbonus filtered by the sumpv_cd column
 * @method     ChildAliEmbonus findOneBySumpvSd(string $sumpv_sd) Return the first ChildAliEmbonus filtered by the sumpv_sd column
 * @method     ChildAliEmbonus findOneByExp(string $exp) Return the first ChildAliEmbonus filtered by the exp column *

 * @method     ChildAliEmbonus requirePk($key, ConnectionInterface $con = null) Return the ChildAliEmbonus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOne(ConnectionInterface $con = null) Return the first ChildAliEmbonus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEmbonus requireOneByAid(int $aid) Return the first ChildAliEmbonus filtered by the aid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByRcode(int $rcode) Return the first ChildAliEmbonus filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByMcode(string $mcode) Return the first ChildAliEmbonus filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByMpos(string $mpos) Return the first ChildAliEmbonus filtered by the mpos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByNameT(string $name_t) Return the first ChildAliEmbonus filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByTotal(string $total) Return the first ChildAliEmbonus filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByTotal2(string $total2) Return the first ChildAliEmbonus filtered by the total2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByTax(string $tax) Return the first ChildAliEmbonus filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByOon(int $oon) Return the first ChildAliEmbonus filtered by the oon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByBonus(string $bonus) Return the first ChildAliEmbonus filtered by the bonus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByFdate(string $fdate) Return the first ChildAliEmbonus filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByTdate(string $tdate) Return the first ChildAliEmbonus filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByPosCur(string $pos_cur) Return the first ChildAliEmbonus filtered by the pos_cur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByAdjust(string $adjust) Return the first ChildAliEmbonus filtered by the adjust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByCrate(string $crate) Return the first ChildAliEmbonus filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByLocationbase(int $locationbase) Return the first ChildAliEmbonus filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByPosCur1(string $pos_cur1) Return the first ChildAliEmbonus filtered by the pos_cur1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByWeak(string $weak) Return the first ChildAliEmbonus filtered by the weak column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByPvWorld(string $pv_world) Return the first ChildAliEmbonus filtered by the pv_world column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByAllsumpvCd(string $allsumpv_cd) Return the first ChildAliEmbonus filtered by the allsumpv_cd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByAllsumpvSd(string $allsumpv_sd) Return the first ChildAliEmbonus filtered by the allsumpv_sd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneBySumpvCd(string $sumpv_cd) Return the first ChildAliEmbonus filtered by the sumpv_cd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneBySumpvSd(string $sumpv_sd) Return the first ChildAliEmbonus filtered by the sumpv_sd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliEmbonus requireOneByExp(string $exp) Return the first ChildAliEmbonus filtered by the exp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliEmbonus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliEmbonus objects based on current ModelCriteria
 * @method     ChildAliEmbonus[]|ObjectCollection findByAid(int $aid) Return ChildAliEmbonus objects filtered by the aid column
 * @method     ChildAliEmbonus[]|ObjectCollection findByRcode(int $rcode) Return ChildAliEmbonus objects filtered by the rcode column
 * @method     ChildAliEmbonus[]|ObjectCollection findByMcode(string $mcode) Return ChildAliEmbonus objects filtered by the mcode column
 * @method     ChildAliEmbonus[]|ObjectCollection findByMpos(string $mpos) Return ChildAliEmbonus objects filtered by the mpos column
 * @method     ChildAliEmbonus[]|ObjectCollection findByNameT(string $name_t) Return ChildAliEmbonus objects filtered by the name_t column
 * @method     ChildAliEmbonus[]|ObjectCollection findByTotal(string $total) Return ChildAliEmbonus objects filtered by the total column
 * @method     ChildAliEmbonus[]|ObjectCollection findByTotal2(string $total2) Return ChildAliEmbonus objects filtered by the total2 column
 * @method     ChildAliEmbonus[]|ObjectCollection findByTax(string $tax) Return ChildAliEmbonus objects filtered by the tax column
 * @method     ChildAliEmbonus[]|ObjectCollection findByOon(int $oon) Return ChildAliEmbonus objects filtered by the oon column
 * @method     ChildAliEmbonus[]|ObjectCollection findByBonus(string $bonus) Return ChildAliEmbonus objects filtered by the bonus column
 * @method     ChildAliEmbonus[]|ObjectCollection findByFdate(string $fdate) Return ChildAliEmbonus objects filtered by the fdate column
 * @method     ChildAliEmbonus[]|ObjectCollection findByTdate(string $tdate) Return ChildAliEmbonus objects filtered by the tdate column
 * @method     ChildAliEmbonus[]|ObjectCollection findByPosCur(string $pos_cur) Return ChildAliEmbonus objects filtered by the pos_cur column
 * @method     ChildAliEmbonus[]|ObjectCollection findByAdjust(string $adjust) Return ChildAliEmbonus objects filtered by the adjust column
 * @method     ChildAliEmbonus[]|ObjectCollection findByCrate(string $crate) Return ChildAliEmbonus objects filtered by the crate column
 * @method     ChildAliEmbonus[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliEmbonus objects filtered by the locationbase column
 * @method     ChildAliEmbonus[]|ObjectCollection findByPosCur1(string $pos_cur1) Return ChildAliEmbonus objects filtered by the pos_cur1 column
 * @method     ChildAliEmbonus[]|ObjectCollection findByWeak(string $weak) Return ChildAliEmbonus objects filtered by the weak column
 * @method     ChildAliEmbonus[]|ObjectCollection findByPvWorld(string $pv_world) Return ChildAliEmbonus objects filtered by the pv_world column
 * @method     ChildAliEmbonus[]|ObjectCollection findByAllsumpvCd(string $allsumpv_cd) Return ChildAliEmbonus objects filtered by the allsumpv_cd column
 * @method     ChildAliEmbonus[]|ObjectCollection findByAllsumpvSd(string $allsumpv_sd) Return ChildAliEmbonus objects filtered by the allsumpv_sd column
 * @method     ChildAliEmbonus[]|ObjectCollection findBySumpvCd(string $sumpv_cd) Return ChildAliEmbonus objects filtered by the sumpv_cd column
 * @method     ChildAliEmbonus[]|ObjectCollection findBySumpvSd(string $sumpv_sd) Return ChildAliEmbonus objects filtered by the sumpv_sd column
 * @method     ChildAliEmbonus[]|ObjectCollection findByExp(string $exp) Return ChildAliEmbonus objects filtered by the exp column
 * @method     ChildAliEmbonus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliEmbonusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliEmbonusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliEmbonus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliEmbonusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliEmbonusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliEmbonusQuery) {
            return $criteria;
        }
        $query = new ChildAliEmbonusQuery();
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
     * @return ChildAliEmbonus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliEmbonusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliEmbonusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliEmbonus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT aid, rcode, mcode, mpos, name_t, total, total2, tax, oon, bonus, fdate, tdate, pos_cur, adjust, crate, locationbase, pos_cur1, weak, pv_world, allsumpv_cd, allsumpv_sd, sumpv_cd, sumpv_sd, exp FROM ali_embonus WHERE aid = :p0';
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
            /** @var ChildAliEmbonus $obj */
            $obj = new ChildAliEmbonus();
            $obj->hydrate($row);
            AliEmbonusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliEmbonus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliEmbonusTableMap::COL_AID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliEmbonusTableMap::COL_AID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the aid column
     *
     * Example usage:
     * <code>
     * $query->filterByAid(1234); // WHERE aid = 1234
     * $query->filterByAid(array(12, 34)); // WHERE aid IN (12, 34)
     * $query->filterByAid(array('min' => 12)); // WHERE aid > 12
     * </code>
     *
     * @param     mixed $aid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByAid($aid = null, $comparison = null)
    {
        if (is_array($aid)) {
            $useMinMax = false;
            if (isset($aid['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_AID, $aid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aid['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_AID, $aid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_AID, $aid, $comparison);
    }

    /**
     * Filter the query on the rcode column
     *
     * Example usage:
     * <code>
     * $query->filterByRcode(1234); // WHERE rcode = 1234
     * $query->filterByRcode(array(12, 34)); // WHERE rcode IN (12, 34)
     * $query->filterByRcode(array('min' => 12)); // WHERE rcode > 12
     * </code>
     *
     * @param     mixed $rcode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_RCODE, $rcode, $comparison);
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
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_MCODE, $mcode, $comparison);
    }

    /**
     * Filter the query on the mpos column
     *
     * Example usage:
     * <code>
     * $query->filterByMpos('fooValue');   // WHERE mpos = 'fooValue'
     * $query->filterByMpos('%fooValue%', Criteria::LIKE); // WHERE mpos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mpos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByMpos($mpos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_MPOS, $mpos, $comparison);
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
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the total2 column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal2(1234); // WHERE total2 = 1234
     * $query->filterByTotal2(array(12, 34)); // WHERE total2 IN (12, 34)
     * $query->filterByTotal2(array('min' => 12)); // WHERE total2 > 12
     * </code>
     *
     * @param     mixed $total2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByTotal2($total2 = null, $comparison = null)
    {
        if (is_array($total2)) {
            $useMinMax = false;
            if (isset($total2['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_TOTAL2, $total2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total2['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_TOTAL2, $total2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_TOTAL2, $total2, $comparison);
    }

    /**
     * Filter the query on the tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTax(1234); // WHERE tax = 1234
     * $query->filterByTax(array(12, 34)); // WHERE tax IN (12, 34)
     * $query->filterByTax(array('min' => 12)); // WHERE tax > 12
     * </code>
     *
     * @param     mixed $tax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (is_array($tax)) {
            $useMinMax = false;
            if (isset($tax['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tax['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_TAX, $tax, $comparison);
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
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByOon($oon = null, $comparison = null)
    {
        if (is_array($oon)) {
            $useMinMax = false;
            if (isset($oon['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_OON, $oon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($oon['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_OON, $oon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_OON, $oon, $comparison);
    }

    /**
     * Filter the query on the bonus column
     *
     * Example usage:
     * <code>
     * $query->filterByBonus(1234); // WHERE bonus = 1234
     * $query->filterByBonus(array(12, 34)); // WHERE bonus IN (12, 34)
     * $query->filterByBonus(array('min' => 12)); // WHERE bonus > 12
     * </code>
     *
     * @param     mixed $bonus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByBonus($bonus = null, $comparison = null)
    {
        if (is_array($bonus)) {
            $useMinMax = false;
            if (isset($bonus['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_BONUS, $bonus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bonus['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_BONUS, $bonus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_BONUS, $bonus, $comparison);
    }

    /**
     * Filter the query on the fdate column
     *
     * Example usage:
     * <code>
     * $query->filterByFdate('2011-03-14'); // WHERE fdate = '2011-03-14'
     * $query->filterByFdate('now'); // WHERE fdate = '2011-03-14'
     * $query->filterByFdate(array('max' => 'yesterday')); // WHERE fdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $fdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_FDATE, $fdate, $comparison);
    }

    /**
     * Filter the query on the tdate column
     *
     * Example usage:
     * <code>
     * $query->filterByTdate('2011-03-14'); // WHERE tdate = '2011-03-14'
     * $query->filterByTdate('now'); // WHERE tdate = '2011-03-14'
     * $query->filterByTdate(array('max' => 'yesterday')); // WHERE tdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $tdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_TDATE, $tdate, $comparison);
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
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByPosCur($posCur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_POS_CUR, $posCur, $comparison);
    }

    /**
     * Filter the query on the adjust column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjust(1234); // WHERE adjust = 1234
     * $query->filterByAdjust(array(12, 34)); // WHERE adjust IN (12, 34)
     * $query->filterByAdjust(array('min' => 12)); // WHERE adjust > 12
     * </code>
     *
     * @param     mixed $adjust The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByAdjust($adjust = null, $comparison = null)
    {
        if (is_array($adjust)) {
            $useMinMax = false;
            if (isset($adjust['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_ADJUST, $adjust['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjust['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_ADJUST, $adjust['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_ADJUST, $adjust, $comparison);
    }

    /**
     * Filter the query on the crate column
     *
     * Example usage:
     * <code>
     * $query->filterByCrate(1234); // WHERE crate = 1234
     * $query->filterByCrate(array(12, 34)); // WHERE crate IN (12, 34)
     * $query->filterByCrate(array('min' => 12)); // WHERE crate > 12
     * </code>
     *
     * @param     mixed $crate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_CRATE, $crate, $comparison);
    }

    /**
     * Filter the query on the locationbase column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationbase(1234); // WHERE locationbase = 1234
     * $query->filterByLocationbase(array(12, 34)); // WHERE locationbase IN (12, 34)
     * $query->filterByLocationbase(array('min' => 12)); // WHERE locationbase > 12
     * </code>
     *
     * @param     mixed $locationbase The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
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
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByPosCur1($posCur1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($posCur1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_POS_CUR1, $posCur1, $comparison);
    }

    /**
     * Filter the query on the weak column
     *
     * Example usage:
     * <code>
     * $query->filterByWeak(1234); // WHERE weak = 1234
     * $query->filterByWeak(array(12, 34)); // WHERE weak IN (12, 34)
     * $query->filterByWeak(array('min' => 12)); // WHERE weak > 12
     * </code>
     *
     * @param     mixed $weak The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByWeak($weak = null, $comparison = null)
    {
        if (is_array($weak)) {
            $useMinMax = false;
            if (isset($weak['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_WEAK, $weak['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weak['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_WEAK, $weak['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_WEAK, $weak, $comparison);
    }

    /**
     * Filter the query on the pv_world column
     *
     * Example usage:
     * <code>
     * $query->filterByPvWorld(1234); // WHERE pv_world = 1234
     * $query->filterByPvWorld(array(12, 34)); // WHERE pv_world IN (12, 34)
     * $query->filterByPvWorld(array('min' => 12)); // WHERE pv_world > 12
     * </code>
     *
     * @param     mixed $pvWorld The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByPvWorld($pvWorld = null, $comparison = null)
    {
        if (is_array($pvWorld)) {
            $useMinMax = false;
            if (isset($pvWorld['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_PV_WORLD, $pvWorld['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pvWorld['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_PV_WORLD, $pvWorld['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_PV_WORLD, $pvWorld, $comparison);
    }

    /**
     * Filter the query on the allsumpv_cd column
     *
     * Example usage:
     * <code>
     * $query->filterByAllsumpvCd(1234); // WHERE allsumpv_cd = 1234
     * $query->filterByAllsumpvCd(array(12, 34)); // WHERE allsumpv_cd IN (12, 34)
     * $query->filterByAllsumpvCd(array('min' => 12)); // WHERE allsumpv_cd > 12
     * </code>
     *
     * @param     mixed $allsumpvCd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByAllsumpvCd($allsumpvCd = null, $comparison = null)
    {
        if (is_array($allsumpvCd)) {
            $useMinMax = false;
            if (isset($allsumpvCd['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_ALLSUMPV_CD, $allsumpvCd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($allsumpvCd['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_ALLSUMPV_CD, $allsumpvCd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_ALLSUMPV_CD, $allsumpvCd, $comparison);
    }

    /**
     * Filter the query on the allsumpv_sd column
     *
     * Example usage:
     * <code>
     * $query->filterByAllsumpvSd(1234); // WHERE allsumpv_sd = 1234
     * $query->filterByAllsumpvSd(array(12, 34)); // WHERE allsumpv_sd IN (12, 34)
     * $query->filterByAllsumpvSd(array('min' => 12)); // WHERE allsumpv_sd > 12
     * </code>
     *
     * @param     mixed $allsumpvSd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByAllsumpvSd($allsumpvSd = null, $comparison = null)
    {
        if (is_array($allsumpvSd)) {
            $useMinMax = false;
            if (isset($allsumpvSd['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_ALLSUMPV_SD, $allsumpvSd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($allsumpvSd['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_ALLSUMPV_SD, $allsumpvSd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_ALLSUMPV_SD, $allsumpvSd, $comparison);
    }

    /**
     * Filter the query on the sumpv_cd column
     *
     * Example usage:
     * <code>
     * $query->filterBySumpvCd(1234); // WHERE sumpv_cd = 1234
     * $query->filterBySumpvCd(array(12, 34)); // WHERE sumpv_cd IN (12, 34)
     * $query->filterBySumpvCd(array('min' => 12)); // WHERE sumpv_cd > 12
     * </code>
     *
     * @param     mixed $sumpvCd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterBySumpvCd($sumpvCd = null, $comparison = null)
    {
        if (is_array($sumpvCd)) {
            $useMinMax = false;
            if (isset($sumpvCd['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_SUMPV_CD, $sumpvCd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumpvCd['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_SUMPV_CD, $sumpvCd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_SUMPV_CD, $sumpvCd, $comparison);
    }

    /**
     * Filter the query on the sumpv_sd column
     *
     * Example usage:
     * <code>
     * $query->filterBySumpvSd(1234); // WHERE sumpv_sd = 1234
     * $query->filterBySumpvSd(array(12, 34)); // WHERE sumpv_sd IN (12, 34)
     * $query->filterBySumpvSd(array('min' => 12)); // WHERE sumpv_sd > 12
     * </code>
     *
     * @param     mixed $sumpvSd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterBySumpvSd($sumpvSd = null, $comparison = null)
    {
        if (is_array($sumpvSd)) {
            $useMinMax = false;
            if (isset($sumpvSd['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_SUMPV_SD, $sumpvSd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumpvSd['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_SUMPV_SD, $sumpvSd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_SUMPV_SD, $sumpvSd, $comparison);
    }

    /**
     * Filter the query on the exp column
     *
     * Example usage:
     * <code>
     * $query->filterByExp(1234); // WHERE exp = 1234
     * $query->filterByExp(array(12, 34)); // WHERE exp IN (12, 34)
     * $query->filterByExp(array('min' => 12)); // WHERE exp > 12
     * </code>
     *
     * @param     mixed $exp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function filterByExp($exp = null, $comparison = null)
    {
        if (is_array($exp)) {
            $useMinMax = false;
            if (isset($exp['min'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_EXP, $exp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($exp['max'])) {
                $this->addUsingAlias(AliEmbonusTableMap::COL_EXP, $exp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliEmbonusTableMap::COL_EXP, $exp, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliEmbonus $aliEmbonus Object to remove from the list of results
     *
     * @return $this|ChildAliEmbonusQuery The current query, for fluid interface
     */
    public function prune($aliEmbonus = null)
    {
        if ($aliEmbonus) {
            $this->addUsingAlias(AliEmbonusTableMap::COL_AID, $aliEmbonus->getAid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_embonus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliEmbonusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliEmbonusTableMap::clearInstancePool();
            AliEmbonusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliEmbonusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliEmbonusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliEmbonusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliEmbonusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliEmbonusQuery
