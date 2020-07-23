<?php

namespace FIS\MX\Client;

use \FIS\MX\Client\Configuration;
use \FIS\MX\Client\Model\Error;
use \FIS\MX\Client\ObjectSerializer;
use \FIS\MX\Client\Api\FISApi as Instance;

use Signer\Manager\ApiException;
use Signer\Manager\Interceptor\MiddlewareEvents;
use Signer\Manager\Interceptor\KeyHandler;

use \GuzzleHttp\Client;
use \GuzzleHttp\Event\Emitter;
use \GuzzleHttp\Middleware;
use \GuzzleHttp\HandlerStack as handlerStack;

class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->keypair = 'path/to/keypair.p12';
        $this->cert = 'path/to/certificate.pem';
        $this->url = 'this_url';

        $this->signer = new KeyHandler($this->keypair, $this->cert, $password);
        $events = new MiddlewareEvents($this->signer);
        $handler = handlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));

        $client = new Client(['handler' => $handler]);
        $config = new Configuration();
        $config->setHost($this->url);
        
        $this->apiInstance = new Instance($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";

    }    
    
    public function testGetScoreNoHitDG()
    {
        $persona = new \FIS\MX\Client\Model\PersonaPeticion();
        $domicilio = new \FIS\MX\Client\Model\DomicilioPeticion();        
        $estado = new \FIS\MX\Client\Model\CatalogoEstados();
            
        $domicilio->setDireccion(null);
        $domicilio->setColoniaPoblacion(null);
        $domicilio->setDelegacionMunicipio(null);
        $domicilio->setCiudad(null);
        $domicilio->setEstado($estado::CDMX);
        $domicilio->setCP(null);

        $persona->setApellidoPaterno("PATERNO");
        $persona->setApellidoMaterno("MATERNO");
        $persona->setApellidoAdicional(null);
        $persona->setPrimerNombre("NOMBRE");
        $persona->setSegundoNombre(null);
        $persona->setFechaNacimiento("04-01-1980");
        $persona->setRFC(null);
        $persona->setDomicilio($domicilio);
                
        try {
            $result = $this->apiInstance->getScoreNoHitDG($this->x_api_key, $this->username, $this->password, $persona);
            print_r($result);
            $this->assertTrue($result->getFolioConsulta()!==null);
        } catch (Exception $e) {
            echo 'Exception when calling ApiTest->testGetScoreNoHitDG: ', $e->getMessage(), PHP_EOL;
        }
    } 
} 
