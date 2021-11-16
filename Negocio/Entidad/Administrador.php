<?php

/**
 * Clase que constituye la entidad "Administrador"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Administrador
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID del Administrador
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre del Administrador
     * 
     * @var String $nombre
     */
    private $nombre;

    /**
     * Apellido del Administrador
     * 
     * @var String $apellido
     */
    private $apellido;

    /**
     * Edad del Telefono
     * 
     * @var int $telefono
     */
    private $telefono;

    /**
     * correo electronico del Administrador
     * 
     * @var String $correoElectronico
     */
    private $correoElectronico;

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
     * Método que obtiene el ID del Administrador
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID del Administrador
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre del Administrador
     * 
     * @return String $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método que establece el nombre del Administrador
     * 
     * @param String $pNombre
     */
    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    /**
     * Método que obtiene el apellido del Administrador
     * 
     * @return String $apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Método que establece el apellido del Administrador
     * 
     * @param String $pApellido
     */
    public function setApellido($pApellido)
    {
        $this->apellido = $pApellido;
    }

     /**
     * Método que obtiene el telefono del Administrador
     * 
     * @return int $telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Método que establece el telefono del Administrador
     * 
     * @param int $pTelefono
     */
    public function setTelefono($pTelefono  )
    {
        $this->telefono = $pTelefono;
    }

    /**
     * Método que obtiene el correo electronico del Administrador
     * 
     * @return String $correoElectronico
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Método que establece eL correo electronico del Administrador
     * 
     * @param String $pCorreoElectronico
     */
    public function setCorreoElectronico($pCorreoElectronico)
    {
        $this->correoElectronico = $pCorreoElectronico;
    }

}

