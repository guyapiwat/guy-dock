<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliBmbonusQuery as ChildAliBmbonusQuery;
use CciOrm\CciOrm\Map\AliBmbonusTableMap;
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
 * Base class that represents a row from the 'ali_bmbonus' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliBmbonus implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliBmbonusTableMap';


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
     * The value for the cid field.
     *
     * @var        int
     */
    protected $cid;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

    /**
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

    /**
     * The value for the name_t field.
     *
     * @var        string
     */
    protected $name_t;

    /**
     * The value for the ro_l field.
     *
     * @var        string
     */
    protected $ro_l;

    /**
     * The value for the ro_c field.
     *
     * @var        string
     */
    protected $ro_c;

    /**
     * The value for the ro_r field.
     *
     * @var        string
     */
    protected $ro_r;

    /**
     * The value for the pcrry_l field.
     *
     * @var        string
     */
    protected $pcrry_l;

    /**
     * The value for the pcrry_c field.
     *
     * @var        string
     */
    protected $pcrry_c;

    /**
     * The value for the pquota field.
     *
     * @var        string
     */
    protected $pquota;

    /**
     * The value for the total_pv_ll field.
     *
     * @var        string
     */
    protected $total_pv_ll;

    /**
     * The value for the total_pv_rr field.
     *
     * @var        string
     */
    protected $total_pv_rr;

    /**
     * The value for the total_pv_l field.
     *
     * @var        string
     */
    protected $total_pv_l;

    /**
     * The value for the total_pv_r field.
     *
     * @var        string
     */
    protected $total_pv_r;

    /**
     * The value for the carry_l field.
     *
     * @var        string
     */
    protected $carry_l;

    /**
     * The value for the carry_c field.
     *
     * @var        int
     */
    protected $carry_c;

    /**
     * The value for the carry_r field.
     *
     * @var        int
     */
    protected $carry_r;

    /**
     * The value for the quota field.
     *
     * @var        string
     */
    protected $quota;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the percer field.
     *
     * @var        string
     */
    protected $percer;

    /**
     * The value for the tax field.
     *
     * @var        string
     */
    protected $tax;

    /**
     * The value for the totalamt field.
     *
     * @var        string
     */
    protected $totalamt;

    /**
     * The value for the paydate field.
     *
     * Note: this column has a database default value of: NULL
     * @var        DateTime
     */
    protected $paydate;

    /**
     * The value for the mpos field.
     *
     * @var        string
     */
    protected $mpos;

    /**
     * The value for the tdate field.
     *
     * @var        DateTime
     */
    protected $tdate;

    /**
     * The value for the fdate field.
     *
     * @var        DateTime
     */
    protected $fdate;

    /**
     * The value for the pair_stop field.
     *
     * @var        string
     */
    protected $pair_stop;

    /**
     * The value for the point field.
     *
     * @var        int
     */
    protected $point;

    /**
     * The value for the status field.
     *
     * @var        string
     */
    protected $status;

    /**
     * The value for the adjust field.
     *
     * @var        string
     */
    protected $adjust;

    /**
     * The value for the balance field.
     *
     * @var        string
     */
    protected $balance;

    /**
     * The value for the cycle_b field.
     *
     * @var        int
     */
    protected $cycle_b;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the crate field.
     *
     * @var        string
     */
    protected $crate;

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
        $this->paydate = PropelDateTime::newInstance(NULL, null, 'DateTime');
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliBmbonus object.
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
     * Compares this with another <code>AliBmbonus</code> instance.  If
     * <code>obj</code> is an instance of <code>AliBmbonus</code>, delegates to
     * <code>equals(AliBmbonus)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliBmbonus The current object, for fluid interface
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
     * Get the [cid] column value.
     *
     * @return int
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Get the [rcode] column value.
     *
     * @return int
     */
    public function getRcode()
    {
        return $this->rcode;
    }

    /**
     * Get the [mcode] column value.
     *
     * @return string
     */
    public function getMcode()
    {
        return $this->mcode;
    }

    /**
     * Get the [name_t] column value.
     *
     * @return string
     */
    public function getNameT()
    {
        return $this->name_t;
    }

    /**
     * Get the [ro_l] column value.
     *
     * @return string
     */
    public function getRoL()
    {
        return $this->ro_l;
    }

    /**
     * Get the [ro_c] column value.
     *
     * @return string
     */
    public function getRoC()
    {
        return $this->ro_c;
    }

    /**
     * Get the [ro_r] column value.
     *
     * @return string
     */
    public function getRoR()
    {
        return $this->ro_r;
    }

    /**
     * Get the [pcrry_l] column value.
     *
     * @return string
     */
    public function getPcrryL()
    {
        return $this->pcrry_l;
    }

    /**
     * Get the [pcrry_c] column value.
     *
     * @return string
     */
    public function getPcrryC()
    {
        return $this->pcrry_c;
    }

    /**
     * Get the [pquota] column value.
     *
     * @return string
     */
    public function getPquota()
    {
        return $this->pquota;
    }

    /**
     * Get the [total_pv_ll] column value.
     *
     * @return string
     */
    public function getTotalPvLl()
    {
        return $this->total_pv_ll;
    }

    /**
     * Get the [total_pv_rr] column value.
     *
     * @return string
     */
    public function getTotalPvRr()
    {
        return $this->total_pv_rr;
    }

    /**
     * Get the [total_pv_l] column value.
     *
     * @return string
     */
    public function getTotalPvL()
    {
        return $this->total_pv_l;
    }

    /**
     * Get the [total_pv_r] column value.
     *
     * @return string
     */
    public function getTotalPvR()
    {
        return $this->total_pv_r;
    }

    /**
     * Get the [carry_l] column value.
     *
     * @return string
     */
    public function getCarryL()
    {
        return $this->carry_l;
    }

    /**
     * Get the [carry_c] column value.
     *
     * @return int
     */
    public function getCarryC()
    {
        return $this->carry_c;
    }

    /**
     * Get the [carry_r] column value.
     *
     * @return int
     */
    public function getCarryR()
    {
        return $this->carry_r;
    }

    /**
     * Get the [quota] column value.
     *
     * @return string
     */
    public function getQuota()
    {
        return $this->quota;
    }

    /**
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [percer] column value.
     *
     * @return string
     */
    public function getPercer()
    {
        return $this->percer;
    }

    /**
     * Get the [tax] column value.
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Get the [totalamt] column value.
     *
     * @return string
     */
    public function getTotalamt()
    {
        return $this->totalamt;
    }

    /**
     * Get the [optionally formatted] temporal [paydate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPaydate($format = NULL)
    {
        if ($format === null) {
            return $this->paydate;
        } else {
            return $this->paydate instanceof \DateTimeInterface ? $this->paydate->format($format) : null;
        }
    }

    /**
     * Get the [mpos] column value.
     *
     * @return string
     */
    public function getMpos()
    {
        return $this->mpos;
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
     * Get the [pair_stop] column value.
     *
     * @return string
     */
    public function getPairStop()
    {
        return $this->pair_stop;
    }

    /**
     * Get the [point] column value.
     *
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [adjust] column value.
     *
     * @return string
     */
    public function getAdjust()
    {
        return $this->adjust;
    }

    /**
     * Get the [balance] column value.
     *
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Get the [cycle_b] column value.
     *
     * @return int
     */
    public function getCycleB()
    {
        return $this->cycle_b;
    }

    /**
     * Get the [locationbase] column value.
     *
     * @return int
     */
    public function getLocationbase()
    {
        return $this->locationbase;
    }

    /**
     * Get the [crate] column value.
     *
     * @return string
     */
    public function getCrate()
    {
        return $this->crate;
    }

    /**
     * Set the value of [cid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setCid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cid !== $v) {
            $this->cid = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_CID] = true;
        }

        return $this;
    } // setCid()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [ro_l] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setRoL($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ro_l !== $v) {
            $this->ro_l = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_RO_L] = true;
        }

        return $this;
    } // setRoL()

    /**
     * Set the value of [ro_c] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setRoC($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ro_c !== $v) {
            $this->ro_c = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_RO_C] = true;
        }

        return $this;
    } // setRoC()

    /**
     * Set the value of [ro_r] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setRoR($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ro_r !== $v) {
            $this->ro_r = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_RO_R] = true;
        }

        return $this;
    } // setRoR()

    /**
     * Set the value of [pcrry_l] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setPcrryL($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcrry_l !== $v) {
            $this->pcrry_l = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_PCRRY_L] = true;
        }

        return $this;
    } // setPcrryL()

    /**
     * Set the value of [pcrry_c] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setPcrryC($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcrry_c !== $v) {
            $this->pcrry_c = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_PCRRY_C] = true;
        }

        return $this;
    } // setPcrryC()

    /**
     * Set the value of [pquota] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setPquota($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pquota !== $v) {
            $this->pquota = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_PQUOTA] = true;
        }

        return $this;
    } // setPquota()

    /**
     * Set the value of [total_pv_ll] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setTotalPvLl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_pv_ll !== $v) {
            $this->total_pv_ll = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_TOTAL_PV_LL] = true;
        }

        return $this;
    } // setTotalPvLl()

    /**
     * Set the value of [total_pv_rr] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setTotalPvRr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_pv_rr !== $v) {
            $this->total_pv_rr = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_TOTAL_PV_RR] = true;
        }

        return $this;
    } // setTotalPvRr()

    /**
     * Set the value of [total_pv_l] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setTotalPvL($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_pv_l !== $v) {
            $this->total_pv_l = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_TOTAL_PV_L] = true;
        }

        return $this;
    } // setTotalPvL()

    /**
     * Set the value of [total_pv_r] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setTotalPvR($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_pv_r !== $v) {
            $this->total_pv_r = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_TOTAL_PV_R] = true;
        }

        return $this;
    } // setTotalPvR()

    /**
     * Set the value of [carry_l] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setCarryL($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->carry_l !== $v) {
            $this->carry_l = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_CARRY_L] = true;
        }

        return $this;
    } // setCarryL()

    /**
     * Set the value of [carry_c] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setCarryC($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carry_c !== $v) {
            $this->carry_c = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_CARRY_C] = true;
        }

        return $this;
    } // setCarryC()

    /**
     * Set the value of [carry_r] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setCarryR($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carry_r !== $v) {
            $this->carry_r = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_CARRY_R] = true;
        }

        return $this;
    } // setCarryR()

    /**
     * Set the value of [quota] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setQuota($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->quota !== $v) {
            $this->quota = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_QUOTA] = true;
        }

        return $this;
    } // setQuota()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [percer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setPercer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->percer !== $v) {
            $this->percer = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_PERCER] = true;
        }

        return $this;
    } // setPercer()

    /**
     * Set the value of [tax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tax !== $v) {
            $this->tax = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_TAX] = true;
        }

        return $this;
    } // setTax()

    /**
     * Set the value of [totalamt] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setTotalamt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->totalamt !== $v) {
            $this->totalamt = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_TOTALAMT] = true;
        }

        return $this;
    } // setTotalamt()

    /**
     * Sets the value of [paydate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setPaydate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->paydate !== null || $dt !== null) {
            if ( ($dt != $this->paydate) // normalized values don't match
                || ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
                 ) {
                $this->paydate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliBmbonusTableMap::COL_PAYDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setPaydate()

    /**
     * Set the value of [mpos] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setMpos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mpos !== $v) {
            $this->mpos = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_MPOS] = true;
        }

        return $this;
    } // setMpos()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliBmbonusTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliBmbonusTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Set the value of [pair_stop] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setPairStop($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pair_stop !== $v) {
            $this->pair_stop = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_PAIR_STOP] = true;
        }

        return $this;
    } // setPairStop()

    /**
     * Set the value of [point] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setPoint($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->point !== $v) {
            $this->point = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_POINT] = true;
        }

        return $this;
    } // setPoint()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [adjust] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setAdjust($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adjust !== $v) {
            $this->adjust = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_ADJUST] = true;
        }

        return $this;
    } // setAdjust()

    /**
     * Set the value of [balance] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setBalance($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->balance !== $v) {
            $this->balance = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_BALANCE] = true;
        }

        return $this;
    } // setBalance()

    /**
     * Set the value of [cycle_b] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setCycleB($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cycle_b !== $v) {
            $this->cycle_b = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_CYCLE_B] = true;
        }

        return $this;
    } // setCycleB()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [crate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object (for fluent API support)
     */
    public function setCrate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->crate !== $v) {
            $this->crate = $v;
            $this->modifiedColumns[AliBmbonusTableMap::COL_CRATE] = true;
        }

        return $this;
    } // setCrate()

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
            if ($this->paydate && $this->paydate->format('Y-m-d') !== NULL) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliBmbonusTableMap::translateFieldName('Cid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliBmbonusTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliBmbonusTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliBmbonusTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliBmbonusTableMap::translateFieldName('RoL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ro_l = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliBmbonusTableMap::translateFieldName('RoC', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ro_c = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliBmbonusTableMap::translateFieldName('RoR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ro_r = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliBmbonusTableMap::translateFieldName('PcrryL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcrry_l = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliBmbonusTableMap::translateFieldName('PcrryC', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcrry_c = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliBmbonusTableMap::translateFieldName('Pquota', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pquota = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliBmbonusTableMap::translateFieldName('TotalPvLl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_pv_ll = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliBmbonusTableMap::translateFieldName('TotalPvRr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_pv_rr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliBmbonusTableMap::translateFieldName('TotalPvL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_pv_l = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliBmbonusTableMap::translateFieldName('TotalPvR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_pv_r = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliBmbonusTableMap::translateFieldName('CarryL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carry_l = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliBmbonusTableMap::translateFieldName('CarryC', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carry_c = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliBmbonusTableMap::translateFieldName('CarryR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carry_r = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliBmbonusTableMap::translateFieldName('Quota', TableMap::TYPE_PHPNAME, $indexType)];
            $this->quota = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliBmbonusTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliBmbonusTableMap::translateFieldName('Percer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->percer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliBmbonusTableMap::translateFieldName('Tax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliBmbonusTableMap::translateFieldName('Totalamt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalamt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliBmbonusTableMap::translateFieldName('Paydate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->paydate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliBmbonusTableMap::translateFieldName('Mpos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mpos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliBmbonusTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliBmbonusTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliBmbonusTableMap::translateFieldName('PairStop', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pair_stop = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliBmbonusTableMap::translateFieldName('Point', TableMap::TYPE_PHPNAME, $indexType)];
            $this->point = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliBmbonusTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliBmbonusTableMap::translateFieldName('Adjust', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adjust = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliBmbonusTableMap::translateFieldName('Balance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->balance = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliBmbonusTableMap::translateFieldName('CycleB', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cycle_b = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliBmbonusTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliBmbonusTableMap::translateFieldName('Crate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crate = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 34; // 34 = AliBmbonusTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliBmbonus'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliBmbonusTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliBmbonusQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliBmbonus::setDeleted()
     * @see AliBmbonus::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliBmbonusQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliBmbonusTableMap::DATABASE_NAME);
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
                AliBmbonusTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliBmbonusTableMap::COL_CID] = true;
        if (null !== $this->cid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliBmbonusTableMap::COL_CID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CID)) {
            $modifiedColumns[':p' . $index++]  = 'cid';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_RO_L)) {
            $modifiedColumns[':p' . $index++]  = 'ro_l';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_RO_C)) {
            $modifiedColumns[':p' . $index++]  = 'ro_c';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_RO_R)) {
            $modifiedColumns[':p' . $index++]  = 'ro_r';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PCRRY_L)) {
            $modifiedColumns[':p' . $index++]  = 'pcrry_l';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PCRRY_C)) {
            $modifiedColumns[':p' . $index++]  = 'pcrry_c';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PQUOTA)) {
            $modifiedColumns[':p' . $index++]  = 'pquota';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL_PV_LL)) {
            $modifiedColumns[':p' . $index++]  = 'total_pv_ll';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL_PV_RR)) {
            $modifiedColumns[':p' . $index++]  = 'total_pv_rr';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL_PV_L)) {
            $modifiedColumns[':p' . $index++]  = 'total_pv_l';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL_PV_R)) {
            $modifiedColumns[':p' . $index++]  = 'total_pv_r';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CARRY_L)) {
            $modifiedColumns[':p' . $index++]  = 'carry_l';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CARRY_C)) {
            $modifiedColumns[':p' . $index++]  = 'carry_c';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CARRY_R)) {
            $modifiedColumns[':p' . $index++]  = 'carry_r';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_QUOTA)) {
            $modifiedColumns[':p' . $index++]  = 'quota';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PERCER)) {
            $modifiedColumns[':p' . $index++]  = 'percer';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'tax';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTALAMT)) {
            $modifiedColumns[':p' . $index++]  = 'totalamt';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PAYDATE)) {
            $modifiedColumns[':p' . $index++]  = 'paydate';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_MPOS)) {
            $modifiedColumns[':p' . $index++]  = 'mpos';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PAIR_STOP)) {
            $modifiedColumns[':p' . $index++]  = 'pair_stop';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_POINT)) {
            $modifiedColumns[':p' . $index++]  = 'point';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_ADJUST)) {
            $modifiedColumns[':p' . $index++]  = 'adjust';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_BALANCE)) {
            $modifiedColumns[':p' . $index++]  = 'balance';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CYCLE_B)) {
            $modifiedColumns[':p' . $index++]  = 'cycle_b';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CRATE)) {
            $modifiedColumns[':p' . $index++]  = 'crate';
        }

        $sql = sprintf(
            'INSERT INTO ali_bmbonus (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'cid':
                        $stmt->bindValue($identifier, $this->cid, PDO::PARAM_INT);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'ro_l':
                        $stmt->bindValue($identifier, $this->ro_l, PDO::PARAM_STR);
                        break;
                    case 'ro_c':
                        $stmt->bindValue($identifier, $this->ro_c, PDO::PARAM_STR);
                        break;
                    case 'ro_r':
                        $stmt->bindValue($identifier, $this->ro_r, PDO::PARAM_STR);
                        break;
                    case 'pcrry_l':
                        $stmt->bindValue($identifier, $this->pcrry_l, PDO::PARAM_STR);
                        break;
                    case 'pcrry_c':
                        $stmt->bindValue($identifier, $this->pcrry_c, PDO::PARAM_STR);
                        break;
                    case 'pquota':
                        $stmt->bindValue($identifier, $this->pquota, PDO::PARAM_STR);
                        break;
                    case 'total_pv_ll':
                        $stmt->bindValue($identifier, $this->total_pv_ll, PDO::PARAM_STR);
                        break;
                    case 'total_pv_rr':
                        $stmt->bindValue($identifier, $this->total_pv_rr, PDO::PARAM_STR);
                        break;
                    case 'total_pv_l':
                        $stmt->bindValue($identifier, $this->total_pv_l, PDO::PARAM_STR);
                        break;
                    case 'total_pv_r':
                        $stmt->bindValue($identifier, $this->total_pv_r, PDO::PARAM_STR);
                        break;
                    case 'carry_l':
                        $stmt->bindValue($identifier, $this->carry_l, PDO::PARAM_STR);
                        break;
                    case 'carry_c':
                        $stmt->bindValue($identifier, $this->carry_c, PDO::PARAM_INT);
                        break;
                    case 'carry_r':
                        $stmt->bindValue($identifier, $this->carry_r, PDO::PARAM_INT);
                        break;
                    case 'quota':
                        $stmt->bindValue($identifier, $this->quota, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'percer':
                        $stmt->bindValue($identifier, $this->percer, PDO::PARAM_STR);
                        break;
                    case 'tax':
                        $stmt->bindValue($identifier, $this->tax, PDO::PARAM_STR);
                        break;
                    case 'totalamt':
                        $stmt->bindValue($identifier, $this->totalamt, PDO::PARAM_STR);
                        break;
                    case 'paydate':
                        $stmt->bindValue($identifier, $this->paydate ? $this->paydate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'mpos':
                        $stmt->bindValue($identifier, $this->mpos, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pair_stop':
                        $stmt->bindValue($identifier, $this->pair_stop, PDO::PARAM_STR);
                        break;
                    case 'point':
                        $stmt->bindValue($identifier, $this->point, PDO::PARAM_INT);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'adjust':
                        $stmt->bindValue($identifier, $this->adjust, PDO::PARAM_STR);
                        break;
                    case 'balance':
                        $stmt->bindValue($identifier, $this->balance, PDO::PARAM_STR);
                        break;
                    case 'cycle_b':
                        $stmt->bindValue($identifier, $this->cycle_b, PDO::PARAM_INT);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'crate':
                        $stmt->bindValue($identifier, $this->crate, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setCid($pk);

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
        $pos = AliBmbonusTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCid();
                break;
            case 1:
                return $this->getRcode();
                break;
            case 2:
                return $this->getMcode();
                break;
            case 3:
                return $this->getNameT();
                break;
            case 4:
                return $this->getRoL();
                break;
            case 5:
                return $this->getRoC();
                break;
            case 6:
                return $this->getRoR();
                break;
            case 7:
                return $this->getPcrryL();
                break;
            case 8:
                return $this->getPcrryC();
                break;
            case 9:
                return $this->getPquota();
                break;
            case 10:
                return $this->getTotalPvLl();
                break;
            case 11:
                return $this->getTotalPvRr();
                break;
            case 12:
                return $this->getTotalPvL();
                break;
            case 13:
                return $this->getTotalPvR();
                break;
            case 14:
                return $this->getCarryL();
                break;
            case 15:
                return $this->getCarryC();
                break;
            case 16:
                return $this->getCarryR();
                break;
            case 17:
                return $this->getQuota();
                break;
            case 18:
                return $this->getTotal();
                break;
            case 19:
                return $this->getPercer();
                break;
            case 20:
                return $this->getTax();
                break;
            case 21:
                return $this->getTotalamt();
                break;
            case 22:
                return $this->getPaydate();
                break;
            case 23:
                return $this->getMpos();
                break;
            case 24:
                return $this->getTdate();
                break;
            case 25:
                return $this->getFdate();
                break;
            case 26:
                return $this->getPairStop();
                break;
            case 27:
                return $this->getPoint();
                break;
            case 28:
                return $this->getStatus();
                break;
            case 29:
                return $this->getAdjust();
                break;
            case 30:
                return $this->getBalance();
                break;
            case 31:
                return $this->getCycleB();
                break;
            case 32:
                return $this->getLocationbase();
                break;
            case 33:
                return $this->getCrate();
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

        if (isset($alreadyDumpedObjects['AliBmbonus'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliBmbonus'][$this->hashCode()] = true;
        $keys = AliBmbonusTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCid(),
            $keys[1] => $this->getRcode(),
            $keys[2] => $this->getMcode(),
            $keys[3] => $this->getNameT(),
            $keys[4] => $this->getRoL(),
            $keys[5] => $this->getRoC(),
            $keys[6] => $this->getRoR(),
            $keys[7] => $this->getPcrryL(),
            $keys[8] => $this->getPcrryC(),
            $keys[9] => $this->getPquota(),
            $keys[10] => $this->getTotalPvLl(),
            $keys[11] => $this->getTotalPvRr(),
            $keys[12] => $this->getTotalPvL(),
            $keys[13] => $this->getTotalPvR(),
            $keys[14] => $this->getCarryL(),
            $keys[15] => $this->getCarryC(),
            $keys[16] => $this->getCarryR(),
            $keys[17] => $this->getQuota(),
            $keys[18] => $this->getTotal(),
            $keys[19] => $this->getPercer(),
            $keys[20] => $this->getTax(),
            $keys[21] => $this->getTotalamt(),
            $keys[22] => $this->getPaydate(),
            $keys[23] => $this->getMpos(),
            $keys[24] => $this->getTdate(),
            $keys[25] => $this->getFdate(),
            $keys[26] => $this->getPairStop(),
            $keys[27] => $this->getPoint(),
            $keys[28] => $this->getStatus(),
            $keys[29] => $this->getAdjust(),
            $keys[30] => $this->getBalance(),
            $keys[31] => $this->getCycleB(),
            $keys[32] => $this->getLocationbase(),
            $keys[33] => $this->getCrate(),
        );
        if ($result[$keys[22]] instanceof \DateTimeInterface) {
            $result[$keys[22]] = $result[$keys[22]]->format('c');
        }

        if ($result[$keys[24]] instanceof \DateTimeInterface) {
            $result[$keys[24]] = $result[$keys[24]]->format('c');
        }

        if ($result[$keys[25]] instanceof \DateTimeInterface) {
            $result[$keys[25]] = $result[$keys[25]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliBmbonus
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliBmbonusTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliBmbonus
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCid($value);
                break;
            case 1:
                $this->setRcode($value);
                break;
            case 2:
                $this->setMcode($value);
                break;
            case 3:
                $this->setNameT($value);
                break;
            case 4:
                $this->setRoL($value);
                break;
            case 5:
                $this->setRoC($value);
                break;
            case 6:
                $this->setRoR($value);
                break;
            case 7:
                $this->setPcrryL($value);
                break;
            case 8:
                $this->setPcrryC($value);
                break;
            case 9:
                $this->setPquota($value);
                break;
            case 10:
                $this->setTotalPvLl($value);
                break;
            case 11:
                $this->setTotalPvRr($value);
                break;
            case 12:
                $this->setTotalPvL($value);
                break;
            case 13:
                $this->setTotalPvR($value);
                break;
            case 14:
                $this->setCarryL($value);
                break;
            case 15:
                $this->setCarryC($value);
                break;
            case 16:
                $this->setCarryR($value);
                break;
            case 17:
                $this->setQuota($value);
                break;
            case 18:
                $this->setTotal($value);
                break;
            case 19:
                $this->setPercer($value);
                break;
            case 20:
                $this->setTax($value);
                break;
            case 21:
                $this->setTotalamt($value);
                break;
            case 22:
                $this->setPaydate($value);
                break;
            case 23:
                $this->setMpos($value);
                break;
            case 24:
                $this->setTdate($value);
                break;
            case 25:
                $this->setFdate($value);
                break;
            case 26:
                $this->setPairStop($value);
                break;
            case 27:
                $this->setPoint($value);
                break;
            case 28:
                $this->setStatus($value);
                break;
            case 29:
                $this->setAdjust($value);
                break;
            case 30:
                $this->setBalance($value);
                break;
            case 31:
                $this->setCycleB($value);
                break;
            case 32:
                $this->setLocationbase($value);
                break;
            case 33:
                $this->setCrate($value);
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
        $keys = AliBmbonusTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setMcode($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNameT($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRoL($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setRoC($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRoR($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPcrryL($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPcrryC($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPquota($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTotalPvLl($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTotalPvRr($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTotalPvL($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTotalPvR($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCarryL($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCarryC($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCarryR($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setQuota($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTotal($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPercer($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setTax($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setTotalamt($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setPaydate($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setMpos($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setTdate($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setFdate($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setPairStop($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setPoint($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setStatus($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setAdjust($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setBalance($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setCycleB($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setLocationbase($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setCrate($arr[$keys[33]]);
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
     * @return $this|\CciOrm\CciOrm\AliBmbonus The current object, for fluid interface
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
        $criteria = new Criteria(AliBmbonusTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliBmbonusTableMap::COL_CID)) {
            $criteria->add(AliBmbonusTableMap::COL_CID, $this->cid);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_RCODE)) {
            $criteria->add(AliBmbonusTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_MCODE)) {
            $criteria->add(AliBmbonusTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_NAME_T)) {
            $criteria->add(AliBmbonusTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_RO_L)) {
            $criteria->add(AliBmbonusTableMap::COL_RO_L, $this->ro_l);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_RO_C)) {
            $criteria->add(AliBmbonusTableMap::COL_RO_C, $this->ro_c);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_RO_R)) {
            $criteria->add(AliBmbonusTableMap::COL_RO_R, $this->ro_r);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PCRRY_L)) {
            $criteria->add(AliBmbonusTableMap::COL_PCRRY_L, $this->pcrry_l);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PCRRY_C)) {
            $criteria->add(AliBmbonusTableMap::COL_PCRRY_C, $this->pcrry_c);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PQUOTA)) {
            $criteria->add(AliBmbonusTableMap::COL_PQUOTA, $this->pquota);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL_PV_LL)) {
            $criteria->add(AliBmbonusTableMap::COL_TOTAL_PV_LL, $this->total_pv_ll);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL_PV_RR)) {
            $criteria->add(AliBmbonusTableMap::COL_TOTAL_PV_RR, $this->total_pv_rr);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL_PV_L)) {
            $criteria->add(AliBmbonusTableMap::COL_TOTAL_PV_L, $this->total_pv_l);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL_PV_R)) {
            $criteria->add(AliBmbonusTableMap::COL_TOTAL_PV_R, $this->total_pv_r);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CARRY_L)) {
            $criteria->add(AliBmbonusTableMap::COL_CARRY_L, $this->carry_l);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CARRY_C)) {
            $criteria->add(AliBmbonusTableMap::COL_CARRY_C, $this->carry_c);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CARRY_R)) {
            $criteria->add(AliBmbonusTableMap::COL_CARRY_R, $this->carry_r);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_QUOTA)) {
            $criteria->add(AliBmbonusTableMap::COL_QUOTA, $this->quota);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTAL)) {
            $criteria->add(AliBmbonusTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PERCER)) {
            $criteria->add(AliBmbonusTableMap::COL_PERCER, $this->percer);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TAX)) {
            $criteria->add(AliBmbonusTableMap::COL_TAX, $this->tax);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TOTALAMT)) {
            $criteria->add(AliBmbonusTableMap::COL_TOTALAMT, $this->totalamt);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PAYDATE)) {
            $criteria->add(AliBmbonusTableMap::COL_PAYDATE, $this->paydate);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_MPOS)) {
            $criteria->add(AliBmbonusTableMap::COL_MPOS, $this->mpos);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_TDATE)) {
            $criteria->add(AliBmbonusTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_FDATE)) {
            $criteria->add(AliBmbonusTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_PAIR_STOP)) {
            $criteria->add(AliBmbonusTableMap::COL_PAIR_STOP, $this->pair_stop);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_POINT)) {
            $criteria->add(AliBmbonusTableMap::COL_POINT, $this->point);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_STATUS)) {
            $criteria->add(AliBmbonusTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_ADJUST)) {
            $criteria->add(AliBmbonusTableMap::COL_ADJUST, $this->adjust);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_BALANCE)) {
            $criteria->add(AliBmbonusTableMap::COL_BALANCE, $this->balance);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CYCLE_B)) {
            $criteria->add(AliBmbonusTableMap::COL_CYCLE_B, $this->cycle_b);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliBmbonusTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliBmbonusTableMap::COL_CRATE)) {
            $criteria->add(AliBmbonusTableMap::COL_CRATE, $this->crate);
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
        $criteria = ChildAliBmbonusQuery::create();
        $criteria->add(AliBmbonusTableMap::COL_CID, $this->cid);

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
        $validPk = null !== $this->getCid();

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
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getCid();
    }

    /**
     * Generic method to set the primary key (cid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getCid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliBmbonus (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRcode($this->getRcode());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setRoL($this->getRoL());
        $copyObj->setRoC($this->getRoC());
        $copyObj->setRoR($this->getRoR());
        $copyObj->setPcrryL($this->getPcrryL());
        $copyObj->setPcrryC($this->getPcrryC());
        $copyObj->setPquota($this->getPquota());
        $copyObj->setTotalPvLl($this->getTotalPvLl());
        $copyObj->setTotalPvRr($this->getTotalPvRr());
        $copyObj->setTotalPvL($this->getTotalPvL());
        $copyObj->setTotalPvR($this->getTotalPvR());
        $copyObj->setCarryL($this->getCarryL());
        $copyObj->setCarryC($this->getCarryC());
        $copyObj->setCarryR($this->getCarryR());
        $copyObj->setQuota($this->getQuota());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setPercer($this->getPercer());
        $copyObj->setTax($this->getTax());
        $copyObj->setTotalamt($this->getTotalamt());
        $copyObj->setPaydate($this->getPaydate());
        $copyObj->setMpos($this->getMpos());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setPairStop($this->getPairStop());
        $copyObj->setPoint($this->getPoint());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setAdjust($this->getAdjust());
        $copyObj->setBalance($this->getBalance());
        $copyObj->setCycleB($this->getCycleB());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setCrate($this->getCrate());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \CciOrm\CciOrm\AliBmbonus Clone of current object.
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
        $this->cid = null;
        $this->rcode = null;
        $this->mcode = null;
        $this->name_t = null;
        $this->ro_l = null;
        $this->ro_c = null;
        $this->ro_r = null;
        $this->pcrry_l = null;
        $this->pcrry_c = null;
        $this->pquota = null;
        $this->total_pv_ll = null;
        $this->total_pv_rr = null;
        $this->total_pv_l = null;
        $this->total_pv_r = null;
        $this->carry_l = null;
        $this->carry_c = null;
        $this->carry_r = null;
        $this->quota = null;
        $this->total = null;
        $this->percer = null;
        $this->tax = null;
        $this->totalamt = null;
        $this->paydate = null;
        $this->mpos = null;
        $this->tdate = null;
        $this->fdate = null;
        $this->pair_stop = null;
        $this->point = null;
        $this->status = null;
        $this->adjust = null;
        $this->balance = null;
        $this->cycle_b = null;
        $this->locationbase = null;
        $this->crate = null;
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
        return (string) $this->exportTo(AliBmbonusTableMap::DEFAULT_STRING_FORMAT);
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
