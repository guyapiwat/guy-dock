<?php

namespace CciOrm\CciOrm\Base;

use \DateTime;
use \Exception;
use \PDO;
use CciOrm\CciOrm\AliTransferewalletHQuery as ChildAliTransferewalletHQuery;
use CciOrm\CciOrm\Map\AliTransferewalletHTableMap;
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
 * Base class that represents a row from the 'ali_transferewallet_h' table.
 *
 *
 *
 * @package    propel.generator.CciOrm.CciOrm.Base
 */
abstract class AliTransferewalletH implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\CciOrm\\CciOrm\\Map\\AliTransferewalletHTableMap';


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
     * The value for the inv_ref field.
     *
     * @var        string
     */
    protected $inv_ref;

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
     * The value for the tot_fv field.
     *
     * @var        string
     */
    protected $tot_fv;

    /**
     * The value for the tot_weight field.
     *
     * @var        string
     */
    protected $tot_weight;

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
     * Note: this column has a database default value of: 0
     * @var        int
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
     * The value for the txtoption field.
     *
     * @var        string
     */
    protected $txtoption;

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
     * The value for the chkinternet field.
     *
     * @var        string
     */
    protected $chkinternet;

    /**
     * The value for the chkdiscount field.
     *
     * @var        string
     */
    protected $chkdiscount;

    /**
     * The value for the chkother field.
     *
     * @var        string
     */
    protected $chkother;

    /**
     * The value for the txtcash field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtcash;

    /**
     * The value for the txtfuture field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtfuture;

    /**
     * The value for the txttransfer field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txttransfer;

    /**
     * The value for the ewallet field.
     *
     * @var        string
     */
    protected $ewallet;

    /**
     * The value for the txtcredit1 field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtcredit1;

    /**
     * The value for the txtcredit2 field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtcredit2;

    /**
     * The value for the txtcredit3 field.
     *
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $txtcredit3;

    /**
     * The value for the txtinternet field.
     *
     * @var        string
     */
    protected $txtinternet;

    /**
     * The value for the txtdiscount field.
     *
     * @var        string
     */
    protected $txtdiscount;

    /**
     * The value for the txtother field.
     *
     * @var        string
     */
    protected $txtother;

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
     * The value for the optioninternet field.
     *
     * @var        string
     */
    protected $optioninternet;

    /**
     * The value for the optiondiscount field.
     *
     * @var        string
     */
    protected $optiondiscount;

    /**
     * The value for the optionother field.
     *
     * @var        string
     */
    protected $optionother;

    /**
     * The value for the discount field.
     *
     * @var        string
     */
    protected $discount;

    /**
     * The value for the print field.
     *
     * @var        int
     */
    protected $print;

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
     * The value for the pay_type field.
     *
     * @var        string
     */
    protected $pay_type;

    /**
     * The value for the hcancel field.
     *
     * @var        int
     */
    protected $hcancel;

    /**
     * The value for the caddress field.
     *
     * @var        string
     */
    protected $caddress;

    /**
     * The value for the cdistrictid field.
     *
     * @var        int
     */
    protected $cdistrictid;

    /**
     * The value for the camphurid field.
     *
     * @var        int
     */
    protected $camphurid;

    /**
     * The value for the cprovinceid field.
     *
     * @var        int
     */
    protected $cprovinceid;

    /**
     * The value for the czip field.
     *
     * @var        string
     */
    protected $czip;

    /**
     * The value for the sender field.
     *
     * @var        int
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
     * The value for the asend field.
     *
     * @var        int
     */
    protected $asend;

    /**
     * The value for the ato_type field.
     *
     * @var        int
     */
    protected $ato_type;

    /**
     * The value for the ato_id field.
     *
     * @var        int
     */
    protected $ato_id;

    /**
     * The value for the online field.
     *
     * @var        int
     */
    protected $online;

    /**
     * The value for the hpv field.
     *
     * @var        string
     */
    protected $hpv;

    /**
     * The value for the htotal field.
     *
     * @var        string
     */
    protected $htotal;

    /**
     * The value for the hdate field.
     *
     * @var        DateTime
     */
    protected $hdate;

    /**
     * The value for the scheck field.
     *
     * @var        string
     */
    protected $scheck;

    /**
     * The value for the checkportal field.
     *
     * @var        int
     */
    protected $checkportal;

    /**
     * The value for the rcode field.
     *
     * @var        int
     */
    protected $rcode;

    /**
     * The value for the bmcauto field.
     *
     * @var        int
     */
    protected $bmcauto;

    /**
     * The value for the transtype field.
     *
     * @var        int
     */
    protected $transtype;

    /**
     * The value for the paytype field.
     *
     * @var        int
     */
    protected $paytype;

    /**
     * The value for the sendtype field.
     *
     * @var        int
     */
    protected $sendtype;

    /**
     * The value for the credittype field.
     *
     * @var        int
     */
    protected $credittype;

    /**
     * The value for the paydate field.
     *
     * @var        DateTime
     */
    protected $paydate;

    /**
     * The value for the locationbase field.
     *
     * @var        int
     */
    protected $locationbase;

    /**
     * The value for the bprice field.
     *
     * @var        string
     */
    protected $bprice;

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
        $this->txtcash = '0';
        $this->txtfuture = '0';
        $this->txttransfer = '0';
        $this->txtcredit1 = '0';
        $this->txtcredit2 = '0';
        $this->txtcredit3 = '0';
    }

    /**
     * Initializes internal state of CciOrm\CciOrm\Base\AliTransferewalletH object.
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
     * Compares this with another <code>AliTransferewalletH</code> instance.  If
     * <code>obj</code> is an instance of <code>AliTransferewalletH</code>, delegates to
     * <code>equals(AliTransferewalletH)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AliTransferewalletH The current object, for fluid interface
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
     * Get the [inv_ref] column value.
     *
     * @return string
     */
    public function getInvRef()
    {
        return $this->inv_ref;
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
     * Get the [tot_fv] column value.
     *
     * @return string
     */
    public function getTotFv()
    {
        return $this->tot_fv;
    }

    /**
     * Get the [tot_weight] column value.
     *
     * @return string
     */
    public function getTotWeight()
    {
        return $this->tot_weight;
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
     * @return int
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
     * Get the [txtoption] column value.
     *
     * @return string
     */
    public function getTxtoption()
    {
        return $this->txtoption;
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
     * Get the [chkinternet] column value.
     *
     * @return string
     */
    public function getChkinternet()
    {
        return $this->chkinternet;
    }

    /**
     * Get the [chkdiscount] column value.
     *
     * @return string
     */
    public function getChkdiscount()
    {
        return $this->chkdiscount;
    }

    /**
     * Get the [chkother] column value.
     *
     * @return string
     */
    public function getChkother()
    {
        return $this->chkother;
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
     * Get the [ewallet] column value.
     *
     * @return string
     */
    public function getEwallet()
    {
        return $this->ewallet;
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
     * Get the [txtinternet] column value.
     *
     * @return string
     */
    public function getTxtinternet()
    {
        return $this->txtinternet;
    }

    /**
     * Get the [txtdiscount] column value.
     *
     * @return string
     */
    public function getTxtdiscount()
    {
        return $this->txtdiscount;
    }

    /**
     * Get the [txtother] column value.
     *
     * @return string
     */
    public function getTxtother()
    {
        return $this->txtother;
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
     * Get the [optioninternet] column value.
     *
     * @return string
     */
    public function getOptioninternet()
    {
        return $this->optioninternet;
    }

    /**
     * Get the [optiondiscount] column value.
     *
     * @return string
     */
    public function getOptiondiscount()
    {
        return $this->optiondiscount;
    }

    /**
     * Get the [optionother] column value.
     *
     * @return string
     */
    public function getOptionother()
    {
        return $this->optionother;
    }

    /**
     * Get the [discount] column value.
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
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
     * Get the [pay_type] column value.
     *
     * @return string
     */
    public function getPayType()
    {
        return $this->pay_type;
    }

    /**
     * Get the [hcancel] column value.
     *
     * @return int
     */
    public function getHcancel()
    {
        return $this->hcancel;
    }

    /**
     * Get the [caddress] column value.
     *
     * @return string
     */
    public function getCaddress()
    {
        return $this->caddress;
    }

    /**
     * Get the [cdistrictid] column value.
     *
     * @return int
     */
    public function getCdistrictid()
    {
        return $this->cdistrictid;
    }

    /**
     * Get the [camphurid] column value.
     *
     * @return int
     */
    public function getCamphurid()
    {
        return $this->camphurid;
    }

    /**
     * Get the [cprovinceid] column value.
     *
     * @return int
     */
    public function getCprovinceid()
    {
        return $this->cprovinceid;
    }

    /**
     * Get the [czip] column value.
     *
     * @return string
     */
    public function getCzip()
    {
        return $this->czip;
    }

    /**
     * Get the [sender] column value.
     *
     * @return int
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
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
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
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
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
     * Get the [asend] column value.
     *
     * @return int
     */
    public function getAsend()
    {
        return $this->asend;
    }

    /**
     * Get the [ato_type] column value.
     *
     * @return int
     */
    public function getAtoType()
    {
        return $this->ato_type;
    }

    /**
     * Get the [ato_id] column value.
     *
     * @return int
     */
    public function getAtoId()
    {
        return $this->ato_id;
    }

    /**
     * Get the [online] column value.
     *
     * @return int
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Get the [hpv] column value.
     *
     * @return string
     */
    public function getHpv()
    {
        return $this->hpv;
    }

    /**
     * Get the [htotal] column value.
     *
     * @return string
     */
    public function getHtotal()
    {
        return $this->htotal;
    }

    /**
     * Get the [optionally formatted] temporal [hdate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getHdate($format = NULL)
    {
        if ($format === null) {
            return $this->hdate;
        } else {
            return $this->hdate instanceof \DateTimeInterface ? $this->hdate->format($format) : null;
        }
    }

    /**
     * Get the [scheck] column value.
     *
     * @return string
     */
    public function getScheck()
    {
        return $this->scheck;
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
     * Get the [rcode] column value.
     *
     * @return int
     */
    public function getRcode()
    {
        return $this->rcode;
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
     * Get the [transtype] column value.
     *
     * @return int
     */
    public function getTranstype()
    {
        return $this->transtype;
    }

    /**
     * Get the [paytype] column value.
     *
     * @return int
     */
    public function getPaytype()
    {
        return $this->paytype;
    }

    /**
     * Get the [sendtype] column value.
     *
     * @return int
     */
    public function getSendtype()
    {
        return $this->sendtype;
    }

    /**
     * Get the [credittype] column value.
     *
     * @return int
     */
    public function getCredittype()
    {
        return $this->credittype;
    }

    /**
     * Get the [optionally formatted] temporal [paydate] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPaydate($format = NULL)
    {
        if ($format === null) {
            return $this->paydate;
        } else {
            return $this->paydate instanceof \DateTimeInterface ? $this->paydate->format($format) : null;
        }
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
     * Get the [bprice] column value.
     *
     * @return string
     */
    public function getBprice()
    {
        return $this->bprice;
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
     * Set the value of [sano] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSano($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano !== $v) {
            $this->sano = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_SANO] = true;
        }

        return $this;
    } // setSano()

    /**
     * Set the value of [sano1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSano1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sano1 !== $v) {
            $this->sano1 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_SANO1] = true;
        }

        return $this;
    } // setSano1()

    /**
     * Sets the value of [sadate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSadate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sadate !== null || $dt !== null) {
            if ($this->sadate === null || $dt === null || $dt->format("Y-m-d") !== $this->sadate->format("Y-m-d")) {
                $this->sadate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferewalletHTableMap::COL_SADATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSadate()

    /**
     * Sets the value of [sctime] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSctime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sctime !== null || $dt !== null) {
            if ($this->sctime === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->sctime->format("Y-m-d H:i:s.u")) {
                $this->sctime = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferewalletHTableMap::COL_SCTIME] = true;
            }
        } // if either are not null

        return $this;
    } // setSctime()

    /**
     * Set the value of [inv_code] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setInvCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_code !== $v) {
            $this->inv_code = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_INV_CODE] = true;
        }

        return $this;
    } // setInvCode()

    /**
     * Set the value of [inv_ref] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setInvRef($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inv_ref !== $v) {
            $this->inv_ref = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_INV_REF] = true;
        }

        return $this;
    } // setInvRef()

    /**
     * Set the value of [mcode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setMcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mcode !== $v) {
            $this->mcode = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_MCODE] = true;
        }

        return $this;
    } // setMcode()

    /**
     * Set the value of [name_f] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setNameF($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_f !== $v) {
            $this->name_f = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_NAME_F] = true;
        }

        return $this;
    } // setNameF()

    /**
     * Set the value of [name_t] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setNameT($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_t !== $v) {
            $this->name_t = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_NAME_T] = true;
        }

        return $this;
    } // setNameT()

    /**
     * Set the value of [total] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total !== $v) {
            $this->total = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TOTAL] = true;
        }

        return $this;
    } // setTotal()

    /**
     * Set the value of [tot_pv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTotPv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_pv !== $v) {
            $this->tot_pv = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TOT_PV] = true;
        }

        return $this;
    } // setTotPv()

    /**
     * Set the value of [tot_bv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTotBv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_bv !== $v) {
            $this->tot_bv = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TOT_BV] = true;
        }

        return $this;
    } // setTotBv()

    /**
     * Set the value of [tot_fv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTotFv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_fv !== $v) {
            $this->tot_fv = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TOT_FV] = true;
        }

        return $this;
    } // setTotFv()

    /**
     * Set the value of [tot_weight] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTotWeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tot_weight !== $v) {
            $this->tot_weight = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TOT_WEIGHT] = true;
        }

        return $this;
    } // setTotWeight()

    /**
     * Set the value of [usercode] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setUsercode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usercode !== $v) {
            $this->usercode = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_USERCODE] = true;
        }

        return $this;
    } // setUsercode()

    /**
     * Set the value of [remark] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setRemark($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->remark !== $v) {
            $this->remark = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_REMARK] = true;
        }

        return $this;
    } // setRemark()

    /**
     * Set the value of [trnf] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTrnf($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->trnf !== $v) {
            $this->trnf = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TRNF] = true;
        }

        return $this;
    } // setTrnf()

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [sa_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSaType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sa_type !== $v) {
            $this->sa_type = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_SA_TYPE] = true;
        }

        return $this;
    } // setSaType()

    /**
     * Set the value of [uid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setUid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uid !== $v) {
            $this->uid = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_UID] = true;
        }

        return $this;
    } // setUid()

    /**
     * Set the value of [lid] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setLid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lid !== $v) {
            $this->lid = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_LID] = true;
        }

        return $this;
    } // setLid()

    /**
     * Set the value of [dl] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setDl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dl !== $v) {
            $this->dl = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_DL] = true;
        }

        return $this;
    } // setDl()

    /**
     * Set the value of [cancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel !== $v) {
            $this->cancel = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CANCEL] = true;
        }

        return $this;
    } // setCancel()

    /**
     * Set the value of [send] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->send !== $v) {
            $this->send = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_SEND] = true;
        }

        return $this;
    } // setSend()

    /**
     * Set the value of [txtoption] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtoption($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtoption !== $v) {
            $this->txtoption = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTOPTION] = true;
        }

        return $this;
    } // setTxtoption()

    /**
     * Set the value of [chkcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChkcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcash !== $v) {
            $this->chkcash = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKCASH] = true;
        }

        return $this;
    } // setChkcash()

    /**
     * Set the value of [chkfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChkfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkfuture !== $v) {
            $this->chkfuture = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKFUTURE] = true;
        }

        return $this;
    } // setChkfuture()

    /**
     * Set the value of [chktransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChktransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chktransfer !== $v) {
            $this->chktransfer = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKTRANSFER] = true;
        }

        return $this;
    } // setChktransfer()

    /**
     * Set the value of [chkcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChkcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit1 !== $v) {
            $this->chkcredit1 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKCREDIT1] = true;
        }

        return $this;
    } // setChkcredit1()

    /**
     * Set the value of [chkcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChkcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit2 !== $v) {
            $this->chkcredit2 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKCREDIT2] = true;
        }

        return $this;
    } // setChkcredit2()

    /**
     * Set the value of [chkcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChkcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkcredit3 !== $v) {
            $this->chkcredit3 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKCREDIT3] = true;
        }

        return $this;
    } // setChkcredit3()

    /**
     * Set the value of [chkinternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChkinternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkinternet !== $v) {
            $this->chkinternet = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKINTERNET] = true;
        }

        return $this;
    } // setChkinternet()

    /**
     * Set the value of [chkdiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChkdiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkdiscount !== $v) {
            $this->chkdiscount = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKDISCOUNT] = true;
        }

        return $this;
    } // setChkdiscount()

    /**
     * Set the value of [chkother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setChkother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->chkother !== $v) {
            $this->chkother = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHKOTHER] = true;
        }

        return $this;
    } // setChkother()

    /**
     * Set the value of [txtcash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtcash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcash !== $v) {
            $this->txtcash = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTCASH] = true;
        }

        return $this;
    } // setTxtcash()

    /**
     * Set the value of [txtfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtfuture !== $v) {
            $this->txtfuture = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTFUTURE] = true;
        }

        return $this;
    } // setTxtfuture()

    /**
     * Set the value of [txttransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxttransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txttransfer !== $v) {
            $this->txttransfer = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTTRANSFER] = true;
        }

        return $this;
    } // setTxttransfer()

    /**
     * Set the value of [ewallet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setEwallet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet !== $v) {
            $this->ewallet = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_EWALLET] = true;
        }

        return $this;
    } // setEwallet()

    /**
     * Set the value of [txtcredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtcredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit1 !== $v) {
            $this->txtcredit1 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTCREDIT1] = true;
        }

        return $this;
    } // setTxtcredit1()

    /**
     * Set the value of [txtcredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtcredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit2 !== $v) {
            $this->txtcredit2 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTCREDIT2] = true;
        }

        return $this;
    } // setTxtcredit2()

    /**
     * Set the value of [txtcredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtcredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtcredit3 !== $v) {
            $this->txtcredit3 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTCREDIT3] = true;
        }

        return $this;
    } // setTxtcredit3()

    /**
     * Set the value of [txtinternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtinternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtinternet !== $v) {
            $this->txtinternet = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTINTERNET] = true;
        }

        return $this;
    } // setTxtinternet()

    /**
     * Set the value of [txtdiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtdiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtdiscount !== $v) {
            $this->txtdiscount = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTDISCOUNT] = true;
        }

        return $this;
    } // setTxtdiscount()

    /**
     * Set the value of [txtother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTxtother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtother !== $v) {
            $this->txtother = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TXTOTHER] = true;
        }

        return $this;
    } // setTxtother()

    /**
     * Set the value of [optioncash] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptioncash($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncash !== $v) {
            $this->optioncash = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONCASH] = true;
        }

        return $this;
    } // setOptioncash()

    /**
     * Set the value of [optionfuture] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptionfuture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionfuture !== $v) {
            $this->optionfuture = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONFUTURE] = true;
        }

        return $this;
    } // setOptionfuture()

    /**
     * Set the value of [optiontransfer] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptiontransfer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiontransfer !== $v) {
            $this->optiontransfer = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONTRANSFER] = true;
        }

        return $this;
    } // setOptiontransfer()

    /**
     * Set the value of [optioncredit1] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptioncredit1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit1 !== $v) {
            $this->optioncredit1 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONCREDIT1] = true;
        }

        return $this;
    } // setOptioncredit1()

    /**
     * Set the value of [optioncredit2] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptioncredit2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit2 !== $v) {
            $this->optioncredit2 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONCREDIT2] = true;
        }

        return $this;
    } // setOptioncredit2()

    /**
     * Set the value of [optioncredit3] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptioncredit3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioncredit3 !== $v) {
            $this->optioncredit3 = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONCREDIT3] = true;
        }

        return $this;
    } // setOptioncredit3()

    /**
     * Set the value of [optioninternet] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptioninternet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optioninternet !== $v) {
            $this->optioninternet = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONINTERNET] = true;
        }

        return $this;
    } // setOptioninternet()

    /**
     * Set the value of [optiondiscount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptiondiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optiondiscount !== $v) {
            $this->optiondiscount = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONDISCOUNT] = true;
        }

        return $this;
    } // setOptiondiscount()

    /**
     * Set the value of [optionother] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOptionother($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optionother !== $v) {
            $this->optionother = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_OPTIONOTHER] = true;
        }

        return $this;
    } // setOptionother()

    /**
     * Set the value of [discount] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setDiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discount !== $v) {
            $this->discount = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_DISCOUNT] = true;
        }

        return $this;
    } // setDiscount()

    /**
     * Set the value of [print] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setPrint($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->print !== $v) {
            $this->print = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_PRINT] = true;
        }

        return $this;
    } // setPrint()

    /**
     * Set the value of [ewallet_before] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setEwalletBefore($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_before !== $v) {
            $this->ewallet_before = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_EWALLET_BEFORE] = true;
        }

        return $this;
    } // setEwalletBefore()

    /**
     * Set the value of [ewallet_after] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setEwalletAfter($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ewallet_after !== $v) {
            $this->ewallet_after = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_EWALLET_AFTER] = true;
        }

        return $this;
    } // setEwalletAfter()

    /**
     * Set the value of [ipay] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setIpay($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ipay !== $v) {
            $this->ipay = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_IPAY] = true;
        }

        return $this;
    } // setIpay()

    /**
     * Set the value of [pay_type] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setPayType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pay_type !== $v) {
            $this->pay_type = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_PAY_TYPE] = true;
        }

        return $this;
    } // setPayType()

    /**
     * Set the value of [hcancel] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setHcancel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->hcancel !== $v) {
            $this->hcancel = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_HCANCEL] = true;
        }

        return $this;
    } // setHcancel()

    /**
     * Set the value of [caddress] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caddress !== $v) {
            $this->caddress = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CADDRESS] = true;
        }

        return $this;
    } // setCaddress()

    /**
     * Set the value of [cdistrictid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCdistrictid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cdistrictid !== $v) {
            $this->cdistrictid = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CDISTRICTID] = true;
        }

        return $this;
    } // setCdistrictid()

    /**
     * Set the value of [camphurid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCamphurid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->camphurid !== $v) {
            $this->camphurid = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CAMPHURID] = true;
        }

        return $this;
    } // setCamphurid()

    /**
     * Set the value of [cprovinceid] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCprovinceid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cprovinceid !== $v) {
            $this->cprovinceid = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CPROVINCEID] = true;
        }

        return $this;
    } // setCprovinceid()

    /**
     * Set the value of [czip] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCzip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->czip !== $v) {
            $this->czip = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CZIP] = true;
        }

        return $this;
    } // setCzip()

    /**
     * Set the value of [sender] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSender($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sender !== $v) {
            $this->sender = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_SENDER] = true;
        }

        return $this;
    } // setSender()

    /**
     * Sets the value of [sender_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSenderDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->sender_date !== null || $dt !== null) {
            if ($this->sender_date === null || $dt === null || $dt->format("Y-m-d") !== $this->sender_date->format("Y-m-d")) {
                $this->sender_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferewalletHTableMap::COL_SENDER_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setSenderDate()

    /**
     * Set the value of [receive] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setReceive($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->receive !== $v) {
            $this->receive = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_RECEIVE] = true;
        }

        return $this;
    } // setReceive()

    /**
     * Sets the value of [receive_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setReceiveDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->receive_date !== null || $dt !== null) {
            if ($this->receive_date === null || $dt === null || $dt->format("Y-m-d") !== $this->receive_date->format("Y-m-d")) {
                $this->receive_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferewalletHTableMap::COL_RECEIVE_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setReceiveDate()

    /**
     * Set the value of [asend] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setAsend($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->asend !== $v) {
            $this->asend = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_ASEND] = true;
        }

        return $this;
    } // setAsend()

    /**
     * Set the value of [ato_type] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setAtoType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ato_type !== $v) {
            $this->ato_type = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_ATO_TYPE] = true;
        }

        return $this;
    } // setAtoType()

    /**
     * Set the value of [ato_id] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setAtoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ato_id !== $v) {
            $this->ato_id = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_ATO_ID] = true;
        }

        return $this;
    } // setAtoId()

    /**
     * Set the value of [online] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setOnline($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->online !== $v) {
            $this->online = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_ONLINE] = true;
        }

        return $this;
    } // setOnline()

    /**
     * Set the value of [hpv] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setHpv($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hpv !== $v) {
            $this->hpv = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_HPV] = true;
        }

        return $this;
    } // setHpv()

    /**
     * Set the value of [htotal] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setHtotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->htotal !== $v) {
            $this->htotal = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_HTOTAL] = true;
        }

        return $this;
    } // setHtotal()

    /**
     * Sets the value of [hdate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setHdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->hdate !== null || $dt !== null) {
            if ($this->hdate === null || $dt === null || $dt->format("Y-m-d") !== $this->hdate->format("Y-m-d")) {
                $this->hdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferewalletHTableMap::COL_HDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setHdate()

    /**
     * Set the value of [scheck] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setScheck($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->scheck !== $v) {
            $this->scheck = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_SCHECK] = true;
        }

        return $this;
    } // setScheck()

    /**
     * Set the value of [checkportal] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCheckportal($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->checkportal !== $v) {
            $this->checkportal = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CHECKPORTAL] = true;
        }

        return $this;
    } // setCheckportal()

    /**
     * Set the value of [rcode] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setRcode($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rcode !== $v) {
            $this->rcode = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_RCODE] = true;
        }

        return $this;
    } // setRcode()

    /**
     * Set the value of [bmcauto] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setBmcauto($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bmcauto !== $v) {
            $this->bmcauto = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_BMCAUTO] = true;
        }

        return $this;
    } // setBmcauto()

    /**
     * Set the value of [transtype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setTranstype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->transtype !== $v) {
            $this->transtype = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_TRANSTYPE] = true;
        }

        return $this;
    } // setTranstype()

    /**
     * Set the value of [paytype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setPaytype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->paytype !== $v) {
            $this->paytype = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_PAYTYPE] = true;
        }

        return $this;
    } // setPaytype()

    /**
     * Set the value of [sendtype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setSendtype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sendtype !== $v) {
            $this->sendtype = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_SENDTYPE] = true;
        }

        return $this;
    } // setSendtype()

    /**
     * Set the value of [credittype] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCredittype($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->credittype !== $v) {
            $this->credittype = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CREDITTYPE] = true;
        }

        return $this;
    } // setCredittype()

    /**
     * Sets the value of [paydate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setPaydate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->paydate !== null || $dt !== null) {
            if ($this->paydate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->paydate->format("Y-m-d H:i:s.u")) {
                $this->paydate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AliTransferewalletHTableMap::COL_PAYDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setPaydate()

    /**
     * Set the value of [locationbase] column.
     *
     * @param int $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setLocationbase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->locationbase !== $v) {
            $this->locationbase = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_LOCATIONBASE] = true;
        }

        return $this;
    } // setLocationbase()

    /**
     * Set the value of [bprice] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setBprice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bprice !== $v) {
            $this->bprice = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_BPRICE] = true;
        }

        return $this;
    } // setBprice()

    /**
     * Set the value of [mbase] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setMbase($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mbase !== $v) {
            $this->mbase = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_MBASE] = true;
        }

        return $this;
    } // setMbase()

    /**
     * Set the value of [crate] column.
     *
     * @param string $v new value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object (for fluent API support)
     */
    public function setCrate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->crate !== $v) {
            $this->crate = $v;
            $this->modifiedColumns[AliTransferewalletHTableMap::COL_CRATE] = true;
        }

        return $this;
    } // setCrate()

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

            if ($this->txtcash !== '0') {
                return false;
            }

            if ($this->txtfuture !== '0') {
                return false;
            }

            if ($this->txttransfer !== '0') {
                return false;
            }

            if ($this->txtcredit1 !== '0') {
                return false;
            }

            if ($this->txtcredit2 !== '0') {
                return false;
            }

            if ($this->txtcredit3 !== '0') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AliTransferewalletHTableMap::translateFieldName('Sano', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AliTransferewalletHTableMap::translateFieldName('Sano1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sano1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AliTransferewalletHTableMap::translateFieldName('Sadate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sadate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AliTransferewalletHTableMap::translateFieldName('Sctime', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->sctime = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AliTransferewalletHTableMap::translateFieldName('InvCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AliTransferewalletHTableMap::translateFieldName('InvRef', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inv_ref = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AliTransferewalletHTableMap::translateFieldName('Mcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AliTransferewalletHTableMap::translateFieldName('NameF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_f = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AliTransferewalletHTableMap::translateFieldName('NameT', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name_t = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AliTransferewalletHTableMap::translateFieldName('Total', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AliTransferewalletHTableMap::translateFieldName('TotPv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_pv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AliTransferewalletHTableMap::translateFieldName('TotBv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_bv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AliTransferewalletHTableMap::translateFieldName('TotFv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_fv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AliTransferewalletHTableMap::translateFieldName('TotWeight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tot_weight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AliTransferewalletHTableMap::translateFieldName('Usercode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usercode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AliTransferewalletHTableMap::translateFieldName('Remark', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remark = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AliTransferewalletHTableMap::translateFieldName('Trnf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trnf = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AliTransferewalletHTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AliTransferewalletHTableMap::translateFieldName('SaType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sa_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AliTransferewalletHTableMap::translateFieldName('Uid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AliTransferewalletHTableMap::translateFieldName('Lid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AliTransferewalletHTableMap::translateFieldName('Dl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AliTransferewalletHTableMap::translateFieldName('Cancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AliTransferewalletHTableMap::translateFieldName('Send', TableMap::TYPE_PHPNAME, $indexType)];
            $this->send = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtoption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtoption = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chkcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chkfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chktransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chktransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chkcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chkcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chkcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chkinternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkinternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chkdiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkdiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AliTransferewalletHTableMap::translateFieldName('Chkother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->chkother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtcash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txttransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txttransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : AliTransferewalletHTableMap::translateFieldName('Ewallet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtcredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtcredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtcredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtcredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtinternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtinternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtdiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtdiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : AliTransferewalletHTableMap::translateFieldName('Txtother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optioncash', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncash = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optionfuture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionfuture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optiontransfer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiontransfer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optioncredit1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optioncredit2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optioncredit3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioncredit3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optioninternet', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optioninternet = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optiondiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optiondiscount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : AliTransferewalletHTableMap::translateFieldName('Optionother', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optionother = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : AliTransferewalletHTableMap::translateFieldName('Discount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : AliTransferewalletHTableMap::translateFieldName('Print', TableMap::TYPE_PHPNAME, $indexType)];
            $this->print = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : AliTransferewalletHTableMap::translateFieldName('EwalletBefore', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_before = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : AliTransferewalletHTableMap::translateFieldName('EwalletAfter', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ewallet_after = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : AliTransferewalletHTableMap::translateFieldName('Ipay', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ipay = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : AliTransferewalletHTableMap::translateFieldName('PayType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pay_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : AliTransferewalletHTableMap::translateFieldName('Hcancel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hcancel = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : AliTransferewalletHTableMap::translateFieldName('Caddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 61 + $startcol : AliTransferewalletHTableMap::translateFieldName('Cdistrictid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cdistrictid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 62 + $startcol : AliTransferewalletHTableMap::translateFieldName('Camphurid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->camphurid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 63 + $startcol : AliTransferewalletHTableMap::translateFieldName('Cprovinceid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cprovinceid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 64 + $startcol : AliTransferewalletHTableMap::translateFieldName('Czip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->czip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 65 + $startcol : AliTransferewalletHTableMap::translateFieldName('Sender', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sender = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 66 + $startcol : AliTransferewalletHTableMap::translateFieldName('SenderDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->sender_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 67 + $startcol : AliTransferewalletHTableMap::translateFieldName('Receive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->receive = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 68 + $startcol : AliTransferewalletHTableMap::translateFieldName('ReceiveDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->receive_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 69 + $startcol : AliTransferewalletHTableMap::translateFieldName('Asend', TableMap::TYPE_PHPNAME, $indexType)];
            $this->asend = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 70 + $startcol : AliTransferewalletHTableMap::translateFieldName('AtoType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ato_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 71 + $startcol : AliTransferewalletHTableMap::translateFieldName('AtoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ato_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 72 + $startcol : AliTransferewalletHTableMap::translateFieldName('Online', TableMap::TYPE_PHPNAME, $indexType)];
            $this->online = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 73 + $startcol : AliTransferewalletHTableMap::translateFieldName('Hpv', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hpv = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 74 + $startcol : AliTransferewalletHTableMap::translateFieldName('Htotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->htotal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 75 + $startcol : AliTransferewalletHTableMap::translateFieldName('Hdate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->hdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 76 + $startcol : AliTransferewalletHTableMap::translateFieldName('Scheck', TableMap::TYPE_PHPNAME, $indexType)];
            $this->scheck = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 77 + $startcol : AliTransferewalletHTableMap::translateFieldName('Checkportal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->checkportal = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 78 + $startcol : AliTransferewalletHTableMap::translateFieldName('Rcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rcode = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 79 + $startcol : AliTransferewalletHTableMap::translateFieldName('Bmcauto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bmcauto = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 80 + $startcol : AliTransferewalletHTableMap::translateFieldName('Transtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->transtype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 81 + $startcol : AliTransferewalletHTableMap::translateFieldName('Paytype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->paytype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 82 + $startcol : AliTransferewalletHTableMap::translateFieldName('Sendtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sendtype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 83 + $startcol : AliTransferewalletHTableMap::translateFieldName('Credittype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->credittype = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 84 + $startcol : AliTransferewalletHTableMap::translateFieldName('Paydate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->paydate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 85 + $startcol : AliTransferewalletHTableMap::translateFieldName('Locationbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->locationbase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 86 + $startcol : AliTransferewalletHTableMap::translateFieldName('Bprice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bprice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 87 + $startcol : AliTransferewalletHTableMap::translateFieldName('Mbase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mbase = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 88 + $startcol : AliTransferewalletHTableMap::translateFieldName('Crate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->crate = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 89; // 89 = AliTransferewalletHTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\CciOrm\\CciOrm\\AliTransferewalletH'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AliTransferewalletHTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAliTransferewalletHQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see AliTransferewalletH::setDeleted()
     * @see AliTransferewalletH::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferewalletHTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAliTransferewalletHQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AliTransferewalletHTableMap::DATABASE_NAME);
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
                AliTransferewalletHTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AliTransferewalletHTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AliTransferewalletHTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SANO)) {
            $modifiedColumns[':p' . $index++]  = 'sano';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SANO1)) {
            $modifiedColumns[':p' . $index++]  = 'sano1';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SADATE)) {
            $modifiedColumns[':p' . $index++]  = 'sadate';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SCTIME)) {
            $modifiedColumns[':p' . $index++]  = 'sctime';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_INV_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'inv_code';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_INV_REF)) {
            $modifiedColumns[':p' . $index++]  = 'inv_ref';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_MCODE)) {
            $modifiedColumns[':p' . $index++]  = 'mcode';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_NAME_F)) {
            $modifiedColumns[':p' . $index++]  = 'name_f';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_NAME_T)) {
            $modifiedColumns[':p' . $index++]  = 'name_t';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'total';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOT_PV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_pv';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOT_BV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_bv';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOT_FV)) {
            $modifiedColumns[':p' . $index++]  = 'tot_fv';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOT_WEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'tot_weight';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_USERCODE)) {
            $modifiedColumns[':p' . $index++]  = 'usercode';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_REMARK)) {
            $modifiedColumns[':p' . $index++]  = 'remark';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TRNF)) {
            $modifiedColumns[':p' . $index++]  = 'trnf';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SA_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sa_type';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_UID)) {
            $modifiedColumns[':p' . $index++]  = 'uid';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_LID)) {
            $modifiedColumns[':p' . $index++]  = 'lid';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_DL)) {
            $modifiedColumns[':p' . $index++]  = 'dl';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'cancel';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SEND)) {
            $modifiedColumns[':p' . $index++]  = 'send';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTOPTION)) {
            $modifiedColumns[':p' . $index++]  = 'txtoption';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKCASH)) {
            $modifiedColumns[':p' . $index++]  = 'chkCash';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'chkFuture';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'chkTransfer';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit1';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit2';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'chkCredit3';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'chkInternet';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'chkDiscount';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'chkOther';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTCASH)) {
            $modifiedColumns[':p' . $index++]  = 'txtCash';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'txtFuture';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'txtTransfer';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_EWALLET)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit1';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit2';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'txtCredit3';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'txtInternet';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'txtDiscount';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'txtOther';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONCASH)) {
            $modifiedColumns[':p' . $index++]  = 'optionCash';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONFUTURE)) {
            $modifiedColumns[':p' . $index++]  = 'optionFuture';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONTRANSFER)) {
            $modifiedColumns[':p' . $index++]  = 'optionTransfer';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONCREDIT1)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit1';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONCREDIT2)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit2';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONCREDIT3)) {
            $modifiedColumns[':p' . $index++]  = 'optionCredit3';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONINTERNET)) {
            $modifiedColumns[':p' . $index++]  = 'optionInternet';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONDISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'optionDiscount';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONOTHER)) {
            $modifiedColumns[':p' . $index++]  = 'optionOther';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'discount';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_PRINT)) {
            $modifiedColumns[':p' . $index++]  = 'print';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_EWALLET_BEFORE)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_before';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_EWALLET_AFTER)) {
            $modifiedColumns[':p' . $index++]  = 'ewallet_after';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_IPAY)) {
            $modifiedColumns[':p' . $index++]  = 'ipay';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_PAY_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'pay_type';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_HCANCEL)) {
            $modifiedColumns[':p' . $index++]  = 'hcancel';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'caddress';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CDISTRICTID)) {
            $modifiedColumns[':p' . $index++]  = 'cdistrictId';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CAMPHURID)) {
            $modifiedColumns[':p' . $index++]  = 'camphurId';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CPROVINCEID)) {
            $modifiedColumns[':p' . $index++]  = 'cprovinceId';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CZIP)) {
            $modifiedColumns[':p' . $index++]  = 'czip';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SENDER)) {
            $modifiedColumns[':p' . $index++]  = 'sender';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SENDER_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'sender_date';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_RECEIVE)) {
            $modifiedColumns[':p' . $index++]  = 'receive';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_RECEIVE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'receive_date';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ASEND)) {
            $modifiedColumns[':p' . $index++]  = 'asend';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ATO_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'ato_type';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ATO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ato_id';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ONLINE)) {
            $modifiedColumns[':p' . $index++]  = 'online';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_HPV)) {
            $modifiedColumns[':p' . $index++]  = 'hpv';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_HTOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'htotal';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_HDATE)) {
            $modifiedColumns[':p' . $index++]  = 'hdate';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SCHECK)) {
            $modifiedColumns[':p' . $index++]  = 'scheck';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHECKPORTAL)) {
            $modifiedColumns[':p' . $index++]  = 'checkportal';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_RCODE)) {
            $modifiedColumns[':p' . $index++]  = 'rcode';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_BMCAUTO)) {
            $modifiedColumns[':p' . $index++]  = 'bmcauto';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TRANSTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'transtype';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_PAYTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'paytype';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SENDTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'sendtype';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CREDITTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'credittype';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_PAYDATE)) {
            $modifiedColumns[':p' . $index++]  = 'paydate';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_LOCATIONBASE)) {
            $modifiedColumns[':p' . $index++]  = 'locationbase';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_BPRICE)) {
            $modifiedColumns[':p' . $index++]  = 'bprice';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_MBASE)) {
            $modifiedColumns[':p' . $index++]  = 'mbase';
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CRATE)) {
            $modifiedColumns[':p' . $index++]  = 'crate';
        }

        $sql = sprintf(
            'INSERT INTO ali_transferewallet_h (%s) VALUES (%s)',
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
                        $stmt->bindValue($identifier, $this->sano1, PDO::PARAM_INT);
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
                    case 'inv_ref':
                        $stmt->bindValue($identifier, $this->inv_ref, PDO::PARAM_STR);
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
                    case 'tot_pv':
                        $stmt->bindValue($identifier, $this->tot_pv, PDO::PARAM_STR);
                        break;
                    case 'tot_bv':
                        $stmt->bindValue($identifier, $this->tot_bv, PDO::PARAM_STR);
                        break;
                    case 'tot_fv':
                        $stmt->bindValue($identifier, $this->tot_fv, PDO::PARAM_STR);
                        break;
                    case 'tot_weight':
                        $stmt->bindValue($identifier, $this->tot_weight, PDO::PARAM_STR);
                        break;
                    case 'usercode':
                        $stmt->bindValue($identifier, $this->usercode, PDO::PARAM_STR);
                        break;
                    case 'remark':
                        $stmt->bindValue($identifier, $this->remark, PDO::PARAM_STR);
                        break;
                    case 'trnf':
                        $stmt->bindValue($identifier, $this->trnf, PDO::PARAM_INT);
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
                    case 'txtoption':
                        $stmt->bindValue($identifier, $this->txtoption, PDO::PARAM_STR);
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
                    case 'chkInternet':
                        $stmt->bindValue($identifier, $this->chkinternet, PDO::PARAM_STR);
                        break;
                    case 'chkDiscount':
                        $stmt->bindValue($identifier, $this->chkdiscount, PDO::PARAM_STR);
                        break;
                    case 'chkOther':
                        $stmt->bindValue($identifier, $this->chkother, PDO::PARAM_STR);
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
                    case 'ewallet':
                        $stmt->bindValue($identifier, $this->ewallet, PDO::PARAM_STR);
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
                    case 'txtInternet':
                        $stmt->bindValue($identifier, $this->txtinternet, PDO::PARAM_STR);
                        break;
                    case 'txtDiscount':
                        $stmt->bindValue($identifier, $this->txtdiscount, PDO::PARAM_STR);
                        break;
                    case 'txtOther':
                        $stmt->bindValue($identifier, $this->txtother, PDO::PARAM_STR);
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
                    case 'optionInternet':
                        $stmt->bindValue($identifier, $this->optioninternet, PDO::PARAM_STR);
                        break;
                    case 'optionDiscount':
                        $stmt->bindValue($identifier, $this->optiondiscount, PDO::PARAM_STR);
                        break;
                    case 'optionOther':
                        $stmt->bindValue($identifier, $this->optionother, PDO::PARAM_STR);
                        break;
                    case 'discount':
                        $stmt->bindValue($identifier, $this->discount, PDO::PARAM_STR);
                        break;
                    case 'print':
                        $stmt->bindValue($identifier, $this->print, PDO::PARAM_INT);
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
                    case 'pay_type':
                        $stmt->bindValue($identifier, $this->pay_type, PDO::PARAM_STR);
                        break;
                    case 'hcancel':
                        $stmt->bindValue($identifier, $this->hcancel, PDO::PARAM_INT);
                        break;
                    case 'caddress':
                        $stmt->bindValue($identifier, $this->caddress, PDO::PARAM_STR);
                        break;
                    case 'cdistrictId':
                        $stmt->bindValue($identifier, $this->cdistrictid, PDO::PARAM_INT);
                        break;
                    case 'camphurId':
                        $stmt->bindValue($identifier, $this->camphurid, PDO::PARAM_INT);
                        break;
                    case 'cprovinceId':
                        $stmt->bindValue($identifier, $this->cprovinceid, PDO::PARAM_INT);
                        break;
                    case 'czip':
                        $stmt->bindValue($identifier, $this->czip, PDO::PARAM_STR);
                        break;
                    case 'sender':
                        $stmt->bindValue($identifier, $this->sender, PDO::PARAM_INT);
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
                    case 'asend':
                        $stmt->bindValue($identifier, $this->asend, PDO::PARAM_INT);
                        break;
                    case 'ato_type':
                        $stmt->bindValue($identifier, $this->ato_type, PDO::PARAM_INT);
                        break;
                    case 'ato_id':
                        $stmt->bindValue($identifier, $this->ato_id, PDO::PARAM_INT);
                        break;
                    case 'online':
                        $stmt->bindValue($identifier, $this->online, PDO::PARAM_INT);
                        break;
                    case 'hpv':
                        $stmt->bindValue($identifier, $this->hpv, PDO::PARAM_STR);
                        break;
                    case 'htotal':
                        $stmt->bindValue($identifier, $this->htotal, PDO::PARAM_STR);
                        break;
                    case 'hdate':
                        $stmt->bindValue($identifier, $this->hdate ? $this->hdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'scheck':
                        $stmt->bindValue($identifier, $this->scheck, PDO::PARAM_STR);
                        break;
                    case 'checkportal':
                        $stmt->bindValue($identifier, $this->checkportal, PDO::PARAM_INT);
                        break;
                    case 'rcode':
                        $stmt->bindValue($identifier, $this->rcode, PDO::PARAM_INT);
                        break;
                    case 'bmcauto':
                        $stmt->bindValue($identifier, $this->bmcauto, PDO::PARAM_INT);
                        break;
                    case 'transtype':
                        $stmt->bindValue($identifier, $this->transtype, PDO::PARAM_INT);
                        break;
                    case 'paytype':
                        $stmt->bindValue($identifier, $this->paytype, PDO::PARAM_INT);
                        break;
                    case 'sendtype':
                        $stmt->bindValue($identifier, $this->sendtype, PDO::PARAM_INT);
                        break;
                    case 'credittype':
                        $stmt->bindValue($identifier, $this->credittype, PDO::PARAM_INT);
                        break;
                    case 'paydate':
                        $stmt->bindValue($identifier, $this->paydate ? $this->paydate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'locationbase':
                        $stmt->bindValue($identifier, $this->locationbase, PDO::PARAM_INT);
                        break;
                    case 'bprice':
                        $stmt->bindValue($identifier, $this->bprice, PDO::PARAM_STR);
                        break;
                    case 'mbase':
                        $stmt->bindValue($identifier, $this->mbase, PDO::PARAM_STR);
                        break;
                    case 'crate':
                        $stmt->bindValue($identifier, $this->crate, PDO::PARAM_STR);
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
        $pos = AliTransferewalletHTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getInvRef();
                break;
            case 6:
                return $this->getMcode();
                break;
            case 7:
                return $this->getNameF();
                break;
            case 8:
                return $this->getNameT();
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
                return $this->getTotFv();
                break;
            case 13:
                return $this->getTotWeight();
                break;
            case 14:
                return $this->getUsercode();
                break;
            case 15:
                return $this->getRemark();
                break;
            case 16:
                return $this->getTrnf();
                break;
            case 17:
                return $this->getId();
                break;
            case 18:
                return $this->getSaType();
                break;
            case 19:
                return $this->getUid();
                break;
            case 20:
                return $this->getLid();
                break;
            case 21:
                return $this->getDl();
                break;
            case 22:
                return $this->getCancel();
                break;
            case 23:
                return $this->getSend();
                break;
            case 24:
                return $this->getTxtoption();
                break;
            case 25:
                return $this->getChkcash();
                break;
            case 26:
                return $this->getChkfuture();
                break;
            case 27:
                return $this->getChktransfer();
                break;
            case 28:
                return $this->getChkcredit1();
                break;
            case 29:
                return $this->getChkcredit2();
                break;
            case 30:
                return $this->getChkcredit3();
                break;
            case 31:
                return $this->getChkinternet();
                break;
            case 32:
                return $this->getChkdiscount();
                break;
            case 33:
                return $this->getChkother();
                break;
            case 34:
                return $this->getTxtcash();
                break;
            case 35:
                return $this->getTxtfuture();
                break;
            case 36:
                return $this->getTxttransfer();
                break;
            case 37:
                return $this->getEwallet();
                break;
            case 38:
                return $this->getTxtcredit1();
                break;
            case 39:
                return $this->getTxtcredit2();
                break;
            case 40:
                return $this->getTxtcredit3();
                break;
            case 41:
                return $this->getTxtinternet();
                break;
            case 42:
                return $this->getTxtdiscount();
                break;
            case 43:
                return $this->getTxtother();
                break;
            case 44:
                return $this->getOptioncash();
                break;
            case 45:
                return $this->getOptionfuture();
                break;
            case 46:
                return $this->getOptiontransfer();
                break;
            case 47:
                return $this->getOptioncredit1();
                break;
            case 48:
                return $this->getOptioncredit2();
                break;
            case 49:
                return $this->getOptioncredit3();
                break;
            case 50:
                return $this->getOptioninternet();
                break;
            case 51:
                return $this->getOptiondiscount();
                break;
            case 52:
                return $this->getOptionother();
                break;
            case 53:
                return $this->getDiscount();
                break;
            case 54:
                return $this->getPrint();
                break;
            case 55:
                return $this->getEwalletBefore();
                break;
            case 56:
                return $this->getEwalletAfter();
                break;
            case 57:
                return $this->getIpay();
                break;
            case 58:
                return $this->getPayType();
                break;
            case 59:
                return $this->getHcancel();
                break;
            case 60:
                return $this->getCaddress();
                break;
            case 61:
                return $this->getCdistrictid();
                break;
            case 62:
                return $this->getCamphurid();
                break;
            case 63:
                return $this->getCprovinceid();
                break;
            case 64:
                return $this->getCzip();
                break;
            case 65:
                return $this->getSender();
                break;
            case 66:
                return $this->getSenderDate();
                break;
            case 67:
                return $this->getReceive();
                break;
            case 68:
                return $this->getReceiveDate();
                break;
            case 69:
                return $this->getAsend();
                break;
            case 70:
                return $this->getAtoType();
                break;
            case 71:
                return $this->getAtoId();
                break;
            case 72:
                return $this->getOnline();
                break;
            case 73:
                return $this->getHpv();
                break;
            case 74:
                return $this->getHtotal();
                break;
            case 75:
                return $this->getHdate();
                break;
            case 76:
                return $this->getScheck();
                break;
            case 77:
                return $this->getCheckportal();
                break;
            case 78:
                return $this->getRcode();
                break;
            case 79:
                return $this->getBmcauto();
                break;
            case 80:
                return $this->getTranstype();
                break;
            case 81:
                return $this->getPaytype();
                break;
            case 82:
                return $this->getSendtype();
                break;
            case 83:
                return $this->getCredittype();
                break;
            case 84:
                return $this->getPaydate();
                break;
            case 85:
                return $this->getLocationbase();
                break;
            case 86:
                return $this->getBprice();
                break;
            case 87:
                return $this->getMbase();
                break;
            case 88:
                return $this->getCrate();
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

        if (isset($alreadyDumpedObjects['AliTransferewalletH'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AliTransferewalletH'][$this->hashCode()] = true;
        $keys = AliTransferewalletHTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSano(),
            $keys[1] => $this->getSano1(),
            $keys[2] => $this->getSadate(),
            $keys[3] => $this->getSctime(),
            $keys[4] => $this->getInvCode(),
            $keys[5] => $this->getInvRef(),
            $keys[6] => $this->getMcode(),
            $keys[7] => $this->getNameF(),
            $keys[8] => $this->getNameT(),
            $keys[9] => $this->getTotal(),
            $keys[10] => $this->getTotPv(),
            $keys[11] => $this->getTotBv(),
            $keys[12] => $this->getTotFv(),
            $keys[13] => $this->getTotWeight(),
            $keys[14] => $this->getUsercode(),
            $keys[15] => $this->getRemark(),
            $keys[16] => $this->getTrnf(),
            $keys[17] => $this->getId(),
            $keys[18] => $this->getSaType(),
            $keys[19] => $this->getUid(),
            $keys[20] => $this->getLid(),
            $keys[21] => $this->getDl(),
            $keys[22] => $this->getCancel(),
            $keys[23] => $this->getSend(),
            $keys[24] => $this->getTxtoption(),
            $keys[25] => $this->getChkcash(),
            $keys[26] => $this->getChkfuture(),
            $keys[27] => $this->getChktransfer(),
            $keys[28] => $this->getChkcredit1(),
            $keys[29] => $this->getChkcredit2(),
            $keys[30] => $this->getChkcredit3(),
            $keys[31] => $this->getChkinternet(),
            $keys[32] => $this->getChkdiscount(),
            $keys[33] => $this->getChkother(),
            $keys[34] => $this->getTxtcash(),
            $keys[35] => $this->getTxtfuture(),
            $keys[36] => $this->getTxttransfer(),
            $keys[37] => $this->getEwallet(),
            $keys[38] => $this->getTxtcredit1(),
            $keys[39] => $this->getTxtcredit2(),
            $keys[40] => $this->getTxtcredit3(),
            $keys[41] => $this->getTxtinternet(),
            $keys[42] => $this->getTxtdiscount(),
            $keys[43] => $this->getTxtother(),
            $keys[44] => $this->getOptioncash(),
            $keys[45] => $this->getOptionfuture(),
            $keys[46] => $this->getOptiontransfer(),
            $keys[47] => $this->getOptioncredit1(),
            $keys[48] => $this->getOptioncredit2(),
            $keys[49] => $this->getOptioncredit3(),
            $keys[50] => $this->getOptioninternet(),
            $keys[51] => $this->getOptiondiscount(),
            $keys[52] => $this->getOptionother(),
            $keys[53] => $this->getDiscount(),
            $keys[54] => $this->getPrint(),
            $keys[55] => $this->getEwalletBefore(),
            $keys[56] => $this->getEwalletAfter(),
            $keys[57] => $this->getIpay(),
            $keys[58] => $this->getPayType(),
            $keys[59] => $this->getHcancel(),
            $keys[60] => $this->getCaddress(),
            $keys[61] => $this->getCdistrictid(),
            $keys[62] => $this->getCamphurid(),
            $keys[63] => $this->getCprovinceid(),
            $keys[64] => $this->getCzip(),
            $keys[65] => $this->getSender(),
            $keys[66] => $this->getSenderDate(),
            $keys[67] => $this->getReceive(),
            $keys[68] => $this->getReceiveDate(),
            $keys[69] => $this->getAsend(),
            $keys[70] => $this->getAtoType(),
            $keys[71] => $this->getAtoId(),
            $keys[72] => $this->getOnline(),
            $keys[73] => $this->getHpv(),
            $keys[74] => $this->getHtotal(),
            $keys[75] => $this->getHdate(),
            $keys[76] => $this->getScheck(),
            $keys[77] => $this->getCheckportal(),
            $keys[78] => $this->getRcode(),
            $keys[79] => $this->getBmcauto(),
            $keys[80] => $this->getTranstype(),
            $keys[81] => $this->getPaytype(),
            $keys[82] => $this->getSendtype(),
            $keys[83] => $this->getCredittype(),
            $keys[84] => $this->getPaydate(),
            $keys[85] => $this->getLocationbase(),
            $keys[86] => $this->getBprice(),
            $keys[87] => $this->getMbase(),
            $keys[88] => $this->getCrate(),
        );
        if ($result[$keys[2]] instanceof \DateTimeInterface) {
            $result[$keys[2]] = $result[$keys[2]]->format('c');
        }

        if ($result[$keys[3]] instanceof \DateTimeInterface) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[66]] instanceof \DateTimeInterface) {
            $result[$keys[66]] = $result[$keys[66]]->format('c');
        }

        if ($result[$keys[68]] instanceof \DateTimeInterface) {
            $result[$keys[68]] = $result[$keys[68]]->format('c');
        }

        if ($result[$keys[75]] instanceof \DateTimeInterface) {
            $result[$keys[75]] = $result[$keys[75]]->format('c');
        }

        if ($result[$keys[84]] instanceof \DateTimeInterface) {
            $result[$keys[84]] = $result[$keys[84]]->format('c');
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
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AliTransferewalletHTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH
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
                $this->setInvRef($value);
                break;
            case 6:
                $this->setMcode($value);
                break;
            case 7:
                $this->setNameF($value);
                break;
            case 8:
                $this->setNameT($value);
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
                $this->setTotFv($value);
                break;
            case 13:
                $this->setTotWeight($value);
                break;
            case 14:
                $this->setUsercode($value);
                break;
            case 15:
                $this->setRemark($value);
                break;
            case 16:
                $this->setTrnf($value);
                break;
            case 17:
                $this->setId($value);
                break;
            case 18:
                $this->setSaType($value);
                break;
            case 19:
                $this->setUid($value);
                break;
            case 20:
                $this->setLid($value);
                break;
            case 21:
                $this->setDl($value);
                break;
            case 22:
                $this->setCancel($value);
                break;
            case 23:
                $this->setSend($value);
                break;
            case 24:
                $this->setTxtoption($value);
                break;
            case 25:
                $this->setChkcash($value);
                break;
            case 26:
                $this->setChkfuture($value);
                break;
            case 27:
                $this->setChktransfer($value);
                break;
            case 28:
                $this->setChkcredit1($value);
                break;
            case 29:
                $this->setChkcredit2($value);
                break;
            case 30:
                $this->setChkcredit3($value);
                break;
            case 31:
                $this->setChkinternet($value);
                break;
            case 32:
                $this->setChkdiscount($value);
                break;
            case 33:
                $this->setChkother($value);
                break;
            case 34:
                $this->setTxtcash($value);
                break;
            case 35:
                $this->setTxtfuture($value);
                break;
            case 36:
                $this->setTxttransfer($value);
                break;
            case 37:
                $this->setEwallet($value);
                break;
            case 38:
                $this->setTxtcredit1($value);
                break;
            case 39:
                $this->setTxtcredit2($value);
                break;
            case 40:
                $this->setTxtcredit3($value);
                break;
            case 41:
                $this->setTxtinternet($value);
                break;
            case 42:
                $this->setTxtdiscount($value);
                break;
            case 43:
                $this->setTxtother($value);
                break;
            case 44:
                $this->setOptioncash($value);
                break;
            case 45:
                $this->setOptionfuture($value);
                break;
            case 46:
                $this->setOptiontransfer($value);
                break;
            case 47:
                $this->setOptioncredit1($value);
                break;
            case 48:
                $this->setOptioncredit2($value);
                break;
            case 49:
                $this->setOptioncredit3($value);
                break;
            case 50:
                $this->setOptioninternet($value);
                break;
            case 51:
                $this->setOptiondiscount($value);
                break;
            case 52:
                $this->setOptionother($value);
                break;
            case 53:
                $this->setDiscount($value);
                break;
            case 54:
                $this->setPrint($value);
                break;
            case 55:
                $this->setEwalletBefore($value);
                break;
            case 56:
                $this->setEwalletAfter($value);
                break;
            case 57:
                $this->setIpay($value);
                break;
            case 58:
                $this->setPayType($value);
                break;
            case 59:
                $this->setHcancel($value);
                break;
            case 60:
                $this->setCaddress($value);
                break;
            case 61:
                $this->setCdistrictid($value);
                break;
            case 62:
                $this->setCamphurid($value);
                break;
            case 63:
                $this->setCprovinceid($value);
                break;
            case 64:
                $this->setCzip($value);
                break;
            case 65:
                $this->setSender($value);
                break;
            case 66:
                $this->setSenderDate($value);
                break;
            case 67:
                $this->setReceive($value);
                break;
            case 68:
                $this->setReceiveDate($value);
                break;
            case 69:
                $this->setAsend($value);
                break;
            case 70:
                $this->setAtoType($value);
                break;
            case 71:
                $this->setAtoId($value);
                break;
            case 72:
                $this->setOnline($value);
                break;
            case 73:
                $this->setHpv($value);
                break;
            case 74:
                $this->setHtotal($value);
                break;
            case 75:
                $this->setHdate($value);
                break;
            case 76:
                $this->setScheck($value);
                break;
            case 77:
                $this->setCheckportal($value);
                break;
            case 78:
                $this->setRcode($value);
                break;
            case 79:
                $this->setBmcauto($value);
                break;
            case 80:
                $this->setTranstype($value);
                break;
            case 81:
                $this->setPaytype($value);
                break;
            case 82:
                $this->setSendtype($value);
                break;
            case 83:
                $this->setCredittype($value);
                break;
            case 84:
                $this->setPaydate($value);
                break;
            case 85:
                $this->setLocationbase($value);
                break;
            case 86:
                $this->setBprice($value);
                break;
            case 87:
                $this->setMbase($value);
                break;
            case 88:
                $this->setCrate($value);
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
        $keys = AliTransferewalletHTableMap::getFieldNames($keyType);

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
            $this->setInvRef($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setMcode($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setNameF($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setNameT($arr[$keys[8]]);
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
            $this->setTotFv($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTotWeight($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setUsercode($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setRemark($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTrnf($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setId($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setSaType($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setUid($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setLid($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setDl($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setCancel($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setSend($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setTxtoption($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setChkcash($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setChkfuture($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setChktransfer($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setChkcredit1($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setChkcredit2($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setChkcredit3($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setChkinternet($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setChkdiscount($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setChkother($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setTxtcash($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setTxtfuture($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setTxttransfer($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setEwallet($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setTxtcredit1($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setTxtcredit2($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setTxtcredit3($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setTxtinternet($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setTxtdiscount($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setTxtother($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setOptioncash($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setOptionfuture($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setOptiontransfer($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setOptioncredit1($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setOptioncredit2($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setOptioncredit3($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setOptioninternet($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setOptiondiscount($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setOptionother($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setDiscount($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setPrint($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setEwalletBefore($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setEwalletAfter($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setIpay($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setPayType($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setHcancel($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setCaddress($arr[$keys[60]]);
        }
        if (array_key_exists($keys[61], $arr)) {
            $this->setCdistrictid($arr[$keys[61]]);
        }
        if (array_key_exists($keys[62], $arr)) {
            $this->setCamphurid($arr[$keys[62]]);
        }
        if (array_key_exists($keys[63], $arr)) {
            $this->setCprovinceid($arr[$keys[63]]);
        }
        if (array_key_exists($keys[64], $arr)) {
            $this->setCzip($arr[$keys[64]]);
        }
        if (array_key_exists($keys[65], $arr)) {
            $this->setSender($arr[$keys[65]]);
        }
        if (array_key_exists($keys[66], $arr)) {
            $this->setSenderDate($arr[$keys[66]]);
        }
        if (array_key_exists($keys[67], $arr)) {
            $this->setReceive($arr[$keys[67]]);
        }
        if (array_key_exists($keys[68], $arr)) {
            $this->setReceiveDate($arr[$keys[68]]);
        }
        if (array_key_exists($keys[69], $arr)) {
            $this->setAsend($arr[$keys[69]]);
        }
        if (array_key_exists($keys[70], $arr)) {
            $this->setAtoType($arr[$keys[70]]);
        }
        if (array_key_exists($keys[71], $arr)) {
            $this->setAtoId($arr[$keys[71]]);
        }
        if (array_key_exists($keys[72], $arr)) {
            $this->setOnline($arr[$keys[72]]);
        }
        if (array_key_exists($keys[73], $arr)) {
            $this->setHpv($arr[$keys[73]]);
        }
        if (array_key_exists($keys[74], $arr)) {
            $this->setHtotal($arr[$keys[74]]);
        }
        if (array_key_exists($keys[75], $arr)) {
            $this->setHdate($arr[$keys[75]]);
        }
        if (array_key_exists($keys[76], $arr)) {
            $this->setScheck($arr[$keys[76]]);
        }
        if (array_key_exists($keys[77], $arr)) {
            $this->setCheckportal($arr[$keys[77]]);
        }
        if (array_key_exists($keys[78], $arr)) {
            $this->setRcode($arr[$keys[78]]);
        }
        if (array_key_exists($keys[79], $arr)) {
            $this->setBmcauto($arr[$keys[79]]);
        }
        if (array_key_exists($keys[80], $arr)) {
            $this->setTranstype($arr[$keys[80]]);
        }
        if (array_key_exists($keys[81], $arr)) {
            $this->setPaytype($arr[$keys[81]]);
        }
        if (array_key_exists($keys[82], $arr)) {
            $this->setSendtype($arr[$keys[82]]);
        }
        if (array_key_exists($keys[83], $arr)) {
            $this->setCredittype($arr[$keys[83]]);
        }
        if (array_key_exists($keys[84], $arr)) {
            $this->setPaydate($arr[$keys[84]]);
        }
        if (array_key_exists($keys[85], $arr)) {
            $this->setLocationbase($arr[$keys[85]]);
        }
        if (array_key_exists($keys[86], $arr)) {
            $this->setBprice($arr[$keys[86]]);
        }
        if (array_key_exists($keys[87], $arr)) {
            $this->setMbase($arr[$keys[87]]);
        }
        if (array_key_exists($keys[88], $arr)) {
            $this->setCrate($arr[$keys[88]]);
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
     * @return $this|\CciOrm\CciOrm\AliTransferewalletH The current object, for fluid interface
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
        $criteria = new Criteria(AliTransferewalletHTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SANO)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SANO, $this->sano);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SANO1)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SANO1, $this->sano1);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SADATE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SADATE, $this->sadate);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SCTIME)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SCTIME, $this->sctime);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_INV_CODE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_INV_CODE, $this->inv_code);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_INV_REF)) {
            $criteria->add(AliTransferewalletHTableMap::COL_INV_REF, $this->inv_ref);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_MCODE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_MCODE, $this->mcode);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_NAME_F)) {
            $criteria->add(AliTransferewalletHTableMap::COL_NAME_F, $this->name_f);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_NAME_T)) {
            $criteria->add(AliTransferewalletHTableMap::COL_NAME_T, $this->name_t);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOTAL)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TOTAL, $this->total);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOT_PV)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TOT_PV, $this->tot_pv);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOT_BV)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TOT_BV, $this->tot_bv);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOT_FV)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TOT_FV, $this->tot_fv);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TOT_WEIGHT)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TOT_WEIGHT, $this->tot_weight);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_USERCODE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_USERCODE, $this->usercode);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_REMARK)) {
            $criteria->add(AliTransferewalletHTableMap::COL_REMARK, $this->remark);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TRNF)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TRNF, $this->trnf);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ID)) {
            $criteria->add(AliTransferewalletHTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SA_TYPE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SA_TYPE, $this->sa_type);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_UID)) {
            $criteria->add(AliTransferewalletHTableMap::COL_UID, $this->uid);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_LID)) {
            $criteria->add(AliTransferewalletHTableMap::COL_LID, $this->lid);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_DL)) {
            $criteria->add(AliTransferewalletHTableMap::COL_DL, $this->dl);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CANCEL)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CANCEL, $this->cancel);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SEND)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SEND, $this->send);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTOPTION)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTOPTION, $this->txtoption);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKCASH)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKCASH, $this->chkcash);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKFUTURE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKFUTURE, $this->chkfuture);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKTRANSFER)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKTRANSFER, $this->chktransfer);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKCREDIT1)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKCREDIT1, $this->chkcredit1);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKCREDIT2)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKCREDIT2, $this->chkcredit2);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKCREDIT3)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKCREDIT3, $this->chkcredit3);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKINTERNET)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKINTERNET, $this->chkinternet);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKDISCOUNT)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKDISCOUNT, $this->chkdiscount);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHKOTHER)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHKOTHER, $this->chkother);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTCASH)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTCASH, $this->txtcash);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTFUTURE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTFUTURE, $this->txtfuture);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTTRANSFER)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTTRANSFER, $this->txttransfer);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_EWALLET)) {
            $criteria->add(AliTransferewalletHTableMap::COL_EWALLET, $this->ewallet);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTCREDIT1)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTCREDIT1, $this->txtcredit1);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTCREDIT2)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTCREDIT2, $this->txtcredit2);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTCREDIT3)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTCREDIT3, $this->txtcredit3);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTINTERNET)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTINTERNET, $this->txtinternet);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTDISCOUNT)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTDISCOUNT, $this->txtdiscount);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TXTOTHER)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TXTOTHER, $this->txtother);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONCASH)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONCASH, $this->optioncash);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONFUTURE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONFUTURE, $this->optionfuture);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONTRANSFER)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONTRANSFER, $this->optiontransfer);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONCREDIT1)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONCREDIT1, $this->optioncredit1);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONCREDIT2)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONCREDIT2, $this->optioncredit2);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONCREDIT3)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONCREDIT3, $this->optioncredit3);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONINTERNET)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONINTERNET, $this->optioninternet);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONDISCOUNT)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONDISCOUNT, $this->optiondiscount);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_OPTIONOTHER)) {
            $criteria->add(AliTransferewalletHTableMap::COL_OPTIONOTHER, $this->optionother);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_DISCOUNT)) {
            $criteria->add(AliTransferewalletHTableMap::COL_DISCOUNT, $this->discount);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_PRINT)) {
            $criteria->add(AliTransferewalletHTableMap::COL_PRINT, $this->print);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_EWALLET_BEFORE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_EWALLET_BEFORE, $this->ewallet_before);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_EWALLET_AFTER)) {
            $criteria->add(AliTransferewalletHTableMap::COL_EWALLET_AFTER, $this->ewallet_after);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_IPAY)) {
            $criteria->add(AliTransferewalletHTableMap::COL_IPAY, $this->ipay);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_PAY_TYPE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_PAY_TYPE, $this->pay_type);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_HCANCEL)) {
            $criteria->add(AliTransferewalletHTableMap::COL_HCANCEL, $this->hcancel);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CADDRESS)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CADDRESS, $this->caddress);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CDISTRICTID)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CDISTRICTID, $this->cdistrictid);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CAMPHURID)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CAMPHURID, $this->camphurid);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CPROVINCEID)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CPROVINCEID, $this->cprovinceid);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CZIP)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CZIP, $this->czip);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SENDER)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SENDER, $this->sender);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SENDER_DATE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SENDER_DATE, $this->sender_date);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_RECEIVE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_RECEIVE, $this->receive);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_RECEIVE_DATE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_RECEIVE_DATE, $this->receive_date);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ASEND)) {
            $criteria->add(AliTransferewalletHTableMap::COL_ASEND, $this->asend);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ATO_TYPE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_ATO_TYPE, $this->ato_type);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ATO_ID)) {
            $criteria->add(AliTransferewalletHTableMap::COL_ATO_ID, $this->ato_id);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_ONLINE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_ONLINE, $this->online);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_HPV)) {
            $criteria->add(AliTransferewalletHTableMap::COL_HPV, $this->hpv);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_HTOTAL)) {
            $criteria->add(AliTransferewalletHTableMap::COL_HTOTAL, $this->htotal);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_HDATE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_HDATE, $this->hdate);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SCHECK)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SCHECK, $this->scheck);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CHECKPORTAL)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CHECKPORTAL, $this->checkportal);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_RCODE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_RCODE, $this->rcode);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_BMCAUTO)) {
            $criteria->add(AliTransferewalletHTableMap::COL_BMCAUTO, $this->bmcauto);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_TRANSTYPE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_TRANSTYPE, $this->transtype);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_PAYTYPE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_PAYTYPE, $this->paytype);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_SENDTYPE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_SENDTYPE, $this->sendtype);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CREDITTYPE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CREDITTYPE, $this->credittype);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_PAYDATE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_PAYDATE, $this->paydate);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_LOCATIONBASE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_LOCATIONBASE, $this->locationbase);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_BPRICE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_BPRICE, $this->bprice);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_MBASE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_MBASE, $this->mbase);
        }
        if ($this->isColumnModified(AliTransferewalletHTableMap::COL_CRATE)) {
            $criteria->add(AliTransferewalletHTableMap::COL_CRATE, $this->crate);
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
        $criteria = ChildAliTransferewalletHQuery::create();
        $criteria->add(AliTransferewalletHTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \CciOrm\CciOrm\AliTransferewalletH (or compatible) type.
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
        $copyObj->setInvRef($this->getInvRef());
        $copyObj->setMcode($this->getMcode());
        $copyObj->setNameF($this->getNameF());
        $copyObj->setNameT($this->getNameT());
        $copyObj->setTotal($this->getTotal());
        $copyObj->setTotPv($this->getTotPv());
        $copyObj->setTotBv($this->getTotBv());
        $copyObj->setTotFv($this->getTotFv());
        $copyObj->setTotWeight($this->getTotWeight());
        $copyObj->setUsercode($this->getUsercode());
        $copyObj->setRemark($this->getRemark());
        $copyObj->setTrnf($this->getTrnf());
        $copyObj->setSaType($this->getSaType());
        $copyObj->setUid($this->getUid());
        $copyObj->setLid($this->getLid());
        $copyObj->setDl($this->getDl());
        $copyObj->setCancel($this->getCancel());
        $copyObj->setSend($this->getSend());
        $copyObj->setTxtoption($this->getTxtoption());
        $copyObj->setChkcash($this->getChkcash());
        $copyObj->setChkfuture($this->getChkfuture());
        $copyObj->setChktransfer($this->getChktransfer());
        $copyObj->setChkcredit1($this->getChkcredit1());
        $copyObj->setChkcredit2($this->getChkcredit2());
        $copyObj->setChkcredit3($this->getChkcredit3());
        $copyObj->setChkinternet($this->getChkinternet());
        $copyObj->setChkdiscount($this->getChkdiscount());
        $copyObj->setChkother($this->getChkother());
        $copyObj->setTxtcash($this->getTxtcash());
        $copyObj->setTxtfuture($this->getTxtfuture());
        $copyObj->setTxttransfer($this->getTxttransfer());
        $copyObj->setEwallet($this->getEwallet());
        $copyObj->setTxtcredit1($this->getTxtcredit1());
        $copyObj->setTxtcredit2($this->getTxtcredit2());
        $copyObj->setTxtcredit3($this->getTxtcredit3());
        $copyObj->setTxtinternet($this->getTxtinternet());
        $copyObj->setTxtdiscount($this->getTxtdiscount());
        $copyObj->setTxtother($this->getTxtother());
        $copyObj->setOptioncash($this->getOptioncash());
        $copyObj->setOptionfuture($this->getOptionfuture());
        $copyObj->setOptiontransfer($this->getOptiontransfer());
        $copyObj->setOptioncredit1($this->getOptioncredit1());
        $copyObj->setOptioncredit2($this->getOptioncredit2());
        $copyObj->setOptioncredit3($this->getOptioncredit3());
        $copyObj->setOptioninternet($this->getOptioninternet());
        $copyObj->setOptiondiscount($this->getOptiondiscount());
        $copyObj->setOptionother($this->getOptionother());
        $copyObj->setDiscount($this->getDiscount());
        $copyObj->setPrint($this->getPrint());
        $copyObj->setEwalletBefore($this->getEwalletBefore());
        $copyObj->setEwalletAfter($this->getEwalletAfter());
        $copyObj->setIpay($this->getIpay());
        $copyObj->setPayType($this->getPayType());
        $copyObj->setHcancel($this->getHcancel());
        $copyObj->setCaddress($this->getCaddress());
        $copyObj->setCdistrictid($this->getCdistrictid());
        $copyObj->setCamphurid($this->getCamphurid());
        $copyObj->setCprovinceid($this->getCprovinceid());
        $copyObj->setCzip($this->getCzip());
        $copyObj->setSender($this->getSender());
        $copyObj->setSenderDate($this->getSenderDate());
        $copyObj->setReceive($this->getReceive());
        $copyObj->setReceiveDate($this->getReceiveDate());
        $copyObj->setAsend($this->getAsend());
        $copyObj->setAtoType($this->getAtoType());
        $copyObj->setAtoId($this->getAtoId());
        $copyObj->setOnline($this->getOnline());
        $copyObj->setHpv($this->getHpv());
        $copyObj->setHtotal($this->getHtotal());
        $copyObj->setHdate($this->getHdate());
        $copyObj->setScheck($this->getScheck());
        $copyObj->setCheckportal($this->getCheckportal());
        $copyObj->setRcode($this->getRcode());
        $copyObj->setBmcauto($this->getBmcauto());
        $copyObj->setTranstype($this->getTranstype());
        $copyObj->setPaytype($this->getPaytype());
        $copyObj->setSendtype($this->getSendtype());
        $copyObj->setCredittype($this->getCredittype());
        $copyObj->setPaydate($this->getPaydate());
        $copyObj->setLocationbase($this->getLocationbase());
        $copyObj->setBprice($this->getBprice());
        $copyObj->setMbase($this->getMbase());
        $copyObj->setCrate($this->getCrate());
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
     * @return \CciOrm\CciOrm\AliTransferewalletH Clone of current object.
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
        $this->inv_ref = null;
        $this->mcode = null;
        $this->name_f = null;
        $this->name_t = null;
        $this->total = null;
        $this->tot_pv = null;
        $this->tot_bv = null;
        $this->tot_fv = null;
        $this->tot_weight = null;
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
        $this->txtoption = null;
        $this->chkcash = null;
        $this->chkfuture = null;
        $this->chktransfer = null;
        $this->chkcredit1 = null;
        $this->chkcredit2 = null;
        $this->chkcredit3 = null;
        $this->chkinternet = null;
        $this->chkdiscount = null;
        $this->chkother = null;
        $this->txtcash = null;
        $this->txtfuture = null;
        $this->txttransfer = null;
        $this->ewallet = null;
        $this->txtcredit1 = null;
        $this->txtcredit2 = null;
        $this->txtcredit3 = null;
        $this->txtinternet = null;
        $this->txtdiscount = null;
        $this->txtother = null;
        $this->optioncash = null;
        $this->optionfuture = null;
        $this->optiontransfer = null;
        $this->optioncredit1 = null;
        $this->optioncredit2 = null;
        $this->optioncredit3 = null;
        $this->optioninternet = null;
        $this->optiondiscount = null;
        $this->optionother = null;
        $this->discount = null;
        $this->print = null;
        $this->ewallet_before = null;
        $this->ewallet_after = null;
        $this->ipay = null;
        $this->pay_type = null;
        $this->hcancel = null;
        $this->caddress = null;
        $this->cdistrictid = null;
        $this->camphurid = null;
        $this->cprovinceid = null;
        $this->czip = null;
        $this->sender = null;
        $this->sender_date = null;
        $this->receive = null;
        $this->receive_date = null;
        $this->asend = null;
        $this->ato_type = null;
        $this->ato_id = null;
        $this->online = null;
        $this->hpv = null;
        $this->htotal = null;
        $this->hdate = null;
        $this->scheck = null;
        $this->checkportal = null;
        $this->rcode = null;
        $this->bmcauto = null;
        $this->transtype = null;
        $this->paytype = null;
        $this->sendtype = null;
        $this->credittype = null;
        $this->paydate = null;
        $this->locationbase = null;
        $this->bprice = null;
        $this->mbase = null;
        $this->crate = null;
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
        return (string) $this->exportTo(AliTransferewalletHTableMap::DEFAULT_STRING_FORMAT);
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
