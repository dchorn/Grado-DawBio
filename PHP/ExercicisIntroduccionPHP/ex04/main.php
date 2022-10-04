<?php
// Programa que indica amb un missatge si s'està en edat laboral, edat d'estudiar o 
// en edat de jubilació, a partir del valor d'una variable que indica l'edat d'una persona.
const AGE_CLASSIFICATION = [
    ['from' => 0, 'to' => 16, 'in' => 'student'],
    ['from' => 17, 'to' => 65, 'in' => 'worker'],
    ['from' => 66, 'to' => 100, 'in' => 'retired'],
];

$age = 21;

function diagnose(int $age): string {
    $result = "";
    foreach (AGE_CLASSIFICATION as $element) {
        if (($age > $element['from']) && ($age < $element['to'])) {
            $result = $element['in'];
        }
    }
    return $result;
};
$result = diagnose($age);
printf("Your age is %d. And you are a %s:", $age, $result);

?>
