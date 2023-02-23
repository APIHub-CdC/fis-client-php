<?php

namespace FIS\MX\Client\Model;

use \ArrayAccess;
use \FIS\MX\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $fisModelName = 'Respuesta';
    
    protected static $fisTypes = [
        'score_no_hit' => 'object',
        'folio_consulta' => 'string'
    ];
    
    protected static $fisFormats = [
        'score_no_hit' => null,
        'folio_consulta' => null
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
        'score_no_hit' => 'scoreNoHit',
        'folio_consulta' => 'folioConsulta'
    ];
    
    protected static $setters = [
        'score_no_hit' => 'setScoreNoHit',
        'folio_consulta' => 'setFolioConsulta'
    ];
    
    protected static $getters = [
        'score_no_hit' => 'getScoreNoHit',
        'folio_consulta' => 'getFolioConsulta'
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
        $this->container['score_no_hit'] = isset($data['score_no_hit']) ? $data['score_no_hit'] : null;
        $this->container['folio_consulta'] = isset($data['folio_consulta']) ? $data['folio_consulta'] : null;
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
    


    
    public function getScoreNoHit()
    {
        return $this->container['score_no_hit'];
    }
    
    public function setScoreNoHit($score_no_hit)
    {
        $this->container['score_no_hit'] = $score_no_hit;
        return $this;
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
