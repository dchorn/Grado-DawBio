<?php
namespace functions;

// asociative arrey for the intervals of bmi and diagnose classification
const BMI_CLASSIFICATION = [
    ['from' => 0.0, "to" => 16.5, "type" => "severely underweight"],
    ['from' => 16.5, "to" => 18.5, "type" => "underweight"],
    ['from' => 18.5, "to" => 25.0, "type" => "normal weight"],
    ['from' => 25.0, "to" => 30.0, "type" => "overweight"],
    ['from' => 30.0, "to" => 99.0, "type" => "obesity"]
];

function bmiCalc(float $weight, float $height): float {
    return $weight / ($height * $height);
}

function bmiDiagnose(float $bmi): string {
    $result = "";
    foreach (BMI_CLASSIFICATION as $element) {
        if (($bmi > $element['from']) && ($bmi < $element['to'])) {
            $result = $element['type'];
        }
    }
    return $result;
}
