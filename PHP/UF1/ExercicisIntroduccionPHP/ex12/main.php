<?php
// Programa que validi una seqüència de ADN o ARNm (seleccionar amb un selector)
// indiqui el nombre de vegades i el percentatge que apareix cada nucleòtid i el nombre d'errors.

$ADN = "tgtctccttctgtgggaacg";

function countNucleotids(string $input): array {

    $nucleotids = [
        'a' => 0,
        'c' => 0,
        't' => 0,
        'g' => 0
    ];

    foreach ($nucleotids as $nucleotid => &$value) {
        $value = substr_count(strtolower($input), $nucleotid);
    }
    return $nucleotids;
}

function countNucleotids2(string $input): array {    
    $nucleotids = [
        'a' => 0,
        'c' => 0,
        't' => 0,
        'g' => 0,
        'error' => 0
    ];

    for($i=0;$i<strlen($input);$i++){
            if ($input[$i] == 'a') {
                $nucleotids['a']++;
            }elseif ($input[$i] == 'c') {
                $nucleotids['c']++; 
            }elseif ($input[$i] == 't') {
                $nucleotids['t']++;
            }elseif ($input[$i] == 'g') {
                $nucleotids['g']++;
            }else {
                $nucleotids['error']++;
            }
    }
    return $nucleotids;
}

echo strtoupper($ADN) . "<br>";

foreach (countNucleotids2(strtolower($ADN)) as $nucleotid => $counter) {
    echo "{$nucleotid} => {$counter} <br>";
}
?>
