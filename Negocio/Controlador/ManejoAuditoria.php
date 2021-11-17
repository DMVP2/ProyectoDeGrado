<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "AuditoriaDAO.php");

/**
 * Clase que constituye el controlador "ManejoAuditoria"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoAuditoria
{

    //-----------------------------------
    // Atributos
    //-----------------------------------

    /**
     * Conexión a la base de datos
     * 
     * @var Conexion $conexion
     */
    private $conexion;

    //----------------------------------
    // Constructor
    //----------------------------------

    public function __construct($pConexion)
    {
        $this->conexion = $pConexion;
    }

    //---------------------------------
    // Métodos
    //---------------------------------

    /**
     * Método que obtiene la lista de Auditoria
     * 
     * @return Array $auditoria 
     */
    public function listarAuditorias($pInicio, $pNumeroDeItemsPorPagina)
    {
        $auditoriaDAO = AuditoriaDAO::getAuditoriaDAO($this->conexion);
        return $auditoriaDAO->listarAuditorias($pInicio, $pNumeroDeItemsPorPagina);
    }

    /**
     * Método que cuenta la cantidad total de auditorias registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadAuditoria()
    {
        $auditoriaDAO = AuditoriaDAO::getAuditoriaDAO($this->conexion);
        return $auditoriaDAO->cantidadAuditoria();
    }
}
