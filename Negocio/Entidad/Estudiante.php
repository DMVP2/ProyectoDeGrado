<?php

/**
 * Clase que constituye la entidad "Estudiante"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Estudiante
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID del Estudiante
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre del Estudiante
     * 
     * @var String $nombre
     */
    private $nombre;

    /**
     * Apellido del Estudiante
     * 
     * @var String $apellido
     */
    private $apellido;

    /**
     * Edad del Estudiante
     * 
     * @var int $edad
     */
    private $edad;

    /**
     * correo electronico  principal
     * 
     * @var String $correoElectronicoPrincipal
     */
    private $correoElectronicoPrincipal;

    /**
     * correo electronico secundario
     * 
     * @var String $correoElectronicoSecundario
     */
    private $correoElectronicoSecundario;

     /**
     * Semestre  del Estudiante
     * 
     * @var int $semestre
     */
    private $semestre;

    /**
     * Arreglo que contiene los ID de los progreso
     * 
     * @var array $progreso
     */
    private $progreso;

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
     * Método que obtiene el ID del Estudiante
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID del Estudiante
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre del estudiante
     * 
     * @return String $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método que establece el nombre del estudiante
     * 
     * @param String $pNombre
     */
    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    /**
     * Método que obtiene el apellido del estudiante
     * 
     * @return String $apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Método que establece el apellido del estudiante
     * 
     * @param String $pApellido
     */
    public function setApellido($pApellido)
    {
        $this->apellido = $pApellido;
    }

     /**
     * Método que obtiene la edad del Estudiante
     * 
     * @return int $edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Método que establece la edad del Estudiante
     * 
     * @param int $pEdad
     */
    public function setEdad($pEdad)
    {
        $this->edad = $pEdad;
    }

    /**
     * Método que obtiene el correo electronico principal
     * 
     * @return String $correoElectronicoPrincipal
     */
    public function getCorreoElectronicoPrincipal()
    {
        return $this->correoElectronicoPrincipal;
    }

    /**
     * Método que establece EL correo electronico principal
     * 
     * @param String $pCorreoElectronicoPrincipal
     */
    public function setCorreoElectronicoPrincipal($pCorreoElectronicoPrincipal)
    {
        $this->correoElectronicoPrincipal = $pCorreoElectronicoPrincipal;
    }

    /**
     * Método que obtiene el correo electronico secundario
     * 
     * @return String $correoElectronicoSecundario
     */
    public function getCorreoElectronicoSecundario()
    {
        return $this->correoElectronicoSecundario;
    }

    /**
     * Método que establece EL correo electronico secundario
     * 
     * @param String $pCorreoElectronicoSecundario
     */
    public function setCorreoElectronicoSecundario($pCorreoElectronicoSecundario)
    {
        $this->correoElectronicoSecundario = $pCorreoElectronicoSecundario;
    }

     /**
     * Método que obtiene l semestre  del Estudiante
     * 
     * @return int $semestre
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Método que establece el semestre del Estudiante
     * 
     * @param int $pSemestre
     */
    public function setSemestre($pSemestre)
    {
        $this->semestre = $pSemestre;
    }

    /**
     * Método que obtiene el arreglo con los ID de los progresos del estudiante
     * 
     * @return Array $progreso
     */
    public function getProgreso()
    {
        return $this->progreso;
    }

    /**
     * Método que establece el arreglo con los ID del progeso del estudiante
     * 
     * @param Array
     */
    public function setProgreso($pProgreso)
    {
        $this->progreso = $pProgreso;
    }

}

