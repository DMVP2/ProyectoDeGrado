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
     * Nickname del Estudiante
     * 
     * @var String $nickname
     */
    private $nickname;

    /**
     * Password del Estudiante
     * 
     * @var String $password
     */
    private $password;

    /**
     * Rol del Estudiante
     * 
     * @var int $rol
     */
    private $rol;

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
     * Método que obtiene el nickname del estudiante
     * 
     * @return String $nickname
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Método que establece el nickname del estudiante
     * 
     * @param String $pNickname
     */
    public function setNickname($pNickname)
    {
        $this->nickname = $pNickname;
    }

    /**
     * Método que obtiene el password del estudiante
     * 
     * @return String $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Método que establece el password del estudiante
     * 
     * @param String $pPassword
     */
    public function setPassword($pPassword)
    {
        $this->password = $pPassword;
    }

     /**
     * Método que obtiene el rol del Estudiante
     * 
     * @return int $rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Método que establece el rol del Estudiante
     * 
     * @param int $pRol
     */
    public function setRol($pRol)
    {
        $this->rol = $pRol;
    }

}