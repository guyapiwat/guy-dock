<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliReportMemberQuery as ChildAliReportMemberQuery;
use CciOrm\CciOrm\Map\AliReportMemberTableMap;
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
 * Base class that represents a row from the 'ali_report_member' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliReportMember implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliReportMemberTableMap';


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
     * The value for the mdate field.
     *
     * @var        DateTime
     */
    protected $mdate;

    /**
     * The value for the expdate field.
     *
     * @var        DateTime
     */
    protected $expdate;

    /**
     * The value for the pvdate field.
     *
     * @var        DateTime
     */
    protected $pvdate;

    /**
     * The value for the pos_cur field.
     *
     * @var        string
     */
    protected $pos_cur;

    /**
     * The value for the pos_cur4 field.
     *
     * @var        string
     */
    protected $pos_cur4;

    /**
     * The value for the pos_cur2 field.
     *
     * @var        string
     */
    protected $pos_cur2;

    /**
     * The value for the pos_cur1 field.
     *
     * @var        string
     */
    protected $pos_cur1;

    /**
     * The value for the new_member field.
     *
     * @var        int
     */
    protected $new_member;

    /**
     * The value for the new_sup field.
     *
     * @var        int
     */
    protected $new_sup;

    /**
     * The value for the new_ex field.
     *
     * @var        int
     */
    protected $new_ex;

    /**
     * The value for the sup_ex field.
     *
     * @var        int
     */
    protected $sup_ex;

    /**
     * The value for the pvmonth field.
     *
     * @var        int
     */
    protected $pvmonth;

    /**
     * The value for the auto_tot field.
     *
     * @var        string
     */
    protected $auto_tot;

    /**
     * The value for the pv_l field.
     *
     * @var        int
     */
    protected $pv_l;

    /**
     * The value for the pv_c field.
     *
     * @var        int
     */
    protected $pv_c;

    /**
     * The value for the tpos_cur field.
     *
     * @var        string
     */
    protected $tpos_cur;

    /**
     * The value for the sp_code field.
     *
     * @var        string
     */
    protected $sp_code;

    /**
     * The value for the sp_name field.
     *
     * @var        string
     */
    protected $sp_name;

    /**
     * The value for the lr field.
     *
     * @var        int
     */
    protected $lr;

    /**
     * The value for the report1 field.
     *
     * @var        string
     */
    protected $report1;

    /**
     * The value for the status_ato field.
     *
     * @var        string
     */
    protected $status_ato;

    /**
     * The value for the status_member field.
     *
     * @var        string
     */
    protected $status_member;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliReportMember object.
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
     * Compares this with another <code>AliReportMember</code> instance.  If
     * <code>obj</code> is an instance of <code>AliReportMember</code>, delegates to
     * <code>equals(AliReportMember)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliReportMember The current object, for fluid interface
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
     * Get the [optionally formatted] temporal [mdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMdate($format = NULL)
    {
        if ($format === null) {
            return $this->mdate;
        } else {
            return $this->mdate instanceof \DateTimeInterface ? $this->mdate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [expdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpdate($format = NULL)
    {
        if ($format === null) {
            return $this->expdate;
        } else {
            return $this->expdate instanceof \DateTimeInterface ? $this->expdate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [pvdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPvdate($format = NULL)
    {
        if ($format === null) {
            return $this->pvdate;
        } else {
            return $this->pvdate instanceof \DateTimeInterface ? $this->pvdate->format($format) : null;
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
     * Get the [pos_cur4] column value.
     *
     * @return string
     */
    public function getPosCur4()
    {
        return $this->pos_cur4;
    }

    /**
     * Get the [pos_cur2] column value.
     *
     * @return string
     */
    public function getPosCur2()
    {
        return $this->pos_cur2;
    }

    /**
     * Get the [pos_cur1] column value.
     *
     * @return string
     */
    public function getPosCur1()
    {
        return $this->pos_cur1;
    }

    /**
     * Get the [new_member] column value.
     *
     * @return int
     */
    public function getNewMember()
    {
        return $this->new_member;
    }

    /**
     * Get the [new_sup] column value.
     *
     * @return int
     */
    public function getNewSup()
    {
        return $this->new_sup;
    }

    /**
     * Get the [new_ex] column value.
     *
     * @return int
     */
    public function getNewEx()
    {
        return $this->new_ex;
    }

    /**
     * Get the [sup_ex] column value.
     *
     * @return int
     */
    public function getSupEx()
    {
        return $this->sup_ex;
    }

    /**
     * Get the [pvmonth] column value.
     *
     * @return int
     */
    public function getPvmonth()
    {
        return $this->pvmonth;
    }

    /**
     * Get the [auto_tot] column value.
     *
     * @return string
     */
    public function getAutoTot()
    {
        return $this->auto_tot;
    }

    /**
     * Get the [pv_l] column value.
     *
     * @return int
     */
    public function getPvL()
    {
        return $this->pv_l;
    }

    /**
     * Get the [pv_c] column value.
     *
     * @return int
     */
    public function getPvC()
    {
        return $this->pv_c;
    }

    /**
     * Get the [tpos_cur] column value.
     *
     * @return string
     */
    public function getTposCur()
    {
        return $this->tpos_cur;
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
     * Get the [sp_name] column value.
     *
     * @return string
     */
    public function getSpName()
    {
        return $this->sp_name;
    }

    /**
     * Get the [lr] column value.
     *
     * @return int
     */
    public function getLr()
    {
        return $this->lr;
    }

    /**
     * Get the [report1] column value.
     *
     * @return string
     */
    public function getReport1()
    {
        return $this->report1;
    }

    /**
     * Get the [status_ato] column value.
     *
     * @return string
     */
    public function getStatusAto()
    {
        return $this->status_ato;
    }

    /**
     * Get the [status_member] column value.
     *
     * @return string
     */
    public function getStatusMember()
    {
        return $this->status_member;
    }

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Sets the value of [mdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setMdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->mdate !== null || $dt !== null) {
            if ($this->mdate === null || $dt === null || $dt->format("Y-m-d") !== $this->mdate->format("Y-m-d")) {
                $this->mdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliReportMemberTableMap::COL_MDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setMdate()

    /**
     * Sets the value of [expdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setExpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expdate !== null || $dt !== null) {
            if ($this->expdate === null || $dt === null || $dt->format("Y-m-d") !== $this->expdate->format("Y-m-d")) {
                $this->expdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliReportMemberTableMap::COL_EXPDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setExpdate()

    /**
     * Sets the value of [pvdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setPvdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->pvdate !== null || $dt !== null) {
            if ($this->pvdate === null || $dt === null || $dt->format("Y-m-d") !== $this->pvdate->format("Y-m-d")) {
                $this->pvdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliReportMemberTableMap::COL_PVDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setPvdate()

    /**
     * Set the value of [pos_cur] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setPosCur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur !== $v) {
            $this->pos_cur = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_POS_CUR] = true;
        }

        return $this;
    } // setPosCur()

    /**
     * Set the value of [pos_cur4] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setPosCur4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur4 !== $v) {
            $this->pos_cur4 = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_POS_CUR4] = true;
        }

        return $this;
    } // setPosCur4()

    /**
     * Set the value of [pos_cur2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setPosCur2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur2 !== $v) {
            $this->pos_cur2 = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_POS_CUR2] = true;
        }

        return $this;
    } // setPosCur2()

    /**
     * Set the value of [pos_cur1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setPosCur1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur1 !== $v) {
            $this->pos_cur1 = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_POS_CUR1] = true;
        }

        return $this;
    } // setPosCur1()

    /**
     * Set the value of [new_member] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setNewMember($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->new_member !== $v) {
            $this->new_member = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_NEW_MEMBER] = true;
        }

        return $this;
    } // setNewMember()

    /**
     * Set the value of [new_sup] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setNewSup($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->new_sup !== $v) {
            $this->new_sup = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_NEW_SUP] = true;
        }

        return $this;
    } // setNewSup()

    /**
     * Set the value of [new_ex] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setNewEx($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->new_ex !== $v) {
            $this->new_ex = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_NEW_EX] = true;
        }

        return $this;
    } // setNewEx()

    /**
     * Set the value of [sup_ex] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setSupEx($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sup_ex !== $v) {
            $this->sup_ex = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_SUP_EX] = true;
        }

        return $this;
    } // setSupEx()

    /**
     * Set the value of [pvmonth] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setPvmonth($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pvmonth !== $v) {
            $this->pvmonth = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_PVMONTH] = true;
        }

        return $this;
    } // setPvmonth()

    /**
     * Set the value of [auto_tot] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setAutoTot($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auto_tot !== $v) {
            $this->auto_tot = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_AUTO_TOT] = true;
        }

        return $this;
    } // setAutoTot()

    /**
     * Set the value of [pv_l] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setPvL($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pv_l !== $v) {
            $this->pv_l = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_PV_L] = true;
        }

        return $this;
    } // setPvL()

    /**
     * Set the value of [pv_c] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setPvC($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pv_c !== $v) {
            $this->pv_c = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_PV_C] = true;
        }

        return $this;
    } // setPvC()

    /**
     * Set the value of [tpos_cur] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setTposCur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tpos_cur !== $v) {
            $this->tpos_cur = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_TPOS_CUR] = true;
        }

        return $this;
    } // setTposCur()

    /**
     * Set the value of [sp_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setSpCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_code !== $v) {
            $this->sp_code = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_SP_CODE] = true;
        }

        return $this;
    } // setSpCode()

    /**
     * Set the value of [sp_name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setSpName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_name !== $v) {
            $this->sp_name = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_SP_NAME] = true;
        }

        return $this;
    } // setSpName()

    /**
     * Set the value of [lr] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setLr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lr !== $v) {
            $this->lr = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_LR] = true;
        }

        return $this;
    } // setLr()

    /**
     * Set the value of [report1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setReport1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->report1 !== $v) {
            $this->report1 = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_REPORT1] = true;
        }

        return $this;
    } // setReport1()

    /**
     * Set the value of [status_ato] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setStatusAto($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_ato !== $v) {
            $this->status_ato = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_STATUS_ATO] = true;
        }

        return $this;
    } // setStatusAto()

    /**
     * Set the value of [status_member] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object (for fluent API support)
     */
    public function setStatusMember($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status_member !== $v) {
            $this->status_member = $v;
            $this->modifiedColumns[AliReportMemberTableMap::COL_STATUS_MEMBER] = true;
        }

        return $this;
    } // setStatusMember()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliReportMemberTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliReportMemberTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliReportMemberTableMap::translateFieldName('Mdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->mdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliReportMemberTableMap::translateFieldName('Expdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->expdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliReportMemberTableMap::translateFieldName('Pvdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->pvdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliReportMemberTableMap::translateFieldName('PosCur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliReportMemberTableMap::translateFieldName('PosCur4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliReportMemberTableMap::translateFieldName('PosCur2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliReportMemberTableMap::translateFieldName('PosCur1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliReportMemberTableMap::translateFieldName('NewMember', TableMap::TYPE_PHPNAME, $indexType)];
            $this->new_member = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliReportMemberTableMap::translateFieldName('NewSup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->new_sup = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliReportMemberTableMap::translateFieldName('NewEx', TableMap::TYPE_PHPNAME, $indexType)];
            $this->new_ex = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliReportMemberTableMap::translateFieldName('SupEx', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sup_ex = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliReportMemberTableMap::translateFieldName('Pvmonth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pvmonth = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliReportMemberTableMap::translateFieldName('AutoTot', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auto_tot = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliReportMemberTableMap::translateFieldName('PvL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pv_l = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliReportMemberTableMap::translateFieldName('PvC', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pv_c = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliReportMemberTableMap::translateFieldName('TposCur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tpos_cur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliReportMemberTableMap::translateFieldName('SpCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliReportMemberTableMap::translateFieldName('SpName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliReportMemberTableMap::translateFieldName('Lr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliReportMemberTableMap::translateFieldName('Report1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->report1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliReportMemberTableMap::translateFieldName('StatusAto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_ato = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliReportMemberTableMap::translateFieldName('StatusMember', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status_member = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 24; // 24 = AliReportMemberTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliReportMember'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliReportMemberTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliReportMemberQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliReportMember::setDeleted()
     * @see AliReportMember::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportMemberTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliReportMemberQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportMemberTableMap::DATABASE_NAME);
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
                AliReportMemberTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(AliReportMemberTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_MDATE)) {
            $modifiedColumns[':p' . $index++]  = 'mdate';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_EXPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'expdate';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_PVDATE)) {
            $modifiedColumns[':p' . $index++]  = 'pvdate';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_POS_CUR)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_POS_CUR4)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur4';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_POS_CUR2)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur2';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_POS_CUR1)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur1';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_NEW_MEMBER)) {
            $modifiedColumns[':p' . $index++]  = 'new_member';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_NEW_SUP)) {
            $modifiedColumns[':p' . $index++]  = 'new_sup';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_NEW_EX)) {
            $modifiedColumns[':p' . $index++]  = 'new_ex';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_SUP_EX)) {
            $modifiedColumns[':p' . $index++]  = 'sup_ex';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_PVMONTH)) {
            $modifiedColumns[':p' . $index++]  = 'pvmonth';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_AUTO_TOT)) {
            $modifiedColumns[':p' . $index++]  = 'auto_tot';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_PV_L)) {
            $modifiedColumns[':p' . $index++]  = 'pv_l';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_PV_C)) {
            $modifiedColumns[':p' . $index++]  = 'pv_c';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_TPOS_CUR)) {
            $modifiedColumns[':p' . $index++]  = 'tpos_cur';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_SP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sp_code';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_SP_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'sp_name';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_LR)) {
            $modifiedColumns[':p' . $index++]  = 'lr';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_REPORT1)) {
            $modifiedColumns[':p' . $index++]  = 'report1';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_STATUS_ATO)) {
            $modifiedColumns[':p' . $index++]  = 'status_ato';
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_STATUS_MEMBER)) {
            $modifiedColumns[':p' . $index++]  = 'status_member';
        }

        $sql = sprintf(
            'INSERT INTO ali_report_member (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'mdate':
                        $stmt->bindValue($identifier, $this->mdate ? $this->mdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'expdate':
                        $stmt->bindValue($identifier, $this->expdate ? $this->expdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pvdate':
                        $stmt->bindValue($identifier, $this->pvdate ? $this->pvdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'pos_cur':
                        $stmt->bindValue($identifier, $this->pos_cur, PDO::PARAM_STR);
                        break;
                    case 'pos_cur4':
                        $stmt->bindValue($identifier, $this->pos_cur4, PDO::PARAM_STR);
                        break;
                    case 'pos_cur2':
                        $stmt->bindValue($identifier, $this->pos_cur2, PDO::PARAM_STR);
                        break;
                    case 'pos_cur1':
                        $stmt->bindValue($identifier, $this->pos_cur1, PDO::PARAM_STR);
                        break;
                    case 'new_member':
                        $stmt->bindValue($identifier, $this->new_member, PDO::PARAM_INT);
                        break;
                    case 'new_sup':
                        $stmt->bindValue($identifier, $this->new_sup, PDO::PARAM_INT);
                        break;
                    case 'new_ex':
                        $stmt->bindValue($identifier, $this->new_ex, PDO::PARAM_INT);
                        break;
                    case 'sup_ex':
                        $stmt->bindValue($identifier, $this->sup_ex, PDO::PARAM_INT);
                        break;
                    case 'pvmonth':
                        $stmt->bindValue($identifier, $this->pvmonth, PDO::PARAM_INT);
                        break;
                    case 'auto_tot':
                        $stmt->bindValue($identifier, $this->auto_tot, PDO::PARAM_STR);
                        break;
                    case 'pv_l':
                        $stmt->bindValue($identifier, $this->pv_l, PDO::PARAM_INT);
                        break;
                    case 'pv_c':
                        $stmt->bindValue($identifier, $this->pv_c, PDO::PARAM_INT);
                        break;
                    case 'tpos_cur':
                        $stmt->bindValue($identifier, $this->tpos_cur, PDO::PARAM_STR);
                        break;
                    case 'sp_code':
                        $stmt->bindValue($identifier, $this->sp_code, PDO::PARAM_STR);
                        break;
                    case 'sp_name':
                        $stmt->bindValue($identifier, $this->sp_name, PDO::PARAM_STR);
                        break;
                    case 'lr':
                        $stmt->bindValue($identifier, $this->lr, PDO::PARAM_INT);
                        break;
                    case 'report1':
                        $stmt->bindValue($identifier, $this->report1, PDO::PARAM_STR);
                        break;
                    case 'status_ato':
                        $stmt->bindValue($identifier, $this->status_ato, PDO::PARAM_STR);
                        break;
                    case 'status_member':
                        $stmt->bindValue($identifier, $this->status_member, PDO::PARAM_STR);
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
        $pos = AliReportMemberTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getMcode();
                break;
            case 1:
                return $this->getNameT();
                break;
            case 2:
                return $this->getMdate();
                break;
            case 3:
                return $this->getExpdate();
                break;
            case 4:
                return $this->getPvdate();
                break;
            case 5:
                return $this->getPosCur();
                break;
            case 6:
                return $this->getPosCur4();
                break;
            case 7:
                return $this->getPosCur2();
                break;
            case 8:
                return $this->getPosCur1();
                break;
            case 9:
                return $this->getNewMember();
                break;
            case 10:
                return $this->getNewSup();
                break;
            case 11:
                return $this->getNewEx();
                break;
            case 12:
                return $this->getSupEx();
                break;
            case 13:
                return $this->getPvmonth();
                break;
            case 14:
                return $this->getAutoTot();
                break;
            case 15:
                return $this->getPvL();
                break;
            case 16:
                return $this->getPvC();
                break;
            case 17:
                return $this->getTposCur();
                break;
            case 18:
                return $this->getSpCode();
                break;
            case 19:
                return $this->getSpName();
                break;
            case 20:
                return $this->getLr();
                break;
            case 21:
                return $this->getReport1();
                break;
            case 22:
                return $this->getStatusAto();
                break;
            case 23:
                return $this->getStatusMember();
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

        if (isset($alreadyDumpedObjects['AliReportMember'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliReportMember'][$this->hashCode()] = true;
        $keys = AliReportMemberTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getMcode(),
            $keys[1] => $this->getNameT(),
            $keys[2] => $this->getMdate(),
            $keys[3] => $this->getExpdate(),
            $keys[4] => $this->getPvdate(),
            $keys[5] => $this->getPosCur(),
            $keys[6] => $this->getPosCur4(),
            $keys[7] => $this->getPosCur2(),
            $keys[8] => $this->getPosCur1(),
            $keys[9] => $this->getNewMember(),
            $keys[10] => $this->getNewSup(),
            $keys[11] => $this->getNewEx(),
            $keys[12] => $this->getSupEx(),
            $keys[13] => $this->getPvmonth(),
            $keys[14] => $this->getAutoTot(),
            $keys[15] => $this->getPvL(),
            $keys[16] => $this->getPvC(),
            $keys[17] => $this->getTposCur(),
            $keys[18] => $this->getSpCode(),
            $keys[19] => $this->getSpName(),
            $keys[20] => $this->getLr(),
            $keys[21] => $this->getReport1(),
            $keys[22] => $this->getStatusAto(),
            $keys[23] => $this->getStatusMember(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliReportMember
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliReportMemberTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliReportMember
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setMcode($value);
                break;
            case 1:
                $this->setNameT($value);
                break;
            case 2:
                $this->setMdate($value);
                break;
            case 3:
                $this->setExpdate($value);
                break;
            case 4:
                $this->setPvdate($value);
                break;
            case 5:
                $this->setPosCur($value);
                break;
            case 6:
                $this->setPosCur4($value);
                break;
            case 7:
                $this->setPosCur2($value);
                break;
            case 8:
                $this->setPosCur1($value);
                break;
            case 9:
                $this->setNewMember($value);
                break;
            case 10:
                $this->setNewSup($value);
                break;
            case 11:
                $this->setNewEx($value);
                break;
            case 12:
                $this->setSupEx($value);
                break;
            case 13:
                $this->setPvmonth($value);
                break;
            case 14:
                $this->setAutoTot($value);
                break;
            case 15:
                $this->setPvL($value);
                break;
            case 16:
                $this->setPvC($value);
                break;
            case 17:
                $this->setTposCur($value);
                break;
            case 18:
                $this->setSpCode($value);
                break;
            case 19:
                $this->setSpName($value);
                break;
            case 20:
                $this->setLr($value);
                break;
            case 21:
                $this->setReport1($value);
                break;
            case 22:
                $this->setStatusAto($value);
                break;
            case 23:
                $this->setStatusMember($value);
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
        $keys = AliReportMemberTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setMcode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNameT($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setMdate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setExpdate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPvdate($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPosCur($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPosCur4($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPosCur2($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPosCur1($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setNewMember($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setNewSup($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setNewEx($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSupEx($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setPvmonth($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAutoTot($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPvL($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPvC($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setTposCur($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setSpCode($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setSpName($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setLr($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setReport1($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setStatusAto($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setStatusMember($arr[$keys[23]]);
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
     * @return $this|\CciOrm\CciOrm\AliReportMember The current object, for fluid interface
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
        $criteria = new Criteria(AliReportMemberTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliReportMemberTableMap::COL_MCODE)) {
            $criteria->add(AliReportMemberTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_NAME_T)) {
            $criteria->add(AliReportMemberTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_MDATE)) {
            $criteria->add(AliReportMemberTableMap::COL_MDATE, $this->mdate);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_EXPDATE)) {
            $criteria->add(AliReportMemberTableMap::COL_EXPDATE, $this->expdate);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_PVDATE)) {
            $criteria->add(AliReportMemberTableMap::COL_PVDATE, $this->pvdate);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_POS_CUR)) {
            $criteria->add(AliReportMemberTableMap::COL_POS_CUR, $this->pos_cur);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_POS_CUR4)) {
            $criteria->add(AliReportMemberTableMap::COL_POS_CUR4, $this->pos_cur4);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_POS_CUR2)) {
            $criteria->add(AliReportMemberTableMap::COL_POS_CUR2, $this->pos_cur2);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_POS_CUR1)) {
            $criteria->add(AliReportMemberTableMap::COL_POS_CUR1, $this->pos_cur1);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_NEW_MEMBER)) {
            $criteria->add(AliReportMemberTableMap::COL_NEW_MEMBER, $this->new_member);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_NEW_SUP)) {
            $criteria->add(AliReportMemberTableMap::COL_NEW_SUP, $this->new_sup);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_NEW_EX)) {
            $criteria->add(AliReportMemberTableMap::COL_NEW_EX, $this->new_ex);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_SUP_EX)) {
            $criteria->add(AliReportMemberTableMap::COL_SUP_EX, $this->sup_ex);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_PVMONTH)) {
            $criteria->add(AliReportMemberTableMap::COL_PVMONTH, $this->pvmonth);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_AUTO_TOT)) {
            $criteria->add(AliReportMemberTableMap::COL_AUTO_TOT, $this->auto_tot);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_PV_L)) {
            $criteria->add(AliReportMemberTableMap::COL_PV_L, $this->pv_l);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_PV_C)) {
            $criteria->add(AliReportMemberTableMap::COL_PV_C, $this->pv_c);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_TPOS_CUR)) {
            $criteria->add(AliReportMemberTableMap::COL_TPOS_CUR, $this->tpos_cur);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_SP_CODE)) {
            $criteria->add(AliReportMemberTableMap::COL_SP_CODE, $this->sp_code);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_SP_NAME)) {
            $criteria->add(AliReportMemberTableMap::COL_SP_NAME, $this->sp_name);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_LR)) {
            $criteria->add(AliReportMemberTableMap::COL_LR, $this->lr);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_REPORT1)) {
            $criteria->add(AliReportMemberTableMap::COL_REPORT1, $this->report1);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_STATUS_ATO)) {
            $criteria->add(AliReportMemberTableMap::COL_STATUS_ATO, $this->status_ato);
        }
        if ($this->isColumnModified(AliReportMemberTableMap::COL_STATUS_MEMBER)) {
            $criteria->add(AliReportMemberTableMap::COL_STATUS_MEMBER, $this->status_member);
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
        throw new LogicException('The AliReportMember object has no primary key');

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
        $validPk = false;

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
     * Returns NULL since this table doesn't have a primary key.
     * This method exists only for BC and is deprecated!
     * @return null
     */
    public function getPrimaryKey()
    {
        return null;
    }

    /**
     * Dummy primary key setter.
     *
     * This function only exists to preserve backwards compatibility.  It is no longer
     * needed or required by the Persistent interface.  It will be removed in next BC-breaking
     * release of Propel.
     *
     * @deprecated
     */
    public function setPrimaryKey($pk)
    {
        // do nothing, because this object doesn't have any primary keys
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return ;
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliReportMember (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setMdate($this->getMdate());
        $copyObj->setExpdate($this->getExpdate());
        $copyObj->setPvdate($this->getPvdate());
        $copyObj->setPosCur($this->getPosCur());
        $copyObj->setPosCur4($this->getPosCur4());
        $copyObj->setPosCur2($this->getPosCur2());
        $copyObj->setPosCur1($this->getPosCur1());
        $copyObj->setNewMember($this->getNewMember());
        $copyObj->setNewSup($this->getNewSup());
        $copyObj->setNewEx($this->getNewEx());
        $copyObj->setSupEx($this->getSupEx());
        $copyObj->setPvmonth($this->getPvmonth());
        $copyObj->setAutoTot($this->getAutoTot());
        $copyObj->setPvL($this->getPvL());
        $copyObj->setPvC($this->getPvC());
        $copyObj->setTposCur($this->getTposCur());
        $copyObj->setSpCode($this->getSpCode());
        $copyObj->setSpName($this->getSpName());
        $copyObj->setLr($this->getLr());
        $copyObj->setReport1($this->getReport1());
        $copyObj->setStatusAto($this->getStatusAto());
        $copyObj->setStatusMember($this->getStatusMember());
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
     * @return \CciOrm\CciOrm\AliReportMember Clone of current object.
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
        $this->mcode = null;
        $this->name_t = null;
        $this->mdate = null;
        $this->expdate = null;
        $this->pvdate = null;
        $this->pos_cur = null;
        $this->pos_cur4 = null;
        $this->pos_cur2 = null;
        $this->pos_cur1 = null;
        $this->new_member = null;
        $this->new_sup = null;
        $this->new_ex = null;
        $this->sup_ex = null;
        $this->pvmonth = null;
        $this->auto_tot = null;
        $this->pv_l = null;
        $this->pv_c = null;
        $this->tpos_cur = null;
        $this->sp_code = null;
        $this->sp_name = null;
        $this->lr = null;
        $this->report1 = null;
        $this->status_ato = null;
        $this->status_member = null;
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
        return (string) $this->exportTo(AliReportMemberTableMap::DEFAULT_STRING_FORMAT);
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
