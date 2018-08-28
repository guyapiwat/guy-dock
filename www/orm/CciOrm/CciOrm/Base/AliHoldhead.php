<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliHoldheadQuery as ChildAliHoldheadQuery;
use CciOrm\CciOrm\Map\AliHoldheadTableMap;
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
 * Base class that represents a row from the 'ali_holdhead' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliHoldhead implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliHoldheadTableMap';


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
     * The value for the hono field.
     *
     * @var        int
     */
    protected $hono;

    /**
     * The value for the sano field.
     *
     * @var        int
     */
    protected $sano;

    /**
     * The value for the sadate field.
     *
     * @var        DateTime
     */
    protected $sadate;

    /**
     * The value for the sctime field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $sctime;

    /**
     * The value for the sa_type field.
     *
     * @var        string
     */
    protected $sa_type;

    /**
     * The value for the inv_code field.
     *
     * @var        string
     */
    protected $inv_code;

    /**
     * The value for the inv_code_to field.
     *
     * @var        string
     */
    protected $inv_code_to;

    /**
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the tot_pv field.
     *
     * @var        string
     */
    protected $tot_pv;

    /**
     * The value for the tot_bv field.
     *
     * @var        string
     */
    protected $tot_bv;

    /**
     * The value for the tot_sppv field.
     *
     * @var        string
     */
    protected $tot_sppv;

    /**
     * The value for the tot_fv field.
     *
     * @var        string
     */
    protected $tot_fv;

    /**
     * The value for the trnf field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $trnf;

    /**
     * The value for the cancel field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $cancel;

    /**
     * The value for the remark field.
     *
     * @var        string
     */
    protected $remark;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * The value for the dl field.
     *
     * @var        string
     */
    protected $dl;

    /**
     * The value for the print field.
     *
     * @var        int
     */
    protected $print;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

    /**
     * The value for the status field.
     *
     * @var        int
     */
    protected $status;

    /**
     * The value for the bmcauto field.
     *
     * @var        int
     */
    protected $bmcauto;

    /**
     * The value for the cancel_date field.
     *
     * @var        DateTime
     */
    protected $cancel_date;

    /**
     * The value for the uid_cancel field.
     *
     * @var        string
     */
    protected $uid_cancel;

    /**
     * The value for the mbase field.
     *
     * @var        string
     */
    protected $mbase;

    /**
     * The value for the bprice field.
     *
     * @var        string
     */
    protected $bprice;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the name_f field.
     *
     * @var        string
     */
    protected $name_f;

    /**
     * The value for the name_t field.
     *
     * @var        string
     */
    protected $name_t;

    /**
     * The value for the crate field.
     *
     * @var        string
     */
    protected $crate;

    /**
     * The value for the sp_code field.
     *
     * @var        string
     */
    protected $sp_code;

    /**
     * The value for the sp_pos field.
     *
     * @var        string
     */
    protected $sp_pos;

    /**
     * The value for the ref field.
     *
     * @var        string
     */
    protected $ref;

    /**
     * The value for the status_package field.
     *
     * @var        int
     */
    protected $status_package;

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
        $this->trnf = 0;
        $this->cancel = '0';
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliHoldhead object.
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
     * Compares this with another <code>AliHoldhead</code> instance.  If
     * <code>obj</code> is an instance of <code>AliHoldhead</code>, delegates to
     * <code>equals(AliHoldhead)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliHoldhead The current object, for fluid interface
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
     * Get the [hono] column value.
     *
     * @return int
     */
    public function getHono()
    {
        return $this->hono;
    }

    /**
     * Get the [sano] column value.
     *
     * @return int
     */
    public function getSano()
    {
        return $this->sano;
    }

    /**
     * Get the [optionally formatted] temporal [sadate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSadate($format = NULL)
    {
        if ($format === null) {
            return $this->sadate;
        } else {
            return $this->sadate instanceof \DateTimeInterface ? $this->sadate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [sctime] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSctime($format = NULL)
    {
        if ($format === null) {
            return $this->sctime;
        } else {
            return $this->sctime instanceof \DateTimeInterface ? $this->sctime->format($format) : null;
        }
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
     * Get the [inv_code] column value.
     *
     * @return string
     */
    public function getInvCode()
    {
        return $this->inv_code;
    }

    /**
     * Get the [inv_code_to] column value.
     *
     * @return string
     */
    public function getInvCodeTo()
    {
        return $this->inv_code_to;
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
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [tot_pv] column value.
     *
     * @return string
     */
    public function getTotPv()
    {
        return $this->tot_pv;
    }

    /**
     * Get the [tot_bv] column value.
     *
     * @return string
     */
    public function getTotBv()
    {
        return $this->tot_bv;
    }

    /**
     * Get the [tot_sppv] column value.
     *
     * @return string
     */
    public function getTotSppv()
    {
        return $this->tot_sppv;
    }

    /**
     * Get the [tot_fv] column value.
     *
     * @return string
     */
    public function getTotFv()
    {
        return $this->tot_fv;
    }

    /**
     * Get the [trnf] column value.
     *
     * @return int
     */
    public function getTrnf()
    {
        return $this->trnf;
    }

    /**
     * Get the [cancel] column value.
     *
     * @return string
     */
    public function getCancel()
    {
        return $this->cancel;
    }

    /**
     * Get the [remark] column value.
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
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
     * Get the [dl] column value.
     *
     * @return string
     */
    public function getDl()
    {
        return $this->dl;
    }

    /**
     * Get the [print] column value.
     *
     * @return int
     */
    public function getPrint()
    {
        return $this->print;
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
     * Get the [status] column value.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [bmcauto] column value.
     *
     * @return int
     */
    public function getBmcauto()
    {
        return $this->bmcauto;
    }

    /**
     * Get the [optionally formatted] temporal [cancel_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCancelDate($format = NULL)
    {
        if ($format === null) {
            return $this->cancel_date;
        } else {
            return $this->cancel_date instanceof \DateTimeInterface ? $this->cancel_date->format($format) : null;
        }
    }

    /**
     * Get the [uid_cancel] column value.
     *
     * @return string
     */
    public function getUidCancel()
    {
        return $this->uid_cancel;
    }

    /**
     * Get the [mbase] column value.
     *
     * @return string
     */
    public function getMbase()
    {
        return $this->mbase;
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
     * Get the [locationbase] column value.
     *
     * @return int
     */
    public function getLocationbase()
    {
        return $this->locationbase;
    }

    /**
     * Get the [name_f] column value.
     *
     * @return string
     */
    public function getNameF()
    {
        return $this->name_f;
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
     * Get the [crate] column value.
     *
     * @return string
     */
    public function getCrate()
    {
        return $this->crate;
    }

    /**
     * Get the [sp_code] column value.
     *
     * @return string
     */
    public function getSpCode()
    {
        return $this->sp_code;
    }

    /**
     * Get the [sp_pos] column value.
     *
     * @return string
     */
    public function getSpPos()
    {
        return $this->sp_pos;
    }

    /**
     * Get the [ref] column value.
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Get the [status_package] column value.
     *
     * @return int
     */
    public function getStatusPackage()
    {
        return $this->status_package;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [hono] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setHono($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->hono !== $v) {
            $this->hono = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_HONO] = true;
        }

        return $this;
    } // setHono()

    /**
     * Set the value of [sano] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliHoldheadTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Sets the value of [sctime] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setSctime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sctime !== null || $dt !== null) {
            if ($this->sctime === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->sctime->format("Y-m-d H:i:s.u")) {
                $this->sctime = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliHoldheadTableMap::COL_SCTIME] = true;
            }
        } // if either are not null

        return $this;
    } // setSctime()

    /**
     * Set the value of [sa_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setSaType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sa_type !== $v) {
            $this->sa_type = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_SA_TYPE] = true;
        }

        return $this;
    } // setSaType()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [inv_code_to] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setInvCodeTo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code_to !== $v) {
            $this->inv_code_to = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_INV_CODE_TO] = true;
        }

        return $this;
    } // setInvCodeTo()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [tot_pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setTotPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_pv !== $v) {
            $this->tot_pv = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_TOT_PV] = true;
        }

        return $this;
    } // setTotPv()

    /**
     * Set the value of [tot_bv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setTotBv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_bv !== $v) {
            $this->tot_bv = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_TOT_BV] = true;
        }

        return $this;
    } // setTotBv()

    /**
     * Set the value of [tot_sppv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setTotSppv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_sppv !== $v) {
            $this->tot_sppv = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_TOT_SPPV] = true;
        }

        return $this;
    } // setTotSppv()

    /**
     * Set the value of [tot_fv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setTotFv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_fv !== $v) {
            $this->tot_fv = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_TOT_FV] = true;
        }

        return $this;
    } // setTotFv()

    /**
     * Set the value of [trnf] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setTrnf($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trnf !== $v) {
            $this->trnf = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_TRNF] = true;
        }

        return $this;
    } // setTrnf()

    /**
     * Set the value of [cancel] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setCancel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cancel !== $v) {
            $this->cancel = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_CANCEL] = true;
        }

        return $this;
    } // setCancel()

    /**
     * Set the value of [remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remark !== $v) {
            $this->remark = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_REMARK] = true;
        }

        return $this;
    } // setRemark()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [dl] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setDl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dl !== $v) {
            $this->dl = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_DL] = true;
        }

        return $this;
    } // setDl()

    /**
     * Set the value of [print] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setPrint($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->print !== $v) {
            $this->print = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_PRINT] = true;
        }

        return $this;
    } // setPrint()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [bmcauto] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setBmcauto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bmcauto !== $v) {
            $this->bmcauto = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_BMCAUTO] = true;
        }

        return $this;
    } // setBmcauto()

    /**
     * Sets the value of [cancel_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setCancelDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->cancel_date !== null || $dt !== null) {
            if ($this->cancel_date === null || $dt === null || $dt->format("Y-m-d") !== $this->cancel_date->format("Y-m-d")) {
                $this->cancel_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliHoldheadTableMap::COL_CANCEL_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCancelDate()

    /**
     * Set the value of [uid_cancel] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setUidCancel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid_cancel !== $v) {
            $this->uid_cancel = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_UID_CANCEL] = true;
        }

        return $this;
    } // setUidCancel()

    /**
     * Set the value of [mbase] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setMbase($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mbase !== $v) {
            $this->mbase = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_MBASE] = true;
        }

        return $this;
    } // setMbase()

    /**
     * Set the value of [bprice] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setBprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bprice !== $v) {
            $this->bprice = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_BPRICE] = true;
        }

        return $this;
    } // setBprice()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [name_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setNameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_f !== $v) {
            $this->name_f = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_NAME_F] = true;
        }

        return $this;
    } // setNameF()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [crate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setCrate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->crate !== $v) {
            $this->crate = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_CRATE] = true;
        }

        return $this;
    } // setCrate()

    /**
     * Set the value of [sp_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setSpCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_code !== $v) {
            $this->sp_code = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_SP_CODE] = true;
        }

        return $this;
    } // setSpCode()

    /**
     * Set the value of [sp_pos] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setSpPos($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_pos !== $v) {
            $this->sp_pos = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_SP_POS] = true;
        }

        return $this;
    } // setSpPos()

    /**
     * Set the value of [ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ref !== $v) {
            $this->ref = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_REF] = true;
        }

        return $this;
    } // setRef()

    /**
     * Set the value of [status_package] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object (for fluent API support)
     */
    public function setStatusPackage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status_package !== $v) {
            $this->status_package = $v;
            $this->modifiedColumns[AliHoldheadTableMap::COL_STATUS_PACKAGE] = true;
        }

        return $this;
    } // setStatusPackage()

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
            if ($this->trnf !== 0) {
                return false;
            }

            if ($this->cancel !== '0') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliHoldheadTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliHoldheadTableMap::translateFieldName('Hono', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hono = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliHoldheadTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliHoldheadTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliHoldheadTableMap::translateFieldName('Sctime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->sctime = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliHoldheadTableMap::translateFieldName('SaType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliHoldheadTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliHoldheadTableMap::translateFieldName('InvCodeTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code_to = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliHoldheadTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliHoldheadTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliHoldheadTableMap::translateFieldName('TotPv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliHoldheadTableMap::translateFieldName('TotBv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_bv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliHoldheadTableMap::translateFieldName('TotSppv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_sppv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliHoldheadTableMap::translateFieldName('TotFv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_fv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliHoldheadTableMap::translateFieldName('Trnf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trnf = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliHoldheadTableMap::translateFieldName('Cancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliHoldheadTableMap::translateFieldName('Remark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliHoldheadTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliHoldheadTableMap::translateFieldName('Dl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliHoldheadTableMap::translateFieldName('Print', TableMap::TYPE_PHPNAME, $indexType)];
            $this->print = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliHoldheadTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliHoldheadTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliHoldheadTableMap::translateFieldName('Bmcauto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bmcauto = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliHoldheadTableMap::translateFieldName('CancelDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->cancel_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliHoldheadTableMap::translateFieldName('UidCancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid_cancel = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliHoldheadTableMap::translateFieldName('Mbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mbase = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliHoldheadTableMap::translateFieldName('Bprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliHoldheadTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliHoldheadTableMap::translateFieldName('NameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliHoldheadTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliHoldheadTableMap::translateFieldName('Crate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliHoldheadTableMap::translateFieldName('SpCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliHoldheadTableMap::translateFieldName('SpPos', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_pos = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliHoldheadTableMap::translateFieldName('Ref', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : AliHoldheadTableMap::translateFieldName('StatusPackage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_package = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 35; // 35 = AliHoldheadTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliHoldhead'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliHoldheadTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliHoldheadQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliHoldhead::setDeleted()
     * @see AliHoldhead::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliHoldheadTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliHoldheadQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliHoldheadTableMap::DATABASE_NAME);
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
                AliHoldheadTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliHoldheadTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliHoldheadTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliHoldheadTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_HONO)) {
            $modifiedColumns[':p' . $index++]  = 'hono';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SCTIME)) {
            $modifiedColumns[':p' . $index++]  = 'sctime';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SA_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_INV_CODE_TO)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code_to';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOT_PV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_pv';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOT_BV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_bv';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOT_SPPV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_sppv';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOT_FV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_fv';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TRNF)) {
            $modifiedColumns[':p' . $index++]  = 'trnf';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'cancel';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'remark';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_DL)) {
            $modifiedColumns[':p' . $index++]  = 'dl';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_PRINT)) {
            $modifiedColumns[':p' . $index++]  = 'print';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_BMCAUTO)) {
            $modifiedColumns[':p' . $index++]  = 'bmcauto';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_CANCEL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'cancel_date';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_UID_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'uid_cancel';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_MBASE)) {
            $modifiedColumns[':p' . $index++]  = 'mbase';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_BPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'bprice';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_NAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'name_f';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_CRATE)) {
            $modifiedColumns[':p' . $index++]  = 'crate';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sp_code';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SP_POS)) {
            $modifiedColumns[':p' . $index++]  = 'sp_pos';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_REF)) {
            $modifiedColumns[':p' . $index++]  = 'ref';
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_STATUS_PACKAGE)) {
            $modifiedColumns[':p' . $index++]  = 'status_package';
        }

        $sql = sprintf(
            'INSERT INTO ali_holdhead (%s) VALUES (%s)',
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
                    case 'hono':
                        $stmt->bindValue($identifier, $this->hono, PDO::PARAM_INT);
                        break;
                    case 'sano':
                        $stmt->bindValue($identifier, $this->sano, PDO::PARAM_INT);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate ? $this->sadate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'sctime':
                        $stmt->bindValue($identifier, $this->sctime ? $this->sctime->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'sa_type':
                        $stmt->bindValue($identifier, $this->sa_type, PDO::PARAM_STR);
                        break;
                    case 'inv_code':
                        $stmt->bindValue($identifier, $this->inv_code, PDO::PARAM_STR);
                        break;
                    case 'inv_code_to':
                        $stmt->bindValue($identifier, $this->inv_code_to, PDO::PARAM_STR);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'tot_pv':
                        $stmt->bindValue($identifier, $this->tot_pv, PDO::PARAM_STR);
                        break;
                    case 'tot_bv':
                        $stmt->bindValue($identifier, $this->tot_bv, PDO::PARAM_STR);
                        break;
                    case 'tot_sppv':
                        $stmt->bindValue($identifier, $this->tot_sppv, PDO::PARAM_STR);
                        break;
                    case 'tot_fv':
                        $stmt->bindValue($identifier, $this->tot_fv, PDO::PARAM_STR);
                        break;
                    case 'trnf':
                        $stmt->bindValue($identifier, $this->trnf, PDO::PARAM_INT);
                        break;
                    case 'cancel':
                        $stmt->bindValue($identifier, $this->cancel, PDO::PARAM_STR);
                        break;
                    case 'remark':
                        $stmt->bindValue($identifier, $this->remark, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                    case 'dl':
                        $stmt->bindValue($identifier, $this->dl, PDO::PARAM_STR);
                        break;
                    case 'print':
                        $stmt->bindValue($identifier, $this->print, PDO::PARAM_INT);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case 'bmcauto':
                        $stmt->bindValue($identifier, $this->bmcauto, PDO::PARAM_INT);
                        break;
                    case 'cancel_date':
                        $stmt->bindValue($identifier, $this->cancel_date ? $this->cancel_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'uid_cancel':
                        $stmt->bindValue($identifier, $this->uid_cancel, PDO::PARAM_STR);
                        break;
                    case 'mbase':
                        $stmt->bindValue($identifier, $this->mbase, PDO::PARAM_STR);
                        break;
                    case 'bprice':
                        $stmt->bindValue($identifier, $this->bprice, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'name_f':
                        $stmt->bindValue($identifier, $this->name_f, PDO::PARAM_STR);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'crate':
                        $stmt->bindValue($identifier, $this->crate, PDO::PARAM_STR);
                        break;
                    case 'sp_code':
                        $stmt->bindValue($identifier, $this->sp_code, PDO::PARAM_STR);
                        break;
                    case 'sp_pos':
                        $stmt->bindValue($identifier, $this->sp_pos, PDO::PARAM_STR);
                        break;
                    case 'ref':
                        $stmt->bindValue($identifier, $this->ref, PDO::PARAM_STR);
                        break;
                    case 'status_package':
                        $stmt->bindValue($identifier, $this->status_package, PDO::PARAM_INT);
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
        $pos = AliHoldheadTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getHono();
                break;
            case 2:
                return $this->getSano();
                break;
            case 3:
                return $this->getSadate();
                break;
            case 4:
                return $this->getSctime();
                break;
            case 5:
                return $this->getSaType();
                break;
            case 6:
                return $this->getInvCode();
                break;
            case 7:
                return $this->getInvCodeTo();
                break;
            case 8:
                return $this->getMcode();
                break;
            case 9:
                return $this->getTotal();
                break;
            case 10:
                return $this->getTotPv();
                break;
            case 11:
                return $this->getTotBv();
                break;
            case 12:
                return $this->getTotSppv();
                break;
            case 13:
                return $this->getTotFv();
                break;
            case 14:
                return $this->getTrnf();
                break;
            case 15:
                return $this->getCancel();
                break;
            case 16:
                return $this->getRemark();
                break;
            case 17:
                return $this->getUid();
                break;
            case 18:
                return $this->getDl();
                break;
            case 19:
                return $this->getPrint();
                break;
            case 20:
                return $this->getRcode();
                break;
            case 21:
                return $this->getStatus();
                break;
            case 22:
                return $this->getBmcauto();
                break;
            case 23:
                return $this->getCancelDate();
                break;
            case 24:
                return $this->getUidCancel();
                break;
            case 25:
                return $this->getMbase();
                break;
            case 26:
                return $this->getBprice();
                break;
            case 27:
                return $this->getLocationbase();
                break;
            case 28:
                return $this->getNameF();
                break;
            case 29:
                return $this->getNameT();
                break;
            case 30:
                return $this->getCrate();
                break;
            case 31:
                return $this->getSpCode();
                break;
            case 32:
                return $this->getSpPos();
                break;
            case 33:
                return $this->getRef();
                break;
            case 34:
                return $this->getStatusPackage();
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

        if (isset($alreadyDumpedObjects['AliHoldhead'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliHoldhead'][$this->hashCode()] = true;
        $keys = AliHoldheadTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getHono(),
            $keys[2] => $this->getSano(),
            $keys[3] => $this->getSadate(),
            $keys[4] => $this->getSctime(),
            $keys[5] => $this->getSaType(),
            $keys[6] => $this->getInvCode(),
            $keys[7] => $this->getInvCodeTo(),
            $keys[8] => $this->getMcode(),
            $keys[9] => $this->getTotal(),
            $keys[10] => $this->getTotPv(),
            $keys[11] => $this->getTotBv(),
            $keys[12] => $this->getTotSppv(),
            $keys[13] => $this->getTotFv(),
            $keys[14] => $this->getTrnf(),
            $keys[15] => $this->getCancel(),
            $keys[16] => $this->getRemark(),
            $keys[17] => $this->getUid(),
            $keys[18] => $this->getDl(),
            $keys[19] => $this->getPrint(),
            $keys[20] => $this->getRcode(),
            $keys[21] => $this->getStatus(),
            $keys[22] => $this->getBmcauto(),
            $keys[23] => $this->getCancelDate(),
            $keys[24] => $this->getUidCancel(),
            $keys[25] => $this->getMbase(),
            $keys[26] => $this->getBprice(),
            $keys[27] => $this->getLocationbase(),
            $keys[28] => $this->getNameF(),
            $keys[29] => $this->getNameT(),
            $keys[30] => $this->getCrate(),
            $keys[31] => $this->getSpCode(),
            $keys[32] => $this->getSpPos(),
            $keys[33] => $this->getRef(),
            $keys[34] => $this->getStatusPackage(),
        );
        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        if ($result[$keys[23]] instanceof \DateTimeInterface) {
            $result[$keys[23]] = $result[$keys[23]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliHoldhead
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliHoldheadTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliHoldhead
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setHono($value);
                break;
            case 2:
                $this->setSano($value);
                break;
            case 3:
                $this->setSadate($value);
                break;
            case 4:
                $this->setSctime($value);
                break;
            case 5:
                $this->setSaType($value);
                break;
            case 6:
                $this->setInvCode($value);
                break;
            case 7:
                $this->setInvCodeTo($value);
                break;
            case 8:
                $this->setMcode($value);
                break;
            case 9:
                $this->setTotal($value);
                break;
            case 10:
                $this->setTotPv($value);
                break;
            case 11:
                $this->setTotBv($value);
                break;
            case 12:
                $this->setTotSppv($value);
                break;
            case 13:
                $this->setTotFv($value);
                break;
            case 14:
                $this->setTrnf($value);
                break;
            case 15:
                $this->setCancel($value);
                break;
            case 16:
                $this->setRemark($value);
                break;
            case 17:
                $this->setUid($value);
                break;
            case 18:
                $this->setDl($value);
                break;
            case 19:
                $this->setPrint($value);
                break;
            case 20:
                $this->setRcode($value);
                break;
            case 21:
                $this->setStatus($value);
                break;
            case 22:
                $this->setBmcauto($value);
                break;
            case 23:
                $this->setCancelDate($value);
                break;
            case 24:
                $this->setUidCancel($value);
                break;
            case 25:
                $this->setMbase($value);
                break;
            case 26:
                $this->setBprice($value);
                break;
            case 27:
                $this->setLocationbase($value);
                break;
            case 28:
                $this->setNameF($value);
                break;
            case 29:
                $this->setNameT($value);
                break;
            case 30:
                $this->setCrate($value);
                break;
            case 31:
                $this->setSpCode($value);
                break;
            case 32:
                $this->setSpPos($value);
                break;
            case 33:
                $this->setRef($value);
                break;
            case 34:
                $this->setStatusPackage($value);
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
        $keys = AliHoldheadTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setHono($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSano($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSadate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setSctime($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSaType($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setInvCode($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setInvCodeTo($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setMcode($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTotal($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTotPv($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTotBv($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setTotSppv($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTotFv($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTrnf($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCancel($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setRemark($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setUid($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDl($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPrint($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setRcode($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setStatus($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setBmcauto($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setCancelDate($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setUidCancel($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setMbase($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setBprice($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setLocationbase($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setNameF($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setNameT($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setCrate($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setSpCode($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setSpPos($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setRef($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setStatusPackage($arr[$keys[34]]);
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
     * @return $this|\CciOrm\CciOrm\AliHoldhead The current object, for fluid interface
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
        $criteria = new Criteria(AliHoldheadTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliHoldheadTableMap::COL_ID)) {
            $criteria->add(AliHoldheadTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_HONO)) {
            $criteria->add(AliHoldheadTableMap::COL_HONO, $this->hono);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SANO)) {
            $criteria->add(AliHoldheadTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SADATE)) {
            $criteria->add(AliHoldheadTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SCTIME)) {
            $criteria->add(AliHoldheadTableMap::COL_SCTIME, $this->sctime);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SA_TYPE)) {
            $criteria->add(AliHoldheadTableMap::COL_SA_TYPE, $this->sa_type);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_INV_CODE)) {
            $criteria->add(AliHoldheadTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_INV_CODE_TO)) {
            $criteria->add(AliHoldheadTableMap::COL_INV_CODE_TO, $this->inv_code_to);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_MCODE)) {
            $criteria->add(AliHoldheadTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOTAL)) {
            $criteria->add(AliHoldheadTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOT_PV)) {
            $criteria->add(AliHoldheadTableMap::COL_TOT_PV, $this->tot_pv);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOT_BV)) {
            $criteria->add(AliHoldheadTableMap::COL_TOT_BV, $this->tot_bv);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOT_SPPV)) {
            $criteria->add(AliHoldheadTableMap::COL_TOT_SPPV, $this->tot_sppv);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TOT_FV)) {
            $criteria->add(AliHoldheadTableMap::COL_TOT_FV, $this->tot_fv);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_TRNF)) {
            $criteria->add(AliHoldheadTableMap::COL_TRNF, $this->trnf);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_CANCEL)) {
            $criteria->add(AliHoldheadTableMap::COL_CANCEL, $this->cancel);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_REMARK)) {
            $criteria->add(AliHoldheadTableMap::COL_REMARK, $this->remark);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_UID)) {
            $criteria->add(AliHoldheadTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_DL)) {
            $criteria->add(AliHoldheadTableMap::COL_DL, $this->dl);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_PRINT)) {
            $criteria->add(AliHoldheadTableMap::COL_PRINT, $this->print);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_RCODE)) {
            $criteria->add(AliHoldheadTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_STATUS)) {
            $criteria->add(AliHoldheadTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_BMCAUTO)) {
            $criteria->add(AliHoldheadTableMap::COL_BMCAUTO, $this->bmcauto);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_CANCEL_DATE)) {
            $criteria->add(AliHoldheadTableMap::COL_CANCEL_DATE, $this->cancel_date);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_UID_CANCEL)) {
            $criteria->add(AliHoldheadTableMap::COL_UID_CANCEL, $this->uid_cancel);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_MBASE)) {
            $criteria->add(AliHoldheadTableMap::COL_MBASE, $this->mbase);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_BPRICE)) {
            $criteria->add(AliHoldheadTableMap::COL_BPRICE, $this->bprice);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliHoldheadTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_NAME_F)) {
            $criteria->add(AliHoldheadTableMap::COL_NAME_F, $this->name_f);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_NAME_T)) {
            $criteria->add(AliHoldheadTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_CRATE)) {
            $criteria->add(AliHoldheadTableMap::COL_CRATE, $this->crate);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SP_CODE)) {
            $criteria->add(AliHoldheadTableMap::COL_SP_CODE, $this->sp_code);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_SP_POS)) {
            $criteria->add(AliHoldheadTableMap::COL_SP_POS, $this->sp_pos);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_REF)) {
            $criteria->add(AliHoldheadTableMap::COL_REF, $this->ref);
        }
        if ($this->isColumnModified(AliHoldheadTableMap::COL_STATUS_PACKAGE)) {
            $criteria->add(AliHoldheadTableMap::COL_STATUS_PACKAGE, $this->status_package);
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
        $criteria = ChildAliHoldheadQuery::create();
        $criteria->add(AliHoldheadTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliHoldhead (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setHono($this->getHono());
        $copyObj->setSano($this->getSano());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setSctime($this->getSctime());
        $copyObj->setSaType($this->getSaType());
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setInvCodeTo($this->getInvCodeTo());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setTotPv($this->getTotPv());
        $copyObj->setTotBv($this->getTotBv());
        $copyObj->setTotSppv($this->getTotSppv());
        $copyObj->setTotFv($this->getTotFv());
        $copyObj->setTrnf($this->getTrnf());
        $copyObj->setCancel($this->getCancel());
        $copyObj->setRemark($this->getRemark());
        $copyObj->setUid($this->getUid());
        $copyObj->setDl($this->getDl());
        $copyObj->setPrint($this->getPrint());
        $copyObj->setRcode($this->getRcode());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setBmcauto($this->getBmcauto());
        $copyObj->setCancelDate($this->getCancelDate());
        $copyObj->setUidCancel($this->getUidCancel());
        $copyObj->setMbase($this->getMbase());
        $copyObj->setBprice($this->getBprice());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setNameF($this->getNameF());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setCrate($this->getCrate());
        $copyObj->setSpCode($this->getSpCode());
        $copyObj->setSpPos($this->getSpPos());
        $copyObj->setRef($this->getRef());
        $copyObj->setStatusPackage($this->getStatusPackage());
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
     * @return \CciOrm\CciOrm\AliHoldhead Clone of current object.
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
        $this->hono = null;
        $this->sano = null;
        $this->sadate = null;
        $this->sctime = null;
        $this->sa_type = null;
        $this->inv_code = null;
        $this->inv_code_to = null;
        $this->mcode = null;
        $this->total = null;
        $this->tot_pv = null;
        $this->tot_bv = null;
        $this->tot_sppv = null;
        $this->tot_fv = null;
        $this->trnf = null;
        $this->cancel = null;
        $this->remark = null;
        $this->uid = null;
        $this->dl = null;
        $this->print = null;
        $this->rcode = null;
        $this->status = null;
        $this->bmcauto = null;
        $this->cancel_date = null;
        $this->uid_cancel = null;
        $this->mbase = null;
        $this->bprice = null;
        $this->locationbase = null;
        $this->name_f = null;
        $this->name_t = null;
        $this->crate = null;
        $this->sp_code = null;
        $this->sp_pos = null;
        $this->ref = null;
        $this->status_package = null;
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
        return (string) $this->exportTo(AliHoldheadTableMap::DEFAULT_STRING_FORMAT);
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
