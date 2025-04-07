<?php
namespace CollatzApp\Core;

abstract class AbstractCollatz {
    protected int $startValue;

    public function __construct(int $startValue) {
        $this->startValue = $startValue;
    }

    // Abstract function to be implemented by subclasses
    abstract public function computeSequence(): array;
}
?>
