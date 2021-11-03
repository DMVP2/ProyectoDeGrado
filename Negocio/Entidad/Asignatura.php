<?php

/**
 * Clase que constituye la entidad "Asignatura"
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Entidad
 */
class Asignatura
{

    //----------------------------------
    // Atributos
    //----------------------------------

    /**
     * ID de la asignatura
     * 
     * @var int $codigo
     */
    private $codigo;

    /**
     * Docente de la asignatura
     * 
     * @var String $docente
     */
    private $docente;

    /**
     * Nombre de la asignatura
     * 
     * @var String $nombre
     */
    private $nombre;

    /**
     * grupo de la asignatura
     * 
     * @var String $grupo
     */
    private $grupo;

    /**
     * numero creditos
     * 
     * @var int $numeroCreditos
     */
    private $numeroCreditos;

    /**
     * semestre
     * 
     * @var int $semestre
     */
    private $semestre;

    /**
     * duracion de la asignatura
     * 
     * @var String $duracion
     */
    private $duracion;

    /**
     * descripcion de la asignatura
     * 
     * @var String $descripcion
     */
    private $descripcion;

    /**
     * syllabus de la asignatura
     * 
     * @var String $syllabus
     */
    private $syllabus;

    /**
     * Arreglo que contiene los ID de la competencia de la asignatura
     * 
     * @var array $competencias
     */
    private $competencias;

    /**
     * Arreglo que contiene los ID de la bibliografia de la asignatura
     * 
     * @var array $bibliografias
     */
    private $bibliografias;

    /**
     * Arreglo que contiene los ID de los estudiantes de la asignatura
     * 
     * @var array $estudiantes
     */
    private $estudiantes;

    /**
     * Arreglo que contiene los ID de las tematicas de la asignatura
     * 
     * @var array $tematicas
     */
    private $tematicas;

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
     * Método que obtiene el ID de la asignatura
     * 
     * @return int $codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método que establece el ID de la asignatura
     * 
     * @param int $pCodigo
     */
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }

    /**
     * Método que obtiene el docente de la asignatura
     * 
     * @return int $docente
     */
    public function getDocente()
    {
        return $this->docente;
    }

    /**
     * Método que establece el docente de la asignatura
     * 
     * @param int $pDocente
     */
    public function setDocente($pDocente)
    {
        $this->docente = $pDocente;
    }

    /**
     * Método que obtiene el nombre la asignatura
     * 
     * @return String $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método que establece el nombre de la asignatura
     * 
     * @param String $pNombre
     */
    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    /**
     * Método que obtiene el grupo de la asignatura
     * 
     * @return String $grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Método que establece el grupo de la asignatura
     * 
     * @param String $pGrupo
     */
    public function setGrupo($pGrupo)
    {
        $this->grupo = $pGrupo;
    }

    /**
     * Método que obtiene el semestre
     * 
     * @return int $semestre
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Método que establece el semestre
     * 
     * @param int $pSemestre
     */
    public function setSemestre($pSemestre)
    {
        $this->semestre = $pSemestre;
    }

    /**
     * Método que obtiene la duracion de la asignatura
     * 
     * @return String $duracion
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Método que establece la duración de la asignatura
     * 
     * @param String $pDuracion
     */
    public function setDuracion($pDuracion)
    {
        $this->duracion = $pDuracion;
    }

    /**
     * Método que obtiene la descripción de la asignatura
     * 
     * @return String $descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Método que establece la descripción de la asignatura
     * 
     * @param String $pDescripcion
     */
    public function setDescripcion($pDescripcion)
    {
        $this->descripcion = $pDescripcion;
    }

    /**
     * Método que obtiene el syllabus de la asignatura
     * 
     * @return String $syllabus
     */
    public function getSyllabus()
    {
        return $this->syllabus;
    }

    /**
     * Método que establece el syllabus de la asignatura
     * 
     * @param String $pSyllabus
     */
    public function setSyllabus($pSyllabus)
    {
        $this->syllabus = $pSyllabus;
    } 

    /**
     * Método que obtiene las competencias de la asignatura
     * 
     * @return Array $competencias
     */
    public function getCompetencias()
    {
        return $this->competencias;
    }

    /**
     * Método que establece el arreglo las competencias de la asignatura
     * 
     * @param Array
     */
    public function setCompetencias($pCompetencias)
    {
        $this->competencias = $pCompetencias;
    }

     /**
     * Método que obtiene las bibliografias de la asignatura
     * 
     * @return Array $bibliografias
     */
    public function getBibliografias()
    {
        return $this->bibliografias;
    }

    /**
     * Método que establece el arreglo las bibliografias de la asignatura
     * 
     * @param Array
     */
    public function setBibliografias($pBibliografias)
    {
        $this->bibliografias = $pBibliografias;
    }

      /**
     * Método que obtiene los estudiantes de la asignatura
     * 
     * @return Array $estudiantes
     */
    public function getEstudiantes()
    {
        return $this->estudiantes;
    }

    /**
     * Método que establece el arreglo los estudiantes de la asignatura
     * 
     * @param Array
     */
    public function setEstudiantes($pEstudiantes)
    {
        $this->estudiantes = $pEstudiantes;
    }

     /**
     * Método que establece el arreglo las bibliografias de la asignatura
     * 
     * @param Array
     */
    public function setBibliografias($pBibliografias)
    {
        $this->bibliografias = $pBibliografias;
    }

      /**
     * Método que obtiene las tematicas de la asignatura
     * 
     * @return Array $tematicas
     */
    public function getTematicas()
    {
        return $this->tematicas;
    }

    /**
     * Método que establece el arreglo las tematicas de la asignatura
     * 
     * @param Array
     */
    public function setTematicas($pTematicas)
    {
        $this->tematicas = $pTematicas;
    }
}

