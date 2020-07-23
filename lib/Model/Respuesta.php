<?php

namespace FIS\MX\Client\Model;

use \ArrayAccess;
use \FIS\MX\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $fisModelName = 'Respuesta';
    
    protected static $fisTypes = [
        'datos_generales' => 'object',
        'domicilio' => 'object',
        'score_no_hit' => 'object',
        'folio_consulta' => 'string'
    ];
    
    protected static $fisFormats = [
        'datos_generales' => null,
        'domicilio' => null,
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
        'datos_generales' => 'datosGenerales',
        'domicilio' => 'domicilio',
        'score_no_hit' => 'scoreNoHit',
        'folio_consulta' => 'folioConsulta'
    ];
    
    protected static $setters = [
        'datos_generales' => 'setDatosGenerales',
        'domicilio' => 'setDomicilio',
        'score_no_hit' => 'setScoreNoHit',
        'folio_consulta' => 'setFolioConsulta'
    ];
    
    protected static $getters = [
        'datos_generales' => 'getDatosGenerales',
        'domicilio' => 'getDomicilio',
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
        $this->container['datos_generales'] = isset($data['datos_generales']) ? $data['datos_generales'] : null;
        $this->container['domicilio'] = isset($data['domicilio']) ? $data['domicilio'] : null;
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
    
    public function getDatosGenerales()
    {
        return $this->container['datos_generales'];
    }
    
    public function setDatosGenerales($datos_generales)
    {
        $this->container['datos_generales'] = $datos_generales;
        return $this;
    }
    
    public function getDomicilio()
    {
        return $this->container['domicilio'];
    }
    
    public function setDomicilio($domicilio)
    {
        $this->container['domicilio'] = $domicilio;
        return $this;
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
