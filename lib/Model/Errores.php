<?php

namespace FIS\MX\Client\Model;

use \ArrayAccess;
use \FIS\MX\Client\ObjectSerializer;

class Errores implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $fisModelName = 'Errores';
    
    protected static $fisTypes = [
        'folio_consulta' => 'string',
        'errores' => '\FIS\MX\Client\Model\Error[]'
    ];
    
    protected static $fisFormats = [
        'folio_consulta' => null,
        'errores' => null
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
        'folio_consulta' => 'folioConsulta',
        'errores' => 'errores'
    ];
    
    protected static $setters = [
        'folio_consulta' => 'setFolioConsulta',
        'errores' => 'setErrores'
    ];
    
    protected static $getters = [
        'folio_consulta' => 'getFolioConsulta',
        'errores' => 'getErrores'
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
        $this->container['folio_consulta'] = isset($data['folio_consulta']) ? $data['folio_consulta'] : null;
        $this->container['errores'] = isset($data['errores']) ? $data['errores'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getFolioConsulta()
    {
        return $this->container['folio_consulta'];
    }
    
    public function setFolioConsulta($folio_consulta)
    {
        $this->container['folio_consulta'] = $folio_consulta;
        return $this;
    }
    
    public function getErrores()
    {
        return $this->container['errores'];
    }
    
    public function setErrores($errores)
    {
        $this->container['errores'] = $errores;
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
