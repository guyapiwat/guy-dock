<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliProductPackage as ChildAliProductPackage;
use CciOrm\CciOrm\AliProductPackageQuery as ChildAliProductPackageQuery;
use CciOrm\CciOrm\Map\AliProductPackageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ali_product_package' table.
 *
 *
 *
 * @method     ChildAliProductPackageQuery orderByPcode($order = Criteria::ASC) Order by the pcode column
 * @method     ChildAliProductPackageQuery orderBySaType($order = Criteria::ASC) Order by the sa_type column
 * @method     ChildAliProductPackageQuery orderByPdesc($order = Criteria::ASC) Order by the pdesc column
 * @method     ChildAliProductPackageQuery orderByUnit($order = Criteria::ASC) Order by the unit column
 * @method     ChildAliProductPackageQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildAliProductPackageQuery orderByBprice($order = Criteria::ASC) Order by the bprice column
 * @method     ChildAliProductPackageQuery orderByCustomerPrice($order = Criteria::ASC) Order by the customer_price column
 * @method     ChildAliProductPackageQuery orderByPv($order = Criteria::ASC) Order by the pv column
 * @method     ChildAliProductPackageQuery orderBySpecialPv($order = Criteria::ASC) Order by the special_pv column
 * @method     ChildAliProductPackageQuery orderByBv($order = Criteria::ASC) Order by the bv column
 * @method     ChildAliProductPackageQuery orderByFv($order = Criteria::ASC) Order by the fv column
 * @method     ChildAliProductPackageQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildAliProductPackageQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildAliProductPackageQuery orderBySt($order = Criteria::ASC) Order by the st column
 * @method     ChildAliProductPackageQuery orderBySst($order = Criteria::ASC) Order by the sst column
 * @method     ChildAliProductPackageQuery orderByBf($order = Criteria::ASC) Order by the bf column
 * @method     ChildAliProductPackageQuery orderByAto($order = Criteria::ASC) Order by the ato column
 * @method     ChildAliProductPackageQuery orderByUd($order = Criteria::ASC) Order by the ud column
 * @method     ChildAliProductPackageQuery orderByLocationbase($order = Criteria::ASC) Order by the locationbase column
 * @method     ChildAliProductPackageQuery orderByBarcode($order = Criteria::ASC) Order by the barcode column
 * @method     ChildAliProductPackageQuery orderByPicture($order = Criteria::ASC) Order by the picture column
 * @method     ChildAliProductPackageQuery orderByFdate($order = Criteria::ASC) Order by the fdate column
 * @method     ChildAliProductPackageQuery orderByTdate($order = Criteria::ASC) Order by the tdate column
 * @method     ChildAliProductPackageQuery orderByPosMb($order = Criteria::ASC) Order by the pos_mb column
 * @method     ChildAliProductPackageQuery orderByPosSu($order = Criteria::ASC) Order by the pos_su column
 * @method     ChildAliProductPackageQuery orderByPosEx($order = Criteria::ASC) Order by the pos_ex column
 * @method     ChildAliProductPackageQuery orderByPosBr($order = Criteria::ASC) Order by the pos_br column
 * @method     ChildAliProductPackageQuery orderByPosSi($order = Criteria::ASC) Order by the pos_si column
 * @method     ChildAliProductPackageQuery orderByPosGo($order = Criteria::ASC) Order by the pos_go column
 * @method     ChildAliProductPackageQuery orderByPosPl($order = Criteria::ASC) Order by the pos_pl column
 * @method     ChildAliProductPackageQuery orderByPosPe($order = Criteria::ASC) Order by the pos_pe column
 * @method     ChildAliProductPackageQuery orderByPosRu($order = Criteria::ASC) Order by the pos_ru column
 * @method     ChildAliProductPackageQuery orderByPosSa($order = Criteria::ASC) Order by the pos_sa column
 * @method     ChildAliProductPackageQuery orderByPosEm($order = Criteria::ASC) Order by the pos_em column
 * @method     ChildAliProductPackageQuery orderByPosDi($order = Criteria::ASC) Order by the pos_di column
 * @method     ChildAliProductPackageQuery orderByPosBd($order = Criteria::ASC) Order by the pos_bd column
 * @method     ChildAliProductPackageQuery orderByPosBl($order = Criteria::ASC) Order by the pos_bl column
 * @method     ChildAliProductPackageQuery orderByPosCd($order = Criteria::ASC) Order by the pos_cd column
 * @method     ChildAliProductPackageQuery orderByPosId($order = Criteria::ASC) Order by the pos_id column
 * @method     ChildAliProductPackageQuery orderByPosPd($order = Criteria::ASC) Order by the pos_pd column
 * @method     ChildAliProductPackageQuery orderByPosRd($order = Criteria::ASC) Order by the pos_rd column
 * @method     ChildAliProductPackageQuery orderByVat($order = Criteria::ASC) Order by the vat column
 *
 * @method     ChildAliProductPackageQuery groupByPcode() Group by the pcode column
 * @method     ChildAliProductPackageQuery groupBySaType() Group by the sa_type column
 * @method     ChildAliProductPackageQuery groupByPdesc() Group by the pdesc column
 * @method     ChildAliProductPackageQuery groupByUnit() Group by the unit column
 * @method     ChildAliProductPackageQuery groupByPrice() Group by the price column
 * @method     ChildAliProductPackageQuery groupByBprice() Group by the bprice column
 * @method     ChildAliProductPackageQuery groupByCustomerPrice() Group by the customer_price column
 * @method     ChildAliProductPackageQuery groupByPv() Group by the pv column
 * @method     ChildAliProductPackageQuery groupBySpecialPv() Group by the special_pv column
 * @method     ChildAliProductPackageQuery groupByBv() Group by the bv column
 * @method     ChildAliProductPackageQuery groupByFv() Group by the fv column
 * @method     ChildAliProductPackageQuery groupByWeight() Group by the weight column
 * @method     ChildAliProductPackageQuery groupByQty() Group by the qty column
 * @method     ChildAliProductPackageQuery groupBySt() Group by the st column
 * @method     ChildAliProductPackageQuery groupBySst() Group by the sst column
 * @method     ChildAliProductPackageQuery groupByBf() Group by the bf column
 * @method     ChildAliProductPackageQuery groupByAto() Group by the ato column
 * @method     ChildAliProductPackageQuery groupByUd() Group by the ud column
 * @method     ChildAliProductPackageQuery groupByLocationbase() Group by the locationbase column
 * @method     ChildAliProductPackageQuery groupByBarcode() Group by the barcode column
 * @method     ChildAliProductPackageQuery groupByPicture() Group by the picture column
 * @method     ChildAliProductPackageQuery groupByFdate() Group by the fdate column
 * @method     ChildAliProductPackageQuery groupByTdate() Group by the tdate column
 * @method     ChildAliProductPackageQuery groupByPosMb() Group by the pos_mb column
 * @method     ChildAliProductPackageQuery groupByPosSu() Group by the pos_su column
 * @method     ChildAliProductPackageQuery groupByPosEx() Group by the pos_ex column
 * @method     ChildAliProductPackageQuery groupByPosBr() Group by the pos_br column
 * @method     ChildAliProductPackageQuery groupByPosSi() Group by the pos_si column
 * @method     ChildAliProductPackageQuery groupByPosGo() Group by the pos_go column
 * @method     ChildAliProductPackageQuery groupByPosPl() Group by the pos_pl column
 * @method     ChildAliProductPackageQuery groupByPosPe() Group by the pos_pe column
 * @method     ChildAliProductPackageQuery groupByPosRu() Group by the pos_ru column
 * @method     ChildAliProductPackageQuery groupByPosSa() Group by the pos_sa column
 * @method     ChildAliProductPackageQuery groupByPosEm() Group by the pos_em column
 * @method     ChildAliProductPackageQuery groupByPosDi() Group by the pos_di column
 * @method     ChildAliProductPackageQuery groupByPosBd() Group by the pos_bd column
 * @method     ChildAliProductPackageQuery groupByPosBl() Group by the pos_bl column
 * @method     ChildAliProductPackageQuery groupByPosCd() Group by the pos_cd column
 * @method     ChildAliProductPackageQuery groupByPosId() Group by the pos_id column
 * @method     ChildAliProductPackageQuery groupByPosPd() Group by the pos_pd column
 * @method     ChildAliProductPackageQuery groupByPosRd() Group by the pos_rd column
 * @method     ChildAliProductPackageQuery groupByVat() Group by the vat column
 *
 * @method     ChildAliProductPackageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAliProductPackageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAliProductPackageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAliProductPackageQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAliProductPackageQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAliProductPackageQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAliProductPackage findOne(ConnectionInterface $con = null) Return the first ChildAliProductPackage matching the query
 * @method     ChildAliProductPackage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAliProductPackage matching the query, or a new ChildAliProductPackage object populated from the query conditions when no match is found
 *
 * @method     ChildAliProductPackage findOneByPcode(string $pcode) Return the first ChildAliProductPackage filtered by the pcode column
 * @method     ChildAliProductPackage findOneBySaType(string $sa_type) Return the first ChildAliProductPackage filtered by the sa_type column
 * @method     ChildAliProductPackage findOneByPdesc(string $pdesc) Return the first ChildAliProductPackage filtered by the pdesc column
 * @method     ChildAliProductPackage findOneByUnit(string $unit) Return the first ChildAliProductPackage filtered by the unit column
 * @method     ChildAliProductPackage findOneByPrice(string $price) Return the first ChildAliProductPackage filtered by the price column
 * @method     ChildAliProductPackage findOneByBprice(string $bprice) Return the first ChildAliProductPackage filtered by the bprice column
 * @method     ChildAliProductPackage findOneByCustomerPrice(string $customer_price) Return the first ChildAliProductPackage filtered by the customer_price column
 * @method     ChildAliProductPackage findOneByPv(string $pv) Return the first ChildAliProductPackage filtered by the pv column
 * @method     ChildAliProductPackage findOneBySpecialPv(string $special_pv) Return the first ChildAliProductPackage filtered by the special_pv column
 * @method     ChildAliProductPackage findOneByBv(string $bv) Return the first ChildAliProductPackage filtered by the bv column
 * @method     ChildAliProductPackage findOneByFv(string $fv) Return the first ChildAliProductPackage filtered by the fv column
 * @method     ChildAliProductPackage findOneByWeight(string $weight) Return the first ChildAliProductPackage filtered by the weight column
 * @method     ChildAliProductPackage findOneByQty(string $qty) Return the first ChildAliProductPackage filtered by the qty column
 * @method     ChildAliProductPackage findOneBySt(int $st) Return the first ChildAliProductPackage filtered by the st column
 * @method     ChildAliProductPackage findOneBySst(int $sst) Return the first ChildAliProductPackage filtered by the sst column
 * @method     ChildAliProductPackage findOneByBf(int $bf) Return the first ChildAliProductPackage filtered by the bf column
 * @method     ChildAliProductPackage findOneByAto(int $ato) Return the first ChildAliProductPackage filtered by the ato column
 * @method     ChildAliProductPackage findOneByUd(string $ud) Return the first ChildAliProductPackage filtered by the ud column
 * @method     ChildAliProductPackage findOneByLocationbase(string $locationbase) Return the first ChildAliProductPackage filtered by the locationbase column
 * @method     ChildAliProductPackage findOneByBarcode(string $barcode) Return the first ChildAliProductPackage filtered by the barcode column
 * @method     ChildAliProductPackage findOneByPicture(string $picture) Return the first ChildAliProductPackage filtered by the picture column
 * @method     ChildAliProductPackage findOneByFdate(string $fdate) Return the first ChildAliProductPackage filtered by the fdate column
 * @method     ChildAliProductPackage findOneByTdate(string $tdate) Return the first ChildAliProductPackage filtered by the tdate column
 * @method     ChildAliProductPackage findOneByPosMb(int $pos_mb) Return the first ChildAliProductPackage filtered by the pos_mb column
 * @method     ChildAliProductPackage findOneByPosSu(int $pos_su) Return the first ChildAliProductPackage filtered by the pos_su column
 * @method     ChildAliProductPackage findOneByPosEx(int $pos_ex) Return the first ChildAliProductPackage filtered by the pos_ex column
 * @method     ChildAliProductPackage findOneByPosBr(int $pos_br) Return the first ChildAliProductPackage filtered by the pos_br column
 * @method     ChildAliProductPackage findOneByPosSi(int $pos_si) Return the first ChildAliProductPackage filtered by the pos_si column
 * @method     ChildAliProductPackage findOneByPosGo(int $pos_go) Return the first ChildAliProductPackage filtered by the pos_go column
 * @method     ChildAliProductPackage findOneByPosPl(int $pos_pl) Return the first ChildAliProductPackage filtered by the pos_pl column
 * @method     ChildAliProductPackage findOneByPosPe(int $pos_pe) Return the first ChildAliProductPackage filtered by the pos_pe column
 * @method     ChildAliProductPackage findOneByPosRu(int $pos_ru) Return the first ChildAliProductPackage filtered by the pos_ru column
 * @method     ChildAliProductPackage findOneByPosSa(int $pos_sa) Return the first ChildAliProductPackage filtered by the pos_sa column
 * @method     ChildAliProductPackage findOneByPosEm(int $pos_em) Return the first ChildAliProductPackage filtered by the pos_em column
 * @method     ChildAliProductPackage findOneByPosDi(int $pos_di) Return the first ChildAliProductPackage filtered by the pos_di column
 * @method     ChildAliProductPackage findOneByPosBd(int $pos_bd) Return the first ChildAliProductPackage filtered by the pos_bd column
 * @method     ChildAliProductPackage findOneByPosBl(int $pos_bl) Return the first ChildAliProductPackage filtered by the pos_bl column
 * @method     ChildAliProductPackage findOneByPosCd(int $pos_cd) Return the first ChildAliProductPackage filtered by the pos_cd column
 * @method     ChildAliProductPackage findOneByPosId(int $pos_id) Return the first ChildAliProductPackage filtered by the pos_id column
 * @method     ChildAliProductPackage findOneByPosPd(int $pos_pd) Return the first ChildAliProductPackage filtered by the pos_pd column
 * @method     ChildAliProductPackage findOneByPosRd(int $pos_rd) Return the first ChildAliProductPackage filtered by the pos_rd column
 * @method     ChildAliProductPackage findOneByVat(int $vat) Return the first ChildAliProductPackage filtered by the vat column *

 * @method     ChildAliProductPackage requirePk($key, ConnectionInterface $con = null) Return the ChildAliProductPackage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOne(ConnectionInterface $con = null) Return the first ChildAliProductPackage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductPackage requireOneByPcode(string $pcode) Return the first ChildAliProductPackage filtered by the pcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneBySaType(string $sa_type) Return the first ChildAliProductPackage filtered by the sa_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPdesc(string $pdesc) Return the first ChildAliProductPackage filtered by the pdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByUnit(string $unit) Return the first ChildAliProductPackage filtered by the unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPrice(string $price) Return the first ChildAliProductPackage filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByBprice(string $bprice) Return the first ChildAliProductPackage filtered by the bprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByCustomerPrice(string $customer_price) Return the first ChildAliProductPackage filtered by the customer_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPv(string $pv) Return the first ChildAliProductPackage filtered by the pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneBySpecialPv(string $special_pv) Return the first ChildAliProductPackage filtered by the special_pv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByBv(string $bv) Return the first ChildAliProductPackage filtered by the bv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByFv(string $fv) Return the first ChildAliProductPackage filtered by the fv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByWeight(string $weight) Return the first ChildAliProductPackage filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByQty(string $qty) Return the first ChildAliProductPackage filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneBySt(int $st) Return the first ChildAliProductPackage filtered by the st column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneBySst(int $sst) Return the first ChildAliProductPackage filtered by the sst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByBf(int $bf) Return the first ChildAliProductPackage filtered by the bf column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByAto(int $ato) Return the first ChildAliProductPackage filtered by the ato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByUd(string $ud) Return the first ChildAliProductPackage filtered by the ud column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByLocationbase(string $locationbase) Return the first ChildAliProductPackage filtered by the locationbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByBarcode(string $barcode) Return the first ChildAliProductPackage filtered by the barcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPicture(string $picture) Return the first ChildAliProductPackage filtered by the picture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByFdate(string $fdate) Return the first ChildAliProductPackage filtered by the fdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByTdate(string $tdate) Return the first ChildAliProductPackage filtered by the tdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosMb(int $pos_mb) Return the first ChildAliProductPackage filtered by the pos_mb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosSu(int $pos_su) Return the first ChildAliProductPackage filtered by the pos_su column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosEx(int $pos_ex) Return the first ChildAliProductPackage filtered by the pos_ex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosBr(int $pos_br) Return the first ChildAliProductPackage filtered by the pos_br column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosSi(int $pos_si) Return the first ChildAliProductPackage filtered by the pos_si column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosGo(int $pos_go) Return the first ChildAliProductPackage filtered by the pos_go column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosPl(int $pos_pl) Return the first ChildAliProductPackage filtered by the pos_pl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosPe(int $pos_pe) Return the first ChildAliProductPackage filtered by the pos_pe column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosRu(int $pos_ru) Return the first ChildAliProductPackage filtered by the pos_ru column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosSa(int $pos_sa) Return the first ChildAliProductPackage filtered by the pos_sa column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosEm(int $pos_em) Return the first ChildAliProductPackage filtered by the pos_em column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosDi(int $pos_di) Return the first ChildAliProductPackage filtered by the pos_di column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosBd(int $pos_bd) Return the first ChildAliProductPackage filtered by the pos_bd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosBl(int $pos_bl) Return the first ChildAliProductPackage filtered by the pos_bl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosCd(int $pos_cd) Return the first ChildAliProductPackage filtered by the pos_cd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosId(int $pos_id) Return the first ChildAliProductPackage filtered by the pos_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosPd(int $pos_pd) Return the first ChildAliProductPackage filtered by the pos_pd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByPosRd(int $pos_rd) Return the first ChildAliProductPackage filtered by the pos_rd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAliProductPackage requireOneByVat(int $vat) Return the first ChildAliProductPackage filtered by the vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAliProductPackage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAliProductPackage objects based on current ModelCriteria
 * @method     ChildAliProductPackage[]|ObjectCollection findByPcode(string $pcode) Return ChildAliProductPackage objects filtered by the pcode column
 * @method     ChildAliProductPackage[]|ObjectCollection findBySaType(string $sa_type) Return ChildAliProductPackage objects filtered by the sa_type column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPdesc(string $pdesc) Return ChildAliProductPackage objects filtered by the pdesc column
 * @method     ChildAliProductPackage[]|ObjectCollection findByUnit(string $unit) Return ChildAliProductPackage objects filtered by the unit column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPrice(string $price) Return ChildAliProductPackage objects filtered by the price column
 * @method     ChildAliProductPackage[]|ObjectCollection findByBprice(string $bprice) Return ChildAliProductPackage objects filtered by the bprice column
 * @method     ChildAliProductPackage[]|ObjectCollection findByCustomerPrice(string $customer_price) Return ChildAliProductPackage objects filtered by the customer_price column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPv(string $pv) Return ChildAliProductPackage objects filtered by the pv column
 * @method     ChildAliProductPackage[]|ObjectCollection findBySpecialPv(string $special_pv) Return ChildAliProductPackage objects filtered by the special_pv column
 * @method     ChildAliProductPackage[]|ObjectCollection findByBv(string $bv) Return ChildAliProductPackage objects filtered by the bv column
 * @method     ChildAliProductPackage[]|ObjectCollection findByFv(string $fv) Return ChildAliProductPackage objects filtered by the fv column
 * @method     ChildAliProductPackage[]|ObjectCollection findByWeight(string $weight) Return ChildAliProductPackage objects filtered by the weight column
 * @method     ChildAliProductPackage[]|ObjectCollection findByQty(string $qty) Return ChildAliProductPackage objects filtered by the qty column
 * @method     ChildAliProductPackage[]|ObjectCollection findBySt(int $st) Return ChildAliProductPackage objects filtered by the st column
 * @method     ChildAliProductPackage[]|ObjectCollection findBySst(int $sst) Return ChildAliProductPackage objects filtered by the sst column
 * @method     ChildAliProductPackage[]|ObjectCollection findByBf(int $bf) Return ChildAliProductPackage objects filtered by the bf column
 * @method     ChildAliProductPackage[]|ObjectCollection findByAto(int $ato) Return ChildAliProductPackage objects filtered by the ato column
 * @method     ChildAliProductPackage[]|ObjectCollection findByUd(string $ud) Return ChildAliProductPackage objects filtered by the ud column
 * @method     ChildAliProductPackage[]|ObjectCollection findByLocationbase(string $locationbase) Return ChildAliProductPackage objects filtered by the locationbase column
 * @method     ChildAliProductPackage[]|ObjectCollection findByBarcode(string $barcode) Return ChildAliProductPackage objects filtered by the barcode column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPicture(string $picture) Return ChildAliProductPackage objects filtered by the picture column
 * @method     ChildAliProductPackage[]|ObjectCollection findByFdate(string $fdate) Return ChildAliProductPackage objects filtered by the fdate column
 * @method     ChildAliProductPackage[]|ObjectCollection findByTdate(string $tdate) Return ChildAliProductPackage objects filtered by the tdate column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosMb(int $pos_mb) Return ChildAliProductPackage objects filtered by the pos_mb column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosSu(int $pos_su) Return ChildAliProductPackage objects filtered by the pos_su column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosEx(int $pos_ex) Return ChildAliProductPackage objects filtered by the pos_ex column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosBr(int $pos_br) Return ChildAliProductPackage objects filtered by the pos_br column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosSi(int $pos_si) Return ChildAliProductPackage objects filtered by the pos_si column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosGo(int $pos_go) Return ChildAliProductPackage objects filtered by the pos_go column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosPl(int $pos_pl) Return ChildAliProductPackage objects filtered by the pos_pl column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosPe(int $pos_pe) Return ChildAliProductPackage objects filtered by the pos_pe column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosRu(int $pos_ru) Return ChildAliProductPackage objects filtered by the pos_ru column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosSa(int $pos_sa) Return ChildAliProductPackage objects filtered by the pos_sa column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosEm(int $pos_em) Return ChildAliProductPackage objects filtered by the pos_em column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosDi(int $pos_di) Return ChildAliProductPackage objects filtered by the pos_di column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosBd(int $pos_bd) Return ChildAliProductPackage objects filtered by the pos_bd column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosBl(int $pos_bl) Return ChildAliProductPackage objects filtered by the pos_bl column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosCd(int $pos_cd) Return ChildAliProductPackage objects filtered by the pos_cd column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosId(int $pos_id) Return ChildAliProductPackage objects filtered by the pos_id column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosPd(int $pos_pd) Return ChildAliProductPackage objects filtered by the pos_pd column
 * @method     ChildAliProductPackage[]|ObjectCollection findByPosRd(int $pos_rd) Return ChildAliProductPackage objects filtered by the pos_rd column
 * @method     ChildAliProductPackage[]|ObjectCollection findByVat(int $vat) Return ChildAliProductPackage objects filtered by the vat column
 * @method     ChildAliProductPackage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AliProductPackageQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \CciOrm\CciOrm\Base\AliProductPackageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CciOrm\\CciOrm\\AliProductPackage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAliProductPackageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAliProductPackageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAliProductPackageQuery) {
            return $criteria;
        }
        $query = new ChildAliProductPackageQuery();
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
     * @return ChildAliProductPackage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliProductPackageTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AliProductPackageTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAliProductPackage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT pcode, sa_type, pdesc, unit, price, bprice, customer_price, pv, special_pv, bv, fv, weight, qty, st, sst, bf, ato, ud, locationbase, barcode, picture, fdate, tdate, pos_mb, pos_su, pos_ex, pos_br, pos_si, pos_go, pos_pl, pos_pe, pos_ru, pos_sa, pos_em, pos_di, pos_bd, pos_bl, pos_cd, pos_id, pos_pd, pos_rd, vat FROM ali_product_package WHERE pcode = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAliProductPackage $obj */
            $obj = new ChildAliProductPackage();
            $obj->hydrate($row);
            AliProductPackageTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAliProductPackage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AliProductPackageTableMap::COL_PCODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AliProductPackageTableMap::COL_PCODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pcode column
     *
     * Example usage:
     * <code>
     * $query->filterByPcode('fooValue');   // WHERE pcode = 'fooValue'
     * $query->filterByPcode('%fooValue%', Criteria::LIKE); // WHERE pcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPcode($pcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_PCODE, $pcode, $comparison);
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
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterBySaType($saType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_SA_TYPE, $saType, $comparison);
    }

    /**
     * Filter the query on the pdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByPdesc('fooValue');   // WHERE pdesc = 'fooValue'
     * $query->filterByPdesc('%fooValue%', Criteria::LIKE); // WHERE pdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPdesc($pdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_PDESC, $pdesc, $comparison);
    }

    /**
     * Filter the query on the unit column
     *
     * Example usage:
     * <code>
     * $query->filterByUnit('fooValue');   // WHERE unit = 'fooValue'
     * $query->filterByUnit('%fooValue%', Criteria::LIKE); // WHERE unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByUnit($unit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_UNIT, $unit, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByBprice($bprice = null, $comparison = null)
    {
        if (is_array($bprice)) {
            $useMinMax = false;
            if (isset($bprice['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_BPRICE, $bprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bprice['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_BPRICE, $bprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_BPRICE, $bprice, $comparison);
    }

    /**
     * Filter the query on the customer_price column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerPrice(1234); // WHERE customer_price = 1234
     * $query->filterByCustomerPrice(array(12, 34)); // WHERE customer_price IN (12, 34)
     * $query->filterByCustomerPrice(array('min' => 12)); // WHERE customer_price > 12
     * </code>
     *
     * @param     mixed $customerPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByCustomerPrice($customerPrice = null, $comparison = null)
    {
        if (is_array($customerPrice)) {
            $useMinMax = false;
            if (isset($customerPrice['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_CUSTOMER_PRICE, $customerPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerPrice['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_CUSTOMER_PRICE, $customerPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_CUSTOMER_PRICE, $customerPrice, $comparison);
    }

    /**
     * Filter the query on the pv column
     *
     * Example usage:
     * <code>
     * $query->filterByPv(1234); // WHERE pv = 1234
     * $query->filterByPv(array(12, 34)); // WHERE pv IN (12, 34)
     * $query->filterByPv(array('min' => 12)); // WHERE pv > 12
     * </code>
     *
     * @param     mixed $pv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPv($pv = null, $comparison = null)
    {
        if (is_array($pv)) {
            $useMinMax = false;
            if (isset($pv['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_PV, $pv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pv['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_PV, $pv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_PV, $pv, $comparison);
    }

    /**
     * Filter the query on the special_pv column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecialPv(1234); // WHERE special_pv = 1234
     * $query->filterBySpecialPv(array(12, 34)); // WHERE special_pv IN (12, 34)
     * $query->filterBySpecialPv(array('min' => 12)); // WHERE special_pv > 12
     * </code>
     *
     * @param     mixed $specialPv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterBySpecialPv($specialPv = null, $comparison = null)
    {
        if (is_array($specialPv)) {
            $useMinMax = false;
            if (isset($specialPv['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_SPECIAL_PV, $specialPv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialPv['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_SPECIAL_PV, $specialPv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_SPECIAL_PV, $specialPv, $comparison);
    }

    /**
     * Filter the query on the bv column
     *
     * Example usage:
     * <code>
     * $query->filterByBv(1234); // WHERE bv = 1234
     * $query->filterByBv(array(12, 34)); // WHERE bv IN (12, 34)
     * $query->filterByBv(array('min' => 12)); // WHERE bv > 12
     * </code>
     *
     * @param     mixed $bv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByBv($bv = null, $comparison = null)
    {
        if (is_array($bv)) {
            $useMinMax = false;
            if (isset($bv['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_BV, $bv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bv['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_BV, $bv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_BV, $bv, $comparison);
    }

    /**
     * Filter the query on the fv column
     *
     * Example usage:
     * <code>
     * $query->filterByFv(1234); // WHERE fv = 1234
     * $query->filterByFv(array(12, 34)); // WHERE fv IN (12, 34)
     * $query->filterByFv(array('min' => 12)); // WHERE fv > 12
     * </code>
     *
     * @param     mixed $fv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByFv($fv = null, $comparison = null)
    {
        if (is_array($fv)) {
            $useMinMax = false;
            if (isset($fv['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_FV, $fv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fv['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_FV, $fv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_FV, $fv, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight(1234); // WHERE weight = 1234
     * $query->filterByWeight(array(12, 34)); // WHERE weight IN (12, 34)
     * $query->filterByWeight(array('min' => 12)); // WHERE weight > 12
     * </code>
     *
     * @param     mixed $weight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (is_array($weight)) {
            $useMinMax = false;
            if (isset($weight['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_WEIGHT, $weight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weight['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_WEIGHT, $weight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_WEIGHT, $weight, $comparison);
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty(1234); // WHERE qty = 1234
     * $query->filterByQty(array(12, 34)); // WHERE qty IN (12, 34)
     * $query->filterByQty(array('min' => 12)); // WHERE qty > 12
     * </code>
     *
     * @param     mixed $qty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByQty($qty = null, $comparison = null)
    {
        if (is_array($qty)) {
            $useMinMax = false;
            if (isset($qty['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_QTY, $qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qty['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_QTY, $qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_QTY, $qty, $comparison);
    }

    /**
     * Filter the query on the st column
     *
     * Example usage:
     * <code>
     * $query->filterBySt(1234); // WHERE st = 1234
     * $query->filterBySt(array(12, 34)); // WHERE st IN (12, 34)
     * $query->filterBySt(array('min' => 12)); // WHERE st > 12
     * </code>
     *
     * @param     mixed $st The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterBySt($st = null, $comparison = null)
    {
        if (is_array($st)) {
            $useMinMax = false;
            if (isset($st['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_ST, $st['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($st['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_ST, $st['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_ST, $st, $comparison);
    }

    /**
     * Filter the query on the sst column
     *
     * Example usage:
     * <code>
     * $query->filterBySst(1234); // WHERE sst = 1234
     * $query->filterBySst(array(12, 34)); // WHERE sst IN (12, 34)
     * $query->filterBySst(array('min' => 12)); // WHERE sst > 12
     * </code>
     *
     * @param     mixed $sst The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterBySst($sst = null, $comparison = null)
    {
        if (is_array($sst)) {
            $useMinMax = false;
            if (isset($sst['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_SST, $sst['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sst['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_SST, $sst['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_SST, $sst, $comparison);
    }

    /**
     * Filter the query on the bf column
     *
     * Example usage:
     * <code>
     * $query->filterByBf(1234); // WHERE bf = 1234
     * $query->filterByBf(array(12, 34)); // WHERE bf IN (12, 34)
     * $query->filterByBf(array('min' => 12)); // WHERE bf > 12
     * </code>
     *
     * @param     mixed $bf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByBf($bf = null, $comparison = null)
    {
        if (is_array($bf)) {
            $useMinMax = false;
            if (isset($bf['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_BF, $bf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bf['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_BF, $bf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_BF, $bf, $comparison);
    }

    /**
     * Filter the query on the ato column
     *
     * Example usage:
     * <code>
     * $query->filterByAto(1234); // WHERE ato = 1234
     * $query->filterByAto(array(12, 34)); // WHERE ato IN (12, 34)
     * $query->filterByAto(array('min' => 12)); // WHERE ato > 12
     * </code>
     *
     * @param     mixed $ato The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByAto($ato = null, $comparison = null)
    {
        if (is_array($ato)) {
            $useMinMax = false;
            if (isset($ato['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_ATO, $ato['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ato['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_ATO, $ato['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_ATO, $ato, $comparison);
    }

    /**
     * Filter the query on the ud column
     *
     * Example usage:
     * <code>
     * $query->filterByUd('fooValue');   // WHERE ud = 'fooValue'
     * $query->filterByUd('%fooValue%', Criteria::LIKE); // WHERE ud LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ud The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByUd($ud = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ud)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_UD, $ud, $comparison);
    }

    /**
     * Filter the query on the locationbase column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationbase('fooValue');   // WHERE locationbase = 'fooValue'
     * $query->filterByLocationbase('%fooValue%', Criteria::LIKE); // WHERE locationbase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $locationbase The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByLocationbase($locationbase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($locationbase)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_LOCATIONBASE, $locationbase, $comparison);
    }

    /**
     * Filter the query on the barcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBarcode('fooValue');   // WHERE barcode = 'fooValue'
     * $query->filterByBarcode('%fooValue%', Criteria::LIKE); // WHERE barcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $barcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByBarcode($barcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_BARCODE, $barcode, $comparison);
    }

    /**
     * Filter the query on the picture column
     *
     * Example usage:
     * <code>
     * $query->filterByPicture('fooValue');   // WHERE picture = 'fooValue'
     * $query->filterByPicture('%fooValue%', Criteria::LIKE); // WHERE picture LIKE '%fooValue%'
     * </code>
     *
     * @param     string $picture The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPicture($picture = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($picture)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_PICTURE, $picture, $comparison);
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
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByFdate($fdate = null, $comparison = null)
    {
        if (is_array($fdate)) {
            $useMinMax = false;
            if (isset($fdate['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_FDATE, $fdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdate['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_FDATE, $fdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_FDATE, $fdate, $comparison);
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
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByTdate($tdate = null, $comparison = null)
    {
        if (is_array($tdate)) {
            $useMinMax = false;
            if (isset($tdate['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_TDATE, $tdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdate['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_TDATE, $tdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_TDATE, $tdate, $comparison);
    }

    /**
     * Filter the query on the pos_mb column
     *
     * Example usage:
     * <code>
     * $query->filterByPosMb(1234); // WHERE pos_mb = 1234
     * $query->filterByPosMb(array(12, 34)); // WHERE pos_mb IN (12, 34)
     * $query->filterByPosMb(array('min' => 12)); // WHERE pos_mb > 12
     * </code>
     *
     * @param     mixed $posMb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosMb($posMb = null, $comparison = null)
    {
        if (is_array($posMb)) {
            $useMinMax = false;
            if (isset($posMb['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_MB, $posMb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posMb['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_MB, $posMb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_MB, $posMb, $comparison);
    }

    /**
     * Filter the query on the pos_su column
     *
     * Example usage:
     * <code>
     * $query->filterByPosSu(1234); // WHERE pos_su = 1234
     * $query->filterByPosSu(array(12, 34)); // WHERE pos_su IN (12, 34)
     * $query->filterByPosSu(array('min' => 12)); // WHERE pos_su > 12
     * </code>
     *
     * @param     mixed $posSu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosSu($posSu = null, $comparison = null)
    {
        if (is_array($posSu)) {
            $useMinMax = false;
            if (isset($posSu['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SU, $posSu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posSu['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SU, $posSu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SU, $posSu, $comparison);
    }

    /**
     * Filter the query on the pos_ex column
     *
     * Example usage:
     * <code>
     * $query->filterByPosEx(1234); // WHERE pos_ex = 1234
     * $query->filterByPosEx(array(12, 34)); // WHERE pos_ex IN (12, 34)
     * $query->filterByPosEx(array('min' => 12)); // WHERE pos_ex > 12
     * </code>
     *
     * @param     mixed $posEx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosEx($posEx = null, $comparison = null)
    {
        if (is_array($posEx)) {
            $useMinMax = false;
            if (isset($posEx['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_EX, $posEx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posEx['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_EX, $posEx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_EX, $posEx, $comparison);
    }

    /**
     * Filter the query on the pos_br column
     *
     * Example usage:
     * <code>
     * $query->filterByPosBr(1234); // WHERE pos_br = 1234
     * $query->filterByPosBr(array(12, 34)); // WHERE pos_br IN (12, 34)
     * $query->filterByPosBr(array('min' => 12)); // WHERE pos_br > 12
     * </code>
     *
     * @param     mixed $posBr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosBr($posBr = null, $comparison = null)
    {
        if (is_array($posBr)) {
            $useMinMax = false;
            if (isset($posBr['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BR, $posBr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posBr['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BR, $posBr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BR, $posBr, $comparison);
    }

    /**
     * Filter the query on the pos_si column
     *
     * Example usage:
     * <code>
     * $query->filterByPosSi(1234); // WHERE pos_si = 1234
     * $query->filterByPosSi(array(12, 34)); // WHERE pos_si IN (12, 34)
     * $query->filterByPosSi(array('min' => 12)); // WHERE pos_si > 12
     * </code>
     *
     * @param     mixed $posSi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosSi($posSi = null, $comparison = null)
    {
        if (is_array($posSi)) {
            $useMinMax = false;
            if (isset($posSi['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SI, $posSi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posSi['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SI, $posSi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SI, $posSi, $comparison);
    }

    /**
     * Filter the query on the pos_go column
     *
     * Example usage:
     * <code>
     * $query->filterByPosGo(1234); // WHERE pos_go = 1234
     * $query->filterByPosGo(array(12, 34)); // WHERE pos_go IN (12, 34)
     * $query->filterByPosGo(array('min' => 12)); // WHERE pos_go > 12
     * </code>
     *
     * @param     mixed $posGo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosGo($posGo = null, $comparison = null)
    {
        if (is_array($posGo)) {
            $useMinMax = false;
            if (isset($posGo['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_GO, $posGo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posGo['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_GO, $posGo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_GO, $posGo, $comparison);
    }

    /**
     * Filter the query on the pos_pl column
     *
     * Example usage:
     * <code>
     * $query->filterByPosPl(1234); // WHERE pos_pl = 1234
     * $query->filterByPosPl(array(12, 34)); // WHERE pos_pl IN (12, 34)
     * $query->filterByPosPl(array('min' => 12)); // WHERE pos_pl > 12
     * </code>
     *
     * @param     mixed $posPl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosPl($posPl = null, $comparison = null)
    {
        if (is_array($posPl)) {
            $useMinMax = false;
            if (isset($posPl['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PL, $posPl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posPl['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PL, $posPl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PL, $posPl, $comparison);
    }

    /**
     * Filter the query on the pos_pe column
     *
     * Example usage:
     * <code>
     * $query->filterByPosPe(1234); // WHERE pos_pe = 1234
     * $query->filterByPosPe(array(12, 34)); // WHERE pos_pe IN (12, 34)
     * $query->filterByPosPe(array('min' => 12)); // WHERE pos_pe > 12
     * </code>
     *
     * @param     mixed $posPe The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosPe($posPe = null, $comparison = null)
    {
        if (is_array($posPe)) {
            $useMinMax = false;
            if (isset($posPe['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PE, $posPe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posPe['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PE, $posPe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PE, $posPe, $comparison);
    }

    /**
     * Filter the query on the pos_ru column
     *
     * Example usage:
     * <code>
     * $query->filterByPosRu(1234); // WHERE pos_ru = 1234
     * $query->filterByPosRu(array(12, 34)); // WHERE pos_ru IN (12, 34)
     * $query->filterByPosRu(array('min' => 12)); // WHERE pos_ru > 12
     * </code>
     *
     * @param     mixed $posRu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosRu($posRu = null, $comparison = null)
    {
        if (is_array($posRu)) {
            $useMinMax = false;
            if (isset($posRu['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_RU, $posRu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posRu['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_RU, $posRu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_RU, $posRu, $comparison);
    }

    /**
     * Filter the query on the pos_sa column
     *
     * Example usage:
     * <code>
     * $query->filterByPosSa(1234); // WHERE pos_sa = 1234
     * $query->filterByPosSa(array(12, 34)); // WHERE pos_sa IN (12, 34)
     * $query->filterByPosSa(array('min' => 12)); // WHERE pos_sa > 12
     * </code>
     *
     * @param     mixed $posSa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosSa($posSa = null, $comparison = null)
    {
        if (is_array($posSa)) {
            $useMinMax = false;
            if (isset($posSa['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SA, $posSa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posSa['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SA, $posSa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_SA, $posSa, $comparison);
    }

    /**
     * Filter the query on the pos_em column
     *
     * Example usage:
     * <code>
     * $query->filterByPosEm(1234); // WHERE pos_em = 1234
     * $query->filterByPosEm(array(12, 34)); // WHERE pos_em IN (12, 34)
     * $query->filterByPosEm(array('min' => 12)); // WHERE pos_em > 12
     * </code>
     *
     * @param     mixed $posEm The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosEm($posEm = null, $comparison = null)
    {
        if (is_array($posEm)) {
            $useMinMax = false;
            if (isset($posEm['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_EM, $posEm['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posEm['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_EM, $posEm['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_EM, $posEm, $comparison);
    }

    /**
     * Filter the query on the pos_di column
     *
     * Example usage:
     * <code>
     * $query->filterByPosDi(1234); // WHERE pos_di = 1234
     * $query->filterByPosDi(array(12, 34)); // WHERE pos_di IN (12, 34)
     * $query->filterByPosDi(array('min' => 12)); // WHERE pos_di > 12
     * </code>
     *
     * @param     mixed $posDi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosDi($posDi = null, $comparison = null)
    {
        if (is_array($posDi)) {
            $useMinMax = false;
            if (isset($posDi['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_DI, $posDi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posDi['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_DI, $posDi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_DI, $posDi, $comparison);
    }

    /**
     * Filter the query on the pos_bd column
     *
     * Example usage:
     * <code>
     * $query->filterByPosBd(1234); // WHERE pos_bd = 1234
     * $query->filterByPosBd(array(12, 34)); // WHERE pos_bd IN (12, 34)
     * $query->filterByPosBd(array('min' => 12)); // WHERE pos_bd > 12
     * </code>
     *
     * @param     mixed $posBd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosBd($posBd = null, $comparison = null)
    {
        if (is_array($posBd)) {
            $useMinMax = false;
            if (isset($posBd['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BD, $posBd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posBd['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BD, $posBd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BD, $posBd, $comparison);
    }

    /**
     * Filter the query on the pos_bl column
     *
     * Example usage:
     * <code>
     * $query->filterByPosBl(1234); // WHERE pos_bl = 1234
     * $query->filterByPosBl(array(12, 34)); // WHERE pos_bl IN (12, 34)
     * $query->filterByPosBl(array('min' => 12)); // WHERE pos_bl > 12
     * </code>
     *
     * @param     mixed $posBl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosBl($posBl = null, $comparison = null)
    {
        if (is_array($posBl)) {
            $useMinMax = false;
            if (isset($posBl['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BL, $posBl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posBl['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BL, $posBl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_BL, $posBl, $comparison);
    }

    /**
     * Filter the query on the pos_cd column
     *
     * Example usage:
     * <code>
     * $query->filterByPosCd(1234); // WHERE pos_cd = 1234
     * $query->filterByPosCd(array(12, 34)); // WHERE pos_cd IN (12, 34)
     * $query->filterByPosCd(array('min' => 12)); // WHERE pos_cd > 12
     * </code>
     *
     * @param     mixed $posCd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosCd($posCd = null, $comparison = null)
    {
        if (is_array($posCd)) {
            $useMinMax = false;
            if (isset($posCd['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_CD, $posCd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posCd['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_CD, $posCd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_CD, $posCd, $comparison);
    }

    /**
     * Filter the query on the pos_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPosId(1234); // WHERE pos_id = 1234
     * $query->filterByPosId(array(12, 34)); // WHERE pos_id IN (12, 34)
     * $query->filterByPosId(array('min' => 12)); // WHERE pos_id > 12
     * </code>
     *
     * @param     mixed $posId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosId($posId = null, $comparison = null)
    {
        if (is_array($posId)) {
            $useMinMax = false;
            if (isset($posId['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_ID, $posId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posId['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_ID, $posId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_ID, $posId, $comparison);
    }

    /**
     * Filter the query on the pos_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByPosPd(1234); // WHERE pos_pd = 1234
     * $query->filterByPosPd(array(12, 34)); // WHERE pos_pd IN (12, 34)
     * $query->filterByPosPd(array('min' => 12)); // WHERE pos_pd > 12
     * </code>
     *
     * @param     mixed $posPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosPd($posPd = null, $comparison = null)
    {
        if (is_array($posPd)) {
            $useMinMax = false;
            if (isset($posPd['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PD, $posPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posPd['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PD, $posPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_PD, $posPd, $comparison);
    }

    /**
     * Filter the query on the pos_rd column
     *
     * Example usage:
     * <code>
     * $query->filterByPosRd(1234); // WHERE pos_rd = 1234
     * $query->filterByPosRd(array(12, 34)); // WHERE pos_rd IN (12, 34)
     * $query->filterByPosRd(array('min' => 12)); // WHERE pos_rd > 12
     * </code>
     *
     * @param     mixed $posRd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByPosRd($posRd = null, $comparison = null)
    {
        if (is_array($posRd)) {
            $useMinMax = false;
            if (isset($posRd['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_RD, $posRd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posRd['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_POS_RD, $posRd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_POS_RD, $posRd, $comparison);
    }

    /**
     * Filter the query on the vat column
     *
     * Example usage:
     * <code>
     * $query->filterByVat(1234); // WHERE vat = 1234
     * $query->filterByVat(array(12, 34)); // WHERE vat IN (12, 34)
     * $query->filterByVat(array('min' => 12)); // WHERE vat > 12
     * </code>
     *
     * @param     mixed $vat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function filterByVat($vat = null, $comparison = null)
    {
        if (is_array($vat)) {
            $useMinMax = false;
            if (isset($vat['min'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_VAT, $vat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vat['max'])) {
                $this->addUsingAlias(AliProductPackageTableMap::COL_VAT, $vat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AliProductPackageTableMap::COL_VAT, $vat, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAliProductPackage $aliProductPackage Object to remove from the list of results
     *
     * @return $this|ChildAliProductPackageQuery The current query, for fluid interface
     */
    public function prune($aliProductPackage = null)
    {
        if ($aliProductPackage) {
            $this->addUsingAlias(AliProductPackageTableMap::COL_PCODE, $aliProductPackage->getPcode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ali_product_package table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductPackageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AliProductPackageTableMap::clearInstancePool();
            AliProductPackageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductPackageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AliProductPackageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AliProductPackageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AliProductPackageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AliProductPackageQuery
