<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliProductPackageQuery as ChildAliProductPackageQuery;
use CciOrm\CciOrm\Map\AliProductPackageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'ali_product_package' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliProductPackage implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliProductPackageTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the pcode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pcode;

    /**
     * The value for the sa_type field.
     *
     * @var        string
     */
    protected $sa_type;

    /**
     * The value for the pdesc field.
     *
     * @var        string
     */
    protected $pdesc;

    /**
     * The value for the unit field.
     *
     * @var        string
     */
    protected $unit;

    /**
     * The value for the price field.
     *
     * @var        string
     */
    protected $price;

    /**
     * The value for the bprice field.
     *
     * @var        string
     */
    protected $bprice;

    /**
     * The value for the customer_price field.
     *
     * @var        string
     */
    protected $customer_price;

    /**
     * The value for the pv field.
     *
     * @var        string
     */
    protected $pv;

    /**
     * The value for the special_pv field.
     *
     * @var        string
     */
    protected $special_pv;

    /**
     * The value for the bv field.
     *
     * @var        string
     */
    protected $bv;

    /**
     * The value for the fv field.
     *
     * @var        string
     */
    protected $fv;

    /**
     * The value for the weight field.
     *
     * @var        string
     */
    protected $weight;

    /**
     * The value for the qty field.
     *
     * @var        string
     */
    protected $qty;

    /**
     * The value for the st field.
     *
     * @var        int
     */
    protected $st;

    /**
     * The value for the sst field.
     *
     * @var        int
     */
    protected $sst;

    /**
     * The value for the bf field.
     *
     * @var        int
     */
    protected $bf;

    /**
     * The value for the ato field.
     *
     * @var        int
     */
    protected $ato;

    /**
     * The value for the ud field.
     *
     * @var        string
     */
    protected $ud;

    /**
     * The value for the locationbase field.
     *
     * @var        string
     */
    protected $locationbase;

    /**
     * The value for the barcode field.
     *
     * @var        string
     */
    protected $barcode;

    /**
     * The value for the picture field.
     *
     * @var        string
     */
    protected $picture;

    /**
     * The value for the fdate field.
     *
     * @var        DateTime
     */
    protected $fdate;

    /**
     * The value for the tdate field.
     *
     * @var        DateTime
     */
    protected $tdate;

    /**
     * The value for the pos_mb field.
     *
     * @var        int
     */
    protected $pos_mb;

    /**
     * The value for the pos_su field.
     *
     * @var        int
     */
    protected $pos_su;

    /**
     * The value for the pos_ex field.
     *
     * @var        int
     */
    protected $pos_ex;

    /**
     * The value for the pos_br field.
     *
     * @var        int
     */
    protected $pos_br;

    /**
     * The value for the pos_si field.
     *
     * @var        int
     */
    protected $pos_si;

    /**
     * The value for the pos_go field.
     *
     * @var        int
     */
    protected $pos_go;

    /**
     * The value for the pos_pl field.
     *
     * @var        int
     */
    protected $pos_pl;

    /**
     * The value for the pos_pe field.
     *
     * @var        int
     */
    protected $pos_pe;

    /**
     * The value for the pos_ru field.
     *
     * @var        int
     */
    protected $pos_ru;

    /**
     * The value for the pos_sa field.
     *
     * @var        int
     */
    protected $pos_sa;

    /**
     * The value for the pos_em field.
     *
     * @var        int
     */
    protected $pos_em;

    /**
     * The value for the pos_di field.
     *
     * @var        int
     */
    protected $pos_di;

    /**
     * The value for the pos_bd field.
     *
     * @var        int
     */
    protected $pos_bd;

    /**
     * The value for the pos_bl field.
     *
     * @var        int
     */
    protected $pos_bl;

    /**
     * The value for the pos_cd field.
     *
     * @var        int
     */
    protected $pos_cd;

    /**
     * The value for the pos_id field.
     *
     * @var        int
     */
    protected $pos_id;

    /**
     * The value for the pos_pd field.
     *
     * @var        int
     */
    protected $pos_pd;

    /**
     * The value for the pos_rd field.
     *
     * @var        int
     */
    protected $pos_rd;

    /**
     * The value for the vat field.
     *
     * @var        int
     */
    protected $vat;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->pcode = '';
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliProductPackage object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>AliProductPackage</code> instance.  If
     * <code>obj</code> is an instance of <code>AliProductPackage</code>, delegates to
     * <code>equals(AliProductPackage)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|AliProductPackage The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [pcode] column value.
     *
     * @return string
     */
    public function getPcode()
    {
        return $this->pcode;
    }

    /**
     * Get the [sa_type] column value.
     *
     * @return string
     */
    public function getSaType()
    {
        return $this->sa_type;
    }

    /**
     * Get the [pdesc] column value.
     *
     * @return string
     */
    public function getPdesc()
    {
        return $this->pdesc;
    }

    /**
     * Get the [unit] column value.
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Get the [price] column value.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [bprice] column value.
     *
     * @return string
     */
    public function getBprice()
    {
        return $this->bprice;
    }

    /**
     * Get the [customer_price] column value.
     *
     * @return string
     */
    public function getCustomerPrice()
    {
        return $this->customer_price;
    }

    /**
     * Get the [pv] column value.
     *
     * @return string
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Get the [special_pv] column value.
     *
     * @return string
     */
    public function getSpecialPv()
    {
        return $this->special_pv;
    }

    /**
     * Get the [bv] column value.
     *
     * @return string
     */
    public function getBv()
    {
        return $this->bv;
    }

    /**
     * Get the [fv] column value.
     *
     * @return string
     */
    public function getFv()
    {
        return $this->fv;
    }

    /**
     * Get the [weight] column value.
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get the [qty] column value.
     *
     * @return string
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Get the [st] column value.
     *
     * @return int
     */
    public function getSt()
    {
        return $this->st;
    }

    /**
     * Get the [sst] column value.
     *
     * @return int
     */
    public function getSst()
    {
        return $this->sst;
    }

    /**
     * Get the [bf] column value.
     *
     * @return int
     */
    public function getBf()
    {
        return $this->bf;
    }

    /**
     * Get the [ato] column value.
     *
     * @return int
     */
    public function getAto()
    {
        return $this->ato;
    }

    /**
     * Get the [ud] column value.
     *
     * @return string
     */
    public function getUd()
    {
        return $this->ud;
    }

    /**
     * Get the [locationbase] column value.
     *
     * @return string
     */
    public function getLocationbase()
    {
        return $this->locationbase;
    }

    /**
     * Get the [barcode] column value.
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Get the [picture] column value.
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get the [optionally formatted] temporal [fdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFdate($format = NULL)
    {
        if ($format === null) {
            return $this->fdate;
        } else {
            return $this->fdate instanceof \DateTimeInterface ? $this->fdate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [tdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTdate($format = NULL)
    {
        if ($format === null) {
            return $this->tdate;
        } else {
            return $this->tdate instanceof \DateTimeInterface ? $this->tdate->format($format) : null;
        }
    }

    /**
     * Get the [pos_mb] column value.
     *
     * @return int
     */
    public function getPosMb()
    {
        return $this->pos_mb;
    }

    /**
     * Get the [pos_su] column value.
     *
     * @return int
     */
    public function getPosSu()
    {
        return $this->pos_su;
    }

    /**
     * Get the [pos_ex] column value.
     *
     * @return int
     */
    public function getPosEx()
    {
        return $this->pos_ex;
    }

    /**
     * Get the [pos_br] column value.
     *
     * @return int
     */
    public function getPosBr()
    {
        return $this->pos_br;
    }

    /**
     * Get the [pos_si] column value.
     *
     * @return int
     */
    public function getPosSi()
    {
        return $this->pos_si;
    }

    /**
     * Get the [pos_go] column value.
     *
     * @return int
     */
    public function getPosGo()
    {
        return $this->pos_go;
    }

    /**
     * Get the [pos_pl] column value.
     *
     * @return int
     */
    public function getPosPl()
    {
        return $this->pos_pl;
    }

    /**
     * Get the [pos_pe] column value.
     *
     * @return int
     */
    public function getPosPe()
    {
        return $this->pos_pe;
    }

    /**
     * Get the [pos_ru] column value.
     *
     * @return int
     */
    public function getPosRu()
    {
        return $this->pos_ru;
    }

    /**
     * Get the [pos_sa] column value.
     *
     * @return int
     */
    public function getPosSa()
    {
        return $this->pos_sa;
    }

    /**
     * Get the [pos_em] column value.
     *
     * @return int
     */
    public function getPosEm()
    {
        return $this->pos_em;
    }

    /**
     * Get the [pos_di] column value.
     *
     * @return int
     */
    public function getPosDi()
    {
        return $this->pos_di;
    }

    /**
     * Get the [pos_bd] column value.
     *
     * @return int
     */
    public function getPosBd()
    {
        return $this->pos_bd;
    }

    /**
     * Get the [pos_bl] column value.
     *
     * @return int
     */
    public function getPosBl()
    {
        return $this->pos_bl;
    }

    /**
     * Get the [pos_cd] column value.
     *
     * @return int
     */
    public function getPosCd()
    {
        return $this->pos_cd;
    }

    /**
     * Get the [pos_id] column value.
     *
     * @return int
     */
    public function getPosId()
    {
        return $this->pos_id;
    }

    /**
     * Get the [pos_pd] column value.
     *
     * @return int
     */
    public function getPosPd()
    {
        return $this->pos_pd;
    }

    /**
     * Get the [pos_rd] column value.
     *
     * @return int
     */
    public function getPosRd()
    {
        return $this->pos_rd;
    }

    /**
     * Get the [vat] column value.
     *
     * @return int
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set the value of [pcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode !== $v) {
            $this->pcode = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_PCODE] = true;
        }

        return $this;
    } // setPcode()

    /**
     * Set the value of [sa_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setSaType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sa_type !== $v) {
            $this->sa_type = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_SA_TYPE] = true;
        }

        return $this;
    } // setSaType()

    /**
     * Set the value of [pdesc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pdesc !== $v) {
            $this->pdesc = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_PDESC] = true;
        }

        return $this;
    } // setPdesc()

    /**
     * Set the value of [unit] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unit !== $v) {
            $this->unit = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_UNIT] = true;
        }

        return $this;
    } // setUnit()

    /**
     * Set the value of [price] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [bprice] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setBprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bprice !== $v) {
            $this->bprice = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_BPRICE] = true;
        }

        return $this;
    } // setBprice()

    /**
     * Set the value of [customer_price] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setCustomerPrice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->customer_price !== $v) {
            $this->customer_price = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_CUSTOMER_PRICE] = true;
        }

        return $this;
    } // setCustomerPrice()

    /**
     * Set the value of [pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pv !== $v) {
            $this->pv = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_PV] = true;
        }

        return $this;
    } // setPv()

    /**
     * Set the value of [special_pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setSpecialPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->special_pv !== $v) {
            $this->special_pv = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_SPECIAL_PV] = true;
        }

        return $this;
    } // setSpecialPv()

    /**
     * Set the value of [bv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setBv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bv !== $v) {
            $this->bv = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_BV] = true;
        }

        return $this;
    } // setBv()

    /**
     * Set the value of [fv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setFv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fv !== $v) {
            $this->fv = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_FV] = true;
        }

        return $this;
    } // setFv()

    /**
     * Set the value of [weight] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setWeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->weight !== $v) {
            $this->weight = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_WEIGHT] = true;
        }

        return $this;
    } // setWeight()

    /**
     * Set the value of [qty] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setQty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->qty !== $v) {
            $this->qty = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_QTY] = true;
        }

        return $this;
    } // setQty()

    /**
     * Set the value of [st] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setSt($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->st !== $v) {
            $this->st = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_ST] = true;
        }

        return $this;
    } // setSt()

    /**
     * Set the value of [sst] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setSst($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sst !== $v) {
            $this->sst = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_SST] = true;
        }

        return $this;
    } // setSst()

    /**
     * Set the value of [bf] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setBf($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bf !== $v) {
            $this->bf = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_BF] = true;
        }

        return $this;
    } // setBf()

    /**
     * Set the value of [ato] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setAto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ato !== $v) {
            $this->ato = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_ATO] = true;
        }

        return $this;
    } // setAto()

    /**
     * Set the value of [ud] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setUd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ud !== $v) {
            $this->ud = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_UD] = true;
        }

        return $this;
    } // setUd()

    /**
     * Set the value of [locationbase] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [barcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setBarcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->barcode !== $v) {
            $this->barcode = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_BARCODE] = true;
        }

        return $this;
    } // setBarcode()

    /**
     * Set the value of [picture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPicture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->picture !== $v) {
            $this->picture = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_PICTURE] = true;
        }

        return $this;
    } // setPicture()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliProductPackageTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliProductPackageTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Set the value of [pos_mb] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosMb($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_mb !== $v) {
            $this->pos_mb = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_MB] = true;
        }

        return $this;
    } // setPosMb()

    /**
     * Set the value of [pos_su] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosSu($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_su !== $v) {
            $this->pos_su = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_SU] = true;
        }

        return $this;
    } // setPosSu()

    /**
     * Set the value of [pos_ex] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosEx($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_ex !== $v) {
            $this->pos_ex = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_EX] = true;
        }

        return $this;
    } // setPosEx()

    /**
     * Set the value of [pos_br] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosBr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_br !== $v) {
            $this->pos_br = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_BR] = true;
        }

        return $this;
    } // setPosBr()

    /**
     * Set the value of [pos_si] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosSi($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_si !== $v) {
            $this->pos_si = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_SI] = true;
        }

        return $this;
    } // setPosSi()

    /**
     * Set the value of [pos_go] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosGo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_go !== $v) {
            $this->pos_go = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_GO] = true;
        }

        return $this;
    } // setPosGo()

    /**
     * Set the value of [pos_pl] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosPl($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_pl !== $v) {
            $this->pos_pl = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_PL] = true;
        }

        return $this;
    } // setPosPl()

    /**
     * Set the value of [pos_pe] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosPe($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_pe !== $v) {
            $this->pos_pe = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_PE] = true;
        }

        return $this;
    } // setPosPe()

    /**
     * Set the value of [pos_ru] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosRu($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_ru !== $v) {
            $this->pos_ru = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_RU] = true;
        }

        return $this;
    } // setPosRu()

    /**
     * Set the value of [pos_sa] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosSa($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_sa !== $v) {
            $this->pos_sa = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_SA] = true;
        }

        return $this;
    } // setPosSa()

    /**
     * Set the value of [pos_em] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosEm($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_em !== $v) {
            $this->pos_em = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_EM] = true;
        }

        return $this;
    } // setPosEm()

    /**
     * Set the value of [pos_di] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosDi($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_di !== $v) {
            $this->pos_di = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_DI] = true;
        }

        return $this;
    } // setPosDi()

    /**
     * Set the value of [pos_bd] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosBd($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_bd !== $v) {
            $this->pos_bd = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_BD] = true;
        }

        return $this;
    } // setPosBd()

    /**
     * Set the value of [pos_bl] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosBl($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_bl !== $v) {
            $this->pos_bl = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_BL] = true;
        }

        return $this;
    } // setPosBl()

    /**
     * Set the value of [pos_cd] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosCd($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_cd !== $v) {
            $this->pos_cd = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_CD] = true;
        }

        return $this;
    } // setPosCd()

    /**
     * Set the value of [pos_id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_id !== $v) {
            $this->pos_id = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_ID] = true;
        }

        return $this;
    } // setPosId()

    /**
     * Set the value of [pos_pd] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosPd($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_pd !== $v) {
            $this->pos_pd = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_PD] = true;
        }

        return $this;
    } // setPosPd()

    /**
     * Set the value of [pos_rd] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setPosRd($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pos_rd !== $v) {
            $this->pos_rd = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_POS_RD] = true;
        }

        return $this;
    } // setPosRd()

    /**
     * Set the value of [vat] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object (for fluent API support)
     */
    public function setVat($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->vat !== $v) {
            $this->vat = $v;
            $this->modifiedColumns[AliProductPackageTableMap::COL_VAT] = true;
        }

        return $this;
    } // setVat()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->pcode !== '') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliProductPackageTableMap::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliProductPackageTableMap::translateFieldName('SaType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliProductPackageTableMap::translateFieldName('Pdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliProductPackageTableMap::translateFieldName('Unit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliProductPackageTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliProductPackageTableMap::translateFieldName('Bprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliProductPackageTableMap::translateFieldName('CustomerPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_price = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliProductPackageTableMap::translateFieldName('Pv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliProductPackageTableMap::translateFieldName('SpecialPv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->special_pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliProductPackageTableMap::translateFieldName('Bv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliProductPackageTableMap::translateFieldName('Fv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliProductPackageTableMap::translateFieldName('Weight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliProductPackageTableMap::translateFieldName('Qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliProductPackageTableMap::translateFieldName('St', TableMap::TYPE_PHPNAME, $indexType)];
            $this->st = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliProductPackageTableMap::translateFieldName('Sst', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sst = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliProductPackageTableMap::translateFieldName('Bf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bf = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliProductPackageTableMap::translateFieldName('Ato', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ato = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliProductPackageTableMap::translateFieldName('Ud', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ud = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliProductPackageTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliProductPackageTableMap::translateFieldName('Barcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->barcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliProductPackageTableMap::translateFieldName('Picture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->picture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliProductPackageTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliProductPackageTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliProductPackageTableMap::translateFieldName('PosMb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_mb = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliProductPackageTableMap::translateFieldName('PosSu', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_su = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliProductPackageTableMap::translateFieldName('PosEx', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_ex = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliProductPackageTableMap::translateFieldName('PosBr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_br = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliProductPackageTableMap::translateFieldName('PosSi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_si = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliProductPackageTableMap::translateFieldName('PosGo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_go = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliProductPackageTableMap::translateFieldName('PosPl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_pl = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliProductPackageTableMap::translateFieldName('PosPe', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_pe = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliProductPackageTableMap::translateFieldName('PosRu', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_ru = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliProductPackageTableMap::translateFieldName('PosSa', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_sa = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliProductPackageTableMap::translateFieldName('PosEm', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_em = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : AliProductPackageTableMap::translateFieldName('PosDi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_di = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : AliProductPackageTableMap::translateFieldName('PosBd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_bd = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : AliProductPackageTableMap::translateFieldName('PosBl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_bl = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : AliProductPackageTableMap::translateFieldName('PosCd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cd = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : AliProductPackageTableMap::translateFieldName('PosId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : AliProductPackageTableMap::translateFieldName('PosPd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_pd = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : AliProductPackageTableMap::translateFieldName('PosRd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_rd = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : AliProductPackageTableMap::translateFieldName('Vat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vat = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 42; // 42 = AliProductPackageTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliProductPackage'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AliProductPackageTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliProductPackageQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see AliProductPackage::setDeleted()
     * @see AliProductPackage::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductPackageTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliProductPackageQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliProductPackageTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                AliProductPackageTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PCODE)) {
            $modifiedColumns[':p' . $index++]  = 'pcode';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_SA_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PDESC)) {
            $modifiedColumns[':p' . $index++]  = 'pdesc';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_UNIT)) {
            $modifiedColumns[':p' . $index++]  = 'unit';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_BPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'bprice';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_CUSTOMER_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'customer_price';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PV)) {
            $modifiedColumns[':p' . $index++]  = 'pv';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_SPECIAL_PV)) {
            $modifiedColumns[':p' . $index++]  = 'special_pv';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_BV)) {
            $modifiedColumns[':p' . $index++]  = 'bv';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_FV)) {
            $modifiedColumns[':p' . $index++]  = 'fv';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_WEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'weight';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'qty';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_ST)) {
            $modifiedColumns[':p' . $index++]  = 'st';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_SST)) {
            $modifiedColumns[':p' . $index++]  = 'sst';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_BF)) {
            $modifiedColumns[':p' . $index++]  = 'bf';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_ATO)) {
            $modifiedColumns[':p' . $index++]  = 'ato';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_UD)) {
            $modifiedColumns[':p' . $index++]  = 'ud';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_BARCODE)) {
            $modifiedColumns[':p' . $index++]  = 'barcode';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PICTURE)) {
            $modifiedColumns[':p' . $index++]  = 'picture';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_MB)) {
            $modifiedColumns[':p' . $index++]  = 'pos_mb';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_SU)) {
            $modifiedColumns[':p' . $index++]  = 'pos_su';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_EX)) {
            $modifiedColumns[':p' . $index++]  = 'pos_ex';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_BR)) {
            $modifiedColumns[':p' . $index++]  = 'pos_br';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_SI)) {
            $modifiedColumns[':p' . $index++]  = 'pos_si';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_GO)) {
            $modifiedColumns[':p' . $index++]  = 'pos_go';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_PL)) {
            $modifiedColumns[':p' . $index++]  = 'pos_pl';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_PE)) {
            $modifiedColumns[':p' . $index++]  = 'pos_pe';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_RU)) {
            $modifiedColumns[':p' . $index++]  = 'pos_ru';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_SA)) {
            $modifiedColumns[':p' . $index++]  = 'pos_sa';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_EM)) {
            $modifiedColumns[':p' . $index++]  = 'pos_em';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_DI)) {
            $modifiedColumns[':p' . $index++]  = 'pos_di';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_BD)) {
            $modifiedColumns[':p' . $index++]  = 'pos_bd';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_BL)) {
            $modifiedColumns[':p' . $index++]  = 'pos_bl';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_CD)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cd';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_ID)) {
            $modifiedColumns[':p' . $index++]  = 'pos_id';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_PD)) {
            $modifiedColumns[':p' . $index++]  = 'pos_pd';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_RD)) {
            $modifiedColumns[':p' . $index++]  = 'pos_rd';
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_VAT)) {
            $modifiedColumns[':p' . $index++]  = 'vat';
        }

        $sql = sprintf(
            'INSERT INTO ali_product_package (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'pcode':
                        $stmt->bindValue($identifier, $this->pcode, PDO::PARAM_STR);
                        break;
                    case 'sa_type':
                        $stmt->bindValue($identifier, $this->sa_type, PDO::PARAM_STR);
                        break;
                    case 'pdesc':
                        $stmt->bindValue($identifier, $this->pdesc, PDO::PARAM_STR);
                        break;
                    case 'unit':
                        $stmt->bindValue($identifier, $this->unit, PDO::PARAM_STR);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_STR);
                        break;
                    case 'bprice':
                        $stmt->bindValue($identifier, $this->bprice, PDO::PARAM_STR);
                        break;
                    case 'customer_price':
                        $stmt->bindValue($identifier, $this->customer_price, PDO::PARAM_STR);
                        break;
                    case 'pv':
                        $stmt->bindValue($identifier, $this->pv, PDO::PARAM_STR);
                        break;
                    case 'special_pv':
                        $stmt->bindValue($identifier, $this->special_pv, PDO::PARAM_STR);
                        break;
                    case 'bv':
                        $stmt->bindValue($identifier, $this->bv, PDO::PARAM_STR);
                        break;
                    case 'fv':
                        $stmt->bindValue($identifier, $this->fv, PDO::PARAM_STR);
                        break;
                    case 'weight':
                        $stmt->bindValue($identifier, $this->weight, PDO::PARAM_STR);
                        break;
                    case 'qty':
                        $stmt->bindValue($identifier, $this->qty, PDO::PARAM_STR);
                        break;
                    case 'st':
                        $stmt->bindValue($identifier, $this->st, PDO::PARAM_INT);
                        break;
                    case 'sst':
                        $stmt->bindValue($identifier, $this->sst, PDO::PARAM_INT);
                        break;
                    case 'bf':
                        $stmt->bindValue($identifier, $this->bf, PDO::PARAM_INT);
                        break;
                    case 'ato':
                        $stmt->bindValue($identifier, $this->ato, PDO::PARAM_INT);
                        break;
                    case 'ud':
                        $stmt->bindValue($identifier, $this->ud, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_STR);
                        break;
                    case 'barcode':
                        $stmt->bindValue($identifier, $this->barcode, PDO::PARAM_STR);
                        break;
                    case 'picture':
                        $stmt->bindValue($identifier, $this->picture, PDO::PARAM_STR);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pos_mb':
                        $stmt->bindValue($identifier, $this->pos_mb, PDO::PARAM_INT);
                        break;
                    case 'pos_su':
                        $stmt->bindValue($identifier, $this->pos_su, PDO::PARAM_INT);
                        break;
                    case 'pos_ex':
                        $stmt->bindValue($identifier, $this->pos_ex, PDO::PARAM_INT);
                        break;
                    case 'pos_br':
                        $stmt->bindValue($identifier, $this->pos_br, PDO::PARAM_INT);
                        break;
                    case 'pos_si':
                        $stmt->bindValue($identifier, $this->pos_si, PDO::PARAM_INT);
                        break;
                    case 'pos_go':
                        $stmt->bindValue($identifier, $this->pos_go, PDO::PARAM_INT);
                        break;
                    case 'pos_pl':
                        $stmt->bindValue($identifier, $this->pos_pl, PDO::PARAM_INT);
                        break;
                    case 'pos_pe':
                        $stmt->bindValue($identifier, $this->pos_pe, PDO::PARAM_INT);
                        break;
                    case 'pos_ru':
                        $stmt->bindValue($identifier, $this->pos_ru, PDO::PARAM_INT);
                        break;
                    case 'pos_sa':
                        $stmt->bindValue($identifier, $this->pos_sa, PDO::PARAM_INT);
                        break;
                    case 'pos_em':
                        $stmt->bindValue($identifier, $this->pos_em, PDO::PARAM_INT);
                        break;
                    case 'pos_di':
                        $stmt->bindValue($identifier, $this->pos_di, PDO::PARAM_INT);
                        break;
                    case 'pos_bd':
                        $stmt->bindValue($identifier, $this->pos_bd, PDO::PARAM_INT);
                        break;
                    case 'pos_bl':
                        $stmt->bindValue($identifier, $this->pos_bl, PDO::PARAM_INT);
                        break;
                    case 'pos_cd':
                        $stmt->bindValue($identifier, $this->pos_cd, PDO::PARAM_INT);
                        break;
                    case 'pos_id':
                        $stmt->bindValue($identifier, $this->pos_id, PDO::PARAM_INT);
                        break;
                    case 'pos_pd':
                        $stmt->bindValue($identifier, $this->pos_pd, PDO::PARAM_INT);
                        break;
                    case 'pos_rd':
                        $stmt->bindValue($identifier, $this->pos_rd, PDO::PARAM_INT);
                        break;
                    case 'vat':
                        $stmt->bindValue($identifier, $this->vat, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliProductPackageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getPcode();
                break;
            case 1:
                return $this->getSaType();
                break;
            case 2:
                return $this->getPdesc();
                break;
            case 3:
                return $this->getUnit();
                break;
            case 4:
                return $this->getPrice();
                break;
            case 5:
                return $this->getBprice();
                break;
            case 6:
                return $this->getCustomerPrice();
                break;
            case 7:
                return $this->getPv();
                break;
            case 8:
                return $this->getSpecialPv();
                break;
            case 9:
                return $this->getBv();
                break;
            case 10:
                return $this->getFv();
                break;
            case 11:
                return $this->getWeight();
                break;
            case 12:
                return $this->getQty();
                break;
            case 13:
                return $this->getSt();
                break;
            case 14:
                return $this->getSst();
                break;
            case 15:
                return $this->getBf();
                break;
            case 16:
                return $this->getAto();
                break;
            case 17:
                return $this->getUd();
                break;
            case 18:
                return $this->getLocationbase();
                break;
            case 19:
                return $this->getBarcode();
                break;
            case 20:
                return $this->getPicture();
                break;
            case 21:
                return $this->getFdate();
                break;
            case 22:
                return $this->getTdate();
                break;
            case 23:
                return $this->getPosMb();
                break;
            case 24:
                return $this->getPosSu();
                break;
            case 25:
                return $this->getPosEx();
                break;
            case 26:
                return $this->getPosBr();
                break;
            case 27:
                return $this->getPosSi();
                break;
            case 28:
                return $this->getPosGo();
                break;
            case 29:
                return $this->getPosPl();
                break;
            case 30:
                return $this->getPosPe();
                break;
            case 31:
                return $this->getPosRu();
                break;
            case 32:
                return $this->getPosSa();
                break;
            case 33:
                return $this->getPosEm();
                break;
            case 34:
                return $this->getPosDi();
                break;
            case 35:
                return $this->getPosBd();
                break;
            case 36:
                return $this->getPosBl();
                break;
            case 37:
                return $this->getPosCd();
                break;
            case 38:
                return $this->getPosId();
                break;
            case 39:
                return $this->getPosPd();
                break;
            case 40:
                return $this->getPosRd();
                break;
            case 41:
                return $this->getVat();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['AliProductPackage'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliProductPackage'][$this->hashCode()] = true;
        $keys = AliProductPackageTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPcode(),
            $keys[1] => $this->getSaType(),
            $keys[2] => $this->getPdesc(),
            $keys[3] => $this->getUnit(),
            $keys[4] => $this->getPrice(),
            $keys[5] => $this->getBprice(),
            $keys[6] => $this->getCustomerPrice(),
            $keys[7] => $this->getPv(),
            $keys[8] => $this->getSpecialPv(),
            $keys[9] => $this->getBv(),
            $keys[10] => $this->getFv(),
            $keys[11] => $this->getWeight(),
            $keys[12] => $this->getQty(),
            $keys[13] => $this->getSt(),
            $keys[14] => $this->getSst(),
            $keys[15] => $this->getBf(),
            $keys[16] => $this->getAto(),
            $keys[17] => $this->getUd(),
            $keys[18] => $this->getLocationbase(),
            $keys[19] => $this->getBarcode(),
            $keys[20] => $this->getPicture(),
            $keys[21] => $this->getFdate(),
            $keys[22] => $this->getTdate(),
            $keys[23] => $this->getPosMb(),
            $keys[24] => $this->getPosSu(),
            $keys[25] => $this->getPosEx(),
            $keys[26] => $this->getPosBr(),
            $keys[27] => $this->getPosSi(),
            $keys[28] => $this->getPosGo(),
            $keys[29] => $this->getPosPl(),
            $keys[30] => $this->getPosPe(),
            $keys[31] => $this->getPosRu(),
            $keys[32] => $this->getPosSa(),
            $keys[33] => $this->getPosEm(),
            $keys[34] => $this->getPosDi(),
            $keys[35] => $this->getPosBd(),
            $keys[36] => $this->getPosBl(),
            $keys[37] => $this->getPosCd(),
            $keys[38] => $this->getPosId(),
            $keys[39] => $this->getPosPd(),
            $keys[40] => $this->getPosRd(),
            $keys[41] => $this->getVat(),
        );
        if ($result[$keys[21]] instanceof \DateTimeInterface) {
            $result[$keys[21]] = $result[$keys[21]]->format('c');
        }

        if ($result[$keys[22]] instanceof \DateTimeInterface) {
            $result[$keys[22]] = $result[$keys[22]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\CciOrm\CciOrm\AliProductPackage
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliProductPackageTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliProductPackage
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setPcode($value);
                break;
            case 1:
                $this->setSaType($value);
                break;
            case 2:
                $this->setPdesc($value);
                break;
            case 3:
                $this->setUnit($value);
                break;
            case 4:
                $this->setPrice($value);
                break;
            case 5:
                $this->setBprice($value);
                break;
            case 6:
                $this->setCustomerPrice($value);
                break;
            case 7:
                $this->setPv($value);
                break;
            case 8:
                $this->setSpecialPv($value);
                break;
            case 9:
                $this->setBv($value);
                break;
            case 10:
                $this->setFv($value);
                break;
            case 11:
                $this->setWeight($value);
                break;
            case 12:
                $this->setQty($value);
                break;
            case 13:
                $this->setSt($value);
                break;
            case 14:
                $this->setSst($value);
                break;
            case 15:
                $this->setBf($value);
                break;
            case 16:
                $this->setAto($value);
                break;
            case 17:
                $this->setUd($value);
                break;
            case 18:
                $this->setLocationbase($value);
                break;
            case 19:
                $this->setBarcode($value);
                break;
            case 20:
                $this->setPicture($value);
                break;
            case 21:
                $this->setFdate($value);
                break;
            case 22:
                $this->setTdate($value);
                break;
            case 23:
                $this->setPosMb($value);
                break;
            case 24:
                $this->setPosSu($value);
                break;
            case 25:
                $this->setPosEx($value);
                break;
            case 26:
                $this->setPosBr($value);
                break;
            case 27:
                $this->setPosSi($value);
                break;
            case 28:
                $this->setPosGo($value);
                break;
            case 29:
                $this->setPosPl($value);
                break;
            case 30:
                $this->setPosPe($value);
                break;
            case 31:
                $this->setPosRu($value);
                break;
            case 32:
                $this->setPosSa($value);
                break;
            case 33:
                $this->setPosEm($value);
                break;
            case 34:
                $this->setPosDi($value);
                break;
            case 35:
                $this->setPosBd($value);
                break;
            case 36:
                $this->setPosBl($value);
                break;
            case 37:
                $this->setPosCd($value);
                break;
            case 38:
                $this->setPosId($value);
                break;
            case 39:
                $this->setPosPd($value);
                break;
            case 40:
                $this->setPosRd($value);
                break;
            case 41:
                $this->setVat($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = AliProductPackageTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setPcode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSaType($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPdesc($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setUnit($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPrice($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBprice($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCustomerPrice($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPv($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSpecialPv($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setBv($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setFv($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setWeight($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setQty($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSt($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setSst($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setBf($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setAto($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setUd($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setLocationbase($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setBarcode($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setPicture($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setFdate($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setTdate($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setPosMb($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setPosSu($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setPosEx($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setPosBr($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setPosSi($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setPosGo($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setPosPl($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setPosPe($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setPosRu($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setPosSa($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setPosEm($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setPosDi($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setPosBd($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setPosBl($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setPosCd($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setPosId($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setPosPd($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setPosRd($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setVat($arr[$keys[41]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\CciOrm\CciOrm\AliProductPackage The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AliProductPackageTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliProductPackageTableMap::COL_PCODE)) {
            $criteria->add(AliProductPackageTableMap::COL_PCODE, $this->pcode);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_SA_TYPE)) {
            $criteria->add(AliProductPackageTableMap::COL_SA_TYPE, $this->sa_type);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PDESC)) {
            $criteria->add(AliProductPackageTableMap::COL_PDESC, $this->pdesc);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_UNIT)) {
            $criteria->add(AliProductPackageTableMap::COL_UNIT, $this->unit);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PRICE)) {
            $criteria->add(AliProductPackageTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_BPRICE)) {
            $criteria->add(AliProductPackageTableMap::COL_BPRICE, $this->bprice);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_CUSTOMER_PRICE)) {
            $criteria->add(AliProductPackageTableMap::COL_CUSTOMER_PRICE, $this->customer_price);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PV)) {
            $criteria->add(AliProductPackageTableMap::COL_PV, $this->pv);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_SPECIAL_PV)) {
            $criteria->add(AliProductPackageTableMap::COL_SPECIAL_PV, $this->special_pv);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_BV)) {
            $criteria->add(AliProductPackageTableMap::COL_BV, $this->bv);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_FV)) {
            $criteria->add(AliProductPackageTableMap::COL_FV, $this->fv);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_WEIGHT)) {
            $criteria->add(AliProductPackageTableMap::COL_WEIGHT, $this->weight);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_QTY)) {
            $criteria->add(AliProductPackageTableMap::COL_QTY, $this->qty);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_ST)) {
            $criteria->add(AliProductPackageTableMap::COL_ST, $this->st);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_SST)) {
            $criteria->add(AliProductPackageTableMap::COL_SST, $this->sst);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_BF)) {
            $criteria->add(AliProductPackageTableMap::COL_BF, $this->bf);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_ATO)) {
            $criteria->add(AliProductPackageTableMap::COL_ATO, $this->ato);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_UD)) {
            $criteria->add(AliProductPackageTableMap::COL_UD, $this->ud);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliProductPackageTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_BARCODE)) {
            $criteria->add(AliProductPackageTableMap::COL_BARCODE, $this->barcode);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_PICTURE)) {
            $criteria->add(AliProductPackageTableMap::COL_PICTURE, $this->picture);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_FDATE)) {
            $criteria->add(AliProductPackageTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_TDATE)) {
            $criteria->add(AliProductPackageTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_MB)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_MB, $this->pos_mb);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_SU)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_SU, $this->pos_su);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_EX)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_EX, $this->pos_ex);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_BR)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_BR, $this->pos_br);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_SI)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_SI, $this->pos_si);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_GO)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_GO, $this->pos_go);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_PL)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_PL, $this->pos_pl);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_PE)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_PE, $this->pos_pe);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_RU)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_RU, $this->pos_ru);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_SA)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_SA, $this->pos_sa);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_EM)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_EM, $this->pos_em);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_DI)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_DI, $this->pos_di);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_BD)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_BD, $this->pos_bd);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_BL)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_BL, $this->pos_bl);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_CD)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_CD, $this->pos_cd);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_ID)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_ID, $this->pos_id);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_PD)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_PD, $this->pos_pd);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_POS_RD)) {
            $criteria->add(AliProductPackageTableMap::COL_POS_RD, $this->pos_rd);
        }
        if ($this->isColumnModified(AliProductPackageTableMap::COL_VAT)) {
            $criteria->add(AliProductPackageTableMap::COL_VAT, $this->vat);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildAliProductPackageQuery::create();
        $criteria->add(AliProductPackageTableMap::COL_PCODE, $this->pcode);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getPcode();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPcode();
    }

    /**
     * Generic method to set the primary key (pcode column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPcode($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getPcode();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliProductPackage (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPcode($this->getPcode());
        $copyObj->setSaType($this->getSaType());
        $copyObj->setPdesc($this->getPdesc());
        $copyObj->setUnit($this->getUnit());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setBprice($this->getBprice());
        $copyObj->setCustomerPrice($this->getCustomerPrice());
        $copyObj->setPv($this->getPv());
        $copyObj->setSpecialPv($this->getSpecialPv());
        $copyObj->setBv($this->getBv());
        $copyObj->setFv($this->getFv());
        $copyObj->setWeight($this->getWeight());
        $copyObj->setQty($this->getQty());
        $copyObj->setSt($this->getSt());
        $copyObj->setSst($this->getSst());
        $copyObj->setBf($this->getBf());
        $copyObj->setAto($this->getAto());
        $copyObj->setUd($this->getUd());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setBarcode($this->getBarcode());
        $copyObj->setPicture($this->getPicture());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setPosMb($this->getPosMb());
        $copyObj->setPosSu($this->getPosSu());
        $copyObj->setPosEx($this->getPosEx());
        $copyObj->setPosBr($this->getPosBr());
        $copyObj->setPosSi($this->getPosSi());
        $copyObj->setPosGo($this->getPosGo());
        $copyObj->setPosPl($this->getPosPl());
        $copyObj->setPosPe($this->getPosPe());
        $copyObj->setPosRu($this->getPosRu());
        $copyObj->setPosSa($this->getPosSa());
        $copyObj->setPosEm($this->getPosEm());
        $copyObj->setPosDi($this->getPosDi());
        $copyObj->setPosBd($this->getPosBd());
        $copyObj->setPosBl($this->getPosBl());
        $copyObj->setPosCd($this->getPosCd());
        $copyObj->setPosId($this->getPosId());
        $copyObj->setPosPd($this->getPosPd());
        $copyObj->setPosRd($this->getPosRd());
        $copyObj->setVat($this->getVat());
        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \CciOrm\CciOrm\AliProductPackage Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->pcode = null;
        $this->sa_type = null;
        $this->pdesc = null;
        $this->unit = null;
        $this->price = null;
        $this->bprice = null;
        $this->customer_price = null;
        $this->pv = null;
        $this->special_pv = null;
        $this->bv = null;
        $this->fv = null;
        $this->weight = null;
        $this->qty = null;
        $this->st = null;
        $this->sst = null;
        $this->bf = null;
        $this->ato = null;
        $this->ud = null;
        $this->locationbase = null;
        $this->barcode = null;
        $this->picture = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->pos_mb = null;
        $this->pos_su = null;
        $this->pos_ex = null;
        $this->pos_br = null;
        $this->pos_si = null;
        $this->pos_go = null;
        $this->pos_pl = null;
        $this->pos_pe = null;
        $this->pos_ru = null;
        $this->pos_sa = null;
        $this->pos_em = null;
        $this->pos_di = null;
        $this->pos_bd = null;
        $this->pos_bl = null;
        $this->pos_cd = null;
        $this->pos_id = null;
        $this->pos_pd = null;
        $this->pos_rd = null;
        $this->vat = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AliProductPackageTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
