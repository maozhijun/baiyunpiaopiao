<?php
/**
 * Auto generated from response.proto at 2018-09-14 09:53:41
 *
 * protos package
 */

namespace Protos {
/**
 * ResultResponse message
 */
class ResultResponse extends \ProtobufMessage
{
    /* Field index constants */
    const CODE_ = 1;
    const MSG_ = 2;
    const DATA_ = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::CODE_ => array(
            'name' => 'code_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_INT,
        ),
        self::MSG_ => array(
            'name' => 'msg_',
            'required' => false,
            'type' => \ProtobufMessage::PB_TYPE_STRING,
        ),
        self::DATA_ => array(
            'name' => 'data_',
            'required' => false,
            'type' => '\Protos\AnchorCreate_Response'
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
        $this->values[self::CODE_] = null;
        $this->values[self::MSG_] = null;
        $this->values[self::DATA_] = null;
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
     * Sets value of 'code_' property
     *
     * @param integer $value Property value
     *
     * @return null
     */
    public function setCode($value)
    {
        return $this->set(self::CODE_, $value);
    }

    /**
     * Returns value of 'code_' property
     *
     * @return integer
     */
    public function getCode()
    {
        $value = $this->get(self::CODE_);
        return $value === null ? (integer)$value : $value;
    }

    /**
     * Sets value of 'msg_' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMsg($value)
    {
        return $this->set(self::MSG_, $value);
    }

    /**
     * Returns value of 'msg_' property
     *
     * @return string
     */
    public function getMsg()
    {
        $value = $this->get(self::MSG_);
        return $value === null ? (string)$value : $value;
    }

    /**
     * Sets value of 'data_' property
     *
     * @param \Protos\AnchorCreate_Response $value Property value
     *
     * @return null
     */
    public function setData(\Protos\AnchorCreate_Response $value=null)
    {
        return $this->set(self::DATA_, $value);
    }

    /**
     * Returns value of 'data_' property
     *
     * @return \Protos\AnchorCreate_Response
     */
    public function getData()
    {
        return $this->get(self::DATA_);
    }
}
}