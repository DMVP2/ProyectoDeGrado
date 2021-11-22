<?php

/**
 * Clase que constituye la entidad "Usuario"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Usuario
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID del Usuario
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nickname del Usuario
     * 
     * @var String $nickname
     */
    private $nickname;

    /**
     * Password del Usuario
     * 
     * @var String $password
     */
    private $password;

    /**
     * Rol del Usuario
     * 
     * @var int $rol
     */
    private $rol;

    /**
     * Estado del Usuario (Es decir si el usuario esta Activo o Inactivo)
     * 
     * @var int $status
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
     * Método que obtiene el ID del Nickname
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID del Nickname
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nickname del Usuario
     * 
     * @return String $nickname
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Método que establece el nickname del Usuario
     * 
     * @param String $pNickname
     */
    public function setNickname($pNickname)
    {
        $this->nickname = $pNickname;
    }

    /**
     * Método que obtiene el password del Usuario
     * 
     * @return String $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Método que establece el password del Usuario
     * 
     * @param String $pPassword
     */
    public function setPassword($pPassword)
    {
        $this->password = $pPassword;
    }

     /**
     * Método que obtiene el rol del Usuario
     * 
     * @return int $rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Método que establece el rol del Usuario
     * 
     * @param int $pRol
     */
    public function setRol($pRol)
    {
        $this->rol = $pRol;
    }

    /**
     * Método que obtiene el estado de actividad o inactividad del Usuario
     * 
     * @return int $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Método que establece el estado de actividad o inactividad del Usuario
     * 
     * @param int $pStatus
     */
    public function setStatus($pStatus)
    {
        $this->status = $pStatus;
    }

}