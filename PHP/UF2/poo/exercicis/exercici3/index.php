<?php
#Definir la jerarquia de classes i interfícies següent: Les classes Animal i Clock implementen l'interfície Speaker, la qual declara el mètode abstracte talk(). Animal té les subclasses Dog i Cat, les qual defineixen el mètode talk(). Crear un programa principal que instanciï objectes d'aquests tipus, els posi en un array i el mostri.
require_once 'model/Speaker.php';
require_once 'model/Animal.php';
require_once 'model/Dog.php';
require_once 'model/Cat.php';
require_once 'model/Clock.php';

function displaySpeakers(array $list): void {
	foreach ($list as $e) {
		echo $e;
	}
}

function main() {
	$speakerList = array();
	array_push($speakerList, new Clock());
	array_push($speakerList, new Dog('Bobby', 'white'));
	array_push($speakerList, new Cat('Micifu', true));

}

?>
