<?php
require 'Obtener_datos_previred.php';

$pr = new Previred();

print("Data: " . $pr->get_AFC_contrato_plazo_indefinido_mas());