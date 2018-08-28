<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLogChangeQuery as ChildAliLogChangeQuery;
use CciOrm\CciOrm\Map\AliLogChangeTableMap;
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
 * Base class that represents a row from the 'ali_log_change' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliLogChange implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliLogChangeTableMap';


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
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

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
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

    /**
     * The value for the mpos field.
     *
     * @var        string
     */
    protected $mpos;

    /**
     * The value for the status field.
     *
     * @var        string
     */
    protected $status;

    /**
     * The value for the pvb field.
     *
     * @var        string
     */
    protected $pvb;

    /**
     * The value for the pvh field.
     *
     * @var        string
     */
    protected $pvh;

    /**
     * The value for the fob field.
     *
     * @var        string
     */
    protected $fob;

    /**
     * The value for the cycle field.
     *
     * @var        string
     */
    protected $cycle;

    /**
     * The value for the ambonus2 field.
     *
     * @var        string
     */
    protected $ambonus2;

    /**
     * The value for the fmbonus field.
     *
     * @var        string
     */
    protected $fmbonus;

    /**
     * The value for the unilevel field.
     *
     * @var        string
     */
    protected $unilevel;

    /**
     * The value for the adjust field.
     *
     * @var        string
     */
    protected $adjust;

    /**
     * The value for the autoship field.
     *
     * @var        string
     */
    protected $autoship;

    /**
     * The value for the ewallet_withdraw field.
     *
     * @var        string
     */
    protected $ewallet_withdraw;

    /**
     * The value for the tot_tax field.
     *
     * @var        string
     */
    protected $tot_tax;

    /**
     * The value for the pv field.
     *
     * @var        int
     */
    protected $pv;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the paydate field.
     *
     * @var        DateTime
     */
    protected $paydate;

    /**
     * The value for the date_change field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $date_change;

    /**
     * The value for the com_transfer_chagre field.
     *
     * @var        int
     */
    protected $com_transfer_chagre;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

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
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliLogChange object.
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
     * Compares this with another <code>AliLogChange</code> instance.  If
     * <code>obj</code> is an instance of <code>AliLogChange</code>, delegates to
     * <code>equals(AliLogChange)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliLogChange The current object, for fluid interface
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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * Get the [mcode] column value.
     *
     * @return string
     */
    public function getMcode()
    {
        return $this->mcode;
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
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [pvb] column value.
     *
     * @return string
     */
    public function getPvb()
    {
        return $this->pvb;
    }

    /**
     * Get the [pvh] column value.
     *
     * @return string
     */
    public function getPvh()
    {
        return $this->pvh;
    }

    /**
     * Get the [fob] column value.
     *
     * @return string
     */
    public function getFob()
    {
        return $this->fob;
    }

    /**
     * Get the [cycle] column value.
     *
     * @return string
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * Get the [ambonus2] column value.
     *
     * @return string
     */
    public function getAmbonus2()
    {
        return $this->ambonus2;
    }

    /**
     * Get the [fmbonus] column value.
     *
     * @return string
     */
    public function getFmbonus()
    {
        return $this->fmbonus;
    }

    /**
     * Get the [unilevel] column value.
     *
     * @return string
     */
    public function getUnilevel()
    {
        return $this->unilevel;
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
     * Get the [autoship] column value.
     *
     * @return string
     */
    public function getAutoship()
    {
        return $this->autoship;
    }

    /**
     * Get the [ewallet_withdraw] column value.
     *
     * @return string
     */
    public function getEwalletWithdraw()
    {
        return $this->ewallet_withdraw;
    }

    /**
     * Get the [tot_tax] column value.
     *
     * @return string
     */
    public function getTotTax()
    {
        return $this->tot_tax;
    }

    /**
     * Get the [pv] column value.
     *
     * @return int
     */
    public function getPv()
    {
        return $this->pv;
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
     * Get the [optionally formatted] temporal [date_change] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateChange($format = NULL)
    {
        if ($format === null) {
            return $this->date_change;
        } else {
            return $this->date_change instanceof \DateTimeInterface ? $this->date_change->format($format) : null;
        }
    }

    /**
     * Get the [com_transfer_chagre] column value.
     *
     * @return int
     */
    public function getComTransferChagre()
    {
        return $this->com_transfer_chagre;
    }

    /**
     * Get the [uid] column value.
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliLogChangeTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliLogChangeTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [mpos] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setMpos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mpos !== $v) {
            $this->mpos = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_MPOS] = true;
        }

        return $this;
    } // setMpos()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [pvb] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setPvb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pvb !== $v) {
            $this->pvb = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_PVB] = true;
        }

        return $this;
    } // setPvb()

    /**
     * Set the value of [pvh] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setPvh($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pvh !== $v) {
            $this->pvh = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_PVH] = true;
        }

        return $this;
    } // setPvh()

    /**
     * Set the value of [fob] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setFob($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fob !== $v) {
            $this->fob = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_FOB] = true;
        }

        return $this;
    } // setFob()

    /**
     * Set the value of [cycle] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setCycle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cycle !== $v) {
            $this->cycle = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_CYCLE] = true;
        }

        return $this;
    } // setCycle()

    /**
     * Set the value of [ambonus2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setAmbonus2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ambonus2 !== $v) {
            $this->ambonus2 = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_AMBONUS2] = true;
        }

        return $this;
    } // setAmbonus2()

    /**
     * Set the value of [fmbonus] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setFmbonus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fmbonus !== $v) {
            $this->fmbonus = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_FMBONUS] = true;
        }

        return $this;
    } // setFmbonus()

    /**
     * Set the value of [unilevel] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setUnilevel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unilevel !== $v) {
            $this->unilevel = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_UNILEVEL] = true;
        }

        return $this;
    } // setUnilevel()

    /**
     * Set the value of [adjust] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setAdjust($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adjust !== $v) {
            $this->adjust = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_ADJUST] = true;
        }

        return $this;
    } // setAdjust()

    /**
     * Set the value of [autoship] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setAutoship($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->autoship !== $v) {
            $this->autoship = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_AUTOSHIP] = true;
        }

        return $this;
    } // setAutoship()

    /**
     * Set the value of [ewallet_withdraw] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setEwalletWithdraw($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_withdraw !== $v) {
            $this->ewallet_withdraw = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_EWALLET_WITHDRAW] = true;
        }

        return $this;
    } // setEwalletWithdraw()

    /**
     * Set the value of [tot_tax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setTotTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_tax !== $v) {
            $this->tot_tax = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_TOT_TAX] = true;
        }

        return $this;
    } // setTotTax()

    /**
     * Set the value of [pv] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setPv($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pv !== $v) {
            $this->pv = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_PV] = true;
        }

        return $this;
    } // setPv()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Sets the value of [paydate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setPaydate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->paydate !== null || $dt !== null) {
            if ($this->paydate === null || $dt === null || $dt->format("Y-m-d") !== $this->paydate->format("Y-m-d")) {
                $this->paydate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliLogChangeTableMap::COL_PAYDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setPaydate()

    /**
     * Sets the value of [date_change] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setDateChange($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_change !== null || $dt !== null) {
            if ($this->date_change === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_change->format("Y-m-d H:i:s.u")) {
                $this->date_change = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliLogChangeTableMap::COL_DATE_CHANGE] = true;
            }
        } // if either are not null

        return $this;
    } // setDateChange()

    /**
     * Set the value of [com_transfer_chagre] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setComTransferChagre($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->com_transfer_chagre !== $v) {
            $this->com_transfer_chagre = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE] = true;
        }

        return $this;
    } // setComTransferChagre()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliLogChangeTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliLogChangeTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliLogChangeTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliLogChangeTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliLogChangeTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliLogChangeTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliLogChangeTableMap::translateFieldName('Mpos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mpos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliLogChangeTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliLogChangeTableMap::translateFieldName('Pvb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pvb = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliLogChangeTableMap::translateFieldName('Pvh', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pvh = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliLogChangeTableMap::translateFieldName('Fob', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fob = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliLogChangeTableMap::translateFieldName('Cycle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cycle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliLogChangeTableMap::translateFieldName('Ambonus2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ambonus2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliLogChangeTableMap::translateFieldName('Fmbonus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fmbonus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliLogChangeTableMap::translateFieldName('Unilevel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unilevel = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliLogChangeTableMap::translateFieldName('Adjust', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adjust = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliLogChangeTableMap::translateFieldName('Autoship', TableMap::TYPE_PHPNAME, $indexType)];
            $this->autoship = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliLogChangeTableMap::translateFieldName('EwalletWithdraw', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_withdraw = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliLogChangeTableMap::translateFieldName('TotTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliLogChangeTableMap::translateFieldName('Pv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pv = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliLogChangeTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliLogChangeTableMap::translateFieldName('Paydate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->paydate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliLogChangeTableMap::translateFieldName('DateChange', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_change = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliLogChangeTableMap::translateFieldName('ComTransferChagre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->com_transfer_chagre = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliLogChangeTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 24; // 24 = AliLogChangeTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliLogChange'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliLogChangeTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliLogChangeQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliLogChange::setDeleted()
     * @see AliLogChange::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogChangeTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliLogChangeQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogChangeTableMap::DATABASE_NAME);
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
                AliLogChangeTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliLogChangeTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliLogChangeTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliLogChangeTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_MPOS)) {
            $modifiedColumns[':p' . $index++]  = 'mpos';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_PVB)) {
            $modifiedColumns[':p' . $index++]  = 'pvb';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_PVH)) {
            $modifiedColumns[':p' . $index++]  = 'pvh';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_FOB)) {
            $modifiedColumns[':p' . $index++]  = 'fob';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_CYCLE)) {
            $modifiedColumns[':p' . $index++]  = 'cycle';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_AMBONUS2)) {
            $modifiedColumns[':p' . $index++]  = 'ambonus2';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_FMBONUS)) {
            $modifiedColumns[':p' . $index++]  = 'fmbonus';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_UNILEVEL)) {
            $modifiedColumns[':p' . $index++]  = 'unilevel';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_ADJUST)) {
            $modifiedColumns[':p' . $index++]  = 'adjust';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_AUTOSHIP)) {
            $modifiedColumns[':p' . $index++]  = 'autoship';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_EWALLET_WITHDRAW)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_withdraw';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_TOT_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'tot_tax';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_PV)) {
            $modifiedColumns[':p' . $index++]  = 'pv';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_PAYDATE)) {
            $modifiedColumns[':p' . $index++]  = 'paydate';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_DATE_CHANGE)) {
            $modifiedColumns[':p' . $index++]  = 'date_change';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE)) {
            $modifiedColumns[':p' . $index++]  = 'com_transfer_chagre';
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }

        $sql = sprintf(
            'INSERT INTO ali_log_change (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'mpos':
                        $stmt->bindValue($identifier, $this->mpos, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'pvb':
                        $stmt->bindValue($identifier, $this->pvb, PDO::PARAM_STR);
                        break;
                    case 'pvh':
                        $stmt->bindValue($identifier, $this->pvh, PDO::PARAM_STR);
                        break;
                    case 'fob':
                        $stmt->bindValue($identifier, $this->fob, PDO::PARAM_STR);
                        break;
                    case 'cycle':
                        $stmt->bindValue($identifier, $this->cycle, PDO::PARAM_STR);
                        break;
                    case 'ambonus2':
                        $stmt->bindValue($identifier, $this->ambonus2, PDO::PARAM_STR);
                        break;
                    case 'fmbonus':
                        $stmt->bindValue($identifier, $this->fmbonus, PDO::PARAM_STR);
                        break;
                    case 'unilevel':
                        $stmt->bindValue($identifier, $this->unilevel, PDO::PARAM_STR);
                        break;
                    case 'adjust':
                        $stmt->bindValue($identifier, $this->adjust, PDO::PARAM_STR);
                        break;
                    case 'autoship':
                        $stmt->bindValue($identifier, $this->autoship, PDO::PARAM_STR);
                        break;
                    case 'ewallet_withdraw':
                        $stmt->bindValue($identifier, $this->ewallet_withdraw, PDO::PARAM_STR);
                        break;
                    case 'tot_tax':
                        $stmt->bindValue($identifier, $this->tot_tax, PDO::PARAM_STR);
                        break;
                    case 'pv':
                        $stmt->bindValue($identifier, $this->pv, PDO::PARAM_INT);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'paydate':
                        $stmt->bindValue($identifier, $this->paydate ? $this->paydate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'date_change':
                        $stmt->bindValue($identifier, $this->date_change ? $this->date_change->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'com_transfer_chagre':
                        $stmt->bindValue($identifier, $this->com_transfer_chagre, PDO::PARAM_INT);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
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
        $this->setId($pk);

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
        $pos = AliLogChangeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getId();
                break;
            case 1:
                return $this->getRcode();
                break;
            case 2:
                return $this->getFdate();
                break;
            case 3:
                return $this->getTdate();
                break;
            case 4:
                return $this->getMcode();
                break;
            case 5:
                return $this->getMpos();
                break;
            case 6:
                return $this->getStatus();
                break;
            case 7:
                return $this->getPvb();
                break;
            case 8:
                return $this->getPvh();
                break;
            case 9:
                return $this->getFob();
                break;
            case 10:
                return $this->getCycle();
                break;
            case 11:
                return $this->getAmbonus2();
                break;
            case 12:
                return $this->getFmbonus();
                break;
            case 13:
                return $this->getUnilevel();
                break;
            case 14:
                return $this->getAdjust();
                break;
            case 15:
                return $this->getAutoship();
                break;
            case 16:
                return $this->getEwalletWithdraw();
                break;
            case 17:
                return $this->getTotTax();
                break;
            case 18:
                return $this->getPv();
                break;
            case 19:
                return $this->getTotal();
                break;
            case 20:
                return $this->getPaydate();
                break;
            case 21:
                return $this->getDateChange();
                break;
            case 22:
                return $this->getComTransferChagre();
                break;
            case 23:
                return $this->getUid();
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

        if (isset($alreadyDumpedObjects['AliLogChange'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliLogChange'][$this->hashCode()] = true;
        $keys = AliLogChangeTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getRcode(),
            $keys[2] => $this->getFdate(),
            $keys[3] => $this->getTdate(),
            $keys[4] => $this->getMcode(),
            $keys[5] => $this->getMpos(),
            $keys[6] => $this->getStatus(),
            $keys[7] => $this->getPvb(),
            $keys[8] => $this->getPvh(),
            $keys[9] => $this->getFob(),
            $keys[10] => $this->getCycle(),
            $keys[11] => $this->getAmbonus2(),
            $keys[12] => $this->getFmbonus(),
            $keys[13] => $this->getUnilevel(),
            $keys[14] => $this->getAdjust(),
            $keys[15] => $this->getAutoship(),
            $keys[16] => $this->getEwalletWithdraw(),
            $keys[17] => $this->getTotTax(),
            $keys[18] => $this->getPv(),
            $keys[19] => $this->getTotal(),
            $keys[20] => $this->getPaydate(),
            $keys[21] => $this->getDateChange(),
            $keys[22] => $this->getComTransferChagre(),
            $keys[23] => $this->getUid(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
        }

        if ($result[$keys[21]] instanceof \DateTimeInterface) {
            $result[$keys[21]] = $result[$keys[21]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliLogChange
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliLogChangeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliLogChange
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setRcode($value);
                break;
            case 2:
                $this->setFdate($value);
                break;
            case 3:
                $this->setTdate($value);
                break;
            case 4:
                $this->setMcode($value);
                break;
            case 5:
                $this->setMpos($value);
                break;
            case 6:
                $this->setStatus($value);
                break;
            case 7:
                $this->setPvb($value);
                break;
            case 8:
                $this->setPvh($value);
                break;
            case 9:
                $this->setFob($value);
                break;
            case 10:
                $this->setCycle($value);
                break;
            case 11:
                $this->setAmbonus2($value);
                break;
            case 12:
                $this->setFmbonus($value);
                break;
            case 13:
                $this->setUnilevel($value);
                break;
            case 14:
                $this->setAdjust($value);
                break;
            case 15:
                $this->setAutoship($value);
                break;
            case 16:
                $this->setEwalletWithdraw($value);
                break;
            case 17:
                $this->setTotTax($value);
                break;
            case 18:
                $this->setPv($value);
                break;
            case 19:
                $this->setTotal($value);
                break;
            case 20:
                $this->setPaydate($value);
                break;
            case 21:
                $this->setDateChange($value);
                break;
            case 22:
                $this->setComTransferChagre($value);
                break;
            case 23:
                $this->setUid($value);
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
        $keys = AliLogChangeTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFdate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTdate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setMcode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMpos($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setStatus($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPvb($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPvh($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setFob($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCycle($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setAmbonus2($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setFmbonus($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setUnilevel($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAdjust($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setAutoship($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setEwalletWithdraw($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setTotTax($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPv($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setTotal($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setPaydate($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setDateChange($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setComTransferChagre($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setUid($arr[$keys[23]]);
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
     * @return $this|\CciOrm\CciOrm\AliLogChange The current object, for fluid interface
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
        $criteria = new Criteria(AliLogChangeTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliLogChangeTableMap::COL_ID)) {
            $criteria->add(AliLogChangeTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_RCODE)) {
            $criteria->add(AliLogChangeTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_FDATE)) {
            $criteria->add(AliLogChangeTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_TDATE)) {
            $criteria->add(AliLogChangeTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_MCODE)) {
            $criteria->add(AliLogChangeTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_MPOS)) {
            $criteria->add(AliLogChangeTableMap::COL_MPOS, $this->mpos);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_STATUS)) {
            $criteria->add(AliLogChangeTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_PVB)) {
            $criteria->add(AliLogChangeTableMap::COL_PVB, $this->pvb);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_PVH)) {
            $criteria->add(AliLogChangeTableMap::COL_PVH, $this->pvh);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_FOB)) {
            $criteria->add(AliLogChangeTableMap::COL_FOB, $this->fob);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_CYCLE)) {
            $criteria->add(AliLogChangeTableMap::COL_CYCLE, $this->cycle);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_AMBONUS2)) {
            $criteria->add(AliLogChangeTableMap::COL_AMBONUS2, $this->ambonus2);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_FMBONUS)) {
            $criteria->add(AliLogChangeTableMap::COL_FMBONUS, $this->fmbonus);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_UNILEVEL)) {
            $criteria->add(AliLogChangeTableMap::COL_UNILEVEL, $this->unilevel);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_ADJUST)) {
            $criteria->add(AliLogChangeTableMap::COL_ADJUST, $this->adjust);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_AUTOSHIP)) {
            $criteria->add(AliLogChangeTableMap::COL_AUTOSHIP, $this->autoship);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_EWALLET_WITHDRAW)) {
            $criteria->add(AliLogChangeTableMap::COL_EWALLET_WITHDRAW, $this->ewallet_withdraw);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_TOT_TAX)) {
            $criteria->add(AliLogChangeTableMap::COL_TOT_TAX, $this->tot_tax);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_PV)) {
            $criteria->add(AliLogChangeTableMap::COL_PV, $this->pv);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_TOTAL)) {
            $criteria->add(AliLogChangeTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_PAYDATE)) {
            $criteria->add(AliLogChangeTableMap::COL_PAYDATE, $this->paydate);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_DATE_CHANGE)) {
            $criteria->add(AliLogChangeTableMap::COL_DATE_CHANGE, $this->date_change);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE)) {
            $criteria->add(AliLogChangeTableMap::COL_COM_TRANSFER_CHAGRE, $this->com_transfer_chagre);
        }
        if ($this->isColumnModified(AliLogChangeTableMap::COL_UID)) {
            $criteria->add(AliLogChangeTableMap::COL_UID, $this->uid);
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
        $criteria = ChildAliLogChangeQuery::create();
        $criteria->add(AliLogChangeTableMap::COL_ID, $this->id);

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
        $validPk = null !== $this->getId();

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
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliLogChange (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRcode($this->getRcode());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setMpos($this->getMpos());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setPvb($this->getPvb());
        $copyObj->setPvh($this->getPvh());
        $copyObj->setFob($this->getFob());
        $copyObj->setCycle($this->getCycle());
        $copyObj->setAmbonus2($this->getAmbonus2());
        $copyObj->setFmbonus($this->getFmbonus());
        $copyObj->setUnilevel($this->getUnilevel());
        $copyObj->setAdjust($this->getAdjust());
        $copyObj->setAutoship($this->getAutoship());
        $copyObj->setEwalletWithdraw($this->getEwalletWithdraw());
        $copyObj->setTotTax($this->getTotTax());
        $copyObj->setPv($this->getPv());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setPaydate($this->getPaydate());
        $copyObj->setDateChange($this->getDateChange());
        $copyObj->setComTransferChagre($this->getComTransferChagre());
        $copyObj->setUid($this->getUid());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \CciOrm\CciOrm\AliLogChange Clone of current object.
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
        $this->id = null;
        $this->rcode = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->mcode = null;
        $this->mpos = null;
        $this->status = null;
        $this->pvb = null;
        $this->pvh = null;
        $this->fob = null;
        $this->cycle = null;
        $this->ambonus2 = null;
        $this->fmbonus = null;
        $this->unilevel = null;
        $this->adjust = null;
        $this->autoship = null;
        $this->ewallet_withdraw = null;
        $this->tot_tax = null;
        $this->pv = null;
        $this->total = null;
        $this->paydate = null;
        $this->date_change = null;
        $this->com_transfer_chagre = null;
        $this->uid = null;
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
        return (string) $this->exportTo(AliLogChangeTableMap::DEFAULT_STRING_FORMAT);
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
