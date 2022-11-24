<?php
class Clock implements Speaker {
	public function talk() {
		echo "TicTac";
	}

	public function __toString() {
		return sprintf("%s{}",
			get_class($this));
	}
}
?>
