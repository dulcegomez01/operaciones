<?php

function suma($num1, $num2) {
    return $num1 + $num2;
}

function resta($num1, $num2) {
    return $num1 - $num2;
}

function multiplicacion($num1, $num2) {
    return $num1 * $num2;
}

function division($num1, $num2) {
    if ($num2 == 0) {
        return "Error: División por cero";
    }
    return $num1 / $num2;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = isset($_POST['num1']) ? $_POST['num1'] : null;
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : null;
    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;

    if (is_numeric($num1) && is_numeric($num2)) {
        $num1 = floatval($num1);
        $num2 = floatval($num2);

        switch ($operacion) {
            case 'suma':
                $resultado = suma($num1, $num2);
                break;
            case 'resta':
                $resultado = resta($num1, $num2);
                break;
            case 'multiplicacion':
                $resultado = multiplicacion($num1, $num2);
                break;
            case 'division':
                $resultado = division($num1, $num2);
                break;
            default:
                $resultado = "Operación no válida";
                break;
        }

        echo "Resultado: " . $resultado;
    } else {
        echo "Error: Ambos valores deben ser números válidos";
    }
} else {
    echo "Error: Método de solicitud no válido";
}
?>
