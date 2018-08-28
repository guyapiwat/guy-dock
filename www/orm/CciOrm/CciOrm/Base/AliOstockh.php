<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliOstockhQuery as ChildAliOstockhQuery;
use CciOrm\CciOrm\Map\AliOstockhTableMap;
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
 * Base class that represents a row from the 'ali_ostockh' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliOstockh implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliOstockhTableMap';


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
     * The value for the sano field.
     *
     * @var        string
     */
    protected $sano;

    /**
     * The value for the sano1 field.
     *
     * @var        string
     */
    protected $sano1;

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
     * The value for the inv_code field.
     *
     * @var        string
     */
    protected $inv_code;

    /**
     * The value for the inv_coden field.
     *
     * @var        string
     */
    protected $inv_coden;

    /**
     * The value for the inv_ref field.
     *
     * @var        string
     */
    protected $inv_ref;

    /**
     * The value for the inv_refn field.
     *
     * @var        string
     */
    protected $inv_refn;

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
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the sa_type field.
     *
     * @var        string
     */
    protected $sa_type;

    /**
     * The value for the sa_mtype field.
     *
     * @var        string
     */
    protected $sa_mtype;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * The value for the uid_ref field.
     *
     * @var        string
     */
    protected $uid_ref;

    /**
     * The value for the cancel field.
     *
     * @var        int
     */
    protected $cancel;

    /**
     * The value for the txtoption field.
     *
     * @var        string
     */
    protected $txtoption;

    /**
     * The value for the sender field.
     *
     * @var        string
     */
    protected $sender;

    /**
     * The value for the sender_date field.
     *
     * @var        DateTime
     */
    protected $sender_date;

    /**
     * The value for the receive field.
     *
     * @var        int
     */
    protected $receive;

    /**
     * The value for the receive_date field.
     *
     * @var        DateTime
     */
    protected $receive_date;

    /**
     * The value for the uid_receive field.
     *
     * @var        string
     */
    protected $uid_receive;

    /**
     * The value for the status field.
     *
     * @var        int
     */
    protected $status;

    /**
     * The value for the print field.
     *
     * @var        int
     */
    protected $print;

    /**
     * The value for the rccode field.
     *
     * @var        string
     */
    protected $rccode;

    /**
     * The value for the update_date field.
     *
     * @var        DateTime
     */
    protected $update_date;

    /**
     * The value for the mapping_code field.
     *
     * @var        string
     */
    protected $mapping_code;

    /**
     * The value for the rrcode field.
     *
     * @var        string
     */
    protected $rrcode;

    /**
     * The value for the auto field.
     *
     * @var        string
     */
    protected $auto;

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
     * Initializes internal state of CciOrm\CciOrm\Base\AliOstockh object.
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
     * Compares this with another <code>AliOstockh</code> instance.  If
     * <code>obj</code> is an instance of <code>AliOstockh</code>, delegates to
     * <code>equals(AliOstockh)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliOstockh The current object, for fluid interface
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
     * Get the [sano] column value.
     *
     * @return string
     */
    public function getSano()
    {
        return $this->sano;
    }

    /**
     * Get the [sano1] column value.
     *
     * @return string
     */
    public function getSano1()
    {
        return $this->sano1;
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
     * Get the [inv_code] column value.
     *
     * @return string
     */
    public function getInvCode()
    {
        return $this->inv_code;
    }

    /**
     * Get the [inv_coden] column value.
     *
     * @return string
     */
    public function getInvCoden()
    {
        return $this->inv_coden;
    }

    /**
     * Get the [inv_ref] column value.
     *
     * @return string
     */
    public function getInvRef()
    {
        return $this->inv_ref;
    }

    /**
     * Get the [inv_refn] column value.
     *
     * @return string
     */
    public function getInvRefn()
    {
        return $this->inv_refn;
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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * Get the [sa_mtype] column value.
     *
     * @return string
     */
    public function getSaMtype()
    {
        return $this->sa_mtype;
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
     * Get the [uid_ref] column value.
     *
     * @return string
     */
    public function getUidRef()
    {
        return $this->uid_ref;
    }

    /**
     * Get the [cancel] column value.
     *
     * @return int
     */
    public function getCancel()
    {
        return $this->cancel;
    }

    /**
     * Get the [txtoption] column value.
     *
     * @return string
     */
    public function getTxtoption()
    {
        return $this->txtoption;
    }

    /**
     * Get the [sender] column value.
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Get the [optionally formatted] temporal [sender_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getSenderDate($format = NULL)
    {
        if ($format === null) {
            return $this->sender_date;
        } else {
            return $this->sender_date instanceof \DateTimeInterface ? $this->sender_date->format($format) : null;
        }
    }

    /**
     * Get the [receive] column value.
     *
     * @return int
     */
    public function getReceive()
    {
        return $this->receive;
    }

    /**
     * Get the [optionally formatted] temporal [receive_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getReceiveDate($format = NULL)
    {
        if ($format === null) {
            return $this->receive_date;
        } else {
            return $this->receive_date instanceof \DateTimeInterface ? $this->receive_date->format($format) : null;
        }
    }

    /**
     * Get the [uid_receive] column value.
     *
     * @return string
     */
    public function getUidReceive()
    {
        return $this->uid_receive;
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
     * Get the [print] column value.
     *
     * @return int
     */
    public function getPrint()
    {
        return $this->print;
    }

    /**
     * Get the [rccode] column value.
     *
     * @return string
     */
    public function getRccode()
    {
        return $this->rccode;
    }

    /**
     * Get the [optionally formatted] temporal [update_date] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdateDate($format = NULL)
    {
        if ($format === null) {
            return $this->update_date;
        } else {
            return $this->update_date instanceof \DateTimeInterface ? $this->update_date->format($format) : null;
        }
    }

    /**
     * Get the [mapping_code] column value.
     *
     * @return string
     */
    public function getMappingCode()
    {
        return $this->mapping_code;
    }

    /**
     * Get the [rrcode] column value.
     *
     * @return string
     */
    public function getRrcode()
    {
        return $this->rrcode;
    }

    /**
     * Get the [auto] column value.
     *
     * @return string
     */
    public function getAuto()
    {
        return $this->auto;
    }

    /**
     * Set the value of [sano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Set the value of [sano1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setSano1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano1 !== $v) {
            $this->sano1 = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_SANO1] = true;
        }

        return $this;
    } // setSano1()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliOstockhTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Sets the value of [sctime] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setSctime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sctime !== null || $dt !== null) {
            if ($this->sctime === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->sctime->format("Y-m-d H:i:s.u")) {
                $this->sctime = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliOstockhTableMap::COL_SCTIME] = true;
            }
        } // if either are not null

        return $this;
    } // setSctime()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [inv_coden] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setInvCoden($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_coden !== $v) {
            $this->inv_coden = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_INV_CODEN] = true;
        }

        return $this;
    } // setInvCoden()

    /**
     * Set the value of [inv_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setInvRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_ref !== $v) {
            $this->inv_ref = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_INV_REF] = true;
        }

        return $this;
    } // setInvRef()

    /**
     * Set the value of [inv_refn] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setInvRefn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_refn !== $v) {
            $this->inv_refn = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_INV_REFN] = true;
        }

        return $this;
    } // setInvRefn()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [tot_pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setTotPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_pv !== $v) {
            $this->tot_pv = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_TOT_PV] = true;
        }

        return $this;
    } // setTotPv()

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [sa_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setSaType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sa_type !== $v) {
            $this->sa_type = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_SA_TYPE] = true;
        }

        return $this;
    } // setSaType()

    /**
     * Set the value of [sa_mtype] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setSaMtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sa_mtype !== $v) {
            $this->sa_mtype = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_SA_MTYPE] = true;
        }

        return $this;
    } // setSaMtype()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [uid_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setUidRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid_ref !== $v) {
            $this->uid_ref = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_UID_REF] = true;
        }

        return $this;
    } // setUidRef()

    /**
     * Set the value of [cancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setCancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel !== $v) {
            $this->cancel = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_CANCEL] = true;
        }

        return $this;
    } // setCancel()

    /**
     * Set the value of [txtoption] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setTxtoption($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtoption !== $v) {
            $this->txtoption = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_TXTOPTION] = true;
        }

        return $this;
    } // setTxtoption()

    /**
     * Set the value of [sender] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setSender($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sender !== $v) {
            $this->sender = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_SENDER] = true;
        }

        return $this;
    } // setSender()

    /**
     * Sets the value of [sender_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setSenderDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sender_date !== null || $dt !== null) {
            if ($this->sender_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->sender_date->format("Y-m-d H:i:s.u")) {
                $this->sender_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliOstockhTableMap::COL_SENDER_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSenderDate()

    /**
     * Set the value of [receive] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setReceive($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->receive !== $v) {
            $this->receive = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_RECEIVE] = true;
        }

        return $this;
    } // setReceive()

    /**
     * Sets the value of [receive_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setReceiveDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->receive_date !== null || $dt !== null) {
            if ($this->receive_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->receive_date->format("Y-m-d H:i:s.u")) {
                $this->receive_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliOstockhTableMap::COL_RECEIVE_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setReceiveDate()

    /**
     * Set the value of [uid_receive] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setUidReceive($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid_receive !== $v) {
            $this->uid_receive = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_UID_RECEIVE] = true;
        }

        return $this;
    } // setUidReceive()

    /**
     * Set the value of [status] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [print] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setPrint($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->print !== $v) {
            $this->print = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_PRINT] = true;
        }

        return $this;
    } // setPrint()

    /**
     * Set the value of [rccode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setRccode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rccode !== $v) {
            $this->rccode = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_RCCODE] = true;
        }

        return $this;
    } // setRccode()

    /**
     * Sets the value of [update_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setUpdateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_date !== null || $dt !== null) {
            if ($this->update_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->update_date->format("Y-m-d H:i:s.u")) {
                $this->update_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliOstockhTableMap::COL_UPDATE_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateDate()

    /**
     * Set the value of [mapping_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setMappingCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mapping_code !== $v) {
            $this->mapping_code = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_MAPPING_CODE] = true;
        }

        return $this;
    } // setMappingCode()

    /**
     * Set the value of [rrcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setRrcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rrcode !== $v) {
            $this->rrcode = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_RRCODE] = true;
        }

        return $this;
    } // setRrcode()

    /**
     * Set the value of [auto] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object (for fluent API support)
     */
    public function setAuto($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auto !== $v) {
            $this->auto = $v;
            $this->modifiedColumns[AliOstockhTableMap::COL_AUTO] = true;
        }

        return $this;
    } // setAuto()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliOstockhTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliOstockhTableMap::translateFieldName('Sano1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliOstockhTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliOstockhTableMap::translateFieldName('Sctime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->sctime = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliOstockhTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliOstockhTableMap::translateFieldName('InvCoden', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_coden = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliOstockhTableMap::translateFieldName('InvRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliOstockhTableMap::translateFieldName('InvRefn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_refn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliOstockhTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliOstockhTableMap::translateFieldName('TotPv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliOstockhTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliOstockhTableMap::translateFieldName('SaType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliOstockhTableMap::translateFieldName('SaMtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_mtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliOstockhTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliOstockhTableMap::translateFieldName('UidRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliOstockhTableMap::translateFieldName('Cancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliOstockhTableMap::translateFieldName('Txtoption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtoption = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliOstockhTableMap::translateFieldName('Sender', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sender = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliOstockhTableMap::translateFieldName('SenderDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->sender_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliOstockhTableMap::translateFieldName('Receive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->receive = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliOstockhTableMap::translateFieldName('ReceiveDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->receive_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliOstockhTableMap::translateFieldName('UidReceive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid_receive = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliOstockhTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliOstockhTableMap::translateFieldName('Print', TableMap::TYPE_PHPNAME, $indexType)];
            $this->print = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliOstockhTableMap::translateFieldName('Rccode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rccode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliOstockhTableMap::translateFieldName('UpdateDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliOstockhTableMap::translateFieldName('MappingCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mapping_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliOstockhTableMap::translateFieldName('Rrcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rrcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliOstockhTableMap::translateFieldName('Auto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auto = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 29; // 29 = AliOstockhTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliOstockh'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliOstockhTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliOstockhQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliOstockh::setDeleted()
     * @see AliOstockh::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliOstockhTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliOstockhQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliOstockhTableMap::DATABASE_NAME);
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
                AliOstockhTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliOstockhTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliOstockhTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliOstockhTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SANO1)) {
            $modifiedColumns[':p' . $index++]  = 'sano1';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SCTIME)) {
            $modifiedColumns[':p' . $index++]  = 'sctime';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_INV_CODEN)) {
            $modifiedColumns[':p' . $index++]  = 'inv_coden';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_INV_REF)) {
            $modifiedColumns[':p' . $index++]  = 'inv_ref';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_INV_REFN)) {
            $modifiedColumns[':p' . $index++]  = 'inv_refn';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_TOT_PV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_pv';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SA_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SA_MTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sa_mtype';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_UID_REF)) {
            $modifiedColumns[':p' . $index++]  = 'uid_ref';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'cancel';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_TXTOPTION)) {
            $modifiedColumns[':p' . $index++]  = 'txtoption';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SENDER)) {
            $modifiedColumns[':p' . $index++]  = 'sender';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SENDER_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'sender_date';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_RECEIVE)) {
            $modifiedColumns[':p' . $index++]  = 'receive';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_RECEIVE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'receive_date';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_UID_RECEIVE)) {
            $modifiedColumns[':p' . $index++]  = 'uid_receive';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_PRINT)) {
            $modifiedColumns[':p' . $index++]  = 'print';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_RCCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rccode';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_UPDATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'update_date';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_MAPPING_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'mapping_code';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_RRCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rrcode';
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_AUTO)) {
            $modifiedColumns[':p' . $index++]  = 'auto';
        }

        $sql = sprintf(
            'INSERT INTO ali_ostockh (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'sano':
                        $stmt->bindValue($identifier, $this->sano, PDO::PARAM_STR);
                        break;
                    case 'sano1':
                        $stmt->bindValue($identifier, $this->sano1, PDO::PARAM_STR);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate ? $this->sadate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'sctime':
                        $stmt->bindValue($identifier, $this->sctime ? $this->sctime->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'inv_code':
                        $stmt->bindValue($identifier, $this->inv_code, PDO::PARAM_STR);
                        break;
                    case 'inv_coden':
                        $stmt->bindValue($identifier, $this->inv_coden, PDO::PARAM_STR);
                        break;
                    case 'inv_ref':
                        $stmt->bindValue($identifier, $this->inv_ref, PDO::PARAM_STR);
                        break;
                    case 'inv_refn':
                        $stmt->bindValue($identifier, $this->inv_refn, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'tot_pv':
                        $stmt->bindValue($identifier, $this->tot_pv, PDO::PARAM_STR);
                        break;
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'sa_type':
                        $stmt->bindValue($identifier, $this->sa_type, PDO::PARAM_STR);
                        break;
                    case 'sa_mtype':
                        $stmt->bindValue($identifier, $this->sa_mtype, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                    case 'uid_ref':
                        $stmt->bindValue($identifier, $this->uid_ref, PDO::PARAM_STR);
                        break;
                    case 'cancel':
                        $stmt->bindValue($identifier, $this->cancel, PDO::PARAM_INT);
                        break;
                    case 'txtoption':
                        $stmt->bindValue($identifier, $this->txtoption, PDO::PARAM_STR);
                        break;
                    case 'sender':
                        $stmt->bindValue($identifier, $this->sender, PDO::PARAM_STR);
                        break;
                    case 'sender_date':
                        $stmt->bindValue($identifier, $this->sender_date ? $this->sender_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'receive':
                        $stmt->bindValue($identifier, $this->receive, PDO::PARAM_INT);
                        break;
                    case 'receive_date':
                        $stmt->bindValue($identifier, $this->receive_date ? $this->receive_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'uid_receive':
                        $stmt->bindValue($identifier, $this->uid_receive, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                    case 'print':
                        $stmt->bindValue($identifier, $this->print, PDO::PARAM_INT);
                        break;
                    case 'rccode':
                        $stmt->bindValue($identifier, $this->rccode, PDO::PARAM_STR);
                        break;
                    case 'update_date':
                        $stmt->bindValue($identifier, $this->update_date ? $this->update_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'mapping_code':
                        $stmt->bindValue($identifier, $this->mapping_code, PDO::PARAM_STR);
                        break;
                    case 'rrcode':
                        $stmt->bindValue($identifier, $this->rrcode, PDO::PARAM_STR);
                        break;
                    case 'auto':
                        $stmt->bindValue($identifier, $this->auto, PDO::PARAM_STR);
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
        $pos = AliOstockhTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getSano();
                break;
            case 1:
                return $this->getSano1();
                break;
            case 2:
                return $this->getSadate();
                break;
            case 3:
                return $this->getSctime();
                break;
            case 4:
                return $this->getInvCode();
                break;
            case 5:
                return $this->getInvCoden();
                break;
            case 6:
                return $this->getInvRef();
                break;
            case 7:
                return $this->getInvRefn();
                break;
            case 8:
                return $this->getTotal();
                break;
            case 9:
                return $this->getTotPv();
                break;
            case 10:
                return $this->getId();
                break;
            case 11:
                return $this->getSaType();
                break;
            case 12:
                return $this->getSaMtype();
                break;
            case 13:
                return $this->getUid();
                break;
            case 14:
                return $this->getUidRef();
                break;
            case 15:
                return $this->getCancel();
                break;
            case 16:
                return $this->getTxtoption();
                break;
            case 17:
                return $this->getSender();
                break;
            case 18:
                return $this->getSenderDate();
                break;
            case 19:
                return $this->getReceive();
                break;
            case 20:
                return $this->getReceiveDate();
                break;
            case 21:
                return $this->getUidReceive();
                break;
            case 22:
                return $this->getStatus();
                break;
            case 23:
                return $this->getPrint();
                break;
            case 24:
                return $this->getRccode();
                break;
            case 25:
                return $this->getUpdateDate();
                break;
            case 26:
                return $this->getMappingCode();
                break;
            case 27:
                return $this->getRrcode();
                break;
            case 28:
                return $this->getAuto();
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

        if (isset($alreadyDumpedObjects['AliOstockh'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliOstockh'][$this->hashCode()] = true;
        $keys = AliOstockhTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSano(),
            $keys[1] => $this->getSano1(),
            $keys[2] => $this->getSadate(),
            $keys[3] => $this->getSctime(),
            $keys[4] => $this->getInvCode(),
            $keys[5] => $this->getInvCoden(),
            $keys[6] => $this->getInvRef(),
            $keys[7] => $this->getInvRefn(),
            $keys[8] => $this->getTotal(),
            $keys[9] => $this->getTotPv(),
            $keys[10] => $this->getId(),
            $keys[11] => $this->getSaType(),
            $keys[12] => $this->getSaMtype(),
            $keys[13] => $this->getUid(),
            $keys[14] => $this->getUidRef(),
            $keys[15] => $this->getCancel(),
            $keys[16] => $this->getTxtoption(),
            $keys[17] => $this->getSender(),
            $keys[18] => $this->getSenderDate(),
            $keys[19] => $this->getReceive(),
            $keys[20] => $this->getReceiveDate(),
            $keys[21] => $this->getUidReceive(),
            $keys[22] => $this->getStatus(),
            $keys[23] => $this->getPrint(),
            $keys[24] => $this->getRccode(),
            $keys[25] => $this->getUpdateDate(),
            $keys[26] => $this->getMappingCode(),
            $keys[27] => $this->getRrcode(),
            $keys[28] => $this->getAuto(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[18]] instanceof \DateTimeInterface) {
            $result[$keys[18]] = $result[$keys[18]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliOstockh
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliOstockhTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliOstockh
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSano($value);
                break;
            case 1:
                $this->setSano1($value);
                break;
            case 2:
                $this->setSadate($value);
                break;
            case 3:
                $this->setSctime($value);
                break;
            case 4:
                $this->setInvCode($value);
                break;
            case 5:
                $this->setInvCoden($value);
                break;
            case 6:
                $this->setInvRef($value);
                break;
            case 7:
                $this->setInvRefn($value);
                break;
            case 8:
                $this->setTotal($value);
                break;
            case 9:
                $this->setTotPv($value);
                break;
            case 10:
                $this->setId($value);
                break;
            case 11:
                $this->setSaType($value);
                break;
            case 12:
                $this->setSaMtype($value);
                break;
            case 13:
                $this->setUid($value);
                break;
            case 14:
                $this->setUidRef($value);
                break;
            case 15:
                $this->setCancel($value);
                break;
            case 16:
                $this->setTxtoption($value);
                break;
            case 17:
                $this->setSender($value);
                break;
            case 18:
                $this->setSenderDate($value);
                break;
            case 19:
                $this->setReceive($value);
                break;
            case 20:
                $this->setReceiveDate($value);
                break;
            case 21:
                $this->setUidReceive($value);
                break;
            case 22:
                $this->setStatus($value);
                break;
            case 23:
                $this->setPrint($value);
                break;
            case 24:
                $this->setRccode($value);
                break;
            case 25:
                $this->setUpdateDate($value);
                break;
            case 26:
                $this->setMappingCode($value);
                break;
            case 27:
                $this->setRrcode($value);
                break;
            case 28:
                $this->setAuto($value);
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
        $keys = AliOstockhTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSano($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSano1($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSadate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSctime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setInvCode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setInvCoden($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setInvRef($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setInvRefn($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTotal($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTotPv($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setId($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSaType($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSaMtype($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setUid($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setUidRef($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCancel($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTxtoption($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setSender($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setSenderDate($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setReceive($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setReceiveDate($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setUidReceive($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setStatus($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setPrint($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setRccode($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setUpdateDate($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setMappingCode($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setRrcode($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setAuto($arr[$keys[28]]);
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
     * @return $this|\CciOrm\CciOrm\AliOstockh The current object, for fluid interface
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
        $criteria = new Criteria(AliOstockhTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliOstockhTableMap::COL_SANO)) {
            $criteria->add(AliOstockhTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SANO1)) {
            $criteria->add(AliOstockhTableMap::COL_SANO1, $this->sano1);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SADATE)) {
            $criteria->add(AliOstockhTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SCTIME)) {
            $criteria->add(AliOstockhTableMap::COL_SCTIME, $this->sctime);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_INV_CODE)) {
            $criteria->add(AliOstockhTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_INV_CODEN)) {
            $criteria->add(AliOstockhTableMap::COL_INV_CODEN, $this->inv_coden);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_INV_REF)) {
            $criteria->add(AliOstockhTableMap::COL_INV_REF, $this->inv_ref);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_INV_REFN)) {
            $criteria->add(AliOstockhTableMap::COL_INV_REFN, $this->inv_refn);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_TOTAL)) {
            $criteria->add(AliOstockhTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_TOT_PV)) {
            $criteria->add(AliOstockhTableMap::COL_TOT_PV, $this->tot_pv);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_ID)) {
            $criteria->add(AliOstockhTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SA_TYPE)) {
            $criteria->add(AliOstockhTableMap::COL_SA_TYPE, $this->sa_type);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SA_MTYPE)) {
            $criteria->add(AliOstockhTableMap::COL_SA_MTYPE, $this->sa_mtype);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_UID)) {
            $criteria->add(AliOstockhTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_UID_REF)) {
            $criteria->add(AliOstockhTableMap::COL_UID_REF, $this->uid_ref);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_CANCEL)) {
            $criteria->add(AliOstockhTableMap::COL_CANCEL, $this->cancel);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_TXTOPTION)) {
            $criteria->add(AliOstockhTableMap::COL_TXTOPTION, $this->txtoption);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SENDER)) {
            $criteria->add(AliOstockhTableMap::COL_SENDER, $this->sender);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_SENDER_DATE)) {
            $criteria->add(AliOstockhTableMap::COL_SENDER_DATE, $this->sender_date);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_RECEIVE)) {
            $criteria->add(AliOstockhTableMap::COL_RECEIVE, $this->receive);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_RECEIVE_DATE)) {
            $criteria->add(AliOstockhTableMap::COL_RECEIVE_DATE, $this->receive_date);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_UID_RECEIVE)) {
            $criteria->add(AliOstockhTableMap::COL_UID_RECEIVE, $this->uid_receive);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_STATUS)) {
            $criteria->add(AliOstockhTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_PRINT)) {
            $criteria->add(AliOstockhTableMap::COL_PRINT, $this->print);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_RCCODE)) {
            $criteria->add(AliOstockhTableMap::COL_RCCODE, $this->rccode);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_UPDATE_DATE)) {
            $criteria->add(AliOstockhTableMap::COL_UPDATE_DATE, $this->update_date);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_MAPPING_CODE)) {
            $criteria->add(AliOstockhTableMap::COL_MAPPING_CODE, $this->mapping_code);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_RRCODE)) {
            $criteria->add(AliOstockhTableMap::COL_RRCODE, $this->rrcode);
        }
        if ($this->isColumnModified(AliOstockhTableMap::COL_AUTO)) {
            $criteria->add(AliOstockhTableMap::COL_AUTO, $this->auto);
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
        $criteria = ChildAliOstockhQuery::create();
        $criteria->add(AliOstockhTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliOstockh (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSano($this->getSano());
        $copyObj->setSano1($this->getSano1());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setSctime($this->getSctime());
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setInvCoden($this->getInvCoden());
        $copyObj->setInvRef($this->getInvRef());
        $copyObj->setInvRefn($this->getInvRefn());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setTotPv($this->getTotPv());
        $copyObj->setSaType($this->getSaType());
        $copyObj->setSaMtype($this->getSaMtype());
        $copyObj->setUid($this->getUid());
        $copyObj->setUidRef($this->getUidRef());
        $copyObj->setCancel($this->getCancel());
        $copyObj->setTxtoption($this->getTxtoption());
        $copyObj->setSender($this->getSender());
        $copyObj->setSenderDate($this->getSenderDate());
        $copyObj->setReceive($this->getReceive());
        $copyObj->setReceiveDate($this->getReceiveDate());
        $copyObj->setUidReceive($this->getUidReceive());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setPrint($this->getPrint());
        $copyObj->setRccode($this->getRccode());
        $copyObj->setUpdateDate($this->getUpdateDate());
        $copyObj->setMappingCode($this->getMappingCode());
        $copyObj->setRrcode($this->getRrcode());
        $copyObj->setAuto($this->getAuto());
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
     * @return \CciOrm\CciOrm\AliOstockh Clone of current object.
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
        $this->sano = null;
        $this->sano1 = null;
        $this->sadate = null;
        $this->sctime = null;
        $this->inv_code = null;
        $this->inv_coden = null;
        $this->inv_ref = null;
        $this->inv_refn = null;
        $this->total = null;
        $this->tot_pv = null;
        $this->id = null;
        $this->sa_type = null;
        $this->sa_mtype = null;
        $this->uid = null;
        $this->uid_ref = null;
        $this->cancel = null;
        $this->txtoption = null;
        $this->sender = null;
        $this->sender_date = null;
        $this->receive = null;
        $this->receive_date = null;
        $this->uid_receive = null;
        $this->status = null;
        $this->print = null;
        $this->rccode = null;
        $this->update_date = null;
        $this->mapping_code = null;
        $this->rrcode = null;
        $this->auto = null;
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
        return (string) $this->exportTo(AliOstockhTableMap::DEFAULT_STRING_FORMAT);
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
