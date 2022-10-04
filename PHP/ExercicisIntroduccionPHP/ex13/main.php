<?php
// Programa que donada la seqüència d'aminoàcids d'una proteïna, 
// mostra una seqüència de nucleòtids que la codifiqui

const AMINOACIDOS = [
        "Phe"=>["UUU"],
        "Leu"=>["UUA", "UUG", "CUU", "CUC", "CUA", "CUG"],
        "Ile"=>["AUU", "AUC", "AUA"],
        "Met"=>["AUG"],
        "Val"=>["GUU", "GUC", "GUA", "GUG"],
        "Ser"=>["UCU", "UCC", "UCA", "UCG", "AGU", "AGC"],
        "Pro"=>["CCU", "CCC", "CCA", "CCG"],
        "Thr"=>["ACU", "ACC", "ACA", "ACG"],
        "Ala"=>["GCU", "GCC", "GCA", "Ala", "GCG"],
        "Tyr"=>["UAU", "UAC"],
        "End"=>["UAA", "UAG", "UGA"],
        "His"=>["CAU", "CAC"],
        "Gln"=>["CAA", "CAG"],
        "Asn"=>["AAU", "AAC"],
        "Lys"=>["AAG", "AAA"],
        "Asp"=>["GAU", "GAC"],
        "Glu"=>["UGU", "GAG"],
        "Cys"=>["AAG", "UGC"],
        "Trp"=>["UGG"],
        "Arg"=>["CGU", "CGC", "CGA", "CGG", "AGA", "AGG"],
        "Gly"=>["GGU", "GGC", "GGA", "GGG"]
];

$aminoacidSequence = "AlaAspHisGluAspGlyTrpLysPheLysHisIleMetAlaMetProLeuIleGluMet";

$aminoacidSequenceArray = str_split($aminoacidSequence, 3);

$nucleotidSequence = [];

function translateAmin(string $amin): string {
    $transformed = "";
    foreach (AMINOACIDOS as $key => $nuc) {
        if($amin == $key) {
            $transformed = array_rand($nuc, 1);
        }
    }
    return $transformed;
}

function checkArrays(array $aminoacidSequenceArray): array {
    foreach ($aminoacidSequenceArray as $amin) {
        if (array_key_exists($amin, AMINOACIDOS)) {
            array_push($nucleotidSequence, translateAmin($amin));
        }
    }
    return $nucleotidSequence;
} 


foreach($aminoacidSequenceArray as $amin) {
    echo $amin . "<br>";
}

echo "<br>";

$aa = checkArrays($aminoacidSequenceArray);

foreach($aa as $amin) {
    echo $amin . "<br>";
}

?>
