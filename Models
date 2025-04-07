<?php
namespace CollatzApp\Models;

use CollatzApp\Core\AbstractCollatz;

class Collatz extends AbstractCollatz {
    public function computeSequence(): array {
        $n = $this->startValue;
        $sequence = [];

        while ($n != 1) {
            $sequence[] = $n;
            $n = ($n % 2 == 0) ? $n / 2 : 3 * $n + 1;
        }
        $sequence[] = 1;

        return $sequence;
    }
}
