<?php
/**
 * Auto generated from response.proto at 2018-09-14 09:53:41
 *
 * protos package
 */

namespace Protos {
/**
 * AnchorCreate_Request message
 */
class AnchorCreate_Request extends \ProtobufMessage
{
    /* Field index constants */
    const LIVETYPE_ = 1;
    const CONTINUEFLAG_ = 2;
    const DRESSINGFLAG_ = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::LIVETYPE_ => array(
            'name' => 'liveType_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::CONTINUEFLAG_ => array(
            'name' => 'continueFlag_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::DRESSINGFLAG_ => array(
            'name' => 'dressingFlag_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_BOOL,
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
        $this->values[self::LIVETYPE_] = null;
        $this->values[self::CONTINUEFLAG_] = null;
        $this->values[self::DRESSINGFLAG_] = null;
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
     * Sets value of 'liveType_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setLiveType($value)
    {
        return $this->set(self::LIVETYPE_, $value);
    }

    /**
     * Returns value of 'liveType_' property
     *
     * @return integer
     */
    public function getLiveType()
    {
        $value = $this->get(self::LIVETYPE_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'continueFlag_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setContinueFlag($value)
    {
        return $this->set(self::CONTINUEFLAG_, $value);
    }

    /**
     * Returns value of 'continueFlag_' property
     *
     * @return integer
     */
    public function getContinueFlag()
    {
        $value = $this->get(self::CONTINUEFLAG_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'dressingFlag_' property
     *
     * @param boolean $value Property value
     *
     * @return null
     */
    public function setDressingFlag($value)
    {
        return $this->set(self::DRESSINGFLAG_, $value);
    }

    /**
     * Returns value of 'dressingFlag_' property
     *
     * @return boolean
     */
    public function getDressingFlag()
    {
        $value = $this->get(self::DRESSINGFLAG_);
        return $value === null ? (boolean)$value : $value;
    }
}
}