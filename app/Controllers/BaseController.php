<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Clase BaseController
 *
 * BaseController proporciona un lugar conveniente para cargar componentes
 * y realizar funciones que son necesarias para todos los controladores.
 * Extiende esta clase en cualquier nuevo controlador:
 *     class Home extends BaseController
 *
 * Por seguridad, asegúrate de declarar cualquier nuevo método como protected o private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instancia del objeto Request principal.
     * 
     * Esta variable contiene la petición HTTP actual y proporciona
     * métodos para acceder a los datos de la petición.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * Array de helpers que se cargarán automáticamente.
     * 
     * Estos helpers estarán disponibles para todos los controladores
     * que extiendan BaseController. Útil para funciones comunes.
     *
     * @var array
     */
    protected $helpers = ['url','form'];

    /**
     * Array de datos para pasar a las vistas.
     * 
     * Almacena datos que estarán disponibles en todas las vistas
     * del sitio, como la página actual, datos de usuario, etc.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Asegúrate de declarar las propiedades que inicializas.
     * La creación de propiedades dinámicas está obsoleta en PHP 8.2.
     * 
     * Ejemplo: protected $session;
     */

    /**
     * Método de inicialización del controlador.
     * 
     * Se ejecuta automáticamente antes de cualquier método del controlador.
     * Ideal para inicializar variables, cargar helpers, etc.
     *
     * @param RequestInterface $request Objeto de la petición actual
     * @param ResponseInterface $response Objeto de la respuesta
     * @param LoggerInterface $logger Sistema de registro de eventos
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // No editar esta línea - Mantiene la funcionalidad base de CodeIgniter
        parent::initController($request, $response, $logger);

        // Aquí puedes precargar cualquier modelo, librería, etc.
        // Ejemplo: $this->session = service('session');

        // Inicialización de la variable de página actual
        $uri = service('uri');                    // Obtiene el servicio URI
        $segmento = $uri->getSegment(1);         // Obtiene el primer segmento de la URL
        $pagina_actual = $segmento ? $segmento : 'inicio';  // Si no hay segmento, usa 'inicio'
        
        // Comparte la variable con todas las vistas
        $this->data['pagina_actual'] = $pagina_actual;
    }
}
