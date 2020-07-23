<?php

namespace FIS\MX\Client\Model;

interface ModelInterface
{
    
    public function getModelName();
    
    public static function fisTypes();
    
    public static function fisFormats();
    
    public static function attributeMap();
    
    public static function setters();
    
    public static function getters();
    
    public function listInvalidProperties();
    
    public function valid();
}
