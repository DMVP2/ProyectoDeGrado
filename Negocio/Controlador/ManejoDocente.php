<?php

include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "DocenteDAO.php");
include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORIO_RAIZ . RUTA_PERSISTENCIA . "HorarioAtencionDAO.php");

/**
 * Clase que constituye el controlador "ManejoDocente"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Controlador
 */

class ManejoDocente
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
     * Método que crear un objeto de la clase docente
     * 
     * @param Docente $pDocente
     */
    public function crearDocente($pDocente)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        $docenteDAO->crearDocente($pDocente);
    }

    /**
     * Método que obtiene la lista de docentes
     * 
     * @return Array $docente
     */
    public function listarDocentes()
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        return $docenteDAO->listarDocentes();
    }

     /**
     * Método que obtiene la lista de los codigos de los docentes de una asignatura dada
     * 
     * @param int $pCodigo
     * @return Array $docentes
     */
    public function listarIDDocentePorHorarioDeAtencion($pCodigo)
    {
        $docenteDAO = DocenteDAO::getEstudianteDAO($this->conexion);
        return $docenteDAO->listarIDDocentePorHorarioDeAtencion($pCodigo);
    }

    /**
     * Método que busca un docente por medio de su código
     * 
     * @param int $pCodigo
     * @return Docente $docente
     */
    public function buscarDocente($pCodigo)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        return $docenteDAO->buscarDocente($pCodigo);
    }

    /**
     * Método que actualiza un docente
     * 
     * @param Docente $pDocente
     */
    public function actualizarDocente($pDocente)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        $docenteDAO->actualizarDocente($pDocente);
    }

    /**
     * Método que activa un docente por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarDocente($pIdDocument)
    {
        $docenteDAO = DocenteDAO::getTematicaDAO($this->conexion);
        $docenteDAO->activarDocente($pDocente);
    }

    /**
     * Método que desactiva un docente por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarDocente($pDocente)
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        $docenteDAO->desactivarDocente($pDocente);
    }

     /**
     * Método que cuenta la cantidad total de docentes registrados en la base de datos
     * 
     * @return int $cantidad
     */
    public function cantidadDocente()
    {
        $docenteDAO = DocenteDAO::getDocenteDAO($this->conexion);
        return $docenteDAO->cantidadDocente();
    }
s

     /**
     * Método que crear un objeto de la clase horario de atencion
     * 
     * @param HorarioAtencion $HorarioAtencion
     */
    public function crearHorarioAtencion($pHorarioAtencion)
    {
        $horarioAtencionDAO = HorarioAtencionDAO::getHorarioAtencionDAO($this->conexion);
        $horarioAtencionDAO->crearHorarioAtencion($pHorarioAtencion);
    }

    /**
     * Método que obtiene la lista de horario de atencion
     * 
     * @return Array $HorarioAtencion
     */
    public function listarHorariosAtencion()
    {
        $horarioAtencionDAO = HorarioAtencionDAO::getHorarioAtencionDAO($this->conexion);
        return $horarioAtencionDAO->listarHorariosAtencion();
    }

    /**
     * Método que busca un horario atencion por medio de su código
     * 
     * @param int $pCodigo
     * @return BuscarHorarioAtencion $buscarHorarioAtencion
     */
    public function buscarHorarioAtencion($pCodigo)
    {
        $horarioAtencionDAO = HorarioAtencionDAO::getHorarioAtencionDAO($this->conexion);
        return $horarioAtencionDAO->buscarHorarioAtencion($pCodigo);
    }

    /**
     * Método que actualiza un horario de atencion
     * 
     * @param HorarioAtencion $pHorarioAtencion
     */
    public function actualizarHorarioAtencion($pHorarioAtencion)
    {
        $horarioAtencionDAO = HorarioAtencionDAO::getHorarioAtencionDAO($this->conexion);
        $horarioAtencionDAO->actualizarHorarioAtencion($pHorarioAtencion);
    }

    /**
     * Método que activa un horario de atencion por medio de su código
     * 
     * @param int $pCodigo
     */
    public function activarHorarioAtencion($pIdDocument)
    {
        $horarioAtencionDAO = HorarioAtencionDAO::getHorarioAtencionDAO($this->conexion);
        $horarioAtencionDAO->activarHorarioAtencion($pHorarioAtencion);
    }

    /**
     * Método que desactiva un docente por medio de su código
     * 
     * @param int $pCodigo
     */
    public function desactivarHorarioAtencion($pHorarioAtencion)
    {
        $HorarioAtencionDAO = HorarioAtencionDAO::getHorarioAtencionDAO($this->conexion);
        $HorarioAtencionDAO->desactivarHorarioAtencion($pHorarioAtencion);
    }
}
