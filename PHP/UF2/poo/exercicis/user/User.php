<?php
class User {
	private string $username;
	private string $password;

	public function __constructor(string $username, string $password) {
	
		$this->username = $username;
		$this->password = $password;
	}

	public function getUsername(): string {
		return $this->username;
	}

	public function getPassword(): string {
		return $this->password;
	}

	public function setUsername(string $username){
		$this->username = $username;
	}

	public function setPassword(string $password){
		$this->password = $password;
	}
}
?>
