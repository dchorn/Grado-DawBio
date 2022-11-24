<?php
require_once 'model/Animal.php';

class Dog {
	private string $name;
	private string $color;

	public function __construct(string $name, string $color) {
		$this->name= $name;
		$this->color= $color;
	}
	
	public function getName(): string {
		return $this->name;
	}

	public function getColor(): string {
		return $this->color;
	}

	public function setName(string $name){
		$this->name= $name;
	}

	public function setColor(string $color){
		$this->color= $color;
	}
}

?>
