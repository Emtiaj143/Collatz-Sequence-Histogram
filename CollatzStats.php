<?php
namespace CollatzApp\Models;

use CollatzApp\Models\Collatz;
use CollatzApp\Interfaces\CollatzStatistics;
use CollatzApp\Traits\Logger;
use PDO;

class CollatzStats extends Collatz implements CollatzStatistics {
    use Logger;

    private PDO $db;

    public function __construct(int $startValue, PDO $db) {
        parent::__construct($startValue);
        $this->db = $db;
    }

    public function computeHistogram(int $n, int $m): void {
        if ($n < 1 || $m < 1 || $n > $m) {
            $this->log("Invalid range or value.");
            return;
        }

        $histogram = [];

        for ($num = $n; $num <= $m; $num++) {
            $sequence = (new Collatz($num))->computeSequence();
            foreach ($sequence as $value) {
                $histogram[$value] = ($histogram[$value] ?? 0) + 1;

                $stmt = $this->db->prepare("INSERT INTO collatz_data (start_value, value_in_sequence) VALUES (?, ?)");
                $stmt->execute([$num, $value]);
            }
        }

        echo "<h2>Collatz Histogram for range [$n, $m]</h2>";
        echo "<table border='1'><tr><th>Value</th><th>Frequency</th></tr>";
        foreach ($histogram as $value => $count) {
            echo "<tr><td>$value</td><td>$count</td></tr>";
        }
        echo "</table>";
    }
}
