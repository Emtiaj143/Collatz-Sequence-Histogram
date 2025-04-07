<?php
namespace CollatzApp\Interfaces;

interface CollatzStatistics {
    public function computeHistogram(int $n, int $m): void;
}
?>
