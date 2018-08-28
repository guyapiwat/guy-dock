<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliReportPointQuery as ChildAliReportPointQuery;
use CciOrm\CciOrm\Map\AliReportPointTableMap;
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

/**
 * Base class that represents a row from the 'ali_report_point' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliReportPoint implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliReportPointTableMap';


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
     * The value for the point field.
     *
     * @var        int
     */
    protected $point;

    /**
     * The value for the monthpv field.
     *
     * @var        string
     */
    protected $monthpv;

    /**
     * The value for the carry_l field.
     *
     * @var        int
     */
    protected $carry_l;

    /**
     * The value for the carry_c field.
     *
     * @var        int
     */
    protected $carry_c;

    /**
     * The value for the ro_l field.
     *
     * @var        int
     */
    protected $ro_l;

    /**
     * The value for the ro_c field.
     *
     * @var        int
     */
    protected $ro_c;

    /**
     * The value for the all_l field.
     *
     * @var        int
     */
    protected $all_l;

    /**
     * The value for the all_c field.
     *
     * @var        int
     */
    protected $all_c;

    /**
     * The value for the allpv field.
     *
     * @var        int
     */
    protected $allpv;

    /**
     * The value for the pos_cur field.
     *
     * @var        string
     */
    protected $pos_cur;

    /**
     * The value for the new_sponsor field.
     *
     * @var        int
     */
    protected $new_sponsor;

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
     * The value for the travelpoint field.
     *
     * @var        string
     */
    protected $travelpoint;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliReportPoint object.
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
     * Compares this with another <code>AliReportPoint</code> instance.  If
     * <code>obj</code> is an instance of <code>AliReportPoint</code>, delegates to
     * <code>equals(AliReportPoint)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliReportPoint The current object, for fluid interface
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
     * Get the [point] column value.
     *
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Get the [monthpv] column value.
     *
     * @return string
     */
    public function getMonthpv()
    {
        return $this->monthpv;
    }

    /**
     * Get the [carry_l] column value.
     *
     * @return int
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
     * Get the [ro_l] column value.
     *
     * @return int
     */
    public function getRoL()
    {
        return $this->ro_l;
    }

    /**
     * Get the [ro_c] column value.
     *
     * @return int
     */
    public function getRoC()
    {
        return $this->ro_c;
    }

    /**
     * Get the [all_l] column value.
     *
     * @return int
     */
    public function getAllL()
    {
        return $this->all_l;
    }

    /**
     * Get the [all_c] column value.
     *
     * @return int
     */
    public function getAllC()
    {
        return $this->all_c;
    }

    /**
     * Get the [allpv] column value.
     *
     * @return int
     */
    public function getAllpv()
    {
        return $this->allpv;
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
     * Get the [new_sponsor] column value.
     *
     * @return int
     */
    public function getNewSponsor()
    {
        return $this->new_sponsor;
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
     * Get the [travelpoint] column value.
     *
     * @return string
     */
    public function getTravelpoint()
    {
        return $this->travelpoint;
    }

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [point] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setPoint($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->point !== $v) {
            $this->point = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_POINT] = true;
        }

        return $this;
    } // setPoint()

    /**
     * Set the value of [monthpv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setMonthpv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->monthpv !== $v) {
            $this->monthpv = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_MONTHPV] = true;
        }

        return $this;
    } // setMonthpv()

    /**
     * Set the value of [carry_l] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setCarryL($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carry_l !== $v) {
            $this->carry_l = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_CARRY_L] = true;
        }

        return $this;
    } // setCarryL()

    /**
     * Set the value of [carry_c] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setCarryC($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->carry_c !== $v) {
            $this->carry_c = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_CARRY_C] = true;
        }

        return $this;
    } // setCarryC()

    /**
     * Set the value of [ro_l] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setRoL($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ro_l !== $v) {
            $this->ro_l = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_RO_L] = true;
        }

        return $this;
    } // setRoL()

    /**
     * Set the value of [ro_c] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setRoC($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ro_c !== $v) {
            $this->ro_c = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_RO_C] = true;
        }

        return $this;
    } // setRoC()

    /**
     * Set the value of [all_l] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setAllL($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->all_l !== $v) {
            $this->all_l = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_ALL_L] = true;
        }

        return $this;
    } // setAllL()

    /**
     * Set the value of [all_c] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setAllC($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->all_c !== $v) {
            $this->all_c = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_ALL_C] = true;
        }

        return $this;
    } // setAllC()

    /**
     * Set the value of [allpv] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setAllpv($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->allpv !== $v) {
            $this->allpv = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_ALLPV] = true;
        }

        return $this;
    } // setAllpv()

    /**
     * Set the value of [pos_cur] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setPosCur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pos_cur !== $v) {
            $this->pos_cur = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_POS_CUR] = true;
        }

        return $this;
    } // setPosCur()

    /**
     * Set the value of [new_sponsor] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setNewSponsor($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->new_sponsor !== $v) {
            $this->new_sponsor = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_NEW_SPONSOR] = true;
        }

        return $this;
    } // setNewSponsor()

    /**
     * Set the value of [new_sup] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setNewSup($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->new_sup !== $v) {
            $this->new_sup = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_NEW_SUP] = true;
        }

        return $this;
    } // setNewSup()

    /**
     * Set the value of [new_ex] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setNewEx($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->new_ex !== $v) {
            $this->new_ex = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_NEW_EX] = true;
        }

        return $this;
    } // setNewEx()

    /**
     * Set the value of [sup_ex] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setSupEx($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sup_ex !== $v) {
            $this->sup_ex = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_SUP_EX] = true;
        }

        return $this;
    } // setSupEx()

    /**
     * Set the value of [travelpoint] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object (for fluent API support)
     */
    public function setTravelpoint($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->travelpoint !== $v) {
            $this->travelpoint = $v;
            $this->modifiedColumns[AliReportPointTableMap::COL_TRAVELPOINT] = true;
        }

        return $this;
    } // setTravelpoint()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliReportPointTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliReportPointTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliReportPointTableMap::translateFieldName('Point', TableMap::TYPE_PHPNAME, $indexType)];
            $this->point = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliReportPointTableMap::translateFieldName('Monthpv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->monthpv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliReportPointTableMap::translateFieldName('CarryL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carry_l = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliReportPointTableMap::translateFieldName('CarryC', TableMap::TYPE_PHPNAME, $indexType)];
            $this->carry_c = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliReportPointTableMap::translateFieldName('RoL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ro_l = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliReportPointTableMap::translateFieldName('RoC', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ro_c = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliReportPointTableMap::translateFieldName('AllL', TableMap::TYPE_PHPNAME, $indexType)];
            $this->all_l = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliReportPointTableMap::translateFieldName('AllC', TableMap::TYPE_PHPNAME, $indexType)];
            $this->all_c = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliReportPointTableMap::translateFieldName('Allpv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->allpv = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliReportPointTableMap::translateFieldName('PosCur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pos_cur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliReportPointTableMap::translateFieldName('NewSponsor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->new_sponsor = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliReportPointTableMap::translateFieldName('NewSup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->new_sup = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliReportPointTableMap::translateFieldName('NewEx', TableMap::TYPE_PHPNAME, $indexType)];
            $this->new_ex = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliReportPointTableMap::translateFieldName('SupEx', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sup_ex = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliReportPointTableMap::translateFieldName('Travelpoint', TableMap::TYPE_PHPNAME, $indexType)];
            $this->travelpoint = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = AliReportPointTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliReportPoint'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliReportPointTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliReportPointQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliReportPoint::setDeleted()
     * @see AliReportPoint::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPointTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliReportPointQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliReportPointTableMap::DATABASE_NAME);
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
                AliReportPointTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(AliReportPointTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_POINT)) {
            $modifiedColumns[':p' . $index++]  = 'point';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_MONTHPV)) {
            $modifiedColumns[':p' . $index++]  = 'monthpv';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_CARRY_L)) {
            $modifiedColumns[':p' . $index++]  = 'carry_l';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_CARRY_C)) {
            $modifiedColumns[':p' . $index++]  = 'carry_c';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_RO_L)) {
            $modifiedColumns[':p' . $index++]  = 'ro_l';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_RO_C)) {
            $modifiedColumns[':p' . $index++]  = 'ro_c';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_ALL_L)) {
            $modifiedColumns[':p' . $index++]  = 'all_l';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_ALL_C)) {
            $modifiedColumns[':p' . $index++]  = 'all_c';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_ALLPV)) {
            $modifiedColumns[':p' . $index++]  = 'allpv';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_POS_CUR)) {
            $modifiedColumns[':p' . $index++]  = 'pos_cur';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_NEW_SPONSOR)) {
            $modifiedColumns[':p' . $index++]  = 'new_sponsor';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_NEW_SUP)) {
            $modifiedColumns[':p' . $index++]  = 'new_sup';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_NEW_EX)) {
            $modifiedColumns[':p' . $index++]  = 'new_ex';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_SUP_EX)) {
            $modifiedColumns[':p' . $index++]  = 'sup_ex';
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_TRAVELPOINT)) {
            $modifiedColumns[':p' . $index++]  = 'travelpoint';
        }

        $sql = sprintf(
            'INSERT INTO ali_report_point (%s) VALUES (%s)',
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
                    case 'point':
                        $stmt->bindValue($identifier, $this->point, PDO::PARAM_INT);
                        break;
                    case 'monthpv':
                        $stmt->bindValue($identifier, $this->monthpv, PDO::PARAM_STR);
                        break;
                    case 'carry_l':
                        $stmt->bindValue($identifier, $this->carry_l, PDO::PARAM_INT);
                        break;
                    case 'carry_c':
                        $stmt->bindValue($identifier, $this->carry_c, PDO::PARAM_INT);
                        break;
                    case 'ro_l':
                        $stmt->bindValue($identifier, $this->ro_l, PDO::PARAM_INT);
                        break;
                    case 'ro_c':
                        $stmt->bindValue($identifier, $this->ro_c, PDO::PARAM_INT);
                        break;
                    case 'all_l':
                        $stmt->bindValue($identifier, $this->all_l, PDO::PARAM_INT);
                        break;
                    case 'all_c':
                        $stmt->bindValue($identifier, $this->all_c, PDO::PARAM_INT);
                        break;
                    case 'allpv':
                        $stmt->bindValue($identifier, $this->allpv, PDO::PARAM_INT);
                        break;
                    case 'pos_cur':
                        $stmt->bindValue($identifier, $this->pos_cur, PDO::PARAM_STR);
                        break;
                    case 'new_sponsor':
                        $stmt->bindValue($identifier, $this->new_sponsor, PDO::PARAM_INT);
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
                    case 'travelpoint':
                        $stmt->bindValue($identifier, $this->travelpoint, PDO::PARAM_STR);
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
        $pos = AliReportPointTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getPoint();
                break;
            case 3:
                return $this->getMonthpv();
                break;
            case 4:
                return $this->getCarryL();
                break;
            case 5:
                return $this->getCarryC();
                break;
            case 6:
                return $this->getRoL();
                break;
            case 7:
                return $this->getRoC();
                break;
            case 8:
                return $this->getAllL();
                break;
            case 9:
                return $this->getAllC();
                break;
            case 10:
                return $this->getAllpv();
                break;
            case 11:
                return $this->getPosCur();
                break;
            case 12:
                return $this->getNewSponsor();
                break;
            case 13:
                return $this->getNewSup();
                break;
            case 14:
                return $this->getNewEx();
                break;
            case 15:
                return $this->getSupEx();
                break;
            case 16:
                return $this->getTravelpoint();
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

        if (isset($alreadyDumpedObjects['AliReportPoint'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliReportPoint'][$this->hashCode()] = true;
        $keys = AliReportPointTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getMcode(),
            $keys[1] => $this->getNameT(),
            $keys[2] => $this->getPoint(),
            $keys[3] => $this->getMonthpv(),
            $keys[4] => $this->getCarryL(),
            $keys[5] => $this->getCarryC(),
            $keys[6] => $this->getRoL(),
            $keys[7] => $this->getRoC(),
            $keys[8] => $this->getAllL(),
            $keys[9] => $this->getAllC(),
            $keys[10] => $this->getAllpv(),
            $keys[11] => $this->getPosCur(),
            $keys[12] => $this->getNewSponsor(),
            $keys[13] => $this->getNewSup(),
            $keys[14] => $this->getNewEx(),
            $keys[15] => $this->getSupEx(),
            $keys[16] => $this->getTravelpoint(),
        );
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
     * @return $this|\CciOrm\CciOrm\AliReportPoint
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliReportPointTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliReportPoint
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
                $this->setPoint($value);
                break;
            case 3:
                $this->setMonthpv($value);
                break;
            case 4:
                $this->setCarryL($value);
                break;
            case 5:
                $this->setCarryC($value);
                break;
            case 6:
                $this->setRoL($value);
                break;
            case 7:
                $this->setRoC($value);
                break;
            case 8:
                $this->setAllL($value);
                break;
            case 9:
                $this->setAllC($value);
                break;
            case 10:
                $this->setAllpv($value);
                break;
            case 11:
                $this->setPosCur($value);
                break;
            case 12:
                $this->setNewSponsor($value);
                break;
            case 13:
                $this->setNewSup($value);
                break;
            case 14:
                $this->setNewEx($value);
                break;
            case 15:
                $this->setSupEx($value);
                break;
            case 16:
                $this->setTravelpoint($value);
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
        $keys = AliReportPointTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setMcode($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNameT($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPoint($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setMonthpv($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCarryL($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCarryC($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRoL($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setRoC($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAllL($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAllC($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setAllpv($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPosCur($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setNewSponsor($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setNewSup($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setNewEx($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setSupEx($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTravelpoint($arr[$keys[16]]);
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
     * @return $this|\CciOrm\CciOrm\AliReportPoint The current object, for fluid interface
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
        $criteria = new Criteria(AliReportPointTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliReportPointTableMap::COL_MCODE)) {
            $criteria->add(AliReportPointTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_NAME_T)) {
            $criteria->add(AliReportPointTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_POINT)) {
            $criteria->add(AliReportPointTableMap::COL_POINT, $this->point);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_MONTHPV)) {
            $criteria->add(AliReportPointTableMap::COL_MONTHPV, $this->monthpv);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_CARRY_L)) {
            $criteria->add(AliReportPointTableMap::COL_CARRY_L, $this->carry_l);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_CARRY_C)) {
            $criteria->add(AliReportPointTableMap::COL_CARRY_C, $this->carry_c);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_RO_L)) {
            $criteria->add(AliReportPointTableMap::COL_RO_L, $this->ro_l);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_RO_C)) {
            $criteria->add(AliReportPointTableMap::COL_RO_C, $this->ro_c);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_ALL_L)) {
            $criteria->add(AliReportPointTableMap::COL_ALL_L, $this->all_l);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_ALL_C)) {
            $criteria->add(AliReportPointTableMap::COL_ALL_C, $this->all_c);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_ALLPV)) {
            $criteria->add(AliReportPointTableMap::COL_ALLPV, $this->allpv);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_POS_CUR)) {
            $criteria->add(AliReportPointTableMap::COL_POS_CUR, $this->pos_cur);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_NEW_SPONSOR)) {
            $criteria->add(AliReportPointTableMap::COL_NEW_SPONSOR, $this->new_sponsor);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_NEW_SUP)) {
            $criteria->add(AliReportPointTableMap::COL_NEW_SUP, $this->new_sup);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_NEW_EX)) {
            $criteria->add(AliReportPointTableMap::COL_NEW_EX, $this->new_ex);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_SUP_EX)) {
            $criteria->add(AliReportPointTableMap::COL_SUP_EX, $this->sup_ex);
        }
        if ($this->isColumnModified(AliReportPointTableMap::COL_TRAVELPOINT)) {
            $criteria->add(AliReportPointTableMap::COL_TRAVELPOINT, $this->travelpoint);
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
        throw new LogicException('The AliReportPoint object has no primary key');

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliReportPoint (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setPoint($this->getPoint());
        $copyObj->setMonthpv($this->getMonthpv());
        $copyObj->setCarryL($this->getCarryL());
        $copyObj->setCarryC($this->getCarryC());
        $copyObj->setRoL($this->getRoL());
        $copyObj->setRoC($this->getRoC());
        $copyObj->setAllL($this->getAllL());
        $copyObj->setAllC($this->getAllC());
        $copyObj->setAllpv($this->getAllpv());
        $copyObj->setPosCur($this->getPosCur());
        $copyObj->setNewSponsor($this->getNewSponsor());
        $copyObj->setNewSup($this->getNewSup());
        $copyObj->setNewEx($this->getNewEx());
        $copyObj->setSupEx($this->getSupEx());
        $copyObj->setTravelpoint($this->getTravelpoint());
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
     * @return \CciOrm\CciOrm\AliReportPoint Clone of current object.
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
        $this->point = null;
        $this->monthpv = null;
        $this->carry_l = null;
        $this->carry_c = null;
        $this->ro_l = null;
        $this->ro_c = null;
        $this->all_l = null;
        $this->all_c = null;
        $this->allpv = null;
        $this->pos_cur = null;
        $this->new_sponsor = null;
        $this->new_sup = null;
        $this->new_ex = null;
        $this->sup_ex = null;
        $this->travelpoint = null;
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
        return (string) $this->exportTo(AliReportPointTableMap::DEFAULT_STRING_FORMAT);
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
