<?php
// Programa que calcula la seqüència complementària a una donada

// C = G
// A = T

const PROTEINS = [
    ['prot' => 'C', 'transform' => 'G'],
    ['prot' => 'G', 'transform' => 'C'],
    ['prot' => 'T', 'transform' => 'A'],
    ['prot' => 'A', 'transform' => 'T'],
//    ['prot' => 'U', 'transform' => 'U']
];

function transformProt(string $prot): string {
    $transformedProt = "";
    foreach (PROTEINS as $element) {
        if ($prot == $element['prot']) {
            $result = $element['transform'];
        }
    }
    return $result;
};

function printSeqUp(array $seq){
    echo "5' ";
    foreach ($seq as $prot) {
        echo $prot;
    }
    echo " 3' <br>";
};

function printSeqDown(array $seq){
    echo "3' ";
    foreach ($seq as $prot) {
        echo $prot;
    }
    echo " 5' <br>";
};

function printResult(array $secuencia, array $secuenciaInvertida, array $secuenciaComplementaria){
        echo "Secuencia: "; 
        printSeqUp($secuencia);
        echo "Invertida : "; 
        printSeqDown($secuenciaInvertida);
        echo "Complement: "; 
        printSeqUp($secuenciaComplementaria);
}

// transforma el string en un array
$secuencia = str_split("CGATCCTAT");

// invertida:  G  C  T  A  G  G  A  T  A              3' a 5'
$secuenciaInvertida  = [];

$secuenciaComplementaria = [];

// transforma la secuencia normal en invertida
foreach ($secuencia as $proteina) {
    array_push($secuenciaInvertida, transformProt($proteina));
}

$secuenciaComplementaria = array_reverse($secuenciaInvertida);

printResult($secuencia, $secuenciaInvertida, $secuenciaComplementaria);
?>
