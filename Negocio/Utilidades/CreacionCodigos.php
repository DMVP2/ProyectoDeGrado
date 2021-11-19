<?php

/**
 * @author Grupo PG_2021-01-01
 * @copyright RetoñosApp: Una plataforma de enseñanza virtual para apoyar la enseñanza de la programación en el aula
 * @copyright Grupo PG_2021-01-01
 * 
 * @package Negocio/Utilidades
 */

class CreacionCodigos
{

    function crearID()
    {

        $ID = "";

        for ($i = 0; $i < 3; $i++) {

            $random = rand(10000, 99999);

            $ID = $ID . $random;
        }

        $ID = substr($ID, 5, 5);

        return $ID;
    }
}
