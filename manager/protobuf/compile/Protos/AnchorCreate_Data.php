<?php
/**
 * Auto generated from response.proto at 2018-09-14 09:53:41
 *
 * protos package
 */

namespace Protos {
/**
 * AnchorCreate_Data message
 */
class AnchorCreate_Data extends \ProtobufMessage
{
    /* Field index constants */
    const ROOMID_ = 1;
    const IP_ = 2;
    const PORT_ = 3;
    const M1_ = 4;
    const LIVEMSG_ = 5;
    const MONEYTOTAL_ = 6;
    const PEOPLES_ = 7;
    const MULTILIVE_ = 8;
    const MULTILIVING_ = 9;
    const MULTILIMIT_ = 10;
    const FREEVIPLEVEL_ = 11;
    const MULTILIVEMSG_ = 12;
    const ALLOWPRIVATELIVEFLAG_ = 13;
    const ALLOWPAYFLAG_ = 14;
    const ALLOWAUDIENCELIMITFLAG_ = 15;
    const AUDIENCELIMITLIST_ = 16;
    const FEELIST_ = 17;
    const PRIVATELIVEMSG_ = 18;
    const ALLOWVOICEFLAG_ = 19;
    const AWAKENLIVETYPE_ = 20;
    const KEEPTIME_ = 21;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ROOMID_ => array(
            'name' => 'roomId_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::IP_ => array(
            'name' => 'ip_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::PORT_ => array(
            'name' => 'port_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::M1_ => array(
            'name' => 'm1_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::LIVEMSG_ => array(
            'name' => 'liveMsg_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::MONEYTOTAL_ => array(
            'name' => 'moneyTotal_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::PEOPLES_ => array(
            'name' => 'peoples_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::MULTILIVE_ => array(
            'name' => 'multiLive_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::MULTILIVING_ => array(
            'name' => 'multiLiving_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::MULTILIMIT_ => array(
            'name' => 'multiLimit_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::FREEVIPLEVEL_ => array(
            'name' => 'freeVipLevel_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::MULTILIVEMSG_ => array(
            'name' => 'multiLiveMsg_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::ALLOWPRIVATELIVEFLAG_ => array(
            'name' => 'allowPrivateLiveFlag_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_BOOL,
        ),
        self::ALLOWPAYFLAG_ => array(
            'name' => 'allowPayFlag_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_BOOL,
        ),
        self::ALLOWAUDIENCELIMITFLAG_ => array(
            'name' => 'allowAudienceLimitFlag_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_BOOL,
        ),
        self::AUDIENCELIMITLIST_ => array(
            'name' => 'audienceLimitList_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::FEELIST_ => array(
            'name' => 'feeList_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::PRIVATELIVEMSG_ => array(
            'name' => 'privateLiveMsg_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::ALLOWVOICEFLAG_ => array(
            'name' => 'allowVoiceFlag_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_BOOL,
        ),
        self::AWAKENLIVETYPE_ => array(
            'name' => 'awakenLiveType_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::KEEPTIME_ => array(
            'name' => 'keepTime_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::ROOMID_] = null;
        $this->values[self::IP_] = null;
        $this->values[self::PORT_] = null;
        $this->values[self::M1_] = null;
        $this->values[self::LIVEMSG_] = null;
        $this->values[self::MONEYTOTAL_] = null;
        $this->values[self::PEOPLES_] = null;
        $this->values[self::MULTILIVE_] = null;
        $this->values[self::MULTILIVING_] = null;
        $this->values[self::MULTILIMIT_] = null;
        $this->values[self::FREEVIPLEVEL_] = null;
        $this->values[self::MULTILIVEMSG_] = null;
        $this->values[self::ALLOWPRIVATELIVEFLAG_] = null;
        $this->values[self::ALLOWPAYFLAG_] = null;
        $this->values[self::ALLOWAUDIENCELIMITFLAG_] = null;
        $this->values[self::AUDIENCELIMITLIST_] = null;
        $this->values[self::FEELIST_] = null;
        $this->values[self::PRIVATELIVEMSG_] = null;
        $this->values[self::ALLOWVOICEFLAG_] = null;
        $this->values[self::AWAKENLIVETYPE_] = null;
        $this->values[self::KEEPTIME_] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'roomId_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setRoomId($value)
    {
        return $this->set(self::ROOMID_, $value);
    }

    /**
     * Returns value of 'roomId_' property
     *
     * @return integer
     */
    public function getRoomId()
    {
        $value = $this->get(self::ROOMID_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'ip_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setIp($value)
    {
        return $this->set(self::IP_, $value);
    }

    /**
     * Returns value of 'ip_' property
     *
     * @return string
     */
    public function getIp()
    {
        $value = $this->get(self::IP_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'port_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setPort($value)
    {
        return $this->set(self::PORT_, $value);
    }

    /**
     * Returns value of 'port_' property
     *
     * @return integer
     */
    public function getPort()
    {
        $value = $this->get(self::PORT_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'm1_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setM1($value)
    {
        return $this->set(self::M1_, $value);
    }

    /**
     * Returns value of 'm1_' property
     *
     * @return string
     */
    public function getM1()
    {
        $value = $this->get(self::M1_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'liveMsg_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setLiveMsg($value)
    {
        return $this->set(self::LIVEMSG_, $value);
    }

    /**
     * Returns value of 'liveMsg_' property
     *
     * @return string
     */
    public function getLiveMsg()
    {
        $value = $this->get(self::LIVEMSG_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'moneyTotal_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setMoneyTotal($value)
    {
        return $this->set(self::MONEYTOTAL_, $value);
    }

    /**
     * Returns value of 'moneyTotal_' property
     *
     * @return integer
     */
    public function getMoneyTotal()
    {
        $value = $this->get(self::MONEYTOTAL_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'peoples_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setPeoples($value)
    {
        return $this->set(self::PEOPLES_, $value);
    }

    /**
     * Returns value of 'peoples_' property
     *
     * @return integer
     */
    public function getPeoples()
    {
        $value = $this->get(self::PEOPLES_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'multiLive_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setMultiLive($value)
    {
        return $this->set(self::MULTILIVE_, $value);
    }

    /**
     * Returns value of 'multiLive_' property
     *
     * @return integer
     */
    public function getMultiLive()
    {
        $value = $this->get(self::MULTILIVE_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'multiLiving_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setMultiLiving($value)
    {
        return $this->set(self::MULTILIVING_, $value);
    }

    /**
     * Returns value of 'multiLiving_' property
     *
     * @return integer
     */
    public function getMultiLiving()
    {
        $value = $this->get(self::MULTILIVING_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'multiLimit_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setMultiLimit($value)
    {
        return $this->set(self::MULTILIMIT_, $value);
    }

    /**
     * Returns value of 'multiLimit_' property
     *
     * @return integer
     */
    public function getMultiLimit()
    {
        $value = $this->get(self::MULTILIMIT_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'freeVipLevel_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setFreeVipLevel($value)
    {
        return $this->set(self::FREEVIPLEVEL_, $value);
    }

    /**
     * Returns value of 'freeVipLevel_' property
     *
     * @return integer
     */
    public function getFreeVipLevel()
    {
        $value = $this->get(self::FREEVIPLEVEL_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'multiLiveMsg_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMultiLiveMsg($value)
    {
        return $this->set(self::MULTILIVEMSG_, $value);
    }

    /**
     * Returns value of 'multiLiveMsg_' property
     *
     * @return string
     */
    public function getMultiLiveMsg()
    {
        $value = $this->get(self::MULTILIVEMSG_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'allowPrivateLiveFlag_' property
     *
     * @param boolean $value Property value
     *
     * @return null
     */
    public function setAllowPrivateLiveFlag($value)
    {
        return $this->set(self::ALLOWPRIVATELIVEFLAG_, $value);
    }

    /**
     * Returns value of 'allowPrivateLiveFlag_' property
     *
     * @return boolean
     */
    public function getAllowPrivateLiveFlag()
    {
        $value = $this->get(self::ALLOWPRIVATELIVEFLAG_);
        return $value === null ? (boolean)$value : $value;
    }

    /**
     * Sets value of 'allowPayFlag_' property
     *
     * @param boolean $value Property value
     *
     * @return null
     */
    public function setAllowPayFlag($value)
    {
        return $this->set(self::ALLOWPAYFLAG_, $value);
    }

    /**
     * Returns value of 'allowPayFlag_' property
     *
     * @return boolean
     */
    public function getAllowPayFlag()
    {
        $value = $this->get(self::ALLOWPAYFLAG_);
        return $value === null ? (boolean)$value : $value;
    }

    /**
     * Sets value of 'allowAudienceLimitFlag_' property
     *
     * @param boolean $value Property value
     *
     * @return null
     */
    public function setAllowAudienceLimitFlag($value)
    {
        return $this->set(self::ALLOWAUDIENCELIMITFLAG_, $value);
    }

    /**
     * Returns value of 'allowAudienceLimitFlag_' property
     *
     * @return boolean
     */
    public function getAllowAudienceLimitFlag()
    {
        $value = $this->get(self::ALLOWAUDIENCELIMITFLAG_);
        return $value === null ? (boolean)$value : $value;
    }

    /**
     * Sets value of 'audienceLimitList_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAudienceLimitList($value)
    {
        return $this->set(self::AUDIENCELIMITLIST_, $value);
    }

    /**
     * Returns value of 'audienceLimitList_' property
     *
     * @return string
     */
    public function getAudienceLimitList()
    {
        $value = $this->get(self::AUDIENCELIMITLIST_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'feeList_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFeeList($value)
    {
        return $this->set(self::FEELIST_, $value);
    }

    /**
     * Returns value of 'feeList_' property
     *
     * @return string
     */
    public function getFeeList()
    {
        $value = $this->get(self::FEELIST_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'privateLiveMsg_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setPrivateLiveMsg($value)
    {
        return $this->set(self::PRIVATELIVEMSG_, $value);
    }

    /**
     * Returns value of 'privateLiveMsg_' property
     *
     * @return string
     */
    public function getPrivateLiveMsg()
    {
        $value = $this->get(self::PRIVATELIVEMSG_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'allowVoiceFlag_' property
     *
     * @param boolean $value Property value
     *
     * @return null
     */
    public function setAllowVoiceFlag($value)
    {
        return $this->set(self::ALLOWVOICEFLAG_, $value);
    }

    /**
     * Returns value of 'allowVoiceFlag_' property
     *
     * @return boolean
     */
    public function getAllowVoiceFlag()
    {
        $value = $this->get(self::ALLOWVOICEFLAG_);
        return $value === null ? (boolean)$value : $value;
    }

    /**
     * Sets value of 'awakenLiveType_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setAwakenLiveType($value)
    {
        return $this->set(self::AWAKENLIVETYPE_, $value);
    }

    /**
     * Returns value of 'awakenLiveType_' property
     *
     * @return integer
     */
    public function getAwakenLiveType()
    {
        $value = $this->get(self::AWAKENLIVETYPE_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'keepTime_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setKeepTime($value)
    {
        return $this->set(self::KEEPTIME_, $value);
    }

    /**
     * Returns value of 'keepTime_' property
     *
     * @return integer
     */
    public function getKeepTime()
    {
        $value = $this->get(self::KEEPTIME_);
        return $value === null ? (integer)$value : $value;
    }
}
}