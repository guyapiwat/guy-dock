<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliFcQuery as ChildAliFcQuery;
use CciOrm\CciOrm\Map\AliFcTableMap;
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
 * Base class that represents a row from the 'ali_fc' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliFc implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliFcTableMap';


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
     * The value for the aid field.
     *
     * @var        int
     */
    protected $aid;

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
     * The value for the mposi field.
     *
     * @var        string
     */
    protected $mposi;

    /**
     * The value for the upa_code field.
     *
     * @var        string
     */
    protected $upa_code;

    /**
     * The value for the upa_name field.
     *
     * @var        string
     */
    protected $upa_name;

    /**
     * The value for the bposi field.
     *
     * @var        string
     */
    protected $bposi;

    /**
     * The value for the level field.
     *
     * @var        string
     */
    protected $level;

    /**
     * The value for the gen field.
     *
     * @var        string
     */
    protected $gen;

    /**
     * The value for the btype field.
     *
     * @var        string
     */
    protected $btype;

    /**
     * The value for the pv field.
     *
     * @var        string
     */
    protected $pv;

    /**
     * The value for the percer field.
     *
     * @var        string
     */
    protected $percer;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the total_r field.
     *
     * @var        string
     */
    protected $total_r;

    /**
     * The value for the ctax field.
     *
     * @var        string
     */
    protected $ctax;

    /**
     * The value for the cvat field.
     *
     * @var        string
     */
    protected $cvat;

    /**
     * The value for the amt field.
     *
     * @var        string
     */
    protected $amt;

    /**
     * The value for the oon field.
     *
     * @var        string
     */
    protected $oon;

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
     * The value for the pos_cur field.
     *
     * @var        string
     */
    protected $pos_cur;

    /**
     * The value for the crate field.
     *
     * @var        int
     */
    protected $crate;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the sano field.
     *
     * @var        string
     */
    protected $sano;

    /**
     * The value for the pcode field.
     *
     * @var        string
     */
    protected $pcode;

    /**
     * The value for the qty field.
     *
     * @var        int
     */
    protected $qty;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliFc object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>AliFc</code> instance.  If
     * <code>obj</code> is an instance of <code>AliFc</code>, delegates to
     * <code>equals(AliFc)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliFc The current object, for fluid interface
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
     * Get the [aid] column value.
     *
     * @return int
     */
    public function getAid()
    {
        return $this->aid;
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
     * Get the [mposi] column value.
     *
     * @return string
     */
    public function getMposi()
    {
        return $this->mposi;
    }

    /**
     * Get the [upa_code] column value.
     *
     * @return string
     */
    public function getUpaCode()
    {
        return $this->upa_code;
    }

    /**
     * Get the [upa_name] column value.
     *
     * @return string
     */
    public function getUpaName()
    {
        return $this->upa_name;
    }

    /**
     * Get the [bposi] column value.
     *
     * @return string
     */
    public function getBposi()
    {
        return $this->bposi;
    }

    /**
     * Get the [level] column value.
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the [gen] column value.
     *
     * @return string
     */
    public function getGen()
    {
        return $this->gen;
    }

    /**
     * Get the [btype] column value.
     *
     * @return string
     */
    public function getBtype()
    {
        return $this->btype;
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
     * Get the [percer] column value.
     *
     * @return string
     */
    public function getPercer()
    {
        return $this->percer;
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
     * Get the [total_r] column value.
     *
     * @return string
     */
    public function getTotalR()
    {
        return $this->total_r;
    }

    /**
     * Get the [ctax] column value.
     *
     * @return string
     */
    public function getCtax()
    {
        return $this->ctax;
    }

    /**
     * Get the [cvat] column value.
     *
     * @return string
     */
    public function getCvat()
    {
        return $this->cvat;
    }

    /**
     * Get the [amt] column value.
     *
     * @return string
     */
    public function getAmt()
    {
        return $this->amt;
    }

    /**
     * Get the [oon] column value.
     *
     * @return string
     */
    public function getOon()
    {
        return $this->oon;
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
     * Get the [pos_cur] column value.
     *
     * @return string
     */
    public function getPosCur()
    {
        return $this->pos_cur;
    }

    /**
     * Get the [crate] column value.
     *
     * @return int
     */
    public function getCrate()
    {
        return $this->crate;
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
     * Get the [sano] column value.
     *
     * @return string
     */
    public function getSano()
    {
        return $this->sano;
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
     * Get the [qty] column value.
     *
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set the value of [aid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setAid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->aid !== $v) {
            $this->aid = $v;
            $this->modifiedColumns[AliFcTableMap::COL_AID] = true;
        }

        return $this;
    } // setAid()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliFcTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliFcTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliFcTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [mposi] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setMposi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mposi !== $v) {
            $this->mposi = $v;
            $this->modifiedColumns[AliFcTableMap::COL_MPOSI] = true;
        }

        return $this;
    } // setMposi()

    /**
     * Set the value of [upa_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setUpaCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->upa_code !== $v) {
            $this->upa_code = $v;
            $this->modifiedColumns[AliFcTableMap::COL_UPA_CODE] = true;
        }

        return $this;
    } // setUpaCode()

    /**
     * Set the value of [upa_name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setUpaName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->upa_name !== $v) {
            $this->upa_name = $v;
            $this->modifiedColumns[AliFcTableMap::COL_UPA_NAME] = true;
        }

        return $this;
    } // setUpaName()

    /**
     * Set the value of [bposi] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setBposi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bposi !== $v) {
            $this->bposi = $v;
            $this->modifiedColumns[AliFcTableMap::COL_BPOSI] = true;
        }

        return $this;
    } // setBposi()

    /**
     * Set the value of [level] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->level !== $v) {
            $this->level = $v;
            $this->modifiedColumns[AliFcTableMap::COL_LEVEL] = true;
        }

        return $this;
    } // setLevel()

    /**
     * Set the value of [gen] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setGen($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->gen !== $v) {
            $this->gen = $v;
            $this->modifiedColumns[AliFcTableMap::COL_GEN] = true;
        }

        return $this;
    } // setGen()

    /**
     * Set the value of [btype] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setBtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->btype !== $v) {
            $this->btype = $v;
            $this->modifiedColumns[AliFcTableMap::COL_BTYPE] = true;
        }

        return $this;
    } // setBtype()

    /**
     * Set the value of [pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pv !== $v) {
            $this->pv = $v;
            $this->modifiedColumns[AliFcTableMap::COL_PV] = true;
        }

        return $this;
    } // setPv()

    /**
     * Set the value of [percer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setPercer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->percer !== $v) {
            $this->percer = $v;
            $this->modifiedColumns[AliFcTableMap::COL_PERCER] = true;
        }

        return $this;
    } // setPercer()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliFcTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [total_r] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setTotalR($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_r !== $v) {
            $this->total_r = $v;
            $this->modifiedColumns[AliFcTableMap::COL_TOTAL_R] = true;
        }

        return $this;
    } // setTotalR()

    /**
     * Set the value of [ctax] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setCtax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ctax !== $v) {
            $this->ctax = $v;
            $this->modifiedColumns[AliFcTableMap::COL_CTAX] = true;
        }

        return $this;
    } // setCtax()

    /**
     * Set the value of [cvat] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setCvat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cvat !== $v) {
            $this->cvat = $v;
            $this->modifiedColumns[AliFcTableMap::COL_CVAT] = true;
        }

        return $this;
    } // setCvat()

    /**
     * Set the value of [amt] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setAmt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amt !== $v) {
            $this->amt = $v;
            $this->modifiedColumns[AliFcTableMap::COL_AMT] = true;
        }

        return $this;
    } // setAmt()

    /**
     * Set the value of [oon] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setOon($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->oon !== $v) {
            $this->oon = $v;
            $this->modifiedColumns[AliFcTableMap::COL_OON] = true;
        }

        return $this;
    } // setOon()

    /**
     * Sets the value of [fdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setFdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fdate !== null || $dt !== null) {
            if ($this->fdate === null || $dt === null || $dt->format("Y-m-d") !== $this->fdate->format("Y-m-d")) {
                $this->fdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliFcTableMap::COL_FDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setFdate()

    /**
     * Sets the value of [tdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setTdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tdate !== null || $dt !== null) {
            if ($this->tdate === null || $dt === null || $dt->format("Y-m-d") !== $this->tdate->format("Y-m-d")) {
                $this->tdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliFcTableMap::COL_TDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTdate()

    /**
     * Set the value of [pos_cur] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setPosCur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur !== $v) {
            $this->pos_cur = $v;
            $this->modifiedColumns[AliFcTableMap::COL_POS_CUR] = true;
        }

        return $this;
    } // setPosCur()

    /**
     * Set the value of [crate] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setCrate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->crate !== $v) {
            $this->crate = $v;
            $this->modifiedColumns[AliFcTableMap::COL_CRATE] = true;
        }

        return $this;
    } // setCrate()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliFcTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [sano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliFcTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Set the value of [pcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setPcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pcode !== $v) {
            $this->pcode = $v;
            $this->modifiedColumns[AliFcTableMap::COL_PCODE] = true;
        }

        return $this;
    } // setPcode()

    /**
     * Set the value of [qty] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliFc The current object (for fluent API support)
     */
    public function setQty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qty !== $v) {
            $this->qty = $v;
            $this->modifiedColumns[AliFcTableMap::COL_QTY] = true;
        }

        return $this;
    } // setQty()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliFcTableMap::translateFieldName('Aid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliFcTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliFcTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliFcTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliFcTableMap::translateFieldName('Mposi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mposi = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliFcTableMap::translateFieldName('UpaCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->upa_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliFcTableMap::translateFieldName('UpaName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->upa_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliFcTableMap::translateFieldName('Bposi', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bposi = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliFcTableMap::translateFieldName('Level', TableMap::TYPE_PHPNAME, $indexType)];
            $this->level = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliFcTableMap::translateFieldName('Gen', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gen = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliFcTableMap::translateFieldName('Btype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->btype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliFcTableMap::translateFieldName('Pv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliFcTableMap::translateFieldName('Percer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->percer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliFcTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliFcTableMap::translateFieldName('TotalR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_r = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliFcTableMap::translateFieldName('Ctax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ctax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliFcTableMap::translateFieldName('Cvat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cvat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliFcTableMap::translateFieldName('Amt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliFcTableMap::translateFieldName('Oon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->oon = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliFcTableMap::translateFieldName('Fdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->fdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliFcTableMap::translateFieldName('Tdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->tdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliFcTableMap::translateFieldName('PosCur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliFcTableMap::translateFieldName('Crate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crate = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliFcTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliFcTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliFcTableMap::translateFieldName('Pcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliFcTableMap::translateFieldName('Qty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 27; // 27 = AliFcTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliFc'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliFcTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliFcQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliFc::setDeleted()
     * @see AliFc::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliFcTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliFcQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliFcTableMap::DATABASE_NAME);
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
                AliFcTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliFcTableMap::COL_AID] = true;
        if (null !== $this->aid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliFcTableMap::COL_AID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliFcTableMap::COL_AID)) {
            $modifiedColumns[':p' . $index++]  = 'aid';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_MPOSI)) {
            $modifiedColumns[':p' . $index++]  = 'mposi';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_UPA_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'upa_code';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_UPA_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'upa_name';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_BPOSI)) {
            $modifiedColumns[':p' . $index++]  = 'bposi';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = 'level';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_GEN)) {
            $modifiedColumns[':p' . $index++]  = 'gen';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_BTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'btype';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_PV)) {
            $modifiedColumns[':p' . $index++]  = 'pv';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_PERCER)) {
            $modifiedColumns[':p' . $index++]  = 'percer';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_TOTAL_R)) {
            $modifiedColumns[':p' . $index++]  = 'total_r';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_CTAX)) {
            $modifiedColumns[':p' . $index++]  = 'ctax';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_CVAT)) {
            $modifiedColumns[':p' . $index++]  = 'cvat';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_AMT)) {
            $modifiedColumns[':p' . $index++]  = 'amt';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_OON)) {
            $modifiedColumns[':p' . $index++]  = 'oon';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_FDATE)) {
            $modifiedColumns[':p' . $index++]  = 'fdate';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_TDATE)) {
            $modifiedColumns[':p' . $index++]  = 'tdate';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_POS_CUR)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_CRATE)) {
            $modifiedColumns[':p' . $index++]  = 'crate';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_PCODE)) {
            $modifiedColumns[':p' . $index++]  = 'pcode';
        }
        if ($this->isColumnModified(AliFcTableMap::COL_QTY)) {
            $modifiedColumns[':p' . $index++]  = 'qty';
        }

        $sql = sprintf(
            'INSERT INTO ali_fc (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'aid':
                        $stmt->bindValue($identifier, $this->aid, PDO::PARAM_INT);
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
                    case 'mposi':
                        $stmt->bindValue($identifier, $this->mposi, PDO::PARAM_STR);
                        break;
                    case 'upa_code':
                        $stmt->bindValue($identifier, $this->upa_code, PDO::PARAM_STR);
                        break;
                    case 'upa_name':
                        $stmt->bindValue($identifier, $this->upa_name, PDO::PARAM_STR);
                        break;
                    case 'bposi':
                        $stmt->bindValue($identifier, $this->bposi, PDO::PARAM_STR);
                        break;
                    case 'level':
                        $stmt->bindValue($identifier, $this->level, PDO::PARAM_STR);
                        break;
                    case 'gen':
                        $stmt->bindValue($identifier, $this->gen, PDO::PARAM_STR);
                        break;
                    case 'btype':
                        $stmt->bindValue($identifier, $this->btype, PDO::PARAM_STR);
                        break;
                    case 'pv':
                        $stmt->bindValue($identifier, $this->pv, PDO::PARAM_STR);
                        break;
                    case 'percer':
                        $stmt->bindValue($identifier, $this->percer, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'total_r':
                        $stmt->bindValue($identifier, $this->total_r, PDO::PARAM_STR);
                        break;
                    case 'ctax':
                        $stmt->bindValue($identifier, $this->ctax, PDO::PARAM_STR);
                        break;
                    case 'cvat':
                        $stmt->bindValue($identifier, $this->cvat, PDO::PARAM_STR);
                        break;
                    case 'amt':
                        $stmt->bindValue($identifier, $this->amt, PDO::PARAM_STR);
                        break;
                    case 'oon':
                        $stmt->bindValue($identifier, $this->oon, PDO::PARAM_STR);
                        break;
                    case 'fdate':
                        $stmt->bindValue($identifier, $this->fdate ? $this->fdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'tdate':
                        $stmt->bindValue($identifier, $this->tdate ? $this->tdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pos_cur':
                        $stmt->bindValue($identifier, $this->pos_cur, PDO::PARAM_STR);
                        break;
                    case 'crate':
                        $stmt->bindValue($identifier, $this->crate, PDO::PARAM_INT);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'sano':
                        $stmt->bindValue($identifier, $this->sano, PDO::PARAM_STR);
                        break;
                    case 'pcode':
                        $stmt->bindValue($identifier, $this->pcode, PDO::PARAM_STR);
                        break;
                    case 'qty':
                        $stmt->bindValue($identifier, $this->qty, PDO::PARAM_INT);
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
        $this->setAid($pk);

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
        $pos = AliFcTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getAid();
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
                return $this->getMposi();
                break;
            case 5:
                return $this->getUpaCode();
                break;
            case 6:
                return $this->getUpaName();
                break;
            case 7:
                return $this->getBposi();
                break;
            case 8:
                return $this->getLevel();
                break;
            case 9:
                return $this->getGen();
                break;
            case 10:
                return $this->getBtype();
                break;
            case 11:
                return $this->getPv();
                break;
            case 12:
                return $this->getPercer();
                break;
            case 13:
                return $this->getTotal();
                break;
            case 14:
                return $this->getTotalR();
                break;
            case 15:
                return $this->getCtax();
                break;
            case 16:
                return $this->getCvat();
                break;
            case 17:
                return $this->getAmt();
                break;
            case 18:
                return $this->getOon();
                break;
            case 19:
                return $this->getFdate();
                break;
            case 20:
                return $this->getTdate();
                break;
            case 21:
                return $this->getPosCur();
                break;
            case 22:
                return $this->getCrate();
                break;
            case 23:
                return $this->getLocationbase();
                break;
            case 24:
                return $this->getSano();
                break;
            case 25:
                return $this->getPcode();
                break;
            case 26:
                return $this->getQty();
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

        if (isset($alreadyDumpedObjects['AliFc'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliFc'][$this->hashCode()] = true;
        $keys = AliFcTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAid(),
            $keys[1] => $this->getRcode(),
            $keys[2] => $this->getMcode(),
            $keys[3] => $this->getNameT(),
            $keys[4] => $this->getMposi(),
            $keys[5] => $this->getUpaCode(),
            $keys[6] => $this->getUpaName(),
            $keys[7] => $this->getBposi(),
            $keys[8] => $this->getLevel(),
            $keys[9] => $this->getGen(),
            $keys[10] => $this->getBtype(),
            $keys[11] => $this->getPv(),
            $keys[12] => $this->getPercer(),
            $keys[13] => $this->getTotal(),
            $keys[14] => $this->getTotalR(),
            $keys[15] => $this->getCtax(),
            $keys[16] => $this->getCvat(),
            $keys[17] => $this->getAmt(),
            $keys[18] => $this->getOon(),
            $keys[19] => $this->getFdate(),
            $keys[20] => $this->getTdate(),
            $keys[21] => $this->getPosCur(),
            $keys[22] => $this->getCrate(),
            $keys[23] => $this->getLocationbase(),
            $keys[24] => $this->getSano(),
            $keys[25] => $this->getPcode(),
            $keys[26] => $this->getQty(),
        );
        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliFc
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliFcTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliFc
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setAid($value);
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
                $this->setMposi($value);
                break;
            case 5:
                $this->setUpaCode($value);
                break;
            case 6:
                $this->setUpaName($value);
                break;
            case 7:
                $this->setBposi($value);
                break;
            case 8:
                $this->setLevel($value);
                break;
            case 9:
                $this->setGen($value);
                break;
            case 10:
                $this->setBtype($value);
                break;
            case 11:
                $this->setPv($value);
                break;
            case 12:
                $this->setPercer($value);
                break;
            case 13:
                $this->setTotal($value);
                break;
            case 14:
                $this->setTotalR($value);
                break;
            case 15:
                $this->setCtax($value);
                break;
            case 16:
                $this->setCvat($value);
                break;
            case 17:
                $this->setAmt($value);
                break;
            case 18:
                $this->setOon($value);
                break;
            case 19:
                $this->setFdate($value);
                break;
            case 20:
                $this->setTdate($value);
                break;
            case 21:
                $this->setPosCur($value);
                break;
            case 22:
                $this->setCrate($value);
                break;
            case 23:
                $this->setLocationbase($value);
                break;
            case 24:
                $this->setSano($value);
                break;
            case 25:
                $this->setPcode($value);
                break;
            case 26:
                $this->setQty($value);
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
        $keys = AliFcTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setAid($arr[$keys[0]]);
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
            $this->setMposi($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setUpaCode($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setUpaName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setBposi($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setLevel($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setGen($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setBtype($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPv($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPercer($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTotal($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTotalR($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCtax($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCvat($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setAmt($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setOon($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setFdate($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setTdate($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setPosCur($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setCrate($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setLocationbase($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setSano($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setPcode($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setQty($arr[$keys[26]]);
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
     * @return $this|\CciOrm\CciOrm\AliFc The current object, for fluid interface
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
        $criteria = new Criteria(AliFcTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliFcTableMap::COL_AID)) {
            $criteria->add(AliFcTableMap::COL_AID, $this->aid);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_RCODE)) {
            $criteria->add(AliFcTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_MCODE)) {
            $criteria->add(AliFcTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_NAME_T)) {
            $criteria->add(AliFcTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_MPOSI)) {
            $criteria->add(AliFcTableMap::COL_MPOSI, $this->mposi);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_UPA_CODE)) {
            $criteria->add(AliFcTableMap::COL_UPA_CODE, $this->upa_code);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_UPA_NAME)) {
            $criteria->add(AliFcTableMap::COL_UPA_NAME, $this->upa_name);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_BPOSI)) {
            $criteria->add(AliFcTableMap::COL_BPOSI, $this->bposi);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_LEVEL)) {
            $criteria->add(AliFcTableMap::COL_LEVEL, $this->level);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_GEN)) {
            $criteria->add(AliFcTableMap::COL_GEN, $this->gen);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_BTYPE)) {
            $criteria->add(AliFcTableMap::COL_BTYPE, $this->btype);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_PV)) {
            $criteria->add(AliFcTableMap::COL_PV, $this->pv);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_PERCER)) {
            $criteria->add(AliFcTableMap::COL_PERCER, $this->percer);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_TOTAL)) {
            $criteria->add(AliFcTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_TOTAL_R)) {
            $criteria->add(AliFcTableMap::COL_TOTAL_R, $this->total_r);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_CTAX)) {
            $criteria->add(AliFcTableMap::COL_CTAX, $this->ctax);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_CVAT)) {
            $criteria->add(AliFcTableMap::COL_CVAT, $this->cvat);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_AMT)) {
            $criteria->add(AliFcTableMap::COL_AMT, $this->amt);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_OON)) {
            $criteria->add(AliFcTableMap::COL_OON, $this->oon);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_FDATE)) {
            $criteria->add(AliFcTableMap::COL_FDATE, $this->fdate);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_TDATE)) {
            $criteria->add(AliFcTableMap::COL_TDATE, $this->tdate);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_POS_CUR)) {
            $criteria->add(AliFcTableMap::COL_POS_CUR, $this->pos_cur);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_CRATE)) {
            $criteria->add(AliFcTableMap::COL_CRATE, $this->crate);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliFcTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_SANO)) {
            $criteria->add(AliFcTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_PCODE)) {
            $criteria->add(AliFcTableMap::COL_PCODE, $this->pcode);
        }
        if ($this->isColumnModified(AliFcTableMap::COL_QTY)) {
            $criteria->add(AliFcTableMap::COL_QTY, $this->qty);
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
        $criteria = ChildAliFcQuery::create();
        $criteria->add(AliFcTableMap::COL_AID, $this->aid);

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
        $validPk = null !== $this->getAid();

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
        return $this->getAid();
    }

    /**
     * Generic method to set the primary key (aid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getAid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliFc (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRcode($this->getRcode());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setMposi($this->getMposi());
        $copyObj->setUpaCode($this->getUpaCode());
        $copyObj->setUpaName($this->getUpaName());
        $copyObj->setBposi($this->getBposi());
        $copyObj->setLevel($this->getLevel());
        $copyObj->setGen($this->getGen());
        $copyObj->setBtype($this->getBtype());
        $copyObj->setPv($this->getPv());
        $copyObj->setPercer($this->getPercer());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setTotalR($this->getTotalR());
        $copyObj->setCtax($this->getCtax());
        $copyObj->setCvat($this->getCvat());
        $copyObj->setAmt($this->getAmt());
        $copyObj->setOon($this->getOon());
        $copyObj->setFdate($this->getFdate());
        $copyObj->setTdate($this->getTdate());
        $copyObj->setPosCur($this->getPosCur());
        $copyObj->setCrate($this->getCrate());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setSano($this->getSano());
        $copyObj->setPcode($this->getPcode());
        $copyObj->setQty($this->getQty());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \CciOrm\CciOrm\AliFc Clone of current object.
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
        $this->aid = null;
        $this->rcode = null;
        $this->mcode = null;
        $this->name_t = null;
        $this->mposi = null;
        $this->upa_code = null;
        $this->upa_name = null;
        $this->bposi = null;
        $this->level = null;
        $this->gen = null;
        $this->btype = null;
        $this->pv = null;
        $this->percer = null;
        $this->total = null;
        $this->total_r = null;
        $this->ctax = null;
        $this->cvat = null;
        $this->amt = null;
        $this->oon = null;
        $this->fdate = null;
        $this->tdate = null;
        $this->pos_cur = null;
        $this->crate = null;
        $this->locationbase = null;
        $this->sano = null;
        $this->pcode = null;
        $this->qty = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
        return (string) $this->exportTo(AliFcTableMap::DEFAULT_STRING_FORMAT);
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
