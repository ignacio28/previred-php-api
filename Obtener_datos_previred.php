<?php
class Previred
{
    // Dirección URL del sitio de Previred.
    private static $URL = "https://www.previred.com/indicadores-previsionales";
    private static $doc = null;

    function __construct() {}

    /**
     * A partir del índice entregado como argumento retornará el valor obtenido de un elemento 'td'.
     * 
     * @author Ignacio Ramírez Riquelme
     */
    private function getData($node) {
        // Crea un nuevo recurso cURL
        $curl = curl_init();
        
        // Establece la dirección URL
        curl_setopt($curl, CURLOPT_URL, self::$URL);
        // Retorna la transferencia como cadena (string)
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        // Se almacena el contenido retornado como cadena desde el sitio web
        $res = curl_exec($curl);

        // Cierra el recurso 'cURL' y libera recursos del sistema
        curl_close($curl);

        // Para evitar la sobrecarga de solicitudes a la página y disminuir el tiempo de respuesta, solo se conectará 1 vez por instancia.
        if (self::$doc == null) {
            // set error level
            $internalErrors = libxml_use_internal_errors(true);

            self::$doc = new DOMDocument('1.0', 'UTF-8');
            if (!self::$doc->loadHTML($res)) {
                throw new Exception("Error al cargar el HTML");
            }
            // Restore error level
            libxml_use_internal_errors($internalErrors);
        }

        $elems = self::$doc->getElementsByTagName("td");

        return $elems->item($node)->nodeValue;
    }

    /**
     * Elimina todo caracter no numérico (a excepción de la coma (,)) de la cadena.
     * 
     * @var $val - Cadena con el valor numérico a "limpiar"
     * @author Ignacio Ramírez Riquelme
     */
    protected function onlyNumeric($val) {
        return str_replace(",", ".", preg_replace("/[^0-9,]/", "", $val));
    }

    /**
     * Convierte una cadena a Float
     * 
     * @var $val - Valor a convertir a Float
     * @author Ignacio Ramírez Riquelme
     */
    protected function toFloat($val) {
        return floatval(self::onlyNumeric($val));
    }

    // Obtener UF
    public function get_UF()
    {
        return self::toFloat(self::getData(4));
    }

    // Obtener UTM
    public function get_UTM()
    {
        return self::toFloat(self::getData(11));
    }

    // Obtener UTA
    function get_UTA()
    {
        return self::toFloat(self::getData(12));
    }

    // Rentas topes imponibles:

    function get_RTI_AFP()
    {
        return self::toFloat(self::getData(15));
    }

    function get_RTI_IPS()
    {
        return self::toFloat(self::getData(17));
    }

    function get_RTI_seguro_cesantia()
    {
        return self::toFloat(self::getData(19));
    }

    // Rentas mínimas imponibles
    function get_RMI_dependientes_independientes()
    {
        return self::toFloat(self::getData(22));
    }

    function get_RMI_menores_mayores()
    {
        return self::toFloat(self::getData(24));
    }

    function get_RMI_casa_particular()
    {
        return self::toFloat(self::getData(26));
    }

    function get_RMI_fines_no_remuneracionales()
    {
        return self::toFloat(self::getData(28));
    }

    // ahorro previsional voluntario

    function get_APV_mensual()
    {
        return self::toFloat(self::getData(31));
    }

    function get_APV_anual()
    {
        return self::toFloat(self::getData(33));
    }

    // DEPÓSITO CONVENIDO
    function get_deposito_convenido()
    {
        return self::toFloat(self::getData(36));
    }

    // Seguro de cesantia (AFC)
    function get_AFC_contrato_indefinido_empleador()
    {
        return self::toFloat(self::getData(43));
    }

    function get_AFC_contrato_indefinido_trabajador()
    {
        return self::toFloat(self::getData(44));
    }

    function get_AFC_contrato_plazo_fijo()
    {
        return self::toFloat(self::getData(46));
    }

    function get_AFC_contrato_plazo_indefinido_mas()
    {
        return self::toFloat(self::getData(49));
    }

    function get_AFC_trabajador_casa_particular()
    {
        return self::toFloat(self::getData(52));
    }

    // AFP - TASA TRABAJADORES

    function get_tasa_AFP_DEP_capital()
    {
        return self::toFloat(self::getData(63));
    }
    function get_tasa_AFP_INDEP_capital()
    {
        return self::toFloat(self::getData(65));
    }
    function get_tasa_AFP_DEP_cuprum()
    {
        return self::toFloat(self::getData(67));
    }
    function get_tasa_AFP_INDEP_cuprum()
    {
        return self::toFloat(self::getData(69));
    }

    function get_tasa_AFP_DEP_habitat()
    {
        return self::toFloat(self::getData(71));
    }

    function get_tasa_AFP_INDEP_habitat()
    {
        return self::toFloat(self::getData(73));
    }
    function get_tasa_AFP_DEP_planvital()
    {
        return self::toFloat(self::getData(75));
    }
    function get_tasa_AFP_INDEP_planvital()
    {
        return self::toFloat(self::getData(77));
    }
    function get_tasa_AFP_DEP_provida()
    {
        return self::toFloat(self::getData(79));
    }
    function get_tasa_AFP_INDEP_provida()
    {
        return self::toFloat(self::getData(81));
    }
    function get_tasa_AFP_DEP_modelo()
    {
        return self::toFloat(self::getData(83));
    }
    function get_tasa_AFP_INDEP_modelo()
    {
        return self::toFloat(self::getData(85));
    }

}
// 