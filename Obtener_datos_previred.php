<?php
require_once "util.php";

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
        // Si ya se ha realizado una conexión previa, se utiliza el resultado almacenado
        if (self::$doc !== null) {
            $elems = self::$doc->getElementsByTagName("td");
            return $elems->item($node)->nodeValue;
        }
        
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
        // set error level
        $internalErrors = libxml_use_internal_errors(true);

        self::$doc = new DOMDocument('1.0', 'UTF-8');
        if (!self::$doc->loadHTML($res)) {
            throw new Exception("Error al cargar el HTML");
        }
        // Restore error level
        libxml_use_internal_errors($internalErrors);

        $elems = self::$doc->getElementsByTagName("td");

        return $elems->item($node)->nodeValue;
    }

    /**
     * Retorna un listado de los objetos de cada función 'get_'
     * 
     * @author Ignacio Ramírez Riquelme
     */
    public function getPreviredObjMethods() {
        $methods = get_class_methods($this);
        $previredObjMethods = array();

        foreach ($methods as $method) {
            if (strpos($method, 'get_') === 0) {
                $value = $this->$method();
                if ($value instanceof PreviredObj) {
                    $previredObjMethods[] = $method;
                }
            }
        }

        return $previredObjMethods;
    }

    // ================================================================================
    // GETTERS
    // ================================================================================

    // Obtener UF
    public function get_UF()
    {
        return new PreviredObj(
            //self::getData(2),
            "UF",
            self::getData(4),
            null,
            self::getData(3)
        );
    }

    // Obtener UTM
    public function get_UTM()
    {
        return new PreviredObj(
            "UTM",
            self::getData(11),
            null,
            self::getData(10)
        );
    }

    // Obtener UTA
    function get_UTA()
    {
        return new PreviredObj(
            "UTA",
            self::getData(12),
            null,
            self::getData(10)
        );
    }

    // Rentas topes imponibles:

    function get_RTI_AFP()
    {
        return new PreviredObj(
            self::getData(14),
            self::getData(15),
            self::getData(13)
        );
    }

    function get_RTI_IPS()
    {
        return new PreviredObj(
            self::getData(16),
            self::getData(17),
            self::getData(13)
        );
    }

    function get_RTI_seguro_cesantia()
    {
        return new PreviredObj(
            self::getData(18),
            self::getData(19),
            self::getData(13)
        );
    }

    // Rentas mínimas imponibles
    function get_RMI_dependientes_independientes()
    {
        return new PreviredObj(
            self::getData(21),
            self::getData(22),
            self::getData(20)
        );
    }

    function get_RMI_menores_mayores()
    {
        return new PreviredObj(
            self::getData(23),
            self::getData(24),
            self::getData(20)
        );
    }

    function get_RMI_casa_particular()
    {
        return new PreviredObj(
            self::getData(25),
            self::getData(26),
            self::getData(20)
        );
    }

    function get_RMI_fines_no_remuneracionales()
    {
        return new PreviredObj(
            self::getData(27),
            self::getData(28),
            self::getData(20)
        );
    }

    // ahorro previsional voluntario

    function get_APV_mensual()
    {
        return new PreviredObj(
            self::getData(30),
            self::getData(31),
            self::getData(29)
        );
    }

    function get_APV_anual()
    {
        return new PreviredObj(
            self::getData(32),
            self::getData(33),
            self::getData(29)
        );
    }

    // DEPÓSITO CONVENIDO
    function get_deposito_convenido()
    {
        return new PreviredObj(
            self::getData(35),
            self::getData(36),
            self::getData(34)
        );
    }

    // Seguro de cesantia (AFC)
    function get_AFC_contrato_indefinido_empleador()
    {
        return new PreviredObj(
            self::getData(42),
            self::getData(43),
            self::getData(37),
            self::getData(40)
        );
    }

    function get_AFC_contrato_indefinido_trabajador()
    {
        return new PreviredObj(
            self::getData(42),
            self::getData(44),
            self::getData(37),
            self::getData(41)
        );
    }

    function get_AFC_contrato_plazo_fijo()
    {
        return new PreviredObj(
            self::getData(45),
            self::getData(46),
            self::getData(37)
        );
    }

    public function get_AFC_contrato_plazo_indefinido_mas() {
        return new PreviredObj(
            self::getData(48),
            self::getData(49),
            self::getData(37)
        );
    }

    function get_AFC_trabajador_casa_particular()
    {
        return new PreviredObj(
            self::getData(51),
            self::getData(52),
            self::getData(37)
        );
    }

    // AFP - TASA TRABAJADORES

    function get_tasa_AFP_DEP_capital()
    {
        return new PreviredObj(
            self::getData(62),
            self::getData(63),
            self::getData(55),
            self::getData(57)
        );
    }
    function get_tasa_AFP_INDEP_capital()
    {
        return new PreviredObj(
            self::getData(62),
            self::getData(65),
            self::getData(55),
            self::getData(58),
        );
    }
    function get_tasa_AFP_DEP_cuprum()
    {
        return new PreviredObj(
            self::getData(66),
            self::getData(67),
            self::getData(55),
            self::getData(57)
        );
    }
    function get_tasa_AFP_INDEP_cuprum()
    {
        return new PreviredObj(
            self::getData(66),
            self::getData(69),
            self::getData(55),
            self::getData(58)
        );
    }

    function get_tasa_AFP_DEP_habitat()
    {
        return new PreviredObj(
            self::getData(70),
            self::getData(71),
            self::getData(55),
            self::getData(57)
        );
    }

    function get_tasa_AFP_INDEP_habitat()
    {
        return new PreviredObj(
            self::getData(70),
            self::getData(73),
            self::getData(55),
            self::getData(58)
        );
    }
    function get_tasa_AFP_DEP_planvital()
    {
        return new PreviredObj(
            self::getData(74),
            self::getData(75),
            self::getData(55),
            self::getData(57)
        );
    }
    function get_tasa_AFP_INDEP_planvital()
    {
        return new PreviredObj(
            self::getData(74),
            self::getData(77),
            self::getData(55),
            self::getData(58)
        );
    }
    function get_tasa_AFP_DEP_provida()
    {
        return new PreviredObj(
            self::getData(78),
            self::getData(79),
            self::getData(55),
            self::getData(57)
        );
    }
    function get_tasa_AFP_INDEP_provida()
    {
        return new PreviredObj(
            self::getData(78),
            self::getData(81),
            self::getData(55),
            self::getData(58)
        );
    }
    function get_tasa_AFP_DEP_modelo()
    {
        return new PreviredObj(
            self::getData(82),
            self::getData(83),
            self::getData(55),
            self::getData(57)
        );
    }
    function get_tasa_AFP_INDEP_modelo()
    {
        return new PreviredObj(
            self::getData(82),
            self::getData(85),
            self::getData(55),
            self::getData(58)
        );
    }

}

/**
 * Clase Previred tipo Object para manejar más información por dato obtenido.
 * 
 * @author Ignacio Ramírez Riquelme
 */
class PreviredObj {
    private $name;
    private $value;
    private $type;
    private $group;
    private $category;
    protected static $args = array('(*)', '(**)', ':');

    function __construct($name = null, $value = 0, $group = "OTROS", $category = "", $type = "") {
        $this->name  = deleteParameters($name, self::$args);
        $this->value = toFloat($value);
        $this->group = deleteParameters($group, self::$args);
        $this->category = deleteParameters($category, self::$args);
        $this->type  = self::setType($value);
    }

    protected function setType($val) {
        $is_cash    = str_contains($val, "$");
        $is_percent = str_contains($val, "%");
        if ($is_percent) {
            return "%";
        }
        return "$";
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }

    public function getType() {
        return $this->type;
    }

    public function getGroup() {
        return empty($this->group) ? "OTROS" : $this->group;
    }

    public function getCategory() {
        return $this->category;
    }

    // Método para convertir a arreglo asociativo
    public function toArray() {
        return array(
            "name" => $this->name,
            "value" => $this->value,
            "category" => $this->category,
            "group" => $this->group,
            "type" => $this->type
        );
    }
}