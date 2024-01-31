<?php
require_once "Obtener_datos_previred.php";


/**
 * Clase que contiene funciones para múltiples propósitos
 * 
 * @author Ignacio Ramírez Riquelme
 */


/**
 * Remueve todo caracter no numérico (a excepción de la coma (,)) de la cadena.
 * 
 * @var $val - Cadena con el valor numérico a "limpiar"
 * @author Ignacio Ramírez Riquelme
 */
function onlyNumeric($val) {
    return str_replace(",", ".", preg_replace("/[^0-9,]/", "", $val));
}

/**
 * Convierte una cadena a Float
 * 
 * @var $val - Valor a convertir a Float
 * @author Ignacio Ramírez Riquelme
 */
function toFloat($val) {
    return floatval(onlyNumeric($val));
}

/**
 * Elimina ciertos parámetros de un String entregado.
 * 
 * @var $string - Valor a limpiar
 * @var $args - Array que contiene todos los valores a buscar y eliminar del $string
 * @author Ignacio Ramírez Riquelme
 */
function deleteParameters($string, $args) {
    foreach ($args as $arg) {
        $string = preg_replace('/' . preg_quote($arg, '/') . '/', '', $string);
    }
    return trim($string);
}

/**
 * Retorna todos los datos en formato JSON
 * 
 * @var $grouped - Establece el formato del JSON. true: Retorna el JSON agrupado por "group" | false: Retorna el JSON sin agrupar
 * @author Ignacio Ramírez Riquelme
 */
function getJsonData($grouped = false) {
    $previred = new Previred();
    $previredObjMethods = $previred->getPreviredObjMethods();

    if ($grouped == "true") {
        // Imprimir la cadena JSON pero agrupando por "group"
        $groupedData = array();

        foreach ($previredObjMethods as $method) {
            $value = $previred->$method();
            $group = $value->getGroup();
            //$group = empty($group) ? "OTROS" : $group;

            if (!isset($groupedData[$group])) {
                $groupedData[$group] = array();
            }

            $groupedData[$group][] = $value->toArray();
        }

        $jsonData = array();

        foreach ($groupedData as $group => $values) {
            $jsonData[$group] = $values;
        }

        return $jsonData;
    }

    // Imprimir la cadena JSON sin agrupar
    $jsonData = array();

    foreach ($previredObjMethods as $method) {
        $value = $previred->$method();
        $jsonData[] = $value->toArray();
    }

    return $jsonData;
}
