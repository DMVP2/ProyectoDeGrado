<?php

/**
 * Clase que constituye la entidad "Docente"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Docente
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID de los Docentes
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre del Docente
     * 
     * @var String $nombre
     */
    private $nombre;

    /**
     *Apellido del Docente
     * 
     * @var String $apellido
     */
    private $apellido;

    /**
     * Email del Docente
     * 
     * @var String $email
     */
    private $email;

    /**
     * Status del Docente
     * 
     * @var String $status
     */
    private $status;

    //----------------------------------
    // Constructor
    //----------------------------------

    /**
     * 
     */

    //----------------------------------
    // Métodos
    //----------------------------------

    /**
     * Método que obtiene el ID del Docente
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID del Docente
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre Docente
     * 
     * @return String $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método que establece el nombre Docente
     * 
     * @param String $pNombre
     */
    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    /**
     * Método que obtiene el apellido Docente
     * 
     * @return String $apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Método que establece el apellido Docente
     * 
     * @param String $pApellido
     */
    public function setApellido($pApellido)
    {
        $this->apellido = $pApellido;
    }

    /**
     * Método que obtiene el email del Docente
     * 
     * @return String $email
     */
    public function getCorreoElectronico()
    {
        return $this->email;
    }

    /**
     * Método que establece el email del Docente
     * 
     * @param String $pEmail
     */
    public function setCorreoElectronico($pEmail)
    {
        $this->email = $pEmail;
    }

    /**
     * Método que obtiene el status del Docente
     * 
     * @return String $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Método que establece el status del Docente
     * 
     * @param String $pStatus
     */
    public function setStatus($pStatus)
    {
        $this->status = $pStatus;
    }
}