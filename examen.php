<?php
// ===============================
//  PROYECTO: LAS CABRAS DE SATURNO
// ===============================
//
// Contexto: La colonia Capra Majoris, en los anillos de Saturno,
// ha sido impactada por bolas de queso ardiente procedentes del
// cinturón de Meteorquesos. Este programa ayudará a los técnicos
// a analizar los daños y calcular las pérdidas (y ganancias).
//
// Simbología del mapa ($capraMajoris):
// "0" -> terreno rocoso
// "~" -> atmósfera de metano
// "C" -> zona habitada (corrales de cabras)
//
// Los impactos se almacenan en el array $impacts
// como coordenadas [fila, columna].
//
// =========================================
// MAPA ORIGINAL DE CAPRA MAJORIS
// =========================================

$capraMajoris = [
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', 'C', '0', 'C', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', 'C', 'C', 'C', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '0', '0', '0', 'C', '0', 'C', 'C', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '~', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '0', '0', 'C', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~'],
    ['~', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '0', 'C', '0', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', 'C', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', 'C', 'C', '0', '0', 'C', '0', '0', '0', '~', '~', '~'],
    ['~', '~', '~', '~', '0', 'C', 'C', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', '0', '0', '0', '0', '0', 'C', '0', 'C', '0', '0', '0', '~'],
    ['~', '~', '~', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '0', '0', '0', '0', 'C', '0', '0', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~']
];

// Coordenadas [fila, columna] de los impactos de queso
$impacts = [
    [20, 4],
    [2, 13],
    [13, 12],
    [3, 17],
    [2, 13],
    [5, 19],
    [6, 18],
    [5, 2],
    [20, 13],
    [9, 7],
    [5, 9],
    [15, 16],
    [16, 13],
    [16, 9],
    [16, 0],
    [3, 19],
    [19, 8],
    [1, 16],
    [18, 4],
    [21, 23],
    [7, 17],
    [22, 15],
    [21, 6],
    [14, 8],
    [12, 23],
    [7, 7],
    [22, 4],
    [3, 21],
    [2, 3],
    [8, 11],
    [0, 4],
    [7, 21],
    [11, 4],
    [7, 15],
    [6, 17],
    [5, 19],
    [4, 19],
    [4, 7],
    [23, 21],
    [15, 20],
    [2, 9],
    [21, 2],
    [1, 13],
    [7, 10],
    [21, 5],
    [13, 17],
    [2, 14],
    [11, 14],
    [22, 17],
    [18, 22],
    [2, 23],
    [3, 1],
    [18, 6],
    [17, 12],
    [18, 18],
    [20, 2],
    [3, 14],
    [11, 21],
    [6, 5],
    [6, 2],
    [12, 23],
    [18, 18],
    [21, 6],
    [10, 12],
    [5, 4],
    [16, 19],
    [8, 10],
    [12, 21],
    [15, 1],
    [20, 14],
    [3, 20],
    [6, 19],
    [20, 13],
    [15, 4],
    [10, 2],
    [5, 16],
    [20, 1],
    [12, 13],
    [11, 5],
    [12, 14],
    [8, 3],
    [6, 8],
    [19, 7],
    [16, 9],
    [13, 20],
    [3, 5],
    [1, 0],
    [20, 14],
    [12, 21],
    [12, 16],
    [15, 7],
    [9, 1],
    [1, 18],
    [20, 6],
    [8, 6],
    [22, 1],
    [10, 22],
    [19, 19],
    [7, 16],
    [8, 8]
];


// =========================================
// ESCRIBE AQUÍ LA DEFINICIÓN DE LAS FUNCIONES
// =========================================

//Mostrar el mapa original 
function mostrarMapa($mapa) {
    foreach ($mapa as $fila) {
        echo "<br>";
        foreach ($fila as $zona) {
            echo $zona;
        }
    }
}

//Zonas habitadas afectadas
function quesificacion($mapa, $impactos) {
    $mapaModificado = $mapa;
    foreach ($impactos as $impacto) {
        $fila = $impacto[0];
        $columna = $impacto[1];
        if ($mapaModificado[$fila][$columna] == 'C') {
            $mapaModificado[$fila][$columna] = 'Q'; 
        }
    }
    return $mapaModificado;
}

//Cabras afectada (3000 por zona) y consumo de desodorante (10ml por cabra)
function cabrasAfectadas($quesificacion) {
    $contadorQ = 0;
    foreach ($quesificacion as $fila) {
        foreach ($fila as $celda) {
            if ($celda == 'Q') {
                $contadorQ++;
            }
        }
    }
    $CABRAS_POR_ZONA = 3000;
    return $contadorQ * $CABRAS_POR_ZONA;
}
    
//Mapa de daños totales
function danyosTotales($mapa, $impactos) {
    $mapaModificado = $mapa;
    foreach ($impactos as $impacto) {
        $fila = $impacto[0];
        $columna = $impacto[1];
        if ($mapaModificado[$fila][$columna] == 'C') {
            $mapaModificado[$fila][$columna] = 'Q';
        } else if ($mapaModificado[$fila][$columna] == '0') {
            $mapaModificado[$fila][$columna] = 'X';
        } else if ($mapaModificado[$fila][$columna] == '~') {
            $mapaModificado[$fila][$columna] = 'S';
        }
    }
    return $mapaModificado;
}

//Estimación de costes 
function estimacionCostes($mapaDanyosTotales) {
    $contadorQ = 0;
    $contadorX = 0;
    foreach ($mapaDanyosTotales as $fila) {
        foreach ($fila as $celda) {
            if ($celda == 'Q') {
                $contadorQ++;
            } elseif ($celda == 'X') {
                $contadorX++;
            }
        }
    }
    $REPARAR_CORRAL = 250000;
    $costeCorrales = $contadorQ * $REPARAR_CORRAL;
    $REPARAR_ROCAS = 75000;
    $costeRocas = $contadorX * $REPARAR_ROCAS;
    $costeTotal = $costeCorrales + $costeRocas;
    return $costeTotal;
}

//Recursos aprovechables 
function totalAtmosfera($mapa) {
    $contadorAtmosfera = 0;
    foreach ($mapa as $fila) {
        foreach ($fila as $zona) {
            if ($zona == '~') {
                $contadorAtmosfera++;
            }
        }
    }
    return $contadorAtmosfera;
}

function atmosferaAfectada($mapaDanyosTotales) {
    $contadorAtmosferaAfectada = 0;
    foreach ($mapaDanyosTotales as $fila) {
        foreach ($fila as $zona) {
            if ($zona == 'S') {
                $contadorAtmosferaAfectada++;
            }
        }
    }
    return $contadorAtmosferaAfectada;
}

//Recaudación total esperada
function recaudacion($totalAtmosfera, $totalAtmosferaAfectada) {
    $TOTAL_PECES = 1000000;
    $totalPeces = ($totalAtmosferaAfectada / $totalAtmosfera) * $TOTAL_PECES;
    $PRECIO_PECES = 7;
    $recaudacion = $totalPeces * $PRECIO_PECES;
    return $recaudacion;
}


// =========================================
// ESCRIBE AQUÍ TU PROGRAMA PRINCIPAL
// =========================================

//Mostrar el mapa original 
echo "Mapa original:";
mostrarMapa($capraMajoris);

//Zonas habitadas afectadas
echo "<br><br>Mapa quesificado:";
$mapaQuesificado = quesificacion($capraMajoris, $impacts);
mostrarMapa($mapaQuesificado);

//Población afectada y consumo de desodorante espacial
$cabrasAfectadas = cabrasAfectadas($mapaQuesificado);
echo "<br><br>Cabras afectadas: $cabrasAfectadas";
$DESODORANTE_POR_CABRA = 0.01;
$desodorante = ($cabrasAfectadas * $DESODORANTE_POR_CABRA);
echo "<br>Litros de desodorante	anticheddar: $desodorante". "L";

//Mapa de daños totales
echo "<br><br>Mapa de daños totales:";
$mapaDanyosTotales = danyosTotales($capraMajoris, $impacts);
mostrarMapa($mapaDanyosTotales);

//Estimación de costes 
$costeDanyos = estimacionCostes($mapaDanyosTotales);
echo "<br><br>Coste	total de limpieza $costeDanyos". "€";	

//Recursos aprovechables 
$totalAtmosfera = totalAtmosfera($capraMajoris);
$totalAtmosferaAfectada = atmosferaAfectada($mapaDanyosTotales);
// echo "<br><br>Hay un total de $totalAtmosfera km de atmósfera";
// echo "<br>Hay un total de $totalAtmosferaAfectada km de atmósfera afectada";

//Recaudación total esperada
$recaudacion = recaudacion($totalAtmosfera, $totalAtmosferaAfectada);
echo "<br><br>Recaudación ONG Cocineros Cósmicos: " . round($recaudacion) . "€";
$diferencia = $costeDanyos - $recaudacion;
echo "<br>Daños netos estimados: " . round($diferencia) . "€";

?>