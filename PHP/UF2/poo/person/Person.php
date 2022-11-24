<?php

declare(strict_types=1);

class User {
    const CONSTANT = 'constant value';
    private int $id;
    private ?string $name;
    private readonly string nif;
 
    public function __construct(int $id, ?string $name, string nif) {
        $this->id = $id;
        $this->name = $name;
        $this->nif= $nif;
    }
}
/*
 * Gets the value of name
 * @return string
 * */
public function getName(): string {
	return $this->name;
}

/*
 * Sets the value of name
 * @param srting $name the name
 * */
public function setName() {
	$this->name = $name;
}

/*
 * Gets the value of age 
 * @return int
 * */
public function getAge(): int {
	return $this->age;
}

/*
 * Sets the value of age
 * @param int $age the age
 * */
public function setAge() {
	$this->age = $age;
}

?>
