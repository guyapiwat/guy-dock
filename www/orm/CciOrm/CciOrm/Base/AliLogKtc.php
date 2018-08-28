<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLogKtcQuery as ChildAliLogKtcQuery;
use CciOrm\CciOrm\Map\AliLogKtcTableMap;
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
 * Base class that represents a row from the 'ali_log_ktc' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliLogKtc implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliLogKtcTableMap';


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
     * The value for the ref1 field.
     *
     * @var        string
     */
    protected $ref1;

    /**
     * The value for the src field.
     *
     * @var        string
     */
    protected $src;

    /**
     * The value for the prc field.
     *
     * @var        string
     */
    protected $prc;

    /**
     * The value for the ord field.
     *
     * @var        string
     */
    protected $ord;

    /**
     * The value for the holder field.
     *
     * @var        string
     */
    protected $holder;

    /**
     * The value for the successcode field.
     *
     * @var        string
     */
    protected $successcode;

    /**
     * The value for the ref2 field.
     *
     * @var        string
     */
    protected $ref2;

    /**
     * The value for the payref field.
     *
     * @var        string
     */
    protected $payref;

    /**
     * The value for the amt field.
     *
     * @var        string
     */
    protected $amt;

    /**
     * The value for the cur field.
     *
     * @var        string
     */
    protected $cur;

    /**
     * The value for the remark field.
     *
     * @var        string
     */
    protected $remark;

    /**
     * The value for the authid field.
     *
     * @var        string
     */
    protected $authid;

    /**
     * The value for the payerauth field.
     *
     * @var        string
     */
    protected $payerauth;

    /**
     * The value for the sourcelp field.
     *
     * @var        string
     */
    protected $sourcelp;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliLogKtc object.
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
     * Compares this with another <code>AliLogKtc</code> instance.  If
     * <code>obj</code> is an instance of <code>AliLogKtc</code>, delegates to
     * <code>equals(AliLogKtc)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliLogKtc The current object, for fluid interface
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
     * Get the [ref1] column value.
     *
     * @return string
     */
    public function getRef1()
    {
        return $this->ref1;
    }

    /**
     * Get the [src] column value.
     *
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Get the [prc] column value.
     *
     * @return string
     */
    public function getPrc()
    {
        return $this->prc;
    }

    /**
     * Get the [ord] column value.
     *
     * @return string
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Get the [holder] column value.
     *
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * Get the [successcode] column value.
     *
     * @return string
     */
    public function getSuccesscode()
    {
        return $this->successcode;
    }

    /**
     * Get the [ref2] column value.
     *
     * @return string
     */
    public function getRef2()
    {
        return $this->ref2;
    }

    /**
     * Get the [payref] column value.
     *
     * @return string
     */
    public function getPayref()
    {
        return $this->payref;
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
     * Get the [cur] column value.
     *
     * @return string
     */
    public function getCur()
    {
        return $this->cur;
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
     * Get the [authid] column value.
     *
     * @return string
     */
    public function getAuthid()
    {
        return $this->authid;
    }

    /**
     * Get the [payerauth] column value.
     *
     * @return string
     */
    public function getPayerauth()
    {
        return $this->payerauth;
    }

    /**
     * Get the [sourcelp] column value.
     *
     * @return string
     */
    public function getSourcelp()
    {
        return $this->sourcelp;
    }

    /**
     * Set the value of [ref1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setRef1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ref1 !== $v) {
            $this->ref1 = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_REF1] = true;
        }

        return $this;
    } // setRef1()

    /**
     * Set the value of [src] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setSrc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->src !== $v) {
            $this->src = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_SRC] = true;
        }

        return $this;
    } // setSrc()

    /**
     * Set the value of [prc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setPrc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prc !== $v) {
            $this->prc = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_PRC] = true;
        }

        return $this;
    } // setPrc()

    /**
     * Set the value of [ord] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setOrd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ord !== $v) {
            $this->ord = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_ORD] = true;
        }

        return $this;
    } // setOrd()

    /**
     * Set the value of [holder] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setHolder($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->holder !== $v) {
            $this->holder = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_HOLDER] = true;
        }

        return $this;
    } // setHolder()

    /**
     * Set the value of [successcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setSuccesscode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->successcode !== $v) {
            $this->successcode = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_SUCCESSCODE] = true;
        }

        return $this;
    } // setSuccesscode()

    /**
     * Set the value of [ref2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setRef2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ref2 !== $v) {
            $this->ref2 = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_REF2] = true;
        }

        return $this;
    } // setRef2()

    /**
     * Set the value of [payref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setPayref($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payref !== $v) {
            $this->payref = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_PAYREF] = true;
        }

        return $this;
    } // setPayref()

    /**
     * Set the value of [amt] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setAmt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amt !== $v) {
            $this->amt = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_AMT] = true;
        }

        return $this;
    } // setAmt()

    /**
     * Set the value of [cur] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setCur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cur !== $v) {
            $this->cur = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_CUR] = true;
        }

        return $this;
    } // setCur()

    /**
     * Set the value of [remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remark !== $v) {
            $this->remark = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_REMARK] = true;
        }

        return $this;
    } // setRemark()

    /**
     * Set the value of [authid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setAuthid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->authid !== $v) {
            $this->authid = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_AUTHID] = true;
        }

        return $this;
    } // setAuthid()

    /**
     * Set the value of [payerauth] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setPayerauth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payerauth !== $v) {
            $this->payerauth = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_PAYERAUTH] = true;
        }

        return $this;
    } // setPayerauth()

    /**
     * Set the value of [sourcelp] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object (for fluent API support)
     */
    public function setSourcelp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sourcelp !== $v) {
            $this->sourcelp = $v;
            $this->modifiedColumns[AliLogKtcTableMap::COL_SOURCELP] = true;
        }

        return $this;
    } // setSourcelp()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliLogKtcTableMap::translateFieldName('Ref1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ref1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliLogKtcTableMap::translateFieldName('Src', TableMap::TYPE_PHPNAME, $indexType)];
            $this->src = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliLogKtcTableMap::translateFieldName('Prc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->prc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliLogKtcTableMap::translateFieldName('Ord', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ord = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliLogKtcTableMap::translateFieldName('Holder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->holder = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliLogKtcTableMap::translateFieldName('Successcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->successcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliLogKtcTableMap::translateFieldName('Ref2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ref2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliLogKtcTableMap::translateFieldName('Payref', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliLogKtcTableMap::translateFieldName('Amt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliLogKtcTableMap::translateFieldName('Cur', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cur = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliLogKtcTableMap::translateFieldName('Remark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliLogKtcTableMap::translateFieldName('Authid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->authid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliLogKtcTableMap::translateFieldName('Payerauth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payerauth = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliLogKtcTableMap::translateFieldName('Sourcelp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sourcelp = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 14; // 14 = AliLogKtcTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliLogKtc'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliLogKtcTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliLogKtcQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliLogKtc::setDeleted()
     * @see AliLogKtc::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogKtcTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliLogKtcQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogKtcTableMap::DATABASE_NAME);
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
                AliLogKtcTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(AliLogKtcTableMap::COL_REF1)) {
            $modifiedColumns[':p' . $index++]  = 'ref1';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_SRC)) {
            $modifiedColumns[':p' . $index++]  = 'src';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_PRC)) {
            $modifiedColumns[':p' . $index++]  = 'prc';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_ORD)) {
            $modifiedColumns[':p' . $index++]  = 'ord';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_HOLDER)) {
            $modifiedColumns[':p' . $index++]  = 'holder';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_SUCCESSCODE)) {
            $modifiedColumns[':p' . $index++]  = 'successcode';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_REF2)) {
            $modifiedColumns[':p' . $index++]  = 'ref2';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_PAYREF)) {
            $modifiedColumns[':p' . $index++]  = 'payRef';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_AMT)) {
            $modifiedColumns[':p' . $index++]  = 'amt';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_CUR)) {
            $modifiedColumns[':p' . $index++]  = 'cur';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'remark';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_AUTHID)) {
            $modifiedColumns[':p' . $index++]  = 'authId';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_PAYERAUTH)) {
            $modifiedColumns[':p' . $index++]  = 'payerAuth';
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_SOURCELP)) {
            $modifiedColumns[':p' . $index++]  = 'sourcelp';
        }

        $sql = sprintf(
            'INSERT INTO ali_log_ktc (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ref1':
                        $stmt->bindValue($identifier, $this->ref1, PDO::PARAM_STR);
                        break;
                    case 'src':
                        $stmt->bindValue($identifier, $this->src, PDO::PARAM_STR);
                        break;
                    case 'prc':
                        $stmt->bindValue($identifier, $this->prc, PDO::PARAM_STR);
                        break;
                    case 'ord':
                        $stmt->bindValue($identifier, $this->ord, PDO::PARAM_STR);
                        break;
                    case 'holder':
                        $stmt->bindValue($identifier, $this->holder, PDO::PARAM_STR);
                        break;
                    case 'successcode':
                        $stmt->bindValue($identifier, $this->successcode, PDO::PARAM_STR);
                        break;
                    case 'ref2':
                        $stmt->bindValue($identifier, $this->ref2, PDO::PARAM_STR);
                        break;
                    case 'payRef':
                        $stmt->bindValue($identifier, $this->payref, PDO::PARAM_STR);
                        break;
                    case 'amt':
                        $stmt->bindValue($identifier, $this->amt, PDO::PARAM_STR);
                        break;
                    case 'cur':
                        $stmt->bindValue($identifier, $this->cur, PDO::PARAM_STR);
                        break;
                    case 'remark':
                        $stmt->bindValue($identifier, $this->remark, PDO::PARAM_STR);
                        break;
                    case 'authId':
                        $stmt->bindValue($identifier, $this->authid, PDO::PARAM_STR);
                        break;
                    case 'payerAuth':
                        $stmt->bindValue($identifier, $this->payerauth, PDO::PARAM_STR);
                        break;
                    case 'sourcelp':
                        $stmt->bindValue($identifier, $this->sourcelp, PDO::PARAM_STR);
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
        $pos = AliLogKtcTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRef1();
                break;
            case 1:
                return $this->getSrc();
                break;
            case 2:
                return $this->getPrc();
                break;
            case 3:
                return $this->getOrd();
                break;
            case 4:
                return $this->getHolder();
                break;
            case 5:
                return $this->getSuccesscode();
                break;
            case 6:
                return $this->getRef2();
                break;
            case 7:
                return $this->getPayref();
                break;
            case 8:
                return $this->getAmt();
                break;
            case 9:
                return $this->getCur();
                break;
            case 10:
                return $this->getRemark();
                break;
            case 11:
                return $this->getAuthid();
                break;
            case 12:
                return $this->getPayerauth();
                break;
            case 13:
                return $this->getSourcelp();
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

        if (isset($alreadyDumpedObjects['AliLogKtc'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliLogKtc'][$this->hashCode()] = true;
        $keys = AliLogKtcTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRef1(),
            $keys[1] => $this->getSrc(),
            $keys[2] => $this->getPrc(),
            $keys[3] => $this->getOrd(),
            $keys[4] => $this->getHolder(),
            $keys[5] => $this->getSuccesscode(),
            $keys[6] => $this->getRef2(),
            $keys[7] => $this->getPayref(),
            $keys[8] => $this->getAmt(),
            $keys[9] => $this->getCur(),
            $keys[10] => $this->getRemark(),
            $keys[11] => $this->getAuthid(),
            $keys[12] => $this->getPayerauth(),
            $keys[13] => $this->getSourcelp(),
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
     * @return $this|\CciOrm\CciOrm\AliLogKtc
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliLogKtcTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliLogKtc
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setRef1($value);
                break;
            case 1:
                $this->setSrc($value);
                break;
            case 2:
                $this->setPrc($value);
                break;
            case 3:
                $this->setOrd($value);
                break;
            case 4:
                $this->setHolder($value);
                break;
            case 5:
                $this->setSuccesscode($value);
                break;
            case 6:
                $this->setRef2($value);
                break;
            case 7:
                $this->setPayref($value);
                break;
            case 8:
                $this->setAmt($value);
                break;
            case 9:
                $this->setCur($value);
                break;
            case 10:
                $this->setRemark($value);
                break;
            case 11:
                $this->setAuthid($value);
                break;
            case 12:
                $this->setPayerauth($value);
                break;
            case 13:
                $this->setSourcelp($value);
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
        $keys = AliLogKtcTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRef1($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSrc($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPrc($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setOrd($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setHolder($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSuccesscode($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRef2($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPayref($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAmt($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCur($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setRemark($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setAuthid($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPayerauth($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSourcelp($arr[$keys[13]]);
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
     * @return $this|\CciOrm\CciOrm\AliLogKtc The current object, for fluid interface
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
        $criteria = new Criteria(AliLogKtcTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliLogKtcTableMap::COL_REF1)) {
            $criteria->add(AliLogKtcTableMap::COL_REF1, $this->ref1);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_SRC)) {
            $criteria->add(AliLogKtcTableMap::COL_SRC, $this->src);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_PRC)) {
            $criteria->add(AliLogKtcTableMap::COL_PRC, $this->prc);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_ORD)) {
            $criteria->add(AliLogKtcTableMap::COL_ORD, $this->ord);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_HOLDER)) {
            $criteria->add(AliLogKtcTableMap::COL_HOLDER, $this->holder);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_SUCCESSCODE)) {
            $criteria->add(AliLogKtcTableMap::COL_SUCCESSCODE, $this->successcode);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_REF2)) {
            $criteria->add(AliLogKtcTableMap::COL_REF2, $this->ref2);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_PAYREF)) {
            $criteria->add(AliLogKtcTableMap::COL_PAYREF, $this->payref);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_AMT)) {
            $criteria->add(AliLogKtcTableMap::COL_AMT, $this->amt);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_CUR)) {
            $criteria->add(AliLogKtcTableMap::COL_CUR, $this->cur);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_REMARK)) {
            $criteria->add(AliLogKtcTableMap::COL_REMARK, $this->remark);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_AUTHID)) {
            $criteria->add(AliLogKtcTableMap::COL_AUTHID, $this->authid);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_PAYERAUTH)) {
            $criteria->add(AliLogKtcTableMap::COL_PAYERAUTH, $this->payerauth);
        }
        if ($this->isColumnModified(AliLogKtcTableMap::COL_SOURCELP)) {
            $criteria->add(AliLogKtcTableMap::COL_SOURCELP, $this->sourcelp);
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
        throw new LogicException('The AliLogKtc object has no primary key');

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliLogKtc (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRef1($this->getRef1());
        $copyObj->setSrc($this->getSrc());
        $copyObj->setPrc($this->getPrc());
        $copyObj->setOrd($this->getOrd());
        $copyObj->setHolder($this->getHolder());
        $copyObj->setSuccesscode($this->getSuccesscode());
        $copyObj->setRef2($this->getRef2());
        $copyObj->setPayref($this->getPayref());
        $copyObj->setAmt($this->getAmt());
        $copyObj->setCur($this->getCur());
        $copyObj->setRemark($this->getRemark());
        $copyObj->setAuthid($this->getAuthid());
        $copyObj->setPayerauth($this->getPayerauth());
        $copyObj->setSourcelp($this->getSourcelp());
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
     * @return \CciOrm\CciOrm\AliLogKtc Clone of current object.
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
        $this->ref1 = null;
        $this->src = null;
        $this->prc = null;
        $this->ord = null;
        $this->holder = null;
        $this->successcode = null;
        $this->ref2 = null;
        $this->payref = null;
        $this->amt = null;
        $this->cur = null;
        $this->remark = null;
        $this->authid = null;
        $this->payerauth = null;
        $this->sourcelp = null;
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
        return (string) $this->exportTo(AliLogKtcTableMap::DEFAULT_STRING_FORMAT);
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
