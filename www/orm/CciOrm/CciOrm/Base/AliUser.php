<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliUserQuery as ChildAliUserQuery;
use CciOrm\CciOrm\Map\AliUserTableMap;
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
 * Base class that represents a row from the 'ali_user' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliUser implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliUserTableMap';


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
     * The value for the uid field.
     *
     * @var        int
     */
    protected $uid;

    /**
     * The value for the usercode field.
     *
     * @var        string
     */
    protected $usercode;

    /**
     * The value for the username field.
     *
     * @var        string
     */
    protected $username;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * The value for the usertype field.
     *
     * @var        int
     */
    protected $usertype;

    /**
     * The value for the object1 field.
     *
     * @var        int
     */
    protected $object1;

    /**
     * The value for the object2 field.
     *
     * @var        int
     */
    protected $object2;

    /**
     * The value for the object3 field.
     *
     * @var        int
     */
    protected $object3;

    /**
     * The value for the object4 field.
     *
     * @var        int
     */
    protected $object4;

    /**
     * The value for the object5 field.
     *
     * @var        int
     */
    protected $object5;

    /**
     * The value for the object6 field.
     *
     * @var        int
     */
    protected $object6;

    /**
     * The value for the object7 field.
     *
     * @var        int
     */
    protected $object7;

    /**
     * The value for the object8 field.
     *
     * @var        int
     */
    protected $object8;

    /**
     * The value for the object9 field.
     *
     * @var        int
     */
    protected $object9;

    /**
     * The value for the object10 field.
     *
     * @var        int
     */
    protected $object10;

    /**
     * The value for the inv_ref field.
     *
     * @var        string
     */
    protected $inv_ref;

    /**
     * The value for the accessright field.
     *
     * @var        string
     */
    protected $accessright;

    /**
     * The value for the code_ref field.
     *
     * @var        string
     */
    protected $code_ref;

    /**
     * The value for the checkbackdate field.
     *
     * @var        int
     */
    protected $checkbackdate;

    /**
     * The value for the limitcredit field.
     *
     * @var        int
     */
    protected $limitcredit;

    /**
     * The value for the mtype field.
     *
     * @var        int
     */
    protected $mtype;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliUser object.
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
     * Compares this with another <code>AliUser</code> instance.  If
     * <code>obj</code> is an instance of <code>AliUser</code>, delegates to
     * <code>equals(AliUser)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliUser The current object, for fluid interface
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
     * Get the [uid] column value.
     *
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Get the [usercode] column value.
     *
     * @return string
     */
    public function getUsercode()
    {
        return $this->usercode;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [usertype] column value.
     *
     * @return int
     */
    public function getUsertype()
    {
        return $this->usertype;
    }

    /**
     * Get the [object1] column value.
     *
     * @return int
     */
    public function getObject1()
    {
        return $this->object1;
    }

    /**
     * Get the [object2] column value.
     *
     * @return int
     */
    public function getObject2()
    {
        return $this->object2;
    }

    /**
     * Get the [object3] column value.
     *
     * @return int
     */
    public function getObject3()
    {
        return $this->object3;
    }

    /**
     * Get the [object4] column value.
     *
     * @return int
     */
    public function getObject4()
    {
        return $this->object4;
    }

    /**
     * Get the [object5] column value.
     *
     * @return int
     */
    public function getObject5()
    {
        return $this->object5;
    }

    /**
     * Get the [object6] column value.
     *
     * @return int
     */
    public function getObject6()
    {
        return $this->object6;
    }

    /**
     * Get the [object7] column value.
     *
     * @return int
     */
    public function getObject7()
    {
        return $this->object7;
    }

    /**
     * Get the [object8] column value.
     *
     * @return int
     */
    public function getObject8()
    {
        return $this->object8;
    }

    /**
     * Get the [object9] column value.
     *
     * @return int
     */
    public function getObject9()
    {
        return $this->object9;
    }

    /**
     * Get the [object10] column value.
     *
     * @return int
     */
    public function getObject10()
    {
        return $this->object10;
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
     * Get the [accessright] column value.
     *
     * @return string
     */
    public function getAccessright()
    {
        return $this->accessright;
    }

    /**
     * Get the [code_ref] column value.
     *
     * @return string
     */
    public function getCodeRef()
    {
        return $this->code_ref;
    }

    /**
     * Get the [checkbackdate] column value.
     *
     * @return int
     */
    public function getCheckbackdate()
    {
        return $this->checkbackdate;
    }

    /**
     * Get the [limitcredit] column value.
     *
     * @return int
     */
    public function getLimitcredit()
    {
        return $this->limitcredit;
    }

    /**
     * Get the [mtype] column value.
     *
     * @return int
     */
    public function getMtype()
    {
        return $this->mtype;
    }

    /**
     * Set the value of [uid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliUserTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [usercode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setUsercode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usercode !== $v) {
            $this->usercode = $v;
            $this->modifiedColumns[AliUserTableMap::COL_USERCODE] = true;
        }

        return $this;
    } // setUsercode()

    /**
     * Set the value of [username] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[AliUserTableMap::COL_USERNAME] = true;
        }

        return $this;
    } // setUsername()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[AliUserTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [usertype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setUsertype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->usertype !== $v) {
            $this->usertype = $v;
            $this->modifiedColumns[AliUserTableMap::COL_USERTYPE] = true;
        }

        return $this;
    } // setUsertype()

    /**
     * Set the value of [object1] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject1($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object1 !== $v) {
            $this->object1 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT1] = true;
        }

        return $this;
    } // setObject1()

    /**
     * Set the value of [object2] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object2 !== $v) {
            $this->object2 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT2] = true;
        }

        return $this;
    } // setObject2()

    /**
     * Set the value of [object3] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject3($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object3 !== $v) {
            $this->object3 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT3] = true;
        }

        return $this;
    } // setObject3()

    /**
     * Set the value of [object4] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject4($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object4 !== $v) {
            $this->object4 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT4] = true;
        }

        return $this;
    } // setObject4()

    /**
     * Set the value of [object5] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject5($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object5 !== $v) {
            $this->object5 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT5] = true;
        }

        return $this;
    } // setObject5()

    /**
     * Set the value of [object6] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject6($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object6 !== $v) {
            $this->object6 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT6] = true;
        }

        return $this;
    } // setObject6()

    /**
     * Set the value of [object7] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject7($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object7 !== $v) {
            $this->object7 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT7] = true;
        }

        return $this;
    } // setObject7()

    /**
     * Set the value of [object8] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject8($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object8 !== $v) {
            $this->object8 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT8] = true;
        }

        return $this;
    } // setObject8()

    /**
     * Set the value of [object9] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject9($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object9 !== $v) {
            $this->object9 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT9] = true;
        }

        return $this;
    } // setObject9()

    /**
     * Set the value of [object10] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setObject10($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object10 !== $v) {
            $this->object10 = $v;
            $this->modifiedColumns[AliUserTableMap::COL_OBJECT10] = true;
        }

        return $this;
    } // setObject10()

    /**
     * Set the value of [inv_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setInvRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_ref !== $v) {
            $this->inv_ref = $v;
            $this->modifiedColumns[AliUserTableMap::COL_INV_REF] = true;
        }

        return $this;
    } // setInvRef()

    /**
     * Set the value of [accessright] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setAccessright($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->accessright !== $v) {
            $this->accessright = $v;
            $this->modifiedColumns[AliUserTableMap::COL_ACCESSRIGHT] = true;
        }

        return $this;
    } // setAccessright()

    /**
     * Set the value of [code_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setCodeRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->code_ref !== $v) {
            $this->code_ref = $v;
            $this->modifiedColumns[AliUserTableMap::COL_CODE_REF] = true;
        }

        return $this;
    } // setCodeRef()

    /**
     * Set the value of [checkbackdate] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setCheckbackdate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->checkbackdate !== $v) {
            $this->checkbackdate = $v;
            $this->modifiedColumns[AliUserTableMap::COL_CHECKBACKDATE] = true;
        }

        return $this;
    } // setCheckbackdate()

    /**
     * Set the value of [limitcredit] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setLimitcredit($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->limitcredit !== $v) {
            $this->limitcredit = $v;
            $this->modifiedColumns[AliUserTableMap::COL_LIMITCREDIT] = true;
        }

        return $this;
    } // setLimitcredit()

    /**
     * Set the value of [mtype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliUser The current object (for fluent API support)
     */
    public function setMtype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->mtype !== $v) {
            $this->mtype = $v;
            $this->modifiedColumns[AliUserTableMap::COL_MTYPE] = true;
        }

        return $this;
    } // setMtype()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliUserTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliUserTableMap::translateFieldName('Usercode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usercode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliUserTableMap::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)];
            $this->username = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliUserTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliUserTableMap::translateFieldName('Usertype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usertype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliUserTableMap::translateFieldName('Object1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object1 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliUserTableMap::translateFieldName('Object2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object2 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliUserTableMap::translateFieldName('Object3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object3 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliUserTableMap::translateFieldName('Object4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object4 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliUserTableMap::translateFieldName('Object5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object5 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliUserTableMap::translateFieldName('Object6', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object6 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliUserTableMap::translateFieldName('Object7', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object7 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliUserTableMap::translateFieldName('Object8', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object8 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliUserTableMap::translateFieldName('Object9', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object9 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliUserTableMap::translateFieldName('Object10', TableMap::TYPE_PHPNAME, $indexType)];
            $this->object10 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliUserTableMap::translateFieldName('InvRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliUserTableMap::translateFieldName('Accessright', TableMap::TYPE_PHPNAME, $indexType)];
            $this->accessright = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliUserTableMap::translateFieldName('CodeRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->code_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliUserTableMap::translateFieldName('Checkbackdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->checkbackdate = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliUserTableMap::translateFieldName('Limitcredit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->limitcredit = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliUserTableMap::translateFieldName('Mtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mtype = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = AliUserTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliUser'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliUserTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliUserQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliUser::setDeleted()
     * @see AliUser::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliUserTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliUserQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliUserTableMap::DATABASE_NAME);
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
                AliUserTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliUserTableMap::COL_UID] = true;
        if (null !== $this->uid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliUserTableMap::COL_UID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliUserTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_USERCODE)) {
            $modifiedColumns[':p' . $index++]  = 'usercode';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_USERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'username';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_USERTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'usertype';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT1)) {
            $modifiedColumns[':p' . $index++]  = 'object1';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT2)) {
            $modifiedColumns[':p' . $index++]  = 'object2';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT3)) {
            $modifiedColumns[':p' . $index++]  = 'object3';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT4)) {
            $modifiedColumns[':p' . $index++]  = 'object4';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT5)) {
            $modifiedColumns[':p' . $index++]  = 'object5';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT6)) {
            $modifiedColumns[':p' . $index++]  = 'object6';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT7)) {
            $modifiedColumns[':p' . $index++]  = 'object7';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT8)) {
            $modifiedColumns[':p' . $index++]  = 'object8';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT9)) {
            $modifiedColumns[':p' . $index++]  = 'object9';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT10)) {
            $modifiedColumns[':p' . $index++]  = 'object10';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_INV_REF)) {
            $modifiedColumns[':p' . $index++]  = 'inv_ref';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_ACCESSRIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'accessright';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_CODE_REF)) {
            $modifiedColumns[':p' . $index++]  = 'code_ref';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_CHECKBACKDATE)) {
            $modifiedColumns[':p' . $index++]  = 'checkbackdate';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_LIMITCREDIT)) {
            $modifiedColumns[':p' . $index++]  = 'limitcredit';
        }
        if ($this->isColumnModified(AliUserTableMap::COL_MTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'mtype';
        }

        $sql = sprintf(
            'INSERT INTO ali_user (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_INT);
                        break;
                    case 'usercode':
                        $stmt->bindValue($identifier, $this->usercode, PDO::PARAM_STR);
                        break;
                    case 'username':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'usertype':
                        $stmt->bindValue($identifier, $this->usertype, PDO::PARAM_INT);
                        break;
                    case 'object1':
                        $stmt->bindValue($identifier, $this->object1, PDO::PARAM_INT);
                        break;
                    case 'object2':
                        $stmt->bindValue($identifier, $this->object2, PDO::PARAM_INT);
                        break;
                    case 'object3':
                        $stmt->bindValue($identifier, $this->object3, PDO::PARAM_INT);
                        break;
                    case 'object4':
                        $stmt->bindValue($identifier, $this->object4, PDO::PARAM_INT);
                        break;
                    case 'object5':
                        $stmt->bindValue($identifier, $this->object5, PDO::PARAM_INT);
                        break;
                    case 'object6':
                        $stmt->bindValue($identifier, $this->object6, PDO::PARAM_INT);
                        break;
                    case 'object7':
                        $stmt->bindValue($identifier, $this->object7, PDO::PARAM_INT);
                        break;
                    case 'object8':
                        $stmt->bindValue($identifier, $this->object8, PDO::PARAM_INT);
                        break;
                    case 'object9':
                        $stmt->bindValue($identifier, $this->object9, PDO::PARAM_INT);
                        break;
                    case 'object10':
                        $stmt->bindValue($identifier, $this->object10, PDO::PARAM_INT);
                        break;
                    case 'inv_ref':
                        $stmt->bindValue($identifier, $this->inv_ref, PDO::PARAM_STR);
                        break;
                    case 'accessright':
                        $stmt->bindValue($identifier, $this->accessright, PDO::PARAM_STR);
                        break;
                    case 'code_ref':
                        $stmt->bindValue($identifier, $this->code_ref, PDO::PARAM_STR);
                        break;
                    case 'checkbackdate':
                        $stmt->bindValue($identifier, $this->checkbackdate, PDO::PARAM_INT);
                        break;
                    case 'limitcredit':
                        $stmt->bindValue($identifier, $this->limitcredit, PDO::PARAM_INT);
                        break;
                    case 'mtype':
                        $stmt->bindValue($identifier, $this->mtype, PDO::PARAM_INT);
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
        $this->setUid($pk);

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
        $pos = AliUserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getUid();
                break;
            case 1:
                return $this->getUsercode();
                break;
            case 2:
                return $this->getUsername();
                break;
            case 3:
                return $this->getPassword();
                break;
            case 4:
                return $this->getUsertype();
                break;
            case 5:
                return $this->getObject1();
                break;
            case 6:
                return $this->getObject2();
                break;
            case 7:
                return $this->getObject3();
                break;
            case 8:
                return $this->getObject4();
                break;
            case 9:
                return $this->getObject5();
                break;
            case 10:
                return $this->getObject6();
                break;
            case 11:
                return $this->getObject7();
                break;
            case 12:
                return $this->getObject8();
                break;
            case 13:
                return $this->getObject9();
                break;
            case 14:
                return $this->getObject10();
                break;
            case 15:
                return $this->getInvRef();
                break;
            case 16:
                return $this->getAccessright();
                break;
            case 17:
                return $this->getCodeRef();
                break;
            case 18:
                return $this->getCheckbackdate();
                break;
            case 19:
                return $this->getLimitcredit();
                break;
            case 20:
                return $this->getMtype();
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

        if (isset($alreadyDumpedObjects['AliUser'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliUser'][$this->hashCode()] = true;
        $keys = AliUserTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getUid(),
            $keys[1] => $this->getUsercode(),
            $keys[2] => $this->getUsername(),
            $keys[3] => $this->getPassword(),
            $keys[4] => $this->getUsertype(),
            $keys[5] => $this->getObject1(),
            $keys[6] => $this->getObject2(),
            $keys[7] => $this->getObject3(),
            $keys[8] => $this->getObject4(),
            $keys[9] => $this->getObject5(),
            $keys[10] => $this->getObject6(),
            $keys[11] => $this->getObject7(),
            $keys[12] => $this->getObject8(),
            $keys[13] => $this->getObject9(),
            $keys[14] => $this->getObject10(),
            $keys[15] => $this->getInvRef(),
            $keys[16] => $this->getAccessright(),
            $keys[17] => $this->getCodeRef(),
            $keys[18] => $this->getCheckbackdate(),
            $keys[19] => $this->getLimitcredit(),
            $keys[20] => $this->getMtype(),
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
     * @return $this|\CciOrm\CciOrm\AliUser
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliUserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliUser
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setUid($value);
                break;
            case 1:
                $this->setUsercode($value);
                break;
            case 2:
                $this->setUsername($value);
                break;
            case 3:
                $this->setPassword($value);
                break;
            case 4:
                $this->setUsertype($value);
                break;
            case 5:
                $this->setObject1($value);
                break;
            case 6:
                $this->setObject2($value);
                break;
            case 7:
                $this->setObject3($value);
                break;
            case 8:
                $this->setObject4($value);
                break;
            case 9:
                $this->setObject5($value);
                break;
            case 10:
                $this->setObject6($value);
                break;
            case 11:
                $this->setObject7($value);
                break;
            case 12:
                $this->setObject8($value);
                break;
            case 13:
                $this->setObject9($value);
                break;
            case 14:
                $this->setObject10($value);
                break;
            case 15:
                $this->setInvRef($value);
                break;
            case 16:
                $this->setAccessright($value);
                break;
            case 17:
                $this->setCodeRef($value);
                break;
            case 18:
                $this->setCheckbackdate($value);
                break;
            case 19:
                $this->setLimitcredit($value);
                break;
            case 20:
                $this->setMtype($value);
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
        $keys = AliUserTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setUid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUsercode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setUsername($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPassword($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setUsertype($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setObject1($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setObject2($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setObject3($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setObject4($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setObject5($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setObject6($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setObject7($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setObject8($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setObject9($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setObject10($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setInvRef($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setAccessright($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCodeRef($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setCheckbackdate($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setLimitcredit($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setMtype($arr[$keys[20]]);
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
     * @return $this|\CciOrm\CciOrm\AliUser The current object, for fluid interface
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
        $criteria = new Criteria(AliUserTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliUserTableMap::COL_UID)) {
            $criteria->add(AliUserTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_USERCODE)) {
            $criteria->add(AliUserTableMap::COL_USERCODE, $this->usercode);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_USERNAME)) {
            $criteria->add(AliUserTableMap::COL_USERNAME, $this->username);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_PASSWORD)) {
            $criteria->add(AliUserTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_USERTYPE)) {
            $criteria->add(AliUserTableMap::COL_USERTYPE, $this->usertype);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT1)) {
            $criteria->add(AliUserTableMap::COL_OBJECT1, $this->object1);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT2)) {
            $criteria->add(AliUserTableMap::COL_OBJECT2, $this->object2);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT3)) {
            $criteria->add(AliUserTableMap::COL_OBJECT3, $this->object3);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT4)) {
            $criteria->add(AliUserTableMap::COL_OBJECT4, $this->object4);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT5)) {
            $criteria->add(AliUserTableMap::COL_OBJECT5, $this->object5);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT6)) {
            $criteria->add(AliUserTableMap::COL_OBJECT6, $this->object6);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT7)) {
            $criteria->add(AliUserTableMap::COL_OBJECT7, $this->object7);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT8)) {
            $criteria->add(AliUserTableMap::COL_OBJECT8, $this->object8);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT9)) {
            $criteria->add(AliUserTableMap::COL_OBJECT9, $this->object9);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_OBJECT10)) {
            $criteria->add(AliUserTableMap::COL_OBJECT10, $this->object10);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_INV_REF)) {
            $criteria->add(AliUserTableMap::COL_INV_REF, $this->inv_ref);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_ACCESSRIGHT)) {
            $criteria->add(AliUserTableMap::COL_ACCESSRIGHT, $this->accessright);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_CODE_REF)) {
            $criteria->add(AliUserTableMap::COL_CODE_REF, $this->code_ref);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_CHECKBACKDATE)) {
            $criteria->add(AliUserTableMap::COL_CHECKBACKDATE, $this->checkbackdate);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_LIMITCREDIT)) {
            $criteria->add(AliUserTableMap::COL_LIMITCREDIT, $this->limitcredit);
        }
        if ($this->isColumnModified(AliUserTableMap::COL_MTYPE)) {
            $criteria->add(AliUserTableMap::COL_MTYPE, $this->mtype);
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
        $criteria = ChildAliUserQuery::create();
        $criteria->add(AliUserTableMap::COL_UID, $this->uid);

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
        $validPk = null !== $this->getUid();

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
        return $this->getUid();
    }

    /**
     * Generic method to set the primary key (uid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setUid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getUid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliUser (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUsercode($this->getUsercode());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setUsertype($this->getUsertype());
        $copyObj->setObject1($this->getObject1());
        $copyObj->setObject2($this->getObject2());
        $copyObj->setObject3($this->getObject3());
        $copyObj->setObject4($this->getObject4());
        $copyObj->setObject5($this->getObject5());
        $copyObj->setObject6($this->getObject6());
        $copyObj->setObject7($this->getObject7());
        $copyObj->setObject8($this->getObject8());
        $copyObj->setObject9($this->getObject9());
        $copyObj->setObject10($this->getObject10());
        $copyObj->setInvRef($this->getInvRef());
        $copyObj->setAccessright($this->getAccessright());
        $copyObj->setCodeRef($this->getCodeRef());
        $copyObj->setCheckbackdate($this->getCheckbackdate());
        $copyObj->setLimitcredit($this->getLimitcredit());
        $copyObj->setMtype($this->getMtype());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setUid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \CciOrm\CciOrm\AliUser Clone of current object.
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
        $this->uid = null;
        $this->usercode = null;
        $this->username = null;
        $this->password = null;
        $this->usertype = null;
        $this->object1 = null;
        $this->object2 = null;
        $this->object3 = null;
        $this->object4 = null;
        $this->object5 = null;
        $this->object6 = null;
        $this->object7 = null;
        $this->object8 = null;
        $this->object9 = null;
        $this->object10 = null;
        $this->inv_ref = null;
        $this->accessright = null;
        $this->code_ref = null;
        $this->checkbackdate = null;
        $this->limitcredit = null;
        $this->mtype = null;
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
        return (string) $this->exportTo(AliUserTableMap::DEFAULT_STRING_FORMAT);
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
