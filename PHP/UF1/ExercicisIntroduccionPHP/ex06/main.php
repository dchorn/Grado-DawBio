<?php
// Programa que calcula l'edat d'una persona (en anys, mesos i dies) a partir de la data de naixement.

//set the default time zone to use
date_default_timezone_set('Europe/Madrid');

//define birthday and actual days
$birthday = new DateTime('2001-02-20 02:30:52');
$now      = new DateTime();

// calculates the difference between the two date
$interval = $birthday->diff($now);

// prints and formats the date
echo $interval->format('%y years %m months and %d days');

?>
