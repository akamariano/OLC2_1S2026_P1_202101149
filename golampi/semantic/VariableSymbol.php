<?php

class VariableSymbol {

    private string $name;
    private string $type;

    public function __construct(string $name, string $type) {
        $this->name = $name;
        $this->type = $type;
    }

    public function toArray(): array {
        return [
            "name" => $this->name,
            "type" => $this->type
        ];
    }
    public function getType(): string {
    return $this->type;
}

}
