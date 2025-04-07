<?php
namespace CollatzApp\Traits;

trait Logger {
    public function log(string $message): void {
        echo "[LOG]: $message<br>";
    }
}
?>
