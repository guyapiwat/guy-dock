<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\TblActivityEn as ChildTblActivityEn;
use CciOrm\CciOrm\TblActivityEnQuery as ChildTblActivityEnQuery;
use CciOrm\CciOrm\Map\TblActivityEnTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tbl_activity_en' table.
 *
 *
 *
 * @method     ChildTblActivityEnQuery orderByActId($order = Criteria::ASC) Order by the act_id column
 * @method     ChildTblActivityEnQuery orderByActName($order = Criteria::ASC) Order by the act_name column
 * @method     ChildTblActivityEnQuery orderByDescS($order = Criteria::ASC) Order by the desc_s column
 * @method     ChildTblActivityEnQuery orderByDescL($order = Criteria::ASC) Order by the desc_l column
 * @method     ChildTblActivityEnQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildTblActivityEnQuery orderByShort($order = Criteria::ASC) Order by the short column
 * @method     ChildTblActivityEnQuery orderByImageslide($order = Criteria::ASC) Order by the imageSlide column
 * @method     ChildTblActivityEnQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     ChildTblActivityEnQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     ChildTblActivityEnQuery orderBySlideshow($order = Criteria::ASC) Order by the slideshow column
 *
 * @method     ChildTblActivityEnQuery groupByActId() Group by the act_id column
 * @method     ChildTblActivityEnQuery groupByActName() Group by the act_name column
 * @method     ChildTblActivityEnQuery groupByDescS() Group by the desc_s column
 * @method     ChildTblActivityEnQuery groupByDescL() Group by the desc_l column
 * @method     ChildTblActivityEnQuery groupByImage() Group by the image column
 * @method     ChildTblActivityEnQuery groupByShort() Group by the short column
 * @method     ChildTblActivityEnQuery groupByImageslide() Group by the imageSlide column
 * @method     ChildTblActivityEnQuery groupByStartDate() Group by the start_date column
 * @method     ChildTblActivityEnQuery groupByEndDate() Group by the end_date column
 * @method     ChildTblActivityEnQuery groupBySlideshow() Group by the slideshow column
 *
 * @method     ChildTblActivityEnQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTblActivityEnQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTblActivityEnQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTblActivityEnQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTblActivityEnQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTblActivityEnQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTblActivityEn findOne(ConnectionInterface $con = null) Return the first ChildTblActivityEn matching the query
 * @method     ChildTblActivityEn findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTblActivityEn matching the query, or a new ChildTblActivityEn object populated from the query conditions when no match is found
 *
 * @method     ChildTblActivityEn findOneByActId(int $act_id) Return the first ChildTblActivityEn filtered by the act_id column
 * @method     ChildTblActivityEn findOneByActName(string $act_name) Return the first ChildTblActivityEn filtered by the act_name column
 * @method     ChildTblActivityEn findOneByDescS(string $desc_s) Return the first ChildTblActivityEn filtered by the desc_s column
 * @method     ChildTblActivityEn findOneByDescL(string $desc_l) Return the first ChildTblActivityEn filtered by the desc_l column
 * @method     ChildTblActivityEn findOneByImage(string $image) Return the first ChildTblActivityEn filtered by the image column
 * @method     ChildTblActivityEn findOneByShort(string $short) Return the first ChildTblActivityEn filtered by the short column
 * @method     ChildTblActivityEn findOneByImageslide(string $imageSlide) Return the first ChildTblActivityEn filtered by the imageSlide column
 * @method     ChildTblActivityEn findOneByStartDate(string $start_date) Return the first ChildTblActivityEn filtered by the start_date column
 * @method     ChildTblActivityEn findOneByEndDate(string $end_date) Return the first ChildTblActivityEn filtered by the end_date column
 * @method     ChildTblActivityEn findOneBySlideshow(string $slideshow) Return the first ChildTblActivityEn filtered by the slideshow column *

 * @method     ChildTblActivityEn requirePk($key, ConnectionInterface $con = null) Return the ChildTblActivityEn by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOne(ConnectionInterface $con = null) Return the first ChildTblActivityEn matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblActivityEn requireOneByActId(int $act_id) Return the first ChildTblActivityEn filtered by the act_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneByActName(string $act_name) Return the first ChildTblActivityEn filtered by the act_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneByDescS(string $desc_s) Return the first ChildTblActivityEn filtered by the desc_s column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneByDescL(string $desc_l) Return the first ChildTblActivityEn filtered by the desc_l column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneByImage(string $image) Return the first ChildTblActivityEn filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneByShort(string $short) Return the first ChildTblActivityEn filtered by the short column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneByImageslide(string $imageSlide) Return the first ChildTblActivityEn filtered by the imageSlide column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneByStartDate(string $start_date) Return the first ChildTblActivityEn filtered by the start_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneByEndDate(string $end_date) Return the first ChildTblActivityEn filtered by the end_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTblActivityEn requireOneBySlideshow(string $slideshow) Return the first ChildTblActivityEn filtered by the slideshow column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTblActivityEn[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTblActivityEn objects based on current ModelCriteria
 * @method     ChildTblActivityEn[]|ObjectCollection findByActId(int $act_id) Return ChildTblActivityEn objects filtered by the act_id column
 * @method     ChildTblActivityEn[]|ObjectCollection findByActName(string $act_name) Return ChildTblActivityEn objects filtered by the act_name column
 * @method     ChildTblActivityEn[]|ObjectCollection findByDescS(string $desc_s) Return ChildTblActivityEn objects filtered by the desc_s column
 * @method     ChildTblActivityEn[]|ObjectCollection findByDescL(string $desc_l) Return ChildTblActivityEn objects filtered by the desc_l column
 * @method     ChildTblActivityEn[]|ObjectCollection findByImage(string $image) Return ChildTblActivityEn objects filtered by the image column
 * @method     ChildTblActivityEn[]|ObjectCollection findByShort(string $short) Return ChildTblActivityEn objects filtered by the short column
 * @method     ChildTblActivityEn[]|ObjectCollection findByImageslide(string $imageSlide) Return ChildTblActivityEn objects filtered by the imageSlide column
 * @method     ChildTblActivityEn[]|ObjectCollection findByStartDate(string $start_date) Return ChildTblActivityEn objects filtered by the start_date column
 * @method     ChildTblActivityEn[]|ObjectCollection findByEndDate(string $end_date) Return ChildTblActivityEn objects filtered by the end_date column
 * @method     ChildTblActivityEn[]|ObjectCollection findBySlideshow(string $slideshow) Return ChildTblActivityEn objects filtered by the slideshow column
 * @method     ChildTblActivityEn[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TblActivityEnQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\TblActivityEnQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\TblActivityEn', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTblActivityEnQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTblActivityEnQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTblActivityEnQuery) {
            return $criteria;
        }
        $query = new ChildTblActivityEnQuery();
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
     * @return ChildTblActivityEn|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TblActivityEnTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TblActivityEnTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTblActivityEn A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT act_id, act_name, desc_s, desc_l, image, short, imageSlide, start_date, end_date, slideshow FROM tbl_activity_en WHERE act_id = :p0';
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
            /** @var ChildTblActivityEn $obj */
            $obj = new ChildTblActivityEn();
            $obj->hydrate($row);
            TblActivityEnTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTblActivityEn|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TblActivityEnTableMap::COL_ACT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TblActivityEnTableMap::COL_ACT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the act_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActId(1234); // WHERE act_id = 1234
     * $query->filterByActId(array(12, 34)); // WHERE act_id IN (12, 34)
     * $query->filterByActId(array('min' => 12)); // WHERE act_id > 12
     * </code>
     *
     * @param     mixed $actId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByActId($actId = null, $comparison = null)
    {
        if (is_array($actId)) {
            $useMinMax = false;
            if (isset($actId['min'])) {
                $this->addUsingAlias(TblActivityEnTableMap::COL_ACT_ID, $actId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actId['max'])) {
                $this->addUsingAlias(TblActivityEnTableMap::COL_ACT_ID, $actId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_ACT_ID, $actId, $comparison);
    }

    /**
     * Filter the query on the act_name column
     *
     * Example usage:
     * <code>
     * $query->filterByActName('fooValue');   // WHERE act_name = 'fooValue'
     * $query->filterByActName('%fooValue%', Criteria::LIKE); // WHERE act_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByActName($actName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_ACT_NAME, $actName, $comparison);
    }

    /**
     * Filter the query on the desc_s column
     *
     * Example usage:
     * <code>
     * $query->filterByDescS('fooValue');   // WHERE desc_s = 'fooValue'
     * $query->filterByDescS('%fooValue%', Criteria::LIKE); // WHERE desc_s LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descS The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByDescS($descS = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descS)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_DESC_S, $descS, $comparison);
    }

    /**
     * Filter the query on the desc_l column
     *
     * Example usage:
     * <code>
     * $query->filterByDescL('fooValue');   // WHERE desc_l = 'fooValue'
     * $query->filterByDescL('%fooValue%', Criteria::LIKE); // WHERE desc_l LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descL The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByDescL($descL = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descL)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_DESC_L, $descL, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the short column
     *
     * Example usage:
     * <code>
     * $query->filterByShort('fooValue');   // WHERE short = 'fooValue'
     * $query->filterByShort('%fooValue%', Criteria::LIKE); // WHERE short LIKE '%fooValue%'
     * </code>
     *
     * @param     string $short The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByShort($short = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($short)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_SHORT, $short, $comparison);
    }

    /**
     * Filter the query on the imageSlide column
     *
     * Example usage:
     * <code>
     * $query->filterByImageslide('fooValue');   // WHERE imageSlide = 'fooValue'
     * $query->filterByImageslide('%fooValue%', Criteria::LIKE); // WHERE imageSlide LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imageslide The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByImageslide($imageslide = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageslide)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_IMAGESLIDE, $imageslide, $comparison);
    }

    /**
     * Filter the query on the start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByStartDate('fooValue');   // WHERE start_date = 'fooValue'
     * $query->filterByStartDate('%fooValue%', Criteria::LIKE); // WHERE start_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $startDate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByStartDate($startDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($startDate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_START_DATE, $startDate, $comparison);
    }

    /**
     * Filter the query on the end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEndDate('fooValue');   // WHERE end_date = 'fooValue'
     * $query->filterByEndDate('%fooValue%', Criteria::LIKE); // WHERE end_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $endDate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($endDate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_END_DATE, $endDate, $comparison);
    }

    /**
     * Filter the query on the slideshow column
     *
     * Example usage:
     * <code>
     * $query->filterBySlideshow('fooValue');   // WHERE slideshow = 'fooValue'
     * $query->filterBySlideshow('%fooValue%', Criteria::LIKE); // WHERE slideshow LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slideshow The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function filterBySlideshow($slideshow = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slideshow)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TblActivityEnTableMap::COL_SLIDESHOW, $slideshow, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTblActivityEn $tblActivityEn Object to remove from the list of results
     *
     * @return $this|ChildTblActivityEnQuery The current query, for fluid interface
     */
    public function prune($tblActivityEn = null)
    {
        if ($tblActivityEn) {
            $this->addUsingAlias(TblActivityEnTableMap::COL_ACT_ID, $tblActivityEn->getActId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tbl_activity_en table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TblActivityEnTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TblActivityEnTableMap::clearInstancePool();
            TblActivityEnTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TblActivityEnTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TblActivityEnTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TblActivityEnTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TblActivityEnTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TblActivityEnQuery
