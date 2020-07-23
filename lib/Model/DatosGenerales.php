<?php

namespace FIS\MX\Client\Model;

use \ArrayAccess;
use \FIS\MX\Client\ObjectSerializer;

class DatosGenerales implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $fisModelName = 'DatosGenerales';
    
    protected static $fisTypes = [
        'nombres' => 'string',
        'apellido_paterno' => 'string',
        'apellido_materno' => 'string',
        'fecha_nacimiento' => 'string',
        'rfc' => 'string',
        'curp' => 'string'
    ];
    
    protected static $fisFormats = [
        'nombres' => null,
        'apellido_paterno' => null,
        'apellido_materno' => null,
        'fecha_nacimiento' => null,
        'rfc' => null,
        'curp' => null
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
        'nombres' => 'nombres',
        'apellido_paterno' => 'apellidoPaterno',
        'apellido_materno' => 'apellidoMaterno',
        'fecha_nacimiento' => 'fechaNacimiento',
        'rfc' => 'RFC',
        'curp' => 'CURP'
    ];
    
    protected static $setters = [
        'nombres' => 'setNombres',
        'apellido_paterno' => 'setApellidoPaterno',
        'apellido_materno' => 'setApellidoMaterno',
        'fecha_nacimiento' => 'setFechaNacimiento',
        'rfc' => 'setRfc',
        'curp' => 'setCurp'
    ];
    
    protected static $getters = [
        'nombres' => 'getNombres',
        'apellido_paterno' => 'getApellidoPaterno',
        'apellido_materno' => 'getApellidoMaterno',
        'fecha_nacimiento' => 'getFechaNacimiento',
        'rfc' => 'getRfc',
        'curp' => 'getCurp'
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
        $this->container['nombres'] = isset($data['nombres']) ? $data['nombres'] : null;
        $this->container['apellido_paterno'] = isset($data['apellido_paterno']) ? $data['apellido_paterno'] : null;
        $this->container['apellido_materno'] = isset($data['apellido_materno']) ? $data['apellido_materno'] : null;
        $this->container['fecha_nacimiento'] = isset($data['fecha_nacimiento']) ? $data['fecha_nacimiento'] : null;
        $this->container['rfc'] = isset($data['rfc']) ? $data['rfc'] : null;
        $this->container['curp'] = isset($data['curp']) ? $data['curp'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if (!is_null($this->container['nombres']) && (mb_strlen($this->container['nombres']) > 100)) {
            $invalidProperties[] = "invalid value for 'nombres', the character length must be smaller than or equal to 100.";
        }
        if (!is_null($this->container['apellido_paterno']) && (mb_strlen($this->container['apellido_paterno']) > 30)) {
            $invalidProperties[] = "invalid value for 'apellido_paterno', the character length must be smaller than or equal to 30.";
        }
        if (!is_null($this->container['apellido_materno']) && (mb_strlen($this->container['apellido_materno']) > 30)) {
            $invalidProperties[] = "invalid value for 'apellido_materno', the character length must be smaller than or equal to 30.";
        }
        if (!is_null($this->container['rfc']) && (mb_strlen($this->container['rfc']) > 13)) {
            $invalidProperties[] = "invalid value for 'rfc', the character length must be smaller than or equal to 13.";
        }
        if (!is_null($this->container['curp']) && (mb_strlen($this->container['curp']) > 18)) {
            $invalidProperties[] = "invalid value for 'curp', the character length must be smaller than or equal to 18.";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getNombres()
    {
        return $this->container['nombres'];
    }
    
    public function setNombres($nombres)
    {
        if (!is_null($nombres) && (mb_strlen($nombres) > 100)) {
            throw new \InvalidArgumentException('invalid length for $nombres when calling DatosGenerales., must be smaller than or equal to 100.');
        }
        $this->container['nombres'] = $nombres;
        return $this;
    }
    
    public function getApellidoPaterno()
    {
        return $this->container['apellido_paterno'];
    }
    
    public function setApellidoPaterno($apellido_paterno)
    {
        if (!is_null($apellido_paterno) && (mb_strlen($apellido_paterno) > 30)) {
            throw new \InvalidArgumentException('invalid length for $apellido_paterno when calling DatosGenerales., must be smaller than or equal to 30.');
        }
        $this->container['apellido_paterno'] = $apellido_paterno;
        return $this;
    }
    
    public function getApellidoMaterno()
    {
        return $this->container['apellido_materno'];
    }
    
    public function setApellidoMaterno($apellido_materno)
    {
        if (!is_null($apellido_materno) && (mb_strlen($apellido_materno) > 30)) {
            throw new \InvalidArgumentException('invalid length for $apellido_materno when calling DatosGenerales., must be smaller than or equal to 30.');
        }
        $this->container['apellido_materno'] = $apellido_materno;
        return $this;
    }
    
    public function getFechaNacimiento()
    {
        return $this->container['fecha_nacimiento'];
    }
    
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->container['fecha_nacimiento'] = $fecha_nacimiento;
        return $this;
    }
    
    public function getRfc()
    {
        return $this->container['rfc'];
    }
    
    public function setRfc($rfc)
    {
        if (!is_null($rfc) && (mb_strlen($rfc) > 13)) {
            throw new \InvalidArgumentException('invalid length for $rfc when calling DatosGenerales., must be smaller than or equal to 13.');
        }
        $this->container['rfc'] = $rfc;
        return $this;
    }
    
    public function getCurp()
    {
        return $this->container['curp'];
    }
    
    public function setCurp($curp)
    {
        if (!is_null($curp) && (mb_strlen($curp) > 18)) {
            throw new \InvalidArgumentException('invalid length for $curp when calling DatosGenerales., must be smaller than or equal to 18.');
        }
        $this->container['curp'] = $curp;
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
