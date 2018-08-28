<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliHoldhead as ChildAliHoldhead;
use CciOrm\CciOrm\AliHoldheadQuery as ChildAliHoldheadQuery;
use CciOrm\CciOrm\Map\AliHoldheadTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_holdhead' table.
 *
 *
 *
 * @method     ChildAliHoldheadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAliHoldheadQuery orderByHono($order = Criteria::ASC) Order by the hono column
 * @method     ChildAliHoldheadQuery orderBySano($order = Criteria::ASC) Order by the sano column
 * @method     ChildAliHoldheadQuery orderBySadate($order = Criteria::ASC) Order by the sadate column
 * @method     ChildAliHoldheadQuery orderBySctime($order = Criteria::ASC) Order by the sctime column
 * @method     ChildAliHoldheadQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliHoldheadQuery orderByInvCode($order = Criteria::ASC) Order by the inv_code column
 * @method     ChildAliHoldheadQuery orderByInvCodeTo($order = Criteria::ASC) Order by the inv_code_to column
 * @method     ChildAliHoldheadQuery orderByMcode($order = Criteria::ASC) Order by the mcode column
 * @method     ChildAliHoldheadQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildAliHoldheadQuery orderByTotPv($order = Criteria::ASC) Order by the tot_pv column
 * @method     ChildAliHoldheadQuery orderByTotBv($order = Criteria::ASC) Order by the tot_bv column
 * @method     ChildAliHoldheadQuery orderByTotSppv($order = Criteria::ASC) Order by the tot_sppv column
 * @method     ChildAliHoldheadQuery orderByTotFv($order = Criteria::ASC) Order by the tot_fv column
 * @method     ChildAliHoldheadQuery orderByTrnf($order = Criteria::ASC) Order by the trnf column
 * @method     ChildAliHoldheadQuery orderByCancel($order = Criteria::ASC) Order by the cancel column
 * @method     ChildAliHoldheadQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 * @method     ChildAliHoldheadQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildAliHoldheadQuery orderByDl($order = Criteria::ASC) Order by the dl column
 * @method     ChildAliHoldheadQuery orderByPrint($order = Criteria::ASC) Order by the print column
 * @method     ChildAliHoldheadQuery orderByRcode($order = Criteria::ASC) Order by the rcode column
 * @method     ChildAliHoldheadQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildAliHoldheadQuery orderByBmcauto($order = Criteria::ASC) Order by the bmcauto column
 * @method     ChildAliHoldheadQuery orderByCancelDate($order = Criteria::ASC) Order by the cancel_date column
 * @method     ChildAliHoldheadQuery orderByUidCancel($order = Criteria::ASC) Order by the uid_cancel column
 * @method     ChildAliHoldheadQuery orderByMbase($order = Criteria::ASC) Order by the mbase column
 * @method     ChildAliHoldheadQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliHoldheadQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliHoldheadQuery orderByNameF($order = Criteria::ASC) Order by the name_f column
 * @method     ChildAliHoldheadQuery orderByNameT($order = Criteria::ASC) Order by the name_t column
 * @method     ChildAliHoldheadQuery orderByCrate($order = Criteria::ASC) Order by the crate column
 * @method     ChildAliHoldheadQuery orderBySpCode($order = Criteria::ASC) Order by the sp_code column
 * @method     ChildAliHoldheadQuery orderBySpPos($order = Criteria::ASC) Order by the sp_pos column
 * @method     ChildAliHoldheadQuery orderByRef($order = Criteria::ASC) Order by the ref column
 * @method     ChildAliHoldheadQuery orderByStatusPackage($order = Criteria::ASC) Order by the status_package column
 *
 * @method     ChildAliHoldheadQuery groupById() Group by the id column
 * @method     ChildAliHoldheadQuery groupByHono() Group by the hono column
 * @method     ChildAliHoldheadQuery groupBySano() Group by the sano column
 * @method     ChildAliHoldheadQuery groupBySadate() Group by the sadate column
 * @method     ChildAliHoldheadQuery groupBySctime() Group by the sctime column
 * @method     ChildAliHoldheadQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliHoldheadQuery groupByInvCode() Group by the inv_code column
 * @method     ChildAliHoldheadQuery groupByInvCodeTo() Group by the inv_code_to column
 * @method     ChildAliHoldheadQuery groupByMcode() Group by the mcode column
 * @method     ChildAliHoldheadQuery groupByTotal() Group by the total column
 * @method     ChildAliHoldheadQuery groupByTotPv() Group by the tot_pv column
 * @method     ChildAliHoldheadQuery groupByTotBv() Group by the tot_bv column
 * @method     ChildAliHoldheadQuery groupByTotSppv() Group by the tot_sppv column
 * @method     ChildAliHoldheadQuery groupByTotFv() Group by the tot_fv column
 * @method     ChildAliHoldheadQuery groupByTrnf() Group by the trnf column
 * @method     ChildAliHoldheadQuery groupByCancel() Group by the cancel column
 * @method     ChildAliHoldheadQuery groupByRemark() Group by the remark column
 * @method     ChildAliHoldheadQuery groupByUid() Group by the uid column
 * @method     ChildAliHoldheadQuery groupByDl() Group by the dl column
 * @method     ChildAliHoldheadQuery groupByPrint() Group by the print column
 * @method     ChildAliHoldheadQuery groupByRcode() Group by the rcode column
 * @method     ChildAliHoldheadQuery groupByStatus() Group by the status column
 * @method     ChildAliHoldheadQuery groupByBmcauto() Group by the bmcauto column
 * @method     ChildAliHoldheadQuery groupByCancelDate() Group by the cancel_date column
 * @method     ChildAliHoldheadQuery groupByUidCancel() Group by the uid_cancel column
 * @method     ChildAliHoldheadQuery groupByMbase() Group by the mbase column
 * @method     ChildAliHoldheadQuery groupByBprice() Group by the bprice column
 * @method     ChildAliHoldheadQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliHoldheadQuery groupByNameF() Group by the name_f column
 * @method     ChildAliHoldheadQuery groupByNameT() Group by the name_t column
 * @method     ChildAliHoldheadQuery groupByCrate() Group by the crate column
 * @method     ChildAliHoldheadQuery groupBySpCode() Group by the sp_code column
 * @method     ChildAliHoldheadQuery groupBySpPos() Group by the sp_pos column
 * @method     ChildAliHoldheadQuery groupByRef() Group by the ref column
 * @method     ChildAliHoldheadQuery groupByStatusPackage() Group by the status_package column
 *
 * @method     ChildAliHoldheadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliHoldheadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliHoldheadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliHoldheadQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliHoldheadQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliHoldheadQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliHoldhead findOne(ConnectionInterface $con = null) Return the first ChildAliHoldhead matching the query
 * @method     ChildAliHoldhead findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliHoldhead matching the query, or a new ChildAliHoldhead object populated from the query conditions when no match is found
 *
 * @method     ChildAliHoldhead findOneById(int $id) Return the first ChildAliHoldhead filtered by the id column
 * @method     ChildAliHoldhead findOneByHono(int $hono) Return the first ChildAliHoldhead filtered by the hono column
 * @method     ChildAliHoldhead findOneBySano(int $sano) Return the first ChildAliHoldhead filtered by the sano column
 * @method     ChildAliHoldhead findOneBySadate(string $sadate) Return the first ChildAliHoldhead filtered by the sadate column
 * @method     ChildAliHoldhead findOneBySctime(string $sctime) Return the first ChildAliHoldhead filtered by the sctime column
 * @method     ChildAliHoldhead findOneBySaType(string $sa_type) Return the first ChildAliHoldhead filtered by the sa_type column
 * @method     ChildAliHoldhead findOneByInvCode(string $inv_code) Return the first ChildAliHoldhead filtered by the inv_code column
 * @method     ChildAliHoldhead findOneByInvCodeTo(string $inv_code_to) Return the first ChildAliHoldhead filtered by the inv_code_to column
 * @method     ChildAliHoldhead findOneByMcode(string $mcode) Return the first ChildAliHoldhead filtered by the mcode column
 * @method     ChildAliHoldhead findOneByTotal(string $total) Return the first ChildAliHoldhead filtered by the total column
 * @method     ChildAliHoldhead findOneByTotPv(string $tot_pv) Return the first ChildAliHoldhead filtered by the tot_pv column
 * @method     ChildAliHoldhead findOneByTotBv(string $tot_bv) Return the first ChildAliHoldhead filtered by the tot_bv column
 * @method     ChildAliHoldhead findOneByTotSppv(string $tot_sppv) Return the first ChildAliHoldhead filtered by the tot_sppv column
 * @method     ChildAliHoldhead findOneByTotFv(string $tot_fv) Return the first ChildAliHoldhead filtered by the tot_fv column
 * @method     ChildAliHoldhead findOneByTrnf(int $trnf) Return the first ChildAliHoldhead filtered by the trnf column
 * @method     ChildAliHoldhead findOneByCancel(string $cancel) Return the first ChildAliHoldhead filtered by the cancel column
 * @method     ChildAliHoldhead findOneByRemark(string $remark) Return the first ChildAliHoldhead filtered by the remark column
 * @method     ChildAliHoldhead findOneByUid(string $uid) Return the first ChildAliHoldhead filtered by the uid column
 * @method     ChildAliHoldhead findOneByDl(string $dl) Return the first ChildAliHoldhead filtered by the dl column
 * @method     ChildAliHoldhead findOneByPrint(int $print) Return the first ChildAliHoldhead filtered by the print column
 * @method     ChildAliHoldhead findOneByRcode(int $rcode) Return the first ChildAliHoldhead filtered by the rcode column
 * @method     ChildAliHoldhead findOneByStatus(int $status) Return the first ChildAliHoldhead filtered by the status column
 * @method     ChildAliHoldhead findOneByBmcauto(int $bmcauto) Return the first ChildAliHoldhead filtered by the bmcauto column
 * @method     ChildAliHoldhead findOneByCancelDate(string $cancel_date) Return the first ChildAliHoldhead filtered by the cancel_date column
 * @method     ChildAliHoldhead findOneByUidCancel(string $uid_cancel) Return the first ChildAliHoldhead filtered by the uid_cancel column
 * @method     ChildAliHoldhead findOneByMbase(string $mbase) Return the first ChildAliHoldhead filtered by the mbase column
 * @method     ChildAliHoldhead findOneByBprice(string $bprice) Return the first ChildAliHoldhead filtered by the bprice column
 * @method     ChildAliHoldhead findOneByLocationbase(int $locationbase) Return the first ChildAliHoldhead filtered by the locationbase column
 * @method     ChildAliHoldhead findOneByNameF(string $name_f) Return the first ChildAliHoldhead filtered by the name_f column
 * @method     ChildAliHoldhead findOneByNameT(string $name_t) Return the first ChildAliHoldhead filtered by the name_t column
 * @method     ChildAliHoldhead findOneByCrate(string $crate) Return the first ChildAliHoldhead filtered by the crate column
 * @method     ChildAliHoldhead findOneBySpCode(string $sp_code) Return the first ChildAliHoldhead filtered by the sp_code column
 * @method     ChildAliHoldhead findOneBySpPos(string $sp_pos) Return the first ChildAliHoldhead filtered by the sp_pos column
 * @method     ChildAliHoldhead findOneByRef(string $ref) Return the first ChildAliHoldhead filtered by the ref column
 * @method     ChildAliHoldhead findOneByStatusPackage(int $status_package) Return the first ChildAliHoldhead filtered by the status_package column *

 * @method     ChildAliHoldhead requirePk($key, ConnectionInterface $con = null) Return the ChildAliHoldhead by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOne(ConnectionInterface $con = null) Return the first ChildAliHoldhead matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliHoldhead requireOneById(int $id) Return the first ChildAliHoldhead filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByHono(int $hono) Return the first ChildAliHoldhead filtered by the hono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneBySano(int $sano) Return the first ChildAliHoldhead filtered by the sano column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneBySadate(string $sadate) Return the first ChildAliHoldhead filtered by the sadate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneBySctime(string $sctime) Return the first ChildAliHoldhead filtered by the sctime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneBySaType(string $sa_type) Return the first ChildAliHoldhead filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByInvCode(string $inv_code) Return the first ChildAliHoldhead filtered by the inv_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByInvCodeTo(string $inv_code_to) Return the first ChildAliHoldhead filtered by the inv_code_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByMcode(string $mcode) Return the first ChildAliHoldhead filtered by the mcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByTotal(string $total) Return the first ChildAliHoldhead filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByTotPv(string $tot_pv) Return the first ChildAliHoldhead filtered by the tot_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByTotBv(string $tot_bv) Return the first ChildAliHoldhead filtered by the tot_bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByTotSppv(string $tot_sppv) Return the first ChildAliHoldhead filtered by the tot_sppv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByTotFv(string $tot_fv) Return the first ChildAliHoldhead filtered by the tot_fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByTrnf(int $trnf) Return the first ChildAliHoldhead filtered by the trnf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByCancel(string $cancel) Return the first ChildAliHoldhead filtered by the cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByRemark(string $remark) Return the first ChildAliHoldhead filtered by the remark column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByUid(string $uid) Return the first ChildAliHoldhead filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByDl(string $dl) Return the first ChildAliHoldhead filtered by the dl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByPrint(int $print) Return the first ChildAliHoldhead filtered by the print column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByRcode(int $rcode) Return the first ChildAliHoldhead filtered by the rcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByStatus(int $status) Return the first ChildAliHoldhead filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByBmcauto(int $bmcauto) Return the first ChildAliHoldhead filtered by the bmcauto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByCancelDate(string $cancel_date) Return the first ChildAliHoldhead filtered by the cancel_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByUidCancel(string $uid_cancel) Return the first ChildAliHoldhead filtered by the uid_cancel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByMbase(string $mbase) Return the first ChildAliHoldhead filtered by the mbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByBprice(string $bprice) Return the first ChildAliHoldhead filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByLocationbase(int $locationbase) Return the first ChildAliHoldhead filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByNameF(string $name_f) Return the first ChildAliHoldhead filtered by the name_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByNameT(string $name_t) Return the first ChildAliHoldhead filtered by the name_t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByCrate(string $crate) Return the first ChildAliHoldhead filtered by the crate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneBySpCode(string $sp_code) Return the first ChildAliHoldhead filtered by the sp_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneBySpPos(string $sp_pos) Return the first ChildAliHoldhead filtered by the sp_pos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByRef(string $ref) Return the first ChildAliHoldhead filtered by the ref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliHoldhead requireOneByStatusPackage(int $status_package) Return the first ChildAliHoldhead filtered by the status_package column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliHoldhead[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliHoldhead objects based on current ModelCriteria
 * @method     ChildAliHoldhead[]|ObjectCollection findById(int $id) Return ChildAliHoldhead objects filtered by the id column
 * @method     ChildAliHoldhead[]|ObjectCollection findByHono(int $hono) Return ChildAliHoldhead objects filtered by the hono column
 * @method     ChildAliHoldhead[]|ObjectCollection findBySano(int $sano) Return ChildAliHoldhead objects filtered by the sano column
 * @method     ChildAliHoldhead[]|ObjectCollection findBySadate(string $sadate) Return ChildAliHoldhead objects filtered by the sadate column
 * @method     ChildAliHoldhead[]|ObjectCollection findBySctime(string $sctime) Return ChildAliHoldhead objects filtered by the sctime column
 * @method     ChildAliHoldhead[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliHoldhead objects filtered by the sa_type column
 * @method     ChildAliHoldhead[]|ObjectCollection findByInvCode(string $inv_code) Return ChildAliHoldhead objects filtered by the inv_code column
 * @method     ChildAliHoldhead[]|ObjectCollection findByInvCodeTo(string $inv_code_to) Return ChildAliHoldhead objects filtered by the inv_code_to column
 * @method     ChildAliHoldhead[]|ObjectCollection findByMcode(string $mcode) Return ChildAliHoldhead objects filtered by the mcode column
 * @method     ChildAliHoldhead[]|ObjectCollection findByTotal(string $total) Return ChildAliHoldhead objects filtered by the total column
 * @method     ChildAliHoldhead[]|ObjectCollection findByTotPv(string $tot_pv) Return ChildAliHoldhead objects filtered by the tot_pv column
 * @method     ChildAliHoldhead[]|ObjectCollection findByTotBv(string $tot_bv) Return ChildAliHoldhead objects filtered by the tot_bv column
 * @method     ChildAliHoldhead[]|ObjectCollection findByTotSppv(string $tot_sppv) Return ChildAliHoldhead objects filtered by the tot_sppv column
 * @method     ChildAliHoldhead[]|ObjectCollection findByTotFv(string $tot_fv) Return ChildAliHoldhead objects filtered by the tot_fv column
 * @method     ChildAliHoldhead[]|ObjectCollection findByTrnf(int $trnf) Return ChildAliHoldhead objects filtered by the trnf column
 * @method     ChildAliHoldhead[]|ObjectCollection findByCancel(string $cancel) Return ChildAliHoldhead objects filtered by the cancel column
 * @method     ChildAliHoldhead[]|ObjectCollection findByRemark(string $remark) Return ChildAliHoldhead objects filtered by the remark column
 * @method     ChildAliHoldhead[]|ObjectCollection findByUid(string $uid) Return ChildAliHoldhead objects filtered by the uid column
 * @method     ChildAliHoldhead[]|ObjectCollection findByDl(string $dl) Return ChildAliHoldhead objects filtered by the dl column
 * @method     ChildAliHoldhead[]|ObjectCollection findByPrint(int $print) Return ChildAliHoldhead objects filtered by the print column
 * @method     ChildAliHoldhead[]|ObjectCollection findByRcode(int $rcode) Return ChildAliHoldhead objects filtered by the rcode column
 * @method     ChildAliHoldhead[]|ObjectCollection findByStatus(int $status) Return ChildAliHoldhead objects filtered by the status column
 * @method     ChildAliHoldhead[]|ObjectCollection findByBmcauto(int $bmcauto) Return ChildAliHoldhead objects filtered by the bmcauto column
 * @method     ChildAliHoldhead[]|ObjectCollection findByCancelDate(string $cancel_date) Return ChildAliHoldhead objects filtered by the cancel_date column
 * @method     ChildAliHoldhead[]|ObjectCollection findByUidCancel(string $uid_cancel) Return ChildAliHoldhead objects filtered by the uid_cancel column
 * @method     ChildAliHoldhead[]|ObjectCollection findByMbase(string $mbase) Return ChildAliHoldhead objects filtered by the mbase column
 * @method     ChildAliHoldhead[]|ObjectCollection findByBprice(string $bprice) Return ChildAliHoldhead objects filtered by the bprice column
 * @method     ChildAliHoldhead[]|ObjectCollection findByLocationbase(int $locationbase) Return ChildAliHoldhead objects filtered by the locationbase column
 * @method     ChildAliHoldhead[]|ObjectCollection findByNameF(string $name_f) Return ChildAliHoldhead objects filtered by the name_f column
 * @method     ChildAliHoldhead[]|ObjectCollection findByNameT(string $name_t) Return ChildAliHoldhead objects filtered by the name_t column
 * @method     ChildAliHoldhead[]|ObjectCollection findByCrate(string $crate) Return ChildAliHoldhead objects filtered by the crate column
 * @method     ChildAliHoldhead[]|ObjectCollection findBySpCode(string $sp_code) Return ChildAliHoldhead objects filtered by the sp_code column
 * @method     ChildAliHoldhead[]|ObjectCollection findBySpPos(string $sp_pos) Return ChildAliHoldhead objects filtered by the sp_pos column
 * @method     ChildAliHoldhead[]|ObjectCollection findByRef(string $ref) Return ChildAliHoldhead objects filtered by the ref column
 * @method     ChildAliHoldhead[]|ObjectCollection findByStatusPackage(int $status_package) Return ChildAliHoldhead objects filtered by the status_package column
 * @method     ChildAliHoldhead[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliHoldheadQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliHoldheadQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliHoldhead', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliHoldheadQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliHoldheadQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliHoldheadQuery) {
            return $criteria;
        }
        $query = new ChildAliHoldheadQuery();
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
     * @return ChildAliHoldhead|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliHoldheadTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliHoldheadTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliHoldhead A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, hono, sano, sadate, sctime, sa_type, inv_code, inv_code_to, mcode, total, tot_pv, tot_bv, tot_sppv, tot_fv, trnf, cancel, remark, uid, dl, print, rcode, status, bmcauto, cancel_date, uid_cancel, mbase, bprice, locationbase, name_f, name_t, crate, sp_code, sp_pos, ref, status_package FROM ali_holdhead WHERE id = :p0';
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
            /** @var ChildAliHoldhead $obj */
            $obj = new ChildAliHoldhead();
            $obj->hydrate($row);
            AliHoldheadTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliHoldhead|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliHoldheadTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliHoldheadTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the hono column
     *
     * Example usage:
     * <code>
     * $query->filterByHono(1234); // WHERE hono = 1234
     * $query->filterByHono(array(12, 34)); // WHERE hono IN (12, 34)
     * $query->filterByHono(array('min' => 12)); // WHERE hono > 12
     * </code>
     *
     * @param     mixed $hono The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByHono($hono = null, $comparison = null)
    {
        if (is_array($hono)) {
            $useMinMax = false;
            if (isset($hono['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_HONO, $hono['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hono['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_HONO, $hono['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_HONO, $hono, $comparison);
    }

    /**
     * Filter the query on the sano column
     *
     * Example usage:
     * <code>
     * $query->filterBySano(1234); // WHERE sano = 1234
     * $query->filterBySano(array(12, 34)); // WHERE sano IN (12, 34)
     * $query->filterBySano(array('min' => 12)); // WHERE sano > 12
     * </code>
     *
     * @param     mixed $sano The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterBySano($sano = null, $comparison = null)
    {
        if (is_array($sano)) {
            $useMinMax = false;
            if (isset($sano['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_SANO, $sano['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sano['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_SANO, $sano['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_SANO, $sano, $comparison);
    }

    /**
     * Filter the query on the sadate column
     *
     * Example usage:
     * <code>
     * $query->filterBySadate('2011-03-14'); // WHERE sadate = '2011-03-14'
     * $query->filterBySadate('now'); // WHERE sadate = '2011-03-14'
     * $query->filterBySadate(array('max' => 'yesterday')); // WHERE sadate > '2011-03-13'
     * </code>
     *
     * @param     mixed $sadate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterBySadate($sadate = null, $comparison = null)
    {
        if (is_array($sadate)) {
            $useMinMax = false;
            if (isset($sadate['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_SADATE, $sadate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sadate['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_SADATE, $sadate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_SADATE, $sadate, $comparison);
    }

    /**
     * Filter the query on the sctime column
     *
     * Example usage:
     * <code>
     * $query->filterBySctime('2011-03-14'); // WHERE sctime = '2011-03-14'
     * $query->filterBySctime('now'); // WHERE sctime = '2011-03-14'
     * $query->filterBySctime(array('max' => 'yesterday')); // WHERE sctime > '2011-03-13'
     * </code>
     *
     * @param     mixed $sctime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterBySctime($sctime = null, $comparison = null)
    {
        if (is_array($sctime)) {
            $useMinMax = false;
            if (isset($sctime['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_SCTIME, $sctime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sctime['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_SCTIME, $sctime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_SCTIME, $sctime, $comparison);
    }

    /**
     * Filter the query on the sa_type column
     *
     * Example usage:
     * <code>
     * $query->filterBySaType('fooValue');   // WHERE sa_type = 'fooValue'
     * $query->filterBySaType('%fooValue%', Criteria::LIKE); // WHERE sa_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_SA_TYPE, $saType, $comparison);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByInvCode($invCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_INV_CODE, $invCode, $comparison);
    }

    /**
     * Filter the query on the inv_code_to column
     *
     * Example usage:
     * <code>
     * $query->filterByInvCodeTo('fooValue');   // WHERE inv_code_to = 'fooValue'
     * $query->filterByInvCodeTo('%fooValue%', Criteria::LIKE); // WHERE inv_code_to LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invCodeTo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByInvCodeTo($invCodeTo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invCodeTo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_INV_CODE_TO, $invCodeTo, $comparison);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByMcode($mcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_MCODE, $mcode, $comparison);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the tot_pv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotPv(1234); // WHERE tot_pv = 1234
     * $query->filterByTotPv(array(12, 34)); // WHERE tot_pv IN (12, 34)
     * $query->filterByTotPv(array('min' => 12)); // WHERE tot_pv > 12
     * </code>
     *
     * @param     mixed $totPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByTotPv($totPv = null, $comparison = null)
    {
        if (is_array($totPv)) {
            $useMinMax = false;
            if (isset($totPv['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_PV, $totPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totPv['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_PV, $totPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_PV, $totPv, $comparison);
    }

    /**
     * Filter the query on the tot_bv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotBv(1234); // WHERE tot_bv = 1234
     * $query->filterByTotBv(array(12, 34)); // WHERE tot_bv IN (12, 34)
     * $query->filterByTotBv(array('min' => 12)); // WHERE tot_bv > 12
     * </code>
     *
     * @param     mixed $totBv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByTotBv($totBv = null, $comparison = null)
    {
        if (is_array($totBv)) {
            $useMinMax = false;
            if (isset($totBv['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_BV, $totBv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totBv['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_BV, $totBv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_BV, $totBv, $comparison);
    }

    /**
     * Filter the query on the tot_sppv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotSppv(1234); // WHERE tot_sppv = 1234
     * $query->filterByTotSppv(array(12, 34)); // WHERE tot_sppv IN (12, 34)
     * $query->filterByTotSppv(array('min' => 12)); // WHERE tot_sppv > 12
     * </code>
     *
     * @param     mixed $totSppv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByTotSppv($totSppv = null, $comparison = null)
    {
        if (is_array($totSppv)) {
            $useMinMax = false;
            if (isset($totSppv['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_SPPV, $totSppv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totSppv['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_SPPV, $totSppv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_SPPV, $totSppv, $comparison);
    }

    /**
     * Filter the query on the tot_fv column
     *
     * Example usage:
     * <code>
     * $query->filterByTotFv(1234); // WHERE tot_fv = 1234
     * $query->filterByTotFv(array(12, 34)); // WHERE tot_fv IN (12, 34)
     * $query->filterByTotFv(array('min' => 12)); // WHERE tot_fv > 12
     * </code>
     *
     * @param     mixed $totFv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByTotFv($totFv = null, $comparison = null)
    {
        if (is_array($totFv)) {
            $useMinMax = false;
            if (isset($totFv['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_FV, $totFv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totFv['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_FV, $totFv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_TOT_FV, $totFv, $comparison);
    }

    /**
     * Filter the query on the trnf column
     *
     * Example usage:
     * <code>
     * $query->filterByTrnf(1234); // WHERE trnf = 1234
     * $query->filterByTrnf(array(12, 34)); // WHERE trnf IN (12, 34)
     * $query->filterByTrnf(array('min' => 12)); // WHERE trnf > 12
     * </code>
     *
     * @param     mixed $trnf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByTrnf($trnf = null, $comparison = null)
    {
        if (is_array($trnf)) {
            $useMinMax = false;
            if (isset($trnf['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TRNF, $trnf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trnf['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_TRNF, $trnf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_TRNF, $trnf, $comparison);
    }

    /**
     * Filter the query on the cancel column
     *
     * Example usage:
     * <code>
     * $query->filterByCancel('fooValue');   // WHERE cancel = 'fooValue'
     * $query->filterByCancel('%fooValue%', Criteria::LIKE); // WHERE cancel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cancel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByCancel($cancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_CANCEL, $cancel, $comparison);
    }

    /**
     * Filter the query on the remark column
     *
     * Example usage:
     * <code>
     * $query->filterByRemark('fooValue');   // WHERE remark = 'fooValue'
     * $query->filterByRemark('%fooValue%', Criteria::LIKE); // WHERE remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remark The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_REMARK, $remark, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%', Criteria::LIKE); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the dl column
     *
     * Example usage:
     * <code>
     * $query->filterByDl('fooValue');   // WHERE dl = 'fooValue'
     * $query->filterByDl('%fooValue%', Criteria::LIKE); // WHERE dl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByDl($dl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_DL, $dl, $comparison);
    }

    /**
     * Filter the query on the print column
     *
     * Example usage:
     * <code>
     * $query->filterByPrint(1234); // WHERE print = 1234
     * $query->filterByPrint(array(12, 34)); // WHERE print IN (12, 34)
     * $query->filterByPrint(array('min' => 12)); // WHERE print > 12
     * </code>
     *
     * @param     mixed $print The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByPrint($print = null, $comparison = null)
    {
        if (is_array($print)) {
            $useMinMax = false;
            if (isset($print['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_PRINT, $print['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($print['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_PRINT, $print['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_PRINT, $print, $comparison);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByRcode($rcode = null, $comparison = null)
    {
        if (is_array($rcode)) {
            $useMinMax = false;
            if (isset($rcode['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_RCODE, $rcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rcode['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_RCODE, $rcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_RCODE, $rcode, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the bmcauto column
     *
     * Example usage:
     * <code>
     * $query->filterByBmcauto(1234); // WHERE bmcauto = 1234
     * $query->filterByBmcauto(array(12, 34)); // WHERE bmcauto IN (12, 34)
     * $query->filterByBmcauto(array('min' => 12)); // WHERE bmcauto > 12
     * </code>
     *
     * @param     mixed $bmcauto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByBmcauto($bmcauto = null, $comparison = null)
    {
        if (is_array($bmcauto)) {
            $useMinMax = false;
            if (isset($bmcauto['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_BMCAUTO, $bmcauto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bmcauto['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_BMCAUTO, $bmcauto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_BMCAUTO, $bmcauto, $comparison);
    }

    /**
     * Filter the query on the cancel_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCancelDate('2011-03-14'); // WHERE cancel_date = '2011-03-14'
     * $query->filterByCancelDate('now'); // WHERE cancel_date = '2011-03-14'
     * $query->filterByCancelDate(array('max' => 'yesterday')); // WHERE cancel_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $cancelDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByCancelDate($cancelDate = null, $comparison = null)
    {
        if (is_array($cancelDate)) {
            $useMinMax = false;
            if (isset($cancelDate['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_CANCEL_DATE, $cancelDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cancelDate['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_CANCEL_DATE, $cancelDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_CANCEL_DATE, $cancelDate, $comparison);
    }

    /**
     * Filter the query on the uid_cancel column
     *
     * Example usage:
     * <code>
     * $query->filterByUidCancel('fooValue');   // WHERE uid_cancel = 'fooValue'
     * $query->filterByUidCancel('%fooValue%', Criteria::LIKE); // WHERE uid_cancel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uidCancel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByUidCancel($uidCancel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uidCancel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_UID_CANCEL, $uidCancel, $comparison);
    }

    /**
     * Filter the query on the mbase column
     *
     * Example usage:
     * <code>
     * $query->filterByMbase('fooValue');   // WHERE mbase = 'fooValue'
     * $query->filterByMbase('%fooValue%', Criteria::LIKE); // WHERE mbase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mbase The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByMbase($mbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_MBASE, $mbase, $comparison);
    }

    /**
     * Filter the query on the bprice column
     *
     * Example usage:
     * <code>
     * $query->filterByBprice(1234); // WHERE bprice = 1234
     * $query->filterByBprice(array(12, 34)); // WHERE bprice IN (12, 34)
     * $query->filterByBprice(array('min' => 12)); // WHERE bprice > 12
     * </code>
     *
     * @param     mixed $bprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_BPRICE, $bprice, $comparison);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (is_array($locationbase)) {
            $useMinMax = false;
            if (isset($locationbase['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_LOCATIONBASE, $locationbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationbase['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_LOCATIONBASE, $locationbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the name_f column
     *
     * Example usage:
     * <code>
     * $query->filterByNameF('fooValue');   // WHERE name_f = 'fooValue'
     * $query->filterByNameF('%fooValue%', Criteria::LIKE); // WHERE name_f LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameF The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByNameF($nameF = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameF)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_NAME_F, $nameF, $comparison);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByNameT($nameT = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameT)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_NAME_T, $nameT, $comparison);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByCrate($crate = null, $comparison = null)
    {
        if (is_array($crate)) {
            $useMinMax = false;
            if (isset($crate['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_CRATE, $crate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crate['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_CRATE, $crate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_CRATE, $crate, $comparison);
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
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterBySpCode($spCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_SP_CODE, $spCode, $comparison);
    }

    /**
     * Filter the query on the sp_pos column
     *
     * Example usage:
     * <code>
     * $query->filterBySpPos('fooValue');   // WHERE sp_pos = 'fooValue'
     * $query->filterBySpPos('%fooValue%', Criteria::LIKE); // WHERE sp_pos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spPos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterBySpPos($spPos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spPos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_SP_POS, $spPos, $comparison);
    }

    /**
     * Filter the query on the ref column
     *
     * Example usage:
     * <code>
     * $query->filterByRef('fooValue');   // WHERE ref = 'fooValue'
     * $query->filterByRef('%fooValue%', Criteria::LIKE); // WHERE ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ref The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByRef($ref = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ref)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_REF, $ref, $comparison);
    }

    /**
     * Filter the query on the status_package column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusPackage(1234); // WHERE status_package = 1234
     * $query->filterByStatusPackage(array(12, 34)); // WHERE status_package IN (12, 34)
     * $query->filterByStatusPackage(array('min' => 12)); // WHERE status_package > 12
     * </code>
     *
     * @param     mixed $statusPackage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function filterByStatusPackage($statusPackage = null, $comparison = null)
    {
        if (is_array($statusPackage)) {
            $useMinMax = false;
            if (isset($statusPackage['min'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_STATUS_PACKAGE, $statusPackage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusPackage['max'])) {
                $this->addUsingAlias(AliHoldheadTableMap::COL_STATUS_PACKAGE, $statusPackage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliHoldheadTableMap::COL_STATUS_PACKAGE, $statusPackage, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliHoldhead $aliHoldhead Object to remove from the list of results
     *
     * @return $this|ChildAliHoldheadQuery The current query, for fluid interface
     */
    public function prune($aliHoldhead = null)
    {
        if ($aliHoldhead) {
            $this->addUsingAlias(AliHoldheadTableMap::COL_ID, $aliHoldhead->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_holdhead table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliHoldheadTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliHoldheadTableMap::clearInstancePool();
            AliHoldheadTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliHoldheadTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliHoldheadTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliHoldheadTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliHoldheadTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliHoldheadQuery
