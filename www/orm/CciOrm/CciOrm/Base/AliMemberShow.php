<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliMemberShowQuery as ChildAliMemberShowQuery;
use CciOrm\CciOrm\Map\AliMemberShowTableMap;
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
 * Base class that represents a row from the 'ali_member_show' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliMemberShow implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliMemberShowTableMap';


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
     * The value for the mdate field.
     *
     * @var        DateTime
     */
    protected $mdate;

    /**
     * The value for the id field.
     *
     * @var        string
     */
    protected $id;

    /**
     * The value for the name_t field.
     *
     * @var        string
     */
    protected $name_t;

    /**
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the fast field.
     *
     * @var        string
     */
    protected $fast;

    /**
     * The value for the weakstrong field.
     *
     * @var        string
     */
    protected $weakstrong;

    /**
     * The value for the matching field.
     *
     * @var        string
     */
    protected $matching;

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
     * The value for the lv field.
     *
     * @var        int
     */
    protected $lv;

    /**
     * The value for the lr field.
     *
     * @var        int
     */
    protected $lr;

    /**
     * The value for the pos_cur field.
     *
     * @var        string
     */
    protected $pos_cur;

    /**
     * The value for the pos_cur1 field.
     *
     * @var        string
     */
    protected $pos_cur1;

    /**
     * The value for the pos_cur2 field.
     *
     * @var        string
     */
    protected $pos_cur2;

    /**
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * The value for the totpv field.
     *
     * @var        string
     */
    protected $totpv;

    /**
     * The value for the thismonth field.
     *
     * @var        string
     */
    protected $thismonth;

    /**
     * The value for the nextmonth field.
     *
     * @var        string
     */
    protected $nextmonth;

    /**
     * The value for the sadate field.
     *
     * @var        DateTime
     */
    protected $sadate;

    /**
     * The value for the okok field.
     *
     * @var        int
     */
    protected $okok;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliMemberShow object.
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
     * Compares this with another <code>AliMemberShow</code> instance.  If
     * <code>obj</code> is an instance of <code>AliMemberShow</code>, delegates to
     * <code>equals(AliMemberShow)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliMemberShow The current object, for fluid interface
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
     * Get the [id] column value.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the [fast] column value.
     *
     * @return string
     */
    public function getFast()
    {
        return $this->fast;
    }

    /**
     * Get the [weakstrong] column value.
     *
     * @return string
     */
    public function getWeakstrong()
    {
        return $this->weakstrong;
    }

    /**
     * Get the [matching] column value.
     *
     * @return string
     */
    public function getMatching()
    {
        return $this->matching;
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
     * Get the [lv] column value.
     *
     * @return int
     */
    public function getLv()
    {
        return $this->lv;
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
     * Get the [pos_cur] column value.
     *
     * @return string
     */
    public function getPosCur()
    {
        return $this->pos_cur;
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
     * Get the [pos_cur2] column value.
     *
     * @return string
     */
    public function getPosCur2()
    {
        return $this->pos_cur2;
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
     * Get the [totpv] column value.
     *
     * @return string
     */
    public function getTotpv()
    {
        return $this->totpv;
    }

    /**
     * Get the [thismonth] column value.
     *
     * @return string
     */
    public function getThismonth()
    {
        return $this->thismonth;
    }

    /**
     * Get the [nextmonth] column value.
     *
     * @return string
     */
    public function getNextmonth()
    {
        return $this->nextmonth;
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
     * Get the [okok] column value.
     *
     * @return int
     */
    public function getOkok()
    {
        return $this->okok;
    }

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Sets the value of [mdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setMdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->mdate !== null || $dt !== null) {
            if ($this->mdate === null || $dt === null || $dt->format("Y-m-d") !== $this->mdate->format("Y-m-d")) {
                $this->mdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliMemberShowTableMap::COL_MDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setMdate()

    /**
     * Set the value of [id] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [fast] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setFast($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fast !== $v) {
            $this->fast = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_FAST] = true;
        }

        return $this;
    } // setFast()

    /**
     * Set the value of [weakstrong] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setWeakstrong($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->weakstrong !== $v) {
            $this->weakstrong = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_WEAKSTRONG] = true;
        }

        return $this;
    } // setWeakstrong()

    /**
     * Set the value of [matching] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setMatching($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->matching !== $v) {
            $this->matching = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_MATCHING] = true;
        }

        return $this;
    } // setMatching()

    /**
     * Set the value of [upa_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setUpaCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->upa_code !== $v) {
            $this->upa_code = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_UPA_CODE] = true;
        }

        return $this;
    } // setUpaCode()

    /**
     * Set the value of [upa_name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setUpaName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->upa_name !== $v) {
            $this->upa_name = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_UPA_NAME] = true;
        }

        return $this;
    } // setUpaName()

    /**
     * Set the value of [sp_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setSpCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_code !== $v) {
            $this->sp_code = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_SP_CODE] = true;
        }

        return $this;
    } // setSpCode()

    /**
     * Set the value of [sp_name] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setSpName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sp_name !== $v) {
            $this->sp_name = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_SP_NAME] = true;
        }

        return $this;
    } // setSpName()

    /**
     * Set the value of [lv] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setLv($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lv !== $v) {
            $this->lv = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_LV] = true;
        }

        return $this;
    } // setLv()

    /**
     * Set the value of [lr] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setLr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lr !== $v) {
            $this->lr = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_LR] = true;
        }

        return $this;
    } // setLr()

    /**
     * Set the value of [pos_cur] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setPosCur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur !== $v) {
            $this->pos_cur = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_POS_CUR] = true;
        }

        return $this;
    } // setPosCur()

    /**
     * Set the value of [pos_cur1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setPosCur1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur1 !== $v) {
            $this->pos_cur1 = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_POS_CUR1] = true;
        }

        return $this;
    } // setPosCur1()

    /**
     * Set the value of [pos_cur2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setPosCur2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur2 !== $v) {
            $this->pos_cur2 = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_POS_CUR2] = true;
        }

        return $this;
    } // setPosCur2()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [totpv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setTotpv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->totpv !== $v) {
            $this->totpv = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_TOTPV] = true;
        }

        return $this;
    } // setTotpv()

    /**
     * Set the value of [thismonth] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setThismonth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thismonth !== $v) {
            $this->thismonth = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_THISMONTH] = true;
        }

        return $this;
    } // setThismonth()

    /**
     * Set the value of [nextmonth] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setNextmonth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nextmonth !== $v) {
            $this->nextmonth = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_NEXTMONTH] = true;
        }

        return $this;
    } // setNextmonth()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliMemberShowTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Set the value of [okok] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object (for fluent API support)
     */
    public function setOkok($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->okok !== $v) {
            $this->okok = $v;
            $this->modifiedColumns[AliMemberShowTableMap::COL_OKOK] = true;
        }

        return $this;
    } // setOkok()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliMemberShowTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliMemberShowTableMap::translateFieldName('Mdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->mdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliMemberShowTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliMemberShowTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliMemberShowTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliMemberShowTableMap::translateFieldName('Fast', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fast = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliMemberShowTableMap::translateFieldName('Weakstrong', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weakstrong = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliMemberShowTableMap::translateFieldName('Matching', TableMap::TYPE_PHPNAME, $indexType)];
            $this->matching = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliMemberShowTableMap::translateFieldName('UpaCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->upa_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliMemberShowTableMap::translateFieldName('UpaName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->upa_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliMemberShowTableMap::translateFieldName('SpCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliMemberShowTableMap::translateFieldName('SpName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sp_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliMemberShowTableMap::translateFieldName('Lv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lv = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliMemberShowTableMap::translateFieldName('Lr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliMemberShowTableMap::translateFieldName('PosCur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliMemberShowTableMap::translateFieldName('PosCur1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliMemberShowTableMap::translateFieldName('PosCur2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliMemberShowTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliMemberShowTableMap::translateFieldName('Totpv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totpv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliMemberShowTableMap::translateFieldName('Thismonth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thismonth = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliMemberShowTableMap::translateFieldName('Nextmonth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nextmonth = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliMemberShowTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliMemberShowTableMap::translateFieldName('Okok', TableMap::TYPE_PHPNAME, $indexType)];
            $this->okok = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 23; // 23 = AliMemberShowTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliMemberShow'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliMemberShowTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliMemberShowQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliMemberShow::setDeleted()
     * @see AliMemberShow::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberShowTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliMemberShowQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliMemberShowTableMap::DATABASE_NAME);
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
                AliMemberShowTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliMemberShowTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliMemberShowTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliMemberShowTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_MDATE)) {
            $modifiedColumns[':p' . $index++]  = 'mdate';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_FAST)) {
            $modifiedColumns[':p' . $index++]  = 'fast';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_WEAKSTRONG)) {
            $modifiedColumns[':p' . $index++]  = 'weakstrong';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_MATCHING)) {
            $modifiedColumns[':p' . $index++]  = 'matching';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_UPA_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'upa_code';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_UPA_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'upa_name';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_SP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'sp_code';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_SP_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'sp_name';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_LV)) {
            $modifiedColumns[':p' . $index++]  = 'lv';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_LR)) {
            $modifiedColumns[':p' . $index++]  = 'lr';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_POS_CUR)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_POS_CUR1)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur1';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_POS_CUR2)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur2';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_TOTPV)) {
            $modifiedColumns[':p' . $index++]  = 'totpv';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_THISMONTH)) {
            $modifiedColumns[':p' . $index++]  = 'thismonth';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_NEXTMONTH)) {
            $modifiedColumns[':p' . $index++]  = 'nextmonth';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_OKOK)) {
            $modifiedColumns[':p' . $index++]  = 'okok';
        }

        $sql = sprintf(
            'INSERT INTO ali_member_show (%s) VALUES (%s)',
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
                    case 'mdate':
                        $stmt->bindValue($identifier, $this->mdate ? $this->mdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'fast':
                        $stmt->bindValue($identifier, $this->fast, PDO::PARAM_STR);
                        break;
                    case 'weakstrong':
                        $stmt->bindValue($identifier, $this->weakstrong, PDO::PARAM_STR);
                        break;
                    case 'matching':
                        $stmt->bindValue($identifier, $this->matching, PDO::PARAM_STR);
                        break;
                    case 'upa_code':
                        $stmt->bindValue($identifier, $this->upa_code, PDO::PARAM_STR);
                        break;
                    case 'upa_name':
                        $stmt->bindValue($identifier, $this->upa_name, PDO::PARAM_STR);
                        break;
                    case 'sp_code':
                        $stmt->bindValue($identifier, $this->sp_code, PDO::PARAM_STR);
                        break;
                    case 'sp_name':
                        $stmt->bindValue($identifier, $this->sp_name, PDO::PARAM_STR);
                        break;
                    case 'lv':
                        $stmt->bindValue($identifier, $this->lv, PDO::PARAM_INT);
                        break;
                    case 'lr':
                        $stmt->bindValue($identifier, $this->lr, PDO::PARAM_INT);
                        break;
                    case 'pos_cur':
                        $stmt->bindValue($identifier, $this->pos_cur, PDO::PARAM_STR);
                        break;
                    case 'pos_cur1':
                        $stmt->bindValue($identifier, $this->pos_cur1, PDO::PARAM_STR);
                        break;
                    case 'pos_cur2':
                        $stmt->bindValue($identifier, $this->pos_cur2, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                    case 'totpv':
                        $stmt->bindValue($identifier, $this->totpv, PDO::PARAM_STR);
                        break;
                    case 'thismonth':
                        $stmt->bindValue($identifier, $this->thismonth, PDO::PARAM_STR);
                        break;
                    case 'nextmonth':
                        $stmt->bindValue($identifier, $this->nextmonth, PDO::PARAM_STR);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate ? $this->sadate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'okok':
                        $stmt->bindValue($identifier, $this->okok, PDO::PARAM_INT);
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
        $pos = AliMemberShowTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getMdate();
                break;
            case 2:
                return $this->getId();
                break;
            case 3:
                return $this->getNameT();
                break;
            case 4:
                return $this->getTotal();
                break;
            case 5:
                return $this->getFast();
                break;
            case 6:
                return $this->getWeakstrong();
                break;
            case 7:
                return $this->getMatching();
                break;
            case 8:
                return $this->getUpaCode();
                break;
            case 9:
                return $this->getUpaName();
                break;
            case 10:
                return $this->getSpCode();
                break;
            case 11:
                return $this->getSpName();
                break;
            case 12:
                return $this->getLv();
                break;
            case 13:
                return $this->getLr();
                break;
            case 14:
                return $this->getPosCur();
                break;
            case 15:
                return $this->getPosCur1();
                break;
            case 16:
                return $this->getPosCur2();
                break;
            case 17:
                return $this->getUid();
                break;
            case 18:
                return $this->getTotpv();
                break;
            case 19:
                return $this->getThismonth();
                break;
            case 20:
                return $this->getNextmonth();
                break;
            case 21:
                return $this->getSadate();
                break;
            case 22:
                return $this->getOkok();
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

        if (isset($alreadyDumpedObjects['AliMemberShow'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliMemberShow'][$this->hashCode()] = true;
        $keys = AliMemberShowTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getMcode(),
            $keys[1] => $this->getMdate(),
            $keys[2] => $this->getId(),
            $keys[3] => $this->getNameT(),
            $keys[4] => $this->getTotal(),
            $keys[5] => $this->getFast(),
            $keys[6] => $this->getWeakstrong(),
            $keys[7] => $this->getMatching(),
            $keys[8] => $this->getUpaCode(),
            $keys[9] => $this->getUpaName(),
            $keys[10] => $this->getSpCode(),
            $keys[11] => $this->getSpName(),
            $keys[12] => $this->getLv(),
            $keys[13] => $this->getLr(),
            $keys[14] => $this->getPosCur(),
            $keys[15] => $this->getPosCur1(),
            $keys[16] => $this->getPosCur2(),
            $keys[17] => $this->getUid(),
            $keys[18] => $this->getTotpv(),
            $keys[19] => $this->getThismonth(),
            $keys[20] => $this->getNextmonth(),
            $keys[21] => $this->getSadate(),
            $keys[22] => $this->getOkok(),
        );
        if ($result[$keys[1]] instanceof \DateTimeInterface) {
            $result[$keys[1]] = $result[$keys[1]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliMemberShow
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliMemberShowTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliMemberShow
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setMcode($value);
                break;
            case 1:
                $this->setMdate($value);
                break;
            case 2:
                $this->setId($value);
                break;
            case 3:
                $this->setNameT($value);
                break;
            case 4:
                $this->setTotal($value);
                break;
            case 5:
                $this->setFast($value);
                break;
            case 6:
                $this->setWeakstrong($value);
                break;
            case 7:
                $this->setMatching($value);
                break;
            case 8:
                $this->setUpaCode($value);
                break;
            case 9:
                $this->setUpaName($value);
                break;
            case 10:
                $this->setSpCode($value);
                break;
            case 11:
                $this->setSpName($value);
                break;
            case 12:
                $this->setLv($value);
                break;
            case 13:
                $this->setLr($value);
                break;
            case 14:
                $this->setPosCur($value);
                break;
            case 15:
                $this->setPosCur1($value);
                break;
            case 16:
                $this->setPosCur2($value);
                break;
            case 17:
                $this->setUid($value);
                break;
            case 18:
                $this->setTotpv($value);
                break;
            case 19:
                $this->setThismonth($value);
                break;
            case 20:
                $this->setNextmonth($value);
                break;
            case 21:
                $this->setSadate($value);
                break;
            case 22:
                $this->setOkok($value);
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
        $keys = AliMemberShowTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setMcode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMdate($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNameT($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTotal($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setFast($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setWeakstrong($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setMatching($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setUpaCode($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setUpaName($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSpCode($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSpName($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setLv($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setLr($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPosCur($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setPosCur1($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setPosCur2($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setUid($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTotpv($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setThismonth($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setNextmonth($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setSadate($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setOkok($arr[$keys[22]]);
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
     * @return $this|\CciOrm\CciOrm\AliMemberShow The current object, for fluid interface
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
        $criteria = new Criteria(AliMemberShowTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliMemberShowTableMap::COL_MCODE)) {
            $criteria->add(AliMemberShowTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_MDATE)) {
            $criteria->add(AliMemberShowTableMap::COL_MDATE, $this->mdate);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_ID)) {
            $criteria->add(AliMemberShowTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_NAME_T)) {
            $criteria->add(AliMemberShowTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_TOTAL)) {
            $criteria->add(AliMemberShowTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_FAST)) {
            $criteria->add(AliMemberShowTableMap::COL_FAST, $this->fast);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_WEAKSTRONG)) {
            $criteria->add(AliMemberShowTableMap::COL_WEAKSTRONG, $this->weakstrong);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_MATCHING)) {
            $criteria->add(AliMemberShowTableMap::COL_MATCHING, $this->matching);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_UPA_CODE)) {
            $criteria->add(AliMemberShowTableMap::COL_UPA_CODE, $this->upa_code);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_UPA_NAME)) {
            $criteria->add(AliMemberShowTableMap::COL_UPA_NAME, $this->upa_name);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_SP_CODE)) {
            $criteria->add(AliMemberShowTableMap::COL_SP_CODE, $this->sp_code);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_SP_NAME)) {
            $criteria->add(AliMemberShowTableMap::COL_SP_NAME, $this->sp_name);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_LV)) {
            $criteria->add(AliMemberShowTableMap::COL_LV, $this->lv);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_LR)) {
            $criteria->add(AliMemberShowTableMap::COL_LR, $this->lr);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_POS_CUR)) {
            $criteria->add(AliMemberShowTableMap::COL_POS_CUR, $this->pos_cur);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_POS_CUR1)) {
            $criteria->add(AliMemberShowTableMap::COL_POS_CUR1, $this->pos_cur1);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_POS_CUR2)) {
            $criteria->add(AliMemberShowTableMap::COL_POS_CUR2, $this->pos_cur2);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_UID)) {
            $criteria->add(AliMemberShowTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_TOTPV)) {
            $criteria->add(AliMemberShowTableMap::COL_TOTPV, $this->totpv);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_THISMONTH)) {
            $criteria->add(AliMemberShowTableMap::COL_THISMONTH, $this->thismonth);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_NEXTMONTH)) {
            $criteria->add(AliMemberShowTableMap::COL_NEXTMONTH, $this->nextmonth);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_SADATE)) {
            $criteria->add(AliMemberShowTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliMemberShowTableMap::COL_OKOK)) {
            $criteria->add(AliMemberShowTableMap::COL_OKOK, $this->okok);
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
        $criteria = ChildAliMemberShowQuery::create();
        $criteria->add(AliMemberShowTableMap::COL_ID, $this->id);

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
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       string $key Primary key.
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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliMemberShow (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMcode($this->getMcode());
        $copyObj->setMdate($this->getMdate());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setFast($this->getFast());
        $copyObj->setWeakstrong($this->getWeakstrong());
        $copyObj->setMatching($this->getMatching());
        $copyObj->setUpaCode($this->getUpaCode());
        $copyObj->setUpaName($this->getUpaName());
        $copyObj->setSpCode($this->getSpCode());
        $copyObj->setSpName($this->getSpName());
        $copyObj->setLv($this->getLv());
        $copyObj->setLr($this->getLr());
        $copyObj->setPosCur($this->getPosCur());
        $copyObj->setPosCur1($this->getPosCur1());
        $copyObj->setPosCur2($this->getPosCur2());
        $copyObj->setUid($this->getUid());
        $copyObj->setTotpv($this->getTotpv());
        $copyObj->setThismonth($this->getThismonth());
        $copyObj->setNextmonth($this->getNextmonth());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setOkok($this->getOkok());
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
     * @return \CciOrm\CciOrm\AliMemberShow Clone of current object.
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
        $this->mdate = null;
        $this->id = null;
        $this->name_t = null;
        $this->total = null;
        $this->fast = null;
        $this->weakstrong = null;
        $this->matching = null;
        $this->upa_code = null;
        $this->upa_name = null;
        $this->sp_code = null;
        $this->sp_name = null;
        $this->lv = null;
        $this->lr = null;
        $this->pos_cur = null;
        $this->pos_cur1 = null;
        $this->pos_cur2 = null;
        $this->uid = null;
        $this->totpv = null;
        $this->thismonth = null;
        $this->nextmonth = null;
        $this->sadate = null;
        $this->okok = null;
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
        return (string) $this->exportTo(AliMemberShowTableMap::DEFAULT_STRING_FORMAT);
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
