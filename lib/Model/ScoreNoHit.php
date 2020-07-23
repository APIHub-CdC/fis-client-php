<?php

namespace FIS\MX\Client\Model;

use \ArrayAccess;
use \FIS\MX\Client\ObjectSerializer;

class ScoreNoHit implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $fisModelName = 'ScoreNoHit';
    
    protected static $fisTypes = [
        'valor' => 'float',
        'codigo' => 'string'
    ];
    
    protected static $fisFormats = [
        'valor' => null,
        'codigo' => null
    ];
    
    public static function fisTypes()
    {
        return self::$fisTypes;
    }
    
    public static function fisFormats()
    {
        return self::$fisFormats;
    }
    
    protected static $attributeMap = [
        'valor' => 'valor',
        'codigo' => 'codigo'
    ];
    
    protected static $setters = [
        'valor' => 'setValor',
        'codigo' => 'setCodigo'
    ];
    
    protected static $getters = [
        'valor' => 'getValor',
        'codigo' => 'getCodigo'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$fisModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['valor'] = isset($data['valor']) ? $data['valor'] : null;
        $this->container['codigo'] = isset($data['codigo']) ? $data['codigo'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if (!is_null($this->container['codigo']) && (mb_strlen($this->container['codigo']) > 100)) {
            $invalidProperties[] = "invalid value for 'codigo', the character length must be smaller than or equal to 100.";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getValor()
    {
        return $this->container['valor'];
    }
    
    public function setValor($valor)
    {
        $this->container['valor'] = $valor;
        return $this;
    }
    
    public function getCodigo()
    {
        return $this->container['codigo'];
    }
    
    public function setCodigo($codigo)
    {
        if (!is_null($codigo) && (mb_strlen($codigo) > 100)) {
            throw new \InvalidArgumentException('invalid length for $codigo when calling ScoreNoHit., must be smaller than or equal to 100.');
        }
        $this->container['codigo'] = $codigo;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
