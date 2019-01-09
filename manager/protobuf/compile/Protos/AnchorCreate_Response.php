<?php
/**
 * Auto generated from response.proto at 2018-09-14 09:53:41
 *
 * protos package
 */

namespace Protos {
/**
 * AnchorCreate_Response message
 */
class AnchorCreate_Response extends \ProtobufMessage
{
    /* Field index constants */
    const TYPEURL_ = 1;
    const VALUE_ = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TYPEURL_ => array(
            'name' => 'typeUrl_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::VALUE_ => array(
            'name' => 'value_',
            'required' => false,
            'type' => '\Protos\AnchorCreate_Data'
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
        $this->values[self::TYPEURL_] = null;
        $this->values[self::VALUE_] = null;
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
     * Sets value of 'typeUrl_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTypeUrl($value)
    {
        return $this->set(self::TYPEURL_, $value);
    }

    /**
     * Returns value of 'typeUrl_' property
     *
     * @return string
     */
    public function getTypeUrl()
    {
        $value = $this->get(self::TYPEURL_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'value_' property
     *
     * @param \Protos\AnchorCreate_Data $value Property value
     *
     * @return null
     */
    public function setValue(\Protos\AnchorCreate_Data $value=null)
    {
        return $this->set(self::VALUE_, $value);
    }

    /**
     * Returns value of 'value_' property
     *
     * @return \Protos\AnchorCreate_Data
     */
    public function getValue()
    {
        return $this->get(self::VALUE_);
    }
}
}