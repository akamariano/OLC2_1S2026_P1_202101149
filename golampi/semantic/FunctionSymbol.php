<?php

class FunctionSymbol {

    private string $name;
    private array $params;
    private array $returnTypes;
    private $ctx;

    public function __construct(string $name, array $params, array $returnTypes, $ctx) {
        $this->name = $name;
        $this->params = $params;
        $this->returnTypes = $returnTypes;
        $this->ctx = $ctx;
    }

    /* ========================
       GETTERS
       ======================== */

    public function getName(): string {
        return $this->name;
    }

    public function getParams(): array {
        return $this->params;
    }

    public function getReturnTypes(): array {
        return $this->returnTypes;
    }

    public function getContext() {
        return $this->ctx;
    }

    /* ========================
       SERIALIZACIÓN
       ======================== */

    public function toArray(): array {
        return [
            "name" => $this->name,
            "params" => $this->params,
            "returnTypes" => $this->returnTypes
        ];
    }
}
