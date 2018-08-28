<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliVoucherQuery as ChildAliVoucherQuery;
use CciOrm\CciOrm\Map\AliVoucherTableMap;
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
 * Base class that represents a row from the 'ali_voucher' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliVoucher implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliVoucherTableMap';


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
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

    /**
     * The value for the sadate field.
     *
     * @var        DateTime
     */
    protected $sadate;

    /**
     * The value for the inv_code field.
     *
     * @var        string
     */
    protected $inv_code;

    /**
     * The value for the mcode field.
     *
     * @var        string
     */
    protected $mcode;

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
     * The value for the total field.
     *
     * @var        string
     */
    protected $total;

    /**
     * The value for the usercode field.
     *
     * @var        string
     */
    protected $usercode;

    /**
     * The value for the remark field.
     *
     * @var        string
     */
    protected $remark;

    /**
     * The value for the trnf field.
     *
     * @var        string
     */
    protected $trnf;

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
     * The value for the uid field.
     *
     * @var        string
     */
    protected $uid;

    /**
     * The value for the lid field.
     *
     * @var        string
     */
    protected $lid;

    /**
     * The value for the dl field.
     *
     * @var        string
     */
    protected $dl;

    /**
     * The value for the cancel field.
     *
     * @var        int
     */
    protected $cancel;

    /**
     * The value for the send field.
     *
     * @var        int
     */
    protected $send;

    /**
     * The value for the txtmoney field.
     *
     * @var        string
     */
    protected $txtmoney;

    /**
     * The value for the chkcash field.
     *
     * @var        string
     */
    protected $chkcash;

    /**
     * The value for the chkfuture field.
     *
     * @var        string
     */
    protected $chkfuture;

    /**
     * The value for the chktransfer field.
     *
     * @var        string
     */
    protected $chktransfer;

    /**
     * The value for the chkcredit1 field.
     *
     * @var        string
     */
    protected $chkcredit1;

    /**
     * The value for the chkcredit2 field.
     *
     * @var        string
     */
    protected $chkcredit2;

    /**
     * The value for the chkcredit3 field.
     *
     * @var        string
     */
    protected $chkcredit3;

    /**
     * The value for the chkwithdraw field.
     *
     * @var        string
     */
    protected $chkwithdraw;

    /**
     * The value for the chktransfer_in field.
     *
     * @var        string
     */
    protected $chktransfer_in;

    /**
     * The value for the chktransfer_out field.
     *
     * @var        string
     */
    protected $chktransfer_out;

    /**
     * The value for the txtcash field.
     *
     * @var        string
     */
    protected $txtcash;

    /**
     * The value for the txtfuture field.
     *
     * @var        string
     */
    protected $txtfuture;

    /**
     * The value for the txttransfer field.
     *
     * @var        string
     */
    protected $txttransfer;

    /**
     * The value for the txtcredit1 field.
     *
     * @var        string
     */
    protected $txtcredit1;

    /**
     * The value for the txtcredit2 field.
     *
     * @var        string
     */
    protected $txtcredit2;

    /**
     * The value for the txtcredit3 field.
     *
     * @var        string
     */
    protected $txtcredit3;

    /**
     * The value for the txtwithdraw field.
     *
     * @var        string
     */
    protected $txtwithdraw;

    /**
     * The value for the txttransfer_in field.
     *
     * @var        string
     */
    protected $txttransfer_in;

    /**
     * The value for the txttransfer_out field.
     *
     * @var        string
     */
    protected $txttransfer_out;

    /**
     * The value for the optioncash field.
     *
     * @var        string
     */
    protected $optioncash;

    /**
     * The value for the optionfuture field.
     *
     * @var        string
     */
    protected $optionfuture;

    /**
     * The value for the optiontransfer field.
     *
     * @var        string
     */
    protected $optiontransfer;

    /**
     * The value for the optioncredit1 field.
     *
     * @var        string
     */
    protected $optioncredit1;

    /**
     * The value for the optioncredit2 field.
     *
     * @var        string
     */
    protected $optioncredit2;

    /**
     * The value for the optioncredit3 field.
     *
     * @var        string
     */
    protected $optioncredit3;

    /**
     * The value for the optionwithdraw field.
     *
     * @var        string
     */
    protected $optionwithdraw;

    /**
     * The value for the optiontransfer_in field.
     *
     * @var        string
     */
    protected $optiontransfer_in;

    /**
     * The value for the optiontransfer_out field.
     *
     * @var        string
     */
    protected $optiontransfer_out;

    /**
     * The value for the txtoption field.
     *
     * @var        string
     */
    protected $txtoption;

    /**
     * The value for the ewallet field.
     *
     * @var        string
     */
    protected $ewallet;

    /**
     * The value for the ewallet_before field.
     *
     * @var        string
     */
    protected $ewallet_before;

    /**
     * The value for the ewallet_after field.
     *
     * @var        string
     */
    protected $ewallet_after;

    /**
     * The value for the ipay field.
     *
     * @var        string
     */
    protected $ipay;

    /**
     * The value for the checkportal field.
     *
     * @var        int
     */
    protected $checkportal;

    /**
     * The value for the bprice field.
     *
     * @var        string
     */
    protected $bprice;

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
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the chkcommission field.
     *
     * @var        string
     */
    protected $chkcommission;

    /**
     * The value for the txtcommission field.
     *
     * @var        string
     */
    protected $txtcommission;

    /**
     * The value for the optioncommission field.
     *
     * @var        string
     */
    protected $optioncommission;

    /**
     * The value for the mbase field.
     *
     * @var        string
     */
    protected $mbase;

    /**
     * The value for the crate field.
     *
     * @var        string
     */
    protected $crate;

    /**
     * The value for the echeck field.
     *
     * @var        string
     */
    protected $echeck;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliVoucher object.
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
     * Compares this with another <code>AliVoucher</code> instance.  If
     * <code>obj</code> is an instance of <code>AliVoucher</code>, delegates to
     * <code>equals(AliVoucher)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliVoucher The current object, for fluid interface
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
     * Get the [rcode] column value.
     *
     * @return int
     */
    public function getRcode()
    {
        return $this->rcode;
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
     * Get the [inv_code] column value.
     *
     * @return string
     */
    public function getInvCode()
    {
        return $this->inv_code;
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
     * Get the [total] column value.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
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
     * Get the [remark] column value.
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Get the [trnf] column value.
     *
     * @return string
     */
    public function getTrnf()
    {
        return $this->trnf;
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
     * Get the [uid] column value.
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Get the [lid] column value.
     *
     * @return string
     */
    public function getLid()
    {
        return $this->lid;
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
     * Get the [cancel] column value.
     *
     * @return int
     */
    public function getCancel()
    {
        return $this->cancel;
    }

    /**
     * Get the [send] column value.
     *
     * @return int
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * Get the [txtmoney] column value.
     *
     * @return string
     */
    public function getTxtmoney()
    {
        return $this->txtmoney;
    }

    /**
     * Get the [chkcash] column value.
     *
     * @return string
     */
    public function getChkcash()
    {
        return $this->chkcash;
    }

    /**
     * Get the [chkfuture] column value.
     *
     * @return string
     */
    public function getChkfuture()
    {
        return $this->chkfuture;
    }

    /**
     * Get the [chktransfer] column value.
     *
     * @return string
     */
    public function getChktransfer()
    {
        return $this->chktransfer;
    }

    /**
     * Get the [chkcredit1] column value.
     *
     * @return string
     */
    public function getChkcredit1()
    {
        return $this->chkcredit1;
    }

    /**
     * Get the [chkcredit2] column value.
     *
     * @return string
     */
    public function getChkcredit2()
    {
        return $this->chkcredit2;
    }

    /**
     * Get the [chkcredit3] column value.
     *
     * @return string
     */
    public function getChkcredit3()
    {
        return $this->chkcredit3;
    }

    /**
     * Get the [chkwithdraw] column value.
     *
     * @return string
     */
    public function getChkwithdraw()
    {
        return $this->chkwithdraw;
    }

    /**
     * Get the [chktransfer_in] column value.
     *
     * @return string
     */
    public function getChktransferIn()
    {
        return $this->chktransfer_in;
    }

    /**
     * Get the [chktransfer_out] column value.
     *
     * @return string
     */
    public function getChktransferOut()
    {
        return $this->chktransfer_out;
    }

    /**
     * Get the [txtcash] column value.
     *
     * @return string
     */
    public function getTxtcash()
    {
        return $this->txtcash;
    }

    /**
     * Get the [txtfuture] column value.
     *
     * @return string
     */
    public function getTxtfuture()
    {
        return $this->txtfuture;
    }

    /**
     * Get the [txttransfer] column value.
     *
     * @return string
     */
    public function getTxttransfer()
    {
        return $this->txttransfer;
    }

    /**
     * Get the [txtcredit1] column value.
     *
     * @return string
     */
    public function getTxtcredit1()
    {
        return $this->txtcredit1;
    }

    /**
     * Get the [txtcredit2] column value.
     *
     * @return string
     */
    public function getTxtcredit2()
    {
        return $this->txtcredit2;
    }

    /**
     * Get the [txtcredit3] column value.
     *
     * @return string
     */
    public function getTxtcredit3()
    {
        return $this->txtcredit3;
    }

    /**
     * Get the [txtwithdraw] column value.
     *
     * @return string
     */
    public function getTxtwithdraw()
    {
        return $this->txtwithdraw;
    }

    /**
     * Get the [txttransfer_in] column value.
     *
     * @return string
     */
    public function getTxttransferIn()
    {
        return $this->txttransfer_in;
    }

    /**
     * Get the [txttransfer_out] column value.
     *
     * @return string
     */
    public function getTxttransferOut()
    {
        return $this->txttransfer_out;
    }

    /**
     * Get the [optioncash] column value.
     *
     * @return string
     */
    public function getOptioncash()
    {
        return $this->optioncash;
    }

    /**
     * Get the [optionfuture] column value.
     *
     * @return string
     */
    public function getOptionfuture()
    {
        return $this->optionfuture;
    }

    /**
     * Get the [optiontransfer] column value.
     *
     * @return string
     */
    public function getOptiontransfer()
    {
        return $this->optiontransfer;
    }

    /**
     * Get the [optioncredit1] column value.
     *
     * @return string
     */
    public function getOptioncredit1()
    {
        return $this->optioncredit1;
    }

    /**
     * Get the [optioncredit2] column value.
     *
     * @return string
     */
    public function getOptioncredit2()
    {
        return $this->optioncredit2;
    }

    /**
     * Get the [optioncredit3] column value.
     *
     * @return string
     */
    public function getOptioncredit3()
    {
        return $this->optioncredit3;
    }

    /**
     * Get the [optionwithdraw] column value.
     *
     * @return string
     */
    public function getOptionwithdraw()
    {
        return $this->optionwithdraw;
    }

    /**
     * Get the [optiontransfer_in] column value.
     *
     * @return string
     */
    public function getOptiontransferIn()
    {
        return $this->optiontransfer_in;
    }

    /**
     * Get the [optiontransfer_out] column value.
     *
     * @return string
     */
    public function getOptiontransferOut()
    {
        return $this->optiontransfer_out;
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
     * Get the [ewallet] column value.
     *
     * @return string
     */
    public function getEwallet()
    {
        return $this->ewallet;
    }

    /**
     * Get the [ewallet_before] column value.
     *
     * @return string
     */
    public function getEwalletBefore()
    {
        return $this->ewallet_before;
    }

    /**
     * Get the [ewallet_after] column value.
     *
     * @return string
     */
    public function getEwalletAfter()
    {
        return $this->ewallet_after;
    }

    /**
     * Get the [ipay] column value.
     *
     * @return string
     */
    public function getIpay()
    {
        return $this->ipay;
    }

    /**
     * Get the [checkportal] column value.
     *
     * @return int
     */
    public function getCheckportal()
    {
        return $this->checkportal;
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
     * Get the [locationbase] column value.
     *
     * @return int
     */
    public function getLocationbase()
    {
        return $this->locationbase;
    }

    /**
     * Get the [chkcommission] column value.
     *
     * @return string
     */
    public function getChkcommission()
    {
        return $this->chkcommission;
    }

    /**
     * Get the [txtcommission] column value.
     *
     * @return string
     */
    public function getTxtcommission()
    {
        return $this->txtcommission;
    }

    /**
     * Get the [optioncommission] column value.
     *
     * @return string
     */
    public function getOptioncommission()
    {
        return $this->optioncommission;
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
     * Get the [crate] column value.
     *
     * @return string
     */
    public function getCrate()
    {
        return $this->crate;
    }

    /**
     * Get the [echeck] column value.
     *
     * @return string
     */
    public function getEcheck()
    {
        return $this->echeck;
    }

    /**
     * Set the value of [sano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliVoucherTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setNameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_f !== $v) {
            $this->name_f = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_NAME_F] = true;
        }

        return $this;
    } // setNameF()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [usercode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setUsercode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usercode !== $v) {
            $this->usercode = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_USERCODE] = true;
        }

        return $this;
    } // setUsercode()

    /**
     * Set the value of [remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remark !== $v) {
            $this->remark = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_REMARK] = true;
        }

        return $this;
    } // setRemark()

    /**
     * Set the value of [trnf] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTrnf($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->trnf !== $v) {
            $this->trnf = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TRNF] = true;
        }

        return $this;
    } // setTrnf()

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [sa_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setSaType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sa_type !== $v) {
            $this->sa_type = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_SA_TYPE] = true;
        }

        return $this;
    } // setSaType()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [lid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setLid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lid !== $v) {
            $this->lid = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_LID] = true;
        }

        return $this;
    } // setLid()

    /**
     * Set the value of [dl] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setDl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dl !== $v) {
            $this->dl = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_DL] = true;
        }

        return $this;
    } // setDl()

    /**
     * Set the value of [cancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setCancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel !== $v) {
            $this->cancel = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CANCEL] = true;
        }

        return $this;
    } // setCancel()

    /**
     * Set the value of [send] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setSend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->send !== $v) {
            $this->send = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_SEND] = true;
        }

        return $this;
    } // setSend()

    /**
     * Set the value of [txtmoney] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtmoney($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtmoney !== $v) {
            $this->txtmoney = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTMONEY] = true;
        }

        return $this;
    } // setTxtmoney()

    /**
     * Set the value of [chkcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChkcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcash !== $v) {
            $this->chkcash = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKCASH] = true;
        }

        return $this;
    } // setChkcash()

    /**
     * Set the value of [chkfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChkfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkfuture !== $v) {
            $this->chkfuture = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKFUTURE] = true;
        }

        return $this;
    } // setChkfuture()

    /**
     * Set the value of [chktransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChktransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chktransfer !== $v) {
            $this->chktransfer = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKTRANSFER] = true;
        }

        return $this;
    } // setChktransfer()

    /**
     * Set the value of [chkcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChkcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit1 !== $v) {
            $this->chkcredit1 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKCREDIT1] = true;
        }

        return $this;
    } // setChkcredit1()

    /**
     * Set the value of [chkcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChkcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit2 !== $v) {
            $this->chkcredit2 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKCREDIT2] = true;
        }

        return $this;
    } // setChkcredit2()

    /**
     * Set the value of [chkcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChkcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit3 !== $v) {
            $this->chkcredit3 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKCREDIT3] = true;
        }

        return $this;
    } // setChkcredit3()

    /**
     * Set the value of [chkwithdraw] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChkwithdraw($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkwithdraw !== $v) {
            $this->chkwithdraw = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKWITHDRAW] = true;
        }

        return $this;
    } // setChkwithdraw()

    /**
     * Set the value of [chktransfer_in] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChktransferIn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chktransfer_in !== $v) {
            $this->chktransfer_in = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKTRANSFER_IN] = true;
        }

        return $this;
    } // setChktransferIn()

    /**
     * Set the value of [chktransfer_out] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChktransferOut($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chktransfer_out !== $v) {
            $this->chktransfer_out = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKTRANSFER_OUT] = true;
        }

        return $this;
    } // setChktransferOut()

    /**
     * Set the value of [txtcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcash !== $v) {
            $this->txtcash = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTCASH] = true;
        }

        return $this;
    } // setTxtcash()

    /**
     * Set the value of [txtfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtfuture !== $v) {
            $this->txtfuture = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTFUTURE] = true;
        }

        return $this;
    } // setTxtfuture()

    /**
     * Set the value of [txttransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxttransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer !== $v) {
            $this->txttransfer = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTTRANSFER] = true;
        }

        return $this;
    } // setTxttransfer()

    /**
     * Set the value of [txtcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit1 !== $v) {
            $this->txtcredit1 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTCREDIT1] = true;
        }

        return $this;
    } // setTxtcredit1()

    /**
     * Set the value of [txtcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit2 !== $v) {
            $this->txtcredit2 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTCREDIT2] = true;
        }

        return $this;
    } // setTxtcredit2()

    /**
     * Set the value of [txtcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit3 !== $v) {
            $this->txtcredit3 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTCREDIT3] = true;
        }

        return $this;
    } // setTxtcredit3()

    /**
     * Set the value of [txtwithdraw] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtwithdraw($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtwithdraw !== $v) {
            $this->txtwithdraw = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTWITHDRAW] = true;
        }

        return $this;
    } // setTxtwithdraw()

    /**
     * Set the value of [txttransfer_in] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxttransferIn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer_in !== $v) {
            $this->txttransfer_in = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTTRANSFER_IN] = true;
        }

        return $this;
    } // setTxttransferIn()

    /**
     * Set the value of [txttransfer_out] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxttransferOut($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer_out !== $v) {
            $this->txttransfer_out = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTTRANSFER_OUT] = true;
        }

        return $this;
    } // setTxttransferOut()

    /**
     * Set the value of [optioncash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptioncash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncash !== $v) {
            $this->optioncash = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONCASH] = true;
        }

        return $this;
    } // setOptioncash()

    /**
     * Set the value of [optionfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptionfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionfuture !== $v) {
            $this->optionfuture = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONFUTURE] = true;
        }

        return $this;
    } // setOptionfuture()

    /**
     * Set the value of [optiontransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptiontransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer !== $v) {
            $this->optiontransfer = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONTRANSFER] = true;
        }

        return $this;
    } // setOptiontransfer()

    /**
     * Set the value of [optioncredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptioncredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit1 !== $v) {
            $this->optioncredit1 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONCREDIT1] = true;
        }

        return $this;
    } // setOptioncredit1()

    /**
     * Set the value of [optioncredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptioncredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit2 !== $v) {
            $this->optioncredit2 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONCREDIT2] = true;
        }

        return $this;
    } // setOptioncredit2()

    /**
     * Set the value of [optioncredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptioncredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit3 !== $v) {
            $this->optioncredit3 = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONCREDIT3] = true;
        }

        return $this;
    } // setOptioncredit3()

    /**
     * Set the value of [optionwithdraw] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptionwithdraw($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionwithdraw !== $v) {
            $this->optionwithdraw = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONWITHDRAW] = true;
        }

        return $this;
    } // setOptionwithdraw()

    /**
     * Set the value of [optiontransfer_in] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptiontransferIn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer_in !== $v) {
            $this->optiontransfer_in = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONTRANSFER_IN] = true;
        }

        return $this;
    } // setOptiontransferIn()

    /**
     * Set the value of [optiontransfer_out] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptiontransferOut($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer_out !== $v) {
            $this->optiontransfer_out = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONTRANSFER_OUT] = true;
        }

        return $this;
    } // setOptiontransferOut()

    /**
     * Set the value of [txtoption] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtoption($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtoption !== $v) {
            $this->txtoption = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTOPTION] = true;
        }

        return $this;
    } // setTxtoption()

    /**
     * Set the value of [ewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setEwallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet !== $v) {
            $this->ewallet = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_EWALLET] = true;
        }

        return $this;
    } // setEwallet()

    /**
     * Set the value of [ewallet_before] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setEwalletBefore($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_before !== $v) {
            $this->ewallet_before = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_EWALLET_BEFORE] = true;
        }

        return $this;
    } // setEwalletBefore()

    /**
     * Set the value of [ewallet_after] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setEwalletAfter($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_after !== $v) {
            $this->ewallet_after = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_EWALLET_AFTER] = true;
        }

        return $this;
    } // setEwalletAfter()

    /**
     * Set the value of [ipay] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setIpay($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ipay !== $v) {
            $this->ipay = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_IPAY] = true;
        }

        return $this;
    } // setIpay()

    /**
     * Set the value of [checkportal] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setCheckportal($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->checkportal !== $v) {
            $this->checkportal = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHECKPORTAL] = true;
        }

        return $this;
    } // setCheckportal()

    /**
     * Set the value of [bprice] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setBprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bprice !== $v) {
            $this->bprice = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_BPRICE] = true;
        }

        return $this;
    } // setBprice()

    /**
     * Sets the value of [cancel_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setCancelDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->cancel_date !== null || $dt !== null) {
            if ($this->cancel_date === null || $dt === null || $dt->format("Y-m-d") !== $this->cancel_date->format("Y-m-d")) {
                $this->cancel_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliVoucherTableMap::COL_CANCEL_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCancelDate()

    /**
     * Set the value of [uid_cancel] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setUidCancel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid_cancel !== $v) {
            $this->uid_cancel = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_UID_CANCEL] = true;
        }

        return $this;
    } // setUidCancel()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [chkcommission] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setChkcommission($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcommission !== $v) {
            $this->chkcommission = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CHKCOMMISSION] = true;
        }

        return $this;
    } // setChkcommission()

    /**
     * Set the value of [txtcommission] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setTxtcommission($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcommission !== $v) {
            $this->txtcommission = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_TXTCOMMISSION] = true;
        }

        return $this;
    } // setTxtcommission()

    /**
     * Set the value of [optioncommission] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setOptioncommission($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncommission !== $v) {
            $this->optioncommission = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_OPTIONCOMMISSION] = true;
        }

        return $this;
    } // setOptioncommission()

    /**
     * Set the value of [mbase] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setMbase($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mbase !== $v) {
            $this->mbase = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_MBASE] = true;
        }

        return $this;
    } // setMbase()

    /**
     * Set the value of [crate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setCrate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->crate !== $v) {
            $this->crate = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_CRATE] = true;
        }

        return $this;
    } // setCrate()

    /**
     * Set the value of [echeck] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object (for fluent API support)
     */
    public function setEcheck($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->echeck !== $v) {
            $this->echeck = $v;
            $this->modifiedColumns[AliVoucherTableMap::COL_ECHECK] = true;
        }

        return $this;
    } // setEcheck()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliVoucherTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliVoucherTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliVoucherTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliVoucherTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliVoucherTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliVoucherTableMap::translateFieldName('NameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliVoucherTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliVoucherTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliVoucherTableMap::translateFieldName('Usercode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usercode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliVoucherTableMap::translateFieldName('Remark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliVoucherTableMap::translateFieldName('Trnf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trnf = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliVoucherTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliVoucherTableMap::translateFieldName('SaType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliVoucherTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliVoucherTableMap::translateFieldName('Lid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliVoucherTableMap::translateFieldName('Dl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliVoucherTableMap::translateFieldName('Cancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliVoucherTableMap::translateFieldName('Send', TableMap::TYPE_PHPNAME, $indexType)];
            $this->send = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliVoucherTableMap::translateFieldName('Txtmoney', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtmoney = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliVoucherTableMap::translateFieldName('Chkcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliVoucherTableMap::translateFieldName('Chkfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliVoucherTableMap::translateFieldName('Chktransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chktransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliVoucherTableMap::translateFieldName('Chkcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliVoucherTableMap::translateFieldName('Chkcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliVoucherTableMap::translateFieldName('Chkcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliVoucherTableMap::translateFieldName('Chkwithdraw', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkwithdraw = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliVoucherTableMap::translateFieldName('ChktransferIn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chktransfer_in = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliVoucherTableMap::translateFieldName('ChktransferOut', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chktransfer_out = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliVoucherTableMap::translateFieldName('Txtcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliVoucherTableMap::translateFieldName('Txtfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliVoucherTableMap::translateFieldName('Txttransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliVoucherTableMap::translateFieldName('Txtcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliVoucherTableMap::translateFieldName('Txtcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliVoucherTableMap::translateFieldName('Txtcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : AliVoucherTableMap::translateFieldName('Txtwithdraw', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtwithdraw = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : AliVoucherTableMap::translateFieldName('TxttransferIn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer_in = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : AliVoucherTableMap::translateFieldName('TxttransferOut', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer_out = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : AliVoucherTableMap::translateFieldName('Optioncash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : AliVoucherTableMap::translateFieldName('Optionfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : AliVoucherTableMap::translateFieldName('Optiontransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : AliVoucherTableMap::translateFieldName('Optioncredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : AliVoucherTableMap::translateFieldName('Optioncredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : AliVoucherTableMap::translateFieldName('Optioncredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : AliVoucherTableMap::translateFieldName('Optionwithdraw', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionwithdraw = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : AliVoucherTableMap::translateFieldName('OptiontransferIn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer_in = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : AliVoucherTableMap::translateFieldName('OptiontransferOut', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer_out = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : AliVoucherTableMap::translateFieldName('Txtoption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtoption = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : AliVoucherTableMap::translateFieldName('Ewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : AliVoucherTableMap::translateFieldName('EwalletBefore', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_before = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : AliVoucherTableMap::translateFieldName('EwalletAfter', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_after = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : AliVoucherTableMap::translateFieldName('Ipay', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ipay = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : AliVoucherTableMap::translateFieldName('Checkportal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->checkportal = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : AliVoucherTableMap::translateFieldName('Bprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : AliVoucherTableMap::translateFieldName('CancelDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->cancel_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : AliVoucherTableMap::translateFieldName('UidCancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid_cancel = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : AliVoucherTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : AliVoucherTableMap::translateFieldName('Chkcommission', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcommission = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : AliVoucherTableMap::translateFieldName('Txtcommission', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcommission = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : AliVoucherTableMap::translateFieldName('Optioncommission', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncommission = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : AliVoucherTableMap::translateFieldName('Mbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mbase = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : AliVoucherTableMap::translateFieldName('Crate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 61 + $startcol : AliVoucherTableMap::translateFieldName('Echeck', TableMap::TYPE_PHPNAME, $indexType)];
            $this->echeck = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 62; // 62 = AliVoucherTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliVoucher'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliVoucherTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliVoucherQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliVoucher::setDeleted()
     * @see AliVoucher::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliVoucherTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliVoucherQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliVoucherTableMap::DATABASE_NAME);
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
                AliVoucherTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliVoucherTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliVoucherTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliVoucherTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_NAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'name_f';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_USERCODE)) {
            $modifiedColumns[':p' . $index++]  = 'usercode';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'remark';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TRNF)) {
            $modifiedColumns[':p' . $index++]  = 'trnf';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_SA_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_LID)) {
            $modifiedColumns[':p' . $index++]  = 'lid';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_DL)) {
            $modifiedColumns[':p' . $index++]  = 'dl';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'cancel';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_SEND)) {
            $modifiedColumns[':p' . $index++]  = 'send';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTMONEY)) {
            $modifiedColumns[':p' . $index++]  = 'txtMoney';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCASH)) {
            $modifiedColumns[':p' . $index++]  = 'chkCash';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'chkFuture';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'chkTransfer';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit1';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit2';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit3';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKWITHDRAW)) {
            $modifiedColumns[':p' . $index++]  = 'chkWithdraw';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKTRANSFER_IN)) {
            $modifiedColumns[':p' . $index++]  = 'chkTransfer_in';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKTRANSFER_OUT)) {
            $modifiedColumns[':p' . $index++]  = 'chkTransfer_out';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCASH)) {
            $modifiedColumns[':p' . $index++]  = 'txtCash';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'txtFuture';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit1';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit2';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit3';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTWITHDRAW)) {
            $modifiedColumns[':p' . $index++]  = 'txtWithdraw';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTTRANSFER_IN)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer_in';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTTRANSFER_OUT)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer_out';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCASH)) {
            $modifiedColumns[':p' . $index++]  = 'optionCash';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'optionFuture';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit1';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit2';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit3';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONWITHDRAW)) {
            $modifiedColumns[':p' . $index++]  = 'optionWithdraw';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONTRANSFER_IN)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer_in';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONTRANSFER_OUT)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer_out';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTOPTION)) {
            $modifiedColumns[':p' . $index++]  = 'txtoption';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_EWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_EWALLET_BEFORE)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_before';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_EWALLET_AFTER)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_after';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_IPAY)) {
            $modifiedColumns[':p' . $index++]  = 'ipay';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHECKPORTAL)) {
            $modifiedColumns[':p' . $index++]  = 'checkportal';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_BPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'bprice';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CANCEL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'cancel_date';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_UID_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'uid_cancel';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCOMMISSION)) {
            $modifiedColumns[':p' . $index++]  = 'chkCommission';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCOMMISSION)) {
            $modifiedColumns[':p' . $index++]  = 'txtCommission';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCOMMISSION)) {
            $modifiedColumns[':p' . $index++]  = 'optionCommission';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_MBASE)) {
            $modifiedColumns[':p' . $index++]  = 'mbase';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CRATE)) {
            $modifiedColumns[':p' . $index++]  = 'crate';
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_ECHECK)) {
            $modifiedColumns[':p' . $index++]  = 'echeck';
        }

        $sql = sprintf(
            'INSERT INTO ali_voucher (%s) VALUES (%s)',
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
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'sadate':
                        $stmt->bindValue($identifier, $this->sadate ? $this->sadate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'inv_code':
                        $stmt->bindValue($identifier, $this->inv_code, PDO::PARAM_STR);
                        break;
                    case 'mcode':
                        $stmt->bindValue($identifier, $this->mcode, PDO::PARAM_STR);
                        break;
                    case 'name_f':
                        $stmt->bindValue($identifier, $this->name_f, PDO::PARAM_STR);
                        break;
                    case 'name_t':
                        $stmt->bindValue($identifier, $this->name_t, PDO::PARAM_STR);
                        break;
                    case 'total':
                        $stmt->bindValue($identifier, $this->total, PDO::PARAM_STR);
                        break;
                    case 'usercode':
                        $stmt->bindValue($identifier, $this->usercode, PDO::PARAM_STR);
                        break;
                    case 'remark':
                        $stmt->bindValue($identifier, $this->remark, PDO::PARAM_STR);
                        break;
                    case 'trnf':
                        $stmt->bindValue($identifier, $this->trnf, PDO::PARAM_STR);
                        break;
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'sa_type':
                        $stmt->bindValue($identifier, $this->sa_type, PDO::PARAM_STR);
                        break;
                    case 'uid':
                        $stmt->bindValue($identifier, $this->uid, PDO::PARAM_STR);
                        break;
                    case 'lid':
                        $stmt->bindValue($identifier, $this->lid, PDO::PARAM_STR);
                        break;
                    case 'dl':
                        $stmt->bindValue($identifier, $this->dl, PDO::PARAM_STR);
                        break;
                    case 'cancel':
                        $stmt->bindValue($identifier, $this->cancel, PDO::PARAM_INT);
                        break;
                    case 'send':
                        $stmt->bindValue($identifier, $this->send, PDO::PARAM_INT);
                        break;
                    case 'txtMoney':
                        $stmt->bindValue($identifier, $this->txtmoney, PDO::PARAM_STR);
                        break;
                    case 'chkCash':
                        $stmt->bindValue($identifier, $this->chkcash, PDO::PARAM_STR);
                        break;
                    case 'chkFuture':
                        $stmt->bindValue($identifier, $this->chkfuture, PDO::PARAM_STR);
                        break;
                    case 'chkTransfer':
                        $stmt->bindValue($identifier, $this->chktransfer, PDO::PARAM_STR);
                        break;
                    case 'chkCredit1':
                        $stmt->bindValue($identifier, $this->chkcredit1, PDO::PARAM_STR);
                        break;
                    case 'chkCredit2':
                        $stmt->bindValue($identifier, $this->chkcredit2, PDO::PARAM_STR);
                        break;
                    case 'chkCredit3':
                        $stmt->bindValue($identifier, $this->chkcredit3, PDO::PARAM_STR);
                        break;
                    case 'chkWithdraw':
                        $stmt->bindValue($identifier, $this->chkwithdraw, PDO::PARAM_STR);
                        break;
                    case 'chkTransfer_in':
                        $stmt->bindValue($identifier, $this->chktransfer_in, PDO::PARAM_STR);
                        break;
                    case 'chkTransfer_out':
                        $stmt->bindValue($identifier, $this->chktransfer_out, PDO::PARAM_STR);
                        break;
                    case 'txtCash':
                        $stmt->bindValue($identifier, $this->txtcash, PDO::PARAM_STR);
                        break;
                    case 'txtFuture':
                        $stmt->bindValue($identifier, $this->txtfuture, PDO::PARAM_STR);
                        break;
                    case 'txtTransfer':
                        $stmt->bindValue($identifier, $this->txttransfer, PDO::PARAM_STR);
                        break;
                    case 'txtCredit1':
                        $stmt->bindValue($identifier, $this->txtcredit1, PDO::PARAM_STR);
                        break;
                    case 'txtCredit2':
                        $stmt->bindValue($identifier, $this->txtcredit2, PDO::PARAM_STR);
                        break;
                    case 'txtCredit3':
                        $stmt->bindValue($identifier, $this->txtcredit3, PDO::PARAM_STR);
                        break;
                    case 'txtWithdraw':
                        $stmt->bindValue($identifier, $this->txtwithdraw, PDO::PARAM_STR);
                        break;
                    case 'txtTransfer_in':
                        $stmt->bindValue($identifier, $this->txttransfer_in, PDO::PARAM_STR);
                        break;
                    case 'txtTransfer_out':
                        $stmt->bindValue($identifier, $this->txttransfer_out, PDO::PARAM_STR);
                        break;
                    case 'optionCash':
                        $stmt->bindValue($identifier, $this->optioncash, PDO::PARAM_STR);
                        break;
                    case 'optionFuture':
                        $stmt->bindValue($identifier, $this->optionfuture, PDO::PARAM_STR);
                        break;
                    case 'optionTransfer':
                        $stmt->bindValue($identifier, $this->optiontransfer, PDO::PARAM_STR);
                        break;
                    case 'optionCredit1':
                        $stmt->bindValue($identifier, $this->optioncredit1, PDO::PARAM_STR);
                        break;
                    case 'optionCredit2':
                        $stmt->bindValue($identifier, $this->optioncredit2, PDO::PARAM_STR);
                        break;
                    case 'optionCredit3':
                        $stmt->bindValue($identifier, $this->optioncredit3, PDO::PARAM_STR);
                        break;
                    case 'optionWithdraw':
                        $stmt->bindValue($identifier, $this->optionwithdraw, PDO::PARAM_STR);
                        break;
                    case 'optionTransfer_in':
                        $stmt->bindValue($identifier, $this->optiontransfer_in, PDO::PARAM_STR);
                        break;
                    case 'optionTransfer_out':
                        $stmt->bindValue($identifier, $this->optiontransfer_out, PDO::PARAM_STR);
                        break;
                    case 'txtoption':
                        $stmt->bindValue($identifier, $this->txtoption, PDO::PARAM_STR);
                        break;
                    case 'ewallet':
                        $stmt->bindValue($identifier, $this->ewallet, PDO::PARAM_STR);
                        break;
                    case 'ewallet_before':
                        $stmt->bindValue($identifier, $this->ewallet_before, PDO::PARAM_STR);
                        break;
                    case 'ewallet_after':
                        $stmt->bindValue($identifier, $this->ewallet_after, PDO::PARAM_STR);
                        break;
                    case 'ipay':
                        $stmt->bindValue($identifier, $this->ipay, PDO::PARAM_STR);
                        break;
                    case 'checkportal':
                        $stmt->bindValue($identifier, $this->checkportal, PDO::PARAM_INT);
                        break;
                    case 'bprice':
                        $stmt->bindValue($identifier, $this->bprice, PDO::PARAM_STR);
                        break;
                    case 'cancel_date':
                        $stmt->bindValue($identifier, $this->cancel_date ? $this->cancel_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'uid_cancel':
                        $stmt->bindValue($identifier, $this->uid_cancel, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'chkCommission':
                        $stmt->bindValue($identifier, $this->chkcommission, PDO::PARAM_STR);
                        break;
                    case 'txtCommission':
                        $stmt->bindValue($identifier, $this->txtcommission, PDO::PARAM_STR);
                        break;
                    case 'optionCommission':
                        $stmt->bindValue($identifier, $this->optioncommission, PDO::PARAM_STR);
                        break;
                    case 'mbase':
                        $stmt->bindValue($identifier, $this->mbase, PDO::PARAM_STR);
                        break;
                    case 'crate':
                        $stmt->bindValue($identifier, $this->crate, PDO::PARAM_STR);
                        break;
                    case 'echeck':
                        $stmt->bindValue($identifier, $this->echeck, PDO::PARAM_STR);
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
        $pos = AliVoucherTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRcode();
                break;
            case 2:
                return $this->getSadate();
                break;
            case 3:
                return $this->getInvCode();
                break;
            case 4:
                return $this->getMcode();
                break;
            case 5:
                return $this->getNameF();
                break;
            case 6:
                return $this->getNameT();
                break;
            case 7:
                return $this->getTotal();
                break;
            case 8:
                return $this->getUsercode();
                break;
            case 9:
                return $this->getRemark();
                break;
            case 10:
                return $this->getTrnf();
                break;
            case 11:
                return $this->getId();
                break;
            case 12:
                return $this->getSaType();
                break;
            case 13:
                return $this->getUid();
                break;
            case 14:
                return $this->getLid();
                break;
            case 15:
                return $this->getDl();
                break;
            case 16:
                return $this->getCancel();
                break;
            case 17:
                return $this->getSend();
                break;
            case 18:
                return $this->getTxtmoney();
                break;
            case 19:
                return $this->getChkcash();
                break;
            case 20:
                return $this->getChkfuture();
                break;
            case 21:
                return $this->getChktransfer();
                break;
            case 22:
                return $this->getChkcredit1();
                break;
            case 23:
                return $this->getChkcredit2();
                break;
            case 24:
                return $this->getChkcredit3();
                break;
            case 25:
                return $this->getChkwithdraw();
                break;
            case 26:
                return $this->getChktransferIn();
                break;
            case 27:
                return $this->getChktransferOut();
                break;
            case 28:
                return $this->getTxtcash();
                break;
            case 29:
                return $this->getTxtfuture();
                break;
            case 30:
                return $this->getTxttransfer();
                break;
            case 31:
                return $this->getTxtcredit1();
                break;
            case 32:
                return $this->getTxtcredit2();
                break;
            case 33:
                return $this->getTxtcredit3();
                break;
            case 34:
                return $this->getTxtwithdraw();
                break;
            case 35:
                return $this->getTxttransferIn();
                break;
            case 36:
                return $this->getTxttransferOut();
                break;
            case 37:
                return $this->getOptioncash();
                break;
            case 38:
                return $this->getOptionfuture();
                break;
            case 39:
                return $this->getOptiontransfer();
                break;
            case 40:
                return $this->getOptioncredit1();
                break;
            case 41:
                return $this->getOptioncredit2();
                break;
            case 42:
                return $this->getOptioncredit3();
                break;
            case 43:
                return $this->getOptionwithdraw();
                break;
            case 44:
                return $this->getOptiontransferIn();
                break;
            case 45:
                return $this->getOptiontransferOut();
                break;
            case 46:
                return $this->getTxtoption();
                break;
            case 47:
                return $this->getEwallet();
                break;
            case 48:
                return $this->getEwalletBefore();
                break;
            case 49:
                return $this->getEwalletAfter();
                break;
            case 50:
                return $this->getIpay();
                break;
            case 51:
                return $this->getCheckportal();
                break;
            case 52:
                return $this->getBprice();
                break;
            case 53:
                return $this->getCancelDate();
                break;
            case 54:
                return $this->getUidCancel();
                break;
            case 55:
                return $this->getLocationbase();
                break;
            case 56:
                return $this->getChkcommission();
                break;
            case 57:
                return $this->getTxtcommission();
                break;
            case 58:
                return $this->getOptioncommission();
                break;
            case 59:
                return $this->getMbase();
                break;
            case 60:
                return $this->getCrate();
                break;
            case 61:
                return $this->getEcheck();
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

        if (isset($alreadyDumpedObjects['AliVoucher'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliVoucher'][$this->hashCode()] = true;
        $keys = AliVoucherTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSano(),
            $keys[1] => $this->getRcode(),
            $keys[2] => $this->getSadate(),
            $keys[3] => $this->getInvCode(),
            $keys[4] => $this->getMcode(),
            $keys[5] => $this->getNameF(),
            $keys[6] => $this->getNameT(),
            $keys[7] => $this->getTotal(),
            $keys[8] => $this->getUsercode(),
            $keys[9] => $this->getRemark(),
            $keys[10] => $this->getTrnf(),
            $keys[11] => $this->getId(),
            $keys[12] => $this->getSaType(),
            $keys[13] => $this->getUid(),
            $keys[14] => $this->getLid(),
            $keys[15] => $this->getDl(),
            $keys[16] => $this->getCancel(),
            $keys[17] => $this->getSend(),
            $keys[18] => $this->getTxtmoney(),
            $keys[19] => $this->getChkcash(),
            $keys[20] => $this->getChkfuture(),
            $keys[21] => $this->getChktransfer(),
            $keys[22] => $this->getChkcredit1(),
            $keys[23] => $this->getChkcredit2(),
            $keys[24] => $this->getChkcredit3(),
            $keys[25] => $this->getChkwithdraw(),
            $keys[26] => $this->getChktransferIn(),
            $keys[27] => $this->getChktransferOut(),
            $keys[28] => $this->getTxtcash(),
            $keys[29] => $this->getTxtfuture(),
            $keys[30] => $this->getTxttransfer(),
            $keys[31] => $this->getTxtcredit1(),
            $keys[32] => $this->getTxtcredit2(),
            $keys[33] => $this->getTxtcredit3(),
            $keys[34] => $this->getTxtwithdraw(),
            $keys[35] => $this->getTxttransferIn(),
            $keys[36] => $this->getTxttransferOut(),
            $keys[37] => $this->getOptioncash(),
            $keys[38] => $this->getOptionfuture(),
            $keys[39] => $this->getOptiontransfer(),
            $keys[40] => $this->getOptioncredit1(),
            $keys[41] => $this->getOptioncredit2(),
            $keys[42] => $this->getOptioncredit3(),
            $keys[43] => $this->getOptionwithdraw(),
            $keys[44] => $this->getOptiontransferIn(),
            $keys[45] => $this->getOptiontransferOut(),
            $keys[46] => $this->getTxtoption(),
            $keys[47] => $this->getEwallet(),
            $keys[48] => $this->getEwalletBefore(),
            $keys[49] => $this->getEwalletAfter(),
            $keys[50] => $this->getIpay(),
            $keys[51] => $this->getCheckportal(),
            $keys[52] => $this->getBprice(),
            $keys[53] => $this->getCancelDate(),
            $keys[54] => $this->getUidCancel(),
            $keys[55] => $this->getLocationbase(),
            $keys[56] => $this->getChkcommission(),
            $keys[57] => $this->getTxtcommission(),
            $keys[58] => $this->getOptioncommission(),
            $keys[59] => $this->getMbase(),
            $keys[60] => $this->getCrate(),
            $keys[61] => $this->getEcheck(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[53]] instanceof \DateTimeInterface) {
            $result[$keys[53]] = $result[$keys[53]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliVoucher
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliVoucherTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliVoucher
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSano($value);
                break;
            case 1:
                $this->setRcode($value);
                break;
            case 2:
                $this->setSadate($value);
                break;
            case 3:
                $this->setInvCode($value);
                break;
            case 4:
                $this->setMcode($value);
                break;
            case 5:
                $this->setNameF($value);
                break;
            case 6:
                $this->setNameT($value);
                break;
            case 7:
                $this->setTotal($value);
                break;
            case 8:
                $this->setUsercode($value);
                break;
            case 9:
                $this->setRemark($value);
                break;
            case 10:
                $this->setTrnf($value);
                break;
            case 11:
                $this->setId($value);
                break;
            case 12:
                $this->setSaType($value);
                break;
            case 13:
                $this->setUid($value);
                break;
            case 14:
                $this->setLid($value);
                break;
            case 15:
                $this->setDl($value);
                break;
            case 16:
                $this->setCancel($value);
                break;
            case 17:
                $this->setSend($value);
                break;
            case 18:
                $this->setTxtmoney($value);
                break;
            case 19:
                $this->setChkcash($value);
                break;
            case 20:
                $this->setChkfuture($value);
                break;
            case 21:
                $this->setChktransfer($value);
                break;
            case 22:
                $this->setChkcredit1($value);
                break;
            case 23:
                $this->setChkcredit2($value);
                break;
            case 24:
                $this->setChkcredit3($value);
                break;
            case 25:
                $this->setChkwithdraw($value);
                break;
            case 26:
                $this->setChktransferIn($value);
                break;
            case 27:
                $this->setChktransferOut($value);
                break;
            case 28:
                $this->setTxtcash($value);
                break;
            case 29:
                $this->setTxtfuture($value);
                break;
            case 30:
                $this->setTxttransfer($value);
                break;
            case 31:
                $this->setTxtcredit1($value);
                break;
            case 32:
                $this->setTxtcredit2($value);
                break;
            case 33:
                $this->setTxtcredit3($value);
                break;
            case 34:
                $this->setTxtwithdraw($value);
                break;
            case 35:
                $this->setTxttransferIn($value);
                break;
            case 36:
                $this->setTxttransferOut($value);
                break;
            case 37:
                $this->setOptioncash($value);
                break;
            case 38:
                $this->setOptionfuture($value);
                break;
            case 39:
                $this->setOptiontransfer($value);
                break;
            case 40:
                $this->setOptioncredit1($value);
                break;
            case 41:
                $this->setOptioncredit2($value);
                break;
            case 42:
                $this->setOptioncredit3($value);
                break;
            case 43:
                $this->setOptionwithdraw($value);
                break;
            case 44:
                $this->setOptiontransferIn($value);
                break;
            case 45:
                $this->setOptiontransferOut($value);
                break;
            case 46:
                $this->setTxtoption($value);
                break;
            case 47:
                $this->setEwallet($value);
                break;
            case 48:
                $this->setEwalletBefore($value);
                break;
            case 49:
                $this->setEwalletAfter($value);
                break;
            case 50:
                $this->setIpay($value);
                break;
            case 51:
                $this->setCheckportal($value);
                break;
            case 52:
                $this->setBprice($value);
                break;
            case 53:
                $this->setCancelDate($value);
                break;
            case 54:
                $this->setUidCancel($value);
                break;
            case 55:
                $this->setLocationbase($value);
                break;
            case 56:
                $this->setChkcommission($value);
                break;
            case 57:
                $this->setTxtcommission($value);
                break;
            case 58:
                $this->setOptioncommission($value);
                break;
            case 59:
                $this->setMbase($value);
                break;
            case 60:
                $this->setCrate($value);
                break;
            case 61:
                $this->setEcheck($value);
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
        $keys = AliVoucherTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSano($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRcode($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSadate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInvCode($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setMcode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setNameF($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setNameT($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTotal($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setUsercode($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setRemark($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTrnf($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setId($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSaType($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setUid($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setLid($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDl($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setCancel($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setSend($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTxtmoney($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setChkcash($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setChkfuture($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setChktransfer($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setChkcredit1($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setChkcredit2($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setChkcredit3($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setChkwithdraw($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setChktransferIn($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setChktransferOut($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setTxtcash($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setTxtfuture($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setTxttransfer($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setTxtcredit1($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setTxtcredit2($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setTxtcredit3($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setTxtwithdraw($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setTxttransferIn($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setTxttransferOut($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setOptioncash($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setOptionfuture($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setOptiontransfer($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setOptioncredit1($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setOptioncredit2($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setOptioncredit3($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setOptionwithdraw($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setOptiontransferIn($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setOptiontransferOut($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setTxtoption($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setEwallet($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setEwalletBefore($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setEwalletAfter($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setIpay($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setCheckportal($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setBprice($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setCancelDate($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setUidCancel($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setLocationbase($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setChkcommission($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setTxtcommission($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setOptioncommission($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setMbase($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setCrate($arr[$keys[60]]);
        }
        if (array_key_exists($keys[61], $arr)) {
            $this->setEcheck($arr[$keys[61]]);
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
     * @return $this|\CciOrm\CciOrm\AliVoucher The current object, for fluid interface
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
        $criteria = new Criteria(AliVoucherTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliVoucherTableMap::COL_SANO)) {
            $criteria->add(AliVoucherTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_RCODE)) {
            $criteria->add(AliVoucherTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_SADATE)) {
            $criteria->add(AliVoucherTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_INV_CODE)) {
            $criteria->add(AliVoucherTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_MCODE)) {
            $criteria->add(AliVoucherTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_NAME_F)) {
            $criteria->add(AliVoucherTableMap::COL_NAME_F, $this->name_f);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_NAME_T)) {
            $criteria->add(AliVoucherTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TOTAL)) {
            $criteria->add(AliVoucherTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_USERCODE)) {
            $criteria->add(AliVoucherTableMap::COL_USERCODE, $this->usercode);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_REMARK)) {
            $criteria->add(AliVoucherTableMap::COL_REMARK, $this->remark);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TRNF)) {
            $criteria->add(AliVoucherTableMap::COL_TRNF, $this->trnf);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_ID)) {
            $criteria->add(AliVoucherTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_SA_TYPE)) {
            $criteria->add(AliVoucherTableMap::COL_SA_TYPE, $this->sa_type);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_UID)) {
            $criteria->add(AliVoucherTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_LID)) {
            $criteria->add(AliVoucherTableMap::COL_LID, $this->lid);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_DL)) {
            $criteria->add(AliVoucherTableMap::COL_DL, $this->dl);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CANCEL)) {
            $criteria->add(AliVoucherTableMap::COL_CANCEL, $this->cancel);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_SEND)) {
            $criteria->add(AliVoucherTableMap::COL_SEND, $this->send);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTMONEY)) {
            $criteria->add(AliVoucherTableMap::COL_TXTMONEY, $this->txtmoney);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCASH)) {
            $criteria->add(AliVoucherTableMap::COL_CHKCASH, $this->chkcash);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKFUTURE)) {
            $criteria->add(AliVoucherTableMap::COL_CHKFUTURE, $this->chkfuture);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKTRANSFER)) {
            $criteria->add(AliVoucherTableMap::COL_CHKTRANSFER, $this->chktransfer);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCREDIT1)) {
            $criteria->add(AliVoucherTableMap::COL_CHKCREDIT1, $this->chkcredit1);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCREDIT2)) {
            $criteria->add(AliVoucherTableMap::COL_CHKCREDIT2, $this->chkcredit2);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCREDIT3)) {
            $criteria->add(AliVoucherTableMap::COL_CHKCREDIT3, $this->chkcredit3);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKWITHDRAW)) {
            $criteria->add(AliVoucherTableMap::COL_CHKWITHDRAW, $this->chkwithdraw);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKTRANSFER_IN)) {
            $criteria->add(AliVoucherTableMap::COL_CHKTRANSFER_IN, $this->chktransfer_in);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKTRANSFER_OUT)) {
            $criteria->add(AliVoucherTableMap::COL_CHKTRANSFER_OUT, $this->chktransfer_out);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCASH)) {
            $criteria->add(AliVoucherTableMap::COL_TXTCASH, $this->txtcash);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTFUTURE)) {
            $criteria->add(AliVoucherTableMap::COL_TXTFUTURE, $this->txtfuture);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTTRANSFER)) {
            $criteria->add(AliVoucherTableMap::COL_TXTTRANSFER, $this->txttransfer);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCREDIT1)) {
            $criteria->add(AliVoucherTableMap::COL_TXTCREDIT1, $this->txtcredit1);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCREDIT2)) {
            $criteria->add(AliVoucherTableMap::COL_TXTCREDIT2, $this->txtcredit2);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCREDIT3)) {
            $criteria->add(AliVoucherTableMap::COL_TXTCREDIT3, $this->txtcredit3);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTWITHDRAW)) {
            $criteria->add(AliVoucherTableMap::COL_TXTWITHDRAW, $this->txtwithdraw);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTTRANSFER_IN)) {
            $criteria->add(AliVoucherTableMap::COL_TXTTRANSFER_IN, $this->txttransfer_in);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTTRANSFER_OUT)) {
            $criteria->add(AliVoucherTableMap::COL_TXTTRANSFER_OUT, $this->txttransfer_out);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCASH)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONCASH, $this->optioncash);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONFUTURE)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONFUTURE, $this->optionfuture);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONTRANSFER)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONTRANSFER, $this->optiontransfer);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCREDIT1)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONCREDIT1, $this->optioncredit1);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCREDIT2)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONCREDIT2, $this->optioncredit2);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCREDIT3)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONCREDIT3, $this->optioncredit3);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONWITHDRAW)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONWITHDRAW, $this->optionwithdraw);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONTRANSFER_IN)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONTRANSFER_IN, $this->optiontransfer_in);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONTRANSFER_OUT)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONTRANSFER_OUT, $this->optiontransfer_out);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTOPTION)) {
            $criteria->add(AliVoucherTableMap::COL_TXTOPTION, $this->txtoption);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_EWALLET)) {
            $criteria->add(AliVoucherTableMap::COL_EWALLET, $this->ewallet);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_EWALLET_BEFORE)) {
            $criteria->add(AliVoucherTableMap::COL_EWALLET_BEFORE, $this->ewallet_before);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_EWALLET_AFTER)) {
            $criteria->add(AliVoucherTableMap::COL_EWALLET_AFTER, $this->ewallet_after);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_IPAY)) {
            $criteria->add(AliVoucherTableMap::COL_IPAY, $this->ipay);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHECKPORTAL)) {
            $criteria->add(AliVoucherTableMap::COL_CHECKPORTAL, $this->checkportal);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_BPRICE)) {
            $criteria->add(AliVoucherTableMap::COL_BPRICE, $this->bprice);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CANCEL_DATE)) {
            $criteria->add(AliVoucherTableMap::COL_CANCEL_DATE, $this->cancel_date);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_UID_CANCEL)) {
            $criteria->add(AliVoucherTableMap::COL_UID_CANCEL, $this->uid_cancel);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliVoucherTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CHKCOMMISSION)) {
            $criteria->add(AliVoucherTableMap::COL_CHKCOMMISSION, $this->chkcommission);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_TXTCOMMISSION)) {
            $criteria->add(AliVoucherTableMap::COL_TXTCOMMISSION, $this->txtcommission);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_OPTIONCOMMISSION)) {
            $criteria->add(AliVoucherTableMap::COL_OPTIONCOMMISSION, $this->optioncommission);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_MBASE)) {
            $criteria->add(AliVoucherTableMap::COL_MBASE, $this->mbase);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_CRATE)) {
            $criteria->add(AliVoucherTableMap::COL_CRATE, $this->crate);
        }
        if ($this->isColumnModified(AliVoucherTableMap::COL_ECHECK)) {
            $criteria->add(AliVoucherTableMap::COL_ECHECK, $this->echeck);
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
        $criteria = ChildAliVoucherQuery::create();
        $criteria->add(AliVoucherTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliVoucher (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSano($this->getSano());
        $copyObj->setRcode($this->getRcode());
        $copyObj->setSadate($this->getSadate());
        $copyObj->setInvCode($this->getInvCode());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameF($this->getNameF());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setUsercode($this->getUsercode());
        $copyObj->setRemark($this->getRemark());
        $copyObj->setTrnf($this->getTrnf());
        $copyObj->setSaType($this->getSaType());
        $copyObj->setUid($this->getUid());
        $copyObj->setLid($this->getLid());
        $copyObj->setDl($this->getDl());
        $copyObj->setCancel($this->getCancel());
        $copyObj->setSend($this->getSend());
        $copyObj->setTxtmoney($this->getTxtmoney());
        $copyObj->setChkcash($this->getChkcash());
        $copyObj->setChkfuture($this->getChkfuture());
        $copyObj->setChktransfer($this->getChktransfer());
        $copyObj->setChkcredit1($this->getChkcredit1());
        $copyObj->setChkcredit2($this->getChkcredit2());
        $copyObj->setChkcredit3($this->getChkcredit3());
        $copyObj->setChkwithdraw($this->getChkwithdraw());
        $copyObj->setChktransferIn($this->getChktransferIn());
        $copyObj->setChktransferOut($this->getChktransferOut());
        $copyObj->setTxtcash($this->getTxtcash());
        $copyObj->setTxtfuture($this->getTxtfuture());
        $copyObj->setTxttransfer($this->getTxttransfer());
        $copyObj->setTxtcredit1($this->getTxtcredit1());
        $copyObj->setTxtcredit2($this->getTxtcredit2());
        $copyObj->setTxtcredit3($this->getTxtcredit3());
        $copyObj->setTxtwithdraw($this->getTxtwithdraw());
        $copyObj->setTxttransferIn($this->getTxttransferIn());
        $copyObj->setTxttransferOut($this->getTxttransferOut());
        $copyObj->setOptioncash($this->getOptioncash());
        $copyObj->setOptionfuture($this->getOptionfuture());
        $copyObj->setOptiontransfer($this->getOptiontransfer());
        $copyObj->setOptioncredit1($this->getOptioncredit1());
        $copyObj->setOptioncredit2($this->getOptioncredit2());
        $copyObj->setOptioncredit3($this->getOptioncredit3());
        $copyObj->setOptionwithdraw($this->getOptionwithdraw());
        $copyObj->setOptiontransferIn($this->getOptiontransferIn());
        $copyObj->setOptiontransferOut($this->getOptiontransferOut());
        $copyObj->setTxtoption($this->getTxtoption());
        $copyObj->setEwallet($this->getEwallet());
        $copyObj->setEwalletBefore($this->getEwalletBefore());
        $copyObj->setEwalletAfter($this->getEwalletAfter());
        $copyObj->setIpay($this->getIpay());
        $copyObj->setCheckportal($this->getCheckportal());
        $copyObj->setBprice($this->getBprice());
        $copyObj->setCancelDate($this->getCancelDate());
        $copyObj->setUidCancel($this->getUidCancel());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setChkcommission($this->getChkcommission());
        $copyObj->setTxtcommission($this->getTxtcommission());
        $copyObj->setOptioncommission($this->getOptioncommission());
        $copyObj->setMbase($this->getMbase());
        $copyObj->setCrate($this->getCrate());
        $copyObj->setEcheck($this->getEcheck());
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
     * @return \CciOrm\CciOrm\AliVoucher Clone of current object.
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
        $this->rcode = null;
        $this->sadate = null;
        $this->inv_code = null;
        $this->mcode = null;
        $this->name_f = null;
        $this->name_t = null;
        $this->total = null;
        $this->usercode = null;
        $this->remark = null;
        $this->trnf = null;
        $this->id = null;
        $this->sa_type = null;
        $this->uid = null;
        $this->lid = null;
        $this->dl = null;
        $this->cancel = null;
        $this->send = null;
        $this->txtmoney = null;
        $this->chkcash = null;
        $this->chkfuture = null;
        $this->chktransfer = null;
        $this->chkcredit1 = null;
        $this->chkcredit2 = null;
        $this->chkcredit3 = null;
        $this->chkwithdraw = null;
        $this->chktransfer_in = null;
        $this->chktransfer_out = null;
        $this->txtcash = null;
        $this->txtfuture = null;
        $this->txttransfer = null;
        $this->txtcredit1 = null;
        $this->txtcredit2 = null;
        $this->txtcredit3 = null;
        $this->txtwithdraw = null;
        $this->txttransfer_in = null;
        $this->txttransfer_out = null;
        $this->optioncash = null;
        $this->optionfuture = null;
        $this->optiontransfer = null;
        $this->optioncredit1 = null;
        $this->optioncredit2 = null;
        $this->optioncredit3 = null;
        $this->optionwithdraw = null;
        $this->optiontransfer_in = null;
        $this->optiontransfer_out = null;
        $this->txtoption = null;
        $this->ewallet = null;
        $this->ewallet_before = null;
        $this->ewallet_after = null;
        $this->ipay = null;
        $this->checkportal = null;
        $this->bprice = null;
        $this->cancel_date = null;
        $this->uid_cancel = null;
        $this->locationbase = null;
        $this->chkcommission = null;
        $this->txtcommission = null;
        $this->optioncommission = null;
        $this->mbase = null;
        $this->crate = null;
        $this->echeck = null;
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
        return (string) $this->exportTo(AliVoucherTableMap::DEFAULT_STRING_FORMAT);
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
