<?php

/**
 * Interface DAO
 * 
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Persistencia
 */

interface DAO
{

    /**
     * Crear el registro de un elemento en la base de datos
     *
     * @param Object $pObjeto
     */
    public function create($pObjeto);

    /**
     * Buscar un registo en específico, en la base de datos, por medio de su código
     *
     * @param int $pCodigo
     * @return Object
     */
    public function search($pCodigo);

    /**
     * Modificar un elemento en específico en la base de datos
     *
     * @param Object $pObjeto
     */
    public function update($pObjeto);

    /**
     * Eliminar un registo en específico, en la base de datos, por medio de su código
     *
     * @param int $pCodigo
     * @return Object
     */
    public function delete($pCodigo);

    /**
     * Obtener una lista de elementos de una tabla específica de la base de datos
     *
     * @return Array
     */
    public function list();
}