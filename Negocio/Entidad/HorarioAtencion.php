<?php

/**
 * Clase que constituye la entidad "Horario de Atención"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class HorarioAtencion
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID del dia
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Nombre del dia
     * 
     * @var String $dia
     */
    private $dia;

    /**
     * Hora
     * 
     * @var String $hora
     */
    private $hora;

    /**
     * Medio 
     * 
     * @var String $medio
     */
    private $medio;

    /**
     * Lugar
     * 
     * @var String $lugar
     */
    private $lugar;


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
     * Método que obtiene el ID de la Temática
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID de la Temática
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el nombre la Temática
     * 
     * @return String $dia
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Método que establece el dia
     * 
     * @param String $pDia
     */
    public function setDia($pDia)
    {
        $this->dia = $pDia;
    }

    /**
     * Método que obtiene la hora
     * 
     * @return String $hora
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Método que establece el medio
     * 
     * @param String $pMedio
     */
    public function setMedio($pMedio)
    {
        $this->medio = $pMedio;
    }

    /**
     * Método que obtiene el lugar
     * 
     * @return String $lugar
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Método que establece el lugar
     * 
     * @param String $pLugar
     */
    public function setLugar($pLugar)
    {
        $this->lugar = $pLugar;
    }

   
}

