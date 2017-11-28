<?php

class Progression
{
	private $sequence = [];
	private $calculated = [];
	private $length;

	public function __construct($sequence) {
		$this->sequence = explode(',', $sequence);
		$this->length = count($this->sequence);
	}

	public function isProgression() {
		if ($this->arithmetic()) {
			return 'Your sequence of numbers is a arithmetic progression.';
		} elseif ($this->geometric()) {
			return 'Your sequence of numbers is a geometric progression.';
		} else {
			throw new Exception("The sequence is not one of the types of progression.");
		}
	}

	private function arithmetic($n = 0) {
		if ($this->length > $n) {
			$this->calculated[$n] = $this->sequence[0] + $n * ($this->sequence[1] - $this->sequence[0]);
			$this->arithmetic(++$n);
		}

		return empty(array_diff($this->sequence, $this->calculated)) ? true : false;
	}

	private function geometric($n = 0) {
		if ($this->length > $n) {
			$this->calculated[$n] = $this->sequence[0] * pow($this->sequence[1] / $this->sequence[0], $n);
			$this->geometric(++$n);
		}

		return empty(array_diff($this->sequence, $this->calculated)) ? true : false;
	}
}

$sequence = new Progression($argv[1]);
echo $sequence->isProgression();