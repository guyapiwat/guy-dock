<?php

namespace CciOrm\CciOrm\Base;

use \Exception;
use \PDO;
use CciOrm\CciOrm\AliLogIpayQuery as ChildAliLogIpayQuery;
use CciOrm\CciOrm\Map\AliLogIpayTableMap;
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
 * Base class that represents a row from the 'ali_log_ipay' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliLogIpay implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliLogIpayTableMap';


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
     * The value for the ipayorderid field.
     *
     * @var        string
     */
    protected $ipayorderid;

    /**
     * The value for the inv_no field.
     *
     * @var        string
     */
    protected $inv_no;

    /**
     * The value for the amount field.
     *
     * @var        string
     */
    protected $amount;

    /**
     * The value for the pay_type field.
     *
     * @var        string
     */
    protected $pay_type;

    /**
     * The value for the pay_method field.
     *
     * @var        string
     */
    protected $pay_method;

    /**
     * The value for the resp_code field.
     *
     * @var        string
     */
    protected $resp_code;

    /**
     * The value for the resp_desc field.
     *
     * @var        string
     */
    protected $resp_desc;

    /**
     * The value for the coupon_status field.
     *
     * @var        string
     */
    protected $coupon_status;

    /**
     * The value for the coupon_serial field.
     *
     * @var        string
     */
    protected $coupon_serial;

    /**
     * The value for the coupon_password field.
     *
     * @var        string
     */
    protected $coupon_password;

    /**
     * The value for the coupon_ref field.
     *
     * @var        string
     */
    protected $coupon_ref;

    /**
     * The value for the billtype field.
     *
     * @var        string
     */
    protected $billtype;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliLogIpay object.
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
     * Compares this with another <code>AliLogIpay</code> instance.  If
     * <code>obj</code> is an instance of <code>AliLogIpay</code>, delegates to
     * <code>equals(AliLogIpay)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliLogIpay The current object, for fluid interface
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
     * Get the [ipayorderid] column value.
     *
     * @return string
     */
    public function getIpayorderid()
    {
        return $this->ipayorderid;
    }

    /**
     * Get the [inv_no] column value.
     *
     * @return string
     */
    public function getInvNo()
    {
        return $this->inv_no;
    }

    /**
     * Get the [amount] column value.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [pay_type] column value.
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->pay_type;
    }

    /**
     * Get the [pay_method] column value.
     *
     * @return string
     */
    public function getPayMethod()
    {
        return $this->pay_method;
    }

    /**
     * Get the [resp_code] column value.
     *
     * @return string
     */
    public function getRespCode()
    {
        return $this->resp_code;
    }

    /**
     * Get the [resp_desc] column value.
     *
     * @return string
     */
    public function getRespDesc()
    {
        return $this->resp_desc;
    }

    /**
     * Get the [coupon_status] column value.
     *
     * @return string
     */
    public function getCouponStatus()
    {
        return $this->coupon_status;
    }

    /**
     * Get the [coupon_serial] column value.
     *
     * @return string
     */
    public function getCouponSerial()
    {
        return $this->coupon_serial;
    }

    /**
     * Get the [coupon_password] column value.
     *
     * @return string
     */
    public function getCouponPassword()
    {
        return $this->coupon_password;
    }

    /**
     * Get the [coupon_ref] column value.
     *
     * @return string
     */
    public function getCouponRef()
    {
        return $this->coupon_ref;
    }

    /**
     * Get the [billtype] column value.
     *
     * @return string
     */
    public function getBilltype()
    {
        return $this->billtype;
    }

    /**
     * Set the value of [ipayorderid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setIpayorderid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ipayorderid !== $v) {
            $this->ipayorderid = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_IPAYORDERID] = true;
        }

        return $this;
    } // setIpayorderid()

    /**
     * Set the value of [inv_no] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setInvNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_no !== $v) {
            $this->inv_no = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_INV_NO] = true;
        }

        return $this;
    } // setInvNo()

    /**
     * Set the value of [amount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Set the value of [pay_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setPayType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pay_type !== $v) {
            $this->pay_type = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_PAY_TYPE] = true;
        }

        return $this;
    } // setPayType()

    /**
     * Set the value of [pay_method] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setPayMethod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pay_method !== $v) {
            $this->pay_method = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_PAY_METHOD] = true;
        }

        return $this;
    } // setPayMethod()

    /**
     * Set the value of [resp_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setRespCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->resp_code !== $v) {
            $this->resp_code = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_RESP_CODE] = true;
        }

        return $this;
    } // setRespCode()

    /**
     * Set the value of [resp_desc] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setRespDesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->resp_desc !== $v) {
            $this->resp_desc = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_RESP_DESC] = true;
        }

        return $this;
    } // setRespDesc()

    /**
     * Set the value of [coupon_status] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setCouponStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->coupon_status !== $v) {
            $this->coupon_status = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_COUPON_STATUS] = true;
        }

        return $this;
    } // setCouponStatus()

    /**
     * Set the value of [coupon_serial] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setCouponSerial($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->coupon_serial !== $v) {
            $this->coupon_serial = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_COUPON_SERIAL] = true;
        }

        return $this;
    } // setCouponSerial()

    /**
     * Set the value of [coupon_password] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setCouponPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->coupon_password !== $v) {
            $this->coupon_password = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_COUPON_PASSWORD] = true;
        }

        return $this;
    } // setCouponPassword()

    /**
     * Set the value of [coupon_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setCouponRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->coupon_ref !== $v) {
            $this->coupon_ref = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_COUPON_REF] = true;
        }

        return $this;
    } // setCouponRef()

    /**
     * Set the value of [billtype] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object (for fluent API support)
     */
    public function setBilltype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billtype !== $v) {
            $this->billtype = $v;
            $this->modifiedColumns[AliLogIpayTableMap::COL_BILLTYPE] = true;
        }

        return $this;
    } // setBilltype()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliLogIpayTableMap::translateFieldName('Ipayorderid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ipayorderid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliLogIpayTableMap::translateFieldName('InvNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliLogIpayTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliLogIpayTableMap::translateFieldName('PayType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pay_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliLogIpayTableMap::translateFieldName('PayMethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pay_method = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliLogIpayTableMap::translateFieldName('RespCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->resp_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliLogIpayTableMap::translateFieldName('RespDesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->resp_desc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliLogIpayTableMap::translateFieldName('CouponStatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->coupon_status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliLogIpayTableMap::translateFieldName('CouponSerial', TableMap::TYPE_PHPNAME, $indexType)];
            $this->coupon_serial = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliLogIpayTableMap::translateFieldName('CouponPassword', TableMap::TYPE_PHPNAME, $indexType)];
            $this->coupon_password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliLogIpayTableMap::translateFieldName('CouponRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->coupon_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliLogIpayTableMap::translateFieldName('Billtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billtype = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = AliLogIpayTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliLogIpay'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliLogIpayTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliLogIpayQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliLogIpay::setDeleted()
     * @see AliLogIpay::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogIpayTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliLogIpayQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliLogIpayTableMap::DATABASE_NAME);
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
                AliLogIpayTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(AliLogIpayTableMap::COL_IPAYORDERID)) {
            $modifiedColumns[':p' . $index++]  = 'ipayorderid';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_INV_NO)) {
            $modifiedColumns[':p' . $index++]  = 'inv_no';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_PAY_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'pay_type';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_PAY_METHOD)) {
            $modifiedColumns[':p' . $index++]  = 'pay_method';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_RESP_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'resp_code';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_RESP_DESC)) {
            $modifiedColumns[':p' . $index++]  = 'resp_desc';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_COUPON_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'coupon_status';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_COUPON_SERIAL)) {
            $modifiedColumns[':p' . $index++]  = 'coupon_serial';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_COUPON_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'coupon_password';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_COUPON_REF)) {
            $modifiedColumns[':p' . $index++]  = 'coupon_ref';
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_BILLTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'billtype';
        }

        $sql = sprintf(
            'INSERT INTO ali_log_ipay (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ipayorderid':
                        $stmt->bindValue($identifier, $this->ipayorderid, PDO::PARAM_STR);
                        break;
                    case 'inv_no':
                        $stmt->bindValue($identifier, $this->inv_no, PDO::PARAM_STR);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case 'pay_type':
                        $stmt->bindValue($identifier, $this->pay_type, PDO::PARAM_STR);
                        break;
                    case 'pay_method':
                        $stmt->bindValue($identifier, $this->pay_method, PDO::PARAM_STR);
                        break;
                    case 'resp_code':
                        $stmt->bindValue($identifier, $this->resp_code, PDO::PARAM_STR);
                        break;
                    case 'resp_desc':
                        $stmt->bindValue($identifier, $this->resp_desc, PDO::PARAM_STR);
                        break;
                    case 'coupon_status':
                        $stmt->bindValue($identifier, $this->coupon_status, PDO::PARAM_STR);
                        break;
                    case 'coupon_serial':
                        $stmt->bindValue($identifier, $this->coupon_serial, PDO::PARAM_STR);
                        break;
                    case 'coupon_password':
                        $stmt->bindValue($identifier, $this->coupon_password, PDO::PARAM_STR);
                        break;
                    case 'coupon_ref':
                        $stmt->bindValue($identifier, $this->coupon_ref, PDO::PARAM_STR);
                        break;
                    case 'billtype':
                        $stmt->bindValue($identifier, $this->billtype, PDO::PARAM_STR);
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
        $pos = AliLogIpayTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIpayorderid();
                break;
            case 1:
                return $this->getInvNo();
                break;
            case 2:
                return $this->getAmount();
                break;
            case 3:
                return $this->getPayType();
                break;
            case 4:
                return $this->getPayMethod();
                break;
            case 5:
                return $this->getRespCode();
                break;
            case 6:
                return $this->getRespDesc();
                break;
            case 7:
                return $this->getCouponStatus();
                break;
            case 8:
                return $this->getCouponSerial();
                break;
            case 9:
                return $this->getCouponPassword();
                break;
            case 10:
                return $this->getCouponRef();
                break;
            case 11:
                return $this->getBilltype();
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

        if (isset($alreadyDumpedObjects['AliLogIpay'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliLogIpay'][$this->hashCode()] = true;
        $keys = AliLogIpayTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIpayorderid(),
            $keys[1] => $this->getInvNo(),
            $keys[2] => $this->getAmount(),
            $keys[3] => $this->getPayType(),
            $keys[4] => $this->getPayMethod(),
            $keys[5] => $this->getRespCode(),
            $keys[6] => $this->getRespDesc(),
            $keys[7] => $this->getCouponStatus(),
            $keys[8] => $this->getCouponSerial(),
            $keys[9] => $this->getCouponPassword(),
            $keys[10] => $this->getCouponRef(),
            $keys[11] => $this->getBilltype(),
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
     * @return $this|\CciOrm\CciOrm\AliLogIpay
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliLogIpayTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliLogIpay
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIpayorderid($value);
                break;
            case 1:
                $this->setInvNo($value);
                break;
            case 2:
                $this->setAmount($value);
                break;
            case 3:
                $this->setPayType($value);
                break;
            case 4:
                $this->setPayMethod($value);
                break;
            case 5:
                $this->setRespCode($value);
                break;
            case 6:
                $this->setRespDesc($value);
                break;
            case 7:
                $this->setCouponStatus($value);
                break;
            case 8:
                $this->setCouponSerial($value);
                break;
            case 9:
                $this->setCouponPassword($value);
                break;
            case 10:
                $this->setCouponRef($value);
                break;
            case 11:
                $this->setBilltype($value);
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
        $keys = AliLogIpayTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIpayorderid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setInvNo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAmount($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPayType($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPayMethod($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setRespCode($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRespDesc($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCouponStatus($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCouponSerial($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCouponPassword($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCouponRef($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setBilltype($arr[$keys[11]]);
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
     * @return $this|\CciOrm\CciOrm\AliLogIpay The current object, for fluid interface
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
        $criteria = new Criteria(AliLogIpayTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliLogIpayTableMap::COL_IPAYORDERID)) {
            $criteria->add(AliLogIpayTableMap::COL_IPAYORDERID, $this->ipayorderid);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_INV_NO)) {
            $criteria->add(AliLogIpayTableMap::COL_INV_NO, $this->inv_no);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_AMOUNT)) {
            $criteria->add(AliLogIpayTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_PAY_TYPE)) {
            $criteria->add(AliLogIpayTableMap::COL_PAY_TYPE, $this->pay_type);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_PAY_METHOD)) {
            $criteria->add(AliLogIpayTableMap::COL_PAY_METHOD, $this->pay_method);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_RESP_CODE)) {
            $criteria->add(AliLogIpayTableMap::COL_RESP_CODE, $this->resp_code);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_RESP_DESC)) {
            $criteria->add(AliLogIpayTableMap::COL_RESP_DESC, $this->resp_desc);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_COUPON_STATUS)) {
            $criteria->add(AliLogIpayTableMap::COL_COUPON_STATUS, $this->coupon_status);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_COUPON_SERIAL)) {
            $criteria->add(AliLogIpayTableMap::COL_COUPON_SERIAL, $this->coupon_serial);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_COUPON_PASSWORD)) {
            $criteria->add(AliLogIpayTableMap::COL_COUPON_PASSWORD, $this->coupon_password);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_COUPON_REF)) {
            $criteria->add(AliLogIpayTableMap::COL_COUPON_REF, $this->coupon_ref);
        }
        if ($this->isColumnModified(AliLogIpayTableMap::COL_BILLTYPE)) {
            $criteria->add(AliLogIpayTableMap::COL_BILLTYPE, $this->billtype);
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
        throw new LogicException('The AliLogIpay object has no primary key');

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliLogIpay (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIpayorderid($this->getIpayorderid());
        $copyObj->setInvNo($this->getInvNo());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setPayType($this->getPayType());
        $copyObj->setPayMethod($this->getPayMethod());
        $copyObj->setRespCode($this->getRespCode());
        $copyObj->setRespDesc($this->getRespDesc());
        $copyObj->setCouponStatus($this->getCouponStatus());
        $copyObj->setCouponSerial($this->getCouponSerial());
        $copyObj->setCouponPassword($this->getCouponPassword());
        $copyObj->setCouponRef($this->getCouponRef());
        $copyObj->setBilltype($this->getBilltype());
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
     * @return \CciOrm\CciOrm\AliLogIpay Clone of current object.
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
        $this->ipayorderid = null;
        $this->inv_no = null;
        $this->amount = null;
        $this->pay_type = null;
        $this->pay_method = null;
        $this->resp_code = null;
        $this->resp_desc = null;
        $this->coupon_status = null;
        $this->coupon_serial = null;
        $this->coupon_password = null;
        $this->coupon_ref = null;
        $this->billtype = null;
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
        return (string) $this->exportTo(AliLogIpayTableMap::DEFAULT_STRING_FORMAT);
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
